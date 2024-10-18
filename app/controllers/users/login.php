<?php

$title = 'My Blog :: Login';

$_SESSION['user']['name'] = 'Dmytro';
redirect('/');

require_once VIEWS . '/users/login.tpl.php';