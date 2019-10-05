-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2019 lúc 01:16 PM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yolo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctg_prd`
--

CREATE TABLE `ctg_prd` (
  `id` int(11) NOT NULL,
  `id_ctg` int(11) NOT NULL,
  `id_prd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ctg_prd`
--

INSERT INTO `ctg_prd` (`id`, `id_ctg`, `id_prd`) VALUES
(1, 2, 14),
(2, 3, 14),
(3, 4, 1),
(4, 2, 1),
(5, 2, 2),
(6, 4, 15),
(7, 1, 13),
(8, 4, 11),
(9, 3, 9),
(10, 3, 7),
(11, 3, 6),
(12, 2, 5),
(13, 3, 4),
(14, 3, 3),
(15, 4, 16),
(16, 3, 16),
(17, 2, 16),
(18, 1, 16),
(19, 5, 12),
(20, 4, 12),
(21, 3, 12),
(22, 5, 8),
(23, 4, 8),
(24, 2, 8),
(25, 3, 10),
(26, 2, 10),
(27, 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(75) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_sale` int(11) DEFAULT NULL,
  `full_detail` text,
  `amount` int(11) NOT NULL,
  `check_new` int(11) DEFAULT NULL,
  `check_hot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_sale`, `full_detail`, `amount`, `check_new`, `check_hot`) VALUES
(1, 'Dalat Wine', 53, 23, 'Something', 54, 1, 0),
(2, 'Tam Dao Wine', 41, 10, 'Something', 12, 1, 1),
(3, 'Da Lat Wine 3 Year', 66, 10, 'Something', 12, 0, 0),
(4, 'Tam Dao Wine 6 Year', 77, 11, 'Something', 12, 0, 1),
(5, 'PaPaLe 6 Year', 65, 25, 'Something', 55, 0, 1),
(6, 'Passion 5 Year', 49, 25, 'Something', 55, 0, 1),
(7, 'Napa Valley 9 Year', 125, 3, 'Something', 10, 1, 1),
(8, 'Gahors 14 Year', 260, 7, 'Something', 10, 1, 0),
(9, 'Finger 17 Year', 280, 9, 'Something', 10, 0, 0),
(10, 'Finger 5 Year', 170, 66, 'Something', 10, 1, 1),
(11, 'Chateau 5 Year', 180, 54, 'Something', 10, 1, 1),
(12, 'Chateau 15 Year', 444, 0, 'Something', 10, 0, 1),
(13, 'Henesy 30 Year', 970, 15, 'Something', 0, 1, 0),
(14, 'Paul Massion 20 Year', 991, 0, 'Something', 4, 1, 1),
(15, 'Demo', 999, 10, 'Nothing to say', 56, 0, 1),
(16, 'demo2233', 5656, 55, '34324234wdfsdf', 44, 1, 0),
(17, 'sdf', 34, 4, '3424', 34, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_img`
--

CREATE TABLE `product_img` (
  `id_img` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_img`
--

INSERT INTO `product_img` (`id_img`, `product_id`, `img_link`) VALUES
(1, 11, '1.jpg'),
(2, 12, '2.jpg'),
(3, 2, '4.jpg'),
(4, 1, '3.jpg'),
(5, 3, '5.jpg'),
(6, 4, '6.jpg'),
(7, 5, '7.jpg'),
(8, 6, '8.jpg'),
(9, 7, '9.jpg'),
(10, 8, '10.jpg'),
(11, 9, '5.jpg'),
(12, 10, '12.jpg'),
(13, 1, '6.jpg'),
(14, 3, '4.jpg'),
(15, 4, '7.jpg'),
(16, 5, '6.jpg'),
(17, 6, '11.jpg'),
(18, 7, '10.jpg'),
(19, 8, '1.jpg'),
(20, 9, '8.jpg'),
(21, 13, '4.jpg'),
(22, 14, '3.jpg'),
(23, 15, '166862.jpg'),
(24, 15, '81867.jpg'),
(25, 15, '82280.jpg'),
(26, 15, '52174.jpg'),
(27, 15, '53963.jpg'),
(28, 15, '84604.jpg'),
(29, 15, '84635.jpg'),
(30, 15, '85247.jpg'),
(31, 16, '51666.jpg'),
(32, 17, '328192.jpg'),
(33, 17, '328413.jpg'),
(34, 16, '30530.jpg'),
(35, 16, '35226.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(5) NOT NULL,
  `product_type` varchar(75) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`, `active`) VALUES
(1, 'VietNam Wine', 1),
(2, 'France Wine', 1),
(3, 'Italy Wine', 1),
(4, 'Germany Wine', 1),
(5, 'US Wine', 1),
(6, 'Demo 1', 0),
(7, 'Demo 2', 0),
(8, 'Demo 3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `account` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(70) NOT NULL,
  `birth` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctg_prd`
--
ALTER TABLE `ctg_prd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ctg` (`id_ctg`),
  ADD KEY `ic_prd` (`id_prd`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ctg_prd`
--
ALTER TABLE `ctg_prd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_img`
--
ALTER TABLE `product_img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctg_prd`
--
ALTER TABLE `ctg_prd`
  ADD CONSTRAINT `ctg_prd_ibfk_1` FOREIGN KEY (`id_ctg`) REFERENCES `product_type` (`product_type_id`),
  ADD CONSTRAINT `ctg_prd_ibfk_2` FOREIGN KEY (`id_prd`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
