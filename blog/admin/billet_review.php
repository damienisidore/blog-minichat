<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style/style.css"/>
		<title>BILLET REVIEW</title>
		<link rel="icon" type="image/x-icon" href="../../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />
	</head>

	<body>


		<?php

		include('header.php');

		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



		if (isset($_GET['slug']) && $_GET['slug'] != '') {

			//Afficher l'article

			$titre_slug = $_GET['slug'];

			$bil = $bdd->query("SELECT id, titre, contenu, slug, DATE_FORMAT(date_creation, 'le %d/%m/%Y à %T') AS datebillet FROM billets WHERE slug = '$titre_slug'");

			$donneesbil = $bil->fetch();

			$content = $donneesbil['contenu'];

			if (isset($donneesbil['slug'])) {

				?>

				<p><a href="../index.php">Liste des articles</a>

				<div class="news">
					<form action="billet_review_post.php" method="POST">
						<p><label>Titre : </label><br />
						<input type="text" name="titrebillet" id="titrenewbillet" value="<?php echo htmlspecialchars($donneesbil['titre']); ?>"></p>


						<p><label>Article : </label><br />
						<textarea name="contenubillet" id="contenubillet"><?php echo $content; ?></textarea></p>

						<span style="display: none;"><input type="text" name="idbillet" value="<?php echo $donneesbil['id']; ?>"></span>
						
						<p><input type="submit" name="validerbillet" value="Poster !" id="submitnewbillet"></p>
					</form>

				</div>

				<?php

				$bil->closeCursor(); // On libère le curseur pour la prochaine requête

			}

			else {

			?>
				<!-- Redirection meta -->
				<meta http-equiv="refresh" content="0;URL=../index.php">
			<?php
			}

		}

		else {

		?>
			<!-- Redirection meta -->
			<meta http-equiv="refresh" content="0;URL=../index.php">
		<?php
		}

		include('../../footer.php');
		?>

		<script type="text/javascript" src="../../jsblog.js"></script>
		<script src="../../jquery-3.6.0.js"></script>

	</body>
</html>