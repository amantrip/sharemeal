# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.37-0ubuntu0.14.04.1)
# Database: shareameal
# Generation Time: 2014-11-12 05:03:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_11_08_002803_create_users_table',1),
	('2014_11_08_073610_create_scheduler_table',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scheduler
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scheduler`;

CREATE TABLE `scheduler` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `raddress` varchar(1024) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `scheduler` WRITE;
/*!40000 ALTER TABLE `scheduler` DISABLE KEYS */;

INSERT INTO `scheduler` (`id`, `uid`, `rid`, `rname`, `raddress`, `rurl`, `created_at`, `updated_at`, `remember_token`)
VALUES
	(3,4,'arco-cafe-manhattan','Arco Cafe','886 Amsterdam Ave','http://www.yelp.com/biz/arco-cafe-manhattan','2014-11-08 20:55:06','2014-11-08 20:55:06',NULL),
	(10,1,'bombay-grill-house-new-york','Bombay Grill House','764 9th Ave','http://www.yelp.com/biz/bombay-grill-house-new-york','2014-11-10 18:28:56','2014-11-10 18:28:56',NULL),
	(14,5,'table-d-hôte-new-york-2','Table d\'Hôte','44 E 92nd St','http://www.yelp.com/biz/table-d-h%C3%B4te-new-york-2','2014-11-10 23:53:28','2014-11-10 23:53:28',NULL),
	(15,5,'africa-kine-restaurant-new-york','Africa Kine Restaurant','256 W 116th St','http://www.yelp.com/biz/africa-kine-restaurant-new-york','2014-11-10 23:53:28','2014-11-10 23:53:28',NULL),
	(29,11,'brick-lane-curry-house-new-york-5','Brick Lane Curry House','1664 3rd Ave','http://www.yelp.com/biz/brick-lane-curry-house-new-york-5','2014-11-11 20:43:42','2014-11-11 20:43:42',NULL);

/*!40000 ALTER TABLE `scheduler` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `gender`, `created_at`, `updated_at`, `remember_token`)
VALUES
	(1,'a@gmail.com','$2y$10$r69tON85jeYpNEDh5P2BC.ZkNGpC.uB2MAW40z7nmoCp4lc.0q49K','male','2014-11-08 02:21:21','2014-11-08 06:32:55','1gFL1CLVCMZ8nsgfBSi0NCJ5nv3IMOYIdtzBPrWk8NS1xFSEndRzDY7dtIO0'),
	(4,'a2@gmail.com','$2y$10$TX9PcIhpRC9jvMvn/9AykOYevYgHUzXJwuGPJLXqqT/PDib6Pooqe','female','2014-11-08 07:19:10','2014-11-08 07:19:10',NULL),
	(5,'a3@gmail.com','$2y$10$fjy9/Anp8rXubNBaY.68oeS5G7Kc0yca45E5RKpgSHBn2Ed6RwqPu','male','2014-11-08 20:57:35','2014-11-08 20:57:35',NULL),
	(6,'abhyuday.polineni@gmail.com','$2y$10$FlJ7MPqcye5c0ifnwO95PecN97DF6cBWEs8W4dnbpgjGIWFEX.uOe','male','2014-11-08 21:31:24','2014-11-08 21:31:24',NULL),
	(7,'a5@gmail.com','$2y$10$z0v/0YIGP/m0ITwa6.Sgy.SWJ50UWyUBwEVzfSlL4Nv.Xx.o/C2Ma','male','2014-11-08 23:00:12','2014-11-08 23:00:12',NULL),
	(8,'a6@gmail.com','$2y$10$699omlFtmVeDgj2I2d5WFeeWzu9SbHUZAZa5vYiCoLJz9Ct7Jqize','female','2014-11-10 18:30:58','2014-11-10 18:30:58',NULL),
	(9,'akhimantripragada@gmail.com','$2y$10$ISjIdukoqf8Wa6ywl5y6cehzKQoNZ4sZUZJjkw/eiM3ZR/g3UXQ9G','male','2014-11-11 04:02:39','2014-11-11 04:02:39',NULL),
	(10,'akhimantrip@gmail.com','$2y$10$TBH24KcKpSk1pP9mevi26ezLjHUg.tEIezOzMC1DJ4.x8Tw.X1iKG','female','2014-11-11 04:03:32','2014-11-11 04:03:32',NULL),
	(11,'joe@gmail.com','$2y$10$sX584IC8P4MbEZzDW.yIXuzSjjS3oTk0VUPTmXGy0Kfqtjs.0Lj6y','male','2014-11-11 20:31:40','2014-11-11 20:31:40',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
