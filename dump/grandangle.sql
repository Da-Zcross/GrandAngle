-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 fév. 2024 à 09:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grandangle`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(11) NOT NULL,
  `nom_artiste` varchar(50) DEFAULT NULL,
  `prenom_artiste` varchar(50) DEFAULT NULL,
  `email_artiste` varchar(50) DEFAULT NULL,
  `num_telephone` varchar(50) DEFAULT NULL,
  `adresse_artiste` varchar(50) DEFAULT NULL,
  `cp_artiste` varchar(50) DEFAULT NULL,
  `ville_artiste` varchar(50) DEFAULT NULL,
  `date_naissance_artiste` datetime DEFAULT NULL,
  `date_deces_artiste` datetime DEFAULT NULL,
  `biographie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `prenom_artiste`, `email_artiste`, `num_telephone`, `adresse_artiste`, `cp_artiste`, `ville_artiste`, `date_naissance_artiste`, `date_deces_artiste`, `biographie`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@email.com', '123-456-7890', '23 Rue de l\'Art, 75001 Paris', '75001', 'Paris', '1980-05-15 00:00:00', '2023-02-28 00:00:00', 'Jean Dupont est un artiste contemporain renommé, connu pour ses œuvres abstraites qui captivent l\'imagination. Né en 1980 à Paris, il a laissé une empreinte indélébile sur la scène artistique.'),
(2, 'Martin', 'Marie', 'marie.martin@email.com', '234-567-8901', '456 Avenue des Couleurs, 69002 Lyon', '69002', 'Lyon', '1975-09-22 00:00:00', '2022-11-15 00:00:00', 'Marie Martin, née en 1975 à Lyon, est une passionnée d\'art depuis son plus jeune âge. Ses créations uniques combinent la tradition artistique avec une touche moderne, laissant transparaître son amour pour la diversité culturelle.'),
(3, 'Garcia', 'Carlos', 'carlos.garcia@email.com', '345-678-9012', '789 Boulevard Créatif, 13008 Marseille', '13008', 'Marseille', '1992-12-03 00:00:00', '2024-04-10 00:00:00', 'Carlos Garcia, originaire d\'Espagne, est un peintre contemporain dont les œuvres reflètent sa riche histoire culturelle. Né en 1992, il a apporté une nouvelle perspective artistique à Marseille.'),
(4, 'Smith', 'Emily', 'emily.smith@email.com', '456-789-0123', '1010 Street of Canvas, 10021 New York', '10021', 'New York', '1988-07-08 00:00:00', '2023-07-22 00:00:00', 'Emily Smith, née en 1988 à New York, est une artiste contemporaine reconnue pour ses créations audacieuses et expressives. Sa carrière artistique, bien que trop courte, a laissé une empreinte durable.'),
(5, 'Dubois', 'François', 'francois.dubois@email.com', '567-890-1234', '222 Rue de la Palette, 69003 Lyon', '69003', 'Lyon', '1970-03-27 00:00:00', '2025-01-05 00:00:00', 'François Dubois, sculpteur français né en 1970 à Lyon, a marqué le monde de l\'art par ses œuvres uniques. Son approche novatrice du travail de la pierre et du métal reste inégalée.'),
(6, 'Kim', 'Min', 'min.kim@email.com', '678-901-2345', '333 Art Street, 90001 Los Angeles', '90001', 'Los Angeles', '1985-11-10 00:00:00', '2022-09-30 00:00:00', 'Min Kim, originaire de Corée du Sud et née en 1985, est une artiste contemporaine basée à Los Angeles. Son art reflète l\'intersection entre la tradition coréenne et la modernité américaine.'),
(7, 'Johnson', 'David', 'david.johnson@email.com', '789-012-3456', '456 Gallery Avenue, 20001 Washington', '20001', 'Washington', '1978-04-18 00:00:00', '2024-06-12 00:00:00', 'David Johnson, né en 1978 à Washington, est connu pour son approche innovante de l\'art contemporain. Sa carrière artistique a été un voyage passionnant de découvertes et d\'expérimentations.'),
(8, 'Wang', 'Mei', 'mei.wang@email.com', '890-123-4567', '789 Artistic Lane, 10002 New York', '10002', 'New York', '1995-08-05 00:00:00', '2023-12-18 00:00:00', 'Mei Wang, originaire de Chine et née en 1995, est une artiste contemporaine émergente à New York. Son travail explore la fusion entre la culture chinoise traditionnelle et les tendances artistiques modernes.'),
(9, 'Martinez', 'Elena', 'elena.martinez@email.com', '901-234-5678', '888 Street of Imagination, 33010 Miami', '33010', 'Miami', '1983-01-30 00:00:00', '2024-08-03 00:00:00', 'Elena Martinez, artiste multimédia née en 1983 à Miami, est reconnue pour sa capacité à créer des expériences artistiques immersives. Sa carrière a été façonnée par un mélange éclectique d\'influences culturelles.'),
(10, 'Brown', 'Alex', 'alex.brown@email.com', '012-345-6789', '777 Art Avenue, 90002 Los Angeles', '90002', 'Los Angeles', '1973-06-12 00:00:00', '2022-05-17 00:00:00', 'Alex Brown, peintre et muraliste né en 1973 à Los Angeles, est connu pour ses œuvres vibrantes qui captent l\'énergie de la vie urbaine. Son impact sur la scène artistique est indéniable.');

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

