<?php
/*
insertAddress : entrée : une adresse FORMATTÉE
Attention, cette fonctin est bête ! elle insère l'adresse en BDD. En cas de mauvais formatage, ce sera moche à tout jamais. A vous de corriger à la volée !

valeurs de retour : l'id de l'adresse passée en paramètre si présente dans la BDD, <False> sinon.

*/



function insertAddress($adresse) {
    require_once MODELES.'functions/google.php';

    $db = new PDO(DSN,DBUSER,DBPASS);

    if($coord = googleAddressToCoord($adresse)) {

        $reqExistence = $db -> prepare('SELECT id, adresse_condensee FROM adresse WHERE adresse_condensee = :adresse OR (coordonnee_lat = :lat AND coordonnee_long = :lon)');
        $reqExistence -> execute(['adresse' => $adresse, 'lat' => $coord[0], 'lon' => $coord[1]]);

        if($reqExistence->rowCount()!=0) {
            $id = $reqExistence -> fetch() ['id'];
        }
        else {
            $reqInsertion = $db -> prepare('INSERT INTO adresse(coordonnee_long, coordonnee_lat, adresse_condensee) VALUES (:lon, :lat, :address)');
            $reqInsertion -> execute(['lon' => $coord[1], 'lat'=> $coord[0], 'address'=>$adresse]);
            $id = $db -> lastInsertId();
        }
        return $id;
    }
    else {
        return False;
    }
}
