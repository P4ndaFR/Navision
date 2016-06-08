-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 07 Juin 2016 à 10:00
-- Version du serveur :  5.7.12-0ubuntu1
-- Version de PHP :  5.6.11-1ubuntu3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Navision`
--

-- --------------------------------------------------------

--
-- Structure de la table `ADMINISTRATEUR`
--

CREATE TABLE IF NOT EXISTS `ADMINISTRATEUR` (
  `USER` varchar(200) NOT NULL,
  `PASSWORD` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ADMINISTRATEUR`
--

INSERT INTO `ADMINISTRATEUR` (`USER`, `PASSWORD`) VALUES
('user', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `BATIMENTS`
--

CREATE TABLE IF NOT EXISTS `BATIMENTS` (
  `CODE_BAT` int(11) NOT NULL,
  `NOM_BAT` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `BATIMENTS`
--

INSERT INTO `BATIMENTS` (`CODE_BAT`, `NOM_BAT`) VALUES
(0, 'ISEN Brest');

-- --------------------------------------------------------

--
-- Structure de la table `ETAGE`
--

CREATE TABLE IF NOT EXISTS `ETAGE` (
  `CODE_BAT` int(11) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `NOM` varchar(1024) NOT NULL,
  `URL_PLAN` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ETAGE`
--

INSERT INTO `ETAGE` (`CODE_BAT`, `NIVEAU`, `NOM`, `URL_PLAN`) VALUES
(0, 0, 'Rez de Chaussée', 'ressources'),
(0, 1, '1er étage', 'ressources'),
(0, 2, '2ème étage', ''),
(0, 3, '3ème étage', '');

-- --------------------------------------------------------

--
-- Structure de la table `LIAISON`
--

CREATE TABLE IF NOT EXISTS `LIAISON` (
  `POI_ID_PT` int(11) NOT NULL,
  `ID_PT` int(11) NOT NULL,
  `DISTANCE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LIAISON`
--

INSERT INTO `LIAISON` (`POI_ID_PT`, `ID_PT`, `DISTANCE`) VALUES
(2, 29, NULL),
(29, 2, NULL),
(29, 33, NULL),
(29, 38, NULL),
(29, 59, NULL),
(33, 29, NULL),
(38, 29, NULL),
(40, 41, NULL),
(40, 55, NULL),
(40, 59, NULL),
(41, 40, NULL),
(46, 47, NULL),
(46, 55, NULL),
(47, 46, NULL),
(47, 48, NULL),
(47, 53, NULL),
(48, 47, NULL),
(48, 50, NULL),
(49, 50, NULL),
(49, 54, NULL),
(50, 48, NULL),
(50, 49, NULL),
(50, 52, NULL),
(51, 52, NULL),
(51, 54, NULL),
(52, 50, NULL),
(52, 51, NULL),
(52, 53, NULL),
(53, 47, NULL),
(53, 52, NULL),
(54, 49, NULL),
(54, 51, NULL),
(55, 40, NULL),
(55, 46, NULL),
(55, 57, NULL),
(56, 58, NULL),
(57, 55, NULL),
(57, 58, NULL),
(58, 56, NULL),
(58, 57, NULL),
(59, 29, NULL),
(59, 40, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `POINT`
--

CREATE TABLE IF NOT EXISTS `POINT` (
  `ID_PT` int(11) NOT NULL,
  `CODE_BAT` int(11) NOT NULL,
  `NIVEAU` int(11) NOT NULL,
  `X` int(11) NOT NULL,
  `Y` int(11) NOT NULL,
  `NOM` varchar(1024) DEFAULT NULL,
  `DESCRIPTION` varchar(1024) DEFAULT NULL,
  `POI` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `POINT`
--

INSERT INTO `POINT` (`ID_PT`, `CODE_BAT`, `NIVEAU`, `X`, `Y`, `NOM`, `DESCRIPTION`, `POI`) VALUES
(2, 0, 0, 50, 50, 'Truc', 'Bidule', 1),
(29, 0, 0, 120, 84, 'Test', 'petit test', 1),
(33, 0, 0, 144, 95, 'Accueil', 'Information accueil', 1),
(38, 0, 0, 175, 15, 'Club Elec', 'Best Club !!!', 1),
(40, 0, 1, 129, 88, NULL, NULL, 0),
(41, 0, 1, 56, 101, 'CSI', 'Aucun', 1),
(46, 0, 3, 131, 88, NULL, NULL, 0),
(47, 0, 3, 118, 84, NULL, NULL, 0),
(48, 0, 3, 92, 109, NULL, NULL, 0),
(49, 0, 3, 38, 109, NULL, NULL, 0),
(50, 0, 3, 82, 108, NULL, NULL, 0),
(51, 0, 3, 57, 72, NULL, NULL, 0),
(52, 0, 3, 84, 71, NULL, NULL, 0),
(53, 0, 3, 120, 70, NULL, NULL, 0),
(54, 0, 3, 56, 88, NULL, NULL, 0),
(55, 0, 2, 129, 89, NULL, NULL, 0),
(56, 0, 2, 104, 110, 'CIR', 'Best Formation !!!', 1),
(57, 0, 2, 121, 82, NULL, NULL, 0),
(58, 0, 2, 93, 109, NULL, NULL, 0),
(59, 0, 0, 127, 94, NULL, NULL, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ADMINISTRATEUR`
--
ALTER TABLE `ADMINISTRATEUR`
  ADD PRIMARY KEY (`USER`);

--
-- Index pour la table `BATIMENTS`
--
ALTER TABLE `BATIMENTS`
  ADD PRIMARY KEY (`CODE_BAT`);

--
-- Index pour la table `ETAGE`
--
ALTER TABLE `ETAGE`
  ADD PRIMARY KEY (`CODE_BAT`,`NIVEAU`);

--
-- Index pour la table `LIAISON`
--
ALTER TABLE `LIAISON`
  ADD PRIMARY KEY (`POI_ID_PT`,`ID_PT`),
  ADD KEY `FK_LIAISON2` (`ID_PT`);

--
-- Index pour la table `POINT`
--
ALTER TABLE `POINT`
  ADD PRIMARY KEY (`ID_PT`),
  ADD KEY `FK_DEPEND` (`CODE_BAT`,`NIVEAU`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `POINT`
--
ALTER TABLE `POINT`
  MODIFY `ID_PT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ETAGE`
--
ALTER TABLE `ETAGE`
  ADD CONSTRAINT `FK_APPARTIENT` FOREIGN KEY (`CODE_BAT`) REFERENCES `BATIMENTS` (`CODE_BAT`);

--
-- Contraintes pour la table `LIAISON`
--
ALTER TABLE `LIAISON`
  ADD CONSTRAINT `FK_LIAISON` FOREIGN KEY (`POI_ID_PT`) REFERENCES `POINT` (`ID_PT`),
  ADD CONSTRAINT `FK_LIAISON2` FOREIGN KEY (`ID_PT`) REFERENCES `POINT` (`ID_PT`);

--
-- Contraintes pour la table `POINT`
--
ALTER TABLE `POINT`
  ADD CONSTRAINT `FK_DEPEND` FOREIGN KEY (`CODE_BAT`, `NIVEAU`) REFERENCES `ETAGE` (`CODE_BAT`, `NIVEAU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
