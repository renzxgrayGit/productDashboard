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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'V88 T-shirt',150,50,9.99,'V88 T-shirt Limited edition','2024-02-19 11:17:05','2024-02-20 07:27:53'),(2,'V88 Cap',50,25,4.49,'V88 Cap','2024-02-19 11:18:55','2024-02-19 11:18:55'),(3,'V88 Keychain',75,100,1.49,'V88 Keychain','2024-02-19 11:19:36','2024-02-19 11:19:36'),(4,'V88 Towel',50,20,6.49,'V88 Towel','2024-02-19 11:20:12','2024-02-19 11:20:12'),(5,'V88 Mug',20,10,4.09,'Mug best for coffee time','2024-02-20 10:48:09','2024-02-20 10:48:09');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `review_id` int DEFAULT NULL,
  `reply` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,2,1,1,'this reply only for (amy cute) ...... as user_id #2 and product_id #1\r\n\r\n','2024-02-21 08:55:06','2024-02-21 08:55:06'),(2,2,1,2,'this reply only for (summer rizz) ...... as user_id #2 and product_id #1','2024-02-21 09:04:26','2024-02-21 09:04:26'),(3,2,NULL,5,'this is reply for - 2nd review from user_id#2 and productID#2','2024-02-21 09:09:10','2024-02-21 09:09:10'),(4,2,1,3,'this reply is only for (ZOE CRUZ review as user_id #2 and product_id #1)','2024-02-21 09:30:47','2024-02-21 09:30:47'),(5,2,2,5,'this reply is only for (zoe cruz this is 2nd review from user_id#2 and productID#2)','2024-02-21 09:31:57','2024-02-21 09:31:57'),(6,4,1,1,'this reply is only for (amy cute this is review as user_id #4 and product_id #1)','2024-02-21 09:33:10','2024-02-21 09:33:10'),(7,3,1,3,'this reply is only for (zoe cruz - review as user_id #2 and product_id #1)','2024-02-21 09:34:54','2024-02-21 09:34:54'),(8,4,4,6,'ganda ampota','2024-02-21 10:03:10','2024-02-21 10:03:10'),(9,2,4,6,'bobo mo tanga','2024-02-21 10:03:53','2024-02-21 10:03:53'),(10,3,4,6,'mga boboboboobbob','2024-02-21 10:04:34','2024-02-21 10:04:34'),(11,3,5,9,'HAHAHAAHA','2024-02-21 10:05:17','2024-02-21 10:05:17'),(12,2,5,11,'heheheheheh','2024-02-21 10:06:04','2024-02-21 10:06:04'),(13,4,5,11,'wwawawawaawa','2024-02-21 10:07:02','2024-02-21 10:07:02'),(14,3,1,3,'this reply is only for (zoe cruz - this is review as user_id #2 and product_id #1)','2024-02-22 08:17:04','2024-02-22 08:17:04'),(15,4,5,10,'this reply is only for (summer rizz - maganda naman)','2024-02-22 08:18:43','2024-02-22 08:18:43'),(16,4,5,11,'this reply is only for (summer rizz - sobrang ganda)','2024-02-22 08:20:20','2024-02-22 08:20:20'),(17,2,3,12,'reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:12:39','2024-02-22 10:12:39'),(18,2,3,12,'2nd reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:13:23','2024-02-22 10:13:23'),(19,3,3,12,'1st reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:16:44','2024-02-22 10:16:44'),(20,3,3,12,'2nd reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:18:04','2024-02-22 10:18:04'),(21,3,3,12,'3rd reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:31:32','2024-02-22 10:31:32'),(22,4,3,12,'1st reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:32:14','2024-02-22 10:32:14'),(23,4,3,13,'1st reply for (summer rizz - review as user_id#3 and product_id#3)','2024-02-22 10:32:41','2024-02-22 10:32:41'),(24,4,3,13,'2nd reply for (summer rizz - review as user_id#3 and product_id#3)','2024-02-22 10:32:55','2024-02-22 10:32:55'),(25,4,3,12,'2nd reply for (amy cute - review as user_id#4 and product_id#3)','2024-02-22 10:33:11','2024-02-22 10:33:11'),(26,4,3,14,'1st reply for (zoe cruz - review as user_id#2 and product_id#3)','2024-02-22 10:36:22','2024-02-22 10:36:22'),(27,4,3,14,'2nd reply for (zoe cruz - review as user_id#2 and product_id#3)','2024-02-22 10:36:32','2024-02-22 10:36:32'),(28,2,3,14,'1st reply (Zoe Cruz wrote: review as user_id#2 and product_id#3)','2024-02-22 10:40:35','2024-02-22 10:40:35'),(29,2,3,15,'I\'ll buy again','2024-02-22 10:51:58','2024-02-22 10:51:58'),(30,4,2,16,'I will buy again','2024-02-22 11:15:22','2024-02-22 11:15:22');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `review` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,4,1,'this is review as user_id #4 and product_id #1','2024-02-21 08:53:05','2024-02-21 08:53:05'),(2,3,1,'this is review as user_id #3 and product_id #1\r\n\r\n','2024-02-21 08:53:53','2024-02-21 08:53:53'),(3,2,1,'this is review as user_id #2 and product_id #1\r\n\r\n','2024-02-21 08:54:18','2024-02-21 08:54:18'),(4,2,2,'this is review from user_id#2 and productID#2','2024-02-21 09:08:26','2024-02-21 09:08:26'),(5,2,2,'this is 2nd review from user_id#2 and productID#2','2024-02-21 09:08:47','2024-02-21 09:08:47'),(6,3,4,'naks ganda ng towel!','2024-02-21 10:01:42','2024-02-21 10:01:42'),(7,2,4,'bibili pa ulit ako neto!\r\n','2024-02-21 10:02:26','2024-02-21 10:02:26'),(8,4,4,'review ko to wala kyong pake! PANGET','2024-02-21 10:02:53','2024-02-21 10:02:53'),(9,3,5,'amelyn pango','2024-02-21 10:05:10','2024-02-21 10:05:10'),(10,3,5,'maganda naman\r\n','2024-02-21 10:05:34','2024-02-21 10:05:34'),(11,3,5,'sobrang ganda','2024-02-21 10:05:42','2024-02-21 10:05:42'),(12,4,3,'review as user_id#4 and product_id#3','2024-02-22 10:11:27','2024-02-22 10:11:27'),(13,3,3,'review as user_id#3 and product_id#3','2024-02-22 10:11:55','2024-02-22 10:11:55'),(14,2,3,'review as user_id#2 and product_id#3','2024-02-22 10:12:19','2024-02-22 10:12:19'),(15,2,3,'This keychain is so cheap','2024-02-22 10:50:13','2024-02-22 10:50:13'),(16,4,2,'Nice cap village 88!','2024-02-22 11:15:11','2024-02-22 11:15:11');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'oksner','geez','renz@gmail.com',9,'f085652f3a49d31c63af28a3aea6bb34','cdda851866d0fd6f38f1d97cc2815f53abf5af1493e5','2024-02-19 11:24:00','2024-02-20 07:26:20'),(2,'Zoe','Cruz','zoe@gmail.com',1,'30bae8a29fc71bb5d20be7fd6e1fdbca','027bd27a66e3a5452dab792a5f9494af6533bce3a1f6','2024-02-20 10:57:00','2024-02-22 10:38:38'),(3,'Summer','Rizz','summer@gmail.com',1,'1346bc89315f492022c435716148938e','68f547c2a1e0e30815f088f5fd6361f9e63b350c878c','2024-02-20 02:26:00','2024-02-22 10:38:23'),(4,'Amy','Cute','amy@gmail.com',1,'3ebdac13b4a8e54f558377306a7accb1','1d7c5b7dbbecf2ba516c727c93a1082f6360cec169c0','2024-02-20 04:10:48','2024-02-22 10:38:06');
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

-- Dump completed on 2024-02-22 11:16:54
