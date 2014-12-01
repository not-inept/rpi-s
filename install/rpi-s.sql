-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2014 at 07:57 AM
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
  `areaID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`areaID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`areaID`, `name`, `description`) VALUES
('1,1,2', 'The Area of Ample Ampus', 'Lacking in common sense, but containing plenty of Ampus, this region sports plenty of fierce PVP in addition to being oddly related to the shattering of the campus.');

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
  `location` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `quest` int(11) NOT NULL DEFAULT '1',
  `reward` int(11) NOT NULL DEFAULT '19',
  `areaID` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  `actionText` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Move to :L',
  `actionType` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'move',
  `actionParam` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  PRIMARY KEY (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`title`, `description`, `location`, `date`, `quest`, `reward`, `areaID`, `actionText`, `actionType`, `actionParam`) VALUES
('C & EE Seminar to be Held December 10', 'Description: Speaker Dr. Dominic Di Tori of NAE, will present "M', 'jec', 1418173200, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Circle K to Hold Candy Gram Fundraiser', 'Description: RPI Circle K International Community Services will ', 'union', 1417568400, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Computer Science Colloquium to be Held December 15', 'Description: speaker Dr. David Woodruff from IBM''s Almaden Resea', 'cii', 1418605200, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Computer Science, NeST to Host Joint Colloquium', 'Description: Jointly hosted by Rensselaer''s Computer Science dep', 'cii', 1418086800, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Dept. of MANE Colloquium Scheduled for December 3', 'Description: Dr. Tugrul Ozel of Rutgers University will present ', 'dcc', 1417568400, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Hillel to Host Shabbat Dinner', 'Description: RPI-Sage Hillel hosts a shabbat dinner for the whol', 'union', 1418950800, 0, 19, '1,1,1', 'Move to :L', 'move', '1,1,1'),
('Lally Issues Call for Entries for RPI Business Model Competition', 'Description: Don''t miss out on your chance at a piece of the $15', 'campus', 1418691600, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Laurie Anderson to Present New Film at EMPAC', 'Description: Distinguished artist-in-residence Laurie Anderson p', 'empac', 1418346000, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Rensselaer to Host 6th International Workshop on Quantitative Fi', 'Description: Designed to guide participants along the difficult ', 'campus', 1418864400, 0, 19, '1,1,1', 'Move to :L', 'move', ''),
('Student Writers to Mark End of Semester with Short Story Reading', 'Description: As part of their end-of-term celebration, student c', 'dcc', 1417741200, 0, 19, '1,1,1', 'Move to :L', 'move', '');

-- --------------------------------------------------------

--
-- Table structure for table `factions`
--

CREATE TABLE IF NOT EXISTS `factions` (
  `factionID` int(11) NOT NULL,
  `factionName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startingLocation` int(11) NOT NULL,
  UNIQUE KEY `factionID` (`factionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factions`
--

INSERT INTO `factions` (`factionID`, `factionName`, `description`, `startingLocation`) VALUES
(-1, 'TRAITOR', 'The lowest of the low, marked forever, doomed to die alone.', -1),
(0, 'Republic of Blitman', 'Cast aside from the rest of campus, these residents of Blitman were already practically running a separate community. With the extra push of dimensional separation they were finally pushed into formalizing their situation. Off from campus, but fierce as ever, those Blitman-ites that choose to leave their bastion are truly to be feared.', 0),
(1, 'Hilltop Coalition', 'Disgusted with always having their living situation referred to as "Freshmen Hill", these SNW (SNOW) residents banded together, and with Sharp Hall as their HQ, have proven they''re no longer to be trifled with. Often known as the "Terror on the Hill", their loose morals and strict governance has made them known throughout what remains of campus.', 0),
(2, 'Freshman Alliance', 'Not even they thought this was a good idea, but due to a lack of other options, it seems most freshmen ended up being forced to band together. Held by ties of necessity, Hall Hall''s leadership house has turned this unlikely bunch into something almost recognizable as an alliance.', 0),
(3, 'Quad Squad', 'Let''s face it, before the Weather Machine brought us into this new dimension residents of Quad merely wanted to reduce the amount of daily legwork they had to endure. Now, that''s come back to bite them. Although their proximity to resources and abundance of members helps give them an edge, they are quite as fearsome as residents of other halls. Still, their resourcefulness has given them quite the stockpile, and more often then not if you''re looking for something someone from Quad has already found it. ', 0),
(4, 'Hacker Guild', 'Th3 l33t 0f c4mp2s. W3 4r3 ANONYMOUS. W3 4r3 LEGION. W3 d0 n0t f0rg1v3. W3 d0 n0t f0rg3t. EXPECT US. //@#foo??L>> MySQL ERROR: IN TABLE `factions` WHERE `factionName` IS `Hacker Guild` VALUE `awesomeness` IS LARGER THAN INTEGER.MAX_VALUE', 0),
(5, 'Brigands of BARH', 'The RHAPS apartments, being isolated and alone, quickly fell apart. Many stragglers looked to BARH for help, and they found a group that was surprisingly welcoming. With all amenities covered inside their building, the BARH residents were already prepared for any disaster. Always willing to lend a hand, these brigands are truly only brigands by name, and in person seem to actually be quite the opposite.', 0);

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
  `equipped` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`playerID`, `objID`, `equipped`, `id`) VALUES
(11, 4, 1, 1),
(11, 8, 1, 2),
(2, 4, 1, 3),
(2, 7, 1, 4),
(2, 10, 1, 5),
(2, 3, 1, 6),
(13, 15, 1, 7),
(13, 13, 1, 8),
(13, 1, 1, 9),
(13, 6, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `objID` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `effects` int(11) NOT NULL,
  PRIMARY KEY (`objID`),
  UNIQUE KEY `name` (`name`)
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
(18, 'Duct Tape', 'Useful for putting pieces of things (back) together.', 0, 0),
(19, 'Chocolate Piece of Gratification', 'Mmmmm... Tasty, but so very casual. Would boost your morale, if we cared about that...', 0, 0);

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
  `current_location` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `action_points` int(3) NOT NULL DEFAULT '15',
  `grade` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `faction` int(11) NOT NULL,
  `hp` int(11) NOT NULL DEFAULT '50',
  `maxhp` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `name`, `allnaturalseasalt`, `password`, `email`, `special`, `active_quest`, `current_location`, `action_points`, `grade`, `exp`, `faction`, `hp`, `maxhp`) VALUES
(2, 'bolin', 'd735493473efec0ab479003ce20429ccbd3da8493f26b788e9b66d454f7a4082', 'd0afe6a61889f08f04f696a7e0236b9f3fd6c2fab96010e6220a8ed26bab0834', 'bendbro@gmail.com', '', -1, '1,1,1', 15, 0, 0, 0, 50, 50),
(9, '1', '8c1741fce878d8a2aae5eb54efbcf3d0d9eef10197fc16802649615470de32d9', '8f1eea82dcec845d47eb16b4193d530a54455bef0b4588ab72e03bc460fcf0e8', '3@gmail.com', '', -1, '-1', 15, 0, 0, 4, 50, 50),
(10, 'Dan', '072d5cf5eeb3b2031618826d08ce303a8c7d0c12db120fe9150f891ded325344', '67ee242a8042b13694fd05d93d47d09a30ad18de913eb0e3a0123ab4435ab604', 'dbc@gmail.com', '', -1, '-1', 15, 0, 0, 2, 50, 50),
(11, 'mark', '1cc8037004516878112891b09356fb19b2d95249c41b34bae182b3a0ea8455b9', 'ded8f7bfcd3b2276f9f484269dc5c2a2329d9087b118e4c4c759b3033afe3417', 'blah@blahcorp.tk', '', -1, '1,1,1', 15, 0, 0, 3, 50, 50),
(12, 'mark2', '841c45f11685828ec82f2911c788384db9ef786c97b2a817bda5b15388254a4b', '9bc1d9e5f82f04b5eef45dfdae7f4251ce30f139f52eb0588934210cedf1c7d8', 'blah@blah.tk', '', -1, '1,1,1', 15, 0, 0, 4, 50, 50),
(13, 'amon', '91b58e3dde654e535501bd63ea08ba40fbf51148ce58b2e8017b7b5a41f6285f', '7577f585cf25f2a5345bbb85a3faef5d4769c54027bc67d28d50f659b16ed2b5', 'amon@equalists.org', '', -1, '-1', 15, 0, 0, 1, 50, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
