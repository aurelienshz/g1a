<?php
/*
---	ROUTAGE ---
Utilisée par le contrôleur frontal pour diriger vers la bonne action et le bon module
Se référer à la doc dans le wiki.
*/


/* module demandé :
	- pas de module demandé : on tape dans le premier de la liste
	- existe : on tape dans l'action demandée
	- n'existe pas : on tape dans accueil -> 404
*/


// La fonction route sert à sanitizer la route demandée et à savoir quel contrôleur il faut aller chercher

function route($module = '', $action = '') {
	global $modules;	// $modules : modules définis dans la config générale de l'app
	global $landingPage; // définit la page d'aterrissage du site si on a pas demandé une page en particulier
	// Si un module a été demandé et qu'il est déclaré :
	if($module && in_array($module, $modules)) {
		$moduleRouted = $module;
		// On cherche le fichier actions.php de ce module
		if(file_exists(CONTROLEURS.$moduleRouted.'/actions.php')) {
			// on l'inclut
			require CONTROLEURS.$moduleRouted.'/actions.php';
			if(in_array($action, $actions)) {
				$actionRouted = $action;
			}
			elseif(!$action) {
				$actionRouted = $actions[0];
			}
			// Si on n'a pas trouvé ce que l'utilisateur a demandé :
			else {
				$route = [0=>'accueil', 1=>'404', 'module'=>'accueil', 'action'=>'404'];
				// On interrompt l'exécution de la fonction et on retourne une valeur, cela permet
				// de forcer la redirection vers une 404 si le module demandé était bon mais pas l'action.
				return $route;
			}
		}
		// Si pas d'actions.php, on tape dans index.php
		else {
			$actionRouted = 'index';
		}
		$route = [0=>$moduleRouted, 1=>$actionRouted, 'module'=>$moduleRouted, 'action'=>$actionRouted];
	}
	else {
		// Si on a pas demandé de module --> accueil
		if(!$module) {
			$moduleRouted = $landingPage[0];
			$actionRouted = $landingPage[1];
			$route = [0=>$moduleRouted, 1=>$actionRouted,  'module'=>$moduleRouted, 'action'=>$actionRouted];
		}
		// Si on en a demandé un mais pas trouvé : 404 !!
		else {
			$route = [0=>'accueil', 1=>'404', 'module'=>'accueil', 'action'=>'404'];
		}
	}

	// echo '<pre>';
	// var_dump($route);
	// echo '</pre>';

	return $route;
}

function fetchParams($page) {
	$pageRoute = route($page[0],$page[1]);
	// chemin du fichier actions.php :
	$actionsPath = CONTROLEURS.$pageRoute['module'].'/'.'actions.php';
	// on charge les noms des paramètres de l'action :
	if(file_exists($actionsPath)) {
		require $actionsPath;
		if(isset($parametres) && array_key_exists($page[1], $parametres)) {
			return $parametres[$page[1]];
		}
		// Que fait-on si ce n'est pas défini !?
	}
	else {
		return False;
	}
}

// $parametres = ['display'=>['id'],'edit'=>['id','do']];
function getLink($page = []) {	// $page = [$module, $action, $param1, $param2]
	$rewrite = True;
	if($rewrite) {
		$link = '';
		if(count($page) > 2) {
			fetchParams($page);
		}
		foreach($page as $key => $valeurParametre) {
			$link .= "/".$valeurParametre;
		}
		return $link;
	}
	else {
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
}
