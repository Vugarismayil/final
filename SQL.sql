-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 22 Mar 2019, 19:09:07
-- Sunucu sürümü: 10.2.19-MariaDB-cll-lve
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webkraln_demos`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mutasim.ewu@gmail.com', 'admin', '$2y$10$bLJDX94jRWrk3IbD9.RIvOLZwZf1K9116hhkZH7dyCDmXf2k.1kIC', '3dAA7bVSK3QUmQlrLa0eb4vkhOkYYzGtrbvqM8aYjJYnL8wBm5VGbTfT8CEb', NULL, '2019-02-25 04:59:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `announcements`
--

INSERT INTO `announcements` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '5bc5a918c1516.jpg', 'Smm Panel Hizmetleri', '<p>Sizde hemen bir smm panel satın alarak kendi sosyal medyanızın patronu olabilirsiniz.Bu tema api sistemi ile çalışmakta olup tüm kontroller admin panelinden sağlanmaktadır. </p>\r\n                        <p>Sosyal medyada popüler olmak takipçi ve beğeni arttırmak için hemen smm panel temasını satın alarak kazanç sağlama şansını yakalayabilirsiniz..</p>\r\n                        <blockquote class=\"blockquote\">\r\n                            <p>Bu temada tüm sosyal medya araçlarını kullanma şansınız bulunmaktadır.Api satın alarak sosyal medya araçlarını ücretli satabilirsiniz.Müşterilerinize hızlı ve güvenilir bir smm panel sunabilirsiniz. </p>\r\n                            <h4 class=\"name\">- MersinWebSoft</h4>\r\n                        </blockquote>        \r\n                        <p>SMM Panel temalarımız tamamen güvenlikli ve herhangi bir açık,bug olmayan yazılım olarak hızlı ve en çok tercih edilen temalar arasında yer almaktadır.Müşterilerinize Sosyal Medya Hizmetlerini sunmak için bu paneli satın alabilirsiniz.Api hizmeti ile sosyal medya için beğeni,izlenme,takipçi gibi modülleri kullanarakk para kazanabilirsiniz..</p>', '2018-10-16 03:02:16', '2019-01-22 06:18:21'),
(2, '5bc5a918c1516.jpg', 'Api Sistemi SMM', '<p>Sizde hemen bir smm panel satın alarak kendi sosyal medyanızın patronu olabilirsiniz.Bu tema api sistemi ile çalışmakta olup tüm kontroller admin panelinden sağlanmaktadır. </p>\r\n                        <p>Sosyal medyada popüler olmak takipçi ve beğeni arttırmak için hemen smm panel temasını satın alarak kazanç sağlama şansını yakalayabilirsiniz..</p>\r\n                        <blockquote class=\"blockquote\">\r\n                            <p>Bu temada tüm sosyal medya araçlarını kullanma şansınız bulunmaktadır.Api satın alarak sosyal medya araçlarını ücretli satabilirsiniz.Müşterilerinize hızlı ve güvenilir bir smm panel sunabilirsiniz. </p>\r\n                            <h4 class=\"name\">- MersinWebSoft</h4>\r\n                        </blockquote>        \r\n                        <p>SMM Panel temalarımız tamamen güvenlikli ve herhangi bir açık,bug olmayan yazılım olarak hızlı ve en çok tercih edilen temalar arasında yer almaktadır.Müşterilerinize Sosyal Medya Hizmetlerini sunmak için bu paneli satın alabilirsiniz.Api hizmeti ile sosyal medya için beğeni,izlenme,takipçi gibi modülleri kullanarakk para kazanabilirsiniz..</p>', '2018-10-16 03:02:16', '2019-01-22 06:18:34'),
(3, '5bc5a918c1516.jpg', 'Ödeme Kolaylıkları', '<p>Sizde hemen bir smm panel satın alarak kendi sosyal medyanızın patronu olabilirsiniz.Bu tema api sistemi ile çalışmakta olup tüm kontroller admin panelinden sağlanmaktadır. </p>\r\n                        <p>Sosyal medyada popüler olmak takipçi ve beğeni arttırmak için hemen smm panel temasını satın alarak kazanç sağlama şansını yakalayabilirsiniz..</p>\r\n                        <blockquote class=\"blockquote\">\r\n                            <p>Bu temada tüm sosyal medya araçlarını kullanma şansınız bulunmaktadır.Api satın alarak sosyal medya araçlarını ücretli satabilirsiniz.Müşterilerinize hızlı ve güvenilir bir smm panel sunabilirsiniz. </p>\r\n                            <h4 class=\"name\">- MersinWebSoft</h4>\r\n                        </blockquote>        \r\n                        <p>SMM Panel temalarımız tamamen güvenlikli ve herhangi bir açık,bug olmayan yazılım olarak hızlı ve en çok tercih edilen temalar arasında yer almaktadır.Müşterilerinize Sosyal Medya Hizmetlerini sunmak için bu paneli satın alabilirsiniz.Api hizmeti ile sosyal medya için beğeni,izlenme,takipçi gibi modülleri kullanarakk para kazanabilirsiniz..</p>', '2018-10-16 03:02:16', '2019-01-22 06:18:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api_settings`
--

