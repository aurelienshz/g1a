<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle
require MODELES.'forum/getTopic.php';

$topic = getTopic ();


$contents['topic']=$topic;
$contents['titre']=$topic['titre'];

/**** Préparation de la vue ****/
$title = 'Accueil - Forum';
$styles = ['forum.css','search.css'];
$blocks = ['forum'];


/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title,$contents);
?>