<!doctype html>
<html>
<?php
$ROOT = "";
require_once('./resources/includes/config.php');
include_once('./resources/includes/header.php');
if (isset($_SESSION['username'])){
	$stmt = $dbconn->prepare('SELECT o.* FROM inventory i, objects o WHERE i.playerID=:usernum AND o.objID=i.objID;');
        $stmt->execute(array(
		':usernum' => $_SESSION['id']
	));
} else {
	header('location: resources/auth/login.php');
}
?>
<body>
        <section id = "userInventory">
        <h2 class = "userInventory">Player Items:</h2>
        <ul>
        <?php
        foreach ($stmt as $row){
                echo '<li>'.$row['name'].': '.$row['description'].'</li>';
        }
        ?>
        </ul>
        </section>

        </section id="changeFaction">

        </section>
</body>

<script type="text/javascript" src="resources/js/jquery-2.1.1.min.js"></script>
<script>
var uname = "anon";
if ($('#name').length) {
        var uname = $('#name').html().trim();
}
$('#location').html(uname + "@rpi-s: " + "~/inventory$");
</script>
</html>