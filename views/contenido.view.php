<?php 
require 'header.php';
?>
<body>
	<div class="contenedor">
		<h1 class="titulo"><?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']."(".$_SESSION['usuario']['Titulo'].")";?></h1>
		<a href="cerrar.php">Cerrar Sesion</a>
		<hr class="border">
		<div class="contenido">
		<?php if ($_SESSION['usuario']['Titulo']=="Alumno"): ?>
	codigo en caso de ser alumno
		<?php endif ?>
		<?php if ($_SESSION['usuario']['Titulo']=="Maestro"): ?>
		<center><h2>Grupos asignados</h2></center>
		<?php 
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=escuela_bd', 'root', '');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
		$statement = $conexion->prepare('SELECT clases.Id, materias.Nombre, materias.Grado, materias.Descripcion, clases.Hora FROM clases INNER JOIN materias ON clases.Id_materia=materias.Id WHERE clases.Id_maestro = :Id ORDER BY clases.Hora');
		$statement->execute(array(
			':Id' => $_SESSION['usuario']['0']
			//se pone 0 por que al haber dos campos con el nombre Id, el otro pasa a nombrarse 0
		));
		$materias = $statement->fetch();
		echo "<table ><tr><td>Hora</td><td>Materia</td><td>Grado</td><td>Asistencias</td><td>Tareas</td></tr>";
		while($materias!=null){
			echo "<tr><td>".$materias["Hora"]."</td><td>".$materias["Nombre"]."</td><td>".$materias["Grado"]."</td><td><a href='control.php?id_clase=".$materias["Id"]."'>Asistencias</a></td><td><a>Tareas</a></td></tr>";
			$materias = $statement->fetch();
		}
		echo "</table>";
		// for ($i= 0;$i<=$materias.length;)
		// echo $materias;
		endif ?>
		<?php if ($_SESSION['usuario']['Titulo']=="Administrador"): ?>
	codigo en caso de ser administrador
		<?php endif ?>
		</div>
	</div>
</body>
<?php 
require 'footer.php';
?>
</html>