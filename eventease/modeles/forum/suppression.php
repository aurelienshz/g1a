<?php 
function supprimerTopic($id){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	//supprime le topic
	$req = $bdd->prepare('DELETE FROM topic WHERE topic.id=:id');
	$req -> execute([':id'=>$id]);

	//supprime les messages associés au topic
	$req=$bdd->prepare('DELETE FROM message WHERE message.id_topic=:id');
	$req -> execute([':id'=>$id]);
}
function modifierTopic($id,$message){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	//supprime le topic
	$req = $bdd->prepare('UPDATE topic SET message=:message WHERE topic.id=:id');
	$req -> execute([':message'=>$message, ':id'=>$id]);
}