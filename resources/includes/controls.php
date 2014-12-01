<?php 
if (isset($_SESSION['username'])) {
	if (isset($_SESSION['current_location']) && $_SESSION['current_location'] == $_GET['loc']) {

	} else {
		echo "
		<li class='control'>
		<a href='
		area.php?loc=".$_SESSION['current_location']."
		''>Your character appears to be elsewhere.</a>
		</li>";
	}
} else {
	echo '
	<li class="controls">
	<a href="resources/auth/login.php">[ insert card ] to play</a>
	</li>';
}
?>