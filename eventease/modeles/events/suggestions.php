<?php
// modele/events/suggestions.php
// entrée : rien
// sortie : plusieurs suggestions relatives à l'utilisateur

//Suggestions : 
//- Proximité classé par le plus proche
//- Types Favoris puis par chronologie.
//- Bientot (dans un radius de TANT.)
//- 

function getMainImage($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT media.lien FROM evenement, media WHERE evenement.id = :id AND evenement.id_media_principal = media.id;');

  if($query-> execute(['id'=>$id])){
  		$images = $query->fetch();
	    return $images[0];
	
	}else{
		var_dump($query -> errorInfo());
		return False;
	}
}

function generateMediaLink($id, $type){
	$output = getMainImage($id);
	if ($output == False OR empty($output)){
		switch($type){
		    case "Pique-Nique":
		      $output=IMAGES."picnic1.jpg";
		      break;
		    case "Concert":
		      $output=IMAGES."concertType.jpg";
		      break;
		    case "Rave party":
		      $output=IMAGES."ravepartyType.jpg";
		      break;
		    case "Vente privée":
		      $output=IMAGES."ventepriveeType.jpg";
		      break;
		    case "Brocante":
		      $output=IMAGES."brocanteType.jpg";
		      break;
		    case "Exposition":
		      $output=IMAGES."expositionType.jpg";
		      break;
		    case "Rassemblement":
		   	  $output=IMAGES."rassemblementType.jpg";
		      break;
		    case "Autre":
		      $output=IMAGES."logo.jpg";
		      break;
		    default:
		      $output=IMAGES."picnic1.jpg";
		      break;
		  }
	}else{
		$output = PHOTO_EVENT.$output;
	}
	return $output;
}

require_once MODELES.'events/getMemberEvents.php';
require_once MODELES.'membres/getUserDetails.php';
require_once MODELES.'events/getEvents.php';
require_once MODELES.'functions/adresse.php';
require_once MODELES.'functions/haversineGreatCircleDistance.php';

function suggestions() {

	if (connected()) {
		//On attrape les infos qu'on veut
		$user_info = getUserDetails($_SESSION['id']);
		$user_events = getMemberEvents($_SESSION['id']);
		$events = getEvents($_SESSION['id']);
		if (empty($events) || empty($user_events)|| empty($user_info)) {
			return NULL;
		}
		//Enlève les évents auquel il participe.
		foreach ($events as $key => $value) {
			foreach ($user_events as $cle => $valeur) {
				if (count($events)-count($user_events) > 3){
					// Teste s'il y a assez d'évènements pour faire 3 recommendations
					if ($value["id"] == $valeur['id']) unset($events[$key]);
				}
			}
			//Ajoute les coordonnées à chaue événement auquel il ne participe pas.
			if (!isset($events[$key])) continue;
			$event_adress = getAdressCoord($value['id']);
			$events[$key]['coordonnee_long'] = $event_adress['coordonnee_long'];
			$events[$key]['coordonnee_lat'] = $event_adress['coordonnee_lat'];
			$events[$key]['lien_photo'] = generateMediaLink($value['id'], $value['type']);
		}
		// ======= BIENTOT ========

		//Tri par date des evenements
		function date_compare($a, $b) {
		    $t1 = strtotime($a['debut']);
		    $t2 = strtotime($b['debut']);
		    return $t1 - $t2;
		}    
		usort($events, 'date_compare');

		$timeRec = $events[0];


		// ======= TYPE ========

		//Classement des Types par ID.
		$types = [];
		foreach ($user_events as $key => $value) {
			array_push($types, $value["type"]);
		}
		$types = array_count_values($types);
		$top_type = array_keys($types, max($types));

		//Choix de l'évènement par Type.
		foreach ($events as $key => $value) {
			if (in_array($value['type'], $top_type)){
				$typeRec = $value;
				if ($timeRec['id'] == $typeRec['id']){
					continue;
				}else{
					break;
				}
			}
		}
		//Aléatoire sinon.
		if (!isset($typeRec)) {
			$typeRec = $events[rand(0,count($events)-1)];
			while ($timeRec['id'] == $typeRec['id']) {
					$typeRec = $events[rand(0,count($events)-1)];
			}
		}

		// ======= PROXIMITE ========
		if (isset($user_info['coordonnee_long']) && isset($user_info['coordonnee_lat'])){
			// Addresse renseignée.
			//Tri par distance (grande sphère)
			foreach ($events as $key => $value) {
		    	$events[$key]['distance'] = haversineGreatCircleDistance(floatval($user_info['coordonnee_lat']), floatval($user_info['coordonnee_long']), floatval($events[$key]['coordonnee_lat']), floatval($events[$key]['coordonnee_long']));
			} 
			function distance_compare($a, $b) {
			    return $a['distance'] - $b['distance'];
			}   
			usort($events, 'distance_compare');

			$proxRec = $events[0];

			if ($proxRec['id'] == $typeRec['id'] ){
				$proxRec = $events[1];
			}
		}else{
			//Addresse non renseignée. Donc aléatoire.
			$proxRec = $events[rand(0,count($events)-1)];
			while ($proxRec['id'] == $typeRec['id'] || $proxRec['id'] == $timeRec['id']) {
				$proxRec = $events[rand(0,count($events)-1)];
			}
		}
		return [$timeRec, $typeRec, $proxRec];
	}else{
		// 100% radom public events
		$events = getEvents();
		$recs = array_rand($events, 3);
		foreach ($recs as $key => $value) {
			$events[$value]['lien_photo'] = generateMediaLink($value, $events[$value]['type']);
		}
		
		
		return [$events[$recs[0]], $events[$recs[1]], $events[$recs[2]]];
	}

}

