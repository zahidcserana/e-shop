-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: eshop
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` float(15,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `pay` float(15,2) DEFAULT '0.00',
  `due` float(15,2) DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1= due, 2=partial, 3=paid',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (3,1,333.00,'ERP',33.00,300.00,1,'2018-11-27 17:29:19','2018-11-27 17:29:19'),(4,2,777.00,'ERP',NULL,NULL,1,'2018-11-27 17:30:25','2018-11-27 17:30:25'),(5,3,10000.00,'jgjgjhghj',1000.00,5.00,1,'2018-11-29 14:45:27',NULL),(6,2,5000.00,'hjtdj',1000.00,4000.00,1,'2018-11-29 14:46:54',NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (4,'Jony',1,'2018-07-18 01:29:46','2018-07-18 01:29:46');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` float(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `discount` float(15,2) DEFAULT '0.00',
  `sub_total` float(15,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vat` float(15,2) DEFAULT '0.00',
  `total_payble` float(15,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (1,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(2,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(3,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(4,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(5,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(6,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(7,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(8,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(9,NULL,9,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(10,5,11,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(11,6,10,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(12,7,9,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(13,7,8,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(14,8,4,44.00,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(15,8,5,55.00,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(16,9,7,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(17,9,4,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(18,9,6,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(19,10,10,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(20,10,11,NULL,NULL,NULL,NULL,NULL,NULL,0.00,0.00),(21,10,4,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(22,10,5,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(23,10,5,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(24,10,5,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(25,10,4,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(26,10,5,110.00,1,NULL,110.00,NULL,NULL,0.00,0.00),(27,10,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(28,10,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(29,10,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(30,10,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(31,10,6,110.00,1,10.00,110.00,NULL,NULL,0.00,0.00),(32,10,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(33,11,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(34,11,5,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(35,12,4,110.00,10,0.00,399168000.00,NULL,NULL,0.00,0.00),(36,12,8,110.00,3,0.00,660.00,NULL,NULL,0.00,0.00),(37,13,4,110.00,4,0.00,440.00,NULL,NULL,0.00,0.00),(38,13,5,110.00,3,0.00,330.00,NULL,NULL,0.00,0.00),(39,14,3,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(40,14,5,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(41,14,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(42,15,7,110.00,2,0.00,220.00,NULL,NULL,0.00,0.00),(43,15,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(44,16,4,110.00,2,0.00,220.00,NULL,NULL,0.00,0.00),(45,16,6,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(46,17,5,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(47,17,11,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(48,18,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(49,18,11,110.00,2,0.00,220.00,NULL,NULL,0.00,0.00),(50,18,4,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(51,18,5,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(52,19,7,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(53,19,9,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(54,20,7,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(55,20,8,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(56,20,19,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(57,21,6,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00),(58,21,13,110.00,1,0.00,110.00,NULL,NULL,0.00,0.00);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT '0',
  `sub_total` float DEFAULT '0',
  `discount` float DEFAULT '0',
  `total_payble` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vat` float(15,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (2,NULL,NULL,NULL,NULL,'2018-09-28 22:16:30','2018-09-28 22:16:30',0.00),(3,NULL,NULL,NULL,NULL,'2018-09-28 22:16:40','2018-09-28 22:16:40',0.00),(4,NULL,NULL,NULL,NULL,'2018-09-28 22:17:42','2018-09-28 22:17:42',0.00),(5,NULL,NULL,NULL,NULL,'2018-09-28 22:18:08','2018-09-28 22:18:08',0.00),(6,NULL,NULL,NULL,NULL,'2018-09-28 22:18:25','2018-09-28 22:18:25',0.00),(7,NULL,NULL,NULL,NULL,'2018-09-28 22:28:21','2018-09-28 22:28:21',0.00),(8,NULL,NULL,NULL,NULL,'2018-10-02 18:43:40','2018-10-02 18:43:40',0.00),(9,NULL,NULL,NULL,NULL,'2018-10-02 22:44:33','2018-10-02 22:44:33',0.00),(10,12,1320,10,1310,'2018-10-09 08:17:16','2018-10-09 08:17:16',0.00),(11,2,220,0,220,'2018-10-28 20:52:12','2018-10-28 20:52:12',0.00),(12,13,399169000,0,399169000,'2018-11-14 09:03:59','2018-11-14 09:03:59',0.00),(13,7,770,0,770,'2018-11-15 08:50:08','2018-11-15 08:50:08',0.00),(14,3,330,0,330,'2018-11-20 23:40:23','2018-11-20 23:40:23',0.00),(15,3,330,0,330,'2018-11-21 07:02:12','2018-11-21 07:02:12',0.00),(16,3,330,0,330,'2019-07-27 08:19:20','2019-07-27 08:19:20',0.00),(17,2,220,0,220,'2019-07-31 19:05:52','2019-07-31 19:05:52',0.00),(18,5,550,0,550,'2019-08-02 18:25:19','2019-08-02 18:25:19',0.00),(19,0,0,0,0,'2019-08-04 22:08:52','2019-08-04 22:08:52',0.00),(20,3,330,0,330,'2019-08-05 08:12:01','2019-08-05 08:12:01',0.00),(21,2,220,0,220,'2019-09-03 20:37:57','2019-09-03 20:37:57',0.00);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'Bike Parts',NULL,NULL,'bike-parts',1,'2019-09-04 02:22:33',NULL),(2,NULL,'Car Parts',NULL,NULL,'car-parts',1,'2019-09-04 02:22:37',NULL),(3,NULL,'Cars',NULL,NULL,'cars',1,'2019-09-04 02:22:41',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '2',
  `payment_type` tinyint(4) NOT NULL DEFAULT '2',
  `contact_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,1,'Md Rana cse','zahidcuet@yahoo.com','gfdgf','0413542390','0417565644','Leaping','ERP',2,2,'2018-11-16',NULL,NULL),(2,1,'jamil','jamil@yahoo.com','polton, polton','417565644','1939306986','Leaping','ERP',2,2,'2018-11-16',NULL,NULL),(3,1,'jakaria Hossain','jakaria5468@gmail.com','ashulia savar dhaka','01715436121','01715436121','maya mithu fashion','job',2,2,'2018-11-29',NULL,NULL),(4,1,'Sumon Sumon Sumon','zahid1004048+Sumon@gmail.com','Sumon, Sumon','413542390',NULL,NULL,NULL,2,2,NULL,'2019-09-03 20:40:13',NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `original` varchar(255) NOT NULL,
  `large` varchar(255) DEFAULT NULL,
  `small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (8,25,'00260718.jpg','thumb_68044580.jpg',NULL,'2018-09-10 03:33:54','2018-09-10 03:33:54'),(13,4,'73522938.jpg','thumb_52079133.jpg',NULL,'2018-07-15 23:42:29','2018-07-15 23:42:29'),(14,4,'48291091.jpg','thumb_80667447.jpg',NULL,'2018-07-15 23:42:37','2018-07-15 23:42:37'),(15,4,'15241107.jpg','thumb_63759451.jpg',NULL,'2018-07-17 00:26:06','2018-07-17 00:26:06'),(16,35,'13270701.jpg','thumb_73028059.jpg',NULL,'2018-07-18 01:38:30','2018-07-18 01:38:30'),(17,3,'78492085.jpg','thumb_74108329.jpg',NULL,'2018-08-28 03:12:23','2018-08-28 03:12:23'),(18,24,'25298500.gif','thumb_87925437.gif',NULL,'2018-09-06 04:47:55','2018-09-06 04:47:55'),(19,24,'19171502.jpeg','thumb_69216415.jpeg',NULL,'2018-09-08 05:39:33','2018-09-08 05:39:33'),(20,26,'14992690.jpg','thumb_42180830.jpg',NULL,'2018-09-10 03:32:38','2018-09-10 03:32:38'),(21,1,'18623437.jpg','thumb_98023250.jpg',NULL,'2019-07-28 02:58:01','2019-07-27 20:58:01'),(22,1,'73058606.jpg','thumb_79108816.jpg',NULL,'2019-07-28 03:28:15','2019-07-27 21:28:15'),(23,1,'82692230.jpg','thumb_98500314.jpg',NULL,'2019-07-28 03:29:46','2019-07-27 21:29:46'),(24,1,'05542102.jpg','thumb_35638217.jpg',NULL,'2019-07-29 02:54:05','2019-07-28 20:54:05'),(25,1,'11957923.jpg','thumb_76920783.jpg',NULL,'2019-07-29 03:30:05','2019-07-28 21:30:05'),(26,1,'29806227.jpg','thumb_32176876.jpg',NULL,'2019-07-29 03:36:44','2019-07-28 21:36:44'),(27,6,'22670987.jpg','thumb_91784902.jpg',NULL,'2019-07-29 03:41:48','2019-07-28 21:41:48'),(28,3,'03354281.jpg','thumb_61376301.jpg',NULL,'2019-08-03 00:53:46','2019-08-02 18:53:46'),(29,3,'05203748.jpg','thumb_57371264.jpg',NULL,'2019-08-03 00:54:06','2019-08-02 18:54:06'),(30,3,'25756940.jpg','thumb_20535424.jpg',NULL,'2019-08-03 01:24:52','2019-08-02 19:24:52'),(31,5,'78801524.jpg','thumb_53818706.jpg',NULL,'2019-08-03 01:28:14','2019-08-02 19:28:14'),(32,5,'05828963.jpg','thumb_08615409.jpg',NULL,'2019-08-03 01:29:45','2019-08-02 19:29:45'),(33,6,'90608153.jpg','thumb_76167819.jpg',NULL,'2019-08-03 01:44:54','2019-08-02 19:44:54'),(34,6,'19327453.jpeg','thumb_35581724.jpeg',NULL,'2019-08-03 01:47:05','2019-08-02 19:47:05'),(35,6,'04791696.jpg','thumb_01768758.jpg',NULL,'2019-08-03 01:47:53','2019-08-02 19:47:53'),(36,3,'70260150.jpeg','thumb_42025304.jpeg',NULL,'2019-09-04 17:08:49','2019-09-04 11:08:49'),(37,3,'14028253.jpeg','thumb_93390019.jpeg',NULL,'2019-09-04 17:08:57','2019-09-04 11:08:57'),(38,4,'32410781.jpeg','thumb_24913307.jpeg',NULL,'2019-09-05 02:15:05','2019-09-04 20:15:05');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_11_24_150309_create_customers_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` float(15,2) DEFAULT '0.00',
  `quantity` int(11) DEFAULT '0',
  `sub_total` float(15,2) DEFAULT '0.00',
  `vat` float(15,2) DEFAULT '0.00',
  `total_payble` float(15,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount` float(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,5,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:32:26',NULL,0.00),(2,5,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:32:26',NULL,0.00),(3,6,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:32:42',NULL,0.00),(4,6,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:32:42',NULL,0.00),(5,7,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:39:38',NULL,0.00),(6,7,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:39:38',NULL,0.00),(7,7,NULL,0.00,1,110.00,0.00,0.00,'2019-08-05 08:39:38',NULL,0.00),(8,9,6,110.00,1,110.00,0.00,0.00,'2019-09-03 21:21:04',NULL,0.00),(9,9,13,110.00,1,110.00,0.00,0.00,'2019-09-03 21:21:04',NULL,0.00);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_payble` float(15,2) DEFAULT '0.00',
  `vat` float(15,2) DEFAULT '0.00',
  `discount` float(15,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_total` float(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_status` enum('PENDING','INPROGRESS','COMPLETE','REJECT','ARCHIVE') DEFAULT 'PENDING',
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,0.00,0.00,0.00,'2019-08-05 08:28:08',NULL,0.00,0,'PENDING',NULL),(2,0.00,0.00,0.00,'2019-08-05 08:28:48',NULL,0.00,0,'PENDING',NULL),(3,0.00,0.00,0.00,'2019-08-05 08:30:46',NULL,0.00,0,'PENDING',NULL),(4,0.00,0.00,0.00,'2019-08-05 08:31:45',NULL,0.00,0,'PENDING',NULL),(5,0.00,0.00,0.00,'2019-08-05 08:32:26',NULL,0.00,0,'PENDING',NULL),(6,0.00,0.00,0.00,'2019-08-05 08:32:42',NULL,0.00,0,'PENDING',NULL),(7,330.00,0.00,0.00,'2019-08-05 08:39:38',NULL,330.00,3,'PENDING',NULL),(8,220.00,0.00,0.00,'2019-09-03 21:20:10',NULL,220.00,2,'PENDING',4),(9,220.00,0.00,0.00,'2019-09-03 21:21:04',NULL,220.00,2,'PENDING',4);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `sub_sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Car-1','This is',3,7,4,4,110,'[3,1]','[\"9\",\"10\",\"11\"]',37,1,'2018-07-11 19:30:22','2018-07-11 19:30:22',1),(4,'Bike 1','wwww',1,1,1,4,110,'[1]','[\"9\"]',38,1,'2018-07-12 17:50:36','2018-07-12 17:50:36',1),(5,'Product-3','Consequatur accusamus enim veritatis earum dolorem. Quasi est autem repellat est rerum soluta. Vitae aut debitis sint deleniti sunt voluptas.',3,9,1,4,110,NULL,NULL,32,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',1),(6,'Myah Pfeffer I','Voluptate numquam sunt perspiciatis aut nulla. Nam quae blanditiis aut temporibus vitae. Beatae autem dolores cumque. Unde voluptate quaerat sunt fugiat.',1,1,1,NULL,110,NULL,NULL,34,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(7,'Miss Maybell Hand','Quo doloremque tempore nihil. Hic ut ea odit ipsum. Est et voluptatem in rem unde et.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(8,'Cleta Schmitt','Molestiae eum itaque sapiente. Facere tempore et commodi nihil. Et enim sed reiciendis sint a. Repudiandae repudiandae eius optio labore.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(9,'Ibrahim Hettinger','Molestias qui voluptates sit et sed doloribus. Vitae non laboriosam in. Ipsa ducimus dolor dolores molestiae quo. Rem eaque eum aut eum qui.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(10,'Dejah Weber','Impedit laborum voluptas est voluptas rem. Numquam labore commodi aut fuga. Reprehenderit aliquam quis ut.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(11,'Prof. Laura VonRueden','Minima tempora ipsam labore iure nesciunt. Maiores molestias maiores enim eos temporibus. Quia ipsam rerum impedit.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(13,'Ada Wilkinson','Perferendis labore est facere porro nobis non. Accusantium esse ut qui molestias minima minima. Animi repellat consectetur eos non fuga porro. Magnam enim molestiae nihil corporis ducimus quis sint.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(14,'Miss Charlotte Streich IV','Odio minima et modi quia quisquam nesciunt. Rerum rerum laudantium odit aspernatur. Molestias veritatis a iusto. Dolorem optio repudiandae quibusdam commodi. Et incidunt tempora qui aut.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(15,'Geoffrey Oberbrunner','Et cumque esse maxime libero. Est est sit saepe sed dolorum itaque. Dolore et et molestias nisi sit mollitia illum.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:49','2018-07-15 18:43:49',NULL),(16,'Dr. Adam Little','Neque error aut perspiciatis unde eum ducimus. Alias ab magnam non quidem reprehenderit illo.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(17,'Hollie Kunde DDS','Ex perferendis neque soluta eius architecto. Optio exercitationem mollitia voluptatibus magni corporis placeat qui. Ipsa sed et sunt aut itaque est. Sed amet dolores est labore quo.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(18,'Dr. Brandt Johnston Jr.','Fuga eveniet cum adipisci corporis pariatur minus quibusdam. Nobis at maxime est deserunt sapiente harum. Nam eveniet aspernatur iste et. Et omnis cupiditate amet architecto.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(19,'Quinten Ankunding','Officia omnis voluptatem quis ab. Est minus error et ut. Inventore est possimus fugit.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(20,'Brad Volkman','Eum iusto molestiae cum laboriosam natus molestiae ut. Odit enim odio alias nostrum. Labore et possimus voluptas. Esse ea repudiandae odit vel.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(21,'Ms. Roslyn Schneider','Qui molestias voluptates aut. Id autem in quia debitis eaque in. Aut numquam qui tempore aut. Voluptatem molestiae harum in hic porro id maxime. Beatae non enim qui et nulla fugit.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(22,'Joseph Hoeger PhD','Consequatur aliquam sed odit tempora odit. Vel repellendus qui harum veritatis. Qui laboriosam est earum totam exercitationem libero.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(23,'Lowell Osinski IV','Aut dolores aspernatur earum aperiam et officia officia rerum. Eaque nam reprehenderit quisquam voluptatibus aspernatur omnis optio eos. Aut libero aut vel reiciendis nostrum.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(24,'Jonatan Keebler','Explicabo nemo odit ratione itaque provident a qui consequatur. Aut et nulla vel et debitis autem at. Similique ullam voluptatibus molestiae in. Quia voluptatem nam optio ea.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(25,'Alexanne Ratke','Cumque ullam ex voluptas dolorem. Expedita ad corporis totam aut voluptatem. Vel ut est enim accusamus. Molestias consequuntur neque quasi aliquam est.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(26,'Maximo Christiansen Jr.','Quis laudantium recusandae distinctio consequatur quia ex sit. Aperiam neque qui consectetur ut enim voluptates. Aut nesciunt placeat molestias sunt velit voluptatem.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(27,'Liliana Kreiger','Dolores voluptatem velit magnam. Nesciunt maiores doloribus repellendus. Fugiat ab nihil dolor dolores eum id. Nihil sequi est qui illum rerum qui sed.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:50','2018-07-15 18:43:50',NULL),(28,'Karen Hamill Jr.','Enim a eveniet quibusdam veniam. Magnam qui doloribus praesentium iure sunt. Voluptatem hic explicabo voluptates ad. Facere odit rem est aut.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(29,'Dr. Wilber Price','Cupiditate minus accusamus sunt et qui. Nihil dolor autem fugit corporis est. Earum et omnis vel aut molestiae. Aut et qui necessitatibus.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(30,'Prof. Kenneth Corkery','Commodi sunt non voluptatem tenetur placeat nostrum. Aut tempora modi pariatur quia. Non sed aut porro omnis illum et. Enim sit et nihil quis eligendi. Consequatur unde nisi cum nisi et officia.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(31,'Cory Beahan','Totam quia magnam doloribus debitis odit. Officiis consequatur ipsa dolores animi. Occaecati sequi nisi totam similique.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(32,'Ed Okuneva','Exercitationem qui omnis quasi assumenda aut autem eum. Adipisci dolores unde tempore esse non est dolorem.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(33,'Raheem Lang','Quis dignissimos non quibusdam totam. Nam aspernatur facilis explicabo dicta architecto libero excepturi. Et rerum perferendis iste autem qui eos. Delectus vel non rerum ipsam quod et illo deserunt.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(34,'Dr. Javonte Schuppe DDS','Non nam iure nisi. Vel aperiam qui sit quis dolores dolore. Cumque sunt sint tenetur quis. Totam accusantium ea ratione corrupti culpa nihil alias.',1,1,1,NULL,110,NULL,NULL,NULL,1,'2018-07-15 18:43:51','2018-07-15 18:43:51',NULL),(35,'Zahid','wrereadsa',1,1,1,4,110,'[\"3\"]','[\"9\"]',NULL,1,'2018-07-18 01:38:02','2018-07-18 01:38:02',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Active','2018-09-04 12:04:29','2018-09-04 12:04:29'),(2,'Inactive','2018-09-04 12:04:29','2018-09-04 12:04:29'),(3,'Pending','2018-09-04 12:05:16','2018-09-04 12:05:16'),(4,'Deleted','2018-09-04 12:05:16','2018-09-04 12:05:16');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categories`
--

LOCK TABLES `sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_categories` DISABLE KEYS */;
INSERT INTO `sub_categories` VALUES (1,1,'New',1,'2019-09-04 02:27:23',NULL),(2,1,'Recondition',1,'2019-09-04 02:27:38',NULL),(3,1,'Used',1,'2019-09-04 02:28:05',NULL),(4,2,'New',1,'2019-09-04 02:28:11',NULL),(5,2,'Recondition',1,'2019-09-04 02:28:18',NULL),(6,2,'Used',1,'2019-09-04 02:28:29',NULL),(7,3,'New',1,'2019-09-04 02:28:40',NULL),(8,3,'Recondition',1,'2019-09-04 02:28:46',NULL),(9,3,'Used',1,'2019-09-04 02:28:52',NULL);
/*!40000 ALTER TABLE `sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_sub_categories`
--

DROP TABLE IF EXISTS `sub_sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_sub_categories`
--

LOCK TABLES `sub_sub_categories` WRITE;
/*!40000 ALTER TABLE `sub_sub_categories` DISABLE KEYS */;
INSERT INTO `sub_sub_categories` VALUES (1,2,1,'Red',1,'2018-07-09 17:45:32','2018-07-09 17:45:32'),(3,1,2,'Blue',1,'2018-07-09 17:46:38','2018-07-09 17:46:38'),(4,2,1,'Green',1,'2018-07-09 17:46:43','2018-07-09 17:46:43');
/*!40000 ALTER TABLE `sub_sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,2,'Zahid','admin@dreamsoftbd.com','$2y$10$ZEglbnmJalchmn8tu3NAROIGCfIDoi6jp1NGqoV.npLRIB4m4SwNy','zvs7a9dDuJfGKo0N5s1RY6PjXC43vfezVsNryicPu1yi1nEFe5kkQXwLpyIF','2018-07-07 02:42:26','2018-07-07 02:42:26'),(2,2,'Palma Schuppe','barrows.gerry@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','Gw0b8u6KQA','2018-07-15 18:36:57','2018-07-15 18:36:57'),(3,2,'Corene Boehm','margret.pouros@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','Mecw8Eb4zy','2018-07-15 18:36:57','2018-07-15 18:36:57'),(4,2,'Gwendolyn Schoen','pjacobi@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','nxGbhJCazQ','2018-07-15 18:36:57','2018-07-15 18:36:57'),(5,2,'Queenie McClure MD','gutmann.jules@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','bXyTZLv9lQ','2018-07-15 18:36:57','2018-07-15 18:36:57'),(6,2,'Francis Reynolds','syble.schultz@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','w79Zo7jRfB','2018-07-15 18:36:57','2018-07-15 18:36:57'),(7,2,'Ms. Salma Wolff PhD','bartell.chanel@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','b2oV1pHrhA','2018-07-15 18:36:57','2018-07-15 18:36:57'),(8,2,'Brendon Turcotte','hallie03@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','dWdqYfcmQp','2018-07-15 18:36:58','2018-07-15 18:36:58'),(9,2,'Marcellus Barton','hailee65@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','GGrayUTHdK','2018-07-15 18:36:58','2018-07-15 18:36:58'),(10,2,'Micaela Gleichner','ayana69@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','rV4cYF0F5t','2018-07-15 18:36:58','2018-07-15 18:36:58'),(11,2,'Camryn McDermott MD','nicolas59@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','q5pH38k6c2','2018-07-15 18:36:58','2018-07-15 18:36:58'),(12,2,'Dr. Quentin Feest','herman.nash@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','pvRglY6UEq','2018-07-15 18:36:58','2018-07-15 18:36:58'),(13,2,'Meda Armstrong','alison.witting@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','d8hUsLLKCg','2018-07-15 18:36:58','2018-07-15 18:36:58'),(14,2,'Grace Boyle','mariano91@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','9zB9Vz1Qre','2018-07-15 18:36:58','2018-07-15 18:36:58'),(15,2,'Niko Koss','ubalistreri@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','HS5uQDYUUP','2018-07-15 18:36:58','2018-07-15 18:36:58'),(16,2,'Ole Marvin III','toy.jensen@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','QBhlBwUL4O','2018-07-15 18:36:58','2018-07-15 18:36:58'),(17,2,'Miss Fatima Gislason IV','bernier.ross@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','ugWEv3TEJR','2018-07-15 18:36:58','2018-07-15 18:36:58'),(18,2,'Ms. Janice Kemmer','vfritsch@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','sKQbD5rVvm','2018-07-15 18:36:58','2018-07-15 18:36:58'),(19,2,'Prof. Candelario Quitzon DVM','monique45@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','n4LrubyvNI','2018-07-15 18:36:58','2018-07-15 18:36:58'),(20,2,'Prof. Walker Jaskolski','sally.klocko@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','ff5NHEvj0E','2018-07-15 18:36:58','2018-07-15 18:36:58'),(21,2,'Magdalen Wunsch','mayra.lynch@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','IMf192yjbL','2018-07-15 18:36:58','2018-07-15 18:36:58'),(22,2,'Christy Osinski','michaela.kerluke@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','qeY8huLZrF','2018-07-15 18:36:58','2018-07-15 18:36:58'),(23,2,'Ceasar Schulist','cheyanne69@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','8MjuGkJQsf','2018-07-15 18:36:59','2018-07-15 18:36:59'),(24,2,'Dr. Ari Yost I','muller.richie@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','Kqpzk0Bfck','2018-07-15 18:36:59','2018-07-15 18:36:59'),(25,2,'Sharon Morar','erica.west@example.net','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','8KMWevh5N4','2018-07-15 18:36:59','2018-07-15 18:36:59'),(26,2,'Chandler Schneider','chesley.jakubowski@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','LzHZ78IrEA','2018-07-15 18:36:59','2018-07-15 18:36:59'),(27,2,'Mr. Ramiro Terry','solon75@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','pwGJHNkixN','2018-07-15 18:36:59','2018-07-15 18:36:59'),(28,2,'Brenna Hansen','mmueller@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','gZyUw6QhUv','2018-07-15 18:36:59','2018-07-15 18:36:59'),(29,2,'Russel Wisoky DVM','theron.borer@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','NOZPS27NTa','2018-07-15 18:36:59','2018-07-15 18:36:59'),(30,2,'Corbin Harvey','kelly.muller@example.com','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','HLRBDwVWWj','2018-07-15 18:36:59','2018-07-15 18:36:59'),(31,2,'Aliza Nader','lubowitz.abe@example.org','$2y$10$I4DrPy/gfLp5TXx89LmB/uAX0R657wKt37r1fobPl/Mq/TxiMN44u','Ljqd6Y48Xm','2018-07-15 18:36:59','2018-07-15 18:36:59'),(32,2,'Prof. Rae Toy','erdman.odell@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','X5IgNBcVhC','2018-07-15 18:43:02','2018-07-15 18:43:02'),(33,2,'Alberto Steuber','sincere70@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','n31vbIr2Tm','2018-07-15 18:43:02','2018-07-15 18:43:02'),(34,2,'Mr. Presley Cummings V','raheem84@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','urJzmVPb2a','2018-07-15 18:43:02','2018-07-15 18:43:02'),(35,2,'Constantin O\'Reilly III','harrison.johns@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','7QqWag0Yvb','2018-07-15 18:43:02','2018-07-15 18:43:02'),(36,2,'Ron Schroeder','eva60@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','Glnn10hR5B','2018-07-15 18:43:02','2018-07-15 18:43:02'),(37,2,'Tyler Konopelski','fay.kellen@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','s6J2EpVCWY','2018-07-15 18:43:02','2018-07-15 18:43:02'),(38,2,'Eliza Prohaska','leonard.osinski@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','TRF0eJnpFw','2018-07-15 18:43:03','2018-07-15 18:43:03'),(39,2,'Prof. Esta Berge','nbradtke@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','DxM4DlaI60','2018-07-15 18:43:03','2018-07-15 18:43:03'),(40,2,'Dr. Otilia Orn DVM','enrico34@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','yGcIKGrzJ0','2018-07-15 18:43:03','2018-07-15 18:43:03'),(41,2,'Annetta Murazik','christelle.goyette@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','m2cIXenOVt','2018-07-15 18:43:03','2018-07-15 18:43:03'),(42,2,'Dr. Jeramie O\'Kon DVM','bulah.adams@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','yMPcbdvJhy','2018-07-15 18:43:03','2018-07-15 18:43:03'),(43,2,'Johan Leuschke','ruben83@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','ZjzQLtnKkt','2018-07-15 18:43:03','2018-07-15 18:43:03'),(44,2,'Kendra Satterfield DDS','athena.langworth@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','0b2UFwuoQT','2018-07-15 18:43:03','2018-07-15 18:43:03'),(45,2,'Dr. Ashlynn Rodriguez','gisselle.jast@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','Q9noNbmy7a','2018-07-15 18:43:03','2018-07-15 18:43:03'),(46,2,'Joana Feest','mertie.powlowski@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','rlBH8vWJUr','2018-07-15 18:43:03','2018-07-15 18:43:03'),(47,2,'Dr. Trevion Lakin','bethel.crooks@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','90rgLi5wY9','2018-07-15 18:43:03','2018-07-15 18:43:03'),(48,2,'Emmanuelle Smitham','habernathy@example.com','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','1toTUWQQqH','2018-07-15 18:43:03','2018-07-15 18:43:03'),(49,2,'Dr. Brandy Macejkovic','acummerata@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','H2xhchrpom','2018-07-15 18:43:03','2018-07-15 18:43:03'),(50,2,'Delpha Rosenbaum III','stokes.eino@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','5uwk9wsCLj','2018-07-15 18:43:04','2018-07-15 18:43:04'),(51,2,'Dr. Tobin Bergnaum','demetrius.labadie@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','UqnQffn8Oo','2018-07-15 18:43:04','2018-07-15 18:43:04'),(52,2,'Orlo Jenkins','dkertzmann@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','8QOBtOf0vE','2018-07-15 18:43:04','2018-07-15 18:43:04'),(53,2,'Prof. Kali Kshlerin III','lilian03@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','h6LZoKbmRk','2018-07-15 18:43:04','2018-07-15 18:43:04'),(54,2,'Dr. Jalon Champlin IV','dhalvorson@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','Zcb1e9Mnfa','2018-07-15 18:43:04','2018-07-15 18:43:04'),(55,2,'Mr. Royce Medhurst I','aubrey.mayer@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','vtCHhBXWe0','2018-07-15 18:43:04','2018-07-15 18:43:04'),(56,2,'Dario Boyle','west.jeff@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','rjuI7dGBnu','2018-07-15 18:43:04','2018-07-15 18:43:04'),(57,2,'Matilde Mohr','stanton.anastacio@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','nlbn1PC7VF','2018-07-15 18:43:05','2018-07-15 18:43:05'),(58,2,'Mrs. Alessandra Harris','mable.schmeler@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','FB5Y1fVbnJ','2018-07-15 18:43:05','2018-07-15 18:43:05'),(59,2,'Mrs. Lisette Marquardt Jr.','colt.durgan@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','0ApUhb7ktq','2018-07-15 18:43:05','2018-07-15 18:43:05'),(60,2,'Mrs. Greta Runolfsson','runte.jada@example.org','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','gy3rKwhLxK','2018-07-15 18:43:05','2018-07-15 18:43:05'),(61,2,'Brandi Blick','fswaniawski@example.net','$2y$10$WwBeAxu1f0rnph6jPc78eOYVgRf7JppwAMpmJmiWUBOXdyu2Ydjqa','EM3evskNVt','2018-07-15 18:43:05','2018-07-15 18:43:05'),(62,2,'Cielo Halvorson','pamela.blanda@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','nSDuZpbNoP','2018-07-15 18:43:47','2018-07-15 18:43:47'),(63,2,'Miss Keira Runolfsson','bbrakus@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','7wzmcfR5Au','2018-07-15 18:43:47','2018-07-15 18:43:47'),(64,2,'Susanna Stehr','fdare@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','fOhIRkm8ws','2018-07-15 18:43:47','2018-07-15 18:43:47'),(65,2,'Dr. Jaime Hudson Jr.','lea23@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','ZOCHlTpp9u','2018-07-15 18:43:47','2018-07-15 18:43:47'),(66,2,'Dr. Clay Gleichner','eloisa27@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','A9zq0RXsog','2018-07-15 18:43:47','2018-07-15 18:43:47'),(67,2,'Lawrence Farrell','lennie.ferry@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','F2JjpzT2ex','2018-07-15 18:43:47','2018-07-15 18:43:47'),(68,2,'Prof. Maybelle Reichel IV','gmetz@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','UgYBSY8cqe','2018-07-15 18:43:47','2018-07-15 18:43:47'),(69,2,'Khalid Auer','nya.bailey@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','76uao0nfi2','2018-07-15 18:43:47','2018-07-15 18:43:47'),(70,2,'Emelie Roob','margarita33@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','Ur1hyfu6pA','2018-07-15 18:43:47','2018-07-15 18:43:47'),(71,2,'Jadyn Price','conner28@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','GrRsoiiZmY','2018-07-15 18:43:47','2018-07-15 18:43:47'),(72,2,'Matt Jacobson','darby43@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','2K7Ms842ng','2018-07-15 18:43:47','2018-07-15 18:43:47'),(73,2,'Dr. Sandrine Zulauf','nstrosin@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','O79Kmd41oi','2018-07-15 18:43:47','2018-07-15 18:43:47'),(74,2,'Mr. Rowan Kerluke Sr.','psatterfield@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','eDJrLS4lFk','2018-07-15 18:43:47','2018-07-15 18:43:47'),(75,2,'Blair Ruecker','tprosacco@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','zVkoi2aA6V','2018-07-15 18:43:48','2018-07-15 18:43:48'),(76,2,'Roman Moore','kerluke.jessika@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','VgwMuoxNDW','2018-07-15 18:43:48','2018-07-15 18:43:48'),(77,2,'Anjali Tremblay PhD','esther84@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','IMknvoCGMM','2018-07-15 18:43:48','2018-07-15 18:43:48'),(78,2,'Wallace Toy Jr.','dorcas58@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','hyOZVAx8py','2018-07-15 18:43:48','2018-07-15 18:43:48'),(79,2,'Prof. Walker Hamill','lwisoky@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','9qQzdzuazH','2018-07-15 18:43:48','2018-07-15 18:43:48'),(80,2,'Prof. Kristofer Schimmel II','ukub@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','6jWQCyfNBT','2018-07-15 18:43:48','2018-07-15 18:43:48'),(81,2,'Golda Crist','harber.ike@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','QlMCh6WmYD','2018-07-15 18:43:48','2018-07-15 18:43:48'),(82,2,'Franco Stamm','wdouglas@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','OSPgaNnqCZ','2018-07-15 18:43:48','2018-07-15 18:43:48'),(83,2,'Quinn Denesik','mills.cora@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','wT6yEJ0ZNn','2018-07-15 18:43:48','2018-07-15 18:43:48'),(84,2,'Deonte Crooks Sr.','raphaelle.white@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','gUAOq8MzyJ','2018-07-15 18:43:48','2018-07-15 18:43:48'),(85,2,'Mrs. Jakayla Pfeffer','marcus.ohara@example.com','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','sWdD3wTGkV','2018-07-15 18:43:48','2018-07-15 18:43:48'),(86,2,'Prof. Dee Hessel DVM','hzulauf@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','UPRltGHTAw','2018-07-15 18:43:48','2018-07-15 18:43:48'),(87,2,'Lorine Ruecker','ilind@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','6GhjRTyhyE','2018-07-15 18:43:48','2018-07-15 18:43:48'),(88,2,'Malachi Aufderhar Sr.','paxton.collier@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','jDP72scg8W','2018-07-15 18:43:48','2018-07-15 18:43:48'),(89,2,'Mrs. Aimee Von PhD','klegros@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','4cnKFSCBy4','2018-07-15 18:43:48','2018-07-15 18:43:48'),(90,2,'Anita Bosco','allan.yost@example.net','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','mePiXQBrP1','2018-07-15 18:43:49','2018-07-15 18:43:49'),(91,2,'Mrs. Mossie Kuhlman','armstrong.twila@example.org','$2y$10$LoGiU4XF6Ysbe0LS1UJLle/iWHeOqzeQSbv.9pJn2K39IeLPSkgLS','RNyi9vnv5G','2018-07-15 18:43:49','2018-07-15 18:43:49'),(92,2,'jamil','jamil@yahoo.com','$2y$10$TexglsB9X7TMKLKNlesviu9.EY608N0El9i8P7JST2CiV0bPoTOsO','TmkBl6RvTpQNplgkO4rOEdqkMDNXyKVheW4iqTq7cFswr5JZyw8os9pJHiT1','2018-08-30 19:47:41','2018-08-30 19:47:41');
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

-- Dump completed on 2019-09-05  8:46:30
