-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2018 at 07:17 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wedsetgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE IF NOT EXISTS `catagories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `created_at`, `updated_at`, `image`) VALUES
(10, 'zestmindssdfsdfasdfsdfsafsdf', '2018-01-10 04:51:18', '2018-01-10 04:51:18', 'ecommerce-slider.png'),
(11, 'ishu singh', '2018-01-10 05:07:27', '2018-01-10 05:07:27', 'zestminds.jpg'),
(12, 'ishwardvdfgfg', '2018-01-11 03:32:37', '2018-01-11 03:32:37', 'zestminds.jpg'),
(14, 'sdfsd2343423234', '2018-01-11 03:33:15', '2018-01-11 03:33:15', 'logo.png'),
(15, 'sdddffdfbdfbcvvxv', '2018-01-11 03:33:27', '2018-01-11 03:33:27', 'All-Winners-NO-BAG1-1024x611.jpg'),
(17, 'asfsdfasasdasdasd', '2018-01-11 04:34:48', '2018-01-11 04:34:48', '1510211280banner-e-commerce1.png'),
(18, 'sgsdfsdfsdf', '2018-01-11 04:35:10', '2018-01-11 04:35:10', 'All-Winners-NO-BAG1-1024x611.jpg'),
(20, 'sdfsdfse', '2018-01-11 04:41:53', '2018-01-11 04:41:53', 'johnson-and-johnson-750x502.jpg'),
(21, 'ffsdf', '2018-01-11 04:42:24', '2018-01-11 04:42:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cmsemails`
--

CREATE TABLE IF NOT EXISTS `cmsemails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailfrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cmsemails`
--

INSERT INTO `cmsemails` (`id`, `title`, `emailfrom`, `subject`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Forgot Password', 'ranjuzestmind@gmail.com', 'Forgot Password', 'FORGOT_PASSWORD', '<p>Dear {USER},</p>\r\n<p></p>\r\n<p>\r\nWe have received a request to change your password, Please {CLICK_HERE} to reset your password.\r\n</p>\r\n<p>\r\nIf you did not make any request to change password, Please ignore this email.</p>', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cmspages`
--

CREATE TABLE IF NOT EXISTS `cmspages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `metatitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seourl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metakeyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `showinfooter` int(11) NOT NULL,
  `showinleft` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `buyer_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(2, 'Los Angeles ', '2018-01-11 04:02:44', '2018-01-11 04:02:44'),
(3, 'Orange County South fsdfsdf', '2018-01-11 04:02:55', '2018-01-11 04:02:55'),
(4, 'San Diego', '2018-01-11 04:03:06', '2018-01-11 04:03:06'),
(5, 'Dana Point ', '2018-01-11 04:03:20', '2018-01-11 04:03:20'),
(6, 'San Clemente', '2018-01-11 04:03:29', '2018-01-11 04:03:29'),
(7, 'Inland Empire ', '2018-01-11 04:03:39', '2018-01-11 04:03:39'),
(9, 'asdasd', '2018-01-11 04:26:16', '2018-01-11 04:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2018_01_04_112534_create_cmspages_table', 1),
('2018_01_04_112143_create_cmsemails_table', 2),
('2018_01_04_112936_create_ratings_table', 3),
('2018_01_04_111301_create_locations_table', 4),
('2018_01_04_113201_create_messages_table', 5),
('2018_01_04_111740_create_followers_table', 6),
('2018_01_04_101300_create_user_types_table', 7),
('2018_01_04_101240_create_users_table', 8),
('2018_01_04_101311_create_user_details_table', 9),
('2018_01_04_110541_create_vision_books_table', 10),
('2018_01_04_110739_create_vision_book_collections_table', 11),
('2018_01_04_104322_create_categories_table', 12),
('2018_01_04_104538_create_user_workes_table', 13),
('2018_01_04_105917_create_user_work_images_table', 14),
('2018_01_09_110344_add_image_to_catagories', 15),
('2018_01_11_110611_rename_cmapages_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rating_points` int(11) NOT NULL,
  `user_work_id` int(11) NOT NULL,
  `professional_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type_id` int(10) unsigned DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `confimation_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_password_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_type_id_foreign` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `email`, `password`, `is_active`, `confimation_token`, `forgot_password_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 1, 'ranjana@zestminds.com', '$2y$10$krv.uWwowm21pm7b5tSB3uGAPvI2/fAPoi.hZDTkNpoxvCh7Ochf2', 1, '', '', 'kYEdTSMg9ymlxXx9Hm0GtWfWnkZOupxKnBBMf5M30wQ43KjuFGJSsWf0X8NK', '2018-01-10 23:52:20', '2018-01-12 07:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_details_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `profile_image`, `other_detail`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 17, 'ranjana', 'devi', '', '', '', NULL, '2018-01-10 23:52:20', '2018-01-10 23:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-01-07 18:30:00', '2018-01-07 18:30:00'),
(2, 'Professional', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Buyer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_works`
--

CREATE TABLE IF NOT EXISTS `user_works` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `catagory_id` int(10) unsigned NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_works_user_id_foreign` (`user_id`),
  KEY `user_works_catagory_id_foreign` (`catagory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_work_images`
--

CREATE TABLE IF NOT EXISTS `user_work_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_work_id` int(10) unsigned NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_work_images_user_work_id_foreign` (`user_work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vision_books`
--

CREATE TABLE IF NOT EXISTS `vision_books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `vision_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `vision_books_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vision_book_collections`
--

CREATE TABLE IF NOT EXISTS `vision_book_collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vision_book_id` int(10) unsigned NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `vision_book_collections_vision_book_id_foreign` (`vision_book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_works`
--
ALTER TABLE `user_works`
  ADD CONSTRAINT `user_works_catagory_id_foreign` FOREIGN KEY (`catagory_id`) REFERENCES `catagories` (`id`),
  ADD CONSTRAINT `user_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_work_images`
--
ALTER TABLE `user_work_images`
  ADD CONSTRAINT `user_work_images_user_work_id_foreign` FOREIGN KEY (`user_work_id`) REFERENCES `user_works` (`id`);

--
-- Constraints for table `vision_books`
--
ALTER TABLE `vision_books`
  ADD CONSTRAINT `vision_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vision_book_collections`
--
ALTER TABLE `vision_book_collections`
  ADD CONSTRAINT `vision_book_collections_vision_book_id_foreign` FOREIGN KEY (`vision_book_id`) REFERENCES `vision_books` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
