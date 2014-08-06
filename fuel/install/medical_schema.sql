/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.16 : Database - medical
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medical` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medical`;

/*Table structure for table `fuel_archives` */

DROP TABLE IF EXISTS `fuel_archives`;

CREATE TABLE `fuel_archives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) unsigned NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `version` smallint(5) unsigned NOT NULL,
  `version_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_archives` */

/*Table structure for table `fuel_blocks` */

DROP TABLE IF EXISTS `fuel_blocks`;

CREATE TABLE `fuel_blocks` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` text COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`language`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blocks` */

insert  into `fuel_blocks`(`id`,`name`,`description`,`view`,`language`,`published`,`date_added`,`last_modified`) values (2,'quote','','{$quote = fuel_model(\'quotes\', array(\'find\' = \'one\', \'order\' = \'RAND()\'))}\n{if ($quote) }\n<div id=\"block_quote\">\n	{quote($quote->content, $quote->name, $quote->title)}\n</div>\n{/if}','english','no','2010-11-06 18:34:33','2010-11-07 01:47:36'),(3,'showcase','','{$project = fuel_model(\'projects\', array(\'find\' = \'one\', \'where\' = array(\'featured\' = \'yes\'), \'order\' = \'RAND()\'))}\n\n{if ($project) }\n<div id=\"block_showcase\">\n	<h3>{$project->name}</h3>\n	<img src=\"{$project->image_path}\" />\n</div>\n{/if}','english','yes','2010-11-06 18:34:58','2010-11-07 01:14:08');

/*Table structure for table `fuel_blog_categories` */

DROP TABLE IF EXISTS `fuel_blog_categories`;

CREATE TABLE `fuel_blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'If left blank, the permalink will automatically be created for you.',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permalink` (`permalink`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blog_categories` */

insert  into `fuel_blog_categories`(`id`,`name`,`permalink`,`published`) values (1,'Uncategorized','uncategorized','yes'),(2,'Widgets','widgets','yes');

/*Table structure for table `fuel_blog_comments` */

DROP TABLE IF EXISTS `fuel_blog_comments`;

CREATE TABLE `fuel_blog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `is_spam` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blog_comments` */

insert  into `fuel_blog_comments`(`id`,`post_id`,`parent_id`,`author_id`,`author_name`,`author_email`,`author_website`,`author_ip`,`is_spam`,`content`,`published`,`date_added`,`last_modified`) values (1,1,0,0,'Dave','dave@thedaylightstudio.com','www.thedaylightstudo.com','::1','no','I love star wars','no','2010-11-07 19:24:42','2010-11-07 19:24:42');

/*Table structure for table `fuel_blog_links` */

DROP TABLE IF EXISTS `fuel_blog_links`;

CREATE TABLE `fuel_blog_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('blank','self','parent') DEFAULT 'blank',
  `description` varchar(100) DEFAULT NULL,
  `precedence` int(11) NOT NULL DEFAULT '0',
  `published` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fuel_blog_links` */

insert  into `fuel_blog_links`(`id`,`name`,`url`,`target`,`description`,`precedence`,`published`) values (1,'Star Wars','http://www.starwars.com','blank','',0,'yes'),(2,'The Darth Side','http://darthside.blogspot.com/','blank','',0,'yes');

/*Table structure for table `fuel_blog_posts` */

DROP TABLE IF EXISTS `fuel_blog_posts`;

CREATE TABLE `fuel_blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'This is the last part of the url string. If left blank, the permalink will automatically be created for you.',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_filtered` text COLLATE utf8_unicode_ci NOT NULL,
  `formatting` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'A condensed version of the content',
  `author_id` int(10) unsigned NOT NULL COMMENT 'If left blank, you will assumed be the author.',
  `main_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `list_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `thumbnail_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sticky` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `allow_comments` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permalink` (`permalink`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blog_posts` */

