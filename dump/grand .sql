-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 mars 2024 à 14:50
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

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `prenom_artiste`, `email_artiste`, `num_telephone`, `adresse_artiste`, `cp_artiste`, `ville_artiste`, `date_naissance_artiste`, `date_deces_artiste`, `biographie_fr`) VALUES
(4, 'Smith', 'Emily', 'emily.smith@email.com', 2147483647, '1010 Street of Canvas', 10021, 'New York', '1988-07-08', '2023-07-22', 'Emily Smith, née en 1988 à New York, est une artiste contemporaine reconnue pour ses créations audacieuses et expressives. Sa carrière artistique, bien que trop courte, a laissé une empreinte durable.'),
(5, 'Dubois', 'François', 'francois.dubois@email.com', 2147483647, '222 Rue de la Palette', 69003, 'Lyon', '1970-03-27', '2025-01-05', 'François Dubois, sculpteur français né en 1970 à Lyon, a marqué le monde de l\'art par ses œuvres uniques. Son approche novatrice du travail de la pierre et du métal reste inégalée.'),
(6, 'Kim', 'Min', 'min.kim@email.com', 2147483647, '333 Art Street', 90001, 'Los Angeles', '1985-11-10', '2022-09-30', 'Min Kim, originaire de Corée du Sud et née en 1985, est une artiste contemporaine basée à Los Angeles. Son art reflète l\'intersection entre la tradition coréenne et la modernité américaine.'),
(7, 'Johnson', 'David', 'david.johnson@email.com', 2147483647, '456 Gallery Avenue', 20001, 'Washington', '1978-04-18', '2024-06-12', 'David Johnson, né en 1978 à Washington, est connu pour son approche innovante de l\'art contemporain. Sa carrière artistique a été un voyage passionnant de découvertes et d\'expérimentations.'),
(8, 'Wang', 'Mei', 'mei.wang@email.com', 2147483647, '789 Artistic Lane', 10002, 'New York', '1995-08-05', '2023-12-18', 'Mei Wang, originaire de Chine et née en 1995, est une artiste contemporaine émergente à New York. Son travail explore la fusion entre la culture chinoise traditionnelle et les tendances artistiques modernes.'),
(9, 'Martinez', 'Elena', 'elena.martinez@email.com', 2147483647, '888 Street of Imagination', 33010, 'Miami', '1983-01-30', '2024-08-03', 'Elena Martinez, artiste multimédia née en 1983 à Miami, est reconnue pour sa capacité à créer des expériences artistiques immersives. Sa carrière a été façonnée par un mélange éclectique d\'influences culturelles.'),
(10, 'Brown', 'Alex', 'alex.brown@email.com', 123456789, '777 Art Avenue', 90002, 'Los Angeles', '1973-06-12', '2022-05-17', 'Alex Brown, peintre et muraliste né en 1973 à Los Angeles, est connu pour ses œuvres vibrantes qui captent l\'énergie de la vie urbaine. Son impact sur la scène artistique est indéniable.'),
(18, 'CHEMIER', 'Luca', 'dazcrosse@gmail.com', 765324521, '13 Rue des Trois Clés', 41002, 'Blois', '2024-03-14', '2024-03-07', 'hello guys'),
(19, 'LOKO', 'Luc', 'dazcrosse@gmail.fr', 765324522, '13 Rue des Trois Clé', 41002, 'Vinueille', '2024-03-28', '2024-03-30', 'Ya Jean sakoumoda'),
(20, 'CHEM', 'Lucae', 'dazcross@gmail.com', 765324521, '13 Rue des Trois Clé', 41000, 'Vinueille', '2024-03-13', '2024-03-21', ' jbv'),
(21, 'CHEMIER', 'Ardin', 'ardin@gmail.com', 664641346, '17 Rue des Trois', 41005, 'Blo', '2024-03-13', '2024-03-17', 'Bloblo');

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

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`id_collab`, `nom_collab`, `prenom_collab`, `email_collab`, `adresse_collab`, `cp_collab`, `ville_collab`, `mot_de_passe`, `roles`, `id_poste`) VALUES
(1, 'DZELLAT ', 'Ardin', 'daz@gmail.com', '123 Main Street', 12345, 'Anytown', '1234', 'Directeur de l\'exposition', 7),
(2, 'Doe', 'Jane', 'jane.doe@example.com', '456 Oak Avenue', 67890, 'Othertown', '1234', 'Assistant de l\'exposition', 2),
(3, 'Johnson', 'Michael', 'michael.johnson@example.com', '789 Elm Road', 98765, 'Somewhere', '1234', 'Responsable de la logistique', 3),
(4, 'Williams', 'Emily', 'emily.williams@example.com', '567 Pine Lane', 54321, 'Nowhere', '1234', 'Secrétaire administratif', 4),
(5, 'Brown', 'Christopher', 'chris.brown@example.com', '890 Maple Drive', 45678, 'Anywhere', '1234', 'Analyste des données', 5),
(6, 'Davis', 'Sarah', 'sarah.davis@example.com', '321 Cedar Street', 87654, 'Sometown', '1234', 'Technicien en installation', 6),
(7, 'Garcia', 'Daniel', 'daniel.garcia@example.com', '654 Birch Road', 23456, 'No Place', '1234', 'Ingénieur en maintenance', 7),
(8, 'Rodriguez', 'Olivia', 'olivia.rodriguez@example.com', '987 Oakwood Avenue', 34567, 'Noway', '1234', 'Développeur web', 8),
(9, 'Martinez', 'Ethan', 'ethan.martinez@example.com', '432 Willow Lane', 65432, 'Someplace', '1234', 'Designer graphique', 9),
(10, 'Hernandez', 'Ava', 'ava.hernandez@example.com', '876 Elm Street', 78901, 'Anywhereville', '1234', 'Directeur de l\'exposition', 1),
(11, 'Lopez', 'William', 'william.lopez@example.com', '2100 Cedar Avenue', 89012, 'Anywhereelse', '1234', 'Assistant de l\'exposition', 2),
(12, 'Gonzalez', 'Samantha', 'samantha.gonzalez@example.com', '543 Pine Road', 10987, 'Sometown', '1234', 'Responsable de la logistique', 3),
(13, 'Wilson', 'Matthew', 'matthew.wilson@example.com', '987 Maple Drive', 76543, 'Nowhere', '1234', 'Secrétaire administratif', 4),
(14, 'Anderson', 'Emma', 'emma.anderson@example.com', '678 Oakwood Lane', 12345, 'Anywhere', '1234', 'Analyste des données', 5),
(15, 'Thomas', 'James', 'james.thomas@example.com', '321 Cedar Avenue', 54321, 'Sometown', '1234', 'Technicien en installation', 6);

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
  `id_theme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exposition`
