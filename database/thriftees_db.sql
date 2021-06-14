-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 06:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriftees_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_uuid`, `name`, `fb_link`, `address`, `phone_num`, `date_created`, `status`) VALUES
(1, '5fd2220ecd39cd6f370405be0327be45', 'Red', 'https://www.fb.com/chiekko.red', 'Lahug, Cc', '09199623056', '2020-12-25 22:09:07', 0),
(2, '45abf2a6b91ed76b34b0eac8ee122f2e', 'Chiekko', 'https://www.fb.com/chiekko.red', 'Banawa', '0', '2020-12-25 22:16:11', 0),
(3, '4036833a42e8a2334ac8d95e5d6e466b', 'Vannessa', 'https://www.facebook.com/chiekko.red/', 'Audhawiudhaiuwdhawiudh', '0', '2021-01-07 22:39:59', 0),
(4, '20dc744a415075c690a659c5b511df73', 'Mom', 'jawd', 'Lahug', '', '2021-01-07 23:38:59', 0),
(5, 'a6be9f64c30ea2403f683b66b68d9d1b', 'Frelyn', '', '', '', '2021-01-07 23:40:02', 0),
(6, '7fbe88af4777bd5461934c48817c3eb5', 'Redooo', 'awhda', 'Banawa', '', '2021-01-07 23:42:06', 0),
(7, '9d5d79d750c00006b2e0de5c5bca18b8', 'Chinky', 'adjwadj', 'Busay', '09199623056', '2021-01-07 23:44:01', 0),
(8, 'befe79f2d3024c4ffb7573d2209432a7', 'Frea', '', '', '', '2021-01-25 02:37:58', 0),
(9, '7b78935ff2b617d41b46510b984226cd', 'Arvy', '', '', '', '2021-01-25 02:40:47', 0),
(10, '2afffb3a3fa15ac34a777c60fcacf2f6', 'Aeeee', '', '', '', '2021-01-25 02:42:07', 0),
(11, '350d0999b2a46f22ccb8930edab9bde8', 'New', '', '', '', '2021-01-25 02:42:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `content`, `created_on`) VALUES
(1, 'chiekkored has logged in', '2020-07-07 21:42:49'),
(2, 'chiekkored banned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-07 22:00:36'),
(3, 'chiekkored unbanned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-07 22:01:25'),
(4, 'chiekkored featured a post (post id: 1)', '2020-07-07 22:39:29'),
(5, 'chiekkored recovered a post (post id: 1)', '2020-07-07 22:40:06'),
(6, 'chiekkored unfeatured a post (post id: 1)', '2020-07-07 22:40:16'),
(7, 'chiekkored recovered a post (post id: 2)', '2020-07-07 22:40:47'),
(8, 'chiekkored recovered a post (post id: 3)', '2020-07-07 23:23:24'),
(9, 'chiekkored featured a post (post id: 3)', '2020-07-07 23:23:32'),
(10, 'chiekkored unfeatured a post (post id: 3)', '2020-07-07 23:23:41'),
(11, 'chiekkored removed a post (post id: 3)', '2020-07-07 23:23:52'),
(12, 'chiekkored recovered a post (post id: 3)', '2020-07-07 23:24:03'),
(13, 'chiekkored changed the password for admin: ', '2020-07-08 01:19:51'),
(14, 'chiekkored has logged out', '2020-07-08 01:29:08'),
(15, 'chiekkored has logged in', '2020-07-08 01:29:17'),
(16, 'chiekkored changed the password for admin: 1', '2020-07-08 01:30:14'),
(17, 'chiekkored changed the password for admin: 1', '2020-07-08 01:31:24'),
(18, 'chiekkored deactivated the admin: ', '2020-07-08 01:38:08'),
(19, 'chiekkored banned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-08 01:41:17'),
(20, 'chiekkored unbanned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-08 01:41:27'),
(21, 'chiekkored banned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-08 01:41:45'),
(22, 'chiekkored unbanned the ip address: 2001:4454:15d:1b00:dff:67c7:5ef7:3db7', '2020-07-08 01:42:02'),
(23, 'chiekkored deactivated the admin: ', '2020-07-08 01:45:48'),
(24, 'chiekkored deactivated the admin: ', '2020-07-08 01:45:58'),
(25, 'chiekkored deactivated the admin: 1', '2020-07-08 01:47:29'),
(26, 'chiekkored deactivated the user: 4', '2020-07-08 01:47:41'),
(27, 'chiekkored activated the user: 4', '2020-07-08 01:47:49'),
(28, 'chiekkored deactivated the admin: 1', '2020-07-08 01:48:12'),
(29, 'chiekkored registered the account: redoreds', '2020-07-08 01:59:23'),
(30, 'chiekkored has logged out', '2020-07-08 02:17:20'),
(31, 'chiekkored has logged in', '2020-07-08 02:17:28'),
(32, 'chiekkored changed its password', '2020-07-08 02:23:27'),
(33, 'chiekkored has logged out', '2020-07-08 02:23:43'),
(34, 'chiekkored has logged in', '2020-07-08 02:23:53'),
(35, 'chiekkored deactivated the admin: 2', '2020-07-08 03:41:29'),
(36, 'chiekkored deactivated the admin: 2', '2020-07-08 03:41:41'),
(37, 'chiekkored has logged out', '2020-07-08 03:41:48'),
(38, 'redoreds has logged in', '2020-07-08 03:42:02'),
(39, 'chiekkored has logged in', '2020-11-14 23:16:42'),
(40, 'chiekkored changed its password', '2020-11-14 23:19:40'),
(41, 'chiekkored has logged out', '2020-11-14 23:19:46'),
(42, 'chiekkored has logged in', '2020-11-14 23:21:02'),
(43, 'chiekkored has logged out', '2020-11-14 23:21:07'),
(44, 'chiekkored has logged in', '2020-11-14 23:21:21'),
(45, 'chiekkored changed its password', '2020-11-14 23:21:33'),
(46, 'chiekkored has logged out', '2020-11-14 23:21:38'),
(47, 'chiekkored has logged in', '2020-11-14 23:21:50'),
(48, 'chiekkored has logged out', '2020-11-14 23:25:01'),
(49, 'chiekkored has logged in', '2020-11-14 23:29:54'),
(50, 'chiekkored has logged out', '2020-11-14 23:31:50'),
(51, 'chiekkored has logged in', '2020-11-14 23:33:59'),
(52, 'chiekkored has logged out', '2020-11-14 23:39:07'),
(53, 'chiekkored has logged in', '2020-11-15 22:09:26'),
(54, 'chiekkored has logged out', '2020-11-15 22:16:36'),
(55, 'chiekkored has logged in', '2020-11-15 22:25:09'),
(56, 'chiekkored featured a post (post id: 4)', '2020-11-15 22:37:50'),
(57, 'chiekkored unfeatured a post (post id: 4)', '2020-11-15 22:37:52'),
(58, 'chiekkored has logged out', '2020-11-15 23:50:35'),
(59, 'chiekkored has logged in', '2020-11-17 23:14:28'),
(60, 'chiekkored has logged in', '2020-12-23 01:38:17'),
(61, 'chiekkored has logged out', '2020-12-23 02:38:23'),
(62, 'Added customer: Red', '2020-12-23 02:50:14'),
(63, 'Added customer: chiekko', '2020-12-25 15:12:42'),
(64, 'Added customer: Red', '2020-12-25 16:21:47'),
(65, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:33:13'),
(66, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:40:37'),
(67, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:42:01'),
(68, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:42:34'),
(69, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:42:44'),
(70, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:43:43'),
(71, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:44:32'),
(72, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:45:05'),
(73, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:45:21'),
(74, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 16:45:50'),
(75, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 18:17:06'),
(76, 'Added miner: ', '2020-12-25 18:24:00'),
(77, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 18:24:33'),
(78, 'Added miner: ', '2020-12-25 18:24:48'),
(79, 'Added customer: ', '2020-12-25 21:40:46'),
(80, 'Added customer: ', '2020-12-25 21:42:40'),
(81, 'Added customer: ', '2020-12-25 21:42:58'),
(82, 'Added customer: ', '2020-12-25 21:43:43'),
(83, 'Added customer: ', '2020-12-25 21:44:20'),
(84, 'Added customer: ', '2020-12-25 21:44:49'),
(85, 'Added miner: ', '2020-12-25 21:55:35'),
(86, 'Added miner: ', '2020-12-25 21:55:35'),
(87, 'Added miner: ', '2020-12-25 21:58:14'),
(88, 'Added miner: ', '2020-12-25 21:58:14'),
(89, 'Added miner: ', '2020-12-25 21:58:14'),
(90, 'Added miner: ', '2020-12-25 21:58:14'),
(91, 'Added miner: ', '2020-12-25 22:00:51'),
(92, 'Added miner: ', '2020-12-25 22:02:25'),
(93, 'Added miner: ', '2020-12-25 22:04:19'),
(94, 'Added miner: ac009a5724302b2c1d5be375b50290ad', '2020-12-25 22:05:13'),
(95, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 22:05:24'),
(96, 'Added miner: ', '2020-12-25 22:05:36'),
(97, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 22:05:54'),
(98, 'Added miner: d951c26a0564bcfef2e674dadc48717b', '2020-12-25 22:07:48'),
(99, 'Added customer: Red', '2020-12-25 22:09:07'),
(100, 'Added customer: ', '2020-12-25 22:09:19'),
(101, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:09:34'),
(102, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:11:08'),
(103, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:11:23'),
(104, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:11:56'),
(105, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:12:04'),
(106, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:13:19'),
(107, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:13:41'),
(108, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:15:09'),
(109, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:15:50'),
(110, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-25 22:16:00'),
(111, 'Added miner: ', '2020-12-25 22:16:11'),
(112, 'Added customer: ', '2020-12-25 22:16:32'),
(113, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2020-12-25 23:23:18'),
(114, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2020-12-26 00:06:49'),
(115, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-26 00:08:34'),
(116, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2020-12-26 00:08:43'),
(117, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-26 00:09:13'),
(118, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2020-12-26 00:09:26'),
(119, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2020-12-26 00:11:13'),
(120, 'Added customer: vannessa', '2021-01-07 22:39:59'),
(121, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-07 22:41:25'),
(122, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-07 22:43:01'),
(123, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2021-01-07 22:44:14'),
(124, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-07 23:10:59'),
(125, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-07 23:11:05'),
(126, 'Added customer: Mom', '2021-01-07 23:38:59'),
(127, 'Added miner: ', '2021-01-07 23:40:02'),
(128, 'Added customer: Redooo', '2021-01-07 23:42:06'),
(129, 'Added customer: Chinky', '2021-01-07 23:44:01'),
(130, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-24 21:33:13'),
(131, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2021-01-24 21:36:48'),
(132, 'Added miner: 4036833a42e8a2334ac8d95e5d6e466b', '2021-01-24 21:37:53'),
(133, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-24 22:05:51'),
(134, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-24 22:22:37'),
(135, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-24 22:23:57'),
(136, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2021-01-24 22:24:04'),
(137, 'Added miner: 4036833a42e8a2334ac8d95e5d6e466b', '2021-01-24 22:24:08'),
(138, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-24 22:24:12'),
(139, 'Added miner: 20dc744a415075c690a659c5b511df73', '2021-01-24 22:24:25'),
(140, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-24 23:13:58'),
(141, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-24 23:19:46'),
(142, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-25 01:42:38'),
(143, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-25 01:42:47'),
(144, 'Added miner: 45abf2a6b91ed76b34b0eac8ee122f2e', '2021-01-25 01:42:55'),
(145, 'Added miner: 7fbe88af4777bd5461934c48817c3eb5', '2021-01-25 01:43:02'),
(146, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:08'),
(147, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:14'),
(148, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:20'),
(149, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-25 01:43:25'),
(150, 'Added miner: 4036833a42e8a2334ac8d95e5d6e466b', '2021-01-25 01:43:30'),
(151, 'Added miner: 7fbe88af4777bd5461934c48817c3eb5', '2021-01-25 01:43:35'),
(152, 'Added miner: 9d5d79d750c00006b2e0de5c5bca18b8', '2021-01-25 01:43:41'),
(153, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:48'),
(154, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:54'),
(155, 'Added miner: 5fd2220ecd39cd6f370405be0327be45', '2021-01-25 01:43:58'),
(156, 'Added miner: a6be9f64c30ea2403f683b66b68d9d1b', '2021-01-25 01:44:05'),
(157, 'Added miner: Red(<i>code: </i>yeeee)', '2021-01-25 02:06:02'),
(158, 'Added miner: <span class=\"text-success\">Red</span> (<i>code: </i>wattt)', '2021-01-25 02:07:00'),
(159, 'Added miner: Red (<i>code: </i>ggrgrgr)', '2021-01-25 02:07:29'),
(160, 'Added miner: Red (<i>code: f4we)</i>', '2021-01-25 02:07:52'),
(161, 'Hidden a customer: ', '2021-01-25 02:09:42'),
(162, 'Edited customer: ', '2021-01-25 02:12:05'),
(163, 'Edited customer: ', '2021-01-25 02:12:20'),
(164, 'Edited customer: ', '2021-01-25 02:13:22'),
(165, 'Hidden a customer: ', '2021-01-25 02:14:09'),
(166, 'Unhidden a customer: Red', '2021-01-25 02:15:13'),
(167, 'Unhidden a customer: Red', '2021-01-25 02:15:24'),
(168, 'Unhidden a customer: Red', '2021-01-25 02:15:28'),
(169, 'Unhidden a customer: Red', '2021-01-25 02:16:06'),
(170, 'Removed a customer: Chinky', '2021-01-25 02:16:49'),
(171, 'Hidden a customer: Red', '2021-01-25 02:18:58'),
(172, 'Unhidden a customer: Red', '2021-01-25 02:19:05'),
(173, 'Removed a miner; Code: f4we', '2021-01-25 02:21:58'),
(174, 'Toggle Paid to: Chiekko', '2021-01-25 02:23:51'),
(175, 'Toggle Paid to: Chinky for <b>2021-01-25</b>', '2021-01-25 02:24:29'),
(176, 'Toggle Paid to: Vannessa for <b>01 ([ .	-])* 2525 [,.0031125Mon, 25 Jan 2021 00:00:00 +080012	 ]*</b>', '2021-01-25 02:27:34'),
(177, 'Toggle Paid to: Vannessa for <b>25th January</b>', '2021-01-25 02:28:55'),
(178, 'Toggle Paid to: Chinky for <b>January 25th</b>', '2021-01-25 02:29:31'),
(179, 'Removed a miner; Code: ggrgrgr', '2021-01-25 02:33:31'),
(180, 'Overidden an item to paid for customer: Redooo<i>(code: sfsef)</i>', '2021-01-25 02:35:54'),
(181, 'Overidden an item to paid for customer: Redooo <i>(code: fegh)</i>', '2021-01-25 02:36:24'),
(182, 'Toggle Paid to: Frelyn for January 25th', '2021-01-25 02:36:53'),
(183, 'Added miner:  (<i>code: thre)</i>', '2021-01-25 02:37:58'),
(184, 'Added miner: ', '2021-01-25 02:40:48'),
(185, 'Added miner: Aeeee (<i>code: reger)</i>', '2021-01-25 02:42:07'),
(186, 'Added customer: New', '2021-01-25 02:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(11) NOT NULL,
  `customer_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mine_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `time_created` time NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `customer_uuid`, `mine_code`, `price`, `date_created`, `time_created`, `status`) VALUES
