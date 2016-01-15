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
    $yearsToBuild = [];
    $yearStart = $events[0]['year'];
    // echo $yearStart;
    $yearEnd = end($events)['year'];
    // echo $yearEnd;
    $y = $yearStart;
    do {
        for($m=1; $m<=12;$m++) {
            // construction de la liste des events dans le mois qui va être généré :
            $eventsThisMonth = [];
            foreach($events as $event) {
                if($event['month']==$m && $event['year']==$y) {
                    $eventsThisMonth[] = $event;
                }
            }
            // echo '<pre>';
            // echo '<h3>'.$m.'/'.$y.'</h3>';
            // var_dump($eventsThisMonth);
            // echo '</pre>';
            $contents['calendar'][] = buildCalendar($m,$y,$eventsThisMonth);
        }
        $y++;
    } while($y<=$yearEnd);
}
/**** Affichage de la page ****/
$contents['ongletActif'] = 'evenements';
$title = 'Mes évènements';
$styles = ['onglets_compte.css','calendar.css','accueil.css','eventPreview.css'];
$blocks = ['onglets_compte', 'evenements'];
$scripts = ['dynamicCalendar.js'];
//Appels des vues :
vue($blocks,$styles,$title,$contents,$scripts);
