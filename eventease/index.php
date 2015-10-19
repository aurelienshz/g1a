<?php
/*
--- CONTROLEUR FRONTAL ---

FONCTION : Déterminer vers quel contrôleur on doit diriger le client pour qu'il accède à la page qu'il a demandé.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.
*/

if(isset($_GET['page'])) {
    switch($_GET['page']) {
    case 'accueil':
        require 'controleurs/accueil/index.php';
        break;
    case 'aide':
        require 'controleurs/aide/index.php';
        break;
    case 'evenements':
        require 'controleurs/evenements/index.php';
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
    // Si jamais la valeur n'est pas prédéfinie, on defaulte sur l'accueil :
    default:
        require 'controleurs/accueil/index.php';
        break;
    }
}
else {
    require 'controleurs/accueil/index.php';
}

// Routeur externe ? A réfléchir (Aurélien)