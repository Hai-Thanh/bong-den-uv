-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2021 lúc 07:14 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `projectphp3poly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `image_path`) VALUES
(11, 'Rhona Gaines', 0, 'rhona-gaines', '2021-08-02 19:02:34', '2021-08-02 21:22:50', 'http://localhost:8000/storage/photos/2/categories/banner-style-4-img-2.jpg'),
(12, 'Oscar Ford', 0, 'oscar-ford', '2021-08-02 21:23:09', '2021-08-02 21:23:09', 'http://localhost:8000/storage/photos/2/categories/banner-style-4-img-4.jpg'),
(13, 'Brenda Harding', 0, 'brenda-harding', '2021-08-02 21:23:28', '2021-08-02 21:23:38', 'http://localhost:8000/storage/photos/2/categories/banner-style-4-img-1.jpg'),
(14, 'Alexa Mcneil', 0, 'alexa-mcneil', '2021-08-02 21:23:57', '2021-08-02 21:23:57', 'http://localhost:8000/storage/photos/2/categories/banner-style-4-img-5.jpg'),
(15, 'Fletcher Levine', 0, 'fletcher-levine', '2021-08-02 21:24:17', '2021-08-02 21:24:17', 'http://localhost:8000/storage/photos/2/categories/banner-style-1-img-1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `phone_number`) VALUES
(2, 'Aspen Grimes', 'vumotydiqo@mailinator.com', NULL, '$2y$10$EbsAnwooMUYf/qIIInkZLOC9TCJB6qN1kPZ/m4os7svTJbVNpxQxC', NULL, '2021-08-06 07:49:16', '2021-08-06 07:49:16', 'http://localhost:8000/storage/photos/2/customers/blog-grid-home-1-img-1.jpg', '0362821175'),
(3, 'leduyson', 'sonldph11925@fpt.edu.vn', NULL, '$2y$10$yoGfJSnQ685S7cIV0aAKJOoCVfGJHhxl3oqWV7EwoTpnqsRPFjFdO', '$2y$10$I073X6e.xWFz4J5qSTn/8umxchHZbioGwjrzmAxOVClVWh6FQzCWa', '2021-08-06 08:06:18', '2021-08-07 03:31:37', 'http://localhost:8000/storage/photos/2/customers/blog-grid-home-1-img-2.jpg', '0362821174');

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
(93, '2014_10_12_000000_create_users_table', 1),
(94, '2014_10_12_100000_create_password_resets_table', 1),
(95, '2019_08_19_000000_create_failed_jobs_table', 1),
(96, '2021_06_28_102636_create_sessions_table', 1),
(97, '2021_06_28_134305_create_categories_table', 1),
(98, '2021_06_30_125924_create_talbe_products', 1),
(99, '2021_07_01_144803_create_product_images_table', 1),
(100, '2021_07_01_145017_create_tags_table', 1),
(101, '2021_07_01_145116_create_tag_products_table', 1),
(102, '2021_07_02_115553_alert_colum_add_phone_number', 1),
(103, '2021_07_20_155952_create_slider_table', 1),
(104, '2021_07_21_113216_create_settings_table', 1),
(105, '2021_07_06_150111_add_colum_product_image', 2),
(106, '2021_07_29_164048_alert_add_colum_image_path_categories', 2),
(107, '2021_08_01_032155_create_orders_table', 3),
(108, '2021_08_01_032423_create_order_details_table', 3),
(109, '2021_08_02_113737_create_permission_tables', 4),
(110, '2021_08_03_161028_alert_colum_user_id', 5),
(111, '2021_08_05_223054_create_blogs_table', 6),
(112, '2021_08_05_225431_create_post_tags_table', 6),
(113, '2021_08_05_230342_create_post__comments_table', 6),
(114, '2021_08_06_000337_create_table_posts', 7),
(115, '2021_08_06_100733_alert_colum_description', 8),
(116, '2021_08_06_140525_create_customers_table', 9),
(117, '2021_08_06_143759_alert_colum_phone_number', 10),
(118, '2021_08_07_095904_alert_colum_id_customers', 11),
(119, '2021_08_07_101237_alert_colum_customers_id', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `total_product`, `total_price`, `order_status`, `order_note`, `created_at`, `updated_at`, `user_id`, `customer_id`) VALUES
(13, 'Lê Duy Sơn', 'sonldph11925@fpt.edu.vn', '03628212174', 'Thanh hóa', 2, 1182, 0, 'Hoằng Lưu -Hoằng Hóa -Thanh hóa', '2021-08-03 09:23:12', '2021-08-03 09:23:12', 1, 0),
(14, 'Anika Cantrell', 'mufasoh@mailinator.com', '+1 (801) 802-1806', 'Debitis sint aut pl', 12, 39316, 3, 'Quidem molestiae ex', '2021-08-03 09:24:49', '2021-08-03 09:24:49', 1, 0),
(15, 'Clio Powers', 'leduyson2kk@gmail.com', '0362821174', 'Thanh hóa Hoằng Hóa Hoằng Lưu', 9, 3768, 0, 'Thanh hóa Hoằng Hóa Hoằng Lưu', '2021-08-03 10:25:58', '2021-08-03 10:25:58', 2, 0),
(16, 'Clio Powers', 'leduyson2kk@gmail.com', '0362821174', 'Numquam eligendi iru', 1, 412, 0, 'Numquam eligendi iru Numquam eligendi iru', '2021-08-03 10:45:40', '2021-08-03 10:45:40', 2, 0),
(17, 'Lê Duy Sơn', 'sonldph11925@fpt.edu.vn', '0362821174', 'Rerum dolore commodi', 1, 371, 0, '11111111111111111', '2021-08-05 04:08:17', '2021-08-05 04:08:17', 2, 0),
(18, 'Lê Duy Sơn', 'sonldph11925@fpt.edu.vn', '0362821174', 'Modi eiusmod libero', 6, 2830, 0, '221221', '2021-08-05 15:18:39', '2021-08-05 15:18:39', 2, 0),
(19, 'Lê Duy Sơn', 'sonldph11925@fpt.edu.vn', '0362821174', 'Modi eiusmod libero', 14, 4662, 0, '111111', '2021-08-06 12:35:25', '2021-08-06 12:35:25', 2, 0),
(20, 'Kaseem Sykes', 'kifof@mailinator.com', '+1 (487) 265-7691', 'Eos mollitia ut sae', 9, 5237, 0, 'Nihil esse qui saep', '2021-08-07 03:14:23', '2021-08-07 03:14:23', 0, 3),
(21, 'leduyson', 'sonldph11925@fpt.edu.vn', '0362821174', 'Error reprehenderit', 2, 1114, 0, '21111111', '2021-08-07 03:26:47', '2021-08-07 03:26:47', 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `product_price`, `quantity`, `order_id`, `created_at`, `updated_at`) VALUES
(5, 78, 770, 1, 13, '2021-08-03 09:23:13', '2021-08-03 09:23:13'),
(6, 77, 412, 1, 13, '2021-08-03 09:23:13', '2021-08-03 09:23:13'),
(7, 77, 412, 73, 14, '2021-08-03 09:24:49', '2021-08-03 09:24:49'),
(8, 78, 770, 12, 14, '2021-08-03 09:24:49', '2021-08-03 09:24:49'),
(9, 79, 371, 5, 15, '2021-08-03 10:25:59', '2021-08-03 10:25:59'),
(10, 77, 412, 1, 15, '2021-08-03 10:25:59', '2021-08-03 10:25:59'),
(11, 78, 770, 1, 15, '2021-08-03 10:25:59', '2021-08-03 10:25:59'),
(12, 83, 457, 1, 15, '2021-08-03 10:25:59', '2021-08-03 10:25:59'),
(13, 80, 274, 1, 15, '2021-08-03 10:25:59', '2021-08-03 10:25:59'),
(14, 77, 412, 1, 16, '2021-08-03 10:45:40', '2021-08-03 10:45:40'),
(15, 79, 371, 1, 17, '2021-08-05 04:08:17', '2021-08-05 04:08:17'),
(16, 77, 412, 5, 18, '2021-08-05 15:18:39', '2021-08-05 15:18:39'),
(17, 78, 770, 1, 18, '2021-08-05 15:18:39', '2021-08-05 15:18:39'),
(18, 84, 886, 1, 19, '2021-08-06 12:35:25', '2021-08-06 12:35:25'),
(19, 85, 872, 1, 19, '2021-08-06 12:35:25', '2021-08-06 12:35:25'),
(20, 86, 242, 12, 19, '2021-08-06 12:35:25', '2021-08-06 12:35:25'),
(21, 78, 770, 5, 20, '2021-08-07 03:14:23', '2021-08-07 03:14:23'),
(22, 79, 371, 3, 20, '2021-08-07 03:14:23', '2021-08-07 03:14:23'),
(23, 80, 274, 1, 20, '2021-08-07 03:14:23', '2021-08-07 03:14:23'),
(24, 85, 872, 1, 21, '2021-08-07 03:26:48', '2021-08-07 03:26:48'),
(25, 86, 242, 1, 21, '2021-08-07 03:26:48', '2021-08-07 03:26:48');

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
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add product', 'web', '2021-08-02 05:03:26', '2021-08-02 05:03:26'),
(2, 'remove product', 'web', '2021-08-02 05:15:23', '2021-08-02 05:15:23'),
(3, 'edit product', 'web', '2021-08-08 01:50:59', '2021-08-08 01:50:59'),
(4, 'view product', 'web', '2021-08-08 01:50:59', '2021-08-08 01:50:59'),
(6, 'add categories', 'web', '2021-08-08 09:26:09', '2021-08-08 09:26:09'),
(7, 'view categories', 'web', '2021-08-08 09:26:18', '2021-08-08 09:26:18'),
(8, 'delete categories', 'web', '2021-08-08 09:26:28', '2021-08-08 09:26:28'),
(10, 'edit categories', 'web', '2021-08-08 16:17:18', '2021-08-08 16:17:24'),
(11, 'view user', 'web', '2021-08-08 16:19:57', '2021-08-08 16:19:57'),
(12, 'add user', 'web', '2021-08-08 16:20:02', '2021-08-08 16:20:07'),
(13, 'delete user', 'web', '2021-08-08 16:20:16', '2021-08-08 16:20:16'),
(14, 'edit user', 'web', '2021-08-08 16:20:22', '2021-08-08 16:20:22'),
(15, 'view slider', 'web', '2021-08-08 16:24:44', '2021-08-08 16:24:44'),
(16, 'add slider', 'web', '2021-08-08 16:24:47', '2021-08-08 16:24:47'),
(17, 'edit slider', 'web', '2021-08-08 16:24:53', '2021-08-08 16:24:53'),
(18, 'delete slider', 'web', '2021-08-08 16:25:00', '2021-08-08 16:25:00'),
(19, 'view settings', 'web', '2021-08-08 16:35:47', '2021-08-08 16:35:47'),
(20, 'add settings', 'web', '2021-08-08 16:35:52', '2021-08-08 16:35:52'),
(21, 'edit settings', 'web', '2021-08-08 16:35:57', '2021-08-08 16:35:57'),
(22, 'delete settings', 'web', '2021-08-08 16:36:02', '2021-08-08 16:36:02'),
(23, 'view order', 'web', '2021-08-08 16:42:42', '2021-08-08 16:42:42'),
(24, 'add order', 'web', '2021-08-08 16:42:48', '2021-08-08 16:42:48'),
(25, 'edit order', 'web', '2021-08-08 16:42:53', '2021-08-08 16:42:53'),
(26, 'delete order', 'web', '2021-08-08 16:42:59', '2021-08-08 16:42:59'),
(27, 'add post', 'web', '2021-08-08 16:45:53', '2021-08-08 16:45:53'),
(28, 'view post', 'web', '2021-08-08 16:45:58', '2021-08-08 16:45:58'),
(29, 'edit post', 'web', '2021-08-08 16:46:03', '2021-08-08 16:46:03'),
(30, 'delete post', 'web', '2021-08-08 16:46:08', '2021-08-08 16:46:08'),
(31, 'view customer', 'web', '2021-08-08 16:48:26', '2021-08-08 16:48:26'),
(32, 'add customer', 'web', '2021-08-08 16:48:30', '2021-08-08 16:48:30'),
(33, 'edit customer', 'web', '2021-08-08 16:48:37', '2021-08-08 16:48:37'),
(34, 'delete customer', 'web', '2021-08-08 16:48:43', '2021-08-08 16:48:43'),
(35, 'add permissions', 'web', '2021-08-08 16:54:26', '2021-08-08 16:54:26'),
(36, 'view permissions', 'web', '2021-08-08 16:54:33', '2021-08-08 16:54:33'),
(37, 'edit permissions', 'web', '2021-08-08 16:54:37', '2021-08-08 16:54:37'),
(38, 'delete permissions', 'web', '2021-08-08 16:54:43', '2021-08-08 16:54:43'),
(39, 'view role', 'web', '2021-08-08 16:59:09', '2021-08-08 16:59:09'),
(40, 'add role', 'web', '2021-08-08 16:59:15', '2021-08-08 16:59:15'),
(41, 'edit role', 'web', '2021-08-08 16:59:19', '2021-08-08 16:59:19'),
(42, 'delete role', 'web', '2021-08-08 16:59:27', '2021-08-08 16:59:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `image_path`, `content`, `user_id`, `created_at`, `updated_at`, `description`) VALUES
(12, 'Blog Image Post', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-1.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:48:58', '2021-08-06 03:48:58', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent'),
(13, 'Blog Slider Post', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-2.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:50:16', '2021-08-06 04:04:28', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent'),
(14, 'Blog Video Post', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-3.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:51:27', '2021-08-06 04:04:34', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent'),
(15, 'Minus vel corporis s', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-4.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:51:53', '2021-08-06 03:53:13', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent'),
(16, 'Repellendus Esse fu', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-5.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:52:17', '2021-08-06 04:04:45', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent'),
(17, 'Tempora veniam ulla', 'http://localhost:8000/storage/photos/2/Posts/blog-grid-home-1-img-6.jpg', 'Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nQuisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.\r\nAenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.\r\n\r\nSuspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.', 2, '2021-08-06 03:52:37', '2021-08-06 04:04:50', 'Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comment`
--

