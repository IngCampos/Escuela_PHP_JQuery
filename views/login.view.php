<?php
require 'header.php';
?>
<h2>Login</h2>
<hr class="border">

<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<div class="form-group">
		<i class="icono izquierda fa fa-user"></i><input class="usuario" type="number" name="id" placeholder="Numero de control" required <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>
	</div>
	<div class="form-group">
		<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="contraseña" placeholder="Contraseña" required <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>
		<button type="submit" class="submit-btn fa fa-arrow-right" <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>></button>
	</div>

	<!-- Comprobamos si la variable errores esta seteada, si no es asi mostramos los errores -->
	<?php if (!empty($errors)) : ?>
		<div class="error">
			<ul>
				<?php echo $errors; ?>
			</ul>
		</div>
	<?php endif; ?>
</form>
<?php
require 'footer.php';
?>

</html>