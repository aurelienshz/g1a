<?php

// entrée : id du membre dont on veut les prochains évènements
// sortie : détails des évènements à venir du membre, sous forme d'un tableau
// La sortie **doit** être **ordonnée chronologiquement** (sinon tu casses tout)

function getEvents($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT * FROM evenement WHERE id = :id');
      $query-> execute(['id'=>$id]);
      $event = $query->fetch();

      return $event;
}
function EventType($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT type.nom FROM evenement, type WHERE evenement.id_type=type.id AND evenement.id= :id');
  $query-> execute(['id'=>$id]);
  $type = $query->fetch();

  return $type;
}
function Sponsor($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT sponsor.nom FROM evenement, sponsor, sponsorize WHERE evenement.id=sponsorize.id_evenement AND sponsorize.id_sponsor = sponsor.id AND evenement.id= :id');
  $query-> execute(['id'=>$id]);
  $site = $query->fetch();

  return $site;
}
function GetImages($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT media.lien FROM evenement, media, media_evenement WHERE evenement.id= media_evenement.id_evenement AND media_evenement.id_media = media.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $images = $query->fetch();

  return $images;
}
function GetCreator($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT membre.pseudo FROM evenement, membre, organise WHERE evenement.id= organise.id_evenement AND organise.id_organisateur = membre.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $creator = $query->fetch();

  return $creator;
}
function GetComments($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT commentaire.message FROM commentaire, evenement WHERE commentaire.id_evenement=evenement.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $comment = $query->fetch();

  return $comment;
}
