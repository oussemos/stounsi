SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE `custom_page` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `site_id` varchar(32) collate cp1251_general_cs NOT NULL,
  `title` varchar(150) collate cp1251_general_cs NOT NULL,
  `text` text collate cp1251_general_cs NOT NULL,
  `image` varchar(150) collate cp1251_general_cs default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=125 ;



CREATE TABLE `faq` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `q` varchar(500) collate cp1251_general_cs default NULL,
  `a` varchar(500) collate cp1251_general_cs default NULL,
  `site_id` varchar(32) collate cp1251_general_cs NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs AUTO_INCREMENT=223 ;



INSERT INTO `faq` VALUES(219, 'What time do you open on Saturdays?', 'We open at 11:00 am on Saturdays.', '696f6832e62364174b94d23a4aa0ee13');
INSERT INTO `faq` VALUES(220, 'What time do you open on Saturdays?', 'We open at 11:00 am on Saturdays.', '696f6832e62364174b94d23a4aa0ee13');
INSERT INTO `faq` VALUES(221, 'What time do you open on Saturdays?', 'We open at 11:00 am on Saturdays.', '696f6832e62364174b94d23a4aa0ee13');
INSERT INTO `faq` VALUES(222, '', '', '696f6832e62364174b94d23a4aa0ee13');



CREATE TABLE `LOGS` (
  `ip` bigint(21) NOT NULL default '0',
  `sess` varchar(40) NOT NULL,
  `tow` datetime default NULL,
  `user` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`ip`,`sess`,`user`),
  KEY `tow` (`tow`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO `LOGS` VALUES(92112, '', '2011-07-21 14:06:05', 'test');
INSERT INTO `LOGS` VALUES(92112, '', '2011-07-21 15:50:19', 'info');



CREATE TABLE `sites` (
  `id` varchar(32) collate cp1251_general_cs NOT NULL default '',
  `design` int(10) NOT NULL,
  `name` varchar(50) collate cp1251_general_cs NOT NULL,
  `subdomain` varchar(45) collate cp1251_general_cs NOT NULL,
  `password` varchar(32) collate cp1251_general_cs NOT NULL,
  `email` varchar(45) collate cp1251_general_cs NOT NULL,
  `use_about_us` tinyint(1) NOT NULL default '0',
  `about_us_text` varchar(150) collate cp1251_general_cs default NULL,
  `about_us_phone` varchar(45) collate cp1251_general_cs default NULL,
  `about_us_address` varchar(150) collate cp1251_general_cs default NULL,
  `about_us_city` varchar(50) collate cp1251_general_cs default NULL,
  `about_us_state` varchar(50) collate cp1251_general_cs default NULL,
  `about_us_zip` varchar(50) collate cp1251_general_cs default NULL,
  `about_us_hours` varchar(50) collate cp1251_general_cs default NULL,
  `use_testimonials` tinyint(1) NOT NULL default '0',
  `testimonail_1` varchar(150) collate cp1251_general_cs default NULL,
  `testimonail_2` varchar(150) collate cp1251_general_cs default NULL,
  `testimonail_3` varchar(150) collate cp1251_general_cs default NULL,
  `testimonail_4` varchar(150) collate cp1251_general_cs default NULL,
  `testimonail_5` varchar(150) collate cp1251_general_cs default NULL,
  `testimonail_6` varchar(150) collate cp1251_general_cs default NULL,
  `use_gallery` tinyint(1) NOT NULL default '0',
  `gallery_1` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_2` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_3` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_4` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_5` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_6` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_7` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_8` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_9` varchar(150) collate cp1251_general_cs default NULL,
  `gallery_10` varchar(150) collate cp1251_general_cs default NULL,
  `use_faq` tinyint(1) NOT NULL default '0',
  `faq_id` int(10) unsigned default NULL,
  `use_conact_us` tinyint(1) NOT NULL default '0',
  `contact_us_text` text collate cp1251_general_cs,
  `contact_us_email` varchar(50) collate cp1251_general_cs default NULL,
  `contact_us_use_names` tinyint(1) default '0',
  `contact_us_use_address` tinyint(1) default '0',
  `contact_us_use_phone` tinyint(1) default '0',
  `contact_us_use_email` tinyint(1) default '0',
  `contact_us_use_how_learn` tinyint(1) default '0',
  `use_service` tinyint(1) NOT NULL default '0',
  `use_custom_page` tinyint(1) default '0',
  `use_google_code` tinyint(1) NOT NULL default '0',
  `google_code` text collate cp1251_general_cs,
  `logo` varchar(150) collate cp1251_general_cs default NULL,
  `is_active` int(1) NOT NULL default '0',
  `confirm_reg_id` varchar(255) collate cp1251_general_cs NOT NULL,
  `facebook_link` varchar(1024) collate cp1251_general_cs NOT NULL,
  `twitter_link` varchar(1024) collate cp1251_general_cs NOT NULL,
  `linkedin_link` varchar(1024) collate cp1251_general_cs NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `visits` int(11) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_cs;