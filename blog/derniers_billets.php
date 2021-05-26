<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
		<title>DERNIERS BILLETS</title>
		<meta charset="utf-8">
	</head>

	<body>

		<section class="allnews-container-section">
			<div class="blog-container blog-container-content">
					<div class="article-write-link">
						<p><a href="admin/addbillet.php">Write an article</a></p>
					</div>

					<?php

						// On prépare le compte des pages

						if (isset($_GET['page']) && $_GET['page'] >= 1) {
							$page = $_GET['page'];
						}

						else {
							$page = 1;
						}


						$compte_page = ((int)$page * 5) - 5;


						// On récupère les 5 derniers billets dans la base de données
						try {
							$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						}

						catch(Exception $e)
						{
						        die('Erreur : '.$e->getMessage());
						}

						$requete = $bdd->query("SELECT id, titre, IF(CHAR_LENGTH(contenu) > 900, CONCAT(LEFT(contenu, 900), ' [...]'), contenu) AS contenu_cut, slug, image_name, DATE_FORMAT(date_creation, '%d/%m/%Y %H:%i') AS datebillet FROM billets ORDER BY date_creation DESC LIMIT $compte_page, 5");

						$old_billets = $bdd->query("SELECT id, titre, contenu, DATE_FORMAT(date_creation, 'le %d/%m/%Y') AS datebillet FROM billets ORDER BY date_creation DESC");
						

						while ($donnees = $requete->fetch()) {

						?>
			
							<div class="news">
								<div class="single-news-div">
										<div class="news-title">	
												<h3>
													<?php echo htmlspecialchars($donnees['titre']); ?>
													
												</h3>
										</div>

										<div class="news-title-date-div">
											<p>
												<em><?php echo htmlspecialchars($donnees['datebillet']); ?></em>
											</p>
										</div>

									<div class="clickable-article-area">
										<a href="commentaireblog.php?slug=<?php echo htmlspecialchars($donnees['slug'])?>&id=<?php echo htmlspecialchars($donnees['id'])?>">
											<div class="news-image-n-text-div">

												<div class="news-image-div">
													<?php echo '<img src="' . htmlspecialchars($donnees['image_name']) . '" width="300px">';?>
												</div>

												<div class="news-content-div">
													<p class="article-resume">
													<?php
													// On affiche le contenu du billet
														echo nl2br(htmlspecialchars($donnees['contenu_cut']));
													?>
													</p>
												</div>
											</div>
										</a>
									</div>
									
									<div class="news-links-div">
										<div class="read-article-link">
											<p>
												<?php echo '<em><a href="commentaireblog.php?slug=' . htmlspecialchars($donnees['slug']) . '&id=' . htmlspecialchars($donnees['id']) . '">Read</a></em>'; ?>
											</p>
										</div>
										<!-- <div class="edit-article-link">
											<p>
												<?php echo '<em><a href="admin/billet_review.php?slug=' . htmlspecialchars($donnees['slug']) . '">Edit</a></em>'; ?>
											</p>
										</div> -->
									</div>
								
								</div>
							</div>
			
						<?php
						} // End of the articles while loop

						$nb_billets = $old_billets->rowCount();

						$nb_pages = $nb_billets/5;


						if ($nb_pages % 5 !== 0) {
							$nb_pages = ceil($nb_pages);
						}

						?>

						<div class="articles-pages-links">
							<p>Page : 

						<?php

							for ($page=1; $page <= $nb_pages ; $page++) { 
								echo '<a href=index.php?page=' . $page . '" style="margin:8px;" class="page-link-class">' . $page . '</a>';
							}

						?>
							</p>
						</div>

						<?php


						$requete->closeCursor();
						$old_billets->closeCursor();
					?>
			</div>
		</section>


		<script type="text/javascript" src="jsblog.js"></script>
		<script src="../jquery-3.6.0.js"></script>
	</body>
</html>