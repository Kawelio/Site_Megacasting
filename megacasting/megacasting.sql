-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 04 Mai 2015 à 21:55
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `megacasting`
--
CREATE DATABASE IF NOT EXISTS `megacasting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `megacasting`;

-- --------------------------------------------------------

--
-- Structure de la table `annonceur`
--

CREATE TABLE IF NOT EXISTS `annonceur` (
  `id_annonceur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_annonceur` varchar(100) NOT NULL,
  `id_information` int(11) NOT NULL,
  PRIMARY KEY (`id_annonceur`),
  KEY `id_information` (`id_information`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `id_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `lib_contrat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_contrat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`id_contrat`, `lib_contrat`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `diffuseur`
--

CREATE TABLE IF NOT EXISTS `diffuseur` (
  `id_diffuseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_diffuseur` varchar(100) NOT NULL,
  `id_information` int(11) NOT NULL,
  PRIMARY KEY (`id_diffuseur`),
  KEY `id_information` (`id_information`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `lib_domaine` varchar(50) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `lib_domaine`) VALUES
(2, 'Musique'),
(3, 'Cinema'),
(4, 'Théâtre'),
(5, 'Danse'),
(6, 'Média');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id_information` int(11) NOT NULL AUTO_INCREMENT,
  `mail_information` varchar(100) NOT NULL,
  `tel_fixe_information` int(10) NOT NULL,
  `tel_port_information` int(10) NOT NULL,
  `rue_information` varchar(50) NOT NULL,
  `ville_information` varchar(50) NOT NULL,
  `cp_information` int(5) NOT NULL,
  `pays_information` varchar(35) NOT NULL,
  `password_information` varchar(50) NOT NULL,
  `validation_information` tinyint(1) DEFAULT NULL,
  `level_information` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_information`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `url_media` mediumblob NOT NULL,
  `poi_media` int(30) NOT NULL COMMENT 'en kOctets',
  `id_type_media` int(11) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `id_type_media` (`id_type_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE IF NOT EXISTS `metier` (
  `id_metier` int(11) NOT NULL AUTO_INCREMENT,
  `lib_metier` varchar(70) NOT NULL,
  PRIMARY KEY (`id_metier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `metier`
--

INSERT INTO `metier` (`id_metier`, `lib_metier`) VALUES
(2, 'Acteur'),
(3, 'Producteur'),
(4, 'Réalisateur'),
(5, 'Cadreur'),
(6, 'Cameraman'),
(7, 'Danseur'),
(8, 'Chorégraphe'),
(9, 'Chanteur'),
(10, 'Scénariste'),
(11, 'Comédien'),
(12, 'Figurant');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `id_offre` int(11) NOT NULL AUTO_INCREMENT,
  `int_offre` varchar(50) NOT NULL,
  `ref_offre` varchar(100) NOT NULL,
  `date_offre` varchar(40) NOT NULL,
  `duree_offre` int(5) NOT NULL,
  `date_deb_offre` varchar(40) NOT NULL,
  `loc_offre` varchar(150) NOT NULL,
  `desc_offre` varchar(3000) NOT NULL,
  `id_annonceur` int(11) NOT NULL,
  `id_contrat` int(11) NOT NULL,
  `id_metier` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_media` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_offre`),
  KEY `id_annonceur` (`id_annonceur`),
  KEY `id_contrat` (`id_contrat`),
  KEY `id_metier` (`id_metier`),
  KEY `id_domaine` (`id_domaine`),
  KEY `id_media` (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offre_diffuseur`
--

CREATE TABLE IF NOT EXISTS `offre_diffuseur` (
  `id_offre` int(11) NOT NULL,
  `id_diffuseur` int(11) NOT NULL,
  PRIMARY KEY (`id_offre`,`id_diffuseur`),
  KEY `id_diffuseur` (`id_diffuseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_media`
--

CREATE TABLE IF NOT EXISTS `type_media` (
  `id_type_media` int(11) NOT NULL AUTO_INCREMENT,
  `lib_type_media` varchar(50) NOT NULL,
  PRIMARY KEY (`id_type_media`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_media`
--

INSERT INTO `type_media` (`id_type_media`, `lib_type_media`) VALUES
(1, 'PDF'),
(2, 'VIDEO'),
(3, 'PHOTO');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonceur`
--
ALTER TABLE `annonceur`
  ADD CONSTRAINT `annonceur_ibfk_1` FOREIGN KEY (`id_information`) REFERENCES `information` (`id_information`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diffuseur`
--
ALTER TABLE `diffuseur`
  ADD CONSTRAINT `diffuseur_ibfk_1` FOREIGN KEY (`id_information`) REFERENCES `information` (`id_information`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`id_type_media`) REFERENCES `type_media` (`id_type_media`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`id_annonceur`) REFERENCES `annonceur` (`id_annonceur`),
  ADD CONSTRAINT `offre_ibfk_2` FOREIGN KEY (`id_contrat`) REFERENCES `contrat` (`id_contrat`),
  ADD CONSTRAINT `offre_ibfk_3` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id_metier`),
  ADD CONSTRAINT `offre_ibfk_4` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`),
  ADD CONSTRAINT `offre_ibfk_5` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`);

--
-- Contraintes pour la table `offre_diffuseur`
--
ALTER TABLE `offre_diffuseur`
  ADD CONSTRAINT `offre_diffuseur_ibfk_1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id_offre`),
  ADD CONSTRAINT `offre_diffuseur_ibfk_2` FOREIGN KEY (`id_diffuseur`) REFERENCES `diffuseur` (`id_diffuseur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
