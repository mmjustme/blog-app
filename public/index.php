<?php

ini_set('display_errors', 1);
session_start();

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

require dirname(__DIR__) . "/config/config.php";

$dotenv = Dotenv::createImmutable(ROOT);
$dotenv->load();

require __DIR__ . "/bootstrap.php";
require APP . "/core/funcs.php";

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
