<?php
global $db;

$id = $_GET['id'] ?? 0;

$post = $db->query("SELECT * FROM posts WHERE id=? LIMIT 1", [$id])->find();

require VIEWS . "/posts/show.tpl.php";
