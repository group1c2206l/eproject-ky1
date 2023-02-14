-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 13, 2023 lúc 11:10 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `prime_fitness`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `hotline` varchar(15) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`branch_id`, `name`, `address`, `hotline`, `flag`, `create_at`, `update_at`) VALUES
(1, 'Prime Fitness Club ', 'Ha Noi City', '19008088', 1, '2023-02-12 00:10:33', '2023-02-12 07:19:24'),
(2, 'Prime Fitness Club ', 'HCM CITY', '19008089', 1, '2023-02-12 01:21:44', '2023-02-12 07:20:46'),
(3, 'Prime Fitness Club ', '', '', 1, '2023-02-13 13:20:40', NULL),
(4, 'Prime Fitness Club', 'DN', '19008000', 1, '2023-02-13 13:33:51', NULL),
(5, 'PHONE', 'Hà Vân-Hà Trung-Thanh Hóa', '19008088', 0, '2023-02-13 14:02:09', '2023-02-13 14:02:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `rescription` varchar(500) NOT NULL,
  `start_day` datetime NOT NULL,
  `end_day` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `band` varchar(50) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `rescription` varchar(500) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `person_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`employee_id`, `fname`, `mname`, `lname`, `dob`, `address`, `phone_number`, `person_id`, `email`, `contact_name`, `contact_phone`, `type`, `flag`, `create_at`, `update_at`) VALUES
(1, 'Trần', 'Hùng', 'Minh', '2023-02-13', 'Hà Vân-Hà Trung-Thanh Hóa', '0375657765', '110126784453', 'nampv@aum.edu.vn', 'Tran Hao', '0800324534', 'M', 1, '2023-02-13 15:19:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `galery_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `galery_option_id` int(11) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery_option`
--

CREATE TABLE `galery_option` (
  `galery_option_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `card_id` varchar(20) NOT NULL,
  `password_hash` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` datetime NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vip` int(11) DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mentor` varchar(10) NOT NULL DEFAULT 'YES',
  `points` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `expiry` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `user_name`, `password_hash`, `employee_id`, `flag`, `create_at`, `update_at`) VALUES
(1, 'c1001', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', NULL, 1, '2023-02-11 12:41:16', '2023-02-11 19:19:53'),
(3, 'c1002', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', NULL, 1, '2023-02-12 01:58:33', NULL),
(4, 'c1003', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', NULL, 1, '2023-02-12 01:58:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `rescription` varchar(500) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_device`
--

CREATE TABLE `service_device` (
  `service_device_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `utilities`
--

CREATE TABLE `utilities` (
  `utilities_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Chỉ mục cho bảng `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `person_id` (`person_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`galery_id`);

--
-- Chỉ mục cho bảng `galery_option`
--
ALTER TABLE `galery_option`
  ADD PRIMARY KEY (`galery_option_id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `card_id` (`card_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `username` (`user_name`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Chỉ mục cho bảng `service_device`
--
ALTER TABLE `service_device`
  ADD PRIMARY KEY (`service_device_id`);

--
-- Chỉ mục cho bảng `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`utilities_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `galery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galery_option`
--
ALTER TABLE `galery_option`
  MODIFY `galery_option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `service_device`
--
ALTER TABLE `service_device`
  MODIFY `service_device_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `utilities`
--
ALTER TABLE `utilities`
  MODIFY `utilities_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
