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
		$errores = '<li>Error de parte del servidor, vuelve a intentarlo mas tarde</li>';
	}
	$intentos = $conexion->prepare('SELECT COUNT(*) FROM intentos_sesion WHERE Id_usuario = :Id and Credenciales_correctas=0 and Request_time > :Request_time');
	$intentos->execute(array(
		':Id' => $Id,
		':Request_time'=> $_SERVER["REQUEST_TIME"] - ($Tiempo_tolerancia*60)
	));
	$numero_intentos = $intentos->fetch();
	echo $numero_intentos["COUNT(*)"];
	if($numero_intentos["COUNT(*)"]<$Intentos_tolerancia){
		$statement = $conexion->prepare('SELECT * FROM usuarios INNER JOIN tipo_usuario ON usuarios.Id_tipo_usuario=tipo_usuario.Id WHERE usuarios.Id = :Id AND usuarios.Pass = :Pass');
		$statement->execute(array(
			':Id' => $Id,
			':Pass' => $Contraseña
		));
		$resultado = $statement->fetch();
		if ($resultado !== false) {
			// al acceder con las credenciales, se registra como exitoso
			$inicio_correcto = $conexion->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "'.$_SERVER["REQUEST_TIME"].'", 1, :Dispositivo)');
			$inicio_correcto->execute(array(
				':Id_usuario' => $Id,
				':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
			));
			$_SESSION['usuario'] = $resultado;
			// Guarda la informacion del usuario para mas adelante no volver a consultar
			header('Location: index.php');
		} else {
			// al acceder con las credenciales, se registra como incorrecto
			$inicio_incorrecto = $conexion->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "'.$_SERVER["REQUEST_TIME"].'", 0, :Dispositivo)');
			$inicio_incorrecto->execute(array(
				':Id_usuario' => $Id,
				':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
			));
			$errores = '<li>Datos incorrectos</li>';
		}
	}
	else{
		$inicio_incorrecto = $conexion->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "'.$_SERVER["REQUEST_TIME"].'", 0, :Dispositivo)');
		$inicio_incorrecto->execute(array(
			':Id_usuario' => $Id,
			':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
		));
		$errores = '<li>El limite de tiempo a excedido, espere un momento por favor</li>';
	}
}

require 'views/login.view.php';

?>