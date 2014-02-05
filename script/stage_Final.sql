-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 05 Février 2014 à 10:57
-- Version du serveur: 5.5.33
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stage_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `ENTREPRISE`
--

CREATE TABLE `ENTREPRISE` (
  `ENT_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `ENT_RAISONSOCIALE` char(100) DEFAULT NULL,
  `ENT_POINTS` decimal(4,0) DEFAULT NULL,
  `ENT_HEURES` decimal(4,0) DEFAULT NULL,
  `ENT_RUE` char(70) DEFAULT NULL,
  `ENT_CP` char(5) DEFAULT NULL,
  `ENT_VILLE` char(40) DEFAULT NULL,
  `ENT_MAIL` char(50) DEFAULT NULL,
  `ENT_TELEPHONE` char(10) DEFAULT NULL,
  `ENT_SITEWEB` char(40) DEFAULT NULL,
  PRIMARY KEY (`ENT_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ENTREPRISE`
--

INSERT INTO `ENTREPRISE` (`ENT_CODE`, `ENT_RAISONSOCIALE`, `ENT_POINTS`, `ENT_HEURES`, `ENT_RUE`, `ENT_CP`, `ENT_VILLE`, `ENT_MAIL`, `ENT_TELEPHONE`, `ENT_SITEWEB`) VALUES
(1, 'RaisonSocial1', 0, 0, 'RueTest1', '10000', 'VilleTest1', 'MailTest1', '0100000000', 'sitewebtest1'),
(2, 'RaisonSocial2', 0, 0, 'RueTest2', '10000', 'VilleTest2', 'MailTest2', '0100000000', 'sitewebtest2'),
(3, 'test', 0, 0, 'test', '10000', 'test', 'test', '0100000000', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `ETAT`
--

CREATE TABLE `ETAT` (
  `ETA_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `ETA_LIBELLE` char(40) DEFAULT NULL,
  PRIMARY KEY (`ETA_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ETAT`
--

INSERT INTO `ETAT` (`ETA_CODE`, `ETA_LIBELLE`) VALUES
(1, 'En Cours'),
(2, 'En Attente'),
(3, 'Resolu'),
(4, 'Sans Solution'),
(5, 'Cloturé');

-- --------------------------------------------------------

--
-- Structure de la table `ID`
--

CREATE TABLE `ID` (
  `ENT_CODE` int(11) NOT NULL,
  `UTI_CODE` int(11) NOT NULL,
  `ROL_CODE` int(11) NOT NULL,
  PRIMARY KEY (`ENT_CODE`,`UTI_CODE`,`ROL_CODE`),
  KEY `FK_ID2` (`UTI_CODE`),
  KEY `FK_ID3` (`ROL_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ID`
--

INSERT INTO `ID` (`ENT_CODE`, `UTI_CODE`, `ROL_CODE`) VALUES
(1, 1, 1),
(1, 2, 2),
(3, 3, 3),
(3, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `INCIDENT`
--

CREATE TABLE `INCIDENT` (
  `INC_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `LIB_CODE` int(11) NOT NULL,
  `UTI_CODE` int(11) NOT NULL,
  `ENT_CODE` int(11) NOT NULL,
  `ETA_CODE` int(11) NOT NULL,
  `INC_LIBELLE` char(40) DEFAULT NULL,
  `INC_DESCRIPTION` char(200) DEFAULT NULL,
  `INC_DATEDEMANDE` date DEFAULT NULL,
  `INC_DECOMPTE` decimal(4,0) DEFAULT NULL,
  `INC_VALIDATION` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`INC_CODE`),
  KEY `FK_DEMANDE` (`UTI_CODE`),
  KEY `FK_DISPOSE2` (`ETA_CODE`),
  KEY `FK_SOUMET` (`ENT_CODE`),
  KEY `FK_URGENCE` (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `INCIDENT`
--

INSERT INTO `INCIDENT` (`INC_CODE`, `LIB_CODE`, `UTI_CODE`, `ENT_CODE`, `ETA_CODE`, `INC_LIBELLE`, `INC_DESCRIPTION`, `INC_DATEDEMANDE`, `INC_DECOMPTE`, `INC_VALIDATION`) VALUES
(1, 1, 1, 1, 1, 'Test', 'Test incident', '2014-02-05', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `INTERVENTION`
--

CREATE TABLE `INTERVENTION` (
  `INT_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `INC_CODE` int(11) NOT NULL,
  `LIB_CODE` int(11) NOT NULL,
  `UTI_CODE` int(11) NOT NULL,
  `INT_LIBELLE` char(40) DEFAULT NULL,
  `INT_DESCRIPTION` char(200) DEFAULT NULL,
  `INT_HEUREDEB` time DEFAULT NULL,
  `INT_HEUREFIN` time DEFAULT NULL,
  `INT_DATEINTER` date DEFAULT NULL,
  PRIMARY KEY (`INT_CODE`),
  KEY `FK_DISPOSE` (`INC_CODE`),
  KEY `FK_INTERVIENT` (`UTI_CODE`),
  KEY `FK_TYPE` (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `INTERVENTION`
--

INSERT INTO `INTERVENTION` (`INT_CODE`, `INC_CODE`, `LIB_CODE`, `UTI_CODE`, `INT_LIBELLE`, `INT_DESCRIPTION`, `INT_HEUREDEB`, `INT_HEUREFIN`, `INT_DATEINTER`) VALUES
(1, 1, 4, 3, 'reinstall', 'reinstall', '09:15:00', '18:00:00', '2014-02-05'),
(2, 1, 4, 3, 'reinstall2', 'reinstall', '09:15:00', '18:00:00', '2014-02-06');

-- --------------------------------------------------------

--
-- Structure de la table `LIBELLE`
--

CREATE TABLE `LIBELLE` (
  `LIB_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `LIB_LIBELLE` char(40) DEFAULT NULL,
  `LIB_TYPE` char(20) DEFAULT NULL,
  PRIMARY KEY (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `LIBELLE`
--

INSERT INTO `LIBELLE` (`LIB_CODE`, `LIB_LIBELLE`, `LIB_TYPE`) VALUES
(1, 'Forte', 'incidenturgence'),
(2, 'Normale', 'incidenturgence'),
(3, 'Faible', 'incidenturgence'),
(4, 'Instalposte', 'interventiontype'),
(5, 'Instalimprim', 'interventiontype');

-- --------------------------------------------------------

--
-- Structure de la table `ROLE`
--

CREATE TABLE `ROLE` (
  `ROL_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_LIBELLE` char(20) DEFAULT NULL,
  PRIMARY KEY (`ROL_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ROLE`
--

INSERT INTO `ROLE` (`ROL_CODE`, `ROL_LIBELLE`) VALUES
(1, 'utilisateur'),
(2, 'responsablecli'),
(3, 'intervenant'),
(4, 'responsableint');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEUR`
--

CREATE TABLE `UTILISATEUR` (
  `UTI_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `UTI_LOGIN` char(20) DEFAULT NULL,
  `UTI_PWD` char(40) DEFAULT NULL,
  `UTI_NOM` char(50) DEFAULT NULL,
  `UTI_PRENOM` char(50) DEFAULT NULL,
  `UTI_MAIL` char(50) DEFAULT NULL,
  `UTI_TELEPHONEFIXE` char(10) DEFAULT NULL,
  `UTI_TELEPHONEMOBILE` char(10) DEFAULT NULL,
  PRIMARY KEY (`UTI_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`UTI_CODE`, `UTI_LOGIN`, `UTI_PWD`, `UTI_NOM`, `UTI_PRENOM`, `UTI_MAIL`, `UTI_TELEPHONEFIXE`, `UTI_TELEPHONEMOBILE`) VALUES
(1, '1', '356a192b7913b04c54574d18c28d46e6395428ab', '1nom', '1prenom', '1mail', '1fixe', '1mobile'),
(2, '2', '356a192b7913b04c54574d18c28d46e6395428ab', '2nom', '2prenom', '2mail', '2fixe', '2mobile'),
(3, '3', '356a192b7913b04c54574d18c28d46e6395428ab', '3nom', '3prenom', '3mail', '3fixe', '3mobile'),
(4, '4', '356a192b7913b04c54574d18c28d46e6395428ab', '4nom', '4prenom', '4mail', '4fixe', '4mobile');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ID`
--
ALTER TABLE `ID`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`ENT_CODE`) REFERENCES `ENTREPRISE` (`ENT_CODE`),
  ADD CONSTRAINT `FK_ID2` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_ID3` FOREIGN KEY (`ROL_CODE`) REFERENCES `ROLE` (`ROL_CODE`);

--
-- Contraintes pour la table `INCIDENT`
--
ALTER TABLE `INCIDENT`
  ADD CONSTRAINT `FK_DEMANDE` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_DISPOSE2` FOREIGN KEY (`ETA_CODE`) REFERENCES `ETAT` (`ETA_CODE`),
  ADD CONSTRAINT `FK_SOUMET` FOREIGN KEY (`ENT_CODE`) REFERENCES `ENTREPRISE` (`ENT_CODE`),
  ADD CONSTRAINT `FK_URGENCE` FOREIGN KEY (`LIB_CODE`) REFERENCES `LIBELLE` (`LIB_CODE`);

--
-- Contraintes pour la table `INTERVENTION`
--
ALTER TABLE `INTERVENTION`
  ADD CONSTRAINT `FK_DISPOSE` FOREIGN KEY (`INC_CODE`) REFERENCES `INCIDENT` (`INC_CODE`),
  ADD CONSTRAINT `FK_INTERVIENT` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_TYPE` FOREIGN KEY (`LIB_CODE`) REFERENCES `LIBELLE` (`LIB_CODE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
