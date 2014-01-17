-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2014 at 11:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  `Disable` varchar(255) NOT NULL,
  `Points` int(10) NOT NULL DEFAULT '0',
  `LastLogin` varchar(255) NOT NULL,
  `Communities` varchar(255) DEFAULT NULL,
  `Friends` int(10) NOT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Age` varchar(255) DEFAULT NULL,
  `Race` varchar(255) DEFAULT NULL,
  `Public` tinyint(1) NOT NULL DEFAULT '0',
  `Location` varchar(255) NOT NULL,
  `Spam` varchar(255) NOT NULL,
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
  `HelpingHand_progress` tinyint(4) NOT NULL,
  `Pal_progress` tinyint(4) NOT NULL,
  `Advocate_progress` tinyint(4) NOT NULL,
  `Comrade_progress` tinyint(4) NOT NULL,
  `MotherTeresa_progress` tinyint(4) NOT NULL,
  `Diva_progress` tinyint(4) NOT NULL,
  `KingOfTheHill_progress` tinyint(4) NOT NULL,
  `Ideator_progress` tinyint(4) NOT NULL,
  `Visionairy_progress` tinyint(4) NOT NULL,
  `Blogger_progress` tinyint(4) NOT NULL,
  `CommanderOfWords_progress` tinyint(4) NOT NULL,
  `Viber_progress` tinyint(4) NOT NULL,
  `attractivenessDisableDate` varchar(30) NOT NULL,
  `affabilityDisableDate` varchar(30) NOT NULL,
  `intelligenceDisableDate` varchar(30) NOT NULL,
  `styleDisableDate` varchar(30) NOT NULL,
  `promiscuityDisableDate` varchar(30) NOT NULL,
  `humorDisableDate` varchar(30) NOT NULL,
  `confidenceDisableDate` varchar(30) NOT NULL,
  `funDisableDate` varchar(30) NOT NULL,
  `kindnessDisableDate` varchar(30) NOT NULL,
  `honestyDisableDate` varchar(30) NOT NULL,
  `reliabilityDisableDate` varchar(30) NOT NULL,
  `happinessDisableDate` varchar(30) NOT NULL,
  `ambitionDisableDate` varchar(30) NOT NULL,
  `humilityDisableDate` varchar(30) NOT NULL,
  `totalAnswers` int(11) NOT NULL DEFAULT '0',
  `newAnswers` int(11) NOT NULL DEFAULT '0',
  `showNumFriends` tinyint(4) NOT NULL,
  `websiteURL` varchar(50) NOT NULL,
  `displayLocation` tinyint(4) NOT NULL,
  `displayBirthdate` tinyint(4) NOT NULL,
  `blurb` varchar(100) NOT NULL,
  `fiveblockHelpingHand` tinyint(4) NOT NULL,
  `counterHelpingHand` tinyint(4) NOT NULL,
  `lastdateHelpingHand` varchar(30) NOT NULL,
  `fiveblockPal` tinyint(4) NOT NULL,
  `counterPal` tinyint(4) NOT NULL,
  `lastdatePal` varchar(30) NOT NULL,
  `fiveblockAdvocate` tinyint(4) NOT NULL,
  `counterAdvocate` tinyint(4) NOT NULL,
  `lastdateAdvocate` varchar(30) NOT NULL,
  `fiveblockComrade` tinyint(4) NOT NULL,
  `counterComrade` tinyint(4) NOT NULL,
  `lastdateComrade` varchar(30) NOT NULL,
  `fiveblockMotherTeresa` tinyint(4) NOT NULL,
  `counterMotherTeresa` tinyint(4) NOT NULL,
  `lastdateMotherTeresa` varchar(30) NOT NULL,
  `lastdateDiva` varchar(30) NOT NULL,
  `lastdateKingOfTheHill` varchar(30) NOT NULL,
  `lastdateIdeator` varchar(30) NOT NULL,
  `lastdateVisionairy` varchar(30) NOT NULL,
  `lastdateBlogger` varchar(30) NOT NULL,
  `lastdateCommanderOfWords` varchar(30) NOT NULL,
  `lastdateViber` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UID`, `Name`, `Active`, `Disable`, `Points`, `LastLogin`, `Communities`, `Friends`, `Gender`, `Age`, `Race`, `Public`, `Location`, `Spam`, `Attractiveness`, `Attractiveness_Total`, `Attractiveness_Keywords`, `Affability`, `Affability_Total`, `Affability_Keywords`, `Intelligence`, `Intelligence_Total`, `Intelligence_Keywords`, `Intelligence_Comments`, `Style`, `Style_Total`, `Style_Keywords`, `Promiscuity`, `Promiscuity_Total`, `Promiscuity_Keywords`, `Humor`, `Humor_Total`, `Humor_Keywords`, `Confidence`, `Confidence_Total`, `Confidence_Keywords`, `Fun`, `Fun_Total`, `Fun_Keywords`, `Kindness`, `Kindness_Total`, `Kindness_Keywords`, `Honesty`, `Honesty_Total`, `Honesty_Keywords`, `Reliability`, `Reliability_Total`, `Reliability_Keywords`, `Happiness`, `Happiness_Total`, `Happiness_Keywords`, `Ambition`, `Ambition_Total`, `Ambition_Keywords`, `Humility`, `Humility_Total`, `Humility_Keywords`, `Comments`, `HelpingHand_progress`, `Pal_progress`, `Advocate_progress`, `Comrade_progress`, `MotherTeresa_progress`, `Diva_progress`, `KingOfTheHill_progress`, `Ideator_progress`, `Visionairy_progress`, `Blogger_progress`, `CommanderOfWords_progress`, `Viber_progress`, `attractivenessDisableDate`, `affabilityDisableDate`, `intelligenceDisableDate`, `styleDisableDate`, `promiscuityDisableDate`, `humorDisableDate`, `confidenceDisableDate`, `funDisableDate`, `kindnessDisableDate`, `honestyDisableDate`, `reliabilityDisableDate`, `happinessDisableDate`, `ambitionDisableDate`, `humilityDisableDate`, `totalAnswers`, `newAnswers`, `showNumFriends`, `websiteURL`, `displayLocation`, `displayBirthdate`, `blurb`, `fiveblockHelpingHand`, `counterHelpingHand`, `lastdateHelpingHand`, `fiveblockPal`, `counterPal`, `lastdatePal`, `fiveblockAdvocate`, `counterAdvocate`, `lastdateAdvocate`, `fiveblockComrade`, `counterComrade`, `lastdateComrade`, `fiveblockMotherTeresa`, `counterMotherTeresa`, `lastdateMotherTeresa`, `lastdateDiva`, `lastdateKingOfTheHill`, `lastdateIdeator`, `lastdateVisionairy`, `lastdateBlogger`, `lastdateCommanderOfWords`, `lastdateViber`) VALUES
