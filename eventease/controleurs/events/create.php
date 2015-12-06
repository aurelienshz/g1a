<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/
// Appels au modèle
// Traitements
// Appels au modèle
// Traitements
require MODELES.'events/insertEvent.php';
require MODELES.'functions/date.php';
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
	else {	// le formulaire a été rempli
		echo 'Le formulaire a été rempli.';
		// Recherche d'erreurs lors du remplissage du formulaire :
		// Initialisation de la liste des erreurs :
		$errors = [];

		// On vérifie que tous les champs requis sont bien remplis :
		$requiredFields = ['titre','type','date','place','beginning','end','hosts','visibility','participation'];
		foreach($requiredFields as $field) {
			if(empty($_POST[$field])) {
				echo $field.' vide - ';
				$errors[$field] = 'Ce champ est requis';
			}
			else {
				$push[$field] = $_POST[$field];
			}
		}

		// Puis on fait les vérifications spécifiques :
		// Nom conforme :
		if(!preg_match("/^[a-zâäàéèùêëîïôöçñ' -0-9@#]+$/i", $_POST['titre'])) {
			$errors['titre'] = 'Titre invalide'
		}
		// Type dans le bon intervalle :
		if(!(intval($_POST['type']) >= 0 AND intval($_POST['type'] <12 ))) {
			$errors('type') = 'Type invalide';
		}

		// Lieu : passer une recherche avec Google et vérifier qu'on a une réponse en coordonnées


		// Date conforme
		$startTime = $_POST['date'].' '.$_POST['beginning'];
		// heure : heure début dans le futur :
		// strtotime(date . heure debut) > time();

		// heure fin : conforme à heure début

		// tarif : intval > 0

		// description : htmlspecialchars

		// organisateurs, visibility, participation : à remanier ?

		// type public : si définis !
		// age min et max positifs et min < max

		// langue : si 1, alors 1, sinon 0

		// max_attendees : positif

		// site web : est-ce bien une URL ?

		// Sponsors : regex Tristan

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
