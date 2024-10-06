<?php require VIEWS . "/inc/header.inc.php" ?>

<main class="main">
    <div class="container">
        <h1>New Post</h1>

        <form action="/posts" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input name="title" type="text" class="form-control" id="title" placeholder="Post Title">

                <?php if (isset($errors['title'])): ?>
                    <div class="invalid-feedback d-block">
                        <?= $errors['title'] ?>
                    </div>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea name="excerpt" class="form-control" id="excerpt" rows="2" placeholder="Excerpt"></textarea>

                <?php if (isset($errors['excerpt'])): ?>
                    <div class="invalid-feedback d-block">
                        <?= $errors['excerpt'] ?>
                    </div>
                <?php endif ?>

            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5"
                    placeholder="Post Content"></textarea>

                <?php if (isset($errors['content'])): ?>
                    <div class="invalid-feedback d-block">
                        <?= $errors['content'] ?>
                    </div>
                <?php endif ?>

            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Create Post</button>
            </div>
        </form>

    </div>
</main>

<?php require VIEWS . "/inc/footer.inc.php" ?>