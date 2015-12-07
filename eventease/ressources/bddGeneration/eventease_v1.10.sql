-- phpMyAdmin SQL Dump
-- version 4.5.2deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 07 Décembre 2015 à 21:21
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
  `adresse_condensee` varchar(600) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `coordonnee_long`, `coordonnee_lat`, `adresse_condensee`) VALUES
(0, 2.3282993999999917, 48.84535399999999, '27 Rue Notre Dame des Champs, Paris'),
(1, 2.3522219000000177, 48.856614, '54 rue Lecourbe 75015 Paris'),
(2, 3.904274999999984, 49.649494, 'Place de l''Église, Buçy-lès-Pierreponts 02350'),
(3, 2.378228799999988, 48.839169, 'Accor Hotel Arena, 8 Boulevard de Bercy, 75012, Paris'),
(4, 2.3166777999999795, 48.8826774, '106 Rue des Dames, 75017 Paris'),
(5, 7.7503480999999965, 48.5820073, 'Place de la Cathédrale, 67000 Strasbourg');

-- --------------------------------------------------------

--
-- Structure de la table `bddversion`
--

DROP TABLE IF EXISTS `bddversion`;
CREATE TABLE `bddversion` (
  `id` tinyint(4) NOT NULL,
  `version` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `bddversion`
--

INSERT INTO `bddversion` (`id`, `version`) VALUES
(0, '1.10');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` tinyint(1) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_media` int(10) UNSIGNED DEFAULT NULL,
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_membre` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `note`, `message`, `timestamp`, `id_media`, `id_evenement`, `id_membre`) VALUES
(1, NULL, 'Avez vous des places à vendre supplémentaires??? IL m''en manque 1', '2015-12-07 15:13:49', NULL, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `demande_aide`
--

DROP TABLE IF EXISTS `demande_aide`;
CREATE TABLE `demande_aide` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `reponse` text COLLATE utf8_bin,
  `id_modificateur` int(10) NOT NULL,
  `id_expediteur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE `evenement` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fin` timestamp NULL DEFAULT NULL,
  `journee_entiere` tinyint(1) NOT NULL DEFAULT '0',
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `confidentiel` tinyint(1) NOT NULL DEFAULT '0',
  `sur_invitation` tinyint(4) NOT NULL DEFAULT '0',
  `tarif` float UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `site` tinytext COLLATE utf8_bin,
  `langue` tinyint(1) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `journee_entiere`, `age_min`, `age_max`, `confidentiel`, `sur_invitation`, `tarif`, `description`, `site`, `langue`, `id_type`, `id_adresse`) VALUES
(1, 'Concert Johnny Hallyday', '2015-12-07 14:07:24', '2015-12-29 22:00:00', 0, NULL, NULL, 0, 0, 50, 'Concert de Johnny Hallyday au Zénith de Paris !', NULL, NULL, 1, 0),
(2, 'Cours de Zumba', '2015-12-07 14:31:30', '2015-12-22 17:00:00', 1, 16, 99, 0, 0, 15, NULL, NULL, 0, NULL, NULL),
(3, 'Vente privée Disney', '2015-12-20 12:00:00', '2015-12-20 17:00:00', 0, NULL, NULL, 1, 1, NULL, 'Vente privée d''objets Disney.', NULL, 0, 6, 1),
(4, 'Concert des One Direction', '2015-12-07 14:34:23', '2015-12-29 22:00:00', 0, 10, NULL, 0, 0, 50, 'Concert du Boys Band international ONE DIRECTION à l''occasion de la sortie de leur nouvel album MADE IN THE A.M. ', NULL, 0, 2, 3),
(5, 'Exposition à l''Atelier d''Artistes', '2015-12-07 14:33:50', '2016-01-15 01:00:00', 0, 18, NULL, 1, 1, NULL, 'Vernissage des nouveaux tableaux à l''atelier des Artistes.', NULL, 0, 8, 4),
(6, 'Vente de gâteaux au marché de Noël de Strasbourg', '2015-12-22 14:00:00', '2015-12-22 16:30:00', 0, NULL, NULL, 0, 0, 2, 'Vente de gâteaux au profit du centre aéré lors du marché de Noël de Strasbourg le mardi 22 décembre. Venez nombreux pour aider les enfants à partir en vacances!\r\nPart de gâteau: 2€.', NULL, 0, 9, 5),
(7, 'Brocante du village de Buçy-lès-Pierreponts', '2016-01-09 07:00:00', '2016-01-09 19:00:00', 0, NULL, NULL, 0, 0, NULL, 'Brocante sur la place de l''Eglise pour les habitants de Buçy et sa région!', NULL, 0, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8_bin NOT NULL,
  `réponse` text COLLATE utf8_bin NOT NULL,
  `id_modificateur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `lien` tinytext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `lien`) VALUES
