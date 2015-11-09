<?php
/*
--- REGLES DE ROUTAGE ---

Utilisées par le contrôleur frontal pour diriger vers la bonne action et le bon module

Ajout d'une route :
*/

define('CONTROLEURS', 'controleurs');

// LA PREMIERE VALEUR A UNE IMPORTANCE : C'est sur elle qu'on va defaulter !
$routes = [
'accueil',
'membres',
'events',
'forum',
'messages',
'aide'
];


function getRoute($module) {
	return CONTROLEURS.'/'.$module.'/index.php';
}


// idée : getLink($module,$action[,$paramètres])