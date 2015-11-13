<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/
// Chargement des paramètres de la page
// $title = 'Accueil';
// $styles = ['accueil.css'];

// Appels au modèle
// Appels au modèle

// Traitements

if(!(isset($_SESSION['connected']) AND $_SESSION['connected'])) {
    $triptyque = file_get_contents('vues/accueil/features.php');
}
else {
    $triptyque = "<h4>Events à venir</h4>";
}

/**** Affichage de la page ****/

//Appels des vues :
vue(['index','triptyque'],['accueil.css'],'');

// require INCLUDES.'header.php'; //header commun à toutes les pages
// require 'vues/accueil/index.php'; //vue spécifique à l'accueil
// require INCLUDES.'footer.php'; //footer commun à toutes les pages
