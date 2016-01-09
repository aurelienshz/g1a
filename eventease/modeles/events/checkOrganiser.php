<?php 

function checkOrganiser($userId, $eventId){

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $queryCreator = $bdd->prepare("SELECT membre.id FROM membre, evenement WHERE membre.id = evenement.id_createur;");
    $queryMod = $bdd->prepare("SELECT membre.id FROM membre, modere WHERE membre.id = modere.id_organisateur AND modere.id_evenement = $eventId;");
	
	$queryCreator -> execute();
	$queryMod -> execute();
	$creatorId = $queryCreator -> fetchAll();
	$moderatorId = $queryMod -> fetchAll();
	// Construction Array de ID autorisés.
	$id = [$creatorId[0][0]];
	foreach ($moderatorId as $key => $value) {
		array_push($id,$moderatorId[$key][0]);
	}
	// Test des ID Autorisés
	if (in_array($userId, $id)){
		return True;
	}else{
		return False;
	}    
}