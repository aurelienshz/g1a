<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/


// Appels au modèle
// Appels au modèle
require MODELES.'events/getEvents.php';

// Chargement des paramètres de la page
$event = getEvents($_GET['id']);
$contents['titreEvenement'] = $event['titre'];

$title = $event['titre'];
$styles = ['events.css','form.css'];
$scripts = ['alert.js','slideshow.js','slideshow_event.js'];
$blocks = ['display'];

// Affectation des valeurs spécifiques à l'event :
// @ Guillaume & Aude : si l'event n'est pas trouvé, il faut rediriger vers getLink(['accueil','404'])
$type = EventType($_GET['id']);
$contents['type']=$type[0];
$site = Sponsor($_GET['id']);
$contents['sponsor']=$site[0];
$images = GetImages($_GET['id']);
$contents['images']=$images;;
$creators=GetCreators($_GET['id']);
$contents['creators']=$creators;
$comment = GetComments($_GET['id']);
$contents['comment']=$comment;
$participants= GetParticipants($_GET['id']);
$contents['participants']=$participants;
$adresse = GetAdress($_GET['id']);
$contents['adresse']=$adresse;
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
$contents['date_debut'] = date('Y-m-d',strtotime($event['debut']));
$contents['date_fin'] = date('Y-m-d',strtotime($event['fin']));
list($contents['year_begin'], $contents['month_begin'], $contents['day_begin'])=explode ('-', $contents['date_debut']);
list($contents['year_end'], $contents['month_end'], $contents['day_end'])=explode ('-', $contents['date_fin']);
$contents['heure_debut'] = date('H:i:s',strtotime($event['debut']));
$contents['heure_fin'] = date('H:i:s',strtotime($event['fin']));
/**** Affichage de la page ****/
if(isset($_GET['id'])) {}
else {alert('error','La page demandée n\'a pas été trouvée. Vous avez été redirigé vers l\'accueil.');
header('Location: '.getLink(['accueil']));
exit();}
//Appels des vues :
vue($blocks, $styles, $title, $contents, $scripts );
