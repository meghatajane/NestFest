-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 05:01 AM
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
-- Database: `pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `pg_mess_id` int(11) NOT NULL,
  `feedback_type` tinyint(1) NOT NULL COMMENT '1-PG,2-MESS',
  `rate` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `pg_mess_id`, `feedback_type`, `rate`, `comment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 4, 'Good', 6, 0, '2024-01-17 05:43:39', '2024-01-17 05:43:39'),
(2, 1, 2, 5, 'Awesome Experience', 6, 0, '2024-01-17 05:48:02', '2024-01-17 05:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `messes`
--

CREATE TABLE `messes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `note` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messes`
--

INSERT INTO `messes` (`id`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `rent`, `note`, `capacity`, `is_approved`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shree Khodiyar Ma', 'khodiyarma@gmail.com', 4567891230, 'India', 'Maharasthra', 'Nashik', 'Nashik, Maharasthra, India', 5000.00, 'Nothing like anything', 25, 1, 1, 4, 4, '2024-01-16 03:40:35', '2024-01-16 03:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `mess_bookings`
--

CREATE TABLE `mess_bookings` (
  `id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  `mess_amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-Pending,1-Approved,2-declined',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-pending,1-completed,2-not completed',
  `documents` longtext NOT NULL,
  `screenshot` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mess_bookings`
--

INSERT INTO `mess_bookings` (`id`, `mess_id`, `mess_amount`, `status`, `payment_status`, `documents`, `screenshot`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 1, 5000.00, 1, 1, '[{\"item_id\":1,\"avatar\":\"170554997094301.jpg\"},{\"item_id\":2,\"avatar\":\"170554997019124.jpg\"}]', '1705550094_df70535d727aefa9dd7a.jpg', 6, 6, '2024-01-18 03:52:50', '2024-01-18 03:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `pgs`
--

CREATE TABLE `pgs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `note` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pgs`
--

INSERT INTO `pgs` (`id`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `rent`, `note`, `capacity`, `is_approved`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Narendra PG', 'narendra@gmail.com', 7845123690, 'India', 'Gujarat', 'Porbandar', 'Ahmedabad, Gujarat, India', 20000.00, 'Nothing', 20, 1, 1, 2, 2, '2024-01-16 02:52:41', '2024-01-16 02:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `pg_bookings`
--

CREATE TABLE `pg_bookings` (
  `id` int(11) NOT NULL,
  `pg_id` int(11) NOT NULL,
  `pg_amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-Pending,1-Approved,2-declined',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-pending,1-completed,2-not completed',
  `documents` longtext NOT NULL,
  `screenshot` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pg_bookings`
--

INSERT INTO `pg_bookings` (`id`, `pg_id`, `pg_amount`, `status`, `payment_status`, `documents`, `screenshot`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 20000.00, 1, 1, '[{\"item_id\":1,\"avatar\":\"170554691118091.jpg\"},{\"item_id\":2,\"avatar\":\"170554691194886.jpg\"},{\"item_id\":3,\"avatar\":\"170554691143646.jpg\"}]', '1705548290_6d9fe29b98996808335b.jpg', 6, 6, '2024-01-18 03:01:51', '2024-01-18 03:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `photo_type` tinyint(1) NOT NULL COMMENT '1-PG,2-MESS',
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `parent_id`, `photo_type`, `avatar`) VALUES
(4, 5, 1, '170537356198665.jpg'),
(5, 5, 1, '170537356158709.jpg'),
(6, 5, 1, '170537356179360.jpg'),
(7, 5, 1, '170537357575124.jpg'),
(8, 5, 1, '170537357592233.jpg'),
(9, 1, 2, '170537654727229.jpg'),
(11, 1, 2, '170537654783477.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1-SA,2-PG,3-MESS,4-STUDENT',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `qrcode`, `password`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin@gmail.com', 9876543210, '', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2024-01-15 07:17:16', '2024-01-15 07:17:16'),
(2, 'PG Owner 1', 'pgowner1@gmail.com', 9988776655, '1705384126_f265cda2b9b5ccda8aaf.png', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2024-01-15 07:11:32', '2024-01-15 07:11:32'),
(3, 'PG 2 Owner', 'pg_owner2@gmail.com', 8574963210, '', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2024-01-15 07:14:33', '2024-01-15 07:14:33'),
(4, 'Mess Owner 1', 'mess_owner1@gmail.com', 5874123690, '1705550081_bc74dc90c753447e8adb.jpeg', 'e10adc3949ba59abbe56e057f20f883e', 3, 1, '2024-01-15 07:15:23', '2024-01-15 07:15:23'),
(5, 'Mess Owner 2', 'mess_owner2@gmail.com', 5874123690, '', 'e10adc3949ba59abbe56e057f20f883e', 3, 1, '2024-01-15 07:15:44', '2024-01-15 07:15:44'),
(6, 'Student 1', 'student1@gmail.com', 3214567890, '1705550061_b4bbcf629bcdd44eb413.jpeg', 'e10adc3949ba59abbe56e057f20f883e', 4, 1, '2024-01-15 07:16:28', '2024-01-15 07:16:28'),
(7, 'Student 2', 'student2@gmail.com', 5869741230, '', 'e10adc3949ba59abbe56e057f20f883e', 4, 0, '2024-01-15 07:16:46', '2024-01-15 07:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messes`
--
ALTER TABLE `messes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess_bookings`
--
ALTER TABLE `mess_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pgs`
--
ALTER TABLE `pgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pg_bookings`
--
ALTER TABLE `pg_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messes`
--
ALTER TABLE `messes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mess_bookings`
--
ALTER TABLE `mess_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pgs`
--
ALTER TABLE `pgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pg_bookings`
--
ALTER TABLE `pg_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
