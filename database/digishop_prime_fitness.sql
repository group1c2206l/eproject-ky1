-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 17, 2023 lúc 11:49 PM
-- Phiên bản máy phục vụ: 10.3.38-MariaDB-cll-lve
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
  `email` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`branch_id`, `name`, `address`, `hotline`, `email`, `flag`, `create_at`, `update_at`) VALUES
(1, 'Prime Fitness Club ', 'New York', '19008088', 'newyork.prime-fitness@gmail.com', 1, '2023-02-12 00:10:33', '2023-02-12 07:19:24'),
(2, 'Prime Fitness Club ', 'HCM CITY', '19008089', '', 0, '2023-02-12 01:21:44', '2023-03-10 17:45:35'),
(4, 'Prime Fitness Club', 'DN', '19008000', '', 0, '2023-02-13 13:33:51', '2023-03-10 17:45:32');

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
(1, 'Yoga', 1, 'Yoga includes exercises that help improve the physical, mental, emotional and spiritual well-being of the practitioner. This is an interesting option for beginners as well as those who exercise regularly.', '2023-03-01', '2023-03-12', 80, 1, '2023-02-16 16:11:37', '2023-03-02 13:40:02'),
(2, 'MMA', 5, 'In recent years, MMA has become one of the most popular and in-demand sports in the world, especially because of its unique combination of many disciplines, including Boxing, Wrestling, BJJ v?Muay Thai, just to name a few. While each of these disciplines can be effective independently, MMA blends these forms and challenges your body and mind to reach a new level of competence.', '2023-03-01', '2023-04-01', 80, 1, '2023-02-25 01:41:43', NULL),
(3, 'Boxing', 5, 'Boxing is a martial art with high fighting nature and has simple basic techniques but it is extremely powerful. Saying Boxing is a simple martial art because this subject only includes 3 basic attacks when competing: straight punch, round punch and hook punch to use for both hands. The movements in the martial art of Boxing are extremely simple but the effect is huge.', '2023-03-01', '2023-04-01', 80, 1, '2023-02-25 01:45:34', NULL),
(4, 'Muay Thai', 6, 'Muay Thai martial arts is a traditional martial art with a long history and up to now, it has become a widely popular sport in Thailand. Muay Thai is a martial art that combines attacks with hands, feet, elbows and elbows, using the whole body and making the most of every part to knock down and attack the opponent player. ', '2023-04-01', '2023-05-01', 80, 1, '2023-02-25 01:47:10', NULL),
(5, 'CrossFit', 3, 'CrossFit can be understood simply as a form, a program of high-intensity interval training with exercises with diverse functional movements. More specifically, CrossFit is a combination of other health training subjects such as weightlifting, jumping, bodybuilding, gymnastics, etc.', '2023-03-01', '2023-04-01', 50, 1, '2023-02-25 01:48:42', NULL),
(6, 'Zumba', 3, 'Zumba is a dance sport with a combination of simple, easy-to-remember gymnastics movements and vibrant Latin music. This subject is suitable for many subjects, can dance alone or in groups to increase efficiency. When you start practicing zumba, you will learn from basic to advanced to best suit the health of your body.', '2023-04-01', '2023-05-01', 50, 1, '2023-02-25 03:04:30', NULL),
(7, 'DANCE', 2, 'Unlike a traditional dance class; where you learn specific steps or choreography. Dance Fitness is all about getting you sweaty and having fun while moving your body.', '2023-04-01', '2023-04-30', 50, 1, '2023-03-04 10:29:22', NULL),
(8, 'NO', 1, 'NO', '2023-03-07', '2023-03-07', 0, 0, '2023-03-07 23:27:32', '2023-03-17 20:43:03'),
(9, 'karatedo', 6, 'hg\'ạhakh\r\nfhfhflga\r\nlhkk\r\nhla', '2022-03-13', '2024-04-13', 9000, 1, '2023-03-17 20:45:26', NULL),
(10, 'test', 6, 'test course', '2023-03-01', '2023-03-04', 50, 1, '2023-03-17 21:39:46', NULL);

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
(1, 'MBH S9800-LED Treadmill ', 'MBH Fitness', 945, 2360, 1520, 90, 'MBH S9800 Treadmill  – OPTIMIZED CHOICE FOR GYM ROOM', 'The MBH S9800 treadmill is a Cardio line that every gym owner from high-end to affordable wants to own. Although it has been on the market for more than 10 years, its rigidity and features are ahead of its time, meeting all the needs of customers and gym owners, creating high reliability, making the search keyword \"running machine\". MBH S9800” has never ceased to be hot for investors who plan to open a sales department.', 1, '2023-02-15 16:39:19', '2023-03-06 18:41:58'),
(2, 'Impulse FE9724', 'Impulse', 1261, 1266, 1491, 166, 'Functions and benefits of the Impulse FE9724  shoulder machine', 'With the smart device, the Impulse FE9724 shoulder exercise machine helps you not only practice the shoulder area but also practice many complementary movements for the arm and chest muscles.', 1, '2023-02-24 18:39:41', '2023-03-06 18:38:53'),
(3, 'ELIP IRON 10', 'ELIP', 1261, 2360, 1520, 166, 'Olympic-sized design', 'The Ellip Iron 10 multi-function weight training machine is a multi-functional multi-function training rig that helps train and improve fitness very effectively, as a beginner or professional gymer, the Iron 10 multi-function weightlifter is an impossible choice. lack', 1, '2023-03-06 18:26:22', NULL),
(4, 'ELIP AMAZON Treadmill', 'AMAZON', 0, 0, 0, 0, 'NEW GENERATION - Conquer UNLIMITED PASSIONS', '', 1, '2023-03-06 18:45:38', NULL),
(5, 'ELIP ALEXANDER - BLACK', 'ELIP ', 0, 0, 0, 0, 'ELIP ALEXANDER EXERCISE BIKE \"COSMETICS\" EXCELLENT FOR BEAUTY', '\"Love beauty is enjoying. Creating beauty is art\". Let the Alexander ELIP exercise bike weave the perfect beauty with the golden ratio in a healthy and safe way.', 1, '2023-03-06 18:48:17', NULL),
(6, 'ELIP AC064   8 sided dumbbells', 'ELIP', 0, 0, 0, 0, 'Top notch design', 'The ELIP AC064 8-sided barbell is one of the gym machines designed by leading ELIP engineers, made of high-grade steel, large size, high durability.', 1, '2023-03-06 18:51:02', NULL);

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
  `galery_type_id` int(11) NOT NULL,
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

