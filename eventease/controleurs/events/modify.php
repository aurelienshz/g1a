<?php
/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/
// ===== RECUPERE LES VALEURS DEJA PRESENTES DE L'évènement =====
require MODELES.'functions/google.php';
require MODELES.'functions/date.php';
require MODELES.'functions/form.php';
require MODELES.'events/getTypes.php';
require MODELES.'events/checkOrganiser.php';
require MODELES.'events/getEventDetails.php';
require MODELES.'events/updateEvent.php';

	$nameTranslation = [
	'price' => 'tarif',
	'max_attendees' => 'max_participants',
	'visibility' => 'visibilite',
	'hosts' => 'organisateur',
	'hosts_contact' => 'organisateur_contact',
	'sponsors' => 'sponsor',
	'website' => 'site'
	];

$contents['types'] = getTypes();
$contents['values'] = ['type' => -1];	// Initialisation pour affiher "choisissez un type" mais quand même garder en mémoire le type choisi

//Si il n'y a pas d'eventID dans le GET
if(!isset($_GET['id']) ){
	alert("error","Vous n'avez pas précisé quel évènement vous vouliez !");
    header("Location: ".getLink(["accueil","404"]));
    exit();
}
$_GET['id'] = htmlspecialchars($_GET['id']);
//Si le EventID dans le GET n'est pas attribué.
$contents['values'] = getEvents($_GET['id']);
$contents['values']['hosts'] = $contents['values']['organisateur'];
$contents['values']['hosts_contact'] = $contents['values']['organisateur_contact'];

$contents['values']['lien_photo'] = getMainImage($_GET['id']);
if (empty($contents["values"])){
	alert("error","Cet évènement n'existe pas !");
    header("Location: ".getLink(["accueil","404"]));
    exit();
}

// Fonction qui check s'il a le droit de modifier.
if( connected() && (checkOrganiser($_SESSION['id'],$_GET['id'])  OR $_SESSION['niveau'] == 2 OR $_SESSION['niveau'] == 3) ) {

}else{
	if (!connected()){
		alert("error","Vous devez être connecté !");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
	}else{
		alert("error","Vous n'avez pas le droit de modifier cet évènement!");
    	header("Location: ".getLink(["accueil"]));
    	exit();
	}

}
//Traitement Dates
$contents["values"]["date_debut"] = date('Y-m-d',strtotime($contents['values']['debut']));
$contents["values"]["beginning"] = date('H:i',strtotime($contents['values']['debut']));
$contents["values"]["date_fin"] = date('Y-m-d',strtotime($contents['values']['fin']));
$contents["values"]["end"] = date('H:i',strtotime($contents['values']['fin']));
if ($contents['values']['end'] == "OO:OO") unset($contents['values']['end']);
//Get addresse
$contents["values"]["adresse"] = getAdress($_GET['id'])[0];

// ===== VERIFICATION POST =====

