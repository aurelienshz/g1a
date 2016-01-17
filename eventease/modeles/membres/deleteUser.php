<?php
require_once MODELES.'membres/getUserDetails.php';

function deleteUser($id){

	$details = getUserDetails($id);

	if($details){
		$requete = 'DELETE FROM membre
					   WHERE id = :id;';

		$execution = [':id'=>$id];

		$removeAddress = 'DELETE FROM adresse
					  	  WHERE id = :id_adresse;';

		$removeMedia = 'DELETE FROM media
						  WHERE id = :id_photo;';

		if ($details["id_adresse"]){
			$requete .= $removeAddress;
			$execution = array_merge([':id_adresse'=>$details['id_adresse']],$execution);
		}
		if ($details["id_photo"]){
			$requete .= $removeMedia;
			unlink(PHOTO_PROFIL.$details['lien_photo']);
			$execution = array_merge([':id_photo'=>$details['id_photo']],$execution);
		}
		$bdd = new PDO(DSN, DBUSER, DBPASS);
	    $query = $bdd->prepare($requete);
	    
	    if($query -> execute($execution)){
	    	return True;
	    }	
			else {
				var_dump($query -> errorInfo());
				return False;
			}
	}else{
		return False;
	}
}
