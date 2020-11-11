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
		':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
	));
	$user = $statement->fetch();
	if (!$user) {
		// verifica que la clase a la que quiere entrar el maestro le pertenezca
		// de lo contrario lo regresa al menu principal
		header('Location: login.php');
	} else {
		$statement2 = $connection->prepare(
			'SELECT * FROM student_class INNER JOIN users ON student_class.student_id=users.id 
			WHERE student_class.class_id = :class_id and student_class.student_id = :student_id'
		);
		$statement2->execute(array(
			':student_id' => filter_var(strtolower($_GET['student_id']), FILTER_SANITIZE_STRING),
			':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
		));
		$students = $statement2->fetch();
		if (!$students) {
			header('Location: login.php');
		} else
			if ($_POST != null) {
			foreach ($_POST as $date => $attendance) {
				// Recorre todos los registros para modificar las attendance
				$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
				$statement = $connection->prepare(
					'UPDATE attendance SET type_attendance_id=:attendance 
					WHERE date=:date and student_id=:student_id'
				);
				$statement->execute(array(
					':date' => $date,
					':student_id' => filter_var(strtolower($_GET['student_id']), FILTER_SANITIZE_STRING),
					':attendance' => $attendance
				));
			}
			header("Location: attendance.php?class_id={$_GET['class_id']}");
		}
		require 'views/attendance_edit.view.php';
	}
} else {
	header('Location: ../login.php');
	die();
}
