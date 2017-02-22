-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 06:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_password` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `mail`, `password`, `confirm_password`, `created_at`, `updated_at`) VALUES
(1, 'Trieu Man Man', 'Trieu Man Thong Minh ', '', '1234', 1234, '2017-02-22 17:23:31', '2017-02-22 17:23:31'),
(8, 'Ham Huong', ' Huong H', '', '1234', 1234, '2017-02-22 17:30:53', '2017-02-22 17:30:53'),
(9, 'Co Co Pice', 'conuong ', '', '1234', 1234, '2017-02-22 17:29:13', '2017-02-22 17:29:13'),
(10, 'Hoang Dung Muoi Muoi', 'Hoang Dung Xinh dep', 'hoangdung@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 7110, '2017-02-22 16:55:11', '2017-02-22 16:55:11');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
