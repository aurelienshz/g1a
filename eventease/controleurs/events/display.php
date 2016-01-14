<?php
/* AFFICHAGE D'UN EVENEMENT */
/**** Préparation des contenus ****/


// Appels au modèle
// Appels au modèle
require MODELES.'events/getEventDetails.php';
require MODELES.'events/insert_comment.php';
require MODELES.'events/checkParticipation.php';
require MODELES.'events/getMembersPicture.php';
require MODELES.'events/getEventPicture.php';
if (!empty($_POST) && !empty($_POST['comment'])) {

  insert_comment($_POST['comment'], $_GET['id'], $_SESSION['id']);
  header("Location: ". getLink(['events','display',$_GET['id']]));
}
// Chargement des paramètres de la page
$event = getEvents($_GET['id']);
/*?><pre><?php var_dump($event); ?></pre><?php*/
$contents['titreEvenement'] = $event['titre'];

$title = $event['titre'];
$styles = ['events.css','form.css','simple-slideshow.css'];
$scripts = ['alert.js','simple-slideshow.js', 'participate.js'];
$blocks = ['display'];

// Affectation des valeurs spécifiques à l'event :
// @ Guillaume & Aude : si l'event n'est pas trouvé, il faut rediriger vers getLink(['accueil','404'])
$type = eventType($_GET['id']);
$contents['type']=$type[0];

$photo_principale =getEventPicture($_GET['id']);
if($photo_principale){
  $contents['photo_principale']=PHOTO_EVENT.$photo_principale[0];
}
else{
  switch($event['id_type']){
    case 1:
      $contents['photo_principale']="vues/assets/images/picnic1.jpg";
      break;
    case 2:
      $contents['photo_principale']="vues/assets/images/concertType.jpg";
      break;
    case 3:
      $contents['photo_principale']="vues/assets/images/ravepartyType.jpg";
      break;
    case 6:
      $contents['photo_principale']="vues/assets/images/ventepriveeType.jpg";
      break;
    case 7:
      $contents['photo_principale']="vues/assets/images/brocanteType.jpg";
      break;
    case 8:
      $contents['photo_principale']="vues/assets/images/expositionType.jpg";
      break;
    case 9:
      $contents['photo_principale']="vues/assets/images/rassemblementType.jpg";
      break;
    case 10:
      $contents['photo_principale']="vues/assets/images/logo.jpg";
      break;
    default:
      break;
  }
}

$site = sponsor($_GET['id']);
$contents['sponsor']=$site[0];

$images = getImages($_GET['id']);
$contents['images']=$images;;

$creators=getCreators($_GET['id']);
$contents['creators']=$creators;
$i=0;
foreach($contents['creators'] as $organisateur){
    $organisateur_photo = getMembersPicture($organisateur['id']);
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
$i=0;
foreach($contents['comment'] as $commentateur){
    $commentateur_photo = getMembersPicture($commentateur['id']);
    if ($commentateur_photo){
      $contents['comment'][$i]['picture']=PHOTO_PROFIL.$commentateur_photo[0];
      $i++;
    }
    else{
      $contents['comment'][$i]['picture']="vues/assets/images/photo_profil_defaut.jpg";
      $i++;
    }
}

$participants= getParticipants($_GET['id']);
$contents['participants']=$participants;
$i=0;
foreach($contents['participants'] as $participant){
  $participant_photo = getMembersPicture($participant['id']);
  if ($participant_photo){
    $contents['participants'][$i]['picture']=PHOTO_PROFIL.$participant_photo[0];
    $i++;
  }
  else{
    $contents['participants'][$i]['picture']="vues/assets/images/photo_profil_defaut.jpg";
    $i++;
  }
}

$adresse = getAdress($_GET['id']);
$contents['adresse']=$adresse;

$contents['tarif'] = $event['tarif'];

if($event['max_participants']){
  $contents['max_participants']=$event['max_participants'];
}
else{
  $contents['max_participants']="Non renseigné";
}

$contents['age_min']=$event['age_min'];
$contents['age_max']=$event['age_max'];

$contents['description']=$event['description'];

if($event['site']){
  $contents['site']=$event['site'];
}
else{
  $contents['site']="Non renseigné";
}

if($event['organisateur']){
  $contents['info_organisateur']=$event['organisateur'];
}
else{
  $contents['info_organisateur']="Non renseigné";
}

if($event['site']){
  $contents['site']="<li><a href=\"" . $contents['site'] . "\">" . $contents['site'] ." </a></li>";
}
else{
  $contents['site']="<li>Non renseigné</li>";
}

$creator=getCreator($_GET['id']);
$contents['creator']=$creator;
$creator_photo = getMembersPicture($creator[0][1]);
if ($creator_photo){
  $contents['creator']['picture']=PHOTO_PROFIL.$creator_photo;
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
  if((!checkParticipation($_GET['id'],$_SESSION['id']) ||$_SESSION['id']==$contents['creator'][0]['id']) && $event['visibilite']==1){
    header('Location: '.getLink(['accueil','404']));
    exit();
  }
  $participe = checkParticipation($_GET['id'],$_SESSION['id']);
  if($participe){
    $contents['participe']='Ne participe plus';
  }
  else{
    $contents['participe']='Participe';
  }
  if ($_SESSION['id']==$contents['creator'][0]['id']){
    $contents['statut_de_participation']="<div id=\"statut_de_participation\">Vous êtes le créateur de cet événement</div>";
  }
  foreach($contents['creators'] as $moderateur)
    if ($_SESSION['id']==$moderateur['id'] && (!empty(['statut_de_participation']))){
      $contents['statut_de_participation']="<div id=\"statut_de_participation\">Vous modérez cet événement</div>";
    }
    else{
      $contents['statut_de_participation']="";
    }
    foreach($contents['participants'] as $participant){
      if ($_SESSION['id']==$participant['id'] && (empty($contents['statut_de_participation']))){
        $contents['statut_de_participation']="<div id=\"statut_de_participation\">Vous participez à cet événement</div>";
      }
      else{
        $contents['statut_de_participation']="";
      }
    }
  }
else{
  $contents['statut_de_participation']="";
  if($event['visibilite']==1){
    header('Location: '.getLink(['accueil','404']));
    exit();
  }
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
