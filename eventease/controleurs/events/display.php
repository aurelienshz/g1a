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

$event = getEvents($_GET['id']);
$contents['titreEvenement'] = $event['titre'];
$contents['tarif'] = $event['tarif'];
$contents['type_public']=$event['type_public'];
$contents['description']=$event['description'];
$contents['site']=$event['site'];
switch ($event['langue']){
  case 0:
    $contents['langue']='Français';
    break;
  case 1:
    $contents['langue']='Anglais';
    break;
}
if ($event['langue']===NULL) {
  $contents['langue']='muet';
}
/*$contents['titreEvenement'] = 'Ça finira par marcher';*/

/**** Affichage de la page ****/
//Appels des vues :
vue($blocks, $styles, $title, $contents, $scripts);
