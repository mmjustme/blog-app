<?php

$allowed_fields = ['title', 'excerpt', 'content'];

$formData = load($allowed_fields);
$form_rules = [
  'title' => ['required' => true, 'min' => 3, 'max' => 250],
  'excerpt' => ['required' => true, 'min' => 5, 'max' => 250],
  'content' => ['required' => true, 'min' => 10,],
];

$validator = new \core\Validator();
$validation = $validator->validate($formData, $form_rules);

if (!$validation->hasErrors()) {
  if (getDb()->query("INSERT INTO posts (`title`,`content`,`excerpt`) 
                            VALUES (:title,:content,:excerpt)", $formData)) {
    $_SESSION["success"] = "Post has created";
  } else {
    $_SESSION["error"] = "DB error";
  }
  redirect('/');
} else {
  require VIEWS . "/posts/create.tpl.php";
}

$title = "My BLOG :: NEW POST";
require VIEWS . "/posts/create.tpl.php";



