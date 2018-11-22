-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 10:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

DROP TABLE IF EXISTS `addons`;
CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Nathan Bryan', '2018-11-17 19:20:01', '2018-11-17 19:20:01'),
(2, 'Hyatt Dickerson', '2018-11-17 19:20:35', '2018-11-17 19:20:35'),
(3, 'Phyllis Flores', '2018-11-17 19:21:11', '2018-11-17 19:21:11'),
(4, 'school name', '2018-11-17 19:22:27', '2018-11-17 19:22:27'),
(5, 'Valentine Klein', '2018-11-17 19:23:28', '2018-11-17 19:23:28'),
(6, 'Cathleen Osborn', '2018-11-17 19:34:52', '2018-11-17 19:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'Class One', 1, '2018-11-14 09:57:21', '2018-11-15 07:22:22'),
(2, 'Class Ten', 1, '2018-11-14 10:09:36', '2018-11-15 06:39:44'),
(3, 'Class Two', 1, '2018-11-15 06:24:42', '2018-11-15 06:24:42'),
(15, 'Class Four', 1, '2018-11-15 07:28:24', '2018-11-15 07:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 'Physics', 1, NULL, NULL),
(2, 'Biology', 1, '2018-11-17 10:04:03', '2018-11-17 10:11:34'),
(4, 'Chemistry', 1, '2018-11-17 10:11:46', '2018-11-17 10:11:46'),
(5, 'Computer Science', 1, '2018-11-17 10:12:08', '2018-11-17 10:12:08'),
(6, 'Math', 1, '2018-11-17 19:50:16', '2018-11-17 19:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

DROP TABLE IF EXISTS `enrolls`;
CREATE TABLE `enrolls` (
  `id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrolls`
--

INSERT INTO `enrolls` (`id`, `student_id`, `class_id`, `section_id`, `school_id`, `session`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 48, 1, '2018-2019', '2018-11-20 10:49:25', '2018-11-20 10:49:25'),
(2, 2, 1, 48, 1, '2018-2019', '2018-11-20 10:50:51', '2018-11-20 10:50:51'),
(3, 3, 1, 48, 1, '2018-2019', '2018-11-20 10:53:45', '2018-11-20 10:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent`, `sort_order`, `status`, `icon`) VALUES
(3, 'users', 0, 0, 1, 'dripicons-user'),
(4, 'admin', 3, 10, 1, NULL),
(5, 'student', 3, 15, 1, NULL),
(6, 'teacher', 3, 25, 1, NULL),
(7, 'parent', 3, 30, 1, NULL),
(8, 'librarian', 3, 35, 1, NULL),
(9, 'accountant', 3, 40, 1, NULL),
(10, 'driver', 3, 45, 1, NULL),
(11, 'academic', 0, 0, 1, 'dripicons-store'),
(12, 'class', 11, 0, 1, NULL),
(13, 'section', 11, 0, 0, NULL),
(14, 'class_room', 11, 0, 1, NULL),
(15, 'syllabus', 11, 0, 1, NULL),
(16, 'subject', 11, 0, 1, NULL),
(17, 'class_routine', 11, 0, 1, NULL),
(18, 'daily_attendance', 11, 0, 1, NULL),
(19, 'noticeboard', 11, 0, 1, NULL),
(20, 'student_promotion', 11, 0, 1, NULL),
(21, 'exam', 0, 0, 1, 'dripicons-music'),
(22, 'exam_list', 21, 0, 1, NULL),
(23, 'exam_grades', 21, 0, 1, NULL),
(24, 'marks', 21, 0, 1, NULL),
(25, 'tabulation_sheet', 21, 0, 1, NULL),
(26, 'send_sms', 21, 0, 1, NULL),
(27, 'accounts', 0, 0, 1, 'dripicons-jewel'),
(28, 'create_fee', 27, 0, 1, NULL),
(29, 'fee_report', 27, 0, 1, NULL),
(30, 'staff_payroll', 27, 0, 1, NULL),
(31, 'back_office', 0, 0, 1, 'dripicons-cutlery'),
(32, 'library', 31, 0, 1, NULL),
(33, 'transport', 31, 0, 1, NULL),
(34, 'hostel', 31, 0, 1, NULL),
(35, 'school_website', 31, 0, 1, NULL),
(36, 'settings', 0, 0, 1, 'dripicons-basketball'),
(37, 'system_settings', 36, 0, 1, NULL),
(38, 'sms_settings', 36, 0, 1, NULL),
(39, 'payment_settings', 36, 0, 1, NULL),
(40, 'language_settings', 36, 0, 1, NULL),
(41, 'session_manager', 31, 0, 1, NULL),
(42, 'department', 11, 0, 1, NULL),
(43, 'admission', 3, 20, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'sub_admin'),
(3, 'teacher'),
(4, 'parent'),
(5, 'student'),
(6, 'accountant'),
(7, 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `class_id`, `school_id`, `created_at`, `updated_at`) VALUES
(23, 'A', 2, 1, '2018-11-14 10:09:36', '2018-11-15 06:22:15'),
(33, 'A', 3, 1, '2018-11-15 06:24:42', '2018-11-15 06:24:42'),
(34, 'A', 4, 1, '2018-11-15 06:51:48', '2018-11-15 06:51:48'),
(35, 'A', 5, 1, '2018-11-15 06:53:15', '2018-11-15 06:53:15'),
(36, 'A', 6, 1, '2018-11-15 06:53:20', '2018-11-15 06:53:20'),
(37, 'A', 7, 1, '2018-11-15 06:53:48', '2018-11-15 06:53:48'),
(38, 'A', 8, 1, '2018-11-15 06:55:59', '2018-11-15 06:55:59'),
(39, 'A', 9, 1, '2018-11-15 06:57:18', '2018-11-15 06:57:18'),
(40, 'A', 10, 1, '2018-11-15 06:57:51', '2018-11-15 06:57:51'),
(41, 'A', 11, 1, '2018-11-15 06:58:08', '2018-11-15 06:58:08'),
(42, 'A', 12, 1, '2018-11-15 06:58:43', '2018-11-15 06:58:43'),
(43, 'A', 13, 1, '2018-11-15 07:01:33', '2018-11-15 07:01:33'),
(44, 'A', 14, 1, '2018-11-15 07:02:08', '2018-11-15 07:02:08'),
(46, 'A', 15, 1, '2018-11-15 07:28:24', '2018-11-15 07:28:24'),
(47, 'A', 16, 1, '2018-11-19 06:43:49', '2018-11-19 06:43:49'),
(48, 'A', 1, 1, '2018-11-19 06:58:53', '2018-11-19 06:59:15'),
(49, 'B', 1, 1, '2018-11-19 06:59:00', '2018-11-19 06:59:15'),
(51, 'A', 17, 1, '2018-11-19 09:11:32', '2018-11-19 09:11:32'),
(53, 'C', 1, 1, '2018-11-19 12:15:11', '2018-11-19 12:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `school_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2017-2018', 1, 0, '2018-11-15 09:39:09', '2018-11-15 09:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `selected_branch` int(11) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `system_email`, `selected_branch`, `running_session`, `updated_at`, `created_at`) VALUES
(1, 'Nathan Bryan', 'xotetocah@mailinator.com', 1, '2018-2019', '2018-11-17 19:20:01', '2018-11-17 19:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `code`, `user_id`, `parent_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, '5fa9179', 41, 24, 1, '2018-11-20 10:49:25', '2018-11-20 10:49:25'),
(2, 'b9218b3', 42, 24, 1, '2018-11-20 10:50:51', '2018-11-20 10:50:51'),
(3, '31cccb9', 43, 24, 1, '2018-11-20 10:53:45', '2018-11-20 10:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `department_id`, `designation`, `school_id`, `created_at`, `updated_at`) VALUES
(12, 14, 1, 'professor', 1, '2018-11-15 11:47:53', '2018-11-21 05:06:44'),
(13, 15, 2, 'professor', 1, '2018-11-15 11:48:06', '2018-11-21 05:06:49'),
(14, 16, 1, 'professor', 1, '2018-11-15 11:48:12', '2018-11-21 05:06:52'),
(15, 17, 1, 'professor', 1, '2018-11-15 11:48:17', '2018-11-21 05:06:56'),
(16, 33, 1, 'professor', 1, '2018-11-19 07:47:35', '2018-11-21 05:06:59'),
(17, 34, 4, 'professor', 1, '2018-11-19 07:49:50', '2018-11-21 05:07:03'),
(18, 35, 6, 'professor', 1, '2018-11-19 07:51:54', '2018-11-21 05:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_permissions`
--

DROP TABLE IF EXISTS `teacher_permissions`;
CREATE TABLE `teacher_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT '0',
  `assignment` int(11) DEFAULT '0',
  `attendance` int(11) DEFAULT '0',
  `online_exam` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_permissions`
--

INSERT INTO `teacher_permissions` (`id`, `class_id`, `section_id`, `teacher_id`, `marks`, `assignment`, `attendance`, `online_exam`, `created_at`, `updated_at`) VALUES
(1, 1, 49, 18, 1, 1, 1, 0, '2018-11-19 07:51:54', '2018-11-20 04:38:20'),
(2, 1, 49, 12, 0, 0, 0, 0, '2018-11-20 04:38:15', '2018-11-20 05:12:46'),
(3, 1, 48, 18, 1, 0, 1, 0, '2018-11-20 04:39:26', '2018-11-20 04:39:27'),
(4, 15, 46, 15, 1, 1, 1, 0, '2018-11-20 04:41:49', '2018-11-20 04:41:54'),
(5, 1, 48, 12, 1, 1, 1, 1, '2018-11-20 05:12:00', '2018-11-20 06:33:51'),
(6, 1, 48, 13, 0, 0, 0, 0, '2018-11-20 11:50:29', '2018-11-20 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `authentication_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone`, `remember_token`, `birthday`, `gender`, `blood_group`, `school_id`, `authentication_key`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Admin', 'admin@example.com', '$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm', 1, NULL, NULL, '3Q6dOLh7IcIDq8pv0FgyqtcF1sHFRMdVbKmZQ8EsVpfwl1maJDq0EqPsNuLZ', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(14, 'Oscar Padilla2', 'teacher@example.com', '$2y$10$JPdPD6ikGWSggP/Hhlom2e3MD9aUzDcbbwN6Uk0pxIT33/1QTyYXG', 3, 'Culpa velit officia eaque sit', '+478-85-8909980', NULL, NULL, 'female', 'b-', NULL, NULL, '2018-11-15 11:47:53', '2018-11-21 04:53:12'),
(15, 'Mili Hasan', 'teacher2@example.com', '$2y$10$zovGAwMnDpd.bcen6Cwr/OdS.pf93Fo/MTiWLEYyMkKfmXEPwJPt.', 3, 'Inventore iste vel nihil praesentium in quo exercitation odit est modi recusandae Aut sunt rerum est do porro dicta', '+772-78-8452846', NULL, NULL, 'female', 'a+', NULL, NULL, '2018-11-15 11:48:06', '2018-11-19 07:52:37'),
(16, 'Zachery Davis', 'teacher3@example.com', '$2y$10$BQnpqSneg/n7Kwv8pAP2VulckrCwbDdQ6CUnPboQN0qgc4RTNwxfa', 3, 'Aut labore ut id enim qui fugiat assumenda soluta molestias enim et facere dolor nesciunt asperiores consequatur Quidem', '+259-76-6790239', NULL, NULL, 'others', 'a-', NULL, NULL, '2018-11-15 11:48:12', '2018-11-15 11:48:12'),
(17, 'Leo Spence', 'teacher4@example.com', '$2y$10$w8.39SzK.NsSQYcnjJvkgu1GFS7eLTcC6LWuWye/g4df6G49GrCIy', 3, 'Cumque et id quod expedita maiores ea consequatur commodi', '+643-57-5777424', NULL, NULL, 'female', 'b+', NULL, NULL, '2018-11-15 11:48:17', '2018-11-15 11:48:17'),
(18, 'Yen Singleton', 'gazilof@mailinator.net', '$2y$10$1ZzycstlFuS0C13EE/FC6e6npJSTslEcuBUWGSiMtgiL07DD.giuK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:20:02', '2018-11-17 19:20:02'),
(19, 'Judith Crosby', 'nybunu@mailinator.com', '$2y$10$1r.YJrt3QLhDdl3DS.Pa7.0i.lgXX2eXYWPzrarJpb7y2d7LwLo2S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:20:35', '2018-11-17 19:20:35'),
(20, 'Slade Galloway', 'gujubynaq@mailinator.net', '$2y$10$FBlgHLXy0AsX48zXYNy/Eeslkd9dq7SHu1F7fHKDDbKtuxImuxjVS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:21:11', '2018-11-17 19:21:11'),
(21, 'Admin', 'adminemail@example.com', '$2y$10$sPWWuddfmVtonVaSfVnhJOdMS1FAuZm9BONEQpSLx7he3D3vFt98u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:22:28', '2018-11-17 19:22:28'),
(22, 'Maryam Emerson', 'jotyqazumi@mailinator.net', '$2y$10$05Oi8dHJkOjL76zvQ7W/IOE7aPf09HPZnOhfTJ35aQxNeUOZkqDSm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:23:28', '2018-11-17 19:23:28'),
(23, 'Molly Mcguire', 'namimanor@mailinator.net', '$2y$10$bcNTIs5Q3eVjf3aPq7Mg8OEw/kk7dObF0eeoJH/D3DPOmvHPmULZe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 19:34:52', '2018-11-17 19:34:52'),
(24, 'Elmo Rodriquez', 'gemyfaqoxy@mailinator.net', '$2y$10$UH5AQCLnzBgra7W9FRkvX.HFn5/ZoTsiARZq7VL/BeZlaIG5VZDwq', 4, 'Labore aut aut et voluptate asperiores magnam ratione consequuntur voluptatem Provident occaecat voluptas', '+234-71-1165959', NULL, NULL, 'female', 'ab-', 1, NULL, '2018-11-18 17:42:17', '2018-11-18 17:42:17'),
(25, 'Odessa Rivers', 'kekyqe@mailinator.net', '$2y$10$c9NsPEPJmJaa9mT3MVH9y.OMIr6AX99p/0kC2l.EN/0DDEVwMcEGC', 4, 'Nostrud quasi voluptatem provident enim dignissimos maiores qui sed maiores eligendi sint deleniti quibusdam dolores ducimus molestiae quisquam esse', '+164-70-1817151', NULL, NULL, 'male', 'a+', 1, NULL, '2018-11-18 19:16:21', '2018-11-18 19:16:21'),
(28, 'Kelly Saunders', 'nexyjikeso@mailinator.com', '$2y$10$DQDd6E/LHMVE8xcp46e7uuJnjMT/.5FpwCA4qbhqZjxFKvUz1dyTa', 5, 'Velit ex aut magnam cillum qui porro quo et veniam minus eaque', '+399-31-9902331', NULL, NULL, 'female', 'a+', 1, NULL, '2018-11-18 19:21:15', '2018-11-18 19:21:15'),
(29, 'Knox Bishop', 'lywu@mailinator.com', '$2y$10$B5F72YbXB464/Z8Gtpcvte2OUz0orruiVGRiaO6ams09iohMonPEa', 5, 'Deserunt pariatur Nemo rerum excepturi dolorum fugiat labore voluptas exercitationem irure eos vel sint eos facilis qui ea consectetur', '+272-66-3678110', NULL, NULL, 'female', 'a+', 1, NULL, '2018-11-18 19:21:19', '2018-11-18 19:21:19'),
(32, 'Sylvester Reid', 'mylekoxel@mailinator.com', '$2y$10$ILYRA.FAgbBHVQXVVs0lZ.BmbNsLzGLEweMsuDDeC6hADflCvibby', 6, 'Consequuntur cum soluta dolor expedita omnis dolor voluptas numquam sunt ipsa libero', '+868-89-8240384', NULL, NULL, 'female', 'b+', 1, NULL, '2018-11-18 19:31:14', '2018-11-18 19:31:14'),
(33, 'Christian Solomon', 'teacher5@example.com', '$2y$10$37uT81i2vwDFqTkSyc7xVe6McQc/RrfawWnNDP6ButLorcvRgberS', 3, 'Qui molestias hic necessitatibus nostrud aliqua Rerum ex labore nobis alias voluptate commodi maiores unde sunt cupiditate proident', '+451-17-1271774', NULL, NULL, 'female', 'b-', 1, NULL, '2018-11-19 07:47:35', '2018-11-19 07:47:35'),
(34, 'Duncan Simpson', 'asdasdsa@example.com', '$2y$10$T6umwBevumJ/FnQw96hrrOGoefBj10CzAAoKCH8wpfk2Yd7n/Z5z6', 3, 'Qui sit consectetur error excepturi cillum aut facere at ut nobis nobis illo maiores sint consequatur Voluptatibus', '+882-88-6861634', NULL, NULL, 'others', 'o-', 1, NULL, '2018-11-19 07:49:50', '2018-11-19 07:49:50'),
(35, 'Larissa Bright', 'asd@example.com', '$2y$10$EGCN9TTHpTSyTjsKr29fsOLw3L.0Hc9FEySpicZLoJthjb2p8l.lW', 3, 'Ex sed officia dolor aliquam voluptatem quo explicabo', '+863-33-9865989', NULL, NULL, 'female', 'o-', 1, NULL, '2018-11-19 07:51:54', '2018-11-19 07:51:54'),
(36, 'Wyoming Shaw', 'student@example.com', '$2y$10$ul9.4Kz7JiGnNsCpvDEpie6YrEVTEL7HwHOrN6Sl9Dr/7hgDPGuRy', 5, 'Et est culpa placeat ducimus anim soluta officiis reprehenderit fuga Nulla amet lorem', '+882-98-2545194', NULL, '1542672000', 'others', NULL, 1, NULL, '2018-11-20 09:05:35', '2018-11-20 09:05:35'),
(37, 'Darius Floyd', 'sup@example.com', '$2y$10$9p4e1uIkJWouCMsOV38zDOyoCFKGVDwlHMw4/MqH1Pta3PQ1AQkYq', 5, 'Et obcaecati rem omnis quaerat nobis tempor quod quis repellendus In facilis duis', '+437-45-8555475', NULL, '0', 'others', NULL, 1, NULL, '2018-11-20 09:06:02', '2018-11-20 09:06:02'),
(38, 'Nola Griffin', 'student2@example.com', '$2y$10$QkCmZ9.abveQOBzryooctOBslOJJqPfiQIjOExuh7v7tA0bHtrm5q', 5, '42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex', '7766275331', NULL, '1542672000', 'male', NULL, 1, NULL, '2018-11-20 09:46:08', '2018-11-20 09:46:08'),
(39, 'Ashton Lowe', 'student3@example.com', '$2y$10$20lpSmWGM9IQYnGeXYTyVOy3IsOxo4HWdrmgnXnAh/1ST03l2VQxq', 5, 'asd', 'asd', NULL, '1542672000', 'male', NULL, 1, NULL, '2018-11-20 10:13:44', '2018-11-20 10:13:44'),
(40, 'Keelie Romero', 'admiasdn@example.com', '$2y$10$B7H.GBk/6jqoGgznF/Rbn.PJIvU2j0dZZgSntP7XroHIHJjV6xKS6', 5, 'Sapiente velit sapiente praesentium consequuntur rerum a corporis rem mollit', '+312-32-7770306', NULL, '1542672000', 'female', NULL, 1, NULL, '2018-11-20 10:31:52', '2018-11-20 10:31:52'),
(41, 'Student One', 'student_1@example.com', '$2y$10$1lBfXE0sFWIvP3y1mg49geTw0CxRXXXKzz3obi32VO7R2df3l41R.', 5, '42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex', '7766275331', NULL, '1542672000', 'male', NULL, 1, NULL, '2018-11-20 10:49:25', '2018-11-20 10:49:25'),
(42, 'Student Two', 'student_2@example.com', '$2y$10$c4kVwD8jx/NbOJIq74/B..ff3DdEECNO/gqQPgootVlIz6qFDKTuW', 5, 'Billing Address 1\r\nBilling Address 2', '7766275331', NULL, '1542672000', 'male', NULL, 1, NULL, '2018-11-20 10:50:51', '2018-11-20 10:50:51'),
(43, 'Student Three', 'student_3@example.com', '$2y$10$6G2ah4B8xLRrNTONAFAPO.qQo96WxWpK1iZgKHFMUp6yu0z9uu2jK', 5, '42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex', '7766275331', NULL, '1542672000', 'male', NULL, 1, NULL, '2018-11-20 10:53:45', '2018-11-20 10:53:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_permissions`
--
ALTER TABLE `teacher_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrolls`
--
ALTER TABLE `enrolls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher_permissions`
--
ALTER TABLE `teacher_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
