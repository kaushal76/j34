CREATE TABLE IF NOT EXISTS `#__jdeveloper_libraries` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `name` varchar(40)NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `version` varchar(20) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
)
CHARACTER SET utf8
COLLATE utf8_general_ci;