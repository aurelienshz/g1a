<?php
/*
Configuration du site :
Ces constantes sont incluses dans le contrôleur frontal et sont donc accessibles depuis tous les scripts.
*/

define('PATH_ASSETS', "vues/assets/");
define('CSS', PATH_ASSETS."css/");
define('IMAGES', PATH_ASSETS . "images/");
define('INCLUDES', PATH_ASSETS . "includes/");

$defaultPage = ['accueil','index'];

define('CONTROLEURS', "controleurs/");
define('VUES', "vues/");

// Définition des modules constituant l'application
// Le premier sera le module chargé par défaut en cas de lien brisé (pas de page 404 pour l'instant)
$modules = [
'accueil',
'membres',
'events',
'forum',
'messages',
'aide'
];
