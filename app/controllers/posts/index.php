<?php

global $db;


$posts = $db->query("SELECT * FROM posts ORDER BY id DESC")->findAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 5")->findAll();
// dd($posts);

require VIEWS . "/posts/index.tpl.php";