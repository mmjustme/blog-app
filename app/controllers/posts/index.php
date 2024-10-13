<?php

$posts = getDb()->query("SELECT * FROM posts ORDER BY id DESC")->findAll();
$recent_posts = getDb()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 5")->findAll();

require VIEWS . "/posts/index.tpl.php";
