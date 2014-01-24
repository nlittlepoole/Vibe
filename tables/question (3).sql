-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: 042598e84374769fa344b7075b137a8109777835.rackspaceclouddb.com
-- Generation Time: Jan 19, 2014 at 05:18 PM
-- Server version: 5.1.72-2
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Vibosphere`
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
(1, 'Attractiveness', 'Is name attractive?', 'Does name have a nice smile?(Great Smile)', 'Does name have a cool hairstyle?(Cool Hairstyle)', 'Does name have attractive eyes?(Striking Eyes)', 'Could name pass for a model?', 'Could name pass for a model?', 'Could name pass for a model?', 'Is name attractive?', 'Is name attractive?', 'Is name attractive?'),
(2, 'Affability', 'Would you bring name to hang out with new friends?', '*Does name annoy you?(Annoying)', '*Would name stalk a crush? (Creepy)', '*Is name awkward?(Awkward)', 'Is name laid back? (Chill)', '*Is name uneasy at a party? (Anxious&&Chill)', '^Is name Intimidating? (Intimidating)', '*Does name prefer to be alone?(Loner) ', 'Does name have a lot of friends? (Socialite&&Loner)', 'Is name easy to talk to?'),
(3, 'Intelligence', 'Is name smart?', '^Is name creative? (Creative)', 'Would name get fooled  by a con artist?(Naive&&Street Smarts)', 'Is name a fast learner?', '^Would name survive a week on a desert island? (Survival Skills)', 'Do you think name has a high IQ? (Academic)', '^Would name notice if you were upset? (Emotionally Intelligent)', '^Does name think outside the box? (Unorthodox&&Conventional)', 'Would name give good advice? (Wisdom)', 'Would name do well in a game of Trivia?'),
(4, 'Style', 'Is name stylish?', 'Is name''s clothing coordinated? (Chic)', '^Does name look nerdy? (Nerdy)', '^Is name a hipster? (Hipster)', '^Does name dress for success? (Professional)', '^Would name wear a sweater vest or a cardigan? (Preppy)', '^Would name wear a snapback? (Street)', 'Does name dress well?', '^Does name dress for comfort? (Casual)', 'Is name fashionable?'),
(5, 'Promiscuity', 'Does name have a lot of exes?', 'Would name sext? (Sexter)', 'Would name have sex on a first date? (Down)', 'Would you want name as your wingman? (Wingman)', 'Is name likely to get rejected by a romantic interest?', '^Would name flirt with a police officer to get out of a ticket? (Flirty)', '^Does name have high romantic standards?(High Standards)', '*Would name wait until marriage to have sex? (Traditional&&Down)', '*Does name have a lack a romance in their life? (Forever Alone)', '^Is name romantic?(Romantic)'),
(6, 'Humor', 'Can name make you laugh?', '^Does name make racist or sexist  jokes? (Politically Incorrect)', '^Does name make fun of others?(Mean)', '^Would name make a pun? (Witty)', '^Would name make a fart joke? (Vulgar)', '^Is name goofy? (Goofy)', '^Does name do good impersonations? (Impersonator)', 'Is name sarcastic? (Sarcastic)', 'Does name do funny things?', 'Can name make you laugh?'),
(7, 'Confidence', 'Is name confident?', 'Does name take charge in a group? (Leader)', '*Is name preoccupied about self image? (Insecure&&Self Assured)', 'Is name full of themelves? (Arrogant)', 'Could you peer pressure name?', 'Could you peer pressure name?', 'Is name assertive?', 'Is name confident?', 'Is name confident?', 'Is name confident?'),
(8, 'Fun', 'Do you enjoy hanging out with name?', '^Is name excited to try new things? (Adventurous)', 'Would you hang out with name on a Friday night? ', '^Does name love to party? (Party Animal)', '*Is name serious all the time? (Boring)', 'Does name like to play pranks?(Prankster)', 'Would you roadtrip with name?', '*Does name complain a lot?(Boring)', '^Does name prefer to stay in on a Friday night?(Homebody)*', 'Is name rowdy? (Hyped)'),
(9, 'Kindness', 'Would name help an old lady cross the road? ', '*Would name make fun of friends behind their backs? (Rude)', 'Would name volunteer at a relief shelter? (Generous)', 'Would name tutor you if you needed help? (Helpful)', '*Would name bully someone?(Bully)', 'Does name relate well to others? (Compassionate)', 'Does name treat everyone with respect?(Respectful)', 'Is name polite to waiters?', 'Is name kind?', 'Is name kind?'),
(10, 'Honesty', 'Is name honest?', 'Would name tell you if your outfit was ugly? (Blunt)', 'Would you trust name with a secret? (Trustworthy)', '*Would name cheat on a significant other? (Infidelity) ', 'Would name return a lost wallet?', '*Would name pretend to be sick to get out of work? (Liar)', '*Would name lie on a resume? (Cheater)', '*Would name take credit for someone else''s work? (Cheater)', 'Is name secretive? (Secretive)', '*Does name manipulate people? (Manipulative) '),
(11, 'Reliability', 'Is name dependable?', 'Would name have your back in a fight? (Loyal)', 'Does name take responsibility for mistakes? (Responsible)', 'Would name support you when you needed it? (Supportive)', 'Would you hire name to work for you?', 'Would name care for a sick friend? (Supportive)', 'Would name care for a sick friend? (Supportive)', '*Is name often late?(Tardy)', 'Is name reliable?', 'Is name dependable?'),
(12, 'Happiness', 'Is name happy?', 'Does name have the right relationship status? (Romantically satisfied&&Romantically Unsatisfied)', 'Does name have the right relationship status? (Romantically satisfied&&Romantically Unsatisfied)', '*Is name depressed?(Depressed)', '*Is name lonely? (Lonely)', 'Is name in the right school or career?(Good Career&&Bad Career)', 'Is name in the right school or career?(Good Career)', '*Is name stressed often?', 'Is name happy?', 'Does smile often?'),
(13, 'Ambition', 'Does name have big aspirations?', 'Is name motivated?(Motivated&&Unmotivated)', 'Could name start their own business?', '*Is name lazy?(Lazy)', 'Does name complete New Year''s resolutions?', 'Does name work hard to complete their goals? (Industrious&&Complacent)', '*Is name lazy?(Lazy)', 'Could name start their own business?', 'Is name determined?', 'Does name have a strong desire for success?'),
(14, 'Humility', 'Is name humble?', '*Would name date someone based on appearance? (Vain)', '*Does name exaggerate about things? (Showoff)', '*Does name brag about themselves? (Showoff)', '*Does name take a lot of selfies? ', '*Does name take a lot of selfies? ', '*Does name like to be the center of attention? (Narcissistic)', '*Would name date someone based on appearance? (Vain)', 'Is name humble?', 'Is name humble?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
