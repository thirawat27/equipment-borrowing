-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 04:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eb_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_borrowing`
--

CREATE TABLE `equipment_borrowing` (
  `id` int(11) NOT NULL,
  `equipment` varchar(225) NOT NULL,
  `amount` int(11) NOT NULL,
  `borrower` varchar(225) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_borrowing`
--

INSERT INTO `equipment_borrowing` (`id`, `equipment`, `amount`, `borrower`, `name`, `created_at`, `updated_at`) VALUES
(1, 'คีมตัดสายไฟ', 7, 'นายอุทิศ ลีละวัฒน์	', 'นายหาญกล้า โพธิรัชต์', '2023-02-06', '2023-02-07'),
(2, 'ไขควงแฉก', 9, 'นายอุทิศ ลีละวัฒน์	', 'นายสมศัก คงสวัสดิ์', '2023-02-05', '2023-02-10'),
(3, 'สว่านไฟฟ้า', 5, 'นายอุทิศ ลีละวัฒน์	', 'นายภูมิภักดิ์ เดชสถิตดิ์', '2023-02-11', '2023-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_list`
--

CREATE TABLE `equipment_list` (
  `equipment_id` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment_list`
--

INSERT INTO `equipment_list` (`equipment_id`, `equipment_name`) VALUES
(1, 'ไขควงแฉก'),
(2, 'มัลติมิเตอร์'),
(3, 'สว่านไฟฟ้า'),
(4, 'ชุดเข้าLAN'),
(5, 'คีมตัดสายไฟ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_borrowing`
--
ALTER TABLE `equipment_borrowing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_borrowing`
--
ALTER TABLE `equipment_borrowing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
