<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

// Appels au modèle
// Appels au modèle

// Traitements

/**** Affichage de la page ****/

$title = 'Profil';
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'profil'];
//Appels des vues :
vue($blocks,$styles,$title);
