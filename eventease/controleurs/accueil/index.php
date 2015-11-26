<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/


// Réponse de la table : organisée par champs puis par ligne ou l'inverse ?
// $reponse[0]['titre'] => 'klqsdfljdfkl'
// $reponse['titre'][0] => 'skldlfjF'


require MODELES.'events/suggestions.php';

$contents = suggestions();

// Chargement de la bonne version du triptyque
if(connected()) {
    $triptyque = 'features';
}
else {
    $triptyque = 'features';
}

/**** Affichage de la page ****/
$title = 'Accueil';
$styles = ['accueil.css'];
$blocs = ['index',$triptyque];
$scripts = ['bigform.js','googleAutocompleteAddress.js'];

// Appels de la vue :
vue($blocs, $styles, $title, $contents, $scripts);
