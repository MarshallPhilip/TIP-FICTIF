-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Mars 2017 à 10:05
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpi-fictif`
--

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE `consommation` (
  `ID` int(11) NOT NULL,
  `Nom` text COLLATE utf8_bin NOT NULL,
  `Prix` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `consommation`
--

INSERT INTO `consommation` (`ID`, `Nom`, `Prix`) VALUES
(1, 'Vin blanc NE', 10),
(2, 'Oeil de Perdrix', 15),
(3, 'Pinot Noir', 15),
(4, 'Bière', 2.5),
(5, 'Minérale', 2),
(6, 'Café et Thé', 2),
(7, 'Schnaps', 3),
(8, 'Whisky 4cl', 5),
(9, 'Apéro', 2.5),
(10, 'Snacks', 2.5),
(11, 'Fondue', 12),
(12, 'Vin blanc NE', 10),
(13, 'Oeil de Perdrix', 15),
(14, 'Pinot Noir', 15),
(15, 'Bière', 2.5),
(16, 'Minérale', 2),
(17, 'Café et Thé', 2),
(18, 'Schnaps', 3),
(19, 'Whisky 4cl', 5),
(20, 'Apéro', 2.5),
(21, 'Snacks', 2.5),
(22, 'Fondue', 12);

-- --------------------------------------------------------

--
-- Structure de la table `consomme`
--

CREATE TABLE `consomme` (
  `User_ID` int(11) NOT NULL,
  `Consommation_ID` int(11) NOT NULL,
  `DateConsommation` text COLLATE utf8_bin NOT NULL,
  `Nombre` int(11) NOT NULL,
  `PrixVendu` double DEFAULT NULL,
  `Paye` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `consomme`
--

INSERT INTO `consomme` (`User_ID`, `Consommation_ID`, `DateConsommation`, `Nombre`, `PrixVendu`, `Paye`) VALUES
(5, 1, '08/03/2017', 3, NULL, 0),
(5, 5, '08/03/2017', 2, NULL, 0),
(5, 1, '08/03/2017', 1, NULL, 0),
(5, 5, '08/03/2017', 11, NULL, 0),
(5, 5, '08/03/2017', 1, NULL, 0),
(5, 5, '08/03/2017', 1, NULL, 0),
(5, 5, '08/03/2017', 1, NULL, 0),
(5, 5, '08/03/2017', 1, NULL, 0),
(3, 1, '08/03/2017', 3, NULL, 0),
(3, 1, '08/03/2017', 2, NULL, 0),
(3, 5, '08/03/2017', 2, NULL, 0),
(4, 1, '08/03/2017', 1, NULL, 0),
(4, 6, '08/03/2017', 1, NULL, 0),
(4, 11, '08/03/2017', 3, NULL, 0),
(4, 15, '08/03/2017', 3, NULL, 0),
(4, 18, '08/03/2017', 3, NULL, 0),
(1, 1, '13/03/2017', 2, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Nom` text COLLATE utf8_bin NOT NULL,
  `Prenom` text COLLATE utf8_bin NOT NULL,
  `Badge` text COLLATE utf8_bin NOT NULL,
  `Statut` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`ID`, `Nom`, `Prenom`, `Badge`, `Statut`) VALUES
(1, 'Marshall', 'Philip', '0001', 'sup'),
(2, 'Young', 'Angus', '0002', 'cai'),
(3, 'Satriani', 'Joe', '0003', 'emp'),
(4, 'Smith', 'Adrian', '0004', 'emp'),
(5, 'Hendrix', 'Jimmy', '0005', 'emp'),
(6, 'Senders', 'Joaquim', '0006', 'emp');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
