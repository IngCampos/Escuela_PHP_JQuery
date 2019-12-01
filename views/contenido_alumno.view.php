<center><h2>Libros</h2></center>
<hr>
<a class="fa fa-plus"href='libros/agregarlibro.php'>Agregar libro</a><br>
<a class="fa fa-book" href='libros/libros.php'>Ver libros</a>
<center><h2>Grupos en curso</h2></center>
<?php 
try {
	$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
} catch (PDOException $e) {
	echo "Error:" . $e->getMessage();
}
$statement = $conexion->prepare(
	'SELECT clases.Id, clases.Hora, materias.Nombre, materias.Descripcion, materias.Grado, usuarios.Nombres, usuarios.Apellidos 
	FROM alumnos_clases INNER JOIN clases ON alumnos_clases.Id_clase=clases.Id 
	INNER JOIN materias ON clases.Id_materia=materias.Id 
	INNER JOIN usuarios ON clases.Id_maestro=usuarios.Id
WHERE alumnos_clases.Id_alumno = :Id ORDER BY clases.Hora');
$statement->execute(array(
	':Id' => $_SESSION['usuario']['0']
	//se pone 0 por que al haber dos campos con el nombre Id, el otro pasa a nombrarse 0
));
$materias = $statement->fetch();
echo "<table><tr><td>Hora</td><td>Materia</td><td>Grado</td><td>Maestro(a)</td><td>Asistencias</td></tr>";

while($materias!=null){
	//en el proceso determina el numero de asistencias, faltas, etc.
	$statement2 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=1 and Id_clase = :Id_clase');
	$statement2->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $materias['Id']
	));
	$asistencias = $statement2->fetch();

	$statement3 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=2 and Id_clase = :Id_clase');
	$statement3->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $materias['Id']
	));
	$faltas = $statement3->fetch();

	$statement4 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=3 and Id_clase = :Id_clase');
	$statement4->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $materias['Id']
	));
	$justificantes = $statement4->fetch();
	
	$statement5 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=4 and Id_clase = :Id_clase');
	$statement5->execute(array(
		':Id' => $_SESSION['usuario']['0'],
		':Id_clase' => $materias['Id']
	));
	$retardos = $statement5->fetch();
	
	$total_dias= $asistencias['cantidad']+$faltas['cantidad']+$retardos['cantidad']+$justificantes['cantidad'];
	echo "<tr><td>".$materias["Hora"]."</td><td>".$materias["Nombre"]."</td><td>".$materias["Grado"]."</td><td>".$materias["Nombres"].
	"<br>".$materias["Apellidos"]."</td><td>Asistencias: ".$asistencias['cantidad']."<br>Faltas: ".$faltas['cantidad']."<br>Justificantes:".
	$justificantes['cantidad']."<br>Retardos: ".$retardos['cantidad']."<br> Total de clases: ".$total_dias."<hr></td></tr>";
	$materias = $statement->fetch();
}
echo "</table> Dias pasados:". $total_dias;