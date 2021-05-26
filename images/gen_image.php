<?php
header ("Content-type: image/png"); // 1 : on indique qu'on va envoyer une image PNG
$image = imagecreate(200,100); // 2 : on crée une nouvelle image de taille 200 x 100

$orange = imagecolorallocate($image, 255, 128, 0); // la première fois que la fonction imagecolorallocate est appelée donne la couleur de l'image. Ici Orange 
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255); 

imagestring($image, 4, 35, 15, "Salut les Zéros !", $blanc); // imagestring($image, $police, $x, $y, $texte_a_ecrire, $couleur);
// imagecolortransparent($image, $orange); On rend le fond orange transparent

$points = array(10, 40, 120, 50, 160, 160); ImagePolygon ($image, $points, 3, $noir);

imagepng($image); // 4 : on a fini de faire joujou, on demande à afficher l'image
?>

<!DOCTYPE html>
<html>
	<head>

		<title>MON IMAGE</title>
	</head>
	<body>
		<img src="gen_image.php" />

	</body>
</html>
