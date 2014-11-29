<?php
    echo "Literally crying...";
    require("../includes/config.php");
    require("./CAS-1.3.2/CAS.php");
    echo "CAS files loaded...";
    phpCAS::client(CAS_VERSION_2_0,'cas-auth.rpi.edu',443,'/cas/');
    // SSL!
    phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
    //phpCAS::setNoCasServerValidation();
    echo "Entering if....";
    if (!phpCAS::isAuthenticated())
    {
        echo "Auth = False...";
        phpCAS::forceAuthentication();
        //echo "What is going on...."
    }else{
        echo "Auth = True..";
        header('location: ../../index.php');
    }
    echo "Got to end...";
?>