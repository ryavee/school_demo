-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2024 at 12:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `name`, `created_at`) VALUES
(12, 'class 1', '2024-06-22 09:48:17'),
(13, 'class 2', '2024-06-22 09:48:21'),
(14, 'class 3', '2024-06-22 09:48:26'),
(15, 'class 4', '2024-06-22 09:49:01'),
(16, 'class 5', '2024-06-22 09:49:07'),
(17, 'class 6', '2024-06-22 09:49:14'),
(18, 'class 7', '2024-06-22 10:07:38'),
(19, 'class 8', '2024-06-22 10:07:46'),
(20, 'class 9', '2024-06-22 10:07:51'),
(21, 'class 10', '2024-06-22 10:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `address`, `class_id`, `image`, `created_at`) VALUES
(8, 'Sai Anurag', 'Anurag@gmail.com', 'chennai', 12, 'pexels-cottonbro-4827576.jpg', '2024-06-22 10:08:49'),
(9, 'Mohith', 'mohith@gmail.com', 'pune', 12, 'pexels-armin-rimoldi-5553108.jpg', '2024-06-22 10:09:26'),
(10, 'Alisha', 'Alisha@gmail.com', 'Hyderabad', 21, 'pexels-mart-production-8472874.jpg', '2024-06-22 10:10:39'),
(11, 'Renuka', 'renuka@gmail.com', 'Bangalore', 20, 'pexels-a-darmel-7750978.jpg', '2024-06-22 10:11:35'),
(12, 'Bhaskar', 'bhaskar@gmail.com', 'New Delhi', 19, 'pexels-mikhail-nilov-7776963.jpg', '2024-06-22 10:13:35'),
(13, 'Hari', 'hari@gmail.com', 'Mumbai', 14, 'pexels-armin-rimoldi-5554303.jpg', '2024-06-22 10:14:16'),
(14, 'Rajat', 'rajat@gmail.com', 'Bhopal', 16, 'pexels-max-fischer-5211478.jpg', '2024-06-22 10:15:14'),
(15, 'satya', 'satya@gmail.com', 'jaipur', 12, 'pexels-rdne-7713135.jpg', '2024-06-22 10:15:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
