<center>
	<h2>Grupos en curso</h2>
</center>
<?php
try {
	$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $connection->prepare(
	'SELECT clases.Id, clases.Hora, materias.Nombre, materias.Descripcion, materias.Grado, usuarios.Nombres, usuarios.Apellidos 
	FROM alumnos_clases INNER JOIN clases ON alumnos_clases.Id_clase=clases.Id 
	INNER JOIN materias ON clases.Id_materia=materias.Id 
	INNER JOIN usuarios ON clases.Id_maestro=usuarios.Id
WHERE alumnos_clases.Id_alumno = :Id ORDER BY clases.Hora'
);
$statement->execute(array(
	':Id' => $_SESSION['usuario']['0']
	//se pone 0 por que al haber dos campos con el nombre Id, el otro pasa a nombrarse 0
));
$subjects = $statement->fetch();
echo "<table><tr><td>Hora</td><td>Materia</td><td>Grado</td><td>Maestro(a)</td><td>Asistencias</td></tr>";

while ($subjects != null) {
	//en el proceso determina el numero de asistencias, faltas, etc.
	$statement2 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=1 and Id_clase = :Id_clase');
	$statement2->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $subjects['Id']
	));
	$assistance = $statement2->fetch();

	$statement3 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=2 and Id_clase = :Id_clase');
	$statement3->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $subjects['Id']
	));
	$absences = $statement3->fetch();

	$statement4 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=3 and Id_clase = :Id_clase');
	$statement4->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $subjects['Id']
	));
	$exculpatory = $statement4->fetch();

	$statement5 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=4 and Id_clase = :Id_clase');
	$statement5->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $subjects['Id']
	));
	$delays = $statement5->fetch();

	$total_days = $assistance['cantidad'] + $absences['cantidad'] + $delays['cantidad'] + $exculpatory['cantidad'];
	echo "<tr><td>" . $subjects["Hora"] . "</td><td>" . $subjects["Nombre"] . "</td><td>" . $subjects["Grado"] . "</td><td>" . $subjects["Nombres"] .
		"<br>" . $subjects["Apellidos"] . "</td><td>Asistencias: " . $assistance['cantidad'] . "<br>Faltas: " . $absences['cantidad'] . "<br>Justificantes:" .
		$exculpatory['cantidad'] . "<br>Retardos: " . $delays['cantidad'] . "<br> Total de clases: " . $total_days . "<hr></td></tr>";
	$subjects = $statement->fetch();
}
echo "</table> Dias pasados:" . $total_days;
