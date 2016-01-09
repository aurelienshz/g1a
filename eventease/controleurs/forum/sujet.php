<?php
/* CONTROLEUR D'ACTION */
//require MODELES. 'forum/getSection.php';
require MODELES. 'forum/getTopicDetails.php';
/* Chargement des paramètres de la page*/

$titre = getTitre($_GET['id']);
$contents['titre']=$titre['titre'];

$message = getMessage($_GET['id']);
$contents['message']=$message['message'];

$date_creation = getDate_creation($_GET['id']);
$contents['jour']=$date_creation['jour'];
$contents['mois']=$date_creation['mois'];
$contents['annee']=$date_creation['annee'];
$contents['heure']=$date_creation['heure'];
$contents['minute']=$date_creation['minute'];

$membre = getMembre($_GET['id']);
$contents['pseudo']=$membre['pseudo'];

$contents['id_auteur']=$membre['id_auteur'];
$nombre = getNombre($contents['id_auteur']);
$contents['COUNT(*)']=$nombre['COUNT(*)'];

/**** Préparation de la vue ****/


$title = $titre['titre'];
$styles = ['forum.css','search.css'];
$blocks = ['sujet'];


/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title,$contents);

?>
