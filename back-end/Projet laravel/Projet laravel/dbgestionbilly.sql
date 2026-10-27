-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Juin 2025 à 13:15
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbgestionbilly`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE `absences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeAbsence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tout sorte',
  `idpersonne` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `accueillits`
--

CREATE TABLE `accueillits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Janvier',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `action_personnels`
--

CREATE TABLE `action_personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `compte_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fonction` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_action_ecolage` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `action_personnels`
--

INSERT INTO `action_personnels` (`id`, `personnel_id`, `mois`, `type`, `montant`, `annee_scolaire_id`, `compte_id`, `created_at`, `updated_at`, `fonction`, `id_action_ecolage`) VALUES
(36, 16, 'Avril', 'Ecolage', 500000, 1, 5, '2025-05-28 22:26:11', '2025-05-28 22:26:11', 'Enseignant', 36),
(37, 17, 'Avril', 'Prime', 200000, 1, 6, '2025-05-29 22:18:05', '2025-05-29 22:18:05', 'Autre', 0);

-- --------------------------------------------------------

--
-- Structure de la table `affecters`
--

CREATE TABLE `affecters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enseigner_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `affecters`
--

INSERT INTO `affecters` (`id`, `enseigner_id`, `classe_id`, `annee_scolaire_id`, `created_at`, `updated_at`) VALUES
(22, 10, 37, 1, '2025-05-29 13:43:18', '2025-05-29 13:43:18'),
(23, 10, 38, 1, '2025-05-29 13:43:18', '2025-05-29 13:43:18'),
(24, 10, 34, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(25, 10, 43, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(26, 10, 44, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(27, 10, 47, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(28, 10, 50, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(29, 10, 52, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(30, 10, 53, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(31, 10, 54, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(32, 10, 55, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(33, 10, 56, 1, '2025-05-29 13:43:19', '2025-05-29 13:43:19'),
(34, 11, 37, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(35, 11, 47, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(36, 11, 50, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(37, 11, 52, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(38, 11, 53, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(39, 11, 54, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(40, 11, 55, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(41, 11, 56, 1, '2025-05-29 13:43:47', '2025-05-29 13:43:47'),
(42, 12, 56, 1, '2025-05-29 13:45:25', '2025-05-29 13:45:25'),
(43, 12, 36, 1, '2025-05-29 13:45:25', '2025-05-29 13:45:25'),
(44, 12, 38, 1, '2025-05-29 13:45:25', '2025-05-29 13:45:25'),
(45, 12, 34, 1, '2025-05-29 13:45:25', '2025-05-29 13:45:25'),
(46, 12, 43, 1, '2025-05-29 13:45:26', '2025-05-29 13:45:26'),
(47, 14, 56, 1, '2025-05-29 13:45:41', '2025-05-29 13:45:41'),
(48, 14, 36, 1, '2025-05-29 13:45:41', '2025-05-29 13:45:41'),
(49, 14, 38, 1, '2025-05-29 13:45:41', '2025-05-29 13:45:41'),
(50, 14, 34, 1, '2025-05-29 13:45:41', '2025-05-29 13:45:41'),
(51, 14, 43, 1, '2025-05-29 13:45:42', '2025-05-29 13:45:42'),
(52, 16, 56, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(53, 16, 37, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(54, 16, 44, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(55, 16, 45, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(56, 16, 46, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(57, 16, 48, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(58, 16, 49, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(59, 16, 47, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(60, 16, 50, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(61, 16, 51, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(62, 16, 52, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(63, 16, 53, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(64, 16, 54, 1, '2025-05-29 13:46:34', '2025-05-29 13:46:34'),
(65, 18, 56, 1, '2025-05-29 13:47:05', '2025-05-29 13:47:05'),
(66, 18, 37, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(67, 18, 44, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(68, 18, 45, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(69, 18, 46, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(70, 18, 48, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(71, 18, 49, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(72, 18, 47, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(73, 18, 50, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(74, 18, 51, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(75, 18, 52, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(76, 18, 53, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(77, 18, 54, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(78, 18, 34, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(79, 18, 35, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(80, 18, 36, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(81, 18, 43, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(82, 18, 42, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(83, 18, 41, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(84, 18, 39, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(85, 18, 40, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(86, 18, 38, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(87, 18, 55, 1, '2025-05-29 13:47:06', '2025-05-29 13:47:06'),
(88, 19, 37, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59'),
(89, 19, 34, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59'),
(90, 19, 38, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59'),
(91, 19, 43, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59'),
(92, 19, 54, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59'),
(93, 19, 55, 1, '2025-05-29 13:48:59', '2025-05-29 13:48:59');

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaires`
--

CREATE TABLE `annee_scolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `annee_scolaires`
--

INSERT INTO `annee_scolaires` (`id`, `dateDebut`, `DateFin`, `created_at`, `updated_at`) VALUES
(1, '2024-11-01', '2025-07-01', '2025-02-04 23:00:00', '2025-05-04 14:21:58');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_classe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` int(11) NOT NULL,
  `effectif_total` int(11) DEFAULT NULL,
  `effectif_garcon` int(11) DEFAULT NULL,
  `effectif_fille` int(11) DEFAULT NULL,
  `nom_place` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id`, `nom_classe`, `niveau`, `effectif_total`, `effectif_garcon`, `effectif_fille`, `nom_place`, `created_at`, `updated_at`, `option_id`) VALUES
(34, '7eme A', 7, 6, 5, 1, 100, '2025-05-28 16:59:37', '2025-05-29 13:11:07', 0),
(35, '7eme B', 7, 1, 0, 1, 100, '2025-05-28 17:02:04', '2025-05-28 22:24:41', 0),
(36, '8eme B', 7, 0, 0, 0, 100, '2025-05-28 17:05:24', '2025-05-28 17:05:24', 0),
(37, 'Terminal SM B', 13, 1, 1, 0, 100, '2025-05-28 17:06:23', '2025-05-29 13:02:57', 9),
(38, '9eme A', 9, 0, 0, 0, 75, '2025-05-29 11:04:09', '2025-05-29 11:04:09', 0),
(39, '9eme B', 9, 0, 0, 0, 80, '2025-05-29 11:04:30', '2025-05-29 11:04:30', 0),
(40, '9eme C', 9, 0, 0, 0, 75, '2025-05-29 11:04:52', '2025-05-29 11:04:52', 0),
(41, '10eme C', 10, 0, 0, 0, 75, '2025-05-29 11:05:09', '2025-05-29 11:05:09', 0),
(42, '10eme B', 10, 0, 0, 0, 75, '2025-05-29 11:05:19', '2025-05-29 11:05:19', 0),
(43, '10eme A', 10, 0, 0, 0, 75, '2025-05-29 11:05:26', '2025-05-29 11:05:26', 0),
(44, '11eme A', 11, 0, 0, 0, 65, '2025-05-29 11:06:00', '2025-05-29 11:06:00', 3),
(45, '11eme B', 11, 0, 0, 0, 65, '2025-05-29 11:06:11', '2025-05-29 11:06:11', 3),
(46, '11eme C', 11, 0, 0, 0, 65, '2025-05-29 11:06:18', '2025-05-29 11:06:18', 3),
(47, '11eme A', 11, 0, 0, 0, 65, '2025-05-29 11:06:31', '2025-05-29 11:06:31', 1),
(48, '11eme B', 11, 0, 0, 0, 65, '2025-05-29 11:07:51', '2025-05-29 11:07:51', 1),
(49, '11eme C', 11, 0, 0, 0, 65, '2025-05-29 11:08:00', '2025-05-29 11:08:00', 1),
(50, '11eme A', 11, 0, 0, 0, 65, '2025-05-29 11:13:14', '2025-05-29 11:13:14', 4),
(51, '12eme A', 12, 0, 0, 0, 65, '2025-05-29 11:13:31', '2025-05-29 11:13:31', 5),
(52, '12eme A', 12, 0, 0, 0, 65, '2025-05-29 11:13:38', '2025-05-29 11:13:38', 6),
(53, '12eme A', 12, 0, 0, 0, 65, '2025-05-29 11:14:46', '2025-05-29 11:14:46', 7),
(54, 'Terminal SM A', 13, 0, 0, 0, 65, '2025-05-29 11:15:12', '2025-05-29 11:15:12', 9),
(55, 'Terminal SE A', 13, 0, 0, 0, 65, '2025-05-29 11:15:50', '2025-05-29 11:15:50', 10),
(56, 'Terminal SS A', 13, 0, 0, 0, 65, '2025-05-29 11:15:58', '2025-05-29 11:15:58', 8);

-- --------------------------------------------------------

--
-- Structure de la table `coefficients`
--

CREATE TABLE `coefficients` (
  `id` bigint(20) NOT NULL,
  `fiche_renseignement_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `valeur` float NOT NULL,
  `clycle` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `coefficients`
--

INSERT INTO `coefficients` (`id`, `fiche_renseignement_id`, `option_id`, `matiere_id`, `valeur`, `clycle`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 26, 2, 'Collège', '2025-05-29 14:49:11', '2025-05-29 13:34:49'),
(2, 7, 9, 26, 4, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:35:05'),
(3, 4, 0, 26, 0, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 14:49:11'),
(4, 5, 3, 26, 4, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:36:08'),
(5, 5, 1, 26, 2, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:36:26'),
(6, 5, 4, 26, 3, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:36:36'),
(7, 6, 5, 26, 2, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:36:49'),
(8, 6, 6, 26, 4, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:38:31'),
(9, 6, 7, 26, 3, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:38:46'),
(10, 7, 10, 26, 3, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:39:05'),
(11, 7, 8, 26, 2, 'Lycée', '2025-05-29 14:49:11', '2025-05-29 13:39:31'),
(12, 1, 0, 27, 2, 'Collège', '2025-05-29 14:51:58', '2025-05-29 13:39:41'),
(13, 7, 9, 27, 3, 'Lycée', '2025-05-29 14:51:58', '2025-05-29 13:40:08'),
(14, 4, 0, 27, 0, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 14:51:59'),
(15, 5, 3, 27, 3, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 13:40:27'),
(16, 5, 1, 27, 2, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 13:40:43'),
(17, 5, 4, 27, 3, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 13:41:15'),
(18, 6, 5, 27, 2, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 13:41:31'),
(19, 6, 6, 27, 0, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 14:51:59'),
(20, 6, 7, 27, 0, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 14:51:59'),
(21, 7, 10, 27, 0, 'Lycée', '2025-05-29 14:51:59', '2025-05-29 14:51:59'),
(22, 1, 0, 28, 2, 'Collège', '2025-05-29 14:53:34', '2025-05-29 13:42:11'),
(23, 7, 9, 28, 3, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 13:42:26'),
(24, 4, 0, 28, 0, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 14:53:34'),
(25, 5, 3, 28, 3, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 13:42:53'),
(26, 5, 1, 28, 2, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 13:43:29'),
(27, 5, 4, 28, 3, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 13:43:44'),
(28, 6, 5, 28, 0, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 14:53:34'),
(29, 6, 6, 28, 0, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 14:53:34'),
(30, 6, 7, 28, 0, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 14:53:34'),
(31, 7, 10, 28, 0, 'Lycée', '2025-05-29 14:53:34', '2025-05-29 14:53:34'),
(32, 7, 9, 29, 2, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 13:45:38'),
(33, 5, 3, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(34, 5, 1, 29, 3, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 13:46:01'),
(35, 5, 4, 29, 2, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 13:46:46'),
(36, 6, 5, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(37, 6, 6, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(38, 6, 7, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(39, 7, 10, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(40, 7, 8, 29, 0, 'Lycée', '2025-05-29 14:57:24', '2025-05-29 14:57:24'),
(41, 1, 0, 30, 1, 'Collège', '2025-05-29 15:02:03', '2025-05-29 13:50:27'),
(42, 4, 0, 30, 0, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 15:02:03'),
(43, 5, 3, 30, 2, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 13:51:54'),
(44, 5, 1, 30, 2, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 13:53:01'),
(45, 5, 4, 30, 2, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 13:57:06'),
(46, 6, 5, 30, 0, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 15:02:03'),
(47, 6, 6, 30, 0, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 15:02:03'),
(48, 6, 7, 30, 0, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 15:02:03'),
(49, 7, 8, 30, 0, 'Lycée', '2025-05-29 15:02:03', '2025-05-29 15:02:03'),
(50, 1, 0, 31, 1, 'Collège', '2025-05-29 15:07:12', '2025-05-29 13:58:10'),
(51, 7, 9, 31, 2, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 14:04:15'),
(52, 4, 0, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(53, 5, 3, 31, 2, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 14:05:15'),
(54, 5, 1, 31, 4, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 14:04:36'),
(55, 5, 4, 31, 2, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 14:04:50'),
(56, 6, 5, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(57, 6, 6, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(58, 6, 7, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(59, 7, 10, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(60, 7, 8, 31, 0, 'Lycée', '2025-05-29 15:07:12', '2025-05-29 15:07:12'),
(61, 1, 0, 32, 1, 'Collège', '2025-05-29 15:09:09', '2025-05-29 14:05:38'),
(62, 4, 0, 32, 0, 'Lycée', '2025-05-29 15:09:09', '2025-05-29 15:09:09'),
(63, 1, 0, 33, 1, 'Collège', '2025-05-29 15:12:40', '2025-05-29 14:06:00'),
(64, 4, 0, 33, 0, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 15:12:40'),
(65, 5, 3, 33, 2, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 14:06:19'),
(66, 5, 1, 33, 2, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 14:06:32'),
(67, 5, 4, 33, 2, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 14:06:54'),
(68, 6, 6, 33, 0, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 15:12:40'),
(69, 6, 5, 33, 0, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 15:12:40'),
(70, 6, 7, 33, 0, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 15:12:40'),
(71, 7, 8, 33, 0, 'Lycée', '2025-05-29 15:12:40', '2025-05-29 15:12:40'),
(72, 5, 3, 34, 2, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 14:07:32'),
(73, 5, 1, 34, 2, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 14:07:44'),
(74, 5, 4, 34, 2, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 14:11:58'),
(75, 6, 5, 34, 0, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 15:18:25'),
(76, 6, 6, 34, 0, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 15:18:25'),
(77, 6, 7, 34, 0, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 15:18:25'),
(78, 7, 9, 34, 0, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 15:18:25'),
(79, 7, 8, 34, 0, 'Lycée', '2025-05-29 15:18:25', '2025-05-29 15:18:25'),
(80, 1, 0, 35, 2, 'Collège', '2025-05-29 15:20:58', '2025-05-29 14:12:55'),
(81, 4, 0, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(82, 5, 1, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(83, 5, 3, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(84, 5, 4, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(85, 6, 5, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(86, 6, 6, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(87, 6, 7, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(88, 7, 9, 35, 0, 'Lycée', '2025-05-29 15:20:58', '2025-05-29 15:20:58'),
(89, 5, 4, 36, 3, 'Lycée', '2025-05-29 15:32:04', '2025-05-29 14:13:22'),
(90, 6, 7, 36, 0, 'Lycée', '2025-05-29 15:32:04', '2025-05-29 15:32:04'),
(91, 7, 10, 36, 0, 'Lycée', '2025-05-29 15:32:04', '2025-05-29 15:32:04');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomCompte` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroCompte` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `solde` double NOT NULL,
  `statut` enum('actif','bloquer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`id`, `nomCompte`, `numeroCompte`, `description`, `solde`, `statut`, `created_at`, `updated_at`) VALUES
(5, 'Caisse', 1, 'Le compte caisse parmet de garder l argent des inscription reinscription et payement de scolarite ou autre avant d etre envoyer a la banque', 1820000, 'actif', '2025-05-28 17:53:03', '2025-06-01 13:08:19'),
(6, 'EcoBank', 2, 'undefined', -2250000, 'actif', '2025-05-28 21:21:41', '2025-05-28 22:33:17');

-- --------------------------------------------------------

--
-- Structure de la table `departs`
--

CREATE TABLE `departs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Janvier',
  `motif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compte_id` bigint(20) UNSIGNED NOT NULL,
  `type_depense_id` bigint(20) UNSIGNED DEFAULT '0',
  `typeTransaction` enum('depôt','retrait') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantTransanction` double NOT NULL,
  `piece_jointe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `depenses`
--

INSERT INTO `depenses` (`id`, `compte_id`, `type_depense_id`, `typeTransaction`, `montantTransanction`, `piece_jointe`, `description`, `created_at`, `updated_at`, `annee_scolaire_id`) VALUES
(1, 6, 1, 'depôt', 5000000, '', 'Financement pour le projet de rénovation de Billy-Ecole', '2025-05-28 22:55:00', '2025-05-28 22:56:02', 1),
(2, 6, 2, 'retrait', 2000000, '', 'undefined', '2025-05-28 22:59:04', '2025-05-28 22:59:04', 1),
(3, 5, 1, 'depôt', 400000, '', 'Offre du prémier ministre de l\'enseignement supérieur', '2025-05-29 14:17:01', '2025-05-29 14:17:01', 1),
(4, 5, 3, 'retrait', 500000, '', 'Achat des fournitures scolaire pour Billy', '2025-05-29 14:34:04', '2025-05-29 14:34:04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `dispenser_dans`
--

CREATE TABLE `dispenser_dans` (
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dispenser_dans`
--

INSERT INTO `dispenser_dans` (`matiere_id`, `classe_id`) VALUES
(26, 34),
(26, 35),
(26, 36),
(26, 37),
(26, 38),
(26, 39),
(26, 40),
(26, 41),
(26, 42),
(26, 43),
(26, 44),
(26, 45),
(26, 46),
(26, 47),
(26, 48),
(26, 49),
(26, 50),
(26, 51),
(26, 52),
(26, 53),
(26, 54),
(26, 55),
(26, 56),
(27, 34),
(27, 35),
(27, 36),
(27, 37),
(27, 38),
(27, 39),
(27, 40),
(27, 41),
(27, 42),
(27, 43),
(27, 44),
(27, 45),
(27, 46),
(27, 47),
(27, 48),
(27, 49),
(27, 50),
(27, 51),
(27, 52),
(27, 53),
(27, 54),
(27, 55),
(28, 34),
(28, 35),
(28, 36),
(28, 37),
(28, 38),
(28, 39),
(28, 40),
(28, 41),
(28, 42),
(28, 43),
(28, 44),
(28, 45),
(28, 46),
(28, 47),
(28, 48),
(28, 49),
(28, 50),
(28, 51),
(28, 52),
(28, 53),
(28, 54),
(28, 55),
(29, 37),
(29, 44),
(29, 45),
(29, 46),
(29, 47),
(29, 48),
(29, 49),
(29, 50),
(29, 51),
(29, 52),
(29, 53),
(29, 54),
(29, 55),
(29, 56),
(30, 34),
(30, 35),
(30, 36),
(30, 38),
(30, 39),
(30, 40),
(30, 41),
(30, 42),
(30, 43),
(30, 45),
(30, 46),
(30, 44),
(30, 47),
(30, 48),
(30, 49),
(30, 50),
(30, 51),
(30, 52),
(30, 53),
(30, 56),
(31, 34),
(31, 35),
(31, 36),
(31, 37),
(31, 38),
(31, 39),
(31, 40),
(31, 41),
(31, 42),
(31, 43),
(31, 44),
(31, 45),
(31, 46),
(31, 47),
(31, 48),
(31, 49),
(31, 50),
(31, 51),
(31, 52),
(31, 53),
(31, 54),
(31, 55),
(31, 56),
(32, 34),
(32, 35),
(32, 36),
(32, 38),
(32, 39),
(32, 40),
(32, 41),
(32, 42),
(32, 43),
(33, 34),
(33, 35),
(33, 36),
(33, 38),
(33, 39),
(33, 40),
(33, 41),
(33, 42),
(33, 43),
(33, 44),
(33, 45),
(33, 46),
(33, 47),
(33, 48),
(33, 49),
(33, 50),
(33, 52),
(33, 51),
(33, 53),
(33, 56),
(34, 44),
(34, 45),
(34, 46),
(34, 47),
(34, 48),
(34, 49),
(34, 50),
(34, 51),
(34, 52),
(34, 53),
(34, 54),
(34, 56),
(35, 34),
(35, 35),
(35, 36),
(35, 39),
(35, 38),
(35, 40),
(35, 41),
(35, 42),
(35, 43),
(35, 47),
(35, 44),
(35, 45),
(35, 46),
(35, 48),
(35, 49),
(35, 50),
(35, 51),
(35, 52),
(35, 53),
(35, 54),
(36, 50),
(36, 53),
(36, 55);

-- --------------------------------------------------------

--
-- Structure de la table `effectif_classes`
--

CREATE TABLE `effectif_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `total_eleve` int(11) NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule_eleve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_eleve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_eleve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_eleve` enum('Masculin','Féminin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_naiss` date NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `tel_eleve` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut_scolaire` enum('Promu','Redoublant') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`id`, `matricule_eleve`, `nom_eleve`, `prenom_eleve`, `genre_eleve`, `Date_naiss`, `photo`, `tel_eleve`, `classe_id`, `created_at`, `updated_at`, `statut_scolaire`) VALUES
(51, 'BE-E512025', 'Daffe', 'Sekou Ahmed', 'Masculin', '2002-03-22', '1748458240_IMG-20220730-WA0005.png', '625463305', 34, '2025-05-28 16:50:40', '2025-05-28 18:22:53', NULL),
(52, 'BE-E5522025', 'Daffe', 'Ousmane', 'Masculin', '2000-02-21', '1748476341_20240923_170456.jpg', NULL, 34, '2025-05-28 21:52:22', '2025-05-28 22:24:23', NULL),
(53, 'BE-E5532025', 'Camara', 'Aissatou Lamarana', 'Féminin', '2012-01-12', '1748476667_FB_IMG_1723422258468.jpg', '', 35, '2025-05-28 21:57:47', '2025-05-28 22:24:41', NULL),
(54, 'BE-E5542025', 'Baldé', 'Mamadou', 'Masculin', '2004-02-09', '1748529208_pray (1).png', '610275235', 37, '2025-05-29 12:33:28', '2025-05-29 12:34:36', NULL),
(55, 'BE-E5552025', 'Sauoré', 'Djibril', 'Masculin', '2000-08-20', '1748529502_muslim.png', '624567789', 34, '2025-05-29 12:38:22', '2025-05-29 12:38:56', NULL),
(56, 'BE-E5562025', 'Diallo', 'Tallatou', 'Féminin', '2005-02-20', '1748529725_islamic (1).png', '623456789', 34, '2025-05-29 12:42:05', '2025-05-29 12:42:28', NULL),
(57, 'BE-E5572025', 'Baldé', 'Charif', 'Masculin', '1999-02-02', '1748530014_file_00000000b2f861f49f14cfeda7d2a405.png', '629167799', 34, '2025-05-29 12:46:54', '2025-05-29 12:47:31', NULL),
(58, 'BE-E5582025', 'Diallo', 'Alhassane', 'Masculin', '2001-02-27', '1748531433_pray.png', '629775599', 34, '2025-05-29 13:10:33', '2025-05-29 13:11:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emploi_temps`
--

CREATE TABLE `emploi_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `jour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `emploi_temps`
--

INSERT INTO `emploi_temps` (`id`, `classe_id`, `matiere_id`, `personnel_id`, `jour`, `heure_debut`, `heure_fin`, `created_at`, `updated_at`) VALUES
(3, 34, 26, 23, 'Lundi', '08:00:00', '10:00:00', '2025-05-29 14:09:55', '2025-05-29 14:09:55'),
(4, 34, 31, 16, 'Lundi', '10:10:00', '11:45:00', '2025-05-29 14:09:55', '2025-05-29 14:09:55'),
(5, 34, 28, 25, 'Lundi', '12:00:00', '14:00:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56'),
(6, 34, 32, 21, 'Mardi', '08:00:00', '10:00:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56'),
(7, 34, 31, 16, 'Mardi', '10:00:00', '11:45:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56'),
(8, 34, 33, 18, 'Mardi', '12:00:00', '14:00:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56'),
(9, 34, 31, 16, 'Mercredi', '08:00:00', '10:00:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56'),
(10, 34, 28, 25, 'Mercredi', '10:00:00', '11:45:00', '2025-05-29 14:09:56', '2025-05-29 14:09:56');

-- --------------------------------------------------------

--
-- Structure de la table `enseigners`
--

CREATE TABLE `enseigners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `enseigners`
--

INSERT INTO `enseigners` (`id`, `personnel_id`, `matiere_id`, `created_at`, `updated_at`) VALUES
(10, 16, 31, NULL, NULL),
(11, 17, 29, NULL, NULL),
(12, 18, 33, NULL, NULL),
(13, 18, 30, NULL, NULL),
(14, 21, 32, NULL, NULL),
(15, 21, 31, NULL, NULL),
(16, 22, 34, NULL, NULL),
(17, 23, 34, NULL, NULL),
(18, 23, 26, NULL, NULL),
(19, 25, 28, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_renseignements`
--

CREATE TABLE `fiche_renseignements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `niveau` int(11) NOT NULL,
  `frais_inscription` bigint(20) NOT NULL,
  `frais_reinscription` bigint(20) NOT NULL,
  `tranche3` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tranche1` bigint(20) DEFAULT NULL,
  `tranche2` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `fiche_renseignements`
--

INSERT INTO `fiche_renseignements` (`id`, `niveau`, `frais_inscription`, `frais_reinscription`, `tranche3`, `created_at`, `updated_at`, `tranche1`, `tranche2`) VALUES
(1, 7, 20000, 30000, 500000, '2025-01-28 14:39:59', '2025-01-28 14:39:59', 500000, 500000),
(2, 8, 20000, 30000, 500000, '2025-01-28 14:40:20', '2025-01-28 14:40:20', 500000, 500000),
(3, 9, 20000, 30000, 500000, '2025-01-28 14:40:26', '2025-01-28 14:40:26', 500000, 500000),
(4, 10, 30000, 50000, 650000, '2025-01-28 14:41:00', '2025-01-28 14:41:00', 650000, 650000),
(5, 11, 40000, 20000, 700000, '2025-03-19 22:00:00', '2025-03-19 22:00:00', 700000, 700000),
(6, 12, 40000, 20000, 700000, '2025-04-07 20:00:00', '2025-04-07 20:00:00', 700000, 700000),
(7, 13, 50000, 20000, 800000, '2025-04-07 20:00:00', '2025-05-29 13:33:37', 800000, 800000);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle_fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `libelle_fonction`, `description_fonction`, `created_at`, `updated_at`) VALUES
(1, 'Enseignant', 'Les personnes ayant le droit de donner des cours au élèves dans la classe', '2025-02-09 22:00:00', '2025-02-09 22:00:00'),
(2, 'Censeur', 'celui qui s\'occupe de la gestion des élèves du collège', '2025-02-09 22:00:00', '2025-02-09 22:00:00'),
(3, 'Directeur des études', 'descrions de la fonction du DE', '2025-02-09 22:00:00', '2025-02-09 22:00:00'),
(4, 'Proviseur', 'descrition de la fonction du proviseur', '2025-02-09 22:00:00', '2025-02-09 22:00:00'),
(5, 'Gardien', 'description de la fonction du gardien', '2025-02-09 22:00:00', '2025-02-09 22:00:00'),
(6, 'Comptable', 'Le comptable s\'occupe de gestion des inscriptions et réinscription et au la rentrée et sortie de l\'argent au niveau de la caise', '2025-05-28 22:00:00', '2025-05-28 22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `fonction_personnels`
--

CREATE TABLE `fonction_personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `fonction_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut_fonction` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `fonction_personnels`
--

INSERT INTO `fonction_personnels` (`id`, `personnel_id`, `fonction_id`, `created_at`, `updated_at`, `statut_fonction`) VALUES
(24, 16, 1, '2025-05-28 19:59:26', '2025-05-28 19:59:26', 'En cours'),
(25, 17, 2, '2025-05-29 10:13:43', '2025-05-29 10:13:43', 'En cours'),
(26, 17, 1, '2025-05-29 10:15:40', '2025-05-29 10:15:40', 'En cours'),
(27, 18, 3, '2025-05-29 10:21:53', '2025-05-29 10:21:53', 'En cours'),
(28, 19, 5, '2025-05-29 10:29:54', '2025-05-29 10:29:54', 'En cours'),
(29, 18, 1, '2025-05-29 10:36:04', '2025-05-29 10:36:04', 'En cours'),
(30, 20, 4, '2025-05-29 10:47:43', '2025-05-29 10:47:43', 'En cours'),
(31, 21, 1, '2025-05-29 12:32:13', '2025-05-29 12:32:13', 'En cours'),
(32, 22, 1, '2025-05-29 13:22:30', '2025-05-29 13:22:30', 'En cours'),
(33, 23, 1, '2025-05-29 13:25:24', '2025-05-29 13:28:59', 'En cours'),
(34, 24, 6, '2025-05-29 13:32:52', '2025-05-29 13:32:52', 'En cours'),
(35, 25, 1, '2025-05-29 13:35:34', '2025-05-29 13:35:34', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `info_sites`
--

CREATE TABLE `info_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_ecole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_ecole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_ecole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_ecole` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ecole` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `histoire_ecole` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `info_sites`
--

INSERT INTO `info_sites` (`id`, `nom_ecole`, `logo`, `telephone_ecole`, `adresse_ecole`, `email_ecole`, `description_ecole`, `histoire_ecole`, `created_at`, `updated_at`, `slogan`) VALUES
(1, 'Billy-Ecole', 'logo.png', '611 11 11 11', 'Gbessia', 'billy@gmail.com', 'Billy-Ecole est un établissement scolaire composer de collège et lycée...', 'Billy-École a été fondée le 25 septembre 1993 par El Hadj Fodé Diabaté, en hommage à son défunt père...\r\n\r\nÀ ses débuts, l\'école comptait trois classes et environ 135 élèves. En 1996, fally-École accueille ses premiers élèves...\r\n\r\nfally-École poursuit des objectifs pédagogiques clairs et amfatieux : offrir une éducation de qualité, favoriser le développement intégral des élèves...', '2025-05-15 22:00:00', '2025-05-15 22:00:00', 'La puissance de l\'excellence');

-- --------------------------------------------------------

--
-- Structure de la table `ins_reins`
--

CREATE TABLE `ins_reins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Inscription','Réinscription') COLLATE utf8mb4_unicode_ci NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `montant` double NOT NULL,
  `moyentPayement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ins_reins`
--

INSERT INTO `ins_reins` (`id`, `type`, `eleve_id`, `classe_id`, `annee_scolaire_id`, `montant`, `moyentPayement`, `created_at`, `updated_at`) VALUES
(78, 'Inscription', 51, 34, 1, 20000, 'Caisse', '2025-05-28 17:53:43', '2025-05-28 17:53:43'),
(79, 'Inscription', 52, 34, 1, 20000, 'Caisse', '2025-05-28 22:24:23', '2025-05-28 22:24:23'),
(80, 'Inscription', 53, 35, 1, 20000, 'Caisse', '2025-05-28 22:24:41', '2025-05-28 22:24:41'),
(81, 'Inscription', 54, 37, 1, 50000, 'Caisse', '2025-05-29 12:34:36', '2025-05-29 12:34:36'),
(82, 'Inscription', 55, 34, 1, 20000, 'Caisse', '2025-05-29 12:38:56', '2025-05-29 12:38:56'),
(83, 'Inscription', 56, 34, 1, 20000, 'Caisse', '2025-05-29 12:42:28', '2025-05-29 12:42:28'),
(84, 'Inscription', 57, 34, 1, 20000, 'Caisse', '2025-05-29 12:47:31', '2025-05-29 12:47:31'),
(85, 'Inscription', 58, 34, 1, 20000, 'Caisse', '2025-05-29 13:11:07', '2025-05-29 13:11:07');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle_matiere` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id`, `libelle_matiere`, `created_at`, `updated_at`, `description`, `type`) VALUES
(26, 'Mathematique', '2025-05-29 12:49:11', '2025-05-29 12:49:11', 'La mathématique est une discipline qui étudie les nombres et les figure', 'Scientifique'),
(27, 'Physique', '2025-05-29 12:51:58', '2025-05-29 12:51:58', 'La physique est une discipline qui étudie les phénomènes de la nature', 'Scientifique'),
(28, 'Chimie', '2025-05-29 12:53:34', '2025-05-29 12:53:34', 'La chimie est une discipline qui étudie la transformation de la matiere', 'Scientifique'),
(29, 'Philosophie', '2025-05-29 12:57:24', '2025-05-29 12:57:24', 'La Philosophie est une discipline qui étudie la sagesse', 'Littéraire'),
(30, 'Geographie', '2025-05-29 13:02:03', '2025-05-29 13:02:03', 'La Géographie est une discipline qui étudie la description de la terre', 'Littéraire'),
(31, 'Francais', '2025-05-29 13:07:12', '2025-05-29 13:07:12', 'Le Français est une discipline qui étudie la littérature et langue française', 'Littéraire'),
(32, 'ECM', '2025-05-29 13:09:09', '2025-05-29 13:09:09', 'Le ECM  est une discipline qui étudie l\'education civique morale', 'Littéraire'),
(33, 'Histoire', '2025-05-29 13:12:40', '2025-05-29 13:12:40', 'Histoire est une discipline littéraire permettant d\'étudier les évenements du passé', 'Littéraire'),
(34, 'Economie', '2025-05-29 13:18:25', '2025-05-29 13:18:25', 'L\'économie est une science sociale qui étudie comment les sociétés s\'organisent pour satisfaire leurs besoins matériels et immatériels', 'Littéraire'),
(35, 'Biologie', '2025-05-29 13:20:58', '2025-05-29 13:20:58', 'La Biologie est une science qui étudie la vie des étres vivants', 'Scientifique'),
(36, 'Geologie', '2025-05-29 13:32:04', '2025-05-29 13:32:04', 'La Géologie est une science qui étudie la terre', 'Scientifique');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `noters`
--

CREATE TABLE `noters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `note_cours` double DEFAULT NULL,
  `note_composition` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note_orale` double DEFAULT NULL,
  `type_note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `semestre` int(11) NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `mois` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `noters`
--

INSERT INTO `noters` (`id`, `eleve_id`, `matiere_id`, `note_cours`, `note_composition`, `created_at`, `updated_at`, `note_orale`, `type_note`, `classe_id`, `semestre`, `annee_scolaire_id`, `mois`) VALUES
(2, 51, 26, 10, NULL, '2025-05-29 14:18:58', '2025-05-29 14:19:02', 12, 'Evaluation', 34, 1, 1, 'novembre'),
(3, 52, 26, 14, NULL, '2025-05-29 14:19:15', '2025-05-29 14:19:25', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(4, 55, 26, 19, NULL, '2025-05-29 14:19:29', '2025-05-29 14:45:51', 16, 'Evaluation', 34, 1, 1, 'novembre'),
(5, 56, 26, 12, NULL, '2025-05-29 14:19:39', '2025-05-29 14:20:09', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(6, 57, 26, 13, NULL, '2025-05-29 14:19:42', '2025-05-29 14:19:54', 19, 'Evaluation', 34, 1, 1, 'novembre'),
(7, 58, 26, 17, NULL, '2025-05-29 14:19:47', '2025-05-30 08:46:57', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(8, 51, 27, 14, NULL, '2025-05-29 14:20:46', '2025-05-29 14:21:21', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(9, 52, 27, 8, NULL, '2025-05-29 14:20:48', '2025-05-29 14:21:15', 14, 'Evaluation', 34, 1, 1, 'novembre'),
(10, 55, 27, 17, NULL, '2025-05-29 14:20:50', '2025-05-29 14:21:12', 16, 'Evaluation', 34, 1, 1, 'novembre'),
(11, 56, 27, 14, NULL, '2025-05-29 14:20:53', '2025-05-29 14:21:09', 9, 'Evaluation', 34, 1, 1, 'novembre'),
(12, 57, 27, 15, NULL, '2025-05-29 14:20:55', '2025-05-29 14:21:07', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(13, 58, 27, 17, NULL, '2025-05-29 14:20:59', '2025-05-29 14:21:04', 2, 'Evaluation', 34, 1, 1, 'novembre'),
(14, 51, 28, 17, NULL, '2025-05-29 14:21:28', '2025-05-29 14:22:33', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(15, 52, 28, 18, NULL, '2025-05-29 14:21:30', '2025-05-29 14:22:26', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(16, 55, 28, 13, NULL, '2025-05-29 14:21:33', '2025-05-29 14:22:18', 16, 'Evaluation', 34, 1, 1, 'novembre'),
(17, 56, 28, 15, NULL, '2025-05-29 14:21:35', '2025-05-29 14:22:14', 17, 'Evaluation', 34, 1, 1, 'novembre'),
(18, 57, 28, 16, NULL, '2025-05-29 14:21:37', '2025-05-29 14:22:11', 18, 'Evaluation', 34, 1, 1, 'novembre'),
(19, 58, 28, 11, NULL, '2025-05-29 14:21:59', '2025-05-29 14:22:08', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(20, 51, 30, 14, NULL, '2025-05-29 14:23:02', '2025-05-29 14:23:20', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(21, 52, 30, 8, NULL, '2025-05-29 14:23:21', '2025-05-29 14:23:21', 15, 'Evaluation', 34, 1, 1, 'novembre'),
(22, 55, 30, 18, NULL, '2025-05-29 14:23:22', '2025-05-29 14:38:39', 17, 'Evaluation', 34, 1, 1, 'novembre'),
(23, 56, 30, 9, NULL, '2025-05-29 14:23:23', '2025-05-29 14:23:26', 10, 'Evaluation', 34, 1, 1, 'novembre'),
(24, 57, 30, 12, NULL, '2025-05-29 14:23:32', '2025-05-29 14:23:49', 11, 'Evaluation', 34, 1, 1, 'novembre'),
(25, 58, 30, 10, NULL, '2025-05-29 14:23:38', '2025-05-29 14:23:42', 5, 'Evaluation', 34, 1, 1, 'novembre'),
(26, 51, 31, 8, NULL, '2025-05-29 14:24:01', '2025-05-30 13:48:21', 12, 'Evaluation', 34, 1, 1, 'novembre'),
(27, 52, 31, 10, NULL, '2025-05-29 14:24:09', '2025-05-29 14:24:13', 8, 'Evaluation', 34, 1, 1, 'novembre'),
(28, 55, 31, 18, NULL, '2025-05-29 14:24:20', '2025-05-29 14:24:57', 14, 'Evaluation', 34, 1, 1, 'novembre'),
(29, 56, 31, 8, NULL, '2025-05-29 14:24:22', '2025-05-29 14:24:46', 10, 'Evaluation', 34, 1, 1, 'novembre'),
(30, 57, 31, 19, NULL, '2025-05-29 14:24:27', '2025-05-29 14:38:40', 18, 'Evaluation', 34, 1, 1, 'novembre'),
(31, 58, 31, 6, NULL, '2025-05-29 14:24:33', '2025-05-29 14:24:38', 3, 'Evaluation', 34, 1, 1, 'novembre'),
(32, 55, 32, 19, NULL, '2025-05-29 14:25:08', '2025-05-29 14:25:12', 17, 'Evaluation', 34, 1, 1, 'novembre'),
(33, 52, 32, 8, NULL, '2025-05-29 14:25:18', '2025-05-29 14:25:22', 12, 'Evaluation', 34, 1, 1, 'novembre'),
(34, 51, 32, 10, NULL, '2025-05-29 14:25:26', '2025-05-29 14:25:32', 16, 'Evaluation', 34, 1, 1, 'novembre'),
(35, 56, 32, 14, NULL, '2025-05-29 14:25:35', '2025-05-29 14:25:38', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(36, 57, 32, 9, NULL, '2025-05-29 14:25:43', '2025-05-29 14:25:46', 14, 'Evaluation', 34, 1, 1, 'novembre'),
(37, 58, 32, 12, NULL, '2025-05-29 14:25:56', '2025-05-29 14:26:00', 8, 'Evaluation', 34, 1, 1, 'novembre'),
(38, 51, 33, 11, NULL, '2025-05-29 14:26:10', '2025-05-29 14:26:14', 10, 'Evaluation', 34, 1, 1, 'novembre'),
(39, 52, 33, 13, NULL, '2025-05-29 14:26:21', '2025-05-29 14:26:29', 11, 'Evaluation', 34, 1, 1, 'novembre'),
(40, 55, 33, 17, NULL, '2025-05-29 14:26:34', '2025-05-29 14:26:37', 18, 'Evaluation', 34, 1, 1, 'novembre'),
(41, 56, 33, 5, NULL, '2025-05-29 14:26:41', '2025-05-29 14:26:44', 10, 'Evaluation', 34, 1, 1, 'novembre'),
(42, 57, 33, 18, NULL, '2025-05-29 14:26:50', '2025-05-29 14:41:40', 19, 'Evaluation', 34, 1, 1, 'novembre'),
(43, 58, 33, 7, NULL, '2025-05-29 14:27:04', '2025-05-29 14:27:11', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(44, 51, 35, 7, NULL, '2025-05-29 14:27:20', '2025-05-29 14:27:27', 9, 'Evaluation', 34, 1, 1, 'novembre'),
(45, 55, 35, 17, NULL, '2025-05-29 14:27:31', '2025-05-29 14:27:37', 19, 'Evaluation', 34, 1, 1, 'novembre'),
(46, 56, 35, 5, NULL, '2025-05-29 14:27:42', '2025-05-29 14:28:00', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(47, 52, 35, 7, NULL, '2025-05-29 14:27:47', '2025-05-29 14:27:54', 13, 'Evaluation', 34, 1, 1, 'novembre'),
(48, 57, 35, 5, NULL, '2025-05-29 14:27:56', '2025-05-29 14:27:58', 9, 'Evaluation', 34, 1, 1, 'novembre'),
(49, 58, 35, 7, NULL, '2025-05-29 14:28:03', '2025-05-29 14:28:10', 6, 'Evaluation', 34, 1, 1, 'novembre'),
(50, 51, 26, 9, NULL, '2025-05-29 14:29:29', '2025-05-29 14:29:38', 12, 'Evaluation', 34, 1, 1, 'décembre'),
(51, 55, 26, 19, NULL, '2025-05-29 14:29:44', '2025-05-29 14:29:48', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(52, 55, 26, 18, NULL, '2025-05-29 14:29:55', '2025-05-29 14:30:00', 16, 'Evaluation', 34, 1, 1, 'janvier'),
(53, 55, 26, NULL, 19, '2025-05-29 14:30:05', '2025-05-29 14:45:53', NULL, 'Composition', 34, 1, 1, 'février'),
(54, 52, 26, 12, NULL, '2025-05-29 14:30:09', '2025-05-29 14:30:14', 7, 'Evaluation', 34, 1, 1, 'décembre'),
(55, 52, 26, 14, NULL, '2025-05-29 14:30:20', '2025-05-29 14:31:01', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(56, 51, 26, 15, NULL, '2025-05-29 14:30:22', '2025-05-29 14:30:25', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(57, 51, 26, NULL, 15, '2025-05-29 14:30:57', '2025-05-29 14:30:57', NULL, 'Composition', 34, 1, 1, 'février'),
(58, 52, 26, NULL, 18, '2025-05-29 14:31:04', '2025-05-29 14:31:04', NULL, 'Composition', 34, 1, 1, 'février'),
(59, 56, 26, 12, NULL, '2025-05-29 14:31:09', '2025-05-29 14:31:12', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(60, 56, 26, 2, NULL, '2025-05-29 14:31:15', '2025-05-29 14:31:19', 9, 'Evaluation', 34, 1, 1, 'janvier'),
(61, 56, 26, NULL, 8, '2025-05-29 14:31:24', '2025-05-29 14:31:24', NULL, 'Composition', 34, 1, 1, 'février'),
(62, 57, 26, 15, NULL, '2025-05-29 14:31:27', '2025-05-29 14:47:02', 15, 'Evaluation', 34, 1, 1, 'décembre'),
(63, 57, 26, 19, NULL, '2025-05-29 14:31:32', '2025-05-29 14:47:00', 12, 'Evaluation', 34, 1, 1, 'janvier'),
(64, 57, 26, NULL, 13, '2025-05-29 14:31:41', '2025-05-29 14:44:31', NULL, 'Composition', 34, 1, 1, 'février'),
(65, 58, 26, 11, NULL, '2025-05-29 14:31:44', '2025-05-29 14:31:47', 10, 'Evaluation', 34, 1, 1, 'décembre'),
(66, 58, 26, 13, NULL, '2025-05-29 14:31:49', '2025-05-29 14:31:54', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(67, 58, 26, NULL, 13, '2025-05-29 14:32:09', '2025-05-29 14:32:09', NULL, 'Composition', 34, 1, 1, 'février'),
(68, 51, 27, 15, NULL, '2025-05-29 14:32:45', '2025-05-29 14:46:13', 12, 'Evaluation', 34, 1, 1, 'décembre'),
(69, 51, 27, 15, NULL, '2025-05-29 14:32:47', '2025-05-29 14:32:50', 16, 'Evaluation', 34, 1, 1, 'janvier'),
(70, 51, 27, NULL, 14, '2025-05-29 14:32:57', '2025-05-29 14:32:57', NULL, 'Composition', 34, 1, 1, 'février'),
(71, 52, 27, NULL, 16, '2025-05-29 14:33:00', '2025-05-29 14:33:00', NULL, 'Composition', 34, 1, 1, 'février'),
(72, 52, 27, 15, NULL, '2025-05-29 14:33:02', '2025-05-29 14:33:05', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(73, 52, 27, 14, NULL, '2025-05-29 14:33:11', '2025-05-29 14:33:13', 15, 'Evaluation', 34, 1, 1, 'décembre'),
(74, 56, 27, 9, NULL, '2025-05-29 14:33:15', '2025-05-29 14:33:18', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(75, 56, 27, 11, NULL, '2025-05-29 14:33:21', '2025-05-29 14:33:23', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(76, 56, 27, NULL, 11, '2025-05-29 14:33:26', '2025-05-29 14:33:26', NULL, 'Composition', 34, 1, 1, 'février'),
(77, 57, 27, 17, NULL, '2025-05-29 14:33:29', '2025-05-29 14:33:32', 16, 'Evaluation', 34, 1, 1, 'décembre'),
(78, 57, 27, 14, NULL, '2025-05-29 14:33:35', '2025-05-29 14:33:37', 14, 'Evaluation', 34, 1, 1, 'janvier'),
(79, 57, 27, NULL, 19, '2025-05-29 14:33:42', '2025-05-29 14:44:43', NULL, 'Composition', 34, 1, 1, 'février'),
(80, 58, 27, 15, NULL, '2025-05-29 14:33:46', '2025-05-29 14:33:49', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(81, 58, 27, 16, NULL, '2025-05-29 14:33:53', '2025-05-29 14:33:57', 14, 'Evaluation', 34, 1, 1, 'janvier'),
(82, 58, 27, NULL, 13, '2025-05-29 14:34:07', '2025-05-29 14:34:07', NULL, 'Composition', 34, 1, 1, 'février'),
(83, 55, 28, 18, NULL, '2025-05-29 14:35:12', '2025-05-29 14:35:15', 19, 'Evaluation', 34, 1, 1, 'décembre'),
(84, 52, 28, 16, NULL, '2025-05-29 14:35:18', '2025-05-29 14:35:21', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(85, 51, 28, 15, NULL, '2025-05-29 14:35:44', '2025-05-29 14:35:49', 15, 'Evaluation', 34, 1, 1, 'décembre'),
(86, 51, 28, 14, NULL, '2025-05-29 14:35:53', '2025-05-29 14:35:56', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(87, 51, 28, NULL, 14, '2025-05-29 14:36:04', '2025-05-29 14:36:04', NULL, 'Composition', 34, 1, 1, 'février'),
(88, 52, 28, 14, NULL, '2025-05-29 14:36:07', '2025-05-29 14:36:10', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(89, 52, 28, NULL, 13, '2025-05-29 14:36:15', '2025-05-29 14:36:15', NULL, 'Composition', 34, 1, 1, 'février'),
(90, 55, 28, 19, NULL, '2025-05-29 14:36:20', '2025-05-29 14:36:23', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(91, 55, 28, NULL, 17, '2025-05-29 14:36:29', '2025-05-29 14:36:29', NULL, 'Composition', 34, 1, 1, 'février'),
(92, 56, 28, 17, NULL, '2025-05-29 14:36:33', '2025-05-29 14:36:39', 19, 'Evaluation', 34, 1, 1, 'décembre'),
(93, 56, 28, 15, NULL, '2025-05-29 14:36:42', '2025-05-29 14:36:44', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(94, 56, 28, NULL, 14, '2025-05-29 14:36:47', '2025-05-29 14:36:47', NULL, 'Composition', 34, 1, 1, 'février'),
(95, 57, 28, 15, NULL, '2025-05-29 14:36:51', '2025-05-29 14:36:53', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(96, 57, 28, 14, NULL, '2025-05-29 14:36:55', '2025-05-29 14:36:58', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(97, 57, 28, NULL, 19, '2025-05-29 14:37:02', '2025-05-29 14:44:54', NULL, 'Composition', 34, 1, 1, 'février'),
(98, 58, 28, 14, NULL, '2025-05-29 14:37:09', '2025-05-29 14:37:11', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(99, 58, 28, 14, NULL, '2025-05-29 14:37:14', '2025-05-29 14:37:16', 14, 'Evaluation', 34, 1, 1, 'janvier'),
(100, 58, 28, NULL, 15, '2025-05-29 14:37:22', '2025-05-29 14:37:22', NULL, 'Composition', 34, 1, 1, 'février'),
(101, 51, 30, 12, NULL, '2025-05-29 14:38:03', '2025-05-29 14:38:05', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(102, 51, 30, 14, NULL, '2025-05-29 14:38:07', '2025-05-29 14:38:07', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(103, 51, 30, NULL, 15, '2025-05-29 14:38:09', '2025-05-29 14:38:09', NULL, 'Composition', 34, 1, 1, 'février'),
(104, 55, 30, 17, NULL, '2025-05-29 14:38:42', '2025-05-29 14:38:46', 19, 'Evaluation', 34, 1, 1, 'décembre'),
(105, 51, 31, 15, NULL, '2025-05-29 14:38:43', '2025-05-30 13:48:23', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(106, 55, 30, 18, NULL, '2025-05-29 14:38:54', '2025-05-29 14:39:04', 17, 'Evaluation', 34, 1, 1, 'janvier'),
(107, 52, 31, 11, NULL, '2025-05-29 14:39:00', '2025-05-29 14:39:10', 11, 'Evaluation', 34, 1, 1, 'décembre'),
(108, 55, 30, NULL, 19, '2025-05-29 14:39:14', '2025-05-29 14:39:14', NULL, 'Composition', 34, 1, 1, 'février'),
(109, 52, 30, NULL, 13, '2025-05-29 14:39:17', '2025-05-29 14:39:17', NULL, 'Composition', 34, 1, 1, 'février'),
(110, 55, 31, 16, NULL, '2025-05-29 14:39:17', '2025-05-29 14:39:21', 17, 'Evaluation', 34, 1, 1, 'décembre'),
(111, 52, 30, 15, NULL, '2025-05-29 14:39:19', '2025-05-29 14:39:22', 16, 'Evaluation', 34, 1, 1, 'janvier'),
(112, 52, 30, 15, NULL, '2025-05-29 14:39:24', '2025-05-29 14:39:25', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(113, 56, 31, 9, NULL, '2025-05-29 14:39:25', '2025-05-29 14:39:27', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(114, 56, 30, 16, NULL, '2025-05-29 14:39:28', '2025-05-29 14:39:30', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(115, 57, 31, 17, NULL, '2025-05-29 14:39:32', '2025-05-29 14:39:35', 19, 'Evaluation', 34, 1, 1, 'décembre'),
(116, 56, 30, 10, NULL, '2025-05-29 14:39:33', '2025-05-29 14:39:35', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(117, 58, 31, 13, NULL, '2025-05-29 14:39:36', '2025-05-29 14:39:43', 11, 'Evaluation', 34, 1, 1, 'décembre'),
(118, 56, 30, NULL, 10, '2025-05-29 14:39:39', '2025-05-29 14:39:39', NULL, 'Composition', 34, 1, 1, 'février'),
(119, 57, 30, 16, NULL, '2025-05-29 14:39:42', '2025-05-29 14:39:44', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(120, 57, 30, 19, NULL, '2025-05-29 14:39:46', '2025-05-29 14:39:48', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(121, 51, 31, 12, NULL, '2025-05-29 14:40:00', '2025-05-29 14:40:03', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(122, 57, 30, NULL, 17, '2025-05-29 14:40:01', '2025-05-29 14:40:01', NULL, 'Composition', 34, 1, 1, 'février'),
(123, 52, 31, 19, NULL, '2025-05-29 14:40:06', '2025-05-29 14:40:11', 11, 'Evaluation', 34, 1, 1, 'janvier'),
(124, 58, 30, 6, NULL, '2025-05-29 14:40:07', '2025-05-29 14:40:10', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(125, 58, 30, 6, NULL, '2025-05-29 14:40:13', '2025-05-29 14:40:17', 5, 'Evaluation', 34, 1, 1, 'janvier'),
(126, 55, 31, 18, NULL, '2025-05-29 14:40:15', '2025-05-29 14:40:19', 17, 'Evaluation', 34, 1, 1, 'janvier'),
(127, 58, 30, NULL, 9, '2025-05-29 14:40:21', '2025-05-29 14:40:21', NULL, 'Composition', 34, 1, 1, 'février'),
(128, 56, 31, 12, NULL, '2025-05-29 14:40:23', '2025-05-29 14:40:30', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(129, 51, 32, 13, NULL, '2025-05-29 14:40:33', '2025-05-29 14:40:37', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(130, 57, 31, 18, NULL, '2025-05-29 14:40:34', '2025-05-29 14:40:41', 19, 'Evaluation', 34, 1, 1, 'janvier'),
(131, 51, 32, 12, NULL, '2025-05-29 14:40:39', '2025-05-29 14:40:42', 16, 'Evaluation', 34, 1, 1, 'janvier'),
(132, 51, 32, NULL, 16, '2025-05-29 14:40:45', '2025-05-29 14:40:45', NULL, 'Composition', 34, 1, 1, 'février'),
(133, 58, 31, 9, NULL, '2025-05-29 14:40:45', '2025-05-29 14:40:48', 11, 'Evaluation', 34, 1, 1, 'janvier'),
(134, 55, 32, 19, NULL, '2025-05-29 14:40:47', '2025-05-29 14:40:52', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(135, 51, 31, NULL, 13, '2025-05-29 14:40:53', '2025-05-29 14:40:53', NULL, 'Composition', 34, 1, 1, 'février'),
(136, 52, 31, NULL, 12, '2025-05-29 14:40:55', '2025-05-29 14:40:55', NULL, 'Composition', 34, 1, 1, 'février'),
(137, 55, 31, NULL, 17, '2025-05-29 14:40:57', '2025-05-29 14:41:07', NULL, 'Composition', 34, 1, 1, 'février'),
(138, 55, 32, 17, NULL, '2025-05-29 14:40:58', '2025-05-29 14:41:01', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(139, 55, 32, NULL, 19, '2025-05-29 14:41:07', '2025-05-29 14:41:07', NULL, 'Composition', 34, 1, 1, 'février'),
(140, 56, 32, 12, NULL, '2025-05-29 14:41:10', '2025-05-29 14:41:12', 12, 'Evaluation', 34, 1, 1, 'décembre'),
(141, 56, 31, NULL, 12, '2025-05-29 14:41:11', '2025-05-29 14:41:11', NULL, 'Composition', 34, 1, 1, 'février'),
(142, 56, 32, 9, NULL, '2025-05-29 14:41:15', '2025-05-29 14:41:17', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(143, 57, 31, NULL, 18, '2025-05-29 14:41:15', '2025-05-29 14:41:15', NULL, 'Composition', 34, 1, 1, 'février'),
(144, 56, 32, NULL, 4, '2025-05-29 14:41:20', '2025-05-29 14:41:20', NULL, 'Composition', 34, 1, 1, 'février'),
(145, 58, 31, NULL, 11, '2025-05-29 14:41:21', '2025-05-29 14:41:21', NULL, 'Composition', 34, 1, 1, 'février'),
(146, 52, 32, NULL, 12, '2025-05-29 14:41:35', '2025-05-29 14:41:35', NULL, 'Composition', 34, 1, 1, 'février'),
(147, 52, 32, 12, NULL, '2025-05-29 14:41:43', '2025-05-29 14:41:45', 12, 'Evaluation', 34, 1, 1, 'janvier'),
(148, 51, 33, 17, NULL, '2025-05-29 14:41:43', '2025-05-29 14:41:46', 11, 'Evaluation', 34, 1, 1, 'décembre'),
(149, 52, 32, 16, NULL, '2025-05-29 14:41:48', '2025-05-29 14:41:52', 9, 'Evaluation', 34, 1, 1, 'décembre'),
(150, 52, 33, 11, NULL, '2025-05-29 14:41:49', '2025-05-29 14:41:52', 15, 'Evaluation', 34, 1, 1, 'décembre'),
(151, 55, 33, 10, NULL, '2025-05-29 14:41:54', '2025-05-29 14:42:10', 16, 'Evaluation', 34, 1, 1, 'décembre'),
(152, 57, 32, 12, NULL, '2025-05-29 14:41:58', '2025-05-29 14:42:07', 12, 'Evaluation', 34, 1, 1, 'décembre'),
(153, 56, 33, 8, NULL, '2025-05-29 14:42:08', '2025-05-29 14:42:14', 16, 'Evaluation', 34, 1, 1, 'décembre'),
(154, 57, 32, 15, NULL, '2025-05-29 14:42:11', '2025-05-29 14:42:15', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(155, 57, 32, NULL, 13, '2025-05-29 14:42:19', '2025-05-29 14:42:19', NULL, 'Composition', 34, 1, 1, 'février'),
(156, 58, 32, 12, NULL, '2025-05-29 14:42:21', '2025-05-29 14:42:24', 12, 'Evaluation', 34, 1, 1, 'décembre'),
(157, 57, 33, 16, NULL, '2025-05-29 14:42:22', '2025-05-29 14:42:25', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(158, 58, 33, 13, NULL, '2025-05-29 14:42:26', '2025-05-29 14:42:32', 11, 'Evaluation', 34, 1, 1, 'décembre'),
(159, 58, 32, 9, NULL, '2025-05-29 14:42:27', '2025-05-29 14:42:30', 8, 'Evaluation', 34, 1, 1, 'janvier'),
(160, 58, 32, NULL, 9, '2025-05-29 14:42:36', '2025-05-29 14:42:36', NULL, 'Composition', 34, 1, 1, 'février'),
(161, 51, 33, 11, NULL, '2025-05-29 14:42:44', '2025-05-29 14:42:47', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(162, 52, 33, 18, NULL, '2025-05-29 14:42:50', '2025-05-29 14:42:52', 12, 'Evaluation', 34, 1, 1, 'janvier'),
(163, 55, 35, 19, NULL, '2025-05-29 14:42:53', '2025-05-29 14:43:08', 17, 'Evaluation', 34, 1, 1, 'décembre'),
(164, 55, 33, 17, NULL, '2025-05-29 14:42:56', '2025-05-29 14:42:59', 11, 'Evaluation', 34, 1, 1, 'janvier'),
(165, 56, 33, 16, NULL, '2025-05-29 14:43:02', '2025-05-29 14:43:06', 12, 'Evaluation', 34, 1, 1, 'janvier'),
(166, 57, 33, 17, NULL, '2025-05-29 14:43:09', '2025-05-29 14:43:12', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(167, 56, 35, NULL, NULL, '2025-05-29 14:43:10', '2025-05-29 14:43:10', 13, 'Evaluation', 34, 1, 1, 'décembre'),
(168, 57, 35, 19, NULL, '2025-05-29 14:43:14', '2025-05-29 14:43:17', 18, 'Evaluation', 34, 1, 1, 'décembre'),
(169, 58, 33, 6, NULL, '2025-05-29 14:43:16', '2025-05-29 14:43:20', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(170, 57, 35, 16, NULL, '2025-05-29 14:43:19', '2025-05-29 14:43:21', 16, 'Evaluation', 34, 1, 1, 'janvier'),
(171, 51, 33, NULL, 14, '2025-05-29 14:43:23', '2025-05-29 14:43:23', NULL, 'Composition', 34, 1, 1, 'février'),
(172, 57, 35, NULL, 19, '2025-05-29 14:43:24', '2025-05-29 14:44:10', NULL, 'Composition', 34, 1, 1, 'février'),
(173, 52, 33, NULL, 12, '2025-05-29 14:43:26', '2025-05-29 14:43:26', NULL, 'Composition', 34, 1, 1, 'février'),
(174, 58, 35, 9, NULL, '2025-05-29 14:43:27', '2025-05-29 14:43:28', 14, 'Evaluation', 34, 1, 1, 'décembre'),
(175, 55, 33, NULL, 15, '2025-05-29 14:43:30', '2025-05-29 14:43:30', NULL, 'Composition', 34, 1, 1, 'février'),
(176, 56, 33, NULL, 2, '2025-05-29 14:43:31', '2025-05-29 14:43:31', NULL, 'Composition', 34, 1, 1, 'février'),
(177, 57, 33, NULL, 18, '2025-05-29 14:43:35', '2025-05-29 14:43:35', NULL, 'Composition', 34, 1, 1, 'février'),
(178, 58, 33, NULL, 11, '2025-05-29 14:43:40', '2025-05-29 14:43:40', NULL, 'Composition', 34, 1, 1, 'février'),
(179, 58, 35, 13, NULL, '2025-05-29 14:43:42', '2025-05-29 14:43:54', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(180, 58, 35, NULL, 14, '2025-05-29 14:44:00', '2025-05-29 14:44:00', NULL, 'Composition', 34, 1, 1, 'février'),
(181, 56, 35, NULL, 13, '2025-05-29 14:44:02', '2025-05-29 14:44:02', NULL, 'Composition', 34, 1, 1, 'février'),
(182, 56, 35, 13, NULL, '2025-05-29 14:44:04', '2025-05-29 14:44:08', 13, 'Evaluation', 34, 1, 1, 'janvier'),
(183, 55, 35, 19, NULL, '2025-05-29 14:44:11', '2025-05-29 14:44:21', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(184, 55, 35, NULL, 17, '2025-05-29 14:44:24', '2025-05-29 14:44:24', NULL, 'Composition', 34, 1, 1, 'février'),
(185, 52, 35, 14, NULL, '2025-05-29 14:44:26', '2025-05-29 14:44:28', 14, 'Evaluation', 34, 1, 1, 'janvier'),
(186, 52, 35, NULL, 8, '2025-05-29 14:44:33', '2025-05-29 14:44:33', NULL, 'Composition', 34, 1, 1, 'février'),
(187, 51, 35, NULL, 12, '2025-05-29 14:44:38', '2025-05-29 14:44:38', NULL, 'Composition', 34, 1, 1, 'février'),
(188, 51, 35, 14, NULL, '2025-05-29 14:44:40', '2025-05-29 14:44:43', 15, 'Evaluation', 34, 1, 1, 'janvier'),
(189, 51, 35, 12, NULL, '2025-05-29 14:44:45', '2025-05-29 14:44:53', 7, 'Evaluation', 34, 1, 1, 'décembre'),
(190, 52, 35, 16, NULL, '2025-05-29 14:44:48', '2025-05-29 14:44:50', 9, 'Evaluation', 34, 1, 1, 'décembre'),
(191, 55, 27, 20, NULL, '2025-05-29 14:46:17', '2025-05-29 14:46:20', 19, 'Evaluation', 34, 1, 1, 'décembre'),
(192, 55, 27, 19, NULL, '2025-05-29 14:46:25', '2025-05-29 14:46:29', 18, 'Evaluation', 34, 1, 1, 'janvier'),
(193, 55, 27, NULL, 19, '2025-05-29 14:46:35', '2025-05-29 14:46:35', NULL, 'Composition', 34, 1, 1, 'février'),
(194, 51, 26, 12, NULL, '2025-05-30 21:06:11', '2025-05-30 21:06:14', 17, 'Evaluation', 34, 2, 1, 'mars'),
(195, 51, 26, 14, NULL, '2025-05-30 21:06:17', '2025-05-30 21:06:23', 15, 'Evaluation', 34, 2, 1, 'avril'),
(196, 51, 26, 16, NULL, '2025-05-30 21:06:25', '2025-05-30 21:06:29', 16, 'Evaluation', 34, 2, 1, 'mai'),
(197, 51, 26, NULL, 18, '2025-05-30 21:06:34', '2025-05-30 21:06:34', NULL, 'Composition', 34, 2, 1, 'juin'),
(198, 51, 27, 15, NULL, '2025-05-30 21:06:41', '2025-05-30 21:06:47', 17, 'Evaluation', 34, 2, 1, 'mars'),
(199, 51, 27, 6, NULL, '2025-05-30 21:06:49', '2025-05-30 21:06:52', 11, 'Evaluation', 34, 2, 1, 'avril'),
(200, 51, 27, 17, NULL, '2025-05-30 21:06:55', '2025-05-30 21:06:59', 15, 'Evaluation', 34, 2, 1, 'mai'),
(201, 51, 27, NULL, 11, '2025-05-30 21:07:02', '2025-05-30 21:07:02', NULL, 'Composition', 34, 2, 1, 'juin'),
(202, 51, 28, 14, NULL, '2025-05-30 21:07:10', '2025-05-30 21:07:17', 12, 'Evaluation', 34, 2, 1, 'mars'),
(203, 51, 28, 17, NULL, '2025-05-30 21:07:19', '2025-05-30 21:07:25', 14, 'Evaluation', 34, 2, 1, 'avril'),
(204, 51, 28, 18, NULL, '2025-05-30 21:07:26', '2025-05-30 21:07:34', 11, 'Evaluation', 34, 2, 1, 'mai'),
(205, 51, 28, NULL, 19, '2025-05-30 21:07:39', '2025-05-30 21:07:39', NULL, 'Composition', 34, 2, 1, 'juin'),
(206, 51, 30, 13, NULL, '2025-05-30 21:07:51', '2025-05-30 21:07:52', 11, 'Evaluation', 34, 2, 1, 'mars'),
(207, 51, 30, 9, NULL, '2025-05-30 21:07:54', '2025-05-30 21:07:56', 15, 'Evaluation', 34, 2, 1, 'avril'),
(208, 51, 30, 11, NULL, '2025-05-30 21:07:59', '2025-05-30 21:08:00', 10, 'Evaluation', 34, 2, 1, 'mai'),
(209, 51, 30, NULL, 16, '2025-05-30 21:08:04', '2025-05-30 21:08:04', NULL, 'Composition', 34, 2, 1, 'juin'),
(210, 51, 31, 17, NULL, '2025-05-30 21:08:10', '2025-05-30 21:08:13', 16, 'Evaluation', 34, 2, 1, 'mars'),
(211, 51, 31, 19, NULL, '2025-05-30 21:08:14', '2025-05-30 21:08:16', 11, 'Evaluation', 34, 2, 1, 'avril'),
(212, 51, 31, 17, NULL, '2025-05-30 21:08:19', '2025-05-30 21:08:21', 12, 'Evaluation', 34, 2, 1, 'mai'),
(213, 51, 31, NULL, 18, '2025-05-30 21:08:25', '2025-05-30 21:08:25', NULL, 'Composition', 34, 2, 1, 'juin'),
(214, 51, 32, 15, NULL, '2025-05-30 21:08:31', '2025-05-30 21:08:34', 11, 'Evaluation', 34, 2, 1, 'mars'),
(215, 51, 32, 5, NULL, '2025-05-30 21:08:37', '2025-05-30 21:08:38', 8, 'Evaluation', 34, 2, 1, 'avril'),
(216, 51, 32, 16, NULL, '2025-05-30 21:08:39', '2025-05-30 21:08:42', 12, 'Evaluation', 34, 2, 1, 'mai'),
(217, 51, 32, NULL, 12, '2025-05-30 21:08:47', '2025-05-30 21:08:47', NULL, 'Composition', 34, 2, 1, 'juin'),
(218, 51, 33, 11, NULL, '2025-05-30 21:08:54', '2025-05-30 21:08:56', 6, 'Evaluation', 34, 2, 1, 'mars'),
(219, 51, 33, 17, NULL, '2025-05-30 21:08:57', '2025-05-30 21:08:59', 13, 'Evaluation', 34, 2, 1, 'avril'),
(220, 51, 33, 11, NULL, '2025-05-30 21:09:02', '2025-05-30 21:09:04', 19, 'Evaluation', 34, 2, 1, 'mai'),
(221, 51, 33, NULL, 18, '2025-05-30 21:09:07', '2025-05-30 21:09:07', NULL, 'Composition', 34, 2, 1, 'juin'),
(222, 51, 35, 11, NULL, '2025-05-30 21:09:14', '2025-05-30 21:09:16', 8, 'Evaluation', 34, 2, 1, 'mars'),
(223, 51, 35, 15, NULL, '2025-05-30 21:09:18', '2025-05-30 21:09:19', 19, 'Evaluation', 34, 2, 1, 'avril'),
(224, 51, 35, 10, NULL, '2025-05-30 21:09:21', '2025-05-30 21:09:24', 11, 'Evaluation', 34, 2, 1, 'mai'),
(225, 51, 35, NULL, 15, '2025-05-30 21:09:27', '2025-05-30 21:09:27', NULL, 'Composition', 34, 2, 1, 'juin');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) NOT NULL,
  `nom_option` varchar(191) DEFAULT NULL,
  `fiche_renseignement_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `nom_option`, `fiche_renseignement_id`) VALUES
(1, 'Science Sociale', 5),
(3, 'Science Mathématiques', 5),
(4, 'Science Experimentale', 5),
(5, 'Science Sociale', 6),
(6, 'Science Mathématiques', 6),
(7, 'Science Experimentale', 6),
(8, 'Science Sociale', 7),
(9, 'Science Mathématiques', 7),
(10, 'Science Experimentale', 7);

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_parent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_parent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_parent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email_parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_parent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `parents`
--

INSERT INTO `parents` (`id`, `nom_parent`, `prenom_parent`, `telephone_parent`, `Email_parent`, `adresse_parent`, `created_at`, `updated_at`, `profession`) VALUES
(30, 'Daffé', 'Aboubacar sidike', '622571990', 'daffe123@gmail.com', 'BOFFA', '2025-05-28 16:50:40', '2025-05-28 18:24:24', 'Enseignant'),
(31, 'Baldé', 'Ismaila', '610778899', 'ismaila@gmail.com', 'Labé', '2025-05-29 12:33:28', '2025-05-29 12:33:28', 'Boulanger'),
(32, 'Condé', 'Aicha', '623779903', 'aicha@gmail.com', 'Labé', '2025-05-29 12:38:22', '2025-05-29 12:38:22', 'Commerçante'),
(33, 'Barry', 'Ibrahima', '627889903', 'ibrahima@gmail.com', 'Nzérékoré', '2025-05-29 12:42:05', '2025-05-29 12:42:05', 'Enseignant'),
(34, 'Digital', 'Massabe', '611000000', 'massabedigital@gmail.com', 'Mamou', '2025-05-29 12:46:54', '2025-05-29 12:46:54', 'Développeur designer'),
(35, 'Barry', 'Aichatou', '62345667', 'aicha@gmail.com', 'Conakry', '2025-05-29 12:51:02', '2025-05-29 12:51:02', 'Femme sage'),
(36, 'Camara', 'Fatoumata Binta', '6346688', 'fatouma@gmail.com', 'Boké', '2025-05-29 13:10:33', '2025-05-29 13:10:33', 'Etudiante');

-- --------------------------------------------------------

--
-- Structure de la table `parent_eleves`
--

CREATE TABLE `parent_eleves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `lien_parente` enum('Père','Mère','Tuteur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `parent_eleves`
--

INSERT INTO `parent_eleves` (`id`, `parent_id`, `eleve_id`, `lien_parente`, `created_at`, `updated_at`) VALUES
(41, 30, 51, 'Père', '2025-05-28 16:50:40', '2025-05-28 16:50:40'),
(42, 30, 52, 'Père', '2025-05-28 21:52:22', '2025-05-28 21:52:22'),
(43, 31, 54, 'Tuteur', '2025-05-29 12:33:28', '2025-05-29 12:33:28'),
(44, 32, 55, 'Mère', '2025-05-29 12:38:22', '2025-05-29 12:38:22'),
(45, 33, 56, 'Père', '2025-05-29 12:42:05', '2025-05-29 12:42:05'),
(46, 34, 57, 'Tuteur', '2025-05-29 12:46:54', '2025-05-29 12:46:54'),
(47, 35, 53, 'Mère', '2025-05-29 12:51:02', '2025-05-29 12:51:02'),
(48, 36, 58, 'Tuteur', '2025-05-29 13:10:33', '2025-05-29 13:10:33');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE `payements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `tranche` enum('1ère Tranche','2ème Tranche','3ème Tranche') COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_payement` double NOT NULL,
  `compte_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_action_ecolage` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `payements`
--

INSERT INTO `payements` (`id`, `eleve_id`, `classe_id`, `annee_scolaire_id`, `tranche`, `montant_payement`, `compte_id`, `created_at`, `updated_at`, `id_action_ecolage`) VALUES
(35, 51, 34, 1, '1ère Tranche', 60000, 5, '2025-05-28 19:29:17', '2025-05-28 19:34:32', 0),
(36, 53, 35, 1, '1ère Tranche', 500000, 5, '2025-05-28 22:26:09', '2025-05-28 22:26:09', 1),
(37, 51, 34, 1, '1ère Tranche', 70000, 5, '2025-06-01 13:08:19', '2025-06-01 13:08:19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `payement_salaires`
--

CREATE TABLE `payement_salaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salaire_id` bigint(20) UNSIGNED NOT NULL,
  `compte_id` bigint(20) UNSIGNED NOT NULL,
  `montant` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `payement_salaires`
--

INSERT INTO `payement_salaires` (`id`, `salaire_id`, `compte_id`, `montant`, `created_at`, `updated_at`) VALUES
(1, 13, 6, 3250000, '2025-05-28 22:33:17', '2025-05-28 22:33:17');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(87, 'App\\Models\\User', 8, 'token', 'b7c7ed6732fc738284d25c82779825c1392955859454510d469654f47180bc91', '["*"]', '2025-05-29 15:48:34', NULL, '2025-05-28 22:40:57', '2025-05-29 15:48:34'),
(88, 'App\\Models\\User', 8, 'token', '1471cac27fcde16a3fae2d557db1ab91b88847f03b34ae1ce8488fa693e18176', '["*"]', '2025-05-29 12:20:54', NULL, '2025-05-29 12:10:02', '2025-05-29 12:20:54'),
(89, 'App\\Models\\User', 8, 'token', '550a8552d3c73dbe3280a6cc188bb9bd3d30eca63f8c076b0c26ac3409b4436e', '["*"]', '2025-05-29 12:30:46', NULL, '2025-05-29 12:30:44', '2025-05-29 12:30:46'),
(96, 'App\\Models\\User', 2, 'token', 'b3f58bb2659bdc6bdf14a8e02494893c499e872c906a3d4f28b97fd4ea9be2de', '["*"]', '2025-05-29 15:39:42', NULL, '2025-05-29 15:38:33', '2025-05-29 15:39:42'),
(97, 'App\\Models\\User', 4, 'token', '89c1307985aec4aa21d1f040245839abdd46db7ab461538d509fd5568604ed82', '["*"]', '2025-05-29 15:41:33', NULL, '2025-05-29 15:41:33', '2025-05-29 15:41:33'),
(98, 'App\\Models\\User', 3, 'token', '0e0a469ac927bf2dbd12a483609dd82445353dd990d8ede4e277d99c2dbdae77', '["*"]', '2025-05-29 15:55:31', NULL, '2025-05-29 15:42:19', '2025-05-29 15:55:31'),
(99, 'App\\Models\\User', 7, 'token', 'cbbdf95d50f74edf97073669a4f0201e58e7e6052d9c4800579e466a4ee4bda9', '["*"]', '2025-05-29 15:55:35', NULL, '2025-05-29 15:43:28', '2025-05-29 15:55:35'),
(100, 'App\\Models\\User', 6, 'token', '44585cd71a1eabc9ae78251c525ed7fcbc2febd2bbf992cd31bc3cfd2bac1689', '["*"]', '2025-05-29 15:45:40', NULL, '2025-05-29 15:45:06', '2025-05-29 15:45:40'),
(104, 'App\\Models\\User', 5, 'token', '3367ded9d91c5e7e93d19332902abbe5dd60410fbfb071d2dab22414e1752215', '["*"]', '2025-05-29 16:00:01', NULL, '2025-05-29 15:58:06', '2025-05-29 16:00:01'),
(108, 'App\\Models\\User', 8, 'token', 'a8ddae0f673fe763c970f2e2fd9d1a8c83752045b65e29bd54d934ab2cb2ca36', '["*"]', '2025-05-29 19:02:55', NULL, '2025-05-29 19:02:54', '2025-05-29 19:02:55'),
(109, 'App\\Models\\User', 3, 'token', 'ed6cb10c19fead418093ba2717b764ceec6bc93b377b0e756b65018ac838a8c4', '["*"]', '2025-05-29 19:06:52', NULL, '2025-05-29 19:05:20', '2025-05-29 19:06:52'),
(110, 'App\\Models\\User', 6, 'token', '78db6ff1133394b71d3371b3e0fa40d13159dc6c83e83482ebb0a8d22134cf55', '["*"]', '2025-05-29 19:13:29', NULL, '2025-05-29 19:10:37', '2025-05-29 19:13:29'),
(111, 'App\\Models\\User', 2, 'token', 'c6bc3e0882225b1e50c08cfa80dffc810e4e0ccd50e77666f2dd34ff77e5328b', '["*"]', '2025-05-29 21:07:44', NULL, '2025-05-29 21:05:20', '2025-05-29 21:07:44'),
(119, 'App\\Models\\User', 2, 'token', '1676ca89310ac7a908e500e1a86be138ed8d456b9571ed673af494a71a01ce57', '["*"]', '2025-05-30 07:48:07', NULL, '2025-05-30 07:48:05', '2025-05-30 07:48:07'),
(122, 'App\\Models\\User', 5, 'token', '6382ec3c99b960ee249b6f13da18f6fda836ec87b5455e0c19fe6489395d628b', '["*"]', NULL, NULL, '2025-05-30 07:57:46', '2025-05-30 07:57:46'),
(123, 'App\\Models\\User', 5, 'token', '74bb53bb3284f708b39556a84fa5b1ca8f9c2a2b4094fd1b89359efe6b9ddae1', '["*"]', NULL, NULL, '2025-05-30 07:57:48', '2025-05-30 07:57:48'),
(126, 'App\\Models\\User', 1, 'token', '9de362822f0db29ffdde643c4479c091054ec9be55ec30c0d5f3acff8e6a9152', '["*"]', NULL, NULL, '2025-05-30 08:38:32', '2025-05-30 08:38:32'),
(127, 'App\\Models\\User', 1, 'token', 'bd65cb3f7162f0793c98e3600a32ac35bedcec121b8e1c7dc5fbe05f7ecb02b4', '["*"]', '2025-05-30 08:38:35', NULL, '2025-05-30 08:38:32', '2025-05-30 08:38:35'),
(128, 'App\\Models\\User', 1, 'token', '25e84da6f07a53e3458560278f3645846f610f340ceee56afe090007e6b614d0', '["*"]', NULL, NULL, '2025-05-30 08:38:33', '2025-05-30 08:38:33'),
(130, 'App\\Models\\User', 3, 'token', '38cfe3475375073e55a5e07006a797b47d7de7560725a20014a3a35cb45e8dbb', '["*"]', '2025-05-30 09:02:15', NULL, '2025-05-30 08:46:15', '2025-05-30 09:02:15'),
(131, 'App\\Models\\User', 2, 'token', '9d01c531482683b2d26c900ef28c876ba1a2201806b57eafc7c216df8cc4ea8e', '["*"]', '2025-05-30 08:54:58', NULL, '2025-05-30 08:54:57', '2025-05-30 08:54:58'),
(134, 'App\\Models\\User', 3, 'token', '80faf8ba9ba66142595c4e89377c1d6cb927db23f1d953b1e5ac2dde2b64d464', '["*"]', '2025-05-30 09:19:54', NULL, '2025-05-30 09:19:50', '2025-05-30 09:19:54'),
(135, 'App\\Models\\User', 3, 'token', '583407bc04b6ead72707869c9f281ec954c7a7899afd3642373eb67d182ad95f', '["*"]', NULL, NULL, '2025-05-30 09:19:52', '2025-05-30 09:19:52'),
(137, 'App\\Models\\User', 1, 'token', '8253d49c74256dc8e996daf5f5cd85ee352746ff769c72804d46fceccdd018be', '["*"]', '2025-05-30 09:32:33', NULL, '2025-05-30 09:22:22', '2025-05-30 09:32:33'),
(142, 'App\\Models\\User', 8, 'token', 'c97b4512d37833c60b44717f519dc0f2aee02a800525b56c19de048399a5372f', '["*"]', '2025-06-02 10:28:22', NULL, '2025-06-02 10:19:40', '2025-06-02 10:28:22');

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_personnel` enum('Masculin','Féminin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_nais_personnel` date NOT NULL,
  `tel_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_personnel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '"avatar.png"',
  `taux_horaire` int(11) DEFAULT '0',
  `salaire_base` int(11) DEFAULT '0',
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peice_jointe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lien_parente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_urgence` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `personnels`
--

INSERT INTO `personnels` (`id`, `matricule_personnel`, `nom_personnel`, `prenom_personnel`, `genre_personnel`, `date_nais_personnel`, `tel_personnel`, `mail_personnel`, `adresse_personnel`, `created_at`, `updated_at`, `photo`, `taux_horaire`, `salaire_base`, `cv`, `peice_jointe`, `lien_parente`, `contact_urgence`) VALUES
(16, 'BE-P512025', 'Camara', 'Ibrahima sory', 'Masculin', '1980-10-02', '627116056', 'ibrahime12@gmail.com', 'Conakry', '2025-05-28 19:59:26', '2025-05-28 19:59:26', '1748469566_IMG_8045.jpeg', 25000, 0, '1748469566_CV de sékou ahmed daffé.pdf', '1748469566_Lettre de demission.pdf', 'Père', '622571990'),
(17, 'BE-P5172025', 'Fofana', 'Amara', 'Masculin', '1990-02-02', '626463305', 'amara@gmail.com', 'Conakry', '2025-05-29 10:13:43', '2025-05-29 10:15:40', '1748520823_IMG-20220730-WA0007.jpg', 30000, 2000000, '1748520823_CV de sékou ahmed daffé.pdf', '1748520823_Lettre de demission.pdf', 'Mère', '625463305'),
(18, 'BE-P5182025', 'Balde', 'Mamadou Charif', 'Masculin', '2000-01-01', '611111111', 'mamadou@gmail.com', 'Matoto', '2025-05-29 10:21:53', '2025-05-29 10:36:04', '1748521313_IMG-20220605-WA0001.jpg', 25000, 1500000, '1748521313_CV de sékou ahmed daffé.pdf', '1748521313_Lettre de demission.pdf', 'Frère', '625463305'),
(19, 'BE-P5192025', 'Conde', 'Moussa', 'Masculin', '1997-02-01', '622571999', 'moussa12@gmail.com', 'Yattaya', '2025-05-29 10:29:54', '2025-05-29 10:29:54', '1748521794_d.png', 0, 600000, '1748521794_CV de sékou ahmed daffé.pdf', '1748521794_Lettre de demission.pdf', 'Père', '622571990'),
(20, 'BE-P5202025', 'Soire', 'Djibril', 'Masculin', '2000-02-10', '610000000', 'soire21@gmail.com', 'Matoto', '2025-05-29 10:47:43', '2025-05-29 10:47:43', '1748522863_d.jpeg', 0, 2000000, '1748522863_CV de sékou ahmed daffé.pdf', '1748522863_Lettre de demission.pdf', 'Père', '610000001'),
(21, 'BE-P5212025', 'Bah', 'Fatoumata', 'Féminin', '2012-02-02', '613000002', 'fatoumata1@gmailcom', 'Maferinyah', '2025-05-29 12:32:13', '2025-05-29 12:32:13', '1748529133_IMG_20240406_114236.jpg', 18000, 0, '1748529133_CV de sékou ahmed daffé.pdf', '1748529133_Lettre de demission.pdf', 'Père', '628782594'),
(22, 'BE-P5222025', 'Haba', 'Vincent', 'Masculin', '1990-05-25', '623456543', 'vincent@gmail.com', 'Gbessia', '2025-05-29 13:22:30', '2025-05-29 13:27:59', '1748532150_20250224_124539.png', 15000, 0, '1748532150_Personnalisation_Windows_10.pdf', '1748532150_Devoir_Windows_Word.pdf', 'Père', '621108117'),
(23, 'BE-P5232025', 'Lamara', 'BARRY', 'Masculin', '1989-10-10', '620345678', 'lamara43@gmail.com', 'Kagbelen', '2025-05-29 13:25:24', '2025-05-29 14:14:17', '1748532323_carte mariage copie.jpg', 20000, 1, '1748532324_Devoir_Windows_Word.pdf', '1748532324_DEVOIR DE WINDOWS ET WORD.pdf', 'Mère', '613404573'),
(24, 'BE-P5242025', 'Barry', 'Mariam', 'Féminin', '1999-04-10', '610823452', 'mariam@gmail.com', 'Lanbagni', '2025-05-29 13:32:52', '2025-05-29 13:32:52', '1748532772_images.jpeg', 0, 5500000, '1748532772_Évaluation du Ju1 complet fatimah.pdf', '1748532772_flutter.pdf', 'Mère', '666834675'),
(25, 'BE-P5252025', 'BAH', 'Arbaba', 'Masculin', '1899-07-15', '613456376', 'arbaba@gmail.com', 'Gbessia Cite', '2025-05-29 13:35:34', '2025-05-29 13:35:34', '1748532934_SUJET1-1 copie.jpg', 25000, 0, '1748532934_Sécurité Informatique.pdf', '1748532934_Sécurité Informatique.pdf', 'Frère', '623904567');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_eleves`
--

CREATE TABLE `personnel_eleves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `lien_parente` enum('Père','Mère','Tuteur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `personnel_eleves`
--

INSERT INTO `personnel_eleves` (`id`, `personnel_id`, `eleve_id`, `lien_parente`, `created_at`, `updated_at`) VALUES
(1, 16, 53, 'Père', '2025-05-28 21:57:47', '2025-05-28 21:57:47');

-- --------------------------------------------------------

--
-- Structure de la table `reductions`
--

CREATE TABLE `reductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eleve_id` bigint(20) UNSIGNED NOT NULL,
  `montant_reduction` double NOT NULL,
  `tranche` enum('1ère Tranche','2ème Tranche','3ème Tranche') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `classe_id` bigint(20) UNSIGNED DEFAULT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `reductions`
--

INSERT INTO `reductions` (`id`, `eleve_id`, `montant_reduction`, `tranche`, `created_at`, `updated_at`, `classe_id`, `annee_scolaire_id`) VALUES
(12, 51, 30000, '1ère Tranche', '2025-05-28 19:27:51', '2025-05-28 19:27:51', 34, 1),
(13, 53, 20000, '2ème Tranche', '2025-05-30 07:29:05', '2025-05-30 07:29:05', 35, 1),
(15, 51, 20000, '2ème Tranche', '2025-06-01 13:07:47', '2025-06-01 13:07:47', 34, 1),
(16, 51, 20000, '3ème Tranche', '2025-06-02 10:28:20', '2025-06-02 10:28:20', 34, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salaires`
--

CREATE TABLE `salaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `salaire_brut` double NOT NULL,
  `avance_salaire` double NOT NULL,
  `salaire_net` double NOT NULL,
  `statut` enum('payé','non payé') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `affaire_sociale` double DEFAULT '0',
  `ecolage` double DEFAULT '0',
  `prime` double DEFAULT '0',
  `disponibilite` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `fonction_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `salaires`
--

INSERT INTO `salaires` (`id`, `mois`, `annee_scolaire_id`, `salaire_brut`, `avance_salaire`, `salaire_net`, `statut`, `created_at`, `updated_at`, `affaire_sociale`, `ecolage`, `prime`, `disponibilite`, `personnel_id`, `fonction_id`) VALUES
(13, 'Avril', 1, 3750000, 0, 3250000, 'payé', '2025-05-28 21:10:44', '2025-05-28 22:33:16', 0, 500000, 0, 'oui', 16, 1),
(14, 'Avril', 1, 2000000, 0, 2200000, 'non payé', '2025-05-29 22:18:10', '2025-05-29 22:18:10', 0, 0, 200000, 'oui', 17, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6wK7ld2cggdhdsVo2cqsxcsOjTiGOaUqROR56hVY', NULL, '192.168.1.2', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWtocVFiN1F1Y3kwbktrRUJVOFNxa2FiM0doVHJaMWc0QTVacVlaUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748533255),
('9oNcQt7Mysdoaefjto2EOdh0NqjIdfKjSQcWtaz1', NULL, '192.168.1.2', 'Avast Antivirus', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0M5RmZ0VUdTNVhZT2lVM2FmSnUxbU5rajZndEZ0bVhDZjVTR21JeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748532752),
('v7uc14ni1rhWlJCgQaLH2mh0bcNmEtdV62tHr2Qv', NULL, '192.168.1.2', 'Avast Antivirus', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXozMm5MTmFsYXYwV2Rnd2hiMURMVW1EUFNPdUV3dUdQenp0dmxRViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748533245),
('xpIpZ2tdwHWXeil2rU3q3gVU1kgHjclTafTG9nLJ', NULL, '192.168.1.2', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0IyUWVhdkd6N1pUMEpnTlBYblAydnJSSXpqbldsOEtRNTJjYWVxMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly8xOTIuMTY4LjEuMjo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748532763);

-- --------------------------------------------------------

--
-- Structure de la table `type_depenses`
--

CREATE TABLE `type_depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `type_depenses`
--

INSERT INTO `type_depenses` (`id`, `libelle`, `created_at`, `updated_at`, `description`) VALUES
(1, 'recette', '2025-02-17 22:00:00', '2025-02-17 22:00:00', ''),
(2, 'Location', '2025-02-17 22:00:00', '2025-03-06 10:57:24', 'location pour les personnels'),
(3, 'fourniture scolaire', '2025-02-17 22:00:00', '2025-02-17 22:00:00', 'achat des fournitures scolaire comme les craies, les règles, cahiers etc..'),
(4, 'Impots', '2025-02-18 15:08:38', '2025-03-06 10:45:41', 'payement de l\'impots a l\'etat');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenomUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephoneUser` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Droit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDroit` bigint(20) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photosUser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'actif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `prenomUser`, `nomUser`, `telephoneUser`, `Droit`, `idDroit`, `email`, `role`, `photosUser`, `matricule`, `statut`) VALUES
(1, NULL, NULL, '$2y$12$9ej6j7y3IWeKEh6GVZIZmuCfd9M6pONqZAE5OtuXWFNSWS0UY9oRi', NULL, '2025-05-15 20:00:00', '2025-05-24 13:32:37', 'Mamadou Charif', 'Baldé', '62916779344', 'Comptable', 24, 'comptable@example.com', 'admin', '/assets/images/bg-billy-3.jpg', 'BE-P512025', 'actif'),
(2, NULL, NULL, '$2y$12$Xk8pXwtcKIAYCXm7pzCXmOB8KYmZAAJbsOcC9DU9K4usdp7yy.3jO', NULL, '2025-05-15 20:00:00', '2025-05-24 13:41:03', 'Djibril Soiré', 'Daffé', '629167794', 'DG', 16, 'dg@example.com', 'admin', '/assets/images/bg-billy-3.jpg', 'BE-P512025', 'actif'),
(3, NULL, NULL, '$2y$12$wSzZquCouVMRcJpAzaHS2OUd8dwUViKA8k8zkodSVcVb0NOItFBLu', NULL, '2025-05-15 20:00:00', '2025-05-24 13:59:41', 'Sekou Ahmed', 'Daffé', '629167795', 'DE', 16, 'de@example.com', 'admin', '/assets/images/bg-billy-3.jpg', 'BE-P512025', 'actif'),
(4, NULL, NULL, '$2y$12$FEUPwBDP1TgJ4dvVK6vXxO76Ujmv1KkOgcZdYjoUoIMhim16LF8Fu', NULL, '2025-05-15 20:00:00', '2025-05-24 17:13:58', 'Moussa', 'Cissé', '629167796', 'Censeur', 16, 'censeur@example.com', 'admin', '/assets/images/bg-billy-3.jpg', 'BE-P512025', 'actif'),
(5, NULL, NULL, '$2y$12$6kwIII7lSlpnv70ZQ4iC1.xM4CIqlcRlfE2H02h6syys/xB7w6kG6', NULL, '2025-05-15 20:00:00', '2025-05-24 12:19:21', 'Alpha', 'Condé', '629167797', 'Enseignant', 16, 'enseignant@example.com', 'enseignant', '/assets/images/bg-billy-2.jpg', 'BE-P512025', 'actif'),
(6, NULL, NULL, '$2y$12$KMAl4pNzrbaxYvlN8uBcGehI0ze/ljsRqE2SPc1LnjIYxjxedyA0C', NULL, '2025-05-15 20:00:00', '2025-05-15 20:00:00', 'Mamadou Saliou', 'Baldé', '629167798', 'parent', 30, 'parent@example.com', 'eleve', '/assets/images/bg-billy-1.jpg', NULL, 'actif'),
(7, NULL, NULL, '$2y$12$9FComOvoOuGBqBR1vRD1AOQTUgD04bnEdAtN0v5BGN5U4g3SNCEKK', NULL, '2025-05-15 20:00:00', '2025-05-15 20:00:00', 'Charif', 'Baldé', '629167799', 'eleve', 51, 'eleve@example.com', 'eleve', '/assets/images/bg-billy-3.jpg', 'BE-E512025', 'actif'),
(8, NULL, NULL, '$2y$12$VIoHErLZI/vvSYQgpZ7YyO.d8gwBlU15Drqp/dy75W8QgBrYwoRWK', NULL, '2025-05-15 20:00:00', '2025-05-15 20:00:00', 'Ibrahima sory', 'Diallo', '629167710', 'admin', 16, 'admin@example.com', 'admin', '/assets/images/bg-billy-3.jpg', 'BE-P512025', 'actif');

-- --------------------------------------------------------

--
-- Structure de la table `volume_horaires`
--

CREATE TABLE `volume_horaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_id` bigint(20) UNSIGNED NOT NULL,
  `mois` enum('Janvier','Février','Mars','Avril','Mais','Juin','Juiellet','Août','Séptembre','Octombre','Novembre','Decembre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreHeure` int(11) NOT NULL,
  `annee_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `volume_horaires`
--

INSERT INTO `volume_horaires` (`id`, `personnel_id`, `mois`, `nombreHeure`, `annee_scolaire_id`, `created_at`, `updated_at`) VALUES
(11, 16, 'Avril', 150, 1, '2025-05-28 20:18:19', '2025-05-28 20:18:39'),
(12, 16, 'Janvier', 200, 1, '2025-05-29 22:13:18', '2025-05-29 22:13:18'),
(13, 16, 'Février', 100, 1, '2025-05-29 22:13:38', '2025-05-29 22:13:38'),
(14, 25, 'Mars', 121, 1, '2025-05-29 22:14:21', '2025-05-29 22:14:21'),
(15, 25, 'Avril', 121, 1, '2025-05-29 22:14:42', '2025-05-29 22:14:42'),
(16, 25, 'Janvier', 200, 1, '2025-05-29 22:15:00', '2025-05-29 22:15:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `accueillits`
--
ALTER TABLE `accueillits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accueillits_eleve_id_foreign` (`eleve_id`);

--
-- Index pour la table `action_personnels`
--
ALTER TABLE `action_personnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`),
  ADD KEY `compte_id` (`compte_id`),
  ADD KEY `personnel_id` (`personnel_id`),
  ADD KEY `fontion` (`fonction`);

--
-- Index pour la table `affecters`
--
ALTER TABLE `affecters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `affecters_enseigner_id_foreign` (`enseigner_id`),
  ADD KEY `affecters_classe_id_foreign` (`classe_id`),
  ADD KEY `affecters_annee_scolaire_id_foreign` (`annee_scolaire_id`);

--
-- Index pour la table `annee_scolaires`
--
ALTER TABLE `annee_scolaires`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_id` (`option_id`);

--
-- Index pour la table `coefficients`
--
ALTER TABLE `coefficients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiche_renseignement_id` (`fiche_renseignement_id`),
  ADD KEY `option_id` (`option_id`),
  ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departs`
--
ALTER TABLE `departs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departs_eleve_id_foreign` (`eleve_id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depenses_compte_id_foreign` (`compte_id`),
  ADD KEY `depenses_type_depense_id_foreign` (`type_depense_id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`);

--
-- Index pour la table `dispenser_dans`
--
ALTER TABLE `dispenser_dans`
  ADD KEY `matiere_id` (`matiere_id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Index pour la table `effectif_classes`
--
ALTER TABLE `effectif_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `effectif_classes_classe_id_foreign` (`classe_id`),
  ADD KEY `effectif_classes_annee_scolaire_id_foreign` (`annee_scolaire_id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emploi_temps_classe_id_foreign` (`classe_id`),
  ADD KEY `emploi_temps_matiere_id_foreign` (`matiere_id`),
  ADD KEY `emploi_temps_personnel_id_foreign` (`personnel_id`);

--
-- Index pour la table `enseigners`
--
ALTER TABLE `enseigners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enseigners_personnel_id_foreign` (`personnel_id`),
  ADD KEY `enseigners_matiere_id_foreign` (`matiere_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fiche_renseignements`
--
ALTER TABLE `fiche_renseignements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonction_personnels`
--
ALTER TABLE `fonction_personnels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fonction_personnels_personnel_id_foreign` (`personnel_id`),
  ADD KEY `fonction_personnels_fonction_id_foreign` (`fonction_id`);

--
-- Index pour la table `ins_reins`
--
ALTER TABLE `ins_reins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ins_reins_eleve_id_foreign` (`eleve_id`),
  ADD KEY `ins_reins_classe_id_foreign` (`classe_id`),
  ADD KEY `ins_reins_annee_scolaire_id_foreign` (`annee_scolaire_id`);

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
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `noters`
--
ALTER TABLE `noters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `noters_eleve_id_foreign` (`eleve_id`),
  ADD KEY `noters_matiere_id_foreign` (`matiere_id`),
  ADD KEY `classe_id` (`classe_id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fiche_renseignement` (`fiche_renseignement_id`),
  ADD KEY `fiche_renseignement_id` (`fiche_renseignement_id`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_telephone_parent_unique` (`telephone_parent`);

--
-- Index pour la table `parent_eleves`
--
ALTER TABLE `parent_eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_eleves_parent_id_foreign` (`parent_id`),
  ADD KEY `parent_eleves_eleve_id_foreign` (`eleve_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payements_eleve_id_foreign` (`eleve_id`),
  ADD KEY `payements_classe_id_foreign` (`classe_id`),
  ADD KEY `payements_annee_scolaire_id_foreign` (`annee_scolaire_id`),
  ADD KEY `payements_compte_id_foreign` (`compte_id`);

--
-- Index pour la table `payement_salaires`
--
ALTER TABLE `payement_salaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payement_salaires_salaire_id_foreign` (`salaire_id`),
  ADD KEY `payement_salaires_compte_id_foreign` (`compte_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnel_eleves`
--
ALTER TABLE `personnel_eleves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_eleves_personnel_id_foreign` (`personnel_id`),
  ADD KEY `personnel_eleves_eleve_id_foreign` (`eleve_id`);

--
-- Index pour la table `reductions`
--
ALTER TABLE `reductions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reductions_eleve_id_foreign` (`eleve_id`),
  ADD KEY `classe_id` (`classe_id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`);

--
-- Index pour la table `salaires`
--
ALTER TABLE `salaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`),
  ADD KEY `personnel_id` (`personnel_id`),
  ADD KEY `fonction_id` (`fonction_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `type_depenses`
--
ALTER TABLE `type_depenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `volume_horaires`
--
ALTER TABLE `volume_horaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_id` (`personnel_id`),
  ADD KEY `annee_scolaire_id` (`annee_scolaire_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `accueillits`
--
ALTER TABLE `accueillits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `action_personnels`
--
ALTER TABLE `action_personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `affecters`
--
ALTER TABLE `affecters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT pour la table `annee_scolaires`
--
ALTER TABLE `annee_scolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `coefficients`
--
ALTER TABLE `coefficients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `departs`
--
ALTER TABLE `departs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `effectif_classes`
--
ALTER TABLE `effectif_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `enseigners`
--
ALTER TABLE `enseigners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fiche_renseignements`
--
ALTER TABLE `fiche_renseignements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `fonction_personnels`
--
ALTER TABLE `fonction_personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `ins_reins`
--
ALTER TABLE `ins_reins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `noters`
--
ALTER TABLE `noters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `parent_eleves`
--
ALTER TABLE `parent_eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `payement_salaires`
--
ALTER TABLE `payement_salaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `personnel_eleves`
--
ALTER TABLE `personnel_eleves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `reductions`
--
ALTER TABLE `reductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `salaires`
--
ALTER TABLE `salaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `type_depenses`
--
ALTER TABLE `type_depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `volume_horaires`
--
ALTER TABLE `volume_horaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accueillits`
--
ALTER TABLE `accueillits`
  ADD CONSTRAINT `accueillits_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Contraintes pour la table `action_personnels`
--
ALTER TABLE `action_personnels`
  ADD CONSTRAINT `action_personnels_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `action_personnels_ibfk_2` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `action_personnels_ibfk_3` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`);

--
-- Contraintes pour la table `affecters`
--
ALTER TABLE `affecters`
  ADD CONSTRAINT `affecters_annee_scolaire_id_foreign` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `affecters_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `affecters_enseigner_id_foreign` FOREIGN KEY (`enseigner_id`) REFERENCES `enseigners` (`id`);

--
-- Contraintes pour la table `coefficients`
--
ALTER TABLE `coefficients`
  ADD CONSTRAINT `coefficients_ibfk_1` FOREIGN KEY (`fiche_renseignement_id`) REFERENCES `fiche_renseignements` (`id`),
  ADD CONSTRAINT `coefficients_ibfk_2` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`);

--
-- Contraintes pour la table `departs`
--
ALTER TABLE `departs`
  ADD CONSTRAINT `departs_ibfk_1` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `departs_ibfk_2` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `departs_ibfk_3` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`),
  ADD CONSTRAINT `depenses_ibfk_1` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `depenses_type_depense_id_foreign` FOREIGN KEY (`type_depense_id`) REFERENCES `type_depenses` (`id`);

--
-- Contraintes pour la table `dispenser_dans`
--
ALTER TABLE `dispenser_dans`
  ADD CONSTRAINT `dispenser_dans_ibfk_1` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`),
  ADD CONSTRAINT `dispenser_dans_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);

--
-- Contraintes pour la table `effectif_classes`
--
ALTER TABLE `effectif_classes`
  ADD CONSTRAINT `effectif_classes_annee_scolaire_id_foreign` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `effectif_classes_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`);

--
-- Contraintes pour la table `emploi_temps`
--
ALTER TABLE `emploi_temps`
  ADD CONSTRAINT `emploi_temps_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `emploi_temps_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`),
  ADD CONSTRAINT `emploi_temps_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `enseigners`
--
ALTER TABLE `enseigners`
  ADD CONSTRAINT `enseigners_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`),
  ADD CONSTRAINT `enseigners_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `fonction_personnels`
--
ALTER TABLE `fonction_personnels`
  ADD CONSTRAINT `fonction_personnels_fonction_id_foreign` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`),
  ADD CONSTRAINT `fonction_personnels_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `ins_reins`
--
ALTER TABLE `ins_reins`
  ADD CONSTRAINT `ins_reins_annee_scolaire_id_foreign` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `ins_reins_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `ins_reins_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Contraintes pour la table `noters`
--
ALTER TABLE `noters`
  ADD CONSTRAINT `noters_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `noters_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `noters_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`);

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`fiche_renseignement_id`) REFERENCES `fiche_renseignements` (`id`);

--
-- Contraintes pour la table `parent_eleves`
--
ALTER TABLE `parent_eleves`
  ADD CONSTRAINT `parent_eleves_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `parent_eleves_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`);

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_annee_scolaire_id_foreign` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `payements_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `payements_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`),
  ADD CONSTRAINT `payements_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`);

--
-- Contraintes pour la table `payement_salaires`
--
ALTER TABLE `payement_salaires`
  ADD CONSTRAINT `payement_salaires_compte_id_foreign` FOREIGN KEY (`compte_id`) REFERENCES `comptes` (`id`),
  ADD CONSTRAINT `payement_salaires_salaire_id_foreign` FOREIGN KEY (`salaire_id`) REFERENCES `salaires` (`id`);

--
-- Contraintes pour la table `personnel_eleves`
--
ALTER TABLE `personnel_eleves`
  ADD CONSTRAINT `personnel_eleves_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `personnel_eleves_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`);

--
-- Contraintes pour la table `reductions`
--
ALTER TABLE `reductions`
  ADD CONSTRAINT `reductions_eleve_id_foreign` FOREIGN KEY (`eleve_id`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `reductions_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `reductions_ibfk_2` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`);

--
-- Contraintes pour la table `salaires`
--
ALTER TABLE `salaires`
  ADD CONSTRAINT `salaires_annee_scolaire_id_foreign` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`),
  ADD CONSTRAINT `salaires_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `salaires_ibfk_2` FOREIGN KEY (`fonction_id`) REFERENCES `fonctions` (`id`);

--
-- Contraintes pour la table `volume_horaires`
--
ALTER TABLE `volume_horaires`
  ADD CONSTRAINT `volume_horaires_ibfk_1` FOREIGN KEY (`personnel_id`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `volume_horaires_ibfk_2` FOREIGN KEY (`annee_scolaire_id`) REFERENCES `annee_scolaires` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
