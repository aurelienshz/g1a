<?php
/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

// ===== RECUPERE LES VALEURS DEJA PRESENTES DE L'UTILISATEUR =====
require MODELES.'membres/getUserDetails.php';
require MODELES.'functions/google.php';
require MODELES.'functions/date.php';
require MODELES.'membres/updateUser.php';
require MODELES.'functions/form.php';



if(connected()) {
    $user = getUserDetails($_SESSION['id']);
    if(!$user) {
    	// Si la récup BDD marche pas
    	exit();
    }
}
else{
	    alert("error","Vous devez être connecté !");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
}
// Bloc de traitement de l'adresse
if (isset($user["adresse_condensee"])){
	$user["adresse"] = $user["adresse_condensee"];
}elseif(isset($user["coordonnee_long"]) AND isset($user["coordonnee_lat"])){
	// Convertit coordonnées vers adresse
	$user["adresse"] = googleCoordToAddress($user['coordonnee_lat'],$user['coordonnee_long']);
}
$contents = $user;
// ===== VERIFICATION POST =====

// function checkTextInput($input,$regex,$message_erreur) {
// 	if(!empty($input) AND !preg_match($regex, $input) ) {
// 		return $message_erreur;
// 	}
// 	return;
// }

// function checkTextbox($input, $forbiddenKeywords, $message_erreur){
// 	if (!empty($input) ) {
// 		foreach($forbiddenKeywords as $keyword){
// 	    	if (strpos($input, $keyword) > 0){
// 	    		return $message_erreur;
// 	    	}
// 	    }
// 	}
// 	return;
// }
// function checkSelect($input, $possibleValues, $default_value) {
// 	if(!empty($input) AND !in_array($input, $possibleValues) ){
// 		return $default_value;
// 	}else{
// 		return $input;
// 	}
// }

// function checkBirthDate($input, $message_erreur){
// 	if (!empty($input) AND (!validateDateFormat($input,"Y-m-d") OR !validatePastDate($input))){
// 		return $message_erreur;
// 	}
// 	return;
// }
// function checkAddress($input, $message_erreur){
// 	if (!empty($input) AND !googleCheckAddress($input)){
// 		return $message_erreur;
// 	}
// 	return;
// }

