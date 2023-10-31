-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2023 at 03:18 PM
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
  `date_Jeu` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `creationjeu`
--

INSERT INTO `creationjeu` (`id_CreaJeu`, `id_utilJeu`, `id_jeu`, `date_Jeu`) VALUES
(1, 0, 2, '02/09/2024');

-- --------------------------------------------------------

--
-- Table structure for table `historiquejeu`
--

CREATE TABLE IF NOT EXISTS `historiquejeu` (
`id_historique` int(11) NOT NULL,
  `id_util` int(20) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `date_jeu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jeu`
--

CREATE TABLE IF NOT EXISTS `jeu` (
`id_jeu` int(20) NOT NULL,
  `nom_jeu` varchar(40) NOT NULL,
  `desc_jeu` varchar(200) NOT NULL,
  `categorie_jeu` varchar(30) NOT NULL,
  `regle_jeu` varchar(500) NOT NULL,
  `photo_jeu` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`, `desc_jeu`, `categorie_jeu`, `regle_jeu`, `photo_jeu`) VALUES
(1, 'Donjon&Dragon', 'jeu de rôle blabla', 'jeu de rôle', 'blabla', 'blabla'),
(2, 'LOL', 'jeu 5 contre 5 etc.', 'MOBA', 'blabla', 'photo'),
(3, 'Ride to go', 'Petite description', 'je ne sais pas', 'D&egrave;gle du jeu !!!', 'photo du jeu');

-- --------------------------------------------------------

--
-- Table structure for table `joueurjeu`
--

CREATE TABLE IF NOT EXISTS `joueurjeu` (
  `id_util` int(11) NOT NULL,
  `id_jeu` int(11) NOT NULL,
  `joueur_inscris` tinyint(1) NOT NULL,
  `joueur_aimant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_util`, `prenom_util`, `mail_util`, `mdp_util`, `role_util`, `id_util`) VALUES
('deslandes', 'valentin', 'val@gmail.com', '$2y$12$H8.pX4w25mb7MlnuC4AgnelL91zgjF4FsNEW2PUusr8hT3N.yhXuG', 1, 0),
('DIOUF', 'Abdoul Ahad Mbacke', 'abdoul@gmail.com', '$2y$12$5zyp5kTKZ4k2cyHS1V9xsebvjPfRcltgennOoIicGr.DAMlsCmAQi', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creationjeu`
--
ALTER TABLE `creationjeu`
 ADD PRIMARY KEY (`id_CreaJeu`,`id_utilJeu`), ADD KEY `id_jeu` (`id_jeu`);

--
-- Indexes for table `historiquejeu`
--
ALTER TABLE `historiquejeu`
 ADD PRIMARY KEY (`id_historique`), ADD KEY `id_util` (`id_util`), ADD KEY `id_jeu` (`id_jeu`);

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
MODIFY `id_CreaJeu` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `historiquejeu`
--
ALTER TABLE `historiquejeu`
MODIFY `id_historique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jeu`
--
ALTER TABLE `jeu`
MODIFY `id_jeu` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id_util` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `historiquejeu`
--
ALTER TABLE `historiquejeu`
ADD CONSTRAINT `historiquejeu_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`),
ADD CONSTRAINT `historiquejeu_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
