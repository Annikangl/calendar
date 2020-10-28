-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.4.13-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных calendar
CREATE DATABASE IF NOT EXISTS `calendar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `calendar`;

-- Дамп структуры для таблица calendar.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `text` text DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы calendar.tasks: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `title`, `text`, `created_date`, `end_date`, `status`, `user_id`) VALUES
	(3, 'Новая задача', 'текст', '2020-10-28 16:20:46', '0000-00-00 00:00:00', 1, NULL),
	(4, 'API test', 'текст', '2020-10-28 16:21:03', '2020-10-28 00:00:00', 1, NULL),
	(5, 'Задача2', 'проверяем сортировку', '2020-10-28 19:16:13', '0000-00-00 00:00:00', 1, NULL),
	(6, 'test', 'testeee', '2020-10-28 00:00:00', '2020-10-29 00:00:00', 1, NULL),
	(7, 'Новая задача', 'testeee', '2020-10-28 20:31:01', '2020-10-30 00:00:00', 1, NULL),
	(8, 'test333', 'проверяем ', '2020-10-28 20:31:19', '2020-10-30 00:00:00', 1, NULL),
	(9, 'Пользовательская задача', 'текст', '2020-10-28 20:41:06', '0000-00-00 00:00:00', 1, NULL),
	(10, 'foo', 'foo text', '2020-10-28 22:46:16', '2020-10-28 22:46:16', 1, 4),
	(11, 'some foo', '', '2020-10-28 20:47:22', '0000-00-00 00:00:00', 1, 4);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Дамп структуры для таблица calendar.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы calendar.users: ~25 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `token`) VALUES
	(1, 'Ivanov229', '6f452af302d4bca258fbc96f5dd5de6d'),
	(2, 'Petrov', '6523f37589a737b7b86d2c47f5785786'),
	(3, 'Vasiliev', '4c8196713cbb553edf3d8861950c4b38'),
	(4, 'test', '1b369adcf769bbe81ee1d9ff36ea856b'),
	(5, 'test', '1b369adcf769bbe81ee1d9ff36ea856b'),
	(6, 'test', '1b369adcf769bbe81ee1d9ff36ea856b'),
	(7, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(8, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(9, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(10, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(11, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(12, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(13, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(14, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(15, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(16, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(17, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(18, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(19, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(20, 'test2', '25797df0bcb683fee1c0adb0a2d49ec9'),
	(21, 'test3', 'c0e30a89a11e1ab632cac45091debb07'),
	(22, 'test3', 'c0e30a89a11e1ab632cac45091debb07'),
	(23, 'test3', 'c0e30a89a11e1ab632cac45091debb07'),
	(24, 'test33', 'e325473a10947ad22545264785b3798e'),
	(25, 'new_test', '7750834d8b0610da28cd6778f3c3f8b4'),
	(26, 'last_test', 'b19d076802d5f154ea6b13cab9a7c936');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
