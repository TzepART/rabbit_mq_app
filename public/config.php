<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-06
 * Time: 18:43
 */

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();