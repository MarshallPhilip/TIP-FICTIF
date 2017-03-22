-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 10:31
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
  `Nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `Prix` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `consommation`
--

INSERT INTO `consommation` (`ID`, `Nom`, `Prix`) VALUES
(1, 'Vin blanc NE', 10),
(2, 'Oeil de Perdrix', 15),
(3, 'Pinot Noir', 15),
(4, 'BiÃ¨re', 2.5),
(5, 'MinÃ©rale', 2),
(6, 'CafÃ© et ThÃ©', 2),
(7, 'Schnaps', 3),
(8, 'Whisky', 5),
(9, 'ApÃ©ro', 2.5),
(10, 'Snacks', 2.5),
(11, 'Fondue', 12);

-- --------------------------------------------------------

--
-- Structure de la table `consomme`
--

CREATE TABLE `consomme` (
  `IDConsomme` int(11) NOT NULL,
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

INSERT INTO `consomme` (`IDConsomme`, `User_ID`, `Consommation_ID`, `DateConsommation`, `Nombre`, `PrixVendu`, `Paye`) VALUES
(1, 5, 1, '08/03/2017', 3, NULL, 1),
(2, 5, 5, '08/03/2017', 2, NULL, 0),
(3, 5, 1, '08/03/2017', 1, NULL, 0),
(4, 5, 5, '08/03/2017', 11, NULL, 0),
(5, 5, 5, '08/03/2017', 1, NULL, 0),
(6, 5, 5, '08/03/2017', 39, NULL, 1),
(7, 5, 5, '08/03/2017', 1, NULL, 0),
(8, 5, 5, '08/03/2017', 1, NULL, 0),
(9, 3, 1, '08/03/2017', 4, NULL, 0),
(10, 3, 1, '08/03/2017', 7, NULL, 0),
(11, 3, 5, '08/03/2017', 1, NULL, 1),
(12, 4, 1, '08/03/2017', 1, NULL, 0),
(13, 4, 6, '08/03/2017', 1, NULL, 0),
(14, 4, 11, '08/03/2017', 8, NULL, 0),
(15, 4, 15, '08/03/2017', 3, NULL, 0),
(16, 4, 18, '08/03/2017', 3, NULL, 0),
(17, 1, 1, '13/03/2017', 5, NULL, 1),
(18, 1, 5, '13/03/2017', 11, NULL, 0),
(19, 3, 1, '13/03/2017', 5, NULL, 1),
(20, 1, 10, '13/03/2017', 5, NULL, 0),
(21, 1, 17, '13/03/2017', 5, NULL, 0),
(22, 1, 22, '13/03/2017', 2, NULL, 0),
(23, 1, 1, '14/03/2017', 1, NULL, 0),
(24, 1, 4, '14/03/2017', 10, NULL, 0),
(25, 1, 6, '14/03/2017', 3, NULL, 0),
(26, 1, 11, '14/03/2017', 2, NULL, 0),
(27, 1, 1, '15/03/2017', 3, NULL, 0),
(28, 1, 3, '15/03/2017', 8, NULL, 0),
(29, 1, 5, '15/03/2017', 2, NULL, 0),
(30, 1, 9, '15/03/2017', 4, NULL, 0),
(31, 1, 5, '15/03/2017', 1, NULL, 0),
(32, 1, 1, '15/03/2017', 1, NULL, 0),
(33, 13, 1, '15/03/2017', 3, NULL, 0),
(34, 1, 5, '20/03/2017', 2, NULL, 0),
(35, 12, 1, '20/03/2017', 3, NULL, 0),
(36, 12, 9, '20/03/2017', 1, NULL, 0),
(37, 1, 5, '20/03/2017', 1, NULL, 0),
(38, 4, 5, '21/03/2017', 3, NULL, 0),
(39, 2, 2, '21/03/2017', 2, NULL, 0),
(40, 2, 5, '21/03/2017', 3, NULL, 0),
(41, 2, 7, '21/03/2017', 2, NULL, 0);

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
(2, 'Young', 'Angus', '0022', 'cai'),
(3, 'Satriani', 'Joe', '0003', 'emp'),
(4, 'Smith', 'Adrian', '0004', 'emp'),
(5, 'Punchline', 'Jimmy', '0005', 'cai'),
(12, 'Senders', 'Joaquim', '0006', 'emp'),
(13, 'rgfr', 'rgrg', '1010', 'emp'),
(14, 'rgrg', 'grgr', '0008', 'cai');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `consomme`
--
ALTER TABLE `consomme`
  ADD PRIMARY KEY (`IDConsomme`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `consomme`
--
ALTER TABLE `consomme`
  MODIFY `IDConsomme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
