-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema project_erp
--

--
-- Definition of table `perp_cache`
--

DROP TABLE IF EXISTS `perp_cache`;
CREATE TABLE `perp_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_cache`
--

/*!40000 ALTER TABLE `perp_cache` DISABLE KEYS */;
INSERT INTO `perp_cache` (`key`,`value`,`expiration`) VALUES 
 ('356a192b7913b04c54574d18c28d46e6395428ab','i:2;',1715567012),
 ('356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1715567012;',1715567012),
 ('a17961fa74e9275d529f489537f179c05d50c2f3','i:1;',1715626402),
 ('a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1715626402;',1715626402);
/*!40000 ALTER TABLE `perp_cache` ENABLE KEYS */;


--
-- Definition of table `perp_cache_locks`
--

DROP TABLE IF EXISTS `perp_cache_locks`;
CREATE TABLE `perp_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_cache_locks`
--

/*!40000 ALTER TABLE `perp_cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_cache_locks` ENABLE KEYS */;


--
-- Definition of table `perp_contracts`
--

DROP TABLE IF EXISTS `perp_contracts`;
CREATE TABLE `perp_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `value` decimal(10,2) DEFAULT NULL,
  `milestone_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_contracts`
--

/*!40000 ALTER TABLE `perp_contracts` DISABLE KEYS */;
INSERT INTO `perp_contracts` (`id`,`member_id`,`project_id`,`subject`,`value`,`milestone_id`,`start_date`,`end_date`,`notes`,`created_at`,`updated_at`) VALUES 
 (4,7,5,'Payment','2005.00',4,'2024-05-16','2024-05-23','asdasd','2024-05-11 01:39:18','2024-05-11 01:39:18');
/*!40000 ALTER TABLE `perp_contracts` ENABLE KEYS */;


--
-- Definition of table `perp_expenses`
--

DROP TABLE IF EXISTS `perp_expenses`;
CREATE TABLE `perp_expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_expenses`
--

/*!40000 ALTER TABLE `perp_expenses` DISABLE KEYS */;
INSERT INTO `perp_expenses` (`id`,`name`,`date`,`amount`,`project_id`,`task_id`,`description`,`attachment`,`created_at`,`updated_at`) VALUES 
 (2,'Admin','2024-05-10','34343.00',5,3,'<p>bvv vbv</p>',NULL,'2024-05-11 02:56:00','2024-05-11 02:56:00'),
 (3,'noman','2024-05-09','12103.00',5,4,'<p>ikkmm</p>',NULL,'2024-05-11 02:56:41','2024-05-11 02:56:41');
/*!40000 ALTER TABLE `perp_expenses` ENABLE KEYS */;


--
-- Definition of table `perp_failed_jobs`
--

DROP TABLE IF EXISTS `perp_failed_jobs`;
CREATE TABLE `perp_failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_failed_jobs`
--

/*!40000 ALTER TABLE `perp_failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_failed_jobs` ENABLE KEYS */;


--
-- Definition of table `perp_invoices`
--

DROP TABLE IF EXISTS `perp_invoices`;
CREATE TABLE `perp_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_invoices`
--

/*!40000 ALTER TABLE `perp_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_invoices` ENABLE KEYS */;


--
-- Definition of table `perp_job_batches`
--

DROP TABLE IF EXISTS `perp_job_batches`;
CREATE TABLE `perp_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_job_batches`
--

/*!40000 ALTER TABLE `perp_job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_job_batches` ENABLE KEYS */;


--
-- Definition of table `perp_jobs`
--

DROP TABLE IF EXISTS `perp_jobs`;
CREATE TABLE `perp_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_jobs`
--

/*!40000 ALTER TABLE `perp_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_jobs` ENABLE KEYS */;


--
-- Definition of table `perp_members`
--

DROP TABLE IF EXISTS `perp_members`;
CREATE TABLE `perp_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `updated_at` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_members_1` (`role_id`),
  CONSTRAINT `FK_members_1` FOREIGN KEY (`role_id`) REFERENCES `perp_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_members`
--

/*!40000 ALTER TABLE `perp_members` DISABLE KEYS */;
INSERT INTO `perp_members` (`id`,`role_id`,`name`,`email`,`phone`,`updated_at`,`created_at`) VALUES 
 (7,5,'Noman','noman@gmail.com','01774673324','2024-05-11 14:19:40','2024-05-10 20:06:59'),
 (8,4,'nNoman','noman1@gmail.com','01774567874','2024-05-10 21:29:47','2024-05-10 21:29:47'),
 (9,4,'Mehedi','mehedi@gmail.com','01455532544','2024-05-13 21:29:08','2024-05-13 21:29:08');
/*!40000 ALTER TABLE `perp_members` ENABLE KEYS */;


--
-- Definition of table `perp_migrations`
--

DROP TABLE IF EXISTS `perp_migrations`;
CREATE TABLE `perp_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_migrations`
--

/*!40000 ALTER TABLE `perp_migrations` DISABLE KEYS */;
INSERT INTO `perp_migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'0001_01_01_000000_create_users_table',1),
 (2,'0001_01_01_000001_create_cache_table',1),
 (3,'0001_01_01_000002_create_jobs_table',1);
