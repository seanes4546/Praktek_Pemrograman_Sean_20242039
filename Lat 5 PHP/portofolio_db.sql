-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2026 at 04:00 AM
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
-- Database: `portofolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `username`, `email`, `comment`, `created_at`) VALUES
(1, 'sean', 'sean.audhie@gmail.com', 'nigga', '2026-09-23 07:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `review_ratings`
--

CREATE TABLE `review_ratings` (
  `id` int(11) NOT NULL,
  `star_label` varchar(20) NOT NULL,
  `total_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_ratings`
--

INSERT INTO `review_ratings` (`id`, `star_label`, `total_votes`) VALUES
(1, '1 Star', 15),
(2, '2 Star', 34),
(3, '3 Star', 65),
(4, '4 Star', 27),
(5, '5 Star', 55);

-- --------------------------------------------------------

--
-- Table structure for table `web_content`
--

CREATE TABLE `web_content` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_content`
--

INSERT INTO `web_content` (`id`, `section_name`, `title`, `content`) VALUES
(1, 'services', 'SERVICES', 'We provide expert PLC, C++, and Arduino programming to turn hardware concepts into robust, production-ready systems. From factory-grade automation logic to optimized embedded C++ firmware.'),
(2, 'about', 'ABOUT', 'We provide expert PLC, C++, and Arduino programming to turn hardware concepts into robust systems. We deliver clean, modular code that scales prototypes and eliminates industrial downtime.'),
(3, 'contact', 'CONTACT', 'Ready to build your next system? Get in touch for expert PLC, C++, and Arduino programming that turns hardware concepts into robust reality, eliminates industrial downtime, and scales prototypes seamlessly.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_ratings`
--
ALTER TABLE `review_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_content`
--
ALTER TABLE `web_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_ratings`
--
ALTER TABLE `review_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_content`
--
ALTER TABLE `web_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
