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
				<?php include './resources/includes/controls.php'; ?>
			</div>

			<div id="panelInfo">
				<?php include './resources/includes/loadMapPanel.php'; ?>
			</div>

			<div id="information">
				INFORMATION
			</div>

		</div>

		<?php 
			if (isset($_SESSION['cmd']) && $_SESSION['cmd'] != "no") {
				echo "<div style='display: none;' id='noOneCares'>";
				echo $_SESSION['cmd'];
				echo "</div>";
				$_SESSION['cmd'] = "no";
			}
		?>

	</div>
</body>

<!-- improves performance by moving script files to bottom -->
<script type="text/javascript" src="resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="resources/js/area.js"></script>
</html>