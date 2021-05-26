<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style/style.css"/>
		<title>MODIFIER BILLET</title>
	</head>

	<body>

		<?php
		include('header.php');

		// Fonction pour obtenir slug
		function slugify($string, $delimiter = '-') {
			$oldLocale = setlocale(LC_ALL, '0');
			setlocale(LC_ALL, 'en_US.UTF-8');
			$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
			$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
			$clean = strtolower($clean);
			$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
			$clean = trim($clean, $delimiter);
			setlocale(LC_ALL, $oldLocale);
			return $clean;
			}

		$newtitle = $_POST['titrebillet'];

		$slugified_title = slugify($newtitle);

		
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


		if ($_POST['titrebillet'] !='' && $_POST['contenubillet'] != '') // Si l'utilisateur a entré un titre et du contenu, alors l'article s'ajoute
		{

			$id_billet = $_POST['idbillet'];

			// On modifie la table billets
			$requete = $bdd->prepare("UPDATE billets SET titre = :titre, contenu = :contenu, slug = :slug WHERE id = '$id_billet'");

			$requete->execute(array(
				'titre' => $_POST['titrebillet'],
				'contenu' => $_POST['contenubillet'],
				'slug' => $slugified_title,
				));

			$requete->closeCursor();

			// On modifie le slug_billet dans la table commentaires
			$reqcom = $bdd->prepare("UPDATE commentaires SET slug_billet = :slug_billet WHERE id_billet = '$id_billet'");

			$reqcom->execute(array(
				'slug_billet' => $slugified_title,
				));

			$reqcom->closeCursor();



			echo "<p>Article modifié avec succès !</p>";

			echo '<p><a href="../commentaireblog.php?slug=' . htmlspecialchars($slugified_title) . '&id=' . htmlspecialchars($_POST['idbillet']) . '">Voir article</a></p>';

			echo '<p><a href="../index.php">Accueil</a></p>';


		}

		else {
		?>

			<script> window.alert('Veuillez entrer un titre et du contenu');</script>

		<?php

		echo '<p><a href="billet_review.php?slug=' . htmlspecialchars($_GET['slug']) . '">Retour</a></p>';

		}

		include('../../footer.php');

		?>

		<script type="text/javascript" src="../../jsblog.js"></script>
		<script src="../../jquery-3.6.0.js"></script>

	</body>
</html>