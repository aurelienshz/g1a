<?php
/* CONTROLEUR D'ACTION */
//require MODELES. 'forum/getSection.php';
require MODELES. 'forum/getTopicDetails.php';
require MODELES. 'forum/InsertMessage.php';
require MODELES. 'forum/getUserDetails.php';
/* Chargement des paramètres de la page*/

$id=$_GET['id'];
$contents['id']=$id;

$titre = getTitre($id);
$contents['titre']=$titre['titre'];

$message = getMessage($id);
$contents['message']=$message['message'];

$date_creation = getDate_creation($id);
$contents['jour']=$date_creation['jour'];
$contents['mois']=$date_creation['mois'];
$contents['annee']=$date_creation['annee'];
$contents['heure']=$date_creation['heure'];
$contents['minute']=$date_creation['minute'];

$membre = getMembre($id);
$contents['pseudo']=$membre['pseudo'];
$contents['id_auteur']=$membre['id_auteur'];

$images = getImages($membre['id_auteur']);
$contents['lien']=$images['lien'];


$contents['id_auteur']=$membre['id_auteur'];
$nombre = getNombre($contents['id_auteur']);
$contents['COUNT(*)']=$nombre['COUNT(*)'];


$comments=getComments($id);
$contents['comments']=$comments;

if (connected()){
$id_user=$_SESSION['id'];
$userDetails=getUserDetails($id_user);
$contents['pseudo1']=$userDetails['pseudo'];


$userImage=getImages($id_user);
$contents['lien1']=$userImage['lien'];
}
/**** Préparation de la vue ****/


$title = $titre['titre'];
$styles = ['forum.css','search.css'];


/**** Affichage de la page ****/
//Appel de la vue :
if (empty($_POST)) { // Le formulaire n'a pas été rempli
		vue(['sujet'],$styles,$title, $contents);
	}
else {
		if ($_POST['contenu']){
			if (connected()){
			insertMessage($_POST['contenu'], $id, $id_user);
			header('Location: '.getLink(['forum','sujet', $id]));
			}
		}
		else 
			alert('error', 'Vous n\'avez rien écrit !');
            vue(['sujet'],$styles,$title, $contents);
	}
?>