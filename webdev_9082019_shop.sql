-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 10 2019 г., 13:41
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webdev_9082019_shop`
--
CREATE DATABASE IF NOT EXISTS `webdev_9082019_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webdev_9082019_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`) VALUES
(1, 'Мужчинам'),
(2, 'Женщинам'),
(3, 'Детям');

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs_products`
--

CREATE TABLE IF NOT EXISTS `catalogs_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalogs_products`
--

INSERT INTO `catalogs_products` (`id`, `catalog_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `text` text NOT NULL,
  `sku` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `pic`, `price`, `text`, `sku`) VALUES
(1, 'Синяя куртка', '/images/catalog/1.jpg', 5400, 'Синяя куртка - описание', '324sdfkj343'),
(2, 'Серая куртка', '/images/catalog/2.jpg', 4890, 'Серая куртка - описание', '9898dkjf934'),
(3, 'Кожанка', '/images/catalog/6.jpg', 11900, 'Кожанка - описание', '234234kkk3'),
(4, 'Женские кеды', '/images/catalog/7.jpg', 4900, 'Женские кеды - описание', '99dd99df2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
