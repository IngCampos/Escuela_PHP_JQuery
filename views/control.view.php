<?php 
require 'views/header.php';
?>
	<div class="contenedor">
		<h2>Pase de lista: <?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos'];?></h2>
		<a href="cerrar.php">Cerrar Sesion</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
		<hr class="border">
		<div class="contenido">
		<h3>Nombre: <?php echo $usuariocorrespondiente['nombre']; ?></h3>
		<h3>Hora: <?php echo $usuariocorrespondiente['hora']; ?></h3>
		<h3>Grado: <?php echo $usuariocorrespondiente['grado']; ?></h3>
		<h3>Descripcion: <?php echo $usuariocorrespondiente['descripcion']; ?>
		<center><a class='fa fa-sticky-note' href='asistencias.php?id_clase=<?php echo filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING);?>'>Ver asistencias</a></center></h3>
		<hr>
		<form  method="post" action="<?php echo $_SERVER['PHP_SELF']."?id_clase=".filter_var(strtolower($_GET['id_clase']), FILTER_SANITIZE_STRING); ?>">
		<div class="form-group">
			Fecha: <input class="form-control" id="date" type="date" name="date" value="<?php echo date('Y').'-'.date('m').'-'.date('d');?>" required>
			<button  type="submit" value="Registrar" class="btn btn-success"<?php if(isset($bloqueo_inputs))echo "disabled";?>>Registrar <i class="fa fa-save"></i></button>
		</div>
		<div class="form-group">
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
		echo "<table ><tr><td>Nombre</td><td>Asistencia</td><td>Falta</td><td>Justificante</td><td>Retardo</td></tr>";
		while($alumnos!=null){
			echo "<tr><td>".$alumnos["Nombres"]." ".$alumnos["Apellidos"]."</td><td><center><input type='radio' name='".$alumnos["Id"]."' value=1 checked></center></td><td><center><input type='radio' name='".$alumnos["Id"]."' value=2></center></td><td><center><input type='radio' name='".$alumnos["Id"]."' value=3></center></td><td><center><input type='radio' name='".$alumnos["Id"]."' value=4></center></td></tr>";
			$alumnos = $statement->fetch();
		}
		echo "</table>";
		?>
		</div>
	</form>
	<hr>
	<?php if(!$nuevosdatos):?>
	<script>alert("Ya existen registros de esta clase y de este dia en la base de datos");</script>
	<?php endif ?>
	</div>
	</div>
</body>
<?php 
require 'views/footer.php';
?>
</html>