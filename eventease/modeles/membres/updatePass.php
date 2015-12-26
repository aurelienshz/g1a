<?php
function updatePass ($id, $passHash){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('UPDATE membre
							SET mdp=:mdp
							WHERE id=:id;');
    if($query -> execute([':mdp'=>$passHash, ':id'=>$id]) ){
    	return True;
    }else{
		var_dump($query -> errorInfo());
		return False;
	}
}