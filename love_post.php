<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>Love Post</title>
		<meta charset="utf-8">
	</head>

	<body>

		<?php

			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$reponse = $bdd->query("SELECT SUM(clicks) AS total_clicks FROM love_clicks");

			$donnees = $reponse->fetch();

			//GET THE REAL IP ADRESS FROM THE USER, EVEN IF HE USES A PROXY - DOESN'T SEEM TO WORK WITH A VPN (NORDVPN), BUT I KEEP IT HERE ANYWAYS

			  function getIp(){
			    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			      $ip = $_SERVER['HTTP_CLIENT_IP'];
			    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			    }else{
			      $ip = $_SERVER['REMOTE_ADDR'];
			    }
			    return $ip;
			  }

			  $userIpAddress = getIp();


			if ($donnees['total_clicks'] >= 1000000) {
				
		?>
				<script type="text/javascript">window.alert("We've reached 1 MILLION LOVES! Thank you so much :)")</script>

				<!-- Redirection meta -->
				<meta http-equiv="refresh" content="0;URL=index.php">
		<?php		
			}

			else {

				$requete = $bdd->prepare('INSERT INTO love_clicks(name, clicks, ip_address) VALUES(:name, :clicks, :ip_address)');

					$requete->execute(array(
						'name' => 'new lover',
						'clicks' => 10,
						'ip_address' => $userIpAddress,
					));

					//redirects to index.php
					header('Location: index.php');

				}

		?>

		<script type="text/javascript" src="index.js"></script>
		<script src="jquery-3.6.0.js"></script>

	</body>
</html>