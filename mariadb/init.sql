-- these sqls are used to initialize database and table

DROP DATABASE IF EXISTS `pi_parking_monitor`;
CREATE DATABASE `pi_parking_monitor` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `pi_parking_monitor`;
DROP TABLE IF EXISTS `parking_space`;
CREATE TABLE `parking_space` (
  `camera_id` VARCHAR(10) NOT NULL ,
  `lisence_plate` text COLLATE utf8mb4_unicode_ci ,
  PRIMARY KEY (`camera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `parking_space` (`camera_id`, `lisence_plate`) VALUES
('A01',	'ABC1234'),
('A02',	'ASD7365'),
('A03',	'FJO4877'),
('A04',	'DBL2846'),
('A05',	'DIH8493'),
('A06',	'XOID384'),
('A07',	'MXN2093'),
('A08',	'VVE9987');
