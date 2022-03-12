-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 09:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borderou`
--

CREATE TABLE `borderou` (
  `id` int(255) NOT NULL,
  `denumire_furnizor` varchar(255) NOT NULL,
  `nr_data_factura` longtext NOT NULL,
  `valoare` float NOT NULL,
  `scadenta` datetime NOT NULL,
  `observatii_solicitant` varchar(255) NOT NULL,
  `ultima_actualizare` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sheet`
--

CREATE TABLE `sheet` (
  `id` int(11) NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sheet`
--

INSERT INTO `sheet` (`id`, `fullname`, `email`, `phone`, `course`) VALUES
(26, 'Cosmin', 'test@test', '072 255 222', 'IT'),
(27, 'Andrei', 'andrei@yahoo.com', '072 222 222', 'IT'),
(28, 'Claudiu', 'claudiu@gmail.com', '072 222 553', 'IT'),
(29, 'test', 'test@yahoo.com', '072 222 553', 'HR'),
(30, 'Marian', 'marian@gmail.com', '072 222 222', 'CEO'),
(31, 'Cosmin', 'test@test', '072 255 222', 'IT'),
(32, 'Andrei', 'andrei@yahoo.com', '072 222 222', 'IT'),
(33, 'Claudiu', 'claudiu@gmail.com', '072 222 553', 'IT'),
(34, 'test', 'test@yahoo.com', '072 222 553', 'HR'),
(35, 'Marian', 'marian@gmail.com', '072 222 222', 'CEO'),
(36, 'Cosmin', 'test@test', '072 255 222', 'IT'),
(37, 'Alex', 'test@test', '072 222 553', 'CEO'),
(38, 'Andrei', 'andrei@yahoo.com', '072 222 222', 'IT'),
(39, 'Claudiu', 'claudiu@gmail.com', '072 222 553', 'IT'),
(40, 'test', 'test@yahoo.com', '072 222 553', 'HR'),
(41, 'Marian', 'marian@gmail.com', '072 222 222', 'CEO'),
(42, 'Cosmin', 'test@test', '072 255 222', 'IT'),
(43, 'Alex', 'test@test', '072 222 553', 'CEO'),
(44, 'V', 'v@test.com', '072 222 553', 'CEO'),
(45, 'Andrei', 'andrei@yahoo.com', '072 222 222', 'IT'),
(46, 'Claudiu', 'claudiu@gmail.com', '072 222 553', 'IT'),
(47, 'test', 'test@yahoo.com', '072 222 553', 'HR'),
(48, 'Marian', 'marian@gmail.com', '072 222 222', 'CEO'),
(49, 'Cosmin', 'test@test', '072 255 222', 'IT'),
(50, 'Alex', 'test@test', '072 222 553', 'CEO'),
(51, 'V', 'v@test.com', '072 222 553', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheet`
--
ALTER TABLE `sheet`
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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sheet`
--
ALTER TABLE `sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
