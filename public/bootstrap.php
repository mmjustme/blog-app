<?php

$container = new \core\ServiceContainer();

$container->setService(\core\Db::class, function () {
  $db_config = require CONFIG . "/db.php";
  return (\core\Db::getInstance())->getConnection($db_config);
});

\core\App::setContainer($container);