<?php
/* Fausse connexion à la BDD : (sera remplacée par un appel au modèle) */
function getUserInfo($username) {
    $bddUsers = array(
        'KevinDu38'=>'$2y$10$sZzL0Lb/RKp7EIYL3G0gh.TatnkE23U/yRLyb008BS4csfAB3omOq',
        'EventEase'=>'$2y$10$sZzL0Lb/RKp7EIYL3G0gh.TatnkE23U/yRLyb008BS4csfAB3omOq');
    if(array_key_exists($username, $bddUsers)) {
    $auth = array('username' => $username,'hash' => $bddUsers[$username]);
    }
    else {
    $auth = False;
    }
    return $auth;
    // gestion des erreurs (user non trouvé)
    // -->contrôle du nombre de résultats
}

/* Affichage du formulaire */
function formConnexion() {
    $title = 'Connexion';
    $styles = [];
    require INCLUDES.'header.php';
    require 'vues/membres/formConnexion.php';
    require INCLUDES.'footer.php';
}

/* Contrôle des id du formulaire ou affichage du formulaire */
if(isset($_POST['username']) AND isset($_POST['password'])) {
    $auth = getUserInfo($_POST['username']);
    if($auth) {
        if (password_verify($_POST['password'], $auth['hash'])) {
            echo 'pass vérifié';
            $_SESSION['connected'] = True;
            header('Location: '.getLink('accueil'));
        }
        else {
            echo 'entré dans le else';
            formConnexion();
        }
    }
}
else {
    formConnexion();
}

