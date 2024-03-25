-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 09:31 AM
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
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `barangay_id` int(11) NOT NULL,
  `citymunicipality_id` int(11) NOT NULL,
  `barangay_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city_municipality`
--

CREATE TABLE `city_municipality` (
  `citymunicipality_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `citymunicipality_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_municipality`
--

INSERT INTO `city_municipality` (`citymunicipality_id`, `province_id`, `citymunicipality_name`) VALUES
(1, 1, 'Bacacay'),
(2, 1, 'Camalig'),
(3, 1, 'Daraga'),
(4, 1, 'Guinobatan'),
(5, 1, 'Jovellar'),
(6, 1, 'Legazpi'),
(7, 1, 'Libon'),
(8, 1, 'Ligao'),
(9, 1, 'Malilipot'),
(10, 1, 'Malinao'),
(11, 1, 'Manito'),
(12, 1, 'Oas'),
(13, 1, 'Pio Duran'),
(14, 1, 'Polangui'),
(15, 1, 'Rapu-Rapu'),
(16, 1, 'Santo Domingo'),
(17, 1, 'Tabaco'),
(18, 1, 'Tiwi'),
(19, 2, 'Basud'),
(20, 2, 'Capalonga'),
(21, 2, 'Daet'),
(22, 2, 'Jose Panganiban'),
(23, 2, 'Labo'),
(24, 2, 'Mercedes'),
(25, 2, 'Paracale'),
(26, 2, 'San Lorenzo Ruiz'),
(27, 2, 'San Vicente'),
(28, 2, 'Santa Elena'),
(29, 2, 'Talisay'),
(30, 2, 'Vinzons'),
(31, 3, 'Baao'),
(32, 3, 'Balatan'),
(33, 3, 'Bato'),
(34, 3, 'Bombon'),
(35, 3, 'Buhi'),
(36, 3, 'Bula'),
(37, 3, 'Cabusao'),
(38, 3, 'Calabanga'),
(39, 3, 'Camaligan'),
(40, 3, 'Canaman'),
(41, 3, 'Caramoan'),
(42, 3, 'Del Gallego'),
(43, 3, 'Gainza'),
(44, 3, 'Garchitorena'),
(45, 3, 'Goa'),
(46, 3, 'Iriga'),
(47, 3, 'Lagonoy'),
(48, 3, 'Lagonoy'),
(49, 3, 'Lupi'),
(50, 3, 'Magarao'),
(51, 3, 'Milaor'),
(52, 3, 'Minalabac'),
(53, 3, 'Nabua'),
(54, 3, 'Naga'),
(55, 3, 'Ocampo'),
(56, 3, 'Pamplona'),
(57, 3, 'Pasacao'),
(58, 3, 'Pili'),
(59, 3, 'Presentacion'),
(60, 3, 'Ragay'),
(61, 3, 'Sagñay'),
(62, 3, 'San Fernando'),
(63, 3, 'San Jose'),
(64, 3, 'Sipocot'),
(65, 3, 'Siruma'),
(66, 3, 'Tigaon'),
(67, 3, 'Tinambac'),
(68, 4, 'Bagamanoc'),
(69, 4, 'Baras'),
(70, 4, 'Bato'),
(71, 4, 'Caramoran'),
(72, 4, 'Gigmoto'),
(73, 4, 'Pandan'),
(74, 4, 'Panganiban'),
(75, 4, 'San Andres'),
(76, 4, 'San Miguel'),
(77, 4, 'Viga'),
(78, 4, 'Virac'),
(79, 5, 'Aroroy'),
(80, 5, 'Baleno'),
(81, 5, 'Balud'),
(82, 5, 'Batuan'),
(83, 5, 'Cataingan'),
(84, 5, 'Cawayan'),
(85, 5, 'Claveria'),
(86, 5, 'Dimasalang'),
(87, 5, 'Esperanza'),
(88, 5, 'Mandaon'),
(89, 5, 'Masbate City'),
(90, 5, 'Milagros'),
(91, 5, 'Mobo'),
(92, 5, 'Monreal'),
(93, 5, 'Palanas'),
(94, 5, 'Pio V. Corpuz'),
(95, 5, 'Placer'),
(96, 5, 'San Fernando'),
(97, 5, 'San Jacinto'),
(98, 5, 'San Pascual'),
(99, 5, 'Uson'),
(100, 6, 'Barcelona'),
(101, 6, 'Bulan'),
(102, 6, 'Bulusan'),
(103, 6, 'Casiguran'),
(104, 6, 'Castilla'),
(105, 6, 'Donsol'),
(106, 6, 'Gubat'),
(107, 6, 'Irosin'),
(108, 6, 'Juban'),
(109, 6, 'Magallanes'),
(110, 6, 'Matnog'),
(111, 6, 'Pilar'),
(112, 6, 'Prieto Diaz'),
(113, 6, 'Santa Magdalena'),
(114, 6, 'Sorsogon City');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_agencyno` int(11) NOT NULL,
  `employee_lastname` varchar(64) NOT NULL,
  `employee_firstname` varchar(64) NOT NULL,
  `employee_middlename` varchar(64) NOT NULL,
  `employee_nameext` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_agencyno`, `employee_lastname`, `employee_firstname`, `employee_middlename`, `employee_nameext`) VALUES
(1, 0, 'Vargas', 'Ana', 'Sotto', NULL),
(2, 0, 'Cruz', 'Mae', 'Sario', NULL),
(3, 0, 'Doe', 'Allen', 'Diaz', NULL),
(4, 0, 'Vidal', 'Marta', 'Soler', NULL),
(5, 0, 'Hernandez', 'Cristina', 'Carmona', NULL),
(6, 0, 'Duran', 'Cristian', 'Ramos', NULL),
(7, 0, 'Gomez', 'Cesar', 'Gil', 'III'),
(8, 0, 'Torres', 'Angela', 'Arias', NULL),
(9, 0, 'Lorenzo', 'Elena', 'Pilar', NULL),
(10, 0, 'Juarez', 'Javier', 'Crespo', 'Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `house_block_lot`
--

CREATE TABLE `house_block_lot` (
  `houseblocklot_id` int(11) NOT NULL,
  `houseblocklot_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `pi_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `pii_birthplace` int(11) NOT NULL,
  `citizenship_country_id` int(11) NOT NULL,
  `radd_zipcode_id` int(11) NOT NULL,
  `radd_province_id` int(11) NOT NULL,
  `radd_citymunicipality_id` int(11) NOT NULL,
  `radd_barangay_id` int(11) NOT NULL,
  `radd_subdivisionvillage_id` int(11) NOT NULL,
  `radd_street_id` int(11) NOT NULL,
  `radd_houseblocklot_id` int(11) NOT NULL,
  `padd_zipcode_id` int(11) NOT NULL,
  `padd_province_id` int(11) NOT NULL,
  `padd_citymunicipality_id` int(11) NOT NULL,
  `padd_barangay_id` int(11) NOT NULL,
  `padd_subdivisionvillage_id` int(11) NOT NULL,
  `padd_street_id` int(11) NOT NULL,
  `padd_houseblocklot_id` int(11) NOT NULL,
  `pi_bday` date NOT NULL,
  `pi_sex` char(1) NOT NULL COMMENT 'M = Male /\r\nF = Female',
  `pi_civilstatus` char(1) NOT NULL COMMENT 'S = Single /\r\nM = Married /\r\nC = Common law /\r\nW = Widowed /\r\nH = Separated',
  `pi_height` int(11) NOT NULL,
  `pi_weight` int(11) NOT NULL,
  `pi_bloodtype` varchar(2) NOT NULL,
  `pi_citizenship` char(1) NOT NULL COMMENT 'F = Filipino /\r\nB = dual citizenship by Birth /\r\nN = dual citizenship by Naturalization',
  `pi_gsis_idno` int(11) NOT NULL,
  `pi_pagibig_idno` int(11) NOT NULL,
  `pi_philhealth_no` int(11) NOT NULL,
  `pi_sss_no` int(11) NOT NULL,
  `pi_tin_no` int(11) NOT NULL,
  `pi_tel_no` varchar(16) NOT NULL,
  `pi_mobile_no` varchar(11) NOT NULL,
  `pi_emailadd` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(64) NOT NULL,
  `position_salarygrade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_name`, `position_salarygrade`) VALUES
(1, 'Regional Director', 26),
(2, 'Chief Administrative Officer', 24),
(3, 'Chief Statistical Specialist', 24),
(4, 'Supervising Statistical Specialist', 22),
(5, 'Registration Officer IV', 22),
(6, 'Senior Statistical Specialist', 19),
(7, 'Registration Officer III', 18),
(8, 'Accountant III', 18),
(9, 'Statistical Specialist II', 16),
(10, 'Administrative Officer IV', 15),
(11, 'Administrative Officer III', 14),
(12, 'Information Systems Analyst I', 12),
(13, 'Information Officer I', 11),
(14, 'Statistical Analyst', 11),
(15, 'Administrative Assistant III', 9),
(16, 'Assistant Statistician', 9),
(17, 'Administrative Assistant II', 8),
(18, 'Administrative Assistant I', 7),
(19, 'Administrative Aide VI', 6),
(20, 'Administrative Aide III', 3);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `province_name`) VALUES
(1, 'Albay'),
(2, 'Camarines Norte'),
(3, 'Camarines Sur'),
(4, 'Catanduanes'),
(5, 'Masbate'),
(6, 'Sorsogon');

-- --------------------------------------------------------

--
-- Table structure for table `rsso_v`
--

CREATE TABLE `rsso_v` (
  `rsso_id` int(11) NOT NULL,
  `rsso_name` varchar(128) NOT NULL,
  `rsso_acronym` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rsso_v`
--

INSERT INTO `rsso_v` (`rsso_id`, `rsso_name`, `rsso_acronym`) VALUES
(1, 'Office of the Regional Director', 'ORD'),
(2, 'Civil Registration and Administrative Support Division', 'CRASD'),
(3, 'Statistical Operations and Coordination Division', 'SOCD');

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `street_id` int(11) NOT NULL,
  `street_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_village`
--

CREATE TABLE `subdivision_village` (
  `subdivisionvillage_id` int(11) NOT NULL,
  `subdivisionvillage_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_pwdhash` varchar(128) NOT NULL,
  `user_type` char(1) NOT NULL COMMENT 'A = Admin /\r\nE = Employee',
  `user_status` char(1) NOT NULL COMMENT 'A = Active /\r\nI = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pwdhash`, `user_type`, `user_status`) VALUES
(1, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$cjMwbFJLRnR2U05wSmZxRg$sOdQlqSf3wUPH31zgIk3rptVkAXr/5NXO8x0fa1eiG0', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `zipcodes`
--

CREATE TABLE `zipcodes` (
  `zipcode_id` int(11) NOT NULL,
  `citymunicipality_id` int(11) NOT NULL,
  `zipcode_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`barangay_id`),
  ADD KEY `citymunicipality_id` (`citymunicipality_id`);

--
-- Indexes for table `city_municipality`
--
ALTER TABLE `city_municipality`
  ADD PRIMARY KEY (`citymunicipality_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `house_block_lot`
--
ALTER TABLE `house_block_lot`
  ADD PRIMARY KEY (`houseblocklot_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`pi_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `pii_birthplace` (`pii_birthplace`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `citizenship_country_id` (`citizenship_country_id`),
  ADD KEY `radd_zipcode_id` (`radd_zipcode_id`),
  ADD KEY `radd_province_id` (`radd_province_id`),
  ADD KEY `radd_citymunicipality_id` (`radd_citymunicipality_id`),
  ADD KEY `radd_barangay_id` (`radd_barangay_id`),
  ADD KEY `radd_subdivisionvillage_id` (`radd_subdivisionvillage_id`),
  ADD KEY `radd_street_id` (`radd_street_id`),
  ADD KEY `radd_houseblocklot_id` (`radd_houseblocklot_id`),
  ADD KEY `padd_zipcode_id` (`padd_zipcode_id`),
  ADD KEY `padd_province_id` (`padd_province_id`),
  ADD KEY `padd_citymunicipality_id` (`padd_citymunicipality_id`),
  ADD KEY `padd_barangay_id` (`padd_barangay_id`),
  ADD KEY `padd_subdivisionvillage_id` (`padd_subdivisionvillage_id`),
  ADD KEY `padd_street_id` (`padd_street_id`),
  ADD KEY `padd_houseblocklot_id` (`padd_houseblocklot_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `rsso_v`
--
ALTER TABLE `rsso_v`
  ADD PRIMARY KEY (`rsso_id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`street_id`);

--
-- Indexes for table `subdivision_village`
--
ALTER TABLE `subdivision_village`
  ADD PRIMARY KEY (`subdivisionvillage_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD PRIMARY KEY (`zipcode_id`),
  ADD KEY `citymunicipality_id` (`citymunicipality_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_municipality`
--
ALTER TABLE `city_municipality`
  MODIFY `citymunicipality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `house_block_lot`
--
ALTER TABLE `house_block_lot`
  MODIFY `houseblocklot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rsso_v`
--
ALTER TABLE `rsso_v`
  MODIFY `rsso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `street_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdivision_village`
--
ALTER TABLE `subdivision_village`
  MODIFY `subdivisionvillage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zipcodes`
--
ALTER TABLE `zipcodes`
  MODIFY `zipcode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_ibfk_1` FOREIGN KEY (`citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE;

--
-- Constraints for table `city_municipality`
--
ALTER TABLE `city_municipality`
  ADD CONSTRAINT `city_municipality_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`province_id`) ON UPDATE CASCADE;

--
-- Constraints for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `personal_information_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_10` FOREIGN KEY (`radd_street_id`) REFERENCES `streets` (`street_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_11` FOREIGN KEY (`radd_houseblocklot_id`) REFERENCES `house_block_lot` (`houseblocklot_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_12` FOREIGN KEY (`padd_zipcode_id`) REFERENCES `zipcodes` (`zipcode_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_13` FOREIGN KEY (`padd_province_id`) REFERENCES `provinces` (`province_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_14` FOREIGN KEY (`padd_citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_15` FOREIGN KEY (`padd_barangay_id`) REFERENCES `barangays` (`barangay_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_16` FOREIGN KEY (`padd_subdivisionvillage_id`) REFERENCES `subdivision_village` (`subdivisionvillage_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_17` FOREIGN KEY (`padd_street_id`) REFERENCES `streets` (`street_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_18` FOREIGN KEY (`padd_houseblocklot_id`) REFERENCES `house_block_lot` (`houseblocklot_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_2` FOREIGN KEY (`pii_birthplace`) REFERENCES `places` (`place_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_4` FOREIGN KEY (`citizenship_country_id`) REFERENCES `countries` (`country_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_5` FOREIGN KEY (`radd_zipcode_id`) REFERENCES `zipcodes` (`zipcode_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_6` FOREIGN KEY (`radd_province_id`) REFERENCES `provinces` (`province_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_7` FOREIGN KEY (`radd_citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_8` FOREIGN KEY (`radd_barangay_id`) REFERENCES `barangays` (`barangay_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_information_ibfk_9` FOREIGN KEY (`radd_subdivisionvillage_id`) REFERENCES `subdivision_village` (`subdivisionvillage_id`) ON UPDATE CASCADE;

--
-- Constraints for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD CONSTRAINT `zipcodes_ibfk_1` FOREIGN KEY (`citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
