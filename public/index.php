<?php

ini_set('display_errors', 1);
session_start();

require dirname(__DIR__) . "/config/config.php";
require CORE . '/../autoload.php';
require "bootstrap.php";
require CORE . "/funcs.php";

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
