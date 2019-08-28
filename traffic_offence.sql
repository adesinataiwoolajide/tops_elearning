-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 07:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traffic_offence`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 09:04:10'),
(2, 'Added jerry@gmail.com Details to the User List', 'jerry@gmail.com', '2019-08-16 09:12:39'),
(3, 'Changed User E-mail From jerry@gmail.com to jerry@gmail.com and Updated the password', 'jerry@gmail.com', '2019-08-16 09:13:38'),
(4, 'Changed User E-mail From jerry@gmail.com to jerry@gmail.com and Updated the password', 'jerry@gmail.com', '2019-08-16 09:13:50'),
(5, 'Added One Way to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:15:22'),
(6, 'Updated The Category Name From One Way to One Way', 'tolajide74@gmail.com', '2019-08-16 09:22:57'),
(7, 'Updated The Category Name From One Way to One Way', 'tolajide74@gmail.com', '2019-08-16 09:26:00'),
(8, 'Added Drinking to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:26:29'),
(9, 'Added No Licence to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:28:16'),
(10, 'Deleted No Licence From The Category List', 'tolajide74@gmail.com', '2019-08-16 09:28:56'),
(11, 'Added Consumables to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:29:28'),
(12, 'Updated The Category Name From Consumables to No Licence', 'tolajide74@gmail.com', '2019-08-16 09:29:42'),
(13, 'Updated The Category Name From Consumables to No Licence', 'tolajide74@gmail.com', '2019-08-16 09:30:31'),
(14, 'Added Raw MaterialS to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:32:58'),
(15, 'Updated The Category Name From Raw MaterialS to Raw MaterialS', 'tolajide74@gmail.com', '2019-08-16 09:33:11'),
(16, 'Updated The Category Name From Raw MaterialS to Raw Material', 'tolajide74@gmail.com', '2019-08-16 09:33:25'),
(17, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 09:36:26'),
(18, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 09:36:29'),
(19, 'Updated The Category Name From Raw MaterialS to Raw MaterialSrtg', 'tolajide74@gmail.com', '2019-08-16 09:36:46'),
(20, 'Updated The Category Name From Raw MaterialSrtg to No Break', 'tolajide74@gmail.com', '2019-08-16 09:37:06'),
(21, 'Updated The Category Name From Consumables to Over Speeding', 'tolajide74@gmail.com', '2019-08-16 09:38:13'),
(22, 'Updated The Category Name From Over Speeding to Over Speeding', 'tolajide74@gmail.com', '2019-08-16 09:38:27'),
(23, 'Deleted Drinking From The Category List', 'tolajide74@gmail.com', '2019-08-16 09:39:43'),
(24, 'Added Drinking to the Category List', 'tolajide74@gmail.com', '2019-08-16 09:39:54'),
(25, 'Added Offence for 0906860059', 'tolajide74@gmail.com', '2019-08-16 10:56:34'),
(26, 'Added Offence for 0906860059', 'tolajide74@gmail.com', '2019-08-16 10:56:43'),
(27, 'Deleted Offence For  Offence Details', 'tolajide74@gmail.com', '2019-08-16 11:01:40'),
(28, 'Deleted Offence For 0906860059 Offence Details', 'tolajide74@gmail.com', '2019-08-16 11:02:16'),
(29, 'Added Offence for 0903863733', 'tolajide74@gmail.com', '2019-08-16 11:03:00'),
(30, 'Added Offence for 09037353677', 'tolajide74@gmail.com', '2019-08-16 11:03:56'),
(31, 'Added Offence for 08134839333', 'tolajide74@gmail.com', '2019-08-16 12:14:06'),
(32, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 13:30:32'),
(33, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 13:35:12'),
(34, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 13:35:40'),
(35, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 13:38:10'),
(36, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 13:40:42'),
(37, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 13:41:06'),
(38, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 14:02:09'),
(39, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 14:02:12'),
(40, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 14:23:55'),
(41, 'Logged In', 'tolajide74@gmail.com', '2019-08-16 14:24:07'),
(42, 'Added ayomide@gmail.com Details to the User List', 'ayomide@gmail.com', '2019-08-16 14:25:18'),
(43, 'Logged Out', 'tolajide74@gmail.com', '2019-08-16 14:25:52'),
(44, 'Logged In', 'ayomide@gmail.com', '2019-08-16 14:26:00'),
(45, 'Added No Licence to the Category List', 'ayomide@gmail.com', '2019-08-16 14:26:40'),
(46, 'Added Offence for 080962487855352', 'ayomide@gmail.com', '2019-08-16 14:28:40'),
(47, 'Logged Out', 'ayomide@gmail.com', '2019-08-16 14:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(1) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `full_name`, `user_name`, `password`, `access_level`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2018-12-12 08:35:35'),
(2, 'Fola', 'fola@gmail.com', '7df6ceb3c5170913edf3d79f3faa1773a393f3a9', 1, '2019-04-05 14:22:33'),
(4, 'Doyinsola', 'doyin@gmail.com', 'b8d0c9eb95d02827d16a30de923577ef51d4d978', 1, '2019-04-05 14:21:46'),
(5, 'Adesina Taiwo Olajide', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2019-04-05 14:23:19'),
(6, 'Akinboro Doyinsola', 'doyinsolajesuseun19@gmail.com', '1691833278c6c945813d23f5d01a713599c5b702', 1, '2019-04-17 23:29:04'),
(7, 'Jerry Marlians', 'jerry@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2019-08-16 09:13:50'),
(8, 'ayomide', 'ayomide@gmail.com', 'd43f5694ba0cc8d883dd60bc0ec659d9ed68a93f', 1, '2019-08-16 14:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `offences`
--

CREATE TABLE `offences` (
  `offence_id` int(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `offender_name` text NOT NULL,
  `offender_phone` varchar(255) NOT NULL,
  `plate_number` text NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `state` varchar(50) NOT NULL,
  `local_govt` text NOT NULL,
  `address` text NOT NULL,
  `payment_status` int(1) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offences`
