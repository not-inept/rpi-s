<?php 

	session_start(); 
	if (isset($_SESSION['username']) && isset($_POST['logout'])) {
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
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
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
				<h1 id="name"><?php echo $_SESSION['username']; ?></h1>
				<li class="cardInfo" id="faction">Faction: <?php echo $_SESSION['faction_str']; ?></li>
				<li class="cardInfo" id="health">HP: <?php echo $_SESSION['hp']; ?> / <?php echo $_SESSION['maxhp']; ?></li>
				<li class="cardInfo" id="grade">Grade: <?php echo $_SESSION['grade_str']; ?> </li>
				<li class="cardInfo" id="exp">EXP: <?php echo $_SESSION['exp']; ?> / <?php echo $_SESSION['maxxp'] ?></li>
				<li class="cardInfo" id="points">Points: <?php echo $_SESSION['points'] ?> </li>
				<form method="post" action="index.php">
        			<input name="logout" type="submit" value="[ remove card ]" />
    			</form>
			</div>
			<div id="cardPic">
				picture
			</div>
		<?php else: ?>
			<div id="cardNone">
				<a href="resources/auth/login.php">[ insert card ]<br><br>(click to play)</a>
			</div>
		<?php endif; ?>
		</div>

	</div>


	<div id="navigation">
		<li id="mapview" class="navigation">
			<a href="index.php">Map View</a>
		</li>
		<li id="user" class="navigation">
			<a href="user.php">Inventory</a>
		</li>
		<li id="faq" class="navigation">
			<a href="faq.php">FAQ</a>
		</li>
		<li id="about" class="navigation">
			<a href="about.php">About</a>
		</li>
	</div>


	<div id="location">
		git pul@rpi-s: err: COULD NOT MOUNT DISK, ENABLE JS
	</div>
</header>