if(!empty($_POST)){
	//Civilité
	$_POST['civilite'] = checkSelect($_POST['civilite'], [0,1], 0);

	// Nom & Prénom : 
	$errors['nom'] = checkTextInput($_POST['nom'],"/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i",'Nom invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces et des apostrophes.');
	$errors['prenom'] = checkTextInput($_POST['prenom'],"/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", 'Prénom invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces et des apostrophes.');

	//DDN
	$errors['ddn'] = checkBirthDate($_POST['ddn'], 'Date invalide, la date est à venir ou n\'est pas au format AAAA-MM-JJ ou JJ-MM-AAAA');

	//Tel
	$errors['tel'] = checkTextInput($_POST['tel'],"/^0\d{9}$/",'Numéro de téléphone invalide, il contient trop de chiffres, commence par autre chose que 0 ou des lettres et caractères non autorisés.');

	// Adresse :
	$errors['adresse'] = checkAddress($_POST['adresse'], 'Adresse invalide');

	// Langue :
	$_POST['langue'] = checkSelect($_POST['langue'], [0,1], 0);

	//Description :
	$forbiddenKeywords = [' con',' salop',' enfoiré',' hitler',' nazi'];
	$errors['description'] = checkTextbox ($_POST['description'],$forbiddenKeywords ,'Description invalide, il contient des mots interdits.' );

	//Photo de Profil
	if(is_uploaded_file($_FILES['photo']['tmp_name'])){
		$errors['photo']="";
		// Gérer si erreur d'envoi
		if ($_FILES["photo"]['error'] > 0 AND $_FILES["photo"]['error'] != 4) $errors['photo'].="Le fichier a été mal transferé. ";
		// Poids Maxi
		$maxsize = 2097152;
		if ($_FILES["photo"]['size'] > $maxsize) $errors['photo'].="Le fichier est trop gros. ";
		// Dimensions Maxi - plus tard.
		$max_height = 1000;
		$max_width  = 1000;
		$size = getimagesize($_FILES['photo']['tmp_name']);
		if ($size[0] > $max_width OR $size[1] > $max_height) $errors['photo'].="Le fichier dépasse les dimensions autorisées. ";
		// extensions Valides
		$validExtensions = array('.jpg', '.jpeg', '.png');
		$uploadedExtension = strtolower( substr( strrchr($_FILES["photo"]['name'], '.') ,1) );
		if (in_array($uploadedExtension, $validExtensions) ) $errors['photo'].="L'extension est invalide. ";

		//Variable pour la BDD
		$photo  = $_SESSION['username'];
		$photo .= "-";
		$photo .= md5(uniqid(rand(), true));
		$photo .= ".";
		$photo .= $uploadedExtension;

		//Permissions Déplacement 
		if (!is_dir(PHOTO_PROFIL) OR !is_writable(PHOTO_PROFIL)) {
			$errors['photo'] .= "[Erreur Serveur - Contactez l'administrateur] Les permissions sont insuffisantes pour déplacer la photo de profil. ";
		}

		if($errors['photo'] == ""){
			unset($errors['photo']);
		}
	}
	// Vérifie qu'il n'y a pas des champs en trop ou en moins.
	$champsAttendus = array('civilite','nom','prenom','ddn','tel','adresse','langue','description');
	foreach($_POST as $cle => $valeur){
		if(!in_array($cle, $champsAttendus)){
			unset($_POST[$cle]);
		}elseif (!isset($_POST[$cle])) {
			$_POST[$cle]="";
		}
	}
	// DONNEES $_POST A PRIORI VERIFIEES A PARTIR D'ICI

	// Affiche les champs à jour avec ce qui a été saisi dans le formulaire.
    foreach($_POST as $cle => $valeur){
			$contents[$cle]=htmlspecialchars($valeur);
			$_POST[$cle]=htmlspecialchars($valeur);
	}
    //Entrée BDD si pas d'erreurs :
    foreach ($errors as $key => $value) {
    	if ($value != NULL){
    		$doIt = False;
    		break;
    	}else{
    		$doIt = True;
    	}
    }
    if ($doIt){
    	foreach($_POST as $cle => $valeur){
    		if($valeur == ""){
    			$_POST[$cle]=htmlspecialchars($contents[$cle]);
    		}
    	}
    	
    	//Execute l'envoi du formulaire et de la photo de profil
    	if(!empty($_FILES) AND $_FILES["photo"]['error'] != 4) {
				if (!empty($contents["lien_photo"])) unlink(PHOTO_PROFIL.$contents["lien_photo"]);
				move_uploaded_file($_FILES["photo"]['tmp_name'],PHOTO_PROFIL.$photo);
				$contents['lien_photo'] = $photo;
			}
    	updateUser(htmlspecialchars($_SESSION['id']), $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['ddn'], $_POST['tel'], $_POST['adresse'], $_POST['langue'], isset($photo)?$photo:NULL, $_POST['description'],$contents['id_adresse'],$contents['id_photo']);
    	 alert("info","Votre profil a bien été modifié.");
    	header('Location: '.getLink(['membres','profil']));
    	exit();

    }else{
    	 $contents['errors']['general'] = '<p id="mainError">Nous n\'avons pas validé vos changements, il y a au moins une entrée invalide.</p>';
	     foreach ($errors as $key => $value){
				$contents['errors'][$key] = '<p class="formError">'.$value.'</p>';
			}
    }
}
/**** préparation de la vue ****/

$title = 'Modifier mon profil';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['modification_profil'];
$scripts = ['googleAutocompleteAddress.js'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $contents,$scripts);
?>
