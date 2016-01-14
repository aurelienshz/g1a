<?php
/*** CONTROLEUR EVENEMENTS PROFIL ***/
/**** Préparation des contenus ****/
// require MODELES.'events/getMemberEvents.php';
function getMemberEvents() {
    $res = [[
        "date" => "01/12/2015",
        "titre" => "Evenement",
        "type" => "Pique-Nique",
        "ville" => "Paris",
        "tarif" => "10 €",
        "age" => "De 0 à 10 ans",
        "description" => "Lorem Ipsum"],
        [
            "date" => "18/04/2016",
            "titre" => "Evenement2",
            "type" => "Rave party",
            "ville" => "Paris",
            "tarif" => "3 €",
            "age" => "De 0 à 10 ans",
            "description" => "Lorem Ipsum"]];
    return $res;
}

function generateCalendars($events) {
    // entrée : tableau d'évènements
    // sortie : tableau (PHP) de tableaux (HTML) représentant les calendriers enre le premier et le dernier mois rencontré
    foreach ($events as $key => $event) {
        $date = DateTime::createFromFormat('d/m/Y', $event['date']);
        $events[$key]['timestamp'] = $date->format('U');
        $events[$key]['year'] = $date->format('Y');
        $events[$key]['month'] = $date->format('m');
        $events[$key]['day'] = $date->format('d');
        echo '<pre>';
        var_dump($events[$key]);
        echo '</pre>';
    }
}

function build_calendar($month,$year,$dateArray) {
     // abbréviations des jours de la semaine :
     $daysOfWeek = array('D','L','M','M','J','V','S');
     // premier jour du mois :
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
     // nombre de jours dans le mois :
     $numberDays = date('t',$firstDayOfMonth);
     // composants détaillés du premier jours du mois :
     $dateComponents = getdate($firstDayOfMonth);
     // nom du mois :
     $monthName = $dateComponents['month'];

     // index du premier jour du mois (0-6) :
     $dayOfWeek = $dateComponents['wday'];

     // créer l'en-tête du tableau qui constitue le calendrier :
     $calendar = "<table class='calendar'>";
     $calendar .= "<caption>$monthName $year</caption>";
     $calendar .= "<tr>";
     // créer les en-têtes des jours :
     foreach($daysOfWeek as $day) {
          $calendar .= "<th class='header'>$day</th>";
     }
     // créerle reste du calendrier :
     // initialisation du compteur de jours :
     $currentDay = 1;
     $calendar .= "</tr><tr>";
     // $dayOfWeek : sert à s'assurer que le calendrier comporte 7 colonnes :
     if ($dayOfWeek > 0) {
          $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
     }
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
     while ($currentDay <= $numberDays) {
          // Seventh column (Saturday) reached. Start a new row.
          if ($dayOfWeek == 7) {
               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";
          }
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
          $calendar .= "<td class='day' rel='$date'>$currentDay</td>";
          // Increment counters
          $currentDay++;
          $dayOfWeek++;
     }

     // Complete the row of the last week in month, if necessary
     if ($dayOfWeek != 7) {
          $remainingDays = 7 - $dayOfWeek;
          $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
     }
     $calendar .= "</tr>";
     $calendar .= "</table>";
     return $calendar;
}


require MODELES.'membres/getUserDetails.php';
require MODELES.'events/getMemberEvents.php';

//if(isset($_GET['id'])) {
    $contents['pseudo'] = getUserDetails($_SESSION['id'])['pseudo'];
//}

generateCalendars(getMemberEvents());
// La page n'est accessible qu'à un membre connecté :
if(!connected()) {
    alert('error', 'Vous devez vous connecter pour voir cette page');
    header("Location: ".getLink(['membres','connexion']));
    exit();
}
else {
    $events = getMemberEvents($_SESSION['id']);
}
/**** Affichage de la page ****/
$contents['ongletActif'] = 'evenements';
$title = 'Mes évènements';
$styles = ['onglets_compte.css','mes_events.css','accueil.css'];
$blocks = ['onglets_compte', 'evenements'];
//Appels des vues :
vue($blocks,$styles,$title,$contents);
