<?php
/*
Regroupe les fonctions potentiellement utiles pour valider un formulaire.

Fonctions marquées [ERR] Renvoient False si il elles échouent, True si le test a bien fonctionné.
*/


//[ERR] Vérifie le contenu d'une entrée texte (string) avec une regex (string) et sort un message d'erreur (string)
function checkTextInput($input,$regex) {
	if(!empty($input) AND !preg_match($regex, $input) ) {
		return False;
	}
	return True;
}
//[ERR] Vérifie le contenu d'une entrée textbox (string) avec une liste de mots interdits (array) et sort un message d'erreur (string)
function checkTextbox($input, $forbiddenKeywords){
	if (!empty($input) ) {
		foreach($forbiddenKeywords as $keyword){
	    	if (strpos($input, $keyword) > 0){
	    		return False;
	    	}
	    }
	}
	return True;
}
//[ERR] Vérifie le contenu d'une entrée date de naissance (format YYYY-MM-JJ) et sort un message d'erreur (string)
function checkBirthDate($input){
	if (!empty($input) AND (!validateDateFormat($input,"Y-m-d") OR !validatePastDate($input))){
		return False;
	}
	return True;
}
//[ERR] Vérifie le contenu d'une entrée adresse (string) avec google et sort un message d'erreur (string)
function checkAddress($input){
	if (!empty($input) AND !googleCheckAddress($input)){
		return False;
	}
	return True;
}

//Vérifie le contenu d'une entrée select (int) avec une liste de valeurs possibles (array).
function checkSelect($input, $possibleValues) {
	if(!empty($input) AND !in_array($input, $possibleValues) ){
		return False;
	}else{
		return True;
	}
}
// Vérifie si la photo uploadé est conforme (poids, taille) et la renomme pour l'enregistrement final (fichier + BDD)
// à utiliser avec uploadOnePhoto
// Renvoie un array(Bool(Statut de la vérification),Lien vers l'erreur ou le nouveau nom de la photo)
function checkOnePhoto($fileNameInFILES ,$maxsize, $max_height, $max_width, $validExtensions,$prefixPhoto, $uploadPath){
	if(is_uploaded_file($_FILES[$fileNameInFILES]['tmp_name'])){
		$error="";
		// Gérer si erreur d'envoi
		if ($_FILES[$fileNameInFILES]['error'] > 0 AND $_FILES[$fileNameInFILES]['error'] != 4) $error.="Le fichier a été mal transferé. ";
		// Poids Maxi
		if ($_FILES[$fileNameInFILES]['size'] > $maxsize) $error.="Le fichier est trop gros. ";
		// Dimensions Maxi - plus tard.
		$size = getimagesize($_FILES[$fileNameInFILES]['tmp_name']);
		if ($size[0] > $max_width OR $size[1] > $max_height) $error.="Le fichier dépasse les dimensions autorisées. ";
		// extensions Valides
		$uploadedExtension = strtolower( substr( strrchr($_FILES[$fileNameInFILES]['name'], '.') ,1) );
		if (in_array($uploadedExtension, $validExtensions) ) $error.="L'extension est invalide. ";

		//Variable pour la BDD
		if (!empty($prefixPhoto) ){
			$photo  = $prefixPhoto;
			$photo .= "-";
			$photo .= md5(uniqid(rand(), true));
			$photo .= ".";
			$photo .= $uploadedExtension;
		}else{
			$photo  = md5(uniqid(rand(), true));
			$photo .= ".";
			$photo .= $uploadedExtension;
		}

		//Permissions Déplacement 
		if (!is_dir($uploadPath) OR !is_writable($uploadPath)) {
			$error .= "[Erreur Serveur - Contactez l'administrateur] Les permissions sont insuffisantes pour déplacer la photo de profil. ";
		}

		if($error == ""){
			return array(True,$photo);
		}else{
			return array(False,$error);
		}
	}
}
// Upload une photo et enlève l'ancienne si elle est présente à utiliser avec checkOnePhoto
// Renvoie un booléan représentant l'échec ou la réussite de l'opéreation.
function uploadOnePhoto($fileNameInFILES, $namePreviousPhoto, $photoFolder, $nameNewPhoto){
    		if(!empty($_FILES) AND $_FILES[$fileNameInFILES]['error'] != 4) {
				if (!empty($namePreviousPhoto)) unlink($photoFolder.$namePreviousPhoto);
				move_uploaded_file($_FILES[$fileNameInFILES]['tmp_name'],$photoFolder.$nameNewPhoto);
				return True;
			}else{
				return False;
			}
    	}
