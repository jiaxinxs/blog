/*
Student: JIAXIN YAN, MENG LI, ALLAN TORRES
Date modified: Dec 02, 2023
Description: CST8285 ASSIGNMENT2 FILE

Source Server         : Mysql5.7
Source Schema         : blog
*/

-- Database: `blog` and php web application user
CREATE DATABASE blog;
GRANT USAGE ON *.* TO 'root'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON blog.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

USE blog;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


-- Table structure for blog_user
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `password` varchar(255) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;


-- Records of blog_user
INSERT INTO `blog_user` VALUES (11, 'jiaxinyan', 'jiaxinyan@gmail.com', 'Jiaxinyan', '2023-11-30 15:34:04');
INSERT INTO `blog_user` VALUES (12, 'mengli', 'mengli@gmail.com', 'Mengli00', '2023-12-01 00:32:43');
INSERT INTO `blog_user` VALUES (13, 'allantorres', 'allantorres@gmail.com', 'Allantorres', '2023-12-01 00:49:04');


-- Table structure for blog_article
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NULL DEFAULT NULL COMMENT 'UserID',
  `uname` varchar(255) NULL DEFAULT NULL COMMENT 'UserName',
  `username` varchar(255) NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `content` longtext NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;


-- Records of blog_article
INSERT INTO `blog_article` VALUES (11, 11, 'jiaxinyan', 'jiaxinyan', 'Embracing Change: A Journey to Self-Discovery and Growth', 'Change is an inevitable part of life, offering opportunities for self-discovery and personal growth. Embracing uncertainty and stepping outside our comfort zones are essential for unlocking our true potential. Through acceptance and adaptability, we commit to a journey of continuous self-improvement, leading to a brighter and more empowered future.', '2023-11-30 23:28:46');
INSERT INTO `blog_article` VALUES (12, 11, 'jiaxinyan', 'jiaxinyan', "Finding Serenity in Chaos: Navigating Life's Turbulence", "In the midst of life's chaos, finding serenity becomes an art of navigation, allowing us to discover strength in adversity. Embracing challenges as opportunities for growth transforms hurdles into stepping stones toward personal evolution. By cultivating resilience and adapting to the unpredictable currents, we not only survive but thrive in the ever-changing landscape of our lives.", '2023-11-30 23:28:57');
INSERT INTO `blog_article` VALUES (13, 12, 'mengli', 'mengli', "The Power of Resilience: Thriving Amidst Life's Stormd", 'Resilience is the cornerstone of a fulfilling life, empowering us to not only weather the storms but thrive in their midst. Embracing adversity as a teacher, we learn valuable lessons that propel us towards personal growth and self-discovery. Through a resilient mindset, we not only bounce back from challenges but use them as catalysts for transformation, creating a narrative of strength, wisdom, and triumph.', '2023-12-02 13:25:49');
INSERT INTO `blog_article` VALUES (14, 12, 'mengli', 'mengli', 'Navigating Uncertainty: Embracing the Journey of Personal Evolution', "Life's journey is an ever-changing landscape, and within the folds of uncertainty lies the canvas of our personal evolution. Embracing the unknown as a canvas for growth, we sculpt resilience by facing challenges head-on, fostering a profound sense of self-discovery. In the tapestry of transformation, each twist and turn becomes an opportunity to shape a more resilient and empowered version of ourselves. Through the art of embracing uncertainty, we not only navigate life's unpredictable terrain but also unveil the masterpiece of our own continuous evolution.", '2023-12-02 13:25:49');
INSERT INTO `blog_article` VALUES (15, 13, 'allantorres', 'allantorres', 'Unleashing Potential: The Transformative Dance of Change', "Change is the rhythm of life, and within its dance, we find the keys to unlocking our untapped potential. Embracing the fluidity of transformation, we navigate the choreography of challenges, discovering resilience and self-discovery with each graceful step. In the face of uncertainty, our ability to adapt becomes a powerful tool, reshaping setbacks into opportunities for growth. The transformative dance of change is not a performance but a lifelong journey, where we continually evolve, embracing the beauty of our own becoming.", '2023-12-02 13:25:49');
INSERT INTO `blog_article` VALUES (16, 13, 'allantorres', 'allantorres', "Embracing Impermanence: A Symphony of Growth in Life's Flux", 'Life, like a symphony, is a dynamic interplay of melodies and dissonances. Embracing impermanence becomes our guide, as we find harmony in the constant flux of experiences. Each note of change contributes to the composition of our personal evolution, fostering resilience and unveiling the beauty of continuous growth. By accepting the transient nature of existence, we become conductors of our destinies, orchestrating a symphony that resonates with the rhythm of our own transformative journey. ', '2023-12-02 13:25:49');


-- Table structure for blog_comment
DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NULL DEFAULT NULL,
  `article_id` int(11) NULL DEFAULT NULL,
  `content` varchar(1000)  NULL DEFAULT NULL,
  `name` varchar(255) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `createtime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- Records of blog_comment
INSERT INTO `blog_comment` VALUES (11, 11, 11, 'Loved these blogs! They really nail what it takes to grow and stay strong.', 'mango', 'mango@gmail.com', '2023-11-30 23:52:02');
INSERT INTO `blog_comment` VALUES (12, 12, 13, 'Easy to read and makes you feel good. Awesome advice for a positive mindset', 'peach', 'peach@gmail.com', '2023-11-30 23:52:03');
INSERT INTO `blog_comment` VALUES (13, 13, 15, "The author's articulate style weaves wisdom seamlessly, inspiring a positive mindset.", 'mint', 'mint@gmail.com', '2023-11-30 23:52:03');


SET FOREIGN_KEY_CHECKS = 1;
