-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 12:33 PM
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
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_customer` char(6) NOT NULL,
  `Nama_customer` varchar(100) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Jenis_kelamin` char(1) NOT NULL,
  `No_hp` varchar(16) NOT NULL,
  `Bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_customer`, `Nama_customer`, `Alamat`, `Jenis_kelamin`, `No_hp`, `Bukti`) VALUES
('CTR001', 'Budi Santoso', 'Surabaya', 'L', '081234234234', 'bukti1.jpeg'),
('CTR002', 'Sisil Triana', 'Malang', 'P', '082345345345', 'bukti2.jpeg'),
('CTR003', 'Davi Liam', 'Surabaya', 'L', '082123123123', 'bukti4.jpeg'),
('CTR005', 'Hendra Asto', 'Sidoarjo', 'L', '085123123123', 'bukti3.jpeg'),
('CTRo04', 'Sustris Ten An', 'Malang', 'P', '085100100100', 'bukti1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'zaza', '$2y$10$i5etprJ3eGhTCGCcitrv.Oukp5g/XR.dpmTNUxcIgYaJEN09Kbp/K', ''),
(2, 'baba', '$2y$10$2LzV63RWoLNQiCaE7WNmDe50aIOIUH.On9z2JDh5lIqLwizIITulK', ''),
(3, 'jaja', '$2y$10$7Pxhv7YiiKtNlaGJAEWGE.g0KIWVCmGIN3Fj8mghI.e8pMJzNdH0u', ''),
(4, 'sasa', '$2y$10$LHHzht1lYS3UBRAo7dW1Z.GH8cGqI8DZy/toxPFHgtnb10XK.mOJy', ''),
(5, 'hwyfuwhk', '$2y$10$fYkunJgkqW28NMlRjXFOTutAxcutrySXCwTBE3VR890OlePaTpLmC', 'HXFQ'),
(6, 'hahahaha', '$2y$10$.NWDt/7/8QDJp18eYLg1bOuwR11RJ7LOvPtvuj3hjKHjjgdaWjh06', '222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
