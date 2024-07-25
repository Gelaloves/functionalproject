-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2024 at 01:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `request_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `admin_id` int NOT NULL,
  `fullname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
<<<<<<< HEAD
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('Human Resource','Campus Director','Peer','Supervisor','Admin') NOT NULL DEFAULT 'Peer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
>>>>>>> 93b4c5cdcc8f248862e50d75a2b66f6c9f083b78

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `fullname`, `username`, `password`, `status`, `date_created`, `role`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2022-02-11 05:24:55', 'Admin'),
(3, 'Beta', 'supervisor', 'd947df684dd40733bef0cd787f8ae4e1', 1, '2024-07-17 13:34:32', 'Supervisor'),
(5, 'Delta', 'human resource', '4435a4e88e984616a91c109524caf662', 1, '2024-07-17 14:06:02', 'Human Resource'),
(6, 'Eagle', 'peer', '2e86e7035eb865ae6507082f6ca959c0', 1, '2024-07-17 14:23:14', 'Peer'),
(9, 'Campus Director', 'Campus director ', '1b9cddfb9dabe9ace94ab1b2d2a369a6', 1, '2024-07-19 05:38:11', 'Campus Director'),
(10, 'supervisor', 'Supervisor2', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2024-07-19 09:19:37', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `campus_director`
--

CREATE TABLE `campus_director` (
  `id` int NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `place_of_assignment` varchar(100) NOT NULL,
  `contract_period` varchar(50) NOT NULL,
  `comments` text,
  `recommendation` text,
  `assessed_by` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `total_score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `employee_id` int NOT NULL,
  `employee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `position` varchar(100) NOT NULL,
  `place_of_assignment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee_list`
--

INSERT INTO `employee_list` (`employee_id`, `employee_name`, `position`, `place_of_assignment`) VALUES
(1, 'Junnie Ryh M. Sumacot', 'Instructor 1', 'CISA');

-- --------------------------------------------------------

--
-- Table structure for table `human_resource`
--

CREATE TABLE `human_resource` (
  `id` int NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `place_of_assignment` varchar(100) NOT NULL,
  `contract_period` date NOT NULL,
  `comments` text NOT NULL,
  `recommendation` varchar(20) DEFAULT NULL,
  `assessed_by` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_score` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `human_resource`
--

INSERT INTO `human_resource` (`id`, `employee_name`, `position`, `place_of_assignment`, `contract_period`, `comments`, `recommendation`, `assessed_by`, `date`, `total_score`) VALUES
(1, 'sdadefrth', 'jjj', 'jiii', '2024-07-10', 'd', 'Non-Renewal', 'd', '2024-08-07', 2),
(2, 'Jeff Quiller', 'head', 'placement', '2024-07-19', 'asdqmweiyr', 'Non-Renewal', 'cutie', '2024-07-19', 22),
(3, 'dhdd', 'ddjs', 'sjsjs', '2024-08-08', '', 'Non-Renewal', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peer`
--

CREATE TABLE `peer` (
  `id` int NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `place_of_assignment` varchar(255) NOT NULL,
  `contract_period` varchar(255) NOT NULL,
  `comments` text,
  `assessed_by` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `creativity_and_innovation_1` int NOT NULL,
  `creativity_and_innovation_2` int NOT NULL,
  `creativity_and_innovation_3` int NOT NULL,
  `critical1Stars` int NOT NULL,
  `critical2Stars` int NOT NULL,
  `critical3Stars` int NOT NULL,
  `environmental1Stars` int NOT NULL,
  `environmental2Stars` int NOT NULL,
  `environmental3Stars` int NOT NULL,
  `environmental4Stars` int NOT NULL,
  `honesty1Stars` int NOT NULL,
  `honesty2Stars` int NOT NULL,
  `honesty3Stars` int NOT NULL,
  `honesty4Stars` int NOT NULL,
  `judgement1Stars` int NOT NULL,
  `judgement2Stars` int NOT NULL,
  `judgement3Stars` int NOT NULL,
  `judgement4Stars` int NOT NULL,
  `leadership1Stars` int NOT NULL,
  `leadership2Stars` int NOT NULL,
  `leadership3Stars` int NOT NULL,
  `leadership4Stars` int NOT NULL,
  `leadership5Stars` int NOT NULL,
  `leadership6Stars` int NOT NULL,
  `leadership7Stars` int NOT NULL,
  `leadership8Stars` int NOT NULL,
  `leadership9Stars` int NOT NULL,
  `total_score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peer`
--

INSERT INTO `peer` (`id`, `employee_name`, `position`, `place_of_assignment`, `contract_period`, `comments`, `assessed_by`, `date`, `creativity_and_innovation_1`, `creativity_and_innovation_2`, `creativity_and_innovation_3`, `critical1Stars`, `critical2Stars`, `critical3Stars`, `environmental1Stars`, `environmental2Stars`, `environmental3Stars`, `environmental4Stars`, `honesty1Stars`, `honesty2Stars`, `honesty3Stars`, `honesty4Stars`, `judgement1Stars`, `judgement2Stars`, `judgement3Stars`, `judgement4Stars`, `leadership1Stars`, `leadership2Stars`, `leadership3Stars`, `leadership4Stars`, `leadership5Stars`, `leadership6Stars`, `leadership7Stars`, `leadership8Stars`, `leadership9Stars`, `total_score`) VALUES
(1, 'angela', 'ffgf', 'dddd', '2024-07-18', 'sad', 'asd', '2024-07-24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
(2, 'Jeff Quiller', 'supervisor', 'dddd', '2024-07-10', 'asdsd', 'wo', '2024-08-07', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `place_of_assignment` varchar(100) NOT NULL,
  `contract_period` varchar(50) NOT NULL,
  `comments` text,
  `recommendation` text,
  `assessed_by` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `total_score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `employee_name`, `position`, `place_of_assignment`, `contract_period`, `comments`, `recommendation`, `assessed_by`, `date`, `total_score`) VALUES
(1, 'sumacot', 'head', 'junior', '2024-07-11', 'sfae', 'Non-Renewal', 'sdfd', '2024-07-26', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `campus_director`
--
ALTER TABLE `campus_director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `human_resource`
--
ALTER TABLE `human_resource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peer`
--
ALTER TABLE `peer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `campus_director`
--
ALTER TABLE `campus_director`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `human_resource`
--
ALTER TABLE `human_resource`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peer`
--
ALTER TABLE `peer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
