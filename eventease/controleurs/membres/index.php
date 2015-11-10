<?php
/* CONTROLEUR MEMBRES */

switch($_GET['action']) {
    case 'connexion':
        require 'controleurs/membres/connexion.php';
        break;
    case 'deconnexion':
        require 'controleurs/membres/deconnexion.php';
        break;
    case 'inscription':
        require 'controleurs/membres/inscription.php';
        break;
    case 'profil':
        require 'controleurs/membres/profil.php';
        break;
    default:
        require 'controleurs/membres/profil.php';
        break;
}

// Il y a quelque part une fonction route
// $routes=[connexion, deconnexion, inscription, profil];
// route('action', $routes);