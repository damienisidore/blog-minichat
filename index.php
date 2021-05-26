<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>

		<!-- GOOGLE FONT LINK -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/3c859eddc4.js" crossorigin="anonymous"></script>

		<title>Damien Isidore</title>
		<meta charset="utf-8">
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>

	<body>

		<?php
			include('header.php');

			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			$reponse = $bdd->query("SELECT SUM(clicks) AS total_clicks FROM love_clicks");

			$donnees = $reponse->fetch();

		?>

		<section class="hero">
				<div class="hero-area">
					<div class="hero-image-area">
						<img id="hero-picture" src="images/damien-isidore-picture.png" alt="Damien Isidore's picture">
					</div>
					<div class="hero-text">
						<div class="hero-texts">
							<div class="hero-title">
								<h1><span class="orange-word" id="d-of-damien">D</span>amien Isi<span class="orange-word">d</span>ore</h1>
							</div>

							<div class="hero-subtitle">
								<h4><span class="orange-word hero-orange-word" id="product-hero-text">Product Manager / Owner</span> and Front-end <span class="orange-word hero-orange-word" id="developer-hero-text">Developer</span>, I help you create products that your customers will <span class="orange-word hero-orange-word" id="love-hero-text">Fall in Love</span> with.</h4>
							</div>
						</div>
						<div class="hero-button-n-canvas">
							<div class="text-n-button-love">
								<div class="hero-love-text">
									<h4>If you <span class="orange-word hero-orange-word">like</span> what you see <span class="orange-word hero-orange-word love-explain">click</span> on the button to show me some <span class="orange-word hero-orange-word love-explain">love</span> <span class="orange-word" id="love-count">0</span><br /><span class="orange-word hero-orange-word love-explain">Total Love: <?php

										if ($donnees['total_clicks'] >= 1000 && $donnees['total_clicks'] < 1000000) {

											$kNumber = $donnees['total_clicks'] / 1000;

											echo $kNumber . 'K';
										}

										elseif ($donnees['total_clicks'] >= 1000000) {
											echo '1M';
										}

										else {
									 		echo $donnees['total_clicks']; 
									 	}

									 ?></span> </h4>

								</div>

							
								<div class="btn-wrapper">
									<form action="love_post.php" method="POST" id="love_click_form" name="myLoveForm" onsubmit="return validateMyLoveForm();">

										<button type="submit" class="btn" id="love-button">touch me</button>
									</form>
								</div>
							</div>
						
							<canvas id="canvas"></canvas>
							
						</div>
					</div>
				</div>
		</section>


		<section class="sub-section" id="skills-anchor">
			<div class="about-me-skills body-content-div">
				<div class="sub-section-container sub-section-text-div">
					<div class="about-me-text">
						<h4>
							Everything here is "handmade" <span class="orange-word">from scratch</span>. I use this website to try new programming, design and marketing things, so you can see what I'm able to do and what I'm currently learning. But hey: you won't find everything here so for more info why don't you check my <a href="images/CV-Damien-Isidore.jpg" download class="skill-link">CV</a> and <a href="#projects" class="skill-link">recent projects</a>!
						</h4>
					</div>
				</div>

				<div class="sub-section-container sub-section-skills-div">
					<div>
						<h2>S<span class="orange-word">k</span>ills & Stac<span class="orange-word">k</span></h2>
					</div>
					<div class="skills-circle" id="skls-progression">
						<div class="skills-circle-1">

							<div class="col-md-3">
								<div class="skill-round" data-value="0.65" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-scrum"></i>
									Scrum / Agile method
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.6" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-html5"></i>
									HTML5
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.5" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-css3"></i>
									CSS3
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.4" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-js-square"></i>
									JavaScript / jQuery
									</span>
								</div>
							</div>

						</div>


						<div class="skills-circle-2">

							<div class="col-md-3">
								<div class="skill-round" data-value="0.4" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-php"></i>
									PHP
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.4" data-size="200" data-thickness="12">
									<strong class="in-round"></strong>
									<span><i class="fa fa-sql"></i>
									SQL
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.65" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-wordpress"></i>
									WordPress
									</span>
								</div>
							</div>

							<div class="col-md-3">
								<div class="skill-round" data-value="0.60" data-size="200" data-thickness="12">
									<strong></strong>
									<span><i class="fa fa-photoshop"></i>
									Photoshop / Illustrator / Adobe XD
									</span>
								</div>
							</div>

						</div>
						
					</div>
				</div>
			</div>
		</section>

		<section class="sub-section-alt">
			<div class="projects-container-a body-content-div">
				<div class="div-container-div" id="projects">
					<h2>Re<span class="orange-word">c</span>ent Proje<span class="orange-word">c</span>ts</h2>
				</div>
				<div  class="project-container">
					<a href="https://btcchap.com/" target="_blank"><div class="project-card">
						<div>
							<img class="project-image" src="images/btc-chap.png" alt="BTC Chap image"/>
						</div>
						<div class="project-card-text">
							<div>
								<h3>BTC Chap</h3>
							</div>
							<div>
								<p class="project-subtext project-description">I started a business to allow my clients to <span class="orange-word">buy and sell their cryptocurrencies in Francs CFA</span> (French Western African money). I built a <span class="orange-word">Wordpress website</span> for it and to generate leads.</p>
							</div>
							<div>
								<hr/>
								<p class="project-subtext view-here">View here</p>
							</div>
						</div>
					</div></a>

					<a href="https://www.afrikrea.com/" target="_blank"><div class="project-card">
						<div>
							<img class="project-image" src="images/afrikrea.png" alt="Afrikrea image"/>
						</div>
						<div class="project-card-text">
							<div>
								<h3>Afrikrea</h3>
							</div>
							<div>
								<p class="project-subtext project-description">Afrikrea is the <span class="orange-word">largest "made of Africa" e-commerce platform</span> for african designers and sellers. I've <span class="orange-word">worked on many features as a PM</span> like the customer service and return order automation, the wallet optimization, the onsite DHL label buying via DHL API etc.</p>
							</div>
							<div>
							<hr/>
								<p class="project-subtext view-here">View here</p>
							</div>
						</div>
					</div></a>

					<a href="https://moustac.com/" target="_blank"><div class="project-card">
						<div>
							<img class="project-image" src="images/moustac.png" alt="Moustac Africa image"/>
						</div>
						<div class="project-card-text">
							<div>
								<h3>Moustac Africa</h3>
							</div>
							<div>
								<p class="project-subtext project-description">Using <span class="orange-word">Wordpress</span> I've made an entire functional website to allow customers to <span class="orange-word">book their leisure, tourist and sport activities</span> in Western Africa. I am in negotiation with a tour operator to launch the project.</p>
							</div>
							<div>
								<hr/>
								<p class="project-subtext view-here">View here</p>
							</div>
						</div>
					</div></a>

					<a href="https://mahalevillage.com/fr/" target="_blank"><div class="project-card">
						<div>
							<img class="project-image" src="images/mahale.png" alt="Mahalé Village image"/>
						</div>
						<div class="project-card-text">
							<div>
								<h3>Mahalé Village</h3>
							</div>
							<div>
								<p class="project-subtext project-description">Using <span class="orange-word">Prestashop</span> I've made an <span class="orange-word">e-commerce website</span> for the women cooperative of the village of Mahale in Northern Ivory Coast. They use it to <span class="orange-word">sell their shea butter</span>, and will soon sell other products.</p>
							</div>
							<div>
								<hr/>
								<p class="project-subtext view-here">View here</p>
							</div>
						</div>
					</div></a>
				</div>
			</div>
		</section>

		<section class="sub-section-contact" id="sub-section-contact-form">
			<div class="contact-div-contact body-content-div">
				<div class="contact-form">
					<div id="contact-me"><h2>Co<span class="orange-word">n</span>tact <span class="orange-word">m</span>e</span></h2></div>
					<div class="contact-form-content">
						<form action="https://formsubmit.co/4bcd5111b985180adcfafe405a2aae73" method="POST">
							<div class="email-name">
								<div class="email-contact">
									<input type="email" name="email" placeholder="Email" maxlength="50" required>
								</div>
								<div class="name-contact">
									<input type="text" name="name" placeholder="Name" maxlength="50" required>
								</div>
							</div>

							<input type="hidden" name="_subject" value="Contact damienisidore.com">
							<input type="text" name="_honey" style="display:none">
							<input type="hidden" name="_autoresponse" value="Thank you ! I received your message and will reply as soon as I can.">

							<div>
								<textarea name="message" class="contact-form-msg" id="contact-form-message" maxlength="1000" placeholder="Write everything you want" required></textarea>
							</div>
			     			<div class="contact-submit">
			     				<input type="submit" class="contact-form-submit" value="Send"></input>
			     			</div>
						</form>
					</div>
				</div>
			</div>
		</section>


		<?php
			include('footer.php')
		?>

		<script type="text/javascript" src="index.js"></script>
		<script src="jquery-3.6.0.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.0/circle-progress.min.js" integrity="sha512-xlGek7L5p0odaCy8lkU1WpUJLuoxjuLDaiGpYrHJhp1YUNaA4x+c3PYvEIInH5clr0uHFucar2bhUR0Ef4R0ww==" crossorigin="anonymous"></script>



		<script>

			// TO DISPLAY ANIMATED SKILLS CIRCLES ;)
			
			function Circlle(el){
				$(el).circleProgress({fill: {color: '#ff3a00'}}).on('circle-animation-progress', function(event, progress, stepValue){
					$(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
				});
			};

			Circlle('.skill-round');


			// Checks if the parameter element is displayed on the screen
			function checkVisible(elm) {
			  var rect = elm.getBoundingClientRect();
			  var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
			  return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
			}

			//Checks if the div skls-progression is displayed every 250ms then cancels the interval
			var interval = setInterval(function() {
			    if ( checkVisible(document.getElementById('skls-progression'))) {
			        Circlle('.skill-round');
			        clearInterval(interval); // Clears the SetInterval
			    }
			}, 250);


		</script>


		<script type="text/javascript">

			// SUPER BUTTON THAT THROWS PARTICLES ON CLICK !!

			var c = document.getElementById('canvas');
			var ctx = c.getContext('2d', {alpha: false});
			var btn = document.getElementsByClassName('btn')[0];

			ctx.fillStyle = 'green';

			c.width = window.innerWidth / 2.5;
			c.height = window.innerHeight / 2.5;

			var mouseX = c.width / 2;
			var mouseY = c.height / 2;
			var txtPosition = 0;

			var particles = [];

			btn.addEventListener('mouseup', function(e){
				
				
				createParticles();
				changeText();
			});

			setTimeout(function(){
				createParticles();
			}, 250);

			draw();

			function draw(){
				
				drawBg();
				incParticles();
				drawParticles();
				
				window.requestAnimationFrame(draw);
				
			}

			function drawBg(){
				ctx.rect(0, 0, c.width, c.height);
				ctx.fillStyle = "rgb(47, 56, 66)";
				ctx.fill();
			}

			function drawParticles(){
				for(i = 0; i < particles.length; i++){
					ctx.beginPath();
					ctx.arc(particles[i].x,
								 particles[i].y,
								 particles[i].size,
								 0,
								 Math.PI * 2);
					ctx.fillStyle = particles[i].color;
					ctx.closePath();
					ctx.fill();
				}
			}

			function incParticles(){
				for(i = 0; i < particles.length; i++){
					particles[i].x += particles[i].velX;
					particles[i].y += particles[i].velY;
					
					particles[i].size = Math.max(0, (particles[i].size - .05));
					
					if(particles[i].size === 0){
						particles.splice(i, 1);
					}
				}
			}

			function createParticles(){
				for(i = 0; i < 30; i++){
					particles.push({
						x: mouseX,
						y: mouseY,
						size: parseInt(Math.random() * 10),
						color: 'rgb(' + ranRgb() + ')',
						velX: ranVel(),
						velY: ranVel()
					});
				}
			}

			function ranRgb(){
				var colors = [
					'255, 58, 0',
					'0, 157, 255',
					'0, 240, 120'
				];
				
				var i = parseInt(Math.random() * 10);
				
				return colors[i];
			}

			function ranVel(){
				var vel = 0;
				
				if(Math.random() < 0.5){
					vel = Math.abs(Math.random());
				} else {
					vel = -Math.abs(Math.random());
				}
						
				return vel;
			}

			// Btn changing text

			var btnTxt = [
				'hehe',
				'ouch!',
				'ooooh',
				'oouuuh',
				'HARDER',
				'softer',
				'tenderly',
				'it\' weird',
				'love you Poya',
				'send'
			];

			function changeText(){
				if(txtPosition !== btnTxt.length){
					btn.innerHTML = btnTxt[txtPosition];
					txtPosition += 1;
				}
			}


			// Count the number of clicks

			let loveClicks = 0;

			document.getElementById("love-button").addEventListener("click", function() {

				if (loveClicks <= 100000) {
					document.getElementById("love-count").innerText = (++loveClicks) + '';
				}else{
					loveClicks = 100000;
				}
			});


			// Validate the form only when 10 clicks are reached

			function validateMyLoveForm(){

				if(loveClicks <= 9) { 

			    	return false;
			    }
			}

		</script>

	</body>
</html>