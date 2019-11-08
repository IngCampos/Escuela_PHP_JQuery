<?php 
require 'header.php';
?>
<body>
	<div class="contenedor">
		<h1 class="titulo"><?php echo $_SESSION['usuario']['Nombres']." ".$_SESSION['usuario']['Apellidos']."(".$_SESSION['usuario']['Titulo'].")";?></h1>
		<a href="cerrar.php">Cerrar Sesion</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
		<hr class="border">
		<div class="contenido">
			<?php if ($_SESSION['usuario']['Titulo']=="Alumno") require 'contenido_alumno.view.php';
			if ($_SESSION['usuario']['Titulo']=="Maestro") require 'contenido_maestro.view.php';
			if ($_SESSION['usuario']['Titulo']=="Administrador") require 'contenido_administrador.view.php';?>
			<hr><center><h2>Libros</h2></center>
			grado:<?php echo $_SESSION['usuario']['Grado']?>(ayuda parte libros)
		</div>
	</div>
</body>
<?php 
require 'footer.php';
?>
</html>