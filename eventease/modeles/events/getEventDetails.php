<?php

// entrée : id du membre dont on veut les prochains évènements
// sortie : détails des évènements à venir du membre, sous forme d'un tableau

function getEvents($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);

      $query = $bdd->prepare('SELECT evenement.* FROM evenement WHERE evenement.id = :id;');
      $query-> execute([':id'=>$id]);
      $event = $query->fetch();

      return $event;
}
function getEventName($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);

      $query = $bdd->prepare('SELECT evenement.titre FROM evenement WHERE evenement.id = :id;');
    $query->execute(['id'=>$id]);
    $name = $query->fetchAll(PDO::FETCH_ASSOC);

      return $name;
}
function eventType($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT type.nom FROM evenement, type WHERE evenement.id_type=type.id AND evenement.id= :id');
  $query-> execute(['id'=>$id]);
  $type = $query->fetch();

  return $type;
}
function sponsor($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT sponsor.nom FROM evenement, sponsor, sponsorize WHERE evenement.id=sponsorize.id_evenement AND sponsorize.id_sponsor = sponsor.id AND evenement.id= :id');
  $query-> execute(['id'=>$id]);
  $site = $query->fetch();

  return $site;
}
function getImages($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT media.lien FROM evenement, media, media_evenement WHERE evenement.id= media_evenement.id_evenement AND media_evenement.id_media = media.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $images = $query->fetchALL();

  return $images;
}
function getImagesAndId($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT media.id, media.lien FROM evenement, media, media_evenement WHERE evenement.id= media_evenement.id_evenement AND media_evenement.id_media = media.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $images = $query->fetchALL();

  return $images;
}
function getMainImage($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT media.lien FROM evenement, media WHERE evenement.id = :id AND evenement.id_media_principal = media.id;');
  $query-> execute(['id'=>$id]);
  $images = $query->fetch();

  return $images[0];
}
function getCreator($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT DISTINCT membre.pseudo, membre.id FROM media, evenement, membre WHERE evenement.id_createur = membre.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $creator = $query->fetchALL();

  return $creator;
}
function getCreators($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT  membre.pseudo, membre.id FROM evenement, membre, modere WHERE evenement.id= modere.id_evenement AND modere.id_organisateur = membre.id AND evenement.id = :id');
  $query-> execute(['id'=>$id]);
  $creators = $query->fetchALL();

  return $creators;
}
function getCreatorimage($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
}
function getParticipants($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT  membre.pseudo, membre.id FROM  evenement, membre, invitation WHERE invitation.id_evenement=evenement.id AND invitation.id_destinataire = membre.id AND invitation.etat=1 AND evenement.id = :id');
  $query-> execute(
  ['id'=>$id]);
  $participants = $query->fetchALL();

  return $participants;
}
function getComments($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT DISTINCT membre.pseudo, commentaire.message, commentaire.timestamp, membre.id, commentaire.id AS Com_id FROM media, membre, commentaire, evenement WHERE membre.id = commentaire.id_membre AND commentaire.id_evenement=evenement.id AND evenement.id = :id ORDER BY commentaire.timestamp DESC');
  $query-> execute(['id'=>$id]);
  $comment = $query->fetchALL();

  return $comment;
}
function getAdress($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT adresse.adresse_condensee FROM evenement, adresse WHERE evenement.id_adresse = adresse.id AND evenement.id =:id');
  $query-> execute(['id'=>$id]);
  $adresse = $query->fetch();

  return $adresse;
}
