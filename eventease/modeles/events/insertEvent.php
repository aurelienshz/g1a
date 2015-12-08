<?php
/* modeles/membres/insertUser.php

CHAMPS DU TABLEAU $PUSH À PASSER EN PARAMÈTRE :
titre, debut, fin, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse

*/
function insertEvent($push) {
	echo '<pre>';
	var_dump($push);
	echo '</pre>';

	$bdd = new PDO(DSN, DBUSER, DBPASS);

	require MODELES.'functions/adresse.php';

	$typeQuery = $bdd->prepare('SELECT nom FROM type WHERE id = :id');
	if($typeQuery -> execute(['id'=> $push['type']])) {
		$id_type = $typeQuery -> fetchAll()[0]['nom'];
	}
	else {
		$id_type = 0;
	}

	$adresse_id = insertAddress($push['adresse']);

// insérer dans organise ou organise = coming soon

	$insertQuery = $bdd->prepare('INSERT INTO
		evenement (titre, debut, fin, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, id_adresse)
    	VALUES (:titre, :debut, :fin, :age_min, :age_max, :confidentiel, :sur_invitation, :tarif, :description, :site, :langue, :id_type, :id_adresse)');
    if($insertQuery -> execute([
				':titre' => $push['titre'],
				':debut' => $push['debut'],
				':fin' => $push['fin'],
				':age_min' => 0,
				':age_max' => 0,
				':confidentiel' => $push['confidentiel'],
				':sur_invitation' => $push['sur_invitation'],
				':tarif' => $push['price'],
				':description' => $push['description'],
				':site' => $push['website'],
				':langue' => $push['langue'],
				':id_type' => $id_type,
				':id_adresse' => $adresse_id])) {
			$eventId = $bdd -> lastInsertId();
			return $eventId;
		}
		else {
			var_dump($insertQuery -> errorInfo());
			return False;
		}

}
?>
