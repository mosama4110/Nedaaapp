-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 08:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohdnedaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_sizes`
--

CREATE TABLE `map_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mapsizes_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipients_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_sizes`
--

INSERT INTO `map_sizes` (`id`, `mapsizes_name`, `description`, `recipients_id`, `created_at`, `updated_at`) VALUES
(1, 'الصف السابع', NULL, 2, '2022-08-31 17:11:08', '2022-08-31 17:11:08'),
(2, 'الصف الأول', '1', 3, '2022-08-31 17:54:34', '2022-08-31 17:54:34'),
(3, 'الصف الثاني', NULL, 3, '2022-09-04 00:50:25', '2022-09-04 00:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_24_100818_create_archives_table', 1),
(6, '2022_07_25_043254_create_exports_table', 1),
(7, '2022_07_25_074550_create_recipients_table', 1),
(8, '2022_07_26_063310_create_map_sizes_table', 1),
(9, '2022_08_28_191845_drop_map_sizes', 1),
(10, '2022_08_29_174925_create_school_table', 1),
(11, '2022_08_30_104132_create_permission_tables', 1),
(12, '2014_10_12_000000_create_users_table', 2),
(13, '2022_08_31_055015_create_students_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'الفواتير', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(2, 'قائمة الفواتير', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(3, 'الفواتير المدفوعة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(4, 'الفواتير المدفوعة جزئيا', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(5, 'الفواتير الغير مدفوعة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(6, 'ارشيف الفواتير', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(7, 'التقارير', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(8, 'تقرير الفواتير', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(9, 'تقرير العملاء', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(10, 'المستخدمين', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(11, 'قائمة المستخدمين', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(12, 'صلاحيات المستخدمين', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(13, 'الاعدادات', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(14, 'المنتجات', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(15, 'الاقسام', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(16, 'اضافة فاتورة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(17, 'حذف الفاتورة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(18, 'تصدير EXCEL', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(19, 'تغير حالة الدفع', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(20, 'تعديل الفاتورة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(21, 'ارشفة الفاتورة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(22, 'طباعةالفاتورة', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(23, 'اضافة مرفق', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(24, 'حذف المرفق', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(25, 'اضافة مستخدم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(26, 'تعديل مستخدم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(27, 'حذف مستخدم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(28, 'عرض صلاحية', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(29, 'اضافة صلاحية', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(30, 'تعديل صلاحية', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(31, 'حذف صلاحية', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(32, 'اضافة منتج', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(33, 'تعديل منتج', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(34, 'حذف منتج', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(35, 'اضافة قسم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(36, 'تعديل قسم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(37, 'حذف قسم', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32'),
(38, 'الاشعارات', 'web', '2022-08-30 21:29:32', '2022-08-30 21:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipient_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `recipient_name`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'Owner', '', '2022-08-30 14:59:30', '2022-08-30 14:59:30'),
(2, 'المرحلة الإعدادية', 'المرحلة الإعدادية', 'Mohamed Osama', '2022-08-31 01:55:21', '2022-08-31 01:55:21'),
(3, 'المرحلة الإبتدائية', 'المرحلة الإبتدائية', 'Mohamed Osama', '2022-08-31 01:55:31', '2022-08-31 01:55:31'),
(4, 'المرحلة الثانوية', 'المرحلة الثانوية', 'Mohamed Osama', '2022-08-31 01:55:40', '2022-08-31 01:55:40'),
(5, 'مرحلة التعليم ما قبل المدرسي', NULL, 'Mohamed Osama', '2022-09-04 00:49:46', '2022-09-04 00:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'web', '2022-08-30 22:02:34', '2022-08-30 22:02:34'),
(2, 'test', 'web', '2022-08-31 00:34:11', '2022-08-31 00:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipients_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `school_type` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_add` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_phone` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_logo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `recipients_id`, `school_type`, `school_add`, `school_phone`, `profile_logo_path`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Owner', 1, 'Owner', 'Owner', 'Owner', NULL, NULL, '2022-08-30 15:00:06', '2022-09-04 21:03:12'),
(5, 'مدرسة كمال ناجي', 3, 'مستقلة', 'السلطة الجديدة', '444444', '222222', 'DFSDFDS', '2022-08-31 01:56:35', '2022-08-31 01:56:35'),
(7, 'مدرسة البيان الإبتدائية الثانية', 3, 'مستقلة', 'فريج كليب', '444444', 'شعار', NULL, '2022-09-05 00:18:07', '2022-09-05 00:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_nameen` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_idno` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_level` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Semester` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_img_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_nameen`, `student_idno`, `school_name`, `edu_level`, `Semester`, `rfid`, `student_img_path`, `description`, `created_at`, `updated_at`) VALUES
(1, 'أحمد المصطفي محمد', 'AHMED MOHAMED', '123456', 'مدرسة كمال ناجي', 'المرحلة الإبتدائية', '2', '3921390748', '11111', 'وصف', '2022-08-31 20:19:34', '2022-08-31 20:19:34'),
(2, 'أحمد محمد', 'AHMED OSMAN', '444433333', 'مدرسة كمال ناجي', 'المرحلة الإبتدائية', 'الصف الأول', '0363716948', '1111111', NULL, '2022-09-01 13:27:37', '2022-09-01 13:27:37'),
(3, 'منة محمد أسامة', 'AHMED MOHAMED', '123456', 'مدرسة البيان الإبتدائية الثانية', 'المرحلة الإبتدائية', 'الصف الثاني', '123456', '11111', NULL, '2022-09-04 00:57:42', '2022-09-04 00:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `school_id`, `user_phone`, `Status`, `roles_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Mohamed Osama', 's_kenana@gmail.com', NULL, '$2y$10$GdV.AEEZ2PdWQQr84VwqAeiRZyVhA70k0LilC3eigkeaUhaajO2Oa', 4, NULL, 'مفعل', '[\"owner\"]', NULL, '2022-08-30 22:02:34', '2022-08-30 22:02:34'),
(4, 'محمد أسامة', 's.kenana@gmail.com', NULL, '$2y$10$Hw1AcVHOFOIBGNjIOPSA5.LGpDg91XJllMVzsARMJZTyY5eK0.2Qi', 5, '222222', 'مفعل', '[\"test\"]', NULL, '2022-08-31 11:29:04', '2022-08-31 11:29:04'),
(6, 'محمد عبدالرحيم', 's.kenana@HOTMAIL.COM', NULL, '$2y$10$6RStN6dWXtk5tVS9bt9jj.3PNGHVd1Li0pdpR3jmzgxXmoTSVWVCi', 5, '11111111', 'غير مفعل', '[\"test\"]', NULL, '2022-08-31 11:31:55', '2022-08-31 12:05:13'),
(8, 'عفاف محمد', 'admin@admin.com', NULL, '$2y$10$zFhlo2VFdm7gs.DUUhdqAO8IfL7yfN.lJ.Yi/em/DGPMOJVTIOtjm', 7, '111111', 'مفعل', '[\"test\"]', NULL, '2022-09-05 00:21:04', '2022-09-05 00:21:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `map_sizes`
--
ALTER TABLE `map_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `map_sizes_recipients_id_foreign` (`recipients_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_recipients_id_foreign` (`recipients_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_school_id_foreign` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_sizes`
--
ALTER TABLE `map_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `map_sizes`
--
ALTER TABLE `map_sizes`
  ADD CONSTRAINT `map_sizes_recipients_id_foreign` FOREIGN KEY (`recipients_id`) REFERENCES `recipients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_recipients_id_foreign` FOREIGN KEY (`recipients_id`) REFERENCES `recipients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
