<?php
/*
--- CONTROLEUR FRONTAL ---
FONCTION : Déterminer quel contrôleur on doit appeler pour que le client accède à la page qu'il a demandée.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.
*/

session_start(); //On initialise la session.

require 'routes.php';
require 'config.php';
require 'splash.php';
require 'vue.php';
require MODELES.'membres/connected.php';

define('DEBUG', True); // Activation du mode debug. Passer à False pour désactiver.

// Initialisation de $_SESSION['connected'] (si on vient d'atterrir, la variable n'est pas positionnée)
if(!connected()) {
    $_SESSION['connected'] = False;
}

// Choix du module vers lequel on va router :
$module = isset($_GET['module']) ? $_GET['module'] : 'default';
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

// Routage :
$route = route($module,$action);

// Chargement des superglobales pour se souvenir de la page actuelle et de la page précédente :
if(!isset($_SESSION['previousPage'])) {	        // Si on a rien positionné (on vient d'atterrir)
    $_SESSION['previousPage'] = $defaultPage; // Prends garde à toi si l'action par déf n'est pas nommée index !
    $_SESSION['currentPage'] = $defaultPage;
}
elseif($_SESSION['currentPage']!=$route) {	    // Si on a réellement chargé une nouvelle page et pas simplement rafraichi
    $_SESSION['previousPage'] = $_SESSION['currentPage'];
    $_SESSION['currentPage'] = [];
    if (count($_GET)>0) {
        foreach($_GET as $value) {
            $_SESSION['currentPage'][] = $value;
        }
    }
    else {
        $_SESSION['currentPage'] = $defaultPage;
        $_SESSION['currentPage'] = $defaultPage;
    }
    // $_SESSION['currentPage'] = [$route['module'],$route['action']];
}

// Appel final du contrôleur dont on a besoin :
require CONTROLEURS.$route['module'].'/'.$route['action'].'.php';
