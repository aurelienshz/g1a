<?php

require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'events/insertInvite.php';
require MODELES.'membres/getUserAuth.php';


$event=getEvents($_GET['id']);
$expediteur=$_SESSION['id'];
$contents['titreEvenement'] = $event['titre'];

$title ="Inviter un ami à l'événement ". $contents['titreEvenement'];
$styles = ['events.css','form.css'];
$blocks = ['invite'];

$errors=[];

if(connected()){
	if(empty($_POST)){ ///Si le bloc est vide///
		vue($blocks,$styles,$title,$contents);
	}
	else{
		$destinataire=getUserAuth($_POST['destinataire'],False);
		if(!checkUsed($_POST['destinataire'],NULL,False) ){ ///si le pseudo n'existe pas///
			$errors['destinataire'] = 'Le pseudo renseigné n\'existe pas !';
		}
		if ($expediteur==$destinataire[0]){
			$errors['destinataire'] = 'Vous ne pouvez pas vous inviter vous même !';
		}

		else{    ///On récupère l'ID du pseudo rentré///
			$destinataire=getUserAuth($_POST['destinataire']);
		}

	}
	if(empty($errors)) {
			/// INSERTION EN BDD : ///
				$destinataire=getUserAuth($_POST['destinataire']);
				insertInvite($expediteur,$_GET['id'],$destinataire['id']);
				vue($blocks,$styles,$title,$contents);
			}
	else{
		foreach($errors as $error){
			alert('info',$error);
		}
	}
}
else{
	alert('info','Merci de vous connecter pour inviter quelqu\'un à l\'événement !');
	header('Location: '.getLink(['membres','connexion']));
	exit();
}


/*vue($blocks,$styles,$title,$contents);*/

?>
