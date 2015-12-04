-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 04 Décembre 2015 à 14:20
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `eventease`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
`id` int(10) unsigned NOT NULL,
  `numero` tinyint(3) unsigned NOT NULL,
  `complement_numero` char(3) COLLATE utf8_bin NOT NULL,
  `rue` tinytext COLLATE utf8_bin NOT NULL,
  `code_postal` mediumint(8) unsigned NOT NULL,
  `departement` smallint(6) NOT NULL,
  `ville` int(11) NOT NULL,
  `id_pays` tinytext COLLATE utf8_bin NOT NULL,
  `coordonnee_long` double NOT NULL,
  `coordonnee_larg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `bddversion`
--

CREATE TABLE IF NOT EXISTS `bddversion` (
  `id` tinyint(4) NOT NULL,
  `version` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bddversion`
--

INSERT INTO `bddversion` (`id`, `version`) VALUES
(0, '1.5');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
`id` int(10) unsigned NOT NULL,
  `note` tinyint(1) unsigned NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_media` int(10) unsigned NOT NULL,
  `id_evenement` int(10) unsigned NOT NULL,
  `id_membre` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `demande_aide`
--

CREATE TABLE IF NOT EXISTS `demande_aide` (
`id` int(10) unsigned NOT NULL,
  `contenu` text NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `reponse` text,
  `id_modificateur` int(10) NOT NULL,
  `id_expediteur` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
`id` int(10) unsigned NOT NULL,
  `titre` varchar(50) NOT NULL,
  `debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fin` timestamp NULL DEFAULT NULL,
  `journee_entiere` tinyint(1) NOT NULL DEFAULT '0',
  `confidentiel` tinyint(1) NOT NULL DEFAULT '0',
  `sur_invitation` tinyint(4) NOT NULL DEFAULT '0',
  `type_public` tinytext,
  `tarif` float unsigned DEFAULT NULL,
  `description` text NOT NULL,
  `site` tinytext,
  `langue` tinyint(1) DEFAULT NULL,
  `id_type` int(10) unsigned DEFAULT NULL,
  `id_adresse` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `journee_entiere`, `confidentiel`, `sur_invitation`, `type_public`, `tarif`, `description`, `site`, `langue`, `id_type`, `id_adresse`) VALUES
(1, 'Concert Johnny Haliday', '2015-12-29 20:00:00', '2015-12-29 22:00:00', 0, 0, 0, NULL, 50, 'Concert de Johnny Haliday à l''occasion de la sortie de son album! Prenez vos places dès maintenant', 'www.zenith-paris.com/', NULL, 1, 0),
(2, 'Cours de Zumba', '2016-01-22 16:00:00', '2015-12-22 17:00:00', 1, 0, 0, NULL, NULL, 'Lorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olremLorem ipsum ispum olrem', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`id` int(10) unsigned NOT NULL,
  `question` text NOT NULL,
  `réponse` text NOT NULL,
  `id_modificateur` int(10) unsigned NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE IF NOT EXISTS `invitation` (
`id` int(10) unsigned NOT NULL,
  `acceptee` tinyint(1) NOT NULL,
  `intervalle_contact` int(10) unsigned NOT NULL,
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

CREATE TABLE IF NOT EXISTS `media` (
`id` int(10) unsigned NOT NULL,
  `nom` tinytext NOT NULL,
  `lien` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media_evenement`
--

CREATE TABLE IF NOT EXISTS `media_evenement` (
  `id_evenement` int(10) unsigned NOT NULL,
  `id_media` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
`id` int(10) unsigned NOT NULL,
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
  `id_photo` int(10) unsigned DEFAULT NULL,
  `id_adresse` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `civilite`, `nom`, `prenom`, `ddn`, `mail`, `tel`, `description`, `moderateur`, `langue`, `id_photo`, `id_adresse`) VALUES
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(10) unsigned NOT NULL,
  `pseudo_membre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `confidentialite` tinyint(1) NOT NULL,
  `id_modificateur` int(10) unsigned NOT NULL,
  `id_auteur` int(10) unsigned NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_topic` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `organise`
--

CREATE TABLE IF NOT EXISTS `organise` (
  `id_evenement` int(10) unsigned NOT NULL,
  `id_organisateur` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(10) unsigned NOT NULL,
  `nom` tinytext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`id` int(10) unsigned NOT NULL,
  `titre` tinytext NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
`id` int(10) unsigned NOT NULL,
  `nom` tinytext NOT NULL,
  `site` tinytext NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sponsorize`
--

CREATE TABLE IF NOT EXISTS `sponsorize` (
  `id_sponsor` int(10) unsigned NOT NULL,
  `id_evenement` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

CREATE TABLE IF NOT EXISTS `suit` (
  `id_suiveur` int(10) unsigned NOT NULL,
  `id_suivi` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
`id` int(10) unsigned NOT NULL,
  `titre` tinytext NOT NULL,
  `vues` int(10) unsigned NOT NULL DEFAULT '0',
  `id_section` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`id` int(10) unsigned NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'Pique-Nique'),
(2, 'Concert'),
(3, 'Rave party'),
(4, 'Messe noire'),
(5, 'Sacrifice');

-- --------------------------------------------------------

--
-- Structure de la table `types_favori_membre`
--

CREATE TABLE IF NOT EXISTS `types_favori_membre` (
  `id_membre` int(10) unsigned NOT NULL,
  `id_type` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bddversion`
--
ALTER TABLE `bddversion`
 ADD UNIQUE KEY `id` (`id`);

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
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pseudo_membre` (`pseudo_membre`);

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
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `demande_aide`
--
ALTER TABLE `demande_aide`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sponsor`
--
ALTER TABLE `sponsor`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
