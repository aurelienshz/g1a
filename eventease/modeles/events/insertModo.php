<?php
function insertModo($id_event, $id_organisateur){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('INSERT INTO modere(id_evenement, id_organisateur) VALUES (:id_evenement, :id_organisateur);');
    
    if($query -> execute([':id_evenement' => $id_event, ':id_organisateur' => $id_organisateur])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}