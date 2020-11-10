<?php
require 'views/header.php';
?>
<div class="contenedor">
	<h2>Registro pase de lista: <?php echo $_SESSION['usuario']['Nombres'] . " " . $_SESSION['usuario']['Apellidos']; ?></h2>
	<a href="logout.php">Cerrar Sesi&oacute;n</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
	<hr class="border">
	<div class="contenido">
		<h3>Nombre: <?php echo $user['nombre']; ?></h3>
		<h3>Hora: <?php echo $user['hora']; ?></h3>
		<h3>Grado: <?php echo $user['grado']; ?></h3>
		<h3>Descripcion: <?php echo $user['descripcion']; ?>
			<center><a class='fa fa-edit' href='control.php?id_clase=<?php echo filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING); ?>'>Pasar lista</a></center>
		</h3>
		<hr>
		<?php
		try {
			$connection = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
		$statement = $connection->prepare('SELECT usuarios.Nombres,usuarios.Apellidos, usuarios.Id FROM alumnos_clases INNER JOIN usuarios ON alumnos_clases.Id_alumno=usuarios.Id WHERE alumnos_clases.Id_clase = :Id ORDER BY usuarios.Id');
		$statement->execute(array(
			':Id' => $user['id']
		));
		$students = $statement->fetch();
		echo "<table ><tr><td>Nombre</td><td>Asistencias</td><td>Faltas</td><td>Justificantes</td><td>Retardos</td></tr>";
		while ($students != null) {
			//en el proceso determina el numero de asistencias, faltas, etc.
			$statement2 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=1 and Id_clase = :Id_clase');
			$statement2->execute(array(
				':Id' => $students['Id'],
				':Id_clase' =>  filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING)
			));
			$assistance = $statement2->fetch();

			$statement3 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=2 and Id_clase = :Id_clase');
			$statement3->execute(array(
				':Id' => $students['Id'],
				':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING)
			));
			$absences = $statement3->fetch();

			$statement4 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=3 and Id_clase = :Id_clase');
			$statement4->execute(array(
				':Id' => $students['Id'],
				':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING)
			));
			$exculpatory = $statement4->fetch();

			$statement5 = $connection->prepare('SELECT COUNT(*) AS cantidad FROM asistencias WHERE Id_alumno=:Id and Id_tipo_asistencia=4 and Id_clase = :Id_clase');
			$statement5->execute(array(
				':Id' => $students['Id'],
				':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING)
			));
			$delays = $statement5->fetch();
			$total_days = $assistance['cantidad'] + $absences['cantidad'] + $delays['cantidad'] + $exculpatory['cantidad'];
			echo "<tr><td>" . $students["Nombres"] . " " . $students["Apellidos"] . "</td><td><center>" . $assistance['cantidad'] . "</center></td><td><center>" . $absences['cantidad'] . "</center></td><td><center>" . $exculpatory['cantidad'] . "</center></td><td><center>" . $delays['cantidad'] . "</center></td>";
			if ($total_days > 0)
				echo "<td><center><a class='fa fa-edit' href='assistance_edit.php?id_clase=" . $_GET['id_clase'] . "&id_alumno=" . $students["Id"] . "'></a></center></td>";
			echo "</tr>";
			$students = $statement->fetch();
		}
		echo "</table><center>Dias en total: " . $total_days . "</center>";
		?>
		<hr>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>