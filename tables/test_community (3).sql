-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 02:39 AM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
