-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2014 at 05:52 PM
-- Server version: 5.5.33
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stage`
--

-- --------------------------------------------------------

--
-- Table structure for table `ENTREPRISE`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ENTREPRISE`
--

INSERT INTO `ENTREPRISE` (`ENT_CODE`, `ENT_RAISONSOCIALE`, `ENT_POINTS`, `ENT_HEURES`, `ENT_RUE`, `ENT_CP`, `ENT_VILLE`, `ENT_MAIL`, `ENT_TELEPHONE`, `ENT_SITEWEB`) VALUES
(-1, 'Particulier', 0, 0, 'test', '10000', 'test', 'test', '0100000000', 'test'),
(1, 'RaisonSocial1', 0, 0, 'RueTest1', '10000', 'VilleTest1', 'MailTest1', '0100000000', 'sitewebtest1'),
(2, 'RaisonSocial2', 0, 0, 'RueTest2', '10000', 'VilleTest2', 'MailTest2', '0100000000', 'sitewebtest2'),
(3, 'test', 0, 0, 'testz', '10000', 'testz', 'testz', '0100000000', 'testz'),
(4, 'test', 0, 0, 'testz', '10000', 'testz', 'testz', '0100000000', 'testz');

-- --------------------------------------------------------

--
-- Table structure for table `ETAT`
--

