-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2021 lúc 01:12 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_googleplay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `name_app` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `app`
--

INSERT INTO `app` (`id`, `name_app`, `category`, `price`, `description`, `img`) VALUES
(15, 'ewrvwev', '', 2331111, 'svwvw', ''),
(16, 'ưefwe', 'Mua sắm', 123456, 'fhfhfh', 'entertain1.png'),
(17, 'dream soccer', 'Giải trí', 120000, 'chưa biết nói gì', 'entertain2.png'),
(19, 'sdvwd', 'Sách', 1234567890, 'gtgtg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `developer`
--

CREATE TABLE `developer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `identify1` varchar(255) NOT NULL,
  `identify2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `developer`
--

INSERT INTO `developer` (`id`, `fullname`, `phonenumber`, `place`, `identify1`, `identify2`) VALUES
(1, 'Nguyễn Hiền Sơn', '', '123 bla bla', '', ''),
(2, 'Nguyễn Hiền Sơn', '123121221', '123 bla bla', '', ''),
(3, 'Nguyễn Hiền Sơn', '', '123 bla bla', '', ''),
(4, 'Nguyễn Hiền Sơn', '0901233123', '123 bla bla', '', ''),
(5, 'Nguyễn Hiền Sơn', '0901233123', '123 bla bla', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'admin', 'admin'),
(3, 'user', 'user', 'user'),
(16, 'aloalo', '1234', 'sonne');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
