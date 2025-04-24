-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for coffeebrew
CREATE DATABASE IF NOT EXISTS `coffeebrew` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8_czech_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `coffeebrew`;

-- Dumping structure for table coffeebrew.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'example@gmail.com', '1234567');

-- Dumping structure for table coffeebrew.emai_sent_status
CREATE TABLE IF NOT EXISTS `emai_sent_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.emai_sent_status: ~2 rows (approximately)
INSERT INTO `emai_sent_status` (`id`, `type`) VALUES
	(1, 'Not Sent'),
	(2, 'Sent');

-- Dumping structure for table coffeebrew.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `menu_status_id` int NOT NULL,
  `menu_type_id` int NOT NULL,
  `menu_rating_top_id` int NOT NULL,
  `img_path` varchar(150) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_menu_status1_idx` (`menu_status_id`),
  KEY `fk_menu_menu_type1_idx` (`menu_type_id`),
  KEY `fk_menu_menu_rating_top1_idx` (`menu_rating_top_id`),
  CONSTRAINT `fk_menu_menu_rating_top1` FOREIGN KEY (`menu_rating_top_id`) REFERENCES `menu_rating_top` (`id`),
  CONSTRAINT `fk_menu_menu_status1` FOREIGN KEY (`menu_status_id`) REFERENCES `menu_status` (`id`),
  CONSTRAINT `fk_menu_menu_type1` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.menu: ~8 rows (approximately)
INSERT INTO `menu` (`id`, `name`, `price`, `description`, `menu_status_id`, `menu_type_id`, `menu_rating_top_id`, `img_path`) VALUES
	(1, 'Pancake', 500, 'delesios', 1, 1, 1, 'img/menu/Pancake_68030e2877bba.png'),
	(2, 'Espresso', 600, 'Drink', 1, 2, 1, 'img/menu/Espresso_680338f24dd0f.jpeg'),
	(3, 'Americano', 600, 'Drink', 1, 2, 2, 'img/menu/Americano_6803393829b0a.jpeg'),
	(4, 'Latte', 700, 'Drink', 1, 2, 2, 'img/menu/Latte_6803397fe8f21.jpeg'),
	(5, 'Mocha', 550, 'Drink', 1, 2, 2, 'img/menu/mocha_680339bc2f187.jpeg'),
	(6, 'Croissants', 200, 'Food', 1, 1, 1, 'img/menu/Croissants_680339f40fe5c.jpeg'),
	(7, 'Chocolate Lava Cake', 800, 'Molten Lava Cake', 1, 1, 1, 'img/menu/Chocolate Lava Cake_68033a3f4b8f7.jpeg'),
	(8, 'Red Velvet', 500, 'Red Velvet Molten Lava Cakes For Two', 1, 1, 1, 'img/menu/Red Velvet_68033aae45dce.jpeg');

-- Dumping structure for table coffeebrew.menu_rating_top
CREATE TABLE IF NOT EXISTS `menu_rating_top` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rate_type` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.menu_rating_top: ~2 rows (approximately)
INSERT INTO `menu_rating_top` (`id`, `rate_type`) VALUES
	(1, 'rated'),
	(2, 'notrated');

-- Dumping structure for table coffeebrew.menu_status
CREATE TABLE IF NOT EXISTS `menu_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.menu_status: ~2 rows (approximately)
INSERT INTO `menu_status` (`id`, `type`) VALUES
	(1, 'Available'),
	(2, 'Unavailable');

-- Dumping structure for table coffeebrew.menu_type
CREATE TABLE IF NOT EXISTS `menu_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.menu_type: ~2 rows (approximately)
INSERT INTO `menu_type` (`id`, `type`) VALUES
	(1, 'food'),
	(2, 'beverages');

-- Dumping structure for table coffeebrew.reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `message` text COLLATE utf8_czech_ci,
  `table` int NOT NULL,
  `email_sent_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_email_status_idx` (`email_sent_status_id`) USING BTREE,
  KEY `FK_reservation_user` (`user_id`),
  CONSTRAINT `FK_reservation_emai_sent_status` FOREIGN KEY (`email_sent_status_id`) REFERENCES `emai_sent_status` (`id`),
  CONSTRAINT `FK_reservation_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.reservation: ~1 rows (approximately)
INSERT INTO `reservation` (`id`, `user_id`, `date_time`, `message`, `table`, `email_sent_status_id`) VALUES
	(1, 1, '2025-04-11 13:00:00', NULL, 1, 2);

-- Dumping structure for table coffeebrew.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) COLLATE utf8_czech_ci NOT NULL,
  `lname` varchar(25) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_czech_ci;

-- Dumping data for table coffeebrew.user: ~1 rows (approximately)
INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `mobile`) VALUES
	(1, 'Sachitha', 'Athukorala', 'sachithasamodhya@gmail.com', '0703110084');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
