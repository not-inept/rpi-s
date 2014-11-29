<?php
	if (!isset($ROOT)) $ROOT = "../../";
    require_once($ROOT."resources/includes/config.php");
    require_once($ROOT."resources/auth/CAS-1.3.2/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert("/auth/CACert.pem");//this is relative to the cas client.php file
    phpCAS::setNoCasServerValidation();
?>
