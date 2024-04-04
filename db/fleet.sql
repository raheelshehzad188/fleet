-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 12:40 AM
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
(4, 'abdullah', '03017102424', 'abdullahasim78920@gmail.com', 'Mohalla Sardar Bahadur Khan Khushab\r\nMohalla Sardar Bahadur Khan Khushab', '2024-03-31 06:40:41', NULL, '1', '2024-03-31 18:40:55');

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
  `d_age` int(11) NOT NULL,
  `d_licenseno` varchar(100) NOT NULL,
  `d_license_expdate` varchar(100) NOT NULL,
  `d_total_exp` int(11) NOT NULL,
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
  `ref_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `d_name`, `d_mobile`, `d_address`, `r_address`, `d_age`, `d_licenseno`, `d_license_expdate`, `d_total_exp`, `d_doj`, `d_ref`, `d_is_active`, `d_file`, `d_file1`, `d_created_by`, `d_created_date`, `d_modified_date`, `st_cat_id`, `dob`, `education`, `blood_grp`, `designation`, `cast`, `cnic_no`, `family_detail`, `e_c_no`, `alt_e_c_no`, `con_expiry`, `ref_position`, `ref_company`, `ref_phone`) VALUES
(1, 'hdg update', '456353455', 'hfhfhg', NULL, 66, 'dad', '1970-01-01', 7, '1970-01-01', 'hfh', 1, '12841432_609220009230685_7011703357151156321_o1.jpeg', NULL, '1', '2024-03-13 11:57:57', '2024-03-11 15:11:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(2, 'fdwrew', '655636465466', 'gffsg', NULL, 60, 'gfddgf', '0', 8, '0', 'hjhffg', 1, '12841432_609220009230685_7011703357151156321_o2.jpeg', 'CHL_Poster.pdf', '1', '2024-03-13 11:54:54', '2024-03-13 11:57:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(3, 'ٹیسٹ ڈرائیور', '056898756', 'fdrte5rtered', NULL, 40, 'X/rtfdrt', '1970-01-01', 2, '1970-01-01', 'ref', 1, 'Capture.PNG', NULL, '1', '2024-03-24 10:35:24', '2024-03-24 10:26:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(4, 'Shaheer', '2345678334', 'Khushab,Joharabad,Street #300', NULL, 23, '3233-3234-4234-3434', '2024-02-12', 100000, '2020-03-04', 'Raheel', 1, 'Capture.PNG', 'Capture.PNG', '1', '2024-03-31 06:44:14', '2024-03-31 18:45:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL),
(6, 'Nimra Younas', '012345678', 'Khushab, Punjab, Pakistan\r\nabc', 'Khushab, Punjab, Pakistan\r\nabc', 66, '8', '1970-01-01', 0, '1970-01-01', 'Nimra Younas', 1, 'Capture14.PNG', 'Capture15.PNG', '1', '2024-04-03 06:53:16', '2024-04-03 17:40:46', 0, '2024/05/03 22:38', '45', 'hg', 'hn', 'fghj', '556768', '8', '88', '88', '2024-04-23 22:39:00.000000', 'PHP developer', 'test', '875767');

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
-- Table structure for table `exp_types`
--

CREATE TABLE `exp_types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exp_types`
--

INSERT INTO `exp_types` (`id`, `name`, `is_default`, `create_at`) VALUES
(19, 'Diesel', 1, '2024-03-22 17:49:53'),
(21, 'Toll Tax', 1, '2024-03-22 17:50:15'),
(22, 'Roti Kharcha', 1, '2024-03-22 17:50:38'),
(23, 'Fone Hawa Jali', 1, '2024-03-22 17:50:58'),
(24, 'Loading Kharcha', 1, '2024-03-22 17:51:19'),
(25, 'Unloading Kharcha', 1, '2024-03-22 17:51:34'),
(26, 'Inam', 1, '2024-03-22 17:51:50'),
(27, 'Motorway Challan', 1, '2024-03-22 17:52:10'),
(28, 'Traffic Challan', 1, '2024-03-22 17:52:39'),
(29, 'Tax', 1, '2024-03-22 17:53:17'),
(30, 'Mobil Oil Change', 1, '2024-03-22 17:53:36'),
(31, 'Grease', 1, '2024-03-22 17:54:01'),
(32, 'Khairat', 1, '2024-03-22 17:54:20'),
(33, 'Wash Service', 1, '2024-03-22 17:54:45'),
(35, 'ٹول خرچہ', 1, '2024-03-24 10:22:05'),
(36, 'خوشاب', 1, '2024-03-26 19:20:50');

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
(1, 'Raheel', 'raheelshehzad188@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1', 'raheelshehzad188@gmail.com', '2024-03-08 00:01:01'),
(2, 'Haroon Awan', 'haroonmalikh80@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1', 'haroonmalikh80@gmail.com', '2024-03-11 13:18:33'),
(7, 'shaheer ', 'shaheer', '3b712de48137572f3849aabd5666a4e3', '1', '1', 'shaheerumer5668704@gmail.com', '2024-03-31 18:58:07');

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
  `lr_parts` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_roles`
