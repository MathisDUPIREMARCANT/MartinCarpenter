-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 05 juin 2023 à 09:21
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `martin`
--

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `number` int(16) NOT NULL,
  `path` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `difficulty` enum('Easy','Medium','Hard','Extreme') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `score` int(16) NOT NULL,
  `progression` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `score`, `progression`) VALUES
('a', 'a@junia.com', '$2y$10$tnDaFVzHb7bMbHv9/BAotejbnJqQCQ8EIC81rzqU/.8aVsRU5hr7i', 1000, 0),
('dada', 'dada@student.junia.com', 'dada', 400, 5),
('juju', 'juliette.saint-maxent@student.junia.com', '$2y$10$pgvnBaLxcTP3ZgwFoftJSe9yzgUo3QtwtGQIQTHZYj3tCaJsOTQOm', 0, 0),
('salut', 's@student.junia.com', 'salut', 50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users_level`
--

CREATE TABLE `users_level` (
  `number` int(11) NOT NULL,
  `path` text NOT NULL,
  `islands` int(8) NOT NULL,
  `rows` int(8) NOT NULL,
  `colls` int(8) NOT NULL,
  `difficulty` int(8) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_level`
--

INSERT INTO `users_level` (`number`, `path`, `islands`, `rows`, `colls`, `difficulty`, `user`) VALUES
(5, '***********2***1**********3*****4***************4*******4****6**************************************', 7, 10, 10, 71, 'a'),
(6, '******11**********2343*********4**********', 7, 7, 6, 30, 'a');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Index pour la table `users_level`
--
ALTER TABLE `users_level`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users_level`
--
ALTER TABLE `users_level`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
