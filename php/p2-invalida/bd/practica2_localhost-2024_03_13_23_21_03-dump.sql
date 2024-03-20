-- MariaDB dump 10.19-11.3.2-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: practica2
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_desc` text NOT NULL,
  `cost` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog`
--

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` VALUES
(1,'Cambio de aceite',50),
(2,'Balanceo',80),
(3,'Cambio de frenos',120);
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_vehicle` int NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vehicle` (`id_vehicle`),
  CONSTRAINT `register_ibfk_1` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_catalog` int NOT NULL,
  `id_vehicle` int NOT NULL,
  `service_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_catalog` (`id_catalog`),
  KEY `id_vehicle` (`id_vehicle`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`id_catalog`) REFERENCES `catalog` (`id`),
  CONSTRAINT `services_ibfk_2` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,1,1,'2024-03-15'),
(2,1,1,'2024-03-15'),
(3,2,2,'2024-03-16'),
(4,3,3,'2024-03-17'),
(5,1,4,'2024-03-18'),
(6,1,1,'2024-03-21');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vehicle_view`
--

DROP TABLE IF EXISTS `vehicle_view`;
/*!50001 DROP VIEW IF EXISTS `vehicle_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vehicle_view` AS SELECT
 1 AS `vehicle_id`,
  1 AS `s_id`,
  1 AS `service_date`,
  1 AS `cat_desc`,
  1 AS `cost` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(36) DEFAULT NULL,
  `brand` text NOT NULL,
  `sub_brand` text,
  `type` text NOT NULL,
  `model` text NOT NULL,
  `color` text NOT NULL,
  `capacity` int NOT NULL,
  `year` date NOT NULL,
  `origin` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES
(1,'876cdb4c-e1c2-11ee-b5af-0242ac140002','Toyota','Corolla','Sedan','2023','Red',5,'2023-01-01','Japan'),
(2,'876cddc8-e1c2-11ee-b5af-0242ac140002','Ford','Mustang','Coupe','GT','Blue',4,'2022-05-15','USA'),
(3,'876cde74-e1c2-11ee-b5af-0242ac140002','Honda','Civic','Sedan','LX','Silver',5,'2021-10-20','Japan'),
(4,'876cdec4-e1c2-11ee-b5af-0242ac140002','Chevrolet','Camaro','Coupe','SS','Black',4,'2024-02-28','USA');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `vehicle_view`
--

/*!50001 DROP VIEW IF EXISTS `vehicle_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ale`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `vehicle_view` AS select `v`.`id` AS `vehicle_id`,`s`.`id` AS `s_id`,`s`.`service_date` AS `service_date`,`c`.`cat_desc` AS `cat_desc`,`c`.`cost` AS `cost` from ((`services` `s` join `vehicles` `v` on((`s`.`id_vehicle` = `v`.`id`))) join `catalog` `c` on((`c`.`id` = `s`.`id_catalog`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-13 23:21:03
