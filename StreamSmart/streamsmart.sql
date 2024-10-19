-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 01:17 PM
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
-- Database: `streamsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `amazon_subscriptions`
--

CREATE TABLE `amazon_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `issued` enum('yes','no') DEFAULT 'no',
  `team_id` int(11) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amazon_subscriptions`
--

INSERT INTO `amazon_subscriptions` (`subscription_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `plan`, `subscription_date`, `issued`, `team_id`, `issued_date`, `expire_date`) VALUES
(1, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09381573753', 'Monthly', '2024-08-30 19:48:59', 'no', NULL, NULL, NULL),
(2, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09381573753', 'Yearly', '2024-08-30 19:49:12', 'no', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotstar_subscriptions`
--

CREATE TABLE `hotstar_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `issued` enum('yes','no') DEFAULT 'no',
  `team_id` int(11) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotstar_subscriptions`
--

INSERT INTO `hotstar_subscriptions` (`subscription_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `plan`, `subscription_date`, `issued`, `team_id`, `issued_date`, `expire_date`) VALUES
(1, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09381573753', 'Monthly', '0000-00-00 00:00:00', 'no', NULL, NULL, NULL),
(2, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09381573753', 'Monthly', '2024-08-30 19:46:31', 'no', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `netflix_subscriptions`
--

CREATE TABLE `netflix_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `issued` enum('yes','no') DEFAULT 'no',
  `team_id` int(11) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `netflix_subscriptions`
--

INSERT INTO `netflix_subscriptions` (`subscription_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `plan`, `subscription_date`, `issued`, `team_id`, `issued_date`, `expire_date`) VALUES
(1, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09640658755', 'Monthly', '0000-00-00 00:00:00', 'yes', 1, '2024-08-30 19:37:58', '2024-09-30 19:37:58'),
(2, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '08654321790', 'Monthly', '0000-00-00 00:00:00', 'yes', 1, '2024-08-30 19:37:58', '2024-09-30 19:37:58'),
(3, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '08897541984', 'Monthly', '0000-00-00 00:00:00', 'yes', 1, '2024-08-30 19:37:58', '2024-09-30 19:37:58'),
(5, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '09640658755', 'Monthly', '0000-00-00 00:00:00', 'yes', 1, '2024-08-30 19:37:58', '2024-09-30 19:37:58'),
(7, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '09640658755', 'Monthly', '2024-08-30 19:35:20', 'yes', 2, '2024-08-30 19:40:32', '2024-10-04 19:40:32'),
(8, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '07989690618', 'Monthly', '2024-08-30 19:39:43', 'yes', 2, '2024-08-30 19:40:32', '2024-10-04 19:40:32'),
(10, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '09640658755', 'Monthly', '2024-08-30 19:39:54', 'yes', 2, '2024-08-30 19:40:32', '2024-10-04 19:40:32'),
(11, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '08654321790', 'Monthly', '2024-08-30 19:39:59', 'yes', 2, '2024-08-30 19:40:32', '2024-10-04 19:40:32'),
(12, 4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '08654321790', 'Monthly', '2024-08-30 19:40:04', 'no', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spotify_subscriptions`
--

CREATE TABLE `spotify_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `issued` enum('yes','no') DEFAULT 'no',
  `team_id` int(11) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spotify_subscriptions`
--

INSERT INTO `spotify_subscriptions` (`subscription_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `plan`, `subscription_date`, `issued`, `team_id`, `issued_date`, `expire_date`) VALUES
(1, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '07989690617', 'Duo', '2024-08-30 19:52:11', 'no', NULL, NULL, NULL),
(2, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '08654321790', 'Family', '2024-08-30 19:52:17', 'no', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `subscriptions` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `dob`, `gender`, `password`, `subscriptions`) VALUES
(1, 'Sesha', 'satya sai', 'Puvvala', 'seshasatyasai2003@gmail.com', '2003-04-03', 'male', '$2y$10$ZB/ioyg7ocdpLaCG/h.sa.he5Rbfe9C3/S3wCuzwofPsBrFIChyB6', 0),
(3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '2003-07-07', 'female', '$2y$10$jK6aWdq0sc/b/0PVOO7vIun0U1YXR4v8yGJwft54pGQLekO6GK6uq', 2),
(4, 'Dhatri', '', 'Boddepalli', 'dhatriboddepalli@gmail.com', '2003-09-10', 'female', '$2y$10$abwSoMjbXcawMfp3M/wwBOuct4M8FfB5PCTCF/s.rP1Yjwst7Iq8y', 6);

-- --------------------------------------------------------

--
-- Table structure for table `youtube_subscriptions`
--

CREATE TABLE `youtube_subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `subscription_date` datetime NOT NULL,
  `issued` enum('yes','no') DEFAULT 'no',
  `team_id` int(11) DEFAULT NULL,
  `issued_date` datetime DEFAULT NULL,
  `expire_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube_subscriptions`
--

INSERT INTO `youtube_subscriptions` (`subscription_id`, `user_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile`, `plan`, `subscription_date`, `issued`, `team_id`, `issued_date`, `expire_date`) VALUES
(1, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '07989690617', 'Monthly', '2024-08-30 19:50:30', 'no', NULL, NULL, NULL),
(2, 3, 'Ramya', '', 'Pamula', 'ramyapamula2003@gmail.com', '07989690617', 'Monthly', '2024-08-30 19:50:43', 'no', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amazon_subscriptions`
--
ALTER TABLE `amazon_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hotstar_subscriptions`
--
ALTER TABLE `hotstar_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `netflix_subscriptions`
--
ALTER TABLE `netflix_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `spotify_subscriptions`
--
ALTER TABLE `spotify_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `youtube_subscriptions`
--
ALTER TABLE `youtube_subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amazon_subscriptions`
--
ALTER TABLE `amazon_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotstar_subscriptions`
--
ALTER TABLE `hotstar_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `netflix_subscriptions`
--
ALTER TABLE `netflix_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `spotify_subscriptions`
--
ALTER TABLE `spotify_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `youtube_subscriptions`
--
ALTER TABLE `youtube_subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amazon_subscriptions`
--
ALTER TABLE `amazon_subscriptions`
  ADD CONSTRAINT `amazon_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hotstar_subscriptions`
--
ALTER TABLE `hotstar_subscriptions`
  ADD CONSTRAINT `hotstar_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `netflix_subscriptions`
--
ALTER TABLE `netflix_subscriptions`
  ADD CONSTRAINT `netflix_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `spotify_subscriptions`
--
ALTER TABLE `spotify_subscriptions`
  ADD CONSTRAINT `spotify_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `youtube_subscriptions`
--
ALTER TABLE `youtube_subscriptions`
  ADD CONSTRAINT `youtube_subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
