<?php
require 'views/header.php';
?>
<div class="contenedor">
	<h2>Pase de lista: <?php echo $_SESSION['usuario']['Nombres'] . " " . $_SESSION['usuario']['Apellidos']; ?></h2>
	<a href="logout.php">Cerrar Sesi&oacute;n</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
	<hr class="border">
	<div class="contenido">
		<h3>Nombre: <?php echo $user['nombre']; ?></h3>
		<h3>Hora: <?php echo $user['hora']; ?></h3>
		<h3>Grado: <?php echo $user['grado']; ?></h3>
		<h3>Descripci&oacute;n: <?php echo $user['descripcion']; ?>
			<center><a class='fa fa-sticky-note' href='assistance.php?id_clase=<?php echo filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING); ?>'>Ver asistencias</a></center>
		</h3>
		<hr>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?id_clase=" . filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING); ?>">
			<div class="form-group">
				Fecha: <input class="form-control" id="date" type="date" name="date" value="<?php echo date('Y') . '-' . date('m') . '-' . date('d'); ?>" required>
				<button type="submit" value="Registrar" class="btn btn-success" <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>Registrar <i class="fa fa-save"></i></button>
			</div>
			<div class="form-group">
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
				echo "<table ><tr><td>Nombre</td><td>Asistencia</td><td>Falta</td><td>Justificante</td><td>Retardo</td></tr>";
				while ($students != null) {
					echo "<tr><td>" . $students["Nombres"] . " " . $students["Apellidos"] . "</td><td><center><input type='radio' name='" . $students["Id"] . "' value=1 checked></center></td><td><center><input type='radio' name='" . $students["Id"] . "' value=2></center></td><td><center><input type='radio' name='" . $students["Id"] . "' value=3></center></td><td><center><input type='radio' name='" . $students["Id"] . "' value=4></center></td></tr>";
					$students = $statement->fetch();
				}
				echo "</table>";
				?>
			</div>
		</form>
		<hr>
		<?php if (!$is_new_data) : ?>
			<script>
				alert("Ya existen registros de esta clase y de este dia en la base de datos");
			</script>
		<?php endif ?>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>