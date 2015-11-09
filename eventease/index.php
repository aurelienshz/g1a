<?php
/*
--- CONTROLEUR FRONTAL ---

FONCTION : Déterminer quel contrôleur on doit appeler pour que le client accède à la page qu'il a demandée.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.

*/

require 'config.php'; //On charge la config et les fonction de debug
require INCLUDES.'debug.php';

session_start(); //On initialise la session.
if(!(isset($_SESSION['connected']))) {
    $_SESSION['connected'] = False;
}
$_SESSION['debug'] = False; // Activation du mode debug. Passer à False pour désactiver.


if(isset($_GET['module'])) {
    switch($_GET['module']) {
    // Routage vers les modules :
    case 'accueil':
        require 'controleurs/accueil/index.php';
        break;
        
    case 'aide':
        require 'controleurs/aide/index.php';
        break;
    case 'events':
        require 'controleurs/events/index.php';
        break;
    case 'forum':
        require 'controleurs/forum/index.php';
        break;
    case 'membres':
        require 'controleurs/membres/index.php';
        break;
    case 'messagerie':
        require 'controleurs/messagerie/index.php';
        break;
    // Si jamais la valeur n'est pas reconnue, on defaulte sur l'accueil :
    default:
        require 'controleurs/accueil/index.php';
        break;
    }
}
else {
    require 'controleurs/accueil/index.php';
}