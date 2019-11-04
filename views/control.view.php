<?php 
require 'views/header.php';
?>
	<div class="contenedor">
		<h1 class="titulo"><?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']."(".$_SESSION['usuario']['Titulo'].")";?></h1>
		<a href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="contenido">
		<h3>Nombre: <?php echo $usuariocorrespondiente['nombre']; ?></h3>
		<h3>Hora: <?php echo $usuariocorrespondiente['hora']; ?></h3>
		<h3>Grado: <?php echo $usuariocorrespondiente['grado']; ?></h3>
		<h3>Descripcion: <?php echo $usuariocorrespondiente['descripcion']; ?></h3>
		<hr>
		<form  method="post" action="<?php echo $_SERVER['PHP_SELF']."?id_clase=".$_GET['id_clase']; ?>">
		Fecha: <input class="form-control" id="date" type="date" name="date" value="<?php echo date('Y').'-'.date('m').'-'.date('d');?>" required>
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
		echo "<table ><tr><td>Alumno</td><td>Asistencia</td><td>Falta</td><td>Justificante</td><td>Retardo</td></tr>";
		while($alumnos!=null){
			echo "<tr><td>".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."</td><td><input type='radio' name='".$alumnos["Id"]."' value=1 checked></td><td><input type='radio' name='".$alumnos["Id"]."' value=2></td><td><input type='radio' name='".$alumnos["Id"]."' value=3></td><td><input type='radio' name='".$alumnos["Id"]."' value=4></td></tr>";
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