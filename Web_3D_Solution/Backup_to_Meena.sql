/*
SQLyog Community v11.52 (64 bit)
MySQL - 5.5.17 : Database - nextdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nextdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `nextdb`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `passcode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`passcode`) values (1,'hh','5e36941b3d856737e81516acd45edc50'),(2,'qq','099b3b060154898840f0ebdfb46ec78f'),(3,'b','b');

/*Table structure for table `markers` */

DROP TABLE IF EXISTS `markers`;

CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `markers` */

insert  into `markers`(`id`,`name`,`address`,`lat`,`lng`,`type`) values (1,'Pan Africa Market','1521 1st Ave, Seattle, WA',47.608940,-122.340141,'restaurant'),(2,'Buddha Thai & Bar','2222 2nd Ave, Seattle, WA',47.613590,-122.344391,'bar'),(3,'The Melting Pot','14 Mercer St, Seattle, WA',47.624561,-122.356445,'restaurant'),(4,'Ipanema Grill','1225 1st Ave, Seattle, WA',47.606365,-122.337654,'restaurant'),(5,'Sake House','2230 1st Ave, Seattle, WA',47.612823,-122.345673,'bar'),(6,'Crab Pot','1301 Alaskan Way, Seattle, WA',47.605961,-122.340363,'restaurant'),(7,'Mama\'s Mexican Kitchen','2234 2nd Ave, Seattle, WA',47.613976,-122.345467,'bar'),(8,'Wingdome','1416 E Olive Way, Seattle, WA',47.617214,-122.326584,'bar'),(9,'Piroshky Piroshky','1908 Pike pl, Seattle, WA',47.610126,-122.342834,'restaurant');

/*Table structure for table `next_id_generator_table` */

DROP TABLE IF EXISTS `next_id_generator_table`;

CREATE TABLE `next_id_generator_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) DEFAULT NULL,
  `SystemId` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `createdDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `next_id_generator_table` */

insert  into `next_id_generator_table`(`id`,`Description`,`SystemId`,`CreatedBy`,`createdDt`) values (1,'Phase','PH00001','1','2015-10-06 11:50:26'),(2,'Phase','PH00002','1','2015-10-06 14:22:34'),(3,'Phase','PH00003','1','2015-11-24 12:30:24'),(4,'Phase','PH00004','1','2015-11-24 12:35:14'),(5,'Phase','PH00005','1','2015-11-24 12:37:24'),(6,'Phase','PH00006','1','2015-11-24 12:39:41'),(7,'Phase','PH00007','1','2015-11-24 12:55:38'),(8,'Phase','PH00008','1','2015-11-24 12:56:53'),(9,'Phase','PH00009','1','2015-11-25 10:23:56'),(10,'Phase','PH00010','1','2015-11-25 11:23:07'),(11,'Phase','PH00011','1','2015-11-25 11:34:18'),(12,'Phase','PH00012','1','2015-11-25 11:42:37'),(13,'Phase','PH00013','1','2015-11-25 11:42:58'),(14,'Phase','PH00014','1','2015-11-25 11:43:54'),(15,'Phase','PH00015','1','2015-11-25 11:44:45'),(16,'Phase','PH00016','1','2015-11-25 11:46:04'),(17,'Phase','PH00017','1','2015-11-25 12:01:50'),(18,'Phase','PH00018','1','2015-11-25 15:03:01'),(19,'Phase','PH00019','1','2015-11-25 15:52:32'),(20,'Phase','PH00020','1','2015-11-25 15:58:21'),(21,'Phase','PH00021','1','2015-11-25 15:59:32'),(22,'Phase','PH00022','1','2015-11-25 16:19:05'),(23,'Phase','PH00023','1','2015-11-25 16:22:04'),(24,'Phase','PH00024','1','2015-11-25 16:24:05'),(25,'Phase','PH00025','1','2015-11-25 16:28:33'),(26,'Phase','PH00026','1','2015-11-25 16:36:37'),(27,'Phase','PH00027','1','2015-11-25 16:39:50'),(28,'Phase','PH00028','1','2015-11-25 16:41:57'),(29,'Phase','PH00029','1','2015-11-25 16:53:48'),(30,'Phase','PH00030','1','2015-11-25 16:55:42'),(31,'Phase','PH00031','1','2015-11-25 16:56:22'),(32,'Phase','PH00032','1','2015-11-25 17:18:24'),(33,'Phase','PH00033','1','2015-11-25 17:19:40'),(34,'Phase','PH00034','1','2015-11-25 17:23:29'),(35,'Phase','PH00035','1','2015-11-25 17:29:17'),(36,'Phase','PH00036','1','2015-11-25 17:35:41'),(37,'Phase','PH00037','1','2015-11-25 17:44:54'),(38,'Phase','PH00038','1','2015-11-26 16:48:23'),(39,'Phase','PH00039','1','2015-11-26 16:54:35'),(40,'Phase','PH00040','1','2015-11-26 16:57:46'),(41,'Phase','PH00041','1','2015-11-26 17:02:45'),(42,'Phase','PH00042','1','2015-11-26 17:07:30'),(43,'Phase','PH00043','1','2015-11-26 17:08:22'),(44,'Phase','PH00044','1','2015-11-26 17:09:33'),(45,'Phase','PH00045','1','2015-11-26 17:10:44'),(46,'Phase','PH00046','1','2015-11-26 17:12:11'),(47,'Phase','PH00047','1','2015-11-26 17:13:26'),(48,'Phase','PH00048','1','2015-11-26 17:14:40'),(49,'Phase','PH00049','1','2015-11-26 17:28:07'),(50,'Phase','PH00050','1','2015-11-26 17:29:27'),(51,'Phase','PH00051','1','2015-11-26 17:30:21'),(52,'Phase','PH00052','1','2015-11-26 17:30:55'),(53,'Phase','PH00053','1','2015-11-26 17:31:14'),(54,'Phase','PH00054','1','2015-11-26 17:32:11'),(55,'Phase','PH00055','1','2015-11-26 17:33:02'),(56,'Phase','PH00056','1','2015-11-26 17:33:59'),(57,'Phase','PH00057','1','2015-11-26 17:35:45'),(58,'Phase','PH00058','1','2015-12-01 09:44:00');

