<?php 

if (isset($_POST['pseudo'])){
	setcookie('pseudouser', $_POST['newpseudo'], time() + 365*24*3600*100, null, null, false, true); 
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		<title>Minichat Pseudo</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/x-icon" href="../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
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
			header('Location: index.php');
		}

		else {
	?>
			<div class="write-message-area">
				<h2>Choisissez votre pseudo</h2>

				<form action= "minichat_form.php" method="POST">
					<p><label>Pseudo : </label><input type="text" name="newpseudo" id="newpseudo" maxlength="15"></p>
					<p><input type="submit" name="valider" value="Valider" id="valider"></p>
				</form>
			</div>
	<?php
		}
	?>
		<script type="text/javascript" src="jsminichat.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>
