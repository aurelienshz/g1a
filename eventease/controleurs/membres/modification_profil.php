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
		$errors['nom'] = 'Nom Invalide';
	}
	if(!preg_match("/^[a-zâäàéèùêëîïôöçñ][a-zâäàéèùêëîïôöçñ' -]+$/i", $_POST['prenom'])){
		$errors['prenom'] = 'Prenom Invalide';
	}
	//DDN
	if (!validateDateFormat($_POST['ddn'],"Y-m-d") OR !validatePastDate($_POST['ddn'])){
		$errors['ddn'] = 'Date non valide';
	}

	// Vérifications
	// 		Tel : Vérifier 10 chiffres ou mieux ?
	//		Addresse : checkAddressegoogle
	// 		Langue : 0 ou 1 uniquement
	// 		Description : Chais pas
	// if $error vide : passer la requete -> sinon refresh avec erreurs
	//updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description)


// Construit tableau contenant les messages d'erreurs individuels
	if (isset($errors)){
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