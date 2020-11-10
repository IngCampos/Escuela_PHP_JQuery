<?php
require 'header.php';
?>

<body>
	<div class="contenedor">
		<h2>Inicio: <?php echo $_SESSION['usuario']['Nombres'] . " " . $_SESSION['usuario']['Apellidos'] . "(" . $_SESSION['usuario']['Titulo'] . ")"; ?></h2>
		<a href="logout.php">Cerrar Sesi&oacute;n</a><a style="float: right;" class="inico" href="index.php">Inicio</a>
		<hr class="border">
		<div class="contenido">
			<?php if ($_SESSION['usuario']['Titulo'] == "Alumno") require 'student.view.php';
			if ($_SESSION['usuario']['Titulo'] == "Maestro") require 'teacher.view.php';
			if ($_SESSION['usuario']['Titulo'] == "Administrador") require 'administrator.view.php'; ?>
			<hr>
		</div>
	</div>
</body>
<?php
require 'footer.php';
?>

</html>