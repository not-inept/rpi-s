<?php
    require_once("../includes/config.php");
    include_once("./CAS-1.3.2/CAS.php");
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    //phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
    phpCAS::setNoCasServerValidation();
    if (!phpCAS::isAuthenticated())
    {
        phpCAS::forceAuthentication();
        echo phpCAS::getUser();
    }else{
        header('location: ../../index.php');
    }
?>