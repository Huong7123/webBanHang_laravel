-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2024 lúc 04:53 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `prjwebbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_30_175752_create_tbl_admin_table', 1),
(6, '2024_10_31_161050_create_tbl_category_product', 2),
(7, '2024_11_01_081202_create_tbl_brand_product', 3),
(8, '2024_11_01_091026_create_tbl_product', 4),
(9, '2024_11_05_184031_tbl_customer', 5),
(11, '2024_11_05_191603_tbl_shipping', 6),
(12, '2024_11_06_124543_tbl_order', 7),
(13, '2024_11_06_124644_tbl_order_details', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ADMIN', '0396131469', '2024-10-30 18:17:48', NULL),
(2, 'huong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hưởng', '0396131469', '2024-10-31 13:29:15', NULL),
(3, 'nghia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Thành Nghĩa', '123456789', '2024-11-07 08:14:28', NULL),
(4, 'thu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Anh Thư', '123456789', '2024-11-07 08:15:13', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(2, 'Apple', 'Apple', 1, NULL, NULL),
(4, 'Dell', 'Dell', 1, NULL, NULL),
(5, 'Asus', 'Asus', 1, NULL, NULL),
(7, 'Samsung', 'Samsung', 1, '2024-11-07 08:17:14', NULL),
(10, 'Huawei', 'Huawei', 1, '2024-11-07 08:18:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Laptop', 'Laptop', 1, NULL, NULL),
(8, 'Máy tính bảng', 'Máy tính bảng', 1, NULL, NULL),
(9, 'Điện thoại', 'Điện thoại', 1, NULL, NULL),
(12, 'Đồng hồ', 'Đồng hồ', 0, NULL, NULL),
(13, 'Tai nghe', 'Tai nghe', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(2, 'Quang Hưởng', 'huong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0396131469', NULL, NULL),
(4, 'Thành Nghĩa', 'nghia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', NULL, NULL),
(5, 'Anh Thư', 'thu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', NULL, NULL),
(6, 'abc', 'abcse@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '159875214', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` decimal(20,2) DEFAULT 0.00,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `payment_method`, `order_status`, `created_at`, `updated_at`) VALUES
(27, 2, 12, 174000.00, 'Thanh toán khi nhận hàng', 'Thành công', '2024-11-06 22:40:42', NULL),
(28, 2, 13, 160000.00, 'tài khoản ngân hàng', 'Thành công', '2024-11-06 23:12:12', NULL),
(29, 2, 14, 0.00, 'tài khoản ngân hàng', 'Thành công', '2024-11-15 23:03:31', NULL),
(31, 2, 16, 65160000.00, 'tài khoản ngân hàng', 'Thành công', '2024-11-15 23:08:25', NULL),
(32, 2, 17, 78450000.00, 'ví điện tử', 'Thành công', '2024-11-15 23:15:16', NULL),
(33, 4, 18, 119740000.00, 'tài khoản ngân hàng', 'Thành công', '2024-11-18 02:29:51', NULL),
(34, 4, 19, 12490000.00, 'tài khoản ngân hàng', 'Thành công', '2024-11-18 03:58:50', NULL),
(35, 4, 20, 66989000.00, 'Thanh toán khi nhận hàng', 'Thành công', '2024-11-18 04:04:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(20,2) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(23, 30, 37, 'Samsung Galaxy Z Fold6 5G 256GB', 41990000.00, 4, NULL, NULL),
(24, 30, 33, 'Huawei MatePad 11.5\"S WiFi 8GB 256GB', 13490000.00, 1, NULL, NULL),
(25, 31, 41, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 12490000.00, 3, NULL, NULL),
(26, 31, 39, 'iPad Pro 11 inch M4 2024 Wifi 256GB', 27690000.00, 1, NULL, NULL),
(27, 32, 41, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 12490000.00, 2, NULL, NULL),
(28, 32, 40, 'iPad Gen 10 2022 10.9 inch WiFi 64GB', 9790000.00, 1, NULL, NULL),
(29, 32, 39, 'iPad Pro 11 inch M4 2024 Wifi 256GB', 27690000.00, 1, NULL, NULL),
(30, 32, 38, 'Samsung Galaxy Z Flip5 5G 256GB', 15990000.00, 1, NULL, NULL),
(31, 33, 41, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 12490000.00, 1, NULL, NULL),
(32, 33, 40, 'iPad Gen 10 2022 10.9 inch WiFi 64GB', 9790000.00, 1, NULL, NULL),
(33, 33, 22, 'Macbook Air M2 13 inch 16GB/256GB', 26990000.00, 1, NULL, NULL),
(34, 33, 33, 'Huawei MatePad 11.5\"S WiFi 8GB 256GB', 13490000.00, 1, NULL, NULL),
(35, 33, 34, 'iPhone 16 128GB', 22190000.00, 1, NULL, NULL),
(36, 33, 35, 'iPhone 16 Pro Max 256GB', 34790000.00, 1, NULL, NULL),
(37, 34, 41, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 12490000.00, 1, NULL, NULL),
(38, 35, 20, 'MacBook Air 13 inch M2 512GB', 26990000.00, 1, NULL, NULL),
(39, 35, 19, 'MacBook Pro 14” và 16”  Chip M4', 39999000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(19, 'MacBook Pro 14” và 16”  Chip M4', 2, 2, 'Máy tính xách tay Mac tiên tiến nhất cho các luồng công việc phức tạp.', 'Máy tính xách tay Mac tiên tiến nhất cho các luồng công việc phức tạp.', '39999000', 'sp119.png', 1, NULL, NULL),
(20, 'MacBook Air 13 inch M2 512GB', 2, 2, 'MacBook Air 13 inch M2 2022 8CPU 10GPU 8GB/512GB', 'MacBook Air 13 inch M2 2022 8CPU 10GPU 8GB/512GB', '26990000', 'sp221.jpg', 1, NULL, NULL),
(21, 'Macbook Air M3 13 16GB/512GB', 2, 2, 'Macbook Air M3 13 2024 8CPU 10GPU/16GB/512GB', 'Macbook Air M3 13 2024 8CPU 10GPU/16GB/512GB', '34090000', 'sp364.jpg', 1, NULL, NULL),
(22, 'Macbook Air M2 13 inch 16GB/256GB', 2, 2, 'Macbook Air M2 13 inch 2022 8CPU 10GPU/16GB/256GB', 'Macbook Air M2 13 inch 2022 8CPU 10GPU/16GB/256GB', '26990000', 'sp437.jpg', 1, NULL, NULL),
(23, 'Laptop Dell Inspiron 14 N5440 i5', 2, 4, 'Laptop Dell Inspiron 14 N5440 i5', 'Laptop Dell Inspiron 14 N5440 i5', '19990000', 'sp594.png', 1, NULL, NULL),
(24, 'Laptop Dell Vostro V3520 i5-1235U', 2, 2, 'Laptop Dell Vostro V3520 i5-1235U/16GB/512GB/15.6\"FHD/Wi', 'Laptop Dell Vostro V3520 i5-1235U/16GB/512GB/15.6\"FHD/Wi', '16390000', 'sp691.png', 1, NULL, NULL),
(25, 'Laptop Dell Inspiron N3520 i5 1235U', 2, 2, 'Laptop Dell Inspiron N3520 i5 1235U/8GB/512GB/15.6\"FHD/W', 'Laptop Dell Inspiron N3520 i5 1235U/8GB/512GB/15.6\"FHD/W', '15390000', 'sp738.png', 1, NULL, NULL),
(26, 'Laptop Dell Vostro 15 V3530 i5 1335U', 2, 2, 'Laptop Dell Vostro 15 V3530 i5 1335U/16GB/512GB/15.6\"FHD/W', 'Laptop Dell Vostro 15 V3530 i5 1335U/16GB/512GB/15.6\"FHD/W', '18390000', 'sp860.png', 1, NULL, NULL),
(27, 'Laptop Asus Vivobook 15 OLED', 2, 2, 'Laptop Asus Vivobook 15 OLED A1505VA-MA466W i5-', 'Laptop Asus Vivobook 15 OLED A1505VA-MA466W i5-', '17990000', 'sp950.png', 1, NULL, NULL),
(28, 'Laptop Asus TUF Gaming FA506NFR', 2, 2, 'Laptop Asus TUF Gaming FA506NFR-HN006W R7', 'Laptop Asus TUF Gaming FA506NFR-HN006W R7', '18690000', 'sp1136.jpg', 1, NULL, NULL),
(29, 'Laptop Asus Vivobook E1404FA', 2, 2, 'Laptop Asus TUF Gaming FA507NVR-LP091W R7-', 'Laptop Asus TUF Gaming FA507NVR-LP091W R7-', '12390000', 'sp925.png', 1, NULL, NULL),
(30, 'Samsung Galaxy Tab S10 Plus 5G 12GB', 8, 7, 'Samsung Galaxy Tab S10 Plus 5G 12GB 256GB', 'Samsung Galaxy Tab S10 Plus 5G 12GB 256GB', '28990000', 'sp1222.png', 1, NULL, NULL),
(31, 'Samsung Galaxy Tab S10 Ultra 12GB', 8, 7, 'Samsung Galaxy Tab S10 Ultra WiFi 12GB 256GB', 'Samsung Galaxy Tab S10 Ultra WiFi 12GB 256GB', '30990000', 'sp1356.png', 1, NULL, NULL),
(32, 'Huawei MatePad SE 11 WiFi 6GB 128GB', 8, 10, 'Huawei MatePad SE 11 WiFi 6GB 128GB', 'Huawei MatePad SE 11 WiFi 6GB 128GB', '4990000', 'sp1461.jpg', 1, NULL, NULL),
(33, 'Huawei MatePad 11.5\"S WiFi 8GB 256GB', 8, 10, 'Huawei MatePad 11.5\"S WiFi 8GB 256GB', 'Huawei MatePad 11.5\"S WiFi 8GB 256GB', '13490000', 'sp1591.png', 1, NULL, NULL),
(34, 'iPhone 16 128GB', 9, 2, 'iPhone 16 128GB', 'iPhone 16 128GB', '22190000', 'sp165.png', 1, NULL, NULL),
(35, 'iPhone 16 Pro Max 256GB', 9, 2, 'iPhone 16 Pro Max 256GB', 'iPhone 16 Pro Max 256GB', '34790000', 'sp1753.png', 1, NULL, NULL),
(36, 'iPhone 15 Pro Max 256GB', 9, 2, 'iPhone 15 Pro Max 256GB', 'iPhone 15 Pro Max 256GB', '24490000', 'sp1857.png', 1, NULL, NULL),
(37, 'Samsung Galaxy Z Fold6 5G 256GB', 9, 7, 'Samsung Galaxy Z Fold6 5G 256GB', 'Samsung Galaxy Z Fold6 5G 256GB', '41990000', 'sp1958.png', 1, NULL, NULL),
(38, 'Samsung Galaxy Z Flip5 5G 256GB', 9, 7, 'Samsung Galaxy Z Flip5 5G 256GB', 'Samsung Galaxy Z Flip5 5G 256GB', '15990000', 'sp2015.jpg', 1, NULL, NULL),
(39, 'iPad Pro 11 inch M4 2024 Wifi 256GB', 8, 2, 'iPad Pro 11 inch M4 2024 Wifi 256GB', 'iPad Pro 11 inch M4 2024 Wifi 256GB', '27690000', 'sp2151.jpg', 1, NULL, NULL),
(40, 'iPad Gen 10 2022 10.9 inch WiFi 64GB', 8, 2, 'iPad Gen 10 2022 10.9 inch WiFi 64GB', 'iPad Gen 10 2022 10.9 inch WiFi 64GB', '9790000', 'sp2254.jpg', 1, NULL, NULL),
(41, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 8, 2, 'iPad mini 6 2021 8.3 inch WiFi 64GB', 'iPad mini 6 2021 8.3 inch WiFi 64GB', '12490000', 'sp2353.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_notes` text NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_notes`, `shipping_address`, `shipping_phone`, `created_at`, `updated_at`) VALUES
(16, 'huong', 'abc@gmail.com', 'abc', 'abc', '1234', NULL, NULL),
(17, 'QHUONG', 'abc@gmail.com', 'abc', 'abc', '123456', NULL, NULL),
(18, 'HUONG ABC', 'a@gmail.com', 'abcd', 'abcd', '14589', NULL, NULL),
(19, 'hhhh', 'abc@gmail.com', 'kjjj', 'hhhh', '1111', NULL, NULL),
(20, 'bbbb', 'aaa@gmail.com', 'sfdsdf', 'cccc', '11111', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
