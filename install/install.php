<?php

require '../resources/includes/config.php';

$dbconn = new PDO('mysql:host='.$config['DB_HOST'], $config['DB_USERNAME'], $config['DB_PASSWORD']);

$stmt = $dbconn->prepare("CREATE DATABASE IF NOT EXISTS `rpi-s` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
('1,1,1', 'The RC', 'Campus was literally split apart. Literally. We can only C the devastation from here, but we know it''s rough. This segment is more of a void... an odd void that''s home of the Hacker Guild. It doesn''t look like it should exist. The floating text doesn''t even seem real. But believe me, it''s so real you''ll never forget.'),
('1,1,2', 'The Area of Ample Ampus', 'Lacking in common sense, but containing plenty of Ampus, this region sports plenty of fierce PVP in addition to being oddly related to the shattering of the campus.'),
('1,2,1', 'The Outskirts', 'Slightly less out than a few other places, but the only sub-quadrant known for it, the outskirts are filled with the feeling of being on the edge of campus, where things such as plumbing don''t and have never existed.'),
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
(73, 'first fight rawr', 'testing fight system', '1,1,2', NULL, 1, 19, '1,1,2', 'Approach wandering :E', 'enemy', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `factions`
--

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
(1, 'Hilltop Coalition', 'Disgusted with always having their living situation referred to as Freshmen Hill, these SNW (SNOW) residents banded together, and with Sharp Hall as their HQ, have proven they''re no longer to be trifled with. Often known as the Terror on the Hill, their loose morals and strict governance has made them known throughout what remains of campus.', '0'),
(2, 'Freshman Alliance', 'Not even they thought this was a good idea, but due to a lack of other options, it seems most freshmen ended up being forced to band together. Held by ties of necessity, Hall Hall''s leadership house has turned this unlikely bunch into something almost recognizable as an alliance.', '0'),
(3, 'Quad Squad', 'Let''s face it, before the Weather Machine brought us into this new dimension residents of Quad merely wanted to reduce the amount of daily legwork they had to endure. Now, that''s come back to bite them. Although their proximity to resources and abundance of members helps give them an edge, they are quite as fearsome as residents of other halls. Still, their resourcefulness has given them quite the stockpile, and more often then not if you''re looking for something someone from Quad has already found it. ', '0'),
(4, 'Hacker Guild', 'Th3 l33t 0f c4mp2s. W3 4r3 ANONYMOUS. W3 4r3 LEGION. W3 d0 n0t f0rg1v3. W3 d0 n0t f0rg3t. EXPECT US. //@#foo??L>> MySQL ERROR: IN TABLE `factions` WHERE `factionName` IS `Hacker Guild` VALUE `awesomeness` IS LARGER THAN INTEGER.MAX_VALUE', '1,1,1'),
(5, 'Brigands of BARH', 'The RHAPS apartments, being isolated and alone, quickly fell apart. Many stragglers looked to BARH for help, and they found a group that was surprisingly welcoming. With all amenities covered inside their building, the BARH residents were already prepared for any disaster. Always willing to lend a hand, these brigands are truly only brigands by name, and in person seem to actually be quite the opposite.', '0');

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
  `current_location` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1,1,1',
  `action_points` int(3) NOT NULL DEFAULT '15',
  `grade` int(11) NOT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `faction` int(11) NOT NULL,
  `hp` int(11) NOT NULL DEFAULT '50',
  `maxhp` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`playerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

INSERT INTO `players` (`playerID`, `name`, `allnaturalseasalt`, `password`, `email`, `special`, `active_quest`, `current_location`, `action_points`, `grade`, `exp`, `faction`, `hp`, `maxhp`) VALUES
(2, 'bolin', 'd735493473efec0ab479003ce20429ccbd3da8493f26b788e9b66d454f7a4082', 'd0afe6a61889f08f04f696a7e0236b9f3fd6c2fab96010e6220a8ed26bab0834', 'bendbro@gmail.com', '', -1, '1,1,2', 479, 1, 800, 0, 944, 50);

INSERT INTO `inventory` (`playerID`, `objID`, `equipped`, `id`) VALUES
(2, 4, 1, 3),
(2, 7, 1, 4),
(2, 10, 1, 5),
(2, 3, 1, 6);
");
	$stmt->execute();
?>
