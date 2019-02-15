<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-15
 * Time: 17:44
 */

namespace Model;

use PhpAmqpLib\Channel\AMQPChannel;


/**
 * Class QueueDeclarer
 * @package Model
 */
class QueueDeclarer
{
    /**
     * @var string
     */
    private $queue = '';
    /**
     * @var bool
     */
    private $passive = false;
    /**
     * @var bool
     */
    private $durable = false;
    /**
     * @var bool
     */
    private $exclusive = false;
    /**
     * @var bool
     */
    private $auto_delete = true;
    /**
     * @var bool
     */
    private $nowait = false;
    /**
     * @var array
     */
    private $arguments = [];
    /**
     * @var null
     */
    private $ticket = null;

    /**
     * QueueDeclareBuilder constructor.
     * @param string $queue
     */
    public function __construct(string $queue)
    {
        $this->queue = $queue;
    }

    /**
     * @param bool $passive
     * @return $this
     */
    public function setPassive(bool $passive)
    {
        $this->passive = $passive;
        return $this;
    }

    /**
     * @param bool $durable
     * @return $this
     */
    public function setDurable(bool $durable)
    {
        $this->durable = $durable;
        return $this;
    }

    /**
     * @param bool $exclusive
     * @return $this
     */
    public function setExclusive(bool $exclusive)
    {
        $this->exclusive = $exclusive;
        return $this;
    }

    /**
     * @param bool $auto_delete
     * @return $this
     */
    public function setAutoDelete(bool $auto_delete)
    {
        $this->auto_delete = $auto_delete;
        return $this;
    }

    /**
     * @param bool $nowait
     * @return $this
     */
    public function setNowait(bool $nowait)
    {
        $this->nowait = $nowait;
        return $this;
    }

    /**
     * @param array $arguments
     * @return $this
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @param null $ticket
     * @return $this
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
        return $this;
    }

    /**
     * @param AMQPChannel $channel
     * @return void
     */
    public function declareQueueByParams(AMQPChannel $channel): void
    {
        $channel->queue_declare(
            $this->queue,
            $this->passive,
            $this->durable,
            $this->exclusive,
            $this->auto_delete,
            $this->nowait,
            $this->arguments,
            $this->ticket
        );
    }

}