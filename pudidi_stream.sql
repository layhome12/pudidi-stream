/*
 Navicat Premium Data Transfer

 Source Server         : mysql_pc
 Source Server Type    : MySQL
 Source Server Version : 50647
 Source Host           : localhost:3306
 Source Schema         : pudidi_stream

 Target Server Type    : MySQL
 Target Server Version : 50647
 File Encoding         : 65001

 Date: 02/12/2021 23:05:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'Indonesia', NULL, NULL);
INSERT INTO `country` VALUES (2, 'Malaysia', NULL, NULL);
INSERT INTO `country` VALUES (3, 'Singapore', NULL, NULL);
INSERT INTO `country` VALUES (4, 'Thailand', NULL, NULL);
INSERT INTO `country` VALUES (5, 'Japanese', NULL, NULL);
INSERT INTO `country` VALUES (6, 'English', NULL, NULL);
INSERT INTO `country` VALUES (7, 'American', NULL, NULL);

-- ----------------------------
-- Table structure for history_dilihat
-- ----------------------------
DROP TABLE IF EXISTS `history_dilihat`;
CREATE TABLE `history_dilihat`  (
  `history_dilihat_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_id` int(11) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`history_dilihat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of history_dilihat
-- ----------------------------
INSERT INTO `history_dilihat` VALUES (3, 1, 25, '2021-11-28 20:45:03', NULL);
INSERT INTO `history_dilihat` VALUES (4, 1, 30, '2021-11-28 20:44:22', NULL);
INSERT INTO `history_dilihat` VALUES (5, 1, 27, '2021-11-28 20:45:57', NULL);
INSERT INTO `history_dilihat` VALUES (6, 1, 32, '2021-11-28 21:02:36', NULL);
INSERT INTO `history_dilihat` VALUES (7, 1, 26, '2021-11-28 18:05:39', NULL);
INSERT INTO `history_dilihat` VALUES (8, 1, 28, '2021-11-28 21:11:04', NULL);
INSERT INTO `history_dilihat` VALUES (9, 1, 31, '2021-11-28 21:18:45', NULL);
INSERT INTO `history_dilihat` VALUES (10, 1, 29, '2021-11-28 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (11, 1, 27, '2021-11-29 09:26:41', NULL);
INSERT INTO `history_dilihat` VALUES (12, 26, 32, '2021-11-29 09:41:24', NULL);
INSERT INTO `history_dilihat` VALUES (13, 1, 32, '2021-11-29 09:33:36', NULL);
INSERT INTO `history_dilihat` VALUES (14, 26, 29, '2021-11-29 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (15, 26, 31, '2021-11-29 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (16, 26, 26, '2021-11-29 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (17, 26, 27, '2021-11-30 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (18, 26, 25, '2021-12-01 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (19, 1, 31, '2021-12-02 08:52:24', NULL);
INSERT INTO `history_dilihat` VALUES (20, 1, 32, '2021-12-02 08:51:48', NULL);
INSERT INTO `history_dilihat` VALUES (21, 1, 29, '2021-12-02 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (22, 1, 30, '2021-12-02 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (23, 1, 33, '2021-12-02 00:00:00', NULL);
INSERT INTO `history_dilihat` VALUES (24, 1, 28, '2021-12-02 09:26:32', NULL);

-- ----------------------------
-- Table structure for history_user
-- ----------------------------
DROP TABLE IF EXISTS `history_user`;
CREATE TABLE `history_user`  (
  `history_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `user_level_id` int(11) NULL DEFAULT NULL,
  `history_icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `history_action` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `history_keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`history_user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of history_user
-- ----------------------------
INSERT INTO `history_user` VALUES (1, 1, 1, 'fa fa-delete', 'Delete', 'DELETE FROM `video_slide`\nWHERE `video_slide_id` = \'9\'', '2021-12-02 09:56:29', NULL);
INSERT INTO `history_user` VALUES (2, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video_genre` SET `video_genre_nama` = \'Anime\', `video_genre_seo` = \'anime\', `updated_time` = \'2021-12-02 09:58:46\'\nWHERE `video_genre_id` = \'3\'', '2021-12-02 09:58:46', NULL);
INSERT INTO `history_user` VALUES (3, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video_genre` SET `video_genre_nama` = \'Romance\', `video_genre_seo` = \'romance\', `updated_time` = \'2021-12-02 09:59:11\'\nWHERE `video_genre_id` = \'4\'', '2021-12-02 09:59:11', NULL);
INSERT INTO `history_user` VALUES (4, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_genre_id` = \'4\', `video_nama` = \'Nella Kharisma - Sayur Kol\', `video_rating` = \'8.2\', `video_tahun` = \'2020\', `video_genre` = \'[\\\"4\\\"]\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\', `updated_time` = \'2021-12-02 09:59:42\'\nWHERE `video_id` = \'28\'', '2021-12-02 09:59:42', NULL);
INSERT INTO `history_user` VALUES (5, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-12-02 09:59:55', '2021-12-02 09:59:55', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(11) NULL DEFAULT NULL,
  `country_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_tgl_lahir` date NULL DEFAULT NULL,
  `kode_otp` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` int(11) NULL DEFAULT 0,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, '1', 'admin@gmail.com', '$2y$10$low5o1PKvDk17fmC3UzVXOqEoMnDC9yQRI2wCktfEI5chdAPR9HDC', 'Admin', '1637847518_f94e6b1f8c46f5a03cc6.jpeg', '2021-11-14', '529108', 1, NULL, NULL);
INSERT INTO `user` VALUES (26, 2, '1', 'ilhamnm12@gmail.com', '$2y$10$g3ZcWWPVenkbeExGvCxf7OHpkriGOPzpO.1tf/b9AlxFg8bnX1wuG', 'Ilham NM', NULL, '2000-02-02', '251507', 1, NULL, NULL);

-- ----------------------------
-- Table structure for user_favorit
-- ----------------------------
DROP TABLE IF EXISTS `user_favorit`;
CREATE TABLE `user_favorit`  (
  `user_favorit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_id` int(11) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_favorit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES (1, 'Administrator', NULL, NULL);
INSERT INTO `user_level` VALUES (2, 'Users', NULL, NULL);

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video`  (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NULL DEFAULT NULL,
  `video_genre_id` int(11) NULL DEFAULT NULL,
  `video_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `video_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_rating` float(2, 1) NULL DEFAULT NULL,
  `video_dilihat` int(11) NULL DEFAULT 0,
  `is_draft` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES (25, 5, 3, 'Sayonara Arigatou', '2017', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637506895_e7515660989c82f24604.mp4', '1637506984_b40952d4ac7981222cea.vtt', NULL, '[\"3\"]', 9.5, 17, '0', NULL, '2021-11-28 20:46:51');
INSERT INTO `video` VALUES (26, 5, 3, 'Hatsune Miku - Levan Polka', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587131_b6d77b9176b04b47be5e.mp4', NULL, NULL, '[\"4\"]', 7.4, 10, '0', NULL, '2021-11-28 20:46:40');
INSERT INTO `video` VALUES (27, 1, 4, 'Yowis Ben', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587445_db8e61d65995e9dbcaeb.mp4', NULL, NULL, '[\"5\"]', 9.2, 122, '0', NULL, '2021-11-28 21:09:29');
INSERT INTO `video` VALUES (28, 1, 4, 'Nella Kharisma - Sayur Kol', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587508_a142583515af116e4438.mp4', NULL, NULL, '[\"4\"]', 8.2, 11, '0', NULL, '2021-12-02 09:59:42');
INSERT INTO `video` VALUES (29, 7, 5, 'Tobu - Calling', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587632_7b5b52acd0343f749ccc.mp4', NULL, NULL, '[\"5\"]', 9.3, 9, '0', NULL, '2021-12-02 09:54:50');
INSERT INTO `video` VALUES (30, 7, 5, 'Tobu   Wholm', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587656_a63048bdec345150ad08.mp4', NULL, NULL, '[\"5\"]', 8.4, 6, '0', NULL, '2021-12-02 09:54:25');
INSERT INTO `video` VALUES (31, 7, 5, 'Kygo-Give me a sign', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637765658_9353520110f692a4cd2b.mp4', NULL, NULL, '[\"5\"]', 9.3, 8, '0', NULL, '2021-12-02 09:54:04');
INSERT INTO `video` VALUES (32, 5, 3, 'Yousa - Japanese Version', '2021', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1638111924_a07f2054e28dc7e5d826.mp4', NULL, NULL, '[\"4\",\"3\"]', 9.5, 55, '0', '2021-11-28 09:05:28', '2021-11-28 21:02:32');

-- ----------------------------
-- Table structure for video_genre
-- ----------------------------
DROP TABLE IF EXISTS `video_genre`;
CREATE TABLE `video_genre`  (
  `video_genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_genre_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_genre_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_genre_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_genre_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video_genre
-- ----------------------------
INSERT INTO `video_genre` VALUES (3, 'Anime', NULL, 'anime', NULL, '2021-12-02 09:58:46');
INSERT INTO `video_genre` VALUES (4, 'Romance', NULL, 'romance', NULL, '2021-12-02 09:59:11');
INSERT INTO `video_genre` VALUES (5, 'Barat', NULL, 'barat', NULL, NULL);

-- ----------------------------
-- Table structure for video_komentar
-- ----------------------------
DROP TABLE IF EXISTS `video_komentar`;
CREATE TABLE `video_komentar`  (
  `video_komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_komentar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_komentar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video_komentar
-- ----------------------------
INSERT INTO `video_komentar` VALUES (32, 32, 26, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2021-11-29 09:15:11', NULL);
INSERT INTO `video_komentar` VALUES (36, 32, 1, 'Mwehehehehe', '2021-11-29 09:33:53', NULL);
INSERT INTO `video_komentar` VALUES (37, 29, 26, 'Jasa joki website profesional.. \r\nHubungi layhome12@gmail.com', '2021-11-29 09:37:09', NULL);
INSERT INTO `video_komentar` VALUES (38, 27, 26, 'Butuh Jasa web profesional..?? Hubungi layhome12@gmail.com', '2021-11-30 08:24:20', NULL);
INSERT INTO `video_komentar` VALUES (39, 31, 1, 'Test', '2021-12-02 08:47:06', NULL);
INSERT INTO `video_komentar` VALUES (40, 33, 1, 'Testts', '2021-12-02 08:58:57', NULL);

-- ----------------------------
-- Table structure for video_rating
-- ----------------------------
DROP TABLE IF EXISTS `video_rating`;
CREATE TABLE `video_rating`  (
  `video_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `video_rating` int(11) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_rating_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for video_review
-- ----------------------------
DROP TABLE IF EXISTS `video_review`;
CREATE TABLE `video_review`  (
  `video_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `video_review_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_review_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_review_isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `video_review_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_review_dilihat` int(11) NULL DEFAULT 0,
  `is_public` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_review_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video_review
-- ----------------------------
INSERT INTO `video_review` VALUES (3, 25, 'Apa Maksut Dari Sayonara Arigatou ?? Ask Movies !', 'apa-maksut-dari-sayonara-arigatou-ask-movies', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1638101469_466dbf6ad29cab380ae5.jpg', 0, '1', '2021-11-28 06:11:10', '2021-11-28 09:04:21');
INSERT INTO `video_review` VALUES (4, 27, 'Yowes Ben Serialnya Apakah Berhenti ?? Ask Movies !', 'yowes-ben-serialnya-apakah-berhenti-ask-movies', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '1638103545_4b38b7a831e1c5498e5f.jpg', 0, '1', '2021-11-28 06:45:45', '2021-11-28 06:46:24');

-- ----------------------------
-- Table structure for video_slide
-- ----------------------------
DROP TABLE IF EXISTS `video_slide`;
CREATE TABLE `video_slide`  (
  `video_slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `video_slide_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_slide_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_slide_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of video_slide
-- ----------------------------
INSERT INTO `video_slide` VALUES (5, 26, 'Hasune Mitsu', NULL, '2021-11-26 08:26:17', '2021-11-27 21:55:35');
INSERT INTO `video_slide` VALUES (6, 27, 'Bayu Skak', NULL, '2021-11-26 08:26:47', '2021-11-27 21:56:23');
INSERT INTO `video_slide` VALUES (7, 31, 'Colour Full', NULL, '2021-11-26 08:27:30', '2021-11-28 02:35:26');
INSERT INTO `video_slide` VALUES (8, 25, 'Love Anime', NULL, '2021-11-26 08:48:17', NULL);

SET FOREIGN_KEY_CHECKS = 1;
