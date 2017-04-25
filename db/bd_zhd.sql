-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 25 2017 г., 13:37
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bd_zhd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tBileti`
--

CREATE TABLE `tTickets` (
  `id_ticket` int(11) NOT NULL,
  `ESR_Station` int(11) NOT NULL,
  `date_sale` datetime NOT NULL,
  `from_where` int(11) NOT NULL,
  `to_where` int(11) NOT NULL,
  `id_type_ticket` int(11) NOT NULL,
  `id_privilege` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tLgoti`
--

CREATE TABLE `tPrivileges` (
  `id_privilege` int(11) NOT NULL,
  `surname` char(25) NOT NULL,
  `name` char(15) NOT NULL,
  `patronymic` char(25) NOT NULL,
  `num_doc` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tPoezda`
--

CREATE TABLE `tTrains` (
  `id_train` int(11) NOT NULL,
  `number` char(10) NOT NULL,
  `name` char(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tRaspisaniye`
--

CREATE TABLE `tTimetable` (
  `id_timetable` int(11) NOT NULL,
  `id_train` int(11) NOT NULL,
  `ESR_Station` int(11) NOT NULL,
  `number_p_p` smallint(6) NOT NULL,
  `date_coming` datetime NOT NULL,
  `date_outgo` datetime NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tRasstoyaniya`
--

CREATE TABLE `tDistance` (
  `id_distance` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `from_where` int(11) NOT NULL,
  `to_where` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tRasstoyaniya`
--

INSERT INTO `tDistance` (`id_distance`, `distance`, `from_where`, `to_where`) VALUES
(2, 3, 488602, 488142),
(3, 3, 488142, 488231),
(4, 3, 488231, 488227),
(5, 3, 488227, 488509),
(6, 2, 488509, 488532),
(7, 2, 488532, 488212),
(8, 4, 488212, 488208),
(9, 2, 488208, 488138),
(10, 3, 488138, 488119),
(11, 4, 488119, 488104),
(12, 4, 488104, 480210),
(13, 3, 480210, 480206),
(14, 4, 480206, 480051),
(15, 2, 480051, 480009),
(16, 1, 480009, 480028),
(17, 1, 480028, 480032),
(18, 5, 480032, 480307),
(19, 7, 480307, 480403),
(20, 5, 480403, 480418),
(21, 5, 480418, 480507),
(22, 5, 480507, 480600),
(23, 5, 480600, 480615),
(24, 6, 480615, 486503),
(25, 4, 486503, 486433),
(26, 4, 486433, 486429),
(27, 4, 486429, 486414),
(28, 3, 486414, 486400),
(29, 6, 486400, 486306),
(30, 3, 486306, 486221),
(31, 4, 486221, 486217),
(32, 2, 486217, 486255),
(33, 2, 486255, 486202),
(34, 6, 486202, 485939),
(35, 5, 485939, 485924),
(36, 6, 485924, 485919),
(37, 5, 485919, 485905),
(38, 4, 485905, 485750),
(39, 4, 485750, 485746),
(40, 4, 485746, 485731),
(41, 4, 485731, 485727),
(42, 3, 485727, 485712),
(43, 3, 485712, 485708),
(44, 2, 485708, 484885),
(45, 2, 484885, 484870),
(46, 3, 484870, 484866),
(47, 3, 484866, 484851),
(48, 1, 484851, 484847),
(49, 2, 484847, 484832),
(50, 1, 484832, 484828),
(51, 2, 484828, 484813),
(52, 2, 484813, 484809),
(53, 2, 484809, 484743),
(54, 2, 484743, 484739),
(55, 3, 484739, 484724),
(56, 2, 484724, 484713),
(57, 3, 484713, 484705),
(58, 1, 488509, 488528),
(59, 5, 488528, 488706),
(60, 5, 488706, 488800),
(61, 6, 488800, 488814),
(62, 3, 488814, 500429),
(63, 3, 500429, 500414),
(64, 5, 500414, 500406),
(65, 1, 500406, 500217),
(66, 3, 500217, 500202),
(67, 3, 500202, 500221),
(68, 2, 500221, 500236),
(69, 4, 500236, 503107),
(70, 5, 503107, 503022),
(71, 4, 503022, 503018),
(72, 2, 503018, 503003),
(73, 5, 503003, 502903),
(74, 7, 502903, 502829),
(75, 4, 502829, 502814),
(76, 3, 502814, 502807),
(77, 8, 502807, 502320),
(78, 4, 502320, 502316),
(79, 1, 502316, 502301),
(80, 1, 502301, 502335),
(81, 6, 502335, 502509),
(82, 6, 502509, 502602),
(164, 5, 487807, 487811),
(405, 8, 487811, 487900),
(406, 3, 487900, 487915),
(407, 5, 487915, 488000),
(408, 6, 488000, 488104),
(409, 3, 480403, 480422),
(410, 2, 480422, 480456),
(411, 1, 480456, 480437),
(412, 3, 480437, 480441),
(413, 2, 480441, 480121),
(414, 2, 480121, 480136),
(415, 1, 480136, 482803),
(416, 2, 482803, 482748),
(417, 6, 482748, 482733),
(418, 2, 482733, 482729),
(419, 1, 482729, 482714),
(420, 3, 482714, 482708),
(421, 3, 482708, 482631),
(422, 3, 482631, 482625),
(423, 2, 482625, 482610),
(424, 8, 482610, 482606),
(437, 2, 482606, 482127),
(438, 4, 482127, 482112),
(439, 4, 482112, 482108),
(440, 5, 482108, 482023),
(441, 4, 482023, 482019),
(442, 3, 482019, 482004),
(558, 7, 482004, 481923),
(559, 4, 481923, 481919),
(560, 3, 481919, 481938),
(561, 2, 481938, 481904),
(562, 6, 481904, 481849),
(563, 3, 481849, 481834),
(564, 4, 481834, 481821),
(565, 3, 481821, 481815),
(566, 4, 481815, 481800),
(586, 7, 481800, 481755),
(587, 3, 481755, 481745),
(588, 1, 481745, 481730),
(599, 5, 481730, 481726),
(600, 3, 481726, 481711),
(601, 3, 481711, 481707),
(602, 6, 481707, 481622),
(603, 6, 481622, 481603),
(604, 5, 481603, 481618),
(605, 7, 481618, 454201),
(606, 4, 454201, 454131),
(607, 4, 454131, 454127),
(608, 5, 454127, 454112),
(609, 4, 454112, 454108),
(610, 3, 454108, 454042),
(611, 6, 454042, 454038),
(612, 4, 454038, 454023),
(613, 3, 454023, 454019),
(614, 4, 454019, 454004),
(615, 3, 454004, 453942),
(616, 5, 453942, 453938),
(617, 3, 453938, 453923),
(618, 1, 453923, 453919),
(619, 6, 453919, 453904),
(620, 3, 453904, 453815),
(621, 4, 453815, 453800),
(622, 5, 453800, 453622),
(623, 3, 453622, 453618),
(624, 3, 453618, 453500),
(625, 6, 453500, 453434),
(626, 4, 453434, 453425),
(627, 2, 453425, 453459),
(628, 3, 453459, 453410),
(629, 3, 453410, 453444),
(630, 3, 453444, 453406),
(631, 4, 453406, 453139),
(632, 4, 453139, 453124),
(633, 3, 453124, 453105),
(634, 1, 453105, 453115),
(635, 5, 453115, 450003),
(636, 3, 450003, 450041),
(637, 2, 450041, 450605),
(638, 1, 450605, 450619),
(639, 2, 450619, 450624),
(640, 2, 450624, 451100);

-- --------------------------------------------------------

--
-- Структура таблицы `tRole`
--

CREATE TABLE `tRole` (
  `id_role` int(11) NOT NULL,
  `name` char(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tStanciya`
--

CREATE TABLE `tStation` (
  `ESR_Station` int(11) NOT NULL,
  `name_station` char(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tStanciya`
--

INSERT INTO `tStation` (`ESR_Station`, `name_station`) VALUES
(450003, 'Нижнеднепровск-узел'),
(450041, 'ПЛ 196 КМ'),
(450605, 'Нижнеднепровск'),
(450619, 'ПЛ 193 КМ'),
(450624, 'Амур ОП'),
(451100, 'Днепропетровск'),
(453105, 'Игрень'),
(453115, 'Ксениевка ОП'),
(453124, 'ПЛ 207 КМ'),
(453139, 'ПЛ 212 КМ'),
(453406, 'Иларионово'),
(453410, 'ПЛ 222 КМ'),
(453425, 'Хорошово ОП'),
(453434, 'ПЛ 230 КМ'),
(453444, 'ПЛ 219 КМ'),
(453459, 'ПЛ 225 КМ'),
(453500, 'Синельниково-2'),
(453618, '239 КМ ОП'),
(453622, 'ПЛ 242 КМ'),
(453800, 'Вишневецкое'),
(453815, 'ПЛ 251 КМ'),
(453904, 'Раздоры'),
(453919, 'ПЛ 261 КМ'),
(453923, 'ПЛ 262 КМ'),
(453938, 'Терса ОП'),
(453942, 'ПЛ 267 КМ'),
(454004, 'Письменная'),
(454019, 'ПЛ 276 КМ'),
(454023, 'Крутоярка ОП'),
(454038, 'ПЛ 283 КМ'),
(454042, 'Неродовка ОП'),
(454108, 'Ульяновка'),
(454112, 'ПЛ 296 КМ'),
(454127, 'Краснощёково ОП'),
(454131, 'ПЛ 305 КМ'),
(454201, 'Чаплино'),
(480009, 'Ясиноватая'),
(480028, 'Ясиноватая-горка'),
(480032, 'Ясиноватая-пасс.'),
(480051, 'ОП 1118 КМ'),
(480121, 'ОП 447 КМ'),
(480136, 'ОП 446 КМ'),
(480206, 'Макеевка-пасс.'),
(480210, 'ОП 1110 КМ'),
(480307, 'Донецк-северн'),
(480403, 'Донецк'),
(480418, 'Кварцитный'),
(480422, 'ОП 11 КМ'),
(480437, 'РЗД 7 КМ'),
(480441, 'РЗД 5 КМ'),
(480456, 'ОП РЭД'),
(480507, 'Рутченково'),
(480600, 'Мандрыкино'),
(480615, 'Доля'),
(481603, 'Просяная'),
(481618, 'ОП№23 КМ'),
(481622, 'ОП№21 КМ'),
(481707, 'Демулино'),
(481711, 'ОП 337 КМ'),
(481726, 'ОП№19 КМ'),
(481730, 'Кирпичево'),
(481745, 'ОП 347 КМ'),
(481755, 'ОП№18 КМ'),
(481800, 'Межевая'),
(481815, 'ОП№16 КМ'),
(481821, 'ОП 364 КМ'),
(481834, 'Фурсово'),
(481849, 'ОП№15 КМ'),
(481904, 'Удачная'),
(481919, 'ОП№14 КМ'),
(481923, 'ОП№13 КМ'),
(481938, 'ОП 377 КМ'),
(482004, 'Красноармейск'),
(482019, 'ОП 394 КМ'),
(482023, 'ОП№11 КМ'),
(482108, 'Гродовка'),
(482112, 'ОП 407 КМ'),
(482127, 'ОП№10 КМ'),
(482606, 'Желанная'),
(482610, 'ОП№9 КМ'),
(482625, 'ОП№8 КМ'),
(482631, 'ОП 426 КМ'),
(482708, 'Очеретино'),
(482714, 'ОП 432 КМ'),
(482729, 'ОП 433 КМ'),
(482733, 'ОП 437 КМ'),
(482748, 'Химик'),
(482803, 'Авдеевка'),
(484705, 'Мариуполь'),
(484713, 'Азовсталь'),
(484724, 'ОП 1261 КМ'),
(484739, 'Заводская площадь'),
(484743, 'ОП 1256 КМ'),
(484809, 'Сартана'),
(484813, 'ОП 1253 КМ'),
(484828, 'ОП 1251 КМ'),
(484832, 'ОП 1249 КМ'),
(484847, 'ОП 1248 КМ'),
(484851, 'ОП 1246 КМ'),
(484866, 'Асланово'),
(484870, 'Приовражная'),
(484885, 'ОП 1238 КМ'),
(485708, 'Кальчик'),
(485712, 'ОП 1234 КМ'),
(485727, 'ОП 1230 КМ'),
(485731, 'Кичиксу (обп.)'),
(485746, 'Камянка'),
(485750, 'ОП 1217 КМ'),
(485905, 'Карань'),
(485919, 'Полково'),
(485924, 'Тавла (обп.)'),
(485939, 'ОП 1199 КМ'),
(486202, 'Волноваха'),
(486217, 'ОП 1188 КМ'),
(486221, 'ОП 1184 КМ'),
(486255, 'ОП Северный'),
(486306, 'Велико-анадоль'),
(486400, 'Южнодонбасская'),
(486414, 'ОП 1172 КМ'),
(486429, 'ОП 1168 КМ'),
(486433, 'Блокпост 1164 КМ'),
(486503, 'Еленовка'),
(487807, 'Иловайск'),
(487811, 'ОП 1160 КМ'),
(487900, 'Харцызск'),
(487915, 'Канатный завод'),
(488000, 'Ханженково'),
(488104, 'Криничная'),
(488119, 'Каменоломня'),
(488138, 'ОП 1100 КМ'),
(488142, 'ОП 9 КМ'),
(488208, 'Монахово'),
(488212, 'ОП 1094 КМ'),
(488227, 'ОП 3 КМ'),
(488231, 'Воля'),
(488509, 'Щебенка'),
(488528, 'Виноградники'),
(488532, 'ОП 1092 КМ'),
(488602, 'Нижнекрынка'),
(488706, 'Енакиево'),
(488800, 'Волынцево'),
(488814, 'ОП 1073 КМ'),
(500202, 'Дебальцево'),
(500217, 'Абрикосовый'),
(500221, 'Платформа№1'),
(500236, 'Платформа№2'),
(500406, 'Булавин'),
(500414, 'ОП 1067 КМ'),
(500429, 'Углегорск'),
(502301, 'Штеровка'),
(502316, 'ОП 47 КМ'),
(502320, 'Эротейдовка'),
(502335, 'Приятное'),
(502509, 'Марусино'),
(502602, 'Красный Луч'),
(502807, 'Петровеньки'),
(502814, 'ОП 32 КМ'),
(502829, 'Кокино'),
(502903, 'Комендантская'),
(503003, 'Фащеевка'),
(503018, 'ОП 18 КМ'),
(503022, 'ОП 14 КМ'),
(503107, 'Чернухино'),
(4821923, 'ОП№13 КМ');

-- --------------------------------------------------------

--
-- Структура таблицы `tSummi`
--

CREATE TABLE `tSums` (
  `id_sum` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tariffing` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tTarifi`
--

CREATE TABLE `tTarifs` (
  `id_tarif` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tTarifikaciya`
--

CREATE TABLE `tTariffing` (
  `id_tariffing` int(11) NOT NULL,
  `id_type_ticket` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `coef` float(2,2) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tTypeBil`
--

CREATE TABLE `tTypeTicket` (
  `id_type_ticket` int(11) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tUsers`
--

CREATE TABLE `tUsers` (
  `user_id` char(20) NOT NULL,
  `login` char(20) NOT NULL,
  `surname` char(25) NOT NULL,
  `name` char(15) NOT NULL,
  `patronymic` char(25) NOT NULL,
  `password` char(20) NOT NULL,
  `id_role` int(11) NOT NULL,
  `ESR_Station` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tBileti`
--
ALTER TABLE `tTickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `ESR_Station` (`ESR_Station`),
  ADD KEY `from_where` (`from_where`),
  ADD KEY `to_where` (`to_where`),
  ADD KEY `id_type_ticket` (`id_type_ticket`),
  ADD KEY `id_privilege` (`id_privilege`);

--
-- Индексы таблицы `tLgoti`
--
ALTER TABLE `tPrivileges`
  ADD PRIMARY KEY (`id_privilege`);

--
-- Индексы таблицы `tPoezda`
--
ALTER TABLE `tTrains`
  ADD PRIMARY KEY (`id_train`);

--
-- Индексы таблицы `tRaspisaniye`
--
ALTER TABLE `tTimetable`
  ADD PRIMARY KEY (`id_timetable`),
  ADD KEY `id_train` (`id_train`),
  ADD KEY `ESR_Station` (`ESR_Station`);

--
-- Индексы таблицы `tRasstoyaniya`
--
ALTER TABLE `tDistance`
  ADD PRIMARY KEY (`id_distance`),
  ADD KEY `from_where` (`from_where`),
  ADD KEY `to_where` (`to_where`);

--
-- Индексы таблицы `tRole`
--
ALTER TABLE `tRole`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `tStanciya`
--
ALTER TABLE `tStation`
  ADD PRIMARY KEY (`ESR_Station`);

--
-- Индексы таблицы `tSummi`
--
ALTER TABLE `tSums`
  ADD PRIMARY KEY (`id_sum`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_tariffing` (`id_tariffing`);

--
-- Индексы таблицы `tTarifi`
--
ALTER TABLE `tTarifs`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Индексы таблицы `tTarifikaciya`
--
ALTER TABLE `tTariffing`
  ADD PRIMARY KEY (`id_tariffing`),
  ADD KEY `id_type_ticket` (`id_type_ticket`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Индексы таблицы `tTypeBil`
--
ALTER TABLE `tTypeTicket`
  ADD PRIMARY KEY (`id_type_ticket`);

--
-- Индексы таблицы `tUsers`
--
ALTER TABLE `tUsers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `ESR_Station` (`ESR_Station`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tBileti`
--
ALTER TABLE `tTickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tLgoti`
--
ALTER TABLE `tPrivileges`
  MODIFY `id_privilege` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tPoezda`
--
ALTER TABLE `tTrains`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tRaspisaniye`
--
ALTER TABLE `tTimetable`
  MODIFY `id_timetable` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tRasstoyaniya`
--
ALTER TABLE `tDistance`
  MODIFY `id_distance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=641;
--
-- AUTO_INCREMENT для таблицы `tRole`
--
ALTER TABLE `tRole`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tSummi`
--
ALTER TABLE `tSums`
  MODIFY `id_sum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tTarifi`
--
ALTER TABLE `tTarifs`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tTarifikaciya`
--
ALTER TABLE `tTariffing`
  MODIFY `id_tariffing` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `tTypeBil`
--
ALTER TABLE `tTypeTicket`
  MODIFY `id_type_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tBileti`
--
ALTER TABLE `tTickets`
  ADD CONSTRAINT `ttickets_ibfk_1` FOREIGN KEY (`id_type_ticket`) REFERENCES `tTypeTicket` (`id_type_ticket`),
  ADD CONSTRAINT `ttickets_ibfk_6` FOREIGN KEY (`ESR_Station`) REFERENCES `tStation` (`ESR_Station`),
  ADD CONSTRAINT `ttickets_ibfk_7` FOREIGN KEY (`from_where`) REFERENCES `tStation` (`ESR_Station`),
  ADD CONSTRAINT `ttickets_ibfk_8` FOREIGN KEY (`to_where`) REFERENCES `tStation` (`ESR_Station`),
  ADD CONSTRAINT `ttickets_ibfk_9` FOREIGN KEY (`id_privilege`) REFERENCES `tPrivileges` (`id_privilege`);

--
-- Ограничения внешнего ключа таблицы `tRaspisaniye`
--
ALTER TABLE `tTimetable`
  ADD CONSTRAINT `ttimetable_ibfk_2` FOREIGN KEY (`id_train`) REFERENCES `tTrains` (`id_train`),
  ADD CONSTRAINT `ttimetable_ibfk_3` FOREIGN KEY (`ESR_Station`) REFERENCES `tStation` (`ESR_Station`);

--
-- Ограничения внешнего ключа таблицы `tRasstoyaniya`
--
ALTER TABLE `tDistance`
  ADD CONSTRAINT `tdistance_ibfk_1` FOREIGN KEY (`from_where`) REFERENCES `tStation` (`ESR_Station`),
  ADD CONSTRAINT `tdistance_ibfk_2` FOREIGN KEY (`to_where`) REFERENCES `tStation` (`ESR_Station`);

--
-- Ограничения внешнего ключа таблицы `tSummi`
--
ALTER TABLE `tSums`
  ADD CONSTRAINT `tsums_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `tTickets` (`id_ticket`),
  ADD CONSTRAINT `tsums_ibfk_2` FOREIGN KEY (`id_tariffing`) REFERENCES `tTariffing` (`id_tariffing`);

--
-- Ограничения внешнего ключа таблицы `tTarifikaciya`
--
ALTER TABLE `tTariffing`
  ADD CONSTRAINT `ttariffing_ibfk_1` FOREIGN KEY (`id_type_ticket`) REFERENCES `tTypeTicket` (`id_type_ticket`),
  ADD CONSTRAINT `ttariffing_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tTarifs` (`id_tarif`);

--
-- Ограничения внешнего ключа таблицы `tUsers`
--
ALTER TABLE `tUsers`
  ADD CONSTRAINT `tusers_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tRole` (`id_role`),
  ADD CONSTRAINT `tusers_ibfk_2` FOREIGN KEY (`ESR_Station`) REFERENCES `tStation` (`ESR_Station`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
