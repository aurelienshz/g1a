<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/
// Chargement des paramètres de la page
$title = 'Profil';
$styles = ['onglets_compte.css','membres.css'];

// Appels au modèle
// Appels au modèle

// Traitements

/**** Affichage de la page ****/

//Appels des vues :

require INCLUDES.'header.php'; //header commun à toutes les pages
require 'vues/membres/onglets_compte.php'; //onglets des pages du compte
require 'vues/membres/profil.php'; //vue spécifique à l'accueil
require INCLUDES.'footer.php'; //footer commun à toutes les pages