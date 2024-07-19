/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.11-MariaDB : Database - onlinetoyshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlinetoyshop` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `onlinetoyshop`;

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `product` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `status` enum('pending','approved','reject') COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`order_id`,`user_id`,`name`,`quantity`,`product`,`price`,`status`,`product_image`,`address`,`contact`) values (60,3,'About life ',6,'Truck Toy','2000','pending','istockphoto-1465157700-1024x1024.jpg','gumabad maira mingora ','9876543'),(61,3,'mahran salim',99,'laughing cat','2000','approved','cat-551554_1280.jpg','mingora swat','12345678'),(62,5,'wonder book',5,'tape ball','100','pending','tennis-1381230_1280.jpg','namalom','876567'),(63,5,'demo',2,'figet spinner','600','pending','istockphoto-1208231710-1024x1024.jpg','swat','965876');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity_available` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product_name`,`product_details`,`price`,`quantity_available`,`category`,`product_image`) values (6,'Truck Toy','der khkole product','2000',22,'cars ','istockphoto-1465157700-1024x1024.jpg'),(7,'tape ball','cricket ball','100',50,'ball','tennis-1381230_1280.jpg'),(8,'laughing cat','der khkole product','2000',70,'pet','cat-551554_1280.jpg'),(9,'figet spinner','robo spinner','600',22,'wiggle wiggle','istockphoto-1208231710-1024x1024.jpg');

/*Table structure for table `signup` */

DROP TABLE IF EXISTS `signup`;

CREATE TABLE `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` decimal(20,0) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('admin','customer') COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `signup` */

insert  into `signup`(`id`,`username`,`contact`,`address`,`email`,`password`,`role`,`profile_image`,`dateofbirth`) values (3,'Customer boy','93834682736','mingora','Customer@gmail.com','1212','customer','pexels-ivan-siarbolin-3695799.jpg','1997-09-05'),(4,'Khan','9283249739','swat','khan1@gmail.com','1122','admin','pexels-vlad-alexandru-popa-1402787.jpg','2004-02-01'),(5,'khan','384692378','lapata','zamasite2@gmail.com','1122','customer','pexels-photo-1148998.jpeg','2003-01-14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
