/*
SQLyog Community v12.11 (64 bit)
MySQL - 5.6.5-m8 : Database - nextdb
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

/*Table structure for table `batch_master` */

DROP TABLE IF EXISTS `batch_master`;

CREATE TABLE `batch_master` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `batchid` varchar(100) DEFAULT NULL,
  `phaseid` varchar(11) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `rec_count` int(11) DEFAULT NULL,
  `batch_status` int(1) DEFAULT '1' COMMENT '1 - Rendered',
  `active_status` int(1) DEFAULT '1' COMMENT '1 - active; 0 -inactive',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `batch_master` */

/*Table structure for table `model_lookup` */

DROP TABLE IF EXISTS `model_lookup`;

CREATE TABLE `model_lookup` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(500) DEFAULT NULL,
  `mod_category` int(11) DEFAULT NULL,
  `mod_range` int(11) DEFAULT NULL,
  `mod_option` int(11) DEFAULT NULL,
  `mod_state` int(11) DEFAULT NULL,
  `mod_detailcode` int(11) DEFAULT NULL,
  `mod_footshape` int(11) DEFAULT NULL,
  `mod_wrapcode` int(11) DEFAULT NULL,
  `mod_status` int(11) DEFAULT NULL,
  `mod_season` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `active_status` int(1) DEFAULT '1',
  `last_update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8;

/*Data for the table `model_lookup` */

insert  into `model_lookup`(`model_id`,`model_name`,`mod_category`,`mod_range`,`mod_option`,`mod_state`,`mod_detailcode`,`mod_footshape`,`mod_wrapcode`,`mod_status`,`mod_season`,`added_date`,`approved_date`,`approved_by`,`active_status`,`last_update_time`) values (187,'RA00002_S006_open_na_f001_VA',1,2,6,15,64,4,23,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(188,'RA00002_S007_closed_na_f001_VA',1,2,7,16,64,4,23,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(189,'RA00003_S005_na_na_f016_L',1,3,5,50,64,10,27,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(190,'RA00003_S009_na_na_f016_L',1,3,9,50,64,10,27,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(191,'RA00004_S005_na_na_f002_VA',1,4,5,50,64,5,23,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(192,'RA00004_S005_na_na_f002_VUS',1,4,5,50,64,5,26,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(193,'RA00004_S005_na_na_f002_WA',1,4,5,50,64,5,25,38,31,'2016-06-14 17:26:03','2016-06-14 17:26:03',6,1,'2016-06-14 17:26:03'),(204,'RA00004_S005_na_na_f018_VA',1,4,5,50,64,69,23,38,31,'2016-06-14 17:38:41','2016-06-14 17:38:41',6,1,'2016-06-14 17:38:41'),(205,'RA00004_S005_na_na_f018_VUS',1,4,5,50,64,69,26,38,31,'2016-06-14 17:38:41','2016-06-14 17:38:41',6,1,'2016-06-14 17:38:41'),(206,'RA00004_S005_na_na_f018_WA',1,4,5,50,64,69,25,38,31,'2016-06-14 17:38:41','2016-06-14 17:38:41',6,1,'2016-06-14 17:38:41'),(207,'RA00004_S009_na_na_f002_VUS',1,4,9,50,64,5,26,38,31,'2016-06-15 14:52:50','2016-06-15 14:52:50',6,1,'2016-06-15 14:52:50'),(208,'RA00004_S009_na_na_f018_VUS',1,4,9,50,64,69,26,38,31,'2016-06-15 14:52:50','2016-06-15 14:52:50',6,1,'2016-06-15 14:52:50'),(209,'RA00010_S012_open_na_f000_WU',1,10,12,15,64,66,22,38,31,'2016-06-15 14:52:50','2016-06-15 14:52:50',6,1,'2016-06-15 14:52:50'),(210,'RA00011_S008_na_scbs_f008_VA',1,11,8,50,68,7,23,20,31,'2016-06-15 14:52:50','2016-06-15 14:52:50',6,1,'2016-06-15 15:10:19'),(211,'RA00004_S005_na_na_f002_WU',1,4,5,50,64,5,22,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(212,'RA00004_S005_na_na_f018_WU',1,4,5,50,64,69,22,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(213,'RA00004_S009_na_na_f002_VA',1,4,9,50,64,5,23,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(214,'RA00004_S009_na_na_f002_WA',1,4,9,50,64,5,25,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(215,'RA00004_S009_na_na_f002_WU',1,4,9,50,64,5,22,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(216,'RA00004_S009_na_na_f018_VA',1,4,9,50,64,69,23,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(217,'RA00004_S009_na_na_f018_WA',1,4,9,50,64,69,25,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49'),(218,'RA00004_S009_na_na_f018_WU',1,4,9,50,64,69,22,38,31,'2016-06-15 15:28:49','2016-06-15 15:28:49',6,1,'2016-06-15 15:28:49');

/*Table structure for table `next_id_generator_table` */

DROP TABLE IF EXISTS `next_id_generator_table`;

CREATE TABLE `next_id_generator_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) DEFAULT NULL,
  `SystemId` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `createdDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_id_generator_table` */

/*Table structure for table `next_main_matched_entry` */

DROP TABLE IF EXISTS `next_main_matched_entry`;

CREATE TABLE `next_main_matched_entry` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `temp_id` int(11) DEFAULT NULL,
  `phase_id` varchar(255) DEFAULT NULL,
  `range_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `texture1id` int(11) DEFAULT NULL,
  `texture2id` int(11) DEFAULT NULL,
  `source_model` varchar(500) DEFAULT NULL,
  `new_model` varchar(500) DEFAULT NULL,
  `state_code` varchar(500) DEFAULT NULL,
  `matched_status` int(1) DEFAULT '1' COMMENT '1 - matched; 0 - not matched',
  `model_status` int(1) DEFAULT '0' COMMENT '1 - Approved; 0 - not approved',
  `fabric_status` int(1) DEFAULT '0' COMMENT '1 - Approved; 0 - not approved',
  `feet_color_status` int(1) DEFAULT '0' COMMENT '1 - Approved; 0 - not approved',
  `temp` varchar(100) DEFAULT NULL,
  `batchid` varchar(100) DEFAULT NULL,
  `oldbatchid` int(11) DEFAULT NULL,
  `last_updated_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_main_phase_table` */

/*Table structure for table `next_main_upload_temp` */

DROP TABLE IF EXISTS `next_main_upload_temp`;

CREATE TABLE `next_main_upload_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `six_two_six` varchar(500) DEFAULT NULL,
  `item_code` varchar(200) DEFAULT NULL,
  `option_code` varchar(200) DEFAULT NULL,
  `foot_pack` varchar(200) DEFAULT NULL,
  `product_area` varchar(500) DEFAULT NULL,
  `season` varchar(500) DEFAULT NULL,
  `shape_start_phase` varchar(500) DEFAULT NULL,
  `sofa_range` varchar(500) DEFAULT NULL,
  `material_type` varchar(500) DEFAULT NULL,
  `mat_type` int(11) DEFAULT NULL,
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
  `start_match_status` int(1) DEFAULT '0',
  `match_field` int(1) DEFAULT NULL COMMENT '1-shapestart; 2-fabricstart; 3-footstart;',
  `option_match_status` int(1) DEFAULT '0',
  `option_no_of_rows` int(11) DEFAULT '0',
  `temp` text,
  `model` varchar(500) DEFAULT NULL,
  `item_number_error` int(1) DEFAULT '0' COMMENT '0 - no error; 1 - error',
  `range_error` int(1) DEFAULT '0' COMMENT '0 - no error; 1 - error',
  `detail_code_error` int(1) DEFAULT '0',
  `foot_type_error` int(1) DEFAULT '0',
  `foot_color_error` int(1) DEFAULT '0',
  `option_code_error` int(1) DEFAULT '0',
  `angle_set` int(1) DEFAULT '0',
  `model_error` int(1) DEFAULT '0' COMMENT '0 - no error; 1 - error',
  `total_error_count` int(5) DEFAULT '0',
  `need_to_run` int(1) DEFAULT '1' COMMENT '1 - yes; 1 - no',
  `last_updated_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_main_upload_temp` */

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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

/*Data for the table `next_master_data_detail` */

insert  into `next_master_data_detail`(`id`,`DataName`,`Description`,`HeaderId`,`CreatedBy`,`CreatedDt`) values (1,'upholstery','sofas','2','4','2016-03-16 13:33:34'),(2,'dining','dining chairs','2','4','2016-03-16 13:33:56'),(3,'bedroom','beds','2','4','2016-03-16 13:34:10'),(4,'f001','block','17','4','2016-03-16 13:36:50'),(5,'f002','castor','17','4','2016-03-16 13:37:03'),(6,'f005','glide','17','4','2016-03-16 13:37:16'),(7,'f008','high tapered','17','4','2016-03-16 13:37:37'),(8,'f013','low turned1','17','4','2016-03-16 13:37:54'),(10,'f016','slim block','17','4','2016-03-16 13:38:20'),(11,'fabric','fabric','16','4','2016-03-16 13:39:07'),(12,'leather','leather','16','4','2016-03-16 13:39:19'),(13,'f014','metal','17','4','2016-03-16 13:41:10'),(15,'open','open','7','4','2016-03-16 13:55:50'),(16,'closed','closed','7','4','2016-03-16 13:56:00'),(17,'check','check','9','4','2016-03-16 14:17:52'),(18,'stripe','stripe','9','4','2016-03-16 14:18:03'),(19,'leather','leather','9','4','2016-03-16 14:18:12'),(20,'pattern','pattern','9','4','2016-03-16 14:18:23'),(21,'plain','plain','9','4','2016-03-16 14:18:32'),(22,'WU','matched unaligned','8','4','2016-03-16 14:19:55'),(23,'VA','random aligned','8','4','2016-03-16 14:21:08'),(24,'VU','random unaligned','8','4','2016-03-16 14:21:31'),(25,'WA','matched aligned','8','4','2016-03-16 14:21:49'),(26,'VUS','random unaligned sheen','8','4','2016-03-16 14:22:36'),(27,'L','leather','8','4','2016-03-16 14:22:51'),(31,'AW15 AUTUMN 1','AUTUMN 1 2016','1','4','2016-03-17 14:15:22'),(32,'Waiting for base images & dims','Waiting for base images & dims','11','4','2016-03-17 14:40:59'),(33,'Waiting for base images','Waiting for base images & dims','11','4','2016-03-17 14:41:38'),(34,'Waiting for dims','Waiting for dims','11','4','2016-03-17 14:41:53'),(35,'WIP - 1st model build','WIP - 1st model build','11','4','2016-03-17 14:42:12'),(36,'WIP - Corrections','WIP - Corrections','11','4','2016-03-17 14:42:30'),(37,'With client for approval','With client for approval','11','4','2016-03-17 14:42:46'),(38,'Approved','Approved','11','4','2016-03-17 14:42:59'),(39,'Waiting for photography & sample','Waiting for photography & sample','12','4','2016-03-17 14:44:00'),(40,'Waiting for photography','Waiting for photography','12','4','2016-03-17 14:44:15'),(41,'Waiting for sample','Waiting for sample','12','4','2016-03-17 14:44:29'),(42,'WIP - Creation of 6m texture','WIP - Creation of 6m texture','12','4','2016-03-17 14:47:03'),(43,'Submitted to colour manager','Submitted to colour manager','12','4','2016-03-17 14:47:18'),(44,'Submitted to home team','Submitted to home team','12','4','2016-03-17 14:47:46'),(45,'Colour approved by colour manager','Colour approved by colour manager','12','4','2016-03-17 14:48:15'),(46,'Fully Approved','Fully Approved','12','4','2016-03-17 14:48:28'),(47,'Beaded','Beaded','15','4','2016-03-17 14:48:39'),(48,'Non-Beaded','Non-Beaded','15','4','2016-03-17 14:48:53'),(49,'Leather','Leather','15','4','2016-03-17 14:49:17'),(50,'na','na','7','4','2016-03-17 14:49:47'),(51,'Ready for Render','Ready for Render','10','4','2016-03-24 10:08:40'),(52,'With RenderNow','With RenderNow','10','4','2016-03-24 10:09:02'),(53,'Rendered','Rendered','10','4','2016-03-24 10:09:15'),(54,'STANDARD','Standard wrap for S-XL','14','4','2016-03-24 10:10:23'),(55,'Alt Wrap 1','Alternative wrap for footstools','14','4','2016-03-24 10:11:11'),(56,'Standard','Standard Camera Angles','18','4','2016-03-24 10:11:42'),(57,'Alternative 1','Camera Angles Set for Finnley','18','4','2016-03-24 10:12:24'),(58,'VP','Random Plain','8','4','2016-03-24 12:01:35'),(59,'WP','Matched Plain','8','4','2016-03-24 12:01:47'),(60,'LP','Leather Plain','8','4','2016-03-24 15:22:15'),(61,'Alternative 2','Camera angles Set for WithStorage','18','4','2016-03-29 09:36:19'),(62,'Alternative 3','professer chair','18','4','2016-04-06 11:52:37'),(63,'scbcs','Self Coloured Buttons Chrome Studs1','21','4','2016-04-25 14:29:18'),(64,'na','Not Required','21','4','2016-04-25 14:29:51'),(65,'SS16 SPRING 1','SS16 SPRING 1','1','4','2016-04-25 14:31:28'),(66,'f000','Not Required','17','4','2016-04-25 14:44:19'),(67,'f017','Small Block','17','4','2016-04-25 14:45:03'),(68,'scbs','Self Coloured Buttons Chrome Studs','21','6','2016-06-10 17:58:43'),(69,'f018','Low Turned','17','6','2016-06-10 18:07:38');

