/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.8-log : Database - dbonroadvehicle
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbonroadvehicle` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbonroadvehicle`;

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `workid` int(11) DEFAULT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

insert  into `feedback`(`fid`,`workid`,`feedback`,`date`) values 
(1,17,'Nice','2022-10-23'),
(2,18,'Affordable','2022-11-04');

/*Table structure for table `tbllogin` */

DROP TABLE IF EXISTS `tbllogin`;

CREATE TABLE `tbllogin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbllogin` */

insert  into `tbllogin`(`username`,`password`,`utype`,`status`) values 
('sharon@gmail.com','sharon@123','user','1'),
('ajmal@gmail.com','ajmal@123','user','1'),
('raju@gmail.com','raju@123','mechanic','1'),
('admin@gmail.com','admin','admin','1');

/*Table structure for table `tblmechanic` */

DROP TABLE IF EXISTS `tblmechanic`;

CREATE TABLE `tblmechanic` (
  `mName` varchar(50) NOT NULL,
  `mAddress` varchar(100) NOT NULL,
  `mContact` varchar(50) NOT NULL,
  `mDistrict` varchar(50) NOT NULL,
  `mEmail` varchar(50) NOT NULL,
  `mExp` int(11) NOT NULL,
  `mqual` varchar(20) DEFAULT NULL,
  `maadhaar` varchar(20) DEFAULT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  PRIMARY KEY (`mEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblmechanic` */

insert  into `tblmechanic`(`mName`,`mAddress`,`mContact`,`mDistrict`,`mEmail`,`mExp`,`mqual`,`maadhaar`,`lat`,`lon`) values 

('Manoj','kochi','9653210455','Ernakulam','manoj@gmail.com',2,NULL,NULL,'10.12653','76.33317');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `uName` varchar(50) NOT NULL,
  `uContact` varchar(50) NOT NULL,
  `uEmail` varchar(50) NOT NULL,
  PRIMARY KEY (`uEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbluser` */

insert  into `tbluser`(`uName`,`uContact`,`uEmail`) values 

('Sharon','9568401238','sharon@gmail.com');

/*Table structure for table `tblworkallocation` */

DROP TABLE IF EXISTS `tblworkallocation`;

CREATE TABLE `tblworkallocation` (
  `waId` int(11) NOT NULL AUTO_INCREMENT,
  `workId` int(11) NOT NULL,
  `wEmail` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`waId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tblworkallocation` */

insert  into `tblworkallocation`(`waId`,`workId`,`wEmail`,`status`) values 
(3,7,'ravi@gmail.com','completed');

/*Table structure for table `tblworkrequest` */

DROP TABLE IF EXISTS `tblworkrequest`;

CREATE TABLE `tblworkrequest` (
  `workId` int(11) NOT NULL AUTO_INCREMENT,
  `uEmail` varchar(50) NOT NULL,
  `wDesc` varchar(100) NOT NULL,
  `wAddress` varchar(100) NOT NULL,
  `wDistrict` varchar(50) NOT NULL,
  `tdate` date NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`workId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tblworkrequest` */

insert  into `tblworkrequest`(`workId`,`uEmail`,`wDesc`,`wAddress`,`wDistrict`,`tdate`,`lat`,`lon`,`status`) values 
(1,'akhil@mail.com','smoke','nill','Ernakulam','2022-11-21','10.1106662','76.3500229','accepted');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
