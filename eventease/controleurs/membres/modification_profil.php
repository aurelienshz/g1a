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
}else{
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
// (A supprimer si je trouve pourquoi) Nettoie les -1 qui trainent en cas de suppression.
foreach ($user as $key => $value) {
	if($value == -1) $value = '';
}
$contents = $user;
// ===== VERIFICATION POST =====

if(!empty($_POST)) {
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
	// Cas de suppression d'adresse
	if (!empty($contents['id_adresse']) AND empty($_POST['adresse']) ){
		$_POST['adresse'] = -1;
	}

	// Langue :
	$_POST['langue'] = checkSelect($_POST['langue'], [0,1], 0);

	//Description :
	$forbiddenKeywords = [' con',' salop',' enfoiré',' hitler',' nazi'];
	$errors['description'] = checkTextbox ($_POST['description'],$forbiddenKeywords ,'Description invalide, il contient des mots interdits.' );

	$check = checkOnePhoto("photo" ,2097152, 1000, 1000, ['.jpg', '.jpeg', '.png'], $_SESSION['username'], PHOTO_PROFIL);
	if ($check[0]) {
		$photo = $check[1];
	}else{
		$errors["photo"] = $check[1];
	}
	// Si il veut supprimer la photo
	if (isset($_POST['photo']) ) {
		if ($_POST['photo'] == -1){
			$photo = -1;
		}
	}
	// Vérifie qu'il n'y a pas des champs en trop ou en moins.
	$champsAttendus = array('civilite','nom','prenom','ddn','tel','adresse','langue','description');
	foreach($_POST as $cle => $valeur){
		if(!in_array($cle, $champsAttendus)){
			unset($_POST[$cle]);
		}elseif (!isset($_POST[$cle])) {
			$_POST[$cle]="";
		}else{
    		$_POST[$cle]=htmlspecialchars($_POST[$cle]);
    	}
	}
	// DONNEES $_POST A PRIORI VERIFIEES A PARTIR D'ICI

	// Affiche les champs à jour avec ce qui a été saisi dans le formulaire.
    foreach($_POST as $cle => $valeur){
			$contents[$cle]=htmlspecialchars($valeur);
			$_POST[$cle]=htmlspecialchars($valeur);
	}
    //Entrée BDD si pas d'erreurs et sécuristation des entrées aux injections :
    foreach ($errors as $key => $value) {
    	if ($value != NULL){
    		$doIt = False;
    		break;
    	}else{
    		$doIt = True;
    	}
    }

    if (!empty($photo) AND $photo != -1 AND $doIt == True){
    		$upload = uploadOnePhoto("photo", $contents["lien_photo"], PHOTO_PROFIL, $photo);
    		if ($upload) {
    			$contents["lien_photo"] = $photo;
    		}else{
    		$errors["photo"] = "[Erreur Serveur - Contactez l'administrateur] Erreur dans la copie de la photo.";
			$doIt = False;
   			}
    	}
    if (isset($photo) ) {
	    if ($photo == -1 AND $doIt == True) {
	    	unlink(PHOTO_PROFIL. $contents["lien_photo"]);
	    	unset($contents["lien_photo"]);
	    }
	}
    if ($doIt){
    	//Sécurisation par htmlspecialchars
    	foreach($_POST as $cle => $valeur){
    		if($valeur == ""){
    			$_POST[$cle]=htmlspecialchars($contents[$cle]);
    		}
    	}
		updateUser(htmlspecialchars($_SESSION['id']), $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['ddn'], $_POST['tel'], $_POST['adresse'], $_POST['langue'], htmlspecialchars(isset($photo)?$photo:NULL), $_POST['description'],htmlspecialchars($contents['id_adresse']),htmlspecialchars($contents['id_photo']));
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
