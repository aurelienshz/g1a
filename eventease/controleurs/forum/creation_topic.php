<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle

$contents = [];

/**** Préparation de la vue ****/
$title = 'Creation de topic';
$styles = ['forum.css','search.css','form.css'];
$blocks = ['creation_topic'];

/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title,$contents);
?>