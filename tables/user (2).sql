-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2014 at 08:44 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Vibosphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  `Points` int(10) NOT NULL DEFAULT '0',
  `Communities` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Age` varchar(255) DEFAULT NULL,
  `Race` varchar(255) DEFAULT NULL,
  `Public` tinyint(1) NOT NULL DEFAULT '0',
  `Location` varchar(255) NOT NULL,
  `Spam` int(10) NOT NULL DEFAULT '0',
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
  `Helping Hand` tinyint(4) NOT NULL,
  `Helping Hand_progress` tinyint(4) NOT NULL,
  `Pal` tinyint(4) NOT NULL,
  `Pal_progress` tinyint(4) NOT NULL,
  `Advocate` tinyint(4) NOT NULL,
  `Advocate_progress` tinyint(4) NOT NULL,
  `Comrade` tinyint(4) NOT NULL,
  `Comrade_progress` tinyint(4) NOT NULL,
  `Mother Teresa` tinyint(4) NOT NULL,
  `Mother Teresa_progress` tinyint(4) NOT NULL,
  `Diva` tinyint(4) NOT NULL,
  `Diva_progress` tinyint(4) NOT NULL,
  `King of the Hill` tinyint(4) NOT NULL,
  `King of the Hill_progress` tinyint(4) NOT NULL,
  `Ideator` tinyint(4) NOT NULL,
  `Ideator_progress` tinyint(4) NOT NULL,
  `Visionairy` tinyint(4) NOT NULL,
  `Visionairy_progress` tinyint(4) NOT NULL,
  `Blogger` tinyint(4) NOT NULL,
  `Blogger_progress` tinyint(4) NOT NULL,
  `Commander of Words` tinyint(4) NOT NULL,
  `Commander of Words_progress` tinyint(4) NOT NULL,
  `Viber` tinyint(4) NOT NULL,
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
  `totalAnswers` bigint(20) NOT NULL,
  `showNumFriends` tinyint(4) NOT NULL,
  `websiteURL` varchar(50) NOT NULL,
  `displayLocation` tinyint(4) NOT NULL,
  `displayBirthdate` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UID`, `Name`, `Active`, `Points`, `Communities`, `Gender`, `Age`, `Race`, `Public`, `Location`, `Spam`, `Attractiveness`, `Attractiveness_Total`, `Attractiveness_Keywords`, `Affability`, `Affability_Total`, `Affability_Keywords`, `Intelligence`, `Intelligence_Total`, `Intelligence_Keywords`, `Intelligence_Comments`, `Style`, `Style_Total`, `Style_Keywords`, `Promiscuity`, `Promiscuity_Total`, `Promiscuity_Keywords`, `Humor`, `Humor_Total`, `Humor_Keywords`, `Confidence`, `Confidence_Total`, `Confidence_Keywords`, `Fun`, `Fun_Total`, `Fun_Keywords`, `Kindness`, `Kindness_Total`, `Kindness_Keywords`, `Honesty`, `Honesty_Total`, `Honesty_Keywords`, `Reliability`, `Reliability_Total`, `Reliability_Keywords`, `Happiness`, `Happiness_Total`, `Happiness_Keywords`, `Ambition`, `Ambition_Total`, `Ambition_Keywords`, `Humility`, `Humility_Total`, `Humility_Keywords`, `Comments`, `Helping Hand`, `Helping Hand_progress`, `Pal`, `Pal_progress`, `Advocate`, `Advocate_progress`, `Comrade`, `Comrade_progress`, `Mother Teresa`, `Mother Teresa_progress`, `Diva`, `Diva_progress`, `King of the Hill`, `King of the Hill_progress`, `Ideator`, `Ideator_progress`, `Visionairy`, `Visionairy_progress`, `Blogger`, `Blogger_progress`, `Commander of Words`, `Commander of Words_progress`, `Viber`, `Viber_progress`, `attractivenessDisableDate`, `affabilityDisableDate`, `intelligenceDisableDate`, `styleDisableDate`, `promiscuityDisableDate`, `humorDisableDate`, `confidenceDisableDate`, `funDisableDate`, `kindnessDisableDate`, `honestyDisableDate`, `reliabilityDisableDate`, `happinessDisableDate`, `ambitionDisableDate`, `humilityDisableDate`, `totalAnswers`, `showNumFriends`, `websiteURL`, `displayLocation`, `displayBirthdate`) VALUES
(1, '712337857', 'Little-Poole Niger', 1, 313, 'Barack Obama Academy||108341135857788&&Columbia University||103127603061486&&Fluent Medical||100164216820714&&New York, New York||108424279189115', 'male', NULL, NULL, 0, '', 0, 5, 8, '2(Great Smile)', 7, 7, '1(Intense)', 9.2, 8, '1(Academic)', '', 5, 4, '3(Nerdy)', 2, 5, '1(Forever Alone)', 7, 3, '2(Witty)', 7, 6, '4(Self Assured)', 6, 3, NULL, 8, 4, NULL, 6.76, 6, '3(Secretive)&&4(Trustwrothy)', 9, 2, '1(Supportive)', 7, 5, '2(Enviable)', 9, 2, NULL, 5, 3, NULL, 'Happiness##2013-12-30 20:06:06##Is Noah Stebbins in the right school or career?: "Maybe he should switch to art history"&&Style##2013-12-30 20:05:47##Is Noah Stebbins stylish?: "Too many tech t shirts doe"&&Promiscuity##2013-12-30 20:05:19##Does Noah Stebbins have high romantic standards?: "Depends on how much he has had to drink"&&Promiscuity##2013-12-30 20:04:34##Would Noah Stebbins wait until marriage to have sex? : "LOL"&&Attractiveness##2013-12-30 20:02:41##Is Noah Stebbins attractive?: "Bro do you even lift?"&&Promiscuity##2013-12-30 19:50:50##Would Noah Stebbins wait until marriage to have sex? : "Noah is all about insertion"', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0),
(89, '100003582610055', 'Noah Stebbins', 1, 0, 'Bloomingdale Senior High School||23999532724&&Columbia University in the City of New York||102471088936', 'male', NULL, NULL, 0, '', 0, 5.8, 10, NULL, 8, 6, '3(Hyped)', 8.5, 5, '3(Emotionally Intelligent)', '', 3, 4, '3(Nerdy)', 5.75, 10, '3(Down)', 6.67, 4, '1(Goofy)', 8.5, 4, NULL, 3, 2, '1(Crass)', 8, 2, '1(Helpful)', 7, 2, '1(Trustworthy)', 0, 0, NULL, 9.33, 3, '2(Good Career)', 10, 2, '1(Industrious)', 3.5, 4, '2(Narcissistic)', 'Happiness##2013-12-30 20:06:06##Is Noah Stebbins in the right school or career?: "Maybe he should switch to art history"&&Style##2013-12-30 20:05:47##Is Noah Stebbins stylish?: "Too many tech t shirts doe"&&Promiscuity##2013-12-30 20:05:19##Does Noah Stebbins have high romantic standards?: "Depends on how much he has had to drink"&&Promiscuity##2013-12-30 20:04:34##Would Noah Stebbins wait until marriage to have sex? : "LOL"&&Attractiveness##2013-12-30 20:02:41##Is Noah Stebbins attractive?: "Bro do you even lift?"&&Promiscuity##2013-12-30 19:50:50##Would Noah Stebbins wait until marriage to have sex? : "Noah is all about insertion"', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 0, 7, 0, 4, 0, 0, 0, 3, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0);
