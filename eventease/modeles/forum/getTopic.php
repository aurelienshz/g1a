<?php
function getTopic($id_section) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT topic.titre, topic.id_auteur, membre.pseudo, topic.id FROM topic, membre WHERE id_section = :id_section AND topic.id_auteur=membre.id ORDER BY date_creation DESC LIMIT 0,10');
  $query-> execute(['id_section'=>$id_section]);
  $topic = $query->fetchAll();

  return $topic;
}