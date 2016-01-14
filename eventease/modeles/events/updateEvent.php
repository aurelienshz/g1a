<?php
/* modeles/membres/updateEvent.php

CHAMPS DU TABLEAU $PUSH À PASSER EN PARAMÈTRE :
titre, debut, fin, age_min, age_max, confidentiel, sur_invitation, tarif, description, site, langue, id_type, adresse
 
*/
function updateEvent($push) {

	$bdd = new PDO(DSN, DBUSER, DBPASS);

	require MODELES.'functions/adresse.php';
	require MODELES.'functions/insertMedia.php';
	require MODELES.'functions/updateMedia.php';
	require MODELES.'functions/removeMedia.php';

	$max_type = $push['max_type'];

	if ($max_type < $push["id_type"] OR $push["id_type"] < 0){
		$id_type = 7;
	}else{
		$id_type = $push["id_type"];
	}


	$adresse_id = insertAddress($push['adresse']);
	$media_id = NULL;
	if (!empty($push['id_media_principal'])){
		if (!empty($push['lien_photo'])){
			if ($push['lien_photo'] == -1){
				unlink(PHOTO_EVENT.$push['old_lien_photo']);
				removeMedia($push['id_media_principal']);
				$media_id = NULL;
			}else{
				updateMedia($push['lien_photo'],$push['id_media_principal']);
				$media_id = $push['id_media_principal'];
			}
		}
	}else{

		if (!empty($push['lien_photo'])){
			$media_id = insertMedia($push['lien_photo']);
		}
	}

// insérer dans organise ou organise = coming soon


	foreach ($push as $key => $value) {
		if ($value == '') $push[$key]=NULL;
	}

	$updateQuery = $bdd->prepare('UPDATE 
		evenement SET 
		titre = :titre, 
		debut = :debut, 
		fin = :fin, 
		age_min = :age_min, 
		age_max = :age_max, 
		visibilite = :visibilite, 
		invitation = :invitation, 
		tarif = :tarif, 
		description = :description, 
		site = :site, 
		langue = :langue, 
		id_type = :id_type, 
		id_adresse = :id_adresse, 
		id_media_principal = :id_media_principal, 
		sponsor = :sponsor, 
		organisateur = :organisateur, 
		max_participants = :max_participants
		WHERE id = :id;');
    if($updateQuery -> execute([
				':titre' => $push['titre'],
				':debut' => $push['date_debut'].' '.$push['beginning'],
				':fin' => $push['date_fin'].' '.$push['end'],
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
				':sponsor' => $push['hosts'],
				':max_participants' => $push['max_attendees'],
				':organisateur' => $push['sponsors'],
				':id' => $push['id']
				])) {
			return True;
		}
		else {
			var_dump($updateQuery -> errorInfo());
			return False;
		}

}
?>
