-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2019 年 05 月 08 日 19:51
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `wtlab109`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `account` char(10) CHARACTER SET utf8 NOT NULL,
  `password` char(10) CHARACTER SET utf8 NOT NULL,
  `email` varchar(35) CHARACTER SET utf8 NOT NULL,
  `phone` char(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`account`, `password`, `email`, `phone`) VALUES
('000', '000', '000@gmail.com', '0987000000'),
('123', '123', '123@gmail.com', '0987123123'),
('159', '159', '159@gmail.com', '0987159159'),
('456', '456', '456@gmail.com', '0987456456'),
('789', '789', '789@gmail.com', '0987456456'),
('yolok', '123', 'yolok@gmail.com', '0987987987');

-- --------------------------------------------------------

--
-- 資料表結構 `result`
--

CREATE TABLE `result` (
  `account` char(10) NOT NULL,
  `videoId` varchar(13) NOT NULL,
  `result` text NOT NULL,
  `score` char(5) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `sentence`
--

CREATE TABLE `sentence` (
  `videoId` varchar(13) NOT NULL,
  `timestamp` int(3) NOT NULL,
  `caption` text NOT NULL,
  `capId` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `sentence`
--

INSERT INTO `sentence` (`videoId`, `timestamp`, `caption`, `capId`) VALUES
('pt2atk-5_yQ', 67, 'It began with the forging of the great rings', '0'),
('Rnwwo9Zol6w', 64, 'Do you have to read at the table', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `video`
--

CREATE TABLE `video` (
  `id` varchar(13) NOT NULL,
  `title` text NOT NULL,
  `tag` text NOT NULL,
  `uploadDate` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `video`
--

INSERT INTO `video` (`id`, `title`, `tag`, `uploadDate`) VALUES
('4Jxb_Ad0u3E', 'Learn/Practice English with MOVIES (Lesson #48) Title: Shrek 2', 'shrek 2, english, learn, animation', 20190417),
('JZIL0QLBs4M', 'Learn/Practice English with MOVIES (Lesson #3) Title: The Blind Side', 'english, learn, The Blind Side, movie', 20190403),
('pt2atk-5_yQ', 'Learn/Practice English with MOVIES (Lesson #2) Title: The Lord of the Rings', 'english, learn, lord of the rings, movie', 20190402),
('Q7TMqR939c8', 'Learn/Practice English with MOVIES (Lesson #50) Title: Mulan', 'mulan, animation, english, learn', 20190419),
('Rnwwo9Zol6w', 'Learn/Practice English with MOVIES (Lesson #1) Title: The Incredibles', 'english, incredibles, learn, animation', 20190401),
('v04bjEx0lus', 'Learn/Practice English with MOVIES (Lesson #49) Title: Black Panther', 'black panther, english, learn, movie', 20190418);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`path`);

--
-- 資料表索引 `sentence`
--
ALTER TABLE `sentence`
  ADD UNIQUE KEY `capId` (`capId`);

--
-- 資料表索引 `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
