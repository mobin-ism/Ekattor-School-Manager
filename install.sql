# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: laravel_ekattor
# Generation Time: 2018-11-26 19:29:52 +0000
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



# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `displayed_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `sort_order`, `status`, `icon`)
VALUES
	(3,'users',NULL,0,0,1,'dripicons-user'),
	(4,'admin',NULL,3,90,1,NULL),
	(5,'student','student.index',3,10,1,NULL),
	(6,'teacher','teacher.index',3,30,1,NULL),
	(7,'parent','parent.index',3,50,1,NULL),
	(8,'librarian','librarian.index',3,70,1,NULL),
	(9,'accountant','accountant.index',3,60,1,NULL),
	(10,'driver',NULL,3,80,1,NULL),
	(11,'academic',NULL,0,0,1,'dripicons-store'),
	(12,'class','class.index',11,40,1,NULL),
	(13,'section',NULL,11,50,0,NULL),
	(14,'class_room',NULL,11,60,1,NULL),
	(15,'syllabus',NULL,11,30,1,NULL),
	(16,'subject',NULL,11,80,1,NULL),
	(17,'class_routine',NULL,11,20,1,NULL),
	(18,'daily_attendance',NULL,11,10,1,NULL),
	(19,'noticeboard',NULL,11,110,1,NULL),
	(20,'promotion',NULL,21,70,1,NULL),
	(21,'exam',NULL,0,0,1,'dripicons-music'),
	(22,'exam',NULL,21,20,1,NULL),
	(23,'grades',NULL,21,30,1,NULL),
	(24,'marks',NULL,21,10,1,NULL),
	(25,'tabulation_sheet',NULL,21,40,1,NULL),
	(27,'accounting',NULL,0,0,1,'dripicons-jewel'),
	(28,'student_fee_manager',NULL,27,10,1,NULL),
	(29,'student_fee_report',NULL,27,20,1,NULL),
	(30,'income_expense_manager',NULL,27,30,1,NULL),
	(31,'back_office',NULL,0,0,1,'dripicons-cutlery'),
	(32,'library',NULL,31,0,1,NULL),
	(33,'transport',NULL,31,0,1,NULL),
	(34,'hostel',NULL,31,0,1,NULL),
	(35,'school_website',NULL,31,0,1,NULL),
	(36,'settings',NULL,0,0,1,'dripicons-basketball'),
	(37,'system_settings',NULL,36,0,1,NULL),
	(38,'sms_settings',NULL,36,0,1,NULL),
	(39,'payment_settings',NULL,36,0,1,NULL),
	(40,'language_settings',NULL,36,0,1,NULL),
	(41,'session_manager','session_manager.index',31,0,1,NULL),
	(42,'department','department.index',11,70,1,NULL),
	(43,'admission','student.create',3,20,1,NULL),
	(44,'addon_manager','addon_manager.index',31,0,1,NULL),
	(45,'assignment',NULL,11,90,1,NULL),
	(46,'event_calender',NULL,11,100,1,NULL),
	(47,'online_exam',NULL,21,50,1,NULL),
	(48,'certificate',NULL,21,60,1,NULL),
	(49,'teacher_permission',NULL,3,40,1,NULL),
	(50,'messaging',NULL,3,110,1,NULL),
	(51,'role_permission','role.index',3,100,1,NULL),
	(53,'form_builder',NULL,35,0,1,NULL),
	(54,'book_list_manager','',32,0,1,NULL),
	(55,'book_issue_report',NULL,32,0,1,NULL),
	(56,NULL,NULL,NULL,0,1,NULL),
	(57,'room_manager',NULL,34,0,1,NULL),
	(58,'student_report',NULL,34,0,1,NULL);

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
  `admin` longtext COLLATE utf8_unicode_ci,
  `teacher` longtext COLLATE utf8_unicode_ci,
  `student` longtext COLLATE utf8_unicode_ci,
  `parent` longtext COLLATE utf8_unicode_ci,
  `accountant` longtext COLLATE utf8_unicode_ci,
  `librarian` longtext COLLATE utf8_unicode_ci,
  `driver` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `admin`, `teacher`, `student`, `parent`, `accountant`, `librarian`, `driver`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL),
	(2,'[\"6\",\"49\",\"7\",\"8\",\"10\",\"17\",\"12\",\"42\",\"16\",\"45\",\"46\",\"25\",\"20\",\"28\",\"54\",\"33\",\"57\",\"58\",\"53\",\"37\",\"39\"]','[\"5\",\"6\",\"49\",\"7\",\"9\",\"8\",\"4\",\"18\",\"17\",\"15\",\"12\",\"14\",\"42\",\"45\",\"19\",\"22\",\"48\",\"20\",\"28\",\"29\",\"30\",\"54\",\"55\",\"33\",\"57\",\"41\",\"37\",\"38\"]',NULL,NULL,NULL,NULL,'[\"5\",\"43\",\"49\",\"7\",\"51\",\"17\",\"15\",\"12\",\"14\",\"45\",\"46\",\"19\",\"24\",\"23\",\"28\",\"29\",\"30\",\"55\",\"33\",\"44\"]',1,NULL,'2018-11-26 19:29:29'),
	(3,'',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL);

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
	(1,NULL,NULL,1,0,0,0,0,'2018-11-26 10:14:55','2018-11-26 10:14:55');

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
	(1,2,2,'Asst. Prof',1,'2018-11-26 10:14:55','2018-11-26 10:14:55');

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
	(1,'Mr. Admin','admin@example.com','$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm','admin',NULL,NULL,'anhSffyK3rQDSx6hOcMwcer460mbt9KuCOdAvOctHf7FMx4YmVJDpaBvvbWc',NULL,NULL,NULL,1,NULL,NULL,NULL),
	(2,'Mark Ferguson','teacher@example.com','$2y$10$4//MLOsxSXaeGRySQW0pJ.Ft5DczW.rbuqzAImoGTIitCQzyXQVMC','teacher','Magni laborum Veniam provident autem deserunt est ducimus ullam sapiente ullamco et vel distinctio Vitae consequat Facilis','+968-39-3692547',NULL,NULL,'female','a-',1,NULL,'2018-11-26 10:14:55','2018-11-26 10:14:55'),
	(3,'Scarlet Patterson','parent@example.com','$2y$10$5oiVJTRIpYk/hDL9m2TZG.XXg6en2Tl3IbnlpY5mWnaoFmCcFsaei','parent','Sit quod et eiusmod asperiores consequat Rerum qui eius nesciunt quia corporis expedita exercitationem dolorem qui','+641-30-5228192',NULL,NULL,'others','a-',1,NULL,'2018-11-26 10:15:26','2018-11-26 10:15:26');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
