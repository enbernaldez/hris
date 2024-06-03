-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 05:45 AM
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
-- Database: `hris_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `employee_lastname` varchar(64) NOT NULL,
  `employee_firstname` varchar(64) NOT NULL,
  `employee_middlename` varchar(64) NOT NULL,
  `employee_nameext` varchar(4) NOT NULL,
  `employee_imgdir` varchar(256) DEFAULT NULL,
  `employee_office` varchar(16) NOT NULL,
  `employee_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active / I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `position_id`, `employee_lastname`, `employee_firstname`, `employee_middlename`, `employee_nameext`, `employee_imgdir`, `employee_office`, `employee_status`) VALUES
(11, 22, 'Vargas', 'Ana', 'Sotto', 'N/A', 'id_pictures/Vargas, Ana Sotto.jpg', 'SOCD', 'A'),
(15, 23, 'Doe', 'Allen', 'Diaz', 'N/A', 'id_pictures/Doe, Allen Diaz.jpg', 'SOCD', 'A'),
(16, 24, 'VIDAL', 'MARTA', 'sOLER', 'N/A', 'id_pictures/VIDAL, MARTA sOLER.jpg', 'SOCD', 'A'),
(17, 25, 'JUAREZ', 'JAVIER', 'CRESPO', 'N/A', 'id_pictures/JUAREZ, JAVIER CRESPO.jpg', 'ALBAY', 'A'),
(19, NULL, '', '', 'N/A', 'N/A', NULL, '', 'I'),
(20, 1, 'SABADO', 'ANJA', 'N/A', 'N/A', 'id_pictures/SABADO, ANJA.jpg', 'ALBAY', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
