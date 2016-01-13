<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/


// Appels au modèle
// Appels au modèle
require MODELES.'events/getEventDetails.php';
require MODELES.'events/insert_comment.php';
require MODELES.'events/checkParticipation.php';
require MODELES.'events/getPicture.php';
if (!empty($_POST) && !empty($_POST['comment'])) {

  insert_comment($_POST['comment'], $_GET['id'], $_SESSION['id']);
  header("Location: ". getLink(['events','display',$_GET['id']]));
}
// Chargement des paramètres de la page
$event = getEvents($_GET['id']);
$contents['titreEvenement'] = $event['titre'];

$title = $event['titre'];
$styles = ['events.css','form.css'];
$scripts = ['alert.js','slideshow.js','slideshow_event.js', 'participate.js'];
$blocks = ['display'];

// Affectation des valeurs spécifiques à l'event :
// @ Guillaume & Aude : si l'event n'est pas trouvé, il faut rediriger vers getLink(['accueil','404'])
$type = eventType($_GET['id']);
$contents['type']=$type[0];

$site = sponsor($_GET['id']);
$contents['sponsor']=$site[0];

$images = getImages($_GET['id']);
$contents['images']=$images;;

$creators=getCreators($_GET['id']);
$contents['creators']=$creators;
$i=0;
foreach($contents['creators'] as $organisateur){
    $organisateur_photo = getPicture($organisateur['id']);
    if ($organisateur_photo){
      $contents['creators'][$i]['picture']=PHOTO_PROFIL.$organisateur_photo[0];
      $i++;
    }
    else{
      $contents['creators'][$i]['picture']="vues/assets/images/photo_profil_defaut.jpg";
      $i++;
    }
}
$comment = getComments($_GET['id']);
$contents['comment']=$comment;

$participants= getParticipants($_GET['id']);
$contents['participants']=$participants;
$i=0;
foreach($contents['participants'] as $participant){
  $participant_photo = getPicture($participant['id']);
  if ($participant_photo){
    $contents['participants'][$i]['picture']=PHOTO_PROFIL.$participant_photo[0];
    $i++;
  }
  else{
    $participant['creators'][$i]['picture']="vues/assets/images/photo_profil_defaut.jpg";
    $i++;
  }
}
$adresse = getAdress($_GET['id']);
$contents['adresse']=$adresse;

$contents['tarif'] = $event['tarif'];

$contents['age_min']=$event['age_min'];
$contents['age_max']=$event['age_max'];

$contents['description']=$event['description'];

$contents['site']=$event['site'];

$creator=getCreator($_GET['id']);
$contents['creator']=$creator;
$creator_photo = getPicture($creator[0][1]);
if ($creator_photo){
  $contents['creator']['picture']=$creator_photo;
}
else{
  $contents['creator']['picture']="vues/assets/images/photo_profil_defaut.jpg";
}

$contents['id_evenement']=$_GET['id'];

switch ($event['langue']){
  case 0:
    $contents['langue']='Français';
    break;
  case 1:
    $contents['langue']='Anglais';
    break;
}
switch ($event['visibilite']){
  case 0:
    $contents['visibilite']='Public';
    break;
  case 1:
    $contents['visibilite']='Privé';
    break;
}
if (isset($_SESSION['id'])){
  $participe = checkParticipation($_GET['id'],$_SESSION['id']);
  if($participe){
    $contents['participe']='Ne participe plus';
  }
  else{
    $contents['participe']='Participe';
  }
}
else{
  $contents['participe']='Participe';
}
$contents['date_debut'] = date('Y-m-d',strtotime($event['debut']));
$contents['date_fin'] = date('Y-m-d',strtotime($event['fin']));
list($contents['year_begin'], $contents['month_begin'], $contents['day_begin'])=explode ('-', $contents['date_debut']);
list($contents['year_end'], $contents['month_end'], $contents['day_end'])=explode ('-', $contents['date_fin']);
$contents['heure_debut'] = date('H:i',strtotime($event['debut']));
$contents['heure_fin'] = date('H:i',strtotime($event['fin']));
/**** Affichage de la page ****/
if(isset($_GET['id'])) {
  if(!$event){
    header('Location: '.getLink(['accueil','404']));
    exit();
  }
    // test sur la valeur
}
else {
    // alert('error','La page demandée n\'a pas été trouvée. Vous avez été redirigé vers l\'accueil.');
    header('Location: '.getLink(['accueil','404']));
    exit();
}
//Appels des vues :
vue($blocks, $styles, $title, $contents, $scripts );
