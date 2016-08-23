-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2016 at 08:05 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `j34`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_assets`
--

CREATE TABLE IF NOT EXISTS `ciudq_assets` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set parent.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `level` int(10) unsigned NOT NULL COMMENT 'The cached level in the nested tree.',
  `name` varchar(50) NOT NULL COMMENT 'The unique name for the asset.\n',
  `title` varchar(100) NOT NULL COMMENT 'The descriptive title for the asset.',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_assets`
--

INSERT INTO `ciudq_assets` (`id`, `parent_id`, `lft`, `rgt`, `level`, `name`, `title`, `rules`) VALUES
(1, 0, 0, 91, 0, 'root.1', 'Root Asset', '{"core.login.site":{"6":1,"2":1},"core.login.admin":{"6":1},"core.login.offline":{"6":1},"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1},"core.edit.own":{"6":1,"3":1}}'),
(2, 1, 1, 2, 1, 'com_admin', 'com_admin', '{}'),
(3, 1, 3, 6, 1, 'com_banners', 'com_banners', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(4, 1, 7, 8, 1, 'com_cache', 'com_cache', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(5, 1, 9, 10, 1, 'com_checkin', 'com_checkin', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(6, 1, 11, 12, 1, 'com_config', 'com_config', '{}'),
(7, 1, 13, 16, 1, 'com_contact', 'com_contact', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(8, 1, 17, 34, 1, 'com_content', 'com_content', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":[],"core.edit":{"4":1},"core.edit.state":{"5":1},"core.edit.own":[]}'),
(9, 1, 35, 36, 1, 'com_cpanel', 'com_cpanel', '{}'),
(10, 1, 37, 38, 1, 'com_installer', 'com_installer', '{"core.admin":[],"core.manage":{"7":0},"core.delete":{"7":0},"core.edit.state":{"7":0}}'),
(11, 1, 39, 40, 1, 'com_languages', 'com_languages', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(12, 1, 41, 42, 1, 'com_login', 'com_login', '{}'),
(13, 1, 43, 44, 1, 'com_mailto', 'com_mailto', '{}'),
(14, 1, 45, 46, 1, 'com_massmail', 'com_massmail', '{}'),
(15, 1, 47, 48, 1, 'com_media', 'com_media', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":{"3":1},"core.delete":{"5":1}}'),
(16, 1, 49, 50, 1, 'com_menus', 'com_menus', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(17, 1, 51, 52, 1, 'com_messages', 'com_messages', '{"core.admin":{"7":1},"core.manage":{"7":1}}'),
(18, 1, 53, 54, 1, 'com_modules', 'com_modules', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(19, 1, 55, 58, 1, 'com_newsfeeds', 'com_newsfeeds', '{"core.admin":{"7":1},"core.manage":{"6":1},"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(20, 1, 59, 60, 1, 'com_plugins', 'com_plugins', '{"core.admin":{"7":1},"core.manage":[],"core.edit":[],"core.edit.state":[]}'),
(21, 1, 61, 62, 1, 'com_redirect', 'com_redirect', '{"core.admin":{"7":1},"core.manage":[]}'),
(22, 1, 63, 64, 1, 'com_search', 'com_search', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(23, 1, 65, 66, 1, 'com_templates', 'com_templates', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(24, 1, 67, 70, 1, 'com_users', 'com_users', '{"core.admin":{"7":1},"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.own":{"6":1},"core.edit.state":[]}'),
(26, 1, 71, 72, 1, 'com_wrapper', 'com_wrapper', '{}'),
(27, 8, 18, 23, 2, 'com_content.category.2', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(28, 3, 4, 5, 2, 'com_banners.category.3', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(29, 7, 14, 15, 2, 'com_contact.category.4', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(30, 19, 56, 57, 2, 'com_newsfeeds.category.5', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(32, 24, 68, 69, 1, 'com_users.category.7', 'Uncategorised', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(33, 1, 73, 74, 1, 'com_finder', 'com_finder', '{"core.admin":{"7":1},"core.manage":{"6":1}}'),
(35, 8, 24, 33, 2, 'com_content.category.9', 'Blog', '{"core.create":[],"core.delete":[],"core.edit":[],"core.edit.state":[],"core.edit.own":[]}'),
(36, 27, 19, 20, 3, 'com_content.article.1', 'About', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(37, 27, 21, 22, 3, 'com_content.article.2', 'Working on Your Site', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(38, 35, 25, 26, 3, 'com_content.article.3', 'Welcome to your blog', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(39, 35, 27, 28, 3, 'com_content.article.4', 'About your home page', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(40, 35, 29, 30, 3, 'com_content.article.5', 'Your Modules', '{"core.delete":[],"core.edit":[],"core.edit.state":[]}'),
(41, 1, 75, 76, 1, 'com_users.category.10', 'Uncategorised', ''),
(42, 1, 77, 78, 1, 'com_joomlaupdate', 'com_joomlaupdate', '{"core.admin":[],"core.manage":[],"core.delete":[],"core.edit.state":[]}'),
(43, 35, 31, 32, 3, 'com_content.article.6', 'Your Template', '{"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(44, 1, 79, 80, 1, 'com_tags', 'com_tags', '{"core.admin":{"8":1},"core.manage":{"7":1},"core.create":{"6":1,"3":1},"core.delete":{"6":1},"core.edit":{"6":1,"4":1},"core.edit.state":{"6":1,"5":1}}'),
(45, 1, 81, 82, 1, 'com_contenthistory', 'com_contenthistory', '{}'),
(46, 1, 83, 84, 1, 'com_ajax', 'com_ajax', '{}'),
(47, 1, 85, 86, 1, 'com_postinstall', 'com_postinstall', '{}'),
(50, 1, 87, 88, 1, 'com_jdeveloper', 'JDeveloper', '{"core.admin":[],"core.manage":[],"core.create":[],"core.delete":[],"core.edit":[],"core.edit.own":[],"components.create":[],"components.deletezip":[],"components.install":[],"components.uninstall":[],"extensions.zip":[],"extensions.deletezip":[],"modules.create":[],"modules.deletezip":[],"modules.install":[],"modules.uninstall":[],"overrides.create":[],"plugins.create":[],"plugins.deletezip":[],"plugins.install":[],"plugins.uninstall":[],"templates.create":[],"templates.deletezip":[],"templates.install":[],"templates.uninstall":[]}'),
(51, 1, 89, 90, 1, 'com_confmgr', 'com_confmgr', '{}');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_associations`
--

CREATE TABLE IF NOT EXISTS `ciudq_associations` (
  `id` int(11) NOT NULL COMMENT 'A reference to the associated item.',
  `context` varchar(50) NOT NULL COMMENT 'The context of the associated item.',
  `key` char(32) NOT NULL COMMENT 'The key for the association computed from an md5 on associated ids.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_banners`
--

CREATE TABLE IF NOT EXISTS `ciudq_banners` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `custombannercode` varchar(2048) NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `params` text NOT NULL,
  `own_prefix` tinyint(1) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `language` char(7) NOT NULL DEFAULT '',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `version` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_banner_clients`
--

CREATE TABLE IF NOT EXISTS `ciudq_banner_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text NOT NULL,
  `own_prefix` tinyint(4) NOT NULL DEFAULT '0',
  `metakey_prefix` varchar(255) NOT NULL DEFAULT '',
  `purchase_type` tinyint(4) NOT NULL DEFAULT '-1',
  `track_clicks` tinyint(4) NOT NULL DEFAULT '-1',
  `track_impressions` tinyint(4) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_banner_tracks`
--

CREATE TABLE IF NOT EXISTS `ciudq_banner_tracks` (
  `track_date` datetime NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_categories`
--

CREATE TABLE IF NOT EXISTS `ciudq_categories` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_categories`
--

INSERT INTO `ciudq_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`, `version`) VALUES
(1, 0, 0, 0, 13, 0, '', 'system', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(3, 28, 1, 3, 4, 1, 'uncategorised', 'com_banners', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":"","foobar":""}', '', '', '{"page_title":"","author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(4, 29, 1, 5, 6, 1, 'uncategorised', 'com_contact', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(5, 30, 1, 7, 8, 1, 'uncategorised', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(7, 32, 1, 9, 10, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"target":"","image":""}', '', '', '{"page_title":"","author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1),
(9, 35, 1, 11, 12, 1, 'blog', 'com_content', 'Blog', 'blog', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{"category_layout":"","image":""}', '', '', '{"author":"","robots":""}', 580, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_abstract`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_abstract` (
  `id` int(11) unsigned NOT NULL,
  `paper_id` int(11) NOT NULL COMMENT 'Paper ID to link the Abstract to the Paper',
  `abstract` longtext NOT NULL COMMENT 'The abstract for the paper',
  `keywords` varchar(255) NOT NULL COMMENT 'Keywords for the abstract',
  `theme` int(11) NOT NULL COMMENT 'Theme of the Abstract',
  `rev1ew_outcome` int(11) NOT NULL COMMENT 'Review outcome for this abstract',
  `rev1ew_comments` longtext NOT NULL COMMENT 'Review comments for this abstract as posted by the theme leader',
  `type_of_submission` int(11) NOT NULL COMMENT 'Type of Submission, as in the orginal(0), resubmission(1),revision(2)  ',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgr_abstract`
--

INSERT INTO `ciudq_confmgr_abstract` (`id`, `paper_id`, `abstract`, `keywords`, `theme`, `rev1ew_outcome`, `rev1ew_comments`, `type_of_submission`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created`, `created_by`, `modified`, `modified_by`, `version`, `params`) VALUES
(31, 0, 'dsad', 'dsads', 1, 0, '', 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(32, 83, 'cdsc', 'cdsc', 1, 0, '', 0, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(33, 83, 'cdsc wedwedwd', 'cdsc', 1, 0, '', 0, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(34, 83, 'cdsc wedwedwd', 'cdsc wewdewd', 1, 0, '', 0, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(35, 83, 'cdsc wedwedwd', 'cdsc wewdewd', 1, 0, '', 0, 5, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(36, 84, 'test', 'test', 1, 0, '', 0, 6, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(37, 84, 'test', 'test', 1, 0, '', 0, 7, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(38, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 8, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 580, '0000-00-00 00:00:00', 0, 1, ''),
(39, 84, 'test', 'test', 1, 0, '', 0, 9, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 580, '0000-00-00 00:00:00', 0, 1, ''),
(40, 84, 'test 34343', 'test', 1, 0, '', 0, 10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(41, 84, 'test 34343', 'test', 1, 0, '', 0, 11, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(42, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 12, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(43, 84, 'test 34343 rferf', 'Test 55 rfref', 1, 0, '', 0, 13, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(44, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 14, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(45, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 15, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(46, 102, 'Test', 'test', 1, 0, '', 0, 16, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(47, 84, 'test 34343 rferf', 'Test 55 rfref', 1, 0, '', 0, 17, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(48, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 18, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(49, 84, 'test 34343 rferf', 'Test 55 rfref', 1, 0, '', 0, 19, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(50, 102, 'Test', 'test', 1, 0, '', 0, 20, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, ''),
(51, 83, 'vdevdfv', 'scdscsd', 1, 0, '', 0, 21, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_author`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_author` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'Title of the Author',
  `first_name` varchar(255) NOT NULL COMMENT 'First name of the author ',
  `surname` varchar(255) NOT NULL COMMENT 'Surname of the author',
  `email` varchar(255) NOT NULL COMMENT 'Email of the Author',
  `affiliation` varchar(255) NOT NULL COMMENT 'Affiliation of the author (Institutte)',
  `country` varchar(255) NOT NULL COMMENT 'Country of the author',
  `attending` tinyint(1) NOT NULL COMMENT 'Is this author attending the conference? No:0 Yes:1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgr_author`
--

INSERT INTO `ciudq_confmgr_author` (`id`, `title`, `first_name`, `surname`, `email`, `affiliation`, `country`, `attending`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created`, `created_by`, `modified`, `version`, `params`) VALUES
(2, 'Dr', 'Kaushal', 'Keraminiyage', 'keraminiyage@yahoo.co.uk', 'UoH', 'UK', 0, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 5, ''),
(3, 'Prof', 'Dilanthi', 'Amaratunga', 'd@r.com', 'UoH', 'UK', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(4, 'Dr', 'Kaushal', 'Keraminiyage', 'kk@ewdwe.com', 'UoH', 'UK', 1, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(5, 'Test paper 2', 'Kaushal Kera', 'Ke', 'keraminiyage@yahoo.co.uk', 'UoH', 'UK', 0, 3, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 2, ''),
(6, 'cdsc', 'cdsc', 'vfdv', 'vfdvfd@fredvre.com', 'vfdvfd', 'vdfvdv', 1, 4, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(7, 'test', 'testest', 'testest', 'tetes@ryrewyfeywf.com', 'frefre', 'fefewqfewfwe', 1, 5, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(8, 'Dr', 'Kaushal', 'Keraminiyage', 'keraminiyage@yahoo.co.uk', 'UoH', 'UK', 1, 6, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(9, 'Dr', 'dscd', 'dwqdw', 'dfwfew@eferfe.com', 'fefwq', 'fewfqef', 0, 7, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(15, '', '', '', '', '', '', 0, 8, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, ''),
(16, 'bgbgf', 'bggfb', 'fdv', 'fvdvf@verevre.com', 'vfdvfdv', 'bgfbgf', 0, 9, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_author_for_paper`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_author_for_paper` (
  `id` int(11) unsigned NOT NULL,
  `paper_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgr_author_for_paper`
--

INSERT INTO `ciudq_confmgr_author_for_paper` (`id`, `paper_id`, `author_id`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created`, `modified`, `version`, `params`) VALUES
(1, 0, 7, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(2, 113, 8, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(3, 0, 9, 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(4, 128, 10, 4, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(5, 129, 11, 5, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(6, 130, 12, 6, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(7, 131, 13, 7, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(8, 132, 14, 8, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(9, 133, 15, 9, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(10, 135, 16, 10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_camera_ready_paper`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_camera_ready_paper` (
  `id` int(11) unsigned NOT NULL,
  `paper_id` int(11) NOT NULL COMMENT 'Paper ID to link the camera ready paper',
  `camera_ready_paper` varchar(255) NOT NULL COMMENT 'Upload camera ready paper',
  `type_of_submission` int(11) NOT NULL COMMENT 'Original (0), Resubmission (1), Revision (2)',
  `approved` tinyint(1) NOT NULL COMMENT 'Is the camera ready paper approved by the theme leader? Yes: 1, No:0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_full_paper`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_full_paper` (
  `id` int(11) unsigned NOT NULL,
  `paper_id` int(11) NOT NULL COMMENT 'This is the Paper ID linking the full paper to the paper table',
  `full_paper` text NOT NULL COMMENT 'Full paper upload',
  `rev1ew_outcome` int(11) NOT NULL COMMENT 'Full paper review outcome',
  `rev1ew_comments` longtext NOT NULL COMMENT 'Full paper review comments',
  `type_of_submission` int(11) NOT NULL COMMENT 'Original (0), Resubmission (1), Revision (2)',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_paper`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_paper` (
  `id` int(11) unsigned NOT NULL,
  `abstract_id` int(11) NOT NULL COMMENT 'Absrtact ID to link the paper to the absrtact',
  `full_paper_id` int(11) NOT NULL COMMENT 'Full paper ID to link with the full paper',
  `camera_ready_paper_id` int(11) NOT NULL COMMENT 'Camera ready paper ID to link the paper with the Camera ready paper',
  `presentation_id` int(11) NOT NULL COMMENT 'Linking Presentation to the Paper',
  `title` varchar(255) NOT NULL COMMENT 'Title of the paper',
  `student_paper` tinyint(1) NOT NULL COMMENT 'Is this a student paper (yes:1, No:0)',
  `created_by` int(11) NOT NULL COMMENT 'User who has created the paper',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgr_paper`
--

INSERT INTO `ciudq_confmgr_paper` (`id`, `abstract_id`, `full_paper_id`, `camera_ready_paper_id`, `presentation_id`, `title`, `student_paper`, `created_by`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created`, `modified`, `version`, `params`) VALUES
(78, 31, 0, 0, 0, 'dsswds', 1, 0, 2, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(83, 51, 0, 0, 0, 'TEST', 1, 580, 3, 1, 580, '2015-12-27 13:41:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(84, 49, 0, 0, 0, 'Tesx 886 rerfe', 0, 580, 4, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(102, 50, 0, 0, 0, 'Test', 1, 580, 7, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(108, 0, 0, 0, 0, '', 0, 581, 8, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, ''),
(110, 0, 0, 0, 0, '', 0, 580, 9, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_payment`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_payment` (
  `id` int(11) unsigned NOT NULL,
  `author_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_presentation`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_presentation` (
  `id` int(11) unsigned NOT NULL,
  `paper_id` int(11) NOT NULL COMMENT 'Paper ID to link with',
  `presentation` varchar(255) NOT NULL COMMENT 'Presentation file',
  `type_of_submission` int(11) NOT NULL COMMENT 'original (0), Resubmit (1), Revision (2)',
  `approved` tinyint(1) NOT NULL COMMENT 'Is the presentation approved by the theme leader?',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_rev1ew`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_rev1ew` (
  `id` int(11) unsigned NOT NULL,
  `outcome` int(11) NOT NULL COMMENT 'Suggested outcome\r\n(0) - Not complete\r\n(1) - Accept as it is\r\n(2) - Minor changes required\r\n(3) - Resubmission required\r\n(4) - Reject',
  `comments_to_author` longtext NOT NULL COMMENT 'Visible comments to the author',
  `comments_to_leader` longtext NOT NULL COMMENT 'Confidential comments to the theme leader',
  `mode` int(3) NOT NULL COMMENT 'Mode of the review (0) - Abstract (1) - Full',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `hits` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_rev1ewer`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_rev1ewer` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL COMMENT 'Title of the Reviewer',
  `first_name` varchar(255) NOT NULL COMMENT 'First name of the reviewer',
  `surname` varchar(255) NOT NULL COMMENT 'Surname of the reviewer',
  `email` varchar(255) NOT NULL COMMENT 'Email of the reviewer',
  `affiliation` varchar(255) NOT NULL COMMENT 'Affiliation of the reviewer (Institute)',
  `country` varchar(255) NOT NULL COMMENT 'Country of the Reviewer',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `agreed` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_rev1ewer_for_paper`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_rev1ewer_for_paper` (
  `id` int(11) unsigned NOT NULL,
  `rev1ewer_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_theme`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_theme` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Theme leaders user ID',
  `title` varchar(255) NOT NULL COMMENT 'Title of the theme',
  `description` longtext NOT NULL COMMENT 'Description of the theme',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgr_theme`
--

INSERT INTO `ciudq_confmgr_theme` (`id`, `user_id`, `title`, `description`, `ordering`, `published`, `checked_out`, `checked_out_time`, `created`, `created_by`, `modified`, `modified_by`, `version`, `params`) VALUES
(1, 580, 'Test Theme', 'This is a test theme', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgr_theme_leader`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgr_theme_leader` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `theme_id` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_abstracts`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_abstracts` (
  `id` int(11) unsigned NOT NULL,
  `linkid` int(11) NOT NULL,
  `abstract` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `abstract_review_outcome` int(11) NOT NULL DEFAULT '0',
  `abstract_review_comments` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `theme` int(11) NOT NULL DEFAULT '0',
  `resubmitted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=403 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_abstracts`
--

INSERT INTO `ciudq_confmgt_abstracts` (`id`, `linkid`, `abstract`, `ordering`, `state`, `checked_out`, `checked_out_time`, `created_by`, `abstract_review_outcome`, `abstract_review_comments`, `last_updated`, `theme`, `resubmitted`) VALUES
(395, 626, 'Test', 6, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-24 10:31:57', 2, 0),
(396, 627, 'gregte', 7, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-26 16:04:12', 3, 0),
(397, 637, 'testest3', 8, 0, 0, '0000-00-00 00:00:00', 0, 3, 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2015-12-27 15:03:55', 2, 0),
(398, 637, 'Teshit 2', 9, 0, 0, '0000-00-00 00:00:00', 580, 3, 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2015-12-28 18:00:48', 0, 1),
(399, 637, 'test3', 10, 0, 0, '0000-00-00 00:00:00', 580, 1, 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2015-12-28 18:02:22', 0, 1),
(400, 646, 'etst1', 11, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-28 20:24:03', 2, 0),
(401, 654, 'Test', 12, 0, 0, '0000-00-00 00:00:00', 580, 0, '', '2016-03-22 12:10:20', 2, 0),
(402, 656, 'Test', 13, 0, 0, '0000-00-00 00:00:00', 580, 1, 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the abstract titled ''Test 123'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2016-08-14 13:58:13', 2, 0),
(394, 625, 'Test', 5, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-24 10:25:05', 2, 0),
(393, 624, 'Test', 4, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-24 10:11:29', 2, 0),
(392, 623, 'Test', 3, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-24 10:10:02', 2, 0),
(391, 622, 'Test', 2, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-24 09:52:19', 2, 0),
(390, 621, 'Test', 1, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-23 22:28:55', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_authors`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_authors` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `attending` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=590 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_authors`
--

INSERT INTO `ciudq_confmgt_authors` (`id`, `linkid`, `title`, `firstname`, `surname`, `institution`, `country`, `attending`, `created_by`, `ordering`, `email`, `last_updated`) VALUES
(589, 656, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 1, 'keraminiyage@yahoo.co.uk', '2016-08-14 13:57:55'),
(588, 654, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 1, 'keraminiyage@yahoo.co.uk', '2016-03-22 12:10:04'),
(586, 646, 'Prof', 'tetreEQ', 'FETFTr', 'reywrye', 'w', 1, 580, 2, 'Test@fefe', '2015-12-28 20:24:26'),
(587, 653, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 1, 'keraminiyage@yahoo.co.uk', '2016-03-22 09:53:00'),
(584, 642, 'Prof', 'vfdvqfvw', 'vg', 'grwg', 'efgeq', 1, 580, 1, 'geg@frwfrwf.com', '2015-12-27 19:59:09'),
(585, 646, 'Prof', 'Test', 'Test', 'Etst', 'Test', 1, 580, 1, 'Test@fefe', '2015-12-28 20:23:32'),
(583, 640, 'Prof', 'Test', 'testestsETSE', 'ES6S6', 'EA66SFSF', 1, 580, 2, 'ES6ES6@frefer.com', '2015-12-27 18:34:03'),
(582, 640, 'Prof', 'TEst', 'Test', 'etst', 'estets', 1, 580, 1, 'DATEa@frefer.com', '2015-12-27 18:33:44'),
(580, 636, 'Prof', 'test', 'Etst', 'tet', 'eastea', 1, 580, 1, 'estest@frefer.com', '2015-12-27 14:30:57'),
(581, 637, 'Prof', 'Kaushal', 'Keraminiyage', 'cls', 'ewlfdw', 1, 580, 1, 'ker@frere.com', '2015-12-27 15:03:38'),
(579, 635, 'Prof', 'K', 'k', 'uk', 'Uk', 1, 580, 2, 'K@frefre.com', '2015-12-27 14:07:13'),
(577, 630, 'Prof', 'vfdvfd', 'dscds', 'cdscds', 'vvsvd', 1, 580, 1, 'cdscdscds@freferf.com', '2015-12-26 22:36:25'),
(578, 635, 'Prof', 'Kau', 'Keraminiyage', 'Io', 'UK', 1, 580, 1, 'keraminiyage@yahoo.co.uk', '2015-12-27 14:06:19'),
(576, 627, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 2, 'r.amaratuna@gmail.com', '2015-12-26 16:03:57'),
(574, 626, 'Prof', 'Test', 'TEst', 'TEst', 'TEsw', 1, 580, 11, 'TEst@ffrefe.com', '2015-12-24 10:32:39'),
(575, 627, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 1, 'keraminiyage@yahoo.co.uk', '2015-12-26 16:03:32'),
(572, 625, 'Prof', 'T', 'T', 'test', 'este', 1, 580, 7, 'Tewe@te', '2015-12-24 10:24:54'),
(573, 626, 'Prof', 'dsqw', 'cds', 'UoH', 'United Kingdom', 1, 580, 6, 'keraminiyage@yahoo.co.uk', '2015-12-24 10:31:46'),
(571, 624, 'Prof', 'K', 'K', 'K', 'K', 1, 580, 5, 'keraminiyage@yahoo.co.uk', '2015-12-24 10:11:17'),
(570, 623, 'Prof', 'K', 'K', 'UoH', 'UK', 1, 580, 9, 'kkeraminiyage@yahoo.co.uk', '2015-12-24 10:09:49'),
(569, 623, 'Prof', 'D', 'D', 'D', 'D', 1, 580, 4, 'd@r.com', '2015-12-24 10:09:35'),
(568, 622, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 10, 'd@r.com', '2015-12-24 09:52:03'),
(566, 621, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 1, 'd@r.com', '2015-12-23 22:28:43'),
(567, 622, 'Prof', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 2, 'keraminiyage@yahoo.co.uk', '2015-12-24 09:51:33'),
(565, 621, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 2, 'keraminiyage@yahoo.co.uk', '2015-12-23 22:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_camerareadypapers`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_camerareadypapers` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `camera_ready` varchar(255) NOT NULL,
  `cover_page` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_coordinators`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_coordinators` (
  `id` int(11) NOT NULL,
  `themeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_emails`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_emails` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `emailcode` varchar(25) NOT NULL,
  `placeholders` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciudq_confmgt_emails`
--

INSERT INTO `ciudq_confmgt_emails` (`id`, `subject`, `message`, `emailcode`, `placeholders`) VALUES
(1, 'Welcome to {SITE}', 'Dear {NAME},\r\n\r\nAn account has been created for you to access the {SITE}. Your login credentials are as follows: You may now login to the system by visiting {SITEURL}.\r\n\r\nUsername: {USERNAME}\r\nPassword: {PASSWORD}\r\n\r\nThank you.\r\n\r\n{SITE}', 'regemail', '{SITE}\r\n{NAME}\r\n(USERNAME}\r\n{PASSWORD}\r\n{SITEURL}'),
(2, 'Invitation to become a scientific committee member and a reviewer for {SITE}', 'Dear {NAME},\r\n\r\nOn behalf of the {SITE} organising committee I would like to invite you to become a scientific committee member and an academic reviewer for the above conference and your contribution will be highly appreciated. If you are happy we will request you to review a small number of papers published for this conference. Please indicate whether you would like to accept this by visiting the appropriate link below:\r\n\r\nI am happy to be a reviewer and a scientific committee member: {AGREE_LINK}\r\n\r\nI will not be able accept this at this time: {DENY_LINK}\r\n\r\nThank you and kind regards\r\n\r\n{THEME_LEADER}\r\nOn behalf of {SITE} ', 'rev_agree', '{SITE} \r\n{NAME}\r\n{AGREE_LINK}\r\n{DENY_LINK}\r\n{THEME_LEADER}'),
(3, 'Abstract received: {SITE} ', 'Dear {NAME},\r\n\r\nThank you very much for submitting the abstract titled ''{TITLE}'' for the {SITE}. Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at {SITE_URL}. The details of your submission is noted below:\r\n\r\nTitle: \r\n{TITLE}\r\n\r\nAuthors: \r\n{AUTHORS}\r\n\r\nAbstract: \r\n{ABSTRACT}\r\n\r\nKeywords: \r\n{KEYWORDS}\r\n\r\nThank you.\r\nKind regards\r\n\r\n{SITE}\r\nOn behalf of the organising committee ', 'auth_abs', '{NAME}\r\n{TITLE}\r\n{SITE}\r\n{SITE_URL}\r\n{AUTHORS}\r\n{ABSTRACT}\r\n{KEYWORDS}'),
(4, 'Abstract received: {SITE} ', 'Dear {NAME},\r\n\r\nRecently {AUTHOR} has submitted an abstract titled ''{TITLE}'' for {SITE} under the theme ''{THEME}'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at {SITE_URL}. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\n{TITLE}\r\n\r\nAuthors: \r\n{AUTHORS}\r\n\r\nAbstract: \r\n{ABSTRACT}\r\n\r\nKeywords: \r\n{KEYWORDS}\r\n\r\nThank you.\r\nKind regards\r\n\r\n{SITE}\r\nOn behalf of the organising committee ', 'leader_abs', '{NAME}\r\n{AUTHOR}\r\n{THEME}\r\n{TITLE}\r\n{SITE}\r\n{SITE_URL}\r\n{AUTHORS}\r\n{ABSTRACT}\r\n{KEYWORDS}'),
(5, 'Abstract review results: {SITE}', 'Dear {NAME},\r\n\r\nPaper Id: {PAPERID}\r\n\r\nThank you for submitting the abstract titled ''{TITLE}'' for {SITE}, which we have reviewed under the theme ''{THEME}''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at {SITE_URL}. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n{COMMENTS}\r\n\r\nThank you.\r\nKind regards\r\n\r\n{SITE}\r\nOn behalf of the organising committee ', 'abs_outcome', ''),
(6, 'Full paper review results: {SITE}', 'Dear {NAME},\r\n\r\nPaper Id: {PAPERID}\r\n\r\nThank you for submitting the full paper titled ''{TITLE}'' for the {SITE}. We have now reviewed this paper. Please see the review results for this full paper below, which is also available to access by login in to the conference management system at {SITE_URL}. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n{COMMENTS}\r\n\r\nThank you.\r\nKind regards\r\n\r\n{SITE}\r\nOn behalf of the organising committee ', 'full_outcome', ''),
(7, 'Reviewer for the {SITE_NAME}', 'Dear {NAME},\r\n\r\nAs you may have already been notified, {THEME_LEADER}, one of the theme leaders for the {SITE_NAME}, has enrolled you as a reviewer for the conference. Please log on to the conference management system using your exciting login details or the login details that you must have received recently. If you have not received the login details, please be in touch with {THEME_LEADER}. Once logged in you will see a button allowing you to proceed as a reviewer. If no papers have been allocated to you yet, you will receive further emails once the papers are assigned to you for reviewing.\r\n\r\nThank you.\r\n\r\n{THEME_LEADER}\r\non behalf of {SITE_NAME}', 'rev_welcome', ''),
(8, 'Papers allocated for review for {NAME} - {SITE}', 'Dear {NAME},\r\n\r\nMany thanks for agreeing to review papers for the {SITE} conference. Please login to the Conference Management System to review papers.\r\n\r\nLogin URL: {LOGINURL}\r\nYour username is: {USERNAME}\r\nIf you have forgotten your password, please use the link below to reset the password.\r\n\r\nPassword reset: {SITE_URL}{FORGOTPW}\r\n\r\nNumber of papers allocated for review: {PAPERS}\r\n\r\nThank you.\r\n\r\n{SITE}', 'rev_notification', '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_email_log`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_email_log` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `recipient` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `cc` text NOT NULL,
  `bcc` text NOT NULL,
  `attachment` text NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=662 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_email_log`
--

INSERT INTO `ciudq_confmgt_email_log` (`id`, `sender`, `recipient`, `subject`, `body`, `cc`, `bcc`, `attachment`, `time_created`, `created_by`, `message`) VALUES
(657, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''TEst'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTEst\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTEst\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-03-22 12:10:20', 580, 'OK'),
(658, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''TEst'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTEst\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTEst\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-03-22 12:10:20', 580, 'OK'),
(659, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-14 13:58:13', 580, 'OK'),
(660, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-14 13:58:13', 580, 'OK'),
(661, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract review results: ', 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the abstract titled ''Test 123'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-14 14:06:57', 580, 'OK'),
(656, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Test Test; \r\n\r\nAbstract: \r\netst1\r\n\r\nKeywords: \r\ntss3ts3t\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 20:24:04', 580, 'OK'),
(654, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract review results: ', 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 18:05:04', 580, 'OK'),
(655, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Test Test; \r\n\r\nAbstract: \r\netst1\r\n\r\nKeywords: \r\ntss3ts3t\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 20:24:04', 580, 'OK'),
(653, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract review results: ', 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 18:02:01', 580, 'OK'),
(649, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Kaushal Keraminiyage; \r\n\r\nAbstract: \r\ntestest3\r\n\r\nKeywords: \r\nett3\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-27 15:03:55', 580, 'OK'),
(650, 'a:2:{i:0;N;i:1;N;}', 's:25:"kkeraminiyage@yahoo.co.uk";', 'Invitation to become a scientific committee member and a reviewer for ', 'Dear Prof K Keraminiyage,\r\n\r\nOn behalf of the  organising committee I would like to invite you to become a scientific committee member and an academic reviewer for the above conference and your contribution will be highly appreciated. If you are happy we will request you to review a small number of papers published for this conference. Please indicate whether you would like to accept this by visiting the appropriate link below:\r\n\r\nI am happy to be a reviewer and a scientific committee member: http://localhost/j34/index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.agree&rnd=1\r\n\r\nI will not be able accept this at this time: http://localhost/j34/index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.reject&rnd=1\r\n\r\nThank you and kind regards\r\n\r\nSuper User\r\nOn behalf of  ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 17:56:31', 580, 'OK'),
(651, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Invitation to become a scientific committee member and a reviewer for ', 'Dear Dr Kaushal Keraminiyage,\r\n\r\nOn behalf of the  organising committee I would like to invite you to become a scientific committee member and an academic reviewer for the above conference and your contribution will be highly appreciated. If you are happy we will request you to review a small number of papers published for this conference. Please indicate whether you would like to accept this by visiting the appropriate link below:\r\n\r\nI am happy to be a reviewer and a scientific committee member: http://localhost/j34/index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.agree&rnd=1\r\n\r\nI will not be able accept this at this time: http://localhost/j34/index.php?option=com_confmgt&view=rev1ewerform&task=rev1ewerform.reject&rnd=1\r\n\r\nThank you and kind regards\r\n\r\nSuper User\r\nOn behalf of  ', 's:24:"k.keraminiyage@hud.ac.uk";', 'i:0;', 'i:0;', '2015-12-28 17:57:50', 580, 'OK'),
(652, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract review results: ', 'Dear Super User,\r\n\r\nPaper Id: 637\r\n\r\nThank you for submitting the abstract titled ''Test'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nThis is test\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-28 18:00:05', 580, 'OK'),
(646, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Tes'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTes\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\ngregte\r\n\r\nKeywords: \r\ngregegw\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-26 16:04:12', 580, 'OK'),
(647, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Tes'' for  under the theme ''Built Environment'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTes\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\ngregte\r\n\r\nKeywords: \r\ngregegw\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-26 16:04:12', 580, 'OK'),
(648, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Kaushal Keraminiyage; \r\n\r\nAbstract: \r\ntestest3\r\n\r\nKeywords: \r\nett3\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-27 15:03:55', 580, 'OK'),
(642, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''TEst'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTEst\r\n\r\nAuthors: \r\nProf T T; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTEst\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:25:05', 580, 'OK'),
(643, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''TEst'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTEst\r\n\r\nAuthors: \r\nProf T T; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTEst\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:25:05', 580, 'OK'),
(644, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf dsqw cds; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:31:57', 580, 'OK'),
(645, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf dsqw cds; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:31:57', 580, 'OK'),
(641, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\ntest\r\n\r\nAuthors: \r\nProf K K; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:11:29', 580, 'failed'),
(640, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\ntest\r\n\r\nAuthors: \r\nProf K K; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:11:29', 580, 'failed'),
(638, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf D D; Prof K K; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:10:04', 580, 'failed'),
(639, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf D D; Prof K K; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 10:10:04', 580, 'failed'),
(636, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 09:52:21', 580, 'failed'),
(637, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-24 09:52:22', 580, 'failed'),
(634, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-23 22:28:56', 580, 'failed'),
(635, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-23 22:28:57', 580, 'failed');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_fullpapers`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_fullpapers` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `full_paper` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `full_review_outcome` int(11) NOT NULL DEFAULT '0',
  `full_review_comments` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resubmit` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_papers`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_papers` (
  `id` int(11) unsigned NOT NULL,
  `linkid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `abstractid` int(11) NOT NULL DEFAULT '0',
  `keywords` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `full_paper` varchar(255) NOT NULL,
  `fullpaperid` int(11) NOT NULL DEFAULT '0',
  `camera_ready` varchar(255) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `full_review_outcome` int(11) NOT NULL DEFAULT '0',
  `abstract_review_outcome` int(11) NOT NULL DEFAULT '0',
  `full_review_comments` text NOT NULL,
  `abstract_review_comments` text NOT NULL,
  `theme` int(11) NOT NULL DEFAULT '0',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '0',
  `student_submission` int(11) NOT NULL DEFAULT '0',
  `camerareadyid` int(15) NOT NULL DEFAULT '0',
  `presentationid` int(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=657 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_papers`
--

INSERT INTO `ciudq_confmgt_papers` (`id`, `linkid`, `title`, `abstract`, `abstractid`, `keywords`, `ordering`, `state`, `checked_out`, `checked_out_time`, `created_by`, `full_paper`, `fullpaperid`, `camera_ready`, `presentation`, `full_review_outcome`, `abstract_review_outcome`, `full_review_comments`, `abstract_review_comments`, `theme`, `last_updated`, `active`, `student_submission`, `camerareadyid`, `presentationid`) VALUES
(625, 625, 'TEst', 'Test', 394, 'TEst', 5, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:24:42', 1, 0, 0, 0),
(656, 656, 'Test 123', 'Test', 402, 'Test', 6, 1, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 1, '', 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the abstract titled ''Test 123'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 2, '2016-08-14 13:57:41', 1, 0, 0, 0),
(624, 624, 'test', 'Test', 393, 'Test', 4, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:10:59', 1, 0, 0, 0),
(623, 623, 'Test', 'Test', 392, 'Test', 3, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:09:24', 1, 1, 0, 0),
(622, 622, 'Test', 'Test', 391, 'Test', 2, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 09:50:22', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_presentations`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_presentations` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `cover_page` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_rev1ewers`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_rev1ewers` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `agreed` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=350 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_rev1ewers`
--

INSERT INTO `ciudq_confmgt_rev1ewers` (`id`, `linkid`, `title`, `firstname`, `surname`, `institution`, `country`, `agreed`, `created_by`, `ordering`, `email`, `last_updated`, `userid`, `token`) VALUES
(349, 0, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 4, 'keraminiyage@yahoo.co.uk', '2015-12-28 17:57:50', 580, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_rev1ewers_papers`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_rev1ewers_papers` (
  `id` int(11) NOT NULL,
  `paperid` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciudq_confmgt_rev1ewers_papers`
--

INSERT INTO `ciudq_confmgt_rev1ewers_papers` (`id`, `paperid`, `reviewerid`, `last_updated`) VALUES
(203, 656, 349, '2016-08-14 13:59:06'),
(202, 621, 349, '2016-01-05 18:11:40'),
(201, 637, 349, '2015-12-28 17:58:01'),
(200, 621, 348, '2015-12-28 17:56:49'),
(51, 397, 302, '2015-01-14 03:54:59'),
(52, 307, 255, '2015-02-03 19:47:19'),
(53, 277, 255, '2015-02-03 19:52:36'),
(54, 300, 255, '2015-02-03 19:56:30'),
(55, 309, 255, '2015-02-03 20:06:05'),
(56, 323, 255, '2015-02-03 20:57:35'),
(57, 328, 255, '2015-02-03 21:45:04'),
(58, 334, 255, '2015-02-03 21:51:32'),
(59, 343, 255, '2015-02-04 20:56:22'),
(60, 347, 255, '2015-02-04 20:56:49'),
(61, 348, 255, '2015-02-04 20:57:03'),
(62, 354, 255, '2015-02-04 20:57:23'),
(63, 364, 255, '2015-02-04 20:57:36'),
(64, 375, 255, '2015-02-04 20:58:25'),
(65, 382, 255, '2015-02-04 20:58:40'),
(66, 397, 255, '2015-02-04 20:59:00'),
(67, 413, 255, '2015-02-04 20:59:12'),
(68, 464, 255, '2015-02-04 20:59:49'),
(69, 469, 255, '2015-02-04 21:00:07'),
(70, 470, 255, '2015-02-04 21:00:20'),
(71, 473, 255, '2015-02-04 21:00:33'),
(72, 478, 255, '2015-02-15 18:54:59'),
(73, 479, 255, '2015-02-15 20:03:58'),
(74, 480, 255, '2015-02-15 20:04:10'),
(75, 483, 255, '2015-02-15 20:04:21'),
(76, 306, 255, '2015-02-17 23:44:11'),
(77, 342, 255, '2015-02-17 23:44:24'),
(78, 359, 255, '2015-02-17 23:44:38'),
(79, 360, 255, '2015-02-17 23:45:11'),
(80, 361, 255, '2015-02-17 23:45:24'),
(81, 370, 274, '2015-02-17 23:45:40'),
(82, 380, 255, '2015-02-17 23:45:52'),
(83, 387, 255, '2015-02-17 23:46:07'),
(84, 398, 255, '2015-02-17 23:46:34'),
(85, 446, 255, '2015-02-17 23:46:45'),
(86, 447, 255, '2015-02-17 23:46:59'),
(87, 481, 255, '2015-02-18 18:45:18'),
(88, 490, 255, '2015-02-18 18:45:31'),
(89, 494, 255, '2015-02-18 18:45:51'),
(90, 496, 255, '2015-02-18 18:46:17'),
(91, 506, 255, '2015-03-16 19:56:22'),
(92, 498, 255, '2015-03-16 19:56:40'),
(93, 508, 255, '2015-03-16 19:56:52'),
(94, 517, 255, '2015-03-16 19:57:03'),
(95, 520, 255, '2015-03-23 20:57:52'),
(96, 527, 255, '2015-03-31 17:36:50'),
(97, 314, 287, '2015-04-09 01:55:34'),
(98, 314, 256, '2015-04-09 01:56:20'),
(100, 548, 255, '2015-04-19 21:04:50'),
(101, 361, 274, '2015-04-19 21:09:39'),
(102, 527, 312, '2015-04-19 22:44:55'),
(103, 490, 274, '2015-04-19 23:48:12'),
(104, 473, 312, '2015-04-19 23:49:04'),
(105, 336, 273, '2015-05-02 06:41:39'),
(106, 339, 326, '2015-05-02 07:00:15'),
(107, 352, 327, '2015-05-02 07:02:42'),
(108, 357, 321, '2015-05-02 07:03:18'),
(121, 467, 325, '2015-05-05 06:03:42'),
(110, 475, 323, '2015-05-02 07:07:48'),
(111, 484, 324, '2015-05-02 07:08:44'),
(112, 500, 308, '2015-05-02 07:09:31'),
(142, 368, 330, '2015-05-20 04:41:05'),
(114, 367, 256, '2015-05-04 18:39:29'),
(116, 368, 256, '2015-05-04 19:01:31'),
(117, 553, 308, '2015-05-04 19:13:51'),
(118, 553, 256, '2015-05-04 19:13:55'),
(119, 534, 256, '2015-05-04 19:24:48'),
(120, 534, 308, '2015-05-04 19:25:56'),
(122, 426, 317, '2015-05-05 09:37:12'),
(123, 450, 329, '2015-05-05 10:34:08'),
(124, 450, 317, '2015-05-05 10:34:22'),
(126, 564, 255, '2015-05-07 00:07:01'),
(127, 563, 255, '2015-05-07 00:07:15'),
(128, 565, 215, '2015-05-07 05:25:17'),
(129, 367, 315, '2015-05-14 04:47:35'),
(131, 333, 256, '2015-05-14 07:18:06'),
(167, 356, 318, '2015-06-02 23:39:04'),
(133, 404, 318, '2015-05-15 00:43:28'),
(134, 419, 318, '2015-05-15 00:44:10'),
(169, 423, 274, '2015-06-02 23:43:42'),
(171, 441, 274, '2015-06-02 23:44:17'),
(180, 546, 345, '2015-06-02 23:47:04'),
(138, 440, 329, '2015-05-15 10:18:01'),
(139, 440, 334, '2015-05-15 10:18:11'),
(152, 507, 336, '2015-05-26 05:26:11'),
(141, 519, 317, '2015-05-15 10:20:12'),
(143, 474, 317, '2015-05-23 12:52:10'),
(144, 598, 255, '2015-05-24 21:03:43'),
(145, 599, 255, '2015-05-24 21:03:54'),
(151, 507, 317, '2015-05-26 05:20:00'),
(147, 519, 331, '2015-05-25 02:52:57'),
(148, 426, 335, '2015-05-25 03:44:26'),
(153, 601, 255, '2015-05-26 19:22:59'),
(154, 336, 337, '2015-05-27 07:01:33'),
(155, 366, 315, '2015-05-27 08:23:42'),
(156, 366, 256, '2015-05-27 08:23:51'),
(157, 475, 338, '2015-05-27 08:52:35'),
(158, 467, 338, '2015-05-27 08:53:24'),
(159, 339, 253, '2015-05-27 10:19:11'),
(160, 352, 317, '2015-05-27 11:02:11'),
(161, 484, 344, '2015-05-27 11:05:28'),
(162, 357, 253, '2015-05-27 12:59:22'),
(163, 500, 253, '2015-05-27 12:59:50'),
(164, 604, 255, '2015-05-31 22:22:57'),
(165, 356, 274, '2015-06-02 23:36:49'),
(166, 404, 274, '2015-06-02 23:37:21'),
(168, 419, 345, '2015-06-02 23:42:56'),
(170, 423, 345, '2015-06-02 23:43:50'),
(172, 441, 318, '2015-06-02 23:44:27'),
(173, 504, 274, '2015-06-02 23:44:47'),
(174, 504, 318, '2015-06-02 23:45:18'),
(175, 476, 345, '2015-06-02 23:45:45'),
(176, 476, 318, '2015-06-02 23:45:56'),
(177, 518, 274, '2015-06-02 23:46:21'),
(178, 518, 318, '2015-06-02 23:46:29'),
(179, 546, 274, '2015-06-02 23:46:50'),
(181, 336, 255, '2015-06-03 15:58:49'),
(182, 547, 255, '2015-06-03 16:02:00'),
(183, 547, 256, '2015-06-03 16:02:13'),
(184, 474, 255, '2015-06-03 16:03:20'),
(185, 484, 256, '2015-06-03 16:04:14'),
(196, 605, 255, '2015-06-11 18:54:56'),
(195, 605, 256, '2015-06-11 18:54:42'),
(188, 511, 255, '2015-06-04 06:20:50'),
(189, 511, 256, '2015-06-04 06:20:56'),
(190, 516, 255, '2015-06-04 06:23:09'),
(191, 516, 256, '2015-06-04 06:23:20'),
(192, 374, 256, '2015-06-04 06:24:12'),
(193, 374, 255, '2015-06-04 06:24:18'),
(194, 516, 317, '2015-06-04 06:42:31'),
(197, 376, 255, '2015-06-26 03:55:42'),
(198, 377, 255, '2015-06-26 03:55:56'),
(199, 378, 255, '2015-06-26 03:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_reviews`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_reviews` (
  `id` int(11) NOT NULL,
  `recommendation` int(11) NOT NULL DEFAULT '0',
  `author_comments` text NOT NULL,
  `leader_comments` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mode` varchar(50) NOT NULL DEFAULT '0',
  `linkid` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `rand` varchar(50) NOT NULL DEFAULT '0',
  `abstractid` int(11) NOT NULL DEFAULT '0',
  `fullpaperid` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_reviews`
--

INSERT INTO `ciudq_confmgt_reviews` (`id`, `recommendation`, `author_comments`, `leader_comments`, `score`, `last_updated`, `mode`, `linkid`, `created_by`, `rand`, `abstractid`, `fullpaperid`) VALUES
(88, 3, 'This is test', 'This is test', 4, '2015-12-28 17:58:35', 'abstract', 637, 580, '0', 397, 0),
(89, 3, 'Test', 'test', 1, '2016-01-05 18:12:14', 'abstract', 621, 580, '0', 390, 0),
(90, 1, 'Test', 'Test', 1, '2016-08-14 14:06:33', 'abstract', 656, 580, '0', 402, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_themes`
--

CREATE TABLE IF NOT EXISTS `ciudq_confmgt_themes` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_themes`
--

INSERT INTO `ciudq_confmgt_themes` (`id`, `linkid`, `userid`, `title`, `description`, `last_updated`) VALUES
(2, 0, 580, 'Resilience', 'Conceptual understanding of resilience\r\nOverall systems resilience\r\nMeasurement of resilience', '2014-10-03 17:25:09'),
(3, 0, 580, 'Built Environment', 'Structural mitigation\r\nInfrastructure\r\nSustainable development\r\nShelter and housing', '2014-10-03 17:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_contact_details`
--

CREATE TABLE IF NOT EXISTS `ciudq_contact_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  `sortname1` varchar(255) NOT NULL,
  `sortname2` varchar(255) NOT NULL,
  `sortname3` varchar(255) NOT NULL,
  `language` char(7) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_content`
--

CREATE TABLE IF NOT EXISTS `ciudq_content` (
  `id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_content`
--

INSERT INTO `ciudq_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`) VALUES
(1, 36, 'About', 'about', '<p>This tells you a bit about this blog and the person who writes it. </p><p>When you are logged in you will be able to edit this page by clicking on the edit icon.</p>', '', 1, 2, '2011-01-01 00:00:01', 580, 'Joomla', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2012-01-04 16:10:42', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":"","urlatext":"","targeta":"","urlb":"","urlbtext":"","targetb":"","urlc":"","urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","alternative_readmore":"","article_layout":"","show_publishing_options":"","show_article_options":"","show_urls_images_backend":"","show_urls_images_frontend":""}', 1, 2, '', '', 1, 21, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(2, 37, 'Working on Your Site', 'working-on-your-site', '<p>Here are some basic tips for working on your site.</p><ul><li>Joomla! has a "front end" that you are looking at now and an "administrator" or "back end" which is where you do the more advanced work of creating your site such as setting up the menus and deciding what modules to show. You need to login to the administrator separately using the same user name and password that you used to login to this part of the site.</li><li>One of the first things you will probably want to do is change the site title and tag line and to add a logo. To do this click on the Template Settings link in the top menu. To change your site description, browser title, default email and other items, click Site Settings. More advanced configuration options are available in the administrator.</li><li>To totally change the look of your site you will probably want to install a new template. In the Extensions menu click on Extensions Manager and then go to the Install tab. There are many free and commercial templates available for Joomla.</li><li>As you have already seen, you can control who can see different parts of you site. When you work with modules, articles or weblinks setting the Access level to Registered will mean that only logged in users can see them</li><li>When you create a new article or other kind of content you also can save it as Published or Unpublished. If it is Unpublished site visitors will not be able to see it but you will.</li><li>You can learn much more about working with Joomla from the <a href="https://docs.joomla.org">Joomla documentation site</a> and get help from other users at the <a href="http://forum.joomla.org">Joomla forums</a>. In the administrator there are help buttons on every page that provide detailed information about the functions on that page.</li></ul>', '', 1, 2, '2011-01-01 00:00:01', 580, 'Joomla', '2013-10-13 17:16:12', 713, 0, '0000-00-00 00:00:00', '2012-01-04 16:48:38', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":""}', 2, 1, '', '', 3, 8, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(3, 38, 'Welcome to your blog', 'welcome-to-your-blog', '<p>This is a sample blog posting.</p><p>If you log in to the site (the Author Login link is on the very bottom of this page) you will be able to edit it and all of the other existing articles. You will also be able to create a new article and make other changes to the site.</p><p>As you add and modify articles you will see how your site changes and also how you can customise it in various ways.</p><p>Go ahead, you can''t break it.</p>', '', 1, 9, '2011-01-05 00:00:01', 580, 'Joomla', '2013-10-13 16:58:11', 713, 0, '0000-00-00 00:00:00', '2012-01-05 16:55:36', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":""}', 4, 2, '', '', 1, 6, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(4, 39, 'About your home page', 'about-your-home-page', '<p>Your home page is set to display the four most recent articles from the blog category in a column. Then there are links to the 4 nest oldest articles. You can change those numbers by editing the content options settings in the blog tab in your site administrator. There is a link to your site administrator in the top menu.</p><p>If you want to have your blog post broken into two parts, an introduction and then a full length separate page, use the Read More button to insert a break.</p>', '<p>On the full page you will see both the introductory content and the rest of the article. You can change the settings to hide the introduction if you want.</p><p></p><p></p><p></p>', 1, 9, '2011-01-03 00:00:01', 580, 'Joomla', '2013-10-13 16:59:32', 713, 0, '0000-00-00 00:00:00', '2012-01-03 00:00:00', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":""}', 7, 1, '', '', 1, 6, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(5, 40, 'Your Modules', 'your-modules', '<p>Your site has some commonly used modules already preconfigured. These include:</p><ul><li>Image Module which holds the image beneath the menu. This is a Custom HTML module that you can edit to change the image.</li><li>Blog Roll. which lets you link to other blogs. We''ve put in two examples, but you''ll want to change them. When you are logged in, click on blog roll on the top menu to update this.</li><li>Most Read Posts which lists articles based on the number of times they have been read.</li><li>Older Articles which lists out articles by month.</li><li>Syndicate which allows your readers to read your posts in a news reader.</li><li>Popular Tags, which will appear if you use tagging on your articles. Just enter a tag in the Tags field when editing.</li></ul><p>Each of these modules has many options which you can experiment with in the Module Manager in your site Administrator. Moving your mouse over a module and clicking on the edit icon will take you to an edit screen for that module. Always be sure to save and close any module you edit.</p><p>Joomla! also includes many other modules you can incorporate in your site. As you develop your site you may want to add more module that you can find at the <a href="http://extensions.joomla.org">Joomla Extensions Directory.</a></p>', '', 1, 9, '2010-12-31 00:00:01', 580, 'Joomla', '2013-10-13 17:59:36', 713, 0, '0000-00-00 00:00:00', '2010-12-31 00:00:01', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":""}', 11, 0, '', '', 1, 5, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', ''),
(6, 43, 'Your Template', 'your-template', '<p>Templates control the look and feel of your website.</p><p>This blog is installed with the Protostar template.</p><p>You can edit the options by clicking on the Working on Your Site, Template Settings link in the top menu (visible when you login).</p><p>For example you can change the site background color, highlights color, site title, site description and title font used.</p><p>More options are available in the site administrator. You may also install a new template using the extension manager.</p>', '', 1, 9, '2011-01-02 00:00:01', 580, 'Joomla', '2013-10-13 17:04:31', 713, 0, '0000-00-00 00:00:00', '2011-01-02 00:00:01', '0000-00-00 00:00:00', '{"image_intro":"","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}', '{"urla":false,"urlatext":"","targeta":"","urlb":false,"urlbtext":"","targetb":"","urlc":false,"urlctext":"","targetc":""}', '{"show_title":"","link_titles":"","show_tags":"","show_intro":"","info_block_position":"0","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_vote":"","show_hits":"","show_noauth":"","urls_position":"","alternative_readmore":"","article_layout":""}', 17, 0, '', '', 1, 3, '{"robots":"","author":"","rights":"","xreference":""}', 0, '*', '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_contentitem_tag_map`
--

CREATE TABLE IF NOT EXISTS `ciudq_contentitem_tag_map` (
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `core_content_id` int(10) unsigned NOT NULL COMMENT 'PK from the core content table',
  `content_item_id` int(11) NOT NULL COMMENT 'PK from the content type table',
  `tag_id` int(10) unsigned NOT NULL COMMENT 'PK from the tag table',
  `tag_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Date of most recent save for this tag-item',
  `type_id` mediumint(8) NOT NULL COMMENT 'PK from the content_type table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Maps items from content tables to tags';

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `ciudq_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_content_rating`
--

CREATE TABLE IF NOT EXISTS `ciudq_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(10) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_content_types`
--

CREATE TABLE IF NOT EXISTS `ciudq_content_types` (
  `type_id` int(10) unsigned NOT NULL,
  `type_title` varchar(255) NOT NULL DEFAULT '',
  `type_alias` varchar(255) NOT NULL DEFAULT '',
  `table` varchar(255) NOT NULL DEFAULT '',
  `rules` text NOT NULL,
  `field_mappings` text NOT NULL,
  `router` varchar(255) NOT NULL DEFAULT '',
  `content_history_options` varchar(5120) DEFAULT NULL COMMENT 'JSON string for com_contenthistory options'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_content_types`
--

INSERT INTO `ciudq_content_types` (`type_id`, `type_title`, `type_alias`, `table`, `rules`, `field_mappings`, `router`, `content_history_options`) VALUES
(1, 'Article', 'com_content.article', '{"special":{"dbtable":"#__content","key":"id","type":"Content","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"state","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"introtext", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"attribs", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"asset_id"}, "special":{"fulltext":"fulltext"}}', 'ContentHelperRoute::getArticleRoute', '{"formFile":"administrator\\/components\\/com_content\\/models\\/forms\\/article.xml", "hideFields":["asset_id","checked_out","checked_out_time","version"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(2, 'Contact', 'com_contact.contact', '{"special":{"dbtable":"#__contact_details","key":"id","type":"Contact","prefix":"ContactTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"address", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"image", "core_urls":"webpage", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special":{"con_position":"con_position","suburb":"suburb","state":"state","country":"country","postcode":"postcode","telephone":"telephone","fax":"fax","misc":"misc","email_to":"email_to","default_con":"default_con","user_id":"user_id","mobile":"mobile","sortname1":"sortname1","sortname2":"sortname2","sortname3":"sortname3"}}', 'ContactHelperRoute::getContactRoute', '{"formFile":"administrator\\/components\\/com_contact\\/models\\/forms\\/contact.xml","hideFields":["default_con","checked_out","checked_out_time","version","xreference"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"], "displayLookup":[ {"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ] }'),
(3, 'Newsfeed', 'com_newsfeeds.newsfeed', '{"special":{"dbtable":"#__newsfeeds","key":"id","type":"Newsfeed","prefix":"NewsfeedsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"hits","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"link", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"xreference", "asset_id":"null"}, "special":{"numarticles":"numarticles","cache_time":"cache_time","rtl":"rtl"}}', 'NewsfeedsHelperRoute::getNewsfeedRoute', '{"formFile":"administrator\\/components\\/com_newsfeeds\\/models\\/forms\\/newsfeed.xml","hideFields":["asset_id","checked_out","checked_out_time","version"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "hits"],"convertToInt":["publish_up", "publish_down", "featured", "ordering"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(4, 'User', 'com_users.user', '{"special":{"dbtable":"#__users","key":"id","type":"User","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"null","core_alias":"username","core_created_time":"registerdate","core_modified_time":"lastvisitDate","core_body":"null", "core_hits":"null","core_publish_up":"null","core_publish_down":"null","access":"null", "core_params":"params", "core_featured":"null", "core_metadata":"null", "core_language":"null", "core_images":"null", "core_urls":"null", "core_version":"null", "core_ordering":"null", "core_metakey":"null", "core_metadesc":"null", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special":{}}', 'UsersHelperRoute::getUserRoute', ''),
(5, 'Article Category', 'com_content.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContentHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(6, 'Contact Category', 'com_contact.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'ContactHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(7, 'Newsfeeds Category', 'com_newsfeeds.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', 'NewsfeedsHelperRoute::getCategoryRoute', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(8, 'Tag', 'com_tags.tag', '{"special":{"dbtable":"#__tags","key":"tag_id","type":"Tag","prefix":"TagsTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"featured", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"urls", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"null", "core_xreference":"null", "asset_id":"null"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path"}}', 'TagsHelperRoute::getTagRoute', '{"formFile":"administrator\\/components\\/com_tags\\/models\\/forms\\/tag.xml", "hideFields":["checked_out","checked_out_time","version", "lft", "rgt", "level", "path", "urls", "publish_up", "publish_down"],"ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"],"convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}'),
(9, 'Banner', 'com_banners.banner', '{"special":{"dbtable":"#__banners","key":"id","type":"Banner","prefix":"BannersTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"name","core_state":"published","core_alias":"alias","core_created_time":"created","core_modified_time":"modified","core_body":"description", "core_hits":"null","core_publish_up":"publish_up","core_publish_down":"publish_down","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"images", "core_urls":"link", "core_version":"version", "core_ordering":"ordering", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"catid", "core_xreference":"null", "asset_id":"null"}, "special":{"imptotal":"imptotal", "impmade":"impmade", "clicks":"clicks", "clickurl":"clickurl", "custombannercode":"custombannercode", "cid":"cid", "purchase_type":"purchase_type", "track_impressions":"track_impressions", "track_clicks":"track_clicks"}}', '', '{"formFile":"administrator\\/components\\/com_banners\\/models\\/forms\\/banner.xml", "hideFields":["checked_out","checked_out_time","version", "reset"],"ignoreChanges":["modified_by", "modified", "checked_out", "checked_out_time", "version", "imptotal", "impmade", "reset"], "convertToInt":["publish_up", "publish_down", "ordering"], "displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"cid","targetTable":"#__banner_clients","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"created_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"modified_by","targetTable":"#__users","targetColumn":"id","displayColumn":"name"} ]}'),
(10, 'Banners Category', 'com_banners.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special": {"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', '', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["asset_id","checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}'),
(11, 'Banner Client', 'com_banners.client', '{"special":{"dbtable":"#__banner_clients","key":"id","type":"Client","prefix":"BannersTable"}}', '', '', '', '{"formFile":"administrator\\/components\\/com_banners\\/models\\/forms\\/client.xml", "hideFields":["checked_out","checked_out_time"], "ignoreChanges":["checked_out", "checked_out_time"], "convertToInt":[], "displayLookup":[]}'),
(12, 'User Notes', 'com_users.note', '{"special":{"dbtable":"#__user_notes","key":"id","type":"Note","prefix":"UsersTable"}}', '', '', '', '{"formFile":"administrator\\/components\\/com_users\\/models\\/forms\\/note.xml", "hideFields":["checked_out","checked_out_time", "publish_up", "publish_down"],"ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time"], "convertToInt":["publish_up", "publish_down"],"displayLookup":[{"sourceColumn":"catid","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}, {"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}]}'),
(13, 'User Notes Category', 'com_users.category', '{"special":{"dbtable":"#__categories","key":"id","type":"Category","prefix":"JTable","config":"array()"},"common":{"dbtable":"#__ucm_content","key":"ucm_id","type":"Corecontent","prefix":"JTable","config":"array()"}}', '', '{"common":{"core_content_item_id":"id","core_title":"title","core_state":"published","core_alias":"alias","core_created_time":"created_time","core_modified_time":"modified_time","core_body":"description", "core_hits":"hits","core_publish_up":"null","core_publish_down":"null","core_access":"access", "core_params":"params", "core_featured":"null", "core_metadata":"metadata", "core_language":"language", "core_images":"null", "core_urls":"null", "core_version":"version", "core_ordering":"null", "core_metakey":"metakey", "core_metadesc":"metadesc", "core_catid":"parent_id", "core_xreference":"null", "asset_id":"asset_id"}, "special":{"parent_id":"parent_id","lft":"lft","rgt":"rgt","level":"level","path":"path","extension":"extension","note":"note"}}', '', '{"formFile":"administrator\\/components\\/com_categories\\/models\\/forms\\/category.xml", "hideFields":["checked_out","checked_out_time","version","lft","rgt","level","path","extension"], "ignoreChanges":["modified_user_id", "modified_time", "checked_out", "checked_out_time", "version", "hits", "path"], "convertToInt":["publish_up", "publish_down"], "displayLookup":[{"sourceColumn":"created_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"}, {"sourceColumn":"access","targetTable":"#__viewlevels","targetColumn":"id","displayColumn":"title"},{"sourceColumn":"modified_user_id","targetTable":"#__users","targetColumn":"id","displayColumn":"name"},{"sourceColumn":"parent_id","targetTable":"#__categories","targetColumn":"id","displayColumn":"title"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `ciudq_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_extensions`
--

CREATE TABLE IF NOT EXISTS `ciudq_extensions` (
  `extension_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `element` varchar(100) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `client_id` tinyint(3) NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `access` int(10) unsigned NOT NULL DEFAULT '1',
  `protected` tinyint(3) NOT NULL DEFAULT '0',
  `manifest_cache` text NOT NULL,
  `params` text NOT NULL,
  `custom_data` text NOT NULL,
  `system_data` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_extensions`
--

INSERT INTO `ciudq_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(1, 'com_mailto', 'component', 'com_mailto', '', 0, 1, 1, 1, '{"name":"com_mailto","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MAILTO_XML_DESCRIPTION","group":"","filename":"mailto"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'com_wrapper', 'component', 'com_wrapper', '', 0, 1, 1, 1, '{"name":"com_wrapper","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.\\n\\t","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_WRAPPER_XML_DESCRIPTION","group":"","filename":"wrapper"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'com_admin', 'component', 'com_admin', '', 1, 1, 1, 1, '{"name":"com_admin","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_ADMIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'com_banners', 'component', 'com_banners', '', 1, 1, 1, 0, '{"name":"com_banners","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_BANNERS_XML_DESCRIPTION","group":"","filename":"banners"}', '{"purchase_type":"3","track_impressions":"0","track_clicks":"0","metakey_prefix":"","save_history":"1","history_limit":10}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'com_cache', 'component', 'com_cache', '', 1, 1, 1, 1, '{"name":"com_cache","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CACHE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'com_categories', 'component', 'com_categories', '', 1, 1, 1, 1, '{"name":"com_categories","type":"component","creationDate":"December 2007","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CATEGORIES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'com_checkin', 'component', 'com_checkin', '', 1, 1, 1, 1, '{"name":"com_checkin","type":"component","creationDate":"Unknown","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CHECKIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'com_contact', 'component', 'com_contact', '', 1, 1, 1, 0, '{"name":"com_contact","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTACT_XML_DESCRIPTION","group":"","filename":"contact"}', '{"show_contact_category":"hide","save_history":"1","history_limit":10,"show_contact_list":"0","presentation_style":"sliders","show_name":"1","show_position":"1","show_email":"0","show_street_address":"1","show_suburb":"1","show_state":"1","show_postcode":"1","show_country":"1","show_telephone":"1","show_mobile":"1","show_fax":"1","show_webpage":"1","show_misc":"1","show_image":"1","image":"","allow_vcard":"0","show_articles":"0","show_profile":"0","show_links":"0","linka_name":"","linkb_name":"","linkc_name":"","linkd_name":"","linke_name":"","contact_icons":"0","icon_address":"","icon_email":"","icon_telephone":"","icon_mobile":"","icon_fax":"","icon_misc":"","show_headings":"1","show_position_headings":"1","show_email_headings":"0","show_telephone_headings":"1","show_mobile_headings":"0","show_fax_headings":"0","allow_vcard_headings":"0","show_suburb_headings":"1","show_state_headings":"1","show_country_headings":"1","show_email_form":"1","show_email_copy":"1","banned_email":"","banned_subject":"","banned_text":"","validate_session":"1","custom_reply":"0","redirect":"","show_category_crumb":"0","metakey":"","metadesc":"","robots":"","author":"","rights":"","xreference":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(9, 'com_cpanel', 'component', 'com_cpanel', '', 1, 1, 1, 1, '{"name":"com_cpanel","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CPANEL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10, 'com_installer', 'component', 'com_installer', '', 1, 1, 1, 1, '{"name":"com_installer","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_INSTALLER_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(11, 'com_languages', 'component', 'com_languages', '', 1, 1, 1, 1, '{"name":"com_languages","type":"component","creationDate":"2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LANGUAGES_XML_DESCRIPTION","group":""}', '{"administrator":"en-GB","site":"en-GB"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(12, 'com_login', 'component', 'com_login', '', 1, 1, 1, 1, '{"name":"com_login","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_LOGIN_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(13, 'com_media', 'component', 'com_media', '', 1, 1, 0, 1, '{"name":"com_media","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MEDIA_XML_DESCRIPTION","group":"","filename":"media"}', '{"upload_extensions":"bmp,csv,doc,gif,ico,jpg,jpeg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,GIF,ICO,JPG,JPEG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS","upload_maxsize":"10","file_path":"images","image_path":"images","restrict_uploads":"1","allowed_media_usergroup":"3","check_mime":"1","image_extensions":"bmp,gif,jpg,png","ignore_extensions":"","upload_mime":"image\\/jpeg,image\\/gif,image\\/png,image\\/bmp,application\\/x-shockwave-flash,application\\/msword,application\\/excel,application\\/pdf,application\\/powerpoint,text\\/plain,application\\/x-zip","upload_mime_illegal":"text\\/html"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(14, 'com_menus', 'component', 'com_menus', '', 1, 1, 1, 1, '{"name":"com_menus","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MENUS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(15, 'com_messages', 'component', 'com_messages', '', 1, 1, 1, 1, '{"name":"com_messages","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MESSAGES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(16, 'com_modules', 'component', 'com_modules', '', 1, 1, 1, 1, '{"name":"com_modules","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_MODULES_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(17, 'com_newsfeeds', 'component', 'com_newsfeeds', '', 1, 1, 1, 0, '{"name":"com_newsfeeds","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '{"newsfeed_layout":"_:default","save_history":"1","history_limit":5,"show_feed_image":"1","show_feed_description":"1","show_item_description":"1","feed_character_count":"0","feed_display_order":"des","float_first":"right","float_second":"right","show_tags":"1","category_layout":"_:default","show_category_title":"1","show_description":"1","show_description_image":"1","maxLevel":"-1","show_empty_categories":"0","show_subcat_desc":"1","show_cat_items":"1","show_cat_tags":"1","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_items_cat":"1","filter_field":"1","show_pagination_limit":"1","show_headings":"1","show_articles":"0","show_link":"1","show_pagination":"1","show_pagination_results":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(18, 'com_plugins', 'component', 'com_plugins', '', 1, 1, 1, 1, '{"name":"com_plugins","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_PLUGINS_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(19, 'com_search', 'component', 'com_search', '', 1, 1, 1, 0, '{"name":"com_search","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_SEARCH_XML_DESCRIPTION","group":"","filename":"search"}', '{"enabled":"0","show_date":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(20, 'com_templates', 'component', 'com_templates', '', 1, 1, 1, 1, '{"name":"com_templates","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_TEMPLATES_XML_DESCRIPTION","group":""}', '{"template_positions_display":"0","upload_limit":"2","image_formats":"gif,bmp,jpg,jpeg,png","source_formats":"txt,less,ini,xml,js,php,css","font_formats":"woff,ttf,otf","compressed_formats":"zip"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(22, 'com_content', 'component', 'com_content', '', 1, 1, 0, 1, '{"name":"com_content","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '{"article_layout":"_:default","show_title":"1","link_titles":"1","show_intro":"1","show_category":"1","link_category":"1","show_parent_category":"0","link_parent_category":"0","show_author":"1","link_author":"0","show_create_date":"0","show_modify_date":"0","show_publish_date":"1","show_item_navigation":"1","show_vote":"0","show_readmore":"1","show_readmore_title":"1","readmore_limit":"100","show_icons":"1","show_print_icon":"1","show_email_icon":"1","show_hits":"1","show_noauth":"0","show_publishing_options":"1","show_article_options":"1","save_history":"1","history_limit":10,"show_urls_images_frontend":"0","show_urls_images_backend":"1","targeta":0,"targetb":0,"targetc":0,"float_intro":"left","float_fulltext":"left","category_layout":"_:blog","show_category_title":"0","show_description":"0","show_description_image":"0","maxLevel":"1","show_empty_categories":"0","show_no_articles":"1","show_subcat_desc":"1","show_cat_num_articles":"0","show_base_description":"1","maxLevelcat":"-1","show_empty_categories_cat":"0","show_subcat_desc_cat":"1","show_cat_num_articles_cat":"1","num_leading_articles":"1","num_intro_articles":"4","num_columns":"2","num_links":"4","multi_column_order":"0","show_subcategory_content":"0","show_pagination_limit":"1","filter_field":"hide","show_headings":"1","list_show_date":"0","date_format":"","list_show_hits":"1","list_show_author":"1","orderby_pri":"order","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_feed_link":"1","feed_summary":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(23, 'com_config', 'component', 'com_config', '', 1, 1, 0, 1, '{"name":"com_config","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_CONFIG_XML_DESCRIPTION","group":""}', '{"filters":{"1":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"9":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"6":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"7":{"filter_type":"NONE","filter_tags":"","filter_attributes":""},"2":{"filter_type":"NH","filter_tags":"","filter_attributes":""},"3":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"4":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"5":{"filter_type":"BL","filter_tags":"","filter_attributes":""},"8":{"filter_type":"NONE","filter_tags":"","filter_attributes":""}}}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(24, 'com_redirect', 'component', 'com_redirect', '', 1, 1, 0, 1, '{"name":"com_redirect","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_REDIRECT_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(25, 'com_users', 'component', 'com_users', '', 1, 1, 0, 1, '{"name":"com_users","type":"component","creationDate":"April 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_USERS_XML_DESCRIPTION","group":"","filename":"users"}', '{"allowUserRegistration":"0","new_usertype":"2","guest_usergroup":"9","sendpassword":"1","useractivation":"1","mail_to_admin":"0","captcha":"","frontend_userparams":"1","site_language":"0","change_login_name":"0","reset_count":"10","reset_time":"1","minimum_length":"4","minimum_integers":"0","minimum_symbols":"0","minimum_uppercase":"0","save_history":"1","history_limit":5,"mailSubjectPrefix":"","mailBodySuffix":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(27, 'com_finder', 'component', 'com_finder', '', 1, 1, 0, 0, '{"name":"com_finder","type":"component","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_FINDER_XML_DESCRIPTION","group":"","filename":"finder"}', '{"show_description":"1","description_length":255,"allow_empty_query":"0","show_url":"1","show_advanced":"1","expand_advanced":"0","show_date_filters":"0","highlight_terms":"1","opensearch_name":"","opensearch_description":"","batch_size":"50","memory_table_limit":30000,"title_multiplier":"1.7","text_multiplier":"0.7","meta_multiplier":"1.2","path_multiplier":"2.0","misc_multiplier":"0.3","stemmer":"snowball"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(28, 'com_joomlaupdate', 'component', 'com_joomlaupdate', '', 1, 1, 0, 1, '{"name":"com_joomlaupdate","type":"component","creationDate":"February 2012","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"COM_JOOMLAUPDATE_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(29, 'com_tags', 'component', 'com_tags', '', 1, 1, 1, 1, '{"name":"com_tags","type":"component","creationDate":"December 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"COM_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '{"tag_layout":"_:default","save_history":"1","history_limit":5,"show_tag_title":"0","tag_list_show_tag_image":"0","tag_list_show_tag_description":"0","tag_list_image":"","show_tag_num_items":"0","tag_list_orderby":"title","tag_list_orderby_direction":"ASC","show_headings":"0","tag_list_show_date":"0","tag_list_show_item_image":"0","tag_list_show_item_description":"0","tag_list_item_maximum_characters":0,"return_any_or_all":"1","include_children":"0","maximum":200,"tag_list_language_filter":"all","tags_layout":"_:default","all_tags_orderby":"title","all_tags_orderby_direction":"ASC","all_tags_show_tag_image":"0","all_tags_show_tag_descripion":"0","all_tags_tag_maximum_characters":20,"all_tags_show_tag_hits":"0","filter_field":"1","show_pagination_limit":"1","show_pagination":"2","show_pagination_results":"1","tag_field_ajax_mode":"1","show_feed_link":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(30, 'com_contenthistory', 'component', 'com_contenthistory', '', 1, 1, 1, 0, '{"name":"com_contenthistory","type":"component","creationDate":"May 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_CONTENTHISTORY_XML_DESCRIPTION","group":"","filename":"contenthistory"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(31, 'com_ajax', 'component', 'com_ajax', '', 1, 1, 1, 0, '{"name":"com_ajax","type":"component","creationDate":"August 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_AJAX_XML_DESCRIPTION","group":"","filename":"ajax"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(32, 'com_postinstall', 'component', 'com_postinstall', '', 1, 1, 1, 1, '{"name":"com_postinstall","type":"component","creationDate":"September 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"COM_POSTINSTALL_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(101, 'SimplePie', 'library', 'simplepie', '', 0, 1, 1, 1, '{"name":"SimplePie","type":"library","creationDate":"2004","author":"SimplePie","copyright":"Copyright (c) 2004-2009, Ryan Parman and Geoffrey Sneddon","authorEmail":"","authorUrl":"http:\\/\\/simplepie.org\\/","version":"1.2","description":"LIB_SIMPLEPIE_XML_DESCRIPTION","group":"","filename":"simplepie"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(102, 'phputf8', 'library', 'phputf8', '', 0, 1, 1, 1, '{"name":"phputf8","type":"library","creationDate":"2006","author":"Harry Fuecks","copyright":"Copyright various authors","authorEmail":"hfuecks@gmail.com","authorUrl":"http:\\/\\/sourceforge.net\\/projects\\/phputf8","version":"0.5","description":"LIB_PHPUTF8_XML_DESCRIPTION","group":"","filename":"phputf8"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(103, 'Joomla! Platform', 'library', 'joomla', '', 0, 1, 1, 1, '{"name":"Joomla! Platform","type":"library","creationDate":"2008","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"http:\\/\\/www.joomla.org","version":"13.1","description":"LIB_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '{"mediaversion":"791cc3141393e02175c55724fd280959"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(104, 'IDNA Convert', 'library', 'idna_convert', '', 0, 1, 1, 1, '{"name":"IDNA Convert","type":"library","creationDate":"2004","author":"phlyLabs","copyright":"2004-2011 phlyLabs Berlin, http:\\/\\/phlylabs.de","authorEmail":"phlymail@phlylabs.de","authorUrl":"http:\\/\\/phlylabs.de","version":"0.8.0","description":"LIB_IDNA_XML_DESCRIPTION","group":"","filename":"idna_convert"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(105, 'FOF', 'library', 'fof', '', 0, 1, 1, 1, '{"name":"FOF","type":"library","creationDate":"2015-04-22 13:15:32","author":"Nicholas K. Dionysopoulos \\/ Akeeba Ltd","copyright":"(C)2011-2015 Nicholas K. Dionysopoulos","authorEmail":"nicholas@akeebabackup.com","authorUrl":"https:\\/\\/www.akeebabackup.com","version":"2.4.3","description":"LIB_FOF_XML_DESCRIPTION","group":"","filename":"fof"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(106, 'PHPass', 'library', 'phpass', '', 0, 1, 1, 1, '{"name":"PHPass","type":"library","creationDate":"2004-2006","author":"Solar Designer","copyright":"","authorEmail":"solar@openwall.com","authorUrl":"http:\\/\\/www.openwall.com\\/phpass\\/","version":"0.3","description":"LIB_PHPASS_XML_DESCRIPTION","group":"","filename":"phpass"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(200, 'mod_articles_archive', 'module', 'mod_articles_archive', '', 0, 1, 1, 0, '{"name":"mod_articles_archive","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_ARCHIVE_XML_DESCRIPTION","group":"","filename":"mod_articles_archive"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(201, 'mod_articles_latest', 'module', 'mod_articles_latest', '', 0, 1, 1, 0, '{"name":"mod_articles_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_NEWS_XML_DESCRIPTION","group":"","filename":"mod_articles_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(202, 'mod_articles_popular', 'module', 'mod_articles_popular', '', 0, 1, 1, 0, '{"name":"mod_articles_popular","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_articles_popular"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(203, 'mod_banners', 'module', 'mod_banners', '', 0, 1, 1, 0, '{"name":"mod_banners","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BANNERS_XML_DESCRIPTION","group":"","filename":"mod_banners"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(204, 'mod_breadcrumbs', 'module', 'mod_breadcrumbs', '', 0, 1, 1, 1, '{"name":"mod_breadcrumbs","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_BREADCRUMBS_XML_DESCRIPTION","group":"","filename":"mod_breadcrumbs"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(205, 'mod_custom', 'module', 'mod_custom', '', 0, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":"","filename":"mod_custom"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(206, 'mod_feed', 'module', 'mod_feed', '', 0, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":"","filename":"mod_feed"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(207, 'mod_footer', 'module', 'mod_footer', '', 0, 1, 1, 0, '{"name":"mod_footer","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FOOTER_XML_DESCRIPTION","group":"","filename":"mod_footer"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(208, 'mod_login', 'module', 'mod_login', '', 0, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":"","filename":"mod_login"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(209, 'mod_menu', 'module', 'mod_menu', '', 0, 1, 1, 1, '{"name":"mod_menu","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":"","filename":"mod_menu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(210, 'mod_articles_news', 'module', 'mod_articles_news', '', 0, 1, 1, 0, '{"name":"mod_articles_news","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_NEWS_XML_DESCRIPTION","group":"","filename":"mod_articles_news"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(211, 'mod_random_image', 'module', 'mod_random_image', '', 0, 1, 1, 0, '{"name":"mod_random_image","type":"module","creationDate":"July 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RANDOM_IMAGE_XML_DESCRIPTION","group":"","filename":"mod_random_image"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(212, 'mod_related_items', 'module', 'mod_related_items', '', 0, 1, 1, 0, '{"name":"mod_related_items","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_RELATED_XML_DESCRIPTION","group":"","filename":"mod_related_items"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(213, 'mod_search', 'module', 'mod_search', '', 0, 1, 1, 0, '{"name":"mod_search","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SEARCH_XML_DESCRIPTION","group":"","filename":"mod_search"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(214, 'mod_stats', 'module', 'mod_stats', '', 0, 1, 1, 0, '{"name":"mod_stats","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":"","filename":"mod_stats"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(215, 'mod_syndicate', 'module', 'mod_syndicate', '', 0, 1, 1, 1, '{"name":"mod_syndicate","type":"module","creationDate":"May 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SYNDICATE_XML_DESCRIPTION","group":"","filename":"mod_syndicate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(216, 'mod_users_latest', 'module', 'mod_users_latest', '', 0, 1, 1, 0, '{"name":"mod_users_latest","type":"module","creationDate":"December 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_USERS_LATEST_XML_DESCRIPTION","group":"","filename":"mod_users_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(218, 'mod_whosonline', 'module', 'mod_whosonline', '', 0, 1, 1, 0, '{"name":"mod_whosonline","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WHOSONLINE_XML_DESCRIPTION","group":"","filename":"mod_whosonline"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(219, 'mod_wrapper', 'module', 'mod_wrapper', '', 0, 1, 1, 0, '{"name":"mod_wrapper","type":"module","creationDate":"October 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_WRAPPER_XML_DESCRIPTION","group":"","filename":"mod_wrapper"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(220, 'mod_articles_category', 'module', 'mod_articles_category', '', 0, 1, 1, 0, '{"name":"mod_articles_category","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORY_XML_DESCRIPTION","group":"","filename":"mod_articles_category"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(221, 'mod_articles_categories', 'module', 'mod_articles_categories', '', 0, 1, 1, 0, '{"name":"mod_articles_categories","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_ARTICLES_CATEGORIES_XML_DESCRIPTION","group":"","filename":"mod_articles_categories"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(222, 'mod_languages', 'module', 'mod_languages', '', 0, 1, 1, 1, '{"name":"mod_languages","type":"module","creationDate":"February 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LANGUAGES_XML_DESCRIPTION","group":"","filename":"mod_languages"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(223, 'mod_finder', 'module', 'mod_finder', '', 0, 1, 0, 0, '{"name":"mod_finder","type":"module","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FINDER_XML_DESCRIPTION","group":"","filename":"mod_finder"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(300, 'mod_custom', 'module', 'mod_custom', '', 1, 1, 1, 1, '{"name":"mod_custom","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_CUSTOM_XML_DESCRIPTION","group":"","filename":"mod_custom"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(301, 'mod_feed', 'module', 'mod_feed', '', 1, 1, 1, 0, '{"name":"mod_feed","type":"module","creationDate":"July 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_FEED_XML_DESCRIPTION","group":"","filename":"mod_feed"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(302, 'mod_latest', 'module', 'mod_latest', '', 1, 1, 1, 0, '{"name":"mod_latest","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LATEST_XML_DESCRIPTION","group":"","filename":"mod_latest"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(303, 'mod_logged', 'module', 'mod_logged', '', 1, 1, 1, 0, '{"name":"mod_logged","type":"module","creationDate":"January 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGGED_XML_DESCRIPTION","group":"","filename":"mod_logged"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(304, 'mod_login', 'module', 'mod_login', '', 1, 1, 1, 1, '{"name":"mod_login","type":"module","creationDate":"March 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_LOGIN_XML_DESCRIPTION","group":"","filename":"mod_login"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(305, 'mod_menu', 'module', 'mod_menu', '', 1, 1, 1, 0, '{"name":"mod_menu","type":"module","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MENU_XML_DESCRIPTION","group":"","filename":"mod_menu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(307, 'mod_popular', 'module', 'mod_popular', '', 1, 1, 1, 0, '{"name":"mod_popular","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_popular"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(308, 'mod_quickicon', 'module', 'mod_quickicon', '', 1, 1, 1, 1, '{"name":"mod_quickicon","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_QUICKICON_XML_DESCRIPTION","group":"","filename":"mod_quickicon"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(309, 'mod_status', 'module', 'mod_status', '', 1, 1, 1, 0, '{"name":"mod_status","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATUS_XML_DESCRIPTION","group":"","filename":"mod_status"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(310, 'mod_submenu', 'module', 'mod_submenu', '', 1, 1, 1, 0, '{"name":"mod_submenu","type":"module","creationDate":"Feb 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_SUBMENU_XML_DESCRIPTION","group":"","filename":"mod_submenu"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(311, 'mod_title', 'module', 'mod_title', '', 1, 1, 1, 0, '{"name":"mod_title","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TITLE_XML_DESCRIPTION","group":"","filename":"mod_title"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(312, 'mod_toolbar', 'module', 'mod_toolbar', '', 1, 1, 1, 1, '{"name":"mod_toolbar","type":"module","creationDate":"Nov 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_TOOLBAR_XML_DESCRIPTION","group":"","filename":"mod_toolbar"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(313, 'mod_multilangstatus', 'module', 'mod_multilangstatus', '', 1, 1, 1, 0, '{"name":"mod_multilangstatus","type":"module","creationDate":"September 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_MULTILANGSTATUS_XML_DESCRIPTION","group":"","filename":"mod_multilangstatus"}', '{"cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(314, 'mod_version', 'module', 'mod_version', '', 1, 1, 1, 0, '{"name":"mod_version","type":"module","creationDate":"January 2012","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_VERSION_XML_DESCRIPTION","group":"","filename":"mod_version"}', '{"format":"short","product":"1","cache":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(315, 'mod_stats_admin', 'module', 'mod_stats_admin', '', 1, 1, 1, 0, '{"name":"mod_stats_admin","type":"module","creationDate":"July 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"MOD_STATS_XML_DESCRIPTION","group":"","filename":"mod_stats_admin"}', '{"serverinfo":"0","siteinfo":"0","counter":"0","increase":"0","cache":"1","cache_time":"900","cachemode":"static"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(316, 'mod_tags_popular', 'module', 'mod_tags_popular', '', 0, 1, 1, 0, '{"name":"mod_tags_popular","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_POPULAR_XML_DESCRIPTION","group":"","filename":"mod_tags_popular"}', '{"maximum":"5","timeframe":"alltime","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(317, 'mod_tags_similar', 'module', 'mod_tags_similar', '', 0, 1, 1, 0, '{"name":"mod_tags_similar","type":"module","creationDate":"January 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.1.0","description":"MOD_TAGS_SIMILAR_XML_DESCRIPTION","group":"","filename":"mod_tags_similar"}', '{"maximum":"5","matchtype":"any","owncache":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(400, 'plg_authentication_gmail', 'plugin', 'gmail', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_gmail","type":"plugin","creationDate":"February 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_GMAIL_XML_DESCRIPTION","group":"","filename":"gmail"}', '{"applysuffix":"0","suffix":"","verifypeer":"1","user_blacklist":""}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(401, 'plg_authentication_joomla', 'plugin', 'joomla', 'authentication', 0, 1, 1, 1, '{"name":"plg_authentication_joomla","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_AUTH_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(402, 'plg_authentication_ldap', 'plugin', 'ldap', 'authentication', 0, 0, 1, 0, '{"name":"plg_authentication_ldap","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LDAP_XML_DESCRIPTION","group":"","filename":"ldap"}', '{"host":"","port":"389","use_ldapV3":"0","negotiate_tls":"0","no_referrals":"0","auth_method":"bind","base_dn":"","search_string":"","users_dn":"","username":"admin","password":"bobby7","ldap_fullname":"fullName","ldap_email":"mail","ldap_uid":"uid"}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(403, 'plg_content_contact', 'plugin', 'contact', 'content', 0, 1, 1, 0, '{"name":"plg_content_contact","type":"plugin","creationDate":"January 2014","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.2","description":"PLG_CONTENT_CONTACT_XML_DESCRIPTION","group":"","filename":"contact"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(404, 'plg_content_emailcloak', 'plugin', 'emailcloak', 'content', 0, 1, 1, 0, '{"name":"plg_content_emailcloak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_EMAILCLOAK_XML_DESCRIPTION","group":"","filename":"emailcloak"}', '{"mode":"1"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(406, 'plg_content_loadmodule', 'plugin', 'loadmodule', 'content', 0, 1, 1, 0, '{"name":"plg_content_loadmodule","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOADMODULE_XML_DESCRIPTION","group":"","filename":"loadmodule"}', '{"style":"xhtml"}', '', '', 0, '2011-09-18 15:22:50', 0, 0),
(407, 'plg_content_pagebreak', 'plugin', 'pagebreak', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagebreak","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_PAGEBREAK_XML_DESCRIPTION","group":"","filename":"pagebreak"}', '{"title":"1","multipage_toc":"1","showall":"1"}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(408, 'plg_content_pagenavigation', 'plugin', 'pagenavigation', 'content', 0, 1, 1, 0, '{"name":"plg_content_pagenavigation","type":"plugin","creationDate":"January 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_PAGENAVIGATION_XML_DESCRIPTION","group":"","filename":"pagenavigation"}', '{"position":"1"}', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(409, 'plg_content_vote', 'plugin', 'vote', 'content', 0, 1, 1, 0, '{"name":"plg_content_vote","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_VOTE_XML_DESCRIPTION","group":"","filename":"vote"}', '', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(410, 'plg_editors_codemirror', 'plugin', 'codemirror', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_codemirror","type":"plugin","creationDate":"28 March 2011","author":"Marijn Haverbeke","copyright":"Copyright (C) 2014 by Marijn Haverbeke <marijnh@gmail.com> and others","authorEmail":"marijnh@gmail.com","authorUrl":"http:\\/\\/codemirror.net\\/","version":"5.6","description":"PLG_CODEMIRROR_XML_DESCRIPTION","group":"","filename":"codemirror"}', '{"lineNumbers":"1","lineWrapping":"1","matchTags":"1","matchBrackets":"1","marker-gutter":"1","autoCloseTags":"1","autoCloseBrackets":"1","autoFocus":"1","theme":"default","tabmode":"indent"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(411, 'plg_editors_none', 'plugin', 'none', 'editors', 0, 1, 1, 1, '{"name":"plg_editors_none","type":"plugin","creationDate":"September 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_NONE_XML_DESCRIPTION","group":"","filename":"none"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(412, 'plg_editors_tinymce', 'plugin', 'tinymce', 'editors', 0, 1, 1, 0, '{"name":"plg_editors_tinymce","type":"plugin","creationDate":"2005-2014","author":"Moxiecode Systems AB","copyright":"Moxiecode Systems AB","authorEmail":"N\\/A","authorUrl":"tinymce.moxiecode.com","version":"4.1.7","description":"PLG_TINY_XML_DESCRIPTION","group":"","filename":"tinymce"}', '{"mode":"1","skin":"0","mobile":"0","entity_encoding":"raw","lang_mode":"1","text_direction":"ltr","content_css":"1","content_css_custom":"","relative_urls":"1","newlines":"0","invalid_elements":"script,applet,iframe","extended_elements":"","html_height":"550","html_width":"750","resizing":"1","element_path":"1","fonts":"1","paste":"1","searchreplace":"1","insertdate":"1","colors":"1","table":"1","smilies":"1","hr":"1","link":"1","media":"1","print":"1","directionality":"1","fullscreen":"1","alignment":"1","visualchars":"1","visualblocks":"1","nonbreaking":"1","template":"1","blockquote":"1","wordcount":"1","advlist":"1","autosave":"1","contextmenu":"1","inlinepopups":"1","custom_plugin":"","custom_button":""}', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(413, 'plg_editors-xtd_article', 'plugin', 'article', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_article","type":"plugin","creationDate":"October 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_ARTICLE_XML_DESCRIPTION","group":"","filename":"article"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(414, 'plg_editors-xtd_image', 'plugin', 'image', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_image","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_IMAGE_XML_DESCRIPTION","group":"","filename":"image"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(415, 'plg_editors-xtd_pagebreak', 'plugin', 'pagebreak', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_pagebreak","type":"plugin","creationDate":"August 2004","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EDITORSXTD_PAGEBREAK_XML_DESCRIPTION","group":"","filename":"pagebreak"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(416, 'plg_editors-xtd_readmore', 'plugin', 'readmore', 'editors-xtd', 0, 1, 1, 0, '{"name":"plg_editors-xtd_readmore","type":"plugin","creationDate":"March 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_READMORE_XML_DESCRIPTION","group":"","filename":"readmore"}', '', '', '', 0, '0000-00-00 00:00:00', 4, 0);
INSERT INTO `ciudq_extensions` (`extension_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `manifest_cache`, `params`, `custom_data`, `system_data`, `checked_out`, `checked_out_time`, `ordering`, `state`) VALUES
(417, 'plg_search_categories', 'plugin', 'categories', 'search', 0, 1, 1, 0, '{"name":"plg_search_categories","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CATEGORIES_XML_DESCRIPTION","group":"","filename":"categories"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(418, 'plg_search_contacts', 'plugin', 'contacts', 'search', 0, 1, 1, 0, '{"name":"plg_search_contacts","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTACTS_XML_DESCRIPTION","group":"","filename":"contacts"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(419, 'plg_search_content', 'plugin', 'content', 'search', 0, 1, 1, 0, '{"name":"plg_search_content","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(420, 'plg_search_newsfeeds', 'plugin', 'newsfeeds', 'search', 0, 1, 1, 0, '{"name":"plg_search_newsfeeds","type":"plugin","creationDate":"November 2005","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '{"search_limit":"50","search_content":"1","search_archived":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(422, 'plg_system_languagefilter', 'plugin', 'languagefilter', 'system', 0, 0, 1, 1, '{"name":"plg_system_languagefilter","type":"plugin","creationDate":"July 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGEFILTER_XML_DESCRIPTION","group":"","filename":"languagefilter"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(423, 'plg_system_p3p', 'plugin', 'p3p', 'system', 0, 0, 1, 0, '{"name":"plg_system_p3p","type":"plugin","creationDate":"September 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_P3P_XML_DESCRIPTION","group":"","filename":"p3p"}', '{"headers":"NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(424, 'plg_system_cache', 'plugin', 'cache', 'system', 0, 0, 1, 1, '{"name":"plg_system_cache","type":"plugin","creationDate":"February 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CACHE_XML_DESCRIPTION","group":"","filename":"cache"}', '{"browsercache":"0","cachetime":"15"}', '', '', 0, '0000-00-00 00:00:00', 9, 0),
(425, 'plg_system_debug', 'plugin', 'debug', 'system', 0, 1, 1, 0, '{"name":"plg_system_debug","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_DEBUG_XML_DESCRIPTION","group":"","filename":"debug"}', '{"profile":"1","queries":"1","memory":"1","language_files":"1","language_strings":"1","strip-first":"1","strip-prefix":"","strip-suffix":""}', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(426, 'plg_system_log', 'plugin', 'log', 'system', 0, 1, 1, 1, '{"name":"plg_system_log","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_LOG_XML_DESCRIPTION","group":"","filename":"log"}', '', '', '', 0, '0000-00-00 00:00:00', 5, 0),
(427, 'plg_system_redirect', 'plugin', 'redirect', 'system', 0, 0, 1, 1, '{"name":"plg_system_redirect","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_REDIRECT_XML_DESCRIPTION","group":"","filename":"redirect"}', '', '', '', 0, '0000-00-00 00:00:00', 6, 0),
(428, 'plg_system_remember', 'plugin', 'remember', 'system', 0, 1, 1, 1, '{"name":"plg_system_remember","type":"plugin","creationDate":"April 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_REMEMBER_XML_DESCRIPTION","group":"","filename":"remember"}', '', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(429, 'plg_system_sef', 'plugin', 'sef', 'system', 0, 1, 1, 0, '{"name":"plg_system_sef","type":"plugin","creationDate":"December 2007","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEF_XML_DESCRIPTION","group":"","filename":"sef"}', '', '', '', 0, '0000-00-00 00:00:00', 8, 0),
(430, 'plg_system_logout', 'plugin', 'logout', 'system', 0, 1, 1, 1, '{"name":"plg_system_logout","type":"plugin","creationDate":"April 2009","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LOGOUT_XML_DESCRIPTION","group":"","filename":"logout"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(431, 'plg_user_contactcreator', 'plugin', 'contactcreator', 'user', 0, 0, 1, 0, '{"name":"plg_user_contactcreator","type":"plugin","creationDate":"August 2009","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTACTCREATOR_XML_DESCRIPTION","group":"","filename":"contactcreator"}', '{"autowebpage":"","category":"34","autopublish":"0"}', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(432, 'plg_user_joomla', 'plugin', 'joomla', 'user', 0, 1, 1, 0, '{"name":"plg_user_joomla","type":"plugin","creationDate":"December 2006","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '{"autoregister":"1","mail_to_user":"1","forceLogout":"1"}', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(433, 'plg_user_profile', 'plugin', 'profile', 'user', 0, 0, 1, 0, '{"name":"plg_user_profile","type":"plugin","creationDate":"January 2008","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_USER_PROFILE_XML_DESCRIPTION","group":"","filename":"profile"}', '{"register-require_address1":"1","register-require_address2":"1","register-require_city":"1","register-require_region":"1","register-require_country":"1","register-require_postal_code":"1","register-require_phone":"1","register-require_website":"1","register-require_favoritebook":"1","register-require_aboutme":"1","register-require_tos":"1","register-require_dob":"1","profile-require_address1":"1","profile-require_address2":"1","profile-require_city":"1","profile-require_region":"1","profile-require_country":"1","profile-require_postal_code":"1","profile-require_phone":"1","profile-require_website":"1","profile-require_favoritebook":"1","profile-require_aboutme":"1","profile-require_tos":"1","profile-require_dob":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(434, 'plg_extension_joomla', 'plugin', 'joomla', 'extension', 0, 1, 1, 1, '{"name":"plg_extension_joomla","type":"plugin","creationDate":"May 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_EXTENSION_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(435, 'plg_content_joomla', 'plugin', 'joomla', 'content', 0, 1, 1, 0, '{"name":"plg_content_joomla","type":"plugin","creationDate":"November 2010","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_JOOMLA_XML_DESCRIPTION","group":"","filename":"joomla"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(436, 'plg_system_languagecode', 'plugin', 'languagecode', 'system', 0, 0, 1, 0, '{"name":"plg_system_languagecode","type":"plugin","creationDate":"November 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_LANGUAGECODE_XML_DESCRIPTION","group":"","filename":"languagecode"}', '', '', '', 0, '0000-00-00 00:00:00', 10, 0),
(437, 'plg_quickicon_joomlaupdate', 'plugin', 'joomlaupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_joomlaupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_JOOMLAUPDATE_XML_DESCRIPTION","group":"","filename":"joomlaupdate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(438, 'plg_quickicon_extensionupdate', 'plugin', 'extensionupdate', 'quickicon', 0, 1, 1, 1, '{"name":"plg_quickicon_extensionupdate","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_QUICKICON_EXTENSIONUPDATE_XML_DESCRIPTION","group":"","filename":"extensionupdate"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(439, 'plg_captcha_recaptcha', 'plugin', 'recaptcha', 'captcha', 0, 0, 1, 0, '{"name":"plg_captcha_recaptcha","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.0","description":"PLG_CAPTCHA_RECAPTCHA_XML_DESCRIPTION","group":"","filename":"recaptcha"}', '{"public_key":"","private_key":"","theme":"clean"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(440, 'plg_system_highlight', 'plugin', 'highlight', 'system', 0, 1, 1, 0, '{"name":"plg_system_highlight","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SYSTEM_HIGHLIGHT_XML_DESCRIPTION","group":"","filename":"highlight"}', '', '', '', 0, '0000-00-00 00:00:00', 7, 0),
(441, 'plg_content_finder', 'plugin', 'finder', 'content', 0, 0, 1, 0, '{"name":"plg_content_finder","type":"plugin","creationDate":"December 2011","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_CONTENT_FINDER_XML_DESCRIPTION","group":"","filename":"finder"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(442, 'plg_finder_categories', 'plugin', 'categories', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_categories","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CATEGORIES_XML_DESCRIPTION","group":"","filename":"categories"}', '', '', '', 0, '0000-00-00 00:00:00', 1, 0),
(443, 'plg_finder_contacts', 'plugin', 'contacts', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_contacts","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTACTS_XML_DESCRIPTION","group":"","filename":"contacts"}', '', '', '', 0, '0000-00-00 00:00:00', 2, 0),
(444, 'plg_finder_content', 'plugin', 'content', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_content","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_CONTENT_XML_DESCRIPTION","group":"","filename":"content"}', '', '', '', 0, '0000-00-00 00:00:00', 3, 0),
(445, 'plg_finder_newsfeeds', 'plugin', 'newsfeeds', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_newsfeeds","type":"plugin","creationDate":"August 2011","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_NEWSFEEDS_XML_DESCRIPTION","group":"","filename":"newsfeeds"}', '', '', '', 0, '0000-00-00 00:00:00', 4, 0),
(447, 'plg_finder_tags', 'plugin', 'tags', 'finder', 0, 1, 1, 0, '{"name":"plg_finder_tags","type":"plugin","creationDate":"February 2013","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_FINDER_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(448, 'plg_twofactorauth_totp', 'plugin', 'totp', 'twofactorauth', 0, 0, 1, 0, '{"name":"plg_twofactorauth_totp","type":"plugin","creationDate":"August 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"PLG_TWOFACTORAUTH_TOTP_XML_DESCRIPTION","group":"","filename":"totp"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(449, 'plg_authentication_cookie', 'plugin', 'cookie', 'authentication', 0, 1, 1, 0, '{"name":"plg_authentication_cookie","type":"plugin","creationDate":"July 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_AUTH_COOKIE_XML_DESCRIPTION","group":"","filename":"cookie"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(450, 'plg_twofactorauth_yubikey', 'plugin', 'yubikey', 'twofactorauth', 0, 0, 1, 0, '{"name":"plg_twofactorauth_yubikey","type":"plugin","creationDate":"September 2013","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.2.0","description":"PLG_TWOFACTORAUTH_YUBIKEY_XML_DESCRIPTION","group":"","filename":"yubikey"}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(451, 'plg_search_tags', 'plugin', 'tags', 'search', 0, 1, 1, 0, '{"name":"plg_search_tags","type":"plugin","creationDate":"March 2014","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.0.0","description":"PLG_SEARCH_TAGS_XML_DESCRIPTION","group":"","filename":"tags"}', '{"search_limit":"50","show_tagged_items":"1"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(503, 'beez3', 'template', 'beez3', '', 0, 1, 1, 0, '{"name":"beez3","type":"template","creationDate":"25 November 2009","author":"Angie Radtke","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"a.radtke@derauftritt.de","authorUrl":"http:\\/\\/www.der-auftritt.de","version":"3.1.0","description":"TPL_BEEZ3_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"wrapperSmall":"53","wrapperLarge":"72","sitetitle":"","sitedescription":"","navposition":"center","templatecolor":"nature"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(504, 'hathor', 'template', 'hathor', '', 1, 1, 1, 0, '{"name":"hathor","type":"template","creationDate":"May 2010","author":"Andrea Tarr","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"hathor@tarrconsulting.com","authorUrl":"http:\\/\\/www.tarrconsulting.com","version":"3.0.0","description":"TPL_HATHOR_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"showSiteName":"0","colourChoice":"0","boldText":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(506, 'protostar', 'template', 'protostar', '', 0, 1, 1, 0, '{"name":"protostar","type":"template","creationDate":"4\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_PROTOSTAR_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(507, 'isis', 'template', 'isis', '', 1, 1, 1, 0, '{"name":"isis","type":"template","creationDate":"3\\/30\\/2012","author":"Kyle Ledbetter","copyright":"Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"","version":"1.0","description":"TPL_ISIS_XML_DESCRIPTION","group":"","filename":"templateDetails"}', '{"templateColor":"","logoFile":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(600, 'English (en-GB)', 'language', 'en-GB', '', 0, 1, 1, 1, '{"name":"English (en-GB)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.3","description":"en-GB site language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(601, 'English (en-GB)', 'language', 'en-GB', '', 1, 1, 1, 1, '{"name":"English (en-GB)","type":"language","creationDate":"2013-03-07","author":"Joomla! Project","copyright":"Copyright (C) 2005 - 2015 Open Source Matters. All rights reserved.","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.3","description":"en-GB administrator language","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(700, 'files_joomla', 'file', 'joomla', '', 0, 1, 1, 1, '{"name":"files_joomla","type":"file","creationDate":"December 2015","author":"Joomla! Project","copyright":"(C) 2005 - 2015 Open Source Matters. All rights reserved","authorEmail":"admin@joomla.org","authorUrl":"www.joomla.org","version":"3.4.8","description":"FILES_JOOMLA_XML_DESCRIPTION","group":""}', '', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10002, 'JDeveloper', 'component', 'com_jdeveloper', '', 1, 1, 0, 0, '{"name":"JDeveloper","type":"component","creationDate":"May 2014","author":"Tilo-Lars Flasche","copyright":"Tilo-Lars Flasche","authorEmail":"jcms.development@gmail.com","authorUrl":"www.joommaster.bplaced.org","version":"3.10.2.1","description":"COM_JDEVELOPER_XML_DESCRIPTION","group":""}', '{"delete_old_components":"0","userarchives":"1","delete_tables":"1","delete_fields":"1","add_component_name_to_table_name":"1","author":"Dr Kaushal Keraminiyage","author_email":"admin@confmgt.com","author_url":"http:\\/\\/www.confmgt.com","copyright":"Dr Kaushal Keraminiyage","license":"GNU General Public License version 2 or later"}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10003, 'com_confmgr', 'component', 'com_confmgr', '', 1, 1, 0, 0, '{"name":"com_confmgr","type":"component","creationDate":"2015 june 11","author":"dr kaushal keraminiyage","copyright":"dr kaushal keraminiyage","authorEmail":"","authorUrl":"","version":"0.0.5","description":"COM_CONFMGR_XML_DESCRIPTION","group":"","filename":"confmgr"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10004, 'plg_system_jsntplframework', 'plugin', 'jsntplframework', 'system', 0, 1, 1, 1, '{"name":"plg_system_jsntplframework","type":"plugin","creationDate":"11\\/10\\/2014","author":"JoomlaShine.com","copyright":"Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.","authorEmail":"admin@joomlashine.com","authorUrl":"www.joomlashine.com","version":"","description":"","group":"","filename":"jsntplframework"}', '{}', '', '', 0, '0000-00-00 00:00:00', 9999, 0),
(10005, 'jsn_teki_pro', 'template', 'jsn_teki_pro', '', 0, 1, 1, 0, '{"name":"jsn_teki_pro","type":"template","creationDate":"11\\/10\\/2014","author":"JoomlaShine.com","copyright":"Copyright (c) 2008 - 2013 - JoomlaShine.com","authorEmail":"support@joomlashine.com","authorUrl":"http:\\/\\/www.joomlashine.com","version":"3.0.4","description":"TPL_JSN_TEKI_PRO_XML_DESCRIPTION","group":"jsntemplate","filename":"templateDetails"}', '[]', 'jsntemplate', '', 0, '0000-00-00 00:00:00', 0, 0),
(10006, 'com_confmgt', 'component', 'com_confmgt', '', 1, 1, 0, 0, '{"name":"com_confmgr","type":"component","creationDate":"2015 june 11","author":"dr kaushal keraminiyage","copyright":"dr kaushal keraminiyage","authorEmail":"","authorUrl":"","version":"0.0.5","description":"COM_CONFMGR_XML_DESCRIPTION","group":"","filename":"confmgr"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10007, 'wt_anema_free', 'template', 'wt_anema_free', '', 0, 1, 1, 0, '{"name":"wt_anema_free","type":"template","creationDate":"Dec 2015","author":"WarpTheme","copyright":"Copyright (C) WarpTheme","authorEmail":"support@warptheme.com","authorUrl":"http:\\/\\/www.warptheme.com","version":"1.0.0","description":"\\n\\t\\t\\n\\t\\t<div class=\\"overview-header\\" style=\\"text-align: left;\\">\\n\\t\\t\\t<h2>\\n\\t\\t\\t  <small style=\\"display: block;\\">Business Joomla template - <strong>WT Anema<\\/strong>.<\\/small><\\/h2>\\n\\t\\t\\t<p>Anema is a flexible and well crafted Joomla template that offers a range of features, pre-design blocks, a bunch of components and plugins. Anema allows you to build a unique and solid website that functions well on desktop, tablet and mobile.<\\/p>\\n\\t\\t\\t<p>Help and Support: Visit <a href=\\"http:\\/\\/warptheme.com\\/\\" target=\\"_blank\\">WarpTheme<\\/a><\\/p>\\n\\t\\t\\t<\\/div>\\n\\t\\t\\n\\t","group":"","filename":"templateDetails"}', '{"config":""}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10008, 'JCMS Library', 'library', 'jcms', '', 0, 1, 1, 0, '{"name":"JCMS Library","type":"library","creationDate":"May 2014","author":"Tilo-Lars Flasche","copyright":"Tilo-Lars Flasche","authorEmail":"jcms.development@gmail.com","authorUrl":"www.joommaster.bplaced.org","version":"3.0.1","description":"LIB_JCMS_XML_DESCRIPTION","group":"","filename":"jcms"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10009, 'jdeveloper', 'package', 'pkg_jdeveloper', '', 0, 1, 1, 0, '{"name":"jdeveloper","type":"package","creationDate":"Jul 2015","author":"Unknown","copyright":"Copyright (C) 2014, Tilo-Lars Flasche. All rights reserved.","authorEmail":"","authorUrl":"","version":"3.10.2.1","description":"JDeveloper","group":"","filename":"pkg_jdeveloper"}', '{}', '', '', 0, '0000-00-00 00:00:00', 0, 0),
(10010, 'Master Bootstrap', 'template', 'masterbootstrap', '', 0, 1, 1, 0, '{"name":"Master Bootstrap","type":"template","creationDate":"05 NOV 2015","author":"Gonzalo Suez","copyright":"Copyright \\u00a9 2013 - 2015 gsuez.cl","authorEmail":"info@gsuez.cl","authorUrl":"http:\\/\\/www.gsuez.cl","version":"Stable 1.2.1","description":" \\n\\t\\t<h1>Master Bootstrap for Joomla! 3.0<\\/h1>\\n\\t\\t<p>Un template para trabajar desde 0 con todas las ventajas de Bootstrap v.3.3.5<\\/p>\\n\\t\\t<p>A template to work from scratch, with all the advantages of Bootstrap.<\\/p>\\n\\t\\t<p>Created by <a href=\\"http:\\/\\/www.gsuez.cl\\" target=\\"_blank\\">Gonzalo Suez <\\/a><\\/p>\\n\\t","group":"","filename":"templateDetails"}', '{"leftColumnWidth":"3","rightColumnWidth":"3","frontpageshow":"1","modernizr":"0","fontawesome":"0","pie":"0","logo_link":"index.php","logo_width":"173","logo_height":"26"}', '', '', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_filters`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_filters` (
  `filter_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL,
  `created_by_alias` varchar(255) NOT NULL,
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `map_count` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `params` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links` (
  `link_id` int(10) unsigned NOT NULL,
  `url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `indexdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `md5sum` varchar(32) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `state` int(5) DEFAULT '1',
  `access` int(5) DEFAULT '0',
  `language` varchar(8) NOT NULL,
  `publish_start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `list_price` double unsigned NOT NULL DEFAULT '0',
  `sale_price` double unsigned NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL,
  `object` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms0`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms0` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms1`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms1` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms2`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms2` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms3`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms3` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms4`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms4` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms5`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms5` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms6`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms6` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms7`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms7` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms8`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms8` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_terms9`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_terms9` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termsa`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termsa` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termsb`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termsb` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termsc`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termsc` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termsd`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termsd` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termse`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termse` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_links_termsf`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_links_termsf` (
  `link_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `weight` float unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_taxonomy`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_taxonomy` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `state` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_finder_taxonomy`
--

INSERT INTO `ciudq_finder_taxonomy` (`id`, `parent_id`, `title`, `state`, `access`, `ordering`) VALUES
(1, 0, 'ROOT', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_taxonomy_map`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_taxonomy_map` (
  `link_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_terms`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_terms` (
  `term_id` int(10) unsigned NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `soundex` varchar(75) NOT NULL,
  `links` int(10) NOT NULL DEFAULT '0',
  `language` char(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_terms_common`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_terms_common` (
  `term` varchar(75) NOT NULL,
  `language` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_finder_terms_common`
--

INSERT INTO `ciudq_finder_terms_common` (`term`, `language`) VALUES
('a', 'en'),
('about', 'en'),
('after', 'en'),
('ago', 'en'),
('all', 'en'),
('am', 'en'),
('an', 'en'),
('and', 'en'),
('ani', 'en'),
('any', 'en'),
('are', 'en'),
('aren''t', 'en'),
('as', 'en'),
('at', 'en'),
('be', 'en'),
('but', 'en'),
('by', 'en'),
('for', 'en'),
('from', 'en'),
('get', 'en'),
('go', 'en'),
('how', 'en'),
('if', 'en'),
('in', 'en'),
('into', 'en'),
('is', 'en'),
('isn''t', 'en'),
('it', 'en'),
('its', 'en'),
('me', 'en'),
('more', 'en'),
('most', 'en'),
('must', 'en'),
('my', 'en'),
('new', 'en'),
('no', 'en'),
('none', 'en'),
('not', 'en'),
('noth', 'en'),
('nothing', 'en'),
('of', 'en'),
('off', 'en'),
('often', 'en'),
('old', 'en'),
('on', 'en'),
('onc', 'en'),
('once', 'en'),
('onli', 'en'),
('only', 'en'),
('or', 'en'),
('other', 'en'),
('our', 'en'),
('ours', 'en'),
('out', 'en'),
('over', 'en'),
('page', 'en'),
('she', 'en'),
('should', 'en'),
('small', 'en'),
('so', 'en'),
('some', 'en'),
('than', 'en'),
('thank', 'en'),
('that', 'en'),
('the', 'en'),
('their', 'en'),
('theirs', 'en'),
('them', 'en'),
('then', 'en'),
('there', 'en'),
('these', 'en'),
('they', 'en'),
('this', 'en'),
('those', 'en'),
('thus', 'en'),
('time', 'en'),
('times', 'en'),
('to', 'en'),
('too', 'en'),
('true', 'en'),
('under', 'en'),
('until', 'en'),
('up', 'en'),
('upon', 'en'),
('use', 'en'),
('user', 'en'),
('users', 'en'),
('veri', 'en'),
('version', 'en'),
('very', 'en'),
('via', 'en'),
('want', 'en'),
('was', 'en'),
('way', 'en'),
('were', 'en'),
('what', 'en'),
('when', 'en'),
('where', 'en'),
('whi', 'en'),
('which', 'en'),
('who', 'en'),
('whom', 'en'),
('whose', 'en'),
('why', 'en'),
('wide', 'en'),
('will', 'en'),
('with', 'en'),
('within', 'en'),
('without', 'en'),
('would', 'en'),
('yes', 'en'),
('yet', 'en'),
('you', 'en'),
('your', 'en'),
('yours', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_tokens`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_tokens` (
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '1',
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `language` char(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_tokens_aggregate`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_tokens_aggregate` (
  `term_id` int(10) unsigned NOT NULL,
  `map_suffix` char(1) NOT NULL,
  `term` varchar(75) NOT NULL,
  `stem` varchar(75) NOT NULL,
  `common` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phrase` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `term_weight` float unsigned NOT NULL,
  `context` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `context_weight` float unsigned NOT NULL,
  `total_weight` float unsigned NOT NULL,
  `language` char(3) NOT NULL DEFAULT ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_finder_types`
--

CREATE TABLE IF NOT EXISTS `ciudq_finder_types` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `mime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_components`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_components` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(100) NOT NULL,
  `version` varchar(20) NOT NULL,
  `site` tinyint(1) DEFAULT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_jdeveloper_components`
--

INSERT INTO `ciudq_jdeveloper_components` (`id`, `ordering`, `name`, `version`, `site`, `display_name`, `description`, `params`, `created_by`) VALUES
(1, 0, 'confmgr', '0.0.5', 1, 'ConfMgr', 'Conference Management Made Easy', '{"languages":["en-GB"],"copyright":"Dr Kaushal Keraminiyage","license":"GPL V2 or later","author":"Dr Kaushal Keraminiyage","author_email":"admin@confmgt.com","author_url":"http:\\/\\/www.confmgt.com"}', 580);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_fields`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_fields` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(40) NOT NULL,
  `table` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `dbtype` varchar(10) NOT NULL,
  `rule` varchar(50) NOT NULL,
  `label` varchar(40) NOT NULL,
  `description` tinytext,
  `maxlength` varchar(20) NOT NULL,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_jdeveloper_fields`
--

INSERT INTO `ciudq_jdeveloper_fields` (`id`, `ordering`, `name`, `table`, `type`, `dbtype`, `rule`, `label`, `description`, `maxlength`, `params`, `created_by`) VALUES
(1, 1, 'abstract_id', 1, 'hidden', 'INT', '', 'abstract_id', 'Absrtact ID to link the paper to the absrtact', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"0","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(2, 2, 'full_paper_id', 1, 'hidden', 'INT', '', 'full_paper_id', 'Full paper ID to link with the full paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(3, 3, 'camera_ready_paper_id', 1, 'hidden', 'INT', '', 'camera_ready_paper_id', 'Camera ready paper ID to link the paper with the Camera ready paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(4, 4, 'presentation_id', 1, 'hidden', 'INT', '', 'presentation_id', 'Linking Presentation to the Paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(5, 14, 'created_by', 1, 'hidden', 'INT', '', 'created_by', 'User who has created the paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(6, 5, 'title', 1, 'text', 'VARCHAR', '', 'Title', 'Title of the paper', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(7, 6, 'paper_id', 2, 'hidden', 'INT', '', 'Paper ID ', 'Paper ID to link the Abstract to the Paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(8, 7, 'abstract', 2, 'textarea', 'LONGTEXT', '', 'Abstract', 'The abstract for the paper', '0', '{"filter":"RAW","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(9, 8, 'keywords', 2, 'text', 'VARCHAR', '', 'Keywords', 'Keywords for the abstract', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(10, 9, 'theme', 2, 'integer', 'INT', '', 'Theme', 'Theme of the Abstract', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(11, 10, 'rev1ew_outcome', 2, 'integer', 'INT', '', 'Review outcome', 'Review outcome for this abstract', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(12, 11, 'rev1ew_comments', 2, 'textarea', 'LONGTEXT', '', 'Review comments', 'Review comments for this abstract as posted by the theme leader', '0', '{"filter":"RAW","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(13, 12, 'type_of_submission', 2, 'integer', 'INT', '', 'Type of Submission', 'Type of Submission, as in the orginal(0), resubmission(1),revision(2)  ', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(14, 13, 'student_paper', 1, 'radio', 'BOOLEAN', '', 'Student Paper', 'Is this a student paper (yes:1, No:0)', '3', '{"filter":"BOOLEAN","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(15, 16, 'full_paper', 3, 'file', 'TEXT', '', 'Full Paper', 'Full paper upload', '255', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(16, 15, 'paper_id', 3, 'hidden', 'INT', '', 'Paper ID', 'This is the Paper ID linking the full paper to the paper table', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(17, 17, 'rev1ew_outcome', 3, 'integer', 'INT', '', 'Review outcome', 'Full paper review outcome', '11', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(18, 18, 'rev1ew_comments', 3, 'textarea', 'LONGTEXT', '', 'Review comments', 'Full paper review comments', '0', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(19, 19, 'type_of_submission', 3, 'integer', 'INT', '', 'Type of Submission', 'Original (0), Resubmission (1), Revision (2)', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(20, 20, 'paper_id', 4, 'integer', 'INT', '', 'Paper ID', 'Paper ID to link the camera ready paper', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(21, 21, 'camera_ready_paper', 4, 'text', 'VARCHAR', '', 'Camera ready paper', 'Upload camera ready paper', '255', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(22, 23, 'approved', 4, 'radio', 'BOOLEAN', '', 'Approved', 'Is the camera ready paper approved by the theme leader? Yes: 1, No:0', '3', '{"filter":"BOOLEAN","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(23, 22, 'type_of_submission', 4, 'integer', 'INT', '', 'Type of Submission', 'Original (0), Resubmission (1), Revision (2)', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(24, 24, 'paper_id', 5, 'hidden', 'INT', '', 'Paper ID', 'Paper ID to link with', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(25, 25, 'presentation', 5, 'file', 'VARCHAR', '', 'Presentation', 'Presentation file', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(26, 26, 'type_of_submission', 5, 'integer', 'INT', '', 'Type of Submission', 'original (0), Resubmit (1), Revision (2)', '11', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(27, 27, 'approved', 5, 'radio', 'BOOLEAN', 'boolean', 'Approved', 'Is the presentation approved by the theme leader?', '3', '{"filter":"BOOLEAN","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(28, 29, 'title', 6, 'text', 'VARCHAR', '', 'Title', 'Title of the theme', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(29, 30, 'description', 6, 'textarea', 'LONGTEXT', '', 'Description', 'Description of the theme', '0', '{"filter":"RAW","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(30, 28, 'user_id', 6, 'radio', 'INT', '', 'User ID', 'Theme leaders user ID', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(31, 31, 'title', 7, 'text', 'VARCHAR', '', 'Title', 'Title of the Author', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(32, 32, 'first_name', 7, 'text', 'VARCHAR', '', 'First Name', 'First name of the author ', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(33, 33, 'surname', 7, 'text', 'VARCHAR', '', 'Surname', 'Surname of the author', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(34, 34, 'email', 7, 'email', 'VARCHAR', 'email', 'Email', 'Email of the Author', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(35, 35, 'affiliation', 7, 'text', 'VARCHAR', '', 'Affiliation', 'Affiliation of the author (Institutte)', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(36, 36, 'country', 7, 'text', 'VARCHAR', '', 'Country', 'Country of the author', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(37, 37, 'attending', 7, 'radio', 'BOOLEAN', 'boolean', 'Attending', 'Is this author attending the conference? No:0 Yes:1', '3', '{"filter":"BOOLEAN","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(38, 38, 'title', 8, 'text', 'VARCHAR', '', 'Title', 'Title of the Reviewer', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(39, 39, 'first_name', 8, 'text', 'VARCHAR', '', 'First Name', 'First name of the reviewer', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(40, 40, 'surname', 8, 'text', 'VARCHAR', '', 'Surname', 'Surname of the reviewer', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(41, 41, 'email', 8, 'email', 'VARCHAR', 'email', 'Email', 'Email of the reviewer', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(42, 42, 'affiliation', 8, 'text', 'VARCHAR', '', 'Affiliation', 'Affiliation of the reviewer (Institute)', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(43, 43, 'country', 8, 'text', 'VARCHAR', '', 'Country', 'Country of the Reviewer', '255', '{"filter":"STRING","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(44, 44, 'outcome', 9, 'radio', 'INT', '', 'Outcome', 'Suggested outcome\r\n(0) - Not complete\r\n(1) - Accept as it is\r\n(2) - Minor changes required\r\n(3) - Resubmission required\r\n(4) - Reject', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(45, 45, 'comments_to_author', 9, 'textarea', 'LONGTEXT', '', 'Comment to Author', 'Visible comments to the author', '0', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(46, 46, 'comments_to_leader', 9, 'textarea', 'LONGTEXT', '', 'Comment to the Theme Leader', 'Confidential comments to the theme leader', '0', '{"filter":"","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(47, 47, 'mode', 9, 'integer', 'INT', '', 'Mode', 'Mode of the review (0) - Abstract (1) - Full', '3', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(48, 48, 'paper_id', 10, 'hidden', 'INT', '', 'Paper ID', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(49, 49, 'author_id', 10, 'hidden', 'INT', '', 'Author ID', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(50, 50, 'rev1ewer_id', 11, 'hidden', 'INT', '', 'Reviewer ID', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(51, 51, 'paper_id', 11, 'hidden', 'INT', '', 'Paper ID', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(52, 52, 'author_id', 12, 'hidden', 'INT', '', 'Author ID', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580),
(53, 53, 'amount', 12, 'integer', 'INT', '', 'Amount', '', '11', '{"filter":"INTEGER","default":"0","class":"inputbox","sortable":"1","readonly":"0","disabled":"0","required":"1","frontend_list":"1","frontend_item":"1","searchable":"0","listfilter":"0"}', 580);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_formfields`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_formfields` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `name` varchar(40) NOT NULL,
  `source` text NOT NULL,
  `params` text NOT NULL COMMENT 'JSON encoded params'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_formrules`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_formrules` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `name` varchar(40) NOT NULL,
  `source` text NOT NULL,
  `params` text NOT NULL COMMENT 'JSON encoded params'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_forms`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_forms` (
  `id` int(11) unsigned NOT NULL,
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `level` int(11) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `relation` varchar(50) NOT NULL DEFAULT '',
  `tag` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL COMMENT 'Field name',
  `type` varchar(50) NOT NULL COMMENT 'Field type',
  `label` varchar(50) NOT NULL COMMENT 'Field label',
  `description` mediumtext NOT NULL COMMENT 'Field Description',
  `default` varchar(100) NOT NULL COMMENT 'Field default value',
  `class` varchar(100) NOT NULL COMMENT 'Field CSS class',
  `maxlength` int(10) NOT NULL COMMENT 'Field size',
  `validation` varchar(50) NOT NULL COMMENT 'Field validation',
  `filter` varchar(50) NOT NULL COMMENT 'Field filter',
  `disabled` tinyint(1) NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `options` text NOT NULL,
  `attributes` text NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_jdeveloper_forms`
--

INSERT INTO `ciudq_jdeveloper_forms` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `relation`, `tag`, `name`, `type`, `label`, `description`, `default`, `class`, `maxlength`, `validation`, `filter`, `disabled`, `readonly`, `required`, `options`, `attributes`, `alias`, `ordering`, `created_by`, `params`) VALUES
(1, 0, 0, 1, 0, '', '', '', 'Root', '', '', '', '', '', 0, '', '', 0, 0, 0, '', '', 'root', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_libraries`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_libraries` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `name` varchar(40) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `version` varchar(20) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_modules`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_modules` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(40) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `version` varchar(20) NOT NULL,
  `table` varchar(100) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_overrides`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_overrides` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `item_id` int(11) NOT NULL COMMENT 'prmary key of the item',
  `type` varchar(50) NOT NULL COMMENT 'extension / element type',
  `name` varchar(255) NOT NULL COMMENT 'template name',
  `source` mediumtext NOT NULL COMMENT 'template override',
  `params` text NOT NULL COMMENT 'JSON encoded params'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_plugins`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_plugins` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(40) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `version` varchar(20) NOT NULL,
  `folder` varchar(40) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_tables`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_tables` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(40) NOT NULL,
  `component` int(11) NOT NULL,
  `plural` varchar(40) NOT NULL,
  `singular` varchar(40) NOT NULL,
  `pk` varchar(40) NOT NULL,
  `jfields` text NOT NULL COMMENT 'JSON encoded jfields',
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_jdeveloper_tables`
--

INSERT INTO `ciudq_jdeveloper_tables` (`id`, `ordering`, `name`, `component`, `plural`, `singular`, `pk`, `jfields`, `params`, `created_by`) VALUES
(1, 1, 'paper', 1, 'papers', 'paper', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(2, 2, 'abstract', 1, 'abstracts', 'abstract', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"1","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(3, 3, 'full_paper', 1, 'full_papers', 'full_paper', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"1","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(4, 4, 'camera_ready_paper', 1, 'camera_ready_papers', 'camera_ready_paper', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"1","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(5, 5, 'presentation', 1, 'presentations', 'presentation', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"1","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(6, 6, 'theme', 1, 'themes', 'theme', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"1","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(7, 7, 'author', 1, 'authors', 'author', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(8, 8, 'rev1ewer', 1, 'rev1ewers', 'rev1ewer', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(9, 9, 'rev1ew', 1, 'rev1ews', 'rev1ew', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"1","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"1","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(10, 10, 'author_for_paper', 1, 'authors_for_paper', 'author_for_paper', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(11, 11, 'rev1ewer_for_paper', 1, 'rev1ewers_for_paper', 'rev1ewer_for_paper', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580),
(12, 12, 'payment', 1, 'payments', 'payment', 'id', '{"ordering":"1","alias":"0","catid":"0","published":"1","checked_out":"1","created":"1","created_by":"0","created_by_alias":"0","modified":"1","modified_by":"0","version":"1","hits":"0","publish_up":"0","publish_down":"0","params":"1","access":"0","language":"0","images":"0","tags":"0","metadata":"0","metakey":"0","metadesc":"0","asset_id":"0"}', '{"frontend":"1","frontend_categories":"0","frontend_feed":"0","frontend_details":"1","frontend_edit":"1"}', 580);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_jdeveloper_templates`
--

CREATE TABLE IF NOT EXISTS `ciudq_jdeveloper_templates` (
  `id` int(11) NOT NULL COMMENT 'Primary key',
  `ordering` smallint(5) NOT NULL COMMENT 'Table ordering',
  `name` varchar(40) NOT NULL,
  `version` varchar(20) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `description` tinytext,
  `params` text NOT NULL COMMENT 'JSON encoded params',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_languages`
--

CREATE TABLE IF NOT EXISTS `ciudq_languages` (
  `lang_id` int(11) unsigned NOT NULL,
  `lang_code` char(7) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_native` varchar(50) NOT NULL,
  `sef` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `sitename` varchar(1024) NOT NULL DEFAULT '',
  `published` int(11) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_languages`
--

INSERT INTO `ciudq_languages` (`lang_id`, `lang_code`, `title`, `title_native`, `sef`, `image`, `description`, `metakey`, `metadesc`, `sitename`, `published`, `access`, `ordering`) VALUES
(1, 'en-GB', 'English (UK)', 'English (UK)', 'en', 'en', '', '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_menu`
--

CREATE TABLE IF NOT EXISTS `ciudq_menu` (
  `id` int(11) NOT NULL,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_menu`
--

INSERT INTO `ciudq_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 115, 0, '*', 0),
(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1),
(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1),
(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1),
(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1),
(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1),
(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 29, 34, 0, '*', 1),
(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 30, 31, 0, '*', 1),
(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 32, 33, 0, '*', 1),
(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 35, 40, 0, '*', 1),
(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 36, 37, 0, '*', 1),
(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 38, 39, 0, '*', 1),
(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 41, 46, 0, '*', 1),
(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 42, 43, 0, '*', 1),
(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 44, 45, 0, '*', 1),
(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 53, 54, 0, '*', 1),
(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 49, 50, 0, '*', 1),
(21, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 47, 48, 0, '*', 1),
(22, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 0, 1, 1, 28, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 51, 52, 0, '*', 1),
(101, 'mainmenu', 'Home', 'home', '', 'home', 'index.php?option=com_content&view=category&layout=blog&id=9', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"layout_type":"blog","show_category_title":"0","show_description":"","show_description_image":"","maxLevel":"","show_empty_categories":"","show_no_articles":"","show_subcat_desc":"","show_cat_num_articles":"","page_subheading":"","num_leading_articles":"4","num_intro_articles":"0","num_columns":"1","num_links":"2","multi_column_order":"1","show_subcategory_content":"","orderby_pri":"","orderby_sec":"rdate","order_date":"published","show_pagination":"2","show_pagination_results":"1","show_title":"","link_titles":"","show_intro":"","show_category":"0","link_category":"","show_parent_category":"","link_parent_category":"","info_bloc_position":"0","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"0","show_item_navigation":"","show_vote":"","show_readmore":"","show_readmore_title":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"0","show_noauth":"","show_feed_link":"1","feed_summary":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 25, 26, 1, '*', 0),
(102, 'bottommenu', 'Author Login', 'login', '', 'login', 'index.php?option=com_users&view=login', 'component', 1, 1, 1, 25, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"login_redirect_url":"index.php?Itemid=101","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 55, 56, 0, '*', 0),
(103, 'authormenu', 'Change Password', 'change-password', '', 'change-password', 'index.php?option=com_users&view=profile&layout=edit', 'component', 1, 1, 1, 25, 0, '0000-00-00 00:00:00', 0, 2, '', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 21, 22, 0, '*', 0),
(104, 'authormenu', 'Create a Post', 'create-a-post', '', 'create-a-post', 'index.php?option=com_content&view=form&layout=edit', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 3, '', 0, '{"enable_category":"1","catid":"9","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 11, 12, 0, '*', 0),
(106, 'authormenu', 'Site Administrator', '2012-01-04-15-46-42', '', '2012-01-04-15-46-42', 'administrator', 'url', 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 1, 3, '', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1}', 19, 20, 0, '*', 0),
(107, 'authormenu', 'Log out', 'log-out', '', 'log-out', 'index.php?option=com_users&view=login', 'component', 1, 1, 1, 25, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"login_redirect_url":"","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 23, 24, 0, '*', 0),
(108, 'mainmenu', 'About', 'about', '', 'about', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","info_block_position":"0","show_category":"0","link_category":"0","show_parent_category":"","link_parent_category":"","show_author":"0","link_author":"","show_create_date":"0","show_modify_date":"","show_publish_date":"0","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"0","show_noauth":"","urls_position":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 27, 28, 0, '*', 0),
(109, 'authormenu', 'Working on Your Site', 'working-on-your-site', '', 'working-on-your-site', 'index.php?option=com_content&view=article&id=2', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"show_title":"","link_titles":"","show_intro":"","show_category":"","link_category":"","show_parent_category":"","link_parent_category":"","show_author":"","link_author":"","show_create_date":"","show_modify_date":"","show_publish_date":"","show_item_navigation":"","show_vote":"","show_icons":"","show_print_icon":"","show_email_icon":"","show_hits":"","show_noauth":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 13, 18, 0, '*', 0),
(111, 'menu', 'com_tags', 'com-tags', '', 'com-tags', 'index.php?option=com_tags', 'component', 0, 1, 1, 29, 0, '0000-00-00 00:00:00', 0, 1, 'class:tags', 0, '', 57, 58, 0, '', 1),
(112, 'main', 'com_postinstall', 'Post-installation messages', '', 'Post-installation messages', 'index.php?option=com_postinstall', 'component', 0, 1, 1, 32, 0, '0000-00-00 00:00:00', 0, 1, 'class:postinstall', 0, '', 59, 60, 0, '*', 1),
(113, 'authormenu', 'Site Settings', 'site-settings', '', 'working-on-your-site/site-settings', 'index.php?option=com_config&view=config&controller=config.display.config', 'component', 1, 109, 2, 23, 0, '0000-00-00 00:00:00', 0, 6, '', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 14, 15, 0, '*', 0),
(114, 'authormenu', 'Template Settings', 'template-settings', '', 'working-on-your-site/template-settings', 'index.php?option=com_config&view=templates&controller=config.display.templates', 'component', 1, 109, 2, 23, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 16, 17, 0, '*', 0),
(115, 'mainmenu', 'Author Login', 'author-login', '', 'author-login', 'index.php?option=com_users&view=login', 'component', 1, 1, 1, 25, 0, '0000-00-00 00:00:00', 0, 1, '', 0, '{"login_redirect_url":"","logindescription_show":"1","login_description":"","login_image":"","logout_redirect_url":"","logoutdescription_show":"1","logout_description":"","logout_image":"","menu-anchor_title":"","menu-anchor_css":"","menu_image":"","menu_text":1,"page_title":"","show_page_heading":0,"page_heading":"","pageclass_sfx":"","menu-meta_description":"","menu-meta_keywords":"","robots":"","secure":0}', 61, 62, 0, '*', 0),
(145, 'main', 'Confmgr', 'confmgr', '', 'confmgr', 'index.php?option=com_confmgr', 'component', 0, 1, 1, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 63, 88, 0, '', 1),
(146, 'main', 'papers', 'papers', '', 'confmgr/papers', 'index.php?option=com_confmgr&view=papers', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 64, 65, 0, '', 1),
(147, 'main', 'abstracts', 'abstracts', '', 'confmgr/abstracts', 'index.php?option=com_confmgr&view=abstracts', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 66, 67, 0, '', 1),
(148, 'main', 'full_papers', 'full-papers', '', 'confmgr/full-papers', 'index.php?option=com_confmgr&view=full_papers', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 68, 69, 0, '', 1),
(149, 'main', 'camera_ready_papers', 'camera-ready-papers', '', 'confmgr/camera-ready-papers', 'index.php?option=com_confmgr&view=camera_ready_papers', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 70, 71, 0, '', 1),
(150, 'main', 'presentations', 'presentations', '', 'confmgr/presentations', 'index.php?option=com_confmgr&view=presentations', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 72, 73, 0, '', 1),
(151, 'main', 'themes', 'themes', '', 'confmgr/themes', 'index.php?option=com_confmgr&view=themes', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 74, 75, 0, '', 1),
(152, 'main', 'authors', 'authors', '', 'confmgr/authors', 'index.php?option=com_confmgr&view=authors', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 76, 77, 0, '', 1),
(153, 'main', 'rev1ewers', 'rev1ewers', '', 'confmgr/rev1ewers', 'index.php?option=com_confmgr&view=rev1ewers', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 78, 79, 0, '', 1),
(154, 'main', 'rev1ews', 'rev1ews', '', 'confmgr/rev1ews', 'index.php?option=com_confmgr&view=rev1ews', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 80, 81, 0, '', 1),
(155, 'main', 'authors_for_paper', 'authors-for-paper', '', 'confmgr/authors-for-paper', 'index.php?option=com_confmgr&view=authors_for_paper', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 82, 83, 0, '', 1),
(156, 'main', 'rev1ewers_for_paper', 'rev1ewers-for-paper', '', 'confmgr/rev1ewers-for-paper', 'index.php?option=com_confmgr&view=rev1ewers_for_paper', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 84, 85, 0, '', 1),
(157, 'main', 'payments', 'payments', '', 'confmgr/payments', 'index.php?option=com_confmgr&view=payments', 'component', 0, 145, 2, 10003, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '', 86, 87, 0, '', 1),
(158, 'main', 'JDeveloper', 'jdeveloper', '', 'jdeveloper', 'index.php?option=com_jdeveloper', 'component', 0, 1, 1, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 89, 114, 0, '', 1),
(159, 'main', 'JDeveloper', 'jdeveloper', '', 'jdeveloper/jdeveloper', 'index.php?option=com_jdeveloper&view=cpanel', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 90, 91, 0, '', 1),
(160, 'main', 'Components', 'components', '', 'jdeveloper/components', 'index.php?option=com_jdeveloper&view=components', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 92, 93, 0, '', 1),
(161, 'main', 'Modules', 'modules', '', 'jdeveloper/modules', 'index.php?option=com_jdeveloper&view=modules', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 94, 95, 0, '', 1),
(162, 'main', 'Templates', 'templates', '', 'jdeveloper/templates', 'index.php?option=com_jdeveloper&view=templates', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 96, 97, 0, '', 1),
(163, 'main', 'Plugins', 'plugins', '', 'jdeveloper/plugins', 'index.php?option=com_jdeveloper&view=plugins', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 98, 99, 0, '', 1),
(164, 'main', 'Packages', 'packages', '', 'jdeveloper/packages', 'index.php?option=com_jdeveloper&view=packages', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 100, 101, 0, '', 1),
(165, 'main', 'Libraries', 'libraries', '', 'jdeveloper/libraries', 'index.php?option=com_jdeveloper&view=libraries', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 102, 103, 0, '', 1),
(166, 'main', 'Forms', 'forms', '', 'jdeveloper/forms', 'index.php?option=com_jdeveloper&view=forms', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 104, 105, 0, '', 1),
(167, 'main', 'Formfields', 'formfields', '', 'jdeveloper/formfields', 'index.php?option=com_jdeveloper&view=formfields', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 106, 107, 0, '', 1),
(168, 'main', 'Formrules', 'formrules', '', 'jdeveloper/formrules', 'index.php?option=com_jdeveloper&view=formrules', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 108, 109, 0, '', 1),
(169, 'main', 'Extensions', 'extensions', '', 'jdeveloper/extensions', 'index.php?option=com_jdeveloper&view=extensions', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 110, 111, 0, '', 1),
(170, 'main', 'Import', 'import', '', 'jdeveloper/import', 'index.php?option=com_jdeveloper&view=import', 'component', 0, 158, 2, 10002, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 112, 113, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_menu_types`
--

CREATE TABLE IF NOT EXISTS `ciudq_menu_types` (
  `id` int(10) unsigned NOT NULL,
  `menutype` varchar(24) NOT NULL,
  `title` varchar(48) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_menu_types`
--

INSERT INTO `ciudq_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'authormenu', 'Author Menu', ''),
(3, 'bottommenu', 'Bottom Menu', '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_messages`
--

CREATE TABLE IF NOT EXISTS `ciudq_messages` (
  `message_id` int(10) unsigned NOT NULL,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `ciudq_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_modules`
--

CREATE TABLE IF NOT EXISTS `ciudq_modules` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(100) NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) NOT NULL DEFAULT '',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_modules`
--

INSERT INTO `ciudq_modules` (`id`, `asset_id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(1, 0, 'Main Menu', '', '', 1, 'position-1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_menu', 1, 0, '{"menutype":"mainmenu","base":"","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":" nav-pills","window_open":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(2, 0, 'Login', '', '', 1, 'login', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_login', 1, 1, '', 1, '*'),
(3, 0, 'Popular Articles', '', '', 1, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_popular', 3, 1, '{"count":"5","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1","module_tag":"div","bootstrap_size":"6","header_tag":"h3","header_class":"","style":"0"}', 1, '*'),
(4, 0, 'Recently Added Articles', '', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_latest', 3, 1, '{"count":"5","ordering":"c_dsc","catid":"","user_id":"0","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1","module_tag":"div","bootstrap_size":"6","header_tag":"h3","header_class":"","style":"0"}', 1, '*'),
(8, 0, 'Toolbar', '', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_toolbar', 3, 1, '', 1, '*'),
(9, 0, 'Quick Icons', '', '', 1, 'icon', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_quickicon', 3, 1, '', 1, '*'),
(10, 0, 'Logged-in Users', '', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_logged', 3, 1, '{"count":"5","name":"1","layout":"_:default","moduleclass_sfx":"","cache":"0","automatic_title":"1","module_tag":"div","bootstrap_size":"6","header_tag":"h3","header_class":"","style":"0"}', 1, '*'),
(12, 0, 'Admin Menu', '', '', 1, 'menu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_menu', 3, 1, '{"layout":"","moduleclass_sfx":"","shownew":"1","showhelp":"1","cache":"0"}', 1, '*'),
(13, 0, 'Admin Submenu', '', '', 1, 'submenu', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_submenu', 3, 1, '', 1, '*'),
(14, 0, 'User Status', '', '', 2, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_status', 3, 1, '', 1, '*'),
(15, 0, 'Title', '', '', 1, 'title', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_title', 3, 1, '', 1, '*'),
(16, 0, 'Login Form', '', '', 7, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_login', 1, 1, '{"greeting":"1","name":"0"}', 0, '*'),
(17, 0, 'Breadcrumbs', '', '', 1, 'position-2', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_breadcrumbs', 1, 1, '{"moduleclass_sfx":"","showHome":"1","homeText":"","showComponent":"1","separator":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(79, 0, 'Multilanguage status', '', '', 1, 'status', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_multilangstatus', 3, 1, '{"layout":"_:default","moduleclass_sfx":"","cache":"0"}', 1, '*'),
(80, 0, 'Author Menu', '', '', 1, 'position-1', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_menu', 3, 0, '{"menutype":"authormenu","base":"","startLevel":"1","endLevel":"0","showAllChildren":"1","tag_id":"","class_sfx":" nav-pills","window_open":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(82, 0, 'Syndication', '', '', 6, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_syndicate', 1, 0, '{"display_text":1,"text":"My Blog","format":"rss","layout":"_:default","moduleclass_sfx":"","cache":"0"}', 0, '*'),
(83, 0, 'Archived Articles', '', '', 4, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_articles_archive', 1, 1, '{"count":"10","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static"}', 0, '*'),
(84, 0, 'Most Read Posts', '', '', 5, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_articles_popular', 1, 1, '{"catid":["9"],"count":"5","show_front":"1","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static"}', 0, '*'),
(85, 0, 'Older Posts', '', '', 2, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_articles_category', 1, 1, '{"mode":"normal","show_on_article_page":"0","show_front":"show","count":"6","category_filtering_type":"1","catid":["9"],"show_child_category_articles":"0","levels":"1","author_filtering_type":"1","created_by":[""],"author_alias_filtering_type":"1","created_by_alias":[""],"excluded_articles":"","date_filtering":"off","date_field":"a.created","start_date_range":"","end_date_range":"","relative_date":"30","article_ordering":"a.created","article_ordering_direction":"DESC","article_grouping":"none","article_grouping_direction":"krsort","month_year_format":"F Y","item_heading":"5","link_titles":"1","show_date":"0","show_date_field":"created","show_date_format":"Y-m-d H:i:s","show_category":"0","show_hits":"0","show_author":"0","show_introtext":"0","introtext_limit":"100","show_readmore":"0","show_readmore_title":"1","readmore_limit":"15","layout":"_:default","moduleclass_sfx":"","owncache":"1","cache_time":"900","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(86, 0, 'Bottom Menu', '', '', 1, 'footer', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_menu', 1, 0, '{"menutype":"bottommenu","base":"","startLevel":"1","endLevel":"0","showAllChildren":"0","tag_id":"","class_sfx":"","window_open":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(87, 0, 'Search', '', '', 1, 'position-0', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_search', 1, 1, '{"label":"","width":"20","text":"","button":"","button_pos":"right","imagebutton":"","button_text":"","opensearch":"1","opensearch_title":"","set_itemid":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"itemid"}', 0, '*'),
(88, 0, 'Image', '', '<p><img src="images/headers/raindrops.jpg" alt="" /></p>', 1, 'position-3', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_custom', 1, 0, '{"prepare_content":"1","backgroundimage":"","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(89, 0, 'Popular Tags', '', '', 1, 'position-7', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_tags_popular', 1, 1, '{"maximum":"8","timeframe":"alltime","order_value":"count","order_direction":"1","display_count":0,"no_results_text":"0","minsize":1,"maxsize":2,"layout":"_:default","moduleclass_sfx":"","owncache":"1","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(90, 0, 'Similar Items', '', '', 0, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'mod_tags_similar', 1, 1, '{"maximum":"5","matchtype":"any","layout":"_:default","moduleclass_sfx":"","owncache":"1","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 0, '*'),
(91, 0, 'Site Information', '', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_stats_admin', 6, 1, '{"serverinfo":"1","siteinfo":"1","counter":"0","increase":"0","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","cachemode":"static","module_tag":"div","bootstrap_size":"6","header_tag":"h3","header_class":"","style":"0"}', 1, '*'),
(92, 0, 'Release News', '', '', 1, 'postinstall', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'mod_feed', 1, 1, '{"rssurl":"http:\\/\\/www.joomla.org\\/announcements\\/release-news.feed","rssrtl":"0","rsstitle":"1","rssdesc":"1","rssimage":"1","rssitems":"3","rssitemdesc":"1","word_count":"0","layout":"_:default","moduleclass_sfx":"","cache":"1","cache_time":"900","module_tag":"div","bootstrap_size":"0","header_tag":"h3","header_class":"","style":"0"}', 1, '*');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_modules_menu`
--

CREATE TABLE IF NOT EXISTS `ciudq_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_modules_menu`
--

INSERT INTO `ciudq_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(79, 0),
(80, 0),
(82, 0),
(83, 0),
(84, 0),
(85, 0),
(86, 0),
(87, 0),
(88, 0),
(89, 0),
(90, 0),
(91, 0),
(92, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `ciudq_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `link` varchar(200) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(10) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(10) unsigned NOT NULL DEFAULT '3600',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `metadata` text NOT NULL,
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_overrider`
--

CREATE TABLE IF NOT EXISTS `ciudq_overrider` (
  `id` int(10) NOT NULL COMMENT 'Primary Key',
  `constant` varchar(255) NOT NULL,
  `string` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_postinstall_messages`
--

CREATE TABLE IF NOT EXISTS `ciudq_postinstall_messages` (
  `postinstall_message_id` bigint(20) unsigned NOT NULL,
  `extension_id` bigint(20) NOT NULL DEFAULT '700' COMMENT 'FK to #__extensions',
  `title_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for the title',
  `description_key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Lang key for description',
  `action_key` varchar(255) NOT NULL DEFAULT '',
  `language_extension` varchar(255) NOT NULL DEFAULT 'com_postinstall' COMMENT 'Extension holding lang keys',
  `language_client_id` tinyint(3) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'link' COMMENT 'Message type - message, link, action',
  `action_file` varchar(255) DEFAULT '' COMMENT 'RAD URI to the PHP file containing action method',
  `action` varchar(255) DEFAULT '' COMMENT 'Action method name or URL',
  `condition_file` varchar(255) DEFAULT NULL COMMENT 'RAD URI to file holding display condition method',
  `condition_method` varchar(255) DEFAULT NULL COMMENT 'Display condition method, must return boolean',
  `version_introduced` varchar(50) NOT NULL DEFAULT '3.2.0' COMMENT 'Version when this message was introduced',
  `enabled` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_postinstall_messages`
--

INSERT INTO `ciudq_postinstall_messages` (`postinstall_message_id`, `extension_id`, `title_key`, `description_key`, `action_key`, `language_extension`, `language_client_id`, `type`, `action_file`, `action`, `condition_file`, `condition_method`, `version_introduced`, `enabled`) VALUES
(1, 700, 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_TITLE', 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_BODY', 'PLG_TWOFACTORAUTH_TOTP_POSTINSTALL_ACTION', 'plg_twofactorauth_totp', 1, 'action', 'site://plugins/twofactorauth/totp/postinstall/actions.php', 'twofactorauth_postinstall_action', 'site://plugins/twofactorauth/totp/postinstall/actions.php', 'twofactorauth_postinstall_condition', '3.2.0', 1),
(2, 700, 'COM_CPANEL_MSG_EACCELERATOR_TITLE', 'COM_CPANEL_MSG_EACCELERATOR_BODY', 'COM_CPANEL_MSG_EACCELERATOR_BUTTON', 'com_cpanel', 1, 'action', 'admin://components/com_admin/postinstall/eaccelerator.php', 'admin_postinstall_eaccelerator_action', 'admin://components/com_admin/postinstall/eaccelerator.php', 'admin_postinstall_eaccelerator_condition', '3.2.0', 1),
(3, 700, 'COM_CPANEL_WELCOME_BEGINNERS_TITLE', 'COM_CPANEL_WELCOME_BEGINNERS_MESSAGE', '', 'com_cpanel', 1, 'message', '', '', '', '', '3.2.0', 1),
(4, 700, 'COM_CPANEL_MSG_PHPVERSION_TITLE', 'COM_CPANEL_MSG_PHPVERSION_BODY', '', 'com_cpanel', 1, 'message', '', '', 'admin://components/com_admin/postinstall/phpversion.php', 'admin_postinstall_phpversion_condition', '3.2.2', 1),
(5, 700, 'COM_CPANEL_MSG_ROBOTS_TITLE', 'COM_CPANEL_MSG_ROBOTS_BODY', '', 'com_cpanel', 1, 'message', '', '', '', '', '3.4.0', 1),
(6, 700, 'COM_CPANEL_MSG_LANGUAGEACCESS340_TITLE', 'COM_CPANEL_MSG_LANGUAGEACCESS340_BODY', '', 'com_cpanel', 1, 'message', '', '', 'admin://components/com_admin/postinstall/languageaccess340.php', 'admin_postinstall_languageaccess340_condition', '3.4.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_redirect_links`
--

CREATE TABLE IF NOT EXISTS `ciudq_redirect_links` (
  `id` int(10) unsigned NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `new_url` varchar(255) DEFAULT NULL,
  `referer` varchar(150) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `header` smallint(3) NOT NULL DEFAULT '301'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_schemas`
--

CREATE TABLE IF NOT EXISTS `ciudq_schemas` (
  `extension_id` int(11) NOT NULL,
  `version_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_schemas`
--

INSERT INTO `ciudq_schemas` (`extension_id`, `version_id`) VALUES
(700, '3.4.0-2015-02-26'),
(10002, '3.10.2.1'),
(10003, '0.0.5');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_session`
--

CREATE TABLE IF NOT EXISTS `ciudq_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `guest` tinyint(4) unsigned DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_session`
--

INSERT INTO `ciudq_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`) VALUES
('ogfjuqaklck22ve4ckec7s0rs7', 0, 0, '1471183757', 'joomla|s:3992:"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjo1OntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjM6e3M6NzoiY291bnRlciI7aTo1NztzOjU6InRpbWVyIjtPOjg6InN0ZENsYXNzIjozOntzOjU6InN0YXJ0IjtpOjE0NzExODMwMjk7czo0OiJsYXN0IjtpOjE0NzExODM3NTU7czozOiJub3ciO2k6MTQ3MTE4Mzc1Nzt9czo1OiJ0b2tlbiI7czozMjoiY2Y1ZDMxMjMyNGE5MDkzYzM5YTUwMjcyOTliZWUyNGYiO31zOjg6InJlZ2lzdHJ5IjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MTp7czoxMToiY29tX2NvbmZtZ3QiO086ODoic3RkQ2xhc3MiOjk6e3M6NjoibGlua2lkIjtOO3M6NjoicGFwZXJzIjtPOjg6InN0ZENsYXNzIjoxOntzOjg6Im9yZGVyY29sIjtOO31zOjM6Im5ldyI7Tzo4OiJzdGRDbGFzcyI6MTp7czo4OiJhYnN0cmFjdCI7Tzo4OiJzdGRDbGFzcyI6MTp7czoyOiJpZCI7Tjt9fXM6NDoiZWRpdCI7Tzo4OiJzdGRDbGFzcyI6NTp7czo1OiJwYXBlciI7Tzo4OiJzdGRDbGFzcyI6Mzp7czo1OiJlbWFpbCI7TjtzOjI6ImlkIjtzOjM6IjY1NiI7czo0OiJkYXRhIjtOO31zOjY6ImF1dGhvciI7Tzo4OiJzdGRDbGFzcyI6Mjp7czoyOiJpZCI7TjtzOjQ6ImRhdGEiO047fXM6MTc6InJldjFld2Vyc2ZvcnBhcGVyIjtPOjg6InN0ZENsYXNzIjoyOntzOjI6ImlkIjtOO3M6NDoiZGF0YSI7Tjt9czo2OiJyZXYxZXciO086ODoic3RkQ2xhc3MiOjI6e3M6MjoiaWQiO3M6MjoiOTAiO3M6NDoiZGF0YSI7Tjt9czo5OiJmdWxscGFwZXIiO086ODoic3RkQ2xhc3MiOjE6e3M6MjoiaWQiO047fX1zOjc6ImF1dGhvcnMiO086ODoic3RkQ2xhc3MiOjE6e3M6ODoib3JkZXJjb2wiO047fXM6MTA6ImZ1bGxwYXBlcnMiO086ODoic3RkQ2xhc3MiOjE6e3M6ODoib3JkZXJjb2wiO047fXM6MTc6ImNhbWVyYXJlYWR5cGFwZXJzIjtPOjg6InN0ZENsYXNzIjoxOntzOjg6Im9yZGVyY29sIjtOO31zOjEzOiJwcmVzZW50YXRpb25zIjtPOjg6InN0ZENsYXNzIjoxOntzOjg6Im9yZGVyY29sIjtOO31zOjc6InJldjFld3MiO086ODoic3RkQ2xhc3MiOjE6e3M6ODoib3JkZXJjb2wiO047fX19czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6NDoidXNlciI7Tzo1OiJKVXNlciI6Mjg6e3M6OToiACoAaXNSb290IjtiOjE7czoyOiJpZCI7czozOiI1ODAiO3M6NDoibmFtZSI7czoxMDoiU3VwZXIgVXNlciI7czo4OiJ1c2VybmFtZSI7czo1OiJhZG1pbiI7czo1OiJlbWFpbCI7czoyNDoia2VyYW1pbml5YWdlQHlhaG9vLmNvLnVrIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkeFNBeEV6Sk1QM2V4TUtzTTVGY3oxT3FLVDI2UzRzLkJNVng2UkFmeGxxRHVTL3YwemNBL1ciO3M6MTQ6InBhc3N3b3JkX2NsZWFyIjtzOjA6IiI7czo1OiJibG9jayI7czoxOiIwIjtzOjk6InNlbmRFbWFpbCI7czoxOiIxIjtzOjEyOiJyZWdpc3RlckRhdGUiO3M6MTk6IjIwMTUtMDYtMDkgMTI6Mjk6NDkiO3M6MTM6Imxhc3R2aXNpdERhdGUiO3M6MTk6IjIwMTYtMDMtMjcgMjE6MjA6NTYiO3M6MTA6ImFjdGl2YXRpb24iO3M6MToiMCI7czo2OiJwYXJhbXMiO3M6MDoiIjtzOjY6Imdyb3VwcyI7YToxOntpOjg7czoxOiI4Ijt9czo1OiJndWVzdCI7aTowO3M6MTM6Imxhc3RSZXNldFRpbWUiO3M6MTk6IjAwMDAtMDAtMDAgMDA6MDA6MDAiO3M6MTA6InJlc2V0Q291bnQiO3M6MToiMCI7czoxMjoicmVxdWlyZVJlc2V0IjtzOjE6IjAiO3M6MTA6IgAqAF9wYXJhbXMiO086MjQ6Ikpvb21sYVxSZWdpc3RyeVxSZWdpc3RyeSI6Mjp7czo3OiIAKgBkYXRhIjtPOjg6InN0ZENsYXNzIjowOnt9czo5OiJzZXBhcmF0b3IiO3M6MToiLiI7fXM6MTQ6IgAqAF9hdXRoR3JvdXBzIjthOjI6e2k6MDtpOjE7aToxO2k6ODt9czoxNDoiACoAX2F1dGhMZXZlbHMiO2E6NTp7aTowO2k6MTtpOjE7aToxO2k6MjtpOjI7aTozO2k6MztpOjQ7aTo2O31zOjE1OiIAKgBfYXV0aEFjdGlvbnMiO047czoxMjoiACoAX2Vycm9yTXNnIjtOO3M6MTM6IgAqAHVzZXJIZWxwZXIiO086MTg6IkpVc2VyV3JhcHBlckhlbHBlciI6MDp7fXM6MTA6IgAqAF9lcnJvcnMiO2E6MDp7fXM6MzoiYWlkIjtpOjA7czo2OiJvdHBLZXkiO3M6MDoiIjtzOjQ6Im90ZXAiO3M6MDoiIjt9czoxMDoiY29tX21haWx0byI7Tzo4OiJzdGRDbGFzcyI6MTp7czo1OiJsaW5rcyI7YTo0OntzOjQwOiIzYzg0YTkxNGMwYjNjNmJiOTEwNDEyZDc4YTU3NjBhOGUzYjdiMmUwIjtPOjg6InN0ZENsYXNzIjoyOntzOjQ6ImxpbmsiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvajM0L2luZGV4LnBocC8zLXdlbGNvbWUtdG8teW91ci1ibG9nIjtzOjY6ImV4cGlyeSI7aToxNDcxMTgzMDI5O31zOjQwOiIxNmJmZTk1MDcwNzY3ZTM5YTY5N2EwNjA5OWFmNDk2N2NlNDg5YjAxIjtPOjg6InN0ZENsYXNzIjoyOntzOjQ6ImxpbmsiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvajM0L2luZGV4LnBocC80LWFib3V0LXlvdXItaG9tZS1wYWdlIjtzOjY6ImV4cGlyeSI7aToxNDcxMTgzMDI5O31zOjQwOiJhMWY3ZDYwZWZhODg4NTg0MDQxNGMxZjcxMDM1NjFmYzIzNGIxMDgyIjtPOjg6InN0ZENsYXNzIjoyOntzOjQ6ImxpbmsiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvajM0L2luZGV4LnBocC82LXlvdXItdGVtcGxhdGUiO3M6NjoiZXhwaXJ5IjtpOjE0NzExODMwMjk7fXM6NDA6ImM0NDA1MzBhMWNiNTA0ZDk4N2MyNTRjYmY1OTMzMWNiMjU0ODAzZWQiO086ODoic3RkQ2xhc3MiOjI6e3M6NDoibGluayI7czo0NToiaHR0cDovL2xvY2FsaG9zdC9qMzQvaW5kZXgucGhwLzUteW91ci1tb2R1bGVzIjtzOjY6ImV4cGlyeSI7aToxNDcxMTgzMDI5O319fXM6MTE6ImFwcGxpY2F0aW9uIjtPOjg6InN0ZENsYXNzIjoxOntzOjU6InF1ZXVlIjtOO319fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=";', 580, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_tags`
--

CREATE TABLE IF NOT EXISTS `ciudq_tags` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) unsigned NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access` int(10) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) unsigned NOT NULL DEFAULT '1',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_tags`
--

INSERT INTO `ciudq_tags` (`id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `title`, `alias`, `note`, `description`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `created_by_alias`, `modified_user_id`, `modified_time`, `images`, `urls`, `hits`, `language`, `version`, `publish_up`, `publish_down`) VALUES
(1, 0, 0, 1, 0, '', 'ROOT', 'root', '', '', 1, 0, '0000-00-00 00:00:00', 1, '', '', '', '', 580, '2011-01-01 00:00:01', '', 0, '0000-00-00 00:00:00', '', '', 0, '*', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_template_styles`
--

CREATE TABLE IF NOT EXISTS `ciudq_template_styles` (
  `id` int(10) unsigned NOT NULL,
  `template` varchar(50) NOT NULL DEFAULT '',
  `client_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `home` char(7) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `params` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_template_styles`
--

INSERT INTO `ciudq_template_styles` (`id`, `template`, `client_id`, `home`, `title`, `params`) VALUES
(4, 'beez3', 0, '0', 'Beez3 - Default', '{"wrapperSmall":"53","wrapperLarge":"72","logo":"images\\/joomla_black.gif","sitetitle":"Joomla!","sitedescription":"Open Source Content Management","navposition":"left","templatecolor":"personal","html5":"0"}'),
(5, 'hathor', 1, '0', 'Hathor - Default', '{"showSiteName":"0","colourChoice":"","boldText":"0"}'),
(7, 'protostar', 0, '1', 'protostar - Default', '{"templateColor":"","logoFile":"","googleFont":"1","googleFontName":"Open+Sans","fluidContainer":"0"}'),
(8, 'isis', 1, '1', 'isis - Default', '{"templateColor":"","logoFile":""}'),
(9, 'jsn_teki_pro', 0, '0', 'JSN Teki PRO - Default', '[]'),
(10, 'wt_anema_free', 0, '0', 'wt_anema_free - Default', '{"config":""}'),
(11, 'masterbootstrap', 0, '0', 'Master Bootstrap - Default', '{"leftColumnWidth":"3","rightColumnWidth":"3","frontpageshow":"1","modernizr":"0","fontawesome":"0","pie":"0","logo_link":"index.php","logo_width":"173","logo_height":"26"}');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_ucm_base`
--

CREATE TABLE IF NOT EXISTS `ciudq_ucm_base` (
  `ucm_id` int(10) unsigned NOT NULL,
  `ucm_item_id` int(10) NOT NULL,
  `ucm_type_id` int(11) NOT NULL,
  `ucm_language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_ucm_content`
--

CREATE TABLE IF NOT EXISTS `ciudq_ucm_content` (
  `core_content_id` int(10) unsigned NOT NULL,
  `core_type_alias` varchar(255) NOT NULL DEFAULT '' COMMENT 'FK to the content types table',
  `core_title` varchar(255) NOT NULL,
  `core_alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `core_body` mediumtext NOT NULL,
  `core_state` tinyint(1) NOT NULL DEFAULT '0',
  `core_checked_out_time` varchar(255) NOT NULL DEFAULT '',
  `core_checked_out_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_access` int(10) unsigned NOT NULL DEFAULT '0',
  `core_params` text NOT NULL,
  `core_featured` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `core_metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `core_created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `core_created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `core_created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_modified_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Most recent user that modified',
  `core_modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `core_language` char(7) NOT NULL,
  `core_publish_up` datetime NOT NULL,
  `core_publish_down` datetime NOT NULL,
  `core_content_item_id` int(10) unsigned DEFAULT NULL COMMENT 'ID from the individual type table',
  `asset_id` int(10) unsigned DEFAULT NULL COMMENT 'FK to the #__assets table.',
  `core_images` text NOT NULL,
  `core_urls` text NOT NULL,
  `core_hits` int(10) unsigned NOT NULL DEFAULT '0',
  `core_version` int(10) unsigned NOT NULL DEFAULT '1',
  `core_ordering` int(11) NOT NULL DEFAULT '0',
  `core_metakey` text NOT NULL,
  `core_metadesc` text NOT NULL,
  `core_catid` int(10) unsigned NOT NULL DEFAULT '0',
  `core_xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `core_type_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains core content data in name spaced fields';

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_ucm_history`
--

CREATE TABLE IF NOT EXISTS `ciudq_ucm_history` (
  `version_id` int(10) unsigned NOT NULL,
  `ucm_item_id` int(10) unsigned NOT NULL,
  `ucm_type_id` int(10) unsigned NOT NULL,
  `version_note` varchar(255) NOT NULL DEFAULT '' COMMENT 'Optional version name',
  `save_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `character_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Number of characters in this version.',
  `sha1_hash` varchar(50) NOT NULL DEFAULT '' COMMENT 'SHA1 hash of the version_data column.',
  `version_data` mediumtext NOT NULL COMMENT 'json-encoded string of version data',
  `keep_forever` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=auto delete; 1=keep'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_updates`
--

CREATE TABLE IF NOT EXISTS `ciudq_updates` (
  `update_id` int(11) NOT NULL,
  `update_site_id` int(11) DEFAULT '0',
  `extension_id` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `description` text NOT NULL,
  `element` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `folder` varchar(20) DEFAULT '',
  `client_id` tinyint(3) DEFAULT '0',
  `version` varchar(32) DEFAULT '',
  `data` text NOT NULL,
  `detailsurl` text NOT NULL,
  `infourl` text NOT NULL,
  `extra_query` varchar(1000) DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COMMENT='Available Updates';

--
-- Dumping data for table `ciudq_updates`
--

INSERT INTO `ciudq_updates` (`update_id`, `update_site_id`, `extension_id`, `name`, `description`, `element`, `type`, `folder`, `client_id`, `version`, `data`, `detailsurl`, `infourl`, `extra_query`) VALUES
(1, 3, 0, 'Armenian', '', 'pkg_hy-AM', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/hy-AM_details.xml', '', ''),
(2, 3, 0, 'Malay', '', 'pkg_ms-MY', 'package', '', 0, '3.4.1.2', '', 'http://update.joomla.org/language/details3/ms-MY_details.xml', '', ''),
(3, 3, 0, 'Romanian', '', 'pkg_ro-RO', 'package', '', 0, '3.4.3.1', '', 'http://update.joomla.org/language/details3/ro-RO_details.xml', '', ''),
(4, 3, 0, 'Flemish', '', 'pkg_nl-BE', 'package', '', 0, '3.4.8.2', '', 'http://update.joomla.org/language/details3/nl-BE_details.xml', '', ''),
(5, 3, 0, 'Chinese Traditional', '', 'pkg_zh-TW', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/zh-TW_details.xml', '', ''),
(6, 3, 0, 'French', '', 'pkg_fr-FR', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/fr-FR_details.xml', '', ''),
(7, 3, 0, 'Galician', '', 'pkg_gl-ES', 'package', '', 0, '3.3.1.2', '', 'http://update.joomla.org/language/details3/gl-ES_details.xml', '', ''),
(8, 3, 0, 'German', '', 'pkg_de-DE', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/de-DE_details.xml', '', ''),
(9, 3, 0, 'Greek', '', 'pkg_el-GR', 'package', '', 0, '3.4.2.1', '', 'http://update.joomla.org/language/details3/el-GR_details.xml', '', ''),
(10, 3, 0, 'Japanese', '', 'pkg_ja-JP', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/ja-JP_details.xml', '', ''),
(11, 3, 0, 'Hebrew', '', 'pkg_he-IL', 'package', '', 0, '3.1.1.1', '', 'http://update.joomla.org/language/details3/he-IL_details.xml', '', ''),
(12, 3, 0, 'Hungarian', '', 'pkg_hu-HU', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/hu-HU_details.xml', '', ''),
(13, 3, 0, 'Afrikaans', '', 'pkg_af-ZA', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/af-ZA_details.xml', '', ''),
(14, 3, 0, 'Arabic Unitag', '', 'pkg_ar-AA', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/ar-AA_details.xml', '', ''),
(15, 3, 0, 'Belarusian', '', 'pkg_be-BY', 'package', '', 0, '3.2.1.1', '', 'http://update.joomla.org/language/details3/be-BY_details.xml', '', ''),
(16, 3, 0, 'Bulgarian', '', 'pkg_bg-BG', 'package', '', 0, '3.4.4.2', '', 'http://update.joomla.org/language/details3/bg-BG_details.xml', '', ''),
(17, 3, 0, 'Catalan', '', 'pkg_ca-ES', 'package', '', 0, '3.4.4.2', '', 'http://update.joomla.org/language/details3/ca-ES_details.xml', '', ''),
(18, 3, 0, 'Chinese Simplified', '', 'pkg_zh-CN', 'package', '', 0, '3.4.1.1', '', 'http://update.joomla.org/language/details3/zh-CN_details.xml', '', ''),
(19, 3, 0, 'Croatian', '', 'pkg_hr-HR', 'package', '', 0, '3.4.4.2', '', 'http://update.joomla.org/language/details3/hr-HR_details.xml', '', ''),
(20, 3, 0, 'Czech', '', 'pkg_cs-CZ', 'package', '', 0, '3.4.1.1', '', 'http://update.joomla.org/language/details3/cs-CZ_details.xml', '', ''),
(21, 3, 0, 'Danish', '', 'pkg_da-DK', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/da-DK_details.xml', '', ''),
(22, 3, 0, 'Dutch', '', 'pkg_nl-NL', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/nl-NL_details.xml', '', ''),
(23, 3, 0, 'Estonian', '', 'pkg_et-EE', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/et-EE_details.xml', '', ''),
(24, 3, 0, 'Italian', '', 'pkg_it-IT', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/it-IT_details.xml', '', ''),
(25, 3, 0, 'Khmer', '', 'pkg_km-KH', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/km-KH_details.xml', '', ''),
(26, 3, 0, 'Korean', '', 'pkg_ko-KR', 'package', '', 0, '3.4.4.2', '', 'http://update.joomla.org/language/details3/ko-KR_details.xml', '', ''),
(27, 3, 0, 'Latvian', '', 'pkg_lv-LV', 'package', '', 0, '3.4.3.1', '', 'http://update.joomla.org/language/details3/lv-LV_details.xml', '', ''),
(28, 3, 0, 'Macedonian', '', 'pkg_mk-MK', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/mk-MK_details.xml', '', ''),
(29, 3, 0, 'Norwegian Bokmal', '', 'pkg_nb-NO', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/nb-NO_details.xml', '', ''),
(30, 3, 0, 'Norwegian Nynorsk', '', 'pkg_nn-NO', 'package', '', 0, '3.4.2.1', '', 'http://update.joomla.org/language/details3/nn-NO_details.xml', '', ''),
(31, 3, 0, 'Persian', '', 'pkg_fa-IR', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/fa-IR_details.xml', '', ''),
(32, 3, 0, 'Polish', '', 'pkg_pl-PL', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/pl-PL_details.xml', '', ''),
(33, 3, 0, 'Portuguese', '', 'pkg_pt-PT', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/pt-PT_details.xml', '', ''),
(34, 3, 0, 'Russian', '', 'pkg_ru-RU', 'package', '', 0, '3.4.1.3', '', 'http://update.joomla.org/language/details3/ru-RU_details.xml', '', ''),
(35, 3, 0, 'English AU', '', 'pkg_en-AU', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/en-AU_details.xml', '', ''),
(36, 3, 0, 'Slovak', '', 'pkg_sk-SK', 'package', '', 0, '3.4.8.2', '', 'http://update.joomla.org/language/details3/sk-SK_details.xml', '', ''),
(37, 3, 0, 'English US', '', 'pkg_en-US', 'package', '', 0, '3.4.6.1', '', 'http://update.joomla.org/language/details3/en-US_details.xml', '', ''),
(38, 3, 0, 'Swedish', '', 'pkg_sv-SE', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/sv-SE_details.xml', '', ''),
(39, 3, 0, 'Syriac', '', 'pkg_sy-IQ', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/sy-IQ_details.xml', '', ''),
(40, 3, 0, 'Tamil', '', 'pkg_ta-IN', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/ta-IN_details.xml', '', ''),
(41, 3, 0, 'Thai', '', 'pkg_th-TH', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/th-TH_details.xml', '', ''),
(42, 3, 0, 'Turkish', '', 'pkg_tr-TR', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/tr-TR_details.xml', '', ''),
(43, 3, 0, 'Ukrainian', '', 'pkg_uk-UA', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/uk-UA_details.xml', '', ''),
(44, 3, 0, 'Uyghur', '', 'pkg_ug-CN', 'package', '', 0, '3.3.0.1', '', 'http://update.joomla.org/language/details3/ug-CN_details.xml', '', ''),
(45, 3, 0, 'Albanian', '', 'pkg_sq-AL', 'package', '', 0, '3.1.1.1', '', 'http://update.joomla.org/language/details3/sq-AL_details.xml', '', ''),
(46, 3, 0, 'Hindi', '', 'pkg_hi-IN', 'package', '', 0, '3.3.6.1', '', 'http://update.joomla.org/language/details3/hi-IN_details.xml', '', ''),
(47, 3, 0, 'Portuguese Brazil', '', 'pkg_pt-BR', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/pt-BR_details.xml', '', ''),
(48, 3, 0, 'Serbian Latin', '', 'pkg_sr-YU', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/sr-YU_details.xml', '', ''),
(49, 3, 0, 'Spanish', '', 'pkg_es-ES', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/es-ES_details.xml', '', ''),
(50, 3, 0, 'Bosnian', '', 'pkg_bs-BA', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/bs-BA_details.xml', '', ''),
(51, 3, 0, 'Serbian Cyrillic', '', 'pkg_sr-RS', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/sr-RS_details.xml', '', ''),
(52, 3, 0, 'Vietnamese', '', 'pkg_vi-VN', 'package', '', 0, '3.2.1.1', '', 'http://update.joomla.org/language/details3/vi-VN_details.xml', '', ''),
(53, 3, 0, 'Bahasa Indonesia', '', 'pkg_id-ID', 'package', '', 0, '3.3.0.2', '', 'http://update.joomla.org/language/details3/id-ID_details.xml', '', ''),
(54, 3, 0, 'Finnish', '', 'pkg_fi-FI', 'package', '', 0, '3.4.2.1', '', 'http://update.joomla.org/language/details3/fi-FI_details.xml', '', ''),
(55, 3, 0, 'Swahili', '', 'pkg_sw-KE', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/sw-KE_details.xml', '', ''),
(56, 3, 0, 'Montenegrin', '', 'pkg_srp-ME', 'package', '', 0, '3.3.1.1', '', 'http://update.joomla.org/language/details3/srp-ME_details.xml', '', ''),
(57, 3, 0, 'English CA', '', 'pkg_en-CA', 'package', '', 0, '3.4.6.1', '', 'http://update.joomla.org/language/details3/en-CA_details.xml', '', ''),
(58, 3, 0, 'French CA', '', 'pkg_fr-CA', 'package', '', 0, '3.4.4.3', '', 'http://update.joomla.org/language/details3/fr-CA_details.xml', '', ''),
(59, 3, 0, 'Welsh', '', 'pkg_cy-GB', 'package', '', 0, '3.3.0.2', '', 'http://update.joomla.org/language/details3/cy-GB_details.xml', '', ''),
(60, 3, 0, 'Sinhala', '', 'pkg_si-LK', 'package', '', 0, '3.3.1.1', '', 'http://update.joomla.org/language/details3/si-LK_details.xml', '', ''),
(61, 3, 0, 'Dari Persian', '', 'pkg_prs-AF', 'package', '', 0, '3.4.4.1', '', 'http://update.joomla.org/language/details3/prs-AF_details.xml', '', ''),
(62, 3, 0, 'Turkmen', '', 'pkg_tk-TM', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/tk-TM_details.xml', '', ''),
(63, 3, 0, 'Irish', '', 'pkg_ga-IE', 'package', '', 0, '3.4.8.1', '', 'http://update.joomla.org/language/details3/ga-IE_details.xml', '', ''),
(64, 3, 0, 'Dzongkha', '', 'pkg_dz-BT', 'package', '', 0, '3.4.5.1', '', 'http://update.joomla.org/language/details3/dz-BT_details.xml', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_update_sites`
--

CREATE TABLE IF NOT EXISTS `ciudq_update_sites` (
  `update_site_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT '',
  `type` varchar(20) DEFAULT '',
  `location` text NOT NULL,
  `enabled` int(11) DEFAULT '0',
  `last_check_timestamp` bigint(20) DEFAULT '0',
  `extra_query` varchar(1000) DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Update Sites';

--
-- Dumping data for table `ciudq_update_sites`
--

INSERT INTO `ciudq_update_sites` (`update_site_id`, `name`, `type`, `location`, `enabled`, `last_check_timestamp`, `extra_query`) VALUES
(1, 'Joomla! Core', 'collection', 'http://update.joomla.org/core/list.xml', 1, 1458594783, ''),
(2, 'Joomla! Extension Directory', 'collection', 'http://update.joomla.org/jed/list.xml', 1, 1458594783, ''),
(3, 'Accredited Joomla! Translations', 'collection', 'http://update.joomla.org/language/translationlist_3.xml', 1, 1458594783, ''),
(4, 'Joomla! Update Component Update Site', 'extension', 'http://update.joomla.org/core/extensions/com_joomlaupdate.xml', 1, 1458594783, ''),
(5, 'JDeveloper Update Site', 'extension', 'http://joommaster.bplaced.net/updates/jdeveloper-update.xml', 1, 1458594783, ''),
(6, 'JDeveloper Update Site', 'extension', 'http://joommaster.bplaced.net/updates/lib_jcms_update.xml', 1, 1458594783, '');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_update_sites_extensions`
--

CREATE TABLE IF NOT EXISTS `ciudq_update_sites_extensions` (
  `update_site_id` int(11) NOT NULL DEFAULT '0',
  `extension_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Links extensions to update sites';

--
-- Dumping data for table `ciudq_update_sites_extensions`
--

INSERT INTO `ciudq_update_sites_extensions` (`update_site_id`, `extension_id`) VALUES
(1, 700),
(2, 700),
(3, 600),
(4, 28),
(5, 10002),
(6, 10008);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_usergroups`
--

CREATE TABLE IF NOT EXISTS `ciudq_usergroups` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Adjacency List Reference Id',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `title` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_usergroups`
--

INSERT INTO `ciudq_usergroups` (`id`, `parent_id`, `lft`, `rgt`, `title`) VALUES
(1, 0, 1, 18, 'Public'),
(2, 1, 8, 15, 'Registered'),
(3, 2, 9, 14, 'Author'),
(4, 3, 10, 13, 'Editor'),
(5, 4, 11, 12, 'Publisher'),
(6, 1, 4, 7, 'Manager'),
(7, 6, 5, 6, 'Administrator'),
(8, 1, 16, 17, 'Super Users'),
(9, 1, 2, 3, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_users`
--

CREATE TABLE IF NOT EXISTS `ciudq_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) NOT NULL DEFAULT '' COMMENT 'One time emergency passwords',
  `requireReset` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require user to reset password on next login'
) ENGINE=InnoDB AUTO_INCREMENT=581 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_users`
--

INSERT INTO `ciudq_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`, `otpKey`, `otep`, `requireReset`) VALUES
(580, 'Super User', 'admin', 'keraminiyage@yahoo.co.uk', '$2y$10$xSAxEzJMP3exMKsM5Fcz1OqKT26S4s.BMVx6RAfxlqDuS/v0zcA/W', 0, 1, '2015-06-09 12:29:49', '2016-08-14 13:57:24', '0', '', '0000-00-00 00:00:00', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_user_keys`
--

CREATE TABLE IF NOT EXISTS `ciudq_user_keys` (
  `id` int(10) unsigned NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `invalid` tinyint(4) NOT NULL,
  `time` varchar(200) NOT NULL,
  `uastring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_user_notes`
--

CREATE TABLE IF NOT EXISTS `ciudq_user_notes` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) unsigned NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_user_profiles`
--

CREATE TABLE IF NOT EXISTS `ciudq_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_user_usergroup_map`
--

CREATE TABLE IF NOT EXISTS `ciudq_user_usergroup_map` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_user_usergroup_map`
--

INSERT INTO `ciudq_user_usergroup_map` (`user_id`, `group_id`) VALUES
(580, 8),
(581, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_viewlevels`
--

CREATE TABLE IF NOT EXISTS `ciudq_viewlevels` (
  `id` int(10) unsigned NOT NULL COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_viewlevels`
--

INSERT INTO `ciudq_viewlevels` (`id`, `title`, `ordering`, `rules`) VALUES
(1, 'Public', 0, '[1]'),
(2, 'Registered', 1, '[6,2,8]'),
(3, 'Special', 2, '[6,3,8]'),
(5, 'Guest', 0, '[9]'),
(6, 'Super Users', 0, '[8]');

-- --------------------------------------------------------

--
-- Table structure for table `jos_confmgt_coordinators`
--

CREATE TABLE IF NOT EXISTS `jos_confmgt_coordinators` (
  `id` int(11) NOT NULL,
  `themeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudq_assets`
--
ALTER TABLE `ciudq_assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_asset_name` (`name`),
  ADD KEY `idx_lft_rgt` (`lft`,`rgt`),
  ADD KEY `idx_parent_id` (`parent_id`);

--
-- Indexes for table `ciudq_associations`
--
ALTER TABLE `ciudq_associations`
  ADD PRIMARY KEY (`context`,`id`),
  ADD KEY `idx_key` (`key`);

--
-- Indexes for table `ciudq_banners`
--
ALTER TABLE `ciudq_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`),
  ADD KEY `idx_banner_catid` (`catid`),
  ADD KEY `idx_language` (`language`);

--
-- Indexes for table `ciudq_banner_clients`
--
ALTER TABLE `ciudq_banner_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_own_prefix` (`own_prefix`),
  ADD KEY `idx_metakey_prefix` (`metakey_prefix`);

--
-- Indexes for table `ciudq_banner_tracks`
--
ALTER TABLE `ciudq_banner_tracks`
  ADD PRIMARY KEY (`track_date`,`track_type`,`banner_id`),
  ADD KEY `idx_track_date` (`track_date`),
  ADD KEY `idx_track_type` (`track_type`),
  ADD KEY `idx_banner_id` (`banner_id`);

--
-- Indexes for table `ciudq_categories`
--
ALTER TABLE `ciudq_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_idx` (`extension`,`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_language` (`language`);

--
-- Indexes for table `ciudq_confmgr_abstract`
--
ALTER TABLE `ciudq_confmgr_abstract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_author`
--
ALTER TABLE `ciudq_confmgr_author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ciudq_confmgr_author_for_paper`
--
ALTER TABLE `ciudq_confmgr_author_for_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_camera_ready_paper`
--
ALTER TABLE `ciudq_confmgr_camera_ready_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_full_paper`
--
ALTER TABLE `ciudq_confmgr_full_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_paper`
--
ALTER TABLE `ciudq_confmgr_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_payment`
--
ALTER TABLE `ciudq_confmgr_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_presentation`
--
ALTER TABLE `ciudq_confmgr_presentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_rev1ew`
--
ALTER TABLE `ciudq_confmgr_rev1ew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_rev1ewer`
--
ALTER TABLE `ciudq_confmgr_rev1ewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_rev1ewer_for_paper`
--
ALTER TABLE `ciudq_confmgr_rev1ewer_for_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_theme`
--
ALTER TABLE `ciudq_confmgr_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgr_theme_leader`
--
ALTER TABLE `ciudq_confmgr_theme_leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_abstracts`
--
ALTER TABLE `ciudq_confmgt_abstracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_authors`
--
ALTER TABLE `ciudq_confmgt_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_camerareadypapers`
--
ALTER TABLE `ciudq_confmgt_camerareadypapers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_coordinators`
--
ALTER TABLE `ciudq_confmgt_coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_emails`
--
ALTER TABLE `ciudq_confmgt_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_email_log`
--
ALTER TABLE `ciudq_confmgt_email_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_fullpapers`
--
ALTER TABLE `ciudq_confmgt_fullpapers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_papers`
--
ALTER TABLE `ciudq_confmgt_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_presentations`
--
ALTER TABLE `ciudq_confmgt_presentations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_rev1ewers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_rev1ewers_papers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_reviews`
--
ALTER TABLE `ciudq_confmgt_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_themes`
--
ALTER TABLE `ciudq_confmgt_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_contact_details`
--
ALTER TABLE `ciudq_contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Indexes for table `ciudq_content`
--
ALTER TABLE `ciudq_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Indexes for table `ciudq_contentitem_tag_map`
--
ALTER TABLE `ciudq_contentitem_tag_map`
  ADD UNIQUE KEY `uc_ItemnameTagid` (`type_id`,`content_item_id`,`tag_id`),
  ADD KEY `idx_tag_type` (`tag_id`,`type_id`),
  ADD KEY `idx_date_id` (`tag_date`,`tag_id`),
  ADD KEY `idx_tag` (`tag_id`),
  ADD KEY `idx_type` (`type_id`),
  ADD KEY `idx_core_content_id` (`core_content_id`);

--
-- Indexes for table `ciudq_content_frontpage`
--
ALTER TABLE `ciudq_content_frontpage`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `ciudq_content_rating`
--
ALTER TABLE `ciudq_content_rating`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `ciudq_content_types`
--
ALTER TABLE `ciudq_content_types`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `idx_alias` (`type_alias`);

--
-- Indexes for table `ciudq_extensions`
--
ALTER TABLE `ciudq_extensions`
  ADD PRIMARY KEY (`extension_id`),
  ADD KEY `element_clientid` (`element`,`client_id`),
  ADD KEY `element_folder_clientid` (`element`,`folder`,`client_id`),
  ADD KEY `extension` (`type`,`element`,`folder`,`client_id`);

--
-- Indexes for table `ciudq_finder_filters`
--
ALTER TABLE `ciudq_finder_filters`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indexes for table `ciudq_finder_links`
--
ALTER TABLE `ciudq_finder_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `idx_type` (`type_id`),
  ADD KEY `idx_title` (`title`),
  ADD KEY `idx_md5` (`md5sum`),
  ADD KEY `idx_url` (`url`(75)),
  ADD KEY `idx_published_list` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`list_price`),
  ADD KEY `idx_published_sale` (`published`,`state`,`access`,`publish_start_date`,`publish_end_date`,`sale_price`);

--
-- Indexes for table `ciudq_finder_links_terms0`
--
ALTER TABLE `ciudq_finder_links_terms0`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms1`
--
ALTER TABLE `ciudq_finder_links_terms1`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms2`
--
ALTER TABLE `ciudq_finder_links_terms2`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms3`
--
ALTER TABLE `ciudq_finder_links_terms3`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms4`
--
ALTER TABLE `ciudq_finder_links_terms4`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms5`
--
ALTER TABLE `ciudq_finder_links_terms5`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms6`
--
ALTER TABLE `ciudq_finder_links_terms6`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms7`
--
ALTER TABLE `ciudq_finder_links_terms7`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms8`
--
ALTER TABLE `ciudq_finder_links_terms8`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_terms9`
--
ALTER TABLE `ciudq_finder_links_terms9`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termsa`
--
ALTER TABLE `ciudq_finder_links_termsa`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termsb`
--
ALTER TABLE `ciudq_finder_links_termsb`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termsc`
--
ALTER TABLE `ciudq_finder_links_termsc`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termsd`
--
ALTER TABLE `ciudq_finder_links_termsd`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termse`
--
ALTER TABLE `ciudq_finder_links_termse`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_links_termsf`
--
ALTER TABLE `ciudq_finder_links_termsf`
  ADD PRIMARY KEY (`link_id`,`term_id`),
  ADD KEY `idx_term_weight` (`term_id`,`weight`),
  ADD KEY `idx_link_term_weight` (`link_id`,`term_id`,`weight`);

--
-- Indexes for table `ciudq_finder_taxonomy`
--
ALTER TABLE `ciudq_finder_taxonomy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `state` (`state`),
  ADD KEY `ordering` (`ordering`),
  ADD KEY `access` (`access`),
  ADD KEY `idx_parent_published` (`parent_id`,`state`,`access`);

--
-- Indexes for table `ciudq_finder_taxonomy_map`
--
ALTER TABLE `ciudq_finder_taxonomy_map`
  ADD PRIMARY KEY (`link_id`,`node_id`),
  ADD KEY `link_id` (`link_id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indexes for table `ciudq_finder_terms`
--
ALTER TABLE `ciudq_finder_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD UNIQUE KEY `idx_term` (`term`),
  ADD KEY `idx_term_phrase` (`term`,`phrase`),
  ADD KEY `idx_stem_phrase` (`stem`,`phrase`),
  ADD KEY `idx_soundex_phrase` (`soundex`,`phrase`);

--
-- Indexes for table `ciudq_finder_terms_common`
--
ALTER TABLE `ciudq_finder_terms_common`
  ADD KEY `idx_word_lang` (`term`,`language`),
  ADD KEY `idx_lang` (`language`);

--
-- Indexes for table `ciudq_finder_tokens`
--
ALTER TABLE `ciudq_finder_tokens`
  ADD KEY `idx_word` (`term`),
  ADD KEY `idx_context` (`context`);

--
-- Indexes for table `ciudq_finder_tokens_aggregate`
--
ALTER TABLE `ciudq_finder_tokens_aggregate`
  ADD KEY `token` (`term`),
  ADD KEY `keyword_id` (`term_id`);

--
-- Indexes for table `ciudq_finder_types`
--
ALTER TABLE `ciudq_finder_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `ciudq_jdeveloper_components`
--
ALTER TABLE `ciudq_jdeveloper_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_fields`
--
ALTER TABLE `ciudq_jdeveloper_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_formfields`
--
ALTER TABLE `ciudq_jdeveloper_formfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_formrules`
--
ALTER TABLE `ciudq_jdeveloper_formrules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_forms`
--
ALTER TABLE `ciudq_jdeveloper_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_libraries`
--
ALTER TABLE `ciudq_jdeveloper_libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_modules`
--
ALTER TABLE `ciudq_jdeveloper_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_overrides`
--
ALTER TABLE `ciudq_jdeveloper_overrides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_plugins`
--
ALTER TABLE `ciudq_jdeveloper_plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_tables`
--
ALTER TABLE `ciudq_jdeveloper_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_jdeveloper_templates`
--
ALTER TABLE `ciudq_jdeveloper_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_languages`
--
ALTER TABLE `ciudq_languages`
  ADD PRIMARY KEY (`lang_id`),
  ADD UNIQUE KEY `idx_sef` (`sef`),
  ADD UNIQUE KEY `idx_image` (`image`),
  ADD UNIQUE KEY `idx_langcode` (`lang_code`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_ordering` (`ordering`);

--
-- Indexes for table `ciudq_menu`
--
ALTER TABLE `ciudq_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  ADD KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  ADD KEY `idx_menutype` (`menutype`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_path` (`path`(255)),
  ADD KEY `idx_language` (`language`);

--
-- Indexes for table `ciudq_menu_types`
--
ALTER TABLE `ciudq_menu_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_menutype` (`menutype`);

--
-- Indexes for table `ciudq_messages`
--
ALTER TABLE `ciudq_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `useridto_state` (`user_id_to`,`state`);

--
-- Indexes for table `ciudq_messages_cfg`
--
ALTER TABLE `ciudq_messages_cfg`
  ADD UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`);

--
-- Indexes for table `ciudq_modules`
--
ALTER TABLE `ciudq_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`,`access`),
  ADD KEY `newsfeeds` (`module`,`published`),
  ADD KEY `idx_language` (`language`);

--
-- Indexes for table `ciudq_modules_menu`
--
ALTER TABLE `ciudq_modules_menu`
  ADD PRIMARY KEY (`moduleid`,`menuid`);

--
-- Indexes for table `ciudq_newsfeeds`
--
ALTER TABLE `ciudq_newsfeeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`published`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Indexes for table `ciudq_overrider`
--
ALTER TABLE `ciudq_overrider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_postinstall_messages`
--
ALTER TABLE `ciudq_postinstall_messages`
  ADD PRIMARY KEY (`postinstall_message_id`);

--
-- Indexes for table `ciudq_redirect_links`
--
ALTER TABLE `ciudq_redirect_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_link_old` (`old_url`),
  ADD KEY `idx_link_modifed` (`modified_date`);

--
-- Indexes for table `ciudq_schemas`
--
ALTER TABLE `ciudq_schemas`
  ADD PRIMARY KEY (`extension_id`,`version_id`);

--
-- Indexes for table `ciudq_session`
--
ALTER TABLE `ciudq_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `time` (`time`);

--
-- Indexes for table `ciudq_tags`
--
ALTER TABLE `ciudq_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_idx` (`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_language` (`language`);

--
-- Indexes for table `ciudq_template_styles`
--
ALTER TABLE `ciudq_template_styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_template` (`template`),
  ADD KEY `idx_home` (`home`);

--
-- Indexes for table `ciudq_ucm_base`
--
ALTER TABLE `ciudq_ucm_base`
  ADD PRIMARY KEY (`ucm_id`),
  ADD KEY `idx_ucm_item_id` (`ucm_item_id`),
  ADD KEY `idx_ucm_type_id` (`ucm_type_id`),
  ADD KEY `idx_ucm_language_id` (`ucm_language_id`);

--
-- Indexes for table `ciudq_ucm_content`
--
ALTER TABLE `ciudq_ucm_content`
  ADD PRIMARY KEY (`core_content_id`),
  ADD KEY `tag_idx` (`core_state`,`core_access`),
  ADD KEY `idx_access` (`core_access`),
  ADD KEY `idx_alias` (`core_alias`),
  ADD KEY `idx_language` (`core_language`),
  ADD KEY `idx_title` (`core_title`),
  ADD KEY `idx_modified_time` (`core_modified_time`),
  ADD KEY `idx_created_time` (`core_created_time`),
  ADD KEY `idx_content_type` (`core_type_alias`),
  ADD KEY `idx_core_modified_user_id` (`core_modified_user_id`),
  ADD KEY `idx_core_checked_out_user_id` (`core_checked_out_user_id`),
  ADD KEY `idx_core_created_user_id` (`core_created_user_id`),
  ADD KEY `idx_core_type_id` (`core_type_id`);

--
-- Indexes for table `ciudq_ucm_history`
--
ALTER TABLE `ciudq_ucm_history`
  ADD PRIMARY KEY (`version_id`),
  ADD KEY `idx_ucm_item_id` (`ucm_type_id`,`ucm_item_id`),
  ADD KEY `idx_save_date` (`save_date`);

--
-- Indexes for table `ciudq_updates`
--
ALTER TABLE `ciudq_updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `ciudq_update_sites`
--
ALTER TABLE `ciudq_update_sites`
  ADD PRIMARY KEY (`update_site_id`);

--
-- Indexes for table `ciudq_update_sites_extensions`
--
ALTER TABLE `ciudq_update_sites_extensions`
  ADD PRIMARY KEY (`update_site_id`,`extension_id`);

--
-- Indexes for table `ciudq_usergroups`
--
ALTER TABLE `ciudq_usergroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_usergroup_parent_title_lookup` (`parent_id`,`title`),
  ADD KEY `idx_usergroup_title_lookup` (`title`),
  ADD KEY `idx_usergroup_adjacency_lookup` (`parent_id`),
  ADD KEY `idx_usergroup_nested_set_lookup` (`lft`,`rgt`) USING BTREE;

--
-- Indexes for table `ciudq_users`
--
ALTER TABLE `ciudq_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_block` (`block`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `ciudq_user_keys`
--
ALTER TABLE `ciudq_user_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series` (`series`),
  ADD UNIQUE KEY `series_2` (`series`),
  ADD UNIQUE KEY `series_3` (`series`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ciudq_user_notes`
--
ALTER TABLE `ciudq_user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_category_id` (`catid`);

--
-- Indexes for table `ciudq_user_profiles`
--
ALTER TABLE `ciudq_user_profiles`
  ADD UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`);

--
-- Indexes for table `ciudq_user_usergroup_map`
--
ALTER TABLE `ciudq_user_usergroup_map`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `ciudq_viewlevels`
--
ALTER TABLE `ciudq_viewlevels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_assetgroup_title_lookup` (`title`);

--
-- Indexes for table `jos_confmgt_coordinators`
--
ALTER TABLE `jos_confmgt_coordinators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudq_assets`
--
ALTER TABLE `ciudq_assets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ciudq_banners`
--
ALTER TABLE `ciudq_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_banner_clients`
--
ALTER TABLE `ciudq_banner_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_categories`
--
ALTER TABLE `ciudq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_abstract`
--
ALTER TABLE `ciudq_confmgr_abstract`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_author`
--
ALTER TABLE `ciudq_confmgr_author`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_author_for_paper`
--
ALTER TABLE `ciudq_confmgr_author_for_paper`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_camera_ready_paper`
--
ALTER TABLE `ciudq_confmgr_camera_ready_paper`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_full_paper`
--
ALTER TABLE `ciudq_confmgr_full_paper`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_paper`
--
ALTER TABLE `ciudq_confmgr_paper`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_payment`
--
ALTER TABLE `ciudq_confmgr_payment`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_presentation`
--
ALTER TABLE `ciudq_confmgr_presentation`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_rev1ew`
--
ALTER TABLE `ciudq_confmgr_rev1ew`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_rev1ewer`
--
ALTER TABLE `ciudq_confmgr_rev1ewer`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_rev1ewer_for_paper`
--
ALTER TABLE `ciudq_confmgr_rev1ewer_for_paper`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_theme`
--
ALTER TABLE `ciudq_confmgr_theme`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_confmgr_theme_leader`
--
ALTER TABLE `ciudq_confmgr_theme_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_abstracts`
--
ALTER TABLE `ciudq_confmgt_abstracts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=403;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_authors`
--
ALTER TABLE `ciudq_confmgt_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=590;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_camerareadypapers`
--
ALTER TABLE `ciudq_confmgt_camerareadypapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_coordinators`
--
ALTER TABLE `ciudq_confmgt_coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_emails`
--
ALTER TABLE `ciudq_confmgt_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_email_log`
--
ALTER TABLE `ciudq_confmgt_email_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=662;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_fullpapers`
--
ALTER TABLE `ciudq_confmgt_fullpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_papers`
--
ALTER TABLE `ciudq_confmgt_papers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=657;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_presentations`
--
ALTER TABLE `ciudq_confmgt_presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_rev1ewers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=350;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_rev1ewers_papers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_reviews`
--
ALTER TABLE `ciudq_confmgt_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_themes`
--
ALTER TABLE `ciudq_confmgt_themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ciudq_contact_details`
--
ALTER TABLE `ciudq_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_content`
--
ALTER TABLE `ciudq_content`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ciudq_content_types`
--
ALTER TABLE `ciudq_content_types`
  MODIFY `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ciudq_extensions`
--
ALTER TABLE `ciudq_extensions`
  MODIFY `extension_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10011;
--
-- AUTO_INCREMENT for table `ciudq_finder_filters`
--
ALTER TABLE `ciudq_finder_filters`
  MODIFY `filter_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_finder_links`
--
ALTER TABLE `ciudq_finder_links`
  MODIFY `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_finder_taxonomy`
--
ALTER TABLE `ciudq_finder_taxonomy`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_finder_terms`
--
ALTER TABLE `ciudq_finder_terms`
  MODIFY `term_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_finder_types`
--
ALTER TABLE `ciudq_finder_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_components`
--
ALTER TABLE `ciudq_jdeveloper_components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_fields`
--
ALTER TABLE `ciudq_jdeveloper_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_formfields`
--
ALTER TABLE `ciudq_jdeveloper_formfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_formrules`
--
ALTER TABLE `ciudq_jdeveloper_formrules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_forms`
--
ALTER TABLE `ciudq_jdeveloper_forms`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_libraries`
--
ALTER TABLE `ciudq_jdeveloper_libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_modules`
--
ALTER TABLE `ciudq_jdeveloper_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_overrides`
--
ALTER TABLE `ciudq_jdeveloper_overrides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_plugins`
--
ALTER TABLE `ciudq_jdeveloper_plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_tables`
--
ALTER TABLE `ciudq_jdeveloper_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ciudq_jdeveloper_templates`
--
ALTER TABLE `ciudq_jdeveloper_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key';
--
-- AUTO_INCREMENT for table `ciudq_languages`
--
ALTER TABLE `ciudq_languages`
  MODIFY `lang_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_menu`
--
ALTER TABLE `ciudq_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `ciudq_menu_types`
--
ALTER TABLE `ciudq_menu_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ciudq_messages`
--
ALTER TABLE `ciudq_messages`
  MODIFY `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_modules`
--
ALTER TABLE `ciudq_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `ciudq_newsfeeds`
--
ALTER TABLE `ciudq_newsfeeds`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_overrider`
--
ALTER TABLE `ciudq_overrider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';
--
-- AUTO_INCREMENT for table `ciudq_postinstall_messages`
--
ALTER TABLE `ciudq_postinstall_messages`
  MODIFY `postinstall_message_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ciudq_redirect_links`
--
ALTER TABLE `ciudq_redirect_links`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_tags`
--
ALTER TABLE `ciudq_tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ciudq_template_styles`
--
ALTER TABLE `ciudq_template_styles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ciudq_ucm_content`
--
ALTER TABLE `ciudq_ucm_content`
  MODIFY `core_content_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_ucm_history`
--
ALTER TABLE `ciudq_ucm_history`
  MODIFY `version_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_updates`
--
ALTER TABLE `ciudq_updates`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `ciudq_update_sites`
--
ALTER TABLE `ciudq_update_sites`
  MODIFY `update_site_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ciudq_usergroups`
--
ALTER TABLE `ciudq_usergroups`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ciudq_users`
--
ALTER TABLE `ciudq_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=581;
--
-- AUTO_INCREMENT for table `ciudq_user_keys`
--
ALTER TABLE `ciudq_user_keys`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_user_notes`
--
ALTER TABLE `ciudq_user_notes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ciudq_viewlevels`
--
ALTER TABLE `ciudq_viewlevels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jos_confmgt_coordinators`
--
ALTER TABLE `jos_confmgt_coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
