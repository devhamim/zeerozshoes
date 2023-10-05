-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'We Have Everything You Need ?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', '6pJVz208134.png', '1', NULL, '2023-08-12 11:19:26'),
(2, 'Justin Lisiakir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', '46lha212942.png', '1', NULL, '2023-08-12 11:28:21'),
(3, 'Justin Lisiakir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.', 'LGEcO777459.jpg', '0', NULL, '2023-08-15 08:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `adbanners`
--

CREATE TABLE `adbanners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adbanners`
--

INSERT INTO `adbanners` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, '85n0d632930.jpg', 'https://www.youtube.com/', '1', NULL, '2023-08-15 14:53:36'),
(3, '5wgid747468.jpg', 'https://www.skype.com/', '1', '2023-08-12 12:04:34', '2023-08-15 14:54:55'),
(4, 'lcO3896771.webp', NULL, '0', '2023-08-13 07:29:20', '2023-08-15 11:45:22'),
(8, 'Iq2ba357475.jpg', 'https://www.youtube.com/', '0', '2023-08-15 11:50:43', '2023-08-15 14:54:00'),
(9, '7zUw8919655.jpg', 'https://www.instagram.com/cjhamim/', '1', '2023-08-15 14:54:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Rljoo894495.png', 'https://www.youtube.com/', 1, '2023-08-15 14:24:06', '2023-08-15 14:48:32'),
(4, 'x87hf707364.jpg', NULL, 0, '2023-08-15 14:28:19', '2023-08-15 14:28:27'),
(5, 'tZmmr340408.jpg', 'https://www.skype.com/', 0, '2023-08-15 14:45:39', '2023-08-15 14:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `billingdetailsses`
--

CREATE TABLE `billingdetailsses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `notes` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billingdetailsses`
--

INSERT INTO `billingdetailsses` (`id`, `order_id`, `customer_id`, `name`, `email`, `mobile`, `address`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'zh7-74577513', 11, 'Shad Burch', 'hamim@gmail.com', '645656565656', 'hgdhdghdg', NULL, '2023-08-13 08:32:22', NULL),
(2, 'xL7-843738716', 15, 'Rigel Dyer', 'budyta@mailinator.com', '087867876', 'hjdgd', 'hghgdhgd', '2023-08-13 09:09:56', NULL),
(3, 'lhL-368598694', 15, 'Rigel Dyer', 'budyta@mailinator.com', '65645', '645654', NULL, '2023-08-13 13:29:38', NULL),
(4, '1UL-455333298', 17, 'Muksitur Rahman Hamim', 'muksiturrahmanhamim735@gmail.com', '01876674794', '16/62 shonir akhra', NULL, '2023-08-15 09:50:57', NULL),
(5, 'owo-529270818', 17, 'Muksitur Rahman Hamim', 'muksiturrahmanhamim735@gmail.com', '01876674794', '16/62 shonir akhra', 'gdfsts', '2023-08-15 09:52:40', NULL),
(6, '6N8-56454846', 11, 'Shad Burch', 'hamim@gmail.com', '015614595312', 'dhaka,bangladesh', NULL, '2023-08-19 07:18:25', NULL),
(7, 'vLo-916065696', 11, 'Shad Burch', 'hamim@gmail.com', '015614595312', 'dhaka,bangladesh', NULL, '2023-08-19 07:19:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `brand_img`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'lPJd149201.png', '2023-08-12 06:09:03', NULL),
(2, 'Adidas', 'YmKmt736833.webp', '2023-08-12 06:09:36', NULL),
(3, 'Puma', 'F6CM2633415.jpg', '2023-08-12 06:10:00', NULL),
(4, 'Reebok', 'lzxga81080.webp', '2023-08-12 06:10:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `customer_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 3, 2, 1, '2023-08-12 09:46:45', NULL),
(8, 18, 3, 2, 2, 1, '2023-08-15 19:19:36', NULL),
(12, 11, 3, 3, 3, 1, '2023-08-19 07:25:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `category_img`, `created_at`, `updated_at`) VALUES
(1, 'Adidas Shoes', 'The Summer Sale Off 50%', 'qp4aF610958.webp', '2023-08-12 05:51:30', '2023-08-12 12:02:03'),
(2, 'women', 'women shoe', '1Ykdz638892.jpg', '2023-08-12 05:52:11', NULL),
(3, 'kids', 'kids shoe', '4gicJ335416.jpg', '2023-08-12 05:53:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'N/A', 'N/A', '2023-08-07 09:46:49', NULL),
(2, 'red', '#FF0000', '2023-08-07 09:47:39', NULL),
(3, 'black', '#000000', '2023-08-07 09:47:55', NULL),
(4, 'yellow', '#FFFF00', '2023-08-12 06:11:19', NULL),
(5, 'green', '#008000', '2023-08-12 06:11:40', NULL),
(6, 'white', '#FFFFFF', '2023-08-12 06:12:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customerlogins`
--

CREATE TABLE `customerlogins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customerlogins`
--

INSERT INTO `customerlogins` (`id`, `name`, `email`, `password`, `country`, `address`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Teagan Powell', 'hamim735@gmil.com', '$2y$10$TI8zec/yg0GKwX8B7QNiX.49JdOTEUYSnR8J8dospGvsU8UUSLBwK', 'Perspiciatis id dig', 'Officia ut qui nostr', '+1 (983) 467-7353', '1.webp', '2023-08-07 11:48:29', '2023-08-09 13:05:59'),
(3, 'Adrienne Phelps', 'hoxemyqiq@mailinator.com', '$2y$10$TI8zec/yg0GKwX8B7QNiX.49JdOTEUYSnR8J8dospGvsU8UUSLBwK', NULL, NULL, NULL, NULL, '2023-08-07 11:53:30', NULL),
(10, 'Celeste Gould', 'kylo@mailinator.com', '$2y$10$FMXcQDAVeXl2.Pqr6toim.xBlg1f3f7zOYyiGWTfPamu7YXBNJ6Lq', 'Eius ad ex unde vita', 'Impedit est except', '+1 (234) 457-4646', NULL, '2023-08-10 07:45:03', '2023-08-10 07:47:47'),
(11, 'Shad Burch', 'hamim@gmail.com', '$2y$10$DMw/0Kejcu.V8uJAuRNbluadGgt/ZJKeAx0OxvD16v9oHC20vhH6C', NULL, 'chourasta', NULL, '11.jpg', '2023-08-10 07:59:08', '2023-08-10 09:03:26'),
(12, 'Vivian Moody', 'visynaxi@mailinator.com', '$2y$10$umGpXF7BvYLuMZj88tTRGuIGzgHUur5jfbzhyNLinWI4cFaaOr9nG', NULL, NULL, NULL, NULL, '2023-08-12 09:41:14', NULL),
(13, 'Nerea Bender', 'nyhy@mailinator.com', '$2y$10$PKcnjYcLHQNPKizgf6B3tO8sFb8LoJp5wekVeQBOfG121IUyM8okG', NULL, NULL, NULL, NULL, '2023-08-12 09:46:29', NULL),
(14, 'Madeson Schmidt', 'mobibumaq@mailinator.com', '$2y$10$yEOYs6CDA6F7ARyaJSInuODuwjCoga5tdLAe56I61Z9i5S1DHUPbu', NULL, NULL, NULL, NULL, '2023-08-12 12:37:03', NULL),
(15, 'Rigel Dyer', 'budyta@mailinator.com', '$2y$10$ZFybY45ipuGxqb/qqxdR4.rVnTdsmZ.n9tRpjRwCw2dQbvySetwIi', NULL, NULL, NULL, NULL, '2023-08-12 12:42:11', NULL),
(17, 'Ann Hale', 'xonimohar@mailinator.com', '$2y$10$qn8.bMUVP1iFTHjEVpOwDubvMJUWWZVGyGpntPOeFHK68IODur3S2', 'Vel obcaecati molest', 'Aperiam asperiores a', '+1 (157) 619-8118', '17.webp', '2023-08-15 09:47:40', '2023-08-15 12:54:35'),
(18, 'Xena House', 'kycazamype@mailinator.com', '$2y$10$rXEuBgd1kJtzRDDCBS6DduWhvyZ2XAXhtVxVOaU6hwZy.ibcB7s7q', NULL, NULL, NULL, NULL, '2023-08-15 19:19:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_messages`
--

CREATE TABLE `customer_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_messages`
--

INSERT INTO `customer_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Yasir Peck', 'soceryhup@mailinator.com', 'Sequi aliquid molest', 'Lorem eum repellendu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `gallery`, `created_at`, `updated_at`) VALUES
(1, 1, '1mmgY609000.jpg', '2023-08-12 06:17:17', NULL),
(2, 1, 'W2n2B724786.jpg', '2023-08-12 06:17:17', NULL),
(3, 1, 'pnMXE303299.webp', '2023-08-12 06:17:17', NULL),
(4, 2, 'h0e4v310861.jpg', '2023-08-13 10:05:27', NULL),
(5, 2, 'U7PkM848837.jpg', '2023-08-13 10:05:28', NULL),
(6, 2, 'HfpFe382958.webp', '2023-08-13 10:05:28', NULL),
(7, 3, 'nB1FG499231.png', '2023-08-13 10:17:32', NULL),
(8, 3, '7vAqt117408.png', '2023-08-13 10:17:32', NULL),
(9, 3, 'zJSOI344364.webp', '2023-08-13 10:17:32', NULL),
(10, 4, 'GlBcx674347.webp', '2023-08-15 10:40:55', NULL),
(11, 4, '7OoVn606998.webp', '2023-08-15 10:40:55', NULL),
(12, 4, '4OgPh656341.webp', '2023-08-15 10:40:55', NULL),
(13, 4, 'vpJPC408280.webp', '2023-08-15 10:40:56', NULL),
(14, 5, 'p3MSK397865.webp', '2023-08-15 15:37:52', NULL),
(15, 5, 'BWTa7330058.webp', '2023-08-15 15:37:52', NULL),
(16, 5, 'cEjfz102429.webp', '2023-08-15 15:37:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 100, NULL, NULL),
(2, 1, 2, 3, 200, NULL, NULL),
(3, 1, 2, 4, 47, NULL, '2023-08-13 09:09:56'),
(4, 1, 2, 5, 10, NULL, NULL),
(5, 1, 3, 2, 28, NULL, '2023-08-13 08:32:22'),
(6, 1, 3, 3, 28, NULL, '2023-08-13 09:09:56'),
(7, 2, 2, 2, 15, NULL, '2023-08-15 09:50:57'),
(8, 2, 2, 4, 50, NULL, NULL),
(9, 3, 2, 2, 51, NULL, '2023-08-19 07:19:13'),
(10, 3, 3, 3, 29, NULL, '2023-08-19 07:18:25'),
(11, 4, 2, 3, 70, NULL, NULL),
(12, 4, 2, 2, 70, NULL, NULL),
(14, 5, 3, 2, 69, NULL, '2023-08-19 07:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_01_092539_create_categories_table', 1),
(7, '2023_08_01_122510_create_sub_categories_table', 1),
(8, '2023_08_02_074343_create_brands_table', 1),
(9, '2023_08_02_085317_create_products_table', 1),
(10, '2023_08_02_091528_create_galleries_table', 1),
(11, '2023_08_03_064025_create_colors_table', 1),
(12, '2023_08_03_064036_create_sizes_table', 1),
(13, '2023_08_03_093137_create_inventories_table', 1),
(14, '2023_08_06_065327_create_customerlogins_table', 1),
(15, '2023_08_06_160739_create_cards_table', 1),
(19, '2023_08_09_113050_create_orders_table', 2),
(20, '2023_08_09_113121_create_billingdetailsses_table', 2),
(21, '2023_08_09_113138_create_orderproducts_table', 2),
(23, '2023_08_09_132236_create_wishes_table', 3),
(24, '2023_08_10_180730_create_settings_table', 4),
(25, '2023_08_12_152108_create_customer_messages_table', 5),
(28, '2023_08_12_162201_create_abouts_table', 6),
(29, '2023_08_12_174200_create_adbanners_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `order_id`, `customer_id`, `product_id`, `price`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'zh7-74577513', 11, 1, 2990, 3, 2, 2, '2023-08-13 08:32:22', NULL),
(2, 'xL7-843738716', 15, 1, 2990, 3, 3, 2, '2023-08-13 09:09:56', NULL),
(3, 'xL7-843738716', 15, 1, 2990, 2, 4, 3, '2023-08-13 09:09:56', NULL),
(4, 'lhL-368598694', 15, 2, 630, 2, 2, 2, '2023-08-13 13:29:38', NULL),
(5, '1UL-455333298', 17, 2, 630, 2, 2, 3, '2023-08-15 09:50:57', NULL),
(6, 'owo-529270818', 17, 3, 490, 3, 3, 2, '2023-08-15 09:52:40', NULL),
(7, '6N8-56454846', 11, 3, 490, 3, 3, 3, '2023-08-19 07:18:25', NULL),
(8, 'vLo-916065696', 11, 5, 400, 3, 2, 1, '2023-08-19 07:19:13', NULL),
(9, 'vLo-916065696', 11, 3, 490, 2, 2, 3, '2023-08-19 07:19:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `charge` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `sub_total`, `total`, `status`, `charge`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'zh7-74577513', 11, 5980, 6040, 1, 60, 1, '2023-08-13 08:32:22', NULL),
(2, 'xL7-843738716', 15, 14950, 15070, 1, 120, 1, '2023-08-13 09:09:56', NULL),
(3, 'lhL-368598694', 15, 1260, 1320, 1, 60, 1, '2023-08-13 13:29:38', NULL),
(4, '1UL-455333298', 17, 1890, 1950, 1, 60, 1, '2023-08-15 09:50:57', NULL),
(5, 'owo-529270818', 17, 980, 1100, 5, 120, 1, '2023-08-15 09:52:40', '2023-08-15 09:58:27'),
(6, '6N8-56454846', 11, 1470, 1590, 1, 120, 1, '2023-08-19 07:18:25', NULL),
(7, 'vLo-916065696', 11, 1870, 1930, 1, 60, 1, '2023-08-19 07:19:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sort_desp` varchar(255) NOT NULL,
  `long_desp` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_desp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `sort_desp`, `long_desp`, `status`, `brand_id`, `category_id`, `subcategory_id`, `price`, `discount`, `total_price`, `thumbnail`, `slug`, `meta_title`, `meta_desp`, `created_at`, `updated_at`) VALUES
(1, 'APEX MEN\'S FORMAL SHOE', 'Stylish upper gives a sophisticated appeal\r\n\r\nContemporary elongated silhouette gives a refined look\r\n\r\nFlexible outsole for comfort and grip', '<div class=\"lonDesc\" style=\"margin: 0px; padding: 0px; width: 1197.94px; color: rgb(0, 0, 0); font-family: lato, sans-serif; font-size: 14px;\"><div class=\"colLt\" style=\"margin: 0px; padding: 0px 30px 0px 50px; width: 586.984px; display: inline-block; vertical-align: middle;\"><ul><li style=\"margin: 0px; padding: 0px; line-height: 1.5em;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 2px 0px 5px;\">Stylish upper gives a sophisticated appeal</p></li><li style=\"margin: 0px; padding: 0px; line-height: 1.5em;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 2px 0px 5px;\">Contemporary elongated silhouette gives a refined look</p></li><li style=\"margin: 0px; padding: 0px; line-height: 1.5em;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 2px 0px 5px;\">Flexible outsole for comfort and grip</p></li></ul></div>&nbsp;<div class=\"colRt\" style=\"margin: 0px; padding: 0px; width: 586.984px; display: inline-block; vertical-align: middle;\"><img src=\"https://storage.sg.content-cdn.io/cdn-cgi/image/%7Bwidth%7D,%7Bheight%7D,quality=75,format=auto,fit=cover,g=top/in-resources/25c7d1c6-73be-4ff9-b000-0bf110b5c461/Images/ProductImages/Source/91113A05_1_1_nw.jpeg\" style=\"margin: 0px; padding: 0px; border: none; font-size: 12px; width: 586.984px;\"></div></div><div class=\"tabsPdp\" style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: lato, sans-serif; font-size: 14px;\"><div class=\"container22\" style=\"margin: 0px; padding: 0px; width: 1105.8px; float: left;\"><div id=\"tabs\" class=\"ctl_productdetailtabs ui-tabs ui-widget ui-widget-content ui-corner-all\" style=\"margin: 0px 0px 50px; padding: 10px 0px 0px; border: none; color: rgb(51, 51, 51); background: 0px 0px; font-family: &quot;open sans&quot;, sans-serif; font-size: 13px; clear: both;\"><ul class=\"ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all\" role=\"tablist\" style=\"border: none; outline: 0px; line-height: 1.3; background: 0px 0px; color: rgb(255, 255, 255); font-weight: 700; position: relative;\"><li class=\"ui-state-default ui-corner-top ui-tabs-active ui-state-active\" role=\"tab\" tabindex=\"0\" aria-controls=\"Features\" aria-labelledby=\"ui-id-3\" aria-selected=\"true\" style=\"margin: 0px 0px -1px; padding: 0px; line-height: 1.5em; background: 0px 0px; outline: none; text-align: center; position: relative; float: none; display: inline-block; top: 0px; height: 42px; border-radius: 30px; border: none !important;\"><a href=\"https://www.apex4u.com/apex-mens-formal-shoe/p/17475081#Features\" class=\"ui-tabs-anchor\" role=\"presentation\" tabindex=\"-1\" id=\"ui-id-3\" style=\"margin: 0px; padding: 0px; text-wrap: nowrap; color: rgb(0, 0, 0); outline: none; float: left; cursor: pointer; background: 0px 0px; height: 40px; font-family: lato, sans-serif; font-size: 16px; text-transform: uppercase; line-height: 40px;\"><span style=\"margin: 0px; padding: 0px;\">SPECIFICATIONS</span></a></li></ul><div id=\"Features\" aria-labelledby=\"ui-id-3\" class=\"ui-tabs-panel ui-widget-content ui-corner-bottom\" role=\"tabpanel\" aria-expanded=\"true\" aria-hidden=\"false\" style=\"margin: 10px 0px 0px; padding: 4px; border: 0px; background: 0px 0px; min-height: 120px; height: 128px; overflow: hidden;\"><div class=\"ctl_containergroup nopadding\" style=\"margin: 0px; padding: 0px; overflow: auto; height: auto; color: rgb(0, 0, 0); font-size: 12px;\"><div class=\"productcompairediv\" id=\"productfeaturesdiv\" style=\"margin: 0px; padding: 0px; width: 768.453px; border: none;\"><span id=\"bankProductAttr\" style=\"margin: 0px; padding: 0px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" style=\"margin: 0px; padding: 0px;\"><tbody style=\"margin: 0px; padding: 0px;\"><tr class=\"rowstyle\" style=\"margin: 0px; padding: 0px; width: 768.453px;\"><td class=\"propertylist\" style=\"margin: 0px; padding: 6px 2px 4px 0px; width: 228.531px; border-right: none; vertical-align: top; border-bottom: none;\"><label class=\"propertyname\" style=\"margin: 0px; padding: 0px; font-size: 13px; font-weight: 600; float: left;\">Upper Material</label></td><td class=\"propertylist_2\" style=\"margin: 0px; padding: 6px 0px 4px 3px; width: 534.922px; vertical-align: top; border-bottom: none;\"><ul><li style=\"margin: 0px 6px 4px 0px; padding: 0px; line-height: 1.5em; list-style: none; height: 18px; overflow: hidden; float: none;\"><label class=\"product_featurevalue\" style=\"margin: 0px; padding: 0px 0px 0px 10px; display: block; float: left; color: rgb(51, 51, 51); font-size: 13px; text-transform: capitalize; font-weight: 600;\">Leather</label></li></ul></td></tr><tr class=\"rowstyle\" style=\"margin: 0px; padding: 0px; width: 768.453px;\"><td class=\"propertylist\" style=\"margin: 0px; padding: 6px 2px 4px 0px; width: 228.531px; border-right: none; vertical-align: top; border-bottom: none;\"><label class=\"propertyname\" style=\"margin: 0px; padding: 0px; font-size: 13px; font-weight: 600; float: left;\">Sole Material</label></td><td class=\"propertylist_2\" style=\"margin: 0px; padding: 6px 0px 4px 3px; width: 534.922px; vertical-align: top; border-bottom: none;\"><ul><li style=\"margin: 0px 6px 4px 0px; padding: 0px; line-height: 1.5em; list-style: none; height: 18px; overflow: hidden; float: none;\"><label class=\"product_featurevalue\" style=\"margin: 0px; padding: 0px 0px 0px 10px; display: block; float: left; color: rgb(51, 51, 51); font-size: 13px; text-transform: capitalize; font-weight: 600;\">TPR</label></li></ul></td></tr><tr class=\"rowstyle\" style=\"margin: 0px; padding: 0px; width: 768.453px;\"><td class=\"propertylist\" style=\"margin: 0px; padding: 6px 2px 4px 0px; width: 228.531px; border-right: none; vertical-align: top; border-bottom: none;\"><label class=\"propertyname\" style=\"margin: 0px; padding: 0px; font-size: 13px; font-weight: 600; float: left;\">Lining</label></td><td class=\"propertylist_2\" style=\"margin: 0px; padding: 6px 0px 4px 3px; width: 534.922px; vertical-align: top; border-bottom: none;\"><ul><li style=\"margin: 0px 6px 4px 0px; padding: 0px; line-height: 1.5em; list-style: none; height: 18px; overflow: hidden; float: none;\"><label class=\"product_featurevalue\" style=\"margin: 0px; padding: 0px 0px 0px 10px; display: block; float: left; color: rgb(51, 51, 51); font-size: 13px; text-transform: capitalize; font-weight: 600;\">Leather</label></li></ul></td></tr><tr class=\"rowstyle\" style=\"margin: 0px; padding: 0px; width: 768.453px;\"><td class=\"propertylist\" style=\"margin: 0px; padding: 6px 2px 4px 0px; width: 228.531px; border-right: none; vertical-align: top; border-bottom: none;\"><label class=\"propertyname\" style=\"margin: 0px; padding: 0px; font-size: 13px; font-weight: 600; float: left;\">Gender</label></td><td class=\"propertylist_2\" style=\"margin: 0px; padding: 6px 0px 4px 3px; width: 534.922px; vertical-align: top; border-bottom: none;\"><ul><li style=\"margin: 0px 6px 4px 0px; padding: 0px; line-height: 1.5em; list-style: none; height: 18px; overflow: hidden; float: none;\"><label class=\"product_featurevalue\" style=\"margin: 0px; padding: 0px 0px 0px 10px; display: block; float: left; color: rgb(51, 51, 51); font-size: 13px; text-transform: capitalize; font-weight: 600;\">Men</label></li></ul></td></tr></tbody></table></span></div></div></div></div></div></div>', 1, 2, 1, 5, 3990, 1000, 2990, 'BLk0n716754.jpg', 'apex-men\'s-formal-shoe-53186467', 'APEX MEN\'S FORMAL SHOE', 'Stylish upper gives a sophisticated appeal\r\n\r\nContemporary elongated silhouette gives a refined look\r\n\r\nFlexible outsole for comfort and grip', '2023-08-12 06:17:17', NULL),
(2, 'Khaki Suede Leather Semi Formal Shoes', 'Khaki suede leather semi formal shoes with thin goat leather lining. Stitch detail around sole and twill tape on back. Comes with matching shoe lace, comfortable insole and a contrast rubber sole.', '<div class=\"product attribute description\" style=\"margin: 0px 0px 2rem; padding: 0px; color: rgb(0, 0, 0); font-family: futura-pt, sans-serif;\"><h3 style=\"margin-right: 0px; margin-bottom: 1rem; margin-left: 0px; font-weight: 600; line-height: 1.1; font-size: 2rem; padding: 0px; text-transform: uppercase;\">PRODUCT DESCRIPTION</h3><div class=\"value\" style=\"margin: 0px; padding: 0px;\">Khaki suede leather semi formal shoes with thin goat leather lining. Stitch detail around sole and twill tape on back. Comes with matching shoe lace, comfortable insole and a contrast rubber sole.</div></div><div class=\"additional-attributes-wrapper table-wrapper\" style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: futura-pt, sans-serif;\"><table class=\"data table additional-attributes\" id=\"product-attribute-specs-table\" style=\"--bs-table-color: var(--bs-body-color); --bs-table-bg: transparent; --bs-table-border-color: var(--bs-border-color); --bs-table-accent-bg: transparent; --bs-table-striped-color: var(--bs-body-color); --bs-table-striped-bg: rgba(0, 0, 0, 0.02); --bs-table-active-color: var(--bs-body-color); --bs-table-active-bg: rgba(0, 0, 0, 0.1); --bs-table-hover-color: var(--bs-body-color); --bs-table-hover-bg: rgba(0, 0, 0, 0.03); width: 413px; margin: 0px 0px 2rem; border: none; padding: 0px; border-spacing: 0px; max-width: 100%;\"><caption class=\"table-caption\" style=\"padding: 0px; margin: -1px -1px 15px; border: 0px; clip: unset; height: auto; overflow: hidden; position: relative; width: auto; font-size: 1.8rem; font-weight: 600;\">Specifications</caption><tbody style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\"><tr style=\"margin: 0px; padding: 0px; background: rgb(251, 251, 251);\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Value Addition</th><td class=\"col data\" data-th=\"Value Addition\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">Contrast Stitching</td></tr><tr style=\"margin: 0px; padding: 0px;\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Material</th><td class=\"col data\" data-th=\"Material\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">Suede Leather</td></tr><tr style=\"margin: 0px; padding: 0px; background: rgb(251, 251, 251);\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Heel</th><td class=\"col data\" data-th=\"Heel\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">1 Inch</td></tr><tr style=\"margin: 0px; padding: 0px;\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Lining</th><td class=\"col data\" data-th=\"Lining\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">Genuine Leather Lining</td></tr><tr style=\"margin: 0px; padding: 0px; background: rgb(251, 251, 251);\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Sole</th><td class=\"col data\" data-th=\"Sole\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">Rubber Sole</td></tr><tr style=\"margin: 0px; padding: 0px;\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Strap</th><td class=\"col data\" data-th=\"Strap\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">With Upper Cord</td></tr><tr style=\"margin: 0px; padding: 0px; background: rgb(251, 251, 251);\"><th class=\"col label\" scope=\"row\" style=\"text-align: left; border: none; padding: 5.5px 30px 10px 0px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); margin: 0px; vertical-align: top;\">Care</th><td class=\"col data\" data-th=\"Care\" style=\"border: none; padding: 5.5px 5px 10px; box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg); vertical-align: top; margin: 0px;\">Clean With Soft Dry Brush And Keep It In a Dry Place</td></tr></tbody></table></div>', 1, 1, 1, 5, 650, 20, 630, 'S4Poh644452.jpg', 'khaki-suede-leather-semi-formal-shoes-86543993', 'Khaki Suede Leather Semi Formal Shoes', 'Khaki Suede Leather Semi Formal Shoes', '2023-08-13 10:05:27', NULL),
(3, 'gfgvfgfg', 'fgvfsgvfgvf', '<p>vgfgvfgvfv</p>', 1, 2, 1, 5, 544, 54, 490, 'gKPtD60520.png', 'gfgvfgfg-69487507', 'gfgsfd', 'ghsfgsf', '2023-08-13 10:17:32', '2023-08-13 10:29:12'),
(4, 'tygtrghgf', 'hgfhgfhtgrfhg', '<p>hgfhgfhgfhgf</p>', 0, 1, 1, 5, 400, 10, 390, 'tP0y4640285.webp', 'tygtrghgf-1896862', 'Est architecto nihil', 'ghgfhgfhf', '2023-08-15 10:40:54', '2023-08-15 10:56:47'),
(5, 'ghfgdh', 'hgdhgdhd', '<p>hgdhg</p>', 1, 2, 2, 2, 400, NULL, 400, 'hwLoW143376.jpg', 'ghfgdh-55655170', 'fdfd', 'dfsdsg', '2023-08-15 15:37:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `logo`, `favicon`, `address`, `title`, `footer`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'ecommerce', 'hamim@gmail.com', '+1 (609) 603-5739', 'wjmcO837245.png', '9rQqz270356.png', 'dhaka,bangladesh', 'zero e-commerce website', '© 2022 codewithsadee. All Rights Reserved', NULL, NULL, NULL, NULL, NULL, '2023-08-15 12:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'N/A', '2023-08-07 09:47:11', NULL),
(2, 'S', '2023-08-07 09:47:16', NULL),
(3, 'L', '2023-08-07 09:47:21', NULL),
(4, 'M', '2023-08-07 09:47:28', NULL),
(5, 'xl', '2023-08-12 06:12:34', NULL),
(6, 'xxl', '2023-08-12 06:12:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `subcategory_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category`, `name`, `description`, `subcategory_img`, `created_at`, `updated_at`) VALUES
(1, 2, 'Heels', 'women Heels', 'v7pT6870170.jpg', '2023-08-12 05:59:36', NULL),
(2, 2, 'Boots', 'women boots', '476rF803241.jpg', '2023-08-12 06:01:01', NULL),
(3, 2, 'Espadrilles', 'women Espadrilles', 'RR6H4879176.jpg', '2023-08-12 06:01:51', NULL),
(4, 3, 'Platforms', 'women Platforms', 'SNOCL731538.jpg', '2023-08-12 06:02:38', NULL),
(5, 1, 'Formal Shoes', 'men Formal Shoes', 'JijM3536678.webp', '2023-08-12 06:07:19', NULL),
(6, 1, 'Casual Shoes', 'men Casual Shoes', 'yl3FT391836.jpg', '2023-08-12 06:08:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `linkedin` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `phone`, `address`, `photo`, `facebook`, `twitter`, `linkedin`, `instagram`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Muksitur Rahman Hamim', 'muksiturrahmanhamim735@gmail.com', '2', '01876674794', '16/62 shonir akhra\r\njatrabari', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$QcxFzamdPl14FvJiRMS9C.H/IYDERbcS.PCU0am6bvh5WyRCW1zpC', NULL, NULL, '2023-08-15 19:01:52'),
(3, 'Forrest Mann', 'hamim@gmail.com', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Z63xbo6Dk03X3jjJPMVAsuxXrrl2EaO6sImLP.FXJVQ99htecnfYi', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishes`
--

CREATE TABLE `wishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishes`
--

INSERT INTO `wishes` (`id`, `customer_id`, `product_id`, `color_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 17, 1, NULL, NULL, '2023-08-15 12:54:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adbanners`
--
ALTER TABLE `adbanners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billingdetailsses`
--
ALTER TABLE `billingdetailsses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
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
-- Indexes for table `customerlogins`
--
ALTER TABLE `customerlogins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_messages`
--
ALTER TABLE `customer_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `adbanners`
--
ALTER TABLE `adbanners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `billingdetailsses`
--
ALTER TABLE `billingdetailsses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customerlogins`
--
ALTER TABLE `customerlogins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_messages`
--
ALTER TABLE `customer_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
