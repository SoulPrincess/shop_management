/*
Navicat MySQL Data Transfer

Source Server         : lhp
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : www_shoptest_com

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-10-30 11:00:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role_id` varchar(255) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1603179320', '1603179320', '1', '1,3');
INSERT INTO `admin` VALUES ('4', 'dsd', 'e10adc3949ba59abbe56e057f20f883e', '1603690808', '1603878841', '1', '4');
INSERT INTO `admin` VALUES ('5', '张三', '96e79218965eb72c92a549dd5a330112', '1603696812', '1603878536', '0', '3,5');
INSERT INTO `admin` VALUES ('7', '1111', 'e10adc3949ba59abbe56e057f20f883e', '1603866321', '1603878636', '1', '3,4');

-- ----------------------------
-- Table structure for `admins_roles`
-- ----------------------------
DROP TABLE IF EXISTS `admins_roles`;
CREATE TABLE `admins_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员角色关联表';

-- ----------------------------
-- Records of admins_roles
-- ----------------------------

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('5', '服装', '3', '1', '1603271373', '1603271373', '/uploads/20201021/9da3c9fbf5a5319959279b18f66c4bb7.png');
INSERT INTO `category` VALUES ('3', '办公', '1', '1', '1603250250', '1603271336', '/uploads/20201021/53df0d4ec7c4f45eb70c0bb64b576b86.png');
INSERT INTO `category` VALUES ('4', '家电', '2', '1', '1603251007', '1603271357', '/uploads/20201021/4c32b51dfc51b3d53c4823fcb81af205.png');
INSERT INTO `category` VALUES ('6', '日用', '4', '1', '1603271391', '1603271391', '/uploads/20201021/42110fb06dfceb3f7cb7168656dd2721.png');
INSERT INTO `category` VALUES ('7', '蔬果', '5', '1', '1603271466', '1603271466', '/uploads/20201021/3f7ce5efb18e48495374e8cf07c31e14.png');
INSERT INTO `category` VALUES ('8', '运动', '6', '1', '1603271482', '1603271482', '/uploads/20201021/f59abd2cd5287cbb26a0517c6a47656c.png');
INSERT INTO `category` VALUES ('9', '书籍', '7', '1', '1603271498', '1603271498', '/uploads/20201021/a540fd05971b7ad042b45f575fa9987c.png');
INSERT INTO `category` VALUES ('10', '文具', '8', '1', '1603271515', '1603271515', '/uploads/20201021/8a74da50aa05f418f7cb61d04863d0aa.png');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `img` text,
  `content` text,
  `intru` text,
  `sku` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '顶顶顶', '5', '2.00', '2', '/uploads/20201021\\5c7c0799718c9ff7f0f36ab19a6a4c7b.png', '<p>&lt;p&gt;&amp;lt;p&amp;gt;而且我顶起定期的&amp;lt;/p&amp;gt;&lt;/p&gt;</p>', '额企鹅企鹅', '1', '1', '1603261526', '1603698423', '1');

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '0  不显示  1显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', '管理员管理', '0', '', '1603706155', '1603943082', '1');
INSERT INTO `permission` VALUES ('2', '管理员列表', '1', 'admin/index', '1603764329', '1603943106', '1');
INSERT INTO `permission` VALUES ('3', '角色管理', '1', 'role/index', '1603770659', '1603943133', '1');
INSERT INTO `permission` VALUES ('4', '权限管理', '1', 'permission/index', '1603770682', '1603943173', '1');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `perid` varchar(255) DEFAULT NULL COMMENT '权限拼接',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '1,2,3,4', '1603692482', '1603696426');
INSERT INTO `role` VALUES ('3', '普通管理员', '1,3,4', '1603696435', '1603786258');
INSERT INTO `role` VALUES ('4', '编辑管理员', '2,1', '1603696446', '1603786080');
INSERT INTO `role` VALUES ('5', '删除管理员', '2,1,3,4', '1603783979', '1603786690');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '15211111111', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '1');
INSERT INTO `user` VALUES ('2', '15211111112', '96e79218965eb72c92a549dd5a330112', '1603437847', '1603437847', '1');
INSERT INTO `user` VALUES ('3', '15211111113', '96e79218965eb72c92a549dd5a330112', '1603438151', '1603438151', '1');