CREATE TABLE `post_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tag`
--

CREATE TABLE `post_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tag`
--

INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`, `created_at`, `updated_at`) VALUES
(105, 1, 12, '2021-08-06 03:48:58', '2021-08-06 03:48:58'),
(106, 2, 12, '2021-08-06 03:48:58', '2021-08-06 03:48:58'),
(107, 9, 12, '2021-08-06 03:48:58', '2021-08-06 03:48:58'),
(108, 10, 12, '2021-08-06 03:48:58', '2021-08-06 03:48:58'),
(131, 1, 15, '2021-08-06 03:53:13', '2021-08-06 03:53:13'),
(132, 10, 15, '2021-08-06 03:53:13', '2021-08-06 03:53:13'),
(133, 12, 15, '2021-08-06 03:53:13', '2021-08-06 03:53:13'),
(134, 13, 15, '2021-08-06 03:53:13', '2021-08-06 03:53:13'),
(135, 14, 15, '2021-08-06 03:53:13', '2021-08-06 03:53:13'),
(136, 1, 13, '2021-08-06 04:04:28', '2021-08-06 04:04:28'),
(137, 11, 13, '2021-08-06 04:04:28', '2021-08-06 04:04:28'),
(138, 13, 13, '2021-08-06 04:04:28', '2021-08-06 04:04:28'),
(139, 14, 13, '2021-08-06 04:04:28', '2021-08-06 04:04:28'),
(145, 1, 14, '2021-08-06 04:04:40', '2021-08-06 04:04:40'),
(146, 9, 14, '2021-08-06 04:04:40', '2021-08-06 04:04:40'),
(147, 11, 14, '2021-08-06 04:04:40', '2021-08-06 04:04:40'),
(148, 12, 14, '2021-08-06 04:04:40', '2021-08-06 04:04:40'),
(149, 14, 14, '2021-08-06 04:04:40', '2021-08-06 04:04:40'),
(150, 2, 16, '2021-08-06 04:04:45', '2021-08-06 04:04:45'),
(151, 11, 16, '2021-08-06 04:04:45', '2021-08-06 04:04:45'),
(152, 12, 16, '2021-08-06 04:04:45', '2021-08-06 04:04:45'),
(153, 13, 16, '2021-08-06 04:04:45', '2021-08-06 04:04:45'),
(154, 14, 16, '2021-08-06 04:04:45', '2021-08-06 04:04:45'),
(155, 9, 17, '2021-08-06 04:04:50', '2021-08-06 04:04:50'),
(156, 10, 17, '2021-08-06 04:04:50', '2021-08-06 04:04:50'),
(157, 13, 17, '2021-08-06 04:04:50', '2021-08-06 04:04:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `image_path`, `status`, `quantity`, `content`, `created_at`, `updated_at`) VALUES
(77, 'Germaine Lewis', 11, '412', 'http://localhost:8000/storage/photos/2/products/default-9.jpg', '1', '315', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-08-02 19:02:54', '2021-08-05 02:26:48'),
(78, 'Britanney Cochran', 11, '111', 'http://localhost:8000/storage/photos/2/products/default-1.jpg', '0', '670', '<p><em>Lorem ipsum</em>, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown&nbsp;</p>', '2021-08-03 05:52:33', '2021-08-03 05:52:33'),
(79, 'Julian Carson', 13, '371', 'http://localhost:8000/storage/photos/2/products/default-3.jpg', '0', '276', '<div>\r\n<p>Why do we use it?</p>\r\n</div>\r\n<div>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', '2021-08-03 10:10:57', '2021-08-03 10:10:57'),
(80, 'Quinlan Puckett', 12, '274', 'http://localhost:8000/storage/photos/2/products/default-4.jpg', '0', '240', '<div>\r\n<p>Why do we use it?</p>\r\n</div>\r\n<div>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', '2021-08-03 10:11:40', '2021-08-03 10:11:40'),
(81, 'Galvin Keller', 14, '298', 'http://localhost:8000/storage/photos/2/products/default-5.jpg', '0', '628', '<div>\r\n<p>Why do we use it?</p>\r\n</div>\r\n<div>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</div>', '2021-08-03 10:11:57', '2021-08-03 10:11:57'),
(83, 'Marsden Flynn', 13, '457', 'http://localhost:8000/storage/photos/2/products/default-8.jpg', '0', '307', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(84, 'Roary Case', 15, '886', 'http://localhost:8000/storage/photos/2/products/default-10.jpg', '0', '512', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(85, 'Stuart Gardner', 11, '872', 'http://localhost:8000/storage/photos/2/products/default-11.jpg', '0', '323', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(86, 'Aiko Fox', 14, '242', 'http://localhost:8000/storage/photos/2/products/default-12.jpg', '0', '326', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(88, 'Fletcher Moses', 15, '21', 'http://localhost:8000/storage/photos/2/products/blog-grid-home-1-img-1.jpg', '0', '895', '<p>1111111111111</p>', '2021-08-06 11:38:29', '2021-08-06 11:38:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(24, '/storage/products/galleries/78/ZV2TowJzRYRkzSYkPhTO.jpg', 78, 'default-2.jpg', '2021-08-03 05:52:33', '2021-08-03 05:52:33'),
(25, '/storage/products/galleries/78/P0HTaP18I6cPdBtli2Jy.jpg', 78, 'default-3.jpg', '2021-08-03 05:52:33', '2021-08-03 05:52:33'),
(26, '/storage/products/galleries/78/SQuGt8UIC4FKFnC3sj9j.jpg', 78, 'default-7.jpg', '2021-08-03 05:52:33', '2021-08-03 05:52:33'),
(27, '/storage/products/galleries/80/BdeYMggHu8pIpsQjZGin.jpg', 80, 'default-9.jpg', '2021-08-03 10:11:40', '2021-08-03 10:11:40'),
(28, '/storage/products/galleries/80/UjjvgIjQz7hxCzzdgnSf.jpg', 80, 'default-12.jpg', '2021-08-03 10:11:40', '2021-08-03 10:11:40'),
(29, '/storage/products/galleries/80/sXlQNgPHaX0bLKHxNZMW.jpg', 80, 'default-5.jpg', '2021-08-03 10:11:40', '2021-08-03 10:11:40'),
(33, '/storage/products/galleries/77/tTH2jF0Mf0WRtdi52bsb.jpg', 77, 'default-6.jpg', '2021-08-03 10:12:59', '2021-08-03 10:12:59'),
(34, '/storage/products/galleries/77/SYzG9FfO4wL8jNB7216b.jpg', 77, 'default-8.jpg', '2021-08-03 10:13:00', '2021-08-03 10:13:00'),
(35, '/storage/products/galleries/77/TDCno5niLy7Ug3qTDOno.jpg', 77, 'default-2.jpg', '2021-08-03 10:13:00', '2021-08-03 10:13:00'),
(36, '/storage/products/galleries/83/tiep8Euql92JnrnsdBi5.jpg', 83, 'default-8.jpg', '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(37, '/storage/products/galleries/83/9arXe6FRVQIDb4UivhQ2.jpg', 83, 'default-10.jpg', '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(38, '/storage/products/galleries/83/9zP20o25wYlBoD7Lyd0W.jpg', 83, 'default-12.jpg', '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(39, '/storage/products/galleries/84/m3AOfi1kQ0ERJYdoErZx.jpg', 84, 'default-2.jpg', '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(40, '/storage/products/galleries/84/mYhkkQOzNKjbhfiKyJsX.jpg', 84, 'default-12.jpg', '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(41, '/storage/products/galleries/84/0cdeMJtrpGc6cHUCdw0I.jpg', 84, 'default-8.jpg', '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(42, '/storage/products/galleries/85/3cw4K2FxVEz5uKliPFaQ.jpg', 85, 'default-3.jpg', '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(43, '/storage/products/galleries/85/rub7Yys3xe8ruXgm6rn3.jpg', 85, 'default-5.jpg', '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(44, '/storage/products/galleries/85/X9pfbjHqJExJwwrmDXNA.jpg', 85, 'default-12.jpg', '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(45, '/storage/products/galleries/86/iSuzfmS0jCZhTbqdGK2b.jpg', 86, 'default-7.jpg', '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(46, '/storage/products/galleries/86/sfSZF7OwKOonryYKG4Om.jpg', 86, 'default-11.jpg', '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(47, '/storage/products/galleries/86/bRgLVMZFNRKrC8qWkagb.jpg', 86, 'default-1.jpg', '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(49, '/storage/products/galleries/88/3zAwRYP5VfvKe3Oi96XK.jpg', 88, 'blog-grid-home-1-img-1.jpg', '2021-08-06 11:38:29', '2021-08-06 11:38:29'),
(50, '/storage/products/galleries/88/ospYtQl3QaJ9fn7eARN0.jpg', 88, 'blog-grid-home-1-img-2.jpg', '2021-08-06 11:38:29', '2021-08-06 11:38:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tag`
--

