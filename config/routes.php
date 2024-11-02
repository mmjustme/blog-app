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

$router->get('posts/edit', 'posts/edit.php')->only('auth');
$router->post('posts/update', 'posts/update.php');

$router->delete('posts', 'posts/destroy.php')->only('auth');

//Users
$router->get('register', 'users/register.php')->only('guest');
$router->post('register', 'users/store.php')->only('guest');
$router->add('login', 'users/login.php', ['get', 'post'])->only('guest');
$router->get('logout', 'users/logout.php');

//dump($router->routes);