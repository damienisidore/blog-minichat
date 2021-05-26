<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style/style.css"/>
		<title>AJOUTER BILLET</title>
		<link rel="icon" type="image/x-icon" href="../../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />
	</head>

	<body>

		<?php
			include('header.php');

		?>

			<h1>Écris ici ton article</h1>

			<p><a href="../index.php">Liste des articles</a>

			<form enctype="multipart/form-data" action="addbillet_post.php" method="POST">
				<p><label>Titre : </label><br />
				<input type="text" name="titrebillet" id="titrenewbillet" value="Un titre qui attirera les regards, et marquera les esprits"></p>

				<p><label>Image : </label><br />
				<input type="file" name="fileToUpload" id="fileToUpload"></p>

				<p><label for="contenubillet">Article : </label><br />
				<textarea name="contenubillet" id="contenubillet">De ta plus belle plume tu poseras des mots</textarea></p>

				<p><input type="submit" name="validerbillet" value="Poster !" id="submitnewbillet"></p>
			</form>
		<?php

			include('../../footer.php');
		?>

		<script type="text/javascript" src="../../jsblog.js"></script>
		<script src="../../jquery-3.6.0.js"></script>

	</body>
</html>