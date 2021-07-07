-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2021 at 06:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimonial_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `blood` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `number1` varchar(20) NOT NULL,
  `number2` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `propic` varchar(100) NOT NULL,
  `joinning_date` date NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `email` (`email`),
  KEY `blood` (`blood`),
  KEY `id` (`aid`),
  KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`aid`, `fname`, `mname`, `lname`, `uname`, `dob`, `blood`, `gender`, `email`, `number1`, `number2`, `password`, `propic`, `joinning_date`) VALUES
(1, 'admin first', '', 'admin last', 'admin', '1995-01-11', 3, 2, 'jalaluddin_csse14@yahoo.com', '016', '015', 'admin', 'propic/admin.jpg', '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood`
--

DROP TABLE IF EXISTS `tbl_blood`;
CREATE TABLE IF NOT EXISTS `tbl_blood` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgroup` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bgroup` (`bgroup`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blood`
--

INSERT INTO `tbl_blood` (`id`, `bgroup`) VALUES
(1, 'A+'),
(2, 'A-'),
(7, 'AB+'),
(8, 'AB-'),
(5, 'B+'),
(6, 'B-'),
(3, 'O+'),
(4, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complexion`
--

DROP TABLE IF EXISTS `tbl_complexion`;
CREATE TABLE IF NOT EXISTS `tbl_complexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complexion`
--

INSERT INTO `tbl_complexion` (`id`, `type`) VALUES
(4, 'Black'),
(5, 'Caucasian'),
(3, 'Dusty'),
(2, 'Fair'),
(1, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_degree`
--

DROP TABLE IF EXISTS `tbl_degree`;
CREATE TABLE IF NOT EXISTS `tbl_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `degree` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `degree` (`degree`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_degree`
--

INSERT INTO `tbl_degree` (`id`, `degree`) VALUES
(8, 'B. Pharm'),
(3, 'Bachelor'),
(7, 'Diploma'),
(2, 'H.S.C'),
(5, 'Masters'),
(6, 'Ph.D'),
(1, 'S.S.C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `division` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`),
  KEY `division` (`division`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `name`, `division`) VALUES
(1, 'Gazipur', 1),
(2, 'Tangail', 1),
(4, 'Pabna', 2),
(5, 'Natore', 2),
(6, 'Dhaka', 1),
(7, 'Faridpur', 1),
(8, 'Gopalganj', 1),
(9, 'Narayang0nj', 1),
(10, 'Bogra', 2),
(11, 'Rajshahi', 2),
(12, 'Pirojpur', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

DROP TABLE IF EXISTS `tbl_division`;
CREATE TABLE IF NOT EXISTS `tbl_division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`id`, `name`) VALUES
(4, 'Barishal'),
(6, 'Chittagang'),
(1, 'Dhaka'),
(3, 'Khulna'),
(2, 'Rajshahi'),
(7, 'Shobuj er bari'),
(5, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

DROP TABLE IF EXISTS `tbl_education`;
CREATE TABLE IF NOT EXISTS `tbl_education` (
  `uid` int(11) NOT NULL,
  `degree` int(11) NOT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `field` varchar(50) NOT NULL,
  `passing_year` date DEFAULT NULL,
  UNIQUE KEY `user_id` (`uid`),
  KEY `user_id_2` (`uid`),
  KEY `degree` (`degree`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`uid`, `degree`, `institution`, `field`, `passing_year`) VALUES
(1, 3, '', '', '0000-00-00'),
(2, 1, 'IUB', 'asdf', '2017-12-01'),
(3, 2, 'Tamirul millat', 'Arts', '2017-12-01'),
(4, 3, NULL, 'CSSE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family`
--

DROP TABLE IF EXISTS `tbl_family`;
CREATE TABLE IF NOT EXISTS `tbl_family` (
  `uid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `father_name` varchar(25) NOT NULL,
  `father_occupation` varchar(20) DEFAULT NULL,
  `father_income` int(11) DEFAULT NULL,
  `mother_name` varchar(25) NOT NULL,
  `mother_occupation` varchar(20) DEFAULT NULL,
  `mother_income` int(11) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `siblings` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`uid`),
  KEY `user_id_2` (`uid`),
  KEY `type_2` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_family`
--

INSERT INTO `tbl_family` (`uid`, `type`, `father_name`, `father_occupation`, `father_income`, `mother_name`, `mother_occupation`, `mother_income`, `contact`, `siblings`) VALUES
(1, 3, 'Fahter', '', 0, '', '', 0, '', 0),
(2, 1, 'name', 'job', 100, 'name', 'occ', 10, '02', 2),
(3, 1, 'fat', 'focc', 500, 'mot', 'mocc', 500, '03', 2),
(4, 3, 'Father', 'Teacher', NULL, 'Mother', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_family_type`
--

DROP TABLE IF EXISTS `tbl_family_type`;
CREATE TABLE IF NOT EXISTS `tbl_family_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_family_type`
--

INSERT INTO `tbl_family_type` (`id`, `type`) VALUES
(3, 'Extended'),
(1, 'Join'),
(4, 'N/A'),
(2, 'Seperate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite`
--

DROP TABLE IF EXISTS `tbl_favorite`;
CREATE TABLE IF NOT EXISTS `tbl_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `favorite_user` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`uid`),
  KEY `favorite_user` (`favorite_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_favorite`
--

INSERT INTO `tbl_favorite` (`id`, `uid`, `favorite_user`, `date`) VALUES
(2, 3, 2, '2017-12-18'),
(5, 4, 5, '2017-12-19'),
(6, 7, 3, '2017-12-19'),
(7, 10, 5, '2017-12-23'),
(8, 16, 3, '2018-05-05'),
(9, 1, 2, '2018-05-11'),
(10, 7, 5, '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend`
--

DROP TABLE IF EXISTS `tbl_friend`;
CREATE TABLE IF NOT EXISTS `tbl_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id1` (`sender`),
  KEY `user_id2` (`send_to`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_friend`
--

INSERT INTO `tbl_friend` (`id`, `sender`, `send_to`, `date`) VALUES
(12, 2, 5, '2017-12-19'),
(20, 2, 9, '2018-03-04'),
(24, 1, 12, '2018-05-02'),
(25, 14, 9, '2018-05-03'),
(26, 3, 2, '2018-05-05'),
(29, 7, 1, '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend_req`
--

DROP TABLE IF EXISTS `tbl_friend_req`;
CREATE TABLE IF NOT EXISTS `tbl_friend_req` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`),
  KEY `send_to` (`send_to`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_friend_req`
--

INSERT INTO `tbl_friend_req` (`id`, `sender`, `send_to`, `date`) VALUES
(13, 16, 4, '2018-05-05'),
(15, 3, 14, '2018-05-05'),
(16, 5, 4, '2018-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

DROP TABLE IF EXISTS `tbl_gender`;
CREATE TABLE IF NOT EXISTS `tbl_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gender` (`gender`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id`, `gender`) VALUES
(2, 'Female'),
(1, 'Male'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hobby`
--

DROP TABLE IF EXISTS `tbl_hobby`;
CREATE TABLE IF NOT EXISTS `tbl_hobby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hobby`
--

INSERT INTO `tbl_hobby` (`id`, `name`) VALUES
(6, 'Collecting bank notes'),
(2, 'Drawing'),
(1, 'Fishing'),
(7, 'Gaming'),
(5, 'Gardenning'),
(4, 'Hunting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interest`
--

DROP TABLE IF EXISTS `tbl_interest`;
CREATE TABLE IF NOT EXISTS `tbl_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_interest`
--

INSERT INTO `tbl_interest` (`id`, `name`) VALUES
(1, 'astronomy'),
(2, 'Shopping'),
(5, 'Sleeping'),
(3, 'Theatre'),
(4, 'Traveling');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

DROP TABLE IF EXISTS `tbl_job`;
CREATE TABLE IF NOT EXISTS `tbl_job` (
  `uid` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `joinning_date` date DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  UNIQUE KEY `user_id` (`uid`),
  KEY `user_id_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`uid`, `designation`, `company`, `joinning_date`, `annual_income`) VALUES
(1, '', '', '0000-00-00', NULL),
(2, 'CEO', 'Simplex hub', '2016-12-01', 30000000),
(3, 'Intern', 'AIUB', '2017-12-01', 130),
(4, 'Jr. SE', NULL, '2018-05-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `uid` int(11) NOT NULL,
  `is_logged` int(11) NOT NULL,
  UNIQUE KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`uid`, `is_logged`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marital_status`
--

DROP TABLE IF EXISTS `tbl_marital_status`;
CREATE TABLE IF NOT EXISTS `tbl_marital_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status` (`status`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marital_status`
--

INSERT INTO `tbl_marital_status` (`id`, `status`) VALUES
(2, 'Married'),
(1, 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

DROP TABLE IF EXISTS `tbl_message`;
CREATE TABLE IF NOT EXISTS `tbl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `message` text NOT NULL,
  `is_seen` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`),
  KEY `send_to` (`send_to`)
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `sender`, `send_to`, `time`, `message`, `is_seen`) VALUES
(1, 3, 5, '2017-12-19 08:07:16', 'adsf', 1),
(2, 3, 5, '2017-12-19 08:13:38', 'adsf', 1),
(3, 5, 2, '2017-12-19 08:35:38', 'hi', 1),
(4, 2, 5, '2017-12-19 08:36:17', 'hlw', 1),
(5, 5, 2, '2017-12-19 08:37:46', 'how are you?', 1),
(6, 2, 5, '2017-12-19 08:41:33', 'you know what?', 1),
(7, 5, 2, '2017-12-19 08:47:27', 'what?', 1),
(8, 2, 5, '2017-12-19 08:47:44', 'this is a test app?', 1),
(9, 5, 2, '2017-12-19 08:47:58', 'really?\r\n', 1),
(10, 5, 2, '2017-12-19 08:48:08', 'that is great', 1),
(11, 7, 1, '2017-12-19 09:09:41', 'hey tushar', 1),
(13, 1, 7, '2017-12-19 08:12:30', 'hlw masud', 1),
(14, 1, 7, '2017-12-19 08:12:58', 'how is going ?', 1),
(15, 7, 1, '2017-12-19 08:12:06', 'i m f9', 1),
(16, 7, 1, '2017-12-19 08:12:17', 'what about you?', 1),
(17, 1, 7, '2017-12-19 08:12:21', 'mee too', 1),
(18, 2, 3, '2017-12-19 09:12:35', 'hlw siam', 1),
(104, 4, 2, '2017-12-23 09:12:55', 'hey', 1),
(105, 2, 4, '2017-12-23 09:12:36', 'hlw', 1),
(106, 4, 2, '2017-12-23 09:12:46', 'what?', 1),
(107, 2, 4, '2017-12-23 09:12:50', 'is not working', 1),
(108, 4, 2, '2017-12-23 09:12:00', 'why?', 1),
(109, 2, 4, '2017-12-23 10:12:10', 'try again', 1),
(110, 2, 4, '2017-12-23 10:12:21', 'untill it works', 1),
(111, 1, 7, '2017-12-31 12:12:31', 'hlw masud', 1),
(112, 7, 1, '2017-12-31 12:12:32', 'hey', 1),
(147, 1, 7, '2018-01-02 09:01:53', '0', 1),
(148, 7, 1, '2018-01-02 09:01:59', '1', 1),
(149, 7, 1, '2018-01-02 10:01:42', '?', 1),
(150, 1, 7, '2018-01-02 10:01:01', 'hlw', 1),
(151, 7, 1, '2018-01-02 10:01:19', 'hi', 1),
(152, 1, 7, '2018-01-02 10:01:08', 'bainchod', 1),
(153, 7, 1, '2018-01-02 10:01:19', '.', 1),
(154, 7, 1, '2018-01-02 10:01:25', 'kjp', 1),
(155, 1, 7, '2018-01-02 10:01:51', 'asdf', 1),
(156, 1, 7, '2018-01-02 10:01:14', 'hlw masud', 1),
(157, 1, 7, '2018-01-03 01:01:00', 'kire?', 1),
(158, 7, 1, '2018-01-03 01:01:05', 'hm', 1),
(159, 1, 7, '2018-01-03 11:01:50', 'adil', 1),
(160, 7, 1, '2018-01-03 11:01:56', 'yup', 1),
(161, 1, 2, '2018-01-03 03:01:41', '?', 1),
(162, 2, 1, '2018-01-03 03:01:07', '?', 1),
(163, 7, 1, '2018-01-15 05:01:37', 'a', 1),
(164, 1, 7, '2018-01-15 05:01:46', 'b', 1),
(165, 1, 2, '2018-04-19 04:04:56', 'ki obostha?', 1),
(166, 1, 2, '2018-05-02 09:05:05', 'kire?', 1),
(167, 14, 9, '2018-05-03 04:05:22', 'ei chutia', 1),
(168, 9, 14, '2018-05-03 04:05:37', 'kire?', 1),
(169, 9, 14, '2018-05-03 04:05:46', 'ki obostha?', 1),
(170, 14, 9, '2018-05-03 04:05:54', 'madarchod', 1),
(171, 9, 2, '2018-05-03 04:05:20', 'hlw', 1),
(172, 3, 7, '2018-05-05 00:45:27', 'asdf', 1),
(173, 3, 7, '2018-05-05 00:50:57', 'hey', 1),
(174, 3, 7, '2018-05-05 00:54:29', 'hlw', 1),
(175, 7, 3, '2018-05-05 00:55:16', 'ki obostha?', 1),
(176, 3, 7, '2018-05-05 01:40:47', 'asdf', 1),
(177, 3, 7, '2018-05-05 01:41:50', 'asdf', 1),
(178, 3, 7, '2018-05-05 01:45:07', 'check', 1),
(179, 7, 3, '2018-05-05 01:46:38', 'ki hoise?', 1),
(180, 7, 3, '2018-05-05 01:59:57', 'a', 1),
(181, 7, 3, '2018-05-05 02:01:32', 'a', 1),
(182, 3, 7, '2018-05-05 02:02:08', 'check chekc', 1),
(183, 7, 3, '2018-05-05 02:06:53', 'a', 1),
(184, 7, 3, '2018-05-05 02:08:42', 'b', 1),
(185, 3, 7, '2018-05-05 02:11:06', 'check chekc', 1),
(186, 7, 3, '2018-05-05 02:12:52', 'z', 1),
(187, 7, 3, '2018-05-05 02:13:02', 'a', 1),
(188, 3, 7, '2018-05-05 02:13:14', '1', 1),
(189, 3, 7, '2018-05-05 02:13:20', '2', 1),
(190, 7, 3, '2018-05-05 02:47:10', 'hoise?', 1),
(191, 3, 7, '2018-05-05 02:47:25', 'bujhtesi na', 1),
(192, 3, 7, '2018-05-05 02:47:33', 'mone hosse', 1),
(193, 7, 3, '2018-05-05 02:48:33', 'hosse na', 1),
(194, 7, 3, '2018-05-05 02:50:38', 'scroll e jhamela', 1),
(195, 3, 7, '2018-05-05 02:50:49', 'sure?', 1),
(196, 7, 3, '2018-05-05 02:53:27', 'sure', 1),
(197, 3, 7, '2018-05-05 02:54:13', 'let me check', 1),
(198, 3, 7, '2018-05-05 02:54:56', 'what about now?', 1),
(199, 7, 3, '2018-05-05 02:55:09', 'yup, it\'s working', 1),
(200, 7, 3, '2018-05-05 02:56:17', 'there is another problem', 1),
(201, 2, 3, '2018-05-05 09:15:48', 'hi', 1),
(202, 3, 2, '2018-05-05 09:16:00', 'ki obostha?', 1),
(203, 2, 3, '2018-05-05 09:16:12', 'eito', 1),
(204, 3, 2, '2018-05-06 02:30:51', 'oiasdhfoih', 1),
(205, 2, 5, '2018-05-06 03:05:29', 'hlw', 1),
(206, 5, 2, '2018-05-06 03:05:47', 'hi', 1),
(207, 2, 5, '2018-05-06 03:05:48', '', 1),
(208, 2, 5, '2018-05-06 03:05:51', '', 1),
(209, 2, 5, '2018-05-06 03:05:52', '', 1),
(210, 2, 5, '2018-05-06 03:05:08', 'asdf', 1),
(211, 2, 5, '2018-05-06 03:05:26', '', 1),
(212, 2, 5, '2018-05-06 03:05:12', '', 1),
(213, 2, 5, '2018-05-06 03:05:12', '', 1),
(214, 7, 1, '2018-05-09 09:05:24', 'hlw', 1),
(215, 1, 7, '2018-05-09 09:05:37', 'blw', 1),
(216, 1, 7, '2018-05-09 09:05:49', '?', 1),
(217, 7, 1, '2018-05-09 09:05:38', '?', 1),
(218, 7, 1, '2018-05-09 09:05:00', '.', 1),
(219, 7, 1, '2018-05-09 09:05:31', 'check', 1),
(220, 7, 1, '2018-05-09 09:05:52', 'again', 1),
(221, 7, 1, '2018-05-09 09:05:05', '', 1),
(222, 7, 1, '2018-05-09 09:05:13', 'and', 1),
(223, 1, 7, '2018-05-09 09:05:23', 'hoise?', 1),
(224, 7, 1, '2018-05-09 09:05:15', 'mone hosse', 1),
(225, 1, 7, '2018-05-09 09:05:23', 'hoise to', 1),
(226, 1, 7, '2018-05-09 09:05:43', 'but still there are some problem', 1),
(227, 5, 1, '2018-05-11 09:05:47', 'hi', 1),
(228, 1, 5, '2018-05-11 09:05:57', 'hlw', 1),
(229, 1, 12, '2018-05-11 11:05:32', 'hey shabuz', 1),
(230, 7, 1, '2018-06-06 23:18:10', 'hlw', 1),
(231, 1, 7, '2018-06-06 23:18:15', 'hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_music`
--

DROP TABLE IF EXISTS `tbl_music`;
CREATE TABLE IF NOT EXISTS `tbl_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_music`
--

INSERT INTO `tbl_music` (`id`, `name`) VALUES
(2, 'Band'),
(1, 'Classic'),
(3, 'Folk'),
(4, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_token`
--

DROP TABLE IF EXISTS `tbl_password_token`;
CREATE TABLE IF NOT EXISTS `tbl_password_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_password_token`
--

INSERT INTO `tbl_password_token` (`id`, `email`, `token`, `verified`) VALUES
(1, 'jalaluddin_csse14@yahoo.com', 'e591bc4aced695834490d0254974685d0d2a79aa', 1),
(2, 'jalaluddin_csse14@yahoo.com', '4fba2d6505249f99ca3a5cb5fc72a8164a1fcac4', 0),
(3, 'jalaluddin_csse14@yahoo.com', '2d8bec05e1c186446fb7b7680c47c38f15e4fa7f', 1),
(4, 'jalaluddin_csse14@yahoo.com', '916b9f5215bcb4b8182ae07a65f559a41979e690', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_per_address`
--

DROP TABLE IF EXISTS `tbl_per_address`;
CREATE TABLE IF NOT EXISTS `tbl_per_address` (
  `per_uid` int(11) NOT NULL,
  `per_house` varchar(20) DEFAULT NULL,
  `per_road` varchar(20) DEFAULT NULL,
  `per_area` varchar(30) DEFAULT NULL,
  `per_police_station` int(11) DEFAULT NULL,
  UNIQUE KEY `per_user_id` (`per_uid`),
  KEY `per_user_id_2` (`per_uid`),
  KEY `per_police_station` (`per_police_station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_per_address`
--

INSERT INTO `tbl_per_address` (`per_uid`, `per_house`, `per_road`, `per_area`, `per_police_station`) VALUES
(1, '21', '02', 'Nikunja-2', 6),
(2, '30', '2', 'Khilkhet', 1),
(3, '2', '02', 'Takshal', NULL),
(4, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_police_station`
--

DROP TABLE IF EXISTS `tbl_police_station`;
CREATE TABLE IF NOT EXISTS `tbl_police_station` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`),
  KEY `district` (`district`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_police_station`
--

INSERT INTO `tbl_police_station` (`id`, `name`, `district`) VALUES
(1, 'Faridpur', 4),
(2, 'Gazipur sadar', 1),
(5, 'Pabna', 4),
(6, 'Khilkhet', 6),
(7, 'Chatmohor', 4),
(8, 'Natore', 11),
(9, 'Sherpur', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pr_address`
--

DROP TABLE IF EXISTS `tbl_pr_address`;
CREATE TABLE IF NOT EXISTS `tbl_pr_address` (
  `pr_uid` int(11) NOT NULL,
  `pr_house` varchar(10) DEFAULT NULL,
  `pr_road` varchar(10) DEFAULT NULL,
  `pr_area` varchar(30) DEFAULT NULL,
  `pr_police_station` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`pr_uid`),
  KEY `user_id_2` (`pr_uid`),
  KEY `police_station` (`pr_police_station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr_address`
--

INSERT INTO `tbl_pr_address` (`pr_uid`, `pr_house`, `pr_road`, `pr_area`, `pr_police_station`) VALUES
(1, '', '', '', 6),
(2, '20', '1', 'Banani', 2),
(3, '21', '0', '1924', 1),
(4, NULL, NULL, NULL, 6),
(10, 'w', 'w', 'w', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_req`
--

DROP TABLE IF EXISTS `tbl_registration_req`;
CREATE TABLE IF NOT EXISTS `tbl_registration_req` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `blood` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `religion` int(11) NOT NULL,
  `number1` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_token`
--

DROP TABLE IF EXISTS `tbl_registration_token`;
CREATE TABLE IF NOT EXISTS `tbl_registration_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration_token`
--

INSERT INTO `tbl_registration_token` (`id`, `email`, `token`, `verified`) VALUES
(9, 'jalaluddin_csse14@yahoo.com', '2dcab3e2ad349eace8daabf609f334efa325bd26', 1),
(10, 'jalaluddin_csse14@yahoo.com', '45f072da1a7b861f8404a2ff51203073f33ad552', 1),
(11, 'jalaluddin_csse14@yahoo.com', 'e899e5d830134e8844edea70007f6314d2d3e5e6', 0),
(12, 'jalaluddin_csse14@yahoo.com', 'd17b589c34cdf7b1bb5144253114c2ae799513fe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion`
--

DROP TABLE IF EXISTS `tbl_religion`;
CREATE TABLE IF NOT EXISTS `tbl_religion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_religion`
--

INSERT INTO `tbl_religion` (`id`, `name`) VALUES
(2, 'Hindu'),
(1, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_search`
--

DROP TABLE IF EXISTS `tbl_search`;
CREATE TABLE IF NOT EXISTS `tbl_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `min_height` int(11) DEFAULT NULL,
  `max_height` int(11) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_search`
--

INSERT INTO `tbl_search` (`id`, `uid`, `min_age`, `max_age`, `min_height`, `max_height`, `religion`, `gender`) VALUES
(22, 2, NULL, NULL, NULL, NULL, NULL, 1),
(23, 2, NULL, NULL, NULL, NULL, 2, 1),
(24, 2, 18, 24, NULL, NULL, NULL, NULL),
(25, 2, NULL, NULL, 4, 6, NULL, NULL),
(26, 2, 20, 40, NULL, NULL, NULL, NULL),
(27, 2, 18, 19, NULL, NULL, NULL, NULL),
(28, 2, 18, 28, NULL, NULL, NULL, NULL),
(29, 2, NULL, NULL, NULL, NULL, NULL, 2),
(30, 2, NULL, NULL, NULL, NULL, 2, NULL),
(31, 1, 18, 30, NULL, NULL, 1, 2),
(32, 1, 18, 33, NULL, NULL, 2, 2),
(33, 1, 18, 33, NULL, NULL, 1, 1),
(34, 1, 18, 33, NULL, NULL, 1, 2),
(35, 1, 18, 33, NULL, NULL, 2, 2),
(36, 7, 18, 24, NULL, NULL, 1, 2),
(37, 4, 18, 33, NULL, NULL, 1, 1),
(38, 4, 23, 33, NULL, NULL, 1, 1),
(39, 4, 23, 24, NULL, NULL, 1, 1),
(40, 4, 23, 24, NULL, NULL, 1, 1),
(41, 4, 23, 24, NULL, NULL, 1, 1),
(42, 4, 18, 24, NULL, NULL, 1, 1),
(43, 4, 23, 24, NULL, NULL, 1, 1),
(44, 4, 23, 24, NULL, NULL, 1, 1),
(45, 4, 23, 24, NULL, NULL, 1, 1),
(46, 1, 18, 22, NULL, NULL, NULL, NULL),
(47, 1, 18, 24, NULL, NULL, NULL, NULL),
(48, 1, NULL, NULL, NULL, NULL, NULL, 2),
(49, 1, NULL, NULL, NULL, NULL, NULL, 2),
(50, 1, NULL, NULL, NULL, NULL, NULL, 1),
(51, 1, NULL, NULL, NULL, NULL, NULL, 2),
(52, 1, 18, 24, NULL, NULL, 1, 1),
(53, 1, 18, 24, NULL, NULL, 1, 2),
(54, 1, 18, 27, NULL, NULL, 1, 2),
(55, 1, 18, 27, NULL, NULL, 1, 1),
(56, 16, 18, 24, NULL, NULL, 1, 2),
(57, 3, 18, 24, NULL, NULL, 1, 1),
(58, 14, 24, 28, NULL, NULL, NULL, NULL),
(59, 14, NULL, NULL, NULL, NULL, 1, NULL),
(60, 1, 24, 28, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports`
--

DROP TABLE IF EXISTS `tbl_sports`;
CREATE TABLE IF NOT EXISTS `tbl_sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sports`
--

INSERT INTO `tbl_sports` (`id`, `name`) VALUES
(3, 'Badminton'),
(1, 'cricket'),
(2, 'Football'),
(4, 'Soccer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `blood` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number1` varchar(20) NOT NULL,
  `number2` varchar(20) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `propic` varchar(50) NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `complexion` int(11) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `bio` text,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`),
  KEY `blood` (`blood`),
  KEY `id` (`uid`),
  KEY `marital_status` (`marital_status`),
  KEY `religion` (`religion`),
  KEY `complexion` (`complexion`),
  KEY `gender` (`gender`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `fname`, `mname`, `lname`, `uname`, `dob`, `blood`, `gender`, `email`, `number1`, `number2`, `password`, `propic`, `height`, `weight`, `complexion`, `religion`, `marital_status`, `children`, `annual_income`, `bio`, `last_login`) VALUES
(1, 'mushfiqur', '', 'tushar', 'user', '1995-02-01', 1, 1, 'xfx@gmail.com', '02222222222', '', 'user', 'propic/user.png', 5.6, 70, 2, 1, 2, 0, 0, '', '2018-05-11 12:10:14'),
(2, 'userf', 'userm', 'userl', 'u', '1990-01-02', 1, 1, 'user@mail.com', '0155', '0122', 'u', 'propic/u.jpg', 4, 55, 2, 1, 1, 2, 300000000, 'nothing', '2018-05-08 07:15:38'),
(3, 'Siam', 'Hasan', 'Evan', 'a', '1995-12-05', 1, 2, 'siam@gmail.com', '11111111111', NULL, 'a', 'propic/a.png', 6, 70, 2, 1, 1, 900, 1300, '', '2018-05-05 03:36:27'),
(4, 'Siam', 'Hasan', 'Evan', 'vv', '2001-12-18', 1, 1, 'siamhasan05@gmail.com', '03333333333', NULL, '0000', 'propic/vv.jpg', NULL, 60, 4, 1, 1, NULL, NULL, NULL, '2017-12-23 09:12:28'),
(5, 'Ashik', 'Mahmud', 'Ashik', 'ashik', '1994-12-30', 1, 1, 'abc@gmail.com', '12345678', NULL, '1234', 'propic/ashik.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2018-05-11 09:05:23'),
(7, 'masud', '', 'rana', 'masud', '1990-01-01', 3, 1, 'masud@gmail.com', '0111111', NULL, 'masud', 'propic/masud.png', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2018-05-11 12:09:50'),
(9, 'jalal', 'middle', 'uddin', 'aser', '2017-12-07', 3, 3, 'jalaluddin_csse14@yahoo.com', 'asdf', NULL, '1234', 'defaultpic/user.png', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2018-05-03 04:06:02'),
(10, '1', 'd', 'adminlast', 'dwd', '2017-12-11', 1, 1, 'ddd', 'ddd', NULL, '12', 'defaultpic/user.png', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2017-12-23 11:12:52'),
(12, 'shabuz', 'mohammad', 'badsha', 'shabuz', '1991-10-20', 3, 3, 'shabuz@gmail.com', '01444444444', NULL, 'shabuz', 'propic/shabuz.png', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2018-05-11 11:53:18'),
(14, 'pepe', 'charlie', 'sylvia', 'pepe sylvia', '1999-01-01', 1, 1, 'pepe@yahoo.com', '05555555555', NULL, '11', 'propic/pepe sylvia.jpg', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2018-05-09 05:05:09'),
(15, 'Anna', NULL, 'eve', 'eve', '1991-05-09', 7, 2, 'eve@mail.com', '54855844484', NULL, 'eve', 'defaultpic/user.png', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL),
(16, 'thor', 'hammer', 'asgard', 'odinson1', '1992-05-01', 1, 1, 'odinson1@gmail.com', '06666666666', NULL, '1', 'propic/odinson1.jpg', NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_hobby`
--

DROP TABLE IF EXISTS `tbl_user_hobby`;
CREATE TABLE IF NOT EXISTS `tbl_user_hobby` (
  `uid` int(11) NOT NULL,
  `hobby` int(11) NOT NULL,
  KEY `user_id` (`uid`),
  KEY `hobby` (`hobby`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_hobby`
--

INSERT INTO `tbl_user_hobby` (`uid`, `hobby`) VALUES
(2, 2),
(2, 1),
(10, 2),
(10, 1),
(10, 5),
(10, 4),
(16, 6),
(4, 4),
(3, 6),
(3, 2),
(3, 1),
(14, 4),
(1, 6),
(1, 1),
(1, 7),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_interest`
--

DROP TABLE IF EXISTS `tbl_user_interest`;
CREATE TABLE IF NOT EXISTS `tbl_user_interest` (
  `uid` int(11) NOT NULL,
  `interest` int(11) NOT NULL,
  KEY `user_id` (`uid`),
  KEY `interest` (`interest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_interest`
--

INSERT INTO `tbl_user_interest` (`uid`, `interest`) VALUES
(2, 1),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(16, 1),
(16, 4),
(4, 1),
(3, 1),
(3, 2),
(14, 4),
(1, 1),
(1, 5),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_music`
--

DROP TABLE IF EXISTS `tbl_user_music`;
CREATE TABLE IF NOT EXISTS `tbl_user_music` (
  `uid` int(11) NOT NULL,
  `music` int(11) NOT NULL,
  KEY `user_id` (`uid`),
  KEY `music` (`music`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_music`
--

INSERT INTO `tbl_user_music` (`uid`, `music`) VALUES
(2, 2),
(10, 2),
(10, 1),
(10, 3),
(16, 1),
(4, 1),
(3, 2),
(3, 1),
(14, 2),
(14, 4),
(1, 2),
(1, 1),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sports`
--

DROP TABLE IF EXISTS `tbl_user_sports`;
CREATE TABLE IF NOT EXISTS `tbl_user_sports` (
  `uid` int(11) NOT NULL,
  `sport` int(11) NOT NULL,
  KEY `user_id` (`uid`),
  KEY `sport` (`sport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_sports`
--

INSERT INTO `tbl_user_sports` (`uid`, `sport`) VALUES
(2, 2),
(10, 3),
(10, 1),
(10, 2),
(16, 3),
(3, 2),
(14, 1),
(14, 4),
(1, 3),
(1, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warning`
--

DROP TABLE IF EXISTS `tbl_warning`;
CREATE TABLE IF NOT EXISTS `tbl_warning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `message` text NOT NULL,
  `send_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`aid`),
  KEY `user_id` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_admin_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_admin_details`;
CREATE TABLE IF NOT EXISTS `view_admin_details` (
`aid` int(11)
,`fname` varchar(30)
,`mname` varchar(30)
,`lname` varchar(30)
,`uname` varchar(30)
,`dob` date
,`blood` int(11)
,`gender` int(11)
,`email` varchar(40)
,`number1` varchar(20)
,`number2` varchar(20)
,`password` varchar(30)
,`propic` varchar(100)
,`joinning_date` date
,`age` bigint(21)
,`job_in_month` bigint(21)
,`bgroup` varchar(5)
,`gender_name` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_admin_info`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_admin_info`;
CREATE TABLE IF NOT EXISTS `view_admin_info` (
`aid` int(11)
,`fname` varchar(30)
,`mname` varchar(30)
,`lname` varchar(30)
,`uname` varchar(30)
,`dob` date
,`blood` int(11)
,`gender` int(11)
,`email` varchar(40)
,`number1` varchar(20)
,`number2` varchar(20)
,`password` varchar(30)
,`propic` varchar(100)
,`joinning_date` date
,`bgroup` varchar(5)
,`gender_name` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_family_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_family_details`;
CREATE TABLE IF NOT EXISTS `view_family_details` (
`uid` int(11)
,`type` int(11)
,`father_name` varchar(25)
,`father_occupation` varchar(20)
,`father_income` int(11)
,`mother_name` varchar(25)
,`mother_occupation` varchar(20)
,`mother_income` int(11)
,`contact` varchar(20)
,`siblings` int(11)
,`family_type` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_max_age`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_max_age`;
CREATE TABLE IF NOT EXISTS `view_max_age` (
`id` int(11)
,`uid` int(11)
,`min_age` int(11)
,`max_age` int(11)
,`min_height` int(11)
,`max_height` int(11)
,`religion` int(11)
,`gender` int(11)
,`counter` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_max_height`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_max_height`;
CREATE TABLE IF NOT EXISTS `view_max_height` (
`id` int(11)
,`uid` int(11)
,`min_age` int(11)
,`max_age` int(11)
,`min_height` int(11)
,`max_height` int(11)
,`religion` int(11)
,`gender` int(11)
,`counter` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_min_age`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_min_age`;
CREATE TABLE IF NOT EXISTS `view_min_age` (
`id` int(11)
,`uid` int(11)
,`min_age` int(11)
,`max_age` int(11)
,`min_height` int(11)
,`max_height` int(11)
,`religion` int(11)
,`gender` int(11)
,`counter` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_min_height`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_min_height`;
CREATE TABLE IF NOT EXISTS `view_min_height` (
`id` int(11)
,`uid` int(11)
,`min_age` int(11)
,`max_age` int(11)
,`min_height` int(11)
,`max_height` int(11)
,`religion` int(11)
,`gender` int(11)
,`counter` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_per_address_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_per_address_details`;
CREATE TABLE IF NOT EXISTS `view_per_address_details` (
`per_uid` int(11)
,`per_house` varchar(20)
,`per_road` varchar(20)
,`per_area` varchar(30)
,`per_police_station` int(11)
,`police_station_id` int(11)
,`police_station_name` varchar(50)
,`district_id` int(11)
,`district_name` varchar(50)
,`division_id` int(11)
,`division_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_police_station_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_police_station_details`;
CREATE TABLE IF NOT EXISTS `view_police_station_details` (
`police_station_id` int(11)
,`police_station_name` varchar(50)
,`district_id` int(11)
,`district_name` varchar(50)
,`division_id` int(11)
,`division_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pr_address_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_pr_address_details`;
CREATE TABLE IF NOT EXISTS `view_pr_address_details` (
`pr_uid` int(11)
,`pr_house` varchar(10)
,`pr_road` varchar(10)
,`pr_area` varchar(30)
,`pr_police_station` int(11)
,`police_station_id` int(11)
,`police_station_name` varchar(50)
,`district_id` int(11)
,`district_name` varchar(50)
,`division_id` int(11)
,`division_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_registration`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_registration`;
CREATE TABLE IF NOT EXISTS `view_registration` (
`uid` int(11)
,`fname` varchar(30)
,`mname` varchar(30)
,`lname` varchar(30)
,`uname` varchar(30)
,`dob` date
,`blood` int(11)
,`gender` int(11)
,`email` varchar(30)
,`number1` varchar(20)
,`number2` varchar(20)
,`password` varchar(50)
,`propic` varchar(50)
,`height` float
,`weight` float
,`complexion` int(11)
,`religion` int(11)
,`marital_status` int(11)
,`children` int(11)
,`annual_income` int(11)
,`bio` text
,`age` bigint(21)
,`bgroup` varchar(5)
,`gender_name` varchar(10)
,`religion_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_registration_req`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_registration_req`;
CREATE TABLE IF NOT EXISTS `view_registration_req` (
`uid` int(11)
,`fname` varchar(30)
,`mname` varchar(30)
,`lname` varchar(30)
,`uname` varchar(30)
,`dob` date
,`blood` int(11)
,`gender` int(11)
,`email` varchar(30)
,`religion` int(11)
,`number1` varchar(20)
,`password` varchar(20)
,`age` bigint(21)
,`bgroup` varchar(5)
,`gender_name` varchar(10)
,`religion_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_details`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_details`;
CREATE TABLE IF NOT EXISTS `view_user_details` (
`uid` int(11)
,`fname` varchar(30)
,`mname` varchar(30)
,`lname` varchar(30)
,`uname` varchar(30)
,`dob` date
,`blood` int(11)
,`gender` int(11)
,`email` varchar(30)
,`number1` varchar(20)
,`number2` varchar(20)
,`password` varchar(50)
,`propic` varchar(50)
,`height` float
,`weight` float
,`complexion` int(11)
,`religion` int(11)
,`marital_status` int(11)
,`children` int(11)
,`annual_income` int(11)
,`bio` text
,`age` int(9)
,`gender_name` varchar(10)
,`religion_name` varchar(20)
,`bgroup_name` varchar(5)
,`complexion_name` varchar(20)
,`marital_status_name` varchar(50)
,`pr_house` varchar(10)
,`pr_road` varchar(10)
,`pr_area` varchar(30)
,`pr_police_station` int(11)
,`per_house` varchar(20)
,`per_road` varchar(20)
,`per_area` varchar(30)
,`per_police_station` int(11)
,`designation` varchar(20)
,`company` varchar(50)
,`joinning_date` date
,`degree` int(11)
,`institution` varchar(50)
,`field` varchar(50)
,`passing_year` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_education`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_education`;
CREATE TABLE IF NOT EXISTS `view_user_education` (
`uid` int(11)
,`degree` int(11)
,`institution` varchar(50)
,`field` varchar(50)
,`passing_year` date
,`degree_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_hobby`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_hobby`;
CREATE TABLE IF NOT EXISTS `view_user_hobby` (
`uid` int(11)
,`hobby` int(11)
,`hobby_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_interest`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_interest`;
CREATE TABLE IF NOT EXISTS `view_user_interest` (
`uid` int(11)
,`interest` int(11)
,`interest_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_music`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_music`;
CREATE TABLE IF NOT EXISTS `view_user_music` (
`uid` int(11)
,`music` int(11)
,`music_name` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_sports`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_sports`;
CREATE TABLE IF NOT EXISTS `view_user_sports` (
`uid` int(11)
,`sport` int(11)
,`sports_name` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_admin_details`
--
DROP TABLE IF EXISTS `view_admin_details`;

DROP VIEW IF EXISTS `view_admin_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_admin_details`  AS  select `tbl_admin`.`aid` AS `aid`,`tbl_admin`.`fname` AS `fname`,`tbl_admin`.`mname` AS `mname`,`tbl_admin`.`lname` AS `lname`,`tbl_admin`.`uname` AS `uname`,`tbl_admin`.`dob` AS `dob`,`tbl_admin`.`blood` AS `blood`,`tbl_admin`.`gender` AS `gender`,`tbl_admin`.`email` AS `email`,`tbl_admin`.`number1` AS `number1`,`tbl_admin`.`number2` AS `number2`,`tbl_admin`.`password` AS `password`,`tbl_admin`.`propic` AS `propic`,`tbl_admin`.`joinning_date` AS `joinning_date`,timestampdiff(YEAR,`tbl_admin`.`dob`,curdate()) AS `age`,timestampdiff(MONTH,`tbl_admin`.`joinning_date`,curdate()) AS `job_in_month`,`tbl_blood`.`bgroup` AS `bgroup`,`tbl_gender`.`gender` AS `gender_name` from ((`tbl_admin` join `tbl_blood`) join `tbl_gender`) where ((`tbl_admin`.`blood` = `tbl_blood`.`id`) and (`tbl_admin`.`gender` = `tbl_gender`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_admin_info`
--
DROP TABLE IF EXISTS `view_admin_info`;

DROP VIEW IF EXISTS `view_admin_info`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_admin_info`  AS  select `tbl_admin`.`aid` AS `aid`,`tbl_admin`.`fname` AS `fname`,`tbl_admin`.`mname` AS `mname`,`tbl_admin`.`lname` AS `lname`,`tbl_admin`.`uname` AS `uname`,`tbl_admin`.`dob` AS `dob`,`tbl_admin`.`blood` AS `blood`,`tbl_admin`.`gender` AS `gender`,`tbl_admin`.`email` AS `email`,`tbl_admin`.`number1` AS `number1`,`tbl_admin`.`number2` AS `number2`,`tbl_admin`.`password` AS `password`,`tbl_admin`.`propic` AS `propic`,`tbl_admin`.`joinning_date` AS `joinning_date`,`tbl_blood`.`bgroup` AS `bgroup`,`tbl_gender`.`gender` AS `gender_name` from ((`tbl_admin` join `tbl_blood`) join `tbl_gender`) where ((`tbl_admin`.`blood` = `tbl_blood`.`id`) and (`tbl_admin`.`gender` = `tbl_gender`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_family_details`
--
DROP TABLE IF EXISTS `view_family_details`;

DROP VIEW IF EXISTS `view_family_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_family_details`  AS  select `tbl_family`.`uid` AS `uid`,`tbl_family`.`type` AS `type`,`tbl_family`.`father_name` AS `father_name`,`tbl_family`.`father_occupation` AS `father_occupation`,`tbl_family`.`father_income` AS `father_income`,`tbl_family`.`mother_name` AS `mother_name`,`tbl_family`.`mother_occupation` AS `mother_occupation`,`tbl_family`.`mother_income` AS `mother_income`,`tbl_family`.`contact` AS `contact`,`tbl_family`.`siblings` AS `siblings`,`tbl_family_type`.`type` AS `family_type` from (`tbl_family` join `tbl_family_type`) where (`tbl_family`.`type` = `tbl_family_type`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_max_age`
--
DROP TABLE IF EXISTS `view_max_age`;

DROP VIEW IF EXISTS `view_max_age`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_max_age`  AS  select `tbl_search`.`id` AS `id`,`tbl_search`.`uid` AS `uid`,`tbl_search`.`min_age` AS `min_age`,`tbl_search`.`max_age` AS `max_age`,`tbl_search`.`min_height` AS `min_height`,`tbl_search`.`max_height` AS `max_height`,`tbl_search`.`religion` AS `religion`,`tbl_search`.`gender` AS `gender`,count(0) AS `counter` from `tbl_search` where (`tbl_search`.`max_age` is not null) group by `tbl_search`.`max_age` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_max_height`
--
DROP TABLE IF EXISTS `view_max_height`;

DROP VIEW IF EXISTS `view_max_height`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_max_height`  AS  select `tbl_search`.`id` AS `id`,`tbl_search`.`uid` AS `uid`,`tbl_search`.`min_age` AS `min_age`,`tbl_search`.`max_age` AS `max_age`,`tbl_search`.`min_height` AS `min_height`,`tbl_search`.`max_height` AS `max_height`,`tbl_search`.`religion` AS `religion`,`tbl_search`.`gender` AS `gender`,count(0) AS `counter` from `tbl_search` where (`tbl_search`.`max_height` is not null) group by `tbl_search`.`max_height` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_min_age`
--
DROP TABLE IF EXISTS `view_min_age`;

DROP VIEW IF EXISTS `view_min_age`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_min_age`  AS  select `tbl_search`.`id` AS `id`,`tbl_search`.`uid` AS `uid`,`tbl_search`.`min_age` AS `min_age`,`tbl_search`.`max_age` AS `max_age`,`tbl_search`.`min_height` AS `min_height`,`tbl_search`.`max_height` AS `max_height`,`tbl_search`.`religion` AS `religion`,`tbl_search`.`gender` AS `gender`,count(0) AS `counter` from `tbl_search` where (`tbl_search`.`min_age` is not null) group by `tbl_search`.`min_age` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_min_height`
--
DROP TABLE IF EXISTS `view_min_height`;

DROP VIEW IF EXISTS `view_min_height`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_min_height`  AS  select `tbl_search`.`id` AS `id`,`tbl_search`.`uid` AS `uid`,`tbl_search`.`min_age` AS `min_age`,`tbl_search`.`max_age` AS `max_age`,`tbl_search`.`min_height` AS `min_height`,`tbl_search`.`max_height` AS `max_height`,`tbl_search`.`religion` AS `religion`,`tbl_search`.`gender` AS `gender`,count(0) AS `counter` from `tbl_search` where (`tbl_search`.`min_height` is not null) group by `tbl_search`.`min_height` order by count(0) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_per_address_details`
--
DROP TABLE IF EXISTS `view_per_address_details`;

DROP VIEW IF EXISTS `view_per_address_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_per_address_details`  AS  select `tbl_per_address`.`per_uid` AS `per_uid`,`tbl_per_address`.`per_house` AS `per_house`,`tbl_per_address`.`per_road` AS `per_road`,`tbl_per_address`.`per_area` AS `per_area`,`tbl_per_address`.`per_police_station` AS `per_police_station`,`view_police_station_details`.`police_station_id` AS `police_station_id`,`view_police_station_details`.`police_station_name` AS `police_station_name`,`view_police_station_details`.`district_id` AS `district_id`,`view_police_station_details`.`district_name` AS `district_name`,`view_police_station_details`.`division_id` AS `division_id`,`view_police_station_details`.`division_name` AS `division_name` from (`tbl_per_address` join `view_police_station_details`) where (`tbl_per_address`.`per_police_station` = `view_police_station_details`.`police_station_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_police_station_details`
--
DROP TABLE IF EXISTS `view_police_station_details`;

DROP VIEW IF EXISTS `view_police_station_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_police_station_details`  AS  select `tbl_police_station`.`id` AS `police_station_id`,`tbl_police_station`.`name` AS `police_station_name`,`tbl_district`.`id` AS `district_id`,`tbl_district`.`name` AS `district_name`,`tbl_division`.`id` AS `division_id`,`tbl_division`.`name` AS `division_name` from ((`tbl_police_station` join `tbl_district`) join `tbl_division`) where ((`tbl_police_station`.`district` = `tbl_district`.`id`) and (`tbl_district`.`division` = `tbl_division`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pr_address_details`
--
DROP TABLE IF EXISTS `view_pr_address_details`;

DROP VIEW IF EXISTS `view_pr_address_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pr_address_details`  AS  select `tbl_pr_address`.`pr_uid` AS `pr_uid`,`tbl_pr_address`.`pr_house` AS `pr_house`,`tbl_pr_address`.`pr_road` AS `pr_road`,`tbl_pr_address`.`pr_area` AS `pr_area`,`tbl_pr_address`.`pr_police_station` AS `pr_police_station`,`view_police_station_details`.`police_station_id` AS `police_station_id`,`view_police_station_details`.`police_station_name` AS `police_station_name`,`view_police_station_details`.`district_id` AS `district_id`,`view_police_station_details`.`district_name` AS `district_name`,`view_police_station_details`.`division_id` AS `division_id`,`view_police_station_details`.`division_name` AS `division_name` from (`tbl_pr_address` join `view_police_station_details`) where (`tbl_pr_address`.`pr_police_station` = `view_police_station_details`.`police_station_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_registration`
--
DROP TABLE IF EXISTS `view_registration`;

DROP VIEW IF EXISTS `view_registration`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_registration`  AS  select `tbl_users`.`uid` AS `uid`,`tbl_users`.`fname` AS `fname`,`tbl_users`.`mname` AS `mname`,`tbl_users`.`lname` AS `lname`,`tbl_users`.`uname` AS `uname`,`tbl_users`.`dob` AS `dob`,`tbl_users`.`blood` AS `blood`,`tbl_users`.`gender` AS `gender`,`tbl_users`.`email` AS `email`,`tbl_users`.`number1` AS `number1`,`tbl_users`.`number2` AS `number2`,`tbl_users`.`password` AS `password`,`tbl_users`.`propic` AS `propic`,`tbl_users`.`height` AS `height`,`tbl_users`.`weight` AS `weight`,`tbl_users`.`complexion` AS `complexion`,`tbl_users`.`religion` AS `religion`,`tbl_users`.`marital_status` AS `marital_status`,`tbl_users`.`children` AS `children`,`tbl_users`.`annual_income` AS `annual_income`,`tbl_users`.`bio` AS `bio`,timestampdiff(YEAR,`tbl_users`.`dob`,curdate()) AS `age`,`tbl_blood`.`bgroup` AS `bgroup`,`tbl_gender`.`gender` AS `gender_name`,`tbl_religion`.`name` AS `religion_name` from (((`tbl_users` join `tbl_blood`) join `tbl_gender`) join `tbl_religion`) where ((`tbl_blood`.`id` = `tbl_users`.`blood`) and (`tbl_users`.`gender` = `tbl_gender`.`id`) and (`tbl_religion`.`id` = `tbl_users`.`religion`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_registration_req`
--
DROP TABLE IF EXISTS `view_registration_req`;

DROP VIEW IF EXISTS `view_registration_req`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_registration_req`  AS  select `tbl_registration_req`.`uid` AS `uid`,`tbl_registration_req`.`fname` AS `fname`,`tbl_registration_req`.`mname` AS `mname`,`tbl_registration_req`.`lname` AS `lname`,`tbl_registration_req`.`uname` AS `uname`,`tbl_registration_req`.`dob` AS `dob`,`tbl_registration_req`.`blood` AS `blood`,`tbl_registration_req`.`gender` AS `gender`,`tbl_registration_req`.`email` AS `email`,`tbl_registration_req`.`religion` AS `religion`,`tbl_registration_req`.`number1` AS `number1`,`tbl_registration_req`.`password` AS `password`,timestampdiff(YEAR,`tbl_registration_req`.`dob`,curdate()) AS `age`,`tbl_blood`.`bgroup` AS `bgroup`,`tbl_gender`.`gender` AS `gender_name`,`tbl_religion`.`name` AS `religion_name` from (((`tbl_registration_req` join `tbl_blood`) join `tbl_gender`) join `tbl_religion`) where ((`tbl_registration_req`.`blood` = `tbl_blood`.`id`) and (`tbl_registration_req`.`gender` = `tbl_gender`.`id`) and (`tbl_registration_req`.`religion` = `tbl_religion`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_details`
--
DROP TABLE IF EXISTS `view_user_details`;

DROP VIEW IF EXISTS `view_user_details`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_details`  AS  select `tbl_users`.`uid` AS `uid`,`tbl_users`.`fname` AS `fname`,`tbl_users`.`mname` AS `mname`,`tbl_users`.`lname` AS `lname`,`tbl_users`.`uname` AS `uname`,`tbl_users`.`dob` AS `dob`,`tbl_users`.`blood` AS `blood`,`tbl_users`.`gender` AS `gender`,`tbl_users`.`email` AS `email`,`tbl_users`.`number1` AS `number1`,`tbl_users`.`number2` AS `number2`,`tbl_users`.`password` AS `password`,`tbl_users`.`propic` AS `propic`,`tbl_users`.`height` AS `height`,`tbl_users`.`weight` AS `weight`,`tbl_users`.`complexion` AS `complexion`,`tbl_users`.`religion` AS `religion`,`tbl_users`.`marital_status` AS `marital_status`,`tbl_users`.`children` AS `children`,`tbl_users`.`annual_income` AS `annual_income`,`tbl_users`.`bio` AS `bio`,floor(((to_days(curdate()) - to_days(`tbl_users`.`dob`)) / 365)) AS `age`,`tbl_gender`.`gender` AS `gender_name`,`tbl_religion`.`name` AS `religion_name`,`tbl_blood`.`bgroup` AS `bgroup_name`,`tbl_complexion`.`type` AS `complexion_name`,`tbl_marital_status`.`status` AS `marital_status_name`,`tbl_pr_address`.`pr_house` AS `pr_house`,`tbl_pr_address`.`pr_road` AS `pr_road`,`tbl_pr_address`.`pr_area` AS `pr_area`,`tbl_pr_address`.`pr_police_station` AS `pr_police_station`,`tbl_per_address`.`per_house` AS `per_house`,`tbl_per_address`.`per_road` AS `per_road`,`tbl_per_address`.`per_area` AS `per_area`,`tbl_per_address`.`per_police_station` AS `per_police_station`,`tbl_job`.`designation` AS `designation`,`tbl_job`.`company` AS `company`,`tbl_job`.`joinning_date` AS `joinning_date`,`tbl_education`.`degree` AS `degree`,`tbl_education`.`institution` AS `institution`,`tbl_education`.`field` AS `field`,`tbl_education`.`passing_year` AS `passing_year` from (((((((((`tbl_users` join `tbl_gender`) join `tbl_religion`) join `tbl_blood`) join `tbl_complexion`) join `tbl_marital_status`) join `tbl_pr_address`) join `tbl_per_address`) join `tbl_job`) join `tbl_education`) where ((`tbl_users`.`gender` = `tbl_gender`.`id`) and (`tbl_users`.`religion` = `tbl_religion`.`id`) and (`tbl_users`.`blood` = `tbl_blood`.`id`) and (`tbl_users`.`complexion` = `tbl_complexion`.`id`) and (`tbl_users`.`marital_status` = `tbl_marital_status`.`id`) and (`tbl_users`.`uid` = `tbl_pr_address`.`pr_uid`) and (`tbl_users`.`uid` = `tbl_per_address`.`per_uid`) and (`tbl_users`.`uid` = `tbl_job`.`uid`) and (`tbl_users`.`uid` = `tbl_education`.`uid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_education`
--
DROP TABLE IF EXISTS `view_user_education`;

DROP VIEW IF EXISTS `view_user_education`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_education`  AS  select `tbl_education`.`uid` AS `uid`,`tbl_education`.`degree` AS `degree`,`tbl_education`.`institution` AS `institution`,`tbl_education`.`field` AS `field`,`tbl_education`.`passing_year` AS `passing_year`,`tbl_degree`.`degree` AS `degree_name` from (`tbl_education` join `tbl_degree`) where (`tbl_education`.`degree` = `tbl_degree`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_hobby`
--
DROP TABLE IF EXISTS `view_user_hobby`;

DROP VIEW IF EXISTS `view_user_hobby`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_hobby`  AS  select `tbl_user_hobby`.`uid` AS `uid`,`tbl_user_hobby`.`hobby` AS `hobby`,`tbl_hobby`.`name` AS `hobby_name` from (`tbl_user_hobby` join `tbl_hobby`) where (`tbl_user_hobby`.`hobby` = `tbl_hobby`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_interest`
--
DROP TABLE IF EXISTS `view_user_interest`;

DROP VIEW IF EXISTS `view_user_interest`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_interest`  AS  select `tbl_user_interest`.`uid` AS `uid`,`tbl_user_interest`.`interest` AS `interest`,`tbl_interest`.`name` AS `interest_name` from (`tbl_user_interest` join `tbl_interest`) where (`tbl_user_interest`.`interest` = `tbl_interest`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_music`
--
DROP TABLE IF EXISTS `view_user_music`;

DROP VIEW IF EXISTS `view_user_music`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_music`  AS  select `tbl_user_music`.`uid` AS `uid`,`tbl_user_music`.`music` AS `music`,`tbl_music`.`name` AS `music_name` from (`tbl_user_music` join `tbl_music`) where (`tbl_user_music`.`music` = `tbl_music`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_sports`
--
DROP TABLE IF EXISTS `view_user_sports`;

DROP VIEW IF EXISTS `view_user_sports`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_sports`  AS  select `tbl_user_sports`.`uid` AS `uid`,`tbl_user_sports`.`sport` AS `sport`,`tbl_sports`.`name` AS `sports_name` from (`tbl_user_sports` join `tbl_sports`) where (`tbl_user_sports`.`sport` = `tbl_sports`.`id`) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`blood`) REFERENCES `tbl_blood` (`id`),
  ADD CONSTRAINT `tbl_admin_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `tbl_gender` (`id`);

--
-- Constraints for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD CONSTRAINT `tbl_district_ibfk_1` FOREIGN KEY (`division`) REFERENCES `tbl_division` (`id`);

--
-- Constraints for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD CONSTRAINT `tbl_education_ibfk_1` FOREIGN KEY (`degree`) REFERENCES `tbl_degree` (`id`),
  ADD CONSTRAINT `tbl_education_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_family`
--
ALTER TABLE `tbl_family`
  ADD CONSTRAINT `tbl_family_ibfk_1` FOREIGN KEY (`type`) REFERENCES `tbl_family_type` (`id`),
  ADD CONSTRAINT `tbl_family_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  ADD CONSTRAINT `tbl_favorite_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_favorite_ibfk_2` FOREIGN KEY (`favorite_user`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_friend`
--
ALTER TABLE `tbl_friend`
  ADD CONSTRAINT `tbl_friend_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_friend_ibfk_2` FOREIGN KEY (`send_to`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_friend_req`
--
ALTER TABLE `tbl_friend_req`
  ADD CONSTRAINT `tbl_friend_req_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_friend_req_ibfk_2` FOREIGN KEY (`send_to`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD CONSTRAINT `tbl_message_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_message_ibfk_2` FOREIGN KEY (`send_to`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_per_address`
--
ALTER TABLE `tbl_per_address`
  ADD CONSTRAINT `tbl_per_address_ibfk_1` FOREIGN KEY (`per_uid`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_per_address_ibfk_2` FOREIGN KEY (`per_police_station`) REFERENCES `tbl_police_station` (`id`);

--
-- Constraints for table `tbl_police_station`
--
ALTER TABLE `tbl_police_station`
  ADD CONSTRAINT `tbl_police_station_ibfk_1` FOREIGN KEY (`district`) REFERENCES `tbl_district` (`id`);

--
-- Constraints for table `tbl_pr_address`
--
ALTER TABLE `tbl_pr_address`
  ADD CONSTRAINT `tbl_pr_address_ibfk_1` FOREIGN KEY (`pr_police_station`) REFERENCES `tbl_police_station` (`id`),
  ADD CONSTRAINT `tbl_pr_address_ibfk_2` FOREIGN KEY (`pr_uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`marital_status`) REFERENCES `tbl_marital_status` (`id`),
  ADD CONSTRAINT `tbl_users_ibfk_3` FOREIGN KEY (`religion`) REFERENCES `tbl_religion` (`id`),
  ADD CONSTRAINT `tbl_users_ibfk_4` FOREIGN KEY (`complexion`) REFERENCES `tbl_complexion` (`id`),
  ADD CONSTRAINT `tbl_users_ibfk_5` FOREIGN KEY (`gender`) REFERENCES `tbl_gender` (`id`);

--
-- Constraints for table `tbl_user_hobby`
--
ALTER TABLE `tbl_user_hobby`
  ADD CONSTRAINT `tbl_user_hobby_ibfk_1` FOREIGN KEY (`hobby`) REFERENCES `tbl_hobby` (`id`),
  ADD CONSTRAINT `tbl_user_hobby_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_user_interest`
--
ALTER TABLE `tbl_user_interest`
  ADD CONSTRAINT `tbl_user_interest_ibfk_1` FOREIGN KEY (`interest`) REFERENCES `tbl_interest` (`id`),
  ADD CONSTRAINT `tbl_user_interest_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_user_music`
--
ALTER TABLE `tbl_user_music`
  ADD CONSTRAINT `tbl_user_music_ibfk_1` FOREIGN KEY (`music`) REFERENCES `tbl_music` (`id`),
  ADD CONSTRAINT `tbl_user_music_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_user_sports`
--
ALTER TABLE `tbl_user_sports`
  ADD CONSTRAINT `tbl_user_sports_ibfk_1` FOREIGN KEY (`sport`) REFERENCES `tbl_sports` (`id`),
  ADD CONSTRAINT `tbl_user_sports_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`);

--
-- Constraints for table `tbl_warning`
--
ALTER TABLE `tbl_warning`
  ADD CONSTRAINT `tbl_warning_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_users` (`uid`),
  ADD CONSTRAINT `tbl_warning_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `tbl_admin` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
