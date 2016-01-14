<?php
function removeEventMedia($id_event, $id_media){

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('DELETE FROM media_evenement WHERE id_evenement = :id_evenement AND id_media = :id_media;');
    
    if($query -> execute([':id_evenement' => $id_event, ':id_media' => $id_media])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}