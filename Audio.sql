/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : audio

 Target Server Type    : MariaDB
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 09/06/2020 16:37:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills`  (
  `id` bigint(15) NOT NULL,
  `amount` int(10) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NULL DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp,
  `transaction_no` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bills
-- ----------------------------
INSERT INTO `bills` VALUES (202006082334583, 10000, 'Noi dung thanh toan', 'NCB', '2020-06-08 23:44:11', '2020-06-08 23:44:11', 13313099, 3);
INSERT INTO `bills` VALUES (2020060823345833, 10000, 'Noi dung thanh toan', 'NCB', '2020-06-08 23:46:18', '2020-06-08 23:46:18', 13313099, 3);
INSERT INTO `bills` VALUES (2020060823472433, 10000, 'Noi dung thanh toan', 'NCB', '2020-06-08 23:47:48', '2020-06-08 23:47:48', 13313100, 3);
INSERT INTO `bills` VALUES (2020060915110133, 10, 'Noi dung thanh toan', 'NCB', '2020-06-09 15:12:16', '2020-06-09 15:12:16', 13313372, 3);
INSERT INTO `bills` VALUES (2020060915402833, 10, 'Noi dung thanh toan', 'NCB', '2020-06-09 15:40:54', '2020-06-09 15:40:54', 13313396, 3);

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploadby` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chaptotal` int(10) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '',
  `viewcount` int(11) NOT NULL DEFAULT 0,
  `followcount` int(11) NOT NULL DEFAULT 0,
  `uploaddate` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_book_users`(`uploadby`) USING BTREE,
  CONSTRAINT `FK_book_users` FOREIGN KEY (`uploadby`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (41, '11cf7a00-f1c1-11e9-89dc-49b11daac938', '๖ۣۜNhư๖ۣۜ Ý♥๖ۣۜVô ๖ۣۜTà', 2, 'Thời La Mã Cổ Đại: Theo Chủ Nô Đến Chí Tôn Đại Đế', 5, '<p>Diệp Thi&ecirc;n mang theo mạnh nhất chủ n&ocirc; hệ thống xuy&ecirc;n việt thời La M&atilde; cổ đại.</p>\r\n\r\n<p>Lấy mạnh nhất chủ n&ocirc; th&acirc;n phận, ch&acirc;n đạp qua Krassu, đ&aacute;nh qua Pompey mặt, sờ đầu giết Caesar Đại Đế.</p>\r\n\r\n<p>Nguy&ecirc;n l&atilde;o viện bị trở th&agrave;nh hậu hoa vi&ecirc;n, Rome Tam cự đầu c&uacute;i đầu xưng thần, cao ngạo qu&yacute; tộc lấy quỳ h&ocirc;n Diệp Thi&ecirc;n mũi ch&acirc;n l&agrave;m vinh.</p>\r\n\r\n<p>Hậu thế chuy&ecirc;n gia khảo cổ th&ocirc;ng qua dấu vết để lại ph&aacute;t hiện, đ&atilde; từng nhất thống tam đại ch&acirc;u Ch&iacute; T&ocirc;n Đại Đế, đ&uacute;ng l&agrave; Rồng Ti&ecirc;n huyết mạch.</p>\r\n\r\n<p><strong>Converter</strong>: ๖ۣۜNhư๖ۣۜ &Yacute;&hearts;๖ۣۜV&ocirc; ๖ۣۜT&agrave;</p>\r\n\r\n<p><strong>Nguồn</strong>: truyencv</p>', 'la-ma-theo-chu-no-den-chi-ton-dai-de-poster-1556646923-220x330.jpg', 0, 2, '2019-10-20 16:30:14', 1);
INSERT INTO `book` VALUES (44, 'c34b1920-f224-11e9-8e55-5d8b9400786a', 'ngontinh.tangthuvien', 2, 'Điền Viên Khuê Sự', 10, '<p>Xuy&ecirc;n qua đến n&ocirc;ng gia, n&agrave;o c&oacute; thể đo&aacute;n được cha mẹ trọng đại nam, Đại tẩu trong tay bảo.</p>\r\n\r\n<p>Chỉ c&oacute; n&agrave;ng, trong mắt mọi người một cọng cỏ.</p>\r\n\r\n<p>Lại nh&igrave;n n&agrave;ng, ngực c&oacute; khe r&atilde;nh</p>\r\n\r\n<p>D&ugrave; l&agrave; một cọng cỏ, cũng muốn trong vườn phải tự cường</p>\r\n\r\n<p>Kiếm Lương tế, tiến t&agrave;i bảo</p>\r\n\r\n<p>Sợi cỏ biến l&ograve; v&agrave;ng.</p>\r\n\r\n<p>Nguồn : ngontinh.tangthuvien</p>', '734AC836-1688-44B8-936E-869D5740286D.jpeg', 0, 1, '2019-10-20 16:30:09', 1);
INSERT INTO `book` VALUES (46, 'e5c133d0-f225-11e9-a483-fb2856622ce6', 'Lâu Vũ Tình', 2, 'Thất Tịch Không Mưa', 20, '<p>Thất tịch: M&ugrave;ng 7 th&aacute;ng 7 &acirc;m lịch, ch&iacute;nh l&agrave; lễ Valentine của Trung Quốc. C&ocirc; sinh ng&agrave;y M&ugrave;ng 7 th&aacute;ng 7 - Ng&agrave;y Thất tịch.</p>\r\n\r\n<p>Từ nhỏ c&ocirc; đ&atilde; thầm y&ecirc;u anh, như số kiếp kh&ocirc;ng thể thay đổi&nbsp;t&igrave;nh y&ecirc;u&nbsp;trong s&aacute;ng ấy, như lần đầu được nếm m&ugrave;i vị của quả khế mới ch&iacute;n. Sau đ&oacute; c&ocirc; v&agrave; anh xa nhau, gặp lại đều c&aacute;ch nhau ba năm. 15 tuổi, anh l&ecirc;n ph&iacute;a bắc học, từ đ&oacute; mất li&ecirc;n lạc; 18 tuổi, c&ocirc; n&ocirc;ng nổi đi gặp anh, đổi lại l&agrave; sự đau l&ograve;ng; 21 tuổi, cuối c&ugrave;ng anh cũng quay về để chịu tang mẹ; 24 tuổi, anh kết h&ocirc;n, đưa người vợ mới cưới tới tận nơi xa. Anh từng l&agrave; thần hộ mệnh của c&ocirc;, dịu d&agrave;ng, cẩn thận che chở, bao dung. Đ&atilde; từng ngoắc tay với c&ocirc;, thề sẽ m&atilde;i m&atilde;i ở b&ecirc;n nhau. C&ocirc; c&oacute; thể mất đi tất cả, nhưng kh&ocirc;ng thể kh&ocirc;ng c&oacute; anh - người hiểu c&ocirc; nhất. Ng&agrave;y 7-7 l&agrave; ng&agrave;y gặp mặt của Ngưu Lang Chức Nữ, mưa ng&agrave;y 7-7 l&agrave; nước mắt của nỗi nhớ nhung vậy. Giờ c&ocirc; 27 tuổi, liệu c&oacute; thể c&oacute; một ng&agrave;y 7-7 kh&ocirc;ng mưa, để c&ocirc; được gặp lại anh một lần nữa...</p>', 'that-tich-khong-mua.jpg', 0, 1, '2019-10-19 11:06:59', 1);
INSERT INTO `book` VALUES (47, '6f813cf0-f25f-11e9-a96a-033f37317a90', 'Voz', 2, 'Nhật ký phòng trọ ma', 24, '<p>Chào các bạn, m&igrave;nh t&ecirc;n là H (kh&ocirc;ng đ&ecirc;̉ đích danh vì m&ocirc;̣t vài lí do, mong các bạn thứ l&ocirc;̃i) m&igrave;nh 23t, truy&ecirc;̣n m&igrave;nh sắp k&ecirc;̉ nghe gi&ocirc;́ng m&ocirc;̣t c&acirc;u truy&ecirc;̣n&nbsp;ma, kì bí, kinh dị nhưng m&igrave;nh cũng chẳng rõ chính xác nó là cái gì nữa, m&igrave;nh chỉ chia sẻ l&ecirc;n đ&acirc;y như m&ocirc;̣t quy&ecirc;̉n nh&acirc;̣t kí tự thu&acirc;̣t của m&igrave;nh v&ecirc;̀ những ngày kinh hoàng mà m&igrave;nh vừa trải qua (có lẽ nó v&acirc;̃n còn ti&ecirc;́p di&ecirc;̃n) và nghĩ rằng chắc các bạn hứng thú với nó (vì m&igrave;nh nghĩ ai mà chẳng thích m&ocirc;̣t c&acirc;u truy&ecirc;̣n kì dị, ma quái sảy ra tr&ecirc;n chính đời thực và được k&ecirc;̉ lại bởi chính nh&acirc;n v&acirc;̣t trong c&acirc;u truy&ecirc;̣n!) còn chuy&ecirc;̣n tin hay kh&ocirc;ng là tuỳ bạn.</p>\r\n\r\n<p>Hi&ecirc;̣n giờ, tính từ ngày bắt đ&acirc;̀u dọn v&ocirc; căn phòng trọ &acirc;́y cũng được g&acirc;̀n 1 tu&acirc;̀n r&ocirc;̀i và m&igrave;nh đang khá r&ocirc;́i loạn v&ecirc;̀ t&acirc;m trí (cứ cho là gặp v&acirc;́n đ&ecirc;̀ v&ecirc;̀ th&acirc;̀n kinh) nhưng ít nh&acirc;́t nó cũng được coi là &ocirc;̉n so với những gì mà m&igrave;nh đã phải trải qua và có lẽ sẽ là bình thường với những gì sắp trải ra. B&acirc;y giờ m&igrave;nh sẽ k&ecirc;̉ cho các bạn nghe v&ecirc;̀ những ngày vừa r&ocirc;̀i và sẽ ti&ecirc;́p tục k&ecirc;̉ v&ecirc;̀ những gì đang sảy ra trong những update sau đó. Vozforums c&ugrave;ng sachvui.com hãy cùng đón nh&acirc;̣n những c&acirc;u truy&ecirc;̣n mà m&igrave;nh cho rằng bạn sẽ thích thú với nó...</p>', 'nhat-ky-phong-tro-ma.jpg', 0, 1, '2019-10-20 18:57:44', 1);
INSERT INTO `book` VALUES (48, '77bc3f90-f29b-11e9-bef1-2b0e9365e7c5', '1', 2, '11111111111', 1, '<p>111111111</p>', '5n6sq31nn.jpg', 0, 0, '2019-10-20 19:01:07', 0);
INSERT INTO `book` VALUES (49, '9a9dd6b0-f331-11e9-b51c-bf94fed89054', '1', 2, 'Admin', 1, '<p>aaaaaaaaaa</p>', '5n6sq31nn.jpg', 0, 0, '2019-10-20 19:03:18', 0);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'ffeab940-f029-11e9-b3da-2b9f6b2bacda', 'Xuyên Không', 1);
INSERT INTO `category` VALUES (3, '58abe900-f02a-11e9-8a54-cdab7ed23bc1', 'Ngôn Tình', 1);
INSERT INTO `category` VALUES (4, '9a4b95e0-f0eb-11e9-a44a-c16f17820126', 'Trinh Thám', 1);
INSERT INTO `category` VALUES (5, '9cb6b140-f0eb-11e9-8f45-ef6188731d4f', 'Cổ Đại', 1);
INSERT INTO `category` VALUES (6, '9f4a1170-f0eb-11e9-a723-0d77dc478aeb', 'Kinh Dị', 1);
INSERT INTO `category` VALUES (7, 'a23d9a10-f0eb-11e9-b3cc-fb0381ceeef0', 'Hiện Đại', 1);

