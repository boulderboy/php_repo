-- MySQL dump 10.13  Distrib 8.0.13, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: brand
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company-reviews`
--

DROP TABLE IF EXISTS `company-reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `company-reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user-name` varchar(45) NOT NULL,
  `review-text` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company-reviews`
--

LOCK TABLES `company-reviews` WRITE;
/*!40000 ALTER TABLE `company-reviews` DISABLE KEYS */;
INSERT INTO `company-reviews` VALUES (4,'Петя','Мне не очень нравится ваша компания, потому что сайт не очень'),(5,'Коля','Мне совсем не нравится ваша компания, но надеюсь другим понравится'),(6,'Роман','Очень все понравилось, буду пользоваться еще'),(21,'Петя','Сработает или нет?'),(28,'Andrew','Hello world!');
/*!40000 ALTER TABLE `company-reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `path-to-img` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `rating` tinyint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'MANGO PEOPLE T-SHIRT','img/cat-1.jpg',100,NULL,1),(2,'MANGO PEOPLE T-SHIRT','img/cat-2.jpg',200,NULL,2),(3,'MANGO PEOPLE T-SHIRT','img/cat-3.jpg',300,NULL,3),(4,'MANGO PEOPLE T-SHIRT','img/cat-4.jpg',150,NULL,4),(5,'MANGO PEOPLE T-SHIRT','img/cat-5.jpg',250,NULL,5),(6,'MANGO PEOPLE T-SHIRT','img/cat-6.jpg',350,NULL,1),(7,'MANGO PEOPLE T-SHIRT','img/cat-7.jpg',400,NULL,2),(8,'MANGO PEOPLE T-SHIRT','img/cat-8.jpg',450,NULL,3),(9,'MANGO PEOPLE T-SHIRT','img/cat-9.jpg',500,NULL,0);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `cart` varchar(500) NOT NULL,
  `date` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'admin','asdasd',''),(3,'admin','{\"3\":{\"quantity\":6,\"price\":\"300\"},\"1\":{\"quantity\":3,\"price\":\"100\"}}','03.02.19'),(4,'admin','{\"3\":{\"quantity\":6,\"price\":\"300\"},\"1\":{\"quantity\":3,\"price\":\"100\"}}','03.02.19'),(5,'admin','{\"3\":{\"quantity\":6,\"price\":\"300\"},\"1\":{\"quantity\":3,\"price\":\"100\"}}','03.02.19'),(6,'admin','{\"2\":{\"quantity\":2,\"price\":\"200\"},\"1\":{\"quantity\":1,\"price\":\"100\"},\"3\":{\"quantity\":1,\"price\":\"300\"}}','03.02.19');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `admin` varchar(45) NOT NULL,
  `cookie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','1',NULL),(2,'user','ee11cbb19052e40b07aac0ca060c23ee','0',NULL);
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

-- Dump completed on 2019-02-03 18:01:28
