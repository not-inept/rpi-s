<!DOCTYPE html>

<html>


<head>
	<title>RPI-S</title>
	<link rel="stylesheet" href="style/style.css" type="text/css"/>
</head>


<body>
	<div id="main">
		<?php 
			$ROOT = "";
			require_once('./resources/includes/config.php');
			include_once('./resources/includes/header.php'); 
		?>

		<!-- TODO: Change map to individual image, allow navigation out -->
		<div id="map">
			
		<?php
			if (isset($_GET['loc'])) {
				//TODO: load image
				echo print_r($_GET['loc']);
			}
		?>

		</div>

		<!-- TODO: Use PHP to generate buttons/panel -->
		<div id="bottomPanel">

			<div id="controls">
				<li class="controls">
					control01
				</li>
				<li class="controls">
					control02
				</li>
				<li class="controls">
					control03
				</li>
				<li class="controls">
					control04
				</li>
				<li class="controls">
					control05
				</li>
				<li class="controls">
					control06
				</li>
			</div>

			<div id="panelInfo">
				<div id="panel1">
					<h1>panel01</h1>
					Random information for panel01. Probably about the mission the player has been assigned. Go into specifics. Blah blah blah. 
				</div>
				<div id="panel2">
					<h1>panel02</h1>
					Random information for panel02. Probably about the area that the player is in, possible spawn, foes, friends, items that can be found, etc.
				</div>
			</div>

			<div id="information">
				INFORMATION
			</div>

		</div>


	</div>
</body>


<!-- improves performance by moving script files to bottom -->
<script type="text/javascript" src="scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>

</html>