-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Ápr 08. 22:58
-- Kiszolgáló verziója: 10.1.38-MariaDB
-- PHP verzió: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `warehouse`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `aisle`
--

CREATE TABLE `aisle` (
  `aisle_id` int(11) NOT NULL,
  `aisle_stock_place` int(11) NOT NULL,
  `aisle_number` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `aisle`
--

INSERT INTO `aisle` (`aisle_id`, `aisle_stock_place`, `aisle_number`) VALUES
(44, 2, 'asd'),
(45, 2, '123'),
(46, 2, 'kekekek'),
(47, 2, ''),
(48, 2, 'kis Utca'),
(49, 2, 'haha'),
(50, 2, 'éljen'),
(51, 2, 'nemááááááár'),
(52, 2, 'sadasdasd'),
(53, 5, 'mindenhol'),
(54, 5, 'hahaha'),
(55, 5, 'asdasdasd'),
(56, 5, 'naaa'),
(57, 4, 'Jó lesz'),
(58, 3, 'asd'),
(59, 2, 'sadfwaef'),
(60, 3, 'Laptop utca'),
(61, 4, 'sziacica');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bin`
--

CREATE TABLE `bin` (
  `bin_id` int(11) NOT NULL,
  `bin_shelf` int(11) NOT NULL,
  `bin_number` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `bin`
--

INSERT INTO `bin` (`bin_id`, `bin_shelf`, `bin_number`) VALUES
(1, 4, 'asdDoboz'),
(2, 6, 'hehe'),
(3, 7, 'Nemadomoda'),
(4, 8, 'SDFGER'),
(5, 9, 'fdgdf'),
(6, 10, 'elenyésző doboz'),
(7, 11, 'kek');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_address` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_tax_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `contact_email` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `contact_phone_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_user` int(11) NOT NULL,
  `delivery_product` int(11) NOT NULL,
  `delivery_quantity` int(11) NOT NULL,
  `delivery_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_user`, `delivery_product`, `delivery_quantity`, `delivery_invoice`) VALUES
(2, 7, 1, 30, 2),
(3, 7, 1, 2, 3),
(4, 7, 5, 1, 3),
(5, 7, 9, 2, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_user` int(11) NOT NULL,
  `invoice_customer_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `delivery_country` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_pdf` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_user`, `invoice_customer_name`, `delivery_country`, `delivery_address`, `invoice_date`, `invoice_pdf`) VALUES
(2, 7, 'Dávid Lakó', 'Magyarország', '2376-Hernád-Kossuth tér, 1', '2019-03-29 11:42:11', 'invoice-anyad-85-2019-03-29-11-42-11.pdf'),
(3, 7, 'Dávid Lakó', 'Magyarország', '2376-Hernád-Kossuth tér, 1', '2019-03-29 11:56:48', 'invoice-anyad-51-2019-03-29-11-56-48.pdf');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `own_companies`
--

CREATE TABLE `own_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_address` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `company_phone_number` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `company_tax_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_website` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `own_companies`
--

INSERT INTO `own_companies` (`company_id`, `company_name`, `company_address`, `company_email`, `company_phone_number`, `company_tax_number`, `company_website`) VALUES
(1, 'Light Pear Kft.', '1111 Budapest Kossuth Lajos Út 1.', 'light.pear@info.hu', '+36403245325', '1343213213', 'www.lightpear.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `product_description` text COLLATE utf8_hungarian_ci NOT NULL,
  `product_item_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `product_barcode` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `product_category` int(254) NOT NULL,
  `product_manufacturer` int(254) NOT NULL,
  `product_unit` int(254) NOT NULL,
  `product_price` int(254) NOT NULL,
  `product_vat` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `product_image_url` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_item_number`, `product_barcode`, `product_category`, `product_manufacturer`, `product_unit`, `product_price`, `product_vat`, `product_image_url`) VALUES
