<?php

function setUserLastLogin($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd -> prepare('UPDATE membre SET date_derniere_connexion = NOW() WHERE id=:id');
    if($query -> execute(['id'=>$id])) {
        return True;
    }
    else {
        return False;
    }

}
