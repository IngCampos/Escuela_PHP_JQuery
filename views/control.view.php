<?php 
require 'views/header.php';
?>
	<div class="contenedor">
		<h1 class="titulo"><?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']."(".$_SESSION['usuario']['Titulo'].")";?></h1>
		<a href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="contenido">
		<h3>Nombre: <?php echo $resultado['nombre']; ?></h3>
		<h3>Hora: <?php echo $resultado['hora']; ?></h3>
		<h3>Grado: <?php echo $resultado['grado']; ?></h3>
		<h3>Descripcion: <?php echo $resultado['descripcion']; ?></h3>
		<hr>
		<form>
		Fecha: <input class="form-control" id="date" type="date" value="<?php echo date('Y').'-'.date('m').'-'.date('d');?>" required>
		<?php
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
		$statement = $conexion->prepare('SELECT usuarios.Nombres,usuarios.Apellidos FROM alumnos_clases INNER JOIN usuarios ON alumnos_clases.Id_alumno=usuarios.Id WHERE alumnos_clases.Id_clase = :Id');
		$statement->execute(array(
			':Id' => $resultado['id']
		));
		$alumnos = $statement->fetch();
		echo "<table ><tr><td>Alumno</td><td>Asistencia</td><td>Falta</td><td>Retardo</td><td>Justificante</td></tr>";
		while($alumnos!=null){
			echo "<tr><td>".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."</td><td><input type='radio' name='".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."' value='A'></td><td><input type='radio' name='".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."' value='F'></td><td><input type='radio' name='".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."' value='R'></td><td><input type='radio' name='".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."' value='J'></td></tr>";
			$alumnos = $statement->fetch();
		}
		echo "</table>";
		?>
		<input type="submit" value="Registrar">
		</form>
		<br>
		<br>
		<br>
		<hr>
		</div>
	</div>
</body>
<?php 
require 'views/footer.php';
?>
</html>