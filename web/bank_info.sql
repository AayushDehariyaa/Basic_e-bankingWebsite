-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bank
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info` (
  `ID` int NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Age` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `CurrentBal` varchar(45) NOT NULL,
  `MobileNo` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` VALUES (1,'Aayush','21','aayushdehariya30@gmail.com','3106000','9406813974','telephone colony indore'),(2,'Aayushi','20','aayushi123@gmail.com','1336648','9425461234','geeta bhawn'),(3,'Shobhit','19','Shobhitsharma@gmail.com','2905979','8989501212','mr 10 indore'),(4,'Jay ','25','jay69@gmail.com','2418564','9425921123','usha nagar indore'),(5,'nisha','21 ','nisha121@gmail.com','1233423','6261795823','bapat sq indore'),(6,'Tanushee','18','tanushree69@gmail.com','1112345','9424314456','sunshine apt indore'),(7,'Avni verma','20','avni22@gmail.com','2134546','9492313529','satyasai sq Indore'),(8,'Vansh Yadav','24','vansh441@gmail.com','1324532','6262784213','vijay nagar Indore'),(9,'jigyasa singh','22','jigyasasingh1@gmail.com','2134543','9926156423','agrawal colony Indore'),(10,'Tapsee','26','tapsee311@gmail.com','4312667','8281567821','Sudama nagar Indore');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-08 17:09:32
