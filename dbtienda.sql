/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `dbtienda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbtienda`;

CREATE TABLE IF NOT EXISTS `tproductos` (
  `codprod` int(11) NOT NULL,
  `descprod` varchar(50) NOT NULL,
  `pvprod` float NOT NULL,
  `codprov` int(11) DEFAULT NULL,
  PRIMARY KEY (`codprod`),
  KEY `FK_tproductos_tproveedor` (`codprov`),
  CONSTRAINT `FK_tproductos_tproveedor` FOREIGN KEY (`codprov`) REFERENCES `tproveedor` (`codprov`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELETE FROM `tproductos`;
/*!40000 ALTER TABLE `tproductos` DISABLE KEYS */;
INSERT INTO `tproductos` (`codprod`, `descprod`, `pvprod`, `codprov`) VALUES
	(206, 'PRODUCTO 1', 60, 2),
	(208, 'PRODUCTO 2', 120, 3),
	(503, 'PRODUCTO 7', 250, 2),
	(602, 'PRODUCTO 5', 50, 1),
	(750, 'PRODUCTO 4', 90, 2),
	(906, 'PRODUCTO 6', 200, 3),
	(985, 'PRODUCTO 3', 121, 1);
/*!40000 ALTER TABLE `tproductos` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tproveedor` (
  `codprov` int(11) NOT NULL,
  `razon` varchar(50) NOT NULL,
  `capital` float NOT NULL,
  PRIMARY KEY (`codprov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELETE FROM `tproveedor`;
/*!40000 ALTER TABLE `tproveedor` DISABLE KEYS */;
INSERT INTO `tproveedor` (`codprov`, `razon`, `capital`) VALUES
	(1, 'UNEXPO', 5000000),
	(2, 'IUTA', 150000),
	(3, 'INCE', 604200);
/*!40000 ALTER TABLE `tproveedor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
