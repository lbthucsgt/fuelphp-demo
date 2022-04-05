-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_vi_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vi_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (9,'Phương Oanh',NULL,NULL),(10,'Thu Nga',NULL,NULL),(11,' Jo Hemmings',NULL,NULL),(12,'Khương Nguy',NULL,NULL),(13,'Trâu Hoành Minh',NULL,NULL),(14,' Baird T. Spalding',NULL,NULL),(15,'Robin Sharma',NULL,NULL),(16,'Erica Moroz',NULL,NULL),(17,'Viktor Emil Frankl',NULL,NULL),(18,'Robin Sharma',NULL,NULL),(19,'Ca Tây',NULL,NULL),(20,'Trương Học Vĩ',NULL,NULL),(21,'Mã Hạo Thiên',NULL,NULL),(22,'Trương Manh',NULL,NULL),(23,'Quốc Thịnh',NULL,NULL),(24,' Diệp Hồng Vũ',NULL,NULL),(25,'Richard J.Gerrig',NULL,NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci NOT NULL DEFAULT '0',
  `price` int unsigned NOT NULL,
  `published_at` date DEFAULT NULL,
  `cover` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci DEFAULT NULL,
  `author_id` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vi_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (10,'Trí Tuệ Do Thái ',116700,'2018-12-26','tri-tue-do-thai_1648797520.jpg',9,NULL,NULL),(11,'Rèn Luyện Tư Duy Phản Biện',64350,'2019-12-01','ren-luyen-tu-duy-pan-bien_1648797639.jpg',10,NULL,NULL),(12,'How Psychology Works',214300,'2020-11-01','how-pyscho-work_1648797723.jpg',11,NULL,NULL),(13,'Tâm Lý Học Hành Vi',73500,'2020-10-01','tam-ly-hoc-hanh-vi_1648797821.jpg',12,NULL,NULL),(14,'Tâm Lý Học Tính Cách',81750,'2021-02-01','tam-ly-hoc-tinh-cach_1648797912.jpg',13,NULL,NULL),(15,'Hành Trình Về Phương Đông',106650,'2022-04-01','hanh-trinh-ve-phuong-dong_1648798145.jpg',14,NULL,NULL),(16,'Ba Người Thầy Vĩ Đại',65600,'2019-10-01','ba-nguoi-thay-vi-dai_1648798247.jpg',15,NULL,NULL),(17,'Trầm lặng - Sức mạnh tiềm ẩn của người hướng nội',88000,'2019-06-06','tram-lang_1648798349.jpg',16,NULL,NULL),(18,'Đi Tìm Lẽ Sống',62400,'2019-04-01','di-tim-le-song_1648798501.jpg',17,NULL,NULL),(19,'Đời Ngắn Đừng Ngủ Dài',52700,'2018-12-01','doi-ngan-dung-ngu-dai_1648798602.jpg',18,NULL,NULL),(20,'Càng Kỷ Luật, Càng Tự Do',87750,'2020-09-01','cang-ky-luat-cang-tu-do_1648799568.jpg',19,NULL,NULL),(21,'Ổn Định Hay Tự Do',96749,'2021-06-15','on-dinh-hay-tu-do_1648799742.jpg',20,NULL,NULL),(22,'Tâm Lý Học Biểu Cảm',98000,'2021-04-01','tam-ly-hoc-bieu-cam_1648799846.jpg',21,NULL,NULL),(23,'Từ IQ Đến EQ',68250,'2021-03-15','iq-to-eq_1648799982.jpg',22,NULL,NULL),(24,'TÂM LÝ HỌC ỨNG DỤNG',81200,'2021-12-07','tam-ly-hoc-ung-dung_1649042727.jpg',23,NULL,NULL),(25,'Tâm Lý Học - Phác Họa Chân Dung Kẻ Phạm Tội',108750,'2021-06-12','tam-ly-hoc-toi-pham_1649042898.jpg',24,NULL,NULL),(26,'Tâm Lý Học Và Đời Sống',253500,'2018-02-01','tam-ly-hoc-doi-song_1649043059.jpg',25,NULL,NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int NOT NULL DEFAULT '0',
  `updated_at` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'thucle','VBx7x0N/u1Vz2JK7ra8PbPDeb2yS1jsQU5RiOS5iU50=',1,'thucle@gmail.com','1649131593','27d997deb65ce56d16b2903ab54f39a320757c5b','a:0:{}',1648701682,0);
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

-- Dump completed on 2022-04-05 13:52:32
