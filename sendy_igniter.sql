-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2022 at 12:18 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sendy_igniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

DROP TABLE IF EXISTS `apps`;
CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `app_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_per_recipient` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_ssl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  `app_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allocated_quota` int(11) DEFAULT '-1',
  `current_quota` int(11) DEFAULT '0',
  `day_of_reset` int(11) DEFAULT '1',
  `month_of_next_reset` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_next_reset` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_expiry` int(1) DEFAULT '0',
  `test_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_attachments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'jpeg,jpg,gif,png,pdf,zip',
  `reports_only` int(1) DEFAULT '0',
  `campaigns_only` int(1) DEFAULT '0',
  `templates_only` int(1) DEFAULT '0',
  `lists_only` int(1) DEFAULT '0',
  `notify_campaign_sent` int(1) DEFAULT '1',
  `campaign_report_rows` int(11) DEFAULT '10',
  `query_string` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gdpr_only` int(1) DEFAULT '0',
  `gdpr_options` int(1) DEFAULT '1',
  `gdpr_only_ar` int(1) DEFAULT '0',
  `recaptcha_sitekey` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_secretkey` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_domain` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_domain_protocol` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_domain_enabled` int(1) DEFAULT '0',
  `test_email_prefix` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `templates_lists_sorting` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT 'date',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `userID`, `app_name`, `from_name`, `from_email`, `reply_to`, `currency`, `delivery_fee`, `cost_per_recipient`, `smtp_host`, `smtp_port`, `smtp_ssl`, `smtp_username`, `smtp_password`, `bounce_setup`, `complaint_setup`, `app_key`, `allocated_quota`, `current_quota`, `day_of_reset`, `month_of_next_reset`, `year_of_next_reset`, `no_expiry`, `test_email`, `brand_logo_filename`, `allowed_attachments`, `reports_only`, `campaigns_only`, `templates_only`, `lists_only`, `notify_campaign_sent`, `campaign_report_rows`, `query_string`, `gdpr_only`, `gdpr_options`, `gdpr_only_ar`, `recaptcha_sitekey`, `recaptcha_secretkey`, `custom_domain`, `custom_domain_protocol`, `custom_domain_enabled`, `test_email_prefix`, `templates_lists_sorting`) VALUES
