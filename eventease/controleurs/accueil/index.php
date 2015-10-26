<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/
// Chargement des paramètres de la page
$title = 'Accueil';
$styles = ['accueil.css'];

// Appels au modèle
// Appels au modèle

/**** Affichage de la page ****/

//Appels des vues :

require INCLUDES.'header.php'; //header commun à toutes les pages
require 'vues/accueil/index.php'; //vue spécifique à l'accueil
require INCLUDES.'footer.php'; //footer commun à toutes les pages