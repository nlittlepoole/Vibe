-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2013 at 12:26 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vibosphere`
--
CREATE DATABASE IF NOT EXISTS `vibosphere` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vibosphere`;

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE IF NOT EXISTS `communities` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=411 ;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`ID`, `UID`, `Name`, `Picture`) VALUES
(396, '109622255723171', 'New Rochelle High School', 'http://graph.facebook.com/109622255723171/picture?width=600&height=600'),
(397, '105961579434863', 'Altoona Area High School', 'http://graph.facebook.com/105961579434863/picture?width=600&height=600'),
(398, '107764609245728', 'Robert Morris University', 'http://graph.facebook.com/107764609245728/picture?width=600&height=600'),
(399, '360891224397', 'SHEETZ', 'http://graph.facebook.com/360891224397/picture?width=600&height=600'),
(400, '108071589221840', 'Altoona, Pennsylvania', 'http://graph.facebook.com/108071589221840/picture?width=600&height=600'),
(401, '14856729724', 'Gap', 'http://graph.facebook.com/14856729724/picture?width=600&height=600'),
(402, '212497118909794', 'Blair County Historical Society- Baker Mansion', 'http://graph.facebook.com/212497118909794/picture?width=600&height=600'),
(403, '108210922533457', 'Santa Cruz High School', 'http://graph.facebook.com/108210922533457/picture?width=600&height=600'),
(404, '103127603061486', 'Columbia University', 'http://graph.facebook.com/103127603061486/picture?width=600&height=600'),
(405, '24711256328', 'Columbia Bartending Agency and School of Mixology', 'http://graph.facebook.com/24711256328/picture?width=600&height=600'),
(406, '108307045857557', 'High Technology High School', 'http://graph.facebook.com/108307045857557/picture?width=600&height=600'),
(407, '116082321582', 'CTU', 'http://graph.facebook.com/116082321582/picture?width=600&height=600'),
(408, '110970792260960', 'Los Angeles, California', 'http://graph.facebook.com/110970792260960/picture?width=600&height=600'),
(409, '115473663740', 'Hollister Co.', 'http://graph.facebook.com/115473663740/picture?width=600&height=600'),
(410, '111959418819744', 'Grapevine, Texas', 'http://graph.facebook.com/111959418819744/picture?width=600&height=600');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Attribute` varchar(255) DEFAULT NULL,
  `Question1` varchar(255) DEFAULT NULL,
  `Question2` varchar(255) NOT NULL,
  `Question3` varchar(255) NOT NULL,
  `Question4` varchar(255) NOT NULL,
  `Question5` varchar(255) NOT NULL,
  `Question6` varchar(255) NOT NULL,
  `Question7` varchar(255) NOT NULL,
  `Question8` varchar(255) NOT NULL,
  `Question9` varchar(255) NOT NULL,
  `Question10` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Attribute` (`Attribute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `Attribute`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`, `Question6`, `Question7`, `Question8`, `Question9`, `Question10`) VALUES
