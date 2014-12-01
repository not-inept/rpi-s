<!DOCTYPE html>

<html>

<?php
	session_start();
	require_once('./resources/includes/config.php');
	include_once('./resources/includes/header.php'); 
?>

<body>
	<div id="main">

		<!-- TODO: Change map to individual image, allow navigation out -->
			
		<?php

			$mapString = "<div id='map'";
			if (isset($_GET['loc'])) {				
				$loc = explode(",",$_GET['loc']);
				$mapString .= " style='background-image: url(resources/images/maps/";
				$mapString .= $loc[0] . "/" . $loc[1] . "_" . $loc[2] . ".png);'>";
				$mapString .= '<span class="arrow leftArrow"></span>
							   <span class="arrow rightArrow"></span>
							   <span class="arrow topArrow"></span>
							   <span class="arrow bottomArrow"></span>';
			} else {
				$mapString .= "> Not a valid location! D:";
			}
			$mapString .= "</div>";
			echo $mapString;
		?>

		<!-- TODO: Use PHP to generate buttons/panel -->
		<div id="bottomPanel">
			<div id="controls">
			<?php if (isset($_SESSION['username'])): ?>
				<?php 

				?>
			<?php else: ?>
				<li class="controls">
					<a href="resources/auth/login.php">[ insert card ] to play</a>
				</li>
			<?php endif; ?>
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
<script type="text/javascript" src="resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="resources/js/area.js"></script>
</html>