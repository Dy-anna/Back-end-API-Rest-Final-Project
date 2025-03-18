-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 18 mars 2025 à 10:11
-- Version du serveur : 9.0.1
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sport_event`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_participants` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`),
  KEY `events_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `description`, `location`, `date`, `category`, `max_participants`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Match de Football PSG vs MADRID', 'match-football-psg-om', 'Un super match entre PSG et OM.', 'Stade de France, Paris', '2024-06-20', 'Football', 49997, 4, '2025-03-17 17:34:07', '2025-03-18 09:05:59'),
(2, 'Castre VS Toulouse', 'castre-vs-toulouse', 'Venez voir un grand match', 'Paris la defense arena', '2025-03-30', 'Football', 3000, 4, '2025-03-17 17:31:07', '2025-03-17 17:31:07'),
(3, 'test', 'test', 'test', 'Paris', '2025-03-15', 'Tennis', 22, 4, '2025-03-17 17:38:35', '2025-03-18 09:05:25'),
(4, 'QZDzDZ', 'qzdzdz', 'DzqdQDzqDQ', 'QDqDQd', '2025-03-07', 'Football', 454, 4, '2025-03-17 17:49:17', '2025-03-17 17:49:17'),
(5, 'QDdZQdqDqd', 'qddzqdqdqd', 'QddZdqd', 'QDqDQdQZd', '2025-06-11', 'Football', 8376, 4, '2025-03-17 17:49:35', '2025-03-17 17:49:35'),
(6, 'dqdqzdqzdzq', 'dqdqzdqzdzq', 'dqzdqzdqzdqzdq', 'QDZDQDD', '2025-03-18', 'Football', 1132, 4, '2025-03-17 17:49:48', '2025-03-17 17:49:48'),
(7, 'QDQZDQZDQZDQZ', 'qdqzdqzdqzdqz', 'DQDQDQZDZQDQD', 'QDQZDZQDQZD', '2025-03-12', 'Football', 132, 4, '2025-03-17 17:49:58', '2025-03-17 17:49:58');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorites_user_id_foreign` (`user_id`),
  KEY `favorites_event_id_foreign` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(3, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_10_154127_create_personal_access_tokens_table', 1),
(5, '2025_03_10_154643_create_events_table', 2),
(6, '2025_03_18_094635_create_favorites_table', 3),
(7, '2025_03_18_100154_create_registrations_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\User', 5, 'auth_token', 'ee8163aee281ad6b2fbcfdeec583deed24c1610b906be06495b1063938ae7f37', '[\"*\"]', NULL, NULL, '2025-03-15 09:17:23', '2025-03-15 09:17:23'),
(8, 'App\\Models\\User', 6, 'auth_token', 'b3ec57faf4350f09fee812a82efcc8e6fd939d6d0ea9494157b4b60e57d19390', '[\"*\"]', NULL, NULL, '2025-03-15 09:22:24', '2025-03-15 09:22:24'),
(71, 'App\\Models\\User', 7, 'auth_token', '3efbeb43807107de69652fb24c6984dac54574dc5b865cc1c4a2cba6e16bcb21', '[\"*\"]', NULL, NULL, '2025-03-17 15:50:40', '2025-03-17 15:50:40'),
(81, 'App\\Models\\User', 8, 'auth_token', '2f667291dd6dd1a75a248adb923698102133a73c9593ce44b806a86587493609', '[\"*\"]', NULL, NULL, '2025-03-17 16:22:02', '2025-03-17 16:22:02'),
(98, 'App\\Models\\User', 9, 'auth_token', 'c8ccf875c5537748b604a156f75e9796ed8a5953af258fe1584caa78c1a85ae5', '[\"*\"]', NULL, NULL, '2025-03-17 16:57:06', '2025-03-17 16:57:06'),
(102, 'App\\Models\\User', 4, 'auth_token', '2e609a45d73f64acfbf1fd66d4c9e2c20872fe76e17d048ff7f03b2ef726650c', '[\"*\"]', NULL, NULL, '2025-03-17 16:59:17', '2025-03-17 16:59:17'),
(103, 'App\\Models\\User', 10, 'auth_token', '1944081e98162967b7c12c89dd019b5dcd2fcfbc4048d615fc2007a6351a1d09', '[\"*\"]', NULL, NULL, '2025-03-17 18:14:11', '2025-03-17 18:14:11'),
(104, 'App\\Models\\User', 11, 'auth_token', '1f01911a898d0d47432b3e021bc6d011f8bab0a433035bee1722106204795e29', '[\"*\"]', NULL, NULL, '2025-03-17 18:15:37', '2025-03-17 18:15:37');

-- --------------------------------------------------------

--
-- Structure de la table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrations_user_id_foreign` (`user_id`),
  KEY `registrations_event_id_foreign` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `registrations`