(1, 'Bosch', 'qwefwqef', '12341234', '21341234', 1, 1, 1, 100000, '31%', 'img/Bosch_WAB20262BY.jpg'),
(2, 'asdasd', 'asdasd', '1231ewdf234', '234123', 5, 16, 4, 123214, '123%', 'img/{56A5DB66-2646-4BE1-AEFA-BFE8555DD379}.png.jpg'),
(3, 'erwefwef', 'adsfgreag', '2343ewrew234', '3242341231234', 5, 16, 1, 234432, '23%', 'img/blog-kannas-bor-1080x675.png'),
(4, 'Kiscsalódás', 'dtzjhrdsht', '43564356', '4564356', 5, 16, 1, 345433, '45%', 'img/kecske.jpg'),
(5, 'Fűnyíró', 'srhstbrts', '1234567', '2465235345234', 5, 15, 1, 20000, '27%', 'img/139975_2.jpg'),
(6, 'Minden Jó', 'sfgafgfe', '23423', '423423', 6, 16, 1, 342234, '4444%', 'img/p20-lite-blk-1.jpg'),
(7, 'Acer laptop', 'sdgafhgr', '9876543210', '234523423', 5, 15, 1, 12000, '23%', 'img/ford_mustang_v8_adv_1_wheels-1920x1080.jpg'),
(8, 'HP alptop', 'qwfqwefqwef', '324234', '234234', 5, 15, 1, 20000, '2321%', 'img/HP-250-E8D87PA-Laptop-Core-i3-3rd-Gen4-GB500-GBDOS.jpg'),
(9, 'Acer laptop ASPIRE 5', 'sdvfravf', '123456789123456789', '234234234', 5, 15, 1, 10222443, '45%', 'img/06-acer-aspire-e15-e5-576g-5762.jpg'),
(10, 'Okirat bazár', 'weefwefwef', '234324', '23423', 1, 16, 1, 4234234, '234234%', 'img/59a8f07754e7108313b47869704a8d24.jpg'),
(11, 'Imbusz kulcs szett', 'ergegadfg', '23412342134', '123124234234', 5, 16, 1, 2147483647, '27%', 'img/bbb-btl-118-hexset-imbuszkulcs.jpg'),
(12, 'Audi r8 sporline', 'ergergergerg', '272727', '234234', 6, 1, 1, 7000000, '27%', 'img/4k-wallpaper-audi-audi-r8-1402787.jpg'),
(13, 'Porsche 911 turbo', 'sgwergwerg', '12342413', '213412342134', 6, 15, 17, 40000000, '27%', 'img/eric-saunders-662582-unsplash.jpg'),
(14, 'Fenyő erdő', 'aegaergwqefgqwef', '2234123412', '1341234', 5, 16, 1, 22, '123123123%', 'img/markos-mant-580527-unsplash.jpg'),
(15, 'ersfvreovpőeomrv', 'wqfwefwqef', '213478123478wdghfji2b89', '23421398271359872139', 5, 16, 17, 23123, '33%', 'img/20181203_085409.jpg'),
(16, 'wefwqefqwefsdc wqcwef', 'wfqwefqwefwefq', '2342334wdfsdc ntegwr', '4423234234', 5, 15, 1, 333333, '425%', 'img/20180925_162528.jpg'),
(17, 'wqfeqwefqwefqwef', 'srvervewvrwervwerh', 'wefqw24wdqqwd', '234234', 5, 15, 1, 234234, '33%', 'img/Névtelen.png'),
(18, 'efthldfgsdasd', 'werwerqwefsayxgfl', 'ááéélj,il', '65456567899999', 6, 15, 4, 345345, '55%', 'img/gx830pqzdhl21.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`) VALUES
(1, 'Számítógép'),
(5, 'Laptop'),
(6, 'kusbcuwbev');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_manufacturer`
--

CREATE TABLE `product_manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `manufacturer_address` varchar(254) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `manufacturer_email` varchar(254) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `product_manufacturer`
--

INSERT INTO `product_manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_address`, `manufacturer_email`) VALUES
(1, 'Apple', 'California', 'apple@apple.com'),
(15, 'Microsoft', 'California 11', ''),
(16, 'Bershka', '', 'Mexikó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `racks`
--

CREATE TABLE `racks` (
  `rack_id` int(11) NOT NULL,
  `rack_aisle` int(11) NOT NULL,
  `rack_number` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `racks`
--

INSERT INTO `racks` (`rack_id`, `rack_aisle`, `rack_number`) VALUES
(7, 44, 'asdutca'),
(8, 44, 'asddd'),
(9, 45, '1234'),
(10, 45, 'wefewf'),
(11, 57, 'igen, az lesz'),
(12, 60, 'Kisasztal polc'),
(13, 53, 'wqefwq'),
(14, 48, 'nagy álvány'),
(15, 58, 'ierjg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `receive`
--

CREATE TABLE `receive` (
  `receive_id` int(11) NOT NULL,
  `receive_user` int(11) NOT NULL,
  `receive_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receive_pdf` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `receive`
--

INSERT INTO `receive` (`receive_id`, `receive_user`, `receive_date`, `receive_pdf`) VALUES
(1, 7, '2019-03-19 10:39:34', 'hehehe'),
(2, 7, '2019-03-21 11:28:45', 'invoice/receive/anyad-49-2019-03-21.pdf'),
(3, 7, '2019-03-21 11:58:55', 'invoice/receive/anyad-91-2019-03-21.pdf'),
(4, 7, '2019-03-21 12:00:24', 'invoice/receive/anyad-50-2019-03-21.pdf'),
(5, 7, '2019-03-21 13:15:20', 'invoice/receive/anyad-68-2019-03-21.pdf'),
(6, 7, '2019-03-21 15:37:59', 'invoice/receive/anyad-2-2019-03-21.pdf'),
(7, 7, '2019-03-21 15:40:56', 'invoice/receive/anyad-6-2019-03-21.pdf'),
(8, 7, '2019-03-21 15:41:47', 'invoice/receive/anyad-72-2019-03-21.pdf'),
(9, 7, '2019-03-21 15:43:05', 'invoice/receive/anyad-99-2019-03-21.pdf'),
(10, 7, '2019-03-21 15:43:44', 'invoice/receive/anyad-14-2019-03-21.pdf'),
(11, 7, '2019-03-21 15:43:46', 'invoice/receive/anyad-46-2019-03-21.pdf'),
(12, 7, '2019-03-21 15:43:46', 'invoice/receive/anyad-90-2019-03-21.pdf'),
(13, 7, '2019-03-21 15:43:59', 'invoice/receive/anyad-21-2019-03-21.pdf'),
(14, 7, '2019-03-21 15:44:40', 'invoice/receive/anyad-12-2019-03-21.pdf'),
(15, 7, '2019-03-21 15:44:41', 'invoice/receive/anyad-59-2019-03-21.pdf'),
(16, 7, '2019-03-21 15:44:56', 'invoice/receive/anyad-73-2019-03-21.pdf'),
(17, 7, '2019-03-21 15:45:19', 'invoice/receive/anyad-60-2019-03-21.pdf'),
(18, 7, '2019-03-21 15:47:42', 'anyad-96-2019-03-21.pdf'),
(19, 7, '2019-03-21 15:48:37', 'anyad-85-2019-03-21.pdf'),
(20, 7, '2019-03-21 15:52:25', 'anyad-10-2019-03-21.pdf'),
(21, 7, '2019-03-24 15:05:06', 'anyad-72-2019-03-24.pdf'),
(22, 7, '2019-03-24 15:06:12', 'anyad-97-2019-03-24.pdf'),
(23, 7, '2019-03-25 11:49:53', 'anyad-65-2019-03-25.pdf'),
(24, 7, '2019-03-27 13:20:53', 'anyad-45-2019-03-27.pdf'),
(25, 7, '2019-03-27 13:22:41', 'anyad-87-2019-03-27.pdf'),
(26, 7, '2019-03-27 14:40:20', 'anyad-20-2019-03-27.pdf'),
(27, 9, '2019-04-08 21:41:47', 'admin-79-2019-04-08.pdf'),
(28, 9, '2019-04-08 22:53:33', 'admin-60-2019-04-08.pdf');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `role_description` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'ADMIN', 'Mindenhez jogot kap'),
(2, 'Irodai munkás', 'Csakis a raktárok adataihoz, és szállítás feladásához férnek hozzá');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` int(11) NOT NULL,
  `shelf_rack` int(11) NOT NULL,
  `shelf_number` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `shelf_rack`, `shelf_number`) VALUES
(4, 7, 'asdPolcika'),
(5, 10, 'asd'),
(6, 11, 'bizonyám'),
(7, 12, 'Nagymennyiségi'),
(8, 13, 'ASDqwd'),
(9, 9, '5555'),
(10, 14, 'közepes polc'),
(11, 15, 'lkrknhirtnh');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `stock_places`
--

CREATE TABLE `stock_places` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `stock_address` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `stock_places`
--

INSERT INTO `stock_places` (`stock_id`, `stock_name`, `stock_address`) VALUES
(0, 'CDFG', 'Kolozsvári út 12.'),
(2, 'AB', '2376 Hernád Kossuth tér 7.'),
(3, 'CD', '1111 Budapest Hungária Kr. 3.'),
(4, 'MD', '2366 Kakucs Kakucsi Út 34.'),
(5, 'DB', '2433 Sárosd Köles utca 4.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `unit_type`
--

CREATE TABLE `unit_type` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `unit_short_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `unit_type`
--

INSERT INTO `unit_type` (`unit_id`, `unit_name`, `unit_short_name`) VALUES
(1, 'Darab', 'db'),
(4, 'Liter', 'l'),
(17, 'asdasdasd', 'asdasdasd');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `user_full_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `user_email` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_role` int(254) NOT NULL,
  `user_company` int(254) NOT NULL,
  `user_image_url` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `user_phone_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_full_name`, `user_email`, `user_password`, `user_role`, `user_company`, `user_image_url`, `user_phone_number`) VALUES
(7, 'adminsdfsd', 'admin user', 'admin@admin.com', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 1, 1, 'zarovizsga.PNG', '1234567'),
(9, 'admin', 'admin admin', 'admin@admin.hu', '$2y$10$t3TMj2EK5ESLeAYNXF.kW.2DIFo61wIpcZGBBAZ5hkB7ku5AD29aS', 1, 1, '06-acer-aspire-e15-e5-576g-5762.jpg', '+36704356543');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `where_is_the_product`
--

CREATE TABLE `where_is_the_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `bin_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `where_is_the_product`
--

INSERT INTO `where_is_the_product` (`id`, `product_id`, `stock_id`, `bin_id`, `receive_id`, `quantity`) VALUES
(9, 5, 3, 3, 1, 3),
(13, 5, 2, 1, 1, 0),
(14, 1, 5, 4, 1, 0),
(15, 5, 2, 1, 3, 0),
(17, 5, 3, 3, 4, 22),
(18, 1, 2, 5, 5, 17),
(19, 5, 3, 3, 5, 22),
(20, 4, 2, 6, 5, 120),
(21, 5, 2, 1, 6, 0),
(22, 5, 2, 1, 7, 2),
(23, 5, 2, 1, 8, 2),
(24, 5, 2, 1, 9, 2),
(25, 5, 2, 1, 10, 1),
(26, 5, 2, 1, 11, 2),
(27, 5, 2, 1, 12, 2),
(28, 5, 2, 1, 13, 2),
(29, 5, 2, 1, 14, 2),
(30, 5, 2, 1, 15, 2),
(31, 5, 2, 1, 16, 2),
(32, 5, 2, 1, 17, 2),
(33, 5, 2, 1, 18, 2),
(34, 5, 2, 1, 19, 2),
(35, 5, 2, 1, 20, 2),
(36, 5, 2, 1, 20, 11),
(37, 1, 3, 3, 20, 3),
(38, 5, 2, 1, 21, 3),
(39, 1, 3, 3, 22, 1),
(40, 1, 2, 1, 23, 4),
(41, 9, 2, 1, 24, 2),
(42, 5, 2, 1, 25, 66),
(43, 5, 3, 7, 26, 333),
(44, 5, 2, 1, 27, 22),
(45, 5, 2, 1, 28, 11);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `aisle`
--
ALTER TABLE `aisle`
  ADD PRIMARY KEY (`aisle_id`),
  ADD KEY `aisle_stock_place` (`aisle_stock_place`);

--
-- A tábla indexei `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`bin_id`),
  ADD KEY `bin_shelf` (`bin_shelf`);

--
-- A tábla indexei `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- A tábla indexei `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `delivery_user` (`delivery_user`),
  ADD KEY `delivery_invoice` (`delivery_invoice`),
  ADD KEY `delivery_product` (`delivery_product`);

--
-- A tábla indexei `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoice_user` (`invoice_user`);

--
-- A tábla indexei `own_companies`
--
ALTER TABLE `own_companies`
  ADD PRIMARY KEY (`company_id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category` (`product_category`,`product_manufacturer`,`product_unit`),
  ADD KEY `product_manufacturer` (`product_manufacturer`),
  ADD KEY `product_unit` (`product_unit`);

--
-- A tábla indexei `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- A tábla indexei `product_manufacturer`
--
ALTER TABLE `product_manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- A tábla indexei `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`rack_id`),
  ADD KEY `rack_aisle` (`rack_aisle`);

--
-- A tábla indexei `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`receive_id`),
  ADD KEY `receive_user` (`receive_user`);

--
-- A tábla indexei `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- A tábla indexei `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`),
  ADD KEY `self_bin` (`shelf_rack`);

