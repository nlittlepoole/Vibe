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
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Attribute` varchar(255) DEFAULT NULL,
  `Question1` varchar(255) DEFAULT NULL,
  `Question2` varchar(255) NOT NULL,
  `Question3` varchar(255) NOT NULL,
  `Question4` varchar(255) NOT NULL,
  `Question5` varchar(255) NOT NULL,
  `Question6` varchar(255) NOT NULL,
  `Question7` varchar(255) NOT NULL,
  `Question8` varchar(255) NOT NULL,
  `Question9` varchar(255) NOT NULL,
  `Question10` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Attribute` (`Attribute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `Attribute`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`, `Question6`, `Question7`, `Question8`, `Question9`, `Question10`) VALUES
(1, 'Attractiveness', 'Is name attractive?', 'Does name have a nice smile?(Great Smile)', 'Does name have a cool hairstyle?(Cool Hairstyle)', 'Does name have attractive eyes?(Striking Eyes)', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?'),
(2, 'Affability', 'Would you bring name to hang out with new friends?', '*Does name annoy you?(Annoying)', '*Does name act creepy? (Creepy)', '*Is name awkward in conversations?(Awkward)', 'Is name laid back? (Chill)', '*Does name frequently have personal drama? (Drama Queen&&Chill)', '^Is name frequently excited? (Intense)', '*Does name prefer to be alone?(Lone Wolf) ', 'Does name have a lot of friends? (Socialite&&Lone Wolf)', 'Is name an easy person to approach?'),
(3, 'Intelligence', 'Does name seem smart?', '^Is name creative? (Creative)', 'Would name get tricked by a con artist? (Naive&&Street Smart)', 'Does name know current slang? (Street Smarts&&Naive)', '^Would name survive a week on a desert island? (Survival Skills)', 'Did/does name get good grades in school? (Academic)', '^Would name notice if you were upset? (Emotionally Intelligent)', '^Does name think outside the box? (Unorthodox&&Conventional)', 'Does name plan out their moves? (Tactical)', 'Would name do well in a game of Trivia Pursuit?'),
(4, 'Style', 'Is name stylish?', 'Is name elegant? (Chic)', '^Does name look nerdy? (Nerdy)', '^Does name look hipster? (Hipster)', '^Does name dress for success? (Professional)', '^Does name rock a sweater vest or a cardigan? (Preppy)', '^Does name have a style that resembles rappers? (Street)', '^Is name a hipster? (Hipster)', '^Does name dress for comfort? (Casual)', '^Does name dress for success? (Professional) '),
(5, 'Promiscuity', 'Does name have a big romantic life?', 'Would name sext? (Sexter)', 'Would name have sex on a first date? (Down)', 'Would you want name as your wingman? (Wingman)', 'Would name score at a party? (Pickup Artist)', '^Would name flirt with a police officer to get out of a ticket? (Flirty)', '*Does name have high romantic standards?(High Standards)', '*Would name wait until marriage to have sex? (Traditional&&Down)', '*Is name unsuccessful in getting and maintaining relationships? (Forever Alone)', '^IS name a romantic?(Romantic)'),
(6, 'Humor', 'Can name make you laugh?', '^Does name make racist or sexist  jokes? (Politically Incorrect)', '^Does name make fun of others?(Mean)', '^Does name use word play? (Witty)', '^Would name make a fart joke? (Crass)', '^Is name goofy? (Goofy)', '^Does name do good impersonations? (Impersonator)', 'Can name make you laugh?', 'Can name make you laugh?', 'Can name make you laugh?'),
(7, 'Confidence', 'Is name confident?', 'Does name take charge in a group? (Leader)', '*Is name concerned with self image? (Insecure&&Self Assured)', 'Is name full of himself? (Arrogant)', 'Is name confident? ', 'Is name confident?', 'Is name confident?', 'Is name confident?', 'Is name confident?', 'Is name confident?'),
(8, 'Fun', 'Do you enjoy hanging out with name?', '^Is name excited to try new things? (Adventurous)', 'Would you hang out with name on a Friday night? ', '^Does name love to party? (Party Animal)', '*Is name serious all the time? (Buzzkill)', '^Does name like to play pranks?(Prankster)', 'Would you roadtrip with name?', '*Does name complain a lot?(Buzzkill)', '^Does name prefer to stay in on a Friday night?(Homebody)', 'Is name frequently excited? (Hyped)'),
(9, 'Kindness', 'Would name help an old lady cross the road? ', '*Would name make fun of friends behind their backs? (Rude)', 'Would name volunteer at a relief shelter? (Generous)', 'Would name tutor you if you needed help? (Helpful)', '*Would name bully someone?(Bully)', 'Does name relate well to others? (Compassionate)', 'Does name treat everyone with respect?(Respectful)', 'Is name kind?', 'Is name kind?', 'Is name kind?'),
(10, 'Honesty', 'Is name honest?', 'Would name tell you if your outfit was ugly? (Blunt)', 'Would you trust name with a secret? (Trustworthy)', '*Would name cheat on a significant other? (Infidelity) ', '*Would name rob a bank if there was no chance of being caught? ', '*Would name pretend to be sick to get out of work? (Liar)', '*Would name lie on a resume? (Cheater)', '*Would name take credit for someone else''s work? (Cheater)', 'Is name secretive about personal things? (Secretive)', '*Does name manipulate people? (Manipulative) '),
(11, 'Reliability', 'Is name dependable?', 'Would name have your back in a fight? (Loyal)', 'Does name take responsibility for mistakes? (Responsible)', 'Would name support you when you needed it? (Supportive)', 'Would you hire name to work for you?', 'Would name care for you if you were sick? (Supportive)', 'Would name care for you if you were sick? (Supportive)', 'Is name dependable?', 'Is name dependable?', 'Is name dependable?'),
(12, 'Happiness', 'Does name seem  happy?', 'Is name with the right romantic partner? (Romantically satisfied&&Romantically Unsatisfied)', 'Is name with the right romantic partner? (Romantically satisfied&&Romantically Unsatisfied)', 'Is name in the right school or career?(Good Career&&Misguided)', 'Is name in the right school or career?(Good Career&&Bad Career)', 'Is name in the right school or career?(Good Career&&Bad Career)', 'Is name in the right school or career?(Good Career)', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)'),
(13, 'Ambition', 'Does name have big aspirations?', 'Is name motivated?(Motivated&&Unmotivated)', 'Could name be president of the US one day?', '*Is name lazy?(Lazy)', 'Does name compete new years resolutions?', 'Does name work hard to complete goals? (Industrious&&Complacent)', '*Is name lazy?(Lazy)', 'Could name be president of the US one day?', 'Could name be president of the US one day?', 'Could name be president of the US one day?'),
(14, 'Humility', 'Is name humble?', '*Would name date someone just for their looks? (Vain)', '*Does name exaggerate about things? (Showoff)', '*Does name exaggerate about things? (Showoff)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name like to be the center of attention? (Narcissistic)', '*Would name date someone just for their looks? (Vain)', 'Is name humble?', 'Is name humble?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