-- ----------------------------
-- Table structure for chap
-- ----------------------------
DROP TABLE IF EXISTS `chap`;
CREATE TABLE `chap`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idbook` int(10) UNSIGNED NOT NULL,
  `chapnumber` int(10) UNSIGNED NOT NULL,
  `filename` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `createdate` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_chap_book`(`idbook`) USING BTREE,
  CONSTRAINT `FK_chap_book` FOREIGN KEY (`idbook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chap
-- ----------------------------
INSERT INTO `chap` VALUES (9, 41, 1, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '11wwwwwwwwwwww', '2019-10-18 23:05:14', 1);
INSERT INTO `chap` VALUES (10, 41, 2, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '2', '2019-10-18 23:05:14', 0);
INSERT INTO `chap` VALUES (11, 41, 4, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '4', '2019-10-18 23:05:14', 11);
INSERT INTO `chap` VALUES (12, 44, 1, 'Am-Tham-Ben-Em-Son-Tung-M-TP.mp3', '1', '2019-10-19 10:58:52', 1);
INSERT INTO `chap` VALUES (13, 44, 2, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '2', '2019-10-19 10:58:52', 1);
INSERT INTO `chap` VALUES (14, 46, 1, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', 'Chương 1', '2019-10-19 11:06:59', 1);
INSERT INTO `chap` VALUES (15, 46, 1, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', 'Chương 2', '2019-10-19 11:06:59', 1);
INSERT INTO `chap` VALUES (16, 46, 3, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', 'Chương 3', '2019-10-19 11:06:59', 1);
INSERT INTO `chap` VALUES (17, 41, 3, 'Am-Tham-Ben-Em-Son-Tung-M-TP.mp3', '3', '2019-10-19 11:22:50', 1);
INSERT INTO `chap` VALUES (18, 41, 5, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '1', '2019-10-19 11:25:35', 1);
INSERT INTO `chap` VALUES (19, 47, 1, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '1', '2019-10-19 17:58:51', 1);
INSERT INTO `chap` VALUES (20, 47, 2, 'Am-Tham-Ben-Em-Son-Tung-M-TP.mp3', '2', '2019-10-19 17:58:51', 1);
INSERT INTO `chap` VALUES (21, 48, 1, 'Am-Tham-Ben-Em-Son-Tung-M-TP.mp3', '1', '2019-10-20 01:08:35', 1);
INSERT INTO `chap` VALUES (22, 49, 1, 'Noi-Nay-Co-Anh-Son-Tung-M-TP.mp3', '1', '2019-10-20 19:03:18', 1);

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `bookid` int(10) UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `createdate` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_comment_users`(`userid`) USING BTREE,
  INDEX `FK_comment_book`(`bookid`) USING BTREE,
  CONSTRAINT `FK_comment_book` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_comment_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1, 2, 44, '<p>Xuy&ecirc;n qua đến n&ocirc;ng gia, n&agrave;o c&oacute; thể đo&aacute;n được cha mẹ trọng đại nam, Đại tẩu trong tay bảo.</p>', '2019-10-20 14:39:01', 1);
