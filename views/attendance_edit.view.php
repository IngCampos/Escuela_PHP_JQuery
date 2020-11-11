<?php
require 'views/header.php';
?>
<div class="container">
	<h2>Attendance Edit: <?php echo $_SESSION['user']['name']; ?></h2>
	<a href="logout.php">Logout</a><a style="float: right;" class="inico" href="index.php">Index</a>
	<hr class="border">
	<div class="content">
		<?php
		echo "<h3>Subject: {$user['name']}</h3>
		<h3>Hour: {$user['hour']}</h3>
		<h3>Grade: {$user['grade']}</h3>
		<h3>Student: {$students['name']}</h3>"
		?>
		<h3>
			<center><a class='fa fa-sticky-note' href='attendance.php?class_id=
			<?php echo filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING); ?>
			'>Look attendance</a></center>
		</h3>
		<hr>
		<form method="post" action="<?php echo "{$_SERVER['PHP_SELF']}?class_id=" . filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING) .
										"&student_id={$_GET['student_id']}"; ?>">
			<?php
			try {
				$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
			} catch (PDOException $e) {
				echo "Error: {$e->getMessage()}";
			}
			$statement3 = $connection->prepare(
				'SELECT * FROM attendance 
				WHERE class_id = :class_id and student_id = :student_id 
				ORDER BY date'
			);
			$statement3->execute(array(
				':student_id' => filter_var(strtolower($_GET['student_id']), FILTER_SANITIZE_STRING),
				':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
			));
			$attendance = $statement3->fetch();
			echo "<table><tr><td>Date</td><td>Assistances</td><td>Absences</td><td>Exculpatories</td><td>Delays</td></tr>";
			while ($attendance != null) {
				echo "<tr><td>{$attendance['date']}</td><td><center><input type='radio' name='{$attendance['date']}' value=1 ";
				if ($attendance["type_attendance_id"] == 1) echo "checked";
				echo "></center></td><td><center><input type='radio' name='{$attendance['date']}' value=2 ";
				if ($attendance["type_attendance_id"] == 2) echo "checked";
				echo "></center></td><td><center><input type='radio' name='{$attendance['date']}' value=3 ";
				if ($attendance["type_attendance_id"] == 3) echo "checked";
				echo "></center></td><td><center><input type='radio' name='{$attendance['date']}' value=4 ";
				if ($attendance["type_attendance_id"] == 4) echo "checked";
				echo "></center></td></tr>";
				$attendance = $statement3->fetch();
			}
			?>
			</table>
			<button type="submit" value="Update" class="btn btn-success">Update <i class="fa fa-save"></i></button>
		</form>
		<hr>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>