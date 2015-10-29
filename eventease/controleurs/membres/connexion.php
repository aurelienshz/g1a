<?php
/* Fausse connexion à la BDD : */
// Sera remplacée par un appel au modèle (connexion BDD)
function getUserInfo($username) {
    $auth = array(
    'id'=>$id,
    'hash'=>
    '$2y$10$Iujpo7Rn/99UovOa94eCBetPvaOfRZd0mdSl4WMUPG118r34VKhb2');
    return $auth;
}
function formConnexion() {
    $title = 'Connexion';
    $styles = [];
    require INCLUDES.'header.php';
    require 'vues/membres/formConnexion.php';
    require INCLUDES.'footer.php';
}

/* Affichage du formulaire */


/* Contrôleur : */


if(isset($_POST['username']) AND isset($_POST['pasword'])) {
    $auth = getUserInfo($_POST['username']);
    if (password_verify($password, $hash)) {
        $_SESSION['connected'] = True;
        // header('Location: '.getLink('accueil'));
    }
    else {
        formConnexion();
    }
}
else {
    formConnexion();
}

