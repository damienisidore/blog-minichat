<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
		
		<!-- GOOGLE FONT LINK -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/3c859eddc4.js" crossorigin="anonymous"></script>

		<title>Header</title>
		<meta charset="utf-8">
	</head>

	<body>
		<section class="header-head">
			<div>
				<nav class="header-menu">
					<a href="../index.php"><img class="header-logo" src="images/logo-damien-50.png" alt="Damien Isidore's logo"></a>
					
					<ul id="nav-list">

						<li class="close-button-li">
							<div class="header-menu-item menu-close-button" id="menu-close-button">
								<div>
									<i class="fas fa-times"></i>
								<div>
							</div>
						</li>

						<li>
							<div class="header-menu-item real-menu-item home-link" id="item-1">
								<div>
									<a href="../index.php">Home</a>
								<div>
							</div>
						</li>

						<li>
							<div class="header-menu-item real-menu-item" id="item-2">
								<div>
									<a href="#skills-anchor">Skills</a>
								<div>
							</div>
						</li>
						
						<li>
							<div class="header-menu-item real-menu-item" id="item-3">
								<div>
									<a href="#projects">Projects</a>
								</div>
							</div>
						</li>

						<li>
							<div class="header-menu-item real-menu-item blog-item" id="item-4">
								<div>
									<a href="blog/index.php">Blog</a>
								</div>
							</div>
						</li>

						<li>
							<div class="header-menu-item real-menu-item contact-form-btn" id="item-5">
								<div>
									<a href="#sub-section-contact-form">Contact me</a>
								</div>
							</div>
						</li>
					</ul>
					<button class="hamburger" id="hamburger">
						<i class="fas fa-bars"></i>
					</button>
				</nav>
			</div>
		</section>


		<script type="text/javascript">

			//HAMBURGER MENU

			const hamburgerButton = document.getElementById('hamburger');
			const navList = document.getElementById('nav-list');
			const menuCloseBtn = document.getElementById('menu-close-button');
			const itemOne = document.getElementById('item-1');
			const itemtwo = document.getElementById('item-2');
			const itemthree = document.getElementById('item-3');
			const itemFour = document.getElementById('item-4');
			const itemFive = document.getElementById('item-5');


			hamburgerButton.addEventListener('click', function() {
				navList.classList.add('show');
			});

			menuCloseBtn.addEventListener('click', function() {
				navList.classList.remove('show');
			});

			


			itemtwo.addEventListener('click', function() {
				navList.classList.remove('show');
			});

			itemthree.addEventListener('click', function() {
				navList.classList.remove('show');
			});

			


			itemFive.addEventListener('click', function() {
				navList.classList.remove('show');
			});


		</script>

		<script type="text/javascript" src="index.js"></script>
		<script src="jquery-3.6.0.js"></script>
	</body>
</html>