-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2016 at 07:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `j34`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_abstracts`
--

CREATE TABLE `ciudq_confmgt_abstracts` (
  `id` int(11) UNSIGNED NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(390, 621, 'Test', 1, 0, 0, '0000-00-00 00:00:00', 0, 0, '', '2015-12-23 22:28:55', 2, 0),
(403, 658, 'test', 14, 0, 0, '0000-00-00 00:00:00', 580, 0, '', '2016-08-24 13:26:29', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_authors`
--

CREATE TABLE `ciudq_confmgt_authors` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_authors`
--

INSERT INTO `ciudq_confmgt_authors` (`id`, `linkid`, `title`, `firstname`, `surname`, `institution`, `country`, `attending`, `created_by`, `ordering`, `email`, `last_updated`) VALUES
(589, 656, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 3, 'keraminiyage@yahoo.co.uk', '2016-08-14 13:57:55'),
(588, 654, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 13, 'keraminiyage@yahoo.co.uk', '2016-03-22 12:10:04'),
(586, 646, 'Prof', 'tetreEQ', 'FETFTr', 'reywrye', 'w', 1, 580, 18, 'Test@fefe', '2015-12-28 20:24:26'),
(587, 653, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 12, 'keraminiyage@yahoo.co.uk', '2016-03-22 09:53:00'),
(584, 642, 'Prof', 'vfdvqfvw', 'vg', 'grwg', 'efgeq', 1, 580, 11, 'geg@frwfrwf.com', '2015-12-27 19:59:09'),
(585, 646, 'Prof', 'Test', 'Test', 'Etst', 'Test', 1, 580, 10, 'Test@fefe', '2015-12-28 20:23:32'),
(583, 640, 'Prof', 'Test', 'testestsETSE', 'ES6S6', 'EA66SFSF', 1, 580, 19, 'ES6ES6@frefer.com', '2015-12-27 18:34:03'),
(582, 640, 'Prof', 'TEst', 'Test', 'etst', 'estets', 1, 580, 9, 'DATEa@frefer.com', '2015-12-27 18:33:44'),
(580, 636, 'Prof', 'test', 'Etst', 'tet', 'eastea', 1, 580, 8, 'estest@frefer.com', '2015-12-27 14:30:57'),
(581, 637, 'Prof', 'Kaushal', 'Keraminiyage', 'cls', 'ewlfdw', 1, 580, 7, 'ker@frere.com', '2015-12-27 15:03:38'),
(579, 635, 'Prof', 'K', 'k', 'uk', 'Uk', 1, 580, 20, 'K@frefre.com', '2015-12-27 14:07:13'),
(577, 630, 'Prof', 'vfdvfd', 'dscds', 'cdscds', 'vvsvd', 1, 580, 5, 'cdscdscds@freferf.com', '2015-12-26 22:36:25'),
(578, 635, 'Prof', 'Kau', 'Keraminiyage', 'Io', 'UK', 1, 580, 4, 'keraminiyage@yahoo.co.uk', '2015-12-27 14:06:19'),
(576, 627, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 17, 'r.amaratuna@gmail.com', '2015-12-26 16:03:57'),
(574, 626, 'Prof', 'Test', 'TEst', 'TEst', 'TEsw', 1, 580, 27, 'TEst@ffrefe.com', '2015-12-24 10:32:39'),
(575, 627, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 14, 'keraminiyage@yahoo.co.uk', '2015-12-26 16:03:32'),
(572, 625, 'Prof', 'T', 'T', 'test', 'este', 1, 580, 24, 'Tewe@te', '2015-12-24 10:24:54'),
(573, 626, 'Prof', 'dsqw', 'cds', 'UoH', 'United Kingdom', 1, 580, 23, 'keraminiyage@yahoo.co.uk', '2015-12-24 10:31:46'),
(571, 624, 'Prof', 'K', 'K', 'K', 'K', 1, 580, 22, 'keraminiyage@yahoo.co.uk', '2015-12-24 10:11:17'),
(570, 623, 'Prof', 'K', 'K', 'UoH', 'UK', 1, 580, 25, 'kkeraminiyage@yahoo.co.uk', '2015-12-24 10:09:49'),
(569, 623, 'Prof', 'D', 'D', 'D', 'D', 1, 580, 21, 'd@r.com', '2015-12-24 10:09:35'),
(568, 622, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 26, 'd@r.com', '2015-12-24 09:52:03'),
(566, 621, 'Prof', 'Dilanthi', 'Amaratunga', 'UoH', 'UK', 1, 580, 6, 'd@r.com', '2015-12-23 22:28:43'),
(567, 622, 'Prof', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 15, 'keraminiyage@yahoo.co.uk', '2015-12-24 09:51:33'),
(565, 621, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 16, 'keraminiyage@yahoo.co.uk', '2015-12-23 22:28:25'),
(590, 656, 'Prof', 'Test1', 'Test2', 'UoH', 'UK', 1, 580, 1, 'test@test.com', '2016-08-22 14:07:35'),
(591, 656, 'Prof', 'Tet3', 'Test3', 'UoH', 'UK', 1, 580, 2, 'test@test.com', '2016-08-22 14:18:49'),
(592, 657, 'Prof', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 1, 'keraminiyage@hud.ac.uk', '2016-08-24 12:48:18'),
(593, 658, 'Prof', 'Test', 'tEst', 'test', 'est', 1, 580, 1, 'tEst@fewfew.com', '2016-08-24 13:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_camerareadypapers`
--

