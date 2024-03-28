-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2024 at 10:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_address`, `c_created_date`, `c_pwd`, `c_isactive`, `c_modified_date`) VALUES
(1, 'A company', '92300410607', 'raheelshehzad188@gmail.com', 'tfsf', '2024-03-15 11:56:24', NULL, '1', '2024-03-15 11:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `d_mobile` varchar(15) NOT NULL,
  `d_address` varchar(250) NOT NULL,
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
  `d_modified_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`d_id`, `d_name`, `d_mobile`, `d_address`, `d_age`, `d_licenseno`, `d_license_expdate`, `d_total_exp`, `d_doj`, `d_ref`, `d_is_active`, `d_file`, `d_file1`, `d_created_by`, `d_created_date`, `d_modified_date`) VALUES
(1, 'hdg update', '456353455', 'hfhfhg', 66, 'dad', '1970-01-01', 7, '1970-01-01', 'hfh', 1, '12841432_609220009230685_7011703357151156321_o1.jpeg', NULL, '1', '2024-03-13 11:57:57', '2024-03-11 15:11:54'),
(2, 'fdwrew', '655636465466', 'gffsg', 60, 'gfddgf', '0', 8, '0', 'hjhffg', 1, '12841432_609220009230685_7011703357151156321_o2.jpeg', 'CHL_Poster.pdf', '1', '2024-03-13 11:54:54', '2024-03-13 11:57:03');

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
  `name` text NOT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exp_types`
--

INSERT INTO `exp_types` (`id`, `name`, `is_default`, `create_at`) VALUES
(6, 'Inam', 1, '2024-03-18 19:48:09'),
(7, 'Extra expense', 0, '2024-03-19 10:06:39'),
(8, 'Extra expense', 0, '2024-03-19 10:10:50'),
(9, 'Extra expense', 0, '2024-03-19 10:11:28'),
(10, 'Extra expense', 0, '2024-03-19 11:01:06'),
(11, 'Nrew defauult', 1, '2024-03-19 11:14:23'),
(12, 'asdf', 0, '2024-03-19 21:06:19'),
(13, 'inam', 0, '2024-03-19 21:09:50'),
(14, 'test', 0, '2024-03-20 10:56:21'),
(15, 'Extra expense', 0, '2024-03-22 03:09:57'),
(16, 'Extra expense', 0, '2024-03-22 03:10:19'),
(17, 'Extra expense', 0, '2024-03-22 03:12:12'),
(18, 'Extra expense', 0, '2024-03-22 03:13:52');

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
  `u_isactive` varchar(100) NOT NULL DEFAULT '1',
  `u_email` varchar(256) NOT NULL,
  `u_created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_username`, `u_password`, `u_isactive`, `u_email`, `u_created_date`) VALUES
(1, 'Raheel', 'raheelshehzad188@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'raheelshehzad188@gmail.com', '2024-03-08 00:01:01'),
(2, 'Haroon Awan', 'haroonmalikh80@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'haroonmalikh80@gmail.com', '2024-03-11 13:18:33');

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
(2, 2, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0);

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
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `name` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pumps`
--

INSERT INTO `pumps` (`id`, `name`, `create_at`) VALUES
(2, 'sangha pump', '2024-03-21 16:21:17'),
(3, 'katha pump', '2024-03-21 16:21:31');

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
(6, 17, '2', '500', NULL, 279, 139500);

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
  `cmt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`t_id`, `t_customer_id`, `t_vechicle`, `t_driver`, `t_start_date`, `t_end_date`, `t_totaldistance`, `t_trip_amount`, `t_exp_amount`, `t_created_by`, `t_created_date`, `t_modified_date`, `cmt`) VALUES
(1, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:02:53', ''),
(2, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:03:13', ''),
(3, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:04:07', ''),
(4, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:06:07', ''),
(5, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:06:54', ''),
(6, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:08:16', ''),
(7, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:08:37', ''),
(8, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:09:03', ''),
(9, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:09:59', ''),
(10, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:10:43', ''),
(11, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:11:46', ''),
(12, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:12:35', ''),
(13, '1', '1', '1', '2024-03-21 16:55:00', '2024-03-23 16:55:00', '44', '1936', 1936, '1', '2024-03-21 12:55:07', '2024-03-21 12:13:24', ''),
(14, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:09:57', ''),
(15, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:10:19', ''),
(16, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', '45', '2500000', 2493000, '1', '2024-03-21 11:08:53', '2024-03-21 22:12:12', ''),
(17, '1', '1', '1', '2024-03-21 03:09:00', '2024-03-22 03:09:00', 'NaN', '2500000', 7000, '1', '2024-03-22 10:35:22', '2024-03-22 09:35:33', '');

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
  `route_from` text NOT NULL,
  `route_to` text NOT NULL,
  `distance` varchar(50) NOT NULL,
  `weight` double NOT NULL,
  `unit_price` double NOT NULL,
  `total` double NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trip_routes`
