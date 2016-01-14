<?php

/*
entrée : id du membre dont on veut les évènements passés et futurs --> auxquels il participe, auxquels il est invité, qu'il a créé
sortie : détails des évènements à venir du membre, sous forme d'un tableau
- date : format jj/mm/aaaa      sic : nom
- titre                         sic : nom
- type                          sic : nom
- ville                         sic : nom
- tarif                         sic : nom
- age                           sic : nom
- description                   sic : nom
- image --> à détermine

*/
function getMemberEvents($id) {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = 'SELECT membre.id, membre.pseudo, membre.ddn, membre.niveau, invitation.*, evenement.*, type.nom AS type, adresse.adresse_condensee AS adresse, media.lien
                FROM membre
                LEFT JOIN invitation ON membre.id=invitation.id_destinataire
                LEFT JOIN evenement ON evenement.id=invitation.id_evenement
                LEFT JOIN type ON evenement.id_type = type.id
                LEFT JOIN adresse ON evenement.id_adresse = adresse.id
                LEFT JOIN media ON evenement.id_media_principal = media.id
                WHERE membre.id = 1
                ORDER BY evenement.debut';
      var_dump($query);
      $query = $bdd->prepare($query);

    $query -> execute();

    if(True) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    else {
        echo 'Erreur requête \"mes events\" <br />';
        return False;
    }
}
