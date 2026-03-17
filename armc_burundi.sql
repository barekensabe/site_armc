-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mars 2026 à 17:24
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `armc_burundi`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_alerte` varchar(100) NOT NULL,
  `nom_complet` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `type_alerte` enum('fraude','abus','non_conformite','manquement','signalement','autre') NOT NULL DEFAULT 'autre',
  `description` longtext NOT NULL,
  `piece_jointe` varchar(255) DEFAULT NULL,
  `niveau_confidentialite` enum('normal','confidentiel','anonyme') NOT NULL DEFAULT 'normal',
  `statut` enum('recu','en_cours','traite','classe_sans_suite') NOT NULL DEFAULT 'recu',
  `agent_assigne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_soumission` datetime NOT NULL DEFAULT current_timestamp(),
  `date_traitement` datetime DEFAULT NULL,
  `commentaire_interne` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `alerts`
--

INSERT INTO `alerts` (`id`, `reference_alerte`, `nom_complet`, `email`, `telephone`, `type_alerte`, `description`, `piece_jointe`, `niveau_confidentialite`, `statut`, `agent_assigne_id`, `date_soumission`, `date_traitement`, `commentaire_interne`, `created_at`, `updated_at`) VALUES
(1, 'AL-2026-0001', 'Anonyme', NULL, NULL, 'signalement', 'Signalement d’un comportement à vérifier.', NULL, 'anonyme', 'recu', 5, '2026-03-13 18:54:26', NULL, 'Signalement à analyser.', '2026-03-13 17:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `auteur_id` bigint(20) UNSIGNED NOT NULL,
  `validateur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resume` text DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `image_principale` varchar(255) DEFAULT NULL,
  `image_secondaire` varchar(255) DEFAULT NULL,
  `type_article` enum('actualite','communique','publication','education_financiere','analyse') NOT NULL DEFAULT 'actualite',
  `statut` enum('brouillon','en_revision','publie','rejete','archive') NOT NULL DEFAULT 'brouillon',
  `mis_en_avant` tinyint(1) NOT NULL DEFAULT 0,
  `afficher_accueil` tinyint(1) NOT NULL DEFAULT 1,
  `nombre_vues` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `date_publication` datetime DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `tags` varchar(500) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `categorie_id`, `auteur_id`, `validateur_id`, `titre`, `slug`, `resume`, `contenu`, `image_principale`, `image_secondaire`, `type_article`, `statut`, `mis_en_avant`, `afficher_accueil`, `nombre_vues`, `date_publication`, `date_validation`, `tags`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 4, 'Des professionnels burundais passent l\'examen CISI en Tanzanie', 'professionnels-burundais-examen-cisi-tanzanie', 'Des professionnels burundais participent à un examen CISI en Tanzanie pour renforcer le marché des capitaux.', 'Contenu détaillé de l’article sur l’examen CISI en Tanzanie.', '/uploads/articles/cisi-tanzanie.jpg', NULL, 'actualite', 'publie', 1, 1, 120, '2026-03-13 18:54:26', '2026-03-13 18:54:26', 'CISI,Tanzanie,marché des capitaux,formation', 'Professionnels burundais à l’examen CISI en Tanzanie', 'Actualité sur la participation de professionnels burundais à l’examen CISI en Tanzanie.', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 5, 3, 4, 'Comprendre le rôle du marché des capitaux', 'comprendrerolemarche', 'Un contenu pédagogique sur le rôle du marché des capitaux.', 'Contenu éducatif sur le marché des capitaux.', 'upload/cms/56e17e50d1c11af168abe14a01c2e688.jpg', NULL, 'education_financiere', 'publie', 1, 1, 76, '2026-03-13 18:54:00', '2026-03-13 18:54:26', 'éducation financière,marché des capitaux,investissement', 'Comprendre le rôle du marché des capitaux', 'Guide pédagogique pour comprendre le fonctionnement du marché des capitaux.', '2026-03-13 17:54:26', '2026-03-17 16:17:35'),
(3, 13, 5, 6, 'TEST', 'TEST', 'Connecté : Système Admin (Super Admin)Connecté : Système Admin (Super Admin)Connecté : Système Admin (Super Admin)', 'Connecté : Système Admin (Super Admin)Connecté : Système Admin (Super Admin)', NULL, NULL, '', 'en_revision', 1, 1, 0, '2026-03-15 09:29:00', '2026-03-22 09:29:00', NULL, NULL, 'Connecté : Système Admin (Super Admin)', '2026-03-15 08:29:51', '2026-03-15 08:29:51'),
(4, 8, 4, 4, 'Evènement de test', 'event', 'L’Autorité de Régulation du Marché des Capitaux (#ARMC) a organisé, ce 10 avril 2025, à l’Hôtel Source du Nil de Bujumbura, un atelier de renforcement des capacités destiné aux émetteurs potentiels du marché des capitaux. \r\nLes thèmes abordés lors de cet atelier incluaient « La constitution et la conduite de l’offre publique des valeurs mobilières » et « Le processus d’admission à la cote sur la Bourse des valeurs mobilières ».  \r\nDans son allocution, le Dr Arsène Mugenzi, Directeur Général de l’ARMC, a souligné que l’objectif principal de cet atelier était de renforcer les compétences des émetteurs potentiels, notamment sur la constitution et la conduite des offres publiques. Selon lui, cela vise à leur permettre d’accéder aux capitaux nécessaires pour financer efficacement leurs projets d’investissement.\r\n« Le marché des capitaux représente un levier stratégique pour mobiliser l’épargne nationale, régionale et internationale. Il constitue un outil crucial pour financer les investissements productifs et renforcer la compétitivité de nos entreprises. Afin de maximiser les opportunités qu’offre ce marché, il est essentiel que les émetteurs maîtrisent les mécanismes de l’offre publique et les exigences liées à une introduction en bourse », a-t-il déclaré.\r\n', 'L’Autorité de Régulation du Marché des Capitaux (#ARMC) a organisé, ce 10 avril 2025, à l’Hôtel Source du Nil de Bujumbura, un atelier de renforcement des capacités destiné aux émetteurs potentiels du marché des capitaux. \r\nLes thèmes abordés lors de cet atelier incluaient « La constitution et la conduite de l’offre publique des valeurs mobilières » et « Le processus d’admission à la cote sur la Bourse des valeurs mobilières ».  \r\nDans son allocution, le Dr Arsène Mugenzi, Directeur Général de l’ARMC, a souligné que l’objectif principal de cet atelier était de renforcer les compétences des émetteurs potentiels, notamment sur la constitution et la conduite des offres publiques. Selon lui, cela vise à leur permettre d’accéder aux capitaux nécessaires pour financer efficacement leurs projets d’investissement.\r\n« Le marché des capitaux représente un levier stratégique pour mobiliser l’épargne nationale, régionale et internationale. Il constitue un outil crucial pour financer les investissements productifs et renforcer la compétitivité de nos entreprises. Afin de maximiser les opportunités qu’offre ce marché, il est essentiel que les émetteurs maîtrisent les mécanismes de l’offre publique et les exigences liées à une introduction en bourse », a-t-il déclaré.\r\nL’ARMC a également réitéré son engagement à accompagner les acteurs du marché à travers des initiatives de formation et de sensibilisation, afin de favoriser une meilleure compréhension et une adhésion croissante aux mécanismes du marché des capitaux.', 'C:\\Users\\ALEXIS\\Desktop\\Capture.PNG', 'C:\\Users\\ALEXIS\\Desktop\\Capture.PNG', 'actualite', 'publie', 1, 1, 7, '2026-03-15 11:36:00', NULL, 'tag1', NULL, 'L’Autorité de Régulation du Marché des Capitaux (#ARMC) a organisé, ce 10 avril 2025, à l’Hôtel Source du Nil de Bujumbura, un atelier de renforcement des capacités destiné aux émetteurs potentiels du marché des capitaux. \r\nLes thèmes abordés lors de cet atelier incluaient « La constitution et la conduite de l’offre publique des valeurs mobilières » et « Le processus d’admission à la cote sur la Bourse des valeurs mobilières ».  \r\nDans son allocution, le Dr Arsène Mugenzi, Directeur Général de l’ARMC, a souligné que l’objectif principal de cet atelier était de renforcer les compétences des émetteurs potentiels, notamment sur la constitution et la conduite des offres publiques. Selon lui, cela vise à leur permettre d’accéder aux capitaux nécessaires pour financer efficacement leurs projets d’investissement.\r\n« Le marché des capitaux représente un levier stratégique pour mobiliser l’épargne nationale, régionale et internationale. Il constitue un outil crucial pour financer les investissements productifs et renforcer la compétitivité de nos entreprises. Afin de maximiser les opportunités qu’offre ce marché, il est essentiel que les émetteurs maîtrisent les mécanismes de l’offre publique et les exigences liées à une introduction en bourse », a-t-il déclaré.', '2026-03-15 10:44:31', '2026-03-17 11:15:54'),
(5, 10, 3, 4, 'Lois et regles', 'lois', 'Boulevard Melchior Ndadaye, Bujumbura, Burundi', 'Boulevard Melchior Ndadaye, Bujumbura, BurundiBoulevard Melchior Ndadaye, Bujumbura, BurundiBoulevard Melchior Ndadaye, Bujumbura, BurundiBoulevard Melchior Ndadaye, Bujumbura, BurundiBoulevard Melchior Ndadaye, Bujumbura, Burundi', 'upload/cms/45d34ae9f79a68beb9e6401b4263f371.png', 'upload/cms/c03f626450d784a7e5755c68b97049e0.png', 'publication', 'publie', 1, 1, 1, '2026-03-15 13:13:00', NULL, NULL, NULL, NULL, '2026-03-15 12:13:38', '2026-03-17 11:49:17'),
(6, 3, 7, 1, 'Visite de son Excellence', 'visite', 'La visite de son excellence', 'Dans le cadre de la visite de Son Excellence, les dispositions nécessaires ont été prises pour assurer le bon déroulement de l’événement.', 'upload/cms/0a7fd3877e211f886741ea8cfe0d2803.jpg', 'upload/cms/47843f275d012184ae00373235f557bd.jpg', 'actualite', 'publie', 1, 1, 2, '2026-03-17 12:00:00', NULL, NULL, NULL, NULL, '2026-03-17 11:01:13', '2026-03-17 16:10:41');

-- --------------------------------------------------------

--
-- Structure de la table `article_media`
--

CREATE TABLE `article_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED NOT NULL,
  `type_relation` enum('image_principale','galerie','document_joint') NOT NULL DEFAULT 'galerie',
  `ordre_affichage` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_media`
--

INSERT INTO `article_media` (`id`, `article_id`, `media_id`, `type_relation`, `ordre_affichage`, `created_at`) VALUES
(1, 1, 1, 'image_principale', 1, '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `article_tags`
--

CREATE TABLE `article_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article_tags`
--

INSERT INTO `article_tags` (`id`, `article_id`, `tag`, `created_at`) VALUES
(1, 1, 'CISI', '2026-03-13 17:54:26'),
(2, 1, 'Tanzanie', '2026-03-13 17:54:26'),
(3, 1, 'formation', '2026-03-13 17:54:26'),
(4, 2, 'éducation financière', '2026-03-13 17:54:26'),
(5, 2, 'marché des capitaux', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `cible_id` bigint(20) UNSIGNED DEFAULT NULL,
  `details` text DEFAULT NULL,
  `adresse_ip` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `module`, `cible_id`, `details`, `adresse_ip`, `user_agent`, `created_at`) VALUES
(1, 1, 'CREATE', 'users', 1, 'Création du super administrateur', '127.0.0.1', 'Seeder', '2026-03-13 17:54:26'),
(2, 1, 'CREATE', 'settings', NULL, 'Initialisation des paramètres système', '127.0.0.1', 'Seeder', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(150) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `type_contenu` enum('article','document','page','event','multiple') NOT NULL DEFAULT 'multiple',
  `description` text DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `couleur` varchar(30) DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `nom`, `slug`, `type_contenu`, `description`, `icone`, `couleur`, `actif`, `created_at`, `updated_at`) VALUES
(1, NULL, 'À propos', 'propos', 'page', 'Présentation institutionnelle de l’ARMC', 'info', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-17 15:59:07'),
(2, NULL, 'Cadre légal', 'legal', 'document', 'Textes légaux et réglementaires', 'gavel', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-17 15:59:17'),
(3, NULL, 'Actualités', 'actualites', 'article', 'Articles, communiqués et actualités', 'news', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(4, NULL, 'Rapports', 'rapports', 'document', 'Rapports institutionnels', 'report', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(5, NULL, 'Éducation financière', 'education', 'article', 'Contenus pédagogiques', 'school', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-17 15:59:27'),
(6, NULL, 'Supervision', 'supervision', 'document', 'Contrôle et supervision', 'shield', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(7, NULL, 'Recherche & Développement', 'recherche', 'article', 'Études et analyses', 'lab', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-17 15:59:38'),
(8, NULL, 'Événements', 'evenements', 'event', 'Conférences et ateliers', 'calendar', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(9, 1, 'Leadership', 'leadership', 'page', 'Leadership institutionnel', 'users', '#0B6E3B', 1, '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(10, 2, 'Lois', 'lois', 'document', 'Lois applicables', 'file-text', '#0B6E3B', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(11, 2, 'Décrets', 'decrets', 'document', 'Décrets applicables', 'file-text', '#0B6E3B', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(12, 4, 'Rapports annuels', 'documents', 'document', 'Rapports annuels', 'report', '#0B6E3B', 1, '2026-03-13 17:54:26', '2026-03-15 12:33:36'),
(13, 4, 'Statistiques', 'statistiques', 'document', 'Données statistiques', 'bar-chart', '#0B6E3B', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_plainte` varchar(100) NOT NULL,
  `nom_complet` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `institution_concernee` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `piece_jointe` varchar(255) DEFAULT NULL,
  `canal_reception` enum('web','email','telephone','physique') NOT NULL DEFAULT 'web',
  `priorite` enum('faible','moyenne','haute','critique') NOT NULL DEFAULT 'moyenne',
  `statut` enum('recu','en_cours','en_attente','traite','rejete','cloture') NOT NULL DEFAULT 'recu',
  `agent_assigne_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_soumission` datetime NOT NULL DEFAULT current_timestamp(),
  `date_traitement` datetime DEFAULT NULL,
  `date_cloture` datetime DEFAULT NULL,
  `commentaire_interne` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `complaints`
--

INSERT INTO `complaints` (`id`, `numero_plainte`, `nom_complet`, `email`, `telephone`, `adresse`, `institution_concernee`, `sujet`, `description`, `piece_jointe`, `canal_reception`, `priorite`, `statut`, `agent_assigne_id`, `date_soumission`, `date_traitement`, `date_cloture`, `commentaire_interne`, `created_at`, `updated_at`) VALUES
(1, 'PL-2026-0001', 'Nkurunziza Aline', 'aline@example.com', '+25762000001', 'Bujumbura', 'Institution X', 'Réclamation sur un service financier', 'Description détaillée de la plainte soumise par l’usager.', NULL, 'web', 'moyenne', 'en_cours', 5, '2026-03-13 18:54:26', NULL, NULL, 'Plainte affectée à l’agent compétent.', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 'PL-20260315120525', 'BAREKENSABE Alexis', 'barekensabealexiss@gmail.com', '79839653', 'kibenga', 'MEDIABOX', 'PAIEMENT', 'JE VEUX QUE VOUS ME PAYEZ', NULL, 'web', 'haute', 'traite', 2, '2026-03-15 12:04:00', NULL, NULL, 'RESOLU', '2026-03-15 11:04:23', '2026-03-15 11:05:25'),
(3, 'PL-20260316111952', 'ALAIN', 'prof@gmail.com', '78909876', 'kibenga', 'INNOVATEL', 'INFOS', 'TEST PLINTE ALAIN', NULL, 'web', 'haute', 'recu', NULL, '2026-03-16 11:19:52', NULL, NULL, NULL, '2026-03-16 10:19:52', '2026-03-16 10:19:52');

-- --------------------------------------------------------

--
-- Structure de la table `complaint_histories`
--

CREATE TABLE `complaint_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ancien_statut` enum('recu','en_cours','en_attente','traite','rejete','cloture') DEFAULT NULL,
  `nouveau_statut` enum('recu','en_cours','en_attente','traite','rejete','cloture') NOT NULL,
  `commentaire` text DEFAULT NULL,
  `date_action` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `complaint_histories`
--

