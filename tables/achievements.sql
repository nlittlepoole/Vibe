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
(1, 'Helping Hand', 'Answers', '5 answers for 1 consecutive day', 'red'),
(2, 'Pal', 'Answers', '5 answers for 2 consecutive days', 'blue'),
(3, 'Advocate', 'Answers', '5 answers for 3 consecutive days', 'darkgreen'),
(4, 'Comrade', 'Answers', '5 answers for 5 consecutive days', 'silver'),
(5, 'Mother Teresa', 'Answers', '5 answers for 10 consecutive days', 'gold'),
(6, 'Truth Giver', 'Answers', '20 total answers', 'red'),
(7, 'Top Answerer', 'Answers', '50 total answers', 'blue'),
(8, 'Tell it like it is', 'Answers', '100 total answers', 'darkgreen'),
(9, 'Diva', 'Percentile', 'Ranked top 10 in a community', 'silver'),
(10, 'King of the Hill', 'Percentile', 'Ranked 1 in a community', 'gold'),
(11, 'Ideator', 'Forum', 'Come up with a possible question with 10 community supports', 'silver'),
(12, 'Visionairy', 'Forum', 'Come up with a possible question with 100 community supports', 'gold'),
(13, 'Blogger', 'Blog', 'Write 1 approved blog post', 'silver'),
(14, 'Commander of Words', 'Blog', 'Write 3 approved blog posts', 'gold'),
(15, 'Viber', 'Overall', '4 approved blog posts and 5 answers for 10 consecutive days', 'black');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
