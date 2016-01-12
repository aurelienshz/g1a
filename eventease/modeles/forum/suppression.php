<?php 
function supprimerMessage($id){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$req = $bdd->prepare('DELETE FROM topic WHERE topic.id=:id');
	$req -> execute(['id'=>$id]);
}
