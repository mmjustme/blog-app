<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="<?= PATH ?>/">
	<link rel="stylesheet" href="public/assets/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<title>
    <?php echo $title ?? "BLOG" ?>
	</title>
</head>

<body>
<div class="wrapper">
	<header class="header">

		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<a class="navbar-brand" href="">BLOG</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="posts/create">New Post</a>
						</li>
					</ul>
					<ul class="navbar-nav mb-2 mb-lg-0">
            <?php if (checkAuth()): ?>
							<li class="nav-item"><a class="nav-link" href="#">
                  <?= $_SESSION['user']['name'] ?>
								</a></li>
							<li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            <?php else: ?>
							<li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
							<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            <?php endif ?>
					</ul>
				</div>
			</div>
		</nav>

	</header>
<?php get_alerts() ?>