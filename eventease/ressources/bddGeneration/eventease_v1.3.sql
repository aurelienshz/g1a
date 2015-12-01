-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 24 Novembre 2015 à 09:20
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

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
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` tinyint(3) UNSIGNED NOT NULL,
  `complement_numero` char(3) COLLATE utf8_bin NOT NULL,
  `rue` tinytext COLLATE utf8_bin NOT NULL,
  `code_postal` mediumint(8) UNSIGNED NOT NULL,
  `departement` smallint(6) NOT NULL,
  `ville` int(11) NOT NULL,
  `id_pays` tinytext COLLATE utf8_bin NOT NULL,
  `coordonnee_long` double NOT NULL,
  `coordonnee_larg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` tinyint(1) UNSIGNED NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_media` int(10) UNSIGNED NOT NULL,
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_membre` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `demande_aide`
--

CREATE TABLE `demande_aide` (
  `id` int(11) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `reponse` text,
  `id_modificateur` int(10) NOT NULL,
  `id_expediteur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `titre` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `fin` date NOT NULL,
  `duree` time NOT NULL,
  `confidentiel` tinyint(1) NOT NULL,
  `sur_invitation` tinyint(1) NOT NULL,
  `type_public` tinytext NOT NULL,
  `tarif` float UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `site` tinytext NOT NULL,
  `langue` tinyint(1) NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `id_adresse` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `réponse` text NOT NULL,
  `id_modificateur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(10) UNSIGNED NOT NULL,
  `acceptee` tinyint(1) NOT NULL,
  `intervalle_contact` int(10) UNSIGNED NOT NULL,
  `Notif_modification` tinyint(1) NOT NULL,
  `Notif_commentaire` tinyint(1) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` tinytext NOT NULL,
  `lien` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media_evenement`
--

CREATE TABLE `media_evenement` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_media` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `civilite` tinyint(1) DEFAULT NULL COMMENT '0 = ''M.''; 1=''Mme''',
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ddn` date DEFAULT NULL,
  `mail` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` char(8) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `moderateur` tinyint(1) NOT NULL DEFAULT '0',
  `langue` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = ''FR''; 1 = ''EN''',
  `id_photo` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `civilite`, `nom`, `prenom`, `ddn`, `mail`, `tel`, `description`, `moderateur`, `langue`, `id_photo`, `id_adresse`) VALUES
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo_membre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `confidentialite` tinyint(1) NOT NULL,
  `id_modificateur` int(10) UNSIGNED NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_topic` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organise`
--

CREATE TABLE `organise` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_organisateur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(10) UNSIGNED NOT NULL,
  `nom` tinytext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` tinytext NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` tinytext NOT NULL,
  `site` tinytext NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sponsorize`
--

CREATE TABLE `sponsorize` (
  `id_sponsor` int(10) UNSIGNED NOT NULL,
  `id_evenement` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

CREATE TABLE `suit` (
  `id_suiveur` int(10) UNSIGNED NOT NULL,
  `id_suivi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` tinytext NOT NULL,
  `vues` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_section` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_aide`
--
ALTER TABLE `demande_aide`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo_membre` (`pseudo_membre`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