//Formulaire soumis
if(!empty($_POST)){

	//Sécuriser POST
	foreach($_POST as $cle => $valeur){
			$_POST[$cle]=htmlspecialchars($valeur);
	}

	//Vérifier que l'on a les champs requis
	$requiredFields = ['titre','type','date_debut','date_fin','beginning','adresse','visibility','invitation'];
		foreach($requiredFields as $field) {
			if(empty($_POST[$field]) && $_POST[$field] != "0") {
				$errors[$field] = 'Ce champ est requis';
			}
		}
	$push = $_POST;
	//Commencer les vérifications
	if (empty($errors)){
		//titre, debut, fin, journee_entiere, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse

		// Nom conforme :
		if(!checkTextInput($_POST['titre'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' , 0-9]+$/i")) {
			$errors['titre'] = 'Titre invalide, il ne peut contenir que des lettres (accentuées) des virgules, des espaces, des apostrophes et des chiffres.';
		}
		// Type dans le bon intervalle :
		if(!checkSelect($_POST['type'], range(0,max(array_keys($contents['types'])))) ){
			$errors['type'] = "Type Invalide";
			$_POST['type'] = 0;
		}else{
			$push['id_type'] = $_POST['type'];
		}
		
		// Lieu : passer une recherche avec Google et vérifier qu'on a une réponse en coordonnées
		if(!checkAddress($_POST['adresse'])) {
			$errors['adresse'] = isset($errors['adresse'])?$errors['adresse']:'L\'adresse semblait invalide. Nous avons tenté de la corriger.';
			$contents['values']['adresse'] = googleCorrectAddress($_POST['adresse']);
		}
		else {
			$push['adresse'] = $_POST['adresse'];
		}

		// Date / heure début conforme et future :
		$startTime = $_POST['date_debut'].' '.$_POST['beginning'];
		$endTime = $_POST['date_fin'].' '.$_POST['end'];
		if(!(validateDateFormat($startTime, 'Y-m-d H:i') && validateFutureDate($startTime))) {
			if (strtotime($startTime) < strtotime($contents['values']['date_debut']." ".$contents['values']['beginning'])){
				$errors['date_debut'] = 'Vous ne pouvez pas reculer la date d\'un évènement en cours ('.$contents['values']['date_debut'].')';
			}
		}else {
			$push['debut'] = $startTime;
		}
		if(empty($_POST['end'])){
			$endTimeTest = !validateDateFormat($endTime, 'Y-m-d');
		}else{
			$endTimeTest = !validateDateFormat($endTime, 'Y-m-d H:i');
		}
		if( $endTimeTest OR strtotime($startTime) >= strtotime($endTime)) {
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
			$errors['description'] = 'Votre description contient des termes interdits (insultants)';
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
		if (!empty($_POST['autohosted']) && !boolval($_POST['autohosted'])){
			// Si l'évènement est Autohosté, on nullifie les champs pour l'autre cas.
			$push['hosts'] = NULL;
			$push['hosts_contact'] = NULL;
		}elseif (empty($_POST['hosts']) AND !empty($_POST['hosts_contact'])) {
			$errors['hosts'] = 'Vous n\'avez pas précisé d\'Organisateur';
		}else{
			//Vérification des champs hosts, hosts_contact.
			if(!checkTextInput($_POST['hosts'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' , 0-9]+$/i")) {
				$errors['hosts'] = 'Hôte invalide, il ne peut contenir que des lettres (accentuées) des virgules, des espaces, des apostrophes et des chiffres.';
			}
			if(!checkTextInput($_POST['hosts_contact'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' , 0-9]+$/i")) {
				$errors['hosts_contact'] = 'Information de contact de l\'Hôte invalide, il ne peut contenir que des lettres (accentuées) des virgules, des espaces, des apostrophes et des chiffres.';
			}
		}
		// Sponsors : regex Tristan
		if(!empty($_POST['sponsors'])) {
			if(!checkTextInput($_POST['sponsors'],"/^[a-zâäàéèùêëîïôöçñ 0-9][a-zâäàéèùêëîïôöçñ' , 0-9]+$/i")) {
				$errors['sponsors'] = 'Sponsor invalide, il ne peut contenir que des lettres (accentuées) des virgules, des espaces, des apostrophes et des chiffres.';
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
			// Si il veut supprimer la photo
			if (isset($_POST['photo']) && empty($errors) ) {
				if ($_POST['photo'] == -1){
					$photo = -1;
					$push["lien_photo"] = -1;
					var_dump($contents['values']["lien_photo"]);
					$push["old_lien_photo"] = $contents['values']["lien_photo"];
					$contents['values']["lien_photo"] = -1;
				}
			}
		}
	}

	//Upload de la Photo
	if (empty($errors)){
		if (!empty($photo) AND $photo != -1){
    		$upload = uploadOnePhoto("photo", $contents['values']["lien_photo"], PHOTO_EVENT, $photo);
    		if ($upload) {
    			$push["lien_photo"] = $photo;
    		}else{
    		$errors["photo"] = "[Erreur Serveur - Contactez l'administrateur] Erreur dans la copie de la photo.";
   			}
    	}
	}

	if(!empty($_POST) && !empty($push)){
		// Affiche les champs à jour avec ce qui a été saisi dans le formulaire.
		foreach($push as $cle => $valeur){
			$contents['values'][$cle]=$push[$cle];
		}
		foreach ($nameTranslation as $cle => $value) {
			$contents['values'][$value]=$push[$cle];
		}
	}


    if (empty($errors)){
    	$push['id_media_principal'] = $contents['values']['id_media_principal'];
    	$push['max_type'] = count($contents['types']);
    	$push['id'] = $_GET['id'];
    	if (updateEvent($push)){
	    	alert("info","Votre évènement a bien été modifié.");
			header('Location: '.getLink(['events','display',$_GET['id']]));
			exit();
    	}
    }else{
    	 $contents['errors']['general'] = '<p id="mainError">Nous n\'avons pas validé vos changements, il y a au moins une entrée invalide.</p>';
	     foreach ($errors as $key => $value){
				$contents['errors'][$key] = '<p class="formError">'.$value.'</p>';
			}
    }

}

// /**** préparation de la vue ****/

$title = 'Modifier mon évènement';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css'];
$blocks = ['modify'];
$scripts = ['googleAutocompleteAddress.js','autohosted.js'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, $contents,$scripts);
?>
