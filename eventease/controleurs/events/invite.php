<?php

require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'events/insertInvite.php';

$event=getEvents($_GET['id']);
$expediteur=$_SESSION['id'];
$contents['destinataire']=$_POST['destinataire'];
$contents['titreEvenement'] = $event['titre'];


$title ="Inviter un ami à l'événement". $contents['titreEvenement'];
$styles = ['events.css','form.css'];
$blocks = ['invite'];


if(!checkUsed($destinataire)){
	$errors['destinataire'] = 'Le pseudo renseigné n\'existe pas';
}
else{

}

insertInvite($expediteur,$destinataire,$_GET['id']);

vue($blocks,$styles,$title,$contents);

?>