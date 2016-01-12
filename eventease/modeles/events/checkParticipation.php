<?php
function checkParticipation($event_id,$member_id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT etat FROM invitation WHERE id_evenement = :event_id AND id_destinataire = :member_id');
      $query-> execute([
        'event_id'=>$event_id,
        'member_id'=>$member_id
      ]);
      $participe = $query->fetch();

      return $participe;
}