(1, 'Attractiveness', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?'),
(2, 'Affability', 'Would it be weird if name gave you a hug?', 'Would it be weird if name gave you a hug?', 'Would it be weird if name gave you a hug?', '*Would you bring name to hang out with new friends?', '*Would you bring name to hang out with new friends?', '*Would you bring name to hang out with new friends?', 'Is name awkward in conversations?', 'Is name awkward in conversations?', 'Is name awkward in conversations?', 'Is name awkward?'),
(3, 'Intelligence', 'Does name seem smart?', 'Does name seem smart?', 'If name was dropped in foreign country with no resources and a different language, could they get home? (Street Smarts)', 'If name was dropped in foreign country with no resources and a different language, could they get home? (Street Smarts)', 'Would name survive on a desert island? (Survival Skills)', 'Did/does name get good grades in school? (Academic)', 'Would name notice if you were upset? (Emotional Intelligence)', 'Would name notice if you were upset? (Emotional Intelligence)', 'Did/does name get good grades in school? (Academic)', 'Does name seem smart?'),
(4, 'Style', 'Is name fashionable?', 'Is name fashionable?', '*Does name look nerdy? (Nerdy)', 'Does name look hipster? (Hipster)', 'Does name dress for success? (Professional)', 'Does name rock the sweater vest? (Preppy)', 'Does name dress like he could be in a rap video? (Street Style)', 'Does name look hipster? (Hipster)', 'Is name fashionable? ', 'Does name dress for success? (Professional) '),
(5, 'Promiscuity', 'Is name smart?', 'Would name sext? (Slutty)', 'Would name have sex on a first date? (Slutty)', 'Would you want name as your wingman? (Flirty)', 'Would name score at a party? (Flirty)', 'Would name flirt with a police officer to get out of a ticket? (Slutty)', 'Would name go to a strip club? (Open)', '*Would name wait until marriage to have sex? (Traditional)', 'Would name go to a strip club? (Open)', '*Would name wait until marriage to have sex? (Traditional)'),
(6, 'Humor', 'Can name make you laugh?', 'Can name make you laugh?', 'Does name make racist or sexist remarks or jokes?', 'Does name use word play? (Witty)', 'Would name make a fart joke? (Crass)', 'Is name goofy? (Goofy)', 'Is name goofy? (Goofy)', 'Would name make a fart joke? (Crass)', 'Is name sarcastic? (Sarcastic)', 'Is name sarcastic? (Sarcastic)'),
(7, 'Confidence', 'Is name confident?', 'Does name take charge in a group? (Leader)', 'Does name take charge in a group? (Leader)', 'Can name successfully use a pickup line?', 'Is name confident? ', 'Is name full of himself? (Arrogant)', '*Is name concerned with self image? (Insecure)', '*Is name concerned with self image? (Insecure)', 'Is name full of himself? (Arrogant)', 'Is name confident?'),
(8, 'Fun', 'Does name make racist or sexist remarks or jokes?', 'Would you hang out with name on a Friday night? (Festive)', 'Would you hang out with name on a Friday night? (Festive)', 'Would you roadtrip with name?', 'Is name laid back? (Chill)', 'Is name laid back? (Chill)', 'Is name the life of the party? (Festive)', 'Would you roadtrip with name?', 'Can name make the most out of any situation?', 'Can name make the most out of any situation?'),
(9, 'Kindness', 'Would name help an old lady cross the road? ', 'Would name make fun of friends behind their backs? (Rude)', 'Would name make fun of friends behind their backs? (Rude)', 'Would name help an old lady cross the road? ', 'Would name volunteer at a relief shelter? (Generous)', 'Would name volunteer at a relief shelter? (Generous)', 'Would name tutor you if you needed help? (Helpful)', '*Would name bully someone?', '*Would name bully someone?', 'Would name tutor you if you needed help? (Helpful)'),
(10, 'Honesty', 'Would you trust name with a secret? (Trustworthy)', 'Would you trust name with a secret? (Trustworthy)', 'Would name tell you if your outfit was ugly? (Blunt)', 'Would name tell you if your outfit was ugly? (Blunt)', '*Would name cheat on a significant other? (Infidelity) ', '*Would name cheat on a significant other? (Infidelity) ', '*Would name rob a bank if there was no chance of being caught? ', '*Would name pretend to be sick to get out of work? (Liar)', '*Would name lie on a resume? (Cheater)', '*Would name take credit for someone else''s work? (Cheater)'),
(11, 'Reliability', 'Would name have your back in a fight? (Loyal)', 'Would name have your back in a fight? (Loyal)', 'Would name have your back in a fight? (Loyal)', 'Would you hire name to work for you?', 'Would you hire name to work for you?', 'Would name care for you if you were sick? (Supportive)', 'Would name care for you if you were sick? (Supportive)', 'Is name dependable?', 'Is name dependable?', 'Is name dependable?'),
(12, 'Happiness', 'Does name seem  happy?', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Does name seem happy?', 'Does name seem happy?', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)'),
(13, 'Ambition', '*Is name lazy?', '*Is name lazy?', '*Is name lazy?', '*Is name lazy?', 'Does name compete new years resolutions?', 'Does name compete new years resolutions?', 'Does name compete new years resolutions?', 'Could name be president of the US one day?', 'Could name be president of the US one day?', 'Could name be president of the US one day?'),
(14, 'Humility', 'Is name humble?', '*Would name date someone just for their looks? (Vain)', '*Does name exaggerate about things? (Showoff)', '*Does name exaggerate about things? (Showoff)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name like to be the center of attention? (Narcissistic)', '*Would name date someone just for their looks? (Vain)', 'Is name humble?', 'Is name humble?');

-- --------------------------------------------------------

--
-- Table structure for table `test_community`
--

CREATE TABLE IF NOT EXISTS `test_community` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Attribute` varchar(255) NOT NULL,
  `Keywords` varchar(255) NOT NULL,
  `Average` float NOT NULL DEFAULT '0',
  `Sum` int(10) NOT NULL DEFAULT '0',
  `Squares` int(10) NOT NULL DEFAULT '0',
  `Deviation` int(10) NOT NULL DEFAULT '0',
  `Rank1` varchar(255) NOT NULL,
  `Rank2` varchar(255) NOT NULL,
  `Rank3` varchar(255) NOT NULL,
  `Rank4` varchar(255) NOT NULL,
  `Rank5` varchar(255) NOT NULL,
  `Rank6` varchar(255) NOT NULL,
  `Rank7` varchar(255) NOT NULL,
  `Rank8` varchar(255) NOT NULL,
  `Rank9` varchar(255) NOT NULL,
  `Rank10` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `test_community`
--

INSERT INTO `test_community` (`ID`, `Attribute`, `Keywords`, `Average`, `Sum`, `Squares`, `Deviation`, `Rank1`, `Rank2`, `Rank3`, `Rank4`, `Rank5`, `Rank6`, `Rank7`, `Rank8`, `Rank9`, `Rank10`) VALUES
(1, 'Attractiveness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(2, 'Awkwardness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(3, 'Intelligence', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(4, 'Fashionability', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(5, 'Promiscuity', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(6, 'Humor', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(7, 'Confidence', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(8, 'Fun', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(9, 'Kindness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(10, 'Honesty', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(11, 'Dependability', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(12, 'Satisfaction', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(13, 'Ambition', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),
(14, 'Humility', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asked` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `answer` int(10) unsigned DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) NOT NULL,
  `Affiliations` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  `Points` int(10) NOT NULL DEFAULT '0',
  `Communities` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Age` varchar(255) DEFAULT NULL,
  `Race` varchar(255) DEFAULT NULL,
  `Attractiveness` float NOT NULL DEFAULT '0',
  `Attractiveness_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Attractiveness_Keywords` varchar(255) DEFAULT NULL,
  `Affability` float NOT NULL DEFAULT '0',
  `Affability_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Affability_Keywords` varchar(255) DEFAULT NULL,
  `Intelligence` float NOT NULL DEFAULT '0',
  `Intelligence_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Intelligence_Keywords` varchar(255) DEFAULT NULL,
  `Intelligence_Comments` varchar(255) NOT NULL,
  `Style` float NOT NULL DEFAULT '0',
  `Style_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Style_Keywords` varchar(255) DEFAULT NULL,
  `Promiscuity` float NOT NULL DEFAULT '0',
  `Promiscuity_Total` int(11) NOT NULL DEFAULT '0',
  `Promiscuity_Keywords` varchar(255) DEFAULT NULL,
  `Humor` float NOT NULL DEFAULT '0',
  `Humor_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Humor_Keywords` varchar(255) DEFAULT NULL,
  `Confidence` float NOT NULL DEFAULT '0',
  `Confidence_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Confidence_Keywords` varchar(255) DEFAULT NULL,
  `Fun` float NOT NULL DEFAULT '0',
  `Fun_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Fun_Keywords` varchar(255) DEFAULT NULL,
  `Kindness` float NOT NULL DEFAULT '0',
  `Kindness_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Kindness_Keywords` varchar(255) DEFAULT NULL,
  `Honesty` float NOT NULL DEFAULT '0',
  `Honesty_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Honesty_Keywords` varchar(255) DEFAULT NULL,
  `Reliability` float NOT NULL DEFAULT '0',
  `Reliability_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Reliability_Keywords` varchar(255) DEFAULT NULL,
  `Happiness` float NOT NULL DEFAULT '0',
  `Happiness_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Happiness_Keywords` varchar(255) DEFAULT NULL,
  `Ambition` float NOT NULL DEFAULT '0',
  `Ambition_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Ambition_Keywords` varchar(255) DEFAULT NULL,
  `Humility` float NOT NULL DEFAULT '0',
  `Humility_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Humility_Keywords` varchar(255) DEFAULT NULL,
  `Comments` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UID`, `Active`, `Points`, `Communities`, `Gender`, `Age`, `Race`, `Attractiveness`, `Attractiveness_Total`, `Attractiveness_Keywords`, `Affability`, `Affability_Total`, `Affability_Keywords`, `Intelligence`, `Intelligence_Total`, `Intelligence_Keywords`, `Intelligence_Comments`, `Style`, `Style_Total`, `Style_Keywords`, `Promiscuity`, `Promiscuity_Total`, `Promiscuity_Keywords`, `Humor`, `Humor_Total`, `Humor_Keywords`, `Confidence`, `Confidence_Total`, `Confidence_Keywords`, `Fun`, `Fun_Total`, `Fun_Keywords`, `Kindness`, `Kindness_Total`, `Kindness_Keywords`, `Honesty`, `Honesty_Total`, `Honesty_Keywords`, `Reliability`, `Reliability_Total`, `Reliability_Keywords`, `Happiness`, `Happiness_Total`, `Happiness_Keywords`, `Ambition`, `Ambition_Total`, `Ambition_Keywords`, `Humility`, `Humility_Total`, `Humility_Keywords`, `Comments`) VALUES
