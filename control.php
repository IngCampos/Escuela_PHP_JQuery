<?php session_start();
// Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
if (isset($_SESSION['usuario'])) {
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}
	$statement = $conexion->prepare('SELECT clases.id, materias.nombre, materias.descripcion, materias.grado, clases.hora FROM clases INNER JOIN materias ON clases.Id_materia=materias.Id WHERE clases.Id_maestro = :Id_maestro and materias.Id = :Id_clase');
	$statement->execute(array(
		':Id_maestro' => $_SESSION['usuario']['0'],
		':Id_clase' => $_GET['id_clase']
	));
	$resultado = $statement->fetch();
	if (isset($_POST["date"])) {
		// si hay datos enviados por post hace lo siguiente
		$fecha = $_POST["date"];
		unset($_POST["date"]); 
		// se guarda la fecha y se quita del arreglo de POST
		foreach($_POST as $id => $asistencia){
			// Recorre todos los registros para dar alta a los estudiantes
			$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
			$statement = $conexion->prepare('INSERT INTO asistencias(Id, Id_clase, Id_alumno, Fecha, Id_tipo_asistencia) VALUES(NULL , :Id_clase, :Id_alumno, :Fecha, :Id_tipo_asistencia)');
			$statement->execute(array(
			"Id_clase" => $_GET['id_clase'],
			':Id_alumno' => $id,
			':Fecha' => $fecha,
			":Id_tipo_asistencia" => $asistencia));
		}
	}
	if(!$resultado){
		// verifica que la clase a la que quiere entrar el maestro le pertenezca
		// de lo contrario lo regresa al menu principal
		header('Location: login.php');
	}
	require 'views/control.view.php';
} else {
	header('Location: ../login.php');
	die();
}
?>