(0, 'tiger-face.jpeg'),
(1, 'Aude.jpg'),
(2, 'Disney.jpg'),
(3, 'audypods.jpg'),
(4, 'Bucy.jpg'),
(5, 'brocante.jpg'),
(6, '1D.jpg'),
(7, 'bercy.jpg'),
(8, 'album-1D.jpg'),
(9, 'Apolito.jpg'),
(10, 'Atelier-d-artistes.jpg'),
(11, 'Marie1012.jpg'),
(12, 'marche-noel.jpg'),
(13, 'Oreo.jpg'),
(15, 'tomito.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `media_evenement`
--

DROP TABLE IF EXISTS `media_evenement`;
CREATE TABLE `media_evenement` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_media` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `media_evenement`
--

INSERT INTO `media_evenement` (`id_evenement`, `id_media`) VALUES
(3, 2),
(7, 4),
(7, 5),
(4, 6),
(4, 7),
(4, 8),
(5, 10),
(6, 12);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE `membre` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(30) COLLATE utf8_bin NOT NULL,
  `mdp` tinytext COLLATE utf8_bin NOT NULL,
  `civilite` tinyint(1) DEFAULT NULL COMMENT '0 = ''M.''; 1=''Mme''',
  `nom` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ddn` date DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel` char(10) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `niveau` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : inscrit non validé, 1 : inscrit validé, 2 : modérateur, 3 : admin',
  `langue` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = ''FR''; 1 = ''EN''',
  `id_photo` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL,
  `date_derniere_connexion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mdp`, `civilite`, `nom`, `prenom`, `ddn`, `mail`, `tel`, `description`, `niveau`, `langue`, `id_photo`, `id_adresse`, `date_derniere_connexion`) VALUES
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', 0, 'Dubois', 'Kevin', '1990-07-07', 'kevindu38@kevin.com', '0611111111', 'J''aime les jeux-vidéos et j''aime sortir avec mes amis!', 1, 0, 0, 0, '2015-12-07 18:09:53'),
(11, 'audypods', '$2y$10$1ukYXE5bELmYuk0Vy6eCS.6yqt62tMmt.3sS6SOknq3jdQDjcA9RW', 1, 'Roussel', 'Audrey', '1995-03-09', 'avc1.roussel@orange.fr', '0636504053', NULL, 1, 0, 3, NULL, '2015-12-07 19:31:02'),
(12, 'Audodo', '$2y$10$695AMn8hCZ5WIAbgQ3uTZ.5s6o7ay4XUGyqDzN3N9Hjud79LsXvhC', 1, 'de Maricourt', 'Aude', '1996-05-03', 'aude.demaricourt@gmail.com', '0627347370', 'Fan de Disney et de chatons!', 1, 0, 1, NULL, '2015-12-07 20:13:02'),
(13, 'Oreo', '$2y$10$bUkDzeoRppk8cpf9cFNVZuBv20YrA6WR0xQFrSIEtTb1syPnsAfdq', 0, 'Oreo', 'De Maricourt', '2013-06-12', 'immannaqiw-8312@yopmail.com', '0648938274', NULL, 0, 0, 13, NULL, NULL),
(14, 'Apolito', '$2y$10$9oWgmLVIKzneQ35dFJnC..6FU/O.jvlDECAVmcf2D.WP22VYeEVOi', 0, 'Roussel', 'Apollo', '2005-06-23', 'uffatyxo-7830@yopmail.com', '0475893049', NULL, 1, 0, 9, NULL, NULL),
(15, 'Marie1012', '$2y$10$Ap5.9DnuKeqRPGXFvSSQa.GLTwCJlHA2VJZ0vgRyBhFViVKidQ3GC', 1, 'Dupuis', 'Marie', '1995-03-07', 'wessysixi-0093@yopmail.com', '0638948596', NULL, 1, 0, 11, NULL, NULL),
(16, 'Lily01', '$2y$10$BnEMRwBKk.PEzVtTrLdkduvZbiQwduiwdhnyXErXGeJcotWpaU.wm', 0, 'Roussel', 'Lily', '2012-12-15', 'disottido-2441@yopmail.com', '0160721862', NULL, 1, 0, NULL, NULL, NULL),
(17, 'JulesDDB', '$2y$10$pVzl1l0hVAXnxKAYRegwVuC4lD2HbzJRPjrFslM7JkWOJeUla9/y.', 0, 'Tedier', 'Jules', '1967-08-07', 'hyfoppomedd-7135@yopmail.com', '0608889412', NULL, 1, 0, NULL, NULL, NULL),
(18, 'Ellie-smiley', '$2y$10$lKjDdiLOKADUFTR1./hLcOYsckzoPCRsJ2DRVnMZIrRPvpxr25LJi', 1, 'Roussel', 'Eleanor', '1999-05-05', 'rirrajeku-4560@yopmail.com', '0567899003', NULL, 1, 0, NULL, NULL, NULL),
(19, 'carolita', '$2y$10$HvzGdnAoOWpRLi83gP2/oO/aClccecWzC4mK5Vt1vSriFS.HoP.TO', 1, 'Endicott', 'Carole', '1993-01-10', 'imessowik-4717@yopmail.com', '0729384789', NULL, 1, 0, NULL, NULL, NULL),
(20, 'Mamie45', '$2y$10$9sx6XwuSB6Pfmk0iJGOt/usZSYdFUSMGgavg9XPZ1FGOgTovrY1ee', 1, 'Burgo', 'Michelle', '1940-03-11', 'sovibagu-0060@yopmail.com', '0656738940', NULL, 1, 0, NULL, NULL, NULL),
(21, 'Upsy', '$2y$10$VMUVYOTdw0nUdLxFtNdLMetGUC76c7D.f6qXyjlOOGU3GM3fd11eK', 0, 'Quentin', 'De Roux', '1970-12-28', 'arrefferu-3945@yopmail.com', '0536475897', NULL, 1, 0, NULL, NULL, NULL),
(22, 'Pilou22', '$2y$10$qabjRfkBJB1fJaFKL0K2vuhQkKyzLNbwdPIPIa8EMVDLEoruU3Fj6', 0, 'Dubros', 'Maxime', '1986-05-23', 'ehasojah-2431@yopmail.com', '0148590329', NULL, 1, 0, NULL, NULL, NULL),
(23, 'claire38', '$2y$10$ELbKb.dWooIdaaya5Ht71eJyqvvu8rzLa7G/.GPghxr/mcnPBnZsu', 1, 'Jouault', 'Claire', '1989-02-23', 'ecezoffa-1465@yopmail.com', '0748950394', NULL, 0, 0, NULL, NULL, NULL),
(24, 'tomito', '$2y$10$FjpRjRJmy8VfUxNAP5P0deOyJ9OdXIzJDI/Phf1tj3EUYuYuF25H6', 0, 'Seligman', 'Tom', '1990-02-07', 'wazappofall-9459@yopmail.com', '0467899384', NULL, 0, 0, 15, NULL, NULL),
(25, 'aurelienshz', '$2y$10$JRL77TcLs6l1wgiGIFeJBe9wCaKwGEeoHkoBsdLnYEQfjvI2xuh8m', NULL, NULL, NULL, NULL, 'aurelien.schiltz@free.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(26, 'Ohhopi', '$2y$10$taut4HYS5QYYhrcqkbQCoumk7d8t5kQJerWByJKvDjywWqOcJ.WJa', NULL, NULL, NULL, NULL, 'tristan.muratore@gmail.com', NULL, NULL, 1, 0, NULL, NULL, '2015-12-07 15:47:48');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo_membre` varchar(30) COLLATE utf8_bin NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `confidentiel` tinyint(1) NOT NULL,
  `id_modificateur` int(10) UNSIGNED NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_topic` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

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
  `titre` tinytext COLLATE utf8_bin NOT NULL,
  `description` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE `sponsor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` tinytext COLLATE utf8_bin NOT NULL,
  `site` tinytext COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

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
  `titre` tinytext COLLATE utf8_bin NOT NULL,
  `vues` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_section` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `nom`) VALUES
