/*
Navicat MySQL Data Transfer

Source Server         : lokalan
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : manajemen_pelanggan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2017-07-17 20:35:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'nanda', '859a37720c27b9f70e11b79bab9318fe', 'dhitta nanda', 'supervisor');
INSERT INTO `login` VALUES ('6', 'dista', 'e9a373cd018a839ba3f5b828d54e93b1', 'dista', 'superadmin');

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
  `id_pel` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_tiang` varchar(30) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `kode_baca` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pelanggan
-- ----------------------------
INSERT INTO `pelanggan` VALUES ('999', 'Malang', '231', '123', '234', 'Rbc1');
INSERT INTO `pelanggan` VALUES ('2147483647', 'Klaten', '23', '99888', '88998', 'T121');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pel` int(15) NOT NULL,
  `tgl` date NOT NULL,
  `stand_lalu` int(20) NOT NULL,
  `stand_kini` int(20) NOT NULL,
  `pemakaian` int(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('20', '1', '2017-01-12', '100', '200', '100', 'foto_170717140552.PNG', 'okee');
INSERT INTO `transaksi` VALUES ('21', '999', '2017-07-17', '7000', '14000', '7000', '', 'hahahaha');