insert  into `fuel_blog_posts`(`id`,`title`,`permalink`,`content`,`content_filtered`,`formatting`,`excerpt`,`author_id`,`main_image`,`list_image`,`thumbnail_image`,`sticky`,`allow_comments`,`date_added`,`last_modified`,`published`) values (1,'A long, long time ago, in a galaxy far, far away','a-long-long-time-ago-in-a-galaxy-far-far-away','Episode IV, A NEW HOPE It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire. During the battle, Rebel spies managed to steal secret plans to the Empire&rsquo;s ultimate weapon, the DEATH STAR, an armored space station with enough power to destroy an entire planet. Pursued by the Empire&rsquo;s sinister agents, Princess Leia races home aboard her starship, custodian of the stolen plans that can save her people and restore freedom to the galaxy&hellip;.','Episode IV, A NEW HOPE It is a period of civil war. Rebel spaceships, striking from a hidden base, have won their first victory against the evil Galactic Empire. During the battle, Rebel spies managed to steal secret plans to the Empire&rsquo;s ultimate weapon, the DEATH STAR, an armored space station with enough power to destroy an entire planet. Pursued by the Empire&rsquo;s sinister agents, Princess Leia races home aboard her starship, custodian of the stolen plans that can save her people and restore freedom to the galaxy&hellip;.','auto_typography','',1,'','','','no','yes','2010-11-06 15:27:00','2010-11-07 19:16:35','yes');

/*Table structure for table `fuel_blog_posts_to_categories` */

DROP TABLE IF EXISTS `fuel_blog_posts_to_categories`;

CREATE TABLE `fuel_blog_posts_to_categories` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blog_posts_to_categories` */

insert  into `fuel_blog_posts_to_categories`(`post_id`,`category_id`) values (1,1);

/*Table structure for table `fuel_blog_settings` */

DROP TABLE IF EXISTS `fuel_blog_settings`;

CREATE TABLE `fuel_blog_settings` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_blog_settings` */

insert  into `fuel_blog_settings`(`name`,`value`) values ('title','My Blog'),('uri','blog/'),('theme_layout','blog'),('theme_path','themes/default/'),('theme_module','blog'),('use_cache','0'),('cache_ttl','3600'),('per_page','2'),('description',''),('use_captchas','1'),('monitor_comments','1'),('save_spam','1'),('allow_comments','1'),('akismet_api_key',''),('comments_time_limit',''),('multiple_comment_submission_time_limit','30'),('asset_upload_path','images/blog/');

/*Table structure for table `fuel_blog_users` */

DROP TABLE IF EXISTS `fuel_blog_users`;

