<?php require 'bootstrap.php'; ?>
<?php 
//proveravamo da li je poslat id od posta koje treba da se obrise i da li je korisnik ulogovan!!!
if (isset($_GET['post_id']) && $_SESSION['loggedUser']) {
	//prosledjujemo id posta iz get promenljive!!!
	$post->deletePost($_GET['post_id']);
}
$posts = $post->selectAll('posts');


?>

<?php require_once 'views/index_view.php'; ?>