--

INSERT INTO `exposition` (`id_expo`, `date_debut`, `date_fin`, `horaire_visite`, `report_frequentation`, `nom_directeur_artistique`, `prenom_directeur_artistique`, `email_directeur_artistique`, `nombre_oeuvres`, `nom_expo`, `id_theme`) VALUES
(10, '2024-03-08', '2024-03-15', '19:07:00', 10, 'CHEMIER', 'Luc', 'dazcrosse@gmail.com', 12, 'Black ', 12),
(23, '2024-03-23', '2024-03-22', '00:05:00', 10, 'CHEMIER', 'Luci', 'dazcrosse@gmail.com', 17, 'L\'Évolution de la Sculpture', 16),
(33, '2024-03-21', '2024-03-22', '05:09:00', 12, 'CHEMIER', 'Luca', 'dazcrosse@gmail.com', 15, 'Black Fish', 6),
(34, '2024-03-21', '2024-03-29', '05:14:00', 8, 'CHEMIER', 'Lucae', 'dazcrosse@gmail.com', 14, 'L\'Évolution ', 14);

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

--
-- Déchargement des données de la table `langues_site`
--

INSERT INTO `langues_site` (`id_langues`, `libelle_langues`) VALUES
(1, 'English'),
(2, 'Français'),
(3, 'Русский'),
(4, '中文');

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
  `profondeur` decimal(15,2) DEFAULT NULL,
  `poids` varchar(25) DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `date_livraison_prevu` date NOT NULL,
  `date_livraison_reel` date DEFAULT NULL,
  `id_type_oeuvre` int(11) NOT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `id_artiste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `oeuvres_expo`
--

INSERT INTO `oeuvres_expo` (`id_oeuvres`, `nom_oeuvre`, `chemin_image`, `description_oeuvre`, `date_realisation`, `nombre_vues`, `largeur`, `hauteur`, `profondeur`, `poids`, `duree`, `date_livraison_prevu`, `date_livraison_reel`, `id_type_oeuvre`, `id_theme`, `id_artiste`) VALUES
(1, '', 'images/la_joconde.jpg', '', '0000-00-00', 1000000, 0.00, 0.00, 0.00, NULL, '00:00:12', '0000-00-00', '0000-00-00', 1, 4, 0),
(2, 'La Vénus de Milo', 'images/venus_de_milo.jpg', 'La Vénus de Milo est une sculpture représentant la déesse Aphrodite. Datée du IIe siècle av. J.-C.', '0100-01-01', 800000, NULL, NULL, NULL, NULL, NULL, '2024-04-11', '2004-04-16', 2, 5, 0),
(3, 'La victoire de  Samothcrace', 'images/victoire_de_samothrace.jpg', 'ZZFAAAA', '2024-03-21', 700000, 15.00, 12.00, 13.00, '6 kg', '00:00:00', '2024-03-14', '2024-03-14', 6, 4, 0),
(4, 'La Grande Vague de Kanagawa', 'images/grande_vague_kanagawa.jpg', 'La Grande Vague de Kanagawa est une estampe japonaise de l\'artiste Hokusai, réalisée vers 1830.', '1830-01-01', 900000, NULL, NULL, NULL, NULL, NULL, '2024-04-18', '2024-04-22', 3, 7, 0),
(5, 'Le Déjeuner sur l\'herbe', NULL, 'Le Déjeuner sur l\'herbe est une peinture de l\'artiste français Édouard Manet, réalisée en 1863.', '1863-01-01', 750000, 0.00, 0.00, 0.00, NULL, NULL, '2024-04-02', '2024-04-15', 1, 8, 0),
(6, 'Les Tournesols', 'images/tournesols.jpg', 'Les Tournesols est une série de tableaux de Vincent van Gogh, peints en 1888.', '1888-01-01', 850000, NULL, NULL, NULL, NULL, NULL, '2024-04-11', '2024-04-18', 1, 9, 0),
(7, 'La Nuit étoilée', 'images/nuit_etoilee.jpg', 'La Nuit étoilée est une peinture de Vincent van Gogh, réalisée en 1889.', '1889-01-01', 950000, NULL, NULL, NULL, NULL, NULL, '1889-01-01', NULL, 1, 10, 0),
(8, 'La Danseuse au bouquet', 'images/danseuse_bouquet.jpg', 'La Danseuse au bouquet est une sculpture de Camille Claudel, réalisée en 1884.', '1884-01-01', 780000, NULL, NULL, NULL, NULL, NULL, '1884-01-01', NULL, 2, 11, 0),
(9, 'La Grande Arche de la Défense', 'images/grande_arche_defense.jpg', 'La Grande Arche de la Défense est une monumentale arche située à Paris.', '1989-01-01', 600000, 108.00, 110.00, 24.00, NULL, NULL, '1989-01-01', NULL, 4, 12, 0),
(10, 'La Pyramide du Louvre', 'images/pyramide_louvre.jpg', 'La Pyramide du Louvre est une pyramide de verre et de métal située au centre de la cour Napoléon du musée du Louvre à Paris.', '1989-01-01', 700000, NULL, NULL, NULL, NULL, NULL, '1989-01-01', NULL, 4, 13, 0),
(11, 'La Liberté guidant le peuple', 'images/liberte_guidant_peuple.jpg', 'La Liberté guidant le peuple est une peinture d\'Eugène Delacroix, réalisée en 1830.', '1830-01-01', 850000, NULL, NULL, NULL, NULL, NULL, '1830-01-01', NULL, 1, 14, 0),
(12, 'La Guernica', 'images/guernica.jpg', 'La Guernica est une peinture de Pablo Picasso, réalisée en 1937.', '1937-01-01', 900000, NULL, NULL, NULL, NULL, NULL, '1937-01-01', NULL, 1, 15, 0),
(13, 'La Tour Eiffel', 'images/tour_eiffel.jpg', 'La Tour Eiffel est une tour de fer puddlé de 324 mètres de hauteur située à Paris.', '1889-01-01', 1000000, NULL, NULL, NULL, NULL, NULL, '1889-01-01', NULL, 4, 16, 0),
(14, 'Le Radeau de la Méduse', 'images/radeau_meduse.jpg', 'Le Radeau de la Méduse est un tableau de Théodore Géricault, réalisé en 1819.', '1819-01-01', 950000, NULL, NULL, NULL, NULL, NULL, '1819-01-01', NULL, 1, 12, 0),
(16, '', './assets/images/KIMPAVITA.jpg', '', '0000-00-00', NULL, 0.00, 0.00, 0.00, NULL, '00:00:12', '0000-00-00', '0000-00-00', 1, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `postes`
--

CREATE TABLE `postes` (
  `id_poste` int(11) NOT NULL,
  `libelle_poste` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postes`
