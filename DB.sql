-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2010 at 10:17 AM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shahami`
--
CREATE DATABASE `shahami` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `shahami`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `caption` varchar(300) COLLATE utf8_polish_ci NOT NULL,
  `unit` varchar(300) COLLATE utf8_polish_ci NOT NULL,
  `year` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `month` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `value` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `section_id`, `caption`, `unit`, `year`, `month`, `value`) VALUES
(3, 2, '1', '1', '1', '1', '<p>1</p>'),
(2, 2, 'تست عنوان2', '۲', '۱۳۸8', 'ابان', '<p>واااااااااااای</p>'),
(4, 2, '2', '2', '2', '2', '<p>2</p>');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `s_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_title` varchar(300) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`s_id`, `s_title`) VALUES
(2, 'اطلاع رسانی'),
(5, 'آزمایش');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(128) DEFAULT NULL,
  `userPassword` varchar(32) DEFAULT NULL,
  `userType` enum('user','admin') DEFAULT 'user',
  `userStatus` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userEmail`, `userPassword`, `userType`, `userStatus`) VALUES
(1, 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 'admin', 'active');
