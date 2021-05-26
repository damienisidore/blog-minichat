<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../style/style.css"/>
		<title>POST BILLET</title>
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



		if ($_POST['titrebillet'] !='' && $_POST['contenubillet'] != '') // If the user added a title and content we add it to the database
		{


		// Check if the file is an image, its extension etc...

			$target_dir = "../uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$target_dir_admin = "uploads/";
			$target_file_admin = $target_dir_admin . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			  if($check !== false) {
			    $uploadOk = 1;
			  } else {
			    ?>
			  		<script>windonw.alert('Le fichier n\'est pas une image');</script>
			  		
			  	<?php
			    $uploadOk = 0;
			  }
			}

			// Check if file already exists
			if (file_exists($target_file)) {
			  ?>
			  		<script>windonw.alert('L\'image existe déjà');</script>
			  		
			  	<?php
			  $uploadOk = 0;
			}

			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
			  ?>
			  		<script>windonw.alert('L\'image est trop lourde');</script>
			  		
			  	<?php
			  $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  ?>
			  		<script>windonw.alert('Format de fichier non autorisé. Vous pouvez télécharger un fichier jpg, png, jpeg ou gif.');</script>
			  		
			  	<?php
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  ?>
			  		<script>windonw.alert('Une erreur est survenue. Désolé, le fichier n\'a pas été téléchargé.);</script>
			  		
			  	<?php
			// if everything is ok, try to upload file
			} else {
			  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			  } else {
			    ?>
			  		<script>windonw.alert('Une erreur est survenue. Désolé, le fichier n\'a pas été téléchargé.);</script>
			  		
			  	<?php
			  }
			}



			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


			$requete = $bdd->prepare('INSERT INTO billets(titre, contenu, slug, image_name) VALUES (:titre, :contenu, :slug, :image_name)');

			$requete->execute(array(
				'titre' => $_POST['titrebillet'],
				'contenu' => $_POST['contenubillet'],
				'slug' => $slugified_title,
				'image_name' => $target_file_admin,
				));

			$requete->closeCursor();

			echo "<p>Nouvel article créé avec succès !</p>";

			echo '<p><a href="billet_review.php?slug=' . htmlspecialchars($slugified_title) . '">Voir article</a></p>';

			?>
			<p><a href="addbillet.php">Écrire un nouvel article</a></p>
			<p><a href="../index.php">Accueil</a></p>
			<?php


		}

		else {
		?>

			<script> window.alert('Veuillez entrer un titre et du contenu');</script>

			<meta http-equiv="refresh" content="0;URL=addbillet.php">

		<?php

		}

		include('../../footer.php');

		?>

		<script type="text/javascript" src="../../jsblog.js"></script>
		<script src="../../jquery-3.6.0.js"></script>
	</body>
</html>