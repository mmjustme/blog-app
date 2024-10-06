<?php

ini_set('display_errors', 1);

require dirname(__DIR__) . "/config/config.php";
require CORE . "/funcs.php";
require CORE . '/../autoload.php';

$db_config = require CONFIG . "/db.php";
$db = \core\Db::getInstance()->getConnection($db_config);

$router = new \core\Router();

require CONFIG . '/routes.php';
$router->match();
// dd($router->routes);

// require CORE . "/router.php";
