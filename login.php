<?php 
session_start();
require 'session_cache_expire().php';

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	die();
}//lo ideal en un proyecto grande es poner esta funcion en otro archivo y llamarlo, ya que se esta replicando el mismo codigo en todas las vistas

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Id = filter_var(strtolower($_POST['id']), FILTER_SANITIZE_STRING);
	$Contraseña = hash('sha512', 'escuela_bd' . $_POST['contraseña']);
	$Tiempo_tolerancia = 2;// dado en minutos, en caso de que el usuario se logea mal 5 veces en el mismo dispositivo 
	$Intentos_tolerancia = 5; // intentos qe se le permitira un logeo mal en el tiempo pasado
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
			// Guardado del tiempo para el manejo de su caducidad
			$_SESSION["timeout"] = time();
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
			$errores = '<li>Datos incorrectos</li><li>En caso de olvido de contraseña, contactar al departamento de sistemas.</li>';
		}
	}
	else{
		$inicio_incorrecto = $conexion->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "'.$_SERVER["REQUEST_TIME"].'", 0, :Dispositivo)');
		$inicio_incorrecto->execute(array(
			':Id_usuario' => $Id,
			':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
		));
		$bloqueo_inputs =true;
		$errores = '<li>El limite de intentos a excedido, espere un momento por favor, y refresque la pagina</li><li>En caso de olvido de contraseña, contactar al departamento de sistemas.</li>';
	}
}

require 'views/login.view.php';

?>