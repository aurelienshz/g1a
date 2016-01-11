<?php
/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

// ===== RECUPERE LES VALEURS DEJA PRESENTES DE L'évènement =====
require MODELES.'functions/google.php';
require MODELES.'functions/date.php';
require MODELES.'functions/form.php';
require MODELES.'events/getTypes.php';
require MODELES.'events/checkOrganiser.php';
?><pre><?php
var_dump(checkOrganiser($_SESSION['id'],2));
?></pre><?php

$contents['types'] = getTypes();
$contents['values'] = ['type' => -1];	// Initialisation pour affiher "choisissez un type" mais quand même garder en mémoire le type choisi

//Si il n'y a pas d'eventID dans le GET
if(!isset($_GET['id']) ){
    header("Location: ".getLink(["accueil","404"]));
    exit();
}
//Si le EventID dans le GET n'est pas attribué.

// Fonction qui check s'il a le droit de modifier.
if( connected() && checkOrganiser($_SESSION['id'],$_GET['id']) ) {
    
}else{
	if (!connnected()){
		alert("error","Vous devez être connecté !");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
	}else{
		alert("error","Vous n'avez pas le droit de modifier cet évènement!");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
	}
	    
}
// // Bloc de traitement de l'adresse
// if (isset($user["adresse_condensee"])){
// 	$user["adresse"] = $user["adresse_condensee"];
// }elseif(isset($user["coordonnee_long"]) AND isset($user["coordonnee_lat"])){
// 	// Convertit coordonnées vers adresse
// 	$user["adresse"] = googleCoordToAddress($user['coordonnee_lat'],$user['coordonnee_long']);
// }
// // (A supprimer si je trouve pourquoi) Nettoie les -1 qui trainent en cas de suppression.
// foreach ($user as $key => $value) {
// 	if($value == -1) $value = '';
// }
// $contents = $user;
// ===== VERIFICATION POST =====

// DONNEES $_POST A PRIORI VERIFIEES A PARTIR D'ICI

// 	// Affiche les champs à jour avec ce qui a été saisi dans le formulaire.
//     foreach($_POST as $cle => $valeur){
// 			$contents[$cle]=htmlspecialchars($valeur);
// 			$_POST[$cle]=htmlspecialchars($valeur);
// 	}
//     //Entrée BDD si pas d'erreurs et sécuristation des entrées aux injections :
//     foreach ($errors as $key => $value) {
//     	if ($value != NULL){
//     		$doIt = False;
//     		break;
//     	}else{
//     		$doIt = True;
//     	}
//     }

//     if (!empty($photo) AND $photo != -1 AND $doIt == True){
//     		$upload = uploadOnePhoto("photo", $contents["lien_photo"], PHOTO_PROFIL, $photo);
//     		if ($upload) {
//     			$contents["lien_photo"] = $photo;
//     		}else{
//     		$errors["photo"] = "[Erreur Serveur - Contactez l'administrateur] Erreur dans la copie de la photo.";
// 			$doIt = False;
//    			}
//     	}
//     if (isset($photo) ) {
// 	    if ($photo == -1 AND $doIt == True) {
// 	    	unlink(PHOTO_PROFIL. $contents["lien_photo"]);
// 	    	unset($contents["lien_photo"]);
// 	    }
// 	}
//     if ($doIt){
//     	//Sécurisation par htmlspecialchars
//     	foreach($_POST as $cle => $valeur){
//     		if($valeur == ""){
//     			$_POST[$cle]=htmlspecialchars($contents[$cle]);
//     		}
//     	}
// 		updateUser(htmlspecialchars($_SESSION['id']), $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['ddn'], $_POST['tel'], $_POST['adresse'], $_POST['langue'], htmlspecialchars(isset($photo)?$photo:NULL), $_POST['description'],htmlspecialchars($contents['id_adresse']),htmlspecialchars($contents['id_photo']));
// 		alert("info","Votre profil a bien été modifié.");
// 		header('Location: '.getLink(['membres','profil']));
// 		exit();

//     }else{
//     	 $contents['errors']['general'] = '<p id="mainError">Nous n\'avons pas validé vos changements, il y a au moins une entrée invalide.</p>';
// 	     foreach ($errors as $key => $value){
// 				$contents['errors'][$key] = '<p class="formError">'.$value.'</p>';
// 			}
//     }
// }

// /**** préparation de la vue ****/

$title = 'Modifier mon évènement';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['modify'];
$scripts = ['googleAutocompleteAddress.js'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, '',$scripts);
?>
