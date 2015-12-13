<?php
function getEvents($id) {
    /*
    On essaie de savoir quels events le membre a le droit de visualiser :
        - membre :
            - publics : FROM evenement WHERE confidentiel = 0
            - privés où il est invité : FROM invitation WHERE
        + privés où on l'invite + privés auxquels il participe
        - modérateur, administrateur : tous
    */

    $query = "SELECT evenement.id, evenement.titre, evenement.debut, evenement.description, evenement.tarif, evenement.age_min, evenement.age_max
                    FROM evenement LEFT JOIN invitation ON evenement.id = invitation.id_evenement
                    WHERE evenement.visibilite = 0 OR invitation.id_destinataire = :id";
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $reqEvents = $bdd -> prepare($query);
    $reqEvents -> execute(['id' -> 26])
}
