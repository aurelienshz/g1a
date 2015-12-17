<?php
function insert_comment($message, $id_evenement, $id_membre){
try
  {
    $bdd=new PDO(DSN, DBUSER, DBPASS);
  }
    catch(Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
}
$query = $bdd->prepare('INSERT INTO commentaire (message, id_evenement, id_membre) VAlUES(?, ?, ?)');
$trololo=array($message,$id_evenement, $id_membre);
$query -> execute($trololo);
}
