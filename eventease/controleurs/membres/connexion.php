<?php
/* CONNEXION
Script sans vue. Rediriger vers la page dont on est venu ?
--> Transmettre la page dans une variable de session ?
*/

/* Fausse connexion à la BDD : */
function getUserAuth($username) {
    $auth = array(
    'id'=>$id,
    'hash'=>'$2y$10$Iujpo7Rn/99UovOa94eCBetPvaOfRZd0mdSl4WMUPG118r34VKhb2');

    return $auth;
}

$auth = getUserAuth($_POST['username'])
if (password_verify($password, $hash)) {
    // On connecte l'utilisateur
}
else {
    // On retourne une erreur.
}