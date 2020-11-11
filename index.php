<?php
session_start();
require 'session_cache_expire().php';

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['user'])) {
	header('Location: content.php');
	die();
} else {
	// Enviamos al user al form de registro
	header('Location: login.php');
}
