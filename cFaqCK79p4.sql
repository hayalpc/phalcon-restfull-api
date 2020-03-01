-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Mar 2020, 10:15:05
-- Sunucu sürümü: 8.0.13-4
-- PHP Sürümü: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cFaqCK79p4`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `user_id`, `status`) VALUES
(1, '6JHGEBKU', 0, 0),
(2, 'F6W6XX3B', 0, 0),
(3, '2RPJ8HRA', 0, 0),
(4, '3GX5GWSN', 0, 0),
(5, 'B9YJWJR6', 0, 0),
(6, '6BCXJS7J', 0, 0),
(7, '57VP4MUC', 0, 0),
(8, 'HJSGNGKF', 0, 0),
(9, 'K6XN7YD9', 0, 0),
(10, 'U8UMUKE2', 0, 0),
(11, 'BC3SYNAE', 0, 0),
(12, '472THUJF', 0, 0),
(13, 'F6VJ36ZD', 0, 0),
(14, '62TGZRMG', 0, 0),
(15, 'HUDSTS4W', 0, 0),
(16, 'EEPT7YED', 0, 0),
(17, 'ERC4M4BB', 0, 0),
(18, '9KQRTCAG', 0, 0),
(19, 'KJFZ4BUE', 0, 0),
(20, 'UKQGERFT', 0, 0),
(21, 'LHPJ5HGW', 0, 0),
(22, 'X4RMYEWM', 0, 0),
(23, 'D9RS4Y6K', 0, 0),
(24, '7D42YY3X', 0, 0),
(25, 'LBD2KQWV', 0, 0),
(26, 'AP6EF842', 0, 0),
(27, 'ZYMWFJQV', 0, 0),
(28, '2MPD53CL', 0, 0),
(29, 'RCZFLS77', 0, 0),
(30, '8YVNKU2F', 0, 0),
(31, 'NWCLPL3N', 0, 0),
(32, 'JREPCPJQ', 0, 0),
(33, 'CG5NLGUL', 0, 0),
(34, 'DZCXYLP9', 0, 0),
(35, 'YZVE5V38', 0, 0),
(36, '443AZ5YX', 0, 0),
(37, '8ANM8RAS', 0, 0),
(38, 'DT5E4YH4', 0, 0),
(39, 'V2VB76LE', 0, 0),
(40, 'EQAHYRSZ', 0, 0),
(41, 'Y5HYTPEH', 0, 0),
(42, '8Q8JBUND', 0, 0),
(43, 'P7CCAK68', 0, 0),
(44, 'S8TK2M72', 0, 0),
(45, 'PSGT9SLF', 0, 0),
(46, 'LML8CMXM', 0, 0),
(47, 'V9H5Y3Z6', 0, 0),
(48, 'W445LBPR', 0, 0),
(49, 'MFFJN47V', 0, 0),
(50, 'NYA9893W', 0, 0),
(51, '6Y55R2WS', 0, 0),
(52, 'K38Y49N4', 0, 0),
(53, 'Q2AHKPYV', 0, 0),
(54, 'MFVUCJ9G', 0, 0),
(55, 'LJHYUDT4', 0, 0),
(56, 'Z7FHX28K', 0, 0),
(57, 'KCFWPWG6', 0, 0),
(58, '2LDVPGTR', 0, 0),
(59, 'SXP6FV5K', 0, 0),
(60, 'ZPH2VP3J', 0, 0),
(61, 'ZMKH8X59', 0, 0),
(62, 'ZCVVCRHT', 0, 0),
(63, 'EM4YT6CK', 0, 0),
(64, 'AWC8GN3Q', 0, 0),
(65, 'JCLYZWW8', 0, 0),
(66, 'TR2XY26Z', 0, 0),
(67, 'GMJS5ULD', 0, 0),
(68, 'P8U5SP2K', 0, 0),
(69, '83KB7S7L', 0, 0),
(70, 'NXTTQ2NU', 0, 0),
(71, 'SQJYSXK9', 0, 0),
(72, 'KBD8GJUH', 0, 0),
(73, 'SYKSWETF', 0, 0),
(74, 'FBDWL9PJ', 0, 0),
(75, 'HSUUKLVD', 0, 0),
(76, 'R36LK3SP', 0, 0),
(77, 'XUDPYYYP', 0, 0),
(78, 'SZ53D4NL', 0, 0),
(79, 'K5NXC8KP', 0, 0),
(80, 'FQ5W64HD', 0, 0),
(81, 'STBBPFEL', 0, 0),
(82, 'BJ4SGKPK', 0, 0),
(83, 'KKFNRTRM', 0, 0),
(84, 'J7U73AWP', 0, 0),
(85, 'DUYXRVY9', 0, 0),
(86, 'L2YZVESH', 0, 0),
(87, '64M6ZKEC', 0, 0),
(88, 'WB578DNQ', 0, 0),
(89, '5BVH4ANP', 0, 0),
(90, 'B6TAU9YU', 0, 0),
(91, 'NH2BWET4', 0, 0),
(92, 'PPFTPNWG', 0, 0),
(93, 'TP4QZ98T', 0, 0),
(94, 'K8T95CMC', 0, 0),
(95, 'B6GNUHYN', 0, 0),
(96, 'V7XRPGY4', 0, 0),
(97, '93DAHB5Q', 0, 0),
(98, 'QAP3BT6X', 0, 0),
(99, 'LZVSPQPX', 0, 0),
(100, '2JLCZJT6', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `expire_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'İstanbul',
  `language` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tr',
  `os` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `type` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `weather_forecasts`
--

CREATE TABLE `weather_forecasts` (
  `id` int(11) NOT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `guess` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `weather_forecasts`
--

INSERT INTO `weather_forecasts` (`id`, `city`, `date`, `guess`) VALUES
(1, 'İstanbul', '2020-03-01', 'Parçalı Bulutlu'),
(2, 'Barcelona', '2020-03-01', 'Güneşli'),
(3, 'Osaka', '2020-03-01', 'Güneşli'),
(4, 'Agra', '2020-03-01', 'Yağmurlu'),
(5, 'Las Vegas', '2020-03-01', 'Bulutlu'),
(6, 'Şangay', '2020-03-01', 'Parçalı Bulutlu'),
(7, 'Pattaya', '2020-03-01', 'Güneşli'),
(8, 'Seul', '2020-03-01', 'Rüzgarlı'),
(9, 'Amsterdam', '2020-03-01', 'Parçalı Bulutlu'),
(10, 'Miami', '2020-03-01', 'Güneşli');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Tablo için indeksler `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `weather_forecasts`
--
ALTER TABLE `weather_forecasts`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `weather_forecasts`
--
ALTER TABLE `weather_forecasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
