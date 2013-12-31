-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2013 at 05:57 PM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
