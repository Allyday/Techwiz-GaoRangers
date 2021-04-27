
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Cơ sở dữ liệu: `techwiz`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `district`, `municipality`, `street`, `houseNumber`, `stars`, `keywords`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kitchen of Nang Tho - Office Rice Online', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '255 Xuan Dinh', '0000000001', 5.00, 'rice', 1, NULL, NULL),
(7, 'Uncle Tieu - Toast With Chili Salt & Sauce', 'Ha Noi', 'Bac Tu Liem', 'Phu Dien', '382 Phu Dien', '0000000002', 5.00, '', 1, NULL, NULL),
(8, 'Delicious Porridge Every Day', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '335 Xuan Dinh', '0000000003', 5.00, '', 1, NULL, NULL),
(9, 'Minh Hang - Delicious Xoi & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Duc Thang', '15 Thuong Thu', '0000000004', 5.00, '', 1, NULL, NULL),
(10, 'Royaltea - 119 Co Nhue Alley', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 2', '311 Phu Dien', '0000000005', 5.00, '', 1, NULL, NULL),
(11, 'Roasted Duck Sticky Rice 88 - Snails, Hot Pot & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 1', '123 Co Nhue 1', '0000000006', 5.00, '', 1, NULL, NULL),
(48, 'Tiger Sugar - Pham Tuan Tai', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654321', 5.00, '', 1, NULL, NULL),
(49, 'Bun Cha Trang Huy', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '0987654221', 5.00, '', 1, NULL, NULL),
(50, 'Ha Long Pearl Yogurt', 'Ha Noi', 'Cau Giay', 'Yen Hoa', 'Nguyen Khang', '0987654657', 5.00, '', 1, NULL, NULL),
(51, 'Teens Food - Snacks', 'Ha Noi', 'Cau Giay', 'Trung Hoa', '123 Pham Tuan Tai', '09372838283', 5.00, '', 1, NULL, NULL),
(52, 'Korean Kitchen - Bếp Hàn Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', 'Tran Quoc Hoan', '0003054321', 5.00, '', 1, NULL, NULL),
(53, 'Chimico - Cơm Trộn & Kim Chi Tỏi Đen', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654392', 5.00, '', 1, NULL, NULL),
(54, 'Snow Hotpot - Tomyum Thai Hotpot & Barbecue Buffet', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '09999999991', 5.00, '', 1, NULL, NULL),
(55, 'Alo Sushi - Ham Nghi', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '9382761532', 5.00, '', 1, NULL, NULL),
(56, 'Fuji Bin - Japanese Restaurant', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654323', 5.00, '', 1, NULL, NULL),
(57, 'XP Veggie - Đồ Ăn Chay Homemade Online', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654324', 5.00, '', 1, NULL, NULL),
(58, 'Chay Riệu Thiện - Đồ Ăn Vặt Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654325', 5.00, '', 1, NULL, NULL),
(59, 'Khanh Ngoc - Steamed Rice & Fast Food - Shop Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654326', 5.00, '', 1, NULL, NULL),
(60, 'Kim Lien - Vermicelli, Vermicelli & Crab Cake', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654327', 5.00, '', 1, NULL, NULL),
(61, 'Chinese Snacks', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654328', 5.00, '', 1, NULL, NULL),
(62, 'Food Vi Thien - Chinese Cuisine', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Viet Xuan', '0987654338', 5.00, '', 1, NULL, NULL),
(63, 'Great Wall - Chinese Delivery', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Tran Duy Hung', '0987654348', 5.00, '', 1, NULL, NULL),
(64, 'Burger +++ - Shop Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Dung Tuy', '0987654331', 5.00, '', 1, NULL, NULL),
(65, 'Fish Noodles Minh Soc', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '094354328', 5.00, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `administrativedivisions`
--

INSERT INTO `dish_categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'soup & salads', 1, NULL, NULL),
(2, 'seafood', 1, NULL, NULL),
(3, 'drinks', 1, NULL, NULL),
(4, 'desserts', 1, NULL, NULL),
(5, 'snacks', 1, NULL, NULL),
(6, 'main dish', 1, NULL, NULL),
(7, 'side dish', 1, NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `description`, `price`, `photo`, `restaurantId`, `dishCategoryId`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Braised meat with quail eggs', 'Braised meat with quail eggs', 48000, 'https://meta.vn/Data/image/2020/09/10/thit-kho-trung-cut-2.jpg', 1, 6, 1, NULL, NULL),
(2, 'Rice with boiled meat & fried spring rolls', 'Rice with boiled meat & fried spring rolls', 45000, 'https://sotaynauan.com/wp-content/uploads/2016/08/cach-lam-mon-nem-ran-cho-mam-co-ngay-ram-3.jpg', 1, 6, 1, NULL, NULL),
(3, 'Rice with beef with wine sauce & fried spring rolls', 'Rice with beef with wine sauce & fried spring rolls', 60000, 'https://amthucvanho.com.vn/wp-content/uploads/2020/02/nau-bo-sot-vang-thom-ngon-doi-bua-cho-ca-nha.jpg', 1, 6, 1, NULL, NULL),
(4, 'Braised meat added', 'Braised meat added', 20000, 'https://giadinh.tv/wp-content/uploads/2016/11/cach-lam-thit-kho-tieu-1-e1480218295847.jpg', 1, 6, 1, NULL, NULL),
(5, 'French fries', 'French fries', 20000, 'https://image-us.eva.vn/upload/2-2019/images/2019-05-24/1558679209-423-thumbnail.jpg', 1, 5, 1, NULL, NULL),
(6, 'Fried spring rolls', 'Fried spring rolls', 20000, 'https://lh3.googleusercontent.com/proxy/Bh7IbSUOoRZvuDyuGQ9XbJliQ9pGmTW0Szl1yqzqn4ADEMV1v0bMtg2vzDwcs30EtBMYfWkHyZsnwglYkOSNhriY55bF8oZSIw1YP2dW3oEJpp0L7Jo9FzVzUBqxd-fDMH2VQ1-Z74NH0SGhEzOtfpKPFOJ3mWMAI7_uk1m3zvFKV-Nc0VKwVCI_cIEukugODGwHCUjEtgLy0fEmqY-wV7t508iRdqV5f4Dcwsbfgwz0OLip8tRFXHl9RMil0WQ', 1, 5, 1, NULL, NULL),
(7, 'Toast with sauce', 'Toast with sauce', 10000, 'https://cdn.daylambanh.edu.vn/wp-content/uploads/2017/08/banh-mi-nuong-moi-ot.jpg', 1, 5, 1, NULL, NULL),
(8, 'Sausage onion sandwiches', 'Sausage onion sandwiches', 10000, 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2010/3/24/0/65755_02_s4x3.jpg.rend.hgtvcom.616.462.suffix/1432371010161.jpeg', 7, 5, 1, NULL, NULL),
(9, 'Peach tea', 'Peach tea', 10000, 'https://thecoffeevn.com/wp-content/uploads/2019/06/Peach-Orange-Tea-tr%C3%A0-Cam-%C4%91%C3%A0o-.png', 7, 3, 1, NULL, NULL),
(10, 'Grilled duck thigh with honey', 'Grilled duck thigh with honey', 25000, 'https://media.cooky.vn/recipe/g5/45703/s480x480/recipe45703-cook-step4-636845324729117785.jpg', 7, 7, 1, NULL, NULL),
(11, 'dried lemon leaf chicken', 'dried lemon leaf chicken', 25000, 'https://cochunhotayninh.com/wp-content/uploads/2017/02/36885793_2052802641404752_3446324497529962496_n.jpg', 7, 5, 1, NULL, NULL),
(12, 'Pork porridgey', 'Pork porridge', 15000, 'https://img.odphub.com/resize/750x-/2020/05/28/cach-nau-chao-thit-heo-cho-be-7-thang-1c76.jpg', 8, 6, 1, NULL, NULL),
(13, 'Chicken Mushroom Porridge', 'Chicken Mushroom Porridge', 15000, 'https://anh.eva.vn/upload/1-2017/images/2017-01-05/1483612941-chao-ga-nam-huong.jpg', 8, 6, 1, NULL, NULL),
(14, 'Beef soup', 'Beef soup', 17000, 'https://cdn.tgdd.vn/Files/2018/12/08/1136565/2-cach-nau-chao-thit-bo-voi-rau-cu-ngon-va-bo-duong-7.jpg', 8, 6, 1, NULL, NULL),
(15, 'Salmon porridge', 'Salmon porridge', 17000, 'https://cdn.daotaobeptruong.vn/wp-content/uploads/2018/11/chao-ca-hoi.jpg', 8, 6, 1, NULL, NULL),
(16, 'Black Bean Stewed Chicken Porridge', 'Black Bean Stewed Chicken Porridge', 39000, 'https://vuinauan.com/wp-content/uploads/2015/10/cach-lam-ga-ac-ham-do-den-cho-ba-bau-1.jpg', 8, 6, 1, NULL, NULL),
(17, 'Shrimp Porridge', 'Shrimp Porridge', 39000, 'https://cdn.daotaobeptruong.vn/wp-content/uploads/2018/10/4cbaabc235457a2dc97a1a76ff39c8ea.jpg', 8, 6, 1, NULL, NULL),
(18, 'Mixed sticky rice', 'Mixed sticky rice', 39000, 'https://i.ytimg.com/vi/MKd85d6UtJs/maxresdefault.jpg', 9, 6, 1, NULL, NULL),
(19, 'Sticky rice', 'Sticky rice', 39000, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(20, 'Sticky rice with scrambled eggs', 'Sticky rice with scrambled eggs', 30000, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(21, 'Sausage sticky rice', 'Sausage sticky rice', 20000, 'http://xoicunho.vn/wp-content/uploads/2018/04/x3.png', 9, 6, 1, NULL, NULL),
(22, 'Fried egg', 'Fried egg', 10000, 'https://media.phunutoday.vn/files/upload_images/2016/08/05/cach-ran-trung-ngon.jpg', 9, 6, 1, NULL, NULL),
(23, 'French fries', 'French fries', 20000, 'https://monngonmoingay.com/wp-content/uploads/2021/03/fries.jpeg', 9, 5, 1, NULL, NULL),
(24, 'Royaltea Kumquat Tea', 'Royaltea Kumquat Tea', 40000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(25, 'Fresh Passion Fruit Juice', 'Fresh Passion Fruit Juice', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(26, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(27, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 9, 3, 1, NULL, NULL),
(28, 'Royaltea Roasted Milk Tea', 'Royaltea Roasted Milk Tea', 35000, 'https://i.pinimg.com/736x/00/6c/15/006c1550512fb01dbd356c91d00ede61.jpg', 9, 3, 1, NULL, NULL),
(29, 'Fresh Passion Fruit Juice', 'Fresh Passion Fruit Juice', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(30, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(31, 'Kumquat & Mint Tea', 'Kumquat & Mint Tea', 35000, 'https://images.foody.vn/res/g67/667328/s750x750/d24b33d0-bee7-4641-2ff6-d2c8e6590545.jpg', 10, 3, 1, NULL, NULL),
(32, 'Royaltea Roasted Milk Tea', 'Royaltea Roasted Milk Tea', 35000, 'https://i.pinimg.com/736x/00/6c/15/006c1550512fb01dbd356c91d00ede61.jpg', 10, 3, 1, NULL, NULL),
(33, 'Sticky Chicken Thighs', 'Sticky Chicken Thighs', 10000, 'https://img-global.cpcdn.com/recipes/919819583a7d8cdb/751x532cq70/dui-ga-bo-xoi-recipe-main-photo.jpg', 11, 7, 1, NULL, NULL),
(34, 'Roasted duck', 'Roasted duck', 190000, 'https://cdn.tgdd.vn/Files/2019/11/24/1221793/huong-dan-3-cach-thuc-hien-mon-vit-nuong-mat-ong-de-lam-tai-nha-10.jpg', 11, 6, 1, NULL, NULL),
(35, 'Tiger Milk Pearl Brown Sugar (M)', NULL, 92000, 'https://images.foody.vn/res/g105/1049662/s120x120/7f92033a-3692-4e0d-9f18-2dd7ac75-1e60aabd-201014175352.jpeg', 48, 3, 1, NULL, NULL),
(36, 'Matcha Brown Sugar Milk (M)', NULL, 34000, 'https://images.foody.vn/res/g105/1049662/s120x120/80f9a4b3-ad5c-4e90-b311-316d0460-ae9303b6-201014180728.jpeg', 48, 3, 1, NULL, NULL),
(37, 'Milk Cocoa Brown Sugar (M)', NULL, 34000, 'https://images.foody.vn/res/g105/1049662/s120x120/6d2f2928-02a4-4502-a1e7-4523f1a2-af301fe1-201014175029.jpeg', 48, 3, 1, NULL, NULL),
(38, 'Chocolate Mix Brown Sugar (L)', NULL, 36000, 'https://images.foody.vn/res/g105/1049662/s120x120/47984f75-a2fb-45de-a6b9-4a1b5a8b-2e94603f-201014175407.jpeg', 48, 3, 1, NULL, NULL),
(39, 'Durian Brown Sugar (M)', NULL, 45000, 'https://images.foody.vn/res/g105/1049662/s120x120/dc93c46e-4e01-4a01-8cdb-67766009-40e41bb1-201014175504.jpeg', 48, 3, 1, NULL, NULL),
(40, 'Tiger Tropical Grapefruit Tea', NULL, 45000, 'https://images.foody.vn/res/g105/1049662/s120x120/40f21341-f4ec-4345-8f81-1b0c0c52-643a5b27-201014180534.jpeg', 48, 3, 1, NULL, NULL),
(41, 'Snow Tiger Plum Blossom', NULL, 50000, 'https://images.foody.vn/res/g105/1049662/s120x120/6b070fd3-cf85-46c6-82d7-c1bf3fea-e76b806f-201014180433.jpeg', 48, 3, 1, NULL, NULL),
(42, 'Milk Mango Tea (L)', NULL, 33000, 'https://images.foody.vn/res/g105/1049662/s120x120/7d45f751-9836-4d17-9a53-65bdea77-bd8177e5-201014180055.jpeg', 48, 3, 1, NULL, NULL),
(43, 'Cacao(M)', NULL, 20000, 'https://images.foody.vn/res/g105/1049662/s120x120/9c2ef33c-bff7-41cc-ab0e-bbd44afa-83399383-201014180143.jpeg', 48, 3, 1, NULL, NULL),
(44, 'Jasmine Milk Tea (M)', NULL, 40000, 'https://images.foody.vn/res/g105/1049662/s120x120/0837ad90-fdd5-4b45-90bb-0f503b80-64e62f30-201014175801.jpeg', 48, 3, 1, NULL, NULL),
(45, 'Tiger Honey Kumquat Passion Fruit Tea', NULL, 43000, 'https://images.foody.vn/res/g105/1049662/s120x120/08ac5f77-4bc1-468c-b5c9-ef5bd968-4967b6df-201014180549.jpeg', 48, 3, 1, NULL, NULL),
(46, 'Full Traditional Bun Cha', NULL, 35000, 'https://images.foody.vn/res/g95/942716/s120x120/73dbf8ba-ec32-4dc6-ac35-c889cac33396.jpg', 49, 6, 1, NULL, NULL),
(47, 'Bun Bun Banh Vien', NULL, 35000, 'https://images.foody.vn/res/g95/942716/s120x120/4e1a516a-3d25-4656-a157-2fa798c6b8cc.jpg', 49, 6, 1, NULL, NULL),
(48, 'Bun Cha Ba Chi Thai Pieces', NULL, 35000, 'https://images.foody.vn/res/g95/942716/s120x120/51136c04-bce1-4505-a9a5-4b959fc51d19.jpg', 49, 6, 1, NULL, NULL),
(49, 'Bun nem', NULL, 30000, 'https://images.foody.vn/res/g95/942716/s120x120/e09c86f4-56b2-4996-8838-1e3e4d9a-c743f7c2-210327221939.jpeg', 49, 6, 1, NULL, NULL),
(50, 'Vermicelli Noodles with Shrimp and Pork Noodles', NULL, 40000, 'https://images.foody.vn/res/g95/942716/s120x120/6ee8d7d6-13c7-4d65-95a5-97111d72-42164b46-210327222009.jpeg', 49, 6, 1, NULL, NULL),
(51, 'Fried Spring Rolls 10 Pieces', NULL, 80000, 'https://images.foody.vn/res/g95/942716/s120x120/e09c86f4-56b2-4996-8838-1e3e4d9a-c743f7c2-210327221939.jpeg', 49, 6, 1, NULL, NULL),
(52, 'Coca', NULL, 10000, 'https://images.foody.vn/res/g95/942716/s120x120/deb88368-5c51-42ed-babc-96fc7110-4e612f2d-210222221928.jpeg', 49, 6, 1, NULL, NULL),
(53, 'String', NULL, 10000, 'https://images.foody.vn/res/g95/942716/s120x120/80a69e24-b390-48ce-9702-3e24c56f-dd42aacd-210222222300.jpeg', 49, 6, 1, NULL, NULL),
(54, 'Strongbow', NULL, 13000, 'https://images.foody.vn/res/g95/942716/s120x120/a13c8623-bd28-4277-902d-04b4bd3c-c13c4153-210314023650.jpeg', 49, 6, 1, NULL, NULL),
(55, 'Noodles Extra', NULL, 10000, 'https://images.foody.vn/res/g95/942716/s120x120/9940e53a-6900-4736-babe-f437ae1a1d5a.jpg', 49, 6, 1, NULL, NULL),
(56, 'White Pearl Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/a8be7911-9e79-45c7-833c-89d558f1ef42.jpeg', 50, 5, 1, NULL, NULL),
(57, 'Coconut Milk Pearl Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/04c83355-7976-4b2d-aaf7-3c4a3eac68a7.jpeg', 50, 5, 1, NULL, NULL),
(58, 'Coconut Milk Passion Fruit Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/ddea01bb-6f20-456b-9435-07dc5961ec86.jpeg', 50, 5, 1, NULL, NULL),
(59, 'Macchiato Coconut Bubble Ice Cream Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/b519c1eb-0e29-4329-a5da-6a55d20cd380.jpg', 50, 5, 1, NULL, NULL),
(60, 'Mango Coconut Yogurt with Coconut Essence', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/0ae1acf4-be3b-4d41-b7c7-85f5bf17df4e.jpeg', 50, 5, 1, NULL, NULL),
(61, 'Black Sugar Pearl Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/9f6f1513-a75c-4d8c-acba-ba336094e007.jpeg', 50, 5, 1, NULL, NULL),
(62, 'Cantaloupe Coconut Milk Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/a7f12e54-aae3-4ac5-88c0-4245a5472ca3.jpg', 50, 5, 1, NULL, NULL),
(63, 'Aloe Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/b65abeff-6c51-4762-8f98-78ece038b5b2.jpeg', 50, 5, 1, NULL, NULL),
(64, 'Coconut Milk Pearl Blueberry Yogurt', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/2935fa68-3617-410c-a591-b7b0a1f4d877.jpeg', 50, 5, 1, NULL, NULL),
(65, 'Coffee Yogurt with Coconut Milk Pearl', NULL, 23000, 'https://images.foody.vn/res/g101/1000595/s120x120/c63b448e-c1c9-4ad1-a0a3-3620fd62fc4e.jpeg', 50, 5, 1, NULL, NULL),
(66, 'Tokbokki Phomai', NULL, 34000, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184126-tokbokki-phomai.jpg', 51, 6, 1, NULL, NULL),
(67, 'Fried kimbap', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/b89a4878-0c0e-48c5-8adc-47edf355-c8ab079c-201013152642.jpeg', 51, 6, 1, NULL, NULL),
(68, 'Kimbap', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/7f177709-d5f3-4842-ba33-9a494f4196a3.jpg', 51, 6, 1, NULL, NULL),
(69, 'Cheese Black Noodles', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184236-my-den.jpg', 51, 6, 1, NULL, NULL),
(70, 'Shake Cheese Rice Cake', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/06eea21d-2b50-4e8d-a31c-a7cc8a2fa230.jpg', 51, 6, 1, NULL, NULL),
(71, 'Mixed Noodles', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/24fd709a-8a13-4c38-9a1b-a4e37fcf0b9a.jpg', 51, 6, 1, NULL, NULL),
(72, 'Noodles With Sausage', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/293704c9-d552-4d97-9a9b-823110dfd813.jpg', 51, 6, 1, NULL, NULL),
(73, 'My Nui Cheese Sausage', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/48b7352d-ad2e-4eb1-b5ad-322e026a16e3.jpg', 51, 6, 1, NULL, NULL),
(74, 'Mixed Noodles with Seafood & Dried Beef', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/e1e883fe-3f23-482c-944e-2fed12b3fd38.jpg', 51, 6, 1, NULL, NULL),
(75, 'Fried Black Noodles With Seafood Balls', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/591e61e9-25e2-4e55-bc0f-9d7ccdca3d58.jpg', 51, 6, 1, NULL, NULL),
(76, 'Tokbokki Phomai', NULL, 34000, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184126-tokbokki-phomai.jpg', 52, 6, 1, NULL, NULL),
(77, 'Fried kimbap', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/b89a4878-0c0e-48c5-8adc-47edf355-c8ab079c-201013152642.jpeg', 52, 6, 1, NULL, NULL),
(78, 'Kimbap', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/7f177709-d5f3-4842-ba33-9a494f4196a3.jpg', 52, 6, 1, NULL, NULL),
(79, 'Cheese Black Noodles', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/2018919184236-my-den.jpg', 52, 6, 1, NULL, NULL),
(80, 'Shake Cheese Rice Cake', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/06eea21d-2b50-4e8d-a31c-a7cc8a2fa230.jpg', 52, 6, 1, NULL, NULL),
(81, 'Mixed Noodles', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/24fd709a-8a13-4c38-9a1b-a4e37fcf0b9a.jpg', 52, 6, 1, NULL, NULL),
(82, 'Noodles With Sausage', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/293704c9-d552-4d97-9a9b-823110dfd813.jpg', 52, 6, 1, NULL, NULL),
(83, 'My Nui Cheese Sausage', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/48b7352d-ad2e-4eb1-b5ad-322e026a16e3.jpg', 52, 6, 1, NULL, NULL),
(84, 'Mixed Noodles with Seafood & Dried Beef', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/e1e883fe-3f23-482c-944e-2fed12b3fd38.jpg', 52, 6, 1, NULL, NULL),
(85, 'Fried Black Noodles With Seafood Balls', NULL, 40000, 'https://images.foody.vn/res/g26/253870/s120x120/591e61e9-25e2-4e55-bc0f-9d7ccdca3d58.jpg', 52, 6, 1, NULL, NULL),
(86, 'Korean Mixed Rice - Beef', NULL, 71000, 'https://images.foody.vn/res/g70/691461/s120x120/28253697-c0b7-426d-6513-fd0dc2ddee42.jpg', 53, 6, 1, NULL, NULL),
(87, 'Kim Chi Fried Rice - Beef', NULL, 72000, 'https://images.foody.vn/res/g70/691461/s120x120/3ada697d-a227-430c-73ee-8deb1f9bf662.jpg', 53, 6, 1, NULL, NULL),
(88, 'Korean Seafood Mixed Rice', NULL, 73000, 'https://images.foody.vn/res/g70/691461/s120x120/682efee5-60ab-4b87-1951-ec9b6c1678f3.jpg', 53, 6, 1, NULL, NULL),
(89, 'Korean Mixed Rice - Chicken', NULL, 74000, 'https://images.foody.vn/res/g70/691461/s120x120/cb47f98c-1c1d-4e50-d5ac-272d14cab4a5.jpg', 53, 6, 1, NULL, NULL),
(90, 'Korean Seafood Mixed Rice', NULL, 75000, 'https://images.foody.vn/res/g70/691461/s120x120/682efee5-60ab-4b87-1951-ec9b6c1678f3.jpg', 53, 6, 1, NULL, NULL),
(91, 'Korean Mixed Noodles - Chicken', NULL, 76000, 'https://images.foody.vn/res/g70/691461/s120x120/0ab39281-bc94-4c99-8265-030da08097d5.jpg', 53, 6, 1, NULL, NULL),
(92, 'Kim Chi Fried Rice With Beef', NULL, 77000, 'https://images.foody.vn/res/g70/691461/s120x120/c40413c0-3f0c-4ea7-4cdf-5c0c7ddcb7b6.jpg', 53, 6, 1, NULL, NULL),
(93, 'Seaweed soup', NULL, 78000, 'https://images.foody.vn/res/g70/691461/s120x120/db5b81ba-7979-4dd2-202b-98955c3d49d7.jpg', 53, 6, 1, NULL, NULL),
(94, 'Peach Tea', NULL, 20000, 'https://images.foody.vn/res/g70/691461/s120x120/43aaf8bc-838c-409b-cd96-a825e169fa3f.jpg', 53, 3, 1, NULL, NULL),
(95, 'Lemon Tea', NULL, 80000, 'https://images.foody.vn/res/g70/691461/s120x120/20181119162811-chanh.jpg', 53, 3, 1, NULL, NULL),
(96, 'Rice', NULL, 10000, 'https://images.foody.vn/res/g70/691461/s120x120/1982cb61-1384-4427-90d4-364d2ed8e6e6.jpg', 53, 6, 1, NULL, NULL);

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food_tags`
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
(18, '2021_04_24_014843_create_users_table', 4);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

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
  `orderStatus` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

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

CREATE TABLE `restaurants` (
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `city`, `district`, `municipality`, `street`, `houseNumber`, `stars`, `keywords`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Kitchen of Nang Tho - Office Rice Online', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '255 Xuan Dinh', '0000000001', 5.00, 'rice', 1, NULL, NULL),
(7, 'Uncle Tieu - Toast With Chili Salt & Sauce', 'Ha Noi', 'Bac Tu Liem', 'Phu Dien', '382 Phu Dien', '0000000002', 5.00, '', 1, NULL, NULL),
(8, 'Delicious Porridge Every Day', 'Ha Noi', 'Bac Tu Liem', 'Xuan Dinh', '335 Xuan Dinh', '0000000003', 5.00, '', 1, NULL, NULL),
(9, 'Minh Hang - Delicious Xoi & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Duc Thang', '15 Thuong Thu', '0000000004', 5.00, '', 1, NULL, NULL),
(10, 'Royaltea - 119 Co Nhue Alley', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 2', '311 Phu Dien', '0000000005', 5.00, '', 1, NULL, NULL),
(11, 'Roasted Duck Sticky Rice 88 - Snails, Hot Pot & Snacks', 'Ha Noi', 'Bac Tu Liem', 'Co Nhue 1', '123 Co Nhue 1', '0000000006', 5.00, '', 1, NULL, NULL),
(48, 'Tiger Sugar - Pham Tuan Tai', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654321', 5.00, '', 1, NULL, NULL),
(49, 'Bun Cha Trang Huy', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '0987654221', 5.00, '', 1, NULL, NULL),
(50, 'Ha Long Pearl Yogurt', 'Ha Noi', 'Cau Giay', 'Yen Hoa', 'Nguyen Khang', '0987654657', 5.00, '', 1, NULL, NULL),
(51, 'Teens Food - Snacks', 'Ha Noi', 'Cau Giay', 'Trung Hoa', '123 Pham Tuan Tai', '09372838283', 5.00, '', 1, NULL, NULL),
(52, 'Korean Kitchen - Bếp Hàn Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', 'Tran Quoc Hoan', '0003054321', 5.00, '', 1, NULL, NULL),
(53, 'Chimico - Cơm Trộn & Kim Chi Tỏi Đen', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654392', 5.00, '', 1, NULL, NULL),
(54, 'Snow Hotpot - Tomyum Thai Hotpot & Barbecue Buffet', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '09999999991', 5.00, '', 1, NULL, NULL),
(55, 'Alo Sushi - Ham Nghi', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '9382761532', 5.00, '', 1, NULL, NULL),
(56, 'Fuji Bin - Japanese Restaurant', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654323', 5.00, '', 1, NULL, NULL),
(57, 'XP Veggie - Đồ Ăn Chay Homemade Online', 'Ha Noi', 'Cau Giay', 'Yen Hoa', '123 Pham Tuan Tai', '0987654324', 5.00, '', 1, NULL, NULL),
(58, 'Chay Riệu Thiện - Đồ Ăn Vặt Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654325', 5.00, '', 1, NULL, NULL),
(59, 'Khanh Ngoc - Steamed Rice & Fast Food - Shop Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654326', 5.00, '', 1, NULL, NULL),
(60, 'Kim Lien - Vermicelli, Vermicelli & Crab Cake', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654327', 5.00, '', 1, NULL, NULL),
(61, 'Chinese Snacks', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Tuan Tai', '0987654328', 5.00, '', 1, NULL, NULL),
(62, 'Food Vi Thien - Chinese Cuisine', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Pham Viet Xuan', '0987654338', 5.00, '', 1, NULL, NULL),
(63, 'Great Wall - Chinese Delivery', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Tran Duy Hung', '0987654348', 5.00, '', 1, NULL, NULL),
(64, 'Burger +++ - Shop Online', 'Ha Noi', 'Cau Giay', 'Dich Vong Hau', '123 Dung Tuy', '0987654331', 5.00, '', 1, NULL, NULL),
(65, 'Fish Noodles Minh Soc', 'Ha Noi', 'Cau Giay', 'Quan Hoa', '123 Pham Tuan Tai', '094354328', 5.00, '', 1, NULL, NULL);

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
(67, '0903923987', 'user030', 'Kai', 'Halle', '$2y$10$HZUsZM2uv77cMbwHYN5tqeEFpG9RhFRbm8ynG9.yOGmZVWKUud/iS', 'female', 'http://img/', 'user0965@gmail.com', NULL, 2, 1);

-- --------------------------------------------------------

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
(58, 65, '124 ,Cong Vi, Buoi, Tay Ho', 1, 0, NULL, NULL);

--