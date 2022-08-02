-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 11:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `Admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `datess` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`Admin_id`, `username`, `pwd`, `datess`) VALUES
(1, 'Admin', 'Password', '2022-07-06 20:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `guest_tbl`
--

CREATE TABLE `guest_tbl` (
  `id` int(11) NOT NULL,
  `Guest_name` varchar(200) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `Res_Num` varchar(10) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `Guest_ID` varchar(6) NOT NULL,
  `datess` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_tbl`
--

INSERT INTO `guest_tbl` (`id`, `Guest_name`, `Gender`, `Address`, `phone`, `Res_Num`, `pwd`, `Guest_ID`, `datess`) VALUES
(4, 'John Obi Peter', 'Male', '213 Makera Estate', '08134326791', '1', 'Password', '15997', '2022-07-06 21:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `Res_id` int(11) NOT NULL,
  `Res_Num` varchar(10) NOT NULL,
  `datess` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_tbl`
--

INSERT INTO `reservation_tbl` (`Res_id`, `Res_Num`, `datess`) VALUES
(1, '4', '2022-07-06 20:22:38'),
(2, '11', '2022-07-06 20:23:36'),
(3, '15', '2022-07-06 20:33:22'),
(4, '1', '2022-07-06 21:21:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `guest_tbl`
--
ALTER TABLE `guest_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`Res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_tbl`
--
ALTER TABLE `guest_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  MODIFY `Res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
