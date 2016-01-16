<?php
function deletePost($id) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);

    $req = $bdd -> prepare('DELETE FROM faq WHERE id = :id');
    if($req -> execute(['id'=>$id])) {
        return True;
    }
    else {
        return False;
    }

}
