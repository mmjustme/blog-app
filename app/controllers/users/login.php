<?php

$title = 'My Blog :: Login';

if ($_SERVER["REQUEST_METHOD"] === "POST") {


  $data = load(['email', 'password']);
  $form_rule = [
    'email' => ['email' => true, 'min' => 3],
    'password' => ['required' => true],
  ];

  $validator = new \core\Validator();
  $validation = $validator->validate($data, $form_rule);

  if (!$validation->hasErrors()) {
    $user = \models\Users::getUserByEmail($data['email']);

    if (!$user) {
      $_SESSION['error'] = "Wrong email or password";
      redirect();
    }

    if (!password_verify($data['password'], $user['password'])) {
      $_SESSION['error'] = "Wrong email or password";
      redirect();
    }

    foreach ($user as $key => $value) {
      if ($key != 'password') {
        $_SESSION['user'][$key] = $value;
      }
    }

    $_SESSION['success'] = 'Successful authorized';
    redirect(BASE_URL . '/');
  }
}

require_once VIEWS . '/users/login.tpl.php';
