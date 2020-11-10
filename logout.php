<?php
session_start();
try {
	$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	$errors = '<li>Error de parte del servidor, vuelve a intentarlo mas tarde.</li>';
}
$login_ended = $connection->prepare('INSERT INTO sesiones_finalizadas(Id, Id_usuario, Fecha) VALUES(NULL , :Id_usuario, NULL)');
$login_ended->execute(array(
	':Id_usuario' => $_SESSION['usuario']['0']
));
session_destroy();
$_SESSION = array(); // la sesion la dejamos vacia por seguridad

header('Location: login.php');
die();
