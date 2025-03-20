-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.9.8-MariaDB-1:10.9.8+maria~ubu2204 - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for NetMedicaTest
CREATE DATABASE IF NOT EXISTS `NetMedicaTest` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `NetMedicaTest`;

-- Dumping structure for table NetMedicaTest.progetti
DROP TABLE IF EXISTS `progetti`;
CREATE TABLE IF NOT EXISTS `progetti` (
  `id_progetto` int(11) NOT NULL AUTO_INCREMENT,
  `progetto` varchar(255) NOT NULL,
  `performance` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_progetto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table NetMedicaTest.progetti: ~9 rows (approximately)
INSERT INTO `progetti` (`id_progetto`, `progetto`, `performance`, `img`) VALUES
	(1, 'Diabete Mellito', 70, 'img/diabete.jpg'),
	(2, 'Ipertensione arteriosa', 34, 'img/pressione.jpg'),
	(3, 'Bpco', 26, 'img/bpco.jpg'),
	(4, 'Asma', 80, 'img/asma.jpg'),
	(5, 'Analisi Spesa farmaceutica', 12, 'img/spesa.jpg'),
	(6, 'Vaccinazione Antiinfluenzale', 36, 'img/vaccinazione.jpg'),
	(7, 'Screening Mammografie', 55, 'img/screening.jpg'),
	(8, 'Audit di ingresso', 81, 'img/audit.jpg'),
	(9, 'Analisi Visite', 23, 'img/visite.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
