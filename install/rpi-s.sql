-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2014 at 01:59 AM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpi-s`
--
CREATE DATABASE IF NOT EXISTS `rpi-s` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rpi-s`;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `areaID` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` int(11) NOT NULL,
  `coordinates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enemies`
--

CREATE TABLE IF NOT EXISTS `enemies` (
  `enemyID` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enemySpawn`
--

CREATE TABLE IF NOT EXISTS `enemySpawn` (
  `areaID` int(11) NOT NULL,
  `enemyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `quest` int(11) NOT NULL,
  `reward` int(11) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`title`, `description`, `location`, `date`, `quest`, `reward`) VALUES
('C & EE Seminar to be Held December 10', 'Description: Speaker Dr. Dominic Di Tori of NAE, will present "M', 'jec', 1418173200, 0, 0),
('Circle K to Hold Candy Gram Fundraiser', 'Description: RPI Circle K International Community Services will ', 'union', 1417568400, 0, 0),
('Computer Science Colloquium to be Held December 15', 'Description: speaker Dr. David Woodruff from IBM''s Almaden Resea', 'cii', 1418605200, 0, 0),
('Computer Science, NeST to Host Joint Colloquium', 'Description: Jointly hosted by Rensselaer''s Computer Science dep', 'cii', 1418086800, 0, 0),
('Dept. of MANE Colloquium Scheduled for December 3', 'Description: Dr. Tugrul Ozel of Rutgers University will present ', 'dcc', 1417568400, 0, 0),
('Hillel to Host Shabbat Dinner', 'Description: RPI-Sage Hillel hosts a shabbat dinner for the whol', 'union', 1418950800, 0, 0),
('Lally Issues Call for Entries for RPI Business Model Competition', 'Description: Don''t miss out on your chance at a piece of the $15', 'campus', 1418691600, 0, 0),
('Laurie Anderson to Present New Film at EMPAC', 'Description: Distinguished artist-in-residence Laurie Anderson p', 'empac', 1418346000, 0, 0),
('Rensselaer to Host 6th International Workshop on Quantitative Fi', 'Description: Designed to guide participants along the difficult ', 'campus', 1418864400, 0, 0),
('Student Writers to Mark End of Semester with Short Story Reading', 'Description: As part of their end-of-term celebration, student c', 'dcc', 1417741200, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factions`
--

CREATE TABLE IF NOT EXISTS `factions` (
  `factionID` int(11) NOT NULL,
  `factionName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `startingLocation` int(11) NOT NULL,
  UNIQUE KEY `factionID` (`factionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factions`
--

INSERT INTO `factions` (`factionID`, `factionName`, `description`, `startingLocation`) VALUES
(-1, 'TRAITOR', 'The lowest of the low, marked forever, doomed to die alone.', -1),
(0, 'Republic of Blitman', '', 0),
(1, 'Hilltop Coalition', '', 0),
(2, 'Freshman Alliance', '', 0),
(3, 'Quad Squad', '', 0),
(4, 'Hacker Guild', '', 0),
(5, 'Brigands of BARH', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maxEXP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `description`, `maxEXP`) VALUES
(0, 'Freshman', '', 500),
(1, 'Sophomore', '', 1500),
(2, 'Junior', '', 5000),
(3, 'Senior', '', 12000),
(4, 'Graduate', '', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `playerID` int(11) NOT NULL,
  `objID` int(11) NOT NULL,
  `equipped` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `objID` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `effects` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`objID`, `name`, `description`, `type`, `effects`) VALUES
(0, 'Apple Phone', 'Very shiny.', 0, 0),
(1, 'Android Phone', 'Not so shiny.', 0, 0),
(2, 'Nerf Gun', 'Once useful in HVZ games, these have ben found to be surrisingly effective against other assailants.', 0, 0),
(3, 'Messenger Bag', 'A slight increase in inventory capacity (+5).', 0, 0),
(4, 'Backpack', 'Adds more inventory capacity (+10).', 0, 0),
(5, 'Rolling Backpack', 'Lots of storage! (+15)', 0, 0),
(6, 'Skateboard', 'Allows you to move with less effort. (+5 distance).', 0, 0),
(7, 'Hard Drive Platters', 'Shiny. Good throwing disks. (3 damage)\r\nNot expended when thrown.', 0, 0),
(8, 'Safety Goggles', 'They keep your eyes safe. Wear them. (+4 defense).', 0, 0),
(9, 'Welding Apron', 'This thing is heavy...but also fireproof. (+10 defense)', 0, 0),
(10, 'Laptop', 'A useful blunt object, which incidentally can hack things. (+8 hacking)', 0, 0),
(11, 'Laser Gun', 'Cobbled together from a scavenged iClicker, this item is more useful than is was originally... (8 damage)', 0, 0),
(12, 'Glasses', 'Better perception. Also makes you look wiser, if that''s your thing (+6 perception)', 0, 0),
(13, 'Exoskeleton Arm', 'Part of an enterprising engineer''s latest project in mechanical enhancement. Perhaps if you find the other pieces you can put one together?', 0, 0),
(14, 'Exoskeleton Leg', 'Part of an enterprising engineer''s latest project in mechanical enhancement. Perhaps if you find the other pieces you can put one together?', 0, 0),
(15, 'Exoskeleton Body', 'Part of an enterprising engineer''s latest project in mechanical enhancement. Perhaps if you find the other pieces you can put one together?', 0, 0),
(16, 'Exoskeleton Head', 'Part of an enterprising engineer''s latest project in mechanical enhancement. Perhaps if you find the other pieces you can put one together?', 0, 0),
(17, 'Complete Exoskeleton', 'A finished exoskeleton! You can carry more, move farther, and hit harder (+13 storage, +10 movement, +6 attack).', 0, 0),
(18, 'Duct Tape', 'Useful for putting pieces of things (back) together.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `objSpawn`
--

CREATE TABLE IF NOT EXISTS `objSpawn` (
  `areaID` int(11) NOT NULL,
  `objID` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `playerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `allnaturalseasalt` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active_quest` int(11) NOT NULL DEFAULT '-1',
  `current_location` int(11) NOT NULL DEFAULT '-1',
  `action_points` int(3) NOT NULL DEFAULT '15',
  `grade` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `faction` int(11) NOT NULL,
  `hp` int(11) NOT NULL DEFAULT '50',
  `maxhp` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `name`, `allnaturalseasalt`, `password`, `email`, `special`, `active_quest`, `current_location`, `action_points`, `grade`, `exp`, `faction`, `hp`, `maxhp`) VALUES
(2, 'bolin', 'd735493473efec0ab479003ce20429ccbd3da8493f26b788e9b66d454f7a4082', 'd0afe6a61889f08f04f696a7e0236b9f3fd6c2fab96010e6220a8ed26bab0834', 'bendbro@gmail.com', '', -1, -1, 15, 0, 0, 0, 50, 50),
(9, '1', '8c1741fce878d8a2aae5eb54efbcf3d0d9eef10197fc16802649615470de32d9', '8f1eea82dcec845d47eb16b4193d530a54455bef0b4588ab72e03bc460fcf0e8', '3@gmail.com', '', -1, -1, 15, 0, 0, 4, 50, 50),
(10, 'Dan', '072d5cf5eeb3b2031618826d08ce303a8c7d0c12db120fe9150f891ded325344', '67ee242a8042b13694fd05d93d47d09a30ad18de913eb0e3a0123ab4435ab604', 'dbc@gmail.com', '', -1, -1, 15, 0, 0, 2, 50, 50),
(11, 'mark', '1cc8037004516878112891b09356fb19b2d95249c41b34bae182b3a0ea8455b9', 'ded8f7bfcd3b2276f9f484269dc5c2a2329d9087b118e4c4c759b3033afe3417', 'blah@blahcorp.tk', '', -1, -1, 15, 0, 0, 3, 50, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
