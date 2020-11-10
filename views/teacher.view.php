<center>
	<h2>Grupos asignados</h2>
</center>
<?php
try {
	$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $connection->prepare('SELECT clases.Id, materias.Nombre, materias.Grado, materias.Descripcion, clases.Hora FROM clases INNER JOIN materias ON clases.Id_materia=materias.Id WHERE clases.Id_maestro = :Id ORDER BY clases.Hora');
$statement->execute(array(
	':Id' => $_SESSION['usuario']['0']
	//se pone 0 por que al haber dos campos con el nombre Id, el otro pasa a nombrarse 0
));
$subjects = $statement->fetch();
echo "<table ><tr><td>Hora</td><td>Materia</td><td>Grado</td><td>Pase de lista</td><td>Asistencias</td><td></tr>";
while ($subjects != null) {
	echo "<tr><td>" . $subjects["Hora"] . "</td><td>" . utf8_encode($subjects["Nombre"]) . "</td><td><center>" . $subjects["Grado"] . "</center></td><td><center><a class='fa fa-edit' href='control.php?id_clase=" . $subjects["Id"] . "'></a></center></td><td><center><a class='fa fa-sticky-note' href='assistance.php?id_clase=" . $subjects["Id"] . "'></a></center></td></tr>";
	$subjects = $statement->fetch();
}
echo "</table>";
