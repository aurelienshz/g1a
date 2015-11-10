<?php
/*
Configuration du site :
Ces constantes sont incluses dans le contrôleur frontal et sont donc accessibles depuis tous les scripts.
*/

define('PATH_ASSETS', "vues/assets/");
define('CONTROLEURS', "controleurs/");
define('CSS', PATH_ASSETS."css/");
define('IMAGES', PATH_ASSETS . "images/");
define('INCLUDES', PATH_ASSETS . "includes/");


// Définition des modules constituant l'application
$modules = [
'accueil',
'membres',
'events',
'forum',
'messages',
'aide'
];