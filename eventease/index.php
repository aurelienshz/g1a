<?php
/*
--- CONTROLEUR FRONTAL ---
FONCTION : Déterminer quel contrôleur on doit appeler pour que le client accède à la page qu'il a demandée.
UTILISATION : Le paramètre correspondant à la page demandée est passé dans l'URL ($_GET['page']). On le teste par une structure switch qui defaulte sur la page d'accueil (prévention XSS). On ne code pas dans ce script : le code de contrôle d'un module est écrit dans le contrôleur de ce module.
*/

require 'routes.php';
require 'config.php';
require INCLUDES.'debug.php';

session_start(); //On initialise la session.
define('DEBUG', True); // Activation du mode debug. Passer à False pour désactiver.

// Initialisation de $_SESSION['connected'] (si on vient d'atterrir, la variable n'est pas positionnée)
// Besoin d'init d'autres variables de session ? Déclarez-les ici !
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = False;
}

// Choix du module vers lequel on va router :
$module = isset($_GET['module']) ? $_GET['module'] : 'default';
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

// chargement des actions
// routage unique vers le bon module et la bonne action en chargeant un tableau param avec les paramètres passés en URL
// Routage :

require route($module,$action);
