<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	die();
}//lo ideal en un proyecto grande es poner esta funcion en otro archivo y llamarlo, ya que se esta replicando el mismo codigo en todas las vistas

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Id = $_POST['id'];
	$Contraseña = hash('sha512', 'escuela_bd' . $_POST['contraseña']);
	// Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}
	$statement = $conexion->prepare('SELECT * FROM usuarios INNER JOIN tipo_usuario ON usuarios.Id_tipo_usuario=tipo_usuario.Id WHERE usuarios.Id = :Id AND usuarios.Pass = :Pass');
	$statement->execute(array(
		':Id' => $Id,
		':Pass' => $Contraseña
	));
	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $resultado;
		// Guarda la informacion del usuario para mas adelante no volver a consultar
		header('Location: index.php');
	} else {
		$errores = '<li>Datos incorrectos</li>';
	}
}

require 'views/login.view.php';

?>