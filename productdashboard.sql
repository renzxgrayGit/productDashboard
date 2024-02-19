CREATE DATABASE  IF NOT EXISTS `productdashboard` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `productdashboard`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: productdashboard
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `inventory_count` int DEFAULT NULL,
  `quantity_sold` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'V88 T-shirt',100,100,8.99,'V88 T-shirt limited edition','2024-02-19 02:05:00','2024-02-19 05:24:07'),(2,'V88 Cap',100,60,4.49,'V88 Cap','2024-02-19 02:05:00','2024-02-19 03:33:00'),(3,'V88 Towel',50,50,1.49,'V88 Towel','2024-02-19 02:05:00','2024-02-19 03:34:00'),(4,'V88 Keychain',20,70,0.99,'V88 Keychain','2024-02-19 02:05:00','2024-02-19 03:35:00'),(5,'V88 Mug',50,NULL,1.59,'V88 Mug','2024-02-19 02:28:00','2024-02-19 04:43:26'),(6,'V88 Wristband',100,NULL,0.89,'V88 Wristband','2024-02-19 02:30:00','2024-02-19 04:41:31');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_level` int DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'renz','cabajar','renz@gmail.com',9,'b9950fc8f95a7acb8decdf392e8dd112','a3160d7c9ed8329409eb7373df72efad29c732e33a39','2024-02-19 12:18:00','2024-02-19 12:18:00'),(2,'zoe','cruz','zoe@gmail.com',1,'920f9ba593cd685c659c2757ca0aa62a','ac8eeef6f5ac73ea1207e88b17c103bf6b79c19e41fb','2024-02-19 12:18:00','2024-02-19 12:18:00'),(3,'amy','chris','amy@gmail.com',1,'9425e7c28154343dc4aeec6050eeb65b','b67712d457005ca2c7481e0a2993f259eb6c99bb45f8','2024-02-19 12:24:00','2024-02-19 12:24:00'),(4,'mulag','zacah','mulag@gmail.com',1,'5f97dc2fd79b114d55831f8b3a250148','1d597b1e101794c98b6476b2b11ac624696cc04c3a8d','2024-02-19 02:05:00','2024-02-19 02:05:00'),(5,'aws','daw','aws@gmail.com',1,'19b7afeb314088aa7fc0b7698f096223','f86bf84f0e9852f08347db86381ed4472b8471446c0e','2024-02-19 04:55:00','2024-02-19 04:55:00'),(6,'hama','cortes','hama@gmail.com',1,'30d6fe4172109107cc01263531f87077','e941b0b16d378ee2235e5179edb3409ceefda6ca7599','2024-02-19 06:53:00','2024-02-19 06:53:00');
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

-- Dump completed on 2024-02-19 18:55:44
