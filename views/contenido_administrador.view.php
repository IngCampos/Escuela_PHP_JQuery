<center><h2>Usuarios del sistema</h2></center>
<?php 
$Tiempo_tolerancia = 2;// dado en minutos, en caso de que el usuario se logea mal 5 veces en el mismo dispositivo 
try {
	$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $conexion->prepare('SELECT Id, Nombres, Apellidos, Grado, Pass FROM usuarios');
$statement->execute();
$usuarios = $statement->fetch();
echo "<table ><tr><td>Id</td><td>Nombres</td><td>Apellidos</td><td>Grado</td><td>Intentos</td><td>Pass</td></tr>";

while($usuarios!=null){
	$intentos = $conexion->prepare('SELECT COUNT(*) FROM intentos_sesion WHERE Id_usuario = :Id and Credenciales_correctas=0 and Request_time > :Request_time');
	$intentos->execute(array(
		':Id' => $usuarios["Id"],
		':Request_time'=> $_SERVER["REQUEST_TIME"] - ($Tiempo_tolerancia*60)
    ));
    $numero_intentos = $intentos->fetch();
    // extrae el numero de intentos fallido en el tiempo definido de arriba
    echo "<tr><td>".$usuarios["Id"]."</td><td>".$usuarios["Nombres"]."</td><td>".$usuarios["Apellidos"]."</td><td>".$usuarios["Grado"]."</td><td>fallidos: ".$numero_intentos["COUNT(*)"]."</td><td>".substr($usuarios["Pass"],-15)."</td></tr>";
    $usuarios = $statement->fetch();
}
echo "</table><a href='libros.php'>Agregar libro</a>";