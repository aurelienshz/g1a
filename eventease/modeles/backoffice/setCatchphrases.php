<?php

function setCatchphrases($catchPhrases) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $req = $bdd -> prepare("UPDATE `contenu` SET `valeur` = :catchphrase WHERE `contenu`.`nom` = 'catchphrase'; UPDATE `contenu` SET `valeur` = :subcatchphrase WHERE `contenu`.`nom` = 'subcatchphrase'");

    $req -> execute(['catchphrase' => $catchPhrases[0], 'subcatchphrase' => $catchPhrases[1]]);

    return True;
}
