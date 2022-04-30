CREATE DATABASE  IF NOT EXISTS `espacozendb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `espacozendb`;
-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: espacozendb
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `privgroup`
--

DROP TABLE IF EXISTS `privgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `privgroup` (
  `privID` int NOT NULL AUTO_INCREMENT,
  `privname` varchar(45) NOT NULL,
  PRIMARY KEY (`privID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privgroup`
--

LOCK TABLES `privgroup` WRITE;
/*!40000 ALTER TABLE `privgroup` DISABLE KEYS */;
INSERT INTO `privgroup` VALUES (1,'Administrador'),(2,'Proprietaria'),(3,'Funcionário(a)'),(4,'Fornecedor(a)'),(5,'Cliente');
/*!40000 ALTER TABLE `privgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `servicesID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `imgPath` text NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`servicesID`),
  UNIQUE KEY `servicesID_UNIQUE` (`servicesID`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (59,'Terapia Capilar',100,'_img-service/62608726e6ba6.jpg','A terapia capilar é um tratamento clínico que age diretamente contra a quebra de cabelo, com o objetivo de deixar os fios mais fortes e bem nutridos. Muitos fatores podem prejudicar a saúde e a beleza dos cabelos, e esse tratamento age tanto para evitar quanto para melhorar o quadro de diversas patologias capilares.'),(60,'Cronogramas',100,'_img-service/6260876f1fcf0.jpg','O cronograma capilar é uma rotina de cuidados capilares que possui três etapas essenciais para manter as madeixas sempre saudáveis. Isso porque cada uma delas promove um cuidado específico e, juntas, dão aos fios todo o cuidado que eles precisam.'),(61,'Mechas e Colorimetria',100,'_img-service/626087b0722df.jpg','A colorimetria capilar nada mais é do que uma ciência que se dedica ao estudo das cores das modificações que podem ser realizadas por meio de procedimentos químicos ou outros agentes'),(62,'Químicas em geral',100,'_img-service/626087dbabeb8.jpg','pinturas no cabelo'),(63,'Corte feminino e infantil',100,'_img-service/626087fe943b1.jpg','Cortes belissimos'),(64,'Sobrancelhas',100,'_img-service/6260884eded60.jpg','suas sobrancelhas sempre bem cuidadas'),(65,'Cílios',100,'_img-service/6260886a92fca.jpg','alongamento de cilios'),(66,'Depilação',100,'_img-service/62608881bc2ce.jpg','depilação em geral');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cellphone` varchar(45) NOT NULL,
  `privileges` int DEFAULT '5',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `cellphone_UNIQUE` (`cellphone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Diego M. Gouveia','diego.pel@hotmail.coml','991623404',1),(2,'Diego Malta','diego','Diego Malta Gouveia','diego.wqwqpel@hotmail.com','12diego@gmaIL.com',3),(3,'teste','teste','teste','3876812@hoyajdj','3232323',5),(4,'didi','21232f297a57a5a743894a0e4a801fc3','diego','8173918@gmail','116546546',4),(5,'teste1','e959088c6049f1104c84c9bde5560a13','DIEGO MALTA GOUVEIA','631623404','dddiego.pel@hotmail.com',5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'espacozendb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20 19:31:49
