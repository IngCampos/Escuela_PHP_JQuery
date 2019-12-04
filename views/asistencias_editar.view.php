<?php
require 'views/header.php';
?>
<div class="contenedor">
	<h2>Edicion de asistencias: <?php echo $_SESSION['usuario']['Nombres'] . " " . $_SESSION['usuario']['Apellidos']; ?></h2>
	<a href="cerrar.php">Cerrar Sesion</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
	<hr class="border">
	<div class="contenido">
		<h3>Materia: <?php echo $usuariocorrespondiente['nombre']; ?></h3>
		<h3>Hora: <?php echo $usuariocorrespondiente['hora']; ?></h3>
		<h3>Grado: <?php echo $usuariocorrespondiente['grado']; ?></h3>
		<h3>Alumno: <?php echo $alumnos['Nombres'] . " " . $alumnos['Apellidos']; ?></h3>
		<h3>Situacion: <?php echo $alumnos['Situacion de Vigencia']; ?></h3>
		<h3>Correo Electronico: <?php echo $alumnos['Correo Electronico']; ?></h3>
		<h3>
			<center><a class='fa fa-sticky-note' href='asistencias.php?id_clase=<?php echo $_GET['id_clase']; ?>'>Ver asistencias</a></center>
		</h3>
		<hr>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id_clase=" . $_GET['id_clase'] . "&id_alumno=" . $_GET['id_alumno']; ?>">
			<?php
			try {
				$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
			} catch (PDOException $e) {
				echo "Error:" . $e->getMessage();
			}
			$statement3 = $conexion->prepare('SELECT * FROM asistencias WHERE Id_clase = :Id_clase and Id_alumno = :Id_alumno ORDER BY Fecha');
			$statement3->execute(array(
				':Id_alumno' => filter_var(strtolower($_GET['id_alumno']), FILTER_SANITIZE_STRING),
				':Id_clase' => filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING)
			));
			$asistencias = $statement3->fetch();
			echo "<table><tr><td>Fecha</td><td>Asistencias</td><td>Faltas</td><td>Justificantes</td><td>Retardos</td></tr>";
			while ($asistencias != null) {
				echo "<tr><td>" . $asistencias["Fecha"] . "</td><td><center><input type='radio' name='" . $asistencias["Fecha"] . "' value=1 ";
				if ($asistencias["Id_tipo_asistencia"] == 1) echo "checked";
				echo "></center></td><td><center><input type='radio' name='" . $asistencias["Fecha"] . "' value=2 ";
				if ($asistencias["Id_tipo_asistencia"] == 2) echo "checked";
				echo "></center></td><td><center><input type='radio' name='" . $asistencias["Fecha"] . "' value=3 ";
				if ($asistencias["Id_tipo_asistencia"] == 3) echo "checked";
				echo "></center></td><td><center><input type='radio' name='" . $asistencias["Fecha"] . "' value=4 ";
				if ($asistencias["Id_tipo_asistencia"] == 4) echo "checked";
				echo "></center></td></tr>";
				$asistencias = $statement3->fetch();
			}
			?>
			</table>
			<button type="submit" value="Registrar" class="btn btn-success">Modificar <i class="fa fa-save"></i></button>
		</form>
		<hr>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>