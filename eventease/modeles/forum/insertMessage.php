<?php 
function insertMessage($contenu, $id_topic, $id_auteur) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		message (contenu, id_auteur, date_modification, id_topic)
    	VALUES (:contenu, :id_auteur, NOW(), :id_topic)');
    $query -> execute([
				':contenu' => $contenu,
				':id_auteur'=>$id_auteur,
				':id_topic' => $id_topic
				]);

}

function getComments($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT contenu, id_auteur, membre.pseudo, media.lien, DAY(date_modification) AS jour, MONTH(date_modification) AS mois, YEAR(date_modification) AS annee, HOUR(date_modification) AS heure, MINUTE(date_modification) AS minute, SECOND(date_modification) AS seconde FROM message, membre, media WHERE id_topic = :id AND media.id = membre.id_photo AND message.id_auteur = membre.id');
      $query-> execute(['id'=>$id]);
      $comments = $query->fetchAll();

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
