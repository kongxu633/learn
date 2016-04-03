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