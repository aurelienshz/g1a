<?php
function setBoringText($name, $text) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $req = $bdd -> prepare('UPDATE contenu SET valeur = :texte WHERE nom = :nom');
    $req -> execute(['texte'=>$text, 'nom'=>$name]);
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return True;
}
