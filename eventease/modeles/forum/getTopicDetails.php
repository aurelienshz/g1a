<?php
function getTitre($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT titre FROM topic WHERE id = :id');
      $query-> execute(['id'=>$id]);
      $titre = $query->fetch();

      return $titre;
  }
function getMessage($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT message FROM topic WHERE id = :id');
      $query-> execute(['id'=>$id]);
      $message = $query->fetch();

      return $message;
  }
function getDate_creation($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT  DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde FROM topic WHERE id = :id');
      $query-> execute(['id'=>$id]);
      $date_creation = $query->fetch();

      return $date_creation;
  }
function getMembre($id) {
  	$bdd = new PDO(DSN, DBUSER, DBPASS);
  	$query = $bdd->prepare('SELECT topic.id_auteur, membre.pseudo FROM topic, membre, media WHERE topic.id = :id AND membre.id=topic.id_auteur');
  	$query-> execute(['id'=>$id]);
  	$membre = $query->fetch();

  return $membre;
  }
function getNombre($id_auteur) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT COUNT(*) FROM topic WHERE id_auteur = :id_auteur');
    $query-> execute(['id_auteur'=>$id_auteur]);
    $nombre = $query->fetch();

  return $nombre;
  }
 ?>
