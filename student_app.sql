-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 24, 2022 at 04:50 PM
-- Server version: 8.0.28
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(50, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(51, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(52, '2016_06_01_000004_create_oauth_clients_table', 1),
(53, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(56, '2022_05_23_153507_create_settings_table', 1),
(57, '2022_05_23_164740_create_student_profiles_table', 1),
(58, '2022_05_24_091055_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('48ac83a65ddc4d565b47aa6369afc4c4946e40804db0846c305e6332453d28b4d74e3a4fec190a69', 2, 2, NULL, '[]', 0, '2022-05-24 16:27:11', '2022-05-24 16:27:11', '2022-06-08 16:27:11'),
('be203c88aee12beae33250412b85915116e2e594b0ac2c78d9e5ea771f549bf1550a5c187c57aeef', 1, 2, NULL, '[]', 0, '2022-05-24 15:34:02', '2022-05-24 15:34:02', '2022-06-08 15:34:02'),
('c84500014cc52215977ab4c40543e3ca6615d8d4372689797f04d9af9eda11908b8708baea8f6353', 1, 2, NULL, '[]', 0, '2022-05-24 15:47:30', '2022-05-24 15:47:30', '2022-06-08 15:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'oQw2JtSXkO2I7LI2qVr0Dj81Oqm2U5dmY00UNKok', NULL, 'http://localhost', 1, 0, 0, '2022-05-24 15:31:35', '2022-05-24 15:31:35'),
(2, NULL, 'Laravel Password Grant Client', 'QVMwOWYhWJ1fhFHEzRLHTwBkvX8qhPBsoEr0hQYs', 'users', 'http://localhost', 0, 1, 0, '2022-05-24 15:31:40', '2022-05-24 15:31:40'),
(3, 1, '1', 'PSen1O6vyllRyPhDUmR0HIBIqClev73KF1BP2FGV', NULL, 'http://localhost/auth/callback', 0, 0, 0, '2022-05-24 15:51:54', '2022-05-24 15:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-05-24 15:31:39', '2022-05-24 15:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('162c33a836a891eb3a45c944d4f45a072827968aa3da1321fd19cfe9a90ad86bf95b4969125a8d53', '48ac83a65ddc4d565b47aa6369afc4c4946e40804db0846c305e6332453d28b4d74e3a4fec190a69', 0, '2022-06-23 16:27:11'),
('7707159aeb27565d2f8f75dd5b8fa0d8070ca60727f6e19bbadf52f821f79d3192b6c7c478aed62e', 'be203c88aee12beae33250412b85915116e2e594b0ac2c78d9e5ea771f549bf1550a5c187c57aeef', 0, '2022-06-23 15:34:03'),
('d53ecf1f2bd359da4fc71acc258ccece45f3f94a0cfe822f4173b96b7a051e98ad7020e4e6a188f7', 'c84500014cc52215977ab4c40543e3ca6615d8d4372689797f04d9af9eda11908b8708baea8f6353', 0, '2022-06-23 15:47:31');

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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-05-24 09:30:31', '2022-05-24 09:30:31'),
(2, 'student', 'web', '2022-05-24 09:30:31', '2022-05-24 09:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'StuApp', '2022-05-24 09:30:29', '2022-05-24 15:44:47'),
(2, 'app_description', 'Studnet app', '2022-05-24 09:30:29', '2022-05-24 15:56:27'),
(3, 'version', '0.2', '2022-05-24 09:30:30', '2022-05-24 15:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `student_reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`id`, `user_id`, `student_reg_no`, `address`, `dob`, `contact_no`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'REG-00000001', 'Badrian Street', '2022-05-11', '0777678678/', 'bottom_817stGUwH9dMnb9zy1nQ.png', '2022-05-24 11:12:43', '2022-05-24 16:28:13', NULL),
(2, 3, 'REG-00000002', 'devanam road', '2022-05-05', '0777678678', NULL, '2022-05-24 13:09:24', '2022-05-24 13:09:24', NULL),
(3, 4, 'REG-00000003', 'devanam road', '2022-05-10', '345678', NULL, '2022-05-24 13:09:52', '2022-05-24 13:09:52', NULL),
(4, 5, 'REG-00000004', 'Colombo 12', '1996-10-12', '0777678678', 'top_ur3hETYT8H3uLedhUetB.png', '2022-05-24 13:10:32', '2022-05-24 16:20:57', NULL),
(5, 6, 'REG-00000005', 'awdawd', '2022-05-06', '122112', NULL, '2022-05-24 13:13:43', '2022-05-24 13:13:43', NULL),
(6, 7, 'REG-00000006', 'Badrian Street', '2022-05-18', '12121212121212', 'bottom_kIwzhcf0h15tzMJ8bvug.png', '2022-05-24 13:14:51', '2022-05-24 16:27:59', NULL),
(7, 8, 'REG-00000007', 'devanam road', '2022-05-05', '232323', NULL, '2022-05-24 13:15:50', '2022-05-24 13:15:50', NULL),
(8, 9, 'REG-00000008', '232323', '2022-05-07', '2323', NULL, '2022-05-24 13:16:53', '2022-05-24 13:16:53', NULL),
(9, 10, 'REG-00000009', 'Colomb 10', '2022-05-17', '0777678678', 'top_d07QQAfhC5uMRakCyRNV.png', '2022-05-24 13:17:33', '2022-05-24 15:13:39', NULL),
(10, 11, 'REG-00000010', 'Colombo 12', '1996-10-12', '0777678678', NULL, '2022-05-24 16:00:49', '2022-05-24 16:00:49', NULL),
(11, 12, 'REG-00000011', 'Colombo 12', '1996-10-12', '0777678678', NULL, '2022-05-24 16:02:08', '2022-05-24 16:02:08', NULL),
(12, 13, 'REG-00000012', 'Colombo 12', '1996-10-12', '0777678678', NULL, '2022-05-24 16:09:53', '2022-05-24 16:09:53', NULL),
(13, 14, 'REG-00000013', 'negombo', '1986-08-02', '0777678678', NULL, '2022-05-24 16:41:49', '2022-05-24 16:41:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'M. Rifky', 'admin@gmail.com', NULL, '$2y$10$lNruso.cwC4b/HtgMNGspOyHu4BLOdyywYfj5e7fB4soNiPTswyhK', NULL, NULL, NULL, NULL),
(2, 'Rajeswaran S', 'rxs0528a@gmail.com', NULL, '$2y$10$UIMs6i9qDlgAcDZ50/JIceLgJAw./1g6N8Kg6pqx99ZKmCCeIpJEG', NULL, '2022-05-24 11:12:42', '2022-05-24 11:12:42', NULL),
(3, 'Mohamed Rifky', 'rifky@appletechlabs.com', NULL, '$2y$10$06Ww1NpBEqwf7Hcq9lR1OOxkHgEOZHYo6g644yZYzeZPDCm/5IxM2', NULL, '2022-05-24 13:09:23', '2022-05-24 13:09:23', NULL),
(4, 'apple 1', 'Hpbfzchcerpkm@maxresistance.com', NULL, '$2y$10$wSkuojtANupBKGPekPfzguI5RkgfFkXDL2FOEmEW2SkZQ63Zgsy/a', NULL, '2022-05-24 13:09:52', '2022-05-24 13:09:52', NULL),
(5, 'zamaniya', 'zaakiya@gmail.com', NULL, '$2y$10$M44sAjyZPUIi2/oJYnR6AubDlf/ETXo0Tuukpboz07ZSc24ixiC4C', NULL, '2022-05-24 13:10:32', '2022-05-24 16:20:57', NULL),
(6, 'rifky', 'azza@gmail.com', NULL, '$2y$10$.lQ60lFRlqOHb3LkV6cr7OeNr/rKAVY1NBl06QZ3LIpsRVAkyc5gS', NULL, '2022-05-24 13:13:43', '2022-05-24 13:13:43', NULL),
(7, 'Rajeswaran S', 'rxs05281111@gmail.com', NULL, '$2y$10$naI.eNtTMwYmH6zofDHOpugmiDuDHKCseJsFlIORqu8DVy7.kkMjq', NULL, '2022-05-24 13:14:50', '2022-05-24 13:14:50', NULL),
(8, 'apple 1', 'Hpbfzchc2323erpkm@maxresistance.com', NULL, '$2y$10$KA9g.ZSx5aYeyiBs3YGWtO.0PoOoXTQL6CNUIY5OukH5SyGTF4hga', NULL, '2022-05-24 13:15:50', '2022-05-24 13:15:50', NULL),
(9, '435678', 'awd@gmkail.com', NULL, '$2y$10$Udcsg8T8G1ZDqjlAY0VgV.GCePr29acM7VVlF46GrE1pfM11kAqEO', NULL, '2022-05-24 13:16:53', '2022-05-24 13:16:53', NULL),
(10, 'Shamila', 'red@gmail.com', NULL, '$2y$10$D12Q97/jncVUVqhJRgPOMesn1re5M0hlRRnrFMP5oN9gLDSch/3mO', NULL, '2022-05-24 13:17:33', '2022-05-24 14:58:36', NULL),
(11, 'zamaniya', 'gg@gmai.com', NULL, '$2y$10$Omd4LmeIiQizB6rlD/TLPeYuv6b.h9R9wl81NWVv6oV/hMbHr1A0K', NULL, '2022-05-24 16:00:49', '2022-05-24 16:00:49', NULL),
(12, 'zamaniya', 'ggd@gmai.com', NULL, '$2y$10$WIq6SJU0iXN0FI0TotXRq.N5dF5fIQ3T.QZ7rRpcBqlW2XQ8v4gqu', NULL, '2022-05-24 16:02:08', '2022-05-24 16:02:08', NULL),
(13, 'zamaniya', 'ggdd@gmai.com', NULL, '$2y$10$4Jaxj.MlkbM/MDS7IiVuBOoosOK9CNRf5mn8gZQ09ICkwaVH5OpMS', NULL, '2022-05-24 16:09:52', '2022-05-24 16:09:52', NULL),
(14, 'muksith fizroe', 'muksith@gmail.com', NULL, '$2y$10$C2SL6pNIIbIL/sEF4zzueuqpP8dgZYYqKDMdjXu3oUbKz9C1S7TVq', NULL, '2022-05-24 16:41:49', '2022-05-24 16:41:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
