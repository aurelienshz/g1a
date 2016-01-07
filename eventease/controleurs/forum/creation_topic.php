<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle
require MODELES. 'forum/insertTopic.php';

print_r($_POST);
$contents = [];

/**** Préparation de la vue ****/
$title = 'Creation de topic';
$styles = ['forum.css','search.css','form.css'];

/**** Affichage de la page ****/
//Appel de la vue :

if (empty($_POST)) { // Le formulaire n'a pas été rempli
	vue(['creation_topic'],$styles,$title);
}
else {
	insertTopic($_POST['titre'], $_POST['message'], $_POST['id_section'], $_SESSION['id']);
	vue(['sujet'],$styles,$title,$contents);
}

?>