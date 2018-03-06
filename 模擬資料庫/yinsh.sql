-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_id_index` (`id`),
  KEY `announcements_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `announcements` (`id`, `user_id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(1,	9,	'我們的系統已上線',	' 麻煩各位以後有任何資訊設備維修的問題，請在此提交，謝謝',	'2017-10-11',	'2017-10-10 18:38:16',	'2017-10-24 18:42:13'),
(2,	16,	'關於耗材的領取事項',	' 麻煩各位領取耗材時，請報自己的姓名，方便我填寫領取人作業',	'2017-11-02',	'2017-11-02 11:21:06',	'2017-11-02 11:21:06');

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `maintaince_id` int(11) NOT NULL,
  `problem` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_id_index` (`id`),
  KEY `applications_user_id_index` (`user_id`),
  KEY `applications_maintaince_id_index` (`maintaince_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `applications` (`id`, `user_id`, `maintaince_id`, `problem`, `date`, `created_at`, `updated_at`) VALUES
(1,	15,	1,	'無法開機',	'2017-10-25',	'2017-10-24 18:54:04',	'2017-10-24 18:54:04'),
(2,	13,	2,	'開機開10分鐘開不起來',	'2017-11-02',	'2017-11-02 11:11:48',	'2017-11-02 11:11:48'),
(3,	15,	3,	'頻繁的藍屏',	'2017-11-02',	'2017-11-02 11:14:44',	'2017-11-02 11:14:44'),
(4,	17,	4,	'螢幕與主機連結好像有接觸不良斷斷續續的',	'2017-11-02',	'2017-11-02 11:17:30',	'2017-11-02 11:17:30');

DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `keeper` int(11) NOT NULL,
  `lendable` tinyint(1) NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `vendor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `warranty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assets_id_index` (`id`),
  KEY `assets_category_index` (`category`),
  KEY `assets_keeper_index` (`keeper`),
  KEY `assets_warranty_index` (`warranty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `assets` (`id`, `name`, `category`, `date`, `cost`, `status`, `keeper`, `lendable`, `location`, `remark`, `vendor`, `warranty`, `created_at`, `updated_at`) VALUES
(1,	'Asus螢幕顯示器001',	1,	'2012-04-22',	60000,	'維修中',	10,	1,	'會議室B1',	'',	'4',	25,	'2017-10-10 18:44:55',	'2017-11-02 11:14:44'),
(2,	'Asus電腦主機001',	2,	'2012-03-26',	6000,	'維修中',	9,	0,	'會議室B1',	'',	'4',	2,	'2017-10-10 18:45:49',	'2017-11-02 11:04:16'),
(3,	'會議用投影機001',	1,	'2010-03-10',	30000,	'正常使用中',	14,	0,	'辦公室C區1樓',	'',	'1',	35,	'2017-10-10 18:47:55',	'2017-11-02 11:04:02'),
(4,	'Apple筆記型電腦001',	9,	'2008-02-28',	70000,	'正常使用中',	12,	1,	'資訊管理室',	'',	'2',	30,	'2017-10-10 18:49:11',	'2017-10-24 18:49:41'),
(5,	'Apple筆記型電腦002',	9,	'1996-12-13',	30000,	'維修中',	13,	0,	'辦公室A區3樓',	'',	'2',	20,	'2017-10-24 18:48:38',	'2017-11-02 11:11:48'),
(6,	'Acer電腦螢幕002',	1,	'1996-12-09',	10000,	'維修中',	17,	0,	'五樓會議室',	'',	'5',	5,	'2017-11-02 10:53:17',	'2017-11-02 11:17:30'),
(7,	'Asus筆記型電腦001',	9,	'2017-09-05',	30000,	'正常使用中',	19,	0,	'資訊管理室',	'',	'4',	20,	'2017-11-02 11:00:59',	'2017-11-02 11:03:14'),
(8,	'三星平板電腦001',	10,	'2015-03-05',	20000,	'租借中',	17,	1,	'辦公室B區3樓',	'',	'1',	25,	'2017-11-02 11:07:38',	'2017-11-02 11:09:47');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'顯示器',	NULL,	NULL),
(2,	'主機',	NULL,	NULL),
(6,	'投影機',	NULL,	NULL),
(7,	'喇叭',	NULL,	NULL),
(9,	'筆記型電腦',	NULL,	NULL),
(10,	'平板',	NULL,	NULL),
(11,	'其他',	NULL,	NULL);

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supervisor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `departments` (`id`, `name`, `supervisor`, `created_at`, `updated_at`) VALUES
(1,	'營業部',	2,	NULL,	NULL),
(2,	'管理部',	3,	NULL,	NULL),
(3,	'加工部',	4,	NULL,	NULL),
(4,	'生產部',	5,	NULL,	NULL),
(5,	'研發部',	6,	NULL,	NULL),
(6,	'財務部',	7,	NULL,	NULL),
(7,	'人力資源部',	8,	NULL,	NULL),
(8,	'資訊管理室',	9,	NULL,	NULL),
(9,	'檢測實驗室',	10,	NULL,	NULL);

DROP TABLE IF EXISTS `lendings`;
CREATE TABLE `lendings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `lenttime` date NOT NULL,
  `returntime` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lendings_user_id_index` (`user_id`),
  KEY `lendings_asset_id_index` (`asset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `lendings` (`id`, `user_id`, `asset_id`, `lenttime`, `returntime`, `created_at`, `updated_at`) VALUES
(1,	10,	4,	'2017-10-25',	'2017-10-25',	'2017-10-24 18:49:32',	'2017-10-24 18:49:41'),
(2,	15,	8,	'2017-11-02',	NULL,	'2017-11-02 11:09:46',	'2017-11-02 11:09:46');

DROP TABLE IF EXISTS `maintainceitems`;
CREATE TABLE `maintainceitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maintaince_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintainceitems_id_index` (`id`),
  KEY `maintainceitems_maintaince_id_index` (`maintaince_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `maintainces`;
CREATE TABLE `maintainces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintainces_id_index` (`id`),
  KEY `maintainces_asset_id_index` (`asset_id`),
  KEY `maintainces_vendor_id_index` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `maintainces` (`id`, `asset_id`, `vendor_id`, `date`, `status`, `method`, `remark`, `created_at`, `updated_at`) VALUES
(1,	2,	3,	NULL,	'申請待處理',	'未選擇',	NULL,	'2017-10-24 18:54:04',	'2017-11-02 11:18:28'),
(2,	5,	2,	NULL,	'申請中',	'未選擇',	NULL,	'2017-11-02 11:11:48',	'2017-11-02 11:11:48'),
(3,	1,	4,	NULL,	'申請中',	'未選擇',	NULL,	'2017-11-02 11:14:44',	'2017-11-02 11:14:44'),
(4,	6,	5,	NULL,	'申請待處理',	'未選擇',	NULL,	'2017-11-02 11:17:30',	'2017-11-02 11:19:11');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table',	1),
('2014_10_12_100000_create_password_resets_table',	1),
('2016_08_29_093420_create_posts_table',	1),
('2017_05_01_083321_create_assets_table',	2),
('2017_05_04_091147_create_categorie_table',	2),
('2017_05_07_155155_create_supplies_table',	2),
('2017_05_17_132419_create_applications_table',	2),
('2017_05_18_011958_create_maintainces_table',	2),
('2017_05_18_205743_create_receives_table',	2),
('2017_05_22_023653_create_vendors_table',	2),
('2017_06_02_071319_create_maintainceitems_table',	2),
('2017_06_19_065305_create_announcements_table',	2),
('2017_06_29_073732_create_departments_table',	2),
('2017_07_17_084724_create_previleges_table',	2),
('2017_07_18_122033_create_lendings_table',	2);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shark85423@gmail.com',	'cf60d8376baa23c9058890e598e71ae74c45a6984bb7bf976db5a23d86efb323',	'2017-08-02 20:48:12');

DROP TABLE IF EXISTS `previleges`;
CREATE TABLE `previleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `previleges` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'員工',	NULL,	NULL),
(2,	'部門主管',	NULL,	NULL),
(3,	'MIS人員',	NULL,	NULL),
(4,	'系統管理員',	NULL,	NULL);

DROP TABLE IF EXISTS `receives`;
CREATE TABLE `receives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receives_user_id_index` (`user_id`),
  KEY `receives_supply_id_index` (`supply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplies_id_index` (`id`),
  KEY `supplies_quantity_index` (`quantity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `supplies` (`id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1,	'空白光碟片',	60,	NULL,	'2017-10-24 18:43:27'),
(2,	'印表機墨水-黑',	10,	NULL,	NULL),
(3,	'印表機墨水-紅',	15,	NULL,	NULL),
(4,	'印表機墨水-黃',	15,	NULL,	NULL),
(5,	'印表機墨水-藍',	8,	NULL,	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `previlege_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `extension`, `position`, `phone`, `department_id`, `previlege_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(9,	'黃文岳',	'mis001@gmail.com',	'$2y$10$2/L1AW5M6LyxuQipdr/ywufPFVwPizSA3Arb8IizSICrZCdWC1V.m',	'',	'',	'',	8,	3,	'8B1IwnT54C9sRkPU2ER7B0p8V4qT7Wu4vKhBVACTPqzhPKoi4RpASJ1oKowm',	'2017-10-10 18:18:26',	'2017-11-02 11:10:27'),
(10,	'王曉明',	'supervisor101@gmail.com',	'$2y$10$rGlU8pWI9jWBaN2CPeZoGegs1M05DNuXqrgHGILWeHRi.PPqCZbIK',	'133',	'營業部主管',	'',	1,	2,	'kZf6Bz6g7nRcFLrJtSzcY1Mirc33BvqLea4VesYJdHMbXY0SHgjUPQ4DYjBw',	'2017-10-10 18:30:06',	'2017-10-24 18:51:43'),
(11,	'李銘輝',	'supervisor102@gmail.com',	'$2y$10$glVK6lBoPJINKv1OTPASKeViMO3FgdzmiCjQoLI7mjWwunFCx4K/2',	'',	'管理部主管',	'',	2,	2,	NULL,	'2017-10-10 18:31:58',	'2017-10-10 18:31:59'),
(12,	'陳偉玲',	'supervisor103@gmail.com',	'$2y$10$bRUJffLj04.200Y2CU1s7OxIgjfXC4AwhYMLW2lWGhzqQTrW633RS',	'666',	'加工部主管',	'',	3,	2,	NULL,	'2017-10-10 18:33:18',	'2017-10-10 18:33:18'),
(13,	'陳子豪',	'user001@gmail.com',	'$2y$10$kaCIT5P9LXNDtmyXehpo0ukjrEIa42uJfVDxlflEdausl5djfEmte',	'',	'',	'',	4,	1,	'uTWxNuc0LzdmmIS5og0S2YJ3XRsWGna53hEYqg8P7bm9Qi82uFAP2MpeA4Ja',	'2017-10-10 18:34:33',	'2017-11-02 11:12:27'),
(14,	'系統管理員-mis',	'management@gmail.com',	'$2y$10$UR8z.xX1jDYEReACNi5/cuxzDHDNTHZPlQvIzBO7Brqe.5AjLeCAm',	'',	'',	'',	8,	4,	NULL,	'2017-10-10 18:35:40',	'2017-10-10 18:35:41'),
(15,	'王大名',	'user004@gmail.com',	'$2y$10$77YfiHJ/dUhyEVcfbAiV7ObpFWj9gcwtSoPR01/i0Q5/bGmm3Wo5y',	'333',	'員工',	'0423512222',	1,	1,	'cohAjpxbCxvf2QFxHqVSjV18SAdvyDO3jU11QfbPtUOuK1IAJQrCXNUWLBfj',	'2017-10-24 18:53:08',	'2017-11-02 11:15:04'),
(16,	'王嘉佳',	'misyinsh001@gmail.com',	'$2y$10$x/3PNHry5KFmIfeclouX8eiouM0OvtWYpFhs2lSu.mRCunF4uB1E6',	'113',	'MIS人員',	'0988-555-888',	8,	3,	'7cxlezzAcXqD7wfOgT9o6iM8V1n4nlZrVQpuAaNIiD77fPpstaRqhkdJCezf',	'2017-11-02 10:48:50',	'2017-11-02 11:25:37'),
(17,	'李欣',	'useryinsh001@gmail.com',	'$2y$10$UjRDChSZWsth6TRYJIx7SObtI3ZZcHU8gtpHQGwoFfhwE07fNfYza',	'167',	'人資部員工',	'0955-777-666',	7,	1,	'H22LqqIuKF3NVkYjbyb9RskOJxq4vvDR6ZbMwUPqm4NtouuEP73f3DN2aEbI',	'2017-11-02 10:49:56',	'2017-11-02 11:17:39'),
(18,	'曾萌',	'moneyyinsh001@gmail.com',	'$2y$10$u358EFwGH2e3Zj0bP.qvhe2kGV3Vgc6DzhQ46G86.HXpdqZY3PlvC',	'',	'會計人員',	'',	6,	1,	NULL,	'2017-11-02 10:50:45',	'2017-11-02 10:50:45'),
(19,	'陳慧玲',	'supervisoryinsh@gmail.com',	'$2y$10$Y0RlnF8.unMG/jpa38gp3utP6e9HtKjP/3lESyr2HtAa1feWlOFRC',	'675',	'',	'',	7,	2,	'kd3u7WtOmBFPuQb7coutSty2cipXF7h7GAO9Ka4m8dc3oBScXj5dDGql0y7L',	'2017-11-02 10:51:33',	'2017-11-02 11:24:01');

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cantactperson` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankaccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendors_name_index` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `vendors` (`id`, `name`, `cantactperson`, `phone`, `address`, `bankname`, `bankaccount`, `remark`, `created_at`, `updated_at`) VALUES
(1,	'三星股份有限公司',	'董曉華',	'0423518060',	'台中市太平區太平路65號',	'',	'',	'',	'2017-10-10 18:36:52',	'2017-10-10 18:36:52'),
(2,	'Apple股份有限公司',	'賈伯斯',	'0423518044',	'台中市北屯區中正路555號',	'',	'',	'',	'2017-10-10 18:41:29',	'2017-10-10 18:41:29'),
(3,	'鼎新股份有限公司',	'宋曉穎',	'0423518642',	'台中市南屯區中山路一段560號',	'中國信託',	'2131313121586',	'資金匯款為主',	'2017-10-10 18:42:56',	'2017-10-10 18:42:56'),
(4,	'Asus',	'陳麗皇',	'04-23515060',	'台中市太平區東平路656號',	'華南銀行',	'313213213216',	'',	'2017-11-02 11:01:58',	'2017-11-02 11:01:58'),
(5,	'Acer',	'謝政和',	'04-23517682',	'台中市南屯區中山路537號',	'',	'',	'',	'2017-11-02 11:03:02',	'2017-11-02 11:03:02');

-- 2017-11-02 19:26:11
