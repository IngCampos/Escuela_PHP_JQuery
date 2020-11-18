<?php
session_start();
require 'session_cache_expire().php';

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al content, para que no pueda acceder al form
if (isset($_SESSION['user'])) {
	header('Location: index');
	die();
} //lo ideal en un proyecto grande es poner esta funcion en otro archivo y llamarlo, ya que se esta replicando el mismo codigo en todas las vistas

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = filter_var(strtolower($_POST['id']), FILTER_SANITIZE_STRING);
	$password = hash('sha512', "attendance_school{$_POST['password']}");
	$tolerance_time = 2; // dado en minutos, en caso de que el user se logea mal 5 veces en el mismo dispositivo 
	$tolerance_attempts = 5; // intentos que se le permitira un logeo mal en el tiempo pasado
	// Nos conectamos a la base de datos
	try {
		$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
	} catch (PDOException $e) {
		$errors = '<li>Error in the server, try it later</li>';
	}
	$attemps = $connection->prepare(
		'SELECT COUNT(*) FROM login_attemps 
		WHERE user_id = :id and is_successful=0 and request_time > :request_time'
	);
	$attemps->execute(array(
		':id' => $id,
		':request_time' => $_SERVER["REQUEST_TIME"] - ($tolerance_time * 60)
	));
	$attemps = $attemps->fetch();
	if ($attemps["COUNT(*)"] < $tolerance_attempts) {
		$statement = $connection->prepare(
			'SELECT * FROM users INNER JOIN type_user ON users.type_user_id=type_user.id 
			WHERE users.id = :id AND users.password = :password'
		);
		$statement->execute(array(
			':id' => $id,
			':password' => $password
		));
		$result = $statement->fetch();
		if ($result !== false) {
			// al acceder con las credenciales, se registra como exitoso
			$successful_login = $connection->prepare(
				'INSERT INTO login_attemps(id, user_id, request_time,is_successful) 
				VALUES(NULL , :user_id, "' . $_SERVER["REQUEST_TIME"] . '", 1)'
			);
			$successful_login->execute(array(
				':user_id' => $id
			));
			// Guardado del tiempo para el manejo de su caducidad
			$_SESSION["timeout"] = time();
			$_SESSION['user'] = $result;
			// Guarda la informacion del user para mas adelante no volver a consultar
			header('Location: index');
		} else {
			// al acceder con las credenciales, se registra como incorrecto
			$unsuccessful_login = $connection->prepare(
				'INSERT INTO login_attemps(id, user_id, request_time,is_successful) 
				VALUES(NULL , :user_id, "' . $_SERVER["REQUEST_TIME"] . '", 0)'
			);
			$unsuccessful_login->execute(array(
				':user_id' => $id
			));
			$errors = '<li>Name or password incorrect</li><li>If you have forgotten your credentials, contact the administrator.</li>';
		}
	} else {
		$unsuccessful_login = $connection->prepare(
			'INSERT INTO login_attemps(id, user_id, request_time,is_successful) 
			VALUES(NULL , :user_id, "' . $_SERVER["REQUEST_TIME"] . '", 0)'
		);
		$unsuccessful_login->execute(array(
			':user_id' => $id
		));
		$is_inputs_disabled = true;
		$errors = '<li>The limit of attempts has been exceeded, wait a moment and try it again.</li><li>If you have forgotten your credentials, contact the administrator.</li>';
	}
}

require 'views/login.view.php';
