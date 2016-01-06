<?php 
function insertTopic($titre, $message, $id_section, $id_membre) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		topic (titre, message, id_section, id_membre, date_creation)
    	VALUES (:titre, :message, :id_section, :id_membre NOW())');
    $query -> execute([
				':titre' => $titre,
				':message' => $message,
				':id_section' => $id_section,
				':id_membre' => $id_membre,
				]);

}
?>