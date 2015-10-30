<?php
/*
Configuration du site :
Ces constantes sont incluses dans le contrôleur frontal et sont donc accessibles depuis tous les scripts.
*/

define('PATH_ASSETS', "vues/assets/");
define('CSS', PATH_ASSETS."css/");
define('IMAGES', PATH_ASSETS . "images/");
define('INCLUDES', PATH_ASSETS . "includes/");

function getLink($action) {
    switch($action) {
        case 'accueil':
        case 'home':
        case 'index':
            return '/';
            break;
        case 'connexion':
        case 'login':
            return '?module=membres&action=connexion';
            break;
        case 'deconnexion':
        case 'logout':
            return '?module=membres&action=deconnexion';
            break;
        case 'createEvent':
            return '?module=events&action=create';
            break;
        default:
            return '';
            break;
    }
}