/*!40000 ALTER TABLE `perp_migrations` ENABLE KEYS */;


--
-- Definition of table `perp_milestones`
--

DROP TABLE IF EXISTS `perp_milestones`;
CREATE TABLE `perp_milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_milestones_1` (`project_id`),
  CONSTRAINT `FK_milestones_1` FOREIGN KEY (`project_id`) REFERENCES `perp_projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_milestones`
--

/*!40000 ALTER TABLE `perp_milestones` DISABLE KEYS */;
INSERT INTO `perp_milestones` (`id`,`project_id`,`name`,`status`,`progress`,`description`,`end_date`,`start_date`,`created_at`,`updated_at`) VALUES 
 (4,5,'Basement','completed',35,'Not','2024-05-17','2024-05-09','2024-05-10 02:52:34','2024-05-13 02:46:49'),
 (5,6,'Pailing','in_progress',10,'dfdsfdsf','2024-05-23','2024-05-16','2024-05-13 02:26:53','2024-05-13 02:46:54'),
 (6,7,'new Milestone','not_started',50,'dfsdf','2024-05-22','2024-05-08','2024-05-13 04:30:28','2024-05-13 04:30:28');
/*!40000 ALTER TABLE `perp_milestones` ENABLE KEYS */;


--
-- Definition of table `perp_password_reset_tokens`
--

DROP TABLE IF EXISTS `perp_password_reset_tokens`;
CREATE TABLE `perp_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_password_reset_tokens`
--

/*!40000 ALTER TABLE `perp_password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `perp_password_reset_tokens` ENABLE KEYS */;


--
-- Definition of table `perp_project_members`
--

DROP TABLE IF EXISTS `perp_project_members`;
CREATE TABLE `perp_project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_project_members_1` (`member_id`),
  KEY `FK_project_members_2` (`project_id`),
  CONSTRAINT `FK_project_members_1` FOREIGN KEY (`member_id`) REFERENCES `perp_members` (`id`),
  CONSTRAINT `FK_project_members_2` FOREIGN KEY (`project_id`) REFERENCES `perp_projects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_project_members`
--

/*!40000 ALTER TABLE `perp_project_members` DISABLE KEYS */;
INSERT INTO `perp_project_members` (`id`,`project_id`,`member_id`,`created_at`,`updated_at`) VALUES 
 (6,5,7,'2024-05-10 21:12:34','2024-05-10 21:12:34');
/*!40000 ALTER TABLE `perp_project_members` ENABLE KEYS */;


--
-- Definition of table `perp_projects`
--

DROP TABLE IF EXISTS `perp_projects`;
CREATE TABLE `perp_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `estimated_hours` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_projects`
--

/*!40000 ALTER TABLE `perp_projects` DISABLE KEYS */;
INSERT INTO `perp_projects` (`id`,`name`,`start_date`,`end_date`,`description`,`status`,`photo`,`budget`,`estimated_hours`,`tags`,`progress`,`created_at`,`updated_at`) VALUES 
 (5,'Construction','2024-05-17','2024-05-17','asdasfsaf','active','01HXG1XXGK06QPF903FANH172F.jpg','223.00',2,'sad, ',35,'2024-05-10 01:29:52','2024-05-10 15:21:02'),
 (6,'Building Home','2024-05-14','2024-05-23','<p>asdasdasdsad</p>','active','01HXQW4VFP0AVDQSYJ2AS4TGME.png','255000.00',255,'asdas',35,'2024-05-13 02:22:44','2024-05-13 02:22:44'),
 (7,'New Building','2024-05-15','2024-05-31','<p>asdfsdfasd</p>','active','01HXQW6J34009GVCPSRAET4B2Z.png','152000.00',200,'asdsadd',52,'2024-05-13 02:23:40','2024-05-13 02:23:40');
/*!40000 ALTER TABLE `perp_projects` ENABLE KEYS */;


--
-- Definition of table `perp_roles`
--

DROP TABLE IF EXISTS `perp_roles`;
CREATE TABLE `perp_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_roles`
--

/*!40000 ALTER TABLE `perp_roles` DISABLE KEYS */;
INSERT INTO `perp_roles` (`id`,`name`,`created_at`,`updated_at`) VALUES 
 (3,'Admin','2024-05-10 17:02:04','2024-05-10 17:02:04'),
 (4,'User','2024-05-10 17:03:16','2024-05-10 17:03:16'),
 (5,'Client','2024-05-10 17:03:21','2024-05-10 17:03:21');
/*!40000 ALTER TABLE `perp_roles` ENABLE KEYS */;