(1, '5fd2220ecd39cd6f370405be0327be45', 'was', 1, '2021-01-24', '22:23:56', 2),
(2, '45abf2a6b91ed76b34b0eac8ee122f2e', 'dad', 1, '2021-01-24', '22:24:04', 0),
(3, '4036833a42e8a2334ac8d95e5d6e466b', 'esfs', 1, '2021-01-24', '22:24:08', 0),
(4, '5fd2220ecd39cd6f370405be0327be45', 'aadad', 1, '2021-01-24', '22:24:12', 2),
(5, '20dc744a415075c690a659c5b511df73', 'grthr', 1, '2021-01-24', '22:24:24', 0),
(6, 'a6be9f64c30ea2403f683b66b68d9d1b', 'fdg', 489, '2021-01-24', '23:13:58', 1),
(7, 'a6be9f64c30ea2403f683b66b68d9d1b', 'grge', 1000, '2021-01-25', '23:19:45', 2),
(8, 'a6be9f64c30ea2403f683b66b68d9d1b', 'sefef', 343, '2021-01-25', '01:42:38', 2),
(9, 'a6be9f64c30ea2403f683b66b68d9d1b', 'grgg', 122, '2021-01-25', '01:42:47', 2),
(10, '45abf2a6b91ed76b34b0eac8ee122f2e', 'fefrg', 2343, '2021-01-25', '01:42:54', 2),
(11, '7fbe88af4777bd5461934c48817c3eb5', 'fegh', 1222, '2021-01-25', '01:43:02', 2),
(12, '5fd2220ecd39cd6f370405be0327be45', 'grdd', 3223, '2021-01-25', '01:43:08', 2),
(13, '5fd2220ecd39cd6f370405be0327be45', 'grrege', 332, '2021-01-25', '01:43:13', 2),
(14, '5fd2220ecd39cd6f370405be0327be45', 'sfsef', 13123, '2021-01-25', '01:43:20', 2),
(15, 'a6be9f64c30ea2403f683b66b68d9d1b', 'sfsef', 2131, '2021-01-25', '01:43:25', 2),
(16, '4036833a42e8a2334ac8d95e5d6e466b', 'qrqw', 1233, '2021-01-25', '01:43:30', 2),
(17, '7fbe88af4777bd5461934c48817c3eb5', 'sfsef', 2132, '2021-01-25', '01:43:35', 2),
(18, '9d5d79d750c00006b2e0de5c5bca18b8', 'grgss', 231, '2021-01-25', '01:43:41', 2),
(19, '5fd2220ecd39cd6f370405be0327be45', 'frgr', 3434, '2021-01-25', '01:43:48', 2),
(20, '5fd2220ecd39cd6f370405be0327be45', 'fsef', 223, '2021-01-25', '01:43:53', 2),
(21, '5fd2220ecd39cd6f370405be0327be45', 'sgsr', 343, '2021-01-25', '01:43:58', 2),
(22, 'a6be9f64c30ea2403f683b66b68d9d1b', 'fefe', 334, '2021-01-25', '01:44:05', 2),
(23, '5fd2220ecd39cd6f370405be0327be45', 'yeeee', 232, '2021-01-25', '02:06:02', 0),
(24, '5fd2220ecd39cd6f370405be0327be45', 'wattt', 232, '2021-01-25', '02:07:00', 0),
(25, '5fd2220ecd39cd6f370405be0327be45', 'ggrgrgr', 343, '2021-01-25', '02:07:29', 1),
(26, '5fd2220ecd39cd6f370405be0327be45', 'f4we', 356, '2021-01-25', '02:07:52', 1),
(27, 'befe79f2d3024c4ffb7573d2209432a7', 'thre', 333, '2021-01-25', '02:37:58', 0),
(28, '7b78935ff2b617d41b46510b984226cd', 'rtht', 454, '2021-01-25', '02:40:48', 0),
(29, '2afffb3a3fa15ac34a777c60fcacf2f6', 'reger', 454, '2021-01-25', '02:42:07', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
