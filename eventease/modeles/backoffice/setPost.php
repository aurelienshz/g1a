<?php
// Modifer une entrée de la FAQ :
function setPost($id, $question, $reponse) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);

    $req = $bdd -> prepare('UPDATE faq SET question=:question,reponse=:reponse,id_modificateur=:id_modif,date_modification=NOW() WHERE id = :id');
    if($req -> execute(['id'=>$id,'question'=>$question,'reponse'=>$reponse,'id_modif'=>$_SESSION['id']])) {
        return True;
    }
    else {
        return False;
    }

}
