<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-27
 * Time: 21:47
 */

require_once __DIR__ . '/../connection.php';

use \Model\QueueDeclarer;

$channel = $connection->channel();

(new QueueDeclarer('hello'))
    ->setAutoDelete(false)
    ->declareQueueByParams($channel);

echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
    echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);
while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();