CREATE TABLE `product_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tag`
--

INSERT INTO `product_tag` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 73, 1, '2021-08-02 18:16:17', '2021-08-02 18:16:17'),
(2, 74, 2, '2021-08-02 18:21:16', '2021-08-02 18:21:16'),
(3, 75, 3, '2021-08-02 18:36:48', '2021-08-02 18:36:48'),
(4, 76, 4, '2021-08-02 18:37:37', '2021-08-02 18:37:37'),
(6, 78, 6, '2021-08-03 05:52:34', '2021-08-03 05:52:34'),
(7, 79, 7, '2021-08-03 10:10:58', '2021-08-03 10:10:58'),
(8, 80, 8, '2021-08-03 10:11:40', '2021-08-03 10:11:40'),
(9, 81, 9, '2021-08-03 10:11:57', '2021-08-03 10:11:57'),
(10, 82, 10, '2021-08-03 10:12:23', '2021-08-03 10:12:23'),
(11, 83, 11, '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(12, 84, 12, '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(13, 85, 13, '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(14, 86, 14, '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(15, 77, 14, '2021-08-04 14:35:07', '2021-08-04 14:35:07'),
(16, 77, 2, '2021-08-04 14:35:07', '2021-08-04 14:35:07'),
(17, 78, 14, '2021-08-04 14:35:29', '2021-08-04 14:35:29'),
(18, 78, 2, '2021-08-04 14:35:29', '2021-08-04 14:35:29'),
(19, 79, 2, '2021-08-04 14:35:39', '2021-08-04 14:35:39'),
(20, 79, 14, '2021-08-04 14:35:39', '2021-08-04 14:35:39'),
(21, 77, 1, '2021-08-05 02:25:02', '2021-08-05 02:25:02'),
(22, 87, 1, '2021-08-05 17:08:03', '2021-08-05 17:08:03'),
(23, 88, 2, '2021-08-06 11:38:29', '2021-08-06 11:38:29'),
(24, 89, 15, '2021-08-06 12:19:39', '2021-08-06 12:19:39'),
(25, 89, 2, '2021-08-06 12:19:39', '2021-08-06 12:19:39'),
(26, 91, 16, '2021-08-06 12:29:27', '2021-08-06 12:29:27'),
(27, 91, 1, '2021-08-06 12:29:27', '2021-08-06 12:29:27'),
(28, 92, 1, '2021-08-07 02:45:17', '2021-08-07 02:45:17'),
(29, 92, 2, '2021-08-07 02:45:17', '2021-08-07 02:45:17'),
(30, 93, 17, '2021-08-08 15:21:10', '2021-08-08 15:21:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-08-02 05:03:26', '2021-08-02 05:03:26'),
(2, 'editor', 'web', '2021-08-02 05:06:04', '2021-08-02 05:06:04'),
(3, 'moderator', 'web', '2021-08-02 05:06:04', '2021-08-02 05:06:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 3),
(3, 1),
(4, 1),
(4, 2),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(10, 1),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(23, 2),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 2),
(29, 1),
(30, 1),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(36, 2),
(37, 1),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(41, 1),
(42, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'facebook_link', 'https://www.facebook.com/sonldph11925', '2021-08-04 15:56:57', '2021-08-04 15:56:57'),
(2, 'phone_contact', '0362821174', '2021-08-04 15:57:22', '2021-08-04 15:57:22'),
(3, 'email', 'sonldph11925@fpt.edu.vn', '2021-08-04 15:57:40', '2021-08-04 15:57:40'),
(4, 'link_instagram', 'https://www.instagram.com/son__le__duy/', '2021-08-04 15:58:25', '2021-08-04 15:58:25'),
(5, 'link_twitter', 'https://www.facebook.com/sonldph11925', '2021-08-04 15:58:48', '2021-08-04 15:58:48'),
(6, 'address', 'Cao Đẳng Thực Hành FPT Polytechnic K15.3', '2021-08-04 16:01:06', '2021-08-04 16:01:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripiton` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `name`, `descripiton`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(10, 'Moses Gill', 'Consequatur eum tem', '/storage/slider/nUseryikdapeBHcXPs2J.jpg', 'hero-slider-1.jpg', '2021-08-03 07:37:30', '2021-08-03 07:37:30'),
(11, 'Lisandra Black', 'Explicabo Elit dol', '/storage/slider/0SjM4pLH2E2eYOQmCnw9.jpg', 'hero-slider-2.jpg', '2021-08-03 07:37:37', '2021-08-03 07:37:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'new', '2021-08-02 18:16:17', '2021-08-02 18:16:17'),
(2, 'all', '2021-08-02 18:21:16', '2021-08-02 18:21:16'),
(9, 'Quae in ullamco iust', '2021-08-03 10:11:57', '2021-08-03 10:11:57'),
(10, 'Veritatis temporibus', '2021-08-03 10:12:23', '2021-08-03 10:12:23'),
(11, 'Eaque voluptate face', '2021-08-03 10:13:40', '2021-08-03 10:13:40'),
(12, 'Deleniti ullam anim', '2021-08-03 10:14:10', '2021-08-03 10:14:10'),
(13, 'Ullam quia molestiae', '2021-08-03 10:14:44', '2021-08-03 10:14:44'),
(14, 'now', '2021-08-03 10:15:07', '2021-08-03 10:15:07'),
(15, 'news', '2021-08-06 12:19:39', '2021-08-06 12:19:39'),
(16, 'alll', '2021-08-06 12:29:27', '2021-08-06 12:29:27'),
(17, 'Elit aliqua Laboru', '2021-08-08 15:21:10', '2021-08-08 15:21:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `phone_number`) VALUES
(1, 'Sơn Lê Duy', 'leduyson2kk@gmail.com', NULL, '$2y$10$3ZLYL5jcJoQl568i0JT4se9tf3iHQRSGBJVpQzhhUvip5NqnMW1Da', 'http://localhost:8000/storage/photos/2/users/120852897_355853538940648_351548506002199308_n.jpg', 't508sN7wlFI6378utaepjARQT6PJOEyE6DVha322ZY25YVzKAbd6eujA6pd1', '2021-08-02 04:30:03', '2021-08-08 17:08:23', '0972618741'),
(2, 'Lê Duy Sơn', 'sonldph11925@fpt.edu.vn', NULL, '$2y$10$Hkwdmekc2Z2N59G9LZh25OIBO8UThteOlL7.EVZ9Aw87g1X7a2C3m', 'http://localhost:8000/storage/photos/2/users/sonld.jpg', '2Mykgy4xtdWXJl7lRfurRO4HQ6cr0zG4z9RfmCtbxsds5sR7fit1jQpGOmf1', '2021-07-29 05:59:25', '2021-08-08 17:06:28', '0362821174');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `product_tag`
--
ALTER TABLE `product_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
