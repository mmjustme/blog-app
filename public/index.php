<?php

ini_set('display_errors', 1);
session_start();

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require dirname(__DIR__) . "/config/config.php";
require __DIR__ . "/bootstrap.php";
require APP . "/core/funcs.php";

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
