/*
 Navicat Premium Data Transfer

 Source Server         : mysql_pc
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : pudidi_stream

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 25/11/2021 22:29:05
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
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'Indonesia', NULL, NULL);
INSERT INTO `country` VALUES (2, 'Malaysia', NULL, NULL);
INSERT INTO `country` VALUES (3, 'Singapore', NULL, NULL);
INSERT INTO `country` VALUES (4, 'Thailand', NULL, NULL);
INSERT INTO `country` VALUES (5, 'Japanese', NULL, NULL);

-- ----------------------------
-- Table structure for history_dilihat
-- ----------------------------
DROP TABLE IF EXISTS `history_dilihat`;
CREATE TABLE `history_dilihat`  (
  `history_dilihat_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_id` int(11) NULL DEFAULT NULL,
  `history_dilihat` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`history_dilihat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 198 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history_user
-- ----------------------------
INSERT INTO `history_user` VALUES (59, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637468735_004505b710af2a1fab14.mp4\', `video_nama` = \'E:\\\\OpenServer\\\\userdata\\\\php_upload\\\\phpD9D2\'\nWHERE `video_id` = \'1\'', '2021-11-20 22:25:35', NULL);
INSERT INTO `history_user` VALUES (60, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'Dj Reggae slow terbaru 2019 - YouTube.mp4\', `video_nama` = \'E:\\\\OpenServer\\\\userdata\\\\php_upload\\\\phpAC57\'\nWHERE `video_id` = \'1\'', '2021-11-20 22:29:46', NULL);
INSERT INTO `history_user` VALUES (61, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637469031_fddd7c6174acd5db5212.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-20 22:30:31', NULL);
INSERT INTO `history_user` VALUES (62, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637469065_998220566e0614087575.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-20 22:31:06', NULL);
INSERT INTO `history_user` VALUES (63, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637469605_e5ec58244ba489f9ecd5.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-20 22:40:06', NULL);
INSERT INTO `history_user` VALUES (64, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-21 01:31:16', '2021-11-21 01:31:16', NULL);
INSERT INTO `history_user` VALUES (65, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484720_59afbf571aac380cc598.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:52:01', NULL);
INSERT INTO `history_user` VALUES (66, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484758_85056d57698648ec1aea.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:52:38', NULL);
INSERT INTO `history_user` VALUES (67, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484810_a35931a8e0a296456dbe.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:53:30', NULL);
INSERT INTO `history_user` VALUES (68, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484884_11d0e17ae3bd1d3617bf.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:54:45', NULL);
INSERT INTO `history_user` VALUES (69, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484919_eff16a92656cfefdcaf7.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:55:19', NULL);
INSERT INTO `history_user` VALUES (70, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637484950_37c852492300ea3b18de.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 02:55:50', NULL);
INSERT INTO `history_user` VALUES (71, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637485340_b6931f8f8cf295165207.mp4\', `video_nama` = \'05.NGOBAR#15 - Membuat Fitur SEARCHING pada PAGINATION menggunakan CODEIGNITER 3 dan BOOTSTRAP 4\'\nWHERE `video_id` = \'1\'', '2021-11-21 03:02:20', NULL);
INSERT INTO `history_user` VALUES (72, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637485971_a6827d9115dff3fe1a14.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 03:12:51', NULL);
INSERT INTO `history_user` VALUES (73, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637486017_78bae84dd5d63306358e.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 03:13:40', NULL);
INSERT INTO `history_user` VALUES (74, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637486068_fd89bd3ef9e2cc4d684d.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'1\'', '2021-11-21 03:14:28', NULL);
INSERT INTO `history_user` VALUES (75, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637487118_c61e81d8b8d215221a36.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-21 03:31:58', NULL);
INSERT INTO `history_user` VALUES (76, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637487352_372a86d8db5758ca039e.mp4\', \'Dj Thai Mi Muneca Remixs - YouTube\')', '2021-11-21 03:35:53', NULL);
INSERT INTO `history_user` VALUES (77, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637487403_2b1f8fd20f96c0ec4ff5.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 03:36:43', NULL);
INSERT INTO `history_user` VALUES (78, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637488601_a2a3471cf5d911745c6a.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-21 03:56:41', NULL);
INSERT INTO `history_user` VALUES (79, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637489753_7a957f2fe1e640a276cb.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:15:54', NULL);
INSERT INTO `history_user` VALUES (80, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637489904_e27d85de55264c74ad96.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:18:25', NULL);
INSERT INTO `history_user` VALUES (81, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637490022_70440e8f454ff9995039.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:20:22', NULL);
INSERT INTO `history_user` VALUES (82, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637490359_0b4edf99f74513e6a74f.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:25:59', NULL);
INSERT INTO `history_user` VALUES (83, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637490735_f12a4b23a7e29b42d1ae.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:32:15', NULL);
INSERT INTO `history_user` VALUES (84, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637490917_eb3ed2c062cad9079246.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:35:17', NULL);
INSERT INTO `history_user` VALUES (85, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637491080_8738dc8f91a6d62dd537.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:38:00', NULL);
INSERT INTO `history_user` VALUES (86, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637491149_2ade88d5599500b4b2c4.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 04:39:10', NULL);
INSERT INTO `history_user` VALUES (87, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637491171_8fc763b4ea49ecd0f1fa.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-21 04:39:31', NULL);
INSERT INTO `history_user` VALUES (88, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637491212_c59a68788e1bacf9051d.mp4\', `video_nama` = \'Dj Reggae slow terbaru 2019 - YouTube\'\nWHERE `video_id` = \'9\'', '2021-11-21 04:40:13', NULL);
INSERT INTO `history_user` VALUES (89, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637492633_affafd176b60046e667e.mp4\', \'Rasa Yang Tertinggal - ST12 Cover Reggae SKA - YouTube\')', '2021-11-21 05:03:54', NULL);
INSERT INTO `history_user` VALUES (90, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637492705_15b86402c718d3e1f256.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 05:05:06', NULL);
INSERT INTO `history_user` VALUES (91, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637492739_65dc6b5a95105267489f.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-21 05:05:39', NULL);
INSERT INTO `history_user` VALUES (92, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637493714_d5052ff35e5e283568b4.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'7\'', '2021-11-21 05:21:55', NULL);
INSERT INTO `history_user` VALUES (93, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637494206_2695593b3986b74dc6e1.mp4\', `video_nama` = \'01.10 Hal Baru di CODEIGNITER 4 (Yang Harus Kalian Ketahui)\'\nWHERE `video_id` = \'7\'', '2021-11-21 05:30:06', NULL);
INSERT INTO `history_user` VALUES (94, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637498974_d9ea4ee42ca60834fe08.mp4\', \'Dj Thai Mi Muneca Remixs - YouTube\')', '2021-11-21 06:49:35', NULL);
INSERT INTO `history_user` VALUES (95, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637499252_2ea59c287bfef16dbcb0.mp4\', \'Rasa Yang Tertinggal - ST12 Cover Reggae SKA - YouTube\')', '2021-11-21 06:54:12', NULL);
INSERT INTO `history_user` VALUES (96, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637499354_9659f683cd37a0e7dc8b.mp4\', \'Reggae Instrumental - -Dubwise- - YouTube\')', '2021-11-21 06:55:54', NULL);
INSERT INTO `history_user` VALUES (97, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637499409_6faa05130ad7083d3739.mp4\', \'Reggae Instrumental - -Dubwise- - YouTube\')', '2021-11-21 06:56:50', NULL);
INSERT INTO `history_user` VALUES (98, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637499839_662f619224f0292fdbeb.mp4\', \'Dj Reggae slow terbaru 2019 - YouTube\')', '2021-11-21 07:03:59', NULL);
INSERT INTO `history_user` VALUES (99, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637500111_b71016338a0aa807a25e.mp4\', \'Dj Thai Mi Muneca Remixs - YouTube\')', '2021-11-21 07:08:31', NULL);
INSERT INTO `history_user` VALUES (100, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\', `video_tahun` = \'2020\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637502139_443006531077aa8947cc.vtt\'\nWHERE `video_id` = \'17\'', '2021-11-21 07:42:20', NULL);
INSERT INTO `history_user` VALUES (101, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637502255_7b3ff9a0366bccb2b7b9.mp4\', `video_nama` = \'Hello (OMFG) Version Reggae (DeejayNoz) - YouTube\'\nWHERE `video_id` = \'17\'', '2021-11-21 07:44:15', NULL);
INSERT INTO `history_user` VALUES (102, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Hello (OMFG) Version Reggae (DeejayNoz) - YouTube.MP4\', `video_tahun` = \'2020\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637502343_2c379d332e9d8547b961.png\', `video_subtitle` = \'1637502343_1f71b3ce4723ecad3087.vtt\'\nWHERE `video_id` = \'17\'', '2021-11-21 07:45:43', NULL);
INSERT INTO `history_user` VALUES (103, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Hello (OMFG) Version Reggae (DeejayNoz) - YouTube.MP4\', `video_tahun` = \'2020\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = 0\nWHERE `video_id` = \'17\'', '2021-11-21 07:49:13', NULL);
INSERT INTO `history_user` VALUES (104, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Hello (OMFG) Version Reggae (DeejayNoz) - YouTube.MP4\', `video_tahun` = \'2020\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'17\'', '2021-11-21 07:50:04', NULL);
INSERT INTO `history_user` VALUES (105, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637502702_bd4eeb0438b1beece8c3.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 07:51:42', NULL);
INSERT INTO `history_user` VALUES (106, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637502877_91dc367129113f651615.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 07:54:37', NULL);
INSERT INTO `history_user` VALUES (107, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637503027_62872c903ca86549f044.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 07:57:08', NULL);
INSERT INTO `history_user` VALUES (108, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637503232_d050d6e16a3b82de62a5.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 08:00:32', NULL);
INSERT INTO `history_user` VALUES (109, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637503728_a2195aecdcdb5f521312.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 08:08:48', NULL);
INSERT INTO `history_user` VALUES (110, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Tobu - Calling - YouTube\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637503780_6a07f4167ce3e5c64cd3.png\', `video_subtitle` = \'1637503780_98128f3a3a14ee52fe78.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'22\'', '2021-11-21 08:09:40', NULL);
INSERT INTO `history_user` VALUES (111, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Tobu - Calling - YouTube\', `video_tahun` = \'2021\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'22\'', '2021-11-21 08:10:01', NULL);
INSERT INTO `history_user` VALUES (112, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637503825_ce866fbe8003b5834fce.mp4\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube\'\nWHERE `video_id` = \'22\'', '2021-11-21 08:10:25', NULL);
INSERT INTO `history_user` VALUES (113, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Dj Thai Mi Muneca Remixs - YouTube.mp4\', `video_tahun` = \'2021\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637503840_e9c456d24ccaf22a3d2e.png\', `is_draft` = \'0\'\nWHERE `video_id` = \'22\'', '2021-11-21 08:10:40', NULL);
INSERT INTO `history_user` VALUES (114, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637503860_777e3978937c70d73c7c.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 08:11:00', NULL);
INSERT INTO `history_user` VALUES (115, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Tobu - Calling - YouTube.MP4\', `video_tahun` = \'2021\', `country_id` = \'2\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637503881_a9eea948c2b8d246fab2.png\', `video_subtitle` = \'1637503881_e11fd8f870a789ba38ee.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'23\'', '2021-11-21 08:11:22', NULL);
INSERT INTO `history_user` VALUES (116, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637505055_30753024ddd64533e501.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-21 08:30:55', NULL);
INSERT INTO `history_user` VALUES (117, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Tobu - Calling - YouTube.MP4\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637505078_fb6f21cf82779d1caae2.png\', `video_subtitle` = \'1637505078_7c73c67b2d4022d7a7d3.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'24\'', '2021-11-21 08:31:18', NULL);
INSERT INTO `history_user` VALUES (118, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637505149_d816200c947fcf3bce41.mp4\', `video_nama` = \'Alan Walker - Alone - YouTube\'\nWHERE `video_id` = \'24\'', '2021-11-21 08:32:29', NULL);
INSERT INTO `history_user` VALUES (119, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637505244_79ead333ea4bb4264f0d.mp4\', `video_nama` = \'Tobu - Calling - YouTube\'\nWHERE `video_id` = \'24\'', '2021-11-21 08:34:04', NULL);
INSERT INTO `history_user` VALUES (120, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Tobu - Calling - YouTube.MP4\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'24\'', '2021-11-21 08:34:13', NULL);
INSERT INTO `history_user` VALUES (121, 1, 1, 'fa fa-delete', 'Delete', 'DELETE FROM `video`\nWHERE `video_id` = \'24\'', '2021-11-21 08:41:07', NULL);
INSERT INTO `history_user` VALUES (122, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637505741_befb115cdd8cc35d92d2.mp4\', \'Kana Nishino-Sayonara Arigatou\')', '2021-11-21 08:42:21', NULL);
INSERT INTO `history_user` VALUES (123, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Kana Nishino-Sayonara Arigatou.mp4\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637505930_9fae46ca54c2fb466b37.png\', `video_subtitle` = \'1637505930_9beea8bb9873ae2d508c.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'25\'', '2021-11-21 08:45:31', NULL);
INSERT INTO `history_user` VALUES (124, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637505967_fe6b2e2cf8cb6912e701.mp4\', `video_nama` = \'Yowis Ben-lagu Galau\'\nWHERE `video_id` = \'25\'', '2021-11-21 08:46:09', NULL);
INSERT INTO `history_user` VALUES (125, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Yowis Ben\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_subtitle` = \'1637506042_805e713ade5cecd6359e.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'25\'', '2021-11-21 08:47:22', NULL);
INSERT INTO `history_user` VALUES (126, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_file` = \'1637506895_e7515660989c82f24604.mp4\', `video_nama` = \'Kana Nishino-Sayonara Arigatou\'\nWHERE `video_id` = \'25\'', '2021-11-21 09:01:35', NULL);
INSERT INTO `history_user` VALUES (127, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Sayonara Arigatou\', `video_tahun` = \'2017\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637506984_474774c0dea03797db78.png\', `video_subtitle` = \'1637506984_b40952d4ac7981222cea.vtt\', `is_draft` = \'0\'\nWHERE `video_id` = \'25\'', '2021-11-21 09:03:04', NULL);
INSERT INTO `history_user` VALUES (128, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Sayonara Arigatou\', `video_tahun` = \'2017\', `country_id` = \'5\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'25\'', '2021-11-21 09:04:08', NULL);
INSERT INTO `history_user` VALUES (129, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-22 07:17:06', '2021-11-22 07:17:06', NULL);
INSERT INTO `history_user` VALUES (130, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'3\', \'1637587131_b6d77b9176b04b47be5e.mp4\', \'Penguin Dance Remix (LEVAN VOLKA) (D1K4 R3M1X) 2018 - DJ Dika.mp3 - YouTube\')', '2021-11-22 07:18:51', NULL);
INSERT INTO `history_user` VALUES (131, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'3\', `video_nama` = \'Hatsune Mitsu - Levan Polka\', `video_tahun` = \'2020\', `country_id` = \'5\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'26\'', '2021-11-22 07:19:56', NULL);
INSERT INTO `history_user` VALUES (132, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video_kategori` SET `video_kategori_nama` = \'Japanese\', `video_kategori_seo` = \'japanese\'\nWHERE `video_kategori_id` = \'3\'', '2021-11-22 07:23:06', NULL);
INSERT INTO `history_user` VALUES (133, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video_kategori` (`video_kategori_nama`, `video_kategori_seo`, `video_kategori_img`) VALUES (\'Indonesia\', \'indonesia\', \'1637587424_b3be8cf539eb5dfbef07.png\')', '2021-11-22 07:23:45', NULL);
INSERT INTO `history_user` VALUES (134, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'4\', \'1637587445_db8e61d65995e9dbcaeb.mp4\', \'Yowis Ben-lagu Galau\')', '2021-11-22 07:24:06', NULL);
INSERT INTO `history_user` VALUES (135, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'4\', `video_nama` = \'Yowis Ben\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'27\'', '2021-11-22 07:24:29', NULL);
INSERT INTO `history_user` VALUES (136, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'4\', \'1637587508_a142583515af116e4438.mp4\', \'Nella Kharisma - Sayur Kol  OFFICIAL \')', '2021-11-22 07:25:08', NULL);
INSERT INTO `history_user` VALUES (137, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'4\', `video_nama` = \'Nella Kharisma - Sayur Kol\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'28\'', '2021-11-22 07:25:44', NULL);
INSERT INTO `history_user` VALUES (138, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video_kategori` (`video_kategori_nama`, `video_kategori_seo`, `video_kategori_img`) VALUES (\'Malaysia\', \'malaysia\', \'1637587569_9e96a789da611a3e7b48.png\')', '2021-11-22 07:26:09', NULL);
INSERT INTO `history_user` VALUES (139, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'5\', \'1637587632_7b5b52acd0343f749ccc.mp4\', \'Tobu - Calling - YouTube\')', '2021-11-22 07:27:12', NULL);
INSERT INTO `history_user` VALUES (140, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'5\', `video_nama` = \'Tobu - Calling\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'29\'', '2021-11-22 07:27:29', NULL);
INSERT INTO `history_user` VALUES (141, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'5\', \'1637587656_a63048bdec345150ad08.mp4\', \'Tobu   Wholm - Motion(720p)\')', '2021-11-22 07:27:36', NULL);
INSERT INTO `history_user` VALUES (142, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'5\', `video_nama` = \'Tobu   Wholm\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `is_draft` = \'0\'\nWHERE `video_id` = \'30\'', '2021-11-22 07:27:46', NULL);
INSERT INTO `history_user` VALUES (143, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video_kategori` SET `video_kategori_nama` = \'Barat\', `video_kategori_seo` = \'barat\'\nWHERE `video_kategori_id` = \'5\'', '2021-11-22 07:28:13', NULL);
INSERT INTO `history_user` VALUES (144, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `user` SET `user_nama` = \'Mbah Di\', `user_tgl_lahir` = \'2021-11-14\', `country_id` = \'1\', `email` = \'admin@gmail.com\', `password` = \'$2y$10$9ZVP145giL6JCui392vucupVUE.qC5.cvDuXqulQ30KnLYfdVK/Y6\', `is_active` = \'1\', `user_level_id` = \'1\', `kode_otp` = 825148\nWHERE `user_id` = \'1\'', '2021-11-22 07:47:11', NULL);
INSERT INTO `history_user` VALUES (145, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-22 07:47:30', '2021-11-22 07:47:30', NULL);
INSERT INTO `history_user` VALUES (146, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-22 07:47:54', '2021-11-22 07:47:54', NULL);
INSERT INTO `history_user` VALUES (147, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `user` SET `user_nama` = \'Admin\', `user_tgl_lahir` = \'2021-11-14\', `country_id` = \'1\', `email` = \'admin@gmail.com\', `password` = \'$2y$10$low5o1PKvDk17fmC3UzVXOqEoMnDC9yQRI2wCktfEI5chdAPR9HDC\', `is_active` = \'1\', `user_level_id` = \'1\', `kode_otp` = 895658\nWHERE `user_id` = \'1\'', '2021-11-22 07:48:47', NULL);
INSERT INTO `history_user` VALUES (148, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-22 07:49:16', '2021-11-22 07:49:16', NULL);
INSERT INTO `history_user` VALUES (149, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-22 07:53:59', '2021-11-22 07:53:59', NULL);
INSERT INTO `history_user` VALUES (150, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-22 07:57:50', '2021-11-22 07:57:50', NULL);
INSERT INTO `history_user` VALUES (151, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 05:00:38', '2021-11-24 05:00:38', NULL);
INSERT INTO `history_user` VALUES (152, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video_kategori` (`video_kategori_nama`, `video_kategori_seo`, `video_kategori_img`) VALUES (\'Kategori Test\', \'kategori-test\', \'1637752038_c82afca74b9a5ed58109.png\')', '2021-11-24 05:07:19', NULL);
INSERT INTO `history_user` VALUES (153, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video_kategori` SET `video_kategori_nama` = \'Kategori Test 1\', `video_kategori_seo` = \'kategori-test-1\'\nWHERE `video_kategori_id` = \'6\'', '2021-11-24 05:07:27', NULL);
INSERT INTO `history_user` VALUES (154, 1, 1, 'fa fa-delete', 'Delete', 'DELETE FROM `video_kategori`\nWHERE `video_kategori_id` = \'6\'', '2021-11-24 05:07:43', NULL);
INSERT INTO `history_user` VALUES (155, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 05:08:22', '2021-11-24 05:08:22', NULL);
INSERT INTO `history_user` VALUES (156, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 05:09:21', '2021-11-24 05:09:21', NULL);
INSERT INTO `history_user` VALUES (157, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 05:10:06', '2021-11-24 05:10:06', NULL);
INSERT INTO `history_user` VALUES (158, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 06:57:52', '2021-11-24 06:57:52', NULL);
INSERT INTO `history_user` VALUES (159, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 07:27:42', '2021-11-24 07:27:42', NULL);
INSERT INTO `history_user` VALUES (160, 17, 2, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 07:29:00', '2021-11-24 07:29:00', NULL);
INSERT INTO `history_user` VALUES (161, 17, 2, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 07:34:03', '2021-11-24 07:34:03', NULL);
INSERT INTO `history_user` VALUES (162, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 07:34:20', '2021-11-24 07:34:20', NULL);
INSERT INTO `history_user` VALUES (163, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 07:39:04', '2021-11-24 07:39:04', NULL);
INSERT INTO `history_user` VALUES (164, 17, 2, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 07:39:12', '2021-11-24 07:39:12', NULL);
INSERT INTO `history_user` VALUES (165, 17, 2, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:15:58', '2021-11-24 08:15:58', NULL);
INSERT INTO `history_user` VALUES (166, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:25:25', '2021-11-24 08:25:25', NULL);
INSERT INTO `history_user` VALUES (167, 24, 2, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 08:25:54', '2021-11-24 08:25:54', NULL);
INSERT INTO `history_user` VALUES (168, 24, 2, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:26:31', '2021-11-24 08:26:31', NULL);
INSERT INTO `history_user` VALUES (169, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 08:26:42', '2021-11-24 08:26:42', NULL);
INSERT INTO `history_user` VALUES (170, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:27:43', '2021-11-24 08:27:43', NULL);
INSERT INTO `history_user` VALUES (171, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 08:28:45', '2021-11-24 08:28:45', NULL);
INSERT INTO `history_user` VALUES (172, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:44:51', '2021-11-24 08:44:51', NULL);
INSERT INTO `history_user` VALUES (173, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 08:48:37', '2021-11-24 08:48:37', NULL);
INSERT INTO `history_user` VALUES (174, 1, 1, 'fa fa-lock', 'Block', 'UPDATE `user` SET `is_active` = 2\nWHERE `user_id` = \'24\'', '2021-11-24 08:49:07', NULL);
INSERT INTO `history_user` VALUES (175, 1, 1, 'fa fa-lock-open', 'Unblock', 'UPDATE `user` SET `is_active` = 1\nWHERE `user_id` = \'24\'', '2021-11-24 08:49:12', NULL);
INSERT INTO `history_user` VALUES (176, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `user` (`user_nama`, `user_tgl_lahir`, `country_id`, `email`, `password`, `is_active`, `user_level_id`, `kode_otp`) VALUES (\'Mbah Di\', \'2000-02-01\', \'1\', \'pudidi@gmail.com\', \'$2y$10$0lwBxzu0ic6l/oPiRcBR4./11ed5790/9Hk8AQqAUvaNRdj/kdFpi\', \'1\', \'1\', 218586)', '2021-11-24 08:49:56', NULL);
INSERT INTO `history_user` VALUES (177, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `user` SET `user_nama` = \'Admin\', `user_tgl_lahir` = \'2021-11-14\', `country_id` = \'1\', `email` = \'admin@gmail.com\', `user_img` = \'1637765542_9bb1c1b32b11ae981a4e.png\', `is_active` = \'1\', `user_level_id` = \'1\', `kode_otp` = 751144\nWHERE `user_id` = \'1\'', '2021-11-24 08:52:23', NULL);
INSERT INTO `history_user` VALUES (178, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 08:52:46', '2021-11-24 08:52:46', NULL);
INSERT INTO `history_user` VALUES (179, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-24 08:52:55', '2021-11-24 08:52:55', NULL);
INSERT INTO `history_user` VALUES (180, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `video` (`video_kategori_id`, `video_file`, `video_nama`) VALUES (\'5\', \'1637765658_9353520110f692a4cd2b.mp4\', \'Kygo-Give me a sign\')', '2021-11-24 08:54:18', NULL);
INSERT INTO `history_user` VALUES (181, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `video` SET `video_kategori_id` = \'5\', `video_nama` = \'Kygo-Give me a sign\', `video_tahun` = \'2020\', `country_id` = \'1\', `video_deskripsi` = \'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\', `video_thumbnail` = \'1637765739_4ab303402d77dd1eda26.png\', `is_draft` = \'0\'\nWHERE `video_id` = \'31\'', '2021-11-24 08:55:39', NULL);
INSERT INTO `history_user` VALUES (182, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-24 09:22:35', '2021-11-24 09:22:35', NULL);
INSERT INTO `history_user` VALUES (183, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-25 07:36:54', '2021-11-25 07:36:54', NULL);
INSERT INTO `history_user` VALUES (184, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `user` SET `user_nama` = \'Admin\', `user_tgl_lahir` = \'2021-11-14\', `country_id` = \'1\', `email` = \'admin@gmail.com\', `user_img` = \'1637847518_f94e6b1f8c46f5a03cc6.jpeg\', `is_active` = \'1\', `user_level_id` = \'1\', `kode_otp` = 529108\nWHERE `user_id` = \'1\'', '2021-11-25 07:38:38', NULL);
INSERT INTO `history_user` VALUES (185, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 07:38:45', '2021-11-25 07:38:45', NULL);
INSERT INTO `history_user` VALUES (186, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-25 07:38:53', '2021-11-25 07:38:53', NULL);
INSERT INTO `history_user` VALUES (187, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 07:39:12', '2021-11-25 07:39:12', NULL);
INSERT INTO `history_user` VALUES (188, 26, 2, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 07:42:33', '2021-11-25 07:42:33', NULL);
INSERT INTO `history_user` VALUES (189, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-25 07:42:41', '2021-11-25 07:42:41', NULL);
INSERT INTO `history_user` VALUES (190, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 07:43:03', '2021-11-25 07:43:03', NULL);
INSERT INTO `history_user` VALUES (191, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-25 07:43:17', '2021-11-25 07:43:17', NULL);
INSERT INTO `history_user` VALUES (192, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 07:47:09', '2021-11-25 07:47:09', NULL);
INSERT INTO `history_user` VALUES (193, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-11-25 08:26:57', '2021-11-25 08:26:57', NULL);
INSERT INTO `history_user` VALUES (194, 1, 1, 'fa fa-plus', 'Insert', 'INSERT INTO `user` (`user_nama`, `user_tgl_lahir`, `country_id`, `email`, `password`, `user_img`, `is_active`, `user_level_id`, `kode_otp`) VALUES (\'Pudidi\', \'2021-11-02\', \'1\', \'pudidi@gmail.com\', \'$2y$10$qJCV6SXdYnv8UsRVXB2PTOtEWmYJA39uaxU4MF5n5S90lT6kedDea\', \'1637851419_026e2ef9dc395ee2c307.jpg\', \'1\', \'1\', 785467)', '2021-11-25 08:43:39', NULL);
INSERT INTO `history_user` VALUES (195, 1, 1, 'fa fa-edit', 'Update', 'UPDATE `user` SET `user_nama` = \'Pudidi S\', `user_tgl_lahir` = \'2021-11-02\', `country_id` = \'1\', `email` = \'pudidi@gmail.com\', `is_active` = \'1\', `user_level_id` = \'1\', `kode_otp` = 634934\nWHERE `user_id` = \'27\'', '2021-11-25 08:44:01', NULL);
INSERT INTO `history_user` VALUES (196, 1, 1, 'fa fa-delete', 'Delete', 'DELETE FROM `user`\nWHERE `user_id` = \'27\'', '2021-11-25 08:44:11', NULL);
INSERT INTO `history_user` VALUES (197, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-11-25 09:28:41', '2021-11-25 09:28:41', NULL);

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
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_favorit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `user_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_level_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_level_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `video_kategori_id` int(11) NULL DEFAULT NULL,
  `video_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `video_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_draft` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES (25, 5, 3, 'Sayonara Arigatou', '2017', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637506895_e7515660989c82f24604.mp4', '1637506984_b40952d4ac7981222cea.vtt', '1637506984_474774c0dea03797db78.png', '0', NULL, NULL);
INSERT INTO `video` VALUES (26, 5, 3, 'Hatsune Mitsu - Levan Polka', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587131_b6d77b9176b04b47be5e.mp4', NULL, NULL, '0', NULL, NULL);
INSERT INTO `video` VALUES (27, 1, 4, 'Yowis Ben', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587445_db8e61d65995e9dbcaeb.mp4', NULL, NULL, '0', NULL, NULL);
INSERT INTO `video` VALUES (28, 1, 4, 'Nella Kharisma - Sayur Kol', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587508_a142583515af116e4438.mp4', NULL, NULL, '0', NULL, NULL);
INSERT INTO `video` VALUES (29, 1, 5, 'Tobu - Calling', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587632_7b5b52acd0343f749ccc.mp4', NULL, NULL, '0', NULL, NULL);
INSERT INTO `video` VALUES (30, 1, 5, 'Tobu   Wholm', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587656_a63048bdec345150ad08.mp4', NULL, NULL, '0', NULL, NULL);
INSERT INTO `video` VALUES (31, 1, 5, 'Kygo-Give me a sign', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637765658_9353520110f692a4cd2b.mp4', NULL, '1637765739_4ab303402d77dd1eda26.png', '0', NULL, NULL);

-- ----------------------------
-- Table structure for video_kategori
-- ----------------------------
DROP TABLE IF EXISTS `video_kategori`;
CREATE TABLE `video_kategori`  (
  `video_kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_kategori_nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_kategori_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_kategori_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_kategori_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video_kategori
-- ----------------------------
INSERT INTO `video_kategori` VALUES (3, 'Japanese', '1637158935_955b20552211b6e55f3e.png', 'japanese', NULL, NULL);
INSERT INTO `video_kategori` VALUES (4, 'Indonesia', '1637587424_b3be8cf539eb5dfbef07.png', 'indonesia', NULL, NULL);
INSERT INTO `video_kategori` VALUES (5, 'Barat', '1637587569_9e96a789da611a3e7b48.png', 'barat', NULL, NULL);

-- ----------------------------
-- Table structure for video_komentar
-- ----------------------------
DROP TABLE IF EXISTS `video_komentar`;
CREATE TABLE `video_komentar`  (
  `video_komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_komentar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_komentar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for video_slide
-- ----------------------------
DROP TABLE IF EXISTS `video_slide`;
CREATE TABLE `video_slide`  (
  `video_slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `video_slide_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `video_slide_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_slide_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video_slide
-- ----------------------------
INSERT INTO `video_slide` VALUES (2, 25, 'Sayonara Arigatou', 'aaa.jpg', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
