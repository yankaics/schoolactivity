/*
Navicat MySQL Data Transfer

Source Server         : zxc
Source Server Version : 50165
Source Host           : zxcasdmko.gotoftp3.com:3306
Source Database       : zxcasdmko

Target Server Type    : MYSQL
Target Server Version : 50165
File Encoding         : 65001

Date: 2015-09-28 19:20:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cz_activity
-- ----------------------------
DROP TABLE IF EXISTS `cz_activity`;
CREATE TABLE `cz_activity` (
  `activityid` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `openid2` varchar(255) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `boolSend` bit(1) DEFAULT NULL,
  `boolShard` bit(1) DEFAULT NULL,
  `qrcode_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`activityid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_activity
-- ----------------------------
INSERT INTO `cz_activity` VALUES ('1', '1', null, null, '1', '\0', '\0', '\0', '0');
INSERT INTO `cz_activity` VALUES ('34', 'oK4Fss_kKsEc3w-CazJOuTvMDyRs', 'oK4Fss_kKsEc3w-CazJOuTvMDyRs', null, '18381334402', '\0', '\0', '', '1');
INSERT INTO `cz_activity` VALUES ('35', 'oK4Fss7zHjbghcMcRXa6-xLaHL4s', 'oK4Fss1eC1XuRYzkijvrMQ1dnwWU', null, '15692000182', '\0', '\0', '', '2');

-- ----------------------------
-- Table structure for cz_info
-- ----------------------------
DROP TABLE IF EXISTS `cz_info`;
CREATE TABLE `cz_info` (
  `infoid` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `info_time` varchar(50) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_info
-- ----------------------------
INSERT INTO `cz_info` VALUES ('1', '11', '11', '\0');
INSERT INTO `cz_info` VALUES ('35', 'oK4Fss7zHjbghcMcRXa6-xLaHL4s', '15-07-01 10:43:13', '\0');
INSERT INTO `cz_info` VALUES ('36', 'oK4Fss1eC1XuRYzkijvrMQ1dnwWU', '15-07-01 10:46:08', '\0');

-- ----------------------------
-- Table structure for cz_order
-- ----------------------------
DROP TABLE IF EXISTS `cz_order`;
CREATE TABLE `cz_order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `orderCode` varchar(255) DEFAULT NULL,
  `order_name` varchar(50) DEFAULT NULL,
  `plat` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `facevalue` varchar(10) DEFAULT NULL,
  `saveMoney` varchar(10) DEFAULT NULL,
  `realityMoney` varchar(10) DEFAULT NULL,
  `addTime` varchar(50) DEFAULT NULL,
  `boolSuccess` bit(1) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cz_order
-- ----------------------------
INSERT INTO `cz_order` VALUES ('71', 'oQvYQuOEsvLwl_R060_uyGl1cotA', 'wx2015070616042004793b7faa0878304896', '小鸡', 'BYM00000100A', '13450351002', '3', '1.05', null, '15-07-06 05:35:15', '', '\0');
INSERT INTO `cz_order` VALUES ('72', 'KsEc3w-CazJOuTvMDyRs', 'wx2015070616042004793b7faa0878304897', '小鸡', 'BYM00000100A', '13450351002', '3', '1.05', null, '15-07-06 05:35:15', '', '\0');

-- ----------------------------
-- Table structure for kj_activity
-- ----------------------------
DROP TABLE IF EXISTS `kj_activity`;
CREATE TABLE `kj_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(11) DEFAULT NULL,
  `openid` char(50) DEFAULT NULL,
  `current_times` smallint(6) DEFAULT NULL,
  `current_money` varchar(50) DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_activity
-- ----------------------------
INSERT INTO `kj_activity` VALUES ('58', '12', 'oQvYQuFoUjQqthUUC-ZgwTSfrRkI', '100', '30', '1');
INSERT INTO `kj_activity` VALUES ('59', '12', 'oQvYQuFoUjQqthUUC-ZgwTSfrRkI', '100', '30', '1');
INSERT INTO `kj_activity` VALUES ('60', '12', 'oQvYQuFoUjQqthUUC-ZgwTSfrRkI', '100', '30', '1');
INSERT INTO `kj_activity` VALUES ('61', '12', 'oQvYQuHt_x0EI8Yo7ZBRb6KT6M-Y', '100', '30', '1');

-- ----------------------------
-- Table structure for kj_admin
-- ----------------------------
DROP TABLE IF EXISTS `kj_admin`;
CREATE TABLE `kj_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_admin
-- ----------------------------
INSERT INTO `kj_admin` VALUES ('1', 'admin', 'admin', null);

-- ----------------------------
-- Table structure for kj_friends
-- ----------------------------
DROP TABLE IF EXISTS `kj_friends`;
CREATE TABLE `kj_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid_targert` varchar(50) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `money` varchar(50) DEFAULT NULL,
  `creat_time` datetime DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_friends
-- ----------------------------

-- ----------------------------
-- Table structure for kj_goods
-- ----------------------------
DROP TABLE IF EXISTS `kj_goods`;
CREATE TABLE `kj_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsName` varchar(50) DEFAULT '',
  `discribe` varchar(255) DEFAULT '',
  `height` varchar(50) DEFAULT NULL,
  `low` varchar(50) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  `totals_times` smallint(6) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `total_money` varchar(50) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_goods
-- ----------------------------
INSERT INTO `kj_goods` VALUES ('1', 'VIA', '时尚Air棉超干爽瞬吸3D吸收芯 贴心超薄舒适日用绵柔卫生巾240mm9片', '2.00', '1.00', '12', '0', '10', 'images/2/wupin.png', '20.00', null);
INSERT INTO `kj_goods` VALUES ('2', '舒化奶ee', '22222222222', '1.50', '0.50', '24', '0', '10', 'Uploads/2015-09-17/55fa291eaa01b.png', '16.00', null);
INSERT INTO `kj_goods` VALUES ('5', '1', '5', '4', '3', '40', '0', null, 'Uploads2015-09-14/55f660f4c8512.png', '2', null);
INSERT INTO `kj_goods` VALUES ('6', '1', '5', '4', '3', '10', '0', null, 'Uploads/2015-09-16/55f97bf544fe9.jpg', '2', null);
INSERT INTO `kj_goods` VALUES ('7', '1', '33', '4.00', '3.00', '10', '0', null, 'Uploads/2015-09-17/55fa4c0805ba2.png', '2', '10');
INSERT INTO `kj_goods` VALUES ('8', '11', '薇尔', '6', '5.5', '22', '0', null, 'Uploads/2015-09-17/55fa4c542bf65.jpg', '11', '0');
INSERT INTO `kj_goods` VALUES ('9', '薇尔', '薇尔', '9', '5', '42', '0', null, 'Uploads/2015-09-17/55fa5d8870cea.jpg', '10', '0');
INSERT INTO `kj_goods` VALUES ('12', '30元包邮大礼包', '30元包邮大礼包', '29', '15', '1', '1', null, 'Uploads/2015-09-24/56037c2e1b081.png', '30', '10');

-- ----------------------------
-- Table structure for kj_limit
-- ----------------------------
DROP TABLE IF EXISTS `kj_limit`;
CREATE TABLE `kj_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` char(255) DEFAULT NULL,
  `times` smallint(6) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `state` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_limit
-- ----------------------------

-- ----------------------------
-- Table structure for kj_order
-- ----------------------------
DROP TABLE IF EXISTS `kj_order`;
CREATE TABLE `kj_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(11) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `orderNum` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `creat_time` datetime DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_order
-- ----------------------------

-- ----------------------------
-- Table structure for kj_subscribe
-- ----------------------------
DROP TABLE IF EXISTS `kj_subscribe`;
CREATE TABLE `kj_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) DEFAULT NULL,
  `creat_time` datetime DEFAULT NULL,
  `states` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kj_subscribe
-- ----------------------------
INSERT INTO `kj_subscribe` VALUES ('35', 'oQvYQuHt_x0EI8Yo7ZBRb6KT6M-Y', '2015-09-14 04:06:42', '1');
INSERT INTO `kj_subscribe` VALUES ('36', 'oQvYQuHt_x0EI8Yo7ZBRb6KT6M-Y', '2015-09-14 04:08:55', '1');
INSERT INTO `kj_subscribe` VALUES ('37', 'oQvYQuJ0ZdznD6hW5TAlM7fzX9Pw', '2015-09-17 10:38:12', '1');
INSERT INTO `kj_subscribe` VALUES ('38', 'oQvYQuJ43lxhou6ldR3WCe77AHQM', '2015-09-17 01:26:11', '1');
INSERT INTO `kj_subscribe` VALUES ('39', 'oQvYQuLMCDDFGVBEYkTJnZ16hY2A', '2015-09-17 04:46:30', '1');
INSERT INTO `kj_subscribe` VALUES ('40', 'oQvYQuGaf6UgX8psIfloOz2k4RUA', '2015-09-17 05:37:19', '1');
INSERT INTO `kj_subscribe` VALUES ('41', 'oQvYQuAApdCFxVD4cAY8KnOIKElY', '2015-09-17 06:56:27', '1');
INSERT INTO `kj_subscribe` VALUES ('42', 'oQvYQuA1BGRsGVoAyLw0RYnrEh1I', '2015-09-19 09:40:36', '1');
INSERT INTO `kj_subscribe` VALUES ('43', 'oQvYQuOEsvLwl_R060_uyGl1cotA', '2015-09-21 01:53:32', '1');
INSERT INTO `kj_subscribe` VALUES ('44', 'oQvYQuBPqYpYCjWZu2ib3XDuvJ1k', '2015-09-23 10:34:11', '1');
INSERT INTO `kj_subscribe` VALUES ('45', 'oQvYQuKmFTLgDiws0yD1D_4wh3J8', '2015-09-24 12:20:27', '1');
INSERT INTO `kj_subscribe` VALUES ('46', 'oQvYQuFoUjQqthUUC-ZgwTSfrRkI', '2015-09-24 05:54:58', '1');

-- ----------------------------
-- Table structure for wx_activity
-- ----------------------------
DROP TABLE IF EXISTS `wx_activity`;
CREATE TABLE `wx_activity` (
  `activityId` int(11) NOT NULL AUTO_INCREMENT,
  `activityTitle` varchar(255) DEFAULT NULL,
  `activitySubTitle` varchar(255) DEFAULT NULL,
  `activityTheme` varchar(255) DEFAULT NULL,
  `activityCagetory` varchar(50) DEFAULT NULL,
  `activityImage` varchar(255) DEFAULT NULL,
  `activityTime` varchar(50) DEFAULT NULL,
  `attentNum` int(11) DEFAULT NULL,
  `activityAdd` varchar(255) DEFAULT NULL,
  `activitySponsor` varchar(255) DEFAULT NULL,
  `activityTetailed` varchar(3000) DEFAULT NULL,
  `boolPassTime` bit(1) DEFAULT NULL,
  PRIMARY KEY (`activityId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_activity
-- ----------------------------
INSERT INTO `wx_activity` VALUES ('23', '古典之典', '莫扎特、贝多芬钢琴作品音乐会', null, '钢琴', 'piano.jpg', '2015-06-20 19:30:56', '1', '深圳艺校音乐厅', '深圳艺术学校钢琴系', '<p>Sonata No. 6 in D major K. 284 (205b) &#39;Durnitz&#39;</p><p>I. Allegro<br/>II. Rondeau on Plonaise. Andante<br/>III. Thema mit zwolf Variationen<br/><br/></p><p>Sonata No. 9 in A minor K. 310 (300d)<br/>I. Allegro maestoso<br/>II. Andante cantabile con espressione<br/>III. Presto<br/><br/></p><p>Sonata No. 12 in F major K. 332 (300k)<br/>I. Allegro<br/>II. Adagio<br/>III. Allegro assai<br/><br/>休息</p><p><br/></p><p><br/></p><p>Sonata No. 17 in B flat major K. 570<br/>I. Allagro<br/>II. Adagio<br/>III. Allegretto<br/><br/></p><p>Sonata No. 18 in D major K. 576<br/>I. Allegro<br/>II. Adagio<br/>III. Allegretto<br/></p><p>Sonata No. 13 in B flat major K. 333 (315c) &#39;Linz&#39;<br/>I. Allegro<br/>II. Andante cantabile<br/>III. Allegretto grazioso<br/></p>', null);
INSERT INTO `wx_activity` VALUES ('24', '天方夜谭', '深圳艺术学校交响乐团音乐会', null, '交响', 'violin.jpg', '2015-06-28 19:30:43', '1', '深圳大剧院音乐厅', '深圳艺术学校管弦系', '<p>Nicolay Rimsky-Korsakov (1844-1908)</p><p>里姆斯基 - 科萨科夫</p><p>天方夜谭 (Scheherazade, Op.35)</p><p><br/></p><p>“我们从这座城市航行到另一座城市，从这个岛屿到下一个岛屿，从大海到另一片大海，直到有一天，我们遇上了恶劣的暴风，于是大家开始祈祷。就在此时，一阵强风袭来，船帆全被扯成碎片，船身旋绕三次后又被向后推，此时船舵忽然断裂，船冲向峭壁……”<br/>———《天方夜谭》中的“辛巴达历险记”。<br/><br/>里姆斯基-柯萨科夫的《天方夜谭》，以讲故事的女主角舍赫拉查德为名，结构类似交响曲，四个乐章中，每一个乐章都有一个描述内容的标题，不同的乐章间也分享许多共同主题素材。例如代表舍赫拉查德本人的一段小提琴独奏的温柔旋律，以及代表苏丹·夏里亚(Sultan Shahria)的严厉动机，在乐曲开端由弦乐与铜管齐奏猛烈出击；两个动机均有许多变化，依照作曲家的说法，如此整部作品才能“藉着主题与动机间的结合紧密交织，并呈现有如万花筒般千变万化的意象与设计……”。</p><p><br/></p><p>1 -【大海与辛巴达的船】<br/>The Sea and Sinbad&#39;s Ship</p><p><br/>2 -【卡兰德王子的故事】</p><p>The Story of the Calender Prince<br/><br/></p><p>3 -【年轻的王子与年轻的公主】<br/>The Young Prince and the Young Princess</p><p><br/>4 -【巴格达节庆——大海——船难】<br/>Festival at Baghdad - The Sea - The Shipwreck</p>', null);
INSERT INTO `wx_activity` VALUES ('25', '七月的声音', '李原茜子师生钢琴音乐会', null, '钢琴', 'piano.jpg', '2015-07-01 19:30:26', '2', '鼓浪屿钢琴学校音乐厅', '厦门鼓浪屿钢琴学校', '<p>&nbsp;&nbsp;&nbsp;&nbsp;斯卡拉蒂&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;奏鸣曲B小调，K.87, E小调,K.135</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;舒曼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;克莱斯勒偶记<br/></p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;斯克里亚宾&nbsp;&nbsp;&nbsp;&nbsp;练习曲C小调,作品2之1, 升D小调,作品8之12<br/></p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中场休息</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;舒伯特&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;即兴曲降B大调,作品142之3</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;舒伯特&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;随想圆舞曲第6首</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;李斯特&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;即兴曲 升F大调(夜曲)</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;李斯特&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;彼得拉克14行诗 第104</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;肖邦&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;马祖卡 A小调 作品17之4,</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;肖邦&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;马祖卡 F小调,作品7之3</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;肖邦&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;降A大调波兰舞曲 作品53</p><p><br/></p><p><br/></p>', null);
INSERT INTO `wx_activity` VALUES ('26', '恋爱中的肖邦', '厦门爱乐乐团肖邦钢琴协奏曲音乐会', null, '钢协', 'VIOLIN.JPG', '2015-07-11 19:00:59', '0', '鼓浪屿音乐厅', '鼓浪屿钢琴学校、厦门交响乐团', '<p>钢琴与管弦乐团的作品多半是肖邦在华沙音乐院时期的作品。第一钢琴协奏曲是肖邦早年为自己所写的作品。钢琴部分不但光辉灿烂而且浪漫，特别强调钢琴嘹亮的声音以及优雅的表现方式。定居巴黎后，肖邦的创作几乎都是钢琴独奏作品，扩展了这项乐器的表现力与深度，从这首早期的协奏曲里可以听到肖邦成熟时期的风貌。第二钢琴协奏曲表现的是肖邦对女同学爱恋的情感，是一首富于浪漫情趣的作品。</p><p><br/></p><p>Piano Concerto No.2 in F minor, op.21<br/></p><p>I. Maestoso<br/></p><p>II. Larghetto<br/></p><p>III. Allegro vivace<br/></p><p><br/></p><p>Pause<br/></p><p><br/></p><p>Piano Concerto No.1 in E minor, op.11</p><p>I. Allegro maestoso<br/></p><p>II. Romance (Larghetto)<br/></p><p>III. Rondo (Vivace)</p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;Lucida Grande&#39;, Tahoma, Verdana, Lucida, Arial, sans-serif; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255);\"></span></p>', null);

-- ----------------------------
-- Table structure for wx_admin
-- ----------------------------
DROP TABLE IF EXISTS `wx_admin`;
CREATE TABLE `wx_admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_admin
-- ----------------------------
INSERT INTO `wx_admin` VALUES ('1', 'admin', 'admin', null, '\0', null);
INSERT INTO `wx_admin` VALUES ('2', 'ab', 'a', null, '\0', null);
INSERT INTO `wx_admin` VALUES ('3', '1', '1', null, '', null);
INSERT INTO `wx_admin` VALUES ('4', 'abc', 'abc', '15-05-13 06:01:34', '\0', null);
INSERT INTO `wx_admin` VALUES ('5', 'qq', 'qq', '15-05-13 06:02:37', '\0', null);
INSERT INTO `wx_admin` VALUES ('6', '123', null, null, null, null);

-- ----------------------------
-- Table structure for wx_attention
-- ----------------------------
DROP TABLE IF EXISTS `wx_attention`;
CREATE TABLE `wx_attention` (
  `attentionId` int(11) NOT NULL AUTO_INCREMENT,
  `weixin` varchar(255) DEFAULT NULL,
  `activityId` int(11) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `boolSms` bit(1) DEFAULT NULL,
  PRIMARY KEY (`attentionId`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_attention
-- ----------------------------
INSERT INTO `wx_attention` VALUES ('12', '1', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('91', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('96', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('97', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '5', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('98', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '5', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('99', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '5', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('100', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '5', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('101', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('102', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('103', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('104', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '1', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('105', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '1', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('106', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '6', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('107', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '9', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('108', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '1', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('109', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '9', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('110', 'otz3Ms4xYUBPwzib5ZTacGa2o-dg', '23', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('111', 'oH8r4s-rU8Z6CxjgG9cFnBTG2Cxo', '24', '\0', null, '\0');
INSERT INTO `wx_attention` VALUES ('112', 'oH8r4s-rU8Z6CxjgG9cFnBTG2Cxo', '25', '', null, '\0');
INSERT INTO `wx_attention` VALUES ('113', 'oH8r4s-rU8Z6CxjgG9cFnBTG2Cxo', '25', '\0', null, '\0');

-- ----------------------------
-- Table structure for wx_guanzhu
-- ----------------------------
DROP TABLE IF EXISTS `wx_guanzhu`;
CREATE TABLE `wx_guanzhu` (
  `guanZhuiID` int(11) NOT NULL AUTO_INCREMENT,
  `weixin` varchar(255) DEFAULT NULL,
  `shoolId` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`guanZhuiID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_guanzhu
-- ----------------------------
INSERT INTO `wx_guanzhu` VALUES ('1', '1', '20-19-7-6-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('30', 'otz3Ms0T1RlhhqbT-Qj4dEEv-5xQ', '10-9-6-11-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('31', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', '12-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('33', 'otz3Ms2gtv51MKCjKd7J6uD03nhs', '12-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('34', 'otz3Ms4xYUBPwzib5ZTacGa2o-dg', '12', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('35', 'otz3Ms-8-150ZDYDVjD7qzv0tj3A', '12-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('36', 'otz3Ms53I9gck6NOmXNfJCs5p4E4', '12-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('37', 'oH8r4s-rU8Z6CxjgG9cFnBTG2Cxo', '12-13', '\0', null);
INSERT INTO `wx_guanzhu` VALUES ('38', 'oH8r4s1RJs695TV0L4kPzpwy2BTI', '12-13', '\0', null);

-- ----------------------------
-- Table structure for wx_school
-- ----------------------------
DROP TABLE IF EXISTS `wx_school`;
CREATE TABLE `wx_school` (
  `shoolId` int(11) NOT NULL AUTO_INCREMENT,
  `shoolName` varchar(50) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `shoolAdd` varchar(255) DEFAULT NULL,
  `schoolIcon` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shoolId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_school
-- ----------------------------
INSERT INTO `wx_school` VALUES ('6', '南京艺术学院', '3', '南京艺术学院', 'dalian-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('9', '中央音乐学院', '2', '中央音乐学院', 'guangxi-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('10', '上海音乐学院', '1', '上海音乐学院', 'jiefangjun-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('11', '云南艺术学院', '4', '云南艺术学院', 'jilin-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('12', '深圳艺术学校', '1', '深圳艺术学校', 'nanjing-icon.png', '\0', null);
INSERT INTO `wx_school` VALUES ('13', '厦门鼓浪屿钢琴学校', '6', '厦门鼓浪屿钢琴学校', 'shanghai-icon.png', '\0', null);
INSERT INTO `wx_school` VALUES ('14', '中国音乐学院', '4', '中国音乐学院', 'shanxi-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('15', '天津音乐学院', '7', '天津音乐学院', 'zhongguoy-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('16', '武汉音乐学院', '5', '武汉音乐学院', 'zhonggyangy-icon.png', '', null);
INSERT INTO `wx_school` VALUES ('17', '沈阳音乐学院', '8', '沈阳音乐学院', '', '', null);
INSERT INTO `wx_school` VALUES ('18', '西安音乐学院', '4', '西安音乐学院', '', '', null);
INSERT INTO `wx_school` VALUES ('19', '解放军艺术学院', '7', '解放军艺术学院', '', '', null);
INSERT INTO `wx_school` VALUES ('20', '山东艺术学院', '5', '山东艺术学院', '', '', null);
INSERT INTO `wx_school` VALUES ('21', '大连艺术学院', '8', '大连艺术学院', '', '', null);
INSERT INTO `wx_school` VALUES ('22', '测试', '2', '测试', '', '', null);

-- ----------------------------
-- Table structure for wx_shoolactivity
-- ----------------------------
DROP TABLE IF EXISTS `wx_shoolactivity`;
CREATE TABLE `wx_shoolactivity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityId` int(11) DEFAULT NULL,
  `shoolId` int(11) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_shoolactivity
-- ----------------------------
INSERT INTO `wx_shoolactivity` VALUES ('1', '1', '1', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('2', '2', '9', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('3', '1', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('4', '4', '6', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('5', '5', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('6', '6', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('7', '7', '7', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('8', '8', '7', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('9', '9', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('10', '10', '3', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('11', '11', '19', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('12', '12', '10', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('13', '13', '6', '', null);
INSERT INTO `wx_shoolactivity` VALUES ('14', '14', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('15', '15', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('16', '16', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('17', '17', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('18', '18', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('19', '19', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('20', '20', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('21', '21', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('22', '22', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('23', '23', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('24', '24', '12', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('25', '25', '13', '\0', null);
INSERT INTO `wx_shoolactivity` VALUES ('26', '26', '13', '\0', null);

-- ----------------------------
-- Table structure for wx_teacher
-- ----------------------------
DROP TABLE IF EXISTS `wx_teacher`;
CREATE TABLE `wx_teacher` (
  `teacherId` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `shoolId` int(11) DEFAULT NULL,
  `userAcount` varchar(255) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `booladmin` bit(1) DEFAULT NULL,
  `jingdu` varchar(255) DEFAULT NULL,
  `weidu` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `boolPass` bit(1) DEFAULT NULL,
  PRIMARY KEY (`teacherId`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_teacher
-- ----------------------------
INSERT INTO `wx_teacher` VALUES ('5', 'oH8r4s1RJs695TV0L4kPzpwy2BTI', '12', 'admin', '21232f297a57a5a743894a0e4a801fc3', '18381334402', '\0', '', '29.34053', '104.7629', null, 'File/20150507204718.jpg', '');
INSERT INTO `wx_teacher` VALUES ('29', 'otz3Ms7xu8Wbex56GedjQhZXZiPk', null, '18801212565', '202deac54bf62c6fe3e7512b0907cc29', '18801212565', '\0', '\0', '24.88809', '102.8243', null, null, '');
INSERT INTO `wx_teacher` VALUES ('28', 'otz3Ms0T1RlhhqbT-Qj4dEEv-5xQ', null, '18381334402', 'e10adc3949ba59abbe56e057f20f883e', '18381334402', '\0', '\0', '29.3405', '104.7628', null, '/File/20150604144847.jpg', '');
INSERT INTO `wx_teacher` VALUES ('30', 'otz3Ms53I9gck6NOmXNfJCs5p4E4', null, '15288431025', 'e10adc3949ba59abbe56e057f20f883e', '15288431025', '\0', '\0', null, null, null, null, '\0');
INSERT INTO `wx_teacher` VALUES ('27', 'otz3Ms4xYUBPwzib5ZTacGa2o-dg', null, '18610812565', '202deac54bf62c6fe3e7512b0907cc29', '18610812565', '\0', '\0', '24.88815', '102.8248', null, null, '\0');
INSERT INTO `wx_teacher` VALUES ('31', null, null, '15245169525', 'd20ba7a0efa95d6e0dc8a2298aba7b2b', '15245169525', '\0', '\0', null, null, null, null, '\0');
INSERT INTO `wx_teacher` VALUES ('32', 'oH8r4s-rU8Z6CxjgG9cFnBTG2Cxo', null, '15545173867', 'd20ba7a0efa95d6e0dc8a2298aba7b2b', '15545173867', '\0', '\0', null, null, null, null, '\0');

-- ----------------------------
-- Table structure for wx_weixin
-- ----------------------------
DROP TABLE IF EXISTS `wx_weixin`;
CREATE TABLE `wx_weixin` (
  `weixinid` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL,
  `boolDel` bit(1) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`weixinid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wx_weixin
-- ----------------------------
