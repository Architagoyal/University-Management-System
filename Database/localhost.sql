-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2011 at 04:52 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `university management`
--
CREATE DATABASE `university management` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `university management`;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `C_ID` int(5) NOT NULL,
  `U_NAME` varchar(20) NOT NULL,
  `C_NAME` varchar(20) NOT NULL,
  `DEAN` varchar(20) NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college`
--


-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `COURSE_ID` int(5) NOT NULL,
  `D_NAME` varchar(20) NOT NULL,
  `COURSE_NAME` varchar(20) NOT NULL,
  `TIME` varchar(10) NOT NULL,
  PRIMARY KEY (`COURSE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--


-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `D_ID` int(5) NOT NULL,
  `C_NAME` varchar(20) NOT NULL,
  `HOD` varchar(50) NOT NULL,
  `D_NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`D_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `P_ID` int(5) NOT NULL,
  `D_NAME` varchar(20) NOT NULL,
  `P_NAME` varchar(20) NOT NULL,
  `AGE` int(3) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professor`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `S_ID` int(5) NOT NULL,
  `D_NAME` varchar(20) NOT NULL,
  `S_NAME` varchar(20) NOT NULL,
  `TEL_NO` int(13) NOT NULL,
  `U_NAME` varchar(20) NOT NULL,
  `C_NAME` varchar(20) NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--


-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `U_ID` int(5) NOT NULL AUTO_INCREMENT,
  `U_NAME` varchar(20) NOT NULL,
  `VICE_CHANCELLOR` varchar(20) NOT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `university`
--

