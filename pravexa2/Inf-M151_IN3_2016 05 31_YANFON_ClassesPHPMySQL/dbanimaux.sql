-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mai 2016 à 11:39
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19
CREATE DATABASE dbanimaux;
use dbanimaux;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbanimaux`
--

-- --------------------------------------------------------

--
-- Structure de la table `tblanimal`
--

CREATE TABLE `tblanimal` (
  `aniID` int(11) NOT NULL,
  `tblEspece_espID` int(11) NOT NULL,
  `aniNom` varchar(255) NOT NULL,
  `aniNomScient` varchar(255) NOT NULL,
  `aniNbPattes` int(11) NOT NULL
) ENGINE=InnoDB ;

-- --------------------------------------------------------

--
-- Structure de la table `tblespece`
--

CREATE TABLE `tblespece` (
  `espID` int(11) NOT NULL,
  `espNom` varchar(255) NOT NULL,
  `espEstActive` int(11) NOT NULL
) ENGINE=InnoDB ;

--
-- Contenu de la table `tblespece`
--

INSERT INTO `tblespece` (`espID`, `espNom`, `espEstActive`) VALUES
(1, 'Mammifères', 1),
(2, 'Dinosaures', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tblanimal`
--
ALTER TABLE `tblanimal`
  ADD PRIMARY KEY (`aniID`);

--
-- Index pour la table `tblespece`
--
ALTER TABLE `tblespece`
  ADD PRIMARY KEY (`espID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tblanimal`
--
ALTER TABLE `tblanimal`
  MODIFY `aniID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tblespece`
--
ALTER TABLE `tblespece`
  MODIFY `espID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
