<?php

function getUserDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = $bdd->prepare('SELECT *
                            FROM membre RIGHT JOIN adresse
                            ON membre.id_adresse=adresse.id
                           UNION
                            SELECT * FROM membre LEFT JOIN adresse
                            ON membre.id_adresse=adresse.id
                            WHERE membre.id = :id');
    $query->execute(['id'=>$id]);
    
    if($query->rowCount()==1) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    else {
        return False;
    }
}