--

INSERT INTO `login_roles` (`lr_id`, `lr_u_id`, `lr_vech_list`, `lr_vech_list_view`, `lr_vech_list_edit`, `lr_vech_add`, `lr_vech_group`, `lr_vech_group_add`, `lr_vech_group_action`, `lr_drivers_list`, `lr_drivers_list_edit`, `lr_drivers_add`, `lr_trips_list`, `lr_trips_list_edit`, `lr_trips_add`, `lr_cust_list`, `lr_cust_edit`, `lr_cust_add`, `lr_fuel_list`, `lr_fuel_edit`, `lr_fuel_add`, `lr_reminder_list`, `lr_reminder_delete`, `lr_reminder_add`, `lr_ie_list`, `lr_ie_edit`, `lr_ie_add`, `lr_tracking`, `lr_liveloc`, `lr_geofence_add`, `lr_geofence_list`, `lr_geofence_delete`, `lr_geofence_events`, `lr_reports`, `lr_settings`, `lr_vech_del`, `lr_driver_del`, `lr_booking_del`, `lr_cust_del`, `lr_fuel_del`, `lr_reminder_del`, `lr_ie_del`, `lr_maintenace`, `lr_maintenace_add`, `lr_vech_availablity`, `lr_parts`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(8, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `is_default`, `create_at`) VALUES
(2, 'خوشاب', 1, '2024-03-26 19:24:43'),
(3, 'سرگودھا', 1, '2024-03-27 17:32:00'),
(4, 'faroqabad', 1, '2024-03-29 11:07:53');

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
  `s_date_format` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `s_companyname`, `s_address`, `s_inovice_prefix`, `s_logo`, `s_price_prefix`, `s_inovice_termsandcondition`, `s_inovice_servicename`, `s_googel_api_key`, `s_traccar_enabled`, `s_traccar_url`, `s_traccar_username`, `s_traccar_password`, `s_date_format`) VALUES
