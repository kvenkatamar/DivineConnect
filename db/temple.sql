-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 06:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temple`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `fname`, `lname`, `email`, `password`, `delete_status`) VALUES
(1, 1, 'Saurabh ', 'Patil', 'saurabh@gmail.com', '76407594d06098f8449f65c2aa2b31d9e42dc3d6baf78bef18ca46e2fc849c61', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(20) NOT NULL,
  `cid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `csubject` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `document` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `cid`, `name`, `email`, `csubject`, `date`, `mobileno`, `document`, `status`, `delete_status`) VALUES
(1, 'CID- 1', 'Gauri Tajane', 'gauri@gmail.com', 'Not clining', '2022-09-20', '7854332243', 'img1.jpg', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name1` varchar(20) NOT NULL,
  `email1` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `msg` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `devotees`
--

CREATE TABLE `devotees` (
  `id` int(10) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(150) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state2` varchar(30) NOT NULL,
  `district1` varchar(30) NOT NULL,
  `taluka` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devotees`
--

INSERT INTO `devotees` (`id`, `dname`, `date`, `phone`, `religion`, `country`, `state2`, `district1`, `taluka`, `status`, `delete_status`) VALUES
(1, 'Yashodhan Joshi', '2022-09-20', '9090909090', 'Hinduism', 'India', '1', '1', '1', 'active', 0),
(2, 'Gauri Tajane', '2022-09-20', '4040404040', 'Buddhism', 'India', '1', '1', '1', 'active', 0),
(4, 'Saurabh Jain', '2022-09-20', '6060606060', 'Hinduism', 'India', '1', '1', '1', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(10) NOT NULL,
  `state1` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `state1`, `district`, `delete_status`) VALUES
(1, '1', 'Nashik', 0),
(2, '1', 'Nashik', 0),
(3, '2', 'Ontario', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `etransaction` varchar(20) NOT NULL,
  `totalexpenses` int(50) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `ename`, `date`, `etransaction`, `totalexpenses`, `delete_status`) VALUES
(1, 'Coconut', '2022-09-20', 'cash', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `festive`
--

CREATE TABLE `festive` (
  `id` int(10) NOT NULL,
  `festival` varchar(50) NOT NULL,
  `date1` date NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `festive`
--

INSERT INTO `festive` (`id`, `festival`, `date1`, `delete_status`) VALUES
(1, 'Diwali', '2022-09-22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `delete_status`) VALUES
(1, 'Assistant', 'Add module of seva', 0),
(2, 'Administrator', 'Add Income Module', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(10) NOT NULL,
  `eid` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `dname` varchar(20) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `raddress` varchar(150) NOT NULL,
  `transaction` varchar(20) NOT NULL,
  `donation` varchar(20) NOT NULL,
  `sevaname` varchar(20) NOT NULL,
  `totalamount` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `eid`, `date`, `dname`, `mobile_no`, `raddress`, `transaction`, `donation`, `sevaname`, `totalamount`, `delete_status`) VALUES
(1, 'Rno- 2', '2022-09-20', '1', '9090909090', 'Galaxy Apartment Ashoka Marg Nashik', 'phonpay', '1', '1', '300', 0),
(2, 'Rno- 2', '2022-09-20', '2', '4040404040', 'shirdi', 'googlepay', 'Annual Pooja Income', '1', '300', 0),
(3, 'Rno- 3', '2022-09-22', '4', '6060606060', 'Nagpur', 'phonpay', '1', '1', '300', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manageincome`
--

CREATE TABLE `manageincome` (
  `id` int(10) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manageincome`
--

INSERT INTO `manageincome` (`id`, `iname`, `delete_status`) VALUES
(1, 'Pooja Income', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pass1`
--

CREATE TABLE `pass1` (
  `id` int(10) NOT NULL,
  `sevaname` varchar(20) NOT NULL,
  `cseva` varchar(10) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `tperson` varchar(20) NOT NULL,
  `totalamount` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `agee` varchar(20) NOT NULL,
  `genderr` varchar(20) NOT NULL,
  `ptypee` varchar(10) NOT NULL,
  `pnoo` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass1`
--

INSERT INTO `pass1` (`id`, `sevaname`, `cseva`, `mobile_no`, `dname`, `tperson`, `totalamount`, `date`, `agee`, `genderr`, `ptypee`, `pnoo`, `payment`, `delete_status`) VALUES
(1, '1', '300', '9090909090', 'Yashodhan Joshi', '3', '900', '2022-09-20', '25', 'male', 'Adharcard', '45676545', 'pay_KK2vqdI2xFU7bR', 0),
(2, '2', '400', '9090909090', 'Yashodhan Joshi', '3', '1200', '2022-09-20', '23', 'male', 'Driving li', '453454', 'pay_KK5UoEtSzyjvqJ', 0),
(3, '1', '300', '9850263304', '', '2', '600', '2022-10-13', '45', 'female', 'Adharcard', '5656', 'pay_KTDeHNc128OuY1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pass2`
--

CREATE TABLE `pass2` (
  `id` int(10) NOT NULL,
  `name1` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `pno` varchar(20) NOT NULL,
  `l_id` int(10) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass2`
--

INSERT INTO `pass2` (`id`, `name1`, `age`, `gender`, `ptype`, `pno`, `l_id`, `delete_status`) VALUES
(1, 'Gauri Tajane', '22', 'female', 'Adharcard', '675433432', 1, 0),
(2, 'Saurabh Patil', '26', 'male', 'drivinglicense', '456633', 1, 0),
(4, 'Saurabh Patil', '26', 'male', 'Adharcard', '564554', 2, 0),
(5, 'Gauri Joshi', '22', 'female', 'adharcard', '675443', 2, 0),
(7, 'avc', '21', 'female', 'Adharcard', '343424', 3, 0),
(8, 'vidya', '23', 'female', 'pancard', '356', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `display_name` varchar(20) NOT NULL,
  `operation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `operation`) VALUES
(1, 'devotees', 'devotees', 'devotees'),
(2, 'seva', 'seva', 'seva'),
(3, 'income', 'income', 'income'),
(4, 'manageincome', 'manageincome', 'manageincome'),
(5, 'schedule', 'schedule', 'schedule'),
(6, 'expenses', 'expenses', 'expenses'),
(7, 'staff', 'staff', 'staff'),
(8, 'salary', 'salary', 'salary'),
(9, 'calender', 'calender', 'calender'),
(10, 'details', 'details', 'details'),
(11, 'reports', 'reports', 'reports'),
(12, 'add_devotees', 'add_devotees', 'add_devotees'),
(13, 'edit_devotees', 'edit_devotees', 'edit_devotees'),
(14, 'delete_devotees', 'delete_devotees', 'delete_devotees'),
(15, 'manage_devotees', 'manage_devotees', 'manage_devotees'),
(16, 'add_seva', 'add_seva', 'add_seva'),
(17, 'edit_seva', 'edit_seva', 'edit_seva'),
(18, 'delete_seva', 'delete_seva', 'delete_seva'),
(19, 'manage_seva', 'manage_seva', 'manage_seva'),
(20, 'add_income', 'add_income', 'add_income'),
(21, 'edit_income', 'edit_income', 'edit_income'),
(22, 'delete_income', 'delete_income', 'delete_income'),
(23, 'manage_income', 'manage_income', 'manage_income'),
(24, 'add_schedule', 'add_schedule', 'add_schedule'),
(25, 'edit_schedule', 'edit_schedule', 'edit_schedule'),
(26, 'delete_schedule', 'delete_schedule', 'delete_schedule'),
(27, 'manage_schedule', 'manage_schedule', 'manage_schedule'),
(28, 'add_mangincome', 'add_mangincome', 'add_mangincome'),
(29, 'edit_mangincome', 'edit_mangincome', 'edit_mangincome'),
(30, 'delete_mangincome', 'delete_mangincome', 'delete_mangincome'),
(31, 'manage_manageincome', 'manage_mangincome', 'manage_mangincome'),
(32, 'add_expense', 'add_expense', 'add_expense'),
(33, 'edit_expense', 'edit_expense', 'edit_expense'),
(34, 'delete_expense', 'delete_expense', 'delete_expense'),
(35, 'manage_expense', 'manage_expense', 'manage_expense'),
(36, 'add_staff', 'add_staff', 'add_staff'),
(37, 'edit_staff', 'edit_staff', 'edit_staff'),
(38, 'delete_staff', 'delete_staff', 'delete_staff'),
(39, 'manage_staff', 'manage_staff', 'manage_staff'),
(40, 'add_salary', 'add_salary', 'add_salary'),
(41, 'edit_salary', 'edit_salary', 'edit_salary'),
(42, 'delete_salary', 'delete_salary', 'delete_salary'),
(43, 'manage_salary', 'manage_salary', 'manage_salary'),
(44, 'add_calender_event', 'add_calender_event', 'add_calender_event'),
(45, 'edit_calender_event', 'edit_calender_event', 'edit_calender_event'),
(46, 'delete_calender_even', 'delete_calender_even', 'delete_calender_even'),
(47, 'add_details', 'add_details', 'add_details'),
(48, 'edit_details', 'edit_details', 'edit_details'),
(49, 'delete_details', 'delete_details', 'delete_details'),
(50, 'manage_details', 'manage_details', 'manage_details'),
(51, 'view_reports', 'view_reports', 'view_reports'),
(52, 'schedule', 'schedule', 'schedule'),
(53, 'mng_master', 'mng_master', 'mng_master'),
(54, 'webappearance', 'webappearance', 'webappearance'),
(55, 'devotees_reports', 'devotees_reports', 'devotees_reports'),
(56, 'income_reports', 'income_reports', 'income_reports'),
(57, 'expense_reports', 'expense_reports', 'expense_reports'),
(58, 'profit_reports', 'profit_reports', 'profit_reports'),
(59, 'complaints', 'complaints', 'complaints'),
(60, 'mng_complaints', 'mng_complaints', 'mng_complaints'),
(61, 'dashboard', 'dashboard', 'dashboard'),
(62, 'usermngmnt', 'usermngmnt', 'usermngmnt'),
(63, 'viewuser', 'viewuser', 'viewuser'),
(64, 'viewrole', 'viewrole', 'viewrole'),
(65, 'festive', 'festive', 'festive'),
(66, 'states', 'states', 'states'),
(67, 'district', 'district', 'district'),
(68, 'taluka', 'taluka', 'taluka'),
(69, 'pass', 'pass', 'pass'),
(70, 'passmng', 'passmng', 'passmng');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(50) NOT NULL,
  `permission_id` int(50) NOT NULL,
  `group_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `group_id`) VALUES
(1, 2, 1),
(2, 16, 1),
(3, 19, 1),
(4, 3, 2),
(5, 20, 2),
(6, 23, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) NOT NULL,
  `msalary` varchar(20) NOT NULL,
  `staffname` varchar(20) NOT NULL,
  `days` varchar(20) NOT NULL,
  `bsalary` varchar(20) NOT NULL,
  `tsalary` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `msalary`, `staffname`, `days`, `bsalary`, `tsalary`, `status`, `delete_status`) VALUES
(1, '2022-09', 'Gauri Tajane', '23', '500', '11500', '', 0),
(2, '2022-07', 'Manisha Pawar', '', '', '9200', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `sevaname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `dname`, `sevaname`, `date`, `delete_status`) VALUES
(1, 'Yashodhan Joshi', 'Kalyanam', '2022-11-11', 0),
(2, 'Gauri Tajane', 'Prasadam', '2022-09-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seva`
--

CREATE TABLE `seva` (
  `id` int(10) NOT NULL,
  `sevaname` varchar(20) NOT NULL,
  `chargeofseva` varchar(20) NOT NULL,
  `nperson` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seva`
--

INSERT INTO `seva` (`id`, `sevaname`, `chargeofseva`, `nperson`, `amount`, `delete_status`) VALUES
(1, 'Kalyanam', '300', '1', '', 0),
(2, 'Prasadam', '400', '2', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(20) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `cpassword` varchar(150) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `delete-status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `cpassword`, `mobileno`, `delete-status`) VALUES
(1, 'Mayuri K', 'mayuri.infospace@gmail.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', '9523230459', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `eid` varchar(150) NOT NULL,
  `staffname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adhar` varchar(20) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `eid`, `staffname`, `phone`, `adhar`, `bdate`, `address`, `gender`, `delete_status`) VALUES
(1, 'EID- 2', 'Gauri Tajane', '8080808080', '45678833', '2022-06-24', 'Shriram Colony CIDCO Nashik', 'female', 0),
(2, 'EID- 2', 'Manisha Pawar', '3030303030', '564565654', '2022-07-14', 'Shriram Colony CIDCO Nashik', 'female', 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `delete_status`) VALUES
(1, 'Maharashtra', 0),
(2, 'Gujrat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taluka`
--

CREATE TABLE `taluka` (
  `id` int(10) NOT NULL,
  `state2` varchar(20) NOT NULL,
  `district1` varchar(20) NOT NULL,
  `taluka` varchar(20) NOT NULL,
  `delete_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taluka`
--

INSERT INTO `taluka` (`id`, `state2`, `district1`, `taluka`, `delete_status`) VALUES
(1, '1', '1', 'Niphad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `website_name` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `welcome_note` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `smtp_server` varchar(255) NOT NULL,
  `smtp_username` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL,
  `stmp_port` varchar(255) NOT NULL,
  `smtp_type` varchar(255) NOT NULL,
  `keywords` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`website_name`, `slogan`, `welcome_note`, `email_address`, `phone`, `address`, `facebook`, `twitter`, `instagram`, `paypal_id`, `smtp_server`, `smtp_username`, `smtp_password`, `stmp_port`, `smtp_type`, `keywords`) VALUES
('SGPME', 'Website Slogan', 'Welcome Note (Something Short And Leading About The Products)', 'ndbhalerao91@gmail.com', '0689 938 643', 'MH, India', 'https://web.facebook.com/#', 'https://twitter/#', 'https://instagram.com/#', 'sddas', 'mail.raghavinfocom.com', 'no_reply@raghavinfocom.com', 'zo?n6BDVGtdo', '587', 'tls', 'sadad');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `fnote` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `address` varchar(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `delete_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `title`, `fnote`, `logo`, `email`, `email2`, `phone`, `phone2`, `address`, `cname`, `year`, `delete_status`) VALUES
(1, 'Temple Management System ', 'Temple Management System ', 'favicon.jpg', 'Trambkeshwar@gmail.com', 'Trambkeshwar1@gmail.com', '9090909090', '7070707070', 'Trimbakeshwar Jyotirling Mandi', 'Trambkeshwar', '2022', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devotees`
--
ALTER TABLE `devotees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festive`
--
ALTER TABLE `festive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manageincome`
--
ALTER TABLE `manageincome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass1`
--
ALTER TABLE `pass1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass2`
--
ALTER TABLE `pass2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seva`
--
ALTER TABLE `seva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taluka`
--
ALTER TABLE `taluka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`website_name`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devotees`
--
ALTER TABLE `devotees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `festive`
--
ALTER TABLE `festive`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manageincome`
--
ALTER TABLE `manageincome`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pass1`
--
ALTER TABLE `pass1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pass2`
--
ALTER TABLE `pass2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seva`
--
ALTER TABLE `seva`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taluka`
--
ALTER TABLE `taluka`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
