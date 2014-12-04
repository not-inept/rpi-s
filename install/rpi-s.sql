-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2014 at 10:52 PM
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

DROP TABLE IF EXISTS `areas`;
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
('1,1,1', 'The RC', 'Campus was literally split apart. Literally. We can only C the devastation from here, but we know it''s rough. This segment is more of a void... an odd void that''s home of the Hacker Guild. It doesn''t look like it should exist. The floating text doesn''t even seem real. But believe me, it''s so real you''ll never forget.'),
('1,1,2', 'The Area of Ample Ampus', 'Lacking in common sense, but containing plenty of Ampus, this region sports plenty of fierce PVP in addition to being oddly related to the shattering of the campus.'),
('1,2,1', 'The Outskirts', 'Slightly less "out" than a few other places, but the only sub-quadrant known for it, the outskirts are filled with the feeling of being on the edge of campus, where things such as plumbing don''t and have never existed.'),
('1,2,2', 'J Lot', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('2,1,1', 'Hoosick', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('2,1,2', 'The Fields', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('2,2,1', 'Center of Deadly Disease Control', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('2,2,2', 'Athletic Village', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('3,1,1', 'The Divide', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('3,1,2', 'Central Campus', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('3,2,1', 'Out of My Way', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('3,2,2', 'The Labs', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('4,1,1', 'Sherry Square', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('4,1,2', 'Sunset Terrace', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('4,2,1', 'Big Bend', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.'),
('4,2,2', 'Uncharted Territory', 'Woah! Descriptions are cool, but this is an engineering college after all... we''ll get there I suppose... but today, no, not today.');

-- --------------------------------------------------------

--
-- Table structure for table `enemies`
--

DROP TABLE IF EXISTS `enemies`;
CREATE TABLE IF NOT EXISTS `enemies` (
  `enemyID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maxDamage` int(11) NOT NULL DEFAULT '25',
  `hits` int(11) NOT NULL DEFAULT '3',
  `exp` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`enemyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `enemies`
--

INSERT INTO `enemies` (`enemyID`, `name`, `description`, `maxDamage`, `hits`, `exp`) VALUES
(2, 'Weathernaut', 'A low-level protector of the weather machine, scattered across campus to stop those marauders brave enough to step up to the challenge.', 25, 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `quest` int(11) NOT NULL DEFAULT '1',
  `reward` int(11) NOT NULL DEFAULT '19',
  `areaID` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  `actionText` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Move to :L',
  `actionType` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'move',
  `actionParam` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  `actionCost` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=88 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `title`, `description`, `location`, `date`, `quest`, `reward`, `areaID`, `actionText`, `actionType`, `actionParam`, `actionCost`) VALUES
(11, 'Movement 1,1,2->1,2,2', 'probably inefficient', NULL, NULL, 1, -1, '1,1,2', 'Move to :L', 'move', '1,2,2', 3),
(26, 'Movement 1,1,2->2,1,1', '', NULL, NULL, 1, 19, '1,1,2', 'Move to :L', 'move', '2,1,1', 3),
(27, 'Movement 1,1,1->1,2,1', 'probably inefficient', NULL, NULL, 1, -1, '1,1,1', 'Move to :L', 'move', '1,2,1', 3),
(28, 'Movement 1,1,2->1,1,1', 'probably inefficient', NULL, NULL, 1, -1, '1,1,2', 'Move to :L', 'move', '1,1,1', 3),
(29, 'Movement 1,2,1->1,1,1', '', NULL, NULL, 1, 19, '1,2,1', 'Move to :L', 'move', '1,1,1', 3),
(30, 'Movement 1,2,1->1,2,2', '', NULL, NULL, 1, 19, '1,2,1', 'Move to :L', 'move', '1,2,2', 3),
(31, 'Movement 1,2,1->3,1,1', '', NULL, NULL, 1, 19, '1,2,1', 'Move to :L', 'move', '3,1,1', 3),
(32, 'Movement 1,2,2->1,1,2', '', NULL, NULL, 1, 19, '1,2,2', 'Move to :L', 'move', '1,1,2', 3),
(33, 'Movement 1,2,2->3,1,2', '', NULL, NULL, 1, 19, '1,2,2', 'Move to :L', 'move', '3,1,2', 3),
(34, 'Movement 1,2,2->1,2,1', '', NULL, NULL, 1, 19, '1,2,2', 'Move to :L', 'move', '1,2,1', 3),
(35, 'Movement 1,2,2->2,2,1', '', NULL, NULL, 1, 19, '1,2,2', 'Move to :L', 'move', '2,2,1', 3),
(36, 'Movement 2,1,1->2,1,2', '', NULL, NULL, 1, 19, '2,1,1', 'Move to :L', 'move', '2,1,2', 3),
(37, 'Movement 2,1,1->2,2,1', '', NULL, NULL, 1, 19, '2,1,1', 'Move to :L', 'move', '2,2,1', 3),
(38, 'Movement 2,1,2->2,1,1', '', NULL, NULL, 1, 19, '2,1,2', 'Move to :L', 'move', '2,1,1', 3),
(39, 'Movement 2,1,2->2,2,2', '', NULL, NULL, 1, 19, '2,1,2', 'Move to :L', 'move', '2,2,2', 3),
(40, 'Movement 2,2,1->2,1,1', '', NULL, NULL, 1, 19, '2,2,1', 'Move to :L', 'move', '2,1,1', 3),
(41, 'Movement 2,2,1->4,1,1', '', NULL, NULL, 1, 19, '2,2,1', 'Move to :L', 'move', '4,1,1', 3),
(42, 'Movement 2,2,1->1,2,2', '', NULL, NULL, 1, 19, '2,2,1', 'Move to :L', 'move', '1,2,2', 3),
(43, 'Movement 2,2,1->2,2,2', '', NULL, NULL, 1, 19, '2,2,1', 'Move to :L', 'move', '2,2,2', 3),
(44, 'Movement 2,1,1->1,1,2', '', NULL, NULL, 1, 19, '2,1,1', 'Move to :L', 'move', '1,1,2', 3),
(45, 'Movement 1,1,1->1,1,2', '', NULL, NULL, 1, 19, '1,1,1', 'Move to :L', 'move', '1,1,2', 3),
(46, 'Movement 2,2,2->2,1,2', '', NULL, NULL, 1, 19, '2,2,2', 'Move to :L', 'move', '2,1,2', 3),
(47, 'Movement 2,2,2->2,2,1', '', NULL, NULL, 1, 19, '2,2,2', 'Move to :L', 'move', '2,2,1', 3),
(48, 'Movement 2,2,2->4,1,2', '', NULL, NULL, 1, 19, '2,2,2', 'Move to :L', 'move', '4,1,2', 3),
(49, 'Movement 3,1,1->3,1,2', '', NULL, NULL, 1, 19, '3,1,1', 'Move to :L', 'move', '3,1,2', 3),
(50, 'Movement 3,1,1->3,2,1', '', NULL, NULL, 1, 19, '3,1,1', 'Move to :L', 'move', '3,2,1', 3),
(51, 'Movement 3,1,1->1,2,1', '', NULL, NULL, 1, 19, '3,1,1', 'Move to :L', 'move', '1,2,1', 3),
(52, 'Movement 3,1,2->3,1,1', '', NULL, NULL, 1, 19, '3,1,2', 'Move to :L', 'move', '3,1,1', 3),
(53, 'Movement 3,1,2->3,2,2', '', NULL, NULL, 1, 19, '3,1,2', 'Move to :L', 'move', '3,2,2', 3),
(54, 'Movement 3,1,2->1,2,2', '', NULL, NULL, 1, 19, '3,1,2', 'Move to :L', 'move', '1,2,2', 3),
(55, 'Movement 3,1,2->4,1,1', '', NULL, NULL, 1, 19, '3,1,2', 'Move to :L', 'move', '4,1,1', 3),
(56, 'Movement 3,2,1->3,1,1', '', NULL, NULL, 1, 19, '3,2,1', 'Move to :L', 'move', '3,1,1', 3),
(57, 'Movement 3,2,1->3,2,2', '', NULL, NULL, 1, 19, '3,2,1', 'Move to :L', 'move', '3,2,2', 3),
(58, 'Movement 3,2,2->3,2,1', '', NULL, NULL, 1, 19, '3,2,2', 'Move to :L', 'move', '3,2,1', 3),
(59, 'Movement 3,2,2->3,1,2', '', NULL, NULL, 1, 19, '3,2,2', 'Move to :L', 'move', '3,1,2', 3),
(60, 'Movement 3,2,2->4,2,1', '', NULL, NULL, 1, 19, '3,2,2', 'Move to :L', 'move', '4,2,1', 3),
(61, 'Movement 4,1,1->4,1,2', '', NULL, NULL, 1, 19, '4,1,1', 'Move to :L', 'move', '4,1,2', 3),
(62, 'Movement 4,1,1->4,2,1', '', NULL, NULL, 1, 19, '4,1,1', 'Move to :L', 'move', '4,2,1', 3),
(63, 'Movement 4,1,1->2,2,1', '', NULL, NULL, 1, 19, '4,1,1', 'Move to :L', 'move', '2,2,1', 3),
(64, 'Movement 4,1,1->3,1,2', '', NULL, NULL, 1, 19, '4,1,1', 'Move to :L', 'move', '3,1,2', 3),
(65, 'Movement 4,1,2->4,1,1', '', NULL, NULL, 1, 19, '4,1,2', 'Move to :L', 'move', '4,1,1', 3),
(66, 'Movement 4,1,2->4,2,2', '', NULL, NULL, 1, 19, '4,1,2', 'Move to :L', 'move', '4,2,2', 3),
(67, 'Movement 4,1,2->2,2,2', '', NULL, NULL, 1, 19, '4,1,2', 'Move to :L', 'move', '2,2,2', 3),
(68, 'Movement 4,2,1->4,1,1', '', NULL, NULL, 1, 19, '4,2,1', 'Move to :L', 'move', '4,1,1', 3),
(69, 'Movement 4,2,1->4,2,2', '', NULL, NULL, 1, 19, '4,2,1', 'Move to :L', 'move', '4,2,2', 3),
(70, 'Movement 4,2,1->3,2,2', '', NULL, NULL, 1, 19, '4,2,1', 'Move to :L', 'move', '3,2,2', 3),
(71, 'Movement 4,2,2->4,2,1', '', NULL, NULL, 1, 19, '4,2,2', 'Move to :L', 'move', '4,2,1', 3),
(72, 'Movement 4,2,2->4,1,2', '', NULL, NULL, 1, 19, '4,2,2', 'Move to :L', 'move', '4,1,2', 3),
(73, 'first fight rawr', 'testing fight system', '1,1,2', NULL, 1, 19, '1,1,2', 'Approach wandering :E', 'enemy', '2', 5),
(74, 'Circle K to Hold Candy Gram Fundraiser', 'Description: RPI Circle K International Community Services will ', 'union', 1417568400, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(75, 'Hillel to Host Shabbat Dinner', 'Description: RPI-Sage Hillel hosts a shabbat dinner for the whol', 'union', 1418950800, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(76, 'Rensselaer to Host 6th International Workshop on Quantitative Finance', 'Description: Designed to guide participants along the difficult ', 'campus', 1418864400, 0, 19, '1,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(77, 'Lally Issues Call for Entries for RPI Business Model Competition', 'Description: Don''t miss out on your chance at a piece of the $15', 'campus', 1418691600, 0, 19, '1,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(78, 'Computer Science Colloquium to be Held December 15', 'Description: speaker Dr. David Woodruff from IBM''s Almaden Resea', 'cii', 1418605200, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(79, 'Computer Science, NeST to Host Joint Colloquium', 'Description: Jointly hosted by Rensselaer''s Computer Science dep', 'cii', 1418086800, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(82, 'Laurie Anderson to Present New Film at EMPAC', 'Description: Distinguished artist-in-residence Laurie Anderson p', 'empac', 1418346000, 0, 19, '3,2,1', 'Morning Mail Event!', 'move', '1,1,1', 3),
(83, 'Hillel to Host Shabbat Dinner', 'Description:RPI-Sage Hillel will be hosting a shabbat dinner for', 'union', 1418346000, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(85, 'Dept. of MANE Colloquium Scheduled for December 3', 'Description: Dr. Tugrul Ozel of Rutgers University will present ', 'dcc', 1417568400, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(86, 'C & EE Seminar to be Held December 10', 'Description: Speaker Dr. Dominic Di Tori of NAE, will present "M', 'jec', 1418173200, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3),
(87, 'Student Writers to Mark End of Semester with Short Story Readings', 'Description: As part of their end-of-term celebration, student c', 'dcc', 1417741200, 0, 19, '3,1,2', 'Morning Mail Event!', 'move', '1,1,1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `factions`
--

DROP TABLE IF EXISTS `factions`;
CREATE TABLE IF NOT EXISTS `factions` (
  `factionID` int(11) NOT NULL,
  `factionName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startingLocation` varchar(11) NOT NULL DEFAULT '1,1,1',
  UNIQUE KEY `factionID` (`factionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factions`
--

INSERT INTO `factions` (`factionID`, `factionName`, `description`, `startingLocation`) VALUES
(-1, 'TRAITOR', 'The lowest of the low, marked forever, doomed to die alone.', '-1'),
(0, 'Republic of Blitman', 'Cast aside from the rest of campus, these residents of Blitman were already practically running a separate community. With the extra push of dimensional separation they were finally pushed into formalizing their situation. Off from campus, but fierce as ever, those Blitman-ites that choose to leave their bastion are truly to be feared.', '0'),
(1, 'Hilltop Coalition', 'Disgusted with always having their living situation referred to as "Freshmen Hill", these SNW (SNOW) residents banded together, and with Sharp Hall as their HQ, have proven they''re no longer to be trifled with. Often known as the "Terror on the Hill", their loose morals and strict governance has made them known throughout what remains of campus.', '0'),
(2, 'Freshman Alliance', 'Not even they thought this was a good idea, but due to a lack of other options, it seems most freshmen ended up being forced to band together. Held by ties of necessity, Hall Hall''s leadership house has turned this unlikely bunch into something almost recognizable as an alliance.', '0'),
(3, 'Quad Squad', 'Let''s face it, before the Weather Machine brought us into this new dimension residents of Quad merely wanted to reduce the amount of daily legwork they had to endure. Now, that''s come back to bite them. Although their proximity to resources and abundance of members helps give them an edge, they are quite as fearsome as residents of other halls. Still, their resourcefulness has given them quite the stockpile, and more often then not if you''re looking for something someone from Quad has already found it. ', '0'),
(4, 'Hacker Guild', 'Th3 l33t 0f c4mp2s. W3 4r3 ANONYMOUS. W3 4r3 LEGION. W3 d0 n0t f0rg1v3. W3 d0 n0t f0rg3t. EXPECT US. //@#foo??L>> MySQL ERROR: IN TABLE `factions` WHERE `factionName` IS `Hacker Guild` VALUE `awesomeness` IS LARGER THAN INTEGER.MAX_VALUE', '1,1,1'),
(5, 'Brigands of BARH', 'The RHAPS apartments, being isolated and alone, quickly fell apart. Many stragglers looked to BARH for help, and they found a group that was surprisingly welcoming. With all amenities covered inside their building, the BARH residents were already prepared for any disaster. Always willing to lend a hand, these brigands are truly only brigands by name, and in person seem to actually be quite the opposite.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
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

DROP TABLE IF EXISTS `inventory`;
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

DROP TABLE IF EXISTS `objects`;
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
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `playerID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `allnaturalseasalt` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `special` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active_quest` int(11) NOT NULL DEFAULT '-1',
  `current_location` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  `action_points` int(3) NOT NULL DEFAULT '15',
  `grade` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `faction` int(11) NOT NULL,
  `hp` int(11) NOT NULL DEFAULT '50',
  `maxhp` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`playerID`, `name`, `allnaturalseasalt`, `password`, `email`, `special`, `active_quest`, `current_location`, `action_points`, `grade`, `exp`, `faction`, `hp`, `maxhp`) VALUES
(2, 'bolin', 'd735493473efec0ab479003ce20429ccbd3da8493f26b788e9b66d454f7a4082', 'd0afe6a61889f08f04f696a7e0236b9f3fd6c2fab96010e6220a8ed26bab0834', 'bendbro@gmail.com', '', -1, '1,1,2', 479, 1, 800, 0, 944, 50),
(9, '1', '8c1741fce878d8a2aae5eb54efbcf3d0d9eef10197fc16802649615470de32d9', '8f1eea82dcec845d47eb16b4193d530a54455bef0b4588ab72e03bc460fcf0e8', '3@gmail.com', '', -1, '1,1,1', 15, 0, 0, 4, 50, 50),
(10, 'Dan', '072d5cf5eeb3b2031618826d08ce303a8c7d0c12db120fe9150f891ded325344', '67ee242a8042b13694fd05d93d47d09a30ad18de913eb0e3a0123ab4435ab604', 'dbc@gmail.com', '', -1, '1,1,1', 15, 0, 0, 2, 50, 50),
(11, 'mark', '1cc8037004516878112891b09356fb19b2d95249c41b34bae182b3a0ea8455b9', 'ded8f7bfcd3b2276f9f484269dc5c2a2329d9087b118e4c4c759b3033afe3417', 'blah@blahcorp.tk', '', -1, '1,1,1', 0, 0, 0, 3, 50, 50),
(12, 'mark2', '841c45f11685828ec82f2911c788384db9ef786c97b2a817bda5b15388254a4b', '9bc1d9e5f82f04b5eef45dfdae7f4251ce30f139f52eb0588934210cedf1c7d8', 'blah@blah.tk', '', -1, '1,1,1', 15, 0, 0, 4, 50, 50),
(13, 'amon', '91b58e3dde654e535501bd63ea08ba40fbf51148ce58b2e8017b7b5a41f6285f', '7577f585cf25f2a5345bbb85a3faef5d4769c54027bc67d28d50f659b16ed2b5', 'amon@equalists.org', '', -1, '1,1,1', 15, 0, 0, 1, 50, 50),
(14, 'Tina', 'c333c6c333d1398c2219830abb3e57828d254750f356ca1440515e25126a2b16', '851904a4f499e45ce80470fd445e0df55af278f25b2140f4130a3063156f5849', 'guoy8@rpi.edu', '', -1, '1,1,2', 798778, 0, 100, 1, 34, 50),
(15, 'korra', 'e78113205f04d7bd83bec01b1c61ac5336fa6fcb8b3926c299f9bd9365c2fdb4', '76094d95ad2cd970d2b7069bc13a7ba584bed4053d58514721bf90c2bd1b3b82', 'waterearthfireair@gmail.com', '', 1, '2,1,1', 9, 0, 0, 4, 50, 50),
(16, 'testste', '3a865e74636c21b011fcceba3985fa363f6389c1fc99229b63ebf3c636009857', 'af2098b25301c436abb13c47cb90a703649645458c9fb522fead5ad2387b7344', 'tests@gmail.com', '', -1, '1,1,1', 15, 0, 0, 5, 50, 50),
(17, 'matt', '653dd64fcb8299a5f230e5085b3daea6c6ab7f829fc4acf87bcb510c83bf6cad', '9e466f155895a25b0717d21eee136552bd03f88ea92ac9b8d9f73e782a05d16b', 'test@rpi.edu', '', -1, '1,1,2', 1, 0, 100, 4, 27, 50),
(18, 'tebben', 'b11a9affe40a2972cae01d129b7a17070a5dfcd3833089e1444f6714f58d4b7f', '5bbd3015f9347052724bfca3cfddccefc1ba28d890306f5b4366fe5e8126ae1f', 'tebben@rpi.edu', '', -1, '1,1,2', 1, 0, 100, 3, 25, 50),
(19, 'itws', '5b6ce84b17f4f434d12b29bc52fbeaffe0a7a1b1dd142832438d811a976aa662', '8d4547bf4a9cca462e84ec34c6df190114463b29fdbc372bb72a3e84550ba632', 'coaasdf@gmail.com', '', -1, '1,1,2', 7, 0, 100, 4, 25, 50),
(20, 'powatm', '15d60a9dc58cf808991420935520194e3794240fb0cb08edd866357ff7b8463d', 'c6d2fdb903b34a0ef0ab6e47be4720e688bfe5014f203b04b8cc491c13e8fc0c', 'powatm@rpi.edu', '', -1, '1,1,1', 15, 0, 0, 5, 50, 50),
(21, 'derp', '6ed1e6328d27beb16173db9e446f082574f6b35a8acbcdf8fae8f0a6208aa546', '0f61a522a0c3a93ebf03c997165dba768b0509b544de3a147c3613bdb8dc5fde', 'derp@g.com', '', -1, '1,2,1', 1, 0, 100, 2, 27, 50),
(22, 'ry', 'a14f77fc99974ff0aa46c65a1e8e5a7fed15a3d0bdd4c72a71d5d81aa64647de', '888cb01985cd2bda2a1c0f3bdd465d6f67aea4d470896707af3a2b05241d6b7a', 'gavinr@rpi.edu', '', -1, '1,1,2', 1, 0, 100, 3, 35, 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
