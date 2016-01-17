<?php
/* EVENTS -> CREATE */
require MODELES.'events/insertEvent.php';
require MODELES.'functions/date.php';
require MODELES.'functions/google.php';
require MODELES.'functions/form.php';
require_once MODELES.'events/getTypes.php';

$contents['types'] = getTypes();
/**** Préparation de la vue ****/
$title = 'Créer event';
$styles = ['create.css','form.css','search.css', 'prettyform.css'];
$blocks = ['create'];
$scripts = ['googleAutocompleteAddress.js','autohosted.js'];

$contents['values'] = ['type' => -1];	// Initialisation pour affiher "choisissez un type" mais quand même garder en mémoire le type choisi

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
		$requiredFields = ['titre','type','date_debut','date_fin','place','beginning','visibility','invitation'];
		// $requiredFields = ['titre'];
		foreach($requiredFields as $field) {
			if(empty($_POST[$field]) && $_POST[$field] != "0") {
				$errors[$field] = 'Ce champ est requis';
			}
		}
		if(empty($errors)) {	// Si aucune erreur n'a été générée par la vérif des champs vides

			//titre, debut, fin, journee_entiere, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse
			$push = $_POST;
			// On lui passe l'id de l'utilisateur qui a crée l'évent :
			$push['id_createur'] = $_SESSION['id'];

			// Puis on fait les vérifications spécifiques :

			// Nom conforme :
			if(!checkTextInput($_POST['titre'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' - 0-9]+$/i")) {
				$errors['titre'] = 'Titre invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces, des apostrophes et des chiffres.';
			}

			// Type dans le bon intervalle :
			if(!checkSelect($_POST['type'], range(0,count($contents['types'])) ) ){
				$errors['type'] = "Type Invalide";
				$_POST['type'] = 0;
			}else{
				$push['id_type'] = $_POST['type'];
			}

			// Lieu : passer une recherche avec Google et vérifier qu'on a une réponse en coordonnées
			if(!checkAddress($_POST['place'])) {
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
			if(empty($_POST['end'])){
				$endTimeTest = !validateDateFormat($endTime, 'Y-m-d');
			}else{
				$endTimeTest = !validateDateFormat($endTime, 'Y-m-d H:i');
			}
			if( $endTimeTest AND strtotime($startTime) >= strtotime($endTime)) {
				$errors['date_fin'] = 'La date et l\'heure de fin doivent être après la date et l\'heure de début';
			}
			else {
				$push['fin'] = $endTime;
			}
			// tarif : intval > 0
			if(intval($_POST['price']) < 0) {
				$errors['price'] = 'Tarif invalide';
			}
			// description
			$forbiddenKeywords = [' con',' salop',' enfoiré',' hitler',' nazi'];
			if(!checkTextbox($_POST['description'], $forbiddenKeywords)){
				$errors['description'] = 'Votre description contient des termes interdits (insultants).';
			}

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
				$push['invitation'] = 1;
			}

			// type public : si définis !
			// age min et max positifs et min < max
			if(intval($_POST['age_min'])<0 || intval($_POST['age_max'])<0) {
				$errors['age_max'] = 'Âge invalide';

				if(intval($_POST['age_min'])>intval($_POST['age_max'])) {
					$errors['age_max'] = 'Tranche d\âge invalide, le minimum ne peux pas dépasser le maximum !';
				}
			}
			// langue : si 1, alors 1, sinon 0
			$push['langue'] = ($_POST['langue'] == 1)?1:0;

			// max_attendees : positif
			if(intval($_POST['max_attendees'])<0) {
				$errors['max_attendees'] = 'Nombre invalide';
			}

			// site web : est-ce bien une URL ?
			if(!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
				$errors['website'] = 'URL invalide, elle n\'est pas format "http://exemple.com"';
			}
			//Autohosted ?
			if ($_POST['autohosted'] != "False"){
				// Si l'évènement est Autohosté, on nullifie les champs pour l'autre cas.
				$push['hosts'] = NULL;
				$push['hosts_contact'] = NULL;
			}elseif (empty($_POST['hosts']) AND !empty($_POST['hosts_contact'])) {
				$errors['hosts'] = 'Vous n\'avez pas précisé d\'Organisateur';
			}else{
				//Vérification des champs hosts, hosts_contact.
				if(!checkTextInput($_POST['hosts'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' - 0-9]+$/i")) {
					$errors['hosts'] = 'Hôte invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces, des apostrophes et des chiffres.';
				}
				if(!checkTextInput($_POST['hosts_contact'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' - 0-9]+$/i")) {
					$errors['hosts_contact'] = 'Information de contact de l\'Hôte invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces, des apostrophes et des chiffres';
				}
			}

			// Sponsors : regex Tristan
			if(!empty($_POST['sponsors'])) {
				if(!checkTextInput($_POST['sponsors'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' - 0-9]+$/i")) {
					$errors['sponsors'] = 'Sponsor invalide, , il ne peut contenir que des lettres (accentuées) des tirets, des espaces, des apostrophes et des chiffres.';
				}
			}
			if (!empty($_FILES)){
				//Photo
				$check = checkOnePhoto("photo" ,2097152, 1000, 1000, ['.jpg', '.jpeg', '.png'], NULL, PHOTO_EVENT);
				if ($check[0]) {
					$photo = $check[1];
				}else{
					if ($check[1] != NULL) $errors["photo"] = $check[1];
				}	
			}
		}
		//Upload de la Photo
		if (empty($errors)){
			if (!empty($photo) AND $photo != -1){
	    		$upload = uploadOnePhoto("photo", NULL, PHOTO_EVENT, $photo);
	    		if ($upload) {
	    			$push["lien_photo"] = $photo;
	    		}else{
	    		$errors["photo"] = "[Erreur Serveur - Contactez l'administrateur] Erreur dans la copie de la photo.";
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
