-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 09:23 AM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `photo`, `name`, `description`) VALUES
(1, 'Image 12.jpg', 'Kaung Nyi Thit', 'PHP/Laravel Web Developer');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `certificate_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `certificate_name`, `date`) VALUES
(15, 'Certificate in Programming Basic at Fairway Technology', '2024-01-24'),
(16, 'Certificate in Professional Web Developer at Fairway Technology', '2024-06-02'),
(17, 'Certificate in Essential Skills for Business Careers at Strategy First University', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `diplomas`
--

CREATE TABLE `diplomas` (
  `id` int(11) NOT NULL,
  `diploma_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diplomas`
--

INSERT INTO `diplomas` (`id`, `diploma_name`, `date`) VALUES
(1, 'Diploma in Business English (ABE Endorsed,UK)', '2021-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `responsed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `user_id`, `response`, `created_at`, `responsed_at`) VALUES
(12, 'Kaung Nyi Thit', 'bob@email.com', 'Hi', 1, '', '2024-12-05 17:32:16', NULL),
(13, 'Kaung Nyi Thit', 'bob@email.com', 'lee', 1, 'Kmkl', '2024-12-05 17:32:27', '2024-12-05 17:24:58'),
(14, 'Cnexx', 'bob@email.com', 'Hi', 2, 'Helloo\r\n', '2024-12-05 00:09:07', '2024-11-18 21:17:25'),
(15, 'Alice', 'alice@gmail.com', 'Hi\r\n', 3, 'Hey!', '2024-12-05 00:48:13', '2024-11-18 20:59:06'),
(16, 'Alice', 'alice@gmail.com', 'Min gal lar par', 3, 'ok', '2024-12-05 00:48:20', '2024-11-18 21:12:52'),
(17, 'Alice', 'alice@gmail.com', 'Hi', 3, '', '2024-12-05 15:04:42', NULL),
(18, 'Cnexx', 'Cnexx@email.com', 'Hi', 13, 'Hey\r\n\r\n', '2024-12-05 17:46:44', '2024-12-05 17:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_language` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_language`, `created_at`) VALUES
(3, 'E-commerce', 'Laravel', '2024-11-05 16:39:12'),
(4, 'Hotel-Management', 'PHP', '2024-11-05 16:18:03'),
(5, 'Portfolio', 'PHP', '2024-11-05 16:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Kaung Nyi Thit', 'bob@email.com', '$2y$10$SxLXzTGUZBv9jm74Bf8u7On1swDk/78tYa0l7i2G3Mrw3mhsy7ILa', 'admin'),
(3, 'Alice', 'alice@gmail.com', '$2y$10$K3Asjh4ykBABy8xXN7p3suucRoKnwd96cXmiSR.O6XKANShxBSCJC', 'user'),
(11, 'Mini', 'mini@email.com', '$2y$10$i8VPH4Kt9HkNvrjGel5xdeRyhf5dc2yrFx59M/zKsKUZEH7OQOnk2', 'user'),
(13, 'Cnexx', 'Cnexx@email.com', '$2y$10$uhPF8Ni2twfSSEf7OjqIcuHyOZnE6GdgPnOwnBPTUSVXSJPjz6Fr2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
