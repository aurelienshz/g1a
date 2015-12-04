<?php

/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

require MODELES.'membres/getUserDetails.php';

if(isset($_GET['id'])) {
    $user = getUserDetails($_GET['id']);
    if($user) {
        $contents = $user;
    }
    else {
    }
}

/**** préparation de la vue ****/

$title = 'Modifier mon profil';
$styles = ['form.css','accueil.css','search.css','modify.css'];
$blocks = ['modification_profil'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title)

?>