--

INSERT INTO `postes` (`id_poste`, `libelle_poste`) VALUES
(1, 'Directeur de l\'exposition'),
(2, 'Assistant de l\'exposition'),
(3, 'Responsable de la logistique'),
(4, 'Secrétaire administratif'),
(5, 'Analyste des données'),
(6, 'Technicien en installation'),
(7, 'Ingénieur en maintenance'),
(8, 'Développeur web'),
(9, 'Designer graphique');

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

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `libelle_theme`) VALUES
(4, 'Art du Corps : Tatouages, Piercings, Scarification'),
(5, 'L\'Âge d\'Or de la Peinture Paysanne'),
(6, 'Architecture et Civilisations : Une histoire en pi'),
(7, 'Art Abstrait : Formes, Couleurs, Émotions'),
(8, 'Rêves et Fantaisies : L\'art du surréalisme'),
(9, 'Femmes en Art : Puissance et Sensibilité'),
(10, 'Art et Technologie : Explorations numériques'),
(11, 'Héritage Africain : Tradition et Innovation'),
(12, 'Voyages à travers les Cultures : Art Ethnographiqu'),
(13, 'L\'Épopée de l\'Impressionnisme'),
(14, 'Art du Corps : Tatouages, Piercings, Scarification'),
(15, 'Mémoires de Guerre : L\'art en temps de conflit'),
(16, 'Le Futur Antique : Science-fiction et Mythologie'),
(17, 'Le Monde Sous-marin : Beauté et Fragilité'),
(18, 'Visions Urbaines : Graffiti, Street Art, Murals'),
(19, 'Art et Spiritualité : Expressions de la Foi'),
(23, 'maloubma');

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
-- Déchargement des données de la table `type_oeuvre`
--