(1, '712337857', 'Little-Poole Niger', 1, '', 329, '2014-01-17 11:55:54', 'New York, New York||108424279189115&&Columbia University||103127603061486&&Fluent Medical||100164216820714', 389, 'male', NULL, NULL, 0, '', '', 5, 8, '2(Great Smile)', 7, 9, '1(Lone Wolf)', 9.2, 9, '1(Conventional)', '', 5, 5, '3(Nerdy)', 2, 6, '1(Forever Alone)', 7, 3, '2(Witty)', 7, 7, '4(Self Assured)', 6, 3, NULL, 8, 5, NULL, 6.76, 7, '3(Secretive)&&4(Trustwrothy)', 9, 2, '1(Supportive)', 7, 5, '2(Enviable)', 9, 2, NULL, 6, 5, NULL, 'Happiness##2013-12-30 20:06:06##Is Noah Stebbins in the right school or career?: "Maybe he should switch to art history"##712337857&&Style##2013-12-30 20:05:47##Is Noah Stebbins stylish?: "Too many tech t shirts doe"##712337857&&Promiscuity##2013-12-30 20:05:19##Does Noah Stebbins have high romantic standards?: "Depends on how much he has had to drink"##712337857&&Promiscuity##2013-12-30 20:04:34##Would Noah Stebbins wait until marriage to have sex? : "LOL"##712337857&&Attractiveness##2013-12-30 20:02:41##Is Noah Stebbins attractive?: "Bro do you even lift?"##712337857&&Promiscuity##2013-12-30 19:50:50##Would Noah Stebbins wait until marriage to have sex? : "Noah is all about insertion"##712337857', 0, 0, 0, 0, 0, 10, 10, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 43, 0, 0, '', 0, 0, '', 1, 0, '', 1, 0, '', 1, 0, '', 1, 0, '', 1, 0, '', '2014-01-17', '2014-01-17', '', '', '', '', ''),
(89, '100003582610055', 'Noah Stebbins', 1, '', 7770, '2014-01-16 12:58:18', 'Miami Beach, Florida||108260802527498&&New York, New York||108424279189115&&Columbia University in the City of New York||102471088936&&||', 1176, 'male', NULL, NULL, 0, '', '0', 5.8, 10, NULL, 8, 6, '3(Hyped)', 8.5, 5, '3(Emotionally Intelligent)', '', 3, 4, '3(Nerdy)', 5.75, 10, '3(Down)', 6.67, 4, '1(Goofy)', 8.5, 4, NULL, 3, 2, '1(Crass)', 8, 2, '1(Helpful)', 7, 2, '1(Trustworthy)', 0, 0, NULL, 9.33, 3, '2(Good Career)', 10, 2, '1(Industrious)', 3.5, 4, '2(Narcissistic)', 'Happiness##2013-12-30 20:06:06##Is Noah Stebbins in the right school or career?: "Maybe he should switch to art history"##712337857&&Style##2013-12-30 20:05:47##Is Noah Stebbins stylish?: "Too many tech t shirts doe"##712337857&&Promiscuity##2013-12-30 20:05:19##Does Noah Stebbins have high romantic standards?: "Depends on how much he has had to drink"##712337857&&Promiscuity##2013-12-30 20:04:34##Would Noah Stebbins wait until marriage to have sex? : "LOL"##712337857&&Attractiveness##2013-12-30 20:02:41##Is Noah Stebbins attractive?: "Bro do you even lift?"##712337857&&Promiscuity##2013-12-30 19:50:50##Would Noah Stebbins wait until marriage to have sex? : "Noah is all about insertion"##712337857', 10, 5, 6, 2, 0, 0, 7, 4, 0, 3, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-01-14 22:22:59', 423, 0, 0, 'yahoo.com', 0, 1, 'Hi I am a sophomore lol', 5, 1, '2014-01-15', 5, 1, '2014-01-16', 5, 2, '2014-01-15', 5, 1, '2014-01-16', 0, 0, '', '', '', '', '', '', '', ''),
(90, '100004932191844', 'Better Tara', 0, '', 0, '', 'Greendale Community College||184087268308850&&Columbia University||103127603061486&&Playboy||6280019085&&Chicago, Illinois||108659242498155', 0, 'male', NULL, NULL, 0, '', '0', 9, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 10, 10, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '2014-01-17', '2014-01-17', '', '', '', '', ''),
(91, '-1', '', 0, '', 0, '', NULL, 0, NULL, NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', ''),
(92, '100003378704596', 'Benjamin Kornick', 0, '', 0, '', 'Roslyn High School||109319602427194&&Columbia University||103127603061486&&CU Records - The First and Only||174384057645&&||&&Epic Records||108148919213694', 0, 'male', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, '1(Romantically Unsatisfied)', 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '2014-01-17', '', '', '', '', '', ''),
(93, '698172322', 'Idris Sardharwala', 0, '', 0, '', 'Plantation High School||104066069628643&&Columbia University||103127603061486', 0, 'male', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, '1(Naive)', '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'Intelligence##2014-01-12 11:45:09##Does Idris Sardharwala know current slang? : "Of course"', 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '2014-01-17', '', '', '', '', '', ''),
(94, '597369485', 'Emma Berube', 0, '', 0, '', 'Dover, Massachusetts||104076912962139&&New York, New York||108424279189115&&Columbia University||103127603061486&&Boston Ballet School||132216620137699', 0, 'female', NULL, NULL, 0, '', '0', 0, 0, NULL, 10, 1, 'null', 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', ''),
(95, '1321015971', 'Alex Roth', 0, '', 0, '', 'Jericho, New York||103756319663590&&New York, New York||108424279189115&&Columbia University||103127603061486&&Columbia University in the City of New York||102471088936', 0, 'male', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, 'null', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'Promiscuity##2014-01-13 19:55:36##IS Alex Roth a romantic?: "Thi$ %sn***t a test of #one two #three &one two &three"', 0, 0, 0, 0, 0, 10, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '2014-01-17', '', '', '', '', '', ''),
(96, '1618112231', 'Natalie Van Cleven', 1, '', 0, '2014-01-14 22:33:27', 'Brugge, Belgium||108491225849287&&Brandon, Florida||103462413027188&&||&&ColorCards.Com||128572711069', 100, 'female', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 1, 1, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', ''),
(97, '1205782245', 'Kendra Stebbins', 1, '', 0, '2014-01-14 22:51:25', 'Miami Beach, Florida||108260802527498&&Brandon, Florida||103462413027188&&Bloomingdale High School||104009472967924&&||', 593, 'female', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', 1, 1, 'what is up', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', ''),
(98, '1445190413', 'Christina Worley', 1, '', 0, '2014-01-14 23:06:20', 'Lacey, Washington||107797262576966&&Brandon, Florida||103462413027188&&Hillsborough Community College||109555672403167&&||', 468, 'female', NULL, NULL, 0, '', '0', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 'farts.com', 1, 1, 'cshgkdsjhc', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
