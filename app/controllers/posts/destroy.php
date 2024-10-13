<?php

$postId = $_POST['id'];

getDb()->query("DELETE FROM posts WHERE id = ?", [$postId]);

if (getDb()->rowCount()) {
  $res['answer'] = $_SESSION['success'] = "Post deleted";
} else {
  $res['answer'] = $_SESSION['error'] = "Deleting error";
}

header("Location: " . '/');
die();