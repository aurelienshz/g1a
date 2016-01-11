<?php

require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'events/insertInvite.php';


$event=getEvents($_GET['id']);
$expediteur=$_SESSION['id'];
$contents['titreEvenement'] = $event['titre'];

$destinataire=getMemberId($_POST['destinataire']);
$contents['destinataire']=$destinataire;
$title ="Inviter un ami à l'événement ". $contents['titreEvenement'];
$styles = ['events.css','form.css'];
$blocks = ['invite'];

$errors=[];

if(connected()){
	if(empty($_POST)){ ///Si le bloc est vide///
		vue($blocks,$styles,$title,$contents);
	}
	else{
		if(!checkUsed($_POST['destinataire'])){ ///si le pseudo n'existe pas///
			$errors['destinataire'] = 'Le pseudo renseigné n\'existe pas';
		}

		else{    ///On récupère l'ID du pseudo rentré///
			$destinataire=getMemberId($_POST['destinataire']);
		}

	}
	if(empty($errors)) {
			/// INSERTION EN BDD : ///
				$destinataire=getMemberId($_POST['destinataire']);
				insertInvite($expediteur,$_GET['id'],$destinataire['id']);
			}
	else{
		vue($blocks,$styles,$title,$contents);
	}
}
else{
	alert('info','Merci de vous connecter pour créer un évènement !');
	header('Location: '.getLink(['membres','connexion']));
	exit();
}


vue($blocks,$styles,$title,$contents);

?>