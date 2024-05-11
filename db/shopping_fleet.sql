-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2024 at 02:26 PM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_fleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `backup` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`id`, `backup`, `created_at`) VALUES
(1, 'backup-on-2024-04-16-23-47-28.zip', '2024-04-16 18:47:28'),
(2, 'backup-on-2024-04-18-00-00-19.zip', '2024-04-17 19:00:19'),
(3, 'backup-on-2024-04-24-05-10-41.zip', '2024-04-24 00:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL,
  `created_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `created_date`, `status`) VALUES
(1, 'suppIier', '1', '2024-03-25 06:35:55.000000', 0),
(2, 'test7', '1', '2024-03-25 06:33:56.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crud_detail`
--

CREATE TABLE `crud_detail` (
  `id` int(11) NOT NULL,
  `key` varchar(500) NOT NULL DEFAULT '',
  `tbl` varchar(500) NOT NULL,
  `single` varchar(500) NOT NULL,
  `pul` varchar(500) NOT NULL,
  `hide_side` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_detail`
--

INSERT INTO `crud_detail` (`id`, `key`, `tbl`, `single`, `pul`, `hide_side`, `create_at`) VALUES
(1, 'st_id', 'type_staff', 'Staff Type', 'Staff Types', 0, '2024-04-06 04:36:58'),
(2, 'id', 'exp_types', 'Vehicle Expense Type', 'Vehicle Expense Types', 0, '2024-04-06 04:36:58'),
(4, 'st_id', 'ofc_exp', 'Office Expense Type', 'Office Expense Types', 0, '2024-04-06 04:36:58'),
(5, 'id', 'routes', 'Route', 'Routes', 0, '2024-04-06 04:36:58'),
(6, 'st_id', 'files', 'File', 'Files', 0, '2024-04-06 04:36:58'),
(7, 'id', 'tyre_types', 'Vehicle Tyre Types', 'Vehicle Tyre Types', 0, '2024-04-17 20:41:14'),
(8, 'id', 'tyre_companies', 'Vehicle Tyre Companies', 'Vehicle Tyre Companies', 0, '2024-04-17 20:41:14'),
(9, 'id', 'vih_types', 'Vehicle Type', 'Vehicle Types', 0, '2024-04-06 04:36:58'),
(10, 'id', 'tyres_name', 'Tyre Position', 'Tyres Positions', 0, '2024-04-06 04:36:58'),
(11, 'id', 'maintenance', 'Maintenance', 'Maintenance', 0, '2024-04-06 04:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(256) NOT NULL,
  `c_mobile` varchar(15) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_address` varchar(256) NOT NULL,
  `c_created_date` datetime NOT NULL,
  `c_pwd` varchar(100) DEFAULT NULL,
  `c_isactive` varchar(11) NOT NULL DEFAULT '1',
  `c_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_created_date`, `c_pwd`, `c_isactive`, `c_modified_date`) VALUES
(1, 'A company', '92300410607', 'raheelshehzad188@gmail.com', 'tfsf', '2024-03-15 11:56:24', NULL, '1', '2024-03-15 11:56:47'),
(2, 'ٹیسٹ', '012345678', 'nk7162390@gmail.com', 'خوشاب', '2024-03-24 09:50:03', NULL, '1', '2024-03-24 09:59:21'),
(3, 'Nimra Younas', '012345678', 'nk716267390@gmail.com', 'Khushab, Punjab, Pakistan\r\nabc', '2024-03-24 10:09:32', NULL, '1', '2024-03-24 10:09:39'),
(4, 'abdullah', '03017102424', 'abdullahasim78920@gmail.com', 'Mohalla Sardar Bahadur Khan Khushab\r\nMohalla Sardar Bahadur Khan Khushab', '2024-03-31 06:40:41', NULL, '1', '2024-03-31 18:40:55'),
(5, 'Test customer ', '03017102424', 'b6949135@gmail.com', 'Mohalla Sardar Bahadur Khan Khushab\r\nMohalla Sardar Bahadur Khan Khushab', '2024-04-08 12:14:05', NULL, '1', '2024-04-08 07:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `d_mobile` varchar(15) NOT NULL,
  `d_address` varchar(250) NOT NULL,
  `r_address` varchar(255) DEFAULT NULL,
  `d_licenseno` varchar(100) NOT NULL,
  `d_license_expdate` varchar(100) NOT NULL,
  `d_total_exp` varchar(500) NOT NULL,
  `d_doj` varchar(100) NOT NULL,
  `d_ref` varchar(256) DEFAULT NULL,
  `d_is_active` int(11) NOT NULL DEFAULT 1,
  `d_file` varchar(256) DEFAULT NULL,
  `d_file1` varchar(256) DEFAULT NULL,
  `d_created_by` varchar(100) NOT NULL,
  `d_created_date` datetime NOT NULL,
  `d_modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `st_cat_id` int(11) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `blood_grp` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `cast` varchar(255) DEFAULT NULL,
  `cnic_no` varchar(255) DEFAULT NULL,
  `family_detail` varchar(255) DEFAULT NULL,
  `e_c_no` varchar(255) DEFAULT NULL,
  `alt_e_c_no` varchar(255) DEFAULT NULL,
  `con_expiry` datetime(6) DEFAULT NULL,
  `ref_position` varchar(255) DEFAULT NULL,
  `ref_company` varchar(255) DEFAULT NULL,
  `ref_phone` varchar(255) DEFAULT NULL,
  `op_blc` varchar(500) DEFAULT NULL,
  `d_salary` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `d_name`, `d_mobile`, `d_address`, `r_address`, `d_licenseno`, `d_license_expdate`, `d_total_exp`, `d_doj`, `d_ref`, `d_is_active`, `d_file`, `d_file1`, `d_created_by`, `d_created_date`, `d_modified_date`, `st_cat_id`, `dob`, `education`, `blood_grp`, `designation`, `cast`, `cnic_no`, `family_detail`, `e_c_no`, `alt_e_c_no`, `con_expiry`, `ref_position`, `ref_company`, `ref_phone`, `op_blc`, `d_salary`) VALUES
(1, 'RAFI ULLAH', '03034027193', 'POST OFFICE BAJAR DISTRICT KHUSHAB', 'POST OFFICE BAJAR DISTRICT KHUSHAB', 'KB-18-1920', '1970-01-01', '', '2021-01-01', 'EMPTY ', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM5.jpeg', NULL, '2', '2024-04-04 07:10:33', '2024-04-04 18:38:07', 2, '1991-08-20', 'MATRIC', 'A+', 'BAJAR', 'TIWANA', '3820137898093', '2', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', 'EMPTY', 'SANGHA BROTHERS LOGISTICS ', 'EMPTY', '', '0'),
(2, 'SHAHZAD AKHTAR', '03023306454', 'SAKHI HAYAT ALMEER ,MITHA TIWANA DISTRICT KHUSHAB', 'SAKHI HAYAT ALMEER ,MITHA TIWANA DISTRICT KHUSHAB', 'KB-18-953', '1970-01-01', '', '2024-04-04', 'EMPTY', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM4.jpeg', NULL, '2', '2024-04-04 07:10:15', '2024-04-04 18:49:07', 1, '1992-08-05', 'MATRIC', 'B+', 'MITHA TIWANA', 'KHAN', '3820180969739', '2', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', 'EMPTY', 'EMPTY', 'EMPTY', '', '0'),
(3, 'M NADEEM AZAM', '777777777', 'MOHALLAH MITHA TIWANA STATION DISTRICT KHUSHAB', 'MOHALLAH MITHA TIWANA STATION DISTRICT KHUSHAB', 'KB-21-2683', '2026-07-09', '', '2024-04-04', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM3.jpeg', NULL, '2', '2024-04-04 07:09:58', '2024-04-04 18:59:38', 1, '1997-01-02', 'MIDDLE', 'B+', 'MITHA TIWANA', 'KHAN', '3820172584793', '2', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(4, 'SHER AFZAL', '777777777777', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM2.jpeg', NULL, '2', '2024-04-04 07:09:39', '2024-04-04 19:02:29', 1, '1990-01-01', 'PRIMARY', 'B+', 'MIANWALI', 'KHAN', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(5, 'MUMTAZ', '77777777777', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM1.jpeg', NULL, '2', '2024-04-04 07:09:11', '2024-04-04 19:05:16', 1, '2020-01-01', 'MATRIC', 'A+', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(6, 'KHALID', '888888888', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM.jpeg', NULL, '2', '2024-04-04 07:07:34', '2024-04-04 19:09:00', 1, '1990-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(7, 'MUHAMMAD IQBAL', '03012135786', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM6.jpeg', NULL, '2', '2024-04-04 07:10:51', '2024-04-04 19:12:35', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(8, 'WARIS', '03005996497', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM7.jpeg', NULL, '2', '2024-04-04 07:12:50', '2024-04-04 19:17:10', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(9, 'M RIZWAN', '03009825176', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM8.jpeg', NULL, '2', '2024-04-04 07:20:18', '2024-04-04 19:21:56', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(10, 'AKBAR', '03006054663', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM9.jpeg', NULL, '2', '2024-04-04 07:22:04', '2024-04-04 19:23:29', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(11, 'IQBAL', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM10.jpeg', NULL, '2', '2024-04-04 07:24:11', '2024-04-04 19:25:28', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '2024-07-05 00:24:00.000000', '', '', '', '', '0'),
(12, 'SHAHID ABBAS', '03016701413', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM11.jpeg', NULL, '2', '2024-04-04 07:26:49', '2024-04-04 19:29:49', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(13, 'ABDULLAH', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM12.jpeg', NULL, '2', '2024-04-04 07:29:59', '2024-04-04 19:31:16', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(14, 'IMRAN ABBAS', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM13.jpeg', NULL, '2', '2024-04-04 07:32:58', '2024-04-04 19:35:42', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(15, 'GHULAM ABBAS', '03044411870', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM14.jpeg', NULL, '2', '2024-04-04 07:35:51', '2024-04-04 19:37:20', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(16, 'HAMAD', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM15.jpeg', NULL, '2', '2024-04-04 07:38:24', '2024-04-04 19:40:29', 1, '2020-01-12', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(17, 'MUHAMMAD SULEMAM', '03003091496', 'MOHALLAH TRAIR WALA POST OFFICE GUNJIYALTEHSIL QAIDABAD DISTRICT KHUSHAB', 'MOHALLAH TRAIR WALA POST OFFICE GUNJIYALTEHSIL QAIDABAD DISTRICT KHUSHAB', 'EMPTY', '1970-01-01', '', '1970-01-01', 'SHAHZAD', 1, 'WhatsApp_Image_2024-04-05_at_2_16_29_PM.jpeg', NULL, '2', '2024-04-05 09:07:44', '2024-04-04 19:44:09', 1, '1999-09-19', 'MATRIC', 'O+', 'DRIVER', 'TRAIR', '3820173956217', 'FOUR', '03016859214', 'EMPTY', '2024-05-05 14:10:00.000000', 'DRIVER', 'SANGHA BROTHER LOGISTICS', '03023306454', '', '0'),
(18, 'NASEER', '03045385483', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM17.jpeg', NULL, '2', '2024-04-04 07:44:15', '2024-04-04 19:46:16', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(19, 'MUHAMMAD ALI', '03243255565', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM18.jpeg', NULL, '2', '2024-04-04 07:46:48', '2024-04-04 19:48:33', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(20, 'SATTAR', '03036651015', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM19.jpeg', NULL, '2', '2024-04-04 07:48:39', '2024-04-04 19:50:04', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(21, 'TARIQ', '0000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM20.jpeg', NULL, '2', '2024-04-04 07:50:09', '2024-04-04 19:51:39', 1, '1990-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(22, 'SHAHJAHAN', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM21.jpeg', NULL, '2', '2024-04-04 07:51:45', '2024-04-04 19:52:41', 1, '1990-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(23, 'MOHSIN', '0000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM22.jpeg', NULL, '2', '2024-04-04 07:52:45', '2024-04-04 19:53:41', 1, '0001-01-10', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(24, 'GHAFFAR', '03458008337', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM23.jpeg', NULL, '2', '2024-04-04 07:53:47', '2024-04-04 19:55:14', 1, '1990-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '25000'),
(25, 'HAMEED GUL', '03017145594', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM24.jpeg', NULL, '2', '2024-04-04 07:55:21', '2024-04-04 19:57:15', 1, '1991-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(26, 'SAJJAD ULLAH', '03059327364', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM25.jpeg', NULL, '2', '2024-04-04 07:57:27', '2024-04-04 19:58:55', 1, '1991-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(27, 'MUHAMMAD RAFIQ', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM26.jpeg', NULL, '2', '2024-04-04 07:59:13', '2024-04-04 20:00:47', 1, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(28, 'IMRAN', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '2024-03-05', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM27.jpeg', NULL, '2', '2024-04-04 08:00:52', '2024-04-04 20:02:11', 1, '0001-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(29, 'MUHAMMAD AKRAM', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM28.jpeg', NULL, '2', '2024-04-04 08:02:20', '2024-04-04 20:06:58', 1, '2021-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(30, 'WAQAR SHAH', '03063959365', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM29.jpeg', NULL, '2', '2024-04-04 08:07:29', '2024-04-04 20:09:45', 1, '1001-01-10', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(31, 'SAMI ULLAH', '03073783986', 'CHIDROKHEL TEHSIL DISTRICT MIANWALI', 'EMPTYCHIDROKHEL TEHSIL DISTRICT MIANWALI', 'EMPTY', '1970-01-01', '', '1970-01-01', 'IQBAL', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM35.jpeg', NULL, '2', '2024-04-04 08:57:06', '2024-04-04 20:40:27', 1, '1991-01-01', 'PRIMARY', 'AB+', 'DRIVER', 'NIAZI KHAN', '3830231301151', '11', '03057387674', 'EMPTY', '0000-00-00 00:00:00.000000', 'IST DRIVER', 'SANGHA LOGISTICS', '03012135786', '', '0'),
(32, 'MUHAMMAD KAMRAN', '03098940129', 'WADHLANWALA HADALI DISTRICT KHUSHAB', 'WADHLANWALA HADALI DISTRICT KHUSHAB', 'KB-20-1716', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_1_46_43_AM.jpeg', NULL, '2', '2024-04-04 08:40:54', '2024-04-04 20:48:12', 1, '1990-08-03', 'PRIMARY', 'B+', 'DRIVER', 'KALERA', '3820144682747', '6', '03015641781', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(33, 'ASIM', '00000000000', 'EMPTY', 'EMPTY', '', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM31.jpeg', NULL, '2', '2024-04-04 08:49:07', '2024-04-04 20:50:23', 2, '2020-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(34, 'MUHAMMAD ADNAN', '00000000000', 'EMPTY', 'EMPTY', '', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM32.jpeg', NULL, '2', '2024-04-04 08:51:02', '2024-04-04 20:52:26', 2, '1999-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(35, 'RAHEEL', '000000000', 'EMPTY', 'EMPTY', '', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM33.jpeg', NULL, '2', '2024-04-04 08:53:17', '2024-04-04 20:54:52', 2, '1990-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(36, 'ADNAN BUDHAIL', '000000000', 'EMPTY', 'EMPTY', '', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM34.jpeg', NULL, '2', '2024-04-04 08:55:40', '2024-04-04 20:56:57', 2, '2000-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '2024-05-05 01:56:00.000000', '', '', '', '', '0'),
(37, 'RIZWAN', '00000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM36.jpeg', NULL, '2', '2024-04-04 09:06:51', '2024-04-04 21:08:10', 1, '1980-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(38, 'SHAHJAHAN 165', '03044823165', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM37.jpeg', NULL, '2', '2024-04-04 09:08:42', '2024-04-04 21:10:36', 1, '2000-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(39, 'FIDA HUSSAIN', '03096855514', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM38.jpeg', NULL, '2', '2024-04-04 09:10:45', '2024-04-04 21:12:08', 1, '2021-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(40, 'OMER HAYAT', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM39.jpeg', NULL, '2', '2024-04-07 09:57:33', '2024-04-07 09:57:24', 1, '1999-01-10', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '2024-09-07 14:57:00.000000', '', '', '', '', '0'),
(41, 'SADIQ KHAN', '0000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM40.jpeg', NULL, '2', '2024-04-07 10:26:56', '2024-04-07 10:24:53', 1, '1999-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(42, 'TANVEER', '00000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM41.jpeg', NULL, '2', '2024-04-07 10:25:00', '2024-04-07 10:26:48', 1, '1999-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0'),
(43, 'HARIS ALI', '00000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM42.jpeg', NULL, '2', '2024-04-07 10:27:15', '2024-04-07 10:28:10', 1, '1999-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '2024-05-07 15:27:00.000000', '', '', '', '', '0'),
(44, 'ANWAR', '000000000', 'EMPTY', 'EMPTY', 'EMPTY', '1970-01-01', '', '1970-01-01', '50000', 1, 'WhatsApp_Image_2024-04-05_at_12_07_06_AM43.jpeg', NULL, '1', '2024-04-10 02:18:33', '2024-04-07 10:56:07', 1, '1999-01-01', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', 'EMPTY', '0000-00-00 00:00:00.000000', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `driver_files`
--

CREATE TABLE `driver_files` (
  `fid` int(11) NOT NULL,
  `did` int(11) DEFAULT NULL,
  `exp` varchar(255) DEFAULT NULL,
  `file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver_files`
--

INSERT INTO `driver_files` (`fid`, `did`, `exp`, `file`) VALUES
(4, 44, 'undefined', 'Untitled_design9.png');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `et_id` int(11) NOT NULL,
  `et_name` varchar(256) NOT NULL,
  `et_subject` varchar(100) NOT NULL,
  `et_body` longtext NOT NULL,
  `et_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`et_id`, `et_name`, `et_subject`, `et_body`, `et_created_date`) VALUES
(1, 'booking', 'Booking Confirmation - VMS', '<p>Dear Customer,<p>\r\n\r\n<p>Thank you for choosing VMS<p>\r\n\r\n<p>We look forward to welcoming you to strat trip.<p>\r\n\r\n<p>{{bookingdetails}}<p>\r\n\r\n<p>Our professional and friendly staff are committed to ensuring your travel is both enjoyable and comfortable.<p>\r\n\r\n<p>Should you have any requests prior to your travel, please do not hesitate to contact us and we will endeavor to assist you whenever possible.<p>', '2020-07-30 19:47:12'),
(2, 'tracking', 'Trip Tracking - VMS', '<p>Dear Customer,</p>\r\n\r\n<p>Please use below url to track trip live location.</p>\r\n\r\n<p>URL : {{url}}<p>', '2020-07-30 20:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `exp_detail`
--

CREATE TABLE `exp_detail` (
  `id` int(11) NOT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exp_detail`
--

INSERT INTO `exp_detail` (`id`, `amount`, `detail`, `track`, `created_at`) VALUES
(1, '499', 'shaheer', '1714290868', '2024-05-02 22.38.40'),
(2, '500', 'Raheel 500', '1714290868', '2024-05-03 17.14.53'),
(3, '65', ',m', '1714290868', '2024-05-03 19.50.42'),
(4, 'ajsd', 'alkds', '1714290868', '2024-05-03 19.53.39'),
(5, '334', 'as', '1714290868', '2024-05-03 19.54.10'),
(6, 'a2', '23as', '1714290868', '2024-05-03 19.57.55'),
(7, '400', 'cheeni,patti', '1714929759', '2024-05-05 23.32.54'),
(8, '500', 'jb', '1714929759', '2024-05-06 19.52.16'),
(9, '1122', '1122', '1715052390', '2024-05-07 08.28.05'),
(10, '1122', '1122', '1715052390', '2024-05-07 08.28.06'),
(11, '1122', '1122', '1715052390', '2024-05-07 08.28.08'),
(12, '1122', '1122', '1715052390', '2024-05-07 08.28.08'),
(13, '1122', '1122', '1715052390', '2024-05-07 08.28.08'),
(14, '1122', '1122', '1715052390', '2024-05-07 08.28.08'),
(15, '1122', '1122', '1715052390', '2024-05-07 08.28.08');

-- --------------------------------------------------------

--
-- Table structure for table `exp_types`
--

CREATE TABLE `exp_types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exp_types`
--

INSERT INTO `exp_types` (`id`, `name`, `is_default`, `create_at`, `editable`) VALUES
(19, 'Diesel', 1, '2024-03-22 17:49:53', 0),
(21, 'Toll Tax', 1, '2024-03-22 17:50:15', 0),
(22, 'Roti Kharcha', 1, '2024-03-22 17:50:38', 0),
(23, 'Fone Hawa Jali', 1, '2024-03-22 17:50:58', 0),
(24, 'Loading Kharcha', 1, '2024-03-22 17:51:19', 0),
(25, 'Unloading Kharcha', 1, '2024-03-22 17:51:34', 0),
(26, 'Inam', 1, '2024-03-22 17:51:50', 0),
(27, 'Motorway Challan', 1, '2024-03-22 17:52:10', 0),
(28, 'Traffic Challan', 1, '2024-03-22 17:52:39', 0),
(29, 'Tax', 1, '2024-03-22 17:53:17', 0),
(30, 'Mobil Oil Change', 1, '2024-03-22 17:53:36', 0),
(31, 'Grease', 1, '2024-03-22 17:54:01', 0),
(32, 'Khairat', 1, '2024-03-22 17:54:20', 0),
(33, 'Wash Service', 1, '2024-03-22 17:54:45', 0),
(35, 'ٹول خرچہ', 1, '2024-03-24 10:22:05', 0),
(38, 'No default', 0, '2024-04-08 16:22:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `st_id` int(11) NOT NULL,
  `type_name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sal_type` int(11) NOT NULL DEFAULT 0,
  `editable` int(11) DEFAULT 0,
  `exp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`st_id`, `type_name`, `created_at`, `sal_type`, `editable`, `exp`) VALUES
(1, 'staff file', '2024-04-13 05:06:07', 0, 0, 0),
(2, 'gari file', '2024-04-13 05:06:16', 1, 0, 0),
(4, 'shaheer', '2024-04-19 19:08:55', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `v_fuel_id` int(10) NOT NULL,
  `v_id` int(100) NOT NULL,
  `v_fuel_quantity` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_odometerreading` varchar(100) DEFAULT NULL,
  `v_fuelprice` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_fuelfilldate` varchar(100) NOT NULL,
  `v_fueladdedby` varchar(100) NOT NULL,
  `v_fuelcomments` varchar(256) NOT NULL,
  `v_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geofences`
--

CREATE TABLE `geofences` (
  `geo_id` int(11) NOT NULL,
  `geo_name` varchar(128) NOT NULL,
  `geo_description` varchar(128) DEFAULT NULL,
  `geo_area` varchar(4096) NOT NULL,
  `geo_vehicles` varchar(256) NOT NULL,
  `geo_createddate` datetime NOT NULL DEFAULT current_timestamp(),
  `geo_modifieddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `geofence_events`
--

CREATE TABLE `geofence_events` (
  `ge_id` int(11) NOT NULL,
  `ge_v_id` varchar(11) NOT NULL,
  `ge_geo_id` varchar(11) NOT NULL,
  `ge_event` varchar(256) NOT NULL,
  `ge_timestamp` varchar(100) NOT NULL,
  `ge_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomeexpense`
--

CREATE TABLE `incomeexpense` (
  `ie_id` int(11) NOT NULL,
  `ie_v_id` varchar(100) NOT NULL,
  `ie_date` varchar(100) NOT NULL,
  `ie_type` varchar(100) NOT NULL,
  `ie_description` varchar(256) NOT NULL,
  `ie_amount` int(100) NOT NULL,
  `ie_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ie_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_username` varchar(250) NOT NULL,
  `u_password` varchar(250) NOT NULL,
  `u_type` varchar(255) DEFAULT NULL,
  `u_isactive` varchar(100) NOT NULL DEFAULT '1',
  `u_email` varchar(256) NOT NULL,
  `u_created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_username`, `u_password`, `u_type`, `u_isactive`, `u_email`, `u_created_date`) VALUES
(1, 'Raheel', 'raheelshehzad188@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', '1', 'raheelshehzad188@gmail.com', '2024-04-23 07:31:15'),
(2, 'Haroon Awan', 'haroonmalikh80@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1', 'haroonmalikh80@gmail.com', '2024-03-11 13:18:33'),
(7, 'shaheer ', 'shaheer@gmail.com', '3b712de48137572f3849aabd5666a4e3', '1', '1', 'shaheerumer5668704@gmail.com', '2024-04-23 05:23:05'),
(8, 'shaheer', 'shaheer1@gmail.com', '3b712de48137572f3849aabd5666a4e3', NULL, '1', 'shaheerumer1387@gmail.com', '2024-05-09 17:37:52'),
(9, 'shaheer', 'shaheer ', '3b712de48137572f3849aabd5666a4e3', NULL, '1', 'shaheerumer387@gmail.com', '2024-04-06 17:40:25'),
(10, 'shaheer', 'shaheerumer5668704@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1', 'shaheerumer5668704@gmail.com', '2024-04-06 17:51:38'),
(11, 'Nimra', 'nimra', '3b712de48137572f3849aabd5666a4e3', '1', '1', 'nk7162390@gmail.com', '2024-05-09 05:09:37');

-- --------------------------------------------------------

--
-- Table structure for table `login_roles`
--

CREATE TABLE `login_roles` (
  `lr_id` int(11) NOT NULL,
  `lr_u_id` int(11) NOT NULL,
  `lr_vech_list` int(11) NOT NULL DEFAULT 0,
  `lr_vech_list_view` int(11) NOT NULL DEFAULT 0,
  `lr_vech_list_edit` int(11) NOT NULL DEFAULT 0,
  `lr_vech_add` int(11) NOT NULL DEFAULT 0,
  `lr_vech_group` int(11) NOT NULL DEFAULT 0,
  `lr_vech_group_add` int(11) NOT NULL DEFAULT 0,
  `lr_vech_group_action` int(11) NOT NULL DEFAULT 0,
  `lr_drivers_list` int(11) NOT NULL DEFAULT 0,
  `lr_drivers_list_edit` int(11) NOT NULL DEFAULT 0,
  `lr_drivers_add` int(11) NOT NULL DEFAULT 0,
  `lr_trips_list` int(11) NOT NULL DEFAULT 0,
  `lr_trips_list_edit` int(11) NOT NULL DEFAULT 0,
  `lr_trips_add` int(11) NOT NULL DEFAULT 0,
  `lr_cust_list` int(11) NOT NULL DEFAULT 0,
  `lr_cust_edit` int(11) NOT NULL DEFAULT 0,
  `lr_cust_add` int(11) NOT NULL DEFAULT 0,
  `lr_fuel_list` int(11) NOT NULL DEFAULT 0,
  `lr_fuel_edit` int(11) NOT NULL DEFAULT 0,
  `lr_fuel_add` int(11) NOT NULL DEFAULT 0,
  `lr_reminder_list` int(11) NOT NULL DEFAULT 0,
  `lr_reminder_delete` int(11) NOT NULL DEFAULT 0,
  `lr_reminder_add` int(11) NOT NULL DEFAULT 0,
  `lr_ie_list` int(11) NOT NULL DEFAULT 0,
  `lr_ie_edit` int(11) NOT NULL DEFAULT 0,
  `lr_ie_add` int(11) NOT NULL DEFAULT 0,
  `lr_tracking` int(11) NOT NULL DEFAULT 0,
  `lr_liveloc` int(11) NOT NULL DEFAULT 0,
  `lr_geofence_add` int(11) NOT NULL DEFAULT 0,
  `lr_geofence_list` int(11) NOT NULL DEFAULT 0,
  `lr_geofence_delete` int(11) NOT NULL DEFAULT 0,
  `lr_geofence_events` int(11) NOT NULL DEFAULT 0,
  `lr_reports` int(11) NOT NULL DEFAULT 0,
  `lr_settings` int(11) NOT NULL DEFAULT 0,
  `lr_vech_del` int(11) NOT NULL DEFAULT 0,
  `lr_driver_del` int(11) NOT NULL DEFAULT 0,
  `lr_booking_del` int(11) NOT NULL DEFAULT 0,
  `lr_cust_del` int(11) NOT NULL DEFAULT 0,
  `lr_fuel_del` int(11) NOT NULL DEFAULT 0,
  `lr_reminder_del` int(11) NOT NULL DEFAULT 0,
  `lr_ie_del` int(11) NOT NULL DEFAULT 0,
  `lr_maintenace` int(11) NOT NULL DEFAULT 0,
  `lr_maintenace_add` int(11) NOT NULL DEFAULT 0,
  `lr_vech_availablity` int(11) NOT NULL DEFAULT 0,
  `lr_parts` int(11) NOT NULL DEFAULT 1,
  `lr_shift_manager` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_roles`
--

INSERT INTO `login_roles` (`lr_id`, `lr_u_id`, `lr_vech_list`, `lr_vech_list_view`, `lr_vech_list_edit`, `lr_vech_add`, `lr_vech_group`, `lr_vech_group_add`, `lr_vech_group_action`, `lr_drivers_list`, `lr_drivers_list_edit`, `lr_drivers_add`, `lr_trips_list`, `lr_trips_list_edit`, `lr_trips_add`, `lr_cust_list`, `lr_cust_edit`, `lr_cust_add`, `lr_fuel_list`, `lr_fuel_edit`, `lr_fuel_add`, `lr_reminder_list`, `lr_reminder_delete`, `lr_reminder_add`, `lr_ie_list`, `lr_ie_edit`, `lr_ie_add`, `lr_tracking`, `lr_liveloc`, `lr_geofence_add`, `lr_geofence_list`, `lr_geofence_delete`, `lr_geofence_events`, `lr_reports`, `lr_settings`, `lr_vech_del`, `lr_driver_del`, `lr_booking_del`, `lr_cust_del`, `lr_fuel_del`, `lr_reminder_del`, `lr_ie_del`, `lr_maintenace`, `lr_maintenace_add`, `lr_vech_availablity`, `lr_parts`, `lr_shift_manager`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(8, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(9, 9, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, 10, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `tyre_name` varchar(255) NOT NULL,
  `v_id` int(11) DEFAULT NULL,
  `tyre_type` varchar(255) NOT NULL,
  `expiray_date` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `km` varchar(225) DEFAULT NULL,
  `date` datetime(6) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `tyre_name`, `v_id`, `tyre_type`, `expiray_date`, `created_at`, `km`, `date`, `status`) VALUES
(8, 'Tyre Change', 32, '0', '', '2024-05-08 13:10:29', NULL, '2024-05-15 13:10:00.000000', 1),
(9, 'Oil Change', 32, '1', '', '2024-05-08 13:13:18', '100', NULL, 1),
(10, 'test', 32, '0', '', '2024-05-08 13:14:28', NULL, '2024-05-12 13:14:00.000000', 1),
(11, 'test', 32, '0', '', '2024-05-08 13:15:57', NULL, '2024-05-10 13:15:00.000000', 1),
(12, 'test', 32, '0', '', '2024-05-08 21:38:52', NULL, '2024-05-08 00:00:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `n_subject` varchar(256) NOT NULL,
  `n_message` varchar(256) DEFAULT NULL,
  `n_is_read` int(11) NOT NULL DEFAULT 0,
  `n_created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ofc_exp`
--

CREATE TABLE `ofc_exp` (
  `st_id` int(11) NOT NULL,
  `type_name` varchar(500) NOT NULL,
  `exp_img` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ofc_exp`
--

INSERT INTO `ofc_exp` (`st_id`, `type_name`, `exp_img`, `created_at`, `editable`) VALUES
(1, 'Opening Balence', 'assets/exp_type/image_21.png', '2024-04-03 00:32:47', 1),
(13, 'Food', 'assets/exp_type/image_21.png', '2024-04-26 05:44:05', 0),
(18, 'shaheer', 'assets/exp_type/image_21.png', '2024-04-29 16:42:55', 0),
(19, 'hghj', 'assets/exp_type/image_22.png', '2024-04-29 16:58:44', 0),
(20, 'asd', 'assets/exp_type/back.png', '2024-04-29 17:08:26', 0),
(21, 'aisudh', 'assets/exp_type/back2.png', '2024-04-29 17:12:40', 0),
(22, 'here', 'assets/exp_type/go-back-arrow.png', '2024-05-01 05:04:55', 0),
(23, 'Staff Loan', 'assets/exp_type/cropped-favicon.png', '2024-05-05 18:20:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `partsinventory`
--

CREATE TABLE `partsinventory` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_desc` varchar(256) DEFAULT NULL,
  `p_stock` int(100) NOT NULL DEFAULT 0,
  `p_status` int(100) NOT NULL DEFAULT 1,
  `p_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partsinventory`
--

INSERT INTO `partsinventory` (`p_id`, `p_name`, `p_desc`, `p_stock`, `p_status`, `p_created_date`) VALUES
(1, 'Tyre', 'hfh', 5, 1, '2024-03-14 21:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `parts_types`
--

CREATE TABLE `parts_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `parts_types`
--

INSERT INTO `parts_types` (`id`, `name`, `description`, `group_id`) VALUES
(1, 'tyre L1', 'left 1st tyre', 1),
(2, 'tyre L1', 'left 1st tyre', 1);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `v_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `altitude` double DEFAULT NULL,
  `speed` double DEFAULT NULL,
  `bearing` double DEFAULT NULL,
  `accuracy` int(11) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `traccar_pos_id` varchar(100) DEFAULT NULL,
  `battery_level` varchar(100) DEFAULT NULL,
  `motion` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pumps`
--

CREATE TABLE `pumps` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pumps`
--

INSERT INTO `pumps` (`id`, `name`, `create_at`) VALUES
(2, 'sangha pump', '2024-03-21 16:21:17'),
(3, 'katha pump', '2024-03-21 16:21:31'),
(5, 'سنگھا پمپ', '2024-03-24 10:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `r_id` int(11) NOT NULL,
  `r_v_id` varchar(11) NOT NULL,
  `r_date` date NOT NULL,
  `r_message` varchar(256) NOT NULL,
  `r_isread` varchar(11) NOT NULL DEFAULT '0',
  `r_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `is_default`, `create_at`, `editable`) VALUES
(5, 'khushab', 0, '2024-04-08 02:45:48', 0),
(6, 'Joharabad', 0, '2024-04-08 02:45:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `salary` int(225) DEFAULT NULL,
  `allowance` int(255) DEFAULT NULL,
  `s_created_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `cust_id`, `salary`, `allowance`, `s_created_date`) VALUES
(4, 33, 1000, 50, '2024-04-06 10:47:05.998703'),
(5, 38, 23434, NULL, '2024-04-08 19:07:49.427591');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` int(11) NOT NULL,
  `s_companyname` varchar(100) DEFAULT NULL,
  `s_address` varchar(100) DEFAULT NULL,
  `s_inovice_prefix` varchar(100) NOT NULL,
  `s_logo` varchar(100) NOT NULL,
  `s_price_prefix` varchar(100) NOT NULL,
  `s_inovice_termsandcondition` varchar(256) NOT NULL,
  `s_inovice_servicename` varchar(100) NOT NULL,
  `s_googel_api_key` varchar(256) NOT NULL,
  `s_traccar_enabled` int(11) NOT NULL DEFAULT 0,
  `s_traccar_url` varchar(256) DEFAULT NULL,
  `s_traccar_username` varchar(256) DEFAULT NULL,
  `s_traccar_password` varchar(256) DEFAULT NULL,
  `s_date_format` varchar(100) NOT NULL,
  `color_1` varchar(20) NOT NULL,
  `color_2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `s_companyname`, `s_address`, `s_inovice_prefix`, `s_logo`, `s_price_prefix`, `s_inovice_termsandcondition`, `s_inovice_servicename`, `s_googel_api_key`, `s_traccar_enabled`, `s_traccar_url`, `s_traccar_username`, `s_traccar_password`, `s_date_format`, `color_1`, `color_2`) VALUES
(1, 'VMS', '19/14,First Street,Chennai-1000', 'TEST', '', '$ ', 'Sample invoice terms and condition..Please change it in settings page............                                                                                                                                                                               ', 'Vehicle Booking', 'AIzaSyA1tT5eHsRh7kbZDzebF-lfVzVgSX8zpLg', 0, NULL, NULL, NULL, 'Y-m-d H:i', '#4fa5ea', '#0064b4');

-- --------------------------------------------------------

--
-- Table structure for table `settings_smtp`
--

CREATE TABLE `settings_smtp` (
  `smtp_host` varchar(100) NOT NULL,
  `smtp_auth` varchar(100) NOT NULL,
  `smtp_uname` varchar(100) NOT NULL,
  `smtp_pwd` varchar(100) NOT NULL,
  `smtp_issecure` varchar(100) NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_emailfrom` varchar(100) NOT NULL,
  `smtp_replyto` varchar(100) NOT NULL,
  `smtp_createddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shift_log`
--

CREATE TABLE `shift_log` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `track` varchar(200) NOT NULL,
  `open_blc` varchar(100) NOT NULL,
  `close_blc` varchar(100) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift_log`
--

INSERT INTO `shift_log` (`id`, `uid`, `track`, `open_blc`, `close_blc`, `login_time`, `logout_time`) VALUES
(1, 11, '1715231815', '5000', '', '2024-05-09 10:16:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_bonus`
--

CREATE TABLE `staff_bonus` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_bonus`
--

INSERT INTO `staff_bonus` (`id`, `sid`, `amount`, `reason`, `create_at`, `created_by`) VALUES
(8, 35, 100, 'cvbffg', '2024-04-16 10:44:37', 1),
(9, 35, 0, '', '2024-04-16 11:12:46', 1),
(10, 44, 100, 'test', '2024-04-16 11:51:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_exp`
--

CREATE TABLE `staff_exp` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `duration` varchar(500) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_exp`
--

INSERT INTO `staff_exp` (`id`, `staff_id`, `name`, `address`, `duration`, `detail`) VALUES
(1, 1, 'Org', 'Address', '', 'Detail'),
(2, 13, 'Org', 'Address', 'Duration', 'Detail'),
(3, 14, 'Org update', 'Address update', 'Duration update', 'Detail'),
(4, 6, 'org', 'add', 'dur', 'detail'),
(5, 6, 'hdgf', 'gfsgs', 'ad', 'adsd'),
(6, 15, 'xf', 'dffd', 'f', 'd'),
(7, 17, 'ASWEDRFG', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'SDFGHJNMKJHGFDSVBN'),
(8, 16, 'ASDFGHJ', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'ZSXDFGBHNJM'),
(9, 18, 'Demo test 2', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'SDFGHJNMKJHGFDSVBN'),
(10, 19, 'Demo test 2', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'ZSXDFGBHNJM'),
(11, 1, 'lse', 'lhr', '6 months', '6 months'),
(12, 2, 'Demo test 4', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'SDFGHJNMKJHGFDSVBN'),
(13, 3, 'Demo test 2', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'SDFGHJNMKJHGFDSVBN'),
(14, 4, 'Demo test 4', 'Mohalla Sardar Bahadur Khan Khushab', '12 YEARS', 'ZSXDFGBHNJM');

-- --------------------------------------------------------

--
-- Table structure for table `staff_experience`
--

CREATE TABLE `staff_experience` (
  `id` int(11) NOT NULL,
  `name_of_org` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `exp_detail` varchar(255) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_leaves`
--

CREATE TABLE `staff_leaves` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` text NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT 0,
  `create_by` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_leaves`
--

INSERT INTO `staff_leaves` (`id`, `sid`, `date`, `reason`, `paid_status`, `create_by`, `created_at`) VALUES
(1, 24, '2024-04-11', 'testing system', 1, 1, '2024-04-11 06:37:03'),
(2, 24, '2024-04-12', 'testing', 0, 1, '2024-04-11 06:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff_ledger`
--

CREATE TABLE `staff_ledger` (
  `id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `dr` varchar(500) NOT NULL,
  `cr` varchar(500) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail` text NOT NULL,
  `exp_id` int(11) NOT NULL DEFAULT 0,
  `amount` varchar(255) DEFAULT NULL,
  `ledgerCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_ledger`
--

INSERT INTO `staff_ledger` (`id`, `ledger_id`, `dr`, `cr`, `create_by`, `create_at`, `detail`, `exp_id`, `amount`, `ledgerCode`) VALUES
(18, 35, 'dr', '', 0, '2024-04-08 15:18:55', 'sggfg', 1, '1000', NULL),
(19, 1, '', 'cr', 0, '2024-04-08 15:18:55', 'sggfg', 1, '1000', NULL),
(20, 35, 'dr', '', 0, '2024-04-08 15:28:34', 'sggfg', 1, '1000', '1000'),
(21, 1, '', 'cr', 0, '2024-04-08 15:28:34', 'sggfg', 1, '1000', '1000'),
(22, 44, '', 'cr', 0, '2024-05-05 18:26:37', 'loan', 23, '300', '300'),
(23, 1, 'dr', '', 0, '2024-05-05 18:26:37', 'loan', 23, '300', '300'),
(24, 44, '', 'cr', 0, '2024-05-05 18:26:41', 'loan', 23, '300', '300'),
(25, 1, 'dr', '', 0, '2024-05-05 18:26:41', 'loan', 23, '300', '300'),
(26, 44, '', 'cr', 0, '2024-05-05 18:26:56', 'loan', 23, '300', '300'),
(27, 1, 'dr', '', 0, '2024-05-05 18:26:56', 'loan', 23, '300', '300'),
(28, 44, '', 'cr', 0, '2024-05-05 18:28:01', 'loan', 23, '300', '300'),
(29, 1, 'dr', '', 0, '2024-05-05 18:28:01', 'loan', 23, '300', '300');

-- --------------------------------------------------------

--
-- Table structure for table `staff_loan`
--

CREATE TABLE `staff_loan` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `amount_out` int(11) NOT NULL,
  `amount_in` varchar(500) NOT NULL,
  `reason` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_loan`
--

INSERT INTO `staff_loan` (`id`, `sid`, `amount_out`, `amount_in`, `reason`, `create_at`, `created_by`) VALUES
(1, 24, 5000, '3000', 'testing', '2024-04-11 06:37:49', 1),
(2, 35, 23, '100', 'gthrtghrt', '2024-04-16 11:23:52', 1),
(3, 44, 1000, '', 'test 1000', '2024-04-16 11:52:22', 1),
(4, 44, 500, '', 'udhar la gya', '2024-05-05 17:06:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acountledger`
--

CREATE TABLE `tbl_acountledger` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_date` datetime(6) DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_acountledger`
--

INSERT INTO `tbl_acountledger` (`id`, `name`, `staff_id`, `created_date`) VALUES
(1, 'Cash', NULL, '2024-04-09 11:48:32.000000'),
(3, 'ASIM', 33, '2024-04-08 11:49:48.000000'),
(4, 'RAHEEL', 35, '2024-04-08 11:49:48.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fuel`
--

CREATE TABLE `tbl_fuel` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `pump` varchar(100) DEFAULT NULL,
  `fuel_quantity` varchar(100) DEFAULT NULL,
  `fuel_type` varchar(100) DEFAULT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_fuel`
--

INSERT INTO `tbl_fuel` (`id`, `trip_id`, `pump`, `fuel_quantity`, `fuel_type`, `rate`, `amount`) VALUES
(1, 14, '2', '500', NULL, 270, 135000),
(2, 15, '2', '500', NULL, 270, 135000),
(3, 16, '2', '500', NULL, 270, 135000),
(6, 17, '2', '500', NULL, 279, 139500),
(9, 18, '2', '500', NULL, 300, 150000),
(13, 19, '5', '500', NULL, 300, 150000),
(15, 20, '5', '500', NULL, 300, 150000),
(16, 24, '5', '500', NULL, 300, 150000),
(17, 25, '5', '500', NULL, 300, 150000),
(19, 27, '2', '2000', NULL, 1000, 2000000),
(20, 30, '5', '200', NULL, 298, 59600),
(30, 31, '2', '200', NULL, 298, 59600),
(33, 33, '2', '500', NULL, 300, 150000),
(34, 33, '2', '500', NULL, 300, 150000),
(35, 34, '2', '200', NULL, 298, 59600),
(36, 35, '2', '200', NULL, 298, 59600),
(37, 43, '2', '234', NULL, 34, 7956),
(38, 46, '2', '324', NULL, 324, 104976),
(39, 48, '2', '324', NULL, 324, 104976),
(40, 49, '2', '324', NULL, 324, 104976),
(41, 50, '2', '324', NULL, 35, 11340),
(42, 51, '2', '324', NULL, 35, 11340),
(43, 52, '2', '324', NULL, 35, 11340),
(44, 53, '2', '324', NULL, 35, 11340),
(45, 54, '2', '324', NULL, 35, 11340),
(46, 55, '2', '324', NULL, 35, 11340),
(47, 56, '2', '324', NULL, 35, 11340),
(48, 57, '2', '324', NULL, 35, 11340),
(49, 58, '2', '324', NULL, 35, 11340),
(50, 59, '2', '324', NULL, 35, 11340),
(51, 60, '2', '324', NULL, 35, 11340),
(52, 61, '2', '324', NULL, 35, 11340),
(53, 62, '2', '234', NULL, 35, 8190),
(54, 63, '2', '234', NULL, 35, 8190),
(55, 64, '2', '234', NULL, 35, 8190),
(56, 65, '2', '234', NULL, 35, 8190),
(57, 66, '2', '234', NULL, 35, 8190),
(58, 67, '2', '234', NULL, 35, 8190),
(59, 68, '2', '234', NULL, 345, 80730),
(60, 69, '2', '234', NULL, 345, 80730),
(61, 70, '2', '234', NULL, 345, 80730),
(62, 71, '2', '234', NULL, 345, 80730),
(63, 72, '2', '345', NULL, 3445, 1188525),
(64, 73, '2', '200', NULL, 1, 200),
(66, 4, '2', '50', NULL, 270, 13500),
(68, 5, '2', '50', NULL, 270, 13500),
(70, 1, '2', '5', NULL, 270, 1350),
(71, 2, '2', '200', NULL, 298, 59600),
(73, 3, '2', '200', NULL, 298, 59600);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `t_id` int(11) NOT NULL,
  `t_customer_id` varchar(11) NOT NULL,
  `t_vechicle` varchar(100) NOT NULL,
  `t_driver` varchar(100) NOT NULL,
  `t_driver_2` int(11) DEFAULT NULL,
  `helper` int(11) DEFAULT NULL,
  `t_start_date` varchar(100) NOT NULL,
  `t_end_date` datetime NOT NULL,
  `t_totaldistance` varchar(100) NOT NULL,
  `t_trip_amount` varchar(100) NOT NULL DEFAULT '0',
  `t_exp_amount` double NOT NULL DEFAULT 0,
  `t_created_by` varchar(100) NOT NULL,
  `t_created_date` datetime NOT NULL,
  `t_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cmt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t_trackingcode` varchar(225) DEFAULT NULL,
  `t_start_meter` varchar(225) DEFAULT NULL,
  `t_end_meter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`t_id`, `t_customer_id`, `t_vechicle`, `t_driver`, `t_driver_2`, `helper`, `t_start_date`, `t_end_date`, `t_totaldistance`, `t_trip_amount`, `t_exp_amount`, `t_created_by`, `t_created_date`, `t_modified_date`, `cmt`, `t_trackingcode`, `t_start_meter`, `t_end_meter`) VALUES
(1, '1', '4', '24', 27, 34, '2024-04-08 00:15:00', '2024-04-09 00:45:00', '0', '50000', 55378, '1', '2024-04-08 03:52:19', '2024-04-10 23:22:53', '', 'TMM-965-1', '1970-01-01 05:00', '1970-01-01 05:00'),
(2, '5', '15', '10', 7, 34, '2024-04-07 12:16:00', '2024-04-10 12:16:00', '6776', '140000', 74900, '1', '2024-04-08 12:15:19', '2024-04-08 07:20:28', '', 'TMJ-765-1', '29999', '36775'),
(3, '4', '30', '7', 4, 36, '2024-04-21 16:34:00', '2024-04-23 16:35:00', '23000', '140000', 70100, '1', '2024-04-08 04:52:50', '2024-04-08 11:53:00', '', 'TAL-714-1', '1970-01-01 05:00', '1970-01-01 05:00');

-- --------------------------------------------------------

--
-- Table structure for table `trip_payments`
--

CREATE TABLE `trip_payments` (
  `tp_id` int(11) NOT NULL,
  `tp_trip_id` int(11) NOT NULL,
  `tp_v_id` int(11) NOT NULL,
  `tp_amount` int(100) NOT NULL,
  `tp_notes` varchar(256) DEFAULT NULL,
  `tp_created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip_routes`
--

CREATE TABLE `trip_routes` (
  `id` int(11) NOT NULL,
  `route_from` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `route_to` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `weight` double NOT NULL,
  `unit_price` double NOT NULL,
  `total` double NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trip_routes`
--

INSERT INTO `trip_routes` (`id`, `route_from`, `route_to`, `weight`, `unit_price`, `total`, `trip_id`) VALUES
(2, '5', '5', 500, 100, 50000, 1),
(3, 'khushab', 'Joharabad', 40, 3500, 140000, 2),
(5, '5', '6', 40, 3500, 140000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `type_staff`
--

CREATE TABLE `type_staff` (
  `st_id` int(11) NOT NULL,
  `type_name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `sal_type` int(11) NOT NULL DEFAULT 0,
  `editable` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_staff`
--

INSERT INTO `type_staff` (`st_id`, `type_name`, `created_at`, `sal_type`, `editable`) VALUES
(1, 'Drivers', '2024-04-03 00:32:47', 1, 1),
(2, 'Helpers', '2024-04-03 00:32:58', 1, 1),
(3, 'Office', '2024-04-03 00:33:09', 0, 1),
(8, 'workshop', '2024-04-04 16:34:22', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tyres_name`
--

CREATE TABLE `tyres_name` (
  `id` int(11) NOT NULL,
  `tyre_name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vehicle_type` int(11) NOT NULL DEFAULT 0,
  `editable` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tyres_name`
--

INSERT INTO `tyres_name` (`id`, `tyre_name`, `created_at`, `vehicle_type`, `editable`) VALUES
(4, 'new3', '2024-04-29 17:22:07', 1, 0),
(5, 'new ', '2024-04-29 17:28:35', 2, 0),
(6, '18 wheeler 2nd tyre', '2024-05-01 12:58:21', 2, 0),
(7, '18 wheeler 1st tyre', '2024-05-02 16:16:37', 1, 0),
(8, 'L1', '2024-05-06 14:37:50', 1, 0),
(9, 'A-L', '2024-05-06 14:38:45', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tyre_companies`
--

CREATE TABLE `tyre_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tyre_companies`
--

INSERT INTO `tyre_companies` (`id`, `name`, `is_default`, `create_at`, `editable`) VALUES
(2, 'Services', 0, '2024-04-18 19:20:51', 0),
(3, 'New Vehicle', 0, '2024-04-18 19:20:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tyre_types`
--

CREATE TABLE `tyre_types` (
  `id` int(11) NOT NULL,
  `tyre_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tyre_number` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `purchasing_date` datetime(6) DEFAULT current_timestamp(6),
  `amount` varchar(255) DEFAULT NULL,
  `tyre_run` varchar(255) DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tyre_types`
--

INSERT INTO `tyre_types` (`id`, `tyre_name`, `tyre_number`, `company`, `purchasing_date`, `amount`, `tyre_run`, `is_default`, `create_at`, `editable`) VALUES
(3, 'new', '346', '2', '2024-04-17 00:00:00.000000', '345', '3 km run', 0, '2024-04-18 19:36:14', 0),
(4, 'test', '1122', '2', '2024-04-01 11:03:00.000000', '10000', '100 Km', 0, '2024-04-27 06:06:19', 0),
(5, 'test', '1122', '2', '2024-04-01 11:03:00.000000', '10000', '100 Km', 0, '2024-04-27 06:06:28', 0),
(6, 'test', '1122', '2', '2024-04-01 11:03:00.000000', '10000', '100 Km', 0, '2024-04-27 06:07:18', 0),
(7, 'test2', '123', '3', '2024-04-01 00:00:00.000000', '10000', '100 km', 0, '2024-04-27 06:08:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(10) NOT NULL,
  `v_registration_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `v_model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_chassis_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_engine_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_manufactured_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_type` varchar(100) NOT NULL,
  `v_color` varchar(100) NOT NULL,
  `v_mileageperlitre` varchar(100) NOT NULL,
  `v_is_active` int(10) NOT NULL DEFAULT 1,
  `v_group` int(11) NOT NULL,
  `v_reg_exp_date` varchar(100) DEFAULT NULL,
  `v_api_url` varchar(100) DEFAULT NULL,
  `v_api_username` varchar(100) DEFAULT NULL,
  `v_api_password` varchar(100) DEFAULT NULL,
  `v_traccar_id` varchar(100) DEFAULT NULL,
  `v_file` varchar(256) DEFAULT NULL,
  `v_file1` varchar(256) DEFAULT NULL,
  `v_created_by` varchar(100) NOT NULL,
  `v_created_date` datetime NOT NULL,
  `v_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `driver_1` int(11) DEFAULT NULL,
  `driver_2` int(11) DEFAULT NULL,
  `helper` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `v_registration_no`, `v_name`, `v_model`, `v_chassis_no`, `v_engine_no`, `v_manufactured_by`, `v_type`, `v_color`, `v_mileageperlitre`, `v_is_active`, `v_group`, `v_reg_exp_date`, `v_api_url`, `v_api_username`, `v_api_password`, `v_traccar_id`, `v_file`, `v_file1`, `v_created_by`, `v_created_date`, `v_modified_date`, `driver_1`, `driver_2`, `helper`) VALUES
(1, 'hghd', 'ffsf', 'fds', 'fds', 'fdfsf', 'dfs', 'TRUCK', '#D6E1F3', '0', 1, 1, '22/07/2025', 'http://192.168.1.173/fleet/api', 'hghd', '719864', NULL, NULL, 'form_options4.docx', '1', '2024-03-08 08:40:24', '2024-03-08 07:45:18', NULL, NULL, NULL),
(2, 'hghd', 'ffsf', 'fds', 'fds', 'fdfsf', 'dfs', 'TRUCK', '#D6E1F3', '0', 1, 1, '22/07/2025', 'http://192.168.1.173/fleet/api', 'hghd', '719864', NULL, NULL, 'form_options4.docx', '1', '2024-03-08 08:40:24', '2024-03-08 07:45:46', NULL, NULL, NULL),
(3, 'gfsfd', 'fsf', 'fdsf', 'fdsf', 'ad', 'dads', 'CAR', '#D6E1F3', '0', 1, 1, '2024-03-08', NULL, NULL, NULL, NULL, '12841432_609220009230685_7011703357151156321_o.jpeg', NULL, '1', '2024-03-08 12:53:05', '2024-03-08 11:53:13', NULL, NULL, NULL),
(4, 'TMM-965', 'DAEWOO', '2022', 'PAKLKV4TBFM000059', 'DE08TIS177528C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, '1970-01-01', NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-01-26_at_11_02_34_AM.jpeg', NULL, '2', '2024-04-07 11:15:10', '2024-04-07 11:17:52', 24, 27, 34),
(5, 'TML-065', 'FAW', '2018', 'KBL84545', 'FDBFH112224', 'FAW', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-02-21_at_7_07_14_PM.jpeg', NULL, '1', '2024-03-08 12:57:24', '2024-03-08 11:58:38', NULL, NULL, NULL),
(6, '1223', 'cdc', '14', '124', '123', 'vbcxfb', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, '6226_Mercedes-Benz-2.png', NULL, '2', '2024-03-11 01:38:25', '2024-03-11 13:39:20', NULL, NULL, NULL),
(7, '123', 'qwer', '1234', '12345', '2345', 'sangha', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, '6226_Mercedes-Benz-21.png', NULL, '1', '2024-03-31 06:41:17', '2024-03-31 18:43:06', NULL, NULL, NULL),
(8, '23XX-222-22', 'Test', 'XX', 'XX', 'XX', 'XX', '2', '#D6E1F3', '0', 1, 1, '1970-01-01', NULL, NULL, NULL, NULL, 'Lighthouse.jpg', 'Hydrangeas.jpg', '1', '2024-04-30 02:57:55', '2024-04-30 09:57:58', 11, 14, 0),
(9, 'TML-265', 'FAW', '2021', 'AHFMC28P6210396', '53598146', 'FAW', 'TRUCK', 'WHITE', '0', 1, 1, '1970-01-01', NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM1.jpeg', NULL, '2', '2024-04-07 10:19:19', '2024-04-07 10:22:07', 5, 0, 0),
(10, 'TML-165', 'FAW', '2021', 'AHFMC28P6210395', '53598149', 'FAW', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM2.jpeg', NULL, '2', '2024-04-07 10:22:16', '2024-04-07 10:23:36', 0, 0, 0),
(11, 'TML-365', 'FAW', '2021', 'AHFMC28P6210397', '53606938', 'FAW', 'TRUCK', 'WHITR', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM3.jpeg', NULL, '2', '2024-04-07 10:30:33', '2024-04-07 10:32:14', 6, 0, 0),
(12, 'TML-465', 'FAW', '2021', 'AHFMC28P6210398', '53598145', 'FAW', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM4.jpeg', NULL, '2', '2024-04-07 10:32:21', '2024-04-07 10:34:24', 11, 31, 0),
(13, 'TMG-565', 'ISUZU', '2018', 'JALFVZ34PH7001351', '6HK1V3938', 'ISUZU', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM5.jpeg', NULL, '2', '2024-04-07 10:34:30', '2024-04-07 10:38:44', 8, 0, 0),
(14, 'TMJ-665', 'ISUZU', '2019', 'JALFVZ34PJ71345', '6HKI216146', 'ISUZU', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM6.jpeg', NULL, '2', '2024-04-07 10:38:49', '2024-04-07 10:44:02', 9, 0, 35),
(15, 'TMJ-765', 'ISUZU', '2019', 'EMPTY', 'EMPTY', 'EMPTY', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-04-07_at_3_06_48_PM7.jpeg', NULL, '2', '2024-04-07 10:44:18', '2024-04-07 10:46:58', 10, 7, 0),
(16, 'TMM-065', 'DAEWOO', '2022', 'PAKLKV4TVFM000054', 'DE08TIS177502C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 10:47:19', '2024-04-07 10:52:30', 2, 17, 0),
(17, 'TMM-465', 'DAEWOO', '2022', 'PAKLKV4TBFM000055', 'DE08TIS177505C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 10:56:46', '2024-04-07 10:58:28', 18, 44, 0),
(18, 'TLQ-565', 'DAEWOO', '2022', 'PAKLKV4TBFM000056', 'DE08TIS177506C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 10:58:45', '2024-04-07 11:06:42', 19, 0, 0),
(19, 'TMM-665', 'DAEWOO', '2022', 'PAKLKV4TBFM000057', 'DE08TIS177525C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:06:56', '2024-04-07 11:09:13', 21, 22, 0),
(20, 'TLQ-765', 'DAEWOO', '2022', 'PAKLKV4TBFM000058', 'DE08TIS177527C02', 'DAEWOO', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:09:20', '2024-04-07 11:11:30', 20, 23, 0),
(21, 'E-4065', 'DAEWOO', '2022', 'PAKLKV4TBF000060', 'DE08TIS177530C02', 'CHINA', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:22:10', '2024-04-07 11:31:34', 25, 0, 33),
(22, 'E-4165', 'DAEWOO', '2022', 'PAKLKV4TBF000061', 'DE08TIS177481C02', 'CHINA', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:31:40', '2024-04-07 11:34:36', 0, 0, 0),
(23, 'E-4265', 'DAEWOO', '2022', 'PAKLKV4TBF000062', 'DE08TIS177482C02', 'CHINA', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:34:42', '2024-04-07 11:37:07', 26, 0, 0),
(24, 'E-4365', 'DAEWOO', '2022', 'PAKLKV4TBF000063', 'DE08TIS177487CO2', 'CHINA', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:37:11', '2024-04-07 11:39:18', 27, 0, 0),
(25, 'E-4465', 'DAEWOO', '2022', 'PAKLKV4TBF000064', 'DE08TIS177489CO2', 'CHINA', 'TRUCK', 'WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:39:22', '2024-04-07 11:41:20', 14, 0, 0),
(26, 'E-4565', 'DAEWOO', '2022', 'PAKLKV4TBF000065', 'DE08TIS177490CO2', 'CHINA', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:41:29', '2024-04-07 11:43:42', 29, 0, 34),
(27, 'E-4665', 'DAEWOO', '2022', 'PAKLKV4TBF000066', 'DE08TIS177500CO2', 'CHINA', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:43:48', '2024-04-07 11:44:59', 30, 40, 0),
(28, 'TMN-565', 'FAW', 'EMPTY', 'EMPTY', 'EMPTY', 'CHINA', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:48:35', '2024-04-07 11:50:08', 15, 16, 0),
(29, 'TAP-214', 'ISUZU', 'EMPTY', 'EMPTY', 'EMPTY', 'JAPAN', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:53:14', '2024-04-07 11:54:41', 0, 0, 0),
(30, 'TAL-714', 'ISUZU', '2020', 'EMPTY', 'EMPTY', 'JAPAN', 'TRUCK', '#WHITE', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2024-04-07 11:54:46', '2024-04-07 11:55:39', 0, 0, 0),
(31, 'TAN-814', 'ISUZU', '2018', 'EMPTY', 'EMPTY', 'JAPAN', '2', 'WHITE', '0', 1, 1, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-04-30 06:10:27', '2024-04-30 13:10:37', 0, 0, 0),
(32, '2343', 'wer', 'wr', 'wr', 'werwer', 'wer', '1', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2024-05-03 07:57:17', '2024-05-03 14:58:47', 4, 5, 35);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `vid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gr_desc` varchar(256) NOT NULL,
  `gr_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle_group`
--

INSERT INTO `vehicle_group` (`gr_id`, `gr_name`, `gr_desc`, `gr_created_date`) VALUES
(1, 'TIPPER DAMPERS', '[=KIMJI', '2024-03-08 07:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_maintenance`
--

CREATE TABLE `vehicle_maintenance` (
  `m_id` int(11) NOT NULL,
  `m_v_id` varchar(11) NOT NULL,
  `m_start_date` date NOT NULL,
  `m_end_date` varchar(100) DEFAULT NULL,
  `m_service_info` varchar(256) NOT NULL,
  `m_cost` varchar(11) NOT NULL DEFAULT '0',
  `m_vendor` varchar(100) DEFAULT NULL,
  `m_status` varchar(100) NOT NULL DEFAULT 'planned',
  `m_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_maintenance_parts_used`
--

CREATE TABLE `vehicle_maintenance_parts_used` (
  `pu_id` int(11) NOT NULL,
  `pu_m_id` int(11) NOT NULL,
  `pu_p_id` varchar(100) NOT NULL,
  `pu_qty` varchar(100) NOT NULL,
  `pu_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vih_expense`
--

CREATE TABLE `vih_expense` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL DEFAULT 0,
  `expense_id` int(11) DEFAULT 0,
  `exp_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vih_expense`
--

INSERT INTO `vih_expense` (`id`, `trip_id`, `expense_id`, `exp_name`, `amount`, `create_at`) VALUES
(7, 4, 19, 'Diesel', 13500, '2024-04-08 02:52:08'),
(8, 4, 21, 'Toll Tax', 5, '2024-04-08 02:52:08'),
(9, 4, 22, 'Roti Kharcha', 7, '2024-04-08 02:52:08'),
(13, 5, 19, 'Diesel', 13500, '2024-04-08 02:54:36'),
(14, 5, 21, 'Toll Tax', 5, '2024-04-08 02:54:36'),
(15, 5, 22, 'Roti Kharcha', 7, '2024-04-08 02:54:36'),
(21, 1, 19, 'Diesel', 1350, '2024-04-07 22:52:37'),
(22, 1, 21, 'Toll Tax', 1, '2024-04-07 22:52:37'),
(23, 1, 22, 'Roti Kharcha', 2, '2024-04-07 22:52:37'),
(24, 1, 23, 'Fone Hawa Jali', 3, '2024-04-07 22:52:37'),
(25, 2, 19, 'Diesel', 59600, '2024-04-08 07:20:28'),
(26, 2, 21, 'Toll Tax', 1200, '2024-04-08 07:20:28'),
(27, 2, 22, 'Roti Kharcha', 3500, '2024-04-08 07:20:28'),
(28, 2, 23, 'Fone Hawa Jali', 300, '2024-04-08 07:20:28'),
(29, 2, 24, 'Loading Kharcha', 1000, '2024-04-08 07:20:28'),
(30, 2, 25, 'Unloading Kharcha', 1000, '2024-04-08 07:20:28'),
(31, 2, 26, 'Inam', 1200, '2024-04-08 07:20:28'),
(32, 2, 27, 'Motorway Challan', 3000, '2024-04-08 07:20:28'),
(33, 2, 29, 'Tax', 1000, '2024-04-08 07:20:28'),
(34, 2, 30, 'Mobil Oil Change', 800, '2024-04-08 07:20:28'),
(35, 2, 31, 'Grease', 300, '2024-04-08 07:20:28'),
(36, 2, 32, 'Khairat', 2000, '2024-04-08 07:20:28'),
(48, 3, 19, 'Diesel', 59600, '2024-04-08 11:53:00'),
(49, 3, 21, 'Toll Tax', 1000, '2024-04-08 11:53:00'),
(50, 3, 22, 'Roti Kharcha', 3000, '2024-04-08 11:53:00'),
(51, 3, 23, 'Fone Hawa Jali', 300, '2024-04-08 11:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `vih_income`
--

CREATE TABLE `vih_income` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vih_maintenance`
--

CREATE TABLE `vih_maintenance` (
  `id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL,
  `created_date` datetime(6) DEFAULT current_timestamp(6),
  `update_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vih_types`
--

CREATE TABLE `vih_types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `editable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vih_types`
--

INSERT INTO `vih_types` (`id`, `name`, `is_default`, `create_at`, `editable`) VALUES
(1, '22 weeler', 1, '2024-04-26 05:02:41', 0),
(2, '18 wheeler', 1, '2024-04-26 05:02:58', 0),
(3, '10 wheeler', 1, '2024-04-26 05:03:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vih_tyre`
--

CREATE TABLE `vih_tyre` (
  `id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `ttpe_id` varchar(255) DEFAULT NULL,
  `assign_date` datetime NOT NULL DEFAULT current_timestamp(),
  `assifgnmeter` varchar(255) NOT NULL,
  `close_date` varchar(255) DEFAULT NULL,
  `close_meter` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vih_tyre`
--

INSERT INTO `vih_tyre` (`id`, `vid`, `tid`, `ttpe_id`, `assign_date`, `assifgnmeter`, `close_date`, `close_meter`, `create_at`) VALUES
(1, 32, 5, '4', '2024-05-15 00:00:00', '79 meter', '2024-05-22', '90 meter', '2024-05-04 15:09:30'),
(2, 32, 4, '4', '2024-05-22 00:00:00', '90 meter', '2024-05-10', '999', '2024-05-04 15:09:52'),
(3, 32, 3, '7', '2024-05-28 00:00:00', '45 meter', '2024-05-30', '500', '2024-05-05 17:41:33'),
(4, 32, 7, '8', '2024-05-08 00:00:00', '100', '2024-05-08', '90', '2024-05-08 08:28:56'),
(5, 32, 5, '8', '2024-05-08 00:00:00', '90', '0', '0', '2024-05-08 08:34:05'),
(6, 32, 5, '9', '0000-00-00 00:00:00', '', '2024-05-16', '90', '2024-05-08 08:37:01'),
(7, 32, 6, '9', '2024-05-16 00:00:00', '90', '0', '0', '2024-05-08 08:37:14'),
(8, 32, 3, '7', '2024-05-30 00:00:00', '500', '0', '0', '2024-05-08 08:38:01'),
(9, 32, 4, '4', '2024-05-10 00:00:00', '999', '0', '0', '2024-05-08 08:38:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_detail`
--
ALTER TABLE `crud_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `driver_files`
--
ALTER TABLE `driver_files`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `exp_detail`
--
ALTER TABLE `exp_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exp_types`
--
ALTER TABLE `exp_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`v_fuel_id`);

--
-- Indexes for table `geofences`
--
ALTER TABLE `geofences`
  ADD PRIMARY KEY (`geo_id`);

--
-- Indexes for table `geofence_events`
--
ALTER TABLE `geofence_events`
  ADD PRIMARY KEY (`ge_id`);

--
-- Indexes for table `incomeexpense`
--
ALTER TABLE `incomeexpense`
  ADD PRIMARY KEY (`ie_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `login_roles`
--
ALTER TABLE `login_roles`
  ADD PRIMARY KEY (`lr_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `ofc_exp`
--
ALTER TABLE `ofc_exp`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `partsinventory`
--
ALTER TABLE `partsinventory`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `parts_types`
--
ALTER TABLE `parts_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_user_id` (`v_id`);

--
-- Indexes for table `pumps`
--
ALTER TABLE `pumps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `shift_log`
--
ALTER TABLE `shift_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_bonus`
--
ALTER TABLE `staff_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_exp`
--
ALTER TABLE `staff_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_experience`
--
ALTER TABLE `staff_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_ledger`
--
ALTER TABLE `staff_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_loan`
--
ALTER TABLE `staff_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_acountledger`
--
ALTER TABLE `tbl_acountledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `trip_payments`
--
ALTER TABLE `trip_payments`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `trip_routes`
--
ALTER TABLE `trip_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_staff`
--
ALTER TABLE `type_staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tyres_name`
--
ALTER TABLE `tyres_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_companies`
--
ALTER TABLE `tyre_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_types`
--
ALTER TABLE `tyre_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `vehicle_maintenance`
--
ALTER TABLE `vehicle_maintenance`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `vehicle_maintenance_parts_used`
--
ALTER TABLE `vehicle_maintenance_parts_used`
  ADD PRIMARY KEY (`pu_id`);

--
-- Indexes for table `vih_expense`
--
ALTER TABLE `vih_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vih_income`
--
ALTER TABLE `vih_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vih_maintenance`
--
ALTER TABLE `vih_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vih_types`
--
ALTER TABLE `vih_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vih_tyre`
--
ALTER TABLE `vih_tyre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crud_detail`
--
ALTER TABLE `crud_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `driver_files`
--
ALTER TABLE `driver_files`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exp_detail`
--
ALTER TABLE `exp_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `exp_types`
--
ALTER TABLE `exp_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `v_fuel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofences`
--
ALTER TABLE `geofences`
  MODIFY `geo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `geofence_events`
--
ALTER TABLE `geofence_events`
  MODIFY `ge_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomeexpense`
--
ALTER TABLE `incomeexpense`
  MODIFY `ie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login_roles`
--
ALTER TABLE `login_roles`
  MODIFY `lr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ofc_exp`
--
ALTER TABLE `ofc_exp`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `partsinventory`
--
ALTER TABLE `partsinventory`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parts_types`
--
ALTER TABLE `parts_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pumps`
--
ALTER TABLE `pumps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_log`
--
ALTER TABLE `shift_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_bonus`
--
ALTER TABLE `staff_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff_exp`
--
ALTER TABLE `staff_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff_experience`
--
ALTER TABLE `staff_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_leaves`
--
ALTER TABLE `staff_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_ledger`
--
ALTER TABLE `staff_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `staff_loan`
--
ALTER TABLE `staff_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_acountledger`
--
ALTER TABLE `tbl_acountledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip_payments`
--
ALTER TABLE `trip_payments`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_routes`
--
ALTER TABLE `trip_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_staff`
--
ALTER TABLE `type_staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tyres_name`
--
ALTER TABLE `tyres_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tyre_companies`
--
ALTER TABLE `tyre_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tyre_types`
--
ALTER TABLE `tyre_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_maintenance`
--
ALTER TABLE `vehicle_maintenance`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vih_expense`
--
ALTER TABLE `vih_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `vih_income`
--
ALTER TABLE `vih_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vih_maintenance`
--
ALTER TABLE `vih_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vih_types`
--
ALTER TABLE `vih_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vih_tyre`
--
ALTER TABLE `vih_tyre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
