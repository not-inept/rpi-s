<?php 

	session_start(); 
	if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
	    session_unset(); 
	    session_destroy();
	  // end the session here
	  $err = 'You have been logged out.';
	}
	
?>

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
			<ul id="newsFeed">
				<?php
					require 'config.php';
					require 'connect.php';
					require 'classifieds.php';
				?>
			</ul>
		</div>

		<div id="card">
		<?php if (isset($_SESSION['username'])): ?>
			<div id="cardInfo">
				<h1>Player Info</h1>
				<li class="cardInfo" id="name">Name: <?php echo $_SESSION['username']; ?></li>
				<?php
					
				?>
				<li class="cardInfo" id="faction">Faction: <?php echo $_SESSION['faction_str']; ?></li>
				<li class="cardInfo" id="health">HP: <?php echo $_SESSION['hp']; ?> / <?php echo $_SESSION['maxhp']; ?></li>
				<li class="cardInfo" id="grade">Grade: <?php echo $_SESSION['grade_str']; ?> </li>
				<li class="cardInfo" id="exp">EXP: <?php echo $_SESSION['exp']; ?> / <?php echo $_SESSION['maxxp'] ?></li>
				<li class="cardInfo" id="points">Points: <?php echo $_SESSION['points'] ?> </li>
				<form method="post" action="index.php">
        			<input name="logout" type="submit" value="Logout" />
    			</form>
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
			<a href="index.php">Map View</a>
		</li>
		<li class="navigation">
			<a href="user.php">Inventory</a>
		</li>
		<li class="navigation">
			<a href="faq.php">FAQ</a>
		</li>
		<li class="navigation">
			<a href="contact.html">Contact</a>
		</li>
	</div>


	<div id="location">
		git pul@rpi-s: err: COULD NOT MOUNT DISK, ENABLE JS
	</div>
</header>