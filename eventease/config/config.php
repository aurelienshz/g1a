<?php
/*
Configuration du site :
Ces constantes sont incluses dans le contrôleur frontal et sont donc accessibles depuis tous les scripts.
*/

define('PATH_ASSETS', "vues/assets/");
define('CSS', PATH_ASSETS."css/");
define('IMAGES', PATH_ASSETS . "images/");
define('INCLUDES', PATH_ASSETS . "includes/");
define('SCRIPTS', "scripts/");
define('USER_ASSETS', "user_media/");
define('PHOTO_PROFIL',USER_ASSETS."photos_profil/");
define('PHOTO_EVENTS',USER_ASSETS."photos_event/");
$landingPage = ['accueil','index'];

define('CONTROLEURS', "controleurs/");
define('VUES', "vues/");
define('MODELES', "modeles/");

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
