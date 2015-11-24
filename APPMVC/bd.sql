-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 05 Décembre 2013 à 19:03
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `APP-MVC`
--
CREATE DATABASE `APP-MVC` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `APP-MVC`;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` text COLLATE utf8_unicode_ci NOT NULL,
  `mdp` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `identifiant`, `mdp`) VALUES
(1, 'matthieu', '202cb962ac59075b964b07152d234b70'),
(2, 'raja', '202cb962ac59075b964b07152d234b70'),
(3, 'zakia', '202cb962ac59075b964b07152d234b70'),
(4, 'jeremy', '202cb962ac59075b964b07152d234b70');
