<?php
function getPicture($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT media.lien FROM media, membre WHERE media.id = membre.id_photo AND membre.id = :id');
      $query-> execute(['id'=>$id]);
      $picture = $query->fetch();

      return $picture;
}
