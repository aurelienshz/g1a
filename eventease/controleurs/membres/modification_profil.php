<?php
/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

// ===== RECUPERE LES VALEURS DEJA PRESENTES DE L'UTILISATEUR =====
require MODELES.'membres/getUserDetails.php';
require MODELES.'functions/google.php';
require MODELES.'functions/date.php';
require MODELES.'membres/updateUser.php';



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
// ===== VERIFIE ET INSERE LES DONNES =====
if(!empty($_POST)){
	//Civilité
	if(!empty($_POST['civilite']) AND $_POST['civilite'] !== 0){
		$_POST['civilite'] = 1;
	}
	// Nom & Prénom
	if(!empty($_POST['nom']) AND !preg_match("/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", $_POST['nom'])){
		$errors['nom'] = 'Nom invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces et des apostrophes.';
	}
	if(!empty($_POST['prenom']) AND !preg_match("/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", $_POST['prenom'])){
		$errors['prenom'] = 'Prenom invalide, il ne peut contenir que des lettres (accentuées) des tirets, des espaces et des apostrophes.';
	}
	//DDN
	if (!empty($_POST['ddn']) AND (!validateDateFormat($_POST['ddn'],"Y-m-d") OR !validatePastDate($_POST['ddn']))){
		$errors['ddn'] = 'Date invalide, la date est à venir ou n\'est pas au format AAAA-MM-JJ ou JJ-MM-AAAA';
	}
	//Tel
	if(!empty($_POST['tel']) AND !preg_match("/^0\d{9}$/", $_POST['tel'])){
		$errors['tel'] = 'Numéro de téléphone invalide, il contient trop de chiffres, commence par autre chose que 0 ou des lettres et caractères non autorisés.';
	}
	// Adresse :
	if (!empty($_POST['adresse']) AND !googleCheckAddress($_POST['adresse'])){
		$errors['adresse'] = 'Adresse invalide';
	}
	// Langue :
	if(!empty($_POST['langue']) AND $_POST['langue'] !== 0){
		$_POST['langue'] = 1;
	}
	//Description :
	if(!empty($_POST['description'])){
	    $forbiddenKeywords = [' con',' salop',' enfoiré',' hitler',' nazi'];
	    foreach($forbiddenKeywords as $keyword){
	    	if (strpos($_POST['description'], $keyword) > 0){
	    		$errors['description'] = 'Description invalide, il contient des mots interdits.';
	    	}
	    	break;
	    }
	}
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
    if (empty($errors)){
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
