-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 07 mars 2024 à 15:13
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
-- Base de données : `grand`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `id_artiste` int(11) NOT NULL,
  `nom_artiste` varchar(100) NOT NULL,
  `prenom_artiste` varchar(100) NOT NULL,
  `email_artiste` varchar(150) DEFAULT NULL,
  `num_telephone` int(11) DEFAULT NULL,
  `adresse_artiste` varchar(150) DEFAULT NULL,
  `cp_artiste` int(11) DEFAULT NULL,
  `ville_artiste` varchar(50) DEFAULT NULL,
  `date_naissance_artiste` date DEFAULT NULL,
  `date_deces_artiste` date DEFAULT NULL,
  `biographie_fr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE `avoir` (
  `id_expo` int(11) NOT NULL,
  `id_artiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

CREATE TABLE `collaborateur` (
  `id_collab` int(11) NOT NULL,
  `nom_collab` varchar(100) NOT NULL,
  `prenom_collab` varchar(100) NOT NULL,
  `email_collab` varchar(150) NOT NULL,
  `adresse_collab` varchar(150) DEFAULT NULL,
  `cp_collab` int(11) DEFAULT NULL,
  `ville_collab` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  `roles` varchar(50) NOT NULL,
  `id_poste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `id_expo` int(11) NOT NULL,
  `id_oeuvres` int(11) NOT NULL,
  `id_plan` int(11) NOT NULL,
  `position_y` varchar(50) DEFAULT NULL,
  `position_x` varchar(50) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL
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
-- Structure de la table `exposition`
--

CREATE TABLE `exposition` (
  `id_expo` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `horaire_visite` time NOT NULL,
  `report_frequentation` int(11) DEFAULT NULL,
  `nom_directeur_artistique` varchar(100) DEFAULT NULL,
  `prenom_directeur_artistique` varchar(100) DEFAULT NULL,
  `email_directeur_artistique` varchar(150) DEFAULT NULL,
  `nombre_oeuvres` int(11) DEFAULT NULL,
  `nom_expo` varchar(100) NOT NULL,
  `id_theme` int(11) NOT NULL
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
  `nom_oeuvre` varchar(100) NOT NULL,
  `chemin_image` varchar(150) DEFAULT NULL,
  `description_oeuvre` text DEFAULT NULL,
  `date_realisation` date NOT NULL,
  `nombre_vues` int(11) DEFAULT NULL,
  `largeur` decimal(15,2) DEFAULT NULL,
  `hauteur` decimal(15,2) DEFAULT NULL,
  `poids` decimal(15,2) DEFAULT NULL,
  `profondeur` decimal(15,2) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `date_livraison_prevu` date NOT NULL,
  `date_livraison_reel` date DEFAULT NULL,
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
-- Structure de la table `présenter`
--

CREATE TABLE `présenter` (
  `id_oeuvres` int(11) NOT NULL,
  `id_artiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recueillir`
--

CREATE TABLE `recueillir` (
  `id_expo` int(11) NOT NULL,
  `id_collab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stats`
--

CREATE TABLE `stats` (
  `id_stats` int(11) NOT NULL,
  `libelle_stats` varchar(50) DEFAULT NULL,
  `valeur` varchar(50) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `id_expo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id_theme` int(11) NOT NULL,
  `libelle_theme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `traduction`
--

CREATE TABLE `traduction` (
  `id_traduction` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `id_langues` int(11) NOT NULL,
  `id_oeuvres` int(11) NOT NULL
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
-- Index pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD PRIMARY KEY (`id_expo`,`id_artiste`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD PRIMARY KEY (`id_collab`),
  ADD KEY `id_poste` (`id_poste`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`id_expo`,`id_oeuvres`,`id_plan`),
  ADD KEY `id_oeuvres` (`id_oeuvres`),
  ADD KEY `id_plan` (`id_plan`);

--
-- Index pour la table `espace`
--
ALTER TABLE `espace`
  ADD PRIMARY KEY (`id_plan`);

--
-- Index pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD PRIMARY KEY (`id_expo`),
  ADD KEY `id_theme` (`id_theme`);

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
-- Index pour la table `présenter`
--
ALTER TABLE `présenter`
  ADD PRIMARY KEY (`id_oeuvres`,`id_artiste`),
  ADD KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `recueillir`
--
ALTER TABLE `recueillir`
  ADD PRIMARY KEY (`id_expo`,`id_collab`),
  ADD KEY `id_collab` (`id_collab`);

--
-- Index pour la table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id_stats`),
  ADD KEY `id_expo` (`id_expo`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- Index pour la table `traduction`
--
ALTER TABLE `traduction`
  ADD PRIMARY KEY (`id_traduction`),
  ADD KEY `id_langues` (`id_langues`),
  ADD KEY `id_oeuvres` (`id_oeuvres`);

--
-- Index pour la table `type_oeuvre`
--
ALTER TABLE `type_oeuvre`
  ADD PRIMARY KEY (`id_type_oeuvre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id_artiste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  MODIFY `id_collab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `espace`
--
ALTER TABLE `espace`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id_expo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `flashcode`
--
ALTER TABLE `flashcode`
  MODIFY `id_flashcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langues_site`
--
ALTER TABLE `langues_site`
  MODIFY `id_langues` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `oeuvres_expo`
--
ALTER TABLE `oeuvres_expo`
  MODIFY `id_oeuvres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stats`
--
ALTER TABLE `stats`
  MODIFY `id_stats` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `traduction`
--
ALTER TABLE `traduction`
  MODIFY `id_traduction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_oeuvre`
--
ALTER TABLE `type_oeuvre`
  MODIFY `id_type_oeuvre` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `avoir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `avoir_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `collaborateur_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `postes` (`id_poste`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`),
  ADD CONSTRAINT `contenir_ibfk_3` FOREIGN KEY (`id_plan`) REFERENCES `espace` (`id_plan`);

--
-- Contraintes pour la table `exposition`
--
ALTER TABLE `exposition`
  ADD CONSTRAINT `exposition_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`);

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
-- Contraintes pour la table `présenter`
--
ALTER TABLE `présenter`
  ADD CONSTRAINT `présenter_ibfk_1` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`),
  ADD CONSTRAINT `présenter_ibfk_2` FOREIGN KEY (`id_artiste`) REFERENCES `artiste` (`id_artiste`);

--
-- Contraintes pour la table `recueillir`
--
ALTER TABLE `recueillir`
  ADD CONSTRAINT `recueillir_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`),
  ADD CONSTRAINT `recueillir_ibfk_2` FOREIGN KEY (`id_collab`) REFERENCES `collaborateur` (`id_collab`);

--
-- Contraintes pour la table `stats`
--
ALTER TABLE `stats`
  ADD CONSTRAINT `stats_ibfk_1` FOREIGN KEY (`id_expo`) REFERENCES `exposition` (`id_expo`);

--
-- Contraintes pour la table `traduction`
--
ALTER TABLE `traduction`
  ADD CONSTRAINT `traduction_ibfk_1` FOREIGN KEY (`id_langues`) REFERENCES `langues_site` (`id_langues`),
  ADD CONSTRAINT `traduction_ibfk_2` FOREIGN KEY (`id_oeuvres`) REFERENCES `oeuvres_expo` (`id_oeuvres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
