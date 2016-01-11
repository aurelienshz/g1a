<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle
require MODELES.'forum/getTopic.php';



/**** Préparation de la vue ****/
$title = 'Accueil - Forum';
$styles = ['forum.css','search.css'];
$blocks = ['forum'];

$contents['topic1']=getTopic(1);

$contents['topic2']=getTopic(2);

/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title,$contents);
?>
