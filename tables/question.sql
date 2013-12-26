-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 10:48 PM
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
(1, 'Attractiveness', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?'),
(2, 'Awkwardness', 'Would it be weird if name gave you a hug?', 'Would it be weird if name gave you a hug?', 'Would it be weird if name gave you a hug?', '*Would you bring name to hang out with new friends?', '*Would you bring name to hang out with new friends?', '*Would you bring name to hang out with new friends?', 'Is name awkward in conversations?', 'Is name awkward in conversations?', 'Is name awkward in conversations?', 'Is name awkward?'),
(3, 'Intelligence', 'Does name seem smart?', 'Does name seem smart?', 'If name was dropped in foreign country with no resources and a different language, could they get home? (Street Smarts)', 'If name was dropped in foreign country with no resources and a different language, could they get home? (Street Smarts)', 'Would name survive on a desert island? (Survival Skills)', 'Did/does name get good grades in school? (Academic)', 'Would name notice if you were upset? (Emotional Intelligence)', 'Would name notice if you were upset? (Emotional Intelligence)', 'Did/does name get good grades in school? (Academic)', 'Does name seem smart?'),
(4, 'Fashionability', 'Is name fashionable?', 'Is name fashionable?', '*Does name look nerdy? (Nerdy)', 'Does name look hipster? (Hipster)', 'Does name dress for success? (Professional)', 'Does name rock the sweater vest? (Preppy)', 'Does name dress like he could be in a rap video? (Street Style)', 'Does name look hipster? (Hipster)', 'Is name fashionable? ', 'Does name dress for success? (Professional) '),
(5, 'Promiscuity', 'Is name smart?', 'Would name sext? (Slutty)', 'Would name have sex on a first date? (Slutty)', 'Would you want name as your wingman? (Flirty)', 'Would name score at a party? (Flirty)', 'Would name flirt with a police officer to get out of a ticket? (Slutty)', 'Would name go to a strip club? (Open)', '*Would name wait until marriage to have sex? (Traditional)', 'Would name go to a strip club? (Open)', '*Would name wait until marriage to have sex? (Traditional)'),
(6, 'Humor', 'Would you hire name to work for you?', 'Can name make you laugh?', 'Can name make you laugh?', 'Does name use word play? (Witty)', 'Would name make a fart joke? (Crass)', 'Is name goofy? (Goofy)', 'Is name goofy? (Goofy)', 'Would name make a fart joke? (Crass)', 'Is name sarcastic? (Sarcastic)', 'Is name sarcastic? (Sarcastic)'),
(7, 'Confidence', 'Can name successfully use a pickup line?', 'Does name take charge in a group? (Leader)', 'Does name take charge in a group? (Leader)', 'Is name confident? ', 'Is name confident? ', 'Is name full of himself? (Arrogant)', '*Is name concerned with self image? (Insecure)', '*Is name concerned with self image? (Insecure)', 'Is name full of himself? (Arrogant)', 'Is name confident?'),
(8, 'Fun', 'Does name make racist or sexist remarks or jokes?', 'Would you hang out with name on a Friday night? (Festive)', 'Would you hang out with name on a Friday night? (Festive)', 'Would you roadtrip with name?', 'Is name laid back? (Chill)', 'Is name laid back? (Chill)', 'Is name the life of the party? (Festive)', 'Would you roadtrip with name?', 'Can name make the most out of any situation?', 'Can name make the most out of any situation?'),
(9, 'Kindness', 'Would name help an old lady cross the road? ', 'Would name make fun of friends behind their backs? (Rude)', 'Would name make fun of friends behind their backs? (Rude)', 'Would name help an old lady cross the road? ', 'Would name volunteer at a relief shelter? (Generous)', 'Would name volunteer at a relief shelter? (Generous)', 'Would name tutor you if you needed help? (Helpful)', '*Would name bully someone?', '*Would name bully someone?', 'Would name tutor you if you needed help? (Helpful)'),
(10, 'Honesty', 'Would you trust name with a secret? (Trustworthy)', 'Would you trust name with a secret? (Trustworthy)', 'Would name tell you if your outfit was ugly? (Blunt)', 'Would name tell you if your outfit was ugly? (Blunt)', '*Would name cheat on a significant other? (Infidelity) ', '*Would name cheat on a significant other? (Infidelity) ', '*Would name rob a bank if there was no chance of being caught? ', '*Would name pretend to be sick to get out of work? (Liar)', '*Would name lie on a resume? (Cheater)', '*Would name take credit for someone else''s work? (Cheater)'),
(11, 'Dependability', 'Would name have your back in a fight? (Loyal)', 'Would name have your back in a fight? (Loyal)', 'Would name have your back in a fight? (Loyal)', 'Would you hire name to work for you?', 'Would you hire name to work for you?', 'Would name care for you if you were sick? (Supportive)', 'Would name care for you if you were sick? (Supportive)', 'Is name dependable?', 'Is name dependable?', 'Is name dependable?'),
(12, 'Satisfaction', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Is name with the right romantic partner? (Romantically satisfied)', 'Does name seem happy?', 'Does name seem happy?', 'Does name seem happy?', 'Would you trade lives with name? (Enviable)', 'Would you trade lives with name? (Enviable)'),
(13, 'Ambition', '*Is name lazy?', '*Is name lazy?', '*Is name lazy?', '*Is name lazy?', 'Does name compete new years resolutions?', 'Does name compete new years resolutions?', 'Does name compete new years resolutions?', 'Could name be president of the US one day?', 'Could name be president of the US one day?', 'Could name be president of the US one day?'),
(14, 'Humility', '*Would name date someone just for their looks? (Vain)', '*Would name date someone just for their looks? (Vain)', '*Does name exaggerate about things? (Showoff)', '*Does name exaggerate about things? (Showoff)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name take a lot of selfies? (Narcissistic)', '*Does name like to be the center of attention? (Narcissistic)', 'Is name humble?', 'Is name humble?', 'Is name humble?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
