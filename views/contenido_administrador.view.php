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
while($usuarios!=null){
    echo "<pre>";
    print_r($usuarios);
    echo "</pre>";
	$usuarios = $statement->fetch();
}