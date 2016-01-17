<?php
require_once MODELES.'membres/getUserDetails.php';

function deleteUser($id){

	$details = getUserDetails($id);

	if($details){
		$requete = 'UPDATE membre 
					 SET niveau = 10, pseudo = "Utilisateur Supprimé", mdp = "Bien essayé", civilite = NULL, nom = NULL, prenom = NULL, ddn = NULL, mail = "Bien essayé", tel = NULL, description = NULL, id_photo = NULL, id_adresse = NULL, date_derniere_connexion = NULL
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
