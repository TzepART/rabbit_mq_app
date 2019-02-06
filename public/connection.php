<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-06
 * Time: 18:44
 */

require_once __DIR__ . 'config.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$host = getenv('RABBIT_MQ_HOST');
$port = getenv('RABBIT_MQ_DEFAULT_PORT');
$user = getenv('RABBIT_MQ_USERNAME');
$pass = getenv('RABBIT_MQ_PASSWORD');

$connection = new AMQPStreamConnection($host, $port, $user, $pass);