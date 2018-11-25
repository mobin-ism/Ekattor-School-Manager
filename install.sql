# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: laravel_ekattor
# Generation Time: 2018-11-25 12:41:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table addons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addons`;

CREATE TABLE `addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table branches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;

INSERT INTO `branches` (`id`, `name`, `updated_at`, `created_at`)
VALUES
	(1,'Nathan Bryan','2018-11-17 19:20:01','2018-11-17 19:20:01'),
	(2,'Hyatt Dickerson','2018-11-17 19:20:35','2018-11-17 19:20:35'),
	(3,'Phyllis Flores','2018-11-17 19:21:11','2018-11-17 19:21:11'),
	(4,'school name','2018-11-17 19:22:27','2018-11-17 19:22:27'),
	(5,'Valentine Klein','2018-11-17 19:23:28','2018-11-17 19:23:28'),
	(6,'Cathleen Osborn','2018-11-17 19:34:52','2018-11-17 19:34:52');

/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table classes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;

INSERT INTO `classes` (`id`, `name`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'Class One',1,'2018-11-14 09:57:21','2018-11-15 07:22:22'),
	(2,'Class Ten',1,'2018-11-14 10:09:36','2018-11-15 06:39:44'),
	(3,'Class Two',1,'2018-11-15 06:24:42','2018-11-15 06:24:42'),
	(15,'Class Four',1,'2018-11-15 07:28:24','2018-11-15 07:28:24');

/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table departments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;

INSERT INTO `departments` (`id`, `name`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'Physics',1,NULL,NULL),
	(2,'Biology',1,'2018-11-17 10:04:03','2018-11-17 10:11:34'),
	(4,'Chemistry',1,'2018-11-17 10:11:46','2018-11-17 10:11:46'),
	(5,'Computer Science',1,'2018-11-17 10:12:08','2018-11-17 10:12:08'),
	(6,'Math',1,'2018-11-17 19:50:16','2018-11-17 19:50:25');

/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table enrolls
# ------------------------------------------------------------

DROP TABLE IF EXISTS `enrolls`;

CREATE TABLE `enrolls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `enrolls` WRITE;
/*!40000 ALTER TABLE `enrolls` DISABLE KEYS */;

