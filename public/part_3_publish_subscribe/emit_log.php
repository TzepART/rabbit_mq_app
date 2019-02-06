<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-05
 * Time: 23:21
 */

require_once __DIR__ . '/../connection.php';

use PhpAmqpLib\Message\AMQPMessage;

$channel = $connection->channel();
$channel->exchange_declare('logs', 'fanout', false, false, false);

$data = implode(' ', array_slice($argv, 1));

if (empty($data)) {
    $data = "info: Hello World!";
}

$msg = new AMQPMessage($data);
$channel->basic_publish($msg, 'logs');
echo ' [x] Sent ', $data, "\n";

$channel->close();
$connection->close();