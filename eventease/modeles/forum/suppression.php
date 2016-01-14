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
function modifierTopic($id,$message,$titre){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	//supprime le topic
	$req = $bdd->prepare('UPDATE topic SET message=:message, titre=:titre WHERE topic.id=:id');
	$req -> execute([':message'=>$message, ':id'=>$id, ':titre'=>$titre]);
}
function supprimerComment($id){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	//supprime le commentaire
	$req = $bdd->prepare('DELETE FROM message WHERE message.id=:id');
	$req -> execute([':id'=>$id]);
}
function modifierComment($id, $message){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	//supprime le topic
	$req = $bdd->prepare('UPDATE message SET contenu=:message WHERE message.id=:id');
	$req -> execute([':message'=>$message, ':id'=>$id]);
}
function getAuthorComment($id){
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$req = $bdd->prepare('SELECT id_auteur FROM message WHERE id=:id');
	$req -> execute([':id'=>$id]);
	$id_auteur = $req->fetch();

  	return $id_auteur;
}
?>