/*
Navicat MySQL Data Transfer

Source Server         : conmysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hlt

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-04-20 22:55:35
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('62', '4', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hcs;last_login_ip:127.0.0.1;last_login_time:2017-04-20 12:36:18;create_time:2017-04-20 12:36:18;”', '2017-04-20 12:36:18');
INSERT INTO `log` VALUES ('63', '5', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 12:39:36;create_time:2017-04-20 12:39:36;”', '2017-04-20 12:39:36');
INSERT INTO `log` VALUES ('64', '6', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 12:40:52;create_time:2017-04-20 12:40:52;”', '2017-04-20 12:40:52');
INSERT INTO `log` VALUES ('65', '7', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 12:41:47;create_time:2017-04-20 12:41:47;”', '2017-04-20 12:41:47');
INSERT INTO `log` VALUES ('66', '8', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 12:47:43;create_time:2017-04-20 12:47:43;”', '2017-04-20 12:47:43');
INSERT INTO `log` VALUES ('67', '9', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 13:06:56;create_time:2017-04-20 13:06:56;”', '2017-04-20 13:06:56');
INSERT INTO `log` VALUES ('68', '10', '2', '在users表增加一条记录，记录的信息为“password:5cfc912f305847c7a7e9f6b0736c3b22;e_mail:577959941@qq.com;name:hjc;last_login_ip:127.0.0.1;last_login_time:2017-04-20 13:08:40;create_time:2017-04-20 13:08:40;”', '2017-04-20 13:08:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('admin', '系统管理员', '21232f297a57a5a743894a0e4a801fc3', '3', '2017-04-18 20:38:47', '127.0.0.1', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'hjc', '5cfc912f305847c7a7e9f6b0736c3b22', '127.0.0.1', '2017-04-20 21:59:23', 'lt00000001', '577959941@qq.com', '2017-04-20 21:59:40');

-- ----------------------------
-- Table structure for `user_account`
-- ----------------------------
DROP TABLE IF EXISTS `user_account`;
CREATE TABLE `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` int(1) NOT NULL,
  `account` varchar(100) NOT NULL COMMENT '微信（1）、QQ（2）、微博（3）',
  `head_portrait` varchar(1000) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`,`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_account
-- ----------------------------

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
DROP TRIGGER IF EXISTS `users_BEFORE_INSERT`;
DELIMITER ;;
CREATE TRIGGER `users_BEFORE_INSERT` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
declare n int;
select IFNULL(max(right(user_id,8)),0) into n from users ;
set NEW.user_id=concat("lt",right(100000001+n,8));
END
;;
DELIMITER ;
