<?php require VIEWS . "/inc/header.inc.php" ?>

<main class="main">
	<div class="container">
		<h1>Edit Post</h1>

		<form action="posts/update" method="post">
			<div class="mb-3">
				<label for="title" class="form-label">Post Title</label>
				<input name="title" type="text" class="form-control" id="title" placeholder="Post Title"
					value="<?= $post['title'] ?>">
				<?= isset($validation) ? $validation->listErrors("title") : ''; ?>
			</div>

			<div class=" mb-3">
				<label for="excerpt" class="form-label">Excerpt</label>
				<input name="excerpt" class="form-control" id="excerpt" rows="2" placeholder="Excerpt"
					value="<?= $post['excerpt'] ?>">
				<?= isset($validation) ? $validation->listErrors("excerpt") : ''; ?>
			</div>

			<div class="mb-3">
				<label for="content" class="form-label">Content</label>
				<textarea name="content" type="text" class="form-control" id="content" rows="5"
					placeholder="Post Content"><?= $post["content"] ?></textarea>

				<?= isset($validation) ? $validation->listErrors("content") : ''; ?>
			</div>


			<div class="mb-3">
				<input type="hidden" name="id" value="<?= $post['id'] ?>">
				<!--					<input type="hidden" name="_method" value="update">-->
				<button class="btn btn-primary">Edit Post</button>
			</div>
		</form>

	</div>
</main>

<?php require VIEWS . "/inc/footer.inc.php" ?>