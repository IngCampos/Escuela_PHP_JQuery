<?php
require 'views/header.php';
?>
<div class="container">
	<h2>Attendance data: <?php echo $_SESSION['user']['name']; ?></h2>
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
			<center><a class='fa fa-edit' href='control.php?class_id=<?php echo filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING); ?>'>
					Pass the role</a></center>
		</h3>
		<hr>
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
		$total_days = 0;
		echo "<table><tr><td>Name</td><td>Assistance</td><td>Abscence</td><td>Exculpatory</td><td>Delays</td></tr>";
		while ($students != null) {
			//en el proceso determina el numero de attendance, faltas, etc.
			$statement2 = $connection->prepare(
				'SELECT COUNT(*) AS amount FROM attendance 
				WHERE student_id=:id and type_attendance_id=1 and class_id = :class_id'
			);
			$statement2->execute(array(
				':id' => $students['id'],
				':class_id' =>  filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
			));
			$attendance = $statement2->fetch();

			$statement3 = $connection->prepare(
				'SELECT COUNT(*) AS amount FROM attendance 
				WHERE student_id=:id and type_attendance_id=2 and class_id = :class_id'
			);
			$statement3->execute(array(
				':id' => $students['id'],
				':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
			));
			$absences = $statement3->fetch();

			$statement4 = $connection->prepare(
				'SELECT COUNT(*) AS amount FROM attendance 
				WHERE student_id=:id and type_attendance_id=3 and class_id = :class_id'
			);
			$statement4->execute(array(
				':id' => $students['id'],
				':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
			));
			$exculpatory = $statement4->fetch();

			$statement5 = $connection->prepare(
				'SELECT COUNT(*) AS amount FROM attendance 
				WHERE student_id=:id and type_attendance_id=4 and class_id = :class_id'
			);
			$statement5->execute(array(
				':id' => $students['id'],
				':class_id' => filter_var(strtolower($_GET['class_id']), FILTER_SANITIZE_STRING)
			));
			$delays = $statement5->fetch();
			$total_days = $attendance['amount'] + $absences['amount'] + $delays['amount'] + $exculpatory['amount'];
			echo "<tr><td>" . $students["name"] . "</td><td><center>" . $attendance['amount'] . "</center></td><td><center>" . $absences['amount'] . "</center></td><td><center>" . $exculpatory['amount'] . "</center></td><td><center>" . $delays['amount'] . "</center></td>";
			if ($total_days > 0)
				echo "<td><center><a class='fa fa-edit' 
				href='attendance_edit.php?class_id={$_GET['class_id']}&student_id={$students['id']}'></a></center></td>";
			echo "</tr>";
			$students = $statement->fetch();
		}
		echo "</table><center>Total days: $total_days </center>";
		?>
		<hr>
	</div>
</div>
</body>
<?php
require 'views/footer.php';
?>

</html>