--

INSERT INTO `trip_routes` (`id`, `route_from`, `route_to`, `distance`, `weight`, `unit_price`, `total`, `trip_id`) VALUES
(1, 'sgd', 'khb', '45', 5, 500, 2500, 22),
(2, 'sgd', 'khb', '45', 5, 500, 2500, 23),
(3, 'gfdf', 'fsf', '44', 5, 55, 275, 24),
(4, 'gdfg', 'gd', '55', 5, 55, 275, 27),
(16, 'khb', 'sgd', '5', 5, 500, 2500, 28),
(17, 'khushab', 'mianwali', '23', 200, 20, 4000, 29),
(18, 'khushab', 'mianwali', '23', 200, 20, 4000, 30),
(74, 'Khushab1', 'Lahore1', '233', 1000, 10, 10000, 31),
(75, '', '', '', 0, 0, 0, 31),
(76, '', '', '', 0, 0, 0, 31),
(77, '', '', '', 0, 0, 0, 31),
(78, '', '', '', 0, 0, 0, 31),
(79, '', '', '', 0, 0, 0, 31),
(80, 'dgfs', 'rrsf', '44', 44, 44, 1936, 1),
(81, 'dgfs', 'rrsf', '44', 44, 44, 1936, 2),
(82, 'dgfs', 'rrsf', '44', 44, 44, 1936, 3),
(83, 'dgfs', 'rrsf', '44', 44, 44, 1936, 4),
(84, 'dgfs', 'rrsf', '44', 44, 44, 1936, 5),
(85, 'dgfs', 'rrsf', '44', 44, 44, 1936, 6),
(86, 'dgfs', 'rrsf', '44', 44, 44, 1936, 7),
(87, 'dgfs', 'rrsf', '44', 44, 44, 1936, 8),
(88, 'dgfs', 'rrsf', '44', 44, 44, 1936, 9),
(89, 'dgfs', 'rrsf', '44', 44, 44, 1936, 10),
(90, 'dgfs', 'rrsf', '44', 44, 44, 1936, 11),
(91, 'dgfs', 'rrsf', '44', 44, 44, 1936, 12),
(92, 'dgfs', 'rrsf', '44', 44, 44, 1936, 13),
(93, 'khb', 'sgd', '45', 500, 5000, 2500000, 14),
(94, 'khb', 'sgd', '45', 500, 5000, 2500000, 15),
(95, 'khb', 'sgd', '45', 500, 5000, 2500000, 16),
(109, 'khb', 'sgd', '45', 500, 5000, 2500000, 17),
(110, '', '', '', 0, 0, 0, 17),
(111, '', '', '', 0, 0, 0, 17),
(112, '', '', '', 0, 0, 0, 17),
(113, '', '', '', 0, 0, 0, 17),
(114, '', '', '', 0, 0, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `v_id` int(10) NOT NULL,
  `v_registration_no` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `v_name` varchar(100) NOT NULL,
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
(6, '1223', 'cdc', '14', '124', '123', 'vbcxfb', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, '6226_Mercedes-Benz-2.png', NULL, '2', '2024-03-11 01:38:25', '2024-03-11 13:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(256) NOT NULL,
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
  `exp_name` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vih_expense`
--

INSERT INTO `vih_expense` (`id`, `trip_id`, `expense_id`, `exp_name`, `amount`, `create_at`) VALUES
(13, 28, 6, 'Inam', 5000, '2024-03-19 11:01:06'),
(14, 28, 10, 'Extra expense', 500, '2024-03-19 11:01:06'),
(22, 31, 6, 'Inam', 1000, '2024-03-21 16:09:04'),
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
(43, 17, 18, 'Extra expense', 5000, '2024-03-22 14:35:33');

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

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
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`v_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exp_types`
--
ALTER TABLE `exp_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_roles`
--
ALTER TABLE `login_roles`
  MODIFY `lr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pumps`
--
ALTER TABLE `pumps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fuel`
--
ALTER TABLE `tbl_fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trip_payments`
--
ALTER TABLE `trip_payments`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_routes`
--
ALTER TABLE `trip_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vih_income`
--
ALTER TABLE `vih_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
