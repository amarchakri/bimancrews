-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 06:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crews`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:2;', 1720708648),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1720708648;', 1720708648);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `course_type_id` int(11) DEFAULT NULL,
  `course_name_short` varchar(255) NOT NULL,
  `course_name_long` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duration_number` int(11) DEFAULT NULL,
  `duration_in` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `employee_id`, `course_type_id`, `course_name_short`, `course_name_long`, `description`, `duration_number`, `duration_in`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SSC', 'Secondary School', 'School', 10, 'y', '2024-07-04 09:51:29', '2024-07-04 09:51:29'),
(2, 1, 1, 'HSC', 'Higher School', 'College', 2, 'y', '2024-07-04 09:52:01', '2024-07-04 09:52:01'),
(3, 1, 1, 'Bsc', 'Bachelors of sc', 'Bachelor', 4, 'y', '2024-07-04 09:58:32', '2024-07-04 09:58:32'),
(4, 6, 3, 'Hair cutting', 'hair cutting and shaving', '', 4, 'w', '2024-07-04 18:03:48', '2024-07-04 18:03:48'),
(5, 1, 3, 'Sweeming', 'Training', NULL, 10, 'd', '2024-07-05 10:41:12', '2024-07-05 10:41:12'),
(6, 1, 3, 'Sweeing', 'Training', '', 5, 'd', '2024-07-05 10:42:30', '2024-07-05 10:42:30'),
(7, 1, 2, 'SSCC', 'Training', NULL, 5, 'y', '2024-07-05 11:29:22', '2024-07-05 11:29:22'),
(8, 1, 1, 'BSS', 'Graduate', NULL, 5, 'y', '2024-07-05 11:37:58', '2024-07-05 11:37:58'),
(9, 3, 3, 'SEEP', 'SEEP', '', 2, 'y', '2024-07-08 03:40:21', '2024-07-08 03:40:21'),
(10, 3, 3, 'DGR', 'Danger Goods', '', 2, 'y', '2024-07-08 03:40:21', '2024-07-08 03:40:21'),
(11, 3, 3, 'CRM', NULL, NULL, 1, 'y', '2024-07-10 23:08:53', '2024-07-10 23:08:53'),
(12, 3, 3, 'Route Check', 'Route Check', '', 1, 'y', '2024-07-10 23:09:26', '2024-07-10 23:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `course_authorities`
--

CREATE TABLE `course_authorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_authorities`
--

INSERT INTO `course_authorities` (`id`, `employee_id`, `name`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 5, 'Dhaka Board', 'Dhaka', NULL, '2024-07-03 09:36:01', '2024-07-03 09:36:01'),
(2, 5, 'Sylhet board', 'Sylhet', 'Under graduate', '2024-07-03 09:41:34', '2024-07-03 09:41:34'),
(3, 5, 'Comilla Board', 'Comilla', 'School & College', '2024-07-03 10:04:33', '2024-07-03 10:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `course_types`
--

CREATE TABLE `course_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `courseType` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_types`
--

INSERT INTO `course_types` (`id`, `employee_id`, `courseType`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Basic Education', 'Basic curriculam Education like SSC, HSC, BSC', NULL, NULL),
(2, 1, 'Certificate', 'Short course that require certification for professional work', NULL, NULL),
(3, 1, 'Training', 'Professional training.', NULL, NULL),
(4, 1, 'Course', 'Individual course followed by certification or without certification', NULL, NULL),
(5, 3, 'Other', 'Not mentioned miscellaneous course', '2024-07-08 03:39:55', '2024-07-08 03:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_designation` varchar(255) DEFAULT NULL,
  `long_designation` varchar(255) DEFAULT NULL,
  `pseudo_designation` varchar(255) DEFAULT NULL,
  `duty_bound` varchar(255) DEFAULT NULL,
  `payGroup` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `short_designation`, `long_designation`, `pseudo_designation`, `duty_bound`, `payGroup`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Mantra', 'Mantra the greate', NULL, NULL, NULL, NULL, '2024-07-03 03:10:04', '2024-07-03 03:10:04'),
(2, 'Admin Asstt.', 'Santra strong', NULL, NULL, NULL, NULL, '2024-07-06 00:35:57', '2024-07-06 00:35:57'),
(3, 'Admin Supvr', 'Admin Supervisor', NULL, NULL, 'IV', 'Administration', '2024-07-12 04:12:01', '2024-07-12 04:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `designation_employee`
--

CREATE TABLE `designation_employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `duty_from` date DEFAULT NULL,
  `duty_to` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_employee`
--

INSERT INTO `designation_employee` (`id`, `designation_id`, `employee_id`, `duty_from`, `duty_to`, `type`, `reason`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, NULL, 1, 'Join', '2024-07-12 04:12:52', '2024-07-12 04:12:52'),
(2, 2, 2, NULL, NULL, 2, 'Rejoin', '2024-07-12 04:12:52', '2024-07-12 04:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_type` varchar(255) DEFAULT NULL,
  `number_type` varchar(255) DEFAULT NULL,
  `employee_no` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `roster_name` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `shop` int(11) DEFAULT NULL,
  `is_cockpit_crew` int(11) DEFAULT NULL,
  `is_admin_cell` int(11) DEFAULT NULL,
  `incharge_id` int(11) DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `employee_type`, `number_type`, `employee_no`, `first_name`, `middle_name`, `last_name`, `roster_name`, `profile_image`, `signature`, `present_address`, `permanent_address`, `shop`, `is_cockpit_crew`, `is_admin_cell`, `incharge_id`, `approver_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'G', 501010, 'Jamila', 'Munna', 'Miallat', 'Munna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 02:32:36', '2024-07-08 02:33:02'),
(2, 2, NULL, 'P', 35000, 'Yesmin', 'Khan', 'Miallat', 'Munna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 02:36:10', '2024-07-08 02:36:34'),
(3, 3, NULL, 'C', 101, 'Burhanul ', 'Khan', 'Ahmed', 'Ahsan', '1720708608-faces (2).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-08 02:37:03', '2024-07-11 08:36:48'),
(4, 4, NULL, 'P', 31000, 'Haider ', NULL, 'Ali', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 08:21:51', '2024-07-10 08:22:17'),
(5, 5, NULL, 'C', 501, 'Jesmin', NULL, 'Haider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 08:22:55', '2024-07-10 08:23:22'),
(6, 6, NULL, 'D', 999, 'Humain', NULL, 'Kabir', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 08:24:55', '2024-07-10 08:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_no` int(11) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `total_allocate` int(11) DEFAULT NULL,
  `total_availed` int(11) DEFAULT NULL,
  `total_available` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_no` int(11) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `leave_from` varchar(255) DEFAULT NULL,
  `leave_to` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `leave_address` varchar(255) DEFAULT NULL,
  `leave_total_applied` int(11) DEFAULT NULL,
  `total_available` int(11) DEFAULT NULL,
  `rest` int(11) DEFAULT NULL,
  `leave_status` int(11) DEFAULT NULL,
  `leave_incharge_status` int(11) DEFAULT NULL,
  `leave_approval_status` int(11) DEFAULT NULL,
  `leave_incharge_auth` int(11) DEFAULT NULL,
  `leave_admin_auth` int(11) DEFAULT NULL,
  `leave_approve_auth` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_reports`
--

CREATE TABLE `leave_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `licence_name_short` varchar(255) DEFAULT NULL,
  `licence_name_long` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `duration_number` int(11) DEFAULT NULL,
  `duration_in` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licence_user`
--

CREATE TABLE `licence_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_11_064405_create_employees_table', 1),
(5, '2024_05_12_095413_create_designations_table', 1),
(6, '2024_05_12_095513_create_emails_table', 1),
(7, '2024_05_12_095605_create_families_table', 1),
(8, '2024_05_12_095712_create_leaves_table', 1),
(9, '2024_05_12_095748_create_leave_details_table', 1),
(10, '2024_05_12_095841_create_licences_table', 1),
(11, '2024_05_12_100113_create_licence_user_table', 1),
(12, '2024_05_12_100436_create_off_days_table', 1),
(13, '2024_05_12_100546_create_passage_applicants_table', 1),
(14, '2024_05_12_100654_create_passages_table', 1),
(15, '2024_05_12_100758_create_phones_table', 1),
(16, '2024_05_12_100848_create_sectors_table', 1),
(17, '2024_05_12_102713_create_leave_reports_table', 1),
(18, '2024_05_13_100149_create_designation_pseudos_table', 1),
(19, '2024_05_13_100206_create_designation_duty_bounds_table', 1),
(20, '2024_06_09_165356_create_education_table', 1),
(21, '2024_06_09_165529_create_courses_table', 1),
(22, '2024_06_10_141952_create_proficiencies_table', 1),
(23, '2024_06_23_142835_create_responsibilities_table', 1),
(24, '2024_06_23_143403_create_designation_employee_table', 1),
(25, '2024_07_03_082604_create_course_types_table', 1),
(26, '2024_07_03_085147_create_course_authorities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `off_days`
--

CREATE TABLE `off_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `do_date` date NOT NULL,
  `utilization` int(11) DEFAULT NULL,
  `do_approve` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passages`
--

CREATE TABLE `passages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `applicants` int(11) NOT NULL,
  `passage_type` int(11) DEFAULT NULL,
  `visit_permission` varchar(255) DEFAULT NULL,
  `permission_date` date DEFAULT NULL,
  `leaveForPassage` int(11) NOT NULL,
  `sector_from1` varchar(255) DEFAULT NULL,
  `sector_to1` varchar(255) DEFAULT NULL,
  `sector_from2` varchar(255) DEFAULT NULL,
  `sector_to2` varchar(255) DEFAULT NULL,
  `passage_class` text DEFAULT NULL,
  `passage_way` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `discount_depend` int(11) DEFAULT NULL,
  `free_baggage` int(11) DEFAULT NULL,
  `admin_comment` varchar(255) DEFAULT NULL,
  `admin_verify` tinyint(1) DEFAULT NULL,
  `admin_date` date DEFAULT NULL,
  `approver` tinyint(1) DEFAULT NULL,
  `approver_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passage_applicants`
--

CREATE TABLE `passage_applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `family_id` int(11) NOT NULL,
  `passage_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `employee_no` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proficiencies`
--

CREATE TABLE `proficiencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `auth_employee_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_type_id` int(11) DEFAULT NULL,
  `course_authority_id` int(11) DEFAULT NULL,
  `institute` varchar(191) DEFAULT NULL,
  `executor` varchar(255) DEFAULT NULL,
  `aircraft` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `validupto` date DEFAULT NULL,
  `certificate_image` varchar(255) DEFAULT NULL,
  `transcript_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proficiencies`
--

INSERT INTO `proficiencies` (`id`, `employee_id`, `auth_employee_id`, `course_id`, `course_type_id`, `course_authority_id`, `institute`, `executor`, `aircraft`, `reference`, `start_date`, `end_date`, `validupto`, `certificate_image`, `transcript_image`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, NULL, 1, 'Mirpur', NULL, NULL, NULL, '2024-07-10', '2024-07-02', NULL, NULL, NULL, '2024-07-08 03:10:39', '2024-07-08 03:10:39'),
(2, 1, 3, 4, 3, 3, 'Agargaon', 'Someone', '787', 'RR', '2024-02-06', '2024-05-07', '2024-09-26', '1720429942-.trashed-1719265395-IMG_20240525_174210.jpg', '1720429942-.trashed-1719375194-IMG_20240523_194853.jpg', '2024-07-08 03:12:22', '2024-07-08 03:12:22'),
(3, 3, NULL, 4, 3, 3, 'BAY', 'holy', '777', 'RF', '2024-07-15', '2024-07-18', '2026-10-13', '1720430087-.trashed-1719541159-IMG_20240528_200211.jpg', '1720430087-.trashed-1719541191-IMG_20240528_152910.jpg', '2024-07-08 03:14:47', '2024-07-08 03:14:47'),
(4, 3, 3, 9, 3, 1, 'Institute A', 'Name', 'Dash-8', 'Reff', '2024-07-02', NULL, NULL, NULL, NULL, '2024-07-09 08:22:11', '2024-07-09 08:22:11'),
(5, 2, 3, 4, NULL, 2, 'Inst B', 'instructor', 'Dash-9', 'Ref', '2024-07-02', '2024-07-10', '2024-07-02', '1720535048-.trashed-1719375291-IMG_20240522_102947.jpg', '1720535048-.trashed-1719541202-IMG_20240528_152839.jpg', '2024-07-09 08:24:08', '2024-07-09 08:24:08'),
(6, 1, 3, 10, NULL, 3, 'Insta', 'person', 'Airbus', 'Refs', '2024-07-11', NULL, NULL, NULL, NULL, '2024-07-09 08:33:14', '2024-07-09 08:33:14'),
(7, 3, 3, 4, 3, 3, 'Mirpur Begnali medium', 'Sulo', 'Airbus', 'REFF', '2024-07-04', '2024-07-01', '2024-07-15', NULL, NULL, '2024-07-10 04:18:41', '2024-07-10 04:18:41'),
(8, 2, 3, 10, 3, 3, 'Mirpur medium', 'Hannan', 'DC-10', 'Ref', '2024-07-11', '2024-07-17', '2024-07-30', NULL, NULL, '2024-07-10 04:23:10', '2024-07-10 04:23:10'),
(9, 4, 3, 9, 3, 2, 'Saotali', 'Mamun', 'DC10', 'Ref', '2024-07-03', NULL, '2024-07-18', NULL, NULL, '2024-07-10 08:31:00', '2024-07-10 08:31:00'),
(10, 4, 3, 10, 3, 3, 'Mouli ', 'Humadi', 'DC10', NULL, '2024-07-05', NULL, NULL, NULL, NULL, '2024-07-10 08:34:29', '2024-07-10 08:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `airport` varchar(255) DEFAULT NULL,
  `IATAcode` varchar(255) DEFAULT NULL,
  `isBimanRoute` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RQW4ZkZ6oQAQBv7EjspzTmeejdpTXDa7WGtNwK2c', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiemhaTGwyMnlKRGRyOXQ4SWlXV3hGSjZpWENZWXphOWh6ZU5OV2xmWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1720779783);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_no`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '501010', '$2y$12$jxlm3TxcGb5pjvEp7095.uqeVujgQsVJpU0ePUOv5lsqrrhsZ4mYC', NULL, '2024-07-08 02:32:36', '2024-07-08 02:32:36'),
(2, '35000', '$2y$12$bxu52Zzw6xRANdb1usp26.gwfDpkl9V6BYoL7y1Ew1eE8D2DZY.2a', NULL, '2024-07-08 02:36:10', '2024-07-08 02:36:10'),
(3, '101', '$2y$12$g34Lsg9q5joNW0rrsRWZvertj2peHg5f4WMr/M..p9OarLx6DBNYy', NULL, '2024-07-08 02:37:03', '2024-07-08 02:37:03'),
(4, '31000', '$2y$12$uBFHl0IzZABLsVVupBXjeOsMOYHNxh6U9QiFq9vuj7FLqQSOcMIoS', NULL, '2024-07-10 08:21:51', '2024-07-10 08:21:51'),
(5, '501', '$2y$12$DvFrigDr3jDh.8rIxX9AcuPu1gPk6jnOvM6PYEswIyJhGFeF.evru', NULL, '2024-07-10 08:22:55', '2024-07-10 08:22:55'),
(6, '999', '$2y$12$h2VUXDAIeZjodehU9KEdfugMVaWUbuUrWMpdtldqWo3hFwkJ1osYy', NULL, '2024-07-10 08:24:55', '2024-07-10 08:24:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_authorities`
--
ALTER TABLE `course_authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_employee`
--
ALTER TABLE `designation_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emails_email_unique` (`email`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leaves_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `leaves_employee_no_unique` (`employee_no`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_reports`
--
ALTER TABLE `leave_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licence_user`
--
ALTER TABLE `licence_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `off_days`
--
ALTER TABLE `off_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passages`
--
ALTER TABLE `passages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passage_applicants`
--
ALTER TABLE `passage_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`employee_no`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phones_number_unique` (`number`);

--
-- Indexes for table `proficiencies`
--
ALTER TABLE `proficiencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_employee_no_unique` (`employee_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_authorities`
--
ALTER TABLE `course_authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation_employee`
--
ALTER TABLE `designation_employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_reports`
--
ALTER TABLE `leave_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licence_user`
--
ALTER TABLE `licence_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `off_days`
--
ALTER TABLE `off_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passages`
--
ALTER TABLE `passages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passage_applicants`
--
ALTER TABLE `passage_applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proficiencies`
--
ALTER TABLE `proficiencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
