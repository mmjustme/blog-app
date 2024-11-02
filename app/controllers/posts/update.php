<?php

$allowed_fields = ['title', 'excerpt', 'content'];
$postId = $_POST['id'];
$formData = load($allowed_fields);
//var_dump($formData);
$formData['id'] = $postId;
//var_dump($formData);
//die();
$form_rules = [
  'title' => ['required' => true, 'min' => 3, 'max' => 250],
  'excerpt' => ['required' => true, 'min' => 5, 'max' => 250],
  'content' => ['required' => true, 'min' => 10,],
];
//print_r($formData);
echo "AM i hre";
$validator = new \core\Validator();
$validation = $validator->validate($formData, $form_rules);

if (!$validation->hasErrors()) {
  if (getDb()->query("UPDATE posts SET title=:title, excerpt=:excerpt,content=:content WHERE id = :id",
    $formData)) {
    $_SESSION["success"] = "Post has updated";
    
    if ($_SESSION['post_data']) unset($_SESSION['post_data']);
  } else {
    $_SESSION["error"] = "DB error";
  }
  redirect("/posts?id=$postId");
} else {
  $post = $_SESSION['post_data'];
//  $post = getDb()->query('SELECT * from posts WHERE id = ?', [$postId])->find();

//  $post['title'] = $formData['title'];
//  $post['excerpt'] = $formData['excerpt'];
//  $post['content'] = $formData['content'];

  require VIEWS . "/posts/edit.tpl.php";
}

$title = "My BLOG :: EDIT POST";
//require VIEWS . "/posts/edit.tpl.php";




