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
  $images = $query->fetchALL();

  return $images;
}
function GetCreators($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT  membre.pseudo, membre.id, media.lien FROM media, evenement, membre, organise WHERE media.id = membre.id_photo AND evenement.id= organise.id_evenement AND organise.id_organisateur = membre.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $creators = $query->fetchALL();

  return $creators;
}
function GetCreatorimage($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
}
function GetParticipants($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT  membre.pseudo, membre.id, media.lien FROM media, evenement, membre, invitation WHERE media.id = membre.id_photo AND invitation.id_evenement=evenement.id AND invitation.id_destinataire = membre.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $participants = $query->fetchALL();

  return $participants;
}
function GetComments($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT membre.pseudo, commentaire.message, commentaire.timestamp, media.lien , membre.id FROM media, membre, commentaire, evenement WHERE membre.id = commentaire.id_membre AND media.id = membre.id_photo AND membre.id=commentaire.id_membre AND commentaire.id_evenement=evenement.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $comment = $query->fetchALL();

  return $comment;
}
function GetAdress($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT adresse.adresse_condensee FROM evenement, adresse WHERE evenement.id_adresse = adresse.id AND evenement.id =:id');
  $query-> execute(['id'=>$id]);
  $adresse = $query->fetch();

  return $adresse;
}
