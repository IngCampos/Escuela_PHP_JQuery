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
	codigo en caso de ser maestro
		<?php endif ?>
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