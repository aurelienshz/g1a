<?php
function insertMedia($fileName){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('INSERT INTO media(lien) VALUES (:photo);');
    
    if($query -> execute([':photo' => $fileName])){
    	$id_nouveau = $bdd->lastInsertId();
    	return $id_nouveau;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}