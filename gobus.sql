-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2018 at 08:44 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gobus`
--
CREATE DATABASE IF NOT EXISTS `gobus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gobus`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `u_name`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  `b_type` varchar(255) NOT NULL,
  `b_max_seat` int(11) NOT NULL,
  `b_no` varchar(255) NOT NULL,
  `b_owner` varchar(255) NOT NULL,
  `b_contact_no` int(11) NOT NULL,
  `b_email` varchar(255) NOT NULL,
  `b_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE IF NOT EXISTS `bus_route` (
  `br_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`br_id`),
  KEY `b_id` (`b_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE IF NOT EXISTS `cancellation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `b_id` (`b_id`),
  KEY `u_id` (`u_id`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_no` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_trip_no` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`r_id`, `r_no`, `r_name`, `r_trip_no`) VALUES
(10, 1, 'JRT-GHY', 1),
(11, 1, 'GHY-JRT', 2),
(12, 3, 'JRT-DIB', 1),
(15, 6, 'NGN-GHY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE IF NOT EXISTS `seat` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `s_no` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `b_id` (`b_id`),
  KEY `b_id_2` (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_route_details`
--

CREATE TABLE IF NOT EXISTS `sub_route_details` (
  `rd_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `distance` int(11) NOT NULL,
  `arrive_time` time NOT NULL,
  `depart_time` time NOT NULL,
  PRIMARY KEY (`rd_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_route_details`
--

INSERT INTO `sub_route_details` (`rd_id`, `r_id`, `source`, `destination`, `distance`, `arrive_time`, `depart_time`) VALUES
(1, 10, 'Jorhat', 'Numaligarh', 61, '08:00:00', '09:45:00'),
(2, 11, 'Numaligarh', 'Jorhat', 61, '09:00:00', '10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_ph_no` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_route`
--
ALTER TABLE `bus_route`
  ADD CONSTRAINT `bus_route_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `route` (`r_id`),
  ADD CONSTRAINT `bus_route_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bus` (`b_id`);

--
-- Constraints for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD CONSTRAINT `cancellation_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `route` (`r_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`s_id`) REFERENCES `seat` (`s_id`),
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bus` (`b_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bus` (`b_id`);

--
-- Constraints for table `sub_route_details`
--
ALTER TABLE `sub_route_details`
  ADD CONSTRAINT `sub_route_details_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `route` (`r_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
