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
$styles = ['create.css','form.css', 'search.css'];
$blocks = ['create'];

/**** Affichage de la page ****/
//Appel de la vue :
if (empty($_POST)) {
	vue($blocks, $styles, $title);
}
else {
	var_dump($_POST);
	insertEvent($_POST['titre'], $_POST['type'], $_POST['date'], $_POST['lieu'], $_POST['hosts'],
	 $_POST['visibility'], $_POST['participation'], $_POST['price'], $_POST['assistance'], $_POST['langue'], $_POST['description'], $_POST['attending']);
	vue($blocks,$styles,$title);
}