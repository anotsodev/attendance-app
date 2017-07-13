CREATE DATABASE  IF NOT EXISTS `nstpdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nstpdb`;
-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: 192.168.10.10    Database: nstpdb
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

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
-- Table structure for table `classcodes`
--

DROP TABLE IF EXISTS `classcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_code_desc` varchar(45) NOT NULL,
  `instructor_full_name` varchar(45) NOT NULL,
  `school_year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classcodes`
--

LOCK TABLES `classcodes` WRITE;
/*!40000 ALTER TABLE `classcodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `classcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `school_year` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`event_id`) KEY_BLOCK_SIZE=8
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 KEY_BLOCK_SIZE=16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Event 1','2015 - 2016'),(2,'Event 2','2016 - 2017');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentattendance`
--

DROP TABLE IF EXISTS `studentattendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentattendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `class_code` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `year` varchar(4) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `student_attendance_event_idx` (`event_id`),
  KEY `fk_studentattendance_1_idx` (`class_code`),
  CONSTRAINT `fk_studentattendance_1` FOREIGN KEY (`class_code`) REFERENCES `classcodes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_attendance_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentattendance`
--

LOCK TABLES `studentattendance` WRITE;
/*!40000 ALTER TABLE `studentattendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentattendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitorattendance`
--

DROP TABLE IF EXISTS `visitorattendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitorattendance` (
  `attendance_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `full_name` varchar(45) DEFAULT NULL,
  `date_attended` date DEFAULT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `visitor_attendance_event_idx` (`event_id`),
  CONSTRAINT `visitor_attendance_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitorattendance`
--

LOCK TABLES `visitorattendance` WRITE;
/*!40000 ALTER TABLE `visitorattendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitorattendance` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-13 15:45:05
