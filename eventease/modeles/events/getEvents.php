<?php
function getEvents($id = False) {
    /*
    On essaie de savoir quels events le membre a le droit de visualiser :
        - membre :
            - publics : FROM evenement WHERE confidentiel = 0
            - privés où il est invité : FROM invitation WHERE
        + privés où on l'invite + privés auxquels il participe
        - modérateur, administrateur : tous
    */
    if($id) {
        $userSpecific = ['LEFT JOIN invitation ON evenement.id = invitation.id_evenement ', ' OR invitation.id_destinataire = :id'];
    }
    else {
        $userSpecific = ['',''];
    }

    $query = "SELECT evenement.id, evenement.titre, evenement.debut, evenement.description, evenement.tarif, evenement.age_min, evenement.age_max, type.nom AS type, adresse.adresse_condensee AS adresse, media.lien
                    FROM evenement
                    LEFT JOIN type on evenement.id_type = type.id
                    LEFT JOIN adresse on evenement.id_adresse = adresse.id
                    LEFT JOIN media ON evenement.id_media_principal = media.id "
                    .$userSpecific[0].
                    "WHERE evenement.visibilite = 0".$userSpecific[1];

    // var_dump($query);

    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $reqEvents = $bdd -> prepare($query);
    if(implode('',$userSpecific)) {
        $reqEvents -> execute(['id' => $id]);
    }
    else {
        $reqEvents -> execute([]);
    }

    if($reqEvents->rowCount() != 0) {
        $results = $reqEvents->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $results = False;
    }

    // echo '<pre>';
    // var_dump($results);
    // echo '</pre>';

    return $results;

}
