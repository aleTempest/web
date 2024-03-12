-- MariaDB dump 10.19-11.3.2-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: unidad2
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
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `id_career` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_career`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES
(1,'ITI'),
(3,'MECA'),
(8,'ISA'),
(9,'LAYGE'),
(11,'MANU');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `student_subject_score_view`
--

DROP TABLE IF EXISTS `student_subject_score_view`;
/*!50001 DROP VIEW IF EXISTS `student_subject_score_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `student_subject_score_view` AS SELECT
 1 AS `id`,
  1 AS `id_subject`,
  1 AS `subject_name`,
  1 AS `score_id`,
  1 AS `score` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_career` int DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `enrollment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CAREER` (`id_career`),
  CONSTRAINT `FK_CAREER` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES
(2,1,'ale','yo','test',21),
(10,8,'asdasd','yea','asdas',18),
(11,3,'aa','asies','e',2),
(12,NULL,'test','test','test',1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `students_career_view`
--

DROP TABLE IF EXISTS `students_career_view`;
/*!50001 DROP VIEW IF EXISTS `students_career_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `students_career_view` AS SELECT
 1 AS `id`,
  1 AS `id_career`,
  1 AS `name`,
  1 AS `enrollment`,
  1 AS `email`,
  1 AS `age`,
  1 AS `career_name` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id_subject` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES
(1,'Matemáticas para Ing. 1'),
(2,'Matemáticas para Ing. 2'),
(3,'Algebra'),
(4,'Física'),
(5,'Física para Ing.'),
(6,'Funciones Matemáticas'),
(7,'Base de datos'),
(8,'Programación Web');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_career`
--

DROP TABLE IF EXISTS `subject_career`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_career` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_subject` int NOT NULL,
  `id_career` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_subject` (`id_subject`),
  KEY `id_career` (`id_career`),
  CONSTRAINT `subject_career_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id_subject`),
  CONSTRAINT `subject_career_ibfk_2` FOREIGN KEY (`id_career`) REFERENCES `careers` (`id_career`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_career`
--

LOCK TABLES `subject_career` WRITE;
/*!40000 ALTER TABLE `subject_career` DISABLE KEYS */;
INSERT INTO `subject_career` VALUES
(81,1,1),
(82,1,3),
(83,1,8),
(84,1,11),
(85,2,1),
(86,2,3),
(87,2,8),
(88,2,11),
(89,3,1),
(90,3,3),
(91,3,8),
(92,3,11),
(93,4,1),
(94,4,3),
(95,4,8),
(96,4,11),
(97,5,1),
(98,5,3),
(99,5,8),
(100,5,11),
(101,6,1),
(102,6,3),
(103,6,8),
(104,6,11),
(105,8,1);
/*!40000 ALTER TABLE `subject_career` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `subject_career_view`
--

DROP TABLE IF EXISTS `subject_career_view`;
/*!50001 DROP VIEW IF EXISTS `subject_career_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `subject_career_view` AS SELECT
 1 AS `id_subject`,
  1 AS `subject_name`,
  1 AS `id_career`,
  1 AS `career_name` */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `subject_student`
--

DROP TABLE IF EXISTS `subject_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_subject_career` int NOT NULL,
  `id_student` int NOT NULL,
  `score` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`id_subject_career`,`id_student`),
  KEY `id_student` (`id_student`),
  CONSTRAINT `subject_student_ibfk_1` FOREIGN KEY (`id_subject_career`) REFERENCES `subject_career` (`id`),
  CONSTRAINT `subject_student_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_student`
--

LOCK TABLES `subject_student` WRITE;
/*!40000 ALTER TABLE `subject_student` DISABLE KEYS */;
INSERT INTO `subject_student` VALUES
(6,82,10,5),
(7,83,11,8),
(8,84,12,7),
(14,85,2,10),
(15,89,2,10),
(16,93,2,10);
/*!40000 ALTER TABLE `subject_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `student_subject_score_view`
--

/*!50001 DROP VIEW IF EXISTS `student_subject_score_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `student_subject_score_view` AS select `st`.`id` AS `id`,`s`.`id_subject` AS `id_subject`,`s`.`subject_name` AS `subject_name`,`ss`.`id` AS `score_id`,`ss`.`score` AS `score` from (((`subject` `s` join `subject_career` `sc` on((`s`.`id_subject` = `sc`.`id_subject`))) join `subject_student` `ss` on((`ss`.`id_subject_career` = `sc`.`id`))) join `students` `st` on((`ss`.`id_student` = `st`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `students_career_view`
--

/*!50001 DROP VIEW IF EXISTS `students_career_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`ale`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `students_career_view` AS select `s`.`id` AS `id`,`s`.`id_career` AS `id_career`,`s`.`name` AS `name`,`s`.`enrollment` AS `enrollment`,`s`.`email` AS `email`,`s`.`age` AS `age`,`c`.`name` AS `career_name` from (`students` `s` join `careers` `c`) where (`s`.`id_career` = `c`.`id_career`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `subject_career_view`
--

/*!50001 DROP VIEW IF EXISTS `subject_career_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `subject_career_view` AS select `S`.`id_subject` AS `id_subject`,`S`.`subject_name` AS `subject_name`,`C`.`id_career` AS `id_career`,`C`.`name` AS `career_name` from ((`subject` `S` join `subject_career` `SC` on((`S`.`id_subject` = `SC`.`id_subject`))) join `careers` `C` on((`SC`.`id_career` = `C`.`id_career`))) */;
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

-- Dump completed on 2024-03-10 23:46:17
