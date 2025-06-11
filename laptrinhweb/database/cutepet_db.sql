-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: localhost
-- Generation Time: May 23, 2025 at 12:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- --------------------------------------------------------------
--
-- Table structure for table `user` (bảng người dùng)
--
CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Admin','Staff', 'Customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user` (bảng người dùng)
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `phone`, `type`, `created_at`, `updated_at`) VALUES
(1,  'Nguyen Van A', 'nguyanvana1@gmail.com','123','0123456789', 'Admin', '2025-05-23 00:00:00', '2025-05-23 00:00:00'),
(2, 'Nguyen Van B', 'nguyenvanb2@gmail.com', '012', '0234567890', 'Staff', '2025-05-23 00:00:00', '2025-05-23 00:00:00'),
(3, 'Nguyen Van C', 'nguyenvanc3@gmail.com','234', '0345678912', 'Customer',NULL,NULL);
--
-- Indexes for table `user` (bảng người dùng)
--
ALTER TABLE `user`
ADD PRIMARY KEY (`user_id`),
ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


--
-- Table structure for table `customer` (bảng khách hàng)
--
CREATE TABLE `customer` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user` (bảng khách hàng)
--

INSERT INTO `customer` (`user_id`, `address`) VALUES
(3, '1 Quang Trung, Go Vap, TP.HCM');
--
-- Indexes for table `user` (bảng khách hàng)
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`),
  ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Table structure for table `user` (bảng nhân viên)
--
CREATE TABLE `staff` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user` (bảng nhân viên)
--

INSERT INTO `staff` (`user_id`, `department`) VALUES
(2, "Ban hang");
--
-- Indexes for table `user` (bảng nhân viên)
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`user_id`),
  ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Table structure for table `user` (bảng người dùng)
--
CREATE TABLE `admin` (
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user` (bảng người dùng)
--

INSERT INTO `admin` (`user_id`) VALUES
(1)
--
-- Indexes for table `user` (bảng người dùng)
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