CREATE TABLE `api_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `api_settings`
--

INSERT INTO `api_settings` (`id`, `url`, `key`, `status`, `created_at`, `updated_at`) VALUES
(4, 'https://perfectsmm.com/api/v2', 'cf27640ec9d56b7b44752b5dec0e5452', 1, '2018-08-04 03:24:24', '2018-08-05 08:05:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Instagram Auto Views', '5b6056ecd4d4a.jpg', 1, '2018-07-25 03:16:06', '2018-07-31 06:32:45'),
(2, 'Facebook Auto Likes', '5b6058f5986ac.jpg', 1, '2018-07-25 03:16:46', '2018-07-31 06:41:25'),
(3, 'Snapchat', '5b6056f30ce35.jpg', 0, '2018-07-25 03:26:08', '2018-07-31 06:32:51');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `amount`, `charge`, `usd_amo`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `created_at`, `updated_at`) VALUES
(1, 1, 103, '250', '7.5', '250', NULL, NULL, 'f9InMX5VJ6In', 0, 0, '2019-01-22 09:21:09', '2019-01-22 09:21:09'),
(2, 1, 101, '999', '25.1748', '999', NULL, NULL, 'Fpm7GlKYX55a', 0, 0, '2019-01-22 09:22:55', '2019-01-22 09:22:55'),
(3, 1, 103, '10', '0.3', '10', NULL, NULL, 'lZHI7vLyNm9P', 0, 0, '2019-01-24 11:09:13', '2019-01-24 11:09:13'),
(4, 1, 506, '55', '1.386', '55', '0.47276715', '0x722066940618d93e9de0ec188f1fc6354440c02c', 'G02PR3ohspqR', 0, 0, '2019-01-24 11:15:35', '2019-01-24 11:15:47'),
(5, 1, 103, '99', '2.97', '99', NULL, NULL, '4BPbM9GhsQ6c', 0, 0, '2019-01-24 11:16:05', '2019-01-24 11:16:05'),
(6, 1, 103, '5', '0.15', '5', NULL, NULL, '4m2LDsGrTpHY', 0, 0, '2019-01-24 16:01:24', '2019-01-24 16:01:24'),
(7, 1, 103, '8', '0.24', '8', NULL, NULL, 'RRdIRGouqAiS', 0, 0, '2019-01-25 15:20:00', '2019-01-25 15:20:00'),
(8, 1, 101, '10', '0.252', '10', NULL, NULL, 'zKxz3kItME10', 0, 0, '2019-01-25 15:58:17', '2019-01-25 15:58:17'),
(9, 1, 101, '100', '2.52', '100', NULL, NULL, 'wZeXc1458uGF', 0, 0, '2019-01-27 12:44:26', '2019-01-27 12:44:26'),
(10, 1, 103, '50', '1.5', '50', NULL, NULL, 'xzWbaY4hYaBo', 0, 0, '2019-02-09 19:10:27', '2019-02-09 19:10:27'),
(11, 1, 101, '10', '0.252', '10', NULL, NULL, '9ckyZ0JMQW3p', 0, 0, '2019-02-20 17:26:30', '2019-02-20 17:26:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Instagram Hizmetleri ?', 'Instagram hizmetlerimizde takipçi,beğeni,izlenme,hikaye görüntüleme gibi bir çok aktif servis bulunmaktadır.', '2018-10-15 05:43:30', '2019-01-22 06:19:57'),
(3, 'Facebook Hizmetleri', 'Facebook hizmetlerimizde takipçi,beğeni,izlenme,hikaye görüntüleme gibi bir çok aktif servis bulunmaktadır.', '2018-10-15 05:43:38', '2019-01-22 06:20:17'),
(4, 'Twitter Hizmetleri', 'Twitter hizmetlerimizde takipçi,beğeni,izlenme,hikaye görüntüleme gibi bir çok aktif servis bulunmaktadır.', '2018-10-15 05:43:44', '2019-01-22 06:20:28'),
(5, 'Youtube Hizmetleri', 'Youtube hizmetlerimizde takipçi,beğeni,izlenme,hikaye görüntüleme gibi bir çok aktif servis bulunmaktadır.', '2018-10-15 05:43:48', '2019-01-22 06:20:42'),
(6, 'Ödeme Yöntemleri', 'Banka , Kredi Kartı , Mobil Ödeme , Paytr , Paypal gibi ödeme yöntemleri sistemimizde ekli ve aktif bulunmaktadır.', '2018-10-15 05:43:52', '2019-01-22 06:21:18'),
(7, 'Destek Hattımız', 'Müşteri temsilcilerimiz sizin sorunlarınız,bakiye işlemleri ve sosyal medya araçlarını kullanma hakkında bilgiyi sizlere 7*24 sağlamaktadır.', '2018-10-15 05:43:56', '2019-01-22 06:21:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `currency`, `rate`, `val1`, `val2`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', '5', '1000', NULL, '2.52', 'usd', '80', 'rexrifat636@gmail.com', NULL, 1, NULL, '2018-06-12 03:45:49'),
(102, 'PerfectMoney', 'Perfect Money', '20', '20000', NULL, '1', 'usd', '80', 'U5220203', 'reg4e54h1grt1j', 1, NULL, '2018-06-12 03:45:55'),
(103, 'Stripe', 'Credit Card', '10', '50000', NULL, '3', 'usd', '80', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', 1, NULL, '2018-06-12 03:44:57'),
(104, 'Skrill', 'Skrill', '10', '50000', NULL, '3', 'usd', '80', 'support@globeskill.com', 'jabali2006', 1, NULL, '2018-06-12 03:46:01'),
(501, 'Blockchain.info', 'BitCoin', '1', '20000', NULL, '0.5', 'try', '80', '3965f52f-ec19-43af-90ed-d613dc60657eSSS', 'xpub6DREmHywjNizvs9b4hhNekcjFjvL4rshJjnrHHgtLNCSbhhx5jKFRgqdmXAecLAddEPudDZY4xoDbV1NVHSCeDp1S7NumPCNNjbxB7sGasY0000', 1, NULL, '2019-01-22 07:00:08'),
(502, 'block.io - BTC', 'BitCoin', '1', '99999', NULL, '0.5', 'usd', '80', 'a528-2410-1296-395a', '09876softk', 1, '2018-01-27 18:00:00', '2018-06-12 03:44:20'),
(503, 'block.io - LTC', 'LiteCoin', '100', '10000', NULL, '1', 'usd', '80', '4494-4014-373a-3454', '09876softk', 1, NULL, '2018-06-12 03:45:23'),
(504, 'block.io - DOGE', 'DogeCoin', '1', '50000', NULL, '2.52', 'usd', '80', 'b224-398b-8054-8325', '09876softk', 1, NULL, '2018-06-12 03:45:14'),
(505, 'CoinPayment - BTC', 'BitCoin', '1', '50000', NULL, '2.52', 'usd', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-06-12 03:44:26'),
(506, 'CoinPayment - ETH', 'Etherium', '1', '50000', NULL, '2.52', 'usd', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-06-12 03:45:35'),
(507, 'CoinPayment - BCH', 'Bitcoin Cash', '1', '50000', NULL, '2.52', 'usd', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-06-12 03:44:36'),
(508, 'CoinPayment - DASH', 'DASH', '1', '50000', '0.51', '2.52', NULL, '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(509, 'CoinPayment - DOGE', 'DOGE', '1', '50000', NULL, '2.52', 'usd', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-06-12 03:45:03'),
(510, 'CoinPayment - LTC', 'LTC', '1', '50000', NULL, '2.52', 'usd', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-06-12 03:45:43'),
(512, 'CoinGate', 'CoinGate', '10', '1000', NULL, '5', 'usd', '80', 'Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N', NULL, 1, '2018-07-11 01:31:53', '2018-07-11 01:31:53'),
(513, 'CoinPayment-ALL', 'Coin Payment', '10', '1000', NULL, '5', 'usd', '80', 'db1d9f12444e65c921604e289a281c56', NULL, 1, NULL, '2019-01-22 07:00:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg` tinyint(4) DEFAULT NULL,
  `email_verification` tinyint(4) DEFAULT NULL,
  `email_notification` tinyint(4) DEFAULT NULL,
  `currency_rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_sender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achivment_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `base_color`, `base_currency`, `currency_symbol`, `reg`, `email_verification`, `email_notification`, `currency_rate`, `e_sender`, `e_message`, `banner_heading`, `banner_des`, `about_us`, `service_des`, `testimonial_des`, `achivment_des`, `faq_des`, `contact_address`, `contact_phone`, `contact_email`, `footer_heading`, `footer_text`, `contact_des`, `api_des`, `created_at`, `updated_at`) VALUES
(1, 'SMM PANEL', '3498db', 'TRY', 'TL', 1, 0, 1, '1', 'info@mersinwebsoft.com', 'Merhabalar, {{name}},\r\n{{message}}', 'SMM Panel Hizmetleri 2019', '<span style=\"color: rgb(242, 242, 242); font-family: Poppins, sans-serif; font-size: 20px; text-align: center;\">Tüm sosyal medya araçları bu panelde uygun fiyatlara pazarlanmaktadır.(Instagram-Twitter-Facebook-Youtube) gibi hizmetlerin satış noktası burasıdır..</span><br>', 'SMM Panel hizmetleri için tasarlanan bu temamızın herşeyi düşünülerek tasarlanmış olup tamamen api hizmeti ile çalışmaktadır.Ödeme yöntemleri , website ayarları , API ayarları vb. tek tıkla admin panelinden düzenleyebileceğiniz sayfalar bulunmaktadır.Kolay kullanım ve kolay değişiklik ile hiç zorlanmadan sizde sitenizin kontrolünü ele alabilirsiniz.\r\nSmm hizmetleri ile başlangıç yaparak para kazanmanın tadına varabilirsiniz..', '<span style=\"color: rgba(30, 48, 86, 0.9); font-family: Poppins, sans-serif; font-size: 16px; text-align: center; background-color: rgb(250, 250, 253);\">Tüm servis modülleri bizde bulunmaktadır.Site bayilerden API hizmeti satın alarak sizde para kazanmaya başlayabilirsiniz.En hızlı ve uygum fiyatlara SMM bayi hizmetleriniz elinizin altında..</span><br>', '<span style=\"color: rgba(30, 48, 86, 0.9); font-family: Poppins, sans-serif; font-size: 16px; text-align: center; background-color: rgb(250, 250, 253);\">Müsterilerinizin sizin hakkınızdaki yorumları burda yayınlayarak kalitenizin ve güvenirliğinizi yeni üyelerinizle paylaşarak gösterebilirsiniz.</span><br>', '<span style=\"color: rgba(30, 48, 86, 0.9); font-family: Poppins, sans-serif; font-size: 16px; text-align: center; background-color: rgb(250, 250, 253);\">Sistemde ne kadar üye , satış ve abone olan kişi sayılarını bu sayaç ile takip edebilirsiniz.Ne kadar sipariş verildiğine göz atabilirsiniz.</span><br>', '<span style=\"color: rgba(30, 48, 86, 0.9); font-family: Poppins, sans-serif; font-size: 16px; text-align: center;\">SMM Panel ile ilgili tüm sorunlan soruların cevaplarına bu kısımdan ulaşabilirsiniz.Her daim sıkça sorulan sorular bölümü güncellenmektedir.</span><br>', 'Mersin/Merkez - Türkiye', '0538 XXX XX XX', 'info@mersinwebsoft.com', 'Copyright © 2018-2019 Smm PaneL Hizmetleri - Tüm Haklarımız Saklıdır..', 'Sizde hemen bir smm panel hizmeti satın alarak sosyal medyada popüler olma şansını ve para kazanmaya başlayabilirsiniz.', 'Herhangi bir sorun veya talebiniz var ise bu forumu doldurarak bize iletebilirsiniz.Müşteri temsilcilerimiz en kısa sürede size dönüş sağlayacaktır..', 'Sistem api hizmet dökümanlarımıza aşağıda yazan bilgilerden ulaşabilir sitenize ek modüller yazabilir ve sistemi geliştirebilirsiniz.Gerekli tüm api dökümanı bu sayfada yer almaktadır..', '2018-06-04 00:06:40', '2019-01-24 10:00:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_30_062126_admins', 1),
(5, '2018_06_03_102739_create_general_settings_table', 3),
(6, '2018_06_04_095801_create_gateways_table', 4),
(10, '2018_06_13_053323_create_transections_table', 8),
(11, '2018_06_13_054111_create_deposits_table', 8),
(15, '2018_07_07_123009_create_socials_table', 11),
(16, '2018_07_25_085031_create_categories_table', 12),
(17, '2018_07_25_093010_create_services_table', 13),
(18, '2018_07_29_092440_create_orders_table', 14),
(19, '2018_07_30_071159_create_support_messages_table', 15),
(20, '2018_07_30_071206_create_support_tickets_table', 15),
(21, '2018_01_13_065452_create_sliders_table', 16),
(22, '2018_07_31_125844_create_subscribers_table', 17),
(23, '2018_08_04_054452_create_api_settings_table', 18),
(24, '2018_08_05_060832_create_service_prices_table', 19),
(25, '2018_10_15_100038_create_our_services_table', 20),
(26, '2018_10_15_112117_create_testimonials_table', 21),
(27, '2018_10_15_113356_create_faqs_table', 22),
(28, '2018_10_16_084641_create_announcements_table', 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `start_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `order_through` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `category_id`, `service_id`, `user_id`, `service_no`, `order_no`, `link`, `quantity`, `price`, `status`, `start_counter`, `remains`, `order_through`, `created_at`, `updated_at`) VALUES
(1, '1', '6', '1', '413', '0', 'deno.com', '1000', '150', 'Refunded', '0', '1000', 'Web', '2019-01-22 09:26:53', '2019-01-22 09:30:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `our_services`
--

CREATE TABLE `our_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `our_services`
--

INSERT INTO `our_services` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '5bc471a356bc9.jpg', 'Facebook Modül', 'Smm Panel Bayilerinden almış olduğunuz api ile kendi panelinizi kurarak Facebook için ( takipçi,beğeni,sayfa beğenisi,izlenme ) vb. birçok özelliği kullanma fırsatını sizlere sunmaktayız.Sizde hemen sitemize \"ücretsiz \"kayıt olarak ve daha sonrasında \"bakiye\" yükleme işlemi yaparak sayfalarınıza veya profilinize takipçi ve beğeni gönderebilirsiniz.En ucuz ve hızlı panelin adresi burasıdır.', '2018-10-15 04:34:34', '2019-01-22 06:26:48'),
(2, '5bc471e3181f2.jpg', 'Snapchat Modül', 'Smm Panel Bayilerinden almış olduğunuz api ile kendi panelinizi kurarak Snapchat için ( takipçi,beğeni,sayfa beğenisi,izlenme ) vb. birçok özelliği kullanma fırsatını sizlere sunmaktayız.Sizde hemen sitemize \"ücretsiz \"kayıt olarak ve daha sonrasında \"bakiye\" yükleme işlemi yaparak sayfalarınıza veya profilinize takipçi ve beğeni gönderebilirsiniz.En ucuz ve hızlı panelin adresi burasıdır.', '2018-10-15 04:54:27', '2019-01-22 06:26:41'),
(3, '5bc4720d49e41.jpg', 'Instagram Modül', 'Smm Panel Bayilerinden almış olduğunuz api ile kendi panelinizi kurarak Instagram için ( takipçi,beğeni,sayfa beğenisi,izlenme ) vb. birçok özelliği kullanma fırsatını sizlere sunmaktayız.Sizde hemen sitemize \"ücretsiz \"kayıt olarak ve daha sonrasında \"bakiye\" yükleme işlemi yaparak sayfalarınıza veya profilinize takipçi ve beğeni gönderebilirsiniz.En ucuz ve hızlı panelin adresi burasıdır.', '2018-10-15 04:55:09', '2019-01-22 06:27:01'),
(4, '5bcb42a00a34d.jpg', 'SMM Hiztmetleri', 'Smm Panel Bayilerinden almış olduğunuz api ile kendi panelinizi kurarak SMM Panel için ( takipçi,beğeni,sayfa beğenisi,izlenme ) vb. birçok özelliği kullanma fırsatını sizlere sunmaktayız.Sizde hemen sitemize \"ücretsiz \"kayıt olarak ve daha sonrasında \"bakiye\" yükleme işlemi yaparak sayfalarınıza veya profilinize takipçi ve beğeni gönderebilirsiniz.En ucuz ve hızlı panelin adresi burasıdır.', '2018-10-20 18:58:40', '2019-01-22 06:27:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_k` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `category_id`, `name`, `price_per_k`, `min`, `max`, `details`, `service_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '100k likes in 5 mins', '100', '1000', '1000000000', 'guarenteed', '0', 1, '2018-07-26 02:27:31', '2018-07-26 02:44:38'),
(2, '1', 'Instagram Views', '250', '1000', '1000000000000000', 'guarenteed', '0', 1, '2018-07-26 02:33:09', '2019-01-22 07:30:42'),
(3, '1', 'Instagram Views', '80', '50', '5000', 'Instagram Germany Views', '0', 1, '2018-07-31 09:18:36', '2018-07-31 09:21:28'),
(4, '3', 'Snapchat - Followers', '2180', '100', '2000', 'NO REFILL / REFUND', '0', 1, '2018-07-31 09:19:58', '2018-07-31 09:20:59'),
(6, '1', 'Instagram Followers MAX 5{ Perfect Promotional - No Refill}', '15', '100', '5000', '♛ PROMOTION (Cheap Services) 🔥', '413', 1, '2018-08-04 05:02:15', '2018-08-04 05:02:15'),
(7, '2', '43234234', '43243', '32423423', '4324324324324', 'gdfafa', '0', 1, '2018-08-04 05:05:35', '2018-08-04 05:05:35'),
(8, '1', 'Instagram Followers [ 6K ] 0-3Hours', '14', '200', '6000', 'Instagram Followers [ 6K ] 0-3Hours', '420', 1, '2018-08-05 03:12:26', '2018-08-05 03:12:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service_prices`
--

CREATE TABLE `service_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `service_prices`
--

INSERT INTO `service_prices` (`id`, `category_id`, `service_id`, `user_id`, `price`, `created_at`, `updated_at`) VALUES
(4, '2', '1', '1', '100', '2018-08-05 00:25:33', '2018-08-05 00:25:33'),
(5, '1', '2', '1', '250', '2018-08-05 00:25:33', '2018-08-05 00:25:33'),
(6, '1', '3', '1', '78', '2018-08-05 00:25:33', '2018-08-05 01:31:01'),
(7, '3', '4', '1', '120', '2018-08-05 00:25:33', '2018-08-05 01:31:13'),
(8, '1', '6', '1', '150', '2018-08-05 00:25:33', '2018-08-05 01:31:02'),
(9, '2', '7', '1', '40', '2018-08-05 00:25:33', '2018-08-05 01:31:02'),
(10, '1', '8', '1', '14', '2018-08-05 03:12:26', '2018-08-05 03:12:26'),
(11, '2', '1', '10', '100', '2018-08-05 03:17:13', '2018-08-05 03:17:13'),
(12, '1', '2', '10', '250', '2018-08-05 03:17:13', '2018-08-05 03:17:13'),
(13, '1', '3', '10', '80', '2018-08-05 03:17:13', '2018-08-05 03:17:13'),
(14, '3', '4', '10', '2180', '2018-08-05 03:17:14', '2018-08-05 03:17:14'),
(15, '1', '6', '10', '15', '2018-08-05 03:17:14', '2018-08-05 03:17:14'),
(16, '2', '7', '10', '43243', '2018-08-05 03:17:14', '2018-08-05 03:17:14'),
(17, '1', '8', '10', '14', '2018-08-05 03:17:14', '2018-08-05 03:17:14'),
(18, '2', '1', '1', '100', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(19, '1', '2', '1', '250', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(20, '1', '3', '1', '80', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(21, '3', '4', '1', '2180', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(22, '1', '6', '1', '15', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(23, '2', '7', '1', '43243', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(24, '1', '8', '1', '14', '2019-01-22 08:08:45', '2019-01-22 08:08:45'),
(25, '2', '1', '2', '100', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(26, '1', '2', '2', '250', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(27, '1', '3', '2', '80', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(28, '3', '4', '2', '2180', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(29, '1', '6', '2', '15', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(30, '2', '7', '2', '43243', '2019-03-02 02:49:53', '2019-03-02 02:49:53'),
(31, '1', '8', '2', '14', '2019-03-02 02:49:53', '2019-03-02 02:49:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(2, 'fa-facebook', 'https://www.facebook.com', '2018-07-07 07:52:23', '2018-07-07 07:52:23'),
(4, 'fa-twitter', 'https://www.twitter.com', '2018-07-07 07:53:51', '2018-07-07 07:53:51'),
(5, 'fa-pinterest', 'https://www.pinterest.com/', '2018-07-07 08:04:38', '2018-07-07 08:04:38'),
(6, 'fa-youtube', 'https://www.youtube.com/', '2018-07-07 08:05:18', '2018-07-07 08:05:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'mutasim.ewu@gmail.com', '2018-07-31 07:30:26', '2018-07-31 07:30:26'),
(4, 'pialneel@gmail.com', '2018-08-01 00:30:29', '2018-08-01 00:30:29'),
(5, 'dsadsa@gmail.com', '2018-10-15 06:55:36', '2018-10-15 06:55:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `supportticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `support_messages`
--

INSERT INTO `support_messages` (`id`, `supportticket_id`, `type`, `message`, `created_at`, `updated_at`) VALUES
(5, '5', 1, 'hello SMM', '2018-07-30 01:36:45', '2018-07-30 01:36:45'),
(6, '5', 2, 'hello', '2018-07-30 06:43:46', '2018-07-30 06:43:46'),
(7, '5', 1, 'a', '2019-01-22 08:26:59', '2019-01-22 08:26:59'),
(8, '6', 1, 'sa', '2019-01-22 08:43:05', '2019-01-22 08:43:05'),
(9, '6', 2, 'sa', '2019-01-22 08:50:31', '2019-01-22 08:50:31'),
(10, '6', 1, 'asdasdasdasdasdas', '2019-01-22 08:50:53', '2019-01-22 08:50:53'),
(11, '7', 1, 'demo destekdemo destekdemo destekdemo destekv', '2019-01-22 08:53:01', '2019-01-22 08:53:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `ticket`, `subject`, `status`, `created_at`, `updated_at`) VALUES
(5, '1', 'S-118639', 'SMM', 4, '2018-07-30 01:36:45', '2019-01-22 08:41:39'),
(6, '1', 'S-429194', 'sa', 4, '2019-01-22 08:43:05', '2019-01-22 08:51:08'),
(7, '1', 'S-749789', 'demo destek', 0, '2019-01-22 08:53:01', '2019-01-22 08:53:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, '5bc47aeb84ca2.jpg', 'Mersinwebsoft', 'Sosyal Medya Hizmetleri için Full APILI SMM panel temamız yayına sunulmuştur..', '2018-10-15 05:32:59', '2019-01-22 06:23:01'),
(3, '5bc47b041259a.jpg', 'Mersinwebsoft', 'Temayı satın alan tüm müşterilerimiz gelecek olan güncellemeleri tamamen ücretsiz bir şekilde alacaktır.', '2018-10-15 05:33:24', '2019-01-22 06:23:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transections`
--

CREATE TABLE `transections` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `transections`
--

INSERT INTO `transections` (`id`, `user_id`, `gateway_id`, `amount`, `user_balance`, `charge`, `type`, `trx`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '150', '849', NULL, 1, 'JdZVR2IXbWaF', '2019-01-22 09:26:53', '2019-01-22 09:26:53'),
(2, '1', NULL, NULL, '849', NULL, 2, 'lzmdogCxL6HL', '2019-01-22 09:30:07', '2019-01-22 09:30:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `verification_time` datetime DEFAULT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify` tinyint(4) NOT NULL DEFAULT 0,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `username`, `password`, `image`, `country`, `city`, `post_code`, `remember_token`, `status`, `verification_time`, `verification_code`, `email_verify`, `balance`, `api_key`, `created_at`, `updated_at`) VALUES
(1, 'DemoHesap', 'admin@webkral.net', '05386446141', 'demohesap', '$2y$10$qbswcN3MAPHgW7ZKofiDz.quDPBIWlR60K5DXqFv6EmuR6.DQEvGi', NULL, 'Türkiye', 'Mersin', '33220', 'qyCyFNcGbZdjPcNXfBfDZFLVAn8rRHrfqdrRD57D2mbUcgM8cuWz3l5FVae9', 1, '2019-01-24 12:49:41', 'p7JTtd', 1, '999', '7Bx2QgLJ4ykkJl0SeQqVrzHtEieFGQ', '2019-01-22 08:08:45', '2019-01-24 11:17:10'),
(2, 'medyasmm', 'info@medyasmm.com', NULL, 'medyasmm', '$2y$10$5.iRRbBl30026LJOpbO3NepF1meT.Jxf5g5usNZSDjRW7eRTqaNq.', NULL, NULL, NULL, NULL, NULL, 1, '2019-03-02 05:49:53', 'rokq7F', 1, '0', 'D5UOcKOsdNoUX6Be7xkgP7rpdYIoih', '2019-03-02 02:49:53', '2019-03-02 02:49:53');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Tablo için indeksler `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `service_prices`
--
ALTER TABLE `service_prices`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Tablo için indeksler `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- Tablo için AUTO_INCREMENT değeri `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `service_prices`
--
ALTER TABLE `service_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `transections`
--
ALTER TABLE `transections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
