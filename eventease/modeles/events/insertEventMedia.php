<?php
function insertEventMedia($id_event, $id_media){

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('INSERT INTO media_evenement(id_evenement, id_media) VALUES (:id_evenement, :id_media);');
    
    if($query -> execute([':id_evenement' => $id_event, ':id_media' => $id_media])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}