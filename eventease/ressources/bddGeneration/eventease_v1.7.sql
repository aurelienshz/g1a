-- phpMyAdmin SQL Dump
-- version 4.5.2deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 06 Décembre 2015 à 20:19
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
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE `adresse` (
  `id` int(10) UNSIGNED NOT NULL,
  `coordonnee_long` double NOT NULL,
  `coordonnee_lat` double NOT NULL,
  `id_lieu_google` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `coordonnee_long`, `coordonnee_lat`, `id_lieu_google`) VALUES
(0, 48.84952, 2.33069, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bddversion`
--

DROP TABLE IF EXISTS `bddversion`;
CREATE TABLE `bddversion` (
  `id` tinyint(4) NOT NULL,
  `version` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bddversion`
--

INSERT INTO `bddversion` (`id`, `version`) VALUES
(0, '1.7');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
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

DROP TABLE IF EXISTS `demande_aide`;
CREATE TABLE `demande_aide` (
  `id` int(10) UNSIGNED NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
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

DROP TABLE IF EXISTS `invitation`;
CREATE TABLE `invitation` (
  `id` int(10) UNSIGNED NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : Envoyée, 1 : Acceptée, 2: Peut-être(, 3: Refusée.)',
  `intervalle_contact` int(10) UNSIGNED DEFAULT NULL,
  `Notif_modification` tinyint(1) DEFAULT NULL,
  `Notif_commentaire` tinyint(1) DEFAULT NULL,
  `id_expediteur` int(11) DEFAULT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` tinytext,
  `lien` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `nom`, `lien`) VALUES
(2, NULL, 'tiger-face.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `media_evenement`
--

DROP TABLE IF EXISTS `media_evenement`;
CREATE TABLE `media_evenement` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_media` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mdp` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `civilite` tinyint(1) DEFAULT NULL COMMENT '0 = ''M.''; 1=''Mme''',
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ddn` date DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` char(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `niveau` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : inscrit non validé, 1 : inscrit validé, 2 : modérateur, 3 : admin',
  `langue` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = ''FR''; 1 = ''EN''',
  `id_photo` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL,
  `date_derniere_connexion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `civilite`, `nom`, `prenom`, `ddn`, `mail`, `tel`, `description`, `niveau`, `langue`, `id_photo`, `id_adresse`, `date_derniere_connexion`) VALUES
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', 0, 'Dubois', 'Kevin', '1990-07-07', 'kevin.ducon@ducon.com', '0611111111', 'Je suis con', 0, 0, 0, 0, '2015-12-06 19:14:36'),
(10, 'a', '$2y$10$Mu./JA3yO.YIyBossKZ7weAN3dmNuxdDTdggqgB5IVohHokEVddrG', NULL, NULL, NULL, NULL, 'aurelien.schiltz@free.fr', NULL, NULL, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
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

DROP TABLE IF EXISTS `organise`;
CREATE TABLE `organise` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_organisateur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE `pays` (
  `id_pays` int(10) UNSIGNED NOT NULL,
  `nom` tinytext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` tinytext NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
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

DROP TABLE IF EXISTS `sponsorize`;
CREATE TABLE `sponsorize` (
  `id_sponsor` int(10) UNSIGNED NOT NULL,
  `id_evenement` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `suit`
--

DROP TABLE IF EXISTS `suit`;
CREATE TABLE `suit` (
  `id_suiveur` int(10) UNSIGNED NOT NULL,
  `id_suivi` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
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

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `types_favori_membre`;
CREATE TABLE `types_favori_membre` (
  `id_membre` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `verification_membre`
--

DROP TABLE IF EXISTS `verification_membre`;
CREATE TABLE `verification_membre` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `verification_membre`
--

INSERT INTO `verification_membre` (`email`, `token`) VALUES
('aurelien.schiltz@free.fr', '200f3413ffc0781d311c282b0e94041109856b51');

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
-- Index pour la table `verification_membre`
--
ALTER TABLE `verification_membre`
  ADD UNIQUE KEY `id_membre` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `demande_aide`
--
ALTER TABLE `demande_aide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
