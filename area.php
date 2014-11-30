<!DOCTYPE html>

<html>


<?php
	session_start();
	$ROOT = "";
	require_once('./resources/includes/config.php');
	include_once('./resources/includes/header.php'); 
?>

<body>
	<div id="main">


		<!-- TODO: Change map to individual image, allow navigation out -->
		<div id="map">
			
		<?php
			if (isset($_GET['loc'])) {				
				$loc = explode(",",$_GET['loc']));
				echo "<img src='resources/images/maps/".string($loc[0])."/".string($loc[1])."_".string($loc[2]).".png'>";
			} else {
				echo "Not a valid location! D:";
			}
		?>

		</div>

		<!-- TODO: Use PHP to generate buttons/panel -->
		<div id="bottomPanel">

			<div id="controls">
				<?php if (isset($_SESSION['username'])): ?>
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

</html>