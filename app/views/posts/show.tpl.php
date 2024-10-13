<?php require VIEWS . "/inc/header.inc.php" ?>

    <main class="main">
        <div class="container">
            <h1><?= $post['title'] ?></h1>
            <p>
              <?= $post["content"] ?>
            </p>
            <form action="/posts" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <button class="btn btn-primary">Delete Post</button>
            </form>
        </div>
    </main>

<?php require VIEWS . "/inc/footer.inc.php" ?>