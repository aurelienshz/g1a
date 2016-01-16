<?php
function getBoringText($nom) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $req = $bdd -> prepare('SELECT * FROM contenu WHERE nom = :nom');
    $req -> execute(['nom'=>$nom]);
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res[0]["valeur"];
}
