DROP DATABASE IF EXISTS `pi_parking_monitor`;
CREATE DATABASE `pi_parking_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `pi_parking_monitor`;i

DROP TABLE IF EXISTS ``;
CREATE TABLE `department` (
  `id` int(5) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `department` (`id`, `name`) VALUES
(5201,	'資訊工程學系');

