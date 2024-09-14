<?php


$posts = $db->query("SELECT * FROM posts")->findAll();
$recent_posts = $db->query("SELECT * FROM posts ORDER BY created_at LIMIT 5")->findAll();
// dd($posts);

require VIEWS . "/index.tpl.php";

