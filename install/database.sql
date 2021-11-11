-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2020 at 09:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u936827588_resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_image`, `admin_phone`, `admin_email`, `admin_pass`) VALUES
(1, 'digambar singh', 'images/admin/profile/23-07-19/230719014721pm-activity.png', '8476978906', 'support@tecmanic.com', '$2y$10$.sOI9/OUKDrJOyNvFnecCO16nw89ekZ6TIC7.P2NHinRmrkTRpVIS');

-- --------------------------------------------------------

--
-- Table structure for table `admin_banner`
--

CREATE TABLE `admin_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_banner`
--

INSERT INTO `admin_banner` (`banner_id`, `banner_name`, `banner_image`, `vendor_id`) VALUES
(5, 'Grocery', 'images/admin/admin_banner/10-09-2020/100920125525pm-banner1.jpg', '0'),
(6, 'Grocery', 'images/admin/admin_banner/10-09-2020/100920125708pm-banner2.jpg', '1'),
(7, 'Grocery', 'images/admin/admin_banner/10-09-2020/100920125734pm-Bannerb4.jpg', '0'),
(8, 'Grocery', 'images/admin/admin_banner/10-09-2020/100920125745pm-banner5.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `cityadmin_id` int(255) DEFAULT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_charge` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `cityadmin_id`, `area_name`, `created_at`, `updated_at`, `delivery_charge`) VALUES
(1, 1, 'mayur vihar extension', '26-07-2019 07:02 am', '24-09-19 07:35 am', 0),
(2, 1, 'sector 58', '29/7/2019', 'N/A', 0),
(3, 1, 'cannaught palace', '20-08-2019 08:41 am', 'N/A', 0),
(6, 1, 'Cannaught palace', '15-11-2019 02:12 pm', '17-12-19 07:15 am', 0),
(10, 1, 'laxmi nagar', '17-12-2019 06:58 am', 'N/A', 0),
(11, 1, 'Nehru Place', '17-12-2019 07:08 am', 'N/A', 0),
(12, 1, 'Geeta Colony', '17-12-2019 07:14 am', 'N/A', 0),
(13, 1, 'Paschim Vihar', '17-12-2019 07:15 am', 'N/A', 0),
(17, 1, 'Noida 15', '20-12-2019 07:00 am', 'N/A', 0),
(18, 1, 'NOida sector 18', '08-01-2020 11:51 am', '03-04-20 11:24 am', 0),
(20, 1, 'cannaught palacej', '03-04-2020 11:04 am', 'N/A', 0),
(21, 1, 'cannaught palacejdcm', '03-04-2020 11:23 am', 'N/A', 0),
(22, NULL, 'testing', '31-08-2020 12:17 pm', 'N/A', 0),
(23, NULL, 'Bareilly', '03-09-2020 10:50 am', 'N/A', 0),
(24, 1, 'Noida sec 18', '12-09-2020 08:03 am', '12-09-20 08:05 am', 0),
(25, 2, 'Noida sec 16', '12-09-2020 09:36 am', 'N/A', 0),
(27, 1, 'Ashok Nagar', '22-09-2020 05:05 pm', 'N/A', 50),
(28, 1, 'NIRMAL', '30-09-2020 04:58 pm', 'N/A', 20),
(29, 12, 'Ramnagar', '01-10-2020 11:05 am', 'N/A', 30),
(30, 12, 'MM Thota', '01-10-2020 11:05 am', 'N/A', 30),
(31, 12, 'Bank Colony', '01-10-2020 11:05 am', 'N/A', 40),
(32, 12, 'Vidya nagar', '01-10-2020 11:24 am', 'N/A', 40),
(33, NULL, 'Bareilly, Uttar Pradesh, India', '03-10-2020 02:31 pm', 'N/A', 50),
(34, 11, 'Charbagh, Lucknow, Lucknow, Uttar Pradesh, India', '03-10-2020 02:34 pm', 'N/A', 50),
(35, 11, 'Warangal Fort, Warangal, Telangana, India', '06-10-2020 09:25 pm', 'N/A', 30),
(36, 12, 'Shiva Nagar, Karimnagar, Karimnagar, Telangana, India', '06-10-2020 09:28 pm', 'N/A', 25),
(37, 14, 'Shankar Nagar, Siddipet, Siddipet, Telangana, India', '06-10-2020 10:02 pm', 'N/A', 10),
(38, 14, 'Hanuman Nager, Siddipet, Siddipet, Telangana, India', '06-10-2020 10:02 pm', 'N/A', 20),
(39, 15, 'Karimnagar, Telangana, India', '06-10-2020 10:12 pm', 'N/A', 30),
(40, 16, 'Visakhapatnam, Andhra Pradesh, India', '08-10-2020 03:45 pm', 'N/A', 50),
(41, 16, 'Guntur, Andhra Pradesh, India', '08-10-2020 05:45 pm', 'N/A', 40),
(43, 1, 'Noida City Center, Sector-32, Noida, Uttar Pradesh, India', '24-11-2020 03:33 pm', 'N/A', 50),
(45, 1, 'Sonipat Railway Station, Sonipat, Haryana, India', '28-11-2020 04:29 pm', 'N/A', 20);

-- --------------------------------------------------------

--
-- Table structure for table `assign_homecat`
--

CREATE TABLE `assign_homecat` (
  `assign_id` int(200) NOT NULL,
  `homecat_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_homecat`
--

INSERT INTO `assign_homecat` (`assign_id`, `homecat_id`, `cat_id`) VALUES
(77, '1', '9'),
(78, '1', '28'),
(79, '1', '29'),
(92, '1', '33');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerloc_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `cityadmin_id`, `banner_name`, `bannerloc_id`, `banner_image`, `keyword`, `created_at`, `updated_at`, `vendor_id`) VALUES
(27, NULL, 'Grocery', '36', 'banner/images/10-09-20/100920125929pm-banner5.jpg', 'Testing', '09-09-2020 08:19 am', '21-09-20 12:23 pm', 1),
(28, NULL, 'Grocery', '36', 'banner/images/11-09-20/110920012043pm-banner7.jpg', 'Grocery', '10-09-2020 12:46 pm', '11-09-20 01:20 pm', 1),
(29, NULL, 'Grocery', '36', 'banner/images/11-09-20/110920012104pm-Bannerb4.jpg', 'Grocery', '10-09-2020 12:47 pm', '11-09-20 01:21 pm', 1),
(30, NULL, 'Grocery', '36', 'banner/images/11-09-20/110920012138pm-banner2.jpg', 'Grocery', '10-09-2020 12:47 pm', '11-09-20 01:21 pm', 1),
(31, NULL, 'Grocery', '36', 'banner/images/10-09-2020/100920124732pm-banner7.jpg', 'Grocery', '10-09-2020 12:47 pm', 'N/A', 1),
(32, NULL, 'Grocery', '36', 'banner/images/10-09-2020/100920124739pm-banner7.jpg', 'Grocery', '10-09-2020 12:47 pm', 'N/A', 1),
(34, NULL, 'kirana', '44', 'banner/images/06-10-2020/061020092903pm-My-Post-(68).png', 'kirana', '06-10-2020 09:29 pm', 'N/A', 12),
(35, NULL, 'kirana', '46', 'banner/images/06-10-2020/061020102220pm-My-Post-(72)---Copy.png', 'kirana', '06-10-2020 10:22 pm', 'N/A', 17),
(36, NULL, 'Testing', '6', 'banner/images/13-11-2020/131120113235am-p_R165798.jpg', 'Test', '13-11-2020 11:32 am', 'N/A', 38),
(37, NULL, 'Banan', '13', 'banner/images/28-11-2020/281120121354pm-7bb173db-cddd-433f-b30e-fbf06c0e6ba1.jpg', 'BAA', '28-11-2020 12:13 pm', '28-11-20 12:14 pm', 44);

-- --------------------------------------------------------

--
-- Table structure for table `banner_resturant`
--

