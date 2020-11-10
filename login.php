<?php
session_start();
require 'session_cache_expire().php';

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
	die();
} //lo ideal en un proyecto grande es poner esta funcion en otro archivo y llamarlo, ya que se esta replicando el mismo codigo en todas las vistas

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = filter_var(strtolower($_POST['id']), FILTER_SANITIZE_STRING);
	$password = hash('sha512', 'escuela_bd' . $_POST['contraseña']);
	$tolerance_time = 2; // dado en minutos, en caso de que el usuario se logea mal 5 veces en el mismo dispositivo 
	$tolerance_attempts = 5; // intentos que se le permitira un logeo mal en el tiempo pasado
	// Nos conectamos a la base de datos
	try {
		$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
	} catch (PDOException $e) {
		$errors = '<li>Error de parte del servidor, vuelve a intentarlo mas tarde</li>';
	}
	$attemps = $connection->prepare('SELECT COUNT(*) FROM intentos_sesion WHERE Id_usuario = :Id and Credenciales_correctas=0 and Request_time > :Request_time');
	$attemps->execute(array(
		':Id' => $id,
		':Request_time' => $_SERVER["REQUEST_TIME"] - ($tolerance_time * 60)
	));
	$attemps = $attemps->fetch();
	if ($attemps["COUNT(*)"] < $tolerance_attempts) {
		$statement = $connection->prepare('SELECT * FROM usuarios INNER JOIN tipo_usuario ON usuarios.Id_tipo_usuario=tipo_usuario.Id WHERE usuarios.Id = :Id AND usuarios.Pass = :Pass');
		$statement->execute(array(
			':Id' => $id,
			':Pass' => $password
		));
		$result = $statement->fetch();
		if ($result !== false) {
			// al acceder con las credenciales, se registra como exitoso
			$successful_login = $connection->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "' . $_SERVER["REQUEST_TIME"] . '", 1, :Dispositivo)');
			$successful_login->execute(array(
				':Id_usuario' => $id,
				':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
			));
			// Guardado del tiempo para el manejo de su caducidad
			$_SESSION["timeout"] = time();
			$_SESSION['usuario'] = $result;
			// Guarda la informacion del usuario para mas adelante no volver a consultar
			header('Location: index.php');
		} else {
			// al acceder con las credenciales, se registra como incorrecto
			$unsuccessful_login = $connection->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "' . $_SERVER["REQUEST_TIME"] . '", 0, :Dispositivo)');
			$unsuccessful_login->execute(array(
				':Id_usuario' => $id,
				':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
			));
			$errors = '<li>Datos incorrectos</li><li>En caso de olvido de contraseña, contactar al departamento de sistemas.</li>';
		}
	} else {
		$unsuccessful_login = $connection->prepare('INSERT INTO intentos_sesion(Id, Id_usuario, Request_time,Credenciales_correctas, Dispositivo) VALUES(NULL , :Id_usuario, "' . $_SERVER["REQUEST_TIME"] . '", 0, :Dispositivo)');
		$unsuccessful_login->execute(array(
			':Id_usuario' => $id,
			':Dispositivo' => $_SERVER["HTTP_USER_AGENT"]
		));
		$is_inputs_disabled = true;
		$errors = '<li>El limite de intentos a excedido, espere un momento por favor, y refresque la pagina</li><li>En caso de olvido de contraseña, contactar al departamento de sistemas.</li>';
	}
}

require 'views/login.view.php';
