<?php

function getUserDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT
                            membre.pseudo,
                            -- membre.mdp,
                            membre.civilite,
                            membre.prenom,
                            membre.nom,
                            membre.ddn,
                            membre.mail,
                            membre.tel,
                            membre.description,
                            membre.niveau,
                            membre.langue,
                            membre.date_derniere_connexion,
                            membre.id_adresse,
                            membre.id_photo,

                            adresse.coordonnee_long,
                            adresse.coordonnee_lat,
                            adresse.adresse_condensee,

                            media.lien AS lien_photo

                            FROM membre LEFT JOIN adresse
                            ON membre.id_adresse=adresse.id
                            LEFT JOIN media
                            ON media.id = membre.id_photo
                            WHERE membre.id = :id'
                            );
    $query->execute(['id'=>$id]);

    if($query->rowCount()==1) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    else {
        // echo 'La requête a mal fonctionné <br />';
        return False;
    }
}
