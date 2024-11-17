<?php

use Carbon\Carbon;

$posts = \models\Posts::getAllPosts();
$recent_posts = \models\Posts::getRecentPosts();

foreach ($posts as &$post) {
    $post['created_at'] = Carbon::parse($post['created_at'])->diffForHumans();
}


require VIEWS . "/posts/index.tpl.php";
