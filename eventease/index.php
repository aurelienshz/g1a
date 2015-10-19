<?php
/*
CONTROLEUR FRONTAL

FONCTION : Déterminer vers quel contrôleur on doit diriger le client pour qu'il accède à la page qu'il a demandé.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.
*/

if(isset($_GET['page'])) {
    switch($_GET['page']) {
    case 'accueil':
        require 'controleurs/accueil/index.php';
        break;
    default:
        echo 'Page d\'accueil';
        break;
    }
}
else {
    echo 'Page d\'accueil';
}

// Routeur externe ? A réfléchir (Aurélien)