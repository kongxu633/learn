--
-- 数据库: `learn`
--

-- --------------------------------------------------------

--
-- 表的结构 `le_article`
--

CREATE TABLE IF NOT EXISTS `le_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `click` smallint(6) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) unsigned NOT NULL,
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_unique` (`title`),
  KEY `title_index` (`title`),
  KEY `cid_index` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `le_article`
--

INSERT INTO `le_article` (`id`, `title`, `content`, `time`, `click`, `cid`, `del`) VALUES
(1, '本人有闲置厂房出租', '1000平方米厂房出租 靠近繁华地段 交通方便 联系电话123456789', 1459934106, 160, 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `le_article_attr`
--

CREATE TABLE IF NOT EXISTS `le_article_attr` (
  `art_id` int(10) unsigned NOT NULL,
  `attr_id` int(10) unsigned NOT NULL,
  KEY `art_id` (`art_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `le_article_attr`
--

INSERT INTO `le_article_attr` (`art_id`, `attr_id`) VALUES
(1, 2);

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
(1, '置顶', 'red'),
(2, '推荐', 'green'),
(3, '精华', 'blue');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `le_cate`
--

INSERT INTO `le_cate` (`id`, `name`, `pid`, `sort`) VALUES
(1, '招聘', 0, 3),
(2, '出租', 0, 1),
(3, '厂房', 2, 4),
(4, '办公楼', 2, 2),
(5, '美工', 1, 100),
(6, '出售', 0, 100),
(7, '二手', 6, 100);

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
(1, 'jfbst', '34ed059512054b3d71c1e7a6b1cc71d8', 1459988245, '192.168.1.107', 1);

-- --------------------------------------------------------

--
-- 表的结构 `le_pic`
--

CREATE TABLE IF NOT EXISTS `le_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `aid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `aid_index` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
