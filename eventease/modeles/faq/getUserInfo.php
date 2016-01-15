<?php
function getUserInfo($id){
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT nom, prenom, mail FROM membre WHERE id = :id');
  $query-> execute([':id'=>$id]);
  $user = $query->fetch();

  return $user;
}
?>