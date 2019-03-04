-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Feb 27. 23:28
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
-- Tábla szerkezet ehhez a táblához `own_companies`
--

CREATE TABLE `own_companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_address` varchar(254) COLLATE utf8_hungarian_ci NOT NULL,
  `company_tax_number` varchar(254) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `own_companies`
--

INSERT INTO `own_companies` (`company_id`, `company_name`, `company_address`, `company_tax_number`) VALUES
(1, 'Light Pear Kft.', '1111 Budapest Kossuth Lajos Út 1.', '1343213213');

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
(3, 'erwefwef', 'adsfgreag', '2343ewrew234', '3242341231234', 5, 16, 1, 234432, '23%', 'img/blog-kannas-bor-1080x675.png');

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
(5, 'Laptop');

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
(1, 'davad1914', 'Lakó Dávid', 'lakodevid@gmail.com', '6633bc7c5fa7fe26efef7bb663833f7c', 1, 1, 'img/davad.jpg', '303477314'),
(6, 'mindenmegesz', 'Will Smith', 'lakoda@lakoda.hu', '$2y$10$zi3jXYPFfo6HCEJ8pfpnWuQVkwCitutn3mw/9RNNANmUvjTKxZl9G', 1, 1, 'zarovizsga.PNG', '123123'),
(7, 'anyad', 'anyad anyad', 'anyad@anyad.hu', '$2y$10$8ahm/jpIlriaiw6GWYf87eEpRzELCO0sh99UIsujOfoSben02.iBq', 1, 1, 'zarovizsga.PNG', '1234567'),
(8, 'apad', 'apad apad', 'apad@apad.hu', '$2y$10$Z8ZcNCUfs4ARztAi7br13eUeyg/lQKSmmR7qNqdW7vDMn.QtKS3Dm', 2, 1, 'laptop.PNG', '1234567');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

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
-- A tábla indexei `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

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
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `own_companies`
--
ALTER TABLE `own_companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `product_manufacturer`
--
ALTER TABLE `product_manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `product_category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_manufacturer`) REFERENCES `product_manufacturer` (`manufacturer_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_unit`) REFERENCES `unit_type` (`unit_id`);

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_company`) REFERENCES `own_companies` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
