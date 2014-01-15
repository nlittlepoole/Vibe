-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2014 at 02:37 AM
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
-- Table structure for table `-1`
--

CREATE TABLE IF NOT EXISTS `-1` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
