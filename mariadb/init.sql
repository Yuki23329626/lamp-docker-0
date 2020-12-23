-- 初始化 mariadb database 使用的 sql

DROP DATABASE IF EXISTS `pi_parking_monitor`;
CREATE DATABASE `pi_parking_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `pi_parking_monitor`;

DROP TABLE IF EXISTS `parking_space`;
CREATE TABLE `parking_space` (
  `camera_id` int(5) NOT NULL,
  `lisence_plate` text COLLATE utf8mb4_unicode_ci ,
  PRIMARY KEY (`camera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `parking_space` (`camera_id`, `lisence_plate`) VALUES
(1,	'ABC1234'),
(2,	'ASD7365'),
(3,	'FJO4877'),
(4,	'DBL2846'),
(5,	'DIH8493'),
(6,	'XOID384'),
(7,	'MXN2093'),
(8,	'VVE9987');
