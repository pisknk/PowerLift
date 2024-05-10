-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2024 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

CREATE DATABASE IF NOT EXISTS `PowerLift`;
USE `PowerLift`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PowerLift`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tier` int(2) NOT NULL,
  `activation_code` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `subscription_start_date` date DEFAULT NULL,
  `subscription_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `tier`, `activation_code`, `role`, `subscription_start_date`, `subscription_end_date`) VALUES
(1, 'Admin', '1', 'admin@admin.com', '$2y$10$sFX0HSXSHd6S2w6/9tHB0O6A3lxqNegnFR0Gmnu5lamabs9UXDP2O', 12, 'OSX-1309', 'admin', '2024-05-10', '2025-05-10'),
(2, 'John', 'Doe', 'joemama@aol.com', '$2y$10$uMShCQ7rWWA1FvsiQvi.ZOErIGdk1VaKkatUHAmd/qwTmRY9kHXBe', 6, 'UML-9423', 'users', NULL, NULL),
(3, 'Tessa', 'Violet', 'tessa@gmail.com', '$2y$10$FQJqjwM8jzWoOt5xg1kiE.KqYXp4kdoFnIg6sm45AmogGE4xuegUG', 6, 'FCH-0978', 'users', '2024-05-10', '2024-11-10'),
(4, 'Anna', 'Loevr', 'anna@aol.com', '$2y$10$v77rVIxLPTArr0YaJc/zYuirDkiylE5KZDhEiba0CvggqxwrQr4XG', 6, 'HGV-7305', 'users', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_history`
--

CREATE TABLE `visit_history` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `visit_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit_history`
--

INSERT INTO `visit_history` (`id`, `user_email`, `visit_date`, `time_in`, `time_out`) VALUES
(1, 'tessa@gmail.com', '2024-05-10', '09:12:01', '11:32:57'),
(2, 'tessa@gmail.com', '2024-05-10', '11:26:07', '11:32:57'),
(3, 'tessa@gmail.com', '2024-05-10', '11:33:16', '11:34:02'),
(4, 'tessa@gmail.com', '2024-05-10', '11:36:25', '11:36:47'),
(5, 'tessa@gmail.com', '2024-05-10', '11:36:53', '11:41:15'),
(6, 'tessa@gmail.com', '2024-05-10', '11:41:28', '11:43:27'),
(7, 'tessa@gmail.com', '2024-05-10', '11:45:15', '11:46:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indexes for table `visit_history`
--
ALTER TABLE `visit_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visit_history`
--
ALTER TABLE `visit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visit_history`
--
ALTER TABLE `visit_history`
  ADD CONSTRAINT `fk_user_email` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
