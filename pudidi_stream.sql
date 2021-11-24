-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country`  (
  `country_id` int(0) NOT NULL AUTO_INCREMENT,
  `country_nama` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`country_id`) USING BTREE
)

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES (1, 'Indonesia');
INSERT INTO `country` VALUES (2, 'Malaysia');
INSERT INTO `country` VALUES (3, 'Singapore');
INSERT INTO `country` VALUES (4, 'Thailand');
INSERT INTO `country` VALUES (5, 'Japanese');

-- ----------------------------
-- Table structure for history_dilihat
-- ----------------------------
DROP TABLE IF EXISTS `history_dilihat`;
CREATE TABLE `history_dilihat`  (
  `history_dilihat_id` int(0) NOT NULL AUTO_INCREMENT,
  `user_id` int(0) NULL DEFAULT NULL,
  `video_id` int(0) NULL DEFAULT NULL,
  `history_dilihat` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`history_dilihat_id`) USING BTREE
)

-- ----------------------------
-- Table structure for history_user
-- ----------------------------
DROP TABLE IF EXISTS `history_user`;
CREATE TABLE `history_user`  (
  `history_user_id` int(0) NOT NULL AUTO_INCREMENT,
  `user_id` int(0) NULL DEFAULT NULL,
  `user_level_id` int(0) NULL DEFAULT NULL,
  `history_icon` varchar(50)  NULL DEFAULT NULL,
  `history_action` varchar(50)  NULL DEFAULT NULL,
  `history_keterangan` text  NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`history_user_id`) USING BTREE
)

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(0) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(0) NULL DEFAULT NULL,
  `country_id` varchar(50) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `password` varchar(255) NULL DEFAULT NULL,
  `user_nama` varchar(150) NULL DEFAULT NULL,
  `user_img` varchar(255) NULL DEFAULT NULL,
  `user_tgl_lahir` date NULL DEFAULT NULL,
  `kode_otp` varchar(10) NULL DEFAULT NULL,
  `is_active` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`user_id`) USING BTREE
)

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, '1', 'admin@gmail.com', '$2y$10$low5o1PKvDk17fmC3UzVXOqEoMnDC9yQRI2wCktfEI5chdAPR9HDC', 'Admin', 'author_1.jpeg', '2021-11-14', '895658', 1);
INSERT INTO `user` VALUES (17, 2, '1', 'ilhamnm12@gmail.com', '$2y$10$4uA3a82w4G8.iNGwXBhBBeChlNygPc6qrqbGYaDNsFIxjuItkNPLq', 'Pudidi Sukidi', NULL, '2021-11-15', '803397', 1);
INSERT INTO `user` VALUES (18, 2, '1', 'masbrow12@gmail.com', '$2y$10$4uA3a82w4G8.iNGwXBhBBeChlNygPc6qrqbGYaDNsFIxjuItkNPLq', 'Masbrow', NULL, '2021-11-15', '803397', 1);

-- ----------------------------
-- Table structure for user_favorit
-- ----------------------------
DROP TABLE IF EXISTS `user_favorit`;
CREATE TABLE `user_favorit`  (
  `user_favorit_id` int(0) NOT NULL AUTO_INCREMENT,
  `user_id` int(0) NULL DEFAULT NULL,
  `video_id` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_favorit_id`) USING BTREE
)

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level`  (
  `user_level_id` int(0) NOT NULL AUTO_INCREMENT,
  `user_level_nama` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`user_level_id`) USING BTREE
)

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES (1, 'Administrator');
INSERT INTO `user_level` VALUES (2, 'Users');

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video`  (
  `video_id` int(0) NOT NULL AUTO_INCREMENT,
  `country_id` int(0) NULL DEFAULT NULL,
  `video_kategori_id` int(0) NULL DEFAULT NULL,
  `video_nama` varchar(255) NULL DEFAULT NULL,
  `video_tahun` varchar(4) NULL DEFAULT NULL,
  `video_deskripsi` text NULL,
  `video_file` varchar(255) NULL DEFAULT NULL,
  `video_subtitle` varchar(255) NULL DEFAULT NULL,
  `video_thumbnail` varchar(255) NULL DEFAULT NULL,
  `is_draft` enum('0','1') NULL DEFAULT '1',
  PRIMARY KEY (`video_id`) USING BTREE
)

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES (25, 5, 3, 'Sayonara Arigatou', '2017', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637506895_e7515660989c82f24604.mp4', '1637506984_b40952d4ac7981222cea.vtt', '1637506984_474774c0dea03797db78.png', '0');
INSERT INTO `video` VALUES (26, 5, 3, 'Hatsune Mitsu - Levan Polka', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587131_b6d77b9176b04b47be5e.mp4', NULL, NULL, '0');
INSERT INTO `video` VALUES (27, 1, 4, 'Yowis Ben', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587445_db8e61d65995e9dbcaeb.mp4', NULL, NULL, '0');
INSERT INTO `video` VALUES (28, 1, 4, 'Nella Kharisma - Sayur Kol', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587508_a142583515af116e4438.mp4', NULL, NULL, '0');
INSERT INTO `video` VALUES (29, 1, 5, 'Tobu - Calling', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587632_7b5b52acd0343f749ccc.mp4', NULL, NULL, '0');
INSERT INTO `video` VALUES (30, 1, 5, 'Tobu   Wholm', '2020', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1637587656_a63048bdec345150ad08.mp4', NULL, NULL, '0');

-- ----------------------------
-- Table structure for video_kategori
-- ----------------------------
DROP TABLE IF EXISTS `video_kategori`;
CREATE TABLE `video_kategori`  (
  `video_kategori_id` int(0) NOT NULL AUTO_INCREMENT,
  `video_kategori_nama` varchar(150) NULL DEFAULT NULL,
  `video_kategori_img` varchar(255) NULL DEFAULT NULL,
  `video_kategori_seo` varchar(255) NULL DEFAULT NULL,
  PRIMARY KEY (`video_kategori_id`) USING BTREE
)

-- ----------------------------
-- Records of video_kategori
-- ----------------------------
INSERT INTO `video_kategori` VALUES (3, 'Japanese', '1637158935_955b20552211b6e55f3e.png', 'japanese');
INSERT INTO `video_kategori` VALUES (4, 'Indonesia', '1637587424_b3be8cf539eb5dfbef07.png', 'indonesia');
INSERT INTO `video_kategori` VALUES (5, 'Barat', '1637587569_9e96a789da611a3e7b48.png', 'barat');

-- ----------------------------
-- Table structure for video_komentar
-- ----------------------------
DROP TABLE IF EXISTS `video_komentar`;
CREATE TABLE `video_komentar`  (
  `video_komentar_id` int(0) NOT NULL AUTO_INCREMENT,
  `video_id` int(0) NULL DEFAULT NULL,
  `user_id` int(0) NULL DEFAULT NULL,
  `video_komentar` varchar(255) NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`video_komentar_id`) USING BTREE
)

-- ----------------------------
-- Table structure for video_rating
-- ----------------------------
DROP TABLE IF EXISTS `video_rating`;
CREATE TABLE `video_rating`  (
  `video_rating_id` int(0) NOT NULL AUTO_INCREMENT,
  `video_id` int(0) NULL DEFAULT NULL,
  `video_rating` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_rating_id`) USING BTREE
)

SET FOREIGN_KEY_CHECKS = 1;
