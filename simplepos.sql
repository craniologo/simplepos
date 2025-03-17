-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2025 at 06:14 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simplepos`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `user_id`, `created_at`) VALUES
(1, 1, '2018-12-04 10:51:47'),
(2, 1, '2019-05-01 23:20:24'),
(3, 1, '2019-05-29 12:05:49'),
(4, 1, '2019-07-05 15:26:51'),
(5, 1, '2019-08-03 22:35:01'),
(6, 1, '2019-09-18 16:06:41'),
(7, 1, '2019-09-26 11:11:56'),
(8, 1, '2019-10-07 00:34:17'),
(9, 1, '2019-10-09 21:13:13'),
(10, 1, '2019-10-10 17:11:08'),
(11, 1, '2019-10-10 18:55:09'),
(12, 1, '2019-10-30 00:01:46'),
(13, 1, '2020-01-14 20:30:18'),
(14, 1, '2020-02-06 21:46:31'),
(15, 1, '2020-06-12 12:14:54'),
(16, 1, '2020-06-29 17:47:00'),
(17, 1, '2020-08-17 23:09:25'),
(18, 1, '2020-08-19 13:09:11'),
(19, 1, '2020-10-06 16:41:35'),
(20, 1, '2020-11-19 19:08:26'),
(21, 1, '2020-11-28 07:37:40'),
(22, 1, '2020-12-07 01:19:26'),
(23, 1, '2021-02-01 01:46:45'),
(24, 1, '2021-02-16 10:58:51'),
(25, 1, '2021-05-11 08:08:07'),
(26, 1, '2021-07-26 15:35:10'),
(27, 1, '2021-10-31 20:30:23'),
(28, 1, '2021-11-07 22:23:28'),
(29, 1, '2021-12-02 02:53:32'),
(30, 1, '2021-12-08 22:24:40'),
(31, 1, '2021-12-09 10:37:27'),
(32, 1, '2022-02-23 14:15:44'),
(33, 1, '2022-04-13 09:22:07'),
(34, 1, '2022-04-13 16:23:09'),
(35, 1, '2022-05-20 10:08:45'),
(36, 1, '2022-06-23 22:00:42'),
(37, 1, '2022-06-23 22:14:58'),
(38, 1, '2022-07-04 19:31:28'),
(39, 1, '2022-07-05 10:06:53'),
(40, 1, '2022-10-28 16:58:37'),
(41, 1, '2022-11-03 18:45:59'),
(42, 1, '2023-02-04 03:08:19'),
(50, 1, '2025-03-17 13:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Servicios Electronicos', NULL),
(2, 'Servicios Medicos', NULL),
(3, 'Medicinas', NULL),
(5, 'Alimentos', 'Productos de consumo masivo'),
(6, 'Ropa', NULL),
(7, 'Electronicos', 'Artículos y accesorios electrónicos'),
(8, 'Alimentos preparados', 'Tragos y alimentos preparados'),
(9, 'Juguetes', NULL),
(10, 'Insecticidas', ''),
(11, 'Frutas', NULL),
(12, 'Plásticos', 'Artículos sintéticos a base de caucho'),
(13, 'Embutidos ', 'Productos a base de carne procesada'),
(14, 'Ferretería', 'Artículos para el sector construcción'),
(16, 'Bebidas rehidratantes', 'Productos a base de componentes energizantes'),
(17, 'Bebidas alcohólicas', 'Productos que contienen alcohol y sustancias embriagantes'),
(18, 'Cosméticos', 'Productos para el cuidado de la piel y el cabello'),
(19, 'Panadería', 'Productos e insumos de panificación '),
(20, 'gases', 'ddd'),
(21, 'Repuestos de KOMATSU 375', 'Repuestos de KOMATSU 375'),
(22, 'LIBROS ENTRETENIMIENTO', 'bb'),
(23, 'BINGO90', 'ticket para el sorteo. '),
(24, 'JUEGO DE AZAR', 'ticket para el sorteo '),
(26, 'ghghghhg', 'hvhhkg'),
(27, 'yyy', 'gfhfh'),
(28, 'queso blanco', 'queso blanco vima'),
(29, 'a', 'a'),
(30, 'bvb', 'bvbvbv'),
(31, 'linux', 'hfhfghgfhfgh'),
(32, 'Omar Barreto Flores', 'T'),
(33, 'Vinos Premium', 'Vinos');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `short` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind` int(11) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `short`, `name`, `kind`, `val`) VALUES
(1, 'company_name', 'Nombre de la empresa', 2, 'MIBODEGUITA'),
(2, 'ruc', 'RUC', 2, '10435623456'),
(3, 'address', 'DirecciÃ³n', 2, 'Av San Francisco de Asis 1375 - La Molina - Lima - PerÃº'),
(4, 'admin_email', 'Correo ElectrÃ³nico', 2, 'direcciÃ³n'),
(5, 'report_image', 'Logotipo', 4, 'code.jpg'),
(6, 'imp_name', 'Nombre Impuesto', 2, 'IGV'),
(7, 'imp_val', 'Valor Impuesto (%)', 2, '18'),
(8, 'currency', 'Simbolo de Moneda', 2, 'S/'),
(9, 'phone', 'TelÃ©fono', 2, '+51943404778'),
(10, 'note', 'Nota', 2, 'Una ves retirada la mercaderÃ­a, no hay lugar a reclamos.');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `q` float DEFAULT NULL,
  `bono` float NOT NULL,
  `price_in` double DEFAULT NULL,
  `price_out` double DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT NULL,
  `sell_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `product_id`, `q`, `bono`, `price_in`, `price_out`, `operation_type_id`, `sell_id`, `created_at`) VALUES
(1, 1, 100, 0, NULL, NULL, 1, NULL, '2018-11-25 09:47:34'),
(2, 2, 100, 0, NULL, NULL, 1, NULL, '2018-11-25 10:12:04'),
(5, 1, 2, 0, NULL, NULL, 1, 1, '2018-11-25 11:32:57'),
(7, 2, 5, 0, NULL, NULL, 2, 3, '2018-11-25 12:01:44'),
(8, 1, 3, 0, NULL, NULL, 2, 4, '2018-11-25 12:05:07'),
(9, 3, 10, 0, NULL, NULL, 1, NULL, '2018-11-25 22:03:16'),
(10, 4, 100, 0, NULL, NULL, 1, NULL, '2018-11-25 22:05:13'),
(11, 4, 2, 0, NULL, NULL, 2, 5, '2018-11-25 22:05:42'),
(12, 3, 2, 0, NULL, NULL, 2, 6, '2018-11-25 22:07:48'),
(13, 1, 2, 0, NULL, NULL, 2, 7, '2018-11-28 17:46:13'),
(14, 1, 3, 0, NULL, NULL, 2, 8, '2018-12-04 10:50:48'),
(15, 1, 1, 0, NULL, NULL, 2, 9, '2019-01-16 19:24:10'),
(16, 1, 6, 0, NULL, NULL, 2, 10, '2019-01-17 14:10:12'),
(17, 2, 10, 0, NULL, NULL, 2, 10, '2019-01-17 14:10:12'),
(18, 1, 20, 0, NULL, NULL, 2, 11, '2019-01-17 14:18:41'),
(19, 4, 8, 0, NULL, NULL, 2, 11, '2019-01-17 14:18:41'),
(20, 1, 37, 0, NULL, NULL, 1, 12, '2019-01-17 14:23:57'),
(21, 2, 85, 0, NULL, NULL, 2, 13, '2019-01-17 18:59:29'),
(22, 1, 95, 0, NULL, NULL, 2, 13, '2019-01-17 18:59:29'),
(23, 2, 10, 0, NULL, NULL, 1, 14, '2019-01-17 19:01:51'),
(24, 1, 5, 0, NULL, NULL, 2, 15, '2019-01-18 15:16:39'),
(25, 2, 50, 10, NULL, NULL, 1, 16, '2019-02-09 13:08:23'),
(26, 2, 10, 0, NULL, NULL, 2, 17, '2019-03-03 12:33:40'),
(27, 5, 100, 0, NULL, NULL, 1, NULL, '2019-03-12 00:41:53'),
(28, 5, 3, 0, NULL, NULL, 2, 18, '2019-03-12 00:43:55'),
(29, 5, 50, 0, NULL, NULL, 2, 19, '2019-03-12 00:48:10'),
(30, 6, 50, 0, NULL, NULL, 1, NULL, '2019-05-01 23:14:56'),
(31, 6, 10, 0, NULL, NULL, 2, 20, '2019-05-01 23:24:46'),
(32, 7, 0, 0, NULL, NULL, 1, NULL, '2019-05-02 13:08:30'),
(33, 2, 5, 0, NULL, NULL, 2, 21, '2019-05-29 12:04:45'),
(34, 2, 5, 0, NULL, NULL, 2, 22, '2019-06-02 15:29:51'),
(35, 3, 1, 0, NULL, NULL, 2, 22, '2019-06-02 15:29:51'),
(36, 8, 0, 0, NULL, NULL, 1, NULL, '2019-06-04 19:59:13'),
(37, 1, 50, 0, NULL, NULL, 1, 23, '2019-06-11 18:20:30'),
(38, 1, 2, 0, NULL, NULL, 2, 24, '2019-06-11 18:22:16'),
(39, 2, 3, 0, NULL, NULL, 2, 25, '2019-06-12 12:01:15'),
(40, 2, 7, 0, NULL, NULL, 2, 26, '2019-06-12 12:03:38'),
(41, 1, 48, 0, NULL, NULL, 2, 26, '2019-06-12 12:03:38'),
(42, 2, 1, 0, NULL, NULL, 2, 27, '2019-06-12 12:07:03'),
(43, 2, 3, 0, NULL, NULL, 2, 28, '2019-06-17 17:16:08'),
(44, 2, 2, 0, NULL, NULL, 2, 29, '2019-06-23 17:23:45'),
(45, 4, 7, 0, NULL, NULL, 2, 29, '2019-06-23 17:23:45'),
(46, 9, 30, 0, NULL, NULL, 1, NULL, '2019-06-29 13:45:29'),
(47, 2, 2, 0, NULL, NULL, 2, 30, '2019-07-26 11:25:22'),
(48, 2, 2, 0, NULL, NULL, 2, 31, '2019-07-26 19:03:59'),
(49, 9, 5, 0, NULL, NULL, 2, 32, '2019-08-05 14:06:27'),
(50, 2, 2, 0, NULL, NULL, 2, 33, '2019-08-06 23:02:50'),
(51, 10, 1, 0, NULL, NULL, 1, NULL, '2019-09-12 07:58:17'),
(52, 10, 1, 0, NULL, NULL, 2, 34, '2019-09-12 08:26:10'),
(53, 2, 3, 0, NULL, NULL, 2, 35, '2019-09-22 18:03:25'),
(54, 2, 5, 0, NULL, NULL, 2, 36, '2019-10-06 19:52:44'),
(55, 3, 5, 0, NULL, NULL, 2, 36, '2019-10-06 19:52:44'),
(56, 2, 2, 0, NULL, NULL, 2, 37, '2019-10-06 20:17:19'),
(57, 3, 2, 0, NULL, NULL, 2, 37, '2019-10-06 20:17:19'),
(58, 2, 7, 0, NULL, NULL, 2, 38, '2019-10-07 00:15:50'),
(59, 2, 1, 0, NULL, NULL, 2, 39, '2019-10-07 00:21:07'),
(60, 11, 20, 0, NULL, NULL, 1, NULL, '2019-10-08 19:23:37'),
(61, 11, 5, 0, NULL, NULL, 2, 40, '2019-10-08 20:06:01'),
(62, 4, 1, 0, NULL, NULL, 2, 41, '2019-10-08 20:35:05'),
(63, 12, 20, 0, NULL, NULL, 1, NULL, '2019-10-08 20:47:12'),
(64, 1, 10, 200, NULL, NULL, 1, 42, '2019-10-09 14:07:33'),
(65, 1, 10, 0, NULL, NULL, 2, 43, '2019-10-09 14:08:20'),
(66, 1, 50, 0, NULL, NULL, 1, 44, '2019-10-09 22:05:01'),
(67, 2, 30, 0, NULL, NULL, 1, 44, '2019-10-09 22:05:01'),
(68, 3, 50, 5, NULL, NULL, 1, 45, '2019-10-09 22:41:03'),
(69, 3, 4, 0, NULL, NULL, 2, 46, '2019-10-09 22:42:47'),
(70, 11, 1, 0, NULL, NULL, 2, 47, '2019-10-10 16:16:33'),
(71, 12, 10, 0, NULL, NULL, 2, 48, '2019-10-10 17:45:45'),
(72, 11, 10, 0, NULL, NULL, 2, 48, '2019-10-10 17:45:45'),
(73, 4, 50, 0, NULL, NULL, 2, 49, '2019-10-10 17:55:21'),
(74, 3, 20, 0, NULL, NULL, 2, 49, '2019-10-10 17:55:21'),
(75, 6, 20, 0, NULL, NULL, 2, 49, '2019-10-10 17:55:21'),
(76, 1, 25, 0, NULL, NULL, 2, 50, '2019-10-10 17:56:29'),
(77, 1, 2, 0, NULL, NULL, 2, 51, '2019-10-10 18:54:55'),
(78, 2, 3, 0, NULL, NULL, 2, 51, '2019-10-10 18:54:55'),
(79, 3, 4, 0, NULL, NULL, 2, 51, '2019-10-10 18:54:55'),
(80, 4, 5, 0, NULL, NULL, 2, 51, '2019-10-10 18:54:55'),
(81, 10, 5, 0, NULL, NULL, 1, 52, '2019-10-10 18:57:45'),
(82, 10, 1, 0, NULL, NULL, 2, 53, '2019-10-10 18:58:17'),
(83, 7, 30, 0, NULL, NULL, 1, 54, '2019-10-10 19:32:57'),
(84, 13, 100, 0, NULL, NULL, 1, NULL, '2019-10-10 23:08:30'),
(85, 13, 2, 0, NULL, NULL, 2, 55, '2019-10-10 23:11:41'),
(86, 3, 2, 0, NULL, NULL, 2, 55, '2019-10-10 23:11:41'),
(87, 11, 1, 0, NULL, NULL, 2, 55, '2019-10-10 23:11:41'),
(88, 7, 3, 0, NULL, NULL, 2, 55, '2019-10-10 23:11:41'),
(89, 9, 5, 0, NULL, NULL, 2, 55, '2019-10-10 23:11:41'),
(90, 2, 1, 0, NULL, NULL, 2, 56, '2019-10-11 21:18:25'),
(91, 1, 1, 0, NULL, NULL, 2, 57, '2019-10-12 00:10:44'),
(92, 1, 1, 0, NULL, NULL, 2, 58, '2019-10-13 20:52:16'),
(93, 8, 50, 0, NULL, NULL, 1, 59, '2019-10-13 23:28:40'),
(94, 4, 30, 0, NULL, NULL, 1, 59, '2019-10-13 23:28:40'),
(95, 11, 100, 0, NULL, NULL, 1, 59, '2019-10-13 23:28:40'),
(96, 2, 50, 0, NULL, NULL, 1, 59, '2019-10-13 23:28:40'),
(97, 5, 50, 0, NULL, NULL, 1, 59, '2019-10-13 23:28:40'),
(98, 8, 10, 0, NULL, NULL, 2, 60, '2019-10-13 23:30:23'),
(99, 5, 20, 0, NULL, NULL, 2, 60, '2019-10-13 23:30:23'),
(100, 2, 20, 0, NULL, NULL, 2, 60, '2019-10-13 23:30:23'),
(101, 3, 3, 0, NULL, NULL, 2, 61, '2019-10-14 07:16:54'),
(102, 3, 1, 0, NULL, NULL, 2, 62, '2019-10-14 09:02:07'),
(103, 10, 1, 0, NULL, NULL, 2, 63, '2019-10-18 07:31:32'),
(104, 10, 2, 0, NULL, NULL, 2, 64, '2019-10-18 07:32:30'),
(112, 10, 1, 0, NULL, NULL, 2, 66, '2019-10-30 15:04:59'),
(113, 2, 20, 0, NULL, NULL, 2, 66, '2019-10-30 15:04:59'),
(114, 13, 10, 0, NULL, NULL, 2, 67, '2019-10-31 15:45:30'),
(115, 4, 20, 0, NULL, NULL, 2, 67, '2019-10-31 15:45:30'),
(116, 6, 5, 0, NULL, NULL, 2, 67, '2019-10-31 15:45:30'),
(117, 2, 20, 0, NULL, NULL, 2, 67, '2019-10-31 15:45:30'),
(118, 1, 2, 0, NULL, NULL, 2, 68, '2019-11-06 17:41:54'),
(119, 7, 4, 0, NULL, NULL, 2, 68, '2019-11-06 17:41:54'),
(120, 1, 2, 0, NULL, NULL, 2, 69, '2019-11-06 17:55:36'),
(121, 1, 20, 2, NULL, NULL, 1, 70, '2019-11-11 13:24:33'),
(122, 2, 5, 3, NULL, NULL, 1, 70, '2019-11-11 13:24:33'),
(123, 1, 3, 0, NULL, NULL, 2, 71, '2019-11-14 18:33:36'),
(124, 2, 2, 0, NULL, NULL, 2, 72, '2019-11-27 14:58:04'),
(125, 3, 2, 0, NULL, NULL, 2, 72, '2019-11-27 14:58:04'),
(126, 1, 1, 0, NULL, NULL, 2, 73, '2019-12-04 09:58:17'),
(127, 2, 2, 0, NULL, NULL, 2, 73, '2019-12-04 09:58:17'),
(128, 1, 3, 0, NULL, NULL, 2, 74, '2019-12-20 06:33:56'),
(129, 2, 5, 0, NULL, NULL, 2, 74, '2019-12-20 06:33:56'),
(130, 1, 5, 0, NULL, NULL, 2, 75, '2019-12-20 08:19:03'),
(131, 2, 4, 0, NULL, NULL, 2, 75, '2019-12-20 08:19:03'),
(132, 2, 1, 0, NULL, NULL, 2, 76, '2019-12-27 19:38:12'),
(133, 1, 12, 2.5, NULL, NULL, 1, 77, '2020-01-08 00:41:32'),
(134, 3, 5, 0, NULL, NULL, 2, 78, '2020-01-27 21:38:44'),
(135, 2, 50, 0, NULL, NULL, 1, 79, '2020-01-30 09:39:41'),
(136, 10, 50, 0, NULL, NULL, 1, 79, '2020-01-30 09:39:41'),
(137, 2, 5, 0, NULL, NULL, 2, 80, '2020-01-30 09:41:05'),
(138, 10, 1, 0, NULL, NULL, 2, 80, '2020-01-30 09:41:05'),
(139, 1, 10, 0, NULL, NULL, 2, 81, '2020-02-04 14:21:33'),
(140, 8, 1, 0, NULL, NULL, 2, 82, '2020-02-11 15:42:32'),
(141, 2, 5, 0, NULL, NULL, 2, 83, '2020-02-25 06:46:14'),
(142, 10, 1, 0, NULL, NULL, 2, 83, '2020-02-25 06:46:14'),
(143, 4, 12, 0, NULL, NULL, 2, 84, '2020-03-02 17:06:49'),
(144, 2, 20, 0, NULL, NULL, 2, 85, '2020-03-20 08:59:20'),
(145, 10, 1, 0, NULL, NULL, 2, 86, '2020-03-28 08:48:46'),
(146, 2, 10, 1, NULL, NULL, 1, 87, '2020-03-28 08:54:02'),
(147, 14, 555, 0, NULL, NULL, 1, NULL, '2020-03-28 17:15:41'),
(148, 15, 55, 0, NULL, NULL, 1, NULL, '2020-03-31 19:49:29'),
(149, 2, 1, 0, NULL, NULL, 2, 88, '2020-04-29 08:06:31'),
(150, 5, 1, 0, NULL, NULL, 2, 88, '2020-04-29 08:06:31'),
(151, 2, 1, 0, NULL, NULL, 2, 89, '2020-05-19 13:28:30'),
(152, 3, 3, 0, NULL, NULL, 2, 90, '2020-05-21 11:13:00'),
(153, 2, 1, 0, NULL, NULL, 2, 90, '2020-05-21 11:13:00'),
(154, 4, 10, 2, NULL, NULL, 1, 91, '2020-05-23 12:41:08'),
(155, 4, 10, 2, NULL, NULL, 1, 92, '2020-05-23 12:47:04'),
(156, 1, 5, 0, NULL, NULL, 2, 93, '2020-06-07 17:38:58'),
(157, 1, 3, 0, NULL, NULL, 2, 94, '2020-06-14 22:00:45'),
(158, 1, 1, 0, NULL, NULL, 2, 95, '2020-06-17 13:18:42'),
(159, 1, 1, 1, NULL, NULL, 1, 96, '2020-06-23 22:56:17'),
(160, 16, 3333, 0, NULL, NULL, 1, NULL, '2020-07-03 16:40:40'),
(161, 1, 3, 0, NULL, NULL, 2, 97, '2020-07-15 12:00:39'),
(162, 12, 5, 0, NULL, NULL, 1, 98, '2020-07-15 15:38:01'),
(163, 3, 10, 1, NULL, NULL, 1, 98, '2020-07-15 15:38:01'),
(164, 10, 1, 0, NULL, NULL, 2, 99, '2020-07-15 15:42:15'),
(165, 1, 4, 0, NULL, NULL, 2, 100, '2020-07-22 16:37:42'),
(166, 9, 12, 0, NULL, NULL, 2, 100, '2020-07-22 16:37:42'),
(167, 10, 1, 0, NULL, NULL, 2, 101, '2020-07-22 16:38:17'),
(168, 1, 2, 0, NULL, NULL, 2, 102, '2020-07-23 00:21:28'),
(169, 17, 18, 0, NULL, NULL, 1, NULL, '2020-07-27 06:58:40'),
(170, 6, 6, 0, NULL, NULL, 2, 103, '2020-08-09 19:49:22'),
(171, 16, 50, 0, NULL, NULL, 2, 103, '2020-08-09 19:49:22'),
(172, 1, 1, 0, NULL, NULL, 2, 104, '2020-08-11 00:01:40'),
(173, 8, 20, 0, NULL, NULL, 2, 105, '2020-08-12 22:55:04'),
(174, 16, 100, 0, NULL, NULL, 2, 105, '2020-08-12 22:55:04'),
(175, 18, 10, 0, NULL, NULL, 1, NULL, '2020-08-13 15:36:24'),
(176, 18, 3, 0, NULL, NULL, 2, 106, '2020-08-13 15:40:15'),
(177, 19, 100, 0, NULL, NULL, 1, NULL, '2020-08-14 18:28:30'),
(178, 1, 20, 3, NULL, NULL, 1, 107, '2020-08-14 18:37:11'),
(179, 20, 100, 0, NULL, NULL, 1, NULL, '2020-08-14 18:42:32'),
(180, 21, 50, 0, NULL, NULL, 1, NULL, '2020-08-14 18:53:21'),
(181, 3, 3, 0, NULL, NULL, 2, 108, '2020-08-15 06:26:49'),
(182, 17, 3, 0, NULL, NULL, 2, 108, '2020-08-15 06:26:49'),
(183, 19, 1, 0, NULL, NULL, 2, 108, '2020-08-15 06:26:49'),
(184, 1, 3, 0, NULL, NULL, 2, 109, '2020-08-17 07:55:59'),
(185, 12, 2, 0, NULL, NULL, 2, 109, '2020-08-17 07:55:59'),
(186, 3, 5, 0, NULL, NULL, 2, 110, '2020-08-17 23:07:59'),
(187, 2, 3, 0, NULL, NULL, 2, 110, '2020-08-17 23:07:59'),
(188, 12, 1, 0, NULL, NULL, 2, 111, '2020-08-18 06:59:28'),
(189, 10, 1, 0, NULL, NULL, 2, 112, '2020-08-19 07:35:38'),
(190, 1, 11, 0, NULL, NULL, 2, 113, '2020-08-20 00:04:54'),
(191, 5, 4, 0, NULL, NULL, 2, 114, '2020-08-26 07:46:05'),
(192, 7, 4, 0, NULL, NULL, 2, 114, '2020-08-26 07:46:05'),
(193, 13, 3, 0, NULL, NULL, 2, 114, '2020-08-26 07:46:05'),
(194, 10, 1, 0, NULL, NULL, 2, 115, '2020-08-27 07:33:09'),
(195, 14, 10, 0, NULL, NULL, 2, 116, '2020-08-27 22:41:40'),
(196, 19, 1, 0, NULL, NULL, 2, 116, '2020-08-27 22:41:40'),
(197, 2, 3, 0, NULL, NULL, 2, 116, '2020-08-27 22:41:40'),
(198, 16, 10, 0, NULL, NULL, 2, 116, '2020-08-27 22:41:40'),
(199, 5, 3, 0, NULL, NULL, 2, 117, '2020-08-28 10:53:36'),
(200, 19, 2, 0, NULL, NULL, 2, 117, '2020-08-28 10:53:36'),
(201, 8, 1, 0, NULL, NULL, 2, 118, '2020-08-28 10:55:02'),
(202, 4, 2, 0, NULL, NULL, 2, 119, '2020-09-04 07:19:37'),
(203, 16, 3, 0, NULL, NULL, 2, 119, '2020-09-04 07:19:37'),
(204, 14, 6, 0, NULL, NULL, 2, 119, '2020-09-04 07:19:37'),
(205, 8, 2, 0, NULL, NULL, 2, 120, '2020-09-08 08:36:39'),
(206, 14, 3, 0, NULL, NULL, 2, 121, '2020-09-08 08:37:43'),
(207, 4, 5, 0, NULL, NULL, 2, 121, '2020-09-08 08:37:43'),
(208, 10, 1, 0, NULL, NULL, 2, 122, '2020-09-08 10:30:42'),
(209, 2, 3, 0, NULL, NULL, 2, 123, '2020-09-08 10:43:02'),
(210, 4, 3, 0, NULL, NULL, 2, 124, '2020-09-21 23:37:08'),
(211, 14, 2, 0, NULL, NULL, 2, 124, '2020-09-21 23:37:08'),
(212, 20, 1, 0, NULL, NULL, 2, 125, '2020-10-15 07:24:53'),
(213, 21, 1, 0, NULL, NULL, 2, 126, '2020-10-15 07:25:31'),
(214, 4, 11, 0, NULL, NULL, 2, 127, '2020-10-18 20:14:14'),
(215, 10, 1, 0, NULL, NULL, 2, 127, '2020-10-18 20:14:14'),
(216, 1, 5, 0, NULL, NULL, 2, 128, '2020-11-16 10:20:17'),
(217, 20, 1, 0, NULL, NULL, 2, 128, '2020-11-16 10:20:17'),
(218, 1, 4, 0, NULL, NULL, 2, 129, '2020-11-19 19:05:13'),
(219, 6, 1, 0, NULL, NULL, 2, 130, '2020-11-19 19:08:05'),
(220, 2, 10, 0, NULL, NULL, 2, 131, '2020-11-19 19:10:56'),
(221, 1, 1, 0, NULL, NULL, 2, 132, '2020-11-20 19:51:58'),
(222, 5, 1, 0, NULL, NULL, 2, 132, '2020-11-20 19:51:58'),
(223, 7, 3, 0, NULL, NULL, 2, 133, '2020-11-26 00:35:05'),
(224, 12, 5, 0, NULL, NULL, 2, 133, '2020-11-26 00:35:05'),
(225, 14, 5, 0, NULL, NULL, 2, 134, '2020-11-28 07:36:59'),
(226, 16, 20, 0, NULL, NULL, 2, 134, '2020-11-28 07:36:59'),
(227, 6, 4, 0, NULL, NULL, 2, 135, '2020-12-06 10:22:10'),
(228, 6, 2, 0, NULL, NULL, 2, 136, '2020-12-06 10:24:27'),
(229, 6, 10, 10, NULL, NULL, 1, 137, '2020-12-06 10:26:27'),
(230, 3, 2, 0, NULL, NULL, 2, 138, '2020-12-07 01:16:07'),
(231, 19, 3, 0, NULL, NULL, 2, 138, '2020-12-07 01:16:07'),
(232, 3, 10, 1, NULL, NULL, 1, 139, '2020-12-07 01:18:29'),
(233, 1, 1, 0, NULL, NULL, 2, 140, '2020-12-26 16:00:07'),
(234, 17, 1, 0, NULL, NULL, 2, 140, '2020-12-26 16:00:07'),
(235, 4, 2, 0, NULL, NULL, 2, 141, '2020-12-27 11:31:15'),
(236, 15, 1, 0, NULL, NULL, 2, 142, '2020-12-28 15:46:25'),
(237, 5, 2, 0, NULL, NULL, 2, 142, '2020-12-28 15:46:25'),
(238, 11, 7, 0, NULL, NULL, 2, 143, '2021-01-16 18:47:39'),
(239, 16, 10, 0, NULL, NULL, 2, 143, '2021-01-16 18:47:39'),
(240, 1, 5, 50, NULL, NULL, 1, 144, '2021-01-17 18:15:32'),
(241, 9, 10, 100, NULL, NULL, 1, 145, '2021-01-17 18:17:36'),
(242, 14, 10, 0, NULL, NULL, 2, 146, '2021-01-22 10:14:24'),
(243, 19, 1, 0, NULL, NULL, 2, 146, '2021-01-22 10:14:24'),
(244, 1, 1, 0, NULL, NULL, 2, 147, '2021-01-27 23:30:03'),
(245, 2, 4, 0, NULL, NULL, 2, 148, '2021-01-27 23:33:11'),
(246, 22, 1, 0, NULL, NULL, 1, NULL, '2021-02-16 10:55:22'),
(247, 11, 1, 0, NULL, NULL, 2, 149, '2021-02-16 10:58:15'),
(248, 13, 4, 0, NULL, NULL, 2, 150, '2021-02-22 11:54:25'),
(249, 5, 10, 0, NULL, NULL, 2, 150, '2021-02-22 11:54:25'),
(250, 1, 1, 0, NULL, NULL, 2, 151, '2021-06-03 18:57:35'),
(251, 12, 2, 0, NULL, NULL, 2, 152, '2021-06-17 16:40:14'),
(252, 23, 0, 0, NULL, NULL, 1, NULL, '2021-07-12 12:35:34'),
(253, 23, 500, 0, NULL, NULL, 1, 153, '2021-07-12 12:40:28'),
(254, 7, 5, 0, NULL, NULL, 2, 154, '2021-08-08 14:15:29'),
(255, 5, 4, 0, NULL, NULL, 2, 155, '2021-08-08 14:17:31'),
(256, 6, 2, 0, NULL, NULL, 2, 155, '2021-08-08 14:17:31'),
(257, 5, 2, 0, NULL, NULL, 2, 156, '2021-08-08 14:26:08'),
(258, 6, 2, 0, NULL, NULL, 2, 156, '2021-08-08 14:26:08'),
(259, 1, 5, 0, NULL, NULL, 2, 157, '2021-08-12 04:47:02'),
(260, 1, 1, 0, NULL, NULL, 2, 158, '2021-09-16 13:49:01'),
(261, 1, 1, 0, NULL, NULL, 2, 159, '2021-10-04 11:09:14'),
(262, 15, 1, 0, NULL, NULL, 2, 160, '2021-10-04 11:11:17'),
(263, 2, 1, 0, NULL, NULL, 2, 161, '2021-10-31 20:31:48'),
(264, 2, 3, 0, NULL, NULL, 2, 162, '2021-11-09 17:47:35'),
(265, 24, 20, 0, NULL, NULL, 1, NULL, '2021-12-08 22:22:11'),
(266, 24, 5, 0, NULL, NULL, 2, 163, '2021-12-08 22:24:13'),
(267, 2, 2, 0, NULL, NULL, 2, 164, '2021-12-09 10:37:08'),
(268, 4, 5, 0, NULL, NULL, 2, 165, '2022-01-09 14:15:34'),
(269, 21, 10, 0, NULL, NULL, 2, 166, '2022-01-09 16:21:57'),
(270, 3, 1, 0, NULL, NULL, 2, 166, '2022-01-09 16:21:57'),
(271, 23, 1, 0, NULL, NULL, 2, 166, '2022-01-09 16:21:57'),
(272, 4, 1, 0, NULL, NULL, 2, 166, '2022-01-09 16:21:57'),
(273, 18, 1, 0, NULL, NULL, 2, 167, '2022-01-13 12:23:32'),
(274, 25, 5, 0, NULL, NULL, 1, NULL, '2022-01-13 12:31:06'),
(275, 2, 4, 0, NULL, NULL, 2, 168, '2022-01-26 19:32:13'),
(276, 10, 2, 0, NULL, NULL, 2, 168, '2022-01-26 19:32:13'),
(277, 6, 12, 1, NULL, NULL, 1, 169, '2022-01-26 19:33:10'),
(278, 1, 22, 2, NULL, NULL, 1, 169, '2022-01-26 19:33:10'),
(279, 3, 2, 1, NULL, NULL, 1, 170, '2022-02-21 09:33:13'),
(280, 1, 3, 0, NULL, NULL, 2, 171, '2022-03-14 17:53:54'),
(281, 26, 50, 0, NULL, NULL, 1, NULL, '2022-03-14 17:55:34'),
(282, 26, 2, 0, NULL, NULL, 2, 172, '2022-03-14 17:56:39'),
(283, 1, 2, 0, NULL, NULL, 2, 173, '2022-04-09 22:52:04'),
(284, 2, 1, 0, NULL, NULL, 2, 174, '2022-04-13 16:18:59'),
(285, 6, 8, 0, NULL, NULL, 2, 174, '2022-04-13 16:18:59'),
(286, 15, 34, 0, NULL, NULL, 2, 175, '2022-04-13 16:25:44'),
(288, 3, 2, 0, NULL, NULL, 2, 177, '2022-05-07 08:32:37'),
(289, 1, 1, 0, NULL, NULL, 2, 178, '2022-05-07 14:53:59'),
(290, 12, 1, 0, NULL, NULL, 2, 178, '2022-05-07 14:53:59'),
(291, 4, 1, 0, NULL, NULL, 2, 178, '2022-05-07 14:53:59'),
(292, 7, 1, 0, NULL, NULL, 2, 178, '2022-05-07 14:53:59'),
(295, 2, 15, 1, NULL, NULL, 1, 180, '2022-05-20 10:16:18'),
(296, 1, 1, 0, NULL, NULL, 2, 181, '2022-06-07 20:04:23'),
(299, 1, 1, 0, NULL, NULL, 2, 183, '2022-06-23 21:57:24'),
(300, 22, 1, 0, NULL, NULL, 2, 184, '2022-06-23 22:12:56'),
(301, 14, 10, 0, NULL, NULL, 2, 185, '2022-06-23 22:16:34'),
(302, 1, 10, 0, NULL, NULL, 2, 186, '2022-06-24 22:56:10'),
(303, 1, 2, 0, NULL, NULL, 2, 187, '2022-07-02 03:25:48'),
(304, 3, 1, 0, NULL, NULL, 2, 187, '2022-07-02 03:25:48'),
(305, 27, 1, 0, NULL, NULL, 1, NULL, '2022-07-02 03:28:04'),
(306, 1, 2, 0, NULL, NULL, 2, 188, '2022-07-04 19:28:53'),
(307, 3, 14, 0, NULL, NULL, 2, 188, '2022-07-04 19:28:53'),
(308, 9, 3, 0, NULL, NULL, 2, 189, '2022-07-05 10:05:31'),
(309, 9, 5, 0, NULL, NULL, 2, 190, '2022-07-05 10:06:35'),
(310, 12, 1, 0, NULL, NULL, 2, 191, '2022-08-10 10:39:13'),
(311, 1, 20, 2, NULL, NULL, 1, 192, '2022-08-10 10:54:44'),
(312, 1, 2, 0, NULL, NULL, 2, 193, '2022-08-30 16:17:05'),
(313, 10, 1, 0, NULL, NULL, 2, 194, '2022-08-30 16:43:50'),
(314, 1, 1, 2, NULL, NULL, 1, 195, '2022-10-28 16:57:13'),
(315, 28, 100, 0, NULL, NULL, 1, NULL, '2022-10-29 22:34:28'),
(316, 2, 2, 0, NULL, NULL, 2, 196, '2022-11-03 18:41:14'),
(317, 1, 20, 5, NULL, NULL, 1, 197, '2022-11-03 18:49:43'),
(318, 1, 2, 0, NULL, NULL, 2, 198, '2022-11-14 09:53:26'),
(319, 1, 38, 5, NULL, NULL, 1, 199, '2022-11-15 00:03:50'),
(320, 1, 1, 0, NULL, NULL, 2, 200, '2022-11-15 00:20:58'),
(321, 23, 121, 0, NULL, NULL, 2, 201, '2022-12-01 03:28:47'),
(322, 1, 2, 0, NULL, NULL, 2, 202, '2022-12-01 17:43:14'),
(323, 29, 15000, 0, NULL, NULL, 1, NULL, '2022-12-11 02:22:19'),
(324, 3, 20, 1, NULL, NULL, 1, 203, '2022-12-14 14:06:47'),
(325, 3, 2, 0, NULL, NULL, 2, 204, '2022-12-14 14:08:44'),
(326, 12, 1, 0, NULL, NULL, 2, 205, '2023-02-04 03:14:26'),
(327, 30, 5, 0, NULL, NULL, 1, NULL, '2023-03-13 11:07:27'),
(331, 31, 0, 0, NULL, NULL, 1, NULL, '2023-04-04 00:31:10'),
(332, 2, 10, 0, NULL, NULL, 1, 207, '2023-05-09 05:35:11'),
(333, 12, 50, 0, NULL, NULL, 1, 210, '2023-05-31 03:40:33'),
(334, 30, 40, 0, NULL, NULL, 1, 211, '2023-05-31 03:41:27'),
(335, 32, 100, 5, NULL, NULL, 1, 215, '2024-01-17 16:08:54'),
(336, 3, 1, 52000, NULL, NULL, 1, 220, '2024-03-22 02:11:40'),
(337, 6, 1, 0, NULL, NULL, 2, 229, '2024-10-10 12:36:00'),
(338, 6, 5, 0, NULL, NULL, 2, 230, '2024-10-10 15:29:58'),
(339, 14, 4, 0, NULL, NULL, 2, 231, '2024-10-10 15:35:40'),
(340, 14, 4, 0, NULL, NULL, 2, 232, '2024-10-10 15:49:28'),
(341, 1, 4, 0, NULL, NULL, 1, NULL, '2024-10-23 11:28:13'),
(342, 2, 3, 0, NULL, NULL, 2, NULL, '2024-10-23 11:28:29'),
(343, 26, 3, 0, NULL, NULL, 2, 234, '2024-10-23 11:43:19'),
(348, 1, 2, 0, 2, 6, 1, 239, '2025-03-15 19:26:11'),
(349, 12, 2, 0, 40, 55, 2, 240, '2025-03-15 19:28:14'),
(350, 1, 2, 0, 2, 6, 2, 241, '2025-03-17 12:15:29'),
(351, 4, 3, 0, 5, 9, 2, 241, '2025-03-17 12:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `operation_type`
--

CREATE TABLE `operation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`) VALUES
(1, 'Entrada'),
(2, 'Salida');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `lastname`, `ruc`, `address`, `phone`, `email`, `kind`, `created_at`) VALUES
(1, 'Pedro', 'Picapiedra', '987675344', 'Av. Las Piedras 127 - La Molina', '986453672', 'ppicapiedra@hotmail.com', 1, '2016-12-18 17:43:08'),
(2, 'Dino', 'Picapiedra', '98767534444', 'Av. Las Piedras 127 - La Molina', '986857352', 'dpicapiedra@hotmail.com', 1, '2016-12-18 17:44:38'),
(3, 'Vilma', 'Picapiedra', '98767534432', 'Av. Las Piedras 127 - La Molina', '986875234', 'vpicapiedra@hotmail.com', 1, '2016-12-18 17:45:04'),
(4, 'Pablo', 'Marmol', '98767547844', 'Av. Las MontÃ±as 879 - San Isidro', '987567324', 'pmarmol@hotmail.com', 2, '2016-12-18 17:45:46'),
(5, 'Pebels', 'Picapiedra', '10421624128', 'Av. Las Piedras 167  La Molina', '987546372', 'pbpicapiedra@gmail.com', 1, '2017-02-18 18:14:15'),
(6, 'Alan ', 'García ', '10546732876', 'Av. San Silvestre 234 Santiago de Surco', '978673452', 'agarcia@peru.com', 1, '2017-02-18 18:19:38'),
(7, 'Raúl', 'Vargas', '45327819', 'Av. Las Lomas 324 San Borja', '986756324', 'rvargas@rpp.com', 1, '2017-02-18 18:29:14'),
(8, 'Perico ', 'Palotes', '67345628', 'Av. Los Robles 564 Los Olivos', '986456323', 'ppalotes@peru.com', 1, '2017-02-18 18:42:05'),
(9, 'Pinpon', 'Cartón', '43345623', 'Av. Muylejano 748 Chorrillos', '978674323', 'pcarton@lejano.com', 1, '2017-02-18 18:44:57'),
(10, 'Betty', 'Marmol', '05463724', 'Av. Los PeÃ±ascos 789 Piedraroca', '978675443', 'bmarmol@hotmail.com', 2, '2017-02-18 19:16:06'),
(11, 'Michael', 'Jackson', '76785645', 'Av. Meriland 1562 Washington', '986756433', 'mjackson@msn.com', 1, '2017-02-18 19:22:36'),
(12, 'Miguel', 'Grau', '78654322', 'Av. Los Mares 786 Callao', '987876543', 'mgrau@hotmail.com', 1, '2017-02-18 19:31:37'),
(13, 'Abelardo ', 'Quiñones', '67564534', 'Av. Los Aires 496 San Miguel', '986345623', 'aquinones@gmail.com', 1, '2017-02-18 19:32:45'),
(15, 'Sanson', 'Galileo', '10123456434', 'Av. Los Galileos 546 Roma', '987654321', 'sgalileo@hotmail.com', 1, '2017-03-11 20:55:11'),
(16, 'Harryto', 'Grecia', '36936936901', 'Av. Grecia 234 Roma', '987675342', 'dgrecia@hotmail.com', 1, '2017-03-11 20:58:52'),
(18, 'Dino', 'Pintor', '43536272', 'Av. Las Rocas 143 La Molina', '878987654', 'dpintor@hotmail.com', 2, '2017-04-13 17:47:21'),
(19, 'Cristobal', 'Colón', '54763823', 'Av. San Silvestre 156 California', '876675433', 'ccolon@hotmail.com', 1, '2017-04-13 17:48:24'),
(20, 'BASE  CHORRILLOS', 'CHORRILLOS', '.09821244', '.JULIO CALERO 631', '.975421395', '.MIGUELABANTO@HOTMAIL.COM', 1, '2017-04-13 17:54:10'),
(21, 'Magaly ', 'Medina', '12354342', 'La Molina 132', '987986543', 'mmedina@gmail.com', 1, '2018-04-21 18:35:07'),
(22, 'Manuel', 'Lardilla', '2343929', 'aksjdjd 1349', '4948484', '', 2, '2019-03-12 00:55:53'),
(23, 'Manuel', 'Masero', '54444444', 'av. manuel seoane 309', '963389563', 'manuel@tttt.com', 1, '2019-06-16 18:06:07'),
(24, 'Gioconda ', 'Paredes ', '9999999999', 'pradera 1 ', '999992222', 'giocondapa@gmail.com', 1, '2019-06-29 13:48:17'),
(25, 'nose', 'sise', '1023456789', 'Loreto', '987654320', 'nose@hotmail.com', 1, '2019-07-26 18:56:41'),
(26, 'Otto', 'Peralta', '1241fafdsad', 'sadad', '837348234', 'asdad@kdsd.com', 1, '2019-10-29 23:59:10'),
(27, 'IIKKK', 'KIK', 'KIK', 'I', 'MKMIJ', 'KMKMKOMKOMKOMKO', 2, '2020-03-15 22:42:16'),
(28, 'qwqwqwe', 'Quinatoa', 'KIK', 'I', 'MKMIJ', 'KMKMKOMKOMKOMKO@sad.com', 2, '2020-03-15 22:42:58'),
(29, 'test', 'tet', 'teste', 'testes', '3423423', 'etst@etest', 1, '2020-12-28 15:45:15'),
(30, 'juan', 'perez', '4930437', 'lima', '3487982135', 'jperez@gmai.com', 1, '2020-12-28 15:45:40'),
(31, 'Marcos', 'Requejo', '0', 'sssss', '999999223', 'hola@wwww', 1, '2021-02-13 20:34:34'),
(32, 'Miguel Abanto', 'Abanto Quispe', '10098212448', 'Julio Calero 631', '975421395', 'miguelabanto@hotmail.com', 1, '2021-04-01 23:39:03'),
(33, 'Sonny', 'Pimentel Mogrovejo', '1221123132', 'Calle Comercio 660', '6067558458', 'thegrozzo@gmail.com', 1, '2021-08-08 14:14:50'),
(34, 'bbb', 'bbb', '12345678', 'bb', '987654321', 'bbb@gamil.com', 1, '2022-01-09 14:14:57'),
(35, '2181289', 'pedro', '902932009', '32 de agosto', '32909032', 'cincuent@gmail.com', 1, '2022-01-26 19:31:24'),
(36, 'JOED IMPORT ', 'ddddd', '10472863555', 'jr camelias 340', '999999999', 'dhconfecciones.peru@gmail.com', 1, '2022-04-22 10:29:37'),
(37, 'sergio', 'salinas', '23221231321', 'anexo 9 de octubre mz a lt 06', '32213232132', 'ulquiora20@gmail.com', 1, '2022-04-24 23:41:05'),
(38, 'Fabian', 'Garcia', '56476566', 'Perú', '908784534', 'fgarcia@gmail.com', 1, '2022-05-07 08:30:21'),
(39, 'Sophia', 'Crespo', '25365253', 'Caracas', '584146253690', 'sophi@gmail.com', 1, '2022-05-07 14:53:36'),
(40, 'asdasd', 'asdasd', '12374537', 'asdas', '+59162400080', 'wilsonelguard@gmail.com', 1, '2022-06-07 20:03:21'),
(41, 'sergio', 'salinas', '23221231321', 'anexo 9 de octubre mz a lt 06', '989831289', 'ulquiora20@gmail.com', 1, '2022-06-13 16:18:23'),
(43, 'hesler', 'jesus', '08017894563', 'Francisco morazan', '88443322', 'hzuniga@gmail.com', 1, '2022-07-20 09:42:00'),
(44, 'dfg', 'gjvjfh', 'hgjh', 'jkhkj', 'jkjhjk', 'jkjhkj@gmail', 1, '2022-08-18 22:20:53'),
(45, 'Pedro', '-', '-', '-', '-', 'example@example', 1, '2022-12-01 03:26:03'),
(46, 'FDF', 'FSDFSDF', '0202', 'DSFDSF', '040404', 'GFGFD@GAILO.COM', 1, '2024-01-17 10:49:49'),
(47, 'FDF', 'FSDFSDF', 'FSDFS', 'DSFDSF', '040404', 'GFGFD@GAILO.COM', 1, '2024-01-17 10:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `inventary_min` int(11) DEFAULT '10',
  `price_in` float DEFAULT NULL,
  `price_out` float DEFAULT NULL,
  `unit` tinyint(2) DEFAULT NULL,
  `presentation` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `barcode`, `name`, `description`, `inventary_min`, `price_in`, `price_out`, `unit`, `presentation`, `user_id`, `category_id`, `created_at`, `is_active`) VALUES
(1, 'avr.E280AEphp.jpg', '0012', 'Abaco ', 'Retablo ayacuchano', 10, 2, 6, 1, 'caja', 1, 1, '2018-11-25 09:47:34', 1),
(2, 'Scan2021-12-14_224556_0011.png', '5444', 'Mango', 'Mango injerto grande', 1, 1.8, 4.2, 1, 'Bolsa', 1, 11, '2019-10-10 12:13:28', 1),
(3, 'fresa.jpg', '655', 'Torta de fresas', 'Deliciosa torta de fresas', 5, 10, 35, 1, 'Caja', 1, 5, '2019-10-10 09:22:23', 1),
(4, 'cigarrillos.jpg', '54433', 'Cigarrillos de excelente calidad', 'Cajetilla de cigarros Mallboro', 5, 5, 9, 1, 'Caja', 2, 5, '2019-10-10 10:17:23', 1),
(5, NULL, '233322', 'mem 8 gb ', 'clase 10', 8, 11, 13, 1, 'blister', 1, 7, '2019-03-12 05:41:53', 1),
(6, NULL, '165444', 'Parlante Huawei', 'pppppppppp', 10, 10, 20, 1, 'Caja', 1, 7, '2019-05-02 04:14:56', 1),
(7, 'polo.jpg', '65765478', 'Polo deportivo nike', 'Polo deportivo marca nike', 3, 57, 70, 1, 'Bolsa', 1, 6, '2019-05-02 18:08:30', 1),
(8, 'Lotes_PISCOCENTRAL_PISCO_CENTRAL_982056299_WWW.PISCOCENTRAL.COM_INVERSION_GANANCIA_OPORTUNIDAD_LIMA_PERU_5.jpg', '', 'loctite 620 - 50 ml', 'dsa', 0, 23, 233, 23, '', 1, 2, '2019-10-10 09:19:19', 1),
(9, NULL, '99999', 'chorizo ', 'chorizo campesino ', 10, 10, 20, 2, 'embutidos el manaba', 1, 13, '2019-06-29 18:45:29', 1),
(10, NULL, '5011402183289', 'sierra circular ', '1400w black y decker', 1, 5000, 8500, 1, '', 1, 14, '2019-09-12 12:58:17', 0),
(11, 'plantilla-botella-vino-copa-vino-tinto_1284-11798.jpg', '12345', 'Vino tinto', 'Vino secó especial para parrillas', 5, 15, 25, 10, 'Botella', 1, 17, '2019-10-09 00:23:36', 1),
(12, '2012220406577_2.jpg', '12345', 'Cartera', 'Cartera de mano muy elegante', 2, 40, 55, 1, 'Bolsa', 1, 18, '2019-10-10 09:18:19', 1),
(13, 'suero.jpg', '67565667', 'Suero rehidratante', 'Suero rehidratante para recuperar energías ', 3, 10, 25, 1, 'Botella', 3, 3, '2019-10-10 23:08:30', 1),
(14, 'auri-samsung.jpg', '784647', 'Audifonos samsung', 'Audifonos ', 5, 15, 25, 1, 'xx', 1, 7, '2020-03-28 17:15:41', 1),
(15, 'img_d_3.jpg', '000123', 'Servicio de CEO', 'Servicio de CEO', 5, 150, 200, 1, 'ljp', 1, 1, '2020-03-31 19:49:29', 1),
(16, NULL, '3333', 'Dexametasona 500 mg', 'Blister de dexametasona de 500 mg', 3, 10, 30, 1, '3333', 1, 3, '2020-07-03 16:40:40', 1),
(17, NULL, '34567', 'PERA DE AGUA', 'H', 8, 1.25, 2, 1, 'qwee', 1, 6, '2020-07-27 06:58:40', 1),
(18, 'komatzu.jpg', '24234324', 'Repuestos de KOMATSU 375', 'REPUESTO PARA KOMATSU 375 DETALLE DEL REPUESTO.', 5, 1500, 2000, 1, 'Nuevo', 1, 21, '2020-08-13 15:36:24', 1),
(19, 'pintura.jpg', '189335433', 'Pintura color rojo Glidden', 'Lata de pintura anticorrosia marca Gliidden', 4, 45, 69, 1, 'Lata', 1, 7, '2020-08-14 18:28:30', 1),
(20, 'pintalabios.jpg', '4343353333', 'Lipstick de oro y diamantes de Guerlain', 'Llipstick de oro y diamantes de Guerlain', 5, 120000, 200000, 1, 'Caja', 1, 18, '2020-08-14 18:42:32', 1),
(21, 'motobomba.jpg', '675363733', 'Motobomba de agua', 'Motobomba para la extracción de agua', 5, 1500, 2500, 1, 'Caja', 1, 14, '2020-08-14 18:53:21', 1),
(22, NULL, '123456', 'leche pil', 'leche pil en bolsa', 1, 4.5, 6, 5, 'buena presentacion', 1, 5, '2021-02-16 10:55:22', 1),
(23, 'pngegg.png', '2364', 'TICKET BINGO 90. ', 'TICKET PARA EL SORTEO', 2147483647, 0.2, 1, 1, '', 1, 23, '2021-07-12 12:35:34', 1),
(24, NULL, '5521221541', 'prodddd', 'pootfdr', 15, 10, 15, 1, '', 1, 27, '2021-12-08 22:22:11', 1),
(25, NULL, '', 'queso blanco', 'asdasfdasdf sadf sdsdf', 1, 3, 5, 1, '', 1, 28, '2022-01-13 12:31:06', 1),
(26, NULL, '123456789102', 'Tequila Mi sueño', 'Tequila Reposado 750 Ml', 10, 300, 450, 1, 'Botella', 1, 17, '2022-03-14 17:55:34', 1),
(27, 'Instalacion_Debian_11_4.png', '125151', 'linux', '', 5, 90, 100, 1, '', 1, 20, '2022-07-02 03:28:04', 1),
(28, NULL, '2323233', 'sdsd', 'sdsdsdsd', 20, 22, 22, 22, 'sdsd', 1, 17, '2022-10-29 22:34:28', 1),
(29, NULL, '', 'Ibersartan ', 'L:2022876', 0, 1, 2, 1, 'Caja x100', 1, 3, '2022-12-11 02:22:19', 1),
(30, NULL, '1265548488744', 'Trampeter Malbec', 'Malbec - Trampeter', 3, 1000, 1250, 1, 'Unidad', 1, 17, '2023-03-13 11:07:27', 1),
(31, 'logotipo.php.txt', '36663', 'r', '', 0, 6, 6, 5, '', 1, 2, '2023-04-04 00:31:10', 1),
(32, NULL, '2000', 'SPEED', 'EDEDE', 5, 2, 10, 10, 'ERWER', 1, NULL, '2024-01-17 16:01:22', 1),
(33, NULL, '', 'webos', '', 1, 35000, 75000, 1, '', 1, NULL, '2024-03-22 02:05:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `readjust`
--

CREATE TABLE `readjust` (
  `id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `justify` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `readjust`
