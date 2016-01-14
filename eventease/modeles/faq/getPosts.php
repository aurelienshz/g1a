<?php
function getPosts() {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $req = $bdd -> query("SELECT * FROM faq");
    $res = $req -> fetchAll(PDO::FETCH_ASSOC);

    return $res;
}
