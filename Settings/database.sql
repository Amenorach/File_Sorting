SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `Dikan`
--

-- create database dikan_database;

-- use dikan_database;

CREATE TABLE `workshops` (
  `workshop_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `wk_email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `areaofInterest` varchar(100) DEFAULT NULL,
  `Pfolio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`workshop_id`),
  UNIQUE KEY `wk_email` (`wk_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `program_applications` (
  `app_id` int NOT NULL AUTO_INCREMENT,
  `app_fname` varchar(100) NOT NULL,
  `app_lname` varchar(100) NOT NULL,
  `app_email` varchar(50) NOT NULL,
  `app_DOB` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `app_residence` varchar(150) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `app_CV` varchar(100) DEFAULT NULL,
  `app_sOfPurpose` varchar(100) DEFAULT NULL,
  `app_Pfolio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `educational_tour` (
  `tour_id` int NOT NULL AUTO_INCREMENT,
  `rep_fname` varchar(100) NOT NULL,
  `rep_lname` varchar(100) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `age_range` varchar(50) NOT NULL,
  `population` int NOT NULL,
  `tour_purpose` varchar(255) NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` TIMESTAMP,
  `expectations` varchar(255) NOT NULL,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indexes for table `workshops`
-- ALTER TABLE `workshops`
--   ADD UNIQUE KEY `wk_email` (`wk_email`);

-- Indexes for table `program_applications`
ALTER TABLE `program_applications`
  ADD UNIQUE KEY `email` (`app_email`);