(1, 'VMS', '19/14,First Street,Chennai-1000', 'TEST', '', '$ ', 'Sample invoice terms and condition..Please change it in settings page............                                                                                                                                                                               ', 'Vehicle Booking', 'AIzaSyA1tT5eHsRh7kbZDzebF-lfVzVgSX8zpLg', 0, NULL, NULL, NULL, 'Y-m-d H:i');

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
(30, 31, '2', '200', NULL, 298, 59600);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `t_id` int(11) NOT NULL,
  `t_customer_id` varchar(11) NOT NULL,
  `t_vechicle` varchar(100) NOT NULL,
  `t_driver` varchar(100) NOT NULL,
  `t_start_date` varchar(100) NOT NULL,
  `t_end_date` datetime NOT NULL,
  `t_totaldistance` varchar(100) NOT NULL,
  `t_trip_amount` varchar(100) NOT NULL DEFAULT '0',
  `t_exp_amount` double NOT NULL DEFAULT 0,
  `t_created_by` varchar(100) NOT NULL,
  `t_created_date` datetime NOT NULL,
  `t_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cmt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `t_trackingcode` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`t_id`, `t_customer_id`, `t_vechicle`, `t_driver`, `t_start_date`, `t_end_date`, `t_totaldistance`, `t_trip_amount`, `t_exp_amount`, `t_created_by`, `t_created_date`, `t_modified_date`, `cmt`, `t_trackingcode`) VALUES
(1, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:02:53', '', NULL),
(2, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:03:13', '', NULL),
(3, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:04:07', '', NULL),
(4, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:06:07', '', NULL),
(5, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:06:54', '', NULL),
(6, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:08:16', '', NULL),
(7, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:08:37', '', NULL),
(8, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:09:03', '', NULL),
(9, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:09:59', '', NULL),
(10, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:10:43', '', NULL),
(11, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:11:46', '', NULL),
(12, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:12:35', '', NULL),
(13, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:13:24', '', NULL),
(14, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:09:57', '', NULL),
(15, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:10:19', '', NULL),
(16, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:12:12', '', NULL),
(17, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', 'NaN', '2500000', 7000, '1', '2024-03-22 10:35:22', '2024-03-22 09:35:33', '', NULL),
(18, '2', '4', '3', '2024-03-23 15:36:00', '2024-03-25 15:36:00', '0', '100000', 760, '1', '2024-03-24 10:44:57', '2024-03-24 10:47:06', '', NULL),
(19, '2', '4', '3', '2024-03-23 15:53:00', '2024-03-24 15:53:00', '0', '100000', 550, '1', '2024-03-24 10:57:30', '2024-03-24 10:57:54', 'رتگتےتےھتےھتےھھ', NULL),
(20, '2', '4', '3', '2024-03-23 15:59:00', '2024-03-24 15:59:00', '0', '100000', 600, '1', '2024-03-24 11:00:36', '2024-03-24 11:01:03', 'شدفطگفگفگتھ', NULL),
(21, '2', '4', '3', '2024-03-25 15:19:00', '2024-03-26 15:20:00', '', '0', 0, '1', '2024-03-26 10:21:06', '2024-03-26 10:43:05', '', 'TMM-965-1'),
(22, '2', '4', '3', '2024-03-25 15:44:00', '2024-03-26 15:44:00', '', '0', 0, '1', '2024-03-26 10:44:00', '2024-03-26 10:53:34', '', 'TMM-965-2'),
(23, '2', '1', '2', '2024-03-25 15:53:00', '2024-03-26 15:53:00', '', '0', 0, '1', '2024-03-26 10:53:48', '2024-03-26 10:54:05', '', 'hghd-1'),
(24, '2', '4', '3', '2024-03-26 22:58:00', '2024-03-27 22:58:00', '0', '0', 135, '1', '2024-03-26 05:52:28', '2024-03-26 17:59:32', '', 'TMM-965-3'),
(25, '2', '4', '3', '2024-03-26 00:33:00', '2024-03-27 00:33:00', '0', '0', 200, '1', '2024-03-26 07:33:25', '2024-03-26 19:34:33', '', 'TMM-965-4'),
(26, '1', '1', '3', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '0', '0', 5500, '1', '2024-03-27 05:35:13', '2024-03-27 17:36:07', '', 'hghd-2'),
(27, '2', '1', '1', '2024-03-27 11:57:00', '2024-03-29 11:57:00', '0.00', '275', 2002400, '1', '2024-03-29 10:00:58', '2024-03-29 10:01:12', '', 'hghd-3'),
(28, '1', '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', '0', 0, '1', '2024-03-29 05:54:35', '2024-03-29 17:55:57', '', ''),
(29, '1', '', '', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', '0', 0, '1', '2024-03-29 05:54:35', '2024-03-29 17:55:58', '', ''),
(30, '2', '4', '3', '2024-03-29 01:00:00', '2024-03-30 01:00:00', '0.12', '0', 80500, '1', '2024-03-30 08:05:19', '2024-03-30 20:18:00', '', 'TMM-965-5'),
(31, '4', '7', '4', '2024-03-30 11:46:00', '2024-03-31 11:46:00', '0.00 Km', '140000', 68600, '1', '2024-03-31 08:11:15', '2024-03-31 20:11:23', '', '123-1');

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
(1, 'خوشاب', 'khb', 5, 500, 2500, 25),
(2, 'sgd', 'khb', 5, 500, 2500, 23),
(3, 'gfdf', 'fsf', 5, 55, 275, 24),
(16, 'khb', 'sgd', 5, 500, 2500, 28),
(17, 'khushab', 'mianwali', 200, 20, 4000, 29),
(18, 'khushab', 'mianwali', 200, 20, 4000, 30),
(80, 'dgfs', 'rrsf', 44, 44, 1936, 1),
(81, 'dgfs', 'rrsf', 44, 44, 1936, 2),
(82, 'dgfs', 'rrsf', 44, 44, 1936, 3),
(83, 'dgfs', 'rrsf', 44, 44, 1936, 4),
(84, 'dgfs', 'rrsf', 44, 44, 1936, 5),
(85, 'dgfs', 'rrsf', 44, 44, 1936, 6),
(86, 'dgfs', 'rrsf', 44, 44, 1936, 7),
(87, 'dgfs', 'rrsf', 44, 44, 1936, 8),
(88, 'dgfs', 'rrsf', 44, 44, 1936, 9),
(89, 'dgfs', 'rrsf', 44, 44, 1936, 10),
(90, 'dgfs', 'rrsf', 44, 44, 1936, 11),
(91, 'dgfs', 'rrsf', 44, 44, 1936, 12),
(92, 'dgfs', 'rrsf', 44, 44, 1936, 13),
(93, 'khb', 'sgd', 500, 5000, 2500000, 14),
(94, 'khb', 'sgd', 500, 5000, 2500000, 15),
(95, 'khb', 'sgd', 500, 5000, 2500000, 16),
(109, 'khb', 'sgd', 500, 5000, 2500000, 17),
(120, 'خوشاب', 'کراچی', 1000, 100, 100000, 18),
(140, 'خوشاب', 'کراچی', 1000, 100, 100000, 20),
(145, '', 'gd', 5, 55, 275, 27),
(146, '', '', 0, 0, 0, 27),
(147, '', '', 0, 0, 0, 27),
(148, '', '', 0, 0, 0, 27),
(149, 'خوشاب', 'سرگودھا', 40, 3500, 140000, 30),
(180, '2', '4', 40, 3500, 140000, 31);

-- --------------------------------------------------------

--
-- Table structure for table `type_staff`
--

CREATE TABLE `type_staff` (
  `st_id` int(11) NOT NULL,
  `type_name` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_staff`
