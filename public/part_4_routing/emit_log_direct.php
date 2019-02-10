<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-10
 * Time: 23:44
 */

require_once __DIR__ . '/../connection.php';

use PhpAmqpLib\Message\AMQPMessage;

$channel = $connection->channel();
$channel->exchange_declare('direct_logs', 'direct', false, false, false);
$severity = isset($argv[1]) && !empty($argv[1]) ? $argv[1] : 'info';
$data = implode(' ', array_slice($argv, 2));
if (empty($data)) {
    $data = "Hello World!";
}
$msg = new AMQPMessage($data);
$channel->basic_publish($msg, 'direct_logs', $severity);
echo ' [x] Sent ', $severity, ':', $data, "\n";
$channel->close();
$connection->close();