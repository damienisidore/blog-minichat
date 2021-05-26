<?php 

	if (isset($_POST['auteurcomment'])){
		setcookie('pseudo_user', $_POST['auteurcomment'], time() + 365*24*3600*100, null, null, false, true); 
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
		<title>COMMENTAIRES DE MON BLOG</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/x-icon" href="../favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
	</head>

	<body>

		<?php
			include('header.php');
		?>


		
		<section class="blog-entire-page-content">
			<section class="article-content">
				<div class="blog-container">
					<div class="all-articles-link">
						<a href="index.php">All articles</a>
					</div>

					<div class="the-entire-article">
						<?php



						$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



						if (isset($_GET['slug']) && $_GET['slug'] != '') {

							//Afficher l'article


							$titre_slug = $_GET['slug'];
							$id_billet = $_GET['id'];

							$bil = $bdd->query("SELECT id, titre, contenu, slug, image_name, DATE_FORMAT(date_creation, '%d/%m/%Y %H:%i') AS datebillet FROM billets WHERE slug = '$titre_slug'");

							$donneesbil = $bil->fetch();

							if (isset($donneesbil['slug'])) {
								?>

								<div class="news">
									<div class="single-news-area">

										<div class="news-title">
											<h3>
											<?php echo htmlspecialchars($donneesbil['titre']); ?>
											</h3>	
										</div>

										<div class="news-title-date-div date-and-slug">
											<div class="news-date-news">
												<em><?php echo htmlspecialchars($donneesbil['datebillet']); ?></em>
											</div>
											<div>
												<em>Slug : <?php echo htmlspecialchars($donneesbil['slug']);?></em>
											</div>
										</div>

										<div class="single-news-image-div">
											<?php echo '<img src="' . htmlspecialchars($donneesbil['image_name']) . '"width="100%">';?>
										</div>

										<div class="single-news-content-single">
											<p><?php echo nl2br(htmlspecialchars($donneesbil['contenu']));?></p>
										</div>

										<!-- <div class="news-links-div">
											<div class="edit-article-link edit-single-article-link">
												<p><span style="text-align : right;"><?php echo '<em><a href="admin/billet_review.php?slug=' . htmlspecialchars($donneesbil['slug']) . '">Edit</a></em>'; ?></span></p>
											</div>

											<div class="delete-article-link">
												<p><span style="text-align : right;"><?php echo '<em><a href="admin/billet_suppr.php?slug=' . htmlspecialchars($donneesbil['slug']) . '&id=' . htmlspecialchars($donneesbil['id']) . '">Delete</a></em>'; ?></span></p> -->
											</div>
										</div>
									</div>
								</div>
					</div>
				</div>
			</section>

			<section class="comments-display">
				<div class="blog-container">
					<div class="news">
						<div class="write-comment-title">	
								<h4>Write a comment</h4>
						</div>

						<div class="write-comment-form">
								<p>
									<form action ="commentaire_post.php" method="POST">


										<p><input type="text" name="auteurcomment" id="pseudocomment" placeholder="Real name or pseudo..." value=<?php if (isset($_COOKIE['pseudo_user'])){ echo $_COOKIE['pseudo_user'];}?>></p>

										<p><textarea name="comment" class="add-comment-texte" id="addcomment" placeholder="Speak your mind..."></textarea></p>
										<span class="slugcomment" style="display: none;"><input type="text" name="slugbillet" id="bilslugged" value=<?php echo $titre_slug ?>></span>

										<span class="idcomment" style="display: none;"><input type="text" name="id_billet" id="idbillet" value=<?php echo $id_billet ?>></span>

										<div>
											<div class="comment-submit-btn">
												<p><input type="submit" name="valider" id="confirm" value="Post"></p>
											</div>
										</div>

									</form>
								</p>
						</div>

						<div class="comments-all-comments">

							<div class="comments-area-title">
								<h4>Comments</h4>
							</div>
								<?php

								$bil->closeCursor(); // On libère le curseur pour la prochaine requête

								// Afficher les commentaires affiliés à l'article

								$id_billet = $_GET['id'];

								$comment = $bdd->query("SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, 'le %d/%m/%Y à %H:%i') AS datecommentaire FROM commentaires WHERE id_billet = '$id_billet' ORDER BY date_commentaire DESC LIMIT 0, 100");

								if ($comment->rowCount() > 0) {

									while ($donneescom = $comment->fetch()) {

										?>
										<div class="single-comment">
											<div class="comment-pseudo-date">
												<p><strong><?php echo htmlspecialchars($donneescom['auteur']); ?> </strong><span class="comment-date"><?php echo htmlspecialchars($donneescom['datecommentaire']); ?></span></p>
											</div>
											<div class="comment-content-text">
												<p><?php echo nl2br(htmlspecialchars($donneescom['commentaire'])); ?></p>
											</div>
										</div>

										<?php
									} // Fin de la boucle des commentaires

								}

								else {
									echo "<p>No comment</p>";
					?>
						</div>
					</div>
					<?php
							}

							$comment->closeCursor();

						}

						else {

						?>
							<!-- Redirection meta -->
							<meta http-equiv="refresh" content="0;URL=index.php">
						<?php
						}

					}

					else {

					?>
						<!-- Redirection meta -->
						<meta http-equiv="refresh" content="0;URL=index.php">
					<?php
					}

					?>
				</div>
			</section>
		</section>


		<?php
		include('../footer.php');
		?>

		<script type="text/javascript" src="jsblog.js"></script>
		<script src="../jquery-3.6.0.js"></script>

	</body>
</html>