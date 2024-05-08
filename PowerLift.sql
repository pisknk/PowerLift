-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2024 at 04:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 'Testing', 'Joe', 'joemama@aol.com', '$2y$10$XQtvHjoiiFPTjY1NTDiAtu1S3HhJlTLvB26ynGaCbO3h0sYIo9OEm', 6, 'NYG-5608', 'users', '2024-05-08', '2024-11-08'),
(2, 'Neil', 'Bayron', 'admin@admin.lol', '$2y$10$n0Ls0HYtSl/iBXopj3jBbOiRY8ziBIhi26enqgjq7ywHAMfT6Z4m2', 6, 'VIZ-0514', 'admin', '2024-05-06', '2024-11-06'),
(4, 'Testing', '2', '2001101888@student.buksu.edu.ph', '$2y$10$tt4xQyHf1hqQiLFwr7PWl.Oby1bWilPgWKVsRzH8YE/UN6dzNob3.', 12, 'XQN-0654', 'users', '2024-05-06', '2025-05-06'),
(5, 'Testing', '3', '2001101888@student.buksu.edu.ph', '$2y$10$XDkDaQULt0Lv0eK86CXy9OX5F.zivU9/6gshaGSHPeEVjGnHTKsUe', 1, 'LTB-9742', 'users', '2024-05-06', '2024-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
