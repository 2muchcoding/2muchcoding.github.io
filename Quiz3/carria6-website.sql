-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2025 at 04:46 AM
-- Server version: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mySite`
--

-- --------------------------------------------------------

--
-- Table structure for table `siteComments`
--

CREATE TABLE `siteComments` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `visitor_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `feature_suggestion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('approved','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siteComments`
--

INSERT INTO `siteComments` (`id`, `visitor_name`, `email`, `comment_text`, `feature_suggestion`, `created_at`, `status`) VALUES
(5, 'Anoua', 'anoua.carrie@gmail.com', 'Firsy comment!', '', '2025-12-09 19:46:21', 'approved'),
(6, 'Anoua', 'anoua.carrie@gmail.co', 'Second comment!', 'New feature', '2025-12-09 19:46:46', 'approved'),
(7, 'Bob', 'anoua.carrie@gmail.co', 'Third comment!', 'Hellooo', '2025-12-09 20:31:01', 'approved'),
(8, 'hi', 'anoua.carrie@gmail.com', 'This is my comment', '', '2025-12-09 20:31:29', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siteComments`
--
ALTER TABLE `siteComments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siteComments`
--
ALTER TABLE `siteComments`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
