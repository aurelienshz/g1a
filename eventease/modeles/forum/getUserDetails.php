<?php
function getUserDetails($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT pseudo FROM membre WHERE id = :id');
      $query-> execute(['id'=>$id]);
      $userDetails = $query->fetch();

      return $userDetails;
  }

function getImages($id) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('SELECT media.lien FROM membre, media WHERE media.id = membre.id_photo AND membre.id = :id');
	$query-> execute(['id'=>$id]);
	$images = $query->fetch();

return $images;
}
 ?>