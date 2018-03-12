/*
 Navicat Premium Data Transfer

 Source Server         : rict
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : 127.0.0.1
 Source Database       : rictlastlast

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 01/18/2018 21:50:57 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `application_layer`
-- ----------------------------
DROP TABLE IF EXISTS `application_layer`;
CREATE TABLE `application_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `develop_language` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ภาษาที่ใช้พัฒนา',
  `app_database` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ฐานข้อมูล',
  `develop_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'บริษัทที่ทำการพัฒนา',
  `getting_start_years` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ปีที่เริ่มใช้งาน',
  `app_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ความสัมพันธ์กับแอพพลิเคชั่นอื่น',
  `remark` longtext COLLATE utf8_unicode_ci COMMENT 'ข้อสังเกต',
  `ma_cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ค่าซ่อมบำรุง',
  `department_id` int(11) DEFAULT NULL COMMENT 'หน่วยงานที่เกี่ยวข้อง',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_application_layer_department1_idx` (`department_id`),
  CONSTRAINT `fk_application_layer_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `application_other`
-- ----------------------------
DROP TABLE IF EXISTS `application_other`;
CREATE TABLE `application_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `application_relation`
-- ----------------------------
DROP TABLE IF EXISTS `application_relation`;
CREATE TABLE `application_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_layer_id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `frag` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_application_relation_application_layer1_idx` (`application_layer_id`),
  CONSTRAINT `fk_application_relation_application_layer1` FOREIGN KEY (`application_layer_id`) REFERENCES `application_layer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `brand`
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `brand_relation`
-- ----------------------------
DROP TABLE IF EXISTS `brand_relation`;
CREATE TABLE `brand_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `bus_depart`
-- ----------------------------
DROP TABLE IF EXISTS `bus_depart`;
CREATE TABLE `bus_depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bus` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_layer`
-- ----------------------------
DROP TABLE IF EXISTS `business_layer`;
CREATE TABLE `business_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อกระบวนการ',
  `type` int(11) DEFAULT NULL,
  `workflow_path` longtext COLLATE utf8_unicode_ci COMMENT 'ที่เก็บพาร์ทรูป Workflow',
  `remark` longtext COLLATE utf8_unicode_ci COMMENT 'ข้อสังเกตุ',
  `department_id` int(11) DEFAULT NULL COMMENT 'หน่วยงานที่เกี่ยวข้อง',
  `attr_id` int(11) DEFAULT NULL,
  `ids` int(11) DEFAULT NULL,
  `lv3_id` int(11) NOT NULL,
  `workflow_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_business_layer_department_idx` (`department_id`),
  CONSTRAINT `fk_business_layer_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_layer_lv1`
-- ----------------------------
DROP TABLE IF EXISTS `business_layer_lv1`;
CREATE TABLE `business_layer_lv1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `select_lv` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_layer_lv2`
-- ----------------------------
DROP TABLE IF EXISTS `business_layer_lv2`;
CREATE TABLE `business_layer_lv2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lv1_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_layer_lv3`
-- ----------------------------
DROP TABLE IF EXISTS `business_layer_lv3`;
CREATE TABLE `business_layer_lv3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lv2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_other`
-- ----------------------------
DROP TABLE IF EXISTS `business_other`;
CREATE TABLE `business_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `business_relation`
-- ----------------------------
DROP TABLE IF EXISTS `business_relation`;
CREATE TABLE `business_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_layer_id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `frag` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_business_relation_business_layer1_idx` (`business_layer_id`),
  CONSTRAINT `fk_business_relation_business_layer1` FOREIGN KEY (`business_layer_id`) REFERENCES `business_layer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1180 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `data_layer`
-- ----------------------------
DROP TABLE IF EXISTS `data_layer`;
CREATE TABLE `data_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ประเภทการเก็บข้อมูล',
  `remark` longtext COLLATE utf8_unicode_ci COMMENT 'ข้อเสนอแนะ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_dic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=681 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `data_other`
-- ----------------------------
DROP TABLE IF EXISTS `data_other`;
CREATE TABLE `data_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `data_relation`
-- ----------------------------
DROP TABLE IF EXISTS `data_relation`;
CREATE TABLE `data_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_layer_id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `frag` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_data_relation_data_layer1_idx` (`data_layer_id`),
  CONSTRAINT `fk_data_relation_data_layer1` FOREIGN KEY (`data_layer_id`) REFERENCES `data_layer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=683 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อข้อมูล',
  `remark` longtext COLLATE utf8_unicode_ci COMMENT 'ข้อสังเกต',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `department_relation`
-- ----------------------------
DROP TABLE IF EXISTS `department_relation`;
CREATE TABLE `department_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `develop_language`
-- ----------------------------
DROP TABLE IF EXISTS `develop_language`;
CREATE TABLE `develop_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `develop_language_relation`
-- ----------------------------
DROP TABLE IF EXISTS `develop_language_relation`;
CREATE TABLE `develop_language_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `develop_language_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `devlopment_group`
-- ----------------------------
DROP TABLE IF EXISTS `devlopment_group`;
CREATE TABLE `devlopment_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `devlopment_group_relation`
-- ----------------------------
DROP TABLE IF EXISTS `devlopment_group_relation`;
CREATE TABLE `devlopment_group_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `devlopment_group_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `initial`
-- ----------------------------
DROP TABLE IF EXISTS `initial`;
CREATE TABLE `initial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `initial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `initial`
-- ----------------------------
BEGIN;
INSERT INTO `initial` VALUES ('1', 'application', 'A'), ('2', 'data', 'D');
COMMIT;

-- ----------------------------
--  Table structure for `involved`
-- ----------------------------
DROP TABLE IF EXISTS `involved`;
CREATE TABLE `involved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `place`
-- ----------------------------
DROP TABLE IF EXISTS `place`;
CREATE TABLE `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `place_relation`
-- ----------------------------
DROP TABLE IF EXISTS `place_relation`;
CREATE TABLE `place_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `state`
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `technology_bulid`
-- ----------------------------
DROP TABLE IF EXISTS `technology_bulid`;
CREATE TABLE `technology_bulid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `technology_layer`
-- ----------------------------
DROP TABLE IF EXISTS `technology_layer`;
CREATE TABLE `technology_layer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ยี่ห้อ',
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รุ่น',
  `tech_spec` longtext COLLATE utf8_unicode_ci COMMENT 'สเปค',
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'จำนวน',
  `operating_system` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระบบปฏิบัติการ',
  `cpu_use` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ซีพียูที่ใช้',
  `memory_total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เมมโมรีที่มี',
  `memory_used` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เมมโมรีที่ใช้',
  `hardisk_total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หน่วยความจำที่มี',
  `hardisk_used` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หน่วยความจำที่ใช้',
  `utility_app` longtext COLLATE utf8_unicode_ci COMMENT 'แอพพลิเคชั่นที่มี',
  `tech_location` longtext COLLATE utf8_unicode_ci COMMENT 'สถานที่ตั้ง',
  `ma_cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ค่าซ่อมบำรุง',
  `remark` longtext COLLATE utf8_unicode_ci COMMENT 'ข้อเสนอแนะ',
  `owner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=269 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `technology_network`
-- ----------------------------
DROP TABLE IF EXISTS `technology_network`;
CREATE TABLE `technology_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `technology_other`
-- ----------------------------
DROP TABLE IF EXISTS `technology_other`;
CREATE TABLE `technology_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `technology_relation`
-- ----------------------------
DROP TABLE IF EXISTS `technology_relation`;
CREATE TABLE `technology_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_layer_id` int(11) NOT NULL,
  `comp_id` int(11) DEFAULT NULL,
  `frag` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_technology_relation_technology_layer1_idx` (`technology_layer_id`),
  CONSTRAINT `fk_technology_relation_technology_layer1` FOREIGN KEY (`technology_layer_id`) REFERENCES `technology_layer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `type_collection`
-- ----------------------------
DROP TABLE IF EXISTS `type_collection`;
CREATE TABLE `type_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `type_collection_relation`
-- ----------------------------
DROP TABLE IF EXISTS `type_collection_relation`;
CREATE TABLE `type_collection_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_collection_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `type_process`
-- ----------------------------
DROP TABLE IF EXISTS `type_process`;
CREATE TABLE `type_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `type_process_relation`
-- ----------------------------
DROP TABLE IF EXISTS `type_process_relation`;
CREATE TABLE `type_process_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_process_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `use_data`
-- ----------------------------
DROP TABLE IF EXISTS `use_data`;
CREATE TABLE `use_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `use_data_relation`
-- ----------------------------
DROP TABLE IF EXISTS `use_data_relation`;
CREATE TABLE `use_data_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_data_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `frag` varchar(1) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'Super Admin', 'admin@gmail.com', '$2y$10$ghdFYQrIEQ6MS1UIHFuI..rcxJVxb5BziTy5kyWh9Ks..', 'joovnXpb0NfXqGLOpLUXBspazJGdG7LaDV2oktm4RZLRuwLcWvAAPI5Z1vCF', null, null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
