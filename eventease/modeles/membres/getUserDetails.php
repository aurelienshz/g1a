<?php

function getUserDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = $bdd->prepare('SELECT * FROM membre WHERE id = :id');
    $query->execute(['id'=>$id]);

    if($query->rowCount()==1) {
        $result = $query->fetchAll();
        return $result[0];
    }
    else {
        return False;
    }
}
