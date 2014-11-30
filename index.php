<!DOCTYPE html>

<html>


<?php 
	$ROOT = "";
	require_once('./resources/includes/config.php');
	include_once('./resources/includes/header.php'); 
?>


<body>

		<section class="left inline">
			<div id="map">
				<div id="mapLayout">
					<table>
						<tr data-row="1">
							<td data-column="1"></td>
							<td data-column="2"></td>
						</tr>
						<tr data-row="2">
							<td data-column="1"></td>
							<td data-column="2"></td>
						</tr>
					</table>
				</div>
				<span class="arrow backArrow">Main<br>Map</span>
				<span class="arrow leftArrow"></span>
				<span class="arrow rightArrow"></span>
				<span class="arrow topArrow"></span>
				<span class="arrow bottomArrow"></span>
			</div>
		</section>
</body>


<!-- improves performance by moving script files to bottom -->
<script type="text/javascript" src="resources/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="resources/js/main.js"></script>

</html>