--
-- A tábla indexei `stock_places`
--
ALTER TABLE `stock_places`
  ADD PRIMARY KEY (`stock_id`);

--
-- A tábla indexei `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`unit_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role` (`user_role`,`user_company`),
  ADD KEY `user_company` (`user_company`);

--
-- A tábla indexei `where_is_the_product`
--
ALTER TABLE `where_is_the_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`bin_id`,`receive_id`),
  ADD KEY `receive_id` (`receive_id`),
  ADD KEY `bin_id` (`bin_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `aisle`
--
ALTER TABLE `aisle`
  MODIFY `aisle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT a táblához `bin`
--
ALTER TABLE `bin`
  MODIFY `bin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `own_companies`
--
ALTER TABLE `own_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `product_manufacturer`
--
ALTER TABLE `product_manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `racks`
--
ALTER TABLE `racks`
  MODIFY `rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `receive`
--
ALTER TABLE `receive`
  MODIFY `receive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `where_is_the_product`
--
ALTER TABLE `where_is_the_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `aisle`
--
ALTER TABLE `aisle`
  ADD CONSTRAINT `aisle_ibfk_1` FOREIGN KEY (`aisle_stock_place`) REFERENCES `stock_places` (`stock_id`);

--
-- Megkötések a táblához `bin`
--
ALTER TABLE `bin`
  ADD CONSTRAINT `bin_ibfk_1` FOREIGN KEY (`bin_shelf`) REFERENCES `shelf` (`shelf_id`);

--
-- Megkötések a táblához `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`delivery_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`delivery_invoice`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`delivery_product`) REFERENCES `products` (`id`);

