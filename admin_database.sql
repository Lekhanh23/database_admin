-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 27, 2025 lúc 06:31 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `admin_database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_code` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `admin_code`, `status`, `created_at`) VALUES
(2, 'admin1', 'admin@gmail.com', 'admin1', '2', 'active', '2025-05-22 17:00:00');
-- account admin1
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('Waiting','Confirmed','Cancelled','Completed') DEFAULT 'Waiting',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `department_id`, `appointment_date`, `appointment_time`, `status`, `created_at`) VALUES
(11, 4, 1, '2025-05-21', '09:00:00', 'Waiting', '2025-05-21 01:43:13'),
(12, 5, 3, '2025-05-18', '21:00:00', 'Completed', '2025-05-21 01:47:00'),
(13, 7, 2, '2025-05-24', '09:00:00', 'Waiting', '2025-05-23 06:06:10'),
(14, 9, 1, '2025-05-01', '15:00:00', 'Cancelled', '2025-05-01 01:00:00'),
(15, 8, 3, '2025-05-25', '17:00:00', 'Confirmed', '2025-05-23 06:13:48'),
(16, 10, 2, '2025-05-06', '20:00:00', 'Cancelled', '2025-05-23 06:15:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Clinical Department'),
(2, 'Paraclinical Department'),
(3, 'Supporting Department');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments_list`
--

CREATE TABLE `departments_list` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `departments_list`
--

INSERT INTO `departments_list` (`id`, `code`, `name`, `name_en`, `head`, `description`, `status`, `created_at`) VALUES
(1, 'INT', 'Khoa Nội', 'Internal Medicine', 'BS. Nguyễn Anh Minh', 'Non-surgical treatment', 'active', '2025-05-21 03:37:29'),
(2, 'SUR', 'Khoa Ngoại', 'Surgery', 'BS. Trần Văn Thái', 'Surgery and post-operative care', 'active', '2025-05-21 03:37:29'),
(3, 'OG', 'Khoa Sản', 'Obstetrics and Gynecology', 'BS. Đỗ Thu Hoà', 'Women\'s health care, childbirth, obstetrics and gynecology', 'active', '2025-05-21 04:06:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `feedback_text` text NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `department_id`, `feedback_text`, `feedback_date`, `feedback_time`, `created_at`) VALUES
(1, 4, 1, 'Very good service.', '2025-05-20', '08:30:00', '2025-05-21 05:11:02'),
(2, 5, 3, 'Good\r\n', '2025-05-21', '09:15:00', '2025-05-21 05:11:02'),
(3, 10, 2, 'Sad because my appointment was cancelled.', '2025-05-07', '15:30:00', '2025-05-07 08:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','doctor','nurse','patient') NOT NULL,
  `created_date` date DEFAULT curdate(),
  `status` enum('active','inactive') DEFAULT 'active',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`full_name`, `email`, `password`, `role`, `created_date`, `status`, `id`) VALUES
('Lê Khanh', 'daolekhanh0903@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', '2025-05-21', 'active', 1),
('Ngọc Anh', 'ngocanh@gmail.com', 'c82561ec215a6e31807ceedf3b3bd25e', 'nurse', '2025-05-21', 'active', 3),
('Minh Tâm', 'minhtam@gmail.com', '202cb962ac59075b964b07152d234b70', 'patient', '2025-05-21', 'active', 4),
('Alice', 'alice@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'patient', '2025-05-21', 'active', 5),
('admin1', 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', '2025-05-23', 'active', 6),
('Hồng Ngọc', 'hongngoc@gmail.com', '0267f7bf0a88ca1430777456c66e3631', 'patient', '2025-05-23', 'active', 7),
('Vân', 'van@gmail.com', 'a0e70be9e8f538282678aecf1ecc1f43', 'patient', '2025-05-23', 'active', 8),
('John', 'john@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'patient', '2025-05-23', 'active', 9),
('Duy Anh', 'duyanh@gmail.com', '57ddb242db5ea4e5320989a4108e31c6', 'patient', '2025-05-23', 'active', 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments_list`
--
ALTER TABLE `departments_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `departments_list`
--
ALTER TABLE `departments_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
