<?php session_start();

session_destroy();
$_SESSION = array();// la sesion la dejamos vacia por seguridad

header('Location: login.php');
die();

?>