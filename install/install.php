<?php

require '../resources/includes/config.php';

$dbconn = new PDO('mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'], $config['DB_USERNAME'], $config['DB_PASSWORD']);

$stmt = $dbconn->prepare("

     	CREATE DATABASE IF NOT EXISTS `rpi-s` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
      	USE `rpi-s`;
      
	DROP TABLE IF EXISTS `areas`;
	DROP TABLE IF EXISTS `enemies`;
	DROP TABLE IF EXISTS `enemySpawn`;
	DROP TABLE IF EXISTS `events`;
	DROP TABLE IF EXISTS `factions`;
	DROP TABLE IF EXISTS `grades`;
	DROP TABLE IF EXISTS `inventory`;
	DROP TABLE IF EXISTS `objects`;
	DROP TABLE IF EXISTS `objSpawn`;
	DROP TABLE IF EXISTS `players`;

	CREATE TABLE IF NOT EXISTS `areas` (
	  `areaID` int(11) NOT NULL,
	  `name` int(11) NOT NULL,
	  `description` int(11) NOT NULL,
	  `coordinates` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `enemies` (
	  `enemyID` int(11) NOT NULL,
	  `name` int(11) NOT NULL,
	  `description` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `enemySpawn` (
	  `areaID` int(11) NOT NULL,
	  `enemyID` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `events` (
	  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	  `date` int(11) NOT NULL,
	  `quest` int(11) NOT NULL,
	  `reward` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `factions` (
	  `factionID` int(11) NOT NULL,
	  `factionName` varchar(255) NOT NULL,
	  `description` varchar(255) NOT NULL,
	  `startingLocation` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;

	CREATE TABLE IF NOT EXISTS `grades` (
	  `id` int(11) NOT NULL,
	  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
	  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	  `maxEXP` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	INSERT INTO `grades` (`id`, `name`, `description`, `maxEXP`) VALUES
	(0, 'Freshman', '', 500),
	(1, 'Sophomore', '', 1500),
	(2, 'Junior', '', 5000);

	CREATE TABLE IF NOT EXISTS `inventory` (
	  `playerID` int(11) NOT NULL,
	  `objID` int(11) NOT NULL,
	  `equipped` tinyint(1) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `objects` (
	  `objID` int(11) NOT NULL,
	  `name` int(11) NOT NULL,
	  `descritption` int(11) NOT NULL,
	  `type` int(11) NOT NULL,
	  `effects` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `objSpawn` (
	  `areaID` int(11) NOT NULL,
	  `objID` int(11) NOT NULL,
	  `percentage` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	CREATE TABLE IF NOT EXISTS `players` (
	`playerID` int(11) NOT NULL,
	  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
	  `allnaturalseasalt` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	  `pasword` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
	  `email` text COLLATE utf8_unicode_ci NOT NULL,
	  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
	  `active_quest` tinyint(1) NOT NULL DEFAULT '-1',
	  `current_location` int(11) NOT NULL DEFAULT '-1',
	  `action_points` int(3) NOT NULL DEFAULT '15',
	  `grade` int(11) NOT NULL,
	  `exp` int(11) NOT NULL DEFAULT '0',
	  `faction` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

	ALTER TABLE `events`
	 ADD PRIMARY KEY (`title`);

	ALTER TABLE `players`
	 ADD PRIMARY KEY (`playerID`);

	ALTER TABLE `players`
	MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT;
	");

	$stmt->execute();
?>