INSERT INTO `complaint_histories` (`id`, `complaint_id`, `user_id`, `ancien_statut`, `nouveau_statut`, `commentaire`, `date_action`, `created_at`) VALUES
(1, 1, 5, 'recu', 'en_cours', 'Prise en charge de la plainte.', '2026-03-13 18:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_complet` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `statut` enum('non_lu','lu','traite') NOT NULL DEFAULT 'non_lu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `nom_complet`, `email`, `telephone`, `sujet`, `message`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Mugisha Patrick', 'patrick@example.com', '+25763000001', 'Demande d’information', 'Je souhaite obtenir plus d’informations sur les publications récentes.', 'non_lu', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 'UGP KORA IBIKORWA KORA', 'kora@gmail.com', '71555888', 'INFOS', 'JE VEUX UNE INFOS', 'non_lu', '2026-03-15 11:12:58', '2026-03-15 11:12:58'),
(3, 'KABWA JEAN', 'barekensabealexiss@gmail.com', '79839653', 'INFOS', 'HEHEHEHEH', 'non_lu', '2026-03-17 05:50:57', '2026-03-17 05:50:57');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `auteur_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `fichier_url` varchar(255) NOT NULL,
  `nom_fichier_original` varchar(255) DEFAULT NULL,
  `type_document` enum('rapport_annuel','rapport_trimestriel','loi','decret','reglement','circulaire','guide','etude','statistique','formulaire','autre') NOT NULL DEFAULT 'autre',
  `extension` varchar(20) DEFAULT NULL,
  `taille_fichier` bigint(20) UNSIGNED DEFAULT NULL,
  `annee` year(4) DEFAULT NULL,
  `statut` enum('brouillon','publie','archive') NOT NULL DEFAULT 'brouillon',
  `telechargeable` tinyint(1) NOT NULL DEFAULT 1,
  `nombre_telechargements` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `date_publication` datetime DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `categorie_id`, `auteur_id`, `titre`, `slug`, `description`, `fichier_url`, `nom_fichier_original`, `type_document`, `extension`, `taille_fichier`, `annee`, `statut`, `telechargeable`, `nombre_telechargements`, `date_publication`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 'Rapport Annuel 2025', 'rapport-annuel-2025', 'Rapport annuel de l’ARMC pour l’année 2025.', '/uploads/documents/rapport-annuel-2025.pdf', 'rapport-annuel-2025.pdf', 'rapport_annuel', 'pdf', 2540000, '2025', 'publie', 1, 15, '2026-03-13 18:54:26', 'Rapport Annuel 2025 - ARMC Burundi', 'Consultez le rapport annuel 2025 de l’ARMC Burundi.', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 10, 2, 'Loi portant organisation du marché des capitaux', 'loi-organisation-marche-capitaux', 'Texte légal relatif à l’organisation du marché des capitaux.', '/uploads/documents/loi-marche-capitaux.pdf', 'loi-marche-capitaux.pdf', 'loi', 'pdf', 1450000, '2024', 'publie', 1, 21, '2026-03-13 18:54:26', 'Loi sur le marché des capitaux', 'Texte légal sur l’organisation du marché des capitaux.', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(3, 4, 1, 'RAPPORT', 'REPORT', 'RAPPORT ANNUEL', 'upload/cms/4c0f0391f35348889a5baa9db77258bf.pdf', 'PLANNING-ANR_ Identification spéciale & Sécurité Biométrique.pdf', 'rapport_annuel', 'pdf', 141210, '2026', 'publie', 1, 0, '2026-03-15 12:08:00', 'TEST', 'TEST', '2026-03-15 11:09:12', '2026-03-15 11:09:12');

-- --------------------------------------------------------

--
-- Structure de la table `document_tags`
--

CREATE TABLE `document_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `document_tags`
--

INSERT INTO `document_tags` (`id`, `document_id`, `tag`, `created_at`) VALUES
(1, 1, 'rapport annuel', '2026-03-13 17:54:26'),
(2, 1, '2025', '2026-03-13 17:54:26'),
(3, 2, 'loi', '2026-03-13 17:54:26'),
(4, 2, 'cadre légal', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `logs` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_adresse` varchar(50) NOT NULL COMMENT 'adresse ip',
  `operating_system` varchar(100) NOT NULL COMMENT 'se',
  `browser_used` varchar(100) NOT NULL COMMENT 'navigateur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `logs`, `date_time`, `username`, `user_id`, `ip_adresse`, `operating_system`, `browser_used`) VALUES
(1, '17/02/2026 19:59:11-http://localhost/chantier/-GET--', '2026-02-17 19:59:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(2, '17/02/2026 19:59:29-http://localhost/chantier/Login/login-POST--Login/login', '2026-02-17 19:59:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(3, '17/02/2026 19:59:29-http://localhost/chantier/Login/welcom-GET--Login/welcom', '2026-02-17 19:59:29', 'admin@admin.bi', 2, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(4, '17/02/2026 19:59:40-http://localhost/chantier/Login/logout-GET--Login/logout', '2026-02-17 19:59:40', 'admin@admin.bi', 2, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(5, '17/02/2026 19:59:40-http://localhost/chantier/Login-GET--Login', '2026-02-17 19:59:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(6, '17/02/2026 21:39:10-http://localhost/chantier/Login-GET--Login', '2026-02-17 21:39:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 144.0.0.0'),
(7, '13/03/2026 18:01:19-http://localhost/armc/index.php-GET--', '2026-03-13 18:01:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(8, '13/03/2026 18:06:15-http://localhost/armc/index.php-GET--', '2026-03-13 18:06:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(9, '13/03/2026 18:08:19-http://localhost/armc/index.php-GET--', '2026-03-13 18:08:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(10, '13/03/2026 18:09:55-http://localhost/armc/index.php-GET--', '2026-03-13 18:09:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(11, '13/03/2026 18:10:37-http://localhost/armc/index.php-GET--', '2026-03-13 18:10:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(12, '13/03/2026 18:11:05-http://localhost/armc/index.php/ihm/Home/Alerte-GET--ihm/Home/Alerte', '2026-03-13 18:11:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(13, '13/03/2026 18:11:08-http://localhost/armc/index.php-GET--', '2026-03-13 18:11:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(14, '13/03/2026 18:11:18-http://localhost/armc/index.php/ihm/Home/Alerte-GET--ihm/Home/Alerte', '2026-03-13 18:11:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(15, '13/03/2026 18:11:34-http://localhost/armc/index.php-GET--', '2026-03-13 18:11:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(16, '15/03/2026 08:27:00-http://localhost/armc/index.php-GET--', '2026-03-15 08:27:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(17, '15/03/2026 08:32:35-http://localhost/armc/index.php/administration/Users-GET--administration/Users', '2026-03-15 08:32:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(18, '15/03/2026 08:32:36-http://localhost/armc/index.php/Login-GET--Login', '2026-03-15 08:32:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(19, '15/03/2026 08:34:36-http://localhost/armc/index.php/administration/Users-GET--administration/Users', '2026-03-15 08:34:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(20, '15/03/2026 08:34:36-http://localhost/armc/index.php/Login-GET--Login', '2026-03-15 08:34:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(21, '15/03/2026 08:37:05-http://localhost/armc/index.php/administration/Users-GET--administration/Users', '2026-03-15 08:37:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(22, '15/03/2026 08:37:47-http://localhost/armc/index.php/administration/Users/add-GET--administration/Users/add', '2026-03-15 08:37:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(23, '15/03/2026 08:41:30-http://localhost/armc/index.php-GET--', '2026-03-15 08:41:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(24, '15/03/2026 09:18:06-http://localhost/armc/index.php-GET--', '2026-03-15 09:18:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(25, '15/03/2026 09:25:30-http://localhost/armc/index.php-GET--', '2026-03-15 09:25:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(26, '15/03/2026 09:26:00-http://localhost/armc/index.php-GET--', '2026-03-15 09:26:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(27, '15/03/2026 09:26:11-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-15 09:26:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(28, '15/03/2026 09:26:19-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 09:26:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(29, '15/03/2026 09:26:20-http://localhost/armc/index.php/categorie/rapports-GET--categorie/rapports', '2026-03-15 09:26:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(30, '15/03/2026 09:26:25-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 09:26:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(31, '15/03/2026 09:26:30-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 09:26:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(32, '15/03/2026 09:26:32-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-15 09:26:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(33, '15/03/2026 09:26:33-http://localhost/armc/index.php/documents-GET--documents', '2026-03-15 09:26:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(34, '15/03/2026 09:26:42-http://localhost/armc/index.php/documents-GET--documents', '2026-03-15 09:26:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(35, '15/03/2026 09:27:28-http://localhost/armc/index.php/admin/Auth/login-GET--admin/Auth/login', '2026-03-15 09:27:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(36, '15/03/2026 09:27:32-http://localhost/armc/index.php/admin/Auth/login-POST--admin/Auth/login', '2026-03-15 09:27:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(37, '15/03/2026 09:27:33-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:27:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(38, '15/03/2026 09:27:38-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:27:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(39, '15/03/2026 09:27:40-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:27:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(40, '15/03/2026 09:27:48-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:27:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(41, '15/03/2026 09:27:54-http://localhost/armc/index.php/admin/articles-GET--admin/articles', '2026-03-15 09:27:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(42, '15/03/2026 09:27:59-http://localhost/armc/index.php/admin/articles/create-GET--admin/articles/create', '2026-03-15 09:27:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(43, '15/03/2026 09:28:49-http://localhost/armc/index.php/admin/articles/create-POST--admin/articles/create', '2026-03-15 09:28:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(44, '15/03/2026 09:28:55-http://localhost/armc/index.php/admin/articles/create-GET--admin/articles/create', '2026-03-15 09:28:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(45, '15/03/2026 09:29:51-http://localhost/armc/index.php/admin/articles/create-POST--admin/articles/create', '2026-03-15 09:29:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(46, '15/03/2026 09:29:51-http://localhost/armc/index.php/admin/articles/edit/3-GET--admin/articles/edit/3', '2026-03-15 09:29:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(47, '15/03/2026 09:29:57-http://localhost/armc/index.php-GET--', '2026-03-15 09:29:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(48, '15/03/2026 09:30:19-http://localhost/armc/index.php/admin/articles-GET--admin/articles', '2026-03-15 09:30:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(49, '15/03/2026 09:30:46-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:30:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(50, '15/03/2026 09:30:48-http://localhost/armc/index.php/admin/articles-GET--admin/articles', '2026-03-15 09:30:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(51, '15/03/2026 09:30:51-http://localhost/armc/index.php/admin/pages-GET--admin/pages', '2026-03-15 09:30:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(52, '15/03/2026 09:30:53-http://localhost/armc/index.php/admin/documents-GET--admin/documents', '2026-03-15 09:30:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(53, '15/03/2026 09:30:55-http://localhost/armc/index.php/admin/categories-GET--admin/categories', '2026-03-15 09:30:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(54, '15/03/2026 09:30:57-http://localhost/armc/index.php/admin/menus-GET--admin/menus', '2026-03-15 09:30:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(55, '15/03/2026 09:31:01-http://localhost/armc/index.php/admin/sliders-GET--admin/sliders', '2026-03-15 09:31:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(56, '15/03/2026 09:31:07-http://localhost/armc/index.php/admin/statistics-GET--admin/statistics', '2026-03-15 09:31:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(57, '15/03/2026 09:31:09-http://localhost/armc/index.php/admin/users-GET--admin/users', '2026-03-15 09:31:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(58, '15/03/2026 09:31:25-http://localhost/armc/index.php/admin/users/edit/6-GET--admin/users/edit/6', '2026-03-15 09:31:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(59, '15/03/2026 09:31:35-http://localhost/armc/index.php/admin/users/edit/6-POST--admin/users/edit/6', '2026-03-15 09:31:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(60, '15/03/2026 09:31:35-http://localhost/armc/index.php/admin/users/edit/6-GET--admin/users/edit/6', '2026-03-15 09:31:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(61, '15/03/2026 09:31:45-http://localhost/armc/index.php/admin/newsletters-GET--admin/newsletters', '2026-03-15 09:31:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(62, '15/03/2026 09:31:53-http://localhost/armc/index.php/admin/alerts-GET--admin/alerts', '2026-03-15 09:31:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(63, '15/03/2026 09:32:01-http://localhost/armc/index.php/admin/complaints-GET--admin/complaints', '2026-03-15 09:32:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(64, '15/03/2026 09:32:09-http://localhost/armc/index.php/admin/logout-GET--admin/logout', '2026-03-15 09:32:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(65, '15/03/2026 09:32:09-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 09:32:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(66, '15/03/2026 09:32:13-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 09:32:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(67, '15/03/2026 09:32:13-http://localhost/armc/index.php/admin/dashboard-GET--admin/dashboard', '2026-03-15 09:32:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(68, '15/03/2026 09:32:27-http://localhost/armc/index.php/admin/articles-GET--admin/articles', '2026-03-15 09:32:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(69, '15/03/2026 09:32:28-http://localhost/armc/index.php/admin/pages-GET--admin/pages', '2026-03-15 09:32:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(70, '15/03/2026 09:32:30-http://localhost/armc/index.php/admin/documents-GET--admin/documents', '2026-03-15 09:32:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(71, '15/03/2026 09:32:31-http://localhost/armc/index.php/admin/categories-GET--admin/categories', '2026-03-15 09:32:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(72, '15/03/2026 09:34:08-http://localhost/armcOLD/index.php-GET--', '2026-03-15 09:34:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(73, '15/03/2026 09:42:31-http://localhost/armc/index.php/admin/categories-GET--admin/categories', '2026-03-15 09:42:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(74, '15/03/2026 09:42:34-http://localhost/armc/index.php/admin/sliders-GET--admin/sliders', '2026-03-15 09:42:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(75, '15/03/2026 09:42:49-http://localhost/armc/index.php/admin/users-GET--admin/users', '2026-03-15 09:42:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(76, '15/03/2026 09:42:52-http://localhost/armc/index.php/admin/users/create-GET--admin/users/create', '2026-03-15 09:42:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(77, '15/03/2026 09:44:45-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-15 09:44:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(78, '15/03/2026 09:44:52-http://localhost/armc/index.php-GET--', '2026-03-15 09:44:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(79, '15/03/2026 10:04:01-http://localhost/armc/index.php-GET--', '2026-03-15 10:04:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(80, '15/03/2026 10:07:32-http://localhost/armc/index.php-GET--', '2026-03-15 10:07:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(81, '15/03/2026 10:07:49-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 10:07:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(82, '15/03/2026 10:07:58-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 10:07:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(83, '15/03/2026 10:09:27-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 10:09:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(84, '15/03/2026 10:09:34-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 10:09:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(85, '15/03/2026 10:10:39-http://localhost/armc/index.php/cms_admin/Admin/index-GET--cms_admin/Admin/index', '2026-03-15 10:10:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(86, '15/03/2026 10:10:39-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 10:10:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(87, '15/03/2026 10:10:47-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 10:10:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(88, '15/03/2026 10:10:48-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 10:10:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(89, '15/03/2026 10:10:59-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 10:10:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(90, '15/03/2026 10:11:09-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 10:11:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(91, '15/03/2026 10:11:15-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 10:11:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(92, '15/03/2026 10:11:35-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 10:11:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(93, '15/03/2026 10:11:46-http://localhost/armc/index.php/admin/create/menus-GET--admin/create/menus', '2026-03-15 10:11:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(94, '15/03/2026 10:12:01-http://localhost/armc/index.php/admin/create/menus-GET--admin/create/menus', '2026-03-15 10:12:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(95, '15/03/2026 10:12:04-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 10:12:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(96, '15/03/2026 10:12:24-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 10:12:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(97, '15/03/2026 10:12:34-http://localhost/armc/index.php/admin/create/categories-GET--admin/create/categories', '2026-03-15 10:12:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(98, '15/03/2026 10:12:46-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 10:12:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(99, '15/03/2026 10:12:48-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 10:12:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(100, '15/03/2026 10:12:50-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-15 10:12:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(101, '15/03/2026 10:12:52-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 10:12:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(102, '15/03/2026 10:12:54-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 10:12:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(103, '15/03/2026 10:12:55-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 10:12:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(104, '15/03/2026 10:12:57-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 10:12:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(105, '15/03/2026 10:12:58-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 10:12:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(106, '15/03/2026 10:13:01-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 10:13:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(107, '15/03/2026 10:13:02-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 10:13:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(108, '15/03/2026 10:13:04-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 10:13:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(109, '15/03/2026 10:13:07-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-15 10:13:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(110, '15/03/2026 10:13:13-http://localhost/armc/index.php-GET--', '2026-03-15 10:13:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(111, '15/03/2026 10:49:09-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 10:49:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(112, '15/03/2026 10:51:18-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 10:51:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(113, '15/03/2026 10:51:20-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-15 10:51:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(114, '15/03/2026 10:51:24-http://localhost/armc/index.php-GET--', '2026-03-15 10:51:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(115, '15/03/2026 10:52:06-http://localhost/armc/index.php/cms_admin/Admin/index-GET--cms_admin/Admin/index', '2026-03-15 10:52:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(116, '15/03/2026 10:52:12-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 10:52:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(117, '15/03/2026 10:52:22-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 10:52:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(118, '15/03/2026 10:53:00-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 10:53:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(119, '15/03/2026 10:53:20-http://localhost/armc/index.php/admin/edit/settings/3-GET--admin/edit/settings/3', '2026-03-15 10:53:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(120, '15/03/2026 10:53:29-http://localhost/armc/index.php/admin/edit/settings/3-POST--admin/edit/settings/3', '2026-03-15 10:53:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(121, '15/03/2026 11:11:47-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:11:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(122, '15/03/2026 11:12:00-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:12:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(123, '15/03/2026 11:12:05-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 11:12:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(124, '15/03/2026 11:12:12-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:12:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(125, '15/03/2026 11:12:49-http://localhost/armc/index.php/admin/edit/settings/3-GET--admin/edit/settings/3', '2026-03-15 11:12:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(126, '15/03/2026 11:12:53-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 11:12:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(127, '15/03/2026 11:13:11-http://localhost/armc/index.php/admin/edit/users/2-GET--admin/edit/users/2', '2026-03-15 11:13:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(128, '15/03/2026 11:13:32-http://localhost/armc/index.php/admin/edit/users/2-POST--admin/edit/users/2', '2026-03-15 11:13:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(129, '15/03/2026 11:13:32-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 11:13:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(130, '15/03/2026 11:13:43-http://localhost/armc/index.php/admin/create/users-GET--admin/create/users', '2026-03-15 11:13:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(131, '15/03/2026 11:14:03-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 11:14:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(132, '15/03/2026 11:14:23-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 11:14:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(133, '15/03/2026 11:14:26-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 11:14:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(134, '15/03/2026 11:14:28-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 11:14:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(135, '15/03/2026 11:14:37-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-15 11:14:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(136, '15/03/2026 11:14:39-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:14:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(137, '15/03/2026 11:15:06-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 11:15:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(138, '15/03/2026 11:28:04-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:28:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(139, '15/03/2026 11:28:04-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 11:28:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(140, '15/03/2026 11:28:30-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:28:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(141, '15/03/2026 11:28:34-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 11:28:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(142, '15/03/2026 11:28:38-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:28:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(143, '15/03/2026 11:28:49-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 11:28:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(144, '15/03/2026 11:29:20-http://localhost/armc/index.php/admin/detail/settings/3-GET--admin/detail/settings/3', '2026-03-15 11:29:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(145, '15/03/2026 11:29:29-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 11:29:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(146, '15/03/2026 11:29:48-http://localhost/armc/index.php/admin/edit/settings/3-GET--admin/edit/settings/3', '2026-03-15 11:29:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(147, '15/03/2026 11:30:07-http://localhost/armc/index.php/admin/edit/settings/3-POST--admin/edit/settings/3', '2026-03-15 11:30:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(148, '15/03/2026 11:30:07-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 11:30:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(149, '15/03/2026 11:30:14-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:30:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(150, '15/03/2026 11:30:35-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 11:30:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(151, '15/03/2026 11:30:52-http://localhost/armc/index.php/admin/edit/menus/1-GET--admin/edit/menus/1', '2026-03-15 11:30:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(152, '15/03/2026 11:31:07-http://localhost/armc/index.php/admin/edit/menus/1-POST--admin/edit/menus/1', '2026-03-15 11:31:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(153, '15/03/2026 11:31:08-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 11:31:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(154, '15/03/2026 11:31:13-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:31:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(155, '15/03/2026 11:31:47-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:31:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(156, '15/03/2026 11:31:57-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 11:31:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(157, '15/03/2026 11:32:12-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:32:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(158, '15/03/2026 11:32:30-http://localhost/armc/index.php/admin/detail/articles/3-GET--admin/detail/articles/3', '2026-03-15 11:32:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(159, '15/03/2026 11:32:37-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:32:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(160, '15/03/2026 11:32:48-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 11:32:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(161, '15/03/2026 11:44:31-http://localhost/armc/index.php/admin/create/articles-POST--admin/create/articles', '2026-03-15 11:44:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(162, '15/03/2026 11:44:31-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:44:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(163, '15/03/2026 11:44:57-http://localhost/armc/index.php/admin/detail/articles/4-GET--admin/detail/articles/4', '2026-03-15 11:44:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(164, '15/03/2026 11:45:40-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:45:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(165, '15/03/2026 11:45:50-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:45:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(166, '15/03/2026 11:45:53-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:45:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(167, '15/03/2026 11:45:56-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:45:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(168, '15/03/2026 11:46:24-http://localhost/armc/index.php/admin/toggle/articles/4-GET--admin/toggle/articles/4', '2026-03-15 11:46:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(169, '15/03/2026 11:46:25-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 11:46:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(170, '15/03/2026 11:46:39-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:46:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(171, '15/03/2026 11:46:53-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:46:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(172, '15/03/2026 11:47:10-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-15 11:47:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(173, '15/03/2026 11:47:35-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:47:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(174, '15/03/2026 11:47:45-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:47:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(175, '15/03/2026 11:47:52-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 11:47:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(176, '15/03/2026 11:47:56-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 11:47:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(177, '15/03/2026 11:48:02-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 11:48:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(178, '15/03/2026 11:48:05-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:48:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(179, '15/03/2026 11:48:08-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 11:48:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(180, '15/03/2026 11:48:21-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 11:48:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(181, '15/03/2026 11:48:33-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-15 11:48:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(182, '15/03/2026 11:48:56-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 11:48:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(183, '15/03/2026 11:54:05-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 11:54:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(184, '15/03/2026 11:54:25-http://localhost/armc/index.php/admin/edit/menus/1-GET--admin/edit/menus/1', '2026-03-15 11:54:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(185, '15/03/2026 11:54:35-http://localhost/armc/index.php/admin/edit/menus/1-POST--admin/edit/menus/1', '2026-03-15 11:54:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(186, '15/03/2026 11:54:35-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 11:54:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(187, '15/03/2026 11:54:38-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 11:54:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(188, '15/03/2026 11:54:56-http://localhost/armc/index.php/admin/create/sliders-GET--admin/create/sliders', '2026-03-15 11:54:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(189, '15/03/2026 11:55:54-http://localhost/armc/index.php/admin/create/sliders-POST--admin/create/sliders', '2026-03-15 11:55:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(190, '15/03/2026 11:55:55-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 11:55:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(191, '15/03/2026 11:56:15-http://localhost/armc/index.php-GET--', '2026-03-15 11:56:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(192, '15/03/2026 11:56:58-http://localhost/armc/index.php-GET--', '2026-03-15 11:56:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(193, '15/03/2026 11:57:03-http://localhost/armc/index.php/TEST-GET--TEST', '2026-03-15 11:57:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(194, '15/03/2026 11:59:20-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 11:59:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(195, '15/03/2026 11:59:43-http://localhost/armc/index.php/admin/edit/sliders/3-POST--admin/edit/sliders/3', '2026-03-15 11:59:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(196, '15/03/2026 11:59:43-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 11:59:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(197, '15/03/2026 11:59:56-http://localhost/armc/index.php-GET--', '2026-03-15 11:59:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(198, '15/03/2026 12:00:27-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:00:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(199, '15/03/2026 12:01:08-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:01:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(200, '15/03/2026 12:01:22-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:01:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(201, '15/03/2026 12:01:56-http://localhost/armc/index.php/admin/create/quick_links-GET--admin/create/quick_links', '2026-03-15 12:01:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(202, '15/03/2026 12:02:41-http://localhost/armc/index.php/admin/create/quick_links-POST--admin/create/quick_links', '2026-03-15 12:02:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(203, '15/03/2026 12:02:42-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:02:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(204, '15/03/2026 12:02:48-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:02:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(205, '15/03/2026 12:03:09-http://localhost/armc/index.php/admin/delete/quick_links/7-GET--admin/delete/quick_links/7', '2026-03-15 12:03:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(206, '15/03/2026 12:03:09-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:03:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(207, '15/03/2026 12:03:14-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:03:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(208, '15/03/2026 12:03:28-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-15 12:03:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(209, '15/03/2026 12:04:23-http://localhost/armc/index.php/plaintes/envoyer-POST--plaintes/envoyer', '2026-03-15 12:04:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(210, '15/03/2026 12:04:23-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-15 12:04:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(211, '15/03/2026 12:04:39-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-15 12:04:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(212, '15/03/2026 12:05:03-http://localhost/armc/index.php/admin/edit/complaints/2-GET--admin/edit/complaints/2', '2026-03-15 12:05:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(213, '15/03/2026 12:05:25-http://localhost/armc/index.php/admin/edit/complaints/2-POST--admin/edit/complaints/2', '2026-03-15 12:05:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(214, '15/03/2026 12:05:25-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-15 12:05:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(215, '15/03/2026 12:06:00-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-15 12:06:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(216, '15/03/2026 12:06:17-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 12:06:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(217, '15/03/2026 12:06:21-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:06:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(218, '15/03/2026 12:06:39-http://localhost/armc/index.php/newsletter/abonnement-POST--newsletter/abonnement', '2026-03-15 12:06:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(219, '15/03/2026 12:06:39-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:06:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(220, '15/03/2026 12:06:56-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-15 12:06:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(221, '15/03/2026 12:07:15-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 12:07:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(222, '15/03/2026 12:07:23-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-15 12:07:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(223, '15/03/2026 12:07:33-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 12:07:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(224, '15/03/2026 12:07:35-http://localhost/armc/index.php/admin/create/documents-GET--admin/create/documents', '2026-03-15 12:07:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(225, '15/03/2026 12:09:12-http://localhost/armc/index.php/admin/create/documents-POST--admin/create/documents', '2026-03-15 12:09:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(226, '15/03/2026 12:09:12-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 12:09:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(227, '15/03/2026 12:09:23-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:09:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(228, '15/03/2026 12:09:32-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:09:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(229, '15/03/2026 12:09:49-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:09:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(230, '15/03/2026 12:09:54-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:09:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(231, '15/03/2026 12:10:27-http://localhost/armc/index.php/categorie/decrets-GET--categorie/decrets', '2026-03-15 12:10:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(232, '15/03/2026 12:10:30-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 12:10:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(233, '15/03/2026 12:10:54-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 12:10:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(234, '15/03/2026 12:11:21-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 12:11:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(235, '15/03/2026 12:11:35-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:11:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(236, '15/03/2026 12:12:23-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-15 12:12:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(237, '15/03/2026 12:12:30-http://localhost/armc/index.php/contact-GET--contact', '2026-03-15 12:12:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(238, '15/03/2026 12:12:58-http://localhost/armc/index.php/contact/envoyer-POST--contact/envoyer', '2026-03-15 12:12:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(239, '15/03/2026 12:12:58-http://localhost/armc/index.php/contact-GET--contact', '2026-03-15 12:12:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(240, '15/03/2026 12:13:14-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-15 12:13:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(241, '15/03/2026 12:13:36-http://localhost/armc/index.php/admin/detail/contact_messages/2-GET--admin/detail/contact_messages/2', '2026-03-15 12:13:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(242, '15/03/2026 12:13:48-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:13:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(243, '15/03/2026 12:13:53-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 12:13:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(244, '15/03/2026 12:14:00-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:14:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(245, '15/03/2026 12:14:35-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 12:14:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(246, '15/03/2026 12:14:38-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 12:14:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(247, '15/03/2026 12:15:15-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:15:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(248, '15/03/2026 12:15:27-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 12:15:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(249, '15/03/2026 12:15:29-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 12:15:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(250, '15/03/2026 12:15:34-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:15:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(251, '15/03/2026 12:15:39-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:15:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(252, '15/03/2026 12:16:05-http://localhost/armc/index.php/admin/edit/settings/4-GET--admin/edit/settings/4', '2026-03-15 12:16:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(253, '15/03/2026 12:17:10-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:17:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(254, '15/03/2026 12:17:13-http://localhost/armc/index.php/admin/create/settings-GET--admin/create/settings', '2026-03-15 12:17:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(255, '15/03/2026 12:17:43-http://localhost/armc/index.php/admin/logout-GET--admin/logout', '2026-03-15 12:17:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(256, '15/03/2026 12:17:43-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:17:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(257, '15/03/2026 12:17:47-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:17:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(258, '15/03/2026 12:17:48-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:17:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(259, '15/03/2026 12:19:45-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:19:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(260, '15/03/2026 12:19:52-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:19:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(261, '15/03/2026 12:21:42-http://localhost/armc/index.php/admin/edit/settings/4-GET--admin/edit/settings/4', '2026-03-15 12:21:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(262, '15/03/2026 12:22:09-http://localhost/armc/index.php/admin/edit/settings/4-POST--admin/edit/settings/4', '2026-03-15 12:22:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(263, '15/03/2026 12:22:09-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:22:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(264, '15/03/2026 12:22:15-http://localhost/armc/index.php/contact-GET--contact', '2026-03-15 12:22:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(265, '15/03/2026 12:22:22-http://localhost/armc/index.php/contact-GET--contact', '2026-03-15 12:22:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(266, '15/03/2026 12:23:36-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:23:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0');
INSERT INTO `logs` (`id`, `logs`, `date_time`, `username`, `user_id`, `ip_adresse`, `operating_system`, `browser_used`) VALUES
(267, '15/03/2026 12:24:16-http://localhost/armc/index.php/admin/edit/settings/4-GET--admin/edit/settings/4', '2026-03-15 12:24:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(268, '15/03/2026 12:24:24-http://localhost/armc/index.php/admin/edit/settings/4-POST--admin/edit/settings/4', '2026-03-15 12:24:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(269, '15/03/2026 12:24:24-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:24:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(270, '15/03/2026 12:24:30-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:24:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(271, '15/03/2026 12:24:51-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 12:24:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(272, '15/03/2026 12:25:01-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 12:25:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(273, '15/03/2026 12:25:08-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 12:25:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(274, '15/03/2026 12:25:22-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 12:25:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(275, '15/03/2026 12:25:25-http://localhost/armc/index.php/categorie/decrets-GET--categorie/decrets', '2026-03-15 12:25:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(276, '15/03/2026 12:25:29-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:25:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(277, '15/03/2026 12:25:48-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 12:25:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(278, '15/03/2026 12:25:53-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-15 12:25:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(279, '15/03/2026 12:26:45-http://localhost/armc/index.php/contact-GET--contact', '2026-03-15 12:26:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(280, '15/03/2026 12:27:04-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:27:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(281, '15/03/2026 12:27:15-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 12:27:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(282, '15/03/2026 12:27:24-http://localhost/armc/index.php-GET--', '2026-03-15 12:27:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(283, '15/03/2026 12:28:17-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:28:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(284, '15/03/2026 12:28:24-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-15 12:28:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(285, '15/03/2026 12:29:33-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 12:29:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(286, '15/03/2026 12:29:38-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:29:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(287, '15/03/2026 12:29:41-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 12:29:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(288, '15/03/2026 12:29:42-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 12:29:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(289, '15/03/2026 12:30:38-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:30:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(290, '15/03/2026 12:30:40-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 12:30:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(291, '15/03/2026 12:30:43-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:30:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(292, '15/03/2026 12:32:13-http://localhost/armc/index.php/admin/create/settings-GET--admin/create/settings', '2026-03-15 12:32:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(293, '15/03/2026 12:32:21-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:32:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(294, '15/03/2026 12:32:35-http://localhost/armc/index.php/admin/create/settings-GET--admin/create/settings', '2026-03-15 12:32:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(295, '15/03/2026 12:33:10-http://localhost/armc/index.php/admin/create/settings-POST--admin/create/settings', '2026-03-15 12:33:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(296, '15/03/2026 12:33:10-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:33:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(297, '15/03/2026 12:33:29-http://localhost/armc/index.php-GET--', '2026-03-15 12:33:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(298, '15/03/2026 12:34:18-http://localhost/armc/index.php-GET--', '2026-03-15 12:34:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(299, '15/03/2026 12:34:26-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-15 12:34:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(300, '15/03/2026 12:38:00-http://localhost/armc/index.php-GET--', '2026-03-15 12:38:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(301, '15/03/2026 12:39:44-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:39:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(302, '15/03/2026 12:40:48-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:40:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(303, '15/03/2026 12:41:00-http://localhost/armc/index.php/admin/create/users-GET--admin/create/users', '2026-03-15 12:41:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(304, '15/03/2026 12:41:52-http://localhost/armc/index.php/admin/create/users-POST--admin/create/users', '2026-03-15 12:41:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(305, '15/03/2026 12:41:53-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:41:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(306, '15/03/2026 12:42:05-http://localhost/armc/index.php/admin/logout-GET--admin/logout', '2026-03-15 12:42:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(307, '15/03/2026 12:42:05-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:42:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(308, '15/03/2026 12:42:13-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:42:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(309, '15/03/2026 12:42:13-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:42:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(310, '15/03/2026 12:42:26-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:42:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(311, '15/03/2026 12:42:55-http://localhost/armc/index.php/admin/toggle/users/7-GET--admin/toggle/users/7', '2026-03-15 12:42:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(312, '15/03/2026 12:42:55-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:42:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(313, '15/03/2026 12:43:07-http://localhost/armc/index.php/admin/logout-GET--admin/logout', '2026-03-15 12:43:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(314, '15/03/2026 12:43:07-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:43:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(315, '15/03/2026 12:43:09-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:43:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(316, '15/03/2026 12:43:09-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:43:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(317, '15/03/2026 12:43:19-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:43:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(318, '15/03/2026 12:43:19-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:43:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(319, '15/03/2026 12:43:31-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:43:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(320, '15/03/2026 12:43:31-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 12:43:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(321, '15/03/2026 12:44:30-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 12:44:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(322, '15/03/2026 12:44:30-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:44:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(323, '15/03/2026 12:44:34-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:44:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(324, '15/03/2026 12:45:02-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:45:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(325, '15/03/2026 12:45:17-http://localhost/armc/index.php/admin/create/users-GET--admin/create/users', '2026-03-15 12:45:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(326, '15/03/2026 12:45:41-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 12:45:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(327, '15/03/2026 12:45:46-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 12:45:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(328, '15/03/2026 12:46:20-http://localhost/armc/index.php/admin/create/articles-POST--admin/create/articles', '2026-03-15 12:46:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(329, '15/03/2026 12:46:30-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 12:46:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(330, '15/03/2026 12:48:07-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 12:48:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(331, '15/03/2026 12:48:19-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 12:48:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(332, '15/03/2026 12:48:23-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 12:48:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(333, '15/03/2026 12:48:44-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 12:48:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(334, '15/03/2026 12:48:46-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 12:48:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(335, '15/03/2026 12:48:48-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 12:48:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(336, '15/03/2026 12:48:51-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-15 12:48:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(337, '15/03/2026 12:48:53-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-15 12:48:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(338, '15/03/2026 12:48:54-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-15 12:48:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(339, '15/03/2026 12:49:08-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 12:49:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(340, '15/03/2026 12:49:09-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 12:49:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(341, '15/03/2026 12:49:31-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 12:49:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(342, '15/03/2026 12:50:52-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 12:50:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(343, '15/03/2026 12:50:56-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 12:50:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(344, '15/03/2026 13:11:07-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 13:11:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(345, '15/03/2026 13:11:11-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 13:11:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(346, '15/03/2026 13:11:13-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-15 13:11:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(347, '15/03/2026 13:11:15-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 13:11:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(348, '15/03/2026 13:11:34-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-15 13:11:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(349, '15/03/2026 13:13:38-http://localhost/armc/index.php/admin/create/articles-POST--admin/create/articles', '2026-03-15 13:13:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(350, '15/03/2026 13:13:38-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 13:13:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(351, '15/03/2026 13:13:59-http://localhost/armc/index.php/admin/edit/articles/5-GET--admin/edit/articles/5', '2026-03-15 13:13:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(352, '15/03/2026 13:14:17-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 13:14:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(353, '15/03/2026 13:15:23-http://localhost/armc/index.php/documents-GET--documents', '2026-03-15 13:15:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(354, '15/03/2026 13:15:29-http://localhost/armc/index.php/documents/REPORT-GET--documents/REPORT', '2026-03-15 13:15:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(355, '15/03/2026 13:16:07-http://localhost/armc/index.php/categorie/decrets-GET--categorie/decrets', '2026-03-15 13:16:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(356, '15/03/2026 13:16:13-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:16:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(357, '15/03/2026 13:16:19-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:16:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(358, '15/03/2026 13:16:36-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:16:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(359, '15/03/2026 13:16:42-http://localhost/armc/index.php/admin/edit/menus/12-GET--admin/edit/menus/12', '2026-03-15 13:16:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(360, '15/03/2026 13:16:55-http://localhost/armc/index.php/admin/edit/menus/12-POST--admin/edit/menus/12', '2026-03-15 13:16:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(361, '15/03/2026 13:16:55-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:16:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(362, '15/03/2026 13:17:00-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:17:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(363, '15/03/2026 13:17:11-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:17:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(364, '15/03/2026 13:17:52-http://localhost/armc/index.php/admin/edit/menus/12-GET--admin/edit/menus/12', '2026-03-15 13:17:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(365, '15/03/2026 13:18:01-http://localhost/armc/index.php/admin/edit/menus/12-POST--admin/edit/menus/12', '2026-03-15 13:18:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(366, '15/03/2026 13:18:01-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:18:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(367, '15/03/2026 13:18:11-http://localhost/armc/index.php/admin/edit/menus/12-GET--admin/edit/menus/12', '2026-03-15 13:18:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(368, '15/03/2026 13:18:52-http://localhost/armc/index.php/admin/edit/menus/12-POST--admin/edit/menus/12', '2026-03-15 13:18:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(369, '15/03/2026 13:18:52-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:18:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(370, '15/03/2026 13:19:07-http://localhost/armc/index.php/admin/logout-GET--admin/logout', '2026-03-15 13:19:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(371, '15/03/2026 13:19:07-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-15 13:19:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(372, '15/03/2026 13:19:10-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-15 13:19:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(373, '15/03/2026 13:19:10-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 13:19:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(374, '15/03/2026 13:19:15-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:19:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(375, '15/03/2026 13:19:20-http://localhost/armc/index.php/admin/edit/menus/12-GET--admin/edit/menus/12', '2026-03-15 13:19:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(376, '15/03/2026 13:20:26-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-15 13:20:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(377, '15/03/2026 13:20:36-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:20:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(378, '15/03/2026 13:24:45-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:24:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(379, '15/03/2026 13:25:44-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:25:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(380, '15/03/2026 13:25:50-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 13:25:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(381, '15/03/2026 13:25:54-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 13:25:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(382, '15/03/2026 13:25:58-http://localhost/armc/index.php/categorie/decrets-GET--categorie/decrets', '2026-03-15 13:25:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(383, '15/03/2026 13:26:02-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:26:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(384, '15/03/2026 13:26:11-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 13:26:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(385, '15/03/2026 13:32:57-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 13:32:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(386, '15/03/2026 13:33:09-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 13:33:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(387, '15/03/2026 13:33:18-http://localhost/armc/index.php/admin/edit/categories/12-GET--admin/edit/categories/12', '2026-03-15 13:33:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(388, '15/03/2026 13:33:36-http://localhost/armc/index.php/admin/edit/categories/12-POST--admin/edit/categories/12', '2026-03-15 13:33:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(389, '15/03/2026 13:33:37-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 13:33:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(390, '15/03/2026 13:33:41-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 13:33:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(391, '15/03/2026 13:33:44-http://localhost/armc/index.php/categorie/documents-GET--categorie/documents', '2026-03-15 13:33:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(392, '15/03/2026 13:34:06-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:34:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(393, '15/03/2026 13:34:44-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-15 13:34:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(394, '15/03/2026 13:34:56-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-15 13:34:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(395, '15/03/2026 13:35:20-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-15 13:35:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(396, '15/03/2026 13:35:52-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-15 13:35:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(397, '15/03/2026 13:35:54-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:35:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(398, '15/03/2026 13:35:55-http://localhost/armc/index.php/categorie/rapports-GET--categorie/rapports', '2026-03-15 13:35:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(399, '15/03/2026 13:35:57-http://localhost/armc/index.php/categorie/documents-GET--categorie/documents', '2026-03-15 13:35:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(400, '15/03/2026 13:35:59-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-15 13:35:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(401, '15/03/2026 13:36:05-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-15 13:36:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(402, '15/03/2026 13:36:07-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 13:36:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(403, '15/03/2026 13:37:21-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 13:37:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(404, '15/03/2026 13:37:38-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 13:37:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(405, '15/03/2026 13:37:57-http://localhost/armc/index.php/admin/edit/quick_links/1-GET--admin/edit/quick_links/1', '2026-03-15 13:37:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(406, '15/03/2026 13:38:08-http://localhost/armc/index.php/admin/edit/quick_links/1-POST--admin/edit/quick_links/1', '2026-03-15 13:38:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(407, '15/03/2026 13:38:21-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 13:38:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(408, '15/03/2026 13:38:53-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 13:38:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(409, '15/03/2026 13:39:40-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 13:39:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(410, '15/03/2026 13:39:49-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 13:39:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(411, '15/03/2026 13:40:10-http://localhost/armc/index.php/admin/edit/sliders/3-POST--admin/edit/sliders/3', '2026-03-15 13:40:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(412, '15/03/2026 13:40:15-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:40:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(413, '15/03/2026 13:40:21-http://localhost/armc/index.php-GET--', '2026-03-15 13:40:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(414, '15/03/2026 13:56:44-http://localhost/armc/index.php-GET--', '2026-03-15 13:56:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(415, '15/03/2026 13:57:47-http://localhost/armc/index.php-GET--', '2026-03-15 13:57:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(416, '15/03/2026 13:57:52-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-15 13:57:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(417, '15/03/2026 13:58:11-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-15 13:58:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(418, '15/03/2026 13:58:22-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 13:58:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(419, '15/03/2026 14:00:21-http://localhost/armc/index.php-GET--', '2026-03-15 14:00:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(420, '15/03/2026 14:00:47-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 14:00:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(421, '15/03/2026 14:01:00-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:01:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(422, '15/03/2026 14:01:12-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 14:01:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(423, '15/03/2026 14:01:39-http://localhost/armc/index.php/admin/edit/sliders/3-POST--admin/edit/sliders/3', '2026-03-15 14:01:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(424, '15/03/2026 14:01:46-http://localhost/armc/index.php-GET--', '2026-03-15 14:01:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(425, '15/03/2026 14:02:28-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:02:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(426, '15/03/2026 14:02:54-http://localhost/armc/index.php/admin/create/sliders-GET--admin/create/sliders', '2026-03-15 14:02:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(427, '15/03/2026 14:03:51-http://localhost/armc/index.php/admin/create/sliders-POST--admin/create/sliders', '2026-03-15 14:03:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(428, '15/03/2026 14:03:56-http://localhost/armc/index.php-GET--', '2026-03-15 14:03:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(429, '15/03/2026 14:04:20-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:04:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(430, '15/03/2026 14:04:29-http://localhost/armc/index.php/admin/create/sliders-GET--admin/create/sliders', '2026-03-15 14:04:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(431, '15/03/2026 14:05:14-http://localhost/armc/index.php/admin/create/sliders-POST--admin/create/sliders', '2026-03-15 14:05:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(432, '15/03/2026 14:05:39-http://localhost/armc/index.php/admin/create/sliders-POST--admin/create/sliders', '2026-03-15 14:05:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(433, '15/03/2026 14:05:49-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:05:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(434, '15/03/2026 14:06:04-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 14:06:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(435, '15/03/2026 14:06:15-http://localhost/armc/index.php/admin/edit/quick_links/1-GET--admin/edit/quick_links/1', '2026-03-15 14:06:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(436, '15/03/2026 14:06:22-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:06:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(437, '15/03/2026 14:06:37-http://localhost/armc/index.php/admin/edit/quick_links/1-POST--admin/edit/quick_links/1', '2026-03-15 14:06:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(438, '15/03/2026 14:06:48-http://localhost/armc/index.php/admin/edit/quick_links/1-POST--admin/edit/quick_links/1', '2026-03-15 14:06:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(439, '15/03/2026 14:06:52-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:06:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(440, '15/03/2026 14:06:55-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 14:06:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(441, '15/03/2026 14:15:37-http://localhost/armc/index.php-GET--', '2026-03-15 14:15:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(442, '15/03/2026 14:15:49-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 14:15:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(443, '15/03/2026 14:15:51-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-15 14:15:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(444, '15/03/2026 14:15:54-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-15 14:15:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(445, '15/03/2026 14:15:55-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-15 14:15:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(446, '15/03/2026 14:15:57-http://localhost/armc/index.php/admin-GET--admin', '2026-03-15 14:15:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(447, '15/03/2026 14:16:02-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:16:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(448, '15/03/2026 14:16:07-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 14:16:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(449, '15/03/2026 14:16:28-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 14:16:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(450, '15/03/2026 14:20:34-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 14:20:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(451, '15/03/2026 14:20:51-http://localhost/armc/index.php/admin/edit/sliders/3-POST--admin/edit/sliders/3', '2026-03-15 14:20:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(452, '15/03/2026 14:27:20-http://localhost/armc/index.php/admin/edit/sliders/3-GET--admin/edit/sliders/3', '2026-03-15 14:27:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(453, '15/03/2026 14:27:53-http://localhost/armc/index.php/admin/edit/sliders/3-POST--admin/edit/sliders/3', '2026-03-15 14:27:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(454, '15/03/2026 14:27:53-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-15 14:27:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(455, '15/03/2026 14:28:06-http://localhost/armc/index.php-GET--', '2026-03-15 14:28:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(456, '15/03/2026 14:28:39-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:28:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(457, '15/03/2026 14:28:51-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:28:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(458, '15/03/2026 14:29:06-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-15 14:29:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(459, '15/03/2026 14:29:39-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 14:29:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(460, '15/03/2026 14:29:52-http://localhost/armc/index.php/admin/edit/quick_links/1-GET--admin/edit/quick_links/1', '2026-03-15 14:29:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(461, '15/03/2026 14:30:07-http://localhost/armc/index.php/admin/edit/quick_links/1-POST--admin/edit/quick_links/1', '2026-03-15 14:30:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(462, '15/03/2026 14:30:07-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-15 14:30:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(463, '15/03/2026 14:30:17-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:30:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(464, '15/03/2026 14:30:22-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:30:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(465, '15/03/2026 14:30:27-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-15 14:30:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(466, '15/03/2026 14:30:30-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-15 14:30:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(467, '16/03/2026 07:33:15-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 07:33:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(468, '16/03/2026 11:12:45-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:12:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(469, '16/03/2026 11:12:46-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-16 11:12:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(470, '16/03/2026 11:12:50-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-16 11:12:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(471, '16/03/2026 11:12:50-http://localhost/armc/index.php/admin-GET--admin', '2026-03-16 11:12:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(472, '16/03/2026 11:12:56-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 11:12:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(473, '16/03/2026 11:13:00-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 11:13:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(474, '16/03/2026 11:13:02-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 11:13:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(475, '16/03/2026 11:13:04-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 11:13:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(476, '16/03/2026 11:13:09-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 11:13:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(477, '16/03/2026 11:13:10-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 11:13:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(478, '16/03/2026 11:13:15-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:13:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(479, '16/03/2026 11:13:19-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 11:13:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(480, '16/03/2026 11:13:20-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 11:13:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(481, '16/03/2026 11:13:28-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 11:13:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(482, '16/03/2026 11:14:14-http://localhost/armc/index.php-GET--', '2026-03-16 11:14:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(483, '16/03/2026 11:14:32-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 11:14:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(484, '16/03/2026 11:14:43-http://localhost/armc/index.php/admin/edit/settings/3-GET--admin/edit/settings/3', '2026-03-16 11:14:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(485, '16/03/2026 11:15:01-http://localhost/armc/index.php/admin/edit/settings/3-POST--admin/edit/settings/3', '2026-03-16 11:15:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(486, '16/03/2026 11:15:01-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 11:15:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(487, '16/03/2026 11:15:10-http://localhost/armc/index.php-GET--', '2026-03-16 11:15:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(488, '16/03/2026 11:15:27-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 11:15:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(489, '16/03/2026 11:15:40-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:15:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(490, '16/03/2026 11:15:44-http://localhost/armc/index.php/admin/create/quick_links-GET--admin/create/quick_links', '2026-03-16 11:15:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(491, '16/03/2026 11:16:49-http://localhost/armc/index.php/admin/create/quick_links-POST--admin/create/quick_links', '2026-03-16 11:16:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(492, '16/03/2026 11:16:49-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:16:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(493, '16/03/2026 11:16:56-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 11:16:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(494, '16/03/2026 11:17:37-http://localhost/armc/index.php/admin/delete/quick_links/8-GET--admin/delete/quick_links/8', '2026-03-16 11:17:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(495, '16/03/2026 11:17:37-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:17:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(496, '16/03/2026 11:17:43-http://localhost/armc/index.php/admin/detail/quick_links/6-GET--admin/detail/quick_links/6', '2026-03-16 11:17:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(497, '16/03/2026 11:17:48-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:17:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(498, '16/03/2026 11:17:54-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 11:17:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(499, '16/03/2026 11:18:10-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 11:18:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(500, '16/03/2026 11:18:12-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 11:18:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(501, '16/03/2026 11:18:19-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 11:18:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(502, '16/03/2026 11:18:57-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 11:18:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(503, '16/03/2026 11:19:52-http://localhost/armc/index.php/plaintes/envoyer-POST--plaintes/envoyer', '2026-03-16 11:19:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(504, '16/03/2026 11:19:52-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 11:19:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(505, '16/03/2026 11:20:03-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-16 11:20:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(506, '16/03/2026 11:20:21-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 11:20:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(507, '16/03/2026 11:21:17-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 11:21:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(508, '16/03/2026 11:21:17-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 11:21:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(509, '16/03/2026 11:21:40-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 11:21:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(510, '16/03/2026 11:21:44-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 11:21:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(511, '16/03/2026 11:21:46-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 11:21:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(512, '16/03/2026 11:21:50-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 11:21:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(513, '16/03/2026 11:21:52-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 11:21:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(514, '16/03/2026 11:21:54-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 11:21:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(515, '16/03/2026 11:21:56-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 11:21:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(516, '16/03/2026 12:17:44-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 12:17:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(517, '16/03/2026 12:17:51-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 12:17:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(518, '16/03/2026 18:41:52-http://localhost/armc/index.php-GET--', '2026-03-16 18:41:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(519, '16/03/2026 18:42:35-http://localhost/armc/index.php-GET--', '2026-03-16 18:42:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(520, '16/03/2026 18:43:31-http://localhost/armc/index.php/administration/Users-GET--administration/Users', '2026-03-16 18:43:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(521, '16/03/2026 18:43:39-http://localhost/armc/index.php-GET--', '2026-03-16 18:43:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(522, '16/03/2026 18:43:44-http://localhost/armc/index.php/cms_admin/Admin/index-GET--cms_admin/Admin/index', '2026-03-16 18:43:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(523, '16/03/2026 18:43:44-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-16 18:43:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(524, '16/03/2026 18:43:47-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-16 18:43:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(525, '16/03/2026 18:43:47-http://localhost/armc/index.php/admin-GET--admin', '2026-03-16 18:43:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(526, '16/03/2026 18:43:53-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 18:43:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(527, '16/03/2026 18:44:43-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 18:44:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(528, '16/03/2026 18:44:48-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 18:44:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0');
INSERT INTO `logs` (`id`, `logs`, `date_time`, `username`, `user_id`, `ip_adresse`, `operating_system`, `browser_used`) VALUES
(529, '16/03/2026 18:44:54-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 18:44:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(530, '16/03/2026 18:44:58-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 18:44:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(531, '16/03/2026 18:45:09-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 18:45:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(532, '16/03/2026 18:45:24-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 18:45:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(533, '16/03/2026 18:45:30-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 18:45:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(534, '16/03/2026 18:45:38-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 18:45:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(535, '16/03/2026 18:45:44-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 18:45:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(536, '16/03/2026 18:45:49-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-16 18:45:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(537, '16/03/2026 18:46:05-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-16 18:46:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(538, '16/03/2026 18:46:08-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 18:46:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(539, '16/03/2026 18:46:13-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 18:46:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(540, '16/03/2026 18:46:22-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-16 18:46:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(541, '16/03/2026 18:49:34-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 18:49:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(542, '16/03/2026 18:52:13-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 18:52:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(543, '16/03/2026 18:55:27-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 18:55:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(544, '16/03/2026 18:56:21-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 18:56:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(545, '16/03/2026 18:58:26-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 18:58:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(546, '16/03/2026 18:59:02-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 18:59:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(547, '16/03/2026 18:59:07-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 18:59:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(548, '16/03/2026 18:59:15-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 18:59:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(549, '16/03/2026 18:59:20-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 18:59:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(550, '16/03/2026 18:59:27-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 18:59:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(551, '16/03/2026 18:59:33-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 18:59:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(552, '16/03/2026 18:59:42-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 18:59:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(553, '16/03/2026 19:00:25-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 19:00:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(554, '16/03/2026 19:00:33-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 19:00:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(555, '16/03/2026 19:00:44-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 19:00:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(556, '16/03/2026 19:01:28-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 19:01:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(557, '16/03/2026 19:02:55-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 19:02:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(558, '16/03/2026 19:04:20-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 19:04:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(559, '16/03/2026 19:05:09-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-16 19:05:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(560, '16/03/2026 19:05:17-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-16 19:05:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(561, '16/03/2026 19:05:25-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-16 19:05:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(562, '16/03/2026 19:07:16-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-16 19:07:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(563, '16/03/2026 19:47:01-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-16 19:47:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(564, '16/03/2026 19:47:09-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-16 19:47:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(565, '16/03/2026 19:56:55-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-16 19:56:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(566, '16/03/2026 19:57:05-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 19:57:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(567, '16/03/2026 19:57:29-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 19:57:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(568, '16/03/2026 19:57:35-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 19:57:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(569, '16/03/2026 19:58:05-http://localhost/armc/index.php/admin/detail/users/7-GET--admin/detail/users/7', '2026-03-16 19:58:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(570, '16/03/2026 19:58:10-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 19:58:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(571, '16/03/2026 19:58:13-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 19:58:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(572, '16/03/2026 19:58:31-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 19:58:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(573, '16/03/2026 19:58:59-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 19:58:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(574, '16/03/2026 19:59:36-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 19:59:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(575, '16/03/2026 19:59:57-http://localhost/armc/index.php/admin/edit/sliders/2-GET--admin/edit/sliders/2', '2026-03-16 19:59:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(576, '16/03/2026 20:00:15-http://localhost/armc/index.php/admin/edit/sliders/2-POST--admin/edit/sliders/2', '2026-03-16 20:00:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(577, '16/03/2026 20:00:15-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 20:00:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(578, '16/03/2026 20:00:44-http://localhost/armc/index.php-GET--', '2026-03-16 20:00:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(579, '16/03/2026 20:01:17-http://localhost/armc/index.php/admin/edit/sliders/1-GET--admin/edit/sliders/1', '2026-03-16 20:01:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(580, '16/03/2026 20:01:36-http://localhost/armc/index.php/admin/edit/sliders/1-POST--admin/edit/sliders/1', '2026-03-16 20:01:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(581, '16/03/2026 20:01:36-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 20:01:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(582, '16/03/2026 20:01:46-http://localhost/armc/index.php-GET--', '2026-03-16 20:01:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(583, '16/03/2026 20:03:25-http://localhost/armc/index.php/admin/create/sliders-GET--admin/create/sliders', '2026-03-16 20:03:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(584, '16/03/2026 20:04:46-http://localhost/armc/index.php/admin/create/sliders-POST--admin/create/sliders', '2026-03-16 20:04:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(585, '16/03/2026 20:04:46-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 20:04:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(586, '16/03/2026 20:04:56-http://localhost/armc/index.php-GET--', '2026-03-16 20:04:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(587, '16/03/2026 20:05:17-http://localhost/armc/index.php-GET--', '2026-03-16 20:05:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(588, '16/03/2026 20:06:36-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 20:06:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(589, '16/03/2026 20:06:46-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 20:06:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(590, '16/03/2026 20:07:15-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 20:07:15', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(591, '16/03/2026 20:07:41-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 20:07:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(592, '16/03/2026 20:08:28-http://localhost/armc/index.php/admin/list/complaints-GET--admin/list/complaints', '2026-03-16 20:08:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(593, '16/03/2026 20:08:32-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 20:08:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(594, '16/03/2026 20:08:34-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 20:08:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(595, '16/03/2026 20:08:36-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 20:08:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(596, '16/03/2026 20:08:38-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 20:08:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(597, '16/03/2026 20:08:42-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 20:08:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(598, '16/03/2026 20:08:45-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 20:08:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(599, '16/03/2026 20:08:47-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 20:08:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(600, '16/03/2026 20:33:16-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 20:33:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(601, '16/03/2026 20:33:18-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 20:33:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(602, '16/03/2026 20:33:21-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 20:33:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(603, '16/03/2026 20:33:23-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 20:33:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(604, '16/03/2026 20:33:25-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 20:33:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(605, '16/03/2026 20:33:27-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 20:33:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(606, '16/03/2026 20:36:09-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 20:36:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(607, '16/03/2026 20:49:47-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 20:49:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(608, '16/03/2026 20:49:55-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 20:49:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(609, '16/03/2026 20:50:20-http://localhost/armc/index.php-GET--', '2026-03-16 20:50:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(610, '16/03/2026 20:51:19-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 20:51:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(611, '16/03/2026 20:51:28-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-16 20:51:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(612, '16/03/2026 20:51:37-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 20:51:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(613, '16/03/2026 20:56:36-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 20:56:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(614, '16/03/2026 20:58:43-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 20:58:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(615, '16/03/2026 20:58:55-http://localhost/armc/index.php-GET--', '2026-03-16 20:58:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(616, '16/03/2026 21:08:38-http://localhost/armc/index.php-GET--', '2026-03-16 21:08:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(617, '16/03/2026 21:09:12-http://localhost/armc/index.php-GET--', '2026-03-16 21:09:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(618, '16/03/2026 21:11:18-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 21:11:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(619, '16/03/2026 21:11:23-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 21:11:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(620, '16/03/2026 21:11:28-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-16 21:11:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(621, '16/03/2026 21:33:43-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-16 21:33:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(622, '16/03/2026 21:34:01-http://localhost/armc/index.php-GET--', '2026-03-16 21:34:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(623, '16/03/2026 21:35:19-http://localhost/armc/index.php/documents-GET--documents', '2026-03-16 21:35:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(624, '16/03/2026 21:35:44-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 21:35:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(625, '16/03/2026 21:36:08-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 21:36:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(626, '16/03/2026 21:36:10-http://localhost/armc/index.php/contact-GET--contact', '2026-03-16 21:36:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(627, '16/03/2026 21:36:12-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 21:36:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(628, '16/03/2026 21:36:28-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-16 21:36:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(629, '16/03/2026 21:36:45-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 21:36:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(630, '16/03/2026 21:37:06-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 21:37:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(631, '16/03/2026 21:37:16-http://localhost/armc/index.php-GET--', '2026-03-16 21:37:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(632, '16/03/2026 21:37:24-http://localhost/armc/index.php-GET--', '2026-03-16 21:37:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(633, '16/03/2026 21:41:35-http://localhost/armc/index.php-GET--', '2026-03-16 21:41:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(634, '16/03/2026 21:41:47-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 21:41:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(635, '16/03/2026 21:47:10-http://localhost/armc/index.php-GET--', '2026-03-16 21:47:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(636, '16/03/2026 22:06:22-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 22:06:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(637, '16/03/2026 22:06:28-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 22:06:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(638, '16/03/2026 22:06:30-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-16 22:06:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(639, '16/03/2026 22:10:59-http://localhost/armc/index.php-GET--', '2026-03-16 22:10:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(640, '16/03/2026 22:14:47-http://localhost/armc/index.php-GET--', '2026-03-16 22:14:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(641, '16/03/2026 22:15:16-http://localhost/armc/index.php-GET--', '2026-03-16 22:15:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(642, '16/03/2026 22:27:07-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-16 22:27:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(643, '16/03/2026 22:31:12-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 22:31:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(644, '16/03/2026 22:31:47-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-16 22:31:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(645, '16/03/2026 22:31:53-http://localhost/armc/index.php/admin-GET--admin', '2026-03-16 22:31:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(646, '16/03/2026 22:31:56-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 22:31:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(647, '16/03/2026 22:32:02-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 22:32:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(648, '16/03/2026 22:32:04-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 22:32:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(649, '16/03/2026 22:32:05-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-16 22:32:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(650, '16/03/2026 22:32:07-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 22:32:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(651, '16/03/2026 22:32:09-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-16 22:32:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(652, '16/03/2026 22:32:10-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 22:32:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(653, '16/03/2026 22:32:13-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 22:32:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(654, '16/03/2026 22:32:28-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 22:32:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(655, '16/03/2026 22:32:30-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-16 22:32:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(656, '16/03/2026 22:32:32-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 22:32:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(657, '16/03/2026 22:32:35-http://localhost/armc/index.php/admin-GET--admin', '2026-03-16 22:32:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(658, '16/03/2026 22:32:37-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 22:32:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(659, '16/03/2026 22:32:39-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-16 22:32:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(660, '16/03/2026 22:32:41-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 22:32:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(661, '16/03/2026 22:32:43-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 22:32:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(662, '16/03/2026 22:32:56-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 22:32:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(663, '16/03/2026 22:33:18-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 22:33:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(664, '16/03/2026 22:33:22-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 22:33:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(665, '16/03/2026 22:33:29-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-16 22:33:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(666, '16/03/2026 22:33:38-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 22:33:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(667, '16/03/2026 22:33:45-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 22:33:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(668, '16/03/2026 22:33:51-http://localhost/armc/index.php/admin/edit/settings/3-GET--admin/edit/settings/3', '2026-03-16 22:33:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(669, '16/03/2026 22:33:59-http://localhost/armc/index.php/admin/edit/settings/3-POST--admin/edit/settings/3', '2026-03-16 22:33:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(670, '16/03/2026 22:33:59-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-16 22:33:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(671, '16/03/2026 22:34:06-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-16 22:34:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(672, '16/03/2026 22:34:30-http://localhost/armc/index.php/admin/list/alerts-GET--admin/list/alerts', '2026-03-16 22:34:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(673, '16/03/2026 22:34:32-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-16 22:34:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(674, '16/03/2026 22:34:34-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-16 22:34:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(675, '16/03/2026 22:34:36-http://localhost/armc/index.php/admin-GET--admin', '2026-03-16 22:34:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(676, '16/03/2026 22:34:38-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-16 22:34:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(677, '16/03/2026 22:34:41-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-16 22:34:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(678, '16/03/2026 22:34:52-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-16 22:34:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(679, '17/03/2026 05:41:20-http://localhost/armc/index.php-GET--', '2026-03-17 05:41:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(680, '17/03/2026 05:42:54-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 05:42:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(681, '17/03/2026 05:43:16-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 05:43:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(682, '17/03/2026 05:43:24-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 05:43:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(683, '17/03/2026 05:43:46-http://localhost/armc/index.php-GET--', '2026-03-17 05:43:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(684, '17/03/2026 05:43:49-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 05:43:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(685, '17/03/2026 05:43:49-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 05:43:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(686, '17/03/2026 05:44:06-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-17 05:44:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(687, '17/03/2026 05:44:06-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 05:44:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(688, '17/03/2026 05:44:30-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-17 05:44:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(689, '17/03/2026 05:44:37-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-17 05:44:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(690, '17/03/2026 05:44:39-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 05:44:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(691, '17/03/2026 05:44:41-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-17 05:44:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(692, '17/03/2026 05:44:43-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-17 05:44:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(693, '17/03/2026 05:44:44-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-17 05:44:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(694, '17/03/2026 05:49:28-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-17 05:49:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(695, '17/03/2026 05:49:28-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 05:49:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(696, '17/03/2026 05:49:36-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 05:49:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(697, '17/03/2026 05:49:37-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 05:49:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(698, '17/03/2026 05:49:41-http://localhost/armc/index.php-GET--', '2026-03-17 05:49:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(699, '17/03/2026 05:58:54-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-17 05:58:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(700, '17/03/2026 05:59:02-http://localhost/armc/index.php-GET--', '2026-03-17 05:59:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(701, '17/03/2026 05:59:58-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 05:59:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(702, '17/03/2026 06:07:37-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 06:07:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(703, '17/03/2026 06:07:46-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 06:07:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(704, '17/03/2026 06:07:59-http://localhost/armc/index.php-GET--', '2026-03-17 06:07:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(705, '17/03/2026 06:13:00-http://localhost/armc/index.php-GET--', '2026-03-17 06:13:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(706, '17/03/2026 06:14:34-http://localhost/armc/index.php/documents-GET--documents', '2026-03-17 06:14:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(707, '17/03/2026 06:26:07-http://localhost/armc/index.php/documents-GET--documents', '2026-03-17 06:26:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(708, '17/03/2026 06:26:11-http://localhost/armc/index.php/documents-GET--documents', '2026-03-17 06:26:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(709, '17/03/2026 06:41:39-http://localhost/armc/index.php/documents-GET--documents', '2026-03-17 06:41:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(710, '17/03/2026 06:42:04-http://localhost/armc/index.php-GET--', '2026-03-17 06:42:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(711, '17/03/2026 06:48:06-http://localhost/armc/index.php-GET--', '2026-03-17 06:48:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(712, '17/03/2026 06:49:21-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 06:49:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(713, '17/03/2026 06:49:38-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 06:49:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(714, '17/03/2026 06:50:16-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 06:50:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(715, '17/03/2026 06:50:57-http://localhost/armc/index.php/contact/envoyer-POST--contact/envoyer', '2026-03-17 06:50:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(716, '17/03/2026 06:50:57-http://localhost/armc/index.php/contact-GET--contact', '2026-03-17 06:50:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(717, '17/03/2026 06:51:29-http://localhost/armc/index.php/contact-GET--contact', '2026-03-17 06:51:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(718, '17/03/2026 06:51:36-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 06:51:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(719, '17/03/2026 06:51:56-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 06:51:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(720, '17/03/2026 07:12:22-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-17 07:12:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(721, '17/03/2026 07:55:42-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-17 07:55:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(722, '17/03/2026 07:55:44-http://localhost/armc/index.php/admin/list/documents-GET--admin/list/documents', '2026-03-17 07:55:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(723, '17/03/2026 07:55:47-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-17 07:55:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(724, '17/03/2026 07:55:49-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-17 07:55:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(725, '17/03/2026 07:55:51-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-17 07:55:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(726, '17/03/2026 07:55:54-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 07:55:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(727, '17/03/2026 07:55:56-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-17 07:55:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(728, '17/03/2026 07:55:57-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-17 07:55:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(729, '17/03/2026 11:06:01-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-17 11:06:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(730, '17/03/2026 11:06:01-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 11:06:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(731, '17/03/2026 11:19:35-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-17 11:19:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(732, '17/03/2026 11:19:35-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 11:19:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(733, '17/03/2026 11:19:53-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 11:19:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(734, '17/03/2026 11:37:49-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 11:37:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(735, '17/03/2026 11:37:53-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 11:37:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(736, '17/03/2026 11:38:17-http://localhost/armc/index.php/admin/list/newsletters-GET--admin/list/newsletters', '2026-03-17 11:38:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(737, '17/03/2026 11:39:00-http://localhost/armc/index.php-GET--', '2026-03-17 11:39:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(738, '17/03/2026 11:39:10-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:39:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(739, '17/03/2026 11:39:57-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:39:57', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(740, '17/03/2026 11:40:07-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 11:40:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(741, '17/03/2026 11:40:37-http://localhost/armc/index.php/admin/edit/quick_links/6-GET--admin/edit/quick_links/6', '2026-03-17 11:40:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(742, '17/03/2026 11:40:50-http://localhost/armc/index.php/admin/edit/quick_links/6-POST--admin/edit/quick_links/6', '2026-03-17 11:40:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(743, '17/03/2026 11:40:51-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 11:40:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(744, '17/03/2026 11:41:00-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:41:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(745, '17/03/2026 11:41:04-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:41:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(746, '17/03/2026 11:41:14-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:41:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(747, '17/03/2026 11:43:45-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:43:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(748, '17/03/2026 11:44:01-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 11:44:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(749, '17/03/2026 11:44:04-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 11:44:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(750, '17/03/2026 11:44:09-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:44:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(751, '17/03/2026 11:44:16-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:44:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(752, '17/03/2026 11:44:17-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 11:44:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(753, '17/03/2026 11:44:34-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 11:44:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(754, '17/03/2026 11:44:49-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:44:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(755, '17/03/2026 11:44:58-http://localhost/armc/index.php/documents-GET--documents', '2026-03-17 11:44:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(756, '17/03/2026 11:45:11-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 11:45:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(757, '17/03/2026 11:45:35-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:45:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(758, '17/03/2026 11:45:38-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 11:45:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(759, '17/03/2026 11:45:53-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 11:45:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(760, '17/03/2026 11:47:29-http://localhost/armc/index.php/admin/edit/quick_links/4-GET--admin/edit/quick_links/4', '2026-03-17 11:47:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(761, '17/03/2026 11:47:43-http://localhost/armc/index.php/admin/edit/quick_links/4-POST--admin/edit/quick_links/4', '2026-03-17 11:47:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(762, '17/03/2026 11:47:43-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 11:47:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(763, '17/03/2026 11:48:29-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-17 11:48:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(764, '17/03/2026 11:48:31-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 11:48:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(765, '17/03/2026 11:48:44-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:48:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(766, '17/03/2026 11:49:07-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:49:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(767, '17/03/2026 11:51:48-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 11:51:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(768, '17/03/2026 11:51:56-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 11:51:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(769, '17/03/2026 11:52:07-http://localhost/armc/index.php/admin/list/contact_messages-GET--admin/list/contact_messages', '2026-03-17 11:52:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(770, '17/03/2026 11:52:21-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 11:52:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(771, '17/03/2026 11:52:24-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 11:52:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(772, '17/03/2026 11:52:58-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-17 11:52:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(773, '17/03/2026 11:54:08-http://localhost/armc/index.php/admin/list/settings-GET--admin/list/settings', '2026-03-17 11:54:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(774, '17/03/2026 11:54:18-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 11:54:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(775, '17/03/2026 11:56:36-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 11:56:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(776, '17/03/2026 11:56:38-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-17 11:56:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(777, '17/03/2026 12:01:12-http://localhost/armc/index.php/admin/create/articles-POST--admin/create/articles', '2026-03-17 12:01:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(778, '17/03/2026 12:01:13-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 12:01:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(779, '17/03/2026 12:01:20-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:01:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(780, '17/03/2026 12:01:37-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:01:37', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(781, '17/03/2026 12:01:44-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:01:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(782, '17/03/2026 12:01:53-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-17 12:01:53', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(783, '17/03/2026 12:02:04-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:02:04', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(784, '17/03/2026 12:02:54-http://localhost/armc/index.php/admin/edit/articles/6-GET--admin/edit/articles/6', '2026-03-17 12:02:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(785, '17/03/2026 12:04:41-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-17 12:04:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(786, '17/03/2026 12:05:43-http://localhost/armc/index.php-GET--', '2026-03-17 12:05:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(787, '17/03/2026 12:06:27-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 12:06:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(788, '17/03/2026 12:06:39-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:06:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(789, '17/03/2026 12:06:56-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 12:06:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(790, '17/03/2026 12:07:05-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-17 12:07:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(791, '17/03/2026 12:12:09-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:12:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(792, '17/03/2026 12:12:26-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:12:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(793, '17/03/2026 12:12:32-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-17 12:12:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0');
INSERT INTO `logs` (`id`, `logs`, `date_time`, `username`, `user_id`, `ip_adresse`, `operating_system`, `browser_used`) VALUES
(794, '17/03/2026 12:12:48-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:12:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(795, '17/03/2026 12:13:08-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 12:13:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(796, '17/03/2026 12:13:25-http://localhost/armc/index.php/admin/edit/articles/6-GET--admin/edit/articles/6', '2026-03-17 12:13:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(797, '17/03/2026 12:15:30-http://localhost/armc/index.php/categorie/articles-GET--categorie/articles', '2026-03-17 12:15:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(798, '17/03/2026 12:15:40-http://localhost/armc/index.php/categorie/event-GET--categorie/event', '2026-03-17 12:15:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(799, '17/03/2026 12:15:47-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:15:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(800, '17/03/2026 12:15:54-http://localhost/armc/index.php/actualites/event-GET--actualites/event', '2026-03-17 12:15:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(801, '17/03/2026 12:16:08-http://localhost/armc/index.php/actualites/articles-GET--actualites/articles', '2026-03-17 12:16:08', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(802, '17/03/2026 12:16:12-http://localhost/armc/index.php/actualites/article-GET--actualites/article', '2026-03-17 12:16:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(803, '17/03/2026 12:16:14-http://localhost/armc/index.php/actualites/articles-GET--actualites/articles', '2026-03-17 12:16:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(804, '17/03/2026 12:16:18-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:16:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(805, '17/03/2026 12:17:50-http://localhost/armc/index.php/categorie/article-GET--categorie/article', '2026-03-17 12:17:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(806, '17/03/2026 12:17:52-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:17:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(807, '17/03/2026 12:17:56-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:17:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(808, '17/03/2026 12:18:13-http://localhost/armc/index.php/actualites/visite-GET--actualites/visite', '2026-03-17 12:18:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(809, '17/03/2026 12:18:26-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 12:18:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(810, '17/03/2026 12:20:06-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 12:20:06', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(811, '17/03/2026 12:20:17-http://localhost/armc/index.php/actualites/visite-GET--actualites/visite', '2026-03-17 12:20:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(812, '17/03/2026 12:20:48-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 12:20:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(813, '17/03/2026 12:28:07-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-17 12:28:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(814, '17/03/2026 12:32:24-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-17 12:32:24', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(815, '17/03/2026 12:32:29-http://localhost/armc/index.php/categorie/documents-GET--categorie/documents', '2026-03-17 12:32:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(816, '17/03/2026 12:46:45-http://localhost/armc/index.php/admin/list/statistics_data-GET--admin/list/statistics_data', '2026-03-17 12:46:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(817, '17/03/2026 12:46:55-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 12:46:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(818, '17/03/2026 12:47:19-http://localhost/armc/index.php/admin/list/users-GET--admin/list/users', '2026-03-17 12:47:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(819, '17/03/2026 12:47:22-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 12:47:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(820, '17/03/2026 12:47:51-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 12:47:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(821, '17/03/2026 12:47:59-http://localhost/armc/index.php/admin/edit/articles/5-GET--admin/edit/articles/5', '2026-03-17 12:47:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(822, '17/03/2026 12:48:20-http://localhost/armc/index.php/admin/edit/articles/5-POST--admin/edit/articles/5', '2026-03-17 12:48:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(823, '17/03/2026 12:48:21-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 12:48:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(824, '17/03/2026 12:48:39-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:48:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(825, '17/03/2026 12:48:50-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:48:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(826, '17/03/2026 12:48:52-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 12:48:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(827, '17/03/2026 12:49:01-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:49:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(828, '17/03/2026 12:49:09-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 12:49:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(829, '17/03/2026 12:49:17-http://localhost/armc/index.php/actualites/lois-GET--actualites/lois', '2026-03-17 12:49:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(830, '17/03/2026 12:49:31-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:49:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(831, '17/03/2026 12:49:48-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 12:49:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(832, '17/03/2026 12:50:20-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:50:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(833, '17/03/2026 12:50:44-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 12:50:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(834, '17/03/2026 12:51:01-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 12:51:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(835, '17/03/2026 12:51:09-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 12:51:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(836, '17/03/2026 12:51:18-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 12:51:18', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(837, '17/03/2026 16:55:39-http://localhost/armc/index.php-GET--', '2026-03-17 16:55:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(838, '17/03/2026 16:55:42-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 16:55:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(839, '17/03/2026 16:55:46-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 16:55:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(840, '17/03/2026 16:56:19-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 16:56:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(841, '17/03/2026 16:56:19-http://localhost/armc/index.php/admin/login-GET--admin/login', '2026-03-17 16:56:19', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(842, '17/03/2026 16:56:22-http://localhost/armc/index.php/admin/login-POST--admin/login', '2026-03-17 16:56:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(843, '17/03/2026 16:56:22-http://localhost/armc/index.php/admin-GET--admin', '2026-03-17 16:56:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(844, '17/03/2026 16:56:46-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 16:56:46', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(845, '17/03/2026 16:56:54-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-17 16:56:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(846, '17/03/2026 16:57:05-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-17 16:57:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(847, '17/03/2026 16:57:36-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-17 16:57:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(848, '17/03/2026 16:58:03-http://localhost/armc/index.php/admin/edit/categories/5-GET--admin/edit/categories/5', '2026-03-17 16:58:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(849, '17/03/2026 17:00:03-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:00:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(850, '17/03/2026 17:00:11-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:00:11', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(851, '17/03/2026 17:00:22-http://localhost/armc/index.php/categorie/recherche-GET--categorie/recherche', '2026-03-17 17:00:22', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(852, '17/03/2026 17:00:34-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:00:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(853, '17/03/2026 17:00:44-http://localhost/armc/index.php/admin/edit/categories/5-GET--admin/edit/categories/5', '2026-03-17 17:00:44', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(854, '17/03/2026 17:01:16-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-17 17:01:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(855, '17/03/2026 17:01:21-http://localhost/armc/index.php/admin/create/categories-GET--admin/create/categories', '2026-03-17 17:01:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(856, '17/03/2026 17:01:58-http://localhost/armc/index.php/admin/list/sliders-GET--admin/list/sliders', '2026-03-17 17:01:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(857, '17/03/2026 17:02:09-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:02:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(858, '17/03/2026 17:02:14-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:02:14', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(859, '17/03/2026 17:02:27-http://localhost/armc/index.php/admin/edit/pages/2-GET--admin/edit/pages/2', '2026-03-17 17:02:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(860, '17/03/2026 17:03:25-http://localhost/armc/index.php/admin/edit/pages/2-POST--admin/edit/pages/2', '2026-03-17 17:03:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(861, '17/03/2026 17:03:25-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:03:25', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(862, '17/03/2026 17:03:40-http://localhost/armc/index.php/admin/edit/pages/1-GET--admin/edit/pages/1', '2026-03-17 17:03:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(863, '17/03/2026 17:04:09-http://localhost/armc/index.php/admin/edit/pages/1-POST--admin/edit/pages/1', '2026-03-17 17:04:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(864, '17/03/2026 17:04:09-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:04:09', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(865, '17/03/2026 17:04:27-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:04:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(866, '17/03/2026 17:04:43-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:04:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(867, '17/03/2026 17:04:54-http://localhost/armc/index.php/categorie/recherche-GET--categorie/recherche', '2026-03-17 17:04:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(868, '17/03/2026 17:04:59-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 17:04:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(869, '17/03/2026 17:05:17-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 17:05:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(870, '17/03/2026 17:05:29-http://localhost/armc/index.php/admin/create/articles-GET--admin/create/articles', '2026-03-17 17:05:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(871, '17/03/2026 17:06:31-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 17:06:31', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(872, '17/03/2026 17:06:47-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:06:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(873, '17/03/2026 17:07:05-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:07:05', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(874, '17/03/2026 17:07:13-http://localhost/armc/index.php/admin/edit/pages/2-GET--admin/edit/pages/2', '2026-03-17 17:07:13', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(875, '17/03/2026 17:09:39-http://localhost/armc/index.php/admin/edit/pages/2-POST--admin/edit/pages/2', '2026-03-17 17:09:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(876, '17/03/2026 17:09:39-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:09:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(877, '17/03/2026 17:09:50-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:09:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(878, '17/03/2026 17:10:38-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:10:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(879, '17/03/2026 17:10:41-http://localhost/armc/index.php/actualites/visite-GET--actualites/visite', '2026-03-17 17:10:41', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(880, '17/03/2026 17:10:50-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:10:50', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(881, '17/03/2026 17:11:01-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:11:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(882, '17/03/2026 17:11:17-http://localhost/armc/index.php/admin/edit/quick_links/2-GET--admin/edit/quick_links/2', '2026-03-17 17:11:17', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(883, '17/03/2026 17:11:26-http://localhost/armc/index.php/admin/edit/quick_links/2-POST--admin/edit/quick_links/2', '2026-03-17 17:11:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(884, '17/03/2026 17:11:26-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:11:26', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(885, '17/03/2026 17:11:30-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:11:30', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(886, '17/03/2026 17:11:33-http://localhost/armc/index.php/pages/leadership-GET--pages/leadership', '2026-03-17 17:11:33', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(887, '17/03/2026 17:11:36-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 17:11:36', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(888, '17/03/2026 17:11:40-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:11:40', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(889, '17/03/2026 17:11:42-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:11:42', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(890, '17/03/2026 17:11:43-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:11:43', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(891, '17/03/2026 17:11:45-http://localhost/armc/index.php/categorie/lois-GET--categorie/lois', '2026-03-17 17:11:45', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(892, '17/03/2026 17:11:47-http://localhost/armc/index.php/categorie/decrets-GET--categorie/decrets', '2026-03-17 17:11:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(893, '17/03/2026 17:11:49-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:11:49', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(894, '17/03/2026 17:11:52-http://localhost/armc/index.php/categorie/documents-GET--categorie/documents', '2026-03-17 17:11:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(895, '17/03/2026 17:11:54-http://localhost/armc/index.php/categorie/statistiques-GET--categorie/statistiques', '2026-03-17 17:11:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(896, '17/03/2026 17:11:55-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:11:55', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(897, '17/03/2026 17:11:56-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 17:11:56', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(898, '17/03/2026 17:11:58-http://localhost/armc/index.php/categorie/recherche-GET--categorie/recherche', '2026-03-17 17:11:58', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(899, '17/03/2026 17:11:59-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:11:59', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(900, '17/03/2026 17:12:07-http://localhost/armc/index.php/contact-GET--contact', '2026-03-17 17:12:07', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(901, '17/03/2026 17:12:12-http://localhost/armc/index.php/statistiques-GET--statistiques', '2026-03-17 17:12:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(902, '17/03/2026 17:12:20-http://localhost/armc/index.php/actualites-GET--actualites', '2026-03-17 17:12:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(903, '17/03/2026 17:12:47-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:12:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(904, '17/03/2026 17:13:02-http://localhost/armc/index.php/categorie/actualites-GET--categorie/actualites', '2026-03-17 17:13:02', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(905, '17/03/2026 17:13:10-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:13:10', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(906, '17/03/2026 17:13:16-http://localhost/armc/index.php/contact-GET--contact', '2026-03-17 17:13:16', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(907, '17/03/2026 17:13:27-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:13:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(908, '17/03/2026 17:13:29-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:13:29', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(909, '17/03/2026 17:13:32-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:13:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(910, '17/03/2026 17:14:01-http://localhost/armc/index.php/admin/list/categories-GET--admin/list/categories', '2026-03-17 17:14:01', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(911, '17/03/2026 17:14:23-http://localhost/armc/index.php/admin/list/pages-GET--admin/list/pages', '2026-03-17 17:14:23', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(912, '17/03/2026 17:14:34-http://localhost/armc/index.php/admin/list/menus-GET--admin/list/menus', '2026-03-17 17:14:34', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(913, '17/03/2026 17:15:12-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:15:12', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(914, '17/03/2026 17:16:21-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 17:16:21', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(915, '17/03/2026 17:16:51-http://localhost/armc/index.php/admin/edit/articles/2-GET--admin/edit/articles/2', '2026-03-17 17:16:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(916, '17/03/2026 17:17:27-http://localhost/armc/index.php/admin/edit/articles/2-POST--admin/edit/articles/2', '2026-03-17 17:17:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(917, '17/03/2026 17:17:27-http://localhost/armc/index.php/admin/list/articles-GET--admin/list/articles', '2026-03-17 17:17:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(918, '17/03/2026 17:17:32-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:17:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(919, '17/03/2026 17:17:35-http://localhost/armc/index.php/actualites/comprendrerolemarche-GET--actualites/comprendrerolemarche', '2026-03-17 17:17:35', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(920, '17/03/2026 17:17:47-http://localhost/armc/index.php/categorie/education-GET--categorie/education', '2026-03-17 17:17:47', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(921, '17/03/2026 17:17:48-http://localhost/armc/index.php/categorie/supervision-GET--categorie/supervision', '2026-03-17 17:17:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(922, '17/03/2026 17:17:51-http://localhost/armc/index.php/categorie/recherche-GET--categorie/recherche', '2026-03-17 17:17:51', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(923, '17/03/2026 17:17:52-http://localhost/armc/index.php/categorie/evenements-GET--categorie/evenements', '2026-03-17 17:17:52', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(924, '17/03/2026 17:17:54-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:17:54', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(925, '17/03/2026 17:18:00-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:18:00', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(926, '17/03/2026 17:18:03-http://localhost/armc/index.php/admin/create/quick_links-GET--admin/create/quick_links', '2026-03-17 17:18:03', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(927, '17/03/2026 17:18:38-http://localhost/armc/index.php/admin/create/quick_links-POST--admin/create/quick_links', '2026-03-17 17:18:38', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(928, '17/03/2026 17:18:39-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:18:39', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(929, '17/03/2026 17:18:48-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:18:48', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0'),
(930, '17/03/2026 17:19:20-http://localhost/armc/index.php/admin/edit/quick_links/9-GET--admin/edit/quick_links/9', '2026-03-17 17:19:20', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(931, '17/03/2026 17:19:27-http://localhost/armc/index.php/admin/edit/quick_links/9-POST--admin/edit/quick_links/9', '2026-03-17 17:19:27', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(932, '17/03/2026 17:19:28-http://localhost/armc/index.php/admin/list/quick_links-GET--admin/list/quick_links', '2026-03-17 17:19:28', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 145.0.0.0'),
(933, '17/03/2026 17:19:32-http://localhost/armc/index.php/plaintes-GET--plaintes', '2026-03-17 17:19:32', 'Anonymous', -1, '::1', 'Windows 10', 'Chrome version 146.0.0.0');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `utilisateur_id` bigint(20) UNSIGNED NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `nom_original` varchar(255) NOT NULL,
  `chemin_fichier` varchar(255) NOT NULL,
  `type_media` enum('image','video','audio','document','autre') NOT NULL DEFAULT 'image',
  `mime_type` varchar(100) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `taille` bigint(20) UNSIGNED DEFAULT NULL,
  `largeur` int(10) UNSIGNED DEFAULT NULL,
  `hauteur` int(10) UNSIGNED DEFAULT NULL,
  `duree` int(10) UNSIGNED DEFAULT NULL,
  `texte_alternatif` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `utilisateur_id`, `nom_fichier`, `nom_original`, `chemin_fichier`, `type_media`, `mime_type`, `extension`, `taille`, `largeur`, `hauteur`, `duree`, `texte_alternatif`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'cisi-tanzanie.jpg', 'cisi-tanzanie.jpg', '/uploads/media/cisi-tanzanie.jpg', 'image', 'image/jpeg', 'jpg', 350000, 1200, 800, NULL, 'Professionnels burundais en Tanzanie', 'Image illustrant une délégation de professionnels burundais.', '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 2, 'rapport-annuel-2025-cover.jpg', 'rapport-annuel-2025-cover.jpg', '/uploads/media/rapport-annuel-2025-cover.jpg', 'image', 'image/jpeg', 'jpg', 220000, 900, 1200, NULL, 'Couverture du rapport annuel 2025', 'Image de couverture du rapport annuel 2025.', '2026-03-13 17:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `libelle` varchar(150) NOT NULL,
  `type_cible` enum('page','categorie','article','document','url') NOT NULL DEFAULT 'url',
  `cible_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordre_affichage` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `nouvelle_fenetre` tinyint(1) NOT NULL DEFAULT 0,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `libelle`, `type_cible`, `cible_id`, `url`, `ordre_affichage`, `nouvelle_fenetre`, `actif`, `created_at`, `updated_at`) VALUES
(1, NULL, 'À propos', 'categorie', 1, NULL, 1, 0, 1, '2026-03-13 17:54:26', '2026-03-15 10:54:35'),
(2, NULL, 'Cadre légal', 'categorie', 2, NULL, 2, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(3, NULL, 'Actualités', 'categorie', 3, NULL, 3, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(4, NULL, 'Rapports', 'categorie', 4, NULL, 4, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(5, NULL, 'Éducation financière', 'categorie', 5, NULL, 5, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(6, NULL, 'Supervision', 'categorie', 6, NULL, 6, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(7, NULL, 'Recherche & Développement', 'categorie', 7, NULL, 7, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(8, NULL, 'Événements', 'categorie', 8, NULL, 8, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(9, 1, 'Leadership', 'page', 2, NULL, 1, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(10, 2, 'Lois', 'categorie', 10, NULL, 1, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(11, 2, 'Décrets', 'categorie', 11, NULL, 2, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(12, 4, 'Rapports annuels', 'categorie', 12, 'index.php/documents', 1, 0, 1, '2026-03-13 17:54:26', '2026-03-15 12:20:16'),
(13, 4, 'Statistiques', 'categorie', 13, NULL, 2, 0, 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `nom_complet` varchar(150) DEFAULT NULL,
  `statut` enum('actif','desabonne') NOT NULL DEFAULT 'actif',
  `date_abonnement` datetime NOT NULL DEFAULT current_timestamp(),
  `date_desabonnement` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `nom_complet`, `statut`, `date_abonnement`, `date_desabonnement`, `created_at`, `updated_at`) VALUES
(1, 'abonne1@example.com', 'Abonné Test 1', 'actif', '2026-03-13 18:54:26', NULL, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 'abonne2@example.com', 'Abonné Test 2', 'actif', '2026-03-13 18:54:26', NULL, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(3, 'alexis@mediabox.bi', NULL, 'actif', '2026-03-15 12:06:39', NULL, '2026-03-15 11:06:39', '2026-03-15 11:06:39');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auteur_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `resume` text DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `image_banniere` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `statut` enum('brouillon','en_revision','publie','archive') NOT NULL DEFAULT 'brouillon',
  `est_page_accueil` tinyint(1) NOT NULL DEFAULT 0,
  `date_publication` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `auteur_id`, `titre`, `slug`, `resume`, `contenu`, `image_banniere`, `meta_title`, `meta_description`, `statut`, `est_page_accueil`, `date_publication`, `created_at`, `updated_at`) VALUES
(1, 1, 'Présentation de l’ARMC', 'presentation-de-larmc', 'Présentation institutionnelle de l’Autorité de Régulation du Marché des Capitaux du Burundi.', 'Contenu de présentation institutionnelle de l’ARMC Burundi.', '/uploads/banners/presentation-armc.jpg', 'Présentation ARMC Burundi', 'Découvrez la mission, la vision et les attributions de l’ARMC Burundi.', 'publie', 0, '2026-03-13 18:54:00', '2026-03-13 17:54:26', '2026-03-17 16:04:09'),
(2, 1, 'Leadership', 'leadership', 'Présentation du leadership de l’institution.', 'L’ARMC repose sur un modèle de gouvernance fondé sur le leadership institutionnel, la responsabilité, la transparence et l’efficacité opérationnelle. Dans l’accomplissement de ses missions, le leadership de l’ARMC joue un rôle central dans l’orientation stratégique, la coordination des activités et la mobilisation des ressources nécessaires à l’atteinte des objectifs fixés.\r\n\r\nLe leadership de l’institution s’exerce à travers une vision claire, portée par les organes de direction et relayée par les responsables des différentes structures internes. Il vise à garantir une gestion cohérente, à renforcer la qualité du service public rendu et à promouvoir une culture de performance, d’intégrité et de redevabilité. Ce leadership institutionnel permet également d’assurer la stabilité des décisions, la bonne conduite des réformes et l’adaptation continue de l’institution aux exigences de son environnement.\r\n\r\nSur le plan organisationnel, l’ARMC est structurée de manière à favoriser une répartition claire des responsabilités et une bonne articulation entre les fonctions stratégiques, administratives, techniques et opérationnelles. Cette organisation permet d’assurer une coordination efficace entre les différents niveaux de décision et d’exécution, tout en facilitant le suivi, le contrôle et l’évaluation des activités.\r\n\r\nL’organisation de l’ARMC s’appuie généralement sur :\r\n\r\n1. un niveau de direction stratégique, chargé de définir les orientations générales et de veiller à leur mise en œuvre ;\r\n\r\n2. un niveau de coordination administrative et technique, responsable de la gestion quotidienne, de l’encadrement des équipes et de l’exécution des programmes ;\r\n\r\n3. des services ou départements spécialisés, chargés de conduire les missions spécifiques de l’institution selon leurs domaines de compétence ;\r\n\r\n4. des mécanismes de collaboration interne, permettant de renforcer la circulation de l’information, la synergie entre les services et la prise de décision concertée.\r\n\r\nCette structuration organisationnelle contribue à améliorer la performance globale de l’ARMC, à limiter les chevauchements de compétences et à renforcer l’efficacité dans l’exécution des missions institutionnelles. Elle favorise également la discipline organisationnelle, le respect de la hiérarchie, ainsi que la responsabilisation des acteurs à tous les niveaux.\r\n\r\nEn outre, le leadership au sein de l’ARMC ne se limite pas aux seuls organes dirigeants. Il s’exprime aussi à travers la capacité des responsables intermédiaires et des agents à porter les valeurs de l’institution, à faire preuve d’initiative, à travailler en équipe et à contribuer activement à l’amélioration continue des services. Ainsi, le leadership institutionnel et l’organisation administrative forment un ensemble complémentaire indispensable au bon fonctionnement de l’ARMC.\r\n\r\nDans cette perspective, l’ARMC veille à consolider un mode de gouvernance moderne, participatif et orienté vers les résultats, où chaque structure et chaque acteur joue un rôle précis dans la réalisation de la mission institutionnelle. Une telle organisation renforce la crédibilité de l’institution, améliore sa capacité d’intervention et soutient durablement la réalisation de ses objectifs stratégiques.', 'upload/cms/9ff898833c0b96169e2eb28ac90c9ac6.jpg', 'Leadership ARMC Burundi', 'Découvrez les responsables de l’ARMC Burundi.', 'publie', 0, '2026-03-13 18:54:00', '2026-03-13 17:54:26', '2026-03-17 16:09:39');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_permission` varchar(100) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `code_permission`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users.manage', 'Gérer les utilisateurs', 'Créer, modifier, suspendre et supprimer des utilisateurs', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(2, 'roles.manage', 'Gérer les rôles', 'Gérer les rôles et permissions', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(3, 'pages.manage', 'Gérer les pages', 'Créer, modifier, publier et archiver les pages', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(4, 'articles.manage', 'Gérer les articles', 'Créer, modifier, publier et archiver les articles', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(5, 'documents.manage', 'Gérer les documents', 'Créer, modifier, publier et archiver les documents', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(6, 'sliders.manage', 'Gérer les sliders', 'Gérer le carrousel de la page d’accueil', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(7, 'menus.manage', 'Gérer les menus', 'Gérer la navigation du site', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(8, 'quicklinks.manage', 'Gérer les accès rapides', 'Gérer les liens rapides', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(9, 'events.manage', 'Gérer les événements', 'Créer et gérer les événements', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(10, 'complaints.manage', 'Gérer les plaintes', 'Traiter les plaintes', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(11, 'alerts.manage', 'Gérer les alertes', 'Traiter les alertes', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(12, 'settings.manage', 'Gérer les paramètres', 'Modifier les paramètres du site', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(13, 'statistics.manage', 'Gérer les statistiques', 'Gérer les indicateurs', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(14, 'media.manage', 'Gérer les médias', 'Téléverser et organiser les médias', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(15, 'audit.view', 'Consulter les journaux', 'Lire les journaux d’audit', '2026-03-13 17:54:25', '2026-03-13 17:54:25');

-- --------------------------------------------------------

--
-- Structure de la table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `type_lien` enum('interne','externe') NOT NULL DEFAULT 'interne',
  `ordre_affichage` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quick_links`
--

INSERT INTO `quick_links` (`id`, `libelle`, `icone`, `description`, `url`, `type_lien`, `ordre_affichage`, `actif`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Événements', 'calendar', 'Accéder aux événements', 'categorie/evenements', 'interne', 1, 1, 2, '2026-03-13 17:54:26', '2026-03-15 13:30:07'),
(2, 'Leadership', 'users', 'Voir le leadership', 'pages/leadership', 'interne', 2, 1, 2, '2026-03-13 17:54:26', '2026-03-17 16:11:26'),
(3, 'Statistiques', 'bar-chart', 'Consulter les statistiques', '/statistiques', 'interne', 3, 1, 2, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(4, 'Nous alerter', 'mail', 'Envoyer un signalement', '/plaintes', 'interne', 4, 1, 2, '2026-03-13 17:54:26', '2026-03-17 10:47:43'),
(5, 'Déposer une plainte', 'edit', 'Soumettre une plainte', '/plaintes', 'interne', 5, 1, 2, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(6, 'Dernières publications', 'book', 'Voir les dernières publications', 'categorie/actualites', 'interne', 6, 1, 2, '2026-03-13 17:54:26', '2026-03-17 10:40:50'),
(9, 'MEDIABOX', 'edit', 'Site web', 'https://www.mediabox.bi/', 'externe', 1, 1, 7, '2026-03-17 16:18:39', '2026-03-17 16:19:27');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_role` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom_role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Administration complète du système', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(2, 'Admin Contenu', 'Gestion du contenu éditorial', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(3, 'Rédacteur', 'Rédaction et soumission des contenus', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(4, 'Validateur', 'Validation et publication des contenus', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(5, 'Gestionnaire Plaintes', 'Gestion des plaintes des usagers', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(6, 'Gestionnaire Événements', 'Gestion des événements et inscriptions', '2026-03-13 17:54:25', '2026-03-13 17:54:25');

-- --------------------------------------------------------

--
-- Structure de la table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`) VALUES
(1, 1, 11, '2026-03-13 17:54:25'),
(2, 1, 4, '2026-03-13 17:54:25'),
(3, 1, 15, '2026-03-13 17:54:25'),
(4, 1, 10, '2026-03-13 17:54:25'),
(5, 1, 5, '2026-03-13 17:54:25'),
(6, 1, 9, '2026-03-13 17:54:25'),
(7, 1, 14, '2026-03-13 17:54:25'),
(8, 1, 7, '2026-03-13 17:54:25'),
(9, 1, 3, '2026-03-13 17:54:25'),
(10, 1, 8, '2026-03-13 17:54:25'),
(11, 1, 2, '2026-03-13 17:54:25'),
(12, 1, 12, '2026-03-13 17:54:25'),
(13, 1, 6, '2026-03-13 17:54:25'),
(14, 1, 13, '2026-03-13 17:54:25'),
(15, 1, 1, '2026-03-13 17:54:25'),
(16, 2, 4, '2026-03-13 17:54:25'),
(17, 2, 5, '2026-03-13 17:54:25'),
(18, 2, 14, '2026-03-13 17:54:25'),
(19, 2, 7, '2026-03-13 17:54:25'),
(20, 2, 3, '2026-03-13 17:54:25'),
(21, 2, 8, '2026-03-13 17:54:25'),
(22, 2, 6, '2026-03-13 17:54:25'),
(23, 2, 13, '2026-03-13 17:54:25'),
(31, 3, 4, '2026-03-13 17:54:25'),
(32, 3, 5, '2026-03-13 17:54:25'),
(33, 3, 14, '2026-03-13 17:54:25'),
(34, 3, 3, '2026-03-13 17:54:25'),
(38, 4, 4, '2026-03-13 17:54:25'),
(39, 4, 5, '2026-03-13 17:54:25'),
(40, 4, 3, '2026-03-13 17:54:25'),
(41, 5, 11, '2026-03-13 17:54:25'),
(42, 5, 10, '2026-03-13 17:54:25'),
(44, 6, 9, '2026-03-13 17:54:25'),
(45, 6, 14, '2026-03-13 17:54:25');

-- --------------------------------------------------------

--
-- Structure de la table `search_logs`
--

CREATE TABLE `search_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mot_cle` varchar(255) NOT NULL,
  `nombre_resultats` int(11) NOT NULL DEFAULT 0,
  `adresse_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `session_table`
--

CREATE TABLE `session_table` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `session_table`
--

INSERT INTO `session_table` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0miolso22pglbiikj12mjuiust16hcc2', '::1', 1773689596, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638393539363b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('0pqakvb54cs20a4sur0osootrduok8gb', '::1', 1773723542, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732333534323b),
('0s0o26g7u00oru037dh6uknivp4qoos8', '::1', 1773683374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638333337343b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('1kiqshqrke1gopvsqc8osrmsch2te75h', '::1', 1773764041, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736343034313b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('1psa9jsju9q2jd303ajfgi30jc1nim3a', '::1', 1773693695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639333639353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('28d69klpeufp18rh0qtrhr0kacdjb8n4', '::1', 1773690996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639303939363b),
('2bq88mcre2bsmscmt4qnokh5fd9c5ofr', '::1', 1773691135, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639313133353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('2utonpb07hlf3ul869dmd4ffca119ttm', '::1', 1773744858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734343835383b),
('2vitjj79cq2gthut7qts3o12uso7ce9v', '::1', 1773745280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734353238303b),
('37b30ftavacgt5ehqijv5k6err7cllf6', '::1', 1773730541, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333733303534313b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('37l979vmmp5dhami5e9vbooiqvt16gll', '::1', 1773763329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736333332393b),
('399qel29s6gffqa2veo28thfjd3lkgii', '::1', 1773744708, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734343730383b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('3idkkkea9aoej33iageautlu047gm80h', '::1', 1773744241, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734343234313b),
('417d3hkld67r4refu6canlsojek7j71t', '::1', 1773748101, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734383030353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('4mq0dasbbm35taomtjdqsmnnmp9cki68', '::1', 1773746270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734363237303b),
('4rkb159jgl8l6r0p880e3bvmk0pjl845', '::1', 1773764372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736343235323b),
('4unjhfngbk6hoe3rr2bcsl64ksujqdls', '::1', 1773726099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732363039393b),
('5pb85tlm1b2b7i9bvtjehbcu9tpiu42c', '::1', 1773764252, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736343235323b),
('7o8m1m2noleivleqs7scmsth1c8v6vvr', '::1', 1773746887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734363838373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('7sbdte00kha4ik3bra8oh7ouulh1bo06', '::1', 1773744547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734343534373b),
('7shu1r369o0tvtp6coutpcf5nlfarapm', '::1', 1773691718, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639313731383b),
('87404rfbavm3m7v9ejb9d4eteru4dqce', '::1', 1773745929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734353932393b),
('8sf3sesvq3lsjhjicka8si3r4btv2p33', '::1', 1773744353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734343335333b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('9873mnjbrs8tpauo17bck7uhq6g2el3r', '::1', 1773743869, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734333836393b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('9ek84tpbav0sidbpksim0vjt9k5k8inm', '::1', 1773745272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734353237323b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('9fftjak6bp51hro6i7odpr6j5m3vaqig', '::1', 1773726486, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732363438363b),
('9th5v7ho89hbojv02jgpk3g3lb1ifb92', '::1', 1773763244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736333234343b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('ae8c6pf2bdoa4fuqsqe552cgaf4jq9dv', '::1', 1773747144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734373134343b),
('b2fv8291ito9sll04spg8shduopu5fc1', '::1', 1773694030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639343033303b),
('bdmt3g37v3il7f31vk15dq81u6bb022p', '::1', 1773696846, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639363830393b),
('be3hkrguh2918delgotipv52qj5ijus9', '::1', 1773687805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638373830353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('bsv0m6ju1jg7rau1etb1r0j5i3jvbvgp', '::1', 1773693223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639333232333b),
('cfd30ggsier04hbqbvnc4vio16cf1nei', '::1', 1773687644, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638373634343b),
('d2botcka9f572mote1pgji2ujdgsce1n', '::1', 1773696707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639363730373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('dub38idfoqgpu3mt3kn2eij8nem6g5qc', '::1', 1773726716, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732363438363b737563636573737c733a34333a22566f747265206d657373616765206120c3a974c3a920656e766f79c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('eikg65rbk7350b1745f1jht3nk1f7s2g', '::1', 1773748119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734383131393b),
('g69ojvbdpakckli7v8e9rc6qtodhd33j', '::1', 1773690595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639303539353b),
('ibqnmpt2htfava08ou34i25mpf3is8sb', '::1', 1773687996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638373939363b),
('if6pe9gcgmp662u87b82h592rcdi1mce', '::1', 1773764360, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736343336303b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('ifr3i5uo83h75hvde7ujei6649fb9fg1', '::1', 1773696809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639363830393b),
('j0f8119svmb7a0al5tsqkekte828e3ea', '::1', 1773724057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732343035373b),
('j0pqskmbff3rte7nmb9fna0np7j42dv3', '::1', 1773695459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639353435393b),
('jb74jkmfnjglkmahpm2gphfahur735d4', '::1', 1773690587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639303538373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('jguclhqd8iar3vec44sgk7g5le3ma29g', '::1', 1773746448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734363434383b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('kejatmk1e31apidqgt1f99grdcqvo8vk', '::1', 1773683727, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638333732373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('kjjgrlq0tvdpjvh9kg6ua5e87j72nqdo', '::1', 1773686820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638363832303b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('l2khgjkrq69f1bqoq8itit90sa74hbfv', '::1', 1773745587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734353538373b),
('ljo00u3isjqnnrv0joodpo084r7mihec', '::1', 1773763790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736333739303b),
('lseujudvcnsbhnqv2bi4lqldchk25v4i', '::1', 1773724380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732343338303b),
('lviavt7t079tlsvkndo9btao3bbc7vif', '::1', 1773725167, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732353136373b),
('mf94tn7se6in8hgot6u95n550pqq1bqq', '::1', 1773684436, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638343433363b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('mo8e9ep61hb52cpme5cv5ij4a8u0sfkc', '::1', 1773730557, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333733303534313b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('momd28mnh98uvit0oq0i6pg6cqfbo8cd', '::1', 1773748278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734383131393b),
('mth1d54iqtmavhvqesvgkkav4bndkloc', '::1', 1773687415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638373431353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('n71dggqdmfvkjdcth8sjipeorgimcl24', '::1', 1773745987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734353938373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('nkf3u7k6p48rt74m2uf2m94otr46gf0p', '::1', 1773723534, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732333533343b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('nop2ufu5cda55nb8l5i94jkijrkscjhu', '::1', 1773696892, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639363730373b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('q28nuendnico0plljh9fn2unjrtuce35', '::1', 1773696427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639363432373b),
('rbgvt5mh969j79731s93lv6nees7eujb', '::1', 1773742775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734323737353b),
('rgk7br9sqg9fj50bi12dldp944csnbtv', '::1', 1773763591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736333539313b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('s6u4vrltl5fjrkpg212tt1sfl0ko0doc', '::1', 1773695182, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333639353138323b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('sl1i32ot38d5i5spqlnlcf13taefekjb', '::1', 1773764368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333736343336303b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a32373a22456e72656769737472656d656e74206d697320c3a0206a6f75722e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('sot415j720nl682h6an82bbcgd9bl1vi', '::1', 1773684033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638343033333b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d),
('st35mp9gpovjcbcig8m4l4aces0q6ug9', '::1', 1773748005, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333734383030353b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('ta2gq4k7of21crp7f4aq4dr14oo7j9ji', '::1', 1773688108, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333638383130383b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d737563636573737c733a33353a22456e72656769737472656d656e74206372c3a9c3a920617665632073756363c3a8732e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226f6c64223b7d),
('v11hbq8cd9dusdk74amfhc74quvmct69', '::1', 1773727942, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737333732373934323b636d735f61646d696e7c613a343a7b733a323a226964223b733a313a2237223b733a333a226e6f6d223b733a31313a22424152454b454e53414245223b733a363a227072656e6f6d223b733a363a22414c45584953223b733a353a22656d61696c223b733a31383a22616c65786973406d65646961626f782e6269223b7d);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cle` varchar(150) NOT NULL,
  `valeur` longtext DEFAULT NULL,
  `type_valeur` enum('texte','json','booleen','nombre') NOT NULL DEFAULT 'texte',
  `description` text DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `cle`, `valeur`, `type_valeur`, `description`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'ARMC Burundi', 'texte', 'Nom du site', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 'site_email', 'contact@armc.bi', 'texte', 'Adresse email principale', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(3, 'site_phone', '+257 22 00 00 19', 'texte', 'Téléphone principal', 7, '2026-03-13 17:54:26', '2026-03-16 21:33:59'),
(4, 'site_logo', '/uploads/cms/logo.png', 'texte', 'Logo du site', 1, '2026-03-13 17:54:26', '2026-03-15 11:24:24'),
(5, 'adresse_postale', 'Bujumbura, Burundi', 'texte', 'Adresse postale', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(6, 'facebook_url', 'https://facebook.com/armcbi', 'texte', 'Lien Facebook', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(7, 'linkedin_url', 'https://linkedin.com/company/armcbi', 'texte', 'Lien LinkedIn', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(8, 'maintenance_mode', 'false', 'booleen', 'Mode maintenance du site', 1, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(9, 'x_url', 'https://x.com/ARMC_BDI', 'texte', 'Twitter', 1, '2026-03-15 11:33:10', '2026-03-15 11:33:10');

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `sous_titre` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `bouton_texte` varchar(100) DEFAULT NULL,
  `bouton_lien` varchar(255) DEFAULT NULL,
  `ordre_affichage` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `actif` tinyint(1) NOT NULL DEFAULT 1,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sliders`
--

INSERT INTO `sliders` (`id`, `titre`, `sous_titre`, `description`, `image_url`, `bouton_texte`, `bouton_lien`, `ordre_affichage`, `actif`, `date_debut`, `date_fin`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Des professionnels burundais passent l\'examen CISI en Tanzanie', 'Renforcer le marché des capitaux', 'Découvrez l’article complet sur cette initiative importante.', 'upload/cms/b93e683f4bd8567aac39b40770bacca8.png', 'Lire l’article', '/actualites/professionnels-burundais-examen-cisi-tanzanie', 1, 1, '2026-03-13 18:54:00', '2026-06-11 18:54:00', 2, '2026-03-13 17:54:26', '2026-03-16 19:01:36'),
(2, 'Rapport Annuel 2025 disponible', 'Consultez les réalisations de l’institution', 'Le rapport annuel 2025 de l’ARMC est désormais disponible en téléchargement.', 'upload/cms/076d818573c42ba314a055e9f07aea1d.png', 'Télécharger', '/documents/rapport-annuel-2025', 2, 1, '2026-03-13 18:54:00', '2026-06-11 18:54:00', 2, '2026-03-13 17:54:26', '2026-03-16 19:00:15'),
(3, 'utilisation', 'TEST', 'LE DG', 'upload/cms/037453ec3a1a1429853566e8d9c4ba81.jpg', 'TEST', 'TEST', 1, 1, '2026-03-15 11:55:00', '2026-03-29 11:55:00', 1, '2026-03-15 10:55:54', '2026-03-15 13:27:53'),
(4, 'DG ARMC', NULL, 'Le directeur general', 'upload/cms/d55c2c6ac3cab6b3c059f2f6a0fb4b70.jpg', 'Mr le DG', '#', 1, 1, '2026-03-16 20:04:00', '2026-04-05 20:04:00', 7, '2026-03-16 19:04:46', '2026-03-16 19:04:46');

-- --------------------------------------------------------

--
-- Structure de la table `statistics_data`
--

CREATE TABLE `statistics_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categorie` varchar(150) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `valeur` decimal(18,2) NOT NULL,
  `unite` varchar(50) DEFAULT NULL,
  `periode` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `afficher_accueil` tinyint(1) NOT NULL DEFAULT 0,
  `date_publication` datetime DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statistics_data`
--

INSERT INTO `statistics_data` (`id`, `categorie`, `titre`, `valeur`, `unite`, `periode`, `description`, `source`, `afficher_accueil`, `date_publication`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Marché des capitaux', 'Nombre de publications réglementaires', 48.00, 'documents', '2025', 'Nombre total de publications réglementaires produites en 2025.', 'ARMC Burundi', 1, '2026-03-13 18:54:26', 2, '2026-03-13 17:54:26', '2026-03-13 17:54:26'),
(2, 'Éducation financière', 'Nombre de sessions de sensibilisation', 12.00, 'sessions', '2025', 'Total des sessions de sensibilisation organisées en 2025.', 'ARMC Burundi', 1, '2026-03-13 18:54:26', 2, '2026-03-13 17:54:26', '2026-03-13 17:54:26');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `statut` enum('actif','inactif','suspendu') NOT NULL DEFAULT 'actif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `nom`, `prenom`, `email`, `telephone`, `password_hash`, `photo_profil`, `statut`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Système', 'admin@armc.bi', '+25769000001', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'actif', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(2, 2, 'Ndayisaba', 'Alice33', 'alice@armc.bi', '+25769000002', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'actif', '2026-03-13 17:54:25', '2026-03-15 10:13:32'),
(3, 3, 'Ntahobari', 'Jean', 'jean@armc.bi', '+25769000003', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'actif', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(4, 4, 'Hakizimana', 'Marie', 'marie@armc.bi', '+25769000004', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'actif', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(5, 5, 'Niyonkuru', 'David', 'plaintes@armc.bi', '+25769000005', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'actif', '2026-03-13 17:54:25', '2026-03-13 17:54:25'),
(6, 6, 'Bizimana', 'Clarisse', 'events@armc.bi', '+25769000006', '$2y$10$exampleexampleexampleexampleexampleexampleexample', NULL, 'inactif', '2026-03-13 17:54:25', '2026-03-15 08:31:35'),
(7, 2, 'BAREKENSABE', 'ALEXIS', 'alexis@mediabox.bi', '72345678', '$2y$10$Kw1fsEo.JaKD5s/W.st0O..FYIQmBXPItRKZ/RKgAVlT1zK5JCHnu', 'upload/cms/489f38c7c00624adcd1a2661b99a142f.png', 'actif', '2026-03-15 11:41:53', '2026-03-15 11:44:13');

-- --------------------------------------------------------

--
-- Structure de la table `visitor_stats`
--

CREATE TABLE `visitor_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_type` enum('page','article','document','event','home') NOT NULL,
  `cible_id` bigint(20) UNSIGNED DEFAULT NULL,
  `adresse_ip` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `date_visite` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_alerte` (`reference_alerte`),
  ADD KEY `idx_alerts_type_alerte` (`type_alerte`),
  ADD KEY `idx_alerts_statut` (`statut`),
  ADD KEY `idx_alerts_agent_assigne_id` (`agent_assigne_id`),
  ADD KEY `idx_alerts_date_soumission` (`date_soumission`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_articles_categorie_id` (`categorie_id`),
  ADD KEY `idx_articles_auteur_id` (`auteur_id`),
  ADD KEY `idx_articles_validateur_id` (`validateur_id`),
  ADD KEY `idx_articles_statut` (`statut`),
  ADD KEY `idx_articles_type_article` (`type_article`),
  ADD KEY `idx_articles_date_publication` (`date_publication`),
  ADD KEY `idx_articles_mis_en_avant` (`mis_en_avant`),
  ADD KEY `idx_articles_afficher_accueil` (`afficher_accueil`);

--
-- Index pour la table `article_media`
--
ALTER TABLE `article_media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_article_media` (`article_id`,`media_id`,`type_relation`),
  ADD KEY `idx_article_media_article_id` (`article_id`),
  ADD KEY `idx_article_media_media_id` (`media_id`);

--
-- Index pour la table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_article_tags_article_id` (`article_id`),
  ADD KEY `idx_article_tags_tag` (`tag`);

--
-- Index pour la table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_audit_logs_user_id` (`user_id`),
  ADD KEY `idx_audit_logs_module` (`module`),
  ADD KEY `idx_audit_logs_action` (`action`),
  ADD KEY `idx_audit_logs_created_at` (`created_at`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_categories_parent_id` (`parent_id`),
  ADD KEY `idx_categories_type_contenu` (`type_contenu`),
  ADD KEY `idx_categories_actif` (`actif`);

--
-- Index pour la table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_plainte` (`numero_plainte`),
  ADD KEY `idx_complaints_statut` (`statut`),
  ADD KEY `idx_complaints_priorite` (`priorite`),
  ADD KEY `idx_complaints_agent_assigne_id` (`agent_assigne_id`),
  ADD KEY `idx_complaints_date_soumission` (`date_soumission`);

--
-- Index pour la table `complaint_histories`
--
ALTER TABLE `complaint_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_complaint_histories_complaint_id` (`complaint_id`),
  ADD KEY `idx_complaint_histories_user_id` (`user_id`),
  ADD KEY `idx_complaint_histories_date_action` (`date_action`);

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_contact_messages_statut` (`statut`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_documents_categorie_id` (`categorie_id`),
  ADD KEY `idx_documents_auteur_id` (`auteur_id`),
  ADD KEY `idx_documents_type_document` (`type_document`),
  ADD KEY `idx_documents_statut` (`statut`),
  ADD KEY `idx_documents_annee` (`annee`),
  ADD KEY `idx_documents_date_publication` (`date_publication`);

--
-- Index pour la table `document_tags`
--
ALTER TABLE `document_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_document_tags_document_id` (`document_id`),
  ADD KEY `idx_document_tags_tag` (`tag`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_media_utilisateur_id` (`utilisateur_id`),
  ADD KEY `idx_media_type_media` (`type_media`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_menus_parent_id` (`parent_id`),
  ADD KEY `idx_menus_actif` (`actif`),
  ADD KEY `idx_menus_ordre_affichage` (`ordre_affichage`),
  ADD KEY `idx_menus_type_cible` (`type_cible`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_newsletters_statut` (`statut`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_pages_auteur_id` (`auteur_id`),
  ADD KEY `idx_pages_statut` (`statut`),
  ADD KEY `idx_pages_date_publication` (`date_publication`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_permission` (`code_permission`);

--
-- Index pour la table `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quick_links_user` (`created_by`),
  ADD KEY `idx_quick_links_actif` (`actif`),
  ADD KEY `idx_quick_links_ordre_affichage` (`ordre_affichage`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_role` (`nom_role`);

--
-- Index pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_role_permission` (`role_id`,`permission_id`),
  ADD KEY `fk_role_permissions_permission` (`permission_id`);

--
-- Index pour la table `search_logs`
--
ALTER TABLE `search_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_search_logs_mot_cle` (`mot_cle`),
  ADD KEY `idx_search_logs_created_at` (`created_at`);

--
-- Index pour la table `session_table`
--
ALTER TABLE `session_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cle` (`cle`),
  ADD KEY `idx_settings_updated_by` (`updated_by`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sliders_user` (`created_by`),
  ADD KEY `idx_sliders_actif` (`actif`),
  ADD KEY `idx_sliders_ordre_affichage` (`ordre_affichage`),
  ADD KEY `idx_sliders_date_debut` (`date_debut`),
  ADD KEY `idx_sliders_date_fin` (`date_fin`);

--
-- Index pour la table `statistics_data`
--
ALTER TABLE `statistics_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_statistics_data_user` (`created_by`),
  ADD KEY `idx_statistics_data_categorie` (`categorie`),
  ADD KEY `idx_statistics_data_date_publication` (`date_publication`),
  ADD KEY `idx_statistics_data_afficher_accueil` (`afficher_accueil`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_users_role_id` (`role_id`),
  ADD KEY `idx_users_statut` (`statut`);

--
-- Index pour la table `visitor_stats`
--
ALTER TABLE `visitor_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_visitor_stats_page_type` (`page_type`),
  ADD KEY `idx_visitor_stats_date_visite` (`date_visite`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `article_media`
--
ALTER TABLE `article_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `complaint_histories`
--
ALTER TABLE `complaint_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `document_tags`
--
ALTER TABLE `document_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=934;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `search_logs`
--
ALTER TABLE `search_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `statistics_data`
--
ALTER TABLE `statistics_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `visitor_stats`
--
ALTER TABLE `visitor_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `fk_alerts_agent` FOREIGN KEY (`agent_assigne_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articles_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articles_validateur` FOREIGN KEY (`validateur_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `article_media`
--
ALTER TABLE `article_media`
  ADD CONSTRAINT `fk_article_media_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_article_media_media` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `article_tags`
--
ALTER TABLE `article_tags`
  ADD CONSTRAINT `fk_article_tags_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `fk_audit_logs_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_parent` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_complaints_agent` FOREIGN KEY (`agent_assigne_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `complaint_histories`
--
ALTER TABLE `complaint_histories`
  ADD CONSTRAINT `fk_complaint_histories_complaint` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_complaint_histories_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `fk_documents_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_documents_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `document_tags`
--
ALTER TABLE `document_tags`
  ADD CONSTRAINT `fk_document_tags_document` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `fk_menus_parent` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_pages_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `quick_links`
--
ALTER TABLE `quick_links`
  ADD CONSTRAINT `fk_quick_links_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `fk_role_permissions_permission` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_permissions_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_settings_user` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `fk_sliders_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `statistics_data`
--
ALTER TABLE `statistics_data`
  ADD CONSTRAINT `fk_statistics_data_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