/*Table structure for table `next_main_matched_entry` */

DROP TABLE IF EXISTS `next_main_matched_entry`;

CREATE TABLE `next_main_matched_entry` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `Season` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Item_no` varchar(255) DEFAULT NULL,
  `Option_Code` varchar(255) DEFAULT NULL,
  `Foot_Pack_no` varchar(255) DEFAULT NULL,
  `Fab_Item_no` varchar(255) DEFAULT NULL,
  `FootType` varchar(255) DEFAULT NULL,
  `FootColor` varchar(255) DEFAULT NULL,
  `DetailCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_main_matched_entry` */

/*Table structure for table `next_main_phase_table` */

DROP TABLE IF EXISTS `next_main_phase_table`;

CREATE TABLE `next_main_phase_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PhaseId` varbinary(255) DEFAULT NULL,
  `SeasonId` varchar(255) DEFAULT NULL,
  `categoryId` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Brieffilename` varchar(255) DEFAULT NULL,
  `NewbriefName` varchar(255) DEFAULT NULL,
  `UploadedBy` varchar(255) DEFAULT NULL,
  `UploadedDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `next_main_phase_table` */

insert  into `next_main_phase_table`(`id`,`PhaseId`,`SeasonId`,`categoryId`,`Description`,`Brieffilename`,`NewbriefName`,`UploadedBy`,`UploadedDt`) values (1,'PH00058','31','22','Test upload logic 1','testnext.xlsx','PH00058.xlsx','1','2015-12-01 09:44:00'),(2,'PH00059','31','22','Test upload logic 1','testnext.xlsx','PH00058.xlsx','1','2015-12-21 13:35:15');

/*Table structure for table `next_main_upload_exists` */

DROP TABLE IF EXISTS `next_main_upload_exists`;

CREATE TABLE `next_main_upload_exists` (
  `id` int(11) NOT NULL DEFAULT '0',
  `six_two_six` varchar(500) DEFAULT NULL,
  `product_area` varchar(500) DEFAULT NULL,
  `season` varchar(500) DEFAULT NULL,
  `shape_start_phase` varchar(500) DEFAULT NULL,
  `sofa_range` varchar(500) DEFAULT NULL,
  `material_type` varchar(500) DEFAULT NULL,
  `size_range` varchar(500) DEFAULT NULL,
  `size_descrption` varchar(500) DEFAULT NULL,
  `swatch_item_number` varchar(500) DEFAULT NULL,
  `swatch_item_fabric` varchar(500) DEFAULT NULL,
  `swatch_item_fabric_colour` varchar(500) DEFAULT NULL,
  `foot_start_phase` varchar(500) DEFAULT NULL,
  `foot_type` varchar(500) DEFAULT NULL,
  `foot_colour` varchar(500) DEFAULT NULL,
  `chair_format` varchar(500) DEFAULT NULL,
  `bed_detail` varchar(500) DEFAULT NULL,
  `fabric_start_phase` varchar(500) DEFAULT NULL,
  `pattern_match` varchar(500) DEFAULT NULL,
  `piping` varchar(500) DEFAULT NULL,
  `phaseid` varchar(500) DEFAULT NULL,
  `batchid` varchar(500) DEFAULT NULL,
  `oldbatchid` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_main_upload_exists` */

insert  into `next_main_upload_exists`(`id`,`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`,`batchid`,`oldbatchid`) values (0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL);

