-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 nov. 2022 à 01:35
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `all5sport`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `fk_pr` varchar(18) NOT NULL,
  `fk_cl` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  `fk_statut` int(11) NOT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`fk_pr`, `fk_cl`, `date`, `fk_statut`, `prix`) VALUES
('ELYSPO12345678901', 'CLI12345670', '2022-10-25 14:41:02', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:19:24', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:19:43', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:20:12', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:20:48', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:23:55', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:24:53', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:25:24', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:29:09', 1, 200),
('ELYSPO12345678901', 'CLI12345670', '2022-11-15 16:34:35', 1, 200),
('ELYSPO12345678902', 'CLI12345670', '2022-11-08 16:55:43', 1, 30),
('ELYSPO12345678902', 'CLI12345670', '2022-11-08 16:56:02', 1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `nom_admin` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `code_client` varchar(11) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `date_naissance` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`code_client`, `adresse`, `email`, `telephone`, `date_naissance`, `password`) VALUES
('CLI12345670', 'Valenciennes', 'elyade@gmail.com', '09291029', '07/10/2003', 'ekipp'),
('CLI12345671', 'Paris', 'ekip@gmail.com', '12093910', '21/09/2009', 'bruh');

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `enfant_id` int(11) NOT NULL,
  `age_enfant` varchar(45) NOT NULL,
  `fk_cl` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`enfant_id`, `age_enfant`, `fk_cl`) VALUES
(1, '12', 'CLI12345670'),
(2, '13', 'CLI12345670'),
(3, '8', 'CLI12345671'),
(4, '6', 'CLI12345671');

-- --------------------------------------------------------

--
-- Structure de la table `eststock`
--

CREATE TABLE `eststock` (
  `fk_sto` int(11) NOT NULL,
  `fk_pr` varchar(18) NOT NULL,
  `quantite_stock_magasin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eststock`
--

INSERT INTO `eststock` (`fk_sto`, `fk_pr`, `quantite_stock_magasin`) VALUES
(1, 'ELYSPO12345678901', 3),
(1, 'ELYSPO12345678904', 19),
(1, 'MASSPO12345678903', 67),
(2, 'ELYSPO12345678905', 0),
(2, 'MASSPO12345678906', 86),
(3, 'ELYSPO12345678903', 66),
(3, 'MASSPO12345678901', 7),
(3, 'MASSPO12345678904', -2),
(4, 'ELYSPO12345678906', 8),
(5, 'MASSPO12345678902', 61),
(5, 'MASSPO12345678905', 40),
(6, 'ELYSPO12345678902', 86);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `fournisseur_nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `fournisseur_nom`) VALUES
(1, 'Elyade'),
(2, 'Massimo');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `photo_libelle` varchar(45) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `fk_prr` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`photo_id`, `photo_libelle`, `photo`, `fk_prr`) VALUES
(1, 'balle de basket', '../view/ballebasket.jpg', 'ELYSPO12345678902'),
(2, 'airjordan4', '../view/airjordan4.jpg', 'ELYSPO12345678901'),
(3, 'balle de baseball', '../view/ballebaseball.jpg', 'MASSPO12345678901'),
(4, 'balle de football', '../view/ballefootball.jpg', 'MASSPO12345678904'),
(5, 'balle de pingpong', '../view/ballepingpong.jpg', 'MASSPO12345678905'),
(6, 'balle de tennis', '../view/balletennis.jpg', 'ELYSPO12345678903'),
(7, 'chaussures de basket', '../view/../view/chaussuresbasket.jpg', 'MASSPO12345678903'),
(8, 'chaussures puma', '../view/chaussurespuma.jpg', 'ELYSPO12345678905'),
(9, 'ekip', '../view/ekip.jpg', 'MASSPO12345678902'),
(10, 'gourde de psg', '../view/gourdepsg.jpg', 'ELYSPO12345678906'),
(11, 'proteine', '../view/proteine.jpg', 'MASSPO12345678906'),
(12, 'survetement real madrid', '../view/survetementreal.jpg', 'ELYSPO12345678904');

-- --------------------------------------------------------

--
-- Structure de la table `pratique`
--

CREATE TABLE `pratique` (
  `fk_cl` varchar(11) NOT NULL,
  `fk_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pratique`
--

INSERT INTO `pratique` (`fk_cl`, `fk_sp`) VALUES
('CLI12345670', 1),
('CLI12345670', 3),
('CLI12345671', 2),
('CLI12345671', 4);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `reference_produit` varchar(18) NOT NULL,
  `cout_unitaire` int(11) NOT NULL,
  `description_produit` varchar(45) NOT NULL,
  `quantite_stock_internet` int(11) NOT NULL,
  `fk_ray` int(11) NOT NULL,
  `fk_fo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`reference_produit`, `cout_unitaire`, `description_produit`, `quantite_stock_internet`, `fk_ray`, `fk_fo`) VALUES