INSERT INTO `type_oeuvre` (`id_type_oeuvre`, `libelle_type_oeuvre`) VALUES
(1, 'Peintures'),
(2, 'Sculptures'),
(3, 'Antiquités égyptiennes'),
(4, 'Antiquités grecques, étrusques et romaines'),
(5, 'Arts de l\'Islam'),
(6, 'Arts de l\'Asie'),
(7, 'Objets d\'art du Moyen Âge'),
(8, 'Objets d\'art de la Renaissance'),
(9, 'Objets d\'art du XVIIe siècle'),
(10, 'Objets d\'art du XVIIIe siècle'),
(11, 'Objets d\'art du XIXe siècle'),
(12, 'Objets d\'art du XXe siècle'),
(13, 'Objets d\'art contemporain'),
(14, 'Arts décoratifs'),
(15, 'Arts graphiques'),
(16, 'Arts primitifs'),
(17, 'Céramiques'),
(18, 'Textiles'),
(19, 'Orfèvrerie'),
(20, 'Horlogerie'),
(21, 'Numismatique'),
(22, 'Joillerie'),
(23, 'Fresques'),
(24, 'Tapisseries'),
(25, 'Miniatures'),
(26, 'Enluminures'),
(27, 'Mosaïques'),
(28, 'Verrerie'),
(29, 'Artisanat'),
(30, 'Calligraphie'),
(31, 'Gravures'),
(32, 'Photographies'),
(33, 'Estampes'),
(34, 'Architecture'),
(35, 'Cinématographie'),
(36, 'Arts du spectacle'),
(37, 'Arts plastiques'),
(38, 'Arts visuels'),
(39, 'Arts sonores'),
(40, 'Arts médiatiques'),
(41, 'Arts numériques'),
(42, 'Arts interactifs'),
(43, 'Arts narratifs'),
(44, 'Arts abstraits'),
(45, 'Arts conceptuels'),
(46, 'Arts expressionnistes');

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
  ADD KEY `id_type_oeuvre` (`id_type_oeuvre`),
  ADD KEY `fk_id_theme` (`id_theme`),
  ADD KEY `id_artiste` (`id_artiste`);

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
  MODIFY `id_artiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  MODIFY `id_collab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `espace`
--
ALTER TABLE `espace`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exposition`
--
ALTER TABLE `exposition`
  MODIFY `id_expo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `flashcode`
--
ALTER TABLE `flashcode`
  MODIFY `id_flashcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `langues_site`
--
ALTER TABLE `langues_site`
  MODIFY `id_langues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `oeuvres_expo`
--
ALTER TABLE `oeuvres_expo`
  MODIFY `id_oeuvres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `postes`
--
ALTER TABLE `postes`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `stats`
--
ALTER TABLE `stats`
  MODIFY `id_stats` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `traduction`
--
ALTER TABLE `traduction`
  MODIFY `id_traduction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_oeuvre`
--
ALTER TABLE `type_oeuvre`
  MODIFY `id_type_oeuvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  ADD CONSTRAINT `fk_id_theme` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`),
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
