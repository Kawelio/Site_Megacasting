-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Mai 2015 à 11:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `megacasting`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `annonceur`
--

INSERT INTO `annonceur` (`id_annonceur`, `nom_annonceur`, `id_information`) VALUES
(6, 'non je supprime rien', 8),
(7, 'juju', 9),
(8, 'hgtgt', 10),
(9, 'coucou', 11),
(10, 'Bonjour', 12),
(11, 'Bernard', 13);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `diffuseur`
--

INSERT INTO `diffuseur` (`id_diffuseur`, `nom_diffuseur`, `id_information`) VALUES
(1, 'cocuou', 7);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `lib_domaine` varchar(50) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `lib_domaine`) VALUES
(2, 'coucou'),
(3, 'Electronique');

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
  `level_information` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_information`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `information`
--

INSERT INTO `information` (`id_information`, `mail_information`, `tel_fixe_information`, `tel_port_information`, `rue_information`, `ville_information`, `cp_information`, `pays_information`, `password_information`, `level_information`) VALUES
(7, 'coucou@hotmail.fr', 626266, 2316531, 'gogo', 'bignon', 53150, 'hahaha', '', 1),
(8, 'lucasnff', 626, 6353, 'juju', 'juju', 53150, 'lvaaz', '', 1),
(9, 'nihkhgk', 265453, 4565435, 'jiji', 'jiji', 53150, 'iji', '', 1),
(10, 'gtgt', 2626, 2626, '26', '2626', 2626, '26262', '', 1),
(11, 'cf', 6, 6, '06', '06', 6, '06', '', 1),
(12, 'Bonjour', 606, 606, 'Bonjour', 'Bonjour', 53150, 'Bonjour', 'coucou', 1),
(13, 'benard.vannort@hotmail.fr', 243021623, 612345985, 'rue de la libération', 'LAVAL', 53000, 'FRANCE', 'not24get', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `url_media`, `poi_media`, `id_type_media`) VALUES
(1, 0x636f75636f75, 9000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE IF NOT EXISTS `metier` (
  `id_metier` int(11) NOT NULL AUTO_INCREMENT,
  `lib_metier` varchar(70) NOT NULL,
  PRIMARY KEY (`id_metier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `metier`
--

INSERT INTO `metier` (`id_metier`, `lib_metier`) VALUES
(2, 'Bucheron'),
(3, 'Informaticien'),
(4, 'Plombier');

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
  `validation_offre` int(1) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `int_offre`, `ref_offre`, `date_offre`, `duree_offre`, `date_deb_offre`, `loc_offre`, `desc_offre`, `validation_offre`, `id_annonceur`, `id_contrat`, `id_metier`, `id_domaine`, `id_media`) VALUES
(1, 'modifier', 'modifier', 'Mon Dec 22 10:31:00 CET 2014', 7, 'Mon Dec 15 10:31:58 CET 2014', 'modifier', 'modifier', 0, 9, 3, 3, 3, 1),
(2, 'Il ne faut surtout pas mettre d apostrophe', 'coucou', ' Sun Dec 14 20:11:59 CET 2014', 4, 'Sun Dec 14 20:11:59 CET 2014', 'Paris', 'Pour en mettre vous laisser un espace', 1, 6, 1, 2, 2, 1),
(3, 'hey', 'hey', ' Sun Dec 14 20:17:41 CET 2014', 3, 'Sun Dec 14 20:17:41 CET 2014', 'coucou', 'hey', 0, 6, 1, 2, 2, 1),
(4, 'coucou', 'coucou', ' Sun Dec 14 20:20:20 CET 2014', 3, 'Sun Dec 14 20:20:21 CET 2014', 'coucou', 'coucou', 1, 6, 1, 2, 2, 1),
(5, 'coucou2', 'coucou2', ' Sun Dec 14 20:20:20 CET 2014', 3, 'Sun Dec 14 20:20:21 CET 2014', 'coucou2', 'coucou2', 1, 6, 1, 2, 2, 1),
(6, 'hey', 'hey', ' Sun Dec 14 20:24:06 CET 2014', 3, 'Sun Dec 14 20:24:06 CET 2014', 'hey', 'hey', 1, 6, 1, 2, 2, 1),
(7, 'jiji', 'jiji', ' Mon Dec 15 09:17:24 CET 2014', 5, 'Mon Dec 15 09:17:24 CET 2014', 'jiji', 'jiji', 0, 6, 1, 2, 2, 1),
(8, 'fsdfsdf', 'sdfdsf', 'Tue Dec 16 12:06:19 CET 2014', 0, 'Tue Dec 16 12:06:19 CET 2014', 'sdfsdf', 'sdvdsdsg', 0, 6, 1, 2, 2, 1),
(9, 'sfqsqfvsqgsq', 'qfvqfgqs', 'Tue Dec 16 12:07:20 CET 2014', 0, 'Tue Dec 16 12:07:20 CET 2014', 'qfvqdsvgqd', 'vdqvgqdg', 1, 6, 1, 2, 2, 1);

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
