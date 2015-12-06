<?php
function getUserProfileDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = $bdd->prepare('SELECT membre.civilite, membre.nom, membre.prenom, membre.ddn, membre.tel, adresse.coordonnee_long, adresse.coordonnee_lat, membre.langue, membre.description, media.id AS id_photo, media.lien AS lien_photo 
    						FROM membre, adresse, media 
    						WHERE membre.id_adresse=adresse.id 
    						AND membre.id_photo= media.id
                            AND membre.id = :id');
    $query->execute(['id'=>$id]);
    if($query->rowCount()==1) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    else {
        return False;
    }
}