CREATE TABLE `fuel_blog_users` (
  `fuel_user_id` int(10) unsigned NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`fuel_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fuel_blog_users` */

insert  into `fuel_blog_users`(`fuel_user_id`,`display_name`,`website`,`about`,`avatar_image`,`twitter`,`facebook`,`date_added`,`active`) values (1,'','','','team_placeholder.png','','','2010-11-07 12:14:53','yes');

/*Table structure for table `fuel_categories` */

DROP TABLE IF EXISTS `fuel_categories`;

CREATE TABLE `fuel_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `slug` varchar(100) NOT NULL DEFAULT '',
  `context` varchar(100) NOT NULL DEFAULT '',
  `precedence` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `published` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fuel_categories` */

/*Table structure for table `fuel_logs` */

DROP TABLE IF EXISTS `fuel_logs`;

CREATE TABLE `fuel_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_logs` */

insert  into `fuel_logs`(`id`,`entry_date`,`user_id`,`message`,`type`) values (1,'2014-08-04 22:39:58',1,'Successful login by \'admin\' from ::1','debug'),(2,'2014-08-04 23:06:52',1,'Password reset from CMS for \'admin\' from ::1','debug'),(3,'2014-08-05 12:04:21',1,'Successful login by \'admin\' from ::1','debug'),(4,'2014-08-05 16:17:02',1,'Successful login by \'admin\' from ::1','debug'),(5,'2014-08-05 19:25:02',1,'Successful login by \'admin\' from 127.0.0.1','debug');

/*Table structure for table `fuel_navigation` */

DROP TABLE IF EXISTS `fuel_navigation`;

CREATE TABLE `fuel_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(5) unsigned NOT NULL DEFAULT '1',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The part of the path after the domain name that you want the link to go to (e.g. comany/about_us)',
  `nav_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The nav key is a friendly ID that you can use for setting the selected state. If left blank, a default value will be set for you.',
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name you want to appear in the menu',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Used for creating menu hierarchies. No value means it is a root level menu item',
  `precedence` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The higher the number, the greater the precedence and farther up the list the navigational element will appear',
  `attributes` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Extra attributes that can be used for navigation implementation',
  `selected` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The pattern to match for the active state. Most likely you leave this field blank',
  `hidden` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'A hidden value can be used in rendering the menu. In some areas, the menu item may not want to be displayed',
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Determines whether the item is displayed or not',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`nav_key`,`parent_id`,`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_navigation` */

/*Table structure for table `fuel_navigation_groups` */

DROP TABLE IF EXISTS `fuel_navigation_groups`;

CREATE TABLE `fuel_navigation_groups` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_navigation_groups` */

/*Table structure for table `fuel_page_variables` */

DROP TABLE IF EXISTS `fuel_page_variables`;

CREATE TABLE `fuel_page_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('string','int','boolean','array') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'string',
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_id` (`page_id`,`name`,`language`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_page_variables` */

insert  into `fuel_page_variables`(`id`,`page_id`,`name`,`scope`,`value`,`type`,`language`,`active`) values (18,1,'meta_keywords','','','string','english','yes'),(19,1,'body','','<h1>About WidgiCorp </h1>\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla tincidunt condimentum nulla. Sed ut elit. Morbi lectus. Sed iaculis lacus eget elit. In hac habitasse platea dictumst. Nullam semper semper risus.</p>\n\n<p>Nulla tincidunt condimentum nulla. Sed ut elit. Morbi lectus. Sed iaculis lacus eget elit. In hac habitasse platea dictumst. Nullam semper semper risus.\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla tincidunt condimentum nulla. Sed ut elit. Morbi lectus. Sed iaculis lacus eget elit. In hac habitasse platea dictumst. Nullam semper semper risus.\n</p>\n<ul>\n <li>Lorem ipsum dolor sit amet</li>\n <li>Consectetuer adipiscing elit</li>\n <li>Sed ut elit. Morbi lectus. Sed</li>\n</ul>','string','english','yes'),(20,1,'body_class','','','string','english','yes'),(17,1,'meta_description','','','string','english','yes'),(16,1,'page_title','','','string','english','yes');

/*Table structure for table `fuel_pages` */

DROP TABLE IF EXISTS `fuel_pages`;

CREATE TABLE `fuel_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Add the part of the url after the root of your site (usually after the domain name). For the homepage, just put the word ''home''',
  `layout` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name of the template to associate with this page',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'A ''yes'' value will display the page and an ''no'' value will give a 404 error message',
  `cache` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Cache controls whether the page will pull from the database or from a saved file which is more effeicent. If a page has content that is dynamic, it''s best to set cache to ''no''',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`),
  KEY `layout` (`layout`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_pages` */

insert  into `fuel_pages`(`id`,`location`,`layout`,`published`,`cache`,`date_added`,`last_modified`,`last_modified_by`) values (1,'about','main','yes','yes','2010-11-06 17:43:03','2010-11-07 10:14:14',1);

/*Table structure for table `fuel_permissions` */

DROP TABLE IF EXISTS `fuel_permissions`;

CREATE TABLE `fuel_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'In most cases, this should be the name of the module (e.g. news)',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_permissions` */

insert  into `fuel_permissions`(`id`,`name`,`description`,`active`) values (1,'pages','Manage pages','yes'),(2,'pages_publish','Ability to Publish Pages','yes'),(3,'pages_delete','Ability to Delete Pages','yes'),(4,'navigation','Manage navigation','yes'),(5,'users','Manage users','yes'),(6,'tools/backup','Manage database backup','yes'),(7,'manage/cache','Manage the page cache','yes'),(8,'manage/activity','View activity logs','yes'),(9,'myPHPadmin','myPHPadmin','yes'),(10,'google_analytics','Google Analytics','yes'),(11,'tools/user_guide','Access the User Guide','yes'),(12,'manage','View the Manage Dashboard Page','yes'),(13,'permissions','Manage Permissions','yes'),(14,'tools','Manage Tools','yes'),(15,'tools/seo/google_keywords','Google Keywords','yes'),(16,'sitevariables','Site Variables','yes'),(17,'blog/posts','Blog Posts','yes'),(18,'blog/categories','Blog Categories','yes'),(19,'blog/comments','Blog Comments','yes'),(20,'blog/links','Blog Comments','yes'),(21,'blog/users','Blog Authors','yes'),(22,'blog/settings','Blog Settings','yes'),(23,'assets','Assets','yes'),(24,'tools/validate','Validate','yes'),(25,'tools/seo','Page Analysis','yes'),(26,'tools/tester','Tester Module','yes'),(27,'blocks','Manage Blocks','yes'),(28,'site_docs','Site Documentation','yes'),(29,'tools/cronjobs','Cronjobs','yes'),(30,'quotes','Quotes','yes'),(31,'projects','Projects','yes'),(32,'settings','Settings','yes');

/*Table structure for table `fuel_relationships` */

DROP TABLE IF EXISTS `fuel_relationships`;

CREATE TABLE `fuel_relationships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `candidate_table` varchar(100) DEFAULT '',
  `candidate_key` int(11) NOT NULL,
  `foreign_table` varchar(100) DEFAULT NULL,
  `foreign_key` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `candidate_table` (`candidate_table`,`candidate_key`),
  KEY `foreign_table` (`foreign_table`,`foreign_key`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `fuel_relationships` */

insert  into `fuel_relationships`(`id`,`candidate_table`,`candidate_key`,`foreign_table`,`foreign_key`) values (1,'fuel_users',2,'fuel_permissions',1),(2,'fuel_users',2,'fuel_permissions',2),(3,'fuel_users',2,'fuel_permissions',3),(4,'fuel_users',2,'fuel_permissions',4),(5,'fuel_users',2,'fuel_permissions',6),(6,'fuel_users',2,'fuel_permissions',7),(7,'fuel_users',2,'fuel_permissions',8),(8,'fuel_users',2,'fuel_permissions',11),(9,'fuel_users',2,'fuel_permissions',12),(10,'fuel_users',2,'fuel_permissions',14),(11,'fuel_users',2,'fuel_permissions',15),(12,'fuel_users',2,'fuel_permissions',16),(13,'fuel_users',2,'fuel_permissions',17),(14,'fuel_users',2,'fuel_permissions',18),(15,'fuel_users',2,'fuel_permissions',19),(16,'fuel_users',2,'fuel_permissions',20),(17,'fuel_users',2,'fuel_permissions',21),(18,'fuel_users',2,'fuel_permissions',22),(19,'fuel_users',2,'fuel_permissions',23),(20,'fuel_users',2,'fuel_permissions',24),(21,'fuel_users',2,'fuel_permissions',25),(22,'fuel_users',2,'fuel_permissions',26),(23,'fuel_users',2,'fuel_permissions',27),(24,'fuel_users',2,'fuel_permissions',28),(25,'fuel_users',2,'fuel_permissions',29),(26,'fuel_users',2,'fuel_permissions',30),(27,'fuel_users',2,'fuel_permissions',31);

/*Table structure for table `fuel_settings` */

DROP TABLE IF EXISTS `fuel_settings`;

CREATE TABLE `fuel_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(50) NOT NULL DEFAULT '',
  `key` varchar(50) NOT NULL DEFAULT '',
  `value` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `module` (`module`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fuel_settings` */

/*Table structure for table `fuel_site_variables` */

DROP TABLE IF EXISTS `fuel_site_variables`;

CREATE TABLE `fuel_site_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'leave blank if you want the variable to be available to all pages',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_site_variables` */

/*Table structure for table `fuel_tags` */

DROP TABLE IF EXISTS `fuel_tags`;

CREATE TABLE `fuel_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `precedence` int(11) NOT NULL,
  `published` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fuel_tags` */

/*Table structure for table `fuel_users` */

DROP TABLE IF EXISTS `fuel_users`;

CREATE TABLE `fuel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `reset_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `super_admin` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fuel_users` */

insert  into `fuel_users`(`id`,`user_name`,`password`,`email`,`first_name`,`last_name`,`language`,`reset_key`,`salt`,`super_admin`,`active`) values (1,'admin','6b3d345139fe4bac78673130de6eb93cab1b2220','admin@localhost.com','admin','admin','english','','f650e77d67c3bcf50c906ea8cc97b300','yes','yes');

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name of the project',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'If left blank, one will automatically be generated for you',
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `launch_date` date DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `featured` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `precedence` int(11) NOT NULL DEFAULT '999' COMMENT 'The higher the number, the more important',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `projects` */

insert  into `projects`(`id`,`name`,`slug`,`client`,`description`,`website`,`launch_date`,`image`,`featured`,`precedence`,`published`) values (1,'Nuts Over Bolts','nuts-over-bolts','Yoda','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','getfuelcms.com','2010-11-06','showcase1.png','yes',999,'yes'),(2,'Cubed','cubed','Chewy','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','','0000-00-00','showcase2.png','yes',999,'yes');

/*Table structure for table `quotes` */

DROP TABLE IF EXISTS `quotes`;

CREATE TABLE `quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precedence` int(11) NOT NULL DEFAULT '0',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `quotes` */

insert  into `quotes`(`id`,`content`,`name`,`title`,`precedence`,`published`) values (1,'Do or do not... there is no try.','Yoda','Jedi',0,'yes'),(2,'Laugh it up fuzzball.','Han Solo','Mercenary',0,'yes');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
