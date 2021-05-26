<?php 

if (isset($_POST['pseudo'])){
	setcookie('pseudouser', $_POST['pseudo'], time() + 365*24*3600*100, null, null, false, true); 
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>Minichat Post</title>
		<meta charset="utf-8">
	</head>

	<body>

		<?php


			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


			if ($_POST['pseudo'] != '' AND $_POST['pseudo'] != 'DAMIEN_ISD' AND $_POST['message'] != '') {

				$requete = $bdd->prepare('INSERT INTO minichat(pseudo, message) VALUES(:pseudo, :message)');

				$requete->execute(array(
					'pseudo' => $_POST['pseudo'],
					'message' => $_POST['message'],
				));

				// Effectuer ici la requête qui insère le message
				// Puis rediriger vers index.php comme ceci :
				header('Location: index.php');
			}

			
			else {
		
		?>
				<script>window.alert('Veuillez entrer votre pseudo et un message');</script>

			
				<!-- Redirection meta -->
				<meta http-equiv="refresh" content="0;URL=index.php">
		<?php
				}

		?>

		<script type="text/javascript" src="jsminichat.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>


