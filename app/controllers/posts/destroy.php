<?php

$postId = $_POST['id'];
$user_id = $_POST['user_id'];
var_dump((int)$user_id);
var_dump($_SESSION['user']['id']);

if ($user_id == $_SESSION['user']['id']) {
  \models\Posts::deletePostById($postId);
} else {
  echo "Denied";
}


if (getDb()->rowCount()) {
  $res['answer'] = $_SESSION['success'] = "Post has deleted";
} else {
  $res['answer'] = $_SESSION['error'] = "Deleting error";
}

header("Location: " . '/');
die();