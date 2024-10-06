<?php

// $routes = [
//     "" => "index.php",
//     "posts" => "posts.php",
//     "posts/create" => "post-create.php",
// ];

$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');

$router->get('posts/create', 'posts/create.php');
$router->post('posts', 'posts/store.php');

// $router->delete('posts', 'posts/destroy.php');
