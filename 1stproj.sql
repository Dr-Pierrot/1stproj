-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 08:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1stproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `created_at`) VALUES
(9, 'asdasd', 'asdasd', 'asdasd', '2024-01-19 01:54:10'),
(15, 'asdas', 'asdas', 'asdas', '2024-01-19 06:38:17'),
(16, 'asdasd', 'asdasd', 'asdasdasd', '2024-01-22 05:29:14'),
(18, 'amdjas', 'amdjas', 'asdasd', '2024-01-22 07:11:43'),
(19, 'new1', 'new2', 'new3', '2024-01-22 05:29:14'),
(20, 'two', 'asdaasdas', 'asda', '2024-01-22 07:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studkey_id` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `enrol_stat` int(11) NOT NULL,
  `stud_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studkey_id`, `studentID`, `user_id`, `enrol_stat`, `stud_created`) VALUES
(1, 12, 1, 1, '2024-01-18'),
(2, 20, 2, 0, '2024-01-18'),
(3, 14, 1, 1, '2024-01-19'),
(4, 3, 1, 1, '2024-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'ManuelQuezon', 'Manuel@gmail.com', 'Manuel', 'Pass1234'),
(2, 'ManuelQuezon', 'asdas@gmail.com', 'Mani', 'Pass1234'),
(3, '123', 'mamam@hacker.com', 'Mama', 'pass123'),
(4, 'MAst4er Rocki', 'dasd@gmail.com', 'Master', 'Pass123'),
(5, 'dasd', 'dasdasd@gmail.com', 'asdasd', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studkey_id`),
  ADD KEY `user_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studkey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