CREATE TABLE `ciudq_confmgt_camerareadypapers` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `camera_ready` varchar(255) NOT NULL,
  `cover_page` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_coordinators`
--

CREATE TABLE `ciudq_confmgt_coordinators` (
  `id` int(11) NOT NULL,
  `themeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_emails`
--

CREATE TABLE `ciudq_confmgt_emails` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `emailcode` varchar(25) NOT NULL,
  `placeholders` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `ciudq_confmgt_email_log` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(635, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nDr Kaushal Keraminiyage; Prof Dilanthi Amaratunga; \r\n\r\nAbstract: \r\nTest\r\n\r\nKeywords: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2015-12-23 22:28:57', 580, 'failed'),
(662, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Full paper review results: ', 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the full paper titled ''Test 123'' for the . We have now reviewed this paper. Please see the review results for this full paper below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-23 13:02:14', 580, 'OK'),
(663, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Full paper review results: ', 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the full paper titled ''Test 123'' for the . We have now reviewed this paper. Please see the review results for this full paper below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nvfdv\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-23 13:03:51', 580, 'OK'),
(664, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nThank you very much for submitting the abstract titled ''Test'' for the . Your abstract will be reviewed and the outcome will be notified in due course. You can monitor the progress of your paper by login in to the conference management system at http://localhost/j34/. The details of your submission is noted below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Test tEst; \r\n\r\nAbstract: \r\ntest\r\n\r\nKeywords: \r\nestt\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-24 13:26:29', 580, 'OK'),
(665, 'a:2:{i:0;N;i:1;N;}', 's:24:"keraminiyage@yahoo.co.uk";', 'Abstract received:  ', 'Dear Super User,\r\n\r\nRecently Super User has submitted an abstract titled ''Test'' for  under the theme ''Resilience'', for which you are the theme leader. Please review this abstract  by login in to the conference management system at http://localhost/j34/. At this stage, you can also assign reviewers to this abstract so that you can get external reviews to incorporate into your response to the authors. Alternatively you can assign the reviewers later in the process so that they review only the full papers. In any case, please enter the abstract review comments online and review results will be automatically notified to the corresponding author. \r\n\r\nAbstract details are as below:\r\n\r\nTitle: \r\nTest\r\n\r\nAuthors: \r\nProf Test tEst; \r\n\r\nAbstract: \r\ntest\r\n\r\nKeywords: \r\nestt\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 'i:0;', 'i:0;', 'i:0;', '2016-08-24 13:26:29', 580, 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_fullpapers`
--

