<?php
/*
--- REGLES DE ROUTAGE ---

Utilisées par le contrôleur frontal pour diriger vers la bonne action et le bon module

Ajout d'une route :
à documenter
*/

// forme de $_SESSION['page'] : [$module,$action]

function routeModule($module, $modulesDefined) {
	if(in_array($module, $modulesDefined)) {
		$moduleRouted = $module;
	}
	else {
		$moduleRouted = $modulesDefined[0];
	}
	if(False) {//Le module requis est dépourvu de vue
		$_SESSION['redirect'] = '';
	}
	return CONTROLEURS.$moduleRouted.'/index.php';
}


function routeAction($action, $actionsDefined) {
	if(in_array($action, $actionsDefined)) {
		$actionRouted = $action;
	}
	else {
		$actionRouted = $actionsDefined[0];
	}
}

// Paramètres possibles pour une action donnée définis dans la config du module
function getLink($page = []) {	// $page = [$module, $action, $param1, $param2]
	$link = '?';
	$parametres = [];
	$nomsParametres = ['module','action'];	//fetch dans la config du module pour les noms des params suivants
	foreach ($page as $key => $valeurParametre) {
		$parametres[] = $nomsParametres[$key].'='.$valeurParametre;
	}
	$link = $link.implode('&', $parametres);
	return $link;
}