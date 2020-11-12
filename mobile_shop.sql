-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 07:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `description` text,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `date_time`, `description`, `user_id`) VALUES
(1, '2020-03-14 07:49:01', 'Login - \'admin\'', 1),
(2, '2020-03-14 07:51:36', 'Login - \'admin\'', 1),
(3, '2020-03-14 08:23:51', 'Login - \'admin\'', 1),
(4, '2020-03-14 09:44:57', 'Login - \'admin\'', 1),
(5, '2020-03-21 11:11:47', 'Login - \'admin\'', 1),
(6, '2020-03-25 13:44:07', 'Login - \'admin\'', 1),
(7, '2020-03-25 13:45:09', 'Logout - \'admin\'', 1),
(8, '2020-05-05 13:48:34', 'Login - \'admin\'', 1),
(9, '2020-05-08 11:06:39', 'Login - \'admin\'', 1),
(10, '2020-05-14 09:38:17', 'Login - \'admin\'', 1),
(11, '2020-05-22 13:42:32', 'Login - \'admin\'', 1),
(12, '2020-05-22 14:40:52', 'Deliverer - saved : 1', 1),
(13, '2020-07-25 22:25:55', 'Login - \'admin\'', 1),
(14, '2020-07-25 22:33:32', 'Category saved - test', 1),
(15, '2020-07-25 22:33:39', 'Category deleted - test', 1),
(16, '2020-07-25 22:34:48', 'Logout - \'admin\'', 1),
(17, '2020-07-25 22:35:17', 'Login - \'admin\'', 1),
(18, '2020-07-26 09:42:39', 'Logout - \'admin\'', 1),
(19, '2020-08-21 12:57:26', 'Login - \'admin\'', 1),
(20, '2020-08-21 14:54:22', 'Logout - \'admin\'', 1),
(21, '2020-08-21 14:54:25', 'Login - \'admin\'', 1),
(22, '2020-08-21 18:26:58', 'Login - \'admin\'', 1),
(23, '2020-08-21 19:14:29', 'Logout - \'admin\'', 1),
(24, '2020-08-21 19:14:31', 'Login - \'admin\'', 1),
(25, '2020-08-21 19:33:13', 'DeviceFault saved - ', 1),
(26, '2020-08-21 19:39:55', 'PossibleSolution saved - ', 1),
(27, '2020-08-21 19:40:48', 'PossibleSolution deleted - ', 1),
(28, '2020-08-21 19:40:53', 'DeviceFault deleted - ', 1),
(29, '2020-08-21 19:46:49', 'CollectedAccessories saved - ', 1),
(30, '2020-08-21 19:46:56', 'CollectedAccessories deleted - ', 1),
(31, '2020-08-21 20:44:22', 'DeviceFault saved - ', 1),
(32, '2020-08-21 20:46:31', 'DeviceFault saved - ', 1),
(33, '2020-08-21 20:47:23', 'PossibleSolution saved - ', 1),
(34, '2020-08-21 20:48:54', 'CollectedAccessories saved - ', 1),
(35, '2020-08-21 20:49:01', 'CollectedAccessories saved - ', 1),
(36, '2020-08-21 22:10:34', 'Logout - \'admin\'', 1),
(37, '2020-08-21 22:10:37', 'Login - \'admin\'', 1),
(38, '2020-08-21 22:26:54', 'Logout - \'admin\'', 1),
(39, '2020-08-22 14:59:11', 'Logout - \'admin\'', 1),
(40, '2020-08-22 14:59:13', 'Login - \'admin\'', 1),
(41, '2020-08-22 16:09:23', 'DeviceModel saved - ', 1),
(42, '2020-08-22 16:10:19', 'DeviceModel deleted - ', 1),
(43, '2020-08-22 16:10:29', 'DeviceModel saved - ', 1),
(44, '2020-08-22 16:14:58', 'DeviceModel updated - ', 1),
(45, '2020-08-22 16:15:04', 'DeviceModel updated - ', 1),
(46, '2020-08-22 16:15:06', 'DeviceModel deleted - ', 1),
(47, '2020-08-22 16:15:17', 'DeviceModel saved - ', 1),
(48, '2020-08-22 16:19:34', 'Batch updated - ', 1),
(49, '2020-08-22 16:21:17', 'Batch updated - ', 1),
(50, '2020-08-22 16:22:48', 'Batch updated - ', 1),
(51, '2020-08-22 16:23:02', 'DeviceModel updated - ', 1),
(52, '2020-08-26 08:09:23', 'Login - \'admin\'', 1),
(53, '2020-09-01 14:07:26', 'Login - \'admin\'', 1),
(54, '2020-09-01 14:55:53', 'Logout - \'admin\'', 1),
(55, '2020-09-01 14:58:54', 'Login - \'admin\'', 1),
(56, '2020-09-01 16:16:56', 'Logout - \'admin\'', 1),
(57, '2020-09-01 16:17:23', 'Login - \'admin\'', 1),
(58, '2020-09-01 18:00:19', 'Logout - \'admin\'', 1),
(59, '2020-09-01 18:00:22', 'Login - \'admin\'', 1),
(60, '2020-09-01 18:52:26', 'Device Repair - saved', 1),
(61, '2020-09-01 18:55:34', 'Device Repair - saved', 1),
(62, '2020-09-01 19:10:09', 'Device Repair - saved', 1),
(63, '2020-09-01 19:10:46', 'Device Repair - saved', 1),
(64, '2020-09-01 19:11:02', 'Device Repair - saved', 1),
(65, '2020-09-01 19:15:02', 'Device Repair - saved', 1),
(66, '2020-09-01 19:15:15', 'Device Repair - saved', 1),
(67, '2020-09-01 19:22:47', 'Device Repair - saved', 1),
(68, '2020-09-01 19:28:05', 'Device Repair - updated:', 1),
(69, '2020-09-01 19:28:15', 'Device Repair - updated:', 1),
(70, '2020-09-01 19:28:22', 'Device Repair - updated:', 1),
(71, '2020-09-01 19:30:03', 'Repair - deleted:', 1),
(72, '2020-09-01 19:30:47', 'Device Repair - saved', 1),
(73, '2020-09-01 19:31:01', 'Device Repair - updated:', 1),
(74, '2020-09-02 14:16:51', 'Logout - \'admin\'', 1),
(75, '2020-09-02 14:16:55', 'Login - \'admin\'', 1),
(76, '2020-09-02 15:26:32', 'brand saved - ', 1),
(77, '2020-09-02 15:30:06', 'brand saved - ', 1),
(78, '2020-09-02 15:44:37', 'brand saved - ', 1),
(79, '2020-09-02 16:24:42', 'brand saved - ', 1),
(80, '2020-09-02 16:49:01', 'Batch saved - ', 1),
(81, '2020-09-02 18:45:50', 'Login - \'admin\'', 1),
(82, '2020-09-02 18:47:14', 'Batch saved - ', 1),
(83, '2020-09-02 18:47:52', 'Batch saved - ', 1),
(84, '2020-09-02 18:53:14', 'Batch saved - ', 1),
(85, '2020-09-02 18:58:22', 'Location Number - updated : ', 1),
(86, '2020-09-02 19:00:14', 'Location Number - updated : ', 1),
(87, '2020-09-02 19:00:25', 'brand saved - ', 1),
(88, '2020-09-02 19:09:17', 'Location Number - updated : ', 1),
(89, '2020-09-02 19:09:38', 'brand saved', 1),
(90, '2020-09-02 19:10:11', 'Role - deleted : hvj', 1),
(91, '2020-09-02 19:10:16', 'Role - deleted : ffds', 1),
(92, '2020-09-02 19:10:20', 'Role - deleted : ghn', 1),
(93, '2020-09-02 19:10:32', 'Brand - updated : ', 1),
(94, '2020-09-02 19:10:44', 'Brand - updated : ', 1),
(95, '2020-09-02 19:29:36', 'RepairStatus saved', 1),
(96, '2020-09-02 19:30:57', 'RepairStatus - updated : ', 1),
(97, '2020-09-02 19:40:14', 'Login - \'admin\'', 1),
(98, '2020-09-02 21:45:51', 'Login - \'admin\'', 1),
(99, '2020-09-02 21:47:27', 'brand saved', 1),
(100, '2020-09-03 09:57:44', 'Login - \'admin\'', 1),
(101, '2020-09-03 13:23:07', 'Login - \'admin\'', 1),
(102, '2020-09-03 17:38:02', 'Login - \'admin\'', 1),
(103, '2020-09-03 18:14:46', 'Login - \'admin\'', 1),
(104, '2020-09-03 21:09:09', 'Login - \'admin\'', 1),
(105, '2020-09-03 22:00:20', 'Login - \'admin\'', 1),
(106, '2020-09-04 17:58:22', 'Login - \'admin\'', 1),
(107, '2020-09-04 19:56:45', 'Login - \'admin\'', 1),
(108, '2020-09-04 23:20:53', 'Login - \'admin\'', 1),
(109, '2020-09-06 01:16:12', 'Login - \'admin\'', 1),
(110, '2020-09-06 11:21:41', 'Login - \'admin\'', 1),
(111, '2020-09-06 16:00:22', 'Login - \'admin\'', 1),
(112, '2020-09-07 08:33:08', 'Login - \'admin\'', 1),
(113, '2020-09-07 09:31:14', 'Login - \'admin\'', 1),
(114, '2020-09-07 10:32:53', 'RepairStatus saved', 1),
(115, '2020-09-07 12:40:32', 'Logout - \'admin\'', 1),
(116, '2020-09-07 12:40:40', 'Login - \'admin\'', 1),
(117, '2020-09-07 13:26:51', 'Device Repair - saved', 1),
(118, '2020-09-07 13:28:53', 'Device Repair - saved', 1),
(119, '2020-09-07 13:35:15', 'Device Repair - saved', 1),
(120, '2020-09-07 13:40:39', 'Device Repair - saved', 1),
(121, '2020-09-07 13:53:06', 'Device Repair - saved', 1),
(122, '2020-09-07 13:53:29', 'Device Repair - saved', 1),
(123, '2020-09-07 13:54:19', 'Device Repair - saved', 1),
(124, '2020-09-07 13:55:49', 'Device Repair - saved', 1),
(125, '2020-09-07 14:00:25', 'Device Repair - saved', 1),
(126, '2020-09-07 14:03:12', 'Device Repair - saved', 1),
(127, '2020-09-07 14:04:30', 'Device Repair - saved', 1),
(128, '2020-09-07 14:31:44', 'Device Repair - saved', 1),
(129, '2020-09-07 16:08:01', 'Logout - \'admin\'', 1),
(130, '2020-09-07 16:08:08', 'Login - \'admin\'', 1),
(131, '2020-09-07 16:13:09', 'Device Repair - saved', 1),
(132, '2020-09-07 17:00:04', 'Device Repair - saved', 1),
(133, '2020-09-07 17:02:12', 'Device Repair - saved', 1),
(134, '2020-09-07 19:48:46', 'Login - \'admin\'', 1),
(135, '2020-09-08 10:31:13', 'Login - \'admin\'', 1),
(136, '2020-09-08 19:28:22', 'Login - \'admin\'', 1),
(137, '2020-09-08 19:37:47', 'Device Repair - saved', 1),
(138, '2020-09-08 19:39:29', 'Login - \'admin\'', 1),
(139, '2020-09-08 19:39:42', 'brand saved', 1),
(140, '2020-09-08 20:56:35', 'Login - \'admin\'', 1),
(141, '2020-09-08 22:05:17', 'Login - \'admin\'', 1),
(142, '2020-09-09 11:59:29', 'Login - \'admin\'', 1),
(143, '2020-09-09 20:45:08', 'Login - \'admin\'', 1),
(144, '2020-09-10 10:02:58', 'Login - \'admin\'', 1),
(145, '2020-09-10 10:50:06', 'Device Repair - saved', 1),
(146, '2020-09-10 10:51:23', 'Device Repair - saved', 1),
(147, '2020-09-10 10:53:00', 'Device Repair - saved', 1),
(148, '2020-09-10 10:54:40', 'Device Repair - saved', 1),
(149, '2020-09-10 10:56:55', 'Device Repair - saved', 1),
(150, '2020-09-10 11:29:48', 'Logout - \'admin\'', 1),
(151, '2020-09-10 11:29:52', 'Login - \'admin\'', 1),
(152, '2020-09-11 08:52:50', 'Login - \'admin\'', 1),
(153, '2020-09-11 09:22:55', 'Device Repair - saved', 1),
(154, '2020-09-11 09:38:32', 'Device Repair - saved', 1),
(155, '2020-09-11 09:42:42', 'Device Repair - saved', 1),
(156, '2020-09-11 10:04:23', 'Device Repair - saved', 1),
(157, '2020-09-11 11:07:08', 'DeviceFault saved - ', 1),
(158, '2020-09-11 11:53:11', 'Logout - \'admin\'', 1),
(159, '2020-09-11 11:53:15', 'Login - \'admin\'', 1),
(160, '2020-09-11 11:55:02', 'Device Repair - saved', 1),
(161, '2020-09-11 12:11:54', 'Device Repair - saved', 1),
(162, '2020-09-11 12:16:20', 'Device Repair - saved', 1),
(163, '2020-09-11 12:24:08', 'Repair - deleted:', 1),
(164, '2020-09-11 12:49:08', 'Device Repair - saved', 1),
(165, '2020-09-11 12:54:05', 'Device Repair - saved', 1),
(166, '2020-09-11 12:57:42', 'Device Repair - updated:', 1),
(167, '2020-09-11 13:01:23', 'Device Repair - updated:', 1),
(168, '2020-09-11 13:31:24', 'Device Repair - updated:', 1),
(169, '2020-09-11 13:32:19', 'Device Repair - updated:', 1),
(170, '2020-09-11 13:41:36', 'Device Repair - updated:', 1),
(171, '2020-09-11 13:55:02', 'Device Repair - updated:', 1),
(172, '2020-09-11 14:07:44', 'Device Repair - saved', 1),
(173, '2020-09-11 16:04:53', 'Logout - \'admin\'', 1),
(174, '2020-09-11 16:04:58', 'Login - \'admin\'', 1),
(175, '2020-09-11 22:17:56', 'Login - \'admin\'', 1),
(176, '2020-09-12 08:23:17', 'Login - \'admin\'', 1),
(177, '2020-09-12 08:48:43', 'Device Repair - saved', 1),
(178, '2020-09-12 08:50:02', 'Repair - deleted:', 1),
(179, '2020-09-12 08:56:04', 'Device Repair - saved', 1),
(180, '2020-09-12 09:07:43', 'Device Repair - updated:', 1),
(181, '2020-09-12 09:22:10', 'Device Repair - saved', 1),
(182, '2020-09-12 09:22:52', 'Device Repair - updated:', 1),
(183, '2020-09-12 09:25:42', 'Device Repair - saved', 1),
(184, '2020-09-12 09:26:37', 'Device Repair - updated:', 1),
(185, '2020-09-12 09:27:26', 'Device Repair - updated:', 1),
(186, '2020-09-12 09:32:28', 'Device Repair - updated:', 1),
(187, '2020-09-12 11:30:30', 'Logout - \'admin\'', 1),
(188, '2020-09-12 11:30:35', 'Login - \'admin\'', 1),
(189, '2020-09-12 11:56:36', 'JobCloseStatus - saved : ', 1),
(190, '2020-09-12 12:08:18', 'JobCloseStatus - saved : ', 1),
(191, '2020-09-12 12:09:05', 'JobCloseStatus - updated : ', 1),
(192, '2020-09-12 12:13:25', 'JobCloseStatus - deleted : Dileep', 1),
(193, '2020-09-12 12:13:42', 'JobCloseStatus - updated : ', 1),
(194, '2020-09-12 12:56:16', 'Logout - \'admin\'', 1),
(195, '2020-09-12 12:56:20', 'Login - \'admin\'', 1),
(196, '2020-09-12 12:56:39', 'JobCloseStatus - saved : ', 1),
(197, '2020-09-12 12:58:25', 'JobCloseStatus - deleted : qqq', 1),
(198, '2020-09-12 12:59:59', 'JobCloseStatus - saved : ', 1),
(199, '2020-09-12 13:02:33', 'JobCloseStatus - updated : ', 1),
(200, '2020-09-12 14:26:04', 'JobClose - saved : ', 1),
(201, '2020-09-12 14:56:14', 'JobClose - saved : ', 1),
(202, '2020-09-12 14:58:23', 'JobClose - saved : ', 1),
(203, '2020-09-12 15:07:38', 'JobClose - deleted : ', 1),
(204, '2020-09-12 15:07:59', 'JobClose - updated : ', 1),
(205, '2020-09-13 09:02:30', 'Login - \'admin\'', 1),
(206, '2020-09-13 09:35:29', 'PaymentClose - saved : ', 1),
(207, '2020-09-13 09:36:15', 'PaymentClose - saved : ', 1),
(208, '2020-09-13 09:37:40', 'PaymentClose - saved : ', 1),
(209, '2020-09-13 09:38:58', 'PaymentClose - saved : ', 1),
(210, '2020-09-13 09:57:32', 'PaymentClose - saved : ', 1),
(211, '2020-09-13 09:57:43', 'PaymentClose - saved : ', 1),
(212, '2020-09-13 09:59:57', 'PaymentClose - saved : ', 1),
(213, '2020-09-13 10:01:07', 'PaymentClose - saved : ', 1),
(214, '2020-09-13 10:24:43', 'PaymentClose - saved : ', 1),
(215, '2020-09-13 10:34:53', 'PaymentClose - saved : ', 1),
(216, '2020-09-13 10:36:39', 'PaymentClose - deleted : ', 1),
(217, '2020-09-13 10:37:44', 'PaymentClose - updated : ', 1),
(218, '2020-09-13 10:47:45', 'PaymentClose - saved : ', 1),
(219, '2020-09-13 10:54:39', 'PaymentClose - updated : ', 1),
(220, '2020-09-13 10:55:47', 'PaymentClose - updated : ', 1),
(221, '2020-09-13 10:56:14', 'JobClose - updated : ', 1),
(222, '2020-09-13 10:59:05', 'PaymentClose - saved : ', 1),
(223, '2020-09-13 10:59:37', 'PaymentClose - saved : ', 1),
(224, '2020-09-13 11:00:38', 'PaymentClose - saved : ', 1),
(225, '2020-09-13 11:02:19', 'PaymentClose - saved : ', 1),
(226, '2020-09-13 11:03:19', 'DeviceFault saved - ', 1),
(227, '2020-09-13 11:06:25', 'JobCloseStatus - saved : ', 1),
(228, '2020-09-13 11:07:39', 'JobCloseStatus - saved : ', 1),
(229, '2020-09-13 11:07:57', 'JobClose - saved : ', 1),
(230, '2020-09-13 11:09:24', 'JobCloseStatus - saved : ', 1),
(231, '2020-09-13 11:09:46', 'JobCloseStatus - deleted : qqqqqqq', 1),
(232, '2020-09-13 11:10:59', 'JobCloseStatus - deleted : pipipi', 1),
(233, '2020-09-13 11:11:16', 'JobCloseStatus - saved : ', 1),
(234, '2020-09-13 11:11:39', 'JobClose - saved : ', 1),
(235, '2020-09-13 11:12:06', 'DeviceFault saved - ', 1),
(236, '2020-09-13 11:14:06', 'JobClose - saved : ', 1),
(237, '2020-09-13 11:18:04', 'JobCloseStatus - saved : ', 1),
(238, '2020-09-13 11:18:57', 'JobCloseStatus - saved : ', 1),
(239, '2020-09-13 11:20:03', 'JobCloseStatus - saved : ', 1),
(240, '2020-09-13 11:20:12', 'JobCloseStatus - deleted : dfgsgsgbwsg', 1),
(241, '2020-09-13 11:20:24', 'JobCloseStatus - updated : ', 1),
(242, '2020-09-13 11:20:48', 'JobClose - saved : ', 1),
(243, '2020-09-13 11:21:10', 'JobClose - saved : ', 1),
(244, '2020-09-13 11:21:20', 'JobClose - deleted : ', 1),
(245, '2020-09-13 11:28:06', 'PaymentClose - saved : ', 1),
(246, '2020-09-13 11:28:24', 'PaymentClose - saved : ', 1),
(247, '2020-09-13 11:28:34', 'PaymentClose - deleted : ', 1),
(248, '2020-09-13 11:28:44', 'PaymentClose - updated : ', 1),
(249, '2020-09-14 11:06:31', 'Login - \'admin\'', 1),
(250, '2020-09-14 13:23:23', 'Logout - \'admin\'', 1),
(251, '2020-09-14 13:23:26', 'Login - \'admin\'', 1),
(252, '2020-09-15 10:06:08', 'Login - \'admin\'', 1),
(253, '2020-09-15 10:09:15', 'DeviceFault - deleted : ', 1),
(254, '2020-09-15 10:12:56', 'Batch updated - ', 1),
(255, '2020-09-15 10:13:08', 'PossibleSolution saved - ', 1),
(256, '2020-09-15 10:13:24', 'PossibleSolution - deleted : ', 1),
(257, '2020-09-15 10:15:47', 'CollectedAccessories - deleted : ', 1),
(258, '2020-09-15 10:19:42', 'LocationNumber - deleted : ', 1),
(259, '2020-09-15 10:23:16', 'DeviceModel saved - ', 1),
(260, '2020-09-15 10:23:32', 'DeviceModel - deleted : ', 1),
(261, '2020-09-15 10:24:29', 'Role - deleted : dsd_one', 1),
(262, '2020-09-15 10:26:25', 'Role - deleted : dghyedrty5y', 1),
(263, '2020-09-15 10:33:53', 'Device Repair - saved', 1),
(264, '2020-09-15 10:37:19', 'Device Repair - saved', 1),
(265, '2020-09-15 10:44:22', 'Device Repair - saved', 1),
(266, '2020-09-15 10:45:00', 'Repair - deleted:', 1),
(267, '2020-09-15 10:45:17', 'Repair - deleted:', 1),
(268, '2020-09-15 10:55:28', 'Device Repair - saved', 1),
(269, '2020-09-15 11:21:24', 'Device Repair - saved', 1),
(270, '2020-09-15 11:21:48', 'RepairStatus saved', 1),
(271, '2020-09-15 11:25:52', 'Device Repair - saved', 1),
(272, '2020-09-15 11:29:41', 'DeviceFault saved - ', 1),
(273, '2020-09-15 11:30:14', 'Batch updated - ', 1),
(274, '2020-09-15 11:30:23', 'DeviceFault - deleted : ', 1),
(275, '2020-09-15 11:31:52', 'PossibleSolution saved - ', 1),
(276, '2020-09-15 11:32:07', 'Batch updated - ', 1),
(277, '2020-09-15 11:32:36', 'PossibleSolution - deleted : ', 1),
(278, '2020-09-15 11:33:09', 'CollectedAccessories saved - ', 1),
(279, '2020-09-15 11:33:27', 'Batch updated - ', 1),
(280, '2020-09-15 11:33:53', 'CollectedAccessories - deleted : ', 1),
(281, '2020-09-15 11:34:20', 'DeviceModel saved - ', 1),
(282, '2020-09-15 11:35:06', 'DeviceModel updated - ', 1),
(283, '2020-09-15 11:35:17', 'DeviceModel - deleted : ', 1),
(284, '2020-09-15 11:36:05', 'Batch saved - ', 1),
(285, '2020-09-15 11:36:40', 'Location Number - updated : ', 1),
(286, '2020-09-15 11:36:51', 'LocationNumber - deleted : ', 1),
(287, '2020-09-15 11:38:06', 'brand saved', 1),
(288, '2020-09-15 11:38:46', 'Brand - updated : ', 1),
(289, '2020-09-15 11:38:55', 'Role - deleted : Brand 04', 1),
(290, '2020-09-15 11:40:03', 'Device Repair - saved', 1),
(291, '2020-09-15 11:42:58', 'DeviceModel saved - ', 1),
(292, '2020-09-15 11:43:12', 'DeviceModel saved - ', 1),
(293, '2020-09-15 11:44:12', 'Device Repair - saved', 1),
(294, '2020-09-15 11:47:57', 'brand saved', 1),
(295, '2020-09-15 11:48:29', 'Device Repair - saved', 1),
(296, '2020-09-15 12:47:39', 'Logout - \'admin\'', 1),
(297, '2020-09-15 12:47:46', 'Login - \'admin\'', 1),
(298, '2020-09-15 13:27:46', 'Device Repair - saved', 1),
(299, '2020-09-15 13:29:39', 'DeviceFault saved - ', 1),
(300, '2020-09-15 13:29:53', 'PossibleSolution saved - ', 1),
(301, '2020-09-15 13:30:04', 'CollectedAccessories saved - ', 1),
(302, '2020-09-15 13:30:22', 'DeviceModel saved - ', 1),
(303, '2020-09-15 13:30:49', 'Batch saved - ', 1),
(304, '2020-09-15 13:31:06', 'brand saved', 1),
(305, '2020-09-15 13:31:49', 'RepairStatus saved', 1),
(306, '2020-09-15 13:32:39', 'Product - saved : test10', 1),
(307, '2020-09-15 13:34:20', 'Device Repair - saved', 1),
(308, '2020-09-15 13:41:08', 'DeviceFault saved - ', 1),
(309, '2020-09-15 13:41:20', 'PossibleSolution saved - ', 1),
(310, '2020-09-15 13:41:32', 'CollectedAccessories saved - ', 1),
(311, '2020-09-15 13:41:47', 'DeviceModel saved - ', 1),
(312, '2020-09-15 13:42:01', 'Batch saved - ', 1),
(313, '2020-09-15 13:42:16', 'brand saved', 1),
(314, '2020-09-15 13:42:27', 'RepairStatus saved', 1),
(315, '2020-09-15 13:42:48', 'Category saved - test11', 1),
(316, '2020-09-15 13:43:16', 'Product - saved : test11', 1),
(317, '2020-09-15 13:44:08', 'Device Repair - saved', 1),
(318, '2020-09-15 14:00:38', 'Device Repair - saved', 1),
(319, '2020-09-15 14:01:36', 'Device Repair - saved', 1),
(320, '2020-09-15 15:36:47', 'Logout - \'admin\'', 1),
(321, '2020-09-15 15:36:52', 'Login - \'admin\'', 1),
(322, '2020-09-15 16:31:00', 'Logout - \'admin\'', 1),
(323, '2020-09-15 16:34:51', 'Login - \'admin\'', 1),
(324, '2020-09-18 08:23:51', 'Login - \'admin\'', 1),
(325, '2020-09-18 09:32:40', 'Remainder - saved : ', 1),
(326, '2020-09-18 09:49:23', 'Remainder - saved : ', 1),
(327, '2020-09-18 10:05:26', 'Remainder - saved : ', 1),
(328, '2020-09-18 10:09:44', 'Remainder - deleted : ', 1),
(329, '2020-09-18 10:09:57', 'Remainder - updated : ', 1),
(330, '2020-09-18 11:25:05', 'Logout - \'admin\'', 1),
(331, '2020-09-18 11:25:09', 'Login - \'admin\'', 1),
(332, '2020-09-18 14:50:16', 'Login - \'admin\'', 1),
(333, '2020-09-18 16:28:10', 'Remainder - saved : ', 1),
(334, '2020-09-21 11:47:30', 'Login - \'admin\'', 1),
(335, '2020-09-21 15:04:18', 'Login - \'admin\'', 1),
(336, '2020-09-22 08:21:49', 'Login - \'admin\'', 1),
(337, '2020-09-22 12:55:59', 'Device Repair - saved', 1),
(338, '2020-09-22 13:01:14', 'Remainder - saved : ', 1),
(339, '2020-09-24 08:56:14', 'Login - \'admin\'', 1),
(340, '2020-09-24 09:40:32', 'JobClose - saved : ', 1),
(341, '2020-09-24 10:14:51', 'Remainder - saved : ', 1),
(342, '2020-09-24 10:43:16', 'Remainder - saved : ', 1),
(343, '2020-09-24 10:43:48', 'Remainder - saved : ', 1),
(344, '2020-09-24 10:58:40', 'Remainder - saved : ', 1),
(345, '2020-09-24 11:24:08', 'Remainder - saved : ', 1),
(346, '2020-09-24 11:25:25', 'Remainder - saved : ', 1),
(347, '2020-09-24 11:26:06', 'Remainder - saved : ', 1),
(348, '2020-09-24 11:26:17', 'Remainder - deleted : ', 1),
(349, '2020-09-24 11:26:30', 'Remainder - updated : ', 1),
(350, '2020-09-29 08:58:02', 'Login - \'admin\'', 1),
(351, '2020-09-29 09:58:27', 'GRN - saved:1', 1),
(352, '2020-09-29 09:58:27', 'Logout - \'admin\'', 1),
(353, '2020-09-29 09:58:31', 'Login - \'admin\'', 1),
(354, '2020-09-29 10:59:11', 'Allocation - saved : ', 1),
(355, '2020-09-29 11:09:01', 'Allocation - saved : ', 1),
(356, '2020-09-29 11:09:14', 'Allocation - deleted : ', 1),
(357, '2020-09-29 11:09:34', 'Allocation - updated : ', 1),
(358, '2020-09-29 11:33:35', 'Allocation - saved : ', 1),
(359, '2020-09-29 11:59:43', 'Allocation - saved : ', 1),
(360, '2020-09-29 12:53:47', 'Logout - \'admin\'', 1),
(361, '2020-09-29 12:53:50', 'Login - \'admin\'', 1),
(362, '2020-09-29 12:57:22', 'Allocation - saved : ', 1),
(363, '2020-09-29 12:57:55', 'Allocation - updated : ', 1),
(364, '2020-09-29 14:22:25', 'Allocation - saved : ', 1),
(365, '2020-09-29 14:47:48', 'GRN - saved:2', 1),
(366, '2020-09-29 15:04:02', 'Allocation - saved : ', 1),
(367, '2020-09-29 15:09:05', 'GRN - saved:3', 1),
(368, '2020-09-29 15:10:03', 'GRN - saved:4', 1),
(369, '2020-09-29 15:15:52', 'GRN - saved:5', 1),
(370, '2020-09-29 15:16:49', 'GRN - saved:6', 1),
(371, '2020-09-29 15:18:16', 'GRN - saved:7', 1),
(372, '2020-09-29 15:19:45', 'GRN - saved:8', 1),
(373, '2020-09-29 15:30:50', 'GRN - saved:11', 1),
(374, '2020-09-29 15:32:34', 'Allocation - saved : ', 1),
(375, '2020-09-29 15:33:35', 'GRN - saved:12', 1),
(376, '2020-09-29 15:34:09', 'Allocation - saved : ', 1),
(377, '2020-09-29 15:34:21', 'Allocation - saved : ', 1),
(378, '2020-09-29 15:41:20', 'GRN - saved:13', 1),
(379, '2020-09-29 15:41:40', 'Allocation - saved : ', 1),
(380, '2020-09-30 08:29:36', 'Logout - \'admin\'', 1),
(381, '2020-09-30 08:34:29', 'Login - \'admin\'', 1),
(382, '2020-09-30 08:38:51', 'GRN - saved:14', 1),
(383, '2020-09-30 08:40:33', 'GRN - saved:15', 1),
(384, '2020-09-30 08:41:55', 'GRN - saved:16', 1),
(385, '2020-09-30 08:42:14', 'Allocation - saved : ', 1),
(386, '2020-09-30 08:43:13', 'Allocation - saved : ', 1),
(387, '2020-09-30 08:45:10', 'GRN - saved:17', 1),
(388, '2020-09-30 08:55:55', 'Allocation - saved : ', 1),
(389, '2020-09-30 08:56:27', 'Allocation - saved : ', 1),
(390, '2020-09-30 08:56:51', 'Allocation - saved : ', 1),
(391, '2020-09-30 08:57:04', 'Allocation - saved : ', 1),
(392, '2020-09-30 09:00:03', 'Allocation - saved : ', 1),
(393, '2020-09-30 09:37:17', 'Logout - \'admin\'', 1),
(394, '2020-09-30 09:37:26', 'Login - \'admin\'', 1),
(395, '2020-09-30 10:57:22', 'Logout - \'admin\'', 1),
(396, '2020-09-30 10:57:44', 'Login - \'admin\'', 1),
(397, '2020-09-30 11:11:31', 'Login - \'admin\'', 1),
(398, '2020-09-30 11:22:06', 'brand saved', 1),
(399, '2020-09-30 11:22:27', 'Role - deleted : test11', 1),
(400, '2020-09-30 11:23:14', 'Brand - deleted : ', 1),
(401, '2020-09-30 11:27:09', 'Brand _ saved : ', 1),
(402, '2020-09-30 11:27:40', 'Brand _ saved : ', 1),
(403, '2020-09-30 11:29:25', 'Brand _ saved : ', 1),
(404, '2020-09-30 11:34:51', 'Discription - saved : ', 1),
(405, '2020-09-30 11:36:26', 'Discription - saved : ', 1),
(406, '2020-09-30 11:36:44', 'Discription - saved : ', 1),
(407, '2020-09-30 11:36:57', 'Discription - deleted : ', 1),
(408, '2020-09-30 11:37:12', 'Discription - updated : ', 1),
(409, '2020-09-30 15:05:17', 'Login - \'admin\'', 1),
(410, '2020-10-09 21:18:16', 'Logout - \'admin\'', 1),
(411, '2020-10-12 10:21:56', 'Login - \'admin\'', 1),
(412, '2020-10-13 15:44:17', 'Logout - \'admin\'', 1),
(413, '2020-10-13 15:44:21', 'Login - \'admin\'', 1),
(414, '2020-10-13 15:56:41', 'Device Repair - saved', 1),
(415, '2020-10-13 15:59:04', 'Device Repair - saved', 1),
(416, '2020-10-13 16:04:30', 'Product - saved : testing', 1),
(417, '2020-10-13 16:05:12', 'RepairStatus saved', 1),
(418, '2020-10-13 16:06:09', 'Brand _ saved : ', 1),
(419, '2020-10-13 16:07:03', 'Device Repair - saved', 1),
(420, '2020-10-13 16:11:08', 'Brand _ saved : ', 1),
(421, '2020-10-13 16:11:55', 'Device Repair - saved', 1),
(422, '2020-10-13 16:18:39', 'Device Repair - saved', 1),
(423, '2020-10-13 16:39:38', 'Device Repair - saved', 1),
(424, '2020-10-13 17:08:24', 'Product - saved : testing', 1),
(425, '2020-10-13 17:08:42', 'Product - updated : testing', 1),
(426, '2020-10-13 19:04:22', 'Login - \'admin\'', 1),
(427, '2020-10-14 09:27:13', 'Login - \'admin\'', 1),
(428, '2020-10-14 09:55:06', 'Location - saved : test', 1),
(429, '2020-10-14 09:55:18', 'Location - updated : test 01', 1),
(430, '2020-10-14 10:06:22', 'Product - saved : test 002', 1),
(431, '2020-10-14 10:06:48', 'Product - updated : test 002', 1),
(432, '2020-10-15 13:42:49', 'Login - \'admin\'', 1),
(433, '2020-10-15 13:44:43', 'Location - saved : Store Location One', 1),
(434, '2020-10-15 13:45:01', 'Location - deleted : Store Location One', 1),
(435, '2020-10-15 13:49:40', 'Repair - deleted:', 1),
(436, '2020-10-15 15:19:39', 'Logout - \'admin\'', 1),
(437, '2020-10-15 15:19:42', 'Login - \'admin\'', 1),
(438, '2020-10-15 15:20:12', 'Category saved - DISPLAY', 1),
(439, '2020-10-15 15:20:25', 'Category deleted - test11', 1),
(440, '2020-10-15 15:20:33', 'Category deleted - SYSTEM TEST CATEGORY', 1),
(441, '2020-10-15 15:22:32', 'Category saved - FULL SET DISPLAY', 1),
(442, '2020-10-15 15:22:52', 'Category saved - TOUCH PAD', 1),
(443, '2020-10-15 15:23:33', 'Location - saved : SMALL BOX', 1),
(444, '2020-10-15 15:24:25', 'Location - updated : PLASTIC SMALL BOX', 1),
(445, '2020-10-15 15:26:01', 'Product - saved : NOKIA 1110 DISPLAY', 1),
(446, '2020-10-15 15:26:38', 'Product - saved : NOKIA 1200 DISPLAY', 1),
(447, '2020-10-15 15:27:54', 'Product - saved : NOKIA 1208 DISPLAY', 1),
(448, '2020-10-15 15:28:19', 'Product - updated : NOKIA 1200 DISPLAY', 1),
(449, '2020-10-15 15:30:49', 'Product - saved : NOKIA 1202,1280 DISPLAY', 1),
(450, '2020-10-15 15:31:43', 'Product - saved : NOKIA 1616 DISPLAY', 1),
(451, '2020-10-15 15:33:43', 'Product - saved : NOKIA 1661  DISPLAY', 1),
(452, '2020-10-15 15:34:31', 'Location - updated : SMALL PLASTIC  BOX', 1),
(453, '2020-10-15 15:36:05', 'Product - saved : NOKIA C1 DISPLAY', 1),
(454, '2020-10-15 15:39:09', 'Product - saved : NOKIA 105 DISPLAY', 1),
(455, '2020-10-15 15:39:58', 'Product - saved : NOKIA 105 2017 DISPLAY', 1),
(456, '2020-10-15 15:45:03', 'Supplier - saved : TRANS ASIA', 1),
(457, '2020-10-15 15:46:27', 'Supplier - updated : ASIA ELECTRONIC', 1),
(458, '2020-10-15 15:47:28', 'Supplier - saved : SP ELECTRONICS', 1),
(459, '2020-10-15 15:51:32', 'Login - \'admin\'', 1),
(460, '2020-10-15 18:54:07', 'Login - \'admin\'', 1),
(461, '2020-10-15 19:54:58', 'Logout - \'admin\'', 1),
(462, '2020-10-15 19:55:00', 'Login - \'admin\'', 1),
(463, '2020-10-15 19:56:20', 'GRN - deleted:1', 1),
(464, '2020-10-15 19:56:26', 'GRN - deleted:2', 1),
(465, '2020-10-15 19:56:32', 'GRN - deleted:3', 1),
(466, '2020-10-15 19:56:37', 'GRN - deleted:4', 1),
(467, '2020-10-15 19:56:43', 'GRN - deleted:5', 1),
(468, '2020-10-15 19:56:48', 'GRN - deleted:17', 1),
(469, '2020-10-15 19:56:56', 'GRN - deleted:16', 1),
(470, '2020-10-15 19:57:02', 'GRN - deleted:15', 1),
(471, '2020-10-15 19:57:08', 'GRN - deleted:14', 1),
(472, '2020-10-15 19:57:14', 'GRN - deleted:13', 1),
(473, '2020-10-15 19:57:20', 'GRN - deleted:12', 1),
(474, '2020-10-15 19:57:26', 'GRN - deleted:11', 1),
(475, '2020-10-15 19:57:32', 'GRN - deleted:8', 1),
(476, '2020-10-15 19:57:38', 'GRN - deleted:6', 1),
(477, '2020-10-15 19:57:47', 'GRN - deleted:7', 1),
(478, '2020-10-15 20:50:39', 'Logout - \'admin\'', 1),
(479, '2020-10-15 20:50:42', 'Login - \'admin\'', 1),
(480, '2020-10-15 21:08:39', 'Product - updated : NOKIA 1202,1280 DISPLAY', 1),
(481, '2020-10-15 21:22:09', 'GRN - saved:18', 1),
(482, '2020-10-15 21:36:46', 'GRN - saved:19', 1),
(483, '2020-10-15 23:53:46', 'GRN - saved:20', 1),
(484, '2020-10-15 23:53:47', 'Logout - \'admin\'', 1),
(485, '2020-10-15 23:58:34', 'Login - \'admin\'', 1),
(486, '2020-10-16 00:32:10', 'Product - updated : NOKIA 1110i OLD DISPLAY', 1),
(487, '2020-10-16 09:44:18', 'Login - \'admin\'', 1),
(488, '2020-10-16 09:46:07', 'GRN - saved:21', 1),
(489, '2020-10-16 11:27:44', 'Logout - \'admin\'', 1),
(490, '2020-10-16 11:27:46', 'Login - \'admin\'', 1),
(491, '2020-10-16 11:36:17', 'Product - saved : NOKIA 3110C DISPLAY', 1),
(492, '2020-10-16 11:39:27', 'GRN - saved:22', 1),
(493, '2020-10-16 11:42:27', 'Product - saved : NOKIA 5000,5130 DISPLAY', 1),
(494, '2020-10-16 11:50:59', 'GRN - saved:23', 1),
(495, '2020-10-16 11:52:56', 'Product - saved : NOKIA X2-02 DISPLAY', 1),
(496, '2020-10-16 11:54:57', 'GRN - saved:24', 1),
(497, '2020-10-16 12:01:32', 'Product - saved : NOKIA X3-02,C3-01,208 DISPLAY', 1),
(498, '2020-10-16 12:05:31', 'GRN - saved:25', 1),
(499, '2020-10-16 12:07:38', 'Product - saved : NOKIA X2,X3,C5 DISPLAY,', 1),
(500, '2020-10-16 12:09:09', 'GRN - saved:26', 1),
(501, '2020-10-16 12:13:10', 'GRN - saved:27', 1),
(502, '2020-10-16 12:21:06', 'Product - saved : NOKIA 1650 DISPLAY', 1),
(503, '2020-10-16 12:22:37', 'GRN - saved:28', 1),
(504, '2020-10-16 12:27:18', 'Login - \'admin\'', 1),
(505, '2020-10-17 11:22:46', 'Login - \'admin\'', 1),
(506, '2020-10-17 13:11:24', 'Logout - \'admin\'', 1),
(507, '2020-10-17 13:11:27', 'Login - \'admin\'', 1),
(508, '2020-10-17 13:47:11', 'Logout - \'admin\'', 1),
(509, '2020-10-17 13:47:13', 'Login - \'admin\'', 1),
(510, '2020-10-17 13:52:05', 'Product - saved : NOKIA 6070 DISPLAY', 1),
(511, '2020-10-17 13:58:11', 'GRN - saved:29', 1),
(512, '2020-10-17 14:09:13', 'Product - saved : NOKIA 1600 DISPLAY', 1),
(513, '2020-10-17 14:15:17', 'GRN - saved:30', 1),
(514, '2020-10-17 14:28:04', 'Product - saved : NOKIA 6300 DISPLAY', 1),
(515, '2020-10-17 14:30:54', 'GRN - saved:31', 1),
(516, '2020-10-17 14:45:36', 'Product - saved : NOKIA ASHA 225,5301 DISPLAY', 1),
(517, '2020-10-17 14:46:16', 'Product - saved : NOKIA 220 DISPLAY', 1),
(518, '2020-10-17 14:47:51', 'Product - saved : NOKIA RM 1190,216 DISPLAY', 1),
(519, '2020-10-17 14:50:34', 'Product - saved : NOKIA 3310-2017 NEW DISPLAY', 1),
(520, '2020-10-17 14:54:39', 'GRN - saved:32', 1),
(521, '2020-10-17 15:49:31', 'Login - \'admin\'', 1),
(522, '2020-10-17 18:31:51', 'Logout - \'admin\'', 1),
(523, '2020-10-17 18:31:53', 'Login - \'admin\'', 1),
(524, '2020-10-17 18:45:56', 'Product - saved : NOKIA ASHA 311  DISPLAY', 1),
(525, '2020-10-17 18:46:46', 'GRN - saved:33', 1),
(526, '2020-10-17 18:49:09', 'Product - saved : NOKIA LUMIA 520 DISPLAY', 1),
(527, '2020-10-17 18:49:50', 'GRN - saved:34', 1),
(528, '2020-10-17 20:38:27', 'Login - \'admin\'', 1),
(529, '2020-10-17 21:16:18', 'Logout - \'admin\'', 1),
(530, '2020-10-17 21:16:20', 'Login - \'admin\'', 1),
(531, '2020-10-17 21:21:51', 'Location - saved : 04 DRAWER CUPBOARD 1 DRAWER 03', 1),
(532, '2020-10-17 21:23:56', 'Product - saved : NOKIA LUMIA 430 DISPLAY', 1),
(533, '2020-10-17 21:26:17', 'GRN - saved:35', 1),
(534, '2020-10-17 21:34:00', 'Product - saved : NOKIA LUMIA 535 DISPLAY', 1),
(535, '2020-10-17 21:36:08', 'Product - saved : NOKIA XL DISPLAY', 1),
(536, '2020-10-17 21:37:51', 'Product - saved : LUMIA 640 FULL SET DISPLAY', 1),
(537, '2020-10-17 21:43:41', 'Product - saved : NOKIA LUMIA 535 2C  TOUCH PAD', 1),
(538, '2020-10-17 21:44:42', 'Product - saved : NOKIA LUMIA 535 2S TOUCH PAD', 1),
(539, '2020-10-17 21:46:20', 'Product - saved : NOKIA LUMIA 625 TOUCH PAD', 1),
(540, '2020-10-17 21:48:57', 'Product - saved : NOKIA XL TOUCH PAD', 1),
(541, '2020-10-17 21:51:47', 'Product - saved : NOKIA LUMIA 430 TOUH PAD', 1),
(542, '2020-10-17 21:53:25', 'Product - saved : NOKIA ASHA 503 TOUCH', 1),
(543, '2020-10-17 21:53:51', 'Product - updated : NOKIA ASHA 503 TOUCH PAD', 1),
(544, '2020-10-17 22:06:22', 'Product - saved : NOKIA X TOUCH', 1),
(545, '2020-10-17 22:09:21', 'Product - saved : LUMIA 435 TOUCH PAD', 1),
(546, '2020-10-17 22:10:25', 'Product - saved : NOKIA LUMIA 530 TOUCH PAD', 1),
(547, '2020-10-17 22:11:25', 'Product - saved : NOKIA LUMIA 501 TOUCH PAD', 1),
(548, '2020-10-17 22:12:17', 'Category saved - TOUCH PAD WITH FRAME', 1),
(549, '2020-10-17 22:13:33', 'Product - saved : NOKIA LUMIA 520,525 TOUCH WITH FRAME', 1),
(550, '2020-10-17 22:15:24', 'Product - saved : NOKIA ASHA 309 TOUCH PAD', 1),
(551, '2020-10-17 22:16:51', 'Product - saved : NOKIA 5800 TOUCH PAD', 1),
(552, '2020-10-17 22:18:21', 'Product - saved : NOKIA ASHA 311 TOUCH', 1),
(553, '2020-10-17 22:20:52', 'Product - saved : NOKIA ASHA 305 TOUCH PAD', 1),
(554, '2020-10-17 22:22:48', 'Product - saved : NOKIA C2-02 TOUCH PAD', 1),
(555, '2020-10-17 22:25:22', 'Product - saved : NOKIA ASHA 202 TOUCH', 1),
(556, '2020-10-17 22:25:46', 'Product - updated : NOKIA C2-02 TOUCH PAD', 1),
(557, '2020-10-17 22:26:03', 'Product - updated : NOKIA LUMIA 535 2C  TOUCH PAD', 1),
(558, '2020-10-17 22:26:21', 'Product - updated : NOKIA ASHA 311 TOUCH', 1),
(559, '2020-10-17 22:26:36', 'Product - updated : NOKIA ASHA 202 TOUCH', 1),
(560, '2020-10-17 22:27:50', 'Product - saved : NOKIA N8 DISPLAY', 1),
(561, '2020-10-17 22:28:41', 'Product - saved : NOKIA ASHA 308 TOUCH PAD', 1),
(562, '2020-10-17 22:29:59', 'Product - saved : NOKIA 701 TOUCH', 1),
(563, '2020-10-17 22:32:43', 'Product - saved : NOKIA C5-02 TOUCH WITH FRAME', 1),
(564, '2020-10-17 23:58:35', 'Logout - \'admin\'', 1),
(565, '2020-10-17 23:58:37', 'Login - \'admin\'', 1),
(566, '2020-10-18 00:01:28', 'Location - saved : 04 DRAWER CUPBOARD 02 DRAWER 01', 1),
(567, '2020-10-18 00:01:55', 'Location - updated : 04 DRAWER CUPBOARD 01 - DRAWER 03', 1),
(568, '2020-10-18 00:02:12', 'Location - updated : 04 DRAWER CUPBOARD 02 - DRAWER 01', 1),
(569, '2020-10-19 14:10:09', 'Login - \'admin\'', 1),
(570, '2020-10-19 14:12:48', 'Product - saved : SAMSUNG I8262 DISPLAY', 1),
(571, '2020-10-19 14:13:46', 'Product - saved : SAMSUNG G360 DISPLAY', 1),
(572, '2020-10-19 14:16:18', 'Product - saved : SAMSUNG J105,J106 DISPLAY', 1),
(573, '2020-10-19 14:19:36', 'Product - saved : SAMSUNG G532 J2 PRIME DISPLAY', 1),
(574, '2020-10-19 14:28:50', 'Product - saved : SAMSUNG I9082  DISPLAY', 1),
(575, '2020-10-19 14:29:48', 'Product - saved : SAMSUNG I9060,I9082 DISPLAY', 1),
(576, '2020-10-19 14:31:30', 'Product - saved : SAMSUNG G530,G531 GRAND PRIME DISPLAY', 1),
(577, '2020-10-19 14:33:11', 'Product - saved : SAMSUNG G318  DISPLAY', 1),
(578, '2020-10-19 14:36:37', 'Product - saved : SAMSUNG S7582 DISPLAY', 1),
(579, '2020-10-19 14:42:26', 'Product - saved : SAMSUNG G313H DISPLAY', 1),
(580, '2020-10-19 15:28:27', 'Product - saved : SAMSUNG G313F DISPLAY', 1),
(581, '2020-10-19 15:28:28', 'Logout - \'admin\'', 1),
(582, '2020-10-19 15:28:30', 'Login - \'admin\'', 1),
(583, '2020-10-28 18:51:10', 'Login - \'admin\'', 1),
(584, '2020-10-28 19:18:02', 'Login - \'admin\'', 1),
(585, '2020-10-29 00:45:43', 'Logout - \'admin\'', 1),
(586, '2020-10-29 00:45:46', 'Login - \'admin\'', 1),
(587, '2020-10-29 00:50:52', 'JobCloseStatus - updated : ', 1),
(588, '2020-10-29 00:51:17', 'JobCloseStatus - updated : ', 1),
(589, '2020-10-29 00:51:27', 'JobCloseStatus - updated : ', 1),
(590, '2020-10-29 00:52:12', 'JobCloseStatus - updated : ', 1),
(591, '2020-10-29 00:53:27', 'JobCloseStatus - updated : ', 1),
(592, '2020-10-30 15:06:53', 'Login - \'admin\'', 1),
(593, '2020-10-31 19:28:35', 'Login - \'admin\'', 1),
(594, '2020-10-31 20:30:20', 'Logout - \'admin\'', 1),
(595, '2020-10-31 20:30:24', 'Login - \'admin\'', 1),
(596, '2020-10-31 21:20:17', 'Brand _ saved : ', 1),
(597, '2020-10-31 21:20:32', 'Brand _ saved : ', 1),
(598, '2020-10-31 21:20:44', 'Brand _ saved : ', 1),
(599, '2020-10-31 21:21:13', 'Brand - updated : ', 1),
(600, '2020-10-31 21:21:37', 'Brand - updated : ', 1),
(601, '2020-10-31 21:21:46', 'Brand _ saved : ', 1),
(602, '2020-10-31 21:21:58', 'Brand _ saved : ', 1),
(603, '2020-10-31 21:22:19', 'Brand _ saved : ', 1),
(604, '2020-10-31 21:24:59', 'Brand _ saved : ', 1),
(605, '2020-10-31 21:25:54', 'Brand _ saved : ', 1),
(606, '2020-10-31 21:26:04', 'Brand _ saved : ', 1),
(607, '2020-10-31 21:26:14', 'Brand _ saved : ', 1),
(608, '2020-10-31 21:26:27', 'Brand _ saved : ', 1),
(609, '2020-10-31 21:26:42', 'Brand _ saved : ', 1),
(610, '2020-10-31 21:26:59', 'Brand _ saved : ', 1),
(611, '2020-10-31 21:27:16', 'Brand - updated : ', 1),
(612, '2020-10-31 21:27:27', 'Brand _ saved : ', 1),
(613, '2020-10-31 21:30:35', 'DeviceFault saved - ', 1),
(614, '2020-10-31 21:31:31', 'Batch updated - ', 1),
(615, '2020-10-31 21:31:59', 'Batch updated - ', 1),
(616, '2020-10-31 21:32:14', 'Batch updated - ', 1),
(617, '2020-10-31 21:33:18', 'Batch updated - ', 1),
(618, '2020-10-31 21:33:46', 'Batch updated - ', 1),
(619, '2020-10-31 21:35:54', 'Batch updated - ', 1),
(620, '2020-10-31 21:37:43', 'Batch updated - ', 1),
(621, '2020-10-31 21:38:08', 'Batch updated - ', 1),
(622, '2020-10-31 21:39:37', 'DeviceFault saved - ', 1),
(623, '2020-10-31 21:41:49', 'DeviceFault saved - ', 1),
(624, '2020-10-31 21:42:16', 'DeviceFault saved - ', 1),
(625, '2020-10-31 21:44:38', 'Batch updated - ', 1),
(626, '2020-10-31 21:46:20', 'Batch updated - ', 1),
(627, '2020-10-31 21:47:55', 'DeviceFault saved - ', 1),
(628, '2020-10-31 21:48:07', 'DeviceFault saved - ', 1),
(629, '2020-10-31 21:48:35', 'DeviceFault saved - ', 1),
(630, '2020-10-31 21:48:54', 'DeviceFault saved - ', 1),
(631, '2020-10-31 21:49:12', 'DeviceFault saved - ', 1),
(632, '2020-10-31 21:49:25', 'DeviceFault saved - ', 1),
(633, '2020-10-31 21:50:02', 'DeviceFault saved - ', 1),
(634, '2020-10-31 21:50:16', 'DeviceFault saved - ', 1),
(635, '2020-10-31 21:51:09', 'DeviceFault saved - ', 1),
(636, '2020-10-31 21:54:07', 'DeviceFault saved - ', 1),
(637, '2020-10-31 21:56:10', 'Batch updated - ', 1),
(638, '2020-10-31 21:56:55', 'Batch updated - ', 1),
(639, '2020-10-31 21:57:59', 'Batch updated - ', 1),
(640, '2020-10-31 22:00:10', 'Batch updated - ', 1),
(641, '2020-10-31 22:00:54', 'Batch updated - ', 1),
(642, '2020-10-31 22:04:24', 'Batch updated - ', 1),
(643, '2020-10-31 22:06:22', 'Batch updated - ', 1),
(644, '2020-10-31 22:06:53', 'Batch updated - ', 1),
(645, '2020-10-31 22:07:08', 'Batch updated - ', 1),
(646, '2020-10-31 22:07:21', 'Batch updated - ', 1),
(647, '2020-10-31 22:08:27', 'Batch updated - ', 1),
(648, '2020-10-31 22:09:43', 'Batch updated - ', 1),
(649, '2020-10-31 22:10:23', 'Batch updated - ', 1),
(650, '2020-10-31 22:11:16', 'Batch updated - ', 1),
(651, '2020-10-31 22:12:44', 'Batch updated - ', 1),
(652, '2020-10-31 22:13:19', 'DeviceFault saved - ', 1),
(653, '2020-10-31 22:13:35', 'DeviceFault saved - ', 1),
(654, '2020-10-31 22:13:43', 'DeviceFault saved - ', 1),
(655, '2020-10-31 22:14:47', 'DeviceFault saved - ', 1),
(656, '2020-10-31 22:15:00', 'DeviceFault saved - ', 1),
(657, '2020-10-31 22:15:14', 'DeviceFault saved - ', 1),
(658, '2020-10-31 22:15:26', 'DeviceFault saved - ', 1),
(659, '2020-10-31 22:15:34', 'DeviceFault saved - ', 1),
(660, '2020-10-31 22:16:29', 'DeviceFault saved - ', 1),
(661, '2020-10-31 22:17:06', 'DeviceFault saved - ', 1),
(662, '2020-10-31 22:17:43', 'DeviceFault saved - ', 1),
(663, '2020-10-31 22:18:24', 'DeviceFault saved - ', 1),
(664, '2020-10-31 22:19:33', 'DeviceFault saved - ', 1),
(665, '2020-10-31 22:19:56', 'DeviceFault saved - ', 1),
(666, '2020-10-31 22:21:22', 'DeviceFault saved - ', 1),
(667, '2020-10-31 22:21:49', 'DeviceFault saved - ', 1),
(668, '2020-10-31 22:22:37', 'Batch updated - ', 1),
(669, '2020-10-31 22:25:13', 'Batch updated - ', 1),
(670, '2020-10-31 22:27:22', 'Batch updated - ', 1),
(671, '2020-10-31 22:29:32', 'Batch updated - ', 1),
(672, '2020-10-31 22:30:30', 'DeviceFault saved - ', 1),
(673, '2020-10-31 22:35:30', 'Batch updated - ', 1),
(674, '2020-10-31 22:35:53', 'Batch updated - ', 1),
(675, '2020-10-31 22:37:30', 'CollectedAccessories saved - ', 1),
(676, '2020-10-31 22:37:49', 'Batch updated - ', 1),
(677, '2020-10-31 22:38:13', 'Batch updated - ', 1),
(678, '2020-10-31 22:38:36', 'Batch updated - ', 1),
(679, '2020-10-31 22:38:53', 'Batch updated - ', 1),
(680, '2020-10-31 22:39:12', 'CollectedAccessories saved - ', 1),
(681, '2020-10-31 22:39:24', 'Batch updated - ', 1),
(682, '2020-10-31 22:39:50', 'CollectedAccessories saved - ', 1),
(683, '2020-10-31 22:40:13', 'CollectedAccessories saved - ', 1),
(684, '2020-10-31 22:41:03', 'PossibleSolution saved - ', 1),
(685, '2020-10-31 22:41:20', 'Batch updated - ', 1),
(686, '2020-10-31 22:41:30', 'Batch updated - ', 1),
(687, '2020-10-31 22:42:23', 'Batch updated - ', 1),
(688, '2020-10-31 23:43:22', 'Logout - \'admin\'', 1),
(689, '2020-10-31 23:43:24', 'Login - \'admin\'', 1),
(690, '2020-10-31 23:45:18', 'RepairStatus saved', 1),
(691, '2020-10-31 23:46:11', 'RepairStatus saved', 1),
(692, '2020-10-31 23:46:33', 'RepairStatus - updated : ', 1),
(693, '2020-10-31 23:48:35', 'JobCloseStatus - saved : ', 1),
(694, '2020-10-31 23:48:50', 'JobCloseStatus - updated : ', 1),
(695, '2020-10-31 23:49:09', 'JobCloseStatus - updated : ', 1),
(696, '2020-10-31 23:50:42', 'JobCloseStatus - updated : ', 1),
(697, '2020-10-31 23:50:58', 'JobCloseStatus - deleted : 111', 1),
(698, '2020-10-31 23:51:02', 'JobCloseStatus - deleted : sedfgwsetgw', 1),
(699, '2020-10-31 23:51:06', 'JobCloseStatus - deleted : gfdhgdb11111111111111', 1),
(700, '2020-10-31 23:51:16', 'JobCloseStatus - deleted : Done & Deivered', 1),
(701, '2020-10-31 23:57:33', 'JobCloseStatus - updated : ', 1),
(702, '2020-10-31 23:57:57', 'JobCloseStatus - updated : ', 1),
(703, '2020-10-31 23:58:09', 'JobCloseStatus - updated : ', 1),
(704, '2020-10-31 23:58:17', 'JobCloseStatus - updated : ', 1),
(705, '2020-11-01 00:28:28', 'DeviceModel saved - ', 1),
(706, '2020-11-01 00:28:42', 'DeviceModel updated - ', 1),
(707, '2020-11-01 00:28:50', 'DeviceModel updated - ', 1),
(708, '2020-11-01 00:29:15', 'DeviceModel updated - ', 1),
(709, '2020-11-01 00:29:32', 'DeviceModel updated - ', 1),
(710, '2020-11-01 00:29:48', 'DeviceModel updated - ', 1),
(711, '2020-11-01 00:30:17', 'DeviceModel saved - ', 1),
(712, '2020-11-01 00:30:48', 'DeviceModel saved - ', 1),
(713, '2020-11-01 00:31:11', 'DeviceModel saved - ', 1),
(714, '2020-11-01 00:31:40', 'DeviceModel saved - ', 1),
(715, '2020-11-01 00:31:51', 'DeviceModel saved - ', 1),
(716, '2020-11-01 00:32:36', 'DeviceModel saved - ', 1),
(717, '2020-11-01 00:33:01', 'DeviceModel saved - ', 1),
(718, '2020-11-01 00:33:28', 'DeviceModel saved - ', 1),
(719, '2020-11-01 00:33:43', 'DeviceModel updated - ', 1),
(720, '2020-11-01 00:34:04', 'DeviceModel saved - ', 1),
(721, '2020-11-01 12:48:45', 'Login - \'admin\'', 1),
(722, '2020-11-01 16:08:14', 'Login - \'admin\'', 1),
(723, '2020-11-01 16:50:57', 'Location Number - updated : ', 1),
(724, '2020-11-01 16:51:19', 'Location Number - updated : ', 1),
(725, '2020-11-01 16:51:57', 'Location Number - updated : ', 1),
(726, '2020-11-01 16:52:39', 'Location Number - updated : ', 1),
(727, '2020-11-01 16:53:20', 'Location Number - updated : ', 1),
(728, '2020-11-06 19:28:59', 'Login - \'admin\'', 1),
(729, '2020-11-07 00:04:10', 'Login - \'admin\'', 1),
(730, '2020-11-07 00:08:10', 'DeviceModel saved - ', 1),
(731, '2020-11-07 00:08:23', 'DeviceModel saved - ', 1),
(732, '2020-11-07 00:08:34', 'DeviceModel saved - ', 1),
(733, '2020-11-07 00:08:46', 'DeviceModel saved - ', 1),
(734, '2020-11-07 00:11:39', 'Device Repair - saved', 1),
(735, '2020-11-07 00:21:09', 'DeviceModel saved - ', 1),
(736, '2020-11-07 00:26:14', 'Device Repair - saved', 1),
(737, '2020-11-07 09:46:02', 'Login - \'admin\'', 1),
(738, '2020-11-07 09:48:29', 'DeviceModel updated - ', 1),
(739, '2020-11-07 09:49:06', 'DeviceModel updated - ', 1),
(740, '2020-11-07 09:49:21', 'DeviceModel updated - ', 1),
(741, '2020-11-07 09:49:35', 'DeviceModel updated - ', 1),
(742, '2020-11-09 14:16:34', 'Logout - \'admin\'', 1),
(743, '2020-11-09 14:16:38', 'Login - \'admin\'', 1),
(744, '2020-11-09 14:18:04', 'PaymentClose - saved : ', 1),
(745, '2020-11-09 14:18:15', 'PaymentClose - deleted : ', 1),
(746, '2020-11-09 15:28:15', 'Logout - \'admin\'', 1),
(747, '2020-11-09 15:28:18', 'Login - \'admin\'', 1),
(748, '2020-11-10 21:47:56', 'Login - \'admin\'', 1),
(749, '2020-11-10 22:24:25', 'JobClose - saved : ', 1),
(750, '2020-11-10 22:28:38', 'JobClose - saved : ', 1),
(751, '2020-11-11 00:26:23', 'Logout - \'admin\'', 1),
(752, '2020-11-11 00:26:27', 'Login - \'admin\'', 1),
(753, '2020-11-11 12:54:01', 'Login - \'admin\'', 1),
(754, '2020-11-11 21:27:01', 'Login - \'admin\'', 1),
(755, '2020-11-11 22:16:18', 'Logout - \'admin\'', 1),
(756, '2020-11-11 22:16:22', 'Login - \'admin\'', 1),
(757, '2020-11-11 22:43:34', 'Device Repair - saved', 1),
(758, '2020-11-11 23:54:48', 'Logout - \'admin\'', 1),
(759, '2020-11-11 23:54:51', 'Login - \'admin\'', 1),
(760, '2020-11-12 22:46:26', 'Login - \'admin\'', 1);

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(1, 'Sampath Bank'),
(2, 'Commercial Bank'),
(3, 'HNB Bank'),
(4, 'NSB Bank'),
(5, 'BOC Bank'),
(6, 'Amana Bank'),
(7, 'Axis Bank'),
(8, 'Cargills Bank'),
(9, 'Citibank N.A.'),
(10, 'Deutsche Bank AG'),
(11, 'DFCC Bank'),
(12, 'Habib Bank'),
(13, 'ICICI Bank'),
(14, 'Indian Bank'),
(15, 'Indian Overseas Bank'),
(16, 'MCB Bank Ltd'),
(17, 'National Development Bank'),
(18, 'Nations Trust Bank'),
(19, 'Pan Asia Banking Corporation'),
(20, 'People\'s Bank'),
(21, 'Public Bank Berhad'),
(22, 'Seylan Bank'),
(23, 'Standard Chartered Bank'),
(24, 'State Bank of India'),
(25, 'HSBC '),
(26, 'Union Bank'),
(27, 'HDFC '),
(28, 'Lankaputhra Development Bank'),
(29, 'RDB (Regional Development)'),
(30, 'SDB (Sanasa Development)'),
(31, 'SLS (Sri Lanka Savings)'),
(32, 'SMIB (State Mortgage & Investment)');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `mfd` date DEFAULT NULL,
  `exp` date DEFAULT NULL,
  `cost` decimal(12,2) DEFAULT NULL,
  `retail_price` decimal(12,2) DEFAULT NULL,
  `wholesale_price` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `product_id`, `code`, `mfd`, `exp`, `cost`, `retail_price`, `wholesale_price`) VALUES
