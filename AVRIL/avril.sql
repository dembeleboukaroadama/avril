-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 23 avr. 2019 à 00:45
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avril`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

CREATE TABLE `acheteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `article` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`id`, `nom`, `prenom`, `numero`, `article`) VALUES
(3, 'damo', 'kader', '85247361', 'Maison en pallets'),
(4, 'Martin', 'Lutter King', '55698741', 'Maison de un ravin'),
(5, 'Peter', 'Patttern', '57585960', 'Maison de un ravin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `numero` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `concepteur` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numero`, `nom`, `concepteur`, `photo`) VALUES
(5, 'Maison en pallets', 'John De Lamartin', 'images(2).jpg'),
(6, 'Maison de un ravin', 'Peter Crouch', 'images(4).jpg'),
(8, 'Maison Ã  plusieurs piÃ¨ces', 'Philipe Kalan', 'images(2).png');

-- --------------------------------------------------------

--
-- Structure de la table `concepteur`
--

CREATE TABLE `concepteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `numero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `concepteur`
--

INSERT INTO `concepteur` (`id`, `nom`, `prenom`, `numero`) VALUES
(5, 'John', 'De Lamartin', '55803146'),
(6, 'Peter', 'Crouch', '55555555'),
(7, 'Philipe', 'Kalan', '57585960');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_ach` (`id`),
  ADD KEY `article` (`article`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `id_a` (`numero`),
  ADD KEY `numero` (`numero`),
  ADD KEY `numero_2` (`numero`),
  ADD KEY `numero_3` (`numero`),
  ADD KEY `numero_4` (`numero`),
  ADD KEY `concepteur` (`concepteur`);

--
-- Index pour la table `concepteur`
--
ALTER TABLE `concepteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_conc` (`id`),
  ADD KEY `ind_ac` (`prenom`),
  ADD KEY `ind_n` (`nom`,`id`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acheteur`
--
ALTER TABLE `acheteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `concepteur`
--
ALTER TABLE `concepteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
