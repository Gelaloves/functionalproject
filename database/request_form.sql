-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2024 at 09:25 AM
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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`admin_id`, `fullname`, `username`, `password`, `status`, `date_created`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 1, '2022-02-11 05:24:55'),
(2, 'User 1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 1, '2022-02-11 06:44:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peer`
--

CREATE TABLE `peer` (
  `id` int NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `place_of_assignment` varchar(100) NOT NULL,
  `contract_period` date NOT NULL,
  `comments` text NOT NULL,
  `assessed_by` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `total_score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campus_director`
--
ALTER TABLE `campus_director`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `human_resource`
--
ALTER TABLE `human_resource`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peer`
--
ALTER TABLE `peer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
