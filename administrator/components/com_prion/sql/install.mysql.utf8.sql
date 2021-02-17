CREATE TABLE IF NOT EXISTS `#__prion_categories` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL DEFAULT '',
	`alias` varchar(300) NOT NULL DEFAULT '',
	`published` tinyint(1) NOT NULL DEFAULT 0,
	`checked_out` int(10) unsigned NOT NULL DEFAULT 0,
	`checked_out_time` datetime,
	`ordering` int(11) NOT NULL DEFAULT 0,
	`access` int(10) unsigned NOT NULL DEFAULT 0,
	`language` varchar(7) NOT NULL DEFAULT '*',
	`created` datetime NOT NULL,
	`created_by` int(10) unsigned NOT NULL DEFAULT 0,
	`modified` datetime NOT NULL,
	`modified_by` int(10) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci;