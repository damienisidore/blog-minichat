<?php
	if (isset($_POST['auteurcomment'])){
	setcookie('pseudo_user', $_POST['auteurcomment'], time() + 365*24*3600*100, null, null, false, true); 
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>POST COMMENTAIRES</title>
		<meta charset="utf-8">
	</head>

	<body>

		<?php

		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		if ($_POST['auteurcomment'] !='' && $_POST['comment'] != '') {


			$requete = $bdd->prepare('INSERT INTO commentaires(id_billet, slug_billet, auteur, commentaire) VALUES (:id_billet, :slug_billet, :auteur, :commentaire)');

			$requete->execute(array(
				'id_billet' => $_POST['id_billet'],
				'slug_billet' => $_POST['slugbillet'],
				'auteur' => $_POST['auteurcomment'],
				'commentaire' => $_POST['comment'],
				));


			header('Location: commentaireblog.php?slug=' . htmlspecialchars($_POST['slugbillet']) . '&id=' . htmlspecialchars($_POST['id_billet']) . '');

		}

		else {
		?>

			<script> window.alert('Veuillez entrer votre pseudo et un commentaire');</script>

			<!-- Redirection meta -->
			<meta http-equiv="refresh" content="0;URL=commentaireblog.php?slug=<?php echo htmlspecialchars($_POST['slugbillet'])?>&id=<?php echo htmlspecialchars($_POST['id_billet'])?>">


		<?php
		}

		?>

		<script type="text/javascript" src="jsblog.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>