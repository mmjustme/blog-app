<?php
ini_set('display_errors', 1);

require dirname(__DIR__) . "/config/config.php";
require CORE . "/funcs.php";
require CORE . "/classes/DB.php";
$db_config = require CONFIG . "/db.php";

$db = new \core\Db($db_config);
// dd($db);


require CORE . "/router.php";