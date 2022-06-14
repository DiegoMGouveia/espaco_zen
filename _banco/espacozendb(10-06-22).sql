-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: espacozendb
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `couponID` int NOT NULL AUTO_INCREMENT,
  `coupon` varchar(9) NOT NULL,
  `discount` int NOT NULL,
  `dateTime` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(5) DEFAULT 'novo',
  PRIMARY KEY (`couponID`),
  UNIQUE KEY `coupon_UNIQUE` (`coupon`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (23,'6Y0I-27FS',30,'2022-05-24 14:38:18','Sorteio Instagram','usado'),(24,'G8NV-ERRC',25,'2022-05-24 15:32:25','Sorteio Instagram','usado'),(25,'A9ER-NUDJ',25,'2022-05-24 15:33:18','Sorteio Instagram','usado'),(26,'XDAN-PQ4J',25,'2022-05-24 15:34:32','Sorteio Instagram','usado'),(27,'VJYP-2IR8',25,'2022-05-24 15:35:32','Sorteio Instagram','usado'),(28,'T4ON-6GCV',27,'2022-05-29 01:29:43','presente LinkedIn','usado');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `galleryID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `photoPath` varchar(505) NOT NULL,
  PRIMARY KEY (`galleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (6,'Unhas em gel','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.','_img-gallery/627eef88c70c3.jpg'),(7,'Titutlo 1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.','_img-gallery/62807d43e593b.jpg'),(9,'Titutlo 3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.','_img-gallery/62807d691293f.jpg'),(10,'Cabelo de Ouro','bla bla bla bla bla bla bla','_img-gallery/628eb652c1dc8.jpg'),(11,'Cabelo de Ouro','bla bla bla bla bla bla bla','_img-gallery/628eb6dc0d969.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privgroup`
--

DROP TABLE IF EXISTS `privgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `privgroup` (
  `privID` int NOT NULL AUTO_INCREMENT,
  `privname` varchar(45) NOT NULL,
  PRIMARY KEY (`privID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pricetosell` float NOT NULL,
  `pricetobuy` float DEFAULT NULL,
  `imgPath` varchar(255) NOT NULL,
  `description` varchar(505) NOT NULL COMMENT 'text\n\n',
  `stock` int NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `servicesID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `imgPath` text NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`servicesID`),
  UNIQUE KEY `servicesID_UNIQUE` (`servicesID`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (59,'Terapia Capilar',100,'_img-service/6265cc2b36c8e.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.'),(61,'Mechas e Colorimetria',100,'_img-service/626087b0722df.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.'),(64,'Sobrancelhas',100,'_img-service/6260884eded60.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.'),(65,'Cílios',100,'_img-service/6260886a92fca.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim.'),(78,'Depilação',70,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(79,'Unhas',85,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(80,'Maquiagem',65,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(81,'Drenagem linfática',150,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(82,'Microagulhamento',95,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. '),(83,'Peeling químico',240,'_imgs/noimg.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet scelerisque sem vel accumsan. Donec mollis enim tellus, a venenatis diam hendrerit sed. Aenean egestas hendrerit dignissim. ');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (1,'service','1','61','Mechas e Colorimetria',1,100,'2022-05-14 20:13:16'),(2,'product','1','27','café expresso',1,1.5,'2022-05-14 20:14:30'),(3,'product','1','27','café expresso',3,4.5,'2022-05-14 20:16:05'),(6,'service','3','61','Mechas e Colorimetria',1,100,'2022-05-16 00:54:43'),(10,'service','4','59','Terapia Capilar',1,100,'2022-05-16 01:09:49'),(17,'product','3','27','café expresso',1,1.5,'2022-05-18 04:01:00'),(18,'product','3','27','café expresso',1,1.5,'2022-05-18 04:01:48'),(19,'product','3','27','café expresso',1,1.5,'2022-05-18 04:02:10'),(20,'product','3','27','café expresso',1,1.5,'2022-05-18 04:02:22'),(21,'product','3','27','café expresso',1,1.5,'2022-05-18 04:02:30'),(22,'product','3','27','café expresso',1,1.5,'2022-05-18 04:03:07'),(23,'service','6','59','Terapia Capilar',1,100,'2022-05-18 15:01:19'),(24,'service','6','61','Mechas e Colorimetria',1,100,'2022-05-18 15:01:37'),(25,'product','7','27','café expresso',1,1.5,'2022-05-19 14:30:57'),(26,'service','7','80','Maquiagem',1,65,'2022-05-19 14:31:25'),(27,'service','3','64','Sobrancelhas',1,100,'2022-05-24 00:53:31'),(28,'service','3','64','Sobrancelhas',1,100,'2022-05-24 00:54:13'),(29,'service','8','59','Terapia Capilar',1,100,'2022-05-24 14:26:08'),(30,'product','8','27','café expresso',1,1.5,'2022-05-24 14:26:25'),(31,'product','8','27','café expresso',1,1.5,'2022-05-24 14:30:09'),(32,'product','8','27','café expresso',1,1.5,'2022-05-24 14:31:56'),(33,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:40:09'),(34,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:24'),(35,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:32'),(36,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:33'),(37,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:33'),(38,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:33'),(39,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:34'),(40,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:34'),(41,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:34'),(42,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:34'),(43,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:34'),(44,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:35'),(45,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:35'),(46,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:35'),(47,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:35'),(48,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:35'),(49,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(50,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(51,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(52,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(53,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(54,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(55,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:41:36'),(56,'service','7','62','Químicas em geral',1,100,'2022-05-24 16:43:57'),(58,'product','9','27','café expresso',1,1.5,'2022-05-29 01:26:21'),(59,'service','9','63','Corte feminino e infantil',1,100,'2022-05-29 01:28:23');
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `storeID` int NOT NULL AUTO_INCREMENT,
  `operatorID` int NOT NULL,
  `openTime` datetime NOT NULL,
  `closeTime` datetime DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `coupon` varchar(15) DEFAULT NULL,
  `cpfClient` varchar(14) DEFAULT NULL,
  `totalDiscontPrice` float DEFAULT '0',
  PRIMARY KEY (`storeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (1,1,'2022-05-14 20:07:47','2022-05-25 21:29:34',106,'6Y0I-27FS','02220028089',NULL),(3,1,'2022-05-16 00:54:30','2022-05-26 16:08:32',309,'G8NV-ERRC','78175149094',231.75),(4,1,'2022-05-16 01:08:55','2022-05-24 15:34:22',100,'A9ER-NUDJ','85806230066',NULL),(6,1,'2022-05-18 15:00:54','2022-05-24 15:35:40',200,'XDAN-PQ4J','02220028089',NULL),(7,1,'2022-05-19 14:30:24','2022-05-24 16:44:34',2466.5,'VJYP-2IR8','02220028089',NULL),(8,1,'2022-05-23 01:30:43','2022-05-24 14:34:41',104.5,NULL,'02220028089',NULL),(9,1,'2022-05-29 01:22:53','2022-05-29 01:32:48',101.5,'T4ON-6GCV','95737070042',74.095);
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cellphone` varchar(45) NOT NULL,
  `privileges` int DEFAULT '5',
  `cpf` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `cellphone_UNIQUE` (`cellphone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','Diego M. Gouveia','diego.pel@hotmail.coml','991623404',1,NULL),(2,'Diego Malta','diego','Diego Malta Gouveia','diego.wqwqpel@hotmail.com','53991999991',5,NULL),(49,'kabal','1723889b0c32ea3a1257b7661d48692b','Diego Malta Gouveia','diego.pel2@hotmail.com','991623444',5,NULL),(50,'diego','078c007bd92ddec308ae2f5115c1775d','Diego Malta Gouveia','kabal23@kabal.com','539999999299',5,NULL),(51,'dgsfds','078c007bd92ddec308ae2f5115c1775d','Diego Malta Gouveia','kabal222@kabal.com','53999992399',5,NULL),(54,'admin12','21232f297a57a5a743894a0e4a801fc3','Diego Malta Gouveia','didiego.pel@hotmail.com','991674654',5,NULL),(56,'admin523','21232f297a57a5a743894a0e4a801fc3','Diego Malta Gouveia','kabal233@kabal.com','53999999229',5,'02220028089');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-10 16:19:14
