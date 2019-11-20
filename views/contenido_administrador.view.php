<center><h2>Usuarios del sistema</h2></center>
<?php 
try {
	$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $conexion->prepare('SELECT Id, Nombres, Apellidos, Grado, Pass FROM usuarios');
$statement->execute();
$usuarios = $statement->fetch();
echo "<table ><tr><td>Id</td><td>Nombres</td><td>Apellidos</td><td>Grado</td><td>Pass</td></tr>";

while($usuarios!=null){
    echo "<tr><td>".$usuarios["Id"]."</td><td>".$usuarios["Nombres"]."</td><td>".$usuarios["Apellidos"]."</td><td>".$usuarios["Grado"]."</td><td>".$usuarios["Pass"]."</td></tr>";
    $usuarios = $statement->fetch();
}
echo "</table><a href='libros.php'>Agregar libro</a>";