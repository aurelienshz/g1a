<?php

function getUserDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = $bdd->prepare('SELECT * FROM membre LEFT JOIN adresse
                            ON membre.id_adresse=adresse.id
                            WHERE membre.id = :id');
    $query->execute(['id'=>$id]);

    if($query->rowCount()==1) {
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    else {
        echo 'La requête a mal fonctionné <br />';
        var_dump($query->fetchAll(PDO::FETCH_ASSOC));
        return False;
    }
}
