<?php
session_start();
try {
	$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
} catch (PDOException $e) {
	$errors = '<li>Error in the server, try it later.</li>';
}
$login_ended = $connection->prepare(
	'INSERT INTO logouts(user_id) 
	VALUES(:user_id)'
);
$login_ended->execute(array(
	':user_id' => $_SESSION['user']['0']
));
session_destroy();
$_SESSION = array(); // la sesion la dejamos vacia por seguridad

header('Location: login.php');
die();
