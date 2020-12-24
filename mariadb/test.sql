-- these sqls are used to initialize database and table

DROP DATABASE IF EXISTS `pi_parking_monitor`;
CREATE DATABASE `pi_parking_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `pi_parking_monitor`;
SET NAMES utf8mb4;
DROP TABLE IF EXISTS `parking_space`;
CREATE TABLE `parking_space` (
  `camera_id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lisence_plate_head` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lisence_plate_tail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`camera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `parking_space` (`camera_id`, `lisence_plate_head`, `lisence_plate_tail`, `update_time`) VALUES
('A01',	'ABC',	'1234',	'2020-12-24 06:05:55'),
('A02',	'ASD',	'7365',	NULL),
('A03',	'FJO',	'4877',	NULL),
('A04',	'DBL',	'2846',	NULL),
('A05',	'DIH',	'8493',	NULL),
('A06',	'XOI',	'D384',	NULL),
('A07',	'MXN',	'2093',	NULL),
('A08',	'VVE',	'9987',	NULL);

-- 2020-12-24 06:14:04