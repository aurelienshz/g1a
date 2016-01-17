<?php
/*** CONTROLEUR ACCUEIL ***/

/**** Préparation des contenus ****/


// Réponse de la table : organisée par champs puis par ligne ou l'inverse ?
// $reponse[0]['titre'] => 'klqsdfljdfkl'
// $reponse['titre'][0] => 'skldlfjF'


require MODELES.'accueil/getCatchphrases.php';
require MODELES.'events/suggestions.php';

/**** Préparation des ressources de la page ****/
$title = 'Accueil';
$styles = ['accueil.css','eventPreview.css', 'simple-slideshow.css'];
$scripts = ['bigform.js', 'simple-slideshow.js', 'googleAutocompleteAddress.js'];
$blocs = ['index'];

// Préparation des contenus
$contents['suggestions'] = suggestions();
?><pre><?php
var_dump($contents['suggestions']);
?></pre><?php
$contents['catchPhrases'] = getCatchphrases();

// Chargement de la bonne version du triptyque
if(connected()) {
    require MODELES.'membres/generateCalendar.php';
    $contents['calendar'] = generateCalendar();
    $styles[] = 'calendar.css';

    $blocs[] = 'myEvents';
    $scripts[] = 'dynamicCalendar.js';
}
else {
    $blocs[] = 'features';
}

// Appels de la vue :
vue($blocs, $styles, $title, $contents, $scripts);
