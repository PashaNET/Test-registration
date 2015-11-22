-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 16 2015 г., 01:50
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(150) NOT NULL,
  `secondName` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phoneNumber` varchar(150) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city_address` varchar(50) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `city_edu` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `edu_field` varchar(100) NOT NULL,
  `add_info` varchar(500) NOT NULL,
  `fotoName` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `secondName`, `date`, `user_status`, `email`, `phoneNumber`, `country`, `city_address`, `street_address`, `education`, `city_edu`, `school`, `edu_field`, `add_info`, `fotoName`, `pass`) VALUES
(48, 'Anthony        ', 'Norman   ', '0000-00-00', 0, 'test@gmail.com', '044 555 698 6', 'United States ', 'Washington', 'Brooklyn Navy Yard street, 08458766', 'Doctoral Degree', 'Cambridge', 'Harvard University ', 'Harvard University Health Services  Physical Therapy', 'Patients come in all different shapes and sizes. They also speak many different languages. Whether you are working abroad or at home, there will come a time when you will need to rely on English to communicate. ', 'uploads/1426461681.png', '$2y$10$LoCiCzENKg4RFCZYBDz5PeaP6ys9W3m1BADibvS4uaN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
