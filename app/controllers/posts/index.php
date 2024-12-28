<?php

$title = setPageTitle('home');
$posts = \models\Posts::getAllPosts();
$recent_posts = \models\Posts::getRecentPosts();

require VIEWS . "/posts/index.tpl.php";
