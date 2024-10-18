<?php

/** @var \core\Router $router */

const MIDDLEWARE = [
  'auth' => \core\middlewares\Auth::class,
  'guest' => \core\middlewares\Guest::class
];

//Posts
$router->get('', 'posts/index.php');
$router->get('posts', 'posts/show.php');
$router->get('posts/create', 'posts/create.php')->only('auth');
$router->post('posts', 'posts/store.php');
$router->delete('posts', 'posts/destroy.php')->only('auth');

//Users
$router->get('register', 'users/register.php')->only('guest');
$router->get('login', 'users/login.php')->only('guest');
$router->get('logout', 'users/logout.php');

//dump($router->routes);