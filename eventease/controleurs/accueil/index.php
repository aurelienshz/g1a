<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/


// Réponse de la table : organisée par champs puis par ligne ou l'inverse ?
// $reponse[0]['titre'] => 'klqsdfljdfkl'
// $reponse['titre'][0] => 'skldlfjF'


require MODELES.'events/suggestions.php';
require MODELES.'accueil/getCatchphrases.php';

/**** Préparation des ressources de la page ****/
$title = 'Accueil';
$styles = ['accueil.css','eventPreview.css', 'simple-slideshow.css'];
$scripts = ['bigform.js', 'simple-slideshow.js', 'googleAutocompleteAddress.js'];
$blocs = ['index'];

// Préparation des contenus
$contents['suggestions'] = suggestions();
$contents['catchPhrases'] = getCatchphrases();

// Chargement de la bonne version du triptyque
if(connected()) {
    $blocs[] = 'myEvents';
    $scripts[] = 'dynamicCalendar.js';
}
else {
    $blocs[] = 'features';
}

// Appels de la vue :
vue($blocs, $styles, $title, $contents, $scripts);
