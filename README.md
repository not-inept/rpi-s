#rpi-s
A PHP/JS powered text based RPG that takes place on RPI's campus.
###Usage/Installation
First create a file "resources/includes/config.php" of the format:
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


Front-end Design and UI
We used HTML5 and CSS3 to style RPI-S. Our site was based on a variety of other online game sites, and we decided to make our site similar to old-school games with a slight terminal feel. We put the insert card log-in and the morning news on the top since we want them to be the first things our users will notice when they come to the site. The text output box was made to give off a terminal feel, and the we made the map transparent so it would be similar to maps found on console game menus. The controls were placed on the bottom along with the area description so that the user can get a better idea of where they are on the map first, and then go down to see their options and learn more about the area that they’re in. We made the login-in and sign up screens on different pages to reduce the clutter on our website, since we wanted to keep it minimalistic.
