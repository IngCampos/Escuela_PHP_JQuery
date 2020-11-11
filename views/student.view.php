<center>
	<h2>Subjects</h2>
</center>
<?php
try {
	$connection = new PDO('mysql:host=localhost;dbname=attendance_school', 'root', '');
} catch (PDOException $e) {
	echo "Error: {$e->getMessage()}";
}
$statement = $connection->prepare(
	'SELECT class.id, class.hour, subjects.name, subjects.description, subjects.grade, users.name 
	FROM student_class INNER JOIN class ON student_class.class_id=class.id 
	INNER JOIN subjects ON class.subject_id=subjects.id 
	INNER JOIN users ON class.teacher_id=users.id
	WHERE student_class.student_id = :id ORDER BY class.hour'
);
$statement->execute(array(
	':id' => $_SESSION['user']['0']
	//se pone 0 por que al haber dos campos con el name id, el otro pasa a nombrarse 0
));
$class = $statement->fetch();
echo "<table><tr><td>Hour</td><td>Subject</td><td>Grade</td><td>Teacher</td><td>Attendances</td></tr>";

while ($class != null) {
	//en el proceso determina el numero de attendance, faltas, etc.
	// TODO: create just one SQL query instead of 4 queries
	$statement2 = $connection->prepare(
		'SELECT COUNT(*) AS amount FROM attendance 
		WHERE student_id=:id and type_attendance_id=1 and class_id = :class_id'
	);
	$statement2->execute(array(
		':id' => $_SESSION['user']['0'],
		':class_id' => $class['id']
	));
	$attendance = $statement2->fetch();

	$statement3 = $connection->prepare(
		'SELECT COUNT(*) AS amount FROM attendance 
		WHERE student_id=:id and type_attendance_id=2 and class_id = :class_id'
	);
	$statement3->execute(array(
		':id' => $_SESSION['user']['0'],
		':class_id' => $class['id']
	));
	$absences = $statement3->fetch();

	$statement4 = $connection->prepare(
		'SELECT COUNT(*) AS amount FROM attendance 
		WHERE student_id=:id and type_attendance_id=3 and class_id = :class_id'
	);
	$statement4->execute(array(
		':id' => $_SESSION['user']['0'],
		':class_id' => $class['id']
	));
	$exculpatory = $statement4->fetch();

	$statement5 = $connection->prepare(
		'SELECT COUNT(*) AS amount FROM attendance 
		WHERE student_id=:id and type_attendance_id=4 and class_id = :class_id'
	);
	$statement5->execute(array(
		':id' => $_SESSION['user']['0'],
		':class_id' => $class['id']
	));
	$delays = $statement5->fetch();

	$total_days = $attendance['amount'] + $absences['amount'] + $delays['amount'] + $exculpatory['amount'];
	echo "<tr><td>{$class['hour']}</td><td>{$class[2]}</td><td>{$class['grade']}</td><td>{$class['name']}</td>
	<td>Assistances: {$attendance['amount']}<br>Absences: {$absences['amount']}<br>Exculpatories: 
		{$exculpatory['amount']}<br>Delays: {$delays['amount']}<br> Total: {$total_days}<hr></td></tr>";
	$class = $statement->fetch();
}
echo "</table> Total days: $total_days";
