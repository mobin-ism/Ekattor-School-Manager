# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: laravel_ekattor
# Generation Time: 2018-11-13 12:16:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `parent`, `status`, `icon`)
VALUES
	(1,'navigation',0,1,NULL),
	(2,'dashboard',1,1,NULL),
	(3,'users',0,1,NULL),
	(4,'admin',3,1,NULL),
	(5,'student',3,1,NULL),
	(6,'teacher',3,1,NULL),
	(7,'parent',3,1,NULL),
	(8,'librarian',3,1,NULL),
	(9,'accountant',3,1,NULL),
	(10,'driver',3,1,NULL),
	(11,'academic',0,1,NULL),
	(12,'class',11,1,NULL),
	(13,'section',11,1,NULL),
	(14,'class_room',11,1,NULL),
	(15,'syllabus',11,1,NULL),
	(16,'subject',11,1,NULL),
	(17,'class_routine',11,1,NULL),
	(18,'daily_attendance',11,1,NULL),
	(19,'noticeboard',11,1,NULL),
	(20,'student_promotion',11,1,NULL),
	(21,'exam',0,1,NULL),
	(22,'exam_list',21,1,NULL),
	(23,'exam_grades',21,1,NULL),
	(24,'marks',21,1,NULL),
	(25,'tabulation_sheet',21,1,NULL),
	(26,'send_sms',21,1,NULL),
	(27,'accounts',0,1,NULL),
	(28,'create_fee',27,1,NULL),
	(29,'fee_report',27,1,NULL),
	(30,'staff_payroll',27,1,NULL),
	(31,'back_office',0,1,NULL),
	(32,'library',31,1,NULL),
	(33,'transport',31,1,NULL),
	(34,'hostel',31,1,NULL),
	(35,'school_website',31,1,NULL),
	(36,'settings',0,1,NULL),
	(37,'system_settings',36,1,NULL),
	(38,'sms_settings',36,1,NULL),
	(39,'payment_settings',36,1,NULL),
	(40,'language_settings',36,1,NULL),
	(41,'session_manager',31,1,NULL);

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


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `name`, `school_id`, `status`, `updated_at`, `created_at`)
VALUES
	(52,'2017-2020',1,0,'2018-11-13 01:26:39','2018-11-13 01:26:39');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `role`, `address`, `phone`, `remember_token`)
VALUES
	(1,'Admin','admin@example.com','$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm',NULL,NULL,NULL,NULL,NULL,'mj8HGJVcpfKotodiFf6Z1dVLbZ25QqTp8ZCE5DLw1QA7l5rfPkFKGnNcU5a6');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
