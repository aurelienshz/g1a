<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/


// Appels au modèle
// Appels au modèle
require MODELES.'events/getEvents.php';


// Chargement des paramètres de la page
$title = "'Affichage d\'un évènement'";
$styles = ['events.css','form.css'];
$scripts = ['alert.js','slideshow.js','slideshow_event.js'];
$blocks = ['display'];

// Affectation des valeurs spécifiques à l'event :
// @ Guillaume & Aude : si l'event n'est pas trouvé, il faut rediriger vers getLink(['accueil','404'])
$event = getEvents($_GET['id']);
$type = EventType($_GET['id']);
$contents['type']=$type[0];
$site = Sponsor($_GET['id']);
$contents['sponsor']=$site[0];
$images = GetImages($_GET['id']);
$contents['images']=$images[0];
$creator=GetCreator($_GET['id']);
$contents['creator']=$creator[0];
$comment = GetComments($_GET['id']);
$contents['comment']=$comment[0];
$contents['titreEvenement'] = $event['titre'];
$contents['tarif'] = $event['tarif'];
$contents['age_min']=$event['age_min'];
$contents['age_max']=$event['age_max'];
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
switch ($event['confidentiel']){
  case 0:
    $contents['visibilite']='Public';
    break;
  case 1:
    $contents['visibilite']='Privé';
    break;
}
$contents['date'] = date('Y-m-d',strtotime($event['debut']));
list($contents['year'], $contents['month'], $contents['day'])=explode ('-', $contents['date']);
$contents['heure_debut'] = date('H:i:s',strtotime($event['debut']));
$contents['heure_fin'] = date('H:i:s',strtotime($event['fin']));
/**** Affichage de la page ****/
//Appels des vues :
vue($blocks, $styles, $title, $contents, $scripts );
