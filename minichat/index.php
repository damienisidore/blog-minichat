<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
		<title>Minichat</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/x-icon" href="../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	</head>

	<body>

		<?php 
			include('header.php');
		?>

		<section>
			<div class="minichat-container-div">
				<div class="minichat-form-div">
					<?php
						include('minichat_form.php');

					?>
				</div>

				<div class="minichat-reponses-div">
					<?php	
						include('minichat_reponses.php');

					?>
				</div>
				<div id="reponses-header">
			</div>
		</section>

		<?php 
			include('../footer.php');
		?>

		<script type="text/javascript" src="jsminichat.js"></script>
		<script type="text/javascript" src="../index.js"></script>
		<script src="../jquery-3.6.0.js"></script>
	</body>
</html>


