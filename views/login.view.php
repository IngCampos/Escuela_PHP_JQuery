<?php 
require 'header.php';
?>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="number" name="id" placeholder="Numero de control">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="contraseña" placeholder="contraseña">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
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
			¿ Olvidaste tu contraseña ?
			<a href="olvido_contraseña.php">Pedir contraseña</a>
		</p>
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