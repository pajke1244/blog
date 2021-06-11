<?php 
session_start();
// bootstrap znaci kada se podize sama aplikacija, pokreni ovaj fajl!!!
$config= require 'config.php';
require "classes/Connection.php";
//prosledjujemo iz samog config-a array!!!
$db = Connection::connect($config['database']);

require "classes/QueryBuilder.php";
require "classes/User.php";
require "classes/Post.php";

$query = new QueryBuilder($db);
//pravimo instancu usera
$user = new User($db);
//pravimo instancu post-a
$post = new Post($db);
?>