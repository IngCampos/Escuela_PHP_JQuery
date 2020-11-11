<center>
	<h2>Users</h2>
</center>
<hr>
<?php
$tolerance_time = 2; // dado en minutos, en caso de que el user se logea mal 5 veces en el mismo dispositivo 
try {
	$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
} catch (PDOException $e) {
	echo "Error: {$e->getMessage()}";
}
$statement = $connection->prepare('SELECT id, name, grade, password FROM users');
$statement->execute();
$users = $statement->fetch();
echo "<table><tr><td>Id</td><td>Name</td><td>Grade</td><td>Attemps</td><td>Password</td></tr>";

while ($users != null) {
	$attemps = $connection->prepare(
		'SELECT COUNT(*) FROM login_attemps 
		WHERE user_id = :id and is_successful=0 and request_time > :request_time'
	);
	$attemps->execute(array(
		':id' => $users["id"],
		':request_time' => $_SERVER["REQUEST_TIME"] - ($tolerance_time * 60)
	));
	$attemps = $attemps->fetch();
	// extrae el numero de intentos fallido en el tiempo definido de arriba
	echo "<tr><td>{$users['id']}</td><td>{$users['name']}</td><td>{$users['grade']}</td>
	<td>Unsuccessful: {$attemps['COUNT(*)']}</td><td>" . substr($users["password"], -10) . "</td></tr>";
	$users = $statement->fetch();
}
echo "</table>";
