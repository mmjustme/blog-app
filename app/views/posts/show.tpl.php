<?php require VIEWS . "/inc/header.inc.php" ?>

	<main class="main">
		<div class="container">
			<h1><?= $post['title'] ?></h1>
			<p>
        <?= $post["content"] ?>
			</p>
			<div class="d-flex justify-content-between">
				<form action="/posts" method="post">
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="id" value="<?= $post['id'] ?>">
					<button class="btn btn-primary">Delete Post</button>
				</form>
				<form action="/posts/edit" method="get">
					<input type="hidden" name="id" value="<?= $post['id'] ?>">
					<button class="btn btn-warning">Edit Post</button>
				</form>
			</div>
		</div>
	</main>

<?php require VIEWS . "/inc/footer.inc.php" ?>