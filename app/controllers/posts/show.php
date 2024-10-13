<?php

$id = $_GET['id'] ?? 0;

$post = getDb()->query("SELECT * FROM posts WHERE id=? LIMIT 1", [$id])->find();

require VIEWS . "/posts/show.tpl.php";
