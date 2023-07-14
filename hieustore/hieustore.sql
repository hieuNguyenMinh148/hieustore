-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2023 lúc 06:18 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hieustore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `name`, `phone`, `username`, `password`, `role`) VALUES
(1, 'Nguyễn Minh Hiếu', '0868179633', 'hieuadmin148', '14082002', b'1'),
(2, 'Nguyễn Minh Hiếu in love', '0213838242', 'kim_inluv0412', '04122002', b'0'),
(4, 'Nguyễn Minh Hiếu123', '0909878908', 'hieu14082002', 'Hi14082002', b'0'),
(13, 'Nguyễn Minh Hiếu', '0909878908', '1', '1', b'1'),
(14, 'hieu', '0909', '2', '2', b'0'),
(16, 'Hiếu', '123123', '3', '3', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` tinyint(1) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `mobile`, `address`, `payment_method`, `customer_id`) VALUES
(4, 'Nguyen Minh Hieu', '0868179633', 'Tỉnh Lào Cai, Huyện Long Biên, Xã Kim Sơn, Phú Diễn', 0, 14),
(5, 'Nguyen Minh Hieu', '0868179633', 'Tỉnh Vĩnh Phúc, Huyện Gia Lâm, Xã Kim Sơn, Phú Diễn', 1, 14),
(6, 'Nam', '123123', 'Tỉnh Cao Bằng, Huyện Long Biên, Xã Kim Sơn, Phú Diễn', 1, 4),
(7, 'Nguyen Minh Hieu', '0868179633', 'Tỉnh Bắc Ninh, Huyện Gia Lâm, Xã Kim Sơn, ha noi', 1, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `mobile`, `content`) VALUES
(4, 'Nguyen Minh Hieu', 'nguyenminhhieu14082002@gmail.com', '0868179633', 'k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `customer_id`, `product_id`, `price`) VALUES
(66, 4, 3, 849000),
(69, 4, 5, 1500000),
(74, 4, 2, 200000),
(75, 13, 2, 200000),
(78, 14, 4, 250000),
(79, 14, 4, 250000),
(80, 14, 5, 1500000),
(81, 4, 5, 1500000),
(84, 16, 5, 1500000),
(85, 16, 8, 180000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `featured_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `featured_image`) VALUES
(2, 'Kem làm trắng da 5 trong 1 Beaumore Secret Whitening Cream', 200000, 'suaTamSandrasMychai250ml.jpg'),
(3, 'Kem làm sáng da Beaumore- 50ml', 849000, 'kemLamSangVungDaBikini.jpg'),
(4, 'Sữa rửa mặt nghệ Beaumore Mới - 100g', 250000, 'suaRuaMatNgheBeaumore100g.jpg'),
(5, 'Kem lụa làm đẹp da Beaumore- 30ml', 1500000, 'kemLuaLamDepDaBeaumore.jpg'),
(6, 'Kem làm đẹp tức thì  Instant Beaumore', 762000, 'kemLamDepTucThiInstantBeauMore.jpg'),
(7, 'Sữa tắm Sandras Shower Gel', 180000, 'suaTamSandrasShowerGel.jpg'),
(8, 'Sữa dưỡng thể Sandras chai 88ml', 180000, 'suaDuongTheSandraschai88ml.jpg'),
(9, 'Sữa tắm Sandras Mỹ chai 250ml', 210000, 'suaTamSandrasMychai250ml.jpg'),
(10, 'Kem Dưỡng Trắng Da Ngày vs Đêm', 265000, 'kemDuongTrangDaNgayVaDem.jpg'),
(11, 'Kem nền trang điểm dưỡng da Sandras BB 24h- 15ml', 321000, 'kemNenTrangDiemDuongDaSandrasBB.jpg'),
(12, 'Kem làm trắng bảo vệ da chống nắng dùng làm kem nền khi trang điểm Beaumore 4 in 1 Cream- 40ml', 604000, 'kemChongNangBeaumore4in1.jpg'),
(13, 'Kem làm trắng da và mờ nếp nhăn từ Nhân sâm Sandras Beauty- 20g ', 380000, 'nhamSamSandrasBeauty20g.jpg'),
(14, 'Kem dưỡng da vùng mắt Beaumore Contour Eye Cream- 10g', 300000, 'beaumoreContourEyeCream.jpg'),
(15, 'Kem làm trắng da ngăn ngừa nám và tàn nhang từ hổ phách Beaumore- 30g', 520000, 'kemTrangDaHoPhachBeaumore30g.jpg'),
(16, 'Kem làm phai vết nám và tàn nhang Beaumore- 15g', 249000, 'kemPhaiNamVaTanNhanBeaumore.jpg'),
(17, 'Sữa tắm trắng Aroma White Maximum Beaumore- 250ml', 180000, 'aromaWhiteMaximumBeaumore250ml.jpg'),
(18, 'Kem giải độc tố pH Beaumore- 20ml', 239000, 'kemGiaiDocToPh20ml.jpg'),
(19, 'Kem làm mờ nám Ngày Đêm Nám đôi Mỹ Beaumore- 10g x 2 hũ', 901000, 'kemLamMoNamNgayDemDoiMy.jpg'),
(20, 'Kem làm trắng da từ Linh Chi và Đông Trùng Hạ Thảo Sandras Beauty-15g', 905000, 'kemTrangDaLinhChiDongTrungHaThao.jpg'),
(21, 'Kem Dưỡng Trắng Da Beaumore UV/30 - 15g USA', 590000, 'kemDuongTrangDaUV3015g.jpg'),
(22, 'Sữa rửa mặt HA Amino Beaumore- 75g', 520000, 'suaRuamatHAAmino75g.jpg'),
(23, 'Kem chống nắng Beaumore - 80ml - giá sỉ​, giá tốt\r\nKem chống nắng Beaumore - 80ml', 249000, 'kemChongNangSunDefense80ml.jpg'),
(24, 'Sữa rửa mặt hạt mơ Beaumore- 120g ', 180000, 'suaRuaMatHatMo120g.jpg'),
(25, 'Kem trị mụn nghệ Nhật Beaumore Pure Turmeric Cream (Mới)- 20g ', 239000, 'kemTriMunNghePureTurmeric20g.jpg'),
(45, 'Nguyễn Minh Hiếu', 1234, 'night_fall.jpg'),
(65, '3', 50000, 'vision.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
