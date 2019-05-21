/*
	Target Server Type    : MYSQL
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', 'Welcome!', 'Welcome to this basic CMS', '1556989266');

-- ----------------------------
-- Table structure for `cp`
-- ----------------------------
DROP TABLE IF EXISTS `cp`;
CREATE TABLE `cp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cp
-- ----------------------------
INSERT INTO `cp` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
