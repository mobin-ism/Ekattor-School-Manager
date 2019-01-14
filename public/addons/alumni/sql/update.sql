DROP TABLE IF EXISTS `alumni`;

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

INSERT INTO `menus` (`id`, `displayed_name`, `route_name`, `parent`, `sort_order`, `status`, `icon`, `created_at`, `updated_at`) VALUES (NULL, 'alumni', 'alumni.index', '3', '91', '0', NULL, '2019-01-01 00:00:00', '2019-01-01 00:00:00');