(1, 1, 'Kiire', 'Robert Emi', 'info@robertemi.com', 'info@robertemi.com', 'USD', '', '', 'smtp.mailgun.org', '587', 'ssl', '', '', 0, 0, '', -1, 0, 1, '', NULL, 0, NULL, '1.png', 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(2, 3, 'Mekhi', 'mekh', 'mekh@phifer.com', 'mekh@phifer.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'taI1gQ5fXHpKoUgxQrhst4iziFPAhS', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(3, 3, 'Sunky', 'Sunkali', 'sunky@mail.com', 'sunky@mail.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'QNuGbchvFn05dKY3arb7gPnlfsqlxe', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(4, 3, 'Jackson', 'jack', 'sonOfJack@mail.com', 'sonOfJack@mail.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, '1Qce5qKMKTsnc6U1tfHddBHNQpq6lQ', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(5, 3, 'Macklannon', 'mack', 'macklann@mail.com', 'macklann@mail.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, '5XIVrS1y4LbF6pLszZyb9tMgiIGRnV', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(6, 3, 'Shaharazad', 'shara', 'shara@mail.com', 'shara@mail.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, '7y8ZOoR13PZOZQkMiS1sA7INsLxYWB', -1, 0, 1, '', NULL, 0, NULL, '6.jpg', 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(7, 3, 'Alibabs', 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'nBNwo7cE4TaS0pzHKgn7hZE7zhkWkX', -1, 0, 1, '', NULL, 0, NULL, '7.jpg', 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(8, 3, 'Brandii', 'brandy', 'brandy@brand.com', 'brandy@brand.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'LvkHM6XxWhtHAdRX5SZVTHGaiiOYI5', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(9, 3, 'Brax', 'branx', 'brax@brand.com', 'brax@brand.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, '3HnuDWMJPbNGMlhacstEoXfnZshfCx', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(10, 3, 'Pratt', 'pratt', 'pratt@brand.com', 'pratt@brand.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'd5CWkNGvXzUQfpNaR0TgLbYRRDgSaS', -1, 0, 1, '', NULL, 0, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(11, 3, 'Jax', 'jaxin', 'jaxin@brand.com', 'jaxin@brand.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'Ac6PsIkPoTPbVCBB88WeFeCX9Vbwae', -1, 0, 1, '', NULL, 0, NULL, '11.jpg', 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date'),
(12, 3, 'Kylanix', 'kyla', 'kyla@nix.com', 'kyla@nix.com', 'USD', '', '', '', '', 'ssl', '', '', 0, 0, 'AZkQ6iWZR2FBVs92BwgqvVtFT8Z8Lz', -1, 0, 1, '', NULL, 0, NULL, '12.jpg', 'jpeg,jpg,gif,png,pdf,zip', 0, 0, 0, 0, 1, 10, '', 0, 1, 0, '', '', '', 'http', 0, '', 'date');

-- --------------------------------------------------------

--
-- Table structure for table `ares`
--

DROP TABLE IF EXISTS `ares`;
CREATE TABLE IF NOT EXISTS `ares` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `custom_field` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ares`
--

INSERT INTO `ares` (`id`, `name`, `type`, `list`, `custom_field`) VALUES
(1, 'Welcome', 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `ares_emails`
--

DROP TABLE IF EXISTS `ares_emails`;
CREATE TABLE IF NOT EXISTS `ares_emails` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ares_id` int(11) DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_text` longtext COLLATE utf8mb4_unicode_ci,
  `html_text` longtext COLLATE utf8mb4_unicode_ci,
  `query_string` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_condition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `recipients` int(100) DEFAULT '0',
  `opens` longtext COLLATE utf8mb4_unicode_ci,
  `wysiwyg` int(11) DEFAULT '0',
  `opens_tracking` int(1) DEFAULT '1',
  `links_tracking` int(1) DEFAULT '1',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ares_emails`
--

INSERT INTO `ares_emails` (`id`, `ares_id`, `from_name`, `from_email`, `reply_to`, `title`, `plain_text`, `html_text`, `query_string`, `time_condition`, `timezone`, `created`, `recipients`, `opens`, `wysiwyg`, `opens_tracking`, `links_tracking`, `enabled`) VALUES
(1, 1, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Welcome', 'Thank you for signing up for our newsletters, we appreciate your feedback on content you would like to get from us.', '<html>\n<head>\n	<title></title>\n</head>\n<body>\n<p>Thank you for signing up for our newsletters, we appreciate your feedback on content you would like to get from us.</p>\n</body>\n</html>\n', '', 'immediately', NULL, 1643133097, 0, NULL, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blocked_domains`
--

DROP TABLE IF EXISTS `blocked_domains`;
CREATE TABLE IF NOT EXISTS `blocked_domains` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app` int(11) DEFAULT NULL,
  `domain` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `block_attempts` int(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_text` longtext COLLATE utf8mb4_unicode_ci,
  `html_text` longtext COLLATE utf8mb4_unicode_ci,
  `query_string` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `to_send` int(100) DEFAULT NULL,
  `to_send_lists` mediumtext COLLATE utf8mb4_unicode_ci,
  `recipients` int(100) DEFAULT '0',
  `timeout_check` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opens` longtext COLLATE utf8mb4_unicode_ci,
  `wysiwyg` int(11) DEFAULT '0',
  `quota_deducted` int(11) DEFAULT NULL,
  `send_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lists` mediumtext COLLATE utf8mb4_unicode_ci,
  `lists_excl` mediumtext COLLATE utf8mb4_unicode_ci,
  `segs` mediumtext COLLATE utf8mb4_unicode_ci,
  `segs_excl` mediumtext COLLATE utf8mb4_unicode_ci,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `errors` longtext COLLATE utf8mb4_unicode_ci,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  `opens_tracking` int(1) DEFAULT '1',
  `links_tracking` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `userID`, `app`, `from_name`, `from_email`, `reply_to`, `title`, `label`, `plain_text`, `html_text`, `query_string`, `sent`, `to_send`, `to_send_lists`, `recipients`, `timeout_check`, `opens`, `wysiwyg`, `quota_deducted`, `send_date`, `lists`, `lists_excl`, `segs`, `segs_excl`, `timezone`, `errors`, `bounce_setup`, `complaint_setup`, `opens_tracking`, `links_tracking`) VALUES
(1, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Sales Clearance (shoes)', '', 'clearance sales', '<html>\n<head>\n	<title></title>\n</head>\n<body>\n<p>Get these Nike Jordansh at giveaway prices</p>\n</body>\n</html>\n', 'sales=clearance&item=shoe', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(2, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Sales Clearance (shoes)', '', 'clearance sales', '<html>\n<head>\n	<title></title>\n</head>\n<body>\n<p>Get these Nike Jordanss at giveaway prices</p>\n</body>\n</html>\n', 'sales=clearance&item=shoe', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(3, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Sales Clearance (shoes)', '', 'Clearance Sales', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Get these Nike Jordans at giveaway prices</p>\r\n</body>\r\n</html>\r\n', 'sales=clearance&item=shoe', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(4, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Sales Clearance (shoes)', '', 'Clearance Sales', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Get these Nike Jordans at giveaway prices</p>\r\n</body>\r\n</html>\r\n', 'sales=clearance&item=shoe', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(5, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Sales Clearance (shoes)', '', 'Clearance Sales', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Get these Nike Jordans at giveaway prices</p>\r\n</body>\r\n</html>\r\n', 'sales=clearance&item=shoe', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(7, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Miire', NULL, NULL, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>This is just a test template</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is to inform you that you have been accepted into our brand training program</p>\r\n\r\n<p>In our training program, we provide...</p>\r\n\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>\r\n', '', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1),
(10, 3, 7, 'babsAli', 'alibabali@mail.com', 'alibabali@mail.com', 'Joanne Bags', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Get our designer thrift bags are giveaway prices during this monts clearance sales</p>\r\n</body>\r\n</html>\r\n', '', '', NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `ares_emails_id` int(11) DEFAULT NULL,
  `link` varchar(1500) DEFAULT NULL,
  `clicks` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_in` int(11) DEFAULT '0',
  `confirm_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribed_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankyou` int(11) DEFAULT '0',
  `thankyou_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankyou_message` longtext COLLATE utf8mb4_unicode_ci,
  `goodbye` int(11) DEFAULT '0',
  `goodbye_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goodbye_message` longtext COLLATE utf8mb4_unicode_ci,
  `confirmation_subject` longtext COLLATE utf8mb4_unicode_ci,
  `confirmation_email` longtext COLLATE utf8mb4_unicode_ci,
  `unsubscribe_all_list` int(11) DEFAULT '1',
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `prev_count` int(100) DEFAULT '0',
  `currently_processing` int(100) DEFAULT '0',
  `total_records` int(100) DEFAULT '0',
  `gdpr` int(1) DEFAULT '0',
  `gdpr_enabled` int(1) DEFAULT '0',
  `marketing_permission` mediumtext COLLATE utf8mb4_unicode_ci,
  `what_to_expect` mediumtext COLLATE utf8mb4_unicode_ci,
  `unsubscribe_confirm` int(1) DEFAULT '0',
  `notify_new_signups` int(1) DEFAULT '0',
  `notification_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_consent_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `already_subscribed_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reconsent_success_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `app`, `userID`, `name`, `opt_in`, `confirm_url`, `subscribed_url`, `unsubscribed_url`, `thankyou`, `thankyou_subject`, `thankyou_message`, `goodbye`, `goodbye_subject`, `goodbye_message`, `confirmation_subject`, `confirmation_email`, `unsubscribe_all_list`, `custom_fields`, `prev_count`, `currently_processing`, `total_records`, `gdpr`, `gdpr_enabled`, `marketing_permission`, `what_to_expect`, `unsubscribe_confirm`, `notify_new_signups`, `notification_email`, `no_consent_url`, `already_subscribed_url`, `reconsent_success_url`) VALUES
(1, 1, 1, 'kiire', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(2, 7, 3, 'Shoes', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(3, 7, 3, 'Bags', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(4, 7, 3, 'Belts', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL),
(5, 7, 3, 'Jeans', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s3_key` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s3_secret` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT '1',
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tied_to` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `paypal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cron` int(11) DEFAULT '0',
  `cron_ares` int(11) DEFAULT '0',
  `send_rate` int(100) DEFAULT '0',
  `language` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'en_US',
  `cron_csv` int(11) DEFAULT '0',
  `cron_seg` int(11) DEFAULT '0',
  `ses_endpoint` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_enabled` int(11) DEFAULT '0',
  `auth_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_key` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brands_rows` int(11) DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `company`, `email`, `username`, `password`, `s3_key`, `s3_secret`, `api_key`, `license`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `last_login`, `active`, `timezone`, `tied_to`, `app`, `paypal`, `cron`, `cron_ares`, `send_rate`, `language`, `cron_csv`, `cron_seg`, `ses_endpoint`, `auth_enabled`, `auth_key`, `reset_password_key`, `brands_rows`) VALUES
(1, 'Tamunoemi Robert', 'Teckipro Ltd', '', 'rtamunoemi@gmail.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', '', '', 'Mldx14i3MXX2gTfyM3BJ', 'L12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1642088477, 1, 'America/New_York', NULL, NULL, NULL, 0, 0, 0, 'en_US', 0, 0, 'email.us-east-1.amazonaws.com', 0, NULL, '', 10),
(2, 'Robert Emi', 'Kiire', '', 'info@robertemi.com', '8902c3584d5a2a37318d1d686dcca040c36609f78e7d0661d02b19b5044fad3d5e0418a9e31bc40514ca6850181ede95e7c4307b9b00723a7f07379e418626ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'America/New_York', 1, 1, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(3, 'Tee', 'Vaughn', '', 'admin@admin.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wxoixl.bRqKZsrhk/zbdNO', 1643814658, 1, NULL, NULL, NULL, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, '', 10),
(4, 'mekh', 'Mekhi', '', 'mekh@phifer.com', '4feb966b9a3e3af3a6dc58188fd96a18933666247e25be902676a233967a752a0571f25e6a7660d7638141338678344a9b7864b7d2cf775d12f8eec0d7fb2fdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 2, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(5, 'Sunkali', 'Sunky', '', 'sunky@mail.com', '02f821eb0ae1afdd42ef81a5eb3b4892befa5480c8a53a2ca7f27962f2456ba5ea481b62dab1b59eee2f610d4a0ce8ea04983b38a16076d47a767451c2ecc89d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 3, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(6, 'jack', 'Jackson', '', 'sonOfJack@mail.com', '11aac5d4291dac7187fa6a7e5b3c4ef1d5905928e556fe3c272e494fa26a919435d4a5435b462477124e065fa55c29f5a1cc39cf45bd088eb3fc6dd9fb687e19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 4, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(7, 'mack', 'Macklannon', '', 'macklann@mail.com', '5b0de72f15622dc9cf6c83a549146a3e064dc7395b324ac2343d19243be07076226968f63a8e6d93eaec0eef07afa9120800dae448e81cc477c5fa22fafb27f1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 5, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(8, 'shara', 'Shaharazad', '', 'shara@mail.com', 'ce5c4f3d2c7940223e574de1496baad6f9f0b433b9d277896decbaaf10d19390c2adcab773dd72e3872b0320a14bae56d391cd88c7cf7d422d40e13caa8e006d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 6, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(9, 'babsAli', 'Alibabs', '', 'alibabali@mail.com', '3392671cafd03e5754542b0325d69ad2f427bbade3197dfe916f6d3c615cb0c90a0c6c50c7ecfc602d69d186dfcc5e2545b8023d7d85cfaf7d20cab8048f6c06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 7, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(10, 'brandy', 'Brandii', '', 'brandy@brand.com', '98d81eaac5e07255d4cfe2f7d7e23630c8fefbd95dcad3bb52396803f10203a6f10808650b0f6b17fa5d908ce6afcc4623977e33950f8a5527d2c3e3b7a59f43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 8, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(11, 'branx', 'Brax', '', 'brax@brand.com', 'b09793cca97274b9737988475f5a72671e4764e8cba9da7aa4f3197fa57118fde1d1e179fbf46198fe74f4e3b2794557ac761decb21efecd54b255ed3f365107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 9, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(12, 'pratt', 'Pratt', '', 'pratt@brand.com', 'ef40635ccf3bc5bf8d2c123f5d68742d4cbec5464a03e9beb50e2e891e4876740bcff3807c786ecfe27c6d0fd92be0653469b05b9aa54cb2b333ccf8e86bde40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 10, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(13, 'jaxin', 'Jax', '', 'jaxin@brand.com', '8e9b86789a51a720f8cb14fff04d4b71be952d27060d791d885229772f25f141e51907c2cb3fdc4a3acade2af19a61db1af83e5d2eea8358c39db43e692dcb30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 11, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10),
(14, 'kyla', 'Kylanix', '', 'kyla@nix.com', 'b94940a38c85e4f510f21a617d92152a284e74981ec67799130f5129a50370453f8b428137249eaa053479b07971622e8ba9488377a25e49ce8eb7ffa545b70f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'UTC', 3, 12, NULL, 0, 0, 0, 'en_US', 0, 0, NULL, 0, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

DROP TABLE IF EXISTS `queue`;
CREATE TABLE IF NOT EXISTS `queue` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `query_str` longtext,
  `campaign_id` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `sent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `s_id` (`subscriber_id`),
  KEY `st_id` (`sent`),
  KEY `s_campaign_id` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seg`
--

DROP TABLE IF EXISTS `seg`;
CREATE TABLE IF NOT EXISTS `seg` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `last_updated` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s_list` (`list`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seg_cons`
--

DROP TABLE IF EXISTS `seg_cons`;
CREATE TABLE IF NOT EXISTS `seg_cons` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seg_id` int(11) DEFAULT NULL,
  `grouping` int(11) DEFAULT NULL,
  `operator` char(3) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `comparison` varchar(11) DEFAULT NULL,
  `val` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `s_seg_id` (`seg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skipped_emails`
--

DROP TABLE IF EXISTS `skipped_emails`;
CREATE TABLE IF NOT EXISTS `skipped_emails` (
  `app` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `reason` int(1) DEFAULT NULL,
  KEY `s_list` (`list`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `list` int(11) DEFAULT NULL,
  `unsubscribed` int(11) DEFAULT '0',
  `bounced` int(11) DEFAULT '0',
  `bounce_soft` int(11) DEFAULT '0',
  `complaint` int(11) DEFAULT '0',
  `last_campaign` int(11) DEFAULT NULL,
  `last_ares` int(11) DEFAULT NULL,
  `timestamp` int(100) DEFAULT NULL,
  `join_date` int(100) DEFAULT NULL,
  `confirmed` int(11) DEFAULT '1',
  `messageID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` int(1) DEFAULT NULL,
  `added_via` int(1) DEFAULT NULL,
  `gdpr` int(1) DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `s_list` (`list`),
  KEY `s_unsubscribed` (`unsubscribed`),
  KEY `s_bounced` (`bounced`),
  KEY `s_bounce_soft` (`bounce_soft`),
  KEY `s_complaint` (`complaint`),
  KEY `s_confirmed` (`confirmed`),
  KEY `s_timestamp` (`timestamp`),
  KEY `s_email` (`email`),
  KEY `s_last_campaign` (`last_campaign`),
  KEY `s_messageid` (`messageID`),
  KEY `s_country` (`country`),
  KEY `s_referrer` (`referrer`),
  KEY `s_method` (`method`),
  KEY `s_added_via` (`added_via`),
  KEY `s_gdpr` (`gdpr`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `userID`, `name`, `email`, `custom_fields`, `list`, `unsubscribed`, `bounced`, `bounce_soft`, `complaint`, `last_campaign`, `last_ares`, `timestamp`, `join_date`, `confirmed`, `messageID`, `ip`, `country`, `referrer`, `method`, `added_via`, `gdpr`, `notes`) VALUES
(1, 3, 'Phillip Morris', 'pmorris@gmail.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1642976825, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, 3, 'Jane Webster', 'jwebster@gmail.com', NULL, 2, 0, 0, 0, 0, NULL, NULL, 1642976825, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(3, 3, '', 'HermanMillerhmiller@gmail.com', NULL, 3, 0, 0, 0, 0, NULL, NULL, 1643026984, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(4, 3, '', 'JackRyanjryan@gmail.com', NULL, 3, 0, 0, 0, 0, NULL, NULL, 1643026984, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(5, 3, '', 'JillJilianjj@gmail.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1643027297, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(6, 3, '', 'JamesMcArthurjm@gmail.com', NULL, 4, 0, 0, 0, 0, NULL, NULL, 1643027297, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(7, 3, '', 'MaryMorstanmaymor@gmail.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1643027711, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(8, 3, '', 'KirklandKirkkirkk@gmail.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1643027711, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(9, 3, '', 'KirkDustinkirkydee@gmail.com', NULL, 5, 0, 0, 0, 0, NULL, NULL, 1643027711, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers_seg`
--

DROP TABLE IF EXISTS `subscribers_seg`;
CREATE TABLE IF NOT EXISTS `subscribers_seg` (
  `seg_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  PRIMARY KEY (`seg_id`,`subscriber_id`),
  KEY `s_sid` (`seg_id`),
  KEY `s_subscriber_id` (`subscriber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suppression_list`
--

DROP TABLE IF EXISTS `suppression_list`;
CREATE TABLE IF NOT EXISTS `suppression_list` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL,
  `block_attempts` int(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `template_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html_text` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `userID`, `app`, `template_name`, `html_text`) VALUES
(1, 3, 7, 'Miire', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>This is just a test template</strong></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is to inform you that you have been accepted into our brand training program</p>\r\n\r\n<p>In our training program, we provide...</p>\r\n\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, 'wxoixl.bRqKZsrhk/zbdNO', 1268889823, 1641767339, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `zapier`
--

DROP TABLE IF EXISTS `zapier`;
CREATE TABLE IF NOT EXISTS `zapier` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscribe_endpoint` varchar(100) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