INSERT INTO `galery` (`galery_id`, `galery_type_id`, `galery_type_name`, `item_id`, `item_name`, `note`, `dir`, `img_name`, `flag`, `create_at`, `update_at`) VALUES
(10, 2, 'device', 1, 'MÁY CHẠY BỘ MBH S9800-LED', '', './assets/image/device/', '63ff32fa20c2c_S-9800-LED-V1.jpg', 1, '2023-02-24 18:35:18', '2023-03-01 18:11:53'),
(11, 2, 'device', 2, 'Impulse FE9724', '', './assets/image/device/', 'impulse-FE9724-V1.jpg', 1, '2023-02-24 18:41:02', NULL),
(12, 1, 'slide', 0, 'slide 0', 'Join us now to get the best deals', './assets/image/slide/', 'home-1.jpeg', 1, '2023-02-24 22:08:59', NULL),
(13, 1, 'slide', 1, 'slide 1', 'Exercise not only gives you health, it also gives you the most confident appearance.', './assets/image/slide/', 'home-2.jpeg', 1, '2023-02-24 22:09:16', NULL),
(14, 5, 'course', 1, 'Yoga', '', './assets/image/course/', '6402bb4773662_yoga.jpg', 1, '2023-02-25 01:53:15', '2023-03-04 10:30:14'),
(15, 5, 'course', 2, 'MMA', '', './assets/image/course/', 'mma.jpg', 1, '2023-02-25 01:53:37', NULL),
(16, 5, 'course', 3, 'Boxing', '', './assets/image/course/', '6400408e23b9c_boxing.jpg', 1, '2023-02-25 01:54:12', '2023-03-02 13:22:05'),
(17, 5, 'course', 4, 'Muay Thai', '', './assets/image/course/', 'muaythai.jpg', 1, '2023-02-25 01:54:30', NULL),
(18, 5, 'course', 5, 'CrossFit', '', './assets/image/course/', 'Feature-classes-3.jpeg', 1, '2023-02-25 01:54:51', NULL),
(19, 5, 'course', 6, 'Zumba', '', './assets/image/course/', '6402b6d361c7e_zumm.jpg', 1, '2023-02-25 03:17:44', '2023-03-04 10:11:14'),
(20, 3, 'person_trainer', 1, 'GARFIELD', '', './assets/image/PT/', 'trainer.jpeg', 1, '2023-02-25 04:39:53', NULL),
(21, 3, 'person_trainer', 2, 'PARKER', '', './assets/image/PT/', 'trainer-1.png', 1, '2023-02-25 04:40:24', NULL),
(22, 3, 'person_trainer', 3, 'SEYFRIED', '', './assets/image/PT/', 'trainer-2.jpeg', 1, '2023-02-25 04:40:36', NULL),
(23, 3, 'person_trainer', 5, 'DAVIDSON', '', './assets/image/PT/', 'trainer-3.jpeg', 1, '2023-02-25 04:40:48', NULL),
(24, 3, 'person_trainer', 6, 'TATUM', '', './assets/image/PT/', 'trainer-4.jpeg', 1, '2023-02-25 04:40:58', NULL),
(25, 4, 'service', 1, 'Swimming', '', './assets/image/service/', 'swimming.jpg', 1, '2023-02-25 13:08:16', NULL),
(26, 4, 'service', 2, 'Cycling', '', './assets/image/service/', 'cycling.jpg', 1, '2023-02-25 13:08:34', NULL),
(27, 4, 'service', 3, 'Group Exercise', '', './assets/image/service/', 'group_exercise.jpg', 1, '2023-02-25 13:08:48', NULL),
(28, 4, 'service', 4, 'Sports & Fitness', '', './assets/image/service/', '6405898d2a677_pexels-nathan-cowley-1089164-removebg.png', 1, '2023-02-25 13:09:06', '2023-03-06 13:34:53'),
(29, 7, 'member', 1, 'Minh', 'I have found this fantastic gym and I couldn`t be happier.', './assets/image/member/', 't-2.jpeg', 1, '2023-02-25 18:16:41', NULL),
(30, 7, 'member', 7, 'Huyen', 'I have found this fantastic gym and I couldn`t be happier.', './assets/image/member/', 't-3.jpeg', 1, '2023-02-25 18:17:05', NULL),
(31, 7, 'member', 8, 'Pate', 'I have found this fantastic gym and I couldn`t be happier.', './assets/image/member/', 't-4.jpeg', 1, '2023-02-25 18:17:20', NULL),
(32, 7, 'member', 10, 'Thuy', 'I have found this fantastic gym and I couldn`t be happier.', './assets/image/member/', 'Mai_Phuong_Thuy.jpg', 1, '2023-02-25 18:25:47', NULL),
(33, 11, 'utilities', 1, 'Massage', '', './assets/image/utilities/', '63fed555b86e6_massage.jpeg', 1, '2023-03-01 11:32:21', NULL),
(34, 12, 'about', 0, 'about 0', 'Prime Fitness is fitness club established in the year 1982. The fitness club has equipped with all basic fitness equipment and also included the newly introduced. The Prime fitness club is the flagship brand for Prime Fitness Club Ltd, a UN based health and fitness services provider and a pioneer in the “Integrated Health Club Management Solutions’ business. Prime Fitness Club ltd focuses on staying fit is most important to meet the challenging requirements.', './assets/image/about/', '64009b72f3de3_PT-home.jpg', 1, '2023-03-02 19:49:53', NULL),
(35, 11, 'utilities', 2, 'SPA', '', './assets/image/utilities/', '6401993b5f390_spa.jpg', 1, '2023-03-03 13:52:41', NULL),
(36, 11, 'utilities', 3, 'Cocacola', '', './assets/image/utilities/', '6401995852945_drink.jpg', 1, '2023-03-03 13:53:10', NULL),
(37, 5, 'course', 7, 'DANCE', '', './assets/image/course/', '6402bb3436f1d_dancee.jpg', 1, '2023-03-04 10:29:55', NULL),
(38, 2, 'device', 2, 'Impulse FE9724', '', './assets/image/device/', '64047300cf04a_752B77C1-E838-4D74-9C16-8017B0CC54F1.jpeg', 0, '2023-03-05 17:46:23', '2023-03-06 19:01:52'),
(39, 4, 'service', 1, 'Swimming', '', './assets/image/service/', '64059153bbfc5_sw1.jpeg', 1, '2023-03-06 14:08:03', NULL),
(40, 4, 'service', 1, 'Swimming', '', './assets/image/service/', '6405b55864c4b_sw2.jpeg', 1, '2023-03-06 16:41:44', NULL),
(41, 4, 'service', 1, 'Swimming', '', './assets/image/service/', '6405b56736d0e_sw3.jpeg', 1, '2023-03-06 16:41:59', NULL),
(42, 2, 'device', 3, 'ELIP IRON 10', '', './assets/image/device/', '6405d1e43e5da_may-tap-ta-da-nang-elip-iron10-10in1-1645063875.jpg', 1, '2023-03-06 18:43:32', NULL),
(43, 2, 'device', 4, 'ELIP AMAZON Treadmill', '', './assets/image/device/', '6405d3e3bf5eb_may-chay-bo-elip-athena-dong-co-ac-1665650121.jpg', 1, '2023-03-06 18:52:03', NULL),
(44, 2, 'device', 5, 'ELIP ALEXANDER - BLACK', '', './assets/image/device/', '6405d3fca20d2_xe-dap-tap-elip-alexander-black-1665646748.jpg', 1, '2023-03-06 18:52:28', NULL),
(45, 2, 'device', 6, 'ELIP AC064   8 sided dumbbells', '', './assets/image/device/', '6405d413efc48_dan-ta-8-mat-elip-ac064-1525235854.jpg', 1, '2023-03-06 18:52:51', NULL),
(46, 13, 'photos', 0, 'photos 0', 'photos', './assets/image/photos/', '64060ab5b7157_pexels-photo-841130.jpeg', 1, '2023-03-06 22:45:57', NULL),
(47, 13, 'photos', 1, 'photos 1', 'photos', './assets/image/photos/', '64060bf45d658_pexels-photo-136404.jpg', 1, '2023-03-06 22:51:17', NULL),
(48, 13, 'photos', 2, 'photos 2', 'photos', './assets/image/photos/', '64060c05cabef_phong-tap-gym-quan-go-vap-02.jpg', 1, '2023-03-06 22:51:35', NULL),
(49, 13, 'photos', 3, 'photos 3', 'photos', './assets/image/photos/', '64060e3af381d_pexels-photo-260352.jpg', 1, '2023-03-06 22:51:47', '2023-03-06 23:01:00'),
(50, 13, 'photos', 4, 'photos 4', '', './assets/image/photos/', '64060c1d298d7_R.jpg', 1, '2023-03-06 22:51:58', NULL),
(51, 13, 'photos', 5, 'photos 5', '', './assets/image/photos/', '64060c25f030b_tieu-chuan-thiet-ke-phong-tap-gym-1024x500.jpg', 1, '2023-03-06 22:52:07', NULL),
(52, 7, 'member', 17, 'Kylian', 'VIP member', './assets/image/member/', '640c5afc0659c_mbappe.jpg', 1, '2023-03-11 17:42:05', NULL),
(53, 7, 'member', 16, 'Cristiano', 'Vip member', './assets/image/member/', '640c5bfd42f5d_Cristiano-Ronaldo.jpg', 1, '2023-03-11 17:46:22', NULL),
(54, 7, 'member', 15, 'Messi', '', './assets/image/member/', '640c5d78ca1ba_messi.webp', 1, '2023-03-11 17:52:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery_type`
--

CREATE TABLE `galery_type` (
  `galery_type_id` int(11) NOT NULL,
  `galery_type_name` varchar(50) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galery_type`
--

INSERT INTO `galery_type` (`galery_type_id`, `galery_type_name`, `flag`, `create_at`, `update_at`) VALUES
(1, 'slide', 1, '2023-02-17 12:03:10', NULL),
(2, 'device', 1, '2023-02-17 12:30:05', NULL),
(3, 'person_trainer', 1, '2023-02-17 12:34:24', '2023-02-24 17:45:14'),
(4, 'service', 1, '2023-02-22 19:11:18', '2023-02-22 22:11:25'),
(5, 'course', 1, '2023-02-23 21:30:57', NULL),
(6, 'package', 1, '2023-02-23 21:31:11', NULL),
(7, 'member', 1, '2023-02-23 21:31:33', NULL),
(8, 'background', 1, '2023-02-24 22:12:42', NULL),
(9, 'logo', 1, '2023-02-24 22:12:50', NULL),
(10, 'talk_about_me', 1, '2023-02-24 22:13:00', NULL),
(11, 'utilities', 1, '2023-03-01 11:12:44', NULL),
(12, 'about', 1, '2023-03-02 19:37:01', NULL),
(13, 'photos', 1, '2023-03-06 22:22:00', '2023-03-06 22:29:48');

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
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `vip` int(11) DEFAULT 0,
  `package_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT 0,
  `feedback` varchar(500) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`member_id`, `card_id`, `password_hash`, `fname`, `mname`, `lname`, `dob`, `address`, `phone_number`, `email`, `vip`, `package_id`, `course_id`, `points`, `feedback`, `flag`, `create_at`, `update_at`) VALUES
(1, '123456789', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Andres', '', 'Iniesta', '1991-03-12', 'Hà Vân-Hà Trung-Thanh Hóa', '0888889999', 'nampv@aum.edu.vn', 1, 1, 1, 1000, '', 1, '2023-02-25 17:30:43', '2023-02-28 11:36:42'),
(7, '10000234', 'b2a43e8066f2e76983cb429669eed9049db57840', 'Nguyen', 'Ba', 'Huyen', '2000-03-12', 'DN', '0375657765', 'phamnam1991@gmail.com', 1, 2, 4, 0, '', 1, '2023-02-25 18:07:22', '2023-03-08 10:13:58'),
(8, '10000235', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Lina', 'De', 'Pate', '1999-02-11', 'CG-HN', '0375657766', 'phamnam91th@gmail.com', 1, 3, 6, 3000, '', 1, '2023-02-25 18:08:19', '2023-03-11 01:16:34'),
(9, '', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Mush', 'Ja', 'Peter', '2023-03-03', 'HN', '0908876555', 'nampphaui@gmail.com', 0, 3, 8, 5000, '', 1, '2023-02-25 18:08:59', '2023-03-12 02:06:52'),
(10, '4', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Mai', 'Phuong', 'Thuy', '2001-02-11', '', '0888889988', 'maithuy@gmail.com', 1, 3, 8, 3000, '<p>I feel very comfortable when I practice here, the environment is modern and clean.</p>\r\n', 1, '2023-02-25 18:24:57', '2023-03-11 14:05:10'),
(11, '5', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'lione', 'Diana', 'maria ', '1988-02-26', 'Da Nang', '0112899342', 'lione@gmail.com', 0, 3, 8, 31000, '<p>I feel very comfortable when I practice here, the environment is modern and clean.</p>\r\n', 1, '2023-03-02 18:35:30', '2023-03-11 13:55:37'),
(12, '6', 'dbbe334a21197c19bbd57826b1dce05a97ce827f', 'Hoang', 'Đức', 'Duẩn', '0000-00-00', '', '0962455375', 'duanhoang1995@gmail.com', 0, 4, 8, 0, '', 1, '2023-03-04 23:38:56', '2023-03-08 10:16:48'),
(13, '7', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Piter', '', 'Hackes', '0000-00-00', '', '09043456666', 'nampphaui91@gmail.com', 0, 4, 8, 0, '', 1, '2023-03-05 20:36:00', '2023-03-08 10:16:54'),
(14, '8', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'nam', 'van', 'pham', '0000-00-00', '', '0373777333', 'abc@gmail.com', 0, 4, 8, 0, '<p>After so many changes, this is the place where I am most satisfied.</p>\r\n', 1, '2023-03-07 16:54:21', '2023-03-14 09:30:26'),
(15, '9', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Leo', 'Ba11', 'Messi', '0000-00-00', 'Paris', '0999999999', 'Leo@gmail.com', 1, 2, 8, 2000, '<p>I Have Found This Fantastic Gym And I Couldn&#39;t Be Happier.</p>\r\n', 1, '2023-03-11 17:23:26', '2023-03-17 21:51:42'),
(16, '10', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Ronaldo', '', 'Cristiano', '0000-00-00', '', '0888888888', 'ronaldo@gmail.com', 1, 4, 8, 0, '<p>I Have Found This Fantastic Gym And I Couldn&#39;t Be Happier.&nbsp;</p>\r\n', 1, '2023-03-11 17:28:29', '2023-03-12 12:50:17'),
(17, '11', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Mbappé', '', 'Kylian', '2023-03-03', 'Paris', '0888887777', 'Mbappe@gmail.com', 1, 3, 8, 3000, '<p>This is a great place to practice, I am very satisfied with their service style...</p>\r\n', 1, '2023-03-11 17:35:16', '2023-03-11 17:42:39'),
(19, '12', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Erling', '', 'Haaland', '0000-00-00', '', '0666689999', 'Erling@gmail.com', 0, 4, 8, 0, '', 1, '2023-03-15 15:33:11', NULL),
(20, '13', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', 'Modric', '', 'Luka', '0000-00-00', '', '0903235555', 'Modric@gmail.com', 0, 4, 8, 0, '', 1, '2023-03-15 16:14:08', NULL);

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
  `utilities` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `flag` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `package`
--

INSERT INTO `package` (`package_id`, `name`, `mentor`, `points`, `price`, `expiry`, `day_active`, `utilities`, `description`, `flag`, `create_at`, `update_at`) VALUES
(1, 'BASIC', 'YES', 1000, 50, 1, 3, 'No', 'Suitable when you don\'t have much time, but you still enjoy full our services', 1, '2023-02-16 15:35:45', NULL),
(2, 'STANDARD', 'YES', 2000, 80, 1, 5, 'Massage', 'Suitable for average training needs, enjoy all services and massage utilities.', 1, '2023-02-16 15:37:00', NULL),
(3, 'PREMIUM', 'YES', 3000, 120, 1, 7, 'Massage, Spa', 'Suitable for high intensity training needs, enjoying the full service and our high -end utilities.', 1, '2023-02-16 15:37:25', NULL),
(4, 'NO', 'NO', 0, 0, 1, 3, '', '', 1, '2023-03-07 23:26:32', NULL);

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
  `dob` date NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `person_trainer`
--

INSERT INTO `person_trainer` (`person_trainer_id`, `fname`, `mname`, `lname`, `code`, `dob`, `gender`, `address`, `phone_number`, `person_id`, `email`, `trainer_job`, `evaluate`, `flag`, `create_at`, `update_at`) VALUES
(1, 'ANDREW', '', 'GARFIELD', 'P1001', '1992-02-12', 'M', 'Paris', '0888889999', '1101267822222', 'GARFIELD@gmail.com', 'Fitness instructor', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:19:55', NULL),
(2, 'SARAH', 'JESSICA', 'PARKER', 'P1002', '1994-12-01', 'F', 'Man City', '0375657765', '1101267822223', 'PARKER@gmail.com', 'Swiming trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:22:46', NULL),
(3, 'AMANDA	', '', 'SEYFRIED', 'P1003', '1993-02-26', 'F', 'Man Utd', '0903234443', '1101267822224', 'SEYFRIED@hotmail.com', 'Fitness trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:24:48', NULL),
(5, 'PETE ', '', 'DAVIDSON', 'P1004', '1992-04-11', 'M', 'Arsenal', '0375657766', '1101267822225', 'DAVIDSON@gmail.com', 'Cycling Trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:27:40', NULL),
(6, 'CHANNING ', '', 'TATUM', 'P1005', '1996-05-13', 'M', 'PSG', '0375657768', '1101267822226', 'TATUM@gmail.com', 'Group Exercise Trainer', 'I Have Found This Fantastic Gym And I Couldn\'t Be Happier. The Spacious And Well-Equipped Facilities, Along With The Best Workout Equipment, Have Given Me An Amazing Workout Experience. The Staff Are Attentive And Helpful, And I Have Seen Great Improvements In My Health And Strength Since I Started Working Out Here.', 1, '2023-02-24 17:29:15', NULL);

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
(4, 'c1003', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', NULL, 1, '2023-02-12 01:58:47', NULL),
(5, 'c1004', 'acf267ddeb4c90338ddb42bd848d940dc59b2934', NULL, 1, '2023-03-05 21:13:13', NULL);

--
-- Bẫy `role`
--
DELIMITER $$
CREATE TRIGGER `before_role_delete` BEFORE DELETE ON `role` FOR EACH ROW INSERT INTO role_audit
SET action = 'delete',
user_name = OLD.user_name,
changedat = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_role_insert` BEFORE INSERT ON `role` FOR EACH ROW INSERT INTO role_audit
SET action = 'insert',
user_name = NEW.user_name,
changedat = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_audit`
--

CREATE TABLE `role_audit` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `changedat` datetime DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_audit`
--

INSERT INTO `role_audit` (`id`, `user_name`, `changedat`, `action`) VALUES
(1, 'c1004', '2023-03-05 21:13:13', 'insert');

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
(1, 'Swimming', 'COME WITH US TO DISCOVER !', 'Swimming is an extremely interesting and beneficial sport for health. When you swim, your body will be fully active, increasing flexibility and muscle strength, while reducing stress and increasing concentration. If you want to find a way to boost your health and relax while exploring the underwater world, try swimming and experience the freedom and lightness as you swim among the clear blue waters.', 1, '2023-02-15 10:28:54', '2023-03-06 12:52:59'),
(2, 'Cycling', 'world class !!!', 'Come with us to develop yourself and have a healthy body.', 1, '0000-00-00 00:00:00', '2023-03-06 13:22:44'),
(3, 'Group Exercise', 'Amazing benefits of group exercise', 'Group exercise has a host of intertwined benefits, including increased time consistency, motivation, conversation, and inspiration.', 1, '0000-00-00 00:00:00', '2023-03-06 17:12:03'),
(4, 'Sports & Fitness', 'Do you want a perfect body?', 'Cycling is a vigorous recreational and fitness activity, with the use of a bicycle to get from one place to another. It is also an extremely healthy form of recreational activity, helping you lose weight, increase strength and good for your health. Cycling can be done anywhere, from city streets to suburban areas or hilly populations. It can also be a community activity, with many cycling groups and events held every year. All in all, cycling is a wonderful experience for both your body ', 1, '2023-02-17 12:02:26', '2023-03-06 13:32:47');

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
(3, 'Cocacola', 10, 1, '2023-02-14 22:33:47', '2023-03-01 09:04:19');

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
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `FK_person_trainer_id` (`person_trainer_id`);

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
  ADD PRIMARY KEY (`galery_id`),
  ADD KEY `FK_galery_type` (`galery_type_id`);

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
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_member_package_id` (`package_id`),
  ADD KEY `FK_member_course_id` (`course_id`);

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
  ADD UNIQUE KEY `username` (`user_name`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `role_audit`
--
ALTER TABLE `role_audit`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `galery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `galery_type`
--
ALTER TABLE `galery_type`
  MODIFY `galery_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `person_trainer`
--
ALTER TABLE `person_trainer`
  MODIFY `person_trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `role_audit`
--
ALTER TABLE `role_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_person_trainer_id` FOREIGN KEY (`person_trainer_id`) REFERENCES `person_trainer` (`person_trainer_id`);

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `FK_galery_type` FOREIGN KEY (`galery_type_id`) REFERENCES `galery_type` (`galery_type_id`);

--
-- Các ràng buộc cho bảng `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_member_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `FK_member_package_id` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`);

--
-- Các ràng buộc cho bảng `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
