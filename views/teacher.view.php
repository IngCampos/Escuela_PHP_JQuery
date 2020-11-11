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
	'SELECT class.id, subjects.name, subjects.grade, subjects.description, class.hour 
	FROM class INNER JOIN subjects ON class.subject_id=subjects.id 
	WHERE class.teacher_id = :id 
	ORDER BY class.hour'
);
$statement->execute(array(
	':id' => $_SESSION['user']['0']
	//se pone 0 por que al haber dos campos con el name id, el otro pasa a nombrarse 0
));
$class = $statement->fetch();
echo "<table><tr><td>Hour</td><td>Subject</td><td>Grade</td><td>Pass the role</td><td>Attendances</td><td></tr>";
while ($class != null) {
	echo "<tr><td>{$class['hour']}</td><td>{$class['name']}</td><td><center>{$class['grade']}</center></td>
	<td><center><a class='fa fa-edit' href='control.php?class_id={$class['id']}'></a></center></td>
	<td><center><a class='fa fa-sticky-note' href='attendance.php?class_id={$class['id']}'></a></center></td></tr>";
	$class = $statement->fetch();
}
echo "</table>";
