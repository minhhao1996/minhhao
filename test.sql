-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 20, 2018 lúc 12:34 PM
-- Phiên bản máy phục vụ: 10.3.10-MariaDB-log
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` int(10) NOT NULL DEFAULT 0,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `parent_id`, `keyword`, `location`, `create_at`, `update_at`) VALUES
(42, 'Điện Thoại', 0, 'điện thoại, phone', 1, '2018-12-14 13:39:39', NULL),
(48, 'SamSung', 42, 'samsung, dienthoai', 1, '2018-12-14 13:57:36', NULL),
(43, 'Máy tính Bảng', 0, 'máy tính bảng', 2, '2018-12-14 13:40:18', NULL),
(44, 'Laptop', 0, 'laptop', 3, '2018-12-14 13:40:53', NULL),
(49, 'Iphone', 42, 'iphone', 2, '2018-12-14 16:43:30', NULL),
(47, 'Asus', 42, 'asua', 1, '2018-12-19 04:37:44', '2018-12-18 21:37:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `makers`
--

CREATE TABLE `makers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `makers`
--

INSERT INTO `makers` (`id`, `name`, `code`, `keyword`, `status`, `create_at`, `update_at`) VALUES
(9, 'FPT Arena', 'Ft01', 'fpt', 1, '2018-12-18 05:23:25', NULL),
(8, 'Apple', 'ap01', 'apple,iphone', 1, '2018-12-14 16:44:05', NULL),
(7, 'SamSung Viet Nam', 'ss01', 'samsung, dienthoai', 1, '2018-12-14 13:43:56', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('haole042@gmail.com', '$2y$10$/ImpsW4aYDA/yvIg84mkCO0q8fwFnSL.OsFU2Utp0lAodLx5GU1OG', '2018-12-10 22:47:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `maker_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `images` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT 0,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  `gifts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(3) NOT NULL DEFAULT 0,
  `views` int(10) NOT NULL DEFAULT 0,
  `buyed` int(11) NOT NULL DEFAULT 0,
  `warranty` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cat_id`, `maker_id`, `name`, `avatar`, `images`, `price`, `discount`, `title`, `contents`, `gifts`, `total`, `views`, `buyed`, `warranty`, `status`, `create_at`, `update_at`) VALUES
(42, 48, 7, 'Samsung A7 2018', 'a71.png', NULL, 7850000, 4, 'sssss', '<p>ssssss</p>', NULL, 5, 0, 0, '0', 0, '2018-12-18 12:26:33', NULL),
(41, 49, 8, 'Iphon X', 'ip1.jpg', NULL, 150000, 0, 'sssss', '<p>sss</p>', NULL, 1, 0, 0, '0', 0, '2018-12-18 12:21:59', NULL),
(40, 48, 8, 'LÊ MINH HẢO', 'ip1.jpg', NULL, 1100000, 0, 'sss', '<p>sss</p>', NULL, 24, 0, 0, NULL, 1, '2018-12-18 09:44:10', '2018-12-18 02:55:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`, `create_at`, `update_at`) VALUES
(120, 42, 'a74.jpg', '2018-12-18 12:26:33', NULL),
(121, 42, 'a712.jpg', '2018-12-18 12:26:33', NULL),
(119, 42, 'a73.jpg', '2018-12-18 12:26:33', NULL),
(118, 41, 'ip5.jpg', '2018-12-18 12:21:59', NULL),
(116, 41, 'ip3.jpg', '2018-12-18 12:21:59', NULL),
(117, 41, 'ip4.jpg', '2018-12-18 12:21:59', NULL),
(114, 40, 'ss1.jpg', '2018-12-18 09:55:44', NULL),
(113, 40, 'ss.jpg', '2018-12-18 09:55:44', NULL),
(112, 40, 'ip4.jpg', '2018-12-18 09:44:10', NULL),
(111, 40, 'ip3.jpg', '2018-12-18 09:44:10', NULL),
(115, 41, 'ip2.jpg', '2018-12-18 12:21:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `phone`, `level`, `created_at`, `updated_at`) VALUES
(4, 'hao1', 'ggg@gmail.com', NULL, '$2y$10$OGDNaFi12V/RdUwuI8moEuW8hTnl3EvDaS5HP62h9O9VoiceGZvdy', 'e3KVAPzuAmM9kMWvskZPd2USAPy4Ga9PxFtL7CF9ymUwtiTAeueff4F7cSTH', NULL, NULL, 0, '2018-12-10 20:10:59', '2018-12-10 20:10:59'),
(5, 'Badman', 'badman@gmail.com', NULL, '$2y$10$cwfJdYtK0jRE/bQPm1CDIO5ffIH07YGoPyDTU74a0ulczqwCPgRVC', 'lxiV57ff6lmEzBbwa3sIuhSibt20sr7UKCeEz0k4XhfRfz5T29WVYhOphrSQ', NULL, NULL, 0, '2018-12-10 20:13:58', '2018-12-10 20:13:58'),
(6, 'hhhhhhhhh', 'hhhhhh@gmail.com', NULL, '$2y$10$iOZyDd/QcoMIVl69kBAFdu2dcCcv9XTbrlK5X4O3GxT.YQxSxvsbG', 'jOEvPqco4ldlGbRobTKW5YOGPlmSMprZMBj2kU9M54gIPfgKIAUYPKZIAu6L', NULL, NULL, 1, '2018-12-10 21:49:37', '2018-12-18 21:47:01'),
(7, 'LÊ MINH HẢO', 'haole042@gmail.com', '2018-12-10 22:46:28', '$2y$10$7yNCqLTaJlNQPILIyNG1OOE7a0cfKPv0v1DYUEUj0kpAfjFYW.BKa', 'oivapuhmqwAXNrtvNxsqFeKLu4tGI3kiEfIWTIXs96uZZXcfE6Q0u5GwcwHm', NULL, NULL, 2, '2018-12-10 22:44:55', '2018-12-18 22:11:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `makers`
--
ALTER TABLE `makers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `makers`
--
ALTER TABLE `makers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
