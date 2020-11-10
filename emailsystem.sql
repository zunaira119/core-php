-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2020 at 05:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) UNSIGNED NOT NULL,
  `comment` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `status`, `created_at`) VALUES
(18, 'New marchent registered', 0, '2020-04-03 17:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(30) NOT NULL,
  `r_id` int(30) NOT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `r_id`, `amount`, `created_at`) VALUES
(65, 29, 56, 0.0489, '2020-04-03 17:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(6) UNSIGNED NOT NULL,
  `notification` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification`, `status`, `reference`, `created_at`) VALUES
(17, 'request completed', '0', 'reference1', '2020-04-03 17:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(6) UNSIGNED NOT NULL,
  `reference` varchar(30) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `cc` varchar(50) DEFAULT NULL,
  `bcc` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `body` varchar(50) DEFAULT NULL,
  `status` enum('pending','recieved','processed','error','invalid','done') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reference`, `sender`, `cc`, `bcc`, `subject`, `body`, `status`, `created_at`) VALUES
(55, 'reference', 'zunaira@gmail.com', 'abc@gmail.com', 'cds@gmail.com', 'subject', 'some text', 'pending', '2020-04-03 17:18:02'),
(56, 'reference1', 'zunaira@gmail.com', 'abc@gmail.com', 'cds@gmail.com', 'subject', 'some text', 'done', '2020-04-03 17:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `password` int(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `type`, `role`, `status`, `password`, `amount`, `created_at`) VALUES
(28, 'admin', '1', 'admin@gmail.com', 'admin', NULL, 0, 12345678, 20, '2020-04-03 17:14:10'),
(29, 'marchent', '1', 'marchent@gmail.com', 'marchent', NULL, 1, 12345678, 19.9511, '2020-04-03 17:19:14'),
(30, 'user', '1', 'user@gmail.com', 'user', 'secondary', NULL, 12345678, NULL, '2020-04-03 17:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
