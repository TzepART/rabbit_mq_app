<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-05
 * Time: 23:21
 */

require_once __DIR__ . '/../connection.php';

$channel = $connection->channel();
$channel->exchange_declare('logs', 'fanout', false, false, false);

list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);

$channel->queue_bind($queue_name, 'logs');


echo " [*] Waiting for logs. To exit press CTRL+C\n";
$callback = function ($msg) {
    echo ' [x] ', $msg->body, "\n";
};

$channel->basic_consume($queue_name, '', false, true, false, false, $callback);
while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();