<?php
/*
---	ROUTAGE ---
Utilisée par le contrôleur frontal pour diriger vers la bonne action et le bon module
Lire la doc dans le wiki (en cours d'écriture).

ToDo / Problems :
Définition des paramètres possibles pour une action donnée dans la config du module ?
*/

function route($module, $action, $fetchOnly = False) {
	// $modules = modules définis dans la config générale de l'app
	global $modules;
	if(in_array($module, $modules)) {
		$moduleRouted = $module;
	}
	else {
		$moduleRouted = $modules[0];
	}
	if(file_exists(CONTROLEURS.$moduleRouted.'/actions.php')) {
		require CONTROLEURS.$moduleRouted.'/actions.php';
		if(in_array($action, $actions)) {
			$actionRouted = $action;
		}
		else {
			$actionRouted = $actions[0];
		}
	}
	else {
		$actionRouted = 'index';
	}

	$route = [0=>$moduleRouted, 1=>$actionRouted, 'module'=>$moduleRouted, 'action'=>$actionRouted];
	return $route;
}

function fetchParams($page) {
	$pageRoute = route($page[0],$page[1]);
	$actionsPath = CONTROLEURS.$pageRoute['module'].'/'.'actions.php';
	// on charge les noms des paramètres de l'action :
	if(file_exists($actionsPath)) {
		require $actionsPath;
		return $parametres[$page[1]];
		// Que fait-on si ce n'est pas défini !?
	}
}
// $parametres = ['display'=>['id'],'edit'=>['id','do']];
function getLink($page = []) {	// $page = [$module, $action, $param1, $param2]
	$link = '?';
	$parametresLien = [];				// array qui contiendra les paramètres et leurs valeurs
	$nomsParametres = ['module','action'];	//fetch dans la config du module pour les noms des params suivants

	// Si on a passé des paramètres supplémentaires
	if(count($page) > 2) {
		$nomsParametres = array_merge($nomsParametres, fetchParams($page));
	}
	// on construit le lien avec les bons paramètres :
	foreach ($page as $key => $valeurParametre) {
		$parametresLien[] = $nomsParametres[$key].'='.$valeurParametre;
	}
	// Concaténation des paramètres avec leur valeur derrière le lien
	$link = $link.implode('&', $parametresLien);
	return $link;
}
