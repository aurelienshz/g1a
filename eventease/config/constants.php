<?php
/*
Constantes de fonctionnement dde l'appli.
Ces constantes sont accessibles depuis tous les scripts.
*/

define('APP_ROOT',str_replace('index.php','',$_SERVER['PHP_SELF']));

define('CONTROLEURS', "controleurs/");
define('VUES', "vues/");
define('MODELES', "modeles/");

// fichiers inclus server-sde : chemin relatif
define('INCLUDES', "vues/includes/");

// fichiers servis client-side : chemin absolu pour contourner la réécriture
define('PATH_ASSETS', "assets/");
define('CSS', PATH_ASSETS."css/");
define('IMAGES', PATH_ASSETS . "images/");
define('SCRIPTS', "scripts/");

// media mis en ligne par les utilisateurs :
define('USER_ASSETS', "user_media/");
define('PHOTO_PROFIL',USER_ASSETS."photos_profil/");
define('PHOTO_EVENT',USER_ASSETS."photos_event/");
