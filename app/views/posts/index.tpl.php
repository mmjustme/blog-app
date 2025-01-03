<?php require VIEWS . "/inc/header.inc.php" ?>

<main class="main">
	<div class="container">
		<div class="row">
			<div class="col-8">
				<?php foreach ($posts as $post): ?>
					<div class="card mb-3">
						<div class="card-body">
							<a href="posts?id=<?php echo $post['id'] ?>">
								<h5 class="card-title">
									<?= $post["title"] ?>
								</h5>
							</a>
							<p class="card-text">
								<?= $post["content"] ?>
							</p>
							<div class="text-end fw-light">
								<p class="mb-0">Creator: <?= $post['creator'] ?></p>
								<p class="mb-0">Created: <?= $post['created_at'] ?></p>
							</div>


						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="col-4">
				<ul class="list-group">
					<?php foreach ($recent_posts as $recent_post): ?>

						<li class="list-group-item">
							<a href="posts?id=<?= $recent_post["id"] ?>">
								<?= $recent_post["title"] ?>
							</a>
						</li>

					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</main>

<?php require VIEWS . "/inc/footer.inc.php" ?>