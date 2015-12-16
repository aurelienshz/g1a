<?php
/*
Regroupe les fonctions potentiellement utiles pour valider un formulaire.

Fonctions marquées [ERR] prennent en sortie la variable qui récupère le message d'erreur.
Si tout s'est bien passé, ces fonctions renvoient NULL.
*/


//[ERR] Vérifie le contenu d'une entrée texte (string) avec une regex (string) et sort un message d'erreur (string)
function checkTextInput($input,$regex,$message_erreur) {
	if(!empty($input) AND !preg_match($regex, $input) ) {
		return $message_erreur;
	}
	return;
}
//[ERR] Vérifie le contenu d'une entrée textbox (string) avec une liste de mots interdits (array) et sort un message d'erreur (string)
function checkTextbox($input, $forbiddenKeywords, $message_erreur){
	if (!empty($input) ) {
		foreach($forbiddenKeywords as $keyword){
	    	if (strpos($input, $keyword) > 0){
	    		return $message_erreur;
	    	}
	    }
	}
	return;
}
//[ERR] Vérifie le contenu d'une entrée date de naissance (format YYYY-MM-JJ) et sort un message d'erreur (string)
function checkBirthDate($input, $message_erreur){
	if (!empty($input) AND (!validateDateFormat($input,"Y-m-d") OR !validatePastDate($input))){
		return $message_erreur;
	}
	return;
}
//[ERR] Vérifie le contenu d'une entrée adresse (string) avec google et sort un message d'erreur (string)
function checkAddress($input, $message_erreur){
	if (!empty($input) AND !googleCheckAddress($input)){
		return $message_erreur;
	}
	return;
}

//Vérifie le contenu d'une entrée select (int) avec une liste de valeurs possibles (array) et sort un la valeur sur par défaut précisée (int) en cas de problème.
function checkSelect($input, $possibleValues, $default_value) {
	if(!empty($input) AND !in_array($input, $possibleValues) ){
		return $default_value;
	}else{
		return $input;
	}
}