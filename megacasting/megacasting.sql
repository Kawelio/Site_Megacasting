-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 02 Juin 2015 à 14:08
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `annonceur`
--

INSERT INTO `annonceur` (`id_annonceur`, `nom_annonceur`, `id_information`) VALUES
(1, 'Sylvie', 36);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id_artiste` int(11) NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(100) NOT NULL,
  `id_information` int(11) NOT NULL,
  PRIMARY KEY (`id_artiste`),
  KEY `id_information` (`id_information`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id_artiste`, `nom_artiste`, `id_information`) VALUES
(1, 'Alexis', 34);

-- --------------------------------------------------------

--
-- Structure de la table `artiste_offre`
--

CREATE TABLE IF NOT EXISTS `artiste_offre` (
  `id_artiste` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  KEY `id_artiste` (`id_artiste`,`id_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `artiste_offre`
--

INSERT INTO `artiste_offre` (`id_artiste`, `id_offre`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `identifiant_compte` int(11) NOT NULL AUTO_INCREMENT,
  `login_compte` varchar(40) NOT NULL,
  `password_compte` varchar(40) NOT NULL,
  PRIMARY KEY (`identifiant_compte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`identifiant_compte`, `login_compte`, `password_compte`) VALUES
(1, 'alepage', 'not24get'),
(2, 'lvannoort', 'not24get'),
(3, 'splard', 'not24get');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `diffuseur`
--

INSERT INTO `diffuseur` (`id_diffuseur`, `nom_diffuseur`, `id_information`) VALUES
(1, 'Lucas', 35);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int(11) NOT NULL AUTO_INCREMENT,
  `lib_domaine` varchar(50) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `lib_domaine`) VALUES
(1, 'Musique'),
(2, 'Cinema'),
(3, 'Theatre'),
(4, 'Dance'),
(5, 'Spectacle');

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
  `token_information` text NOT NULL,
  `validation_information` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_information`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `information`
--

INSERT INTO `information` (`id_information`, `mail_information`, `tel_fixe_information`, `tel_port_information`, `rue_information`, `ville_information`, `cp_information`, `pays_information`, `password_information`, `level_information`, `token_information`, `validation_information`) VALUES
(34, 'alexislepage@hotmail.fr', 243022600, 673072955, 'gÃ©nÃ©ral de gaule', 'Laval', 53000, 'France', 'ae580ed5685b69a33cdcb6f10ca01387aca3427c', 3, 'e5172d0b7695f83338c8093a727328af37a17805', 1),
(35, 'lucasvn@hotmail.fr', 236569878, 654849532, 'champs elysÃ©es', 'Paris', 75000, 'France', 'ae580ed5685b69a33cdcb6f10ca01387aca3427c', 2, '0e80a8eb43760b1018b5c3a087310ea5e662969b', 1),
(36, 'sylvieplard@hotmail.fr', 156235484, 789456231, 'du marchÃ©', 'Marseille', 13000, 'France', 'ae580ed5685b69a33cdcb6f10ca01387aca3427c', 1, 'be4b030b138647d36acabe6286db47b5f701cb29', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `metier`
--

INSERT INTO `metier` (`id_metier`, `lib_metier`) VALUES
(5, 'Chanteur'),
(6, 'Musicien'),
(7, 'Ingenieur son'),
(8, 'Realisateur'),
(9, 'Scenariste'),
(10, 'Acteur'),
(11, 'Cadreur'),
(12, 'Metteur en scene'),
(13, 'Figurant'),
(14, 'Artiste de cirque');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `int_offre`, `ref_offre`, `date_offre`, `duree_offre`, `date_deb_offre`, `loc_offre`, `desc_offre`, `validation_offre`, `id_annonceur`, `id_contrat`, `id_metier`, `id_domaine`, `id_media`) VALUES
(12, 'Figurant pour film', 'Film star wars 7 - la guerre des Ã©toiles', '2015-07-06', 30, '2015-07-20', 'Paris', 'Cherche figurant pour le dernier film de la saga star wars. Homme brun, 1m70 minimum. Un contrat en CDD sera Ã©tablit pour une durÃ©e de 30 jours. Le figurant ne doit pas Ãªtre obligatoirement du domaine cinÃ©matographique pour postuler.', 1, 1, 2, 13, 2, NULL);

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
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `artiste_ibfk_1` FOREIGN KEY (`id_information`) REFERENCES `information` (`id_information`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
