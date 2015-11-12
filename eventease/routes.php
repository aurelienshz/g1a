<?php
/*
---	ROUTAGE ---
Utilisée par le contrôleur frontal pour diriger vers la bonne action et le bon module
Lire la doc dans le wiki (en cours d'écriture).

ToDo / Problems :
Définition des paramètres possibles pour une action donnée dans la config du module ?
*/

function route($module, $action, $returnModuleOnly = False) {
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

	// Positionnement de la page courante et de la page précédente :
	if(!isset($_SESSION['previousPage'])) {	//Si on a rien positionné (on vient d'atterrir)
		$_SESSION['previousPage'] = ['default','default'];
		$_SESSION['currentPage'] = ['default','default'];
	}
	elseif($_SESSION['currentPage']!=[$moduleRouted, $actionRouted]) {	//Si on a réellement chargé une nouvelle page et pas simplement rafraichi
			$_SESSION['previousPage'] = $_SESSION['currentPage'];
			$_SESSION['currentPage'] = [$moduleRouted, $actionRouted];
	}

	if($returnModuleOnly) {
		return CONTROLEURS.$moduleRouted;
	}
	else {
		return CONTROLEURS.$moduleRouted.'/'.$actionRouted.'.php';

	}
}

// $parametres = ['display'=>['id'],'edit'=>['id','do']];
function getLink($page = []) {	// $page = [$module, $action, $param1, $param2]
	$link = '?';
	$parametresLien = [];
	$nomsParametres = ['module','action'];	//fetch dans la config du module pour les noms des params suivants

	// Si on a passé des paramètres supplémentaires
	if(count($page) > 2) {
		$actionsPath = route($page[0],$page[1],True).'/'.'actions.php';

		// on charge les noms des paramètres :
		if(file_exists($actionsPath)) {
			require $actionsPath;
			$nomsParametres = array_merge($nomsParametres, $parametres[$_SESSION['currentPage'][1]]);
			// Que fait-on si ce n'est pas défini !?
		}
	}

	foreach ($page as $key => $valeurParametre) {
		$parametresLien[] = $nomsParametres[$key].'='.$valeurParametre;
	}
	$link = $link.implode('&', $parametresLien);
	return $link;
}
