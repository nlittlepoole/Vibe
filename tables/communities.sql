-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 10:49 PM
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
-- Table structure for table `communities`
--

CREATE TABLE IF NOT EXISTS `communities` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=392 ;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`ID`, `UID`, `Name`, `Picture`) VALUES
(370, '115082195173188', 'Jericho Senior High School', 'http://graph.facebook.com/115082195173188/picture?width=600&height=600'),
(371, '103127603061486', 'Columbia University', 'http://graph.facebook.com/103127603061486/picture?width=600&height=600'),
(372, '102471088936', 'Columbia University in the City of New York', 'http://graph.facebook.com/102471088936/picture?width=600&height=600'),
(373, '108424279189115', 'New York, New York', 'http://graph.facebook.com/108424279189115/picture?width=600&height=600'),
(374, '104066069628643', 'Plantation High School', 'http://graph.facebook.com/104066069628643/picture?width=600&height=600'),
(375, '108210922533457', 'Santa Cruz High School', 'http://graph.facebook.com/108210922533457/picture?width=600&height=600'),
(376, '24711256328', 'Columbia Bartending Agency and School of Mixology', 'http://graph.facebook.com/24711256328/picture?width=600&height=600'),
(377, '109319602427194', 'Roslyn High School', 'http://graph.facebook.com/109319602427194/picture?width=600&height=600'),
(378, '174384057645', 'CU Records - The First and Only', 'http://graph.facebook.com/174384057645/picture?width=600&height=600'),
(379, '108148919213694', 'Epic Records', 'http://graph.facebook.com/108148919213694/picture?width=600&height=600'),
(380, '107703032585945', 'The Ellis School', 'http://graph.facebook.com/107703032585945/picture?width=600&height=600'),
(381, '112078262142315', 'Bucknell University', 'http://graph.facebook.com/112078262142315/picture?width=600&height=600'),
(382, '109210892431572', 'Anglican Church Grammar School', 'http://graph.facebook.com/109210892431572/picture?width=600&height=600'),
(383, '137474816330115', 'The University of Queensland', 'http://graph.facebook.com/137474816330115/picture?width=600&height=600'),
(384, '177572518966941', 'UN Youth Queensland', 'http://graph.facebook.com/177572518966941/picture?width=600&height=600'),
(385, '114759161873220', 'Dover - Sherborn Regional High', 'http://graph.facebook.com/114759161873220/picture?width=600&height=600'),
(386, '102771993129318', 'Columbia University Medical Center (CUMC)', 'http://graph.facebook.com/102771993129318/picture?width=600&height=600'),
(387, '132216620137699', 'Boston Ballet School', 'http://graph.facebook.com/132216620137699/picture?width=600&height=600'),
(388, '105628482804632', 'Lecanto High School', 'http://graph.facebook.com/105628482804632/picture?width=600&height=600'),
(389, '121993581179395', 'Dodge Fitness Center', 'http://graph.facebook.com/121993581179395/picture?width=600&height=600'),
(390, '108341135857788', 'Barack Obama Academy', 'http://graph.facebook.com/108341135857788/picture?width=600&height=600'),
(391, '100164216820714', 'Fluent Medical', 'http://graph.facebook.com/100164216820714/picture?width=600&height=600');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
