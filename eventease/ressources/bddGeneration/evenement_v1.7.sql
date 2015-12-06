-- phpMyAdmin SQL Dump
-- version 4.5.2deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 06 Décembre 2015 à 20:11
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `eventease`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(50) NOT NULL,
  `debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fin` timestamp NULL DEFAULT NULL,
  `journee_entiere` tinyint(1) NOT NULL DEFAULT '0',
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `confidentiel` tinyint(1) NOT NULL DEFAULT '0',
  `sur_invitation` tinyint(4) NOT NULL DEFAULT '0',
  `tarif` float UNSIGNED DEFAULT NULL,
  `description` text NOT NULL,
  `site` tinytext,
  `langue` tinyint(1) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `journee_entiere`, `age_min`, `age_max`, `confidentiel`, `sur_invitation`, `tarif`, `description`, `site`, `langue`, `id_type`, `id_adresse`) VALUES
(1, 'Concert Johnny Haliday', '2015-12-29 20:00:00', '2015-12-29 22:00:00', 0, NULL, NULL, 0, 0, 50, 'Concert de Johnny Haliday à l''occasion de la sortie de son album! Prenez vos places dès maintenant', 'www.zenith-paris.com/', NULL, 1, 0),
(2, 'Cours de Zumba', '2016-01-22 16:00:00', '2015-12-22 17:00:00', 1, NULL, NULL, 0, 0, NULL, 'Lorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olrem', NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
