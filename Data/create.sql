--
-- 数据库: `learn`
--

-- --------------------------------------------------------

--
-- 表的结构 `le_user`
--

CREATE TABLE IF NOT EXISTS `le_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`),
  KEY `username_index` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `le_user`
--

INSERT INTO `le_user` (`id`, `username`, `password`, `logintime`, `loginip`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1459671392, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `le_cate`
--

CREATE TABLE IF NOT EXISTS `le_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_unique` (`name`),
  KEY `pid_index` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `le_cate`
--

INSERT INTO `le_cate` (`id`, `name`, `pid`, `sort`) VALUES
(1, '顶级分类1', 0, 3),
(2, '顶级分类2', 0, 1),
(3, '子分类1-1', 1, 4),
(4, '子分类1-2', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `le_attr`
--

CREATE TABLE IF NOT EXISTS `le_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `color` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_unique` (`name`),
  KEY `name_index` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `le_attr`
--

INSERT INTO `le_attr` (`id`, `name`, `color`) VALUES
(1, '置顶', '#ffff00'),
(2, '推荐', '#ff0000'),
(3, '精华', '#00ff00');