<?php require VIEWS . '/inc/header.inc.php' ?>

	<main class="main py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4 m-auto">
					<h1>Login Page</h1>

					<form action="/login" method="post">
						<div class="mb-3">

							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input name="email" type="email" class="form-control" id="email" placeholder="Email">
                <?= isset($validation) ? $validation->listErrors("email") : ''; ?>
							</div>

							<div class=" mb-3">
								<label for="password" class="form-label">Password</label>
								<input name="password" type="password" class="form-control" id="password" rows="2"
											 placeholder="Password">
                <?= isset($validation) ? $validation->listErrors("password") : ''; ?>
							</div>

							<div class="mb-3">
								<button class="btn btn-primary">Login</button>
							</div>
					</form>

				</div>
			</div>
		</div>

	</main>

<?php require VIEWS . '/inc/footer.inc.php' ?>