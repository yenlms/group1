-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2013 年 09 月 02 日 14:38
-- 伺服器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `lms`
--

-- --------------------------------------------------------

--
-- 表的結構 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `admin`
--

INSERT INTO `admin` (`account`, `password`) VALUES
('teacher', 'teacher');

-- --------------------------------------------------------

--
-- 表的結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(20) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`account`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `member`
--

INSERT INTO `member` (`account`, `password`, `username`, `email`, `country`, `age`) VALUES
('student1', 'student1', '林同學', 'lin01@ntue.edu.tw', '台北', 20),
('student2', 'student2', '劉同學', 'liu02@ntue.edu.tw', '台南', 19);

-- --------------------------------------------------------

--
-- 表的結構 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subject` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 轉存資料表中的資料 `message`
--

INSERT INTO `message` (`id`, `author`, `subject`, `content`, `date`) VALUES
(1, '林同學', '電腦的種類有那些呢?', '除了桌上型電腦外，是否還有其他的電腦型式呢?', '2013-09-02 14:31:51'),
(2, '劉同學', '關於平板電腦', '平板電腦屬於電腦嗎?\r\n那智慧型手機是否也可以算是電腦呢?', '2013-09-02 14:32:39');

-- --------------------------------------------------------

--
-- 表的結構 `reading`
--

CREATE TABLE IF NOT EXISTS `reading` (
  `serial` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `content` varchar(50) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `reading`
--

INSERT INTO `reading` (`serial`, `type`, `content`, `name`) VALUES
(1001, 'article', '1001.txt', '電腦簡介'),
(1002, 'figure', '1002.jpg', '電腦圖片');

-- --------------------------------------------------------

--
-- 表的結構 `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `account` varchar(20) NOT NULL,
  `serial` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`account`,`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 轉存資料表中的資料 `record`
--

INSERT INTO `record` (`account`, `serial`, `time`, `comments`) VALUES
('mary', 1001, 103, 'introduce of a computer'),
('mary', 1002, 41, 'a computer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