/*Table structure for table `next_master_header_detail` */

DROP TABLE IF EXISTS `next_master_header_detail`;

CREATE TABLE `next_master_header_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HeaderName` varchar(255) DEFAULT NULL,
  `Createdby` varchar(255) DEFAULT NULL,
  `CreatedDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `next_master_header_detail` */

insert  into `next_master_header_detail`(`id`,`HeaderName`,`Createdby`,`CreatedDt`) values (1,'Season','1','2015-10-01 18:07:49'),(2,'Category','1','2015-10-01 18:07:54'),(7,'State LUT','1','2015-10-09 10:12:52'),(8,'Wrapcode LUT','1','2015-10-09 10:13:36'),(9,'Fabric','1','2015-10-09 10:14:08'),(10,'Batch Status','1','2015-10-09 10:17:34'),(11,'Model Status','1','2015-10-09 10:17:43'),(12,'Fabric Status','1','2015-10-09 10:17:52'),(13,'Status','1','2015-10-21 12:49:36'),(14,'Wrapcode Option','1','2015-10-21 15:38:29'),(15,'Bead Option','1','2015-10-21 16:53:20'),(16,'Material Type LUT','1','2015-10-21 17:01:20'),(17,'Foot Shape LUT','1','2015-10-21 17:01:40'),(18,'Angle Set LUT','1','2015-10-21 17:12:03'),(19,'Neil LUT','1','2015-10-21 18:47:06'),(20,'RND LUT','1','2015-10-29 10:27:02'),(21,'Detail Code','3','2016-04-25 12:55:12');

/*Table structure for table `next_option_lookup_table` */

DROP TABLE IF EXISTS `next_option_lookup_table`;

CREATE TABLE `next_option_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_sgkid` varchar(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `WrapCode_Option` varchar(255) DEFAULT NULL,
  `AngleSet` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `MaterialType` varchar(255) DEFAULT NULL,
  `Option_Code` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `next_option_lookup_table` */

insert  into `next_option_lookup_table`(`id`,`option_sgkid`,`Description`,`State`,`WrapCode_Option`,`AngleSet`,`Category`,`MaterialType`,`Option_Code`,`Main`,`_1`,`_2`,`_3`,`_4`,`_5`,`_6`,`_7`,`_8`,`_9`,`_10`,`_11`,`_12`,`_13`,`_14`,`_15`,`DateAdded`,`IsApproved`,`DateApproved`,`Comments`,`Addedby`) values (1,'S001','Large Chaise End Corner - Left Hand (4seats)','50','54','56','1','12','25','72','N/A','68','58','60','52','54','66','64','','','','','','','','2016-03-29 09:41:28',NULL,NULL,NULL,'4'),(2,'S002','Arm Caps (Pair)','50','54','56','1','11','02','50','','','','','','','','','','','','','','','','2016-03-29 09:42:29',NULL,NULL,NULL,'4'),(3,'S003','Storage Footstool','15','54','56','1','11','041','N/A','N/A','N/A','N/A','62','N/A','N/A','N/A','N/A','','','','','','','','2016-03-29 09:45:53',NULL,NULL,NULL,'4'),(4,'S004','Storage Footstool','16','54','56','1','11','04','56','54','52','62','N/A','N/A','N/A','N/A','N/A','','','','','','','','2016-03-29 09:46:47',NULL,NULL,NULL,'4'),(5,'S005','Large Sofa (3 Seats)','50','54','56','1','11','14','56','N/A','54','52','62','N/A','N/A','N/A','N/A','','','','','','','','2016-03-29 09:47:39',NULL,NULL,NULL,'4'),(6,'S006','Snuggle Seat (2 Seats)','15','54','61','1','11','08','N/A','N/A','N/A','N/A','62','N/A','N/A','N/A','N/A','','','','','','','','2016-04-25 14:38:40',NULL,NULL,NULL,'4'),(7,'S007','Snuggle Seat (2 Seats)','16','54','61','1','11','08','56','54','52','62','N/A','N/A','N/A','N/A','N/A','','','','','','','','2016-04-25 14:39:47',NULL,NULL,NULL,'4'),(8,'S008','Snuggle Seat (2 Seats)','50','54','56','1','11','08','56','54','52','62','N/A','N/A','N/A','N/A','N/A','','','','','','','','2016-04-25 14:42:04',NULL,NULL,NULL,'4'),(9,'S009','Large Sofa (3 Seats)','50','54','56','1','12','14','56','','54','52','62','','','','','','','','','','','','2016-05-19 11:07:18',NULL,NULL,NULL,'6'),(12,'S012','Arm Caps (Pair)','15','54','57','1',NULL,NULL,'12','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','2016-06-10 17:23:48',NULL,NULL,NULL,'6'),(13,'S013','Storage Footstool','15','54','57','1',NULL,NULL,'','','','','','','','','','','','','','','','','2016-06-15 15:18:52',NULL,NULL,NULL,'6');

/*Table structure for table `next_range_lookup_table` */

DROP TABLE IF EXISTS `next_range_lookup_table`;

CREATE TABLE `next_range_lookup_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_id` varchar(20) DEFAULT NULL,
  `Range_desc` varchar(255) DEFAULT NULL,
  `Bead_Option` varchar(255) DEFAULT NULL,
  `Angle_set_Option` varchar(255) DEFAULT NULL,
  `material_type` int(11) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AddedBy` varchar(255) DEFAULT NULL,
  `ISApproved` varchar(255) DEFAULT NULL,
  `DateApproved` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `next_range_lookup_table` */

insert  into `next_range_lookup_table`(`id`,`range_id`,`Range_desc`,`Bead_Option`,`Angle_set_Option`,`material_type`,`Category`,`DateAdded`,`AddedBy`,`ISApproved`,`DateApproved`) values (1,'RA00001','Garda1','47','56',12,'1','2016-03-29 09:33:11','4',NULL,NULL),(2,'RA00002','Garda with storage','47','61',12,'1','2016-03-29 09:37:04','4',NULL,NULL),(3,'RA00003','Armitage leather','49','56',11,'1','2016-03-29 09:37:21','4',NULL,NULL),(4,'RA00004','Ashford','47','56',11,'1','2016-03-29 09:38:03','4',NULL,NULL),(5,'RA00005','Carducci','49','56',11,'1','2016-03-29 09:39:04','4',NULL,NULL),(6,'RA00006','Milano with Studs1','47','56',11,'1','2016-03-29 09:55:21','4',NULL,NULL),(10,'RA00010','Garda','48','57',11,'1','2016-06-09 18:27:59','6',NULL,NULL),(11,'RA00011','Milano with Studs','47','56',11,'1','2016-06-14 17:25:37','6',NULL,NULL);

/*Table structure for table `next_range_overview_table` */

DROP TABLE IF EXISTS `next_range_overview_table`;

CREATE TABLE `next_range_overview_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Phaseval` varchar(255) DEFAULT NULL,
  `Rangeval` int(11) DEFAULT NULL,
  `Batch` varchar(255) DEFAULT NULL,
  `RenderVol` int(11) DEFAULT NULL,
  `ready_to_render_count` int(11) DEFAULT NULL,
  `range_status` int(1) DEFAULT NULL COMMENT '1 - Ready for Render; 2 - WIP; 3 - Rendered;21 - system',
  `model_percen` float DEFAULT '0',
  `fabric_percen` float DEFAULT '0',
  `feet_percen` float DEFAULT '0',
  `overall_percen` float DEFAULT '0',
  `Completed` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batchid` varchar(100) DEFAULT NULL,
  `OldBatch` varchar(255) DEFAULT NULL,
  `PhaseId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_range_overview_table` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `next_system_login_table` */

insert  into `next_system_login_table`(`id`,`firstname`,`secondname`,`username`,`password`,`salt`,`email`,`role`,`domain`,`createdby`,`createddt`) values (1,'Gunasilan','Muniandy','gmuniandy',NULL,NULL,'gunasilan.muniandy@schawk.com','super admin','asia','gmuniandy','2015-09-28 13:24:55'),(2,'Tan Seok','Kiang','tkiang',NULL,NULL,'seokkiang.tan@schawk.com','user','asia','gmuniandy','2015-10-01 17:58:10'),(3,'simon','barraclough','simon.barraclough',NULL,NULL,'Simon.Barraclough@schawk.com','super admin','emea','gmuniandy','2015-12-14 06:51:48'),(4,'Ian  ','Miles ','ian.miles',NULL,NULL,'ian.miles@schawk.com','super admin','emea','gmuniandy','2015-12-14 06:53:05'),(5,'Neil','Swallow','nswallow',NULL,NULL,'Neil.Swallow@sgkinc.com','super admin','emea','gmuniandy','2015-12-14 06:54:45'),(6,'Selva meenakshi','Chandramohan','selvameenakshi',NULL,NULL,'selvameenkshi.chandramohan@schawk.com','super admin','asia','','2016-03-10 11:14:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `next_texture_lookup_table` */

insert  into `next_texture_lookup_table`(`id`,`Texture_Item_No`,`Texture_Name`,`Texture_Color`,`StdWrapCode`,`AltWrapCode1`,`AltWrapCode2`,`AltWrapCode3`,`FabricDesign`,`MaterialType`,`Status`,`Season`,`Category`,`DateAdded`,`DateApproved`,`Comments`,`AddedBy`,`IsApproved`) values (12,'1355401','Versatile Check Milton','Raspberry','22','22','22','22','17','11','46','31','1','2016-03-24 11:44:34',NULL,NULL,'4',NULL),(13,'4092031','Woolen Herringbone','Dark Natural','24','24','24','24','21','11','39','31','1','2016-03-24 11:48:41',NULL,NULL,'4',NULL),(14,'409202','Smart Stripe','Grey','25','25','25','25','18','11','46','31','1','2016-03-24 11:50:43',NULL,NULL,'4',NULL),(15,'115614','Natural Rib','Mid French Grey','23','23','23','23','21','11','46','31','1','2016-03-24 12:00:28',NULL,NULL,'4',NULL),(16,'399792','Tweedy Blend','Grey Contrast Piping','58','0','0','0','21','11','46','31','1','2016-03-24 15:16:41',NULL,NULL,'4',NULL),(17,'939368','Bolivia','Olive','27','27','27','27','19','12','46','31','1','2016-03-24 15:19:59',NULL,NULL,'4',NULL),(18,'409204','Antique Velvet','Dark Teal','26','26','26','26','21','11','46','31','1','2016-03-24 15:21:09',NULL,NULL,'4',NULL),(19,'4738791','Columbia','Silver','60','60','60','60','19','12','46','31','1','2016-03-24 15:23:09',NULL,NULL,'4',NULL),(31,'135540','Versatile Check Milton','Raspberry','22','23','22','23','17','11','45','31','1','2016-06-15 14:52:33',NULL,NULL,'6',NULL),(32,'409203','Woolen Herringbone','Dark Natural','22','22','22','22','17','11','46','31','1','2016-06-15 15:19:42',NULL,NULL,'6',NULL),(33,'473879','Columbia','Silver','22','23','23','22','18','12','46','31','1','2016-06-15 15:19:42',NULL,NULL,'6',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `next_texturesec_lookup_table` */

insert  into `next_texturesec_lookup_table`(`id`,`Texture_Item_No`,`Texture_Color`,`Status`,`Season`,`Category`,`DateAdded`,`DateApproved`,`Comments`,`AddedBy`,`IsApproved`) values (7,'TIN1-007','light1','39','31','1','2016-03-17 14:18:07','2016-05-04 03:05:00',NULL,'4','Y'),(8,'TIN2-008','standard','46','31','1','2016-03-24 15:24:05',NULL,NULL,'4',NULL),(9,'TIN2-009','dark','46','31','1','2016-03-24 15:24:16',NULL,NULL,'4',NULL),(10,'TIN2-010','na','46','31','1','2016-05-10 11:27:10',NULL,NULL,'6',NULL),(20,'TIN2-020','Light','46','31','1','2016-06-15 15:11:41',NULL,NULL,'6',NULL);

/*Table structure for table `next_trans_cmtt_table` */

DROP TABLE IF EXISTS `next_trans_cmtt_table`;

CREATE TABLE `next_trans_cmtt_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Comments` varchar(255) DEFAULT NULL,
  `TransId` varchar(255) DEFAULT NULL,
  `CommentedBy` varchar(255) DEFAULT NULL,
  `CommentedDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `next_trans_cmtt_table` */

