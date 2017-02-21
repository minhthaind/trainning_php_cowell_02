/*
Navicat MySQL Data Transfer

Source Server         : cowell
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : trainningcowell

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-21 13:06:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'kiên', 'Chung Trần', '0964953029', 'kienkienutc95@gmail.com', '2017-02-20 16:45:03', '2017-02-21 03:44:32', 'kientranutc', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO users VALUES ('7', 'Đức', 'Đình Trần', '2343567879', 'kienkienutc95@gmail.com', '2017-02-21 01:37:10', '2017-02-21 03:44:14', 'admin', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO users VALUES ('10', 'Kiên ', 'Chung Trần', '1243564578', 'kienkienutc95@gmail.com', '2017-02-21 03:13:28', '2017-02-21 12:57:15', 'kientran', 'c56d0e9a7ccec67b4ea131655038d604');
