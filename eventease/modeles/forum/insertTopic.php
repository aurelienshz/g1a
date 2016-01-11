<?php 
function insertTopic($titre, $message, $id_section, $id_auteur) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		topic (titre, message, id_section, id_auteur, date_creation)
    	VALUES (:titre, :message, :id_section, :id_auteur, NOW())');
    $query -> execute([
				':titre' => $titre,
				':message' => $message,
				':id_section' => $id_section,
				':id_auteur'=>$id_auteur,
				]);
    $topicId = $bdd -> lastInsertId();
	return $topicId;
}
?>