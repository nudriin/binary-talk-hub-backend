-- MySQL dump 10.13  Distrib 8.1.0, for Win64 (x86_64)
--
-- Host: localhost    Database: real_time_chat
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `_prisma_migrations`
--

DROP TABLE IF EXISTS `_prisma_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `_prisma_migrations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checksum` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished_at` datetime(3) DEFAULT NULL,
  `migration_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `rolled_back_at` datetime(3) DEFAULT NULL,
  `started_at` datetime(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3),
  `applied_steps_count` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_prisma_migrations`
--

LOCK TABLES `_prisma_migrations` WRITE;
/*!40000 ALTER TABLE `_prisma_migrations` DISABLE KEYS */;
INSERT INTO `_prisma_migrations` VALUES ('08181d79-8088-4456-857d-0c29ba1c7eec','62f4de09aa5642de17434afcdcfa84a611efaa1bb1c9de611a078058ea1799e8','2024-02-07 15:51:34.994','20240207155134_user_model_2',NULL,NULL,'2024-02-07 15:51:34.965',1),('2795e16d-9a5a-4995-a0af-828a3aef5618','ff597dcfa85cc03dec79227e0156e4130c93cc5fb24f2d8bd7814fb0290c54eb','2024-02-04 16:58:49.614','20240204165809_create_user_model',NULL,NULL,'2024-02-04 16:58:49.569',1),('6fed9e99-5873-44e8-a9eb-c30d18e54a7f','36ccb554ed2cfc1d7de71bb5513517b6206321ababdda0f282fee854a8b25cff','2024-02-14 13:35:58.423','20240214133558_user_model_3',NULL,NULL,'2024-02-14 13:35:58.381',1),('afe2c81d-910b-409e-bfe1-a164d125356c','ad10ce67f10697661a62f9b5cdf4119c75495376b2b2e20136eb68c36eb26514','2024-02-28 06:43:16.024','20240228064223_user_model_4',NULL,NULL,'2024-02-28 06:43:15.989',1);
/*!40000 ALTER TABLE `_prisma_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT 'https://firebasestorage.googleapis.com/v0/b/mern-auth-5a53c.appspot.com/o/profile.svg?alt=media&token=37afdff7-242d-4f97-9062-677c7cdd898d',
  PRIMARY KEY (`username`),
  UNIQUE KEY `user_email_key` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('hishasy','hishasy@test.com','$2y$10$CMerBURD9C9GL8A52jY12ea4i.1IdFfZSmQucZRLY8jLG7szKRwQa','Nurdin','https://firebasestorage.googleapis.com/v0/b/mern-auth-5a53c.appspot.com/o/profiles%2F1709267601061yes.jpeg?alt=media&token=6e2c98d1-8347-4a90-9443-54984edb2393'),('nudriin','nudriin@gmail.com','$2b$10$tEmCBIJb/5515QfjnO1UQOWo4O8SQqahrP6JDqo4i6XnHaHwitqoe','Nurdin','https://lh3.googleusercontent.com/a/ACg8ocIkeu05R1AXDwQtusJdDbGafOk1WPQkAo1Skr_FcHzu=s96-c'),('nurdin','nurdin@mail.com','$2y$10$XHDv0/fnm/EnpwqJFmBGlOxkYcvkC.g2hnqBAXZB/kgGlar55NxrG','Nurdin','https://firebasestorage.googleapis.com/v0/b/mern-auth-5a53c.appspot.com/o/profile.svg?alt=media&token=37afdff7-242d-4f97-9062-677c7cdd898d'),('nurdinhishasy7c','nurdinhishasy7c@gmail.com','$2b$10$Kx1Ce/b6U2f/RzH6HTCXYu/gtWfLj86Z1F0OZ.LEvlZ2LUgkR9NLm','Nurdin','https://lh3.googleusercontent.com/a/ACg8ocLJbvT2mR74yHN8mfxyms5rPLUU2K7vXBSZPOJ7IB4nhT0=s96-c'),('scnzin','scnzin@gmail.com','$2b$10$cSJ6afeWkU4sKhTq6Jn9SeIuLbvdvB8Au6zYzflxj.caNssFw2Ifm','Zin','https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-13 19:52:17
