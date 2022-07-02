-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 31 2021 г., 01:15
-- Версия сервера: 5.7.33
-- Версия PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online_school`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `login` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', 1234);

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prompt` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `parent_question` int(11) NOT NULL,
  `checkbox` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id_answer`, `answer`, `prompt`, `photo`, `parent_question`, `checkbox`) VALUES
(1, '4', NULL, '', 1, 'true'),
(2, '5', NULL, '', 1, 'false'),
(3, '6', NULL, '', 1, 'false'),
(4, '7', NULL, '', 1, 'false'),
(5, '3-1', NULL, '', 2, 'false'),
(6, '5+2', NULL, '', 2, 'true'),
(7, '10-3', NULL, '', 2, 'true'),
(8, '4+6', NULL, '', 2, 'false'),
(9, '3', NULL, NULL, 3, 'true'),
(10, '7', '3+4', NULL, 4, NULL),
(11, '3', '2+1', NULL, 4, NULL),
(12, '12', '7+5', NULL, 4, NULL),
(13, '14', '6+8', NULL, 4, NULL),
(14, '3', NULL, NULL, 5, 'true'),
(15, '7', NULL, '', 6, 'true'),
(16, '8', NULL, '', 6, 'false'),
(17, '9', NULL, '', 6, 'false'),
(18, '10', NULL, '', 6, 'false'),
(19, '1. 300 слів;\r\n2. Структура;', NULL, NULL, 7, NULL),
(20, '2', NULL, '', 8, 'false'),
(21, '6', NULL, '', 8, 'false'),
(22, '5', NULL, '', 8, 'false'),
(23, '4', NULL, '', 8, 'true'),
(24, '1', NULL, '', 8, 'false'),
(25, '12', '6+6', NULL, 9, NULL),
(26, '10', '3+7', NULL, 9, NULL),
(27, '6', '5+1', NULL, 9, NULL),
(28, '5', '5-0', NULL, 9, NULL),
(29, '6', NULL, NULL, 10, 'true');

-- --------------------------------------------------------

--
-- Структура таблицы `library`
--

CREATE TABLE `library` (
  `id_book` int(11) NOT NULL,
  `name_book` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name_of_file` varchar(50) NOT NULL,
  `author` varchar(40) NOT NULL,
  `type_of` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `library`
--

