
USE `pi_parking_monitor`;
DROP TABLE IF EXISTS `parking_space`;
CREATE TABLE `parking_space` (
  `camera_id` CHAR(10) NOT NULL ,
  `lisence_plate_head` text COLLATE utf8mb4_unicode_ci ,
  `lisence_plate_tail` text COLLATE utf8mb4_unicode_ci ,
  PRIMARY KEY (`camera_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
