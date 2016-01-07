<?php
function getMemberId($pseudo){
try {
	$bdd=new PDO(DSN, DBUSER, DBPASS);
} 
catch (Exception $e) {
	die('Erreur : ' .$e->getMessage());	
}
	$query=$bdd->prepare('SELECT id FROM membre WHERE :pseudo');
	$query->execute(['pseudo'=>$pseudo]);
	$membreId = $query->fetch();

	return $membreId;
}
function insertInvite($id_expediteur, $id_destinataire,$id_evenement){
try {
	$bdd=new PDO(DSN, DBUSER, DBPASS);
} 
catch (Exception $e) {
	die('Erreur : ' .$e->getMessage());	
}

$query=$bdd->prepare('INSERT INTO invitation (id_expediteur, id_destinataire, $id_evenement) VALUES (?,?,?)');
$query -> execute(array($id_expediteur,$id_destinataire,$id_evenement));
}
