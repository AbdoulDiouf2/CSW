-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2023 at 10:56 PM
-- Server version: 5.6.20-log
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `creationjeu`
--

CREATE TABLE IF NOT EXISTS `creationjeu` (
`id_CreaJeu` int(20) NOT NULL,
  `id_utilJeu` int(20) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `date_Jeu` varchar(20) NOT NULL,
  `Partie_terminee` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `creationjeu`
--

INSERT INTO `creationjeu` (`id_CreaJeu`, `id_utilJeu`, `id_jeu`, `date_Jeu`, `Partie_terminee`) VALUES
(0, 1, 2, '02/09/2024', 0),
(1, 2, 2, '26/06/2024', 0),
(2, 2, 4, '11/11/2023', 0),
(3, 1, 1, '11/12/2023', 1),
(4, 2, 0, '20/11/2023', 0),
(6, 2, 3, '2023-11-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `creneaujoueur`
--

CREATE TABLE IF NOT EXISTS `creneaujoueur` (
  `id_CreaJeu` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `joueur_inscris` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creneaujoueur`
--

INSERT INTO `creneaujoueur` (`id_CreaJeu`, `id_util`, `joueur_inscris`) VALUES
(0, 5, 1),
(1, 0, 1),
(1, 5, 1),
(2, 0, 1),
(2, 5, 1),
(3, 0, 1),
(4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jeu`
--

CREATE TABLE IF NOT EXISTS `jeu` (
  `id_jeu` int(20) NOT NULL,
  `nom_jeu` varchar(40) NOT NULL,
  `desc_jeu` varchar(5000) NOT NULL,
  `categorie_jeu` varchar(30) NOT NULL,
  `regle_jeu` varchar(1000) NOT NULL,
  `photo_jeu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`, `desc_jeu`, `categorie_jeu`, `regle_jeu`, `photo_jeu`) VALUES
(0, 'Scrabble', 'desc', 'Jeu de plateau', 'scrabble-board-game.pdf', 'scrabble1.jpeg'),
(1, 'Trivial pursuit', 'desc', 'Jeu de plateau', 'Trivial_Pursuit.pdf', 'trivial1.jpeg'),
(2, 'Catan', 'desc', 'Jeu de plateau', 'scrabble-board-game.pdf', 'catan1.jpeg'),
(3, 'Jeu Damier', 'desc', 'Jeu de plateau', 'Official-Rules-of-the-damier.pdf', 'dame1.jpeg'),
(4, 'Monopoly', 'desc', 'Jeu de plateau', '1d-monopoly-regle.pdf', 'monopoly1.jpeg'),
(5, 'Betrayal at house on the hill', 'desc', 'Jeu de plateau', 'betrayal.pdf', 'Betrayal3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `joueurjeu`
--

CREATE TABLE IF NOT EXISTS `joueurjeu` (
  `id_util` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `joueur_aimant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joueurjeu`
--

INSERT INTO `joueurjeu` (`id_util`, `id_jeu`, `joueur_aimant`) VALUES
(0, 0, 0),
(0, 1, 1),
(0, 2, 1),
(0, 3, 1),
(0, 4, 0),
(0, 5, 1),
(5, 0, 1),
(5, 1, 1),
(5, 2, 1),
(5, 3, 1),
(5, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos_jeu`
--

CREATE TABLE IF NOT EXISTS `photos_jeu` (
`id_photo` int(11) NOT NULL,
  `id_jeu` int(11) DEFAULT NULL,
  `photo1` varchar(50) NOT NULL,
  `photo2` varchar(50) NOT NULL,
  `photo3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom_util` varchar(20) NOT NULL,
  `prenom_util` varchar(20) NOT NULL,
  `mail_util` varchar(30) NOT NULL,
  `mdp_util` varchar(100) NOT NULL,
  `role_util` int(3) NOT NULL,
`id_util` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_util`, `prenom_util`, `mail_util`, `mdp_util`, `role_util`, `id_util`) VALUES
('deslandes', 'valentin', 'val@gmail.com', '$2y$12$H8.pX4w25mb7MlnuC4AgnelL91zgjF4FsNEW2PUusr8hT3N.yhXuG', 2, 0),
('admin', 'admin', 'admin@gmail.com', '$2y$12$TTw7.haG08c82t3RucB7LuQY51gxs.q94ZF9HthX16mz15zkSpnDq', 1, 1),
('admin2', 'admin2', 'admin2@gmail.com', '$2y$12$iOAxq5XcxlGbNAu59j1JZORkPJMwxbDlzr5bVxVyFArdwqoQAhd9.', 1, 2),
('DIOUF', 'Abdoul Ahad Mbacke', 'aamd.diouf@gmail.com', '$2y$12$xpDQ8N/z0D0Ceu9exEU4eOSOyCT.V3UP80d7ch3EKn7c9cickFCKq', 2, 6),
('Diouf', 'Jean Bernard Made', 'jean@gmail.com', '$2y$12$Ynm2DDbu8nJPSMoixOUOxeNvT1qf1bHF/XqOa2RAcgWG6cSqROy4C', 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creationjeu`
--
ALTER TABLE `creationjeu`
 ADD PRIMARY KEY (`id_CreaJeu`,`id_utilJeu`), ADD KEY `id_jeu` (`id_jeu`);

--
-- Indexes for table `creneaujoueur`
--
ALTER TABLE `creneaujoueur`
 ADD PRIMARY KEY (`id_CreaJeu`,`id_util`);

--
-- Indexes for table `joueurjeu`
--
ALTER TABLE `joueurjeu`
 ADD PRIMARY KEY (`id_util`,`id_jeu`);

--
-- Indexes for table `photos_jeu`
--
ALTER TABLE `photos_jeu`
 ADD PRIMARY KEY (`id_photo`), ADD KEY `id_jeu` (`id_jeu`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id_util`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creationjeu`
--
ALTER TABLE `creationjeu`
MODIFY `id_CreaJeu` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `photos_jeu`
--
ALTER TABLE `photos_jeu`
MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id_util` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
