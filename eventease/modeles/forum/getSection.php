<?php
function getSujet($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT * FROM sujet WHERE id = :id');
  $query-> execute(['id'=>$id]);
  $sujet = $query->fetch();
  return $sujet ;
}
?>
