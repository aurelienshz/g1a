<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/

// Appels au modèle
// Appels au modèle

splash('validation', 'Tout s\'est bien passé !');

// Chargement des paramètres de la page
$title = 'Affichage d\'un évènement';
$styles = ['events.css','form.css'];


$contents['titreEvenement'] = 'Pique-nique au lac';

/**** Affichage de la page ****/
//Appels des vues :
vue(['display'], $styles, $title, $contents);
