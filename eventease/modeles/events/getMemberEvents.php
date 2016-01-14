<?php

// entrée : id du membre dont on veut les prochains évènements
// sortie : détails des évènements à venir du membre, sous forme d'un tableau
// La sortie **doit** être **ordonnée chronologiquement** (sinon tu casses tout)
// On pourra ajouter des params tq des limites de nb d'events à retourner (3 prochains mois...)
// On pourra aussi avoir un mode qui sort tous les évènements publics (pas forcément la même fonction)

function getMemberEvents($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT'
              . 'membre.id,'
              . 'membre.pseudo,'
              . 'membre.ddn,'
              . 'membre.niveau,'
              . 'invitation.*,'
              . 'evenement.*,'
              . 'type.nom AS type,'
              . 'adresse.adresse_condensee AS adresse,'
              . 'media.lien'
              . 'FROM membre'
              . 'LEFT JOIN invitation ON membre.id=invitation.id_destinataire'
              . 'LEFT JOIN evenement ON evenement.id=invitation.id_evenement'
              . 'LEFT JOIN type ON evenement.id_type = type.id'
              . 'LEFT JOIN adresse ON evenement.id_adresse = adresse.id'
              . 'LEFT JOIN media ON evenement.id_media_principal = media.id'
              . 'WHERE membre.id = :id'
              . 'ORDER BY evenement.debut');

    $query -> execute();

    if($query->rowCount()==1) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    else {
        echo 'Erreur requête \"mes events\" <br />';
        return False;
    }
}
