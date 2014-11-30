<head>
	<title>RPI-S</title>
	<link rel="stylesheet" href="resources/css/style.css" type="text/css"/>
	<link rel="stylesheet" href="resources/css/home.css" type="text/css"/>
</head>

<header>
	<div id="info">

		<div id="gameName">
			RPI-S
		</div>

		<div id="news">
			<h1>Morning News</h1>
			<div class="newsFeed">
				<?php
					require $_SERVER['DOCUMENT_ROOT'].'/resources/includes/classifieds.php';
				?>
			</div>
		</div>

		<div id="card">
		<?php if (isset($_SESSION['username'])): ?>
			<div id="cardInfo">
				<h1>Player Info</h1>
				<li class="cardInfo">Name: <?php echo phpCas::getUser(); ?></li>
				<li class="cardInfo">Faction: ITWS</li>
				<li class="cardInfo">Level: 9001</li>
				<li class="cardInfo">HP: 70%</li>
				<li class="cardInfo">EXP: 500/1000</li>
				<li class="cardInfo">Status: stressed from finals </li>
			</div>
			<div id="cardPic">
				picture
			</div>
		<?php else: ?>
			<div id="cardNone">
				<a href="resources/auth/login.php">[ insert card ]</a>
			</div>
		<?php endif; ?>
		</div>

	</div>


	<div id="navigation">
		<li class="navigation">
			current location
		</li>
		<li class="navigation">
			inventory
		</li>
		<li class="navigation">
			FAQ
		</li>
		<li class="navigation">
			Contact
		</li>
	</div>


	<div id="location">
		Directory: Main_Map/Quadrant_01/Quadrant_01_01
	</div>
</header>