CREATE TABLE `collaborateur` (
  `id_collab` int(11) NOT NULL,
  `nom_collab` varchar(50) DEFAULT NULL,
  `prenom_collab` varchar(50) DEFAULT NULL,
  `email_collab` varchar(50) DEFAULT NULL,
  `adresse_collab` varchar(50) DEFAULT NULL,
  `cp_collab` varchar(50) DEFAULT NULL,
  `ville_collab` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `espace`
--

CREATE TABLE `espace` (
  `id_plan` int(11) NOT NULL,
  `libelle_espace` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expostion`
--

CREATE TABLE `expostion` (
  `id_expo` int(11) NOT NULL,
  `date_expo` datetime DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `report_frequentation` varchar(50) DEFAULT NULL,
  `nom_directeur_aristique` varchar(50) DEFAULT NULL,
  `prenom_directeur_artistique` varchar(50) DEFAULT NULL,
  `email_directeur_artistique` varchar(50) DEFAULT NULL,
  `chemin_directeur_artistique` varchar(50) DEFAULT NULL,
  `nb_oeuvres` varchar(50) DEFAULT NULL,
  `nom_expo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `flashcode`
--

CREATE TABLE `flashcode` (
  `id_flashcode` int(11) NOT NULL,
  `ref_flashcode` varchar(50) DEFAULT NULL,
  `chemim_flashcode` text DEFAULT NULL,
  `id_langues` int(11) NOT NULL,
  `id_oeuvres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langues_site`
--

CREATE TABLE `langues_site` (
  `id_langues` int(11) NOT NULL,
  `libelle_langues` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres_expo`
--

CREATE TABLE `oeuvres_expo` (
  `id_oeuvres` int(11) NOT NULL,
  `nom_oeuvre` varchar(50) DEFAULT NULL,
  `ref_oeuvre` varchar(50) DEFAULT NULL,
  `chemin_image` varchar(50) DEFAULT NULL,
  `description_oeuvre` text DEFAULT NULL,
  `date_realisation` datetime DEFAULT NULL,
  `nb_vue` varchar(50) DEFAULT NULL,
  `largeur` text DEFAULT NULL,
  `hauteur` text DEFAULT NULL,
  `profondeur` text DEFAULT NULL,
  `date_livraison_prevu` datetime DEFAULT NULL,
  `date_livraison_reel` datetime DEFAULT NULL,
  `id_type_oeuvre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id_poste` int(11) NOT NULL,
  `libelle_poste` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `libelle_roles` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE `stats` (
  `id_stats` int(11) NOT NULL,
  `libelle_stats` varchar(50) DEFAULT NULL,
  `valeur` varchar(50) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `id_expo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_oeuvre`
--

CREATE TABLE `type_oeuvre` (
  `id_type_oeuvre` int(11) NOT NULL,
  `libelle_type_oeuvre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id_artiste`);

--
-- Index pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD PRIMARY KEY (`id_collab`),
  ADD KEY `id_roles` (`id_roles`);

--
-- Index pour la table `espace`
--
ALTER TABLE `espace`
  ADD PRIMARY KEY (`id_plan`);

--
-- Index pour la table `expostion`
--
ALTER TABLE `expostion`
  ADD PRIMARY KEY (`id_expo`);

--
-- Index pour la table `flashcode`
--
ALTER TABLE `flashcode`
  ADD PRIMARY KEY (`id_flashcode`),
  ADD KEY `id_langues` (`id_langues`),
  ADD KEY `id_oeuvres` (`id_oeuvres`);

--
-- Index pour la table `langues_site`
--
ALTER TABLE `langues_site`
  ADD PRIMARY KEY (`id_langues`);

--
-- Index pour la table `oeuvres_expo`
--
ALTER TABLE `oeuvres_expo`
  ADD PRIMARY KEY (`id_oeuvres`),
  ADD KEY `id_type_oeuvre` (`id_type_oeuvre`);

--
-- Index pour la table `postes`
--
ALTER TABLE `postes`
  ADD PRIMARY KEY (`id_poste`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Index pour la table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id_stats`),
  ADD KEY `id_expo` (`id_expo`);

--
-- Index pour la table `type_oeuvre`
--
ALTER TABLE `type_oeuvre`
  ADD PRIMARY KEY (`id_type_oeuvre`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `collaborateur_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`);

--
-- Contraintes pour la table `flashcode`
--
ALTER TABLE `flashcode`
  ADD CONSTRAINT `flashcode_ibfk_1` FOREIGN KEY (`id_langues`) REFERENCES `langues_site` (`id_langues`),
  ADD CONSTRAINT `flashcode_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`);

--
-- Contraintes pour la table `oeuvres_expo`
--
ALTER TABLE `oeuvres_expo`
  ADD CONSTRAINT `oeuvres_expo_ibfk_1` FOREIGN KEY (`id_type_oeuvre`) REFERENCES `type_oeuvre` (`id_type_oeuvre`);

--
-- Contraintes pour la table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `expostion` (`id_expo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
