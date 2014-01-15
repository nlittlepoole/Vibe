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
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asked` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `answer` int(10) unsigned DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) NOT NULL,
  `Affiliations` varchar(1000) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `asked`, `recipient`, `Name`, `attribute`, `answer`, `comment`, `keywords`, `Affiliations`, `Gender`) VALUES
(1, '712337857', '100000069600522', 'Eric Tong', 'Affability', 10, 'Affability##2014-01-14 15:33:20##Is Eric Tong awkward in conversations?: "no"', 'null', '||', 'male'),
(2, '712337857', '520096461', 'Jeff Liu', 'Promiscuity', 10, '', 'null', 'Toronto, Ontario||110941395597405&&||&&Columbia University||103127603061486', 'male'),
(3, '712337857', '100006609340913', 'Columbia Admirers', 'Intelligence', NULL, '', 'null', '||&&New York, New York||108424279189115&&Columbia University in the City of New York||102471088936', 'female'),
(4, '712337857', '1321015971', 'Alex Roth', 'Ambition', 4, '', 'null', 'Jericho, New York||103756319663590&&New York, New York||108424279189115&&Columbia University||103127603061486&&Columbia University in the City of New York||102471088936', 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
