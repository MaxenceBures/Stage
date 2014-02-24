-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 24 Février 2014 à 11:27
-- Version du serveur: 5.5.33
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stage`
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
  `ENT_ADRESSE2` varchar(200) NOT NULL,
  `ENT_ADRESSE3` varchar(200) NOT NULL,
  `ENT_TRIGRAMME` varchar(5) NOT NULL,
  PRIMARY KEY (`ENT_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `ENTREPRISE`
--

INSERT INTO `ENTREPRISE` (`ENT_CODE`, `ENT_RAISONSOCIALE`, `ENT_POINTS`, `ENT_HEURES`, `ENT_RUE`, `ENT_CP`, `ENT_VILLE`, `ENT_MAIL`, `ENT_TELEPHONE`, `ENT_SITEWEB`, `ENT_ADRESSE2`, `ENT_ADRESSE3`, `ENT_TRIGRAMME`) VALUES
(-1, 'Particulier', 0, 0, 'test', '10000', 'test', 'test', '0100000000', 'test', '', '', 'PART'),
(1, 'RaisonSocial1', 0, 0, 'RueTest1', '10000', 'VilleTest1', 'MailTest1', '0100000000', 'sitewebtest1', '', '', 'RS1'),
(2, 'RaisonSocial2', 0, 0, 'RueTest2', '10000', 'VilleTest2', 'MailTest2', '0100000000', 'sitewebtest2', '', '', 'RS2'),
(3, 'test', 0, 0, 'testz', '10000', 'testz', 'testz', '0100000000', 'testz', '', '', 'TR1'),
(4, 'test', 0, 0, 'testz', '10000', 'testz', 'testz', '0100000000', 'testz', '', '', 'TR2'),
(5, 'Raisonsociale5', NULL, 0, 'adresse1', 'cp', 'ville', 'mail', 'telephone', 'siteweb', 'adresse2', 'adresse3', 'tri');

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
(-1, -1, 1),
(-1, -1, 2),
(-1, -1, 3),
(-1, -1, 4),
(1, 1, 1),
(1, 2, 2),
(3, 3, 3),
(3, 4, 4),
(1, 5, 2),
(3, 6, 3),
(1, 7, 4),
(2, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `INCIDENT`
--

CREATE TABLE `INCIDENT` (
  `INC_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `URG_CODE` int(11) NOT NULL,
  `UTI_CODE` int(11) NOT NULL,
  `ENT_CODE` int(11) NOT NULL,
  `ETA_CODE` int(11) NOT NULL,
  `INC_LIBELLE` char(40) DEFAULT NULL,
  `INC_DESCRIPTION` char(200) DEFAULT NULL,
  `INC_DATEDEMANDE` date DEFAULT NULL,
  `INC_DECOMPTE` decimal(4,0) DEFAULT '0',
  `INC_VALIDATION` tinyint(1) DEFAULT '0',
  `INC_DEMANDE` varchar(2) NOT NULL,
  `INC_TYPE` int(11) NOT NULL,
  `INC_DATECLOTURE` date NOT NULL,
  `INC_CLOTURE` varchar(10) NOT NULL,
  PRIMARY KEY (`INC_CODE`),
  KEY `FK_DEMANDE` (`UTI_CODE`),
  KEY `FK_DISPOSE2` (`ETA_CODE`),
  KEY `FK_SOUMET` (`ENT_CODE`),
  KEY `FK_URGENCE` (`URG_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `INCIDENT`
--

INSERT INTO `INCIDENT` (`INC_CODE`, `URG_CODE`, `UTI_CODE`, `ENT_CODE`, `ETA_CODE`, `INC_LIBELLE`, `INC_DESCRIPTION`, `INC_DATEDEMANDE`, `INC_DECOMPTE`, `INC_VALIDATION`, `INC_DEMANDE`, `INC_TYPE`, `INC_DATECLOTURE`, `INC_CLOTURE`) VALUES
(1, 1, 1, 1, 1, 'Test', 'Test incident', '2014-02-05', 0, 0, '1', 6, '0000-00-00', ''),
(2, 1, 1, 1, 5, 'Test2', 'Test2 incident', '2014-02-10', 0, 1, '1', 7, '2014-02-20', ''),
(3, 1, 2, 1, 1, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '2', 6, '0000-00-00', ''),
(4, 1, 2, 1, 2, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '1', 6, '0000-00-00', ''),
(5, 2, 1, 1, 5, 'res', 'test', '2014-02-10', NULL, 1, '2', 7, '2014-02-20', ''),
(6, 2, 1, 1, 3, '12', 'test', '2014-02-05', 0, 0, '1', 7, '0000-00-00', ''),
(7, 1, 1, 1, 5, '', '', '2014-02-10', 0, 1, '1', 6, '2014-02-24', 'log4'),
(8, 1, 1, 1, 5, 'tt', 'tt', '2014-02-10', 0, 1, '1', 6, '2014-02-21', 'lo'),
(9, 1, 1, 1, 1, 'tt', 'tt', '2014-02-10', 0, 0, '3', 6, '0000-00-00', ''),
(10, 1, 2, 1, 2, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '1', 7, '0000-00-00', ''),
(11, 2, 2, 1, 1, 'TEST', 'TEST', '2014-02-12', 0, 0, '2', 6, '0000-00-00', ''),
(12, 3, 3, 2, 1, 'zeze', 'zezezeazeaze', '2014-02-12', 0, 0, '3', 8, '0000-00-00', ''),
(13, 3, 3, 2, 1, 'rtd', 'tf', '2014-02-12', 0, 0, '3', 10, '0000-00-00', ''),
(14, 3, 4, 1, 1, 'Test', 'Test\r\n', '2014-02-12', 0, 0, '3', 8, '0000-00-00', ''),
(15, 2, 1, 1, 5, 'ttt', 'ttt', '2014-02-13', 0, 1, '3', 7, '2014-02-21', ''),
(16, 3, 5, 1, 1, 'd', 'd', '2014-02-13', 0, 0, '3', 6, '0000-00-00', ''),
(17, 1, 5, 1, 1, 'h', '', '2014-02-13', 0, 0, '3', 6, '0000-00-00', '');

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
  `INT_DESCRIPTION` text,
  `INT_HEUREDEB` varchar(8) DEFAULT NULL,
  `INT_HEUREFIN` varchar(8) DEFAULT NULL,
  `INT_DATEINTER` date DEFAULT NULL,
  `INT_TECHNICIEN` varchar(2) NOT NULL,
  PRIMARY KEY (`INT_CODE`),
  KEY `FK_DISPOSE` (`INC_CODE`),
  KEY `FK_INTERVIENT` (`UTI_CODE`),
  KEY `FK_TYPE` (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `INTERVENTION`
--

INSERT INTO `INTERVENTION` (`INT_CODE`, `INC_CODE`, `LIB_CODE`, `UTI_CODE`, `INT_LIBELLE`, `INT_DESCRIPTION`, `INT_HEUREDEB`, `INT_HEUREFIN`, `INT_DATEINTER`, `INT_TECHNICIEN`) VALUES
(1, 1, 4, 3, 'reinstall', 'reinstall', '09:15:00', '18:00:00', '2014-02-05', '3'),
(2, 1, 4, 3, 'reinstall2', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '3'),
(3, 3, 4, 3, 'reinstall3', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '3'),
(4, 3, 4, 3, 'reinstall4', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '6'),
(5, 2, 5, 3, 'test', 'test', '09:00', '18:00', '2014-02-11', '3'),
(6, 2, 5, 3, 'test', 'test', '09:00', '18:00', '0000-00-00', '3'),
(7, 2, 5, 3, 'test', 'test', '09:00', '18:00', '1000-11-05', '3'),
(8, 1, 5, 3, 'Test23', 'des', '09h10', '10h10', '2013-11-05', '3'),
(9, 1, 4, 3, 'Test', 'intervention2', '09H10', '18H10', '2014-02-05', '3'),
(10, 1, 4, 3, 'ezr', 'er', 'qsd', 'qsd', '2014-02-05', '3');

-- --------------------------------------------------------

--
-- Structure de la table `LIBELLE`
--

CREATE TABLE `LIBELLE` (
  `LIB_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `LIB_LIBELLE` char(40) DEFAULT NULL,
  `LIB_TYPE` char(20) DEFAULT NULL,
  PRIMARY KEY (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `LIBELLE`
--

INSERT INTO `LIBELLE` (`LIB_CODE`, `LIB_LIBELLE`, `LIB_TYPE`) VALUES
(4, 'Instalposte', 'interventiontype'),
(5, 'Instalimprim', 'interventiontype'),
(6, 'Site', 'incidenttype'),
(7, 'Atelier', 'incidenttype'),
(8, 'Hotline', 'incidenttype'),
(9, 'Achat', 'incidenttype'),
(10, 'Telemaintenance', 'incidenttype'),
(11, 'AchatPoints', 'interventiontype');

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
-- Structure de la table `URGENCE`
--

CREATE TABLE `URGENCE` (
  `URG_CODE` int(2) NOT NULL,
  `URG_LIBELLE` varchar(20) NOT NULL,
  PRIMARY KEY (`URG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `URGENCE`
--

INSERT INTO `URGENCE` (`URG_CODE`, `URG_LIBELLE`) VALUES
(1, 'Forte'),
(2, 'Normale'),
(3, 'Faible');

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
  `UTI_DESACTIVE` varchar(1) NOT NULL,
  PRIMARY KEY (`UTI_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `UTILISATEUR`
--

INSERT INTO `UTILISATEUR` (`UTI_CODE`, `UTI_LOGIN`, `UTI_PWD`, `UTI_NOM`, `UTI_PRENOM`, `UTI_MAIL`, `UTI_TELEPHONEFIXE`, `UTI_TELEPHONEMOBILE`, `UTI_DESACTIVE`) VALUES
(-1, '0', '356a192b7913b04c54574d18c28d46e6395428ab', '0', '0', '0', '0', '0', '0'),
(1, 'log1', '356a192b7913b04c54574d18c28d46e6395428ab', '1nom', '1prenom', '1mail', '1fixe', '1mobiled', '0'),
(2, 'log2', '356a192b7913b04c54574d18c28d46e6395428ab', '2nom', '2prenom', '2mail', '2fixe', '2mobile', '0'),
(3, 'log3', '356a192b7913b04c54574d18c28d46e6395428ab', '3nom', '3prenom', '3mail', '3fixe', '3mobile', '0'),
(4, 'log4', '356a192b7913b04c54574d18c28d46e6395428ab', '4nom', '4prenom', '4mail', '4fixe', '4mobile', '0'),
(5, 'log5', '356a192b7913b04c54574d18c28d46e6395428ab', '2nom', '2prenom', '2mail', '2fixe', '2mobile', '0'),
(6, 'log6', '356a192b7913b04c54574d18c28d46e6395428ab', '3nom', '3prenom', '3mail', '3fixe', '3mobile', '0'),
(7, 'm', '6b0d31c0d563223024da45691584643ac78c96e8', 'mmmm', 'mmmm', 'mmmm', 'mmmm', 'mmmm', '0'),
(8, 'p', '516b9783fca517eecbd1d064da2d165310b19759', 'p', 'p', 'p', 'p', 'p', '1'),
(9, 'm', '6b0d31c0d563223024da45691584643ac78c96e8', 'm', 'm', 'm', 'm', 'm', '1'),
(10, 'o', '7a81af3e591ac713f81ea1efe93dcf36157d8376', 'o', 'o', 'o', 'o', 'o', '1'),
(11, 'ii', '042dc4512fa3d391c5170cf3aa61e6a638f84342', 'i', 'ii', 'i', 'ii', 'i', '1');

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
  ADD CONSTRAINT `FK_URGENCE` FOREIGN KEY (`URG_CODE`) REFERENCES `URGENCE` (`URG_CODE`);

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
