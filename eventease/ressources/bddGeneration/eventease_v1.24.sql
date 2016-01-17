-- phpMyAdmin SQL Dump
-- version 4.5.2deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Dim 17 Janvier 2016 à 14:14
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
(24, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(25, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(26, 2.3507352, 48.8579083, '80 Rue de Rivoli, Paris, France'),
(29, 2.3068023, 48.8440447, '54 Rue Lecourbe, 75015 Paris, France'),
(30, 2.2766429, 48.8255492, '31 Rue Victor Hugo, Issy-les-Moulineaux, France'),
(31, 2.70938, 48.4101427, '3 Allée de la Pépinière, 77300 Fontainebleau, France'),
(33, 2.3453123, 48.8826431, '80 Rue de Dunkerque, Paris, France'),
(34, 2.2668339, 48.828144, '37 Rue Rouget de Lisle, Issy-les-Moulineaux, France');

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
(0, '1.24');

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
(1, NULL, 'Avez vous des places à vendre supplémentaires??? IL m''en manque 2', '2015-12-08 23:24:43', NULL, 1, 13),
(2, NULL, 'Des gens viennent de Marseille pour ça? Avez vous des covoiturages à proposer?', '2015-12-07 21:52:01', NULL, 1, 14),
(3, NULL, 'Allez vous vendre des déguisements de princesse?', '2015-12-07 21:56:17', NULL, 3, 15),
(4, NULL, 'Mmmmh des gâteaux! Ils étaient trop bons l''année dernière!!', '2015-12-07 21:57:31', NULL, 6, 12),
(5, NULL, 'Y aura un buffet??', '2015-12-07 21:58:18', NULL, 5, 19),
(6, NULL, 'Les nouveaux tableaux sont de qui?', '2015-12-07 21:59:18', NULL, 5, 13),
(7, NULL, 'Hello', '2015-12-17 13:36:29', NULL, 6, 12),
(8, NULL, 'Je vais commenter', '2015-12-18 12:50:30', NULL, 6, 11),
(9, NULL, 'lourd', '2015-12-21 02:43:27', NULL, 6, 1),
(10, NULL, 'Qu''il est difficile d''être roi de la France', '2016-01-07 09:15:32', NULL, 666, 1),
(11, NULL, 'Qu''il est difficile d''être roi de la France !', '2016-01-07 09:15:49', NULL, 6, 1),
(12, NULL, 'Est-ce que ça marche?', '2016-01-11 21:57:35', NULL, 666, 30),
(13, NULL, 'J''ai une place à vendre s''il y a des intéressés', '2016-01-11 21:59:20', NULL, 1, 30),
(14, NULL, 'Trop hate!!', '2016-01-14 10:46:02', NULL, 4, 11),
(15, NULL, 'Trop bien !', '2016-01-14 15:51:57', NULL, 4, 12),
(16, NULL, 'N''oubliez pas de venir avec votre tablier! :)', '2016-01-14 16:02:49', NULL, 9, 12),
(17, NULL, 'Trop cool !', '2016-01-15 09:38:19', NULL, 9, 12);

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

DROP TABLE IF EXISTS `contenu`;
CREATE TABLE `contenu` (
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `valeur` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`nom`, `valeur`) VALUES
('about', '[h1]Conditions générales d''utilisation[/h1]  [p]Ce texte doit être modifié par le propriétaire du site[/p]'),
('catchphrase', 'ENJOY EVENTS WITH EASE !'),
('cgv', '[h1]Conditions générales d''utilisation[/h1]\n\n[p]Ce texte doit être modifié par le propriétaire du site[/p]'),
('legal', '[h1]Mentions légales[/h1]\n\n    [p]\n        [ul]\n            [li][strong]Nom du Site :[/strong] ***[/li]\n            [li][strong]Propriétaire :[/strong] ***[/li]\n            [li][strong]Forme juridique du propriétaire :[/strong] ***[/li]\n            [li][strong]Contact du propriétaire :[/strong] ***[/li]\n            [li][strong]Hébergement :[/strong] ***[/li]\n            [li][strong]Création :[/strong] ***[/li]\n        [/ul]\n    Le présent site (ci-après "le site Internet") est la propriété de ***, qui est également son exploitant.\n    [/p]\n\n    [p]\n        L’utilisateur du site Internet reconnaît disposer de la compétence et des moyens nécessaires pour accéder àu site Internet et pour l''utiliser. Il reconnaît également avoir pris connaissance des présentes mentions légales et s’engage à s''y conformer.\n    [/p]\n\n\n[h2]Contenus[/h2]\n[h3]Cookies[/h3]\n    [p]\n        L''utilisation du site internet nécessite l''installation de cookies sur son navigateur. Un cookie est un élément qui ne permet pas d’identifier l’utilisateur mais sert à enregistrer des informations relatives à la navigation de celui-ci sur le site Internet. Ceux-ci sont nécessaire au fonctionnement du site internet, et la navigation sur le site implique l''acceptation de leur installation.\n    [/p]\n[h3]Liens hypertextes[/h3]\n\n        [p]\n            La mise en place d’un lien hypertexte vers le présent site ne nécessite pas d’autorisation préalable du propriétaire.[br /]\n            Le propriétaire ne peut en aucun cas être tenu pour responsable des sites ayant un lien hypertexte pointant vers ce présent site et déclinent toute responsabilité quant à leur contenu et à leur utilisation. De même, le propriétaire ne peut être tenu pour responsable du contenu des sites externes au présent site pointés par des liens hypertextes sur le présent site.\n        [/p]\n[h3]Limitation de responsabilité[/h3]\n\n    [p]\n        Les informations diffusées sur le site (textes, photos, graphiques etc) ont un caractère purement général, illustratif et informatif et ne sont données qu’à titre indicatif. Malgré tout le soin apporté à sa réalisation et à son exactitude, ce site ne peut pas constituer un document contractuel et ne saurait fonder une action en justice. Par ailleurs, les propriétaires ne saurait être tenus pour responsables de tout dommage résultant de l’accès par un internaute au site et/ou de l’utilisation du site, ou de l’impossibilité d’y accéder.\n    [/p]\n    [p]\n        La responsabilité des propriétaires n’est en aucune manière engagée quant au contenu des informations figurant sur ce site, lesquelles ne sont pas nécessairement complètes, exhaustives, précises ou à jour.\n    [/p]\n\n[h2]Propriété intellectuelle[/h2]\n[h3]Propriété intellectuelle du site Internet[/h3]\n    [p]\n        La présentation et le contenu du site Internet constituent, ensemble, une œuvre protégée par les lois en vigueur sur la propriété intellectuelle.[br /]\n        Sauf indications particulières, les dénominations ou appellations, les logos, et marques présentées sont déposées et appartiennent à leurs propriétaires respectifs.[br /]\n        Les marques de l’exploitant du site Internet et de ses partenaires, ainsi que les logos figurant sur le site sont des marques (semi-figuratives ou non) déposées.\n    [/p]\n    [p]\n        Toute représentation ou reproduction totale ou partielle du site Internet, par quelque procédé que ce soit, sans l’autorisation expresse de l’exploitant du site Internet, est interdite et constituerait une contrefaçon sanctionnée par les articles L 335-2 et suivants du Code de la propriété intellectuelle.\n    [/p]\n    [p]\n        Il en est de même des éventuelles bases de données figurant sur le site Internet qui sont protégées par les dispositions de la loi du 11 juillet 1998 portant transposition dans le Code de la propriété intellectuelle (CPI) de la directive européenne du 11 mars 1996 relative à la protection juridique des bases de données.\n    [/p]\n    [p]\n        Aucune exploitation commerciale, reproduction, représentation, utilisation, adaptation, modification, incorporation, traduction, partielle ou intégrale des éléments de ce site ne pourra en être faite sans l’accord préalable et écrit du propriétaire.\n    [/p]\n\n[h3]Contenus multimédia[/h3]\n    [p]\n        Sauf mention contraire, les photographies, schémas, dessins, graphismes, logos, vidéos et tous les contenus multimédia constituant le site web appartiennent au propriétaire, et soumis à la réglementation du Code de la propriété intellectuelle dans la mesure où ils sont une « œuvre de l’esprit » au sens du dit code.[br /]\n        Les photographies, schémas, dessins, graphismes, logos, vidéos et tous les contenus multimédia déposés par les utilisateurs\n    [/p]\n    [p]\n        Les données personnelles recueillies sont fournies volontairement par l’utilisateur du site. Des contenus textes et multimédia fournis par les utilisateurs du site Internet sont susceptibles d''être recueillis par le propriétaire. Ces contenus, identifiés selon leurs auteurs et rendus disponibles sur ce présent site, restent sous la responsabilité exclusive de leurs auteurs. Il appartient à l''utilisateur fournissant ces contenus de s''assurer qu''il en a la propriété intellectuelle et que ces contenus n''enfreignent pas les lois en vigueur.\n    [/p]\n\n[h2]Données recueilies[/h2]\n\n        [p]\n            Les données recueillies sur l''utilisateur du site Internet le sont afin de lui fournir la meilleure expérience possible. Le propriétaire s’engage à respecter, le cas échéant, le caractère confidentiel de ces données.\n        [/p]\n    [h3]Confidentialité[/h3]\n            [p]\n                Pour pouvoir bénéficier de certaines fonctionnalités du site Internet, l’utilisateur fournit, par le biais d’un formulaire, des données à caractère personnel telles que son adresse de messagerie électronique, son état civil ou son adresse postal. Chaque formulaire informe spécifiquement l’utilisateur du caractère obligatoire ou facultatif de la fourniture de chacune des données sollicitées et des conséquences attachées au refus de fournir lesdites données.\n            [/p]\n            [p]\n                Le propriétaire n’utilise les données recueillies qu’aux fins indiquées sur le formulaire par le biais duquel elles le sont. L''utilisation commerciale des données personnelles est proscrite par le propriétaire, qui s''engage à ne pas divulguer les données à caractère personnel à des tiers ou à des partenaires commerciaux.\n            [/p]\n\n    [h3]Informatique et liberté[/h3]\n        [p]\n            Le site Internet est enregistré auprès de la CNIL. L’utilisateur dispose d’un droit d’accès, de modification, de rectification et de suppression des données qui le concernent (article 34 de la loi  » Informatique et Libertés »). Pour l’exercer, l’utilisateur peut s’adresser à l''adresse de contact figurant .\n        [/p]\n    [h3]Hébergement[/h3]\n        [p]\n            Le propriétaire confie à l’hébergeur du site Internet la conservation des données relatives aux utilisateurs de leur site. L’hébergeur est lié au propriétaire par un accord spécifique relatif à la confidentialité des données qu’il conserve. L’hébergeur est tenu de respecter l’ensemble des principes énoncés dans la présente charte de confidentialité et à n’utiliser les données qu’il collecte qu’aux seules fins fixées par le propriétaire.\n        [/p]\n\n[h2]Litiges[/h2]\n\n    [p]Ce site est soumis à la loi française. En cas de litige, les tribunaux français sont seuls compétents.[/p]\n\n\n[h2]Modification des présentes mentions légales[/h2]\n\n    [p]\n        Les présentes mentions légales peuvent être modifiées et/ou adaptées à tout moment et sans avertissement préalable. L''utilisateur du site Internet est par conséquent invité à les consulter régulièrement.\n    [/p]'),
('subcatchphrase', 'Trouvez et participez aux évènements qui vous correspondent');

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
  `fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `journee_entiere` tinyint(1) NOT NULL DEFAULT '0',
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `visibilite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : public, 1 : privé, 2 : secret',
  `invitation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : tout le monde peut inviter, 1 : seuls les orgas',
  `tarif` float UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `max_participants` int(10) DEFAULT NULL,
  `sponsor` tinytext COLLATE utf8_bin,
  `organisateur` tinytext COLLATE utf8_bin,
  `organisateur_contact` tinytext COLLATE utf8_bin,
  `site` tinytext COLLATE utf8_bin,
  `langue` tinyint(1) DEFAULT NULL,
  `id_createur` int(10) UNSIGNED NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `id_adresse` int(10) UNSIGNED NOT NULL,
  `id_media_principal` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `debut`, `fin`, `journee_entiere`, `age_min`, `age_max`, `visibilite`, `invitation`, `tarif`, `description`, `max_participants`, `sponsor`, `organisateur`, `organisateur_contact`, `site`, `langue`, `id_createur`, `id_type`, `id_adresse`, `id_media_principal`) VALUES
(1, 'Concert Johnny Hallyday', '2016-01-11 14:39:31', '2015-12-29 22:00:00', 0, NULL, NULL, 0, 0, 50, 'Concert de Johnny Hallyday au Zénith de Paris !', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 16),
(2, 'Cours de Zumba', '2016-01-12 08:11:00', '2016-12-22 17:00:00', 1, 16, 99, 1, 0, 15, NULL, 30, NULL, NULL, NULL, NULL, NULL, 1, 3, 3, NULL),
(3, 'Vente privée Disney', '2016-01-11 14:39:36', '2015-12-20 17:00:00', 0, NULL, NULL, 1, 1, NULL, 'Vente privée d''objets Disney.', NULL, NULL, NULL, NULL, NULL, 0, 1, 6, 1, 2),
(4, 'Concert des One Direction', '2016-01-11 14:39:37', '2015-12-29 22:00:00', 0, 10, NULL, 0, 0, 50, 'Concert du Boys Band international ONE DIRECTION à l''occasion de la sortie de leur nouvel album MADE IN THE A.M. ', NULL, NULL, NULL, NULL, NULL, 0, 1, 2, 3, 6),
(5, 'Exposition à l''Atelier d''Artistes', '2016-01-11 14:39:39', '2016-01-15 01:00:00', 0, 18, NULL, 1, 1, NULL, 'Vernissage des nouveaux tableaux à l''atelier des Artistes.', NULL, NULL, NULL, NULL, NULL, 0, 1, 8, 4, NULL),
(6, 'Vente de gâteaux au marché de Noël de Strasbourg', '2016-01-11 14:39:40', '2015-12-22 16:30:00', 0, NULL, NULL, 0, 0, 2, 'Vente de gâteaux au profit du centre aéré lors du marché de Noël de Strasbourg le mardi 22 décembre. Venez nombreux pour aider les enfants à partir en vacances!\r\nPart de gâteau: 2€. Il y aura même un concert donné par la chorale locale.', NULL, NULL, NULL, NULL, NULL, 0, 1, 9, 5, 12),
(7, 'Brocante du village de Buçy-lès-Pierreponts', '2016-01-11 14:39:43', '2016-01-09 19:00:00', 0, NULL, NULL, 0, 0, NULL, 'Brocante sur la place de l''Eglise pour les habitants de Buçy et sa région!', NULL, NULL, NULL, NULL, NULL, 0, 1, 7, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8_bin NOT NULL,
  `reponse` text COLLATE utf8_bin NOT NULL,
  `id_modificateur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `reponse`, `id_modificateur`, `date_modification`) VALUES
(1, 'Je n''arrive pas à me connecter?', 'Pour se connecter il faut tout d''abord s''être inscrit sur notre site.\r\nAu terme de l''inscription un e-mail vous a été envoyé pour valider votre inscription sur l''adresse mail que vous nous aurez fourni. Pensez à cliquer sur le lien de confirmation présent dans ce mail pour valider votre inscription, vous ne pourrez pas vous inscrire sinon.\r\nIl se peut également que vous ayez mal rentré votre mot de passe ou votre nom d''utilisateur, ils sont sensibles à la casse. Veillez donc bien à respecter les caractères majuscules et minuscules.', 0, '2016-01-11 15:14:33'),
(2, 'Comment est ce que je change mon mot de passe? ', 'Pour changer votre mot de passe, il vous suffit d''aller sur votre page de profil en cliquant sur votre nom en haut à droit de l''en-tête une fois connecté.\r\nVous devez ensuite cliquer sur "modifier mon profil" puis en haut à gauche de cette page il faut cliquer sur "changer mon mot de passe"', 0, '2016-01-11 15:14:33'),
(3, ' Comment je change ma photo?', 'Pour changer votre photo de profil, vous devez vous rendre sur votre profil en cliquant sur votre nom en haut à droite (après vous être connecté). Vous devez ensuite cliquer sur "modifier mon profil" puis vous pourrez changer votre photo. Attention à respecter les instructions d''extension et de poids de la photo.', 0, '2016-01-11 15:18:05'),
(4, 'Comment je supprime mon compte?', 'Pour supprimer votre compte, vous devez vous rendre sur votre profil en cliquant sur votre nom en haut à droite (après vous être connecté). Vous devez ensuite cliquer sur "modifier mon profil". Une fois sur cette page vous pourrez cliquer sur le bouton en bas à droite de la page "supprimer mon compte".', 0, '2016-01-11 15:18:14');

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

--
-- Contenu de la table `invitation`
--

INSERT INTO `invitation` (`id`, `etat`, `intervalle_contact`, `Notif_modification`, `Notif_commentaire`, `id_expediteur`, `id_evenement`, `id_destinataire`) VALUES
(1, 0, NULL, NULL, NULL, NULL, 1, 26),
(2, 0, NULL, NULL, NULL, NULL, 6, 1),
(3, 0, NULL, NULL, NULL, NULL, 2, 26),
(4, 0, NULL, NULL, NULL, 30, 4, 12),
(5, 0, NULL, NULL, NULL, 12, 3, 13),
(6, 0, NULL, NULL, NULL, NULL, 3, 11),
(7, 0, NULL, NULL, NULL, 11, 4, 1),
(8, 0, NULL, NULL, NULL, 11, 4, 30);

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
(4, 'Bucy.jpg'),
(5, 'brocante.jpg'),
(6, '1D.jpg'),
(7, 'bercy.jpg'),
(8, 'album-1D.jpg'),
(10, 'Atelier-d-artistes.jpg'),
(12, 'marche-noel.jpg'),
(22, 'audypods-6e58d0bc086864f96ca4eb79b17fc3ef.jpg'),
(24, 'Ohhopi-e31490012ff2315d36e21d24b8830575.jpg'),
(25, 'KevinDu38-f790f33d9e998b99b063942ce4b4f55b.png'),
(26, 'eb3b6c9b8226f06d718eca351141b69a.png'),
(27, 'b27e0ec4f14220a84f6d462d917c2051.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `media_commentaire`
--

DROP TABLE IF EXISTS `media_commentaire`;
CREATE TABLE `media_commentaire` (
  `id_commentaire` int(10) UNSIGNED NOT NULL,
  `id_media` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(6, 12),
(2, 26);

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
  `description` text COLLATE utf8_bin,
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
(1, 'KevinDu38', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', 0, '', '', NULL, 'tristan.muratore@gmail.com', '', '', 4, 0, NULL, NULL, '2016-01-17 13:12:59'),
(11, 'audypods', '$2y$10$1ukYXE5bELmYuk0Vy6eCS.6yqt62tMmt.3sS6SOknq3jdQDjcA9RW', 1, 'Roussel', 'Audrey', NULL, 'avc1.roussel@orange.fr', '0636504053', 'J''aime les bonbons', 3, 0, 22, 31, '2016-01-17 10:07:02'),
(13, 'Oreo', '$2y$10$bUkDzeoRppk8cpf9cFNVZuBv20YrA6WR0xQFrSIEtTb1syPnsAfdq', 0, 'Oreo', 'De Maricourt', '2013-06-12', 'immannaqiw-8312@yopmail.com', '0648938274', NULL, 1, 0, NULL, NULL, NULL),
(14, 'Apolito', '$2y$10$9oWgmLVIKzneQ35dFJnC..6FU/O.jvlDECAVmcf2D.WP22VYeEVOi', 0, 'Roussel', 'Apollo', '2005-06-23', 'uffatyxo-7830@yopmail.com', '0475893049', NULL, 1, 0, NULL, NULL, NULL),
(15, 'Marie1012', '$2y$10$Ap5.9DnuKeqRPGXFvSSQa.GLTwCJlHA2VJZ0vgRyBhFViVKidQ3GC', 1, 'Dupuis', 'Marie', '1995-03-07', 'wessysixi-0093@yopmail.com', '0638948596', NULL, 1, 0, NULL, NULL, NULL),
(16, 'Lily01', '$2y$10$BnEMRwBKk.PEzVtTrLdkduvZbiQwduiwdhnyXErXGeJcotWpaU.wm', 0, 'Roussel', 'Lily', '2012-12-15', 'disottido-2441@yopmail.com', '0160721862', NULL, 1, 0, NULL, NULL, NULL),
(17, 'JulesDDB', '$2y$10$pVzl1l0hVAXnxKAYRegwVuC4lD2HbzJRPjrFslM7JkWOJeUla9/y.', 0, 'Tedier', 'Jules', '1967-08-07', 'hyfoppomedd-7135@yopmail.com', '0608889412', NULL, 1, 0, NULL, NULL, NULL),
(18, 'Ellie-smiley', '$2y$10$lKjDdiLOKADUFTR1./hLcOYsckzoPCRsJ2DRVnMZIrRPvpxr25LJi', 1, 'Roussel', 'Eleanor', '1999-05-05', 'rirrajeku-4560@yopmail.com', '0567899003', NULL, 1, 0, NULL, NULL, NULL),
(19, 'carolita', '$2y$10$HvzGdnAoOWpRLi83gP2/oO/aClccecWzC4mK5Vt1vSriFS.HoP.TO', 1, 'Endicott', 'Carole', '1993-01-10', '', '0729384789', NULL, 1, 0, NULL, NULL, NULL),
(20, 'Mamie45', '$2y$10$9sx6XwuSB6Pfmk0iJGOt/usZSYdFUSMGgavg9XPZ1FGOgTovrY1ee', 1, 'Burgo', 'Michelle', '1940-03-11', 'sovibagu-0060@yopmail.com', '0656738940', NULL, 1, 0, NULL, NULL, NULL),
(21, 'Upsy', '$2y$10$VMUVYOTdw0nUdLxFtNdLMetGUC76c7D.f6qXyjlOOGU3GM3fd11eK', 0, 'Quentin', 'De Roux', '1970-12-28', 'arrefferu-3945@yopmail.com', '0536475897', NULL, 1, 0, NULL, NULL, NULL),
(22, 'Pilou22', '$2y$10$qabjRfkBJB1fJaFKL0K2vuhQkKyzLNbwdPIPIa8EMVDLEoruU3Fj6', 0, 'Dubros', 'Maxime', '1986-05-23', 'ehasojah-2431@yopmail.com', '0148590329', NULL, 1, 0, NULL, NULL, NULL),
(23, 'claire38', '$2y$10$ELbKb.dWooIdaaya5Ht71eJyqvvu8rzLa7G/.GPghxr/mcnPBnZsu', 1, 'Jouault', 'Claire', '1989-02-23', 'ecezoffa-1465@yopmail.com', '0748950394', NULL, 0, 0, NULL, NULL, NULL),
(24, 'tomito', '$2y$10$FjpRjRJmy8VfUxNAP5P0deOyJ9OdXIzJDI/Phf1tj3EUYuYuF25H6', 0, 'Seligman', 'Tom', '1990-02-07', 'wazappofall-9459@yopmail.com', '0467899384', NULL, 0, 0, NULL, NULL, NULL),
(25, 'aurelienshz', '$2y$10$JRL77TcLs6l1wgiGIFeJBe9wCaKwGEeoHkoBsdLnYEQfjvI2xuh8m', NULL, NULL, NULL, NULL, 'aurelien.schiltz@free.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(26, 'Ohhopi', '$1$1gauBPwl$OZVvkbz3.qz4KasFYX7Te/', 0, 'Tristan', 'Muratore', '1995-03-26', '', '0686105151', 'Salutations !', 1, 0, 24, 33, '2015-12-18 14:55:12'),
(28, 'glachaud', '$2y$10$3TUcbmtR4DFiri7KKKun8OOX4xcAv1gFu4/aYednQPTGDNPkbEMr2', 0, 'Lachaud', 'Guillaume', '1994-11-21', 'guillaume.lachaud78@gmail.com', '0687910379', 'J''aime le hand !', 0, 0, NULL, NULL, '2015-12-08 08:18:56'),
(29, 'testeur', '$2y$10$B.oPCQC0GXfGE654UoH4fOylPMPeTBuk4IxzKj5ChHbTVUF7OCt.O', NULL, NULL, NULL, NULL, 'mohamed.sellami@isep.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(30, 'audypods1', '$2y$10$JqyppcrYhWPACnQ/nNYFhOOr27.YRzZ8KXWWLQUIbzG6Q/khgS132', 0, '', '', '0000-00-00', 'audrey.roussel-endicott@gmail.com', '', '', 1, 0, NULL, NULL, '2016-01-17 10:06:22'),
(33, 'Aure', '$2y$10$iCEliVtHW.i6OCRK0k7jo.jXR8rp9VxVIpUg0tq.ruQQcqsfuSIfW', NULL, NULL, NULL, NULL, 'a@b.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(34, 'AAA', '$2y$10$fiR3e/Sz927OHB.MFcQ.7OK.7NppB7RXDqXxg.V8xnfKhKgyMcMri', NULL, NULL, NULL, NULL, 'aaa@bb.fr', NULL, NULL, 0, 0, NULL, NULL, NULL),
(35, 'AAAA', '$2y$10$OYfgC6ZjqkCN0S154bNPqO.IJptm.sJcAa/sx56H9r8xqQll0yG1C', 1, 'Ol''Dirty', 'Ol''Dirty''Bastards', '0000-00-00', 'aaaa@a.q', '0611111111', '', 0, 0, NULL, 22, '2015-12-12 20:00:13'),
(36, 'Kev', '$2y$10$9RcCLpmFGXbyLSx4BGme4uxksUEclagOkFEc5OTadcLmfCeiP4Dpa', NULL, NULL, NULL, NULL, 'kev@gmail.com', NULL, NULL, 0, 0, NULL, NULL, '2015-12-13 17:34:36'),
(37, 'Skippy', '$2y$10$PVcVS1VrH51SkT4wJB8GqOa5S5vTJ8q21u5BzFdI8fXACl3jYtUk6', 0, 'Macdo', 'Rene', '1998-10-31', 'suzomyxux-9732@yopmail.com', '0627347370', 'J''adore le beurre de cacahuète', 0, 0, NULL, 29, '2015-12-14 15:07:54'),
(38, 'suceurdequeue', '$2y$10$q2pp8R2nTc9m2Jc.tACZQO0xr9XpQaUV/LWx.wyYwWttKXpie65QW', 0, 'Suceur', 'De Queue', '1995-04-17', 'lol@mail.com', '0606060606', 'JE SUCE DES QUEUES', 0, 0, NULL, 30, '2015-12-14 15:23:46'),
(39, 'Esthouille', '$2y$10$RJKYtiX1zwLjaHVtSt8WdOhSB1IfpwYpRB9z1W9gGG6k53Lkt8hIi', NULL, NULL, NULL, NULL, 'fedykagil-6061@yopmail.com', NULL, NULL, 0, 0, NULL, NULL, NULL),
(40, 'Doudou', '$2y$10$GxWhaj.WYiD3r1RF1b9TzOTjM.FcqlDx3IkQ2im/Y2jo2hX59ikty', NULL, NULL, NULL, NULL, 'aude.demaricourt@hotmail.com', NULL, NULL, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_topic` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `id_auteur`, `date_modification`, `id_topic`) VALUES
(1, 'le parc des buttes chaumont est sympa', 13, '2016-01-11 07:59:37', 3),
(3, 'coucou', 11, '2016-01-11 16:06:14', 2),
(4, 'je suis heureuse!!\r\n', 11, '2016-01-11 16:07:16', 2),
(5, 'Le parc des buttes chaumont', 11, '2016-01-11 16:08:36', 4),
(6, 'bonjour', 30, '2016-01-11 19:30:16', 2),
(7, 'Le mk2 est sympatique :)', 11, '2016-01-11 19:32:41', 7),
(10, 'uohuh', 11, '2016-01-14 09:31:54', 5),
(13, 'ca c''est sur', 11, '2016-01-15 20:45:10', 8);

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

DROP TABLE IF EXISTS `message_prive`;
CREATE TABLE `message_prive` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenu` text COLLATE utf8_bin NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL,
  `date_publication` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_destinataire` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `message_prive`
--

INSERT INTO `message_prive` (`id`, `contenu`, `id_auteur`, `date_publication`, `id_destinataire`) VALUES
(1, 'le parc des buttes chaumont est sympa', 13, '2016-01-11 07:59:37', 3),
(3, 'coucou', 11, '2016-01-11 16:06:14', 2),
(4, 'je suis heureuse!!\r\n', 11, '2016-01-11 16:07:16', 2),
(5, 'Le parc des buttes chaumont', 11, '2016-01-11 16:08:36', 4),
(6, 'bonjour', 30, '2016-01-11 19:30:16', 2),
(7, 'Le mk2 est sympatique :)', 11, '2016-01-11 19:32:41', 7),
(10, 'uohuh', 11, '2016-01-14 09:31:54', 5),
(11, 'test de message privé', 1, '2016-01-16 23:07:11', 11),
(12, 'test numéro 2 de message privé', 1, '2016-01-16 23:07:26', 11);

-- --------------------------------------------------------

--
-- Structure de la table `modere`
--

DROP TABLE IF EXISTS `modere`;
CREATE TABLE `modere` (
  `id_evenement` int(10) UNSIGNED NOT NULL,
  `id_organisateur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `modere`
--

INSERT INTO `modere` (`id_evenement`, `id_organisateur`) VALUES
(6, 1),
(6, 12),
(6, 24),
(1, 14),
(2, 23),
(2, 18),
(2, 12);

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

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id`, `titre`, `description`) VALUES
(1, 'Aide', 'Pour régler les problèmes que vous rencontrez avec le site'),
(2, 'Discussions', 'Discussions entre membres');

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
  `message` text COLLATE utf8_bin NOT NULL,
  `id_section` int(10) UNSIGNED NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `titre`, `message`, `id_section`, `id_auteur`, `date_creation`) VALUES
(1, 'Je n''arrive pas à me connecter', '', 1, 13, '2016-01-05 12:00:00'),
(2, 'Comment accéder à la page d''aide', '', 1, 14, '2016-01-04 18:00:00'),
(3, 'Des idées de sortie pour les enfants?', 'Je cherche quelque chose à faire avec mes enfants pendant les vacances', 2, 15, '2016-01-06 06:00:00'),
(4, 'Meilleur endroit pour un pique-nique à Paris?', '', 2, 16, '2016-01-03 13:00:00'),
(5, 'Comment changer de mot de passe?', 'Je souhaiterais changer de mot de passe, mais je ne sais pas comment faire. Pourriez-vous m''aider?', 1, 30, '2016-01-07 09:29:04'),
(6, '', '', 0, 1, '2016-01-09 16:41:07'),
(7, 'Cinéma Paris 19', 'Quel cinéma préférez-vouz à Paris 19?', 2, 30, '2016-01-11 02:41:19'),
(8, 'Je n''arrive pas à acceder à la page sujet', 'C''est bien triste', 1, 30, '2016-01-11 15:08:18'),
(12, 'Bonnes recettes de fraisier?', 'Salut à tous!\r\nJe suis fan de patisserie et je cherche une super recette de fraisier car je rate tout le temps les miens! Vous en avez?', 2, 12, '2016-01-14 23:30:26');

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
(6, 'Vente privée'),
(7, 'Brocante'),
(8, 'Exposition'),
(9, 'Rassemblement'),
(10, 'Autre');

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
  `old_email` tinytext COLLATE utf8_bin,
  `token` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `verification_membre`
--

INSERT INTO `verification_membre` (`email`, `old_email`, `token`) VALUES
('a@b.fr', NULL, '186ebc69f9d94df4763bebdc89d4c5c0b6eb5022'),
('aaa@bb.fr', NULL, '43b89061b99ca40f0c07299c54161398ae714057'),
('aaaa@a.q', NULL, '19d5c8f17782eb11afd48b9eded9fce18bb9eff0'),
('arrefferu-3945@yopmail.com', NULL, '01f8973cdd06605620daf50f64cf083c644d70cd'),
('aude.demaricourt@gmail.com', NULL, '42c627e9c528c3e24c00b3c48030d5d2beeb0186'),
('aude.demaricourt@hotmail.com', NULL, 'fe8f2f71c759343e54928330c632f3f6ed0be6f8'),
('aurelien.schiltz@free.fr', NULL, '200f3413ffc0781d311c282b0e94041109856b51'),
('avc1.roussel@orange.fr', NULL, '305d97c347258f160553be568370d147593f57ed'),
('disottido-2441@yopmail.com', NULL, '288ca915db394e33c15b5b379257239a73a116ba'),
('ecezoffa-1465@yopmail.com', NULL, '2f7448c1581e49b36b5b8dd305a1ae23deae096e'),
('ehasojah-2431@yopmail.com', NULL, '4cf4ea692610670c5969b17cbeefba70f319708e'),
('fedykagil-6061@yopmail.com', NULL, '03aed0cf533a0b8cc34227219e9d120866f02032'),
('guillaume.lachaud78@gmail.com', NULL, '5512ba0b153ac087936e7845caabc04cb3cb116c'),
('hyfoppomedd-7135@yopmail.com', NULL, '480e3569a9c9da25f957dbaee40cab3d99ee6ad3'),
('imessowik-4717@yopmail.com', NULL, '23847afc591526e12fde74c6b4479b0cb2511682'),
('immannaqiw-8312@yopmail.com', NULL, '09c7ac590a1587be9222e28d4950309c2c54e816'),
('kev@gmail.com', NULL, 'c9ee71ad993353ffb901b806a307ea0ab84650ba'),
('lol@mail.com', NULL, 'f030d237fbb686bfd5d2c62417f746bff0471230'),
('mohamed.sellami@isep.fr', NULL, '91e2fb0e39ebb1301713473e306593f641c6a7b9'),
('ohh@gmail.com', NULL, '8ce28311b4062d506a65de630c64dd7f2417bf02'),
('ohhopi@gmail.com', NULL, '1d063ce43653e972a297a6ccc8af48a5d50afb83'),
('rirrajeku-4560@yopmail.com', NULL, '07c5cd25552905351828d5ce121c156373e76b65'),
('sovibagu-0060@yopmail.com', NULL, '5f1493d47d5f6317684c597b05c45c3cde363ce7'),
('suzomyxux-9732@yopmail.com', NULL, '160fe4b16f285a7869dbd96f50bd75c4053eecd3'),
('test@test.com', NULL, '51ea0a2bdb621542be75b7fbe3d38f4995627200'),
('tristan.muratore@gmail.com', NULL, 'c342d1b7c915e6c1a6b832bdef9c24f6e88278f0'),
('uffatyxo-7830@yopmail.com', NULL, 'b8fc73715407e2f2af7c27b9e82f52d800dacd7c'),
('wazappofall-9459@yopmail.com', NULL, 'd834609ec881b9b0e755d9261d257ab395f02087'),
('wessysixi-0093@yopmail.com', NULL, '987f85d73be3f377a47ddf59f6cd87aee6bd0c57');

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
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD UNIQUE KEY `nom` (`nom`);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `demande_aide`
--
ALTER TABLE `demande_aide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `message_prive`
--
ALTER TABLE `message_prive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
