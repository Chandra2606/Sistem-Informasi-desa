/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.20-MariaDB : Database - desaku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`desaku` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `desaku`;

/*Table structure for table `agama` */

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `id_agama` varchar(10) NOT NULL,
  `nama_agama` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agama` */

insert  into `agama`(`id_agama`,`nama_agama`,`status`) values 
('A1','Islam',1),
('A2','Kristen',1),
('A3','Katholik',1),
('A4','HIndu',1);

/*Table structure for table `dokumen` */

DROP TABLE IF EXISTS `dokumen`;

CREATE TABLE `dokumen` (
  `id_dokumen` varchar(30) NOT NULL,
  `nama_dokumen` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokumen` */

insert  into `dokumen`(`id_dokumen`,`nama_dokumen`,`status`) values 
('D1','E-KTP',1),
('D2','IJASAH',1);

/*Table structure for table `file` */

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id_dokumen` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `file` */

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id_akses` varchar(10) NOT NULL,
  `nama_akses` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id_akses`,`nama_akses`,`status`) values 
('akses01','admin',1),
('akses04','penduduk',1);

/*Table structure for table `hak_akses_user` */

DROP TABLE IF EXISTS `hak_akses_user`;

CREATE TABLE `hak_akses_user` (
  `nik` varchar(15) NOT NULL,
  `id_akses` varchar(10) NOT NULL,
  KEY `hak_akses_user` (`id_akses`),
  CONSTRAINT `hak_akses_user` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hak_akses_user` */

insert  into `hak_akses_user`(`nik`,`id_akses`) values 
('123451','akses04'),
('123451','akses01');

/*Table structure for table `kk` */

DROP TABLE IF EXISTS `kk`;

CREATE TABLE `kk` (
  `id_kk` varchar(10) DEFAULT NULL,
  `no_kk` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(30) DEFAULT NULL,
  `desa` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `kabupaten` varchar(30) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kepala_keluarga` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`no_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kk` */

/*Table structure for table `klasifikasi` */

DROP TABLE IF EXISTS `klasifikasi`;

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` varchar(10) NOT NULL DEFAULT '',
  `nama_klasifikasi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `klasifikasi` */

insert  into `klasifikasi`(`id_klasifikasi`,`nama_klasifikasi`,`status`) values 
('K1','Anak - Anak',1),
('K2','Remaja',1),
('K3','Dewasa',1),
('K4','Lansia',1);

/*Table structure for table `klasifikasi_dokumen` */

DROP TABLE IF EXISTS `klasifikasi_dokumen`;

CREATE TABLE `klasifikasi_dokumen` (
  `id_klasifikasi` varchar(5) NOT NULL,
  `id_dokumen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `klasifikasi_dokumen` */

insert  into `klasifikasi_dokumen`(`id_klasifikasi`,`id_dokumen`) values 
('K3','D1'),
('K3','D2'),
('K2','D2'),
('K4','D1'),
('K4','D2');

/*Table structure for table `online` */

DROP TABLE IF EXISTS `online`;

CREATE TABLE `online` (
  `id_online` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) NOT NULL,
  `waktu` varchar(25) NOT NULL,
  PRIMARY KEY (`id_online`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `online` */

/*Table structure for table `penduduk` */

DROP TABLE IF EXISTS `penduduk`;

CREATE TABLE `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `pekerjaan` text DEFAULT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `status_perkawinan` enum('KAWIN','BELUM KAWIN') NOT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_agama` varchar(30) DEFAULT NULL,
  `id_klasifikasi` varchar(20) NOT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `penduduk` (`id_agama`),
  CONSTRAINT `penduduk` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penduduk` */

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

/*Table structure for table `tb_anggota` */

DROP TABLE IF EXISTS `tb_anggota`;

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `tb_anggota_ibfk_1` (`id_pend`),
  KEY `id_kk` (`id_kk`),
  CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tb_anggota` */

/*Table structure for table `tb_anggota_rumah` */

DROP TABLE IF EXISTS `tb_anggota_rumah`;

CREATE TABLE `tb_anggota_rumah` (
  `id_anggota_rumah` int(11) NOT NULL AUTO_INCREMENT,
  `id_rumah` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `sebagai` varchar(1111) NOT NULL,
  PRIMARY KEY (`id_anggota_rumah`),
  KEY `id_rumah` (`id_rumah`),
  KEY `id_pend` (`id_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_anggota_rumah` */

/*Table structure for table `tb_datang` */

DROP TABLE IF EXISTS `tb_datang`;

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL,
  PRIMARY KEY (`id_datang`),
  KEY `pelapor` (`pelapor`),
  CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_datang` */

/*Table structure for table `tb_kk` */

DROP TABLE IF EXISTS `tb_kk`;

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kk` */

/*Table structure for table `tb_lahir` */

DROP TABLE IF EXISTS `tb_lahir`;

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL,
  PRIMARY KEY (`id_lahir`),
  KEY `id_kk` (`id_kk`),
  CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_lahir` */

/*Table structure for table `tb_mendu` */

DROP TABLE IF EXISTS `tb_mendu`;

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_mendu`),
  KEY `id_pdd` (`id_pdd`),
  CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mendu` */

/*Table structure for table `tb_pdd` */

DROP TABLE IF EXISTS `tb_pdd`;

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pendidikan` varchar(1111) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  PRIMARY KEY (`id_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pdd` */

/*Table structure for table `tb_pengguna` */

DROP TABLE IF EXISTS `tb_pengguna`;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id_pengguna`,`nama_pengguna`,`username`,`password`,`level`) values 
(1,'RAFI CHANDRA','admin','admin','Administrator'),
(4,'Rafi Chandra','chandra','12345','Administrator');

/*Table structure for table `tb_pindah` */

DROP TABLE IF EXISTS `tb_pindah`;

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_pdd` (`id_pdd`),
  CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pindah` */

/*Table structure for table `tb_rumah` */

DROP TABLE IF EXISTS `tb_rumah`;

CREATE TABLE `tb_rumah` (
  `id_rumah` int(11) NOT NULL AUTO_INCREMENT,
  `no_rumah` varchar(11111) NOT NULL,
  `jumlah_kk` int(11) NOT NULL,
  `jumlah_keluarga` int(11) NOT NULL,
  PRIMARY KEY (`id_rumah`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rumah` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
