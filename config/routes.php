<?php

/** @var \core\Router $router */

//Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php');

//Users
$router->get('register', 'users/register.php');
$router->get('login', 'users/login.php');
$router->get('logout', 'users/logout.php');

//dump($router->routes);