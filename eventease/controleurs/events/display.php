<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/

// Appels au modèle
// Appels au modèle

// Chargement des paramètres de la page
$title = 'Affichage d\'un évènement';
$styles = ['events.css','form.css'];

/**** Affichage de la page ****/
//Appels des vues :
vue(['display'], $styles, $title);
