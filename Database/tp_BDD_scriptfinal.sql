-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 oct. 2023 à 09:24
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp`
--

-- --------------------------------------------------------

--
-- Structure de la table `creationjeu`
--

CREATE TABLE `creationjeu` (
  `id_CreaJeu` int(20) NOT NULL,
  `id_utilJeu` int(20) NOT NULL,
  `date_Jeu` date NOT NULL,
  `id_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `id_jeu` int(20) NOT NULL,
  `nom_jeu` varchar(40) NOT NULL,
  `desc_jeu` varchar(200) NOT NULL,
  `categorie_jeu` varchar(30) NOT NULL,
  `regle_jeu` varchar(500) NOT NULL,
  `photo_jeu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joueurjeu`
--

CREATE TABLE `joueurjeu` (
  `id_util` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `joueur_inscris` tinyint(1) NOT NULL,
  `joueur_aimant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom_util` varchar(20) NOT NULL,
  `prenom_util` varchar(20) NOT NULL,
  `mail_util` varchar(30) NOT NULL,
  `mdp_util` varchar(100) NOT NULL,
  `role_util` int(3) NOT NULL,
  `id_util` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creationjeu`
--
ALTER TABLE `creationjeu`
  ADD PRIMARY KEY (`id_CreaJeu`,`id_utilJeu`),
  ADD KEY `id_jeu` (`id_jeu`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`id_jeu`);

--
-- Index pour la table `joueurjeu`
--
ALTER TABLE `joueurjeu`
  ADD PRIMARY KEY (`id_util`,`id_jeu`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_util`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
