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

 Date: 10/12/2021 23:44:00
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
  `history_dilihat_loop` int(11) NULL DEFAULT 1,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`history_dilihat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 415 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of history_user
-- ----------------------------
INSERT INTO `history_user` VALUES (412, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-12-10 23:36:04', '2021-12-10 23:36:04', NULL);
INSERT INTO `history_user` VALUES (413, 1, 1, 'fa fa-sign-in-alt', 'Login', 'Melakukan Login Pada Waktu 2021-12-10 23:36:20', '2021-12-10 23:36:20', NULL);
INSERT INTO `history_user` VALUES (414, 1, 1, 'fa fa-sign-out-alt', 'Logout', 'Melakukan Logout Pada Waktu 2021-12-10 23:37:10', '2021-12-10 23:37:10', NULL);

-- ----------------------------
-- Table structure for identitas_web
-- ----------------------------
DROP TABLE IF EXISTS `identitas_web`;
CREATE TABLE `identitas_web`  (
  `identitas_web_id` int(11) NOT NULL AUTO_INCREMENT,
  `identitas_web_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identitas_web_youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`identitas_web_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of identitas_web
-- ----------------------------
INSERT INTO `identitas_web` VALUES (1, 'PUDIDI STREAMING', '1638977165_d1f68f9db48bc782537a.png', 'Tempatnya Nonton Film Gratis..', '#facebook', '#twitter', '#instagram', '#youtube', '2021-12-08 21:19:24', '2021-12-08 22:26:05');

-- ----------------------------
-- Table structure for menu_landing
-- ----------------------------
DROP TABLE IF EXISTS `menu_landing`;
CREATE TABLE `menu_landing`  (
  `menu_landing_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_landing_parent` int(11) NULL DEFAULT NULL,
  `menu_landing_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_landing_urutan` int(11) NULL DEFAULT NULL,
  `menu_landing_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_landing_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `pages_template_id` int(11) NULL DEFAULT NULL,
  `pages_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pages_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pages_isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`pages_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pages_template
