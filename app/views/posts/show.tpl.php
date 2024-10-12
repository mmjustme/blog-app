<?php require VIEWS . "/inc/header.inc.php" ?>

<main class="main">
    <div class="container">
        <h1><?= $post['title'] ?></h1>
        <p>
            <?= $post["content"] ?>
        </p>
    </div>
</main>

<?php require VIEWS . "/inc/footer.inc.php" ?>