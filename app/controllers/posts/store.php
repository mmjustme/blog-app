<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $allowed_fields = ['title', 'excerpt', 'content'];

  $formData = checkAllowedFields($allowed_fields);

  $errors = [];
  if (empty($formData["title"])) {
    $errors["title"] = "Title is requered";
  }
  if (empty($formData["content"])) {
    $errors["content"] = "Content is requered";
  }
  if (empty($formData["excerpt"])) {
    $errors["excerpt"] = "Excerpt is requered";
  }

  if (empty($errors)) {
    getDb()->query(
      "INSERT INTO posts (`title`,`content`,`excerpt`) VALUES (:title,:content,:excerpt)",
      $formData
    );
    header("Location: " . '/');
  }
}
