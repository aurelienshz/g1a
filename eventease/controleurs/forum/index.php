<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle
require MODELES.'forum/getTopic.php';



/**** Préparation de la vue ****/
$title = 'Accueil - Forum';
$styles = ['forum.css','search.css'];
$blocks = ['forum'];

$topic1 = GetTopic(1);
$contents['topic1']=$topic1;

$topic2 = GetTopic(2);
$contents['topic2']=$topic2;

/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title,$contents);
?>