<?php
/* CONTROLEUR D'ACTION */
//require MODELES. 'forum/getSection.php';


/* Chargement des paramètres de la page


/**** Préparation de la vue ****/
$title = 'Sujet';
$styles = ['forum.css','search.css'];
$blocks = ['sujet'];


/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title);

?>
