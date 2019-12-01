<?php 
require 'header.php';
?>
<h2>Inicio de sesion</h2>
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="usuario" type="number" name="id" placeholder="Numero de control" required <?php if(isset($bloqueo_inputs))echo "disabled";?>>
			</div>
<style>
	.submit-btn {
	padding: 15px;
	text-align: center;
	width: 48px;
	max-height: 48px
	font-size: 18px;
	line-height: 18px;
	background: #679863;
	display: inline-block;
	color:#fff;
	background: #769766;
	cursor: pointer;
	-webkit-border-radius: 0 3px 3px 0;
	-moz-border-radius: 0 3px 3px 0;
	-ms-border-radius: 0 3px 3px 0;
	-o-border-radius: 0 3px 3px 0;
	border-radius: 0 3px 3px 0;
}
	</style>
			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="contraseña" placeholder="Contraseña" required <?php if(isset($bloqueo_inputs))echo "disabled";?>>
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
<?php 
require 'footer.php';
?>
</html>