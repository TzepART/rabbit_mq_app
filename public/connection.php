<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-06
 * Time: 18:44
 */

require_once __DIR__ . '/config.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class AppRabbitConnection
 */
final class AppRabbitConnection
{
    /**
     * @var
     */
    private static $instance;

    /**
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * MainBoss constructor.
     */
    private function __construct()
    {
        $host = getenv('RABBIT_MQ_HOST');
        $port = getenv('RABBIT_MQ_DEFAULT_PORT');
        $user = getenv('RABBIT_MQ_USERNAME');
        $pass = getenv('RABBIT_MQ_PASSWORD');
        $this->connection = new AMQPStreamConnection($host, $port, $user, $pass);
    }

    /**
     * @return AppRabbitConnection
     */
    public static function getInstance(): AppRabbitConnection
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return AMQPStreamConnection
     */
    public function getConnection(): AMQPStreamConnection
    {
        return $this->connection;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

//Using
$connection = AppRabbitConnection::getInstance()->getConnection();
