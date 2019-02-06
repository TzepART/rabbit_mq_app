<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-27
 * Time: 21:45
 */

require_once __DIR__ . '/../connection.php';

use PhpAmqpLib\Message\AMQPMessage;

$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();