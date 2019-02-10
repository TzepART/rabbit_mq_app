Project for researching of RabbitMQ opportunities
==================================== 

* [Tutorial for PHP](http://www.rabbitmq.com/tutorials/tutorial-one-php.html)
* [Examples](https://github.com/rabbitmq/rabbitmq-tutorials/tree/master/php)

## Setup
For download Php library for RabbitMQ run

``
composer install
``

Declare environment variables for RabbitMQ.
For this, you should copy `.env.dist` as `.env`:

``
cp .env.dist .env
``

... and set needed environment variables.

## Usage
For start RabbitMQ with using Docker

``
 docker-compose up
``

... or run as daemon

``
 docker-compose up -d
``

Lessons:
* [Lesson 1 - Hello World!](http://www.rabbitmq.com/tutorials/tutorial-one-php.html) - [Code source](public/part_1_hello)
* [Lesson 2 - Work Queues](http://www.rabbitmq.com/tutorials/tutorial-two-php.html) - [Code source](public/part_2_work_queues)
* [Lesson 3 - Publish/Subscribe](http://www.rabbitmq.com/tutorials/tutorial-three-php.html) - [Code source](public/part_3_publish_subscribe)
* [Lesson 4 - Routing](http://www.rabbitmq.com/tutorials/tutorial-four-php.html) - [Code source](public/part_4_routing)
