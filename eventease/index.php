<?php
/*
--- CONTROLEUR FRONTAL ---
FONCTION : Déterminer quel contrôleur on doit appeler pour que le client accède à la page qu'il a demandée.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.
test HTTPS
*/
session_start(); //On initialise la session.

require 'config/config.php';
require 'config/constants.php';
require 'config/db.php';
require CONTROLEURS.'shared/routes.php';
require CONTROLEURS.'shared/alert.php';
require CONTROLEURS.'shared/vue.php';

require_once MODELES.'membres/connected.php';

define('DEBUG', True); // Activation du mode debug. Passer à False pour désactiver.

// Initialisation de $_SESSION['connected'] (si on vient d'atterrir, la variable n'est pas positionnée)
if(!connected()) {
    $_SESSION['connected'] = False;
}

// Choix du module vers lequel on va router :
$module = isset($_GET['module']) ? $_GET['module'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Routage :
$route = route($module,$action);
$params = array_slice($_GET, 2);

// Chargement des superglobales pour se souvenir de la page actuelle et de la page précédente :
// Si on a rien positionné (on vient d'atterrir)
if(!isset($_SESSION['previousPage'])) {
    $_SESSION['previousPage'] = $landingPage;   // Page d'atterrissage : paramétrée dans config.php
    $_SESSION['currentPage'] = $landingPage;
}
// Si on a bien chargé une nouvelle page et pas redemandé la même page :
elseif($_SESSION['currentPage'] != array_values($_GET)) {
    $_SESSION['previousPage'] = $_SESSION['currentPage'];
    $_SESSION['currentPage'] = [$route[0], $route[1]];

    foreach($params as $value) {
        $_SESSION['currentPage'][] = $value;
    }
}
// Si on a redemandé la même page : on ne fait rien ! On laisse currentPage et previousPage à leurs valeurs initiales.

// Appel final du contrôleur dont on a besoin :
require CONTROLEURS.$route['module'].'/'.$route['action'].'.php';
