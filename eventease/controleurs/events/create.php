<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/
// Appels au modèle
// Traitements
// Appels au modèle

$contents['types'] = [
	'Pique-Nique',
	'Brocante',
	'Concert',
	'Conférence',
	'Vente privée',
	'Cours de cuisine',
	'Cours de danse',
	'Cours de musique',
	'Dégustation',
	'Oenologie',
	'Exposition',
	'Autre'
];

// Traitements
require MODELES.'events/insertEvent.php';
require MODELES.'functions/date.php';
require MODELES.'functions/google.php';
/**** Préparation de la vue ****/
$title = 'Créer event';
$styles = ['create.css','form.css', 'search.css'];
$blocks = ['create'];
$scripts = ['googleAutocompleteAddress.js'];

if(connected()) {
	echo '<pre>';
	var_dump($_POST);
	echo '</pre>';
	if (empty($_POST)) {
		vue($blocks, $styles, $title);
	}
	else {	// le formulaire a été validé
		// Recherche d'erreurs lors du remplissage du formulaire :
		// Initialisation de la liste des erreurs :
		$errors = [];
		// echo 'loul';
		foreach($_POST as $key=>$value) {
			$contents['values'][$key] = htmlspecialchars($_POST[$key]);
		}
		// var_dump($contents['values']);
		// echo 'loul';
		// On vérifie que tous les champs requis sont bien remplis :
		$requiredFields = ['titre','type','date','place','beginning','hosts','visibility','participation'];
		foreach($requiredFields as $field) {
			if(empty($_POST[$field])) {
				$errors[$field] = 'Ce champ est requis';
			}
		}

		if(empty($errors)) {	// Si aucune erreur n'a été générée par la vérif des champs vides
			// Puis on fait les vérifications spécifiques :
			// Nom conforme :
			if(!preg_match("/^[-a-zâäàéèùêëîïôöçñ' 0-9@#]+$/i", $_POST['titre'])) {
				$errors['titre'] = 'Titre invalide';
			}

			// Type dans le bon intervalle :
			if(!(intval($_POST['type']) >= 0 AND intval($_POST['type'] <12 ))) {
				$errors['type'] = 'Type invalide';
			}

			// Lieu : passer une recherche avec Google et vérifier qu'on a une réponse en coordonnées
			if(!googleCheckAddress($_POST['place'])) {
				$errors['place'] = isset($errors['place'])?$errors['place']:'Cette adresse semble invalide';
			}
			else {
				$push['place'] = googleAddressToCoord($_POST['place']);
				// var_dump($push['place']);
			}

			// Date / heure début conforme et future :
			$startTime = $_POST['date'].' '.$_POST['beginning'];
			$endTime = $_POST['date'].' '.$_POST['end'];

			if(!(validateDateFormat($startTime, 'Y-m-d H:i') && validateFutureDate($startTime))) {
				$errors['date'] = 'La date ne doit pas être passée';
				$errors['heures'] = 'Ce moment ne doit pas être passé';
			}
			if(strtotime($startTime) >= strtotime($endTime)) {
				$errors['heures'] = 'L\'heure de fin doit être après l\'heure de début';
			}
			// tarif : intval > 0
			if(intval($_POST['price']) < 0) {
				$errors['price'] = 'Tarif invalide';
			}
			// description : htmlspecialchars
			$_POST['description'] = htmlspecialchars($_POST['description']);

			// organisateurs, visibility, participation : à remanier ?

			// type public : si définis !
			// age min et max positifs et min < max
			if(intval($_POST['age_min'])<0 || intval($_POST['age_max'])<0) {
				$errors['age_max'] = 'Âge invalide';

				if(intval($_POST['age_min'])>intval($_POST['age_max'])) {
					$errors['age_max'] = 'Tranche d\âge invalide';
				}
			}
			// langue : si 1, alors 1, sinon 0
			$_POST['langue'] = ($_POST['langue'] == 1)?1:0;

			// max_attendees : positif
			if(intval($_POST['max_attendees'])<0) {
				$errors['max_attendees'] = 'Nombre invalide';
			}

			// site web : est-ce bien une URL ?
			if(isset($_POST['website']) && (False)) {	// filter_var($_POST['website'], FILTER_VALIDATE_URL
				$errors['website'] = 'URL invalide';
			}

			// Sponsors : regex Tristan
			if(!isset($_POST['sponsors']) || (preg_match("/^[-a-zâäàéèùêëîïôöçñ,' 0-9@#]+$/i", $_POST['sponsors']))) {
				$errors['sponsors'] = 'Nom invalide';
			}
		}

		// Insertion de l'event ou affichage de la vue avec les erreurs :
		if(empty($errors)) {
			insertEvent($_POST['titre'], $_POST['type'], $_POST['date'], $_POST['lieu'], $_POST['hosts'],$_POST['visibility'], $_POST['participation'], $_POST['price'], $_POST['assistance'], $_POST['langue'], $_POST['description'], $_POST['attending']);
		}
		else {
			foreach ($errors as $key => $value){
				$contents['errors'][$key] = '<p class="formError">'.$value.'</p>';
			}
			vue($blocks,$styles,$title,$contents,$scripts);
		}
	}
}
else {
	alert('info','Merci de vous connecter pour créer un évènement !');
	header('Location: '.getLink(['membres','connexion']));
	exit();
}
