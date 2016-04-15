/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50147
Source Host           : localhost:3306
Source Database       : neoplayer

Target Server Type    : MYSQL
Target Server Version : 50147
File Encoding         : 65001

Date: 2015-10-02 17:12:16
*/

CREATE DATABASE neoplayer;
USE neoplayer;
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `episode`
-- ----------------------------
DROP TABLE IF EXISTS `episode`;
CREATE TABLE `episode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `number` int(11) NOT NULL,
  `duration` time NOT NULL,
  `listenNumber` int(11) NOT NULL DEFAULT '0',
  `description` varchar(3000) DEFAULT NULL,
  `fileName` varchar(150) NOT NULL,
  `idSaison` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idSaison`),
  KEY `fk_saison3_idx` (`idSaison`),
  CONSTRAINT `fk_saison3` FOREIGN KEY (`idSaison`) REFERENCES `saison` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of episode
-- ----------------------------
INSERT INTO `episode` VALUES ('1', 'Episode 01', '1', '01:05:00', '0', 'FDFDFDF', 'toto.mp3', '1');
INSERT INTO `episode` VALUES ('2', 'Episode 01', '1', '01:05:00', '0', 'FDFDFDF', 'tata.mp3', '1');
INSERT INTO `episode` VALUES ('3', 'Episode 01', '1', '00:00:00', '0', 'FDFDFDF', '', '1');

-- ----------------------------
-- Table structure for `episode_ranking`
-- ----------------------------
DROP TABLE IF EXISTS `episode_ranking`;
CREATE TABLE `episode_ranking` (
  `idUser` int(11) NOT NULL,
  `idEpisode` int(11) NOT NULL,
  `rank` decimal(1,0) NOT NULL,
  PRIMARY KEY (`idUser`,`idEpisode`),
  KEY `fk_episode_idx` (`idEpisode`),
  CONSTRAINT `fk_episode` FOREIGN KEY (`idEpisode`) REFERENCES `episode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user4` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of episode_ranking
-- ----------------------------

-- ----------------------------
-- Table structure for `genre`
-- ----------------------------
DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of genre
-- ----------------------------
INSERT INTO `genre` VALUES ('1', 'Fantastique');
INSERT INTO `genre` VALUES ('2', 'Thriller');

-- ----------------------------
-- Table structure for `library`
-- ----------------------------
DROP TABLE IF EXISTS `library`;
CREATE TABLE `library` (
  `idUser` varchar(150) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idPodcast`),
  KEY `fk_podcast3_idx` (`idPodcast`),
  CONSTRAINT `fk_podcast3` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of library
-- ----------------------------
INSERT INTO `library` VALUES ('6', '6');

-- ----------------------------
-- Table structure for `podcast`
-- ----------------------------
DROP TABLE IF EXISTS `podcast`;
CREATE TABLE `podcast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idGenre`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `genre_idx` (`idGenre`),
  CONSTRAINT `genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of podcast
-- ----------------------------
INSERT INTO `podcast` VALUES ('1', 'Naheulbeuk', 'img/podcast/thumb1.jpg', 'Le donjon de Naheulbeuk', '1');
INSERT INTO `podcast` VALUES ('6', 'Living Water', 'img/podcast/thumb2.jpg', '', '2');
INSERT INTO `podcast` VALUES ('8', 'Zachtronics', 'img/podcast/thumb3.jpg', null, '1');
INSERT INTO `podcast` VALUES ('9', 'Green Roomers', 'img/podcast/thumb4.jpg', null, '2');
INSERT INTO `podcast` VALUES ('11', 'So Crave', 'img/podcast/thumb5.jpg', null, '2');

-- ----------------------------
-- Table structure for `podcast_ranking`
-- ----------------------------
DROP TABLE IF EXISTS `podcast_ranking`;
CREATE TABLE `podcast_ranking` (
  `idUser` int(11) NOT NULL,
  `idPodcast` int(11) NOT NULL,
  `rank` decimal(1,0) NOT NULL,
  PRIMARY KEY (`idUser`,`idPodcast`),
  KEY `fk_podcast_idx` (`idPodcast`),
  CONSTRAINT `fk_podcast` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of podcast_ranking
-- ----------------------------

-- ----------------------------
-- Table structure for `saison`
-- ----------------------------
DROP TABLE IF EXISTS `saison`;
CREATE TABLE `saison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `releaseDate` date DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `idPodcast` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idPodcast`),
  KEY `fk_podcast_idx` (`idPodcast`),
  CONSTRAINT `fk_podcast2` FOREIGN KEY (`idPodcast`) REFERENCES `podcast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of saison
-- ----------------------------
INSERT INTO `saison` VALUES ('1', 'Saison', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');
INSERT INTO `saison` VALUES ('2', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '6');
INSERT INTO `saison` VALUES ('3', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');
INSERT INTO `saison` VALUES ('4', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');
INSERT INTO `saison` VALUES ('6', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');
INSERT INTO `saison` VALUES ('7', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');
INSERT INTO `saison` VALUES ('9', 'Saison2', '2010-10-09', 'http://fdfdfd.fr/dd.jpg', 'FDFDFDF', '1');

-- ----------------------------
-- Table structure for `saison_ranking`
-- ----------------------------
DROP TABLE IF EXISTS `saison_ranking`;
CREATE TABLE `saison_ranking` (
  `idUser` int(11) NOT NULL,
  `idSaison` int(11) NOT NULL,
  `rank` decimal(1,0) NOT NULL,
  PRIMARY KEY (`idUser`,`idSaison`),
  KEY `fk_saison2_idx` (`idSaison`),
  CONSTRAINT `fk_saison2` FOREIGN KEY (`idSaison`) REFERENCES `saison` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of saison_ranking
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('6', 'armandemail', 'f71dbe52628a3f83a77ab494817525c6', 'szypura', 'armand');
INSERT INTO `user` VALUES ('9', 'armandemail2', 'f71dbe52628a3f83a77ab494817525c6', 'szypura', 'armand');

-- ----------------------------
-- Table structure for `user_episode_position`
-- ----------------------------
DROP TABLE IF EXISTS `user_episode_position`;
CREATE TABLE `user_episode_position` (
  `idUser` int(11) NOT NULL,
  `idEpisode` int(11) NOT NULL,
  `offset` time NOT NULL,
  PRIMARY KEY (`idUser`,`idEpisode`),
  KEY `fk_episode3_idx` (`idEpisode`),
  KEY `fk_episode4_idx` (`idEpisode`),
  CONSTRAINT `fk_user5` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_episode4` FOREIGN KEY (`idEpisode`) REFERENCES `episode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_episode_position
-- ----------------------------
INSERT INTO `user_episode_position` VALUES ('6', '1', '00:02:20');
INSERT INTO `user_episode_position` VALUES ('6', '2', '00:00:01');
INSERT INTO `user_episode_position` VALUES ('6', '3', '00:02:20');
