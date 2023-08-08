-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 04:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance-portal`
--

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_name` varchar(255) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `skills_required` varchar(255) DEFAULT NULL,
  `reward` decimal(10,0) DEFAULT NULL,
  `submission_date` timestamp NULL DEFAULT NULL,
  `issuer_name` varchar(255) DEFAULT NULL,
  `issuer_email` varchar(255) DEFAULT NULL,
  `issuer_phone_no` bigint(20) DEFAULT NULL,
  `assigned` tinyint(1) NOT NULL DEFAULT 0,
  `worker_email` varchar(255) DEFAULT NULL,
  `progress` varchar(255) NOT NULL DEFAULT 'not_completed',
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_name`, `job_description`, `skills_required`, `reward`, `submission_date`, `issuer_name`, `issuer_email`, `issuer_phone_no`, `assigned`, `worker_email`, `progress`, `updated_at`, `created_at`) VALUES
(1, 'Logo Designing', 'Are you a creative and talented graphic designer with a passion for creating visually stunning logos? We are looking for a skilled logo designer to join our team and help us craft unique and impactful logos for our clients. As a logo designer, you will play a crucial role in developing brand identities and visual representations for various businesses and organizations.', 'Designing, Coding', 74, '2023-08-05 17:00:00', 'Murali Bobby', 'bob@gmail.com', 9361549401, 1, 'bob@gmail.com', 'not_completed', '2023-08-07 06:20:54', '2023-08-02 16:41:40'),
(2, 'Content Creation', 'Create Content For youtube', 'English', 10000, '2023-09-05 04:30:00', 'Murali', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-02 17:22:34', '2023-08-02 17:22:34'),
(3, 'Content Creation', 'Create Content For youtube', 'English', 10000, '2023-09-05 04:30:00', 'Murali', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-02 17:23:38', '2023-08-02 17:23:38'),
(4, 'Drawing', 'Draw a bird', 'Drawing', 100, '2020-08-04 05:00:00', 'Bobby', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-02 17:55:57', '2023-08-02 17:55:57'),
(5, 'Drawing', 'Draw a bird', 'Drawing', 500, '2020-08-04 05:00:00', 'Bobby', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-04 01:57:07', '2023-08-02 18:08:54'),
(6, 'Drawing Bird', 'Draw a bird', 'Drawing', 50000, '2020-08-04 05:00:00', 'Bobby', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-04 02:16:24', '2023-08-02 18:09:02'),
(11, 'Documenting', 'Create Document For code', 'MS Word', 1000, '2023-09-10 04:30:00', 'Bobby', 'bob@gmail.com', 9361549401, 0, NULL, 'not_completed', '2023-08-04 05:25:39', '2023-08-04 05:25:39'),
(13, 'CODE COMMENTING', 'ADD COMMENTS TO EXISTING CODES', 'Coding Knowledge, Engilsh skills', 20000, '2023-08-25 19:00:00', 'Nirmala', 'nirmala@gmail.com', 9443699081, 1, 'nirmala@gmail.com', 'not_completed', '2023-08-07 06:02:59', '2023-08-05 05:25:49'),
(14, 'Video Editing', 'Edit function video', 'Editing skills', 1000, '2023-08-26 06:30:00', 'Bobby', 'bob@gmail.com', 9361549401, 1, 'nirmala@gmail.com', 'not_completed', '2023-08-07 06:53:40', '2023-08-07 06:48:43');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_05_194407_create_notifications_table', 2),
(6, '2023_08_05_204109_modify_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('b180ac80-531b-4381-97f8-65264b6ffe10', 'App\\Notifications\\JobInterestNotification', 'App\\Models\\User', 9, '{\"message\":\"User Nirmala is interested in your job: Video Editing\",\"job_id\":14,\"job_name\":\"Video Editing\",\"job_description\":\"Edit function video\",\"skills_required\":\"Editing skills\",\"user_id\":10,\"user_name\":\"Nirmala\",\"user_email\":\"nirmala@gmail.com\",\"user_phone\":919361549401,\"user_about\":\"I am a good worker\",\"user_resume\":\"resumes\\/OBGUGoKqVjKHppecMGwBuP1Br5LXW6sdBwKW3Vgx.pdf\",\"type\":\"request\"}', NULL, '2023-08-07 06:52:47', '2023-08-07 06:52:47'),
('edf2dd65-ec3a-4b15-acaf-6b4181279f85', 'App\\Notifications\\JobResponseNotification', 'App\\Models\\User', 10, '{\"message\":\"Your request for the job Video Editing is accepted by the job issuer: Bobby\",\"job_id\":14,\"job_name\":\"Video Editing\",\"job_description\":\"Edit function video\",\"skills_required\":\"Editing skills\",\"issuer_id\":9,\"issuer_name\":\"Bobby\",\"issuer_email\":\"bob@gmail.com\",\"issuer_phone\":917548898648,\"type\":\"response\"}', NULL, '2023-08-07 06:53:40', '2023-08-07 06:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `resume_path`, `skills`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@softui.com', '$2y$10$VVfcbxWVyONO..d6JXn5Yexdz5Oa1Tt4ux5tPp/smZSDyvy.rnBU2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-31 12:47:08', '2023-07-31 12:47:08'),
(3, 'Murali', 'murali@gmail.com', '$2y$10$8UIzSJBT7Bl/mB4TC8Mpw.QcO.rltj8Z6Y8zVoygKHk5D.U0C3BGy', 919361549401, NULL, NULL, NULL, NULL, NULL, '2023-08-01 02:18:17', '2023-08-01 02:18:17'),
(4, 'Sri', 'sri@gmail.com', '$2y$10$DjNgS5Wn/zEwWtDa5rGUg.mqdLTHKms1fKoCHAweG09B/edapb5xi', 917548898648, NULL, NULL, NULL, NULL, NULL, '2023-08-01 05:25:54', '2023-08-01 05:25:54'),
(7, 'priya', 'priya@gmail.com', '$2y$10$Kh5uiJ5SonDMollo8QXjHePonLBsjhWdNZPTWBXfD9bZ4bpFzcQIa', 917548898648, NULL, NULL, NULL, NULL, NULL, '2023-08-01 05:38:01', '2023-08-01 05:38:01'),
(8, 'Hari', 'hari@gmail.com', '$2y$10$qbs7ctgfNmND2qN0dGKkx.tCxa/v1JAGbdEOhMcHQsrgjPp0p1v9a', 917548898648, NULL, NULL, NULL, NULL, NULL, '2023-08-01 09:19:03', '2023-08-01 09:19:03'),
(9, 'Bobby', 'bob@gmail.com', '$2y$10$KDPDDk6IkWvQEjN/uVAhHOcM5xZbzEQwxuPFJ1DV8EKmsoOLh4LpK', 917548898648, NULL, 'Pro Coder', 'resumes/8hOLTjs3IDPNByhlkGbRgrtJlMcYNZ5UADoTIHAU.pdf', 'Skill 1,Skill 2,Skill 3', NULL, '2023-08-01 11:10:13', '2023-08-02 10:05:17'),
(10, 'Nirmala', 'nirmala@gmail.com', '$2y$10$pwJZWHon8iKvRl11SxmiNuYJzR2fTy6h3QvejiiBslcV8Fr1MJztu', 919361549401, NULL, 'I am a good worker', 'resumes/OBGUGoKqVjKHppecMGwBuP1Br5LXW6sdBwKW3Vgx.pdf', 'Content Creation,Graphic Designing', NULL, '2023-08-05 05:23:51', '2023-08-05 05:24:16');

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
