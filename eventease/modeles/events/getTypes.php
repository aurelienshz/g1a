<?php

// Récupération des types d'évènements !

function getTypes() {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $req = $bdd -> prepare("SELECT nom FROM type");
    $req -> execute();


    if($req->rowCount() > 0) {
        $res = $req -> fetchAll();

        // On construit l'array des types "propre" :
        $types = [];
        foreach($res as $key => $type) {
            $types[$key] = $type['nom'];
        }
        return $types;
    }
    else {
        return False;
    }
}