--
-- Megkötések a táblához `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`invoice_user`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `product_category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_manufacturer`) REFERENCES `product_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_unit`) REFERENCES `unit_type` (`unit_id`);

--
-- Megkötések a táblához `racks`
--
ALTER TABLE `racks`
  ADD CONSTRAINT `racks_ibfk_1` FOREIGN KEY (`rack_aisle`) REFERENCES `aisle` (`aisle_id`);

--
-- Megkötések a táblához `receive`
--
ALTER TABLE `receive`
  ADD CONSTRAINT `receive_ibfk_1` FOREIGN KEY (`receive_user`) REFERENCES `users` (`user_id`);

--
-- Megkötések a táblához `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`shelf_rack`) REFERENCES `racks` (`rack_id`);

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_company`) REFERENCES `own_companies` (`company_id`);

--
-- Megkötések a táblához `where_is_the_product`
--
ALTER TABLE `where_is_the_product`
  ADD CONSTRAINT `where_is_the_product_ibfk_1` FOREIGN KEY (`receive_id`) REFERENCES `receive` (`receive_id`),
  ADD CONSTRAINT `where_is_the_product_ibfk_3` FOREIGN KEY (`bin_id`) REFERENCES `bin` (`bin_id`),
  ADD CONSTRAINT `where_is_the_product_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `where_is_the_product_ibfk_5` FOREIGN KEY (`stock_id`) REFERENCES `stock_places` (`stock_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
