<?php

require MODELES."/functions/dateToFrench.php";

function buildCalendar($month,$year,$events = False) {
	// construction de la liste des jours à mettre en surbrillance :
	$filledDays = [];
	foreach ($events as $event) {
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
		$calendar .= "\t<td class='day'><a class=".($filled?'filled-day':'')." href='#$date'>$currentDay</a></td>\n";
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

	if($events) {
		$monthDetails = "<div class=\"monthDetails\">";
		foreach($events as $event) {
			$m = str_pad($event['month'], 2, "0", STR_PAD_LEFT);
			$day = $event['year']."-".$m."-".$event['day'];
			$eventsDays[$day][] = $event;

		}
		foreach ($eventsDays as $day => $events) {
			$monthDetails = '<div class="monthDetails">';
			$monthDetails .= "<div id=\"".$day."\">\n<h4>".dateToFrench($day)."</h4>";
			foreach ($events as $event) {
				ob_start();
				?>
					<div class="eventPreview shadow">
						<h4>
							<a href="<?php echo getLink(['events','display',$event['id']]); ?>">
							<?php echo $event['titre']; ?>
							<span class="participation"><?php echo $event['participation']; ?></span>
						</a></h4>
						<a href="<?php echo getLink(['events','display',$event['id']]); ?>">
							<img src="<?php echo PHOTO_EVENT.$event['image'];?>" />
						</a>
						<div class="infosPratiques">
							<p class="eventCategorie"><span class="fa fa-tag"></span><?php echo $event['type']; ?></p>
							<p class="eventDate"><span class="fa fa-calendar"></span><?php echo $event['date']; ?></p>
							<p><span class="fa fa-map-marker"></span><?php echo $event['ville']; ?></p>
							<?php
							if($event['tarif']) {
								echo '<p class="eventTarif"><span class="fa fa-eur"></span>'.$event['tarif'].' €</p>';
							}
							if($event['tranche_age']) {
								echo '<p><span class="fa fa-child"></span> '.$event['tranche_age'].'</p>';
							} ?>
						</div>
						<?php if(isset($event['description'])) {
							echo '<p class="description">'.$event['description'].'</p>';
						} ?>
						<a class="button" href="<?php echo getLink(['events','display',$event['id']]); ?>">Voir l'évènement</a>
					</div>

				<?php
				$monthDetails .= ob_get_clean();
			}
			$monthDetails .= '</div>';
		}
		$monthDetails .= '</div>';
	}
	else {
		$monthDetails = '<div class="monthDetails"><p>Pas d\'évènements ce mois-ci</p></div>';
	}

	$calendar .= $monthDetails;
	$calendar .= '</section>';
	return $calendar;
}