CREATE TABLE `ciudq_confmgt_fullpapers` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_fullpapers`
--

INSERT INTO `ciudq_confmgt_fullpapers` (`id`, `linkid`, `full_paper`, `created_by`, `ordering`, `type`, `full_review_outcome`, `full_review_comments`, `last_updated`, `resubmit`) VALUES
(178, 656, '656-full-1471956963.docx', 580, 1, '', 3, 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the full paper titled ''Test 123'' for the . We have now reviewed this paper. Please see the review results for this full paper below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2016-08-23 12:56:03', 0),
(179, 656, '656-full-1471957356.docx', 580, 2, '', 3, 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the full paper titled ''Test 123'' for the . We have now reviewed this paper. Please see the review results for this full paper below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nvfdv\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', '2016-08-23 13:02:36', 0),
(180, 656, '656-full-1471957443.docx', 580, 3, '', 0, '', '2016-08-23 13:04:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_papers`
--

CREATE TABLE `ciudq_confmgt_papers` (
  `id` int(11) UNSIGNED NOT NULL,
  `linkid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_papers`
--

INSERT INTO `ciudq_confmgt_papers` (`id`, `linkid`, `title`, `type`, `abstract`, `abstractid`, `keywords`, `ordering`, `state`, `checked_out`, `checked_out_time`, `created_by`, `full_paper`, `fullpaperid`, `camera_ready`, `presentation`, `full_review_outcome`, `abstract_review_outcome`, `full_review_comments`, `abstract_review_comments`, `theme`, `last_updated`, `active`, `student_submission`, `camerareadyid`, `presentationid`) VALUES
(625, 625, 'TEst', 0, 'Test', 394, 'TEst', 5, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:24:42', 1, 0, 0, 0),
(656, 656, 'Test 123', 0, 'Test', 402, 'Test', 6, 1, 0, '0000-00-00 00:00:00', 580, '656-full-1471957443.docx', 180, '', '', 0, 1, '', 'Dear Super User,\r\n\r\nPaper Id: 656\r\n\r\nThank you for submitting the abstract titled ''Test 123'' for , which we have reviewed under the theme ''Resilience''. Please see the review results for this abstract  below, which is also available to access by login in to the conference management system at http://localhost/j34/. Please consider the comments below carefully and prepare for the next step.\r\n\r\nReview comments:\r\n\r\nReviewer 1 comments: \r\nTest\r\n\r\nThank you.\r\nKind regards\r\n\r\n\r\nOn behalf of the organising committee ', 2, '2016-08-14 13:57:41', 1, 0, 0, 0),
(624, 624, 'test', 0, 'Test', 393, 'Test', 4, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:10:59', 1, 0, 0, 0),
(623, 623, 'Test', 0, 'Test', 392, 'Test', 3, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 10:09:24', 1, 1, 0, 0),
(622, 622, 'Test', 0, 'Test', 391, 'Test', 2, 0, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2015-12-24 09:50:22', 1, 0, 0, 0),
(658, 658, 'Test', 1, 'test', 403, 'estt', 7, 1, 0, '0000-00-00 00:00:00', 580, '', 0, '', '', 0, 0, '', '', 2, '2016-08-24 13:04:52', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_presentations`
--

CREATE TABLE `ciudq_confmgt_presentations` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL,
  `presentation` varchar(255) NOT NULL,
  `cover_page` varchar(255) CHARACTER SET ucs2 NOT NULL,
  `created_by` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_rev1ewers`
--

CREATE TABLE `ciudq_confmgt_rev1ewers` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_rev1ewers`
--

INSERT INTO `ciudq_confmgt_rev1ewers` (`id`, `linkid`, `title`, `firstname`, `surname`, `institution`, `country`, `agreed`, `created_by`, `ordering`, `email`, `last_updated`, `userid`, `token`) VALUES
(349, 0, 'Dr', 'Kaushal', 'Keraminiyage', 'UoH', 'UK', 1, 580, 4, 'keraminiyage@yahoo.co.uk', '2015-12-28 17:57:50', 580, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_rev1ewers_papers`
--

CREATE TABLE `ciudq_confmgt_rev1ewers_papers` (
  `id` int(11) NOT NULL,
  `paperid` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `ciudq_confmgt_reviews` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_reviews`
--

INSERT INTO `ciudq_confmgt_reviews` (`id`, `recommendation`, `author_comments`, `leader_comments`, `score`, `last_updated`, `mode`, `linkid`, `created_by`, `rand`, `abstractid`, `fullpaperid`) VALUES
(88, 3, 'This is test', 'This is test', 4, '2015-12-28 17:58:35', 'abstract', 637, 580, '0', 397, 0),
(89, 3, 'Test', 'test', 1, '2016-01-05 18:12:14', 'abstract', 621, 580, '0', 390, 0),
(90, 1, 'Test', 'Test', 1, '2016-08-14 14:06:33', 'abstract', 656, 580, '0', 402, 0),
(91, 1, 'vfdv', 'vfdvfdv', 2, '2016-08-23 13:03:40', 'full', 656, 580, '0', 402, 179),
(92, 4, 'bgrb', 'rbrbrg', 1, '2016-08-23 13:04:32', 'full', 656, 580, '0', 402, 180);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_submission_types`
--

CREATE TABLE `ciudq_confmgt_submission_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `peer_reviewed` int(11) NOT NULL,
  `full_submission_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ciudq_confmgt_submission_types`
--

INSERT INTO `ciudq_confmgt_submission_types` (`id`, `type`, `description`, `peer_reviewed`, `full_submission_required`) VALUES
(1, 'Academic Presentation', 'Abstract and full paper submission required, subject to double blind peer review', 1, 1),
(2, 'Policy and Practice Presentation', 'Abstract submission only, non-peer review', 0, 0),
(3, 'Doctoral School', 'Abstract and full paper submission required, subject to double blind peer review\r\nFor students registered at recognised Higher Education Institutes', 1, 1),
(4, 'Poster Presentation', 'Abstract and poster submission only, non-peer review', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ciudq_confmgt_themes`
--

CREATE TABLE `ciudq_confmgt_themes` (
  `id` int(11) NOT NULL,
  `linkid` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudq_confmgt_themes`
--

INSERT INTO `ciudq_confmgt_themes` (`id`, `linkid`, `userid`, `title`, `description`, `last_updated`) VALUES
(2, 0, 580, 'Resilience', 'Conceptual understanding of resilience\r\nOverall systems resilience\r\nMeasurement of resilience', '2014-10-03 17:25:09'),
(3, 0, 580, 'Built Environment', 'Structural mitigation\r\nInfrastructure\r\nSustainable development\r\nShelter and housing', '2014-10-03 17:25:09');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `ciudq_confmgt_submission_types`
--
ALTER TABLE `ciudq_confmgt_submission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ciudq_confmgt_themes`
--
ALTER TABLE `ciudq_confmgt_themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudq_confmgt_abstracts`
--
ALTER TABLE `ciudq_confmgt_abstracts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=404;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_authors`
--
ALTER TABLE `ciudq_confmgt_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_camerareadypapers`
--
ALTER TABLE `ciudq_confmgt_camerareadypapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_coordinators`
--
ALTER TABLE `ciudq_confmgt_coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_emails`
--
ALTER TABLE `ciudq_confmgt_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_email_log`
--
ALTER TABLE `ciudq_confmgt_email_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_fullpapers`
--
ALTER TABLE `ciudq_confmgt_fullpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_papers`
--
ALTER TABLE `ciudq_confmgt_papers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_presentations`
--
ALTER TABLE `ciudq_confmgt_presentations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_rev1ewers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_rev1ewers_papers`
--
ALTER TABLE `ciudq_confmgt_rev1ewers_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_reviews`
--
ALTER TABLE `ciudq_confmgt_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_submission_types`
--
ALTER TABLE `ciudq_confmgt_submission_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ciudq_confmgt_themes`
--
ALTER TABLE `ciudq_confmgt_themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