--

INSERT INTO `registrations` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(3, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('B4ugQsSwCdLXwXCuWleLpLrnNudK7DCwV5feOcj0', NULL, '127.0.0.1', 'PostmanRuntime/7.43.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGxZOFFodVQ2WEVkZThXQ0RxTmJtT1ZhUVRvN1JpTEdpNnNubnU0byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741622986),
('B73lYybJn5jGm1v7MDWCNNC1fg71ikWUVvNNCnUw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0hoZjJRaWVIdDBFeDdxQzFRVjFwaEhOdzRtWFZRWmRvdmo0b2lnMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741625933),
('saIc7BNG5xNM3jlVVqzGYnmOlPCxMJkSY7aUzbjT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkN3dFJUaXp3SWc4SWVBVFF6VUVKb3EzdWZUN2o3Z2QyelJqTEpLVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741962739);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Joe Doe', 'joe@example.com', NULL, '$2y$12$zVCfyYAhBHUVINU0FQcHxuZVqNpM8KMeW0q4rr7JXql2kpcQpKvYq', NULL, '2025-03-10 15:07:29', '2025-03-10 15:07:29'),
(3, 'martin Doe', 'martin@example.com', NULL, '$2y$12$XcZ5hIpTUqHvYj0gfFDwKuhd9F0oBwpy8rLe94jpFJ8YCFhpd.RiC', NULL, '2025-03-10 15:10:11', '2025-03-10 15:10:11'),
(4, 'Maximilien', 'maximilieng8@gmail.com', NULL, '$2y$12$fvAIiWNu0ZhHvmauIltR7.qRkUuZkLPvOjVjDCKwGmF0L3LQ20Yiu', NULL, '2025-03-14 13:15:45', '2025-03-14 13:15:45'),
(5, 'John Doe', 'johndoe@example.com', NULL, '$2y$12$K1V9D3zl3r64vweOmcT59.8dfTRYer4z4d32zzaTVQj7giaOsr/Qm', NULL, '2025-03-15 09:17:23', '2025-03-15 09:17:23'),
(6, 'John', 'john@example.com', NULL, '$2y$12$nJ15kqh46Jdh3vUeM.V76.F2szGWhTKHVTaS/4YuGg0R2vVoX7gLG', NULL, '2025-03-15 09:22:24', '2025-03-15 09:22:24'),
(7, 'test', 'test@test.test', NULL, '$2y$12$lyLhkQE.ThFZI3JKRLjHqe1z/AjWzK3G5VEYj.s9i271Cu8Jf82.2', NULL, '2025-03-17 15:50:40', '2025-03-17 15:50:40'),
(8, 'test', 'test1@test.com', NULL, '$2y$12$A5l5jnpVue3gMcENAhk/JOMqHqLDJXN9O895hv9THVMeQL7VkNabu', NULL, '2025-03-17 16:22:02', '2025-03-17 16:22:02'),
(9, 'test', 'test2@test.com', NULL, '$2y$12$8DMM.0K1vJ7AYBrNUETD9O3dovSItjtNDzhJZcrZq4wIItsnJQBzq', NULL, '2025-03-17 16:57:06', '2025-03-17 16:57:06'),
(10, 'test', 'test5@test.com', NULL, '$2y$12$CYCQbwqOmC/aXdwg/LqP/OiHidYfJ4tRI7C3Ex0xHk54JAjV99w9G', NULL, '2025-03-17 18:14:11', '2025-03-17 18:14:11'),
(11, 'dQdQDzq', 'test@gmail.com', NULL, '$2y$12$RCPHkVtz2oPR8JnskHXI.ONuRssmXOCySKNN4d/NZCaPfiivb3d5a', NULL, '2025-03-17 18:15:37', '2025-03-17 18:15:37'),
(12, 'dQdQDzq', 'test2@gmail.com', NULL, '$2y$12$nFLomBYwjE2pQq6c8HfUHO0pWm7cadJxWG4WBEkZY/aWpNXqqdSYC', NULL, '2025-03-17 18:17:28', '2025-03-17 18:17:28');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
