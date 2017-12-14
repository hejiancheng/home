/*
Navicat MySQL Data Transfer

Source Server         : conmysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hlt

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-04-18 13:27:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_id` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `content` longtext NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for `operation`
-- ----------------------------
DROP TABLE IF EXISTS `operation`;
CREATE TABLE `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sequence` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of operation
-- ----------------------------
INSERT INTO `operation` VALUES ('1', '权限账号管理', '0', '0', 'employee');
INSERT INTO `operation` VALUES ('4', '账号管理', '1', '0', 'Staff');
INSERT INTO `operation` VALUES ('5', '角色管理', '1', '1', 'Role');
INSERT INTO `operation` VALUES ('6', '模块管理', '1', '2', 'Operation');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('3', '系统管理员', '1');

-- ----------------------------
-- Table structure for `role_operation`
-- ----------------------------
DROP TABLE IF EXISTS `role_operation`;
CREATE TABLE `role_operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_operation
-- ----------------------------
INSERT INTO `role_operation` VALUES ('1', '3', '4');
INSERT INTO `role_operation` VALUES ('2', '3', '5');
INSERT INTO `role_operation` VALUES ('3', '3', '6');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_login_ip` varchar(45) DEFAULT NULL,
  `login_error_num` tinyint(1) NOT NULL DEFAULT '0',
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `signature` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('admin', '系统管理员', '21232f297a57a5a743894a0e4a801fc3', '3', '2017-04-18 13:25:01', '127.0.0.1', '0', '0', null);

-- ----------------------------
-- View structure for `staff_view`
-- ----------------------------
DROP VIEW IF EXISTS `staff_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staff_view` AS select `s1`.`id` AS `id`,`s1`.`name` AS `name`,`s1`.`role` AS `role`,`s1`.`lock` AS `lock`,`s2`.`name` AS `role_name` from (`staff` `s1` left join `role` `s2` on((`s1`.`role` = `s2`.`id`))) ;
DROP TRIGGER IF EXISTS `role_AFTER_DELETE`;
DELIMITER ;;
CREATE TRIGGER `role_AFTER_DELETE` AFTER DELETE ON `role` FOR EACH ROW BEGIN
delete from role_operation where role_operation.role_id=old.id;
END
;;
DELIMITER ;
