<?php
require 'views/header.php';
?>
<div class="contenedor">
	<h2>Registro pase de lista: <?php echo $_SESSION['usuario']['Nombres'] . " " . $_SESSION['usuario']['Apellidos']; ?></h2>
	<a href="cerrar.php">Cerrar Sesion</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
	<hr class="border">
	<div class="contenido">
		<h3>Nombre: <?php echo $usuariocorrespondiente['nombre']; ?></h3>
		<h3>Hora: <?php echo $usuariocorrespondiente['hora']; ?></h3>
		<h3>Grado: <?php echo $usuariocorrespondiente['grado']; ?></h3>
		<h3>Descripcion: <?php echo $usuariocorrespondiente['descripcion']; ?>
		<center><a class='fa fa-edit' href='control.php?id_clase=<?php echo $_GET['id_clase'];?>'>Pasar lista</a></center></h3>
		<hr>
		<?php
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
		$statement = $conexion->prepare('SELECT usuarios.Nombres,usuarios.Apellidos, usuarios.Id FROM alumnos_clases INNER JOIN usuarios ON alumnos_clases.Id_alumno=usuarios.Id WHERE alumnos_clases.Id_clase = :Id ORDER BY usuarios.Id');
		$statement->execute(array(
			':Id' => $usuariocorrespondiente['id']
		));
		$alumnos = $statement->fetch();
		echo "<table ><tr><td>Nombre</td><td>Asistencias</td><td>Faltas</td><td>Justificantes</td><td>Retardos</td></tr>";
		while ($alumnos != null) {
			//en el proceso determina el numero de asistencias, faltas, etc.
			$statement2 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=1 and Id_clase = :Id_clase');
			$statement2->execute(array(
				':Id' => $alumnos['Id'],
				':Id_clase' => $_GET['id_clase']
			));
			$asistencias = $statement2->fetch();

			$statement3 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=2 and Id_clase = :Id_clase');
			$statement3->execute(array(
				':Id' => $alumnos['Id'],
				':Id_clase' => $_GET['id_clase']
			));
			$faltas = $statement3->fetch();

			$statement4 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=3 and Id_clase = :Id_clase');
			$statement4->execute(array(
				':Id' => $alumnos['Id'],
				':Id_clase' => $_GET['id_clase']
			));
			$justificantes = $statement4->fetch();

			$statement5 = $conexion->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=4 and Id_clase = :Id_clase');
			$statement5->execute(array(
				':Id' => $alumnos['Id'],
				':Id_clase' => $_GET['id_clase']
			));
			$retardos = $statement5->fetch();
			$total_dias = $asistencias['cantidad'] + $faltas['cantidad'] + $retardos['cantidad'] + $justificantes['cantidad'];
			echo "<tr><td>" . $alumnos["Nombres"] . " " . $alumnos["Apellidos"] . "</td><td><center>" . $asistencias['cantidad'] . "</center></td><td><center>" . $faltas['cantidad'] . "</center></td><td><center>" . $justificantes['cantidad'] . "</center></td><td><center>" . $retardos['cantidad'] . "</center></td></tr>";
			$alumnos = $statement->fetch();
		}
		echo "</table><center>Dias en total: " . $total_dias . "</center>";
		?>
		<hr>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>