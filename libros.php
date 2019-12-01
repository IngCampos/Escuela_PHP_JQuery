<?php 
session_start();
require 'session_cache_expire().php';

// Comprobamos tenga sesion y sea maestro, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['Titulo']=="Administrador") {
	header('Location: libros/agregarlibro.php');
} else {
	header('Location: login.php');
	die();
}
?>