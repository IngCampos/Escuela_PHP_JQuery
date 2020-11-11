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
	$is_new_data = true; //variable que determinara si los datos ya se han registrado o no
	if (isset($_POST["date"])) {
		// si hay datos enviados por post hace lo siguiente
		try {
			$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
		} catch (PDOException $e) {
			echo "Error: {$e->getMessage()}";
		}
		$statement = $connection->prepare(
			'SELECT * FROM attendance 
			WHERE class_id = :class_id and date = :date'
		);
		$statement->execute(array(
			':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING),
			':date' => $_POST["date"]
		));
		// TODO: fix the bug, when some teacher register attendance, it is not saved
		$is_date_repeated = $statement->fetch();
		if (!$is_date_repeated) {

			// comprueba que la fecha y la clase no existan antes en la BD
			$date = $_POST["date"];
			unset($_POST["date"]);
			// se guarda la fecha y se quita del arreglo de POST
			foreach ($_POST as $id => $attendance) {
				// Recorre todos los registros para dar alta a los estudiantes
				$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
				$statement = $connection->prepare(
					'INSERT INTO attendance(id, class_id, student_id, date, type_attendance_id) 
					VALUES(NULL , :class_id, :student_id, :date, :type_attendance_id)'
				);
				$statement->execute(array(
					"class_id" => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING),
					':student_id' => $id,
					':date' => $date,
					":type_attendance_id" => $attendance
				));
			}
			echo "<script>alert('Data saved successfuly')</script>";
		} else $is_new_data = false;
	}
	if (!$user) {
		// verifica que la clase a la que quiere entrar el maestro le pertenezca
		// de lo contrario lo regresa al menu principal
		header('Location: login.php');
	}
	require 'views/control.view.php';
} else {
	header('Location: ../login.php');
	die();
}
