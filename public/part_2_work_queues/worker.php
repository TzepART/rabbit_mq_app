<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-29
 * Time: 00:50
 */

require_once __DIR__ . '/../connection.php';

use \Model\QueueDeclarer;

$channel = $connection->channel();

(new QueueDeclarer('task_queue'))
    ->setAutoDelete(false)
    ->declareQueueByParams($channel);

echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
    sleep(substr_count($msg->body, '.'));
    echo " [x] Done\n";
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};

$channel->basic_qos(null, 1, null);
$channel->basic_consume('task_queue', '', false, false, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();