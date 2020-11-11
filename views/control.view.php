<?php
require 'views/header.php';
?>
<div class="container">
	<h2>Pass the role: <?php echo $_SESSION['user']['name']; ?></h2>
	<a href="logout.php">Logout</a><a style="float: right;" class="inico" href="index.php">Index</a>
	<hr class="border">
	<div class="content">
		<?php
		echo "<h3>Name: {$user['name']}</h3>
		<h3>Hour: {$user['hour']}</h3>
		<h3>Grade: {$user['grade']}</h3>
		<h3>Description: {$user['description']}</h3>"
		?>
		<h3>
			<center><a class='fa fa-sticky-note' href='attendance.php?class_id=<?php echo filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING); ?>'>Look attendance</a></center>
		</h3>
		<hr>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?class_id=" . filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING); ?>">
			<div class="form-group">
				date: <input class="form-control" id="date" type="date" name="date" value="<?php echo date('Y') . '-' . date('m') . '-' . date('d'); ?>" required>
				<button type="submit" value="Save" class="btn btn-success" <?php if (isset($is_inputs_disabled)) echo "disabled"; ?>>Save <i class="fa fa-save"></i></button>
			</div>
			<div class="form-group">
				<?php
				try {
					$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
				} catch (PDOException $e) {
					echo "Error: {$e->getMessage()}";
				}
				$statement = $connection->prepare(
					'SELECT users.name, users.id 
					FROM student_class INNER JOIN users ON student_class.student_id=users.id 
					WHERE student_class.class_id = :id 
					ORDER BY users.id'
				);
				$statement->execute(array(
					':id' => $user['id']
				));
				$students = $statement->fetch();
				echo "<table><tr><td>Name</td><td>Assistance</td><td>Absence</td><td>Exculpatory</td><td>Delays </td></tr>";
				while ($students != null) {
					echo "<tr><td>{$students['name']}</td><td><center><input type='radio' name='
						{$students['id']}' value=1 checked></center></td><td><center><input type='radio' name='
						{$students['id']}' value=2></center></td><td><center><input type='radio' name='
						{$students['id']}' value=3></center></td><td><center><input type='radio' name='
						{$students['id']}' value=4></center></td></tr>";
					$students = $statement->fetch();
				}
				echo "</table>";
				?>
			</div>
		</form>
		<hr>
		<?php if (!$is_new_data) : ?>
			<script>
				alert("There are data from this date in the database");
			</script>
		<?php endif ?>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>