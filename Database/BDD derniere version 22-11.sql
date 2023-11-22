-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 11:19 PM
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
(1, 2, 2, '26/06/2024', 1),
(2, 2, 4, '11/11/2023', 0),
(3, 1, 1, '11/12/2023', 1),
(6, 2, 3, '2023-11-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `creneaujoueur`
--

CREATE TABLE IF NOT EXISTS `creneaujoueur` (
  `id_CreaJeu` int(11) NOT NULL,
  `id_util` int(11) NOT NULL,
  `joueur_inscris` tinyint(1) NOT NULL DEFAULT '1',
  `statut` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creneaujoueur`
--

INSERT INTO `creneaujoueur` (`id_CreaJeu`, `id_util`, `joueur_inscris`, `statut`) VALUES
(0, 5, 1, 0),
(1, 0, 1, 0),
(1, 5, 1, 0),
(2, 0, 1, 0),
(2, 5, 1, 0),
(3, 0, 1, 0),
(4, 0, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`, `desc_jeu`, `categorie_jeu`, `regle_jeu`, `photo_jeu`) VALUES
(1, 'Scrabble', 'Le Scrabble est un jeu de soci&eacute;t&eacute; tr&egrave;s populaire o&ugrave; l&rsquo;objectif est de cumuler des points en cr&eacute;ant des mots sur une grille carr&eacute;e, dont certaines cases sont prim&eacute;es.', 'Jeu de plateau', 'scrabble-board-game.pdf', 'scrabble1.jpeg'),
(2, 'Trivial pursuit', 'Le Trivial Pursuit est un jeu de soci&eacute;t&eacute; dont la progression d&eacute;pend de la capacit&eacute; du joueur &agrave; r&eacute;pondre &agrave; des questions de culture g&eacute;n&eacute;rale.', 'Jeu de plateau', 'Trivial_Pursuit.pdf', 'trivial2.jpeg'),
(3, 'Catan', 'Catan, aussi connu sous le nom &ldquo;Les Colons de Catane&rdquo;, est un jeu de plateau et de strat&eacute;gie passionnant qui vous embarque dans une course pour le d&eacute;veloppement de votre colonie sur l&rsquo;&icirc;le de Catane.', 'Jeu de plateau', 'catan_base_rules.pdf', 'catan3.jpeg'),
(4, 'Jeu Damier', 'Le jeu de dames est un jeu de soci&eacute;t&eacute; combinatoire abstrait pour deux joueurs. Le plateau utilis&eacute; est appel&eacute; &quot;damier&quot;.', 'Jeu de plateau', 'Official-Rules-of-the-damier.pdf', 'dame1.jpeg'),
(5, 'Monopoly', 'Monopoly est un jeu de soci&eacute;t&eacute; am&eacute;ricain &eacute;dit&eacute; par Hasbro. Le but du jeu consiste &agrave; ruiner ses adversaires par des op&eacute;rations immobili&egrave;res.', 'Jeu de plateau', '1d-monopoly-regle.pdf', 'monopoly1.jpeg'),
(6, 'Betrayal at house on the hill', 'Betrayal at House on the Hill est un jeu de plateau coop&eacute;ratif dans lequel les joueurs explorent une maison hant&eacute;e et tentent de survivre aux horreurs qui s&rsquo;y trouvent. Le jeu est con&ccedil;u pour trois &agrave; six personnes, chacune jouant l&rsquo;un des six personnages possibles.', 'Jeu de plateau', 'betrayal.pdf', 'Betrayal2.jpeg'),
(7, 'Carcassone', 'Carcassonne est un jeu de pose de tuiles, o&ugrave; l''on construit le plateau de jeu au cours de la partie. Des points sont attribu&eacute;s en fonction de la taille des combinaisons cr&eacute;&eacute;es &mdash; villes, champs, routes, abbayes.', 'Jeu de plateau', 'zm7810_carcassonne_rules_compressed (1)-avec compression.pdf', 'carcassone2.jpeg'),
(8, 'Pandemic', 'C&rsquo;est un jeu coop&eacute;ratif o&ugrave; les joueurs travaillent ensemble pour stopper la propagation de maladies mortelles avant qu&rsquo;elles ne d&eacute;vastent la plan&egrave;te.', 'Jeu de plateau', '96-pandemic-regle.pdf', 'pandemic.jpeg'),
(9, 'Pandemic', 'C&rsquo;est un jeu coop&eacute;ratif o&ugrave; les joueurs travaillent ensemble pour stopper la propagation de maladies mortelles avant qu&rsquo;elles ne d&eacute;vastent la plan&egrave;te.', 'Jeu de plateau', '96-pandemic-regle.pdf', 'pandemic.jpeg'),
(11, 'Azul', 'Un jeu o&ugrave; les joueurs endossent le r&ocirc;le d&rsquo;artisans carreleurs charg&eacute;s de d&eacute;corer les murs du Palais Royal de Evora.', 'Jeu de plateau', 'fd-azul-rulebook.pdf', 'azul.jpeg'),
(12, 'Cluedo', 'Un jeu de d&eacute;duction o&ugrave; les joueurs doivent r&eacute;soudre un meurtre en d&eacute;couvrant qui est le meurtrier, quelle est l&rsquo;arme du crime et o&ugrave; le crime a &eacute;t&eacute; commis.', 'Jeu de plateau', 'Cluedo_text.pdf', 'cluedo.jpeg'),
(13, 'Dixit', 'Un jeu de devinettes o&ugrave; les joueurs choisissent des cartes en fonction d&rsquo;une phrase ou d&rsquo;un mot &eacute;nonc&eacute; par le &ldquo;conteur&rdquo;, puis votent pour d&eacute;terminer quelle carte correspond le mieux &agrave; l&rsquo;indice.', 'Jeu de plateau', 'DIXIT_REFRESH_RULES_US-UK-AU_BD.pdf', 'dixit.jpeg'),
(15, 'Puissance 4', 'Un jeu de strat&eacute;gie o&ugrave; deux joueurs s&rsquo;affrontent pour aligner quatre de leurs pions en ligne, en colonne ou en diagonale avant leur adversaire.', 'Jeu de plateau', 'Puissance-quatre-regle-du-jeu.pdf', 'puissance4.jpeg'),
(16, 'Risk', 'Un jeu de strat&eacute;gie et de conqu&ecirc;te o&ugrave; les joueurs tentent de prendre le contr&ocirc;le de territoires sur une carte du monde, tout en luttant contre les autres joueurs pour atteindre leur objectif secret.', 'Jeu de plateau', 'risk.pdf', 'risk.jpeg'),
(18, 'Terraforming', 'C&rsquo;est un jeu de strat&eacute;gie o&ugrave; les joueurs endossent le r&ocirc;le de corporations travaillant ensemble pour rendre Mars habitable pour les humains.', 'Jeu de plateau', 'TerraformingMars_v1.pdf', 'terraforming.jpeg');

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
(0, 1, 0),
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
`id_util` int(20) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'user.jpeg'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_util`, `prenom_util`, `mail_util`, `mdp_util`, `role_util`, `id_util`, `photo`) VALUES
('Deslandes', 'Valentin', 'val@gmail.com', '$2y$12$H8.pX4w25mb7MlnuC4AgnelL91zgjF4FsNEW2PUusr8hT3N.yhXuG', 2, 0, 'user.jpeg'),
('admin', 'admin', 'admin@gmail.com', '$2y$12$TTw7.haG08c82t3RucB7LuQY51gxs.q94ZF9HthX16mz15zkSpnDq', 1, 1, 'user.jpeg'),
('admin2', 'admin2', 'admin2@gmail.com', '$2y$12$iOAxq5XcxlGbNAu59j1JZORkPJMwxbDlzr5bVxVyFArdwqoQAhd9.', 1, 2, 'user.jpeg'),
('DIOUF', 'Abdoul Ahad Mbacke', 'aamd.diouf@gmail.com', '$2y$12$xpDQ8N/z0D0Ceu9exEU4eOSOyCT.V3UP80d7ch3EKn7c9cickFCKq', 1, 6, 'IMG_9103bis.jpeg'),
('Diouf', 'Jean Bernard Made', 'jean@gmail.com', '$2y$12$Ynm2DDbu8nJPSMoixOUOxeNvT1qf1bHF/XqOa2RAcgWG6cSqROy4C', 2, 7, 'user.jpeg');

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
-- Indexes for table `jeu`
--
ALTER TABLE `jeu`
 ADD PRIMARY KEY (`id_jeu`);

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
-- AUTO_INCREMENT for table `jeu`
--
ALTER TABLE `jeu`
MODIFY `id_jeu` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
