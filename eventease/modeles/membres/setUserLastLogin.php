<?php

function setUserLastLogin() {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd -> prepare('UPDATE membre SET date_derniere_connexion = :date');
    if($query -> execute(['date'=>time()])) {
        return True;
    }
    else {
        return False;
    }

}
