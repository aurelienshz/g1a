<?php
function getSection($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT * FROM section WHERE id = :id');
  $query-> execute(['id'=>$id]);
  $section = $query->fetch();
  return $section ;
}
?>
