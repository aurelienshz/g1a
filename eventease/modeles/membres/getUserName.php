<?php

function getUserName($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT
                            pseudo
                            FROM membre
                            WHERE id = :id'
                            );
    $query->execute(['id'=>$id]);
    $pseudo = $query->fetchAll(PDO::FETCH_ASSOC);
    return $pseudo;
}

function getUserId($pseudo) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT
                            id
                            FROM membre
                            WHERE pseudo = :pseudo'
                            );
    $query->execute(['pseudo'=>$pseudo]);
    $id = $query->fetchAll(PDO::FETCH_ASSOC);
    return $id;
}