CREATE TABLE `banner_resturant` (
  `banner_id` int(11) NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_resturant`
--

INSERT INTO `banner_resturant` (`banner_id`, `banner_image`, `vendor_id`, `cat_id`) VALUES
(1, 'images/admin/admin_banner/16-10-2020/161020121616pm-01e071dc276f41c9b82c.jpg', 0, NULL),
(2, 'images/admin/admin_banner/16-10-2020/161020121639pm-square-food-banner_23-2148100709.jpg', 0, NULL),
(3, 'images/admin/admin_banner/16-10-2020/161020121657pm-777764a02ac87c9571f6bc8a7c77391e.jpg', 0, NULL),
(4, 'images/admin/admin_banner/16-10-2020/161020121729pm-square-banner-template-restaurant-food-menu-orange_123605-205.jpg', 0, NULL),
(5, 'images/admin/admin_banner/16-10-2020/161020121752pm-4cb3cfdc844e65ae44fbe0d3894b3c98.jpg', 0, NULL),
(6, 'banner/images/04-12-2020/041220032040pm-p_R165798.jpg', 38, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cancel_for`
--

CREATE TABLE `cancel_for` (
  `res_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancel_for`
--

INSERT INTO `cancel_for` (`res_id`, `reason`) VALUES
(1, 'i bought from somewhere else'),
(2, 'Products are not Goods'),
(3, 'testing for Descending');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_reason`
--

CREATE TABLE `cancel_reason` (
  `reason_id` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancel_reason`
--

INSERT INTO `cancel_reason` (`reason_id`, `reason`) VALUES
(2, 'shifted to another society.'),
(3, 'Order Placed Wrongly');

-- --------------------------------------------------------

--
-- Table structure for table `cash_collect`
--

CREATE TABLE `cash_collect` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `no_of_orders` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_collect`
--

INSERT INTO `cash_collect` (`request_id`, `user_id`, `vendor_id`, `amount`, `date_of_collection`, `delivery_boy_id`, `no_of_orders`, `created_at`, `cart_id`) VALUES
(350, '536', '38', '200', '2020-09-25', '47', 1, '2020-08-25', 'AOBP535e'),
(351, '421', '1', '300', '2020-09-20', '47', 1, '2020-09-20', 'GLAT59ab'),
(352, '421', '1', '0', '2020-09-29 13:48:25', '47', 1, '2020-09-29 13:48:25', 'UFIJ811f'),
(353, '472', '1', '800', '2020-09-29 14:26:20', '47', 1, '2020-09-29 14:26:20', 'AMVI1598'),
(354, '472', '1', '300', '2020-09-30 18:06:49', '39', 1, '2020-09-30 18:06:49', 'OCAQ003f'),
(355, '472', '1', '0', '2020-09-30 23:02:25', '24', 1, '2020-09-30 23:02:25', 'CFRP97d9'),
(356, '472', '1', '525', '2020-09-30 23:07:19', '24', 1, '2020-09-30 23:07:19', 'JJWT49f1'),
(357, '472', '1', '740', '2020-09-30 23:07:49', '24', 1, '2020-09-30 23:07:49', 'UCZK1045'),
(358, '472', '1', '1460', '2020-09-30 23:10:27', '24', 1, '2020-09-30 23:10:27', 'WWBG0942'),
(359, '472', '1', '470', '2020-09-30 23:10:54', '24', 1, '2020-09-30 23:10:54', 'TPYX204e'),
(360, '421', '1', '0', '2020-10-03 17:06:28', '1', 1, '2020-10-03 17:06:28', 'WMIL7184'),
(361, '472', '1', '520', '2020-10-09 21:27:54', '50', 1, '2020-10-09 21:27:54', 'MSOI376b'),
(362, '536', '38', '950', '2020-11-19 16:05:41', '63', 1, '2020-11-19 16:05:41', 'CEAN8652'),
(363, '536', '42', '100', '2020-11-27 11:10:39', '65', 1, '2020-11-27 11:10:39', 'FMVO5404'),
(364, '447', '44', '200', '2020-11-30 21:08:38', '65', 1, '2020-11-30 21:08:38', 'GPYV8538');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_image` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_image`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(2, 'New Delhi', 'city/image/23-08-19/230819074030am-new-delhi-icon.png', '28.6139391', '77.2090212', '18-07-2019 10:56 am', '23-08-19 07:40 am'),
(3, 'Noida', 'city/image/23-08-19/230819074442am-noida-icon.png', '28.5355161', '77.3910265', '22-07-2019 11:49 am', '23-08-19 07:44 am'),
(4, 'Gurugram', 'city/image/23-08-19/230819075501am-ggn-icon.png', '28.4594965', '77.0266383', '15-08-2019 05:46 pm', '23-08-19 07:55 am'),
(5, 'Kolkata', 'N/A', '22.572646', '88.36389500000001', '10-09-2019 03:40 pm', '23-09-19 04:49 am'),
(7, 'Faridabad', 'city/images/12-09-2019/120919113016am-faridabad.jpg', '28.4089123', '77.3177894', '12-09-2019 11:30 am', 'N/A'),
(8, 'Lucknow', 'city/images/01-10-2020/011020104416am-delivery.png', '26.8466937', '80.94616599999999', '01-10-2020 10:44 am', 'N/A'),
(9, 'Karimnagar', 'city/images/01-10-2020/011020105348am-My-Post-(27).png', '18.4385553', '79.1288412', '01-10-2020 10:53 am', 'N/A'),
(10, 'Jaipur International Airport (JAI), Tonk Road, Jaipur, Rajasthan, India', 'city/images/01-10-2020/011020053945pm-delivery.png', '26.828096', '75.80594', '01-10-2020 05:39 pm', 'N/A'),
(11, 'Warangal, Telangana, India', 'city/images/06-10-2020/061020091934pm-images---2020-10-06T211917.176.jpeg', '17.97556', '79.60111', '06-10-2020 09:19 pm', 'N/A'),
(12, 'Siddipet, Telangana, India', 'N/A', '18.1048', '78.8486', '06-10-2020 09:48 pm', 'N/A'),
(15, 'Visakhapatnam, Andhra Pradesh, India', 'city/images/08-10-2020/081020024718pm-220920054850pm-delivery.png', '17.7', '83.25', '08-10-2020 02:47 pm', 'N/A'),
(16, 'Guntur, Andhra Pradesh, India', 'city/images/08-10-2020/081020053112pm-220920054850pm-delivery.png', '16.3', '80.45', '08-10-2020 05:31 pm', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `cityadmin`
--

CREATE TABLE `cityadmin` (
  `cityadmin_id` int(11) NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cityadmin`
--

INSERT INTO `cityadmin` (`cityadmin_id`, `city_id`, `cityadmin_name`, `cityadmin_image`, `cityadmin_phone`, `cityadmin_email`, `cityadmin_pass`, `cityadmin_address`, `lat`, `lng`, `device_id`, `created_at`, `updated_at`) VALUES
(1, '2', 'Nirmal', 'cityadmin_img/images/09-08-19/090819122814pm-1CA.png', '9837444500', 'support@tecmanic.com', '$2y$10$.sOI9/OUKDrJOyNvFnecCO16nw89ekZ6TIC7.P2NHinRmrkTRpVIS', 'Nirmal, Telangana, India', '19.0968', '78.3441', 'n/a', '16/09/2019', '30-09-20 01:53 pm'),
(2, '3', 'manoj', 'cityadmin_img/images/09-08-19/090819122838pm-585e4bf3cb11b227491c339a.png', '+918476978906', 'manoj@gmail.com', '$2y$10$vLNHKa6YpKKASmQCZymrBOoNlR8sSRSs6aN64vQpk.JX67mfhsSIW', 'vishal mega mart ,sector 58,noida', '28.6109652', '77.35406739999999', 'n/a', '22-07-2019 11:50 am', '03-09-19 04:26 pm'),
(8, '4', 'raga', 'cityadmin_img/images/20-08-2019/200819103014am-user.png', '+918476972136', 'deekhati64@gmail.com', '$2y$10$R3j3PKJuKQMAoxiTg.T9B.WKZ8w7eqMZwlapDn2cBOiXt8skILnDC', 'sector 63 Noida', '28.6209681', '77.3811702', 'n/a', '20-08-2019 10:30 am', 'N/A'),
(9, '7', 'Madhuri', 'cityadmin_img/images/12-09-19/120919113756am-comment_photo_2.jpg', '8859593839', 'yadavmadhuri0444@gmail.com', '$2y$10$pbXsHlRLCsLJUSWjvC4SdeUuxg4AJqWptHuO7dpIFIiXVsIX/7ko.', 'Sector 37Faridabad, Haryana', '28.4810408', '77.31166209999999', 'n/a', '12-09-2019 11:32 am', '12-09-19 11:40 am'),
(10, '5', 'Nirmal', 'cityadmin_img/images/30-09-20/300920042543pm-download-(1).png', '8106060660', 'ramana@gmail.com', '$2y$10$4GLNsUev4ePaplnC0ufIjOnMaylUAouUezFM0ILC8GLyeRX7aJNnC', 'Nirmal, Telangana, India', '19.0968', '78.3441', 'n/a', '03-09-2020 07:40 am', '30-09-20 04:25 pm'),
(11, '8', 'Testing', 'cityadmin_img/images/01-10-2020/011020104532am-images.jfif', '1234567890', 'admin@gmail.com', '$2y$10$fYmco09AJMttGJ0DKqqtvOpq8Vnn6Nty.S2dsQCsH0Ima9xAsax.a', 'Azam Bagh, Azamgarh, Azamgarh, Uttar Pradesh, India', '25.973826', '83.2215', 'n/a', '01-10-2020 10:45 am', 'N/A'),
(14, '12', 'siddipetadmin', 'cityadmin_img/images/06-10-2020/061020095249pm-logo_w.png', '9879879879', 'admin.sid@gmail.com', '$2y$10$yLD.2J.WKT4/WbYSpm8g4.XyVk3ZrqBYbZ1b/J7nBH.4TUHDQOiz2', 'Siddipet, Telangana, India', '18.1048', '78.8486', 'n/a', '06-10-2020 09:52 pm', '06-10-20 09:53 pm'),
(15, '9', 'pavan', 'cityadmin_img/images/06-10-2020/061020101155pm-My-Post-(82).png', '9346593974', 'demo@demo.com', '$2y$10$Lmx/MOoLsEKlOPDL8ey7AO6xEIXRrEIF6UKLBqVlctd9D.QautZYS', 'Karimnagar, Telangana, India', '18.43333', '79.15', 'n/a', '06-10-2020 10:11 pm', 'N/A'),
(16, '15', 'Test admin', 'cityadmin_img/images/08-10-2020/081020025247pm-220920054850pm-delivery.png', '8090908080', 'test@test.com', '$2y$10$frhGsSpyft4y5/8xi7l3weQdhzM/d1ZNJu7DAaTYJv/NsY0W3FN.C', 'Visakhapatnam International Airport (VTZ), NH 45, Visakhapatnam, Andhra Pradesh, India', '17.728425', '83.223417', 'n/a', '08-10-2020 02:52 pm', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `cityadmin_cat`
--

CREATE TABLE `cityadmin_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comission`
--

CREATE TABLE `comission` (
  `com_id` int(11) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `total_price` float NOT NULL,
  `comission_price` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comission`
--

INSERT INTO `comission` (`com_id`, `vendor_id`, `vendor_name`, `order_date`, `total_price`, `comission_price`, `status`, `cart_id`, `user_name`, `payment_method`) VALUES
(10, '1', 'dee', '2020-09-11', 100, 10, 'Paid', 'VZVZ5406', 'shivam', 'COD'),
(11, '1', 'Easy Day', '2020-09-26', 440, 44, '1', 'LDYN95f7', 'shivam', 'online'),
(18, '1', 'Easy Day', '2020-10-01', 870, 87, '1', 'CFRP97d9', 'Ajit', 'Card'),
(19, '40', 'Easy Day', '2020-10-01', 550, 55, '1', 'JJWT49f1', 'Ajit', 'COD'),
(22, '40', 'Easy Day', '2020-10-01', 440, 44, 'Paid', 'TPYX204e', 'Ajit', 'COD'),
(27, '40', 'Santa Banta', '2020-11-19', 1200, 120, 'Pending', 'CEAN8652', 'TecManic', 'COD'),
(28, '42', 'rakesh', '2020-11-24', 100, 10, 'Pending', 'FMVO5404', 'TecManic', 'COD'),
(29, '44', 'Vendor Parcel', '2020-11-30', 100, 10, 'Pending', 'GPYV8538', 'amir', 'wallet');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `complain_id` int(11) NOT NULL,
  `complain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`complain_id`, `complain_name`, `description`) VALUES
(1, 'product not delivered yet', 'product not delivered'),
(10, 'Product Damaged', 'igkhkkhk');

-- --------------------------------------------------------

--
-- Table structure for table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `completed_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `completed_orders`
--

INSERT INTO `completed_orders` (`completed_id`, `user_id`, `cart_id`, `delivery_date`, `delivery_boy_incentive`, `delivery_boy_id`, `created_at`) VALUES
(119, '220', '826e5', '29-02-2020', '0', '41', '2020-02-26 12:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `country_code`
--

CREATE TABLE `country_code` (
  `code_id` int(11) NOT NULL,
  `country_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_code`
--

INSERT INTO `country_code` (`code_id`, `country_code`) VALUES
(1, 91);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(100) NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `cart_value` int(100) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses_restriction` int(11) NOT NULL DEFAULT 1,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `coupon_description`, `start_date`, `end_date`, `cart_value`, `amount`, `type`, `uses_restriction`, `vendor_id`) VALUES
(1, 'No Cooking April Offer', 'APRI40', 'No cooking April use this code & get upto 50% off', '2020-05-01 00:00:00', '2020-09-10 00:00:00', 150, '40', 'Percentage', 2, 1),
(2, 'testing', 'APE245', 'sdfjv mdsfbvdn bmfsnbmx m vskn ,dz v,sldmv zk;dnf,bn w', '2020-05-01 00:00:00', '2020-09-10 00:00:00', 150, '100', 'price', 2, 1),
(3, 'TASTY', 'TASTYTO', '24 rs off on 800', '2020-08-26 14:52:00', '2020-12-29 14:52:00', 100, '30', 'price', 5, 1),
(5, 'No cooking November', 'NOV50', '50% off in november', '2020-11-03 00:00:00', '2020-12-31 00:00:00', 150, '20', 'percentage', 2, 38);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency`, `currency_sign`) VALUES
(1, 'Rupees', '₹');

-- --------------------------------------------------------

--
-- Table structure for table `deal_product`
--

CREATE TABLE `deal_product` (
  `deal_id` int(11) NOT NULL,
  `varient_id` int(11) NOT NULL,
  `deal_price` float NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `status` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_product`
--

INSERT INTO `deal_product` (`deal_id`, `varient_id`, `deal_price`, `valid_from`, `valid_to`, `status`, `vendor_id`) VALUES
(9, 103, 500, '2020-12-31', '2020-09-01', 1, 1),
(10, 108, 100, '2020-09-01', '2020-09-26', 1, 1),
(11, 110, 85, '2020-09-01', '2020-09-30', 1, 1),
(13, 144, 80, '2020-10-06', '2020-10-30', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `delivery_boy_id` int(11) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_boy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lng` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_boy_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online',
  `is_confirmed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `otp` int(100) DEFAULT NULL,
  `phone_verify` int(100) NOT NULL DEFAULT 0,
  `cityadmin_id` int(11) DEFAULT NULL,
  `dboy_comission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`delivery_boy_id`, `vendor_id`, `delivery_boy_name`, `delivery_boy_image`, `delivery_boy_phone`, `delivery_boy_pass`, `lat`, `lng`, `device_id`, `created_at`, `updated_at`, `delivery_boy_status`, `is_confirmed`, `otp`, `phone_verify`, `cityadmin_id`, `dboy_comission`) VALUES
(23, '1', 'raamu', 'delivery_boy_img/images/30-07-2019/300719061906am-3UK.png', '+918476978908', 'surbhi', '28.620764', '77.363930', '', '30-07-2019 06:19 am', '30-07-19 06:19 am', 'online', '1', NULL, 0, NULL, NULL),
(24, '1', 'ram', 'delivery_boy_img/images/30-07-2019/300719080505am-1cd7a7f24400914d5c0555bbbb0265ac.jpg', '7895811769', 'ram', '28.599621', '77.373634', 'fQRHwxEoTPSi80LeEFYJVh:APA91bHdRvyp4rtSTe-lr4UJc3d7MPj64hGX2Zv2ulQtRxBkYf5d02IWsaBHsXoPcbUkF8vZtDOwW3qLyvOLA4a0pvwbw0grge2Gch0uEPRgcIctflfB5tclFhMsMNS5H58K0JEhF_48', '30-07-2019 08:05 am', 'N/A', 'online', '1', NULL, 0, NULL, NULL),
(26, '1', 'yashasvi', 'delivery_boy_img/images/20-08-2019/200819051947am-user.png', '8750221354', '$2y$10$VfAq4u/fK5l1oGhVyXPO9evc4k.cxuwqGbSvBA48odOdVBQA2hy/W', '28.63063063063063', '77.37020126909101', '12345', '20-08-2019 05:19 am', '20-08-19 06:08 am', 'online', '1', NULL, 0, NULL, NULL),
(27, '1', 'Mohit Dere wala', 'delivery_boy_img/images/10-09-2019/100919075040am-delivery-man.jpg', '9728529934', '$2y$10$w79IVEkZyQpCzA8.ZbIBm.bjljieUFRuxNM85nvg5gr.ZIVypYa9y', '28.63063063063063', '77.37020126909101', '12345', '10-09-2019 07:50 am', '24-09-19 02:09 pm', 'online', '1', NULL, 0, NULL, NULL),
(28, '1', 'Mohitiya', 'delivery_boy_img/images/11-09-2019/110919080430am-delivery-man.jpg', '7210804086', '$2y$10$Rh0qhjKf03LLXxXFq83Q5Of.PBnmpxakYUJPjXHxqbs8sclAIX4pa', '28.6690893', '79.1300226', 'N/A', '11-09-2019 08:04 am', 'N/A', 'online', '1', NULL, 0, NULL, NULL),
(31, '1', 'Pappu', 'delivery_boy_img/images/15-09-2019/150919072015am-20663667_1931724413765092_2485467944631862191_n.jpg', '9887251777', '$2y$10$wOBS/FiehgO3PCFwCW.1YOjZ6QAes9F2n4/cpTmbur8eMRrQDXphO', '31.6690893', '85.1300226', '12345', '15-09-2019 07:20 am', 'N/A', 'online', '1', NULL, 0, NULL, NULL),
(32, '1', 'himanshu', 'delivery_boy_img/images/17-09-2019/170919095808am-10620780_326677070847361_4894746200701098486_n.jpg', '7579069269', '$2y$10$epYpvK0idPcJY0gsK4TMjeSAXLLd.KgullfglWl3fOEbdoneYRFPm', '39.6690893', '89.1300226', '12345', '17-09-2019 09:58 am', 'N/A', 'online', '1', NULL, 0, NULL, NULL),
(33, '1', 'abcd', 'delivery_boy_img/images/24-09-2019/240919020553pm-709fb341-0eed-4e4b-8ee9-5f05e395bdf6.jpg', '9709613710', '$2y$10$GtR.Bc4cX/klMTbRmTPHeOjMQMkQegQtiL1U0SN7m2sXi6YMVQ546', '25.603603603603602', '85.17449017326751', '12345', '24-09-2019 02:05 pm', '24-09-19 02:08 pm', 'online', '1', NULL, 0, NULL, NULL),
(34, '1', 'D-Boy', 'delivery_boy_img/images/10-09-2019/100919075040am-delivery-man.jpg', '8888888888', '$2y$10$w79IVEkZyQpCzA8.ZbIBm.bjljieUFRuxNM85nvg5gr.ZIVypYa9y', '13.063063063063064', '80.20159252653147', '12345', '10-09-2019 07:50 am', '24-09-19 02:09 pm', 'online', '1', NULL, 0, NULL, NULL),
(35, '1', 'Prabhu Deva123456', 'delivery_boy_img/images/17-12-19/171219064627am-eace51a42209dbead20d1905dd7dfa4c.jpeg', 'deekhati64@gmail.com', '$2y$10$x20U3E2UXxOvjkjzPXb1B..OhcOe//3ZR3SpzjAevbGrElRPLLiIm', '0', '0', 'N/A', '17-12-2019 05:40 am', '17-12-19 06:46 am', 'online', '2', NULL, 0, NULL, NULL),
(39, '1', 'Shivam', 'delivery_boy_img/images/18-12-2019/181219105002am-eace51a42209dbead20d1905dd7dfa4c.jpeg', '8287728806', '$2y$10$tzujM4kzH0sb5H.ZLvfPcu2iVNtYpTLzXm6nSuxiBSAJMD.qmN6BG', '0', '0', 'fMcpIFQCRCqMtoPa6KcKR6:APA91bEfGZDir2ZOppZPM-4VdPBXpw4l5NHAzsZE8_3zNELoLYhJ0RUZHJM48Op3WiGixD3KHK4KA-wPhy8LXhlCv1IPi2xasaGbgQ6XPpoeARdy4Qne--0PkBwLbtNE9WM2blbag22e', '18-12-2019 10:50 am', 'N/A', 'online', '1', NULL, 0, NULL, NULL),
(40, '1', 'Testing delivery boy', 'delivery_boy_img/images/20-12-2019/201219070836am-kisspng-digital-marketing-marketing-strategy-social-media-internet-png-images-png-mart-5c0e7c2c9723e1.5757274415444531646191.jpg', '+917520410113', '$2y$10$MowD/9E3hwZcaKpK7Lp15eOR/3GrNkCV1/sMJh6LUWhdnkDzBrPou', '0', '0', 'N/A', '20-12-2019 07:08 am', '20-12-19 07:10 am', 'online', '1', NULL, 0, NULL, NULL),
(41, '1', 'Shivam Rawat', 'delivery_boy_img/images/26-12-2019/261219064539am-ninja-computer-programming-learning-study-skills-avatar.jpg', '7520410113', '$2y$10$HL91pD65wDXuMuZWqJCGF.eW.5zbVVYL58kHUWvSSCH1K2MlEQeFy', '0', '0', 'N/A', '26-12-2019 06:45 am', 'N/A', 'offline', '1', 2222, 1, NULL, NULL),
(42, '1', 'qwertyuilo;', 'delivery_boy_img/images/22-01-2020/220120075828am-anonymous-512.png', '7411258963', '$2y$10$ma/U1NvOqDAvlYmz5Z/CMuV2X3Jzw.hzpDFgGNkgsEUy.oJnvUvHe', '0', '0', 'N/A', '22-01-2020 07:58 am', 'N/A', 'online', '0', NULL, 0, NULL, NULL),
(43, '1', 'rahull', 'delivery_boy_img/images/03-04-2020/030420100203am-_DSC9367.jpg', '7895611769', '$2y$10$9iKVi9m2VJ9stcIwJfgiCeA.J7hp6PWwS/hR0UNCdHtcHF5631VeG', '0', '0', 'N/A', '03-04-2020 10:02 am', 'N/A', 'online', '0', NULL, 0, NULL, NULL),
(44, '1', 'Testing', 'delivery_boy_img/images/03-09-2020/030920111517am-captain.png', '147852369', '$2y$10$nxXJjTxkMr7KvTg0HEfPFOMlFRtUgKp2qnAt2xmcmJf3NIU96ONfO', '0', '0', 'bjsbjhgwedgsgvrghb', '03-09-2020 11:15 am', 'N/A', 'online', '0', NULL, 0, NULL, NULL),
(45, '6', 'Store TecManic', 'delivery_boy_img/images/09-09-2020/090920054723pm-delivery-boy.png', '9876543210', '$2y$10$qG7tq5tK79pZw.X3.QEWWuiIj.lydmGS2FpB01mXjhvE9ICnOl4jG', '0', '0', 'cpDkf5GPT06K29odNEsxJX:APA91bF8OTn1sBVza-llWKhVLZxNvEvlcJrv63z5mAhK8WAq8iXhm74xk7qebypvkfzmjILRjMRi3xfxbcxwYaJGlOJxNa05PFIJIDG3OGCWjeOfL_LxDi0NIzUFMrWWtAhohrNxK6Fr', '09-09-2020 05:47 pm', 'N/A', 'online', '0', NULL, 0, NULL, NULL),
(46, NULL, 'City Admin Delivery Boy', 'delivery_boy_img/images/22-09-2020/220920054850pm-delivery.png', '7520410113', '$2y$10$zT8aI9cTfA50rYMqSev4MuQB4n/VE6Q8OyuPUZuFZjHjfyMfbmOKy', '0', '0', 'N/A', '22-09-2020 05:48 pm', 'N/A', 'online', '1', 2222, 1, 1, NULL),
(49, NULL, 'Urban', 'delivery_boy_img/images/01-10-2020/011020110723am-My-Post-(33).png', '9346593974', '$2y$10$pujEnyGqTteMA7fF1TdYqOTnVdRqOWxPX6P6BJH27QpCdRBQvGpu6', '0', '0', 'N/A', '01-10-2020 11:07 am', 'N/A', 'online', '1', NULL, 0, 12, 15),
(50, NULL, 'Ram Singh', 'delivery_boy_img/images/01-10-2020/011020021950pm-220920054850pm-delivery.png', '9759294464', '$2y$10$41SafmoBPRBGy8sXk/aQEOpqpW3jHWh6D31IfMxELpuBK9UdzDGMG', '0', '0', 'feFC_rK0SL2f8Kujm7feeq:APA91bH0zhVDJXTcAX06YNVGwwm-DzWDajSH1Sw-Y9YuBi9WwJF9s4ysArsCdnQ-hZx8W0DZ6U6XpZdPiWwlcnlI5yQtqVOyFetGs1jIcuXJLbdqOBF37qjsNa0pnvVRMIfrLX_xidLK', '01-10-2020 02:19 pm', '01-10-20 03:19 pm', 'online', '1', NULL, 0, 1, 25),
(51, NULL, 'City Admin Shivam', 'delivery_boy_img/images/06-10-2020/061020101754am-shop.png', '7520410113', '$2y$10$Di91H/jE4oiW8edMkuDuUO3yQR/1WnD/z2Tv1uaCvgm/N9BkF7tpO', '0', '0', 'N/A', '06-10-2020 10:17 am', '06-10-20 12:16 pm', 'online', '1', 2222, 1, 1, 20),
(52, NULL, 'Warangal', 'delivery_boy_img/images/06-10-2020/061020092633pm-images---2020-10-06T211917.176.jpeg', '9515062272', '$2y$10$j2AT0M1eEHOHtmKGAk.1rewZQVhy/Jw7irGEfLEvL0q8.c/3qW4z.', '0', '0', 'N/A', '06-10-2020 09:26 pm', 'N/A', 'online', '1', 2222, 1, 11, 10),
(53, '15', 'Warangal.boy', 'delivery_boy_img/images/06-10-2020/061020093232pm-images---2020-10-06T211917.176.jpeg', '9876543210', '$2y$10$hzqioCkoT7lRv3WHvkkuyOjo6ZtYgznYl6jvJV0XuUXMOAsjbTgde', '0', '0', 'cpDkf5GPT06K29odNEsxJX:APA91bF8OTn1sBVza-llWKhVLZxNvEvlcJrv63z5mAhK8WAq8iXhm74xk7qebypvkfzmjILRjMRi3xfxbcxwYaJGlOJxNa05PFIJIDG3OGCWjeOfL_LxDi0NIzUFMrWWtAhohrNxK6Fr', '06-10-2020 09:32 pm', 'N/A', 'online', '1', NULL, 0, NULL, 10),
(54, '12', 'urban', 'delivery_boy_img/images/06-10-2020/061020093444pm-My-Post-(27).png', '9573002365', '$2y$10$ICe4CPdAgyU1ogjSWYS0tuW2ZhcIGaFqOcddnIMKx5htscTIfMQSW', '0', '0', 'dqiVeImTRdamc469ne-EWA:APA91bFgXOLnxUt6pwAoS5lchD-MuD4hWIXJt8jYKVn7XlIGRnZC0cx54tQAK-spphH05p9mzqhYpgDnL6331T_Rs_ZYztymDQtec4bYvgPQJq842zqcTqKAaigq9cJ5m8OZrDGMu-UF', '06-10-2020 09:34 pm', 'N/A', 'online', '1', NULL, 0, NULL, 5),
(55, NULL, 'sid.deliveryboy', 'delivery_boy_img/images/06-10-2020/061020100349pm-logo_w.png', '9879879879', '$2y$10$r5ByMr09.C51LqV26hazIO/m0jc6CsxzYmjYyCcWb5cogejZm6iF2', '0', '0', 'N/A', '06-10-2020 10:03 pm', 'N/A', 'online', '0', NULL, 0, 14, 10),
(56, '17', 'pavan', 'delivery_boy_img/images/06-10-2020/061020101444pm-My-Post-(34).png', '9573002365', '$2y$10$LcRGjvgYiYjlrHZjH8R9r.GrC8Paahb0Pj0Mt3uyUKw50oXEkjyRS', '0', '0', 'dqiVeImTRdamc469ne-EWA:APA91bFgXOLnxUt6pwAoS5lchD-MuD4hWIXJt8jYKVn7XlIGRnZC0cx54tQAK-spphH05p9mzqhYpgDnL6331T_Rs_ZYztymDQtec4bYvgPQJq842zqcTqKAaigq9cJ5m8OZrDGMu-UF', '06-10-2020 10:14 pm', 'N/A', 'online', '1', NULL, 0, NULL, 5),
(57, NULL, 'urban delivery boy', 'delivery_boy_img/images/06-10-2020/061020101521pm-My-Post-(28).png', '9346593974', '$2y$10$gLogzh0yPgYUZM/6zIytGuSpr7/AHHTXQ37mpCNi0WzlVrHR/.7oC', '0', '0', 'N/A', '06-10-2020 10:15 pm', 'N/A', 'online', '1', NULL, 0, 15, 10),
(58, '21', 'amir', 'delivery_boy_img/images/08-10-2020/081020050109pm-220920054850pm-delivery.png', '1234567890', '$2y$10$PnykHz.kUgfsTJfVl/yVluS.COusLBiVsiA6p3GfwGKuHwcKC96ni', '0', '0', 'clxnizn_RdqmQTP9eXZqHF:APA91bHeGoZYDVuBVccHa5PVu8_X5MCdmnYC6MKWqPQz0g_UKMZl63Vnx4jACFp-rW4zACiWfPjmgSopvHSUiYUypbOioruxf5c1aDWkWtoIMN-vk9KUzJs_v_A6yr7P1BfHn_htsuU5', '08-10-2020 05:01 pm', 'N/A', 'online', '0', NULL, 0, NULL, 20),
(60, '1', 'praanay', 'delivery_boy_img/images/09-10-2020/091020090816pm-logo_w.png', '9876543210', '$2y$10$76ZbKRiJxmvZ/do538ZAxugRrYktLpdJOfpe71D4i6wmeLWzkmtgm', '0', '0', 'cpDkf5GPT06K29odNEsxJX:APA91bF8OTn1sBVza-llWKhVLZxNvEvlcJrv63z5mAhK8WAq8iXhm74xk7qebypvkfzmjILRjMRi3xfxbcxwYaJGlOJxNa05PFIJIDG3OGCWjeOfL_LxDi0NIzUFMrWWtAhohrNxK6Fr', '09-10-2020 09:08 pm', 'N/A', 'online', '1', NULL, 0, NULL, 10),
(61, '3', 'test pranay', 'delivery_boy_img/images/09-10-2020/091020092821pm-logo_w.png', '1234567890', '$2y$10$Fn0RtajTF.1PQiAJ8ZfoXOXx2jJBtTt6PJAgBKSFVPVB0mXMlfKHC', '0', '0', 'clxnizn_RdqmQTP9eXZqHF:APA91bHeGoZYDVuBVccHa5PVu8_X5MCdmnYC6MKWqPQz0g_UKMZl63Vnx4jACFp-rW4zACiWfPjmgSopvHSUiYUypbOioruxf5c1aDWkWtoIMN-vk9KUzJs_v_A6yr7P1BfHn_htsuU5', '09-10-2020 09:28 pm', 'N/A', 'online', '1', NULL, 0, NULL, 10),
(62, '24', 'Shamsheer', 'delivery_boy_img/images/03-11-2020/031120023211pm-delivery.png', '1234567890', '$2y$10$OH5RrfU1YpVJbWLutN2Ek.seFRJY34BPD0/zjPy.85wbJwyJWqmnW', '0', '0', 'N/A', '03-11-2020 02:32 pm', '03-11-20 02:32 pm', 'online', '0', NULL, 0, NULL, 20),
(63, '38', 'Vivan', 'delivery_boy_img/images/16-11-2020/161120012933pm-delivery.png', '8585858585', '$2y$10$6gncvQ17e4Ufya8wHP8ta.3fgidM9iv10wKByX/g1PnkDk1uRlhAW', '0', '0', 'egkUESC8SzCJEXw10LctCr:APA91bHO1Gmaz8WQGq_a_L-u71Co5f_W3eeAlpwcWKgv0U6q9ryUmi3xqLTr1KBGuNVKr4kZIkQN7Hc0zUZ_i2z8lhS4bVIAmhmP9Ujx0kQQuMRrq81fJjOPE5_TCcXHoVK4YUHGhwJz', '16-11-2020 01:29 pm', 'N/A', 'online', '1', NULL, 0, NULL, 10),
(64, '42', 'ravi', 'delivery_boy_img/images/24-11-2020/241120033657pm-220920054850pm-delivery.png', '7654321890', '$2y$10$1Nfx7bXmTyjuo9ljUeYBeOHJ8j4t6MjA1M0f38sOXmeBuGHT4B7.K', '0', '0', 'N/A', '24-11-2020 03:36 pm', 'N/A', 'online', '1', NULL, 0, NULL, 40),
(65, '42', 'raj', 'delivery_boy_img/images/25-11-2020/251120115803am-220920054850pm-delivery.png', '5555544444', '$2y$10$nL7lllWR9Odqdt0GF7/1/O.YRV9JLOl11KS4XxoYf92OtuRvJAnW2', '0', '0', 'N/A', '25-11-2020 11:58 am', '25-11-20 11:59 am', 'online', '1', NULL, 0, NULL, 10),
(66, '44', 'raj', 'delivery_boy_img/images/30-11-2020/301120072454pm-220920054850pm-delivery.png', '1234567890', '$2y$10$Xwn.tFwPGh.YbSmKEFLDJecAvRrDrLHpm.QwvAgbGtF4I7dNmE212', '0', '0', 'N/A', '30-11-2020 07:24 pm', 'N/A', 'online', '1', NULL, 0, NULL, 20),
(67, '44', 'Tata', 'delivery_boy_img/images/03-12-2020/031220020604pm-delivery.png', '4564564564', '$2y$10$v8N6KSgpwVwTNd838Nh41u5jAEAKyzeBBQyTvXcEOYTOHn3uWOuy.', '0', '0', 'N/A', '03-12-2020 02:06 pm', 'N/A', 'online', '1', NULL, 0, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_area`
--

CREATE TABLE `delivery_boy_area` (
  `delivery_boy_area_id` int(11) NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy_area`
--

INSERT INTO `delivery_boy_area` (`delivery_boy_area_id`, `delivery_boy_id`, `area_id`) VALUES
(12, '23', '1'),
(13, '23', '1'),
(19, '26', '1'),
(24, '28', '1'),
(25, '28', '1'),
(26, '24', '1'),
(27, '29', '1'),
(28, '30', '1'),
(29, '31', '1'),
(30, '32', '1'),
(32, '33', '1'),
(33, '27', '1'),
(34, '27', '1'),
(35, '27', '1'),
(36, '27', '1'),
(39, '37', '1'),
(41, '35', '1'),
(42, '36', '1'),
(43, '38', '1'),
(44, '39', '1'),
(47, '40', '1'),
(48, '41', '1'),
(49, '42', '1'),
(50, '22', '1'),
(51, '22', '2'),
(52, '22', '3'),
(53, '22', '6'),
(54, '22', '10'),
(55, '22', '11'),
(56, '22', '17'),
(57, '43', '2'),
(58, '44', '23'),
(59, '45', '22'),
(60, '46', '1'),
(61, '46', '2'),
(62, '47', '2'),
(63, '47', '3'),
(68, '49', '29'),
(73, '50', '1'),
(74, '50', '2'),
(75, '50', '3'),
(77, '51', '24'),
(78, '52', '35'),
(79, '53', '35'),
(80, '54', '29'),
(81, '54', '30'),
(82, '54', '31'),
(83, '54', '32'),
(84, '54', '36'),
(85, '55', '37'),
(86, '56', '39'),
(87, '57', '39'),
(88, '58', '40'),
(89, '59', '3'),
(90, '60', '3'),
(91, '61', '25'),
(93, '62', '41'),
(94, '63', '11'),
(95, '64', '43'),
(97, '65', '12'),
(98, '66', '6'),
(99, '67', '6');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_comission`
--

CREATE TABLE `delivery_boy_comission` (
  `dboy_comission_id` int(11) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `comission_price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy_comission`
--

INSERT INTO `delivery_boy_comission` (`dboy_comission_id`, `delivery_boy_id`, `vendor_id`, `order_date`, `total_price`, `comission_price`, `status`, `cart_id`, `user_name`, `payment_method`) VALUES
(1, 23, 1, '2020-09-27', 100, 10, 'Pending', 'cart_id', 'Shivam', 'online'),
(2, 50, 1, '2020-10-09', 540, 135, 'Pending', 'MSOI376b', 'Ajit', 'COD'),
(3, 63, 38, '2020-11-19', 1200, 120, 'Pending', 'CEAN8652', 'TecManic', 'COD'),
(4, 65, 42, '2020-11-24', 100, 10, 'Pending', 'FMVO5404', 'TecManic', 'COD'),
(5, 65, 44, '2020-11-30 21:08:38', 100, 10, 'Pending', 'GPYV8538', 'amir', 'wallet');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy_vendor`
--

CREATE TABLE `delivery_boy_vendor` (
  `delivery_boy_vendor_id` int(10) NOT NULL,
  `delivery_boy_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boy_vendor`
--

INSERT INTO `delivery_boy_vendor` (`delivery_boy_vendor_id`, `delivery_boy_id`, `vendor_id`) VALUES
(5, 50, 1),
(6, 50, 3),
(8, 51, 1),
(9, 52, 15),
(10, 55, 16),
(11, 57, 17),
(12, 59, 5);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_timing`
--

CREATE TABLE `delivery_timing` (
  `delivery_timing_id` int(11) NOT NULL,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_timing_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_timing`
--

INSERT INTO `delivery_timing` (`delivery_timing_id`, `delivery_type`, `delivery_timing_text`, `delivery_time_slot`) VALUES
(1, 'subscribe', 'Delivery Between', '05:30 AM - 07:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `destination_address`
--

CREATE TABLE `destination_address` (
  `destination_address_id` int(11) NOT NULL,
  `destination_pincode` int(11) NOT NULL,
  `destination_houseno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination_address`
--

INSERT INTO `destination_address` (`destination_address_id`, `destination_pincode`, `destination_houseno`, `destination_landmark`, `destination_add`, `destination_state`, `destination_city`, `destination_lat`, `destination_lng`, `destination_name`, `destination_phone`) VALUES
(1, 202002, '22', 'show', 'center', 'up', 'noida', NULL, NULL, NULL, NULL),
(2, 202002, '22', 'show', 'center', 'up', 'noida', NULL, NULL, NULL, NULL),
(3, 202002, '22', 'show', 'center', 'up', 'noida', NULL, NULL, NULL, NULL),
(4, 202002, '22', 'show', 'center', 'up', 'noida', NULL, NULL, NULL, NULL),
(5, 131001, 'house 1540', 'hanuman mandir', 'Sector 14', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(6, 202002, '22', 'show', 'center', 'up', 'noida', NULL, NULL, NULL, NULL),
(7, 131001, 'house 1540', 'hanuman mandir', 'Sector 14', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(8, 131001, 'house 1540', 'hanuman mandir', 'Sector 14', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(9, 131001, 'house 1540', 'hanuman mandir', 'Sector 14', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(10, 131001, 'house 1540', 'hanuman mandir', 'Sector 14', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(2, 'How to subscribe a product ?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.');

-- --------------------------------------------------------

--
-- Table structure for table `fcm_key`
--

CREATE TABLE `fcm_key` (
  `unique_id` int(200) NOT NULL,
  `user_app_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dboy_app_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fcm_key`
--

INSERT INTO `fcm_key` (`unique_id`, `user_app_key`, `vendor_app_key`, `dboy_app_key`) VALUES
(1, 'AAAAmgTjGYw:APA91bFf-_iPWQ5_jMQHBX6ysjPZ1UFQsLFMF1ztuMcZGPdGxJ77Ki46_vCsJu-dM38LU3UqY_AGQMykttsIw3NNsSouQfGTDCz-QV2Fww6k6ovUUSYjhMbNZ9GwIFHWaNzrdzQJHmqT', 'AAAAsMc8tIA:APA91bGRMglAYrAkoLIkt4ZfENWcnKPkrxD7ODxxCaW0taPN6GYjcOA04RSSPPNIYdc0OdQp1yDpDU5-O88N-ARy2h8pJPfBu91DSx-nru5xO-qQwsmF1cE8gkxw7cb8mLFMqYF7Y-y7', 'AAAAmgTjGYw:APA91bFf-_iPWQ5_jMQHBX6ysjPZ1UFQsLFMF1ztuMcZGPdGxJ77Ki46_vCsJu-dM38LU3UqY_AGQMykttsIw3NNsSouQfGTDCz-QV2Fww6k6ovUUSYjhMbNZ9GwIFHWaNzrdzQJHmqT');

-- --------------------------------------------------------

--
-- Table structure for table `first_wallet_recharge`
--

CREATE TABLE `first_wallet_recharge` (
  `deal_id` int(11) NOT NULL,
  `min_wallet_recharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_wallet_recharge`
--

INSERT INTO `first_wallet_recharge` (`deal_id`, `min_wallet_recharge`, `product_id`, `city_id`, `free_for`) VALUES
(3, '2000', '2', '2', '5'),
(4, '3000', '5', '2', '10');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holiday_id`, `user_id`, `holiday`) VALUES
(6, '219', '09-08-2019'),
(7, '219', '10-08-2019'),
(8, '219', '12-08-2019'),
(9, '219', '09-08-2019'),
(10, '219', '10-08-2019'),
(11, '219', '12-08-2019'),
(12, '219', '09-08-2019'),
(13, '219', '10-08-2019'),
(14, '219', '12-08-2019'),
(15, '219', '09-08-2019'),
(16, '219', '10-08-2019'),
(17, '219', '12-08-2019');

-- --------------------------------------------------------

--
-- Table structure for table `homecat`
--

CREATE TABLE `homecat` (
  `homecat_id` int(200) NOT NULL,
  `homecat_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homecat_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homecat`
--

INSERT INTO `homecat` (`homecat_id`, `homecat_name`, `order`, `homecat_status`, `cityadmin_id`) VALUES
(1, 'Dairy Goodness', '1', '1', '1'),
(18, 'Poultry', '4', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `incentive`
--

CREATE TABLE `incentive` (
  `incentive_id` int(11) NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remaining_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incentive`
--

INSERT INTO `incentive` (`incentive_id`, `delivery_boy_id`, `total_incentive`, `paid_incentive`, `remaining_incentive`) VALUES
(1, '22', '95', '120', '-25'),
(2, '26', '62', '50', '12'),
(3, '27', '75', '50', '25'),
(4, '41', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `incentive_amount`
--

CREATE TABLE `incentive_amount` (
  `incentive_amount_id` int(11) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cityadmin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incentive_amount`
--

INSERT INTO `incentive_amount` (`incentive_amount_id`, `vendor_id`, `delivery_boy_incentive`, `cityadmin_id`) VALUES
(1, '1', '20', 0),
(2, '8', '0', 0),
(3, '9', '0', 0),
(4, '5', '0', 0),
(6, '6', '10', NULL),
(8, '7', '10', NULL),
(9, NULL, '0', 11),
(10, NULL, '0', 11),
(11, NULL, '0', 12),
(12, NULL, '0', 12),
(13, NULL, '0', 13),
(14, NULL, '0', 14),
(15, NULL, '0', 15),
(16, NULL, '0', 16),
(17, NULL, '0', 17);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_name`, `logo_image`) VALUES
(1, 'GoMarket', 'logo/image/23-08-19/230819124541pm-milk-subscription.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapbox`
--

CREATE TABLE `mapbox` (
  `map_id` int(11) NOT NULL,
  `mapbox_api` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapbox`
--

INSERT INTO `mapbox` (`map_id`, `mapbox_api`) VALUES
(1, 'pk.eyJ1IjoidGVjbWFuaWMiLCJhIjoiY2tlbDN4MjIxMGl0bTJxbndybWI5NDI1aSJ9.YDxhv1dk6iqOrNejmQq_Pg');

-- --------------------------------------------------------

--
-- Table structure for table `map_API`
--

CREATE TABLE `map_API` (
  `key_id` int(11) NOT NULL,
  `map_api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_API`
--

INSERT INTO `map_API` (`key_id`, `map_api_key`) VALUES
(1, 'l9tSWxeB-Glu5orDFikU07bw83E4RSQ');

-- --------------------------------------------------------

--
-- Table structure for table `map_settings`
--

CREATE TABLE `map_settings` (
  `map_id` int(11) NOT NULL,
  `mapbox` int(11) NOT NULL,
  `google_map` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_settings`
--

INSERT INTO `map_settings` (`map_id`, `mapbox`, `google_map`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg91`
--

CREATE TABLE `msg91` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msg91`
--

INSERT INTO `msg91` (`id`, `sender_id`, `api_key`, `active`) VALUES
(1, 'GOGRCK', '197064AVzt8vx55d4d55f3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notificationby`
--

CREATE TABLE `notificationby` (
  `n_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationby`
--

INSERT INTO `notificationby` (`n_id`, `user_id`, `sms`, `app`, `email`) VALUES
(1, '219', '1', '1', '1'),
(2, '220', '1', '1', '1'),
(3, '221', '1', '1', '0'),
(4, '242', '1', '1', '0'),
(5, '243', '1', '1', '0'),
(6, '244', '1', '1', '0'),
(7, '245', '1', '1', '0'),
(8, '246', '1', '1', '0'),
(9, '247', '1', '1', '0'),
(10, '248', '1', '1', '0'),
(11, '249', '1', '1', '1'),
(12, '250', '1', '1', '0'),
(13, '251', '1', '1', '0'),
(14, '252', '1', '1', '0'),
(15, '253', '1', '1', '0'),
(16, '254', '1', '1', '0'),
(17, '255', '1', '1', '0'),
(18, '256', '1', '1', '0'),
(19, '257', '1', '1', '0'),
(20, '258', '1', '1', '0'),
(21, '259', '1', '1', '0'),
(22, '260', '1', '1', '0'),
(23, '261', '1', '1', '0'),
(24, '262', '1', '1', '0'),
(25, '263', '1', '1', '0'),
(26, '264', '1', '1', '0'),
(27, '265', '1', '1', '0'),
(28, '266', '1', '1', '0'),
(29, '267', '1', '1', '0'),
(30, '268', '1', '1', '0'),
(31, '269', '1', '1', '0'),
(32, '270', '1', '1', '1'),
(33, '271', '1', '1', '1'),
(34, '272', '1', '1', '0'),
(35, '273', '1', '1', '0'),
(36, '274', '1', '1', '0'),
(37, '275', '1', '1', '0'),
(38, '276', '1', '1', '0'),
(39, '277', '1', '1', '0'),
(40, '278', '1', '1', '0'),
(41, '279', '1', '1', '0'),
(42, '280', '1', '1', '0'),
(43, '281', '1', '1', '0'),
(44, '282', '1', '1', '0'),
(45, '283', '1', '1', '0'),
(46, '284', '1', '1', '0'),
(47, '285', '1', '1', '1'),
(48, '286', '1', '1', '0'),
(49, '287', '1', '1', '0'),
(50, '288', '1', '1', '0'),
(51, '289', '1', '1', '0'),
(52, '290', '1', '1', '0'),
(53, '291', '1', '1', '0'),
(54, '292', '1', '1', '0'),
(55, '293', '1', '1', '0'),
(56, '294', '1', '1', '0'),
(57, '295', '1', '1', '0'),
(58, '296', '1', '1', '0'),
(59, '297', '1', '1', '0'),
(60, '298', '1', '1', '0'),
(61, '299', '1', '1', '0'),
(62, '300', '1', '1', '0'),
(63, '301', '1', '1', '0'),
(64, '302', '1', '1', '0'),
(65, '303', '1', '1', '0'),
(66, '304', '1', '1', '0'),
(67, '305', '1', '1', '0'),
(68, '306', '1', '1', '1'),
(69, '307', '1', '1', '0'),
(70, '308', '1', '1', '1'),
(71, '309', '1', '1', '0'),
(72, '310', '1', '1', '0'),
(73, '311', '1', '1', '0'),
(74, '312', '1', '1', '0'),
(75, '313', '1', '1', '0'),
(76, '314', '1', '1', '0'),
(77, '315', '1', '1', '0'),
(78, '316', '1', '1', '0'),
(79, '317', '1', '1', '0'),
(80, '318', '1', '1', '0'),
(81, '319', '1', '1', '0'),
(82, '320', '1', '1', '0'),
(83, '321', '1', '1', '0'),
(84, '322', '1', '1', '0'),
(85, '323', '1', '1', '0'),
(86, '324', '1', '1', '0'),
(87, '325', '1', '1', '0'),
(88, '326', '1', '1', '0'),
(89, '327', '1', '1', '0'),
(90, '328', '1', '1', '0'),
(91, '329', '1', '1', '0'),
(92, '330', '1', '1', '0'),
(93, '331', '1', '1', '0'),
(94, '332', '1', '1', '0'),
(95, '333', '1', '1', '0'),
(96, '334', '1', '1', '0'),
(97, '335', '1', '1', '0'),
(98, '336', '1', '1', '0'),
(99, '337', '1', '1', '0'),
(100, '338', '1', '1', '0'),
(101, '339', '1', '1', '0'),
(102, '340', '1', '1', '0'),
(103, '341', '1', '1', '0'),
(104, '342', '1', '1', '0'),
(105, '343', '1', '1', '0'),
(106, '344', '1', '1', '0'),
(107, '345', '1', '1', '0'),
(108, '346', '1', '1', '0'),
(109, '347', '1', '1', '0'),
(110, '348', '1', '1', '0'),
(111, '349', '1', '1', '0'),
(112, '350', '1', '1', '0'),
(113, '351', '1', '1', '0'),
(114, '352', '1', '1', '0'),
(115, '353', '1', '1', '0'),
(116, '354', '1', '1', '0'),
(117, '355', '1', '1', '0'),
(118, '356', '1', '1', '0'),
(119, '357', '1', '1', '0'),
(120, '358', '1', '1', '0'),
(121, '359', '1', '1', '1'),
(122, '360', '1', '1', '0'),
(123, '361', '1', '1', '0'),
(124, '362', '1', '1', '0'),
(125, '363', '1', '1', '0'),
(126, '364', '1', '1', '0'),
(127, '365', '1', '1', '0'),
(128, '366', '1', '1', '0'),
(129, '367', '1', '1', '0'),
(130, '368', '1', '1', '0'),
(131, '369', '1', '1', '0'),
(132, '370', '1', '1', '0'),
(133, '371', '1', '1', '0'),
(134, '372', '1', '1', '0'),
(135, '373', '1', '1', '0'),
(136, '374', '1', '1', '1'),
(137, '375', '1', '1', '0'),
(138, '376', '1', '1', '0'),
(139, '377', '1', '1', '0'),
(140, '378', '1', '1', '0'),
(141, '379', '0', '1', '1'),
(142, '380', '1', '1', '0'),
(143, '381', '1', '1', '1'),
(144, '382', '1', '1', '0'),
(145, '383', '1', '1', '0'),
(146, '384', '1', '1', '0'),
(147, '385', '1', '1', '0'),
(148, '386', '1', '1', '0'),
(149, '387', '1', '1', '0'),
(150, '388', '1', '1', '0'),
(151, '389', '1', '1', '0'),
(152, '390', '1', '1', '0'),
(153, '391', '1', '1', '0'),
(154, '392', '1', '1', '0'),
(155, '393', '1', '1', '0'),
(156, '394', '1', '1', '0'),
(157, '395', '1', '1', '0'),
(158, '396', '1', '1', '0'),
(159, '397', '1', '1', '0'),
(160, '398', '1', '1', '0'),
(161, '399', '1', '1', '0'),
(162, '400', '1', '1', '0'),
(163, '401', '1', '1', '0'),
(164, '402', '1', '1', '0'),
(165, '403', '1', '1', '0'),
(166, '404', '1', '1', '0'),
(167, '405', '1', '1', '0'),
(168, '406', '1', '1', '0'),
(169, '407', '1', '1', '0'),
(170, '408', '1', '1', '0'),
(171, '409', '1', '1', '0'),
(172, '410', '1', '1', '0'),
(173, '411', '1', '1', '0'),
(174, '412', '1', '1', '0'),
(175, '413', '1', '1', '0'),
(176, '414', '1', '1', '0'),
(177, '415', '1', '1', '0'),
(178, '416', '1', '1', '0'),
(179, '417', '1', '1', '0'),
(180, '418', '1', '1', '0'),
(181, '419', '1', '1', '0'),
(182, '420', '1', '1', '0'),
(183, '1', '1', '1', '0'),
(184, '1', '1', '1', '0'),
(185, '421', '1', '1', '1'),
(186, '422', '1', '1', '0'),
(187, '1', '1', '1', '0'),
(188, '423', '1', '1', '0'),
(189, '424', '1', '1', '0'),
(190, '1', '1', '1', '0'),
(191, '425', '1', '1', '0'),
(192, '426', '1', '1', '0'),
(193, '427', '1', '1', '0'),
(194, '428', '1', '1', '0'),
(195, '429', '1', '1', '0'),
(196, '1', '1', '1', '0'),
(197, '1', '1', '1', '0'),
(198, '1', '1', '1', '0'),
(199, '1', '1', '1', '0'),
(200, '1', '1', '1', '0'),
(201, '1', '1', '1', '0'),
(202, '1', '1', '1', '0'),
(203, '1', '1', '1', '0'),
(204, '430', '1', '1', '0'),
(205, '1', '1', '1', '0'),
(206, '431', '1', '1', '0'),
(207, '432', '1', '1', '0'),
(208, '1', '1', '1', '0'),
(209, '433', '1', '1', '0'),
(210, '434', '1', '1', '0'),
(211, '435', '1', '1', '0'),
(212, '436', '1', '1', '0'),
(213, '437', '1', '1', '0'),
(214, '438', '1', '1', '0'),
(215, '1', '1', '1', '0'),
(216, '439', '1', '1', '0'),
(217, '440', '1', '1', '0'),
(218, '441', '1', '1', '0'),
(219, '442', '1', '1', '0'),
(220, '443', '1', '1', '0'),
(221, '444', '1', '1', '0'),
(222, '445', '1', '1', '0'),
(224, '447', '1', '1', '0'),
(225, '448', '1', '1', '0'),
(226, '449', '1', '1', '0'),
(227, '1', '1', '1', '0'),
(228, '450', '1', '1', '0'),
(229, '451', '1', '1', '0'),
(230, '452', '1', '1', '0'),
(231, '453', '1', '1', '0'),
(232, '454', '1', '1', '0'),
(233, '455', '1', '1', '0'),
(234, '456', '1', '1', '0'),
(235, '457', '1', '1', '0'),
(236, '458', '1', '1', '0'),
(237, '459', '1', '1', '0'),
(238, '460', '1', '1', '0'),
(239, '461', '1', '1', '0'),
(240, '462', '1', '1', '0'),
(241, '463', '1', '1', '0'),
(242, '464', '1', '1', '0'),
(243, '465', '1', '1', '0'),
(244, '433', '1', '1', '1'),
(245, '421', '1', '1', '1'),
(247, '467', '1', '1', '0'),
(248, '468', '1', '1', '0'),
(249, '469', '1', '1', '0'),
(250, '470', '1', '1', '0'),
(251, '471', '1', '1', '0'),
(253, '473', '1', '1', '0'),
(254, '474', '1', '1', '0'),
(255, '475', '1', '1', '0'),
(256, '476', '1', '1', '0'),
(257, '1', '1', '1', '0'),
(258, '477', '1', '1', '0'),
(259, '478', '1', '1', '0'),
(260, '479', '1', '1', '0'),
(261, '480', '1', '1', '0'),
(262, '1', '1', '1', '0'),
(263, '481', '1', '1', '0'),
(264, '482', '1', '1', '0'),
(265, '483', '1', '1', '0'),
(266, '484', '1', '1', '0'),
(267, '485', '1', '1', '0'),
(268, '486', '1', '1', '0'),
(269, '487', '1', '1', '0'),
(270, '489', '1', '1', '1'),
(271, '490', '1', '1', '1'),
(273, '492', '1', '1', '1'),
(274, '493', '1', '1', '1'),
(275, '494', '1', '1', '1'),
(278, '497', '1', '1', '1'),
(279, '498', '1', '1', '1'),
(281, '500', '1', '1', '1'),
(282, '501', '1', '1', '1'),
(283, '502', '1', '1', '1'),
(290, '509', '1', '1', '1'),
(299, '518', '1', '1', '1'),
(306, '525', '1', '1', '1'),
(311, '530', '1', '1', '1'),
(313, '532', '1', '1', '1'),
(314, '533', '1', '1', '1'),
(315, '534', '1', '1', '1'),
(316, '535', '1', '1', '1'),
(317, '536', '1', '1', '1'),
(318, '537', '0', '1', '1'),
(319, '538', '1', '1', '1'),
(320, '539', '1', '1', '1'),
(321, '540', '1', '1', '1'),
(322, '541', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `not_accepted`
--

CREATE TABLE `not_accepted` (
  `not_accepted_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `not_accepted`
--

INSERT INTO `not_accepted` (`not_accepted_id`, `user_id`, `cart_id`, `delivery_boy_id`, `delivery_date`, `created_at`) VALUES
(24, '220', 'c8415', '41', '15-03-2020', '2020-02-26 13:52:43'),
(25, '220', 'c8415', '41', '18-03-2020', '2020-02-26 14:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `price_without_delivery` float NOT NULL,
  `total_products_mrp` float NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_by_wallet` float NOT NULL DEFAULT 0,
  `rem_price` float NOT NULL DEFAULT 0,
  `order_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_charge` float NOT NULL DEFAULT 0,
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dboy_id` int(11) NOT NULL DEFAULT 0,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `user_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelling_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` int(11) NOT NULL DEFAULT 0,
  `coupon_discount` float NOT NULL DEFAULT 0,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_by_store` int(11) NOT NULL DEFAULT 0,
  `canceled_at` datetime DEFAULT NULL,
  `dboy_incentive` float NOT NULL,
  `ui_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `vendor_id`, `address_id`, `cart_id`, `total_price`, `price_without_delivery`, `total_products_mrp`, `payment_method`, `paid_by_wallet`, `rem_price`, `order_date`, `delivery_date`, `delivery_charge`, `time_slot`, `dboy_id`, `order_status`, `user_signature`, `cancelling_reason`, `coupon_id`, `coupon_discount`, `payment_status`, `cancel_by_store`, `canceled_at`, `dboy_incentive`, `ui_type`) VALUES
(525, 421, 1, 120, 'UFIJ811f', 101, 100, 100, NULL, 0, 101, '2020-09-08', '2020-11-10', 1, 'by 12 pm', 39, 'Confirmed', 'images/user/290920134825user_signature.png', 'testing for cancelation', 0, 0, 'COD', 0, '2020-09-09 15:49:58', 30, NULL),
(526, 421, 1, 118, 'GLAT59ab', 101, 100, 100, NULL, 0, 101, '2020-09-10', '2020-09-10', 1, '13:00-16:00', 0, 'Cancelled', NULL, NULL, 0, 0, NULL, 0, '2020-09-17 04:59:01', 30, NULL),
(527, 421, 1, 118, 'ZQMU987a', 101, 100, 100, NULL, 0, 101, '2020-09-09', '2020-09-09', 1, '13:00-16:00', 0, 'Cancelled', NULL, 'testing for cancelation', 0, 0, NULL, 0, '2020-09-15 12:32:19', 30, NULL),
(528, 421, 1, 118, 'WMIL7184', 101, 100, 100, 'wallet', 101, 0, '2020-09-10', '2020-09-10', 1, '13:00-16:00', 0, 'Completed', 'images/user/031020170628user_signature.png', NULL, 0, 0, 'success', 0, NULL, 30, NULL),
(529, 421, 1, 118, 'WGHL406c', 101, 100, 100, 'wallet', 0, 0, '2020-09-11', '2020-09-12', 1, '13:00-16:00', 22, 'Confirmed', NULL, NULL, 0, 0, 'success', 0, NULL, 30, NULL),
(530, 421, 1, 118, 'SLGX70f1', 101, 100, 100, NULL, 0, 101, '2020-09-10', '2020-09-11', 1, '13:00-16:00', 22, 'Confirmed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(531, 421, 1, 118, 'SLXK69ee', 101, 100, 100, 'cod', 0, 101, '2020-09-10', '2020-09-11', 1, '13:00-16:00', 0, 'Cancelled', NULL, 'Bad Product Quality', 0, 0, NULL, 0, '2020-09-17 06:01:13', 30, NULL),
(532, 421, 1, 118, 'QCXQ546a', 101, 100, 100, 'cod', 0, 101, '2020-09-10', '2020-09-11', 1, '13:00-16:00', 0, 'Cancelled', NULL, 'Bad Product Quality', 0, 0, NULL, 0, '2020-09-17 06:07:54', 30, NULL),
(533, 421, 1, 118, 'VZVZ5406', 101, 100, 100, NULL, 0, 101, '2020-09-10', '2020-09-11', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(534, 421, 1, 118, 'XGUE90a9', 101, 100, 100, NULL, 0, 101, '2020-09-10', '2020-09-11', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(535, 421, 1, 118, 'QWZW76bd', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(536, 421, 1, 118, 'SHYT86f2', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(537, 421, 1, 118, 'ZOAC11f1', 181, 180, 200, 'COD', 0, 181, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 30, NULL),
(538, 421, 1, 118, 'JNXG16ac', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-09-30', 1, '16:00 - 19:00', 24, 'Confirmed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(539, 421, 1, 118, 'DTJW218b', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-10-01', 1, '16:00 - 19:00', 24, 'Confirmed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(540, 421, 1, 118, 'WEMY027f', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(541, 421, 1, 118, 'IAEL07e2', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 22, 'Completed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(542, 421, 1, 118, 'DNPA6578', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-11-06', 1, '16:00 - 19:00', 50, 'Confirmed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(543, 421, 1, 118, 'LWWV85dc', 181, 180, 200, NULL, 0, 181, '2020-09-10', '2020-11-06', 1, '16:00 - 19:00', 50, 'Confirmed', NULL, NULL, 0, 0, NULL, 0, NULL, 30, NULL),
(544, 421, 1, 118, 'HCFG93ff', 181, 180, 200, 'COD', 0, 181, '2020-09-10', '2020-09-10', 1, '19:00 - 22:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 30, NULL),
(545, 421, 1, 118, 'VQAA698d', 181, 180, 200, NULL, 0, 151, '2020-09-10', '2020-09-10', 1, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 30, NULL),
(546, 421, 1, 118, 'WPLF03e8', 271, 270, 300, 'COD', 0, 271, '2020-09-10', '2020-09-10', 1, '19:00 - 22:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 30, NULL),
(547, 421, 1, 118, 'XVSK10a3', 271, 270, 300, 'COD', 0, 271, '2020-09-10', '2020-09-10', 1, '19:00 - 22:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 30, NULL),
(548, 433, 1, 124, 'QZEX147a', 256, 255, 300, NULL, 0, 256, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(549, 433, 1, 124, 'LINZ71dd', 256, 255, 300, NULL, 0, 256, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Cancelled', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(550, 433, 1, 124, 'GTSQ36f4', 256, 255, 300, NULL, 0, 256, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(551, 433, 1, 124, 'LXOU19be', 256, 255, 300, NULL, 0, 226, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(552, 433, 1, 124, 'YDBY4855', 256, 255, 300, NULL, 0, 226, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(553, 433, 1, 124, 'FSVP707d', 256, 255, 300, 'COD', 0, 226, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 20, NULL),
(554, 433, 1, 124, 'LPMU27ef', 436, 435, 520, 'COD', 0, 406, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 20, NULL),
(555, 433, 1, 124, 'XJPJ1048', 256, 255, 300, 'COD', 0, 256, '2020-09-10', '2020-09-10', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(556, 433, 1, 124, 'QNLM5914', 701, 700, 840, 'COD', 0, 671, '2020-09-10', '2020-09-11', 1, '09:00 - 10:00', 27, 'Confirmed', NULL, NULL, 3, 30, 'COD', 0, NULL, 20, NULL),
(557, 440, 1, 128, 'CEZB53d4', 701, 700, 840, 'COD', 0, 671, '2020-09-10', '2020-11-09', 1, '09:00 - 10:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 20, NULL),
(558, 434, 1, 130, 'NGPJ6791', 176, 175, 210, NULL, 0, 146, '2020-09-10', '2020-09-14', 1, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(559, 440, 1, 128, 'UNNQ7120', 1596, 1595, 2720, 'COD', 0, 1566, '2020-09-10', '2020-09-11', 1, '13:00 - 14:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 20, NULL),
(560, 442, 1, 134, 'GFAZ65b5', 256, 255, 300, NULL, 0, 226, '2020-09-10', '2020-09-11', 1, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(561, 433, 1, 130, 'VURS973f', 86, 85, 100, 'COD', 0, 86, '2020-09-11', '2020-09-14', 1, '15:00 - 16:00', 0, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'COD', 0, '2020-09-15 14:43:37', 20, NULL),
(562, 421, 1, 118, 'DHBJ68ba', 101, 100, 100, NULL, 0, 101, '2020-09-12', '2020-09-09', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(563, 421, 1, 118, 'RKML28e8', 200, 100, 100, NULL, 0, 200, '2020-09-12', '2020-09-09', 100, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(564, 421, 1, 118, 'AQMX0503', 200, 100, 100, NULL, 0, 200, '2020-09-12', '2020-09-09', 100, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(565, 443, 1, 138, 'DNNW11b4', 2401, 2400, 3000, NULL, 0, 2401, '2020-09-12', '2020-09-12', 1, '21:00 - 22:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(566, 443, 1, 138, 'TWDV93f3', 1701, 1700, 2100, NULL, 0, 1701, '2020-09-12', '2020-09-12', 1, '21:00 - 22:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(567, 444, 1, 139, 'AANG31e1', 101, 100, 110, NULL, 0, 101, '2020-09-12', '2020-09-13', 1, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(568, 421, 1, 118, 'LGXV6139', 200, 100, 100, NULL, 0, 200, '2020-09-14', '2020-09-09', 100, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(569, 421, 1, 118, 'NCPQ94d0', 101, 100, 100, NULL, 0, 101, '2020-09-14', '2020-09-09', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(570, 421, 1, 118, 'RRPA491b', 1640, 1540, 1860, NULL, 0, 1640, '2020-09-14', '2020-09-14', 100, '16:00 - 19:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(571, 433, 1, 124, 'ICCT69ef', 101, 100, 100, NULL, 0, 101, '2020-09-14', '2020-09-09', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(572, 433, 1, 124, 'UCEL93c6', 101, 100, 100, NULL, 0, 101, '2020-09-14', '2020-09-09', 1, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(573, 433, 1, 141, 'DVHQ696b', 200, 100, 100, NULL, 0, 200, '2020-09-14', '2020-09-09', 100, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(574, 433, 1, 141, 'YFXK97a9', 1640, 1540, 1860, 'COD', 0, 1640, '2020-09-14', '2020-09-15', 100, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(575, 433, 1, 145, 'UGTM8107', 3090, 2990, 3440, 'COD', 0, 3090, '2020-09-14', '2020-09-14', 100, '18:00 - 19:00', 22, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'COD', 0, '2020-09-15 12:15:49', 20, NULL),
(576, 444, 1, 139, 'RZQP50a6', 871, 870, 1020, NULL, 0, 871, '2020-09-15', '2020-09-15', 1, '20:00 - 21:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(577, 433, 1, 147, 'IMHQ285c', 400, 300, 330, NULL, 0, 400, '2020-09-16', '2020-09-16', 100, '09:00 - 10:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(578, 433, 1, 147, 'SLIE60dd', 400, 300, 330, 'Card', 0, 400, '2020-09-16', '2020-09-17', 100, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(579, 433, 1, 147, 'SZXV89d0', 400, 300, 330, 'Card', 0, 400, '2020-09-16', '2020-09-16', 100, '09:00 - 10:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(580, 433, 1, 147, 'QFLR3616', 400, 300, 330, NULL, 0, 400, '2020-09-16', '2020-09-16', 100, '09:00 - 10:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(581, 433, 1, 147, 'CGGS24ed', 400, 300, 330, 'Card', 0, 400, '2020-09-16', '2020-09-16', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(582, 433, 1, 147, 'ATIW5496', 400, 300, 330, NULL, 0, 400, '2020-09-16', '2020-09-16', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(583, 433, 1, 147, 'GCXN2421', 400, 300, 330, 'Card', 0, 400, '2020-09-16', '2020-09-16', 100, '12:00 - 13:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(584, 433, 1, 147, 'WCSN0027', 860, 760, 880, 'Card', 0, 860, '2020-09-16', '2020-09-16', 100, '13:00 - 14:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(585, 433, 1, 147, 'YGAI6872', 400, 300, 330, 'Card', 0, 400, '2020-09-16', '2020-09-16', 100, '15:00 - 16:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(586, 433, 1, 150, 'IYII49c4', 1250, 1150, 1380, 'Card', 0, 1250, '2020-09-17', '2020-09-17', 100, '13:00 - 14:00', 0, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'success', 0, '2020-09-18 07:11:11', 20, NULL),
(587, 433, 1, 150, 'EMHG13b0', 310, 210, 270, 'Card', 0, 310, '2020-09-18', '2020-09-21', 100, '08:00 - 09:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(588, 433, 1, 151, 'YMJK441a', 2170, 2070, 2360, 'Card', 0, 2170, '2020-09-18', '2020-09-19', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(589, 433, 1, 151, 'BPFY96de', 690, 590, 710, 'Card', 0, 690, '2020-09-18', '2020-09-20', 100, '12:00 - 13:00', 0, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'success', 0, '2020-09-19 22:35:30', 20, NULL),
(590, 433, 1, 151, 'FNAC0074', 400, 300, 330, NULL, 0, 400, '2020-09-18', '2020-09-18', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(591, 433, 1, 151, 'RQZV8436', 400, 300, 330, NULL, 0, 400, '2020-09-18', '2020-09-18', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(592, 433, 1, 151, 'YJXB78a0', 400, 300, 330, 'Card', 0, 400, '2020-09-18', '2020-09-18', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(593, 433, 1, 151, 'ZBFZ841f', 500, 400, 440, NULL, 0, 500, '2020-09-19', '2020-09-22', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(594, 433, 1, 151, 'JLEH509e', 500, 400, 440, NULL, 0, 500, '2020-09-19', '2020-09-20', 100, '12:00 - 13:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(595, 433, 1, 151, 'WJMT10d6', 500, 400, 440, NULL, 0, 500, '2020-09-19', '2020-09-19', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(596, 433, 1, 151, 'QAWS38a2', 440, 340, 440, NULL, 0, 440, '2020-09-21', '2020-09-22', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(597, 433, 1, 152, 'NVZV78a9', 1090, 990, 1210, NULL, 0, 1090, '2020-09-21', '2020-09-22', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(598, 433, 1, 152, 'CBIT572c', 1090, 990, 1210, NULL, 0, 1090, '2020-09-21', '2020-09-22', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(599, 433, 1, 152, 'PQJT467c', 1090, 990, 1210, NULL, 0, 1090, '2020-09-21', '2020-09-22', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(600, 433, 1, 152, 'MRJX88b2', 440, 340, 440, 'Card', 0, 440, '2020-09-21', '2020-09-22', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(601, 466, 1, 153, 'DBQT0029', 650, 550, 620, NULL, 0, 620, '2020-09-21', '2020-09-22', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(602, 466, 1, 153, 'IWVF11e0', 170, 70, 90, 'COD', 0, 170, '2020-09-21', '2020-09-22', 100, '18:00 - 19:00', 0, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'COD', 0, '2020-09-21 21:28:04', 20, NULL),
(603, 466, 1, 153, 'FLRW805c', 600, 500, 550, 'Card', 0, 570, '2020-09-21', '2020-09-22', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, 'success', 0, NULL, 20, NULL),
(604, 467, 1, 157, 'RJLV73b1', 1300, 1200, 1500, NULL, 0, 1270, '2020-09-21', '2020-09-22', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 20, NULL),
(605, 467, 1, 157, 'OQNO942b', 1300, 1200, 1500, 'COD', 0, 1300, '2020-09-21', '2020-09-22', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(606, 433, 1, 152, 'NABB5045', 370, 270, 330, NULL, 0, 370, '2020-09-21', '2020-09-22', 100, '16:00 - 17:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(607, 433, 1, 152, 'NBBZ96ce', 370, 270, 330, NULL, 0, 370, '2020-09-21', '2020-09-22', 100, '16:00 - 17:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(608, 433, 1, 152, 'QXGZ3970', 370, 270, 330, 'COD', 0, 370, '2020-09-21', '2020-09-22', 100, '16:00 - 17:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(609, 437, 1, 155, 'FXPC320c', 1255, 1155, 1350, 'COD', 0, 1225, '2020-09-22', '2020-09-24', 100, '11:00 - 12:00', 0, 'Cancelled', NULL, 'i bought from somewhere else', 3, 30, 'COD', 0, '2020-09-22 22:32:17', 20, NULL),
(610, 433, 1, 152, 'WVKW1593', 440, 340, 440, NULL, 0, 440, '2020-09-22', '2020-09-23', 100, '19:00 - 20:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 20, NULL),
(611, 421, 1, 146, 'VCRP74d3', 280, 180, 220, 'COD', 0, 250, '2020-09-24', '2020-09-25', 100, '15:00 - 16:00', 0, 'Cancelled', NULL, 'Products are not Goods', 3, 30, 'COD', 0, '2020-09-24 13:23:56', 20, NULL),
(612, 421, 1, 146, 'LDYN95f7', 460, 360, 440, 'COD', 0, 460, '2020-09-24', '2020-09-29', 100, '15:00 - 16:00', 46, 'Delivery_accepted', NULL, NULL, 0, 0, 'COD', 0, '2020-09-24 13:37:08', 20, NULL),
(613, 421, 1, 146, 'PTWH46d2', 640, 540, 660, 'COD', 0, 640, '2020-09-24', '2020-09-28', 100, '15:00 - 16:00', 46, 'Completed', 'images/user/280920220208user_signature.png', NULL, 0, 0, 'COD', 0, '2020-09-24 13:50:29', 20, NULL),
(614, 472, 1, 158, 'AMVI1598', 800, 700, 880, 'COD', 0, 800, '2020-09-29', '2020-09-29', 100, '16:00 - 17:00', 47, 'Completed', 'images/user/290920142620user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(615, 472, 1, 158, 'UCZK1045', 740, 640, 830, 'COD', 0, 740, '2020-09-29', '2020-09-30', 100, '17:00 - 18:00', 24, 'Completed', 'images/user/300920230749user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(616, 472, 1, 158, 'JJWT49f1', 525, 425, 550, 'COD', 0, 525, '2020-09-29', '2020-10-01', 100, '10:00 - 11:00', 24, 'Completed', 'images/user/300920230719user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(617, 472, 1, 158, 'OCAQ003f', 300, 200, 220, 'COD', 0, 300, '2020-09-30', '2020-09-30', 100, '19:00 - 20:00', 39, 'Completed', 'images/user/300920180649user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(618, 472, 1, 158, 'WWBG0942', 1460, 1360, 1660, 'COD', 0, 1460, '2020-09-30', '2020-09-30', 100, '19:00 - 20:00', 24, 'Completed', 'images/user/300920231027user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(619, 472, 1, 158, 'TPYX204e', 470, 370, 440, 'COD', 0, 470, '2020-09-30', '2020-10-01', 100, '11:00 - 12:00', 24, 'Completed', 'images/user/300920231054user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 20, NULL),
(620, 472, 1, 159, 'CFRP97d9', 820, 720, 870, 'Card', 0, 820, '2020-09-30', '2020-10-01', 100, '11:00 - 12:00', 24, 'Completed', 'images/user/300920230225user_signature.png', NULL, 0, 0, 'success', 0, NULL, 20, NULL),
(621, 472, 1, 159, 'MSOI376b', 520, 420, 540, 'COD', 0, 520, '2020-10-09', '2020-11-06', 100, '19:00 - 20:00', 50, 'Completed', 'images/user/091020212754user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(622, 444, 1, 161, 'RVAT598c', 600, 500, 600, NULL, 0, 570, '2020-10-09', '2020-10-11', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 0, NULL),
(623, 444, 1, 161, 'BPBN5056', 600, 500, 600, NULL, 0, 570, '2020-10-09', '2020-10-11', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 0, NULL),
(624, 444, 1, 161, 'XMKW8048', 600, 500, 600, NULL, 0, 570, '2020-10-09', '2020-10-11', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 0, NULL),
(625, 444, 1, 161, 'ZZJW9579', 580, 480, 580, NULL, 0, 550, '2020-10-09', '2020-10-11', 100, '11:00 - 12:00', 0, 'Pending', NULL, NULL, 3, 30, NULL, 0, NULL, 0, NULL),
(626, 444, 1, 161, 'MQKH360f', 580, 480, 580, 'COD', 0, 550, '2020-10-09', '2020-10-11', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 0, NULL),
(627, 444, 1, 163, 'KTKJ325d', 600, 500, 600, 'COD', 0, 600, '2020-10-09', '2020-11-06', 100, '10:00 - 11:00', 50, 'Out For Delivery', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(628, 444, 1, 163, 'HTUG9982', 300, 200, 220, 'COD', 0, 300, '2020-10-09', '2020-10-10', 100, '11:00 - 12:00', 60, 'Confirmed', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(629, 537, 1, 166, 'DCFS20b7', 390, 290, 360, 'COD', 0, 390, '2020-10-10', '2020-10-10', 100, '12:00 - 13:00', 60, 'Cancelled', NULL, 'i bought from somewhere else', 0, 0, 'COD', 0, '2020-10-30 17:15:09', 0, NULL),
(630, 444, 1, 163, 'IDCF1265', 390, 290, 360, NULL, 0, 390, '2020-10-10', '2020-10-11', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(631, 444, 1, 163, 'XXBS46dd', 390, 290, 360, 'COD', 0, 390, '2020-10-10', '2020-11-06', 100, '10:00 - 11:00', 50, 'Out For Delivery', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(632, 536, 1, 170, 'DGFR914f', 880, 830, 970, 'COD', 0, 850, '2020-10-13', '2020-10-14', 50, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 3, 30, 'COD', 0, NULL, 0, NULL),
(633, 536, 1, 170, 'MZHO7980', 590, 540, 250, NULL, 0, 550, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(634, 536, 1, 170, 'BOEN93a9', 1090, 1040, 500, NULL, 0, 1050, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(635, 536, 1, 170, 'OYSJ7887', 1050, 1000, 500, NULL, 0, 1050, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(636, 536, 1, 170, 'OIPO68ef', 1090, 1040, 500, NULL, 0, 1050, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(637, 536, 1, 170, 'UGPX81a3', 1090, 1040, 500, NULL, 0, 1050, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(638, 536, 1, 170, 'SFZA9514', 1090, 1040, 500, NULL, 0, 1050, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(639, 536, 1, 170, 'BGVC3353', 190, 140, 250, NULL, 0, 150, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(640, 536, 1, 170, 'LRHY090b', 190, 140, 250, NULL, 0, 150, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(641, 536, 1, 170, 'BKCB5966', 310, 260, 250, NULL, 0, 270, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(642, 536, 1, 170, 'JQBR10cb', 310, 260, 250, NULL, 0, 270, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(643, 536, 1, 170, 'QWUV7077', 310, 260, 250, NULL, 0, 270, '2020-10-16', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(644, 536, 1, 170, 'NLQY498b', 310, 260, 250, NULL, 0, 270, '2020-10-20', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(645, 536, 1, 170, 'MDOF8217', 340, 290, 250, NULL, 0, 270, '2020-10-20', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(646, 536, 1, 170, 'LXCG798f', 380, 330, 250, 'cod', 0, 270, '2020-10-20', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(647, 536, 1, 170, 'MMBT598f', 380, 330, 250, NULL, 0, 270, '2020-10-21', '2020-10-16', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(648, 536, 24, 170, 'TALB91d4', 380, 330, 250, NULL, 0, 270, '2020-10-21', '2020-10-23', 50, '13:00-16:00', 0, 'Completed', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(649, 536, 24, 170, 'AEVB110e', 380, 330, 250, NULL, 0, 270, '2020-10-29', '2020-11-06', 50, '13:00-16:00', 50, 'Pending', NULL, NULL, 0, 0, NULL, 0, '2020-10-21 18:24:57', 0, NULL),
(650, 536, 38, 170, 'KCEB35ce', 200, 150, 200, NULL, 0, 200, '2020-11-06', '2020-11-19', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(651, 536, 38, 170, 'AOBP535e', 200, 150, 200, NULL, 0, 200, '2020-11-06', '2020-10-06', 50, '13:00-16:00', 63, 'Completed', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 2),
(652, 536, 38, 170, 'RPNC0690', 200, 150, 200, NULL, 0, 200, '2020-11-12', '2020-10-06', 50, '13:00-16:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(653, 536, 38, 170, 'EFDC8091', 200, 150, 200, NULL, 0, 200, '2020-11-12', NULL, 50, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(654, 536, 38, 170, 'SKXZ310c', 240, 190, 200, NULL, 0, 200, '2020-11-12', NULL, 50, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(655, 536, 38, 170, 'DTQN8432', 950, 900, 1200, NULL, 0, 950, '2020-11-12', NULL, 50, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(656, 537, 38, 166, 'FPFN9673', 1000, 900, 1200, NULL, 0, 1000, '2020-11-12', NULL, 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 2),
(657, 537, 38, 166, 'DBGZ33df', 1000, 900, 1200, 'COD', 0, 1000, '2020-11-12', NULL, 100, NULL, 0, 'Cancelled', NULL, 'Products are not Goods', 0, 0, 'COD', 0, '2020-11-13 10:55:23', 0, 2),
(658, 537, 38, 166, 'MCFZ0129', 1000, 900, 1200, 'COD', 0, 1000, '2020-11-12', NULL, 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(659, 537, 38, 166, 'WYMF26de', 550, 450, 600, NULL, 0, 440, '2020-11-12', NULL, 100, NULL, 0, 'Pending', NULL, NULL, 5, 110, NULL, 0, NULL, 0, 2),
(660, 537, 38, 166, 'BADC6671', 550, 450, 600, 'COD', 0, 440, '2020-11-12', NULL, 100, NULL, 0, 'Pending', NULL, NULL, 5, 110, 'COD', 0, NULL, 0, 2),
(661, 537, 1, 166, 'XMYJ4405', 940, 840, 1080, 'COD', 0, 940, '2020-11-13', '2020-11-13', 100, '15:00 - 16:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(662, 537, 1, 166, 'ZWXE019e', 1080, 980, 1260, 'COD', 0, 1080, '2020-11-13', '2020-11-13', 100, '15:00 - 16:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 1),
(663, 536, 38, 170, 'VRUH0714', 200, 150, 200, 'COD', 0, 160, '2020-11-16', '2020-11-16', 50, NULL, 0, 'Pending', NULL, NULL, 5, 40, 'COD', 0, NULL, 0, 2),
(664, 536, 38, 170, 'NFAC3522', 200, 150, 200, NULL, 0, 200, '2020-11-16', '2020-11-16', 50, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 2),
(665, 536, 38, 170, 'UOAV591f', 230, 180, 150, 'COD', 0, 230, '2020-11-16', '2020-11-18', 50, NULL, 63, 'Delivery Accepted', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(666, 536, 1, 170, 'SBOY72a9', 550, 500, 550, NULL, 0, 550, '2020-11-16', '2020-11-17', 50, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 1),
(667, 437, 1, 154, 'KZDF4950', 280, 180, 240, 'COD', 0, 280, '2020-11-16', '2020-11-17', 100, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 1),
(668, 537, 38, 166, 'YGIT485a', 2105, 2005, 1800, 'COD', 0, 2100, '2020-11-18', '2020-11-19', 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(669, 537, 38, 166, 'CIGL3847', 505, 405, 320, 'COD', 0, 500, '2020-11-19', '2020-11-19', 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(670, 536, 38, 170, 'CEAN8652', 1025, 975, 1200, 'COD', 0, 950, '2020-11-19', '2020-11-19', 50, NULL, 63, 'Completed', 'images/user/191120160541user_signature.png', NULL, 0, 0, 'COD', 0, NULL, 0, 2),
(671, 536, 42, 170, 'FMVO5404', 250, 200, 100, 'COD', 0, 150, '2020-11-24', '2020-11-24', 50, NULL, 0, 'Completed', 'N/A', NULL, 0, 0, 'COD', 0, NULL, 0, NULL),
(672, 536, 1, 170, 'TUJA37e6', 190, 140, 180, NULL, 0, 190, '2020-11-24', '2020-11-25', 50, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 1),
(673, 536, 1, 170, 'VLIN6653', 190, 140, 180, NULL, 0, 190, '2020-11-24', '2020-11-25', 50, '10:00 - 11:00', 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 1),
(674, 536, 42, 170, 'IJSG13cc', 250, 200, 100, NULL, 0, 150, '2020-11-25', '2020-11-25', 50, NULL, 65, 'Delivery Accepted', NULL, NULL, 0, 0, NULL, 0, NULL, 0, NULL),
(675, 537, 42, 166, 'KFHK70d6', 1000, 900, 900, NULL, 0, 1000, '2020-11-25', '2020-11-25', 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, NULL, 0, NULL, 0, 5),
(676, 537, 42, 166, 'DXVO3369', 700, 600, 500, 'COD', 0, 600, '2020-11-26', '2020-11-26', 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 5),
(677, 537, 42, 166, 'MHRM30b3', 500, 400, 400, 'COD', 0, 500, '2020-11-26', '2020-11-26', 100, NULL, 0, 'Pending', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 5),
(678, 537, 42, 166, 'AJEM89f3', 600, 500, 400, 'COD', 0, 500, '2020-11-28', '2020-11-28', 100, NULL, 64, 'Confirmed', NULL, NULL, 0, 0, 'COD', 0, NULL, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_complains`
--

CREATE TABLE `order_complains` (
  `order_complain_id` int(11) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settled_amt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_complains`
--

INSERT INTO `order_complains` (`order_complain_id`, `vendor_id`, `completed_id`, `complain_id`, `delivery_boy_id`, `settled_amt`) VALUES
(23, '1', '119', '10', '41', '60');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `store_order_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `total_mrp` float NOT NULL,
  `order_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `varient_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_id` int(11) NOT NULL DEFAULT 0,
  `addon_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`store_order_id`, `product_name`, `quantity`, `unit`, `varient_id`, `qty`, `price`, `total_mrp`, `order_cart_id`, `order_date`, `varient_image`, `addon_name`, `addon_id`, `addon_price`) VALUES
(1199, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'GICH3578', '2020-09-08 12:51:23', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1200, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'XGID129c', '2020-09-08 12:52:16', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1201, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'FHTQ57a2', '2020-09-08 12:52:56', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1202, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'UFIJ811f', '2020-09-08 12:53:34', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1203, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'SHJO067b', '2020-09-09 05:19:45', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1204, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'ZGJR0555', '2020-09-09 13:12:07', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1205, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'GLAT59ab', '2020-09-09 13:17:38', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1206, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'ZQMU987a', '2020-09-09 13:17:41', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1207, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'WMIL7184', '2020-09-09 13:17:46', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1208, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'WGHL406c', '2020-09-09 13:49:22', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1209, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'XDGJ24c6', '2020-09-10 05:30:09', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1210, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'FPYJ35e3', '2020-09-10 05:30:41', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1211, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'SLGX70f1', '2020-09-10 05:31:25', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1212, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'SLXK69ee', '2020-09-10 05:32:44', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1213, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'QCXQ546a', '2020-09-10 05:43:45', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1214, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'VZVZ5406', '2020-09-10 05:46:45', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1215, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'XGUE90a9', '2020-09-10 11:26:50', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1216, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'QWZW76bd', '2020-09-10 12:06:02', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1217, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'SHYT86f2', '2020-09-10 12:22:34', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1218, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'ZOAC11f1', '2020-09-10 12:29:18', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1219, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'VJSL7306', '2020-09-10 12:34:29', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1220, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'BCOW35e3', '2020-09-10 12:37:13', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1221, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'ARJP7466', '2020-09-10 12:38:07', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1222, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'SRQL0390', '2020-09-10 12:38:10', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1223, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'JXHO4258', '2020-09-10 12:38:43', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1224, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'SNEE958a', '2020-09-10 12:39:29', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1225, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'BBOY51fa', '2020-09-10 12:40:44', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1226, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'GMUY0903', '2020-09-10 12:41:29', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1227, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'JNXG16ac', '2020-09-10 12:42:10', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1228, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'DTJW218b', '2020-09-10 12:42:37', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1229, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'WEMY027f', '2020-09-10 12:54:17', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1230, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'IAEL07e2', '2020-09-10 12:55:18', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1231, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'DNPA6578', '2020-09-10 12:55:48', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1232, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'LWWV85dc', '2020-09-10 13:52:09', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1233, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'HCFG93ff', '2020-09-10 14:18:00', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1234, 'Arhar Daal', '1', 'KG', 104, 2, 180, 200, 'VQAA698d', '2020-09-10 15:29:25', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1235, 'Arhar Daal', '1', 'KG', 104, 3, 270, 300, 'WPLF03e8', '2020-09-10 15:36:24', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1236, 'Arhar Daal', '1', 'KG', 104, 3, 270, 300, 'XVSK10a3', '2020-09-10 15:39:34', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1237, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'QZEX147a', '2020-09-10 17:36:04', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1238, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'LINZ71dd', '2020-09-10 17:38:20', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1239, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'GTSQ36f4', '2020-09-10 17:39:10', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1240, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'LXOU19be', '2020-09-10 17:39:55', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1241, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'YDBY4855', '2020-09-10 17:41:47', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1242, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'FSVP707d', '2020-09-10 17:45:07', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1243, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'LPMU27ef', '2020-09-10 17:55:36', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1244, 'Red Rajma', '1', 'KG', 107, 2, 180, 220, 'LPMU27ef', '2020-09-10 17:55:36', 'product/images/09-09-2020/090920041705pm-hdfgrbtigndfmbrtjlntrmf.jfif', NULL, 0, 0),
(1245, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'XJPJ1048', '2020-09-10 18:40:41', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1246, 'Arhar Daal', '1', 'KG', 104, 4, 340, 400, 'QNLM5914', '2020-09-10 18:55:06', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1247, 'Red Rajma', '1', 'KG', 107, 4, 360, 440, 'QNLM5914', '2020-09-10 18:55:06', 'product/images/09-09-2020/090920041705pm-hdfgrbtigndfmbrtjlntrmf.jfif', NULL, 0, 0),
(1248, 'Arhar Daal', '1', 'KG', 104, 4, 340, 400, 'CEZB53d4', '2020-09-10 19:01:47', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1249, 'Red Rajma', '1', 'KG', 107, 4, 360, 440, 'CEZB53d4', '2020-09-10 19:01:47', 'product/images/09-09-2020/090920041705pm-hdfgrbtigndfmbrtjlntrmf.jfif', NULL, 0, 0),
(1250, 'Arhar Daal', '1', 'KG', 104, 1, 85, 100, 'NGPJ6791', '2020-09-10 19:05:52', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1251, 'Red Rajma', '1', 'KG', 107, 1, 90, 110, 'NGPJ6791', '2020-09-10 19:05:52', 'product/images/09-09-2020/090920041705pm-hdfgrbtigndfmbrtjlntrmf.jfif', NULL, 0, 0),
(1252, 'Arhar Daal', '1', 'KG', 104, 5, 425, 500, 'UNNQ7120', '2020-09-10 22:54:23', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1253, 'Red Rajma', '1', 'KG', 107, 3, 270, 330, 'UNNQ7120', '2020-09-10 22:54:23', 'product/images/09-09-2020/090920041705pm-hdfgrbtigndfmbrtjlntrmf.jfif', NULL, 0, 0),
(1254, 'Body Lotion', '750', 'ML', 105, 3, 600, 750, 'UNNQ7120', '2020-09-10 22:54:23', 'product/images/09-09-2020/090920041412pm-dnfbnbwjrgbvbjrtmwfd.jfif', NULL, 0, 0),
(1255, 'Vaseline Intensive Care', '500', 'ML', 106, 3, 300, 1140, 'UNNQ7120', '2020-09-10 22:54:23', 'product/images/09-09-2020/090920041532pm-51WWDSRmePL._SL1000_.jpg', NULL, 0, 0),
(1256, 'Arhar Daal', '1', 'KG', 104, 3, 255, 300, 'GFAZ65b5', '2020-09-10 23:14:44', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1257, 'Arhar Daal', '1', 'KG', 104, 1, 85, 100, 'VURS973f', '2020-09-11 02:15:40', 'product/images/09-09-2020/090920040931pm-9.png', NULL, 0, 0),
(1258, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'SQIQ0421', '2020-09-12 10:46:22', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1259, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'DHBJ68ba', '2020-09-12 10:46:35', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1260, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'RKML28e8', '2020-09-12 10:52:26', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1261, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'AQMX0503', '2020-09-12 10:54:23', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1262, 'Bodybuilding Supplements & Sports Nutrition', '1', 'KG', 118, 2, 2400, 3000, 'DNNW11b4', '2020-09-12 19:50:39', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', NULL, 0, 0),
(1263, 'Bodybuilding Supplements & Sports Nutrition', '1', 'KG', 118, 1, 1200, 1500, 'TWDV93f3', '2020-09-12 19:50:57', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', NULL, 0, 0),
(1264, 'Fish Oil', '60', 'Grm', 119, 1, 500, 600, 'TWDV93f3', '2020-09-12 19:50:57', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', NULL, 0, 0),
(1265, 'Arhar Daal', '1', 'KG', 110, 1, 100, 110, 'AANG31e1', '2020-09-12 20:02:55', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1266, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'LGXV6139', '2020-09-14 05:51:58', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1267, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'NCPQ94d0', '2020-09-14 11:23:03', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1268, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'RRPA491b', '2020-09-14 07:11:08', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1269, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'RRPA491b', '2020-09-14 07:11:08', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1270, 'Moong Daal', '1', 'KG', 112, 4, 200, 280, 'RRPA491b', '2020-09-14 07:11:08', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1271, 'Garam Masala', '250', 'Grm', 113, 2, 300, 340, 'RRPA491b', '2020-09-14 07:11:08', 'product/images/11-09-2020/110920010100pm-71remHYwqwL._SX569_.jpg', NULL, 0, 0),
(1272, 'Lal Mirch Powder', '250', 'Grm', 115, 4, 280, 360, 'RRPA491b', '2020-09-14 07:11:08', 'product/images/11-09-2020/110920010339pm-s-l400.jpg', NULL, 0, 0),
(1273, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'ICCT69ef', '2020-09-14 12:51:39', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1274, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'UCEL93c6', '2020-09-14 12:57:59', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1275, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'DVHQ696b', '2020-09-14 07:29:35', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1276, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'YFXK97a9', '2020-09-14 07:37:28', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1277, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'YFXK97a9', '2020-09-14 07:37:28', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1278, 'Moong Daal', '1', 'KG', 112, 4, 200, 280, 'YFXK97a9', '2020-09-14 07:37:28', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1279, 'Garam Masala', '250', 'Grm', 113, 2, 300, 340, 'YFXK97a9', '2020-09-14 07:37:28', 'product/images/11-09-2020/110920010100pm-71remHYwqwL._SX569_.jpg', NULL, 0, 0),
(1280, 'Lal Mirch Powder', '250', 'Grm', 115, 4, 280, 360, 'YFXK97a9', '2020-09-14 07:37:28', 'product/images/11-09-2020/110920010339pm-s-l400.jpg', NULL, 0, 0),
(1281, 'Toor dal', '5', 'KG', 125, 4, 1800, 2000, 'UGTM8107', '2020-09-14 16:33:33', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1282, 'Arhar Daal', '500', 'Grm', 122, 3, 210, 270, 'UGTM8107', '2020-09-14 16:33:33', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1283, 'Toor dal', '500', 'Grm', 124, 2, 80, 120, 'UGTM8107', '2020-09-14 16:33:33', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1284, 'Moong Daal', '5', 'G', 126, 3, 900, 1050, 'UGTM8107', '2020-09-14 16:33:33', 'images/product/14-09-2020/moong_dal_200g.jpg', NULL, 0, 0),
(1285, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'RZQP50a6', '2020-09-15 18:57:17', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1286, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'RZQP50a6', '2020-09-15 18:57:17', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1287, 'Toor dal', '1', 'KG', 111, 1, 90, 110, 'RZQP50a6', '2020-09-15 18:57:17', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1288, 'Corn Flakes Cereal', '500', 'Grm', 117, 1, 250, 290, 'RZQP50a6', '2020-09-15 18:57:17', 'product/images/11-09-2020/110920010821pm-81wHWuSiVsL._SX425_PIbundle-12,TopRight,0,0_AA425SH20_.jpg', NULL, 0, 0),
(1289, 'Kissan Jam', '1', 'KG', 120, 1, 180, 220, 'RZQP50a6', '2020-09-15 18:57:17', 'product/images/11-09-2020/110920011459pm-23-750x750.jpg', NULL, 0, 0),
(1290, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'IMHQ285c', '2020-09-16 06:47:07', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1291, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'SLIE60dd', '2020-09-16 07:23:21', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1292, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'SZXV89d0', '2020-09-16 07:25:49', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1293, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'QFLR3616', '2020-09-16 07:40:42', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1294, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'CGGS24ed', '2020-09-16 08:23:56', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1295, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'ATIW5496', '2020-09-16 09:42:10', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1296, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'GCXN2421', '2020-09-16 10:48:31', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1297, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'WCSN0027', '2020-09-16 11:13:33', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1298, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'WCSN0027', '2020-09-16 11:13:33', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1299, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'YGAI6872', '2020-09-16 13:51:57', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1300, 'Arhar Daal', '1', 'KG', 110, 5, 500, 550, 'IYII49c4', '2020-09-17 11:54:53', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1301, 'Toor dal', '1', 'KG', 111, 5, 450, 550, 'IYII49c4', '2020-09-17 11:54:53', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1302, 'Moong Daal', '1', 'KG', 112, 4, 200, 280, 'IYII49c4', '2020-09-17 11:54:53', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1303, 'Arhar Daal', '500', 'Grm', 122, 3, 210, 270, 'EMHG13b0', '2020-09-18 11:24:39', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1304, 'Arhar Daal', '500', 'Grm', 122, 3, 210, 270, 'YMJK441a', '2020-09-18 13:25:47', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1305, 'Arhar Daal', '5', 'KG', 123, 3, 1500, 1650, 'YMJK441a', '2020-09-18 13:25:47', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1306, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'YMJK441a', '2020-09-18 13:25:47', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1307, 'Arhar Daal', '500', 'Grm', 122, 3, 210, 270, 'BPFY96de', '2020-09-18 14:05:10', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1308, 'Arhar Daal', '1', 'KG', 110, 2, 200, 220, 'BPFY96de', '2020-09-18 14:05:10', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1309, 'Toor dal', '1', 'KG', 111, 2, 180, 220, 'BPFY96de', '2020-09-18 14:05:10', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1310, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'FNAC0074', '2020-09-18 17:08:00', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1311, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'RQZV8436', '2020-09-18 17:08:13', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1312, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'YJXB78a0', '2020-09-18 17:09:02', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1313, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'ZBFZ841f', '2020-09-19 05:02:52', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1314, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'JLEH509e', '2020-09-19 05:03:23', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1315, 'Arhar Daal', '1', 'KG', 110, 4, 400, 440, 'WJMT10d6', '2020-09-19 05:14:08', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1316, 'Testing vendor id 1', '1', 'KG', 103, 1, 100, 100, 'UVBM3579', '2020-09-19 11:11:41', 'product/images/07-09-2020/070920085841am-beauty(1).png', NULL, 0, 0),
(1317, 'Arhar Daal', '1', 'KG', 110, 4, 340, 440, 'QAWS38a2', '2020-09-21 16:47:28', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1318, 'Toor dal', '1', 'KG', 111, 11, 990, 1210, 'NVZV78a9', '2020-09-21 18:47:24', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1319, 'Toor dal', '1', 'KG', 111, 11, 990, 1210, 'CBIT572c', '2020-09-21 18:47:59', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1320, 'Toor dal', '1', 'KG', 111, 11, 990, 1210, 'PQJT467c', '2020-09-21 19:44:21', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1321, 'Arhar Daal', '1', 'KG', 110, 4, 340, 440, 'MRJX88b2', '2020-09-21 21:10:49', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1322, 'Arhar Daal', '5', 'KG', 123, 1, 500, 550, 'DBQT0029', '2020-09-21 21:22:39', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1323, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'DBQT0029', '2020-09-21 21:22:39', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1324, 'Lal Mirch Powder', '250', 'Grm', 115, 1, 70, 90, 'IWVF11e0', '2020-09-21 21:27:02', 'product/images/11-09-2020/110920010339pm-s-l400.jpg', NULL, 0, 0),
(1325, 'Olive Oil', '1', 'lit.', 116, 1, 500, 550, 'FLRW805c', '2020-09-21 21:35:46', 'product/images/11-09-2020/110920010512pm-jsfdjbvjhbjh.jfif', NULL, 0, 0),
(1326, 'Bodybuilding Supplements & Sports Nutrition', '1', 'KG', 118, 1, 1200, 1500, 'RJLV73b1', '2020-09-21 21:40:43', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', NULL, 0, 0),
(1327, 'Bodybuilding Supplements & Sports Nutrition', '1', 'KG', 118, 1, 1200, 1500, 'OQNO942b', '2020-09-21 21:41:33', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', NULL, 0, 0),
(1328, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'NABB5045', '2020-09-21 21:44:38', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1329, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'NBBZ96ce', '2020-09-21 21:44:55', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1330, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'QXGZ3970', '2020-09-21 21:45:03', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1331, 'Arhar Daal', '1', 'KG', 110, 1, 85, 110, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1332, 'Toor dal', '1', 'KG', 111, 1, 90, 110, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1333, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1334, 'Kissan Jam', '1', 'KG', 120, 1, 180, 220, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920011459pm-23-750x750.jpg', NULL, 0, 0),
(1335, 'Corn Flakes Cereal', '500', 'Grm', 117, 1, 250, 290, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920010821pm-81wHWuSiVsL._SX425_PIbundle-12,TopRight,0,0_AA425SH20_.jpg', NULL, 0, 0),
(1336, 'Olive Oil', '1', 'lit.', 116, 1, 500, 550, 'FXPC320c', '2020-09-22 09:10:20', 'product/images/11-09-2020/110920010512pm-jsfdjbvjhbjh.jfif', NULL, 0, 0),
(1337, 'Arhar Daal', '1', 'KG', 110, 4, 340, 440, 'WVKW1593', '2020-09-22 17:49:07', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1338, 'Toor dal', '1', 'KG', 111, 2, 180, 220, 'VCRP74d3', '2020-09-24 13:22:49', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1339, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'LDYN95f7', '2020-09-24 13:36:18', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1340, 'Toor dal', '1', 'KG', 111, 6, 540, 660, 'PTWH46d2', '2020-09-24 13:49:33', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1341, 'Arhar Daal', '1', 'KG', 110, 4, 340, 440, 'AMVI1598', '2020-09-29 13:55:13', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1342, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'AMVI1598', '2020-09-29 13:55:13', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1343, 'Arhar Daal', '1', 'KG', 110, 2, 170, 220, 'UCZK1045', '2020-09-29 15:43:57', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1344, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'UCZK1045', '2020-09-29 15:43:57', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1345, 'Moong Daal', '1', 'KG', 112, 4, 200, 280, 'UCZK1045', '2020-09-29 15:43:57', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1346, 'Arhar Daal', '1', 'KG', 110, 5, 425, 550, 'JJWT49f1', '2020-09-29 15:54:07', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1347, 'Arhar Daal', '1', 'KG', 110, 2, 200, 220, 'OCAQ003f', '2020-09-30 17:46:56', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1348, 'Arhar Daal', '1', 'KG', 110, 2, 200, 220, 'WWBG0942', '2020-09-30 17:48:37', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1349, 'Toor dal', '1', 'KG', 111, 4, 360, 440, 'WWBG0942', '2020-09-30 17:48:37', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1350, 'Moong Daal', '1', 'KG', 112, 4, 200, 280, 'WWBG0942', '2020-09-30 17:48:37', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1351, 'Turmeric Powder', '200', 'Grm', 114, 3, 150, 210, 'WWBG0942', '2020-09-30 17:48:37', 'product/images/11-09-2020/110920010207pm-717Gegl2IbL._SX522_.jpg', NULL, 0, 0),
(1352, 'Garam Masala', '250', 'Grm', 113, 3, 450, 510, 'WWBG0942', '2020-09-30 17:48:37', 'product/images/11-09-2020/110920010100pm-71remHYwqwL._SX569_.jpg', NULL, 0, 0),
(1353, 'Arhar Daal', '1', 'KG', 110, 1, 100, 110, 'TPYX204e', '2020-09-30 21:39:19', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1354, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'TPYX204e', '2020-09-30 21:39:19', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1355, 'Arhar Daal', '1', 'KG', 110, 3, 300, 330, 'CFRP97d9', '2020-09-30 22:54:02', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1356, 'Toor dal', '1', 'KG', 111, 3, 270, 330, 'CFRP97d9', '2020-09-30 22:54:02', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1357, 'Moong Daal', '1', 'KG', 112, 3, 150, 210, 'CFRP97d9', '2020-09-30 22:54:02', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1358, 'Arhar Daal', '1', 'KG', 110, 3, 420, 540, 'MSOI376b', '2020-10-09 17:37:01', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1359, 'Fish Oil', '60', 'Grm', 119, 1, 500, 600, 'RVAT598c', '2020-10-09 20:09:55', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', NULL, 0, 0),
(1360, 'Fish Oil', '60', 'Grm', 119, 1, 500, 600, 'BPBN5056', '2020-10-09 20:10:09', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', NULL, 0, 0),
(1361, 'Fish Oil', '60', 'Grm', 119, 1, 500, 600, 'XMKW8048', '2020-10-09 20:10:50', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', NULL, 0, 0),
(1362, 'Arhar Daal', '1', 'KG', 110, 2, 280, 360, 'ZZJW9579', '2020-10-09 20:51:44', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1363, 'Toor dal', '1', 'KG', 111, 2, 200, 220, 'ZZJW9579', '2020-10-09 20:51:44', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1364, 'Arhar Daal', '1', 'KG', 110, 2, 280, 360, 'MQKH360f', '2020-10-09 20:57:37', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1365, 'Toor dal', '1', 'KG', 111, 2, 200, 220, 'MQKH360f', '2020-10-09 20:57:37', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1366, 'Fish Oil', '60', 'Grm', 119, 1, 500, 600, 'KTKJ325d', '2020-10-09 21:03:51', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', NULL, 0, 0),
(1367, 'Toor dal', '1', 'KG', 111, 2, 200, 220, 'HTUG9982', '2020-10-09 21:36:17', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1368, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'DCFS20b7', '2020-10-10 10:24:57', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1369, 'Toor dal', '1', 'KG', 111, 1, 100, 110, 'DCFS20b7', '2020-10-10 10:24:57', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1370, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'DCFS20b7', '2020-10-10 10:24:57', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1371, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'IDCF1265', '2020-10-10 11:22:55', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1372, 'Toor dal', '1', 'KG', 111, 1, 100, 110, 'IDCF1265', '2020-10-10 11:22:55', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1373, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'IDCF1265', '2020-10-10 11:22:55', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1374, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'XXBS46dd', '2020-10-10 11:23:14', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1375, 'Toor dal', '1', 'KG', 111, 1, 100, 110, 'XXBS46dd', '2020-10-10 11:23:14', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1376, 'Moong Daal', '1', 'KG', 112, 1, 50, 70, 'XXBS46dd', '2020-10-10 11:23:14', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', NULL, 0, 0),
(1377, 'Arhar Daal', '1', 'KG', 110, 2, 280, 360, 'DGFR914f', '2020-10-13 05:08:45', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1378, 'Toor dal', '1', 'KG', 111, 1, 100, 110, 'DGFR914f', '2020-10-13 05:08:45', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1379, 'Toor dal', '5', 'KG', 125, 1, 450, 500, 'DGFR914f', '2020-10-13 05:08:45', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1380, 'Panner Currey', 'small', '500 ml', 1, 1, 540, 250, 'MZHO7980', '2020-10-16 14:18:33', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1381, 'Panner Currey', 'small', '500 ml', 1, 1, 1040, 250, 'BOEN93a9', '2020-10-16 17:18:04', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1382, 'Panner Currey', 'small', '500 ml', 1, 1, 1000, 250, 'OYSJ7887', '2020-10-16 17:29:22', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', '0', 0, 0),
(1383, 'Panner Currey', 'small', '500 ml', 1, 1, 1040, 250, 'OIPO68ef', '2020-10-16 17:34:13', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', '0', 0, 0),
(1384, 'Panner Currey', 'small', '500 ml', 1, 1, 1040, 250, 'UGPX81a3', '2020-10-16 17:35:00', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1385, 'Panner Currey', 'small', '500 ml', 1, 1, 1040, 250, 'SFZA9514', '2020-10-16 17:35:11', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1386, 'Panner Currey', 'small', '500 ml', 1, 1, 140, 0, 'BGVC3353', '2020-10-16 17:42:34', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1387, 'Panner Currey', 'small', '500 ml', 1, 1, 140, 0, 'LRHY090b', '2020-10-16 17:43:29', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1388, 'Panner Currey', 'small', '500 ml', 1, 1, 260, 0, 'BKCB5966', '2020-10-16 17:43:50', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1389, 'Panner Currey', 'small', '500 ml', 1, 1, 260, 0, 'JQBR10cb', '2020-10-16 17:51:55', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1390, 'Panner Currey', 'small', '500 ml', 1, 1, 260, 250, 'QWUV7077', '2020-10-16 17:54:23', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 0),
(1391, 'Panner Currey', 'small', '500 ml', 1, 1, 260, 250, 'NLQY498b', '2020-10-20 13:12:18', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 40),
(1392, 'Panner Currey', 'small', '500 ml', 1, 1, 290, 250, 'MDOF8217', '2020-10-20 13:32:12', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Lemon Crusher', 2, 70),
(1393, 'Panner Currey', 'small', '500 ml', 1, 1, 330, 250, 'LXCG798f', '2020-10-20 13:37:26', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Lemon Crusher', 2, 70),
(1394, 'Panner Currey', 'small', '500 ml', 1, 1, 330, 250, 'MMBT598f', '2020-10-21 11:34:23', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Lemon Crusher', 2, 70),
(1395, 'Panner Currey', 'small', '500 ml', 1, 1, 330, 250, 'TALB91d4', '2020-10-21 11:36:08', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Lemon Crusher', 2, 70),
(1396, 'Panner Currey', 'small', '500 ml', 1, 1, 260, 250, 'AEVB110e', '2020-10-21 11:39:54', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Coke', 1, 40),
(1397, 'Panner Currey', 'small', '500 ml', 1, 1, 330, 250, 'AEVB110e', '2020-10-21 11:39:54', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', 'Lemon Crusher', 2, 70),
(1398, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'KCEB35ce', '2020-11-06 11:31:01', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1399, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'AOBP535e', '2020-11-06 11:32:49', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1400, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'RPNC0690', '2020-11-12 15:57:25', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1401, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'EFDC8091', '2020-11-12 16:57:25', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1402, 'Pizza', '4', 'pices', 20, 1, 190, 200, 'SKXZ310c', '2020-11-12 17:06:13', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', 'Coke', 1, 40),
(1403, 'Pizza', '4', 'pices', 20, 6, 900, 1200, 'DTQN8432', '2020-11-12 17:07:59', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1404, 'Pizza', '4', 'pices', 20, 6, 900, 1200, 'FPFN9673', '2020-11-12 17:16:14', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1405, 'Pizza', '4', 'pices', 20, 6, 900, 1200, 'DBGZ33df', '2020-11-12 17:24:11', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1406, 'Pizza', '4', 'pices', 20, 6, 900, 1200, 'MCFZ0129', '2020-11-12 17:36:19', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1407, 'Pizza', '4', 'pices', 20, 3, 450, 600, 'WYMF26de', '2020-11-12 21:46:46', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1408, 'Pizza', '4', 'pices', 20, 3, 450, 600, 'BADC6671', '2020-11-12 21:48:49', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1409, 'Arhar Daal', '1', 'KG', 110, 6, 840, 1080, 'XMYJ4405', '2020-11-13 13:55:31', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1410, 'Arhar Daal', '1', 'KG', 110, 7, 980, 1260, 'ZWXE019e', '2020-11-13 13:57:06', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1411, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'VRUH0714', '2020-11-16 19:06:15', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1412, 'Pizza', '4', 'pices', 20, 1, 150, 200, 'NFAC3522', '2020-11-16 19:39:32', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '0', 0, 0),
(1413, 'Hyderabadi Dum Biryani', '250', 'Full', 23, 1, 180, 150, 'UOAV591f', '2020-11-16 19:45:16', 'product/images/16-11-2020/161120071028pm-biryani.jpg', '0', 0, 0),
(1414, 'Arhar Daal', '5', 'KG', 123, 1, 500, 550, 'SBOY72a9', '2020-11-16 20:00:17', 'images/product/14-09-2020/9.png', NULL, 0, 0),
(1415, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'KZDF4950', '2020-11-16 21:18:25', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1416, 'Toor dal', '500', 'Grm', 124, 1, 40, 60, 'KZDF4950', '2020-11-16 21:18:25', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', NULL, 0, 0),
(1417, 'Chicken Leg Pieces', '250', 'Full', 24, 10, 2005, 1800, 'YGIT485a', '2020-11-18 21:02:17', 'product/images/16-11-2020/161120072120pm-pngegg.png', 'Ketchup', 15, 5),
(1418, 'Chicken Leg Pieces', '250', 'Half', 25, 4, 405, 320, 'CIGL3847', '2020-11-19 11:51:30', 'product/images/16-11-2020/161120072120pm-pngegg.png', 'Ketchup', 15, 5),
(1419, 'Pizza', '4', 'pices', 20, 6, 970, 1200, 'CEAN8652', '2020-11-19 12:35:03', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', 'Coke', 14, 70),
(1420, 'Pizza', '4', 'pices', 20, 6, 975, 1200, 'CEAN8652', '2020-11-19 12:35:03', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', 'Ketchup', 15, 5),
(1421, 'sanitizer', '1', 'Lts', 35, 1, 200, 100, 'FMVO5404', '2020-11-24 12:39:17', 'product/images/24-11-2020/241120112716am-download.jpg', 'hand sanitizer', 23, 100),
(1422, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'TUJA37e6', '2020-11-24 23:38:42', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1423, 'Arhar Daal', '1', 'KG', 110, 1, 140, 180, 'VLIN6653', '2020-11-24 23:38:52', 'product/images/11-09-2020/110920124014pm-9.png', NULL, 0, 0),
(1424, 'sanitizer', '1', 'Lts', 35, 1, 200, 100, 'IJSG13cc', '2020-11-25 11:56:06', 'product/images/24-11-2020/241120112716am-download.jpg', 'hand sanitizer', 23, 100),
(1425, 'sanitizer', '1', 'Lts', 35, 6, 600, 600, 'KFHK70d6', '2020-11-25 20:58:38', 'product/images/24-11-2020/241120112716am-download.jpg', '0', 0, 0),
(1426, 'soap', '5', 'pes', 37, 3, 900, 300, 'KFHK70d6', '2020-11-25 20:58:38', 'product/images/24-11-2020/241120042450pm-download.jpg', '0', 0, 0),
(1427, 'sanitizer', '1', 'Lts', 35, 5, 600, 500, 'DXVO3369', '2020-11-26 18:18:18', 'product/images/24-11-2020/241120112716am-download.jpg', 'hand sanitizer', 23, 100),
(1428, 'sanitizer', '1', 'Lts', 35, 4, 400, 400, 'MHRM30b3', '2020-11-26 18:23:50', 'product/images/24-11-2020/241120112716am-download.jpg', '0', 0, 0),
(1429, 'sanitizer', '1', 'Lts', 35, 4, 500, 400, 'AJEM89f3', '2020-11-28 14:25:41', 'product/images/24-11-2020/241120112716am-download.jpg', 'hand sanitizer', 23, 100);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_banner`
--

CREATE TABLE `parcel_banner` (
  `banner_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerloc_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_banner`
--

INSERT INTO `parcel_banner` (`banner_id`, `cityadmin_id`, `banner_name`, `bannerloc_id`, `banner_image`, `keyword`, `created_at`, `updated_at`, `vendor_id`) VALUES
(2, NULL, 'Banana', '13', 'banner/images/27-11-20/271120031403pm-a0745345-04e5-4591-b834-aeba2483282d.jpg', 'Ba', '27-11-2020 01:31 pm', '27-11-20 03:14 pm', 38),
(3, NULL, 'banner 1', NULL, 'banner/images/27-11-2020/271120062607pm-res1.jfif', 'd', '27-11-2020 06:26 pm', 'N/A', 43);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_category`
--

CREATE TABLE `parcel_category` (
  `parcel_cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_category`
--

INSERT INTO `parcel_category` (`parcel_cat_id`, `cat_name`, `cat_image`, `vendor_id`) VALUES
(13, 'Juise', NULL, 38),
(14, 'Fruits', NULL, 38),
(15, 'Vegitables', NULL, 38);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_charges`
--

CREATE TABLE `parcel_charges` (
  `charge_id` int(100) NOT NULL,
  `city_from` int(11) NOT NULL,
  `city_to` int(11) DEFAULT NULL,
  `parcel_charge` int(11) NOT NULL,
  `charge_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_charges`
--

INSERT INTO `parcel_charges` (`charge_id`, `city_from`, `city_to`, `parcel_charge`, `charge_description`, `vendor_id`, `updated_at`, `created_at`) VALUES
(14, 20, NULL, 10, 'testing', 44, '2020-11-28 14:01:01', '2020-11-28 14:01:01'),
(16, 20, NULL, 15, 'sample aa', 44, '2020-11-28 14:24:13', '2020-11-28 14:24:13'),
(17, 22, NULL, 40, 'Rrrrr', 43, '2020-11-30 06:58:53', '2020-11-30 06:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_city`
--

CREATE TABLE `parcel_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_image` varchar(255) NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel_city`
--

INSERT INTO `parcel_city` (`city_id`, `city_name`, `city_image`, `lat`, `lng`, `vendor_id`, `created_at`, `updated_at`) VALUES
(8, 'Lucknow', 'city/image/27-11-20/271120031440pm-a0745345-04e5-4591-b834-aeba2483282d.jpg', '26.8466937', '80.94616599999999', 38, '01-10-2020 10:44 am', '27-11-20 03:14 pm'),
(9, 'Karimnagar', 'city/images/01-10-2020/011020105348am-My-Post-(27).png', '18.4385553', '79.1288412', 38, '01-10-2020 10:53 am', 'N/A'),
(10, 'Jaipur International Airport (JAI), Tonk Road, Jaipur, Rajasthan, India', 'city/images/01-10-2020/011020053945pm-delivery.png', '26.828096', '75.80594', 38, '01-10-2020 05:39 pm', 'N/A'),
(11, 'Warangal, Telangana, India', 'city/images/06-10-2020/061020091934pm-images---2020-10-06T211917.176.jpeg', '17.97556', '79.60111', 38, '06-10-2020 09:19 pm', 'N/A'),
(15, 'Visakhapatnam, Andhra Pradesh, India', 'city/images/08-10-2020/081020024718pm-220920054850pm-delivery.png', '17.7', '83.25', 38, '08-10-2020 02:47 pm', 'N/A'),
(16, 'Guntur, Andhra Pradesh, India', 'city/images/08-10-2020/081020053112pm-220920054850pm-delivery.png', '16.3', '80.45', 38, '08-10-2020 05:31 pm', 'N/A'),
(20, 'Sonipat Railway Station, Sonipat, Haryana, India', 'city/image/28-11-20/281120121433pm-a0745345-04e5-4591-b834-aeba2483282d.jpg', '28.9894395', '77.017473', 44, '28-11-2020 11:31 am', '28-11-20 12:14 pm'),
(21, 'Lucknow, Uttar Pradesh, India', 'city/images/28-11-2020/281120070940pm-charbagh-main.jpg', '26.86056', '80.91583', 44, '28-11-2020 07:09 pm', 'N/A'),
(22, 'Sonipat Railway Station, Sonipat, Haryana, India', 'city/images/28-11-2020/281120071308pm-seller.png', '28.9894395', '77.017473', 43, '28-11-2020 07:13 pm', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_delivery_boy`
--

CREATE TABLE `parcel_delivery_boy` (
  `delivery_boy_id` int(11) NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_boy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_boy_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lng` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_boy_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online',
  `is_confirmed` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `otp` int(100) DEFAULT NULL,
  `phone_verify` int(100) NOT NULL DEFAULT 0,
  `cityadmin_id` int(11) DEFAULT NULL,
  `dboy_comission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_delivery_boy`
--

INSERT INTO `parcel_delivery_boy` (`delivery_boy_id`, `vendor_id`, `delivery_boy_name`, `delivery_boy_image`, `delivery_boy_phone`, `delivery_boy_pass`, `lat`, `lng`, `device_id`, `created_at`, `updated_at`, `delivery_boy_status`, `is_confirmed`, `otp`, `phone_verify`, `cityadmin_id`, `dboy_comission`) VALUES
(64, '38', 'Rahul Sharma', 'delivery_boy_img/images/27-11-20/271120031529pm-a0745345-04e5-4591-b834-aeba2483282d.jpg', '7275638862', '$2y$10$Vdn6t1arbUjawzAJLqosduW7yMpPdZI4MiJsKAos.dATaw0f5Lpg6', '0', '0', 'N/A', '27-11-2020 02:17 pm', '27-11-20 03:15 pm', 'online', '1', NULL, 0, NULL, 10),
(65, '38', 'ravi', 'delivery_boy_img/images/27-11-2020/271120054739pm-220920054850pm-delivery.png', '8090461919', '$2y$10$ZhENPSw8bElDishcITWGne2XSepnKbAL3dEZip.x.aJhd3qi.Mlam', '0', '0', 'N/A', '27-11-2020 05:47 pm', 'N/A', 'online', '1', 9976, 0, NULL, 50);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_delivery_boy_area`
--

CREATE TABLE `parcel_delivery_boy_area` (
  `delivery_boy_area_id` int(11) NOT NULL,
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_delivery_boy_area`
--

INSERT INTO `parcel_delivery_boy_area` (`delivery_boy_area_id`, `delivery_boy_id`, `area_id`) VALUES
(97, '65', '8'),
(98, '65', '9'),
(99, '66', '8'),
(100, '66', '9'),
(108, '64', '8'),
(109, '64', '9'),
(110, '64', '10'),
(111, '65', '8'),
(112, '65', '9');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_details`
--

CREATE TABLE `parcel_details` (
  `parcel_id` int(11) NOT NULL,
  `source_address_id` int(11) NOT NULL,
  `destination_address_id` int(11) NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dboy_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rem_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcel_details`
--

INSERT INTO `parcel_details` (`parcel_id`, `source_address_id`, `destination_address_id`, `cart_id`, `user_id`, `vendor_id`, `weight`, `length`, `height`, `width`, `pickup_time`, `pickup_date`, `city_id`, `lat`, `lng`, `charges`, `distance`, `payment_method`, `order_status`, `payment_status`, `wallet`, `dboy_id`, `rem_price`, `total_price`, `user_signature`, `description`) VALUES
(1, 1, 1, 'QCWD81ab', 447, 44, '65', '22', '13', '20', '2:30', '2020-11-30', 8, '24', '23', '100', '10', NULL, 'Pending', 'COD', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 2, 'CRNS1937', 447, 44, '65', '22', '13', '20', '2:30', '2020-12-1', 8, '24', '23', '100', '10', NULL, 'Pending', 'COD', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 3, 'TSAI9487', 447, 44, '65', '22', '13', '20', '2:30', '2020-11-29', 8, '24', '23', '100', '10', NULL, 'Completed', 'COD', NULL, '65', NULL, NULL, NULL, NULL),
(4, 4, 4, 'GPYV8538', 447, 44, '65', '22', '13', '20', '2:30', '2020-11-30', 8, '24', '23', '100', '10', 'wallet', 'Completed', 'success', '0', '65', '0', '100', 'N/A', NULL),
(5, 5, 5, 'RQNG40bc', 537, 43, 'TextEditingController#a334d(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#0904e(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#1c39d(TextEditingValue(text: ┤58├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#11a96(TextEditingValue(text: ┤13├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', '22 : 30', '04 - 12 - 2020', 22, '29.0080154', '77.02065060000001', '40', '1.51', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 6, 'TOYU65ed', 447, 44, '65', '22', '13', '20', '2:30', '2020-11-29', 8, '24', '23', '100', '10', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 7, 'TQYI3506', 537, 43, 'TextEditingController#a334d(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#0904e(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#1c39d(TextEditingValue(text: ┤58├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#11a96(TextEditingValue(text: ┤13├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', '22 : 30', '30 - 11 - 2020', 22, '29.0080154', '77.02065060000001', '40', '1.51', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 8, 'ZLPA59ab', 537, 43, 'TextEditingController#a334d(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#0904e(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#1c39d(TextEditingValue(text: ┤58├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#11a96(TextEditingValue(text: ┤13├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', '22 : 30', '30 - 11 - 2020', 22, '29.0080154', '77.02065060000001', '40', '1.51', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 9, 'ZGKB162c', 537, 43, 'TextEditingController#a334d(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#0904e(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#1c39d(TextEditingValue(text: ┤58├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#11a96(TextEditingValue(text: ┤13├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', '22 : 30', '30 - 11 - 2020', 22, '29.0080154', '77.02065060000001', '40', '1.51', NULL, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, 10, 'QJGL22db', 537, 43, 'TextEditingController#a334d(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#0904e(TextEditingValue(text: ┤12├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#1c39d(TextEditingValue(text: ┤58├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', 'TextEditingController#11a96(TextEditingValue(text: ┤13├, selection: TextSelection(baseOffset: -1, extentOffset: -1, affinity: TextAffinity.downstream, isDirectional: false), composing: TextRange(start: -1, end: -1)))', '22 : 30', '04 - 12 - 2020', 22, '29.0080154', '77.02065060000001', '40', '1.51', 'wallet', 'Pending', 'success', NULL, NULL, '0', '60.4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentvia`
--

CREATE TABLE `paymentvia` (
  `paymentvia_id` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `payment_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentvia`
--

INSERT INTO `paymentvia` (`paymentvia_id`, `payment_mode`, `status`, `payment_key`) VALUES
(4, 'Razor Pay', 1, 'rzp_test_7fnnn7WTaard4h'),
(5, 'Paystack', 1, 'pk_test_f0269be01832feda8b9cce63a261770ecd249f77');

-- --------------------------------------------------------

--
-- Table structure for table `payout_notification`
--

CREATE TABLE `payout_notification` (
  `payout_notification_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by_admin` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_banner`
--

CREATE TABLE `pharmacy_banner` (
  `banner_id` int(10) NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacy_banner`
--

INSERT INTO `pharmacy_banner` (`banner_id`, `banner_image`, `vendor_id`, `cat_id`) VALUES
(1, 'banner/images/24-11-2020/241120110944am-0971a54b8dec79ec52691c1a055ea18f.jpg', 42, NULL),
(2, 'banner/images/24-11-2020/241120110959am-unnamed.jpg', 42, NULL),
(3, 'banner/images/04-12-2020/041220052116pm-080819-Body-Prods.jpg', 46, 17),
(4, 'banner/images/04-12-2020/041220053501pm-080819-Body-Prods.jpg', 46, 16);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `subcat_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A',
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `subcat_id`, `product_name`, `product_image`, `created_at`, `updated_at`, `vendor_id`) VALUES
(43, '15', 'testing', 'product/images/07-09-2020/070920085841am-beauty(1).png', '07-09-2020 08:58 am', '07-11-20 02:57 pm', 1),
(48, '17', 'Tomota', 'product/images/11-09-2020/110920074326am-9.png', '11-09-2020 07:43 am', 'N/A', 6),
(49, '18', 'Arhar Daal', 'product/images/11-09-2020/110920124014pm-9.png', '11-09-2020 12:40 pm', '06-10-20 10:40 pm', 1),
(50, '18', 'Toor dal', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', '11-09-2020 12:57 pm', '06-10-20 10:38 pm', 1),
(51, '18', 'Moong Daal', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', '11-09-2020 12:59 pm', 'N/A', 1),
(52, '23', 'Garam Masala', 'product/images/11-09-2020/110920010100pm-71remHYwqwL._SX569_.jpg', '11-09-2020 01:01 pm', 'N/A', 1),
(53, '18', 'Turmeric Powder', 'product/images/11-09-2020/110920010207pm-717Gegl2IbL._SX522_.jpg', '11-09-2020 01:02 pm', 'N/A', 1),
(54, '23', 'Lal Mirch Powder', 'product/images/11-09-2020/110920010339pm-s-l400.jpg', '11-09-2020 01:03 pm', 'N/A', 1),
(55, '22', 'Olive Oil', 'product/images/11-09-2020/110920010512pm-jsfdjbvjhbjh.jfif', '11-09-2020 01:05 pm', 'N/A', 1),
(56, '22', 'Corn Flakes Cereal', 'product/images/11-09-2020/110920010821pm-81wHWuSiVsL._SX425_PIbundle-12,TopRight,0,0_AA425SH20_.jpg', '11-09-2020 01:08 pm', 'N/A', 1),
(57, '21', 'Bodybuilding Supplements & Sports Nutrition', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', '11-09-2020 01:10 pm', '06-10-20 10:41 pm', 1),
(58, '21', 'Fish Oil', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', '11-09-2020 01:12 pm', '06-10-20 10:41 pm', 1),
(59, '22', 'Kissan Jam', 'product/images/11-09-2020/110920011459pm-23-750x750.jpg', '11-09-2020 01:14 pm', 'N/A', 1),
(64, '18', 'kandipappu', 'product/images/26-09-2020/260920073044pm-kirana.png', '26-09-2020 07:30 pm', 'N/A', 1),
(65, '22', 'Amul Butter-Pasteurised', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(66, '22', 'Amul Butter-Pasteurised', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(67, '22', 'Amul Butter - Unsalted', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(68, '22', 'amul cheez slice', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(69, '22', 'Amul Cow Ghee', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(70, '22', 'Amul dark chocolate', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 'N/A', 1),
(71, '30', 'Kandipappu', 'product/images/01-10-2020/011020110224am-kirana.png', '01-10-2020 11:02 am', '06-10-20 10:10 pm', 12),
(73, '26', 'food', 'product/images/05-10-20/051020015700pm-whatsapp.png', '05-10-20 01:57 pm', 'N/A', 1),
(75, '18', 'Arhar Daal', 'images/user/051020152110user_image.png', '05-10-20 03:21 pm', 'N/A', 1),
(76, '18', 'Arhar Daal', 'images/user/051020152148user_image.png', '05-10-20 03:21 pm', 'N/A', 1),
(77, '26', 'food', 'N/A', '05-10-20 03:29 pm', 'N/A', 1),
(78, '18', 'Arhar Daal', 'images/user/051020153523user_image.png', '05-10-20 03:35 pm', 'N/A', 1),
(79, '18', 'Arhar Daal', 'images/user/051020153713user_image.png', '05-10-20 03:37 pm', 'N/A', 1),
(80, '23', 'Test Product', 'N/A', '05-10-20 10:49 pm', 'N/A', 1),
(81, '23', 'Test Product', 'N/A', '05-10-20 10:56 pm', 'N/A', 1),
(82, '31', 'test', 'product/images/06-10-2020/061020101544pm-logo_w.png', '06-10-2020 10:15 pm', 'N/A', 16),
(83, '32', 'pallilu', 'product/images/06-10-2020/061020101658pm-My-Post-(83).png', '06-10-2020 10:16 pm', 'N/A', 17),
(85, '33', 'test', 'product/images/09-10-2020/091020092605pm-logo_w.png', '09-10-2020 09:26 pm', 'N/A', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_varient`
--

CREATE TABLE `product_varient` (
  `varient_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strick_price` float DEFAULT NULL,
  `price` float NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `varient_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_varient`
--

INSERT INTO `product_varient` (`varient_id`, `product_id`, `quantity`, `unit`, `strick_price`, `price`, `description`, `varient_image`, `vendor_id`, `stock`) VALUES
(103, 43, 1, 'KG', 100, 100, 'testing', 'product/images/07-09-2020/070920085841am-beauty(1).png', 1, 38),
(108, 48, 1, 'KG', 110, 100, 'Daal', 'product/images/11-09-2020/110920074326am-9.png', 6, 94),
(110, 49, 1, 'KG', 180, 140, 'Arhar Daal Is Best Dall Ever.', 'product/images/11-09-2020/110920124014pm-9.png', 1, 186),
(111, 50, 1, 'KG', 110, 100, 'Tata Sampann Unpolished Toor Dal/Arhar Dal, 1kg', 'product/images/11-09-2020/110920125732pm-61L1thSI95L._SX569_.jpg', 1, 100),
(112, 51, 1, 'KG', 70, 50, 'Dal Products | Tata Sampann | Moong Daal', 'product/images/11-09-2020/110920125939pm-moong_dal_200g.jpg', 1, 100),
(113, 52, 250, 'Grm', 170, 150, 'Suhana Super Garam Masala', 'product/images/11-09-2020/110920010100pm-71remHYwqwL._SX569_.jpg', 1, 100),
(114, 53, 200, 'Grm', 70, 50, 'Catch Turmeric Powder', 'product/images/11-09-2020/110920010207pm-717Gegl2IbL._SX522_.jpg', 1, 100),
(115, 54, 250, 'Grm', 90, 70, 'Catch Indian Spices Red Chilli / Lal Mirch Powder', 'product/images/11-09-2020/110920010339pm-s-l400.jpg', 1, 100),
(116, 55, 1, 'lit.', 550, 500, 'Espido Roghan Zeitoon - Cooking Oil', 'product/images/11-09-2020/110920010512pm-jsfdjbvjhbjh.jfif', 1, 100),
(117, 56, 500, 'Grm', 290, 250, 'Corn Flakes Cereal, Original', 'product/images/11-09-2020/110920010821pm-81wHWuSiVsL._SX425_PIbundle-12,TopRight,0,0_AA425SH20_.jpg', 1, 100),
(118, 57, 1, 'KG', 1500, 1300, 'Aminoz Pure Whey ProtNutritImpsd', 'product/images/11-09-2020/110920011046pm-71MTT700wZL._SL1500_.jpg', 1, 0),
(119, 58, 60, 'Grm', 600, 500, 'Seacod Cod Liver Oil Capsules', 'product/images/11-09-2020/110920011225pm-seacod-cod-liver-oil-capsules-500x500.jpg', 1, 20),
(120, 59, 1, 'KG', 220, 180, 'Kissan Strawberry Jam', 'product/images/11-09-2020/110920011459pm-23-750x750.jpg', 1, 50),
(122, 49, 500, 'Grm', 110, 90, 'This is unpolished Yellow Daal', 'product/images/11-09-2020/110920124014pm-9.png', 1, 0),
(123, 49, 5, 'KG', 550, 500, 'Yellow Daal', 'images/product/14-09-2020/9.png', 1, 100),
(124, 50, 500, 'Grm', 60, 40, 'Toor Daal', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', 1, 49),
(125, 50, 5, 'KG', 500, 450, 'Unpolished toor Daal', 'images/product/14-09-2020/61L1thSI95L._SX569_.jpg', 1, 50),
(126, 51, 5, 'G', 350, 300, 'Moong Daal', 'images/product/14-09-2020/moong_dal_200g.jpg', 1, 50),
(127, 51, 500, 'Grm', 70, 50, 'Monng Daal chilka', 'images/product/14-09-2020/moong_dal_200g.jpg', 1, 30),
(134, 66, 500, 'g', 230, 240, 'Made from the freshest of cream, the Amul butter has lovely taste which is delicate and slightly salty. This finely processed butter is natural, pure and tastes best overwith toasts and sandwiches. Has a natural and pure formulation that gives it a great taste. Made from fresh cream that has a wonderful flavour. Spread it over toast or cook your curries in it for a heavenly taste.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 100),
(135, 67, 100, 'g', 40, 50, 'Goes well with Sarson da saag.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 100),
(136, 68, 400, 'g', 230, 240, 'Wholesome cheese. Good source of Calcium and milk Proteins.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 100),
(137, 69, 1, 'L Pouch', 500, 510, 'Ideal for Cooking, Garnishing and Making Sweets.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 100),
(138, 70, 150, 'g', 100, 110, 'Amul Dark Chocolate is made with the finest ingredients and rich cocoa. Its strong flavour and silky texture is just what you need to fall in love with pure cocoa for its authentice taste.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 100),
(139, 70, 1, 'grm', 600, 500, 'Made from the freshest of cream, the Amul butter has lovely taste which is delicate and slightly salty. This finely processed butter is natural, pure and tastes best overwith toasts and sandwiches. Has a natural and pure formulation that gives it a great taste. Made from fresh cream that has a wonderful flavour. Spread it over toast or cook your curries in it for a heavenly taste.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 50),
(140, 70, 1, 'grm', 300, 100, 'Goes well with Sarson da saag.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 50),
(141, 70, 1, 'grm', 200, 400, 'Wholesome cheese. Good source of Calcium and milk Proteins.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 50),
(142, 70, 1, 'grm', 50, 1, 'Amul Dark Chocolate is made with the finest ingredients and rich cocoa. Its strong flavour and silky texture is just what you need to fall in love with pure cocoa for its authentice taste.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 50),
(143, 70, 1, 'grm', 200, 150, 'Ideal for Cooking, Garnishing and Making Sweets.', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', 1, 50),
(144, 71, 1, 'Kg', 95, 100, 'Best Quality', 'product/images/01-10-2020/011020110224am-kirana.png', 12, 100),
(145, 71, 500, 'Grams', 48, 50, 'Best', 'images/product/01-10-2020/kirana.png', 12, 100),
(147, 73, 25, 'kg', 500, 500, 'sample', 'product/images/05-10-20/051020015700pm-whatsapp.png', 1, 50),
(149, 76, 1, 'kG', 100, 95, 'unpolished yellow daal', 'images/user/051020152148user_image.png', 1, 50),
(150, 77, 30, 'kg', 500, 500, 'samp', 'N/A', 1, 50),
(151, 78, 1, 'kG', 100, 95, 'unpolished yellow daal', 'images/user/051020153523user_image.png', 1, 50),
(152, 79, 1, 'kG', 100, 95, 'unpolished yellow daal', 'images/user/051020153713user_image.png', 1, 50),
(153, 80, 10, 'GRM', 140, 120, 'Spice Product', 'N/A', 1, 120),
(154, 81, 10, 'GRM', 140, 120, 'Spice Product', 'N/A', 1, 120),
(155, 82, 10, 'Grams', 20, 100, 'test', 'product/images/06-10-2020/061020101544pm-logo_w.png', 16, 10),
(156, 83, 1, 'Kg', 80, 100, 'best quality', 'product/images/06-10-2020/061020101658pm-My-Post-(83).png', 17, 100),
(157, 83, 500, 'gm', 40, 50, 'best quality', 'images/product/06-10-2020/My-Post-(28).png', 17, 100),
(159, 85, 10, 'kg', 20, 100, 'test', 'product/images/09-10-2020/091020092605pm-logo_w.png', 3, 10),
(160, 43, 50, '1', 100, 99, 'this is variant', 'N/A', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `reedem_values`
--

CREATE TABLE `reedem_values` (
  `reedem_id` int(100) NOT NULL,
  `reward_point` int(100) NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reedem_values`
--

INSERT INTO `reedem_values` (`reedem_id`, `reward_point`, `value`) VALUES
(1, 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_addons`
--

CREATE TABLE `restaurant_addons` (
  `addon_id` int(11) NOT NULL,
  `addon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addon_price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_addons`
--

INSERT INTO `restaurant_addons` (`addon_id`, `addon_name`, `addon_price`, `product_id`, `vendor_id`) VALUES
(1, 'Coke', 40, 3, 1),
(2, 'Lemon Crusher', 70, 3, 1),
(3, 'cold drink', 501, 4, 36),
(4, 'cold drink', 100, 5, 36),
(5, '20 pices', 220, 6, 37),
(6, 'Coke', 40, 8, 24),
(7, 'lemon', 30, 8, 24),
(8, 'Half', 100, 9, 24),
(9, 'Full', 250, 9, 24),
(10, 'Coke', 70, 17, 41),
(11, 'Crusher', 110, 17, 41),
(12, 'Extra Cheese', 80, 18, 41),
(14, 'Coke', 70, 20, 38),
(15, 'Ketchup', 5, 20, 38),
(16, 'Chicken Test', 70, 19, 38),
(18, 'cheese corn 2', 30, 16, 38),
(19, 'crusher + coke', 149, 24, 38),
(20, 'Extra Cheese', 200, 24, 38),
(21, 'crusher', 100, 16, 38),
(22, 'crusher + coke', 150, 16, 38),
(23, 'hand sanitizer', 100, 26, 42);

-- --------------------------------------------------------

--
-- Table structure for table `resturant_category`
--

CREATE TABLE `resturant_category` (
  `resturant_cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturant_category`
--

INSERT INTO `resturant_category` (`resturant_cat_id`, `cat_name`, `cat_image`, `vendor_id`) VALUES
(1, 'Main course', 'subcat/images/13-10-2020/131020124720pm-hdsvjhbjhbjhvfe.jpg', 1),
(3, 'delux pizzas', NULL, 36),
(4, 'starter food', NULL, 37),
(5, 'Main course', NULL, 24),
(6, 'Strater', NULL, 38),
(7, 'Pizza', NULL, 41),
(10, 'Biryani', NULL, 38),
(11, 'Juice', NULL, 38),
(12, 'liquid', NULL, 42),
(13, 'Juice', NULL, 44),
(14, 'Pain Medicin', NULL, 42),
(15, 'Proteins Supplement', NULL, 42),
(16, 'testing', NULL, 46),
(17, 'test', NULL, 46);

-- --------------------------------------------------------

--
-- Table structure for table `resturant_deal_product`
--

CREATE TABLE `resturant_deal_product` (
  `deal_product_id` int(11) NOT NULL,
  `deal_price` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturant_deal_product`
--

INSERT INTO `resturant_deal_product` (`deal_product_id`, `deal_price`, `vendor_id`, `variant_id`, `status`) VALUES
(5, 150, 24, 8, 1),
(6, 190, 24, 9, 1),
(7, 100, 38, 31, 1),
(8, 150, 38, 20, 1),
(9, 180, 38, 32, 1),
(10, 100, 42, 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resturant_product`
--

CREATE TABLE `resturant_product` (
  `product_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturant_product`
--

INSERT INTO `resturant_product` (`product_id`, `subcat_id`, `product_name`, `product_image`, `created_at`, `vendor_id`, `updated_at`, `description`) VALUES
(3, 1, 'Panner Currey', 'product/images/13-10-2020/131020042049pm-Paneer-Butter-Masala-Recipe.jpg', '13-10-2020 04:20 pm', 1, '13-10-20 04:37 pm', 'Paneer Butter Masala (Paneer Makhani)'),
(5, 3, 'panner pizza', 'product/images/15-10-2020/151020065855pm-100920125929pm-banner5.jpg', '15-10-2020 06:58 pm', 36, '15-10-2020 06:58 pm', 'sample testing'),
(6, 4, 'Kakori Kebabs', 'product/images/19-10-2020/191020031909pm-eazytrendz_502_blogcat1417600327.jpg', '19-10-2020 03:19 pm', 37, '19-10-2020 03:19 pm', 'Kakori Kebabs'),
(7, 4, 'Aloo and Dal ki Tikki', 'product/images/19-10-2020/191020032313pm-Aloo-Tikki-1-1-1200x1800.jpg', '19-10-2020 03:23 pm', 37, '19-10-2020 03:23 pm', 'Aloo and Dal ki Tikki'),
(8, 5, 'Daal makhani', 'product/images/21-10-2020/211020045756pm-dal-makhani-recipe.jpg', '21-10-2020 04:57 pm', 24, '21-10-2020 04:57 pm', 'Fresh Daal makhani'),
(9, 5, 'Panner Butter Masla', 'product/images/21-10-2020/211020045907pm-paneer-butter-masala-2.jpg', '21-10-2020 04:59 pm', 24, '21-10-2020 04:59 pm', 'Panner Butter Masala'),
(14, 5, 'Amul Butter-Pasteurised', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 24, NULL, 'Made from the freshest of cream, the Amul butter has lovely taste which is delicate and slightly salty. '),
(15, 5, 'Amul Butter - Unsalted', 'images/product/11-09-2020/greenveggies-12-1494566132.jpg', NULL, 24, NULL, 'Goes well with Sarson da saag.'),
(16, 6, 'pizzas', 'product/images/05-11-2020/051120061654pm-restaurant-chocolat.jpg', '05-11-2020 06:16 pm', 38, '20-11-20 12:00 am', 'This is pizza'),
(17, 7, 'Onion Pizza', 'product/images/09-11-2020/091120122619pm-2-Tuna-and-Onion-Pizza-4-1-of-1.jpg', '09-11-2020 12:26 pm', 41, '09-11-2020 12:26 pm', 'this is fresh pizza'),
(18, 7, 'Corn Pizza', 'product/images/09-11-2020/091120123920pm-p_R165798.jpg', '09-11-2020 12:39 pm', 41, '09-11-2020 12:39 pm', 'this is fresh corn pizza'),
(26, 12, 'sanitizer', 'product/images/24-11-2020/241120112716am-download.jpg', '24-11-2020 11:27 am', 42, '24-11-2020 11:27 am', 'testing'),
(28, 12, 'soap', 'product/images/24-11-2020/241120042450pm-download.jpg', '24-11-2020 04:24 pm', 42, NULL, 'testing'),
(30, 14, 'Paracetamol 500mg', 'product/images/28-11-2020/281120022302pm-seller.png', '28-11-2020 02:23 pm', 42, '28-11-2020 02:23 pm', 'demo product');

-- --------------------------------------------------------

--
-- Table structure for table `resturant_variant`
--

CREATE TABLE `resturant_variant` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strick_price` float NOT NULL,
  `price` float NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturant_variant`
--

INSERT INTO `resturant_variant` (`variant_id`, `product_id`, `quantity`, `unit`, `strick_price`, `price`, `vendor_id`) VALUES
(1, 3, 'small', '500 ml', 250, 220, 1),
(3, 5, '16', 'full', 100, 300, 36),
(5, 6, '10', 'pices', 150, 120, 37),
(6, 7, '08', 'pices', 350, 320, 37),
(7, 6, '15', 'pices', 180, 150, 37),
(8, 8, '250', 'half', 250, 220, 24),
(9, 9, '250', 'half', 280, 250, 24),
(10, 8, '500', 'full', 500, 450, 24),
(13, 14, '500', 'half', 230, 240, 24),
(14, 15, '100', 'quator', 40, 50, 24),
(15, 15, '1', 'grm', 600, 500, 24),
(16, 15, '1', 'grm', 300, 100, 24),
(17, 15, '1', 'grm', 200, 400, 24),
(18, 15, '1', 'grm', 50, 1, 24),
(19, 15, '1', 'grm', 200, 150, 24),
(20, 16, '4', 'pices', 200, 180, 38),
(21, 17, '4', 'pices', 110, 80, 41),
(22, 18, '4', 'slice', 150, 110, 41),
(33, 16, '4', 'pices', 800, 786, 38),
(34, 16, '8', 'pices', 220, 220, 38),
(35, 26, '1', 'Lts', 100, 100, 42),
(37, 28, '5', 'pes', 100, 100, 42),
(41, 30, '10', 'Tablet', 10, 15, 42),
(42, 26, '1', 'pc', 40, 100, 42);

-- --------------------------------------------------------

--
-- Table structure for table `reward_history`
--

CREATE TABLE `reward_history` (
  `reward_id` int(11) NOT NULL,
  `cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` float NOT NULL,
  `reward_points` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_history`
--

INSERT INTO `reward_history` (`reward_id`, `cart_id`, `total_amount`, `reward_points`, `user_id`, `created_at`) VALUES
(1, 'UFIJ811f', 101, 10, 421, '2020-08-28'),
(2, 'UFIJ811f', 101, 30, 421, '2020-09-15'),
(3, 'UFIJ811f', 101, 30, 421, '2020-09-16'),
(4, 'YGAI6872', 400, 30, 433, '2020-09-16'),
(5, 'IYII49c4', 1250, 200, 433, '2020-09-17'),
(6, 'EMHG13b0', 310, 30, 433, '2020-09-18'),
(7, 'YMJK441a', 2170, 200, 433, '2020-09-18'),
(8, 'BPFY96de', 690, 30, 433, '2020-09-18'),
(9, 'YJXB78a0', 400, 30, 433, '2020-09-18'),
(10, 'PTWH46d2', 640, 50, 421, '2020-09-26'),
(11, 'PTWH46d2', 640, 50, 421, '2020-09-26'),
(12, 'LDYN95f7', 460, 50, 421, '2020-09-26'),
(13, 'LDYN95f7', 460, 50, 421, '2020-09-26'),
(14, 'PTWH46d2', 640, 50, 421, '2020-09-28'),
(15, 'PTWH46d2', 640, 50, 421, '2020-09-28'),
(16, 'PTWH46d2', 640, 50, 421, '2020-09-28'),
(17, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(18, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(19, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(20, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(21, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(22, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(23, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(24, 'UFIJ811f', 101, 50, 421, '2020-09-29'),
(25, 'AMVI1598', 800, 50, 472, '2020-09-29'),
(26, 'OCAQ003f', 300, 50, 472, '2020-09-30'),
(27, 'CFRP97d9', 820, 50, 472, '2020-09-30'),
(28, 'JJWT49f1', 525, 50, 472, '2020-09-30'),
(29, 'UCZK1045', 740, 50, 472, '2020-09-30'),
(30, 'WWBG0942', 1460, 200, 472, '2020-09-30'),
(31, 'TPYX204e', 470, 50, 472, '2020-09-30'),
(32, 'WMIL7184', 101, 50, 421, '2020-10-03'),
(33, 'WMIL7184', 101, 50, 421, '2020-10-03'),
(34, 'WMIL7184', 101, 50, 421, '2020-10-03'),
(35, 'MSOI376b', 520, 50, 472, '2020-10-09'),
(36, 'CEAN8652', 1025, 200, 536, '2020-11-19'),
(37, 'FMVO5404', 250, 50, 536, '2020-11-27'),
(38, 'GPYV8538', 100, 50, 447, '2020-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `reward_points`
--

CREATE TABLE `reward_points` (
  `reward_id` int(100) NOT NULL,
  `min_cart_value` int(100) NOT NULL,
  `reward_point` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reward_points`
--

INSERT INTO `reward_points` (`reward_id`, `min_cart_value`, `reward_point`) VALUES
(2, 20, 30),
(3, 1000, 200),
(4, 30, 50);

-- --------------------------------------------------------

--
-- Table structure for table `smsby`
--

CREATE TABLE `smsby` (
  `by_id` int(11) NOT NULL,
  `msg91` int(11) NOT NULL DEFAULT 1,
  `twilio` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smsby`
--

INSERT INTO `smsby` (`by_id`, `msg91`, `twilio`, `status`) VALUES
(1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_api`
--

CREATE TABLE `sms_api` (
  `key_id` int(11) NOT NULL,
  `sender_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms_api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_api`
--

INSERT INTO `sms_api` (`key_id`, `sender_id`, `sms_api_key`) VALUES
(1, 'GBSCRB', '197064AVzt8vx55d4d55f3');

-- --------------------------------------------------------

--
-- Table structure for table `source_address`
--

CREATE TABLE `source_address` (
  `source_address_id` int(11) NOT NULL,
  `source_pincode` int(11) NOT NULL,
  `source_houseno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_landmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_phone` int(11) DEFAULT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `source_address`
--

INSERT INTO `source_address` (`source_address_id`, `source_pincode`, `source_houseno`, `source_landmark`, `source_add`, `source_state`, `source_city`, `source_lat`, `source_lng`, `source_phone`, `source_name`) VALUES
(1, 202001, '23', 'css', 'sample', 'delhi', 'delhi', NULL, NULL, NULL, NULL),
(2, 202001, '23', 'css', 'sample', 'delhi', 'delhi', NULL, NULL, NULL, NULL),
(3, 202001, '23', 'css', 'sample', 'delhi', 'delhi', NULL, NULL, NULL, NULL),
(4, 202001, '23', 'css', 'sample', 'delhi', 'delhi', NULL, NULL, NULL, NULL),
(5, 131001, 'house no. 15/240', 'near subzi mandi', 'Rishi Colony', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(6, 202001, '23', 'css', 'sample', 'delhi', 'delhi', NULL, NULL, NULL, NULL),
(7, 131001, 'house no. 15/240', 'near subzi mandi', 'Rishi Colony', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(8, 131001, 'house no. 15/240', 'near subzi mandi', 'Rishi Colony', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(9, 131001, 'house no. 15/240', 'near subzi mandi', 'Rishi Colony', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL),
(10, 131001, 'house no. 15/240', 'near subzi mandi', 'Rishi Colony', 'Haryana', 'Sonipat', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spldaynotification`
--

CREATE TABLE `spldaynotification` (
  `splnotification_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spldays_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celeb_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spldaynotification`
--

INSERT INTO `spldaynotification` (`splnotification_id`, `user_id`, `spldays_id`, `celeb_date`) VALUES
(1, '219', '10', '12/10/2012'),
(2, '219', '10', '12/11/2019'),
(3, '219', '10', '12/10/2012');

-- --------------------------------------------------------

--
-- Table structure for table `spldays`
--

CREATE TABLE `spldays` (
  `spldays_id` int(11) NOT NULL,
  `spldays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wishmsg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spldays`
--

INSERT INTO `spldays` (`spldays_id`, `spldays`, `wishmsg`) VALUES
(9, 'Mom Birthday', 'Happy birthday to your mom. warm wishes for your mom from Go Subscribe team.'),
(10, 'child birthday', 'Happy birthday to your child. warm wishes from Go Subscribe team.'),
(11, 'Dad birthday', 'Happy birthday to your dad. warm wishes for your dad from Go Subscribe team.'),
(12, 'anniversary', 'happy aniversary dear.');

-- --------------------------------------------------------

--
-- Table structure for table `stock_update`
--

CREATE TABLE `stock_update` (
  `stock_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_stock_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `subcat_id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_image` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`subcat_id`, `category_id`, `subcat_name`, `subcat_image`, `created_at`, `updated_at`) VALUES
(2, '33', 'Toned Mil', 'subcat/images/19-07-2019/190719123650pm-1CA.png', '19-07-2019 12:36 pm', '03-04-20 09:15 am'),
(17, '35', 'Sub-category', 'subcat/images/29-08-2020/290820060147am-images.jfif', '29-08-2020 06:01 am', 'N/A'),
(18, '36', 'Daals', 'subcat/images/09-09-2020/090920103140am-grain-pulses-571024.jpg', '09-09-2020 10:31 am', 'N/A'),
(19, '37', 'Skin Care', 'subcat/images/09-09-2020/090920041216pm-sjdfbjwebvnwjbbwer.jfif', '09-09-2020 04:12 pm', 'N/A'),
(21, '38', 'protines & supliments', 'subcat/images/11-09-2020/110920124641pm-61KbyHx8kcL._AC_UL320_.jpg', '11-09-2020 12:46 pm', 'N/A'),
(22, '40', 'Cooking & Baking', 'subcat/images/11-09-2020/110920125133pm-fortune-sunflower-oil-500x500.jpg', '11-09-2020 12:51 pm', 'N/A'),
(23, '36', 'Spice', 'subcat/images/11-09-2020/110920125300pm-spice-masala-grinding-job-work-500x500.png', '11-09-2020 12:53 pm', 'N/A'),
(24, '38', 'vitamin supplements', 'subcat/images/11-09-2020/110920125502pm-vitamin-A.jpg', '11-09-2020 12:55 pm', 'N/A'),
(25, '40', 'Dry fruits & nuts', 'subcat/images/11-09-2020/110920125611pm-71uiJ5HqUaL._SL1500_.jpg', '11-09-2020 12:56 pm', 'N/A'),
(26, '40', 'test', 'subcat/images/12-09-2020/120920063108pm-23-750x750.jpg', '12-09-2020 06:31 pm', 'N/A'),
(30, '44', 'Pulses', 'subcat/images/01-10-2020/011020110119am-kirana.png', '01-10-2020 11:01 am', 'N/A'),
(31, '45', 'pulses', 'subcat/images/06-10-2020/061020101438pm-logo_w.png', '06-10-2020 10:14 pm', 'N/A'),
(32, '46', 'Pulses', 'subcat/images/06-10-2020/061020101623pm-groc.jpg', '06-10-2020 10:16 pm', 'N/A'),
(33, '47', 'test', 'subcat/images/09-10-2020/091020092527pm-logo_w.png', '09-10-2020 09:25 pm', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `plan_id` int(11) NOT NULL,
  `plans` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `skip_days` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`plan_id`, `plans`, `days`, `description`, `skip_days`) VALUES
(1, 'Daily', '30', 'daily delivery in a month', '1'),
(3, 'Every 3rd Day', '30', 'skip two days b/w previous and next delivery', '3'),
(4, 'Alternate Days', '30', 'skip one day b/w previous and next delivery', '2'),
(5, 'Every 7th day', '30', 'skip six days b/w previous and next delivery', '7');

-- --------------------------------------------------------

--
-- Table structure for table `support_queries`
--

CREATE TABLE `support_queries` (
  `support_id` int(11) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `query_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_queries`
--

INSERT INTO `support_queries` (`support_id`, `phone_number`, `message`, `user_id`, `query_date`) VALUES
(1, 8287728806, 'Nice Product', 421, '2020-09-17'),
(2, 9761266072, 'I\' am grocery Vendor want to join your Project ', 433, '2020-09-18'),
(3, 9467313652, 'Demo testing is done nnnnnn? Nmmnjnkknnmmmmmmmmmmmmmmmmm; mmmmmmmmmmmmmkjjmkkkkkkkkkkkj', 433, '2020-09-18'),
(4, 8287728806, 'Hello Testing for descending\norder in the admin panel', 421, '2020-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `cityadmin_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL DEFAULT '0',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `vendor_id` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `cityadmin_id`, `category_name`, `category_image`, `home`, `created_at`, `updated_at`, `vendor_id`) VALUES
(35, NULL, 'TecManic Store', 'images/category/29-08-2020/images.jfif', '0', '2020-08-29 06:00:16', '2020-08-29 06:00:16', 6),
(36, NULL, 'Grocery & Stapples', 'images/category/09-09-2020/8811.jpg', '0', '2020-09-09 10:29:30', '2020-09-21 12:26:54', 1),
(38, NULL, 'Nutrition & Health care', 'images/category/11-09-2020/Nutrition-And-Eye-Health-1200x533.jpg', '0', '2020-09-11 12:44:13', '2020-09-11 12:44:13', 1),
(40, NULL, 'Food & beverage', 'images/category/11-09-2020/kelloggs-corn-flakes-500x500.jpg', '0', '2020-09-11 12:49:36', '2020-09-11 12:49:36', 1),
(44, NULL, 'Kirana', 'images/category/01-10-2020/kirana.png', '0', '2020-10-01 11:00:37', '2020-10-01 11:00:37', 12),
(45, NULL, 'cooking essentials', 'images/category/06-10-2020/logo_w.png', '0', '2020-10-06 22:14:18', '2020-10-06 22:14:18', 16),
(46, NULL, 'Kirana', 'images/category/06-10-2020/groc.jpg', '0', '2020-10-06 22:16:09', '2020-10-06 22:16:09', 17),
(47, NULL, 'test', 'images/category/09-10-2020/logo_w.png', '0', '2020-10-09 21:25:06', '2020-10-09 21:25:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `email_id` int(11) NOT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`email_id`, `email_subject`, `email_body`, `head`) VALUES
(1, 'Order Placed Successfully', 'Hello your order is placed we will Deliver soon on your Door Steps', 'GoMarket');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `order_cart_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `delivery_boy_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `delivery_boy_incentive` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `pause_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `pause_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `rem_price` int(100) NOT NULL DEFAULT 0,
  `coupon_discount` int(100) NOT NULL DEFAULT 0,
  `coupon_id` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_cart_id`, `vendor_id`, `user_id`, `address_id`, `total_price`, `products_price`, `delivery_charge`, `plan_id`, `cancel_reason`, `delivery_boy_id`, `delivery_boy_incentive`, `delivery_date`, `start_date`, `end_date`, `pause_start`, `pause_end`, `otp`, `status`, `order_type`, `order_date`, `updated_at`, `rem_price`, `coupon_discount`, `coupon_id`) VALUES
(7, '826e5', '1', '220', '10', '69', '68', '1', 'n/a', 'n/a', '41', '0', '27-02-2020', '21-02-2020', 'n/a', 'n/a', 'n/a', 'n/a', 'completed', 'buyonce', '2020-02-20 08:02:57', '2020-02-26 12:09:35', 10, 50, 3),
(8, 'd3442', '1', '421', '118', '137', '136', '1', 'n/a', 'n/a', '23', '0', '29-02-2020', '29-02-2020', 'n/a', 'n/a', 'n/a', 'n/a', 'buyonce', 'buyonce', '2020-02-20 09:37:09', 'n/a', 10, 50, 0),
(9, 'cf53e', '1', '421', '118', '601', '300', '1', '3', 'n/a', '24', '20', '01-03-2020', '01-03-2020', 'n/a', 'n/a', 'n/a', 'n/a', 'ongoing', 'Subscribe', '2020-02-27 07:02:27', '2020-02-27 08:05:07', 10, 50, 0),
(10, '2f6d2', '1', '421', '118', '137', '136', '1', 'n/a', 'n/a', 'N/A', '20', '28-02-2020', '28-02-2020', 'n/a', 'n/a', 'n/a', 'n/a', 'buyonce', 'buyonce', '2020-02-27 07:04:48', 'n/a', 10, 50, 0),
(11, 'c370d', '1', '421', '118', '500', '68', '1', 'n/a', 'n/a', 'N/A', '30', '03-09-2020', '03-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', 'buyonce', 'buyonce', '2020-08-31 07:28:01', 'n/a', 500, 0, 0),
(12, 'a5008', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 06:45:41', 'n/a', 0, 0, 0),
(13, '3793e', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 10:33:39', 'n/a', 0, 0, 0),
(14, '42004', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 10:34:10', 'n/a', 0, 0, 0),
(15, 'AFYL44c7', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 10:56:48', 'n/a', 0, 0, 0),
(16, 'XIWC6682', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:00:37', 'n/a', 0, 0, 0),
(17, 'UYPA700c', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '05-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:02:28', 'n/a', 0, 0, 0),
(18, 'HPBG8501', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '10-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:02:56', 'n/a', 0, 0, 0),
(19, 'YYGM825c', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '10-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:05:10', 'n/a', 0, 0, 0),
(20, 'CWCO3931', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '10-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:06:51', 'n/a', 0, 0, 0),
(21, 'JQHQ660d', '1', '421', '118', '69', '68', '1', 'n/a', 'n/a', 'N/A', '30', '10-09-2020', '05-09-2020', 'n/a', 'n/a', 'n/a', 'n/a', NULL, NULL, '2020-09-04 11:08:24', 'n/a', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referral`
--

CREATE TABLE `tbl_referral` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referral_by` int(11) NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_referral`
--

INSERT INTO `tbl_referral` (`id`, `user_id`, `referral_by`, `created_at`) VALUES
(28, 461, 451, '2020-10-01 09:20:43'),
(29, 462, 451, '2020-09-17 06:37:59'),
(30, 463, 451, '2020-09-17 06:41:00'),
(31, 464, 451, '2020-09-17 06:44:09'),
(32, 465, 451, '2020-09-17 06:46:03'),
(33, 474, 421, '2020-10-01 18:37:06'),
(34, 475, 421, '2020-10-01 18:39:06'),
(35, 476, 421, '2020-10-01 18:40:30'),
(36, 477, 421, '2020-10-01 18:41:31'),
(37, 478, 421, '2020-10-01 18:42:13'),
(38, 479, 421, '2020-10-01 18:42:28'),
(39, 480, 421, '2020-10-01 18:43:23'),
(40, 481, 421, '2020-10-01 18:45:22'),
(41, 482, 451, '2020-10-01 18:47:54'),
(42, 483, 451, '2020-10-01 18:49:04'),
(43, 484, 451, '2020-10-01 18:50:19'),
(44, 485, 451, '2020-10-01 18:51:19'),
(45, 487, 451, '2020-10-06 13:58:33'),
(46, 491, 486, '2020-10-06 14:25:16'),
(47, 492, 486, '2020-10-06 14:32:12'),
(48, 493, 486, '2020-10-06 14:33:02'),
(49, 503, 451, '2020-10-08 17:01:21'),
(50, 504, 451, '2020-10-08 17:01:58'),
(51, 508, 451, '2020-10-08 17:22:24'),
(52, 509, 451, '2020-10-08 17:24:32'),
(53, 510, 451, '2020-10-08 17:24:40'),
(54, 511, 451, '2020-10-08 17:24:43'),
(55, 512, 451, '2020-10-08 17:24:47'),
(56, 516, 451, '2020-10-08 17:32:47'),
(57, 517, 451, '2020-10-08 17:38:46'),
(58, 518, 451, '2020-10-08 17:42:12'),
(59, 519, 451, '2020-10-08 17:42:17'),
(60, 520, 451, '2020-10-08 17:42:21'),
(61, 521, 451, '2020-10-08 17:42:32'),
(62, 524, 451, '2020-10-08 17:45:58'),
(63, 525, 451, '2020-10-08 17:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scratch_card`
--

CREATE TABLE `tbl_scratch_card` (
  `id` int(11) NOT NULL,
  `reffer_message` varchar(255) NOT NULL,
  `min` varchar(255) NOT NULL,
  `max` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL,
  `app_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_scratch_card`
--

INSERT INTO `tbl_scratch_card` (`id`, `reffer_message`, `min`, `max`, `created_at`, `updated_at`, `limit`, `app_link`) VALUES
(9, 'Invite Your Friends & get Rs. 50 or more', '1', '20', '2019-04-22 05:25:57', '2019-04-27 12:21:09', 10, 'www.aplink.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_credits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rewards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(100) DEFAULT NULL,
  `phone_verified` int(100) DEFAULT 0,
  `referral_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_image`, `user_phone`, `user_password`, `device_id`, `wallet_credits`, `rewards`, `created_at`, `updated_at`, `otp`, `phone_verified`, `referral_code`) VALUES
(424, 'Ajit', 'ajit@gmail.com', 'images/user/310820160803user_image.png', '1234569870', '123456', 'firebase_id', '0', '0', '2020-08-31 16:08:03', '2020-08-31 16:08:03', 9100, NULL, 'AJI8B8WB'),
(429, 'Adjvuf', 'fjgivkbl@gmail.com', 'images/user/010920102445user_image.png', '953168686870', 'wtyipbgi', 'firebase_id', '0', '0', '2020-09-01 10:24:45', '2020-09-01 10:24:45', 866, NULL, ''),
(434, 'Neeraj', 'founder@tecmanic.com', 'images/user/030920125717user_image.png', '9990155993', '12345y78', 'firebase_id', '0', '0', '2020-09-03 12:57:17', '2020-09-03 12:57:17', 0, 1, ''),
(435, 'Vijay', 'vijayenergy360@gmail.com', 'images/user/050920082633user_image.png', '8750749299', 'vijay360', 'firebase_id', '0', '0', '2020-09-05 08:26:33', '2020-09-05 08:26:33', 0, 1, ''),
(436, 'Umesh', 'smamplinfo@gmail.com', 'images/user/050920141621user_image.png', '9009582844', '123456', 'firebase_id', '0', '0', '2020-09-05 14:16:21', '2020-09-05 14:16:21', 0, 1, ''),
(437, 'Ramana Ghugloth', 'Venkatjadav@gmail.com', 'images/user/050920151951user_image.png', '8106060660', 'venkat123', 'firebase_id', '0', '0', '2020-09-05 15:19:51', '2020-09-05 15:19:51', NULL, 1, ''),
(440, 'Ajit', 'aj@gmail.com', 'images/user/100920185910user_image.png', '1470852963', 'no', 'firebase_id', '0', '0', '2020-09-10 18:59:10', '2020-09-10 18:59:10', 0, 1, ''),
(443, 'pavan', 'manlypavan@gmail.com', 'images/user/120920194604user_image.png', '9573002365', 'no', 'firebase_id', '0', '0', '2020-09-12 19:46:04', '2020-09-12 19:46:04', NULL, 1, ''),
(444, 'Pranay', 'pranaykumar854@gmail.com', 'images/user/120920200203user_image.png', '9573222272', 'no', 'c7m6i1NZRzezXqQTUMURad:APA91bGoTfD0plvoWCMkynsjcwspOtLeTm1o9SBKWCIRIuehhpV4JL8_PLLG_cyceUUwRIl-twthpZ1VpK2YJg5mzR-2hgQ-ziQ1zQHAKF1qyRQOzsBS1M0y2VX022IHNWrTZt2P1mhG', '0', '0', '2020-09-12 20:02:03', '2020-09-12 20:02:03', NULL, 1, ''),
(445, 'Rakesh', 'rakesh.mavuram@gmail.com', 'images/user/140920155059user_image.png', '9494499771', 'no', 'firebase_id', '0', '0', '2020-09-14 15:50:59', '2020-09-14 15:50:59', 0, 1, ''),
(447, 'amir', 'amir40011@gmail.com', 'images/user/170920103719user_image.png', '8090461919', 'P@ssw0rd', 'aaaaaaaaaaaaaaaaaa', '0', '50', '2020-09-17 10:37:19', '2020-09-17 10:37:19', 0, NULL, 'AMIATCZN'),
(451, 'Satyam', 'shiv@gmail.com', 'N/A', '7520410113', 'qwerty', 'sdbbbvnbndsvbnsd', '34', '0', '2020-09-16 07:58:04', '2020-09-16 07:58:04', 0, NULL, 'SATE9V84'),
(467, 'B', 'b@gmail.com', 'images/user/210920213840user_image.png', '9669639639', 'no', 'firebase_id', '0', '0', '2020-09-21 21:38:40', '2020-09-21 21:38:40', 0, 1, 'B1REM2'),
(468, 'Das', 'fdaksn@ddks.com', 'images/user/220920150218user_image.png', '0000000000', 'no', 'firebase_id', '0', '0', '2020-09-22 15:02:18', '2020-09-22 15:02:18', 0, 1, 'DASRUSRC'),
(469, 'Rajkumar', 'rajgunda22@gmail.com', 'images/user/220920150218user_image.png', '9652000523', 'no', 'firebase_id', '0', '0', '2020-09-22 15:02:18', '2020-09-22 15:02:18', 0, 1, 'RAJBB8GB'),
(473, 'Kotesh', 'kotesh.b78@gmail.com', 'images/user/280920144500user_image.png', '9700466070', 'no', 'fEQDDtCbTkKewIRbRpaVsH:APA91bGklwft0WOqqgNIsfUUvp7VFV6LK-zMyyJy5IkNpwUvz46CJ7x7b52iIhZOVjIftW5LN4T7csxoDNTjbvVBS_RW69FNrtOPyzeya7ZCVDnnKzwAWy8FO7O6oa5NdSfRyGNIEPlS', '0', '0', '2020-09-28 14:45:00', '2020-09-28 14:45:00', 0, 1, 'KOTGJ53M'),
(474, 'digambar', 'deekhi@gmail.com', 'N/A', '7895811789', 'qwerty', 'qwertyu', '7', '0', '2020-10-01 18:37:06', '2020-10-01 18:37:06', 0, NULL, 'DIG4QNM7'),
(475, 'digambar', 'deekhi@gmail.com', 'N/A', '789581989', 'qwerty', 'qwertyu', '12', '0', '2020-10-01 18:39:06', '2020-10-01 18:39:06', 0, NULL, 'DIGMOVFU'),
(476, 'digambar', 'deekhi@gmail.com', 'N/A', '789581889', 'qwerty', 'qwertyu', '10', '0', '2020-10-01 18:41:08', '2020-10-01 18:41:08', 0, NULL, 'DIGYZF3M'),
(477, 'digambar', 'deekhi@gmail.com', 'N/A', '789581899', 'qwerty', 'qwertyu', '5', '0', '2020-10-01 18:41:31', '2020-10-01 18:41:31', 0, NULL, 'DIGQEKOM'),
(478, 'digambar', 'deekhi@gmail.com', 'N/A', '789000899', 'qwerty', 'qwertyu', '5', '0', '2020-10-01 18:42:13', '2020-10-01 18:42:13', 0, NULL, 'DIGJ1F7F'),
(479, 'digambar', 'deekhi@gmail.com', 'N/A', '709000899', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:42:28', '2020-10-01 18:42:28', 0, NULL, 'DIGBJVD0'),
(480, 'digambar', 'deekhi@gmail.com', 'N/A', '799000899', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:43:25', '2020-10-01 18:43:25', 0, NULL, 'DIGZBNTT'),
(481, 'digambar', 'deekhi@gmail.com', 'N/A', '70000899', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:45:22', '2020-10-01 18:45:22', 0, NULL, 'DIGOC8Q4'),
(482, 'digambar', 'deekhi@gmail.com', 'N/A', '700008990', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:47:54', '2020-10-01 18:47:54', 0, NULL, 'DIGTFYJH'),
(483, 'digambar', 'deekhi@gmail.com', 'N/A', '700908990', 'qwerty', 'qwertyu', '19', '0', '2020-10-01 18:49:04', '2020-10-01 18:49:04', 0, NULL, 'DIGD8HAC'),
(484, 'digambar', 'deekhi@gmail.com', 'N/A', '700998990', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:50:19', '2020-10-01 18:50:19', 0, NULL, 'DIG0120G'),
(485, 'digambar', 'deekhi@gmail.com', 'N/A', '708898990', 'qwerty', 'qwertyu', '0', '0', '2020-10-01 18:51:19', '2020-10-01 18:51:19', 0, NULL, 'DIG8QVQN'),
(493, 'Ratan', 'shiv@gmail.com', 'N/A', '9761266072', 'qwerty', 'sdbbbvnbndsvbnsd', '8', '0', '2020-10-06 14:33:02', '2020-10-06 14:33:02', NULL, 1, 'RAT1OJPH'),
(509, 'digambar', 'deekhi@gmail.com', 'N/A', '917895811769', 'qwerty', 'qwertyu', '0', '0', '2020-10-08 17:24:32', '2020-10-08 17:24:32', 1315, 0, 'DIGEDXSX'),
(518, 'digambar', 'deekhi@gmail.com', 'N/A', '+917895811769', 'qwerty', 'qwertyu', '0', '0', '2020-10-08 17:42:12', '2020-10-08 17:42:12', 1216, 0, 'DIGG59KE'),
(525, 'digambar', 'deekhi@gmail.com', 'N/A', '7895811769', 'qwerty', 'qwertyu', '200', '0', '2020-10-08 17:49:33', '2020-10-08 17:49:33', 8148, 0, 'DIGRUG4T'),
(530, 'A', 'a@gmail.com', 'images/user/091020110742user_image.png', '1234567891', 'no', 'dk0L5IHSTkO2vTgoQe2rqD:APA91bH5TVuEF3NGgGXidCTGRfLhbV4XYl93x0c2blbqKAzrtr5nlkqyv76yqlyFLFtdMIprFt9V4QdKfezmZOO_Kc-o9TsqoCB-tIgt8r-ekmAt7C9QAajHeBic81YHVmfxY7wWfBoF', '0', '0', '2020-10-09 11:07:42', '2020-10-09 11:07:42', 3243, 0, 'ALOBT3'),
(535, 'Ajit', 'ajit@gmail.com', 'images/user/091020175420user_image.png', '1478529630', 'no', 'c77QZToOQsiKRbQXUCpr_N:APA91bGwxUVX6kBxa62tcHhhRSC7rvE22I8OJNJJeiCR4G9YhQFtCxcKFNPM7k79HlUgMh4RpLbNPguVUtgur4vDJ3ShD57UmC-O9uFEOjCPEjVSBeHJKm2lEeD9gAGdipqz6QVatKpk', '0', '0', '2020-10-09 17:54:20', '2020-10-09 17:54:20', 0, 0, 'AJI03AYF'),
(536, 'TecManic', 'abcd@gmail.com', 'images/user/091020181452user_image.png', '9999999999', 'no', 'cIj_COrwT3CAlg_qXfg_H5:APA91bGv_FCEjR8XZKyUwis8J94h4ncnLydvHAwHT3ADqyCmfNjYUCtKKHUnRDkGm75Q5M_VEfc_ZAh3HQNcgj4Qiz_698KrvObGcHnz1R1wPKjuFM9B-y4qVfOoPQ6-1mMSJY51_fIM', '220', '50', '2020-10-09 18:14:52', '2020-10-09 18:14:52', NULL, 1, 'TECVUPUJ'),
(537, 'Ajit Singh', 'jeet.singh.2689@gmail.com', 'images/user/101020101827user_image.png', '9467313652', 'no', 'caU_m7TOTVi1lqCK5oXdD4:APA91bEmHtADbVrgDDccB_r7yNGaBfvGN5uc9Y3Bsx74P4nrOg3YpGlwaSTr7zzuVA-Fkr-ihOAX4taUYGG2XUCxnb32FoCebPguXHv0D9nn29bBdzDg74iNwAoS9Eo6zH9ifE2Rof5M', '0', '0', '2020-10-10 10:18:27', '2020-10-10 10:18:27', NULL, 1, 'AJI5ZWK7'),
(538, 'Neeraj', 'nb@tecmanic.com', 'images/user/301020173913user_image.png', '9149359056', 'no', 'd51rEpjQTCWVONHPtsFWAa:APA91bFLIe4s-lVgjhfV3EOFHYTzs2x8tVYhyado7GWKmwXgZJgTFXotCGT8NmP2U9LrJt4ItOhXgiNzV_Da7dksLvLCbdgNnx91_KZ7XTG1ehcRxYYqNhUsrk-TBk4xvnx6Cf1C8HFo', '0', '0', '2020-10-30 17:39:13', '2020-10-30 17:39:13', NULL, 1, 'NEEFECZC'),
(539, 'Debshankar Das', 'dev.munna3@gmail.com', 'images/user/041120124714user_image.png', '9064563419', 'no', 'cUsy41uDQPu7e1kj-8k2JZ:APA91bF-d9DX2WE0ymAGtk0tDPZ3EE4E5j0I6rsZ5W3pSaCfR7dKMhl2Gz-fxh_I-iQasGbpMEWy3qDGo1p82ON0_MZCxV-_8F2Qx63w9EAnWHUVKSNrUkerdu-4333LAeBzBjXH9J45', '0', '0', '2020-11-04 12:47:14', '2020-11-04 12:47:14', NULL, 1, 'DEBK19F8'),
(540, 'amir', 'amir40011@gmail.com', 'images/user/261120144539user_image.png', '8090461918', 'admin', 'xyz111', '0', '0', '2020-11-26 14:45:39', '2020-11-26 14:45:39', NULL, 1, 'AMIVSY0K'),
(541, 'Digambar', 'deekhati62@gmail.com', 'images/user/021220140641user_image.png', '8476978906', 'no', 'eQyHmJAuQvupZwmrbHxRkx:APA91bHva8VX_ozJjMvwwkGLTXLEfTeDwXZ3C1uVMdJAq7CVMIo7p_X5BRzNNX7TWMifNOshWgZvFv4g261VQeoBPpFSVW1npNWoksnCLF0hk4YciDjJTVD0R_0IA0B9Was5H2kzYeFS', '0', '0', '2020-12-02 14:06:41', '2020-12-02 14:06:41', 0, 0, 'DIGQ95ZP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_scratch_card`
--

CREATE TABLE `tbl_user_scratch_card` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `scratch_id` int(11) NOT NULL,
  `app_group_id` int(11) DEFAULT NULL,
  `scratch_type` varchar(255) NOT NULL,
  `scratch_for` varchar(255) DEFAULT NULL,
  `earning` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_scratch` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_scratch_card`
--

INSERT INTO `tbl_user_scratch_card` (`id`, `user_id`, `scratch_id`, `app_group_id`, `scratch_type`, `scratch_for`, `earning`, `is_scratch`, `created_at`) VALUES
(4070, 451, 9, NULL, 'reward', 'referral reward', '4', 0, '2020-09-16 09:20:43'),
(4071, 461, 9, NULL, 'reward', 'referral reward', '1', 0, '2020-09-16 09:20:43'),
(4072, 451, 9, NULL, 'reward', 'referral reward', '23', 0, '2020-09-17 06:38:00'),
(4073, 462, 9, NULL, 'reward', 'referral reward', '17', 0, '2020-09-17 06:38:00'),
(4074, 451, 9, NULL, 'reward', 'referral reward', '15', 0, '2020-09-17 06:41:00'),
(4075, 463, 9, NULL, 'reward', 'referral reward', '12', 0, '2020-09-17 06:41:00'),
(4076, 451, 9, NULL, 'reward', 'referral reward', '25', 0, '2020-09-17 06:44:10'),
(4077, 464, 9, NULL, 'reward', 'referral reward', '22', 0, '2020-09-17 06:44:10'),
(4078, 421, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 7', 0, '2020-10-01 18:37:06'),
(4079, 474, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 3', 0, '2020-10-01 18:37:06'),
(4080, 421, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 12', 0, '2020-10-01 18:39:06'),
(4081, 475, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 19', 0, '2020-10-01 18:39:06'),
(4082, 421, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 10', 0, '2020-10-01 18:40:35'),
(4083, 476, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 19', 0, '2020-10-01 18:40:35'),
(4084, 421, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 5', 0, '2020-10-01 18:41:31'),
(4085, 477, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 7', 0, '2020-10-01 18:41:31'),
(4086, 421, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 5', 0, '2020-10-01 18:42:14'),
(4087, 478, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 10', 0, '2020-10-01 18:42:14'),
(4088, 451, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 19', 0, '2020-10-01 18:49:04'),
(4089, 483, 9, NULL, 'reward', 'referral reward', 'You\'ve won ₹ 12', 0, '2020-10-01 18:49:04'),
(4090, 486, 9, NULL, 'reward', 'referral reward', '18', 0, '2020-10-06 14:25:16'),
(4091, 491, 9, NULL, 'reward', 'referral reward', '9', 0, '2020-10-06 14:25:16'),
(4092, 486, 9, NULL, 'reward', 'referral reward', '1', 0, '2020-10-06 14:32:12'),
(4093, 492, 9, NULL, 'reward', 'referral reward', '10', 0, '2020-10-06 14:32:12'),
(4094, 486, 9, NULL, 'reward', 'referral reward', '8', 0, '2020-10-06 14:33:02'),
(4095, 493, 9, NULL, 'reward', 'referral reward', '19', 0, '2020-10-06 14:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `termcondition`
--

CREATE TABLE `termcondition` (
  `id` int(255) NOT NULL,
  `termcondition` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termcondition`
--

INSERT INTO `termcondition` (`id`, `termcondition`) VALUES
(4, '    Scope. The following Terms and Conditions will apply exclusively to the current and future business relationships between Monotype Imaging Inc. (collectively with its subsidiaries and affiliated companies, “Monotype”) and you (“you” or the “customer”). Any additional or inconsistent terms issued by you, including any such terms and conditions set forth on a purchase order provided by you shall not be binding upon Monotype, unless Monotype gives its express agreement in writing.\r\n\r\n    Entire Agreement. Any quotation or price information made available by Monotype is without obligation and subject to change without notice unless an offer has been designated as binding. Oral understandings between you and Monotype will require written confirmation by Monotype and a contract between you and Monotype will only become valid when it has been accepted in writing by Monotype (e.g., confirmation of order, which will be final) or when the order is performed (e.g., delivery, download or connection by you of or to the software). As permitted by law, Monotype reserves the right to correct errors in its offers, invoices and communications such as spelling or arithmetical errors. You and Monotype each owe a duty to each other co-operate in order to give full effect to your agreement.\r\n\r\n    Assignment. Unless specifically set forth in a written agreement between you and Monotype, your obligations to Monotype may not be sublicensed or assigned to any third party (with a change in control of you constituting an assignment). These Terms and Conditions shall be binding on each party’s successors and assigns.\r\n\r\n    Delivery. As permitted by law, Monotype’s standard delivery terms are FOB origin.\r\n\r\n    Prices. Unless otherwise indicated in writing by Monotype, all prices are quoted in US dollars and are exclusive of all taxes and duties imposed by any governmental authority and freight and shipping charges, all of which shall be paid by you.\r\n\r\n    Payment. Unless specifically set forth in a written agreement between you and Monotype, payment for goods or services from Monotype is net thirty (30) days from the date of invoice. Overdue payments shall bear interest from the due date at the rate of the lower of one and half percent per month (1.5%) or the maximum rate permissible under applicable law.\r\n\r\n    Warranty. Unless specifically set forth in a written agreement between you and Monotype or as required by law, the goods and services purchased by you are provided “as is” without any representation or warranty of any kind, including without limitation, any warranty of non-infringement or fitness for a particular purpose.\r\n\r\n    Partial Nullity. In the event that any provision of these Terms and Conditions is unenforceable or invalid, such unenforceability or invalidity shall not render these Terms and Conditions unenforceable or invalid as a whole, and, in such event, such provision shall be changed and interpreted so as to best accomplish the objectives of such unenforceable or invalid provision within the limits of applicable law or court decisions.\r\n\r\n    Export. You agree that the software licensed to you by Monotype will not be shipped, transferred or exported into any country or used in any manner prohibited by the United States Export Administration or any applicable export laws, restrictions or regulations.\r\n\r\n    U.S. Government Contracts. If the software licensed to you by Monotype is acquired under the terms of a (i) GSA contract - use, reproduction or disclosure is subject to the restrictions set forth in the applicable ADP Schedule contract, (ii) DOD contract - use, duplication or disclosure by the Government is subject to the applicable restrictions set forth in DFARS 252.277-7013; (iii) Civilian agency contract - use, reproduction, or disclosure is subject to FAR 52.277-19(a) through (d) and restrictions set forth in your agreement with Monotype.'),
(6, '    Scope. The following Terms and Conditions will apply exclusively to the current and future business relationships between Monotype Imaging Inc. (collectively with its subsidiaries and affiliated companies, “Monotype”) and you (“you” or the “customer”). Any additional or inconsistent terms issued by you, including any such terms and conditions set forth on a purchase order provided by you shall not be binding upon Monotype, unless Monotype gives its express agreement in writing.\r\n\r\n    Entire Agreement. Any quotation or price information made available by Monotype is without obligation and subject to change without notice unless an offer has been designated as binding. Oral understandings between you and Monotype will require written confirmation by Monotype and a contract between you and Monotype will only become valid when it has been accepted in writing by Monotype (e.g., confirmation of order, which will be final) or when the order is performed (e.g., delivery, download or connection by you of or to the software). As permitted by law, Monotype reserves the right to correct errors in its offers, invoices and communications such as spelling or arithmetical errors. You and Monotype each owe a duty to each other co-operate in order to give full effect to your agreement.\r\n\r\n    Assignment. Unless specifically set forth in a written agreement between you and Monotype, your obligations to Monotype may not be sublicensed or assigned to any third party (with a change in control of you constituting an assignment). These Terms and Conditions shall be binding on each party’s successors and assigns.\r\n\r\n    Delivery. As permitted by law, Monotype’s standard delivery terms are FOB origin.\r\n\r\n    Prices. Unless otherwise indicated in writing by Monotype, all prices are quoted in US dollars and are exclusive of all taxes and duties imposed by any governmental authority and freight and shipping charges, all of which shall be paid by you.\r\n\r\n    Payment. Unless specifically set forth in a written agreement between you and Monotype, payment for goods or services from Monotype is net thirty (30) days from the date of invoice. Overdue payments shall bear interest from the due date at the rate of the lower of one and half percent per month (1.5%) or the maximum rate permissible under applicable law.\r\n\r\n    Warranty. Unless specifically set forth in a written agreement between you and Monotype or as required by law, the goods and services purchased by you are provided “as is” without any representation or warranty of any kind, including without limitation, any warranty of non-infringement or fitness for a particular purpose.\r\n\r\n    Partial Nullity. In the event that any provision of these Terms and Conditions is unenforceable or invalid, such unenforceability or invalidity shall not render these Terms and Conditions unenforceable or invalid as a whole, and, in such event, such provision shall be changed and interpreted so as to best accomplish the objectives of such unenforceable or invalid provision within the limits of applicable law or court decisions.\r\n\r\n    Export. You agree that the software licensed to you by Monotype will not be shipped, transferred or exported into any country or used in any manner prohibited by the United States Export Administration or any applicable export laws, restrictions or regulations.\r\n\r\n    U.S. Government Contracts. If the software licensed to you by Monotype is acquired under the terms of a (i) GSA contract - use, reproduction or disclosure is subject to the restrictions set forth in the applicable ADP Schedule contract, (ii) DOD contract - use, duplication or disclosure by the Government is subject to the applicable restrictions set forth in DFARS 252.277-7013; (iii) Civilian agency contract - use, reproduction, or disclosure is subject to FAR 52.277-19(a) through (d) and restrictions set forth in your agreement with Monotype.');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `time_slot_id` int(100) NOT NULL,
  `open_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`time_slot_id`, `open_hour`, `close_hour`, `time_slot`, `vendor_id`) VALUES
(1, '10:00', '20:00', 60, 1),
(2, '10:00', '20:00', 60, 6),
(3, '09:53', '16:52', 60, 34),
(4, '01:43', '18:44', 60, 35),
(5, '01:06', '19:07', 60, 36),
(6, '10:00', '20:00', 60, 37),
(7, '10:00', '20:00', 60, 38),
(8, '10:00', '20:00', 60, 39),
(9, '10:00', '20:00', 60, 40),
(10, '10:00', '22:00', 60, 41),
(11, '10:00', '20:00', 60, 42),
(12, '07:00', '20:17', 60, 43),
(13, '10:00', '20:00', 60, 44),
(14, '10:00', '22:00', 60, 45),
(15, '10:00', '22:00', 60, 46);

-- --------------------------------------------------------

--
-- Table structure for table `twilio`
--

CREATE TABLE `twilio` (
  `twilio_id` int(11) NOT NULL,
  `twilio_sid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twilio_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `twilio`
--

INSERT INTO `twilio` (`twilio_id`, `twilio_sid`, `twilio_token`, `twilio_phone`, `active`) VALUES
(1, 'FdsP8Mmc90a2YDvQTOh6CA', 'SMAMPL', '+19169995023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `UI_Vendor`
--

CREATE TABLE `UI_Vendor` (
  `id` int(11) NOT NULL,
  `ui_design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `UI_Vendor`
--

INSERT INTO `UI_Vendor` (`id`, `ui_design`) VALUES
(1, 'Grocery'),
(2, 'Resturant'),
(3, 'Pharmacy'),
(4, 'Parcal');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `city_id` varchar(255) NOT NULL,
  `area_id` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT 'N/A',
  `updated_at` varchar(255) NOT NULL DEFAULT 'N/A',
  `user_name` varchar(255) DEFAULT NULL,
  `user_number` bigint(200) NOT NULL,
  `select_status` int(11) NOT NULL DEFAULT 0,
  `houseno` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_id`, `user_id`, `city_id`, `area_id`, `address`, `lat`, `lng`, `created_at`, `updated_at`, `user_name`, `user_number`, `select_status`, `houseno`, `pincode`, `state`, `street`) VALUES
(118, '421', '2', 3, '472/B,sadarpur,cannaught palace,New Delhi,Uttar pradesh,201301', '72.000', '85.0000', 'N/A', 'N/A', 'Shiv', 8287728806, 0, '472/B', 201301, 'Uttar pradesh', 'sadarpur'),
(119, '1560', '2', 1, 'F9,yash5 memorial school,mayur vihar extension,New Delhi,UP,201301', '28.0000', '79.0000', 'N/A', 'N/A', 'DEe', 6778909876, 0, '', 0, '', NULL),
(120, '1560', '2', 1, 'F9,yash5 memorial school,mayur vihar extension,New Delhi,UP,201301', '28.0000', '79.0000', 'N/A', 'N/A', 'DEe', 6778909876, 0, '', 0, '', NULL),
(121, '1560', '2', 1, 'F9,yash memorial school,mayur vihar extension,New Delhi,UP,201301', '28.0000', '79.0000', 'N/A', 'N/A', 'DEe', 6778909876, 0, '', 0, '', NULL),
(123, '1560', '2', 1, 'F9,yash3 memorial school,mayur vihar extension,New Delhi,UP,201301', '28.0000', '79.0000', 'N/A', 'N/A', 'DEe', 6778909876, 1, '', 0, '', NULL),
(124, '433', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 0, '', 0, '', NULL),
(128, '440', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit', 1470852963, 1, '', 0, '', NULL),
(129, '441', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Dee', 7895811769, 1, '', 0, '', NULL),
(130, '434', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Neeraj', 9990155993, 1, '', 0, '', NULL),
(131, '436', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Umesh', 9009582844, 1, '', 0, '', NULL),
(132, '437', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Ramana Ghugloth', 8106060660, 0, '', 0, '', NULL),
(133, '437', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Ramana Ghugloth', 8106060660, 0, '', 0, '', NULL),
(134, '442', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Shiv', 9761266072, 1, '', 0, '', NULL),
(138, '443', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'pavan', 9573002365, 1, '', 0, '', NULL),
(139, '444', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Pranay', 9573222272, 2, '', 0, '', NULL),
(141, '433', '2', 3, 'House 458,Near Sector 18 Metro Station Colony 1,cannaught palace,New Delhi,New Delhi,110011', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 2, '', 0, '', NULL),
(142, '445', '2', 1, '472,Stellar Apartments,mayur vihar extension,New Delhi,Uttar pradesh,201301', '28.560400', '77.345001', 'N/A', 'N/A', 'Rakesh', 9494499771, 1, '', 0, '', NULL),
(145, '433', '2', 3, '421,Noida Sector 16,cannaught palace,New Delhi,Uttar Pardesh,110011', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 2, '', 0, '', NULL),
(146, '421', '2', 3, '472,sadarpur,cannaught palace,New Delhi,Uttar pradesh,201301', '72.000', '85.0000', 'N/A', 'N/A', 'Shiv', 8287728806, 1, '472', 201301, 'Uttar pradesh', NULL),
(147, '433', '2', 3, ',Noida Sector 12,cannaught palace,New Delhi,Uttar Pardesh,110011', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 2, NULL, 110011, 'Uttar Pardesh', NULL),
(150, '433', '2', 3, 'House No. 12,Noida Sector 16,cannaught palace,New Delhi,Uttar Pradesh,110033', '28.560400', '77.345001', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 2, 'House No. 12', 110033, 'Uttar Pradesh', 'Noida Sector 16'),
(151, '433', '2', 3, 'House No. 12,Near Bus Stand,cannaught palace,New Delhi,Haryana,131001', '29.00647410', '77.02059070', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 2, 'House No. 12', 131001, 'Haryana', 'Near Bus Stand'),
(152, '433', '2', 3, 'House 12,Area Sector 12,cannaught palace,New Delhi,Haryana,131001', '29.00647340', '77.02059020', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, 'House 12', 131001, 'Haryana', 'Area Sector 12'),
(153, '466', '2', 3, '123,street,cannaught palace,New Delhi,Telangana,505001', '18.43508560', '79.10495550', 'N/A', 'N/A', 'demo', 9999999999, 1, '123', 505001, 'Telangana', 'street'),
(154, '437', '2', 3, 'Hh,123123,cannaught palace,New Delhi,Telangana,504106', '19.08597800', '78.35431910', 'N/A', 'N/A', 'Ramana Ghugloth', 8106060660, 1, 'Hh', 504106, 'Telangana', '123123'),
(155, '437', '2', 3, 'Hh,123123,cannaught palace,New Delhi,Telangana,504106', '19.08597800', '78.35431910', 'N/A', 'N/A', 'Ramana Ghugloth', 8106060660, 0, 'Hh', 504106, 'Telangana', '123123'),
(156, '466', '2', 3, '234,bdhd,cannaught palace,New Delhi,Telangana,505001', '18.43510410', '79.10495250', 'N/A', 'N/A', 'demo', 9999999999, 1, '234', 505001, 'Telangana', 'bdhd'),
(157, '467', '2', 3, 'Hwiwjxben,Naenddj Mehendi,cannaught palace,New Delhi,Telangana,505001', '18.43350750', '79.10883670', 'N/A', 'N/A', 'B', 9669639639, 1, 'Hwiwjxben', 505001, 'Telangana', 'Naenddj Mehendi'),
(158, '472', '2', 3, 'House 12,Sector 15,cannaught palace,New Delhi,Haryana,131001', '29.00641430', '77.02058970', 'N/A', 'N/A', 'Ajit', 9467313652, 0, 'House 12', 131001, 'Haryana', 'Sector 15'),
(159, '472', '2', 3, 'house No 12,Gali No.  10, Society No. 5, Near District Court,cannaught palace,New Delhi,Haryana,131001', '29.00641500', '77.02059280', 'N/A', 'N/A', 'Ajit', 9467313652, 1, 'house No 12', 131001, 'Haryana', 'Gali No.  10, Society No. 5, Near District Court'),
(161, '444', '2', 3, 'Karimnagar,KarimnagarKarimnagar,cannaught palace,New Delhi,Karimnagar,505001', '18.43346150', '79.10859430', 'N/A', 'N/A', 'Pranay', 9573222272, 2, 'Karimnagar', 505001, 'Karimnagar', 'KarimnagarKarimnagar'),
(162, '472', '2', 3, 'House No. 12,New York,cannaught palace,New Delhi,Haryana,131001', '29.00641570', '77.02059340', 'N/A', 'N/A', 'Ajit', 9467313652, 1, 'House No. 12', 131001, 'Haryana', 'New York'),
(163, '444', '2', 3, '9,KarimnagarKarimnagar,cannaught palace,New Delhi,Telangana,505001', '29.006057', '77.027535', 'N/A', 'N/A', 'Pranay', 9573222272, 1, '9', 505001, 'Telangana', 'KarimnagarKarimnagar'),
(165, '444', '3', 25, 'Gh,HhBb,Noida sec 16,Noida,Haryana,11002', '29.006057', '77.027535', 'N/A', 'N/A', 'Pranay', 9573222272, 1, 'Gh', 11002, 'Haryana', 'HhBb'),
(166, '537', '2', 3, 'H 12,Airport Delhi,cannaught palace,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, 'H 12', 131001, 'Haryana', 'Airport Delhi'),
(169, '443', '2', 3, ',,cannaught palace,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'pavan', 9573002365, 1, NULL, 131001, 'Haryana', NULL),
(170, '536', '2', 12, ',,Geeta Colony,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'TecManic', 9999999999, 1, NULL, 131001, 'Haryana', NULL),
(171, '537', '2', 10, '242,Sonipat,laxmi nagar,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, '242', 131001, 'Haryana', 'Sonipat'),
(172, '537', '2', 10, 'H No 12,Sonipat,laxmi nagar,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, 'H No 12', 131001, 'Haryana', 'Sonipat'),
(173, '537', '2', 3, 'House 12,sonipat,cannaught palace,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, 'House 12', 131001, 'Haryana', 'sonipat'),
(174, '537', '2', 34, '472,bareilly,Charbagh, Lucknow, Lucknow, Uttar Pradesh, India,New Delhi,up,201301', '28.26155', '29.1515', 'N/A', 'N/A', 'ajit', 9999999999, 1, '472', 201301, 'up', 'bareilly'),
(175, '537', '2', 11, '124,Sonipat,Nehru Place,New Delhi,Haryana,131001', '29.006057', '77.027535', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, '124', 131001, 'Haryana', 'Sonipat'),
(179, '537', '2', 43, '1525,Hiusr 12,Noida City Center, Sector-32, Noida, Uttar Pradesh, India,New Delhi,Haryana,131001', '29.00642830', '77.02058550', 'N/A', 'N/A', 'Ajit Singh', 9467313652, 1, '1525', 131001, 'Haryana', 'Hiusr 12');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `noti_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `noti_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noti_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by_user` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`noti_id`, `user_id`, `noti_title`, `noti_message`, `read_by_user`, `created_at`, `image`) VALUES
(860, 421, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(861, 422, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(862, 423, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(863, 424, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(864, 425, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(865, 426, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(866, 427, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(867, 428, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(868, 429, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(869, 430, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(870, 431, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(871, 432, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(872, 433, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(873, 434, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(874, 435, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(875, 436, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(876, 437, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(877, 438, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(878, 439, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(879, 440, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(880, 441, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(881, 443, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(882, 444, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(883, 445, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(884, 446, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(885, 447, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(886, 451, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(887, 465, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(888, 466, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(889, 467, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(890, 468, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(891, 469, '!!!!! New Offer !!!!!!', 'Weekend sale is On', 0, '2020-09-22 11:10:16', 'N/A'),
(892, 421, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(893, 424, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(894, 429, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(895, 434, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(896, 435, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(897, 436, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(898, 437, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(899, 440, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(900, 441, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(901, 443, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(902, 444, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(903, 445, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(904, 446, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(905, 447, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(906, 451, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(907, 465, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(908, 466, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(909, 467, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(910, 468, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(911, 469, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(912, 472, 'Hello Test Title', 'fasdfasfasdfasdfasdfadfasdfadsfasfasfasdfsafasfas', 0, '2020-09-23 10:23:55', 'N/A'),
(913, 421, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(914, 424, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(915, 429, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(916, 434, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(917, 435, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(918, 436, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(919, 437, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(920, 440, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(921, 441, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(922, 443, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(923, 444, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(924, 445, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(925, 446, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(926, 447, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(927, 451, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(928, 465, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(929, 466, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(930, 467, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(931, 468, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(932, 469, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(933, 472, 'Hello Test Title', 'tyfdsdfjsdfksf;lsdjk;fajfklasf;fasdfjlasjdfl;asfd;dflasdfasfjlkjflsd', 0, '2020-09-23 10:31:21', 'N/A'),
(934, 421, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(935, 424, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(936, 429, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(937, 434, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(938, 435, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(939, 436, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(940, 437, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(941, 440, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(942, 441, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(943, 443, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(944, 444, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(945, 445, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(946, 446, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(947, 447, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(948, 451, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(949, 465, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(950, 466, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(951, 467, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(952, 468, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(953, 469, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(954, 472, 'Hello Test Title', 'dfdsfasfafdfsdfsafdasfsfdffsfasfsfsfsdfd', 0, '2020-09-23 10:35:18', 'N/A'),
(955, 421, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(956, 424, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(957, 429, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(958, 434, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(959, 435, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(960, 436, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(961, 437, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(962, 440, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(963, 441, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(964, 443, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(965, 444, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(966, 445, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(967, 446, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(968, 447, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(969, 451, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(970, 465, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(971, 466, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(972, 467, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(973, 468, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(974, 469, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(975, 472, 'Hello Test Title', 'fdfadfafdfdfaghghghdfdsfasdfsfdsf', 0, '2020-09-23 15:39:36', 'N/A'),
(976, 421, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(977, 424, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(978, 429, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(979, 434, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(980, 435, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(981, 436, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(982, 437, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(983, 440, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(984, 441, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(985, 443, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(986, 444, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(987, 445, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(988, 446, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(989, 447, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(990, 451, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(991, 465, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(992, 466, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(993, 467, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(994, 468, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(995, 469, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(996, 472, 'Hello Test Title', 'dsdsfdasfffasfdsfsfdasfdasfdsf', 0, '2020-09-23 15:52:44', 'N/A'),
(997, 421, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(998, 424, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(999, 429, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1000, 434, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1001, 435, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1002, 436, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1003, 437, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1004, 440, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1005, 441, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1006, 443, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1007, 444, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1008, 445, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1009, 446, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1010, 447, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1011, 451, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1012, 465, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1013, 466, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1014, 467, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1015, 468, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1016, 469, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1017, 472, 'Shopping 50% off', 'Grab the deal in your neareast store.', 0, '2020-09-23 15:54:36', 'N/A'),
(1018, 421, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1019, 424, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1020, 429, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1021, 434, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1022, 435, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1023, 436, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1024, 437, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1025, 440, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1026, 441, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1027, 443, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1028, 444, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1029, 445, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1030, 446, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1031, 447, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1032, 451, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1033, 465, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1034, 466, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1035, 467, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1036, 468, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1037, 469, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1038, 472, 'Shopping 50% off', 'Grab the 50% deal of your nearest store.', 0, '2020-09-23 16:01:32', 'N/A'),
(1039, 421, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1040, 424, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1041, 429, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1042, 434, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1043, 435, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1044, 436, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1045, 437, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1046, 440, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1047, 441, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1048, 443, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1049, 444, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1050, 445, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1051, 446, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1052, 447, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1053, 451, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1054, 465, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1055, 466, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1056, 467, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1057, 468, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1058, 469, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1059, 472, 'Shopping 50% off', 'Grab 50% deal over tomato.', 0, '2020-09-23 16:06:56', 'N/A'),
(1060, 421, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1061, 424, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1062, 429, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1063, 434, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1064, 435, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1065, 436, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1066, 437, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1067, 440, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1068, 441, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1069, 443, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1070, 444, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1071, 445, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1072, 446, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1073, 447, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1074, 451, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1075, 465, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1076, 466, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1077, 467, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1078, 468, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1079, 469, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1080, 472, 'New Title 50%', 'New Title 50% New Title 50%', 0, '2020-09-23 16:09:57', 'N/A'),
(1081, 421, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1082, 424, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1083, 429, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1084, 434, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1085, 435, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1086, 436, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1087, 437, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1088, 440, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1089, 441, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1090, 443, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1091, 444, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1092, 445, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1093, 446, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1094, 447, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1095, 451, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1096, 465, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1097, 466, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1098, 467, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1099, 468, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1100, 469, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1101, 472, 'Shopping 50% off', 'dfaffa niafodkf jfas dfaljlsdkfladsflkajdsf', 0, '2020-09-23 16:14:00', 'N/A'),
(1102, 421, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1103, 424, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1104, 429, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1105, 434, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1106, 435, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1107, 436, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1108, 437, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1109, 440, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1110, 441, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1111, 443, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1112, 444, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1113, 445, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1114, 446, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1115, 447, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1116, 451, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1117, 465, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1118, 466, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1119, 467, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1120, 468, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1121, 469, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1122, 472, 'New Title 50%', 'dfafsdfasfd', 0, '2020-09-23 16:15:08', 'N/A'),
(1123, 421, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1124, 424, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1125, 429, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1126, 434, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1127, 435, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1128, 436, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1129, 437, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1130, 440, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1131, 441, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1132, 443, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1133, 444, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1134, 445, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1135, 446, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1136, 447, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1137, 451, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1138, 465, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1139, 466, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1140, 467, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1141, 468, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1142, 469, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1143, 472, 'New Title 50%', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 0, '2020-09-23 16:16:31', 'N/A'),
(1144, 421, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1145, 424, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1146, 429, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1147, 434, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1148, 435, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1149, 436, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1150, 437, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1151, 440, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1152, 441, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1153, 443, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1154, 444, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1155, 445, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1156, 446, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1157, 447, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1158, 451, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1159, 465, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1160, 466, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1161, 467, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1162, 468, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1163, 469, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1164, 472, 'Shopping 50% off', 'dddreecfd dfadfajfh hjvwertct55fgsfd9999 88675', 0, '2020-09-23 16:21:05', 'N/A'),
(1165, 421, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1166, 424, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1167, 429, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1168, 434, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1169, 435, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1170, 436, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1171, 437, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1172, 440, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1173, 441, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1174, 443, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1175, 444, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1176, 445, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1177, 446, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1178, 447, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1179, 451, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1180, 465, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1181, 466, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1182, 467, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1183, 468, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1184, 469, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1185, 472, 'New Title 50%', 'ssdsdkkk kkkuky ksfgsgregssgsfg fgsgsg', 0, '2020-09-23 16:23:11', 'N/A'),
(1186, 421, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1187, 424, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1188, 429, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1189, 434, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1190, 435, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1191, 436, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1192, 437, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1193, 440, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1194, 441, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1195, 443, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1196, 444, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1197, 445, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1198, 446, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1199, 447, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1200, 451, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1201, 465, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1202, 466, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1203, 467, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1204, 468, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1205, 469, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1206, 472, 'test', 'test message', 0, '2020-09-24 05:35:46', 'images/category/24-09-2020/whatsapp.png'),
(1207, 421, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1208, 424, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1209, 429, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1210, 434, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1211, 435, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1212, 436, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1213, 437, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1214, 440, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1215, 441, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1216, 443, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1217, 444, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1218, 445, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1219, 446, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1220, 447, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1221, 451, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1222, 465, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1223, 466, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1224, 467, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1225, 468, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1226, 469, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1227, 472, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1228, 473, 'This Is the test notification', 'done by the demo test ddddddd', 0, '2020-09-29 06:34:20', 'images/category/29-09-2020/images4.jpg'),
(1229, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-12 between 13:00-16:00.', 0, '2020-09-29 11:29:15', NULL),
(1230, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-12 between 13:00-16:00.', 0, '2020-09-29 11:30:01', NULL),
(1231, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-12 between 13:00-16:00.', 0, '2020-09-29 11:31:14', NULL),
(1232, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-12 between 13:00-16:00.', 0, '2020-09-29 11:33:22', NULL),
(1233, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:37:42', NULL),
(1234, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:38:53', NULL),
(1235, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:46:15', NULL),
(1236, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:46:42', NULL),
(1237, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:50:50', NULL),
(1238, 421, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-10 between 13:00-16:00.', 0, '2020-09-29 11:52:50', NULL),
(1239, 472, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #OCAQ003f contains of Arhar Daal(1KG)*2 of price rs 300 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-30 between 19:00 - 20:00.', 0, '2020-09-30 12:16:58', NULL),
(1240, 472, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #WWBG0942 contains of Arhar Daal(1KG)*2,Toor dal(1KG)*4,Moong Daal(1KG)*4,Turmeric Powder(200Grm)*3,Garam Masala(250Grm)*3 of price rs 1460 is placed Successfully.You can expect your item(s) will be delivered on 2020-09-30 between 19:00 - 20:00.', 0, '2020-09-30 12:18:40', NULL),
(1241, 472, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #TPYX204e contains of Arhar Daal(1KG)*1,Toor dal(1KG)*3 of price rs 470 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-01 between 11:00 - 12:00.', 0, '2020-09-30 16:09:26', NULL),
(1242, 472, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #CFRP97d9 contains of Arhar Daal(1KG)*3,Toor dal(1KG)*3,Moong Daal(1KG)*3 of price rs 820 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-01 between 11:00 - 12:00.', 0, '2020-09-30 17:24:32', NULL),
(1243, 421, 'Out For Delivery', 'Out For Delivery: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price ₹ 100 is Out For Delivery.Get ready.', 0, '2020-10-03 11:31:29', NULL),
(1244, 421, 'Out For Delivery', 'Out For Delivery: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price ₹ 100 is Out For Delivery.Get ready.', 0, '2020-10-03 11:33:36', NULL),
(1245, 421, 'Order Delivered', 'Delivery Completed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price ₹ 100 is Delivered Successfully.', 0, '2020-10-03 11:35:11', NULL),
(1246, 421, 'Order Delivered', 'Delivery Completed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price ₹ 100 is Delivered Successfully.', 0, '2020-10-03 11:36:12', NULL),
(1247, 421, 'Order Delivered', 'Delivery Completed: Your order id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price ₹ 100 is Delivered Successfully.', 0, '2020-10-03 11:36:28', NULL),
(1248, 424, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1249, 429, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1250, 434, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1251, 435, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1252, 436, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1253, 437, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1254, 440, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1255, 441, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1256, 443, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1257, 444, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1258, 445, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1259, 446, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1260, 447, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1261, 451, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1262, 466, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1263, 467, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1264, 468, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1265, 469, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1266, 472, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1267, 473, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1268, 474, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1269, 475, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1270, 476, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1271, 477, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1272, 478, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1273, 479, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1274, 480, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1275, 481, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1276, 482, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1277, 483, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1278, 484, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1279, 485, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1280, 486, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1281, 493, 'hi', 'hi', 0, '2020-10-06 17:08:36', 'images/category/06-10-2020/492be47a-2ef9-41d1-a85f-9aa3ea91576c.jpg'),
(1282, 424, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1283, 429, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1284, 434, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1285, 435, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1286, 436, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1287, 437, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1288, 440, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1289, 441, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1290, 443, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1291, 444, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1292, 445, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1293, 446, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1294, 447, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1295, 451, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1296, 466, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1297, 467, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1298, 468, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png');
INSERT INTO `user_notification` (`noti_id`, `user_id`, `noti_title`, `noti_message`, `read_by_user`, `created_at`, `image`) VALUES
(1299, 469, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1300, 472, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1301, 473, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1302, 474, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1303, 475, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1304, 476, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1305, 477, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1306, 478, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1307, 479, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1308, 480, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1309, 481, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1310, 482, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1311, 483, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1312, 484, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1313, 485, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1314, 486, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1315, 493, 'hi', 'hi', 0, '2020-10-06 17:09:04', 'images/category/06-10-2020/logo_w.png'),
(1316, 424, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1317, 429, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1318, 434, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1319, 435, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1320, 436, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1321, 437, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1322, 440, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1323, 441, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1324, 443, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1325, 444, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1326, 445, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1327, 446, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1328, 447, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1329, 451, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1330, 466, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1331, 467, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1332, 468, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1333, 469, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1334, 472, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1335, 473, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1336, 474, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1337, 475, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1338, 476, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1339, 477, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1340, 478, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1341, 479, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1342, 480, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1343, 481, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1344, 482, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1345, 483, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1346, 484, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1347, 485, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1348, 486, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1349, 493, 'hi', 'hi', 0, '2020-10-06 17:09:47', 'images/category/06-10-2020/logo_w.png'),
(1350, 472, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #MSOI376b contains of Arhar Daal(1KG)*3 of price rs 520 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-09 between 19:00 - 20:00.', 0, '2020-10-09 12:49:45', NULL),
(1351, 444, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #MQKH360f contains of Arhar Daal(1KG)*2,Toor dal(1KG)*2 of price rs 550 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-11 between 10:00 - 11:00.', 0, '2020-10-09 15:27:45', NULL),
(1352, 444, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #KTKJ325d contains of Fish Oil(60Grm)*1 of price rs 600 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-10 between 10:00 - 11:00.', 0, '2020-10-09 15:33:54', NULL),
(1353, 444, 'Out For Delivery', 'Out For Delivery: Your order id #KTKJ325d contains of Fish Oil(60Grm)*1 of price ₹ 500 is Out For Delivery.Get ready with ₹ 600 cash.', 0, '2020-10-09 15:42:54', NULL),
(1354, 472, 'Out For Delivery', 'Out For Delivery: Your order id #MSOI376b contains of Arhar Daal(1KG)*3 of price ₹ 420 is Out For Delivery.Get ready with ₹ 520 cash.', 0, '2020-10-09 15:47:08', NULL),
(1355, 472, 'Order Delivered', 'Delivery Completed: Your order id #MSOI376b contains of Arhar Daal(1KG)*3 of price ₹ 420 is Delivered Successfully.', 0, '2020-10-09 15:57:54', NULL),
(1356, 444, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #HTUG9982 contains of Toor dal(1KG)*2 of price rs 300 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-10 between 11:00 - 12:00.', 0, '2020-10-09 16:06:24', NULL),
(1357, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #DCFS20b7 contains of Arhar Daal(1KG)*1,Toor dal(1KG)*1,Moong Daal(1KG)*1 of price rs 390 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-10 between 12:00 - 13:00.', 0, '2020-10-10 04:55:17', NULL),
(1358, 444, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #XXBS46dd contains of Arhar Daal(1KG)*1,Toor dal(1KG)*1,Moong Daal(1KG)*1 of price rs 390 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-11 between 10:00 - 11:00.', 0, '2020-10-10 05:53:27', NULL),
(1359, 444, 'Out For Delivery', 'Out For Delivery: Your order id #XXBS46dd contains of Arhar Daal(1KG)*1,Toor dal(1KG)*1,Moong Daal(1KG)*1 of price ₹ 290 is Out For Delivery.Get ready with ₹ 390 cash.', 0, '2020-10-10 06:14:10', NULL),
(1360, 536, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #DGFR914f contains of Arhar Daal(1KG)*2,Toor dal(1KG)*1,Toor dal(5KG)*1 of price rs 850 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-14 between 10:00 - 11:00.', 0, '2020-10-12 23:39:08', NULL),
(1361, 536, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #LXCG798f contains of Panner Currey(small500 ml)*1 of price rs 270 is placed Successfully.You can expect your item(s) will be delivered on 2020-10-16 between 13:00-16:00.', 0, '2020-10-20 10:36:29', NULL),
(1362, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #DBGZ33df contains of Pizza(4pices)*6 of price rs 1000 is placed Successfully.You can expect your item(s) will be delivered on  between .', 0, '2020-11-12 11:54:22', NULL),
(1363, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #MCFZ0129 contains of Pizza(4pices)*6 of price rs 1000 is placed Successfully.You can expect your item(s) will be delivered on  between .', 0, '2020-11-12 12:06:25', NULL),
(1364, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #BADC6671 contains of Pizza(4pices)*3 of price rs 440 is placed Successfully.You can expect your item(s) will be delivered on  between .', 0, '2020-11-12 16:19:05', NULL),
(1365, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #XMYJ4405 contains of Arhar Daal(1KG)*6 of price rs 940 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-13 between 15:00 - 16:00.', 0, '2020-11-13 08:25:47', NULL),
(1366, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #ZWXE019e contains of Arhar Daal(1KG)*7 of price rs 1080 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-13 between 15:00 - 16:00.', 0, '2020-11-13 08:27:13', NULL),
(1367, 536, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #VRUH0714 contains of Pizza(4pices)*1 of price rs 160 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-16 between .', 0, '2020-11-16 13:36:33', NULL),
(1368, 536, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #UOAV591f contains of Hyderabadi Dum Biryani(250Full)*1 of price rs 230 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-16 between .', 0, '2020-11-16 14:15:23', NULL),
(1369, 437, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #KZDF4950 contains of Arhar Daal(1KG)*1,Toor dal(500Grm)*1 of price rs 280 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-17 between 10:00 - 11:00.', 0, '2020-11-16 15:48:32', NULL),
(1370, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #YGIT485a contains of Chicken Leg Pieces(250Full)*10 of price rs 2100 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-18 between .', 0, '2020-11-18 15:32:35', NULL),
(1371, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #CIGL3847 contains of Chicken Leg Pieces(250Half)*4 of price rs 500 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-19 between .', 0, '2020-11-19 06:21:41', NULL),
(1372, 536, 'Out For Delivery', 'Out For Delivery: Your order id #CEAN8652 contains of Pizza(4pices)*6,Pizza(4pices)*6 of price ₹ 1800 is Out For Delivery.Get ready with ₹ 950 cash.', 0, '2020-11-19 08:55:34', NULL),
(1373, 536, 'Order Delivered', 'Delivery Completed: Your order id #CEAN8652 contains of Pizza(4pices)*6,Pizza(4pices)*6 of price ₹ 1800 is Delivered Successfully.', 0, '2020-11-19 10:35:41', NULL),
(1374, 536, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #FMVO5404 contains of sanitizer(1Lts)*1 of price rs 150 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-24 between .', 0, '2020-11-24 07:16:45', NULL),
(1375, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #DXVO3369 contains of sanitizer(1Lts)*5 of price rs 600 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-26 between .', 0, '2020-11-26 12:48:33', NULL),
(1376, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #MHRM30b3 contains of sanitizer(1Lts)*4 of price rs 500 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-26 between .', 0, '2020-11-26 12:54:00', NULL),
(1377, 536, 'Out For Delivery', 'Out For Delivery: Your order id #FMVO5404 contains of sanitizer(1Lts)*1 of price ₹ 100 is Out For Delivery.Get ready with ₹ 150 cash.', 0, '2020-11-27 05:33:42', NULL),
(1378, 536, 'Order Delivered', 'Delivery Completed: Your order id #FMVO5404 contains of sanitizer(1Lts)*1 of price ₹ 100 is Delivered Successfully.', 0, '2020-11-27 05:40:39', NULL),
(1379, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #AJEM89f3 contains of sanitizer(1Lts)*4 of price rs 500 is placed Successfully.You can expect your item(s) will be delivered on 2020-11-28 between .', 0, '2020-11-28 08:55:50', NULL),
(1380, 447, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #\'.GPYV8538.\'', 0, '2020-11-30 10:42:38', NULL),
(1381, 447, 'Out For Delivery', 'Out For Delivery: Your order id #GPYV8538 of price ₹ 0 is Out For Delivery.Get ready.', 0, '2020-11-30 15:01:53', NULL),
(1382, 537, 'WooHoo! Your Order is Placed', 'Order Successfully Placed: Your order id #\'.QJGL22db.\' ', 0, '2020-11-30 15:27:28', NULL),
(1383, 447, 'Order Delivered', 'Delivery Completed: Your order id #GPYV8538 of price ₹ 0 is Delivered Successfully.', 0, '2020-11-30 15:38:38', NULL),
(1384, 424, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1385, 429, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1386, 434, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1387, 435, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1388, 436, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1389, 437, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1390, 440, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1391, 443, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1392, 444, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1393, 445, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1394, 447, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1395, 451, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1396, 467, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1397, 468, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1398, 469, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1399, 473, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1400, 474, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1401, 475, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1402, 476, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1403, 477, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1404, 478, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1405, 479, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1406, 480, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1407, 481, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1408, 482, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1409, 483, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1410, 484, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1411, 485, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1412, 493, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1413, 509, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1414, 518, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1415, 525, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1416, 530, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1417, 535, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1418, 536, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1419, 537, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1420, 538, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1421, 539, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1422, 540, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png'),
(1423, 541, 'hello', 'demo tut', 0, '2020-12-02 14:46:23', 'images/category/02-12-2020/seller.png');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cityadmin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n/a',
  `vendor_category_id` int(11) NOT NULL,
  `comission` int(11) DEFAULT NULL,
  `delivery_range` int(11) NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(10) DEFAULT NULL,
  `phone_verified` int(10) NOT NULL DEFAULT 0,
  `ui_type` int(11) NOT NULL,
  `online_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `owner`, `cityadmin_id`, `vendor_email`, `vendor_phone`, `vendor_logo`, `vendor_loc`, `lat`, `lng`, `opening_time`, `closing_time`, `vendor_pass`, `created_at`, `updated_at`, `vendor_category_id`, `comission`, `delivery_range`, `device_id`, `otp`, `phone_verified`, `ui_type`, `online_status`) VALUES
(1, 'Easy Day', 'dkhati', '1', 'deekhati64@gmail.com', '8476958906', 'images/vendor/profile/09-10-20/091020053356pm-index.jpg', 'noida sector-18 New Delhi', '29.006057', '77.027535', '10:00', '19:00', '$2y$10$AhI5o4y0.ZoDCoz6S05f3O2WKHBK5szLxKHBtg3UDPqNCaZW5ssAq', '14-11-2019 06:34 am', '11-11-20 12:19 pm', 1, 10, 50, 'efZlpGPETsSP0JgWmsAYss:APA91bGCJ9U7GlYvGOt0LkOfYjFzyPa6n3ZSBTYN14hlasQuuMNXk5U0UORlEqg4LCQ5-qZ-wbbS1WAQIEHASutn_27iK0FeBa-_PHlPJFV3wpk7QWfOkYoO_ZR-L3LAFFSAwdZyXKLH', NULL, 0, 1, 'off'),
(3, 'Mega Mart', 'digambar khati', '2', 'deekhai62@gmail.com', '+918476978916', 'vendor_img/images/13-11-19/131119011618pm-IMG_4427.JPG', 'noida sector-18', '29.006057', '77.027535', '10:00', '19:00', '$2y$10$agnJUzCeOplJ1TRt8lMF/eIJ5FDJIdkKeqCYY1dYgnsHX1o/PPhXm', '13-11-2019 01:10 pm', '13-11-19 01:16 pm', 1, NULL, 50, NULL, NULL, 0, 0, NULL),
(4, 'bs', 'sdd', '8', 'deekh@gmail.com', '7895811769', 'snmdbcas/acmklsd/ascnakl/', 'abmjcsb', '28.9999', '78.7738', '10:00', '07:00', 'd8578edf8458ce06fbc5bb76a58c5ca4', '12/10/2019', 'n/a', 1, NULL, 25, NULL, NULL, 0, 0, NULL),
(5, 'BigBazar', 'Shivam Testig', '1', 'vendor@gmail.com', '8287728806', 'vendor_img/images/11-09-20/110920123100pm-613OkiYGJ1L._SX679_.jpg', 'Laxmi Nagar', '28.6275609', '77.2784081', '10:00', '20:00', '$2y$10$AZCYLLATWwBaO92CfrxLF.C5zwGPzE9lG5.YEjPDl2bLtQ9pltqi.', '16-07-2020 11:56 am', '11-09-20 12:31 pm', 1, NULL, 10, NULL, NULL, 0, 0, NULL),
(12, 'Urban', 'urban', '12', 'demo@demo.com', '9346593974', 'vendor_img/images/01-10-2020/011020105707am-My-Post-(27).png', 'Karimnagar, Telangana, India', '18.43694', '79.12417', '09:00', '21:00', '$2y$10$GtdvDqm0Z/usjRy46GxSzeYnSGcY9L1qlG07VB4ClXP1pR9B/3mN6', '01-10-2020 10:57 am', '06-10-20 09:36 pm', 1, 10, 10, 'fT4r-ZTkTH6ZqFEhhHLTIL:APA91bGWyeZ6OeqnTLkHUWzBhaytDulifWvVWLvr8KkIh5SFdWMY7XOfETi2ArPNcme-PA3lxRTWDYIdV5z62gcfAxCpiUSbX8UObT5Y0DXxLkSx0ZLIx6mgu07DrJRQNN1lMnp5B7wz', NULL, 0, 0, NULL),
(15, 'Admin warangal', 'Pranay', '11', 'admin.warangal@gmail.com', '9573222272', 'vendor_img/images/06-10-2020/061020092346pm-images---2020-10-06T211917.176.jpeg', 'Warangal Airport, Mamnoor, Kazipet, Telangana, India', '17.911258500000002', '79.599039', '21:23', '21:23', '$2y$10$VVPhkuBs/Z2zJB5pL47Vu.TV0r9mGTyDMz4YRHDV7EprJpcU7kkL.', '06-10-2020 09:23 pm', '06-10-20 09:38 pm', 1, 10, 25, 'fcId-PoXTKi2AzSP-qUQcu:APA91bFKWA0UMVEHVriTh9G41po1j-1UAKfyqduUtwYrwt83zC5v52Id8korM8IA8L6-hA5dQHnGovpde7Bq4XOn1aXie1xbWIqyxs7FgzQLHOil-u9itJD6PBKNwmCblK2BeAv3OAhn', NULL, 0, 0, NULL),
(16, 'sid.grocery', 'sid.grocery', '14', 'sid.grocery@gmail.com', '9879879879', 'vendor_img/images/06-10-2020/061020095803pm-logo_w.png', 'Siddipet, Telangana, India', '18.1048', '78.8486', '14:03', '09:00', '$2y$10$leyEUVMve1krRpBcHh5eveu5fQmzCgRgU8qeJrAqb8QMGb.ae0D9e', '06-10-2020 09:58 pm', 'n/a', 1, 10, 10, NULL, NULL, 0, 0, NULL),
(17, 'urban', 'pavan', '15', 'vendor@demo.com', '9573002365', 'vendor_img/images/06-10-2020/061020101335pm-My-Post-(27).png', 'Karimnagar, Telangana, India', '18.43333', '79.15', '09:00', '12:00', '$2y$10$sfP0duX6wWQpHg9vYRf9Y.OBVJPCK4OxhDWSVz4.VBbyLFheyAVqq', '06-10-2020 10:13 pm', 'n/a', 1, 10, 10, NULL, NULL, 0, 0, NULL),
(21, 'Fresh Vegitables', 'Aamir', '16', 'test@test.com', '8287728806', 'vendor_img/images/08-10-2020/081020035643pm-hdsvjhbjhbjhvfe.jpg', 'Visakhapatnam, Andhra Pradesh, India', '17.7', '83.25', '10:00', '20:00', '$2y$10$89L5kCWHVLO63jN20vrUhepmGOHNaAD8jSB6Nj1W/NyKiVxjdgQ6y', '08-10-2020 03:56 pm', 'n/a', 1, 10, 500, NULL, NULL, 0, 1, NULL),
(26, 'test', 'amir', '17', 'test@gmail.com', '1234554321', 'vendor_img/images/08-10-2020/081020062930pm-220920054850pm-delivery.png', 'Guntur, Andhra Pradesh, India', '16.3', '80.45', '01:48', '17:48', '$2y$10$iY0tTBH7vYt8ckLSdZV28ueP5TEy2tsU8m8RE4H4t5bMlCST/ynAm', '08-10-2020 06:29 pm', 'n/a', 1, 10, 10, NULL, NULL, 0, 1, NULL),
(28, 'test', 'amir ansari', '17', 'amir@test.com', '1234567886', 'vendor_img/images/08-10-2020/081020064204pm-220920054850pm-delivery.png', 'Anwar Restaurant, 12th Lane, Guntur, Andhra Pradesh, India', '16.305249', '80.437724', '01:41', '18:41', '$2y$10$ed77UsmfzFfW.bZ7nMP2FuRnaKe/yTo4dEz1zDysqT.ty7H9p4YtC', '08-10-2020 06:42 pm', 'n/a', 1, 10, 10, NULL, NULL, 0, 1, NULL),
(31, 'Fresh Meat Basket', 'shivam', '16', 'rawat.shiv27@gmail.com', '8287728806', 'vendor_img/images/08-10-2020/081020072044pm-shop.png', 'Runway, Visakhapatnam Airport (VTZ), Vizag, Andhra Pradesh, Visakhapatnam, Andhra Pradesh, India', '17.727244', '83.223635', '10:00', '22:00', '$2y$10$N9QgrPfSdc0ljzKJsbsyLOTsEAap6verX1PZ25EUSFR67jdbtPS7a', '08-10-2020 07:20 pm', 'n/a', 1, 10, 12, NULL, NULL, 0, 1, NULL),
(38, 'Santa Banta', 'Shivam', '1', 'rawat.shiv2708@gmail.com', '7275638862', 'vendor_img/images/21-10-2020/211020045329pm-restaurant-chocolat.jpg', 'Bareilly Jn. Railway Station, Bareilly, Uttar Pradesh, India', '29.00545090', '77.02136210', '10:00', '20:00', '$2y$10$QjPznQDXBcfbqUZL4CKDHeY5/qQVksICiDNrL9.YFvNLb.Mbq/jbW', '21-10-2020 04:53 pm', 'n/a', 5, 10, 50, 'fY72MT5WQKqp7c1YEUGOFi:APA91bGZwLlXg74pbLwG4BSaXbj9s0d_qei8VO9yQFGpaNdSEkG4PDhpWJ29R7IiSKyAcsBfxNSl6Z2N1pXP8zHEUn7-l9m6BPz81ldvRhAYP2nzgeu17_c8CIEKg_w2oTvFVH7Nor3l', NULL, 0, 2, 'off'),
(40, 'Shivam', 'imshivm', '1', 'qwerty@gmail.com', '1234567890', 'vendor_img/images/03-11-2020/031120031303pm-delivery.png', 'Noida Golf Course, Sector 38, Noida, Uttar Pradesh, India', '28.562483', '77.350164', '10:00', '20:00', '$2y$10$Cqoi7JxAZrFjAy0tTbWiQek9uLEcAmtO63/guDOetmu4HIjFdYe3W', '03-11-2020 03:13 pm', 'n/a', 5, 10, 10, NULL, NULL, 0, 2, NULL),
(41, 'Pizza Corner', 'Aijt', '1', 'ajit@tecmanic.com', '1010101010', 'vendor_img/images/09-11-2020/091120121445pm-logo-13.png', 'Sonipat Railway Station, Sonipat, Haryana, India', '28.9894395', '77.017473', '10:00', '22:00', '$2y$10$HISP6Ns.pPR5MHrMGCs2NuJudE1jLQfEM0vSuUIhSkSdARB1jtQIK', '09-11-2020 12:14 pm', 'n/a', 5, 10, 50, NULL, NULL, 0, 2, NULL),
(42, 'rakesh', 'rakesh kumar', '1', 'rakesh@gmail.com', '9876543210', 'vendor_img/images/23-11-2020/231120070622pm-220920054850pm-delivery.png', 'Sonipat Railway Station, Sonipat, Haryana, India', '28.562505', '77.350214', '10:00', '20:00', '$2y$10$iICA6aFgF1gi4DvVfnR1uuD/V4KdJkc2pcU6vQL8V6CIntIMj/9Cm', '23-11-2020 07:06 pm', '28-11-20 04:29 pm', 6, 10, 10, 'fWqVUaRWRV6VO5yVaFOkH0:APA91bG0WlPDpF9D4et-gWLdgxsqg-JlDvAvHFmcHy9deYwBHsDY7TBxB3wcYvkuwPT0DZaZeFw1W6Pb0u0Y1BvA44IebXwkagQVy5w5RrQCOwqCgwiOR7_tIfFPfVV77FMNo7ESBu-k', NULL, 0, 5, 'ON'),
(43, 'Parcel', 'jeet.sing.2689@gmail.com', '1', 'jeet.sing.2689@gmail.com', '9467313652', 'vendor_img/images/27-11-2020/271120061554pm-seller.png', 'Sonipat Railway Station, Sonipat, Haryana, India', '28.9894395', '77.017473', '07:00', '20:17', '$2y$10$ajr2NcWHD5H8UXPQN.wGgOCzH2v3nXefrcNVq7I9k9PriJy8ZJztm', '27-11-2020 06:15 pm', 'n/a', 10, 15, 20, 'djQconusRyObiJZybE4AkG:APA91bFAL3bda44tg9mLWyISoY1bKSAmlSqtEssTVtDEgpY21JXSvaTy0dL9JBlSHF5hy452FUk2zydgyhdAJpGA8XklEBesSJfikrm-M7Mebp_I9KkUISaapTQUkF-vapcfCUfQk7eP', NULL, 0, 4, 'ON'),
(44, 'Vendor Parcel', 'Parcel', '1', 'parcel@gmail.com', '7275638863', 'vendor_img/images/21-10-2020/211020045329pm-restaurant-chocolat.jpg', 'Bareilly Jn. Railway Station, Bareilly, Uttar Pradesh, India', '29.00545090', '77.02136210', '10:00', '20:00', '$2y$10$QjPznQDXBcfbqUZL4CKDHeY5/qQVksICiDNrL9.YFvNLb.Mbq/jbW', '21-10-2020 04:53 pm', 'n/a', 5, 10, 50, 'fY72MT5WQKqp7c1YEUGOFi:APA91bGZwLlXg74pbLwG4BSaXbj9s0d_qei8VO9yQFGpaNdSEkG4PDhpWJ29R7IiSKyAcsBfxNSl6Z2N1pXP8zHEUn7-l9m6BPz81ldvRhAYP2nzgeu17_c8CIEKg_w2oTvFVH7Nor3l', NULL, 0, 4, 'off'),
(45, 'Shivam Parcal', 'shivam', '1', 'parcal@gmail.com', '6969696969', 'vendor_img/images/03-12-2020/031220020114pm-Ua79c936b1c564d34baeb41894d845a6dX.jpg', 'Noida Sector 15 Metro Station, Golchakkar, Sector 15, Noida, Uttar Pradesh, India', '28.585284', '77.3113565', '10:00', '22:00', '$2y$10$a4iqyd847TQuyBVoq9d72uUua.4oMijdbDjsIrjhmr.FaLBXXGDoW', '03-12-2020 02:01 pm', 'n/a', 10, 10, 20, NULL, NULL, 0, 4, 'ON'),
(46, 'Shivam Pharmacy', 'Shivam', '1', 'pharmacy@gmail.com', '2626262626', 'vendor_img/images/03-12-2020/031220041112pm-logo-13.png', 'Noida Sector 15 Metro Station, Golchakkar, Sector 15, Noida, Uttar Pradesh, India', '28.585284', '77.3113565', '10:00', '22:00', '$2y$10$2Mvuuu02sTwZ.1D.aKK0N.BYmQpGIqA1rPD9FZ.jNV.lvSM1XT2jy', '03-12-2020 04:11 pm', 'n/a', 6, 10, 10, NULL, NULL, 0, 3, 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_area`
--

CREATE TABLE `vendor_area` (
  `vendor_area_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `delivery_charge` int(11) NOT NULL,
  `cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_area`
--

INSERT INTO `vendor_area` (`vendor_area_id`, `area_id`, `delivery_charge`, `cod`, `vendor_id`) VALUES
(1, 3, 100, 'yes', 1),
(2, 25, 100, 'yes', 3),
(3, 29, 30, 'yes', 12),
(4, 30, 20, 'yes', 12),
(5, 12, 50, '0', 1),
(6, 36, 25, '0', 12),
(7, 39, 30, '0', 17),
(8, 37, 50, '0', 16),
(9, 40, 30, '0', 21),
(11, 41, 40, '0', 24),
(12, 11, 50, '0', 38),
(16, 45, 50, '0', 42),
(17, 6, 40, '0', 44),
(18, 45, 10, '0', 43);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_category`
--

CREATE TABLE `vendor_category` (
  `vendor_category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ui_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_category`
--

INSERT INTO `vendor_category` (`vendor_category_id`, `category_name`, `category_image`, `ui_type`) VALUES
(1, 'Grocery', 'city/image/05-10-2020/051020105529am-shop.png', '1'),
(5, 'Resturant', 'city/images/05-10-2020/051020105827am-restaurant.png', '2'),
(6, 'Pharmacy', 'city/image/05-10-2020/051020110501am-drugstore.png', '3'),
(7, 'Meat & fish', 'city/images/05-10-2020/051020110732am-thanksgiving.png', '1'),
(8, 'Testing', 'city/images/07-10-2020/071020102544am-delivery.png', '1'),
(9, 'Testing1234567', 'city/images/28-10-2020/281020053800pm-restaurant-chocolat.jpg', '1'),
(10, 'Parcal', 'city/images/27-11-2020/271120061406pm-seller.png', '4');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_notification`
--

CREATE TABLE `vendor_notification` (
  `not_id` int(11) NOT NULL,
  `not_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `read_by_vendor` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_notification`
--

INSERT INTO `vendor_notification` (`not_id`, `not_title`, `not_message`, `vendor_id`, `read_by_vendor`, `created_at`, `image`) VALUES
(332, 'Hello', 'Hello to all vendors', 1, 1, '2020-09-21 10:31:18', NULL),
(333, 'Hello', 'Hello to all vendors', 3, 0, '2020-09-21 10:31:18', NULL),
(334, 'Hello', 'Hello to all vendors', 4, 0, '2020-09-21 10:31:18', NULL),
(335, 'Hello', 'Hello to all vendors', 5, 0, '2020-09-21 10:31:18', NULL),
(336, 'Hello', 'Hello to all vendors', 6, 0, '2020-09-21 10:31:18', NULL),
(337, 'Hello', 'Hello to all vendors', 7, 0, '2020-09-21 10:31:18', NULL),
(338, 'Hello', 'Hello to all vendors', 8, 0, '2020-09-21 10:31:18', NULL),
(339, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 05:49:28', NULL),
(340, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 05:52:29', NULL),
(341, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 06:04:44', NULL),
(342, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 06:05:16', NULL),
(343, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 06:05:58', NULL),
(344, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-22 06:26:12', NULL),
(345, 'offer 50% test', 'test message', 1, 1, '2020-09-28 06:36:47', 'images/category/28-09-2020/whatsapp.png'),
(346, 'offer 50% test', 'test message', 5, 0, '2020-09-28 06:36:47', 'images/category/28-09-2020/whatsapp.png'),
(347, 'offer 50% test', 'test message', 6, 0, '2020-09-28 06:36:47', 'images/category/28-09-2020/whatsapp.png'),
(348, 'offer 50% test', 'test message', 7, 0, '2020-09-28 06:36:47', 'images/category/28-09-2020/whatsapp.png'),
(349, 'offer 50% test', 'test message', 8, 0, '2020-09-28 06:36:47', 'images/category/28-09-2020/whatsapp.png'),
(350, 'WooHoo ! You Got a New Order', 'you got an order cart id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-12 between 13:00-16:00.', 1, 1, '2020-09-29 11:31:14', NULL),
(351, 'WooHoo ! You Got a New Order', 'you got an order cart id #WGHL406c contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-12 between 13:00-16:00.', 1, 1, '2020-09-29 11:33:22', NULL),
(352, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:37:42', NULL),
(353, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:38:53', NULL),
(354, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:46:15', NULL),
(355, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:46:42', NULL),
(356, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 0. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:50:50', NULL),
(357, 'WooHoo ! You Got a New Order', 'you got an order cart id #WMIL7184 contains of Testing vendor id 1(1KG)*1 of price rs 101. It will have to delivered on 2020-09-10 between 13:00-16:00.', 1, 1, '2020-09-29 11:52:50', NULL),
(358, 'WooHoo ! You Got a New Order', 'you got an order cart id #OCAQ003f contains of Arhar Daal(1KG)*2 of price rs 300. It will have to delivered on 2020-09-30 between 19:00 - 20:00.', 1, 1, '2020-09-30 12:16:58', NULL),
(359, 'WooHoo ! You Got a New Order', 'you got an order cart id #WWBG0942 contains of Arhar Daal(1KG)*2,Toor dal(1KG)*4,Moong Daal(1KG)*4,Turmeric Powder(200Grm)*3,Garam Masala(250Grm)*3 of price rs 1460. It will have to delivered on 2020-09-30 between 19:00 - 20:00.', 1, 1, '2020-09-30 12:18:40', NULL),
(360, 'WooHoo ! You Got a New Order', 'you got an order cart id #TPYX204e contains of Arhar Daal(1KG)*1,Toor dal(1KG)*3 of price rs 470. It will have to delivered on 2020-10-01 between 11:00 - 12:00.', 1, 1, '2020-09-30 16:09:26', NULL),
(361, 'WooHoo ! You Got a New Order', 'you got an order cart id #CFRP97d9 contains of Arhar Daal(1KG)*3,Toor dal(1KG)*3,Moong Daal(1KG)*3 of price rs 820. It will have to delivered on 2020-10-01 between 11:00 - 12:00.', 1, 1, '2020-09-30 17:24:32', NULL),
(362, 'WooHoo ! You Got a New Order', 'you got an order cart id #MSOI376b contains of Arhar Daal(1KG)*3 of price rs 520. It will have to delivered on 2020-10-09 between 19:00 - 20:00.', 1, 1, '2020-10-09 12:49:45', NULL),
(363, 'WooHoo ! You Got a New Order', 'you got an order cart id #MQKH360f contains of Arhar Daal(1KG)*2,Toor dal(1KG)*2 of price rs 550. It will have to delivered on 2020-10-11 between 10:00 - 11:00.', 1, 1, '2020-10-09 15:27:45', NULL),
(364, 'WooHoo ! You Got a New Order', 'you got an order cart id #KTKJ325d contains of Fish Oil(60Grm)*1 of price rs 600. It will have to delivered on 2020-10-10 between 10:00 - 11:00.', 1, 1, '2020-10-09 15:33:54', NULL),
(365, 'WooHoo ! You Got a New Order', 'you got an order cart id #HTUG9982 contains of Toor dal(1KG)*2 of price rs 300. It will have to delivered on 2020-10-10 between 11:00 - 12:00.', 1, 1, '2020-10-09 16:06:24', NULL),
(366, 'WooHoo ! You Got a New Order', 'you got an order cart id #DCFS20b7 contains of Arhar Daal(1KG)*1,Toor dal(1KG)*1,Moong Daal(1KG)*1 of price rs 390. It will have to delivered on 2020-10-10 between 12:00 - 13:00.', 1, 1, '2020-10-10 04:55:17', NULL),
(367, 'WooHoo ! You Got a New Order', 'you got an order cart id #XXBS46dd contains of Arhar Daal(1KG)*1,Toor dal(1KG)*1,Moong Daal(1KG)*1 of price rs 390. It will have to delivered on 2020-10-11 between 10:00 - 11:00.', 1, 1, '2020-10-10 05:53:27', NULL),
(368, 'WooHoo ! You Got a New Order', 'you got an order cart id #DGFR914f contains of Arhar Daal(1KG)*2,Toor dal(1KG)*1,Toor dal(5KG)*1 of price rs 850. It will have to delivered on 2020-10-14 between 10:00 - 11:00.', 1, 0, '2020-10-12 23:39:08', NULL),
(369, 'WooHoo ! You Got a New Order', 'you got an order cart id #LXCG798f contains of Panner Currey(small500 ml)*1 of price rs 270. It will have to delivered on 2020-10-16 between 13:00-16:00.', 1, 0, '2020-10-20 10:36:29', NULL),
(370, 'WooHoo ! You Got a New Order', 'you got an order cart id #DBGZ33df contains of Pizza(4pices)*6 of price rs 1000. It will have to delivered on  between .', 38, 0, '2020-11-12 11:54:22', NULL),
(371, 'WooHoo ! You Got a New Order', 'you got an order cart id #MCFZ0129 contains of Pizza(4pices)*6 of price rs 1000. It will have to delivered on  between .', 38, 0, '2020-11-12 12:06:25', NULL),
(372, 'WooHoo ! You Got a New Order', 'you got an order cart id #BADC6671 contains of Pizza(4pices)*3 of price rs 440. It will have to delivered on  between .', 38, 0, '2020-11-12 16:19:06', NULL),
(373, 'WooHoo ! You Got a New Order', 'you got an order cart id #XMYJ4405 contains of Arhar Daal(1KG)*6 of price rs 940. It will have to delivered on 2020-11-13 between 15:00 - 16:00.', 1, 0, '2020-11-13 08:25:47', NULL),
(374, 'WooHoo ! You Got a New Order', 'you got an order cart id #ZWXE019e contains of Arhar Daal(1KG)*7 of price rs 1080. It will have to delivered on 2020-11-13 between 15:00 - 16:00.', 1, 0, '2020-11-13 08:27:13', NULL),
(375, 'WooHoo ! You Got a New Order', 'you got an order cart id #VRUH0714 contains of Pizza(4pices)*1 of price rs 160. It will have to delivered on 2020-11-16 between .', 38, 0, '2020-11-16 13:36:33', NULL),
(376, 'WooHoo ! You Got a New Order', 'you got an order cart id #UOAV591f contains of Hyderabadi Dum Biryani(250Full)*1 of price rs 230. It will have to delivered on 2020-11-16 between .', 38, 0, '2020-11-16 14:15:23', NULL),
(377, 'WooHoo ! You Got a New Order', 'you got an order cart id #KZDF4950 contains of Arhar Daal(1KG)*1,Toor dal(500Grm)*1 of price rs 280. It will have to delivered on 2020-11-17 between 10:00 - 11:00.', 1, 0, '2020-11-16 15:48:32', NULL),
(378, 'WooHoo ! You Got a New Order', 'you got an order cart id #YGIT485a contains of Chicken Leg Pieces(250Full)*10 of price rs 2100. It will have to delivered on 2020-11-18 between .', 38, 0, '2020-11-18 15:32:35', NULL),
(379, 'WooHoo ! You Got a New Order', 'you got an order cart id #CIGL3847 contains of Chicken Leg Pieces(250Half)*4 of price rs 500. It will have to delivered on 2020-11-19 between .', 38, 0, '2020-11-19 06:21:41', NULL),
(380, 'WooHoo ! You Got a New Order', 'you got an order cart id #FMVO5404 contains of sanitizer(1Lts)*1 of price rs 150. It will have to delivered on 2020-11-24 between .', 42, 0, '2020-11-24 07:16:45', NULL),
(381, 'WooHoo ! You Got a New Order', 'you got an order cart id #DXVO3369 contains of sanitizer(1Lts)*5 of price rs 600. It will have to delivered on 2020-11-26 between .', 42, 0, '2020-11-26 12:48:33', NULL),
(382, 'WooHoo ! You Got a New Order', 'you got an order cart id #MHRM30b3 contains of sanitizer(1Lts)*4 of price rs 500. It will have to delivered on 2020-11-26 between .', 42, 0, '2020-11-26 12:54:00', NULL),
(383, 'WooHoo ! You Got a New Order', 'you got an order cart id #AJEM89f3 contains of sanitizer(1Lts)*4 of price rs 500. It will have to delivered on 2020-11-28 between .', 42, 0, '2020-11-28 08:55:50', NULL),
(384, 'WooHoo ! You Got a New Order', 'you got an order cart id #\'.GPYV8538.\' ', 44, 0, '2020-11-30 10:42:39', NULL),
(385, 'WooHoo ! You Got a New Order', 'you got an order cart id #\'.QJGL22db.\'', 43, 0, '2020-11-30 15:27:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payment`
--

CREATE TABLE `vendor_payment` (
  `payment_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_payment`
--

INSERT INTO `vendor_payment` (`payment_id`, `vendor_id`, `status`, `payment_key`, `payment_mode`) VALUES
(1, 1, 1, 'rzp_test_7fnnn7WTaard4h', 'Razorpay'),
(2, 1, 1, 'pk_test_f0269be01832feda8b9cce63a261770ecd249f77', 'Paystack');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `wallet_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`wallet_id`, `amount`, `type`, `user_id`, `created_at`) VALUES
(1, 50, 'Refund', 421, '2020-09-17'),
(2, 0, 'Refund', 421, '2020-09-17'),
(8, 1250, 'Refund', 433, '2020-09-18'),
(9, 10, 'Reward Values', 421, '2020-09-19'),
(10, 690, 'Refund', 433, '2020-09-19'),
(11, 0, 'Refund', 466, '2020-09-21'),
(12, 0, 'Refund', 437, '2020-09-22'),
(13, 0, 'Refund', 437, '2020-09-22'),
(14, 0, 'Refund', 421, '2020-09-24'),
(15, 0, 'Refund', 421, '2020-09-24'),
(16, 0, 'Refund', 421, '2020-09-24'),
(17, 10, 'Reward Values', 472, '2020-09-30'),
(18, 40, 'Reward Values', 472, '2020-09-30'),
(19, 3, 'Reffer Earn', 421, '2020-10-01'),
(20, 7, 'Reffer Earn', 474, '2020-10-01'),
(21, 19, 'Reffer Earn', 421, '2020-10-01'),
(22, 12, 'Reffer Earn', 475, '2020-10-01'),
(23, 19, 'Reffer Earn', 421, '2020-10-01'),
(24, 10, 'Reffer Earn', 476, '2020-10-01'),
(25, 7, 'Reffer Earn', 421, '2020-10-01'),
(26, 5, 'Reffer Earn', 477, '2020-10-01'),
(27, 10, 'Reffer Earn', 421, '2020-10-01'),
(28, 5, 'Reffer Earn', 478, '2020-10-01'),
(29, 12, 'Reffer Earn', 451, '2020-10-01'),
(30, 19, 'Reffer Earn', 483, '2020-10-01'),
(31, 9, 'Reffer Earn', 486, '2020-10-06'),
(32, 18, 'Reffer Earn', 491, '2020-10-06'),
(33, 10, 'Reffer Earn', 486, '2020-10-06'),
(34, 1, 'Reffer Earn', 492, '2020-10-06'),
(35, 19, 'Reffer Earn', 486, '2020-10-06'),
(36, 8, 'Reffer Earn', 493, '2020-10-06'),
(37, 0, 'Refund', 537, '2020-10-30'),
(38, 0, 'Refund', 537, '2020-11-13'),
(39, 0, 'Refund', 536, '2020-11-24'),
(40, 20, 'Reward Values', 536, '2020-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_recharge_history`
--

CREATE TABLE `wallet_recharge_history` (
  `wallet_recharge_history_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recharge_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_recharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallet_recharge_history`
--

INSERT INTO `wallet_recharge_history` (`wallet_recharge_history_id`, `user_id`, `amount`, `recharge_status`, `date_of_recharge`) VALUES
(1, '219', '50', 'success', '2019-08-02 13:35:37'),
(2, '219', '50', 'failed', '2019-08-02 13:42:19'),
(3, '219', '500', 'success', '2019-08-02 13:44:29'),
(4, '219', '1000', 'success', '2019-08-07 07:40:38'),
(5, '219', '1000', 'failed', '2019-08-07 07:41:35'),
(6, '219', '2000', 'success', '2019-08-10 10:55:07'),
(7, '219', '2000', 'success', '2019-08-10 10:55:42'),
(8, '219', '2000', 'success', '2019-08-10 10:57:51'),
(9, '219', '2000', 'success', '2019-08-10 17:34:56'),
(10, '219', '2000', 'success', '2019-08-10 17:37:50'),
(11, '219', '2000', 'success', '2019-08-10 17:38:45'),
(12, '219', '2000', 'success', '2019-08-10 17:42:14'),
(13, '219', '1000', 'success', '2019-08-10 17:52:53'),
(14, '219', '2000', 'success', '2019-08-10 17:53:02'),
(15, '219', '2000', 'success', '2019-08-10 17:55:22'),
(16, '219', '2000', 'success', '2019-08-10 18:02:14'),
(17, '219', '2000', 'success', '2019-08-10 18:06:39'),
(18, '219', '2000', 'success', '2019-08-10 18:11:14'),
(19, '219', '2000', 'success', '2019-08-10 18:12:21'),
(20, '219', '2000', 'success', '2019-08-10 18:24:53'),
(21, '219', '3000', 'success', '2019-08-12 10:38:13'),
(22, '219', '3100', 'success', '2019-08-12 10:40:09'),
(23, '220', '2900', 'success', '2019-08-13 06:06:25'),
(24, '220', '3100', 'success', '2019-08-13 06:12:10'),
(25, '220', '3100', 'success', '2019-08-14 13:17:21'),
(26, '220', '2900', 'success', '2019-08-14 13:19:00'),
(27, '220', '3100', 'success', '2019-08-14 13:20:14'),
(28, '220', '52', 'success', '2019-08-23 11:51:25'),
(29, '220', '22', 'success', '2019-08-28 07:39:45'),
(30, '220', '22', 'success', '2019-08-28 07:40:22'),
(31, '220', '11', 'success', '2019-08-29 07:18:43'),
(32, '220', '11', 'success', '2019-08-29 07:24:51'),
(33, '220', '11', 'success', '2019-08-29 07:32:40'),
(34, '220', '11', 'success', '2019-08-29 07:33:07'),
(35, '220', '500', 'success', '2019-08-29 07:55:55'),
(36, '220', '11', 'success', '2019-08-29 07:57:11'),
(37, '220', '500', 'success', '2019-08-29 08:00:01'),
(38, '220', '4500', 'success', '2019-08-29 11:13:47'),
(39, '220', '500', 'success', '2019-08-29 11:14:59'),
(40, '264', '5000', 'success', '2019-09-04 07:51:56'),
(41, '264', '500', 'success', '2019-09-04 10:28:40'),
(42, '220', '7000', 'success', '2019-09-06 05:02:49'),
(43, '251', '500', 'success', '2019-09-08 15:58:35'),
(44, '220', '1000', 'success', '2019-09-09 10:51:16'),
(45, '220', '500', 'success', '2019-09-10 07:28:12'),
(46, '220', '25', 'success', '2019-09-10 07:30:13'),
(47, '220', '9500', 'success', '2019-09-10 11:05:12'),
(48, '288', '5000', 'success', '2019-09-13 06:06:10'),
(49, '289', '5000', 'success', '2019-09-13 06:14:00'),
(50, '251', '7000', 'success', '2019-09-13 18:00:49'),
(51, '251', '9000', 'success', '2019-09-13 18:01:41'),
(52, '251', '9000', 'success', '2019-09-13 18:01:58'),
(53, '251', '9000', 'success', '2019-09-13 18:02:22'),
(54, '251', '9000', 'success', '2019-09-13 18:02:43'),
(55, '251', '9000', 'success', '2019-09-13 18:03:06'),
(56, '251', '7928', 'success', '2019-09-13 18:03:41'),
(57, '251', '1000', 'success', '2019-09-14 05:52:38'),
(58, '251', '4000', 'success', '2019-09-14 05:53:05'),
(59, '220', '1000', 'success', '2019-09-16 05:54:48'),
(60, '220', '1000', 'success', '2019-09-16 05:54:51'),
(61, '291', '9000', 'success', '2019-09-16 06:38:29'),
(62, '292', '3000', 'success', '2019-09-16 10:44:53'),
(63, '308', '9000', 'success', '2019-09-24 13:00:20'),
(64, '326', '2000', 'success', '2019-09-26 19:38:10'),
(65, '326', '2000', 'success', '2019-09-26 19:38:11'),
(66, '326', '5000', 'success', '2019-09-26 19:40:50'),
(67, '316', '50', 'success', '2019-09-27 12:33:15'),
(68, '316', '50', 'success', '2019-09-27 12:37:01'),
(69, '219', '105', '1', '2019-12-23 06:00:13'),
(70, '219', '105', '1', '2019-12-23 06:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_banner`
--
ALTER TABLE `admin_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `assign_homecat`
--
ALTER TABLE `assign_homecat`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `banner_resturant`
--
ALTER TABLE `banner_resturant`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cancel_for`
--
ALTER TABLE `cancel_for`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `cash_collect`
--
ALTER TABLE `cash_collect`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `cityadmin`
--
ALTER TABLE `cityadmin`
  ADD PRIMARY KEY (`cityadmin_id`);

--
-- Indexes for table `cityadmin_cat`
--
ALTER TABLE `cityadmin_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comission`
--
ALTER TABLE `comission`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `completed_orders`
--
ALTER TABLE `completed_orders`
  ADD PRIMARY KEY (`completed_id`);

--
-- Indexes for table `country_code`
--
ALTER TABLE `country_code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `deal_product`
--
ALTER TABLE `deal_product`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`delivery_boy_id`);

--
-- Indexes for table `delivery_boy_area`
--
ALTER TABLE `delivery_boy_area`
  ADD PRIMARY KEY (`delivery_boy_area_id`);

--
-- Indexes for table `delivery_boy_comission`
--
ALTER TABLE `delivery_boy_comission`
  ADD PRIMARY KEY (`dboy_comission_id`);

--
-- Indexes for table `delivery_boy_vendor`
--
ALTER TABLE `delivery_boy_vendor`
  ADD PRIMARY KEY (`delivery_boy_vendor_id`);

--
-- Indexes for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  ADD PRIMARY KEY (`delivery_timing_id`);

--
-- Indexes for table `destination_address`
--
ALTER TABLE `destination_address`
  ADD PRIMARY KEY (`destination_address_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `fcm_key`
--
ALTER TABLE `fcm_key`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `first_wallet_recharge`
--
ALTER TABLE `first_wallet_recharge`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `homecat`
--
ALTER TABLE `homecat`
  ADD PRIMARY KEY (`homecat_id`);

--
-- Indexes for table `incentive`
--
ALTER TABLE `incentive`
  ADD PRIMARY KEY (`incentive_id`);

--
-- Indexes for table `incentive_amount`
--
ALTER TABLE `incentive_amount`
  ADD PRIMARY KEY (`incentive_amount_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `mapbox`
--
ALTER TABLE `mapbox`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `map_API`
--
ALTER TABLE `map_API`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `map_settings`
--
ALTER TABLE `map_settings`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `msg91`
--
ALTER TABLE `msg91`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationby`
--
ALTER TABLE `notificationby`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `not_accepted`
--
ALTER TABLE `not_accepted`
  ADD PRIMARY KEY (`not_accepted_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_complains`
--
ALTER TABLE `order_complains`
  ADD PRIMARY KEY (`order_complain_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`store_order_id`);

--
-- Indexes for table `parcel_banner`
--
ALTER TABLE `parcel_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `parcel_category`
--
ALTER TABLE `parcel_category`
  ADD PRIMARY KEY (`parcel_cat_id`);

--
-- Indexes for table `parcel_charges`
--
ALTER TABLE `parcel_charges`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `parcel_city`
--
ALTER TABLE `parcel_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `parcel_delivery_boy`
--
ALTER TABLE `parcel_delivery_boy`
  ADD PRIMARY KEY (`delivery_boy_id`);

--
-- Indexes for table `parcel_delivery_boy_area`
--
ALTER TABLE `parcel_delivery_boy_area`
  ADD PRIMARY KEY (`delivery_boy_area_id`);

--
-- Indexes for table `parcel_details`
--
ALTER TABLE `parcel_details`
  ADD PRIMARY KEY (`parcel_id`);

--
-- Indexes for table `paymentvia`
--
ALTER TABLE `paymentvia`
  ADD PRIMARY KEY (`paymentvia_id`);

--
-- Indexes for table `payout_notification`
--
ALTER TABLE `payout_notification`
  ADD PRIMARY KEY (`payout_notification_id`);

--
-- Indexes for table `pharmacy_banner`
--
ALTER TABLE `pharmacy_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_varient`
--
ALTER TABLE `product_varient`
  ADD PRIMARY KEY (`varient_id`);

--
-- Indexes for table `reedem_values`
--
ALTER TABLE `reedem_values`
  ADD PRIMARY KEY (`reedem_id`);

--
-- Indexes for table `restaurant_addons`
--
ALTER TABLE `restaurant_addons`
  ADD PRIMARY KEY (`addon_id`);

--
-- Indexes for table `resturant_category`
--
ALTER TABLE `resturant_category`
  ADD PRIMARY KEY (`resturant_cat_id`);

--
-- Indexes for table `resturant_deal_product`
--
ALTER TABLE `resturant_deal_product`
  ADD PRIMARY KEY (`deal_product_id`);

--
-- Indexes for table `resturant_product`
--
ALTER TABLE `resturant_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `resturant_variant`
--
ALTER TABLE `resturant_variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `reward_history`
--
ALTER TABLE `reward_history`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `reward_points`
--
ALTER TABLE `reward_points`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `smsby`
--
ALTER TABLE `smsby`
  ADD PRIMARY KEY (`by_id`);

--
-- Indexes for table `sms_api`
--
ALTER TABLE `sms_api`
  ADD PRIMARY KEY (`key_id`);

--
-- Indexes for table `source_address`
--
ALTER TABLE `source_address`
  ADD PRIMARY KEY (`source_address_id`);

--
-- Indexes for table `spldaynotification`
--
ALTER TABLE `spldaynotification`
  ADD PRIMARY KEY (`splnotification_id`);

--
-- Indexes for table `spldays`
--
ALTER TABLE `spldays`
  ADD PRIMARY KEY (`spldays_id`);

--
-- Indexes for table `stock_update`
--
ALTER TABLE `stock_update`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `support_queries`
--
ALTER TABLE `support_queries`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_referral`
--
ALTER TABLE `tbl_referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scratch_card`
--
ALTER TABLE `tbl_scratch_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_scratch_card`
--
ALTER TABLE `tbl_user_scratch_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termcondition`
--
ALTER TABLE `termcondition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `twilio`
--
ALTER TABLE `twilio`
  ADD PRIMARY KEY (`twilio_id`);

--
-- Indexes for table `UI_Vendor`
--
ALTER TABLE `UI_Vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_area`
--
ALTER TABLE `vendor_area`
  ADD PRIMARY KEY (`vendor_area_id`);

--
-- Indexes for table `vendor_category`
--
ALTER TABLE `vendor_category`
  ADD PRIMARY KEY (`vendor_category_id`);

--
-- Indexes for table `vendor_notification`
--
ALTER TABLE `vendor_notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  ADD PRIMARY KEY (`wallet_recharge_history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_banner`
--
ALTER TABLE `admin_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `assign_homecat`
--
ALTER TABLE `assign_homecat`
  MODIFY `assign_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `banner_resturant`
--
ALTER TABLE `banner_resturant`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cancel_for`
--
ALTER TABLE `cancel_for`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancel_reason`
--
ALTER TABLE `cancel_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash_collect`
--
ALTER TABLE `cash_collect`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cityadmin`
--
ALTER TABLE `cityadmin`
  MODIFY `cityadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cityadmin_cat`
--
ALTER TABLE `cityadmin_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comission`
--
ALTER TABLE `comission`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `completed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `country_code`
--
ALTER TABLE `country_code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deal_product`
--
ALTER TABLE `deal_product`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `delivery_boy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `delivery_boy_area`
--
ALTER TABLE `delivery_boy_area`
  MODIFY `delivery_boy_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `delivery_boy_comission`
--
ALTER TABLE `delivery_boy_comission`
  MODIFY `dboy_comission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery_boy_vendor`
--
ALTER TABLE `delivery_boy_vendor`
  MODIFY `delivery_boy_vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery_timing`
--
ALTER TABLE `delivery_timing`
  MODIFY `delivery_timing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination_address`
--
ALTER TABLE `destination_address`
  MODIFY `destination_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fcm_key`
--
ALTER TABLE `fcm_key`
  MODIFY `unique_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_wallet_recharge`
--
ALTER TABLE `first_wallet_recharge`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `homecat`
--
ALTER TABLE `homecat`
  MODIFY `homecat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `incentive`
--
ALTER TABLE `incentive`
  MODIFY `incentive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incentive_amount`
--
ALTER TABLE `incentive_amount`
  MODIFY `incentive_amount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapbox`
--
ALTER TABLE `mapbox`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `map_API`
--
ALTER TABLE `map_API`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `map_settings`
--
ALTER TABLE `map_settings`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `msg91`
--
ALTER TABLE `msg91`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificationby`
--
ALTER TABLE `notificationby`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `not_accepted`
--
ALTER TABLE `not_accepted`
  MODIFY `not_accepted_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT for table `order_complains`
--
ALTER TABLE `order_complains`
  MODIFY `order_complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `store_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1430;

--
-- AUTO_INCREMENT for table `parcel_banner`
--
ALTER TABLE `parcel_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parcel_category`
--
ALTER TABLE `parcel_category`
  MODIFY `parcel_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parcel_charges`
--
ALTER TABLE `parcel_charges`
  MODIFY `charge_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parcel_city`
--
ALTER TABLE `parcel_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parcel_delivery_boy`
--
ALTER TABLE `parcel_delivery_boy`
  MODIFY `delivery_boy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `parcel_delivery_boy_area`
--
ALTER TABLE `parcel_delivery_boy_area`
  MODIFY `delivery_boy_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `parcel_details`
--
ALTER TABLE `parcel_details`
  MODIFY `parcel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paymentvia`
--
ALTER TABLE `paymentvia`
  MODIFY `paymentvia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payout_notification`
--
ALTER TABLE `payout_notification`
  MODIFY `payout_notification_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy_banner`
--
ALTER TABLE `pharmacy_banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product_varient`
--
ALTER TABLE `product_varient`
  MODIFY `varient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `reedem_values`
--
ALTER TABLE `reedem_values`
  MODIFY `reedem_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant_addons`
--
ALTER TABLE `restaurant_addons`
  MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `resturant_category`
--
ALTER TABLE `resturant_category`
  MODIFY `resturant_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `resturant_deal_product`
--
ALTER TABLE `resturant_deal_product`
  MODIFY `deal_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resturant_product`
--
ALTER TABLE `resturant_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `resturant_variant`
--
ALTER TABLE `resturant_variant`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reward_history`
--
ALTER TABLE `reward_history`
  MODIFY `reward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reward_points`
--
ALTER TABLE `reward_points`
  MODIFY `reward_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smsby`
--
ALTER TABLE `smsby`
  MODIFY `by_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_api`
--
ALTER TABLE `sms_api`
  MODIFY `key_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `source_address`
--
ALTER TABLE `source_address`
  MODIFY `source_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spldaynotification`
--
ALTER TABLE `spldaynotification`
  MODIFY `splnotification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spldays`
--
ALTER TABLE `spldays`
  MODIFY `spldays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_update`
--
ALTER TABLE `stock_update`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support_queries`
--
ALTER TABLE `support_queries`
  MODIFY `support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_referral`
--
ALTER TABLE `tbl_referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_scratch_card`
--
ALTER TABLE `tbl_scratch_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `tbl_user_scratch_card`
--
ALTER TABLE `tbl_user_scratch_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4096;

--
-- AUTO_INCREMENT for table `termcondition`
--
ALTER TABLE `termcondition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `time_slot_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `twilio`
--
ALTER TABLE `twilio`
  MODIFY `twilio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `UI_Vendor`
--
ALTER TABLE `UI_Vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1424;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `vendor_area`
--
ALTER TABLE `vendor_area`
  MODIFY `vendor_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor_category`
--
ALTER TABLE `vendor_category`
  MODIFY `vendor_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vendor_notification`
--
ALTER TABLE `vendor_notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;

--
-- AUTO_INCREMENT for table `vendor_payment`
--
ALTER TABLE `vendor_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `wallet_recharge_history`
--
ALTER TABLE `wallet_recharge_history`
  MODIFY `wallet_recharge_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
