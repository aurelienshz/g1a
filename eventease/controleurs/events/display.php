<?php
/**** Préparation des contenus ****/

// Appels au modèle
// Appels au modèle

// Chargement des paramètres de la page
$title = 'Affichage d\'un évènement';
$styles = ['events.css','trololo.css'];

/**** Affichage de la page ****/
//Appels des vues :
require INCLUDES.'header.php'; //header commun à toutes les pages
require 'vues/events/display.php'; //vue spécifique à l'affichage d'evt
require INCLUDES.'footer.php';      //footer commun à toutes les pages