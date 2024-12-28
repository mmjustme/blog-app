<?php

$title = 'My Blog :: Register';

$data = load(['name', 'email', 'password']);

# check if file exist. Add to data array
(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0)
  ? $data['avatar'] = $_FILES['avatar']
  : $data['avatar'] = [];


$form_rules = [
  'name' => ['min' => 3, 'max' => 100, 'required' => true],
  'email' => ['min' => 3, 'max' => 100, 'required' => true, 'unique' => 'users:email'],
  'password' => ['min' => 6, 'required' => true],
  'avatar' => [
    'ext' => 'jpg|gif|png',
    'size' => 1_048_576,
    //    'required' => true // optinal
  ]
];

$validator = new \core\Validator();
$validation = $validator->validate($data, $form_rules);


if (!$validation->hasErrors()) {
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  if (\models\Users::createUser([$data['name'], $data['email'], $data['password']])) {
    if (!empty($data['avatar']['name'])) {
      $id = getDb()->getInsertId();
      $fileExt = getFileExt($data['avatar']['name']);

      $dir = '/avatars/' . date("Y") . "/" . date('m') . "/" . date('d');

      if (!is_dir($dir)) {
        mkdir(UPLOADS . $dir, 0755, true);
      }
      $file_path = UPLOADS . "{$dir}/avatar-{$id}.{$fileExt}";
      $file_url = "/uploads$dir/avatar-{$id}.{$fileExt}";
      if (move_uploaded_file($data['avatar']['tmp_name'], $file_path)) {
        \models\Users::setUserAvatar([$file_url, $id]);
      } else {
        echo "error upload file";
      }
    }


    $_SESSION['success'] = 'User has been successful registered';
  } else {
    $_SESSION['error'] = 'DB error';
  }
  redirect(BASE_URL . '/login');
} else {
  require VIEWS . '/users/register.tpl.php';
}
