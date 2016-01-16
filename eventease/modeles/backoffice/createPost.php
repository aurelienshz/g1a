<?php
// Créer une entrée dans la FAQ :
function createPost($question, $reponse) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);

    $req = $bdd -> prepare('INSERT INTO faq (question,reponse,id_modificateur,date_modification) VALUES (:question,:reponse,:id_modif,NOW())');
    if($req -> execute(['question'=>$question,'reponse'=>$reponse,'id_modif'=>$_SESSION['id']])) {
        $post = $bdd->lastInsertId();
        return $post;
    }
    else {
        return False;
    }
}
