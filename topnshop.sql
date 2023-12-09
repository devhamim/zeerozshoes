-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 04:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topnshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_link`, `banner_image`, `created_at`, `updated_at`) VALUES
(5, NULL, 'https://home.nugortechit.xyz/product/details/hatil-fixed-chair-brantley-145-2770', 'xUB7a274396.png', '2023-10-07 06:09:56', '2023-10-07 06:10:55'),
(6, NULL, 'https://home.nugortechit.xyz/product/details/salowar-kamiz-6812', '3X7jF392117.jpg', '2023-10-08 04:39:14', NULL),
(7, NULL, 'https://home.nugortechit.xyz/product/details/texhoo-mini-pc-computer-intel-core-i7-i5-processador-6162', '36uvV297611.png', '2023-10-08 04:39:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `billingdetails`
--

CREATE TABLE `billingdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billingdetails`
--

INSERT INTO `billingdetails` (`id`, `order_id`, `customer_id`, `name`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, '#ORDER-21994', 'OctaviaMatthews-5440', 'Octavia Matthews', '+1 (604) 793-3534', 'Dolore nihil dolorum', '2023-11-07 12:09:00', NULL),
(2, '#ORDER-22486', 'XanthaGardner-1276', 'Xantha Gardner', '+1 (796) 577-7908', 'Est voluptatem Offi', '2023-11-07 12:09:50', NULL),
(3, '#ORDER-99766', 'Caesar-4851', 'Caesar', '015614595312', 'Fresh Farm Avocado', '2023-11-08 06:09:14', NULL),
(4, '#ORDER-68744', 'IsaacButler-2213', 'Isaac Butler', '+1 (366) 959-9181', 'Culpa eum alias aute', '2023-11-08 11:01:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', 'Samsung-9408.png', 19, '2023-05-16 09:57:33', '2023-05-16 10:12:26'),
(3, 'Canon', 'canon-7881.png', 19, '2023-05-16 10:19:22', NULL),
(4, 'Welch\'s', 'welch\'s-9066.png', 22, '2023-05-18 08:34:34', NULL),
(5, 'Hatil', 'hatil-5900.png', 26, '2023-05-21 11:52:11', NULL),
(6, 'loto', 'loto-5866.jpg', 3, '2023-08-14 07:58:00', '2023-08-14 07:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 7, 3, '2023-08-28 06:54:03', '2023-08-29 11:34:38'),
(2, 4, 4, '2023-08-28 06:55:13', '2023-08-29 11:39:43'),
(4, 8, 1, '2023-08-28 09:01:46', '2023-08-29 11:39:43'),
(5, 2, 2, '2023-08-29 10:39:44', '2023-08-29 11:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'Fashion-3330.jpg', 21, '2023-05-13 09:06:29', '2023-05-17 08:15:20'),
(2, 'Electronic', 'Electronics-2483.webp', 34, '2023-05-14 11:10:20', '2023-05-31 10:38:11'),
(3, 'Furniture', 'furniture-5370.jpg', 21, '2023-05-17 07:36:38', '2023-05-17 07:36:38'),
(4, 'Cooking', 'cooking-8517.jpg', 21, '2023-05-17 07:38:16', '2023-05-17 07:38:16'),
(5, 'Computer & Laptop', 'computer-&-laptop-6723.jpg', 21, '2023-05-17 07:39:40', '2023-05-17 07:39:40'),
(6, 'Healthy & Beauty', 'healthy-&-beauty-1053.jpg', 21, '2023-05-17 07:42:05', '2023-05-17 07:42:05'),
(7, 'Shoes & Boots', 'shoes-&-boots-5842.jpg', 21, '2023-05-17 07:43:07', '2023-05-17 07:43:07'),
(8, 'Travel & Outdoor', 'travel-&-outdoor-6158.jpg', 21, '2023-05-17 07:44:07', '2023-05-17 07:44:07'),
(9, 'Smart Phones', 'smart-phones-8636.webp', 21, '2023-05-17 07:44:47', '2023-05-17 07:44:47'),
(10, 'TV & Audio', 'tv-&-audio-2941.webp', 21, '2023-05-17 07:45:37', '2023-05-17 07:45:37'),
(11, 'jewellery', 'jewellery-2133.jpg', 21, '2023-05-17 07:47:53', '2023-05-17 07:47:53'),
(12, 'loto', 'loto-8397.webp', 3, '2023-08-14 07:54:04', '2023-08-14 07:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(2, 'Blue', '#0000FF', '2023-05-13 11:11:58', NULL),
(3, 'Red', '#FF0000', '2023-05-13 11:24:48', NULL),
(4, 'Purple', '#800080', '2023-05-14 11:40:57', NULL),
(5, 'Yellow', '#FFFF00', '2023-05-14 11:41:22', NULL),
(6, 'Black', '#000000', '2023-06-30 06:30:49', NULL),
(7, 'Green', '#00ff00', '2023-05-18 07:54:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactinfos`
--

CREATE TABLE `contactinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactinfos`
--

