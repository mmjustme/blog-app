<?php

$userId = $_SESSION['user']['id'];

$posts = \models\Posts::getUserPosts($userId);

require VIEWS . '/users/userPosts.tpl.php';