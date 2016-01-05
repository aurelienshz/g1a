<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function generateUpdateMember($photo_id, $adresse_id) {
	$insert = 'UPDATE membre
				SET civilite=:civilite,
					nom=:nom, 
					prenom=:prenom, 
					ddn=:ddn, 
					tel=:tel, 
					langue=:langue, 
					description=:description';

	if (!empty($photo_id) && !empty($adresse_id)){
		$insert .= ",id_photo=$photo_id,id_adresse=$adresse_id";
	}elseif (!empty($photo_id)){
		$insert .= ",id_photo=$photo_id";
	}elseif (!empty($adresse_id)) {
		$insert .= ",id_adresse=$adresse_id";
	}else{
		$insert .= "";
	}
	$insert .= ' WHERE id=:id;';

	return $insert;

}

function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description,$id_adresse,$id_photo) {
	if(!empty($adresse))	{
		$output = googleAddressToCoord($adresse);
		$latlng = array(":lat"=>$output[0],":lng"=>$output[1]);
	}

	$updateAddress = 'UPDATE adresse
					  SET adresse_condensee = :adresse,
					  	  coordonnee_lat = :lat,
					  	  coordonnee_long = :lng
					  WHERE id = :id_adresse;'; 

	$insertAddress = 'INSERT INTO adresse(adresse_condensee, coordonnee_lat, coordonnee_long)
						    VALUES(:adresse, :lat, :lng);
						  	SET @adresse_id = LAST_INSERT_ID();';

	$removeAddress = 'DELETE FROM adresse
				  	  WHERE id = :id_adresse;';

	$updateMedia = 'UPDATE media
					  SET lien = :photo
					  WHERE id = :id_photo;';

	$insertMedia = 'INSERT INTO media(lien)
							VALUES (:photo);
					SET @photo_id = LAST_INSERT_ID();';

	$removeMedia = 'DELETE FROM media
					  WHERE id = :id_photo;';

	$requete = '';
	$execution = array();

	// Batterie de tests : 
	// Structures des matrices de test :
	// $objet_mat = array(Existe ?(Bool), Supprimer ?(Bool));
	// Table de Vérité : 
	/*
	EXISTE / SUPPRIMER
	FAUX   / FAUX 		=> Créer l'objet
	VRAI   / VRAI 		=> Supprimer l'objet
	FAUX   / VRAI 		=> ne rien faire
	VRAI   / FAUX 		=> Mettre à jour l'objet
	*/

	function checkMatrix ($matrix_id, $matrix_content){
		$output = array(False, False);
		if (empty($matrix_content)) {
			$output = array(False, True); 
		}else{
			if (!empty($matrix_id)) $output[0] = True;
			if ($matrix_content == -1) $output[1] = True;
		}		
		return $output;
	}

	$checkPhoto = checkMatrix($id_photo, $photo);
	switch ($checkPhoto) {
		case array(True, True):
			// Supprimer
			$requete .= $removeMedia;
			$photoMember = 'NULL';
			$execution = array_merge([":id_photo"=>$id_photo],$execution);
			break;
		
		case array(False, False):
			// Créer
			$requete .= $insertMedia;
			$photoMember = '@photo_id';
			$execution = array_merge([':photo'=>$photo],$execution);
			break;
		
		case array(True, False):
			// MàJ
			$requete .= $updateMedia;
			$photoMember = ':id_photo';
			$execution = array_merge([':photo'=>$photo],[":id_photo"=>$id_photo],$execution);
			break;
		
		default:
			$photoMember = '';
			break;
	}

	$checkAddress = checkMatrix($id_adresse, $adresse);
	switch ($checkAddress) {
		case array(True, True):
			// Supprimer
			$requete .= $removeAddress;
			$addressMember = 'NULL';
			$execution = array_merge([":id_adresse"=>$id_adresse], $execution);
			break;
		
		case array(False, False):
			// Créer
			$requete .= $insertAddress;
			$addressMember = '@adresse_id';
			$execution = array_merge([':adresse'=>$adresse],$latlng,$execution);
			break;
		
		case array(True, False):
			// MàJ
			$requete .= $updateAddress;
			$addressMember = ':id_adresse';
			$execution = array_merge([':adresse'=>$adresse],[":id_adresse"=>$id_adresse], $latlng,$execution);
			break;
		
		default:
			$addressMember = '';
			break;
	}

	$requete .= generateUpdateMember($photoMember, $addressMember);

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare("$requete");

    $customExec= array_merge([ 
    	':civilite'=>$civilite,
    	':nom'=>$nom,
        ':prenom'=>$prenom,
        ':ddn'=>$ddn,
        ':tel'=>$tel,
        ':langue'=>$langue,
        ':description'=>$description,
        ':id'=>$id],
        $execution);
    
    if($query -> execute($customExec)){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}