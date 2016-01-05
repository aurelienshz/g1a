<?php
function updateOneUserField ($id, $valueName, $newValue){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$requete = "UPDATE membre SET $valueName=:newValue WHERE id=:id;";
	$execution = [":newValue"=>$newValue, ':id'=>$id];
    $query = $bdd->prepare($requete);
    if($query -> execute($execution) ){
    	return True;
    }else{
		var_dump($query -> errorInfo());
		return False;
	}
}