<?php

	$F_Name = $_POST['first'];
	$L_Name = $_POST['last'];
	$Pword = $_POST['pwd'];
	$EMail = $_POST['email'];
	$Gender = $_POST['sex'];
	$Class = $_POST['class'];

	$conn = new PDO('mysql:host=localhost;dname=project_test', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $use_table = "USE `project_test`;";
        $conn->exec($use_table);

        $send_info = $conn->prepare("UPDATE persons
         SET `FirstName` = '" . $F_Name . "', `LastName` = '" . $L_Name . "', `Pass` = '" . $Pword . "', `Email` ='" . $EMail ."'
            WHERE id = 1;");
        $send_info->execute();

	header('Location: account_page.php');

?>
