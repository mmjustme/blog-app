<?php

ini_set('display_errors', 1);

require dirname(__DIR__) . "/config/config.php";
require CORE . "/funcs.php";
require CORE . "/classes/DB.php";

$db_config = require CONFIG . "/db.php";
$db = \core\Db::getInstance()->getConnection($db_config);


require CORE . "/router.php";
