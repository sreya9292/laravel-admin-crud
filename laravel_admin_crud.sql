-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 02:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_admin_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$NC8u97n.FLcIckC8v1CtUeLwl2N31qXNTeuGHV3MZAs1QIOAIvZHS', '2022-03-09 06:58:26', '2022-03-09 03:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WordPress', 'client-brand-wordpress_1647411347.png', 1, 1, '2022-03-15 05:07:01', '2022-03-16 00:45:47'),
(2, 'JQuery', 'client-brand-jquery_1647411373.png', 1, 1, '2022-03-15 05:07:26', '2022-03-16 00:46:13'),
(3, 'Classic Polo Signature', '3871791647516588.png', 1, 1, '2022-03-17 05:59:50', '2022-03-17 05:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `user_type` enum('Reg','Not-Reg') NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_type`, `qty`, `product_id`, `product_attr_id`, `added_on`) VALUES
(1, 1, 'Not-Reg', 3, 4, 6, '2022-03-18 12:00:31'),
(2, 1, 'Not-Reg', 2, 4, 8, '2022-03-18 12:08:03'),
(3, 1, 'Not-Reg', 1, 1, 1, '2022-03-18 12:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ladies', 'ladies', 0, 'promo-banner-1_1647411966.jpg', 1, 1, '2022-03-09 04:00:25', '2022-03-16 00:56:06'),
(2, 'Kids', 'kids', 0, 'promo-banner-4_1647411996.jpg', 1, 1, '2022-03-09 04:07:37', '2022-03-16 00:56:36'),
(3, 'Sports', 'sports', 5, NULL, 0, 0, '2022-03-09 04:07:53', '2022-03-09 04:07:53'),
(5, 'Gents', 'gents', 2, 'images (1)_1647412027.jpg', 1, 1, '2022-03-09 06:40:22', '2022-03-16 00:57:07'),
(6, 'Furniture', 'furniture', 2, NULL, 0, 0, '2022-03-14 03:06:04', '2022-03-14 04:14:45'),
(7, 'Shoes', 'shoes', 1, 'promo-banner-2_1647412058.jpg', 1, 1, '2022-03-14 07:40:30', '2022-03-16 00:57:38'),
(8, 'Bags', 'bags', 1, 'promo-banner-5_1647412085.jpg', 0, 1, '2022-03-14 07:41:19', '2022-03-16 00:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', 1, '2022-03-09 06:35:48', '2022-03-17 07:09:12'),
(2, 'Red', 1, '2022-03-16 00:35:26', '2022-03-16 00:35:26'),
(3, 'Green', 1, '2022-03-17 07:12:01', '2022-03-17 07:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Value','Per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jan Coupon', 'JAN2022', '250', 'Value', 0, 0, 1, '2022-03-09 05:19:50', '2022-03-09 06:05:03'),
(2, 'Feb Coupon', 'FEB 2022', '150', 'Value', 0, 0, 0, '2022-03-09 05:20:55', '2022-03-09 05:20:55'),
(4, 'December Coupon', 'DEC2022', '1500', 'Value', 0, 0, 1, '2022-03-14 03:50:39', '2022-03-14 03:50:39'),
(5, 'March Coupon', 'MAR2022', '100', 'Per', 50, 1, 1, '2022-03-15 23:15:48', '2022-03-15 23:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `address`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sreya', 'sreya@gmail.com', '9999999999', 'sreya', 'Rose Villa', 'Kannur', 'India', '670011', 'XYZ Company', 'ABCDEFST', 1, '2022-03-16 11:21:38', '2022-03-16 11:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

CREATE TABLE `home_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_txt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_home` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `title`, `description`, `btn_txt`, `btn_link`, `image`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Save Up to 75% Off', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 'SHOP NOW', 'http://127.0.0.1:8000/shop-now', '1716751647412577.jpg', 1, 1, '2022-03-16 00:39:18', '2022-03-16 01:32:51'),
(2, 'Save Up to 25% Off', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 'BUY NOW', 'http://127.0.0.1:8000/buy-now-25-%-off', '3146761647413789.jpg', 1, 1, '2022-03-16 01:26:29', '2022-03-16 01:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_09_063225_create_admins_table', 1),
(6, '2022_03_09_074006_create_categories_table', 2),
(7, '2022_03_09_103203_create_coupons_table', 3),
(8, '2022_03_09_113728_create_sizes_table', 4),
(9, '2022_03_09_120052_create_colors_table', 5),
(10, '2022_03_09_121628_create_products_table', 6),
(11, '2022_03_15_101813_create_brands_table', 7),
(12, '2022_03_15_114135_add_is_promo_to_products_table', 8),
(13, '2022_03_15_114359_add_is_featured_to_products_table', 9),
(14, '2022_03_15_114601_add_is_trending_and_is_discounted_to_products_table', 10),
(15, '2022_03_15_123051_create_home_banners_table', 11),
(16, '2022_03_16_093849_create_taxes_table', 12),
(17, '2022_03_16_111056_create_customers_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_promo` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_trending` int(11) NOT NULL,
  `is_discounted` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `slug`, `brand`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `lead_time`, `tax_id`, `is_promo`, `is_featured`, `is_trending`, `is_discounted`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sleeve Top', 'girl-3_1647411461.png', 'sleeve_top', '2', 'sdsd', 'demo short description', 'demo description', 'fd', 'demo technical specification', 'dfd', 'dff', '2-3 days', 1, 1, 1, 0, 0, 1, '2022-03-09 08:53:39', '2022-03-16 05:35:32'),
(2, 5, 'Polo Shirt', 'polo-shirt-2_1647411524.png', 'polo_shirt', '3', 'Polo T- Shirt - white', '<p><b>100%</b> Original Products.</p><p><b>Free Delivery</b> on order above Rs.799.</p><p><b>Pay on delivery</b> might be available.</p><p><b>Easy 30 days</b> return and exchanges.</p><p><b>Try &amp; Buy</b> might be available.</p>', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px 0px 0px 25px; list-style: none; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\"><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\">Lorem ipsum dolor sit amet.</li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li></ul><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>', 'polo, t-shirt,', 'gtg', 'gtgt', '1 year', 'Delivery in 2-3 days', 1, 0, 1, 1, 0, 1, '2022-03-09 09:07:03', '2022-03-17 06:01:11'),
(3, 2, 'Frock', 'girl-2_1647411586.png', 'frock', '2', 'fgfgf', 'zfgf', 'dnn', 'gth', 'thyju', 'illi', 'gggggggst', '0', 0, 0, 0, 0, 1, 1, '2022-03-14 04:49:29', '2022-03-16 00:49:46'),
(4, 5, 'Peter Elagand Shirt', '4143281647521487.png', 'peter_elagand_shirt', '3', 'Peter Elagand Shirt - check', '<p><b>100%</b> Original Products.</p><p><b>Free Delivery</b> on order above Rs.799.</p><p><b>Pay on delivery</b> might be available.</p><p><b>Easy 30 days</b> return and exchanges.</p><p><b>Try &amp; Buy</b> might be available.</p>', '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">﻿</span><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><ul style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px 0px 0px 25px; list-style: none; color: rgb(51, 51, 51); font-family: Lato, sans-serif;\"><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</span></li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem ipsum dolor sit amet.</span></li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span></li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</span></li><li style=\"color: rgb(85, 85, 85); list-style: outside none square; margin-top: 5px;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</span></li></ul>', 'peter elagand , shirt', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;;\">﻿</span><span style=\"color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '﻿Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Easy 30 days return and exchanges.', 'Delivery in 2-3 days', 1, 0, 1, 1, 0, 1, '2022-03-09 09:07:03', '2022-03-17 07:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr`
--

CREATE TABLE `product_attr` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `attr_image` varchar(255) NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attr`
--

INSERT INTO `product_attr` (`id`, `products_id`, `sku`, `attr_image`, `mrp`, `price`, `qty`, `size_id`, `color_id`) VALUES
(1, 1, '11111', '', 1000, 500, 1, 1, 1),
(3, 2, '33333', '', 1200, 1000, 3, 1, 1),
(4, 3, '3434', 'girl-3_1647411586748318.png', 2700, 2500, 2, 1, 1),
(5, 3, '4343', 'girl-2_1647411586478062.png', 1200, 1000, 2, 3, 1),
(6, 4, '33334', '3826061647590672.jpg', 1200, 1000, 3, 1, 1),
(7, 4, '33335', '8983711647590672.jpg', 1200, 1000, 3, 2, 1),
(8, 4, '33336', '7020921647590672.jpg', 1200, 1000, 3, 2, 3),
(9, 4, '33337', '7811201647590672.jpg', 1200, 1000, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images`) VALUES
(1, 1, 'girl-3_1647411462775946.png'),
(3, 3, 'girl-3_1647411587560611.png'),
(4, 3, 'girl-2_1647411587192405.png'),
(5, 2, '2531041647413208.jpg'),
(6, 4, '2973451647521487.png'),
(7, 4, '6261411647522034.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XXL', 1, '2022-03-09 06:20:20', '2022-03-09 06:21:42'),
(2, 'XL', 1, '2022-03-14 04:00:18', '2022-03-14 04:00:18'),
(3, 'M', 1, '2022-03-14 04:09:18', '2022-03-14 04:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_desc`, `tax_value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GST 12%', '12', 1, '2022-03-16 05:30:52', '2022-03-16 05:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banners`
--
ALTER TABLE `home_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_banners`
--
ALTER TABLE `home_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