('ELYSPO12345678901', 200, 'air jordan 4', 0, 1, 1),
('ELYSPO12345678902', 30, 'balle de basket', 90, 1, 1),
('ELYSPO12345678903', 10, 'balle de tennis', 16, 1, 1),
('ELYSPO12345678904', 89, 'survêtement réal madrid', 65, 1, 1),
('ELYSPO12345678905', 45, 'chaussures puma', 65, 1, 1),
('ELYSPO12345678906', 20, 'gourde PSG', 65, 1, 1),
('MASSPO12345678901', 90, 'balle de baseball', 65, 1, 2),
('MASSPO12345678902', 19, 'ekip', 65, 1, 2),
('MASSPO12345678903', 120, 'chaussures de basket', 95, 1, 2),
('MASSPO12345678904', 60, 'balle de football', 605, 1, 2),
('MASSPO12345678905', 30, 'balle de ping pong', 25, 1, 2),
('MASSPO12345678906', 50, 'proteine', 65, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

CREATE TABLE `rayon` (
  `id_rayon` int(11) NOT NULL,
  `libelle_rayon` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `libelle_rayon`) VALUES
(1, 'sport'),
(2, 'alimentation');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `libelle_sport` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`sport_id`, `libelle_sport`) VALUES
(1, 'Football'),
(2, 'Basketball'),
(3, 'Tennis'),
(4, 'baseball');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(11) NOT NULL,
  `libelle_statut` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `libelle_statut`) VALUES
(1, 'Panier'),
(2, 'Preparation'),
(3, 'En cours de livraison'),
(4, 'Livré');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `lieu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`stock_id`, `lieu`) VALUES
(1, 'Lille'),
(2, 'Paris'),
(3, 'Valenciennes'),
(4, 'Lyon'),
(5, 'Marseille'),
(6, 'Rennes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`fk_pr`,`fk_cl`,`date`),
  ADD KEY `iencli` (`fk_cl`),
  ADD KEY `statut` (`fk_statut`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`code_client`);

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`enfant_id`),
  ADD KEY `client` (`fk_cl`);

--
-- Index pour la table `eststock`
--
ALTER TABLE `eststock`
  ADD PRIMARY KEY (`fk_sto`,`fk_pr`),
  ADD KEY `produi` (`fk_pr`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `produ` (`fk_prr`);

--
-- Index pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD PRIMARY KEY (`fk_cl`,`fk_sp`),
  ADD KEY `sport` (`fk_sp`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`reference_produit`),
  ADD KEY `fournisseur` (`fk_fo`),
  ADD KEY `rayon` (`fk_ray`);

--
-- Index pour la table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `duitpro` FOREIGN KEY (`fk_pr`) REFERENCES `produits` (`reference_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iencli` FOREIGN KEY (`fk_cl`) REFERENCES `client` (`code_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `statut` FOREIGN KEY (`fk_statut`) REFERENCES `statut` (`id_statut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `client` FOREIGN KEY (`fk_cl`) REFERENCES `client` (`code_client`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `eststock`
--
ALTER TABLE `eststock`
  ADD CONSTRAINT `produi` FOREIGN KEY (`fk_pr`) REFERENCES `produits` (`reference_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `stockee` FOREIGN KEY (`fk_sto`) REFERENCES `stock` (`stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `produ` FOREIGN KEY (`fk_prr`) REFERENCES `produits` (`reference_produit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pratique`
--
ALTER TABLE `pratique`
  ADD CONSTRAINT `clien` FOREIGN KEY (`fk_cl`) REFERENCES `client` (`code_client`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sport` FOREIGN KEY (`fk_sp`) REFERENCES `sport` (`sport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fournisseur` FOREIGN KEY (`fk_fo`) REFERENCES `fournisseur` (`id_fournisseur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rayon` FOREIGN KEY (`fk_ray`) REFERENCES `rayon` (`id_rayon`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
