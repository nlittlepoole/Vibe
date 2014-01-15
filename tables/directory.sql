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
-- Table structure for table `directory`
--

CREATE TABLE IF NOT EXISTS `directory` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Users` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`ID`, `UID`, `Name`, `Picture`, `Users`) VALUES
(1, '103127603061486', 'Columbia University', 'http://graph.facebook.com/103127603061486/picture?width=600&height=600', 11),
(2, '-1', 'No Data on Community', 'http://learnaslead.com/wp-content/uploads/construction-cone-md.png', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