INSERT INTO `library` (`id_book`, `name_book`, `photo`, `name_of_file`, `author`, `type_of`, `email`) VALUES
(2, 'Фізика 10 клас', 'ba2c0d8839d8839cf7a4ca304c368b29.jpg', 'ba2c0d8839d8839cf7a4ca304c368b29.pdf', 'Барьяхтар\r\n', 'Література', 'bryazginqwe@ukr.net'),
(3, 'Біологія 10 клас', 'aee9527f90af75376438ff1bebbffd9a.jpg', 'aee9527f90af75376438ff1bebbffd9a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(4, 'Біологія 10 клас', 'b62973320fc0fe927303b78e331d42d6.jpg', 'b62973320fc0fe927303b78e331d42d6.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(5, 'Біологія 10 клас', 'ca15d898e11009a67e46e8076ffb6271.jpg', 'ca15d898e11009a67e46e8076ffb6271.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(6, 'Біологія 10 клас', '747477894c80e1c3818c3129e67627f2.jpg', '747477894c80e1c3818c3129e67627f2.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(7, 'Біологія 10 клас', '3857da57036c94a0c58c3799241bda7d.jpg', '3857da57036c94a0c58c3799241bda7d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(8, 'Біологія 10 клас', 'fb0c203456d54149df2fbc7fc226d655.jpg', 'fb0c203456d54149df2fbc7fc226d655.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(9, 'Біологія 10 клас', '9a67da33d9e40361420e4c6c08f76c0d.jpg', '9a67da33d9e40361420e4c6c08f76c0d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(10, 'Біологія 10 клас', '093f7647bee05ee3fe14cc4a40bf435c.jpg', '093f7647bee05ee3fe14cc4a40bf435c.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(11, 'Біологія 10 клас', 'd8e65d897d40cba8e94ca9d5164b2579.jpg', 'd8e65d897d40cba8e94ca9d5164b2579.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(12, 'Біологія 10 клас', 'c56517277941b2169d7692f6830dcc23.jpg', 'c56517277941b2169d7692f6830dcc23.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(13, 'Біологія 10 клас', 'a871184c5def0d0fb44141b93c150c49.jpg', 'a871184c5def0d0fb44141b93c150c49.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(14, 'Біологія 10 клас', 'ee1b340b267df3ec4f9a06fef8ad98ad.jpg', 'ee1b340b267df3ec4f9a06fef8ad98ad.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(15, 'Біологія 10 клас', '5fa713001dc445445c2a383e4330c4ae.jpg', '5fa713001dc445445c2a383e4330c4ae.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(16, 'Біологія 10 клас', 'fe8fe189bcce107041cda9876a44540c.jpg', 'fe8fe189bcce107041cda9876a44540c.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(17, 'Біологія 10 клас', '8b9086279bdd1a428ac280f92421acb5.jpg', '8b9086279bdd1a428ac280f92421acb5.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(18, 'Біологія 10 клас', 'de60cb6897ef21f63b39e9d99a6bccb4.jpg', 'de60cb6897ef21f63b39e9d99a6bccb4.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(19, 'Біологія 10 клас', '0f65f8885f0c01f3668e097d575958d3.jpg', '0f65f8885f0c01f3668e097d575958d3.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(20, 'Біологія 10 клас', 'eb561fe2366c7e39c2fa803f8363fb62.jpg', 'eb561fe2366c7e39c2fa803f8363fb62.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(21, 'Біологія 10 клас', '5f448b48caef3fc1f881fcb0719eb92a.jpg', '5f448b48caef3fc1f881fcb0719eb92a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(22, 'Біологія 10 клас', 'e3a9411fe8aa23fa97ca3b3864a20110.jpg', 'e3a9411fe8aa23fa97ca3b3864a20110.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(23, 'Біологія 10 клас', '530af4374c786c5a785394ac437d8e11.jpg', '530af4374c786c5a785394ac437d8e11.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(24, 'Біологія 10 клас', '36e20b75ee5d20f1580dcfb372c03a39.jpg', '36e20b75ee5d20f1580dcfb372c03a39.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(25, 'Біологія 10 клас', 'd51de33d77417c8a2e207b281367eca3.jpg', 'd51de33d77417c8a2e207b281367eca3.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(26, 'Біологія 10 клас', 'a5a20b3283c2662a22ac38046e28316f.jpg', 'a5a20b3283c2662a22ac38046e28316f.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(27, 'Біологія 10 клас', 'f252b37619cfa7a18eb31af9cb82c5d2.jpg', 'f252b37619cfa7a18eb31af9cb82c5d2.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(28, 'Біологія 10 клас', '17c0439c09a3f80a97c91d93758334ec.jpg', '17c0439c09a3f80a97c91d93758334ec.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(29, 'Біологія 10 клас', '71ca6a9025404c0138dcc995169fd5f5.jpg', '71ca6a9025404c0138dcc995169fd5f5.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(30, 'Біологія 10 клас', 'd8235ac508fb5317202f5e5b8c06652c.jpg', 'd8235ac508fb5317202f5e5b8c06652c.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(31, 'Біологія 10 клас', 'fad5d1212766502408b5916e6d44e1ae.jpg', 'fad5d1212766502408b5916e6d44e1ae.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(32, 'Біологія 10 клас', '1aaa8eec966de1e123d01d3b42a479ac.jpg', '1aaa8eec966de1e123d01d3b42a479ac.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(33, 'Біологія 10 клас', '3f3b598ccf2245baec112d96b13e80e1.jpg', '3f3b598ccf2245baec112d96b13e80e1.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(34, 'Біологія 10 клас', '5d1d3091b0c50d65a68e8f6315bea6b2.jpg', '5d1d3091b0c50d65a68e8f6315bea6b2.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(35, 'Біологія 10 клас', '01b962c29cb9dc81600648867bcd1da1.jpg', '01b962c29cb9dc81600648867bcd1da1.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(36, 'Біологія 10 клас', '44fb1247832da5ed2899b0344c878238.jpg', '44fb1247832da5ed2899b0344c878238.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(37, 'Біологія 10 клас', 'd05c7398ab2bc5c99c1abf0b1faad995.jpg', 'd05c7398ab2bc5c99c1abf0b1faad995.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(38, 'Біологія 10 клас', '9a48f2b1bf9aaf5c2082cfb61263eb48.jpg', '9a48f2b1bf9aaf5c2082cfb61263eb48.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(39, 'Біологія 10 клас', '89483351f919036d292af97e6ef91a00.jpg', '89483351f919036d292af97e6ef91a00.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(40, 'Біологія 10 клас', 'ac648c4384d58988cbc3f8da708716a6.jpg', 'ac648c4384d58988cbc3f8da708716a6.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(41, 'Біологія 10 клас', 'a0b5ec4d5c903f8b6d1f93a8568857e0.jpg', 'a0b5ec4d5c903f8b6d1f93a8568857e0.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(42, 'Біологія 10 клас', 'd644c63332638d05fa0e40a2f0d93cac.jpg', 'd644c63332638d05fa0e40a2f0d93cac.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(43, 'Біологія 10 клас', 'e17e21873bd5316f0f31c1da567860c9.jpg', 'e17e21873bd5316f0f31c1da567860c9.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(44, 'Біологія 10 клас', 'a1d4109125337738837c0ef7a0650080.jpg', 'a1d4109125337738837c0ef7a0650080.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(45, 'Біологія 10 клас', '9d0bba6272041cc75020748153ccd847.jpg', '9d0bba6272041cc75020748153ccd847.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(46, 'Біологія 10 клас', 'b18ba93daf6bad2561e26e7f035fb3bf.jpg', 'b18ba93daf6bad2561e26e7f035fb3bf.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(47, 'Біологія 10 клас', '5c4c5b80e6e7bf14e35e28ae3a5cf090.jpg', '5c4c5b80e6e7bf14e35e28ae3a5cf090.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(48, 'Біологія 10 клас', '83d2601150014dae414f23cc304362fd.jpg', '83d2601150014dae414f23cc304362fd.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(49, 'Біологія 10 клас', '80db0fd091f287e161f7ff8f7172ffbb.jpg', '80db0fd091f287e161f7ff8f7172ffbb.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(50, 'Біологія 10 клас', '41333d8fd20bda7124c318e6114ee6af.jpg', '41333d8fd20bda7124c318e6114ee6af.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(51, 'Біологія 10 клас', '8e73bc519a84f28b7925c89a9f3e744d.jpg', '8e73bc519a84f28b7925c89a9f3e744d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(52, 'Біологія 10 клас', '34bf0fa8cfe1f482448c884a98667a53.jpg', '34bf0fa8cfe1f482448c884a98667a53.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(53, 'Біологія 10 клас', '1510295edcbc68237e6e0b787a234a01.jpg', '1510295edcbc68237e6e0b787a234a01.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(54, 'Біологія 10 клас', '4c7ed9a074b36686a0c158f191a76d27.jpg', '4c7ed9a074b36686a0c158f191a76d27.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(55, 'Біологія 10 клас', 'afcc18537d4653e759e51b9cffaee288.jpg', 'afcc18537d4653e759e51b9cffaee288.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(56, 'Біологія 10 клас', 'c37b2ba88851f63acda04458062ffbe5.jpg', 'c37b2ba88851f63acda04458062ffbe5.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(57, 'Біологія 10 клас', 'cb94079d70a8d8e2234515545ae35790.jpg', 'cb94079d70a8d8e2234515545ae35790.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(58, 'Біологія 10 клас', 'cf708ace130a1cd4fc66774649221f44.jpg', 'cf708ace130a1cd4fc66774649221f44.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(59, 'Біологія 10 клас', '5b1983c6b6dd31042f12367e612d5c0b.jpg', '5b1983c6b6dd31042f12367e612d5c0b.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(60, 'Біологія 10 клас', '3e22f9de0ae89b201031e32a5f18194d.jpg', '3e22f9de0ae89b201031e32a5f18194d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(61, 'Біологія 10 клас', '1252e81067ce6f5601f3aae7fb60ee5e.jpg', '1252e81067ce6f5601f3aae7fb60ee5e.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(62, 'Біологія 10 клас', 'b12dd76057b031aa3c7ae463209f261f.jpg', 'b12dd76057b031aa3c7ae463209f261f.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(63, 'Біологія 10 клас', '711e65523f7c8b242ad58a65982c8b65.jpg', '711e65523f7c8b242ad58a65982c8b65.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(64, 'Біологія 10 клас', '73cdc8f4e47442f82a4d7fa0473998e8.jpg', '73cdc8f4e47442f82a4d7fa0473998e8.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(65, 'Біологія 10 клас', '00ecad144e48e49edcfceb42c45cbbf3.jpg', '00ecad144e48e49edcfceb42c45cbbf3.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(66, 'Біологія 10 клас', '5cb622ee210b4bd419cafda50bd0adbb.jpg', '5cb622ee210b4bd419cafda50bd0adbb.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(67, 'Біологія 10 клас', 'e9208ec2d176bd2b8b073e765cd820cc.jpg', 'e9208ec2d176bd2b8b073e765cd820cc.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(68, 'Біологія 10 клас', '0636247d7d26b8560204f9e3fea1a981.jpg', '0636247d7d26b8560204f9e3fea1a981.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(69, 'Біологія 10 клас', 'd204aea6cb1ba48ece40ce71a37ffd47.jpg', 'd204aea6cb1ba48ece40ce71a37ffd47.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(70, 'Біологія 10 клас', '7b68d672dd33b5575e88e5e9c3054487.jpg', '7b68d672dd33b5575e88e5e9c3054487.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(71, 'Біологія 10 клас', '238ecfbfb6a905462988696cb9cad30d.jpg', '238ecfbfb6a905462988696cb9cad30d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(72, 'Біологія 10 клас', 'd48b9fac722089f96833837517515798.jpg', 'd48b9fac722089f96833837517515798.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(73, 'Біологія 10 клас', '06e954ccc6f63cd45e7487b53fba2906.jpg', '06e954ccc6f63cd45e7487b53fba2906.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(74, 'Біологія 10 клас', 'eff2df90d679415e16a2161af9d4666a.jpg', 'eff2df90d679415e16a2161af9d4666a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(75, 'Біологія 10 клас', 'de811cbd64e434e91d1b82660777f1ff.jpg', 'de811cbd64e434e91d1b82660777f1ff.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(76, 'Біологія 10 клас', '8430a848714d8d9523316fea0ff7fede.jpg', '8430a848714d8d9523316fea0ff7fede.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(77, 'Біологія 10 клас', '8ca934c4798e2a122e20e012cf1e392b.jpg', '8ca934c4798e2a122e20e012cf1e392b.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(78, 'Біологія 10 клас', '44041fce8838973a6871d49c53660024.jpg', '44041fce8838973a6871d49c53660024.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(79, 'Біологія 10 клас', '7511d7197587a13b646079d5906bee48.jpg', '7511d7197587a13b646079d5906bee48.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(80, 'Біологія 10 клас', '1c811667dad9902921e028edd60aae8f.jpg', '1c811667dad9902921e028edd60aae8f.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(81, 'Біологія 10 клас', '4f1fcef7477e46ce50219557108ec29e.jpg', '4f1fcef7477e46ce50219557108ec29e.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(82, 'Біологія 10 клас', '057d3ce7491cd978a1e591fc1ce5324b.jpg', '057d3ce7491cd978a1e591fc1ce5324b.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(83, 'Біологія 10 клас', 'cd314962a2026973ddf29c8ef1c2419d.jpg', 'cd314962a2026973ddf29c8ef1c2419d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(84, 'Біологія 10 клас', 'f12aa70c8445996f89f4320e0cb8185a.jpg', 'f12aa70c8445996f89f4320e0cb8185a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(85, 'Біологія 10 клас', '229aee829d87b101efda5502db000af0.jpg', '229aee829d87b101efda5502db000af0.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(86, 'Біологія 10 клас', 'c897ab1de1f28dbfc214a062cbe91ff1.jpg', 'c897ab1de1f28dbfc214a062cbe91ff1.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(87, 'Біологія 10 клас', '916cc7a6c5ac8e2b2bfdba7369d66560.jpg', '916cc7a6c5ac8e2b2bfdba7369d66560.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(88, 'Біологія 10 клас', '66dce8cd9c1830e6db5a83cc346c22a0.jpg', '66dce8cd9c1830e6db5a83cc346c22a0.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(89, 'Біологія 10 клас', 'b30d8a06644af150921939e4f198bc6a.jpg', 'b30d8a06644af150921939e4f198bc6a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(90, 'Біологія 10 клас', 'e275bbad763814cc26d193507ef3213c.jpg', 'e275bbad763814cc26d193507ef3213c.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(91, 'Біологія 10 клас', '3e08c2d60cf992737002295dc585cdf0.jpg', '3e08c2d60cf992737002295dc585cdf0.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(92, 'Біологія 10 клас', '4468347d8337dc8cc1e7245bf038ad4c.jpg', '4468347d8337dc8cc1e7245bf038ad4c.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(93, 'Біологія 10 клас', 'fbb202906d8a2376f6de02e845af526a.jpg', 'fbb202906d8a2376f6de02e845af526a.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(94, 'Біологія 10 клас', 'edb9fadb1fb876c5e6380d8ae0237ed3.jpg', 'edb9fadb1fb876c5e6380d8ae0237ed3.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(95, 'Біологія 10 клас', 'e557c41b9adf3cd4d5f2a404e59aaf05.jpg', 'e557c41b9adf3cd4d5f2a404e59aaf05.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(96, 'Біологія 10 клас', '7b30af8ec891459bc9fa5cbfaaf32009.jpg', '7b30af8ec891459bc9fa5cbfaaf32009.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(97, 'Біологія 10 клас', 'fbae6a8c8b4f1ec69f6bbd5c57f9e722.jpg', 'fbae6a8c8b4f1ec69f6bbd5c57f9e722.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(98, 'Біологія 10 клас', 'eb4be210c04cb7230233b4acbd23ada9.jpg', 'eb4be210c04cb7230233b4acbd23ada9.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(99, 'Біологія 10 клас', 'a787d13c3fa0550a6a5339dd03965aa8.jpg', 'a787d13c3fa0550a6a5339dd03965aa8.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net'),
(100, 'Біологія 10 клас', '72f587f78e091818e620c48bd154011d.jpg', '72f587f78e091818e620c48bd154011d.pdf', 'Савко', 'Учбовий матеріал', 'bryazginqwe@ukr.net');

-- --------------------------------------------------------

--
-- Структура таблицы `pupils`
--

CREATE TABLE `pupils` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `name_o` varchar(20) NOT NULL,
  `patronymic` varchar(20) NOT NULL,
  `password_o` varchar(64) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `status` enum('p','t') NOT NULL,
  `form` int(2) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pupils`
--

INSERT INTO `pupils` (`id`, `email`, `surname`, `name_o`, `patronymic`, `password_o`, `birth_date`, `status`, `form`, `photo`) VALUES
(1, 'bryazgin@dlit.dp.ua', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 'p', 10, '0.jpg'),
(2, 'teacher@mail.ru', 'Іван', 'Іванов', 'Васильович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 't', 10, '0.jpg'),
(4, 'teacher@gmail.ru', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 't', 10, '0.jpg'),
(6, 'bryazgin@ukr.net', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 'p', 10, '0.jpg'),
(9, 'kiril@gmail.com', 'Брязгин', 'Кирилл', 'Сергеевич', '7ec9b8a6f527bf8fd8f847de2cf94532', '2015-09-21', 'p', 1, '0.jpg'),
(10, 'bryazgin1@ukr.net', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 't', 10, '0.jpg'),
(11, 'bryazgin1234@ukr.net', 'Брязгін', 'Микита', 'Сергійович', '258bf761e29b09d8706fc7d94a5e9867', '2005-01-01', 'p', 10, '0.jpg'),
(12, 'bryazgin1234@ukr.net', 'Брязгін', 'Микита', 'Сергійович', '258bf761e29b09d8706fc7d94a5e9867', '2005-01-01', 'p', 10, '0.jpg'),
(13, 'bryazginqwe@ukr.net', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 'p', 10, '0.jpg'),
(14, 'bryazgin2005@dlit.dp.ua', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-07-19', 'p', 10, '0.jpg'),
(15, 'bryazgin2005@dlit.dp.ua', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-07-19', 'p', 10, '0.jpg'),
(16, 'bryazgin228@dlit.dp.ua', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 'p', 11, '0.jpg'),
(17, 'bryazgin228@dlit.dp.ua', 'Брязгін', 'Микита', 'Сергійович', '8f954fde19109f2c6500a39c6a8c60b3', '2005-01-01', 'p', 11, '0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id_question`, `question`, `type_of`, `photo`, `parent_test`) VALUES
(1, '3+1', 'Вибір з множини', '', 1),
(2, '7', 'Вибір з множини', '', 1),
(3, '1+2', 'Відкрита відповідь', '', 1),
(4, 'Приклади', 'Вибір відповідності', '', 2),
(5, '1+2', 'Відкрита відповідь', '', 2),
(6, '3+4', 'Вибір з множини', '', 2),
(7, 'Есе на тему \"Життя\"', 'Есе (відповідь з поясненнями)', '', 3),
(8, '8-4', 'Вибір з множини', '', 4),
(9, 'Вирішити приклади:', 'Вибір відповідності', '', 4),
(10, '10-?=4', 'Відкрита відповідь', '', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `name_test` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` int(2) NOT NULL,
  `timer` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id_test`, `name_test`, `instruction`, `background`, `subject`, `form`, `timer`) VALUES
(1, 'Перевірка 2.0', 'Ув', 'test4.png', 'Математика', 1, 4),
(2, 'Test', 'Уважно', 'test4.png', 'Математика', 1, 12),
(3, 'Есе', 'Виконати вчасно', 'test4.png', 'Математика', 1, 12),
(4, 'Для Кирилла', 'Уважність', 'test5.jpg', 'Математика', 1, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `test_list`
--

CREATE TABLE `test_list` (
  `id_test_section` int(11) NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form` int(2) NOT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test_list`
--

INSERT INTO `test_list` (`id_test_section`, `subject`, `form`, `photo`) VALUES
(1, 'Українська мова', 1, '11.jpg'),
(2, ' Англійська мова', 1, '12.jpg'),
(3, 'Математика', 1, '13.jpg'),
(4, 'Мистецтво і технології', 1, '14.jpg'),
(5, 'Природознавство', 1, '15.jpg'),
(6, 'Українська мова', 2, '21.jpg'),
(7, ' Англійська мова', 2, '22.jpg'),
(8, 'Математика', 2, '23.jpg'),
(9, 'Мистецтво і технології', 2, '24.jpg'),
(10, 'Природознавство', 2, '25.jpg'),
(11, 'Інформатика', 2, '26.jpg'),
(12, 'Українська мова', 3, '31.jpg'),
(13, ' Англійська мова', 3, '32.jpg'),
(14, 'Математика', 3, '33.jpg'),
(15, 'Мистецтво і технології', 3, '34.jpg'),
(16, 'Природознавство', 3, '35.jpg'),
(17, 'Інформатика', 3, '36.jpg'),
(18, 'Основи здоров\'я', 3, '37.jpg'),
(19, 'Українська мова', 4, '41.jpg'),
(20, ' Англійська мова', 4, '42.jpg'),
(21, 'Математика', 4, '43.jpg'),
(22, 'Мистецтво і технології', 4, '44.jpg'),
(23, 'Природознавство', 4, '45.jpg'),
(24, 'Інформатика', 4, '46.jpg'),
(25, 'Основи здоров\'я', 4, '47.jpg'),
(26, 'Українська мова', 5, '51.jpg'),
(27, 'Українська література', 5, '52.jpg'),
(28, ' Англійська мова', 5, '53.jpg'),
(29, 'Всесвітня історія', 5, '54.jpg'),
(30, 'Зарубіжна література', 5, '55.jpg'),
(31, 'Мистецтво і технології', 5, '56.jpg'),
(32, 'Математика', 5, '57.jpg'),
(33, 'Природознавство', 5, '58.jpg'),
(34, 'Інформатика', 5, '59.jpg'),
(35, 'Основи здоров\'я', 5, '510.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `test_results`
--

CREATE TABLE `test_results` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_test` int(20) NOT NULL,
  `score` int(4) NOT NULL,
  `review` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `test_results`
--

INSERT INTO `test_results` (`email`, `id_test`, `score`, `review`) VALUES
('', 2, 533, 'b5ee6d1b9d332d76443fab42e4c8ae17'),
('', 2, 800, '52ef179edd8b4bebad3153154a77cc67'),
('', 2, 1067, '987073faf72a0e4dc138ce52e8c1f1ca'),
('', 2, 800, '4ff028dcad47189da8f4c5ab423372b4'),
('', 2, 800, '01ed67ab55bde3d081cc5dd9d85dc40d'),
('', 2, 533, '09a44f35e956bf22150c4991cdd8ce11'),
('', 2, 533, 'ae2675dbee8e491e1ddb4e0d08d8ff22'),
('', 2, 533, 'b6ed4942f8cbb18f96dcd9f96ce3f377'),
('', 2, 533, 'abe4398f14b7d26f7a50ef69de09f086'),
('', 2, 533, '1d057b15c531b2c3f17e56abe04c8ae4'),
('', 2, 533, '8ece65ad16616b28877ae4655e61ff95'),
('', 2, 533, '228a3d2490bfedc5b4f821a038a52438'),
('', 2, 533, 'e19f46fe6aa541dbbeb44c635a249b87'),
('', 2, 533, '4ef10bc4fcac4f0ced173e301de96d42'),
('', 2, 533, 'e3e1355c90051fbe2f9b03dfdb5281c9'),
('', 2, 533, '08e1f76d1e49c73feae9a22df18ced59'),
('', 2, 533, '10f608ae818c71eaa9333d9a5bb7bb2a'),
('bryazgin228@dlit.dp.ua', 2, 533, 'd0f7eeb6d1088b2412be6097db7ef01d'),
('bryazgin228@dlit.dp.ua', 2, 533, '46be6eeb0135be8934fd3461b667e4b8'),
('bryazgin228@dlit.dp.ua', 2, 533, 'cf21caa7b020a3de7662b0dc308e3349'),
('bryazgin228@dlit.dp.ua', 2, 533, '2cbfa0a0f323ea81796d90c91e864578'),
('bryazgin228@dlit.dp.ua', 1, 1600, '891743c03f7b9d302f13f87ef0b97a60'),
('bryazgin228@dlit.dp.ua', 4, 1333, '6695b569cdea4bfbc23f518df8c21c41'),
('bryazgin228@dlit.dp.ua', 2, 800, 'b83f133bc9e8e5c1173338b17f5315ee'),
('bryazgin228@dlit.dp.ua', 2, 267, '1e5bda230195e320bae18f7939bc9dad'),
('bryazgin228@dlit.dp.ua', 1, 1200, '973ca33d7fad2de3150e0a9b0e830e01'),
('bryazgin228@dlit.dp.ua', 1, 1600, '9fbc1d650e616c12a2a4f73b97729dee'),
('bryazgin228@dlit.dp.ua', 2, 1067, '7fb2485e99dfd10bc18b986207cb019b'),
('bryazgin228@dlit.dp.ua', 2, 1067, 'b8c967121bb4a3623838a9e21b878b92'),
('bryazgin228@dlit.dp.ua', 2, 1067, '3c1892268f3b5f44ae8cda3cc2b70111'),
('bryazgin228@dlit.dp.ua', 2, 1067, 'c73f7197f92004a32851888e7a9e022c'),
('bryazgin228@dlit.dp.ua', 2, 1067, 'b32c2e4e2d1d8ff991da165f28ff61ae'),
('bryazgin228@dlit.dp.ua', 2, 1067, 'ddb9c318fef46b264b27b11e48040870'),
('bryazgin228@dlit.dp.ua', 2, 533, '3f423706ee7c1f03df4bd90066cf5168'),
('bryazgin228@dlit.dp.ua', 2, 1067, '0b9918d5334b0ab6950614637f7c4cc2'),
('bryazgin228@dlit.dp.ua', 2, 1333, '2586471b3b13126c6fd1c2f5de69d964'),
('bryazgin228@dlit.dp.ua', 2, 1335, '4b97b5741dab418e4a3530acd776c695'),
('bryazgin228@dlit.dp.ua', 2, 801, '6310d5414cc97beb3922af2ac0a65413'),
('bryazgin228@dlit.dp.ua', 2, 0, '29a17bb5bc1821cb489bdd586fd8b203'),
('bryazgin228@dlit.dp.ua', 2, 1602, '70c71831d80a67dfe995bbe67a2fcd59'),
('bryazgin228@dlit.dp.ua', 2, 1335, '5deeed85db0e2fecf7c3a0bb68434332'),
('bryazgin228@dlit.dp.ua', 2, 1068, 'cd0b7d870ba78b3730f71b22dff6687a'),
('', 2, 801, '158af22c10f86a2a8d44286dcda618a8'),
('', 2, 1602, '1939a06be98813dec66cfae5cf770423'),
('', 2, 801, '733724456ba6ff28dcceed1567047ca2'),
('', 2, 1068, '127774e2f69046fa85c2125306ee75ae'),
('', 2, 801, 'c1eff757597e2e7e9a2fef5b156d9b5e'),
('', 2, 801, 'aa01df9e8e24a48e34652d6530ac7cf5'),
('', 2, 1335, 'cf0bfc2cc6ffef0cf2deab8868be5da0'),
('', 2, 1602, '17f017143bb5b26380917ebf4ac69d61'),
('', 2, 1335, '2520b6c2ed9ff9335440a89f932497ab');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Индексы таблицы `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id_book`);

--
-- Индексы таблицы `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

--
-- Индексы таблицы `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`id_test_section`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `library`
--
ALTER TABLE `library`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `pupils`
--
ALTER TABLE `pupils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `test_list`
--
ALTER TABLE `test_list`
  MODIFY `id_test_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