--

INSERT INTO `readjust` (`id`, `operation_id`, `justify`, `user_id`, `created_at`) VALUES
(1, 341, 'Reajuste', 1, '2024-10-23 11:28:13'),
(2, 342, 'Reajuste', 1, '2024-10-23 11:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `operation_type_id` int(11) DEFAULT '2',
  `box_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `cash` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `ref_id`, `person_id`, `operation_type_id`, `box_id`, `total`, `cash`, `discount`, `user_id`, `created_at`) VALUES
(1, 1, 18, 1, NULL, 3, NULL, NULL, 1, '2018-11-25 11:32:57'),
(3, 2, 20, 2, 1, 21, NULL, 0, 1, '2018-11-25 12:01:44'),
(4, 3, 6, 2, 1, 9, NULL, 0, 1, '2018-11-25 12:05:06'),
(5, 4, 20, 2, 1, 18, NULL, 0, 2, '2018-11-25 22:05:42'),
(6, 5, 9, 2, 1, 70, NULL, 0, 3, '2018-11-25 22:07:48'),
(7, 6, 7, 2, 1, 6, NULL, 0, 1, '2018-11-28 17:46:13'),
(8, 7, 20, 2, 1, 9, NULL, 0, 1, '2018-12-04 10:50:48'),
(9, 8, 1, 2, 2, 3, NULL, 0, 1, '2019-01-16 19:24:10'),
(10, 9, 20, 2, 2, 60, NULL, 0, 1, '2019-01-17 14:10:12'),
(11, 10, 3, 2, 2, 132, NULL, 0, 1, '2019-01-17 14:18:41'),
(12, 2, 10, 1, NULL, 55.5, NULL, NULL, 1, '2019-01-17 14:23:57'),
(13, 11, 20, 2, 2, 642, NULL, 0, 1, '2019-01-17 18:59:29'),
(14, 3, 10, 1, NULL, 18, NULL, NULL, 1, '2019-01-17 19:01:51'),
(15, 12, 16, 2, 2, 15, NULL, 5, 1, '2019-01-18 15:16:39'),
(16, 4, 18, 1, NULL, 72, NULL, NULL, 1, '2019-02-09 13:08:23'),
(17, 13, 11, 2, 2, 42, NULL, 0, 1, '2019-03-03 12:33:40'),
(18, 14, 2, 2, 2, 39, NULL, 1, 1, '2019-03-12 00:43:55'),
(19, 15, 3, 2, 2, 650, NULL, 0, 1, '2019-03-12 00:48:10'),
(20, 16, 20, 2, 3, 200, NULL, 0, 1, '2019-05-01 23:24:46'),
(21, 17, 20, 2, 3, 21, NULL, 0, 1, '2019-05-29 12:04:45'),
(22, 18, 16, 2, 4, 56, NULL, 0, 1, '2019-06-02 15:29:51'),
(23, 5, 22, 1, NULL, 75, NULL, NULL, 1, '2019-06-11 18:20:30'),
(24, 19, 20, 2, 4, 6, NULL, 0, 1, '2019-06-11 18:22:16'),
(25, 20, 20, 2, 4, 12.6, NULL, 0, 1, '2019-06-12 12:01:15'),
(26, 21, 20, 2, 4, 173.4, NULL, 0, 1, '2019-06-12 12:03:38'),
(27, 22, 20, 2, 4, 4.2, NULL, 0, 1, '2019-06-12 12:07:03'),
(28, 23, 20, 2, 4, 12.6, NULL, 0, 1, '2019-06-17 17:16:08'),
(29, 24, 11, 2, 4, 71.4, NULL, 3, 1, '2019-06-23 17:23:45'),
(30, 25, 9, 2, 5, 8.4, NULL, 0, 1, '2019-07-26 11:25:22'),
(31, 26, 25, 2, 5, 8.4, NULL, 1, 1, '2019-07-26 19:03:59'),
(32, 27, 20, 2, 6, 100, NULL, 0, 1, '2019-08-05 14:06:27'),
(33, 28, 20, 2, 6, 8.4, NULL, 0, 1, '2019-08-06 23:02:50'),
(34, 29, 20, 2, 6, 8500, NULL, 10, 1, '2019-09-12 08:26:10'),
(35, 30, 20, 2, 7, 12.6, NULL, 0, 1, '2019-09-22 18:03:25'),
(36, 31, 1, 2, 8, 196, NULL, 0, 1, '2019-10-06 19:52:44'),
(37, 32, 1, 2, 8, 78.4, NULL, 0, 1, '2019-10-06 20:17:19'),
(38, 33, 20, 2, 8, 29.4, NULL, 0, 1, '2019-10-07 00:15:50'),
(39, 34, 20, 2, 8, 4.2, NULL, 0, 1, '2019-10-07 00:21:07'),
(40, 35, 19, 2, 9, 125, NULL, 0, 1, '2019-10-08 20:06:01'),
(41, 36, 24, 2, 9, 9, NULL, 0, 1, '2019-10-08 20:35:05'),
(42, 6, 18, 1, NULL, -285, NULL, NULL, 1, '2019-10-09 14:07:33'),
(43, 37, 15, 2, 9, 30, NULL, 4, 1, '2019-10-09 14:08:20'),
(44, 7, 4, 1, NULL, 129, NULL, NULL, 1, '2019-10-09 22:05:01'),
(45, 8, 10, 1, NULL, 450, NULL, NULL, 1, '2019-10-09 22:41:03'),
(46, 38, 5, 2, 10, 140, NULL, 0, 1, '2019-10-09 22:42:47'),
(47, 39, 20, 2, 10, 25, NULL, 0, 1, '2019-10-10 16:16:33'),
(48, 40, 7, 2, 11, 800, NULL, 0, 2, '2019-10-10 17:45:45'),
(49, 41, 20, 2, 11, 1550, NULL, 0, 3, '2019-10-10 17:55:21'),
(50, 42, 20, 2, 11, 75, NULL, 0, 3, '2019-10-10 17:56:29'),
(51, 43, 20, 2, 11, 203.6, NULL, 0, 3, '2019-10-10 18:54:55'),
(52, 9, 22, 1, NULL, 25000, NULL, NULL, 2, '2019-10-10 18:57:45'),
(53, 44, 20, 2, 12, 8500, NULL, 0, 2, '2019-10-10 18:58:17'),
(54, 10, 22, 1, NULL, 1710, NULL, NULL, 3, '2019-10-10 19:32:57'),
(55, 45, 6, 2, 12, 455, NULL, 0, 3, '2019-10-10 23:11:41'),
(56, 46, 20, 2, 12, 4.2, NULL, 0, 1, '2019-10-11 21:18:25'),
(57, 47, 20, 2, 12, 3, NULL, 0, 1, '2019-10-12 00:10:44'),
(58, 48, 20, 2, 12, 3, NULL, 0, 1, '2019-10-13 20:52:16'),
(59, 11, 22, 1, NULL, 3440, NULL, NULL, 1, '2019-10-13 23:28:40'),
(60, 49, 2, 2, 12, 2674, NULL, 0, 2, '2019-10-13 23:30:23'),
(61, 50, 6, 2, 12, 105, NULL, 0, 3, '2019-10-14 07:16:54'),
(62, 51, 20, 2, 12, 35, NULL, 0, 1, '2019-10-14 09:02:07'),
(63, 52, 20, 2, 12, 8500, NULL, 0, 1, '2019-10-18 07:31:32'),
(64, 53, 16, 2, 12, 17000, NULL, 0, 3, '2019-10-18 07:32:30'),
(66, 55, 19, 2, 13, 8584, NULL, 0, 1, '2019-10-30 15:04:59'),
(67, 56, 16, 2, 13, 614, NULL, 0, 3, '2019-10-31 15:45:30'),
(68, 57, 26, 2, 13, 286, NULL, 15, 1, '2019-11-06 17:41:54'),
(69, 58, 6, 2, 13, 6, NULL, 0, 1, '2019-11-06 17:55:36'),
(70, 12, 10, 1, NULL, 30.6, NULL, NULL, 1, '2019-11-11 13:24:33'),
(71, 59, 8, 2, 13, 9, NULL, 0, 1, '2019-11-14 18:33:36'),
(72, 60, 26, 2, 13, 78.4, NULL, 0, 1, '2019-11-27 14:58:04'),
(73, 61, 25, 2, 13, 11.4, NULL, 0, 1, '2019-12-04 09:58:17'),
(74, 62, 12, 2, 13, 30, NULL, 0, 1, '2019-12-20 06:33:56'),
(75, 63, 7, 2, 13, 31.8, NULL, 0, 1, '2019-12-20 08:19:03'),
(76, 64, 26, 2, 13, 4.2, NULL, 0, 1, '2019-12-27 19:38:12'),
(77, 13, 10, 1, NULL, 14.25, NULL, NULL, 1, '2020-01-08 00:41:32'),
(78, 65, 12, 2, 14, 175, NULL, 0, 1, '2020-01-27 21:38:44'),
(79, 14, 22, 1, NULL, 250090, NULL, NULL, 1, '2020-01-30 09:39:41'),
(80, 66, 19, 2, 14, 8521, NULL, 0, 1, '2020-01-30 09:41:05'),
(81, 67, 23, 2, 14, 30, NULL, 0, 1, '2020-02-04 14:21:33'),
(82, 68, 6, 2, 15, 233, NULL, 0, 1, '2020-02-11 15:42:32'),
(83, 69, 19, 2, 15, 8521, NULL, 0, 1, '2020-02-25 06:46:14'),
(84, 70, 3, 2, 15, 108, NULL, 0, 1, '2020-03-02 17:06:49'),
(85, 71, 11, 2, 15, 84, NULL, 0, 1, '2020-03-20 08:59:20'),
(86, 72, 20, 2, 15, 8500, NULL, 0, 1, '2020-03-28 08:48:46'),
(87, 15, 28, 1, NULL, 16.2, NULL, NULL, 1, '2020-03-28 08:54:02'),
(88, 73, 20, 2, 15, 17.2, NULL, 0, 2, '2020-04-29 08:06:31'),
(89, 74, 9, 2, 15, 4.2, NULL, 1, 1, '2020-05-19 13:28:30'),
(90, 75, 20, 2, 15, 109.2, NULL, 0, 1, '2020-05-21 11:13:00'),
(91, 16, 28, 1, NULL, 40, NULL, NULL, 1, '2020-05-23 12:41:08'),
(92, 17, 28, 1, NULL, 40, NULL, NULL, 1, '2020-05-23 12:47:04'),
(93, 76, 20, 2, 15, 15, NULL, 0, 1, '2020-06-07 17:38:58'),
(94, 77, 20, 2, 16, 9, NULL, 0, 1, '2020-06-14 22:00:45'),
(95, 78, 20, 2, 16, 3, NULL, 0, 1, '2020-06-17 13:18:42'),
(96, 18, 28, 1, NULL, 0, NULL, NULL, 1, '2020-06-23 22:56:17'),
(97, 79, 20, 2, 17, 9, NULL, 0, 1, '2020-07-15 12:00:39'),
(98, 19, 22, 1, NULL, 290, NULL, NULL, 1, '2020-07-15 15:38:01'),
(99, 80, 11, 2, 17, 8500, NULL, 0, 1, '2020-07-15 15:42:15'),
(100, 81, 12, 2, 17, 252, NULL, 0, 1, '2020-07-22 16:37:42'),
(101, 82, 3, 2, 17, 8500, NULL, 0, 1, '2020-07-22 16:38:17'),
(102, 83, 24, 2, 17, 6, NULL, 12, 1, '2020-07-23 00:21:28'),
(103, 84, 23, 2, 17, 1620, NULL, 0, 1, '2020-08-09 19:49:22'),
(104, 85, 20, 2, 17, 3, NULL, 0, 1, '2020-08-11 00:01:40'),
(105, 86, 20, 2, 17, 7660, NULL, 0, 1, '2020-08-12 22:55:04'),
(106, 87, 21, 2, 17, 6000, NULL, 0, 1, '2020-08-13 15:40:15'),
(107, 20, 18, 1, NULL, 25.5, NULL, NULL, 1, '2020-08-14 18:37:11'),
(108, 88, 16, 2, 17, 180, NULL, 0, 1, '2020-08-15 06:26:49'),
(109, 89, 16, 2, 17, 119, NULL, 0, 1, '2020-08-17 07:55:59'),
(110, 90, 20, 2, 17, 187.6, NULL, 0, 1, '2020-08-17 23:07:59'),
(111, 91, 16, 2, 18, 55, NULL, 0, 1, '2020-08-18 06:59:28'),
(112, 92, 16, 2, 18, 8500, NULL, 0, 1, '2020-08-19 07:35:38'),
(113, 93, 20, 2, 19, 33, NULL, 2112, 1, '2020-08-20 00:04:54'),
(114, 94, 16, 2, 19, 407, NULL, 0, 2, '2020-08-26 07:46:05'),
(115, 95, 21, 2, 19, 8500, NULL, 0, 2, '2020-08-27 07:33:09'),
(116, 96, 8, 2, 19, 631.6, NULL, 0, 3, '2020-08-27 22:41:40'),
(117, 97, 20, 2, 19, 177, NULL, 0, 1, '2020-08-28 10:53:36'),
(118, 98, 20, 2, 19, 233, NULL, 0, 3, '2020-08-28 10:55:02'),
(119, 99, 20, 2, 19, 258, NULL, 0, 2, '2020-09-04 07:19:37'),
(120, 100, 24, 2, 19, 466, NULL, 0, 3, '2020-09-08 08:36:39'),
(121, 101, 19, 2, 19, 120, NULL, 0, 2, '2020-09-08 08:37:43'),
(122, 102, 1, 2, 19, 8500, NULL, 0, 2, '2020-09-08 10:30:42'),
(123, 103, 20, 2, 19, 12.6, NULL, 0, 1, '2020-09-08 10:43:02'),
(124, 104, 24, 2, 19, 77, NULL, 0, 1, '2020-09-21 23:37:08'),
(125, 105, 9, 2, 20, 200000, NULL, 0, 3, '2020-10-15 07:24:53'),
(126, 106, 20, 2, 20, 2500, NULL, 0, 3, '2020-10-15 07:25:31'),
(127, 107, 16, 2, 20, 8599, NULL, 0, 3, '2020-10-18 20:14:14'),
(128, 108, 20, 2, 20, 200015, NULL, 0, 1, '2020-11-16 10:20:17'),
(129, 109, 20, 2, 20, 12, NULL, 0, 1, '2020-11-19 19:05:13'),
(130, 110, 20, 2, 20, 20, NULL, 0, 1, '2020-11-19 19:08:05'),
(131, 111, 20, 2, 21, 42, NULL, 0, 1, '2020-11-19 19:10:56'),
(132, 112, 20, 2, 21, 16, NULL, 0, 1, '2020-11-20 19:51:58'),
(133, 113, 2, 2, 21, 485, NULL, 0, 1, '2020-11-26 00:35:05'),
(134, 114, 9, 2, 21, 725, NULL, 0, 3, '2020-11-28 07:36:59'),
(135, 115, 20, 2, 22, 80, NULL, 0, 1, '2020-12-06 10:22:10'),
(136, 116, 20, 2, 22, 40, NULL, 0, 1, '2020-12-06 10:24:27'),
(137, 21, 28, 1, NULL, 0, NULL, NULL, 1, '2020-12-06 10:26:27'),
(138, 117, 5, 2, 22, 277, NULL, 0, 1, '2020-12-07 01:16:07'),
(139, 22, 10, 1, NULL, 90, NULL, NULL, 1, '2020-12-07 01:18:29'),
(140, 118, 12, 2, 23, 5, NULL, 0, 1, '2020-12-26 16:00:07'),
(141, 119, 20, 2, 23, 18, NULL, 0, 1, '2020-12-27 11:31:15'),
(142, 120, 30, 2, 23, 226, NULL, 0, 1, '2020-12-28 15:46:25'),
(143, 121, 26, 2, 23, 475, NULL, 0, 1, '2021-01-16 18:47:39'),
(144, 23, 28, 1, NULL, -67.5, NULL, NULL, 1, '2021-01-17 18:15:32'),
(145, 24, 28, 1, NULL, -900, NULL, NULL, 1, '2021-01-17 18:17:36'),
(146, 122, 7, 2, 23, 319, NULL, 0, 3, '2021-01-22 10:14:24'),
(147, 123, 20, 2, 23, 3, NULL, 0, 1, '2021-01-27 23:30:03'),
(148, 124, 20, 2, 23, 16.8, NULL, 12, 1, '2021-01-27 23:33:11'),
(149, 125, 2, 2, 24, 25, NULL, 5, 1, '2021-02-16 10:58:15'),
(150, 126, 30, 2, 25, 230, NULL, 0, 3, '2021-02-22 11:54:25'),
(151, 127, 13, 2, 26, 6, NULL, 0, 1, '2021-06-03 18:57:35'),
(152, 128, 6, 2, 26, 110, NULL, 12, 1, '2021-06-17 16:40:14'),
(153, 25, 10, 1, NULL, 100, NULL, NULL, 1, '2021-07-12 12:40:28'),
(154, 129, 30, 2, 27, 350, NULL, 0, 1, '2021-08-08 14:15:29'),
(155, 130, 30, 2, 27, 92, NULL, 0, 1, '2021-08-08 14:17:31'),
(156, 131, 6, 2, 27, 66, NULL, 0, 1, '2021-08-08 14:26:08'),
(157, 132, 13, 2, 27, 30, NULL, 0, 1, '2021-08-12 04:47:02'),
(158, 133, 21, 2, 27, 6, NULL, 0, 1, '2021-09-16 13:49:01'),
(159, 134, 2, 2, 27, 6, NULL, 0, 1, '2021-10-04 11:09:14'),
(160, 135, 30, 2, 27, 200, NULL, 0, 1, '2021-10-04 11:11:17'),
(161, 136, 11, 2, 28, 4.2, NULL, 0, 1, '2021-10-31 20:31:48'),
(162, 137, 30, 2, 29, 12.6, NULL, 0, 1, '2021-11-09 17:47:35'),
(163, 138, 5, 2, 30, 75, NULL, 0, 1, '2021-12-08 22:24:13'),
(164, 139, 11, 2, 31, 8.4, NULL, 0, 1, '2021-12-09 10:37:08'),
(165, 140, 34, 2, 32, 45, NULL, 0, 1, '2022-01-09 14:15:34'),
(166, 141, 30, 2, 32, 25045, NULL, 0, 1, '2022-01-09 16:21:57'),
(167, 142, 13, 2, 32, 2000, NULL, 1, 1, '2022-01-13 12:23:32'),
(168, 143, 35, 2, 32, 17016.8, NULL, 0, 1, '2022-01-26 19:32:13'),
(169, 26, 10, 1, NULL, 150, NULL, NULL, 1, '2022-01-26 19:33:10'),
(170, 27, 10, 1, NULL, 10, NULL, NULL, 1, '2022-02-21 09:33:13'),
(171, 144, 19, 2, 33, 18, NULL, 0, 1, '2022-03-14 17:53:54'),
(172, 145, 13, 2, 33, 900, NULL, 0, 1, '2022-03-14 17:56:39'),
(173, 146, 35, 2, 33, 12, NULL, 25, 1, '2022-04-09 22:52:04'),
(174, 147, 2, 2, 34, 164.2, NULL, 0, 1, '2022-04-13 16:18:59'),
(175, 148, 12, 2, 35, 6800, NULL, 0, 1, '2022-04-13 16:25:44'),
(177, 150, 15, 2, 35, 70, NULL, 0, 1, '2022-05-07 08:32:37'),
(178, 151, 35, 2, 35, 140, NULL, 0, 1, '2022-05-07 14:53:59'),
(180, 28, 18, 1, NULL, 25.2, NULL, NULL, 1, '2022-05-20 10:16:18'),
(181, 153, 35, 2, 36, 6, NULL, 0, 1, '2022-06-07 20:04:23'),
(183, 155, 3, 2, 36, 6, NULL, 0, 1, '2022-06-23 21:57:24'),
(184, 156, 19, 2, 37, 6, NULL, 0, 3, '2022-06-23 22:12:56'),
(185, 157, 35, 2, 38, 250, NULL, 0, 1, '2022-06-23 22:16:34'),
(186, 158, 35, 2, 38, 60, NULL, 0, 1, '2022-06-24 22:56:10'),
(187, 159, 31, 2, 38, 47, NULL, 0, 1, '2022-07-02 03:25:48'),
(188, 160, 19, 2, 38, 502, NULL, 0, 1, '2022-07-04 19:28:53'),
(189, 161, 21, 2, 39, 60, NULL, 0, 1, '2022-07-05 10:05:31'),
(190, 162, 35, 2, 39, 100, NULL, 0, 1, '2022-07-05 10:06:35'),
(191, 163, 35, 2, 40, 55, NULL, 0, 1, '2022-08-10 10:39:13'),
(192, 29, 10, 1, NULL, 36, NULL, NULL, 1, '2022-08-10 10:54:44'),
(193, 164, 35, 2, 40, 12, NULL, 0, 1, '2022-08-30 16:17:05'),
(194, 165, 35, 2, 40, 8500, NULL, 100, 1, '2022-08-30 16:43:50'),
(195, 30, 10, 1, NULL, -2, NULL, NULL, 1, '2022-10-28 16:57:13'),
(196, 166, 25, 2, 41, 8.4, NULL, 2, 1, '2022-11-03 18:41:14'),
(197, 31, 10, 1, NULL, 30, NULL, NULL, 1, '2022-11-03 18:49:43'),
(198, 167, 35, 2, 42, 12, NULL, 3, 3, '2022-11-14 09:53:26'),
(199, 32, 10, 1, NULL, 66, NULL, NULL, 1, '2022-11-15 00:03:50'),
(200, 168, 24, 2, 42, 6, NULL, 0, 1, '2022-11-15 00:20:58'),
(201, 169, 45, 2, 42, 121, NULL, 21, 1, '2022-12-01 03:28:47'),
(202, 170, 35, 2, 42, 12, NULL, 0, 1, '2022-12-01 17:43:14'),
(203, 33, 4, 1, NULL, 190, NULL, NULL, 1, '2022-12-14 14:06:47'),
(204, 171, 24, 2, 42, 70, NULL, 1.5, 1, '2022-12-14 14:08:44'),
(205, 172, 35, 2, 50, 55, NULL, 0, 1, '2023-02-04 03:14:26'),
(207, 34, 10, 1, NULL, 18, NULL, NULL, 1, '2023-05-09 05:35:11'),
(210, 35, 10, 1, NULL, 2000, NULL, NULL, 1, '2023-05-31 03:40:33'),
(211, 36, 10, 1, NULL, 40000, NULL, NULL, 1, '2023-05-31 03:41:27'),
(215, 37, 10, 1, NULL, 190, NULL, NULL, 1, '2024-01-17 16:08:54'),
(220, 38, 28, 1, NULL, -519990, NULL, NULL, 1, '2024-03-22 02:11:40'),
(229, 190, 2, 2, 50, 20, NULL, 0, 2, '2024-10-10 12:36:00'),
(230, 191, 35, 2, 50, 100, NULL, 0, 2, '2024-10-10 15:29:58'),
(231, 192, 35, 2, 50, 100, NULL, 0, 2, '2024-10-10 15:35:40'),
(232, 193, 35, 2, 50, 100, NULL, 0, 2, '2024-10-10 15:49:28'),
(234, 195, 35, 2, 50, 1350, NULL, 0, 1, '2024-10-23 11:43:19'),
(239, 39, 10, 1, NULL, 4, NULL, NULL, 1, '2025-03-15 19:26:11'),
(240, 196, 35, 2, 50, 110, NULL, 0, 1, '2025-03-15 19:28:14'),
(241, 197, 38, 2, 50, 29, NULL, 10, 2, '2025-03-17 12:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `spend`
--

CREATE TABLE `spend` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double DEFAULT NULL,
  `box_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spend`
--

INSERT INTO `spend` (`id`, `name`, `price`, `box_id`, `user_id`, `created_at`) VALUES
(1, 'Pizza para los muchachos', 100, NULL, 1, '2018-11-25 10:23:49'),
(5, 'Madera', 230, NULL, 1, '2020-12-08 22:35:35'),
(8, 'Compra de panes', 50, NULL, 1, '2023-05-30 22:46:11'),
(9, 'Pancito caliente', 40, NULL, 3, '2024-10-01 00:00:00'),
(10, 'Pizza', 20, NULL, 1, '2025-03-15 19:26:48'),
(11, 'Compra de pancito caliente', 10, NULL, 2, '2025-03-17 11:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `counter` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `image`, `is_active`, `is_admin`, `counter`, `created_at`) VALUES
(1, 'Pedro', 'Perez', 'admin', 'admin@hotmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 1, 885, '2016-12-18 17:29:08'),
(2, 'Mirko', 'Talavera', 'mtalavera', 'mtalavera@hotmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 0, 45, '2017-04-13 10:35:36'),
(3, 'Tito', 'Puente', 'tpuente', 'tpuente@hotmail.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', NULL, 1, 0, 31, '2017-04-13 17:45:31'),
(4, 'Ruben', 'Santos', 'ruben', 'rubenrenesantosfuentes397@gmail.com', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Beam.jpg', 1, 1, 0, '2024-07-10 18:33:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`),
  ADD KEY `box_ibfk_1` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `operation_type_id` (`operation_type_id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `operation_type`
--
ALTER TABLE `operation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `readjust`
--
ALTER TABLE `readjust`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exito_ibfk_1` (`operation_id`),
  ADD KEY `exito_ibfk_2` (`user_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `box_id` (`box_id`),
  ADD KEY `operation_type_id` (`operation_type_id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `sell_ibfk_4` (`user_id`);

--
-- Indexes for table `spend`
--
ALTER TABLE `spend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `box_id` (`box_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `operation_type`
--
ALTER TABLE `operation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `readjust`
--
ALTER TABLE `readjust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `spend`
--
ALTER TABLE `spend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `box`
--
ALTER TABLE `box`
  ADD CONSTRAINT `box_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `readjust`
--
ALTER TABLE `readjust`
  ADD CONSTRAINT `readjust_ibfk_1` FOREIGN KEY (`operation_id`) REFERENCES `operation` (`id`),
  ADD CONSTRAINT `readjust_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`operation_type_id`) REFERENCES `operation_type` (`id`),
  ADD CONSTRAINT `sell_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `sell_ibfk_3` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sell_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `spend`
--
ALTER TABLE `spend`
  ADD CONSTRAINT `spend_ibfk_1` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
