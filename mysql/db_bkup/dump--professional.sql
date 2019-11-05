-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: professional
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employer_role`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer_role` (
  `id` bigint(20) NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_role`
--

LOCK TABLES `employer_role` WRITE;
/*!40000 ALTER TABLE `employer_role` DISABLE KEYS */;
INSERT INTO `employer_role` VALUES (1,1,5,NULL,NULL),(2,2,5,NULL,NULL),(3,2,2,NULL,NULL),(4,6,3,NULL,NULL),(5,4,6,NULL,NULL),(6,3,1,NULL,NULL),(7,5,7,NULL,NULL);
/*!40000 ALTER TABLE `employer_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_role_responsibilities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer_role_responsibilities` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `responsibility_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_role_responsibilities`
--

LOCK TABLES `employer_role_responsibilities` WRITE;
/*!40000 ALTER TABLE `employer_role_responsibilities` DISABLE KEYS */;
INSERT INTO `employer_role_responsibilities` VALUES (1,1,28,NULL,NULL),(2,2,28,NULL,NULL),(3,1,41,NULL,NULL),(4,2,41,NULL,NULL),(5,1,13,NULL,NULL),(6,1,13,NULL,NULL),(7,2,48,NULL,NULL),(8,5,48,NULL,NULL),(9,3,29,NULL,NULL),(10,6,36,NULL,NULL),(11,1,53,NULL,NULL),(12,2,19,NULL,NULL),(13,7,19,NULL,NULL),(14,3,27,NULL,NULL),(15,1,27,NULL,NULL),(16,7,38,NULL,NULL),(17,2,14,NULL,NULL),(18,1,14,NULL,NULL),(19,2,8,NULL,NULL),(20,2,42,NULL,NULL),(21,1,42,NULL,NULL),(22,2,10,NULL,NULL),(23,1,10,NULL,NULL),(24,1,16,NULL,NULL),(25,2,16,NULL,NULL),(26,3,26,NULL,NULL),(27,5,55,NULL,NULL),(28,5,54,NULL,NULL),(29,4,1,NULL,NULL),(30,7,30,NULL,NULL),(31,7,30,NULL,NULL),(32,1,43,NULL,NULL),(33,2,43,NULL,NULL),(34,6,37,NULL,NULL),(35,6,33,NULL,NULL),(36,2,23,NULL,NULL),(37,1,44,NULL,NULL),(38,2,44,NULL,NULL),(39,2,25,NULL,NULL),(40,5,50,NULL,NULL),(41,5,52,NULL,NULL),(42,5,51,NULL,NULL),(43,3,32,NULL,NULL),(44,3,31,NULL,NULL),(45,4,31,NULL,NULL),(46,5,57,NULL,NULL),(47,6,35,NULL,NULL),(48,1,9,NULL,NULL),(49,2,9,NULL,NULL),(50,1,34,NULL,NULL),(51,2,47,NULL,NULL),(52,1,47,NULL,NULL),(53,2,6,NULL,NULL),(54,1,11,NULL,NULL),(55,2,11,NULL,NULL),(56,1,22,NULL,NULL),(57,2,22,NULL,NULL),(58,1,21,NULL,NULL),(59,2,21,NULL,NULL),(60,4,2,NULL,NULL),(61,1,24,NULL,NULL),(62,5,49,NULL,NULL),(63,4,3,NULL,NULL),(64,1,15,NULL,NULL),(65,2,15,NULL,NULL),(66,1,18,NULL,NULL),(67,2,18,NULL,NULL),(68,5,56,NULL,NULL),(69,1,45,NULL,NULL),(70,2,45,NULL,NULL),(71,1,46,NULL,NULL),(72,4,4,NULL,NULL),(73,4,5,NULL,NULL),(74,4,20,NULL,NULL),(75,1,20,NULL,NULL),(76,7,20,NULL,NULL),(77,2,20,NULL,NULL);
/*!40000 ALTER TABLE `employer_role_responsibilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employers` (
  `id` bigint(20) NOT NULL,
  `employer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employers`
--

LOCK TABLES `employers` WRITE;
/*!40000 ALTER TABLE `employers` DISABLE KEYS */;
INSERT INTO `employers` VALUES (1,'Birmingham Clinical Trials Unit (BCTU)','The University of Birmingham Clinical Trials Unit (BCTU) is a leading national clinical trials unit, specialising in the design, conduct and analysis of definitive clinical trials and test evaluation studies.',NULL,NULL),(2,'Cancer Research UK Clinical Trials Unit','The Cancer Research UK Clinical Trials Unit (CRCTU) translates cutting edge science into improved patient care, both rapidly and safely, through the design and conduct of large multi-centre/international randomised trials as well as smaller more data intensive phase I trials of novel therapies.',NULL,NULL),(3,'Synstar Computer Services','Synstar International provided IT Support & Business Continuity services, principally in the automotive sector.',NULL,NULL),(4,'Suresite LTD','Suresite provides Compliance / Risk Management, Card Services, and Wetstock Management solutions to the retail petroleum sector.',NULL,NULL),(5,'Bechtel Water Technlogy','Bechtel Water Technology, based at Chadwick House, Risley, near Warrington, is the water engineering Centre of Excellence for Bechtel Group, Inc.',NULL,NULL),(6,'National Car Auctions','NCA provided automotive auction services to trade & public. ',NULL,NULL);
/*!40000 ALTER TABLE `employers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institutions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institutions` (
  `id` bigint(20) NOT NULL,
  `institution` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institutions`
--

LOCK TABLES `institutions` WRITE;
/*!40000 ALTER TABLE `institutions` DISABLE KEYS */;
INSERT INTO `institutions` VALUES (1,'North Metropolitan TAFE, Perth, Western Australia',NULL,NULL),(2,'University of Central Lancashire - Preston ,UK',NULL,NULL),(3,'Winstanley Sixth Form College, Billinge, Wigan, UK',NULL,NULL),(4,'The Byrchall High School – Ashton-in-Makerfield, UK ',NULL,NULL);
/*!40000 ALTER TABLE `institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',2),(3,'2019_08_19_000000_create_failed_jobs_table',3),(4,'2019_10_21_161413_create_employers_table',4),(5,'2019_10_21_161417_create_institutions_table',5),(6,'2019_10_21_161421_create_qualifications_table',6),(7,'2019_10_21_161425_create_roles_table',7),(8,'2019_10_21_161428_create_skills_table',8),(9,'2019_10_21_161432_create_employer_role',9),(10,'2019_10_21_161435_create_responsibilities_table',10),(11,'2019_10_21_161439_create_employer_role_responsibilities_table',11),(12,'2019_10_23_135249_create_modules_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` bigint(20) NOT NULL,
  `module` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_id` bigint(20) NOT NULL,
  `grade` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'English Language',1,'A',NULL,NULL),(2,'English Literature',1,'A',NULL,NULL),(3,'Biology',1,'A',NULL,NULL),(4,'Geography',1,'A',NULL,NULL),(5,'French',1,'B',NULL,NULL),(6,'Mathematics',1,'C',NULL,NULL),(7,'Physics',1,'C',NULL,NULL),(8,'Control Technology',1,'C',NULL,NULL),(9,'Economics',2,'A',NULL,NULL),(10,'Biology',2,'B',NULL,NULL),(11,'Modern History',2,'C',NULL,NULL),(12,'Business Economics',3,'2-1',NULL,NULL),(13,'Marketing Management',3,'2-1',NULL,NULL),(14,'Promotional Communications',3,'2-1',NULL,NULL),(15,'International Relations',3,'2-1',NULL,NULL),(16,'Participate effectively in Work Health & Safety communication & consultation process (WSBWHS304)',4,'CO',NULL,NULL),(17,'Create basic databases (ICTDBS403)',4,'CO',NULL,NULL),(18,'Determine & confirm client Business Requirements (ICTICT401)',4,'CO',NULL,NULL),(19,'Apply Software Development Methodologies (ICTICT403)',4,'CO',NULL,NULL),(20,'Contribute to copyright ethics & privacy in an ICT environment (ICTDBS403)  ',4,'CO',NULL,NULL),(21,'Confirm accessibility of websites for people with special needs (ICTWEB402)',4,'CO',NULL,NULL),(22,'Transfer content to a website using commercial packages (ICTWEB403)',4,'CO',NULL,NULL),(23,'Monitor traffic and compile Website Traffic Reports (ICTWEB405)',4,'CO',NULL,NULL),(24,'Develop Cascading Style Sheets (ICTWEB409)',4,'CO',NULL,NULL),(25,'Apply a web authoring tool to convert client data for websites (ICTWEB410)',4,'CO',NULL,NULL),(26,'Produce basic client-side script for Dynamic Web Pages (ICTWEB411)',4,'CO',NULL,NULL),(27,'Optimise search engines (ICTWEB413)',4,'CO',NULL,NULL),(28,'Design simple webpage layouts (ICTWEB414)',4,'CO',NULL,NULL),(29,'Produce server-side script for Dynamic Web Pages (ICTWEB415)',4,'CO',NULL,NULL),(30,'Integrate Social Web Technologies (ICTWEB417)',4,'CO',NULL,NULL),(31,'Use development tools & ICT tools to build a basic website (ICTWEB418)',4,'CO',NULL,NULL),(32,'Ensure website content meets technical protocols & standards (ICTWEB421)',4,'CO',NULL,NULL),(33,'Ensure website Access & Usability (ICTWEB422)',4,'CO',NULL,NULL),(34,'Evaluate & select a Web Hosting Service (ICTWEB424)',4,'CO',NULL,NULL),(35,'Apply Structured Query Language to extract & manipulate data (ICTWEB425)',4,'CO',NULL,NULL),(36,'Create a Markup Language Document to specification (ICTWEB429)',4,'CO',NULL,NULL);
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `id` bigint(20) NOT NULL,
  `qualification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_id` int(11) NOT NULL,
  `year_attained` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
INSERT INTO `qualifications` VALUES (3,'Bachelor of Arts (Honours)',2,'1995',NULL,NULL),(4,'Certificate IV in Web Technologies (Equivalent to UK Higher National Certficate',1,'2016',NULL,NULL),(2,'GCE (Advanced Level)',3,'1990',NULL,NULL),(1,'GCSE',4,'1988',NULL,NULL);
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsibilities`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsibilities` (
  `id` bigint(20) NOT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsibilities`
--

LOCK TABLES `responsibilities` WRITE;
/*!40000 ALTER TABLE `responsibilities` DISABLE KEYS */;
INSERT INTO `responsibilities` VALUES (28,'Adverse event reporting',NULL,NULL),(41,'Analysis',NULL,NULL),(13,'Bug-fixes',NULL,NULL),(17,'Code review',NULL,NULL),(48,'Code review',NULL,NULL),(29,'Collation of treatment records',NULL,NULL),(36,'Configuration of wireless devices',NULL,NULL),(53,'Contract to Invoice process (Contract, Booking, Billing Run, Invoice Approval) ',NULL,NULL),(19,'Data collection systems (Case Report Forms, lab results, patient questionaires etc)',NULL,NULL),(27,'Data-entry',NULL,NULL),(38,'Data-entry (BEWT)',NULL,NULL),(40,'Database backup (BEWT)',NULL,NULL),(14,'Day-to-day project management',NULL,NULL),(8,'DBA (eg. User / role Management, Maintenance Plans etc) ',NULL,NULL),(42,'Design',NULL,NULL),(10,'Design specification',NULL,NULL),(16,'Enhancement',NULL,NULL),(26,'Entering patients on the trial, via randomisation wizard',NULL,NULL),(55,'Factory pattern to derive a dynamic menu ',NULL,NULL),(54,'Finance Config (Tax Codes and Rates, Financial Products, Currency X-Change Rates) ',NULL,NULL),(1,'General tidiness of the yard',NULL,NULL),(30,'Generating data queries and reports',NULL,NULL),(43,'Implementation',NULL,NULL),(37,'Installation & service of terminals, printers, barcode scanners etc',NULL,NULL),(33,'Installation & support of servers and desktop PCs',NULL,NULL),(23,'Integration & maintenance of the Data Warehouse system',NULL,NULL),(12,'Maintenance',NULL,NULL),(44,'Maintenance',NULL,NULL),(25,'Maintenance of \'Control of Substances Hazardous to Health (COSHH)\' database',NULL,NULL),(50,'Manage Customers (Address, Bank Accounts, Contacts, Opening Hours) ',NULL,NULL),(52,'Manage Product and Items (Supplier Products and Price Lists for various currencies, Item Bundles and Prices for various currencies) ',NULL,NULL),(51,'Manage Suppliers (Address, Bank Accounts, Contacts) ',NULL,NULL),(32,'Managing participating centres (data warehouse)',NULL,NULL),(31,'Managing participating clinicians (data warehouse)',NULL,NULL),(7,'Manoeuvring & parking of vehicles on site',NULL,NULL),(57,'Modal window for info, forms and approval ',NULL,NULL),(35,'Monitoring of UNIX fail-over cluster',NULL,NULL),(9,'Needs elicitation',NULL,NULL),(34,'Offsite Backups',NULL,NULL),(47,'Policies & Procedures',NULL,NULL),(6,'Presentation of vehicles on sale days',NULL,NULL),(11,'Project Implementation',NULL,NULL),(22,'Randomisation systems',NULL,NULL),(21,'Reports',NULL,NULL),(2,'Route planning',NULL,NULL),(24,'Sample tracking & storage systems',NULL,NULL),(49,'Site Action to manage customer issues with history and context links to the CDM application',NULL,NULL),(3,'Speaking to customers',NULL,NULL),(15,'Standard Operating Procedures (SOPs)',NULL,NULL),(18,'Testing',NULL,NULL),(56,'User defined Lookup to enable the business to change the values in picklists ',NULL,NULL),(45,'User support',NULL,NULL),(46,'Using XML based code generation tools',NULL,NULL),(4,'Vehicle condition checks',NULL,NULL),(5,'Vehicle loading',NULL,NULL),(20,'Views',NULL,NULL),(39,'Writing data queries (BEWT)',NULL,NULL);
/*!40000 ALTER TABLE `responsibilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Track-side Engineer',3,NULL,NULL),(2,'Data Manager',2,NULL,NULL),(3,'Auction Driver',6,NULL,NULL),(4,'Analyst Programmer',1,NULL,NULL),(5,'Analyst Programmer',2,NULL,NULL),(6,'Laravel Developer',4,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` bigint(20) NOT NULL,
  `skill` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_skill_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'Accessibility / standards compliance',0,NULL,NULL),(2,'AGILE ',19,NULL,NULL),(3,'Analysis / Design Methodologies',0,NULL,NULL),(4,'ASP.NET ',53,NULL,NULL),(5,'Atom ',25,NULL,NULL),(6,'AXE',1,NULL,NULL),(7,'Backup (full,differential,transactional)',18,NULL,NULL),(8,'Bootstrap (v4) ',12,NULL,NULL),(9,'Build Tools',0,NULL,NULL),(10,'C# ',53,NULL,NULL),(11,'Client-side Development ',0,NULL,NULL),(12,'Client-side Frameworks',0,NULL,NULL),(13,'Client-side Languages',0,NULL,NULL),(14,'Client-side tools',0,NULL,NULL),(15,'Composer ',50,NULL,NULL),(16,'Connection Management ',18,NULL,NULL),(17,'CSS3 ',32,NULL,NULL),(18,'Database ',0,NULL,NULL),(19,'Development Methodologies',0,NULL,NULL),(20,'Emmet ',35,NULL,NULL),(21,'GIT',61,NULL,NULL),(22,'Hashicorp Vagrant ',63,NULL,NULL),(23,'HTML5',0,NULL,NULL),(24,'HTML5 ',32,NULL,NULL),(25,'Integrated Development Environments ',0,NULL,NULL),(26,'Jquery',13,NULL,NULL),(27,'JS (including AJAX & JSON) ',13,NULL,NULL),(28,'LAMP stack configuration ',53,NULL,NULL),(29,'Laravel ',53,NULL,NULL),(30,'Laravel Homestead',63,NULL,NULL),(31,'Laravel Mix ',9,NULL,NULL),(32,'Markup & Styling',0,NULL,NULL),(33,'Microdata',1,NULL,NULL),(34,'Microsoft SQL Server',18,NULL,NULL),(35,'Miscellaneous ',0,NULL,NULL),(36,'MySQL',18,NULL,NULL),(37,'MySQL Workbench',18,NULL,NULL),(38,'Navicat',18,NULL,NULL),(39,'Node',9,NULL,NULL),(40,'Oracle Virtualbox ',63,NULL,NULL),(41,'PHP ',53,NULL,NULL),(42,'PHP Storm',25,NULL,NULL),(43,'Policies & procedures ',1,NULL,NULL),(44,'Replication ',18,NULL,NULL),(45,'Reporting & Logging ',18,NULL,NULL),(46,'Responsive Web Design',1,NULL,NULL),(47,'SASS',9,NULL,NULL),(48,'Semantic HTML\'',56,NULL,NULL),(49,'SEO',0,NULL,NULL),(50,'Server Administration ',0,NULL,NULL),(51,'Server-side Development',0,NULL,NULL),(52,'Server-side Frameworks',0,NULL,NULL),(53,'Server-side Languages',0,NULL,NULL),(54,'Server-side Tools',0,NULL,NULL),(55,'SQL Server Management Studio (SSMS)',18,NULL,NULL),(56,'Standards / Validation',0,NULL,NULL),(57,'Storage configuration & monitoring ',18,NULL,NULL),(58,'Triggers ',18,NULL,NULL),(59,'User & Role Management ',18,NULL,NULL),(60,'Vb.net ',53,NULL,NULL),(61,'Version Control ',0,NULL,NULL),(62,'Views ',18,NULL,NULL),(63,'Virtualisation ',0,NULL,NULL),(64,'Visual Studio Code ',25,NULL,NULL),(65,'Vue',12,NULL,NULL),(66,'Vuetify',12,NULL,NULL),(67,'W3C',1,NULL,NULL),(68,'WAI/ARIA',1,NULL,NULL),(69,'Waterfall ',19,NULL,NULL),(70,'Yarn ',9,NULL,NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vwSkills`
--

SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vwSkills` (
  `pid` tinyint NOT NULL,
  `pskill` tinyint NOT NULL,
  `cid` tinyint NOT NULL,
  `cskill` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'professional'
--

--
-- Final view structure for view `vwSkills`
--

/*!50001 DROP TABLE IF EXISTS `vwSkills`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`spb`@`127.0.0.1` SQL SECURITY DEFINER */
/*!50001 VIEW `vwSkills` AS select `skills`.`parent_skill_id` AS `pid`,(select `skills`.`skill` from `skills` where (`skills`.`id` = `pid`)) AS `pskill`,`skills`.`id` AS `cid`,`skills`.`skill` AS `cskill` from `skills` where (`skills`.`parent_skill_id` <> 0) order by `skills`.`parent_skill_id`,`skills`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-23 17:47:55
