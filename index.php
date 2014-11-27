<!DOCTYPE html>
<html>
<head>
	<title>RPI Survival Game</title>
	<link rel="stylesheet" href="style/main.css" type="text/css"/>
	<link rel="stylesheet" href="style/home.css" type="text/css"/>
</head>

<body>
	<div class="container">
		<?php include 'resources/navigation.php' ?>
		
		<section class="left inline">
			<div id="map">
				<div id="mapLayout">
					<?php include 'resources/maps/map_0_0.php'; ?>
				</div>
				<span class="arrow backArrow">Main<br>Map</span>
				<span class="arrow leftArrow"></span>
				<span class="arrow rightArrow"></span>
				<span class="arrow topArrow"></span>
				<span class="arrow bottomArrow"></span>
			</div>
		</section>

		<section class="right inline">
			<form id="loginForm" class="border" action="login.php" method="post">
				<input type="text" name="username" placeholder="Username"/>
				<input type="password" name="password" placeholder="Password"/>
				<input type="submit" value="LOGIN"/>
				<input type="button" value="Sign Up"/>
			</form>
			<section class="news border">
				<h2>Morning Mail Meh</h2>
				<div id="events">
				</div>
			</section>
		</section>
	</div>
</body>

<!-- improves performance by moving script files to bottom -->
<script type="text/javascript" src="scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>

</html>
