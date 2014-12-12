CREATE TABLE `mod_news` (
  `id` int(11) NOT NULL auto_increment,
  `date` datetime NOT NULL,
  `img` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `news_order` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
