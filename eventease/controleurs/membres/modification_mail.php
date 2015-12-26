<?php
require MODELES.'membres/getUserAuth.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}




$title = 'Changer son adresse mail';
$styles = ['form.css'];
$blocks = ['modification_mail'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title);
?>