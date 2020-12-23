/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - johncrane
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`johncrane` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `johncrane`;

/*Table structure for table `rig_details2` */

DROP TABLE IF EXISTS `rig_details2`;

CREATE TABLE `rig_details2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Test_ID` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Seal_Size` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DE_Catridge` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NDE_Catridge` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Project_Number_Name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_GA` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Operator` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Onoff_Status` tinyint(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `rig_details2` */

insert  into `rig_details2`(`ID`,`Test_ID`,`Seal_Size`,`DE_Catridge`,`NDE_Catridge`,`Project_Number_Name`,`Description_GA`,`Operator`,`Onoff_Status`) values 
(8,'1','108333','de catridg','nde  catri','asdfasdfad','sdfasdf','fasdf',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
