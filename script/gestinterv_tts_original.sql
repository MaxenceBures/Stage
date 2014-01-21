-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 20 Janvier 2014 à 16:16
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gestinterv_tts`
--
CREATE DATABASE IF NOT EXISTS `gestinterv_tts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestinterv_tts`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `Cat_Code` int(2) NOT NULL,
  `Cat_Libelle` varchar(30) NOT NULL,
  `Cat_Aide` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Cat_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`Cat_Code`, `Cat_Libelle`, `Cat_Aide`) VALUES
(1, 'Réseau', 'DHCP, IP, Connexion, routage'),
(2, 'Matériel', 'Composant, Imprimante, ordinateur'),
(3, 'Système', 'Pilote, Système d''exploitation'),
(4, 'Logiciel', 'Virus, Application, Bureautique'),
(5, 'Droits', 'Refus, suppression impossible'),
(6, 'Mécanique', 'défaillance de pièce, rupture de courroie'),
(7, 'Electrique', 'Panne d''alimentation, surtension'),
(8, 'Climatisation', 'Surchauffe, humidité, température'),
(9, 'Autres', 'Tout ce qui n''appartient pas aux autres catégorie, problème non identifiable');

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `Eta_Code` int(2) NOT NULL,
  `Eta_Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`Eta_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`Eta_Code`, `Eta_Libelle`) VALUES
(1, 'Déclaré'),
(2, 'Affecté'),
(3, 'Pris en charge'),
(4, 'En cours'),
(5, 'En attente'),
(6, 'Résolu'),
(7, 'Sans Solution'),
(8, 'Clôturé');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `Int_Num` int(11) NOT NULL,
  `Int_Ticket` int(11) NOT NULL,
  `Int_Debut` date NOT NULL,
  `Int_Fin` date DEFAULT NULL,
  `Int_Taches` text,
  PRIMARY KEY (`Int_Num`),
  KEY `TICKET_INTERVENTION` (`Int_Ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `Mat_Code` char(7) NOT NULL,
  `Mat_Libelle` varchar(35) NOT NULL,
  PRIMARY KEY (`Mat_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`Mat_Code`, `Mat_Libelle`) VALUES
('ACH-001', ''),
('ACH-002', ''),
('CTA-001', 'IMPRIMANTE'),
('CTA-002', 'ORDINATEUR'),
('DIR-001', ''),
('DIR-002', ''),
('GES-001', 'IMPRIMANTE'),
('GES-002', 'ORDINATEUR'),
('GRH-001', 'ECRAN'),
('GRH-002', ''),
('LOG-001', ''),
('LOG-002', ''),
('MTN-001', ''),
('MTN-002', ''),
('PRD-001', ''),
('PRD-002', ''),
('STK-001', ''),
('STK-002', '');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `Sal_Num` char(4) NOT NULL,
  `Sal_Type` char(1) NOT NULL,
  PRIMARY KEY (`Sal_Num`),
  KEY `SALLE_TYPESALLE` (`Sal_Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`Sal_Num`, `Sal_Type`) VALUES
('A001', 'A'),
('A002', 'A'),
('B001', 'B'),
('B002', 'B'),
('B003', 'B'),
('B004', 'B'),
('L001', 'L'),
('L002', 'L');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `Ser_Code` char(3) NOT NULL,
  `Ser_Libelle` varchar(40) NOT NULL,
  PRIMARY KEY (`Ser_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`Ser_Code`, `Ser_Libelle`) VALUES
('ACH', 'SERVICE DES ACHATS'),
('CTA', 'SERVICE COMPTABLE'),
('DIR', 'DIRECTION'),
('GES', 'SERVICE GESTION'),
('GRH', 'GESTION DES RESSOURCES HUMAINES'),
('LOG', 'SERVICE LOGISTIQUE'),
('MTN', 'SERVICE MAINTENANCE'),
('PRD', 'SERVICE PRODUCTION'),
('STK', 'GESTION DES STOCKS');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `Tic_Num` int(11) NOT NULL,
  `Tic_Salle` char(4) NOT NULL,
  `Tic_Categorie` int(2) NOT NULL,
  `Tic_Materiel` char(7) NOT NULL,
  `Tic_DatCre` date NOT NULL,
  `Tic_Etat` int(2) NOT NULL,
  `Tic_Demandeur` int(5) NOT NULL,
  `Tic_Constat` text NOT NULL,
  `Tic_Intervenant` int(5) DEFAULT NULL,
  `Tic_DatClos` date DEFAULT NULL,
  PRIMARY KEY (`Tic_Num`),
  KEY `TICKET_SALLE` (`Tic_Salle`),
  KEY `TICKET_MATERIEL` (`Tic_Materiel`),
  KEY `TICKET_CATEGORIE` (`Tic_Categorie`),
  KEY `TICKET_DEMANDEUR` (`Tic_Demandeur`),
  KEY `TICKET_INTERVENANT` (`Tic_Intervenant`),
  KEY `TICKET_ETAT` (`Tic_Etat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`Tic_Num`, `Tic_Salle`, `Tic_Categorie`, `Tic_Materiel`, `Tic_DatCre`, `Tic_Etat`, `Tic_Demandeur`, `Tic_Constat`, `Tic_Intervenant`, `Tic_DatClos`) VALUES
