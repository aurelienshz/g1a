<?php 
function insertTopic($titre, $message, $id_section) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		topic (titre, message, id_section, date_creation)
    	VALUES (:titre, :message, :id_section, NOW())');
    $query -> execute([
				':titre' => $titre,
				':message' => $message,
				':id_section' => $id_section,
				]);

}
?>