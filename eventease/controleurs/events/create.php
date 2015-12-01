<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/
// Appels au modèle
// Traitements
// Appels au modèle
// Traitements
require MODELES.'events/insertEvent.php';
/**** Préparation de la vue ****/
$title = 'Créer event';
$styles = ['create.css','form.css'];
$blocks = ['create'];

/**** Affichage de la page ****/
//Appel de la vue :
if (empty($_POST)) {
	vue($blocks, $styles, $title);
}
else {
	insertEvent($_POST['title']);
	vue($blocks,$styles,$title);
}

