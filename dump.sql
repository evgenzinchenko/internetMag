-- Adminer 4.8.1 MySQL 8.0.29-0ubuntu0.20.04.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `sort_order` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1,	'Рубашки',	1,	1),
(2,	'Платья',	5,	1),
(3,	'Футболки',	3,	1),
(4,	'Майки',	4,	1),
(5,	'Сумки',	2,	1),
(6,	'Чемоданы',	6,	1),
(7,	'Брюки',	7,	1),
(8,	'Пиджаки',	8,	1),
(9,	'Галстуки',	9,	1),
(10,	'Трусы',	10,	1);

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `author_id` int NOT NULL,
  `date` timestamp NOT NULL,
  `news_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `code` int NOT NULL,
  `price` float NOT NULL,
  `availability` int NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `is_new` int NOT NULL DEFAULT '0',
  `is_recommended` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1,	'рубашка клетка',	1,	123,	45,	1,	'домшоп',	'рисунок',	'',	1,	0,	1),
(2,	'рубашка полоска',	2,	135,	39,	1,	'секондханд',	'рисунок2',	'',	0,	0,	1),
(3,	'поло',	3,	987,	23,	1,	'полочка',	'рисунок3',	'',	0,	0,	1),
(4,	'Брюки чёрные',	7,	857635421,	550,	1,	'выффывфыаф',	'',	'ффыаыьпждльывсьябюсмьылдафлдысьбтфьвд вьждфьывждфьасждыьмбючмьяюсь баьфждаьфждаьфыжаь фждаьф.юабьфыьаждфьа фыдвьфждыьвжфдывьпа фьафь фыьва ждфьыжьафж дьфатьулалвтмбсмтк жытьвюбячьпэы',	1,	1,	1),
(5,	'брюки серые',	7,	758954656,	545,	1,	'ывпвпондтлимсч',	'',	'ычсы фывсфс фсфс',	0,	1,	1),
(6,	'пиджак классика двуполый',	8,	64574723,	1100,	1,	'аппатимати',	'',	'фыапывтьапбпапвим ыапрвапв фыыапывпр фыпуркноек кокенук  ',	1,	0,	1);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` int NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `email`, `password`, `name`) VALUES
(1,	'asd@ukr.net',	222222,	'Sasha'),
(2,	'qwerty@gmail.com',	111111,	'Dasha'),
(3,	'sada@gmail.com',	111111,	'Fora');

-- 2022-07-31 10:59:54
