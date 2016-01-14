<?php
/*** CONTROLEUR EVENEMENTS PROFIL ***/

require MODELES.'events/getMemberEvents.php';
require MODELES.'membres/buildCalendar.php';

// La page n'est accessible qu'à un membre connecté :
if(!connected()) {
    alert('error', 'Vous devez vous connecter pour voir cette page');
    header("Location: ".getLink(['membres','connexion']));
    exit();
}
else {
    $events = getMemberEvents($_SESSION['id']);

    foreach ($events as $key => $event) {
        $yearsToBuild[] = [$event['year']];
    }
    var_dump($monthsToBuild);
    $contents['calendar'] = buildCalendar(11,2015);
}
/**** Affichage de la page ****/
$contents['ongletActif'] = 'evenements';
$title = 'Mes évènements';
$styles = ['onglets_compte.css','mes_events.css','accueil.css'];
$blocks = ['onglets_compte', 'evenements'];
//Appels des vues :
vue($blocks,$styles,$title,$contents);
