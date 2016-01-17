<?php

require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'events/insertInvite.php';
require MODELES.'membres/getUserAuth.php';


$event=getEvents($_GET['id']);
$expediteur=$_SESSION['id'];
$contents['titreEvenement'] = $event['titre'];

$title ="Inviter un ami à l'évènement ". $contents['titreEvenement'];
$styles = ['events.css','form.css'];
$blocks = ['invite'];

if(connected()){
	if(empty($_POST)){ ///Si le bloc est vide///
		vue($blocks,$styles,$title,$contents);
	}
	else{
		$destinataire=getUserAuth($_POST['destinataire']);
		if(!checkUsed($_POST['destinataire'],NULL) ){ ///si le pseudo n'existe pas///
                        alert('error','Le pseudo renseigné n\'est pas valide !');
                        vue($blocks,$styles,$title,$contents);
		}
                
		else if ($expediteur===$destinataire[0]){
                        alert('error','Vous ne pouvez pas vous inviter vous-même !');
                        vue($blocks,$styles,$title,$contents);
		}
                
		else{    ///On récupère l'ID du pseudo rentré et on fait l'insertion en BDD///
                        insertInvite($expediteur,$_GET['id'],$destinataire['id']);
                        alert('info','Votre message a bien été envoyé !');
                        vue($blocks,$styles,$title,$contents);
		}
	}
}
else{
	alert('info','Merci de vous connecter pour inviter quelqu\'un à l\'évènement !');
	header('Location: '.getLink(['membres','connexion']));
	exit();
}
