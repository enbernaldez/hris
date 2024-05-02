-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 09:28 AM
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
-- Table structure for table `basiced_degree_course`
--

CREATE TABLE `basiced_degree_course` (
  `bdc_id` int(11) NOT NULL,
  `bdc_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basiced_degree_course`
--

INSERT INTO `basiced_degree_course` (`bdc_id`, `bdc_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `child_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `child_fullname` varchar(128) NOT NULL,
  `child_bday` date NOT NULL
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
-- Table structure for table `civil_services`
--

CREATE TABLE `civil_services` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `civil_services`
--

INSERT INTO `civil_services` (`cs_id`, `cs_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `cs_eligibility`
--

CREATE TABLE `cs_eligibility` (
  `cseligibility_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `cseligibility_rating` float(10,0) NOT NULL,
  `cseligibility_examdate` date NOT NULL,
  `cseligibility_examplace` varchar(128) NOT NULL,
  `cseligibility_license` varchar(32) NOT NULL,
  `cseligibility_datevalidity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dept_agency_office_co`
--

CREATE TABLE `dept_agency_office_co` (
  `daoc_id` int(11) NOT NULL,
  `daoc_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept_agency_office_co`
--

INSERT INTO `dept_agency_office_co` (`daoc_id`, `daoc_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educ_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `educ_acadlvl` char(1) NOT NULL COMMENT 'E = Elementary /\r\nS = Secondary /\r\nV = Vocational /\r\nC = College / \r\nG = Graduate',
  `school_id` int(11) NOT NULL,
  `bdc_id` int(11) NOT NULL,
  `educ_period_from` varchar(4) NOT NULL,
  `educ_period_to` varchar(4) NOT NULL,
  `educ_highest` varchar(64) NOT NULL,
  `educ_graduated` varchar(4) NOT NULL,
  `educ_scholarship_acad_honors` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `employee_office` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_addresses`
--

CREATE TABLE `employee_addresses` (
  `emp_add_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `zipcode_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `citymunicipality_id` int(11) NOT NULL,
  `barangay_id` int(11) NOT NULL,
  `subdivisionvillage_id` int(11) NOT NULL,
  `street_id` int(11) NOT NULL,
  `houseblocklot_id` int(11) NOT NULL,
  `emp_add_type` char(1) NOT NULL COMMENT 'R = Residential /\r\nP = Permanent /\r\nB = Both'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_contacts`
--

CREATE TABLE `employee_contacts` (
  `emp_cont_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_cont_tel` varchar(16) NOT NULL,
  `emp_cont_mobile` varchar(11) NOT NULL,
  `emp_cont_emailadd` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_dets_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_dets_bday` date NOT NULL,
  `emp_dets_birthplace` varchar(128) NOT NULL,
  `emp_dets_sex` char(1) NOT NULL COMMENT 'M = Male /\r\nF = Female',
  `emp_dets_civilstatus` char(1) NOT NULL COMMENT 'S = Single /\r\nM = Married /\r\nC = Common law /\r\nW = Widowed /\r\nH = Separated',
  `emp_dets_height` float NOT NULL,
  `emp_dets_weight` float NOT NULL,
  `emp_dets_bloodtype` varchar(2) NOT NULL,
  `emp_dets_citizenship` char(1) NOT NULL COMMENT 'F = Filipino /\r\nB = dual citizenship by Birth /\r\nN = dual citizenship by Naturalization',
  `citizenship_country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_numbers`
--

CREATE TABLE `employee_numbers` (
  `emp_no_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_no_gsis` varchar(32) NOT NULL,
  `emp_no_pagibig` varchar(32) NOT NULL,
  `emp_no_philhealth` varchar(32) NOT NULL,
  `emp_no_sss` varchar(32) NOT NULL,
  `emp_no_tin` varchar(32) NOT NULL,
  `emp_no_agency` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_business`
--

CREATE TABLE `employer_business` (
  `employer_business_id` int(11) NOT NULL,
  `employer_business_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_business`
--

INSERT INTO `employer_business` (`employer_business_id`, `employer_business_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `government_id`
--

CREATE TABLE `government_id` (
  `govt_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `govt_id_name` varchar(64) NOT NULL,
  `govt_id_no` varchar(32) NOT NULL,
  `govt_id_date_place` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_block_lot`
--

CREATE TABLE `house_block_lot` (
  `houseblocklot_id` int(11) NOT NULL,
  `houseblocklot_no` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_block_lot`
--

INSERT INTO `house_block_lot` (`houseblocklot_id`, `houseblocklot_no`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `ld_titles`
--

CREATE TABLE `ld_titles` (
  `ld_title_id` int(11) NOT NULL,
  `ld_title_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learning_development`
--

CREATE TABLE `learning_development` (
  `ld_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ld_title_id` int(11) NOT NULL,
  `ld_from` date NOT NULL,
  `ld_to` date NOT NULL,
  `ld_hrs` int(11) NOT NULL,
  `ld_type` varchar(32) NOT NULL,
  `sponsor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `membership_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nonacademic_recognition`
--

CREATE TABLE `nonacademic_recognition` (
  `nar_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `nar_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `occupation_id` int(11) NOT NULL,
  `occupation_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`occupation_id`, `occupation_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `parent_lastname` varchar(64) NOT NULL,
  `parent_firstname` varchar(64) NOT NULL,
  `parent_middleame` varchar(64) NOT NULL,
  `parent_nameext` varchar(4) NOT NULL,
  `parent_type` char(1) NOT NULL COMMENT 'F = Father /\r\nM = Mother'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pds_references`
--

CREATE TABLE `pds_references` (
  `ref_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ref_name` varchar(128) NOT NULL,
  `ref_add` varchar(128) NOT NULL,
  `ref_telno` varchar(16) NOT NULL
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
  `position_title` varchar(64) NOT NULL,
  `position_salarygrade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position_title`, `position_salarygrade`) VALUES
(1, 'N/A', 0),
(2, 'Regional Director', 26),
(3, 'Chief Administrative Officer', 24),
(4, 'Chief Statistical Specialist', 24),
(5, 'Supervising Statistical Specialist', 22),
(6, 'Registration Officer IV', 22),
(7, 'Senior Statistical Specialist', 19),
(8, 'Registration Officer III', 18),
(9, 'Accountant III', 18),
(10, 'Statistical Specialist II', 16),
(11, 'Administrative Officer IV', 15),
(12, 'Administrative Officer III', 14),
(13, 'Information Systems Analyst I', 12),
(14, 'Information Officer I', 11),
(15, 'Statistical Analyst', 11),
(16, 'Administrative Assistant III', 9),
(17, 'Assistant Statistician', 9),
(18, 'Administrative Assistant II', 8),
(19, 'Administrative Assistant I', 7),
(20, 'Administrative Aide VI', 6),
(21, 'Administrative Aide III', 3);

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
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `qna_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_a` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_a_ifyes` varchar(256) NOT NULL,
  `qna_b` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_b_ifyes` varchar(256) NOT NULL,
  `qna_b_ifyes_plus` varchar(256) NOT NULL,
  `qna_c` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_c_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_34`
--

CREATE TABLE `qna_34` (
  `qna_34_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_34a` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_34b` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_34b_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_35`
--

CREATE TABLE `qna_35` (
  `qna_35_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_35a` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_35a_ifyes` varchar(256) NOT NULL,
  `qna_35b` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_35b_ifyes_datefiled` varchar(255) NOT NULL,
  `qna_35b_ifyes_casestatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_36`
--

CREATE TABLE `qna_36` (
  `qna_36_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_36` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_36_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_37`
--

CREATE TABLE `qna_37` (
  `qna_37_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_37` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_37_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_38`
--

CREATE TABLE `qna_38` (
  `qna_38_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_38a` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_38a_ifyes` varchar(256) NOT NULL,
  `qna_38b` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_38b_ifyes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_39`
--

CREATE TABLE `qna_39` (
  `qna_39_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_39` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_39_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna_40`
--

CREATE TABLE `qna_40` (
  `qna_40_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qna_40a` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_40a_ifyes` varchar(256) NOT NULL,
  `qna_40b` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_40b_ifyes` varchar(255) NOT NULL,
  `qna_40c` char(1) NOT NULL COMMENT 'Y = Yes / N = No',
  `qna_40c_ifyes` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `special_skills_hobbies`
--

CREATE TABLE `special_skills_hobbies` (
  `ssh_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ssh_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spouses`
--

CREATE TABLE `spouses` (
  `spouse_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `spouse_lastname` varchar(64) NOT NULL,
  `spouse_firstname` varchar(64) NOT NULL,
  `spouse_middlename` varchar(64) NOT NULL,
  `spouse_nameext` varchar(4) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `employer_business_id` int(11) NOT NULL,
  `spouse_busadd` varchar(128) NOT NULL,
  `spouse_telno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE `streets` (
  `street_id` int(11) NOT NULL,
  `street_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `streets`
--

INSERT INTO `streets` (`street_id`, `street_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `subdivision_village`
--

CREATE TABLE `subdivision_village` (
  `subdivisionvillage_id` int(11) NOT NULL,
  `subdivisionvillage_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subdivision_village`
--

INSERT INTO `subdivision_village` (`subdivisionvillage_id`, `subdivisionvillage_name`) VALUES
(1, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
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
-- Table structure for table `voluntary_work`
--

CREATE TABLE `voluntary_work` (
  `volwork_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `volwork_name_add` varchar(256) NOT NULL,
  `volwork_from` date NOT NULL,
  `volwork_to` date NOT NULL,
  `volwork_hrs` int(11) NOT NULL,
  `volwork_position` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `workexp_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `workexp_from` date NOT NULL,
  `workexp_to` date NOT NULL,
  `position_id` int(11) NOT NULL,
  `daoc_id` int(11) NOT NULL,
  `workexp_salary_mo` varchar(12) NOT NULL,
  `workexp_paygrade_step` varchar(12) NOT NULL,
  `workexp_status` varchar(16) NOT NULL,
  `workexp_govtsvcs` char(1) NOT NULL COMMENT 'Y = Yes / N = No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Dumping data for table `zipcodes`
--

INSERT INTO `zipcodes` (`zipcode_id`, `citymunicipality_id`, `zipcode_no`) VALUES
(1, 3, 4501);

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
-- Indexes for table `basiced_degree_course`
--
ALTER TABLE `basiced_degree_course`
  ADD PRIMARY KEY (`bdc_id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `city_municipality`
--
ALTER TABLE `city_municipality`
  ADD PRIMARY KEY (`citymunicipality_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `civil_services`
--
ALTER TABLE `civil_services`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `cs_eligibility`
--
ALTER TABLE `cs_eligibility`
  ADD PRIMARY KEY (`cseligibility_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `cs_id` (`cs_id`);

--
-- Indexes for table `dept_agency_office_co`
--
ALTER TABLE `dept_agency_office_co`
  ADD PRIMARY KEY (`daoc_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educ_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `bdc_id` (`bdc_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  ADD PRIMARY KEY (`emp_add_id`),
  ADD KEY `radd_zipcode_id` (`zipcode_id`),
  ADD KEY `radd_province_id` (`province_id`),
  ADD KEY `radd_citymunicipality_id` (`citymunicipality_id`),
  ADD KEY `radd_barangay_id` (`barangay_id`),
  ADD KEY `radd_subdivisionvillage_id` (`subdivisionvillage_id`),
  ADD KEY `radd_street_id` (`street_id`),
  ADD KEY `radd_houseblocklot_id` (`houseblocklot_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD PRIMARY KEY (`emp_cont_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_dets_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `citizenship_country_id` (`citizenship_country`);

--
-- Indexes for table `employee_numbers`
--
ALTER TABLE `employee_numbers`
  ADD PRIMARY KEY (`emp_no_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employer_business`
--
ALTER TABLE `employer_business`
  ADD PRIMARY KEY (`employer_business_id`);

--
-- Indexes for table `government_id`
--
ALTER TABLE `government_id`
  ADD PRIMARY KEY (`govt_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `house_block_lot`
--
ALTER TABLE `house_block_lot`
  ADD PRIMARY KEY (`houseblocklot_id`);

--
-- Indexes for table `ld_titles`
--
ALTER TABLE `ld_titles`
  ADD PRIMARY KEY (`ld_title_id`);

--
-- Indexes for table `learning_development`
--
ALTER TABLE `learning_development`
  ADD PRIMARY KEY (`ld_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `ld_title_id` (`ld_title_id`),
  ADD KEY `sponsor_id` (`sponsor_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `nonacademic_recognition`
--
ALTER TABLE `nonacademic_recognition`
  ADD PRIMARY KEY (`nar_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `pds_references`
--
ALTER TABLE `pds_references`
  ADD PRIMARY KEY (`ref_id`),
  ADD KEY `employee_id` (`employee_id`);

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
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`qna_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_34`
--
ALTER TABLE `qna_34`
  ADD PRIMARY KEY (`qna_34_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_35`
--
ALTER TABLE `qna_35`
  ADD PRIMARY KEY (`qna_35_id`),
  ADD KEY `qna_35_ibfk_1` (`employee_id`);

--
-- Indexes for table `qna_36`
--
ALTER TABLE `qna_36`
  ADD PRIMARY KEY (`qna_36_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_37`
--
ALTER TABLE `qna_37`
  ADD PRIMARY KEY (`qna_37_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_38`
--
ALTER TABLE `qna_38`
  ADD PRIMARY KEY (`qna_38_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_39`
--
ALTER TABLE `qna_39`
  ADD PRIMARY KEY (`qna_39_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `qna_40`
--
ALTER TABLE `qna_40`
  ADD PRIMARY KEY (`qna_40_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `rsso_v`
--
ALTER TABLE `rsso_v`
  ADD PRIMARY KEY (`rsso_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  ADD PRIMARY KEY (`ssh_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `spouses`
--
ALTER TABLE `spouses`
  ADD PRIMARY KEY (`spouse_id`),
  ADD KEY `occupation_id` (`occupation_id`),
  ADD KEY `employer_business_id` (`employer_business_id`),
  ADD KEY `employee_id` (`employee_id`);

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
-- Indexes for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  ADD PRIMARY KEY (`volwork_id`),
  ADD KEY `voluntary_work_ibfk_1` (`employee_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`workexp_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `daoc_id` (`daoc_id`);

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
-- AUTO_INCREMENT for table `basiced_degree_course`
--
ALTER TABLE `basiced_degree_course`
  MODIFY `bdc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_municipality`
--
ALTER TABLE `city_municipality`
  MODIFY `citymunicipality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `civil_services`
--
ALTER TABLE `civil_services`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cs_eligibility`
--
ALTER TABLE `cs_eligibility`
  MODIFY `cseligibility_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dept_agency_office_co`
--
ALTER TABLE `dept_agency_office_co`
  MODIFY `daoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  MODIFY `emp_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  MODIFY `emp_cont_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `emp_dets_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_numbers`
--
ALTER TABLE `employee_numbers`
  MODIFY `emp_no_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_business`
--
ALTER TABLE `employer_business`
  MODIFY `employer_business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `government_id`
--
ALTER TABLE `government_id`
  MODIFY `govt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_block_lot`
--
ALTER TABLE `house_block_lot`
  MODIFY `houseblocklot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ld_titles`
--
ALTER TABLE `ld_titles`
  MODIFY `ld_title_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learning_development`
--
ALTER TABLE `learning_development`
  MODIFY `ld_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nonacademic_recognition`
--
ALTER TABLE `nonacademic_recognition`
  MODIFY `nar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `occupation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pds_references`
--
ALTER TABLE `pds_references`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `qna_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_34`
--
ALTER TABLE `qna_34`
  MODIFY `qna_34_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_35`
--
ALTER TABLE `qna_35`
  MODIFY `qna_35_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_36`
--
ALTER TABLE `qna_36`
  MODIFY `qna_36_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_37`
--
ALTER TABLE `qna_37`
  MODIFY `qna_37_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_38`
--
ALTER TABLE `qna_38`
  MODIFY `qna_38_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_39`
--
ALTER TABLE `qna_39`
  MODIFY `qna_39_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna_40`
--
ALTER TABLE `qna_40`
  MODIFY `qna_40_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rsso_v`
--
ALTER TABLE `rsso_v`
  MODIFY `rsso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  MODIFY `ssh_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouses`
--
ALTER TABLE `spouses`
  MODIFY `spouse_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
  MODIFY `street_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subdivision_village`
--
ALTER TABLE `subdivision_village`
  MODIFY `subdivisionvillage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  MODIFY `volwork_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `workexp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zipcodes`
--
ALTER TABLE `zipcodes`
  MODIFY `zipcode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_ibfk_1` FOREIGN KEY (`citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE;

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `city_municipality`
--
ALTER TABLE `city_municipality`
  ADD CONSTRAINT `city_municipality_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`province_id`) ON UPDATE CASCADE;

--
-- Constraints for table `cs_eligibility`
--
ALTER TABLE `cs_eligibility`
  ADD CONSTRAINT `cs_eligibility_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cs_eligibility_ibfk_2` FOREIGN KEY (`cs_id`) REFERENCES `civil_services` (`cs_id`) ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `education_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`school_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `education_ibfk_3` FOREIGN KEY (`bdc_id`) REFERENCES `basiced_degree_course` (`bdc_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_addresses`
--
ALTER TABLE `employee_addresses`
  ADD CONSTRAINT `employee_addresses_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD CONSTRAINT `employee_contacts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_details_ibfk_2` FOREIGN KEY (`citizenship_country`) REFERENCES `countries` (`country_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_numbers`
--
ALTER TABLE `employee_numbers`
  ADD CONSTRAINT `employee_numbers_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `government_id`
--
ALTER TABLE `government_id`
  ADD CONSTRAINT `government_id_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `learning_development`
--
ALTER TABLE `learning_development`
  ADD CONSTRAINT `learning_development_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_development_ibfk_2` FOREIGN KEY (`ld_title_id`) REFERENCES `ld_titles` (`ld_title_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `learning_development_ibfk_3` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`sponsor_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `nonacademic_recognition`
--
ALTER TABLE `nonacademic_recognition`
  ADD CONSTRAINT `nonacademic_recognition_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `pds_references`
--
ALTER TABLE `pds_references`
  ADD CONSTRAINT `pds_references_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

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
-- Constraints for table `qna`
--
ALTER TABLE `qna`
  ADD CONSTRAINT `qna_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_34`
--
ALTER TABLE `qna_34`
  ADD CONSTRAINT `qna_34_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_35`
--
ALTER TABLE `qna_35`
  ADD CONSTRAINT `qna_35_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_36`
--
ALTER TABLE `qna_36`
  ADD CONSTRAINT `qna_36_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_37`
--
ALTER TABLE `qna_37`
  ADD CONSTRAINT `qna_37_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_38`
--
ALTER TABLE `qna_38`
  ADD CONSTRAINT `qna_38_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_39`
--
ALTER TABLE `qna_39`
  ADD CONSTRAINT `qna_39_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `qna_40`
--
ALTER TABLE `qna_40`
  ADD CONSTRAINT `qna_40_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `special_skills_hobbies`
--
ALTER TABLE `special_skills_hobbies`
  ADD CONSTRAINT `special_skills_hobbies_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `spouses`
--
ALTER TABLE `spouses`
  ADD CONSTRAINT `spouses_ibfk_1` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`occupation_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `spouses_ibfk_2` FOREIGN KEY (`employer_business_id`) REFERENCES `employer_business` (`employer_business_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `spouses_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `voluntary_work`
--
ALTER TABLE `voluntary_work`
  ADD CONSTRAINT `voluntary_work_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `work_experience_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `work_experience_ibfk_3` FOREIGN KEY (`daoc_id`) REFERENCES `dept_agency_office_co` (`daoc_id`) ON UPDATE CASCADE;

--
-- Constraints for table `zipcodes`
--
ALTER TABLE `zipcodes`
  ADD CONSTRAINT `zipcodes_ibfk_1` FOREIGN KEY (`citymunicipality_id`) REFERENCES `city_municipality` (`citymunicipality_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