/*Table structure for table `next_main_upload_newness` */

DROP TABLE IF EXISTS `next_main_upload_newness`;

CREATE TABLE `next_main_upload_newness` (
  `id` int(11) NOT NULL DEFAULT '0',
  `six_two_six` varchar(500) DEFAULT NULL,
  `product_area` varchar(500) DEFAULT NULL,
  `season` varchar(500) DEFAULT NULL,
  `shape_start_phase` varchar(500) DEFAULT NULL,
  `sofa_range` varchar(500) DEFAULT NULL,
  `material_type` varchar(500) DEFAULT NULL,
  `size_range` varchar(500) DEFAULT NULL,
  `size_descrption` varchar(500) DEFAULT NULL,
  `swatch_item_number` varchar(500) DEFAULT NULL,
  `swatch_item_fabric` varchar(500) DEFAULT NULL,
  `swatch_item_fabric_colour` varchar(500) DEFAULT NULL,
  `foot_start_phase` varchar(500) DEFAULT NULL,
  `foot_type` varchar(500) DEFAULT NULL,
  `foot_colour` varchar(500) DEFAULT NULL,
  `chair_format` varchar(500) DEFAULT NULL,
  `bed_detail` varchar(500) DEFAULT NULL,
  `fabric_start_phase` varchar(500) DEFAULT NULL,
  `pattern_match` varchar(500) DEFAULT NULL,
  `piping` varchar(500) DEFAULT NULL,
  `phaseid` varchar(500) DEFAULT NULL,
  `batchid` varchar(500) DEFAULT NULL,
  `oldbatchid` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_main_upload_newness` */

insert  into `next_main_upload_newness`(`id`,`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`,`batchid`,`oldbatchid`) values (0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL),(0,'854273_19','Beds','Autumn Winter 2015','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL,NULL);

/*Table structure for table `next_main_upload_temp` */

DROP TABLE IF EXISTS `next_main_upload_temp`;

CREATE TABLE `next_main_upload_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `six_two_six` varchar(500) DEFAULT NULL,
  `product_area` varchar(500) DEFAULT NULL,
  `season` varchar(500) DEFAULT NULL,
  `shape_start_phase` varchar(500) DEFAULT NULL,
  `sofa_range` varchar(500) DEFAULT NULL,
  `material_type` varchar(500) DEFAULT NULL,
  `size_range` varchar(500) DEFAULT NULL,
  `size_descrption` varchar(500) DEFAULT NULL,
  `swatch_item_number` varchar(500) DEFAULT NULL,
  `swatch_item_fabric` varchar(500) DEFAULT NULL,
  `swatch_item_fabric_colour` varchar(500) DEFAULT NULL,
  `foot_start_phase` varchar(500) DEFAULT NULL,
  `foot_type` varchar(500) DEFAULT NULL,
  `foot_colour` varchar(500) DEFAULT NULL,
  `chair_format` varchar(500) DEFAULT NULL,
  `bed_detail` varchar(500) DEFAULT NULL,
  `fabric_start_phase` varchar(500) DEFAULT NULL,
  `pattern_match` varchar(500) DEFAULT NULL,
  `piping` varchar(500) DEFAULT NULL,
  `phaseid` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `next_main_upload_temp` */

insert  into `next_main_upload_temp`(`id`,`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`) values (1,'854273_19','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(2,'854273_20','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Double Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(3,'854273_21','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','King Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(4,'854273_22','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Superking Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058'),(5,'860187_19','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(6,'860187_20','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Double Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(7,'860187_21','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','King Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059'),(8,'860187_22','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Superking Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00058'),(9,'844318_20','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','Double Bed','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00058'),(10,'844318_21','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','King Bed','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00059'),(11,'844318_30','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','Double bed with lift up storage','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00058'),(12,'844318_31','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','King bed with lift up storage','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00059'),(13,'844318_68','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','Double bed with 2 storage drawers','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00058'),(14,'844318_69','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','King bed with 2 storage drawers','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00059'),(15,'844318_70','Beds','61','Autumn Winter 2012','Portofino','Fabric','Storage Bedding','Super King bed with 2 storage drawers','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00058'),(16,'832384_19','Beds','61','Autumn Winter 2012','Shoreditch Metal','Metal','Storage Bedding','Single Bed','Not Required','Metal','Brass','Not Required','Not Required','','Not Required','Bed Detail Missing','Not Required','Not Required','Not Required','PH00059'),(17,'832384_20','Beds','61','Autumn Winter 2012','Shoreditch Metal','Metal','Storage Bedding','Double Bed','Not Required','Metal','Brass','Not Required','Not Required','','Not Required','Bed Detail Missing','Not Required','Not Required','Not Required','PH00058'),(18,'832384_21','Beds','61','Autumn Winter 2012','Shoreditch Metal','Metal','Storage Bedding','King Bed','Not Required','Metal','Brass','Not Required','Not Required','','Not Required','Bed Detail Missing','Not Required','Not Required','Not Required','PH00059'),(19,'832384_22','Beds','61','Autumn Winter 2012','Shoreditch Metal','Metal','Storage Bedding','Super King Bed','Not Required','Metal','Brass','Not Required','Not Required','','Not Required','Bed Detail Missing','Not Required','Not Required','Not Required','PH00058'),(20,'879819_01','Beds','61','Autumn Winter 2013','Portofino','Fabric','One Size only - 1','Storage Stool','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00058'),(21,'881802_01','Beds','61','Autumn Winter 2013','Portofino','Fabric','One Size only - 1','Ottoman','145925','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','Dark','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00059'),(22,'884472_01','Beds','61','Autumn Winter 2013','Portofino','Fabric','One Size only - 1','Storage Stool','662289','Swatch Fabric Missing','Swatch Colour Missing','Not Required','Not Required','','Not Required','Bed Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','Swatch Item Detail Missing','PH00059');

/*Table structure for table `next_main_upload_temp_copy` */

DROP TABLE IF EXISTS `next_main_upload_temp_copy`;

CREATE TABLE `next_main_upload_temp_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `six_two_six` varchar(500) DEFAULT NULL,
  `product_area` varchar(500) DEFAULT NULL,
  `season` varchar(500) DEFAULT NULL,
  `shape_start_phase` varchar(500) DEFAULT NULL,
  `sofa_range` varchar(500) DEFAULT NULL,
  `material_type` varchar(500) DEFAULT NULL,
  `size_range` varchar(500) DEFAULT NULL,
  `size_descrption` varchar(500) DEFAULT NULL,
  `swatch_item_number` varchar(500) DEFAULT NULL,
  `swatch_item_fabric` varchar(500) DEFAULT NULL,
  `swatch_item_fabric_colour` varchar(500) DEFAULT NULL,
  `foot_start_phase` varchar(500) DEFAULT NULL,
  `foot_type` varchar(500) DEFAULT NULL,
  `foot_colour` varchar(500) DEFAULT NULL,
  `chair_format` varchar(500) DEFAULT NULL,
  `bed_detail` varchar(500) DEFAULT NULL,
  `fabric_start_phase` varchar(500) DEFAULT NULL,
  `pattern_match` varchar(500) DEFAULT NULL,
  `piping` varchar(500) DEFAULT NULL,
  `phaseid` varchar(500) DEFAULT NULL,
  `batchid` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `next_main_upload_temp_copy` */

insert  into `next_main_upload_temp_copy`(`id`,`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`,`batchid`) values (1,'854273_19','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required','PH00059',NULL),(2,'854273_19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'854273_19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'854273_19','Beds',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'854273_19','Beds',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'854273_19','Beds','61','Autumn Winter 2012','Divans','Fabric','Storage Bedding','Single Divan','Not Required','Fabric','White','Not Required','Not Required','','Not Required','Divan With Mattress           ','Not Required','Not Required','Not Required',NULL,NULL);

/*Table structure for table `next_master_data_detail` */

DROP TABLE IF EXISTS `next_master_data_detail`;

CREATE TABLE `next_master_data_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DataName` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `HeaderId` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `CreatedDt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `next_master_data_detail` */

insert  into `next_master_data_detail`(`id`,`DataName`,`Description`,`HeaderId`,`CreatedBy`,`CreatedDt`) values (1,'Autumn','Autumn','1','1','2015-10-01 18:08:32'),(2,'Spring','Spring','1','1','2015-10-01 18:08:51'),(3,'Summer','Summer','1','1','2015-10-01 18:08:58'),(4,'Category1','Sample','2','1','2015-10-02 12:08:36'),(5,'Category2','Sample','2','1','2015-10-02 12:08:52'),(6,'Category3','Sample','2','1','2015-10-02 12:12:23'),(7,'CategoryGuna','Sample Category','2','1','2015-10-09 10:26:23'),(8,'X-Mas','Sample ','1','1','2015-10-12 10:08:59'),(10,'Approved','Sample Data','13','1','2015-10-21 12:49:53'),(13,'Standard Wrap Code','Standard Wrap Code','14','1','2015-10-21 15:39:08'),(14,'Alt Wrap Code 1','Alt Wrap Code 1','14','1','2015-10-21 15:39:29'),(15,'Alt Wrap Code 2','Alt Wrap Code 2','14','1','2015-10-21 15:39:40'),(16,'Alt Wrap Code 3','Alt Wrap Code 3','14','1','2015-10-21 15:39:53'),(17,'Bead','Bead','15','1','2015-10-21 16:53:33'),(18,'Non Bead','Non Bead','15','1','2015-10-21 16:53:47'),(19,'Leather','Leather','15','1','2015-10-21 16:54:00'),(20,'Open','Open','7','1','2015-10-21 16:58:49'),(21,'WA','Wrap Aligned','8','1','2015-10-21 16:59:08'),(22,'Upholstery','Upholstery','2','1','2015-10-21 16:59:19'),(23,'Stripe','Stripe','9','1','2015-10-21 16:59:31'),(24,'Winter 1 2015','Winter 1 2015','1','1','2015-10-21 17:00:26'),(25,'Fabric','Fabric','16','1','2015-10-21 17:01:31'),(26,'Low Tapered','Low Tapered','17','1','2015-10-21 17:01:50'),(27,'Submitted to Render','Submitted to Render','13','1','2015-10-21 17:02:17'),(28,'Default','Default','18','1','2015-10-21 17:12:15'),(29,'Test','Test','19','1','2015-10-21 18:47:19'),(30,'Test Guna','Demo','20','1','2015-10-29 10:27:58'),(31,'SS15 SPRING 1','SS15 SPRING 1','1','1','2015-12-01 09:43:02'),(32,'Test Meena','Meena','1','1','2016-01-08 19:04:19');

/*Table structure for table `next_master_header_detail` */

DROP TABLE IF EXISTS `next_master_header_detail`;

CREATE TABLE `next_master_header_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HeaderName` varchar(255) DEFAULT NULL,
  `Createdby` varchar(255) DEFAULT NULL,
  `CreatedDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `next_master_header_detail` */

insert  into `next_master_header_detail`(`id`,`HeaderName`,`Createdby`,`CreatedDt`) values (1,'Season','1','2015-10-01 18:07:49'),(2,'Category','1','2015-10-01 18:07:54'),(7,'State LUT','1','2015-10-09 10:12:52'),(8,'Wrapcode LUT','1','2015-10-09 10:13:36'),(9,'Fabric','1','2015-10-09 10:14:08'),(10,'Batch Status','1','2015-10-09 10:17:34'),(11,'Model Status','1','2015-10-09 10:17:43'),(12,'Fabric Status','1','2015-10-09 10:17:52'),(13,'Status','1','2015-10-21 12:49:36'),(14,'Wrapcode Option','1','2015-10-21 15:38:29'),(15,'Bead Option','1','2015-10-21 16:53:20'),(16,'Material Type LUT','1','2015-10-21 17:01:20'),(17,'Foot Shape LUT','1','2015-10-21 17:01:40'),(18,'Angle Set LUT','1','2015-10-21 17:12:03'),(19,'Neil LUT','1','2015-10-21 18:47:06'),(20,'RND LUT','1','2015-10-29 10:27:02');

/*Table structure for table `next_option_lookup_table` */

DROP TABLE IF EXISTS `next_option_lookup_table`;

CREATE TABLE `next_option_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) DEFAULT NULL,
  `MaterialType` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `WrapCode_Option` varchar(255) DEFAULT NULL,
  `AngleSet` varchar(255) DEFAULT NULL,
  `Option_Code` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Main` varchar(255) DEFAULT NULL,
  `_1` varchar(255) DEFAULT NULL,
  `_2` varchar(255) DEFAULT NULL,
  `_3` varchar(255) DEFAULT NULL,
  `_4` varchar(255) DEFAULT NULL,
  `_5` varchar(255) DEFAULT NULL,
  `_6` varchar(255) DEFAULT NULL,
  `_7` varchar(255) DEFAULT NULL,
  `_8` varchar(255) DEFAULT NULL,
  `_9` varchar(255) DEFAULT NULL,
  `_10` varchar(255) DEFAULT NULL,
  `_11` varchar(255) DEFAULT NULL,
  `_12` varchar(255) DEFAULT NULL,
  `_13` varchar(255) DEFAULT NULL,
  `_14` varchar(255) DEFAULT NULL,
  `_15` varchar(255) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsApproved` varchar(255) DEFAULT NULL,
  `DateApproved` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Addedby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `next_option_lookup_table` */

insert  into `next_option_lookup_table`(`id`,`Category`,`MaterialType`,`State`,`WrapCode_Option`,`AngleSet`,`Option_Code`,`Description`,`Main`,`_1`,`_2`,`_3`,`_4`,`_5`,`_6`,`_7`,`_8`,`_9`,`_10`,`_11`,`_12`,`_13`,`_14`,`_15`,`DateAdded`,`IsApproved`,`DateApproved`,`Comments`,`Addedby`) values (1,'22','25','20','14','28','04','Storage Footstool','','','54','52','62','56','','','','','','','','','','','2015-10-27 11:12:24','Y','2016-01-08 07:01:28',NULL,'1'),(2,'5','25','20','13','28','Option Code','Option Description','Main','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','2015-10-27 11:13:29','Y','2015-10-29 10:10:34',NULL,'1');

/*Table structure for table `next_range_lookup_table` */

DROP TABLE IF EXISTS `next_range_lookup_table`;

CREATE TABLE `next_range_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Range_desc` varchar(255) DEFAULT NULL,
  `Bead_Option` varchar(255) DEFAULT NULL,
  `Angle_set_Option` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ISApproved` varchar(255) DEFAULT NULL,
  `DateApproved` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `next_range_lookup_table` */

insert  into `next_range_lookup_table`(`id`,`Range_desc`,`Bead_Option`,`Angle_set_Option`,`Category`,`DateAdded`,`AddedBy`,`ISApproved`,`DateApproved`) values (1,'next_range_lookup_table','18','28','5','2015-10-27 17:06:28','1','','');

/*Table structure for table `next_range_overview_table` */

DROP TABLE IF EXISTS `next_range_overview_table`;

CREATE TABLE `next_range_overview_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Phaseval` varchar(255) DEFAULT NULL,
  `Rangeval` varchar(255) DEFAULT NULL,
  `Batch` varchar(255) DEFAULT NULL,
  `RenderVol` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'WIP',
  `Completed` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `OldBatch` varchar(255) DEFAULT NULL,
  `PhaseId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `next_range_overview_table` */

insert  into `next_range_overview_table`(`id`,`Phaseval`,`Rangeval`,`Batch`,`RenderVol`,`Status`,`Completed`,`Date`,`OldBatch`,`PhaseId`) values (1,'SS15 SPRING 1 Upholstery','Portofino',NULL,44,'WIP','0','2015-12-21 15:27:41',NULL,'PH00058'),(2,'SS15 SPRING 1 Upholstery','Portofino',NULL,88,'WIP','0','2015-12-21 15:28:14',NULL,'PH00059');

/*Table structure for table `next_system_login_table` */

DROP TABLE IF EXISTS `next_system_login_table`;

CREATE TABLE `next_system_login_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createddt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `next_system_login_table` */

insert  into `next_system_login_table`(`id`,`firstname`,`secondname`,`username`,`password`,`salt`,`email`,`role`,`domain`,`createdby`,`createddt`) values (1,'Gunasilan','Muniandy','gmuniandy',NULL,NULL,'gunasilan.muniandy@schawk.com','super admin','asia','gmuniandy','2015-09-28 13:24:55'),(2,'Tan Seok','Kiang','tkiang',NULL,NULL,'seokkiang.tan@schawk.com','user','asia','gmuniandy','2015-10-01 17:58:10');

/*Table structure for table `next_texture_lookup_table` */

DROP TABLE IF EXISTS `next_texture_lookup_table`;

CREATE TABLE `next_texture_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Texture_Item_No` varchar(255) DEFAULT NULL,
  `Texture_Name` varchar(255) DEFAULT NULL,
  `Texture_Color` varchar(255) DEFAULT NULL,
  `StdWrapCode` varchar(255) DEFAULT NULL,
  `AltWrapCode1` varchar(255) DEFAULT NULL,
  `AltWrapCode2` varchar(255) DEFAULT NULL,
  `AltWrapCode3` varchar(255) DEFAULT NULL,
  `FabricDesign` varchar(255) DEFAULT NULL,
  `MaterialType` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Season` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateApproved` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `AddedBy` varchar(255) DEFAULT NULL,
  `IsApproved` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `next_texture_lookup_table` */

insert  into `next_texture_lookup_table`(`id`,`Texture_Item_No`,`Texture_Name`,`Texture_Color`,`StdWrapCode`,`AltWrapCode1`,`AltWrapCode2`,`AltWrapCode3`,`FabricDesign`,`MaterialType`,`Status`,`Season`,`Category`,`DateAdded`,`DateApproved`,`Comments`,`AddedBy`,`IsApproved`) values (2,'137146','Ritzy Stripe','Grey','21','21','0','0','23','25','10','11','12','2015-10-22 16:54:19','2015-10-29 10:10:06',NULL,'1','Y'),(3,'123456','Ritzy Plain','Green','21','0','21','0','23','25','10','11','12','2015-10-22 19:15:45','2015-10-28 10:10:14',NULL,'1','Y'),(4,'tt','tt','tt','21','21','21','0','23','25','10','2','4','2015-10-22 19:17:54','2015-12-17 05:12:56',NULL,'1','Y'),(5,'w','w','w','21','0','0','0','23','25','10','1','5','2015-10-22 19:22:04','',NULL,'1',''),(6,'f','y','h','21','21','21','21','23','25','10','1','4','2015-10-22 19:24:25','',NULL,'1',''),(7,'ub','uib','iub','21','21','21','21','23','25','10','1','4','2015-10-22 19:25:04',NULL,NULL,'1',NULL),(8,'gcv','yc','gc','21','21','21','21','23','25','10','1','4','2015-10-22 19:25:44','',NULL,'1',''),(9,'ygiu','bui','biu','0','21','21','0','23','25','10','1','4','2015-10-26 11:31:04',NULL,NULL,'1',NULL);

/*Table structure for table `next_texturesec_lookup_table` */

DROP TABLE IF EXISTS `next_texturesec_lookup_table`;

CREATE TABLE `next_texturesec_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Texture_Item_No` varchar(255) DEFAULT NULL,
  `Texture_Color` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Season` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateApproved` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `AddedBy` varchar(255) DEFAULT NULL,
  `IsApproved` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `next_texturesec_lookup_table` */

insert  into `next_texturesec_lookup_table`(`id`,`Texture_Item_No`,`Texture_Color`,`Status`,`Season`,`Category`,`DateAdded`,`DateApproved`,`Comments`,`AddedBy`,`IsApproved`) values (1,'TIN2-001','Dark','10','1','4','2015-10-26 11:52:28','2016-01-08 06:01:05',NULL,'1','Y'),(2,'Item Number','Texture Color','27','24','22','2015-10-26 12:03:12','',NULL,'1',''),(3,'','','0','0','0','2015-10-26 18:19:55',NULL,NULL,'1',NULL),(4,'','','0','0','0','2016-01-08 19:10:32',NULL,NULL,'1',NULL);

/*Table structure for table `next_trans_cmtt_table` */

DROP TABLE IF EXISTS `next_trans_cmtt_table`;

CREATE TABLE `next_trans_cmtt_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Comments` varchar(255) DEFAULT NULL,
  `TransId` varchar(255) DEFAULT NULL,
  `CommentedBy` varchar(255) DEFAULT NULL,
  `CommentedDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Data for the table `next_trans_cmtt_table` */

insert  into `next_trans_cmtt_table`(`id`,`Comments`,`TransId`,`CommentedBy`,`CommentedDt`) values (1,'Guna entered comments','PH00001','1','2015-10-08 16:09:41'),(2,'Gunasilan entered comm','PH00002','1','2015-10-08 16:09:58'),(3,'i like chicken poriyal','PH00001','1','2015-10-08 16:10:18'),(4,'i dont like chicken poriyal','PH00001','1','2015-10-08 16:10:33'),(5,'im the best','PH00002','1','2015-10-08 16:10:45'),(6,'close connection','PH00001','1','2015-10-08 17:33:32'),(7,'Test zzz','PH00002','1','2015-10-12 16:31:02'),(8,'neil testing','PH00001','1','2015-10-21 18:45:00'),(9,'wwww','TexO00001','1','2015-10-22 19:22:04'),(10,'dbdhjf','TexO00001','1','2015-10-22 19:24:25'),(11,'lflmlf ','TexO00001','1','2015-10-22 19:25:04'),(12,'hbdybdy','TexO8','1','2015-10-22 19:25:44'),(13,'wdd','TexO9','1','2015-10-26 11:31:04'),(14,'ww','TexS0','1','2015-10-26 11:33:51'),(15,'guna','TexS0','1','2015-10-26 11:35:05'),(16,'test texture 2','TexS1','1','2015-10-26 11:52:28'),(17,'Comments','TexS2','1','2015-10-26 12:03:12'),(18,'','TexS3','1','2015-10-26 18:19:55'),(19,'','OptC9','1','2015-10-26 18:20:42'),(20,'','OptC9','1','2015-10-26 18:22:27'),(21,'j','OptC9','1','2015-10-26 18:22:50'),(22,'Comments	','OptC9','1','2015-10-26 18:29:37'),(23,'Comments	','OptC9','1','2015-10-26 18:33:34'),(24,'	','OptC9','1','2015-10-26 18:34:32'),(25,'Comments	','OptC9','1','2015-10-26 18:35:12'),(26,'TestComment	','OptC1','1','2015-10-27 11:12:24'),(27,'Comments Comments	','OptC2','1','2015-10-27 11:13:29'),(28,'','TexS3','1','2015-10-27 16:58:25'),(29,'Range Description','TexS3','1','2015-10-27 17:01:16'),(30,'Range Description','TexS3','1','2015-10-27 17:02:04'),(31,'next_range_lookup_table','Ran1','1','2015-10-27 17:06:28'),(32,'','PH00058','1','2015-12-17 17:49:06'),(33,'test','PH00058','1','2016-01-08 18:39:59'),(34,'Test Guna','PH00059','1','2016-01-08 18:40:29'),(35,'','TexS4','1','2016-01-08 19:10:32');

/*Table structure for table `testfail` */

DROP TABLE IF EXISTS `testfail`;

CREATE TABLE `testfail` (
  `id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `testfail` */

insert  into `testfail`(`id`) values ('1'),('2'),('3'),('4'),('5'),('6'),('7'),('8'),('9'),('10'),('11'),('12'),('13'),('14'),('15'),('16'),('17'),('18'),('19'),('20'),('21'),('22'),('20'),('21'),('22'),('20'),('21'),('22'),('20'),('21'),('22'),('20'),('21'),('22'),('20'),('21'),('22');

/*Table structure for table `testgood` */

DROP TABLE IF EXISTS `testgood`;

CREATE TABLE `testgood` (
  `id` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `testgood` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users` */

/* Procedure structure for procedure `getTransId` */

/*!50003 DROP PROCEDURE IF EXISTS  `getTransId` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `getTransId`(IN param_desc VARCHAR(10),
 OUT transids varchar(10))
BEGIN
	DECLARE ids  int;
	DECLARE idsa  INT;
	declare transid varchar(10);
	Select count(*) as ids  into ids from next_id_generator_table where Description = param_desc;
	set idsa = ids+1;
	set transid = lpad(idsa,5,'0');
	if param_desc = "Phase" then
	set transids = CONCAT('PH', transid);
	elseif (param_desc = "Render") then
	SET transids = CONCAT('TA', transid);
	end if;
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `validateBrief` */

/*!50003 DROP PROCEDURE IF EXISTS  `validateBrief` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `validateBrief`(
 IN rowid VARCHAR (50),
 IN phaseId VARCHAR(50),
 IN season VARCHAR(50),
 OUT transids VARCHAR(10))
BEGIN
	DECLARE shpaeStartPhase VARCHAR(100);
	DECLARE done INT;
	DECLARE ids INT;
	DECLARE rangeval VARCHAR(255);
	DECLARE seasonval VARCHAR(255);
	DECLARE seasonvals VARCHAR(255);
	DECLARE categoryval VARCHAR(255);
	DECLARE categoryvals VARCHAR(255);
	DECLARE phaseval VARCHAR(255);
	DECLARE volnewness INT;
	DECLARE volexis INT;
	DECLARE totalvol INT;
	
	
	DECLARE cur1 CURSOR FOR
	 SELECT id,shape_start_phase,sofa_range FROM next_main_upload_temp where phaseid = phaseId;
	 #SELECT id,shape_start_phase,sofa_range FROM next_main_upload_temp WHERE phaseid = 'PH00059';
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done =1;
	
	SET done =0;
	OPEN cur1;
	igmLoop: LOOP
	
	
	FETCH cur1 INTO ids,shpaeStartPhase,rangeval;
	IF done =1 THEN LEAVE igmLoop; END IF;
	
	IF shpaeStartPhase = season
	THEN
	
	INSERT INTO next_main_upload_newness SELECT * FROM next_main_upload_temp WHERE id = ids;
	ELSE
	
	
	INSERT INTO next_main_upload_newness 
	(`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`) 
	SELECT 
	`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid` FROM next_main_upload_temp WHERE id = 1;
	
	INSERT INTO next_main_upload_exists 
	(`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid`) 
	SELECT 
	`six_two_six`,`product_area`,`season`,`shape_start_phase`,`sofa_range`,`material_type`,`size_range`,`size_descrption`,`swatch_item_number`,`swatch_item_fabric`,
	`swatch_item_fabric_colour`,`foot_start_phase`,`foot_type`,`foot_colour`,`chair_format`,`bed_detail`,`fabric_start_phase`,`pattern_match`,`piping`,`phaseid` FROM next_main_upload_temp WHERE id = 1;
	
	
	
	
	
	
	
	END IF;
	
	END LOOP igmLoop;
	CLOSE cur1;
	
	
	SELECT COUNT(*) INTO volnewness FROM next_main_upload_newness WHERE phaseid = phaseId;
	SELECT COUNT(*) INTO volexis FROM next_main_upload_exists WHERE phaseid = phaseId and batchid is null;
	SELECT distinct seasonId,categoryiD INTO seasonval,categoryval 
	FROM next_main_phase_table WHERE phaseid = phaseId;
	SELECT dataname INTO  seasonvals 
	FROM next_master_data_detail a,
	next_master_header_detail b
	WHERE a.headerid = b.id
	and a.id = seasonval
	AND b.HeaderName = 'Season';
	SELECT dataname INTO  categoryvals
	 FROM next_master_data_detail a,
	next_master_header_detail b 
	WHERE a.headerid = b.id
	AND a.id = categoryval
	AND b.HeaderName = 'Category';
	
	SET totalvol = volexis + volnewness;
	SET phaseval = CONCAT(seasonvals,' ',categoryvals);
	
	
	INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,completed,phaseid)
VALUES (phaseval,rangeval,totalvol,'0',phaseId);	
	
	 
	
	
	
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
