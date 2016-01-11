<?php

function getImages($id) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('SELECT media.lien FROM membre, media WHERE media.id = membre.id_photo AND membre.id = :id');
	$query-> execute(['id'=>$id]);
	$images = $query->fetch();

return $images;
}
 ?>