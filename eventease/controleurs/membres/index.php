<?php
/* CONTROLEUR MEMBRES */

$actions = [
'profil',
'connexion',
'deconnexion',
'inscription'
];

routeAction($_GET['action'], $actions);