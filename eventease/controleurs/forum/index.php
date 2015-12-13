<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

$contents = [];

/**** Préparation de la vue ****/
$title = 'Accueil - Forum';
$styles = ['forum.css','search.css'];
$blocks = ['forum'];


/**** Affichage de la page ****/
//Appel de la vue :
vue($blocks,$styles,$title,$contents);
?>