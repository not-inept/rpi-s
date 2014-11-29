#rpi-s
A PHP/JS powered text based RPG that takes place on the campus.
###Usage/Installation
First create a file called "config.php" of the format:
````php
<?php

$config = array(
    'DB_HOST'     => '[YOUR DB HOST]',
    'DB_NAME'	  => '[YOUR DB NAME]',
    'DB_USERNAME' => '[YOUR DB USERNAME]',
    'DB_PASSWORD' => '[YOUR DB PASSWORD]',
);

?>
````
Then install by activating mysql and apache, then loading the "./install/install.php" to install the databases required. If the table/needed data exists they will not be recreated. Instead, the old tables should be dropped before running the installer during an upgrade/re-install.
