<?php 

if (isset($_POST['newpseudo'])){
	setcookie('pseudouser', $_POST['newpseudo'], time() + 365*24*3600*100, null, null, false, true); 
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>Minichat Form</title>
		<meta charset="utf-8">
	</head>

	    <style>
	    	form {
	        	text-align:center;
	    	};

	    	#valider {
	    		color : #fff;
	    		background-color : green;
	    	}

    	</style>

	<body>

		<?php 
			if (isset($_COOKIE['pseudouser'])) {

		?>
				<div class="write-message-area">
					<div>
						<p id="pseudo-cookie-hidden">
							<?php echo $_COOKIE['pseudouser'];?>
						</p>
					</div>
					<h2>Write here</h2>

					<form action= "minichat_post.php" method="POST">
						<p><label>Pseudo : </label><input type="text" name="pseudo" id="pseudo" maxlength="15" value=<?php echo $_COOKIE['pseudouser'];
							?>></p>
						<p><label>Message : </label><textarea name="message" id="message" maxlength="300"></textarea></p>
						<p><input type="submit" name="valider" value="Envoyer" id="valider"></p>
					</form>
				</div>

				<div id="minichat-refresh-div">
					<a href="minichat_refresh.php">RAFRAICHIR</a>			
				</div>
		<?php
			}

			else {
				header('Location: minichat_pseudo.php');
			}
		?>

		<script type="text/javascript">
			
			/* On récupère l'input pseudo dans le formulaire du minichat-form.php, 
			puis on le fait apparaitre dans l'espace réponse de minichat-reponses */


			let pseudoUser = document.getElementById("pseudo");


			pseudoUser.addEventListener("input", function(event) {
				document.getElementById("pseudo-is-online").innerHTML = "<strong>" + event.target.value.toUpperCase() + "</strong>";

				document.getElementById("is-online").innerHTML = " est connecté(e)";

			});


			document.getElementById("message").addEventListener("input", (event) => {

				let pseudoOnline = document.getElementById("pseudo-is-online").innerHTML;
				

				let isWritingDiv = document.getElementById("is-writing");
				
				isWritingDiv.innerHTML = '<div class="pseudo-reponse-minichat"><p>' + pseudoOnline + ' : </p></div><div class="message-reponse-minichat"><p>' + event.target.value + '</p></div>';

			});
		</script>

		<script type="text/javascript" src="jsminichat.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>
