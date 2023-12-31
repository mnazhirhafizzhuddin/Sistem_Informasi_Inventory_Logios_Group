/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.25-MariaDB : Database - inventori
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventori` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `inventori`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(50) DEFAULT NULL,
  `jenisbarang` varchar(30) DEFAULT NULL,
  `varian` varchar(30) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `stok` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=2125995089 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barang` */

insert  into `barang`(`idbarang`,`namabarang`,`jenisbarang`,`varian`,`satuan`,`harga`,`stok`) values 
(1158444492,'coba','untuk rapat kantor','meja kantor','kg','2000000','200'),
(1557256377,'meja','untuk rapat kantor','meja kantor','kg','2000000','5'),
(2125995088,'meja','untuk rapat kantor','meja kantor','kg','2000000','170');

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barangs` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `karyawan` */

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `nik` int(30) NOT NULL,
  `nama_lengkap` varchar(90) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `karyawan` */

insert  into `karyawan`(`nik`,`nama_lengkap`,`tanggallahir`,`jabatan`,`password`,`remember_token`) values 
(12345,'ucok','2023-09-20','manager','$2y$10$QvsZij3NUULcHcnQkIYBs.eAJL5LCE7xJQTq7mzTlejiMWDGhahiC',NULL);

/*Table structure for table `logbarangkeluar` */

DROP TABLE IF EXISTS `logbarangkeluar`;

CREATE TABLE `logbarangkeluar` (
  `idlog` int(45) NOT NULL AUTO_INCREMENT,
  `idbarang` varchar(255) DEFAULT NULL,
  `namabarang` varchar(255) DEFAULT NULL,
  `jumlahbarang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB AUTO_INCREMENT=1489077725 DEFAULT CHARSET=utf8mb4;

/*Data for the table `logbarangkeluar` */

insert  into `logbarangkeluar`(`idlog`,`idbarang`,`namabarang`,`jumlahbarang`) values 
(1,'1651216246','motor','45'),
(2,'1651216246','motor','25'),
(3,'1651216246','motor','10'),
(4,'2110594201','anes','25'),
(5,'2110594201','anes','25'),
(6,'2110594201','anes','15'),
(7,'1651216246','motor','10'),
(8,'2125995088','meja','200'),
(177227904,'2125995088','meja','7'),
(382339313,'2125995088','meja','5'),
(603884893,'2125995088','meja','10'),
(811619734,'2125995088','meja','5'),
(907743433,'2125995088','meja','5'),
(951875382,'2125995088','meja','5'),
(1489077724,'2125995088','meja','5');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(13,'2014_10_12_000000_create_users_table',1),
(14,'2014_10_12_100000_create_password_reset_tokens_table',1),
(15,'2014_10_12_100000_create_password_resets_table',1),
(16,'2019_08_19_000000_create_failed_jobs_table',1),
(17,'2019_12_14_000001_create_personal_access_tokens_table',1),
(18,'2023_08_09_130656_create_barangs_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`type`,`remember_token`,`created_at`,`updated_at`) values 
(1,'ucok','hehe@gmail.com',NULL,'$2y$10$QvsZij3NUULcHcnQkIYBs.eAJL5LCE7xJQTq7mzTlejiMWDGhahiC',0,NULL,'2023-08-30 14:46:44','2023-08-30 14:46:44'),
(2,'hehe','heheu@gmail.com',NULL,'$2y$10$Ox1T2XwivTKSdcKMPOy07ueRoa0huDRNV9ouBCdrujkELHIVKVfU6',0,NULL,'2023-08-30 15:14:14','2023-08-30 15:14:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
