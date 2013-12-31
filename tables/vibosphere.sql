-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2013 at 02:16 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

CREATE TABLE IF NOT EXISTS `global` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Attribute` varchar(255) NOT NULL,
  `Average` float NOT NULL DEFAULT '0',
  `Deviation` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`ID`, `Attribute`, `Average`, `Deviation`) VALUES
(1, 'Affability', 6.05, 3.5),
(2, 'Ambition', 4.83, 4.84),
(3, 'Attractiveness', 5.75, 3.38),
(4, 'Confidence', 2.21, 3.52),
(5, 'Fun', 1.29, 2.19),
(6, 'Happiness', 2.04, 3.58),
(7, 'Honesty', 3.96, 2.96),
(8, 'Humility', 3.08, 3.66),
(9, 'Humor', 4.56, 3.22),
(10, 'Intelligence', 5.76, 3.62),
(11, 'Kindness', 6, 3.46),
(12, 'Promiscuity', 5.84, 2.77),
(13, 'Reliability', 1.5, 3.35),
(14, 'Style', 3.29, 3.1);

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
(1, 'Attractiveness', 'Is name attractive?', 'Does name have a nice smile?(Great Smile)', 'Does name have a cool hairstyle?(Cool Hairstyle)', 'Does name have attractive eyes?(Striking Eyes)', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?'),
(2, 'Affability', 'Would you bring name to hang out with new friends?', '*Does name annoy you?(Annoying)', '*Does name act creepy? (Creepy)', '*Is name awkward in conversations?(Awkward)', 'Is name laid back? (Chill)', '*Does name frequently have personal drama? (Drama Queen&&Chill)', '^Is name frequently excited? (Intense)', '*Does name prefer to be alone?(Lone Wolf) ', 'Does name have a lot of friends? (Socialite&&Lone Wolf)', 'Is name an easy person to approach?'),
(3, 'Intelligence', 'Does name seem smart?', '^Is name creative? (Creative)', 'Would name get tricked by a con artist? (Naive&&Street Smart)', 'Does name know current slang? (Street Smarts&&Naive)', '^Would name survive a week on a desert island? (Survival Skills)', 'Did/does name get good grades in school? (Academic)', '^Would name notice if you were upset? (Emotionally Intelligent)', '^Does name think outside the box? (Unorthodox&&Conventional)', 'Does name plan out their moves? (Tactical)', 'Would name do well in a game of Trivia Pursuit?'),
(4, 'Style', 'Is name stylish?', 'Is name elegant? (Chic)', '^Does name look nerdy? (Nerdy)', '^Does name look hipster? (Hipster)', '^Does name dress for success? (Professional)', '^Does name rock a sweater vest or a cardigan? (Preppy)', '^Does name have a style that resembles rappers? (Street)', '^Is name a hipster? (Hipster)', '^Does name dress for comfort? (Casual)', '^Does name dress for success? (Professional) '),
(5, 'Promiscuity', 'Does name have a big romantic life?', 'Would name sext? (Sexter)', 'Would name have sex on a first date? (Down)', 'Would you want name as your wingman? (Wingman)', 'Would name score at a party? (Pickup Artist)', '^Would name flirt with a police officer to get out of a ticket? (Flirty)', '*Does name have high romantic standards?(High Standards)', '*Would name wait until marriage to have sex? (Traditional&&Down)', '*Is name unsuccessful in getting and maintaining relationships? (Forever Alone)', '^IS name a romantic?(Romantic)'),
(6, 'Humor', 'Can name make you laugh?', '^Does name make racist or sexist  jokes? (Politically Incorrect)', '^Does name make fun of others?(Mean)', '^Does name use word play? (Witty)', '^Would name make a fart joke? (Crass)', '^Is name goofy? (Goofy)', '^Does name do good impersonations? (Impersonator)', 'Can name make you laugh?', 'Can name make you laugh?', 'Can name make you laugh?'),
(7, 'Confidence', 'Is name confident?', 'Does name take charge in a group? (Leader)', '*Is name concerned with self image? (Insecure&&Self Assured)', 'Is name full of himself? (Arrogant)', 'Is name confident? ', 'Is name confident?', 'Is name confident?', 'Is name confident?', 'Is name confident?', 'Is name confident?'),
(8, 'Fun', 'Do you enjoy hanging out with name?', '^Is name excited to try new things? (Adventurous)', 'Would you hang out with name on a Friday night? ', '^Does name love to party? (Party Animal)', '*Is name serious all the time? (Buzzkill)', '^Does name like to play pranks?(Prankster)', 'Would you roadtrip with name?', '*Does name complain a lot?(Buzzkill)', '^Does name prefer to stay in on a Friday night?(Homebody)', 'Is name frequently excited? (Hyped)'),
(9, 'Kindness', 'Would name help an old lady cross the road? ', '*Would name make fun of friends behind their backs? (Rude)', 'Would name volunteer at a relief shelter? (Generous)', 'Would name tutor you if you needed help? (Helpful)', '*Would name bully someone?(Bully)', 'Does name relate well to others? (Compassionate)', 'Does name treat everyone with respect?(Respectful)', 'Is name kind?', 'Is name kind?', 'Is name kind?'),
(10, 'Honesty', 'Is name honest?', 'Would name tell you if your outfit was ugly? (Blunt)', 'Would you trust name with a secret? (Trustworthy)', '*Would name cheat on a significant other? (Infidelity) ', '*Would name rob a bank if there was no chance of being caught? ', '*Would name pretend to be sick to get out of work? (Liar)', '*Would name lie on a resume? (Cheater)', '*Would name take credit for someone else''s work? (Cheater)', 'Is name secretive about personal things? (Secretive)', '*Does name manipulate people? (Manipulative) '),
(11, 'Reliability', 'Is name dependable?', 'Would name have your back in a fight? (Loyal)', 'Does name take responsibility for mistakes? (Responsible)', 'Would name support you when you needed it? (Supportive)', 'Would you hire name to work for you?', 'Would name care for you if you were sick? (Supportive)', 'Would name care for you if you were sick? (Supportive)', 'Is name dependable?', 'Is name dependable?', 'Is name dependable?'),
(12, 'Happiness', 'Does name seem  happy?', 'Is name with the right romantic partner? (Romantically satisfied&&Romantically Unsatisfied)', 'Is name with the right romantic partner? (Romantically satisfied&&Romantically Unsatisfied)', 'Is name in the right school or career?(Good Career&&Misguided)', 'Is name in the right school or career?(Good Career&&Bad Career)', 'Is name in the right school or career?(Good Career&&Bad Career)', 'Is name in the right school or career?(Good Career)', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)'),
(13, 'Ambition', 'Does name have big aspirations?', 'Is name motivated?(Motivated&&Unmotivated)', 'Could name be president of the US one day?', '*Is name lazy?(Lazy)', 'Does name compete new years resolutions?', 'Does name work hard to complete goals? (Industrious&&Complacent)', '*Is name lazy?(Lazy)', 'Could name be president of the US one day?', 'Could name be president of the US one day?', 'Could name be president of the US one day?'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UID`, `Active`, `Points`, `Communities`, `Gender`, `Age`, `Race`, `Attractiveness`, `Attractiveness_Total`, `Attractiveness_Keywords`, `Affability`, `Affability_Total`, `Affability_Keywords`, `Intelligence`, `Intelligence_Total`, `Intelligence_Keywords`, `Intelligence_Comments`, `Style`, `Style_Total`, `Style_Keywords`, `Promiscuity`, `Promiscuity_Total`, `Promiscuity_Keywords`, `Humor`, `Humor_Total`, `Humor_Keywords`, `Confidence`, `Confidence_Total`, `Confidence_Keywords`, `Fun`, `Fun_Total`, `Fun_Keywords`, `Kindness`, `Kindness_Total`, `Kindness_Keywords`, `Honesty`, `Honesty_Total`, `Honesty_Keywords`, `Reliability`, `Reliability_Total`, `Reliability_Keywords`, `Happiness`, `Happiness_Total`, `Happiness_Keywords`, `Ambition`, `Ambition_Total`, `Ambition_Keywords`, `Humility`, `Humility_Total`, `Humility_Keywords`, `Comments`) VALUES
(1, '712337857', 1, 313, 'Barack Obama Academy&&Columbia University&&Fluent Medical&&New York, New York', 'male', NULL, NULL, 5, 8, '2(Great Smile)', 7, 7, '1(Intense)', 9.2, 8, '1(Academic)', '', 5, 4, '3(Nerdy)', 2, 5, '1(Forever Alone)', 7, 3, '2(Witty)', 7, 6, '4(Self Assured)', 6, 3, NULL, 8, 4, NULL, 6.76, 6, '3(Secretive)&&4(Trustwrothy)', 9, 2, '1(Supportive)', 7, 5, '2(Enviable)', 9, 2, NULL, 5, 3, NULL, ''),
(89, '100003582610055', 0, 0, NULL, NULL, NULL, NULL, 5.8, 10, NULL, 8, 6, '3(Hyped)', 8.5, 5, '3(Emotionally Intelligent)', '', 3, 4, '3(Nerdy)', 5.75, 10, '3(Down)', 6.67, 4, '1(Goofy)', 8.5, 4, NULL, 3, 2, '1(Crass)', 8, 2, '1(Helpful)', 7, 2, '1(Trustworthy)', 0, 0, NULL, 9.33, 3, '2(Good Career)', 10, 2, '1(Industrious)', 3.5, 4, '2(Narcissistic)', 'Happiness##2013-12-30 20:06:06##Is Noah Stebbins in the right school or career?: "Maybe he should switch to art history"&&Style##2013-12-30 20:05:47##Is Noah Stebbins stylish?: "Too many tech t shirts doe"&&Promiscuity##2013-12-30 20:05:19##Does Noah Stebbins have high romantic standards?: "Depends on how much he has had to drink"&&Promiscuity##2013-12-30 20:04:34##Would Noah Stebbins wait until marriage to have sex? : "LOL"&&Attractiveness##2013-12-30 20:02:41##Is Noah Stebbins attractive?: "Bro do you even lift?"&&Promiscuity##2013-12-30 19:50:50##Would Noah Stebbins wait until marriage to have sex? : "Noah is all about insertion"');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
