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
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `galleryID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photoPath` varchar(505) NOT NULL,
  PRIMARY KEY (`galleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (6,'Unhas em gel','HAHAHAHAHA','_img-gallery/627eef88c70c3.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pricetosell` float NOT NULL,
  `pricetobuy` float DEFAULT NULL,
  `imgPath` varchar(255) NOT NULL,
  `description` varchar(505) NOT NULL COMMENT 'text\n\n',
  `stock` int NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (25,'produto',40,6,'_img-product/626d398d2ff3f.jpg','descrição do produto',2),(27,'café expresso',1.5,1,'_img-product/627eedef76adf.png','Xícara de café expresso',50),(28,'Agua mineral',2.5,2,'_img-product/627eede2e856c.jpg','Garrafa 600ml de água mineral com gás',50);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (59,'Terapia Capilar',100,'_img-service/6265cc2b36c8e.jpg','A terapia capilar é um tratamento clínico que age diretamente contra a quebra de cabelo, com o objetivo de deixar os fios mais fortes e bem nutridos. Muitos fatores podem prejudicar a saúde e a beleza dos cabelos, e esse tratamento age tanto para evitar quanto para melhorar o quadro de diversas patologias capilares.'),(61,'Mechas e Colorimetria',100,'_img-service/626087b0722df.jpg','A colorimetria capilar nada mais é do que uma ciência que se dedica ao estudo das cores das modificações que podem ser realizadas por meio de procedimentos químicos ou outros agentes'),(62,'Químicas em geral',100,'_img-service/626087dbabeb8.jpg','pinturas no cabelo'),(63,'Corte feminino e infantil',100,'_img-service/626087fe943b1.jpg','Cortes belissimos'),(64,'Sobrancelhas',100,'_img-service/6260884eded60.jpg','suas sobrancelhas sempre bem cuidadas'),(65,'Cílios',100,'_img-service/6260886a92fca.jpg','alongamento de cilios'),(77,'Cronogramas',50,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(78,'Depilação',70,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(79,'Unhas',85,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(80,'Maquiagem',65,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(81,'Drenagem linfática',150,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(82,'Microagulhamento',95,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(83,'Peeling químico',240,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. ');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_cart` (
  `shopID` int NOT NULL AUTO_INCREMENT,
  `shopType` varchar(40) NOT NULL,
  `storeID` varchar(10) NOT NULL,
  `itemID` varchar(255) NOT NULL,
  `itemName` varchar(255) DEFAULT NULL,
  `shopQtd` int DEFAULT NULL,
  `shopPrice` float NOT NULL,
  `time_sale` datetime NOT NULL,
  PRIMARY KEY (`shopID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (1,'service','1','61','Mechas e Colorimetria',1,100,'2022-05-14 20:13:16'),(2,'product','1','27','café expresso',1,1.5,'2022-05-14 20:14:30'),(3,'product','1','27','café expresso',3,4.5,'2022-05-14 20:16:05');
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store` (
  `storeID` int NOT NULL AUTO_INCREMENT,
  `operatorID` int NOT NULL,
  `openTime` datetime NOT NULL,
  `closeTime` datetime DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `coupon` varchar(15) DEFAULT NULL,
  `cpfClient` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`storeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,1,'2022-05-14 20:07:47','2022-05-14 20:16:51',106,'XT4G-F7J3','02220028089');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Diego M. Gouveia','diego.pel@hotmail.coml','991623404',1),(2,'Diego Malta','diego','Diego Malta Gouveia','diego.wqwqpel@hotmail.com','53991999999',5),(3,'teste','teste','testadores','3876812@hoyajdj','53991623333',5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'espacozendb'
--

--
-- Dumping routines for database 'espacozendb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-15  1:00:02