--

INSERT INTO `type_staff` (`st_id`, `type_name`, `created_at`) VALUES
(5, 'Drivers', '2024-04-03 00:32:47'),
(6, 'Helpers', '2024-04-03 00:32:58'),
(7, 'Office', '2024-04-03 00:33:09');

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
  `v_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`v_id`, `v_registration_no`, `v_name`, `v_model`, `v_chassis_no`, `v_engine_no`, `v_manufactured_by`, `v_type`, `v_color`, `v_mileageperlitre`, `v_is_active`, `v_group`, `v_reg_exp_date`, `v_api_url`, `v_api_username`, `v_api_password`, `v_traccar_id`, `v_file`, `v_file1`, `v_created_by`, `v_created_date`, `v_modified_date`) VALUES
(1, 'hghd', 'ffsf', 'fds', 'fds', 'fdfsf', 'dfs', 'TRUCK', '#D6E1F3', '0', 1, 1, '22/07/2025', 'http://192.168.1.173/fleet/api', 'hghd', '719864', NULL, NULL, 'form_options4.docx', '1', '2024-03-08 08:40:24', '2024-03-08 07:45:18'),
(2, 'hghd', 'ffsf', 'fds', 'fds', 'fdfsf', 'dfs', 'TRUCK', '#D6E1F3', '0', 1, 1, '22/07/2025', 'http://192.168.1.173/fleet/api', 'hghd', '719864', NULL, NULL, 'form_options4.docx', '1', '2024-03-08 08:40:24', '2024-03-08 07:45:46'),
(3, 'gfsfd', 'fsf', 'fdsf', 'fdsf', 'ad', 'dads', 'CAR', '#D6E1F3', '0', 1, 1, '2024-03-08', NULL, NULL, NULL, NULL, '12841432_609220009230685_7011703357151156321_o.jpeg', NULL, '1', '2024-03-08 12:53:05', '2024-03-08 11:53:13'),
(4, 'TMM-965', 'DAEWOO', '2022', 'FDFG454647', 'SFSF56898', 'DAEWOO', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-01-26_at_11_02_34_AM.jpeg', NULL, '1', '2024-03-08 12:55:36', '2024-03-08 11:56:42'),
(5, 'TML-065', 'FAW', '2018', 'KBL84545', 'FDBFH112224', 'FAW', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-02-21_at_7_07_14_PM.jpeg', NULL, '1', '2024-03-08 12:57:24', '2024-03-08 11:58:38'),
(6, '1223', 'cdc', '14', '124', '123', 'vbcxfb', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, '6226_Mercedes-Benz-2.png', NULL, '2', '2024-03-11 01:38:25', '2024-03-11 13:39:20'),
(7, '123', 'qwer', '1234', '12345', '2345', 'sangha', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, '6226_Mercedes-Benz-21.png', NULL, '1', '2024-03-31 06:41:17', '2024-03-31 18:43:06');

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
(13, 28, 6, 'Inam', 5000, '2024-03-19 11:01:06'),
(14, 28, 10, 'Extra expense', 500, '2024-03-19 11:01:06'),
(23, 13, 6, 'Inam', 0, '2024-03-21 17:13:24'),
(24, 13, 11, 'Nrew defauult', 0, '2024-03-21 17:13:24'),
(25, 14, 6, 'Inam', 2000, '2024-03-22 03:09:57'),
(26, 14, 11, 'Nrew defauult', 0, '2024-03-22 03:09:57'),
(27, 15, 6, 'Inam', 2000, '2024-03-22 03:10:19'),
(28, 15, 11, 'Nrew defauult', 0, '2024-03-22 03:10:19'),
(29, 16, 6, 'Inam', 2000, '2024-03-22 03:12:12'),
(30, 16, 11, 'Nrew defauult', 0, '2024-03-22 03:12:12'),
(31, 16, 17, 'Extra expense', 5000, '2024-03-22 03:12:12'),
(41, 17, 6, 'Inam', 2000, '2024-03-22 14:35:33'),
(42, 17, 11, 'Nrew defauult', 0, '2024-03-22 14:35:33'),
(43, 17, 18, 'Extra expense', 5000, '2024-03-22 14:35:33'),
(52, 18, 19, 'Diesel', 500, '2024-03-24 10:47:06'),
(53, 18, 21, 'Toll Tax', 50, '2024-03-24 10:47:06'),
(54, 18, 22, 'Roti Kharcha', 200, '2024-03-24 10:47:06'),
(55, 18, 23, 'Fone Hawa Jali', 10, '2024-03-24 10:47:06'),
(62, 19, 33, 'Wash Service', 500, '2024-03-24 10:57:54'),
(63, 19, 35, 'ٹول خرچہ', 50, '2024-03-24 10:57:54'),
(67, 20, 32, 'Khairat', 100, '2024-03-24 11:01:03'),
(68, 20, 33, 'Wash Service', 400, '2024-03-24 11:01:03'),
(69, 20, 35, 'ٹول خرچہ', 100, '2024-03-24 11:01:03'),
(70, 21, 19, 'Diesel', 0, '2024-03-26 10:43:05'),
(71, 21, 21, 'Toll Tax', 0, '2024-03-26 10:43:05'),
(72, 21, 22, 'Roti Kharcha', 0, '2024-03-26 10:43:05'),
(73, 21, 23, 'Fone Hawa Jali', 0, '2024-03-26 10:43:05'),
(74, 22, 19, 'Diesel', 0, '2024-03-26 10:53:34'),
(75, 22, 21, 'Toll Tax', 0, '2024-03-26 10:53:34'),
(76, 22, 22, 'Roti Kharcha', 0, '2024-03-26 10:53:34'),
(77, 22, 23, 'Fone Hawa Jali', 0, '2024-03-26 10:53:34'),
(78, 23, 19, 'Diesel', 0, '2024-03-26 10:54:05'),
(79, 23, 21, 'Toll Tax', 0, '2024-03-26 10:54:05'),
(80, 23, 22, 'Roti Kharcha', 0, '2024-03-26 10:54:05'),
(81, 23, 23, 'Fone Hawa Jali', 0, '2024-03-26 10:54:05'),
(82, 24, 33, 'Wash Service', 123, '2024-03-26 17:59:32'),
(83, 24, 35, 'ٹول خرچہ', 12, '2024-03-26 17:59:32'),
(84, 25, 35, 'ٹول خرچہ', 200, '2024-03-26 19:34:33'),
(85, 26, 6, 'Inam', 5000, '2024-03-27 17:36:07'),
(86, 26, 10, 'Extra expense', 500, '2024-03-27 17:36:07'),
(91, 27, 19, 'Diesel', 2000000, '2024-03-29 10:01:12'),
(92, 27, 21, 'Toll Tax', 200, '2024-03-29 10:01:12'),
(93, 27, 22, 'Roti Kharcha', 2000, '2024-03-29 10:01:12'),
(94, 27, 23, 'Fone Hawa Jali', 200, '2024-03-29 10:01:12'),
(95, 28, 19, 'Diesel', 0, '2024-03-29 17:55:57'),
(96, 28, 21, 'Toll Tax', 0, '2024-03-29 17:55:57'),
(97, 28, 22, 'Roti Kharcha', 0, '2024-03-29 17:55:57'),
(98, 28, 23, 'Fone Hawa Jali', 0, '2024-03-29 17:55:57'),
(99, 29, 19, 'Diesel', 0, '2024-03-29 17:55:58'),
(100, 29, 21, 'Toll Tax', 0, '2024-03-29 17:55:58'),
(101, 29, 22, 'Roti Kharcha', 0, '2024-03-29 17:55:58'),
(102, 29, 23, 'Fone Hawa Jali', 0, '2024-03-29 17:55:58'),
(103, 30, 19, 'Diesel', 59600, '2024-03-30 20:18:00'),
(104, 30, 21, 'Toll Tax', 3400, '2024-03-30 20:18:00'),
(105, 30, 22, 'Roti Kharcha', 7500, '2024-03-30 20:18:00'),
(106, 30, 23, 'Fone Hawa Jali', 300, '2024-03-30 20:18:00'),
(143, 31, 6, 'Inam', 1000, '2024-03-31 23:24:00'),
(144, 31, 19, 'Diesel', 59600, '2024-03-31 23:24:00'),
(145, 31, 21, 'Toll Tax', 1000, '2024-03-31 23:24:00'),
(146, 31, 22, 'Roti Kharcha', 7000, '2024-03-31 23:24:00');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `exp_types`
--
ALTER TABLE `exp_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `staff_experience`
--
ALTER TABLE `staff_experience`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exp_types`
--
ALTER TABLE `exp_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_roles`
--
ALTER TABLE `login_roles`
  MODIFY `lr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_experience`
--
ALTER TABLE `staff_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `trip_payments`
--
ALTER TABLE `trip_payments`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_routes`
--
ALTER TABLE `trip_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `type_staff`
--
ALTER TABLE `type_staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `vih_income`
--
ALTER TABLE `vih_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
