-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_projectuas
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_courses`
--

DROP TABLE IF EXISTS `tb_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_courses` (
  `urutan` int(100) NOT NULL AUTO_INCREMENT,
  `id` text NOT NULL,
  `nama_pelajaran` text NOT NULL,
  `teacher_id` varchar(1000) NOT NULL,
  PRIMARY KEY (`urutan`),
  KEY `teacher_id` (`teacher_id`(768))
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_courses`
--

LOCK TABLES `tb_courses` WRITE;
/*!40000 ALTER TABLE `tb_courses` DISABLE KEYS */;
INSERT INTO `tb_courses` VALUES (5,'10001','Computer Science 142','1234'),(6,'10002','Computer Science 143','5678'),(7,'10003','Computer Science 190M','9012'),(8,'10004','Informatics 100','1234');
/*!40000 ALTER TABLE `tb_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_final_data`
--

DROP TABLE IF EXISTS `tb_final_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_final_data` (
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` text NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course_id` text NOT NULL,
  `nama_pelajaran` text NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `grade` text NOT NULL,
  PRIMARY KEY (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_final_data`
--

LOCK TABLES `tb_final_data` WRITE;
/*!40000 ALTER TABLE `tb_final_data` DISABLE KEYS */;
INSERT INTO `tb_final_data` VALUES (5,'123','Bart','bart@fox.com','10001','Computer Science 142','1234','B');
/*!40000 ALTER TABLE `tb_final_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_grades`
--

DROP TABLE IF EXISTS `tb_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_grades` (
  `urutan` int(100) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(1000) NOT NULL,
  `course_id` text NOT NULL,
  `grade` text NOT NULL,
  PRIMARY KEY (`urutan`),
  KEY `student_id` (`student_id`(768))
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_grades`
--

LOCK TABLES `tb_grades` WRITE;
/*!40000 ALTER TABLE `tb_grades` DISABLE KEYS */;
INSERT INTO `tb_grades` VALUES (6,'123','10001','B'),(7,'123','10002','C'),(8,'456','10001','B+'),(9,'888','10002','A+'),(10,'888','10003','A+'),(11,'404','10004','D+');
/*!40000 ALTER TABLE `tb_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_students`
--

DROP TABLE IF EXISTS `tb_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_students` (
  `urutan` int(100) NOT NULL AUTO_INCREMENT,
  `id` int(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`urutan`),
  KEY `id` (`id`),
  KEY `nama_siswa` (`nama_siswa`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_students`
--

LOCK TABLES `tb_students` WRITE;
/*!40000 ALTER TABLE `tb_students` DISABLE KEYS */;
INSERT INTO `tb_students` VALUES (3,123,'Bart','bart@fox.com'),(4,456,'Milhouse','milhouse@fox.com'),(5,888,'Lisa','lisa@fox.com'),(6,404,'Ralph','ralph@fox.com');
/*!40000 ALTER TABLE `tb_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_teachers`
--

DROP TABLE IF EXISTS `tb_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_teachers` (
  `urutan` int(100) NOT NULL AUTO_INCREMENT,
  `id` varchar(1000) NOT NULL,
  `nama_guru` text NOT NULL,
  PRIMARY KEY (`urutan`),
  KEY `id` (`id`(768))
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teachers`
--

LOCK TABLES `tb_teachers` WRITE;
/*!40000 ALTER TABLE `tb_teachers` DISABLE KEYS */;
INSERT INTO `tb_teachers` VALUES (4,'1234','Krabappel'),(5,'5678','Hoover'),(6,'9012','Stepp');
/*!40000 ALTER TABLE `tb_teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'admin','$2y$10$JGgb2FSaT22Dt99kuI691..pr7WaAl375lac3nAJSOhSK1BDBYi6q','Admin','admin'),(2,'user','$2y$10$3G9/XDZqKJcOI0o9WDhMP.3wGUJYD3vndfgVI5A8mCNWeCaHehiTC','User','user');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-16 20:51:52
