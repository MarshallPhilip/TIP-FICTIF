-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 22 Mars 2017 à 07:59
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
(19, 'DAFESWFEWGFEWF', 'FEEWFEGF', '0011', 'cai');

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
  MODIFY `IDConsomme` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
