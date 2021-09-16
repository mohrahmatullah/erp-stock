-- Adminer 4.8.1 MySQL 8.0.26 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `costcenter`;
CREATE TABLE `costcenter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `costcenter` (`id`, `code`, `name`) VALUES
(1,	'901',	'Pabrik'),
(2,	'902',	'Stock keeper');

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `item` (`id`, `code`) VALUES
(1,	'R011'),
(2,	'R012');

DROP TABLE IF EXISTS `item_cc`;
CREATE TABLE `item_cc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `cc` varchar(5) NOT NULL,
  `qty` int NOT NULL,
  `weight` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `item_cc` (`id`, `code`, `cc`, `qty`, `weight`) VALUES
(1,	'R011',	'901',	3,	0.5),
(2,	'R012',	'901',	6,	0.9),
(3,	'R011',	'902',	5,	0.8),
(4,	'R012',	'902',	4,	0.7);

DROP TABLE IF EXISTS `item_record`;
CREATE TABLE `item_record` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_code` varchar(5) NOT NULL,
  `cc` varchar(5) NOT NULL,
  `debitqty` int NOT NULL,
  `debitweight` float NOT NULL,
  `creditqty` int NOT NULL,
  `creditweight` float NOT NULL,
  `note` text NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `item_record` (`id`, `item_code`, `cc`, `debitqty`, `debitweight`, `creditqty`, `creditweight`, `note`, `createdate`) VALUES
(1,	'R011',	'901',	3,	0.5,	0,	0,	'Initial Stock',	'2021-09-15 08:45:57'),
(2,	'R012',	'901',	3,	0.9,	0,	0,	'Initial Stok',	'2021-09-15 08:46:35'),
(3,	'R011',	'902',	5,	0.8,	0,	0,	'Initial Stok',	'2021-09-15 08:47:22'),
(4,	'R012',	'902',	2,	0.4,	0,	0,	'Initial Stok',	'2021-09-15 08:47:51'),
(5,	'R012',	'902',	2,	0.3,	0,	0,	'Tambah Stok 2021-08-13',	'2021-09-15 08:48:24');

DROP TABLE IF EXISTS `mutation`;
CREATE TABLE `mutation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `src` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dest` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mutationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `mutation_item`;
CREATE TABLE `mutation_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mutationid` int NOT NULL,
  `itemcode` varchar(20) NOT NULL,
  `qty` int NOT NULL,
  `weight` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2021-09-15 17:25:35
