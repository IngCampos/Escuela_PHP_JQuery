<?php
require 'header.php';
?>

<body>
	<div class="container">
		<h2>Index: <?php echo "{$_SESSION['user']['name']} ({$_SESSION['user']['title']})"; ?></h2>
		<a href="logout.php">Logout</a><a style="float: right;" class="inico" href="index.php">Index</a>
		<hr class="border">
		<div class="content">
			<?php if ($_SESSION['user']['title'] == "Student") require 'student.view.php';
			else if ($_SESSION['user']['title'] == "Teacher") require 'teacher.view.php';
			else if ($_SESSION['user']['title'] == "Administrator") require 'administrator.view.php'; ?>
			<hr>
		</div>
	</div>
</body>
<?php
require 'footer.php';
?>

</html>