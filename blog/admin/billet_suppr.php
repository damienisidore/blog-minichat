<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style/style.css"/>
		<title>SUPPRIMER BILLET</title>
		<link rel="icon" type="image/x-icon" href="../../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />
	</head>

	<body>

		<?php

		include('header.php');

		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		$id_billet = $_GET['id'];

		$req = $bdd->query("DELETE FROM billets WHERE id = '$id_billet'");

		$req->closeCursor();

		$requete = $bdd->query("DELETE FROM commentaires WHERE id_billet = '$id_billet'");

		$requete->closeCursor();


		echo "<p>Article supprimé avec succès</p>";



		?>

		<p><a href="../index.php">Accueil</a></p>

		<?php
		include('../../footer.php');
		?>

		<script type="text/javascript" src="../../jsblog.js"></script>
		<script src="../../jquery-3.6.0.js"></script>
	</body>
</html>