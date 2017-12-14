/*
Navicat MySQL Data Transfer

Source Server         : conmysql
Source Server Version : 50713
Source Host           : localhost:3306
Source Database       : hlt

Target Server Type    : MYSQL
Target Server Version : 50713
File Encoding         : 65001

Date: 2017-04-27 23:20:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ad`
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(200) NOT NULL,
  `business` varchar(100) NOT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `creator` varchar(20) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad
-- ----------------------------
INSERT INTO `ad` VALUES ('9', '/Hlt/Public/Uploads/ad/2017-04-25/1493105808_966980140.jpg', '广告1', 'www.asd.com', 'admin', '2017-04-25 15:36:49');
INSERT INTO `ad` VALUES ('10', '/Hlt/Public/Uploads/ad/2017-04-25/1493105828_1188028357.jpg', '广告2', 'ww.asd', 'admin', '2017-04-25 15:37:09');
INSERT INTO `ad` VALUES ('11', '/Hlt/Public/Uploads/ad/2017-04-25/1493105849_1593747527.jpg', '广告3', 'wqwe', 'admin', '2017-04-25 15:37:31');
INSERT INTO `ad` VALUES ('12', '/Hlt/Public/Uploads/ad/2017-04-25/1493105863_1498443531.jpg', '广告4', 'asd', 'admin', '2017-04-25 15:37:44');
INSERT INTO `ad` VALUES ('13', '/Hlt/Public/Uploads/ad/2017-04-25/1493106699_851433059.jpg', 'qwe', 'qweqe', 'admin', '2017-04-25 15:51:41');
INSERT INTO `ad` VALUES ('14', '/Hlt/Public/Uploads/ad/2017-04-25/1493106722_1828299240.jpg', 'qew', 'qeq', 'admin', '2017-04-25 15:52:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8;

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
INSERT INTO `log` VALUES ('69', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-24 22:07:20');
INSERT INTO `log` VALUES ('70', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:题库录入管理;sequence:2;url:topic;parent_id:0;”', '2017-04-24 22:07:57');
INSERT INTO `log` VALUES ('71', 'admin', '4', '修改ID为“3”的角色，修改后的信息为“name:系统管理员;level:1;”', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('72', 'admin', '3', '在role_operation表中根据条件“role_id:3;”删除了部分记录', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('73', 'admin', '2', '增加信息为“role_id:3;operation_id:4;”的角色操作', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('74', 'admin', '2', '增加信息为“role_id:3;operation_id:5;”的角色操作', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('75', 'admin', '2', '增加信息为“role_id:3;operation_id:6;”的角色操作', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('76', 'admin', '2', '增加信息为“role_id:3;operation_id:7;”的角色操作', '2017-04-24 22:08:06');
INSERT INTO `log` VALUES ('77', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-24 22:08:23');
INSERT INTO `log` VALUES ('78', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:录入题库类别;sequence:1;url:TopicType;parent_id:7;”', '2017-04-24 22:09:32');
INSERT INTO `log` VALUES ('79', 'admin', '4', '修改ID为“3”的角色，修改后的信息为“name:系统管理员;level:1;”', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('80', 'admin', '3', '在role_operation表中根据条件“role_id:3;”删除了部分记录', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('81', 'admin', '2', '增加信息为“role_id:3;operation_id:4;”的角色操作', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('82', 'admin', '2', '增加信息为“role_id:3;operation_id:5;”的角色操作', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('83', 'admin', '2', '增加信息为“role_id:3;operation_id:6;”的角色操作', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('84', 'admin', '2', '增加信息为“role_id:3;operation_id:8;”的角色操作', '2017-04-24 22:09:43');
INSERT INTO `log` VALUES ('85', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-24 22:09:50');
INSERT INTO `log` VALUES ('86', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:录入题库题目管理;sequence:2;url:AddTopic;parent_id:7;”', '2017-04-24 22:10:56');
INSERT INTO `log` VALUES ('87', 'admin', '4', '修改ID为“3”的角色，修改后的信息为“name:系统管理员;level:1;”', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('88', 'admin', '3', '在role_operation表中根据条件“role_id:3;”删除了部分记录', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('89', 'admin', '2', '增加信息为“role_id:3;operation_id:4;”的角色操作', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('90', 'admin', '2', '增加信息为“role_id:3;operation_id:5;”的角色操作', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('91', 'admin', '2', '增加信息为“role_id:3;operation_id:6;”的角色操作', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('92', 'admin', '2', '增加信息为“role_id:3;operation_id:8;”的角色操作', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('93', 'admin', '2', '增加信息为“role_id:3;operation_id:9;”的角色操作', '2017-04-24 22:11:04');
INSERT INTO `log` VALUES ('94', 'admin', '4', '在operation表中根据条件“id:8;”修改了一条记录，修改后的信息为“name:录入题库类别管理;sequence:1;url:TopicType;”', '2017-04-24 22:11:42');
INSERT INTO `log` VALUES ('95', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-24 22:53:01');
INSERT INTO `log` VALUES ('96', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:常识题;”', '2017-04-24 22:57:42');
INSERT INTO `log` VALUES ('97', 'admin', '4', '在topic_type表中根据条件“id:69;”修改了一条记录，修改后的信息为“id:69;name:常识题1;”', '2017-04-24 22:58:49');
INSERT INTO `log` VALUES ('98', 'admin', '4', '在topic_type表中根据条件“id:69;”修改了一条记录，修改后的信息为“id:69;name:常识题;”', '2017-04-24 23:01:05');
INSERT INTO `log` VALUES ('99', 'admin', '4', '在topic_type表中根据条件“id:69;”修改了一条记录，修改后的信息为“id:69;name:常识题1;”', '2017-04-24 23:05:32');
INSERT INTO `log` VALUES ('100', 'admin', '4', '在topic_type表中根据条件“id:69;”修改了一条记录，修改后的信息为“id:69;name:常识题;”', '2017-04-24 23:05:37');
INSERT INTO `log` VALUES ('101', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:常识题1;”', '2017-04-24 23:05:45');
INSERT INTO `log` VALUES ('102', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:何建成;”', '2017-04-24 23:06:41');
INSERT INTO `log` VALUES ('103', 'admin', '3', '在topic_type表中根据条件“id:71;”删除了部分记录', '2017-04-24 23:06:44');
INSERT INTO `log` VALUES ('104', 'admin', '4', '在topic_type表中根据条件“id:70;”修改了一条记录，修改后的信息为“id:70;name:常识题;”', '2017-04-24 23:06:48');
INSERT INTO `log` VALUES ('105', 'admin', '3', '在topic_type表中根据条件“id:70;”删除了部分记录', '2017-04-24 23:06:51');
INSERT INTO `log` VALUES ('106', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:推理判断题;”', '2017-04-24 23:30:23');
INSERT INTO `log` VALUES ('107', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 00:47:42');
INSERT INTO `log` VALUES ('108', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 10:19:09');
INSERT INTO `log` VALUES ('109', 'admin', '4', '在topic表中根据条件“id:70;”修改了一条记录，修改后的信息为“creater:admin;content:按时打卡挥洒;time:2017-04-25 12:53:49;topic_type:72;topic_answer:1,2,;picture:;difficult_type:3;”', '2017-04-25 12:53:49');
INSERT INTO `log` VALUES ('110', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:70;”删除了部分记录', '2017-04-25 12:53:49');
INSERT INTO `log` VALUES ('111', 'admin', '4', '在topic表中根据条件“id:70;”修改了一条记录，修改后的信息为“creater:admin;content:按时打卡挥洒;time:2017-04-25 12:54:01;topic_type:72;topic_answer:1,2,;picture:;difficult_type:3;”', '2017-04-25 12:54:01');
INSERT INTO `log` VALUES ('112', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:70;”删除了部分记录', '2017-04-25 12:54:01');
INSERT INTO `log` VALUES ('113', 'admin', '3', '在topic表中根据条件“id:70;”删除了部分记录', '2017-04-25 13:00:55');
INSERT INTO `log` VALUES ('114', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:70;”删除了部分记录', '2017-04-25 13:00:55');
INSERT INTO `log` VALUES ('115', 'admin', '3', '在topic表中根据条件“id:69;”删除了部分记录', '2017-04-25 13:01:21');
INSERT INTO `log` VALUES ('116', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:69;”删除了部分记录', '2017-04-25 13:01:21');
INSERT INTO `log` VALUES ('117', 'admin', '4', '在topic表中根据条件“id:71;”修改了一条记录，修改后的信息为“creater:admin;content:红茶属于( )茶;time:2017-04-25 13:03:16;topic_type:72;topic_answer:2,4,;picture:/Hlt/Public/Uploads/topic/2017-04-25/1493096532_327499338.jpg;difficult_type:5;”', '2017-04-25 13:03:16');
INSERT INTO `log` VALUES ('118', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:71;”删除了部分记录', '2017-04-25 13:03:16');
INSERT INTO `log` VALUES ('119', 'admin', '4', '在topic表中根据条件“id:71;”修改了一条记录，修改后的信息为“creater:admin;content:红茶属于( )茶;time:2017-04-25 13:21:09;topic_type:72;topic_answer:2,4,;picture:/Hlt/Public/Uploads/topic/2017-04-25/1493096532_327499338.jpg;state:0;difficult_type:5;”', '2017-04-25 13:21:09');
INSERT INTO `log` VALUES ('120', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:71;”删除了部分记录', '2017-04-25 13:21:09');
INSERT INTO `log` VALUES ('121', 'admin', '4', '在topic表中根据条件“id:71;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-25 13:21:13');
INSERT INTO `log` VALUES ('122', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:审核题目;sequence:3;url:CheckTopic;parent_id:7;”', '2017-04-25 13:24:57');
INSERT INTO `log` VALUES ('123', 'admin', '4', '修改ID为“3”的角色，修改后的信息为“name:系统管理员;level:1;”', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('124', 'admin', '3', '在role_operation表中根据条件“role_id:3;”删除了部分记录', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('125', 'admin', '2', '增加信息为“role_id:3;operation_id:4;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('126', 'admin', '2', '增加信息为“role_id:3;operation_id:5;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('127', 'admin', '2', '增加信息为“role_id:3;operation_id:6;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('128', 'admin', '2', '增加信息为“role_id:3;operation_id:8;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('129', 'admin', '2', '增加信息为“role_id:3;operation_id:9;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('130', 'admin', '2', '增加信息为“role_id:3;operation_id:10;”的角色操作', '2017-04-25 13:25:06');
INSERT INTO `log` VALUES ('131', 'admin', '4', '在operation表中根据条件“id:10;”修改了一条记录，修改后的信息为“name:审核题目管理;sequence:3;url:CheckTopic;”', '2017-04-25 13:26:50');
INSERT INTO `log` VALUES ('132', 'admin', '4', '在topic表中根据条件“id:72;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-25 14:11:06');
INSERT INTO `log` VALUES ('133', 'admin', '4', '在topic表中根据条件“id:72;”修改了一条记录，修改后的信息为“state:3;”', '2017-04-25 14:16:05');
INSERT INTO `log` VALUES ('134', 'admin', '4', '在topic表中根据条件“id:73;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-25 14:17:19');
INSERT INTO `log` VALUES ('135', 'admin', '4', '在topic表中根据条件“id:73;”修改了一条记录，修改后的信息为“state:3;”', '2017-04-25 14:17:35');
INSERT INTO `log` VALUES ('136', 'admin', '3', '在topic表中根据条件“id:71;”删除了部分记录', '2017-04-25 14:18:16');
INSERT INTO `log` VALUES ('137', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:71;”删除了部分记录', '2017-04-25 14:18:16');
INSERT INTO `log` VALUES ('138', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 15:05:47');
INSERT INTO `log` VALUES ('139', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:广告管理;sequence:3;url:ad;parent_id:0;”', '2017-04-25 15:06:15');
INSERT INTO `log` VALUES ('140', 'admin', '2', '在operation表增加一条记录，记录的信息为“name:广告管理;sequence:1;url:Ad;parent_id:11;”', '2017-04-25 15:06:32');
INSERT INTO `log` VALUES ('141', 'admin', '4', '修改ID为“3”的角色，修改后的信息为“name:系统管理员;level:1;”', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('142', 'admin', '3', '在role_operation表中根据条件“role_id:3;”删除了部分记录', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('143', 'admin', '2', '增加信息为“role_id:3;operation_id:4;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('144', 'admin', '2', '增加信息为“role_id:3;operation_id:5;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('145', 'admin', '2', '增加信息为“role_id:3;operation_id:6;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('146', 'admin', '2', '增加信息为“role_id:3;operation_id:8;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('147', 'admin', '2', '增加信息为“role_id:3;operation_id:9;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('148', 'admin', '2', '增加信息为“role_id:3;operation_id:10;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('149', 'admin', '2', '增加信息为“role_id:3;operation_id:12;”的角色操作', '2017-04-25 15:06:42');
INSERT INTO `log` VALUES ('150', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105462_750467715.jpg;business:qwe;url:qewq;creator:admin;create_time:2017-04-25 15:31:03;”', '2017-04-25 15:31:03');
INSERT INTO `log` VALUES ('151', 'admin', '4', '在ad表中根据条件“id:7;”修改了一条记录，修改后的信息为“id:7;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105462_750467715.jpg;business:qwe;url:qewqq;”', '2017-04-25 15:31:11');
INSERT INTO `log` VALUES ('152', 'admin', '3', '在ad表中根据条件“id:7;”删除了部分记录', '2017-04-25 15:31:20');
INSERT INTO `log` VALUES ('153', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105493_504558725.jpg;business:qwe;url:qwe;creator:admin;create_time:2017-04-25 15:31:34;”', '2017-04-25 15:31:34');
INSERT INTO `log` VALUES ('154', 'admin', '4', '在ad表中根据条件“id:8;”修改了一条记录，修改后的信息为“id:8;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105493_504558725.jpg;business:qwe;url:qweq;”', '2017-04-25 15:31:40');
INSERT INTO `log` VALUES ('155', 'admin', '3', '在ad表中根据条件“id:8;”删除了部分记录', '2017-04-25 15:31:44');
INSERT INTO `log` VALUES ('156', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105808_966980140.jpg;business:广告1;url:www.asd.com;creator:admin;create_time:2017-04-25 15:36:49;”', '2017-04-25 15:36:49');
INSERT INTO `log` VALUES ('157', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105828_1188028357.jpg;business:广告2;url:ww.asd;creator:admin;create_time:2017-04-25 15:37:09;”', '2017-04-25 15:37:09');
INSERT INTO `log` VALUES ('158', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105849_1593747527.jpg;business:广告3;url:wqwe;creator:admin;create_time:2017-04-25 15:37:31;”', '2017-04-25 15:37:31');
INSERT INTO `log` VALUES ('159', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493105863_1498443531.jpg;business:广告4;url:asd;creator:admin;create_time:2017-04-25 15:37:44;”', '2017-04-25 15:37:44');
INSERT INTO `log` VALUES ('160', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493106699_851433059.jpg;business:qwe;url:qweqe;creator:admin;create_time:2017-04-25 15:51:41;”', '2017-04-25 15:51:41');
INSERT INTO `log` VALUES ('161', 'admin', '2', '在ad表增加一条记录，记录的信息为“picture:/Hlt/Public/Uploads/ad/2017-04-25/1493106722_1828299240.jpg;business:qew;url:qeq;creator:admin;create_time:2017-04-25 15:52:03;”', '2017-04-25 15:52:03');
INSERT INTO `log` VALUES ('162', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 17:33:51');
INSERT INTO `log` VALUES ('163', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:ads;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493113660_1544362280.jpg;”', '2017-04-25 17:47:48');
INSERT INTO `log` VALUES ('164', 'admin', '3', '在topic_type表中根据条件“id:73;”删除了部分记录', '2017-04-25 17:51:39');
INSERT INTO `log` VALUES ('165', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:hjc;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493113905_1015114196.jpg;”', '2017-04-25 17:51:47');
INSERT INTO `log` VALUES ('166', 'admin', '4', '在topic_type表中根据条件“id:74;”修改了一条记录，修改后的信息为“id:74;name:hjc1;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493113905_1015114196.jpg;”', '2017-04-25 17:56:16');
INSERT INTO `log` VALUES ('167', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 18:06:18');
INSERT INTO `log` VALUES ('168', 'admin', '4', '在topic_type表中根据条件“id:74;”修改了一条记录，修改后的信息为“id:74;name:hjc1;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493114789_1106625257.jpg;”', '2017-04-25 18:06:32');
INSERT INTO `log` VALUES ('169', 'admin', '4', '在topic_type表中根据条件“id:72;”修改了一条记录，修改后的信息为“id:72;name:推理判断题;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493114800_2103068693.jpg;”', '2017-04-25 18:06:42');
INSERT INTO `log` VALUES ('170', 'admin', '4', '在topic_type表中根据条件“id:69;”修改了一条记录，修改后的信息为“id:69;name:常识题;picture:/Hlt/Public/Uploads/ad/2017-04-25/1493114809_897504385.jpg;”', '2017-04-25 18:06:52');
INSERT INTO `log` VALUES ('171', 'admin', '3', '在topic_type表中根据条件“id:74;”删除了部分记录', '2017-04-25 18:07:44');
INSERT INTO `log` VALUES ('172', 'admin', '3', '在topic_type表中根据条件“id:72;”删除了部分记录', '2017-04-25 18:07:47');
INSERT INTO `log` VALUES ('173', 'admin', '3', '在topic_type表中根据条件“id:69;”删除了部分记录', '2017-04-25 18:07:50');
INSERT INTO `log` VALUES ('174', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:常识题;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493115602_960828863.jpg;”', '2017-04-25 18:27:27');
INSERT INTO `log` VALUES ('175', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:推理判断题;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;”', '2017-04-25 18:27:49');
INSERT INTO `log` VALUES ('176', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:高等数学;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;”', '2017-04-25 18:28:11');
INSERT INTO `log` VALUES ('177', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:C语言;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;”', '2017-04-25 18:28:22');
INSERT INTO `log` VALUES ('178', 'admin', '4', '在topic_type表中根据条件“id:75;”修改了一条记录，修改后的信息为“id:75;name:常识题;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493117124_1612000492.jpg;”', '2017-04-25 18:45:25');
INSERT INTO `log` VALUES ('179', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 19:36:17');
INSERT INTO `log` VALUES ('180', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-25 20:15:00');
INSERT INTO `log` VALUES ('181', 'admin', '3', '在topic表中根据条件“id:72;”删除了部分记录', '2017-04-25 20:23:55');
INSERT INTO `log` VALUES ('182', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:72;”删除了部分记录', '2017-04-25 20:23:55');
INSERT INTO `log` VALUES ('183', 'admin', '3', '在topic表中根据条件“id:73;”删除了部分记录', '2017-04-25 20:23:58');
INSERT INTO `log` VALUES ('184', 'admin', '3', '在topic_answer_item表中根据条件“topic_id:73;”删除了部分记录', '2017-04-25 20:23:58');
INSERT INTO `log` VALUES ('185', 'admin', '4', '在topic表中根据条件“id:74;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-25 20:27:54');
INSERT INTO `log` VALUES ('186', 'admin', '4', '在topic表中根据条件“id:74;”修改了一条记录，修改后的信息为“state:3;”', '2017-04-25 20:32:15');
INSERT INTO `log` VALUES ('187', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 14:54:09');
INSERT INTO `log` VALUES ('188', 'admin', '4', '在topic表中根据条件“id:75;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-26 14:54:40');
INSERT INTO `log` VALUES ('189', 'admin', '4', '在topic表中根据条件“id:75;”修改了一条记录，修改后的信息为“state:3;”', '2017-04-26 14:54:48');
INSERT INTO `log` VALUES ('190', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 16:26:37');
INSERT INTO `log` VALUES ('191', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-26 16:44:12;user_id:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];”', '2017-04-26 16:44:12');
INSERT INTO `log` VALUES ('192', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-26 16:48:41;user_id:1;”', '2017-04-26 16:48:41');
INSERT INTO `log` VALUES ('193', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-26 16:49:46;user_id:1;”', '2017-04-26 16:49:46');
INSERT INTO `log` VALUES ('195', '1', '4', '在topic_record表中根据条件“id:80;”修改了一条记录，修改后的信息为“answer:[[\"\",\"1\",\"1\"],[\"\",\"1\",\"1\"]];”', '2017-04-26 17:29:05');
INSERT INTO `log` VALUES ('196', '1', '4', '在topic_record表中根据条件“id:80;”修改了一条记录，修改后的信息为“answer:\"\";”', '2017-04-26 17:31:41');
INSERT INTO `log` VALUES ('197', '1', '4', '在topic_record表中根据条件“id:80;”修改了一条记录，修改后的信息为“answer:[[\"1\",\"1\",\"1\"],[\"\",\"1\",\"1\",\"\",\"0\"]];state:1;”', '2017-04-26 17:35:50');
INSERT INTO `log` VALUES ('198', '1', '4', '在topic_record表中根据条件“id:80;”修改了一条记录，修改后的信息为“answer:\"\";state:1;”', '2017-04-26 17:41:18');
INSERT INTO `log` VALUES ('199', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 17:51:27');
INSERT INTO `log` VALUES ('200', 'admin', '4', '在topic表中根据条件“id:76;”修改了一条记录，修改后的信息为“state:1;”', '2017-04-26 17:52:04');
INSERT INTO `log` VALUES ('201', 'admin', '4', '在topic表中根据条件“id:76;”修改了一条记录，修改后的信息为“state:3;”', '2017-04-26 17:52:10');
INSERT INTO `log` VALUES ('202', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-26 17:52:17;user_id:1;”', '2017-04-26 17:52:17');
INSERT INTO `log` VALUES ('203', '1', '4', '在topic_record表中根据条件“id:81;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%1\"},{\"num\":1,\"answer\":\"1%1\"},{\"num\":2,\"answer\":\"1%1\"}];state:1;”', '2017-04-26 17:59:08');
INSERT INTO `log` VALUES ('204', '1', '4', '在topic_record表中根据条件“id:81;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":1},{\"num\":1,\"answer\":\"1%2%3%4\"},{\"num\":2,\"answer\":1}];state:1;”', '2017-04-26 18:00:32');
INSERT INTO `log` VALUES ('205', '1', '4', '在topic_record表中根据条件“id:81;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%2\"},{\"num\":1,\"answer\":\"4%5\"},{\"num\":2,\"answer\":\"1%2\"}];state:1;”', '2017-04-26 18:03:20');
INSERT INTO `log` VALUES ('206', '1', '4', '在topic_record表中根据条件“id:81;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%2\"},{\"num\":1},{\"num\":2,\"answer\":\"2%3\"}];state:1;”', '2017-04-26 18:04:22');
INSERT INTO `log` VALUES ('207', '1', '4', '在topic_record表中根据条件“id:81;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%2\"},{\"num\":1,\"answer\":\"3%4\"}];state:1;”', '2017-04-26 18:05:57');
INSERT INTO `log` VALUES ('208', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 23:26:28');
INSERT INTO `log` VALUES ('209', 'admin', '2', '在topic_type表增加一条记录，记录的信息为“name:一般题;picture:/Hlt/Public/Uploads/topic_type/2017-04-26/1493220962_1593353369.jpg;content:;”', '2017-04-26 23:36:29');
INSERT INTO `log` VALUES ('210', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 23:41:20');
INSERT INTO `log` VALUES ('211', 'admin', '4', '在topic_type表中根据条件“id:75;”修改了一条记录，修改后的信息为“id:75;name:常识题1;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493117124_1612000492.jpg;content:撒打算阿达;”', '2017-04-26 23:42:49');
INSERT INTO `log` VALUES ('212', 'admin', '4', '在topic_type表中根据条件“id:75;”修改了一条记录，修改后的信息为“id:75;name:常识题2;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493117124_1612000492.jpg;content:撒打算阿达亲吻;”', '2017-04-26 23:43:14');
INSERT INTO `log` VALUES ('213', 'admin', '3', '在topic_type表中根据条件“id:79;”删除了部分记录', '2017-04-26 23:43:34');
INSERT INTO `log` VALUES ('214', 'admin', '4', '在topic_type表中根据条件“id:75;”修改了一条记录，修改后的信息为“id:75;name:常识题;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493117124_1612000492.jpg;content:普通知识。即一个生活在社会中的心智健全的成年人所应该具备的基本知识，包括生存技能（生活自理能力）、基本劳作技能、基础的自然科学以及人文社会科学知识等，一切基于敬畏自然。;”', '2017-04-26 23:44:07');
INSERT INTO `log` VALUES ('215', 'admin', '1', '登陆成功，登陆IP为：127.0.0.1', '2017-04-26 23:45:38');
INSERT INTO `log` VALUES ('216', 'admin', '4', '在topic_type表中根据条件“id:77;”修改了一条记录，修改后的信息为“id:77;name:高等数学1;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:广义地说，初等数学之外的数学都是高等数学，也有将中学较深入的代数、几何以及简单的集合论初步、逻辑初步称为中等数学的，将其作为中小学阶段的初等数学与大学阶段的高等数学的过渡;”', '2017-04-26 23:46:15');
INSERT INTO `log` VALUES ('217', 'admin', '4', '在topic_type表中根据条件“id:77;”修改了一条记录，修改后的信息为“id:77;name:高等数学;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:广义地说，初等数学之外的数学都是高等数学，也有将中学较深入的代数、几何以及简单的集合论初步、逻辑初步称为中等数学的，将其作为中小学阶段的初等数学与大学阶段的高等数学的过渡;”', '2017-04-26 23:46:21');
INSERT INTO `log` VALUES ('218', 'admin', '4', '在topic_type表中根据条件“id:76;”修改了一条记录，修改后的信息为“id:76;name:推理判断题1;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:推理,逻辑学指思维的基本形式之一,是由一个或几个已知的判断(前提)推出新判断(结论)的过程,有直接推理、间接推理等;”', '2017-04-26 23:47:14');
INSERT INTO `log` VALUES ('219', 'admin', '4', '在topic_type表中根据条件“id:76;”修改了一条记录，修改后的信息为“id:76;name:推理判断题;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:推理,逻辑学指思维的基本形式之一,是由一个或几个已知的判断(前提)推出新判断(结论)的过程,有直接推理、间接推理等;”', '2017-04-26 23:47:37');
INSERT INTO `log` VALUES ('220', 'admin', '4', '在topic_type表中根据条件“id:78;”修改了一条记录，修改后的信息为“id:78;name:C语言1;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:未;”', '2017-04-26 23:47:52');
INSERT INTO `log` VALUES ('221', 'admin', '4', '在topic_type表中根据条件“id:78;”修改了一条记录，修改后的信息为“id:78;name:C语言;picture:/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg;content:C语言是一门通用计算机编程语言，应用广泛。C语言的设计目标是提供一种能以简易的方式编译、处理低级存储器、产生少量的机器码以及不需要任何运行环境支持便能运行的编程语言;”', '2017-04-26 23:48:20');
INSERT INTO `log` VALUES ('222', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:13:54;user_id:1;”', '2017-04-27 00:13:54');
INSERT INTO `log` VALUES ('223', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:13:57;user_id:1;”', '2017-04-27 00:13:57');
INSERT INTO `log` VALUES ('224', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:13:58;user_id:1;”', '2017-04-27 00:13:58');
INSERT INTO `log` VALUES ('225', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:14:00;user_id:1;”', '2017-04-27 00:14:00');
INSERT INTO `log` VALUES ('226', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:14:02;user_id:1;”', '2017-04-27 00:14:02');
INSERT INTO `log` VALUES ('227', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:14:13;user_id:1;”', '2017-04-27 00:14:13');
INSERT INTO `log` VALUES ('228', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:18:58;user_id:1;”', '2017-04-27 00:18:58');
INSERT INTO `log` VALUES ('229', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:19:46;user_id:1;”', '2017-04-27 00:19:46');
INSERT INTO `log` VALUES ('230', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:20:09;user_id:1;”', '2017-04-27 00:20:09');
INSERT INTO `log` VALUES ('231', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:26:37;user_id:1;”', '2017-04-27 00:26:37');
INSERT INTO `log` VALUES ('232', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:28:44;user_id:1;”', '2017-04-27 00:28:44');
INSERT INTO `log` VALUES ('233', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 00:39:13;user_id:1;”', '2017-04-27 00:39:13');
INSERT INTO `log` VALUES ('234', '1', '4', '在topic_record表中根据条件“id:93;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%4\"},{\"num\":1,\"answer\":\"2%3\"},{\"num\":2,\"answer\":\"2%3\"}];state:1;”', '2017-04-27 00:39:44');
INSERT INTO `log` VALUES ('235', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 00:40:06;user_id:1;”', '2017-04-27 00:40:06');
INSERT INTO `log` VALUES ('236', '1', '4', '在topic_record表中根据条件“id:94;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%3\"}];state:1;”', '2017-04-27 00:40:17');
INSERT INTO `log` VALUES ('237', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 00:46:16;user_id:1;”', '2017-04-27 00:46:16');
INSERT INTO `log` VALUES ('238', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:46:38;user_id:1;”', '2017-04-27 00:46:38');
INSERT INTO `log` VALUES ('239', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:48:18;user_id:1;”', '2017-04-27 00:48:18');
INSERT INTO `log` VALUES ('240', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 00:49:35;user_id:1;”', '2017-04-27 00:49:35');
INSERT INTO `log` VALUES ('241', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 00:52:13;user_id:1;”', '2017-04-27 00:52:13');
INSERT INTO `log` VALUES ('242', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 00:52:14;user_id:1;”', '2017-04-27 00:52:14');
INSERT INTO `log` VALUES ('243', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-27 00:52:24;user_id:1;”', '2017-04-27 00:52:24');
INSERT INTO `log` VALUES ('244', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:54:54;user_id:1;”', '2017-04-27 00:54:54');
INSERT INTO `log` VALUES ('245', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 00:55:09;user_id:1;”', '2017-04-27 00:55:09');
INSERT INTO `log` VALUES ('246', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 00:57:13;user_id:1;”', '2017-04-27 00:57:13');
INSERT INTO `log` VALUES ('247', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 10:00:00;user_id:1;”', '2017-04-27 10:00:01');
INSERT INTO `log` VALUES ('248', '1', '4', '在topic_record表中根据条件“id:105;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%3\"},{\"num\":1,\"answer\":\"2%3\"},{\"num\":2,\"answer\":\"2%3\"}];state:1;”', '2017-04-27 10:00:19');
INSERT INTO `log` VALUES ('249', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 10:01:22;user_id:1;”', '2017-04-27 10:01:22');
INSERT INTO `log` VALUES ('250', '1', '4', '在topic_record表中根据条件“id:106;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%2\"},{\"num\":1,\"answer\":\"3%4\"},{\"num\":2,\"answer\":4}];state:1;”', '2017-04-27 10:01:43');
INSERT INTO `log` VALUES ('251', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-27 10:04:07;user_id:1;”', '2017-04-27 10:04:07');
INSERT INTO `log` VALUES ('252', '1', '4', '在topic_record表中根据条件“id:107;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":1},{\"num\":1,\"answer\":1},{\"num\":2,\"answer\":2}];state:1;”', '2017-04-27 10:04:26');
INSERT INTO `log` VALUES ('253', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 10:12:52;user_id:1;”', '2017-04-27 10:12:52');
INSERT INTO `log` VALUES ('254', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 10:15:09;user_id:1;”', '2017-04-27 10:15:09');
INSERT INTO `log` VALUES ('255', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-27 13:21:31;user_id:1;”', '2017-04-27 13:21:31');
INSERT INTO `log` VALUES ('256', '1', '4', '在topic_record表中根据条件“id:110;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"3%4\"},{\"num\":1,\"answer\":\"4%5\"},{\"num\":2,\"answer\":\"4%5\"}];state:1;”', '2017-04-27 13:21:50');
INSERT INTO `log` VALUES ('257', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-27 13:23:32;user_id:1;”', '2017-04-27 13:23:32');
INSERT INTO `log` VALUES ('258', '1', '4', '在topic_record表中根据条件“id:111;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"1%2\"},{\"num\":1},{\"num\":2,\"answer\":\"2%3\"}];state:1;”', '2017-04-27 13:23:42');
INSERT INTO `log` VALUES ('259', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 14:25:08;user_id:1;”', '2017-04-27 14:25:08');
INSERT INTO `log` VALUES ('260', '1', '4', '在topic_record表中根据条件“id:112;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":3},{\"num\":1,\"answer\":\"3%4\"},{\"num\":2,\"answer\":3}];state:1;”', '2017-04-27 14:25:59');
INSERT INTO `log` VALUES ('261', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 15:23:47;user_id:1;”', '2017-04-27 15:23:47');
INSERT INTO `log` VALUES ('262', '1', '4', '在topic_record表中根据条件“id:113;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%3\"},{\"num\":1,\"answer\":\"3%4\"},{\"num\":2,\"answer\":3}];state:1;”', '2017-04-27 15:24:35');
INSERT INTO `log` VALUES ('263', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 15:25:46;user_id:1;”', '2017-04-27 15:25:46');
INSERT INTO `log` VALUES ('264', '1', '4', '在topic_record表中根据条件“id:114;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"3%4\"},{\"num\":1,\"answer\":3},{\"num\":2,\"answer\":3}];state:1;”', '2017-04-27 15:26:19');
INSERT INTO `log` VALUES ('265', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":3,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"}];time:2017-04-27 16:30:03;user_id:1;”', '2017-04-27 16:30:03');
INSERT INTO `log` VALUES ('266', '1', '4', '在topic_record表中根据条件“id:115;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%3\"},{\"num\":1,\"answer\":\"2%3\"},{\"num\":2,\"answer\":\"2%3\"}];state:1;”', '2017-04-27 16:30:13');
INSERT INTO `log` VALUES ('267', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 17:28:32;user_id:1;”', '2017-04-27 17:28:32');
INSERT INTO `log` VALUES ('268', '1', '4', '在topic_record表中根据条件“id:116;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":\"2%3\"},{\"num\":1,\"answer\":3},{\"num\":2,\"answer\":3}];state:1;”', '2017-04-27 17:28:41');
INSERT INTO `log` VALUES ('269', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":2,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 19:32:11;user_id:1;”', '2017-04-27 19:32:11');
INSERT INTO `log` VALUES ('270', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"}];time:2017-04-27 19:33:34;user_id:1;”', '2017-04-27 19:33:34');
INSERT INTO `log` VALUES ('271', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:null;time:2017-04-27 19:35:11;user_id:1;”', '2017-04-27 19:35:11');
INSERT INTO `log` VALUES ('272', '1', '2', '在topic_record表增加一条记录，记录的信息为“content:[{\"questionId\":1,\"questionTitle\":\"\\u59d4\\u5c48\",\"questionItems\":\"\\u6606\\u4ed1\\u51b3; \\u7a7a\\u95f4\\u94fe\\u63a5;\\u79d1\\u6280\\u516d\\u8def;\\u9ab7\\u9ac5\\u7cbe\\u7075;\\u9ab7\\u9ac5\\u7cbe\\u7075\",\"topic_id\":76,\"questionAnswer\":\"3,4,\",\"answer_content\":\"\\u6606\\u4ed1\\u51b3\\u79bb\\u5f00\\u5bb6\"},{\"questionId\":2,\"questionTitle\":\"qweqwej\",\"questionItems\":\"jklqjewkql;wlqjek;qklwel;qwkelqj;qkwejlqkwl\",\"topic_id\":75,\"questionAnswer\":\"3,\",\"answer_content\":\"qewqwek\"},{\"questionId\":3,\"questionTitle\":\"\\u4e0b\\u5217\\u53d8\\u91cf\\u662f\\u65e0\\u7a77\\u5c0f\\u7684\\u662f\",\"questionItems\":\"\\u963f\\u8bd7\\u4e39\\u987f;\\u6253\\u6492\\u963f\\u65af\\u8fbe;\\u5927\\u58f0\\u9053;\\u554a\\u5b9e\\u6253\\u5b9e\\u7684\",\"topic_id\":74,\"questionAnswer\":\"3,\",\"answer_content\":\"\\u8bbe\\u7a7a\\u95f4\\u4e09\\u70b9\\u7684\\u5750\\u6807\\u5206\\u522b\\u662fM(1,1,1)\\uff0cA(2,2,1)\\uff0cB(2,1,2)\\u3002\\u90a3\\u4e48&lt;AMB=__\\u3002\\n\\n\\u3000\\u3000A\\u220f\\/3 B\\u220f\\/4 C\\u220f\\/2 D\\u220f\\/3\"}];time:2017-04-27 23:06:59;user_id:1;”', '2017-04-27 23:06:59');
INSERT INTO `log` VALUES ('273', '1', '4', '在topic_record表中根据条件“id:120;”修改了一条记录，修改后的信息为“answer:[{\"num\":0,\"answer\":3},{\"num\":1,\"answer\":3},{\"num\":2,\"answer\":3}];state:1;”', '2017-04-27 23:07:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of operation
-- ----------------------------
INSERT INTO `operation` VALUES ('1', '权限账号管理', '0', '0', 'employee');
INSERT INTO `operation` VALUES ('4', '账号管理', '1', '0', 'Staff');
INSERT INTO `operation` VALUES ('5', '角色管理', '1', '1', 'Role');
INSERT INTO `operation` VALUES ('6', '模块管理', '1', '2', 'Operation');
INSERT INTO `operation` VALUES ('7', '题库录入管理', '0', '2', 'topic');
INSERT INTO `operation` VALUES ('8', '录入题库类别管理', '7', '1', 'TopicType');
INSERT INTO `operation` VALUES ('9', '录入题库题目管理', '7', '2', 'AddTopic');
INSERT INTO `operation` VALUES ('10', '审核题目管理', '7', '3', 'CheckTopic');
INSERT INTO `operation` VALUES ('11', '广告管理', '0', '3', 'ad');
INSERT INTO `operation` VALUES ('12', '广告管理', '11', '1', 'Ad');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_operation
-- ----------------------------
INSERT INTO `role_operation` VALUES ('23', '3', '4');
INSERT INTO `role_operation` VALUES ('24', '3', '5');
INSERT INTO `role_operation` VALUES ('25', '3', '6');
INSERT INTO `role_operation` VALUES ('26', '3', '8');
INSERT INTO `role_operation` VALUES ('27', '3', '9');
INSERT INTO `role_operation` VALUES ('28', '3', '10');
INSERT INTO `role_operation` VALUES ('29', '3', '12');

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
INSERT INTO `staff` VALUES ('admin', '系统管理员', '21232f297a57a5a743894a0e4a801fc3', '3', '2017-04-26 23:45:38', '127.0.0.1', '0', '0');

-- ----------------------------
-- Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creater` varchar(20) DEFAULT NULL COMMENT '录入题目的人',
  `content` text COMMENT '题目内容',
  `time` datetime DEFAULT NULL COMMENT '加入题目时间',
  `topic_type` tinyint(1) DEFAULT NULL COMMENT '题目类别',
  `topic_answer` varchar(20) DEFAULT NULL COMMENT '题目答案，',
  `picture` varchar(200) DEFAULT NULL COMMENT '图片',
  `difficult_type` tinyint(1) DEFAULT NULL COMMENT '难度系数',
  `state` tinyint(1) DEFAULT '0' COMMENT '审核题目未提交0；待审核：1；未通过2；通过3；',
  `answer_content` text COMMENT '答案解析',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic
-- ----------------------------

-- ----------------------------
-- Table structure for `topic_answer_item`
-- ----------------------------
DROP TABLE IF EXISTS `topic_answer_item`;
CREATE TABLE `topic_answer_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL COMMENT '题目的id',
  `content` text COMMENT '答案项',
  `sequence` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic_answer_item
-- ----------------------------

-- ----------------------------
-- Table structure for `topic_record`
-- ----------------------------
DROP TABLE IF EXISTS `topic_record`;
CREATE TABLE `topic_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COMMENT '刷题内容',
  `time` datetime DEFAULT NULL COMMENT '  时间',
  `answer` text COMMENT '答案',
  `user_id` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT '0' COMMENT '0未提交，1已提交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic_record
-- ----------------------------

-- ----------------------------
-- Table structure for `topic_result`
-- ----------------------------
DROP TABLE IF EXISTS `topic_result`;
CREATE TABLE `topic_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_record_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `topic_id_re` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic_result
-- ----------------------------

-- ----------------------------
-- Table structure for `topic_type`
-- ----------------------------
DROP TABLE IF EXISTS `topic_type`;
CREATE TABLE `topic_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '题目类型名',
  `picture` varchar(200) DEFAULT NULL COMMENT '图片',
  `content` text COMMENT '题目类别介绍',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topic_type
-- ----------------------------
INSERT INTO `topic_type` VALUES ('75', '常识题', '/Hlt/Public/Uploads/topic_type/2017-04-25/1493117124_1612000492.jpg', '普通知识。即一个生活在社会中的心智健全的成年人所应该具备的基本知识，包括生存技能（生活自理能力）、基本劳作技能、基础的自然科学以及人文社会科学知识等，一切基于敬畏自然。');
INSERT INTO `topic_type` VALUES ('76', '推理判断题', '/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg', '推理,逻辑学指思维的基本形式之一,是由一个或几个已知的判断(前提)推出新判断(结论)的过程,有直接推理、间接推理等');
INSERT INTO `topic_type` VALUES ('77', '高等数学', '/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg', '广义地说，初等数学之外的数学都是高等数学，也有将中学较深入的代数、几何以及简单的集合论初步、逻辑初步称为中等数学的，将其作为中小学阶段的初等数学与大学阶段的高等数学的过渡');
INSERT INTO `topic_type` VALUES ('78', 'C语言', '/Hlt/Public/Uploads/topic_type/2017-04-25/1493116067_2108892472.jpg', 'C语言是一门通用计算机编程语言，应用广泛。C语言的设计目标是提供一种能以简易的方式编译、处理低级存储器、产生少量的机器码以及不需要任何运行环境支持便能运行的编程语言');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- View structure for `topic_detail_view`
-- ----------------------------
DROP VIEW IF EXISTS `topic_detail_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `topic_detail_view` AS select `topic_result`.`topic_id_re` AS `topic_id_re`,`topic_result`.`topic_record_id` AS `topic_record_id`,`topic_result`.`topic_id` AS `topic_id`,`topic_result`.`id` AS `id`,`topic`.`topic_type` AS `topic_type`,`topic_record`.`user_id` AS `user_id`,`topic_record`.`time` AS `time`,`topic_type`.`name` AS `name` from (((`topic_result` join `topic` on((`topic_result`.`topic_id` = `topic`.`id`))) join `topic_record` on((`topic_record`.`id` = `topic_result`.`topic_record_id`))) join `topic_type` on((`topic_type`.`id` = `topic`.`topic_type`))) ;
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
