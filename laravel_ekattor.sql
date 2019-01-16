# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.23)
# Database: laravel_ekattor
# Generation Time: 2019-01-16 20:18:32 +0000
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

LOCK TABLES `addons` WRITE;
/*!40000 ALTER TABLE `addons` DISABLE KEYS */;

INSERT INTO `addons` (`id`, `name`, `unique_identifier`, `status`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'alumni','alumni',1,1,'2019-01-14 10:16:54','2019-01-14 10:17:50');

/*!40000 ALTER TABLE `addons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table alumnis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alumnis`;

CREATE TABLE `alumnis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table book_issues
# ------------------------------------------------------------

DROP TABLE IF EXISTS `book_issues`;

CREATE TABLE `book_issues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `book_issues` WRITE;
/*!40000 ALTER TABLE `book_issues` DISABLE KEYS */;

INSERT INTO `book_issues` (`id`, `book_id`, `class_id`, `student_id`, `issue_date`, `status`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(6,9,1,1,'1547424000',1,1,'5','2019-01-14 11:27:31','2019-01-14 11:27:52'),
	(7,9,2,4,'1548374400',1,1,'5','2019-01-16 14:30:30','2019-01-16 14:31:50'),
	(9,9,1,1,'1547596800',1,1,'5','2019-01-16 14:39:00','2019-01-16 14:39:06');

/*!40000 ALTER TABLE `book_issues` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `name`, `author`, `copies`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(9,'jsp','jon doe',5,1,'5','2019-01-14 11:27:07','2019-01-14 11:27:07');

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


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


# Dump of table class_rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `class_rooms`;

CREATE TABLE `class_rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `class_rooms` WRITE;
/*!40000 ALTER TABLE `class_rooms` DISABLE KEYS */;

INSERT INTO `class_rooms` (`id`, `name`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'101',1,'2018-12-07 19:19:18','2018-12-07 19:19:23'),
	(2,'102',1,'2018-12-07 19:19:36','2018-12-07 19:19:36'),
	(4,'103',1,'2018-12-07 21:41:52','2018-12-07 21:41:52');

/*!40000 ALTER TABLE `class_rooms` ENABLE KEYS */;
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


# Dump of table daily_attendances
# ------------------------------------------------------------

DROP TABLE IF EXISTS `daily_attendances`;

CREATE TABLE `daily_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `daily_attendances` WRITE;
/*!40000 ALTER TABLE `daily_attendances` DISABLE KEYS */;

INSERT INTO `daily_attendances` (`id`, `timestamp`, `class_id`, `section_id`, `student_id`, `status`, `school_id`, `created_at`, `updated_at`)
VALUES
	(1,'1544054400',1,48,1,0,1,'2018-12-06 07:48:26','2018-12-06 10:31:08'),
	(2,'1544054400',1,48,2,0,1,'2018-12-06 07:48:26','2018-12-06 10:31:08'),
	(7,'1544140800',1,48,1,1,1,'2018-12-06 08:45:38','2018-12-06 08:45:43'),
	(8,'1544140800',1,48,2,1,1,'2018-12-06 08:45:38','2018-12-06 08:45:43'),
	(9,'1544227200',1,48,1,0,1,'2018-12-06 08:48:11','2018-12-08 11:31:08'),
	(10,'1544227200',1,48,2,1,1,'2018-12-06 08:48:11','2018-12-06 08:48:16'),
	(11,'1543622400',1,48,1,1,1,'2018-12-06 08:53:55','2018-12-06 08:53:59'),
	(12,'1543622400',1,48,2,1,1,'2018-12-06 08:53:55','2018-12-06 08:53:59'),
	(13,'0',1,48,1,NULL,1,'2018-12-06 08:54:06','2018-12-06 08:54:06'),
	(14,'0',1,48,2,NULL,1,'2018-12-06 08:54:06','2018-12-06 08:54:06'),
	(15,'1543708800',1,48,1,1,1,'2018-12-06 08:56:35','2018-12-06 08:56:39'),
	(16,'1543708800',1,48,2,1,1,'2018-12-06 08:56:35','2018-12-06 08:56:39'),
	(17,'1543795200',1,48,1,1,1,'2018-12-06 08:57:26','2018-12-06 08:57:32'),
	(18,'1543795200',1,48,2,1,1,'2018-12-06 08:57:26','2018-12-06 08:57:32'),
	(19,'1544400000',1,48,1,1,1,'2018-12-06 08:59:55','2018-12-10 07:18:30'),
	(20,'1544400000',1,48,2,1,1,'2018-12-06 08:59:55','2018-12-10 07:18:30'),
	(21,'1544659200',1,48,1,NULL,1,'2018-12-06 09:23:22','2018-12-06 09:23:22'),
	(22,'1544659200',1,48,2,NULL,1,'2018-12-06 09:23:22','2018-12-06 09:23:22'),
	(23,'1545868800',1,48,1,1,1,'2018-12-06 09:23:37','2018-12-06 09:23:40'),
	(24,'1545868800',1,48,2,1,1,'2018-12-06 09:23:37','2018-12-06 09:23:40'),
	(25,'1547424000',1,48,1,1,1,'2019-01-14 07:31:09','2019-01-14 07:31:21'),
	(26,'1547424000',1,48,2,1,1,'2019-01-14 07:31:09','2019-01-14 07:31:21'),
	(27,'1547424000',1,48,6,1,1,'2019-01-14 07:31:09','2019-01-14 07:31:21'),
	(28,'0',1,49,5,NULL,1,'2019-01-14 07:31:30','2019-01-14 07:31:30'),
	(29,'0',1,48,6,NULL,1,'2019-01-14 07:31:31','2019-01-14 07:31:31'),
	(30,'1547424000',2,23,4,NULL,1,'2019-01-14 10:32:04','2019-01-14 10:32:04'),
	(31,'1547510400',1,48,1,1,1,'2019-01-16 12:56:08','2019-01-16 12:56:12'),
	(32,'1547510400',1,48,2,1,1,'2019-01-16 12:56:08','2019-01-16 12:56:12'),
	(33,'1547510400',1,48,6,1,1,'2019-01-16 12:56:08','2019-01-16 12:56:12');

/*!40000 ALTER TABLE `daily_attendances` ENABLE KEYS */;
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
	(2,'Biology',1,'2018-11-17 10:04:03','2018-11-27 12:08:01'),
	(4,'Chemistry',1,'2018-11-17 10:11:46','2018-11-17 10:11:46'),
	(5,'Computer Science',1,'2018-11-17 10:12:08','2018-11-17 10:12:08'),
	(6,'Math',1,'2018-11-17 19:50:16','2018-11-17 19:50:25'),
	(7,'Accounting',1,'2018-12-08 11:24:04','2018-12-08 11:24:04');

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
	(1,1,1,48,1,'5','2018-12-05 07:37:59','2018-12-05 07:37:59'),
	(2,2,1,48,1,'5','2018-12-05 07:37:59','2018-12-05 07:37:59'),
	(3,3,15,46,1,'5','2019-01-08 12:17:12','2019-01-13 06:21:42'),
	(4,4,2,23,1,'5','2019-01-10 08:19:03','2019-01-10 08:19:03'),
	(5,5,1,49,1,'5','2019-01-10 08:44:18','2019-01-10 08:44:18'),
	(6,6,1,48,1,'5','2019-01-10 09:27:07','2019-01-10 09:27:07'),
	(7,7,1,49,1,'5','2019-01-14 08:25:55','2019-01-14 08:25:55'),
	(8,8,1,49,1,'5','2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(9,9,1,49,1,'5','2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(10,10,1,54,1,'5','2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(11,11,1,54,1,'5','2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(12,12,15,46,1,'5','2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(13,13,15,46,1,'5','2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(14,14,3,33,1,'5','2019-01-14 08:35:19','2019-01-14 08:35:19'),
	(15,15,3,33,1,'5','2019-01-14 08:35:19','2019-01-14 08:35:19');

/*!40000 ALTER TABLE `enrolls` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table exams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;

INSERT INTO `exams` (`id`, `name`, `starting_date`, `ending_date`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(3,'Class Two','1547596800','1548115200',1,'5','2019-01-16 14:17:18','2019-01-16 14:17:18');

/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expense_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expense_categories`;

CREATE TABLE `expense_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `expense_categories` WRITE;
/*!40000 ALTER TABLE `expense_categories` DISABLE KEYS */;

INSERT INTO `expense_categories` (`id`, `name`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(2,'Basic Expense',1,'5','2018-12-10 09:13:56','2018-12-10 09:19:15'),
	(3,'Test Expense',1,'5','2018-12-10 10:26:19','2018-12-10 10:26:19'),
	(4,'Furniture Expense',1,'5','2018-12-10 10:26:39','2018-12-10 10:26:39'),
	(6,'New',1,'5','2019-01-08 11:44:25','2019-01-08 12:01:50');

/*!40000 ALTER TABLE `expense_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expenses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expense_category_id` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;

INSERT INTO `expenses` (`id`, `expense_category_id`, `date`, `amount`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(3,2,1544400000,'560',1,'5','2018-12-10 10:15:02','2018-12-10 10:15:02'),
	(4,2,1544400000,'750',1,'5','2018-12-10 10:15:09','2018-12-10 10:15:09');

/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `grade_point` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark_upto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table invoices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci,
  `paid_amount` int(11) DEFAULT NULL,
  `status` longtext COLLATE utf8_unicode_ci,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;

INSERT INTO `invoices` (`id`, `title`, `total_amount`, `class_id`, `student_id`, `payment_method`, `paid_amount`, `status`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(1,'Creating our First Webpage',520,1,1,NULL,NULL,'unpaid',1,'5','2018-12-09 19:57:53','2018-12-09 19:57:53'),
	(2,'Installing on Mac',450,1,1,NULL,250,'unpaid',1,'5','2018-12-09 20:00:46','2018-12-09 20:00:46'),
	(3,'Test',901,1,2,NULL,100,'unpaid',1,'5','2018-12-10 04:15:50','2018-12-10 04:15:50');

/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;


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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `sort_order`, `status`, `icon`, `created_at`, `updated_at`)
VALUES
	(3,'users',NULL,0,0,1,'dripicons-user','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,'admin','',3,90,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,'student','student.index',3,10,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,'teacher','teacher.index',3,30,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,'parent','parent.index',3,50,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,'librarian','librarian.index',3,70,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'accountant','accountant.index',3,60,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(10,'driver',NULL,3,80,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,'academic',NULL,0,0,1,'dripicons-store','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(12,'class','class.index',11,40,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(13,'section',NULL,11,50,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(14,'class_room','room.index',11,60,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(15,'syllabus','syllabus.index',11,30,1,NULL,'2019-01-17 00:16:55','0000-00-00 00:00:00'),
	(16,'subject','subject.index',11,80,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(17,'class_routine','routine.index',11,20,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(18,'daily_attendance','daily_attendance.index',11,10,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(19,'noticeboard',NULL,11,110,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(20,'promotion',NULL,21,70,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(21,'exam',NULL,0,0,1,'dripicons-music','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(22,'exam','exam.index',21,20,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(23,'grades','grade.index',21,30,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(24,'marks',NULL,21,10,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(25,'tabulation_sheet',NULL,21,40,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(27,'accounting',NULL,0,0,1,'dripicons-jewel','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(28,'student_fee_manager','invoice.index',27,10,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(29,'student_fee_report',NULL,27,20,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(30,'income_expense_manager','expense.index',27,40,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(31,'back_office',NULL,0,0,1,'dripicons-cutlery','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(32,'library',NULL,31,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(33,'transport',NULL,31,0,0,NULL,'2019-01-16 20:40:26','0000-00-00 00:00:00'),
	(34,'hostel',NULL,31,0,0,NULL,'2019-01-16 20:40:29','0000-00-00 00:00:00'),
	(35,'school_website',NULL,31,0,0,NULL,'2019-01-16 20:40:32','0000-00-00 00:00:00'),
	(36,'settings',NULL,0,0,1,'dripicons-basketball','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(37,'system_settings','system.settings',36,10,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(38,'sms_settings','sms.settings',36,40,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(39,'payment_settings','payment.settings',36,20,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(40,'language_settings','language.settings',36,30,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(41,'session_manager','session_manager.index',31,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(42,'department','department.index',11,70,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(43,'admission','student.create',3,20,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(44,'addon_manager','addon_manager.index',31,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(45,'assignment',NULL,11,90,0,NULL,'2019-01-16 19:45:09','0000-00-00 00:00:00'),
	(46,'event_calender',NULL,11,100,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(47,'online_exam',NULL,21,50,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(48,'certificate',NULL,21,60,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(49,'teacher_permission','permission.index',3,40,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(50,'messaging',NULL,3,110,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(51,'role_permission','role.index',3,100,0,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(53,'form_builder',NULL,35,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(54,'book_list_manager','book.index',32,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(55,'book_issue_report','book_issue.index',32,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(57,'room_manager',NULL,34,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(58,'student_report',NULL,34,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(59,'multi_school_manager','school.index',31,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(60,'ex',NULL,NULL,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(61,'income_expense_category',NULL,NULL,0,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(62,'expense_category','expense_category.index',27,30,1,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(78,'alumni','alumni.index',3,91,1,NULL,'2019-01-01 00:00:00','2019-01-14 10:17:50');

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
	(1,'[\"5\",\"6\",\"49\",\"7\",\"9\",\"4\",\"50\",\"18\",\"17\",\"15\",\"14\",\"45\",\"46\",\"19\",\"24\",\"25\",\"47\",\"20\",\"29\",\"30\",\"54\",\"55\",\"33\",\"41\",\"44\",\"38\",\"39\",\"40\"]',NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2018-11-27 06:30:04'),
	(2,'[\"7\",\"9\",\"8\",\"4\",\"15\",\"12\",\"14\",\"42\",\"16\",\"45\",\"19\",\"48\",\"20\",\"29\",\"55\",\"57\",\"58\",\"37\",\"38\"]','[\"18\",\"17\",\"15\",\"12\",\"14\",\"42\",\"16\",\"45\",\"46\",\"19\",\"28\"]','[\"43\",\"49\",\"7\",\"8\",\"10\",\"4\",\"51\",\"50\",\"15\",\"42\",\"46\",\"24\",\"22\",\"28\",\"29\",\"33\",\"57\",\"44\",\"37\",\"38\"]','[]','[\"5\",\"37\"]','[]','[\"5\",\"43\",\"49\",\"7\",\"51\",\"17\",\"15\",\"12\",\"14\",\"45\",\"46\",\"19\",\"24\",\"23\",\"28\",\"29\",\"30\",\"55\",\"33\",\"44\"]',1,NULL,'2018-11-27 12:24:27'),
	(3,'',NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL);

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table routines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `routines`;

CREATE TABLE `routines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_hour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_hour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `starting_minute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ending_minute` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `teacher_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `routines` WRITE;
/*!40000 ALTER TABLE `routines` DISABLE KEYS */;

INSERT INTO `routines` (`id`, `class_id`, `section_id`, `subject_id`, `starting_hour`, `ending_hour`, `starting_minute`, `ending_minute`, `day`, `teacher_id`, `room_id`, `school_id`, `session`, `created_at`, `updated_at`)
VALUES
	(1,'1','48','1','10','10','5','30','friday',5,1,1,'5','2018-12-07 13:30:00','2018-12-07 13:30:00'),
	(4,'1','49','2','0','0','0','0','sunday',5,2,1,'5','2018-12-07 20:08:19','2018-12-07 20:08:19'),
	(10,'1','54','2','1','1','20','20','saturday',6,2,1,'5','2018-12-07 20:22:43','2018-12-07 20:22:43');

/*!40000 ALTER TABLE `routines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schools
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schools`;

CREATE TABLE `schools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;

INSERT INTO `schools` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Mohammadpur Govt School','2018-12-10 06:58:50','2018-12-10 06:58:50'),
	(2,'Residential Model School and College','2018-12-10 06:59:12','2018-12-10 06:59:22');

/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
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
	(54,'D',1,1,'2018-11-28 09:26:02','2018-11-28 09:26:02'),
	(55,'A',16,1,'2018-11-28 09:26:12','2018-11-28 09:26:12');

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
	(1,'2017-2018',1,0,'2018-11-15 09:39:09','2018-11-15 09:39:09'),
	(5,'2018-2020',1,0,'2018-12-10 06:02:02','2018-12-10 06:02:02');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system_name` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) DEFAULT NULL,
  `system_email` varchar(255) DEFAULT NULL,
  `selected_branch` int(11) DEFAULT NULL,
  `running_session` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `address` longtext,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `system_name`, `system_title`, `system_email`, `selected_branch`, `running_session`, `phone`, `purchase_code`, `address`, `updated_at`, `created_at`)
VALUES
	(1,'Ekattor Govt. Hight School','Ekattor Govt. Hight School','xotetocah@mailinator.com',1,'5','1234567890','12345678910','Dhaka','2019-01-16 15:33:47','2018-11-17 19:20:01');

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
	(1,'5767c70',10,16,1,'2018-12-05 07:37:59','2019-01-13 06:19:53'),
	(2,'aaadade',11,16,1,'2018-12-05 07:37:59','2018-12-05 07:37:59'),
	(3,'335af2d',18,17,1,'2019-01-08 12:17:12','2019-01-13 06:21:42'),
	(4,'c090f91',23,3,1,'2019-01-10 08:19:03','2019-01-10 08:19:03'),
	(5,'3228208',24,3,1,'2019-01-10 08:44:18','2019-01-10 08:44:18'),
	(6,'29543c2',25,15,1,'2019-01-10 09:27:07','2019-01-10 09:27:07'),
	(7,'73bf079',26,3,1,'2019-01-14 08:25:55','2019-01-14 08:25:55'),
	(8,'7987c1c',27,15,1,'2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(9,'4340d0e',28,16,1,'2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(10,'9498a6b',29,3,1,'2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(11,'26eae55',30,15,1,'2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(12,'592fe67',31,3,1,'2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(13,'987ef36',32,15,1,'2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(14,'6d26f2f',33,3,1,'2019-01-14 08:35:19','2019-01-14 08:35:19'),
	(15,'e9508db',34,15,1,'2019-01-14 08:35:19','2019-01-14 08:35:19');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subjects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;

INSERT INTO `subjects` (`id`, `name`, `school_id`, `class_id`, `session`, `created_at`, `updated_at`)
VALUES
	(3,'A Book Of Nothing',1,1,'5','2019-01-16 10:46:40','2019-01-16 10:46:40'),
	(4,'Xanthus Faulkner',1,1,'5','2019-01-16 12:57:49','2019-01-16 12:57:49'),
	(5,'Biology',1,1,'5','2019-01-16 12:58:55','2019-01-16 12:58:55');

/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table syllabuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `syllabuses`;

CREATE TABLE `syllabuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
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
	(1,1,48,5,1,1,1,0,'2018-11-28 06:25:28','2018-11-28 06:25:40'),
	(2,1,48,6,1,0,0,0,'2018-11-28 06:25:37','2019-01-13 08:38:22'),
	(3,1,48,7,0,0,1,0,'2019-01-02 10:21:12','2019-01-02 10:21:16');

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
	(5,7,5,'Ast. Prof',1,'2018-11-28 06:24:26','2018-11-28 06:36:11'),
	(6,8,2,'Proffesor',1,'2018-11-28 06:24:39','2019-01-13 08:09:54'),
	(7,12,2,'Quaerat in voluptatem',1,'2018-12-10 07:21:56','2019-01-13 08:07:57'),
	(8,13,6,'Quaerat in voluptatem',1,'2018-12-10 07:22:46','2018-12-10 07:22:46'),
	(9,14,7,'Et veniam commodi dignissimos quisquam nisi nisi laudantium pariatur Quasi in cum vitae aperiam quis eum eum consequatur distinctio Cillum',1,'2019-01-02 10:20:18','2019-01-02 10:20:18');

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
	(1,'Mr. Admin','admin@example.com','$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm','superadmin',NULL,NULL,'oUr03obNSJyLGYyMIXiwWzguUnCwyI13ypvFUHnh0scIDePznMbBFqumntWF',NULL,NULL,NULL,0,NULL,NULL,NULL),
	(3,'Scarlet Patterson','parent@example.com','$2y$10$gvCDdhUvi/0N0cKo3pWrdOyx46qzfOLCJ/6D8TkADgChDEDlI7RHm','parent','Sit quod et eiusmod asperiores consequat Rerum qui eius nesciunt quia corporis expedita exercitationem dolorem qui','+641-30-5228192','d6lkEluPfHGvkMQbixkMmbA41QNDORCEhgYpiNNtkdorUHTEyRWjTX63JlrN',NULL,'others','a-',1,NULL,'2018-11-26 10:15:26','2018-11-26 10:15:26'),
	(7,'Maite Carr','teacher1@example.com','$2y$10$59wEfxAnEukVm8vNAvCId.z3nRnI1by7Bu4k15ql./gmP9KApZtQ2','teacher','Amet quibusdam aut necessitatibus illo consectetur consequatur impedit lorem atque neque id voluptas harum maiores sequi qui laboris minus','+326-35-8982049',NULL,NULL,'others','b+',1,NULL,'2018-11-28 06:24:26','2018-11-28 06:24:26'),
	(8,'Pamela Rosa','teacher2@example.com','$2y$10$9wdGlizUMy3sw5WgfqnPROItnPGce.MESgvqmzIwblhyMm/oTHsiu','teacher','Voluptas maiores est et quae eligendi temporibus fugiat architecto dolor quia error dicta est provident atque voluptas dolore','+437-77-1377404',NULL,NULL,'female','b+',1,NULL,'2018-11-28 06:24:39','2018-11-28 06:24:39'),
	(10,'Sadek Khan','sadek@example.com','$2y$10$yjmRh4OnODFCrhdoaLRtsusSx7dpRioa4xC.JCpSNraz4TzWGbzo2','student','Dhaka Bangladesh','01921040960',NULL,'1548374400','female',NULL,1,NULL,'2018-12-05 07:37:59','2019-01-13 06:19:52'),
	(11,'Student Two','student2@exampl.eocm','$2y$10$OmLzzua3nHYTXfyiRV3s8OKu8mZM7mXrAmwzWYHd1dFZzcQJG2LD2','student',NULL,'21312',NULL,NULL,'female',NULL,1,NULL,'2018-12-05 07:37:59','2018-12-05 07:37:59'),
	(12,'Nola Griffin','nolass@example.com','$2y$10$RY5JPPeH2PBBU41KHlCem.3rP3ITczCcHIyMGpeuw/SFzVbzrafpK','teacher','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,NULL,'male','a+',1,NULL,'2018-12-10 07:21:56','2018-12-10 07:21:56'),
	(13,'Nola Griffin','susdsadsap@example.com','$2y$10$9f2ohnmciMn8vDh4EBF43u4JnrmDZJLLkRqLKlNlTdQdlVAY5oBUS','teacher','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,NULL,'male','a+',1,NULL,'2018-12-10 07:22:46','2018-12-10 07:22:46'),
	(14,'Cadman Martin','hupofid@mailinator.net','$2y$10$rwixudv2Y3chwblA2NXes.DmkV1zkxR.OZk//7Fumno3/RAUXkyPu','teacher','Reprehenderit animi iusto occaecat quos adipisicing impedit perferendis qui autem','+347-21-8407481',NULL,NULL,'others','a-',1,NULL,'2019-01-02 10:20:18','2019-01-02 10:20:18'),
	(15,'Hiroko Underwood','fydidyqe@mailinator.com','$2y$10$zwqsW99YQYpJCDWIQehcMe33V0rCZKx99TvOabbParKI0ysAuvK9i','parent','Blanditiis dolore excepturi officiis consequat Et non doloremque eiusmod hic duis dicta odit sequi pariatur Sint consectetur molestiae','+296-29-1352382',NULL,NULL,'male','ab-',1,NULL,'2019-01-02 10:35:29','2019-01-02 10:35:29'),
	(16,'Ruth Becker','ducojumafi@mailinator.net','$2y$10$TH01zLYSwqz4kSi5be6B7udSbJLu6OsSEh0Cqov0SfXgc9lzXpPw2','parent','Consequatur velit nulla occaecat eaque voluptatem deleniti sapiente laboriosam reiciendis ut tempore totam eos aut aut','+625-31-7022063',NULL,NULL,'male','ab+',1,NULL,'2019-01-03 05:59:54','2019-01-03 05:59:54'),
	(17,'Kim Howard','valikev@mailinator.com','$2y$10$UOGVM/2qB0E8pCjtIDw2BuHnOLQZ5AxM9LdkKXUh1mKbgJh6M2vOq','parent','Est perferendis praesentium nobis placeat dolorem debitis tenetur incidunt sint','+712-25-3401230',NULL,NULL,'others','ab-',1,NULL,'2019-01-03 06:24:03','2019-01-03 06:24:03'),
	(18,'Aunok Khan','aunok@example.coms','$2y$10$zbfmPeMpVI9MgcSGIvZ7Zu6xL3GQK200QzFrshpCbzro9qD3124.K','student','Uttara','985478412',NULL,'580003200','others',NULL,1,NULL,'2019-01-08 12:17:12','2019-01-13 06:21:42'),
	(19,'Kaye Jordan','fodyxoz@mailinator.com','$2y$10$JywtbBQpdeXBhSFYxLVcBOZu3VwdVErAjvFJZa/G7daIkFuxgSf3.','student','Fuga Modi tempore tempora sed quae quisquam tempore dicta','+841-61-7896240',NULL,'1547078400','female',NULL,1,NULL,'2019-01-10 08:11:38','2019-01-10 08:11:38'),
	(20,'Nola Griffin','juk@example.com','$2y$10$MDTTRZqWryTtPV7y60NtQ.8f4nfQ6en.Eyq3ALKTq0sQIAl6eCwMK','student','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1547078400','male',NULL,1,NULL,'2019-01-10 08:14:12','2019-01-10 08:14:12'),
	(21,'Nola Griffin','rere@example.com','$2y$10$SNeSRZBcIqYmFo1G6kTa5OvQfMBFIzNFK1aJKDy0eNot3dXM3jrkq','student','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1547078400','male',NULL,1,NULL,'2019-01-10 08:15:10','2019-01-10 08:15:10'),
	(22,'Test','hello@example.com','$2y$10$rU4xVljFDSOwDv20wvuneewkZgwL3sy5DMO22WpA/nHIHTloinYda','student','asd','23',NULL,'1547078400','male',NULL,1,NULL,'2019-01-10 08:17:43','2019-01-10 08:17:43'),
	(23,'Testing','jol@example.com','$2y$10$M9zjLaAjLdY1fi0RDLwNb.zrQpBCjfVMr/rjir6SZaE4J2nA5nswK','student','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1547078400','male',NULL,1,NULL,'2019-01-10 08:19:03','2019-01-10 08:19:03'),
	(24,'Mehedi Hasan','mehedi@example.com','$2y$10$C42YL1j0yJNO3EqgTalPpOyO7FyzHp5GQStRKHzRm3cnVLSiUMmSa','student','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1547510400','female',NULL,1,NULL,'2019-01-10 08:44:18','2019-01-10 08:44:18'),
	(25,'Hell Yeah','hell@example.com','$2y$10$bxP5JJNkU6W5DcmiBComo.ghDLJ5Swy9Z7JSTrBwr/9Me.djOclOO','student','42 West New Court\r\nExercitationem quasi proident eum ullamco maiores excepteur velit labore cupiditate autem provident minus eaque ad aliqua Ex','7766275331',NULL,'1547078400','male',NULL,1,NULL,'2019-01-10 09:27:07','2019-01-10 09:27:07'),
	(26,'Nayeem Hossain','nayeem@example.com','$2y$10$qC8jddb/dIwlUAUDbaAjlOzkL0Twd6ozdXLnFzkchtXaNl0Sczm1u','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:25:55','2019-01-14 08:25:55'),
	(27,'Santu Roy','san2@example.com','$2y$10$NLucJJ8weznLoUQIduouoec1w6Qsm56vSaKeH6jRje2Xt22a/y7Du','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(28,'Mehedi Morshed','mehediiit@example.com','$2y$10$RZVhPIH7Wg1OrxoRIMgJW.QCVB33710VjeJDsGwUbLnGHnr.nLSbW','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:25:56','2019-01-14 08:25:56'),
	(29,'Joyonto Roy','joy@example.com','$2y$10$fuf/uubLXiRD7Gtfl9NF/OUcDDzGqmtP88sFsIHfykp.X311ZO1Py','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(30,'Aunok Hassan','aun@example.com','$2y$10$JbFO6Fdj3lVZy.R8NGjdne3VB9plY02LzJR3NhHWmz16iSA7.xVpe','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:29:45','2019-01-14 08:29:45'),
	(31,'Ruma Begum','rumab@example.com','$2y$10$0mqIASSW3DUzD1VM0TtkH.UCMPxaiU7J5HiJrLWj8fZmwtOqwiEq2','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(32,'Ruma Hossain','rumah@example.com','$2y$10$/N9Q/lA40lQxNjmiAqsvl.DifXxc4oKagp2XHsa1Raf1AfNTyY.0S','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:31:24','2019-01-14 08:31:24'),
	(33,'John Doe','john@example.com','$2y$10$J7inZA.1tYsA7UtL6kq8c.0fC6u5SCjuo9X3OhgCSPYiYSdicVrFu','student',NULL,'1234',NULL,'0','male',NULL,1,NULL,'2019-01-14 08:35:19','2019-01-14 08:35:55'),
	(34,'Jane Doe','jane@example.com','$2y$10$9xTFrpJhgCcempl6SIGNSellCCzDeskbwRyM4pJkmnDPJCMv/022.','student',NULL,'1234',NULL,NULL,'male',NULL,1,NULL,'2019-01-14 08:35:19','2019-01-14 08:35:19');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
