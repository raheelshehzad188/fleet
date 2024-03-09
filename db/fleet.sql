-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 07:24 PM
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
(2, 'Haroon Awan', 'haroonmalikh80', '156d19fe8c1dd164f881472564c2ace3', '1', 'haroonmalikh80@gmail.com', '2024-03-08 12:25:55');

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
(2, 2, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `t_id` int(11) NOT NULL,
  `t_customer_id` varchar(11) NOT NULL,
  `t_vechicle` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `t_driver` varchar(100) NOT NULL,
  `t_start_date` varchar(100) NOT NULL,
  `t_end_date` varchar(100) NOT NULL,
  `t_trip_fromlocation` varchar(100) NOT NULL,
  `t_trip_tolocation` varchar(100) NOT NULL,
  `t_trip_fromlat` varchar(100) DEFAULT NULL,
  `t_trip_fromlog` varchar(100) DEFAULT NULL,
  `t_trip_tolat` varchar(100) DEFAULT NULL,
  `t_trip_tolog` varchar(100) NOT NULL,
  `t_totaldistance` varchar(100) NOT NULL,
  `t_trip_amount` varchar(100) NOT NULL DEFAULT '0',
  `t_trip_status` varchar(50) NOT NULL DEFAULT 'yettostart',
  `t_trackingcode` varchar(100) DEFAULT NULL,
  `t_created_by` varchar(100) NOT NULL,
  `t_created_date` datetime NOT NULL,
  `t_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(5, 'TML-065', 'FAW', '2018', 'KBL84545', 'FDBFH112224', 'FAW', 'TRUCK', '#D6E1F3', '0', 1, 1, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2024-02-21_at_7_07_14_PM.jpeg', NULL, '1', '2024-03-08 12:57:24', '2024-03-08 11:58:38');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_payments`
--
ALTER TABLE `trip_payments`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
