<?php

$title = 'My Blog :: Register';

$data = load(['name', 'email', 'password']);

//dump($_POST); // data from form
//dump($_FILES); // files

# check if file exist. Add to data array
(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0)
  ? $data['avatar'] = $_FILES['avatar']
  : $data['avatar'] = [];

//dump($data); // form data after fn load
//die;

$form_rules = [
  'name' => ['min' => 3, 'max' => 100, 'required' => true],
  'email' => ['min' => 3, 'max' => 100, 'required' => true, 'unique' => 'users:email'],
  'password' => ['min' => 6, 'required' => true],
  'avatar' => ['ext' => 'jpg|gif',
    'size' => 1_048_576,
//    'required' => true
  ]
];

$validator = new \core\Validator();
$validation = $validator->validate($data, $form_rules);

dd($validation->getErrors());

if (!$validation->hasErrors()) {
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  if (\models\Users::createUser($data)) {
    $_SESSION['success'] = 'User has been successful registered';
  } else {
    $_SESSION['error'] = 'DB error';
  }
  redirect('/login');
} else {
  require VIEWS . '/users/register.tpl.php';
}