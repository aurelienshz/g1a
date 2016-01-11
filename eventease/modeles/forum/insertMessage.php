<?php
function insertMessage($contenu, $id_topic, $id_auteur) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		message (contenu, id_auteur, date_modification, id_topic)
    	VALUES (:contenu, :id_auteur, NOW(), :id_topic);');
  $execute = [':contenu' => $contenu, ':id_auteur'=>$id_auteur, ':id_topic' => $id_topic];

    if($query -> execute($execute)){
      return True;
    }
	else{
      var_dump($query -> errorInfo());
      return False;
    }
}

function getComments($id) {
      require MODELES. 'membres/getUserDetails.php';

      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT contenu, id_auteur, DAY(date_modification) AS jour, MONTH(date_modification) AS mois, YEAR(date_modification) AS annee, HOUR(date_modification) AS heure, MINUTE(date_modification) AS minute, SECOND(date_modification) AS seconde FROM message WHERE message.id_topic = :id;');
      $query-> execute(['id'=>$id]);
      $comments = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach ($comments as $key => $value) {
         $extraInfo = getUserDetails($comments[$key]['id_auteur']);
         $comments[$key]['pseudo'] = $extraInfo['pseudo'];
         $comments[$key]['lien'] = $extraInfo['lien_photo'];
      }

      return $comments;
}



function getNombreMessages($id_auteur) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT COUNT(*) FROM topic WHERE id_auteur = :id_auteur');
  $query-> execute(['id_auteur'=>$id_auteur]);
  $nombre = $query->fetch();

return $nombre;
}
?>