-- ----------------------------
DROP TABLE IF EXISTS `pages_template`;
CREATE TABLE `pages_template`  (
  `pages_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `pages_template_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pages_template_isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`pages_template_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pages_template
-- ----------------------------
INSERT INTO `pages_template` VALUES (1, 'Halaman Standart', NULL, NULL, NULL);
INSERT INTO `pages_template` VALUES (2, 'Halaman About', '<!-- about us -->\r\n<section class=\"section section--pb0\">\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <!-- section text -->\r\n            <div class=\"col-12\">\r\n                <p class=\"section__text section__text--small\">PudidiStream adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, film, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.\r\n                </p>\r\n\r\n                <p class=\"section__text section__text--small\">Kamu bisa menonton sepuasnya, kapan pun dan dimana pun kamu mau, tanpa adanya iklan – semuanya dengan gratis. Selalu ada tontonan baru dan acara TV serta film baru yang ditambahkan setiap minggu!</p>\r\n            </div>\r\n            <!-- end section text -->\r\n        </div>\r\n\r\n        <div class=\"row row--grid\">\r\n            <div class=\"col-12 col-lg-4\">\r\n                <div class=\"step\">\r\n                    <span class=\"step__number\">01</span>\r\n                    <h3 class=\"step__title\">Nikmati di TV-mu.</h3>\r\n                    <p class=\"step__text\">Tonton di Smart TV, Playstation, Xbox, Chromecast, Apple TV, pemutar Blu-ray, dan banyak lagi.</p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-12 col-lg-4\">\r\n                <div class=\"step\">\r\n                    <span class=\"step__number\">02</span>\r\n                    <p class=\"step__title\">Download secara offline.</p>\r\n                    <p class=\"step__text\">Simpan favoritmu dengan mudah agar selalu ada acara TV dan film yang bisa ditonton.</p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-12 col-lg-4\">\r\n                <div class=\"step\">\r\n                    <span class=\"step__number\">03</span>\r\n                    <h3 class=\"step__title\">Tonton di mana pun.</h3>\r\n                    <p class=\"step__text\">Streaming film dan acara TV tak terbatas di ponsel, tablet, laptop, dan TV-mu.</p>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</section>\r\n<!-- end about -->\r\n\r\n<!-- steps -->\r\n<section class=\"section section--pb0 section--gradient\">\r\n    <div class=\"container\">\r\n        <div class=\"row\">\r\n            <div class=\"col-12\">\r\n                <h2 class=\"section__title\">Tanya Jawab Umum</h2>\r\n            </div>\r\n        </div>\r\n\r\n        <div class=\"row row--grid\">\r\n            <div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">\r\n                <div class=\"feature\">\r\n                    <span class=\"feature__icon\">\r\n                        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\">\r\n                            <path d=\"M19,7H18V6a3,3,0,0,0-3-3H5A3,3,0,0,0,2,6H2V18a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V10A3,3,0,0,0,19,7ZM5,5H15a1,1,0,0,1,1,1V7H5A1,1,0,0,1,5,5ZM20,15H19a1,1,0,0,1,0-2h1Zm0-4H19a3,3,0,0,0,0,6h1v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8.83A3,3,0,0,0,5,9H19a1,1,0,0,1,1,1Z\" />\r\n                        </svg>\r\n                    </span>\r\n                    <h3 class=\"feature__title\">Apakah PudidiStream berbayar?</h3>\r\n                    <p class=\"feature__text\">Tonton PudidiStream di smartphone, tablet, Smart TV, laptop, atau perangkat streaming-mu, semuanya dengan gratis, tanpa biaya ekstra, tanpa kontrak.</p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">\r\n                <div class=\"feature\">\r\n                    <span class=\"feature__icon\">\r\n                        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\">\r\n                            <path d=\"M9,10a1,1,0,0,0-1,1v2a1,1,0,0,0,2,0V11A1,1,0,0,0,9,10Zm12,1a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H3A1,1,0,0,0,2,6v4a1,1,0,0,0,1,1,1,1,0,0,1,0,2,1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1,1,1,0,0,1,0-2ZM20,9.18a3,3,0,0,0,0,5.64V17H10a1,1,0,0,0-2,0H4V14.82A3,3,0,0,0,4,9.18V7H8a1,1,0,0,0,2,0H20Z\" />\r\n                        </svg>\r\n                    </span>\r\n                    <h3 class=\"feature__title\">Dimana saya bisa menonton?</h3>\r\n                    <p class=\"feature__text\">Tonton di mana pun, kapan pun. Masuk ke akun Pudidi-mu untuk menonton langsung di pudidi.com dari komputer pribadi atau di perangkat yang terhubung ke Internet dan mendukung aplikasi PudidiStream, termasuk smart TV, smartphone, tablet, pemutar media streaming, dan konsol game.\r\n                    </p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">\r\n                <div class=\"feature\">\r\n                    <span class=\"feature__icon\">\r\n                        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\">\r\n                            <path d=\"M20,2H10A3,3,0,0,0,7,5v7a3,3,0,0,0,3,3H20a3,3,0,0,0,3-3V5A3,3,0,0,0,20,2Zm1,10a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1H20a1,1,0,0,1,1,1ZM17.5,8a1.49,1.49,0,0,0-1,.39,1.5,1.5,0,1,0,0,2.22A1.5,1.5,0,1,0,17.5,8ZM16,17a1,1,0,0,0-1,1v1a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V15H4a1,1,0,0,0,0-2H3V12a1,1,0,0,1,1-1A1,1,0,0,0,4,9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V18A1,1,0,0,0,16,17ZM6,18H7a1,1,0,0,0,0-2H6a1,1,0,0,0,0,2Z\" />\r\n                        </svg>\r\n                    </span>\r\n                    <h3 class=\"feature__title\">Apakah bisa ditonton secara offline?</h3>\r\n                    <p class=\"feature__text\">Kamu juga bisa men-download acara favoritmu dengan aplikasi iOS, Android, atau Windows 10. Gunakan download untuk menonton saat kamu di perjalanan dan tidak punya koneksi Internet. Bawa Netflix ke mana saja.</p>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-12 col-md-6 col-lg-4 col-xl-3\">\r\n                <div class=\"feature\">\r\n                    <span class=\"feature__icon\">\r\n                        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\">\r\n                            <path d=\"M21.53,7.15a1,1,0,0,0-1,0L17,8.89A3,3,0,0,0,14,6H5A3,3,0,0,0,2,9v6a3,3,0,0,0,3,3h9a3,3,0,0,0,3-2.89l3.56,1.78A1,1,0,0,0,21,17a1,1,0,0,0,.53-.15A1,1,0,0,0,22,16V8A1,1,0,0,0,21.53,7.15ZM15,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V9A1,1,0,0,1,5,8h9a1,1,0,0,1,1,1Zm5-.62-3-1.5V11.12l3-1.5Z\" />\r\n                        </svg>\r\n                    </span>\r\n                    <h3 class=\"feature__title\">Apa yang bisa ditonton di PudidiStream</h3>\r\n                    <p class=\"feature__text\">PudidiStream memiliki pustaka lengkap yang berisi film panjang, film dokumenter, acara TV, anime, dan lebih banyak lagi. Tonton sepuasnya, kapan pun kamu mau.</p>\r\n                </div>\r\n            </div>\r\n\r\n\r\n        </div>\r\n    </div>\r\n</section>\r\n<!-- end steps -->', NULL, NULL);
INSERT INTO `pages_template` VALUES (3, 'Halaman Kontak', '<!-- contacts -->\r\n<section class=\"section section--pb0\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<!-- Form -->\r\n<div class=\"ContactForm col-12 col-lg-7 col-xl-8\">\r\n<form action=\"#\" class=\"sign__form sign__form--contacts\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-xl-6\">\r\n<div class=\"sign__group\">\r\n<input\r\ntype=\"text\"\r\nclass=\"sign__input\"\r\nplaceholder=\"First Name\"\r\n/>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-xl-6\">\r\n<div class=\"sign__group\">\r\n<input\r\ntype=\"text\"\r\nclass=\"sign__input\"\r\nplaceholder=\"Last Name\"\r\n/>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-xl-6\">\r\n<div class=\"sign__group\">\r\n<input\r\ntype=\"text\"\r\nclass=\"sign__input\"\r\nplaceholder=\"Email\"\r\n/>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-xl-6\">\r\n<div class=\"sign__group\">\r\n<input\r\ntype=\"text\"\r\nclass=\"sign__input\"\r\nplaceholder=\"Telp.\"\r\n/>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"sign__group\">\r\n<input\r\ntype=\"text\"\r\nclass=\"sign__input\"\r\nplaceholder=\"Perihal\"\r\n/>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12\">\r\n<div class=\"sign__group\">\r\n<textarea\r\nclass=\"sign__textarea\"\r\nplaceholder=\"Tulis pesan\"\r\n></textarea>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-12 col-xl-3\">\r\n<button type=\"button\" class=\"sign__btn\">Kirim</button>\r\n</div>\r\n</div>\r\n</form>\r\n</div>\r\n<!-- End Form -->\r\n\r\n<!-- Info -->\r\n<div class=\"contactInfo col-12 col-lg-5 col-xl-4\">\r\n<h2 class=\"section__title section__title--sidebar text-primary\">\r\nInfo\r\n</h2>\r\n<p class=\"section__text\"></p>\r\n<ul class=\"contacts__list white\">\r\n<li>\r\n<iframe\r\nsrc=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d505562.20951867074!2d111.9370573900012!3d-8.131510056082206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78eb3e59dda50f%3A0x6ce6e27c1403adc7!2sKabupaten%20Blitar%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1639067095285!5m2!1sid!2sid\"\r\nwidth=\"280\"\r\nheight=\"200\"\r\nstyle=\"border: 0\"\r\nallowfullscreen=\"\"\r\nloading=\"lazy\"\r\n></iframe>\r\n</li>\r\n<li>\r\n<a href=\"https://layhome12.000webhostapp.com/tel:+18092345678\"\r\n><i class=\"fas fa-map-marker-alt\"></i>Jl. in aja No. 1212,\r\nIndonesia</a\r\n>\r\n</li>\r\n<li>\r\n<a\r\nhref=\"https://layhome12.000webhostapp.com/tel:+18092345678\"\r\n></a>\r\n</li>\r\n<li>\r\n<a href=\"https://layhome12.000webhostapp.com/tel:+18092345678\"\r\n>+62 0000 0000</a\r\n>\r\n</li>\r\n<li>\r\n<a\r\nhref=\"https://layhome12.000webhostapp.com/mailto:support@flixtv.template\"\r\n>pudidi1234@mail.com</a\r\n>\r\n</li>\r\n</ul>\r\n<div class=\"contacts__social\">\r\n<a href=\"https://layhome12.000webhostapp.com/#\" target=\"_blank\"\r\n><svg\r\nwidth=\"30\"\r\nheight=\"30\"\r\nviewBox=\"0 0 30 30\"\r\nfill=\"none\"\r\nxmlns=\"http://www.w3.org/2000/svg\"\r\n>\r\n<path\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"#3B5998\"\r\n/>\r\n<path\r\nd=\"M16.5634 23.8197V15.6589H18.8161L19.1147 12.8466H16.5634L16.5672 11.4391C16.5672 10.7056 16.6369 10.3126 17.6904 10.3126H19.0987V7.5H16.8457C14.1394 7.5 13.1869 8.86425 13.1869 11.1585V12.8469H11.4999V15.6592H13.1869V23.8197H16.5634Z\"\r\nfill=\"white\"\r\n/></svg\r\n></a>\r\n<a href=\"https://layhome12.000webhostapp.com/#\" target=\"_blank\"\r\n><svg\r\nwidth=\"30\"\r\nheight=\"30\"\r\nviewBox=\"0 0 30 30\"\r\nfill=\"none\"\r\nxmlns=\"http://www.w3.org/2000/svg\"\r\n>\r\n<path\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"#55ACEE\"\r\n/>\r\n<path\r\nd=\"M14.5508 12.1922L14.5822 12.7112L14.0576 12.6477C12.148 12.404 10.4798 11.5778 9.06334 10.1902L8.37085 9.50169L8.19248 10.0101C7.81477 11.1435 8.05609 12.3405 8.843 13.1455C9.26269 13.5904 9.16826 13.654 8.4443 13.3891C8.19248 13.3044 7.97215 13.2408 7.95116 13.2726C7.87772 13.3468 8.12953 14.3107 8.32888 14.692C8.60168 15.2217 9.15777 15.7407 9.76631 16.0479L10.2804 16.2915L9.67188 16.3021C9.08432 16.3021 9.06334 16.3127 9.12629 16.5351C9.33613 17.2236 10.165 17.9545 11.0883 18.2723L11.7388 18.4947L11.1723 18.8337C10.3329 19.321 9.34663 19.5964 8.36036 19.6175C7.88821 19.6281 7.5 19.6705 7.5 19.7023C7.5 19.8082 8.78005 20.4014 9.52499 20.6344C11.7598 21.3229 14.4144 21.0264 16.4079 19.8506C17.8243 19.0138 19.2408 17.3507 19.9018 15.7407C20.2585 14.8827 20.6152 13.315 20.6152 12.5629C20.6152 12.0757 20.6467 12.0121 21.2343 11.4295C21.5805 11.0906 21.9058 10.7198 21.9687 10.6139C22.0737 10.4126 22.0632 10.4126 21.5281 10.5927C20.6362 10.9105 20.5103 10.8681 20.951 10.3915C21.2762 10.0525 21.6645 9.43813 21.6645 9.25806C21.6645 9.22628 21.5071 9.27924 21.3287 9.37458C21.1398 9.4805 20.7202 9.63939 20.4054 9.73472L19.8388 9.91479L19.3247 9.56524C19.0414 9.37458 18.6427 9.16273 18.4329 9.09917C17.8978 8.95087 17.0794 8.97206 16.5967 9.14154C15.2852 9.6182 14.4563 10.8469 14.5508 12.1922Z\"\r\nfill=\"white\"\r\n/></svg\r\n></a>\r\n<a\r\nhref=\"https://layhome12.000webhostapp.com/https://www.instagram.com/volkov_des1gn/\"\r\ntarget=\"_blank\"\r\n><svg\r\nwidth=\"30\"\r\nheight=\"30\"\r\nviewBox=\"0 0 30 30\"\r\nfill=\"none\"\r\nxmlns=\"http://www.w3.org/2000/svg\"\r\n>\r\n<path\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"white\"\r\n/>\r\n<mask\r\nid=\"mask01\"\r\nmaskUnits=\"userSpaceOnUse\"\r\nx=\"0\"\r\ny=\"0\"\r\nwidth=\"30\"\r\nheight=\"30\"\r\n>\r\n<path\r\nfill-rule=\"evenodd\"\r\nclip-rule=\"evenodd\"\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"white\"\r\n/>\r\n</mask>\r\n<g mask=\"url(#mask0)\">\r\n<path\r\nfill-rule=\"evenodd\"\r\nclip-rule=\"evenodd\"\r\nd=\"M14.9984 7C12.8279 7 12.5552 7.00949 11.7022 7.04834C10.8505 7.08734 10.2692 7.22217 9.76048 7.42001C9.23431 7.62433 8.78797 7.89767 8.3433 8.3425C7.8983 8.78717 7.62496 9.23352 7.41996 9.75952C7.22162 10.2684 7.08662 10.8499 7.04829 11.7012C7.01012 12.5546 7.00012 12.8274 7.00012 15.0001C7.00012 17.1728 7.00979 17.4446 7.04846 18.2979C7.08762 19.1496 7.22246 19.731 7.42013 20.2396C7.62463 20.7658 7.89796 21.2122 8.3428 21.6568C8.78731 22.1018 9.23365 22.3758 9.75948 22.5802C10.2685 22.778 10.85 22.9128 11.7015 22.9518C12.5548 22.9907 12.8273 23.0002 14.9999 23.0002C17.1727 23.0002 17.4446 22.9907 18.2979 22.9518C19.1496 22.9128 19.7316 22.778 20.2406 22.5802C20.7666 22.3758 21.2123 22.1018 21.6568 21.6568C22.1018 21.2122 22.3751 20.7658 22.5801 20.2398C22.7768 19.731 22.9118 19.1495 22.9518 18.2981C22.9901 17.4448 23.0001 17.1728 23.0001 15.0001C23.0001 12.8274 22.9901 12.5547 22.9518 11.7014C22.9118 10.8497 22.7768 10.2684 22.5801 9.7597C22.3751 9.23352 22.1018 8.78717 21.6568 8.3425C21.2118 7.89752 20.7668 7.62418 20.2401 7.42001C19.7301 7.22217 19.1484 7.08734 18.2967 7.04834C17.4434 7.00949 17.1717 7 14.9984 7ZM14.5903 8.44156L14.7343 8.44165L15.0009 8.44171C17.1369 8.44171 17.3901 8.44937 18.2336 8.4877C19.0136 8.52338 19.437 8.65369 19.719 8.76321C20.0923 8.9082 20.3585 9.08154 20.6383 9.36154C20.9183 9.64154 21.0916 9.9082 21.237 10.2816C21.3465 10.5632 21.477 10.9866 21.5125 11.7666C21.5508 12.6099 21.5591 12.8633 21.5591 14.9983C21.5591 17.1333 21.5508 17.3866 21.5125 18.23C21.4768 19.01 21.3465 19.4333 21.237 19.715C21.092 20.0883 20.9183 20.3542 20.6383 20.634C20.3583 20.914 20.0925 21.0873 19.719 21.2323C19.4373 21.3423 19.0136 21.4723 18.2336 21.508C17.3903 21.5463 17.1369 21.5547 15.0009 21.5547C12.8647 21.5547 12.6115 21.5463 11.7682 21.508C10.9882 21.472 10.5649 21.3417 10.2827 21.2322C9.90935 21.0872 9.64268 20.9138 9.36268 20.6338C9.08268 20.3538 8.90934 20.0878 8.76401 19.7143C8.65451 19.4326 8.52401 19.0093 8.48851 18.2293C8.45017 17.386 8.4425 17.1326 8.4425 14.9963C8.4425 12.8599 8.45017 12.6079 8.48851 11.7646C8.52417 10.9846 8.65451 10.5612 8.76401 10.2792C8.90901 9.90588 9.08268 9.63922 9.36268 9.35919C9.64268 9.07919 9.90935 8.90588 10.2827 8.76053C10.5647 8.65054 10.9882 8.52054 11.7682 8.48471C12.5062 8.45135 12.7922 8.44138 14.2832 8.4397V8.44171C14.3803 8.44156 14.4825 8.44153 14.5903 8.44156ZM18.3113 10.7296C18.3113 10.1994 18.7413 9.76987 19.2713 9.76987V9.76953C19.8013 9.76953 20.2313 10.1995 20.2313 10.7296C20.2313 11.2596 19.8013 11.6895 19.2713 11.6895C18.7413 11.6895 18.3113 11.2596 18.3113 10.7296ZM15.0011 10.8916C12.7323 10.8916 10.8928 12.7311 10.8928 15C10.8928 17.2688 12.7323 19.1075 15.0011 19.1075C17.27 19.1075 19.1088 17.2688 19.1088 15C19.1088 12.7311 17.2698 10.8916 15.0011 10.8916ZM17.6678 14.9999C17.6678 13.5271 16.4738 12.3333 15.0011 12.3333C13.5283 12.3333 12.3344 13.5271 12.3344 14.9999C12.3344 16.4726 13.5283 17.6666 15.0011 17.6666C16.4738 17.6666 17.6678 16.4726 17.6678 14.9999Z\"\r\nfill=\"black\"\r\n/>\r\n</g></svg></a>\r\n<a href=\"https://layhome12.000webhostapp.com/#\" target=\"_blank\"\r\n><svg\r\nwidth=\"30\"\r\nheight=\"30\"\r\nviewBox=\"0 0 30 30\"\r\nfill=\"none\"\r\nxmlns=\"http://www.w3.org/2000/svg\"\r\n>\r\n<path\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"#4C6C91\"\r\n/>\r\n<path\r\nd=\"M15.7848 19.9226C15.7848 19.9226 16.0736 19.8911 16.2215 19.7351C16.3568 19.5922 16.3521 19.3226 16.3521 19.3226C16.3521 19.3226 16.3341 18.0636 16.9297 17.8777C17.5166 17.6949 18.2702 19.0952 19.07 19.6337C19.6741 20.0408 20.1327 19.9517 20.1327 19.9517L22.2699 19.9226C22.2699 19.9226 23.3874 19.855 22.8576 18.9923C22.8137 18.9216 22.5485 18.354 21.269 17.1879C19.9284 15.9673 20.1084 16.1647 21.7221 14.053C22.705 12.7672 23.0978 11.9821 22.975 11.6464C22.8584 11.3253 22.1353 11.4106 22.1353 11.4106L19.7297 11.4252C19.7297 11.4252 19.5513 11.4014 19.419 11.4789C19.2899 11.555 19.2061 11.7324 19.2061 11.7324C19.2061 11.7324 18.8258 12.7272 18.3179 13.5737C17.2466 15.3589 16.8185 15.4534 16.6433 15.3428C16.2355 15.0839 16.3373 14.3042 16.3373 13.7504C16.3373 12.0197 16.6049 11.2984 15.8169 11.1118C15.5555 11.0495 15.363 11.0088 14.6939 11.0019C13.8354 10.9935 13.1092 11.005 12.6976 11.2024C12.4237 11.3338 12.2124 11.6272 12.3415 11.6441C12.5004 11.6648 12.8604 11.7394 13.0513 11.9944C13.2978 12.3239 13.2892 13.0629 13.2892 13.0629C13.2892 13.0629 13.4308 15.1 12.9582 15.3528C12.6342 15.5264 12.1897 15.1723 11.2342 13.5522C10.7451 12.7226 10.3757 11.8054 10.3757 11.8054C10.3757 11.8054 10.3045 11.6341 10.177 11.5419C10.0228 11.4306 9.80759 11.396 9.80759 11.396L7.52173 11.4106C7.52173 11.4106 7.17818 11.4198 7.05219 11.5665C6.94029 11.6963 7.04358 11.966 7.04358 11.966C7.04358 11.966 8.8333 16.0764 10.8601 18.1481C12.7187 20.047 14.8285 19.9226 14.8285 19.9226H15.7848Z\"\r\nfill=\"white\"\r\n/></svg\r\n></a>\r\n<a href=\"https://layhome12.000webhostapp.com/#\" target=\"_blank\"\r\n><svg\r\nwidth=\"30\"\r\nheight=\"30\"\r\nviewBox=\"0 0 30 30\"\r\nfill=\"none\"\r\nxmlns=\"http://www.w3.org/2000/svg\"\r\n>\r\n<path\r\nd=\"M0 15C0 6.71573 6.71573 0 15 0C23.2843 0 30 6.71573 30 15C30 23.2843 23.2843 30 15 30C6.71573 30 0 23.2843 0 15Z\"\r\nfill=\"#010101\"\r\n/>\r\n<path\r\nd=\"M13.2143 13.1245V12.4195C12.9696 12.3808 12.7224 12.3595 12.4747 12.356C10.0763 12.3509 7.95291 13.9051 7.23271 16.1928C6.51252 18.4805 7.36263 20.9708 9.33138 22.3405C7.85664 20.7622 7.44716 18.4646 8.28583 16.474C9.1245 14.4834 11.0547 13.1716 13.2143 13.1245Z\"\r\nfill=\"#25F4EE\"\r\n/>\r\n<path\r\nd=\"M13.3472 21.1097C14.6881 21.1079 15.7904 20.0515 15.8491 18.7118V6.75693H18.0332C17.9886 6.50713 17.9673 6.25373 17.9696 6H14.9824V17.9433C14.9327 19.2898 13.8279 20.3564 12.4804 20.3586C12.0778 20.3552 11.6817 20.2561 11.3248 20.0697C11.794 20.7197 12.5456 21.1062 13.3472 21.1097Z\"\r\nfill=\"#25F4EE\"\r\n/>\r\n<path\r\nd=\"M22.1125 10.8133V10.1489C21.3087 10.1491 20.5227 9.91193 19.8533 9.46704C20.4401 10.1493 21.2332 10.6219 22.1125 10.8133Z\"\r\nfill=\"#25F4EE\"\r\n/>\r\n<path\r\nd=\"M19.8534 9.46693C19.1939 8.71597 18.8304 7.75063 18.8306 6.75122H18.0333C18.2414 7.86795 18.8996 8.84996 19.8534 9.46693Z\"\r\nfill=\"#FE2C55\"\r\n/>\r\n<path\r\nd=\"M12.4747 15.343C11.324 15.3489 10.325 16.1372 10.0517 17.2551C9.77836 18.3729 10.3009 19.5333 11.3191 20.0695C10.7674 19.3078 10.6895 18.301 11.1174 17.4635C11.5453 16.626 12.4067 16.0992 13.3472 16.0999C13.598 16.103 13.8471 16.1419 14.0868 16.2155V13.1762C13.842 13.1395 13.5948 13.1202 13.3472 13.1184H13.2143V15.4296C12.9733 15.365 12.7242 15.3358 12.4747 15.343Z\"\r\nfill=\"#FE2C55\"\r\n/>\r\n<path\r\nd=\"M22.1125 10.813V13.1242C20.6245 13.1214 19.1751 12.6503 17.9696 11.7779V17.8507C17.9632 20.881 15.5049 23.3341 12.4746 23.3341C11.3493 23.3361 10.251 22.9889 9.33136 22.3403C10.8662 23.991 13.2547 24.5344 15.3525 23.71C17.4504 22.8857 18.8301 20.8616 18.8306 18.6076V12.5522C20.0401 13.4189 21.4913 13.8838 22.9792 13.8812V10.9054C22.6879 10.9045 22.3975 10.8735 22.1125 10.813Z\"\r\nfill=\"#FE2C55\"\r\n/>\r\n<path\r\nd=\"M17.9696 17.851V11.7782C19.1787 12.6456 20.6301 13.1105 22.1182 13.1071V10.7959C21.2391 10.6102 20.4441 10.1438 19.8532 9.46693C18.8994 8.84996 18.2413 7.86795 18.0331 6.75122H15.849V18.7119C15.8053 19.779 15.0906 20.7013 14.0682 21.01C13.0458 21.3186 11.9401 20.9459 11.3132 20.0813C10.295 19.5451 9.77243 18.3847 10.0457 17.2669C10.319 16.1491 11.3181 15.3607 12.4688 15.3548C12.7197 15.357 12.9688 15.396 13.2084 15.4704V13.1591C11.0368 13.1959 9.09197 14.5124 8.25091 16.5149C7.40985 18.5174 7.83142 20.8277 9.32553 22.4041C10.2543 23.0313 11.3541 23.3562 12.4746 23.3344C15.5049 23.3344 17.9632 20.8812 17.9696 17.851Z\"\r\nfill=\"white\"\r\n/></svg\r\n></a>\r\n</div>\r\n</div>\r\n<!-- End Info -->\r\n</div>\r\n</div>\r\n</section>\r\n<!-- end contacts -->', NULL, NULL);
INSERT INTO `pages_template` VALUES (4, 'Halaman Privasi', '<!-- about us -->\r\n	<section class=\"section section--pb0\">\r\n		<div class=\"container\">\r\n			<div class=\"row\">\r\n				<!-- section text -->\r\n				<div class=\"col-12\">\r\n					<p class=\"section__text section__text--small\">Kebijakan Privasi berikut ini menjelaskan bagaimana kami, Pudidi mengumpulkan, menyimpan, menggunakan, mengolah, menguasai, mentransfer, mengungkapkan dan melindungi Informasi Pribadi anda.\r\n					Mohon baca Kebijakan Privasi ini dengan seksama untuk memastikan bahwa anda memahami bagaimana proses pengolahan data kami. Kecuali didefinisikan lain, semua istilah dengan huruf kapital yang digunakan dalam Kebijakan Privasi ini memiliki arti yang sama dengan yang tercantum dalam Ketentuan Pengunaan.</p>\r\n				</div>\r\n				<div class=\"col-12\">\r\n					<h1 class=\"section__text section__text--large\">Informasi Yang Kami Kumpulkan</h1>\r\n					<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu3\">\r\n						<li><p class=\"section__text section__text--small\">Kami mengumpulkan informasi yang mengidentifikasikan atau dapat digunakan untuk mengidentifikasi, menghubungi, atau menemukan orang atau perangkat yang terkait dengan informasi tersebut (\"Informasi Pribadi\"). Informasi Pribadi termasuk, tetapi tidak terbatas pada, nama, alamat, tanggal lahir, pekerjaan, nomor telepon, alamat e-mail, rekening bank dan detail kartu kredit, jenis kelamin, identifikasi (termasuk KTP, SIM, atau Paspor) atau tanda pengenal lainnya yang dikeluarkan oleh pemerintah, foto, kewarganegaraan, nomor telepon pengguna dan non-pengguna Aplikasi kami yang terdapat dalam daftar kontak telefon selular anda, data kesehatan, informasi keuangan terkait, serta informasi biometrik (termasuk namun tidak terbatas pengenalan wajah). Selain itu, untuk informasi lainnya, seperti profil pribadi, dan/atau nomor pengenal unik, yang dikaitkan atau digabungkan dengan Informasi Pribadi, maka informasi tersebut juga dianggap sebagai Informasi Pribadi. Informasi Pribadi yang kami kumpulkan dapat diberikan oleh anda secara langsung atau oleh pihak ketiga (misalnya: ketika anda mendaftar atau menggunakan Aplikasi, ketika anda menghubungi layanan pelanggan kami, atau sebaliknya ketika anda memberikan Informasi Pribadi kepada kami). Kami dapat mengumpulkan informasi dalam berbagai macam bentuk dan tujuan (termasuk tujuan yang diizinkan berdasarkan peraturan perundang-undangan yang berlaku).</p></li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, '1', 'admin@gmail.com', '$2y$10$low5o1PKvDk17fmC3UzVXOqEoMnDC9yQRI2wCktfEI5chdAPR9HDC', 'Admin', '1637847518_f94e6b1f8c46f5a03cc6.jpeg', '2021-11-14', '529108', 1, NULL, '2021-12-09 00:00:00');

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
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for video_komentar
-- ----------------------------
DROP TABLE IF EXISTS `video_komentar`;
CREATE TABLE `video_komentar`  (
  `video_komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `video_komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_time` datetime(0) NULL DEFAULT NULL,
  `updated_time` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`video_komentar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
