<?php
$allowed_fields = ['title', 'excerpt', 'content'];

$formData = load($allowed_fields);
$formData['user_id'] = $_SESSION['user']['id'];

$form_rules = [
  'title' => ['required' => true, 'min' => 3, 'max' => 250],
  'excerpt' => ['required' => true, 'min' => 5, 'max' => 250],
  'content' => ['required' => true, 'min' => 10,],
];

$validator = new \core\Validator();
$validation = $validator->validate($formData, $form_rules);

if (!$validation->hasErrors()) {
  if (\models\Posts::createPost($formData)) {
    $_SESSION["success"] = "Post has created";
  } else {
    $_SESSION["error"] = "DB error";
  }
  redirect(BASE_URL . '/');
} else {
  require VIEWS . "/posts/create.tpl.php";
}

$title = "My BLOG :: NEW POST";
require VIEWS . "/posts/create.tpl.php";
