-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2021 lúc 12:34 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `techwiz`
--

DELIMITER $$
--
-- Các hàm
--
CREATE DEFINER=`root`@`localhost` FUNCTION `random_integer` (`value_minimum` INT, `value_maximum` INT) RETURNS INT(11) RETURN FLOOR(value_minimum + RAND() * (value_maximum - value_minimum + 1))$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `administrativedivisions`
--

CREATE TABLE `administrativedivisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentId` tinyint(4) DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `nearBy_1` int(11) DEFAULT NULL,
  `nearBy_2` int(11) DEFAULT NULL,
  `nearBy_3` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `administrativedivisions`
--

INSERT INTO `administrativedivisions` (`id`, `name`, `parentId`, `type`, `nearBy_1`, `nearBy_2`, `nearBy_3`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ha Noi', 0, 0, 0, 0, 0, 1, NULL, NULL),
(2, 'Ho Chi Minh', 0, 0, 0, 0, 0, 1, NULL, NULL),
(3, 'Ba Dinh', 1, 1, 6, 9, 13, 1, NULL, NULL),
(4, 'Bac Tu Liem', 1, 1, 5, 12, 13, 1, NULL, NULL),
(5, 'Cau Giay', 1, 1, 4, 12, 13, 1, NULL, NULL),
(6, 'Dong Da', 1, 1, 3, 8, 14, 1, NULL, NULL),
(7, 'Ha Dong', 1, 1, 12, 14, 0, 1, NULL, NULL),
(8, 'Hai Ba Trung', 1, 1, 6, 10, 11, 1, NULL, NULL),
(9, 'Hoan Kiem', 1, 1, 3, 11, 6, 1, NULL, NULL),
(10, 'Hoang Mai', 1, 1, 8, 11, 14, 1, NULL, NULL),
(11, 'Long Bien', 1, 1, 8, 9, 10, 1, NULL, NULL),
(12, 'Nam Tu Liem', 1, 1, 4, 5, 7, 1, NULL, NULL),
(13, 'Tay Ho', 1, 1, 3, 4, 5, 1, NULL, NULL),
(14, 'Thanh Xuan', 1, 1, 6, 7, 10, 1, NULL, NULL),
(15, 'Cong Vi', 3, 2, 6, 9, 13, 1, NULL, NULL),
(16, 'Dien Bien', 3, 2, 6, 9, 13, 1, NULL, NULL),
(17, 'Doi Can', 3, 2, 6, 9, 13, 1, NULL, NULL),
(18, 'Giang Vo', 3, 2, 6, 9, 13, 1, NULL, NULL),
(19, 'Kim Ma', 3, 2, 6, 9, 13, 1, NULL, NULL),
(20, 'Lieu Giai', 3, 2, 6, 9, 13, 1, NULL, NULL),
(21, 'Ngoc Ha', 3, 2, 6, 9, 13, 1, NULL, NULL),
(22, 'Ngoc Khanh', 3, 2, 6, 9, 13, 1, NULL, NULL),
(23, 'Nguyen Trung Truc', 3, 2, 6, 9, 13, 1, NULL, NULL),
(24, 'Phuc Xa', 3, 2, 6, 9, 13, 1, NULL, NULL),
(25, 'Quan Thanh', 3, 2, 6, 9, 13, 1, NULL, NULL),
(26, 'Thanh Cong', 3, 2, 6, 9, 13, 1, NULL, NULL),
(27, 'Truc Bach', 3, 2, 6, 9, 13, 1, NULL, NULL),
(28, 'Vinh Phuc', 3, 2, 6, 9, 13, 1, NULL, NULL),
(29, 'Co Nhue 1', 4, 2, 5, 12, 13, 1, NULL, NULL),
(30, 'Co Nhue 2', 4, 2, 5, 12, 13, 1, NULL, NULL),
(31, 'Dong Ngac', 4, 2, 5, 12, 13, 1, NULL, NULL),
(32, 'Duc Thang', 4, 2, 5, 12, 13, 1, NULL, NULL),
(33, 'Lien Mac', 4, 2, 5, 12, 13, 1, NULL, NULL),
(34, 'Minh Khai', 4, 2, 5, 12, 13, 1, NULL, NULL),
(35, 'Phu Dien', 4, 2, 5, 12, 13, 1, NULL, NULL),
(36, 'Phuc Dien', 4, 2, 5, 12, 13, 1, NULL, NULL),
(37, 'Tay Tuu', 4, 2, 5, 12, 13, 1, NULL, NULL),
(38, 'Thuong Cat', 4, 2, 5, 12, 13, 1, NULL, NULL),
(39, 'Xuan Dinh', 4, 2, 5, 12, 13, 1, NULL, NULL),
(40, 'Xuan Tao', 4, 2, 5, 12, 13, 1, NULL, NULL),
(41, 'Thuy Phuong', 4, 2, 5, 12, 13, 1, NULL, NULL),
(42, 'Nghia Do', 5, 2, 4, 12, 13, 1, NULL, NULL),
(43, 'Quan Hoa', 5, 2, 4, 12, 13, 1, NULL, NULL),
(44, 'Dich Vong', 5, 2, 4, 12, 13, 1, NULL, NULL),
(45, 'Dich Vong Hau', 5, 2, 4, 12, 13, 1, NULL, NULL),
(46, 'Trung Hoa', 5, 2, 4, 12, 13, 1, NULL, NULL),
(47, 'Nghia Tan', 5, 2, 4, 12, 13, 1, NULL, NULL),
(48, 'Mai Dich', 5, 2, 4, 12, 13, 1, NULL, NULL),
(49, 'Yen Hoa', 5, 2, 4, 12, 13, 1, NULL, NULL),
(50, 'Van Mieu', 6, 2, 3, 8, 14, 1, NULL, NULL),
(51, 'Quoc Tu Giam', 6, 2, 3, 8, 14, 1, NULL, NULL),
(52, 'Hang Bot', 6, 2, 3, 8, 14, 1, NULL, NULL),
(53, 'Nam Dong', 6, 2, 3, 8, 14, 1, NULL, NULL),
(54, 'Trung Liet', 6, 2, 3, 8, 14, 1, NULL, NULL),
(55, 'Kham Thien', 6, 2, 3, 8, 14, 1, NULL, NULL),
(56, 'Phuong Lien', 6, 2, 3, 8, 14, 1, NULL, NULL),
(57, 'Phuong Mai', 6, 2, 3, 8, 14, 1, NULL, NULL),
(58, 'Khuong Thuong', 6, 2, 3, 8, 14, 1, NULL, NULL),
(59, 'Nga Tu So', 6, 2, 3, 8, 14, 1, NULL, NULL),
(60, 'Lang Thuong', 6, 2, 3, 8, 14, 1, NULL, NULL),
(61, 'Cat Linh', 6, 2, 3, 8, 14, 1, NULL, NULL),
(62, 'Van Chuong', 6, 2, 3, 8, 14, 1, NULL, NULL),
(63, 'O Cho Dua', 6, 2, 3, 8, 14, 1, NULL, NULL),
(64, 'Quang Trung', 6, 2, 3, 8, 14, 1, NULL, NULL),
(65, 'Tho Quan', 6, 2, 3, 8, 14, 1, NULL, NULL),
(66, 'Trung Phung', 6, 2, 3, 8, 14, 1, NULL, NULL),
(67, 'Kim Lien', 6, 2, 3, 8, 14, 1, NULL, NULL),
(68, 'Trung Tu', 6, 2, 3, 8, 14, 1, NULL, NULL),
(69, 'Thinh Quang', 6, 2, 3, 8, 14, 1, NULL, NULL),
(70, 'Lang Ha', 6, 2, 3, 8, 14, 1, NULL, NULL),
(71, 'Quang Trung', 7, 2, 12, 14, 0, 1, NULL, NULL),
(72, 'Nguyen Trai', 7, 2, 12, 14, 0, 1, NULL, NULL),
(73, 'Ha Cau', 7, 2, 12, 14, 0, 1, NULL, NULL),
(74, 'Van Phuc', 7, 2, 12, 14, 0, 1, NULL, NULL),
(75, 'Phuc La', 7, 2, 12, 14, 0, 1, NULL, NULL),
(76, 'Yet Kieu', 7, 2, 12, 14, 0, 1, NULL, NULL),
(77, 'Mo Lao', 7, 2, 12, 14, 0, 1, NULL, NULL),
(78, 'Van Quan', 7, 2, 12, 14, 0, 1, NULL, NULL),
(79, 'La Khe', 7, 2, 12, 14, 0, 1, NULL, NULL),
(80, 'Phu La', 7, 2, 12, 14, 0, 1, NULL, NULL),
(81, 'Kien Hung', 7, 2, 12, 14, 0, 1, NULL, NULL),
(82, 'Yen Nghia', 7, 2, 12, 14, 0, 1, NULL, NULL),
(83, 'Phu Luong', 7, 2, 12, 14, 0, 1, NULL, NULL),
(84, 'Phu Lam', 7, 2, 12, 14, 0, 1, NULL, NULL),
(85, 'Duong Noi', 7, 2, 12, 14, 0, 1, NULL, NULL),
(86, 'Bien Giang', 7, 2, 12, 14, 0, 1, NULL, NULL),
(87, 'Dong Mai', 7, 2, 12, 14, 0, 1, NULL, NULL),
(88, 'Nguyen Du', 8, 2, 6, 10, 11, 1, NULL, NULL),
(89, 'Bui Thi Xuan', 8, 2, 6, 10, 11, 1, NULL, NULL),
(90, 'Ngo Thi Nham', 8, 2, 6, 10, 11, 1, NULL, NULL),
(91, 'Dong Nhan', 8, 2, 6, 10, 11, 1, NULL, NULL),
(92, 'Bach Dang', 8, 2, 6, 10, 11, 1, NULL, NULL),
(93, 'Thanh Nhan', 8, 2, 6, 10, 11, 1, NULL, NULL),
(94, 'Bach Khoa', 8, 2, 6, 10, 11, 1, NULL, NULL),
(95, 'Vinh Tuy', 8, 2, 6, 10, 11, 1, NULL, NULL),
(96, 'Truong Dinh', 8, 2, 6, 10, 11, 1, NULL, NULL),
(97, 'Le Dai Hanh', 8, 2, 6, 10, 11, 1, NULL, NULL),
(98, 'Pho Hue', 8, 2, 6, 10, 11, 1, NULL, NULL),
(99, 'Pham Dinh Ho', 8, 2, 6, 10, 11, 1, NULL, NULL),
(100, 'Dong Mac', 8, 2, 6, 10, 11, 1, NULL, NULL),
(101, 'Thanh Luong', 8, 2, 6, 10, 11, 1, NULL, NULL),
(102, 'Cau Den', 8, 2, 6, 10, 11, 1, NULL, NULL),
(103, 'Bach Mai', 8, 2, 6, 10, 11, 1, NULL, NULL),
(104, 'Quynh Mai', 8, 2, 6, 10, 11, 1, NULL, NULL),
(105, 'Minh Khai', 8, 2, 6, 10, 11, 1, NULL, NULL),
(106, 'Dong Tam', 8, 2, 6, 10, 11, 1, NULL, NULL),
(107, 'Quynh Loi', 8, 2, 6, 10, 11, 1, NULL, NULL),
(108, 'Chuong Duong Do', 9, 2, 3, 11, 6, 1, NULL, NULL),
(109, 'Cua Dong', 9, 2, 3, 11, 6, 1, NULL, NULL),
(110, 'Cua Nam', 9, 2, 3, 11, 6, 1, NULL, NULL),
(111, 'Dong Xuan', 9, 2, 3, 11, 6, 1, NULL, NULL),
(112, 'Hang Bac', 9, 2, 3, 11, 6, 1, NULL, NULL),
(113, 'Hang Bai', 9, 2, 3, 11, 6, 1, NULL, NULL),
(114, 'Hang Bo', 9, 2, 3, 11, 6, 1, NULL, NULL),
(115, 'Hang Bong', 9, 2, 3, 11, 6, 1, NULL, NULL),
(116, 'Hang Buom', 9, 2, 3, 11, 6, 1, NULL, NULL),
(117, 'Hang Dao', 9, 2, 3, 11, 6, 1, NULL, NULL),
(118, 'Hang Gai', 9, 2, 3, 11, 6, 1, NULL, NULL),
(119, 'Hang Ma', 9, 2, 3, 11, 6, 1, NULL, NULL),
(120, 'Hang Trong', 9, 2, 3, 11, 6, 1, NULL, NULL),
(121, 'Ly Thai To', 9, 2, 3, 11, 6, 1, NULL, NULL),
(122, 'Phan Chu Trinh', 9, 2, 3, 11, 6, 1, NULL, NULL),
(123, 'Phuc Tan', 9, 2, 3, 11, 6, 1, NULL, NULL),
(124, 'Tran Hung Dao', 9, 2, 3, 11, 6, 1, NULL, NULL),
(125, 'Trang Tien', 9, 2, 3, 11, 6, 1, NULL, NULL),
(126, 'Dinh Cong', 10, 2, 8, 11, 14, 1, NULL, NULL),
(127, 'Dai Kim', 10, 2, 8, 11, 14, 1, NULL, NULL),
(128, 'Giap Bat', 10, 2, 8, 11, 14, 1, NULL, NULL),
(129, 'Hoang Liet', 10, 2, 8, 11, 14, 1, NULL, NULL),
(130, 'Hoang Van Thu', 10, 2, 8, 11, 14, 1, NULL, NULL),
(131, 'Linh Nam', 10, 2, 8, 11, 14, 1, NULL, NULL),
(132, 'Mai Dong', 10, 2, 8, 11, 14, 1, NULL, NULL),
(133, 'Tan Mai', 10, 2, 8, 11, 14, 1, NULL, NULL),
(134, 'Thanh Tri', 10, 2, 8, 11, 14, 1, NULL, NULL),
(135, 'Thinh Liet', 10, 2, 8, 11, 14, 1, NULL, NULL),
(136, 'Tran Phu', 10, 2, 8, 11, 14, 1, NULL, NULL),
(137, 'Tuong Mai', 10, 2, 8, 11, 14, 1, NULL, NULL),
(138, 'Vinh Hung', 10, 2, 8, 11, 14, 1, NULL, NULL),
(139, 'Yen So', 10, 2, 8, 11, 14, 1, NULL, NULL),
(140, 'Bo De', 11, 2, 8, 9, 10, 1, NULL, NULL),
(141, 'Gia Thuy', 11, 2, 8, 9, 10, 1, NULL, NULL),
(142, 'Cu Khoi', 11, 2, 8, 9, 10, 1, NULL, NULL),
(143, 'Duc Giang', 11, 2, 8, 9, 10, 1, NULL, NULL),
(144, 'Long Bien', 11, 2, 8, 9, 10, 1, NULL, NULL),
(145, 'Ngoc Lam', 11, 2, 8, 9, 10, 1, NULL, NULL),
(146, 'Ngoc Thuy', 11, 2, 8, 9, 10, 1, NULL, NULL),
(147, 'Phuc Dong', 11, 2, 8, 9, 10, 1, NULL, NULL),
(148, 'Phuc Loi', 11, 2, 8, 9, 10, 1, NULL, NULL),
(149, 'Sai Dong', 11, 2, 8, 9, 10, 1, NULL, NULL),
(150, 'Thach Ban', 11, 2, 8, 9, 10, 1, NULL, NULL),
(151, 'Thuong Thanh', 11, 2, 8, 9, 10, 1, NULL, NULL),
(152, 'Viet Hung', 11, 2, 8, 9, 10, 1, NULL, NULL),
(153, 'Giang Bien', 11, 2, 8, 9, 10, 1, NULL, NULL),
(154, 'Nam Tu Liem', 12, 2, 4, 5, 7, 1, NULL, NULL),
(155, 'Dai Mo', 12, 2, 4, 5, 7, 1, NULL, NULL),
(156, 'Me Tri', 12, 2, 4, 5, 7, 1, NULL, NULL),
(157, 'Mi Dinh 1', 12, 2, 4, 5, 7, 1, NULL, NULL),
(158, 'Mi Dinh 2', 12, 2, 4, 5, 7, 1, NULL, NULL),
(159, 'Phu Do', 12, 2, 4, 5, 7, 1, NULL, NULL),
(160, 'Phuong Canh', 12, 2, 4, 5, 7, 1, NULL, NULL),
(161, 'Tay Mo', 12, 2, 4, 5, 7, 1, NULL, NULL),
(162, 'Trung Van', 12, 2, 4, 5, 7, 1, NULL, NULL),
(163, 'Xuan Phuong', 12, 2, 4, 5, 7, 1, NULL, NULL),
(164, 'Buoi', 13, 2, 3, 4, 5, 1, NULL, NULL),
(165, 'Thuy Khue', 13, 2, 3, 4, 5, 1, NULL, NULL),
(166, 'Yen Phu', 13, 2, 3, 4, 5, 1, NULL, NULL),
(167, 'Tu Lien', 13, 2, 3, 4, 5, 1, NULL, NULL),
(168, 'Nhat Tan', 13, 2, 3, 4, 5, 1, NULL, NULL),
(169, 'Quang An', 13, 2, 3, 4, 5, 1, NULL, NULL),
(170, 'Xuan La', 13, 2, 3, 4, 5, 1, NULL, NULL),
(171, 'Phu Thuong', 13, 2, 3, 4, 5, 1, NULL, NULL),
(172, 'Ha Dinh', 14, 2, 6, 7, 10, 1, NULL, NULL),
(173, 'Kim Giang', 14, 2, 6, 7, 10, 1, NULL, NULL),
(174, 'Khuong Dinh', 14, 2, 6, 7, 10, 1, NULL, NULL),
(175, 'Khuong Mai', 14, 2, 6, 7, 10, 1, NULL, NULL),
(176, 'Khuong Trung', 14, 2, 6, 7, 10, 1, NULL, NULL),
(177, 'Nhan Chinh', 14, 2, 6, 7, 10, 1, NULL, NULL),
(178, 'Phuong Liet', 14, 2, 6, 7, 10, 1, NULL, NULL),
(179, 'Thanh Xuan Bac', 14, 2, 6, 7, 10, 1, NULL, NULL),
(180, 'Thanh Xuan Nam', 14, 2, 6, 7, 10, 1, NULL, NULL),
(181, 'Thanh Xuan Trung', 14, 2, 6, 7, 10, 1, NULL, NULL),
(182, 'Thuong Dinh', 14, 2, 6, 7, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--CREATE TABLE `restaurants` (
`id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `houseNumber` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` double(8,2) DEFAULT 5.00,
  `keywords` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `district`, `municipality`, `street`, `houseNumber`, `stars`, `keywords`, `is_active`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Kitchen of Nang Tho - Office Rice Online', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '255 Xuan Dinh', '0000000001', 5.00, 'rice', 1, NULL, NULL, 'https://afamilycdn.com/2018/photo-1-1515510430406.jpg'),
(7, 'Uncle Tieu - Toast With Chili Salt & Sauce', 'Ha Noi', 'Bac Tu Liem', 'Phu Dien', '382 Phu Dien', '0000000002', 5.00, '', 1, NULL, NULL, 'https://img-global.cpcdn.com/recipes/3da578e72b3437a9/751x532cq70/banh-mi-n%C6%B0%E1%BB%9Bng-mu%E1%BB%91i-%E1%BB%9Bt-d%C6%A1n-gi%E1%BA%A3n-ma-ngon-recipe-main-photo.jpg'),
(8, 'Delicious Porridge Every Day', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '335 Xuan Dinh', '0000000003', 5.00, '', 1, NULL, NULL, 'https://pastaxi-manager.onepas.vn/content/uploads/articles/10-cach-nau-chao-ngon/10-cach-nau-chao-ngon-2.jpg'),
(9, 'Minh Hang - Delicious Xoi & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Duc Thang', '15 Thuong Thu', '0000000004', 5.00, '', 1, NULL, NULL, 'https://media.truyenhinhdulich.vn/upload/news/1004_nhung_hang_xoi_xeo_ngon_quen_loi_ve_o_ha_noi.jpg'),
(10, 'Royaltea - 119 Co Nhue Alley', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 2', '311 Phu Dien', '0000000005', 5.00, '', 1, NULL, NULL, 'https://media.foody.vn/res/g79/787269/prof/s/foody-upload-api-foody-mobile-51-200702104110.jpg'),
(11, 'Roasted Duck Sticky Rice 88 - Snails, Hot Pot & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 1', '123 Co Nhue 1', '0000000006', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g106/1058535/prof/s640x400/foody-upload-api-foody-mobile-foody-mobile-vit2-jp-201204160646.jpg'),
(48, 'Tiger Sugar - Pham Tuan Tai', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '0987654321', 5.00, '', 1, NULL, NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTR5QVIoN5VaVAifuCCqwlgPffIdJdxLJUjjKunXCKUFzB4eigOD7Jq2cuHfWH4jzxHW4A&usqp=CAU'),
(49, 'Bun Cha Trang Huy', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '0987654221', 5.00, '', 1, NULL, NULL, 'https://d1sag4ddilekf6.cloudfront.net/compressed/items/VNITE2019080209270039741/photo/03d31a620fa7443b873d4ed26cf6bbf3_1564751903711082547.jpeg'),
(50, 'Ha Long Pearl Yogurt', 'Ha Noi', 'Cau Giay', 'Yen Hoa', 'Nguyen Khang', '0987654657', 5.00, '', 1, NULL, NULL, 'https://horecavn.com/uploads/images/hinh-anh/gia-nhuong-quyen-mo-hinh-sua-chua-tran-chau-la-bao-nhieu(1).jpg'),
(51, 'Teens Food - Snacks', 'Ha Noi', 'Cau Giay', 'Trung Hoa', '123 Pham Tuan Tai', '09372838283', 5.00, '', 1, NULL, NULL, 'https://skp.com.vn/wp-content/uploads/2021/03/tim-hieu-net-dac-trung-trong-van-hoa-am-thuc-nguoi-my-tim-hieu-net-dac-trung-trong-van-hoa-am-thuc-nguoi-my-3.jpg'),
(52, 'Korean Kitchen - Bếp Hàn Online', 'Ha Noi', 'Cau Giay', 'Quan Hoa', 'Tran Quoc Hoan', '0003054321', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g19/189507/prof/s576x330/image-7c1e40b9-200910115810.jpeg'),
(53, 'Chimico - Mixed Rice & Garlic Kimchi', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Xuan Thuy', '0987654392', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g70/691461/prof/s576x330/foody-upload-api-foody-mobile-ct-jpg-181112131713.jpg'),
(54, 'Snow Hotpot - Tomyum Thai Hotpot & Barbecue Buffet', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '09999999991', 5.00, '', 1, NULL, NULL, 'https://toplist.vn/images/800px/bangkok-bbq-buffet-504660.jpg'),
(55, 'Alo Sushi - Ham Nghi', 'Ha Noi', 'Cau Giay', 'Nghia Tan', '123 Pham Tuan Tai', '9382761532', 5.00, '', 1, NULL, NULL, 'https://pasgo.vn/Upload/anh-chi-tiet/nha-hang-alo-sushi-ham-nghi-2-normal-1926039550130.jpg'),
(56, 'Fuji Bin - Japanese Restaurant', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654323', 5.00, '', 1, NULL, NULL, 'https://cdn.pastaxi-manager.onepas.vn/content/uploads/articles/vuvu/fujibin/nha-hang-fujibin-le-van-luong-23.jpg'),
(57, 'XP Veggie - Đồ Ăn Chay Homemade Online', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654324', 5.00, '', 1, NULL, NULL, 'https://media.foody.vn/res/g10/91820/prof/s/foody-mobile-chay-k-jpg-130-636300194563091328.jpg'),
(58, 'Chay Riệu Thiện - Đồ Ăn Vặt Online', 'Ha Noi', 'Cau Giay', 'Nghia Do', '123 Pham Tuan Tai', '0987654325', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g102/1012090/prof/s576x330/foody-upload-api-foody-mobile-8-157089793129714243-200309153815.jpg'),
(59, 'Khanh Ngoc - Steamed Rice & Fast Food - Shop Online', 'Ha Noi', 'Cau Giay', 'Nghia Tan', '123 Pham Tuan Tai', '0987654326', 5.00, '', 1, NULL, NULL, 'https://sayhi.vn/blog/wp-content/uploads/2019/01/anvat3.jpg'),
(60, 'Kim Lien - Vermicelli, Vermicelli & Crab Cake', 'Ha Noi', 'Cau Giay', 'Nghia Do', '123 Pham Tuan Tai', '0987654327', 5.00, '', 1, NULL, NULL, 'https://cdn.tgdd.vn/2020/11/CookRecipe/Avatar/bun-rieu-cua-dong-thumbnail-1.jpg'),
(61, 'Chinese Snacks', 'Ha Noi', 'Cau Giay', 'Mai Dich', '123 Pham Tuan Tai', '0987654328', 5.00, '', 1, NULL, NULL, 'http://tapchieva.net/wp-content/uploads/2014/12/%E1%BA%A8m-th%E1%BB%B1c-Hongkong-%C4%91%E1%BB%99c-%C4%91%C3%A1o-v%C3%A0-%C4%91a-s%E1%BA%AFc.jpg'),
(62, 'Food Vi Thien - Chinese Cuisine', 'Ha Noi', 'Cau Giay', 'Mai Dich', '123 Pham Viet Xuan', '0987654338', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g26/252754/prof/s576x330/foody-upload-api-foody-mobile-tvt-190404143257.jpg'),
(63, 'Great Wall - Chinese Delivery', 'Ha Noi', 'Cau Giay', 'Mai Dich', '123 Tran Duy Hung', '0987654348', 5.00, '', 1, NULL, NULL, 'https://lh3.googleusercontent.com/proxy/oqEr7TzYWgaZxxDgG9EkEjwh5A40J3RpBWFuOqJJjaqiUJY0GI-YD2KZo2tf-dyfohcAqU7_wB7XH41-oF3MDu1JJ05SjVl85oDpKSyZ'),
(64, 'Burger +++ - Shop Online', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Dung Tuy', '0987654331', 5.00, '', 1, NULL, NULL, 'https://images.foody.vn/res/g104/1030953/prof/s1242x600/foody-upload-api-foody-mobile-350-200619160125.jpg'),
(65, 'Fish Noodles Minh Soc', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '094354328', 5.00, '', 1, NULL, NULL, 'https://www.iunauan.com/images/500x310/anh1-iunauan.com-qjxlrr731465000.jpg?1490447281651'),
(99, 'Sushi Kei', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', ' 10A Ton That Thuyet', '0987648382', 5.00, 'sushi, ton that thuyet, sushi kei', 1, NULL, NULL, 'https://images.unsplash.com/photo-1611143669185-af224c5e3252?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=890&q=80');

CREATE TABLE `users` (
                         `id` int(10) UNSIGNED NOT NULL,
                         `phoneNumber` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `userName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `firstName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `lastName` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `restaurantId` int(10) UNSIGNED DEFAULT NULL,
                         `type` tinyint(4) NOT NULL DEFAULT 1,
                         `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `phoneNumber`, `userName`, `firstName`, `lastName`, `password`, `gender`, `picture`, `mail`, `restaurantId`, `type`, `is_active`) VALUES
(1, '0987654321', '_1admin1', 'Hoang', 'Hoang', '$2y$10$O6GuHaSnQahQMf/10ym2oOp1HA5V5DzsniACtTj3foy31BfOqcoMi', 'male', 'http://img/', 'admin1@gmail.com', 1, 1, 1),
(2, '0987654322', '_1admin2', 'Hoang', 'Hoang', '$2y$10$vabpLQZv8T04omWp.9ZkIukcFrY6zvp9hpkN2jyQZW9bEEfyiGKDG', 'female', 'http://img/', 'admin2@gmail.com', 1, 1, 1),
(3, '0987654323', '_1admin3', 'Duong', 'Duy', '$2y$10$r7IbypgfzdwPbucCHZQttur3zXUMjWrVQtdGMZtAfzhdZgbxqD98u', 'male', 'http://img/', 'admin3@gmail.com', 1, 1, 1),
(6, '09876544309', '_7admin1', 'Hoang', 'Huy', '$2y$10$r7IbypgfzdwPbucCHZQttur3zXUMjWrVQtdGMZtAfzhdZgbxqD98u', 'male', '', '7admin@gmail.com', 7, 1, 1),
(7, '0988766887', 'phh997', 'Nan', 'Tyu', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'male', 'http://img/', 'hoanghuy2397@gmail.com', NULL, 2, 1),
(38, '0988766547', 'user001', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user001@gmail.com', NULL, 2, 1),
(39, '0988764887', 'user002', 'Pai', 'Nalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'male', 'http://img/', 'user002@gmail.com', NULL, 2, 1),
(40, '0988763877', 'user003', 'Kei', 'Palle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user003@gmail.com', NULL, 2, 1),
(41, '0988762867', 'user004', 'Kun', 'Aalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'male', 'http://img/', 'user004@gmail.com', NULL, 2, 1),
(42, '09887631877', 'user005', 'Ang', 'Dalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user005@gmail.com', NULL, 2, 1),
(43, '0988762187', 'user006', 'Ble', 'Ealle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user006@gmail.com', NULL, 2, 1),
(44, '09887632887', 'user007', 'Duu', 'Ralle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user007@gmail.com', NULL, 2, 1),
(45, '0988746887', 'user008', 'Nae', 'Talle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user008@gmail.com', NULL, 2, 1),
(46, '0988756887', 'user009', 'Ges', 'Yalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user009@gmail.com', NULL, 2, 1),
(47, '0988736887', 'user010', 'Fre', 'Yalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user010@gmail.com', NULL, 2, 1),
(48, '0988776887', 'user011', 'Fee', 'Ealle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user011@gmail.com', NULL, 2, 1),
(49, '0988786887', 'user012', 'Tee', 'Qalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user012@gmail.com', NULL, 2, 1),
(50, '0988796887', 'user013', 'Kee', 'Calle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user013@gmail.com', NULL, 2, 1),
(51, '0911766887', 'user014', 'Kai', 'Salle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user014@gmail.com', NULL, 2, 1),
(52, '0128766887', 'user015', 'Umti', 'Jalle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0151@gmail.com', NULL, 2, 1),
(53, '0328766887', 'user016', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user016@gmail.com', NULL, 2, 1),
(54, '09238766887', 'user017', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user017@gmail.com', NULL, 2, 1),
(55, '09344766887', 'user018', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user018@gmail.com', NULL, 2, 1),
(56, '0945366887', 'user019', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0019@gmail.com', NULL, 2, 1),
(57, '0981266887', 'user020', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0020@gmail.com', NULL, 2, 1),
(58, '0900066887', 'user021', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0021@gmail.com', NULL, 2, 1),
(59, '09830066887', 'user022', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0022@gmail.com', NULL, 2, 1),
(60, '0988006887', 'user023', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0043@gmail.com', NULL, 2, 1),
(61, '0988700887', 'user024', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user00343@gmail.com', NULL, 2, 1),
(62, '0988760087', 'user025', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user002341@gmail.com', NULL, 2, 1),
(63, '0988766007', 'user026', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user09445@gmail.com', NULL, 2, 1),
(64, '0988700000', 'user027', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user00403@gmail.com', NULL, 2, 1),
(65, '0988722227', 'user028', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user00435@gmail.com', NULL, 2, 1),
(66, '0981123287', 'user029', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0304@gmail.com', NULL, 2, 1),
(67, '0903923987', 'user030', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0965@gmail.com', NULL, 2, 1),
(99, '0912435273', 'testuser', 'Duong', 'Tien', '$2y$10$mFDGokzraekuTmdbUZvj4uFA9PV0mE7r0TK1G47yY8B3EV5AXC2nC', 'female', 'http://img/', 'testuser@gmail.com', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_addresses`
--

CREATE TABLE `user_addresses` (
                                  `id` int(10) UNSIGNED NOT NULL,
                                  `userId` int(10) UNSIGNED NOT NULL,
                                  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                  `is_active` tinyint(4) NOT NULL DEFAULT 1,
                                  `isDefault` tinyint(4) NOT NULL DEFAULT 0,
                                  `created_at` timestamp NULL DEFAULT NULL,
                                  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `userId`, `address`, `is_active`, `isDefault`, `created_at`, `updated_at`) VALUES
(30, 66, '124 Duong Hoang Mai ,Cong Vi, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(31, 38, '124 Duong Nam Giang,Cong Vi, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(32, 39, '124 Duong Hoang Nam,Dien Bien, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(33, 40, '124 Duong Tinh Tin,Doi Can, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(34, 41, '124 Duong Ba Vi, Giang Vo, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(35, 42, '124 Duong Ba Vi, Kim Ma, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(36, 43, '124 Duong Ba Vi, Lieu Giai, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(37, 44, '124 Duong Ba Vi, Ngoc Ha, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(38, 45, '124 Duong Ba Vi, Ngoc Khanh, Ba Dinh, Ha Noi', 1, 0, NULL, NULL),
(39, 46, '124 Duong Ba Vi, Dong Ngac, Bac Tu Liem, Ha Noi', 1, 0, NULL, NULL),
(40, 47, '124 Duong Ba Vi, Co Nhue 1, Bac Tu Liem, Ha Noi', 1, 0, NULL, NULL),
(41, 48, '124 Duong Ba Vi, Vinh Phuc, Bac Tu Liem, Ha Noi', 1, 0, NULL, NULL),
(42, 49, '124 Duong Ba Vi, Minh Khai, Bac Tu Liem, Ha Noi', 1, 0, NULL, NULL),
(43, 50, '124 Duong Ba Vi, Nghia Do, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(44, 51, '124 Duong Ba Vi, Dich Vong, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(45, 52, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(46, 53, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(47, 54, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(48, 55, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(49, 56, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(50, 57, '124 Duong Ba Vi, Quan Hoa, Cau Giay, Ha Noi', 1, 0, NULL, NULL),
(51, 58, '124 Duong Ba Vi, Quang Trung, Ha Dong, Ha Noi', 1, 0, NULL, NULL),
(52, 59, '124 Duong Ba Vi, Nguyen Trai, Ha Dong, Ha Noi', 1, 0, NULL, NULL),
(53, 60, '124 Duong Ba Vi, Nguyen Trai, Ha Dong, Ha Noi', 1, 0, NULL, NULL),
(54, 61, '124 Duong Ba Vi, Nguyen Trai, Ha Dong, Ha Noi', 1, 0, NULL, NULL),
(55, 62, '124 ,Cong Vi, Buoi, Tay Ho', 1, 0, NULL, NULL),
(56, 63, '124 ,Cong Vi, Thuy Khue, Tay Ho', 1, 0, NULL, NULL),
(57, 64, '124 ,Cong Vi, Buoi, Tay Ho', 1, 0, NULL, NULL),
(58, 65, '124 ,Cong Vi, Buoi, Tay Ho', 1, 0, NULL, NULL),
(59, 99, 'So 8 Ton That Thuyet, Dich Vong Hau, Cau Giay, Ha Noi', 1, 0, NULL, NULL);

-- Cấu trúc bảng cho bảng `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountType` tinyint(4) NOT NULL DEFAULT 1,
  `amountDiscounted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentDiscounted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderMin` double DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
CREATE TABLE `dish_categories` (
                                   `id` int(10) UNSIGNED NOT NULL,
                                   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `is_active` tinyint(4) NOT NULL DEFAULT 1,
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dish_categories`
--

INSERT INTO `dish_categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'soup & salads', 1, NULL, NULL),
(2, 'seafood', 1, NULL, NULL),
(3, 'drinks', 1, NULL, NULL),
(4, 'desserts', 1, NULL, NULL),
(5, 'snacks', 1, NULL, NULL),
(6, 'main dish', 1, NULL, NULL),
(7, 'side dish', 1, NULL, NULL);

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `photo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurantId` int(10) UNSIGNED NOT NULL,
  `dishCategoryId` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `description`, `price`, `photo`, `restaurantId`, `dishCategoryId`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Braised meat with quail eggs', 'Braised meat with quail eggs', 14.43, 'https://meta.vn/Data/image/2020/09/10/thit-kho-trung-cut-2.jpg', 1, 6, 1, NULL, NULL),
(2, 'Rice with boiled meat & fried spring rolls', 'Rice with boiled meat & fried spring rolls', 8.09, 'https://sotaynauan.com/wp-content/uploads/2016/08/cach-lam-mon-nem-ran-cho-mam-co-ngay-ram-3.jpg', 1, 6, 1, NULL, NULL),
(3, 'Rice with beef with wine sauce & fried spring rolls', 'Rice with beef with wine sauce & fried spring rolls', 14.15, 'https://amthucvanho.com.vn/wp-content/uploads/2020/02/nau-bo-sot-vang-thom-ngon-doi-bua-cho-ca-nha.jpg', 1, 6, 1, NULL, NULL),
(4, 'Braised meat added', 'Braised meat added', 3.51, 'https://giadinh.tv/wp-content/uploads/2016/11/cach-lam-thit-kho-tieu-1-e1480218295847.jpg', 1, 6, 1, NULL, NULL),
(5, 'French fries', 'French fries', 12.09, 'https://image-us.eva.vn/upload/2-2019/images/2019-05-24/1558679209-423-thumbnail.jpg', 1, 5, 1, NULL, NULL),
(6, 'Fried spring rolls', 'Fried spring rolls', 6.9, 'https://lh3.googleusercontent.com/proxy/Bh7IbSUOoRZvuDyuGQ9XbJliQ9pGmTW0Szl1yqzqn4ADEMV1v0bMtg2vzDwcs30EtBMYfWkHyZsnwglYkOSNhriY55bF8oZSIw1YP2dW3oEJpp0L7Jo9FzVzUBqxd-fDMH2VQ1-Z74NH0SGhEzOtfpKPFOJ3mWMAI7_uk1m3zvFKV-Nc0VKwVCI_cIEukugODGwHCUjEtgLy0fEmqY-wV7t508iRdqV5f4Dcwsbfgwz0OLip8tRFXHl9RMil0WQ', 1, 5, 1, NULL, NULL),
(7, 'Toast with sauce', 'Toast with sauce', 15.26, 'https://cdn.daylambanh.edu.vn/wp-content/uploads/2017/08/banh-mi-nuong-moi-ot.jpg', 1, 5, 1, NULL, NULL),
(8, 'Sausage onion sandwiches', 'Sausage onion sandwiches', 12.58, 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2010/3/24/0/65755_02_s4x3.jpg.rend.hgtvcom.616.462.suffix/1432371010161.jpeg', 7, 5, 1, NULL, NULL),
(9, 'Peach tea', 'Peach tea', 14.14, 'https://thecoffeevn.com/wp-content/uploads/2019/06/Peach-Orange-Tea-tr%C3%A0-Cam-%C4%91%C3%A0o-.png', 7, 3, 1, NULL, NULL),
(10, 'Grilled duck thigh with honey', 'Grilled duck thigh with honey', 9.96, 'https://media.cooky.vn/recipe/g5/45703/s480x480/recipe45703-cook-step4-636845324729117785.jpg', 7, 7, 1, NULL, NULL),
(11, 'dried lemon leaf chicken', 'dried lemon leaf chicken', 4.36, 'https://cochunhotayninh.com/wp-content/uploads/2017/02/36885793_2052802641404752_3446324497529962496_n.jpg', 7, 5, 1, NULL, NULL),
(12, 'Pork porridgey', 'Pork porridge', 8.92, 'https://img.odphub.com/resize/750x-/2020/05/28/cach-nau-chao-thit-heo-cho-be-7-thang-1c76.jpg', 8, 6, 1, NULL, NULL),
(13, 'Chicken Mushroom Porridge', 'Chicken Mushroom Porridge', 8.53, 'https://anh.eva.vn/upload/1-2017/images/2017-01-05/1483612941-chao-ga-nam-huong.jpg', 8, 6, 1, NULL, NULL),
(14, 'Beef soup', 'Beef soup', 12.89, 'https://cdn.tgdd.vn/Files/2018/12/08/1136565/2-cach-nau-chao-thit-bo-voi-rau-cu-ngon-va-bo-duong-7.jpg', 8, 6, 1, NULL, NULL),
(15, 'Salmon porridge', 'Salmon porridge', 15.87, 'https://cdn.daotaobeptruong.vn/wp-content/uploads/2018/11/chao-ca-hoi.jpg', 8, 6, 1, NULL, NULL),
(16, 'Black Bean Stewed Chicken Porridge', 'Black Bean Stewed Chicken Porridge', 17.68, 'https://vuinauan.com/wp-content/uploads/2015/10/cach-lam-ga-ac-ham-do-den-cho-ba-bau-1.jpg', 8, 6, 1, NULL, NULL),
(17, 'Shrimp Porridge', 'Shrimp Porridge', 17.79, 'https://cdn.daotaobeptruong.vn/wp-content/uploads/2018/10/4cbaabc235457a2dc97a1a76ff39c8ea.jpg', 8, 6, 1, NULL, NULL),
(18, 'Mixed sticky rice', 'Mixed sticky rice', 12.91, 'https://i.ytimg.com/vi/MKd85d6UtJs/maxresdefault.jpg', 9, 6, 1, NULL, NULL),
(19, 'Sticky rice', 'Sticky rice', 8.16, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(20, 'Sticky rice with scrambled eggs', 'Sticky rice with scrambled eggs', 19.07, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(21, 'Sausage sticky rice', 'Sausage sticky rice', 7.87, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(22, 'Fried egg', 'Fried egg', 19.16, 'https://media.phunutoday.vn/files/upload_images/2016/08/05/cach-ran-trung-ngon.jpg', 9, 6, 1, NULL, NULL),
(23, 'French fries', 'French fries', 9.17, 'https://monngonmoingay.com/wp-content/uploads/2021/03/fries.jpeg', 9, 5, 1, NULL, NULL),
(24, 'Royaltea Kumquat Tea', 'Royaltea Kumquat Tea', 5.39, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(25, 'Fresh Passion Fruit Juice', 'Fresh Passion Fruit Juice', 16.42, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(26, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 22.93, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(27, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 22.4, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(28, 'Royaltea Roasted Milk Tea', 'Royaltea Roasted Milk Tea', 20.21, 'https://i.pinimg.com/736x/00/6c/15/006c1550512fb01dbd356c91d00ede61.jpg', 9, 3, 1, NULL, NULL),
(29, 'Fresh Passion Fruit Juice', 'Fresh Passion Fruit Juice', 10.87, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(30, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 10.7, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(31, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 17.86, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(32, 'Royaltea Roasted Milk Tea', 'Royaltea Roasted Milk Tea', 14.28, 'https://i.pinimg.com/736x/00/6c/15/006c1550512fb01dbd356c91d00ede61.jpg', 10, 3, 1, NULL, NULL),
(33, 'Sticky Chicken Thighs', 'Sticky Chicken Thighs', 14.78, 'https://img-global.cpcdn.com/recipes/919819583a7d8cdb/751x532cq70/dui-ga-bo-xoi-recipe-main-photo.jpg', 11, 7, 1, NULL, NULL),
(34, 'Roasted duck', 'Roasted duck', 8.08, 'https://cdn.tgdd.vn/Files/2019/11/24/1221793/huong-dan-3-cach-thuc-hien-mon-vit-nuong-mat-ong-de-lam-tai-nha-10.jpg', 11, 6, 1, NULL, NULL),
(35, 'Tiger Milk Pearl Brown Sugar (M)', NULL, 13.05, 'https://images.foody.vn/res/g105/1049662/s120x120/7f92033a-3692-4e0d-9f18-2dd7ac75-1e60aabd-201014175352.jpeg', 48, 3, 1, NULL, NULL),
(36, 'Matcha Brown Sugar Milk (M)', NULL, 17.99, 'https://images.foody.vn/res/g105/1049662/s120x120/80f9a4b3-ad5c-4e90-b311-316d0460-ae9303b6-201014180728.jpeg', 48, 3, 1, NULL, NULL),
(37, 'Milk Cocoa Brown Sugar (M)', NULL, 7.82, 'https://images.foody.vn/res/g105/1049662/s120x120/6d2f2928-02a4-4502-a1e7-4523f1a2-af301fe1-201014175029.jpeg', 48, 3, 1, NULL, NULL),
(38, 'Chocolate Mix Brown Sugar (L)', NULL, 22.13, 'https://images.foody.vn/res/g105/1049662/s120x120/47984f75-a2fb-45de-a6b9-4a1b5a8b-2e94603f-201014175407.jpeg', 48, 3, 1, NULL, NULL),
(39, 'Durian Brown Sugar (M)', NULL, 4.17, 'https://images.foody.vn/res/g105/1049662/s120x120/dc93c46e-4e01-4a01-8cdb-67766009-40e41bb1-201014175504.jpeg', 48, 3, 1, NULL, NULL),
(40, 'Tiger Tropical Grapefruit Tea', NULL, 11.49, 'https://images.foody.vn/res/g105/1049662/s120x120/40f21341-f4ec-4345-8f81-1b0c0c52-643a5b27-201014180534.jpeg', 48, 3, 1, NULL, NULL),
(41, 'Snow Tiger Plum Blossom', NULL, 21.93, 'https://images.foody.vn/res/g105/1049662/s120x120/6b070fd3-cf85-46c6-82d7-c1bf3fea-e76b806f-201014180433.jpeg', 48, 3, 1, NULL, NULL),
(42, 'Milk Mango Tea (L)', NULL, 12.16, 'https://images.foody.vn/res/g105/1049662/s120x120/7d45f751-9836-4d17-9a53-65bdea77-bd8177e5-201014180055.jpeg', 48, 3, 1, NULL, NULL),
(43, 'Cacao(M)', NULL, 12.04, 'https://images.foody.vn/res/g105/1049662/s120x120/9c2ef33c-bff7-41cc-ab0e-bbd44afa-83399383-201014180143.jpeg', 48, 3, 1, NULL, NULL),
(44, 'Jasmine Milk Tea (M)', NULL, 20.7, 'https://images.foody.vn/res/g105/1049662/s120x120/0837ad90-fdd5-4b45-90bb-0f503b80-64e62f30-201014175801.jpeg', 48, 3, 1, NULL, NULL),
(45, 'Tiger Honey Kumquat Passion Fruit Tea', NULL, 4.4, 'https://images.foody.vn/res/g105/1049662/s120x120/08ac5f77-4bc1-468c-b5c9-ef5bd968-4967b6df-201014180549.jpeg', 48, 3, 1, NULL, NULL),
(46, 'Full Traditional Bun Cha', NULL, 16.88, 'https://images.foody.vn/res/g95/942716/s120x120/73dbf8ba-ec32-4dc6-ac35-c889cac33396.jpg', 49, 6, 1, NULL, NULL),
(47, 'Bun Bun Banh Vien', NULL, 8.23, 'https://images.foody.vn/res/g95/942716/s120x120/4e1a516a-3d25-4656-a157-2fa798c6b8cc.jpg', 49, 6, 1, NULL, NULL),
(48, 'Bun Cha Ba Chi Thai Pieces', NULL, 7.49, 'https://images.foody.vn/res/g95/942716/s120x120/51136c04-bce1-4505-a9a5-4b959fc51d19.jpg', 49, 6, 1, NULL, NULL),
(49, 'Bun nem', NULL, 9.75, 'https://images.foody.vn/res/g95/942716/s120x120/e09c86f4-56b2-4996-8838-1e3e4d9a-c743f7c2-210327221939.jpeg', 49, 6, 1, NULL, NULL),
(50, 'Vermicelli Noodles with Shrimp and Pork Noodles', NULL, 3.27, 'https://images.foody.vn/res/g95/942716/s120x120/6ee8d7d6-13c7-4d65-95a5-97111d72-42164b46-210327222009.jpeg', 49, 6, 1, NULL, NULL),
(51, 'Fried Spring Rolls 10 Pieces', NULL, 4.11, 'https://images.foody.vn/res/g95/942716/s120x120/e09c86f4-56b2-4996-8838-1e3e4d9a-c743f7c2-210327221939.jpeg', 49, 6, 1, NULL, NULL),
(52, 'Coca', NULL, 7.74, 'https://images.foody.vn/res/g95/942716/s120x120/deb88368-5c51-42ed-babc-96fc7110-4e612f2d-210222221928.jpeg', 49, 6, 1, NULL, NULL),
(53, 'String', NULL, 3.35, 'https://images.foody.vn/res/g95/942716/s120x120/80a69e24-b390-48ce-9702-3e24c56f-dd42aacd-210222222300.jpeg', 49, 6, 1, NULL, NULL),
(54, 'Strongbow', NULL, 10.55, 'https://images.foody.vn/res/g95/942716/s120x120/a13c8623-bd28-4277-902d-04b4bd3c-c13c4153-210314023650.jpeg', 49, 6, 1, NULL, NULL),
(55, 'Noodles Extra', NULL, 19.68, 'https://images.foody.vn/res/g95/942716/s120x120/9940e53a-6900-4736-babe-f437ae1a1d5a.jpg', 49, 6, 1, NULL, NULL),
(56, 'White Pearl Yogurt', NULL, 3.76, 'https://images.foody.vn/res/g101/1000595/s120x120/a8be7911-9e79-45c7-833c-89d558f1ef42.jpeg', 50, 5, 1, NULL, NULL),
(57, 'Coconut Milk Pearl Yogurt', NULL, 16.78, 'https://images.foody.vn/res/g101/1000595/s120x120/04c83355-7976-4b2d-aaf7-3c4a3eac68a7.jpeg', 50, 5, 1, NULL, NULL),
(58, 'Coconut Milk Passion Fruit Yogurt', NULL, 9.6, 'https://images.foody.vn/res/g101/1000595/s120x120/ddea01bb-6f20-456b-9435-07dc5961ec86.jpeg', 50, 5, 1, NULL, NULL),
(59, 'Macchiato Coconut Bubble Ice Cream Yogurt', NULL, 14.64, 'https://images.foody.vn/res/g101/1000595/s120x120/b519c1eb-0e29-4329-a5da-6a55d20cd380.jpg', 50, 5, 1, NULL, NULL),
(60, 'Mango Coconut Yogurt with Coconut Essence', NULL, 21.43, 'https://images.foody.vn/res/g101/1000595/s120x120/0ae1acf4-be3b-4d41-b7c7-85f5bf17df4e.jpeg', 50, 5, 1, NULL, NULL),
(61, 'Black Sugar Pearl Yogurt', NULL, 20.23, 'https://images.foody.vn/res/g101/1000595/s120x120/9f6f1513-a75c-4d8c-acba-ba336094e007.jpeg', 50, 5, 1, NULL, NULL),
(62, 'Cantaloupe Coconut Milk Yogurt', NULL, 13.85, 'https://images.foody.vn/res/g101/1000595/s120x120/a7f12e54-aae3-4ac5-88c0-4245a5472ca3.jpg', 50, 5, 1, NULL, NULL),
(63, 'Aloe Yogurt', NULL, 5.54, 'https://images.foody.vn/res/g101/1000595/s120x120/b65abeff-6c51-4762-8f98-78ece038b5b2.jpeg', 50, 5, 1, NULL, NULL),
(64, 'Coconut Milk Pearl Blueberry Yogurt', NULL, 3.18, 'https://images.foody.vn/res/g101/1000595/s120x120/2935fa68-3617-410c-a591-b7b0a1f4d877.jpeg', 50, 5, 1, NULL, NULL),
(65, 'Coffee Yogurt with Coconut Milk Pearl', NULL, 16.27, 'https://images.foody.vn/res/g101/1000595/s120x120/c63b448e-c1c9-4ad1-a0a3-3620fd62fc4e.jpeg', 50, 5, 1, NULL, NULL),
(66, 'Tokbokki Phomai', NULL, 8.8, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184126-tokbokki-phomai.jpg', 51, 6, 1, NULL, NULL),
(67, 'Fried kimbap', NULL, 12.26, 'https://images.foody.vn/res/g26/253870/s120x120/b89a4878-0c0e-48c5-8adc-47edf355-c8ab079c-201013152642.jpeg', 51, 6, 1, NULL, NULL),
(68, 'Kimbap', NULL, 11.84, 'https://images.foody.vn/res/g26/253870/s120x120/7f177709-d5f3-4842-ba33-9a494f4196a3.jpg', 51, 6, 1, NULL, NULL),
(69, 'Cheese Black Noodles', NULL, 19.42, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184236-my-den.jpg', 51, 6, 1, NULL, NULL),
(70, 'Shake Cheese Rice Cake', NULL, 18.57, 'https://images.foody.vn/res/g26/253870/s120x120/06eea21d-2b50-4e8d-a31c-a7cc8a2fa230.jpg', 51, 6, 1, NULL, NULL),
(71, 'Mixed Noodles', NULL, 11.6, 'https://images.foody.vn/res/g26/253870/s120x120/24fd709a-8a13-4c38-9a1b-a4e37fcf0b9a.jpg', 51, 6, 1, NULL, NULL),
(72, 'Noodles With Sausage', NULL, 19.28, 'https://images.foody.vn/res/g26/253870/s120x120/293704c9-d552-4d97-9a9b-823110dfd813.jpg', 51, 6, 1, NULL, NULL),
(73, 'My Nui Cheese Sausage', NULL, 18.63, 'https://images.foody.vn/res/g26/253870/s120x120/48b7352d-ad2e-4eb1-b5ad-322e026a16e3.jpg', 51, 6, 1, NULL, NULL),
(74, 'Mixed Noodles with Seafood & Dried Beef', NULL, 12.28, 'https://images.foody.vn/res/g26/253870/s120x120/e1e883fe-3f23-482c-944e-2fed12b3fd38.jpg', 51, 6, 1, NULL, NULL),
(75, 'Fried Black Noodles With Seafood Balls', NULL, 22.52, 'https://images.foody.vn/res/g26/253870/s120x120/591e61e9-25e2-4e55-bc0f-9d7ccdca3d58.jpg', 51, 6, 1, NULL, NULL),
(76, 'Tokbokki Phomai', NULL, 12.77, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184126-tokbokki-phomai.jpg', 52, 6, 1, NULL, NULL),
(77, 'Fried kimbap', NULL, 13.28, 'https://images.foody.vn/res/g26/253870/s120x120/b89a4878-0c0e-48c5-8adc-47edf355-c8ab079c-201013152642.jpeg', 52, 6, 1, NULL, NULL),
(78, 'Kimbap', NULL, 5.1, 'https://images.foody.vn/res/g26/253870/s120x120/7f177709-d5f3-4842-ba33-9a494f4196a3.jpg', 52, 6, 1, NULL, NULL),
(79, 'Cheese Black Noodles', NULL, 22.64, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184236-my-den.jpg', 52, 6, 1, NULL, NULL),
(80, 'Shake Cheese Rice Cake', NULL, 14.9, 'https://images.foody.vn/res/g26/253870/s120x120/06eea21d-2b50-4e8d-a31c-a7cc8a2fa230.jpg', 52, 6, 1, NULL, NULL),
(81, 'Mixed Noodles', NULL, 3.6, 'https://images.foody.vn/res/g26/253870/s120x120/24fd709a-8a13-4c38-9a1b-a4e37fcf0b9a.jpg', 52, 6, 1, NULL, NULL),
(82, 'Noodles With Sausage', NULL, 10.28, 'https://images.foody.vn/res/g26/253870/s120x120/293704c9-d552-4d97-9a9b-823110dfd813.jpg', 52, 6, 1, NULL, NULL),
(83, 'My Nui Cheese Sausage', NULL, 17.59, 'https://images.foody.vn/res/g26/253870/s120x120/48b7352d-ad2e-4eb1-b5ad-322e026a16e3.jpg', 52, 6, 1, NULL, NULL),
(84, 'Mixed Noodles with Seafood & Dried Beef', NULL, 14.12, 'https://images.foody.vn/res/g26/253870/s120x120/e1e883fe-3f23-482c-944e-2fed12b3fd38.jpg', 52, 6, 1, NULL, NULL),
(85, 'Fried Black Noodles With Seafood Balls', NULL, 14.81, 'https://images.foody.vn/res/g26/253870/s120x120/591e61e9-25e2-4e55-bc0f-9d7ccdca3d58.jpg', 52, 6, 1, NULL, NULL),
(86, 'Korean Mixed Rice - Beef', NULL, 8.71, 'https://images.foody.vn/res/g70/691461/s120x120/28253697-c0b7-426d-6513-fd0dc2ddee42.jpg', 53, 6, 1, NULL, NULL),
(87, 'Kim Chi Fried Rice - Beef', NULL, 16.17, 'https://images.foody.vn/res/g70/691461/s120x120/3ada697d-a227-430c-73ee-8deb1f9bf662.jpg', 53, 6, 1, NULL, NULL),
(88, 'Korean Seafood Mixed Rice', 'Korean Seafood Mixed Rice  ', 11.7, 'https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F3961066.jpg', 53, 6, 1, NULL, NULL),
(89, 'Korean Mixed Rice - Chicken', NULL, 6.98, 'https://images.foody.vn/res/g70/691461/s120x120/cb47f98c-1c1d-4e50-d5ac-272d14cab4a5.jpg', 53, 6, 1, NULL, NULL),
(90, 'Korean Seafood Mixed Rice', NULL, 16.82, 'https://images.foody.vn/res/g70/691461/s120x120/682efee5-60ab-4b87-1951-ec9b6c1678f3.jpg', 53, 6, 1, NULL, NULL),
(91, 'Korean Mixed Noodles - Chicken', NULL, 20.14, 'https://images.foody.vn/res/g70/691461/s120x120/0ab39281-bc94-4c99-8265-030da08097d5.jpg', 53, 6, 1, NULL, NULL),
(92, 'Kim Chi Fried Rice With Beef', NULL, 7.23, 'https://images.foody.vn/res/g70/691461/s120x120/c40413c0-3f0c-4ea7-4cdf-5c0c7ddcb7b6.jpg', 53, 6, 1, NULL, NULL),
(93, 'Seaweed soup', NULL, 12.74, 'https://images.foody.vn/res/g70/691461/s120x120/db5b81ba-7979-4dd2-202b-98955c3d49d7.jpg', 53, 6, 1, NULL, NULL),
(94, 'Peach Tea', NULL, 19, 'https://images.foody.vn/res/g70/691461/s120x120/43aaf8bc-838c-409b-cd96-a825e169fa3f.jpg', 53, 3, 1, NULL, NULL),
(95, 'Lemon Tea', NULL, 13.8, 'https://images.foody.vn/res/g70/691461/s120x120/20181119162811-chanh.jpg', 53, 3, 1, NULL, NULL),
(96, 'Rice', NULL, 8.99, 'https://images.foody.vn/res/g70/691461/s120x120/1982cb61-1384-4427-90d4-364d2ed8e6e6.jpg', 53, 6, 1, NULL, NULL),
(97, 'SALMON SUSHI', 'Salmon Sushi By Fuji Bin - Japanese Restaurant', 20.56, 'https://res.cloudinary.com/tf-lab/image/upload/restaurant/73da190c-2457-40c9-b250-49b2ff7414ea/30d1dc80-4dc9-4a8a-a790-e788a7cb2cfa.jpg', 56, 2, 1, NULL, NULL),
(98, 'Crispy beef burger with cheese', 'Crispy beef burger with cheese - Burger ', 12.81, 'https://burgerking.vn/media/catalog/product/cache/1/image/1800x/040ec09b1e35df139433887a97daa66f/c/r/crunchy_whp-min_1.jpg', 64, 7, 1, NULL, NULL),
(99, 'Edomae Sushi', 'Assorted round shape sushi & special version of cheese', 10, 'https://jpninfo.com/wp-content/uploads/2018/03/sushi-platter.jpg', 99, 2, 1, NULL, NULL),
(100, 'Sushi Tei Signature', 'Assorted round shape sushi & special version of cheese', 10, 'https://product.hstatic.net/1000303434/product/dsc07039_master.jpg', 99, 2, 1, NULL, NULL),
(101, 'Salada', 'Salad', 3.4, 'https://product.hstatic.net/1000303434/product/dsc06522_master.jpg', 99, 2, 1, NULL, NULL),
(102, 'Kani Mayo', 'Crab Meat Mayonnaise', 5.3, 'https://product.hstatic.net/1000303434/product/upload_7e04c3f0eb094d08bb912247d2526aa9_master.jpg', 99, 2, 1, NULL, NULL),
(103, 'Chuka Kurage', 'Jelly Fish', 3.4, 'https://product.hstatic.net/1000303434/product/chuka_kurage_master.png', 99, 2, 1, NULL, NULL),
(104, 'Lobster Salad', 'Lobster Salad', 6.5, 'https://product.hstatic.net/1000303434/product/lobster_salad__g_i_t_m_h_m__1_master.png', 99, 2, 1, NULL, NULL),
(105, 'Spicy Hotate', 'Spicy Scallop', 4, 'https://product.hstatic.net/1000303434/product/spicy_hotate_1_master.png', 99, 2, 1, NULL, NULL),
(106, 'Lobster With Miso Soup', 'Hugging Lobster Sashimi 300grs (Lobster Head With Miso Soup)', 20, 'https://product.hstatic.net/1000303434/product/uni1_master.png', 99, 2, 1, NULL, NULL),
(107, 'Hamachi', 'Yellow-Tail', 10, 'https://product.hstatic.net/1000303434/product/hamachi__yellow-tail_c__cam__1_master.png', 99, 2, 1, NULL, NULL),
(108, 'Nabeyaki Udon', 'oodle with Vegetable & Prawn Tempura', 10, 'https://product.hstatic.net/1000303434/product/nabeyaki_udon_master.png', 99, 2, 1, NULL, NULL),
(109, 'Yasai Tempura', 'Vegetable Tempura', 6, 'https://product.hstatic.net/1000303434/product/yasai_tempura_master.png', 99, 2, 1, NULL, NULL),
(110, 'Tutti Fruity Roll', 'Sushi Rice, Pineaple, Strawberry, Mango, Avocado, Cucumber, Mayonaise', 4.3, 'https://product.hstatic.net/1000303434/product/tutti_fruity_roll_master.png', 99, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dish_categories`
--

CREATE TABLE `food_tags` (
                             `id` int(10) UNSIGNED NOT NULL,
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `is_active` tinyint(4) NOT NULL DEFAULT 1,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `food_tags`
--

INSERT INTO `food_tags` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'vegetarian', 1, NULL, NULL),
(2, 'vegan', 1, NULL, NULL),
(3, 'gluten-free', 1, NULL, NULL),
(4, 'dairy-free', 1, NULL, NULL),
(5, 'Vietnamese', 1, NULL, NULL),
(6, 'Chinese', 1, NULL, NULL),
(7, 'Thai', 1, NULL, NULL),
(8, 'Japanese', 1, NULL, NULL),
(9, 'Korean', 1, NULL, NULL),
(10, 'sushi', 1, NULL, NULL),
(11, 'fish', 1, NULL, NULL),
(12, 'beef', 1, NULL, NULL),
(13, 'chicken', 1, NULL, NULL),
(14, 'pork', 1, NULL, NULL),
(15, 'deep-fried', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dish_tags`
--

CREATE TABLE `dish_tags` (
  `dishId` int(10) UNSIGNED NOT NULL,
  `foodTagId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dish_tags`
--

INSERT INTO `dish_tags` (`dishId`, `foodTagId`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, NULL),
(1, 14, NULL, NULL),
(2, 5, NULL, NULL),
(2, 14, NULL, NULL),
(3, 5, NULL, NULL),
(3, 12, NULL, NULL),
(4, 5, NULL, NULL),
(4, 14, NULL, NULL),
(5, 15, NULL, NULL),
(6, 15, NULL, NULL),
(7, 15, NULL, NULL),
(7, 5, NULL, NULL),
(8, 5, NULL, NULL),
(10, 13, NULL, NULL),
(11, 13, NULL, NULL),
(12, 5, NULL, NULL),
(13, 5, NULL, NULL),
(14, 5, NULL, NULL),
(14, 12, NULL, NULL),
(15, 5, NULL, NULL),
(15, 12, NULL, NULL),
(16, 5, NULL, NULL),
(16, 13, NULL, NULL),
(17, 5, NULL, NULL),
(18, 5, NULL, NULL),
(19, 5, NULL, NULL),
(19, 14, NULL, NULL),
(20, 5, NULL, NULL),
(21, 5, NULL, NULL),
(22, 7, NULL, NULL),
(23, 7, NULL, NULL),
(24, 7, NULL, NULL),
(25, 3, NULL, NULL),
(33, 15, NULL, NULL),
(33, 13, NULL, NULL),
(34, 15, NULL, NULL),
(34, 13, NULL, NULL),
(7, 5, NULL, NULL),
(6, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `userId`, `title`, `content`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, 'Feedback cua Hoang', 'day la feedback cua hoang, ahihi', 1, '2021-04-26 23:54:04', '2021-04-26 23:54:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_tags`
--



--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_24_022344_create_user_addresses_table', 1),
(7, '2021_04_24_024856_create_food_tags_table', 1),
(8, '2021_04_24_025202_create_dishes_table', 1),
(9, '2021_04_24_025427_create_dish_tags_table', 1),
(10, '2021_04_24_030941_create_discount_codes_table', 1),
(11, '2021_04_24_032839_create_orders_table', 1),
(12, '2021_04_24_033601_create_order_dishes', 1),
(13, '2021_04_24_163128_create_administrative_divisions', 1),
(14, '2021_04_25_034847_create_feedback_table', 1),
(15, '2021_04_25_161951_create_reviews_table', 1),
(16, '2021_04_24_024002_create_dish_categories_table', 2),
(17, '2021_04_24_013431_create_restaurants_table', 3),
(18, '2021_04_24_014843_create_users_table', 4),
(19, '2021_04_27_065701_update_restaurants', 5);

-- --------------------------------------------------------
CREATE TABLE `orders` (
                          `id` int(10) UNSIGNED NOT NULL,
                          `userId` int(10) UNSIGNED NOT NULL,
                          `restaurantId` int(10) UNSIGNED NOT NULL,
                          `totalDishPrice` double DEFAULT 0,
                          `deliveryFee` double DEFAULT 0,
                          `discountAmount` double DEFAULT 0,
                          `discountCodeId` int(10) UNSIGNED DEFAULT NULL,
                          `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `timeCreated` datetime DEFAULT NULL,
                          `timeAccepted` datetime DEFAULT NULL,
                          `timeDoneCooking` datetime DEFAULT NULL,
                          `timePickedUp` datetime DEFAULT NULL,
                          `timeDelivered` datetime DEFAULT NULL,
                          `timeRejected` datetime DEFAULT NULL,
                          `timeCancelled` datetime DEFAULT NULL,
                          `acceptedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `doneCookingBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                          `orderStatus` tinyint(4) DEFAULT 1,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userId`, `restaurantId`, `totalDishPrice`, `deliveryFee`, `discountAmount`, `discountCodeId`, `address`, `timeCreated`, `timeAccepted`, `timeDoneCooking`, `timePickedUp`, `timeDelivered`, `timeRejected`, `timeCancelled`, `acceptedBy`, `doneCookingBy`, `orderStatus`, `created_at`, `updated_at`) VALUES
(17, 7, 1, 290000, 15000, 0, NULL, 'Bac Tu Liem, Ha Noi', '2021-02-01 00:00:00', '2021-02-01 09:49:21', '2021-02-01 09:49:29', '2021-02-01 09:49:36', '2021-02-01 09:49:42', NULL, NULL, 'Hoang', 'Kai Pers', 6, NULL, NULL),
(18, 7, 1, 390000, 15000, 0, NULL, 'Bac Tu Liem, Ha Noi', '2021-02-15 00:00:00', '2021-02-15 09:52:29', '2021-02-15 09:52:29', '2021-02-15 09:52:29', '2021-02-15 09:52:29', NULL, NULL, 'Hoang', 'Kai Pers', 6, NULL, NULL),
(19, 7, 1, 190000, 15000, 0, NULL, 'Bac Tu Liem, Ha Noi', '2021-02-23 00:00:00', NULL, NULL, NULL, NULL, '2021-02-23 09:51:38', NULL, 'Hoang', 'Kai Pers', 7, NULL, NULL),
(20, 7, 1, 230000, 15000, 0, NULL, 'Bac Tu Liem, Ha Noi', '2021-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '2021-03-01 09:52:07', 'Hoang', 'Kai Pers', 8, NULL, NULL),
(21, 44, 48, 240000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-03-20 00:00:00', '2021-03-20 09:54:11', '2021-04-20 09:54:50', '2021-04-20 09:54:54', '2021-04-20 09:54:58', NULL, NULL, 'Hoang', 'Kai Pers', 6, NULL, NULL),
(22, 44, 53, 292000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-03-30 00:00:00', '2021-03-30 09:55:07', '2021-04-30 09:55:13', '2021-04-30 09:55:15', '2021-04-30 09:55:18', NULL, NULL, 'Hoang', 'Kai Pers', 6, NULL, NULL),
(23, 45, 53, 212000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-04-01 00:00:00', '2021-04-01 09:55:28', '2021-04-01 09:55:37', '2021-04-01 09:55:41', '2021-04-01 09:55:49', NULL, NULL, 'Hoang', 'Kai Pers', 6, NULL, NULL),
(24, 46, 51, 290000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-04-03 00:00:00', NULL, NULL, NULL, NULL, '2021-04-03 09:57:27', '0000-00-00 00:00:00', 'Hoang', 'Kai Pers', 2, NULL, NULL),
(25, 44, 52, 290000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-04-27 00:00:00', '2021-04-27 09:56:19', '2021-04-27 09:56:22', NULL, NULL, NULL, NULL, 'Hoang', 'Kai Pers', 4, NULL, NULL),
(26, 58, 51, 290000, 15000, 0, NULL, 'Cau Giay, Ha Noi', '2021-04-27 00:00:00', '2021-04-27 09:56:35', '2021-04-27 09:56:38', '2021-04-27 09:56:43', NULL, NULL, NULL, 'Hoang', 'Kai Pers', 5, NULL, NULL);

-- --------------------------------------------------------
--
-- Cấu trúc bảng cho bảng `orderdish`
--

CREATE TABLE `orderdish` (
  `orderId` int(10) UNSIGNED NOT NULL,
  `dishId` int(10) UNSIGNED NOT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dishQuantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdish`
--

INSERT INTO `orderdish` (`orderId`, `dishId`, `note`, `dishQuantity`, `created_at`, `updated_at`) VALUES
(21, 52, NULL, 1, NULL, NULL),
(24, 22, NULL, 1, NULL, NULL),
(18, 91, NULL, 1, NULL, NULL),
(22, 96, NULL, 1, NULL, NULL),
(18, 68, NULL, 1, NULL, NULL),
(23, 71, NULL, 1, NULL, NULL),
(19, 84, NULL, 1, NULL, NULL),
(17, 87, NULL, 1, NULL, NULL),
(19, 27, NULL, 1, NULL, NULL),
(19, 63, NULL, 1, NULL, NULL),
(17, 21, NULL, 1, NULL, NULL),
(19, 35, NULL, 1, NULL, NULL),
(19, 66, NULL, 1, NULL, NULL),
(24, 44, NULL, 1, NULL, NULL),
(20, 26, NULL, 1, NULL, NULL),
(20, 97, NULL, 1, NULL, NULL),
(20, 50, NULL, 1, NULL, NULL),
(25, 85, NULL, 1, NULL, NULL),
(17, 36, NULL, 1, NULL, NULL),
(22, 59, NULL, 1, NULL, NULL),
(17, 57, NULL, 1, NULL, NULL),
(18, 12, NULL, 1, NULL, NULL),
(21, 31, NULL, 1, NULL, NULL),
(18, 55, NULL, 1, NULL, NULL),
(21, 27, NULL, 1, NULL, NULL),
(22, 28, NULL, 1, NULL, NULL),
(21, 16, NULL, 1, NULL, NULL),
(26, 62, NULL, 1, NULL, NULL),
(25, 33, NULL, 1, NULL, NULL),
(19, 8, NULL, 1, NULL, NULL),
(21, 20, NULL, 1, NULL, NULL),
(23, 72, NULL, 1, NULL, NULL),
(25, 2, NULL, 1, NULL, NULL),
(18, 38, NULL, 1, NULL, NULL),
(17, 50, NULL, 1, NULL, NULL),
(18, 44, NULL, 1, NULL, NULL),
(21, 86, NULL, 1, NULL, NULL),
(21, 20, NULL, 1, NULL, NULL),
(21, 56, NULL, 1, NULL, NULL),
(22, 77, NULL, 1, NULL, NULL),
(20, 59, NULL, 1, NULL, NULL),
(24, 14, NULL, 1, NULL, NULL),
(24, 56, NULL, 1, NULL, NULL),
(17, 81, NULL, 1, NULL, NULL),
(22, 59, NULL, 1, NULL, NULL),
(26, 24, NULL, 1, NULL, NULL),
(22, 41, NULL, 1, NULL, NULL),
(17, 14, NULL, 1, NULL, NULL),
(19, 94, NULL, 1, NULL, NULL),
(20, 47, NULL, 1, NULL, NULL),
(26, 22, NULL, 1, NULL, NULL),
(19, 24, NULL, 1, NULL, NULL),
(18, 10, NULL, 1, NULL, NULL),
(20, 48, NULL, 1, NULL, NULL),
(20, 70, NULL, 1, NULL, NULL),
(25, 67, NULL, 1, NULL, NULL),
(20, 80, NULL, 1, NULL, NULL),
(20, 67, NULL, 1, NULL, NULL),
(24, 62, NULL, 1, NULL, NULL),
(18, 62, NULL, 1, NULL, NULL),
(22, 81, NULL, 1, NULL, NULL),
(23, 29, NULL, 1, NULL, NULL),
(23, 18, NULL, 1, NULL, NULL),
(21, 69, NULL, 1, NULL, NULL),
(23, 33, NULL, 1, NULL, NULL),
(23, 52, NULL, 1, NULL, NULL),
(20, 57, NULL, 1, NULL, NULL),
(17, 12, NULL, 1, NULL, NULL),
(21, 14, NULL, 1, NULL, NULL),
(25, 66, NULL, 1, NULL, NULL),
(22, 53, NULL, 1, NULL, NULL),
(20, 92, NULL, 1, NULL, NULL),
(20, 94, NULL, 1, NULL, NULL),
(26, 84, NULL, 1, NULL, NULL),
(24, 32, NULL, 1, NULL, NULL),
(24, 50, NULL, 1, NULL, NULL),
(19, 17, NULL, 1, NULL, NULL),
(26, 22, NULL, 1, NULL, NULL),
(25, 64, NULL, 1, NULL, NULL),
(25, 85, NULL, 1, NULL, NULL),
(17, 12, NULL, 1, NULL, NULL),
(17, 60, NULL, 1, NULL, NULL),
(26, 58, NULL, 1, NULL, NULL),
(21, 29, NULL, 1, NULL, NULL),
(19, 36, NULL, 1, NULL, NULL),
(24, 43, NULL, 1, NULL, NULL),
(17, 13, NULL, 1, NULL, NULL),
(19, 59, NULL, 1, NULL, NULL),
(25, 51, NULL, 1, NULL, NULL),
(21, 67, NULL, 1, NULL, NULL),
(19, 89, NULL, 1, NULL, NULL),
(17, 98, NULL, 1, NULL, NULL),
(19, 35, NULL, 1, NULL, NULL),
(26, 27, NULL, 1, NULL, NULL),
(24, 26, NULL, 1, NULL, NULL),
(18, 18, NULL, 1, NULL, NULL),
(26, 94, NULL, 1, NULL, NULL),
(19, 31, NULL, 1, NULL, NULL),
(22, 5, NULL, 1, NULL, NULL),
(21, 69, NULL, 1, NULL, NULL),
(22, 85, NULL, 1, NULL, NULL),
(19, 6, NULL, 1, NULL, NULL),
(21, 77, NULL, 1, NULL, NULL),
(20, 85, NULL, 1, NULL, NULL),
(17, 26, NULL, 1, NULL, NULL),
(20, 1, NULL, 1, NULL, NULL),
(20, 84, NULL, 1, NULL, NULL),
(23, 30, NULL, 1, NULL, NULL),
(24, 41, NULL, 1, NULL, NULL),
(22, 63, NULL, 1, NULL, NULL),
(20, 77, NULL, 1, NULL, NULL),
(21, 93, NULL, 1, NULL, NULL),
(24, 57, NULL, 1, NULL, NULL),
(17, 98, NULL, 1, NULL, NULL),
(26, 25, NULL, 1, NULL, NULL),
(21, 95, NULL, 1, NULL, NULL),
(20, 59, NULL, 1, NULL, NULL),
(26, 80, NULL, 1, NULL, NULL),
(17, 86, NULL, 1, NULL, NULL),
(22, 66, NULL, 1, NULL, NULL),
(23, 53, NULL, 1, NULL, NULL),
(26, 90, NULL, 1, NULL, NULL),
(24, 85, NULL, 1, NULL, NULL),
(25, 26, NULL, 1, NULL, NULL),
(21, 23, NULL, 1, NULL, NULL),
(18, 52, NULL, 1, NULL, NULL),
(19, 84, NULL, 1, NULL, NULL),
(23, 93, NULL, 1, NULL, NULL),
(17, 35, NULL, 1, NULL, NULL),
(24, 13, NULL, 1, NULL, NULL),
(26, 48, NULL, 1, NULL, NULL),
(26, 14, NULL, 1, NULL, NULL),
(19, 48, NULL, 1, NULL, NULL),
(22, 13, NULL, 1, NULL, NULL),
(25, 9, NULL, 1, NULL, NULL),
(17, 46, NULL, 1, NULL, NULL),
(18, 66, NULL, 1, NULL, NULL),
(24, 86, NULL, 1, NULL, NULL),
(18, 61, NULL, 1, NULL, NULL),
(25, 82, NULL, 1, NULL, NULL),
(25, 62, NULL, 1, NULL, NULL),
(19, 42, NULL, 1, NULL, NULL),
(23, 4, NULL, 1, NULL, NULL),
(19, 92, NULL, 1, NULL, NULL),
(17, 82, NULL, 1, NULL, NULL),
(18, 83, NULL, 1, NULL, NULL),
(23, 77, NULL, 1, NULL, NULL),
(18, 54, NULL, 1, NULL, NULL),
(17, 43, NULL, 1, NULL, NULL),
(21, 38, NULL, 1, NULL, NULL),
(20, 97, NULL, 1, NULL, NULL),
(26, 73, NULL, 1, NULL, NULL),
(25, 21, NULL, 1, NULL, NULL),
(23, 82, NULL, 1, NULL, NULL),
(26, 62, NULL, 1, NULL, NULL),
(24, 7, NULL, 1, NULL, NULL),
(25, 39, NULL, 1, NULL, NULL),
(18, 80, NULL, 1, NULL, NULL),
(22, 41, NULL, 1, NULL, NULL),
(25, 59, NULL, 1, NULL, NULL),
(26, 9, NULL, 1, NULL, NULL),
(19, 5, NULL, 1, NULL, NULL),
(24, 15, NULL, 1, NULL, NULL),
(25, 70, NULL, 1, NULL, NULL),
(17, 20, NULL, 1, NULL, NULL),
(18, 11, NULL, 1, NULL, NULL),
(22, 17, NULL, 1, NULL, NULL),
(19, 18, NULL, 1, NULL, NULL),
(25, 46, NULL, 1, NULL, NULL),
(24, 66, NULL, 1, NULL, NULL),
(19, 96, NULL, 1, NULL, NULL),
(22, 83, NULL, 1, NULL, NULL),
(21, 32, NULL, 1, NULL, NULL),
(22, 19, NULL, 1, NULL, NULL),
(25, 31, NULL, 1, NULL, NULL),
(17, 43, NULL, 1, NULL, NULL),
(17, 45, NULL, 1, NULL, NULL),
(25, 44, NULL, 1, NULL, NULL),
(17, 54, NULL, 1, NULL, NULL),
(23, 55, NULL, 1, NULL, NULL),
(21, 98, NULL, 1, NULL, NULL),
(26, 84, NULL, 1, NULL, NULL),
(21, 47, NULL, 1, NULL, NULL),
(23, 33, NULL, 1, NULL, NULL),
(22, 10, NULL, 1, NULL, NULL),
(24, 2, NULL, 1, NULL, NULL),
(26, 48, NULL, 1, NULL, NULL),
(26, 93, NULL, 1, NULL, NULL),
(26, 12, NULL, 1, NULL, NULL),
(22, 62, NULL, 1, NULL, NULL),
(25, 53, NULL, 1, NULL, NULL),
(19, 2, NULL, 1, NULL, NULL),
(26, 56, NULL, 1, NULL, NULL),
(20, 15, NULL, 1, NULL, NULL),
(21, 56, NULL, 1, NULL, NULL),
(20, 72, NULL, 1, NULL, NULL),
(17, 53, NULL, 1, NULL, NULL),
(21, 12, NULL, 1, NULL, NULL),
(22, 74, NULL, 1, NULL, NULL),
(25, 42, NULL, 1, NULL, NULL),
(26, 87, NULL, 1, NULL, NULL),
(24, 44, NULL, 1, NULL, NULL),
(17, 60, NULL, 1, NULL, NULL),
(23, 85, NULL, 1, NULL, NULL),
(23, 2, NULL, 1, NULL, NULL),
(19, 77, NULL, 1, NULL, NULL),
(24, 2, NULL, 1, NULL, NULL),
(23, 34, NULL, 1, NULL, NULL),
(17, 21, NULL, 1, NULL, NULL),
(19, 55, NULL, 1, NULL, NULL),
(26, 18, NULL, 1, NULL, NULL),
(24, 23, NULL, 1, NULL, NULL),
(21, 81, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--



--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurants`
--


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `restaurantId` int(10) UNSIGNED NOT NULL,
  `orderId` int(10) UNSIGNED NOT NULL,
  `stars` double(8,2) DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `administrativedivisions`
--
ALTER TABLE `administrativedivisions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_restaurantid_foreign` (`restaurantId`),
  ADD KEY `dishes_dishcategoryid_foreign` (`dishCategoryId`);

--
-- Chỉ mục cho bảng `dish_categories`
--
ALTER TABLE `dish_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dish_tags`
--
ALTER TABLE `dish_tags`
  ADD KEY `dish_tags_dishid_foreign` (`dishId`),
  ADD KEY `dish_tags_foodtagid_foreign` (`foodTagId`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_userid_foreign` (`userId`);

--
-- Chỉ mục cho bảng `food_tags`
--
ALTER TABLE `food_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdish`
--
ALTER TABLE `orderdish`
  ADD KEY `orderdish_orderid_foreign` (`orderId`),
  ADD KEY `orderdish_dishid_foreign` (`dishId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_userid_foreign` (`userId`),
  ADD KEY `orders_restaurantid_foreign` (`restaurantId`),
  ADD KEY `orders_discountcodeid_foreign` (`discountCodeId`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_housenumber_unique` (`houseNumber`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_orderid_unique` (`orderId`),
  ADD KEY `reviews_userid_foreign` (`userId`),
  ADD KEY `reviews_restaurantid_foreign` (`restaurantId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `users_username_unique` (`userName`),
  ADD UNIQUE KEY `users_mail_unique` (`mail`),
  ADD KEY `users_restaurantid_foreign` (`restaurantId`);

--
-- Chỉ mục cho bảng `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_userid_foreign` (`userId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `administrativedivisions`
--
ALTER TABLE `administrativedivisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `dish_categories`
--
ALTER TABLE `dish_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `food_tags`
--
ALTER TABLE `food_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_dishcategoryid_foreign` FOREIGN KEY (`dishCategoryId`) REFERENCES `dish_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dishes_restaurantid_foreign` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dish_tags`
--
ALTER TABLE `dish_tags`
  ADD CONSTRAINT `dish_tags_dishid_foreign` FOREIGN KEY (`dishId`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dish_tags_foodtagid_foreign` FOREIGN KEY (`foodTagId`) REFERENCES `food_tags` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orderdish`
--
ALTER TABLE `orderdish`
  ADD CONSTRAINT `orderdish_dishid_foreign` FOREIGN KEY (`dishId`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdish_orderid_foreign` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_discountcodeid_foreign` FOREIGN KEY (`discountCodeId`) REFERENCES `discount_codes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_restaurantid_foreign` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_orderid_foreign` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_restaurantid_foreign` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_restaurantid_foreign` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