INSERT INTO `comment` VALUES (2, 2, 44, '<p>Diệp Thi&ecirc;n mang theo mạnh nhất chủ n&ocirc; hệ thống xuy&ecirc;n việt thời La M&atilde; cổ đại.</p>', '2019-10-20 14:50:01', 1);
INSERT INTO `comment` VALUES (3, 2, 44, 'ddđ', '2019-10-20 16:24:49', 1);
INSERT INTO `comment` VALUES (4, 2, 44, 'Truyện hay', '2019-10-20 16:24:58', 1);
INSERT INTO `comment` VALUES (5, 2, 41, 'ssssssss', '2019-10-20 16:30:46', 1);
INSERT INTO `comment` VALUES (6, 3, 44, 'a', '2019-10-20 17:46:35', 1);
INSERT INTO `comment` VALUES (7, 3, 44, 's', '2019-10-20 17:47:36', 1);
INSERT INTO `comment` VALUES (8, 3, 44, 's', '2019-10-21 22:17:34', 1);
INSERT INTO `comment` VALUES (9, 3, 44, 'fffffffff', '2019-10-21 22:17:40', 1);
INSERT INTO `comment` VALUES (10, 3, 44, 's', '2019-10-25 23:18:37', 1);
INSERT INTO `comment` VALUES (11, 2, 46, 'Truyện Hay', '2019-11-10 10:45:54', 1);

