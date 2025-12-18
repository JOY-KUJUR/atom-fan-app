-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2025 at 02:39 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u307056987_atom`
--

-- --------------------------------------------------------

--
-- Table structure for table `fans`
--

CREATE TABLE `fans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fan_name` varchar(100) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `is_on` tinyint(1) DEFAULT 0,
  `speed` int(11) DEFAULT 1,
  `sleep_mode` tinyint(1) DEFAULT 0,
  `power_watt` int(11) DEFAULT 75,
  `hours_used` float DEFAULT 0,
  `online` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fans`
--

INSERT INTO `fans` (`id`, `user_id`, `fan_name`, `room`, `is_on`, `speed`, `sleep_mode`, `power_watt`, `hours_used`, `online`) VALUES
(3, 1, 'Atomberg Renesa', 'Bedroom', 1, 3, 1, 75, 4, 1),
(4, 1, 'Atomberg Efficio', 'Living Room', 1, 6, 0, 75, 10, 1),
(5, 2, 'Living Room Fan', 'Living Room', 1, 3, 0, 75, 5, 1),
(6, 2, 'Bedroom Fan', 'Bedroom', 0, 2, 1, 70, 3, 1),
(7, 2, 'Study Room Fan', 'Study Room', 1, 4, 0, 80, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `api_key`, `refresh_token`, `created_at`) VALUES
(1, 'demo_api_key_123456', 'demo_refresh_token_abcdef', '2025-12-18 01:18:58'),
(2, '1', '1', '2025-12-18 02:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fans`
--
ALTER TABLE `fans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fans`
--
ALTER TABLE `fans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fans`
--
ALTER TABLE `fans`
  ADD CONSTRAINT `fans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
