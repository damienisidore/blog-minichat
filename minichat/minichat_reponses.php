<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>Minichat Reponses</title>
		<meta charset="utf-8">
	</head>

	<body>
			<?php

				$bdd = new PDO ('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



				//AFFICHER LES MESSAGES 


				$reponse = $bdd->query("SELECT UPPER(pseudo) AS pseudo_maj, message, DATE_FORMAT(messdate, '%d/%m/%Y à %T') AS messdate FROM minichat ORDER BY messdate DESC LIMIT 0, 200");


			?>

		<section>
			<div class="minichat-reponses-div-2">
				<div class="is-online-div">
					<p><span id="pseudo-is-online"></span><span id="is-online"></span></p>
				</div>

				<div class="is-writing-div">
					<p><span id="is-writing-pseudo"><span id="pseudo-res"></span><span id="is-writing"></span></span></p>
				</div>
				<?php
					while ($donnees = $reponse->fetch()) {
				
						echo "<div id='reponses-minichat'><div class='pseudo-reponse-minichat'><p><strong>" . htmlspecialchars($donnees['pseudo_maj']) . " : </strong></p></div><div class='message-reponse-minichat'><p>" . htmlspecialchars($donnees['message']) . "</p></div><div class='date-reponse-minichat'><span id='datemessage'>" . $donnees['messdate'] . "</span></p></div></div>";
					}

				?>

			</div>
		</section>

				<?php
					$reponse->closeCursor(); /* il faut fermer les résultats de recherche avec closeCursor()  après avoir traité chaque requête. */

				?>

		<script type="text/javascript" src="jsminichat.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>