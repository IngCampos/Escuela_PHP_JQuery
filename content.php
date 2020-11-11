<?php
session_start();
require 'session_cache_expire().php';

// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['user'])) {
	require 'views/content.view.php';
} else {
	header('Location: login.php');
	die();
}
