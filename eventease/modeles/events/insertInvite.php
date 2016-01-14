<?php
function getMemberId($pseudo){
try {
	$bdd=new PDO(DSN, DBUSER, DBPASS);
}
catch (Exception $e) {
	die('Erreur : ' .$e->getMessage());
}
	$query=$bdd->prepare('SELECT id FROM membre WHERE pseudo=:pseudo');
	$query->execute(['pseudo'=>$pseudo]);
	$membreId = $query->fetch();

	return $membreId;
}
function insertInvite($expediteur, $evenement,$destinataire){
try {
	$bdd=new PDO(DSN, DBUSER, DBPASS);
}
catch (Exception $e) {
	die('Erreur : ' .$e->getMessage());
}

$query=$bdd->prepare('INSERT INTO invitation (id_expediteur, id_evenement, id_destinataire) VALUES (:expediteur,:evenement,:destinataire)');
$query->execute([
	'expediteur'=>$expediteur,
	'evenement'=>$evenement,
	'destinataire'=>$destinataire
	]);
}
