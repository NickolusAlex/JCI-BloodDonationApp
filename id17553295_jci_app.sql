-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2021 at 10:32 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17553295_jci_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_type`
--

CREATE TABLE `blood_type` (
  `blood_id` int(11) NOT NULL,
  `blood_name_short` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `blood_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_type`
--

INSERT INTO `blood_type` (`blood_id`, `blood_name_short`, `blood_name`) VALUES
(1, 'b_p', 'B +ve'),
(2, 'b_n', 'B -ve'),
(3, 'o_p', 'O +ve'),
(4, 'o_n', 'O -ve'),
(5, 'a_p', 'A +ve'),
(6, 'a_n', 'A -ve'),
(7, 'ab_p', 'AB +ve'),
(8, 'ab_n', 'AB -ve');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `district_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `state_id`) VALUES
(1, 'Ariyalur', '31'),
(2, 'Chennai', '31'),
(3, 'Coimbatore', '31'),
(4, 'Cuddalore', '31'),
(5, 'Dharmapuri', '31'),
(6, 'Dindigul', '31'),
(7, 'Erode', '31'),
(8, 'Kanchipuram', '31'),
(9, 'Kanyakumari', '31'),
(10, 'Karur', '31'),
(11, 'Krishnagiri', '31'),
(12, 'Madurai', '31'),
(13, 'Nagapattinam', '31'),
(14, 'Namakkal', '31'),
(15, 'Nilgiris', '31'),
(16, 'Perambalur', '31'),
(17, 'Pudukkottai', '31'),
(18, 'Ramanathapuram', '31'),
(19, 'Salem', '31'),
(20, 'Sivaganga', '31'),
(21, 'Thanjavur', '31'),
(22, 'Theni', '31'),
(23, 'Thoothukudi (Tuticorin)', '31'),
(24, 'Tiruchirappalli', '31'),
(25, 'Tirunelveli', '31'),
(26, 'Tiruppur', '31'),
(27, 'Tiruvallur', '31'),
(28, 'Tiruvannamalai', '31'),
(29, 'Tiruvarur', '31'),
(30, 'Vellore', '31'),
(31, 'Viluppuram', '31'),
(32, 'Virudhunagar', '31'),
(33, 'Others', '00');

-- --------------------------------------------------------

--
-- Table structure for table `request_table`
--

CREATE TABLE `request_table` (
  `request_id` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL,
  `random_sc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_blood_type` int(11) NOT NULL,
  `p_reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_hospital` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `blood_units` int(11) NOT NULL,
  `contact_person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `request_status` int(11) NOT NULL,
  `got_blood_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request_table`
--

INSERT INTO `request_table` (`request_id`, `requested_by`, `random_sc`, `p_name`, `p_blood_type`, `p_reason`, `p_hospital`, `blood_units`, `contact_person`, `contact_number`, `place`, `district`, `created_date`, `request_status`, `got_blood_date`) VALUES
(1, 6, '6584122619603', 'Aswin', 3, 'Accident', 'Tn', 1, 'Barath', '8888888888', 'Erode', 'Erode', '2021-09-27 12:27:09', 0, '2021-09-27 12:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `user_creation`
--

CREATE TABLE `user_creation` (
  `user_id` int(20) NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 0,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `last_donated` date NOT NULL,
  `profile_file` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `random_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cordova` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `model` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `uuid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `area` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pincode` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blood_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `offten_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `active_status` int(11) NOT NULL,
  `logged_in_status` int(11) NOT NULL,
  `last_used_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_creation`
--

INSERT INTO `user_creation` (`user_id`, `availability`, `name`, `phone_number`, `user_email`, `date`, `last_donated`, `profile_file`, `random_no`, `password`, `cordova`, `model`, `platform`, `uuid`, `version`, `address`, `area`, `district`, `state`, `pincode`, `blood_type`, `offten_time`, `active_status`, `logged_in_status`, `last_used_ip`, `created_date`) VALUES
(1, 1, 'Vinoth sivakumar', '7373166868', 'vinothdezins@gmail.com', '1995-10-20', '2020-09-19', '', '3484163029423', 'vinothdezins', '9.1.0', 'SM-A750F', 'Android', 'de8fdcb6b0d0f392', '9', '17/4, Gandhi nagar colony', 'Near KMCH', 'Erode', 'TAMIL NADU', '638009', '3', '3', 1, 1, '42.106.186.21', '2021-09-14 16:34:37'),
(2, 1, 'nick', '1111111111', 'asd@fa.c', '2021-01-01', '2021-09-14', '', '4936130246947', '1111', '6.0.0', 'Chrome', 'browser', 'null', '93.0.4577.63', 'laskjdf', 'lsdfj', 'Coimbatore', 'ASSAM', '132323', '1', '6', 1, 1, '103.99.150.170', '2021-09-14 13:03:23'),
(3, 1, 'SAMY', '8072284454', 'samynathan2612@gmail.com', '1998-09-26', '2021-09-15', '', '5405003758741', '2612', '9.1.0', 'M2101K7AI', 'Android', '6012fe39a4600994', '11', '10, Chokkalingam street', 'Chokkalingam street', 'Erode', 'TAMIL NADU', '638001', '3', '6', 1, 1, '2409:4072:907:cb71:b8f:bbd0:6ebd:bb20', '2021-09-24 07:13:29'),
(4, 1, 'Krishnamoorthi', '9361900900', 'kjkumar.2709@gmail.com', '1980-09-27', '2021-09-18', '', '7152125039784', '7639253036', '9.1.0', 'SM-A217F', 'Android', 'e2c5f42a3ddbef0c', '11', 'Pallipalayam', 'Kaveri rs', 'Namakkal', 'TAMIL NADU', '638007', '5', '6', 1, 1, '2401:4900:3388:ed7:1:0:d266:173', '2021-09-18 12:51:38'),
(5, 1, 'Gowthaman M', '9384700915', 'mgowthaman08@gmail.com', '1992-01-30', '2021-09-18', '', '6361125505600', 'Lithu@123', '9.1.0', 'CPH2263', 'Android', 'f6bfc30538e2e581', '11', '100 4th Street, Rajagoundampalayam', 'Tiruchengode', 'Namakkal', 'TAMIL NADU', '637209', '3', '3', 1, 1, '2409:4072:184:a4ea:2458:a3ff:fec2:2afa', '2021-09-18 12:59:03'),
(6, 1, 'Barath', '6379763482', 'barathtamil1998@gmail.com', '2021-09-16', '2021-09-27', '', '2343122423879', 'Bar@1998', '9.1.0', 'vivo 1723', 'Android', '4030989cca0676ea', '9', 'Hhhhhh', '', 'Krishnagiri', 'CHATTISGARH', '', '1', '5', 1, 0, '157.49.133.209', '2021-09-27 12:28:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_type`
--
ALTER TABLE `blood_type`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_table`
--
ALTER TABLE `request_table`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_creation`
--
ALTER TABLE `user_creation`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_type`
--
ALTER TABLE `blood_type`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `request_table`
--
ALTER TABLE `request_table`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_creation`
--
ALTER TABLE `user_creation`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
