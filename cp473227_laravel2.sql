-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: cp473227_laravel2
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

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
-- Current Database: `cp473227_laravel2`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cp473227_laravel2` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `cp473227_laravel2`;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Network','1'),(2,'System','1'),(3,'Software','1'),(4,'Hardware','1'),(5,'testing','0'),(6,'Wifi','0'),(7,'Wifi','0'),(8,'test','0'),(9,'Normal Error','0'),(10,'နက်ဝေါ့','0'),(11,'test','0'),(12,'new_test','0'),(13,'motp','0'),(14,'motp','1'),(15,'route','1'),(16,'test','0'),(17,'test','0'),(18,'angry12','0'),(19,'winllphyoe','0'),(20,'စစ်စတန်(မ်)','0'),(21,'cattest','0');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incident`
--

DROP TABLE IF EXISTS `incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `incident` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `cat_id` int NOT NULL,
  `sub_cat_id` int NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incident`
--

LOCK TABLES `incident` WRITE;
/*!40000 ALTER TABLE `incident` DISABLE KEYS */;
INSERT INTO `incident` VALUES (1,'Network Port Lose',1,1,'2022-07-20',NULL),(2,'Cant Download',3,15,'2022-07-20',NULL),(3,'Excel files open only sometimes',4,8,'2022-07-26',NULL),(4,'Cant Connect',4,8,'2022-07-26',NULL),(5,'fdjhsrlfsb fkgfjjvfkjfljkf',7,26,'2022-07-26',NULL),(6,'Excel Cannot Open File ',3,13,'2022-07-26',0),(7,'dkha;fl',9,27,'2022-07-27',NULL),(8,'can ping but no internet',4,9,'2022-07-27',NULL),(19,'cannot print ',3,11,'2022-08-10',0),(20,'team cannot sign in',3,14,'2022-08-10',NULL),(21,'Not responding ',3,15,'2022-08-11',NULL),(23,'Test',2,20,'2022-08-11',0),(24,'test incident',11,28,'2022-08-11',NULL),(25,'Test',4,9,'2022-08-11',NULL),(28,'new_incident',12,29,'2022-08-13',0),(29,'new_incident_2',12,30,'2022-08-13',0),(30,'new_incident_3',12,30,'2022-08-13',0),(31,'new_incident',12,30,'2022-08-13',0),(32,'hh',11,28,'2022-08-13',1),(33,'HTTTP',4,3,'2022-08-13',1),(34,'Lose Cable ',4,2,'2022-08-13',1),(35,'subinc',16,34,'2022-08-14',1),(36,'ok',15,35,'2022-08-15',1),(37,'inctest',17,36,'2022-08-19',1),(38,'winwin',19,38,'2022-08-20',1),(39,'haha',14,39,'2022-08-20',1),(40,'haha',14,33,'2022-08-20',1),(41,'မင်္ဂလာပါ',14,32,'2022-08-20',1),(42,'incidenttest',21,40,'2022-08-21',1),(43,'Broken',1,25,'2022-08-21',1),(44,'Moodle login error',2,19,'2022-08-21',1);
/*!40000 ALTER TABLE `incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (2,'Main Campus'),(3,'Yoma'),(4,'Mya Kan Thar'),(5,'7 Mile Campus'),(6,'Sapal Chan');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `sub_cat_id` int NOT NULL,
  `incident_id` int NOT NULL,
  `solution_id` int NOT NULL,
  `name` varchar(225) NOT NULL,
  `location` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (7,3,14,9,8,'Admin','2','','2022-08-10',NULL),(9,3,12,17,10,'Admin','2','','2022-08-10',NULL),(12,4,3,22,13,'Admin','2','','2022-08-11',NULL),(13,2,20,23,14,'Admin','2','','2022-08-11',NULL),(15,4,9,25,16,'Admin','2','','2022-08-18',NULL),(20,4,3,33,24,'admin','6','','2022-08-13',NULL),(21,4,2,34,25,'admin','3','','2022-08-13',NULL),(22,16,34,35,26,'admin','2','sub log','2022-08-14',NULL),(23,15,35,36,27,'Admin','2','new log by user','2022-08-15',NULL),(25,17,36,37,28,'admin','2','Delete me','1987-04-27','10-22-31am'),(26,14,32,41,32,'may','2','','2022-08-20',NULL),(27,14,39,39,30,'may','2','','2022-08-20',NULL),(28,14,33,40,31,'may','2','','2022-08-20',NULL),(29,14,32,41,32,'may','2','','2022-08-20',NULL),(30,21,40,42,33,'admin','2','Log test','2022-08-21','05:32:00pm'),(31,1,25,43,34,'admin','2','','2022-08-21','10:50:00am'),(32,2,19,44,35,'admin','2','','2022-08-21','11:33:12am'),(33,15,35,36,27,'kht','2','','2022-08-21',NULL);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'admin','123','admin','1','-','-','-','-',''),(3,'tester','123','user','1','-','-','-','-',''),(4,'Thomas Naing','Thuwai12','admin','1','-','-','-','-',''),(5,'Thu Wai','Thuwai12','user','1','-','-','-','-',''),(6,'nandar','142142','user','1','-','-','-','-',''),(7,'admin123','123','user','1','-','-','-','-',''),(8,'heinmahn','Kbtc@admin','admin','1','-','-','-','-',''),(9,'MTH','admin','admin','1','-','-','-','-',''),(10,'INF','admin','user','1','-','-','-','-',''),(11,'Wllp','12345','admin','1',NULL,NULL,NULL,NULL,' '),(12,'kht','123','user','1',NULL,NULL,NULL,NULL,' '),(13,'may','5454','user','1','-','-','-','-','2022-08-20'),(14,'kaunghtunthant','123456','admin','1','-','-','-','-','2022-08-21'),(15,'test','123','user','0','-','-','-','-','2022-08-21');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `solution` (
  `id` int NOT NULL AUTO_INCREMENT,
  `incident_id` int NOT NULL,
  `answer` text NOT NULL,
  `member_id` int NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (1,1,'Recrimp Network Head',1,'',1),(2,2,'Uninstall and Install',1,'',1),(3,5,'eikghrgherluih',1,'',1),(4,5,'á€ºá€á€”á€¡á€™á€á€”á€™á€¡á€á€”á€¡á€á€”á€¡',1,'',1),(5,5,'á€ºá€·á€«á€­á€žá€„á€«á€¯á€¼á€¡á€„á€¯á€¼',1,'',1),(6,6,'Appwiz.cpl&gt;Office&gt;right Click&gt;change&gt;Repair',1,'',1),(7,8,'find vpn\r\ndisable vpn',1,'',1),(8,9,'Remove team account From access work or school (window search bar &gt; Access work or school ) delete team app data (run&gt;%appdata%)',1,'',1),(9,16,'Driver Update ',1,'',0),(10,17,'test',1,'',0),(11,18,'Install New Browser ',1,'',0),(12,21,'install different broswer (Brave)\r\n',1,'',0),(13,22,'Check the cable and add another RJ45 ',1,'',1),(14,23,'Test TEst',1,'',1),(16,25,'This is sol',1,'',1),(18,26,'ttttttttttt',1,'',1),(19,28,'new solution',1,'',0),(20,30,'Hello',1,'',0),(21,30,'hello again\r\n',1,'',0),(22,31,'new ans',1,'',1),(23,32,'jascc',1,'',1),(24,33,'HHHTTTTPPPPP\r\n',1,'',1),(25,34,'FInd where \r\n',1,'',1),(26,35,'subsolu',1,'',1),(27,36,'New sol',1,'',1),(28,37,'Blach Blach',1,'',1),(29,38,'phyoe1',1,'',0),(30,39,'I want to laugh. ',1,'',1),(31,40,'I wanna laugh.',1,'',1),(32,41,'မြန်မာနိုင်ငံသူ/သားတွေက တစ်ဦးနဲ့ တစ်ဦး &quot;မင်္ဂလာပါ&quot;လို့ နှုတ်ဆက်လေ့ရှိတယ်။',1,'',1),(33,42,'Solution test',1,'',1),(34,43,'Buy new one',1,'',1),(35,44,'No solution',1,'',1);
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (1,1,'Router','1'),(2,4,'Desktop','1'),(3,4,'Cable','1'),(4,4,'Monitor','1'),(5,4,'Smart TV','1'),(6,4,'Printer','1'),(7,4,'Web Cam','1'),(8,4,'Projector','1'),(9,4,'External WIFI Card','1'),(10,3,'Printer','1'),(11,3,'Driver','0'),(12,3,'WIFI','0'),(13,3,'OFFICE','0'),(14,3,'Window','1'),(15,3,'Browser','1'),(16,3,'Drawing PAd','1'),(17,3,'External WIFI Card','1'),(18,3,'Smart Phone','1'),(19,2,'MOODLE','1'),(20,2,'OFFICE','1'),(21,2,'SMS ( School Management System )','1'),(22,2,'SMS ( POH )','1'),(23,1,'Switch','1'),(24,1,'Firewall','1'),(25,1,'Ap ( Acess Point )','1'),(26,7,'connection lost','1'),(27,9,'need v','1'),(28,11,'subtest','1'),(29,12,'new_sub_test','0'),(30,12,'new_sub_test_2','0'),(31,12,'anew_again','1'),(32,14,'may','1'),(33,14,'oo','1'),(34,16,'subtest','0'),(35,15,'gg','1'),(36,17,'subtest','0'),(37,18,'hate','0'),(38,19,'winlae','0'),(39,14,'tha pyay','1'),(40,21,'subcattest','0');
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-21  7:50:21
