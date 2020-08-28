-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 01:49 AM
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
-- Database: `hereforyou_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `p_is_featured` int(11) NOT NULL,
  `p_is_efface` int(11) NOT NULL,
  `p_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `guest_name`, `p_title`, `p_slug`, `p_content`, `p_tags`, `p_type`, `p_date_created`, `p_is_featured`, `p_is_efface`, `p_status`) VALUES
(1, '19', '', 'This is my thoughts about my problems', '159346763412319', 'It all started when the quick brown fox jumped over over a lazy dog. It was when twinkle twinkle little star, how I wonder what you are. Up above the world so high. Like a diamond in the sky.', 'Depression,  Abuse, Others', 'User', '2020-06-30 05:53:54', 0, 1, 0),
(2, '42', 'GuestNameME', 'Inside out', '159346967752942', 'Josh had spent year and year accumulating the information. He knew it inside out and if there was ever anyone looking for an expert in the field, Josh would be the one to call. The problem was that there was nobody interested in the information besides him and he knew it. Years of information painstakingly memorized and sorted with not a sole giving even an ounce of interest in the topic.\n\nHe sat across from her trying to imagine it was the first time. It wasn\'t. Had it been a hundred? It quite possibly could have been. Two hundred? Probably not. His mind wandered until he caught himself and again tried to imagine it was the first time.', 'Rape, Depression, Abuse', 'Guest', '2020-06-30 06:27:57', 0, 0, 0),
(3, '19', '', 'We\'re here for u.', '159353692255019', 'Cheers to getting through our worst days together. We\'re here for u. To listen and understand whatever it is you\'re going through. Your life is full of worth. Your story matters. You are important.', 'Abuse, Bullying', 'User', '2020-07-01 01:08:42', 0, 0, 0),
(4, '46', 'My name is unknown', 'A title that you will never forget', '159354947128046', 'I hereby declare that this input box is for the content of your story', '', 'Guest', '2020-07-01 04:37:51', 0, 0, 0),
(5, '12', '', 'I have the biggest problem', '159361817399712', 'My biggest problem is I really don\'t have a money right now', 'Depression', 'User', '2020-07-01 23:42:53', 0, 0, 0),
(6, '12', '', 'A', '159361830401612', 'Aaa', 'Rape, Abuse, Etc', 'User', '2020-07-01 23:45:04', 0, 0, 1),
(7, '12', '', 'B', '159361844198312', 'B', 'B', 'User', '2020-07-01 23:47:21', 0, 0, 1),
(8, '12', '', 'C', '159361856454212', 'C', 'C', 'User', '2020-07-01 23:49:24', 0, 0, 1),
(9, '12', '', 'D', '159361868006612', 'D', 'D', 'User', '2020-07-01 23:51:20', 0, 0, 1),
(10, '12', '', 'E', '159361873607712', 'E', 'E', 'User', '2020-07-01 23:52:16', 0, 0, 1),
(11, '12', '', 'F', '159361877955212', 'F', 'F', 'User', '2020-07-01 23:52:59', 0, 0, 1),
(12, '12', '', 'G', '159361881558512', 'G', 'G', 'User', '2020-07-01 23:53:35', 0, 0, 1),
(13, '12', '', 'H', '159361885749012', 'H', 'H', 'User', '2020-07-01 23:54:17', 0, 0, 1),
(14, '12', '', 'I', '159361891248112', 'I', 'I', 'User', '2020-07-01 23:55:12', 0, 0, 1),
(15, '12', '', 'Blabla', '159363149541512', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, quam id accumsan semper, sem urna vestibulum massa, lobortis efficitur lacus mauris in lacus. Etiam at dui fringilla, ullamcorper ex et, ultrices tellus. Nullam pellentesque enim ut felis tincidunt ultrices. Aliquam at tempus nunc. Quisque eget leo purus. Duis ut odio sit amet ipsum ultrices malesuada sit amet ut ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet nisl non eros iaculis mollis. Curabitur maximus sagittis ante ut ultricies.\n\nFusce posuere, magna at semper volutpat, justo orci suscipit metus, vitae semper nisl libero porta sem. Vestibulum fermentum pellentesque pharetra. Nulla ullamcorper finibus commodo. Curabitur posuere lacus at malesuada viverra. Sed quis accumsan lacus. Suspendisse potenti. Vestibulum efficitur magna ac maximus porta.\n\nSuspendisse urna nulla, lacinia id pellentesque id, porta sed ipsum. Donec faucibus tellus a metus volutpat, at venenatis erat tempor. Proin in dui sed risus fringilla dapibus at a magna. Ut aliquet elit lacus, at aliquet nibh congue eu. Nam volutpat gravida tellus, quis rutrum quam dapibus sed. Cras porttitor nulla nec rhoncus placerat. Mauris condimentum vel neque vel lacinia. Cras lacinia a leo at sodales. Fusce ullamcorper quam eu ipsum vehicula porttitor. Praesent consectetur sem arcu, sit amet condimentum dolor accumsan interdum. Pellentesque hendrerit diam in lacinia aliquam. Pellentesque augue augue, euismod quis placerat a, euismod et nunc.\n\nSed et tempor dolor, vitae sodales erat. Nullam euismod ipsum in purus tempus, vitae tristique libero tempus. In porttitor congue porta. Etiam ligula est, tempor at vestibulum sed, consectetur vel dui. Curabitur porttitor urna vitae aliquet volutpat. Maecenas tristique sem lacus, a porta magna hendrerit sit amet. Cras quis vulputate felis, elementum ornare nunc. Curabitur interdum aliquet mauris, eu posuere arcu condimentum id. Nullam at auctor ipsum. Praesent nec nisl vitae tellus aliquet egestas sed quis lectus.\n\nUt eget ipsum suscipit, faucibus diam vel, condimentum orci. Sed et diam sollicitudin, mattis magna eget, dictum magna. Nunc rhoncus, tellus eu imperdiet pretium, neque velit interdum nulla, id pretium nisl sem ut enim. Donec sed finibus ante. Quisque fringilla blandit risus in placerat. Maecenas sem nisi, euismod vitae scelerisque nec, blandit sit amet est. Nam lobortis orci eget ligula sodales, ut sollicitudin nibh laoreet. Duis sit amet nisl ac justo lacinia tempor sed a nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin vitae ligula at leo ornare dictum.', 'Testin', 'User', '2020-07-02 03:24:55', 0, 0, 0),
(16, '12', '', 'My random thoughts', '159363305588012', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, quam id accumsan semper, sem urna vestibulum massa, lobortis efficitur lacus mauris in lacus. Etiam at dui fringilla, ullamcorper ex et, ultrices tellus. Nullam pellentesque enim ut felis tincidunt ultrices. Aliquam at tempus nunc. Quisque eget leo purus. Duis ut odio sit amet ipsum ultrices malesuada sit amet ut ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet nisl non eros iaculis mollis. Curabitur maximus sagittis ante ut ultricies.\n\nFusce posuere, magna at semper volutpat, justo orci suscipit metus, vitae semper nisl libero porta sem. Vestibulum fermentum pellentesque pharetra. Nulla ullamcorper finibus commodo. Curabitur posuere lacus at malesuada viverra. Sed quis accumsan lacus. Suspendisse potenti. Vestibulum efficitur magna ac maximus porta.\n\nSuspendisse urna nulla, lacinia id pellentesque id, porta sed ipsum. Donec faucibus tellus a metus volutpat, at venenatis erat tempor. Proin in dui sed risus fringilla dapibus at a magna. Ut aliquet elit lacus, at aliquet nibh congue eu. Nam volutpat gravida tellus, quis rutrum quam dapibus sed. Cras porttitor nulla nec rhoncus placerat. Mauris condimentum vel neque vel lacinia. Cras lacinia a leo at sodales. Fusce ullamcorper quam eu ipsum vehicula porttitor. Praesent consectetur sem arcu, sit amet condimentum dolor accumsan interdum. Pellentesque hendrerit diam in lacinia aliquam. Pellentesque augue augue, euismod quis placerat a, euismod et nunc.\n\nSed et tempor dolor, vitae sodales erat. Nullam euismod ipsum in purus tempus, vitae tristique libero tempus. In porttitor congue porta. Etiam ligula est, tempor at vestibulum sed, consectetur vel dui. Curabitur porttitor urna vitae aliquet volutpat. Maecenas tristique sem lacus, a porta magna hendrerit sit amet. Cras quis vulputate felis, elementum ornare nunc. Curabitur interdum aliquet mauris, eu posuere arcu condimentum id. Nullam at auctor ipsum. Praesent nec nisl vitae tellus aliquet egestas sed quis lectus.\n\nUt eget ipsum suscipit, faucibus diam vel, condimentum orci. Sed et diam sollicitudin, mattis magna eget, dictum magna. Nunc rhoncus, tellus eu imperdiet pretium, neque velit interdum nulla, id pretium nisl sem ut enim. Donec sed finibus ante. Quisque fringilla blandit risus in placerat. Maecenas sem nisi, euismod vitae scelerisque nec, blandit sit amet est. Nam lobortis orci eget ligula sodales, ut sollicitudin nibh laoreet. Duis sit amet nisl ac justo lacinia tempor sed a nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin vitae ligula at leo ornare dictum.', 'Random', 'User', '2020-07-02 03:50:55', 0, 0, 1),
(17, '12', '', 'My random thoughts', '159363316863312', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, quam id accumsan semper, sem urna vestibulum massa, lobortis efficitur lacus mauris in lacus. Etiam at dui fringilla, ullamcorper ex et, ultrices tellus. Nullam pellentesque enim ut felis tincidunt ultrices. Aliquam at tempus nunc. Quisque eget leo purus. Duis ut odio sit amet ipsum ultrices malesuada sit amet ut ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet nisl non eros iaculis mollis. Curabitur maximus sagittis ante ut ultricies.\n\nFusce posuere, magna at semper volutpat, justo orci suscipit metus, vitae semper nisl libero porta sem. Vestibulum fermentum pellentesque pharetra. Nulla ullamcorper finibus commodo. Curabitur posuere lacus at malesuada viverra. Sed quis accumsan lacus. Suspendisse potenti. Vestibulum efficitur magna ac maximus porta.\n\nSuspendisse urna nulla, lacinia id pellentesque id, porta sed ipsum. Donec faucibus tellus a metus volutpat, at venenatis erat tempor. Proin in dui sed risus fringilla dapibus at a magna. Ut aliquet elit lacus, at aliquet nibh congue eu. Nam volutpat gravida tellus, quis rutrum quam dapibus sed. Cras porttitor nulla nec rhoncus placerat. Mauris condimentum vel neque vel lacinia. Cras lacinia a leo at sodales. Fusce ullamcorper quam eu ipsum vehicula porttitor. Praesent consectetur sem arcu, sit amet condimentum dolor accumsan interdum. Pellentesque hendrerit diam in lacinia aliquam. Pellentesque augue augue, euismod quis placerat a, euismod et nunc.\n\nSed et tempor dolor, vitae sodales erat. Nullam euismod ipsum in purus tempus, vitae tristique libero tempus. In porttitor congue porta. Etiam ligula est, tempor at vestibulum sed, consectetur vel dui. Curabitur porttitor urna vitae aliquet volutpat. Maecenas tristique sem lacus, a porta magna hendrerit sit amet. Cras quis vulputate felis, elementum ornare nunc. Curabitur interdum aliquet mauris, eu posuere arcu condimentum id. Nullam at auctor ipsum. Praesent nec nisl vitae tellus aliquet egestas sed quis lectus.\n\nUt eget ipsum suscipit, faucibus diam vel, condimentum orci. Sed et diam sollicitudin, mattis magna eget, dictum magna. Nunc rhoncus, tellus eu imperdiet pretium, neque velit interdum nulla, id pretium nisl sem ut enim. Donec sed finibus ante. Quisque fringilla blandit risus in placerat. Maecenas sem nisi, euismod vitae scelerisque nec, blandit sit amet est. Nam lobortis orci eget ligula sodales, ut sollicitudin nibh laoreet. Duis sit amet nisl ac justo lacinia tempor sed a nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin vitae ligula at leo ornare dictum.', 'Random Lng', 'User', '2020-07-02 03:52:48', 0, 0, 1),
(18, '12', '', 'My random thought', '159363332092312', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, quam id accumsan semper, sem urna vestibulum massa, lobortis efficitur lacus mauris in lacus. Etiam at dui fringilla, ullamcorper ex et, ultrices tellus. Nullam pellentesque enim ut felis tincidunt ultrices. Aliquam at tempus nunc. Quisque eget leo purus. Duis ut odio sit amet ipsum ultrices malesuada sit amet ut ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet nisl non eros iaculis mollis. Curabitur maximus sagittis ante ut ultricies.\n\nFusce posuere, magna at semper volutpat, justo orci suscipit metus, vitae semper nisl libero porta sem. Vestibulum fermentum pellentesque pharetra. Nulla ullamcorper finibus commodo. Curabitur posuere lacus at malesuada viverra. Sed quis accumsan lacus. Suspendisse potenti. Vestibulum efficitur magna ac maximus porta.\n\nSuspendisse urna nulla, lacinia id pellentesque id, porta sed ipsum. Donec faucibus tellus a metus volutpat, at venenatis erat tempor. Proin in dui sed risus fringilla dapibus at a magna. Ut aliquet elit lacus, at aliquet nibh congue eu. Nam volutpat gravida tellus, quis rutrum quam dapibus sed. Cras porttitor nulla nec rhoncus placerat. Mauris condimentum vel neque vel lacinia. Cras lacinia a leo at sodales. Fusce ullamcorper quam eu ipsum vehicula porttitor. Praesent consectetur sem arcu, sit amet condimentum dolor accumsan interdum. Pellentesque hendrerit diam in lacinia aliquam. Pellentesque augue augue, euismod quis placerat a, euismod et nunc.\n\nSed et tempor dolor, vitae sodales erat. Nullam euismod ipsum in purus tempus, vitae tristique libero tempus. In porttitor congue porta. Etiam ligula est, tempor at vestibulum sed, consectetur vel dui. Curabitur porttitor urna vitae aliquet volutpat. Maecenas tristique sem lacus, a porta magna hendrerit sit amet. Cras quis vulputate felis, elementum ornare nunc. Curabitur interdum aliquet mauris, eu posuere arcu condimentum id. Nullam at auctor ipsum. Praesent nec nisl vitae tellus aliquet egestas sed quis lectus.\n\nUt eget ipsum suscipit, faucibus diam vel, condimentum orci. Sed et diam sollicitudin, mattis magna eget, dictum magna. Nunc rhoncus, tellus eu imperdiet pretium, neque velit interdum nulla, id pretium nisl sem ut enim. Donec sed finibus ante. Quisque fringilla blandit risus in placerat. Maecenas sem nisi, euismod vitae scelerisque nec, blandit sit amet est. Nam lobortis orci eget ligula sodales, ut sollicitudin nibh laoreet. Duis sit amet nisl ac justo lacinia tempor sed a nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin vitae ligula at leo ornare dictum.', 'Warning', 'User', '2020-07-02 03:55:20', 0, 0, 1),
(19, '12', '', 'Titt', '159363381333812', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, quam id accumsan semper, sem urna vestibulum massa, lobortis efficitur lacus mauris in lacus. Etiam at dui fringilla, ullamcorper ex et, ultrices tellus. Nullam pellentesque enim ut felis tincidunt ultrices. Aliquam at tempus nunc. Quisque eget leo purus. Duis ut odio sit amet ipsum ultrices malesuada sit amet ut ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum imperdiet nisl non eros iaculis mollis. Curabitur maximus sagittis ante ut ultricies.\n\nFusce posuere, magna at semper volutpat, justo orci suscipit metus, vitae semper nisl libero porta sem. Vestibulum fermentum pellentesque pharetra. Nulla ullamcorper finibus commodo. Curabitur posuere lacus at malesuada viverra. Sed quis accumsan lacus. Suspendisse potenti. Vestibulum efficitur magna ac maximus porta.\n\nSuspendisse urna nulla, lacinia id pellentesque id, porta sed ipsum. Donec faucibus tellus a metus volutpat, at venenatis erat tempor. Proin in dui sed risus fringilla dapibus at a magna. Ut aliquet elit lacus, at aliquet nibh congue eu. Nam volutpat gravida tellus, quis rutrum quam dapibus sed. Cras porttitor nulla nec rhoncus placerat. Mauris condimentum vel neque vel lacinia. Cras lacinia a leo at sodales. Fusce ullamcorper quam eu ipsum vehicula porttitor. Praesent consectetur sem arcu, sit amet condimentum dolor accumsan interdum. Pellentesque hendrerit diam in lacinia aliquam. Pellentesque augue augue, euismod quis placerat a, euismod et nunc.\n\nSed et tempor dolor, vitae sodales erat. Nullam euismod ipsum in purus tempus, vitae tristique libero tempus. In porttitor congue porta. Etiam ligula est, tempor at vestibulum sed, consectetur vel dui. Curabitur porttitor urna vitae aliquet volutpat. Maecenas tristique sem lacus, a porta magna hendrerit sit amet. Cras quis vulputate felis, elementum ornare nunc. Curabitur interdum aliquet mauris, eu posuere arcu condimentum id. Nullam at auctor ipsum. Praesent nec nisl vitae tellus aliquet egestas sed quis lectus.\n\nUt eget ipsum suscipit, faucibus diam vel, condimentum orci. Sed et diam sollicitudin, mattis magna eget, dictum magna. Nunc rhoncus, tellus eu imperdiet pretium, neque velit interdum nulla, id pretium nisl sem ut enim. Donec sed finibus ante. Quisque fringilla blandit risus in placerat. Maecenas sem nisi, euismod vitae scelerisque nec, blandit sit amet est. Nam lobortis orci eget ligula sodales, ut sollicitudin nibh laoreet. Duis sit amet nisl ac justo lacinia tempor sed a nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin vitae ligula at leo ornare dictum.', '', 'User', '2020-07-02 04:03:33', 0, 0, 1),
(20, '50', '', 'Hey!', '159363401438450', '*test*', '', 'User', '2020-07-02 04:06:54', 0, 0, 2),
(21, '12', '', 'Test', '159363434769012', 'Testt', '', 'User', '2020-07-02 04:12:27', 0, 0, 1),
(22, '12', '', 'A', '159363444684412', 'A', '', 'User', '2020-07-02 04:14:06', 0, 0, 1),
(23, '12', '', 'A', '159363470476312', 'A', '', 'User', '2020-07-02 04:18:24', 0, 0, 1),
(24, '12', '', 'Ad', '159363478592512', 'Ad', '', 'User', '2020-07-02 04:19:45', 0, 0, 1),
(25, '12', '', 'Bbgb', '159363484111012', 'Ggbg', '', 'User', '2020-07-02 04:20:41', 0, 0, 1),
(26, '12', '', 'Grgr', '159363506535312', 'Grgrg', '', 'User', '2020-07-02 04:24:25', 0, 0, 1),
(27, '12', '', 'Gregreg', '159363508114912', 'Regregreg', '', 'User', '2020-07-02 04:24:41', 0, 0, 2),
(28, '19', '', 'Test', '159394909184719', 'Test', '', 'User', '2020-07-05 19:38:11', 0, 0, 0),
(29, '19', '', 'Test', '159394929533919', 'Testingg', '', 'User', '2020-07-05 19:41:35', 0, 0, 0),
(30, '19', '', 'Waaa', '159394943211319', 'Waaaaa', '', 'User', '2020-07-05 19:43:52', 0, 0, 0),
(31, '19', '', 'Drt', '159394988581519', 'Drttt', '', 'User', '2020-07-05 19:51:25', 0, 0, 1),
(32, '19', '', 'Yerte', '159395040683119', 'Rtert', '', 'User', '2020-07-05 20:00:06', 0, 0, 1),
(33, '19', '', 'Tatatatata', '159396808125419', 'It all started when the quick brown fox jumped over over a lazy dog. It was when twinkle twinkle little star, how I wonder what you are. Up above the world so high. Like a diamond in the sky.\n\nIt all started when the quick brown fox jumped over over a lazy dog. It was when twinkle twinkle little star, how I wonder what you are. Up above the world so high. Like a diamond in the sky.', '', 'User', '2020-07-06 00:54:41', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_read`
--

CREATE TABLE `post_read` (
  `post_read_id` int(11) NOT NULL,
  `p_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `pr_created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_read`
--

INSERT INTO `post_read` (`post_read_id`, `p_slug`, `user_id`, `pr_created_on`) VALUES
(1, '159346763412319', 42, '2020-06-30 06:21:25'),
(2, '159346763412319', 43, '2020-07-01 00:33:45'),
(3, '159346763412319', 19, '2020-07-01 01:41:05'),
(4, '159353692255019', 19, '2020-07-01 02:50:04'),
(5, '159346967752942', 19, '2020-07-01 03:31:25'),
(6, '159354947128046', 47, '2020-07-01 04:38:24'),
(7, '159353692255019', 47, '2020-07-01 05:26:54'),
(8, '159346763412319', 47, '2020-07-01 05:35:19'),
(9, '159354947128046', 19, '2020-07-01 06:44:47'),
(10, '159354947128046', 48, '2020-07-01 19:03:57'),
(11, '159346967752942', 48, '2020-07-01 19:04:09'),
(12, '159353692255019', 48, '2020-07-01 19:04:15'),
(13, '', 19, '2020-07-01 21:52:43'),
(14, '159346763412319', 49, '2020-07-01 22:25:03'),
(15, '159353692255019', 49, '2020-07-01 22:25:11'),
(16, '159346967752942', 49, '2020-07-01 22:31:22'),
(17, '159354947128046', 49, '2020-07-01 22:37:08'),
(18, '159346763412319', 12, '2020-07-01 22:49:12'),
(19, '159346967752942', 12, '2020-07-01 22:49:22'),
(20, '159353692255019', 12, '2020-07-01 22:49:49'),
(21, '159354947128046', 12, '2020-07-01 22:53:32'),
(22, '159363149541512', 12, '2020-07-02 03:25:15'),
(23, '159361830401612', 12, '2020-07-02 03:25:58'),
(24, '159361817399712', 12, '2020-07-02 03:56:04'),
(25, '159363401438450', 50, '2020-07-02 04:07:11'),
(26, '159363401438450', 12, '2020-07-02 04:08:28'),
(27, '159363401438450', 19, '2020-07-02 05:16:56'),
(28, '159394929533919', 19, '2020-07-05 20:57:42'),
(29, '159394943211319', 19, '2020-07-05 20:57:46'),
(30, '159396808125419', 19, '2020-07-06 00:54:45'),
(31, '159394909184719', 19, '2020-07-06 01:46:15'),
(32, '159361817399712', 19, '2020-07-06 05:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_supports`
--

CREATE TABLE `post_supports` (
  `post_support_id` int(11) NOT NULL,
  `p_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ps_created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_supports`
--

INSERT INTO `post_supports` (`post_support_id`, `p_slug`, `user_id`, `ps_created_on`) VALUES
(1, '159353692255019', 19, '2020-07-01 03:31:04'),
(2, '159346763412319', 19, '2020-07-01 19:23:06'),
(3, '159354947128046', 19, '2020-07-01 19:29:49'),
(4, '159353692255019', 12, '2020-07-01 22:53:09'),
(5, '159363149541512', 12, '2020-07-02 03:25:51'),
(6, '159363401438450', 12, '2020-07-02 04:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `post_views_id` int(11) NOT NULL,
  `p_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `pv_created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`post_views_id`, `p_slug`, `user_id`, `pv_created_on`) VALUES
(1, '159346763412319', 42, '2020-06-30 06:23:28'),
(2, '159346763412319', 43, '2020-07-01 00:33:45'),
(3, '159346763412319', 19, '2020-07-01 01:41:04'),
(4, '159353692255019', 19, '2020-07-01 02:48:32'),
(5, '159346967752942', 19, '2020-07-01 03:31:24'),
(6, '159354947128046', 47, '2020-07-01 04:38:23'),
(7, '159353692255019', 47, '2020-07-01 05:26:53'),
(8, '159346763412319', 47, '2020-07-01 05:35:19'),
(9, '159354947128046', 19, '2020-07-01 06:44:46'),
(10, '159354947128046', 48, '2020-07-01 19:03:56'),
(11, '159346967752942', 48, '2020-07-01 19:04:08'),
(12, '159353692255019', 48, '2020-07-01 19:04:13'),
(13, '159346763412319', 49, '2020-07-01 22:25:03'),
(14, '159353692255019', 49, '2020-07-01 22:25:10'),
(15, '159354947128046', 49, '2020-07-01 22:29:16'),
(16, '159346967752942', 49, '2020-07-01 22:31:20'),
(17, '159346763412319', 12, '2020-07-01 22:49:11'),
(18, '159346967752942', 12, '2020-07-01 22:49:21'),
(19, '159353692255019', 12, '2020-07-01 22:49:49'),
(20, '159354947128046', 12, '2020-07-01 22:53:32'),
(21, '159363149541512', 12, '2020-07-02 03:25:14'),
(22, '159361830401612', 12, '2020-07-02 03:25:57'),
(23, '159361817399712', 12, '2020-07-02 03:56:03'),
(24, '159363401438450', 50, '2020-07-02 04:07:10'),
(25, '159363401438450', 12, '2020-07-02 04:08:28'),
(26, '159363401438450', 19, '2020-07-02 05:16:55'),
(27, '159394988581519', 19, '2020-07-05 20:57:04'),
(28, '159394929533919', 19, '2020-07-05 20:57:41'),
(29, '159394943211319', 19, '2020-07-05 20:57:46'),
(30, '159396808125419', 19, '2020-07-06 00:54:44'),
(31, '159394909184719', 19, '2020-07-06 01:46:14'),
(32, '159361817399712', 19, '2020-07-06 05:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `post_id`, `user_id`, `r_created_on`, `r_status`) VALUES
(1, 5, 19, '2020-07-02 04:26:53', 0),
(2, 20, 19, '2020-07-02 04:32:02', 0),
(3, 20, 19, '2020-07-02 04:32:06', 0),
(4, 20, 19, '2020-07-02 04:32:09', 0),
(5, 20, 19, '2020-07-02 04:33:17', 0),
(6, 20, 19, '2020-07-02 04:34:01', 0),
(7, 20, 19, '2020-07-02 04:34:03', 0),
(8, 20, 19, '2020-07-02 04:51:00', 0),
(9, 20, 19, '2020-07-02 04:51:37', 0),
(10, 20, 19, '2020-07-02 05:03:10', 0),
(11, 20, 19, '2020-07-02 05:04:14', 0),
(12, 20, 19, '2020-07-02 05:04:32', 0),
(13, 5, 19, '2020-07-02 05:05:00', 0),
(14, 20, 19, '2020-07-02 05:05:44', 0),
(15, 20, 19, '2020-07-02 05:06:22', 0),
(16, 4, 19, '2020-07-02 05:06:44', 0),
(17, 20, 19, '2020-07-05 22:17:28', 0),
(18, 5, 19, '2020-07-05 22:20:33', 1),
(19, 2, 19, '2020-07-05 22:20:58', 1),
(20, 27, 19, '2020-07-06 01:27:27', 2),
(21, 20, 19, '2020-07-06 01:33:24', 0),
(22, 20, 19, '2020-07-06 01:34:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report_bugs`
--

CREATE TABLE `report_bugs` (
  `report_bug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rb_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rb_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `rb_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report_bugs`
--

INSERT INTO `report_bugs` (`report_bug_id`, `user_id`, `rb_content`, `rb_created_on`, `rb_status`) VALUES
(1, 19, 'Testtt', '2020-07-06 02:17:36', 0),
(2, 19, 'gergerg', '2020-07-06 02:19:36', 0),
(3, 19, 'rhrthrthrhrhr', '2020-07-06 02:21:59', 0),
(4, 19, 'ioashdoiahdohaiodhipdhapidpadija', '2020-07-06 02:22:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_metadata`
--

CREATE TABLE `site_metadata` (
  `site_metadata_id` int(11) NOT NULL,
  `sm_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_type` int(11) NOT NULL,
  `sm_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `sm_created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sm_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_metadata`
--

INSERT INTO `site_metadata` (`site_metadata_id`, `sm_title`, `sm_content`, `sm_type`, `sm_created_on`, `sm_created_by`, `sm_status`) VALUES
(1, 'Feeling Good', '<p><small>Like I should.</small></p>', 1, '2020-07-05 03:32:12', 'chiekkored', 0),
(2, 'To all users on this platform', '<p>Please, please, please, continue on what you\'re doing. Just respect one another and take time to read their thoughts posted. Thank you very much! Have a please day.</p>', 3, '2020-07-05 03:32:27', 'chiekkored', 0),
(3, 'To be deleted', 'This post is going to be deleted', 3, '2020-07-05 04:04:22', 'chiekkored', 0),
(4, 'Chuya', '<p>Hmmhm mmm</p>', 3, '2020-07-05 22:03:18', 'chiekkored', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tags_id` int(11) NOT NULL,
  `t_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `t_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tags_id`, `t_name`, `t_color`, `t_created_on`, `t_status`) VALUES
(1, 'Rape', 'Red', '2020-06-26 22:54:24', 1),
(2, 'Depression', 'Secondary', '2020-06-26 22:54:24', 0),
(3, 'Abuse', 'Dark', '2020-06-29 01:54:55', 0),
(4, 'Others', 'Info', '2020-06-29 01:54:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unhash_p` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_banned` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uuid`, `ip_address`, `username`, `password`, `unhash_p`, `role`, `u_created_on`, `is_banned`, `status`) VALUES
(1, '', '', 'hatchitadmin', 'XWtXOA9nVjQAM1Zj', 'abc123', 'User', '2020-06-27 23:52:56', 0, 0),
(2, '', '', 'chiekkored', 'UmYDZls5ADhdMwF1B2IGZARpUDAHaQRnDWVSZA==', 'chikoredo23544', 'User', '2020-06-27 23:52:56', 0, 0),
(3, '', '', 'TEST', 'ACMEbAhwACc=', 'test', 'User', '2020-06-27 23:52:56', 0, 0),
(4, '', '', '', '', '', 'User', '2020-06-27 23:52:56', 0, 0),
(5, '', '', 'a', 'ATc=', 'a', 'User', '2020-06-27 23:52:56', 0, 0),
(6, '', '', 'a', 'UWc=', 'a', 'User', '2020-06-27 23:52:56', 0, 0),
(7, '', '', 'hatchitadmin', 'UmRUOwhgUzFdbgM2', 'abc123', 'User', '2020-06-27 23:52:56', 0, 0),
(8, '', '', 'chiekkored', 'UjRQb1pi', '123', 'User', '2020-06-27 23:52:56', 0, 0),
(9, '', '', 'jajdad', 'VDJWaVxk', '123', 'User', '2020-06-27 23:52:56', 0, 0),
(10, '', '', 'heyyoww', 'AzcNaAlrU2sAbgZyVDEDYQFsUzNQPgZlD2cKPA', 'chikoredo23544', 'User', '2020-06-27 23:52:56', 0, 0),
(11, '', '', 'chiekko', '$2y$10$dPqfz8ive7adToCVhxIDZuYl2rNWmBdeow./60EYInUNxxNMKL9me', 'chikoredo', 'User', '2020-06-27 23:52:56', 0, 0),
(12, '', '', 'testing', '$2y$10$KQsrH/DPciTyKGB4/LDG5uRsxOZpcLlrg4Q6Z1JY99pi.onbU6hY.', 'testing', 'User', '2020-06-27 23:52:56', 0, 0),
(13, '', '', 'fi3bm0n2814un7ujhc252d45uhofjt2r', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(14, '', '', 'qt0dm21f58cffkjbivo2d56qmurmtlmr', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(15, '', '', 'fk4af113tl77tgo2ce9hef7ie6nkbs5a', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(16, '', '', 'cheska', '$2y$10$crNWOdZhMCzxATZUqIfYuOGo7Kcd3vAkD1WTUINln/6FwVbimCs9.', '123', 'User', '2020-06-27 23:52:56', 0, 0),
(17, '', '', 'chloe', '$2y$10$lx2uG41HHJFdJX9VXmo4hOCa68FJ78dmR2jbXfiPJZ16pjtEUAk8e', '115', 'User', '2020-06-27 23:52:56', 0, 0),
(18, '', '', 'peach', '$2y$10$78UPuGnQjwJU5qokrdaCsOm820SpoONvP19WQdhftPoJ2fc8VmlYW', '115', 'User', '2020-06-27 23:52:56', 0, 0),
(19, '', '', 'chikoredo', '$2y$10$uoPP8HWxSkG4MZXQxYO4VuzxiC2j28tuu4Qb8ji1AzsLHqF5PoUTe', 'chikoredo', 'User', '2020-06-27 23:52:56', 0, 0),
(20, '', '', 'redoreds', '$2y$10$ex3HjHMdM3JdRYduyjYnquZ4UAKLvnRwBOVAJU7PUF1uSJk2flyNa', 'redoreds', 'User', '2020-06-27 23:52:56', 0, 0),
(21, '', '', 'aliño', '$2y$10$4QXwpcCBBN8Jsoa5F74rhePHDQplHuliQxmbHXhI.NAKnm1BJYTj.', '111', 'User', '2020-06-27 23:52:56', 0, 0),
(22, '', '', 'churbaa', '$2y$10$TQUpw/5bl5MViivc3lUZkuBORzmm5urZS1cPVgUnF1M69p.eNhyDi', 'chchch', 'User', '2020-06-27 23:52:56', 0, 0),
(23, '', '', 'Chiekkoredo', '$2y$10$QVU2q0tXXNW8xHtxbeKEse1cvkVL3b6StXtE/eYTByKEoYxPtJTE2', 'chiekkoredo', 'User', '2020-06-27 23:52:56', 0, 0),
(24, '', '', '0e24d8u9grfea7i1smonpbocpc24lfu1', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(25, '', '', 'jaj8vige9p3tat2u80kaod0l4guodbom', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(26, '', '', 'hbl56rdtl1rtn203o3ioansit0ei110t', '', '', 'Guest', '2020-06-27 23:52:56', 0, 0),
(27, '', '', 'btb0pi5q4ndh8dili4q9kbefgi15ehr6', '', '', 'Guest', '2020-06-28 00:02:15', 0, 0),
(28, '', '', '623rh6qlb68kcj512r5vd32k9i3kutv6', '', '', 'Guest', '2020-06-28 00:06:50', 0, 0),
(29, '', '', 'a1erkieqho9q2e4n08o00f8onr6i2psp', '', '', 'Guest', '2020-06-28 06:25:56', 0, 0),
(30, '', '', 'n751dbrg4teoqfpv5lp986bnv7na0q3c', '', '', 'Guest', '2020-06-29 19:11:29', 0, 0),
(31, '', '', 'r5o05kg5mbet7u1med0ip71847lnbg3s', '', '', 'Guest', '2020-06-29 19:15:36', 0, 0),
(32, '', '', 'peachy', '$2y$10$KVAXT9HdAz3bUXJs6Kc7Nu9Ps6i8gSZQYFwAvDaf/ElaZ7sG2SU9W', '2222', 'User', '2020-06-29 20:58:26', 0, 0),
(33, '', '', '4r7cp095d156hbg32c5je3cme86agu49', '', '', 'Guest', '2020-06-30 02:33:03', 0, 0),
(34, '', '', '29j4d91fc3pettvoj6f286hls3289fch', '', '', 'Guest', '2020-06-30 03:18:04', 0, 0),
(35, '', '', 'testing', '$2y$10$qqu7wvnUmhZ7oauPEemGbeYq31rcxxFMwDW6ArBRPBlhuQPeUeSJ.', 'testingg', 'User', '2020-06-30 05:05:03', 0, 0),
(36, '', '', 'testing', '$2y$10$yryz7bK1Q2pAhIt.7YHEtOiGxoU.LiKZniua1CLtKPwx6gIvS3vKy', 'testinggg', 'User', '2020-06-30 05:12:13', 0, 0),
(37, '', '', 'testing', '$2y$10$mKQ5/tjcoD.tfWIPe4J3xuPihefWf.9IV1A6BR.sykAb65JupeE3G', 'testinggg', 'User', '2020-06-30 05:13:33', 0, 0),
(38, '', '', 'testing', '$2y$10$EgnhJ1DeoZzl2PtI2YY46e1I96wxzr0GTwBI76eprFm.hVPZzVXbK', 'testingg', 'User', '2020-06-30 05:14:23', 0, 0),
(39, '', '', 'testing', '$2y$10$NGBOgZgFdKEPh1TiYwIjFulR7ZroxKaXQMvIyB/dTLlnDBOz9kX4m', 'testingg', 'User', '2020-06-30 05:15:11', 0, 0),
(40, '', '', 'testing', '$2y$10$qCy4fArTRkTM.ivTuAZ5pepYgTsCrJWEGFc8BVgyR3vFM8z3JgTcK', 'testingg', 'User', '2020-06-30 05:15:42', 0, 0),
(41, '', '', 'hahahah', '$2y$10$N6vbmGAvUKUveo3AiMt8QO.4TPoh8z55z/Q0rbvx.ZuyfOixKW0xm', '123123123', 'User', '2020-06-30 05:20:17', 0, 0),
(42, '', '', 'i3eiiov334g8foq4cphb4297lmlqju2p', '', '', 'Guest', '2020-06-30 05:54:16', 0, 0),
(43, '', '', 'fuftm3pcoeqku08rt3qe6dkk1klih3aj', '', '', 'Guest', '2020-07-01 00:05:45', 0, 0),
(44, '', '', 'h4g6o73hipaao5fa8944p4agj1gbbtcg', '', '', 'Guest', '2020-07-01 04:17:24', 0, 0),
(45, '', '', 'd27n9nh7csjp8hena93og3dejv8tifgo', '', '', 'Guest', '2020-07-01 04:29:55', 0, 0),
(46, '', '', 'ibjkdcdul34phjo5v8agga6dalqcfu50', '', '', 'Guest', '2020-07-01 04:31:52', 0, 0),
(47, '', '', 'cs6om8sjhakc8moa41dn24bugn7p2jqk', '', '', 'Guest', '2020-07-01 04:38:15', 0, 0),
(48, '', '', '846khmft0nmsj85jmo5c20rovk10m02n', '', '', 'Guest', '2020-07-01 19:03:24', 0, 0),
(49, '', '', 'e7liv7kohdmckj2c1ntkorj3khf6hfva', '', '', 'Guest', '2020-07-01 22:24:59', 0, 0),
(50, '', '', 'STONEDPOETRY', '$2y$10$DHtXUYJSVsyUgyK1k3Zx8u1KDSPNkDM1.LeBO7NH0E.yFzaVR7igG', 'chinry32777', 'User', '2020-07-02 04:02:15', 0, 1),
(51, '', '', 'tb6cr3u80a7oc5nvjjtmvo0bi9adq74h', '', '', 'Guest', '2020-07-04 03:31:14', 0, 0),
(52, '', '', 'lojlngergc9t2l12ppkpltngevgh6tju', '', '', 'Guest', '2020-07-06 02:37:19', 0, 0),
(53, '', '', '7knh1g7ptei97c0ftnc27e4g6g8sfcg0', '', '', 'Guest', '2020-07-06 02:42:06', 0, 0),
(54, '', '', '0ogbis8ioeifg9lmdrj3eo81omoni04k', '', '', 'Guest', '2020-07-06 06:35:13', 0, 0),
(55, 'e370d6d93b944146b273b2c1ba925c68', '2001:4454:15d:1b00:d526:9f9e:b7b5:820f', 'redoreds', '$2y$10$AF04uxyTOPx9lNbs7gQdwe0wNHw8hVQD5cx8zFNKh.011jNuNyfWa', 'redoreds', 'User', '2020-07-06 07:20:23', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_admins`
--

CREATE TABLE `user_admins` (
  `user_admin_id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admins`
--

INSERT INTO `user_admins` (`user_admin_id`, `uuid`, `username`, `password`, `created_on`, `created_by`, `admin_role`, `status`) VALUES
(1, '9f95427be6507319b8153c7b283045e8', 'chiekkored', '$2y$10$0rsg4ny0Y/dytwHJslZyI.FfPox/SudYnlLXwTbyRxyrda.KSlPuK', '2020-07-04 22:26:06', 'chiekkored', 'Superadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_banned`
--

CREATE TABLE `user_banned` (
  `user_banned_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ub_created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `ub_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_read`
--
ALTER TABLE `post_read`
  ADD PRIMARY KEY (`post_read_id`);

--
-- Indexes for table `post_supports`
--
ALTER TABLE `post_supports`
  ADD PRIMARY KEY (`post_support_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`post_views_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `report_bugs`
--
ALTER TABLE `report_bugs`
  ADD PRIMARY KEY (`report_bug_id`);

--
-- Indexes for table `site_metadata`
--
ALTER TABLE `site_metadata`
  ADD PRIMARY KEY (`site_metadata_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tags_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_admins`
--
ALTER TABLE `user_admins`
  ADD PRIMARY KEY (`user_admin_id`);

--
-- Indexes for table `user_banned`
--
ALTER TABLE `user_banned`
  ADD PRIMARY KEY (`user_banned_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post_read`
--
ALTER TABLE `post_read`
  MODIFY `post_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post_supports`
--
ALTER TABLE `post_supports`
  MODIFY `post_support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `post_views_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `report_bugs`
--
ALTER TABLE `report_bugs`
  MODIFY `report_bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_metadata`
--
ALTER TABLE `site_metadata`
  MODIFY `site_metadata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user_admins`
--
ALTER TABLE `user_admins`
  MODIFY `user_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_banned`
--
ALTER TABLE `user_banned`
  MODIFY `user_banned_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
