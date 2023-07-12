-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2023 at 06:48 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_event`
--

DROP TABLE IF EXISTS `add_event`;
CREATE TABLE IF NOT EXISTS `add_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(234) NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `time_slot` text NOT NULL,
  `amount` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_event`
--

INSERT INTO `add_event` (`id`, `event_name`, `start_date`, `end_date`, `time_slot`, `amount`, `gst`, `total`) VALUES
(1, '1', '2023-06-17', '2023-06-21', '', 1, 1, 1),
(2, '3', '2023-06-15', '2023-06-13', '1', 1, 1, 1),
(3, '2', '2023-06-09', '2023-06-16', '1', 1, 1, 1),
(7, '3', '2023-06-17', '2023-06-17', '11 to 2', 1, 1, 1),
(8, '2', '2023-06-08', '2023-06-17', '4', 9, 1, 1),
(6, '2', '2023-06-16', '2023-06-15', '10 to 11', 1, 1, 1),
(11, '1', '2023-06-06', '2023-06-12', '1', 3000, 10, 3000),
(12, '4', '2023-06-17', '2023-06-21', '8 to 6', 18000, 10, 18000),
(13, '1', '2023-06-16', '2023-06-22', '9 to 10', 19000, 10, 20900),
(14, '1', '2023-06-14', '2023-06-23', '9 to 10', 19000, 10, 20900),
(15, '4', '2023-06-09', '2023-06-07', '8 to 6', 17000, 10, 18700),
(16, '3', '2023-06-08', '2023-06-15', '3 to 4', 7000, 10, 7700),
(17, '1', '2023-06-08', '2023-06-07', '9:00 AM to 10:00 AM', 19000, 10, 20900),
(18, '1', '2023-06-08', '2023-06-16', '9:00 AM to 10:00 AM', 19000, 10, 20900),
(19, '1', '2023-06-15', '2023-06-02', '9:00 AM to 10:00 AM', 20000, 10, 22000);

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

DROP TABLE IF EXISTS `amount`;
CREATE TABLE IF NOT EXISTS `amount` (
  `amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`amount_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`amount_id`, `time_id`, `amount`) VALUES
(1, 1, 1000),
(2, 1, 2000),
(3, 1, 3000),
(4, 2, 4000),
(5, 2, 5000),
(6, 2, 6000),
(7, 3, 7000),
(8, 3, 8000),
(9, 4, 9000),
(10, 4, 10000),
(11, 5, 11000),
(12, 5, 12000),
(13, 6, 13000),
(14, 6, 14000),
(15, 7, 15000),
(16, 7, 16000),
(17, 8, 17000),
(18, 8, 18000),
(19, 9, 19000),
(20, 9, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `category_name`
--

DROP TABLE IF EXISTS `category_name`;
CREATE TABLE IF NOT EXISTS `category_name` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_name`
--

INSERT INTO `category_name` (`id`, `category_name`, `description`, `is_default`) VALUES
(1, 'marriage', '', 0),
(2, 'temple', '', 0),
(3, 'birthday', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_name`
--

DROP TABLE IF EXISTS `event_name`;
CREATE TABLE IF NOT EXISTS `event_name` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(234) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_name`
--

INSERT INTO `event_name` (`event_id`, `event_name`) VALUES
(1, 'Marriage Function'),
(2, 'Birthday Function'),
(3, 'Office Function'),
(4, 'Temple Function');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `time_slot` varchar(234) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_id`, `event_id`, `time_slot`) VALUES
(1, 1, '9:00 AM to 10:00 AM'),
(2, 1, '10:00 AM  to 11:00 AM'),
(3, 1, '11:00 AM to 12:00 PM'),
(4, 2, '12:00 PM to 1:00 PM'),
(5, 2, '1:00 PM to 2:00 PM'),
(6, 3, '2:00 PM to 3:00 PM'),
(7, 3, '3:00 PM to 4:00 PM'),
(8, 4, '4:00 PM to 5:00 PM'),
(9, 4, '8:00 AM to 6:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(234) NOT NULL,
  `email` varchar(234) NOT NULL,
  `password` varchar(234) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'dhilipkumar ', 'dhilipkumar0821@gmail.com', '123'),
(2, 'divya', 'divya0821@gmail.com', '12345'),
(3, 'mohan', 'dhilipkumar1178@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
