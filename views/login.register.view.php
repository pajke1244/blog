<?php require_once 'partials/top.php'; ?>
<nav class="navbar navbar-expand navbar-light bg-light">
	<a href="" class="navbar-brand">Blogger</a>
	<ul class="navbar-nav ms-auto">
		<li class="nav-item">
			<a href="index.php" class="nav-link">Back to Blog</a>
		</li>
	</ul>
</nav>
<div class="bg-info p-5 rounded-lg text-center">
	<h4>Login/Register</h4>
</div>
<div class="container">
	<!-- jedan red i 2 kolone!!! -->
	<div class="row">
		<div class="col-6">
			<h4 class="mb-5">Login</h4>
			<form action="login_register.php" method="POST">
				<input type="email" name="login_email" placeholder="email" class="form-control" required><br>
				<input type="password" name="login_password" placeholder="password" class="form-control" required><br><br>
				<button class="form-control btn btn-success" type="submit" name="login_btn">Login</button>
			</form>
			<?php if ($user->login_result): ?>
				<div class="alert alert-success text-center">Uspesno logovanje <a href="index.php">Idi na blog</a></div>
			<?php elseif(isset($_POST['login_btn'])): ?>
				<div class="alert alert-danger text-center">Username i password su pogresni</div>
			<?php endif ?>
		</div>
		<div class="col-6">
			<h4>Register</h4>
			<form action="login_register.php" method="POST">
				<input type="text" name="register_name" placeholder="name" class="form-control" required><br>
				<input type="email" name="register_email" placeholder="email" class="form-control" required><br>
				<input type="password" name="register_password" placeholder="password" class="form-control" required><br>
				<button class="form-control btn btn-primary" type="submit" name="register_btn">Register</button>
			</form>
			<?php if ($user->register_result): ?>
				<div class="alert alert-success">Uspesna registracija!!!</div>
			<?php endif ?>

		</div>		
	</div>
</div>
<?php require_once 'partials/bottom.php'; ?>