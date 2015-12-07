<?php

/* CONTROLEUR D'ACTION /*
/****** Préparation des contenus ******/

require MODELES.'membres/getUserProfileDetails.php';

if(connected()) {
    $user = getUserProfileDetails($_SESSION['id']);
    if(!$user) {
    	// Si la récup BDD marche pas
    	exit();
    }
}
else{
	    alert("error","Vous devez être connecté !");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
}
echo '<pre>';
var_dump($user);
echo '</pre>';
/**** préparation de la vue ****/

$title = 'Modifier mon profil';
$styles = ['form.css','accueil.css','search.css','modify.css'];
$blocks = ['modification_profil'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $user);

?>