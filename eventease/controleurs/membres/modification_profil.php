<?php
/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

// ===== RECUPERE LES VALEURS DEJA PRESENTES DE L'UTILISATEUR =====
require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/updateUser.php';
require MODELES.'functions/date.php';
require MODELES.'functions/google.php';

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
	if($_POST['civilite'] !== 0){
		$_POST['civilite'] = 1;
	}
	// Nom & Prénom
	if(!preg_match("/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", $_POST['nom'])){
		$errors['nom'] = 'Nom invalide';
	}
	if(!preg_match("/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", $_POST['prenom'])){
		$errors['prenom'] = 'Prenom invalide';
	}
	//DDN
	if (!validateDateFormat($_POST['ddn'],"Y-m-d") OR !validatePastDate($_POST['ddn'])){
		$errors['ddn'] = 'Date invalide';
	}
	//Tel
	if(!preg_match("/^0\d(?:[ .-]?\d{2}){4}$/", $_POST['tel'])){
		$errors['tel'] = 'Numéro de téléphone invalide';
	}
	// Addresse : 
	if (!googleCheckAddress($_POST['adresse'])){
		$errors['adresse'] = 'Adresse invalide';
	}
	// Langue : 
	if($_POST['langue'] !== 1){
		$_POST['langue'] = 0;
	}
	//Description :
    $forbiddenKeywords = ['con','salop','enfoiré','hitler','nazi']; // Godwin point awarded ! //
    foreach($forbiddenKeywords as $keyword){
    	if (strpos($_POST['description'], $keyword) != False){
    		$errors['description'] = 'Description invalide';
    	}
    }
    //Entrée BDD si pas d'erreurs :
    if (empty($errors)){
    	//Execute l'envoi du formulaire
    	//updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description)
    }else{
	     foreach ($errors as $key => $value){
				$contents['errors'][$key] = '<p class="formError">'.$value.'</p>';
			}
    }
}
/**** préparation de la vue ****/

$title = 'Modifier mon profil';
$styles = ['form.css','accueil.css','search.css','modify.css'];
$blocks = ['modification_profil'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $contents);
?>