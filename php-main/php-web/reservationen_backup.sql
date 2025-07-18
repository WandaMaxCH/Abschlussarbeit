-- MySQL dump 10.13  Distrib 8.3.0, for Win64 (x86_64)
--
-- Host: localhost    Database: reservationen
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `reservationen`
--

DROP TABLE IF EXISTS `reservationen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservationen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Datum` date NOT NULL,
  `Von` time NOT NULL,
  `Bis` time NOT NULL,
  `Zimmer` tinyint(3) NOT NULL,
  `Bemerkung` varchar(200) NOT NULL,
  `Teilnehmer` text NOT NULL,
  `Private_Key` varchar(8) NOT NULL,
  `Public_Key` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `check_Zimmer_valid` CHECK (`Zimmer` in (101,102,103,104,105))
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservationen`
--

LOCK TABLES `reservationen` WRITE;
/*!40000 ALTER TABLE `reservationen` DISABLE KEYS */;
INSERT INTO `reservationen` VALUES (1,'2025-07-04','12:21:00','16:11:00',102,'uvzhuvhzuv','Eleni adnrakaki','xmfRBRsl','1JIR1o9c'),(2,'2025-07-25','12:12:00','12:12:00',103,'32rd2d23','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','itRob4kY','UMoQU7AY'),(3,'2025-06-29','12:12:00','05:43:00',102,'gccugfc','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','jvociuzK','eekbdvGW'),(6,'2025-06-29','13:23:00','12:12:00',104,'dwqwsfdv','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','Wu0erXtg','CV4g3sNd'),(7,'2025-06-29','13:23:00','12:12:00',104,'dwqwsfdv','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','VjSidk1a','B2N2worU'),(8,'2025-06-29','13:23:00','12:12:00',104,'dwqwsfdv','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','4fuOEtNq','2RiSCBjf'),(9,'2025-07-24','23:23:00','02:24:00',104,'2efwf','Eleni adnrakaki, Anton Salazar, Anastaia Ouelettte','FZliuGQi','TgDgAmGo');
/*!40000 ALTER TABLE `reservationen` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-03 10:57:17