CREATE TABLE `ETAT` (
  `ETA_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `ETA_LIBELLE` char(40) DEFAULT NULL,
  PRIMARY KEY (`ETA_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ETAT`
--

INSERT INTO `ETAT` (`ETA_CODE`, `ETA_LIBELLE`) VALUES
(1, 'En Cours'),
(2, 'En Attente'),
(3, 'Resolu'),
(4, 'Sans Solution'),
(5, 'Cloturé');

-- --------------------------------------------------------

--
-- Table structure for table `ID`
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
-- Dumping data for table `ID`
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
-- Table structure for table `INCIDENT`
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
  PRIMARY KEY (`INC_CODE`),
  KEY `FK_DEMANDE` (`UTI_CODE`),
  KEY `FK_DISPOSE2` (`ETA_CODE`),
  KEY `FK_SOUMET` (`ENT_CODE`),
  KEY `FK_URGENCE` (`URG_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `INCIDENT`
--

INSERT INTO `INCIDENT` (`INC_CODE`, `URG_CODE`, `UTI_CODE`, `ENT_CODE`, `ETA_CODE`, `INC_LIBELLE`, `INC_DESCRIPTION`, `INC_DATEDEMANDE`, `INC_DECOMPTE`, `INC_VALIDATION`, `INC_DEMANDE`, `INC_TYPE`, `INC_DATECLOTURE`) VALUES
(1, 1, 1, 1, 1, 'Test', 'Test incident', '2014-02-05', 0, 0, '1', 6, '0000-00-00'),
(2, 1, 1, 1, 1, 'Test2', 'Test2 incident', '2014-02-10', 0, 0, '1', 7, '0000-00-00'),
(3, 1, 2, 1, 1, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '2', 6, '0000-00-00'),
(4, 1, 2, 1, 2, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '1', 6, '0000-00-00'),
(5, 2, 1, 1, 2, 'res', 'test', '2014-02-10', NULL, NULL, '2', 7, '0000-00-00'),
(6, 2, 1, 1, 3, '12', 'test', '2014-02-05', 0, 0, '1', 7, '0000-00-00'),
(7, 1, 1, 1, 3, '', '', '2014-02-10', 0, 0, '1', 6, '0000-00-00'),
(8, 1, 1, 1, 1, 'tt', 'tt', '2014-02-10', 0, 0, '1', 6, '0000-00-00'),
(9, 1, 1, 1, 1, 'tt', 'tt', '2014-02-10', 0, 0, '3', 6, '0000-00-00'),
(10, 1, 2, 1, 2, 'Test3', 'Test3 incident log2\r\n', '2014-02-10', 0, 0, '1', 7, '0000-00-00'),
(11, 2, 2, 1, 1, 'TEST', 'TEST', '2014-02-12', 0, 0, '2', 6, '0000-00-00'),
(12, 3, 3, 2, 1, 'zeze', 'zezezeazeaze', '2014-02-12', 0, 0, '3', 8, '0000-00-00'),
(13, 3, 3, 2, 1, 'rtd', 'tf', '2014-02-12', 0, 0, '3', 10, '0000-00-00'),
(14, 3, 4, 1, 1, 'Test', 'Test\r\n', '2014-02-12', 0, 0, '3', 8, '0000-00-00'),
(15, 2, 1, 1, 1, 'ttt', 'ttt', '2014-02-13', 0, 0, '3', 7, '0000-00-00'),
(16, 3, 5, 1, 1, 'd', 'd', '2014-02-13', 0, 0, '3', 6, '0000-00-00'),
(17, 1, 5, 1, 1, 'h', '', '2014-02-13', 0, 0, '3', 6, '0000-00-00'),
(18, 2, 5, 1, 1, 't', 't', '2014-02-13', 0, 0, '5', 7, '0000-00-00'),
(19, 1, 5, 1, 1, 'i', 'i', '2014-02-13', 0, 0, '5', 6, '0000-00-00'),
(20, 2, 2, 1, 1, 'm', 'm', '2014-02-14', 0, 0, '1', 6, '0000-00-00'),
(21, 1, 2, 1, 1, 'b', 'ze', '2014-02-14', 0, 0, '1', 7, '0000-00-00'),
(22, 1, 2, 1, 1, 'b', 'dfghjk', '2014-02-14', 0, 0, '1', 6, '0000-00-00'),
(23, 3, 5, 1, 1, 'm', 'm', '2014-02-14', 0, 0, '5', 8, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `INTERVENTION`
--

CREATE TABLE `INTERVENTION` (
  `INT_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `INC_CODE` int(11) NOT NULL,
  `LIB_CODE` int(11) NOT NULL,
  `UTI_CODE` int(11) NOT NULL,
  `INT_LIBELLE` char(40) DEFAULT NULL,
  `INT_DESCRIPTION` char(200) DEFAULT NULL,
  `INT_HEUREDEB` varchar(8) DEFAULT NULL,
  `INT_HEUREFIN` varchar(8) DEFAULT NULL,
  `INT_DATEINTER` date DEFAULT NULL,
  `INT_TECHNICIEN` varchar(2) NOT NULL,
  PRIMARY KEY (`INT_CODE`),
  KEY `FK_DISPOSE` (`INC_CODE`),
  KEY `FK_INTERVIENT` (`UTI_CODE`),
  KEY `FK_TYPE` (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `INTERVENTION`
--

INSERT INTO `INTERVENTION` (`INT_CODE`, `INC_CODE`, `LIB_CODE`, `UTI_CODE`, `INT_LIBELLE`, `INT_DESCRIPTION`, `INT_HEUREDEB`, `INT_HEUREFIN`, `INT_DATEINTER`, `INT_TECHNICIEN`) VALUES
(1, 1, 4, 3, 'reinstall', 'reinstall', '09:15:00', '18:00:00', '2014-02-05', '3'),
(2, 1, 4, 3, 'reinstall2', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '3'),
(3, 3, 4, 3, 'reinstall3', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '3'),
(4, 3, 4, 3, 'reinstall4', 'reinstall', '09:15:00', '18:00:00', '2014-02-06', '6'),
(5, 2, 5, 3, 'test', 'test', '11/11/10', '09:00', '0000-00-00', '3'),
(6, 2, 5, 3, 'test', 'test', '09:00', '18:00', '0000-00-00', '3'),
(7, 2, 5, 3, 'test', 'test', '09:00', '18:00', '1000-11-05', '3'),
(8, 1, 5, 3, 'Test23', 'des', '09h10', '10h10', '2013-11-05', '3');

-- --------------------------------------------------------

--
-- Table structure for table `LIBELLE`
--

CREATE TABLE `LIBELLE` (
  `LIB_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `LIB_LIBELLE` char(40) DEFAULT NULL,
  `LIB_TYPE` char(20) DEFAULT NULL,
  PRIMARY KEY (`LIB_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `LIBELLE`
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
-- Table structure for table `ROLE`
--

CREATE TABLE `ROLE` (
  `ROL_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `ROL_LIBELLE` char(20) DEFAULT NULL,
  PRIMARY KEY (`ROL_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ROLE`
--

INSERT INTO `ROLE` (`ROL_CODE`, `ROL_LIBELLE`) VALUES
(1, 'utilisateur'),
(2, 'responsablecli'),
(3, 'intervenant'),
(4, 'responsableint');

-- --------------------------------------------------------

--
-- Table structure for table `URGENCE`
--

CREATE TABLE `URGENCE` (
  `URG_CODE` int(2) NOT NULL,
  `URG_LIBELLE` varchar(20) NOT NULL,
  PRIMARY KEY (`URG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `URGENCE`
--

INSERT INTO `URGENCE` (`URG_CODE`, `URG_LIBELLE`) VALUES
(1, 'Forte'),
(2, 'Normale'),
(3, 'Faible');

-- --------------------------------------------------------

--
-- Table structure for table `UTILISATEUR`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `UTILISATEUR`
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
(8, 'p', '516b9783fca517eecbd1d064da2d165310b19759', 'p', 'p', 'p', 'p', 'p', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ID`
--
ALTER TABLE `ID`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`ENT_CODE`) REFERENCES `ENTREPRISE` (`ENT_CODE`),
  ADD CONSTRAINT `FK_ID2` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_ID3` FOREIGN KEY (`ROL_CODE`) REFERENCES `ROLE` (`ROL_CODE`);

--
-- Constraints for table `INCIDENT`
--
ALTER TABLE `INCIDENT`
  ADD CONSTRAINT `FK_DEMANDE` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_DISPOSE2` FOREIGN KEY (`ETA_CODE`) REFERENCES `ETAT` (`ETA_CODE`),
  ADD CONSTRAINT `FK_SOUMET` FOREIGN KEY (`ENT_CODE`) REFERENCES `ENTREPRISE` (`ENT_CODE`),
  ADD CONSTRAINT `FK_URGENCE` FOREIGN KEY (`URG_CODE`) REFERENCES `URGENCE` (`URG_CODE`);

--
-- Constraints for table `INTERVENTION`
--
ALTER TABLE `INTERVENTION`
  ADD CONSTRAINT `FK_DISPOSE` FOREIGN KEY (`INC_CODE`) REFERENCES `INCIDENT` (`INC_CODE`),
  ADD CONSTRAINT `FK_INTERVIENT` FOREIGN KEY (`UTI_CODE`) REFERENCES `UTILISATEUR` (`UTI_CODE`),
  ADD CONSTRAINT `FK_TYPE` FOREIGN KEY (`LIB_CODE`) REFERENCES `LIBELLE` (`LIB_CODE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
