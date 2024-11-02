<?php
$title = "My BLOG :: EDIT POST";

$post = getDb()->query('SELECT * from posts WHERE id = ?', [$_GET['id']])->find();
$_SESSION['post_data'] = $post;


require VIEWS . "/posts/edit.tpl.php";