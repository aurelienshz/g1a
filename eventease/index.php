<?php
/*
--- CONTROLEUR FRONTAL ---

FONCTION : Déterminer quel contrôleur on doit appeler pour que le client accède à la page qu'il a demandée.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.

*/

session_start(); //On initialise la session.
define('DEBUG', True); // Activation du mode debug. Passer à False pour désactiver.

require 'routes.php';
require 'config.php';
require INCLUDES.'debug.php';

if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = False;
}

$module = isset($_GET['module'])?$_GET['module']:'default';
require routeModule($module,$modules);