/*Table structure for table `proced_status` */

DROP TABLE IF EXISTS `proced_status`;

CREATE TABLE `proced_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_phase` varchar(100) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `running_status` varchar(30) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `active_status` int(1) DEFAULT '1' COMMENT '1 - active; 0 - inactive',
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=utf8;

/*Data for the table `proced_status` */

insert  into `proced_status`(`status_id`,`pro_phase`,`season_id`,`running_status`,`start_time`,`end_time`,`active_status`) values (1,'PH00001',31,'completed','2016-04-29 14:44:20','2016-04-29 14:44:20',1),(2,'PH00001',31,'started','2016-04-29 18:24:48',NULL,1),(3,'PH00001',31,'started','2016-04-29 18:26:13',NULL,1),(4,'PH00001',31,'started','2016-04-29 18:26:37',NULL,1),(5,'PH00001',31,'completed','2016-04-29 18:27:12','2016-04-29 18:27:13',1),(6,'PH00001',31,'completed','2016-04-29 18:28:29','2016-04-29 18:28:29',1),(7,'PH00001',31,'completed','2016-04-29 18:29:14','2016-04-29 18:29:14',1),(8,'PH00001',31,'started','2016-04-29 18:30:07',NULL,1),(9,'PH00001',31,'started','2016-04-29 18:30:29',NULL,1),(10,'PH00001',31,'completed','2016-04-29 18:31:02','2016-04-29 18:31:02',1),(11,'PH00001',31,'completed','2016-05-02 11:33:15','2016-05-02 11:33:15',1),(12,'PH00001',31,'completed','2016-05-02 11:49:56','2016-05-02 11:49:56',1),(13,'PH00001',31,'completed','2016-05-02 12:23:33','2016-05-02 12:23:33',1),(14,'PH00001',31,'completed','2016-05-02 12:26:14','2016-05-02 12:26:14',1),(15,'PH00001',31,'completed','2016-05-02 12:27:17','2016-05-02 12:27:17',1),(16,'PH00001',31,'completed','2016-05-02 12:31:55','2016-05-02 12:31:55',1),(17,'PH00001',31,'completed','2016-05-02 14:58:37','2016-05-02 14:58:37',1),(18,'PH00001',31,'completed','2016-05-02 16:15:31','2016-05-02 16:15:31',1),(19,'PH00001',31,'completed','2016-05-02 16:17:00','2016-05-02 16:17:00',1),(20,'PH00001',31,'completed','2016-05-02 16:17:59','2016-05-02 16:17:59',1),(21,'PH00001',31,'completed','2016-05-02 16:18:52','2016-05-02 16:18:52',1),(22,'PH00001',31,'completed','2016-05-02 16:19:34','2016-05-02 16:19:34',1),(23,'PH00001',31,'completed','2016-05-02 16:29:26','2016-05-02 16:29:26',1),(24,'PH00001',31,'completed','2016-05-02 16:29:57','2016-05-02 16:29:57',1),(25,'PH00001',31,'completed','2016-05-02 16:35:28','2016-05-02 16:35:28',1),(26,'PH00001',31,'completed','2016-05-02 16:43:33','2016-05-02 16:43:33',1),(27,'PH00001',31,'completed','2016-05-02 16:43:54','2016-05-02 16:43:54',1),(28,'PH00001',31,'completed','2016-05-02 16:45:02','2016-05-02 16:45:02',1),(29,'PH00001',31,'completed','2016-05-02 17:02:19','2016-05-02 17:02:19',1),(30,'PH00001',31,'started','2016-05-02 18:02:03',NULL,1),(31,'PH00001',31,'completed','2016-05-02 18:04:10','2016-05-02 18:04:10',1),(32,'PH00001',31,'completed','2016-05-02 18:04:58','2016-05-02 18:04:58',1),(33,'PH00001',31,'started','2016-05-03 10:56:44',NULL,1),(34,'PH00001',31,'started','2016-05-03 11:01:26',NULL,1),(35,'PH00001',31,'started','2016-05-03 11:03:30',NULL,1),(36,'PH00001',31,'completed','2016-05-03 11:04:56','2016-05-03 11:04:56',1),(37,'PH00002',31,'completed','2016-05-03 11:06:21','2016-05-03 11:06:21',1),(38,'PH00002',31,'completed','2016-05-03 11:09:55','2016-05-03 11:09:55',1),(39,'PH00001',31,'completed','2016-05-03 11:14:08','2016-05-03 11:14:08',1),(40,'PH00001',31,'completed','2016-05-03 11:17:44','2016-05-03 11:17:44',1),(41,'PH00002',31,'completed','2016-05-03 11:20:48','2016-05-03 11:20:48',1),(42,'PH00003',31,'completed','2016-05-03 11:22:18','2016-05-03 11:22:18',1),(43,'PH00001',31,'completed','2016-05-03 11:23:18','2016-05-03 11:23:18',1),(44,'PH00003',31,'completed','2016-05-03 11:23:39','2016-05-03 11:23:39',1),(45,'PH00001',31,'completed','2016-05-03 11:24:19','2016-05-03 11:24:20',1),(46,'PH00002',31,'completed','2016-05-03 11:24:53','2016-05-03 11:24:54',1),(47,'PH00001',31,'completed','2016-05-03 11:26:05','2016-05-03 11:26:05',1),(48,'PH00001',31,'completed','2016-05-03 11:39:58','2016-05-03 11:39:58',1),(49,'PH00001',31,'completed','2016-05-03 11:43:16','2016-05-03 11:43:16',1),(50,'PH00001',31,'completed','2016-05-03 11:43:53','2016-05-03 11:43:53',1),(51,'PH00001',31,'completed','2016-05-03 11:44:18','2016-05-03 11:44:18',1),(52,'PH00001',31,'completed','2016-05-03 11:44:45','2016-05-03 11:44:45',1),(53,'PH00001',31,'completed','2016-05-03 11:45:57','2016-05-03 11:45:57',1),(54,'PH00001',31,'completed','2016-05-03 11:46:50','2016-05-03 11:46:50',1),(55,'PH00001',31,'completed','2016-05-03 11:47:14','2016-05-03 11:47:14',1),(56,'PH00001',31,'completed','2016-05-03 11:47:43','2016-05-03 11:47:43',1),(57,'PH00001',31,'completed','2016-05-03 11:48:17','2016-05-03 11:48:17',1),(58,'PH00001',31,'completed','2016-05-03 11:48:58','2016-05-03 11:48:58',1),(59,'PH00001',31,'completed','2016-05-03 11:49:29','2016-05-03 11:49:29',1),(60,'PH00001',31,'completed','2016-05-03 11:51:16','2016-05-03 11:51:16',1),(61,'PH00001',31,'completed','2016-05-03 11:51:49','2016-05-03 11:51:49',1),(62,'PH00001',31,'completed','2016-05-03 12:05:23','2016-05-03 12:05:23',1),(63,'PH00001',31,'completed','2016-05-03 12:06:25','2016-05-03 12:06:25',1),(64,'PH00002',31,'completed','2016-05-03 12:07:46','2016-05-03 12:07:46',1),(65,'PH00003',31,'completed','2016-05-03 12:11:13','2016-05-03 12:11:13',1),(66,'PH00001',31,'completed','2016-05-03 12:15:12','2016-05-03 12:15:12',1),(67,'PH00002',31,'completed','2016-05-03 12:16:24','2016-05-03 12:16:24',1),(68,'PH00003',31,'completed','2016-05-03 12:19:52','2016-05-03 12:19:52',1),(69,'PH00003',31,'completed','2016-05-03 12:33:06','2016-05-03 12:33:06',1),(70,'PH00002',31,'completed','2016-05-03 12:33:22','2016-05-03 12:33:22',1),(71,'PH00002',31,'completed','2016-05-03 12:33:44','2016-05-03 12:33:44',1),(72,'PH00003',31,'completed','2016-05-03 12:35:25','2016-05-03 12:35:25',1),(73,'PH00003',31,'completed','2016-05-03 12:39:50','2016-05-03 12:39:50',1),(74,'PH00002',31,'completed','2016-05-03 12:40:28','2016-05-03 12:40:28',1),(75,'PH00002',31,'started','2016-05-03 12:45:24',NULL,1),(76,'PH00002',31,'started','2016-05-03 12:45:48',NULL,1),(77,'PH00002',31,'started','2016-05-03 12:45:49',NULL,1),(78,'PH00002',31,'started','2016-05-03 12:47:33',NULL,1),(79,'PH00002',31,'completed','2016-05-03 12:48:59','2016-05-03 12:48:59',1),(80,'PH00003',31,'completed','2016-05-03 12:49:16','2016-05-03 12:49:16',1),(81,'PH00001',31,'completed','2016-05-03 12:51:34','2016-05-03 12:51:34',1),(82,'PH00001',31,'completed','2016-05-03 13:04:19','2016-05-03 13:04:19',1),(83,'PH00001',31,'completed','2016-05-03 13:37:45','2016-05-03 13:37:45',1),(84,'PH00002',31,'completed','2016-05-03 15:13:39','2016-05-03 15:13:39',1),(85,'PH00001',31,'completed','2016-05-04 11:16:51','2016-05-04 11:16:51',1),(86,'PH00002',31,'completed','2016-05-04 11:17:26','2016-05-04 11:17:26',1),(87,'PH00001',31,'completed','2016-05-04 11:20:13','2016-05-04 11:20:13',1),(88,'PH00002',31,'completed','2016-05-04 11:20:43','2016-05-04 11:20:43',1),(89,'PH00003',31,'completed','2016-05-04 11:21:21','2016-05-04 11:21:21',1),(90,'PH00001',31,'completed','2016-05-04 12:25:15','2016-05-04 12:25:15',1),(91,'PH00003',31,'completed','2016-05-04 12:26:48','2016-05-04 12:26:48',1),(92,'PH00001',31,'completed','2016-05-04 12:27:47','2016-05-04 12:27:48',1),(93,'PH00002',31,'completed','2016-05-04 12:28:41','2016-05-04 12:28:41',1),(94,'PH00001',31,'completed','2016-05-04 14:56:32','2016-05-04 14:56:32',1),(95,'PH00001',31,'completed','2016-05-06 12:53:04','2016-05-06 12:53:04',1),(96,'PH00001',31,'completed','2016-05-06 12:54:23','2016-05-06 12:54:23',1),(97,'PH00001',31,'completed','2016-05-06 12:57:44','2016-05-06 12:57:44',1),(98,'PH00001',31,'completed','2016-05-06 13:26:04','2016-05-06 13:26:04',1),(99,'PH00001',31,'completed','2016-05-06 13:29:41','2016-05-06 13:29:41',1),(100,'PH00001',31,'completed','2016-05-06 14:45:48','2016-05-06 14:45:48',1),(101,'PH00001',31,'completed','2016-05-06 14:48:13','2016-05-06 14:48:13',1),(102,'PH00002',31,'completed','2016-05-06 14:48:37','2016-05-06 14:48:37',1),(103,'PH00001',31,'completed','2016-05-10 11:31:33','2016-05-10 11:31:33',1),(104,'PH00001',31,'completed','2016-05-10 11:47:50','2016-05-10 11:47:50',1),(105,'PH00001',31,'completed','2016-05-10 11:51:43','2016-05-10 11:51:43',1),(106,'PH00001',31,'completed','2016-05-10 11:52:58','2016-05-10 11:52:58',1),(107,'PH00002',31,'completed','2016-05-10 13:00:16','2016-05-10 13:00:16',1),(108,'PH00001',31,'completed','2016-05-10 13:11:09','2016-05-10 13:11:09',1),(109,'PH00001',31,'completed','2016-05-10 16:29:58','2016-05-10 16:29:58',1),(110,'PH00001',31,'completed','2016-05-10 16:32:07','2016-05-10 16:32:07',1),(111,'PH00001',31,'completed','2016-05-10 16:35:26','2016-05-10 16:35:26',1),(112,'PH00001',31,'completed','2016-05-10 16:39:03','2016-05-10 16:39:03',1),(113,'PH00001',31,'completed','2016-05-10 16:41:02','2016-05-10 16:41:02',1),(114,'PH00001',31,'completed','2016-05-10 17:17:51','2016-05-10 17:17:51',1),(115,'PH00001',31,'completed','2016-05-11 11:50:48','2016-05-11 11:50:48',1),(116,'PH00001',31,'completed','2016-05-11 12:06:10','2016-05-11 12:06:10',1),(117,'PH00001',31,'completed','2016-05-11 12:13:27','2016-05-11 12:13:27',1),(118,'PH00002',31,'completed','2016-05-11 12:14:39','2016-05-11 12:14:39',1),(119,'PH00001',31,'completed','2016-05-11 12:29:55','2016-05-11 12:29:55',1),(120,'PH00001',31,'completed','2016-05-11 12:42:04','2016-05-11 12:42:04',1),(121,'PH00001',31,'completed','2016-05-12 12:49:31','2016-05-12 12:49:31',1),(122,'PH00001',31,'completed','2016-05-17 12:05:29','2016-05-17 12:05:29',1),(123,'PH00001',31,'completed','2016-05-17 12:07:02','2016-05-17 12:07:02',1),(124,'PH00001',31,'completed','2016-05-17 12:11:00','2016-05-17 12:11:00',1),(125,'PH00001',31,'completed','2016-05-17 12:12:35','2016-05-17 12:12:35',1),(126,'PH00001',31,'completed','2016-05-17 12:14:14','2016-05-17 12:14:14',1),(127,'PH00001',31,'completed','2016-05-17 12:15:02','2016-05-17 12:15:02',1),(128,'PH00001',31,'completed','2016-05-17 12:16:40','2016-05-17 12:16:40',1),(129,'PH00001',31,'completed','2016-05-17 12:18:29','2016-05-17 12:18:29',1),(130,'PH00001',31,'completed','2016-05-17 12:26:10','2016-05-17 12:26:10',1),(131,'PH00001',31,'completed','2016-05-17 12:31:16','2016-05-17 12:31:16',1),(132,'PH00001',31,'completed','2016-05-17 12:36:40','2016-05-17 12:36:40',1),(133,'PH00001',31,'completed','2016-05-17 12:39:09','2016-05-17 12:39:09',1),(134,'PH00001',31,'completed','2016-05-17 12:40:59','2016-05-17 12:40:59',1),(135,'PH00001',31,'completed','2016-05-17 12:51:09','2016-05-17 12:51:09',1),(136,'PH00001',31,'completed','2016-05-17 12:56:24','2016-05-17 12:56:24',1),(137,'PH00001',31,'completed','2016-05-17 12:57:32','2016-05-17 12:57:32',1),(138,'PH00001',31,'completed','2016-05-17 12:59:40','2016-05-17 12:59:41',1),(139,'PH00001',31,'completed','2016-05-17 13:04:49','2016-05-17 13:04:49',1),(140,'PH00001',31,'completed','2016-05-17 13:06:09','2016-05-17 13:06:09',1),(141,'PH00001',31,'completed','2016-05-17 13:07:59','2016-05-17 13:07:59',1),(142,'PH00001',31,'completed','2016-05-17 13:38:50','2016-05-17 13:38:50',1),(143,'PH00001',31,'completed','2016-05-17 13:46:14','2016-05-17 13:46:14',1),(144,'PH00001',31,'completed','2016-05-17 13:47:08','2016-05-17 13:47:08',1),(145,'PH00002',31,'completed','2016-05-17 13:47:17','2016-05-17 13:47:17',1),(146,'PH00001',31,'completed','2016-05-17 13:48:12','2016-05-17 13:48:12',1),(147,'PH00001',31,'completed','2016-05-17 13:49:11','2016-05-17 13:49:11',1),(148,'PH00001',31,'completed','2016-05-17 13:51:46','2016-05-17 13:51:46',1),(149,'PH00001',31,'completed','2016-05-17 13:52:36','2016-05-17 13:52:36',1),(150,'PH00001',31,'completed','2016-05-17 13:54:25','2016-05-17 13:54:25',1),(151,'PH00001',31,'completed','2016-05-17 13:55:50','2016-05-17 13:55:50',1),(152,'PH00001',31,'completed','2016-05-17 16:54:55','2016-05-17 16:54:55',1),(153,'PH00001',31,'completed','2016-05-18 16:10:25','2016-05-18 16:10:25',1),(154,'PH00002',31,'completed','2016-05-18 16:10:30','2016-05-18 16:10:30',1),(155,'PH00001',31,'completed','2016-05-18 16:11:07','2016-05-18 16:11:07',1),(156,'PH00001',31,'completed','2016-05-18 16:13:00','2016-05-18 16:13:00',1),(157,'PH00001',31,'completed','2016-05-19 11:11:04','2016-05-19 11:11:04',1),(158,'PH00001',31,'completed','2016-05-19 11:11:42','2016-05-19 11:11:42',1),(159,'PH00001',31,'completed','2016-05-19 11:13:34','2016-05-19 11:13:34',1),(160,'PH00001',31,'completed','2016-05-19 11:22:45','2016-05-19 11:22:45',1),(161,'PH00001',31,'completed','2016-05-19 11:29:07','2016-05-19 11:29:07',1),(162,'PH00001',31,'completed','2016-05-19 11:41:19','2016-05-19 11:41:19',1),(163,'PH00001',31,'completed','2016-05-19 11:43:07','2016-05-19 11:43:07',1),(164,'PH00001',31,'completed','2016-05-19 11:43:59','2016-05-19 11:43:59',1),(165,'PH00001',31,'completed','2016-05-19 11:57:34','2016-05-19 11:57:34',1),(166,'PH00001',31,'completed','2016-05-19 16:30:13','2016-05-19 16:30:13',1),(167,'PH00001',31,'completed','2016-05-19 16:31:03','2016-05-19 16:31:03',1),(168,'PH00001',31,'completed','2016-05-19 16:32:09','2016-05-19 16:32:09',1),(169,'PH00001',31,'completed','2016-05-19 16:45:49','2016-05-19 16:45:49',1),(170,'PH00001',31,'completed','2016-05-19 16:55:33','2016-05-19 16:55:33',1),(171,'PH00001',31,'completed','2016-05-19 17:06:03','2016-05-19 17:06:03',1),(172,'PH00001',31,'completed','2016-05-20 11:11:30','2016-05-20 11:11:30',1),(173,'PH00001',31,'completed','2016-05-20 11:12:26','2016-05-20 11:12:26',1),(174,'PH00001',31,'completed','2016-05-20 11:13:45','2016-05-20 11:13:45',1),(175,'PH00001',31,'completed','2016-05-20 11:15:20','2016-05-20 11:15:20',1),(176,'PH00001',31,'completed','2016-05-20 11:21:01','2016-05-20 11:21:01',1),(177,'PH00001',31,'completed','2016-05-20 11:25:44','2016-05-20 11:25:44',1),(178,'PH00001',31,'completed','2016-05-20 11:26:48','2016-05-20 11:26:48',1),(179,'PH00001',31,'completed','2016-05-20 11:27:23','2016-05-20 11:27:23',1),(180,'PH00001',31,'completed','2016-05-20 11:28:14','2016-05-20 11:28:15',1),(181,'PH00001',31,'completed','2016-05-20 11:31:02','2016-05-20 11:31:02',1),(182,'PH00001',31,'completed','2016-05-20 11:32:22','2016-05-20 11:32:22',1),(183,'PH00001',31,'completed','2016-05-20 11:39:17','2016-05-20 11:39:17',1),(184,'PH00001',31,'completed','2016-05-20 12:06:30','2016-05-20 12:06:30',1),(185,'PH00001',31,'completed','2016-05-20 12:11:24','2016-05-20 12:11:24',1),(186,'PH00002',31,'completed','2016-05-20 12:11:52','2016-05-20 12:11:52',1),(187,'PH00001',31,'completed','2016-05-20 12:15:32','2016-05-20 12:15:32',1),(188,'PH00001',31,'completed','2016-05-20 12:16:11','2016-05-20 12:16:11',1),(189,'PH00001',31,'completed','2016-05-24 11:23:14','2016-05-24 11:23:14',1),(190,'PH00001',31,'completed','2016-05-24 11:23:48','2016-05-24 11:23:48',1),(191,'PH00001',31,'completed','2016-05-24 15:14:35','2016-05-24 15:14:35',1),(192,'PH00001',31,'completed','2016-05-24 15:18:13','2016-05-24 15:18:13',1),(193,'PH00001',31,'completed','2016-05-24 15:21:59','2016-05-24 15:22:00',1),(194,'PH00001',31,'completed','2016-05-24 15:24:12','2016-05-24 15:24:12',1),(195,'PH00001',31,'completed','2016-05-24 17:26:47','2016-05-24 17:26:47',1),(196,'PH00001',31,'completed','2016-05-24 17:29:07','2016-05-24 17:29:07',1),(197,'PH00001',31,'completed','2016-05-24 17:32:43','2016-05-24 17:32:43',1),(198,'PH00001',31,'completed','2016-05-24 17:35:47','2016-05-24 17:35:47',1),(199,'PH00001',31,'completed','2016-05-24 17:36:38','2016-05-24 17:36:38',1),(200,'PH00001',31,'completed','2016-05-24 17:39:20','2016-05-24 17:39:20',1),(201,'PH00001',31,'completed','2016-05-24 17:41:18','2016-05-24 17:41:18',1),(202,'PH00001',31,'completed','2016-05-24 17:44:01','2016-05-24 17:44:01',1),(203,'PH00001',31,'completed','2016-05-24 17:46:27','2016-05-24 17:46:27',1),(204,'PH00001',31,'completed','2016-05-24 17:47:29','2016-05-24 17:47:29',1),(205,'PH00001',31,'completed','2016-05-24 17:54:40','2016-05-24 17:54:40',1),(206,'PH00001',31,'completed','2016-05-24 17:55:56','2016-05-24 17:55:56',1),(207,'PH00001',31,'completed','2016-05-24 17:57:19','2016-05-24 17:57:19',1),(208,'PH00001',31,'completed','2016-05-24 18:00:01','2016-05-24 18:00:01',1),(209,'PH00001',31,'completed','2016-05-24 18:01:52','2016-05-24 18:01:52',1),(210,'PH00001',31,'completed','2016-05-24 18:02:50','2016-05-24 18:02:51',1),(211,'PH00001',31,'completed','2016-05-25 18:22:16','2016-05-25 18:22:16',1),(212,'PH00001',31,'started','2016-05-25 18:28:59',NULL,1),(213,'PH00001',31,'started','2016-05-25 18:34:16',NULL,1),(214,'PH00001',31,'completed','2016-05-25 18:38:46','2016-05-25 18:38:46',1),(215,'PH00001',31,'completed','2016-05-30 15:09:07','2016-05-30 15:09:07',1),(216,'PH00001',31,'completed','2016-05-30 15:24:29','2016-05-30 15:24:29',1),(217,'PH00001',31,'completed','2016-05-30 15:28:26','2016-05-30 15:28:26',1),(218,'PH00001',31,'completed','2016-05-30 16:31:52','2016-05-30 16:31:52',1),(219,'PH00001',31,'completed','2016-05-30 16:33:32','2016-05-30 16:33:32',1),(220,'PH00001',31,'completed','2016-05-30 18:25:03','2016-05-30 18:25:03',1),(221,'PH00001',31,'completed','2016-05-30 18:27:54','2016-05-30 18:27:54',1),(222,'PH00001',31,'completed','2016-05-30 18:49:22','2016-05-30 18:49:22',1),(223,'PH00001',31,'completed','2016-05-30 19:22:00','2016-05-30 19:22:00',1),(224,'PH00001',31,'completed','2016-05-30 19:22:35','2016-05-30 19:22:35',1),(225,'PH00001',31,'completed','2016-05-31 10:25:34','2016-05-31 10:25:34',1),(226,'PH00001',31,'completed','2016-05-31 10:36:20','2016-05-31 10:36:20',1),(227,'PH00001',31,'completed','2016-05-31 10:41:36','2016-05-31 10:41:36',1),(228,'PH00001',31,'completed','2016-05-31 10:45:29','2016-05-31 10:45:29',1),(229,'PH00001',31,'completed','2016-05-31 11:12:54','2016-05-31 11:12:54',1),(230,'PH00001',31,'completed','2016-05-31 11:17:10','2016-05-31 11:17:10',1),(231,'PH00001',31,'completed','2016-05-31 11:17:50','2016-05-31 11:17:50',1),(232,'PH00001',31,'completed','2016-05-31 11:22:27','2016-05-31 11:22:27',1),(233,'PH00001',31,'completed','2016-05-31 11:24:42','2016-05-31 11:24:42',1),(234,'PH00001',31,'completed','2016-05-31 11:44:57','2016-05-31 11:44:57',1),(235,'PH00001',31,'completed','2016-05-31 11:54:04','2016-05-31 11:54:04',1),(236,'PH00001',31,'completed','2016-05-31 12:02:53','2016-05-31 12:02:53',1),(237,'PH00001',31,'completed','2016-05-31 12:45:13','2016-05-31 12:45:14',1),(238,'PH00001',31,'completed','2016-05-31 13:52:15','2016-05-31 13:52:15',1),(239,'PH00001',31,'completed','2016-05-31 14:21:59','2016-05-31 14:21:59',1),(240,'PH00001',31,'completed','2016-06-01 10:26:51','2016-06-01 10:26:51',1),(241,'PH00001',31,'completed','2016-06-01 10:50:22','2016-06-01 10:50:22',1),(242,'PH00001',31,'completed','2016-06-01 11:31:48','2016-06-01 11:31:48',1),(243,'PH00001',31,'completed','2016-06-01 15:05:03','2016-06-01 15:05:03',1),(244,'PH00001',31,'completed','2016-06-01 15:06:45','2016-06-01 15:06:45',1),(245,'PH00001',31,'completed','2016-06-01 15:18:58','2016-06-01 15:18:58',1),(246,'PH00001',31,'completed','2016-06-01 15:20:36','2016-06-01 15:20:36',1),(247,'PH00001',31,'completed','2016-06-01 15:22:45','2016-06-01 15:22:45',1),(248,'PH00001',31,'completed','2016-06-01 15:24:02','2016-06-01 15:24:02',1),(249,'PH00001',31,'completed','2016-06-01 15:27:18','2016-06-01 15:27:18',1),(250,'PH00001',31,'completed','2016-06-01 15:28:19','2016-06-01 15:28:19',1),(251,'PH00001',31,'completed','2016-06-01 15:35:04','2016-06-01 15:35:04',1),(252,'PH00001',31,'completed','2016-06-01 15:38:48','2016-06-01 15:38:48',1),(253,'PH00001',31,'completed','2016-06-01 15:47:01','2016-06-01 15:47:01',1),(254,'PH00001',31,'completed','2016-06-01 15:49:18','2016-06-01 15:49:19',1),(255,'PH00001',31,'completed','2016-06-01 15:51:17','2016-06-01 15:51:17',1),(256,'PH00001',31,'completed','2016-06-01 16:05:58','2016-06-01 16:05:59',1),(257,'PH00002',31,'completed','2016-06-01 16:17:26','2016-06-01 16:17:27',1),(258,'PH00001',31,'completed','2016-06-01 17:22:15','2016-06-01 17:22:16',1),(259,'PH00001',31,'completed','2016-06-01 17:24:35','2016-06-01 17:24:35',1),(260,'PH00001',31,'completed','2016-06-01 17:26:09','2016-06-01 17:26:10',1),(261,'PH00001',31,'completed','2016-06-01 17:31:36','2016-06-01 17:31:36',1),(262,'PH00001',31,'completed','2016-06-03 14:38:35','2016-06-03 14:38:35',1),(263,'PH00002',31,'completed','2016-06-03 15:51:43','2016-06-03 15:51:44',1),(264,'PH00001',31,'completed','2016-06-03 18:19:46','2016-06-03 18:19:46',1),(265,'PH00001',31,'started','2016-06-07 12:37:13',NULL,1),(266,'PH00001',31,'started','2016-06-07 12:38:37',NULL,1),(267,'PH00001',31,'completed','2016-06-07 12:39:00','2016-06-07 12:39:01',1),(268,'PH00001',31,'started','2016-06-07 12:51:49',NULL,1),(269,'PH00001',31,'started','2016-06-07 12:53:38',NULL,1),(270,'PH00001',31,'started','2016-06-07 12:54:39',NULL,1),(271,'PH00001',31,'completed','2016-06-07 13:00:46','2016-06-07 13:00:46',1),(272,'PH00001',31,'completed','2016-06-07 13:10:24','2016-06-07 13:10:25',1),(273,'PH00001',31,'completed','2016-06-07 14:06:21','2016-06-07 14:06:21',1),(274,'PH00001',31,'completed','2016-06-07 14:11:19','2016-06-07 14:11:19',1),(275,'PH00001',31,'completed','2016-06-07 14:14:46','2016-06-07 14:14:46',1),(276,'PH00001',31,'completed','2016-06-07 14:25:47','2016-06-07 14:25:47',1),(277,'PH00001',31,'completed','2016-06-07 14:27:38','2016-06-07 14:27:38',1),(278,'PH00001',31,'completed','2016-06-07 14:32:11','2016-06-07 14:32:11',1),(279,'PH00001',31,'completed','2016-06-07 14:35:26','2016-06-07 14:35:26',1),(280,'PH00001',31,'completed','2016-06-08 15:28:56','2016-06-08 15:28:56',1),(281,'PH00001',31,'started','2016-06-09 12:44:34',NULL,1),(282,'PH00001',31,'completed','2016-06-09 12:46:50','2016-06-09 12:46:50',1),(283,'PH00001',31,'completed','2016-06-09 13:05:07','2016-06-09 13:05:07',1),(284,'PH00001',31,'completed','2016-06-09 13:09:17','2016-06-09 13:09:18',1),(285,'PH00001',31,'completed','2016-06-09 13:09:39','2016-06-09 13:09:39',1),(286,'PH00001',31,'completed','2016-06-09 13:09:59','2016-06-09 13:09:59',1),(287,'PH00001',31,'completed','2016-06-09 13:10:27','2016-06-09 13:10:27',1),(288,'PH00001',31,'completed','2016-06-09 13:10:33','2016-06-09 13:10:33',1),(289,'PH00001',31,'completed','2016-06-09 13:12:07','2016-06-09 13:12:07',1),(290,'PH00001',31,'completed','2016-06-09 13:16:32','2016-06-09 13:16:32',1),(291,'PH00001',31,'completed','2016-06-09 13:19:40','2016-06-09 13:19:40',1),(292,'PH00001',31,'completed','2016-06-09 13:19:40','2016-06-09 13:19:40',1),(293,'PH00001',31,'completed','2016-06-09 16:24:48','2016-06-09 16:24:48',1),(294,'PH00001',31,'completed','2016-06-09 16:25:23','2016-06-09 16:25:23',1),(295,'PH00001',31,'completed','2016-06-09 16:25:51','2016-06-09 16:25:51',1),(296,'PH00001',31,'completed','2016-06-09 16:26:52','2016-06-09 16:26:52',1),(297,'PH00001',31,'completed','2016-06-09 16:27:20','2016-06-09 16:27:20',1),(298,'PH00001',31,'completed','2016-06-09 16:28:16','2016-06-09 16:28:16',1),(299,'PH00001',31,'completed','2016-06-09 16:30:20','2016-06-09 16:30:20',1),(300,'PH00001',31,'completed','2016-06-09 16:31:06','2016-06-09 16:31:07',1),(301,'PH00001',31,'completed','2016-06-09 16:33:39','2016-06-09 16:33:40',1),(302,'PH00001',31,'completed','2016-06-09 16:34:00','2016-06-09 16:34:00',1),(303,'PH00001',31,'completed','2016-06-09 17:59:48','2016-06-09 17:59:48',1),(304,'PH00001',31,'completed','2016-06-09 18:00:47','2016-06-09 18:00:47',1),(305,'PH00001',31,'completed','2016-06-09 18:01:35','2016-06-09 18:01:35',1),(306,'PH00001',31,'completed','2016-06-09 18:01:47','2016-06-09 18:01:47',1),(307,'PH00001',31,'completed','2016-06-09 18:03:34','2016-06-09 18:03:34',1),(308,'PH00001',31,'completed','2016-06-09 18:04:24','2016-06-09 18:04:24',1),(309,'PH00001',31,'completed','2016-06-09 18:27:23','2016-06-09 18:27:23',1),(310,'PH00001',31,'started','2016-06-09 18:27:59',NULL,1),(311,'PH00001',31,'started','2016-06-09 18:29:23',NULL,1),(312,'PH00001',31,'started','2016-06-09 18:29:59',NULL,1),(313,'PH00001',31,'started','2016-06-09 18:30:58',NULL,1),(314,'PH00001',31,'completed','2016-06-09 18:31:28','2016-06-09 18:31:28',1),(315,'PH00001',31,'completed','2016-06-09 18:32:25','2016-06-09 18:32:25',1),(316,'PH00001',31,'started','2016-06-10 11:32:21',NULL,1),(317,'PH00001',31,'completed','2016-06-10 11:54:16','2016-06-10 11:54:16',1),(318,'PH00001',31,'completed','2016-06-10 16:36:57','2016-06-10 16:36:57',1),(319,'PH00001',31,'completed','2016-06-10 16:41:26','2016-06-10 16:41:26',1),(320,'PH00001',31,'completed','2016-06-10 16:45:33','2016-06-10 16:45:33',1),(321,'PH00001',31,'completed','2016-06-10 16:46:03','2016-06-10 16:46:03',1),(322,'PH00001',31,'completed','2016-06-10 16:48:51','2016-06-10 16:48:51',1),(323,'PH00001',31,'completed','2016-06-10 17:22:48','2016-06-10 17:22:48',1),(324,'PH00001',31,'completed','2016-06-10 17:23:48','2016-06-10 17:23:48',1),(325,'PH00001',31,'completed','2016-06-10 17:24:14','2016-06-10 17:24:14',1),(326,'PH00001',31,'completed','2016-06-10 17:24:34','2016-06-10 17:24:34',1),(327,'PH00001',31,'completed','2016-06-10 17:58:43','2016-06-10 17:58:43',1),(328,'PH00001',31,'completed','2016-06-10 18:07:38','2016-06-10 18:07:38',1),(329,'PH00001',31,'completed','2016-06-10 18:08:17','2016-06-10 18:08:17',1),(330,'PH00001',31,'completed','2016-06-10 18:09:24','2016-06-10 18:09:24',1),(331,'PH00001',31,'completed','2016-06-10 18:11:19','2016-06-10 18:11:19',1),(332,'PH00001',31,'completed','2016-06-14 14:26:41','2016-06-14 14:26:41',1),(333,'PH00001',31,'completed','2016-06-14 14:35:54','2016-06-14 14:35:54',1),(334,'PH00001',31,'completed','2016-06-14 14:46:32','2016-06-14 14:46:32',1),(335,'PH00001',31,'completed','2016-06-14 15:00:26','2016-06-14 15:00:26',1),(336,'PH00001',31,'completed','2016-06-14 15:08:46','2016-06-14 15:08:46',1),(337,'PH00001',31,'completed','2016-06-14 17:04:45','2016-06-14 17:04:45',1),(338,'PH00001',31,'completed','2016-06-14 17:04:45','2016-06-14 17:04:45',1),(339,'PH00001',31,'completed','2016-06-14 17:05:44','2016-06-14 17:05:44',1),(340,'PH00001',31,'completed','2016-06-14 17:05:44','2016-06-14 17:05:44',1),(341,'PH00001',31,'completed','2016-06-14 17:18:09','2016-06-14 17:18:09',1),(342,'PH00001',31,'completed','2016-06-14 17:18:09','2016-06-14 17:18:09',1),(343,'PH00001',31,'completed','2016-06-14 17:18:09','2016-06-14 17:18:09',1),(344,'PH00001',31,'completed','2016-06-14 17:19:38','2016-06-14 17:19:38',1),(345,'PH00001',31,'completed','2016-06-14 17:19:38','2016-06-14 17:19:38',1),(346,'PH00001',31,'completed','2016-06-14 17:19:38','2016-06-14 17:19:38',1),(347,'PH00001',31,'completed','2016-06-14 17:21:11','2016-06-14 17:21:11',1),(348,'PH00001',31,'completed','2016-06-14 17:21:11','2016-06-14 17:21:11',1),(349,'PH00001',31,'completed','2016-06-14 17:21:11','2016-06-14 17:21:11',1),(350,'PH00001',31,'completed','2016-06-14 17:24:17','2016-06-14 17:24:17',1),(351,'PH00001',31,'completed','2016-06-14 17:25:20','2016-06-14 17:25:20',1),(352,'PH00001',31,'completed','2016-06-14 17:25:37','2016-06-14 17:25:37',1),(353,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(354,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(355,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(356,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(357,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(358,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(359,'PH00001',31,'completed','2016-06-14 17:26:03','2016-06-14 17:26:03',1),(360,'PH00001',31,'completed','2016-06-14 17:30:18','2016-06-14 17:30:19',1),(361,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(362,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(363,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(364,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(365,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(366,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(367,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(368,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(369,'PH00001',31,'completed','2016-06-14 17:30:19','2016-06-14 17:30:19',1),(370,'PH00001',31,'completed','2016-06-14 17:36:58','2016-06-14 17:36:58',1),(371,'PH00001',31,'completed','2016-06-14 17:37:47','2016-06-14 17:37:47',1),(372,'PH00001',31,'completed','2016-06-14 17:37:47','2016-06-14 17:37:47',1),(373,'PH00001',31,'completed','2016-06-14 17:37:47','2016-06-14 17:37:47',1),(374,'PH00001',31,'completed','2016-06-14 17:38:28','2016-06-14 17:38:28',1),(375,'PH00001',31,'completed','2016-06-14 17:38:41','2016-06-14 17:38:41',1),(376,'PH00001',31,'completed','2016-06-14 17:38:41','2016-06-14 17:38:41',1),(377,'PH00001',31,'completed','2016-06-14 17:38:41','2016-06-14 17:38:41',1),(378,'PH00001',31,'completed','2016-06-14 17:40:15','2016-06-14 17:40:15',1),(379,'PH00001',31,'completed','2016-06-14 17:40:55','2016-06-14 17:40:55',1),(380,'PH00001',31,'completed','2016-06-14 17:41:47','2016-06-14 17:41:47',1),(381,'PH00001',31,'completed','2016-06-14 17:45:04','2016-06-14 17:45:04',1),(382,'PH00001',31,'completed','2016-06-14 17:48:38','2016-06-14 17:48:38',1),(383,'PH00001',31,'completed','2016-06-14 17:49:02','2016-06-14 17:49:02',1),(384,'PH00001',31,'completed','2016-06-14 18:12:31','2016-06-14 18:12:31',1),(385,'PH00001',31,'completed','2016-06-14 18:14:09','2016-06-14 18:14:09',1),(386,'PH00001',31,'completed','2016-06-14 18:14:24','2016-06-14 18:14:24',1),(387,'PH00001',31,'completed','2016-06-14 18:14:30','2016-06-14 18:14:30',1),(388,'PH00001',31,'completed','2016-06-14 18:14:41','2016-06-14 18:14:41',1),(389,'PH00001',31,'completed','2016-06-14 18:15:40','2016-06-14 18:15:40',1),(390,'PH00001',31,'completed','2016-06-14 18:19:35','2016-06-14 18:19:35',1),(391,'PH00001',31,'completed','2016-06-14 18:21:32','2016-06-14 18:21:32',1),(392,'PH00001',31,'completed','2016-06-14 18:22:55','2016-06-14 18:22:55',1),(393,'PH00001',31,'completed','2016-06-14 18:24:53','2016-06-14 18:24:53',1),(394,'PH00001',31,'completed','2016-06-14 18:27:43','2016-06-14 18:27:43',1),(395,'PH00001',31,'completed','2016-06-14 18:28:22','2016-06-14 18:28:22',1),(396,'PH00001',31,'completed','2016-06-14 18:34:41','2016-06-14 18:34:41',1),(397,'PH00001',31,'completed','2016-06-14 18:39:12','2016-06-14 18:39:12',1),(398,'PH00001',31,'completed','2016-06-14 18:40:42','2016-06-14 18:40:42',1),(399,'PH00001',31,'completed','2016-06-14 18:41:44','2016-06-14 18:41:44',1),(400,'PH00001',31,'completed','2016-06-14 18:42:18','2016-06-14 18:42:18',1),(401,'PH00001',31,'completed','2016-06-14 18:47:19','2016-06-14 18:47:19',1),(402,'PH00001',31,'completed','2016-06-14 18:48:27','2016-06-14 18:48:28',1),(403,'PH00001',31,'completed','2016-06-14 18:50:50','2016-06-14 18:50:50',1),(404,'PH00001',31,'completed','2016-06-14 18:53:59','2016-06-14 18:53:59',1),(405,'PH00001',31,'completed','2016-06-15 14:12:35','2016-06-15 14:12:35',1),(406,'PH00001',31,'completed','2016-06-15 14:12:59','2016-06-15 14:12:59',1),(407,'PH00001',31,'completed','2016-06-15 14:34:41','2016-06-15 14:34:41',1),(408,'PH00001',31,'completed','2016-06-15 14:35:39','2016-06-15 14:35:40',1),(409,'PH00001',31,'completed','2016-06-15 14:42:54','2016-06-15 14:42:54',1),(410,'PH00001',31,'completed','2016-06-15 14:44:20','2016-06-15 14:44:20',1),(411,'PH00001',31,'completed','2016-06-15 14:46:27','2016-06-15 14:46:27',1),(412,'PH00001',31,'completed','2016-06-15 14:47:43','2016-06-15 14:47:43',1),(413,'PH00001',31,'completed','2016-06-15 14:48:32','2016-06-15 14:48:32',1),(414,'PH00001',31,'completed','2016-06-15 14:49:41','2016-06-15 14:49:41',1),(415,'PH00001',31,'completed','2016-06-15 14:51:41','2016-06-15 14:51:41',1),(416,'PH00001',31,'completed','2016-06-15 14:52:33','2016-06-15 14:52:33',1),(417,'PH00001',31,'completed','2016-06-15 14:52:50','2016-06-15 14:52:50',1),(418,'PH00001',31,'completed','2016-06-15 14:52:50','2016-06-15 14:52:50',1),(419,'PH00001',31,'completed','2016-06-15 14:52:50','2016-06-15 14:52:50',1),(420,'PH00001',31,'completed','2016-06-15 14:52:50','2016-06-15 14:52:50',1),(421,'PH00001',31,'started','2016-06-15 15:08:21',NULL,1),(422,'PH00001',31,'completed','2016-06-15 15:09:30','2016-06-15 15:09:30',1),(423,'PH00001',31,'completed','2016-06-15 15:10:27','2016-06-15 15:10:27',1),(424,'PH00001',31,'completed','2016-06-15 15:11:41','2016-06-15 15:11:41',1),(425,'PH00001',31,'completed','2016-06-15 15:14:11','2016-06-15 15:14:11',1),(426,'PH00001',31,'completed','2016-06-15 15:15:02','2016-06-15 15:15:02',1),(427,'PH00001',31,'completed','2016-06-15 15:16:15','2016-06-15 15:16:15',1),(428,'PH00001',31,'completed','2016-06-15 15:18:52','2016-06-15 15:18:52',1),(429,'PH00001',31,'completed','2016-06-15 15:19:42','2016-06-15 15:19:42',1),(430,'PH00001',31,'completed','2016-06-15 15:19:42','2016-06-15 15:19:42',1),(431,'PH00001',31,'completed','2016-06-15 15:22:25','2016-06-15 15:22:25',1),(432,'PH00001',31,'completed','2016-06-15 15:23:32','2016-06-15 15:23:32',1),(433,'PH00001',31,'completed','2016-06-15 15:26:09','2016-06-15 15:26:10',1),(434,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(435,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(436,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(437,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(438,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(439,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(440,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(441,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(442,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(443,'PH00001',31,'completed','2016-06-15 15:28:49','2016-06-15 15:28:49',1),(444,'PH00001',31,'completed','2016-06-15 15:46:40','2016-06-15 15:46:40',1),(445,'PH00001',31,'completed','2016-06-15 15:56:47','2016-06-15 15:56:47',1),(446,'PH00001',31,'completed','2016-06-15 15:57:28','2016-06-15 15:57:28',1),(447,'PH00001',31,'completed','2016-06-15 16:21:42','2016-06-15 16:21:42',1),(448,'PH00001',31,'completed','2016-06-15 16:22:55','2016-06-15 16:22:55',1),(449,'PH00001',31,'completed','2016-06-15 16:31:25','2016-06-15 16:31:25',1),(450,'PH00001',31,'completed','2016-06-15 16:32:25','2016-06-15 16:32:25',1);

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

/* Procedure structure for procedure `CheckBrief` */

/*!50003 DROP PROCEDURE IF EXISTS  `CheckBrief` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckBrief`(
 IN pid VARCHAR(50),
 IN season_id int,
 IN category_id INT,
 OUT out_param VARCHAR(10))
BEGIN
	
	DECLARE LID int;
	DECLARE shape_start VARCHAR(100);
	DECLARE foot_start VARCHAR(100);
	DECLARE fabric_start VARCHAR(100);
	declare opt_code varchar(100);
	DECLARE done INT;
	Declare opt_flag int;
	DEclare rec_count int default 0;
	DECLARE ids INT;
	declare angle_set int;
	Declare mat_id int;
	DECLARE rangeval VARCHAR(255);
	Declare swatch_item varchar(100);
	Declare sts varchar(25);
	DECLARE seasonval VARCHAR(255);
	DECLARE seasonvals VARCHAR(255);
	DECLARE categoryval VARCHAR(255);
	DECLARE categoryvals VARCHAR(255);
	DECLARE phaseval VARCHAR(255);
	DECLARE volnewness INT;
	DECLARE volexis INT;
	DECLARE totalvol INT;
	declare season_val varchar(100);
	Declare count1 int;
	DECLARE count2 INT;
	Declare wrap int;
	Declare db_range_id varchar(100);
	Declare opt_state int;
	declare bd_detail varchar(500);
	declare detail_code_count int;
	declare temp_msg varchar(500);
	declare detail_code varchar(500);
	declare model_id varchar(500);
	declare foot_shape_code varchar(500);
	declare foot_shape_code_count int;
	DECLARE ft_type VARCHAR(500);
	declare wrap_detail varchar(500);
	DECLARE temp_wrap VARCHAR(500);
	DECLARE wrap_code VARCHAR(500);
	declare stdwrap int;
	declare altwrap1 int; 
	DECLARE altwrap2 INT; 
	DECLARE altwrap3 INT; 
	declare i int;
	declare model_count int;
	declare model_matched_status int;
	declare r_id int;
	declare done1 int default 0;
	declare looprange int;
	declare tot_count int;
	declare state_name varchar(500);
	declare optid varchar(11);
	
	DECLARE cur2 CURSOR FOR SELECT range_id FROM next_main_matched_entry WHERE phase_id=pid GROUP BY range_id;
	
	DECLARE cur1 CURSOR FOR
		SELECT id,shape_start_phase,foot_start_phase,fabric_start_phase,sofa_range,swatch_item_number,six_two_six,option_code,bed_detail,foot_type FROM next_main_upload_temp WHERE phaseid = pid;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done =1;
		
	SET done =0;
	
	INSERT INTO proced_status(pro_phase,season_id,running_status,start_time) VALUES(pid,season_id,'started',NOW());
	SET LID = LAST_INSERT_ID();
	SELECT DataName INTO season_val FROM next_master_data_detail WHERE id=season_id;	
	
	OPEN cur1;
		igmLoop: LOOP	
		
			FETCH cur1 INTO ids,shape_start,foot_start,fabric_start,rangeval,swatch_item,sts,opt_code,bd_detail,ft_type;
			IF done =1 THEN LEAVE igmLoop; END IF;
			
			#UPDATE next_main_upload_temp SET temp=concat(shape_start,'__',season_val) WHERE id=ids;
			
			IF shape_start = season_val THEN
				update next_main_upload_temp set start_match_status=1,match_field=1 where id=ids;
			ELSEif foot_start = season_val then
				UPDATE next_main_upload_temp SET start_match_status=1,match_field=2 WHERE id=ids;
			ELSEIF fabric_start = season_val THEN
				UPDATE next_main_upload_temp SET start_match_status=1,match_field=3 WHERE id=ids;
			#else
				#next loop
				#ITERATE igmLoop;
				
			end if;
			
			SET opt_flag = 0;
			set rec_count =0;
			#find material type
			select count(id) into count1 from next_texture_lookup_table WHERE Texture_Item_No=swatch_item and Season=season_id and Category=category_id;
			if count1=0 then
				SET temp_msg =  "Item Number not found in the Texture1 lookup";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			end if;
			SELECT MaterialType,StdWrapCode,AltWrapCode1,AltWrapCode2,AltWrapCode3 into mat_id,stdwrap,altwrap1,altwrap2,altwrap3 FROM next_texture_lookup_table WHERE Texture_Item_No=swatch_item AND Season=season_id AND Category=category_id;
			#find angle set
			SELECT count(id) INTO count2 FROM next_range_lookup_table WHERE Range_desc=rangeval AND Category=category_id;
			if count2=0 then
				SET temp_msg =  "Range not found in the Range lookup";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			end if;
			select id,range_id,Angle_set_Option INTO r_id,db_range_id,angle_set from next_range_lookup_table where Range_desc=rangeval AND Category=category_id limit 1;
			SELECT count(id) INTO rec_count FROM next_option_lookup_table WHERE MaterialType=mat_id AND Option_Code=opt_code and AngleSet=angle_set and Category=category_id;
			if rec_count = 0 then
				SET temp_msg =  "Option code not found in the Option lookup";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			end if;
			set opt_flag = 1;
			SELECT count(dataname) INTO detail_code_count FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = bd_detail AND b.HeaderName = 'Detail Code';
			if detail_code_count=0 then
				SET temp_msg =  "Detail code not found in the lookup";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			end if;
			SELECT count(dataname) INTO foot_shape_code_count FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = ft_type AND b.HeaderName = 'Foot Shape LUT';
			IF foot_shape_code_count=0 THEN
				SET temp_msg =  "Foot type not found in the lookup";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			END IF;
			SELECT dataname INTO detail_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = bd_detail AND b.HeaderName = 'Detail Code';
			SELECT dataname INTO foot_shape_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = ft_type AND b.HeaderName = 'Foot Shape LUT';
			#loop start
			SET i=0;
			WHILE i<rec_count DO 
				#generate model							
				SELECT id,State,WrapCode_Option INTO optid,opt_state,wrap FROM next_option_lookup_table WHERE MaterialType=mat_id AND Option_Code=opt_code AND AngleSet=angle_set AND Category=category_id limit i,1;
				SELECT dataname INTO wrap_detail FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = wrap AND b.HeaderName = 'Wrapcode Option';
				SELECT dataname INTO state_name FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = opt_state AND b.HeaderName = 'State LUT';
							
				if wrap_detail ="STANDARD" then
					set temp_wrap = stdwrap;
				elseif wrap_detail ="Alt Wrap 1" THEN
					SET temp_wrap = altwrap1;
				ELSEIF wrap_detail ="Alt Wrap 2" THEN
					SET temp_wrap = altwrap2;
				ELSEIF wrap_detail ="Alt Wrap 3" THEN
					SET temp_wrap = altwrap3;								
				end if;
				SELECT dataname INTO wrap_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = temp_wrap AND b.HeaderName = 'Wrapcode LUT';				
				set model_id = concat(db_range_id,"_",opt_code,"_",state_name,"_",detail_code,"_",foot_shape_code,"_",wrap_code);
				UPDATE next_main_upload_temp SET model=model_id WHERE id=ids;
				select count(model_id) into model_count from model_lookup where model_name=model_id AND mod_category=category_id;
				set model_matched_status = 0;
				if model_count>0 then
					set model_matched_status=1;
				end if;
				INSERT INTO next_main_matched_entry (temp_id, phase_id, source_model,matched_status,range_id,state_code,option_id) VALUES (ids, pid, model_id,model_matched_status,r_id,opt_state,optid);
				SET i = i + 1;
				#loop end
			END WHILE;
			UPDATE next_main_upload_temp SET option_no_of_rows=rec_count, option_match_status=opt_flag  WHERE id=ids;
		END LOOP igmLoop;
	CLOSE cur1;
	
	SET done =0;
	#loop start
	OPEN cur2;
	read_loop: LOOP
		FETCH cur2 INTO looprange;
		IF done THEN
			LEAVE read_loop;
		END IF;
		SELECT COUNT(tid) INTO volnewness FROM next_main_matched_entry WHERE phase_id = pid and matched_status=0 and range_id=looprange;
		SELECT COUNT(tid) INTO volexis FROM next_main_matched_entry WHERE phase_id = pid AND matched_status=1 and batchid IS NULL AND range_id=looprange;
		SELECT COUNT(tid) INTO tot_count FROM next_main_matched_entry WHERE phase_id = pid AND batchid IS NULL AND range_id=looprange;
		SELECT DISTINCT seasonId,categoryiD INTO seasonval,categoryval 
		FROM next_main_phase_table WHERE PhaseId = pid;
		
		SELECT dataname INTO  seasonvals 
		FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND a.id = seasonval
		AND b.HeaderName = 'Season';
		
		SELECT dataname INTO  categoryvals
		FROM next_master_data_detail a,
		next_master_header_detail b 
		WHERE a.headerid = b.id
		AND a.id = categoryval
		AND b.HeaderName = 'Category';
		
		SET totalvol = volexis + volnewness;
		SET phaseval = CONCAT(seasonvals,' ',categoryvals);
		
		if volexis = tot_count then
			INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,completed,PhaseId,Status) VALUES (phaseval,looprange,totalvol,'0',pid,1);		
		else
			INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,completed,PhaseId, status) VALUES (phaseval,looprange,totalvol,'0',pid,2);		
		end if;
	END LOOP;
	CLOSE cur2;
	#loop end
	update proced_status set running_status='completed', end_time=now() where status_id=LID;
	set out_param = "success";	
    END */$$
DELIMITER ;

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
	SET transids = CONCAT('ID', transid);
	end if;
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insertrange` */

/*!50003 DROP PROCEDURE IF EXISTS  `insertrange` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insertrange`(
 IN pid VARCHAR(50),
 OUT out_param VARCHAR(10))
BEGIN
	
	DECLARE LID INT;
	DECLARE shape_start VARCHAR(100);
	DECLARE foot_start VARCHAR(100);
	DECLARE fabric_start VARCHAR(100);
	DECLARE opt_code VARCHAR(100);
	DECLARE done INT;
	DECLARE opt_flag INT;
	DECLARE rec_count1 INT;
	DECLARE ids INT;
	DECLARE angle_set INT;
	DECLARE mat_id INT;
	DECLARE swatch_item VARCHAR(100);
	DECLARE sts VARCHAR(25);
	DECLARE seasonval VARCHAR(255);
	DECLARE seasonvals VARCHAR(255);
	DECLARE categoryval VARCHAR(255);
	DECLARE categoryvals VARCHAR(255);
	DECLARE phaseval1 VARCHAR(255);
	DECLARE volnewness INT;
	DECLARE volexis INT;
	DECLARE totalvol INT;
	DECLARE season_val VARCHAR(100);
	DECLARE count1 INT;
	DECLARE count2 INT;
	DECLARE wrap INT;
	DECLARE db_range_id VARCHAR(100);
	DECLARE opt_state INT;
	DECLARE bd_detail VARCHAR(500);
	DECLARE detail_code_count INT;
	DECLARE temp_msg VARCHAR(500);
	DECLARE detail_code VARCHAR(500);
	DECLARE model_id VARCHAR(500);
	DECLARE foot_shape_code VARCHAR(500);
	DECLARE foot_shape_code_count INT;
	DECLARE ft_type VARCHAR(500);
	DECLARE wrap_detail VARCHAR(500);
	DECLARE temp_wrap VARCHAR(500);
	DECLARE wrap_code VARCHAR(500);
	DECLARE stdwrap INT;
	DECLARE altwrap1 INT; 
	DECLARE altwrap2 INT; 
	DECLARE altwrap3 INT; 
	DECLARE i INT;
	DECLARE model_count INT;
	DECLARE model_matched_status INT;
	DECLARE r_id INT;
	DECLARE done1 INT DEFAULT 0;
	DECLARE looprange INT;
	DECLARE tot_count INT;
	DECLARE state_name VARCHAR(500);
	declare render_count varchar(100);
	
	DECLARE cur2 CURSOR FOR SELECT range_id FROM next_main_matched_entry WHERE phase_id=pid and matched_status=1 GROUP BY range_id;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done =1;
		
	SET done =0;
	
	#INSERT INTO proced_status(pro_phase,season_id,running_status,start_time) VALUES(pid,season_id,'started',NOW());
	#SET LID = LAST_INSERT_ID();
	
	#loop start
	OPEN cur2;
	read_loop: LOOP
		FETCH cur2 INTO looprange;
		IF done THEN
			LEAVE read_loop;
		END IF;
		
		SELECT COUNT(tid) INTO volnewness FROM next_main_matched_entry WHERE phase_id = pid AND matched_status=0 AND range_id=looprange;
		SELECT COUNT(tid) INTO render_count FROM next_main_matched_entry WHERE phase_id = pid AND matched_status=1 AND batchid IS NULL AND model_status=1 and fabric_status=1 and feet_color_status=1 and range_id=looprange;
		SELECT COUNT(tid) INTO volexis  FROM next_main_matched_entry WHERE phase_id = pid AND matched_status=1 AND batchid IS NULL and range_id=looprange;
		SELECT COUNT(tid) INTO tot_count FROM next_main_matched_entry WHERE phase_id = pid AND batchid IS NULL AND range_id=looprange;
		SELECT DISTINCT seasonId,categoryiD INTO seasonval,categoryval 
		FROM next_main_phase_table WHERE PhaseId = pid;
		
		SELECT dataname INTO  seasonvals 
		FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND a.id = seasonval
		AND b.HeaderName = 'Season';
		
		SELECT dataname INTO  categoryvals
		FROM next_master_data_detail a,
		next_master_header_detail b 
		WHERE a.headerid = b.id
		AND a.id = categoryval
		AND b.HeaderName = 'Category';
		
		SET totalvol = volexis + volnewness;
		SET phaseval1 = CONCAT(seasonvals,' ',categoryvals);
		select count(id) into rec_count1 from next_range_overview_table where PhaseId=pid and Rangeval=looprange and range_status in(1,2,21);
				
		IF rec_count1=0 THEN
			INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,completed,PhaseId, range_status, ready_to_render_count) VALUES (phaseval1,looprange,volexis,'0',pid,2, render_count);		
		else
			update next_range_overview_table set RenderVol=volexis,ready_to_render_count=render_count where PhaseId=pid AND Rangeval=looprange;
		END IF;
	END LOOP read_loop;
	CLOSE cur2;
	#loop end
	#UPDATE proced_status SET running_status='completed', end_time=NOW() WHERE status_id=LID;
	SET out_param = "success";	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `testbrief` */

/*!50003 DROP PROCEDURE IF EXISTS  `testbrief` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `testbrief`(
 IN pid VARCHAR(50),
 IN season_id INT,
 IN category_id INT,
 OUT out_param VARCHAR(10))
BEGIN
	
	DECLARE LID INT;
	DECLARE shape_start VARCHAR(100);
	DECLARE foot_start VARCHAR(100);
	DECLARE fabric_start VARCHAR(100);
	DECLARE opt_code VARCHAR(100);
	DECLARE done INT;
	DECLARE opt_flag INT;
	DECLARE rec_count INT DEFAULT 0;
	DECLARE ids INT;
	DECLARE angle_set INT;
	DECLARE mat_id INT;
	DECLARE rangeval VARCHAR(255);
	DECLARE swatch_item VARCHAR(100);
	DECLARE sts VARCHAR(25);
	DECLARE seasonval VARCHAR(255);
	DECLARE seasonvals VARCHAR(255);
	DECLARE categoryval VARCHAR(255);
	DECLARE categoryvals VARCHAR(255);
	DECLARE phaseval VARCHAR(255);
	DECLARE volnewness INT;
	DECLARE volexis INT;
	DECLARE totalvol INT;
	DECLARE season_val VARCHAR(100);
	DECLARE count1 INT;
	DECLARE count2 INT;
	DECLARE wrap INT;
	DECLARE db_range_id VARCHAR(100);
	DECLARE opt_state INT;
	DECLARE bd_detail VARCHAR(500);
	DECLARE detail_code_count INT;
	DECLARE temp_msg VARCHAR(500);
	DECLARE detail_code VARCHAR(500);
	DECLARE model_id VARCHAR(500);
	DECLARE foot_shape_code VARCHAR(500);
	DECLARE foot_shape_code_count INT;
	DECLARE ft_type VARCHAR(500);
	DECLARE wrap_detail VARCHAR(500);
	DECLARE temp_wrap VARCHAR(500);
	DECLARE wrap_code VARCHAR(500);
	DECLARE stdwrap INT;
	DECLARE altwrap1 INT; 
	DECLARE altwrap2 INT; 
	DECLARE altwrap3 INT; 
	DECLARE i INT;
	DECLARE model_count INT;
	DECLARE model_matched_status INT;
	DECLARE r_id INT;
	DECLARE done1 INT DEFAULT 0;
	DECLARE looprange INT;
	DECLARE tot_count INT;
	DECLARE state_name VARCHAR(500);
	declare error_count varchar(5);
	declare foot_color_count int;
	declare ft_color varchar(500);
	declare error_flag int;
	declare wrap_code_count int;
	declare model_error_flag int;
	DECLARE optid VARCHAR(11);
	declare size_desc varchar(300);
	declare opt_sgkid varchar(10);
	declare text1 int;
	DECLARE text2 INT;
	declare model_dup_count int;
	declare text1status int;
	declare text2status int;
	declare modelstatus int;
	declare dbtextstatus int;
	declare dbmodelstatus int;
	declare updtext1status int default 0;
	declare updtext2status int default 0;	
	DECLARE updmodelstatus INT DEFAULT 0;		
	#DECLARE cur2 CURSOR FOR SELECT range_id FROM next_main_matched_entry WHERE phase_id=pid GROUP BY range_id;
	
	DECLARE cur1 CURSOR FOR
		SELECT id,shape_start_phase,foot_start_phase,fabric_start_phase,sofa_range,swatch_item_number,six_two_six,option_code,bed_detail,foot_type,foot_colour,size_descrption FROM next_main_upload_temp WHERE phaseid = pid and need_to_run=1;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done =1;
		
	SET done =0;
	
	INSERT INTO proced_status(pro_phase,season_id,running_status,start_time) VALUES(pid,season_id,'started',NOW());
	SET LID = LAST_INSERT_ID();
	SELECT DataName INTO season_val FROM next_master_data_detail WHERE id=season_id;
	SELECT a.id INTO dbmodelstatus FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = 'Approved' AND b.HeaderName ='Model Status';
	SELECT a.id INTO dbtextstatus FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = 'Fully Approved' AND b.HeaderName ='Fabric Status';
	
	OPEN cur1;
		igmLoop: LOOP	
		
			FETCH cur1 INTO ids,shape_start,foot_start,fabric_start,rangeval,swatch_item,sts,opt_code,bd_detail,ft_type,ft_color,size_desc;
			IF done =1 THEN LEAVE igmLoop; END IF;
			
			#UPDATE next_main_upload_temp SET temp=concat(shape_start,'__',season_val) WHERE id=ids;
			
			IF shape_start = season_val THEN
				UPDATE next_main_upload_temp SET start_match_status=1,match_field=1 WHERE id=ids;
			ELSEIF foot_start = season_val THEN
				UPDATE next_main_upload_temp SET start_match_status=1,match_field=2 WHERE id=ids;
			ELSEIF fabric_start = season_val THEN
				UPDATE next_main_upload_temp SET start_match_status=1,match_field=3 WHERE id=ids;
			else
				#next loop
				SET temp_msg =  "Selected Season not matched in either shape_start_phase, foot_start_phase, fabric_start_phase";
				UPDATE next_main_upload_temp SET temp=temp_msg WHERE id=ids;
				ITERATE igmLoop;
			END IF;
			
			SET opt_flag = 0;
			SET rec_count =0;
			set error_count=0;
			set temp_msg = "";
			set error_flag=0;
			#find material type
			SELECT COUNT(id) INTO count1 FROM next_texture_lookup_table WHERE Texture_Item_No=swatch_item AND Season=season_id AND Category=category_id;
			IF count1=0 THEN
				SET temp_msg = concat(temp_msg,"Item Number not found in the Texture1 lookup");
				set error_count = error_count + 1;
				set error_flag=1;
				UPDATE next_main_upload_temp SET item_number_error=1 WHERE id=ids;
			END IF;
			#find angle set
			SELECT COUNT(id) INTO count2 FROM next_range_lookup_table WHERE Range_desc=rangeval AND Category=category_id;
			IF count2=0 THEN
				SET temp_msg = CONCAT(temp_msg,", Range not found in the Range lookup");
				SET error_count = error_count + 1;
				SET error_flag=1;
				UPDATE next_main_upload_temp SET range_error=1 WHERE id=ids;
			END IF;
			SELECT COUNT(dataname) INTO detail_code_count FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = bd_detail AND b.HeaderName = 'Detail Code';
			IF detail_code_count=0 THEN
				SET temp_msg = CONCAT(temp_msg,", Detail code not found in the lookup");
				SET error_count = error_count + 1;
				SET error_flag=1;
				UPDATE next_main_upload_temp SET detail_code_error=1 WHERE id=ids;
			END IF;
			SELECT COUNT(dataname) INTO foot_shape_code_count FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = ft_type AND b.HeaderName = 'Foot Shape LUT';
			IF foot_shape_code_count=0 THEN
				SET temp_msg = CONCAT(temp_msg,", Foot type not found in the lookup");
				SET error_count = error_count + 1;
				SET error_flag=1;
				UPDATE next_main_upload_temp SET foot_type_error=1 WHERE id=ids;
			END IF;
			SELECT COUNT(id) into foot_color_count FROM next_texturesec_lookup_table WHERE Texture_Color=ft_color AND Season=season_id AND Category=category_id;
			IF foot_color_count=0 THEN
				SET temp_msg = CONCAT(temp_msg,", Foot colour not found in the Texture2 lookup");
				SET error_count = error_count + 1;
				UPDATE next_main_upload_temp SET foot_color_error=1 WHERE id=ids;
				set error_flag=1;
			END IF;
			
			if error_flag=1 then
				UPDATE next_main_upload_temp SET temp=temp_msg,total_error_count=error_count,need_to_run=0 WHERE id=ids;
				ITERATE igmLoop;
			end if;
			
			SELECT id,MaterialType,StdWrapCode,AltWrapCode1,AltWrapCode2,AltWrapCode3,Status INTO text1,mat_id,stdwrap,altwrap1,altwrap2,altwrap3,text1status FROM next_texture_lookup_table WHERE Texture_Item_No=swatch_item AND Season=season_id AND Category=category_id;
			SELECT id,Status INTO text2,text2status FROM next_texturesec_lookup_table WHERE Texture_Color=ft_color AND Season=season_id AND Category=category_id;
			SET updtext1status=0;
			IF text1status=dbtextstatus THEN
				SET updtext1status=1;
			END IF;
			SET updtext2status=0;
			IF text2status=dbtextstatus THEN
				SET updtext2status=1;
			END IF;
			SELECT id,range_id,Angle_set_Option INTO r_id,db_range_id,angle_set FROM next_range_lookup_table WHERE Range_desc=rangeval AND Category=category_id LIMIT 1;			
			
			SELECT COUNT(id) INTO rec_count FROM next_option_lookup_table WHERE Description = size_desc and AngleSet=angle_set AND Category=category_id;
			IF rec_count = 0 THEN
				SET temp_msg = CONCAT(temp_msg,", Option code not found in the Option lookup");
				SET error_count = error_count + 1;
				UPDATE next_main_upload_temp SET temp=temp_msg,option_code_error=1,angle_set=angle_set, total_error_count = error_count,need_to_run=0 WHERE id=ids;
				ITERATE igmLoop;
			END IF;
			SET opt_flag = 1;
			
			SELECT dataname INTO detail_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = bd_detail AND b.HeaderName = 'Detail Code';
			SELECT dataname INTO foot_shape_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = ft_type AND b.HeaderName = 'Foot Shape LUT';
			#loop start
			SET i=0;
			SET model_error_flag=0;
			WHILE i<rec_count DO 
				#generate model							
				SELECT id,State,WrapCode_Option,option_sgkid INTO optid,opt_state,wrap,opt_sgkid FROM next_option_lookup_table WHERE Description = size_desc AND AngleSet=angle_set AND Category=category_id LIMIT i,1;
				SELECT dataname INTO wrap_detail FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = wrap AND b.HeaderName = 'Wrapcode Option';
				SELECT dataname INTO state_name FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = opt_state AND b.HeaderName = 'State LUT';
							
				IF wrap_detail ="STANDARD" THEN
					SET temp_wrap = stdwrap;
				ELSEIF wrap_detail ="Alt Wrap 1" THEN
					SET temp_wrap = altwrap1;
				ELSEIF wrap_detail ="Alt Wrap 2" THEN
					SET temp_wrap = altwrap2;
				ELSEIF wrap_detail ="Alt Wrap 3" THEN
					SET temp_wrap = altwrap3;								
				END IF;
				SELECT dataname INTO wrap_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.id = temp_wrap AND b.HeaderName = 'Wrapcode LUT';
				
				SET model_id = CONCAT(db_range_id,"_",opt_sgkid,"_",state_name,"_",detail_code,"_",foot_shape_code,"_",wrap_code);
				UPDATE next_main_upload_temp SET model=model_id WHERE id=ids;
				SELECT COUNT(model_id) INTO model_count FROM model_lookup WHERE model_name=model_id AND mod_category=category_id;
				
				SELECT COUNT(source_model) INTO model_dup_count FROM next_main_matched_entry WHERE source_model=model_id AND temp_id=ids;
				SET model_matched_status = 0;
				SET updmodelstatus=0;
				
					IF model_count>0 THEN
						SET model_matched_status=1;
						SELECT mod_status INTO modelstatus FROM model_lookup WHERE model_name=model_id AND mod_category=category_id;
						IF modelstatus=dbmodelstatus THEN
							SET updmodelstatus=1;
						END IF;
						IF model_dup_count=0 THEN
							INSERT INTO next_main_matched_entry (temp_id, phase_id, source_model,matched_status,range_id,state_code,option_id,texture1id,texture2id,model_status,fabric_status,feet_color_status) VALUES (ids, pid, model_id,model_matched_status,r_id,opt_state,optid,text1,text2,updmodelstatus,updtext1status,updtext2status);
						else
							update next_main_matched_entry set model_status=updmodelstatus, fabric_status=updtext1status,feet_color_status=updtext2status where source_model=model_id AND temp_id=ids;
						end if;
					else
						SET error_count = error_count + 1;
						set model_error_flag=1;
						IF model_dup_count=0 THEN
							INSERT INTO next_main_matched_entry (temp_id, phase_id, source_model,matched_status,range_id,state_code,temp,option_id,texture1id,texture2id,model_status,fabric_status,feet_color_status) VALUES (ids, pid, model_id,model_matched_status,r_id,opt_state,"Model not found in the Model lookup",optid,text1, text2,updmodelstatus,updtext1status,updtext2status);
						ELSE
							UPDATE next_main_matched_entry SET model_status=updmodelstatus, fabric_status=updtext1status,feet_color_status=updtext2status WHERE source_model=model_id AND temp_id=ids;
						END IF;
					END IF;
				
				SET i = i + 1;
				#loop end
			END WHILE;
			UPDATE next_main_upload_temp SET option_no_of_rows=rec_count, option_match_status=opt_flag, model_error=model_error_flag,temp=temp_msg,total_error_count=error_count,need_to_run=0  WHERE id=ids;
		END LOOP igmLoop;
	CLOSE cur1;
	
	#loop end
	UPDATE proced_status SET running_status='completed', end_time=NOW() WHERE status_id=LID;
	SET out_param = "success";	
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
