<?php
/* CONTROLEUR D'ACTION */
//Appels au modèle
require MODELES. 'forum/insertTopic.php';

/**** Préparation de la vue ****/
$title = 'Creation de topic';
$styles = ['forum.css','search.css','form.css'];

/**** Affichage de la page ****/
//Appel de la vue :
if(connected()){
	if (empty($_POST)) { // Le formulaire n'a pas été rempli
		vue(['creation_topic'],$styles,$title);
	}
	else {
		if ($_POST['titre'] && $_POST['message'] && $_POST['id_section']!=0){
			$topicId = insertTopic($_POST['titre'], $_POST['message'], $_POST['id_section'], $_SESSION['id']);
			header('Location: '.getLink(['forum','sujet', $topicId]));
		}
		else {
			alert('error', 'Tous les champs sont requis !');
			vue(['creation_topic'],$styles,$title);
		}
	}
}
else{
	alert('info','Merci de vous connecter pour créer un topic !');
	header('Location: '.getLink(['membres','connexion']));
	exit();
}
?>