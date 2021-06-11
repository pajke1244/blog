<?php require_once 'partials/top.php'; ?>
<nav class="navbar navbar-expand navbar-light bg-light">
	<a href="" class="navbar-brand">Blogger</a>
	<ul class="navbar-nav ms-auto">
		<!-- ovde proveravamo da li je korisnik logovan, ako jeste, prikazace se deo kod od 7-12 linije koda -->
		<?php if (isset($_SESSION['loggedUser'])): ?>
			<li class="nav-item">
				<a href="add_post.php" class="nav-link">Add Post</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
			<li class="nav-item">
				<a href="index.php" class="btn btn-warning"><?php echo $_SESSION['loggedUser']->name; ?></a>
			</li>
		<?php else: ?>
			<li class="nav-item">
				<a href="login_register.php" class="nav-link">Login/Register</a>
			</li>
		<?php endif ?>


	</ul>
</nav>
<div class="bg-warning p-5 rounded-lg text-center">
	<h4>Blogger Posts</h4>
</div>
<!-- prikaz svih oglasa -->
<div class="container">
	<div class="row">
		<div class="col-8 offset-2">
			<?php foreach ($posts as $post): ?>
				<div class="card mt-3">
					<div class="card-header">
						<h3 class="text-center"><?php echo $post->title; ?>
						<!-- ako je neko uopste logovan i ako je taj koji je logovan vlasnik tog posta, ima mogucnosta da ga obrise -->
						<small class="float-end">
							<?php if (isset($_SESSION['loggedUser']) && $post->user_id == $_SESSION['loggedUser']->id): ?>
								<a href="index.php?post_id=<?php echo $post->id; ?>" class="btn btn-danger">remove</a>
							<?php endif ?>
						</small></h3>
					</div>
					<div class="card-body"><?php echo $post->description; ?></div>
					<div class="card-footer">
						<button class="btn btn-info btn-sm float-end"><?php $date = date_create($post->created_at); echo date_format($date,"Y-m-d"); ?></button>
						<button class="btn btn-warning btn-sm float-start">
							<?php 
							echo $user->getUserWithId($post->user_id)->name;

							?>
						</button>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
<?php require_once 'partials/bottom.php'; ?>