--
-- Definition of table `perp_sessions`
--

DROP TABLE IF EXISTS `perp_sessions`;
CREATE TABLE `perp_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_sessions`
--

/*!40000 ALTER TABLE `perp_sessions` DISABLE KEYS */;
INSERT INTO `perp_sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES 
 ('BkOXmmxp7qnbBW8A8Qwc8k9LdiAz5HI8nDy16yRB',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:125.0) Gecko/20100101 Firefox/125.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUGFrMWFsMFk2RXV1VW13OVN0eTFsYUhmd1BPWTRPWkJnejY4eVpscyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vbWVtYmVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRkQnlabjRVUGJ6SENkMTI5dG1nL0l1NVZRS3Y3NmlibHJGb2kuUlRsVmxWVWNwM3pCQ0ZIeSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==',1715635759);
/*!40000 ALTER TABLE `perp_sessions` ENABLE KEYS */;


--
-- Definition of table `perp_task_stages`
--

DROP TABLE IF EXISTS `perp_task_stages`;
CREATE TABLE `perp_task_stages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_task_stages_1` (`project_id`),
  CONSTRAINT `FK_task_stages_1` FOREIGN KEY (`project_id`) REFERENCES `perp_projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_task_stages`
--

/*!40000 ALTER TABLE `perp_task_stages` DISABLE KEYS */;
INSERT INTO `perp_task_stages` (`id`,`name`,`status`,`project_id`,`created_at`,`updated_at`) VALUES 
 (10,'Starting','inactive',5,'2024-05-10 22:29:53','2024-05-13 02:47:10');
/*!40000 ALTER TABLE `perp_task_stages` ENABLE KEYS */;


--
-- Definition of table `perp_tasks`
--

DROP TABLE IF EXISTS `perp_tasks`;
CREATE TABLE `perp_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `estimated_hours` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `milestone_id` int(11) DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `tsorder` int(11) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Members` (`member_id`),
  KEY `Projects` (`project_id`),
  KEY `Milestone` (`milestone_id`),
  KEY `Task_stage` (`stage_id`),
  CONSTRAINT `Members` FOREIGN KEY (`member_id`) REFERENCES `perp_members` (`id`),
  CONSTRAINT `Milestone` FOREIGN KEY (`milestone_id`) REFERENCES `perp_milestones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Projects` FOREIGN KEY (`project_id`) REFERENCES `perp_projects` (`id`),
  CONSTRAINT `Task_stage` FOREIGN KEY (`stage_id`) REFERENCES `perp_task_stages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perp_tasks`
--

/*!40000 ALTER TABLE `perp_tasks` DISABLE KEYS */;
INSERT INTO `perp_tasks` (`id`,`name`,`description`,`estimated_hours`,`start_date`,`end_date`,`member_id`,`project_id`,`milestone_id`,`stage_id`,`tsorder`,`progress`,`created_at`,`updated_at`) VALUES 
 (3,'new','<p>asdasd</p>',22,'2024-05-14','2024-05-29',7,5,4,10,NULL,50,'2024-05-11 00:24:21','2024-05-11 00:39:28'),
 (4,'Noman','<p>wqeqw</p>',221,'2024-05-15','2024-05-31',7,5,4,10,NULL,90,'2024-05-11 00:27:51','2024-05-11 00:39:47');
/*!40000 ALTER TABLE `perp_tasks` ENABLE KEYS */;


--
-- Definition of table `perp_users`
--

DROP TABLE IF EXISTS `perp_users`;
CREATE TABLE `perp_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_1` (`role_id`),
  CONSTRAINT `FK_users_1` FOREIGN KEY (`role_id`) REFERENCES `perp_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perp_users`
--

/*!40000 ALTER TABLE `perp_users` DISABLE KEYS */;
INSERT INTO `perp_users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role_id`) VALUES 
 (1,'admin','admin@gmail.com',NULL,'$2y$12$dByZn4UPbzHCd129tmg/Iu5VQKv76iblrFoi.RTlVlVUcp3zBCFHy','bXN2OXqkx0l3DpzQoTxNkok2ahiAqXJEiS0VjBc4zLAnahe9zDCczCFIIrkS','2024-05-09 23:38:58','2024-05-10 15:54:33',3),
 (2,'User','user@gmail.com',NULL,'$2y$12$YX1M87ZogoHBb7VPGW4SR./c1iIhYSIC.gNxDlloNM1tPAhtkigNW',NULL,'2024-05-10 18:06:26','2024-05-10 18:06:26',4),
 (3,'Client','client@gmail.com',NULL,'$2y$12$Ys40sXl2LCeUmSZHiu45H.uYywEidCBUXsag6ECOo9W0MWJW9p7.e',NULL,'2024-05-10 18:07:04','2024-05-10 18:43:34',5);
/*!40000 ALTER TABLE `perp_users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