(1, 'A001', 6, 'GES-002', '2013-12-18', 2, 4, 'test', 4, NULL),
(2, 'A001', 1, 'ACH-001', '2014-01-16', 2, 4, 'fbfcb', 4, NULL),
(3, 'A001', 1, 'ACH-001', '2014-01-16', 1, 1, 'rdgthfg', 3, NULL),
(4, 'A001', 1, 'ACH-001', '2014-01-16', 2, 4, 'Jfjfjfjf', 3, NULL),
(5, 'A001', 1, 'ACH-001', '2014-01-16', 1, 1, 'qsdfgh', NULL, NULL),
(6, 'B003', 2, 'GRH-001', '2014-01-16', 1, 4, 'test', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `typesalle`
--

CREATE TABLE IF NOT EXISTS `typesalle` (
  `TypS_Code` char(1) NOT NULL,
  `TypS_Libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`TypS_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `typesalle`
--

INSERT INTO `typesalle` (`TypS_Code`, `TypS_Libelle`) VALUES
('A', 'ATELIER'),
('B', 'BUREAU'),
('L', 'LOCAL');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Uti_Code` int(5) NOT NULL,
  `Uti_Login` varchar(30) NOT NULL,
  `Uti_Mdp` varchar(15) NOT NULL,
  `Uti_Nom` varchar(30) NOT NULL,
  `Uti_Prenom` varchar(30) NOT NULL,
  `Uti_fonction` varchar(30) NOT NULL,
  `Uti_Desactive` int(1) NOT NULL,
  PRIMARY KEY (`Uti_Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Uti_Code`, `Uti_Login`, `Uti_Mdp`, `Uti_Nom`, `Uti_Prenom`, `Uti_fonction`, `Uti_Desactive`) VALUES
(1, 'clevert', 'mp', 'LEVERT', 'Chantal', 'Demandeur', 0),
(2, 'sguerinet', 'mp', 'GUERINET', 'Serge', 'Intervenant', 0),
(3, 'cmailhe', 'mp', 'MAILHE', 'Patrick', 'Intervenant', 0),
(4, 'gbrisse', 'mp', 'BRISSE', 'GUY', 'Responsable', 0),
(5, 'test', 'mp', 'test', 'test', 'Demandeur', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `TICKET_INTERVENTION` FOREIGN KEY (`Int_Ticket`) REFERENCES `ticket` (`Tic_Num`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `SALLE_TYPESALLE` FOREIGN KEY (`Sal_Type`) REFERENCES `typesalle` (`TypS_Code`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `TICKET_CATEGORIE` FOREIGN KEY (`Tic_Categorie`) REFERENCES `categorie` (`Cat_Code`),
  ADD CONSTRAINT `TICKET_DEMANDEUR` FOREIGN KEY (`Tic_Demandeur`) REFERENCES `utilisateur` (`Uti_Code`),
  ADD CONSTRAINT `TICKET_ETAT` FOREIGN KEY (`Tic_Etat`) REFERENCES `etat` (`Eta_Code`),
  ADD CONSTRAINT `TICKET_INTERVENANT` FOREIGN KEY (`Tic_Intervenant`) REFERENCES `utilisateur` (`Uti_Code`),
  ADD CONSTRAINT `TICKET_MATERIEL` FOREIGN KEY (`Tic_Materiel`) REFERENCES `materiel` (`Mat_Code`),
  ADD CONSTRAINT `TICKET_SALLE` FOREIGN KEY (`Tic_Salle`) REFERENCES `salle` (`Sal_Num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
