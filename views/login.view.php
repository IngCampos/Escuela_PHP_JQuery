<?php
require 'header.php';
?>
<h2>Login</h2>
<hr class="border">

<form class="form" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<div class="form-group">
		<i class="icon left fa fa-user"></i><input class="user" type="number" name="id" placeholder="Id" required <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>
	</div>
	<div class="form-group">
		<i class="icon left fa fa-lock"></i><input class="password_btn" type="password" name="password" placeholder="Password" value="school" required <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>
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
<center>
	"school" is the password by default.<br>
	Id 1 belongs to the Administrator.<br>
	Id 11 to 16 belong to the teachers.<br>
	Id 101 to 220 belong to the students.<br>
</center>
<?php
require 'footer.php';
?>

</html>