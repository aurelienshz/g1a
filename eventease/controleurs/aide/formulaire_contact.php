<?php
require MODELES. 'faq/getUserInfo.php';

/**** Préparation de la vue ****/
$contents=getUserInfo($_SESSION['id']);

$title = 'Nous contacter';
$styles = ['forum.css','search.css','form.css'];
$blocks=['formulaire_contact'];

/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles, $title, $contents);

?>
