<?php
function updateMedia($fileName, $id_photo){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('UPDATE media SET lien = :photo WHERE id = :id;');
    
    if($query -> execute([':photo' => $fileName, ':id' => $id_photo])){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}