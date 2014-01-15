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
-- Table structure for table `achievements`
--

CREATE TABLE IF NOT EXISTS `achievements` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`ID`, `name`, `category`, `description`, `color`) VALUES
(1, 'Helping Hand', 'Answers', 'Five answers for one consecutive day', 'Red'),
(2, 'Pal', 'Answers', 'Five answers for two consecutive days', 'Blue'),
(3, 'Advocate', 'Answers', 'Five answers for three consecutive days', 'Copper'),
(4, 'Comrade', 'Answers', 'Five answers for five consecutive days', 'Silver'),
(5, 'Mother Teresa', 'Answers', 'Five answers for ten consecutive days', 'Gold'),
(6, 'Diva', 'Percentile', 'Ranked top 10 in a community', 'Silver'),
(7, 'King of the Hill', 'Percentile', 'Ranked 1 in a community', 'Gold'),
(8, 'Ideator', 'Fourm', 'Come up with a possible question with 10 community supports', 'Silver'),
(9, 'Visionairy', 'Forum', 'Come up with a possible question with 100 community supports', 'Gold'),
(10, 'Blogger', 'Blog', 'Write one approved blog post', 'Silver'),
(11, 'Commander of Words', 'Blog', 'Write three approved blog posts', 'Gold'),
(12, 'Viber', 'Overall', 'Four approved blog posts, ten invitations, and five answers for ten consecutive days', 'Black');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