--

INSERT INTO `offences` (`offence_id`, `category_id`, `offender_name`, `offender_phone`, `plate_number`, `vehicle_type`, `state`, `local_govt`, `address`, `payment_status`, `time_added`) VALUES
(3, '6,1', 'Adeosun kola', '0903863733', 'SS 234 RGB', 'Lorry', 'Enugu', 'Udenu', 'Home Estate Enugu', 0, '2019-08-16 11:02:59'),
(4, '5', 'Folasope Joke', '09037353677', 'FF 349 KLF', 'Truck', 'Adamawa', 'Mayo-Belwa', 'Abia Housing Estate', 0, '2019-08-16 11:03:56'),
(5, '6,1,4', 'Charles Adeniji', '08134839333', 'DS 305 DDD', 'Car', 'Bayelsa', 'Sagbama', 'Jokrejikglsjr n shifjk', 1, '2019-08-16 13:57:22'),
(6, '6,7', 'ayomide', '080962487855352', 'BDE86522WE', 'Lorry', 'Imo', 'Oru West', '12, sefgewifh, ijanikin lagos.', 0, '2019-08-16 14:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `offence_category`
--

CREATE TABLE `offence_category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `price` varchar(12) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offence_category`
--

INSERT INTO `offence_category` (`category_id`, `category_name`, `price`, `time_added`) VALUES
(1, 'One Way', '1000', '2019-08-16 09:27:04'),
(4, 'Over Speeding', '10000', '2019-08-16 09:38:27'),
(5, 'No Break', '50000', '2019-08-16 09:37:06'),
(6, 'Drinking', '3900', '2019-08-16 09:39:54'),
(7, 'No Licence', '5000', '2019-08-16 14:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(255) NOT NULL,
  `offence_id` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `paystack_refrence` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `offence_id`, `total_amount`, `transaction_id`, `paystack_refrence`, `status`, `time_added`) VALUES
(2, 5, 14900, 'A74A2F86C1430F97', '4476f3d43f24257b8e75', 0, '2019-08-16 13:30:20'),
(3, 3, 4900, 'F9AB91C664F766FC', 'f1a18fa3dd5357ed5b69', 0, '2019-08-16 13:35:27'),
(4, 5, 14900, 'C4BD78E91851E271', 'e2bbaacb260426a8715a', 1, '2019-08-16 13:57:05'),
(5, 3, 4900, '06091F9767F7C817', 'df0ec54f3b60a3138fdb', 0, '2019-08-16 14:01:56'),
(6, 6, 8900, '92B767E01CF256E1', '6aabacc992d3cd70d1ca', 0, '2019-08-16 14:29:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `offences`
--
ALTER TABLE `offences`
  ADD PRIMARY KEY (`offence_id`);

--
-- Indexes for table `offence_category`
--
ALTER TABLE `offence_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offences`
--
ALTER TABLE `offences`
  MODIFY `offence_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offence_category`
--
ALTER TABLE `offence_category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
