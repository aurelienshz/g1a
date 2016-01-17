<?php
function promoteUser($id, $niveau) {
    try {
        $bdd = new PDO(DSN,DBUSER,DBPASS);
    }
    catch(Exception $e) {
        exit();
    }
    $req = $bdd->prepare('UPDATE membre SET niveau = :niveau WHERE id = :id');
    if($req -> execute(['id'=>$id, 'niveau'=>$niveau])) {
        return True;
    }
    else {
        return False;
    }
}
