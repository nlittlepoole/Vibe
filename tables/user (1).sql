-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 10:22 PM
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

CREATE TABLE `user` (
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
  `Attractiveness_Comments` varchar(255) NOT NULL,
  `Awkwardness` float NOT NULL DEFAULT '0',
  `Awkwardness_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Awkwardness_Keywords` varchar(255) DEFAULT NULL,
  `Awkwardness_Comments` varchar(255) NOT NULL,
  `Intelligence` float NOT NULL DEFAULT '0',
  `Intelligence_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Intelligence_Keywords` varchar(255) DEFAULT NULL,
  `Intelligence_Comments` varchar(255) NOT NULL,
  `Fashionability` float NOT NULL DEFAULT '0',
  `Fashionability_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Fashionability_Keywords` varchar(255) DEFAULT NULL,
  `Fashionability_Comments` varchar(255) NOT NULL,
  `Promiscuity` float NOT NULL DEFAULT '0',
  `Promiscuity_Total` int(11) NOT NULL DEFAULT '0',
  `Promiscuity_Keywords` varchar(255) DEFAULT NULL,
  `Promiscuity_Comments` varchar(255) NOT NULL,
  `Humor` float NOT NULL DEFAULT '0',
  `Humor_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Humor_Keywords` varchar(255) DEFAULT NULL,
  `Humor_Comments` varchar(255) NOT NULL,
  `Confidence` float NOT NULL DEFAULT '0',
  `Confidence_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Confidence_Keywords` varchar(255) DEFAULT NULL,
  `Confidence_Comments` varchar(255) NOT NULL,
  `Fun` float NOT NULL DEFAULT '0',
  `Fun_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Fun_Keywords` varchar(255) DEFAULT NULL,
  `Fun_Comments` varchar(255) NOT NULL,
  `Kindness` float NOT NULL DEFAULT '0',
  `Kindness_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Kindness_Keywords` varchar(255) DEFAULT NULL,
  `Kindness_Comments` varchar(255) NOT NULL,
  `Honesty` float NOT NULL DEFAULT '0',
  `Honesty_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Honesty_Keywords` varchar(255) DEFAULT NULL,
  `Honesty_Comments` varchar(255) NOT NULL,
  `Dependability` float NOT NULL DEFAULT '0',
  `Dependability_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Dependability_Keywords` varchar(255) DEFAULT NULL,
  `Dependability_Comments` varchar(255) NOT NULL,
  `Satisfaction` float NOT NULL DEFAULT '0',
  `Satisfaction_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Satisfaction_Keywords` varchar(255) DEFAULT NULL,
  `Satisfaction_Comments` varchar(255) NOT NULL,
  `Ambition` float NOT NULL DEFAULT '0',
  `Ambition_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Ambition_Keywords` varchar(255) DEFAULT NULL,
  `Ambition_Comments` varchar(255) NOT NULL,
  `Humility` float NOT NULL DEFAULT '0',
  `Humility_Total` int(10) unsigned NOT NULL DEFAULT '0',
  `Humility_Keywords` varchar(255) DEFAULT NULL,
  `Humility_Comments` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UID`, `Active`, `Points`, `Communities`, `Gender`, `Age`, `Race`, `Attractiveness`, `Attractiveness_Total`, `Attractiveness_Keywords`, `Attractiveness_Comments`, `Awkwardness`, `Awkwardness_Total`, `Awkwardness_Keywords`, `Awkwardness_Comments`, `Intelligence`, `Intelligence_Total`, `Intelligence_Keywords`, `Intelligence_Comments`, `Fashionability`, `Fashionability_Total`, `Fashionability_Keywords`, `Fashionability_Comments`, `Promiscuity`, `Promiscuity_Total`, `Promiscuity_Keywords`, `Promiscuity_Comments`, `Humor`, `Humor_Total`, `Humor_Keywords`, `Humor_Comments`, `Confidence`, `Confidence_Total`, `Confidence_Keywords`, `Confidence_Comments`, `Fun`, `Fun_Total`, `Fun_Keywords`, `Fun_Comments`, `Kindness`, `Kindness_Total`, `Kindness_Keywords`, `Kindness_Comments`, `Honesty`, `Honesty_Total`, `Honesty_Keywords`, `Honesty_Comments`, `Dependability`, `Dependability_Total`, `Dependability_Keywords`, `Dependability_Comments`, `Satisfaction`, `Satisfaction_Total`, `Satisfaction_Keywords`, `Satisfaction_Comments`, `Ambition`, `Ambition_Total`, `Ambition_Keywords`, `Ambition_Comments`, `Humility`, `Humility_Total`, `Humility_Keywords`, `Humility_Comments`) VALUES
(148, '2147483647', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '', 0.67, 3, NULL, '', 3.33, 3, '2(Quitter)', 'Droppd AP&&Droppd AP&&not at columbia&&Droppd AP&&not at columbia', 0, 0, NULL, '', 5, 2, 'null', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, ''),
(149, '597369485', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 8, 1, '1(Flirty)', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 2, 2, NULL, '', 8, 1, 'null', '', 4, 1, NULL, ''),
(150, '712337857', 1, 54, 'Barack Obama Academy&&Columbia University&&Fluent Medical&&New York, New York', 'male', NULL, NULL, 5, 2, NULL, '', 4.86, 7, NULL, '', 9.14, 7, '1(Academic)', 'So smart', 4, 6, '2(Nerdy)', 'CS minor', 4.5, 4, NULL, 'with Noah&&depends on the girl&&not by choice', 8, 2, '1(Sarcastic)&&3(Goofy)&&4(Mean)', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 4, 1, NULL, '', 8, 1, NULL, '', 0, 0, NULL, '', 9, 2, NULL, 'If he as more confident&&He Stays Scheming', 0, 0, NULL, ''),
(151, '1321015971', 0, 0, NULL, NULL, NULL, NULL, 4, 1, NULL, '', 4, 1, 'null', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 6, 1, NULL, '', 0, 0, NULL, '', 0, 0, NULL, ''),
(152, '698172322', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 1, '1(Narcissistic)', ''),
(153, '1534555849', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 6, 1, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 4, 1, 'null', '', 0, 0, NULL, ''),
(154, '1013850160', 0, 0, NULL, NULL, NULL, NULL, 6, 1, 'null', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, ''),
(155, '730405540', 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '', 6, 1, 'null', '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '', 0, 0, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
