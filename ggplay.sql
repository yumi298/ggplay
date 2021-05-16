-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2021 lúc 10:31 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ggplay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `application`
--

CREATE TABLE `application` (
  `id_app` int(11) NOT NULL,
  `name_app` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `long_desc` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `id_cate` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pictures` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `free_or_not` tinyint(1) NOT NULL,
  `fee` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `application`
--

INSERT INTO `application` (`id_app`, `name_app`, `short_desc`, `long_desc`, `id_cate`, `icon`, `pictures`, `free_or_not`, `fee`, `file`, `status`) VALUES
(14, 'Liên Quân Mobile', '1. Chỉ cần 1 click để tải ngay game chiến thuật hàng đầu Việt Nam.\r\n2. Tải game và chiến hoàn toàn', 'Có gì mới?\r\n● Chuỗi sự kiện Moba Day 5v5 tặng tướng và trang phục miễn phí\r\n● Chế độ mới: Cup Vinh Quang - Tạo chiến đội, thi đấu và nhận quà\r\n● Cải tiến hệ thống nhận diện hành vi xấu\r\n● Tối ưu hiển thị trong trận đấu\r\n● Điều chỉnh cân bằng sức mạnh tướng, phù hiệu, phép bổ trợ và trang bị\r\n\r\nĐẤU TRƯỜNG HUYỀN THOẠI – THẮNG BẠI TẠI KỸ NĂNG!\r\nCùng sát cánh với liên minh của bạn trên đấu trường 5v5 hoàn toàn mới & FREE!\r\n\r\nGIỚI THIỆU\r\nHãy khẳng định bản thân, sát cánh đồng đội và thách đấu hàng triệu người chơi khác qua vô số những cuộc chiến 5v5 cực hay trên đấu trường huyền thoại MOBA Esports 5v5 của Garena Liên Quân Mobile – thắng bại tại kỹ năng!\r\nTham gia ngay vào những Liên Minh Clan trong trò chơi để cùng chiến đấu và trở thành huyền thoại trong game MOBA Esports PC nổi tiếng thế giới.\r\n\r\nHãy chọn ngay một biệt danh vừa chất vừa hay, gia nhập thế giới huyền thoại MOBA Esports 5v5 của Garena Liên Quân Mobile và khiến toàn bộ thế giới biết đến tên của bạn!', 1, 'Array', 'Array', 1, 0, 'Array', ''),
(15, 'Cookpad', ' Liên lạc với chúng tôi tại info-vn@cookpad.com', 'Hàng chục ngàn cách làm món ngon, đơn giản, dễ làm cùng nhiều tính năng hấp dẫn giúp cho việc nấu ăn dễ dàng và vui hơn mỗi ngày với Cookpad! — **Tạo mini-blog cá nhân** Dễ dàng ghi lại cách nấu ăn của nhà bạn như một cuốn sổ tay món ngon online an toàn và đẹp mắt. — **Ăn gì hôm nay?** Tham khảo các bí quyết nấu ăn ', 14, 'Array', 'Array', 1, 0, 'Array', ''),
(21, 'The Coffee House', 'The Coffee House đã có mặt tại 15 tỉnh thành: TP. Hồ Chí Minh, Hà Nội, Cần Thơ, Thanh Hoá, Đồng Nai,', 'Đặt hàng nhanh chóng\r\nGiao hàng tận nơi, tối đa 30 phút. Thanh toán linh hoạt qua thẻ tín dụng, ví điện tử hoặc khi nhận hàng.\r\n\r\nTích điểm, nhận quà\r\nTạo tài khoản, tích điểm mỗi đơn hàng và nhận được các quyền lợi chỉ dành cho thành viên The Coffee House. Hoàn thành nhiệm vụ và nhận những phần quà thú vị.\r\n\r\nƯu đãi\r\nNhận thông báo các ưu đãi, mã giảm giá dành riêng cho bạn, chỉ có trên app.\r\n\r\nTìm cửa hàng\r\nTìm cửa hàng gần nhất, địa chỉ và hướng dẫn đường đi.', 14, 'Array', 'Array', 1, 0, '', ''),
(27, 'aa', 'aa', '', 1, 'Array', 'Array', 1, 0, 'Array', 'Draft');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_cate` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_cate`) VALUES
(1, 'Trò chơi'),
(2, 'Công cụ'),
(4, 'Giáo dục'),
(5, 'Làm đẹp'),
(6, 'Nhiếp ảnh'),
(7, 'Âm nhạc'),
(8, 'Nghệ thuật'),
(9, 'Tài chính'),
(10, 'Thể thao'),
(11, 'Truyện tranh'),
(12, 'Y tế'),
(13, 'Xã hội'),
(14, 'Ăn uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dev`
--

CREATE TABLE `dev` (
  `id_dev` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account` float NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_app`
--

CREATE TABLE `order_app` (
  `id_order` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate_app`
--

CREATE TABLE `rate_app` (
  `id_app` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rate` int(5) NOT NULL,
  `comment` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account` float NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `name`, `account`, `avatar`) VALUES
(0, 'yuminguyen', 'sami719', 'yuminguyen2982000@gmail.com', 'Yumi Nguyễn ', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Chỉ mục cho bảng `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `name_cate` (`id_cate`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `dev`
--
ALTER TABLE `dev`
  ADD PRIMARY KEY (`id_dev`);

--
-- Chỉ mục cho bảng `order_app`
--
ALTER TABLE `order_app`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_ord_app` (`id_app`),
  ADD KEY `fk_ord_user` (`id_user`),
  ADD KEY `fk_ord_dev` (`id_dev`);

--
-- Chỉ mục cho bảng `rate_app`
--
ALTER TABLE `rate_app`
  ADD PRIMARY KEY (`id_app`,`id_user`),
  ADD KEY `fk_rate_user` (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `application`
--
ALTER TABLE `application`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_app`
--
ALTER TABLE `order_app`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_app_cate` FOREIGN KEY (`id_cate`) REFERENCES `category` (`id_category`);

--
-- Các ràng buộc cho bảng `order_app`
--
ALTER TABLE `order_app`
  ADD CONSTRAINT `fk_ord_app` FOREIGN KEY (`id_app`) REFERENCES `application` (`id_app`),
  ADD CONSTRAINT `fk_ord_dev` FOREIGN KEY (`id_dev`) REFERENCES `dev` (`id_dev`),
  ADD CONSTRAINT `fk_ord_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `rate_app`
--
ALTER TABLE `rate_app`
  ADD CONSTRAINT `fk_rate_app` FOREIGN KEY (`id_app`) REFERENCES `application` (`id_app`),
  ADD CONSTRAINT `fk_rate_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
