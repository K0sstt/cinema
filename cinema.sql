-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 16 2019 г., 19:52
-- Версия сервера: 10.2.7-MariaDB-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cinema`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES
(1, 'Mel', 'Brooks'),
(2, 'Clevon', 'Little'),
(3, 'Harvey', 'Korman'),
(4, 'Gene', 'Wilder'),
(5, 'Slim', 'Pickens'),
(6, 'Madeline', 'Kahn'),
(7, 'Humphrey', 'Bogart'),
(8, 'Ingrid', 'Bergman'),
(9, 'Claude', 'Rains'),
(10, 'Peter', 'Lorre'),
(11, 'Audrey', 'Hepburn'),
(12, 'Cary', 'Grant'),
(13, 'Walter', 'Matthau'),
(14, 'James', 'Coburn'),
(15, 'George', 'Kennedy'),
(16, 'Paul', 'Newman'),
(17, 'Strother', 'Martin'),
(18, 'Robert', 'Redford'),
(19, 'Katherine', 'Ross'),
(20, 'Robert', 'Shaw'),
(21, 'Charles', 'Durning'),
(22, 'Jim', 'Henson'),
(23, 'Frank', 'Oz'),
(24, 'Dave', 'Geolz'),
(25, 'Austin', 'Pendleton'),
(26, 'John', 'Travolta'),
(27, 'Danny', 'DeVito'),
(28, 'Renne', 'Russo'),
(29, 'Gene', 'Hackman'),
(30, 'Dennis', 'Farina'),
(31, 'Joe', 'Pesci'),
(32, 'Marrisa', 'Tomei'),
(33, 'Fred', 'Gwynne'),
(34, 'Lane', 'Smith'),
(35, 'Ralph', 'Macchio'),
(36, 'Russell', 'Crowe'),
(37, 'Joaquin', 'Phoenix'),
(38, 'Connie', 'Nielson'),
(39, 'Harrison', 'Ford'),
(40, 'Mark', 'Hamill'),
(41, 'Carrie', 'Fisher'),
(42, 'Alec', 'Guinness'),
(43, 'James Earl', 'Jones'),
(44, 'Karen', 'Allen'),
(45, 'Nathan', 'Fillion'),
(46, 'Alan', 'Tudyk'),
(47, 'Adam', 'Baldwin'),
(48, 'Ron', 'Glass'),
(49, 'Jewel', 'Staite'),
(50, 'Gina', 'Torres'),
(51, 'Morena', 'Baccarin'),
(52, 'Sean', 'Maher'),
(53, 'Summer', 'Glau'),
(54, 'Chiwetel', 'Ejiofor'),
(55, 'Barbara', 'Hershey'),
(56, 'Dennis', 'Hopper'),
(57, 'Matthew', 'Broderick'),
(58, 'Ally', 'Sheedy'),
(59, 'Dabney', 'Coleman'),
(60, 'John', 'Wood'),
(61, 'Barry', 'Corbin'),
(62, 'Bill', 'Pullman'),
(63, 'John', 'Candy'),
(64, 'Rick', 'Moranis'),
(65, 'Daphne', 'Zuniga'),
(66, 'Joan', 'Rivers'),
(67, 'Kenneth', 'Mars'),
(68, 'Terri', 'Garr'),
(69, 'Peter', 'Boyle'),
(70, 'Val', 'Kilmer'),
(71, 'Gabe', 'Jarret'),
(72, 'Michelle', 'Meyrink'),
(73, 'William', 'Atherton'),
(74, 'Tom', 'Cruise'),
(75, 'Kelly', 'McGillis'),
(76, 'Anthony', 'Edwards'),
(77, 'Tom', 'Skerritt'),
(78, 'Donald', 'Sutherland'),
(79, 'Elliot', 'Gould'),
(80, 'Sally', 'Kellerman'),
(81, 'Robert', 'Duvall'),
(82, 'Carl', 'Reiner'),
(83, 'Eva Marie', 'Saint'),
(84, 'Alan', 'Arkin'),
(85, 'Brian', 'Keith'),
(86, 'Roy', 'Scheider'),
(87, 'Richard', 'Dreyfuss'),
(88, 'Lorraine', 'Gary'),
(89, 'Keir', 'Dullea'),
(90, 'Gary', 'Lockwood'),
(91, 'William', 'Sylvester'),
(92, 'Douglas', 'Rain'),
(93, 'James', 'Stewart'),
(94, 'Josephine', 'Hull'),
(95, 'Peggy', 'Dow'),
(96, 'Charles', 'Drake'),
(97, 'Seth', 'Rogen'),
(98, 'Katherine', 'Heigl'),
(99, 'Paul', 'Rudd'),
(100, 'Leslie', 'Mann');

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `year` year(4) DEFAULT NULL,
  `format_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`, `year`, `format_id`) VALUES
(1, 'Blazing Saddles', 1974, 1),
(2, 'Casablanca', 1942, 2),
(3, 'Charade', 1953, 2),
(4, 'Cool Hand Luke', 1967, 1),
(5, 'Butch Cassidy and the Sundance Kid', 1969, 1),
(6, 'The Sting', 1973, 2),
(7, 'The Muppet Movie', 1979, 2),
(8, 'Get Shorty', 1995, 2),
(9, 'My Cousin Vinny', 1992, 2),
(10, 'Gladiator', 2000, 3),
(11, 'Star Wars', 1977, 3),
(12, 'Raiders of the Lost Ark', 1981, 2),
(13, 'Serenity', 2005, 3),
(14, 'Hooisers', 1986, 1),
(15, 'WarGames', 1983, 1),
(16, 'Spaceballs', 1987, 2),
(17, 'Young Frankenstein', 1974, 1),
(18, 'Real Genius', 1985, 1),
(19, 'Top Gun', 1986, 2),
(20, 'MASH', 1970, 2),
(21, 'The Russians Are Coming, The Russians Are Coming', 1966, 1),
(22, 'Jaws', 1975, 2),
(23, '2001: A Space Odyssey\n', 1968, 2),
(24, 'Harvey', 1950, 2),
(25, 'Knocked Up', 2007, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `films_actors`
--

CREATE TABLE `films_actors` (
  `id` int(10) NOT NULL,
  `film_id` int(10) NOT NULL,
  `actor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films_actors`
--

INSERT INTO `films_actors` (`id`, `film_id`, `actor_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 3, 11),
(12, 3, 12),
(13, 3, 13),
(14, 3, 14),
(15, 3, 15),
(16, 4, 15),
(17, 4, 16),
(18, 4, 17),
(19, 5, 16),
(20, 5, 18),
(21, 5, 19),
(22, 6, 16),
(23, 6, 18),
(24, 6, 20),
(25, 6, 21),
(26, 7, 1),
(27, 7, 14),
(28, 7, 21),
(29, 7, 22),
(30, 7, 23),
(31, 7, 24),
(32, 7, 25),
(33, 8, 26),
(34, 8, 27),
(35, 8, 28),
(36, 8, 29),
(37, 8, 30),
(38, 9, 25),
(39, 9, 31),
(40, 9, 32),
(41, 9, 33),
(42, 9, 34),
(43, 9, 35),
(44, 10, 36),
(45, 10, 37),
(46, 10, 38),
(47, 11, 39),
(48, 11, 40),
(49, 11, 41),
(50, 11, 42),
(51, 11, 43),
(52, 12, 39),
(53, 12, 44),
(54, 13, 45),
(55, 13, 46),
(56, 13, 47),
(57, 13, 48),
(58, 13, 49),
(59, 13, 50),
(60, 13, 51),
(61, 13, 52),
(62, 13, 53),
(63, 13, 54),
(64, 14, 29),
(65, 14, 55),
(66, 14, 56),
(67, 15, 57),
(68, 15, 58),
(69, 15, 59),
(70, 15, 60),
(71, 15, 61),
(72, 16, 1),
(73, 16, 62),
(74, 16, 63),
(75, 16, 64),
(76, 16, 65),
(77, 16, 66),
(78, 17, 4),
(79, 17, 29),
(80, 17, 67),
(81, 17, 68),
(82, 17, 69),
(83, 18, 70),
(84, 18, 71),
(85, 18, 72),
(86, 18, 73),
(87, 19, 70),
(88, 19, 74),
(89, 19, 75),
(90, 19, 76),
(91, 19, 77),
(92, 20, 77),
(93, 20, 78),
(94, 20, 79),
(95, 20, 80),
(96, 20, 81),
(97, 21, 82),
(98, 21, 83),
(99, 21, 84),
(100, 21, 85),
(101, 22, 20),
(102, 22, 86),
(103, 22, 87),
(104, 22, 88),
(105, 23, 89),
(106, 23, 90),
(107, 23, 91),
(108, 23, 92),
(109, 24, 93),
(110, 24, 94),
(111, 24, 95),
(112, 24, 96),
(113, 25, 97),
(114, 25, 98),
(115, 25, 99),
(116, 25, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `formats`
--

CREATE TABLE `formats` (
  `id` int(11) NOT NULL,
  `format` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `formats`
--

INSERT INTO `formats` (`id`, `format`) VALUES
(1, 'VHS'),
(2, 'DVD'),
(3, 'Blu-Ray');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `films_actors`
--
ALTER TABLE `films_actors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `formats`
--
ALTER TABLE `formats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `films_actors`
--
ALTER TABLE `films_actors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `formats`
--
ALTER TABLE `formats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
