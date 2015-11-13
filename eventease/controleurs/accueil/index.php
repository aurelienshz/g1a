<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/

// Chargement de la bonne version du triptyque
if(!(isset($_SESSION['connected']) AND $_SESSION['connected'])) {
    $triptyque = 'features';
}

/**** Affichage de la page ****/
$title = 'Accueil';
$styles = ['accueil.css'];
$blocs = ['index',$triptyque];

//Appels de la vue :
vue($blocs, $styles, $title);
