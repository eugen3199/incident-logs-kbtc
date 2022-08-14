-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2022 at 09:39 AM
-- Server version: 5.6.51
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp473227_laravel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `status`) VALUES
(1, 'Network', '1'),
(2, 'System', '1'),
(3, 'Software', '1'),
(4, 'Hardware', '1'),
(5, 'testing', '0'),
(6, 'Wifi', '0'),
(7, 'Wifi', '0'),
(8, 'test', '0'),
(9, 'Normal Error', '0');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`id`, `title`, `cat_id`, `sub_cat_id`, `create_at`) VALUES
(1, 'Network Port Lose', 1, 1, '2022-07-20'),
(2, 'Cant Download', 3, 15, '2022-07-20'),
(3, 'Excel files open only sometimes', 4, 8, '2022-07-26'),
(4, 'Cant Connect', 4, 8, '2022-07-26'),
(5, 'fdjhsrlfsb fkgfjjvfkjfljkf', 7, 26, '2022-07-26'),
(6, 'Excel Cannot Open File ', 3, 13, '2022-07-26'),
(7, 'dkha;fl', 9, 27, '2022-07-27'),
(8, 'can ping but no internet', 4, 9, '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(2, 'Main Campus'),
(3, 'Yoma'),
(4, 'Mya Kan Thar'),
(5, '7 Mile Campus'),
(6, 'Sapal Chan');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `incident_id` int(11) NOT NULL,
  `solution_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `location` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `cat_id`, `sub_cat_id`, `incident_id`, `solution_id`, `name`, `location`, `remark`, `create_at`) VALUES
(2, 1, 1, 1, 1, 'Admin', '2', 'Tester', '2022-07-26'),
(3, 7, 26, 5, 4, 'Admin', '3', 'áƒá„áƒá„áƒá„áƒá„', '2022-07-26'),
(4, 7, 26, 5, 3, 'Admin', '2', 'nope', '2022-07-26'),
(5, 3, 13, 6, 6, 'Admin', '2', '', '2022-07-26'),
(6, 4, 9, 8, 7, 'Admin', '2', '', '2022-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `password`, `role`, `status`, `profile`, `position`, `department`, `phone`, `create_at`) VALUES
(1, 'admin', '123', 'admin', '1', '-', '-', '-', '-', ''),
(3, 'tester', '123', 'user', '1', '-', '-', '-', '-', ''),
(4, 'Thomas Naing', 'Thuwai12', 'admin', '1', '-', '-', '-', '-', ''),
(5, 'Thu Wai', 'Thuwai12', 'user', '1', '-', '-', '-', '-', ''),
(6, 'nandar', '142142', 'user', '1', '-', '-', '-', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `id` int(11) NOT NULL,
  `incident_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`id`, `incident_id`, `answer`, `member_id`, `create_date`) VALUES
(1, 1, 'Recrimp Network Head', 1, ''),
(2, 2, 'Uninstall and Install', 1, ''),
(3, 5, 'eikghrgherluih', 1, ''),
(4, 5, 'á€ºá€á€”á€¡á€™á€á€”á€™á€¡á€á€”á€¡á€á€”á€¡', 1, ''),
(5, 5, 'á€ºá€·á€«á€­á€žá€„á€«á€¯á€¼á€¡á€„á€¯á€¼', 1, ''),
(6, 6, 'Appwiz.cpl&gt;Office&gt;right Click&gt;change&gt;Repair', 1, ''),
(7, 8, 'find vpn\r\ndisable vpn', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `subcategory`, `status`) VALUES
(1, 1, 'Router', '1'),
(2, 4, 'Desktop', '1'),
(3, 4, 'Cable', '1'),
(4, 4, 'Monitor', '1'),
(5, 4, 'Smart TV', '1'),
(6, 4, 'Printer', '1'),
(7, 4, 'Web Cam', '1'),
(8, 4, 'Projector', '1'),
(9, 4, 'External WIFI Card', '1'),
(10, 3, 'Printer', '1'),
(11, 3, 'Driver', '1'),
(12, 3, 'WIFI', '1'),
(13, 3, 'OFFICE', '1'),
(14, 3, 'Window', '1'),
(15, 3, 'Browser', '1'),
(16, 3, 'Drawing PAd', '1'),
(17, 3, 'External WIFI Card', '1'),
(18, 3, 'Smart Phone', '1'),
(19, 2, 'MOODLE', '1'),
(20, 2, 'OFFICE', '1'),
(21, 2, 'SMS ( School Management System )', '1'),
(22, 2, 'SMS ( POH )', '1'),
(23, 1, 'Switch', '1'),
(24, 1, 'Firewall', '1'),
(25, 1, 'Ap ( Acess Point )', '1'),
(26, 7, 'connection lost', '1'),
(27, 9, 'need v', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
