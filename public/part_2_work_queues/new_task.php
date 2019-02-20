<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-29
 * Time: 00:47
 */

require_once __DIR__ . '/../connection.php';

use PhpAmqpLib\Message\AMQPMessage;
use \Model\QueueDeclarer;

$channel = $connection->channel();

(new QueueDeclarer('task_queue'))
    ->setAutoDelete(false)
    ->declareQueueByParams($channel);

$data = implode(' ', array_slice($argv, 1));

if (empty($data)) {
    $data = "Hello World!";
}

$msg = new AMQPMessage(
    $data,
    array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
);

$channel->basic_publish($msg, '', 'task_queue');
echo ' [x] Sent ', $data, "\n";

$channel->close();
$connection->close();