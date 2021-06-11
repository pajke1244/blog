<?php 

require_once 'bootstrap.php';
if (!isset($_SESSION['loggedUser'])) {
	header("Location: index.php");
}
if (isset($_POST['btn_post'])) {
	//create post

	$post->createPost();
}
require_once 'views/add_post_view.php';


?>