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
					require 'resources/includes/classifieds.php';
				?>
			</div>
		</div>

		<div id="card">
		<?php if (isset($_SESSION['username'])): ?>
			<div id="cardInfo">
				<h1>Player Info</h1>
				<li class="cardInfo" id="name">Name: <?php echo $_SESSION['username'] ?></li>
				<li class="cardInfo" id="faction">Faction: <?php echo $_SESSION['faction'] ?></li>
				<li class="cardInfo" id="health">HP: <?php echo $_SESSION['hp'] ?></li>
				<li class="cardInfo" id="grade">Grade: <?php echo $_SESSION['grade'] ?> </li>
				<li class="cardInfo" id="exp">EXP: <?php echo $_SESSION['exp'] ?></li>
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
		git pul@rpi-s: err: COULD NOT MOUNT DISK, ENABLE JS
	</div>
</header>