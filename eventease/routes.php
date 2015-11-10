<?php
/*
--- REGLES DE ROUTAGE ---

Utilisées par le contrôleur frontal pour diriger vers la bonne action et le bon module

Ajout d'une route :
à documenter
*/

// forme de $_SESSION['page'] : [$module,$action]

$moduleRouted = '';
$routeDebug = [];

function route($module, $action) {
	global $modules, $actionParams;
	if(in_array($module, $modules)) {
		$moduleRouted = $module.'/';
	}
	else {
		$moduleRouted = $modules[0].'/';
	}
	if(file_exists(CONTROLEURS.$moduleRouted.'actions.php')) {

		require CONTROLEURS.$moduleRouted.'actions.php';
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

	require CONTROLEURS.$moduleRouted.$actionRouted.'.php';
	return True;
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