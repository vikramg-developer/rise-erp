-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2025 at 08:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rise`
--

-- --------------------------------------------------------

--
-- Table structure for table `abbreviation`
--

CREATE TABLE `abbreviation` (
  `abbreviation_id` int(10) NOT NULL,
  `abbreviation_name` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abbreviation`
--

INSERT INTO `abbreviation` (`abbreviation_id`, `abbreviation_name`, `is_active`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'Dr.', 1, '', '2025-12-17 08:48:23', NULL, NULL, 0),
(2, 'Mr.', 1, '', '2025-12-17 08:48:23', NULL, NULL, 0),
(3, 'Mrs.', 1, '', '2025-12-17 08:48:23', NULL, NULL, 0),
(4, 'Prof.', 1, '', '2025-12-17 08:48:23', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `academic_year_id` int(11) NOT NULL,
  `academic_year_name` varchar(50) NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`academic_year_id`, `academic_year_name`, `is_current`, `is_active`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, '1990-1991', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(2, '1991-1992', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(3, '1992-1993', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(4, '1993-1994', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(5, '1994-1995', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(6, '1995-1996', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(7, '1996-1997', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(8, '1997-1998', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(9, '1998-1999', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(10, '1999-2000', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(11, '2000-2001', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(12, '2001-2002', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(13, '2002-2003', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(14, '2003-2004', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(15, '2004-2005', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(16, '2005-2006', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(17, '2006-2007', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(18, '2007-2008', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(19, '2008-2009', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(20, '2009-2010', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(21, '2010-2011', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(22, '2011-2012', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(23, '2012-2013', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(24, '2013-2014', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(25, '2014-2015', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(26, '2015-2016', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(27, '2016-2017', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(28, '2017-2018', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(29, '2018-2019', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(30, '2019-2020', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(31, '2020-2021', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(32, '2021-2022', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(33, '2022-2023', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(34, '2023-2024', 0, 1, 'admin', '2025-12-17 08:48:24', '', '2025-12-24 10:00:38', 0),
(35, '2024-2025', 0, 1, 'admin', '2025-12-17 08:48:24', '', '2025-12-24 10:00:36', 0),
(36, '2025-2026', 1, 1, 'admin', '2025-12-17 08:48:24', '', '2025-12-24 10:00:40', 0),
(37, '2026-2027', 0, 0, 'admin', '2025-12-17 08:48:24', '', '2025-12-23 09:23:25', 0),
(38, '2027-2028', 0, 0, 'admin', '2025-12-17 08:48:24', '', '2025-12-22 12:05:07', 0),
(39, '2028-2029', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(40, '2029-2030', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(41, '2030-2031', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(42, '2031-2032', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(43, '2032-2033', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(44, '2033-2034', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(45, '2034-2035', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(46, '2035-2036', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(47, '2036-2037', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(48, '2037-2038', 0, 0, 'admin', '2025-12-17 08:48:24', '', NULL, 0),
(49, '2038-2039', 0, 0, 'admin', '2025-12-17 08:48:24', '', '2025-12-19 08:31:20', 0),
(50, '2039-2040', 0, 0, 'admin', '2025-12-17 08:48:24', '', '2025-12-19 08:31:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `column_names` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `record_id` int(11) DEFAULT NULL COMMENT 'Affected record ID',
  `old_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `new_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `action` varchar(50) NOT NULL COMMENT 'create/update/delete/login',
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `url` text DEFAULT NULL COMMENT 'Request URL',
  `added_by` varchar(50) DEFAULT NULL,
  `added_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `table_name`, `column_names`, `record_id`, `old_values`, `new_values`, `action`, `ip_address`, `user_agent`, `url`, `added_by`, `added_at`) VALUES
(1, 'head', '[\"head_name\",\"added_by\"]', 1, '[]', '{\"head_name\":\"Tuition Fee\",\"added_by\":\"F20250010001\"}', 'insert', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, 'F20250010001', '2025-12-28 07:33:18'),
(2, 'head', '[\"head_name\",\"updated_by\",\"updated_at\"]', 1, '{\"head_name\":\"Tuition Fee\",\"updated_by\":\"\",\"updated_at\":null}', '{\"head_name\":\"Tuition Fees\",\"updated_by\":\"F20250010001\",\"updated_at\":\"2025-12-28 13:04:01\"}', 'update', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, 'F20250010001', '2025-12-28 07:34:01'),
(3, 'head', '[\"is_deleted\",\"deleted_by\",\"deleted_at\"]', 1, '{\"is_deleted\":\"0\",\"deleted_by\":\"\",\"deleted_at\":null}', '{\"is_deleted\":1,\"deleted_by\":\"F20250010001\",\"deleted_at\":\"2025-12-28 13:04:37\"}', 'update', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', NULL, 'F20250010001', '2025-12-28 07:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `blood_group_id` int(11) NOT NULL,
  `blood_group_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch_details`
--

CREATE TABLE `branch_details` (
  `branch_id` int(11) NOT NULL,
  `branch_code` varchar(500) NOT NULL,
  `branch_name` varchar(500) NOT NULL,
  `signature_name` varchar(100) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `branch_contact_no` varchar(10) NOT NULL,
  `branch_website` varchar(250) NOT NULL,
  `branch_type_id` int(11) NOT NULL,
  `branch_address` varchar(500) NOT NULL,
  `branch_region_id` int(11) NOT NULL COMMENT 'central/western etc from branch_region table',
  `branch_location_id` int(11) NOT NULL COMMENT 'urban/rural/hilly etc from region table',
  `branch_district_id` int(11) NOT NULL,
  `branch_taluka_id` int(11) NOT NULL,
  `branch_pincode_id` int(11) NOT NULL,
  `branch_principal_name` varchar(500) NOT NULL,
  `branch_principal_mobile_no` varchar(10) NOT NULL,
  `branch_logo` varchar(10) NOT NULL,
  `branch_header` varchar(10) NOT NULL,
  `branch_udise_no` varchar(10) NOT NULL,
  `branch_otp` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_details`
--

INSERT INTO `branch_details` (`branch_id`, `branch_code`, `branch_name`, `signature_name`, `branch_email`, `branch_contact_no`, `branch_website`, `branch_type_id`, `branch_address`, `branch_region_id`, `branch_location_id`, `branch_district_id`, `branch_taluka_id`, `branch_pincode_id`, `branch_principal_name`, `branch_principal_mobile_no`, `branch_logo`, `branch_header`, `branch_udise_no`, `branch_otp`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, '001', 'Rise', '', '', '', '', 0, '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', '2025-12-17 10:47:56', NULL, '2025-12-17 10:47:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `caste_category`
--

CREATE TABLE `caste_category` (
  `caste_category_id` int(11) NOT NULL,
  `caste_category_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caste_category`
--

INSERT INTO `caste_category` (`caste_category_id`, `caste_category_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'OPEN', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(2, 'OBC', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(3, 'VJ-A', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(4, 'NT(B)', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(5, 'NT(C)', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(6, 'NT(D)', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(7, 'SC', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(8, 'ST', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(9, 'SBC', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(10, 'EWS', '', '2025-12-20 11:37:27', NULL, NULL, 0),
(11, 'SEBC', '', '2025-12-20 11:37:27', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_abbreviation` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_registration`
--

CREATE TABLE `faculty_registration` (
  `faculty_registration_id` int(11) NOT NULL,
  `faculty_rise_no` varchar(100) NOT NULL,
  `faculty_role_id` int(11) NOT NULL,
  `faculty_first_name` varchar(100) NOT NULL,
  `faculty_middle_name` varchar(100) NOT NULL,
  `faculty_last_name` varchar(100) NOT NULL,
  `faculty_mobile_number` varchar(50) NOT NULL,
  `faculty_email_id` varchar(150) NOT NULL,
  `faculty_aadhar_number` varchar(50) NOT NULL,
  `faculty_pan_number` varchar(100) NOT NULL,
  `faculty_password` varchar(255) NOT NULL,
  `is_first_login` tinyint(1) NOT NULL DEFAULT 1,
  `faculty_status` tinyint(1) NOT NULL DEFAULT 1,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_registration`
--

INSERT INTO `faculty_registration` (`faculty_registration_id`, `faculty_rise_no`, `faculty_role_id`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `faculty_mobile_number`, `faculty_email_id`, `faculty_aadhar_number`, `faculty_pan_number`, `faculty_password`, `is_first_login`, `faculty_status`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'F20250010001', 1, 'Superadmin', 'Superadmin', 'Superadmin', '', '', '', '', '$2y$10$ZNxmSg6xrBhzT2.x3vC0QO41iknl8QbQbKlwNkQZSyNFa1BEJw7b.', 1, 1, '', '2025-12-22 06:53:17', '', '2025-12-22 06:53:23', 0),
(3, 'F20250010002', 2, 'ADMIN', 'ADMIN', 'ADMIN', '1232132132', 'asg@gmail.com', '123213213234', 'ABLPP3344D', '$2y$10$9EsYR8issulBD0YNWdnoz.6RfYRY84nyS3ZwAE0xZABUmU9wlYDPu', 1, 1, 'F20250010001', '2025-12-23 09:00:25', 'F20250010004', '2025-12-24 11:14:06', 0),
(12, 'F20250010003', 4, 'AASD', 'ASDASD', 'ASDA', '2343242342', 'asdf@gmail.com', '732864326442', 'ABCPP4455V', '$2y$10$OQanYd52ndDTz0MCK1301ePRHqlQmu3vJ/dxK7dbUtqzpbyOauBOm', 1, 1, 'F20250010001', '2025-12-23 11:36:49', '', NULL, 0),
(13, 'F20250010004', 4, 'TEACHER', 'TEACHER', 'TEACHER', '0982340923', 'teacher@gmail.com', '364632347823', 'ABCPP3399C', '$2y$10$gbuE7Du0Ss1DYj1cdznrKeCsjLUQ8dR76C5WTOR1mvrOHNhq2J7Ue', 1, 1, 'F20250010001', '2025-12-24 05:26:08', 'F20250010001', '2025-12-24 07:12:10', 1),
(14, 'F20250010014', 7, 'JJJJJ', 'IQAC', 'IQAC', '9876543210', 'iqac@gmail.com', '963852741014', 'ADCFG1215H', '$2y$10$Q9kLf3n14QwmZBihr79U.uH25KUbryqqQSBEtq2cBDU5AzT2vLlGS', 1, 0, 'F20250010001', '2025-12-24 08:15:03', 'F20250010004', '2025-12-24 11:39:57', 0),
(15, 'F20250010005', 2, 'AASDHSAJH', 'SHDSHDFUI', 'HFIHSDUI', '7237423472', 'ha@gmail.com', '782634862378', 'ABHYY6666C', '$2y$10$sxPxTn3UY9SBeJbzlH3x4OSvCdqPp1epXvYHU.5DoyZ4nXrJ4ckry', 1, 1, 'F20250010001', '2025-12-24 11:36:37', '', NULL, 0),
(16, 'F20250010006', 4, 'QWEWQEQW', 'SDFDSA', 'ASDASDSA', '2343423423', 'sd@gmail.com', '254354543545', 'ABDPP4455C', '$2y$10$jVJuC.HOCY6sUpFrPD4Bs.DMNWsKns8nu4BsjxO.dwseqkBfvWeqK', 1, 1, 'F20250010004', '2025-12-24 11:44:54', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_registration1`
--

CREATE TABLE `faculty_registration1` (
  `faculty_registration_id` int(11) NOT NULL,
  `faculty_rise_no` varchar(100) DEFAULT NULL,
  `faculty_role_id` int(11) NOT NULL,
  `faculty_first_name` varchar(100) NOT NULL,
  `faculty_middle_name` varchar(100) DEFAULT NULL,
  `faculty_last_name` varchar(100) NOT NULL,
  `faculty_mobile_number` varchar(15) NOT NULL,
  `faculty_email_id` varchar(150) NOT NULL,
  `faculty_aadhar_number` varchar(20) NOT NULL,
  `faculty_pan_number` varchar(20) NOT NULL,
  `faculty_password` varchar(255) NOT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_registration1`
--

INSERT INTO `faculty_registration1` (`faculty_registration_id`, `faculty_rise_no`, `faculty_role_id`, `faculty_first_name`, `faculty_middle_name`, `faculty_last_name`, `faculty_mobile_number`, `faculty_email_id`, `faculty_aadhar_number`, `faculty_pan_number`, `faculty_password`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'F20250010001', 1, 'Superadmin', 'Superadmin', '', '1111111111', 'superadmin@gmail.com', '111111111111', 'ABCPP5066C', '$2y$10$R5gwg19K4atXOYyt8IO7h.g2MN9DbNSQ6z30E5fUx.PW/jI3KuX.u', 'F20250010001', '2025-12-15 12:13:25', NULL, '2025-12-20 11:04:24', 0),
(2, 'F20250010002', 2, 'Admin', 'Admin', 'Admin', '2222222224', 'admin@gmail.com', '222222222222', 'ABCPP5067C', '$2y$10$gLplBvdXJ0.AKOgEQgZBg.bt28bFv1kHnsC.ln099wiYhArmLhqMO', 'F20250010001', '2025-12-15 12:16:46', 'F20250010001', '2025-12-20 07:48:35', 0),
(3, 'F20250010003', 4, 'Teacher', 'Teacher', 'Teacher', '3333333333', 'teachergmailcom', '333333333333', 'ABCKK4099V', '$2y$10$kuQ5C8orby1rJiu8fKs7mO9Kihg.xAa.yFSlt//ZPIBgs6D78BCqW', 'F20250010001', '2025-12-15 12:18:03', 'F20250010001', '2025-12-20 12:08:07', 2),
(4, 'F20250010004', 4, 'Teacher', 'TEACHERRRRR', 'Teacher', '4444444444', 'accou@gamil.com', '444444444444', 'AVCPP6677C', '$2y$10$T9VXykMEzgZH8kCFvs1iOOpyLb8NGl87HulLdoc.ChMvaxxTj7FFK', 'F20250010001', '2025-12-15 12:19:11', 'F20250010005', '2025-12-20 10:26:46', 2),
(5, 'F20250010005', 5, 'Cashier', 'Cashier', 'Cashier', '5555555555', 'cashier@gmail.com', '555555555555', 'ADCLL6355C', '$2y$10$4XYdQ0y8y8o4SPgEZbQs4eRCSFvXsjmBe/6ex.6pvMxwA4rC0jC5O', 'F20250010001', '2025-12-15 12:20:40', 'F20250010001', '2025-12-20 07:48:41', 0),
(6, 'F20250010006', 7, 'IQAC', 'IQAC', 'IQAC', '9922014104', 'iqac@gmail.com', '421805051180', 'ADCLL6388C', '$2y$10$QG1XiVuQQFuMAaYGiNFo/O8EWLDaxuoO390vwFxjP.k.SV2ZxHWk2', 'F20250010001', '2025-12-15 12:20:40', 'F20250010001', '2025-12-20 10:45:42', 0),
(25, 'F20250010025', 4, 'SFSDF', 'SDFSD', 'SDFSDF', '4557568868', 'abc@gmail.com', '864544336767', 'ASDFG5467H', '$2y$10$3li9v1I2Z4fodXF/rCUQbeABS1UEWkWe/CB8ZKcP0Z5ikx2xFNlmS', 'F20250010001', '2025-12-19 15:47:00', 'F20250010001', '2025-12-20 11:59:24', 2),
(27, 'F20250010027', 4, 'JSDJ', 'ASJD', 'ASDLK', '2132132132', 'as45d@gmail.com', '879654987987', 'ABCPP8866L', '$2y$10$ADao7VWNiLTcL/0Po1HK7uqjVxV4FhX.84tfyLOQadGdvhnBnsOZO', 'F20250010001', '2025-12-20 13:30:49', 'F20250010001', '2025-12-20 12:08:03', 2),
(28, 'F20250010028', 5, 'TEJAS', 'TEJAS', 'PILKE', '9082347347', 'hsad@gmail.com', '624398320980', 'ABDPP8289C', '$2y$10$8zf0pzOER8KQ3pyRVofEfu5ifcbfn5v2SXZeUMo5RsgALbZGWjyBe', 'F20250010001', '2025-12-20 16:32:47', 'F20250010001', '2025-12-20 12:08:18', 2),
(29, 'F20250010001', 4, 'ABCD', 'ABCD', 'ABCD', '1234312432', 'teh@gmail.com', '737239457823', 'ABCPP8899K', '$2y$10$SQhf3TGJNhQzIZKk9qHvdeoDKtAUJmqiJ.ErRBA1vayg3ofYqGXpW', 'F20250010001', '2025-12-22 11:20:48', NULL, NULL, 0),
(30, 'F20250010002', 5, 'ACC', 'ACC', 'ACC', '1231232132', 'jasdh@gmail.com', '123678236473', 'ABFPP8800C', '$2y$10$YRIszxQXryW6BKtiPDc/Fuj4KDDQlujIOnlkvDC6Y6l5gj/snMnWm', 'F20250010001', '2025-12-22 11:29:34', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_master`
--

CREATE TABLE `feedback_master` (
  `feedback_master_id` int(11) NOT NULL,
  `feedback_name` varchar(500) NOT NULL,
  `type_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `academic_year_id` int(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(200) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback_master`
--

INSERT INTO `feedback_master` (`feedback_master_id`, `feedback_name`, `type_id`, `semester_id`, `part_id`, `academic_year_id`, `is_deleted`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, 'Consolidated Feedback Analysis Theory', 1, 1, 1, 36, 0, '', '2025-12-19 10:01:50', '', '2025-12-19 10:01:50'),
(2, 'Consolidated Feedback Analysis Practical', 2, 1, 1, 36, 0, '', '2025-12-19 10:02:05', '', '2025-12-19 10:02:05'),
(3, 'Consolidated Feedback Analysis Project', 3, 1, 1, 36, 1, 'F20250010006', '2025-12-22 06:04:10', '', '2025-12-24 08:26:42'),
(4, 'aaaaaaa', 1, 1, 1, 35, 2, 'F20250010014', '2025-12-24 10:00:56', '', '2025-12-24 10:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `financial_year_id` int(11) NOT NULL,
  `financial_year_name` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `permission` text NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `handicap_type`
--

CREATE TABLE `handicap_type` (
  `handicap_type_id` int(11) NOT NULL,
  `handicap_type_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `head_id` int(11) NOT NULL,
  `head_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`head_id`, `head_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`) VALUES
(1, 'Tuition Fees', 'F20250010001', '2025-12-28 07:33:18', 'F20250010001', '2025-12-28 07:34:01', 'F20250010001', '2025-12-28 07:34:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `head_group`
--

CREATE TABLE `head_group` (
  `head_group_id` int(11) NOT NULL,
  `head_group_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `head_group`
--

INSERT INTO `head_group` (`head_group_id`, `head_group_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`) VALUES
(1, 'Fee Register', 'F20250010001', '2025-12-27 11:30:34', 'F20250010001', '2025-12-27 12:05:08', 'F20250010001', '2025-12-27 11:35:26', 1),
(2, 'Sanstha Register', 'F20250010001', '2025-12-27 11:30:44', '', NULL, NULL, NULL, 0),
(3, 'Other Register', 'F20250010001', '2025-12-27 11:39:06', '', NULL, NULL, NULL, 0),
(4, 'Short Term Fee Register', 'F20250010001', '2025-12-27 12:04:59', '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaving_certificate`
--

CREATE TABLE `leaving_certificate` (
  `lc_id` int(11) NOT NULL,
  `ysd_id` int(11) NOT NULL,
  `examination` varchar(255) NOT NULL,
  `exam_held_in` varchar(50) NOT NULL,
  `date_of_leaving` date NOT NULL,
  `is_duplicate` int(11) NOT NULL,
  `previous_lc_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaving_certificate_no_counter`
--

CREATE TABLE `leaving_certificate_no_counter` (
  `leaving_certificate_no_counter_id` int(11) NOT NULL,
  `leaving_certificate_no` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2025-11-27-111228', 'App\\Database\\Migrations\\AddGroupsTable', 'default', 'App', 1764400933, 1),
(3, '2025-11-28-151920', 'App\\Database\\Migrations\\AddTicketTable', 'default', 'App', 1764400961, 2),
(4, '2025-11-28-081149', 'App\\Database\\Migrations\\AddRegistrationTable', 'default', 'App', 1764583194, 3),
(5, '2025-12-01-074717', 'App\\Database\\Migrations\\StudentRegistration', 'default', 'App', 1764583298, 4),
(6, '2025-11-28-140558', 'App\\Database\\Migrations\\AddFeedbackMaster', 'default', 'App', 1764827729, 5),
(9, '2025-12-05-095917', 'App\\Database\\Migrations\\AddHeadGroupTable', 'default', 'App', 1764929411, 7),
(10, '2025-12-05-104429', 'App\\Database\\Migrations\\AddHeadTable', 'default', 'App', 1764931542, 8),
(12, '2025-11-25-155726', 'App\\Database\\Migrations\\AddLeavingCertificateTable', 'default', 'App', 1765272720, 9),
(13, '2025-12-09-165133', 'App\\Database\\Migrations\\AddStudentPersonalInformationTable', 'default', 'App', 1765280598, 10),
(14, '2025-12-09-170942', 'App\\Database\\Migrations\\StudentPersonalInfo', 'default', 'App', 1765281164, 11),
(16, '2025-12-13-121807', 'App\\Database\\Migrations\\AddCasteCategoryTable', 'default', 'App', 1765959860, 21),
(17, '2025-12-13-122048', 'App\\Database\\Migrations\\AddBloodGroupTable', 'default', 'App', 1765959860, 21),
(18, '2025-12-13-122442', 'App\\Database\\Migrations\\AddHandicapTypeTable', 'default', 'App', 1765959860, 21),
(19, '2025-12-13-123633', 'App\\Database\\Migrations\\AddPaymentCategoryTable', 'default', 'App', 1765959860, 21),
(20, '2025-12-13-124444', 'App\\Database\\Migrations\\AddSemesterTable', 'default', 'App', 1765959860, 21),
(21, '2025-12-13-124712', 'App\\Database\\Migrations\\AddSubjectTypeTable', 'default', 'App', 1765959860, 21),
(22, '2025-12-13-124941', 'App\\Database\\Migrations\\AddSemesterPartTable', 'default', 'App', 1765959860, 21),
(32, '2025-12-13-135953', 'App\\Database\\Migrations\\AddBranchDetailsTable', 'default', 'App', 1765961304, 22),
(33, '2025-12-16-135438', 'App\\Database\\Migrations\\AddDepartmentTable', 'default', 'App', 1765961304, 22),
(34, '2025-12-16-140715', 'App\\Database\\Migrations\\AddYearTable', 'default', 'App', 1765961304, 22),
(35, '2025-12-16-141708', 'App\\Database\\Migrations\\AddAcademicYearTable', 'default', 'App', 1765961304, 22),
(36, '2025-12-16-142157', 'App\\Database\\Migrations\\AddFinancialYearTable', 'default', 'App', 1765961304, 22),
(37, '2025-12-16-142814', 'App\\Database\\Migrations\\AddRoleTable', 'default', 'App', 1765961304, 22),
(38, '2025-12-16-143010', 'App\\Database\\Migrations\\AddReligionTable', 'default', 'App', 1765961304, 22),
(39, '2025-12-16-164358', 'App\\Database\\Migrations\\AddAbbreviationTable', 'default', 'App', 1765961304, 22),
(40, '2025-12-17-133535', 'App\\Database\\Migrations\\AddRiseNumberCounterTable', 'default', 'App', 1765961304, 22),
(41, '2025-12-20-163341', 'App\\Database\\Migrations\\AddActivityLogTable', 'default', 'App', 1766229385, 23),
(43, '2025-12-11-164430', 'App\\Database\\Migrations\\AddFacultyRegistration', 'default', 'App', 1766384682, 24);

-- --------------------------------------------------------

--
-- Table structure for table `migrations_old`
--

CREATE TABLE `migrations_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations_old`
--

INSERT INTO `migrations_old` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2025-11-27-111228', 'App\\Database\\Migrations\\AddGroupsTable', 'default', 'App', 1764400933, 1),
(3, '2025-11-28-151920', 'App\\Database\\Migrations\\AddTicketTable', 'default', 'App', 1764400961, 2),
(4, '2025-11-28-081149', 'App\\Database\\Migrations\\AddRegistrationTable', 'default', 'App', 1764583194, 3),
(5, '2025-12-01-074717', 'App\\Database\\Migrations\\StudentRegistration', 'default', 'App', 1764583298, 4),
(6, '2025-11-28-140558', 'App\\Database\\Migrations\\AddFeedbackMaster', 'default', 'App', 1764827729, 5),
(7, '2025-12-04-145327', 'App\\Database\\Migrations\\AddAbbrivationTable', 'default', 'App', 1764842124, 6),
(9, '2025-12-05-095917', 'App\\Database\\Migrations\\AddHeadGroupTable', 'default', 'App', 1764929411, 7),
(10, '2025-12-05-104429', 'App\\Database\\Migrations\\AddHeadTable', 'default', 'App', 1764931542, 8),
(12, '2025-11-25-155726', 'App\\Database\\Migrations\\AddLeavingCertificateTable', 'default', 'App', 1765272720, 9),
(15, '2025-12-09-165133', 'App\\Database\\Migrations\\AddStudentPersonalInformationTable', 'default', 'App', 1765280598, 10),
(17, '2025-12-09-170942', 'App\\Database\\Migrations\\StudentPersonalInfo', 'default', 'App', 1765281164, 11),
(32, '2025-12-13-114140', 'App\\Database\\Migrations\\AddYearTable', 'default', 'App', 1765608126, 16),
(34, '2025-12-13-121403', 'App\\Database\\Migrations\\AddReligionTable', 'default', 'App', 1765608353, 17),
(35, '2025-12-13-121807', 'App\\Database\\Migrations\\AddCasteCategoryTable', 'default', 'App', 1765608567, 18),
(36, '2025-12-13-122048', 'App\\Database\\Migrations\\AddBloodGroupTable', 'default', 'App', 1765608723, 19),
(37, '2025-12-11-164430', 'App\\Database\\Migrations\\AddFacultyRegistration', 'default', 'App', 1765608902, 20),
(38, '2025-12-13-122442', 'App\\Database\\Migrations\\AddHandicapTypeTable', 'default', 'App', 1765608964, 21),
(39, '2025-12-13-122823', 'App\\Database\\Migrations\\AddAcademicYearTable', 'default', 'App', 1765609399, 22),
(40, '2025-12-13-123633', 'App\\Database\\Migrations\\AddPaymentCategoryTable', 'default', 'App', 1765609677, 23),
(41, '2025-12-13-124444', 'App\\Database\\Migrations\\AddSemesterTable', 'default', 'App', 1765610154, 24),
(42, '2025-12-13-124712', 'App\\Database\\Migrations\\AddSubjectTypeTable', 'default', 'App', 1765610295, 25),
(43, '2025-12-13-124941', 'App\\Database\\Migrations\\AddSemesterPartTable', 'default', 'App', 1765610439, 26),
(44, '2025-12-13-125229', 'App\\Database\\Migrations\\AddFeedbackQuestionsTable', 'default', 'App', 1765610962, 27),
(45, '2025-12-13-135953', 'App\\Database\\Migrations\\AddBranchDetailsTable', 'default', 'App', 1765615855, 28),
(46, '2025-12-14-063443', 'App\\Database\\Migrations\\AddRoleTable', 'default', 'App', 1765872467, 29);

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `payment_category_id` int(11) NOT NULL,
  `payment_category_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_number_counter`
--

CREATE TABLE `receipt_number_counter` (
  `receipt_number_counter_id` int(11) NOT NULL,
  `head_group_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_number_counter`
--

INSERT INTO `receipt_number_counter` (`receipt_number_counter_id`, `head_group_id`, `academic_year_id`, `receipt_no`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 0, 37, 10, '', '2025-12-22 11:47:20', NULL, '2025-12-23 06:15:36', 0),
(2, 0, 38, 2, '', '2025-12-22 12:03:53', NULL, '2025-12-22 12:03:53', 0),
(3, 0, 37, 7, '', '2025-12-23 09:00:25', NULL, '2025-12-23 09:24:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religion_id`, `religion_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'Hindu', '', '2025-12-20 11:28:16', '', NULL, 0),
(2, 'Muslim', '', '2025-12-20 11:28:16', '', NULL, 0),
(3, 'Christian', '', '2025-12-20 11:28:16', '', NULL, 0),
(4, 'Sikh', '', '2025-12-20 11:28:16', '', NULL, 0),
(5, 'Jain', '', '2025-12-20 11:28:16', '', NULL, 0),
(6, 'Parsi', '', '2025-12-20 11:28:16', '', NULL, 0),
(7, 'Buddhist', '', '2025-12-20 11:28:16', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rise_number_counter`
--

CREATE TABLE `rise_number_counter` (
  `rise_number_counter_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `rise_no` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rise_number_counter`
--

INSERT INTO `rise_number_counter` (`rise_number_counter_id`, `user_type_id`, `academic_year_id`, `rise_no`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 3, 37, '10', '', '2025-12-22 11:47:20', NULL, '2025-12-23 06:15:36', 0),
(2, 3, 38, '2', '', '2025-12-22 12:03:53', NULL, '2025-12-22 12:03:53', 0),
(3, 1, 37, '7', '', '2025-12-23 09:00:25', NULL, '2025-12-24 11:44:54', 0),
(4, 3, 36, '6', '', '2025-12-23 10:01:32', NULL, '2025-12-24 07:29:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `permissions` text NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `permissions`, `added_by`, `added_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `is_deleted`) VALUES
(1, 'SuperAdmin', '[\"createFeedback\",\"viewFeedback\"]', '', '2025-12-17 09:18:25', '', '2025-12-17 10:23:02', '', NULL, 0),
(2, 'Admin', '[\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createAdminDashboard\",\"updateAdminDashboard\",\"viewAdminDashboard\",\"deleteAdminDashboard\"]', '', '2025-12-17 09:27:04', '', '2025-12-23 11:21:09', '', NULL, 0),
(3, 'Student', '[\"createFaculty\",\"updateFaculty\",\"viewFaculty\",\"deleteFaculty\",\"createStudentProfile\",\"updateStudentProfile\",\"viewStudentProfile\",\"deleteStudentProfile\",\"createFacultyProfile\",\"updateFacultyProfile\",\"viewFacultyProfile\",\"deleteFacultyProfile\",\"createHead\",\"updateHead\",\"viewHead\",\"deleteHead\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createDepartment\",\"updateDepartment\",\"viewStudentDashboard\"]', '', '2025-12-17 09:27:04', '', '2025-12-22 07:25:47', '', NULL, 0),
(4, 'Teacher', '[\"createFaculty\",\"updateFaculty\",\"viewFaculty\",\"deleteFaculty\",\"createTicket\",\"updateTicket\",\"viewTicket\",\"deleteTicket\",\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"createDepartment\",\"updateDepartment\",\"viewDepartment\",\"deleteDepartment\",\"viewFacultyDashboard\"]', '', '2025-12-17 09:27:04', 'F20250010001', '2025-12-26 15:47:14', 'F20250010001', '2025-12-27 05:48:48', 1),
(5, 'Accountant', '[\"createRole\",\"updateRole\",\"viewRole\",\"deleteRole\",\"viewAccontantDashboard\"]', '', '2025-12-17 09:27:04', '', '2025-12-19 10:45:36', '', NULL, 0),
(6, 'Cashier', '[\"createFeedback\",\"viewFeedback\"]', '', '2025-12-17 09:27:04', '', '2025-12-18 09:50:32', '', NULL, 0),
(7, 'Iqac', '[\"createFeedback\",\"updateFeedback\",\"viewFeedback\",\"deleteFeedback\",\"viewIqacDashboard\"]', '', '2025-12-18 09:50:44', '', '2025-12-22 05:41:36', '', NULL, 0),
(13, 'Librarian', '[]', 'F20250010001', '2025-12-26 16:13:32', '', NULL, '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `is_active`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'Odd', 1, '', '2025-12-19 07:29:56', NULL, '2025-12-19 07:29:56', 0),
(2, 'Even', 1, '', '2025-12-19 07:29:56', NULL, '2025-12-19 07:29:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester_part`
--

CREATE TABLE `semester_part` (
  `semester_part_id` int(11) NOT NULL,
  `semester_part_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_part`
--

INSERT INTO `semester_part` (`semester_part_id`, `semester_part_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'Pre', '', '2025-12-19 07:19:02', NULL, '2025-12-19 07:19:02', 0),
(2, 'Post', '', '2025-12-19 07:19:02', NULL, '2025-12-19 07:19:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_info`
--

CREATE TABLE `student_personal_info` (
  `student_personal_info_id` int(11) NOT NULL,
  `student_registration_id` int(11) NOT NULL,
  `student_rise_no` varchar(100) NOT NULL,
  `student_prn_no` varchar(50) NOT NULL,
  `student_abc_id` int(11) NOT NULL,
  `student_general_register_no` varchar(50) NOT NULL,
  `student_mobile_no` varchar(50) NOT NULL,
  `student_email_id` varchar(50) NOT NULL,
  `student_gender` tinyint(1) NOT NULL COMMENT '1=Male, 2=Female, 3=Transgender',
  `student_birthdate` date NOT NULL,
  `student_birthplace` varchar(200) NOT NULL,
  `student_bloodgroup` varchar(50) NOT NULL,
  `student_religion_id` int(11) NOT NULL,
  `student_category_id` tinyint(1) NOT NULL,
  `student_caste_id` int(11) NOT NULL,
  `student_subcaste_id` varchar(100) NOT NULL,
  `student_marital_status` varchar(100) NOT NULL,
  `student_nationality_id` varchar(100) NOT NULL,
  `student_minority_id` tinyint(1) NOT NULL,
  `student_physically_handicap_id` varchar(50) NOT NULL COMMENT '1=Yes, 2=No',
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_personal_info`
--

INSERT INTO `student_personal_info` (`student_personal_info_id`, `student_registration_id`, `student_rise_no`, `student_prn_no`, `student_abc_id`, `student_general_register_no`, `student_mobile_no`, `student_email_id`, `student_gender`, `student_birthdate`, `student_birthplace`, `student_bloodgroup`, `student_religion_id`, `student_category_id`, `student_caste_id`, `student_subcaste_id`, `student_marital_status`, `student_nationality_id`, `student_minority_id`, `student_physically_handicap_id`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(3, 1, '', '', 0, '', '6555555555', 'jadhavsonal@gmail.com', 1, '2025-12-11', 'satara', '1', 1, 1, 1, '1', '1', '1', 1, '1', 'S20260010001', '2025-12-24 11:47:28', '', '2025-12-24 11:47:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `student_registration_id` int(11) NOT NULL,
  `student_rise_no` varchar(50) NOT NULL,
  `student_role_id` int(11) NOT NULL,
  `student_first_name` varchar(100) NOT NULL,
  `student_middle_name` varchar(100) NOT NULL,
  `student_last_name` varchar(100) NOT NULL,
  `student_aadhar_number` varchar(50) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL,
  `student_personal_info` int(11) NOT NULL,
  `student_address_details` int(11) NOT NULL,
  `student_parent_details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`student_registration_id`, `student_rise_no`, `student_role_id`, `student_first_name`, `student_middle_name`, `student_last_name`, `student_aadhar_number`, `student_password`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`, `student_personal_info`, `student_address_details`, `student_parent_details`) VALUES
(1, 'S20260010001', 3, 'SONAL', 'SURYAKANT', 'JADHAV', '657898564565', '$2y$10$21C3px1LVoS15s.TfLEx8ezwraAPq1CkE9NLZLjx8pL5YC9C.UopS', '', '2025-12-22 11:47:20', '', '2025-12-22 11:47:20', 0, 0, 0, 0),
(2, 'S20260010002', 3, 'MANASI', 'MARUTI', 'SUPEKAR', '254535312321', '$2y$10$4adgbGMNIhgUxueEFTVm2.vzgYplDv2QgBmhMypOWw0zY2ri5EVma', '', '2025-12-22 11:48:03', '', '2025-12-22 11:48:03', 0, 0, 0, 0),
(3, 'S20270010001', 3, 'AARTI', 'ASHOK', 'CHANGAN', '789456455645', '$2y$10$KTg5F1/VudvlrGZLv3218./yzrK84cxL2oAUXhpenH9B059fKGah6', '', '2025-12-22 12:03:53', '', '2025-12-22 12:03:53', 0, 0, 0, 0),
(4, 'S20260010003', 3, 'TEJAS', 'DATTA', 'PILKE', '866546455559', '$2y$10$aYbmqX91rJgZAHoRBh6px..uGoFdnOT2kYkt4c9sjNGpMCB8BzOLC', '', '2025-12-22 12:06:31', '', '2025-12-22 12:06:31', 0, 0, 0, 0),
(5, 'S20260010004', 3, 'MAYURI', 'DATTATRAY', 'GAIKWAD', '865878452110', '$2y$10$6iEB251Nf.SjUjwb1IkP6u7KofVpxtGqipQyj6IcYHN4S9OlN.ExG', '', '2025-12-23 05:56:16', '', '2025-12-23 05:56:16', 0, 0, 0, 0),
(6, 'S20260010005', 3, 'GJGJ', 'GJJGJGJGJ', 'JGJGJ', '455666666666', '$2y$10$r93zxYYGT7wsZU/Hm1ONMeqJra5sEZE0EVKnUq4M7kEd2kjbbfk.q', '', '2025-12-23 05:59:57', '', '2025-12-23 05:59:57', 0, 0, 0, 0),
(7, 'S20260010006', 3, 'JGJGJ', 'GJGJGJG', 'GJGJGJ', '456453213786', '$2y$10$GYhSfKSAumbtte9fT9vMle404r64Gt7tzCoags/qX9iEa6cARpTOW', '', '2025-12-23 06:01:27', '', '2025-12-23 06:01:27', 0, 0, 0, 0),
(8, 'S20260010007', 3, 'HKHKK', 'KHKHKHKHK', 'HKHKH', '653245555555', '$2y$10$s6oni9NfHG3Yj8oJCus2P.5u23cK3lgSeQAkxfJnbqAzEZZmg5Rwy', '', '2025-12-23 06:05:17', '', '2025-12-23 06:05:17', 0, 0, 0, 0),
(9, 'S20260010008', 3, 'DGFDGDFGFD', 'GHDHDHDH', 'JLUOYUKH', '456412484845', '$2y$10$dLHIWCNK8Pb0SWQqdYTZWOQcja3VXnHa0dFHZPVxQZ4xoamyCp08G', '', '2025-12-23 06:06:13', '', '2025-12-23 06:06:13', 0, 0, 0, 0),
(10, 'S20260010009', 3, 'ZDFDF', 'DD', 'D', '876565644444', '$2y$10$YQsbfgg1WbP.1VYPNdMTMezqVulLHJRzVWM4xFDH.ZGSlNnsZG9eu', '', '2025-12-23 06:15:36', '', '2025-12-23 06:15:36', 0, 0, 0, 0),
(11, 'S20250010001', 3, 'WDFDG', 'GDGDGDGDG', 'SGDSGSDG', '786454545454', '$2y$10$Khneg4pFsoquDMXow/f5MewnLlQ/713xrpGg3BMrufIZKqgCbf5rK', '', '2025-12-23 10:01:32', '', '2025-12-23 10:01:32', 0, 0, 0, 0),
(12, 'S20250010002', 3, 'JGHJ', 'GHJGHJGHJGH', 'JGHJGH', '543333333333', '$2y$10$D2OdtiQhIXGl50rr6fZJQuidPpGfw09sX8p9836l3Yur2Yba9Gjm.', '', '2025-12-23 10:04:45', '', '2025-12-23 10:04:45', 0, 0, 0, 0),
(13, 'S20250010003', 3, 'FDFD', 'FSDGDGDGD', 'GDGHFDGFD', '321214578876', '$2y$10$h/.vw7Oi8bMGjxrXue3IIeQmiq32wqXYdwWCLuaYp0jM2cJ6NGgWi', '', '2025-12-23 10:36:47', '', '2025-12-23 10:36:47', 0, 0, 0, 0),
(14, 'S20250010004', 3, 'G', 'FJFGJGJFGJGFJGJ', 'FGJFGJJFGJGF', '454545454545', '$2y$10$jO4iuAS7.rTlMVD2sCyXcO.GIVceZSJaQV9Y4nEJesPwZecbkcz1u', '', '2025-12-23 10:48:36', '', '2025-12-23 10:48:36', 0, 0, 0, 0),
(15, 'S20250010005', 3, 'SONAL', 'SURYAKANT', 'JADHAV', '453658741269', '$2y$10$b1jCN05Gkpn/uSkicY34jO/vAtj8ZybF2u6nFr/XB8EmrqkP3kaAO', '', '2025-12-24 07:29:11', '', '2025-12-24 07:29:11', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_type`
--

CREATE TABLE `subject_type` (
  `subject_type_id` int(11) NOT NULL,
  `subject_type_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_type`
--

INSERT INTO `subject_type` (`subject_type_id`, `subject_type_name`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'Theory', '', '2025-12-19 07:40:20', NULL, '2025-12-19 07:40:20', 0),
(2, 'Practical', '', '2025-12-19 07:40:20', NULL, '2025-12-19 07:40:20', 0),
(3, 'Project', '', '2025-12-19 07:40:20', NULL, '2025-12-19 07:40:20', 0),
(4, 'Seminar', '', '2025-12-19 07:40:20', NULL, '2025-12-19 07:40:20', 0),
(5, 'Tutorial', '', '2025-12-19 07:40:20', NULL, '2025-12-19 07:40:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `issue_title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `priority` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` int(10) NOT NULL,
  `file` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `college_name`, `category_id`, `issue_title`, `description`, `priority`, `email`, `mobile`, `file`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`, `is_deleted`) VALUES
(1, 'KBP COLLEGE', 1, '234234', 'dsf234234234', 4, 'fsf@gmail.com', 2147483647, '', '', '', '2025-12-04 09:16:32', '', '2025-12-04 09:16:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abbreviation`
--
ALTER TABLE `abbreviation`
  ADD PRIMARY KEY (`abbreviation_id`),
  ADD UNIQUE KEY `abbreviation_name` (`abbreviation_name`);

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`academic_year_id`),
  ADD UNIQUE KEY `academic_year_name` (`academic_year_name`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Indexes for table `branch_details`
--
ALTER TABLE `branch_details`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `caste_category`
--
ALTER TABLE `caste_category`
  ADD PRIMARY KEY (`caste_category_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `faculty_registration`
--
ALTER TABLE `faculty_registration`
  ADD PRIMARY KEY (`faculty_registration_id`),
  ADD UNIQUE KEY `faculty_rise_no` (`faculty_rise_no`),
  ADD UNIQUE KEY `faculty_email_id` (`faculty_email_id`),
  ADD UNIQUE KEY `faculty_mobile_number` (`faculty_mobile_number`),
  ADD UNIQUE KEY `faculty_aadhar_number` (`faculty_aadhar_number`),
  ADD UNIQUE KEY `faculty_pan_number` (`faculty_pan_number`);

--
-- Indexes for table `faculty_registration1`
--
ALTER TABLE `faculty_registration1`
  ADD PRIMARY KEY (`faculty_registration_id`),
  ADD UNIQUE KEY `faculty_email_id` (`faculty_email_id`),
  ADD UNIQUE KEY `faculty_mobile_number` (`faculty_mobile_number`),
  ADD UNIQUE KEY `faculty_aadhar_number` (`faculty_aadhar_number`),
  ADD UNIQUE KEY `faculty_pan_number` (`faculty_pan_number`);

--
-- Indexes for table `feedback_master`
--
ALTER TABLE `feedback_master`
  ADD PRIMARY KEY (`feedback_master_id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`financial_year_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `handicap_type`
--
ALTER TABLE `handicap_type`
  ADD PRIMARY KEY (`handicap_type_id`);

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `head_group`
--
ALTER TABLE `head_group`
  ADD PRIMARY KEY (`head_group_id`);

--
-- Indexes for table `leaving_certificate`
--
ALTER TABLE `leaving_certificate`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `leaving_certificate_no_counter`
--
ALTER TABLE `leaving_certificate_no_counter`
  ADD PRIMARY KEY (`leaving_certificate_no_counter_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations_old`
--
ALTER TABLE `migrations_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`payment_category_id`);

--
-- Indexes for table `receipt_number_counter`
--
ALTER TABLE `receipt_number_counter`
  ADD PRIMARY KEY (`receipt_number_counter_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`),
  ADD UNIQUE KEY `religion_name` (`religion_name`);

--
-- Indexes for table `rise_number_counter`
--
ALTER TABLE `rise_number_counter`
  ADD PRIMARY KEY (`rise_number_counter_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `semester_part`
--
ALTER TABLE `semester_part`
  ADD PRIMARY KEY (`semester_part_id`);

--
-- Indexes for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  ADD PRIMARY KEY (`student_personal_info_id`),
  ADD UNIQUE KEY `student_mobile_no` (`student_mobile_no`),
  ADD UNIQUE KEY `student_registration_id` (`student_registration_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`student_registration_id`),
  ADD UNIQUE KEY `student_rise_no` (`student_rise_no`),
  ADD UNIQUE KEY `student_aadhar_number` (`student_aadhar_number`);

--
-- Indexes for table `subject_type`
--
ALTER TABLE `subject_type`
  ADD PRIMARY KEY (`subject_type_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abbreviation`
--
ALTER TABLE `abbreviation`
  MODIFY `abbreviation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `academic_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `blood_group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch_details`
--
ALTER TABLE `branch_details`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `caste_category`
--
ALTER TABLE `caste_category`
  MODIFY `caste_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_registration`
--
ALTER TABLE `faculty_registration`
  MODIFY `faculty_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faculty_registration1`
--
ALTER TABLE `faculty_registration1`
  MODIFY `faculty_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback_master`
--
ALTER TABLE `feedback_master`
  MODIFY `feedback_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `financial_year_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `handicap_type`
--
ALTER TABLE `handicap_type`
  MODIFY `handicap_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `head_group`
--
ALTER TABLE `head_group`
  MODIFY `head_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaving_certificate`
--
ALTER TABLE `leaving_certificate`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaving_certificate_no_counter`
--
ALTER TABLE `leaving_certificate_no_counter`
  MODIFY `leaving_certificate_no_counter_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations_old`
--
ALTER TABLE `migrations_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `payment_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt_number_counter`
--
ALTER TABLE `receipt_number_counter`
  MODIFY `receipt_number_counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rise_number_counter`
--
ALTER TABLE `rise_number_counter`
  MODIFY `rise_number_counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester_part`
--
ALTER TABLE `semester_part`
  MODIFY `semester_part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  MODIFY `student_personal_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `student_registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_type`
--
ALTER TABLE `subject_type`
  MODIFY `subject_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  ADD CONSTRAINT `student_personal_info_student_registration_id_foreign` FOREIGN KEY (`student_registration_id`) REFERENCES `student_registration` (`student_registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
