<?php
function buildCalendar($month,$year,$eventsThisMonth = False) {
	// construction de la liste des jours à mettre en surbrillance :
	$filledDays = [];
	foreach ($eventsThisMonth as $event) {
		$filledDays[] = $event['day'];
	}

    // Nom des mois en Français :
	$months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
	// abbréviations des jours de la semaine :
	$week = ['L','M','M','J','V','S','D'];

	// premier jour du mois :
	$firstDayOfMonth = mktime(0,0,0,$month,1,$year);   // timestamp
	// nombre de jours dans le mois :
	$numberDays = date('t',$firstDayOfMonth);
	// composants détaillés du premier jours du mois :
	$firstDayComponents = getdate($firstDayOfMonth);       // informations détaillées (mois, année etc...)
	// nom du mois :
    // on utilise le tableau months
	$monthName = $months[$firstDayComponents['mon']-1];

	// index du premier jour du mois (0-6) :
	$dayOfWeek = ($firstDayComponents['wday'] - 1);
	if($dayOfWeek < 0) {
		$dayOfWeek = 7 + $dayOfWeek;
	}

	// créer l'en-tête du tableau qui constitue le calendrier :
	$calendar = "\n<section class='row'>\n";
    $calendar .= "<div class=\"calendar\"><table>";
	$calendar .= "<caption><a href='#' class='previous-month'>&lt;</a> $monthName $year <a href='#' class='next-month'>&gt;</a></caption>\n";
	$calendar .= "<tr>\n";
	// créer les en-têtes des jours :
	foreach($week as $day) {
		$calendar .= "\t<th class='header'>$day</th>\n";
	}

	// On crée le reste du calendrier :

	// initialisation du compteur de jours :
	$currentDay = 1;
	$calendar .= "</tr>\n<tr class='days'>\n";
	// $dayOfWeek : compte les colonnes ajoutées et fait en sorte que le calendrier comporte 7 colonnes :
	if ($dayOfWeek > 0) {
        // on ajoute une colonne vide au début du mois :
		$calendar .= "\t<td colspan='$dayOfWeek'>&nbsp;</td>\n";
	}

    // on ajoute un 0 devant le mois si un seul caractère :
	$month = str_pad($month, 2, "0", STR_PAD_LEFT);

	while($currentDay <= $numberDays) {
	   // on atteint la 7ème colonne :
	   if ($dayOfWeek == 7) {
			$dayOfWeek = 0;
			$calendar .= "</tr>\n<tr class='days'>\n";
		}
		// ajouter des 0 devant les dates si elles ne font qu'un caractère :
		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date = "$year-$month-$currentDayRel";
		$filled = in_array($currentDay,$filledDays);
		$calendar .= "\t<td class='".($filled?'filled-':'')."day'><a href='#$date'>$currentDay</a></td>\n";
		// Increment counters
		$currentDay++;
		$dayOfWeek++;
	}

	// Compléter la dernière semaine du mois si nécessaire
	if ($dayOfWeek != 7) {
		$remainingDays = 7 - $dayOfWeek;
		$calendar .= "\t<td colspan='$remainingDays'>&nbsp;</td>";
	}
	$calendar .= "\n</tr>";
	$calendar .= "\n</table></div>";

	/***
	/* Génération des détails du mois en cours :	*/

	if($eventsThisMonth) {
		$monthDetails = "<div class=\"monthDetails\">";
		$day = $event['day']."-".$event['month']."-".$event['year'];
		foreach($eventsThisMonth as $event) {
			$monthDetails .= "<div id=\"".$day."\">\n
                <h4></h4>\n
                <div class=\"eventDetails\">
                    <h5>".$event['titre']."<span class=\"participation\">Vous participez</span></h5>
                    <div id=\"infosPratiques\">
                        <p></p>
                        <span class=\"fa fa-calendar\"></span><p>2015-12-17</p>
                        <span class=\"fa fa-tag\"></span><p>Pique-Nique</p>
                        <span class=\"fa fa-map-marker\"></span><p>Mexico</p>
                    </div>
                    <p id=\"eventDescription\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
            </div>";
		}

		$monthDetails .= "</div>";

		$calendar .= $monthDetails;
	}

	$calendar .= '</section>';

	return $calendar;
}