(1, 'Pique-Nique'),
(2, 'Concert'),
(3, 'Rave party'),
(4, 'Messe noire'),
(5, 'Sacrifice'),
(6, 'Vente privée'),
(7, 'Brocante'),
(8, 'Exposition'),
(9, 'Rassemblement');

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
('arrefferu-3945@yopmail.com', '01f8973cdd06605620daf50f64cf083c644d70cd'),
('aurelien.schiltz@free.fr', '200f3413ffc0781d311c282b0e94041109856b51'),
('avc1.roussel@orange.fr', '305d97c347258f160553be568370d147593f57ed'),
('disottido-2441@yopmail.com', '288ca915db394e33c15b5b379257239a73a116ba'),
('ecezoffa-1465@yopmail.com', '2f7448c1581e49b36b5b8dd305a1ae23deae096e'),
('ehasojah-2431@yopmail.com', '4cf4ea692610670c5969b17cbeefba70f319708e'),
('hyfoppomedd-7135@yopmail.com', '480e3569a9c9da25f957dbaee40cab3d99ee6ad3'),
('imessowik-4717@yopmail.com', '23847afc591526e12fde74c6b4479b0cb2511682'),
('immannaqiw-8312@yopmail.com', '09c7ac590a1587be9222e28d4950309c2c54e816'),
('rirrajeku-4560@yopmail.com', '07c5cd25552905351828d5ce121c156373e76b65'),
('sovibagu-0060@yopmail.com', '5f1493d47d5f6317684c597b05c45c3cde363ce7'),
('uffatyxo-7830@yopmail.com', 'b8fc73715407e2f2af7c27b9e82f52d800dacd7c'),
('wazappofall-9459@yopmail.com', 'd834609ec881b9b0e755d9261d257ab395f02087'),
('wessysixi-0093@yopmail.com', '987f85d73be3f377a47ddf59f6cd87aee6bd0c57');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `demande_aide`
--
ALTER TABLE `demande_aide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
