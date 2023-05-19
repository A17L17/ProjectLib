-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mylib
CREATE DATABASE IF NOT EXISTS `mylib` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mylib`;

-- Dumping structure for table mylib.book
CREATE TABLE IF NOT EXISTS `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publisher_year` varchar(4) DEFAULT NULL,
  `id_publisher` int DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_publisher` (`id_publisher`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.book: ~8 rows (approximately)
INSERT INTO `book` (`id`, `title`, `author`, `publisher_year`, `id_publisher`, `id_category`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'nama buku', 'Barra Al givari', '2017', 3, 2, 7, NULL, '2023-05-19 01:18:55', '2023-05-19 01:18:55'),
	(5, 'Mononake', 'Barra', '2013', 2, 2, 7, '2023-05-16 04:21:51', '2023-05-17 02:07:06', '2023-05-17 02:07:06'),
	(6, 'Mononake', 'Alvi', '2013', 2, 2, 4, '2023-05-16 04:37:06', '2023-05-16 05:12:28', '2023-05-16 05:12:28'),
	(7, 'Mononake', 'Zidan Al Givari', '2013', 2, 2, 11, '2023-05-16 04:37:28', '2023-05-19 01:19:03', '2023-05-19 01:19:03'),
	(8, 'T Y P', 'Alvi', '2011', 2, 2, 1, '2023-05-16 04:51:30', '2023-05-16 04:51:43', NULL),
	(9, 'JoSe', 'Jose nee Da', '1980', 2, 2, 7, '2023-05-16 05:09:04', '2023-05-16 05:09:23', NULL),
	(10, '로직으로', '경우 사용한다', '2017', 5, 1, 1, '2023-05-17 04:35:36', '2023-05-17 04:35:36', NULL),
	(11, 'Seni Bersikap Bodo Amat', 'Anisa', '2011', 6, 3, 2, '2023-05-19 01:19:47', '2023-05-19 01:19:47', NULL);

-- Dumping structure for table mylib.borrow
CREATE TABLE IF NOT EXISTS `borrow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_borrower` int DEFAULT NULL,
  `id_book` int DEFAULT NULL,
  `id_staff` int DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_borrower` (`id_borrower`),
  KEY `id_book` (`id_book`),
  KEY `id_staff` (`id_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.borrow: ~8 rows (approximately)
INSERT INTO `borrow` (`id`, `id_borrower`, `id_book`, `id_staff`, `release_date`, `due_date`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 7, 1, '0000-00-00', '0000-00-00', '1212', '2023-05-17 02:38:53', '2023-05-17 02:43:10', '2023-05-17 02:43:10'),
	(2, 1, 1, 1, '0000-00-00', '0000-00-00', '8123123', '2023-05-17 02:49:26', '2023-05-17 02:50:40', '2023-05-17 02:50:40'),
	(3, 2, 7, 1, '0000-00-00', '0000-00-00', '123', '2023-05-17 02:53:41', '2023-05-17 02:54:26', '2023-05-17 02:54:26'),
	(4, 1, 8, 2, '2023-05-17', '2023-05-17', 'thanks', '2023-05-17 02:55:24', '2023-05-17 02:56:59', '2023-05-17 02:56:59'),
	(5, 2, 7, 1, '2023-05-17', '2023-05-17', 'thanks', '2023-05-17 02:57:19', '2023-05-17 03:00:02', '2023-05-17 03:00:02'),
	(6, 1, 8, 2, '2023-05-17', '2023-05-09', 'xxx', '2023-05-17 02:57:34', '2023-05-17 03:00:00', '2023-05-17 03:00:00'),
	(7, 2, 9, 2, '2023-05-26', '2023-05-31', 'xxx', '2023-05-17 03:00:47', '2023-05-17 03:17:11', '2023-05-17 03:17:11'),
	(8, 2, 7, 2, '2023-05-04', '2023-05-18', 'xxx', '2023-05-17 03:16:41', '2023-05-17 03:17:13', '2023-05-17 03:17:13'),
	(9, 5, 10, 6, '2023-05-17', '2023-05-17', 'Selesai Pinjam', '2023-05-17 04:39:13', '2023-05-19 04:13:10', NULL),
	(10, 5, 10, 6, '2023-05-17', '2023-05-27', 'Selesai Pinjam', '2023-05-17 04:47:39', '2023-05-19 04:22:41', NULL),
	(11, 6, 11, 9, '2023-05-27', '2023-05-30', 'Selesai Pinjam', '2023-05-19 03:41:43', '2023-05-19 04:09:57', NULL),
	(12, 5, 8, 8, '2023-05-20', '2023-05-20', 'Selesai Pinjam', '2023-05-19 04:23:49', '2023-05-19 04:26:56', '2023-05-19 04:26:56');

-- Dumping structure for table mylib.borrower
CREATE TABLE IF NOT EXISTS `borrower` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.borrower: ~5 rows (approximately)
INSERT INTO `borrower` (`id`, `name`, `birthdate`, `address`, `gender`, `contact`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'alvi', '2023-05-16', 'KB.Bekasi', 'L', '088220793107', 'vvv767676767@gmail.com', '2023-05-16 05:05:03', '2023-05-16 05:05:03', NULL),
	(2, 'barra', '2023-05-15', 'KB.Bandung', 'P', '088220793107', 'barra@mail.com', '2023-05-15 06:24:43', '2023-05-16 05:02:37', NULL),
	(3, 'barra', '2023-05-16', 'KB.Bekasi', 'P', '088220793107', 'zidan@gmail.com', '2023-05-16 05:07:22', '2023-05-16 05:07:36', '2023-05-16 05:07:36'),
	(4, 'ccc', '2023-05-16', 'KB.Bekasi', 'L', '088220793107', 'ccc@gmail.com', '2023-05-16 05:20:23', '2023-05-16 05:20:42', '2023-05-16 05:20:42'),
	(5, 'Linda', '2023-05-27', 'KB.Bekasi', 'P', '088220793107', 'linda@gmial.com', '2023-05-17 04:36:15', '2023-05-17 04:36:31', NULL),
	(6, 'Anisa', '2023-05-19', 'DKI JAKARTA', 'P', '082218725337', 'anisa@gmial.com', '2023-05-19 01:20:37', '2023-05-19 01:20:37', NULL);

-- Dumping structure for table mylib.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.category: ~8 rows (approximately)
INSERT INTO `category` (`id`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Novel', NULL, '2023-05-15 04:19:29', NULL),
	(2, 'Hororr', '2023-05-15 04:23:49', '2023-05-15 04:23:49', NULL),
	(3, 'Romants', '2023-05-16 04:23:33', '2023-05-16 04:23:33', NULL),
	(4, 'Mistery', '2023-05-16 04:24:04', '2023-05-16 04:24:04', NULL),
	(5, 'Drama', '2023-05-16 04:24:14', '2023-05-16 04:24:14', NULL),
	(6, 'Education', '2023-05-16 04:24:37', '2023-05-16 04:24:37', NULL),
	(7, 'Literatury', '2023-05-16 04:24:53', '2023-05-16 04:24:53', NULL),
	(8, 'Typographpy', '2023-05-16 04:25:08', '2023-05-16 04:25:08', NULL),
	(9, 'Fantasy', '2023-05-17 04:31:33', '2023-05-17 04:31:33', NULL);

-- Dumping structure for table mylib.publisher
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.publisher: ~7 rows (approximately)
INSERT INTO `publisher` (`id`, `name`, `address`, `contact`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Barra', 'KB.Garut', '081213189030', NULL, '2023-05-19 01:16:39', '2023-05-19 01:16:39'),
	(2, 'Bali', 'KB.Bekasi', '088220793107', '2023-05-15 04:40:20', '2023-05-19 01:17:40', '2023-05-19 01:17:40'),
	(3, 'Johan', 'KB.Bandung', '088220793107', '2023-05-15 04:41:08', '2023-05-15 04:41:19', '2023-05-15 04:41:19'),
	(4, 'PT.ANIME', 'KB.Bekasi', '088220793107', '2023-05-16 04:18:03', '2023-05-16 04:18:03', NULL),
	(5, 'CAFE24 로직으로', 'South Korea', '0889127653', '2023-05-17 04:34:17', '2023-05-17 04:34:17', NULL),
	(6, 'Anisa', 'DKI JAKARTA', '082218725337', '2023-05-19 01:17:32', '2023-05-19 01:18:40', NULL),
	(7, 'Milan', 'DKI JAKARTA', '088220793107', '2023-05-19 01:17:33', '2023-05-19 01:17:49', '2023-05-19 01:17:49');

-- Dumping structure for table mylib.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mylib.staff: ~6 rows (approximately)
INSERT INTO `staff` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'barra', 'barra@mail.com', 'f1c1592588411002af340cbaedd6fc33', NULL, NULL, NULL),
	(2, 'ccc', 'bbb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-05-15 02:48:33', NULL),
	(3, 'alvi', 'alvi@gmail.com', 'f379eaf3c831b04de153469d1bec345e', NULL, NULL, NULL),
	(4, 'kkk', 'kkk@gmail.com', 'f379eaf3c831b04de153469d1bec345e', NULL, '2023-05-16 05:21:36', '2023-05-16 05:21:36'),
	(5, 'Zidan', 'zidan@gmail.com', 'f379eaf3c831b04de153469d1bec345e', '2023-05-16 05:21:29', '2023-05-19 01:16:14', '2023-05-19 01:16:14'),
	(6, 'Linda', 'linda@gmial.com', 'f379eaf3c831b04de153469d1bec345e', '2023-05-17 04:31:06', '2023-05-17 04:31:06', NULL),
	(7, 'Ica', 'ica@gmial.com', 'f379eaf3c831b04de153469d1bec345e', '2023-05-19 02:55:11', '2023-05-19 02:55:11', NULL),
	(8, 'Dinda', 'dinda@gmial.com', 'f379eaf3c831b04de153469d1bec345e', '2023-05-19 02:58:00', '2023-05-19 02:58:00', NULL),
	(9, 'Anisa', 'anisa@gmial.com', 'f379eaf3c831b04de153469d1bec345e', '2023-05-19 03:40:50', '2023-05-19 03:40:50', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