INSERT INTO `contactinfos` (`id`, `contact_name`, `contact_email`, `contact_number`, `contact_address`, `contact_info`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nugortech', 'Nugortech', '01303523442', 'House # 85/2, Road # 4, Mohommadia Housing Limited, Mohommadpur., Dhaka, Bangladesh', 'Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus\", metus.\"', 1, '2023-06-01 12:40:13', '2023-08-14 08:04:01'),
(3, 'Imani Cobb', 'gofox@mailinator.com', '629', 'Ipsum aut cumque no', 'A est totam fugit i', 0, '2023-06-01 13:22:03', '2023-06-01 13:26:10'),
(4, 'Avram Alexander', 'Avram Alexander', '716', 'Neque eligendi', 'Cum dolorem', 0, '2023-06-01 13:22:06', '2023-08-14 08:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Matthew Delacruz', 'silatuce@mailinator.com', '+1 (142) 938-5809', 'Qui doloribus velit', 1, '2023-06-01 11:54:03', '2023-08-14 08:04:25'),
(16, 'Clinton Munoz', 'lowicaf@mailinator.com', '+1 (832) 626-8776', 'Incidunt ea deserun', 1, '2023-06-01 13:57:19', '2023-09-10 05:42:44'),
(17, 'Mike Francis', 'no-replyOi@gmail.com', '89315258512', 'If you have a local business and want to rank it on google maps in a specific area then this service is for you. \r\n \r\nGoogle Map Stacking is one of the best ways to rank your GMB in a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Francis\r\n \r\n \r\nPS: Want an all in one Local Plan that includes everything? \r\nhttps://www.speed-seo.net/product/local-seo-package/', 0, '2023-06-16 02:22:30', NULL),
(18, 'Mike Kendal', 'no-replyOi@gmail.com', '84851896564', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nThanks and regards \r\nMike Kendal', 0, '2023-06-26 11:54:28', NULL),
(19, 'Mike Hoggarth', 'mikeOi@gmail.com', '81439931817', 'Hi there \r\n \r\nThis is Mike Hoggarth\r\n \r\nLet me present you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your nugortechit.xyz SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\n \r\nRegards \r\n \r\nMike Hoggarth\r\n \r\nmike@strictlydigital.net', 0, '2023-07-07 18:42:24', NULL),
(20, 'Mike Nyman', 'mikeMarylotaForecell@gmail.com', '87563734237', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Nyman\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', 1, '2023-07-17 04:30:55', '2023-08-20 12:26:58'),
(21, 'Mike Hill', 'miketutaginny@gmail.com', '89165375539', 'Hi there \r\n \r\nJust checked your nugortechit.xyz backlink profile, I noticed a moderate percentage of toxic links pointing to your website \r\n \r\nWe will investigate each link for its toxicity and perform a professional clean up for you free of charge. \r\n \r\nStart recovering your ranks today: \r\nhttps://www.hilkom-digital.de/professional-linksprofile-clean-up-service/ \r\n \r\n \r\nRegards \r\nMike Hill\r\nHilkom Digital SEO Experts \r\nhttps://www.hilkom-digital.de/', 1, '2023-07-22 18:52:04', '2023-08-20 12:27:02'),
(22, 'Mike Morrison', 'mikeseepadedge@gmail.com', '84851742996', 'Hi there, \r\n \r\nI have reviewed your domain in MOZ and have observed that you may benefit from an increase in authority. \r\n \r\nOur solution guarantees you a high-quality domain authority score within a period of three months. This will increase your organic visibility and strengthen your website authority, thus making it stronger against Google updates. \r\n \r\nCheck out our deals for more details. \r\nhttps://www.monkeydigital.co/domain-authority-plan/ \r\n \r\nNEW: Ahrefs Domain Rating \r\nhttps://www.monkeydigital.co/ahrefs-seo/ \r\n \r\nThanks and regards \r\nMike Morrison', 0, '2023-07-24 12:52:37', NULL),
(23, 'Mike Backer', 'mikecolverne@gmail.com', '84419118553', 'Hi there, \r\n \r\nMy name is Mike from Monkey Digital, \r\n \r\nAllow me to present to you a lifetime revenue opportunity of 35% \r\nThat\'s right, you can earn 35% of every order made by your affiliate for life. \r\n \r\nSimply register with us, generate your affiliate links, and incorporate them on your website, and you are done. It takes only 5 minutes to set up everything, and the payouts are sent each month. \r\n \r\nClick here to enroll with us today: \r\nhttps://www.monkeydigital.org/affiliate-dashboard/ \r\n \r\nThink about it, \r\nEvery website owner requires the use of search engine optimization (SEO) for their website. This endeavor holds significant potential for both parties involved. \r\n \r\nThanks and regards \r\nMike Backer\r\n \r\nMonkey Digital', 0, '2023-07-25 16:34:22', NULL),
(24, 'Peter Baker', 'peterPeks@gmail.com', '84297773637', 'Hello nugortechit.xyz Owner. \r\n \r\nAre you looking to boost your business’ visibility on the internet as well as reach even more prospective clients? Being included in Google Autocomplete can enhance your company\'s branding, reputation, as well as targeting, causing boosted website web traffic as well as revenue. \r\n \r\nPlease go here https://www.digital-x-press.com/autosuggest/ to find how your business can take advantage of Google Autocomplete and enhance your sales potential. \r\n \r\n \r\nThank you \r\n \r\nPeter Baker\r\nDigital X Press SEO Agency', 1, '2023-07-29 18:59:45', '2023-08-20 12:26:46'),
(25, 'Mike White', 'mikeOi@gmail.com', '83185424313', 'Greetings \r\n \r\nThis is Mike White\r\n \r\nLet me show you our latest research results from our constant SEO feedbacks that we have from our plans: \r\n \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nThe new Semrush Backlinks, which will make your nugortechit.xyz SEO trend have an immediate push. \r\nThe method is actually very simple, we are building links from domains that have a high number of keywords ranking for them.  \r\n \r\nForget about the SEO metrics or any other factors that so many tools try to teach you that is good. The most valuable link is the one that comes from a website that has a healthy trend and lots of ranking keywords. \r\nWe thought about that, so we have built this plan for you \r\n \r\nCheck in detail here: \r\nhttps://www.strictlydigital.net/product/semrush-backlinks/ \r\n \r\nCheap and effective \r\n \r\nTry it anytime soon \r\n \r\n \r\nRegards \r\n \r\nMike White\r\n \r\nmike@strictlydigital.net', 1, '2023-08-01 16:06:47', '2023-08-20 12:26:48'),
(26, 'Mike Moore', 'mikeMarylotaForecell@gmail.com', '84227821238', 'If you are looking to rank your local business on Google Maps in a specific area, this service is for you. \r\n \r\nGoogle Map Stacking is a highly effective technique for ranking your GMB within a specific mile radius. \r\n \r\nMore info: \r\nhttps://www.speed-seo.net/product/google-maps-pointers/ \r\n \r\nThanks and Regards \r\nMike Moore\r\n \r\n \r\nPS: Want a comprehensive local plan that covers everything? \r\nhttps://www.speed-seo.net/product/local-seo-bundle/', 0, '2023-08-07 16:10:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `validity` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_amount`, `validity`, `created_at`, `updated_at`) VALUES
(1, 'summer', 50, '2023-09-30', '2023-05-27 06:40:14', '2023-05-31 10:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_auths`
--

CREATE TABLE `customer_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_auths`
--

INSERT INTO `customer_auths` (`id`, `name`, `email`, `password`, `image`, `country`, `address`, `details`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'tofofi', 'dulylafoxo@mailinator.com', '$2y$10$t8f/G0XRI2njyfY0bPqagOBjJ5r.kw.1CZg6Idm934ueQV6nTN5VK', NULL, NULL, NULL, NULL, NULL, '2023-05-18 13:16:28', '2023-05-18 13:16:28'),
(2, 'sar', 'sar@mailinator.com', '$2y$10$VPblfH2ZfR9ASNxyNJz1s.28rWgnaJMfCVVihHJMf1RzXy2PFoSUO', NULL, NULL, NULL, NULL, NULL, '2023-05-18 13:17:39', '2023-05-18 13:17:39'),
(3, 'jysisyxura', 'xeniqekaqy@mailinator.com', '$2y$10$9V5d6KnLfmpllIe9ekJ95etqjLSbQc/UlZ0Dpf1VBXy2XwckL7Pja', NULL, NULL, NULL, NULL, NULL, '2023-05-23 10:02:31', '2023-05-23 10:02:32'),
(4, 'zywocukac', 'zeqo@mailinator.com', '$2y$10$/FSgERlYaiwVsXWMc7LynO3AibBbBl/PDWkotckbip9Br2TNPFOkW', NULL, NULL, NULL, NULL, NULL, '2023-05-23 10:09:35', '2023-05-23 10:09:35'),
(5, 'pop', 'pop@gmail.com', '$2y$10$D.6i6ETdeE.ZdQPo.fzQo.ni56XL1/zBMPXKeSswY8el0t3z7wEyW', NULL, NULL, NULL, NULL, NULL, '2023-05-23 10:19:17', '2023-05-23 10:19:17'),
(6, 'weqymosy', 'suherumon@mailinator.com', '$2y$10$JjzmszqOR.XfcAOFd4SPWeq2DzSDv8ZoW.1m148rhaptyrNSffiLi', NULL, NULL, NULL, NULL, NULL, '2023-05-25 05:19:49', '2023-05-25 05:19:49'),
(7, 'pifyr', 'zytaqeta@mailinator.com', '$2y$10$EqtQrUuC0LXHJ4vRBrl9vOLOIlJOvAk6i7.1moekcFvQNQQPiqp3K', NULL, NULL, NULL, NULL, NULL, '2023-05-25 05:20:14', '2023-05-25 05:20:14'),
(8, 'lusez', 'rijadynewy@mailinator.com', '$2y$10$5Mk03UwVvnV/VvPCjPkVdOaXNjeEX.NyIySFvEuZRGPdEt0UhcrV6', NULL, NULL, NULL, NULL, NULL, '2023-05-25 05:32:28', '2023-05-25 05:32:28'),
(9, 'dar', 'dar@gmail.com', '$2y$10$6mXCz1UAEesv/FRQhozP9uWMlggsBJwq8g.C/3ZZXHy.qRyM0Mpt.', NULL, NULL, NULL, NULL, NULL, '2023-05-25 10:09:01', '2023-05-25 10:09:01'),
(10, 'fdf', 'fdf@gmail.com', '$2y$10$HWc0UaT1Yc6VC/NE7ungw.I/RltUoyDG07Jo3M2boAd7enwPFG/lK', NULL, NULL, NULL, NULL, NULL, '2023-05-25 10:14:29', '2023-05-25 10:14:29'),
(11, 'fetiny', 'vurori@mailinator.com', '$2y$10$g8WZgktgj3twhWVw0Tb9yuCripkUsTxkktY9mcetNuQ6jO16/WKri', NULL, NULL, NULL, NULL, NULL, '2023-05-25 11:18:12', '2023-05-25 11:18:12'),
(12, 'narar', 'xuxatyriku@mailinator.com', '$2y$10$m8552ZcJBUmQ7mrVKjHFwekLRpIRPkYcMgIdC.6eix60GKF4bvNGC', NULL, NULL, NULL, NULL, NULL, '2023-05-27 05:30:59', '2023-05-27 05:30:59'),
(13, 'vahicugo', 'xebytiq@mailinator.com', '$2y$10$x99nTw0in6YhOKBiWoaH2.fORYQ3lPailbPG4zsaxnCdGonhWtHzG', NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:42:25', '2023-05-31 09:42:25'),
(14, 'sehogal', 'dypirigu@mailinator.com', '$2y$10$OxYsbQgZGtV6Wuio8iMfFOEARdyRzWtkpbROxsXXSgNogDmV3SAwG', NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:42:34', '2023-05-31 09:42:34'),
(15, 'sofulew', 'cotumixo@mailinator.com', '$2y$10$zbJxJSdJDoSSvJzjtq6mo.SKH4oQRbTXhoLpvVPBNACIjS5qm.zou', NULL, NULL, NULL, NULL, NULL, '2023-05-31 13:39:15', '2023-05-31 13:39:16'),
(16, 'hajof', 'wuziri@mailinator.com', '$2y$10$kRfcb89eyJa85XlavcCxXOo4GZOeoYCTmSc5ZhRaBdz8Wl8NHZiu.', '16.png', NULL, '5877, Dhaka, Bangladesh', NULL, NULL, '2023-06-01 06:06:58', '2023-06-01 07:12:06'),
(17, 'lytufaru', 'hamim@gmail.com', '$2y$10$q84tyCS7zzhm6hb64YmY1eb6Cm/ROM4uy4d9tm/Nthg98YBfg2Hg6', NULL, NULL, NULL, NULL, NULL, '2023-08-14 09:59:05', '2023-08-14 09:59:05'),
(18, 'fupagyv', 'tetejawoko@mailinator.com', '$2y$10$jmSXifDNBd36r0qi.xjwoO7ra0vm8sluwyX5rZCy2M3tEYyohDA7S', NULL, NULL, NULL, NULL, NULL, '2023-08-22 06:11:07', '2023-08-22 06:11:07'),
(19, 'C-zotaniqyse-tgffd-2063', 'typoh@mailinator.com', '$2y$10$JTzkP6eXcGxpE/lvAzmJWeKxRLGYZG0X.s.8bS/TpLMu5TUrq9Zre', NULL, NULL, NULL, NULL, NULL, '2023-08-23 10:42:56', '2023-08-23 10:42:56'),
(20, 'tupacod-fdf-4130', 'jifukukywy@mailinator.com', '$2y$10$LEKRCsT1mF5D0.5WmF29LOuC.Vw3b8ZulZzU7I0GhiSAejv076FP2', NULL, NULL, NULL, NULL, NULL, '2023-08-23 10:44:10', '2023-08-23 10:44:10'),
(21, 'gegyzov_vggg-3614', 'zaci@mailinator.com', '$2y$10$7FwcnEYC0c3gzPf90hlBKuTOv6CjpVp/4cFv2tqhBpufnPcrBiPqS', NULL, NULL, NULL, NULL, NULL, '2023-08-23 10:54:25', '2023-08-23 10:54:26'),
(22, 'fahim-3942', 'fahim@gmail.com', '$2y$10$Ncaly7OI.OqhK7yl90kzZuylu4NwhlChCV0gw1ZKEnlyMyV9u6CDq', NULL, NULL, NULL, NULL, NULL, '2023-08-24 07:21:37', '2023-08-24 07:21:37'),
(23, 'nur', 'nur@gmail.com', '$2y$10$fgyrQws9m5TqF0j.T.Zb5.AJKeFTnwY2uiq5uMoY/U4U/jtlTx2Ji', NULL, NULL, NULL, NULL, NULL, '2023-08-24 07:50:56', '2023-08-24 07:50:56'),
(24, 'xujuw', 'hamim947@gmail.com', '$2y$10$MBNNbNjItFaTY/9fF5qO6egM6IIx5l5RhXCKFmqqkCOxAh0CpI6q2', NULL, NULL, NULL, NULL, NULL, '2023-08-24 13:34:35', '2023-08-24 13:34:35'),
(25, 'lajetehub', 'hamim.techweb@gmail.com', '$2y$10$mqjfIvBFY/8Vcmnw8wnAuexu3I9KH9XxuCdBosnd8/LpD4UPDW9/O', NULL, NULL, NULL, NULL, NULL, '2023-08-26 05:24:45', '2023-08-26 05:24:45'),
(26, 'wikagalebi', 'quhoqaq@mailinator.com', '$2y$10$vborABgs7JrxP0E.C1FbPevQvuRIMTxVkvUCDsJdEOEQ5hFhAwcjK', NULL, NULL, NULL, NULL, NULL, '2023-09-02 13:37:35', '2023-09-02 13:37:35'),
(27, 'kojob', 'kiwyqiw@mailinator.com', '$2y$10$X9kSk3ZK47oLp2sLtUfMFub.fqWxRHo676uHQOzz8ml/MFbXdJ2z2', NULL, NULL, NULL, NULL, NULL, '2023-09-04 05:12:02', '2023-09-04 05:12:02'),
(28, 'behama', 'hebut@mailinator.com', '$2y$10$X5l/S4ynEaxx75UXpjkeTuHR.HJGVW5ieLm2xrSiWSbg1MFehyURe', NULL, NULL, NULL, NULL, NULL, '2023-09-21 07:03:03', '2023-09-21 07:03:03'),
(30, 'hatij', 'kepuben@mailinator.com', '$2y$10$lm6/1xAaCMBw2oWOz.6hoenHaU0DYXz.Q4Wu9dSydj9i5gPWtL9I2', NULL, NULL, NULL, NULL, NULL, '2023-09-24 06:05:37', '2023-09-24 06:05:37'),
(31, 'xikaxahy', 'kiruhyzy@mailinator.com', '$2y$10$93ehuM1HgZI6/LiLv05vGumvgW0smMWfm8mINqTnbrP3i5743oiCe', NULL, NULL, NULL, NULL, NULL, '2023-09-24 07:30:42', '2023-09-24 07:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `added_by`, `sku`, `color_id`, `size_id`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(74, 22, 'ZU49VOR', 3, 0, 63, 4, '2023-05-20 13:18:42', '2023-11-08 11:01:36'),
(79, 22, 'ERE398', 7, 2, 53, 3, '2023-05-27 07:07:32', '2023-11-08 06:09:14'),
(80, 22, 'ERE399', 7, 5, 96, 3, '2023-05-27 07:07:32', '2023-11-08 06:09:14'),
(110, 26, 'HA345d', 3, 7, 20, 7, '2023-05-30 06:07:32', '2023-11-08 11:01:36'),
(111, 26, 'HA432s', 6, 7, 78, 7, '2023-05-30 06:07:32', '2023-11-08 11:01:36'),
(112, 26, 'CM34ed', 0, 2, 77, 8, '2023-05-30 06:07:49', '2023-08-14 12:46:14'),
(113, 26, 'CM34ee', 0, 7, 90, 8, '2023-05-30 06:07:49', '2023-05-30 06:07:49'),
(114, 26, 'CM34ef', 0, 0, 38, 8, '2023-05-30 06:07:49', '2023-09-02 07:47:19'),
(119, 20, 'SAR333', 3, 2, 60, 1, '2023-06-01 13:56:15', '2023-10-04 12:47:19'),
(120, 20, 'SAR234', 2, 0, 83, 1, '2023-06-01 13:56:15', '2023-09-02 13:38:57'),
(121, 20, 'SAR45x', 3, 5, 69, 2, '2023-06-01 13:56:15', '2023-09-23 12:36:56'),
(122, 20, 'SAR3r4', 7, 5, 75, 1, '2023-06-01 13:56:15', '2023-06-01 13:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `login_counts`
--

CREATE TABLE `login_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login_counts`
--

INSERT INTO `login_counts` (`id`, `user_id`, `login_count`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2023-08-20 12:17:36', '2023-08-20 12:19:24');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_05_13_113851_create_categories_table', 2),
(12, '2023_05_13_154331_create_colors_table', 3),
(13, '2023_05_13_173127_create_sizes_table', 4),
(19, '2023_05_13_185616_create_products_table', 5),
(20, '2023_05_14_184358_create_inventories_table', 5),
(22, '2023_05_14_194630_create_product_galleries_table', 6),
(23, '2023_05_16_131827_create_timers_table', 7),
(24, '2023_05_16_145737_create_brands_table', 7),
(28, '2023_05_16_185429_create_products_table', 8),
(30, '2023_05_18_125126_create_permission_tables', 9),
(32, '2023_05_18_183100_create_customer_auths_table', 10),
(53, '2023_05_20_182121_create_carts_table', 11),
(54, '2023_05_23_181219_create_orders_table', 11),
(55, '2023_05_23_190352_create_billingdetails_table', 11),
(56, '2023_05_23_191412_create_order_products_table', 11),
(57, '2023_05_23_192245_create_coupons_table', 11),
(59, '2023_06_01_134410_create_contacts_table', 12),
(63, '2023_06_01_181301_create_contactinfos_table', 13),
(64, '2023_08_20_115205_create_banners_table', 14),
(65, '2023_08_20_174130_create_login_counts_table', 15),
(66, '2023_09_10_115350_create_terms_conditions_table', 16),
(67, '2023_09_10_164037_create_privacy_policies_table', 17),
(68, '2023_11_08_180306_create_settings_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `coupon_price` int(11) DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `product_id`, `quantity`, `price`, `coupon_price`, `charge`, `status`, `created_at`, `updated_at`) VALUES
(1, '#ORDER-21994', 'OctaviaMatthews-7500', 4, 2, 105, NULL, NULL, 1, '2023-11-07 12:09:00', '2023-11-09 19:41:09'),
(2, '#ORDER-22486', 'XanthaGardner-6229', 4, 3, 105, NULL, NULL, 0, '2023-11-07 12:09:50', '2023-11-07 12:09:50'),
(3, '#ORDER-22486', 'XanthaGardner-6411', 7, 3, 12750, NULL, NULL, 0, '2023-11-07 12:09:50', '2023-11-07 12:09:50'),
(4, '#ORDER-99766', 'Caesar-7724', 4, 5, 105, NULL, NULL, 0, '2023-11-08 06:09:14', '2023-11-08 06:09:14'),
(5, '#ORDER-99766', 'Caesar-3227', 3, 1, 120, NULL, NULL, 0, '2023-11-08 06:09:14', '2023-11-08 06:09:14'),
(6, '#ORDER-68744', 'IsaacButler-9163', 7, 1, 12750, NULL, NULL, 0, '2023-11-08 11:01:36', '2023-11-08 11:01:36'),
(7, '#ORDER-68744', 'IsaacButler-4292', 4, 1, 105, NULL, NULL, 0, '2023-11-08 11:01:36', '2023-11-08 11:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `coupon_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `customer_id`, `charge`, `coupon_price`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, '#ORDER-21994', 'OctaviaMatthews-8625', 80, NULL, NULL, 1, '2023-11-07 12:09:00', '2023-11-09 19:41:09'),
(2, '#ORDER-22486', 'XanthaGardner-9648', 150, NULL, NULL, 0, '2023-11-07 12:09:50', NULL),
(3, '#ORDER-99766', 'Caesar-7887', 80, NULL, NULL, 0, '2023-11-08 06:09:14', NULL),
(4, '#ORDER-68744', 'IsaacButler-2016', 80, NULL, NULL, 0, '2023-11-08 11:01:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<h5 class=\"font-weight-bold\" style=\"margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; padding: 0px; line-height: 1.2; font-size: 1.25rem; font-family: sans-serif;\">Delivery Policy</h5><div class=\"p-2\" style=\"margin: 0px; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><div class=\"col-sm-6\" style=\"margin: 0px; padding: 0px 15px; width: 554px; float: left; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><h3 style=\"margin: 20px 0px 10px; padding: 0px; font-size: 24px; font-family: inherit; color: inherit;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">আপনি ঢাকা সিটির ভীতরে হলেঃ-</span></h3><div class=\"col-sm-12\" style=\"margin: 0px; padding: 0px 15px; width: 524px; float: left;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;ক্যাশ অন ডেলিভারি/হ্যান্ড টু হ্যান্ড ডেলিভারি।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;ডেলিভারি চার্জ 80 টাকা।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;পণ্যের টাকা ডেলিভারি ম্যানের কাছে প্রদান করবেন।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;অর্ডার কনফার্ম করার পরবর্তী ১/২ দিনের ভিতর ডেলিভারি পাবেন।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে ডেলিভারি চার্জ 80 টাকা ডেলিভারি ম্যানকে প্রদান করতে বাধ্য থাকিবেন।</p></div></div><div class=\"col-sm-6\" style=\"margin: 0px; padding: 0px 15px; width: 554px; float: left; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><h3 style=\"margin: 20px 0px 10px; padding: 0px; font-size: 24px; font-family: inherit; color: inherit;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">আপনি ঢাকা সিটির বাহীরে হলেঃ-</span></h3><div class=\"col-sm-12\" style=\"margin: 0px; padding: 0px 15px; width: 524px; float: left;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;কন্ডিশন বুকিং অন কুরিয়ার সার্ভিস (Pathao, Redx, Steadfast কুরিয়ার এর মাধ্যমে হোম ডেলিভারি দিয়ে থাকি)।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;কুরিয়ার সার্ভিস চার্জ&nbsp;150 টাকা বিকাশ/নগদ/রকেট এর মাধ্যমে অগ্রিম প্রদান করতে হবে।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;কুরিয়ার চার্জ 150 টাকা বিকাশ/নগদ/রকেট এ পেমেন্ট করার পরবর্তী ২/৩ দিনের ভিতর কুরিয়ার আপনার পন্য ডেলিভারি দিয়ে আসবে, এবং পন্যের টাকা রাইডারের কাছে প্রদান করিবেন।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;বিঃদ্রঃ- ছবি এবং বর্ণনার সাথে পণ্যের মিল থাকা সত্যেও আপনি পণ্য গ্রহন করতে না চাইলে কুরিয়ার চার্জ&nbsp;150 টাকা রাইডারের কাছে প্রদান করে পণ্য আমাদের ঠিকানায় রিটার্ন করবেন। আমরা প্রয়োজনীয় ব্যবস্থা নিব।</p></div></div></div>', '2023-09-10 10:47:51', '2023-11-08 11:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `after_discount` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `preview_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_price`, `product_discount`, `after_discount`, `quantity`, `status`, `preview_image`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Salowar kamiz', 1, 2200, 60, 2140, NULL, 1, 'salowar-kamiz-6824.webp', 'salowar-kamiz-6812', '<p>dsafdf           adfadsdsdsdsdsdsdsdsdsdsdsdsds aedrfdf<span style=\"font-size: 14.304px;\">dsafdf           adfadsdsdsdsdsdsdsdsdsdsdsdsds aedrfdf</span></p>', '2023-05-17 06:05:05', '2023-06-01 13:56:15'),
(2, 'HATIL Fixed Chair Brantley-145', 3, 1200, NULL, 1200, NULL, 1, 'hatil-fixed-chair-brantley-145-1027.jpg', 'hatil-fixed-chair-brantley-145-2770', '<ul style=\"margin-bottom: 10px; color: rgb(59, 58, 60); font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249); list-style-type: circle;\"><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Made from Powder coated mild steel  </span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt; text-align: justify;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">High quality fabric upholstery with soft and durable cushioning. Fabric can be selected from available options</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Metal Inert Gas (MIG) welding for superior quality and durability</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Cutting and bending are done by latest Japanese CNC machine with 99.99% accuracy</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Please refer to images for dimension details</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Imported high quality hardware fittings</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Indoor use only</span></span></span></span></span></li></ul>', '2023-05-17 12:07:43', '2023-05-30 06:07:05'),
(3, 'Fresh Organic Broccoli Crowns', 4, 120, NULL, 120, NULL, 1, 'fresh-organic-broccoli-crowns-8131.jpg', 'fresh-organic-broccoli-crowns-6459', '<p style=\"font-family: Inter, sans-serif; font-size: 0.9375rem; letter-spacing: 0px; line-height: 1.8; color: rgb(32, 36, 53);\">Quisque varius diam vel metus mattis, id aliquam diam rhoncus. Proin vitae magna in dui finibus malesuada et at nulla. Morbi elit ex, viverra vitae ante vel, blandit feugiat ligula. Fusce fermentum iaculis nibh, at sodales leo maximus a. Nullam ultricies sodales nunc, in pellentesque lorem mattis quis. Cras imperdiet est in nunc tristique lacinia. Nullam aliquam mauris eu accumsan tincidunt. Suspendisse velit ex, aliquet vel ornare vel, dignissim a tortor.</p><p style=\"font-family: Inter, sans-serif; font-size: 0.9375rem; letter-spacing: 0px; line-height: 1.8; color: rgb(32, 36, 53);\">Morbi ut sapien vitae odio accumsan gravida. Morbi vitae erat auctor, eleifend nunc a, lobortis neque. Praesent aliquam dignissim viverra. Maecenas lacus odio, feugiat eu nunc sit amet, maximus sagittis dolor. Vivamus nisi sapien, elementum sit amet eros sit amet, ultricies cursus ipsum. Sed consequat luctus ligula. Curabitur laoreet rhoncus blandit. Aenean vel diam ut arcu pharetra dignissim ut sed leo. Vivamus faucibus, ipsum in vestibulum vulputate, lorem orci convallis quam, sit amet consequat nulla felis pharetra lacus. Duis semper erat mauris, sed egestas purus commodo vel.</p>', '2023-05-18 07:56:11', '2023-05-27 07:07:32'),
(4, 'All Natural Italian-Style Chicken Meatballs', 4, 120, 15, 105, NULL, 1, 'all-natural-italian-style-chicken-meatballs-6867.jpg', 'all-natural-italian-style-chicken-meatballs-5121', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><h1 style=\"font-family: Inter, sans-serif; font-size: 0.9375rem; letter-spacing: 0px; line-height: 1.8; color: rgb(32, 36, 53);\"><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p></h1>', '2023-05-18 08:38:34', '2023-05-20 13:18:42'),
(7, 'HATIL File Rack Ophelia-103', 3, 14000, 1250, 12750, NULL, 1, 'hatil-file-rack-ophelia-103-5786.jpg', 'hatil-file-rack-ophelia-103-6979', '<ul style=\"margin-bottom: 10px; color: rgb(59, 58, 60); font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249); list-style-type: circle;\"><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Made from Kiln-dried imported Beech wood and veneered engineered wood.</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">High quality environment friendly Italian Ultra Violet (UV) and Polyurethane (PU) Lacquer in antique finish</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Please refer to images for dimension details</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Any assembly or installation required will be done by the HATIL team at the time of delivery (one day after delivery for CKD items)</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Imported high quality hardware fittings</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Indoor use only</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Weight 18.50</span></span></span><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\"> Kgs</span></span></span></span></span></li><li style=\"margin: 0in 0in 0.0001pt;\"><span style=\"background: white;\"><span style=\"line-height: 18pt;\"><span style=\"font-size: 11.5pt;\"><span style=\"font-family: Arial, sans-serif;\"><span style=\"color: black;\">Most of our furniture is made of natural components, which will have natural differences in grain construction and occasional minor blemish.</span></span></span></span></span></li></ul>', '2023-05-21 12:01:43', '2023-05-30 06:07:32'),
(8, 'TexHoo Mini PC Computer Intel Core i7 i5 Processador', 5, 20000, 3000, 17000, NULL, 1, 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-8189.webp', 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-6162', '<p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span data-spm-anchor-id=\"a2g0o.detail.1000023.i2.45d43bcdbchq4C\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">Warranty:</span></p><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">1. Before you receives the goods, we go through three strict quality inspections, assembly testing, warehousing quality testing, and factory quality testing.</span></p><div align=\"start\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: medium; color: rgb(0, 0, 0); border: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></div><div class=\"detailmodule_html\" align=\"start\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; font-size: 14px; font-family: \"Open Sans\", sans-serif; color: rgb(0, 0, 0); border: 0px;\"><div class=\"detail-desc-decorate-richtext\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; border: 0px;\"><p class=\"MsoNormal\" style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: inherit; padding: 0px; border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: arial, helvetica, sans-serif;\">2. We provide 12-month warranty for the all hardware of each product under normal use, Motherboard, RAM, ROM we provide 3 years warranty, excluding damage caused by intentional damage, accidents, product misuse, or any unauthorized personnel attempting to repair or upgrade. Please provide us with a video proof, and we will provide a replacement after confirming the problem.</span></p></div></div><div align=\"start\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: medium; color: rgb(0, 0, 0); border: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></div><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">Feedback and comments:</span></p><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">1. If you are satisfied with our products and services, please leave a 5-star praise.</span></p><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">2. Please contact us before leaving a bad review. We will do our best to provide you with support and provide satisfactory solutions.</span></p><p class=\"MsoNormal\" align=\"start\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-size: medium; line-height: inherit; padding: 0px; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">3. Negative feedback or low DSR will not solve any potential problems. If you have any questions, please contact us by message first, so that we have the opportunity to make reasonable rectifications within a reasonable time. We will respond as soon as possible, and we are willing to solve the problem.</span></p><div align=\"start\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: medium; color: rgb(0, 0, 0); border: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></div><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">About taxation:</span></p><div align=\"start\" style=\"box-sizing: content-box; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: medium; color: rgb(0, 0, 0); border: 0px;\"><br style=\"-webkit-tap-highlight-color: transparent; outline: 0px;\"></div><p class=\"p\" align=\"left\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: transparent; outline: 0px; margin: 0pt 0pt 0pt 0px; font-size: medium; line-height: inherit; padding: 0pt 0pt 0pt 0em; font-family: \"Open Sans\", Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); border: 0px;\"><span style=\"-webkit-tap-highlight-color: transparent; outline: 0px; margin: 0px; padding: 0px; max-width: 100%; word-break: break-word; font-size: 14pt; font-family: Arial;\">1. Our prices do not include destination import duties and value-added tax, etc. Import customs clearance is the sole responsibility of the buyer. In order to avoid customs clearance issues, the seller declares \"Mini PC\" and defaults to the true value.</span></p>', '2023-05-21 12:15:39', '2023-05-30 06:07:49'),
(13, 'tal', 11, 5000, 18, 4982, 200, 1, 'xanthus-fitzgerald-8954.jpg', 'tal-4456', 'bbbbbbbbbbbbbb', '2023-11-08 07:16:03', '2023-11-08 08:24:30'),
(14, 'Clinton Hurst', 6, 213, 96, 117, 939, 1, 'clinton-hurst-6268.jpg', 'Gd2Ypnp', 'aaaaaaaaaaaa', '2023-11-08 10:25:12', '2023-11-08 10:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `gallery_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(5, 2, 'hatil-fixed-chair-brantley-145-5606.jpg', '2023-05-17 12:07:43', NULL),
(6, 2, 'hatil-fixed-chair-brantley-145-1665.jpg', '2023-05-17 12:07:43', NULL),
(7, 1, 'salowar-kamiz-2169.webp', NULL, '2023-05-17 12:25:34'),
(8, 1, 'salowar-kamiz-7938.webp', NULL, '2023-05-17 12:25:34'),
(9, 1, 'salowar-kamiz-4120.webp', NULL, '2023-05-17 12:25:34'),
(10, 1, 'salowar-kamiz-7882.webp', NULL, '2023-05-17 12:25:34'),
(11, 3, 'fresh-organic-broccoli-crowns-9290.jpg', '2023-05-18 07:56:12', NULL),
(12, 3, 'fresh-organic-broccoli-crowns-7119.jpg', '2023-05-18 07:56:12', NULL),
(13, 4, 'all-natural-italian-style-chicken-meatballs-3027.jpg', '2023-05-18 08:38:34', NULL),
(14, 4, 'all-natural-italian-style-chicken-meatballs-8367.jpg', '2023-05-18 08:38:34', NULL),
(15, 4, 'all-natural-italian-style-chicken-meatballs-4432.jpg', '2023-05-18 08:38:34', NULL),
(16, 5, 'hatil-file-rack-ophelia-103-9769.jpg', '2023-05-21 11:53:57', NULL),
(17, 5, 'hatil-file-rack-ophelia-103-1128.jpg', '2023-05-21 11:53:57', NULL),
(18, 5, 'hatil-file-rack-ophelia-103-9730.jpg', '2023-05-21 11:53:57', NULL),
(19, 7, 'hatil-file-rack-ophelia-103-8514.jpg', '2023-05-21 12:01:43', NULL),
(20, 7, 'hatil-file-rack-ophelia-103-9594.jpg', '2023-05-21 12:01:44', NULL),
(21, 7, 'hatil-file-rack-ophelia-103-2787.jpg', '2023-05-21 12:01:44', NULL),
(22, 8, 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-7145.webp', '2023-05-21 12:15:39', NULL),
(23, 8, 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-1456.webp', '2023-05-21 12:15:39', NULL),
(24, 8, 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-7966.webp', '2023-05-21 12:15:40', NULL),
(25, 8, 'texhoo-mini-pc-computer-intel-core-i7-i5-processador-5004.webp', '2023-05-21 12:15:41', NULL),
(34, 13, 'xanthus-fitzgerald-6230.jpg', NULL, '2023-11-08 08:22:23'),
(35, 14, 'clinton-hurst-4189.jpg', '2023-11-08 10:25:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `name`, `email`, `phone`, `address`, `footer`, `title`, `meta_title`, `meta_tag`, `meta_description`, `about`, `created_at`, `updated_at`) VALUES
(1, 'aYRb146498.png', 'kZbzp121993.png', 'farazzimart', 'farazzimart@mailinator.com', '01876674794', 'farazzimart', 'farazzimart', 'farazzimart', 'farazzimart', 'farazzimart', 'farazzimart', 'farazzimart', NULL, '2023-11-09 19:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(2, 'M', '2023-05-13 11:42:48', NULL),
(3, 'S', '2023-05-14 11:41:56', NULL),
(5, 'XL', '2023-05-14 11:42:10', NULL),
(6, 'XXL', '2023-05-14 11:42:13', NULL),
(7, 'L', '2023-05-14 11:42:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_conditions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `terms_conditions`, `created_at`, `updated_at`) VALUES
(1, '<div class=\"p-2\" style=\"margin: 0px; font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" \"noto=\"\" sans\",=\"\" \"liberation=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" \"segoe=\"\" ui=\"\" symbol\",=\"\" emoji\";=\"\" font-size:=\"\" 16px;\"=\"\"><h4 style=\"margin: 10px 0px; padding: 0px; font-size: 18px; font-family: raleway, sans-serif; color: rgb(51, 51, 51);\"><span class=\"fa fa-th\" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;<span style=\"margin: 0px; padding: 0px; font-weight: bolder;\">বিক্রিত পণ্য ফেরত নেয়া হয় না তবে নিন্ম লিখিত ক্ষেত্রে পণ্য সার্ভিসিং পন্য পরিবর্তন বা মুল্য ফেরত প্রযোজ্য।</span></h4><div class=\"col-sm-12\" style=\"margin: 0px; padding: 0px 15px; width: 1078px; float: left; color: rgb(51, 51, 51); font-family: raleway, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;আপনার যত প্রশ্ন আছে তা বর্ননার সাথে মিলিয়ে অথবা আমাদের কাছ থেকে জেনে পন্য অর্ডার করুন।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;ছবি এবং বর্ণনার সাথে পন্যের মিল থাকলে পণ্য ফেরত নেয়া হবে না ।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;তবে আপনি চাইলে আপনার গ্রহন করা পন্যের সম মুল্যের কি বা বেশি মুল্যের পণ্য নিতে পারবেন (যে টাকা বেশি হবে তা প্রদান করতে হবে ) ।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;কম মুল্যের পণ্য নেয়া যাবে না ।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;পণ্য আনা নেয়ার খরচ আপনাকে দিতে হবে।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;যে সকল পন্যে ওয়ারেন্টি আছে তার ওয়ারেন্টি সার্ভিস আমরা প্রদান করবো।তবে কিছু কিছু ক্ষেত্রে পন্যের ব্রান্ড আপনাকে সার্ভিস প্রদান করবে তবে সে ক্ষেত্রে আপনার নিকটস্থ সার্ভিস পয়েন্ট থেকে সার্ভিস নিতে পারবেন।</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: sans-serif; color: rgb(102, 102, 102); line-height: 21px;\"><span class=\"fa  fa-arrow-circle-right \" style=\"margin: 0px; padding: 0px; font-family: FontAwesome; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: normal; font-stretch: normal; font-size: inherit; transform: translate(0px, 0px); color: red;\"></span>&nbsp;পণ্য সার্ভিস করতে যাওয়া আসা বা পাঠানো এবং রিটার্ন করার খরজ আপনাকে বহন করতে হবে।</p></div></div>', '2023-09-10 09:27:32', '2023-11-08 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `timers`
--

CREATE TABLE `timers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `address`, `description`, `mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Caesar da', 'hamim@gmail.com', NULL, '$2y$10$zLe9vM27QYdR1Pi88Bf3wu10cLD5020G0T9sLWmWNOis6BB/wxGIC', '3.jpg', 'dhaka,bangladesh', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor', NULL, NULL, '2023-05-11 05:03:18', '2023-09-23 11:31:34'),
(4, 'Evangeline Jenkins', 'dexe@mailinator.com', NULL, '$2y$10$6/lq6meQdYBNI2C2M1VWLuK5fmOR/epXAO/0f.5e1AlNbnJ0LkwDe', NULL, NULL, NULL, NULL, NULL, '2023-05-11 06:01:49', '2023-05-13 05:10:54'),
(7, 'Joan Payne', 'vumakuxip@mailinator.com', NULL, '$2y$10$SlTh3saVf//5Ug7jv3jYE.TNET8ENIUo5j6n8qIvAc.xKAZ/dnFmG', NULL, NULL, NULL, NULL, NULL, '2023-05-11 09:28:10', NULL),
(8, 'admin', 'sarweb@gmail.com', NULL, '$2y$10$5i66zOSkx00ZuHGvjkuNGuobMqs.0ibqI/6KP0AfCbHaG03VpkxA6', NULL, NULL, NULL, NULL, NULL, '2023-05-11 11:18:11', '2023-05-11 12:48:51'),
(10, 'Kieran Anderson', 'sypobele@mailinator.com', NULL, '$2y$10$TxEV56eqx7qdc.LzLHLHbe5BlX/xDQnjAvVvD/QBtd64bVfBTZAOO', NULL, NULL, NULL, NULL, NULL, '2023-05-11 12:35:28', '2023-05-11 12:40:47'),
(11, 'Amber Gordon', 'ziwa@mailinator.com', NULL, '$2y$10$QcX45mJpJmmBcdgn81Gd1.VOj6rnoE3N5tr95a141nEQGc8w/F7we', NULL, NULL, NULL, NULL, NULL, '2023-05-11 12:38:11', '2023-05-11 12:38:11'),
(12, 'Laith French', 'difeg@mailinator.com', NULL, '$2y$10$cm4nxgCs12fLJKxNvrgK4.wlol2rtBfZvHGrhQ3bBuJeJHt/T0PZO', NULL, NULL, NULL, NULL, NULL, '2023-05-11 12:42:03', '2023-05-11 12:42:03'),
(13, 'Naida Zimmerman', 'xumyqygyv@mailinator.com', NULL, '$2y$10$eTLn.tg5qJuUKkJiCSeE1uMN1VPDtwrxWGpKCV6J7HpPhVWl5vPJ2', NULL, NULL, NULL, NULL, NULL, '2023-05-11 12:42:30', NULL),
(14, 'Ora Hull', 'gyfy@mailinator.com', NULL, '$2y$10$KPdt/smFNHJV7ObOdhY52ef94aj4kSSCENfCP5oldjwk6Soh9jkdK', NULL, NULL, NULL, NULL, NULL, '2023-05-13 05:09:20', '2023-05-13 05:09:20'),
(16, 'admin', 'nur@nur.com', NULL, '$2y$10$wbVzlkpvLdcwx3f6Fatdn.HVjttxrd4otC6xQBMtQgqkv09IKwKcW', NULL, NULL, NULL, NULL, NULL, '2023-05-13 11:37:42', '2023-05-13 11:37:42'),
(18, 'Honorato Buchanan', 'sinetuwiv@mailinator.com', NULL, '$2y$10$VomlKysd7rsA1aToumkQAOOBsGpklFUZDIqQtasVN91oJ5mCacPC2', NULL, NULL, NULL, NULL, NULL, '2023-05-15 06:05:31', '2023-05-15 06:05:31'),
(19, 'Fallon Ellison', 'jiwunydef@mailinator.com', NULL, '$2y$10$WZVNGKPy7ywNEoITvdyH0Og.Pu3tyEUoH6JSNXn5RhfZdb4KsBx5u', NULL, NULL, NULL, NULL, NULL, '2023-05-16 05:19:09', '2023-05-16 05:19:09'),
(20, 'Alexa Duffy', 'wesa@mailinator.com', NULL, '$2y$10$bcZSbmU7VmGb1zQMBRlPtOd8O69.sMK5PlIuC2B7d.rArwmW7I1z.', NULL, NULL, NULL, NULL, NULL, '2023-05-17 05:30:42', '2023-05-17 05:30:42'),
(21, 'Merrill Park', 'paly@mailinator.com', NULL, '$2y$10$39ieCHCNaaZyypHUGk4b5uOGtIEkmJCINo50VuOdVisOykpz.PvC.', NULL, NULL, NULL, NULL, NULL, '2023-05-17 06:57:01', '2023-05-17 06:57:01'),
(22, 'Lillith Butler', 'kyvizizam@mailinator.com', NULL, '$2y$10$IZruxFxg4gyP8u6U3JlmZucpSCoiDnKfeBYyw9aLlvz2EK/0vnAQq', NULL, NULL, NULL, NULL, NULL, '2023-05-18 06:12:31', '2023-05-18 06:12:31'),
(23, 'sar', 'sa1r@gmail.com', NULL, '$2y$10$wNVKCZna96MN8TdggyQm6.ZTGqFuXzX97ehLW5BLQuisW1oJ6Lmy.', NULL, NULL, NULL, NULL, NULL, '2023-05-18 07:24:37', '2023-05-18 07:24:37'),
(24, 'Joan Williamson', 'ruri@mailinator.com', NULL, '$2y$10$4xXS4kwVVFMP6j5PUqpymeQJmItBhkSC31WPnGLNUQlHCvc5mG7N6', NULL, NULL, NULL, NULL, NULL, '2023-05-20 05:26:12', '2023-05-20 05:26:12'),
(25, 'Pamela Mcbride', 'zynefedo@mailinator.com', NULL, '$2y$10$2WYeN97toDQ4vDwNZec7PekCR4jqazmIxTa50DgevbV0rEzq72HKu', NULL, NULL, NULL, NULL, NULL, '2023-05-20 12:10:56', '2023-05-20 12:10:56'),
(26, 'Oscar Thornton', 'jozewivol@mailinator.com', NULL, '$2y$10$KLIikVXqJxqzVL7U4hzpxePX2gljyLgjX1KRkqCP43MVhzEpCcVGa', NULL, NULL, NULL, NULL, NULL, '2023-05-21 06:02:12', '2023-05-21 06:02:12'),
(27, 'Cameron Phelps', 'xyfipikuz@mailinator.com', NULL, '$2y$10$orrSWilLT6RxZJQRnyPhd.7KY6VhJ7PU0ogVvWbLIMTqcB7YNQE7S', NULL, NULL, NULL, NULL, NULL, '2023-05-23 13:27:19', '2023-05-23 13:27:19'),
(28, 'Fritz Cole', 'herydu@mailinator.com', NULL, '$2y$10$RWD1nvx83y5Coo/riJu2oeZ04jDyuySXEdgZQR7byuQnTw.KtssGC', NULL, NULL, NULL, NULL, NULL, '2023-05-25 06:01:25', '2023-05-25 06:01:25'),
(29, 'Geraldine Mcconnell', 'safo@mailinator.com', NULL, '$2y$10$qm4uRejcSC8QXLVskJVoZeKC/EVRNzeHIAknh/Ox3uLws2yWIcw4i', NULL, NULL, NULL, NULL, NULL, '2023-05-27 06:39:46', '2023-05-27 06:39:46'),
(30, 'Lyle Blankenship', 'jacaxeki@mailinator.com', NULL, '$2y$10$Uk7LzRTJk4YBBwecXZw4AuGnwYy9Gu63uscAaTZOaqBM4NwNy0o.G', NULL, NULL, NULL, NULL, NULL, '2023-05-28 05:43:17', '2023-05-28 05:43:17'),
(31, 'Ryan Forbes', 'kazofi@mailinator.com', NULL, '$2y$10$kPqnoFzd/xNcBXT6F9mXMur.V5eN9mPMd9I9xspXtJu9tNmyZcN4S', NULL, NULL, NULL, NULL, NULL, '2023-05-29 07:57:40', '2023-05-29 07:57:40'),
(32, 'Axel Gentry', 'litutikity@mailinator.com', NULL, '$2y$10$PmyrPbhBI1vr4GeCcxGtU.QQzqyKMrxywMg4MC5oWdvIVgp1pvlWm', NULL, NULL, NULL, NULL, NULL, '2023-05-29 09:27:12', '2023-05-29 09:27:12'),
(33, 'Igor Lawson', 'fawytajemo@mailinator.com', NULL, '$2y$10$jGLB.PBPF2jnXrGHGg3OZuXFNnL0zkNtU05d3Z1kUadpJ0LB4JcXC', NULL, NULL, NULL, NULL, NULL, '2023-05-30 06:06:39', '2023-05-30 06:06:39'),
(34, 'Dennis Fuller', 'pafalif@mailinator.com', NULL, '$2y$10$.6/ewWtgN4/F7uH9MTJrxOdtzId.OJ2GYK1YtlXRq.ta5dhZXKRLm', NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:18:12', '2023-05-31 09:18:12'),
(35, 'Melodie Stephenson', 'bezodexeqa@mailinator.com', NULL, '$2y$10$Q81ThO09SDuZjc93bIKLsulfI.LlDXNL4JFQjefGzZd7/kLQqyWZa', NULL, NULL, NULL, NULL, NULL, '2023-05-31 10:36:40', NULL),
(36, 'Penelope Cantu', 'zyfik@mailinator.com', NULL, '$2y$10$Bvjo.MRChB4mTtvfNNGgsuXtqR9NRcaTP4jlye4kgjBlNy5Rs5Fqm', NULL, NULL, NULL, NULL, NULL, '2023-06-01 06:27:39', '2023-06-01 06:27:39'),
(37, 'Zoe Franks', 'sutop@mailinator.com', NULL, '$2y$10$Zc7/Blal3ErWdICQ6XhG7Orb0yaJw6RFMx4eK1Uc1kC3legS2vZ0C', NULL, NULL, NULL, NULL, NULL, '2023-06-01 13:55:55', '2023-06-01 13:55:55'),
(38, 'Nur Islam', 'nugortech@gmail.com', NULL, '$2y$10$nxcSgqp9XwOq8Xj6jyElEeIm832mmS3C8XbLR17aG8rDS.40OZZcS', '38.jpg', NULL, NULL, NULL, NULL, '2023-06-02 16:58:47', '2023-06-02 17:02:02'),
(41, 'John Doe', 'john@example.com', NULL, '$2y$10$w2iJy0qBfvTUwdNXwTZZQuPm8q7Ca3EG2K01V6dFuAZ0G/NFRBNjy', NULL, NULL, NULL, NULL, NULL, '2023-08-20 12:17:36', '2023-08-20 12:17:36'),
(42, 'Aretha Lee', 'byqekiwy@mailinator.com', NULL, '$2y$10$X6tGwW26YPcIestxyam86O1k/UTl7zub3yffsYuGytaPYp8FDE1JS', NULL, NULL, NULL, NULL, NULL, '2023-11-09 19:20:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billingdetails`
--
ALTER TABLE `billingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfos`
--
ALTER TABLE `contactinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_auths`
--
ALTER TABLE `customer_auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_auths_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_counts`
--
ALTER TABLE `login_counts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_counts_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
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
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timers`
--
ALTER TABLE `timers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `billingdetails`
--
ALTER TABLE `billingdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactinfos`
--
ALTER TABLE `contactinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_auths`
--
ALTER TABLE `customer_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `login_counts`
--
ALTER TABLE `login_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timers`
--
ALTER TABLE `timers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_counts`
--
ALTER TABLE `login_counts`
  ADD CONSTRAINT `login_counts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
