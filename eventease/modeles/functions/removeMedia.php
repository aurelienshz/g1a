<?php
function removeMedia($id_photo){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('DELETE FROM media WHERE id = :id_photo;');
    
    if($query -> execute([':id_photo' => $id_photo])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}