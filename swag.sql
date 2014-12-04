-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Décembre 2014 à 22:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `swag`
--

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE IF NOT EXISTS `centre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordonneX` float NOT NULL,
  `coordonneY` float NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `centre`
--

INSERT INTO `centre` (`id`, `coordonneX`, `coordonneY`, `nom`, `type`) VALUES
(1, 57.04, 37.8954, 'centre du ghanna', 'DEPISTAGE'),
(2, 58.0548, 38.5485, 'centre 13', 'VACCINATION'),
(5, 58.0585, 36.845, 'centre swag', 'DEPISTAGE'),
(6, 58.0585, 36.845, 'centre swag', 'VACCINATION');

-- --------------------------------------------------------

--
-- Structure de la table `maladie`
--

CREATE TABLE IF NOT EXISTS `maladie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `maladie`
--

INSERT INTO `maladie` (`id`, `nom`) VALUES
(1, 'EBOLA'),
(2, 'VIH'),
(3, 'angine'),
(4, 'grippe'),
(8, 'rougeole'),
(7, 'peste');

-- --------------------------------------------------------

--
-- Structure de la table `maladiecentre`
--

CREATE TABLE IF NOT EXISTS `maladiecentre` (
  `fk_maladie` int(11) NOT NULL,
  `fk_centre` int(11) NOT NULL,
  PRIMARY KEY (`fk_maladie`,`fk_centre`),
  UNIQUE KEY `fk_maladie_2` (`fk_maladie`,`fk_centre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maladiecentre`
--

INSERT INTO `maladiecentre` (`fk_maladie`, `fk_centre`) VALUES
(1, 2),
(1, 3),
(2, 1),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `maladiesymptome`
--

CREATE TABLE IF NOT EXISTS `maladiesymptome` (
  `fk_maladie` int(11) NOT NULL,
  `fk_symptome` int(11) NOT NULL,
  PRIMARY KEY (`fk_maladie`,`fk_symptome`),
  UNIQUE KEY `fk_symptome` (`fk_symptome`),
  UNIQUE KEY `fk_maladie_3` (`fk_maladie`,`fk_symptome`),
  UNIQUE KEY `fk_maladie_4` (`fk_maladie`,`fk_symptome`),
  KEY `fk_maladie` (`fk_maladie`),
  KEY `fk_maladie_2` (`fk_maladie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maladiesymptome`
--

INSERT INTO `maladiesymptome` (`fk_maladie`, `fk_symptome`) VALUES
(1, 1),
(1, 2),
(2, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `symptome`
--

CREATE TABLE IF NOT EXISTS `symptome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `nom` (`nom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `symptome`
--

INSERT INTO `symptome` (`id`, `nom`) VALUES
(1, 'fièvre'),
(2, 'douleur au bras'),
(3, 'plaques rouges'),
(4, 'courbature'),
(5, 'mal au ventre'),
(6, 'teint blanchâtre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'medecin1', '123'),
(2, 'medecin2', '123');

-- --------------------------------------------------------

--
-- Structure de la table `zoneepidemie`
--

CREATE TABLE IF NOT EXISTS `zoneepidemie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordonneX` float NOT NULL,
  `coordonneY` float NOT NULL,
  `radius` int(11) NOT NULL,
  `fk_maladie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `zoneepidemie`
--

INSERT INTO `zoneepidemie` (`id`, `coordonneX`, `coordonneY`, `radius`, `fk_maladie`) VALUES
(1, 58.5, 39, 20, 1),
(2, 57, 30, 10, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
