-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 03:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dict_cert_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `speaker_id` int(11) NOT NULL,
  `event_start` date DEFAULT NULL,
  `event_end` date DEFAULT NULL,
  `host_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `speaker_id`, `event_start`, `event_end`, `host_id`, `status`, `deleted`) VALUES
(18, 'Online Sabong', 'hahaha', 66, '2024-04-11', '2024-04-12', 6, 'closed', 0),
(24, 'Online Sabong 2', 'a', 66, '2024-04-23', '2024-04-16', 5, 'closed', 0),
(25, 'Online Sabong 3', 'hahahah', 66, '2024-04-17', '2024-04-18', 5, 'closed', 0),
(26, 'Online Sabong 33', 'hakdog', 73, '2024-04-25', '2024-04-26', 6, 'closed', 0),
(27, 'Online Sabong 33333', 'qwq', 66, '2024-04-26', '2024-04-27', 7, 'closed', 0),
(28, 'Scatter', 'scatter', 73, '2024-04-18', '2024-04-19', 5, 'closed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `host_office`
--

CREATE TABLE `host_office` (
  `host_id` int(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host_office`
--

INSERT INTO `host_office` (`host_id`, `office`, `deleted`) VALUES
(5, 'DICT ZAMBALES', 0),
(6, 'DICT BULACAN', 0),
(7, 'DICT TARLAC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_registered` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mid_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ext_name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `sign` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speaker_id`, `first_name`, `mid_name`, `last_name`, `ext_name`, `organization`, `profile`, `sign`, `deleted`) VALUES
(66, 'RALPH', 'DOCUTIN', 'CUSTODIO', 'JR', 'POLYTECHNIC COLLEGE OF BOTOLAN', 'CUSTODIO_66.jpg', 'CUSTODIO_66.png', 0),
(73, 'MARIA THERESA', 'PINEDA', 'BAYANI', 'JR', 'POLYTECHNIC COLLEGE OF BOTOLAN', 'BAYANI_73.jpg', 'BAYANI_73.png', 0),
(74, 'MICHAEL', 'ADMIN', 'OROZCO', 'JR', 'RDC TECH', 'OROZCO_74.png', 'OROZCO_74.png', 1),
(75, 'ADMINIS', 'DOCUTIN', 'TRAITOR', '', 'POLYTECHNIC COLLEGE OF BOTOLAN', 'TRAITOR_20240416095700.png', 'TRAITOR_20240416095700.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `mid_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `ext_name` varchar(255) DEFAULT NULL,
  `age` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'Admin-1\r\nStaff-2\r\nParticipant-3',
  `upload_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `mid_name`, `last_name`, `ext_name`, `age`, `sex`, `email`, `contact`, `province`, `host_id`, `username`, `password`, `role`, `upload_url`, `status`, `deleted`) VALUES
(21, 'Admin', 'Is', 'Traitor', '', '21-29', 'Male', 'admin@gmail.com', '965822593', 'Zambales', 1, 'admin', '$2y$10$Xy2ZbZTYrSPAmd.KAo.gH./mOoRJaqkfP5ln9wMoSBx1zMiDrfvuG', '1', 'CUSTODIO_66.jpg', 'active', 0),
(34, 'RALPH', 'DOCUTIN', 'CUSTODIO', 'JR', '21-29', 'MALE', 'ralphcustodio@pcb.edu.ph', '09123456789', 'BULACAN', 6, 'raprap', '$2y$10$sZUpAlbGkCfmLe.iw253sOnRKgnWJvQPK72F.4HX8lc6IkfOYzaKW', '3', NULL, 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `host_office`
--
ALTER TABLE `host_office`
  ADD PRIMARY KEY (`host_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speaker_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `host_office`
--
ALTER TABLE `host_office`
  MODIFY `host_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
