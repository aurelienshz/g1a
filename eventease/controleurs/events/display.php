<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/

// Appels au modèle
// Appels au modèle
require MODELES.'events/getEvents.php';

// Chargement des paramètres de la page
$title = 'Affichage d\'un évènement';
$styles = ['events.css','form.css'];
$scripts = ['alert.js','slideshow.js','slideshow_event.js'];
$blocks = ['display'];

$event = getEvents($parametres['display']);
$contents['titreEvenement'] = $event['titre'];


/**** Affichage de la page ****/
//Appels des vues :
vue(['display'], $styles, $title, $contents, $scripts);
