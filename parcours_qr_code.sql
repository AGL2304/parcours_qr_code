-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : parcours_qr_code-mysql-1
-- Généré le : jeu. 15 mai 2025 à 13:06
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parcours_qr_code`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etape_parcours`
--

CREATE TABLE `etape_parcours` (
  `id` bigint UNSIGNED NOT NULL,
  `parcours_id` bigint UNSIGNED NOT NULL,
  `site_id` bigint UNSIGNED NOT NULL,
  `ordre` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etape_parcours`
--

INSERT INTO `etape_parcours` (`id`, `parcours_id`, `site_id`, `ordre`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, NULL, NULL),
(2, 1, 5, 2, NULL, NULL),
(3, 1, 9, 3, NULL, NULL),
(4, 1, 13, 4, NULL, NULL),
(5, 2, 7, 1, NULL, NULL),
(6, 2, 11, 2, NULL, NULL),
(7, 2, 15, 3, NULL, NULL),
(8, 2, 16, 4, NULL, NULL),
(9, 3, 1, 1, NULL, NULL),
(10, 3, 4, 2, NULL, NULL),
(11, 3, 5, 3, NULL, NULL),
(12, 3, 15, 4, NULL, NULL),
(13, 3, 16, 5, NULL, NULL),
(14, 4, 3, 1, NULL, NULL),
(15, 4, 4, 2, NULL, NULL),
(16, 4, 11, 3, NULL, NULL),
(17, 4, 14, 4, NULL, NULL),
(18, 4, 17, 5, NULL, NULL),
(19, 5, 1, 1, NULL, NULL),
(20, 5, 15, 2, NULL, NULL),
(21, 5, 20, 3, NULL, NULL),
(22, 6, 9, 1, NULL, NULL),
(23, 6, 13, 2, NULL, NULL),
(24, 6, 18, 3, NULL, NULL),
(25, 6, 19, 4, NULL, NULL),
(26, 6, 20, 5, NULL, NULL),
(27, 7, 2, 1, NULL, NULL),
(28, 7, 3, 2, NULL, NULL),
(29, 7, 7, 3, NULL, NULL),
(30, 8, 2, 1, NULL, NULL),
(31, 8, 18, 2, NULL, NULL),
(32, 8, 19, 3, NULL, NULL),
(33, 9, 1, 1, NULL, NULL),
(34, 9, 4, 2, NULL, NULL),
(35, 9, 6, 3, NULL, NULL),
(36, 9, 14, 4, NULL, NULL),
(37, 9, 16, 5, NULL, NULL),
(38, 10, 2, 1, NULL, NULL),
(39, 10, 7, 2, NULL, NULL),
(40, 10, 11, 3, NULL, NULL),
(41, 10, 13, 4, NULL, NULL),
(42, 10, 14, 5, NULL, NULL),
(43, 10, 17, 6, NULL, NULL),
(44, 11, 1, 1, NULL, NULL),
(45, 11, 2, 2, NULL, NULL),
(46, 11, 3, 3, NULL, NULL),
(47, 11, 4, 4, NULL, NULL),
(48, 11, 5, 5, NULL, NULL),
(49, 11, 6, 6, NULL, NULL),
(50, 11, 7, 7, NULL, NULL),
(51, 11, 8, 8, NULL, NULL),
(52, 11, 9, 9, NULL, NULL),
(53, 11, 10, 10, NULL, NULL),
(54, 11, 11, 11, NULL, NULL),
(55, 11, 12, 12, NULL, NULL),
(56, 11, 13, 13, NULL, NULL),
(57, 11, 14, 14, NULL, NULL),
(58, 11, 15, 15, NULL, NULL),
(59, 11, 16, 16, NULL, NULL),
(60, 11, 17, 17, NULL, NULL),
(61, 11, 18, 18, NULL, NULL),
(62, 11, 19, 19, NULL, NULL),
(63, 11, 20, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_06_134031_add_role_to_users_table', 1),
(5, '2025_05_07_142143_create_parcours_table', 1),
(6, '2025_05_07_142346_create_sites_table', 1),
(7, '2025_05_07_142439_create_etape_parcours_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `nom`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Parcours - officia', 'Natus qui ut sed sint.', 3, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(2, 'Parcours - nesciunt', 'Harum commodi voluptatibus eligendi quod nihil.', 3, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(3, 'Parcours - impedit', 'Et qui quae libero qui sit qui.', 2, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(4, 'Parcours - autem', 'Nisi quas id qui.', 2, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(5, 'Parcours - itaque', 'Nobis quo impedit odit voluptatibus.', 4, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(6, 'Parcours - delectus', 'Et rerum voluptatum vel sit.', 2, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(7, 'Parcours - neque', 'Nobis labore aut cumque ullam.', 3, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(8, 'Parcours - quisquam', 'Alias odio voluptatibus vel harum earum accusantium.', 4, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(9, 'Parcours - ut', 'Veniam illum a quia culpa.', 4, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(10, 'Parcours - atque', 'Officiis eum esse aspernatur maxime hic qui.', 4, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(11, 'Gastronomie', 'Partez à la découverte des saveurs locales à travers un parcours gastronomique unique alliant tradition, terroir et créativité culinaire. Chaque étape vous emmène chez un artisan, un producteur ou un chef passionné, prêt à vous faire déguster ses spécialités et à partager son savoir-faire. Entre mets raffinés, produits du terroir et découvertes culturelles, vivez une expérience gourmande inoubliable qui éveillera tous vos sens.', 8, '2025-05-08 09:14:34', '2025-05-08 09:14:34');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `description`, `latitude`, `longitude`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ovahaven - Site', 'Natus dolorem quaerat optio et. Et libero quo iure saepe qui sed. Corrupti cum et sit facere. Veniam voluptates cupiditate aperiam. Quis voluptas ut numquam rem molestiae.', 88.9448310, 123.4890110, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(2, 'South Maybelle - Site', 'Natus dolore vel beatae tempore voluptatem. Qui omnis pariatur voluptatibus facere iste sint illum. Aut vero voluptatum nesciunt ut accusantium.', -3.1261210, 133.5275750, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(3, 'Shyannview - Site', 'Et ut voluptas error sed. Sint omnis dolorem fuga qui. Libero et exercitationem et. Magnam qui quis esse optio dignissimos esse cum.', -80.8090230, -94.8524070, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(4, 'Neomahaven - Site', 'Qui quis dicta fuga minima dolor omnis consectetur. Cupiditate aut ullam sunt consequatur est. Ut consequatur nam esse quia magni at. Incidunt laudantium sequi deleniti sunt sunt.', 43.4293230, 73.7888890, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(5, 'Alainahaven - Site', 'Aut mollitia perspiciatis eius inventore quas numquam. Autem dicta nam cumque facilis voluptatibus ab in. Nemo nemo officia et quidem illo. Sed dignissimos quam rem molestiae ipsam debitis neque.', 30.4466580, 157.5955900, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(6, 'East Tyresefurt - Site', 'Cum et dolores pariatur aperiam dolores id. At rem fuga qui velit omnis. Velit repudiandae excepturi unde est consequuntur laborum in.', -4.1935460, -107.6923690, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(7, 'Binsside - Site', 'Dolorem totam neque earum recusandae. Reiciendis fugiat quas omnis numquam sapiente possimus animi deleniti. Officiis cum voluptas eius dolore dicta iure. Rerum dolore eius est.', -30.2459210, 11.9437540, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(8, 'East Henry - Site', 'Tempora iste ratione nobis quis autem. Iusto beatae iste aliquam maiores et nemo.', -74.1244860, -78.6320400, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(9, 'South Rileyland - Site', 'Impedit officia est reiciendis placeat. Eligendi est odit error. Quia tenetur consequatur natus nisi. Nisi aut nesciunt iste ipsa quos.', -87.1883280, -92.1622780, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(10, 'South Audramouth - Site', 'Odit veniam omnis laudantium dolor velit deserunt commodi. Veniam adipisci fuga ut minima et ut facere. Quis sequi consequatur ut voluptas. Illo rerum nobis officiis sint non blanditiis repudiandae.', 19.2194220, -110.5256410, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(11, 'South Moises - Site', 'Maxime corporis quia ea sed qui numquam. Fuga delectus vel eveniet iste dolores amet veniam.', 47.1419270, -120.4359340, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(12, 'New Alysa - Site', 'Cumque quam perferendis nihil in rerum. Voluptatem autem veniam assumenda nostrum nulla. Veritatis iure eos aperiam ea et incidunt tenetur. In est totam voluptates.', -1.9578010, 34.2562350, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(13, 'Mrazberg - Site', 'Voluptates est ex ipsa ullam est quis. Ad accusantium blanditiis in a autem dolores velit. Omnis unde dolor autem qui. Ut saepe et dolor quisquam quo quia. Libero sit ut sunt autem.', 48.1954800, 21.2979720, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(14, 'Port Annettefurt - Site', 'Aut assumenda vel enim ab. Ipsum quis numquam voluptatem id perferendis. Iste quia hic explicabo odit magnam. Qui sit facilis sint ut ut non et.', -51.5038960, -58.9338860, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(15, 'West Desireeborough - Site', 'Dolorem est et laboriosam voluptas natus fuga quisquam. Architecto voluptatum velit odio natus. Omnis quaerat consequuntur cumque est. Quis dignissimos nemo eius aperiam est.', -46.9484130, -146.4666910, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(16, 'Wildermanmouth - Site', 'In debitis corporis quidem cum accusantium ut est. Aut at qui nesciunt.', 68.0796640, -28.3241750, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(17, 'West Ofelia - Site', 'Enim ut dolores inventore dolore voluptatem cumque. Beatae sint repellat non mollitia animi sequi.', -0.8181770, -10.5967660, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(18, 'Nicolasfort - Site', 'Rerum libero aut expedita et in saepe. Eum ut ea temporibus possimus architecto. Ex velit fuga est ab qui et rerum. Ipsam itaque doloremque eum sed quaerat reiciendis non.', 6.7701540, -5.1406450, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(19, 'Eloisaside - Site', 'Ut molestias et et repellendus soluta. Impedit voluptatem est aut quia earum. Est similique eligendi aspernatur.', 85.1724240, 134.5064090, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16'),
(20, 'North Haskell - Site', 'Dolor aliquid earum itaque dolorem officia et ut ipsam. Deleniti nam non ipsam et dolor ut. Ullam rerum eaque aut deleniti in aut explicabo.', -79.0989800, -57.4226630, NULL, '2025-05-07 15:03:16', '2025-05-07 15:03:16');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Isobel Larson IV', 'mhowell@example.org', '2025-05-07 15:03:14', '$2y$12$8aNcCuFybPlYZQ1.raOux.DHC0ZFYdvIBt1FXF0Pj9tvYz04p2oze', 'f8jpyQX6zp', '2025-05-07 15:03:15', '2025-05-07 15:03:15', 'user'),
(2, 'Amelie Lind', 'qeffertz@example.org', '2025-05-07 15:03:15', '$2y$12$8aNcCuFybPlYZQ1.raOux.DHC0ZFYdvIBt1FXF0Pj9tvYz04p2oze', 'jhTbSETyss', '2025-05-07 15:03:15', '2025-05-07 15:03:15', 'user'),
(3, 'Roy Bernier', 'edwina.kling@example.net', '2025-05-07 15:03:15', '$2y$12$8aNcCuFybPlYZQ1.raOux.DHC0ZFYdvIBt1FXF0Pj9tvYz04p2oze', 'BWGLp2qx5s', '2025-05-07 15:03:15', '2025-05-07 15:03:15', 'user'),
(4, 'Prof. Marcelle Mayert V', 'gerda.swift@example.net', '2025-05-07 15:03:15', '$2y$12$8aNcCuFybPlYZQ1.raOux.DHC0ZFYdvIBt1FXF0Pj9tvYz04p2oze', 'oS4m7hiRDM0UZEb2pxc0ivqQ0upyL4GQyRt3QOkpglMiNykwiL5nEQhWKHHo', '2025-05-07 15:03:15', '2025-05-07 15:03:15', 'user'),
(5, 'Sebastian Cole', 'witting.titus@example.org', '2025-05-07 15:03:15', '$2y$12$8aNcCuFybPlYZQ1.raOux.DHC0ZFYdvIBt1FXF0Pj9tvYz04p2oze', 'LFA8sZPOUk', '2025-05-07 15:03:15', '2025-05-07 15:03:15', 'user'),
(6, 'User Lambda', 'user@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa/3rZ4x3I8QWfQ3dWxS8X1Yx5K', NULL, '2025-05-08 08:37:03', '2025-05-08 08:37:03', 'user'),
(7, 'Admin', 'admin@example.com', '2025-05-07 12:12:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa/3rZ4x3I8QWfQ3dWxS8X1Yx5K', NULL, '2025-05-08 08:37:34', '2025-05-08 08:37:34', 'admin'),
(8, 'test', 'test@example.com', NULL, '$2y$12$SkZu1dWqUsbuFFK.VXPNIufj54aRn5txNADF2gpTA6SvkUG2SzLvu', NULL, '2025-05-08 08:44:52', '2025-05-08 08:44:52', 'user'),
(9, 'test2', 'test2@example.com', NULL, '$2y$12$75TwslUb9Yi5yb7Jkt99d.GjRUWfdeRSm93TxUy4fvbHXvLa2G5WW', 'DyrZUA4yQzMz7CMD8ISAVEWfgaOTynOhcfMlyAQa2N4lRjvPOpTZcVhjCmKs', '2025-05-09 07:48:31', '2025-05-09 07:48:31', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `etape_parcours`
--
ALTER TABLE `etape_parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etape_parcours_parcours_id_foreign` (`parcours_id`),
  ADD KEY `etape_parcours_site_id_foreign` (`site_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parcours_user_id_foreign` (`user_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etape_parcours`
--
ALTER TABLE `etape_parcours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etape_parcours`
--
ALTER TABLE `etape_parcours`
  ADD CONSTRAINT `etape_parcours_parcours_id_foreign` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etape_parcours_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `parcours_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
