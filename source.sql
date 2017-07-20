-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 20, 2017 at 05:34 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aiims_bm_dbms_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `passcode` varchar(20) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`, `email`) VALUES
(1, 'root', 'password', ''),
(2, 'ritesh', 'ritesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `BOQ`
--

CREATE TABLE IF NOT EXISTS `BOQ` (
  `project_id` int(11) NOT NULL,
  `item_no` varchar(4) NOT NULL,
  `item_description` text NOT NULL,
  `unit` varchar(6) NOT NULL,
  `rate` int(11) NOT NULL,
  `Remarks` text NOT NULL,
  PRIMARY KEY (`project_id`,`item_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Building`
--

CREATE TABLE IF NOT EXISTS `Building` (
  `build_id` int(11) NOT NULL DEFAULT '0',
  `build_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`build_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Building`
--

INSERT INTO `Building` (`build_id`, `build_name`) VALUES
(1, 'Hospital'),
(2, 'Medical College'),
(3, 'Nursing College'),
(4, 'Boys Hostel'),
(5, 'Girls Hostel'),
(6, 'Nursing Hostel'),
(7, 'Auditorium'),
(8, 'Main Service Laundry'),
(9, 'UG Service Building'),
(10, 'Library'),
(11, 'MRS Building'),
(12, 'Animal House'),
(13, 'AYUSH'),
(14, 'PG Hostel');

-- --------------------------------------------------------

--
-- Table structure for table `BuildingFloor`
--

CREATE TABLE IF NOT EXISTS `BuildingFloor` (
  `build_id` int(11) NOT NULL DEFAULT '0',
  `floor_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`build_id`,`floor_id`),
  KEY `floor_id` (`floor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BuildingFloor`
--

INSERT INTO `BuildingFloor` (`build_id`, `floor_id`) VALUES
(2, -3),
(7, -3),
(1, -2),
(1, -1),
(1, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 1),
(10, 1),
(13, 1),
(14, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(10, 2),
(14, 2),
(4, 3),
(5, 3),
(6, 3),
(14, 3),
(4, 4),
(5, 4),
(6, 4),
(14, 4),
(4, 5),
(5, 5),
(6, 5),
(14, 5),
(4, 6),
(5, 6),
(6, 6),
(14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Floor`
--

CREATE TABLE IF NOT EXISTS `Floor` (
  `floor_id` int(11) NOT NULL DEFAULT '0',
  `floor_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Floor`
--

INSERT INTO `Floor` (`floor_id`, `floor_name`) VALUES
(-3, 'Basement'),
(-2, 'LGF'),
(-1, 'UGF'),
(0, 'Ground'),
(1, 'First'),
(2, 'Second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth');

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE IF NOT EXISTS `Project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_of_work` varchar(200) DEFAULT NULL,
  `name_of_contractor` varchar(200) DEFAULT NULL,
  `date_and_number_of_work_order` varchar(100) DEFAULT NULL,
  `date_of_completion_as_per_work_order` date DEFAULT NULL,
  `date_of_actual_work_completion` date DEFAULT NULL,
  `on_ac` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE IF NOT EXISTS `Room` (
  `project_id` int(11) NOT NULL,
  `grid_no` varchar(8) NOT NULL DEFAULT '',
  `build_id` int(11) NOT NULL DEFAULT '0',
  `floor_id` int(11) NOT NULL DEFAULT '0',
  `item_id` varchar(4) NOT NULL DEFAULT '0',
  `measured` tinyint(1) DEFAULT NULL,
  `unit` varchar(8) DEFAULT NULL,
  `no1` varchar(20) DEFAULT NULL,
  `no2` varchar(20) DEFAULT NULL,
  `length` double DEFAULT NULL,
  `breadth` double DEFAULT NULL,
  `height` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `date_mod` date DEFAULT NULL,
  PRIMARY KEY (`grid_no`,`build_id`,`floor_id`,`item_id`),
  KEY `build_id` (`build_id`),
  KEY `floor_id` (`floor_id`),
  KEY `item_id` (`item_id`),
  KEY `project_id` (`project_id`),
  KEY `project_id_2` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BOQ`
--
ALTER TABLE `BOQ`
  ADD CONSTRAINT `BOQ_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BuildingFloor`
--
ALTER TABLE `BuildingFloor`
  ADD CONSTRAINT `BuildingFloor_ibfk_1` FOREIGN KEY (`build_id`) REFERENCES `Building` (`build_id`),
  ADD CONSTRAINT `BuildingFloor_ibfk_2` FOREIGN KEY (`floor_id`) REFERENCES `Floor` (`floor_id`);

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Project` (`project_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