-- ----------------------------
-- Table structure for follow
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `bookid` int(10) UNSIGNED NOT NULL,
  `createdate` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `status` int(11) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_follow_users`(`userid`) USING BTREE,
  INDEX `FK_follow_book`(`bookid`) USING BTREE,
  CONSTRAINT `FK_follow_book` FOREIGN KEY (`bookid`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_follow_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of follow
-- ----------------------------
INSERT INTO `follow` VALUES (9, 3, 41, '2020-06-09 16:04:40', 1);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT 10,
  `book_id` int(10) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 3, 10, 44, '2020-04-06 15:09:41', '2020-06-09 15:09:41');
INSERT INTO `orders` VALUES (2, 3, 10, 41, '2020-05-06 15:10:51', '2020-06-09 15:10:51');
INSERT INTO `orders` VALUES (3, 3, 10, 41, '2020-06-09 16:03:14', '2020-06-09 16:03:14');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(10) UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `categoryid` int(10) UNSIGNED NOT NULL,
  `bookname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(10) UNSIGNED NOT NULL,
  `createdate` timestamp(0) NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_request_users`(`userid`) USING BTREE,
  INDEX `FK_request_category`(`categoryid`) USING BTREE,
  CONSTRAINT `FK_request_category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_request_users` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request
-- ----------------------------
INSERT INTO `request` VALUES (1, 2, 'Cập Nhật Chap Mới Đi Ad', 3, 'điền viên', 1, '2019-11-10 11:14:08');
INSERT INTO `request` VALUES (3, 2, 'Cập Nhật chap Mới Đi Ad', 5, 'Thất Tịch', 1, '2019-11-10 12:23:11');

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idbook` int(10) UNSIGNED NOT NULL,
  `categoryid` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK__book`(`idbook`) USING BTREE,
  INDEX `FK__category`(`categoryid`) USING BTREE,
  CONSTRAINT `FK__book` FOREIGN KEY (`idbook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__category` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tag
-- ----------------------------
INSERT INTO `tag` VALUES (1, 41, 1, 1);
INSERT INTO `tag` VALUES (2, 41, 5, 1);
INSERT INTO `tag` VALUES (7, 44, 4, 0);
INSERT INTO `tag` VALUES (8, 44, 5, 1);
INSERT INTO `tag` VALUES (9, 44, 7, 0);
INSERT INTO `tag` VALUES (11, 46, 6, 0);
INSERT INTO `tag` VALUES (12, 47, 1, 0);
INSERT INTO `tag` VALUES (13, 47, 5, 0);
INSERT INTO `tag` VALUES (14, 47, 5, 0);
INSERT INTO `tag` VALUES (15, 47, 4, 0);
INSERT INTO `tag` VALUES (16, 48, 4, 1);
INSERT INTO `tag` VALUES (17, 48, 5, 1);
INSERT INTO `tag` VALUES (18, 41, 3, 1);
INSERT INTO `tag` VALUES (19, 44, 1, 1);
INSERT INTO `tag` VALUES (20, 49, 3, 1);
INSERT INTO `tag` VALUES (21, 49, 4, 1);
INSERT INTO `tag` VALUES (22, 46, 3, 1);
INSERT INTO `tag` VALUES (23, 47, 4, 1);
INSERT INTO `tag` VALUES (24, 47, 4, 1);
INSERT INTO `tag` VALUES (25, 47, 6, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isadmin` int(4) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp,
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `amount` bigint(15) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'Admin', 'admin@gmail.com', '$2y$10$mdoFGxkbThkXicqf.Km.WOI4su.a1DjyKGfeOXGvgc3qgf2LiFeDO', NULL, 1, '2019-10-16 14:35:49', '2020-06-08 22:46:34', '2020-06-08 22:46:33', 0);
INSERT INTO `users` VALUES (3, 'ABC', '123@gmail.com', '$2y$10$/w.ZYuvUaYwlAL3PyCp/G.APAakteuqzFChZwN7HSnd7ikJcHEP/6', NULL, 0, '2019-10-20 17:30:19', '2020-06-09 16:03:14', '2020-06-08 22:46:30', 1010);

SET FOREIGN_KEY_CHECKS = 1;
