<?php 

function checkOrganiser($userId, $eventId){

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $queryCreator = $bdd->prepare("SELECT evenement.id_createur FROM evenement WHERE evenement.id = $eventId;");
    $queryMod = $bdd->prepare("SELECT membre.id FROM membre, modere WHERE membre.id = modere.id_organisateur AND modere.id_evenement = $eventId;");
	
	$queryCreator -> execute();
	$creatorId = $queryCreator -> fetchAll();
	$queryMod -> execute();
	$moderatorId = $queryMod -> fetchAll();
	// Construction Array de ID autorisés.
	if (!empty($creatorId)){

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
		 
	}else{
		return False;
	}
}