(1, 2, '1', NULL, NULL, '555.00', '5552.00', '555.00'),
(2, 4, '2', NULL, NULL, '300.00', '600.00', '500.00'),
(3, 4, '3', NULL, NULL, '250.00', '500.00', '450.00'),
(4, 8, '4', NULL, NULL, '300.00', '700.00', '600.00'),
(5, 5, '6', NULL, NULL, '450.00', '750.00', '600.00'),
(6, 9, '5', NULL, NULL, '500.00', '850.00', '650.00'),
(7, 7, '7', NULL, NULL, '500.00', '850.00', '700.00'),
(8, 1, '8', NULL, NULL, '400.00', '650.00', '500.00'),
(9, 10, '9', NULL, NULL, '500.00', '750.00', '650.00'),
(10, 11, '10', NULL, NULL, '600.00', '950.00', '800.00'),
(11, 12, '11', NULL, NULL, '600.00', '1200.00', '850.00'),
(12, 13, '12', NULL, NULL, '700.00', '1200.00', '1000.00'),
(13, 14, '13', NULL, NULL, '800.00', '1200.00', '1000.00'),
(14, 6, '14', NULL, NULL, '400.00', '600.00', '500.00'),
(15, 15, '15', NULL, NULL, '600.00', '950.00', '800.00'),
(16, 16, '16', NULL, NULL, '600.00', '950.00', '750.00'),
(17, 17, '17', NULL, NULL, '600.00', '950.00', '750.00'),
(18, 18, '18', NULL, NULL, '700.00', '1200.00', '1000.00'),
(19, 19, '19', NULL, NULL, '900.00', '1400.00', '1100.00'),
(20, 20, '20', NULL, NULL, '800.00', '1200.00', '1000.00'),
(21, 21, '21', NULL, NULL, '800.00', '1200.00', '1000.00'),
(22, 22, '22', NULL, NULL, '800.00', '1200.00', '1000.00'),
(23, 23, '23', NULL, NULL, '1000.00', '1600.00', '1300.00'),
(24, 23, '24', NULL, NULL, '1200.00', '1850.00', '1650.00'),
(25, 25, '25', NULL, NULL, '1000.00', '1850.00', '1600.00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'NOKIA'),
(2, 'MOTOROLA'),
(3, 'SAMSUNG'),
(4, 'HUAWEI'),
(5, 'HTC'),
(6, 'OPPO'),
(7, 'VIVO'),
(8, 'XIAOMI'),
(9, 'REALME'),
(10, 'MICROMAX'),
(11, 'ZIGO'),
(12, 'INTEX'),
(13, 'I TEL'),
(14, 'C TEL'),
(15, 'E TEL');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'DISPLAY'),
(4, 'FULL SET DISPLAY'),
(5, 'TOUCH PAD'),
(6, 'TOUCH PAD WITH FRAME');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `cheque_no` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cheque_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_status`
--

CREATE TABLE `cheque_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheque_status`
--

INSERT INTO `cheque_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done'),
(3, 'Canceled'),
(4, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `collected_accessories`
--

CREATE TABLE `collected_accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collected_accessories`
--

INSERT INTO `collected_accessories` (`id`, `name`) VALUES
(3, 'Battery'),
(5, 'Battery Cover'),
(6, 'Back Cover'),
(7, 'Sim Card'),
(8, 'Memory Card'),
(9, 'Charger'),
(10, 'Usb Cable');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_product`
--

CREATE TABLE `customer_order_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `customer_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_status`
--

CREATE TABLE `customer_order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order_status`
--

INSERT INTO `customer_order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `daily_expences`
--

CREATE TABLE `daily_expences` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `exp_date` date NOT NULL,
  `feed_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expence_cat` int(11) NOT NULL,
  `Note` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `day_start`
--

CREATE TABLE `day_start` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deliverer`
--

INSERT INTO `deliverer` (`id`, `name`, `number`, `route_id`) VALUES
(1, 'TEST LOCATON', 'TEST LOCATION ADDRESS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `deliverer_inventory`
--

CREATE TABLE `deliverer_inventory` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `deliverer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deliverer_user`
--

CREATE TABLE `deliverer_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deliverer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `name`) VALUES
(1, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `device_fault`
--

CREATE TABLE `device_fault` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_fault`
--

INSERT INTO `device_fault` (`id`, `name`) VALUES
(1, 'No Power'),
(2, 'Restart'),
(3, 'O/S Installing'),
(4, 'Software'),
(5, 'Logo Stuck'),
(6, 'Software Update'),
(7, 'Network Lock'),
(8, 'User Lock / Pattern Lock'),
(9, 'Frp / React / EE Lock'),
(10, 'Icloud Lock'),
(11, 'Display'),
(12, 'Touch Pad'),
(13, 'Display & Touch Pad Full Set'),
(14, 'Display Ribbon'),
(15, 'Power Switch'),
(16, 'Power Switch Ribbon'),
(17, 'Volume Up / Down  Keys'),
(18, 'Volume Up / Dowen Key Ribbon'),
(19, 'Mic'),
(20, 'Ear Peas'),
(21, 'Speaker'),
(22, 'Battery Connector'),
(23, 'Charging Connector'),
(24, 'Charging Flex'),
(25, 'Not Charging'),
(26, 'Water Damage'),
(27, 'No Network'),
(28, 'Service'),
(29, 'Key Pad Not Woking'),
(30, 'H/F Not Working'),
(31, 'Sim Card Not Working'),
(32, 'Memory Card Not Working'),
(33, 'Front Camera Not Working'),
(34, 'Back Camera Not Working'),
(35, 'Bluetooth Not Working'),
(36, 'Wifi Not Working'),
(37, 'Battery Draining Fast');

-- --------------------------------------------------------

--
-- Table structure for table `device_model`
--

CREATE TABLE `device_model` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_model`
--

INSERT INTO `device_model` (`id`, `name`) VALUES
(1, 'Nokia 1100'),
(2, 'Nokia 1110'),
(3, 'Nokia 3310'),
(4, 'Nokia 1200'),
(5, 'Nokia 1100'),
(6, 'Nokia 1208'),
(7, 'Nokia 1202'),
(8, 'Nokia 1280'),
(9, 'Nokia 1616'),
(10, 'Nokia 1661'),
(11, 'Nokia C1 Old'),
(12, 'Nokia C2-00'),
(13, 'Nokia C2-02'),
(14, 'Nokia 1800'),
(15, 'A31'),
(16, 'A33'),
(17, 'A37'),
(18, 'A57'),
(19, 'J500- J5');

-- --------------------------------------------------------

--
-- Table structure for table `device_repair`
--

CREATE TABLE `device_repair` (
  `id` int(11) NOT NULL,
  `job_no` int(11) NOT NULL,
  `job_date` datetime NOT NULL,
  `system_date` datetime NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `product` int(11) NOT NULL,
  `device_model_id` int(11) NOT NULL,
  `imei_serial` varchar(500) NOT NULL,
  `location_number` int(200) NOT NULL,
  `job_cost` float NOT NULL,
  `advanced_payment` float NOT NULL,
  `brand_id` int(11) NOT NULL,
  `repair_status` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `image_top` varchar(1000) NOT NULL,
  `image_bottom` varchar(1000) NOT NULL,
  `image_right` varchar(1000) NOT NULL,
  `image_left` varchar(1000) NOT NULL,
  `image_front` varchar(1000) NOT NULL,
  `image_back` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_repair`
--

INSERT INTO `device_repair` (`id`, `job_no`, `job_date`, `system_date`, `customer_name`, `customer_address`, `id_number`, `contact_no`, `delivery_date`, `product`, `device_model_id`, `imei_serial`, `location_number`, `job_cost`, `advanced_payment`, `brand_id`, `repair_status`, `comment`, `image_top`, `image_bottom`, `image_right`, `image_left`, `image_front`, `image_back`) VALUES
(1, 2872, '2020-10-04 00:08:54', '2020-11-07 00:11:39', 'Priyantha', '', '', '0766525055', '2020-11-15 00:00:00', 18, 17, '', 3, 0, 0, 6, 5, '', '', '', '', '', '', ''),
(2, 2871, '2020-10-03 00:22:09', '2020-11-07 00:26:14', 'Thilina', '', '', '0770838186', '2020-11-20 00:00:00', 18, 19, '', 3, 0, 0, 3, 5, '', '', '', '', '', '', ''),
(3, 3, '2020-11-12 00:00:00', '2020-11-11 22:43:33', 'Dileep Prabath', '40/B Green View', '999', '999', '2020-11-11 00:00:00', 18, 13, '9999', 3, 99, 99, 11, 5, '999999999', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `discription`
--

CREATE TABLE `discription` (
  `id` int(11) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `price_discription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discription`
--

INSERT INTO `discription` (`id`, `discription`, `price_discription`) VALUES
(1, 'werfgwerg', 'rgrewg'),
(2, 'rhrthfgjhtgjm tkuyt', 'tgh tr nb09fbiknfgkhlgf,kn');

-- --------------------------------------------------------

--
-- Table structure for table `expence_cat`
--

CREATE TABLE `expence_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `grn_type_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`id`, `code`, `date_time`, `purchase_order_id`, `user_id`, `grn_type_id`, `supplier_id`) VALUES
(18, '18', '2020-10-15 21:08:51', NULL, 1, 1, 8),
(19, '19', '2020-10-15 21:23:08', NULL, 1, 1, 8),
(20, '20', '2020-10-15 23:04:01', NULL, 1, 1, 8),
(21, '21', '2020-10-16 09:44:29', NULL, 1, 1, 8),
(22, '22', '2020-10-16 11:38:35', NULL, 1, 1, 9),
(23, '23', '2020-10-16 11:49:34', NULL, 1, 1, 8),
(24, '24', '2020-10-16 11:53:03', NULL, 1, 1, 8),
(25, '25', '2020-10-16 12:01:45', NULL, 1, 1, 8),
(26, '26', '2020-10-16 12:08:21', NULL, 1, 1, 8),
(27, '27', '2020-10-16 12:11:59', NULL, 1, 1, 8),
(28, '28', '2020-10-16 12:21:17', NULL, 1, 1, 8),
(29, '29', '2020-10-17 13:57:07', NULL, 1, 1, 8),
(30, '30', '2020-10-17 14:14:19', NULL, 1, 1, 9),
(31, '31', '2020-10-17 14:28:11', NULL, 1, 1, 8),
(32, '32', '2020-10-17 14:50:52', NULL, 1, 1, 8),
(33, '33', '2020-10-17 18:46:08', NULL, 1, 1, 8),
(34, '34', '2020-10-17 18:49:15', NULL, 1, 1, 8),
(35, '35', '2020-10-17 21:24:07', NULL, 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `grn_material`
--

CREATE TABLE `grn_material` (
  `id` int(11) NOT NULL,
  `grn_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `volume` decimal(10,3) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grn_product`
--

CREATE TABLE `grn_product` (
  `id` int(11) NOT NULL,
  `grn_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grn_product`
--

INSERT INTO `grn_product` (`id`, `grn_id`, `qty`, `user_id`, `batch_id`) VALUES
(18, 18, 20, 1, 2),
(19, 18, 17, 1, 3),
(20, 19, 25, 1, 4),
(21, 20, 5, 1, 5),
(22, 20, 6, 1, 6),
(23, 20, 6, 1, 7),
(24, 21, 8, 1, 8),
(25, 22, 11, 1, 9),
(26, 23, 7, 1, 10),
(27, 24, 6, 1, 11),
(28, 25, 9, 1, 12),
(29, 26, 4, 1, 13),
(30, 27, 6, 1, 14),
(31, 28, 8, 1, 15),
(32, 29, 6, 1, 16),
(33, 30, 6, 1, 17),
(34, 31, 5, 1, 18),
(35, 32, 15, 1, 19),
(36, 32, 6, 1, 20),
(37, 32, 5, 1, 21),
(38, 32, 5, 1, 22),
(39, 33, 3, 1, 23),
(40, 34, 4, 1, 24),
(41, 35, 2, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `grn_type`
--

CREATE TABLE `grn_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grn_type`
--

INSERT INTO `grn_type` (`id`, `name`) VALUES
(1, 'Product'),
(2, 'Material');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `batch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `qty`, `batch_id`, `product_id`) VALUES
(4, 0, 1, 2),
(5, 20, 2, 4),
(6, 17, 3, 4),
(7, 25, 4, 8),
(8, 5, 5, 5),
(9, 6, 6, 9),
(10, 6, 7, 7),
(11, 8, 8, 1),
(12, 11, 9, 10),
(13, 7, 10, 11),
(14, 6, 11, 12),
(15, 9, 12, 13),
(16, 4, 13, 14),
(17, 6, 14, 6),
(18, 8, 15, 15),
(19, 6, 16, 16),
(20, 6, 17, 17),
(21, 5, 18, 18),
(22, 15, 19, 19),
(23, 6, 20, 20),
(24, 5, 21, 21),
(25, 5, 22, 22),
(26, 3, 23, 23),
(27, 4, 24, 23),
(28, 2, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `reurn_invoice_id` int(11) DEFAULT NULL,
  `invoice_status_id` int(11) NOT NULL,
  `gross_amount` decimal(12,2) DEFAULT NULL,
  `net_amount` decimal(12,2) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `customer_order_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `invoice_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_condition_id` int(11) NOT NULL,
  `deliverer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_condition`
--

CREATE TABLE `invoice_condition` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_condition`
--

INSERT INTO `invoice_condition` (`id`, `name`) VALUES
(1, 'New'),
(2, 'Return');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_inventory`
--

CREATE TABLE `invoice_inventory` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `unit_discount` decimal(12,2) DEFAULT NULL,
  `gross_amount` decimal(12,2) DEFAULT NULL,
  `net_amount` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_return`
--

CREATE TABLE `invoice_return` (
  `id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text,
  `deliverer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_return_inventory`
--

CREATE TABLE `invoice_return_inventory` (
  `id` int(11) NOT NULL,
  `invoice_return_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `return_reason_id` int(11) NOT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_status`
--

CREATE TABLE `invoice_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_status`
--

INSERT INTO `invoice_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_type`
--

CREATE TABLE `invoice_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_type`
--

INSERT INTO `invoice_type` (`id`, `name`) VALUES
(1, 'Normal'),
(2, 'Retail');

-- --------------------------------------------------------

--
-- Table structure for table `job_close`
--

CREATE TABLE `job_close` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `comment` varchar(10000) NOT NULL,
  `customer` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `warranty` varchar(500) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_close`
--

INSERT INTO `job_close` (`id`, `status`, `repair_id`, `comment`, `customer`, `type`, `warranty`, `amount`) VALUES
(1, 3, 1, 'sds', '', '', '1', 0),
(2, 3, 2, 'kkjgtfm', '', '', '1', -3000);

-- --------------------------------------------------------

--
-- Table structure for table `job_close_status`
--

CREATE TABLE `job_close_status` (
  `id` int(11) NOT NULL,
  `name` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_close_status`
--

INSERT INTO `job_close_status` (`id`, `name`) VALUES
(3, 'Done & Deivered'),
(4, 'Done & Not Deivered'),
(5, 'Not Done & Returned');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`) VALUES
(1, 'SMALL PLASTIC  BOX'),
(3, 'SMALL BOX'),
(4, '04 DRAWER CUPBOARD 01 - DRAWER 03'),
(5, '04 DRAWER CUPBOARD 02 - DRAWER 01');

-- --------------------------------------------------------

--
-- Table structure for table `location_number`
--

CREATE TABLE `location_number` (
  `id` int(30) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_number`
--

INSERT INTO `location_number` (`id`, `name`) VALUES
(2, '06 Drawer Cupboard - Drawer 01 Done'),
(3, '06 Drawer Cupboard - Drawer 02 Pending'),
(4, '06 Drawer Cupboard - Drawer 03 Not Done'),
(6, '06 Drawer Cupboard - Drawer 04'),
(7, '06 Drawer Cupboard - Drawer 05 Shop 2');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_stock`
--

CREATE TABLE `material_stock` (
  `id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `volume` decimal(10,3) DEFAULT NULL,
  `grn_material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Privilege'),
(3, 'Designation'),
(4, 'Target'),
(5, 'Category'),
(6, 'Product'),
(7, 'Batch'),
(8, 'Material'),
(9, 'ProductionPlan'),
(10, 'Production'),
(11, 'Supplier'),
(12, 'Customer'),
(13, 'Route'),
(14, 'ProductPO'),
(15, 'MaterialPO'),
(16, 'ProductGRN'),
(17, 'MaterialGRN'),
(18, 'Invoice'),
(19, 'Payment'),
(20, 'Return'),
(21, 'Deliverer'),
(22, 'DelivererInventory'),
(23, 'MaterialStock'),
(24, 'Inventory'),
(25, 'Cheque'),
(26, 'Role');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `payment_method_id` int(11) NOT NULL,
  `payment_status_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_cheque`
--

CREATE TABLE `payment_cheque` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `cheque_id` int(11) NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_close`
--

CREATE TABLE `payment_close` (
  `id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `system_date` datetime NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `value` int(11) NOT NULL,
  `type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_invoice`
--

CREATE TABLE `payment_invoice` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Cheque'),
(3, 'Credit Note');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done'),
(3, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Invoice Payment'),
(2, 'Customer Payment');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash`
--

CREATE TABLE `petty_cash` (
  `id` int(11) NOT NULL,
  `reson` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `petty_date` datetime NOT NULL,
  `amount` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `possible_solution`
--

CREATE TABLE `possible_solution` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `possible_solution`
--

INSERT INTO `possible_solution` (`id`, `name`) VALUES
(2, 'Replace'),
(4, 'Check&Fix'),
(5, 'test11'),
(6, 's');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `view` tinyint(1) DEFAULT NULL,
  `ins` tinyint(1) DEFAULT NULL,
  `upd` tinyint(1) DEFAULT NULL,
  `del` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `role_id`, `module_id`, `view`, `ins`, `upd`, `del`) VALUES
(1, 1, 2, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1),
(10, 1, 10, 1, 1, 1, 1),
(11, 1, 11, 1, 1, 1, 1),
(12, 1, 12, 1, 1, 1, 1),
(13, 1, 13, 1, 1, 1, 1),
(14, 1, 14, 1, 1, 1, 1),
(15, 1, 15, 1, 1, 1, 1),
(16, 1, 16, 1, 1, 1, 1),
(17, 1, 17, 1, 1, 1, 1),
(18, 1, 18, 1, 1, 1, 1),
(19, 1, 19, 1, 1, 1, 1),
(20, 1, 20, 1, 1, 1, 1),
(21, 1, 21, 1, 1, 1, 1),
(22, 1, 22, 1, 1, 1, 1),
(23, 1, 23, 1, 1, 1, 1),
(24, 1, 24, 1, 1, 1, 1),
(25, 1, 25, 1, 1, 1, 1),
(26, 1, 26, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `roq` int(11) DEFAULT NULL,
  `max_qty` int(11) DEFAULT NULL,
  `min_qty` int(11) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `barcode` varchar(500) DEFAULT NULL,
  `warrenty_period` float NOT NULL DEFAULT '0',
  `image` varchar(200) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `roq`, `max_qty`, `min_qty`, `code`, `barcode`, `warrenty_period`, `image`, `location_id`) VALUES
(1, 'NOKIA 1110 DISPLAY', 3, 3, 15, 5, 'ITM-00001', '', 1, NULL, 1),
(2, 'NOKIA 1200 DISPLAY', 3, 3, 15, 5, 'ITM-00002', '', 1, NULL, 1),
(3, 'NOKIA 1208 DISPLAY', 3, 3, 15, 5, 'ITM-00003', '', 1, NULL, 1),
(4, 'NOKIA 1202,1280 DISPLAY', 3, 3, 50, 5, 'ITM-00004', '', 1, NULL, 1),
(5, 'NOKIA 1616 DISPLAY', 3, 3, 15, 5, 'ITM-00005', '', 1, NULL, 1),
(6, 'NOKIA 1110i OLD DISPLAY', 3, 3, 15, 5, 'ITM-00006', '', 1, NULL, 1),
(7, 'NOKIA C1 DISPLAY', 3, 3, 30, 5, 'ITM-00007', '', 1, NULL, 1),
(8, 'NOKIA 105 DISPLAY', 3, 3, 30, 5, 'ITM-00008', '', 0, NULL, 1),
(9, 'NOKIA 105 2017 DISPLAY', 3, 3, 30, 5, 'ITM-00009', '', 1, NULL, 1),
(10, 'NOKIA 3110C DISPLAY', 3, 3, 30, 5, 'ITM-00010', '', 1, NULL, 1),
(11, 'NOKIA 5000,5130 DISPLAY', 3, 3, 30, 5, 'ITM-00011', '', 1, NULL, 1),
(12, 'NOKIA X2-02 DISPLAY', 3, 3, 30, 5, 'ITM-00012', '', 1, NULL, 1),
(13, 'NOKIA X3-02,C3-01,208 DISPLAY', 3, 3, 30, 5, 'ITM-00013', '', 1, NULL, 1),
(14, 'NOKIA X2,X3,C5 DISPLAY,', 3, 3, 30, 5, 'ITM-00014', '', 1, NULL, 1),
(15, 'NOKIA 1650 DISPLAY', 3, 3, 30, 5, 'ITM-00015', '', 1, NULL, 1),
(16, 'NOKIA 6070 DISPLAY', 3, 3, 30, 5, 'ITM-00016', '', 1, NULL, 1),
(17, 'NOKIA 1600 DISPLAY', 3, 3, 30, 5, 'ITM-00017', '', 1, NULL, 1),
(18, 'NOKIA 6300 DISPLAY', 3, 3, 30, 5, 'ITM-00018', '', 1, NULL, 3),
(19, 'NOKIA ASHA 225,5301 DISPLAY', 3, 3, 30, 5, 'ITM-00019', '', 1, NULL, 3),
(20, 'NOKIA 220 DISPLAY', 3, 3, 30, 5, 'ITM-00020', '', 1, NULL, 3),
(21, 'NOKIA RM 1190,216 DISPLAY', 3, 3, 30, 5, 'ITM-00021', '', 1, NULL, 3),
(22, 'NOKIA 3310-2017 NEW DISPLAY', 3, 3, 30, 5, 'ITM-00022', '', 1, NULL, 3),
(23, 'NOKIA ASHA 311  DISPLAY', 3, 3, 10, 5, 'ITM-00023', '', 1, NULL, 3),
(24, 'NOKIA LUMIA 520 DISPLAY', 3, 2, 10, 3, 'ITM-00024', '', 1, NULL, 3),
(25, 'NOKIA LUMIA 430 DISPLAY', 3, 3, 10, 3, 'ITM-00025', '', 1, NULL, 4),
(26, 'NOKIA LUMIA 535 DISPLAY', 3, 2, 10, 3, 'ITM-00026', '', 1, NULL, 4),
(27, 'NOKIA XL DISPLAY', 3, 2, 10, 2, 'ITM-00027', '', 1, NULL, 4),
(28, 'LUMIA 640 FULL SET DISPLAY', 4, 2, 5, 1, 'ITM-00028', '', 1, NULL, 4),
(29, 'NOKIA LUMIA 535 2C  TOUCH PAD', 5, 3, 20, 10, 'ITM-00029', '', 1, NULL, 4),
(30, 'NOKIA LUMIA 535 2S TOUCH PAD', 5, 3, 10, 5, 'ITM-00030', '', 0, NULL, 4),
(31, 'NOKIA LUMIA 625 TOUCH PAD', 5, 3, 20, 5, 'ITM-00031', '', 1, NULL, 4),
(32, 'NOKIA XL TOUCH PAD', 5, 3, 10, 5, 'ITM-00032', '', 1, NULL, 4),
(33, 'NOKIA LUMIA 430 TOUH PAD', 5, 3, 10, 5, 'ITM-00033', '', 1, NULL, 4),
(34, 'NOKIA ASHA 503 TOUCH PAD', 5, 3, 10, 5, 'ITM-00034', '', 1, NULL, 4),
(35, 'NOKIA X TOUCH', 5, 3, 10, 5, 'ITM-00035', '', 1, NULL, 4),
(36, 'LUMIA 435 TOUCH PAD', 5, 2, 10, 5, 'ITM-00036', '', 1, NULL, 4),
(37, 'NOKIA LUMIA 530 TOUCH PAD', 5, 3, 10, 5, 'ITM-00037', '', 1, NULL, 4),
(38, 'NOKIA LUMIA 501 TOUCH PAD', 5, 3, 10, 5, 'ITM-00038', '', 1, NULL, 4),
(39, 'NOKIA LUMIA 520,525 TOUCH WITH FRAME', 6, 3, 10, 5, 'ITM-00039', '', 1, NULL, 4),
(40, 'NOKIA ASHA 309 TOUCH PAD', 5, 3, 10, 5, 'ITM-00040', '', 1, NULL, 4),
(41, 'NOKIA 5800 TOUCH PAD', 5, 2, 10, 1, 'ITM-00041', '', 1, NULL, 4),
(42, 'NOKIA ASHA 311 TOUCH', 5, 2, 10, 5, 'ITM-00042', '', 1, NULL, 4),
(43, 'NOKIA ASHA 305 TOUCH PAD', 5, 2, 10, 5, 'ITM-00043', '', 1, NULL, 4),
(44, 'NOKIA C2-02 TOUCH PAD', 5, 3, 10, 5, 'ITM-00044', '', 1, NULL, 4),
(45, 'NOKIA ASHA 202 TOUCH', 5, 3, 10, 5, 'ITM-00045', '', 1, NULL, 4),
(46, 'NOKIA N8 DISPLAY', 3, 2, 5, 2, 'ITM-00046', '', 0, NULL, 4),
(47, 'NOKIA ASHA 308 TOUCH PAD', 5, 3, 10, 5, 'ITM-00047', '', 1, NULL, 4),
(48, 'NOKIA 701 TOUCH', 5, 2, 10, 2, 'ITM-00048', '', 1, NULL, 4),
(49, 'NOKIA C5-02 TOUCH WITH FRAME', 6, 2, 5, 2, 'ITM-00049', '', 1, NULL, 4),
(50, 'SAMSUNG I8262 DISPLAY', 3, 2, 10, 2, 'ITM-00050', '', 1, NULL, 5),
(51, 'SAMSUNG G360 DISPLAY', 3, 2, 10, 3, 'ITM-00051', '', 0, NULL, 5),
(52, 'SAMSUNG J105,J106 DISPLAY', 3, 2, 10, 2, 'ITM-00052', '', 1, NULL, 5),
(53, 'SAMSUNG G532 J2 PRIME DISPLAY', 3, 2, 10, 2, 'ITM-00053', '', 1, NULL, 5),
(54, 'SAMSUNG I9082  DISPLAY', 3, 2, 10, 5, 'ITM-00054', '', 1, NULL, 5),
(55, 'SAMSUNG I9060,I9082 DISPLAY', 3, 2, 10, 5, 'ITM-00055', '', 1, NULL, 5),
(56, 'SAMSUNG G530,G531 GRAND PRIME DISPLAY', 3, 3, 10, 5, 'ITM-00056', '', 1, NULL, 5),
(57, 'SAMSUNG G318  DISPLAY', 3, 3, 10, 5, 'ITM-00057', '', 1, NULL, 5),
(58, 'SAMSUNG S7582 DISPLAY', 3, 2, 10, 5, 'ITM-00058', '', 1, NULL, 5),
(59, 'SAMSUNG G313H DISPLAY', 3, 2, 10, 2, 'ITM-00059', '', 1, NULL, 5),
(60, 'SAMSUNG G313F DISPLAY', 3, 2, 15, 5, 'ITM-00060', '', 1, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text,
  `production_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production_material`
--

CREATE TABLE `production_material` (
  `id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `volume` decimal(10,3) DEFAULT NULL,
  `wastage` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production_material_stock`
--

CREATE TABLE `production_material_stock` (
  `id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL,
  `material_stock_id` int(11) NOT NULL,
  `volume` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production_product`
--

CREATE TABLE `production_product` (
  `id` int(11) NOT NULL,
  `production_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production_status`
--

CREATE TABLE `production_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `production_status`
--

INSERT INTO `production_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done'),
(3, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

CREATE TABLE `product_return` (
  `id` int(11) NOT NULL,
  `date_time` varchar(45) DEFAULT NULL,
  `note` text,
  `user_id` int(11) NOT NULL,
  `deliverer_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_return_batch`
--

CREATE TABLE `product_return_batch` (
  `id` int(11) NOT NULL,
  `product_return_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `return_reason_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `discount` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_return_invoice`
--

CREATE TABLE `product_return_invoice` (
  `id` int(11) NOT NULL,
  `product_return_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `return_amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_order_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_order_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_material`
--

CREATE TABLE `purchase_order_material` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `volume` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_product`
--

CREATE TABLE `purchase_order_product` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_status`
--

CREATE TABLE `purchase_order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_order_status`
--

INSERT INTO `purchase_order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_type`
--

CREATE TABLE `purchase_order_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_order_type`
--

INSERT INTO `purchase_order_type` (`id`, `name`) VALUES
(1, 'Product'),
(2, 'Material');

-- --------------------------------------------------------

--
-- Table structure for table `remainder`
--

CREATE TABLE `remainder` (
  `id` int(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `repair_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `repaire_device_fault`
--

CREATE TABLE `repaire_device_fault` (
  `id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `device_fault_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repaire_device_fault`
--

INSERT INTO `repaire_device_fault` (`id`, `repair_id`, `device_fault_id`) VALUES
(1, 31, 2),
(2, 32, 2),
(3, 33, 2),
(4, 34, 3),
(5, 35, 2),
(6, 36, 2),
(7, 37, 2),
(8, 40, 3),
(9, 42, 2),
(10, 43, 2),
(11, 44, 2),
(12, 44, 3),
(13, 45, 2),
(14, 46, 2),
(15, 47, 2),
(16, 47, 3),
(17, 47, 4),
(18, 48, 2),
(19, 48, 3),
(20, 48, 4),
(21, 49, 2),
(22, 49, 3),
(23, 49, 4),
(24, 50, 3),
(25, 50, 4),
(26, 52, 2),
(27, 52, 3),
(28, 52, 4),
(29, 53, 2),
(30, 53, 3),
(31, 53, 4),
(32, 54, 2),
(33, 54, 3),
(34, 55, 4),
(35, 56, 4),
(36, 57, 4),
(37, 57, 6),
(38, 58, 4),
(39, 59, 3),
(40, 60, 3),
(41, 60, 4),
(42, 60, 6),
(43, 61, 6),
(44, 63, 6),
(45, 64, 8),
(46, 65, 9),
(47, 66, 6),
(48, 67, 5),
(49, 68, 5),
(50, 71, 2),
(51, 73, 2),
(52, 73, 3),
(53, 1, 1),
(54, 2, 1),
(55, 3, 3),
(56, 3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `repair_collected_accessories`
--

CREATE TABLE `repair_collected_accessories` (
  `id` int(11) NOT NULL,
  `collected_accessories` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_collected_accessories`
--

INSERT INTO `repair_collected_accessories` (`id`, `collected_accessories`, `repair_id`) VALUES
(1, 2, 31),
(2, 2, 32),
(3, 2, 33),
(4, 3, 34),
(5, 2, 35),
(6, 2, 36),
(7, 2, 37),
(8, 3, 40),
(9, 2, 41),
(10, 2, 49),
(11, 3, 49),
(12, 2, 50),
(13, 3, 50),
(14, 2, 52),
(15, 3, 52),
(16, 2, 53),
(17, 3, 53),
(18, 3, 54),
(19, 3, 55),
(20, 3, 56),
(21, 3, 57),
(22, 3, 58),
(23, 3, 59),
(24, 3, 60),
(25, 3, 61),
(26, 5, 64),
(27, 6, 65),
(28, 6, 66),
(29, 5, 67),
(30, 6, 68),
(31, 3, 73),
(32, 5, 73),
(33, 3, 1),
(34, 5, 1),
(35, 3, 2),
(36, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `repair_possible_solution`
--

CREATE TABLE `repair_possible_solution` (
  `id` int(11) NOT NULL,
  `possible_solution_id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_possible_solution`
--

INSERT INTO `repair_possible_solution` (`id`, `possible_solution_id`, `repair_id`) VALUES
(1, 2, 31),
(2, 2, 32),
(3, 2, 33),
(4, 2, 35),
(5, 2, 36),
(6, 2, 37),
(7, 2, 41),
(8, 2, 42),
(9, 2, 43),
(10, 2, 44),
(11, 2, 45),
(12, 2, 46),
(13, 2, 47),
(14, 2, 48),
(15, 2, 49),
(16, 2, 50),
(17, 2, 51),
(18, 2, 52),
(19, 2, 53),
(20, 2, 54),
(21, 2, 55),
(22, 2, 56),
(23, 2, 57),
(24, 2, 58),
(25, 2, 59),
(26, 2, 60),
(27, 4, 64),
(28, 5, 65),
(29, 5, 66),
(30, 4, 67),
(31, 4, 68),
(32, 5, 68),
(33, 2, 73),
(34, 4, 73),
(35, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `repair_status`
--

CREATE TABLE `repair_status` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_status`
--

INSERT INTO `repair_status` (`id`, `name`) VALUES
(5, 'Pending'),
(6, 'Done'),
(7, 'Not Done');

-- --------------------------------------------------------

--
-- Table structure for table `return_reason`
--

CREATE TABLE `return_reason` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_reason`
--

INSERT INTO `return_reason` (`id`, `name`) VALUES
(1, 'Customer Return'),
(2, 'Re Stock'),
(3, 'Damage'),
(4, 'Expire');

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deliverer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'SUPER ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `email`, `contact_no`) VALUES
(7, 'ASIA ELECTRONIC', 'COLOMBO', '', '0777988081'),
(8, 'TRANS ASIA', 'COLOMBO', '', '0114249274'),
(9, 'SP ELECTRONICS', 'COLOMBO', '', '0777721885');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_month_id` int(11) NOT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `target_month`
--

CREATE TABLE `target_month` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `name` varchar(400) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` text,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nic` varchar(400) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `image` varchar(400) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `designation_id`, `user_status_id`, `name`, `username`, `password`, `dob`, `contact_no`, `email`, `nic`, `address`, `image`, `soft_delete`) VALUES
(1, 1, 1, 'Admin', 'admin', '$2y$10$ZDUyNDYzYjYzM2VjZTNmMOkH2c0VKNI5.N43XGEQCXPHwSqInqNTW', '1995-05-05', '0336665552', 'aaa@bbb.com', '65465465v', '313/1 skjhsdkjcnbdkjcbnkdjnc', '5e6baafcc0cf0.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `user_id`) VALUES
(23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_activity_user1_idx` (`user_id`);

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_id` (`repair_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_batch_product1_idx` (`product_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cheque_cheque_status1_idx` (`cheque_status_id`),
  ADD KEY `fk_cheque_bank1_idx` (`bank_id`);

--
-- Indexes for table `cheque_status`
--
ALTER TABLE `cheque_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collected_accessories`
--
ALTER TABLE `collected_accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_route1_idx` (`route_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_customer1_idx` (`customer_id`),
  ADD KEY `fk_order_user1_idx` (`user_id`),
  ADD KEY `fk_customer_order_customer_order_status1_idx` (`customer_order_status_id`);

--
-- Indexes for table `customer_order_product`
--
ALTER TABLE `customer_order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_order_product_customer_order1_idx` (`customer_order_id`);

--
-- Indexes for table `customer_order_status`
--
ALTER TABLE `customer_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_has_payment_payment1_idx` (`payment_id`),
  ADD KEY `fk_customer_has_payment_customer1_idx` (`customer_id`);

--
-- Indexes for table `daily_expences`
--
ALTER TABLE `daily_expences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expence_cat` (`expence_cat`);

--
-- Indexes for table `day_start`
--
ALTER TABLE `day_start`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_distributer_route1_idx` (`route_id`);

--
-- Indexes for table `deliverer_inventory`
--
ALTER TABLE `deliverer_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_distributer_has_inventory_inventory1_idx` (`inventory_id`),
  ADD KEY `fk_deliverer_inventory_deliverer1_idx` (`deliverer_id`);

--
-- Indexes for table `deliverer_user`
--
ALTER TABLE `deliverer_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_distributer_has_user_user1_idx` (`user_id`),
  ADD KEY `fk_deliverer_user_deliverer1_idx` (`deliverer_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_fault`
--
ALTER TABLE `device_fault`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_model`
--
ALTER TABLE `device_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_repair`
--
ALTER TABLE `device_repair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_model_id` (`device_model_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `repair_status` (`repair_status`),
  ADD KEY `product` (`product`),
  ADD KEY `location_number` (`location_number`);

--
-- Indexes for table `discription`
--
ALTER TABLE `discription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expence_cat`
--
ALTER TABLE `expence_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grn_purchase_order1_idx` (`purchase_order_id`),
  ADD KEY `fk_grn_user1_idx` (`user_id`),
  ADD KEY `fk_grn_grn_type1_idx` (`grn_type_id`),
  ADD KEY `fk_grn_supplier1_idx` (`supplier_id`);

--
-- Indexes for table `grn_material`
--
ALTER TABLE `grn_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grn_has_material_material1_idx` (`material_id`),
  ADD KEY `fk_grn_has_material_grn1_idx` (`grn_id`),
  ADD KEY `fk_grn_material_user1_idx` (`user_id`);

--
-- Indexes for table `grn_product`
--
ALTER TABLE `grn_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grn_has_product_grn1_idx` (`grn_id`),
  ADD KEY `fk_grn_product_batch1_idx` (`batch_id`),
  ADD KEY `fk_grn_product_user1_idx` (`user_id`);

--
-- Indexes for table `grn_type`
--
ALTER TABLE `grn_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory_batch1_idx` (`batch_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_customer1_idx` (`customer_id`),
  ADD KEY `fk_invoice_invoice1_idx` (`reurn_invoice_id`),
  ADD KEY `fk_invoice_invoice_status1_idx` (`invoice_status_id`),
  ADD KEY `fk_invoice_customer_order1_idx` (`customer_order_id`),
  ADD KEY `fk_invoice_invoice_type1_idx` (`invoice_type_id`),
  ADD KEY `fk_invoice_user1_idx` (`user_id`),
  ADD KEY `fk_invoice_invoice_condition1_idx` (`invoice_condition_id`),
  ADD KEY `fk_invoice_deliverer1_idx` (`deliverer_id`);

--
-- Indexes for table `invoice_condition`
--
ALTER TABLE `invoice_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_inventory`
--
ALTER TABLE `invoice_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_product_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_invoice_product_inventory1_idx` (`inventory_id`);

--
-- Indexes for table `invoice_return`
--
ALTER TABLE `invoice_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_return_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_return_user1_idx` (`user_id`),
  ADD KEY `fk_invoice_return_deliverer1_idx` (`deliverer_id`);

--
-- Indexes for table `invoice_return_inventory`
--
ALTER TABLE `invoice_return_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_return_has_inventory_inventory1_idx` (`inventory_id`),
  ADD KEY `fk_product_return_inventory_invoice_return1_idx` (`invoice_return_id`),
  ADD KEY `fk_invoice_return_inventory_return_reason1_idx` (`return_reason_id`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_type`
--
ALTER TABLE `invoice_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_close`
--
ALTER TABLE `job_close`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `job_close_status`
--
ALTER TABLE `job_close_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_number`
--
ALTER TABLE `location_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_stock`
--
ALTER TABLE `material_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_material_stock_material1_idx` (`material_id`),
  ADD KEY `fk_material_stock_grn_material1_idx` (`grn_material_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_payment_payment_method1_idx` (`payment_method_id`),
  ADD KEY `fk_invoice_payment_user1_idx` (`user_id`),
  ADD KEY `fk_payment_payment_status1_idx` (`payment_status_id`),
  ADD KEY `fk_payment_payment_type1_idx` (`payment_type_id`);

--
-- Indexes for table `payment_cheque`
--
ALTER TABLE `payment_cheque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_payment_has_cheque_cheque1_idx` (`cheque_id`),
  ADD KEY `fk_invoice_payment_has_cheque_invoice_payment1_idx` (`payment_id`);

--
-- Indexes for table `payment_close`
--
ALTER TABLE `payment_close`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `payment_invoice`
--
ALTER TABLE `payment_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_invoice_payment1_idx` (`payment_id`),
  ADD KEY `fk_payment_invoice_invoice1_idx` (`invoice_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_cash`
--
ALTER TABLE `petty_cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `possible_solution`
--
ALTER TABLE `possible_solution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_has_module_module1_idx` (`module_id`),
  ADD KEY `fk_role_has_module_role1_idx` (`role_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category_idx` (`category_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_production_production_status1_idx` (`production_status_id`);

--
-- Indexes for table `production_material`
--
ALTER TABLE `production_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipie_material_material1_idx` (`material_id`),
  ADD KEY `fk_recipie_material_production1_idx` (`production_id`);

--
-- Indexes for table `production_material_stock`
--
ALTER TABLE `production_material_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_production_has_material_stock_material_stock1_idx` (`material_stock_id`),
  ADD KEY `fk_production_has_material_stock_production1_idx` (`production_id`);

--
-- Indexes for table `production_product`
--
ALTER TABLE `production_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_production_has_product_production1_idx` (`production_id`),
  ADD KEY `fk_production_product_batch1_idx` (`batch_id`);

--
-- Indexes for table `production_status`
--
ALTER TABLE `production_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_return`
--
ALTER TABLE `product_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_return_user1_idx` (`user_id`),
  ADD KEY `fk_product_return_deliverer1_idx` (`deliverer_id`),
  ADD KEY `fk_product_return_customer1_idx` (`customer_id`),
  ADD KEY `fk_product_return_invoice1_idx` (`invoice_id`);

--
-- Indexes for table `product_return_batch`
--
ALTER TABLE `product_return_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_return_has_batch_batch1_idx` (`batch_id`),
  ADD KEY `fk_product_return_has_batch_product_return1_idx` (`product_return_id`),
  ADD KEY `fk_product_return_batch_return_reason1_idx` (`return_reason_id`);

--
-- Indexes for table `product_return_invoice`
--
ALTER TABLE `product_return_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_return_has_invoice_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_product_return_has_invoice_product_return1_idx` (`product_return_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_order_supplier1_idx` (`supplier_id`),
  ADD KEY `fk_purchase_order_purchase_order_type1_idx` (`purchase_order_type_id`),
  ADD KEY `fk_purchase_order_user1_idx` (`user_id`),
  ADD KEY `fk_purchase_order_purchase_order_status1_idx` (`purchase_order_status_id`);

--
-- Indexes for table `purchase_order_material`
--
ALTER TABLE `purchase_order_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_order_has_material_material1_idx` (`material_id`),
  ADD KEY `fk_purchase_order_has_material_purchase_order1_idx` (`purchase_order_id`);

--
-- Indexes for table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_order_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_purchase_order_has_product_purchase_order1_idx` (`purchase_order_id`);

--
-- Indexes for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_type`
--
ALTER TABLE `purchase_order_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remainder`
--
ALTER TABLE `remainder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_id` (`repair_id`),
  ADD KEY `remainder_ibfk_2` (`repair_status`);

--
-- Indexes for table `repaire_device_fault`
--
ALTER TABLE `repaire_device_fault`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_id` (`repair_id`),
  ADD KEY `device_fault_id` (`device_fault_id`);

--
-- Indexes for table `repair_collected_accessories`
--
ALTER TABLE `repair_collected_accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collected_accessories` (`collected_accessories`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `repair_possible_solution`
--
ALTER TABLE `repair_possible_solution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `possible_solution_id` (`possible_solution_id`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `repair_status`
--
ALTER TABLE `repair_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_reason`
--
ALTER TABLE `return_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deliverer_id` (`deliverer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_target_user1_idx` (`user_id`),
  ADD KEY `fk_target_target_month1_idx` (`target_month_id`);

--
-- Indexes for table `target_month`
--
ALTER TABLE `target_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_designation1_idx` (`designation_id`),
  ADD KEY `fk_user_user_status1_idx` (`user_status_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_has_role_role1_idx` (`role_id`),
  ADD KEY `fk_user_role_user1_idx` (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;
--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cheque_status`
--
ALTER TABLE `cheque_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `collected_accessories`
--
ALTER TABLE `collected_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_order_product`
--
ALTER TABLE `customer_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_order_status`
--
ALTER TABLE `customer_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daily_expences`
--
ALTER TABLE `daily_expences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `day_start`
--
ALTER TABLE `day_start`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deliverer_inventory`
--
ALTER TABLE `deliverer_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deliverer_user`
--
ALTER TABLE `deliverer_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `device_fault`
--
ALTER TABLE `device_fault`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `device_model`
--
ALTER TABLE `device_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `device_repair`
--
ALTER TABLE `device_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `discription`
--
ALTER TABLE `discription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expence_cat`
--
ALTER TABLE `expence_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `grn_material`
--
ALTER TABLE `grn_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grn_product`
--
ALTER TABLE `grn_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `grn_type`
--
ALTER TABLE `grn_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_condition`
--
ALTER TABLE `invoice_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice_inventory`
--
ALTER TABLE `invoice_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_return`
--
ALTER TABLE `invoice_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_return_inventory`
--
ALTER TABLE `invoice_return_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice_type`
--
ALTER TABLE `invoice_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_close`
--
ALTER TABLE `job_close`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_close_status`
--
ALTER TABLE `job_close_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `location_number`
--
ALTER TABLE `location_number`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material_stock`
--
ALTER TABLE `material_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_cheque`
--
ALTER TABLE `payment_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_close`
--
ALTER TABLE `payment_close`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_invoice`
--
ALTER TABLE `payment_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `possible_solution`
--
ALTER TABLE `possible_solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_material`
--
ALTER TABLE `production_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_material_stock`
--
ALTER TABLE `production_material_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_product`
--
ALTER TABLE `production_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `production_status`
--
ALTER TABLE `production_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_return`
--
ALTER TABLE `product_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_return_batch`
--
ALTER TABLE `product_return_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_return_invoice`
--
ALTER TABLE `product_return_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order_material`
--
ALTER TABLE `purchase_order_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order_product`
--
ALTER TABLE `purchase_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_order_status`
--
ALTER TABLE `purchase_order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_order_type`
--
ALTER TABLE `purchase_order_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `remainder`
--
ALTER TABLE `remainder`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repaire_device_fault`
--
ALTER TABLE `repaire_device_fault`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `repair_collected_accessories`
--
ALTER TABLE `repair_collected_accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `repair_possible_solution`
--
ALTER TABLE `repair_possible_solution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `return_reason`
--
ALTER TABLE `return_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `return_table`
--
ALTER TABLE `return_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
