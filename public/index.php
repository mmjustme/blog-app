<?php

ini_set('display_errors', 1);
session_start();

require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . '/../vendor/autoload.php';


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(ROOT);
$dotenv->load();

require_once __DIR__ . "/bootstrap.php";
require APP . "/core/funcs.php";

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
