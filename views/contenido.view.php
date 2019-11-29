<?php 
require 'header.php';
?>
<body>
	<div class="contenedor">
		<h2>Inicio: <?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']."(".$_SESSION['usuario']['Titulo'].")";?></h2>
		<a href="cerrar.php">Cerrar Sesion</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
		<hr class="border">
		<div class="contenido">
			<?php if ($_SESSION['usuario']['Titulo']=="Alumno") require 'contenido_alumno.view.php';
			if ($_SESSION['usuario']['Titulo']=="Maestro") require 'contenido_maestro.view.php';
			if ($_SESSION['usuario']['Titulo']=="Administrador") require 'contenido_administrador.view.php';?>
			<hr>
		</div>
	</div>
</body>
<?php 
require 'footer.php';
?>
</html>