<?php

ini_set('display_errors', 1);
session_start();

require __DIR__ . '/../vendor/autoload.php';
require dirname(__DIR__) . "/config/config.php";
require __DIR__ . "/bootstrap.php";
require CORE . "/funcs.php";

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
