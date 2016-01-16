<?php
/*** CONTROLEUR EVENEMENTS PROFIL ***/

require MODELES.'membres/generateCalendar.php';

// La page n'est accessible qu'à un membre connecté :
if(!connected()) {
    alert('error', 'Vous devez vous connecter pour voir cette page');
    header("Location: ".getLink(['membres','connexion']));
    exit();
}
else {
    $contents['calendar'] = generateCalendar();
}
/**** Affichage de la page ****/
$contents['ongletActif'] = 'evenements';
$title = 'Mes évènements';
$styles = ['onglets_compte.css','calendar.css','accueil.css','eventPreview.css'];
$blocks = ['onglets_compte', 'evenements'];
$scripts = ['dynamicCalendar.js'];
//Appels des vues :
vue($blocks,$styles,$title,$contents,$scripts);
