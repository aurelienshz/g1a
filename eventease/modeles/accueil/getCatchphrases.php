<?php
function getCatchphrases() {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $req = $bdd -> query('SELECT * FROM contenu WHERE nom = "catchphrase" OR nom = "subcatchphrase"');
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return [$res[0]["valeur"],$res[1]["valeur"]];
}
