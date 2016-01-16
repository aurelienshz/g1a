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