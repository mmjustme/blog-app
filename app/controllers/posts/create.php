<?php

// dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $allowed_fields = ['title', 'excerpt', 'content'];

    $formData = checkAllowedFields($allowed_fields);
    // dd($formData);

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
        $db->query(
            "INSERT INTO posts (`title`,`content`,`excerpt`) VALUES (:title,:content,:excerpt)",
            $formData
        );
    }
}

$title = "My BLOG :: NEW POST";

require VIEWS . "/posts/create.tpl.php";
