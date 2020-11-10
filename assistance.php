<?php
session_start();
require 'session_cache_expire().php';
// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {
	try {
		$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}
	$statement = $connection->prepare('SELECT clases.id, materias.nombre, materias.descripcion, materias.grado, clases.hora FROM clases INNER JOIN materias ON clases.Id_materia=materias.Id WHERE clases.Id_maestro = :Id_maestro and materias.Id = :Id_clase');
	$statement->execute(array(
		':Id_maestro' => $_SESSION['usuario']['0'],
		':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING),
	));
	$user = $statement->fetch();
	if (!$user) {
		// verifica que la clase a la que quiere entrar el maestro le pertenezca
		// de lo contrario lo regresa al menu principal
		header('Location: login.php');
	} else
		require 'views/asistencias.view.php';
} else {
	header('Location: ../login.php');
	die();
}
