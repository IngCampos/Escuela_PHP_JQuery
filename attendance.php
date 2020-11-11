<?php
session_start();
require 'session_cache_expire().php';
// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['user'])) {
	try {
		$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
	} catch (PDOException $e) {
		echo "Error: {$e->getMessage()}";
	}
	$statement = $connection->prepare(
		'SELECT class.id, subjects.name, subjects.description, subjects.grade, class.hour 
		FROM class INNER JOIN subjects ON class.subject_id=subjects.id 
		WHERE class.teacher_id = :teacher_id and subjects.id = :class_id'
	);
	$statement->execute(array(
		':teacher_id' => $_SESSION['user']['0'],
		':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING),
	));
	$user = $statement->fetch();
	if (!$user) {
		// verifica que la clase a la que quiere entrar el maestro le pertenezca
		// de lo contrario lo regresa al menu principal
		header('Location: login.php');
	} else
		require 'views/attendance.view.php';
} else {
	header('Location: ../login.php');
	die();
}
