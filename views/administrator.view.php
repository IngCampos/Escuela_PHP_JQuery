<center>
	<h2>Usuarios del sistema</h2>
</center>
<hr>
<?php
$tolerance_time = 2; // dado en minutos, en caso de que el usuario se logea mal 5 veces en el mismo dispositivo 
try {
	$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $connection->prepare('SELECT Id, Nombres, Apellidos, Grado, Pass FROM usuarios');
$statement->execute();
$users = $statement->fetch();
echo "<table ><tr><td>Id</td><td>Nombres</td><td>Apellidos</td><td>Grado</td><td>Intentos</td><td>Password</td></tr>";

while ($users != null) {
	$attemps = $connection->prepare('SELECT COUNT(*) FROM intentos_sesion WHERE Id_usuario = :Id and Credenciales_correctas=0 and Request_time > :Request_time');
	$attemps->execute(array(
		':Id' => $users["Id"],
		':Request_time' => $_SERVER["REQUEST_TIME"] - ($tolerance_time * 60)
	));
	$attemps = $attemps->fetch();
	// extrae el numero de intentos fallido en el tiempo definido de arriba
	echo "<tr><td>" . $users["Id"] . "</td><td>" . $users["Nombres"] . "</td><td>" . $users["Apellidos"] . "</td><td>" . $users["Grado"] . "</td><td>fallidos: " . $attemps["COUNT(*)"] . "</td><td>" . substr($users["Pass"], -10) . "</td></tr>";
	$users = $statement->fetch();
}
echo "</table>";
