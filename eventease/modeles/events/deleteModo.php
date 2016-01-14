<?php
function deleteModo($id_event, $id_organisateur){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('DELETE FROM modere WHERE id_evenement = :id_evenement AND id_organisateur = :id_organisateur;');
    
    if($query -> execute([':id_evenement' => $id_event, ':id_organisateur' => $id_organisateur])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}