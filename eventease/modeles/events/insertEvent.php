<?php
/* modeles/membres/insertUser.php

CHAMPS DU TABLEAU $PUSH À PASSER EN PARAMÈTRE :
titre, debut, fin, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse

*/
function insertEvent($push) {

	$bdd = new PDO(DSN, DBUSER, DBPASS);

	require MODELES.'functions/adresse.php';
	require MODELES.'functions/insertMedia.php';

		$id_type = $push["id_type"];

	$adresse_id = insertAddress($push['adresse']);
	if (!empty($push['lien_photo'])) {
		$media_id = insertMedia($push['lien_photo']);
	}else{
		$media_id = NULL;
	}
	
// insérer dans organise ou organise = coming soon

	$insertQuery = $bdd->prepare('INSERT INTO
		evenement (titre, debut, fin, age_min, age_max, visibilite, invitation, tarif, description, site, langue, id_type, id_adresse, id_createur, id_media_principal, sponsor, organisateur, organisateur_contact, max_participants)
    	VALUES (:titre, :debut, :fin, :age_min, :age_max, :visibilite, :invitation, :tarif, :description, :site, :langue, :id_type, :id_adresse, :id_createur, :id_media_principal, :sponsor, :organisateur, :organisateur_contact, :max_participants)');
    if($insertQuery -> execute([
				':titre' => $push['titre'],
				':debut' => $push['debut'],
				':fin' => $push['fin'],
				':age_min' => $push['age_min'],
				':age_max' => $push['age_max'],
				':visibilite' => $push['visibilite'],
				':invitation' => $push['invitation'],
				':tarif' => $push['price'],
				':description' => $push['description'],
				':site' => $push['website'],
				':langue' => $push['langue'],
				':id_type' => $id_type,
				':id_adresse' => $adresse_id,
				':id_media_principal' => $media_id,
				':sponsor' => $push['sponsors'],
				':max_participants' => $push['max_attendees'],
				':organisateur' => $push['hosts'],
				':organisateur_contact' => $push['hosts_contact'],
				':id_createur'=> $push['id_createur']])) {
			$eventId = $bdd -> lastInsertId();
			return $eventId;
		}
		else {
			var_dump($insertQuery -> errorInfo());
			return False;
		}

}
?>
