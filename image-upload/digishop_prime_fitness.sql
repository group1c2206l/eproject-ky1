-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 25, 2023 lúc 11:58 AM
-- Phiên bản máy phục vụ: 10.3.37-MariaDB-cll-lve
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `digishop_prime_fitness`
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
  `person_trainer_id` int(11) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL,
  `price` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`course_id`, `name`, `person_trainer_id`, `description`, `start_day`, `end_day`, `price`, `flag`, `create_at`, `update_at`) VALUES
(1, 'Yoga', 3, 'Bạn muốn rèn luyện sức khỏe, bạn muốn có thân hình đẹp và bạn cần tìm những địa điểm tập Yoga tốt nhất tại Hà Nội.', '2023-03-01', '2023-03-12', 80, 1, '2023-02-16 16:11:37', NULL),
(2, 'MMA', 5, 'In recent years, MMA has become one of the most popular and in-demand sports in the world, especially because of its unique combination of many disciplines, including Boxing, Wrestling, BJJ v?Muay Thai, just to name a few. While each of these disciplines can be effective independently, MMA blends these forms and challenges your body and mind to reach a new level of competence.', '2023-03-01', '2023-04-01', 80, 1, '2023-02-25 01:41:43', NULL),
(3, 'Boxing', 5, 'Boxing is a martial art with high fighting nature and has simple basic techniques but it is extremely powerful. Saying Boxing is a simple martial art because this subject only includes 3 basic attacks when competing: straight punch, round punch and hook punch to use for both hands. The movements in the martial art of Boxing are extremely simple but the effect is huge.', '2023-03-01', '2023-04-01', 80, 1, '2023-02-25 01:45:34', NULL),
(4, 'Muay Thai', 6, 'Muay Thai martial arts is a traditional martial art with a long history and up to now, it has become a widely popular sport in Thailand. Muay Thai is a martial art that combines attacks with hands, feet, elbows and elbows, using the whole body and making the most of every part to knock down and attack the opponent player. ', '2023-04-01', '2023-05-01', 80, 1, '2023-02-25 01:47:10', NULL),
(5, 'CrossFit', 3, 'CrossFit can be understood simply as a form, a program of high-intensity interval training with exercises with diverse functional movements. More specifically, CrossFit is a combination of other health training subjects such as weightlifting, jumping, bodybuilding, gymnastics, etc.', '2023-03-01', '2023-04-01', 50, 1, '2023-02-25 01:48:42', NULL),
(6, 'Zumba', 3, 'Zumba is a dance sport with a combination of simple, easy-to-remember gymnastics movements and vibrant Latin music. This subject is suitable for many subjects, can dance alone or in groups to increase efficiency. When you start practicing zumba, you will learn from basic to advanced to best suit the health of your body.', '2023-04-01', '2023-05-01', 50, 1, '2023-02-25 03:04:30', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `width` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `device`
--

INSERT INTO `device` (`device_id`, `name`, `brand`, `width`, `length`, `height`, `weight`, `title`, `description`, `flag`, `create_at`, `update_at`) VALUES
(1, 'MÁY CHẠY BỘ MBH S9800-LED', 'MBH Fitness', 945, 2360, 1520, 90, 'MÁY CHẠY BỘ MBH S9800 – LỰA CHỌN TỐI ƯU CHO PHÒNG GYM', 'Máy chạy bộ MBH S9800 là dòng Cardio mà mọi chủ phòng Gym từ cao cấp đến bình dân đều muốn sở hữu. Tuy đã xuất hiện trên thị trường hơn 10 năm nhưng độ cứng cáp và tính năng đi trước thời đại, đáp ứng mọi nhu cầu khách hàng lẫn chủ phòng Gym đã tạo nên tính tin cậy cao, khiến cho từ khóa tìm kiếm “máy chạy bộ MBH S9800” chưa bao giờ hết hot đối với các nhà đầu từ có dự định mở phòng kinh doanh.', 1, '2023-02-15 16:39:19', NULL),
(2, 'Impulse FE9724', 'Impulse', 1261, 1266, 1491, 166, 'Chức năng và lợi ích của Máy tập vai Impulse FE9724', 'Với thiết bị thông minh máy tập cơ vai Impulse FE9724 giúp bạn không chỉ đơn thuần luyện tập vùng vai mà còn có thể tập được nhiều động tác bổ trợ cho cơ tay, cơ ngực. ', 1, '2023-02-24 18:39:41', NULL);

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
(1, 'Nguyen', 'Ba', 'Huong', '2023-02-02', 'số 9, ngách 11/37 phố Dịch Vọng, Cầu Giấy, hà Nội', '0375657745', '110126784411', 'phamnam1991@gmail.com', 'Tran Huong', '0800324588', 'M', 1, '2023-02-13 15:19:17', '2023-02-24 16:35:17'),
(2, 'Trần', 'Hùng', 'Minh', '2023-02-13', 'Hà Vân-Hà Trung-Thanh Hóa', '0375657765', '110126784453', 'nampv@aum.edu.vn', 'Tran Hao', '0800324534', 'M', 1, '2023-02-13 18:18:51', '2023-02-13 18:58:22'),
(3, 'Pham', '', 'Nam', '1992-06-17', 'Hai Phong', '0888889999', '110126789999', 'tan.duong@nkidgroup.com', 'Pham Minh', '0900324534', 'S', 1, '2023-02-15 18:09:27', '2023-02-24 16:35:05'),
(5, 'Tran', 'Thi', 'Huyen', '1995-03-12', 'Cao Bang', '0903234443', '1101267811111', 'huyencb@gmail.com', '', '', 'S', 1, '2023-02-16 15:59:15', '2023-02-24 16:34:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `galery_id` int(11) NOT NULL,
  `galery_type_name` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL,
  `dir` varchar(200) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galery`
--

INSERT INTO `galery` (`galery_id`, `galery_type_name`, `item_id`, `item_name`, `note`, `dir`, `img_name`, `flag`, `create_at`, `update_at`) VALUES
(10, 'device', 1, 'MÁY CHẠY BỘ MBH S9800-LED', '', 'C:/xampp/htdocs/dashboard/eproject-ky1/assets/image/device/', 'S-9800-LED-V1.jpg', 1, '2023-02-24 18:35:18', NULL),
(11, 'device', 2, 'Impulse FE9724', '', 'C:/xampp/htdocs/dashboard/eproject-ky1/assets/image/device/', 'impulse-FE9724-V1.jpg', 1, '2023-02-24 18:41:02', NULL),
(12, 'slide', 0, 'slide 0', 'Join us now to get the best deals', './assets/image/slide/', 'home-1.jpeg', 1, '2023-02-24 22:08:59', NULL),
(13, 'slide', 1, 'slide 1', 'Exercise not only gives you health, it also gives you the most confident appearance.', './assets/image/slide/', 'home-2.jpeg', 1, '2023-02-24 22:09:16', NULL),
(14, 'course', 1, 'Yoga', '', './assets/image/course/', 'yoga1.jpg', 1, '2023-02-25 01:53:15', NULL),
(15, 'course', 2, 'MMA', '', './assets/image/course/', 'mma.jpg', 1, '2023-02-25 01:53:37', NULL),
(16, 'course', 3, 'Boxing', '', './assets/image/course/', 'boxing1.jpg', 1, '2023-02-25 01:54:12', NULL),
(17, 'course', 4, 'Muay Thai', '', './assets/image/course/', 'muaythai.jpg', 1, '2023-02-25 01:54:30', NULL),
(18, 'course', 5, 'CrossFit', '', './assets/image/course/', 'Feature-classes-3.jpeg', 1, '2023-02-25 01:54:51', NULL),
(19, 'course', 6, 'Zumba', '', './assets/image/course/', 'zumba1.jpg', 1, '2023-02-25 03:17:44', NULL),
(20, 'person_trainer', 1, 'GARFIELD', '', './assets/image/PT/', 'trainer.jpeg', 1, '2023-02-25 04:39:53', NULL),
(21, 'person_trainer', 2, 'PARKER', '', './assets/image/PT/', 'trainer-1.png', 1, '2023-02-25 04:40:24', NULL),
(22, 'person_trainer', 3, 'SEYFRIED', '', './assets/image/PT/', 'trainer-2.jpeg', 1, '2023-02-25 04:40:36', NULL),
(23, 'person_trainer', 5, 'DAVIDSON', '', './assets/image/PT/', 'trainer-3.jpeg', 1, '2023-02-25 04:40:48', NULL),
(24, 'person_trainer', 6, 'TATUM', '', './assets/image/PT/', 'trainer-4.jpeg', 1, '2023-02-25 04:40:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery_option`
--

CREATE TABLE `galery_option` (
  `galery_option_id` int(11) NOT NULL,
  `galery_type_id` int(50) NOT NULL,
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
-- Cấu trúc bảng cho bảng `galery_type`
--

CREATE TABLE `galery_type` (
  `galery_type_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `galery_type`
--

INSERT INTO `galery_type` (`galery_type_id`, `name`, `flag`, `create_at`, `update_at`) VALUES
(1, 'slide', 1, '2023-02-17 12:03:10', NULL),
(2, 'device', 1, '2023-02-17 12:30:05', NULL),
(3, 'person_trainer', 1, '2023-02-17 12:34:24', '2023-02-24 17:45:14'),
(4, 'service', 1, '2023-02-22 19:11:18', '2023-02-22 22:11:25'),
(5, 'course', 1, '2023-02-23 21:30:57', NULL),
(6, 'package', 1, '2023-02-23 21:31:11', NULL),
(7, 'member', 1, '2023-02-23 21:31:33', NULL),
(8, 'background', 1, '2023-02-24 22:12:42', NULL),
(9, 'logo', 1, '2023-02-24 22:12:50', NULL),
(10, 'talk_about_me', 1, '2023-02-24 22:13:00', NULL);

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
  `day_active` int(11) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `package`
--

INSERT INTO `package` (`package_id`, `name`, `mentor`, `points`, `price`, `expiry`, `day_active`, `flag`, `create_at`, `update_at`) VALUES
(1, 'BASIC', 'YES', 1000, 50, 1, 3, 1, '2023-02-16 15:35:45', NULL),
(2, 'STANDARD', 'YES', 2000, 80, 1, 5, 1, '2023-02-16 15:37:00', NULL),
(3, 'PREMIUM', 'YES', 3000, 120, 1, 7, 1, '2023-02-16 15:37:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `person_trainer`
--

CREATE TABLE `person_trainer` (
  `person_trainer_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `dob` datetime NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `person_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trainer_job` varchar(100) DEFAULT NULL,
  `evaluate` varchar(500) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `person_trainer`
--

INSERT INTO `person_trainer` (`person_trainer_id`, `fname`, `mname`, `lname`, `code`, `dob`, `gender`, `address`, `phone_number`, `person_id`, `email`, `trainer_job`, `evaluate`, `flag`, `create_at`, `update_at`) VALUES
(1, 'ANDREW', '', 'GARFIELD', 'P1001', '1992-02-12 00:00:00', 'M', 'Paris', '0888889999', '1101267822222', 'GARFIELD@gmail.com', 'Fitness instructor', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:19:55', NULL),
(2, 'SARAH', 'JESSICA', 'PARKER', 'P1002', '1994-12-01 00:00:00', 'F', 'Man City', '0375657765', '1101267822223', 'PARKER@gmail.com', 'Swiming trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:22:46', NULL),
(3, 'AMANDA	', '', 'SEYFRIED', 'P1003', '1993-02-26 00:00:00', 'F', 'Man Utd', '0903234443', '1101267822224', 'SEYFRIED@hotmail.com', 'Fitness trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:24:48', NULL),
(5, 'PETE ', '', 'DAVIDSON', 'P1004', '1992-04-11 00:00:00', 'M', 'Arsenal', '0375657766', '1101267822225', 'DAVIDSON@gmail.com', 'Cycling Trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:27:40', NULL),
(6, 'CHANNING ', '', 'TATUM', 'P1005', '1996-05-13 00:00:00', 'M', 'PSG', '0375657768', '1101267822226', 'TATUM@gmail.com', 'Group Exercise Trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:29:15', NULL);

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
  `description` varchar(500) DEFAULT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`service_id`, `name`, `title`, `description`, `flag`, `create_at`, `update_at`) VALUES
(1, 'swiming', 'boi loi the thao', 'note', 1, '2023-02-15 10:28:54', NULL),
(2, 'Cycling', 'dap xe', 'cac mon the thao dap xe', 1, '0000-00-00 00:00:00', NULL),
(3, 'Group Exercise', 'thể dục nhóm', 'giảm cân nâng cao sức khỏe', 1, '0000-00-00 00:00:00', NULL),
(4, 'slide', NULL, NULL, 1, '2023-02-17 12:02:26', NULL);

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
-- Đang đổ dữ liệu cho bảng `utilities`
--

INSERT INTO `utilities` (`utilities_id`, `name`, `points`, `flag`, `create_at`, `update_at`) VALUES
(1, 'Massage', 30, 1, '2023-02-13 20:01:11', '2023-02-14 22:37:38'),
(2, 'SPA', 200, 1, '2023-02-14 13:59:17', NULL),
(3, 'Cocacola', 10, 1, '2023-02-14 22:33:47', NULL);

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
-- Chỉ mục cho bảng `galery_type`
--
ALTER TABLE `galery_type`
  ADD PRIMARY KEY (`galery_type_id`);

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
-- Chỉ mục cho bảng `person_trainer`
--
ALTER TABLE `person_trainer`
  ADD PRIMARY KEY (`person_trainer_id`),
  ADD UNIQUE KEY `person_id` (`person_id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `galery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `galery_option`
--
ALTER TABLE `galery_option`
  MODIFY `galery_option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galery_type`
--
ALTER TABLE `galery_type`
  MODIFY `galery_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `person_trainer`
--
ALTER TABLE `person_trainer`
  MODIFY `person_trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `service_device`
--
ALTER TABLE `service_device`
  MODIFY `service_device_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `utilities`
--
ALTER TABLE `utilities`
  MODIFY `utilities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
