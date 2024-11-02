<?php

$postId = $_POST['id'];

\models\Posts::deletePostById($postId);

if (getDb()->rowCount()) {
  $res['answer'] = $_SESSION['success'] = "Post has deleted";
} else {
  $res['answer'] = $_SESSION['error'] = "Deleting error";
}

header("Location: " . '/');
die();