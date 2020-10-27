-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 27 2020 г., 21:48
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `calendar`
--
CREATE DATABASE IF NOT EXISTS `calendar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calendar`;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `text`, `created_date`, `end_date`, `status`, `user_id`) VALUES
(1, 'Вывести весь список задач', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse illum temporibus harum, doloribus alias magnam aut, est iste facere officiis ullam sequi enim! Quasi hic tempore porro perferendis illum consectetur.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Esse illum temporibus harum, doloribus alias magnam aut, est iste facere officiis ullam sequi enim! Quasi hic tempore porro perferendis illum consectetur.', '2020-10-24 00:00:00', '2020-10-23 21:00:00', 1, 0),
(2, 'Получать одну задачу по ее ID', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse illum temporibus harum, doloribus alias magnam aut, est iste facere officiis ullam sequi enim! Quasi hic tempore porro perferendis illum consectetur.', '2020-10-24 00:00:00', '2020-10-24 21:00:00', 1, 0),
(3, 'Написать API', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse illum temporibus harum, doloribus alias magnam aut, est iste facere officiis ullam sequi enim! Quasi hic tempore porro perferendis illum consectetur.', '2020-10-24 00:00:00', '2020-10-25 21:00:00', 0, 0),
(23, 'Новая задача', '', '2020-10-27 00:00:00', '2020-10-27 21:00:00', 1, 0),
(24, 'Новая задача', '', '2020-10-27 21:40:10', '0000-00-00 00:00:00', 1, 0),
(25, '28.10 по 29.10', '', '2020-10-27 21:40:13', '0000-00-00 00:00:00', 1, 0),
(26, '27.10 по 28.10', '', '2020-10-27 21:40:15', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `token`) VALUES
(1, '131уфвцйу');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
