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
	$is_new_data = true; //variable que determinara si los datos ya se han registrado o no
	if (isset($_POST["date"])) {
		// si hay datos enviados por post hace lo siguiente
		try {
			$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
		$statement = $connection->prepare('SELECT * FROM asistencias WHERE Id_clase = :Id_clase and Fecha = :Fecha');
		$statement->execute(array(
			':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING),
			':Fecha' => $_POST["date"]
		));
		$is_date_repeated = $statement->fetch();
		if (!$is_date_repeated) {

			// comprueba que la fecha y la clase no existan antes en la BD
			$date = $_POST["date"];
			unset($_POST["date"]);
			// se guarda la fecha y se quita del arreglo de POST
			foreach ($_POST as $id => $assistance) {
				// Recorre todos los registros para dar alta a los estudiantes
				$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
				$statement = $connection->prepare('INSERT INTO asistencias(Id, Id_clase, Id_alumno, Fecha, Id_tipo_asistencia) VALUES(NULL , :Id_clase, :Id_alumno, :Fecha, :Id_tipo_asistencia)');
				$statement->execute(array(
					"Id_clase" => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING),
					':Id_alumno' => $id,
					':Fecha' => $date,
					":Id_tipo_asistencia" => $assistance
				));
			}
			echo "<script>alert('Datos guardados exitosamente')</script>";
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
