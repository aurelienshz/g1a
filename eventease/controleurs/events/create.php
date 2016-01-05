<?php
/* EVENTS -> CREATE */
require MODELES.'events/insertEvent.php';
require MODELES.'functions/date.php';
require MODELES.'functions/google.php';

$contents['types'] = ['Soirée', 'Pique-Nique', 'Concert', 'Manifestation', 'Vernissage', 'Conférence', 'Vente privée', 'Brocante', 'Exposition', 'Rassemblement'];


/**** Préparation de la vue ****/
$title = 'Créer event';
$styles = ['create.css','form.css','search.css', 'prettyform.css'];
$blocks = ['create'];
$scripts = ['googleAutocompleteAddress.js'];

$contents['values'] = ['type' => -1];	// Initialisation pour affiher "choisissez un type" mais quand même garder en mémoire le type choisi
echo '<pre>';
var_dump($_POST);
echo '</pre>';

if(connected()) {
	if (empty($_POST)) {
		vue($blocks, $styles, $title, $contents, $scripts);
	}
	else {	// le formulaire a été validé
		// Recherche d'erreurs lors du remplissage du formulaire :
		// Initialisation de la liste des erreurs :
		$errors = [];
		foreach($_POST as $key=>$value) {
			$_POST[$key] = htmlspecialchars($_POST[$key]);
			$contents['values'][$key] = htmlspecialchars($_POST[$key]);
		}
		// On vérifie que tous les champs requis sont bien remplis :
		$requiredFields = ['titre','type','date_debut','date_fin','place','beginning','hosts','visibility','invitation'];
		// $requiredFields = ['titre'];
		foreach($requiredFields as $field) {
			if(empty($_POST[$field]) && $_POST[$field] != "0") {
				$errors[$field] = 'Ce champ est requis';
			}
		}
		if(empty($errors)) {	// Si aucune erreur n'a été générée par la vérif des champs vides

			//titre, debut, fin, journee_entiere, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse
			$push = $_POST;

			// Puis on fait les vérifications spécifiques :

			// Nom conforme :
			if(!preg_match("/^[-a-zâäàéèùêëîïôöçñ' 0-9@#]+$/i", $_POST['titre'])) {
				$errors['titre'] = 'Titre invalide';
			}

			// Type dans le bon intervalle :
			if(isset($_POST['type'])) {
				if(intval($_POST['type']) <= 0 OR intval($_POST['type'] > 12 )) {
					$errors['type'] = 'Type invalide';
				}
				else {
					$push['id_type'] = $_POST['type'];
				}
			}

			// Lieu : passer une recherche avec Google et vérifier qu'on a une réponse en coordonnées
			if(!googleCheckAddress($_POST['place'])) {
				$errors['place'] = isset($errors['place'])?$errors['place']:'L\'adresse semblait invalide. Nous avons tenté de la corriger.';
				$contents['values']['place'] = googleCorrectAddress($_POST['place']);
			}
			else {
				$push['adresse'] = $_POST['place'];
			}

			// Date / heure début conforme et future :
			$startTime = $_POST['date_debut'].' '.$_POST['beginning'];
			$endTime = $_POST['date_fin'].' '.$_POST['end'];

			if(!(validateDateFormat($startTime, 'Y-m-d H:i') && validateFutureDate($startTime))) {
				$errors['date_debut'] = 'La date ne doit pas être dépassée';
			}
			else {
				$push['debut'] = $startTime;
			}
			if(strtotime($startTime) >= strtotime($endTime)) {
				$errors['date_fin'] = 'La date et l\'heure de fin doivent être après la date et l\'heure de début';
			}
			else {
				$push['fin'] = $endTime;
			}
			// tarif : intval > 0
			if(intval($_POST['price']) < 0) {
				$errors['price'] = 'Tarif invalide';
			}
			// description : htmlspecialchars
			$_POST['description'] = htmlspecialchars($_POST['description']);

			// visibility :
			if($_POST['visibility'] == 0 || $_POST['visibility'] == 1) {
				$push['visibilite'] = intval($_POST['visibility']);
			}
			else {
				$push['visibilite'] = 2;
			}

			// participation :
			if($_POST['invitation'] == 0) {
				$push['invitation'] = 0;
			}
			else {
				$push['invitation'] = 0;
			}

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
			if(!empty($_POST['sponsors'])) {
				if(False) {
					$errors['sponsors'] = 'Nom invalide';
				}
			}
		}

		// Insertion de l'event ou affichage de la vue avec les erreurs :
		if(empty($errors)) {
			/// INSERTION EN BDD : ///
			if($id = insertEvent($push)) {
				alert('ok','Succès ! L\'évènement a bien été créé.');
				header('Location: '.getLink(['events','display',$id]));
				exit();
			}
			else {
				echo 'erreur insertion BDD';
			}
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
