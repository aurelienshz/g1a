<?php
function getTopic($id_section) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT topic.titre, topic.id_auteur, membre.pseudo, topic.id FROM topic, membre WHERE id_section = :id_section AND topic.id_auteur=membre.id ORDER BY date_creation DESC LIMIT 0,10');
  $query-> execute(['id_section'=>$id_section]);
  $topic = $query->fetchAll();

  return $topic;
}
function getNombre($id_topic) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT COUNT(*) FROM message WHERE id_topic = :id_topic');
    $query-> execute(['id_topic'=>$id_topic]);
    $nombre = $query->fetch();

  return $nombre;
  }
?>