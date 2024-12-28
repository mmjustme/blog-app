<?php

$title = setPageTitle('editPost');

$post = \models\Posts::getPostById($_GET['id']);

$_SESSION['post_data'] = $post;

require VIEWS . "/posts/edit.tpl.php";
