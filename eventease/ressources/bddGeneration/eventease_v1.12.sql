-- phpMyAdmin SQL Dump
-- version 4.5.2deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Dim 13 Décembre 2015 à 18:22
-- Version du serveur :  5.5.46-0+deb8u1
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
(5, 7.7503480999999965, 48.5820073, 'Place de la Cathédrale, 67000 Strasbourg'),
(6, 2.3616607, 48.9195252, 'Stade de France, Saint-Denis, France'),
(7, 2.3983165, 48.8636379, 'Testo, Rue Emile Landrin, Paris, France'),
(8, 2.3585125, 48.8793511, '2 Rue de Dunkerque, Paris, France'),
(9, 2.3756726, 48.8601827, '90 Boulevard Voltaire, Paris, France'),
(10, 2.3346295, 48.8425989, '80 Rue Michelet, Paris, France'),
(11, 2.3346295, 48.8425989, '80 Rue Michelet, Paris, France'),
(12, 2.3453123, 48.8826431, '80 Rue de Dunkerque, Paris, France'),
(13, 2.3453123, 48.8826431, '80 Rue de Dunkerque, Paris, France'),
(14, 2.3312252, 48.8434581, 'I.S.E.P Institut Supérieur d''Electronique de Paris, Rue Notre Dame des Champs, Paris, France'),
(15, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(16, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(17, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(18, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(19, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(20, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(21, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(22, 2.3610026, 48.8768592, 'louloucam, Rue du Faubourg Saint-Martin, Paris, France'),
(23, 2.3453123, 48.8826431, '80 Rue de Dunkerque, Paris, France'),
(24, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(25, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(26, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(27, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France');

-- --------------------------------------------------------

--
-- Structure de la table `bddversion`
--

CREATE TABLE `bddversion` (
  `id` tinyint(4) NOT NULL,
  `version` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `bddversion`
--

INSERT INTO `bddversion` (`id`, `version`) VALUES
(0, '1.12');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

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
(1, NULL, 'Avez vous des places à vendre supplémentaires??? IL m''en manque 2', '2015-12-08 23:24:43', NULL, 1, 13),
(2, NULL, 'Des gens viennent de Marseille pour ça? Avez vous des covoiturages à proposer?', '2015-12-07 21:52:01', NULL, 1, 14),
(3, NULL, 'Allez vous vendre des déguisements de princesse?', '2015-12-07 21:56:17', NULL, 3, 15),
(4, NULL, 'Mmmmh des gâteaux! Ils étaient trop bons l''année dernière!!', '2015-12-07 21:57:31', NULL, 6, 12),
(5, NULL, 'Y aura un buffet??', '2015-12-07 21:58:18', NULL, 5, 19),
(6, NULL, 'Les nouveaux tableaux sont de qui?', '2015-12-07 21:59:18', NULL, 5, 13);

-- --------------------------------------------------------

--
-- Structure de la table `demande_aide`
--

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

CREATE TABLE `evenement` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `debut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fin` timestamp NULL DEFAULT NULL,
  `journee_entiere` tinyint(1) NOT NULL DEFAULT '0',
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `visibilite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : public, 1 : privé, 2 : secret',
  `invitation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : tout le monde peut inviter, 1 : seuls les orgas',
  `tarif` float UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `site` tinytext COLLATE utf8_bin,
  `langue` tinyint(1) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_adresse` int(10) UNSIGNED DEFAULT NULL,
  `id_media_principal` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `journee_entiere`, `age_min`, `age_max`, `visibilite`, `invitation`, `tarif`, `description`, `site`, `langue`, `id_type`, `id_adresse`, `id_media_principal`) VALUES
(1, 'Concert Johnny Hallyday', '2015-12-07 14:07:24', '2015-12-29 22:00:00', 0, NULL, NULL, 0, 0, 50, 'Concert de Johnny Hallyday au Zénith de Paris !', NULL, NULL, 1, 0, NULL),
(2, 'Cours de Zumba', '2015-12-12 16:50:04', '2015-12-22 17:00:00', 1, 16, 99, 1, 0, 15, NULL, NULL, 0, NULL, NULL, NULL),
(3, 'Vente privée Disney', '2015-12-20 12:00:00', '2015-12-20 17:00:00', 0, NULL, NULL, 1, 1, NULL, 'Vente privée d''objets Disney.', NULL, 0, 6, 1, NULL),
(4, 'Concert des One Direction', '2015-12-07 14:34:23', '2015-12-29 22:00:00', 0, 10, NULL, 0, 0, 50, 'Concert du Boys Band international ONE DIRECTION à l''occasion de la sortie de leur nouvel album MADE IN THE A.M. ', NULL, 0, 2, 3, NULL),
(5, 'Exposition à l''Atelier d''Artistes', '2015-12-07 14:33:50', '2016-01-15 01:00:00', 0, 18, NULL, 1, 1, NULL, 'Vernissage des nouveaux tableaux à l''atelier des Artistes.', NULL, 0, 8, 4, NULL),
(6, 'Vente de gâteaux au marché de Noël de Strasbourg', '2015-12-22 14:00:00', '2015-12-22 16:30:00', 0, NULL, NULL, 0, 0, 2, 'Vente de gâteaux au profit du centre aéré lors du marché de Noël de Strasbourg le mardi 22 décembre. Venez nombreux pour aider les enfants à partir en vacances!\r\nPart de gâteau: 2€.', NULL, 0, 9, 5, NULL),
(7, 'Brocante du village de Buçy-lès-Pierreponts', '2016-01-09 07:00:00', '2016-01-09 19:00:00', 0, NULL, NULL, 0, 0, NULL, 'Brocante sur la place de l''Eglise pour les habitants de Buçy et sa région!', NULL, 0, 7, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

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

--
-- Contenu de la table `invitation`
--

INSERT INTO `invitation` (`id`, `etat`, `intervalle_contact`, `Notif_modification`, `Notif_commentaire`, `id_expediteur`, `id_evenement`, `id_destinataire`) VALUES
(1, 0, NULL, NULL, NULL, NULL, 1, 26),
(2, 0, NULL, NULL, NULL, NULL, 6, 1),
(3, 0, NULL, NULL, NULL, NULL, 2, 26);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

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
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', 0, 'Dubois', 'Kevin', '1995-02-16', 'kevindu38@kevin.com', '0611111115', 'J''aime les jeux-vidéo et j''aime sortireuh avec mes amis!', 1, 0, 0, 0, '2015-12-10 10:07:52'),
(11, 'audypods', '$2y$10$1ukYXE5bELmYuk0Vy6eCS.6yqt62tMmt.3sS6SOknq3jdQDjcA9RW', 1, 'Roussel', 'Audrey', '1995-03-09', 'avc1.roussel@orange.fr', '0636504053', NULL, 1, 0, 3, NULL, '2015-12-13 17:04:27'),
(12, 'Audodo', '$2y$10$695AMn8hCZ5WIAbgQ3uTZ.5s6o7ay4XUGyqDzN3N9Hjud79LsXvhC', 1, 'de Maricourt', 'Aude', '1996-05-03', 'aude.demaricourt@gmail.com', '0627347370', 'Fan de Disney et de chatons!', 1, 0, 1, NULL, '2015-12-08 10:17:29'),
(13, 'Oreo', '$2y$10$bUkDzeoRppk8cpf9cFNVZuBv20YrA6WR0xQFrSIEtTb1syPnsAfdq', 0, 'Oreo', 'De Maricourt', '2013-06-12', 'immannaqiw-8312@yopmail.com', '0648938274', NULL, 0, 0, 13, NULL, NULL),
(14, 'Apolito', '$2y$10$9oWgmLVIKzneQ35dFJnC..6FU/O.jvlDECAVmcf2D.WP22VYeEVOi', 0, 'Roussel', 'Apollo', '2005-06-23', 'uffatyxo-7830@yopmail.com', '0475893049', NULL, 1, 0, 9, NULL, NULL),
(15, 'Marie1012', '$2y$10$Ap5.9DnuKeqRPGXFvSSQa.GLTwCJlHA2VJZ0vgRyBhFViVKidQ3GC', 1, 'Dupuis', 'Marie', '1995-03-07', 'wessysixi-0093@yopmail.com', '0638948596', NULL, 1, 0, 11, NULL, NULL),
(16, 'Lily01', '$2y$10$BnEMRwBKk.PEzVtTrLdkduvZbiQwduiwdhnyXErXGeJcotWpaU.wm', 0, 'Roussel', 'Lily', '2012-12-15', 'disottido-2441@yopmail.com', '0160721862', NULL, 1, 0, 0, NULL, NULL),
(17, 'JulesDDB', '$2y$10$pVzl1l0hVAXnxKAYRegwVuC4lD2HbzJRPjrFslM7JkWOJeUla9/y.', 0, 'Tedier', 'Jules', '1967-08-07', 'hyfoppomedd-7135@yopmail.com', '0608889412', NULL, 1, 0, 0, NULL, NULL),
(18, 'Ellie-smiley', '$2y$10$lKjDdiLOKADUFTR1./hLcOYsckzoPCRsJ2DRVnMZIrRPvpxr25LJi', 1, 'Roussel', 'Eleanor', '1999-05-05', 'rirrajeku-4560@yopmail.com', '0567899003', NULL, 1, 0, 0, NULL, NULL),
(19, 'carolita', '$2y$10$HvzGdnAoOWpRLi83gP2/oO/aClccecWzC4mK5Vt1vSriFS.HoP.TO', 1, 'Endicott', 'Carole', '1993-01-10', 'imessowik-4717@yopmail.com', '0729384789', NULL, 1, 0, 0, NULL, NULL),
(20, 'Mamie45', '$2y$10$9sx6XwuSB6Pfmk0iJGOt/usZSYdFUSMGgavg9XPZ1FGOgTovrY1ee', 1, 'Burgo', 'Michelle', '1940-03-11', 'sovibagu-0060@yopmail.com', '0656738940', NULL, 1, 0, 0, NULL, NULL),
(21, 'Upsy', '$2y$10$VMUVYOTdw0nUdLxFtNdLMetGUC76c7D.f6qXyjlOOGU3GM3fd11eK', 0, 'Quentin', 'De Roux', '1970-12-28', 'arrefferu-3945@yopmail.com', '0536475897', NULL, 1, 0, 0, NULL, NULL),
(22, 'Pilou22', '$2y$10$qabjRfkBJB1fJaFKL0K2vuhQkKyzLNbwdPIPIa8EMVDLEoruU3Fj6', 0, 'Dubros', 'Maxime', '1986-05-23', 'ehasojah-2431@yopmail.com', '0148590329', NULL, 1, 0, 0, NULL, NULL),
(23, 'claire38', '$2y$10$ELbKb.dWooIdaaya5Ht71eJyqvvu8rzLa7G/.GPghxr/mcnPBnZsu', 1, 'Jouault', 'Claire', '1989-02-23', 'ecezoffa-1465@yopmail.com', '0748950394', NULL, 0, 0, 0, NULL, NULL),
(24, 'tomito', '$2y$10$FjpRjRJmy8VfUxNAP5P0deOyJ9OdXIzJDI/Phf1tj3EUYuYuF25H6', 0, 'Seligman', 'Tom', '1990-02-07', 'wazappofall-9459@yopmail.com', '0467899384', NULL, 0, 0, 15, NULL, NULL),
(25, 'aurelienshz', '$2y$10$JRL77TcLs6l1wgiGIFeJBe9wCaKwGEeoHkoBsdLnYEQfjvI2xuh8m', NULL, NULL, NULL, NULL, 'aurelien.schiltz@free.fr', NULL, NULL, 0, 0, 0, NULL, NULL),
(26, 'Ohhopi', '$2y$10$taut4HYS5QYYhrcqkbQCoumk7d8t5kQJerWByJKvDjywWqOcJ.WJa', NULL, NULL, NULL, NULL, '', NULL, NULL, 1, 0, 0, NULL, '2015-12-07 15:47:48'),
(27, 'thedevilz0', '$2y$10$RvtVjAkb4Ew9Rjvf2jqMIexFlGaw8UKHzsuSceo12F5zBp3FFet6e', 0, '', 'Tristan', '2011-07-11', 'ohhopi@gmail.com', '0686105151', 'Je suis heureux !', 0, 1, NULL, NULL, '2015-12-08 07:33:26'),
(28, 'glachaud', '$2y$10$3TUcbmtR4DFiri7KKKun8OOX4xcAv1gFu4/aYednQPTGDNPkbEMr2', 0, 'Lachaud', 'Guillaume', '1994-11-21', 'guillaume.lachaud78@gmail.com', '0687910379', 'J''aime le hand !', 0, 0, NULL, NULL, '2015-12-08 08:18:56'),
(29, 'testeur', '$2y$10$B.oPCQC0GXfGE654UoH4fOylPMPeTBuk4IxzKj5ChHbTVUF7OCt.O', NULL, NULL, NULL, NULL, 'mohamed.sellami@isep.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(30, 'audypods1', '$2y$10$FAQo8fc8/ibOay1jbTS6ku9R0DgKmrwufHCKw9cVK7H0hohAZ52i6', NULL, NULL, NULL, NULL, 'avc1.rousselpub@gmail.com', NULL, NULL, 1, 0, NULL, NULL, '2015-12-13 16:43:21'),
(31, 'ohhopii', '$2y$10$9kSj4BPPGfqtBRAMmScDLeLQnk5A0NOsFxAXOBZrTQbkNKcGFQvvy', 0, 'Jean', 'Dupont', '2010-02-02', 'tristan.muratore@gmail.com', '0686105151', 'Loul', 0, 0, NULL, 27, '2015-12-12 21:31:16'),
(32, 'ohhopiii', '$2y$10$TRI8JF.eBallhzGiKsilAeLrL6yw41VN.sxz.9elpFT0YOunhhDB6', 0, 'Tristan', '', '2012-02-02', 'test@test.com', '0686105151', '<script>alert("NTM");</script>', 0, 0, NULL, 23, '2015-12-12 19:56:42'),
(33, 'Aure', '$2y$10$iCEliVtHW.i6OCRK0k7jo.jXR8rp9VxVIpUg0tq.ruQQcqsfuSIfW', NULL, NULL, NULL, NULL, 'a@b.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(34, 'AAA', '$2y$10$fiR3e/Sz927OHB.MFcQ.7OK.7NppB7RXDqXxg.V8xnfKhKgyMcMri', NULL, NULL, NULL, NULL, 'aaa@bb.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(35, 'AAAA', '$2y$10$OYfgC6ZjqkCN0S154bNPqO.IJptm.sJcAa/sx56H9r8xqQll0yG1C', 1, 'Ol''Dirty', 'Ol''Dirty''Bastards', '0000-00-00', 'aaaa@a.q', '0611111111', '', 0, 0, NULL, 22, '2015-12-12 20:00:13');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

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

CREATE TABLE `organise` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_organisateur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `organise`
--

INSERT INTO `organise` (`id_evenement`, `id_organisateur`) VALUES
(6, 1),
(6, 12),
(6, 24),
(1, 14),
(2, 23),
(2, 18);

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
  `titre` tinytext COLLATE utf8_bin NOT NULL,
  `description` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id`, `titre`, `description`) VALUES
(1, 'Inscription', 'Tout savoir sur l''inscription sur Event''ease'),
(2, 'Connexion', 'Pour résoudre vos problèmes de connexion'),
(3, 'Connexion', 'Pour résoudre vos problèmes de connexion');

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

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
  `titre` tinytext COLLATE utf8_bin NOT NULL,
  `vues` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_section` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

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

CREATE TABLE `types_favori_membre` (
  `id_membre` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `verification_membre`
--

CREATE TABLE `verification_membre` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `verification_membre`
--

INSERT INTO `verification_membre` (`email`, `token`) VALUES
('a@b.fr', '186ebc69f9d94df4763bebdc89d4c5c0b6eb5022'),
('aaa@bb.fr', '43b89061b99ca40f0c07299c54161398ae714057'),
('aaaa@a.q', '19d5c8f17782eb11afd48b9eded9fce18bb9eff0'),
('arrefferu-3945@yopmail.com', '01f8973cdd06605620daf50f64cf083c644d70cd'),
('aurelien.schiltz@free.fr', '200f3413ffc0781d311c282b0e94041109856b51'),
('avc1.roussel@orange.fr', '305d97c347258f160553be568370d147593f57ed'),
('disottido-2441@yopmail.com', '288ca915db394e33c15b5b379257239a73a116ba'),
('ecezoffa-1465@yopmail.com', '2f7448c1581e49b36b5b8dd305a1ae23deae096e'),
('ehasojah-2431@yopmail.com', '4cf4ea692610670c5969b17cbeefba70f319708e'),
('guillaume.lachaud78@gmail.com', '5512ba0b153ac087936e7845caabc04cb3cb116c'),
('hyfoppomedd-7135@yopmail.com', '480e3569a9c9da25f957dbaee40cab3d99ee6ad3'),
('imessowik-4717@yopmail.com', '23847afc591526e12fde74c6b4479b0cb2511682'),
('immannaqiw-8312@yopmail.com', '09c7ac590a1587be9222e28d4950309c2c54e816'),
('mohamed.sellami@isep.fr', '91e2fb0e39ebb1301713473e306593f641c6a7b9'),
('ohhopi@gmail.com', '1d063ce43653e972a297a6ccc8af48a5d50afb83'),
('rirrajeku-4560@yopmail.com', '07c5cd25552905351828d5ce121c156373e76b65'),
('sovibagu-0060@yopmail.com', '5f1493d47d5f6317684c597b05c45c3cde363ce7'),
('test@test.com', '51ea0a2bdb621542be75b7fbe3d38f4995627200'),
('tristan.muratore@gmail.com', 'c342d1b7c915e6c1a6b832bdef9c24f6e88278f0'),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
