-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 02:38 AM
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
(1, 'Affability', 8.2, 0.98),
(2, 'Ambition', 7.07, 1.87),
(3, 'Attractiveness', 6.71, 1.94),
(4, 'Confidence', 6.55, 1.88),
(5, 'Fun', 5.66, 0.34),
(6, 'Happiness', 5.66, 3.29),
(7, 'Honesty', 8.44, 1.56),
(8, 'Humility', 6.17, 2.78),
(9, 'Humor', 6.84, 0.16),
(10, 'Intelligence', 8.46, 1.52),
(11, 'Kindness', 8.1, 0.17),
(12, 'Promiscuity', 4.35, 1.92),
(13, 'Reliability', 7.25, 1.92),
(14, 'Style', 2.67, 2.05);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
