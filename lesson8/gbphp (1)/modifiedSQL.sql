-- MySQL dump 10.13  Distrib 8.0.13, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: gbphp2
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
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `info` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` tinyint(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'Товар 0','Тут информация о товаре 1',12,0),(2,'Товар 2','Тут информация о товаре 2',300,0),(3,'Товар 3','Много много информации о товаре. Это самый лучший в мире товар',230,0),(4,'Товар 4','Инфо о товаре 4',4560,0),(5,'Новый товар','Товар добавлен через форму',1,0),(6,'Опять новый товар','тоже создан через форму',2,0);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `typeUser` int(1) DEFAULT '0' COMMENT '0 - user 1 - admin',
  `phone` int(11) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21db9c15a75962a0865d5a39fe7fb9ff','demidielon',1,8888,'qqq'),(2,'vasya','21db9c15a75962a0865d5a39fe7fb9ff','user',0,7777,'aaaa');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zakaz`
--

DROP TABLE IF EXISTS `zakaz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `zakaz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zakaz`
--

LOCK TABLES `zakaz` WRITE;
/*!40000 ALTER TABLE `zakaz` DISABLE KEYS */;
INSERT INTO `zakaz` VALUES (1,'фыв','фыв','фыв','[{\"price\":\"300\",\"name\":\"Товар 2\",\"count\":1}]','10.10.10',-1,NULL),(2,'Фио','+85056564','Мой адрес','[{\"price\":\"300\",\"name\":\"Товар 2\",\"count\":2},{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":3}]','04.02.19',0,2),(3,'qwer','vcxzsdf','123','[{\"price\":\"200\",\"name\":\"Товар 1\",\"count\":2}]','05.02.19',0,NULL),(4,'petrov','89167777777','eee','[{\"price\":\"200\",\"name\":\"Товар 1\",\"count\":1}]','06.02.19',0,NULL),(5,'hhhhh','aaaaa','qweasdzxc','[{\"price\":\"300\",\"name\":\"Товар 2\",\"count\":4},{\"price\":\"230\",\"name\":\"Товар 3\",\"count\":4}]','06.02.19',0,2),(6,'5555','1234','\'zxcvzx\'','[{\"price\":\"4560\",\"name\":\"Товар 4\",\"count\":5}]','06.02.19',-1,NULL),(7,'ivanov','11111','asdfzxcv','[{\"price\":\"200\",\"name\":\"Товар 1\",\"count\":1}]','06.02.19',-1,NULL),(8,'sidorov','9999','zzzzzzzz','[{\"price\":\"4560\",\"name\":\"Товар 4\",\"count\":5}]','11.1.10',1,NULL),(9,'kuzkina','555','mat','[{\"price\":\"200\",\"name\":\"Товар 1\",\"count\":3},{\"price\":\"4560\",\"name\":\"Товар 4\",\"count\":3}]','08.02.19',1,NULL);
/*!40000 ALTER TABLE `zakaz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-10 23:13:44
