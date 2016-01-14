<?php
function getCatchphrases() {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $req = $bdd -> query('SELECT catchphrase, subcatchphrase FROM ');
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
