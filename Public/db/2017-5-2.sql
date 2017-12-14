/*
Navicat MySQL Data Transfer

Source Server         : conmysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hlt

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-05-02 17:55:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `position_province`
-- ----------------------------
DROP TABLE IF EXISTS `position_province`;
CREATE TABLE `position_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `province_name` char(32) NOT NULL COMMENT '省份名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='省份数据库';

-- ----------------------------
-- Records of position_province
-- ----------------------------
INSERT INTO `position_province` VALUES ('1', '北京市');
INSERT INTO `position_province` VALUES ('2', '天津市');
INSERT INTO `position_province` VALUES ('3', '河北省');
INSERT INTO `position_province` VALUES ('4', '山西省');
INSERT INTO `position_province` VALUES ('5', '内蒙古自治区');
INSERT INTO `position_province` VALUES ('6', '辽宁省');
INSERT INTO `position_province` VALUES ('7', '吉林省');
INSERT INTO `position_province` VALUES ('8', '黑龙江省');
INSERT INTO `position_province` VALUES ('9', '上海市');
INSERT INTO `position_province` VALUES ('10', '江苏省');
INSERT INTO `position_province` VALUES ('11', '浙江省');
INSERT INTO `position_province` VALUES ('12', '安徽省');
INSERT INTO `position_province` VALUES ('13', '福建省');
INSERT INTO `position_province` VALUES ('14', '江西省');
INSERT INTO `position_province` VALUES ('15', '山东省');
INSERT INTO `position_province` VALUES ('16', '河南省');
INSERT INTO `position_province` VALUES ('17', '湖北省');
INSERT INTO `position_province` VALUES ('18', '湖南省');
INSERT INTO `position_province` VALUES ('19', '广东省');
INSERT INTO `position_province` VALUES ('20', '广西壮族自治区');
INSERT INTO `position_province` VALUES ('21', '海南省');
INSERT INTO `position_province` VALUES ('22', '重庆市');
INSERT INTO `position_province` VALUES ('23', '四川省');
INSERT INTO `position_province` VALUES ('24', '贵州省');
INSERT INTO `position_province` VALUES ('25', '云南省');
INSERT INTO `position_province` VALUES ('26', '西藏自治区');
INSERT INTO `position_province` VALUES ('27', '陕西省');
INSERT INTO `position_province` VALUES ('28', '甘肃省');
INSERT INTO `position_province` VALUES ('29', '青海省');
INSERT INTO `position_province` VALUES ('30', '宁夏回族自治区');
INSERT INTO `position_province` VALUES ('31', '新疆维吾尔自治区');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `last_login_ip` varchar(45) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `e_mail` varchar(100) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('12', 'hjc', '5cfc912f305847c7a7e9f6b0736c3b22', '127.0.0.1', '2017-05-02 14:00:44', 'lt00000001', '577959941@qq.com', '2017-05-02 14:00:44');

-- ----------------------------
-- Table structure for `users_info`
-- ----------------------------
DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info` (
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `spell_name` varchar(50) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `both` date DEFAULT NULL,
  `education` tinyint(1) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `year` varchar(6) DEFAULT NULL,
  `month` varchar(5) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_info
-- ----------------------------
INSERT INTO `users_info` VALUES ('何建成', 'he', 'jiancheng', '3', '0', '1995-08-18', '2', '贵州大学', '软件工程', '2013', '7', '12');
DROP TRIGGER IF EXISTS `users_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `users_BEFORE_INSERT` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
declare n int;
select IFNULL(max(right(user_id,8)),0) into n from users ;
set NEW.user_id=concat("lt",right(100000001+n,8));
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `users_AFTER_INSERT`;
DELIMITER ;;
CREATE TRIGGER `users_AFTER_INSERT` AFTER INSERT ON `users` FOR EACH ROW BEGIN
declare n int;
select id into n from users where id=new.id;
INSERT INTO `users_info`(`user_id`) VALUES(n);
END
;;
DELIMITER ;
