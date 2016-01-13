<?php
function getEventPicture($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT media.lien FROM media, evenement WHERE media.id = evenement.id_media_principal AND evenement.id = :id');
      $query-> execute(['id'=>$id]);
      $picture = $query->fetch();

      return $picture;
}
