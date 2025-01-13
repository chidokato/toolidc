-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2025 lúc 04:12 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `toolmkt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `channels`
--

INSERT INTO `channels` (`id`, `user_id`, `name`, `parent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Digital', 0, '2024-12-26 20:34:57', '2025-01-07 01:02:30'),
(2, 1, 'Facebook', 1, '2025-01-07 01:02:41', '2025-01-07 01:02:41'),
(3, 1, 'Google', 1, '2025-01-07 01:02:53', '2025-01-07 01:02:53'),
(4, 1, 'Zalo', 1, '2025-01-07 01:03:00', '2025-01-07 01:03:00'),
(5, 1, 'Tiktok', 1, '2025-01-07 01:03:07', '2025-01-07 01:03:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Melody Linh Đàm', 1, '2025-01-07 00:56:36', '2025-01-07 00:56:36'),
(2, 'Hoàng Thành Pearl', 1, NULL, NULL),
(3, 'Le Grand Jardin', 1, NULL, NULL),
(4, 'Berriver Jardin', 1, NULL, NULL),
(5, 'Sun Riverpolis', 1, NULL, NULL),
(6, 'Eurowindow Twin Parks', 1, NULL, NULL),
(7, 'Evergreen Bắc Giang', 1, NULL, NULL),
(8, 'VCI Tower', 1, NULL, NULL),
(9, 'Phương Đông Green Home', 1, NULL, NULL),
(10, 'Global Masterise', 1, NULL, NULL),
(11, 'Euro Green Park', 1, NULL, NULL),
(12, 'Tecco Diamond', 1, NULL, NULL),
(13, 'Heritage Westlake', 1, NULL, NULL),
(14, 'The Park Home', 1, NULL, NULL),
(15, 'Dolce Penisola QB', 1, NULL, NULL),
(16, 'Tecco Elitte City', 1, NULL, NULL),
(17, 'Tecco Garden', 1, NULL, NULL),
(18, 'Regal Legend', 1, NULL, NULL),
(19, 'The Zei', 1, NULL, NULL),
(20, 'The Sailing Quy Nhơn', 1, NULL, NULL),
(21, 'La Queenara', 1, NULL, NULL),
(22, 'Hội An D\'or', 1, NULL, NULL),
(23, 'Happy Land', 1, NULL, NULL),
(24, 'Long Beach', 1, NULL, NULL),
(25, 'Rose Town', 1, NULL, NULL),
(26, 'FLC Quảng Bình', 1, NULL, NULL),
(27, 'Sunshine Garden', 1, NULL, NULL),
(28, 'Sunshine Center', 1, NULL, NULL),
(29, 'Sunshine City', 1, NULL, NULL),
(30, 'Imperia Smart City', 1, NULL, NULL),
(31, 'Eurowindow River Park', 1, NULL, NULL),
(32, 'The Matrix One', 1, NULL, NULL),
(33, 'Ocean Dragon Đồ Sơn', 1, NULL, NULL),
(34, 'Masteri West Heights', 1, NULL, NULL),
(35, 'An Phú Cần Thơ', 1, NULL, NULL),
(36, 'Vin Phú Quốc', 1, NULL, NULL),
(37, 'Lotus Star Bắc Giang', 1, NULL, NULL),
(38, '9 Downtown Lương Sơn', 1, NULL, NULL),
(39, 'Casa Del Rio', 1, NULL, NULL),
(40, 'HC Golden Long Biên', 1, NULL, NULL),
(41, 'Picenza Riverside', 1, NULL, NULL),
(42, 'Highway5 Residences', 1, NULL, NULL),
(43, 'The Felix Land', 1, NULL, NULL),
(44, 'Phương Đông Vân Đồn', 1, NULL, NULL),
(45, 'Phoenix Từ Sơn', 1, NULL, NULL),
(46, 'Long Châu Star', 1, NULL, NULL),
(47, 'Masteri Waterfront', 1, NULL, NULL),
(48, 'The 6Nature Da Nang', 1, NULL, NULL),
(49, 'Thera Premium', 1, NULL, NULL),
(50, 'Melody Ciputra', 1, NULL, NULL),
(51, 'Tiền Hải Center City', 1, NULL, NULL),
(52, 'NovaWorld Phan Thiet', 1, NULL, NULL),
(53, 'Vlasta Sầm Sơn', 1, NULL, NULL),
(54, 'KN Para Vela', 1, NULL, NULL),
(55, 'Green Pearl Bắc Ninh', 1, NULL, NULL),
(56, 'KVG Mozzadiso Nha Trang', 1, NULL, NULL),
(57, 'Kim Đô Policity', 1, NULL, NULL),
(58, 'The Dragon Castle Hạ Long', 1, NULL, NULL),
(59, 'The Grand Sentosa', 1, NULL, NULL),
(60, 'Meyhomes Capital Phú Quốc', 1, NULL, NULL),
(61, 'Happy Home Cà Mau', 1, NULL, NULL),
(62, 'Thera Premium Phú Yên', 1, NULL, NULL),
(63, 'The Alpha Residence', 1, NULL, NULL),
(64, 'Lancaster Legacy', 1, NULL, NULL),
(65, 'Lancaster Luminaire', 1, NULL, NULL),
(66, 'Nậm Khắt Mù Căng Chải', 1, NULL, NULL),
(67, 'Leasing', 1, NULL, NULL),
(68, 'Essensia Nam Sài Gòn', 1, NULL, NULL),
(69, 'La Casta Tower', 1, NULL, NULL),
(70, 'The 9 Stellars', 1, NULL, NULL),
(71, 'Phúc Hưng Golden', 1, NULL, NULL),
(72, 'De La Sol', 1, NULL, NULL),
(73, 'Ruby Suites', 1, NULL, NULL),
(74, 'Ecolife', 1, NULL, NULL),
(75, 'Moonlight An Lạc', 1, NULL, NULL),
(76, 'Diamond Hill', 1, NULL, NULL),
(77, 'The Filmore', 1, NULL, NULL),
(78, 'Epic Tower', 1, NULL, NULL),
(79, 'BRG Diamond Residence LVL', 1, NULL, NULL),
(80, 'Branding chung', 1, NULL, NULL),
(81, 'The Zeit Thủ Thiêm', 1, NULL, NULL),
(82, 'Avatar Thủ Đức', 1, NULL, NULL),
(83, 'Grand Sunlake', 1, NULL, NULL),
(84, 'Phoenix Legend', 1, NULL, NULL),
(85, 'Hoàng Huy Commerce HP', 1, NULL, NULL),
(86, 'Dragon Castle', 1, NULL, NULL),
(87, 'MHD Trung Văn', 1, NULL, NULL),
(88, 'In ấn', 1, NULL, NULL),
(89, 'Tuyển dụng', 1, NULL, NULL),
(90, 'Capital Elite', 1, NULL, NULL),
(91, 'Hinode City', 1, NULL, NULL),
(92, 'Vinhomes Sky Park Bắc Giang', 1, NULL, NULL),
(93, 'Hà Nội Paragon', 1, NULL, NULL),
(94, 'Vinhomes Smart City', 1, NULL, NULL),
(95, 'HUD Mê Linh', 1, NULL, NULL),
(96, 'Vinhomes Móng Cái', 1, NULL, NULL),
(97, 'Hateco Laroma', 1, NULL, NULL),
(98, 'Bonanza', 1, NULL, NULL),
(99, 'Skyline West Lake', 1, NULL, NULL),
(100, 'Discovery Cầu Giấy', 1, NULL, NULL),
(101, 'Lux City Cẩm Phả', 1, NULL, NULL),
(102, 'Evergreen Bắc Giang', 1, NULL, NULL),
(103, 'Safabay Cẩm Phả', 1, NULL, NULL),
(104, 'Lumi Hà Nội Capitaland', 1, NULL, NULL),
(105, 'LUMIÈRE EVERGREEN', 1, NULL, NULL),
(106, 'Event Singapore', 1, NULL, NULL),
(107, 'Sycamore Capitaland', 1, NULL, NULL),
(108, 'Vinhomes Royal Island Vũ Yên', 1, NULL, NULL),
(109, 'Trust City Hưng Yên', 1, NULL, NULL),
(110, 'The Sola Park', 1, NULL, NULL),
(111, 'Eco Green Sài Gòn', 1, NULL, NULL),
(112, 'Libera Nha Trang', 1, NULL, NULL),
(113, 'Saigontel', 1, NULL, NULL),
(114, 'Discovery 8B Lê Trực', 1, NULL, NULL),
(115, 'Lakeside Village', 1, NULL, NULL),
(116, '90 Đường Láng', 1, NULL, NULL),
(117, 'HINODE WISTERIA', 1, NULL, NULL),
(118, 'Grand Melia Nha Trang', 1, NULL, NULL),
(119, 'The Miami GS5', 1, NULL, NULL),
(120, 'The Victoria', 1, NULL, NULL),
(121, 'Senique Hà Nội', 1, NULL, NULL),
(122, 'Vinhomes Cổ Loa', 1, NULL, NULL),
(123, 'KĐT Nam Cường', 1, NULL, NULL),
(124, 'LaVida', 1, NULL, NULL),
(125, 'Tokyu Retread Thanh Thuỷ', 1, NULL, NULL),
(126, 'Caraworld Nha Trang', 1, NULL, NULL),
(127, 'Vinaconex Chợ Mơ', 1, NULL, NULL),
(128, 'Eaton Park Gamuda', 1, NULL, NULL),
(129, 'Global City', 1, NULL, NULL),
(130, 'Gem Park', 1, NULL, NULL),
(131, 'Viha Complex', 1, NULL, NULL),
(132, 'Cara River Park', 1, NULL, NULL),
(133, 'The Nelson 29 Láng Hạ', 1, NULL, NULL),
(134, 'Cara River Park Cần Thơ', 1, NULL, NULL),
(135, 'Ben Hill - Bình Dương', 1, NULL, NULL),
(136, 'Artisan Park', 1, NULL, NULL),
(137, 'Luxora', 1, NULL, NULL),
(138, 'Mascity', 1, NULL, NULL),
(139, 'Shoshin Bình Thanh', 1, NULL, NULL),
(140, 'Golden Crown', 1, NULL, NULL),
(141, 'Sun Đà Nẵng', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Facebook', '2025-01-06 02:11:18', '2025-01-06 02:11:18'),
(2, 1, 'Google', '2025-01-06 02:11:32', '2025-01-06 02:11:32'),
(3, 1, 'Zalo', '2025-01-06 02:12:02', '2025-01-06 02:12:02'),
(4, 1, 'Tiktok', '2025-01-06 02:12:48', '2025-01-06 02:13:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `support_rate` varchar(20) DEFAULT NULL,
  `confirm` varchar(20) DEFAULT NULL,
  `expected_costs` varchar(20) DEFAULT NULL,
  `actual_costs` varchar(20) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `parent`, `created_at`, `updated_at`) VALUES
(1, 1, 'INDOCHINE', 0, '2025-01-06 01:02:20', '2025-01-06 01:16:48'),
(2, 1, 'Sàn Nước Ngoài (Trà Mi)', 1, '2025-01-06 01:02:48', '2025-01-06 01:02:48'),
(3, 1, 'Nguyễn Xuân Trà Mi', 2, '2025-01-06 01:03:02', '2025-01-06 01:03:02'),
(4, 1, 'Cà Duy Dự', 2, '2025-01-06 01:03:36', '2025-01-06 01:03:36'),
(5, 1, 'Sàn Quốc Tế - Hằng Võ', 1, '2025-01-06 01:03:52', '2025-01-06 01:03:52'),
(6, 1, 'Võ Thị Diễm Hằng', 5, '2025-01-06 01:03:59', '2025-01-06 01:03:59'),
(7, 1, 'Chi Nhánh Hồ Chí Minh', 1, '2025-01-06 01:04:37', '2025-01-06 01:04:37'),
(8, 1, 'Phạm Trung Tín', 7, '2025-01-06 01:04:44', '2025-01-06 01:04:44'),
(9, 1, 'Chi Nhánh Bắc Giang', 1, '2025-01-06 01:04:52', '2025-01-06 01:04:52'),
(10, 1, 'Dương Văn Phong', 9, '2025-01-06 01:04:59', '2025-01-06 01:04:59'),
(11, 1, 'Chi Nhánh Đà Nẵng', 1, '2025-01-06 01:05:07', '2025-01-06 01:05:07'),
(12, 1, 'Đặng Việt Anh', 11, '2025-01-06 01:05:17', '2025-01-06 01:05:17'),
(13, 1, 'Chi Nhánh Hạ Long', 1, '2025-01-06 01:05:25', '2025-01-06 01:05:25'),
(14, 1, 'Trần Thị Chung', 13, '2025-01-06 01:05:33', '2025-01-06 01:05:33'),
(15, 1, 'Chi Nhánh Hà Nội', 1, '2025-01-06 01:05:41', '2025-01-06 01:05:41'),
(16, 1, 'Vũ Thị Lý', 15, '2025-01-06 01:05:48', '2025-01-06 01:05:48'),
(17, 1, 'Chi Nhánh Duyên Hải', 1, '2025-01-06 01:05:56', '2025-01-06 01:05:56'),
(18, 1, 'Nguyễn Thanh Tuấn', 17, '2025-01-06 01:06:02', '2025-01-06 01:06:02'),
(19, 1, 'Chi Nhánh Nghỉ Dưỡng', 1, '2025-01-06 01:06:10', '2025-01-06 01:06:10'),
(20, 1, 'Nguyễn Mạnh Tú', 19, '2025-01-06 01:06:17', '2025-01-06 01:06:17'),
(21, 1, 'Chi Nhánh Nam Trung Bộ', 1, '2025-01-06 01:06:27', '2025-01-06 01:06:27'),
(22, 1, 'Nguyễn Ngọc Duy', 21, '2025-01-06 01:06:35', '2025-01-06 01:06:35'),
(23, 1, 'LS VÀ RS', 1, '2025-01-06 01:06:45', '2025-01-06 01:06:45'),
(24, 1, 'Nguyễn Mậu Hòa', 23, '2025-01-06 01:06:53', '2025-01-06 01:06:53'),
(25, 1, 'Ban Lãnh Đạo', 1, '2025-01-06 01:07:00', '2025-01-06 01:07:00'),
(26, 1, 'Lê Thị Hằng', 25, '2025-01-06 01:07:05', '2025-01-06 01:07:05'),
(27, 1, 'Sàn Liên Kết', 1, '2025-01-06 01:07:21', '2025-01-06 01:07:21'),
(28, 1, 'Lê Thị Thùy Chi', 27, '2025-01-06 01:07:28', '2025-01-06 01:07:28'),
(29, 1, 'VIETNAM HOMES', 0, '2025-01-06 01:07:56', '2025-01-06 01:17:03'),
(30, 1, 'Sàn Hội Sở - Doãn Phong', 29, '2025-01-06 01:08:07', '2025-01-06 01:08:07'),
(31, 1, 'Trần Doãn Phong', 30, '2025-01-06 01:08:15', '2025-01-06 01:08:15'),
(32, 1, 'Nguyễn Văn Tài', 30, '2025-01-06 01:08:23', '2025-01-06 01:08:23'),
(33, 1, 'Nguyễn Trung Kiên', 30, '2025-01-06 01:08:30', '2025-01-06 01:08:30'),
(34, 1, 'Đặng Tiến Nam', 30, '2025-01-06 01:08:37', '2025-01-06 01:08:37'),
(35, 1, 'Sàn Thủ Đô - Hoàng Cương', 29, '2025-01-06 01:08:45', '2025-01-06 01:08:45'),
(36, 1, 'Hoàng Minh Cương', 35, '2025-01-06 01:08:54', '2025-01-06 01:08:54'),
(37, 1, 'Nguyễn Thị Thu Trang', 35, '2025-01-06 01:09:02', '2025-01-06 01:09:02'),
(38, 1, 'Lê Văn Ninh', 35, '2025-01-06 01:09:10', '2025-01-06 01:09:10'),
(39, 1, 'Nguyễn Tuấn Nghĩa', 35, '2025-01-06 01:09:22', '2025-01-06 01:09:22'),
(40, 1, 'Sàn Quốc Tế (Chiến Trường)', 29, '2025-01-06 01:09:32', '2025-01-06 01:09:32'),
(41, 1, 'Phạm Chiến Trường', 40, '2025-01-06 01:10:02', '2025-01-06 01:10:02'),
(42, 1, 'Nguyễn Diệp Thảo', 40, '2025-01-06 01:10:08', '2025-01-06 01:10:08'),
(43, 1, 'Đoàn Tuấn Đức', 40, '2025-01-06 01:10:18', '2025-01-06 01:10:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `yourname` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `team_id`, `name`, `sku`, `img`, `gender`, `yourname`, `email`, `address`, `rank`, `total`, `phone`, `facebook`, `permission`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Nguyễn Văn Tuấn 4444', 'IDC0116', '430283906_1776968522811987_8281687731139390845_n.jpg', 'Nam', 'Tuấn Nguyễn', 'tuan.pn92@gmail.com', 'Hà Nội ádasd', 'Kim cương', '36097000', '0977572947', 'sdfsdfsdf', 1, NULL, '$2y$10$9fz78ri8PAvBIbSerrENiuTjo5WlAXRXdfCtkh.40ByOcTeSNYCsO', NULL, '2023-03-20 09:17:19', '2024-12-26 20:30:18'),
(10, 0, NULL, 'IDC0001', NULL, NULL, 'Lê Thị Hằng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 0, NULL, 'IDC0002', NULL, NULL, 'Nguyễn Hoàng Tùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, NULL, 'IDC0003', NULL, NULL, 'Nguyễn Hải Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, NULL, 'IDC0006', NULL, NULL, 'Lê Thu Thuỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0, NULL, 'IDC0009', NULL, NULL, 'Nguyễn Xuân Trà Mi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 0, NULL, 'IDC0010', NULL, NULL, 'Võ Thị Diễm Hằng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 0, NULL, 'IDC0011', NULL, NULL, 'Nguyễn Thị Thu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 0, NULL, 'IDC0013', NULL, NULL, 'Nguyễn Thị Uyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 0, NULL, 'IDC0015', NULL, NULL, 'Cà Duy Dự', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 0, NULL, 'IDC0016', NULL, NULL, 'Trịnh Thị Hải Yến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 0, NULL, 'IDC0025', NULL, NULL, 'Trịnh Thị Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 0, NULL, 'IDC0027', NULL, NULL, 'Hoàng Thị Thanh Vân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 0, NULL, 'IDC0031', NULL, NULL, 'Lê Thanh Tùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 0, NULL, 'IDC0035', NULL, NULL, 'Ngô Thị Lành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 0, NULL, 'IDC0036', NULL, NULL, 'Đoàn Tuấn Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 0, NULL, 'IDC0039', NULL, NULL, 'Nguyễn Hải Vân Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 0, NULL, 'IDC0053', NULL, NULL, 'Hoàng Kim Phượng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 0, NULL, 'IDC0063', NULL, NULL, 'Nguyễn Tiến Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 0, NULL, 'IDC0072', NULL, NULL, 'Nguyễn Mậu Hòa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 0, NULL, 'IDC0073', NULL, NULL, 'Phan Văn Kiên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 0, NULL, 'IDC0079', NULL, NULL, 'Nguyễn Ngọc Duy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 0, NULL, 'IDC0080', NULL, NULL, 'Nguyễn Xuân Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 0, NULL, 'IDC0108', NULL, NULL, 'Dương Hoàng Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 0, NULL, 'IDC0112', NULL, NULL, 'Đoàn Thị Thanh Tâm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 0, NULL, 'IDC0113', NULL, NULL, 'Trần Thị Huyền Trang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 0, NULL, 'IDC0117', NULL, NULL, 'Trần Thị Hoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 0, NULL, 'IDC0118', NULL, NULL, 'Nguyễn Sỹ Phượng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 0, NULL, 'IDC0119', NULL, NULL, 'Trần Thanh Tùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 0, NULL, 'IDC0125', NULL, NULL, 'Kim Lê Dinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 0, NULL, 'IDC0127', NULL, NULL, 'Trịnh Thị Hải Yến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 0, NULL, 'IDC0131', NULL, NULL, 'Hoàng Quốc Cường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 0, NULL, 'IDC0133', NULL, NULL, 'Tô Thị Thanh Thuận', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 0, NULL, 'IDC0134', NULL, NULL, 'Nguyễn Thanh Tuấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 0, NULL, 'IDC0141', NULL, NULL, 'Nguyễn Thị Ngọc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 0, NULL, 'IDC0142', NULL, NULL, 'Nguyễn Thu Thuỷ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 0, NULL, 'IDC0143', NULL, NULL, 'Lê Thị Tuyết', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 0, NULL, 'IDC0146', NULL, NULL, 'Lê thị Nga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 0, NULL, 'IDC0148', NULL, NULL, 'Nguyễn Tiến Thành', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 0, NULL, 'IDC0149', NULL, NULL, 'Nguyễn Long Phúc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 0, NULL, 'IDC0153', NULL, NULL, 'Hoàng Thị Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 0, NULL, 'IDC0158', NULL, NULL, 'Mai Hồng Yến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 0, NULL, 'IDC0161', NULL, NULL, 'Đặng Trường Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 0, NULL, 'IDC0165', NULL, NULL, 'Đặng Trường Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 0, NULL, 'IDC0169', NULL, NULL, 'Nguyễn Thúy Lan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 0, NULL, 'IDC0179', NULL, NULL, 'Phạm Thanh Hoà', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 0, NULL, 'IDC0190', NULL, NULL, 'Hoàng Minh Cương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 0, NULL, 'IDC0191', NULL, NULL, 'Đỗ Thị Minh Trang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 0, NULL, 'IDC0192', NULL, NULL, 'Đỗ Huyền Trang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 0, NULL, 'IDC0202', NULL, NULL, 'Đinh Văn Quân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 0, NULL, 'IDC0203', NULL, NULL, 'Đinh Tuấn Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 0, NULL, 'IDC0204', NULL, NULL, 'Vũ Tuấn Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 0, NULL, 'IDC0205', NULL, NULL, 'Trịnh Hoài Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 0, NULL, 'IDC0206', NULL, NULL, 'Kiều Hồng Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 0, NULL, 'IDC0207', NULL, NULL, 'Kiều Đức Mạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 0, NULL, 'IDC0208', NULL, NULL, 'Nguyễn Văn Giang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 0, NULL, 'IDC0210', NULL, NULL, 'Nguyễn Văn Huy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 0, NULL, 'IDC0217', NULL, NULL, 'Trần Thị Chung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 0, NULL, 'IDC0218', NULL, NULL, 'Trần Doãn Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 0, NULL, 'IDC0220', NULL, NULL, 'Phùn Thị Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 0, NULL, 'IDC0221', NULL, NULL, 'Khổng Ngọc Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 0, NULL, 'IDC0222', NULL, NULL, 'Nguyễn Gia Thắng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 0, NULL, 'IDC0230', NULL, NULL, 'Nguyễn Đình Hiếu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 0, NULL, 'IDC0231', NULL, NULL, 'Bùi Văn Lộc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 0, NULL, 'IDC0235', NULL, NULL, 'Phạm Thái Duy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 0, NULL, 'IDC0244', NULL, NULL, 'Hoàng Hạnh Thông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 0, NULL, 'IDC0246', NULL, NULL, 'Nguyễn Văn Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 0, NULL, 'IDC0247', NULL, NULL, 'Trần Văn Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 0, NULL, 'IDC0248', NULL, NULL, 'Lê Văn Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 0, NULL, 'IDC0251', NULL, NULL, 'Nguyễn Việt Vương', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 0, NULL, 'IDC0252', NULL, NULL, 'Nguyễn Thanh Tùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 0, NULL, 'IDC0253', NULL, NULL, 'Trần Thị Thu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 0, NULL, 'IDC0254', NULL, NULL, 'Nguyễn Văn Tài', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 0, NULL, 'IDC0255', NULL, NULL, 'Nguyễn Thị Thuỳ Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 0, NULL, 'IDC0258', NULL, NULL, 'Lê Thị Diên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 0, NULL, 'IDC0259', NULL, NULL, 'Đặng Tiến Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 0, NULL, 'IDC0260', NULL, NULL, 'Đỗ Tuấn Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 0, NULL, 'IDC0261', NULL, NULL, 'Vũ Đình Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 0, NULL, 'IDC0262', NULL, NULL, 'Vũ Thị Lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 0, NULL, 'IDC0263', NULL, NULL, 'Bùi Huy Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 0, NULL, 'IDC0264', NULL, NULL, 'Tống Mạnh Cường', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 0, NULL, 'IDC0266', NULL, NULL, 'Đinh Văn Quân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 0, NULL, 'IDC0271', NULL, NULL, 'Ngô Văn Hiệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 0, NULL, 'IDC0274', NULL, NULL, 'Nguyễn Hữu Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 0, NULL, 'IDC0275', NULL, NULL, 'Nguyễn Anh Quân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 0, NULL, 'IDC0276', NULL, NULL, 'Đoàn Như Hiệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 0, NULL, 'IDC0277', NULL, NULL, 'Nguyễn Thị Minh Chiển', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 0, NULL, 'IDC0278', NULL, NULL, 'Đỗ Trọng Hùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 0, NULL, 'IDC0281', NULL, NULL, 'Ngô Trung Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 0, NULL, 'IDC0282', NULL, NULL, 'Hoàng thị Huế', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 0, NULL, 'IDC0284', NULL, NULL, 'Vũ Ngọc Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 0, NULL, 'IDC0285', NULL, NULL, 'Nguyễn Tuấn Nghĩa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 0, NULL, 'IDC0287', NULL, NULL, 'Nguyễn Thị Mai Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 0, NULL, 'IDC0288', NULL, NULL, 'Thanh Hải', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 0, NULL, 'IDC0290', NULL, NULL, 'Nguyễn Thị Thuỳ Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 0, NULL, 'IDC0291', NULL, NULL, 'Đinh Khắc Dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 0, NULL, 'IDC0292', NULL, NULL, 'Kiều Văn Quân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 0, NULL, 'IDC0296', NULL, NULL, 'Lê văn dũng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 0, NULL, 'IDC0297', NULL, NULL, 'Trần Thị Huế', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 0, NULL, 'IDC0298', NULL, NULL, 'Phạm Thảo Vy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 0, NULL, 'IDC0300', NULL, NULL, 'Nguyễn Thị Bích Ngọc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 0, NULL, 'IDC0301', NULL, NULL, 'Lê Thị Dung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 0, NULL, 'IDC0302', NULL, NULL, 'Nguyễn Hữu Đức', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 0, NULL, 'IDC0303', NULL, NULL, 'Bùi Bích Lan Vi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 0, NULL, 'IDC0304', NULL, NULL, 'Phạm Thế Vinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 0, NULL, 'IDC0305', NULL, NULL, 'Phạm Chí Hiếu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 0, NULL, 'IDC0308', NULL, NULL, 'Nguyễn Minh Hiếu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 0, NULL, 'IDC0311', NULL, NULL, 'Nguyễn Phương Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 0, NULL, 'IDC0312', NULL, NULL, 'Nguyễn Cao Duy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 0, NULL, 'IDC0314', NULL, NULL, 'Dương Văn Phong', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 0, NULL, 'IDC0315', NULL, NULL, 'Đào Thị Duyên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 0, NULL, 'IDC0316', NULL, NULL, 'Hoàng Thị Huyền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 0, NULL, 'IDC0318', NULL, NULL, 'Nguyễn Đăng Hưng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 0, NULL, 'IDC0319', NULL, NULL, 'Phan Công Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 0, NULL, 'IDC0321', NULL, NULL, 'Đào Thị Thư Thái', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 0, NULL, 'IDC0322', NULL, NULL, 'Phạm Thuỳ Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 0, NULL, 'IDC0325', NULL, NULL, 'Trần Đình Hùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 0, NULL, 'IDC0327', NULL, NULL, 'Vũ Văn Luận', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 0, NULL, 'IDC0329', NULL, NULL, 'Trần Phúc Nghĩa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 0, NULL, 'IDC0330', NULL, NULL, 'Nguyễn Đức Minh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 0, NULL, 'IDC0331', NULL, NULL, 'Trần Đình Huy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 0, NULL, 'IDC0335', NULL, NULL, 'Trần Minh Tuấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 0, NULL, 'IDC0337', NULL, NULL, 'Dương Anh Tài', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 0, NULL, 'IDC0338', NULL, NULL, 'Hoàng Ngọc Ánh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 0, NULL, 'IDC0339', NULL, NULL, 'Ngô Thị Xuân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 0, NULL, 'IDC0341', NULL, NULL, 'Đỗ Thị Lan Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 0, NULL, 'IDC0346', NULL, NULL, 'Bồn Văn Mạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 0, NULL, 'IDC0348', NULL, NULL, 'Hà Duy Tấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 0, NULL, 'IDC0350', NULL, NULL, 'Đặng Đức Thuận', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 0, NULL, 'IDC0351', NULL, NULL, 'Nguyễn Văn Đạo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 0, NULL, 'IDC0354', NULL, NULL, 'Nguyễn Hồng Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 0, NULL, 'IDC0357', NULL, NULL, 'Lê Thị Thùy Chi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 0, NULL, 'IDC0358', NULL, NULL, 'Lê Tiến Hiệp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 0, NULL, 'IDC0362', NULL, NULL, 'Nguyễn thị Luyến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 0, NULL, 'IDC0364', NULL, NULL, 'BÙI TRUNG ĐỨC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 0, NULL, 'IDC0365', NULL, NULL, 'Nguyễn Trung Kiên', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 0, NULL, 'IDC0366', NULL, NULL, 'Nguyễn Hưng Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 0, NULL, 'IDC0368', NULL, NULL, 'Nguyễn Thị Hiền', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 0, NULL, 'IDC0371', NULL, NULL, 'Vũ Thị Tuyết', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 0, NULL, 'IDC0372', NULL, NULL, 'Nguyễn Thị Phương Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 0, NULL, 'IDC0373', NULL, NULL, 'Phạm Văn Hưởng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 0, NULL, 'IDC0375', NULL, NULL, 'Phạm Mai Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 0, NULL, 'IDC0376', NULL, NULL, 'Hà Quang Ninh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 0, NULL, 'IDC0377', NULL, NULL, 'Nguyễn Đức Tuấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 0, NULL, 'IDC0378', NULL, NULL, 'Trần Anh Sơn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 0, NULL, 'IDC0379', NULL, NULL, 'Nông Mai Lan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 0, NULL, 'IDC0380', NULL, NULL, 'Chu Anh Kiệt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 0, NULL, 'IDC0386', NULL, NULL, 'Hoàng Ngọc Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 0, NULL, 'IDC0387', NULL, NULL, 'Bùi Phương Thảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 0, NULL, 'IDC0388', NULL, NULL, 'Nguyễn Thị Ngọc Trinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 0, NULL, 'IDC0389', NULL, NULL, 'Đỗ Hoàng Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 0, NULL, 'IDC0390', NULL, NULL, 'Vũ Thị Lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 0, NULL, 'IDC0393', NULL, NULL, 'Nguyễn Duy Công', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 0, NULL, 'IDC0394', NULL, NULL, 'Dương Thị Hằng Nga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 0, NULL, 'IDC0395', NULL, NULL, 'Trần Hoa Thơm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 0, NULL, 'IDC0401', NULL, NULL, 'Ngô Tuấn Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 0, NULL, 'IDC0402', NULL, NULL, 'Dương Văn Tuyến', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 0, NULL, 'IDC0404', NULL, NULL, 'Nguyễn Tùng Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 0, NULL, 'IDC0407', NULL, NULL, 'Mai Khắc Huy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 0, NULL, 'IDC0408', NULL, NULL, 'Nguyễn Tuấn Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 0, NULL, 'IDC0413', NULL, NULL, 'Trần Trọng Tấn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 0, NULL, 'IDC0417', NULL, NULL, 'Nguyễn Phương Đông', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 0, NULL, 'IDC0423', NULL, NULL, 'Nguyễn Lê Vân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 0, NULL, 'IDC0424', NULL, NULL, 'Khổng Ngọc Linh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 0, NULL, 'IDC0427', NULL, NULL, 'Đặng Việt Anh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 0, NULL, 'IDC0439', NULL, NULL, 'Lê Tiến Quân', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 0, NULL, 'IDC0445', NULL, NULL, 'Nguyễn Chí Hậu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 0, NULL, 'IDC0452', NULL, NULL, 'Nguyễn Thị Hạnh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 0, NULL, 'IDC0453', NULL, NULL, 'Tuấn Minh Hùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 0, NULL, 'IDC0467', NULL, NULL, 'Hoàng Thị Phương Thảo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 0, NULL, 'IDC0468', NULL, NULL, 'Tiêu Hồng Thắm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
