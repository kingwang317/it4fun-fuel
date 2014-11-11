CREATE TABLE `mod_event` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_title` varchar(50) NOT NULL DEFAULT '',
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `regi_start_date` datetime NOT NULL,
  `regi_end_date` datetime NOT NULL,
  `event_place` varchar(200) NOT NULL DEFAULT '',
  `event_charge` int(10) NOT NULL,
  `event_detail` text,
  `event_photo` varchar(255) DEFAULT NULL,
  `regi_limit_num` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;