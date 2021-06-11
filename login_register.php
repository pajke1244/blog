<?php
require_once 'bootstrap.php';
//proveravamo da li je korisnik ulogovan
if (isset($_SESSION['loggedUser'])) {
    header("Location: index.php");
}

//proveravamo da li je pritisnuto dugme za registraciju
if (isset($_POST['register_btn'])) {
    $user->registerUser();
    
}

if (isset($_POST['login_btn'])) {
    $user->logUser();
}
require_once 'views/login.register.view.php';
 ?>