INSERT INTO `enrolls` (`id`, `student_id`, `class_id`, `section_id`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(1,1,1,48,1,'2018-2019','2018-11-20 10:49:25','2018-11-20 10:49:25'),
	(2,2,1,48,1,'2018-2019','2018-11-20 10:50:51','2018-11-20 10:50:51'),
	(3,3,1,48,1,'2018-2019','2018-11-20 10:53:45','2018-11-20 10:53:45'),
	(4,4,2,23,1,'2018-2019','2018-11-25 06:48:27','2018-11-25 06:48:27'),
	(5,5,2,23,1,'2018-2019','2018-11-25 06:57:36','2018-11-25 06:57:36'),
	(6,6,15,46,1,'2018-2019','2018-11-25 07:01:13','2018-11-25 07:01:13'),
	(7,7,1,48,1,'2018-2019','2018-11-25 07:02:55','2018-11-25 07:02:55'),
	(8,8,2,23,1,'2018-2019','2018-11-25 07:07:11','2018-11-25 07:07:11'),
	(9,9,1,48,1,'2018-2019','2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(10,10,1,48,1,'2018-2019','2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(11,11,1,48,1,'2018-2019','2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(12,12,1,48,1,'2018-2019','2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(13,13,1,48,1,'2018-2019','2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(14,14,15,46,1,'2018-2019','2018-11-25 10:31:23','2018-11-25 10:31:23'),
	(15,15,1,48,1,'2018-2019','2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(16,16,1,48,1,'2018-2019','2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(17,17,1,48,1,'2018-2019','2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(18,18,1,48,1,'2018-2019','2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(19,19,1,48,1,'2018-2019','2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(20,20,2,23,1,'2018-2019','2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(21,21,2,23,1,'2018-2019','2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(22,22,2,23,1,'2018-2019','2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(23,23,2,23,1,'2018-2019','2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(24,24,1,48,1,'2018-2019','2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(25,25,1,48,1,'2018-2019','2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(26,26,1,48,1,'2018-2019','2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(27,27,15,46,1,'2018-2019','2018-11-25 10:37:29','2018-11-25 10:37:29'),
	(28,28,1,48,1,'2018-2019','2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(29,29,1,48,1,'2018-2019','2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(30,30,1,48,1,'2018-2019','2018-11-25 12:39:37','2018-11-25 12:39:37');

/*!40000 ALTER TABLE `enrolls` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `parent`, `sort_order`, `status`, `icon`)
VALUES
	(3,'users',0,0,1,'dripicons-user'),
	(4,'admin',3,10,1,NULL),
	(5,'student',3,15,1,NULL),
	(6,'teacher',3,25,1,NULL),
	(7,'parent',3,30,1,NULL),
	(8,'librarian',3,35,1,NULL),
	(9,'accountant',3,40,1,NULL),
	(10,'driver',3,45,1,NULL),
	(11,'academic',0,0,1,'dripicons-store'),
	(12,'class',11,0,1,NULL),
	(13,'section',11,0,0,NULL),
	(14,'class_room',11,0,1,NULL),
	(15,'syllabus',11,0,1,NULL),
	(16,'subject',11,0,1,NULL),
	(17,'class_routine',11,0,1,NULL),
	(18,'daily_attendance',11,0,1,NULL),
	(19,'noticeboard',11,0,1,NULL),
	(20,'student_promotion',11,0,1,NULL),
	(21,'exam',0,0,1,'dripicons-music'),
	(22,'exam_list',21,0,1,NULL),
	(23,'exam_grades',21,0,1,NULL),
	(24,'marks',21,0,1,NULL),
	(25,'tabulation_sheet',21,0,1,NULL),
	(26,'send_sms',21,0,1,NULL),
	(27,'accounts',0,0,1,'dripicons-jewel'),
	(28,'create_fee',27,0,1,NULL),
	(29,'fee_report',27,0,1,NULL),
	(30,'staff_payroll',27,0,1,NULL),
	(31,'back_office',0,0,1,'dripicons-cutlery'),
	(32,'library',31,0,1,NULL),
	(33,'transport',31,0,1,NULL),
	(34,'hostel',31,0,1,NULL),
	(35,'school_website',31,0,1,NULL),
	(36,'settings',0,0,1,'dripicons-basketball'),
	(37,'system_settings',36,0,1,NULL),
	(38,'sms_settings',36,0,1,NULL),
	(39,'payment_settings',36,0,1,NULL),
	(40,'language_settings',36,0,1,NULL),
	(41,'session_manager',31,0,1,NULL),
	(42,'department',11,0,1,NULL),
	(43,'admission',3,20,1,NULL),
	(44,'addon_manager',31,0,1,NULL);

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table parent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `parent`;

CREATE TABLE `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`)
VALUES
	(1,'admin'),
	(2,'sub_admin'),
	(3,'teacher'),
	(4,'parent'),
	(5,'student'),
	(6,'accountant'),
	(7,'librarian');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `class_id`, `school_id`, `created_at`, `updated_at`)
VALUES
	(23,'A',2,1,'2018-11-14 10:09:36','2018-11-15 06:22:15'),
	(33,'A',3,1,'2018-11-15 06:24:42','2018-11-15 06:24:42'),
	(34,'A',4,1,'2018-11-15 06:51:48','2018-11-15 06:51:48'),
	(35,'A',5,1,'2018-11-15 06:53:15','2018-11-15 06:53:15'),
	(36,'A',6,1,'2018-11-15 06:53:20','2018-11-15 06:53:20'),
	(37,'A',7,1,'2018-11-15 06:53:48','2018-11-15 06:53:48'),
	(38,'A',8,1,'2018-11-15 06:55:59','2018-11-15 06:55:59'),
	(39,'A',9,1,'2018-11-15 06:57:18','2018-11-15 06:57:18'),
	(40,'A',10,1,'2018-11-15 06:57:51','2018-11-15 06:57:51'),
	(41,'A',11,1,'2018-11-15 06:58:08','2018-11-15 06:58:08'),
	(42,'A',12,1,'2018-11-15 06:58:43','2018-11-15 06:58:43'),
	(43,'A',13,1,'2018-11-15 07:01:33','2018-11-15 07:01:33'),
	(44,'A',14,1,'2018-11-15 07:02:08','2018-11-15 07:02:08'),
	(46,'A',15,1,'2018-11-15 07:28:24','2018-11-15 07:28:24'),
	(47,'A',16,1,'2018-11-19 06:43:49','2018-11-19 06:43:49'),
	(48,'A',1,1,'2018-11-19 06:58:53','2018-11-19 06:59:15'),
	(49,'B',1,1,'2018-11-19 06:59:00','2018-11-19 06:59:15'),
	(51,'A',17,1,'2018-11-19 09:11:32','2018-11-19 09:11:32'),
	(53,'C',1,1,'2018-11-19 12:15:11','2018-11-19 12:15:11');

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `name`, `school_id`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'2017-2018',1,0,'2018-11-15 09:39:09','2018-11-15 09:39:09');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_name` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `selected_branch` int(11) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `system_name`, `system_email`, `selected_branch`, `running_session`, `updated_at`, `created_at`)
VALUES
	(1,'Nathan Bryan','xotetocah@mailinator.com',1,'2018-2019','2018-11-17 19:20:01','2018-11-17 19:20:01');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `code`, `user_id`, `parent_id`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'5fa9179',41,24,1,'2018-11-20 10:49:25','2018-11-20 10:49:25'),
	(2,'b9218b3',42,24,1,'2018-11-20 10:50:51','2018-11-20 10:50:51'),
	(3,'31cccb9',43,24,1,'2018-11-20 10:53:45','2018-11-20 10:53:45'),
	(4,'4df7689',45,25,1,'2018-11-25 06:48:27','2018-11-25 06:48:27'),
	(5,'13f072c',46,24,1,'2018-11-25 06:57:36','2018-11-25 06:57:36'),
	(6,'39dfdf7',47,24,1,'2018-11-25 07:01:13','2018-11-25 07:01:13'),
	(7,'31b25ec',48,24,1,'2018-11-25 07:02:55','2018-11-25 07:02:55'),
	(8,'09aed09',49,24,1,'2018-11-25 07:07:11','2018-11-25 07:07:11'),
	(9,'f877f0c',50,25,1,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(10,'6548e63',51,24,1,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(11,'859402b',52,24,1,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(12,'a6da747',53,24,1,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(13,'ab58401',54,25,1,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(14,'31ce16d',55,25,1,'2018-11-25 10:31:23','2018-11-25 10:31:23'),
	(15,'885226d',56,24,1,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(16,'4f228a0',57,25,1,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(17,'b31cd73',58,24,1,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(18,'b03028b',59,24,1,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(19,'6cd35a5',60,25,1,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(20,'554d06b',61,24,1,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(21,'ae00bab',62,24,1,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(22,'aac9c93',63,25,1,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(23,'c3ba224',64,25,1,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(24,'ca0f6b3',65,24,1,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(25,'ef64371',66,24,1,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(26,'dd0b0e2',67,24,1,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(27,'577f734',68,25,1,'2018-11-25 10:37:29','2018-11-25 10:37:29'),
	(28,'406041e',69,1,1,'2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(29,'dc583cb',70,1,1,'2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(30,'c075269',71,1,1,'2018-11-25 12:39:37','2018-11-25 12:39:37');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teacher_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teacher_permissions`;

CREATE TABLE `teacher_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT '0',
  `assignment` int(11) DEFAULT '0',
  `attendance` int(11) DEFAULT '0',
  `online_exam` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `teacher_permissions` WRITE;
/*!40000 ALTER TABLE `teacher_permissions` DISABLE KEYS */;

INSERT INTO `teacher_permissions` (`id`, `class_id`, `section_id`, `teacher_id`, `marks`, `assignment`, `attendance`, `online_exam`, `created_at`, `updated_at`)
VALUES
	(1,1,49,18,1,1,1,0,'2018-11-19 07:51:54','2018-11-20 04:38:20'),
	(2,1,49,12,0,0,0,0,'2018-11-20 04:38:15','2018-11-20 05:12:46'),
	(3,1,48,18,1,0,1,0,'2018-11-20 04:39:26','2018-11-20 04:39:27'),
	(4,15,46,15,1,1,1,0,'2018-11-20 04:41:49','2018-11-20 04:41:54'),
	(5,1,48,12,1,1,1,1,'2018-11-20 05:12:00','2018-11-20 06:33:51'),
	(6,1,48,13,0,0,0,0,'2018-11-20 11:50:29','2018-11-20 11:50:36'),
	(7,NULL,NULL,19,0,0,0,0,'2018-11-24 12:19:55','2018-11-24 12:19:55');

/*!40000 ALTER TABLE `teacher_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;

INSERT INTO `teachers` (`id`, `user_id`, `department_id`, `designation`, `school_id`, `created_at`, `updated_at`)
VALUES
	(12,14,1,'professor',1,'2018-11-15 11:47:53','2018-11-21 05:06:44'),
	(13,15,2,'professor',1,'2018-11-15 11:48:06','2018-11-21 05:06:49'),
	(14,16,1,'professor',1,'2018-11-15 11:48:12','2018-11-21 05:06:52'),
	(15,17,1,'professor',1,'2018-11-15 11:48:17','2018-11-21 05:06:56'),
	(16,33,1,'professor',1,'2018-11-19 07:47:35','2018-11-21 05:06:59'),
	(17,34,4,'professor',1,'2018-11-19 07:49:50','2018-11-21 05:07:03'),
	(18,35,6,'professor',1,'2018-11-19 07:51:54','2018-11-21 05:07:06'),
	(19,44,2,'Amet sed',1,'2018-11-24 12:19:55','2018-11-24 12:19:55');

/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `address`, `phone`, `remember_token`, `birthday`, `gender`, `blood_group`, `school_id`, `authentication_key`, `created_at`, `updated_at`)
VALUES
	(1,'Mr. Admin','admin@example.com','$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm',1,NULL,NULL,'CVL2tVLs03WDDyJijjDmeI3unpHGP0UGe2KcIqaT4XBK99XhvojZNRDU8AkZ',NULL,NULL,NULL,1,NULL,NULL,NULL),
	(14,'Oscar Padilla2','teacher@example.com','$2y$10$JPdPD6ikGWSggP/Hhlom2e3MD9aUzDcbbwN6Uk0pxIT33/1QTyYXG',3,'Culpa velit officia eaque sit','+478-85-8909980',NULL,NULL,'female','b-',NULL,NULL,'2018-11-15 11:47:53','2018-11-21 04:53:12'),
	(15,'Mili Hasan','teacher2@example.com','$2y$10$zovGAwMnDpd.bcen6Cwr/OdS.pf93Fo/MTiWLEYyMkKfmXEPwJPt.',3,'Inventore iste vel nihil praesentium in quo exercitation odit est modi recusandae Aut sunt rerum est do porro dicta','+772-78-8452846',NULL,NULL,'female','a+',NULL,NULL,'2018-11-15 11:48:06','2018-11-19 07:52:37'),
	(16,'Zachery Davis','teacher3@example.com','$2y$10$BQnpqSneg/n7Kwv8pAP2VulckrCwbDdQ6CUnPboQN0qgc4RTNwxfa',3,'Aut labore ut id enim qui fugiat assumenda soluta molestias enim et facere dolor nesciunt asperiores consequatur Quidem','+259-76-6790239',NULL,NULL,'others','a-',NULL,NULL,'2018-11-15 11:48:12','2018-11-15 11:48:12'),
	(17,'Leo Spence','teacher4@example.com','$2y$10$w8.39SzK.NsSQYcnjJvkgu1GFS7eLTcC6LWuWye/g4df6G49GrCIy',3,'Cumque et id quod expedita maiores ea consequatur commodi','+643-57-5777424',NULL,NULL,'female','b+',NULL,NULL,'2018-11-15 11:48:17','2018-11-15 11:48:17'),
	(18,'Yen Singleton','gazilof@mailinator.net','$2y$10$1ZzycstlFuS0C13EE/FC6e6npJSTslEcuBUWGSiMtgiL07DD.giuK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:20:02','2018-11-17 19:20:02'),
	(19,'Judith Crosby','nybunu@mailinator.com','$2y$10$1r.YJrt3QLhDdl3DS.Pa7.0i.lgXX2eXYWPzrarJpb7y2d7LwLo2S',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:20:35','2018-11-17 19:20:35'),
	(20,'Slade Galloway','gujubynaq@mailinator.net','$2y$10$FBlgHLXy0AsX48zXYNy/Eeslkd9dq7SHu1F7fHKDDbKtuxImuxjVS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:21:11','2018-11-17 19:21:11'),
	(21,'Admin','adminemail@example.com','$2y$10$sPWWuddfmVtonVaSfVnhJOdMS1FAuZm9BONEQpSLx7he3D3vFt98u',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:22:28','2018-11-17 19:22:28'),
	(22,'Maryam Emerson','jotyqazumi@mailinator.net','$2y$10$05Oi8dHJkOjL76zvQ7W/IOE7aPf09HPZnOhfTJ35aQxNeUOZkqDSm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:23:28','2018-11-17 19:23:28'),
	(23,'Molly Mcguire','namimanor@mailinator.net','$2y$10$bcNTIs5Q3eVjf3aPq7Mg8OEw/kk7dObF0eeoJH/D3DPOmvHPmULZe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-11-17 19:34:52','2018-11-17 19:34:52'),
	(24,'Elmo Rodriquez','gemyfaqoxy@mailinator.net','$2y$10$UH5AQCLnzBgra7W9FRkvX.HFn5/ZoTsiARZq7VL/BeZlaIG5VZDwq',4,'Labore aut aut et voluptate asperiores magnam ratione consequuntur voluptatem Provident occaecat voluptas','+234-71-1165959',NULL,NULL,'female','ab-',1,NULL,'2018-11-18 17:42:17','2018-11-18 17:42:17'),
	(25,'Odessa Rivers','kekyqe@mailinator.net','$2y$10$c9NsPEPJmJaa9mT3MVH9y.OMIr6AX99p/0kC2l.EN/0DDEVwMcEGC',4,'Nostrud quasi voluptatem provident enim dignissimos maiores qui sed maiores eligendi sint deleniti quibusdam dolores ducimus molestiae quisquam esse','+164-70-1817151',NULL,NULL,'male','a+',1,NULL,'2018-11-18 19:16:21','2018-11-18 19:16:21'),
	(28,'Kelly Saunders','nexyjikeso@mailinator.com','$2y$10$DQDd6E/LHMVE8xcp46e7uuJnjMT/.5FpwCA4qbhqZjxFKvUz1dyTa',5,'Velit ex aut magnam cillum qui porro quo et veniam minus eaque','+399-31-9902331',NULL,NULL,'female','a+',1,NULL,'2018-11-18 19:21:15','2018-11-18 19:21:15'),
	(29,'Knox Bishop','lywu@mailinator.com','$2y$10$B5F72YbXB464/Z8Gtpcvte2OUz0orruiVGRiaO6ams09iohMonPEa',5,'Deserunt pariatur Nemo rerum excepturi dolorum fugiat labore voluptas exercitationem irure eos vel sint eos facilis qui ea consectetur','+272-66-3678110',NULL,NULL,'female','a+',1,NULL,'2018-11-18 19:21:19','2018-11-18 19:21:19'),
	(32,'Sylvester Reid','mylekoxel@mailinator.com','$2y$10$ILYRA.FAgbBHVQXVVs0lZ.BmbNsLzGLEweMsuDDeC6hADflCvibby',6,'Consequuntur cum soluta dolor expedita omnis dolor voluptas numquam sunt ipsa libero','+868-89-8240384',NULL,NULL,'female','b+',1,NULL,'2018-11-18 19:31:14','2018-11-18 19:31:14'),
	(33,'Christian Solomon','teacher5@example.com','$2y$10$37uT81i2vwDFqTkSyc7xVe6McQc/RrfawWnNDP6ButLorcvRgberS',3,'Qui molestias hic necessitatibus nostrud aliqua Rerum ex labore nobis alias voluptate commodi maiores unde sunt cupiditate proident','+451-17-1271774',NULL,NULL,'female','b-',1,NULL,'2018-11-19 07:47:35','2018-11-19 07:47:35'),
	(34,'Duncan Simpson','asdasdsa@example.com','$2y$10$T6umwBevumJ/FnQw96hrrOGoefBj10CzAAoKCH8wpfk2Yd7n/Z5z6',3,'Qui sit consectetur error excepturi cillum aut facere at ut nobis nobis illo maiores sint consequatur Voluptatibus','+882-88-6861634',NULL,NULL,'others','o-',1,NULL,'2018-11-19 07:49:50','2018-11-19 07:49:50'),
	(35,'Larissa Bright','asd@example.com','$2y$10$EGCN9TTHpTSyTjsKr29fsOLw3L.0Hc9FEySpicZLoJthjb2p8l.lW',3,'Ex sed officia dolor aliquam voluptatem quo explicabo','+863-33-9865989',NULL,NULL,'female','o-',1,NULL,'2018-11-19 07:51:54','2018-11-19 07:51:54'),
	(36,'Wyoming Shaw','student@example.com','$2y$10$ul9.4Kz7JiGnNsCpvDEpie6YrEVTEL7HwHOrN6Sl9Dr/7hgDPGuRy',5,'Et est culpa placeat ducimus anim soluta officiis reprehenderit fuga Nulla amet lorem','+882-98-2545194',NULL,'1542672000','others',NULL,1,NULL,'2018-11-20 09:05:35','2018-11-20 09:05:35'),
	(37,'Darius Floyd','sup@example.com','$2y$10$9p4e1uIkJWouCMsOV38zDOyoCFKGVDwlHMw4/MqH1Pta3PQ1AQkYq',5,'Et obcaecati rem omnis quaerat nobis tempor quod quis repellendus In facilis duis','+437-45-8555475',NULL,'0','others',NULL,1,NULL,'2018-11-20 09:06:02','2018-11-20 09:06:02'),
	(38,'Nola Griffin','student2@example.com','$2y$10$QkCmZ9.abveQOBzryooctOBslOJJqPfiQIjOExuh7v7tA0bHtrm5q',5,'42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1542672000','male',NULL,1,NULL,'2018-11-20 09:46:08','2018-11-20 09:46:08'),
	(39,'Ashton Lowe','student3@example.com','$2y$10$20lpSmWGM9IQYnGeXYTyVOy3IsOxo4HWdrmgnXnAh/1ST03l2VQxq',5,'asd','asd',NULL,'1542672000','male',NULL,1,NULL,'2018-11-20 10:13:44','2018-11-20 10:13:44'),
	(40,'Keelie Romero','admiasdn@example.com','$2y$10$B7H.GBk/6jqoGgznF/Rbn.PJIvU2j0dZZgSntP7XroHIHJjV6xKS6',5,'Sapiente velit sapiente praesentium consequuntur rerum a corporis rem mollit','+312-32-7770306',NULL,'1542672000','female',NULL,1,NULL,'2018-11-20 10:31:52','2018-11-20 10:31:52'),
	(41,'Student One','student_1@example.com','$2y$10$1lBfXE0sFWIvP3y1mg49geTw0CxRXXXKzz3obi32VO7R2df3l41R.',5,'42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1542672000','male',NULL,1,NULL,'2018-11-20 10:49:25','2018-11-20 10:49:25'),
	(42,'Student Two','student_2@example.com','$2y$10$c4kVwD8jx/NbOJIq74/B..ff3DdEECNO/gqQPgootVlIz6qFDKTuW',5,'Billing Address 1\r\nBilling Address 2','7766275331',NULL,'1542672000','male',NULL,1,NULL,'2018-11-20 10:50:51','2018-11-20 10:50:51'),
	(43,'Student Three','student_3@example.com','$2y$10$6G2ah4B8xLRrNTONAFAPO.qQo96WxWpK1iZgKHFMUp6yu0z9uu2jK',5,'42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1542672000','male',NULL,1,NULL,'2018-11-20 10:53:45','2018-11-20 10:53:45'),
	(44,'Xerxes Tillman','mezir@mailinator.com','$2y$10$BdE.BFOenTetDIOjt/tsGO43wZ011ibwkszaCP9NfWZ0n9.rUJYfy',3,'Dolor debitis quasi aut eligendi porro sit illum exercitationem','+226-83-9392705',NULL,NULL,'female','b-',1,NULL,'2018-11-24 12:19:55','2018-11-24 12:19:55'),
	(45,'Studnet 123','student_123@example.com','$2y$10$0Iq8YQpOWFZOr.a4Cj0BYOYRBEI0mGwdGsOiKpoaEtL7hQlOy1qGC',5,'42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1543104000','male',NULL,1,NULL,'2018-11-25 06:48:27','2018-11-25 06:48:27'),
	(46,'Wynne Mercer','student152@example.com','$2y$10$m9HXvU/A59Q6boDTkOn4Jutub.cvSgaP2tzhavAR/HrQw014jWWb2',5,'Suscipit cumque quo et et','+836-49-4604905',NULL,'0','others',NULL,1,NULL,'2018-11-25 06:57:36','2018-11-25 06:57:36'),
	(47,'Basia Randolph','student120@example.com','$2y$10$6zTfTsCnqaO2cjPcvHWhsepZ9MNsjuXrcdLtB303YfGTkCkkkBciO',5,'Commodo anim ipsam a aut natus necessitatibus veniam qui reprehenderit','+279-75-4842196',NULL,'1543104000','male',NULL,1,NULL,'2018-11-25 07:01:13','2018-11-25 07:01:13'),
	(48,'Aileen Solis','student121@example.com','$2y$10$aF7tiYPU99mrQFQGI9pRxeeZlMLSdMo4BBSrLQqjIXHnvo4H.lgVm',5,'Perspiciatis cum nulla magna autem laborum exercitationem enim quia voluptates sit elit eius ipsum','+822-28-7214086',NULL,'1543104000','male',NULL,1,NULL,'2018-11-25 07:02:55','2018-11-25 07:02:55'),
	(49,'Inez Williamson','student122@example.com','$2y$10$kdScaAyIC5sKA8G3DTMtdOOFStOqPt4Tbh3PRvj3rAYQCE0zYo9n.',5,'Id unde placeat est voluptatem Vitae veritatis architecto nostrum velit voluptatem veritatis est sint in minima amet possimus irure quos','+363-92-4426599',NULL,'1540771200','female',NULL,1,NULL,'2018-11-25 07:07:11','2018-11-25 07:07:11'),
	(50,'Gillian Hahn','adminsad@example.com','$2y$10$SKXX7i2J0pz4vu4u.aE.TemusS4qwYk9lP6tiLSz3UxU0p.O2gO7O',5,NULL,'+571-29-5096108',NULL,NULL,'others',NULL,1,NULL,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(51,'Wade Cardenas','adminsad1@example.com','$2y$10$VEmfn5iDyF1Ygjd8C1FrvOG8G.aIkSqsPsphMSiEXpQ7Ktb.jrpqK',5,NULL,'+311-10-2496764',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(52,'Tate Franco','adminsad2@example.com','$2y$10$CY6DmzZt2pf9OKbdCoUqf.rSHG8m4xeH3a6eZgdUKKmlrhy1HykYu',5,NULL,'+432-76-5225620',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(53,'Aladdin Shepherd','adminsad3@example.com','$2y$10$OmWM8alBt5z147y898AWS.YRBwqW9n6abkWuUGyWaDUQZFUNLK1SC',5,NULL,'+389-67-9161259',NULL,NULL,'others',NULL,1,NULL,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(54,'Dawn Whitehead','adminsad4@example.com','$2y$10$PnhrBIoK2E8dYaBeGCuwG.Vd5oTGMNLMJ2.rjHV8To52lIXCR/ZnO',5,NULL,'+419-86-8848619',NULL,NULL,'others',NULL,1,NULL,'2018-11-25 10:21:30','2018-11-25 10:21:30'),
	(55,'Nola Griffin','suasdasp@example.com','$2y$10$I3GuXOIxE8FzBUmk/SD6jO5RoJBAF0fADpw8YhIEJfYBQCQLoSsGS',5,NULL,'07766275331',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:31:23','2018-11-25 10:31:23'),
	(56,'Jason Baxter','admin132123@example.com','$2y$10$9WQECdhfyaKkT8lsM3lhLuB/hG9DsgORgRP0kOVv6OhupskQQ.gqK',5,NULL,'+168-89-1868199',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(57,'Brittany York','adminasdasdasdasd@example.com','$2y$10$9RLoAvqkoODhTw0IFb1UIuvsUPs37EgLPNefFJ7Ofq255u15TISte',5,NULL,'+786-13-9444892',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(58,'Brock Jensen','admidasdasdsadn@example.com','$2y$10$2U.BDtmQj7.1L1YiYZmJGu52VZVHjbwR3TUU3Duc0Xoj2YMjzS5UO',5,NULL,'+243-91-2996382',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(59,'Nevada Walker','adasdasdasdsamin@example.com','$2y$10$tEjiVs8Ran3o/1jK1mp.vucQ4xLWR7Yb7bOHNEH0y/EToAKsRhXv.',5,NULL,'+596-93-8786712',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(60,'Kathleen Hess','adadasdsadmin@example.com','$2y$10$fPuYecEeXs4m.tFdrgKaFuLMoAMpudFyuAMKF97a1OwZdWbwb6m.a',5,NULL,'+972-61-7154378',NULL,NULL,'others',NULL,1,NULL,'2018-11-25 10:31:50','2018-11-25 10:31:50'),
	(61,'Avye Conner','admxczcxin@example.com','$2y$10$4MiiDlES/X/a1j3lq36Lqej8IO0WIwrhqlQbTXeR8SpJ/9OevF6za',5,NULL,'+685-68-5273620',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(62,'Adena Allison','adzxcmin@example.com','$2y$10$FNRWhdwpM46kVCUHT6AoGO8rtoDxd.UQpeSv5SwZUp9PumOfxBYcW',5,NULL,'+815-33-5787709',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(63,'Hector Perez','aczdmin@example.com','$2y$10$.x5Fd95u2.V6PnU5oKpXJOFO4C3XCGVl09kLHoGstZC8oyxGC19rO',5,NULL,'+381-29-1927485',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(64,'Malachi Solis','xxxxdmin@example.com','$2y$10$PJ/Fj2gWzQsItoBDNhGlTezkYv9JaWyli0R9gOCdoHOj5oWE.tT2O',5,NULL,'+467-47-6080171',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 10:32:22','2018-11-25 10:32:22'),
	(65,'Miranda Mccray','admissssn@example.com','$2y$10$mrkbg2FivwuS.XECTnvHw.wb.J/zcFbI6eNfs3WsVIw2DqDT6.GxW',5,NULL,'+626-47-8324365',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(66,'Aquila Pacheco','admasdasdsain@example.com','$2y$10$xHSOS4F4jra6FYEg7GfS0.KqpxHGnf8ktYWhNhpMc3ygVGpiTyOIS',5,NULL,'+536-34-8812541',NULL,NULL,'others',NULL,1,NULL,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(67,'Dieter Flores','aasdasddmin@example.com','$2y$10$XjFJAdInNTa1nDkjHmGIfupuKiQDg0zVPDUzhANY4fi1DQuxKZ0Pu',5,NULL,'+476-29-6305923',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:33:23','2018-11-25 10:33:23'),
	(68,'Moana Bennett','mekfhdhirguirgh@example.com','$2y$10$xGfXi7FlADN0QH4OEN0a.uwecCJuAjp7wd1L4i2HuGfgKbs6wH..C',5,NULL,'+359-87-4467671',NULL,NULL,'female',NULL,1,NULL,'2018-11-25 10:37:29','2018-11-25 10:37:29'),
	(69,'Admin2','admin2@example.com','$2y$10$AZFezKK//zc1AkVaNY4VquS9OlJBFrR6SYalEuKjuYNX3JQuWj5z6',5,NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(70,'Admin3','admin3@example.com','$2y$10$bN4lzVKdrfxpGs/GrWcFf.aRP1CNTUSz54.i7JgmmkAXC6F.6Mp/a',5,NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 12:37:47','2018-11-25 12:37:47'),
	(71,'Admin3','admin003@example.com','$2y$10$tQAJ.EdmVQmBCWTgOqWg5eQ9zz2I3AyuWEZYjQT2C/EmGyDomlQne',5,NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2018-11-25 12:39:37','2018-11-25 12:39:37');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
