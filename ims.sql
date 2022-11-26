-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: cp473227_laravel2
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (11,'Hardware','1'),(12,'Software','0'),(13,'OS','1'),(14,'Software','1');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incident`
--

DROP TABLE IF EXISTS `incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incident` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `cat_id` int NOT NULL,
  `sub_cat_id` int NOT NULL,
  `create_at` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incident`
--

LOCK TABLES `incident` WRITE;
/*!40000 ALTER TABLE `incident` DISABLE KEYS */;
INSERT INTO `incident` VALUES (14,'Cannot Connect to Webcam in Zoom',11,28,'2022-09-01',1),(15,'Paper Jam',11,30,'2022-09-01',1),(16,'Connection Lost Between Laptop and TV.',11,29,'2022-09-01',1),(17,'PC LCD vertical lines on screen ',11,31,'2022-09-01',1),(18,'Some keys not working on keyboard',11,31,'2022-09-01',1),(19,'Printing Blank Pages or faint color pages',11,30,'2022-09-03',1),(20,'PDF preview error',13,33,'2022-09-12',1),(21,'Printer Two Blinking Red LEDs',11,30,'2022-09-15',1),(22,'$cfg[&quot;TempDir&quot;] (/tmp/) is not accessible | phpMyAdmin',14,34,'2022-09-22',1),(23,'Version Fix Error',14,34,'2022-09-22',1),(24,'FTP File Can Not Access ',14,34,'2022-09-22',1),(25,'Cannot login to teams',14,35,'2022-09-26',1),(26,'Cannot type in search menu bar',14,35,'2022-09-28',0),(27,'Cannot type in search menu bar',13,36,'2022-09-28',1),(28,'&lt;h1&gt;aaaaaaaaaaaaaa&lt;/h1&gt;',11,31,'2022-10-02',0),(29,'MM font error ',13,38,'2022-10-07',1),(30,'Bent HDMI cable head',11,29,'2022-10-14',1),(31,'Wifi connected but does not display connection',13,36,'2022-10-21',1),(32,'Cable fault caused by mouse bite ',11,39,'2022-10-26',1),(33,'Paper Jam',11,30,'2022-10-28',0),(34,'Enable to Connect Via HDMI',11,31,'08/11/2022',1),(35,'Safe Guard overload and shut down routers ',11,40,'08/11/2022',1);
/*!40000 ALTER TABLE `incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (11,11,28,14,11,'phyusinaye','2','','2022-09-01','09:10:00am'),(12,11,30,15,12,'winlaelaephyo','2','','2022-09-01','01:48:12pm'),(13,11,30,15,13,'winlaelaephyo','2','','2022-09-01','10:30:00am'),(14,11,29,16,14,'mayoothapyay','2','ASAP ','2022-09-01','09:30:00am'),(15,11,31,17,15,'mayoothapyay','2','','2022-09-01','09:35:00am'),(16,11,31,18,16,'mayoothapyay','2','','2022-09-01','09:40:00am'),(18,11,30,19,17,'winlaelaephyo','2','','2022-09-02','02:28:47pm'),(19,11,30,15,12,'phyusinaye','2','','2022-09-05','04:30:00pm'),(20,11,30,15,12,'phyusinaye','2','','2022-09-08','11:50:00am'),(21,11,30,19,17,'phyusinaye','2','','2022-09-08','03:00:00pm'),(22,11,30,19,17,'phyusinaye','2','','2022-09-08','03:00:00pm'),(23,13,33,20,18,'thuwainaing','2','','2022-09-12','11:33:32am'),(24,11,30,19,17,'phyusinaye','2','','2022-09-12','11:30:00am'),(25,11,30,15,12,'winlaelaephyo','2','','2022-09-14','04:12:06pm'),(26,11,30,15,12,'winlaelaephyo','2','','2022-09-13','04:12:36pm'),(27,11,30,19,17,'phyusinaye','2','','2022-09-14','04:21:01pm'),(28,11,30,21,19,'winlaelaephyo','2','','2022-09-10','04:39:51pm'),(29,11,30,21,19,'kaunghtunthant','2','','2022-09-19','04:10:47pm'),(30,11,30,21,19,'myozayarthant','2','','2022-09-19','04:21:26pm'),(31,11,30,19,17,'winlaelaephyo','2','','2022-09-20','11:30:00pm'),(32,11,30,19,17,'winlaelaephyo','2','','2022-09-21','10:23:00am'),(33,11,30,19,17,'kaunghtunthant','2','','2022-09-25','01:20:00pm'),(34,14,35,25,23,'kaunghtunthant','2','','2022-09-25','01:15:00pm'),(35,13,36,27,24,'winlaelaephyo','2','','2022-09-24','11:01:36am'),(36,11,30,19,17,'winlaelaephyo','2','','2022-09-26','11:05:28am'),(37,11,30,15,12,'winlaelaephyo','2','','2022-10-03','10:50:03am'),(38,13,38,29,26,'zawmoenaing','2','','2022-10-07','12:57:50pm'),(39,11,30,19,17,'mayoothapyay','2','','2022-10-06','10:20:00am'),(40,11,30,19,17,'mayoothapyay','2','','2022-10-06','10:16:00am'),(41,11,30,15,13,'mayoothapyay','2','','2022-10-06','10:21:00am'),(42,11,30,19,17,'mayoothapyay','2','','2022-10-07','01:35:30pm'),(43,11,29,30,27,'heinhtetzaw','2','','2022-10-14','12:40:01pm'),(44,11,30,15,12,'waiyankyawtun','2','','2022-10-14','12:44:53pm'),(45,11,30,15,13,'waiyankyawtun','2','','2022-10-14','12:46:51pm'),(46,11,30,15,12,'winlaelaephyo','2','','2022-10-14','01:53:13pm'),(47,11,30,15,12,'waiyankyawtun','2','','2022-10-21','01:49:01pm'),(48,11,30,19,17,'heinmintun','2','','2022-10-21','01:49:29pm'),(49,11,30,19,17,'waiyankyawtun','2','','2022-10-21','01:49:37pm'),(50,11,30,21,19,'waiyankyawtun','2','','2022-10-21','01:49:56pm'),(51,11,30,19,17,'heinhtetzaw','2','','2022-10-21','01:57:02pm'),(52,11,30,15,12,'waiyankyawtun','2','','2022-10-26','02:01:57pm'),(53,11,30,19,17,'waiyankyawtun','2','','2022-10-26','02:04:45pm'),(54,11,30,15,13,'waiyankyawtun','2','','2022-10-26','02:04:59pm'),(55,11,30,15,12,'heinhtetzaw','2','','2022-10-28','02:03:51pm'),(56,11,30,15,12,'waiyankyawtun','2','','2022-10-28','03:09:50pm'),(57,11,30,15,13,'waiyankyawtun','2','','2022-10-28','03:10:03pm');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'admin','','','','123','admin','0','-','-','-','-',''),(4,'Thomas Naing','','','','Thuwai12','admin','0','-','-','-','-',''),(5,'Thu Wai','','','','Thuwai12','user','0','-','-','-','-',''),(9,'phyu sin','phyusin@gmail.com','','','12345','admin','0','-','-','-','-','2022-08-27'),(11,'wllp','wllp@gmail.com','Win Lae Lae Phyo','IT Intern','$2y$10$BWmGta1Gv0jqQ2bnaRcc0./XIsc4ITbIiUqosdpTBOEH.84d6YSau','admin','0','-','-','-','-','2022-08-30'),(12,'kht','kht@gmail.com','Kaung Htun Thant','IT Associate','$2y$10$kbpcZ5jedTx.0hPWtheI4eRzHjB1Y33/e95Ctn0vHx.zGamST9rhC','admin','0','-','-','-','-','2022-08-30'),(13,'heinmahn','heinmahn@kbtc.edu.mm','Hein Mahn','Senior IT Associate','$2y$10$qQyRMd1vnp0hrDPaSpqCJ.hOEjzO5r1g616CPZxB7uNa3OYXc7ofq','admin','1','-','-','-','-','2022-09-01'),(14,'kaunghtunthant','kaunghtunthant@kbtc.edu.mm','Kaung Htun Thant','IT Associate','$2y$10$3xOb//QJb4gn8QgmKAlQXenVOmkP0gyUgySHA/eKY1rXGnzwRU0Ba','admin','1','-','-','-','-','2022-09-01'),(15,'winlaelaephyo','winlaelaephyo@kbtc.edu.mm','Win Win Lay','IT Intern','$2y$10$vbEddptRUpo82RRov.fKY.u69Ym3zJCfBgbWtS7C43VNob.MDdMFO','admin','1','-','-','-','-','2022-09-01'),(16,'test_user','test_user@kbtc.edu.mm','Test User','Tester','$2y$10$k/itwwdajzLi7zuSjzZgo.v..0zDCwjM3SZc7Ick.vfyr8T45Epny','user','1','-','-','-','-','2022-09-01'),(17,'phyusinaye','phyusinaye@kbtc.edu.mm','Phyu Sin Aye','IT Associate','$2y$10$iUL8zSl1Ayiu8A5UgGMlaO9F1v/wycalLQti6WHSihHNK6SKkP/r2','user','1','-','-','-','-','2022-09-01'),(18,'mayoothapyay','mayoothapyay@kbtc.edu.mm','May Oo ','IT Intern','$2y$10$kbpcZ5jedTx.0hPWtheI4eRzHjB1Y33/e95Ctn0vHx.zGamST9rhC','user','1','-','-','-','-','2022-09-01'),(19,'kyawmyohtet','kyawmyohtet@kbtc.edu.mm','Kyaw Myo Htet','IT Supervisor','$2y$10$QZ7F2MeIV3N10qTps6N61upT2FYK49.3GeSTUGnm4q6OWL3jVfHNO','admin','1','-','-','-','-','2022-09-01'),(20,'thuwainaing','thuwainaing@kbtc.edu.mm','Thu Wai Naing','IT Associate','$2y$10$gcX0s5iodTCAQdM4YxGMx.fYe.5W9jX4meSNKB/2LiVr/tw/1H5OG','admin','1','-','-','-','-','2022-09-01'),(21,'myozayarthant','myozayarthant@kbtc.edu.mm','Myo Zayar Thant','IT Associate','$2y$10$r5rzQNQeQL3r47bsFxGz/uajpLS74tRl8sUqhwRTP63yuxV/YewSa','admin','1','-','-','-','-','2022-09-01'),(22,'mintheinhtut','mintheinhtut@kbtc.edu.mm','Min Thein Htut','IT Intern','$2y$10$s/SGiZ6TQ.yLCBR5wtgE7eY6e.D8LGd9PKbet4wHCcLBmwxg8JDmu','user','1','-','-','-','-','2022-09-06'),(23,'toelwinmyint','meetingorganizer@kbtc.edu.mm','Toe Lwin Myint','Senior IT Associate','$2y$10$zTJyBJSDqRp8uzlIav813.pcge2xVMFM0NYf9Em0fR1M.O9BS5Tka','admin','1','-','-','-','-','2022-09-07'),(24,'oaksoeaung','oaksoeaung01@kbtc.edu.mm','Oak Soe Aung','IT Associate','$2y$10$o9pD3Pdj16vXUW50N.iXE.OdfvbY4rZeIvuO/vi.X.xmFFno66YOO','user','1','-','-','-','-','2022-09-07'),(25,'kaungkhant','kaungkhant02@kbtc.edu.mm','Kaung Khant','IT Associate','$2y$10$1.Yy8MvJgiqQ1UU01SD39eBSk6FCDXG0kGPadRmWpwddPUOJQt1Lu','user','1','-','-','-','-','2022-09-09'),(26,'htutaungwai','htutaungwai01@kbtc.edu.mm','Htut Aung Wai','IT &amp; DT Associate','$2y$10$orPTVCRomlHG41OT6wVdLeO9e/xvMDPEmJThej1UvFiYlV6gqvmP2','user','1','-','-','-','-','2022-10-03'),(27,'heinmintun','heinmintun@kbtc.edu.mm','Hein Min Tun','IT Intern','$2y$10$5lLYbnfrKs8MB1PNvVHyHukeusQJaFk9hv50.FtiKnAB0QjvWfdl2','user','1','-','-','-','-','2022-10-07'),(28,'zawmoenaing','zawmoenaing@kbtc.edu.mm','Zaw Moe Naing','IT intern','$2y$10$Wk/35JXi9ND10Dgo2pi8f.v0/nA5oS6X2Y2Nd5u1SJVQ0QUPFndBW','user','1','-','-','-','-','2022-10-07'),(29,'heinhtetzaw','heihtetzaw07@kbtc.edu.mm','Hein Htet Zaw','IT Intern','$2y$10$jJUEQM1Q5d4vKOUVCwkoK.f8KW.VEem16AK9JRSy6F5ndtWXDOedu','user','1','-','-','-','-','2022-10-14'),(30,'waiyankyawtun','waiyankyawtun@kbtc.edu.mm','waiyankyawtun','IT Intern','$2y$10$D7v/3SRtEcndxdX/RlZtOuB/KJOwasnyH/yF/unWWWVy2kVwM3DCW','user','1','-','-','-','-','2022-10-14'),(31,'heinhtetbo','heinhtetbo@kbtc.edu.mm','Hein Htet Bo','IT &amp; DT Associate','$2y$10$P9N9yQLDaUnApwxcIR/lGuga6BnxF4R.4UkoAs8eoRZDmLEhaiCx2','user','1','-','-','-','-','2022-10-26'),(32,'kyawzinthet','kyawzinthet03@kbtc.edu.mm','Kyaw Zin Thet','IT &amp; DT Associate','$2y$10$QLrBgQsgX2rvJaQ6eVilJOoWFMUw.zmOZ3yi46njhGBA83qjd8mCy','user','1','-','-','-','-','2022-10-26'),(33,'linnthiha','linnthiha@kbtc.edu.mm','Linn Thiha','IT &amp; DT Associate','$2y$10$rhjyfXKVlSVSGl/OLXU4F.qtfstYgomJKCEpnyAT/NrC4ZYyh.qxO','user','1','-','-','-','-','2022-10-26'),(34,'mamshinthant','mamshinthant@kbtc.edu.mm','Mam Shin Thant','IT &amp; DT Associate','$2y$10$1lRr0B40ofLMIbgW16KOMeGyqeDbhrsY3..9d4zNCPKZ1ouA0.Mk2','user','1','-','-','-','-','2022-10-26'),(35,'myothantzin','myothantzin@kbtc.edu.mm','Myo Thant Zin','Senior IT &amp; DT Associate','$2y$10$Te2WJyhHRDrln6LXdhPfuuNlPdEc1201oKVbx84m7V3v.2OyP.jV6','user','1','-','-','-','-','2022-10-26'),(36,'nyikhantzaw','nyikhantzaw@kbtc.edu.mm','Nyi Khant Zaw','IT &amp; DT Associate','$2y$10$dyDB6suOi4Ch7LWlvwiqFOS63Y7p6rl5/6m9.Dy0jHioDUQ7skw0S','user','1','-','-','-','-','2022-10-26'),(37,'phyokokoaung','phyokokoaung@kbtc.edu.mm','Phyo Ko Ko Aung','IT &amp; DT Associate','$2y$10$U.a0eqBusef3ppkToLt86.eNoJGhRxxRc0vK4s1sno/hqKPi5grkK','user','1','-','-','-','-','2022-10-26'),(38,'waiyanaung','waiyanaung@kbtc.edu.mm','Wai Yan Aung','IT &amp; DT Associate','$2y$10$pTza8LbNJAwf0ZAqpI7FCe5TobNBRVtP972xyrvdOCi3bAp0Cz7bi','user','1','-','-','-','-','2022-10-26'),(39,'yemyintaung','yemyintaung@kbtc.edu.mm','Ye Myint Aung','IT &amp; DT Supervisior','$2y$10$Xzc9J/vxA092a.2ZG1tTGusSD8ZgC40WAVbDJqPcd09J/NpGpn3ri','user','1','-','-','-','-','2022-10-26'),(40,'zinminthu','zinminthu@kbtc.edu.mm','Zin Min Thu','IT &amp; DT Associate','$2y$10$/hDc9p5rEKbMF/Kz.SIKI.4tit3H2vsvx61b/GKUSl2iPU6Tu58BC','user','1','-','-','-','-','2022-10-26'),(41,'hponepyaepaing','hponepyaepaing@kbtc.edu.mm','Hpone Pyae Paing','IT Intern','$2y$10$v.i5KE7pw3A/aveMvgv8g.VD4xZJvD7VS6YCYUFTIblih4jtAlqgS','user','1','-','-','-','-','2022-10-26'),(42,'nandarhlaing','nandar.hlaing@kbtc.edu.mm','Nandar Hlaing','IT &amp; DT Assistant Manager','$2y$10$uQICHHYzT5kSg/JXYX2QBemZMqoLp7YMoLWXiLdg4OXDYqoUDO1Ue','admin','1','-','-','-','-','2022-10-26'),(43,'zinmaroo','zinmaroo@kbtc.edu.mm','Zin Mar Oo','IT Trainee','$2y$10$OVVSPizXvr/6jHC.fJjc.u0GiNP8bay2whaGasp5L4R69ag1sqaPW','user','1','-','-','-','-','04/11/2022');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solution`
--

DROP TABLE IF EXISTS `solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solution` (
  `id` int NOT NULL AUTO_INCREMENT,
  `incident_id` int NOT NULL,
  `answer` text NOT NULL,
  `member_id` int NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solution`
--

LOCK TABLES `solution` WRITE;
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` VALUES (11,14,'1.Click camera icon in Zoom\r\n2.Change camera device',1,'',1),(12,15,'Pull out paper by hands',1,'',1),(13,15,'Dismantle the printer and pull out the paper.',1,'',1),(14,16,'Error : The HDMI Cable is defected. \r\nSolution : Buy new HDMI Cable.',1,'',1),(15,17,'Recommend to go to Service Center. ',1,'',1),(16,18,'Recommend to use external keyboard or go to service center. ',1,'',1),(17,19,'Head Cleaning &amp; Nozzle check',1,'',1),(18,20,'Install Adobe Acrobat Pro DC from Standard software hard disk.',1,'',1),(19,21,'Ink Pad Count reset by using &quot;Adjustment Program Epson L3150 - EPIL ver.1.0.3.rar&quot; from IT &amp; DT Softwares in operation folder',1,'',1),(20,22,'PHPMyAdmin config inc php\r\n\r\nadd temp dir \r\n',1,'',1),(21,23,'1-move to conf file \r\n2-download release version \r\n3-and org file remove\r\n4-rename download release version\r\n5-copy conf file phpmyadmin foder \r\nsystem restart or reboot \r\n',1,'',1),(22,24,'selinux lableing or selinux setenforce 0 ',1,'',1),(23,25,'Run windows update.',1,'',1),(24,27,'Window + R - shell:startup and make shortcut of ctfmon.exe in the startup folder',1,'',1),(25,28,'&lt;h1&gt;aaaaaaaaaaaaaaaaaaaa&lt;/h1&gt;',1,'',0),(26,29,'reinstall Microsoft office 2010 ',1,'',1),(27,30,'Change HDMI cable',1,'',1),(28,31,'win+R &gt; ncpa.cpl &gt; Disable and Enable Network card',1,'',1),(29,29,'Uninstall the Key Magic and add the Myanmar keyboard in keyboard from &quot;Windows Language&quot;',1,'',1),(30,30,'Connect laptop and Mi TV wirelessly with &quot;Miracast&quot;\r\n',1,'',1),(31,30,'Search the method of connecting wirelessly\r\n',1,'',1),(32,35,'Router and Switches are used by plugging them directly into the power cord.\r\n\r\n',1,'',1);
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
INSERT INTO `sub_category` VALUES (28,11,'Webcam','1'),(29,11,'HDMI','1'),(30,11,'Printer','1'),(31,11,'Laptop','1'),(32,12,'PDF preview error','0'),(33,13,'Windows 11','1'),(34,14,'Linux','1'),(35,14,'Windows','1'),(36,13,'Windows 10','1'),(37,13,'Windows 8','1'),(38,13,'Windows 7','1'),(39,11,'Network Cable','1'),(40,11,'Other','1');
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

-- Dump completed on 2022-11-09  3:44:04
