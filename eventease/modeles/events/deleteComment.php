<?php
function deleteComment($id_commentaire){
try
  {
    $bdd=new PDO(DSN, DBUSER, DBPASS);
  }
    catch(Exception $e)
  {
    die('Erreur : ' .$e->getMessage());
}
$query = $bdd->prepare('DELETE FROM commentaire  WHERE id=:id');
$query -> execute(['id'=>$id_commentaire]);
}
