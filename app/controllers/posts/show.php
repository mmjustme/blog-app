<?php
$title = setPageTitle('post');
$id = $_GET['id'] ?? 0;

$post = \models\Posts::getPostById($id);

require VIEWS . "/posts/show.tpl.php";
