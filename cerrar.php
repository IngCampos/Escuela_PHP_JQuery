<?php 
session_start();
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
	} catch (PDOException $e) {
		$errores = '<li>Error de parte del servidor, vuelve a intentarlo mas tarde</li>';
	}
    $sesion_finalizada = $conexion->prepare('INSERT INTO sesiones_finalizadas(Id, Id_usuario, Fecha) VALUES(NULL , :Id_usuario, NULL)');
	$sesion_finalizada->execute(array(
			':Id_usuario' => $_SESSION['usuario']['0']
		));
session_destroy();
$_SESSION = array();// la sesion la dejamos vacia por seguridad

header('Location: login.php');
die();

?>