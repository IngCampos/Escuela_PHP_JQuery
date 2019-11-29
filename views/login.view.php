<?php 
require 'header.php';
?>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="number" name="id" placeholder="Numero de control" required <?php if(isset($bloqueo_inputs))echo "disabled";?>>
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="contraseña" placeholder="contraseña" required <?php if(isset($bloqueo_inputs))echo "disabled";?>>
				<button  type="submit" class="submit-btn fa fa-arrow-right" <?php if(isset($bloqueo_inputs))echo "disabled";?>></button>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>
		<p class="texto-registrate">
			Al utilizar esta aplicacion estas aceptando los 
			<a href="terminosycondiciones.view.php">terminos y condiciones</a>
		</p>
	</div>
</body>
<?php 
require 'footer.php';
?>
</html>