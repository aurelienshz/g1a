<?php
/* CONTROLEUR D'ACTION */
//require MODELES. 'forum/getSection.php';


/* Chargement des paramètres de la page
$section = getSection($_GET['id']);
$contents['section']=$section;
$contents['TitreSection'] = $section['titre'];
$contents['DescriptionSection'] = $section['description'];

/**** Préparation de la vue ****/
$title = 'Accueil - Forum';
$styles = ['forum.css','search.css'];
$blocks = ['forum'];


/**** Affichage de la page ****/
//Appel de la vue :

vue($blocks,$styles,$title);

?>

