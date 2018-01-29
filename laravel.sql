CREATE DATABASE  IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `blog`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produced_on` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (41,'xcxcx','xcxs','2018-01-16','2018-01-15 21:49:18','2018-01-15 21:49:18'),(43,'ssdsd','dddd','2018-01-16','2018-01-15 21:50:31','2018-01-15 21:50:31'),(44,'d','sd','2018-01-16','2018-01-15 21:50:44','2018-01-15 21:50:44'),(48,'sdsdsd','xcxc','2018-01-16','2018-01-15 21:53:34','2018-01-15 21:53:34'),(49,'xcxc','s','2018-01-16','2018-01-15 21:54:25','2018-01-15 21:54:25'),(51,'sd','asd','2018-01-16','2018-01-15 22:05:43','2018-01-15 22:05:43'),(52,'d','a','2018-01-16','2018-01-15 22:23:25','2018-01-15 22:23:25'),(53,'sadsad','sdsd','2018-01-16','2018-01-15 22:31:52','2018-01-15 22:31:52'),(58,'s','s','2018-01-16','2018-01-15 22:55:36','2018-01-15 22:55:36'),(60,'asdasd','asdasdasd','2018-01-16','2018-01-15 23:06:32','2018-01-15 23:06:32'),(61,'d','d','2018-01-16','2018-01-15 23:06:39','2018-01-15 23:06:39'),(62,'asd','ds','2018-01-24','2018-01-15 23:08:21','2018-01-15 23:53:03'),(63,'dfdf','asd','2018-01-04','2018-01-15 23:39:21','2018-01-15 23:57:17'),(64,'asdsad','sad','2018-01-11','2018-01-15 23:58:00','2018-01-15 23:58:00'),(65,'asdasdsad','asd','2018-01-16','2018-01-15 23:58:42','2018-01-15 23:58:42'),(67,'latrest','d','2018-01-26','2018-01-16 00:01:34','2018-01-16 00:01:34'),(68,'sd','a','2018-01-26','2018-01-16 00:01:56','2018-01-16 00:01:56'),(69,'asd','d','2018-01-17','2018-01-16 00:02:08','2018-01-16 00:02:08'),(70,'last','d','2018-01-11','2018-01-16 00:05:51','2018-01-16 00:05:51'),(72,'sadsad','d','2018-01-17','2018-01-16 00:10:17','2018-01-16 00:10:17'),(73,'asd','a','2018-01-03','2018-01-16 00:10:27','2018-01-16 00:10:27'),(74,'latest','latest','2018-01-18','2018-01-16 00:11:17','2018-01-16 00:11:17'),(75,'x','x','2018-01-03','2018-01-16 00:12:48','2018-01-16 00:12:48'),(76,'sad','d','2018-01-10','2018-01-16 00:13:28','2018-01-16 00:13:28'),(79,'d','d','2018-01-09','2018-01-16 00:15:16','2018-01-16 00:15:16'),(81,'latest','asdsa','2018-01-10','2018-01-16 00:20:42','2018-01-16 00:20:42'),(84,'dasd','a','2018-01-17','2018-01-16 02:49:24','2018-01-16 02:49:24'),(85,'asdddd','f','2018-01-10','2018-01-16 17:10:17','2018-01-16 17:10:17'),(86,'xc','xc','2018-01-18','2018-01-16 17:11:52','2018-01-16 17:11:52'),(87,'asdsad','asd','2018-01-16','2018-01-16 19:23:02','2018-01-16 19:23:02'),(88,'asd','d','2018-01-04','2018-01-17 00:28:27','2018-01-17 00:28:27');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `token` text,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (9,'aw@as.com','$2y$10$z4caV8e1ozA8bwHknoi/Me7x5ybUWJW.4C7swO1RzfDE/LU9lOTz6','2018-01-17 01:15:49'),(19,'marapaotim@gmail.com','$2y$10$mwCU3pTBga9YWFlsELIBcOFgAoswImkS8754oa1CiyGBB5.ioXQom','2018-01-17 01:56:16');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tim Marapao','marapaotim@gmail.com','$2y$10$Jj7Ph7QUcfMx6MOcOhhewO3dSwRlFWlljTyxMbfpFyjplyWQyisJ2','IH9Ewp2ft2WeG6X0Ovxqw5Zp3M2O4hc1oKY6YGSCdyoa0E0n2CxwwXalsJju','2018-01-16 22:57:13','2018-01-16 22:57:13'),(2,'sadasd','aw@as.com','$2y$10$xCOnOtToIGfu5kjoMHdvGervDLS.W50BN7QhhLpm.M2TfxcfI1lYO','giKjYLRZB2PbJLbIKbVOWSQt1xcofYVeAzb3CNwDYgh5xDHgVx5khMKcdW8y','2018-01-17 00:10:42','2018-01-17 00:10:42'),(3,'asdasdasd','asd@asdasd.com','$2y$10$fcaduOs0VURBCnakKvrk9.wXM9Y.F1tEeSAnmGs0Kr/H1Hfytd9Au','5uA7vybM2PCteWoFralKpN49FqLM8TPNiouOSQxNI5CCNwLi5mWLvIp2ec8e','2018-01-17 00:57:12','2018-01-17 00:57:12');
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

-- Dump completed on 2018-01-29 13:08:59
