<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
		<title>MON BLOG</title>
		<link rel="icon" type="image/x-icon" href="../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	</head>

	<body>
		<?php 
			include('header.php');
		?>

		<div class="blog-title">
			<h1>Damien Isidore Blog</h1>
		</div>

		<?php 
		include('derniers_billets.php');
		?>

		<?php 
			include('../footer.php');
		?>

		<script type="text/javascript" src="jsblog.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>