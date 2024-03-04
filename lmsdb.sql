-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-06-09 22:06:13
-- 服务器版本： 5.7.26
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
-- 数据库： `lmsdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `assort`
--

CREATE TABLE `assort` (
  `id` int(11) NOT NULL,
  `assort_name` text COLLATE utf8_unicode_ci NOT NULL,
  `other` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `assort`
--

INSERT INTO `assort` (`id`, `assort_name`, `other`) VALUES
(3, '军事', '军事类书籍'),
(2, '历史', '历史题材书籍');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `book_name` text COLLATE utf8_unicode_ci NOT NULL,
  `book_assort` text COLLATE utf8_unicode_ci NOT NULL,
  `book_position` text COLLATE utf8_unicode_ci NOT NULL,
  `book_num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`id`, `book_name`, `book_assort`, `book_position`, `book_num`) VALUES
(2, '商君书', '历史', 'B-1区', 100),
(3, '孙子兵法', '军事', 'B-1区', 100);

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `book_name` text COLLATE utf8_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_num` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0：表示未进行处理；1表示已处理并通过未归还；2表示已处理未通过；3表示已处理并通过且归还',
  `entry_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`id`, `book_name`, `book_id`, `borrow_num`, `state`, `entry_user`) VALUES
(2, '商君书', 2, 3, 3, 'admin'),
(3, '孙子兵法', 3, 2, 2, 'admin'),
(4, '商君书', 2, 2, 3, 'zhangsan');

-- --------------------------------------------------------

--
-- 表的结构 `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` text COLLATE utf8_unicode_ci NOT NULL,
  `position_other` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `position`
--

INSERT INTO `position` (`id`, `position_name`, `position_other`) VALUES
(1, 'A区', '1楼A区'),
(2, 'B-1区', '1楼B-1区'),
(4, 'B-2区', '1楼B-2区');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `real_name` text COLLATE utf8_unicode_ci COMMENT '真实姓名',
  `limits` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `real_name`, `limits`) VALUES
(1, 'admin', 'admin', '李四', '图书管理 分类管理 位置管理 借阅管理 用户管理 权限管理'),
(2, 'zhangsan', 'zhangsan', '张三', '     '),
(3, 'wangwu', 'wangwu', '王五', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `assort`
--
ALTER TABLE `assort`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `assort`
--
ALTER TABLE `assort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
