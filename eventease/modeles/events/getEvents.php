<?php

// entrée : id du membre dont on veut les prochains évènements
// sortie : détails des évènements à venir du membre, sous forme d'un tableau
// La sortie **doit** être **ordonnée chronologiquement** (sinon tu casses tout)

function getEvents($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $event = $bdd->prepare('SELECT * FROM evenement WHERE id = "id"');
      $event-> execute(["id"=>$id]);

      return $event;
}
