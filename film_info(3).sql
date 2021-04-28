-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 15 2020 г., 19:59
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `film_info`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `intro` text NOT NULL,
  `age_min` text NOT NULL,
  `photo` text NOT NULL,
  `duration` time NOT NULL,
  `genre` text NOT NULL,
  `year` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `name`, `intro`, `age_min`, `photo`, `duration`, `genre`, `year`) VALUES
(10, 'Слава', 'Слава сидит и смотрит в камеру', '4', '4a33fa736182a57ad1762b3c70163f5a.jpg', '01:20:00', 'хорор', '2019'),
(11, 'Слава-яьдус', 'Слава в манишке яьудс', '6', '1151cebca6a3f27bec0e6d9bd9b77d96.jpg', '00:30:00', 'хорор', '2020');

-- --------------------------------------------------------

--
-- Структура таблицы `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `hall_num` int(11) NOT NULL,
  `num_rows` int(11) NOT NULL,
  `num_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall`
--

INSERT INTO `hall` (`id`, `hall_num`, `num_rows`, `num_place`) VALUES
(3, 1, 10, 15),
(6, 2, 10, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `seans`
--

CREATE TABLE `seans` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `film_num` int(11) NOT NULL,
  `hall_num` int(11) NOT NULL,
  `max_price` text NOT NULL,
  `bilets` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mail` text NOT NULL,
  `date_birth` date NOT NULL,
  `password` text NOT NULL,
  `bilets` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `mail`, `date_birth`, `password`, `bilets`, `role`) VALUES
(1, 'Вячеслав', 'Исаев', 'IsaevSlava.2001@yandex.ru', '2001-04-17', '123456', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foo` (`hall_num`);

--
-- Индексы таблицы `seans`
--
ALTER TABLE `seans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_num` (`film_num`),
  ADD KEY `hall_num` (`hall_num`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `seans`
--
ALTER TABLE `seans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `seans`
--
ALTER TABLE `seans`
  ADD CONSTRAINT `seans_ibfk_1` FOREIGN KEY (`film_num`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `seans_ibfk_2` FOREIGN KEY (`hall_num`) REFERENCES `hall` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