(148, '2147483647', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0.67, 3, NULL, 3.33, 3, '2(Quitter)', 'Droppd AP&&Droppd AP&&not at columbia&&Droppd AP&&not at columbia', 0, 0, NULL, 5, 2, 'null', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, ''),
(149, '597369485', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 8, 1, '1(Flirty)', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 2, 2, NULL, 8, 1, 'null', 4, 1, NULL, ''),
(150, '712337857', 1, 54, 'Barack Obama Academy&&Columbia University&&Fluent Medical&&New York, New York', 'male', NULL, NULL, 5, 2, NULL, 4.86, 7, NULL, 9.14, 7, '1(Academic)', 'So smart', 4, 6, '2(Nerdy)', 4.5, 4, NULL, 8, 2, '1(Sarcastic)&&3(Goofy)&&4(Mean)', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 4, 1, NULL, 8, 1, NULL, 0, 0, NULL, 9, 2, NULL, 0, 0, NULL, ''),
(151, '1321015971', 0, 0, NULL, NULL, NULL, NULL, 4, 1, NULL, 4, 1, 'null', 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 6, 1, NULL, 0, 0, NULL, 0, 0, NULL, ''),
(152, '698172322', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 1, '1(Narcissistic)', ''),
(153, '1534555849', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 6, 1, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 4, 1, 'null', 0, 0, NULL, ''),
(154, '1013850160', 0, 0, NULL, NULL, NULL, NULL, 6, 1, 'null', 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, ''),
(155, '730405540', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, 6, 1, 'null', 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
