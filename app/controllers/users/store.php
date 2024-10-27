<?php

$title = 'My Blog :: Register';

$data = load(['name', 'email', 'password']);

$form_rules = [
  'name' => ['min' => 3, 'max' => 100, 'required' => true],
  'email' => ['min' => 3, 'max' => 100, 'required' => true, 'unique' => 'users:email'],
  'password' => ['min' => 6, 'required' => true],
];

$validator = new \core\Validator();
$validation = $validator->validate($data, $form_rules);

if (!$validation->hasErrors()) {
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  if (getDb()->query("INSERT INTO users (`name`,`email`,`password`) 
    VALUES (:name,:email,:password)", $data)) {
    $_SESSION['success'] = 'User has been successful registered';
  } else {
    $_SESSION['error'] = 'DB error';
  }
  redirect('/login');
} else {
  require VIEWS . '/users/register.tpl.php';
}